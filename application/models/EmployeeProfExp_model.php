<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseModel.php'; 

class EmployeeProfExp_model extends Base_Model {

	private $table = 'employee_professional_exp';

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function add($employee_id, $data)
	{
		$insert = array(
	        'employee_id' => $employee_id,
	        'company_name' => $data->company_name,
	        'company_address' => $data->company_address,
	        'employee_position' => $data->employee_position,
	        'employee_year' => $data->employee_year,
	        'employee_professional_exp_status' => 'active'
		);

		$this->db->insert($this->table, $insert);
	}

	public function get_professional_experience($employee_id){
		$this->db->where('employee_id', $employee_id);
		$this->db->where('employee_professional_exp_status', 'active');
		$query = $this->db->get($this->table);

		return $query->result();
	}

	public function remove($employee_id)
	{
		$data = array('employee_professional_exp_status' => 'deleted');
		$this->db->where('employee_id', $employee_id);
		$this->db->update($this->table, $data);
	}
}