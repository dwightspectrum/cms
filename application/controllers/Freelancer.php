<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseController.php';

class Freelancer extends BaseController {
	
    public function __construct() {
		parent::__construct();
		$this->load->model('Freelancer_model','freelancer');
		$this->load->model('Notification_model', 'notification');
		$this->load->model('ServiceScopeList_model','service_scope');
		$this->load->model('FreelancerJobHistory_model', 'freelancer_job_history');
		$this->load->model('FreelancerEvaluationReport_model', 'freelancer_evaluation_report');
		$this->load->model('Employee_model','employee');
		$this->load->model('FreelancerSurvey_model','fsurvey');
		$this->load->model('FreelancerJobHistory_model','freelancer_job_history');
		$this->load->model('FreelancerCurriculumVitae_model','freelancer_curriculum_vitae');
		$this->load->model('FreelancerHobby_model','freelancer_hobby');
		$this->load->model('FreelancerLanguage_model','freelancer_language');
		$this->load->model('FreelancerProfExp_model','freelancer_profexp');
		$this->load->model('FreelancerReference_model','freelancer_reference');
		$this->load->model('FreelancerSkill_model','freelancer_skill');
		
    }

	public function index() {
		$this->view();
		
	}

	public function view() {
		$this->check_user_session();
		$employee_id =  $this->session->userdata('employee_id');
		$this->cfg['employee_id'] = $employee_id;
		$this->loadView('freelancer/view');
		
	}

	public function add() {
		$this->loadView('freelancer/add');
	}

	public function get() {
		$this->admin_only();
		$search = $this->input->post('search');
		$cur_page = $this->input->post('page');
		$total_rows = $this->freelancer->total_rows($search);
		$start = $this->getStartRow($cur_page, PER_PAGE);
		$data = [
			'list' => $this->getMissingFields($this->freelancer->get($start, PER_PAGE, $search)),
			'pagination' => $this->createPagination($total_rows, PER_PAGE, $cur_page)
		];
		echo json_encode($data);
	}

    private function getMissingFields($list) {
        $notIncluded = [			
            'freelancer_profile',
            'freelancer_emergency_email',
            'freelancer_status',
            'freelancer_site_deployment_others'
        ];

        foreach($list as $freelancer) {
            $missing = [];
            foreach ($freelancer as $key => $value) {
                if ((empty($value) || $value == '' || $value == null) && !in_array($key, $notIncluded)) {
                    $field = ucfirst(implode(" ", explode("_", substr($key, 11))));
                    $missing[] = $field;
                }
            }

            $freelancer->missingFields = ($missing) ? implode(', ', $missing) : 'NONE';
        }

        return $list;
    }

	public function profile($freelancer_id = null) {

		if ($freelancer_id == null) 
			$freelancer_id = $this->session->userdata('freelancer_id');

		$data['isAdmin'] = $this->isAdmin();
		$data['freelancer'] = $this->freelancer->get_by_id($freelancer_id); 
		$data['freelancer_job_history'] = $this->get_service_name_list($this->freelancer_job_history->get_job_history($freelancer_id));
		$data['skills'] = $this->freelancer_skill->get_skill($freelancer_id);
		$data['references'] = $this->freelancer_reference->get_reference($freelancer_id);
		$data['pe'] = $this->freelancer_profexp->get_professional_experience($freelancer_id);
		$data['languages'] = $this->freelancer_language->get_language($freelancer_id);
		$data['hobbies'] = $this->freelancer_hobby->get_hobby($freelancer_id);
		$data['freelancer_job_history'] = $this->get_service_name_list($this->freelancer_job_history->get_job_history($freelancer_id));

		$data['cv'] = $this->freelancer_curriculum_vitae->get_curriculum_vitae($freelancer_id);

		$this->cfg['freelancer_id'] = $freelancer_id;


		$this->loadView('freelancer/profile', $data);	
	}

	

	public function create(){
		// $this->check_user_session();
		$data = $this->input->post();
		$temp = array(
			'freelancer_first_name' => $data['freelancer_first_name'],
			'freelancer_last_name' => $data['freelancer_last_name'],
			'freelancer_email' => $data['freelancer_email'],
		);

		$this->freelancer->create($temp);
		echo json_encode([
			'temp' => $temp,
			'success' => true,
		]);

	}
	public function download_resume($freelancer_id)
	{
		$data['cv'] = $this->freelancer_curriculum_vitae->get_curriculum_vitae($freelancer_id);
		$data['skills'] = $this->freelancer_skill->get_skill($freelancer_id);
		$data['references'] = $this->freelancer_reference->get_reference($freelancer_id);
		$data['pe'] = $this->freelancer_profexp->get_professional_experience($freelancer_id);
		$data['languages'] = $this->freelancer_language->get_language($freelancer_id);
		$data['hobbies'] = $this->freelancer_hobby->get_hobby($freelancer_id);
		$data['job_history'] = $this->freelancer_job_history->get_job_history($freelancer_id);
		$data['freelancer'] = $this->freelancer->get_by_id($freelancer_id);

		$header['title'] = 'Personal Details'; 
		$this->load->view('freelancer/download_resume', $data);
	}

	public function curriculum_vitae($freelancer_id)
	{
		// $employee_id = $this->check_employee_access($employee_id);

		$data['freelancer_id'] = $freelancer_id;
		$data['freelancer'] = $this->freelancer->get_by_id($freelancer_id);
		$data['cv'] = $this->freelancer_curriculum_vitae->get_curriculum_vitae($freelancer_id);
		$this->cfg['freelancer_id'] = $freelancer_id;
		$this->cfg['professional_experience'] = $this->freelancer_profexp->get_professional_experience($freelancer_id);
		$this->cfg['skills'] = $this->freelancer_skill->get_skill($freelancer_id);
		$this->cfg['languages'] = $this->freelancer_language->get_language($freelancer_id);
		$this->cfg['hobbies'] = $this->freelancer_hobby->get_hobby($freelancer_id);
		$this->cfg['references'] = $this->freelancer_reference->get_reference($freelancer_id);

		$this->loadView('freelancer/curriculum_vitae', $data);
	}

	public function update_curriculum_vitae($freelancer_id)
	{		
		//$result = $this->employee->get_by_id($employee_id);
		// $employee_id = $this->check_employee_access($employee_id);
		$data = $this->input->post();
		// $professional_exp = json_decode($data['professional_exp']);
		$skills = json_decode($data['skills']);
	
		// $languages = json_decode($data['languages']);
		// $hobbies = json_decode($data['hobbies']);
		$references = json_decode($data['references']);
	
		
		$freelancer_curriculum_vitae = $this->freelancer_curriculum_vitae->get_curriculum_vitae($freelancer_id);
		$this->freelancer_curriculum_vitae->update($freelancer_id, $data);
		if($freelancer_curriculum_vitae){
			$this->freelancer_curriculum_vitae->update($freelancer_id, $data);
		}
		else{ 
			$this->freelancer_curriculum_vitae->add($freelancer_id, $data);
		}

		// $this->update_profexp($employee_id, $professional_exp);
		$this->update_skills($freelancer_id, $skills);
		// $this->update_languages($employee_id, $languages);
		// $this->update_hobbies($employee_id, $hobbies);
		$this->update_references($freelancer_id, $references);
		
		echo json_encode(array('success' => true, $data));
	}
	private function update_skills($freelancer_id, $skills)
	{
		$this->freelancer_skill->remove($freelancer_id);
		foreach($skills as $skill){
			$this->freelancer_skill->add($freelancer_id, $skill);
		}
	}

	private function update_references($freelancer_id, $references)
	{
		$this->freelancer_reference->remove($freelancer_id);
		foreach($references as $reference){
			$this->freelancer_reference->add($freelancer_id, $reference);
		}
	}
	private function isSetChangePasswords(){
        return ($this->input->post('current_password') != '' &&
                $this->input->post('new_password') != '' &&
                $this->input->post('confirm_new_password') != '');
    }
	public function change_password() {

		if($this->isSetChangePasswords()){
            $freelancer_id = $this->session->userdata('freelancer_id');
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password');
            $confirm_new_password = $this->input->post('confirm_new_password');

		    $freelancer = $this->freelancer->get_by_id($freelancer_id);

            if(!password_verify($current_password, $freelancer->freelancer_password)) {
                $data["success"] = false;
                $data["error"] = "Current Password is incorrect.";
            }
            if($new_password != $confirm_new_password){
                $data["success"] = false;
                $data["error"] = "New password and confirm new password doesn't match.";
            }
            else{
                $this->freelancer->save_password($freelancer_id, md5($new_password));
                $data["success"] = true;
            }
			// print_r($new_password);die();
        }
        else{
            $data["success"] = false;
            $data["error"] = "All fields are required.";
        }

        json_output($data);


	}


	private function get_service_name_list($job_list)
	{
		foreach($job_list as $job){
			$name_list = [];	
			$services = $this->freelancer_job_history->get_service_scopes($job->freelancer_job_history_id);

			foreach($services as $service){
				$name_list[] = $service->service_scope_list_name;
			}

			$job->service_scopes = $name_list;
		}

		return $job_list;
	}

	public function job_history($freelancer_id = null)
	{
		// $employee_id = $this->check_employee_access($employee_id);

		$data['freelancer_id'] = $freelancer_id;
		$data['categories'] = $this->get_categories_with_sub();
		$data['fsurvey'] = $this->fsurvey->get_survey($freelancer_id);
		$this->cfg['freelancer_id'] = $freelancer_id;
		$this->cfg['freelancer_job_history'] = $this->get_service_scope_list($this->freelancer_job_history->get_job_history($freelancer_id));
		$this->loadView('freelancer/job_history', $data);
	}


	public function download_job_history($freelancer_id = null)
	{
		$data['freelancer_id'] = $freelancer_id;
		$data['freelancer'] = $this->freelancer->get_by_id($freelancer_id);
		$data['freelancer_job_history'] = $this->get_service_name_list($this->freelancer_job_history->get_job_history($freelancer_id));

		$this->load->view('freelancer/download_job_history', $data);
	}


	
	private function get_categories_with_sub()
	{
		$categories = $this->service_scope->get_service_scope_list();
		foreach ($categories as $category) {
			$category->sub_categories = $this->service_scope->get_by_parent($category->service_scope_id);
		}
 
		return $categories;
	}

	private function get_service_scope_list($job_list)
	{
		foreach($job_list as $job){
			$job->service_scopes = $this->freelancer_job_history->get_service_scopes($job->freelancer_job_history_id);
		}

		return $job_list;
	}
	
	public function update_job_history($freelancer_id = null)
	{
		$jobs = json_decode($this->input->post('freelancer_job_history'), true);
		
		
		$this->add_job_history($freelancer_id, $jobs);
		echo json_encode(array('success' => true));
	}

	
	public function add_job_history($freelancer_id, $jobs)
	{
		foreach($jobs as $job){
			$id = $this->freelancer_job_history->add($freelancer_id, $job);
			
			if(isset($job['service_scopes'])){
				foreach($job['service_scopes'] as $service_scope){
					$this->freelancer_job_history->add_service_scope($id, $service_scope['service_scope_list_id']);
				}
			}

		}
	}
	
	public function get_freelancer_job_history($freelancer_id){
		echo json_encode($this->freelancer_job_history->get_freelancer_job_history($freelancer_id));
	}
	public function remove_job_history($job_history_id){
		$this->freelancer_job_history->remove_service_scope($job_history_id);
		echo json_encode(array('success' => true));
	}

	public function get_job_history($freelancer_id)
	{	
		$cur_page = $this->input->post('page');
		$total_rows = $this->freelancer_job_history->get_job_rows($freelancer_id);
		$start = $this->getStartRow($cur_page, 5);

		$data = array(
			'list' => $this->get_service_scope_list($this->freelancer_job_history->get_job_data($start, 5, $freelancer_id)),
			'pagination' => $this->createPagination($total_rows, 5 , $cur_page)
		);
		// print_r();die
		echo json_encode($data);
	}

	public function delete_job_history($freelancer_job_history_id){
		$this->freelancer_job_history->delete_job($freelancer_job_history_id);
		echo json_encode(array('success' => true));
	}

  	public function export_data(){
    	$filename ="freelancers_". date('mdY_hia') .".xls";
    	$cur_page = $this->input->get('page');
    	$start = $this->getStartRow($cur_page, PER_PAGE);
    	$search = $this->input->get('search');
    	$freelancers = $this->freelancer->get($start, PER_PAGE, $search);
	    header('Content-type: application/ms-excel');
	    header('Content-Disposition: attachment; filename='.$filename);
	    $col = "FIRSTNAME\tMIDDLENAME\tLASTNAME\tBIRTHDATE\tPOSITION\tCIVIL STATUS\tCITY ADDRESS\tPROVINCIAL ADDRESS\tSITE DEPLOYMENT\tCONTACT NAME\tRELATIONSHIP\tCONTACT NUMBER\tBPI\tTIN\tSSS\tPAG-IBIG\tSSS\tPHILHEALTH\tEMPLOYMENT CONTRACT\tID BADGES\t\n";
	    echo $col;
	    foreach($freelancers as $freelancer) {
	      	$col = "{$freelancer->freelancer_first_name}\t{$freelancer->freelancer_middle_name}\t{$freelancer->freelancer_last_name}\t{$freelancer->freelancer_birthdate}\t{$freelancer->freelancer_position}\t{$freelancer->freelancer_civil_status}\t{$freelancer->freelancer_city}\t{$freelancer->freelancer_province}\t{$freelancer->freelancer_site_deployment}\t{$freelancer->freelancer_emergency_contact_name}\t{$freelancer->freelancer_emergency_relationship}\t{$freelancer->freelancer_emergency_contact_num}\t{$freelancer->freelancer_BPI}\t{$freelancer->freelancer_TIN}\t{$freelancer->freelancer_SSS}\t{$freelancer->freelancer_PAG_IBIG}\t{$freelancer->freelancer_SSS}\t{$freelancer->freelancer_PHILHEALTH}\t{$freelancer->freelancer_employment_contract}\t{$freelancer->freelancer_id_badges}\t\n";
	      	echo $col;
	    }
  	}

	public function get_profile($freelancer_id) {
		// $data['isAdmin'] = $this->isAdmin();
		$result = $this->freelancer->get_by_id($freelancer_id);
		echo json_encode($result);
	}
	public function get_pic($freelancer_id) {
		// $data['isAdmin'] = $this->isAdmin();
		$result = $this->freelancer->get_by_id($freelancer_id);
		echo json_encode($result);
	}

	public function add_details() {
		$data = $this->input->post();
		$data['freelancer_profile'] = '';

		if (!empty($_FILES['freelancer_profile']['name'])) {
			$freelancer_profile = $this->do_upload_photo();
			$data['freelancer_profile'] = $freelancer_profile['file_name'];
		}

		$insert_id = $this->freelancer->add($data);

		echo json_encode([
			'insert_id' => $insert_id,
			'success' => true,
		]);
	}

	public function edit($freelancer_id = null) {
		// $this->isAdmin();
		$result = $this->freelancer->get_by_id($freelancer_id);
		echo json_encode($result);
	}

	public function update($freelancer_id) {
		$data = $this->input->post();
		$freelancer = $this->freelancer->get_by_id($freelancer_id);
		$data['freelancer_profile'] = $freelancer->freelancer_profile;

		if ($_FILES && $_FILES['freelancer_profile']['name'] !== '') {
			$profile = $this->do_upload_photo();
			$data['freelancer_profile'] = $profile['file_name'];

			if(
				$freelancer->freelancer_profile &&
				file_exists(realpath(".").'/asset/freelancers/'.$freelancer->freelancer_profile)
			) {
				unlink(realpath(".").'/asset/freelancers/'.$freelancer->freelancer_profile);
			}
		}

		$this->freelancer->update($freelancer_id, $data);

		echo json_encode([
			'success' => true,
		]);
	}


	public function change_profile($freelancer_id) {
		$profile = $this->do_upload_photo();
		$freelancer = $this->freelancer->get_by_id($freelancer_id);
		if(
			$freelancer->freelancer_profile  &&
			file_exists(realpath(".").'/asset/freelancers/'.$freelancer->freelancer_profile)
		) {	
			unlink(realpath(".").'/asset/freelancers/'.$freelancer->freelancer_profile);
		}
		$this->freelancer->change_profile($freelancer_id, $profile['file_name']);
		echo json_encode([
			$freelancer,
			'success' => true,
			'filepath' => base_url() . '/asset/freelancers/' . $profile['file_name'],
		]);
	}

	public function remove($freelancer_id) {
		// $this->check_user_session();
		$freelancer = $this->freelancer->get_by_id($freelancer_id);
		
		$this->freelancer->remove($freelancer_id);
		echo json_encode(['delete' => true, $freelancer]);
	}

	private function do_upload_photo() {
		$config['upload_path'] = realpath(APPPATH.'../asset/freelancers');
		$config['allowed_types'] = '*';
		$config['max_size'] = '0';

		$this->load->library('upload', $config);

		if(!$this->upload->do_upload('freelancer_profile')){
			$errors = $this->upload->display_errors();
			return null;
		}
		return $this->upload->data();
	}

	private function upload_photo($files) {
		$config['upload_path'] = realpath(APPPATH.'../asset/freelancers/requirements');
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '0';

		$this->load->library('upload', $config);

		if(!$this->upload->do_upload($files)){
			$errors = $this->upload->display_errors();
			return null;
		}
		return $this->upload->data();
	}

	private function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	public function add_requirements($freelancer_id) {

		$freelancer = $this->freelancer->get_by_id($freelancer_id);
		$form_files = json_decode($this->input->post('form_files'), true);  
		$returnFiles = [];
		$base_path = realpath(".").'/asset/freelancers/requirements/';
		$requirements = "";
		foreach ($form_files as $form_file) {
			$file_name = $this->generateRandomString(10) . '.png';
		
			if ( $freelancer->{$form_file['key']} && file_exists($base_path . $freelancer->{$form_file['key']}) ) {
				unlink( $base_path . $freelancer->{$form_file['key']} );
			}
			$update = [];
			array_push($returnFiles, [
				'name' => $file_name,
				'key' => $form_file['key'],
			]);

			$update[$form_file['key']] = $file_name;

			$requirements .= $this->set_requirements_name($form_file['key']);

			$this->freelancer->add_req($freelancer_id, $update);

			file_put_contents(
				$base_path . $file_name, 
				base64_decode($form_file['value'])
			);
		}

		$this->send_email_notification($freelancer, substr($requirements, 0, -2));
		$this->send_notification($freelancer_id, substr($requirements, 0, -2));

		echo json_encode([
			'form_files' => $returnFiles, 
			'success' => true,
		]); 
	}


	private function send_notification($freelancer_id, $requirements){
		$data = [
			'notification_category' => 'freelancer',
			'notification_type' => 'requirements',
			'notification_type_id' => $freelancer_id,
			'notification_details' => $requirements,
			'notification_date' => date('Y-m-d'),
			'notification_status' => 'unread'
		];

		$this->notification->insert($data);
	}

	private function set_requirements_name($key){
		$requirement = "";

		if($key == "freelancer_CV"){
			$requirement = "CV" . ", ";
		}else if($key == "freelancer_PASSPORT"){
			$requirement = "PASSPORT" . ", ";
		}else if($key == "freelancer_NBI_POLICE"){
			$requirement = "NBI/POLICE CLEARANCE" . ", ";
		}else if($key == "freelancer_RT_PCR"){
			$requirement = "RT_PCR" . ", ";
		}else if($key == "freelancer_img_TIN"){
			$requirement = "TIN" . ", ";
		}else if($key == "freelancer_img_SSS"){
			$requirement = "SSS" . ", ";
		}else if($key == "freelancer_img_PAG_IBIG"){
			$requirement = "PAGIBIG" . ", ";
		}else if($key == "freelancer_img_PHILHEALTH"){
			$requirement = "PHILHEALTH" . ", ";
		}else if($key == "freelancer_SIGNATURES"){
			$requirement = "SIGNATURES" . ", ";
		}else if($key == "freelancer_img_BPI"){
			$requirement = "BPI" . ", ";
		}else if($key == "freelancer_medical"){
			$requirement = "MEDICAL" . ", ";
		}

		return $requirement;
	}

	private function send_email_notification($freelancer, $requirements){
		$config = $this->getEmailConfig();
        $subject = 'HOTWORK CMS - REQUIREMENTS';
        $sender = 'DONOTREPLY-HOTWARE@hotwork.ag';
        $senderName = 'HOTWORK CMS';
        $receiver = FRANCO_EMAIL;

        $data['name'] = $freelancer->freelancer_first_name . ' ' . $freelancer->freelancer_last_name;
        $data['requirements'] = $requirements;
        $data['uploaded_date'] = date("Y-m-d");

        $message = $this->load->view('template/email/send_requirement_notification_email', $data, TRUE);
        $this->sendEmail($config, $receiver, $sender, $senderName, $subject, $this->compressHtml($message));
	}

	public function get_notification(){
		echo json_encode($this->notification->get_notification());
	}

	public function mark_all_as_read(){
		$this->notification->mark_all_as_read();

		echo json_encode(array('success' => true));
	}

	public function mark_as_read($notification_id, $notification_type_id){
		$this->notification->mark_as_read($notification_id);

		header("Location: " . base_url() . 'freelancer/profile/' . $notification_type_id);
	}

	public function evaluation_report($freelancer_id) {
		// check if session exists
        $this->check_user_session();
        $this->admin_only();
		$this->loadView('freelancer/evaluation_report', ['freelancer_id' => $freelancer_id]);
	}

	public function get_evaluation_report($freelancer_id) {
		$freelancer = $this->freelancer->get_by_id($freelancer_id);
		$return_data = $this->freelancer_evaluation_report->findRow([
			'freelancer_id' => $freelancer_id
		]);
		
		if (isset($return_data)) {
			$return_data->freelancer_role_id = $freelancer->freelancer_role;
			echo json_encode($return_data);
		} else {

		echo json_encode(null);
		}
	}

	public function store_evaluation_report($freelancer_id) {
		$data = [
			'freelancer_id' => $freelancer_id,
			'evaluation_report_data' => $this->input->post('evaluation_report_data'),
		];
		$exists = $this->freelancer_evaluation_report->findRow(['freelancer_id' => $freelancer_id]);
		if ($exists) {
			$this->freelancer_evaluation_report->update(
				$exists->freelancer_evaluation_report_id, 
				$data
			);
			echo json_encode(['success' => true]);
			return;
		}
		$insert_id = $this->freelancer_evaluation_report->insert($data);
		$this->freelancer_evaluation_report->findRow([
			'freelancer_id' => $freelancer_id
		]);

		echo json_encode([
			'success' => true,
		]);
	}

	public function delete_tin($freelancer_id){
		$freelancer = $this->freelancer->get_by_id($freelancer_id);
		if(
			$freelancer->freelancer_img_TIN  &&
			file_exists(realpath(".").'/asset/freelancers/requirements/'.$freelancer->freelancer_img_TIN)
		) {	
			unlink(realpath(".").'/asset/freelancers/requirements/'.$freelancer->freelancer_img_TIN);
		}	
		$this->db->update('freelancer' ,array('freelancer_img_TIN' => NULL));
		$this->db->where('freelancer_id', $freelancer_id);
		echo json_encode(array('success' => true)); 
		//return $this->db->affected_rows();
	}

	public function delete_sss($freelancer_id){
		$freelancer = $this->freelancer->get_by_id($freelancer_id);
		if(
			$freelancer->freelancer_img_SSS  &&
			file_exists(realpath(".").'/asset/freelancers/requirements/'.$freelancer->freelancer_img_SSS)
		) {	
			unlink(realpath(".").'/asset/freelancers/requirements/'.$freelancer->freelancer_img_SSS);
		}
		$this->db->update('freelancer' ,array('freelancer_img_SSS' => NULL));
		$this->db->where('freelancer_id', $freelancer_id);
		echo json_encode(array('success' => true));
	}

	public function delete_pagibig($freelancer_id){
		$freelancer = $this->freelancer->get_by_id($freelancer_id);
		if(
			$freelancer->freelancer_img_PAG_IBIG  &&
			file_exists(realpath(".").'/asset/freelancers/requirements/'.$freelancer->freelancer_img_PAG_IBIG)
		) {	
			unlink(realpath(".").'/asset/freelancers/requirements/'.$freelancer->freelancer_img_PAG_IBIG);
		}
		$this->db->update('freelancer' ,array('freelancer_img_PAG_IBIG' => NULL));
		$this->db->where('freelancer_id', $freelancer_id);
		echo json_encode(array('success' => true));
	}

	public function delete_philhealth($freelancer_id){
		$freelancer = $this->freelancer->get_by_id($freelancer_id);
		if(
			$freelancer->freelancer_img_PHILHEALTH  &&
			file_exists(realpath(".").'/asset/freelancers/requirements/'.$freelancer->freelancer_img_PHILHEALTH)
		) {	
			unlink(realpath(".").'/asset/freelancers/requirements/'.$freelancer->freelancer_img_PHILHEALTH);
		}
		$this->db->update('freelancer' ,array('freelancer_img_PHILHEALTH' => NULL));
		$this->db->where('freelancer_id', $freelancer_id);
		echo json_encode(array('success' => true));
	}

	public function delete_bpi($freelancer_id){
		$freelancer = $this->freelancer->get_by_id($freelancer_id);
		if(
			$freelancer->freelancer_img_BPI  &&
			file_exists(realpath(".").'/asset/freelancers/requirements/'.$freelancer->freelancer_img_BPI)
		) {	
			unlink(realpath(".").'/asset/freelancers/requirements/'.$freelancer->freelancer_img_BPI);
		}
		$this->db->update('freelancer' ,array('freelancer_img_BPI' => NULL));
		$this->db->where('freelancer_id', $freelancer_id);
		echo json_encode(array('success' => true));
	}

	public function delete_cv($freelancer_id){
		$freelancer = $this->freelancer->get_by_id($freelancer_id);
		if(
			$freelancer->freelancer_CV  &&
			file_exists(realpath(".").'/asset/freelancers/requirements/'.$freelancer->freelancer_CV)
		) {	
			unlink(realpath(".").'/asset/freelancers/requirements/'.$freelancer->freelancer_CV);
		}
		$this->db->update('freelancer' ,array('freelancer_CV' => NULL));
		$this->db->where('freelancer_id', $freelancer_id);
		echo json_encode(array('success' => true));
	}

	public function delete_passport($freelancer_id){
		$freelancer = $this->freelancer->get_by_id($freelancer_id);
		if(
			$freelancer->freelancer_PASSPORT  &&
			file_exists(realpath(".").'/asset/freelancers/requirements/'.$freelancer->freelancer_PASSPORT)
		) {	
			unlink(realpath(".").'/asset/freelancers/requirements/'.$freelancer->freelancer_PASSPORT);
		}
		$this->db->update('freelancer' ,array('freelancer_PASSPORT' => NULL));
		$this->db->where('freelancer_id', $freelancer_id);
		echo json_encode(array('success' => true));
	}

	public function delete_medical($freelancer_id){
		$freelancer = $this->freelancer->get_by_id($freelancer_id);
		if(
			$freelancer->freelancer_medical  &&
			file_exists(realpath(".").'/asset/freelancers/requirements/'.$freelancer->freelancer_medical)
		) {	
			unlink(realpath(".").'/asset/freelancers/requirements/'.$freelancer->freelancer_medical);
		}
		$this->db->update('freelancer' ,array('freelancer_medical' => NULL));
		$this->db->where('freelancer_id', $freelancer_id);
		echo json_encode(array('success' => true));
	}

	public function delete_nbi($freelancer_id){
		$freelancer = $this->freelancer->get_by_id($freelancer_id);
		if(
			$freelancer->freelancer_NBI_POLICE  &&
			file_exists(realpath(".").'/asset/freelancers/requirements/'.$freelancer->freelancer_NBI_POLICE)
		) {	
			unlink(realpath(".").'/asset/freelancers/requirements/'.$freelancer->freelancer_NBI_POLICE);
		}
		$this->db->update('freelancer' ,array('freelancer_NBI_POLICE' => NULL));
		$this->db->where('freelancer_id', $freelancer_id);
		echo json_encode(array('success' => true));
	}

	public function delete_swab($freelancer_id){
		$freelancer = $this->freelancer->get_by_id($freelancer_id);
		if(
			$freelancer->freelancer_RT_PCR  &&
			file_exists(realpath(".").'/asset/freelancers/requirements/'.$freelancer->freelancer_RT_PCR)
		) {	
			unlink(realpath(".").'/asset/freelancers/requirements/'.$freelancer->freelancer_RT_PCR);
		}
		$this->db->update('freelancer' ,array('freelancer_RT_PCR' => NULL));
		$this->db->where('freelancer_id', $freelancer_id);
		echo json_encode(array('success' => true));
	}

	public function delete_signature($freelancer_id){
		$freelancer = $this->freelancer->get_by_id($freelancer_id);
		if(
			$freelancer->freelancer_SIGNATURES  &&
			file_exists(realpath(".").'/asset/freelancers/requirements/'.$freelancer->freelancer_SIGNATURES)
		) {	
			unlink(realpath(".").'/asset/freelancers/requirements/'.$freelancer->freelancer_SIGNATURES);
		}
		$this->db->update('freelancer' ,array('freelancer_SIGNATURES' => NULL));
		$this->db->where('freelancer_id', $freelancer_id);
		echo json_encode(array('success' => true));
	}

	public function get_category_email($category){
		if($category == 1){
			$data = $this->employee->get_by_email();
		}else{
			$data = $this->freelancer->get_by_email();
		}

		echo json_encode($data);
	}
}

