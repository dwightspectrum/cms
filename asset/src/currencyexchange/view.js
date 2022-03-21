$(document).ready(function(){
  $(window).on('load', function() {
    get();
    get_unrecorded_date();
  });

  let UNRECORDED_DATES = [];

  jQuery('.datepicker-autoclose').datepicker({
      autoclose: true,
      todayHighlight: true,
      format: 'yyyy-mm-dd'
  });

  function setPaginationClicks(){
    $('.pagination a[href]').on("click", function(e){
      e.preventDefault();
      get($(this).attr('data-ci-pagination-page'));
    });
  }

  $('#add-currency-btn').click(function(e){
    e.preventDefault();

    if(UNRECORDED_DATES.length > 0){
      $('#add_currency_modal #exchange_date').datepicker('setDate', UNRECORDED_DATES[0].datepicker);
    }

    $('#add_currency_modal').modal('show');
  });

  $('#add-currency-exchange-form').submit(function(e){
    e.preventDefault();

    $.ajax({
      type: 'POST',
      async: false,
      url: CONFIG.BASE_URL + 'currencyexchange/addExchange',
      dataType: 'json',
      data: $('#add-currency-exchange-form').serialize(),
      success: function(result){
        alertify.logPosition("bottom right");

        if(result.success){
          alertify.success(result.message);
          $('#euro_exchange_value').val('');
          $('#usd_exchange_value').val('');
          get();
          removeUnrecordedDate($('#exchange_date').val());
          set_date();
          get_unrecorded_date();

          if(UNRECORDED_DATES.length <= 0){
            $('#add_currency_modal').modal('hide');
          }
        }
        else{
          alertify.error(result.message);
        }
      }
    });
  });

  function set_date(){
    $('#add_currency_modal #exchange_date').datepicker('setDate', UNRECORDED_DATES[0].datepicker);
  }

  function removeUnrecordedDate(selected_date){
    for (var i =0; i < UNRECORDED_DATES.length; i++){
      if (UNRECORDED_DATES[i].datepicker === selected_date) {
        UNRECORDED_DATES.splice(i,1);
        break;
      }
    }
  }

  $('#edit-currency-exchange-form').submit(function(e){
    e.preventDefault();
    const exchange_date = $('#edit_currency_modal #exchange_date').val();
    const currency = $('#edit_currency_modal #currency').val();

    $.ajax({
      type: 'POST',
      async: false,
      url: CONFIG.BASE_URL + 'currencyexchange/editExchange/'+ exchange_date + '/' + currency,
      dataType: 'json',
      data: {
        exchange_date : $('#edit_currency_modal #exchange_date').val(),
        euro_exchange_value : $('#edit_currency_modal #euro_exchange_value').val(),
        usd_exchange_value : $('#edit_currency_modal #usd_exchange_value').val()
      },
      success: function(result){
        alertify.logPosition("bottom right");

        if(result.success){
          alertify.success(result.message);
          $('#edit_currency_modal').modal('hide');
          get();
        }
        else{
          alertify.error(result.message);
        }
      }
    });
  });

  $('#search_currency, #search_date_from, #search_date_to').on('change', function(){
    get();
  });

  function get_unrecorded_date(){
    $.ajax({
      type: 'POST',
      async: false,
      url: CONFIG.BASE_URL + 'currencyexchange/get_unrecorded_date/',
      dataType: 'json',
      success: function(result){
        var options = { year: 'numeric', month: 'long', day: 'numeric' };
        result.forEach(function(obj){
          var selected_date_temp = obj.selected_date;
          var year = selected_date_temp.substring(0,4);
          var month = selected_date_temp.substring(4,6);
          var day = selected_date_temp.substring(6,8);

          var selected_date = new Date(year, month-1, day);
          obj.datepicker = year + "-" + month + "-" + day; 
          obj.selected_date = selected_date.toLocaleDateString("en-US", options);
        });
        $('#unrecorded-date-table').loadTemplate($('#unrecorded-date-row-template'), result);
        UNRECORDED_DATES = result;
      }
    });
  }

  function get(page = 1){
    var search_date_from = $('#search_date_from').val();
    var search_date_to = $('#search_date_to').val();
    // var currency = $('#search_currency').val();

    $.ajax({
      type: 'POST',
      url: CONFIG.BASE_URL + 'currencyexchange/get',
      dataType: 'json',
      data: {
        page : page,
        search_date_from : search_date_from,
        search_date_to: search_date_to,
        // currency: currency
      },
      success: function(result){
        var options = { year: 'numeric', month: 'long', day: 'numeric' };
        var total_count = result.list.length;
        var total_usd = 0;
        var total_euro = 0;

        result.list.forEach(function(exchange){
          var exchange_date_temp = exchange.currency_exchange_date;
          var year = exchange_date_temp.substring(0,4);
          var month = exchange_date_temp.substring(4,6);
          var day = exchange_date_temp.substring(6,8);

          var exchange_date = new Date(year, month-1, day);
          exchange.currency_exchange_date = exchange_date.toLocaleDateString("en-US", options);
          exchange.actions = "<a id='" + exchange_date_temp + "' class='btn btn-info btn-outline btn-circle btn-sm m-r-5 edit-currency'><span class='ti-pencil-alt'></span></a>"+
                        '<a class="btn btn-danger btn-outline btn-circle m-r-5 btn-sm delete-equipment"><i class="icon-trash"></i></a> ' +
                        '<a class="btn btn-danger btn-sm confirm-delete-equipment" style="display:none;" id="' + exchange_date_temp + '_'+ exchange.currency + '">CONFIRM</a>';

          total_usd += parseFloat(exchange.USD_rate);
          total_euro += parseFloat(exchange.EURO_rate);
        }); 

        if(result.list.length > 0){
          $('#exchange-table').loadTemplate($('#currency-row-template'), result.list);
          appendTotal(total_usd, total_euro, total_count);
          $('#pagination').html(result.pagination);
          setPaginationClicks();

          $('.delete-equipment').on('click', function(e){
            e.preventDefault();
            $(this).next('.confirm-delete-equipment').toggle();
          });

          $('.confirm-delete-equipment').on('click', function(e){
            e.preventDefault();
            var data = $(this).attr('id');
            var split_data = data.split('_');
            delete_currency(split_data[0], split_data[1]);
          }); 

          $('.edit-currency').on('click', function(e){
            e.preventDefault();

            var data = $(this).attr('id');
            // var split_data = data.split('_');
            // edit_currency(split_data[0], split_data[1]);
            edit_currency(data);
          });
        }
        else{
          $('#exchange-table').html('<tr><td align="center" colspan="10">No records found.</td></tr>');
        }
      }
    });

    function delete_currency(exchange_date, currency){
      $.ajax({
        type: 'POST',
        async: false,
        url: CONFIG.BASE_URL + 'currencyexchange/deleteExchange',
        dataType: 'json',
        data: {
          currency_exchange_date: exchange_date,
          currency: currency
        },
        success: function(result){
          alertify.logPosition("bottom right");

          if(result.success){
            alertify.success(result.message);
            get();
          }
        }
      });
    }

    $('#edit_currency_modal #currency').on('change', function(){
      var dates = $('#edit_currency_modal #exchange_date').val().split('-');
      edit_currency(dates.join(''));
    });

    function edit_currency(exchange_date){
      $.ajax({
        type: 'POST',
        async: false,
        url: CONFIG.BASE_URL + 'currencyexchange/get_value/' + exchange_date,
        dataType: 'json',
        success: function(result){
          var exchange_date_temp = result[0].currency_exchange_date;
          var year = exchange_date_temp.substring(0,4);
          var month = exchange_date_temp.substring(4,6);
          var day = exchange_date_temp.substring(6,8);

          $('#edit_currency_modal #exchange_date').val(year + '-' + month + '-' + day);

          result.forEach(function(row){
            if(row.currency == 'EURO'){
              $('#edit_currency_modal #euro_exchange_value').val(row.currency_exchange_rate);
            }
            else if(row.currency == 'USD'){
              $('#edit_currency_modal #usd_exchange_value').val(row.currency_exchange_rate);
            }
          });

          $('#edit_currency_modal').modal('show');
        }
      });
    }

    function appendTotal(total_usd, total_euro, total_count){
      const usd_total = total_usd / total_count;
      const euro_total = total_euro / total_count;
      $('#exchange-table').append('<tr><td align="right"><b>AVERAGE : </b></td><td style="border-right: 1px solid #fff; text-transform: uppercase;"><b>'+ usd_total.toFixed(2) +'</b></td><td style="border-right: 1px solid #fff; text-transform: uppercase;"><b>'+ euro_total.toFixed(2) +'</b></td><td></td></tr>');
    }
  }
});

