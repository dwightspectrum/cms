<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseModel.php'; 

class FreelancerSkill_model extends Base_Model {

	private $table = 'freelancer_skill';

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function add($freelancer_id, $data)
	{
		$insert = array(
	        'freelancer_id' => $freelancer_id,
	        'freelancer_skill_name' => $data->freelancer_skill_name,
	        'freelancer_skill_status' => 'active'
		);

		$this->db->insert($this->table, $insert);
	}

	public function get_skill($freelancer_id){
		$this->db->where('freelancer_id', $freelancer_id);
		$this->db->where('freelancer_skill_status', 'active');
		$query = $this->db->get($this->table);

		return $query->result();
	}

	public function remove($freelancer_id)
	{
		$data = array('freelancer_skill_status' => 'deleted');
		$this->db->where('freelancer_id', $freelancer_id);
		$this->db->update($this->table, $data);
	}
}