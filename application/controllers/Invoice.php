<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseController.php';

class Invoice extends BaseController {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Employee_model','employee');
		$this->load->model('Client_model','client');
		$this->load->model('Project_model','project');
		$this->load->model('EmployeeRate_model','employee_rate');
		$this->load->model('CurrencyExchange_model','currency_exchange');
		$this->load->model('EmployeeInvoice_model','employee_invoice');

		$this->check_user_session();
	}

	public function index(){
		$this->view();
	}

	public function view(){
		$data['is_accounting'] = $this->isAccounting();
		$this->loadView('invoice/view', $data);
	}

	public function form(){
		$employee_id = $this->session->userdata('employee_id');
		$employee = $this->employee->get_by_id($employee_id);

		if($employee){
			$data['employee'] = $employee;
			$data['clients'] = $this->client->get_clients();

			$this->loadView('invoice/form', $data);
		}
		else{
			redirect('dashboard');
		}
	}

	public function edit($employee_invoice_id){
		$employee_id = $this->session->userdata('employee_id');
		$employee = $this->employee->get_by_id($employee_id);
		$invoice = $this->employee_invoice->get_invoice($employee_invoice_id);

		$this->cfg['employee_invoice_id'] = $employee_invoice_id;
		$this->cfg['project_id'] = $invoice['project_id'];
		$this->cfg['invoice_dates'] = $this->employee_invoice->get_invoice_project_dates($employee_invoice_id);
		$this->cfg['invoice_advances'] = $this->employee_invoice->get_invoice_advances($employee_invoice_id);

		if($employee && $invoice && $employee_id == $invoice['employee_id']){
			$data['employee'] = $employee;
			$data['clients'] = $this->client->get_clients();
			$data['invoice'] = $invoice;

			$this->loadView('invoice/edit', $data);
		}
		else{
			redirect('dashboard');
		}
	}

	public function preview(){
		$employee_id = $this->session->userdata('employee_id');

		$invoice['invoice'] = $this->input->get();
		$invoice['invoice']['project_dates_str'] = $this->set_project_date($invoice['invoice']['project_dates']);
		$invoice['employee'] = $this->employee->get_by_id($employee_id);
		$invoice['project'] = $this->project->get_project($invoice['invoice']['project_id']);
		$invoice['invoice_number'] = $this->getInvoiceNumber($invoice['employee']->employee_initial);
		$invoice['rate'] = $this->get_rate($invoice['invoice'], $employee_id, $invoice['project']->project_rate, $invoice['employee']->employee_is_regular, true);
		$invoice['client_name'] = $this->client->get_client($invoice['invoice']['client_id'])->client_initial;

		$this->load->view('invoice/preview', $invoice);
	}

	private function set_project_date($project_dates){
		$str_date = '';

		foreach ($project_dates as $project_date) {
			if($str_date != ''){
				$str_date .= ' <br> ';
			}

			$str_date .= date('F d, Y', strtotime($project_date['project_start_date']))." - ".date('F d, Y', strtotime($project_date['project_end_date']));
		}

		return $str_date;
	}

	private function get_rate($invoice, $id, $rate, $is_regular, $for_preview = false){
		if($for_preview){
			//employee_id
			$employee_rate = $this->employee_rate->get_rate($id);
		}
		else{
			//employee_invoice_id
			$employee_rate = $this->employee_rate->get_invoice_rate($id);
		}

		$data = [];

		if($rate == 'ASIA'){
			$is_different_currency = ($employee_rate->asia_currency == 'PHP')? false: true;
			$average = $this->get_average($invoice['project_dates'], $employee_rate->asia_currency);

			$data = array(
				'travel_rate' => $employee_rate->asia_travel_rate,
				'daily_rate' => $employee_rate->asia_daily_rate,
				'is_different_currency' => $is_different_currency,
				'currency_average' => $average
			);
		}
		else if($rate == 'EUROPE'){
			$is_different_currency = ($employee_rate->europe_currency == 'PHP')? false: true;
			$average = $this->get_average($invoice['project_dates'], $employee_rate->europe_currency);

			$data = array(
				'travel_rate' => $employee_rate->europe_travel_rate,
				'daily_rate' => $employee_rate->europe_daily_rate,
				'is_different_currency' => $is_different_currency,
				'currency_average' => $average
			);

		}
		else if($rate == 'AFRICA'){
			$is_different_currency = ($employee_rate->africa_currency == 'PHP')? false: true;
			$average = $this->get_average($invoice['project_dates'], $employee_rate->africa_currency);

			$data = array(
				'travel_rate' => $employee_rate->africa_travel_rate,
				'daily_rate' => $employee_rate->africa_daily_rate,
				'is_different_currency' => $is_different_currency,
				'currency_average' => $average
			);

		}
		else if($rate == 'SOUTH_AMERICA'){
			$is_different_currency = ($employee_rate->south_america_currency == 'PHP')? false: true;
			$average = $this->get_average($invoice['project_dates'], $employee_rate->south_america_currency);

			$data = array(
				'travel_rate' => $employee_rate->south_america_travel_rate,
				'daily_rate' => $employee_rate->south_america_daily_rate,
				'is_different_currency' => $is_different_currency,
				'currency_average' => $average
			);

		}
		else{ //PHILIPPINES
			$data = array(
				'travel_rate' => $employee_rate->philippine_travel_rate,
				'daily_rate' => $employee_rate->philippine_daily_rate,
				'is_different_currency' => false,
				'currency_average' => 1
			);
		}

		$data['currency'] = $employee_rate->asia_currency;
		$data['pl_rate'] = ($invoice['pl_is_local'] == 1)? $employee_rate->pl_local_rate : $employee_rate->pl_international_rate;
		$data['pl_currency'] = ($invoice['pl_is_local'] == 1)? $employee_rate->pl_local_currency : $employee_rate->pl_international_currency;
		$data['pl_currency_average'] = $this->get_average($invoice['project_dates'], $data['pl_currency']);
		$data['visa_rate'] = ($invoice['visa_application_is_local'] == 1)? $employee_rate->visa_local_rate : $employee_rate->visa_international_rate;
		$data['meal_allowance'] = $employee_rate->meal_allowance;
		$data['meal_currency'] = $employee_rate->meal_currency;

		if($is_regular == 1){
			$data['meal_allowance'] = $invoice['meal_allowance_rate'];
			$data['meal_currency'] = $invoice['meal_allowance_currency'];
			$data['meal_allowance_php_value'] = $invoice['meal_allowance_php_value'];
		}

		return $data;
	}

	private function get_average($project_dates, $currency){
		$total = 0;
		$count = 0;

		foreach ($project_dates as $project_date) {
			$start_date = implode('', explode('-', $project_date['project_start_date']));
			$end_date = implode('', explode('-', $project_date['project_end_date']));

			$currency_exchange = $this->currency_exchange->getAverage($start_date, $end_date, $currency);
			$average = ($currency_exchange->currency_average == null || $currency_exchange->currency_average == 0)? 0 : round($currency_exchange->currency_average, 2);

			if($average > 0){
				$total += $average;
				$count++;
			}
		}

		return ($count == 0 || $currency == 'PHP')? 1 : round(($total/$count), 2);
	}

	public function submit(){
		$data = array();
		parse_str($this->input->post('invoice'), $data);
		$advances = json_decode($this->input->post('advances'));
		$project_dates = json_decode($this->input->post('project_dates'), true);

		$employee_id = $this->session->userdata('employee_id');
		$employee = $this->employee->get_by_id($employee_id);
		$invoice_number = $this->getInvoiceNumber($employee->employee_initial);

		$invoice = array(
			'employee_id' => $employee_id,
			'employee_invoice_number' => $invoice_number,
			'client_id' => $data['client_id'],
			'project_id' => $data['project_id'],
			'project_scope' => $data['project_scope'],
			'project_dates' => $this->set_project_date($project_dates),
			'daily_rate_days' => $data['daily_rate_days'],
			'daily_rate_dates' => $data['daily_rate_dates'],
			'for_refund' => $data['for_refund'],
			'with_travelling_rate' => (isset($data['with_travelling_rate']))? 1 : 0,
			'travelling_rate_days' => (isset($data['travelling_days']))? $data['travelling_days'] : 0,
			'travelling_rate_dates' => (isset($data['travelling_start_date']))? $data['travelling_start_date'] : '',
			'with_project_leader_rate' => (isset($data['with_project_leader_rate']))? 1 : 0,
			'project_leader_rate_days' => $data['project_leader_days'],
			'project_leader_rate_dates' => $data['project_leader_start_date'],
			'pl_is_local' => $data['pl_is_local'],
			'with_meal_allowance' => (isset($data['with_meal_allowance']))? 1 : 0,
			'meal_allowance_days' => $data['meal_allowance_days'],
			'meal_allowance_dates' => $data['meal_allowance_start_date'],
			'meal_allowance_currency' => (isset($data['meal_allowance_currency']))? strtoupper($data['meal_allowance_currency']) : 'PHP',
			'meal_allowance_php_value' => (isset($data['meal_allowance_php_value']))? $data['meal_allowance_php_value'] : 1,
			'meal_allowance_rate' => (isset($data['meal_allowance_rate']))? $data['meal_allowance_rate'] : 0,
			'with_visa_application' => (isset($data['with_visa_application']))? 1 : 0,
			'visa_application_days' => $data['visa_days'],
			'visa_application_dates' => $data['visa_start_date'],
			'visa_application_is_local' => $data['visa_application_is_local'],
			'employee_invoice_status' => 'pending',
		);

		$invoice_id = $this->employee_invoice->add($invoice);
		$this->saveEmployeeRate($employee_id, $invoice_id);

		foreach($advances as $advance){
			$advance_data = array(
				'employee_invoice_id' => $invoice_id,
				'advance_cv' => $advance->advance_cv,
				'advance_date' => $advance->advance_date,
				'advance_value' => $advance->advance_amount
			);

			$this->employee_invoice->add_advances($advance_data);
		}

		foreach($project_dates as $project_date){
			$date_data = array(
				'employee_invoice_id' => $invoice_id,
				'project_start_date' => $project_date['project_start_date'],
				'project_end_date' => $project_date['project_end_date']
			);

			$this->employee_invoice->add_project_dates($date_data);
		}

		$this->sendMailToAccounting($invoice_id, $invoice_number, $employee);

		echo json_encode(array(
			'success' => true
		));
	}

	public function edit_details($employee_invoice_id){
		$data = array();
		parse_str($this->input->post('invoice'), $data);
		$advances = json_decode($this->input->post('advances'));
		$project_dates = json_decode($this->input->post('project_dates'), true);

		$employee_id = $this->session->userdata('employee_id');
		$employee = $this->employee->get_by_id($employee_id);
		$invoice_number = $this->getInvoiceNumber($employee->employee_initial);

		$invoice = array(
			'employee_invoice_number' => $invoice_number,
			'client_id' => $data['client_id'],
			'project_id' => $data['project_id'],
			'project_scope' => $data['project_scope'],
			'project_dates' => $this->set_project_date($project_dates),
			'daily_rate_days' => $data['daily_rate_days'],
			'daily_rate_dates' => $data['daily_rate_dates'],
			'for_refund' => $data['for_refund'],
			'with_travelling_rate' => (isset($data['with_travelling_rate']))? 1 : 0,
			'travelling_rate_days' => (isset($data['travelling_days']))? $data['travelling_days'] : 0,
			'travelling_rate_dates' => (isset($data['travelling_start_date']))? $data['travelling_start_date'] : '',
			'with_project_leader_rate' => (isset($data['with_project_leader_rate']))? 1 : 0,
			'project_leader_rate_days' => $data['project_leader_days'],
			'project_leader_rate_dates' => $data['project_leader_start_date'],
			'pl_is_local' => $data['pl_is_local'],
			'with_meal_allowance' => (isset($data['with_meal_allowance']))? 1 : 0,
			'meal_allowance_days' => $data['meal_allowance_days'],
			'meal_allowance_dates' => $data['meal_allowance_start_date'],
			'meal_allowance_currency' => (isset($data['meal_allowance_currency']))? strtoupper($data['meal_allowance_currency']) : 'PHP',
			'meal_allowance_php_value' => (isset($data['meal_allowance_php_value']))? $data['meal_allowance_php_value'] : 1,
			'meal_allowance_rate' => (isset($data['meal_allowance_rate']))? $data['meal_allowance_rate'] : 0,
			'with_visa_application' => (isset($data['with_visa_application']))? 1 : 0,
			'visa_application_days' => $data['visa_days'],
			'visa_application_dates' => $data['visa_start_date'],
			'visa_application_is_local' => $data['visa_application_is_local'],
			'employee_invoice_status' => 'pending',
		);

		$invoice_id = $employee_invoice_id;
		$this->employee_invoice->edit($employee_invoice_id, $invoice);
		$this->updateEmployeeRate($employee_id, $invoice_id);

		$this->employee_invoice->remove_advances($invoice_id);
		foreach($advances as $advance){
			$advance_data = array(
				'employee_invoice_id' => $invoice_id,
				'advance_cv' => $advance->advance_cv,
				'advance_date' => $advance->advance_date,
				'advance_value' => $advance->advance_amount
			);

			$this->employee_invoice->add_advances($advance_data);
		}

		$this->employee_invoice->remove_dates($invoice_id);
		foreach($project_dates as $project_date){
			$date_data = array(
				'employee_invoice_id' => $invoice_id,
				'project_start_date' => $project_date['project_start_date'],
				'project_end_date' => $project_date['project_end_date']
			);

			$this->employee_invoice->add_project_dates($date_data);
		}

		$this->sendMailToAccounting($invoice_id, $invoice_number, $employee, false);

		echo json_encode(array(
			'success' => true
		));
	}

	private function getInvoiceNumber($initial){
		$result = file_get_contents(ACCCMS_URL.'api/get_invoice_number/'.$initial);
		$data = json_decode($result);
		return $data->initial;
	}

	private function saveEmployeeRate($employee_id, $invoice_id){
		$rate = $this->employee_rate->get_rate($employee_id);
		$data = array(
			'employee_invoice_id' => $invoice_id,
			'philippine_travel_rate' => $rate->philippine_travel_rate,
			'philippine_daily_rate' => $rate->philippine_daily_rate,
			'philippine_currency' => $rate->philippine_currency,
			'asia_travel_rate' => $rate->asia_travel_rate,
			'asia_daily_rate' => $rate->asia_daily_rate,
			'asia_currency' => $rate->asia_currency,
			'south_america_travel_rate' => $rate->south_america_travel_rate,
			'south_america_daily_rate' => $rate->south_america_daily_rate,
			'south_america_currency' => $rate->south_america_currency,
			'africa_travel_rate' => $rate->africa_travel_rate,
			'africa_daily_rate' => $rate->africa_daily_rate,
			'africa_currency' => $rate->africa_currency,
			'europe_travel_rate' => $rate->europe_travel_rate,
			'europe_daily_rate' => $rate->europe_daily_rate,
			'europe_currency' => $rate->europe_currency,
			'pl_local_rate' => $rate->pl_local_rate,
			'pl_local_currency' => $rate->pl_local_currency,
			'pl_international_rate' => $rate->pl_international_rate,
			'pl_international_currency' => $rate->pl_international_currency,
			'meal_allowance' => $rate->meal_allowance,
			'meal_currency' => $rate->meal_currency,
			'visa_local_rate' => $rate->visa_local_rate,
			'visa_international_rate' => $rate->visa_international_rate,
		);

		$this->employee_rate->save_invoice_rate($data);
	}

	private function updateEmployeeRate($employee_id, $invoice_id){
		$rate = $this->employee_rate->get_rate($employee_id);
		$data = array(
			'philippine_travel_rate' => $rate->philippine_travel_rate,
			'philippine_daily_rate' => $rate->philippine_daily_rate,
			'philippine_currency' => $rate->philippine_currency,
			'asia_travel_rate' => $rate->asia_travel_rate,
			'asia_daily_rate' => $rate->asia_daily_rate,
			'asia_currency' => $rate->asia_currency,
			'south_america_travel_rate' => $rate->south_america_travel_rate,
			'south_america_daily_rate' => $rate->south_america_daily_rate,
			'south_america_currency' => $rate->south_america_currency,
			'africa_travel_rate' => $rate->africa_travel_rate,
			'africa_daily_rate' => $rate->africa_daily_rate,
			'africa_currency' => $rate->africa_currency,
			'europe_travel_rate' => $rate->europe_travel_rate,
			'europe_daily_rate' => $rate->europe_daily_rate,
			'europe_currency' => $rate->europe_currency,
			'pl_local_rate' => $rate->pl_local_rate,
			'pl_local_currency' => $rate->pl_local_currency,
			'pl_international_rate' => $rate->pl_international_rate,
			'pl_international_currency' => $rate->pl_international_currency,
			'meal_allowance' => $rate->meal_allowance,
			'meal_currency' => $rate->meal_currency,
			'visa_local_rate' => $rate->visa_local_rate,
			'visa_international_rate' => $rate->visa_international_rate,
		);

		$this->employee_rate->update_invoice_rate($invoice_id, $data);
	}

	public function get()
	{
		$employee_id = $this->session->userdata('employee_id');

		if($this->isAccounting()){
			$employee_id = null;
		}

		$search = $this->input->post('search');
		$cur_page = $this->input->post('page');

		$total_rows = $this->employee_invoice->total_rows($search);
		$start = $this->getStartRow($cur_page, PER_PAGE);

		$data = array(
			'list' => $this->employee_invoice->get($start, PER_PAGE, $search, $employee_id),
			'pagination' => $this->createPagination($total_rows, PER_PAGE, $cur_page)
		);

		echo json_encode($data);
	}

	public function details($employee_invoice_id){
		$invoice['invoice_id'] = $employee_invoice_id;
		$invoice['invoice'] = $this->employee_invoice->get_invoice($employee_invoice_id);

		if($invoice['invoice']){
			if(!($this->isAccounting() || $this->session->userdata('employee_id') == $invoice['invoice']['employee_id'])){
				redirect('invoice/view');
			}

			$invoice['invoice']['project_dates_str'] = $invoice['invoice']['project_dates'];
			$invoice['invoice']['advances'] = $this->employee_invoice->get_invoice_advances($employee_invoice_id);
			$invoice['invoice']['project_dates'] = $this->employee_invoice->get_invoice_project_dates($employee_invoice_id);
			$invoice['employee'] = $this->employee->get_by_id($invoice['invoice']['employee_id']);
			$invoice['project'] = $this->project->get_project($invoice['invoice']['project_id']);
			$invoice['invoice_number'] = $invoice['invoice']['employee_invoice_number'];
			$invoice['rate'] = $this->get_rate($invoice['invoice'], $employee_invoice_id, $invoice['project']->project_rate, $invoice['employee']->employee_is_regular);
			$invoice['client_name'] = $this->client->get_client($invoice['invoice']['client_id'])->client_initial;

			$this->load->view('invoice/details', $invoice);
		}
		else{
			redirect('invoice/view');
		}
	}

	private function sendMailToAccounting($invoice_id, $invoice_number, $employee, $updated = false){
		if($updated){
			$txt = ' updated an invoice ('.$invoice_number.').';
		}
		else{
			$txt = ' submitted a new invoice.';
		}

		$message = 'Hi Theresa Mae Marie Silawan, <br><br>'.ucfirst(strtolower($employee->employee_first_name)). ' ' . ucfirst(strtolower($employee->employee_last_name)).$txt.' <br><a href="'.base_url().'invoice/details/'. $invoice_id .'" style="color:#03a87c;text-decoration:none;display:inline-block;height:36px;line-height:36px;padding-top:0;padding-right:24px;padding-bottom:0;padding-left:24px;border:1px solid #03a87c;outline:0;background-color:#ffffff;font-size:14px;font-style:normal;font-weight:400;text-align:center;white-space:nowrap;border-radius:4px;margin-top:20px" target="_blank">Check Invoice</a><br><br>Thank you.';

		$this->send_mail_requests($this->config_init(), ACCOUNTING_EMAIL, 'hotwork.dev@gmail.com', 'Hotwork International Inc.', 'New Invoice: '.$invoice_number, $message);
	}

	// private function sendMailEmployee($invoice_id, $invoice_number, $employee){
	// 	$message = 'Hi '.ucfirst(strtolower($employee->employee_first_name)). ' ' . ucfirst(strtolower($employee->employee_last_name)).', <br><br>You submitted a new invoice. <br><a href="http://acc-cms.hotwork.ph/project/invoice/'. $invoice_id .'" style="color:#03a87c;text-decoration:none;display:inline-block;height:36px;line-height:36px;padding-top:0;padding-right:24px;padding-bottom:0;padding-left:24px;border:1px solid #03a87c;outline:0;background-color:#ffffff;font-size:14px;font-style:normal;font-weight:400;text-align:center;white-space:nowrap;border-radius:4px;margin-top:20px" target="_blank">Check Invoice</a><br><br>Thank you.';

	// 	$this->send_mail_requests($this->config_init(), $employee->employee_office_email, 'hotwork.dev@gmail.com', 'Hotwork International Inc.', 'New Invoice: '.$invoice_number, $message);
	// }
}