<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseModel.php'; 

class EmployeeSkill_model extends Base_Model {

	private $table = 'employee_skill';

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function add($employee_id, $data)
	{
		$insert = array(
	        'employee_id' => $employee_id,
	        'employee_skill_name' => $data->employee_skill_name,
	        'employee_skill_status' => 'active'
		);

		$this->db->insert($this->table, $insert);
	}

	public function get_skill($employee_id){
		$this->db->where('employee_id', $employee_id);
		$this->db->where('employee_skill_status', 'active');
		$query = $this->db->get($this->table);

		return $query->result();
	}

	public function remove($employee_id)
	{
		$data = array('employee_skill_status' => 'deleted');
		$this->db->where('employee_id', $employee_id);
		$this->db->update($this->table, $data);
	}
}