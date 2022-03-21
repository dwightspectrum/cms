<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseModel.php'; 

class PurchaseOrder_model extends Base_Model {

	private $table = 'purchase_order';

	public function __construct()
	{
		parent::__construct($this->table);
	}
	
	public function get_purchase_orders_data($date){
		$this->db->select('*');
		$this->db->from('purchase_order');
		$this->db->join('external_client', 'external_client.external_client_id = purchase_order.external_client_id', 'left');
		$this->db->where('purchase_order.purchase_order_status', 'active');
		$this->db->where('purchase_order.purchase_order_date', $date);
		$this->db->where('purchase_order.purchase_order_viewed_status !=', 'hidden');
		$this->db->order_by('purchase_order.purchase_order_name ASC');

		$query = $this->db->get();
		return $query->result();
	}

	public function get_purchase_orders_count($date){
		$this->db->select('COUNT(purchase_order.purchase_order_id) as total_pos');
		$this->db->from('purchase_order');
		$this->db->join('external_client', 'external_client.external_client_id = purchase_order.external_client_id', 'left');
		$this->db->where('purchase_order.purchase_order_status', 'active');
		$this->db->where('purchase_order.purchase_order_viewed_status !=', 'hidden');
		$this->db->where('purchase_order.purchase_order_date', $date);

		$query = $this->db->get();
		return $query->row();
	}

	public function set_manpower_to_complete($purchase_order_id){
		$data = array(
			'purchase_order_manpower_completion' => 1
		);

		$this->db->where('purchase_order_id', $purchase_order_id);
		$this->db->update($this->table, $data);
	}
	
	public function set_manpower_to_not_complete($purchase_order_id){
		$data = array(
			'purchase_order_manpower_completion' => 0
		);

		$this->db->where('purchase_order_id', $purchase_order_id);
		$this->db->update($this->table, $data);
	}


	public function set_trucking_to_complete($purchase_order_id){
		$data = array(
			'purchase_order_trucking_completion' => 1
		);

		$this->db->where('purchase_order_id', $purchase_order_id);
		$this->db->update($this->table, $data);
	}

	public function set_trucking_to_not_complete($purchase_order_id){
		$data = array(
			'purchase_order_trucking_completion' => 0
		);

		$this->db->where('purchase_order_id', $purchase_order_id);
		$this->db->update($this->table, $data);
	}

	public function set_shipping_to_complete($purchase_order_id){
		$data = array(
			'purchase_order_shipping_completion' => 1
		);

		$this->db->where('purchase_order_id', $purchase_order_id);
		$this->db->update($this->table, $data);
	}

	public function set_shipping_to_not_complete($purchase_order_id){
		$data = array(
			'purchase_order_shipping_completion' => 0
		);

		$this->db->where('purchase_order_id', $purchase_order_id);
		$this->db->update($this->table, $data);
	}

	public function delete($purchase_order_id){
		$data = array(
			'purchase_order_status' => 'deleted'
		);

		$this->db->where('purchase_order_id', $purchase_order_id);
		$this->db->update($this->table, $data);
	}

	public function close_project($purchase_order_id){
		$data = array(
			'purchase_order_status' => 'closed'
		);

		$this->db->where('purchase_order_id', $purchase_order_id);
		$this->db->update($this->table, $data);
	}

	public function hide_purchase_order($purchase_order_id){
		$data = array(
			'purchase_order_viewed_status' => 'hidden'
		);

		$this->db->where('purchase_order_id', $purchase_order_id);
		$this->db->update($this->table, $data);
	}

	public function update($purchase_order_id, $data){
		$update = array(
			'external_client_id' => $data['external_client_id'],
	        'purchase_order_name' => $data['purchase_order_name'],
	        'purchase_order_equipment_origin' => $data['purchase_order_equipment_origin'],
	        'purchase_order_manpower' => $data['purchase_order_manpower'],
	        'purchase_order_scope' => $data['purchase_order_scope'],
	        'purchase_order_equipment_description' => $data['purchase_order_equipment_description'],
	        'purchase_order_amount' => $data['purchase_order_amount'],
	        'purchase_order_currency' => $data['purchase_order_currency'],
	        'purchase_order_terms' => $data['purchase_order_terms'],
	        'purchase_order_number' => $data['purchase_order_number'],
	        'purchase_order_date' => $data['purchase_order_date'],
	        'purchase_order_vat_amount' => $data['purchase_order_vat_amount'],
	        'purchase_order_net_amount' => $data['purchase_order_net_amount'],
	        'purchase_order_remarks' => $data['purchase_order_remarks'],
	        'purchase_order_total_site_time' => $data['purchase_order_total_site_time'],
	        'purchase_order_extra_day_rate' => $data['purchase_order_extra_day_rate'],
		);

		if(isset($data['radio']) == 1){
			$update['purchase_order_reminder_month'] = null;
			$update['purchase_order_reminder_date'] = $data['purchase_order_reminder_date'];
		}else if(isset($data['radio']) == 2){
			$update['purchase_order_reminder_date'] = null;
			$update['purchase_order_reminder_month'] = $data['purchase_order_reminder_month'];
		}else{
			$update['purchase_order_reminder_month'] = null;
			$update['purchase_order_reminder_date'] = null;
		}

		if(!empty($data['purchase_order_deployment_schedule'])){
			$update['purchase_order_deployment_schedule'] = $data['purchase_order_deployment_schedule'];
		}

		if(!empty($data['purchase_order_start_date'])){
			$update['purchase_order_start_date'] = $data['purchase_order_start_date'];
		}

		if(!empty($data['purchase_order_end_date'])){
			$update['purchase_order_end_date'] = $data['purchase_order_end_date'];
		}

		$this->db->where('purchase_order_id', $purchase_order_id);
		$this->db->update($this->table, $update);
	}

	public function update_shipping_documents($data, $purchase_order_id){
		if($data['purchase_order_packing_list'] != ""){
			$update['purchase_order_packing_list'] = $data['purchase_order_packing_list'];

			$this->db->where('purchase_order_id', $purchase_order_id);
			$this->db->update($this->table, $update);
		}

		if($data['purchase_order_commercial_invoice'] != ""){
			$update['purchase_order_commercial_invoice'] = $data['purchase_order_commercial_invoice'];

			$this->db->where('purchase_order_id', $purchase_order_id);
			$this->db->update($this->table, $update);
		}
	}

	public function update_post_project_data($data, $purchase_order_id){
		$update['purchase_order_arrival_date'] = $data['purchase_order_arrival_date'];
		$update['purchase_order_departure_date'] = $data['purchase_order_departure_date'];
		
		if($data['purchase_order_acceptance_report'] != ""){
			$update['purchase_order_acceptance_report'] = $data['purchase_order_acceptance_report'];

			$this->db->where('purchase_order_id', $purchase_order_id);
			$this->db->update($this->table, $update);
		}

		if($data['purchase_order_logsheets'] != ""){
			$update['purchase_order_logsheets'] = $data['purchase_order_logsheets'];

			$this->db->where('purchase_order_id', $purchase_order_id);
			$this->db->update($this->table, $update);
		}
	}

	public function add_shipping_documents($data, $purchase_order_id){
		$insert = array(
	        'purchase_order_packing_list' => $data['purchase_order_packing_list'],
	        'purchase_order_commercial_invoice' => $data['purchase_order_commercial_invoice']
		);

		$this->db->where('purchase_order_id', $purchase_order_id);
		$this->db->update($this->table, $insert);
	}

	public function add($data){
		$insert = array(
	        'external_client_id' => $data['external_client_id'],
	        'purchase_order_name' => $data['purchase_order_name'],
	        'purchase_order_equipment_origin' => $data['purchase_order_equipment_origin'],
	        'purchase_order_manpower' => $data['purchase_order_manpower'],
	        'purchase_order_scope' => $data['purchase_order_scope'],
	        'purchase_order_equipment_description' => $data['purchase_order_equipment_description'],
	        'purchase_order_amount' => $data['purchase_order_amount'],
	        'purchase_order_currency' => $data['purchase_order_currency'],
	        'purchase_order_terms' => $data['purchase_order_terms'],
	        'purchase_order_number' => $data['purchase_order_number'],
	        'purchase_order_date' => $data['purchase_order_date'],
	        'purchase_order_vat_amount' => $data['purchase_order_vat_amount'],
	        'purchase_order_net_amount' => $data['purchase_order_net_amount'],
	        'purchase_order_added_by' => $this->session->userdata('employee_id'),
	        'purchase_order_remarks' => $data['purchase_order_remarks'],
	        'purchase_order_total_site_time' => $data['purchase_order_total_site_time'],
	        'purchase_order_extra_day_rate' => $data['purchase_order_extra_day_rate'],
	        'purchase_order_status' => 'active'
		);

		if(isset($data['radio']) == 1){
			$insert['purchase_order_reminder_month'] = null;
			$insert['purchase_order_reminder_date'] = $data['purchase_order_reminder_date'];
		}else if(isset($data['radio']) == 2){
			$insert['purchase_order_reminder_date'] = null;
			$insert['purchase_order_reminder_month'] = $data['purchase_order_reminder_month'];
		}else{
			$insert['purchase_order_reminder_month'] = null;
			$insert['purchase_order_reminder_date'] = null;
		}

		if(!empty($data['purchase_order_deployment_schedule'])){
			$insert['purchase_order_deployment_schedule'] = $data['purchase_order_deployment_schedule'];
		}

		if(!empty($data['purchase_order_start_date'])){
			$insert['purchase_order_start_date'] = $data['purchase_order_start_date'];
		}

		if(!empty($data['purchase_order_end_date'])){
			$insert['purchase_order_end_date'] = $data['purchase_order_end_date'];
		}

		$this->db->insert($this->table, $insert);
		$id = $this->db->insert_id();

		return $id;
	}

	public function get_monthly_projects($start, $limit, $year, $month){
		$this->db->select('*');
		$this->db->join('external_client', 'external_client.external_client_id = purchase_order.external_client_id', 'left');
		$this->db->where('MONTH(purchase_order.purchase_order_date)', $month);
		$this->db->where('YEAR(purchase_order.purchase_order_date)', $year);
		$this->db->where('purchase_order.purchase_order_status <>', 'deleted');
		$this->db->limit($limit,$start);

		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function get_monthly_projects_row($year, $month){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('external_client', 'external_client.external_client_id = purchase_order.external_client_id', 'left');
		$this->db->where('MONTH(purchase_order.purchase_order_date)', $month);
		$this->db->where('YEAR(purchase_order.purchase_order_date)', $year);
		$this->db->where('purchase_order.purchase_order_status <>', 'deleted');

		return $this->db->count_all_results();
	} 

	public function get($start, $limit, $search = null){
		if($search != null){
			$this->db->group_start();
			$this->set_table('purchase_order');
			parent::search_string($search);
			$this->set_table('external_client');
			parent::search_string($search, null, 'ec', true);
			$this->db->group_end();
		}
		
		$this->db->select('*, purchase_order.purchase_order_id as purchase_order_id, COALESCE((SELECT COUNT(po_trucking.po_trucking_id) FROM po_trucking WHERE po_trucking.purchase_order_id = purchase_order.purchase_order_id), 0) as po_trucking_checker, COALESCE((SELECT COUNT(po_operations_details.po_operations_details_id) FROM po_operations_details WHERE po_operations_details.purchase_order_id = purchase_order.purchase_order_id), 0) as po_operations_checker');
		$this->db->from($this->table);
		$this->db->join('external_client as ec', 'ec.external_client_id = purchase_order.external_client_id', 'left');
		$this->db->where('purchase_order.purchase_order_status !=', 'deleted');
		$this->db->order_by('purchase_order.purchase_order_status ASC');
		$this->db->order_by('purchase_order.purchase_order_start_date ASC');

		$this->db->limit($limit,$start);

		$query = $this->db->get();

		return $query->result();
	}

	public function total_rows($search = null){
		if($search != null){
			$this->db->group_start();
			$this->set_table('purchase_order');
			parent::search_string($search);
			$this->set_table('external_client');
			parent::search_string($search, null, 'ec', true);
			$this->db->group_end();
		}
		
		$this->db->select('*, purchase_order.purchase_order_id as purchase_order_id, COALESCE((SELECT COUNT(po_trucking.po_trucking_id) FROM po_trucking WHERE po_trucking.purchase_order_id = purchase_order.purchase_order_id), 0) as po_trucking_checker, COALESCE((SELECT COUNT(po_operations_details.po_operations_details_id) FROM po_operations_details WHERE po_operations_details.purchase_order_id = purchase_order.purchase_order_id), 0) as po_operations_checker');
		$this->db->from($this->table);
		$this->db->join('external_client as ec', 'ec.external_client_id = purchase_order.external_client_id', 'left');
		$this->db->where('purchase_order.purchase_order_status !=', 'deleted');
		$this->db->order_by('purchase_order.purchase_order_status ASC');
		$this->db->order_by('purchase_order.purchase_order_start_date ASC');

		return $this->db->count_all_results();
	}

	public function get_purchase_orders_list_total_rows($search = null, $month = null, $year = null){
		if($search != null){
			$this->db->group_start();
			$this->set_table('purchase_order');
			parent::search_string($search);
			$this->set_table('external_client');
			parent::search_string($search, null, 'ec', true);
			$this->db->group_end();
		}
		
		$this->db->select('*, purchase_order.purchase_order_id as purchase_order_id');
		$this->db->from($this->table);
		$this->db->join('external_client as ec', 'ec.external_client_id = purchase_order.external_client_id', 'left');
		$this->db->where('purchase_order.purchase_order_status', 'active');
		$this->db->order_by('purchase_order.purchase_order_start_date ASC');

		return $this->db->count_all_results();
	}

	public function get_purchase_orders_list_data($start, $limit, $search = null, $month = null, $year = null){
		if($search != null){
			$this->db->group_start();
			$this->set_table('purchase_order');
			parent::search_string($search);
			$this->set_table('external_client');
			parent::search_string($search, null, 'ec', true);
			$this->db->group_end();
		}
		
		$this->db->select('*, purchase_order.purchase_order_id as purchase_order_id');
		$this->db->from($this->table);
		$this->db->join('external_client as ec', 'ec.external_client_id = purchase_order.external_client_id', 'left');
		$this->db->where('purchase_order.purchase_order_status', 'active');
		$this->db->order_by('purchase_order.purchase_order_start_date ASC');

		$this->db->limit($limit,$start);

		$query = $this->db->get();

		return $query->result();
	}

	public function get_by_id($purchase_order_id){
		$this->db->select('*, purchase_order.purchase_order_id as purchase_order_id');
		$this->db->join('external_client', 'external_client.external_client_id = purchase_order.external_client_id', 'left');
		$this->db->join('po_operations', 'po_operations.purchase_order_id = purchase_order.purchase_order_id', 'left');
		$this->db->join('po_trucking', 'po_trucking.purchase_order_id = purchase_order.purchase_order_id', 'left');
		$this->db->where('purchase_order.purchase_order_id', $purchase_order_id);

		$query = $this->db->get($this->table);
		return $query->row();
	}

	public function get_purchase_order_for_notification(){
		$this->db->select('*');
		$this->db->join('employee', 'employee.employee_id = purchase_order.purchase_order_added_by', 'left');
		$this->db->where('purchase_order.purchase_order_status', 'active');

		$query = $this->db->get($this->table);
		return $query->result();
	}
}

/* End of file  */
/* Location: ./application/models/ */