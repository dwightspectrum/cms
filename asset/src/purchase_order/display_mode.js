$(document).ready(function(){
  var months = [{"name": "january", "value": 1}, 
                {"name": "february", "value": 2},
                {"name": "march", "value": 3},
                {"name": "april", "value": 4},
                {"name": "may", "value": 5},
                {"name": "june", "value": 6},
                {"name": "july", "value": 7},
                {"name": "august", "value": 8},
                {"name": "september", "value": 9},
                {"name": "october", "value": 10},
                {"name": "november", "value": 11},
                {"name": "december", "value": 12},
               ];

  mervin_gwapo();

  function alignModal(){
    var modalDialog = $(this).find(".modal-dialog");
    
    // Applying the top margin on modal dialog to align it vertically center
    modalDialog.css("margin-top", Math.max(0, ($(window).height() - modalDialog.height()) / 2));
  }

  // Align modal when it is displayed
  $(".modal").on("shown.bs.modal", alignModal);
  
  // Align modal when user resize the window
  $(window).on("resize", function(){
      $(".modal:visible").each(alignModal);
  });   

  $('#year_view_filter').on('change', function(){
    $('#year_display').text($('#year_view_filter').val());

    mervin_gwapo();
  });

  function mervin_gwapo(){
    months.forEach(function(obj){
      get_monthly_data(obj.name, obj.value);
    });
  }

  function get_monthly_data(name, value){
    var year = $('#year_view_filter').val();
    var url = CONFIG.BASE_URL + 'purchaseorder/get_monthly_projects/' + year + "/" + value;
    var table_name = '#' + name + '-table';
    var pagination = "#" + name + "-pagination"; 

    get_monthly_projects(1, url, table_name, pagination);
  }

  function get_monthly_projects(page = 1, url, table_name, pagination_name){
      $.ajax({
          type: 'POST',
          url: url,
          dataType: 'json',
          data: {
            page : page
          }, 
          success: function(result){
            if(result.list.length){
              result.list.forEach(function(obj){
                var add = "";
                var client_add = "";

                if(obj.purchase_order_name.length < 20){
                  add = "";
                }else{
                  add = "..";
                }

                if(obj.external_client_name.length < 20){
                  client_add = "";
                }else{
                  client_add = "..";
                }

                obj.purchase_order_name = '<a class="project-tooltip" title="' + nl2br(obj.purchase_order_name) + '" data-html="true"> ' + obj.purchase_order_name.substr(0, 20) + add + '</a>';
                obj.external_client_name = '<a class="project-tooltip" title="' + nl2br(obj.external_client_name) + '" data-html="true"> ' + obj.external_client_name.substr(0, 20) + add + '</a>';
                obj.actions = '<div class="col-md-2 text-right">' + 
                                '<button class="btn-options btn btn-info btn-outline btn-circle btn-lg m-r-5" id="' + obj.purchase_order_id + '"> <i class="ti-list" style="margin-top:15px;"></i> </button>'  +
                              '</div>'; 
              });

              $(table_name).loadTemplate($('#projects-row-template'), result.list);

              $(pagination_name).html(result.pagination);

              $(pagination_name + ' .pagination a[href]').on("click", function(e){
                e.preventDefault();
                get_monthly_projects($(this).attr('data-ci-pagination-page'), url, table_name, pagination_name);
              });

              set_options_menu();
              set_name_on_hover(); 
            }else{
              $(table_name).html('<tr><td align="center" colspan="2">No records found.</td></tr>');
            }
          }
      });
  }

  function set_options_menu(){
    $('.btn-options').on('click', function(){
      var id = $(this).attr('id');

      window.location.href = CONFIG.BASE_URL + 'purchaseorder/display_details/' + id;
    });
  }

  $('.project_details_btn').on('click', function(){
    var purchase_order_id = $(this).attr('data-val');
    
    window.location.href = CONFIG.BASE_URL + 'purchaseorder/display_details/' + purchase_order_id; 
  });

  var id = $(this).attr('id');

  function set_name_on_hover(){
    $('.project-tooltip')
      .tooltipster({
        debug: false, 
        contentAsHTML: true, 
        delay: 0,
        theme: 'tooltipster-punk',
        functionInit: function(instance, helper){
         
      }
    });
  }

  function nl2br (str, is_xhtml) {
      if (typeof str === 'undefined' || str === null) {
          return '';
      }
      var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
      return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
    }
});