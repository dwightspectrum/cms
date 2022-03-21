<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseController.php'; 

class Rate extends BaseController {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Employee_model','employee');
		$this->load->model('EmployeeRate_model','employee_rate');

		$this->check_user_session();
	}

	public function index(){
		$this->view();
	}

	public function view(){
		$this->accounting_only();

		$this->loadView('rate/view');
	}

	public function get()
	{
		$this->accounting_only();

		$search = $this->input->post('search');
		$cur_page = $this->input->post('page');

		$total_rows = $this->employee_rate->total_rows($search);
		$start = $this->getStartRow($cur_page, PER_PAGE);

		$data = array(
			'list' => $this->format_rate($this->employee_rate->get($start, PER_PAGE, $search)),
			'pagination' => $this->createPagination($total_rows, PER_PAGE, $cur_page)
		);

		echo json_encode($data);
	}

	public function format_rate($rates){
		$data = [];
		foreach ($rates as $rate) {
			$temp = array(
				'employee_rate_id' => $rate->employee_rate_id, 
				'employee_fullname' => $rate->employee_fullname, 
				'philippine_daily_rate' => number_format($rate->philippine_daily_rate, 2).' '.$rate->philippine_currency, 
				'philippine_travel_rate' => number_format($rate->philippine_travel_rate, 2).' '.$rate->philippine_currency, 
				'asia_daily_rate' => number_format($rate->asia_daily_rate, 2).' '.$rate->asia_currency, 
				'asia_travel_rate' => number_format($rate->asia_travel_rate, 2).' '.$rate->asia_currency,
				'europe_daily_rate' => number_format($rate->europe_daily_rate, 2).' '.$rate->europe_currency, 
				'europe_travel_rate' => number_format($rate->europe_travel_rate, 2).' '.$rate->europe_currency,
				'south_america_daily_rate' => number_format($rate->south_america_daily_rate, 2).' '.$rate->south_america_currency, 
				'south_america_travel_rate' => number_format($rate->south_america_travel_rate, 2).' '.$rate->south_america_currency,   
				'africa_daily_rate' => number_format($rate->africa_daily_rate, 2).' '.$rate->africa_currency, 
				'africa_travel_rate' => number_format($rate->africa_travel_rate, 2).' '.$rate->africa_currency, 
				'meal_allowance' => number_format($rate->meal_allowance, 2).' '.$rate->meal_currency, 
				'visa_local_rate' => number_format($rate->visa_local_rate, 2).' PHP',   
				'visa_international_rate' => number_format($rate->visa_international_rate, 2).' PHP',   
			);

			$data[] = $temp;
		}

		return $data;
	}

}