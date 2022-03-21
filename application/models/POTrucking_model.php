<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseModel.php'; 

class POTrucking_model extends Base_Model {

	private $table = 'po_trucking';

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function add($data, $purchase_order_id){
		$insert = array(
	        'purchase_order_id' => $purchase_order_id,
	        'po_trucking_details' => $data['po_trucking_details'],
	        'po_trucking_quotation' => $data['po_trucking_quotation'],
	        'po_trucking_shipper' => $data['po_trucking_shipper'],
	        'po_trucking_consignee' => $data['po_trucking_consignee'],
	        'po_trucking_broker' => $data['po_trucking_broker'],
	        'po_trucking_broker_contact' => $data['po_trucking_broker_contact'],
	        'po_trucking_status' => 'active'
		);

		if(!empty($data['po_trucking_loading_date'])){
			$insert['po_trucking_loading_date'] = $data['po_trucking_loading_date'];
		}

		if(!empty($data['po_trucking_shipping_date'])){
			$insert['po_trucking_shipping_date'] = $data['po_trucking_shipping_date'];
		}

		if(!empty($data['po_trucking_arrival_date'])){
			$insert['po_trucking_arrival_date'] = $data['po_trucking_arrival_date'];
		}

		$this->db->insert($this->table, $insert);
	}

	public function update($data, $purchase_order_id){
		$update = array(
	        'po_trucking_details' => $data['po_trucking_details'],
	        'po_trucking_quotation' => $data['po_trucking_quotation'],
	        'po_trucking_shipper' => $data['po_trucking_shipper'],
	        'po_trucking_consignee' => $data['po_trucking_consignee'],
	        'po_trucking_broker' => $data['po_trucking_broker'],
	        'po_trucking_broker_contact' => $data['po_trucking_broker_contact'],
	        'po_trucking_status' => 'active'
		);

		if(!empty($data['po_trucking_loading_date'])){
			$update['po_trucking_loading_date'] = $data['po_trucking_loading_date'];
		}

		if(!empty($data['po_trucking_shipping_date'])){
			$update['po_trucking_shipping_date'] = $data['po_trucking_shipping_date'];
		}

		if(!empty($data['po_trucking_arrival_date'])){
			$update['po_trucking_arrival_date'] = $data['po_trucking_arrival_date'];
		}

		$this->db->where('purchase_order_id', $purchase_order_id);
		$this->db->update($this->table, $update);
	}

	public function update_without_file($data, $purchase_order_id){
		$update = array(
	        'po_trucking_details' => $data['po_trucking_details'],
	        'po_trucking_shipper' => $data['po_trucking_shipper'],
	        'po_trucking_consignee' => $data['po_trucking_consignee'],
	        'po_trucking_broker' => $data['po_trucking_broker'],
	        'po_trucking_broker_contact' => $data['po_trucking_broker_contact'],
	        'po_trucking_status' => 'active'
		);

		if(!empty($data['po_trucking_loading_date'])){
			$update['po_trucking_loading_date'] = $data['po_trucking_loading_date'];
		}

		if(!empty($data['po_trucking_shipping_date'])){
			$update['po_trucking_shipping_date'] = $data['po_trucking_shipping_date'];
		}

		if(!empty($data['po_trucking_arrival_date'])){
			$update['po_trucking_arrival_date'] = $data['po_trucking_arrival_date'];
		}

		$this->db->where('purchase_order_id', $purchase_order_id);
		$this->db->update($this->table, $update);
	}

	public function get_by_id($purchase_order_id){
		$this->db->select('*, purchase_order.purchase_order_id as purchase_order_id');
		$this->db->join('purchase_order', 'purchase_order.purchase_order_id = po_trucking.purchase_order_id', 'left');
		$this->db->where('po_trucking.purchase_order_id', $purchase_order_id);
		$this->db->where('po_trucking.po_trucking_status', 'active');

		$query = $this->db->get($this->table);
		return $query->row();
	}
}

/* End of file  */
/* Location: ./application/models/ */