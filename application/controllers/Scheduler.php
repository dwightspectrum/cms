 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseController.php'; 

class Scheduler extends BaseController {

	private $airline_ticket_email_receiver = 'franco.arcilla@hotwork.ag';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Ticket_model','ticket');
		$this->load->model('PurchaseOrder_model','purchase_order');
	}

	public function purchase_order_notifs(){
		$pos = $this->purchase_order->get_purchase_order_for_notification();

		foreach($pos as $po){
			$message = 'Hi ' . ucfirst(strtolower($po->employee_first_name)). ' ' . ucfirst(strtolower($po->employee_last_name)) . ', <br><br>This is to remind you on the project that you have created with a P.O. Number of ' . $po->purchase_order_number . '. <br>The current order date of the project is on ' . $po->purchase_order_date . '. <br><br>Thank you.';

			
			if($po->purchase_order_reminder_date != NULL){
				$reminder_date = strtotime($po->purchase_order_reminder_date);
				$order_date = strtotime($po->purchase_order_date);
				$current_date = strtotime(date("Y-m-d"));

				if($current_date == $schedule_date){
					$this->send_mail_requests($this->config_init(), $po->employee_office_email, 'cms@hotwork.ph', 'Hotwork Management System Software', 'PURCHASE ORDER REMINDER', $message);
				}
			}else if($po->purchase_order_reminder_month != NULL){
				$reminder_date = $po->purchase_order_reminder_month;
				$order_date = strtotime($po->purchase_order_date);
				$current_date = date("Y-n-d");

				$year1 = date('Y', $order_date);
				$month1 = date('n', $order_date);
				$days1 = date('d', $order_date);

				$number_of_months = ($month1 - $reminder_date);

				if($number_of_months <= 0){
					$number_of_months += 12;
				}

				$final_date = $year1 . "-" . $number_of_months . "-" . $days1;

				if($final_date == $current_date){
					$this->send_mail_requests($this->config_init(), $po->employee_office_email, 'cms@hotwork.ph', 'Hotwork Management System Software', 'PURCHASE ORDER REMINDER', $message);
				}	
			}
		}
	}

	public function ticket_tracker_notifs(){
		$tickets = $this->ticket->get_return_tickets(3);
		
		$template = file_get_contents(base_url().'asset/email_templates/airline_ticket_tracker.txt');

		foreach ($tickets as $ticket) {
			$this->send_mail_requests($this->config_init(), $this->airline_ticket_email_receiver, 'cms@hotwork.ag', 'Hotwork Management System Software', 'AIRLINE TICKET TRACKER', $this->get_ticket_template($template, $ticket));
		}
	}

	private function get_ticket_template($template, $ticket){
		$return_date = new DateTime($ticket->airline_ticket_return_date);
		$return_str = $return_date->format("M d, Y");

		$doc_data = array(
			'BOOKING_REFERENCE_NUMBER' => $ticket->airline_ticket_ref_number,
			'PASSENGER' => $ticket->airline_ticket_passenger,
			'ROUTE' => $ticket->airline_ticket_route,
			'RETURN_DATE' => $return_str,
			'RETURN_TIME' => $ticket->airline_ticket_return_time
		);

		return $this->replace_template($template, $doc_data);
	}

	private function replace_template($template, $data)
	{
		$template_var = ['BOOKING_REFERENCE_NUMBER', 'PASSENGER', 'ROUTE', 'RETURN_DATE', 'RETURN_TIME'];

		foreach($template_var as $temp){
			if(isset($data[$temp])){
				$template = str_replace('{{'.$temp.'}}', $data[$temp], $template); 
			}
		}
		
		return $template;
	}

	private function sendMailToJerlyn($purchase_order_id, $purchase_order_number, $employee, $updated = false){
		if($updated){
			$txt = ' updated a purchase order ('.$purchase_order_number.').';
		}
		else{
			$txt = ' added a new purchase order. Please sign in to your account and check Purchase Orders.';
		}

		$message = 'Hi Jerlyn Silawan, <br><br>'.ucfirst(strtolower($employee->employee_first_name)). ' ' . ucfirst(strtolower($employee->employee_last_name)).$txt.' <br><a href="http://49.151.35.79/acc-cms" style="color:#03a87c;text-decoration:none;display:inline-block;height:36px;line-height:36px;padding-top:0;padding-right:24px;padding-bottom:0;padding-left:24px;border:1px solid #03a87c;outline:0;background-color:#ffffff;font-size:14px;font-style:normal;font-weight:400;text-align:center;white-space:nowrap;border-radius:4px;margin-top:20px" target="_blank">Sign In</a>&nbsp;<a href="http://49.151.35.79/acc-cms/purchaseorder/view/" style="color:#03a87c;text-decoration:none;display:inline-block;height:36px;line-height:36px;padding-top:0;padding-right:24px;padding-bottom:0;padding-left:24px;border:1px solid #03a87c;outline:0;background-color:#ffffff;font-size:14px;font-style:normal;font-weight:400;text-align:center;white-space:nowrap;border-radius:4px;margin-top:20px" target="_blank">Check Purchase Order</a><br><br>Thank you.';

		$this->send_mail_requests($this->config_init(), JERLYN_EMAIL, 'hotwork.dev@gmail.com', 'Hotwork International Inc.', 'New Purchase Order: '.$purchase_order_number, $message);
	}
}