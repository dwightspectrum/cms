<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseController.php'; 

class Survey extends BaseController {

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('EmployeeJobHistory_model','job_history');
		$this->load->model('EmployeeSurvey_model','survey');
	}

	public function index(){
		$this->view();
	}

	public function survey($employee_id = null){	
		$data['employee_id'] = $employee_id;
		$data['employee_job_history_id'] = $employee_job_history_id;

		$data['survey'] = $this->survey->get_survey($employee_id);
		$data['job_history'] = $this->job_history->get_employee_job_history($employee_id);

		$this->cfg['employee_id'] = $employee_id;
		$this->cfg['employee_job_history_id'] = $employee_job_history_id;
		$this->loadView('survey/get_survey', $data);
	}

	public function add_survey($employee_id){

		$survey_data = array(
			'employee_id' => $employee_id,
			'employee_job_history_id' => $this->input->post('client_id'),
			'survey_email' => $this->input->post('survey_email'),
			'survey_email_id' => $this->input->post('survey_email_id'),
			'survey_category' => 'Member',
			'survey_status' => 'active',
		);

		$this->survey->addSurvey($survey_data);
		echo json_encode(array('success' => true));
	}

	public function get_email_id($category){
		$email = $this->input->post('email');

		if($category == 1){
			echo json_encode($this->employee->get_email_id($email));
		}else{
			echo json_encode($this->freelancer->get_email_id($email));
		}
	}

	// public function create_survey(){
	// 	//$this->check_user_session();
	// 	$data = $this->input->post();

	// 	$test = array(
	// 		'employee_id' => $data['employee_id'],
	// 		'employee_job_history_id' => $data['employee_job_history_id'],
	// 		'survey_email' => $data['survey_email'],
	// 		'survey_category' => 'Member',
	// 		'survey_status' => 'active',
	// 	);

	// 	$this->employee->create($test);
	// }

	public function send_survey_evaluation($survey_id){
		$isExists = true;
		$survey = $this->survey->get_survey($survey_id);

		$config = $this->getEmailConfig();
        $subject = 'HOTWORK CMS - EVALUATION';
        $sender = 'DONOTREPLY-HOTWARE@hotwork.ag';
        $senderName = 'HOTWORK CMS';
        $receiver = $survey->survey_email;

        $freelancer = $this->freelancer->checkEmailIfExists($survey->survey_email);

        if(!$freelancer){
        	$employee = $this->employee->checkEmailIfExists($survey->survey_email);

        	if(!$employee){
        		json_encode(array('exists' => false, 'success' => false));
        	}else{
        		$data['name'] = $employee->employee_first_name . ' ' . $employee->employee_last_name;
        	}
        }else{
        	$data['name'] = $freelancer->freelancer_first_name . ' ' . $freelancer->employee_last_name;
        }

        $data['survey'] = $survey;
        $data['type'] = 'employee';
        $message = $this->load->view('template/email/send_survey_evaluation_email', $data, TRUE);
        $this->sendEmail($config, $receiver, $sender, $senderName, $subject, $this->compressHtml($message));

		json_encode(array('exists' => true, 'success' => true));
	}

	public function checkEmailIfExists($survey_id){
		$isExists = false;

		$survey = $this->survey->get_survey($survey_id);

		$freelancer = $this->freelancer->checkEmailIfExists($survey->survey_email);

        if(!$freelancer){
        	$employee = $this->employee->checkEmailIfExists($survey->survey_email);

        	if($employee){
        		$isExists = true;
        	}else{
        		$isExists = false;
        	}
        }else{
        	$isExists = true;
        }

        echo json_encode(array('isexists' => $isExists));
	}

	public function change_category_status($survey_id, $category_status)
	{
		$this->survey->change_category_status($survey_id, $category_status);
		echo json_encode(array('success' => true));
	}

	public function get_survey($employee_id)
	{	
		$cur_page = $this->input->post('page');
		$total_rows = $this->survey->get_survey_rows($employee_id);
		$start = $this->getStartRow($cur_page, 7);

		$data = array(
			'list' => $this->survey->get_survey_data($start, 7, $employee_id),
			'pagination' => $this->createPagination($total_rows, 7, $cur_page)
		);
		
		//echo json_encode($this->job_history->get_employee_job_history($employee_id));
		echo json_encode($data);
	}
	// public function get_employee_job_history($employee_id){
	// 	echo json_encode($this->job_history->get_employee_job_history($employee_id));
	// }

	public function delete_survey($survey_id){
		$this->survey->delete_survey($survey_id);
		echo json_encode(array('success' => true));
	}

}