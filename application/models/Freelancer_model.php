<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseModel.php';

class Freelancer_model extends Base_Model {

    private $table = 'freelancer';

    public function __construct() {
		parent::__construct($this->table);
	}

	public function get($start, $limit, $search = null){
		parent::search_string($search);
		$this->db->select('freelancer.*, CONCAT(freelancer.freelancer_first_name, " ", freelancer.freelancer_last_name) as freelancer_fullname');
		$this->db->where('freelancer_status', 'active');
		$this->db->order_by('freelancer_id ASC');
		return parent::get($start, $limit);
	}

	public function total_rows($search = null){
		parent::search_string($search);
		$this->db->where('freelancer_status', 'active');
		return parent::count_rows();
	}
	
	public function checkdata($username, $password){
		
		$this->db->where('freelancer_username', $username);
		$this->db->where('freelancer_password', md5($password));
		$query = $this->db->get($this->table);
		return $query->row();
	}
	
	public function create($data){
		$data['freelancer_username'] = $data['freelancer_email'];
		$data['freelancer_password'] = md5(12345);
		$data['freelancer_status'] = 'active';
		$data['freelancer_role'] = 6;
		$this->db->insert($this->table, $data);
	}

	public function get_by_email(){
		$this->db->select('*');
		$this->db->where('freelancer_status', 'active');
		$this->db->where('freelancer_email !=', '');

		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function checkEmailIfExists($email){
		$this->db->where('freelancer_email', $email);

		return $this->db->get($this->table)->row();
	}

	public function get_email_id($email){
		$this->db->select('freelancer_id');
		$this->db->where('freelancer_email', $email);

		return $this->db->get($this->table)->row();
	}

    public function add($data) {
		$insert = [
			// 'freelancer_CV' => $data['freelancer_CV'],
			'freelancer_first_name' => $data['freelancer_first_name'],
			'freelancer_middle_name' => $data['freelancer_middle_name'],
			'freelancer_last_name' => $data['freelancer_last_name'],
			'freelancer_birthdate' => $data['freelancer_birthdate'],
			'freelancer_contact' => $data['freelancer_contact'],
			'freelancer_email' => $data['freelancer_email'],
			'freelancer_profile' => $data['freelancer_profile'],
			'freelancer_civil_status' => $data['freelancer_civil_status'],
			'freelancer_barangay_street' => $data['freelancer_barangay_street'],
			'freelancer_city' => $data['freelancer_city'],
			'freelancer_province' => $data['freelancer_province'],
			'freelancer_zip_code' => $data['freelancer_zip_code'],
            'freelancer_position' => $data['freelancer_position'],
			'freelancer_emergency_contact_num' => $data['freelancer_emergency_contact_num'],
			'freelancer_emergency_contact_name' => $data['freelancer_emergency_contact_name'],
			'freelancer_emergency_relationship' => $data['freelancer_emergency_relationship'],
			// 'freelancer_emergency_email' => $data['freelancer_emergency_email'],
			'freelancer_TIN' => $data['freelancer_TIN'],
			'freelancer_BPI' => $data['freelancer_BPI'],
            'freelancer_SSS' => $data['freelancer_SSS'],
            'freelancer_PAG_IBIG' => $data['freelancer_PAG_IBIG'],
            'freelancer_PHILHEALTH' => $data['freelancer_PHILHEALTH'],
            'freelancer_site_deployment' => (isset($data['freelancer_site_deployment'])) ? $data['freelancer_site_deployment'] : '',
            'freelancer_site_deployment_others' => $data['freelancer_site_deployment_others'],
            'freelancer_handbook' => (isset($data['freelancer_handbook'])) ? 1 : 0,
            'freelancer_employment_contract' => (isset($data['freelancer_employment_contract'])) ? 1 : 0,
            'freelancer_id_badges' => (isset($data['freelancer_id_badges'])) ? 1 : 0,
			'freelancer_status' => 'active',
		];

		$this->db->insert($this->table, $insert);
		return $this->db->insert_id();
	}
	
	public function get_by_id($freelancer_id) {
		$this->db->select('freelancer.*, CONCAT(freelancer.freelancer_first_name, " ", freelancer.freelancer_last_name) as freelancer_fullname');
		// $this->db->join('role', 'freelancer.freelancer_role = role.role_id', 'left'); 
		$this->db->where('freelancer_id', $freelancer_id);
		$this->db->where('freelancer_status', 'active');
		$query = $this->db->get($this->table);
		return $query->row();
	}


	public function add_req($freelancer_id, $data)
	{
		
		$this->db->where('freelancer_id', $freelancer_id);
		$this->db->where('freelancer_status', 'active');
		$this->db->update($this->table, $data);	
		return $data;
	}

	public function save_password($freelancer_id, $password)
	{
		$data = array(
			'freelancer_password' => $password
		);

		$this->db->where('freelancer_id', $freelancer_id);
		$this->db->update($this->table, $data);
    }
	

	public function get_freelancer_id($freelancer_id) {
		$this->db->where('freelancer_id', $freelancer_id);
		$this->db->where('freelancer_status', 'active');
		$query = $this->db->get($this->table);
		return $query->row();
	}



	public function update($freelancer_id, $data) {
		$update = [
			'freelancer_first_name' => $data['freelancer_first_name'],
			'freelancer_middle_name' => $data['freelancer_middle_name'],
			'freelancer_last_name' => $data['freelancer_last_name'],
			'freelancer_birthdate' => $data['freelancer_birthdate'],
			'freelancer_contact' => $data['freelancer_contact'],
			'freelancer_email' => $data['freelancer_email'],
			'freelancer_profile' => $data['freelancer_profile'],
			'freelancer_civil_status' => $data['freelancer_civil_status'],
			'freelancer_barangay_street' => $data['freelancer_barangay_street'],
			'freelancer_city' => $data['freelancer_city'],
			'freelancer_province' => $data['freelancer_province'],
			'freelancer_zip_code' => $data['freelancer_zip_code'],
            'freelancer_position' => $data['freelancer_position'],
			'freelancer_emergency_contact_num' => $data['freelancer_emergency_contact_num'],
			'freelancer_emergency_contact_name' => $data['freelancer_emergency_contact_name'],
			'freelancer_emergency_relationship' => $data['freelancer_emergency_relationship'],
			// 'freelancer_emergency_email' => $data['freelancer_emergency_email'],
			'freelancer_TIN' => $data['freelancer_TIN'],
			'freelancer_BPI' => $data['freelancer_BPI'],
            'freelancer_SSS' => $data['freelancer_SSS'],
            'freelancer_PAG_IBIG' => $data['freelancer_PAG_IBIG'],
            'freelancer_PHILHEALTH' => $data['freelancer_PHILHEALTH'],
            'freelancer_site_deployment' => (isset($data['freelancer_site_deployment'])) ? $data['freelancer_site_deployment'] : '',
            // 'freelancer_site_deployment_others' => $data['freelancer_site_deployment_others'],
            'freelancer_handbook' => (isset($data['freelancer_handbook'])) ? 1 : 0,
            'freelancer_employment_contract' => (isset($data['freelancer_employment_contract'])) ? 1 : 0,
            'freelancer_id_badges' => (isset($data['freelancer_id_badges'])) ? 1 : 0,
			'freelancer_status' => 'active',
		];


		$this->db->where('freelancer_id', $freelancer_id);
		$this->db->where('freelancer_status', 'active');
		$this->db->update($this->table, $update);
	}

	public function remove($freelancer_id) {
		$data = ['freelancer_status' => 'deleted'];
		$this->db->where('freelancer_id', $freelancer_id);
		$this->db->where('freelancer_status', 'active');
		$this->db->update($this->table, $data);
	}

	public function change_profile($freelancer_id, $file_name) {
		$data['freelancer_profile'] = $file_name;
		$this->db->where('freelancer_id', $freelancer_id);
		$this->db->where('freelancer_status', 'active');
		$this->db->update($this->table, $data);
	}

}