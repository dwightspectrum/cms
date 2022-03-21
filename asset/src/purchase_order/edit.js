  $(document).ready(function(){
    var CHILDREN = [];

    jQuery('.datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'yyyy-mm-dd'
    });

    $('.js-switch').each(function() {
        new Switchery($(this)[0], $(this).data());
    });

    radio1_checked();
    radio2_checked();

    $('#radio1').click(function() {
      radio1_checked();
    });

    $('#radio2').click(function() {
      radio2_checked();
    });

    function radio1_checked(){
      if($('#radio1').is(':checked')) { 
        $('#purchase_order_reminder_month').attr('disabled', true);
        $('#purchase_order_reminder_date').attr('disabled', false);
      }else{      
        $('#purchase_order_reminder_month').attr('disabled', false);
        $('#purchase_order_reminder_date').attr('disabled', true);
      }
    }

    function radio2_checked(){
      if($('#radio2').is(':checked')) { 
        $('#purchase_order_reminder_month').attr('disabled', false);
        $('#purchase_order_reminder_date').attr('disabled', true);
      }else{
        $('#purchase_order_reminder_month').attr('disabled', true);
        $('#purchase_order_reminder_date').attr('disabled', false);
      }
    }


    $('#edit_purchase_order_form').submit(function(e){
      e.preventDefault();

      set_loading_request();

      var current = $('purchase_order_manpower').val();
      var db = $('purchase_order_manpower_db').val();

      if(current != db){
        set_manpower_to_not_complete();
      }

      $.ajax({
        type: 'POST',
        url: CONFIG.BASE_URL + 'purchaseorder/update_purchase_order/' + CONFIG.purchase_order_id,
        dataType: 'json',
        data: {
          'purchase_order': $('#edit_purchase_order_form').serialize()
        },
        success: function(result){
          alertify.logPosition("bottom right");
          alertify.success("Successfully updated!");

          set_loading_exit();
        }
      });
    });
  });

  function set_manpower_to_not_complete(){
    $.ajax({
      type: 'POST',
      url: CONFIG.BASE_URL + 'purchaseorder/set_manpower_to_not_complete/' + CONFIG.purchase_order_id,
      dataType: 'json',
      success: function(result){
      }
    });
  }

  function set_loading_request(){
    Swal.fire({
      title: 'Please wait. Submitting request.',
      html: 'Sending emails to operations and accounting.',
      allowEscapeKey: false,
      allowOutsideClick: false,
      onBeforeOpen: () => {
          Swal.showLoading()
      },
    });
  }

  function set_loading_exit(){
    Swal.close();
    Swal.fire({
      type: 'success',
      title: 'Successfully submitted',
      showConfirmButton: false,
      timer: 1500
    }).then(e => {
        window.location.href = CONFIG.BASE_URL + 'purchaseorder/view'; 
    });
  }

  $('#external_client_name').on('keyup', function(){

    var search = $('#external_client_name').val();

    $.ajax({
      type: 'POST',
      url: CONFIG.BASE_URL + 'purchaseorder/get_external_clients/',
      dataType: 'json',
      data: {
        search : search
      },
      success: function(result){
        if(result){
          swal({   
            title: "Client " + search + " already exists.",   
            text: "Do you want to add the details in the fields below?",   
            type: "success",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes",   
            closeOnConfirm: true 
          }, function(inputValue){ 
              if (inputValue===false) {
                $('#external_client_id').val("");
                $('#external_client_name').val(""); 
                $('#external_client_address').val("");
                $('#external_client_site_address').val("");
                $('#external_client_contact_person').val("");
                $('#external_client_contact_number').val("");
                $('#external_client_email_address').val("");
                $('#external_client_tin_number').val("");
              } else {
                $('#external_client_id').val(result.external_client_id);
                $('#external_client_name').val(result.external_client_name);
                $('#external_client_address').val(result.external_client_address);
                $('#external_client_site_address').val(result.external_client_site_address);
                $('#external_client_contact_person').val(result.external_client_contact_person);
                $('#external_client_contact_number').val(result.external_client_contact_number);
                $('#external_client_email_address').val(result.external_client_email_address);
                $('#external_client_tin_number').val(result.external_client_tin_number);
              } 
          });      
        }
      }
    }); 
  });