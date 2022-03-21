<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseModel.php'; 

class POOperations_model extends Base_Model {

	private $table = 'po_operations';

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function add($data, $purchase_order_id){
		$insert = array(
	        'purchase_order_id' => $purchase_order_id,
	        'po_operations_accomodation' => $data['po_operations_accomodation'],
	        'po_operations_transporation' => $data['po_operations_transporation'],
	        'po_operations_airfares' => $data['po_operations_airfares'],
	        'po_operations_wifi' => $data['po_operations_wifi'],
	        'po_operations_intel_license' => $data['po_operations_intel_license'],
	        'po_operations_ppe' => $data['po_operations_ppe'],
	        'po_operations_visa' => $data['po_operations_visa'],
	        'po_operations_bosh' => $data['po_operations_bosh'],
	        'po_operations_confined_spaces' => $data['po_operations_confined_spaces'],
	        'po_operations_work_at_heights' => $data['po_operations_work_at_heights'],
	        'po_operations_site_safety_orientation' => $data['po_operations_site_safety_orientation'],
	        'po_operations_work_permit' => $data['po_operations_work_permit'],
	        'po_operations_insurance_coverage' => $data['po_operations_insurance_coverage'],
	        'po_operations_nbi' => $data['po_operations_nbi'],
	        'po_operations_dfa' => $data['po_operations_dfa'],
	        'po_operations_medical' => $data['po_operations_medical'],
	        'po_operations_drug_test' => $data['po_operations_drug_test'],
	        'po_operations_urinalysis' => $data['po_operations_urinalysis'],
	        'po_operations_xray' => $data['po_operations_xray'],
	        'po_operations_fecalysis' => $data['po_operations_fecalysis'],
	        'po_operations_ecg' => $data['po_operations_ecg'],
	        'po_operations_status' => 'active'
		);

		$this->db->insert($this->table, $insert);
	}

	public function update($purchase_order_id, $data){
		$update = array(
	        'po_operations_accomodation' => $data['po_operations_accomodation'],
	        'po_operations_transporation' => $data['po_operations_transporation'],
	        'po_operations_airfares' => $data['po_operations_airfares'],
	        'po_operations_wifi' => $data['po_operations_wifi'],
	        'po_operations_intel_license' => $data['po_operations_intel_license'],
	        'po_operations_ppe' => $data['po_operations_ppe'],
	        'po_operations_visa' => $data['po_operations_visa'],
	        'po_operations_bosh' => $data['po_operations_bosh'],
	        'po_operations_confined_spaces' => $data['po_operations_confined_spaces'],
	        'po_operations_work_at_heights' => $data['po_operations_work_at_heights'],
	        'po_operations_site_safety_orientation' => $data['po_operations_site_safety_orientation'],
	        'po_operations_work_permit' => $data['po_operations_work_permit'],
	        'po_operations_insurance_coverage' => $data['po_operations_insurance_coverage'],
	        'po_operations_nbi' => $data['po_operations_nbi'],
	        'po_operations_dfa' => $data['po_operations_dfa'],
	        'po_operations_medical' => $data['po_operations_medical'],
	        'po_operations_drug_test' => $data['po_operations_drug_test'],
	        'po_operations_urinalysis' => $data['po_operations_urinalysis'],
	        'po_operations_xray' => $data['po_operations_xray'],
	        'po_operations_fecalysis' => $data['po_operations_fecalysis'],
	        'po_operations_ecg' => $data['po_operations_ecg']
		);

		$this->db->where('purchase_order_id', $purchase_order_id);
		$this->db->update($this->table, $update);
	}
}

/* End of file  */
/* Location: ./application/models/ */