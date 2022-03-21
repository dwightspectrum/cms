$(document).ready(function(){
	jQuery('.datepicker-autoclose').datepicker({
		autoclose: true,
		todayHighlight: true,
		format: 'yyyy-mm-dd'
	});

	$('.js-switch').each(function() {
	  new Switchery($(this)[0], $(this).data());
	});

	get();

	$('#search').on('keyup', function(){
		get();
	});

	get_employees();

	$('.others_checkbox').each(function(index, element){
		var id = $(element).attr('id');

		if($(this).prop("checked") == true){
			$('.'+id).show();
		}
		else{
			$('.'+id).hide();
		}
	})

	$('.others_checkbox').on('click', function(){
		var id = $(this).attr('id');
		
		if($(this).prop("checked") == true){
			$('.'+id).show();
		}
		else{
			$('.'+id).hide();
		}
	});

	var clickButton = document.querySelector('.js-switch');

	clickButton.addEventListener('click', function() {
	  alert();
	});

	$('#purchase_order_manpower_completion').on('click', function(){
		alert();
		if($('#purchase_order_manpower_completion').prop("checked") == true){
			set_manpower_to_complete();
		}else{
			set_manpower_to_not_complete();
		}
	});

	function get_employees(){
	    $.ajax({
	      type: 'POST',
	      url: CONFIG.BASE_URL + 'employee/get_employee_by_project/' + CONFIG.purchase_order_id,
	      dataType: 'json',
	      success: function(result){
	        result.forEach(function(obj){
            	obj.employee_details = (obj.employee_last_name + ", " + obj.employee_first_name + " " + obj.employee_middle_name).toUpperCase();
            });

	        $('#employee_id').loadTemplate($('#employee-row-template'), result);

	      }
	    }); 	  
	}

	$('#add_po_operation_details_form').submit(function(e){
	    e.preventDefault();

	    var data = new FormData(this);
	    var manpower = $("#purchase_order_manpower").val();

	    if(manpower == 0){
	    	alertify.logPosition("bottom right");
			alertify.error("No need to add a technician!");
	    }else{
	    	check_technician_list(function(){
			    $('input[type="file"]').each(function(index, element){
			    	var id = $(element).attr('id');

					data.append(id, $(element)[0].files[0]);	
				});

			    $.ajax({
			      type: 'POST',
			      url: CONFIG.BASE_URL + 'purchaseorder/add_po_operation_details/' + CONFIG.purchase_order_id,
			      dataType: 'json',
			      enctype: 'multipart/form-data',
			      processData: false,
			      contentType: false,
			      cache: false,
			      data: data,
			      success: function(result){
			        alertify.logPosition("bottom right");
			        alertify.success("You have successfully added a technician!");

			        get_employees();

			        setTimeout(function () { 
			          window.location.href = CONFIG.BASE_URL + 'purchaseorder/add_manpower/' + CONFIG.purchase_order_id; 
			        }, 1000);

			      }
				});
			});
	    }
	});

	function check_technician_list(callback){
		var purchase_order_manpower = $('#purchase_order_manpower').val();
		var employee_id = $('#employee_id').val();

		$.ajax({
	      type: 'POST',
	      url: CONFIG.BASE_URL + 'purchaseorder/get_manpower_list/' + CONFIG.purchase_order_id + "/" + employee_id,
	      dataType: 'json',
	      success: function(result){
	      	if(result.exist == false && result.manpower_count > 0){
	      		if(parseFloat(result.manpower_count) >= parseFloat(purchase_order_manpower)){
	      			alertify.logPosition("bottom right");
					alertify.error("You have already added " + result.manpower_count + " out of " + purchase_order_manpower + " technicians!");
	      		}else{
	      			if((parseFloat(result.manpower_count)+1) == parseFloat(purchase_order_manpower)){
			      		set_manpower_to_complete();
			      	}

	      			if(callback != null){
		        		callback();
		        	}
	      		}
	      	}else{
	      		if(callback != null){
	        		callback();
	        	}
	      	}
	      }
	    }); 
	}

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
	      		addEventListeners();
	      	}
	  	});
	}

	function loadData(list){
		if(list.length > 0){
	      list.forEach(function(obj){
	        obj.technician_name = obj.employee_last_name.toUpperCase() + ", " + obj.employee_first_name.toUpperCase() + " " + obj.employee_middle_name.toUpperCase();
	        obj.po_operations_set_as_pm = (obj.po_operations_set_as_pm == 0) ? "<a style='color:#df0000;'><span class='fa fa-times'></span></a>" : "<a style='color:#7ace4c;'><span class='fa fa-check'></span></a>";
	        obj.po_operations_accomodation_file = isEmpty(obj.po_operations_accomodation_file) ? "<a style='color:#df0000;'><span class='fa fa-times'></span></a>" : "<a href='" + CONFIG.BASE_URL + 'asset/projects/' + obj.po_operations_accomodation_file + "' target='_blank' style='color:#7ace4c;'><span class='fa fa-check'></span></a>";
	        obj.po_operations_transporation_file = isEmpty(obj.po_operations_transporation_file) ? "<a style='color:#df0000;'><span class='fa fa-times'></span></a>" : "<a href='" + CONFIG.BASE_URL + 'asset/projects/' + obj.po_operations_transporation_file + "' target='_blank' style='color:#7ace4c;'><span class='fa fa-check'></span></a>";
	        obj.po_operations_airfares_file = isEmpty(obj.po_operations_airfares_file) ? "<a style='color:#df0000;'><span class='fa fa-times'></span></a>" : "<a href='" + CONFIG.BASE_URL + 'asset/projects/' + obj.po_operations_airfares_file + "' target='_blank' style='color:#7ace4c;'><span class='fa fa-check'></span></a>";
	        obj.po_operations_wifi_file = isEmpty(obj.po_operations_wifi_file) ? "<a style='color:#df0000;'><span class='fa fa-times'></span></a>" : "<a href='" + CONFIG.BASE_URL + 'asset/projects/' + obj.po_operations_wifi_file + "' target='_blank' style='color:#7ace4c;'><span class='fa fa-check'></span></a>";
	        obj.po_operations_visa_file = isEmpty(obj.po_operations_visa_file) ? "<a style='color:#df0000;'><span class='fa fa-times'></span></a>" : "<a href='" + CONFIG.BASE_URL + 'asset/projects/' + obj.po_operations_visa_file + "' target='_blank' style='color:#7ace4c;'><span class='fa fa-check'></span></a>";
	        obj.po_operations_bosh_file = isEmpty(obj.po_operations_bosh_file) ? "<a style='color:#df0000;'><span class='fa fa-times'></span></a>" : "<a href='" + CONFIG.BASE_URL + 'asset/projects/' + obj.po_operations_bosh_file + "' target='_blank' style='color:#7ace4c;'><span class='fa fa-check'></span></a>";
	        obj.po_operations_confined_spaces_file = isEmpty(obj.po_operations_confined_spaces_file) ? "<a style='color:#df0000;'><span class='fa fa-times'></span></a>" : "<a href='" + CONFIG.BASE_URL + 'asset/projects/' + obj.po_operations_confined_spaces_file + "' target='_blank' style='color:#7ace4c;'><span class='fa fa-check'></span></a>";
	        obj.po_operations_work_at_heights_file = isEmpty(obj.po_operations_work_at_heights_file) ? "<a style='color:#df0000;'><span class='fa fa-times'></span></a>" : "<a href='" + CONFIG.BASE_URL + 'asset/projects/' + obj.po_operations_work_at_heights_file + "' target='_blank' style='color:#7ace4c;'><span class='fa fa-check'></span></a>";
	        obj.po_operations_work_permit_file = isEmpty(obj.po_operations_work_permit_file) ? "<a style='color:#df0000;'><span class='fa fa-times'></span></a>" : "<a href='" + CONFIG.BASE_URL + 'asset/projects/' + obj.po_operations_work_permit_file + "' target='_blank' style='color:#7ace4c;'><span class='fa fa-check'></span></a>";
	        obj.po_operations_insurance_coverage_file = isEmpty(obj.po_operations_insurance_coverage_file) ? "<a style='color:#df0000;'><span class='fa fa-times'></span></a>" : "<a href='" + CONFIG.BASE_URL + 'asset/projects/' + obj.po_operations_insurance_coverage_file + "' target='_blank' style='color:#7ace4c;'><span class='fa fa-check'></span></a>";
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
			$('#technician-lists').html('<tr><td class="text-center" colspan="21">No records found.</td></tr>');
		}                            
	}

	function setPaginationClicks(){
		$('.pagination a[href]').on("click", function(e){
		  e.preventDefault();
		  get($(this).attr('data-ci-pagination-page'));
		});
	}

	function addEventListeners(){
	  	$(".btn-delete").on("click", function(e){
	          e.preventDefault();
	          var parent = $(this);

	          swal({   
	              title: "Remove Technician?",   
	              text: "Are you sure you want to delete purchase order number " + parent.attr("data-ref") + "?",   
	              type: "warning",   
	              showCancelButton: true,   
	              confirmButtonColor: "#DD6B55",   
	              confirmButtonText: "Yes",   
	              closeOnConfirm: true 
	          }, function(){   
	              $.ajax({
	                type: 'POST',
	                url: CONFIG.BASE_URL + 'purchaseorder/delete_technician/' + parent.attr("id"),
	                dataType: 'json',
	                success: function(result){
	                   alertify.logPosition("bottom right");
	                   if(result.success){
	                      alertify.success("Successfully deleted!");
	                      set_manpower_to_not_complete();
	                      get();  
	                   }
	                }
	             });
	          });
	    });
	}

	function set_manpower_to_not_complete(){
		$.ajax({
            type: 'POST',
            url: CONFIG.BASE_URL + 'purchaseorder/set_manpower_to_not_complete/' + CONFIG.purchase_order_id,
            dataType: 'json',
            success: function(result){
            	setTimeout(function () { 
		          window.location.href = CONFIG.BASE_URL + 'purchaseorder/add_manpower/' + CONFIG.purchase_order_id; 
		        }, 1000);
            }
        });
	}

	function set_manpower_to_complete(){
		$.ajax({
            type: 'POST',
            url: CONFIG.BASE_URL + 'purchaseorder/set_manpower_to_complete/' + CONFIG.purchase_order_id,
            dataType: 'json',
            success: function(result){
            	setTimeout(function () { 
		          window.location.href = CONFIG.BASE_URL + 'purchaseorder/add_manpower/' + CONFIG.purchase_order_id; 
		        }, 1000);
            }
        });
	}
});