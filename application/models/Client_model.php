<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseModel.php'; 

class Client_model extends Base_Model {

	private $table = 'client';

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function get_clients(){
		$this->db->from($this->table);
		$this->db->where('client_status', 'active');

		$query = $this->db->get();
		return $query->result();
	}

	public function get_client($client_id){
		$this->db->from($this->table);
		$this->db->where('client_id', $client_id);
		$this->db->where('client_status', 'active');

		$query = $this->db->get();
		return $query->row();
	}

	// public function get_client_projects($client_id){
	// 	$this->db->where('client_id', $client_id);
	// 	$this->db->from('projects');
	// 	$this->db->order_by('project_name ASC');

	// 	$query = $this->db->get();
	// 	return $query->result();
	// }

	// public function add_new_project($projects){
	// 	$data = array(
	//         'client_id' => $projects['clients'],
	//         'project_name' => $projects['project_name'],
	//         'project_complete_address' => $projects['project_complete_address'],
	//         'project_contact_person' => $projects['project_contact_person']
	// 	);	

	// 	$this->db->insert('projects', $data);
	// }
}

/* End of file  */
/* Location: ./application/models/ */