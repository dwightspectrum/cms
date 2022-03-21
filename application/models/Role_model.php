<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseModel.php'; 

class Role_model extends Base_Model {

	private $table = 'role';

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function get_all(){
		$this->db->where('role_id !=', 1);
		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function get_freelancer() {
		$this->db->where('role_id', 6);
		$query = $this->db->get($this->table);
		return $query->result();
	}
}

/* End of file  */
/* Location: ./application/models/ */