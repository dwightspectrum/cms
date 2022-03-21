<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseModel.php'; 

class Project_model extends Base_Model {

	private $table = 'project';

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function get_project($project_id){
		$this->db->where('project_id', $project_id);
		$query = $this->db->get($this->table);
		return $query->row();
	}

	public function get_by_client($client_id){
		$this->db->where('client_id', $client_id);
		$this->db->where('project_status', 'active');
		$this->db->from($this->table);
		$this->db->order_by('project_name ASC');

		$query = $this->db->get();
		return $query->result();
	}
}

/* End of file  */
/* Location: ./application/models/ */