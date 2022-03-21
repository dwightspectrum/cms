<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseModel.php'; 

class Company_model extends Base_Model {

	private $table = 'company';

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function get_all()
	{
		$this->db->where('company_status', 'active');
		return parent::get_all();
	}	
}

/* End of file  */
/* Location: ./application/models/ */