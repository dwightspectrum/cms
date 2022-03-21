<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseModel.php';

class Employee_model extends Base_Model {

	private $table = 'employee';

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function get_by_id($employee_id){
		$this->db->select('employee.*, CONCAT(employee.employee_first_name, " ", employee.employee_last_name) as employee_fullname');
		$this->db->where('employee_id', $employee_id);
		$query = $this->db->get($this->table);
		return $query->row();
	}

	public function get_by_email(){
		$this->db->select('*');
		$this->db->where('employee_status', 'active');
		$this->db->where('employee_office_email !=', '');
		$this->db->order_by('employee_id', 'asc');
		
		$query = $this->db->get($this->table);
		return $query->result();
	}
	
	public function checkEmailIfExists($email){
		$this->db->where('employee_office_email', $email);

		return $this->db->get($this->table)->row();
	}

	public function get_all(){
		$this->db->select('employee_id, employee_first_name, employee_last_name');
		$this->db->order_by('employee_first_name ASC');
		$query = $this->db->get('employee');
		return $query->result();
	}

	public function get($start, $limit, $search = null){
		parent::search_string($search);

		$this->db->select('employee.*, company.company_name, CONCAT(employee.employee_first_name, " ", employee.employee_last_name) as employee_fullname, CONCAT("'.base_url().'asset/employees/",employee.employee_photo) as employee_profile');
		$this->db->where('employee_status', 'active');
		$this->db->join('company', 'employee.company_id = company.company_id', 'left');
		$this->db->order_by('employee_id ASC');

		return parent::get($start, $limit);
	}


	public function total_rows($search = null){
		parent::search_string($search);
		$this->db->where('employee_status', 'active');
		return parent::count_rows();
	}

	public function checkdata($username, $password){
		$this->db->where('employee_username', $username);
		$this->db->where('employee_password', md5($password));
		$query = $this->db->get($this->table);
		return $query->row();
	}

	// -------------------------------------------------------------------------------
	public function checkdatafreelance($username, $password){
		$this->db->where('freelancer_username', $username);
		$this->db->where('freelancer_password', md5($password));
		$query = $this->db->get_freelance($this->table);
		return $query->row();
	}

	public function add_employee($data)
	{
		$insert = array(
	        'employee_username' => $data['employee_office_email'],
	        'employee_password' => md5(123),
	        'employee_initial' => substr(ucfirst($data['employee_first_name']), 0, 1).substr(ucfirst($data['employee_middle_name']), 0, 1).substr(ucfirst($data['employee_last_name']), 0, 1),
	        'employee_photo' => $data['employee_photo'],
	        'company_id' => $data['company_id'],
	        'employee_first_name' => $data['employee_first_name'],
	        'employee_last_name' => $data['employee_last_name'],
	        'employee_middle_name' => $data['employee_middle_name'],
	        'employee_city_address' => $data['employee_city_address'],
	        'employee_provincial_address' => $data['employee_provincial_address'],
	        'employee_birthdate' => $data['employee_birthdate'],
	        'employee_birthplace' => $data['employee_birthplace'],
	        'employee_mobile_number' => $data['employee_mobile_number'],
	        'employee_landline_number' => $data['employee_landline_number'],
	        'employee_personal_email' => $data['employee_personal_email'],
	        'employee_office_email' => $data['employee_office_email'],
	        'employee_start_date' => $data['employee_start_date'],
	        'employee_civil_status' => $data['employee_civil_status'],
	        'employee_gender' => $data['employee_gender'],
	        'employee_religion' => $data['employee_religion'],
	        'employee_blood_type' => $data['employee_blood_type'],
	        'employee_religion' => $data['employee_religion'],
	        'employee_weight' => $data['employee_weight'],
	        'employee_height' => $data['employee_height'],
	        'employee_emergency_contact_name' => $data['employee_emergency_contact_name'],
	        'employee_emergency_relationship' => $data['employee_emergency_relationship'],
	        'employee_emergency_contact_number' => $data['employee_emergency_contact_number'],
	        'employee_emergency_email' => $data['employee_emergency_email'],
	        'employee_father_first_name' => $data['employee_father_first_name'],
	        'employee_father_last_name' => $data['employee_father_last_name'],
	        'employee_father_middle_name' => $data['employee_father_middle_name'],
	        'employee_mother_first_name' => $data['employee_mother_first_name'],
	        'employee_mother_maiden_last_name' => $data['employee_mother_maiden_last_name'],
	        'employee_mother_maiden_middle_name' => $data['employee_mother_maiden_middle_name'],
	        'employee_spouse_name' => $data['employee_spouse_name'],
			'employee_spouse_first_name' => $data['employee_spouse_first_name'],
			'employee_spouse_middle_name' => $data['employee_spouse_middle_name'],
			'employee_spouse_last_name' => $data['employee_spouse_last_name'],
	        'employee_spouse_birthdate' => $data['employee_spouse_birthdate'],
	        'employee_spouse_birthplace' => $data['employee_spouse_birthplace'],
	        'employee_spouse_occupation' => $data['employee_spouse_occupation'],
	        'employee_spouse_office_number' => $data['employee_spouse_office_number'],
	        'employee_sss_number' => $data['employee_sss_number'],
	        'employee_pagibig_number' => $data['employee_pagibig_number'],
	        'employee_phealth_number' => $data['employee_phealth_number'],
	        'employee_tin_number' => $data['employee_tin_number'],
	        'employee_umid_number' => $data['employee_umid_number'],
	        'employee_passport_number' => $data['employee_passport_number'],
	        'employee_passport_issue_date' => $data['employee_passport_issue_date'],
	        'employee_passport_expiry_date' => $data['employee_passport_expiry_date'],
	        'employee_passport_issue_location' => $data['employee_passport_issue_location'],
	        'employee_passport_copy' => $data['employee_passport_copy'],
			//'employee_cv' => $data['employee_cv'],
	        'employee_certificate' => $data['employee_certificate'],
			'employee_bpi_number' => $data['employee_bpi_number'],
	        'employee_status' => 'active',
	        'employee_role' => 1,
	        'employee_is_regular' => 1
		);

		$this->db->insert($this->table, $insert);
		$id = $this->db->insert_id();

		return $id;
	}

	public function add_req($employee_id, $data)
	{
		$this->db->where('employee_id', $employee_id);
		$this->db->where('employee_status', 'active');
		$this->db->update($this->table, $data);	
		return $data;
	}

	public function edit($employee_id, $data)
	{
		$updates = array(
	        'employee_initial' => substr(ucfirst($data['employee_first_name']), 0, 1).substr(ucfirst($data['employee_middle_name']), 0, 1).substr(ucfirst($data['employee_last_name']), 0, 1),
	        // 'company_id' => $data['company_id'],
	        'employee_first_name' => $data['employee_first_name'],
	        'employee_last_name' => $data['employee_last_name'],
	        'employee_middle_name' => $data['employee_middle_name'],
	        'employee_city_address' => $data['employee_city_address'],
	        'employee_provincial_address' => $data['employee_provincial_address'],
			// 'employee_address_zip_code' => $data['eemployee_address_zip_code'],
	        'employee_birthdate' => $data['employee_birthdate'],
	        'employee_birthplace' => $data['employee_birthplace'],
	        'employee_mobile_number' => $data['employee_mobile_number'],
	        'employee_landline_number' => $data['employee_landline_number'],
	        'employee_personal_email' => $data['employee_personal_email'],
	        'employee_office_email' => $data['employee_office_email'],
	        'employee_start_date' => $data['employee_start_date'],
	        'employee_civil_status' => $data['employee_civil_status'],
	        'employee_gender' => $data['employee_gender'],
	        'employee_religion' => $data['employee_religion'],
	        'employee_blood_type' => $data['employee_blood_type'],
	        'employee_religion' => $data['employee_religion'],
	        'employee_weight' => $data['employee_weight'],
	        'employee_height' => $data['employee_height'],
	        'employee_emergency_contact_name' => $data['employee_emergency_contact_name'],
	        'employee_emergency_relationship' => $data['employee_emergency_relationship'],
	        'employee_emergency_contact_number' => $data['employee_emergency_contact_number'],
	        'employee_emergency_email' => $data['employee_emergency_email'],
	        'employee_father_first_name' => $data['employee_father_first_name'],
	        'employee_father_last_name' => $data['employee_father_last_name'],
	        'employee_father_middle_name' => $data['employee_father_middle_name'],
	        'employee_mother_first_name' => $data['employee_mother_first_name'],
	        'employee_mother_maiden_last_name' => $data['employee_mother_maiden_last_name'],
	        'employee_mother_maiden_middle_name' => $data['employee_mother_maiden_middle_name'],
	        // 'employee_spouse_name' => $data['employee_spouse_name'],
			'employee_spouse_first_name' => $data['employee_spouse_first_name'],
			'employee_spouse_middle_name' => $data['employee_spouse_middle_name'],
			'employee_spouse_last_name' => $data['employee_spouse_last_name'],
	        'employee_spouse_birthdate' => $data['employee_spouse_birthdate'],
	        'employee_spouse_birthplace' => $data['employee_spouse_birthplace'],
	        'employee_spouse_occupation' => $data['employee_spouse_occupation'],
	        'employee_spouse_office_number' => $data['employee_spouse_office_number'],
	        'employee_sss_number' => $data['employee_sss_number'],
	        'employee_pagibig_number' => $data['employee_pagibig_number'],
	        'employee_phealth_number' => $data['employee_phealth_number'],
	        'employee_tin_number' => $data['employee_tin_number'],
	        'employee_umid_number' => $data['employee_umid_number'],
	        'employee_passport_number' => $data['employee_passport_number'],
	        'employee_passport_issue_date' => $data['employee_passport_issue_date'],
	        'employee_passport_expiry_date' => $data['employee_passport_expiry_date'],
	        'employee_passport_issue_location' => $data['employee_passport_issue_location'],
			'employee_bpi_number' => $data['employee_bpi_number'],
	        'employee_status' => 'active'
		);

		if(isset($data['employee_cv'])){
			$updates['employee_cv'] = $data['employee_cv'];
		}

		if(isset($data['employee_passport_copy'])){
			$updates['employee_passport_copy'] = $data['employee_passport_copy'];
		}

		if(isset($data['employee_certificate'])){
			$updates['employee_certificate'] = $data['employee_certificate'];
		}

		$this->db->where('employee_id', $employee_id);
		$this->db->where('employee_status', 'active');
		$this->db->update($this->table, $updates);
	}

	public function update_profile($employee_id, $file_name)
	{
		$data = array('employee_photo' => $file_name);
		$this->db->where('employee_id', $employee_id);
		$this->db->update($this->table, $data);
	}

	public function change_password($employee_id)
	{
		$data = array('employee_password' => md5($this->input->post('employee_password')));

		$this->db->where('employee_id', $employee_id);
		$this->db->update($this->table, $data);
	}

	public function save_password($employee_id, $password)
	{
		$data = array(
			'employee_password' => $password
		);

		$this->db->where('employee_id', $employee_id);
		$this->db->update($this->table, $data);
    }

	public function get_email_id($email){
		$this->db->select('employee_id');
		$this->db->where('employee_office_email', $email);

		return $this->db->get($this->table)->row();
	}

	public function create($data){
		$data['employee_username'] = $data['employee_office_email'];
		$data['employee_password'] = md5(12345);
		$data['employee_status'] = 'active';

		$this->db->insert($this->table, $data);
	}

	public function total_employees(){
		$this->db->select('COUNT(*) as employee_count');
		$this->db->not_like('employee_role', 6);
		$query = $this->db->get($this->table);
		return $query->row();
	}

	public function total_freelancers(){
		$this->db->select('COUNT(*) as employee_count');
		$this->db->like('employee_role', 6);
		$query = $this->db->get($this->table);
		return $query->row();
	}

	public function saveSignature($employee_id, $file){
		$data = array('employee_signature' => $file);
		$this->db->where('employee_id', $employee_id);
		$this->db->update('employee', $data);
	}

	public function get_employee_by_project($purchase_order_id){
		$this->db->select('employee_id, employee_first_name, employee_last_name, employee_middle_name');
		$this->db->like('employee_role', 5);
		$this->db->or_like('employee_role', 6);

		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function change_profile($employee_id, $file_name) {
		$data['employee_photo'] = $file_name;
		$this->db->where('employee_id', $employee_id);
		$this->db->where('employee_status', 'active');
		$this->db->update($this->table, $data);
	}

	public function change_cv($employee_id, $file_name) {
		$data['employee_cv_upload'] = $file_name;
		$this->db->where('employee_id', $employee_id);
		$this->db->where('employee_status', 'active');
		$this->db->update($this->table, $data);
	}
	
}

/* End of file  */
/* Location: ./application/models/ */