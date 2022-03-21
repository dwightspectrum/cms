$(document).ready(function(){

	(function() {
      	[].slice.call(document.querySelectorAll('.sttabs')).forEach(function(el) {
          	new CBPFWTabs(el);
      	});
  	})();

  	get();

	$('#search').on('keyup', function(){
		get();
	});


	function get(page = 1){
	  	var search = $('#search').val();

	  	$.ajax({
	      	type: 'POST',
	      	url: CONFIG.BASE_URL + 'purchaseorder/get_technician_list/' + CONFIG.purchase_order_id,
	      	dataType: 'json',
	      	data: {
	        	page : page,
	        	search : search
	      	},
	      	success: function(result){
	      		loadData(result.list);
			    $('#pagination').html(result.pagination);
	        	setPaginationClicks();
	      	}
	  	});
	}

	function loadData(list){
		if(list.length > 0){
	      list.forEach(function(obj){
	        obj.technician_name = obj.employee_last_name.toUpperCase() + ", " + obj.employee_first_name.toUpperCase() + " " + obj.employee_middle_name.toUpperCase();
	        obj.po_operations_set_as_pm = (obj.po_operations_set_as_pm == 0) ? "<a style='color:#df0000;'><span class='fa fa-times'></span></a>" : "<a href='" + CONFIG.BASE_URL + 'asset/projects/' + obj.po_operations_accomodation_file + "' target='_blank' style='color:#7ace4c;'><span class='fa fa-check'></span></a>";
	        obj.po_operations_accomodation_file = isEmpty(obj.po_operations_accomodation_file) ? "<a style='color:#df0000;'><span class='fa fa-times'></span></a>" : "<a style='color:#7ace4c;'><span class='fa fa-check'></span></a>";
	        obj.po_operations_transporation_file = isEmpty(obj.po_operations_transporation_file) ? "<a style='color:#df0000;'><span class='fa fa-times'></span></a>" : "<a href='" + CONFIG.BASE_URL + 'asset/projects/' + obj.po_operations_transporation_file + "' target='_blank' style='color:#7ace4c;'><span class='fa fa-check'></span></a>";
	        obj.po_operations_airfares_file = isEmpty(obj.po_operations_airfares_file) ? "<a style='color:#df0000;'><span class='fa fa-times'></span></a>" : "<a href='" + CONFIG.BASE_URL + 'asset/projects/' + obj.po_operations_airfares_file + "' target='_blank' style='color:#7ace4c;'><span class='fa fa-check'></span></a>";
	        obj.po_operations_wifi_file = isEmpty(obj.po_operations_wifi_file) ? "<a style='color:#df0000;'><span class='fa fa-times'></span></a>" : "<a href='" + CONFIG.BASE_URL + 'asset/projects/' + obj.po_operations_wifi_file + "' target='_blank' style='color:#7ace4c;'><span class='fa fa-check'></span></a>";
	        obj.po_operations_visa_file = isEmpty(obj.po_operations_visa_file) ? "<a style='color:#df0000;'><span class='fa fa-times'></span></a>" : "<a href='" + CONFIG.BASE_URL + 'asset/projects/' + obj.po_operations_visa_file + "' target='_blank' style='color:#7ace4c;'><span class='fa fa-check'></span></a>";
	        obj.po_operations_bosh_file = isEmpty(obj.po_operations_bosh_file) ? "<a style='color:#df0000;'><span class='fa fa-times'></span></a>" : "<a href='" + CONFIG.BASE_URL + 'asset/projects/' + obj.po_operations_bosh_file + "' target='_blank' style='color:#7ace4c;'><span class='fa fa-check'></span></a>";
	        obj.po_operations_confined_spaces_file = isEmpty(obj.po_operations_confined_spaces_file) ? "<a style='color:#df0000;'><span class='fa fa-times'></span></a>" : "<a href='" + CONFIG.BASE_URL + 'asset/projects/' + obj.po_operations_confined_spaces_file + "' target='_blank' style='color:#7ace4c;'><span class='fa fa-check'></span></a>";
	        obj.po_operations_work_at_heights_file = isEmpty(obj.po_operations_work_at_heights_file) ? "<a style='color:#df0000;'><span class='fa fa-times'></span></a>" : "<a href='" + CONFIG.BASE_URL + 'asset/projects/' + obj.po_operations_work_at_heights_file + "' target='_blank' style='color:#7ace4c;'><span class='fa fa-check'></span></a>";
	        obj.po_operations_nbi_file = isEmpty(obj.po_operations_nbi_file) ? "<a style='color:#df0000;'><span class='fa fa-times'></span></a>" : "<a href='" + CONFIG.BASE_URL + 'asset/projects/' + obj.po_operations_nbi_file + "' target='_blank' style='color:#7ace4c;'><span class='fa fa-check'></span></a>";
	        obj.po_operations_dfa_file = isEmpty(obj.po_operations_dfa_file) ? "<a style='color:#df0000;'><span class='fa fa-times'></span></a>" : "<a href='" + CONFIG.BASE_URL + 'asset/projects/' + obj.po_operations_dfa_file + "' target='_blank' style='color:#7ace4c;'><span class='fa fa-check'></span></a>";
	        obj.po_operations_medical_file = isEmpty(obj.po_operations_medical_file) ? "<a style='color:#df0000;'><span class='fa fa-times'></span></a>" : "<a href='" + CONFIG.BASE_URL + 'asset/projects/' + obj.po_operations_medical_file + "' target='_blank' style='color:#7ace4c;'><span class='fa fa-check'></span></a>";
	        obj.po_operations_drug_test_file = isEmpty(obj.po_operations_drug_test_file) ? "<a style='color:#df0000;'><span class='fa fa-times'></span></a>" : "<a href='" + CONFIG.BASE_URL + 'asset/projects/' + obj.po_operations_drug_test_file + "' target='_blank' style='color:#7ace4c;'><span class='fa fa-check'></span></a>";
	        obj.po_operations_urinalysis_file = isEmpty(obj.po_operations_urinalysis_file) ? "<a style='color:#df0000;'><span class='fa fa-times'></span></a>" : "<a href='" + CONFIG.BASE_URL + 'asset/projects/' + obj.po_operations_urinalysis_file + "' target='_blank' style='color:#7ace4c;'><span class='fa fa-check'></span></a>";
	        obj.po_operations_xray_file = isEmpty(obj.po_operations_xray_file) ? "<a style='color:#df0000;'><span class='fa fa-times'></span></a>" : "<a href='" + CONFIG.BASE_URL + 'asset/projects/' + obj.po_operations_xray_file + "' target='_blank' style='color:#7ace4c;'><span class='fa fa-check'></span></a>";
	        obj.po_operations_fecalysis_file = isEmpty(obj.po_operations_fecalysis_file) ? "<a style='color:#df0000;'><span class='fa fa-times'></span></a>" : "<a href='" + CONFIG.BASE_URL + 'asset/projects/' + obj.po_operations_fecalysis_file + "' target='_blank' style='color:#7ace4c;'><span class='fa fa-check'></span></a>";
	        obj.po_operations_ecg_file = isEmpty(obj.po_operations_ecg_file) ? "<a style='color:#df0000;'><span class='fa fa-times'></span></a>" : "<a href='" + CONFIG.BASE_URL + 'asset/projects/' + obj.po_operations_ecg_file + "' target='_blank' style='color:#7ace4c;'><span class='fa fa-check'></span></a>";
	      });

	  		$('#technician-lists').loadTemplate($('#technician-list-row-template'), list);
		}
		else{
			$('#technician-lists').html('<tr><td class="text-center" colspan="18">No records found.</td></tr>');
		}                            
	}

	function setPaginationClicks(){
		$('.pagination a[href]').on("click", function(e){
		  e.preventDefault();
		  get($(this).attr('data-ci-pagination-page'));
		});
	}
});