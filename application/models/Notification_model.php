<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseModel.php'; 

class Notification_model extends Base_Model {

	private $table = 'notification';

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function insert($data){
		$this->db->insert($this->table, $data);
	}

	public function get_notification(){
		$this->db->join('employee', 'employee.employee_id = notification.notification_type_id', 'left');
		$this->db->join('freelancer', 'freelancer.freelancer_id = notification.notification_type_id', 'left');
		$this->db->where('notification_status', 'unread');

		return $this->db->get($this->table)->result();
	}

	public function remove($employee_id)
	{
		$data = array('employee_curriculum_vitae_status' => 'deleted');
		$this->db->where('employee_id', $employee_id);
		$this->db->update($this->table, $data);
	}

	public function mark_as_read($notification_id){
		$data = array('notification_status' => 'read');

		$this->db->where('notification_id', $notification_id);
		$this->db->update($this->table, $data);
	}

	public function mark_all_as_read(){
		$data = array('notification_status' => 'read');

		$this->db->update($this->table, $data);
	}
}