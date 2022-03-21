<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseModel.php'; 

class EmployeeJobHistory_model extends Base_Model {

	private $table = 'employee_job_history';

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function add($employee_id, $data)	
	{
		$insert = array(
	        'employee_id' => $employee_id,
	        // 'service_scope_list_id' => $data['service_scope_list_id'],
	        'employee_job_history_client' => $data['employee_job_history_client'],
			// 'employee_office_email' => $data['employee_office_email'],
			'employee_job_location' => $data['employee_job_location'],
			'employee_job_address' => $data['employee_job_address'],
			'employee_job_departure_date' => $data['employee_job_departure_date'],
			'employee_job_return_date' => $data['employee_job_return_date'],
			'employee_job_country' => $data['employee_job_country'],
			'employee_job_entry_date' => $data['employee_job_entry_date'],
			'employee_job_exit_date' => $data['employee_job_exit_date'],
	        // 'employee_job_history_end_user' => $data['employee_job_history_end_user'],
	        'employee_job_history_scope' => $data['employee_job_history_scope'],
	        // 'employee_job_history_date' => $data['employee_job_history_date'],
	        'employee_job_history_status' => 'active'
		);

		$this->db->insert($this->table, $insert);
		$id = $this->db->insert_id();

		return $id;
	}
	
	public function get_employee_job_history($employee_id){
		$this->db->where('employee_id', $employee_id);
		$this->db->where('employee_job_history_status', 'active');
		$this->db->order_by('employee_job_history_id', 'desc');
		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function get_employee_email($employee_id){
		$this->db->where('employee_id', $employee_id);
		$this->db->where('employee_job_history_status', 'active');
		$this->db->order_by('employee_job_history_id', 'desc');
		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function get_job_history($employee_id){
		$this->db->where('employee_id', $employee_id);
		$this->db->where('employee_job_history_status', 'active');
		$this->db->order_by('employee_job_history_id', 'desc');
		//$this->db->order_by('service_scope_list_id', 'desc');
		$this->db->join('service_scope_list', 'service_scope_list.service_scope_list_id = employee_job_history.service_scope_list_id', 'left');

		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function remove($employee_id)
	{
		$this->db->where('employee_id', $employee_id);
		$this->db->delete($this->table);
	}

	public function add_service_scope($job_history_id, $service_scope_list_id)
	{
		$data = array(
			'employee_job_history_id' => $job_history_id,
			'service_scope_list_id' => $service_scope_list_id,
			'employee_job_history_service_status' => 'active'
		);

		$this->db->insert('employee_job_history_service', $data);
	}

	public function get_service_scopes($job_history_id)
	{
		$this->db->select('service_scope_list.service_scope_list_id, service_scope_list.service_scope_list_name');
		$this->db->join('service_scope_list', 'service_scope_list.service_scope_list_id = employee_job_history_service.service_scope_list_id', 'left');
		$this->db->where('employee_job_history_id', $job_history_id);
		$this->db->where('employee_job_history_service_status', 'active');
		$query = $this->db->get('employee_job_history_service');
		
		return $query->result();
	}

	public function remove_service_scope($job_history_id)
	{
		$data = array('employee_job_history_status' => 'deleted');
		$this->db->where('employee_job_history_id', $job_history_id);
		$this->db->update($this->table, $data);
		//$this->db->update('employee_job_history_service', $data);
	}

	public function get_job_rows($employee_id){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('employee_job_history.employee_id', $employee_id);
		$this->db->where('employee_job_history.employee_job_history_status', 'active');
		$this->db->order_by('employee_job_history_id', 'desc');
		return $this->db->count_all_results();
	 }

	 public function get_job_data($start, $limit, $employee_id){
		$this->db->select('*');
		//$this->db->join('employee_job_history', 'employee_job_history.employee_job_history_id = employee_survey.employee_job_history_id', 'left');
		$this->db->where('employee_job_history.employee_id', $employee_id);
		$this->db->where('employee_job_history.employee_job_history_status', 'active');
		$this->db->order_by('employee_job_history_id', 'desc');
		//$this->db->where('employee_job_history.employee_job_history_status', 'active');

		$this->db->limit($limit,$start);
		
		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function delete_job($employee_job_history_id)
	{
		$data = array('employee_job_history_status' => 'deleted');
		$this->db->where('employee_job_history_id', $employee_job_history_id);
		$this->db->update($this->table, $data);
	}
}