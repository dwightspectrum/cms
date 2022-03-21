$(document).ready(function(){
  var CHILDREN = [];

  jQuery('.datepicker-autoclose').datepicker({
      autoclose: true,
      todayHighlight: true,
      format: 'yyyy-mm-dd'
  });

  $('.clockpicker').clockpicker({
      donetext: 'Done',
  }).find('input').change(function() {

  });

  $('.js-switch').each(function() {
      new Switchery($(this)[0], $(this).data());
  });

  $('#airline_ticket_flight_trip').on('change', function(){
    if($(this).val() == 1){
      $('.return-div').show();
    }
    else{
      $('.return-div').hide();
    }
  });

  $('#ticket_form').submit(function(e){
    e.preventDefault();

    if($('#airline_ticket_flight_trip').val() == 1){
      if($('#airline_ticket_return_date').val().trim() == '' || $('#airline_ticket_return_time').val().trim() == ''){
        alertify.logPosition("bottom right");
        alertify.error("Please complete the form.");
        return;
      }
    }else{
      $('#airline_ticket_return_date').val('');
      $('#airline_ticket_return_time').val('');
    }

    $.ajax({
      type: 'POST',
      url: CONFIG.BASE_URL + 'tickettracker/add_ticket_details',
      dataType: 'json',
      data: {
        'ticket': $('#ticket_form').serialize()
      },
      success: function(result){
        alertify.logPosition("bottom right");
        alertify.success("Successfully added!");

        setTimeout(function () { 
          window.location.href = CONFIG.BASE_URL + 'tickettracker/view'; 
        }, 600);

      }
    });
  });

});