<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseModel.php'; 

class CurriculumVitae_model extends Base_Model {

	private $table = 'employee_curriculum_vitae';

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function add($employee_id, $data)
	{
		$insert = array(
	        'employee_id' => $employee_id,
			'employee_address_zip_code' => $data['employee_address_zip_code'],
			'employee_desired_position' => $data['employee_desired_position'],
	        // 'employee_object' => $data['employee_object'],
	        // 'employee_school_name' => $data['school_name'],
	        // 'employee_school_address' => $data['school_address'],
	        // 'employee_course' => $data['course'],
	        // 'employee_graduate' => $data['graduate'],
	        // 'employee_graduate_year' => $data['graduate_year'],
	        'employee_curriculum_vitae_status' => 'active'
		);

		$this->db->insert($this->table, $insert);
	}

	public function update($employee_id, $data)
	{
		$insert = array(
	        'employee_id' => $employee_id,
			'employee_address_zip_code' => $data['employee_address_zip_code'],
			'employee_desired_position' => $data['employee_desired_position'],
	        // 'employee_object' => $data['employee_object'],
	        // 'employee_school_name' => $data['school_name'],
	        // 'employee_school_address' => $data['school_address'],
	        // 'employee_course' => $data['course'],
	        // 'employee_graduate' => $data['graduate'],
	        // 'employee_graduate_year' => $data['graduate_year'],
	        'employee_curriculum_vitae_status' => 'active'
		);

		$this->db->update($this->table, $insert);
	}
	
	public function get_curriculum_vitae($employee_id){
		//$this->db->select('*');
		$this->db->where('employee_id', $employee_id);
		$this->db->where('employee_curriculum_vitae_status', 'active');

		$query = $this->db->get($this->table);

		return $query->row();
	}

	// public function get_job_history($employee_id){
	// 	$this->db->where('employee_id', $employee_id);
	// 	$this->db->where('employee_curriculum_vitae_status', 'active');
	// 	//$this->db->order_by('employee_job_history_id', 'desc');
	// 	//$this->db->order_by('service_scope_list_id', 'desc');
	// 	$this->db->join('service_scope_list', 'service_scope_list.service_scope_list_id = employee_job_history.service_scope_list_id', 'left');

	// 	$query = $this->db->get($this->table);
	// 	return $query->result();
	// }

	public function remove($employee_id)
	{
		$data = array('employee_curriculum_vitae_status' => 'deleted');
		$this->db->where('employee_id', $employee_id);
		$this->db->update($this->table, $data);
	}
}