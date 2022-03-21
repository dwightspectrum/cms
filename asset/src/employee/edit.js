$(document).ready(function(){
  var CHILDREN = [];
  format_children();
  display_children();

  jQuery('.datepicker-autoclose').datepicker({
      autoclose: true,
      todayHighlight: true,
      format: 'yyyy-mm-dd'
  });

  // (".datepicker").datepicker({autoclose:!0,todayHighlight:!0,format:"yyyy-mm-dd"})

  $('#add-child').click(function(e){
    e.preventDefault();

        var child_name = $('#child_name').val();
        var child_birthdate = $('#child_birthdate').val();

        if((child_name == null || child_name == '') || 
          (child_birthdate == null || child_birthdate == '')){
          alertify.logPosition("bottom right");
          alertify.error("Please fill in the necessary fields!");
        }
        else{
          var child_data = {
            'child_name' : child_name,
            'child_birthdate' : child_birthdate,
          }; 

          CHILDREN.push(child_data);

          $('#child_name').val('');
          $('#child_birthdate').val('');
        }

        display_children();
  });

  function format_children(){
    var children_list = CONFIG.children;

    children_list.forEach(function(obj){
      var child = {
        'child_name' : obj.employee_child_name,
        'child_birthdate' : obj.employee_child_birthdate
      };

      CHILDREN.push(child);
    });
  }

  function display_children(){
    if(CHILDREN.length > 0){
      var data = [];

      for(var i = 0; i < CHILDREN.length; i++){
        var obj = CHILDREN[i];
        obj.index = i;
        obj.action = '<a class="btn btn-danger btn-sm delete-child" id="' + i + '"><i class="fa fa-trash"></i></a>';
        data.push(obj);
      }

      $('#child_table').loadTemplate($('#child-data-template'), data);

      $('.delete-child').on('click', function(e){
        e.preventDefault();

        var index = $(this).attr('id');
        remove_child(index);
      });
    }
    else{
      $('#child_table').html('<tr><td align="center" colspan="3">No records found.</td></tr>');
    }
  }

  function remove_child(index){
    CHILDREN.splice(index, 1);
    display_children();
  }

  $('#employee_form').submit(function(e){

    e.preventDefault();
    
    var data = new FormData(this);
    data.append('children', JSON.stringify(CHILDREN));

    if($('#passport_copy')[0]){
      data.append('passport_copy', $('#passport_copy')[0].files[0]);
    }

    if($('#employee_certificate')[0]){
      data.append('employee_certificate', $('#employee_certificate')[0].files[0]);
    }

    $.ajax({
      type: 'POST',
      url: CONFIG.BASE_URL + 'employee/edit_employee_details/' + CONFIG.employee_id,
      dataType: 'json',
      enctype: 'multipart/form-data',
      processData: false,
      contentType: false,
      cache: false,
      data: data,
      success: function(result){
        console.log(data);
        alertify.logPosition("bottom right");
        alertify.success("Successfully updated!");

        setTimeout(function () { 
          window.location.href = CONFIG.BASE_URL + 'employee/profile/' + CONFIG.employee_id; 
        }, 1000);
      }
    });
  });
});

