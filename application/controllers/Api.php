<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseController.php'; 

class Api extends BaseController {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Employee_model','employee');
	}

	public function get_all(){
		echo json_encode($this->employee->get_all());
	}

	public function saveSignatureImage(){
		$employee_id = $this->input->post('employee_id');
		$pin = $this->input->post('pin');
		$base64Image = $this->input->post('image');

		$employee = $this->employee->get_by_id($employee_id);

		if($employee){
			$middle_initial = strtolower(substr($employee->employee_middle_name,0,1));
			$birth_year = explode("-", $employee->employee_birthdate)[0];
			$correcPin = $middle_initial.$birth_year;
			
			if($correcPin == strtolower($pin)){
				$url = $_SERVER['DOCUMENT_ROOT'].'/asset/signatures/'.$employee_id.'.png';
			
				$img = str_replace('data:image/png;base64,', '', $base64Image);
				$img = str_replace(' ', '+', $img);
				$data = base64_decode($img);
				file_put_contents($url, $data);

				$this->employee->saveSignature($employee_id, $employee_id.'.png');

				echo json_encode(array(
					'success' => true,
					'message' => 'Saved Successfully!'
				));
			}
			else{
				echo json_encode(array(
					'success' => false,
					'message' => 'Incorrect Pin!'
				));
			}
		}
		else{
			echo json_encode(array(
				'success' => false,
				'message' => 'User not found!'
			));
		}
	}

}