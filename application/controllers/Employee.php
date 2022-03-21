<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseController.php'; 

class Employee extends BaseController {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Company_model','company');
		$this->load->model('Employee_model','employee');
		$this->load->model('EmployeeChild_model','employee_child');
		$this->load->model('EmployeeJobHistory_model','job_history');
		$this->load->model('EmployeeVisa_model','visa');
		$this->load->model('CurriculumVitae_model','curriculum_vitae');
		$this->load->model('EmployeeHobby_model','employee_hobby');
		$this->load->model('EmployeeLanguage_model','employee_language');
		$this->load->model('EmployeeProfExp_model','employee_profexp');
		$this->load->model('EmployeeReference_model','employee_reference');
		$this->load->model('EmployeeSkill_model','employee_skill');
		$this->load->model('ServiceScopeList_model','service_scope');
		$this->load->model('EmployeeTravelHistory_model','travel_history');
		$this->load->model('Role_model','role');
		$this->load->model('Freelancer_model','freelancer');
		$this->load->model('Notification_model', 'notification');
		$this->load->model('EmployeeEvaluationReport_model', 'employee_evaluation_report');
		$this->load->model('Category_model', 'category');
		$this->load->model('EmployeeSurvey_model', 'employee_survey');


		$this->check_user_session();
	}

	public function get_employee_by_project($purchase_order_id){
		echo json_encode($this->employee->get_employee_by_project($purchase_order_id));
	}

	public function index(){
		$this->view();
		
	}

	public function view(){
		$this->admin_only();
		$employee_id =  $this->session->userdata('employee_id');
		$data['companies'] = $this->company->get_all();
		$data['roles'] = $this->role->get_all();
		$this->cfg['employee_id'] = $employee_id;
		$this->loadView('employee/view', $data);
	}

	public function get()
	{
		$this->admin_only();
		$search = $this->input->post('search');
		$cur_page = $this->input->post('page');
		$total_rows = $this->employee->total_rows($search);
		$start = $this->getStartRow($cur_page, PER_PAGE);

		$data = array(
			'list' => $this->employee->get($start, PER_PAGE, $search),
			'pagination' => $this->createPagination($total_rows, PER_PAGE, $cur_page)
		);

		echo json_encode($data);
	}

	public function add(){
		$this->admin_only();
		$data['companies'] = $this->company->get_all();
		$this->loadView('employee/add', $data);
	}

	// public function add_req() {
	// 	$this->loadView('freelancer/add');
	// }

	public function add_employee_details()
	{
		$this->admin_only();

		$employee_photo = $this->do_upload_photo();
		$employee_passport_copy = $this->do_upload_passport();
		$employee_certificate = $this->do_upload_certificates();

		$data = $this->input->post();
		$children = json_decode($data['children']);

		$data['employee_photo'] = $employee_photo['file_name'];
		$data['employee_passport_copy'] = $employee_passport_copy['file_name'];
		$data['employee_certificate'] = $employee_certificate['file_name'];
		$data['employee_cv'] = $employee_cv['employee_cv'];
		$data['employee_passport'] = $employee_passport['employee_passport'];
		$data['employee_tin'] = $employee_tin['employee_tin'];
		$data['employee_sss'] = $employee_sss['employee_sss'];
		$data['employee_philhealth'] = $employee_philhealth['employee_philhealth'];
		$data['employee_medical'] = $employee_medical['employee_medical'];
		$data['employee_pagibig'] = $employee_pagibig['employee_pagibig'];
		$data['employee_specimen'] = $employee_specimen['employee_specimen'];
		$data['employee_bpi'] = $employee_bpi['employee_bpi'];
		$data['employee_nbi'] = $employee_nbi['employee_nbi'];
		$data['employee_swab'] = $employee_swab['employee_swab'];

		$employee_id = $this->employee->add_employee($data);

		$this->add_children($employee_id, $children);

		echo json_encode(array('success' => true));
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

	private function add_children($id, $children)
	{
		foreach ($children as $child) {
			$data = array(
				'employee_id' => $id,
				'employee_child_name' => $child->child_name,
				'employee_child_birthdate' => $child->child_birthdate
			);

			$this->employee_child->add_child($data);
		}
	}

	public function edit_employee_details($employee_id)
	{
		// $this->admin_only();
		
		$employee_passport_copy = $this->do_upload_passport();
		$employee_certificate = $this->do_upload_certificates();

		$data = $this->input->post();
		$children = json_decode($data['children']);
		
		if($employee_passport_copy){
			$data['employee_passport_copy'] = $employee_passport_copy['file_name'];
		}

		if($employee_certificate){
			$data['employee_certificate'] = $employee_certificate['file_name'];
		}

		$this->employee->edit($employee_id, $data);

		$this->employee_child->remove_children($employee_id);
		$this->add_children($employee_id, $children);

		echo json_encode(array('success' => true));
	}

	public function edit($employee_id)
	{
		// $this->admin_only();
		
		$data['companies'] = $this->company->get_all();
		$data['employee'] = $this->employee->get_by_id($employee_id);

		$this->cfg['employee_id'] = $employee_id;
		$this->cfg['children'] = $this->employee_child->get_children($employee_id);

		$this->loadView('employee/edit', $data);
	}

	private function do_upload_visa(){
		$config['upload_path'] = realpath(APPPATH.'../asset/employees/visa');
		$config['allowed_types'] = '*';
		$config['max_size'] = '0';

		$this->load->library('upload', $config);

		if(!$this->upload->do_upload('employee_visa_file')){
			$errors = $this->upload->display_errors();
			return null;
		}
		return $this->upload->data();
	}

	private function do_upload_photo(){
		$config['upload_path'] = realpath(APPPATH.'../asset/employees');
		$config['allowed_types'] = '*';
		$config['max_size'] = '0';
		
		$this->load->library('upload', $config);

		if(!$this->upload->do_upload('employee_photo')){
			$errors = $this->upload->display_errors();
			return null;
		}
		return $this->upload->data();
	}

	private function do_upload_cv(){
		$config['upload_path'] = realpath(APPPATH.'../asset/cv');
		$config['allowed_types'] = '*';
		$config['max_size'] = '0';

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if(!$this->upload->do_upload('employee_cv_upload')){
			$errors = $this->upload->display_errors();
			return null;
		}
		return $this->upload->data();
	}

	private function do_upload_passport(){
		$config['upload_path'] = realpath(APPPATH.'../asset/passports');
		$config['allowed_types'] = '*';
		$config['max_size'] = '0';

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if(!$this->upload->do_upload('passport_copy')){
			$errors = $this->upload->display_errors();
			return null;
		}
		return $this->upload->data();
	}

	private function do_upload_certificates(){
		$config['upload_path'] = realpath(APPPATH.'../asset/certificates');
		$config['allowed_types'] = '*';
		$config['max_size'] = '0';

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if(!$this->upload->do_upload('employee_certificate')){
			$errors = $this->upload->display_errors();
			return null;
		}
		return $this->upload->data();
	}

	public function profile($employee_id){

		if($employee_id == null)
			$employee_id = $this->session->userdata('employee_id');

		// $employee_id = $this->check_employee_access($employee_id);

		$data['isAdmin'] = $this->isAdmin();
		
		$data['employee'] = $this->employee->get_by_id($employee_id);
		$data['children'] = $this->get_child_age($this->employee_child->get_children($employee_id));
		$data['skills'] = $this->employee_skill->get_skill($employee_id);
		$data['references'] = $this->employee_reference->get_reference($employee_id);
		$data['pe'] = $this->employee_profexp->get_professional_experience($employee_id);
		$data['languages'] = $this->employee_language->get_language($employee_id);
		$data['hobbies'] = $this->employee_hobby->get_hobby($employee_id);
		$data['job_history'] = $this->get_service_name_list($this->job_history->get_job_history($employee_id));
		$data['travel_history'] = $this->travel_history->get_travel_history($employee_id);
		$data['visas'] = $this->visa->get_visas_granted($employee_id);
		$data['cv'] = $this->curriculum_vitae->get_curriculum_vitae($employee_id);

		$this->cfg['employee_photo'] = $data['employee']->employee_photo;
		$this->cfg['employee_id'] = $employee_id;
		$this->loadView('employee/profile', $data);
	}

	private function get_child_age($children){
		$list = [];
		$dateNow = date("d-m-Y");

		foreach($children as $child){
			$child->employee_child_age = date_diff(date_create($child->employee_child_birthdate), date_create($dateNow))->format("%y");
			$list[] = $child;
		}
		return $list;
	}

	private function get_service_name_list($job_list)
	{
		foreach($job_list as $job){
			$name_list = [];	
			$services = $this->job_history->get_service_scopes($job->employee_job_history_id);

			foreach($services as $service){
				$name_list[] = $service->service_scope_list_name;
			}

			$job->service_scopes = $name_list;
		}

		return $job_list;
	}

	public function upload_profile($employee_id = null){
		$file_data = $this->do_upload_photo(); 

		if($file_data != null){
			$employee = $this->employee->get_by_id($employee_id);
			unlink($_SERVER['DOCUMENT_ROOT'].'/cms/asset/employees/'.$employee->employee_photo);

			$this->employee->update_profile($employee_id, $file_data['file_name']);
		}
		
		redirect('employee/profile/'. $employee_id);
	
	}

	private function isSetChangePasswords(){
        return ($this->input->post('current_password') != '' &&
                $this->input->post('new_password') != '' &&
                $this->input->post('confirm_new_password') != '');
    }

	public function change_password()
	{
		if($this->isSetChangePasswords()){
            $employee_id = $this->session->userdata('employee_id');
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password');
            $confirm_new_password = $this->input->post('confirm_new_password');

		    $employee = $this->employee->get_by_id($employee_id);

            if(!password_verify($current_password, $employee->employee_password)) {
                $data["success"] = false;
                $data["error"] = "Current Password is incorrect.";
            }
            if($new_password != $confirm_new_password){
                $data["success"] = false;
                $data["error"] = "New password and confirm new password doesn't match.";
            }
            else{
                $this->employee->save_password($employee_id, md5($new_password));
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


	public function curriculum_vitae($employee_id = null)
	{
		// $employee_id = $this->check_employee_access($employee_id);

		$data['employee_id'] = $employee_id;
		$data['employee'] = $this->employee->get_by_id($employee_id);
		$data['cv'] = $this->curriculum_vitae->get_curriculum_vitae($employee_id);
		
		$this->cfg['employee_id'] = $employee_id;
		$this->cfg['professional_experience'] = $this->employee_profexp->get_professional_experience($employee_id);
		$this->cfg['skills'] = $this->employee_skill->get_skill($employee_id);
		$this->cfg['languages'] = $this->employee_language->get_language($employee_id);
		$this->cfg['hobbies'] = $this->employee_hobby->get_hobby($employee_id);
		$this->cfg['references'] = $this->employee_reference->get_reference($employee_id);
		$this->loadView('employee/curriculum_vitae', $data);
	}

	public function get_visas_granted($employee_id)
	{
		$search = $this->input->post('search');
		$cur_page = $this->input->post('page');

		$total_rows = $this->visa->get_visas_granted_rows($search, $employee_id);
		$start = $this->getStartRow($cur_page, PER_PAGE);

		$data = array(
			'list' => $this->visa->get_visas_granted_data($start, PER_PAGE, $search, $employee_id),
			'pagination' => $this->createPagination($total_rows, PER_PAGE, $cur_page)
		);

		echo json_encode($data);
	}

	public function delete_visa($employee_visa_id){
		$visa = $this->visa->get_visas_granted_by_employee_visa($employee_visa_id);

		unlink(FCPATH.'asset/employees/visa/' . $visa->employee_visa_file);
		$this->visa->remove($employee_visa_id);

		echo json_encode(array('success' => true));
	}

	public function add_visa($employee_id)
	{
		$employee_visa_file = $this->do_upload_visa();

		$data = $this->input->post();

		$data['employee_visa_file'] = $employee_visa_file['file_name'];

		$this->visa->add_visa_grants($employee_id, $data);

		echo json_encode(array('success' => true));
	}

	public function visa_update($employee_id = null)
	{
		$data['employee_id'] = $employee_id;
		$this->cfg['employee_id'] = $employee_id;
		$this->cfg['visas'] = $this->visa->get_visas_granted($employee_id);

		$this->loadView('employee/visa_granted', $data);	
	}

	public function job_history($employee_id = null)
	{
		// $employee_id = $this->check_employee_access($employee_id);
		$data['employee_id'] = $employee_id;
		$data['categories'] = $this->get_categories_with_sub();

		$this->cfg['employee_id'] = $employee_id;
		$this->cfg['job_history'] = $this->get_service_scope_list($this->job_history->get_job_history($employee_id));
		$data['employee'] = $this->employee->get_by_id($employee_id);
		$this->loadView('employee/job_history', $data);
	}

	public function travel_history($employee_id = null){
		$data['employee_id'] = $employee_id;
		$data['travel_history'] = $this->travel_history->get_travel_history($employee_id);

		$this->cfg['employee_id'] = $employee_id;

		$this->loadView('employee/travel_history', $data);
	}

	public function download_job_history($employee_id = null)
	{
		$data['employee_id'] = $employee_id;
		$data['employee'] = $this->employee->get_by_id($employee_id);
		$data['job_history'] = $this->get_service_name_list($this->job_history->get_job_history($employee_id));

		$this->load->view('employee/download_job_history', $data);
	}

	public function download_resume($employee_id)
	{
		$data['cv'] = $this->curriculum_vitae->get_curriculum_vitae($employee_id);
		$data['skills'] = $this->employee_skill->get_skill($employee_id);
		$data['references'] = $this->employee_reference->get_reference($employee_id);
		$data['pe'] = $this->employee_profexp->get_professional_experience($employee_id);
		$data['languages'] = $this->employee_language->get_language($employee_id);
		$data['hobbies'] = $this->employee_hobby->get_hobby($employee_id);
		$data['job_history'] = $this->job_history->get_job_history($employee_id);
		$data['employee'] = $this->employee->get_by_id($employee_id);
		$data['children'] = $this->employee_child->get_children($employee_id);

		$header['title'] = 'Personal Details'; 
		$this->load->view('employee/download_resume', $data);
	}

	public function download_travel_history($employee_id = null)
	{
		$data['employee_id'] = $employee_id;
		$data['employee'] = $this->employee->get_by_id($employee_id);
		$data['travel_history'] = $this->travel_history->get_travel_history($employee_id);

		$this->load->view('employee/download_travel_history', $data);
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
			$job->service_scopes = $this->job_history->get_service_scopes($job->employee_job_history_id);
		}

		return $job_list;
	}

	public function update_job_history($employee_id = null)
	{
		$jobs = json_decode($this->input->post('job_history'), true);
	
		$this->add_job_history($employee_id, $jobs);
		echo json_encode(array('success' => true));
	}

	public function add_job_history($employee_id, $jobs)
	{
		foreach($jobs as $job){
			$id = $this->job_history->add($employee_id, $job);
			
			if(isset($job['service_scopes'])){
				foreach($job['service_scopes'] as $service_scope){
					$this->job_history->add_service_scope($id, $service_scope['service_scope_list_id']);
				}
			}
		}
	}

	public function update_curriculum_vitae($employee_id)
	{		
		//$result = $this->employee->get_by_id($employee_id);
		// $employee_id = $this->check_employee_access($employee_id);
		$data = $this->input->post();
		// $professional_exp = json_decode($data['professional_exp']);
		$skills = json_decode($data['skills']);
	
		// $languages = json_decode($data['languages']);
		// $hobbies = json_decode($data['hobbies']);
		$references = json_decode($data['references']);
	
		
		$curriculum_vitae = $this->curriculum_vitae->get_curriculum_vitae($employee_id);
		$this->curriculum_vitae->update($employee_id, $data);
		if($curriculum_vitae){
			$this->curriculum_vitae->update($employee_id, $data);
		}
		else{ 
			$this->curriculum_vitae->add($employee_id, $data);
		}

		// $this->update_profexp($employee_id, $professional_exp);
		$this->update_skills($employee_id, $skills);
		// $this->update_languages($employee_id, $languages);
		// $this->update_hobbies($employee_id, $hobbies);
		$this->update_references($employee_id, $references);
		
		echo json_encode(array('success' => true));
	}
	
	public function get_employee_job_history($employee_id){
		echo json_encode($this->job_history->get_employee_job_history($employee_id));
	}

	public function get_category($employee_id){
		$result = $this->category->get_category_id($employee_id);

		echo json_encode($this->category->get_category_id($employee_id));
	}

	public function get_category_email($category){
		if($category == 1){
			$data = $this->employee->get_by_email();
		}else{
			$data = $this->freelancer->get_by_email();
		}
	
		echo json_encode($data);
	}
	
	public function get_employee_email($employee_id){
		echo json_encode($this->job_history->get_employee_email($employee_id));
	}

	// private function update_profexp($employee_id, $professional_exp)
	// {
	// 	$this->employee_profexp->remove($employee_id);
	// 	foreach($professional_exp as $prof){
	// 		$this->employee_profexp->add($employee_id, $prof);
	// 	}
	// }

	private function update_skills($employee_id, $skills)
	{
		$this->employee_skill->remove($employee_id);
		foreach($skills as $skill){
			$this->employee_skill->add($employee_id, $skill);
		}
	}

	private function update_references($employee_id, $references)
	{
		$this->employee_reference->remove($employee_id);
		foreach($references as $reference){
			$this->employee_reference->add($employee_id, $reference);
		}
	}

	public function download($employee_id)
	{	
		$this->admin_only();

		$data['cv'] = $this->curriculum_vitae->get_curriculum_vitae($employee_id);
		$data['skills'] = $this->employee_skill->get_skill($employee_id);
		$data['references'] = $this->employee_reference->get_reference($employee_id);
		$data['pe'] = $this->employee_profexp->get_professional_experience($employee_id);
		$data['languages'] = $this->employee_language->get_language($employee_id);
		$data['hobbies'] = $this->employee_hobby->get_hobby($employee_id);
		$data['job_history'] = $this->job_history->get_job_history($employee_id);
		$data['employee'] = $this->employee->get_by_id($employee_id);
		$data['children'] = $this->employee_child->get_children($employee_id);

		$header['title'] = 'Personal Details'; 
		$this->load->view('employee/download', $data);
	}

	private function check_employee_access($employee_id = null){
		$isAdmin = $this->isAdmin();
		if($employee_id != null && !$isAdmin) {
			redirect('employee/profile/');
		}
		else{
			return $employee_id;
		}
	}

	public function create(){
		$this->check_user_session();
		$data = $this->input->post();

		$temp = array(
			'company_id' => $data['company_id'],
			'employee_first_name' => $data['firstname'],
			'employee_last_name' => $data['lastname'],
			'employee_office_email' => $data['office_email'],
			'employee_role' => $data['role_id'],
			'employee_is_regular' => $data['is_regular'],
			'employee_photo' => 'user_profile.png'
		);

		$this->employee->create($temp);
		echo json_encode([
			// 'temp' => $temp,
			'success' => true,
		]);
	}

	public function add_travel_history($employee_id){
		$data = $this->input->post();

		$travel_history_data = array(
			'employee_id' => $employee_id,
			'employee_travel_history_country' => $data['country'],
			'employee_travel_history_date_enter' => $data['date_enter'],
			'employee_travel_history_date_exit' => $data['date_exit'],
			'employee_travel_history_status' => 'active'
		);

		$this->travel_history->addTravelHistory($travel_history_data);

		echo json_encode(array('success' => true));
	}

	public function delete_travel_history($employee_travel_history_id){
		$this->travel_history->delete_travel_history($employee_travel_history_id);

		echo json_encode(array('success' => true));
	}

	public function get_travel_history($employee_id)
	{
		$search = $this->input->post('search');
		$cur_page = $this->input->post('page');

		$total_rows = $this->travel_history->get_travel_history_rows($search, $employee_id);
		$start = $this->getStartRow($cur_page, PER_PAGE);

		$data = array(
			'list' => $this->travel_history->get_travel_history_data($start, PER_PAGE, $search, $employee_id),
			'pagination' => $this->createPagination($total_rows, PER_PAGE, $cur_page)
		);

		echo json_encode($data);
	}

	 function do_upload_photos(){
		$config['upload_path'] = realpath(APPPATH.'../asset/employees');
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '0';
		$this->load->library('upload', $config);

		if(!$this->upload->do_upload('picture')){
			$errors = $this->upload->display_errors();
			return null;
		}
		return $this->upload->data();
	}

	public function remove_job_history($job_history_id){
		$this->job_history->remove_service_scope($job_history_id);
		echo json_encode(array('success' => true));
	}

	public function get_job_history($employee_id)
	{	
		$cur_page = $this->input->post('page');
		$total_rows = $this->job_history->get_job_rows($employee_id);
		$start = $this->getStartRow($cur_page, 5);

		$data = array(
			'list' => $this->get_service_scope_list($this->job_history->get_job_data($start, 5, $employee_id)),
			'pagination' => $this->createPagination($total_rows, 5, $cur_page)
		);
		
		echo json_encode($data);
	}

	public function delete_job_history($employee_job_history_id){
		$this->job_history->delete_job($employee_job_history_id);
		echo json_encode(array('success' => true));
	}

	public function get_profile($employee_id) {
		// $result = $this->employee->get_by_id($employee_id);
		// echo json_encode($result);

		if ($employee_id == null) 
		$employee_id = $this->session->userdata('employee_id');

		$result = $this->employee->get_by_id($employee_id);

		echo json_encode($result);
	}

	public function update($employee_id) {
		$data = $this->input->post();
		$employee = $this->employee->get_by_id($employee_id);
		$data['employee_photo'] = $employee->employee_photo;

		if ($_FILES && $_FILES['picture']['name'] !== '') {
			$profile = $this->do_upload_photo();
			$data['picture'] = $profile['file_name'];

			if(
				$employee->employee_photo &&
				file_exists(realpath(".").'/asset/employees/'.$employee->employee_photo)
			) {
				unlink(realpath(".").'/asset/employees/'.$employee->employee_photo);
			}
		
		}

		$this->employee->edit($employee_id, $data);

		echo json_encode([
			'success' => true,
		]);
	}

	public function change_profile($employee_id) {
		$profile = $this->do_upload_photo();
		$employee = $this->employee->get_by_id($employee_id);
		if(
			$employee->employee_photo  &&
			file_exists(realpath(".").'asset/employees/'.$employee->employee_photo)
		) {	
			unlink(realpath(".").'asset/employees/'.$employee->employee_photo);
		}
		$this->employee->change_profile($employee_id, $profile['file_name']);

		echo json_encode([
			$employee,
			'success' => true,
			'filepath' => base_url() . 'asset/employees/' . $profile['file_name'],
		]);
	}

	public function add_cv($employee_id) {
		$profile = $this->do_upload_cv();
		$employee = $this->employee->get_by_id($employee_id);
		if(
			$employee->employee_cv_upload  &&
			file_exists(realpath(".").'/asset/cv/'.$employee->employee_cv_upload)
		) {	
			unlink(realpath(".").'/asset/cv/'.$employee->employee_cv_upload);
		}
		$this->employee->change_cv($employee_id, $profile['file_name']);

		echo json_encode([
			'success' => true,
			'filepath' => base_url() . '/asset/cv/' . $profile['file_name'],
		]);
	}

	private function upload_photo($files) {
		$config['upload_path'] = realpath(APPPATH.'../asset/employees/requirements');
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '0';

		$this->load->library('upload', $config);

		if(!$this->upload->do_upload($files)){
			$errors = $this->upload->display_errors();
			return null;
		}
		return $this->upload->data();
	}

	private function set_requirements_name($key){
		$requirement = "";

		if($key == "employee_img_cv"){
			$requirement = "CV" . ", ";
		}else if($key == "employee_img_passport"){
			$requirement = "PASSPORT" . ", ";
		}else if($key == "employee_img_sss"){
			$requirement = "SSS" . ", ";
		}else if($key == "employee_img_swab"){
			$requirement = "SWAB RESULTS" . ", ";
		}else if($key == "employee_img_tin"){
			$requirement = "TIN" . ", ";
		}else if($key == "employee_img_pagibig"){
			$requirement = "PAGIBIG" . ", ";
		}else if($key == "employee_img_signature"){
			$requirement = "SIGNATURE" . ", ";
		}else if($key == "employee_img_philhealth"){
			$requirement = "PHILHEALTH" . ", ";
		}else if($key == "employee_img_bpi"){
			$requirement = "BPI" . ", ";
		}else if($key == "employee_img_medical"){
			$requirement = "MEDICAL";
		}else if($key == "employee_img_nbi"){
			$requirement = "NBI/POLICE CLEARANCE";
		}

		return $requirement;
	}

	public function add_requirements($employee_id) {
		$employee = $this->employee->get_by_id($employee_id);
		$form_files = json_decode($this->input->post('form_files'), true);  
		$returnFiles = [];
		$base_path = realpath(".").'/asset/employees/requirements/';
		$requirements = "";

		foreach ($form_files as $form_file) {
			$file_name = $this->generateRandomString(10) . '.png';
			if ( $employee->{$form_file['key']} && file_exists($base_path . $employee->{$form_file['key']}) ) {
				unlink( $base_path . $employee->{$form_file['key']} );
			}
			$update = [];
			array_push($returnFiles, [
				'name' => $file_name,
				'key' => $form_file['key'],
			]);
			$update[$form_file['key']] = $file_name;

			$requirements .= $this->set_requirements_name($form_file['key']);

			$this->employee->add_req($employee_id, $update);
			file_put_contents(
				$base_path . $file_name, 
				base64_decode($form_file['value'])
			);
		}
		
		$this->send_email_notification($employee, $requirements);
		$this->send_notification($employee_id, $requirements);
		
		echo json_encode([
			'form_files' => $form_files, 
			'success' => true,
		]);
		
	}

	private function send_email_notification($employee, $requirements){
		$config = $this->getEmailConfig();
        $subject = 'HOTWORK CMS - REQUIREMENTS';
        $sender = 'DONOTREPLY-HOTWARE@hotwork.ag';
        $senderName = 'HOTWORK CMS';
        $receiver = FRANCO_EMAIL;

        $data['name'] = $employee->employee_first_name . ' ' . $employee->employee_last_name;
        $data['requirements'] = $requirements;
        $data['uploaded_date'] = date("Y-m-d");

        $message = $this->load->view('template/email/send_requirement_notification_email', $data, TRUE);
        $this->sendEmail($config, $receiver, $sender, $senderName, $subject, $this->compressHtml($message));
	}

	private function send_notification($employee_id, $requirements){
		$data = [
			'notification_category' => 'employee',
			'notification_type' => 'requirements',
			'notification_type_id' => $employee_id,
			'notification_details' => $requirements,
			'notification_date' => date('Y-m-d'),
			'notification_status' => 'unread'
		];

		$this->notification->insert($data);
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

		header("Location: " . base_url() . 'employee/profile/' . $notification_type_id);
	}

	public function evaluation_report($employee_id) {
		// check if session exists
        $this->check_user_session();
		$this->admin_only();
	
		$this->loadView('employee/evaluation_report', ['employee_id' => $employee_id]);
	}

	public function get_evaluation_report($employee_id) {
		$employee = $this->employee->get_by_id($employee_id);

		$return_data = $this->employee_evaluation_report->findRow([
			'employee_id' => $employee_id
		]);
		if (isset($return_data)) {
			$return_data->employee_role_id = $employee->employee_role;
			echo json_encode($return_data);
		} else {

		echo json_encode(null);
		}
	}

	public function store_evaluation_report($employee_id) {
		$data = [
			'employee_id' => $employee_id,
			'evaluation_report_data' => $this->input->post('evaluation_report_data'),
		];
		$exists = $this->employee_evaluation_report->findRow(['employee_id' => $employee_id]);
		if ($exists) {
			$this->employee_evaluation_report->update(
				$exists->employee_evaluation_report_id, 
				$data
			);
			echo json_encode(['success' => true]);
			return;
		}
		$insert_id = $this->employee_evaluation_report->insert($data);
		$this->employee_evaluation_report->findRow([
			'employee_id' => $employee_id
		]);

		echo json_encode([
			'success' => true,
		]);
	}

	public function delete_tin($employee_id){
		$employee = $this->employee->get_by_id($employee_id);
		// print_r($employee->employee_img_tin);die();
		if(
			$employee->employee_img_tin  &&
			file_exists(realpath(".").'/asset/employees/requirements/'.$employee->employee_img_tin)
		) {	
			unlink(realpath(".").'/asset/employees/requirements/'.$employee->employee_img_tin);
		}	
		$this->db->update('employee' ,array('employee_img_tin' => NULL));
		$this->db->where('employee_id', $employee_id);
		echo json_encode(array('success' => true)); 
		//return $this->db->affected_rows();
	}

	public function delete_sss($employee_id){
		$employee = $this->employee->get_by_id($employee_id);
		// print_r($employee->employee_img_tin);die();
		if(
			$employee->employee_img_tin  &&
			file_exists(realpath(".").'/asset/employees/requirements/'.$employee->employee_img_tin)
		) {	
			unlink(realpath(".").'/asset/employees/requirements/'.$employee->employee_img_tin);
		}	
		$this->db->update('employee' ,array('employee_img_sss' => NULL));
		$this->db->where('employee_id', $employee_id);
		echo json_encode([
			'success' => true,
		]);
	}

	public function delete_pagibig($employee_id){
		$employee = $this->employee->get_by_id($employee_id);
		// print_r($employee->employee_img_tin);die();
		if(
			$employee->employee_img_tin  &&
			file_exists(realpath(".").'/asset/employees/requirements/'.$employee->employee_img_tin)
		) {	
			unlink(realpath(".").'/asset/employees/requirements/'.$employee->employee_img_tin);
		}	
		$this->db->update('employee' ,array('employee_img_pagibig' => NULL));
		$this->db->where('employee_id', $employee_id);
		echo json_encode(array('success' => true));
	}

	public function delete_philhealth($employee_id){
		$employee = $this->employee->get_by_id($employee_id);
		// print_r($employee->employee_img_tin);die();
		if(
			$employee->employee_img_tin  &&
			file_exists(realpath(".").'/asset/employees/requirements/'.$employee->employee_img_tin)
		) {	
			unlink(realpath(".").'/asset/employees/requirements/'.$employee->employee_img_tin);
		}	
		$this->db->update('employee' ,array('employee_img_philhealth' => NULL));
		$this->db->where('employee_id', $employee_id);
		echo json_encode(array('success' => true));
	}

	public function delete_bpi($employee_id){
		$employee = $this->employee->get_by_id($employee_id);
		// print_r($employee->employee_img_tin);die();
		if(
			$employee->employee_img_tin  &&
			file_exists(realpath(".").'/asset/employees/requirements/'.$employee->employee_img_tin)
		) {	
			unlink(realpath(".").'/asset/employees/requirements/'.$employee->employee_img_tin);
		}	
		$this->db->update('employee' ,array('employee_img_bpi' => NULL));
		$this->db->where('employee_id', $employee_id);
		echo json_encode(array('success' => true));
	}

	public function delete_cv($employee_id){
		$employee = $this->employee->get_by_id($employee_id);
		// print_r($employee->employee_img_tin);die();
		if(
			$employee->employee_img_tin  &&
			file_exists(realpath(".").'/asset/employees/requirements/'.$employee->employee_img_tin)
		) {	
			unlink(realpath(".").'/asset/employees/requirements/'.$employee->employee_img_tin);
		}	
		$this->db->update('employee' ,array('employee_img_cv' => NULL));
		$this->db->where('employee_id', $employee_id);
		echo json_encode(array('success' => true));
	}

	public function delete_passport($employee_id){
		$employee = $this->employee->get_by_id($employee_id);
		// print_r($employee->employee_img_tin);die();
		if(
			$employee->employee_img_tin  &&
			file_exists(realpath(".").'/asset/employees/requirements/'.$employee->employee_img_tin)
		) {	
			unlink(realpath(".").'/asset/employees/requirements/'.$employee->employee_img_tin);
		}	
		$this->db->update('employee' ,array('employee_img_passport' => NULL));
		$this->db->where('employee_id', $employee_id);
		echo json_encode(array('success' => true));
	}

	public function delete_medical($employee_id){
		$employee = $this->employee->get_by_id($employee_id);
		// print_r($employee->employee_img_tin);die();
		if(
			$employee->employee_img_tin  &&
			file_exists(realpath(".").'/asset/employees/requirements/'.$employee->employee_img_tin)
		) {	
			unlink(realpath(".").'/asset/employees/requirements/'.$employee->employee_img_tin);
		}	
		$this->db->update('employee' ,array('employee_img_medical' => NULL));
		$this->db->where('employee_id', $employee_id);
		echo json_encode(array('success' => true));
	}

	public function delete_nbi($employee_id){
		$employee = $this->employee->get_by_id($employee_id);
		// print_r($employee->employee_img_tin);die();
		if(
			$employee->employee_img_tin  &&
			file_exists(realpath(".").'/asset/employees/requirements/'.$employee->employee_img_tin)
		) {	
			unlink(realpath(".").'/asset/employees/requirements/'.$employee->employee_img_tin);
		}	
		$this->db->update('employee' ,array('employee_img_nbi' => NULL));
		$this->db->where('employee_id', $employee_id);
		echo json_encode(array('success' => true));
	}

	public function delete_swab($employee_id){
		$employee = $this->employee->get_by_id($employee_id);
		// print_r($employee->employee_img_tin);die();
		if(
			$employee->employee_img_tin  &&
			file_exists(realpath(".").'/asset/employees/requirements/'.$employee->employee_img_tin)
		) {	
			unlink(realpath(".").'/asset/employees/requirements/'.$employee->employee_img_tin);
		}	
		$this->db->update('employee' ,array('employee_img_swab' => NULL));
		$this->db->where('employee_id', $employee_id);
		echo json_encode(array('success' => true));
	}

	public function delete_signature($employee_id){
		$employee = $this->employee->get_by_id($employee_id);
		// print_r($employee->employee_img_tin);die();
		if(
			$employee->employee_img_tin  &&
			file_exists(realpath(".").'/asset/employees/requirements/'.$employee->employee_img_tin)
		) {	
			unlink(realpath(".").'/asset/employees/requirements/'.$employee->employee_img_tin);
		}	
		$this->db->update('employee' ,array('employee_img_signature' => NULL));
		$this->db->where('employee_id', $employee_id);
		echo json_encode(array('success' => true));
	}


	
}