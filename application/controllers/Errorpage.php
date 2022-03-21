<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseController.php'; 

class Errorpage extends BaseController {

	public function __construct()
	{
		parent::__construct();
	}

	public function unauthorized_access(){
		$this->load->view('401');
	}
}