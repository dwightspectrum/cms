<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseModel.php'; 

class EmployeeHobby_model extends Base_Model {

	private $table = 'employee_hobby';

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function add($employee_id, $data)
	{
		$insert = array(
	        'employee_id' => $employee_id,
	        'employee_hobby_name' => $data->employee_hobby_name,
	        'employee_hobby_status' => 'active'
		);

		$this->db->insert($this->table, $insert);
	}

	public function get_hobby($employee_id){
		$this->db->where('employee_id', $employee_id);
		$this->db->where('employee_hobby_status', 'active');
		$query = $this->db->get($this->table);

		return $query->result();
	}

	public function remove($employee_id)
	{
		$data = array('employee_hobby_status' => 'deleted');
		$this->db->where('employee_id', $employee_id);
		$this->db->update($this->table, $data);
	}
}