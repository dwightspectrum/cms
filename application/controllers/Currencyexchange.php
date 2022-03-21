<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseController.php'; 

class Currencyexchange extends BaseController {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('CurrencyExchange_model','currency_exchange');
		$this->check_employee_session();
	}

	public function index(){
		$this->view();
	}

	public function view(){
		$this->accounting_only();

		$this->loadView('currencyexchange/view');
	}
	
	public function addExchange(){
		$date_ymd = $this->input->post('exchange_date');
		$usd_currency = 'USD';
		$euro_currency = 'EURO';
		$euro_exchange_rate = $this->input->post('euro_exchange_value');
		$usd_exchange_rate = $this->input->post('usd_exchange_value');

		$currency_exchange_date = date('Ymd', strtotime($date_ymd));
		$isEuroExist = $this->currency_exchange->get($currency_exchange_date, $euro_currency);
		$isUsdExist = $this->currency_exchange->get($currency_exchange_date, $usd_currency);

		$message = '';
		$usd_success = false;
		$euro_success = false;

		if(!$isEuroExist){
			$data = array(
				'currency_exchange_date' => $currency_exchange_date,
				'currency' => $euro_currency,
				'currency_exchange_rate' => $euro_exchange_rate
			);

			$this->currency_exchange->add($data);
			$usd_success = true;
		}

		if(!$isUsdExist){
			$data = array(
				'currency_exchange_date' => $currency_exchange_date,
				'currency' => $usd_currency,
				'currency_exchange_rate' => $usd_exchange_rate
			);

			$this->currency_exchange->add($data);
			$euro_success = true;
		}

		if($usd_success || $euro_success){
			echo json_encode(array(
				'success' => true,
				'message' => 'Successfully added!'
			));
		}
		else{
			echo json_encode(array(
				'success' => false,
				'message' => 'Already Exist!'
			));
		}
	}
	
	public function editExchange($currency_exchange_date, $currency){
		$date_ymd = $this->input->post('exchange_date');
		$usd_currency = 'USD';
		$euro_currency = 'EURO';
		$euro_exchange_rate = $this->input->post('euro_exchange_value');
		$usd_exchange_rate = $this->input->post('usd_exchange_value');

		$currency_exchange_date = date('Ymd', strtotime($date_ymd));
		$isUsdExist = $this->currency_exchange->get($currency_exchange_date, $usd_currency);
		$isEuroExist = $this->currency_exchange->get($currency_exchange_date, $euro_currency);

		$message = '';
		$usd_success = false;
		$euro_success = false;
		
		if($isUsdExist){
			$data = array(
				'currency_exchange_rate' => $usd_exchange_rate
			);

			$this->currency_exchange->edit($currency_exchange_date, $usd_currency, $data);
			$usd_success = true;
		}
		
		if($isEuroExist){
			$data = array(
				'currency_exchange_rate' => $euro_exchange_rate
			);

			$this->currency_exchange->edit($currency_exchange_date, $euro_currency, $data);
			$euro_success = true;
		}

		if($usd_success || $euro_success){
			echo json_encode(array(
				'success' => true,
				'message' => 'Successfully updated!'
			));
		}
		else{
			echo json_encode(array(
				'success' => false,
				'message' => 'Not Exist!'
			));
		}
	}

	public function deleteExchange(){
		$date_ymd = $this->input->post('currency_exchange_date');
		$currency = $this->input->post('currency');

		$this->currency_exchange->delete($date_ymd, $currency);

		echo json_encode(array(
			'success' => true,
			'message' => 'Deleted Successfully!'
		));
	}

	public function get()
	{
		$date_from = $this->input->post('search_date_from');
		$date_to = $this->input->post('search_date_to');
		$currency = null;//$this->input->post('currency');
       	$cur_page = $this->input->post('page');

       	$search_date_from = ($date_from)? date('Ymd', strtotime($date_from)) : null;
       	$search_date_to = ($date_to)? date('Ymd', strtotime($date_to)) : null;

       	$PER_PAGE = ($search_date_from == null && $search_date_to == null)? 30 : 0;

       	$total_rows = $this->currency_exchange->get_rows($search_date_from, $search_date_to, $currency);
       	$start = $this->getStartRow($cur_page, $PER_PAGE);

       	$count_per_page = $PER_PAGE;

       	if($search_date_from && $search_date_to && $currency){
       		$count_per_page = null;
       	}

       	$data = array(
       		'list' => $this->format_array($this->currency_exchange->get_data($start, $count_per_page, $search_date_from, $search_date_to, $currency)),
       		'pagination' => (($count_per_page)? $this->createPagination($total_rows, $PER_PAGE/2, $cur_page) : '')
       	);

       	echo json_encode($data);
	}

	public function get_value($date){
		echo json_encode($this->currency_exchange->getRatesByDate($date));
	}

	private function format_array($list){
		$arr = [];
		$old = null;
		$index = 0;

		foreach ($list as $obj) {
			if($old != null && $old->currency_exchange_date == $obj->currency_exchange_date){
				$index--;
				$arr[$index][$obj->currency] = $obj->currency_exchange_date;
				$arr[$index][$obj->currency.'_rate'] = $obj->currency_exchange_rate;
			}
			else{
				$arr[$index] = array(
					'currency_exchange_date' => $obj->currency_exchange_date,
					$obj->currency => $obj->currency_exchange_date,
					$obj->currency.'_rate' => $obj->currency_exchange_rate,
				);
			}

			$old = $obj;
			$index++;
		}

		return $arr;
	}

	public function get_unrecorded_date(){
		echo json_encode($this->currency_exchange->get_unrecorded_date());
	}

}