<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseController.php'; 

class Login extends BaseController {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Employee_model','employee');
		$this->load->model('Freelancer_model','freelancer');
	}

	public function index()
	{	
		if($this->session->userdata('employee_type') == 'employee'){
			redirect('dashboard');
		}else if($this->session->userdata('employee_type') == 'freelancer'){
			redirect('/dashboard/freelancer_view');
		}

		$this->load->view('login');
	}
	
	public function login_freelancer() {
		if($this->session->userdata('employee_type' == 'employee')){
			redirect('/dashboard');
		}else{
			$this->load->view('login_freelancer');
		}
	}

	public function login_user_credentials()
	{
		$employee = $this->employee->checkdata($this->input->post('employee_username'), $this->input->post('employee_password'));

		if($employee){
			$this->session->set_userdata('employee_id', $employee->employee_id);
			$this->session->set_userdata('employee_type', 'employee');
			$this->session->set_userdata('employee_first_name', $employee->employee_first_name);
			$this->session->set_userdata('employee_last_name', $employee->employee_last_name);
			$this->session->set_userdata('employee_username', $employee->employee_username);
			$this->session->set_userdata('employee_office_email', $employee->employee_office_email);
			$this->session->set_userdata('employee_photo', $employee->employee_photo);
			$this->session->set_userdata('employee_role', $employee->employee_role);

			$this->session->set_flashdata('success','You successfully logged in! Thank you.');
			redirect('/dashboard');

		}else{
			$this->session->set_flashdata('error','Incorrect user credentials! Please try again!');
			redirect('/login');
		}
	}

	public function login_freelancer_credentials() {

		$freelancer = $this->freelancer->checkdata($this->input->post('freelancer_username'), $this->input->post('freelancer_password'));
		
		if ($freelancer){
			$this->session->set_userdata('freelancer_id', $freelancer->freelancer_id);
			$this->session->set_userdata('employee_type', 'freelancer');
			$this->session->set_userdata('freelancer_first_name', $freelancer->freelancer_first_name);
			$this->session->set_userdata('freelancer_last_name', $freelancer->freelancer_last_name);
			$this->session->set_userdata('freelancer_username', $freelancer->freelancer_username);
			$this->session->set_userdata('freelancer_email', $freelancer->freelancer_email);
			$this->session->set_userdata('freelancer_profile', $freelancer->freelancer_profile);
			$this->session->set_userdata('freelancer_role', $freelancer->freelancer_role);

			$this->session->set_flashdata('success','You successfully logged in! Thank you.');
			redirect('/dashboard/freelancer_view');
		}
		else{
			$this->session->set_flashdata('error','Incorrect user credentials! Please try again!');
			redirect('/login/login_freelancer');
		}
	}

	public function logout()
	{	
		if($this->session->userdata('employee_type') == 'employee') {
			$this->session->sess_destroy();
			redirect('/login');
		} else {
		$this->session->sess_destroy();
		redirect('/login/login_freelancer');
		}
	}
	
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */