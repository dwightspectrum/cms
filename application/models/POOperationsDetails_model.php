<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseModel.php'; 

class POOperationsDetails_model extends Base_Model {

	private $table = 'po_operations_details';

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function add($data, $purchase_order_id){
		$insert = array(
	        'purchase_order_id' => $purchase_order_id,
	        'employee_id' => $data['employee_id'],
	        'po_operations_set_as_pm' => $data['po_operations_set_as_pm'],
	        'po_operations_accomodation_file' => $data['po_operations_accomodation_file'],
	        'po_operations_transporation_file' => $data['po_operations_transporation_file'],
	        'po_operations_airfares_file' => $data['po_operations_airfares_file'],
	        'po_operations_visa_file' => $data['po_operations_visa_file'],
	        'po_operations_bosh_file' => $data['po_operations_bosh_file'],
	        'po_operations_confined_spaces_file' => $data['po_operations_confined_spaces_file'],
	        'po_operations_work_at_heights_file' => $data['po_operations_work_at_heights_file'],
	        'po_operations_work_permit_file' => $data['po_operations_work_permit_file'],
	        'po_operations_insurance_coverage_file' => $data['po_operations_insurance_coverage_file'],
	        'po_operations_nbi_file' => $data['po_operations_nbi_file'],
	        'po_operations_dfa_file' => $data['po_operations_dfa_file'],
	        'po_operations_medical_file' => $data['po_operations_medical_file'],
	        'po_operations_drug_test_file' => $data['po_operations_drug_test_file'],
	        'po_operations_urinalysis_file' => $data['po_operations_urinalysis_file'],
	        'po_operations_xray_file' => $data['po_operations_xray_file'],
	        'po_operations_fecalysis_file' => $data['po_operations_fecalysis_file'],
	        'po_operations_ecg_file' => $data['po_operations_ecg_file']
		);

		$this->db->insert($this->table, $insert);
	}

	public function update($data, $purchase_order_id){
		$this->db->where('purchase_order_id', $purchase_order_id);
		$this->db->where('employee_id', $data['employee_id']);
		$this->db->update($this->table, $data);
	}

	public function get_all_technician_files($purchase_order_id){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('purchase_order_id', $purchase_order_id);

		$query = $this->db->get();
		return $query->result();
	}

	public function check_if_manpower_exists($purchase_order_id, $employee_id){
		$this->db->select('*');
		$this->db->where('purchase_order_id', $purchase_order_id);
		$this->db->where('employee_id', $employee_id);

		$query = $this->db->get($this->table);
		return $query->row();
	}

	public function get_manpower_count($purchase_order_id){
		$this->db->select('COUNT(po_operations_details_id) as manpower_count');
		$this->db->from($this->table);
		$this->db->where('purchase_order_id', $purchase_order_id);

		$query = $this->db->get();
		return $query->row();
	}

	public function get_technician_list($start, $limit, $search = null, $purchase_order_id){
		if($search != null){
			$this->db->group_start();
			$this->set_table($this->table);
			parent::search_string($search);
			$this->set_table('employee');
			parent::search_string($search, null, null, true);
			$this->db->group_end();
		}
		
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('employee', 'po_operations_details.employee_id = employee.employee_id', 'left');
		$this->db->where('po_operations_details.purchase_order_id', $purchase_order_id);
		$this->db->order_by('employee.employee_last_name ASC');
		$this->db->order_by('employee.employee_first_name ASC');

		$this->db->limit($limit,$start);

		$query = $this->db->get();

		return $query->result();
	}

	public function get_technician_list_total_rows($search = null, $purchase_order_id){
		if($search != null){
			$this->db->group_start();
			$this->set_table($this->table);
			parent::search_string($search);
			$this->set_table('employee');
			parent::search_string($search, null, null, true);
			$this->db->group_end();
		}
		
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('employee', 'po_operations_details.employee_id = employee.employee_id', 'left');
		$this->db->where('po_operations_details.purchase_order_id', $purchase_order_id);
		$this->db->order_by('employee.employee_last_name ASC');
		$this->db->order_by('employee.employee_first_name ASC');

		return $this->db->count_all_results();
	}

	public function delete_technician($po_operations_details_id){
		$this->db->delete($this->table, array('po_operations_details_id' => $po_operations_details_id)); 
	}

	public function get_all_technician_files_by_po_details($po_operations_details_id){
		$this->db->select('po_operations_accomodation_file, po_operations_transporation_file, po_operations_airfares_file, po_operations_wifi_file, po_operations_visa_file, po_operations_nbi_file, po_operations_dfa_file, po_operations_medical_file, po_operations_drug_test_file, po_operations_urinalysis_file, po_operations_xray_file, po_operations_fecalysis_file, po_operations_ecg_file');
		$this->db->from($this->table);
		$this->db->where('po_operations_details_id', $po_operations_details_id);

		$query = $this->db->get();
		return $query->row_array();
	}

	public function get_project_managers($purchase_order_id){
		$this->db->select('employee.employee_office_email, employee.employee_id, employee.employee_first_name, employee.employee_last_name, employee.employee_middle_name, purchase_order.purchase_order_name');
		$this->db->from($this->table);
		$this->db->join('employee', 'po_operations_details.employee_id = employee.employee_id', 'left');
		$this->db->join('purchase_order', 'purchase_order.purchase_order_id = po_operations_details.purchase_order_id', 'left');
		$this->db->where('po_operations_details.purchase_order_id', $purchase_order_id);
		$this->db->where('po_operations_details.po_operations_set_as_pm', 1);

		$query = $this->db->get();
		return $query->result();
	}
}

/* End of file  */
/* Location: ./application/models/ */