<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseModel.php'; 

class Ticket_model extends Base_Model {

	private $table = 'airline_ticket';

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function add($data){
		$data['airline_ticket_admin_status'] = 'active';
		$this->db->insert($this->table, $data);
	}

	public function get($start, $limit, $search = null){
		parent::search_string($search);
		
		$this->db->select('*');
		$this->db->where('airline_ticket_admin_status', 'active');
		$this->db->order_by('airline_ticket_id DESC');

		return parent::get($start, $limit);
	}

	public function total_rows($search = null){
		parent::search_string($search);

		$this->db->where('airline_ticket_admin_status', 'active');

		return parent::count_rows();
	}

	public function delete($ticket_id){
		$data = array(
			'airline_ticket_admin_status' => 'deleted'
		);

		$this->db->where('airline_ticket_id', $ticket_id);
		$this->db->update($this->table, $data);
	}

	public function get_by_id($ticket_id){
		$this->db->where('airline_ticket_id', $ticket_id);
		$this->db->where('airline_ticket_admin_status', 'active');

		$query = $this->db->get($this->table);
		return $query->row();
	}

	public function update($ticket_id, $data){
		$data['airline_ticket_admin_status'] = 'active';

		$this->db->where('airline_ticket_id', $ticket_id);
		$this->db->update($this->table, $data);
	}

	public function get_return_tickets($days){
		$this->db->where('airline_ticket_admin_status', 'active');
		$this->db->group_start();
		$this->db->where('airline_ticket_return_date BETWEEN CURDATE() and DATE_ADD(CURDATE(), INTERVAL '.$days.' + IF((WEEK(CURDATE()) <> WEEK(DATE_ADD(CURDATE(), INTERVAL '.$days.' DAY))) OR (WEEKDAY(DATE_ADD(CURDATE(), INTERVAL '.$days.' DAY)) IN (5, 6)),2,0) DAY)', null, false);
		$this->db->or_where('airline_ticket_departure_date BETWEEN CURDATE() and DATE_ADD(CURDATE(), INTERVAL '.$days.' + IF((WEEK(CURDATE()) <> WEEK(DATE_ADD(CURDATE(), INTERVAL '.$days.' DAY))) OR (WEEKDAY(DATE_ADD(CURDATE(), INTERVAL '.$days.' DAY)) IN (5, 6)),2,0) DAY)', null, false);
		$this->db->group_end();

		$query = $this->db->get($this->table);
		return $query->result();
	}
}

/* End of file  */
/* Location: ./application/models/ */