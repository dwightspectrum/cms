<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseModel.php'; 

class FreelancerLanguage_model extends Base_Model {

	private $table = 'freelancer_language';

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function add($freelancer_id, $data)
	{
		$insert = array(
	        'freelancer_id' => $freelancer_id,
	        'freelancer_language_name' => $data->freelancer_language_name,
	        'freelancer_language_status' => 'active'
		);

		$this->db->insert($this->table, $insert);
	}

	public function get_language($freelancer_id){
		$this->db->where('freelancer_id', $freelancer_id);
		$this->db->where('freelancer_language_status', 'active');
		$query = $this->db->get($this->table);

		return $query->result();
	}

	public function remove($freelancer_id)
	{
		$data = array('freelancer_language_status' => 'deleted');
		$this->db->where('freelancer_id', $freelancer_id);
		$this->db->update($this->table, $data);
	}
}