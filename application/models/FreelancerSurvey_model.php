<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseModel.php'; 

class FreelancerSurvey_model extends Base_Model {

	private $table = 'freelancer_survey';

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function addSurvey($data)
	{
		$this->db->insert($this->table, $data);
		$id = $this->db->insert_id();
		return $id;
	}

	public function change_category_status($survey_id, $category_value){
		$data = array('survey_category' => $category_value);

		$this->db->where('survey_id', $survey_id);
		$this->db->update($this->table, $data);
	}
	
	public function get_survey($survey_id){
		$this->db->join('freelancer', 'freelancer.freelancer_id = freelancer_survey.freelancer_id', 'left');
		$this->db->join('freelancer_job_history', 'freelancer_job_history.freelancer_job_history_id = freelancer_survey.freelancer_job_history_id', 'left');
		$this->db->where('survey_id', $survey_id);

		return $this->db->get($this->table)->row();
	}

	public function checkEmailIfExists($email){
		$this->db->where('employee_email', $email);
		
		

		return $this->db->get($this->table)->row();
	}
	
	public function get_survey_rows($freelancer_id){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('freelancer_survey.freelancer_id', $freelancer_id);
		$this->db->where('freelancer_survey.survey_status', 'active');

		return $this->db->count_all_results();
	}

	public function get_survey_data($start, $limit, $freelancer_id){
		$this->db->select('*');
		$this->db->join('freelancer_job_history', 'freelancer_job_history.freelancer_job_history_id = freelancer_survey.freelancer_job_history_id', 'left');
		$this->db->where('freelancer_survey.freelancer_id', $freelancer_id);
		$this->db->where('freelancer_survey.survey_status', 'active');
		$this->db->order_By('survey_id', 'DESC');
		//$this->db->where('employee_job_history.employee_job_history_status', 'active');

		$this->db->limit($limit,$start);
		
		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function remove($freelancer_id)
	{
		$this->db->where('freelancer_id', $freelancer_id);
		$this->db->delete($this->table);
	}

	public function delete_survey($survey_id)
	{
		$data = array('survey_status' => 'deleted');
		$this->db->where('survey_id', $survey_id);
		$this->db->update($this->table, $data);
	}

	// public function get_employee_job_history($employee_id){
	// $this->db->where('employee_id', $employee_id);
	// $this->db->where('employee_job_history_status', 'active');
	
	// $query = $this->db->get($this->table);
	// return $query->result();
	// }


}