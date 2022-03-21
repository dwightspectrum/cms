$(document).ready(function(){
	$('.js-switch').each(function() {
	  new Switchery($(this)[0], $(this).data());
	});
	
	$('#edit_shipping_documents_form').submit(function(e){
	    e.preventDefault();

	    var data = new FormData(this);

	    var pl = $('#purchase_order_packing_list').val();
	    var ci = $('#purchase_order_commercial_invoice').val();
	    var pld = $('#purchase_order_packing_list_data').val();
	    var cid = $('#purchase_order_commercial_invoice_data').val();

	    if((pl != "" || pld != "") && (ci != "" || cid != "")){
	    	set_shipping_to_complete();
	    }else{
	    	set_shipping_to_not_complete();
	    }

	    $.ajax({
	      type: 'POST',
	      url: CONFIG.BASE_URL + 'purchaseorder/edit_shipping_documents_data/' + CONFIG.purchase_order_id,
	      dataType: 'json',
	      enctype: 'multipart/form-data',
	      processData: false,
	      contentType: false,
	      cache: false,
	      data: data,
	      success: function(result){
	        alertify.logPosition("bottom right");
	        alertify.success("You have successfully uploaded a shipping documents!");

	        setTimeout(function () { 
	          window.location.href = CONFIG.BASE_URL + 'purchaseorder/view'; 
	        }, 1000);

	      }
		});
	});

	function set_shipping_to_not_complete(){
		$.ajax({
            type: 'POST',
            url: CONFIG.BASE_URL + 'purchaseorder/set_shipping_to_not_complete/' + CONFIG.purchase_order_id,
            dataType: 'json',
            success: function(result){
            	setTimeout(function () { 
		          window.location.href = CONFIG.BASE_URL + 'purchaseorder/update_shipping_list/' + CONFIG.purchase_order_id; 
		        }, 1000);
            }
        });
	}

	function set_shipping_to_complete(){
		$.ajax({
            type: 'POST',
            url: CONFIG.BASE_URL + 'purchaseorder/set_shipping_to_complete/' + CONFIG.purchase_order_id,
            dataType: 'json',
            success: function(result){
            	setTimeout(function () { 
		          window.location.href = CONFIG.BASE_URL + 'purchaseorder/update_shipping_list/' + CONFIG.purchase_order_id; 
		        }, 1000);
            }
        });
	}
});