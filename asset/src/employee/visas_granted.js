$(document).ready(function(){
  /*var VISA = [];*/

  jQuery('.datepicker-autoclose').datepicker({
      autoclose: true,
      todayHighlight: true,
      format: 'yyyy-mm-dd'
  });

  $('#search').on('keyup', function(){
    get();
  });

  get();

  function get(page = 1){
      var search = $('#search').val();

      $.ajax({
          type: 'POST',
          url: CONFIG.BASE_URL + 'employee/get_visas_granted/' + CONFIG.employee_id,
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
          obj.employee_visa_issue_date = obj.employee_visa_issue_date;
          obj.employee_visa_expiry_date = obj.employee_visa_expiry_date;
          obj.employee_visa_country = obj.employee_visa_country;
          obj.employee_visa_file = obj.employee_visa_file;
        });

        $('#visa_table').loadTemplate($('#visa-data-template'), list);
    }
    else{
      $('#visa_table').html('<tr><td class="text-center" colspan="5">No records found.</td></tr>');
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
              title: "Remove Visa?",   
              text: "Are you sure you want to delete this visa, " + parent.attr("data-ref") + "?",   
              type: "warning",   
              showCancelButton: true,   
              confirmButtonColor: "#DD6B55",   
              confirmButtonText: "Yes",   
              closeOnConfirm: true 
          }, function(){   
              $.ajax({
                type: 'POST',
                url: CONFIG.BASE_URL + 'employee/delete_visa/' + parent.attr("id"),
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

  $('#visa_form').submit(function(e){
    e.preventDefault();
    
    var data = new FormData(this);
    data.append('employee_visa_file', $('#employee_visa_file')[0].files[0]);

    $.ajax({
      type: 'POST',
      url: CONFIG.BASE_URL + 'employee/add_visa/' + CONFIG.employee_id,
      dataType: 'json',
      enctype: 'multipart/form-data',
      processData: false,
      contentType: false,
      cache: false,
      data: data,
      success: function(result){
        alertify.logPosition("bottom right");
        alertify.success("Successfully submitted!");

        get();
      }
    });
  });

});