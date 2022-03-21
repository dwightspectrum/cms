$(document).ready(function(){
	get();

	$('#search').on('keyup', function(){
		get();
	});

	function get(page = 1){
  	var search = $('#search').val();

  	$.ajax({
      	type: 'POST',
      	url: CONFIG.BASE_URL + 'purchaseorder/get',
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
    var actions = "";
    var currency = "";

		if(list.length > 0){
      list.forEach(function(obj){

        if(obj.purchase_order_currency == "USD"){
          currency = "$";
        }else if(obj.purchase_order_currency == "EURO"){
          currency = "€";
        }else{
          currency = "₱";
        }

        obj.purchase_order_deployment_schedule = moment(obj.purchase_order_deployment_schedule).format("MMM DD, YYYY");
        obj.purchase_order_start_date = moment(obj.purchase_order_start_date).format("MMM DD, YYYY");
        obj.purchase_order_end_date = moment(obj.purchase_order_end_date).format("MMM DD, YYYY"); 
        obj.purchase_order_amount = currency + ReplaceNumberWithCommas(parseFloat(obj.purchase_order_amount).toFixed(2));

        if(obj.purchase_order_status == "closed"){
          if(obj.purchase_order_arrival_date){
            obj.actions = '<a title="Edit Post Project Details" class="btn btn-warning btn-outline btn-circle btn-lg m-r-5 btn-edit-post-project-details" data-id="purchase_order_id"><i class="mdi mdi-pencil" style="font-size: 20px;"></i></a>';
          }else{
            obj.actions = '<a title="Add Post Project Details" class="btn btn-info btn-outline btn-circle btn-lg m-r-5 btn-add-post-project-details" data-id="purchase_order_id"><i class="mdi mdi-plus" style="font-size: 20px;"></i></a>';
          }
        }else{
           actions = '<a title="Update Project" class="btn btn-warning btn-outline btn-circle btn-lg m-r-5 btn-update" data-id="purchase_order_id"><i class="mdi mdi-lead-pencil" style="font-size: 20px;"></i></a>' + ' <a title="Delete Project" class="btn btn-danger btn-outline btn-circle btn-lg m-r-5 btn-delete" data-id="purchase_order_id" data-ref="' + obj.purchase_order_number + '"><i class="mdi mdi-delete" style="font-size: 20px;"></i></a>';

          if (obj.po_operations_checker < 1) {
            actions += '<a title="Add Manpower" class="btn btn-info btn-outline btn-circle btn-lg m-r-5 btn-add-manpower" data-id="purchase_order_id"><i class="mdi mdi-account-plus" style="font-size: 20px;"></i></a>';
          }else{
            let animate = (obj.purchase_order_manpower_completion == 0)? 'btn_animate' : '';

            actions += '<a title="Update Manpower" class="btn btn-warning btn-outline btn-circle btn-lg m-r-5 btn-update-manpower ' +animate + '" data-id="purchase_order_id"><i class="mdi mdi-account-edit" style="font-size: 20px;"></i></a>';
          }

          if (obj.po_trucking_checker < 1) {
            actions += '<a title="Add Pull Out Details" class="btn btn-info btn-outline btn-circle btn-lg m-r-5 btn-add-pull-out" data-id="purchase_order_id"><i class="mdi mdi-truck" style="font-size: 20px;"></i></a>';
          }else{
            let animate = (obj.purchase_order_trucking_completion == 0)? 'btn_animate' : '';

            actions += '<a title="Update Pull Out Details" class="btn btn-warning btn-outline btn-circle btn-lg m-r-5 btn-update-pull-out ' + animate + '" data-id="purchase_order_id"><i class="mdi mdi-truck-delivery" style="font-size: 20px;"></i></a>';
          }

          if (obj.purchase_order_packing_list || obj.purchase_order_commercial_invoice) {
            let animate = (obj.purchase_order_shipping_completion == 0)? 'btn_animate' : '';

            actions += '<a title="Update Packing List / Proforma Invoice" class="btn btn-warning btn-outline btn-circle btn-lg m-r-5 btn-update-shipping-list ' + animate + '" data-id="purchase_order_id"><i class="mdi mdi-clippy" style="font-size: 20px;"></i></a>';
          }else{
            actions += '<a title="Add Packing List / Proforma Invoice" class="btn btn-info btn-outline btn-circle btn-lg m-r-5 btn-add-shipping-list" data-id="purchase_order_id"><i class="mdi mdi-paperclip" style="font-size: 20px;"></i></a>';
          }

          actions += '<a title="Close Project" class="btn btn-danger btn-outline btn-circle btn-lg btn-close-project" data-id="purchase_order_id"><i class="fa fa-close" style="font-size: 20px; margin-top: 3px;"></i></a>';

          obj.actions = actions;

          obj.purchase_order_status = '<a class="status-tooltip" title="' + nl2br(obj.purchase_order_remarks) + '" data-html="true"> ' + obj.purchase_order_status + '</a>';
        }
      });

  		$('#purchase-order-table').loadTemplate($('#purchase-order-row-template'), list);

      $('.btn-close-project').on('click', function(e){
        e.preventDefault();

        var id = $(this).attr('id');
        console.log(id);
        
        swal({   
            title: "Are you sure?",   
            text: "Are you sure you want to close this project?",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes",   
            closeOnConfirm: true 
        },function(){   
          $.ajax({
              type: 'POST',
              url: CONFIG.BASE_URL + 'purchaseorder/close_project/' + id,
              dataType: 'json',
              success: function(result){
                 alertify.logPosition("bottom right");
                 if(result.success){
                    alertify.success("Successfully closed!");
                    //get();  

                    send_mail_project_closed(id);
                 }
              }
           });
        });
      });

      set_status_on_hover();
		}
		else{
			$('#purchase-order-table').html('<tr><td class="text-center" colspan="9">No records found.</td></tr>');
		}                            
	}

	function setPaginationClicks(){
		$('.pagination a[href]').on("click", function(e){
		  e.preventDefault();
		  get($(this).attr('data-ci-pagination-page'));
		});
	}

	function addEventListeners(){
    $('.btn-add-post-project-details').on('click', function(e){
      e.preventDefault();
      redirect(this, 'purchaseorder/add_post_project_details/');
    });

    $('.btn-edit-post-project-details').on('click', function(e){
      e.preventDefault();
      redirect(this, 'purchaseorder/edit_post_project_details/');
    });

    $('.btn-update-shipping-list').on('click', function(e){
      e.preventDefault();
      redirect(this, 'purchaseorder/update_shipping_list/');
    });

    $('.btn-add-shipping-list').on('click', function(e){
      e.preventDefault();
      redirect(this, 'purchaseorder/add_shipping_list/');
    });

    $('.btn-update-pull-out').on('click', function(e){
      e.preventDefault();
      redirect(this, 'purchaseorder/edit_pull_out_details/');
    });

    $('.btn-add-pull-out').on('click', function(e){
      e.preventDefault();
      redirect(this, 'purchaseorder/add_pull_out_details/');
    });

    $('.btn-add-manpower').on('click', function(e){
      e.preventDefault();
      redirect(this, 'purchaseorder/add_manpower/');
    });

    $('.btn-update-manpower').on('click', function(e){
      e.preventDefault();
      redirect(this, 'purchaseorder/add_manpower/');
    });

  	$('.btn-update').on('click', function(e){
  		e.preventDefault();
  		redirect(this, 'purchaseorder/edit/');
  	});

  	$(".btn-delete").on("click", function(e){
      e.preventDefault();
      var parent = $(this);

      swal({   
          title: "Are you sure?",   
          text: "Are you sure you want to delete purchase order number " + parent.attr("data-ref") + "?",   
          type: "warning",   
          showCancelButton: true,   
          confirmButtonColor: "#DD6B55",   
          confirmButtonText: "Yes",   
          closeOnConfirm: true 
      }, function(){   
          $.ajax({
            type: 'POST',
            url: CONFIG.BASE_URL + 'purchaseorder/delete/' + parent.attr("id"),
            dataType: 'json',
            success: function(result){
               alertify.logPosition("bottom right");
               if(result.success){
                  alertify.success("Successfully deleted!");
                  get();  
               }
            }
         });
      });
    });
	}

  function send_mail_project_closed(purchase_order_id){
    $.ajax({
        type: 'POST',
        url: CONFIG.BASE_URL + 'purchaseorder/send_mail_project_closed/' + purchase_order_id,
        dataType: 'json',
        success: function(result){
        }
    });
  }

	function redirect(parent, url){
		var id = $(parent).attr('id');
		window.location = CONFIG.BASE_URL + url + id;
	}

  function ReplaceNumberWithCommas(yourNumber) {
    var components = yourNumber.toString().split(".");
    components [0] = components [0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return components.join(".");
  }

  function set_status_on_hover() {
    $('.status-tooltip')
      .tooltipster({
        debug: false,
        contentAsHTML: true,
        delay: 0,
        theme: 'tooltipster-punk',
        functionInit: function(instance, helper) {

        }
    });
  }

  function nl2br(str, is_xhtml) {
    if (typeof str === 'undefined' || str === null) {
        return '';
    }
    var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
    return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
  }
});