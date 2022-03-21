<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseModel.php'; 

class ExternalClient_model extends Base_Model {

	private $table = 'external_client';

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function add($data){
		$insert = array(
	        'external_client_name' => $data['external_client_name'],
	        'external_client_address' => $data['external_client_address'],
	        'external_client_site_address' => $data['external_client_site_address'],
	        'external_client_contact_person' => $data['external_client_contact_person'],
	        'external_client_contact_number' => $data['external_client_contact_number'],
	        'external_client_email_address' => $data['external_client_email_address'],
	        'external_client_tin_number' => $data['external_client_tin_number'],
	        'external_client_status' => 'active'
		);

		$this->db->insert($this->table, $insert);
		$id = $this->db->insert_id();

		return $id;
	}

	public function update($external_client_id, $data){
		$update = array(
	        'external_client_name' => $data['external_client_name'],
	        'external_client_address' => $data['external_client_address'],
	        'external_client_site_address' => $data['external_client_site_address'],
	        'external_client_contact_person' => $data['external_client_contact_person'],
	        'external_client_contact_number' => $data['external_client_contact_number'],
	        'external_client_email_address' => $data['external_client_email_address'],
	        'external_client_tin_number' => $data['external_client_tin_number']
		);

		$this->db->where('external_client_id', $external_client_id);
		$this->db->update($this->table, $update);
	}

	public function get_external_clients($search){
		$this->db->select("*");
		$this->db->where("external_client_name", $search);
		$this->db->where("external_client_status", 'active');

		$query = $this->db->get($this->table);
		return $query->row();
	}

	public function get_external_clients_no_search(){
		$this->db->select("*");
		$this->db->where("external_client_status", 'active');

		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function check_if_client_exist($external_client_name){
		$this->db->where("external_client_name", $external_client_name);
		$this->db->where("external_client_status", 'active');

		$query = $this->db->get($this->table);
		return $query->row();
	}
}

/* End of file  */
/* Location: ./application/models/ */