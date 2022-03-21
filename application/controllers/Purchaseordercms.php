<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseController.php'; 

class Purchaseordercms extends BaseController {

	public function __construct()
	{
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
		header("Access-Control-Allow-Headers: X-Requested-With");
		
		parent::__construct();
		$this->load->model('PurchaseOrder_model','purchase_order');
	}
	
	public function get_purchase_orders_list()
	{
		$search = $this->input->post('search');
       	$cur_page = $this->input->post('page');
       	$month = $this->input->post('month');
       	$year = $this->input->post('year');

		$total_rows = $this->purchase_order->get_purchase_orders_list_total_rows($search, $month, $year);
		$start = $this->getStartRow($cur_page, PER_PAGE);

		$data = array(
			'list' => $this->purchase_order->get_purchase_orders_list_data($start, PER_PAGE, $search, $month, $year),
			'pagination' => $this->createPagination($total_rows, PER_PAGE, $cur_page)
		);

		echo json_encode($data);
	}
	
	public function get_purchase_orders_count(){
		echo json_encode($this->purchase_order->get_purchase_orders_count(date("Y-m-d")));
	}

	public function get_purchase_orders_data(){
		echo json_encode($this->purchase_order->get_purchase_orders_data(date("Y-m-d")));
	}
	
	public function hide_purchase_order($purchase_order_id){
		$this->purchase_order->hide_purchase_order($purchase_order_id);
		
		header('Location: ' . $_SERVER["HTTP_REFERER"] );
		exit;
	}
}