<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseController.php'; 

class Project extends BaseController {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Project_model','project');

		$this->check_user_session();
	}

	public function index(){
		$this->view();
	}

	public function view(){
		// $this->loadView('dashboard');
	}

	public function get_projects($client_id){
		echo json_encode($this->project->get_by_client($client_id));
	}

}