<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseModel.php'; 

class FreelancerReference_model extends Base_Model {

	private $table = 'freelancer_reference';

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function add($freelancer_id, $data)
	{
		$insert = array(
	        'freelancer_id' => $freelancer_id,
	        'freelancer_reference_name' => $data->freelancer_reference_name,
	        'freelancer_reference_company' => $data->freelancer_reference_company,
	        'freelancer_reference_position' => $data->freelancer_reference_position,
	        'freelancer_reference_contact_no' => $data->freelancer_reference_contact_no,
	        'freelancer_reference_status' => 'active'
		);

		$this->db->insert($this->table, $insert);
	}

	public function get_reference($freelancer_id){
		$this->db->where('freelancer_id', $freelancer_id);
		$this->db->where('freelancer_reference_status', 'active');
		$query = $this->db->get($this->table);

		return $query->result();
	}

	public function remove($freelancer_id)
	{
		$data = array('freelancer_reference_status' => 'deleted');
		$this->db->where('freelancer_id', $freelancer_id);
		$this->db->update($this->table, $data);
	}
}