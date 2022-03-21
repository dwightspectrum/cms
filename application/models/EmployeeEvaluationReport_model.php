<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseModel.php'; 

class EmployeeEvaluationReport_model extends Base_Model {

	private $table = 'employee_evaluation_report';
	protected $primaryKey = 'employee_evaluation_report_id';

	public function __construct()
	{
		parent::__construct($this->table);
	}

}