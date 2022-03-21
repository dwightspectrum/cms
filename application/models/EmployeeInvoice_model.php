<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseModel.php'; 

class EmployeeInvoice_model extends Base_Model {

	private $table = 'employee_invoice';

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function add($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function edit($employee_invoice_id, $data)
	{
		$this->db->where('employee_invoice_id', $employee_invoice_id);
		$this->db->update($this->table, $data);
	}

	public function remove_advances($employee_invoice_id){
		$this->db->where('employee_invoice_id', $employee_invoice_id);
		$this->db->delete('employee_invoice_advance');
	}

	public function add_advances($data){
		$this->db->insert('employee_invoice_advance', $data);
	}

	public function remove_dates($employee_invoice_id){
		$this->db->where('employee_invoice_id', $employee_invoice_id);
		$this->db->delete('employee_invoice_date');
	}

	public function add_project_dates($data){
		$this->db->insert('employee_invoice_date', $data);
	}

	public function get_invoice($invoice_number){
		$this->db->where('employee_invoice_id', $invoice_number);
		$query = $this->db->get($this->table);
		return $query->row_array();
	}

	public function get_invoice_advances($invoice_number){
		$this->db->select('employee_invoice_advance_id, advance_cv, advance_date, advance_value as advance_amount');
		$this->db->where('employee_invoice_id', $invoice_number);
		$query = $this->db->get('employee_invoice_advance');
		return $query->result_array();
	}

	public function get_invoice_project_dates($invoice_number){
		$this->db->where('employee_invoice_id', $invoice_number);
		$query = $this->db->get('employee_invoice_date');
		return $query->result_array();
	}

	public function get($start, $limit, $search = null, $employee_id = null){
		parent::search_multiple_string($this->table, $search);
		parent::search_multiple_string('project', $search, array('project_name'), null, null, true);
		parent::search_multiple_string('client', $search, array('client_name'), null, null, true);
		parent::search_multiple_string('employee', $search, array('employee_first_name', 'employee_last_name'), null, null, true);

		if($employee_id != null){
			$this->db->where('employee_id', $employee_id);
		}

		$this->db->select('employee_invoice.*, CONCAT(employee.employee_first_name, " ", employee.employee_last_name) as employee_fullname, client.client_name, project.project_name');
		$this->db->join('client', 'client.client_id = employee_invoice.client_id', 'left');
		$this->db->join('project', 'project.project_id = employee_invoice.project_id', 'left');
		$this->db->join('employee', 'employee.employee_id = employee_invoice.employee_id', 'left');
		$this->db->where('employee_invoice.employee_invoice_status !=', 'deleted');
		$this->db->order_by('employee_invoice_id DESC');

		return parent::get($start, $limit);
	}

	public function total_rows($search = null, $employee_id = null){
		parent::search_string($search);

		if($employee_id != null){
			$this->db->where('employee_id', $employee_id);
		}

		return parent::count_rows();
	}
}

/* End of file  */
/* Location: ./application/models/ */