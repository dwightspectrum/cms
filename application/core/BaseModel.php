<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Base_Model extends CI_Model 
{
	private $table = '';
	protected $primaryKey = '';
	protected $fieldStatus = null;

	public function __construct($table)
	{
		parent::__construct();
		$this->table = $table;
	}

	public function set_table($table)
	{
		$this->table = $table;
	}

	public function find($id)
	{
		if ($this->fieldStatus) {
	    	$this->db->where($this->fieldStatus, 'active');
		}

	    $this->db->where($this->primaryKey, $id);
	    return $this->db->get($this->table)->row_array();
	}        

    public function findRow($arr = [])
    {
        if (!$arr) {
            return null;
        }

        foreach ($arr as $field => $value) {
            $this->db->where($field, $value);
        }
        
		if ($this->fieldStatus) {
	    	$this->db->where($this->fieldStatus, 'active');
		}

        return $this->db->get($this->table)->row();
    }

	public function insert($data) 
	{
		if ($this->fieldStatus) {
			$data[$this->fieldStatus] = 'active';
		}

		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($id, $data)
	{
		$this->db->where($this->primaryKey, $id);
	    $this->db->update($this->table, $data);
	}        

	public function delete($id)
	{
		$this->db->where($this->primaryKey, $id);
	    $this->db->update($this->table, [
	    	$this->fieldStatus => 'deleted'
	    ]);
	}        

	public function get($start, $limit)
	{
		if($limit != -1){
			$this->db->limit($limit,$start);
		}
		else{
			$this->db->offset($start);
		}

       	return $this->db->get($this->table)->result();
	}

	public function get_all()
	{
		$this->db->from($this->table);
		return $this->db->get()->result();
	}

	public function count_rows()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function search_string($search = null, $notIn = null, $alias = null, $or_where = false)
	{
		if($search != null){
			$arr = array();
			$fields = $this->db->list_fields($this->table);
			$table_name = ($alias == null)? $this->table : $alias;

			foreach ($fields as $field) {
				if(!$this->inArray($notIn, $field)){
					$like_clause = $table_name.'.'.$field . ' LIKE "%'. $search . '%"';
					array_push($arr, $like_clause);
				}
			}

			$likeStr = implode(" OR ", $arr);
			$likeStr = substr_replace($likeStr, "(", 0, 0);
			$likeStr = substr_replace($likeStr, ")", strlen($likeStr), 0);

			if($likeStr != null){
				if($or_where){
					$this->db->or_where($likeStr);
				}
				else{
					$this->db->where($likeStr);
				}
			}
		}
	}

	public function search_multiple_string($table = null, $search = null, $field_list = null, $alias = null, $or_where = false)
	{
		if ($search == null) {
			return;
		}

		$arr = array();
		$fields = $this->db->list_fields($table);
		$table_name = ($alias == null)? $table : $alias;

		foreach ($fields as $field) {
			if($field_list != null && $this->inArray($field_list, $field)){
				$like_clause = $table_name.'.'.$field . ' LIKE "%'. $search . '%"';
				array_push($arr, $like_clause);
			}
		}

		$likeStr = implode(" OR ", $arr);
		$likeStr = substr_replace($likeStr, "(", 0, 0);
		$likeStr = substr_replace($likeStr, ")", strlen($likeStr), 0);

		if ($likeStr == null) {
			return;
		}

		if($or_where){
			$this->db->or_where($likeStr);
			return;
		}
			
		$this->db->where($likeStr);
	}

	private function inArray($array, $val)
	{
		if($array != null && in_array($val, $array) == 1){
			return true;
		}

		return false;
	}

	public function save_history($type, $pk, $status, $remarks, $company_id = 0, $user_id = 0)
	{
		$CI =& get_instance();
		$CI->load->model('History_model', 'history');
		$CI->history->log($type, $pk, $status, $remarks, $company_id, $user_id);
	}

}

/* End of file  */
/* Location: ./application/models/ */
