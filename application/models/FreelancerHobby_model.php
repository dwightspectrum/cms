<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseModel.php'; 

class FreelancerHobby_model extends Base_Model {

	private $table = 'freelancer_hobby';

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function add($freelancer_id, $data)
	{
		$insert = array(
	        'freelancer_id' => $freelancer_id,
	        'freelancer_hobby_name' => $data->freelancer_hobby_name,
	        'freelancer_hobby_status' => 'active'
		);

		$this->db->insert($this->table, $insert);
	}

	public function get_hobby($freelancer_id){
		$this->db->where('freelancer_id', $freelancer_id);
		$this->db->where('freelancer_hobby_status', 'active');
		$query = $this->db->get($this->table);

		return $query->result();
	}

	public function remove($freelancer_id)
	{
		$data = array('freelancer_hobby_status' => 'deleted');
		$this->db->where('freelancer_id', $freelancer_id);
		$this->db->update($this->table, $data);
	}
}