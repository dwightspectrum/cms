<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseModel.php'; 

class EmployeeVisa_model extends Base_Model {

	private $table = 'employee_visa';

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function add_visa_grants($employee_id, $data)
	{
		$insert = array(
	        'employee_id' => $employee_id,
	        'employee_visa_issue_date' => $data['employee_visa_issue_date'],
	        'employee_visa_expiry_date' => $data['employee_visa_expiry_date'],
	        'employee_visa_country' => $data['employee_visa_country'],
	        'employee_visa_file' => $data['employee_visa_file'],
	        'employee_visa_status' => 'active'
		);

		$this->db->insert($this->table, $insert);
	}

	public function get_visas_granted($employee_id){
		$this->db->where('employee_id', $employee_id);
		$this->db->where('employee_visa_status', 'active');

		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function get_visas_granted_by_employee_visa($employee_visa_id){
		$this->db->where('employee_visa_id', $employee_visa_id);
		$this->db->where('employee_visa_status', 'active');

		$query = $this->db->get($this->table);
		return $query->row();
	}

	public function remove($employee_visa_id)
	{
		$this->db->where('employee_visa_id', $employee_visa_id);
		$this->db->delete($this->table);
	}

	public function get_visas_granted_rows($search = null, $employee_id){
		if($search != null){
			$this->db->group_start();
			$this->set_table($this->table);
			parent::search_string($search);
			$this->db->group_end();
		}
		
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('employee_id', $employee_id);
		$this->db->order_by('employee_visa_issue_date ASC');

		return $this->db->count_all_results();
	}

	public function get_visas_granted_data($start, $limit, $search = null, $employee_id){
		if($search != null){
			$this->db->group_start();
			$this->set_table($this->table);
			parent::search_string($search);
			$this->db->group_end();
		}
		
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('employee_id', $employee_id);
		$this->db->order_by('employee_visa_issue_date ASC');

		$this->db->limit($limit,$start);

		$query = $this->db->get();

		return $query->result();
	}
}