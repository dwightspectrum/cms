$(document).ready(function(){

	jQuery('.datepicker-autoclose').datepicker({
      autoclose: true,
      todayHighlight: true,
      format: 'yyyy-mm-dd'
  	});

	$('#edit_post_project_details_form').submit(function(e){
	    e.preventDefault();

	    var data = new FormData(this);

	    $.ajax({
	      type: 'POST',
	      url: CONFIG.BASE_URL + 'purchaseorder/update_post_project_data/' + CONFIG.purchase_order_id,
	      dataType: 'json',
	      enctype: 'multipart/form-data',
	      processData: false,
	      contentType: false,
	      cache: false,
	      data: data,
	      success: function(result){
	        alertify.logPosition("bottom right");
	        alertify.success("You have successfully updated a post project details!");

	        setTimeout(function () { 
	          window.location.href = CONFIG.BASE_URL + 'purchaseorder/view'; 
	        }, 1000);

	      }
		});
	});
});