<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseModel.php'; 

class EmployeeChild_model extends Base_Model {

	private $table = 'employee_child';

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function add_child($data)
	{
		$insert = array(
	        'employee_id' => $data['employee_id'],
	        'employee_child_name' => $data['employee_child_name'],
	        'employee_child_birthdate' => $data['employee_child_birthdate'],
	        'employee_child_status' => 'active'
		);

		$this->db->insert($this->table, $insert);
	}

	public function get_children($employee_id){
		$this->db->where('employee_id', $employee_id);
		$this->db->where('employee_child_status', 'active');
		$query = $this->db->get($this->table);

		return $query->result();
	}

	public function remove_children($employee_id)
	{
		$data = array('employee_child_status' => 'deleted');
		$this->db->where('employee_id', $employee_id);
		$this->db->update($this->table, $data);
	}
}