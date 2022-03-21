<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseModel.php'; 

class EmployeeRate_model extends Base_Model {

	private $table = 'employee_rate';

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function get_rate($employee_id){
		$this->db->where('employee_id', $employee_id);
		$query = $this->db->get($this->table);
		return $query->row();
	}

	public function save_invoice_rate($data){
		$this->db->insert('employee_invoice_rate', $data);
	}

	public function update_invoice_rate($employee_invoice_id, $data){
		$this->db->where('employee_invoice_id', $employee_invoice_id);
		$this->db->update('employee_invoice_rate', $data);
	}

	public function get_invoice_rate($employee_invoice_id){
		$this->db->where('employee_invoice_id', $employee_invoice_id);
		$query = $this->db->get('employee_invoice_rate');
		return $query->row();
	}

	public function get($start, $limit, $search = null){
		parent::search_multiple_string('employee', $search, array('employee_first_name', 'employee_last_name'));
		
		$this->db->select('employee_rate.*, employee.employee_id, UPPER(CONCAT(employee.employee_first_name, " ", employee.employee_last_name)) as employee_fullname');
		$this->db->where('employee.employee_status', 'active');
		$this->db->join('employee', 'employee.employee_id = employee_rate.employee_id', 'right');
		$this->db->order_by('employee.employee_first_name ASC');

		return parent::get($start, $limit);
	}

	public function total_rows($search = null){
		parent::search_multiple_string('employee', $search, array('employee_first_name', 'employee_last_name'));

		$this->db->where('employee.employee_status', 'active');

		return parent::count_rows('employee');
	}
}

/* End of file  */
/* Location: ./application/models/ */