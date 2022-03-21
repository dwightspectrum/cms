$(document).ready(function(){
	jQuery('.datepicker-autoclose').datepicker({
		autoclose: true,
		todayHighlight: true,
		format: 'yyyy-mm-dd'
	});

	$('#add_pull_out_details_form').submit(function(e){
	    e.preventDefault();
	    
	    var data = new FormData(this);

	    var td = $('#po_trucking_details').val();
	    var ld = $('#po_trucking_loading_date').val();
	    var sd = $('#po_trucking_shipping_date').val();
	    var ad = $('#po_trucking_arrival_date').val();
	    var q = $('#po_trucking_quotation').val();
	    var s = $('#po_trucking_shipper').val();
	    var c = $('#po_trucking_consignee').val();
	    var b = $('#po_trucking_broker').val();
	    var bc = $('#po_trucking_broker_contact').val();

	    if(td != "" && ld != "" && sd != "" && ad != "" && q != "" && s != "" && c != "" && b != "" && bc != ""){
	    	set_trucking_to_complete();
	    }else{
	    	set_trucking_to_not_complete();
	    }

	    $.ajax({
	      type: 'POST',
	      url: CONFIG.BASE_URL + 'purchaseorder/add_pull_out_details_data/' + CONFIG.purchase_order_id,
	      dataType: 'json',
	      enctype: 'multipart/form-data',
	      processData: false,
	      contentType: false,
	      cache: false,
	      data: data,
	      success: function(result){
	        alertify.logPosition("bottom right");
	        alertify.success("Pull out details are successfully added!");

	        setTimeout(function () { 
	          window.location.href = CONFIG.BASE_URL + 'purchaseorder/'; 
	        }, 1000);

	      }
		});
	});

	function set_trucking_to_not_complete(){
		$.ajax({
            type: 'POST',
            url: CONFIG.BASE_URL + 'purchaseorder/set_trucking_to_not_complete/' + CONFIG.purchase_order_id,
            dataType: 'json',
            success: function(result){
            	setTimeout(function () { 
		          window.location.href = CONFIG.BASE_URL + 'purchaseorder/add_pull_out_details/' + CONFIG.purchase_order_id; 
		        }, 1000);
            }
        });
	}

	function set_trucking_to_complete(){
		$.ajax({
            type: 'POST',
            url: CONFIG.BASE_URL + 'purchaseorder/set_trucking_to_complete/' + CONFIG.purchase_order_id,
            dataType: 'json',
            success: function(result){
            	setTimeout(function () { 
		          window.location.href = CONFIG.BASE_URL + 'purchaseorder/add_pull_out_details/' + CONFIG.purchase_order_id; 
		        }, 1000);
            }
        });
	}
});