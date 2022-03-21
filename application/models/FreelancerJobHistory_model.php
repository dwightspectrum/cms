<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseModel.php'; 

class FreelancerJobHistory_model extends Base_Model {

	private $table = 'freelancer_job_history';

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function add($freelancer_id, $data)
	{
		$insert = array(
	        'freelancer_id' => $freelancer_id,
	        'freelancer_job_history_client' => $data['freelancer_job_history_client'],
			'freelancer_job_location' => $data['freelancer_job_location'],
			'freelancer_job_address' => $data['freelancer_job_address'],
			'freelancer_job_departure_date' => $data['freelancer_job_departure_date'],
			'freelancer_job_return_date' => $data['freelancer_job_return_date'],
			'freelancer_job_country' => $data['freelancer_job_country'],
			'freelancer_job_entry_date' => $data['freelancer_job_entry_date'],
			'freelancer_job_exit_date' => $data['freelancer_job_exit_date'],
	        'freelancer_job_history_scope' => $data['freelancer_job_history_scope'],
	        'freelancer_job_history_status' => 'active'
		);

		$this->db->insert($this->table, $insert);
		$id = $this->db->insert_id();

		return $id;
	}
	
	public function get_freelancer_job_history($freelancer_id){
		$this->db->where('freelancer_id', $freelancer_id);
		$this->db->where('freelancer_job_history_status', 'active');
		
		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function get_job_history($freelancer_id){
		$this->db->where('freelancer_id', $freelancer_id);
		$this->db->where('freelancer_job_history_status', 'active');
		$this->db->join('service_scope_list', 'service_scope_list.service_scope_list_id = freelancer_job_history.service_scope_list_id', 'left');

		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function remove($freelancer_id)
	{
		$this->db->where('freelancer_id', $freelancer_id);
		$this->db->delete($this->table);
	}

	public function add_service_scope($job_history_id, $service_scope_list_id)
	{
		$data = array(
			'freelancer_job_history_id' => $job_history_id,
			'service_scope_list_id' => $service_scope_list_id,
			'freelancer_job_history_service_status' => 'active'
		);

		$this->db->insert('freelancer_job_history_service', $data);
	}

	public function get_service_scopes($job_history_id)
	{
		$this->db->select('service_scope_list.service_scope_list_id, service_scope_list.service_scope_list_name');
		$this->db->join('service_scope_list', 'service_scope_list.service_scope_list_id = freelancer_job_history_service.service_scope_list_id', 'left');
		$this->db->where('freelancer_job_history_id', $job_history_id);
		$this->db->where('freelancer_job_history_service_status', 'active');
		$query = $this->db->get('freelancer_job_history_service');

		return $query->result();
	}

	public function remove_service_scope($job_history_id)
	{
		$data = array('freelancer_job_history_status' => 'deleted');
		$this->db->where('freelancer_job_history_id', $job_history_id);
		$this->db->update($this->table, $data);
		//$this->db->update('employee_job_history_service', $data);
	}

	// public function delete_job_history($job_history_id)
	// {
	// 	$data = array('employee_job_history_status' => 'deleted');
	// 	$this->db->where('employee_job_history_id', $job_history_id);
	// 	$this->db->update($this->table, $data);
	// }

	public function get_job_rows($freelancer_id){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('freelancer_job_history.freelancer_id', $freelancer_id);
		$this->db->where('freelancer_job_history.freelancer_job_history_status', 'active');
		

		return $this->db->count_all_results();
	 }

	 public function get_job_data($start, $limit, $freelancer_id){
		$this->db->select('*');
		$this->db->where('freelancer_job_history.freelancer_id', $freelancer_id);
		$this->db->where('freelancer_job_history.freelancer_job_history_status', 'active');
		$this->db->order_by('freelancer_job_history.freelancer_job_history_id', 'DESC');
		$this->db->limit($limit,$start);
		 
		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function delete_job($freelancer_job_history_id)
	{
		$data = array('freelancer_job_history_status' => 'deleted');
		$this->db->where('freelancer_job_history_id', $freelancer_job_history_id);
		$this->db->update($this->table, $data);
	}
}