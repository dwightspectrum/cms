<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseModel.php'; 

class FreelancerEvaluationReport_model extends Base_Model {

	private $table = 'freelancer_evaluation_report';
	protected $primaryKey = 'freelancer_evaluation_report_id';

	public function __construct()
	{
		parent::__construct($this->table);
	}

}