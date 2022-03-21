<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseController.php'; 

class Tickettracker extends BaseController {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Ticket_model','ticket');

		$this->check_user_session();
	}

	public function index(){
		$this->view();
	}

	public function view(){
		$this->loadView('ticket_tracker/view');
	}

	public function add(){
		$this->loadView('ticket_tracker/add');
	}

	public function add_ticket_details(){
		$data = array();
		parse_str($this->input->post('ticket'), $data);

		if(isset($data['airline_ticket_rebookable'])){
			$data['airline_ticket_rebookable'] = 1;
		}
		else{
			$data['airline_ticket_rebookable'] = 0;
		}

		$this->ticket->add($data);
		echo json_encode(array('success' => true));
	}

	public function get()
	{
		$this->admin_only();

		$search = $this->input->post('search');
		$cur_page = $this->input->post('page');

		$total_rows = $this->ticket->total_rows($search);
		$start = $this->getStartRow($cur_page, PER_PAGE);

		$data = array(
			'list' => $this->ticket->get($start, PER_PAGE, $search),
			'pagination' => $this->createPagination($total_rows, PER_PAGE, $cur_page)
		);

		echo json_encode($data);
	}

	public function delete($ticket_id){
		$this->ticket->delete($ticket_id);
		echo json_encode(array('success' => true));
	}

	public function edit($ticket_id){
		$this->cfg['ticket_id'] = $ticket_id;
		$data['ticket'] = $this->ticket->get_by_id($ticket_id);

		$this->loadView('ticket_tracker/edit', $data);
	}

	public function update_ticket_details($ticket_id){
		$data = array();
		parse_str($this->input->post('ticket'), $data);

		if(isset($data['airline_ticket_rebookable'])){
			$data['airline_ticket_rebookable'] = 1;
		}
		else{
			$data['airline_ticket_rebookable'] = 0;
		}

		$this->ticket->update($ticket_id, $data);
		echo json_encode(array('success' => true));
	}
}