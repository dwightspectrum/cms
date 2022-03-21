<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseController.php'; 

class Dashboard extends BaseController {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Company_model','company');
		$this->load->model('Employee_model','employee');
		$this->load->model('EmployeeChild_model','employee_child');
		$this->load->model('EmployeeJobHistory_model','job_history');
		$this->load->model('EmployeeVisa_model','visa');
		$this->load->model('CurriculumVitae_model','curriculum_vitae');
		$this->load->model('EmployeeHobby_model','employee_hobby');
		$this->load->model('EmployeeLanguage_model','employee_language');
		$this->load->model('EmployeeProfExp_model','employee_profexp');
		$this->load->model('EmployeeReference_model','employee_reference');
		$this->load->model('EmployeeSkill_model','employee_skill');
		$this->load->model('ServiceScopeList_model','service_scope');
		$this->load->model('EmployeeTravelHistory_model','travel_history');
		$this->load->model('Role_model','role');
		$this->load->model('Freelancer_model','freelancer');
	}

	public function index(){
		$this->view();
		
	}

	public function view(){
		
		$isAdmin = $this->isAdmin();

		if($isAdmin){
			$employee_id =  $this->session->userdata('employee_id');

			$data['isAdmin'] = $isAdmin;
			$data['companies'] = $this->company->get_all();
			$data['roles'] = $this->role->get_all();
			$this->cfg['employee_id'] = $employee_id;
			$this->loadView('employee/view', $data);
		}else {
			$employee_id =  $this->session->userdata('employee_id');

			$data['isAdmin'] = $isAdmin;
			$data['employee'] = $this->employee->get_by_id($employee_id);
			$data['children'] = $this->employee_child->get_children($employee_id);
			$data['skills'] = $this->employee_skill->get_skill($employee_id); 
			$data['references'] = $this->employee_reference->get_reference($employee_id);
			$data['pe'] = $this->employee_profexp->get_professional_experience($employee_id);
			$data['languages'] = $this->employee_language->get_language($employee_id);
			$data['hobbies'] = $this->employee_hobby->get_hobby($employee_id);
			$data['job_history'] = $this->get_service_name_list($this->job_history->get_job_history($employee_id));
			$data['travel_history'] = $this->travel_history->get_travel_history($employee_id);
			$data['visas'] = $this->visa->get_visas_granted($employee_id);
			$data['cv'] = $this->curriculum_vitae->get_curriculum_vitae($employee_id);

			// $this->cfg['employee_photo'] = $data['employee']->employee_photo;
			$this->cfg['employee_id'] = $employee_id;
		
			$this->loadView('employee/main_view', $data);
		} 
	}

	public function freelancer_view() {

		$isAdmin = $this->isAdmin();
		
		if ($isAdmin) {
			$this->loadView('freelancer/view');
		}else {

			$freelancer_id = $this->session->userdata('freelancer_id');
			$data['isAdmin'] = $isAdmin;
			$data['freelancer_id'] = $freelancer_id;
			$data['freelancer'] = $this->freelancer->get_freelancer_id($freelancer_id);
			$this->cfg['freelancer_id'] = $freelancer_id;
			// $this->cfg['freelancer_profile'] = $data['freelancer']->freelancer_profile;
			
			$this->loadView('freelancer/main_view', $data);
		}
	}

	private function get_service_name_list($job_list)
	{
		foreach($job_list as $job){
			$name_list = [];
			$services = $this->job_history->get_service_scopes($job->employee_job_history_id);

			foreach($services as $service){
				$name_list[] = $service->service_scope_list_name;
			}

			$job->service_scopes = $name_list;
		}

		return $job_list;
	}

}