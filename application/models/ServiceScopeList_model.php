<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseModel.php'; 

class ServiceScopeList_model extends Base_Model {

	private $table = 'service_scope_list';

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function get_service_scope_list(){
		$this->db->select('*');
		$this->db->from('service_scope');
		$this->db->where('service_scope_status', 'active');

		$query = $this->db->get();

		return $query->result();
	}

	public function get_by_parent($service_scope_id)
	{
		$this->db->where('service_scope_id', $service_scope_id);
		$this->db->where('service_scope_list_status', "active");
		$this->db->order_by('service_scope_list_name ASC');
		
		$query = $this->db->get('service_scope_list');
		return $query->result();	
	}
}