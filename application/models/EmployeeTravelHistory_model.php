<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseModel.php'; 

class EmployeeTravelHistory_model extends Base_Model {

	private $table = 'employee_travel_history';

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function addTravelHistory($data)
	{
		$this->db->insert($this->table, $data);
		$id = $this->db->insert_id();

		return $id;
	}

	public function get_travel_history($employee_id){
		$this->db->where('employee_id', $employee_id);
		$this->db->where('employee_travel_history_status', 'active');

		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function remove($survey_id)
	{
		$this->db->where('survey_id', $survey_id);
		$this->db->delete($this->table);
	}

	public function delete_travel_history($employee_travel_history_id)
	{
		$data = array('employee_travel_history_status' => 'deleted');

		$this->db->where('employee_travel_history_id', $employee_travel_history_id);
		$this->db->update($this->table, $data);
	}

	public function get_travel_history_rows($search = null, $employee_id){
		if($search != null){
			$this->db->group_start();
			$this->set_table($this->table);
			parent::search_string($search);
			$this->db->group_end();
		}
		
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('employee_id', $employee_id);
		$this->db->where('employee_travel_history_status', 'active');
		$this->db->order_by('employee_travel_history_country ASC');

		return $this->db->count_all_results();
	}

	public function get_travel_history_data($start, $limit, $search = null, $employee_id){
		if($search != null){
			$this->db->group_start();
			$this->set_table($this->table);
			parent::search_string($search);
			$this->db->group_end();
		}
		
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('employee_id', $employee_id);
		$this->db->where('employee_travel_history_status', 'active');
		$this->db->order_by('employee_travel_history_country ASC');

		$this->db->limit($limit,$start);

		$query = $this->db->get();

		return $query->result();
	}
}