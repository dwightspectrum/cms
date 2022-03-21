<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseModel.php'; 

class Category_model extends Base_Model {

	private $table = 'category';

	public function __construct()
	{
		parent::__construct($this->table);
	}

    public function get_category_id($employee_id){
		$this->db->select('*');
        $this->db->where('employee_id', $employee_id);
		$this->db->order_by('category_id', 'asc');
		$query = $this->db->get($this->table);
		return $query->result();
    }
}

/* End of file  */
/* Location: ./application/models/ */