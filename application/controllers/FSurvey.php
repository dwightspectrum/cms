<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseController.php'; 

class FSurvey extends BaseController {

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('EmployeeJobHistory_model','job_history');
		$this->load->model('FreelancerSurvey_model','fsurvey');
	}

	public function index(){
		$this->view();
	}

	public function survey($freelancer_id = null){	
		$data['freelancer_id'] = $freelancer_id;
		$data['freelancer_job_history_id'] = $freelancer_job_history_id;

		$data['fsurvey'] = $this->fsurvey->get_survey($freelancer_id);
		$data['freelancer_job_history'] = $this->freelancer_job_history->get_employee_job_history($freelancer_id);

		$this->cfg['freelancer_id'] = $freelancer_id;
		$this->cfg['freelancer_job_history_id'] = $freelancer_job_history_id;
		$this->loadView('survey/get_survey', $data);
	}

	public function add_survey($freelancer_id){
		$survey_data = array(
			'freelancer_id' => $freelancer_id,
			'freelancer_job_history_id' => $this->input->post('client_id'),
			'freelancer_email_id' => $this->input->post('freelancer_email_id'),
			'survey_email' => $this->input->post('survey_email'),
			'survey_category' => 'Member',
			'survey_status' => 'active',
		);

		$this->fsurvey->addSurvey($survey_data);

		echo json_encode(array('success' => true));
	}

	public function send_survey_evaluation($survey_id){
		$isExists = true;
		$fsurvey = $this->fsurvey->get_survey($survey_id);

		$config = $this->getEmailConfig();
        $subject = 'HOTWORK CMS - EVALUATION';
        $sender = 'DONOTREPLY-HOTWARE@hotwork.ag';
        $senderName = 'HOTWORK CMS';
        $receiver = $fsurvey->survey_email;

        $employee = $this->employee->checkEmailIfExists($fsurvey->survey_email);

        if(!$employee){
        	$freelancer = $this->freelancer->checkEmailIfExists($fsurvey->survey_email);

        	if(!$freelancer){
        		json_encode(array('exists' => false, 'success' => false));
        	}else{
        		$data['name'] = $freelancer->freelancer_first_name . ' ' . $freelancer->freelancer_last_name;
        	}
        }else{
        	$data['name'] = $employee->employee_first_name . ' ' . $employee->employee_last_name;
        }

        $data['survey'] = $fsurvey;
        $data['type'] = 'freelancer';
        $message = $this->load->view('template/email/send_survey_evaluation_email', $data, TRUE);
        $this->sendEmail($config, $receiver, $sender, $senderName, $subject, $this->compressHtml($message));

		json_encode(array('exists' => true, 'success' => true));
	}

	public function checkEmailIfExists($survey_id){
		$isExists = false;

		$fsurvey = $this->fsurvey->get_survey($survey_id);

		$freelancer = $this->freelancer->checkEmailIfExists($fsurvey->survey_email);

        if(!$freelancer){
        	$employee = $this->employee->checkEmailIfExists($fsurvey->survey_email);

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
		$this->fsurvey->change_category_status($survey_id, $category_status);
		echo json_encode(array('success' => true));
	}

	public function get_survey($freelancer_id)
	{	
		$cur_page = $this->input->post('page');
		$total_rows = $this->fsurvey->get_survey_rows($freelancer_id);
		$start = $this->getStartRow($cur_page, 7);

		$data = array(
			'list' => $this->fsurvey->get_survey_data($start, 7, $freelancer_id),
			'pagination' => $this->createPagination($total_rows, 7, $cur_page)
		);
		
		//echo json_encode($this->job_history->get_employee_job_history($employee_id));
		echo json_encode($data);
	}
	// public function get_employee_job_history($employee_id){
	// 	echo json_encode($this->job_history->get_employee_job_history($employee_id));
	// }

	public function delete_survey($survey_id){
		$this->fsurvey->delete_survey($survey_id);
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

}