<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseModel.php'; 

class FreelancerProfExp_model extends Base_Model {

	private $table = 'freelancer_professional_exp';

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function add($freelancer_id, $data)
	{
		$insert = array(
	        'freelancer_id' => $freelancer_id,
	        'company_name' => $data->company_name,
	        'company_address' => $data->company_address,
	        'freelancer_position' => $data->freelancer_position,
	        'freelancer_year' => $data->freelancer_year,
	        'freelancer_professional_exp_status' => 'active'
		);

		$this->db->insert($this->table, $insert);
	}

	public function get_professional_experience($freelancer_id){
		$this->db->where('freelancer_id', $freelancer_id);
		$this->db->where('freelancer_professional_exp_status', 'active');
		$query = $this->db->get($this->table);

		return $query->result();
	}

	public function remove($freelancer_id)
	{
		$data = array('freelancer_professional_exp_status' => 'deleted');
		$this->db->where('freelancer_id', $freelancer_id);
		$this->db->update($this->table, $data);
	}
}