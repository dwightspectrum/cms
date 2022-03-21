<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseController.php'; 

class Purchaseorder extends BaseController {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('PurchaseOrder_model','purchase_order');
		$this->load->model('POOperations_model','po_operation');
		$this->load->model('POTrucking_model','po_trucking');
		$this->load->model('POOperationsDetails_model','po_operation_details');
		$this->load->model('ExternalClient_model','external_client');
		$this->load->model('Employee_model','employee');

		$this->check_user_session();
	}

	public function index(){
		$this->view();
	}

	public function view(){
		$this->loadView('purchase_order/view');
	}

	public function set_manpower_to_complete($purchase_order_id){
		echo json_encode($this->purchase_order->set_manpower_to_complete($purchase_order_id));
	}

	public function set_manpower_to_not_complete($purchase_order_id){
		echo json_encode($this->purchase_order->set_manpower_to_not_complete($purchase_order_id));
	}

	public function set_trucking_to_complete($purchase_order_id){
		echo json_encode($this->purchase_order->set_trucking_to_complete($purchase_order_id));
	}

	public function set_trucking_to_not_complete($purchase_order_id){
		echo json_encode($this->purchase_order->set_trucking_to_not_complete($purchase_order_id));
	}

	public function set_shipping_to_complete($purchase_order_id){
		echo json_encode($this->purchase_order->set_shipping_to_complete($purchase_order_id));
	}

	public function set_shipping_to_not_complete($purchase_order_id){
		echo json_encode($this->purchase_order->set_shipping_to_not_complete($purchase_order_id));
	}

	public function display_details($purchase_order_id){
		$this->cfg['purchase_order_id'] = $purchase_order_id;
		$data['po'] = $this->purchase_order->get_by_id($purchase_order_id);

		$this->loadView('purchase_order/display_details', $data);
	}

	public function display_mode(){
		$data['current_year'] = date('Y');

		$this->loadView('purchase_order/display_mode', $data);
	}

	public function add(){
		$this->loadView('purchase_order/add');
	}

	public function delete($purchase_order_id){
		$this->purchase_order->delete($purchase_order_id);
		echo json_encode(array('success' => true));
	}

	public function close_project($purchase_order_id){
		$this->purchase_order->close_project($purchase_order_id);
		echo json_encode(array('success' => true));
	}

	public function send_mail_project_closed($purchase_order_id){
		$pm = $this->po_operation_details->get_project_managers($purchase_order_id);
		$data['po'] = $this->purchase_order->get_by_id($purchase_order_id);

		$this->sendMailToBernard($data['po']->purchase_order_name);

		foreach($pm as $p){
			if($p->employee_office_email == "bernard.carpio@hotwork.ag"){
				break;
			}else{
				$this->sendMailToPMs($p);
			}
		}
	}

	public function delete_technician($po_operations_details_id){
		$po_details = $this->po_operation_details->get_all_technician_files_by_po_details($po_operations_details_id);
		
		foreach($po_details as $key => $details){
			if($details){
				unlink(FCPATH.'asset/projects/' . $details);
			}
		}
		
		$this->po_operation_details->delete_technician($po_operations_details_id);
		echo json_encode(array('success' => true));
	}

	public function add_pull_out_details($purchase_order_id){
		$this->cfg['purchase_order_id'] = $purchase_order_id;
		$data['po'] = $this->purchase_order->get_by_id($purchase_order_id);

		$this->loadView('purchase_order/add_pull_out_details', $data);
	}

	public function edit_pull_out_details($purchase_order_id){
		$this->cfg['purchase_order_id'] = $purchase_order_id;
		$data['trucking'] = $this->po_trucking->get_by_id($purchase_order_id);
		$data['po'] = $this->purchase_order->get_by_id($purchase_order_id);

		$this->loadView('purchase_order/edit_pull_out_details', $data);
	}
	
	public function add_post_project_details($purchase_order_id){
		$this->cfg['purchase_order_id'] = $purchase_order_id;
		$data['po'] = $this->purchase_order->get_by_id($purchase_order_id);

		$this->loadView('purchase_order/add_post_project_details', $data);
	}

	public function edit_post_project_details($purchase_order_id){
		$this->cfg['purchase_order_id'] = $purchase_order_id;
		$data['po'] = $this->purchase_order->get_by_id($purchase_order_id);

		$this->loadView('purchase_order/edit_post_project_details', $data);
	}

	public function add_shipping_list($purchase_order_id){
		$this->cfg['purchase_order_id'] = $purchase_order_id;
		$data['po'] = $this->purchase_order->get_by_id($purchase_order_id);

		$this->loadView('purchase_order/add_shipping_documents', $data);
	}

	public function update_shipping_list($purchase_order_id){
		$this->cfg['purchase_order_id'] = $purchase_order_id;
		$data['po'] = $this->purchase_order->get_by_id($purchase_order_id);

		$this->loadView('purchase_order/edit_shipping_documents', $data);
	}

	public function add_manpower($purchase_order_id){
		$this->cfg['purchase_order_id'] = $purchase_order_id;
		$data['po'] = $this->purchase_order->get_by_id($purchase_order_id);

		$this->loadView('purchase_order/add_manpower', $data);
	}

	public function add_pull_out_details_data($purchase_order_id)
	{
		$this->admin_only();
		$data = $this->input->post();

		$quotation = $this->do_upload_quotation();



		$data['po_trucking_quotation'] = $quotation['file_name'];
 
		$this->po_trucking->add($data, $purchase_order_id);

		echo json_encode(array('success' => true));
	}

	public function add_post_project_data($purchase_order_id)
	{
		$this->admin_only();
		$data = $this->input->post();

		if($_FILES['purchase_order_acceptance_report']['name'] != ""){
			$acceptance_report = $this->do_upload('purchase_order_acceptance_report');
		}else{
			$acceptance_report = "";
		}

		if($_FILES['purchase_order_logsheets']['name'] != ""){
			$logsheets = $this->do_upload('purchase_order_logsheets');
		}else{
			$logsheets = "";
		}

		$data['purchase_order_acceptance_report'] = $acceptance_report['file_name'];
		$data['purchase_order_logsheets'] = $logsheets['file_name'];
 
		$this->purchase_order->update_post_project_data($data, $purchase_order_id);

		echo json_encode(array('success' => true));
	}

	public function update_post_project_data($purchase_order_id)
	{
		$this->admin_only();
		$data = $this->input->post();

		$po = $this->purchase_order->get_by_id($purchase_order_id);
		$ar_file_name = "";
		$ls_file_name = "";

		if($po->purchase_order_acceptance_report){
			if($_FILES['purchase_order_acceptance_report']['name'] != ""){
				unlink(FCPATH.'asset/projects/' . $po->purchase_order_acceptance_report);

				$acceptance_report = $this->do_upload('purchase_order_acceptance_report');

				$ar_file_name = $acceptance_report['file_name'];
			}else{
				$ar_file_name = "";
			}
		}else{
			if($_FILES['purchase_order_acceptance_report']['name'] != ""){
				$acceptance_report = $this->do_upload('purchase_order_acceptance_report');

				$ar_file_name = $acceptance_report['file_name'];
			}else{
				$ar_file_name = "";
			}
		}

		if($po->purchase_order_logsheets){
			if($_FILES['purchase_order_logsheets']['name'] != ""){
				unlink(FCPATH.'asset/projects/' . $po->purchase_order_logsheets);

				$logsheets = $this->do_upload('purchase_order_logsheets');

				$ls_file_name = $logsheets['file_name'];
			}else{
				$ls_file_name = "";
			}
		}else{
			if($_FILES['purchase_order_logsheets']['name'] != ""){
				$logsheets = $this->do_upload('purchase_order_logsheets');
				
				$ls_file_name = $logsheets['file_name'];
			
			}else{
				$ls_file_name = "";
			}
		}

		$data['purchase_order_acceptance_report'] = $ar_file_name;
		$data['purchase_order_logsheets'] = $ls_file_name;

		$this->purchase_order->update_post_project_data($data, $purchase_order_id);

		echo json_encode(array('success' => true));
	}

	public function add_shipping_documents_data($purchase_order_id)
	{
		$this->admin_only();
		$data = $this->input->post();

		if($_FILES['purchase_order_packing_list']['name'] != ""){
			$packing_lists = $this->do_upload_shipping_docs('shipping_documents', 'purchase_order_packing_list');
		}else{
			$packing_lists = "";
		}

		if($_FILES['purchase_order_packing_list']['name'] != ""){
			$proforma_invoice = $this->do_upload_shipping_docs('shipping_documents', 'purchase_order_commercial_invoice');
		}else{
			$proforma_invoice = "";
		}

		$data['purchase_order_packing_list'] = $packing_lists['file_name'];
		$data['purchase_order_commercial_invoice'] = $proforma_invoice['file_name'];
 
		$this->purchase_order->add_shipping_documents($data, $purchase_order_id);

		echo json_encode(array('success' => true));
	}

	public function edit_shipping_documents_data($purchase_order_id)
	{
		$this->admin_only();
		$data = $this->input->post();

		$po = $this->purchase_order->get_by_id($purchase_order_id);
		$pl_file_name = "";
		$ci_file_name = "";

		if($po->purchase_order_packing_list){
			if($_FILES['purchase_order_packing_list']['name'] != ""){
				unlink(FCPATH.'asset/projects/shipping_documents/' . $po->purchase_order_packing_list);

				$packing_lists = $this->do_upload_shipping_docs('shipping_documents', 'purchase_order_packing_list');

				$pl_file_name = $packing_lists['file_name'];
			}else{
				$pl_file_name = "";
			}
		}else{
			if($_FILES['purchase_order_packing_list']['name'] != ""){
				$packing_lists = $this->do_upload_shipping_docs('shipping_documents', 'purchase_order_packing_list');

				$pl_file_name = $packing_lists['file_name'];
			}else{
				$pl_file_name = "";
			}
		}

		if($po->purchase_order_commercial_invoice){
			if($_FILES['purchase_order_commercial_invoice']['name'] != ""){
				unlink(FCPATH.'asset/projects/shipping_documents/' . $po->purchase_order_commercial_invoice);

				$proforma_invoice = $this->do_upload_shipping_docs('shipping_documents', 'purchase_order_commercial_invoice');

				$ci_file_name = $proforma_invoice['file_name'];
			}else{
				$ci_file_name = "";
			}
		}else{
			if($_FILES['purchase_order_commercial_invoice']['name'] != ""){
				$proforma_invoice = $this->do_upload_shipping_docs('shipping_documents', 'purchase_order_commercial_invoice');
				
				$ci_file_name = $proforma_invoice['file_name'];
			
			}else{
				$ci_file_name = "";
			}
		}

		$data['purchase_order_packing_list'] = $pl_file_name;
		$data['purchase_order_commercial_invoice'] = $ci_file_name;

		$this->purchase_order->update_shipping_documents($data, $purchase_order_id);

		echo json_encode(array('success' => true));
	}

	private function do_upload_shipping_docs($path, $name){
		$config['upload_path'] = realpath(APPPATH.'../asset/projects/'.$path);
		$config['allowed_types'] = '*';
		$config['max_size'] = '0';

		$this->load->library('upload', $config);

		if(!$this->upload->do_upload($name)){
			$errors = $this->upload->display_errors();
			return null;
		}

		return $this->upload->data();
	}

	public function update_pull_out_details_data($purchase_order_id)
	{
		$this->admin_only();
		$data = $this->input->post();

		if($_FILES['po_trucking_quotation']['name'] == ""){
			$this->po_trucking->update_without_file($data, $purchase_order_id);
		}else{
			$quotation = $this->do_upload_quotation();

			$data['po_trucking_quotation'] = $quotation['file_name'];

			unlink(FCPATH.'asset/projects/quotations/' . $data['po_trucking_quotation_file_name']);

			$this->po_trucking->update($data, $purchase_order_id);
		}

		echo json_encode(array('success' => true));
	}

	private function do_upload_quotation(){
		$config['upload_path'] = realpath(APPPATH.'../asset/projects/quotations');
		$config['allowed_types'] = '*';
		$config['max_size'] = '0';

		$this->load->library('upload', $config);

		if(!$this->upload->do_upload('po_trucking_quotation')){
			$errors = $this->upload->display_errors();
			return null;
		}
		return $this->upload->data();
	}

	public function get_manpower_list($purchase_order_id, $employee_id)
	{
		$manpower = $this->po_operation_details->get_manpower_count($purchase_order_id);
		$technician_checker = $this->po_operation_details->check_if_manpower_exists($purchase_order_id, $employee_id);
		$exist = false;
		$manpower_count = 0;

		if($technician_checker){
			$exist = true;
			$manpower_count = 1;
		}else{
			$exist = false;

			if($manpower){
				$manpower_count = $manpower->manpower_count;
			}else{
				$manpower_count = 0;
			}
		}

		echo json_encode(array('exist' => $exist, 'manpower_count' => $manpower_count));
	}

	public function add_po_operation_details($purchase_order_id)
	{
		$this->admin_only();
		$data = array();
		$file_names = '';

		$data['employee_id'] = $this->input->post('employee_id');
		$data['po_operations_set_as_pm'] = $this->input->post('po_operations_set_as_pm');

		if(isset($data['po_operations_set_as_pm']) == "checked"){
			$data['po_operations_set_as_pm'] = 1;
		}else{
			$data['po_operations_set_as_pm'] = 0;
		}
		
		$technician_checker = $this->po_operation_details->check_if_manpower_exists($purchase_order_id, $data['employee_id']);

		if($technician_checker){
			foreach($_FILES as $name => $index){
				$filename = $this->do_upload($name);

				if($filename){
					$data[$name] = $filename['file_name'];
				}
			}

			$this->po_operation_details->update($data, $purchase_order_id);
		}else{
			foreach($_FILES as $name => $index){
				$filename = $this->do_upload($name);

				$data[$name] = $filename['file_name'];
			}
			
			$this->po_operation_details->add($data, $purchase_order_id);
		}

		echo json_encode(array('success' => true));
	}

	private function do_upload($name){
		$config['upload_path'] = realpath(APPPATH.'../asset/projects');
		$config['allowed_types'] = '*';
		$config['max_size'] = '0';

		$this->load->library('upload', $config);

		if(!$this->upload->do_upload($name)){
			$errors = $this->upload->display_errors();
			return null;
		}
		return $this->upload->data();
	}

	public function edit($purchase_order_id){
		$this->cfg['purchase_order_id'] = $purchase_order_id;
		$data['po'] = $this->purchase_order->get_by_id($purchase_order_id);

		$this->loadView('purchase_order/edit', $data);
	}

	public function get_external_clients(){
		$search = $this->input->post('search');

		echo json_encode($this->external_client->get_external_clients($search));
	}

	public function get_external_clients_no_search(){
		echo json_encode($this->external_client->get_external_clients_no_search());
	}

	public function get_monthly_projects($year, $month){
		$this->admin_only();

		$cur_page = $this->input->post('page');

		$total_rows = $this->purchase_order->get_monthly_projects_row($year, $month);
		$start = $this->getStartRow($cur_page, PROJECT_PAGE);

		$data = array(
			'list' => $this->purchase_order->get_monthly_projects($start, PROJECT_PAGE, $year, $month),
			'pagination' => $this->createPagination($total_rows, PROJECT_PAGE, $cur_page)
		);

		echo json_encode($data);
	}	

	public function get()
	{
		$this->admin_only();

		$search = $this->input->post('search');
		$cur_page = $this->input->post('page');

		$total_rows = $this->purchase_order->total_rows($search);
		$start = $this->getStartRow($cur_page, PER_PAGE);

		$data = array(
			'list' => $this->purchase_order->get($start, PER_PAGE, $search),
			'pagination' => $this->createPagination($total_rows, PER_PAGE, $cur_page)
		);

		echo json_encode($data);
	}

	public function get_technician_list($purchase_order_id)
	{
		$this->admin_only();

		$search = $this->input->post('search');
		$cur_page = $this->input->post('page');

		$total_rows = $this->po_operation_details->get_technician_list_total_rows($search, $purchase_order_id);
		$start = $this->getStartRow($cur_page, PER_PAGE);

		$data = array(
			'list' => $this->po_operation_details->get_technician_list($start, PER_PAGE, $search, $purchase_order_id),
			'pagination' => $this->createPagination($total_rows, PER_PAGE, $cur_page)
		);

		echo json_encode($data);
	}

	private function sendMailToBernard($project_name){
		$txt = 'Project ' . $project_name . ' has been closed. Please sign in to your account and provide post project details.';

		$message = 'Hi Bernard Carpio, <br><br>'.$txt.' <br><a href="http://49.151.35.79/acc-cms" style="color:#03a87c;text-decoration:none;display:inline-block;height:36px;line-height:36px;padding-top:0;padding-right:24px;padding-bottom:0;padding-left:24px;border:1px solid #03a87c;outline:0;background-color:#ffffff;font-size:14px;font-style:normal;font-weight:400;text-align:center;white-space:nowrap;border-radius:4px;margin-top:20px" target="_blank">Sign In</a>&nbsp;';

		$this->send_mail_requests($this->config_init(), 'bernard.carpio@hotwork.ag', 'hotwork.dev@gmail.com', 'Hotwork International Inc.', 'Project Name: '.$project_name, $message);
	}

	private function sendMailToPMs($employee){
		$txt = 'A project has been closed. Please sign in to your account and provide post project details.';

		$message = 'Hi ' .ucfirst(strtolower($employee->employee_first_name)). ' ' . ucfirst(strtolower($employee->employee_last_name)). ', <br><br>'.$txt.' <br><a href="http://49.151.35.79/acc-cms" style="color:#03a87c;text-decoration:none;display:inline-block;height:36px;line-height:36px;padding-top:0;padding-right:24px;padding-bottom:0;padding-left:24px;border:1px solid #03a87c;outline:0;background-color:#ffffff;font-size:14px;font-style:normal;font-weight:400;text-align:center;white-space:nowrap;border-radius:4px;margin-top:20px" target="_blank">Sign In</a>&nbsp;';

		$this->send_mail_requests($this->config_init(), $employee->employee_office_email, 'hotwork.dev@gmail.com', 'Hotwork International Inc.', 'Project Name: '.$employee->purchase_order_name, $message);
	}

	private function sendMailToJerlyn($purchase_order_id, $purchase_order_number, $employee, $updated = false){
		if($updated){
			$txt = ' updated a project with a purchase order ('.$purchase_order_number.').';
		}
		else{
			$txt = ' added a new project. Please sign in to your account and check Project section.';
		}

		$message = 'Hi Jerlyn Silawan, <br><br>'.ucfirst(strtolower($employee->employee_first_name)). ' ' . ucfirst(strtolower($employee->employee_last_name)).$txt.' <br><a href="http://49.151.35.79/acc-cms" style="color:#03a87c;text-decoration:none;display:inline-block;height:36px;line-height:36px;padding-top:0;padding-right:24px;padding-bottom:0;padding-left:24px;border:1px solid #03a87c;outline:0;background-color:#ffffff;font-size:14px;font-style:normal;font-weight:400;text-align:center;white-space:nowrap;border-radius:4px;margin-top:20px" target="_blank">Sign In</a>&nbsp;<a href="http://49.151.35.79/acc-cms/purchaseorder/view/" style="color:#03a87c;text-decoration:none;display:inline-block;height:36px;line-height:36px;padding-top:0;padding-right:24px;padding-bottom:0;padding-left:24px;border:1px solid #03a87c;outline:0;background-color:#ffffff;font-size:14px;font-style:normal;font-weight:400;text-align:center;white-space:nowrap;border-radius:4px;margin-top:20px" target="_blank">Check Project</a><br><br>Thank you.';

		$this->send_mail_requests($this->config_init(), JERLYN_EMAIL, 'hotwork.dev@gmail.com', 'Hotwork International Inc.', 'New Purchase Order: '.$purchase_order_number, $message);
	}

	private function sendMailToFranco($purchase_order_id, $purchase_order_number, $employee, $updated = false){
		if($updated){
			$txt = ' updated a project ('.$purchase_order_number.').';
		}
		else{
			$txt = ' added a new project. Please sign in to your account and check Project for you to allocate manpower and other files.';
		}

		$message = 'Hi Franco Arcilla, <br><br>'.ucfirst(strtolower($employee->employee_first_name)). ' ' . ucfirst(strtolower($employee->employee_last_name)).$txt.' <br><a href="http://cms.hotwork.ph/" style="color:#03a87c;text-decoration:none;display:inline-block;height:36px;line-height:36px;padding-top:0;padding-right:24px;padding-bottom:0;padding-left:24px;border:1px solid #03a87c;outline:0;background-color:#ffffff;font-size:14px;font-style:normal;font-weight:400;text-align:center;white-space:nowrap;border-radius:4px;margin-top:20px" target="_blank">Sign In</a>&nbsp;<a href="http://cms.hotwork.ph/purchaseorder/add_manpower/' . $purchase_order_id . '" style="color:#03a87c;text-decoration:none;display:inline-block;height:36px;line-height:36px;padding-top:0;padding-right:24px;padding-bottom:0;padding-left:24px;border:1px solid #03a87c;outline:0;background-color:#ffffff;font-size:14px;font-style:normal;font-weight:400;text-align:center;white-space:nowrap;border-radius:4px;margin-top:20px" target="_blank">Check Project</a><br><br>Thank you.';

		$this->send_mail_requests($this->config_init(), FRANCO_EMAIL, 'hotwork.dev@gmail.com', 'Hotwork International Inc.', 'New Project: '.$purchase_order_number, $message);
	}

	private function sendMailToFrancis($purchase_order_id, $purchase_order_number, $employee, $updated = false){
		if($updated){
			$txt = ' updated a project ('.$purchase_order_number.').';
		}
		else{
			$txt = ' added a new project. Please sign in to your account and check Project for you to add the trucking details and shipping documents.';
		}

		$message = 'Hi Franco Arcilla, <br><br>'.ucfirst(strtolower($employee->employee_first_name)). ' ' . ucfirst(strtolower($employee->employee_last_name)).$txt.' <br><a href="http://cms.hotwork.ph/" style="color:#03a87c;text-decoration:none;display:inline-block;height:36px;line-height:36px;padding-top:0;padding-right:24px;padding-bottom:0;padding-left:24px;border:1px solid #03a87c;outline:0;background-color:#ffffff;font-size:14px;font-style:normal;font-weight:400;text-align:center;white-space:nowrap;border-radius:4px;margin-top:20px" target="_blank">Sign In</a>&nbsp;<a href="http://cms.hotwork.ph/purchaseorder/view" style="color:#03a87c;text-decoration:none;display:inline-block;height:36px;line-height:36px;padding-top:0;padding-right:24px;padding-bottom:0;padding-left:24px;border:1px solid #03a87c;outline:0;background-color:#ffffff;font-size:14px;font-style:normal;font-weight:400;text-align:center;white-space:nowrap;border-radius:4px;margin-top:20px" target="_blank">Check Project</a><br><br>Thank you.';

		$this->send_mail_requests($this->config_init(), FRANCIS_EMAIL, 'hotwork.dev@gmail.com', 'Hotwork International Inc.', 'New Project: '.$purchase_order_number, $message);
	}

	public function add_purchase_order(){
		$data = array();
		parse_str($this->input->post('purchase_order'), $data);
		$client_id = "";

		if(!(empty($data['external_client_id']))){
			$client_id = $data['external_client_id'];
		}else{
			$client_id = $this->external_client->add($data);
		}

		$data['external_client_id'] = $client_id;

		$purchase_order_id = $this->purchase_order->add($data);

		$po = $this->purchase_order->get_by_id($purchase_order_id);
		$employee = $this->employee->get_by_id($po->purchase_order_added_by);

		$this->sendMailToJerlyn($purchase_order_id, $po->purchase_order_number, $employee);
		$this->sendMailToFranco($purchase_order_id, $po->purchase_order_number, $employee);
		$this->sendMailToFrancis($purchase_order_id, $po->purchase_order_number, $employee);

		if(isset($data['po_operations_accomodation']) == "checked"){
			$data['po_operations_accomodation'] = 1;
		}else{
			$data['po_operations_accomodation'] = 0;
		}

		if(isset($data['po_operations_transporation']) == "checked"){
			$data['po_operations_transporation'] = 1;
		}else{
			$data['po_operations_transporation'] = 0;
		}

		if(isset($data['po_operations_airfares']) == "checked"){
			$data['po_operations_airfares'] = 1;
		}else{
			$data['po_operations_airfares'] = 0;
		}

		if(isset($data['po_operations_wifi']) == "checked"){
			$data['po_operations_wifi'] = 1;
		}else{
			$data['po_operations_wifi'] = 0;
		}

		if(isset($data['po_operations_intel_license']) == "checked"){
			$data['po_operations_intel_license'] = 1;
		}else{
			$data['po_operations_intel_license'] = 0;
		}

		if(isset($data['po_operations_ppe']) == "checked"){
			$data['po_operations_ppe'] = 1;
		}else{
			$data['po_operations_ppe'] = 0;
		}

		if(isset($data['po_operations_visa']) == "checked"){
			$data['po_operations_visa'] = 1;
		}else{
			$data['po_operations_visa'] = 0;
		}

		if(isset($data['po_operations_bosh']) == "checked"){
			$data['po_operations_bosh'] = 1;
		}else{
			$data['po_operations_bosh'] = 0;
		}

		if(isset($data['po_operations_confined_spaces']) == "checked"){
			$data['po_operations_confined_spaces'] = 1;
		}else{
			$data['po_operations_confined_spaces'] = 0;
		}

		if(isset($data['po_operations_work_at_heights']) == "checked"){
			$data['po_operations_work_at_heights'] = 1;
		}else{
			$data['po_operations_work_at_heights'] = 0;
		}

		if(isset($data['po_operations_site_safety_orientation']) == "checked"){
			$data['po_operations_site_safety_orientation'] = 1;
		}else{
			$data['po_operations_site_safety_orientation'] = 0;
		}

		if(isset($data['po_operations_work_permit']) == "checked"){
			$data['po_operations_work_permit'] = 1;
		}else{
			$data['po_operations_work_permit'] = 0;
		}

		if(isset($data['po_operations_insurance_coverage']) == "checked"){
			$data['po_operations_insurance_coverage'] = 1;
		}else{
			$data['po_operations_insurance_coverage'] = 0;
		}

		if(isset($data['po_operations_nbi']) == "checked"){
			$data['po_operations_nbi'] = 1;
		}else{
			$data['po_operations_nbi'] = 0;
		}

		if(isset($data['po_operations_dfa']) == "checked"){
			$data['po_operations_dfa'] = 1;
		}else{
			$data['po_operations_dfa'] = 0;
		}

		if(isset($data['po_operations_medical']) == "checked"){
			$data['po_operations_medical'] = 1;
		}else{
			$data['po_operations_medical'] = 0;
		}

		if(isset($data['po_operations_drug_test']) == "checked"){
			$data['po_operations_drug_test'] = 1;
		}else{
			$data['po_operations_drug_test'] = 0;
		}

		if(isset($data['po_operations_urinalysis']) == "checked"){
			$data['po_operations_urinalysis'] = 1;
		}else{
			$data['po_operations_urinalysis'] = 0;
		}

		if(isset($data['po_operations_xray']) == "checked"){
			$data['po_operations_xray'] = 1;
		}else{
			$data['po_operations_xray'] = 0;
		}

		if(isset($data['po_operations_fecalysis']) == "checked"){
			$data['po_operations_fecalysis'] = 1;
		}else{
			$data['po_operations_fecalysis'] = 0;
		}

		if(isset($data['po_operations_ecg']) == "checked"){
			$data['po_operations_ecg'] = 1;
		}else{
			$data['po_operations_ecg'] = 0;
		}

		$this->po_operation->add($data, $purchase_order_id);

		echo json_encode(array('success' => true));
	}

	public function update_purchase_order($purchase_order_id){
		$data = array();
		parse_str($this->input->post('purchase_order'), $data);
		$client_id = 0;

		$client_exist = $this->external_client->check_if_client_exist($data['external_client_name']);

		if($client_exist){
			$client_id = $data['external_client_id'];
		}else{
			$client_id = $this->external_client->add($data);
		}

		$data['external_client_id'] = $client_id;

		//$this->external_client->update($purchase_order_id, $data);

		$this->purchase_order->update($purchase_order_id, $data);

		$po = $this->purchase_order->get_by_id($purchase_order_id);
		$employee = $this->employee->get_by_id($po->purchase_order_added_by);

		$this->sendMailToJerlyn($purchase_order_id, $po->purchase_order_number, $employee);
		$this->sendMailToFranco($purchase_order_id, $po->purchase_order_number, $employee);
		$this->sendMailToFrancis($purchase_order_id, $po->purchase_order_number, $employee);

		if(isset($data['po_operations_accomodation']) == "checked"){
			$data['po_operations_accomodation'] = 1;
		}else{
			$data['po_operations_accomodation'] = 0;
		}

		if(isset($data['po_operations_transporation']) == "checked"){
			$data['po_operations_transporation'] = 1;
		}else{
			$data['po_operations_transporation'] = 0;
		}

		if(isset($data['po_operations_airfares']) == "checked"){
			$data['po_operations_airfares'] = 1;
		}else{
			$data['po_operations_airfares'] = 0;
		}

		if(isset($data['po_operations_wifi']) == "checked"){
			$data['po_operations_wifi'] = 1;
		}else{
			$data['po_operations_wifi'] = 0;
		}

		if(isset($data['po_operations_intel_license']) == "checked"){
			$data['po_operations_intel_license'] = 1;
		}else{
			$data['po_operations_intel_license'] = 0;
		}

		if(isset($data['po_operations_ppe']) == "checked"){
			$data['po_operations_ppe'] = 1;
		}else{
			$data['po_operations_ppe'] = 0;
		}

		if(isset($data['po_operations_visa']) == "checked"){
			$data['po_operations_visa'] = 1;
		}else{
			$data['po_operations_visa'] = 0;
		}

		if(isset($data['po_operations_bosh']) == "checked"){
			$data['po_operations_bosh'] = 1;
		}else{
			$data['po_operations_bosh'] = 0;
		}

		if(isset($data['po_operations_confined_spaces']) == "checked"){
			$data['po_operations_confined_spaces'] = 1;
		}else{
			$data['po_operations_confined_spaces'] = 0;
		}

		if(isset($data['po_operations_work_at_heights']) == "checked"){
			$data['po_operations_work_at_heights'] = 1;
		}else{
			$data['po_operations_work_at_heights'] = 0;
		}

		if(isset($data['po_operations_site_safety_orientation']) == "checked"){
			$data['po_operations_site_safety_orientation'] = 1;
		}else{
			$data['po_operations_site_safety_orientation'] = 0;
		}

		if(isset($data['po_operations_work_permit']) == "checked"){
			$data['po_operations_work_permit'] = 1;
		}else{
			$data['po_operations_work_permit'] = 0;
		}

		if(isset($data['po_operations_insurance_coverage']) == "checked"){
			$data['po_operations_insurance_coverage'] = 1;
		}else{
			$data['po_operations_insurance_coverage'] = 0;
		}

		if(isset($data['po_operations_nbi']) == "checked"){
			$data['po_operations_nbi'] = 1;
		}else{
			$data['po_operations_nbi'] = 0;
		}

		if(isset($data['po_operations_dfa']) == "checked"){
			$data['po_operations_dfa'] = 1;
		}else{
			$data['po_operations_dfa'] = 0;
		}

		if(isset($data['po_operations_medical']) == "checked"){
			$data['po_operations_medical'] = 1;
		}else{
			$data['po_operations_medical'] = 0;
		}

		if(isset($data['po_operations_drug_test']) == "checked"){
			$data['po_operations_drug_test'] = 1;
		}else{
			$data['po_operations_drug_test'] = 0;
		}

		if(isset($data['po_operations_urinalysis']) == "checked"){
			$data['po_operations_urinalysis'] = 1;
		}else{
			$data['po_operations_urinalysis'] = 0;
		}

		if(isset($data['po_operations_xray']) == "checked"){
			$data['po_operations_xray'] = 1;
		}else{
			$data['po_operations_xray'] = 0;
		}

		if(isset($data['po_operations_fecalysis']) == "checked"){
			$data['po_operations_fecalysis'] = 1;
		}else{
			$data['po_operations_fecalysis'] = 0;
		}

		if(isset($data['po_operations_ecg']) == "checked"){
			$data['po_operations_ecg'] = 1;
		}else{
			$data['po_operations_ecg'] = 0;
		}

		$this->po_operation->update($purchase_order_id, $data);

		echo json_encode(array('success' => true));
	}
}