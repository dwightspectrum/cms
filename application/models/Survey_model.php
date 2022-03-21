<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseModel.php'; 

class EmployeeJobHistory_model extends Base_Model {

	private $table = 'employee_survey';

	public function __construct()
	{
		
		parent::__construct($this->table);
	}

	public function add($employee_id, $data)
	{
		$insert = array(
	        'supervisor_id' => $supervisor_id,
	        'supervisor' => $data['supervisor'],
			'team_member' => $data['team_member'],
		);

		$this->db->insert($this->table, $insert);
		$id = $this->db->insert_id();

		return $id;
	}

	public function get_employee_survey($supervisor_id){
		$this->db->where('supervisor_id', $supervisor_id);
		$this->db->where('employee_job_history_status', 'active');
		$this->db->join('service_scope_list', 'service_scope_list.service_scope_list_id = employee_job_history.service_scope_list_id', 'left');

		$query = $this->db->get($this->table);

		return $query->result();
	}

	public function remove($employee_id)
	{
		$this->db->where('employee_id', $employee_id);
		$this->db->delete($this->table);
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
		$data = array('employee_job_history_service_status' => 'deleted');
		$this->db->where('employee_job_history_id', $job_history_id);
		$this->db->update('employee_job_history_service', $data);
	}
}