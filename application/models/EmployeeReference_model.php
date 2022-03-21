<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseModel.php'; 

class EmployeeReference_model extends Base_Model {

	private $table = 'employee_reference';

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function add($employee_id, $data)
	{
		$insert = array(
	        'employee_id' => $employee_id,
	        'employee_reference_name' => $data->employee_reference_name,
	        'employee_reference_company' => $data->employee_reference_company,
	        'employee_reference_position' => $data->employee_reference_position,
	        'employee_reference_contact_no' => $data->employee_reference_contact_no,
	        'employee_reference_status' => 'active'
		);

		$this->db->insert($this->table, $insert);
	}

	public function get_reference($employee_id){
		$this->db->where('employee_id', $employee_id);
		$this->db->where('employee_reference_status', 'active');
		$query = $this->db->get($this->table);

		return $query->result();
	}

	public function remove($employee_id)
	{
		$data = array('employee_reference_status' => 'deleted');
		$this->db->where('employee_id', $employee_id);
		$this->db->update($this->table, $data);
	}
}