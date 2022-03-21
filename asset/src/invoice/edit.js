$(document).ready(function(){
	var PROJECT_DATES = [];
	var LESS_ADVANCES = [];

	jQuery('.datepicker-autoclose').datepicker({
		autoclose: true,
		todayHighlight: true,
		format: 'yyyy-mm-dd'
	});

	set_client_project();
	set_invoice_dates();
	set_invoice_advances();

	function set_client_project(){
		get_client_projects(function(){
			$('#project_id').val(CONFIG.project_id);
		});
	}

	function set_invoice_dates(){
		PROJECT_DATES = CONFIG.invoice_dates;
		displayProjectDates();
	}

	function set_invoice_advances(){
		LESS_ADVANCES = CONFIG.invoice_advances;
		displayAdvances();
	}

	$('#client_id').on('change', function(){
		get_client_projects();
	});

	$('.others_checkbox').on('click', function(){
		var id = $(this).attr('id');
		
		if($(this).prop("checked") == true){
			$('.'+id).show();
		}
		else{
			$('.'+id).hide();
		}
	});

	$('#add-project-dates').on('click', function(){
		const start_date = $('#project_start_date').val();
		const end_date = $('#project_end_date').val();

        alertify.logPosition("bottom right");

		if(start_date == '' || start_date == null){
	        alertify.error("Start Date is required.");
	        return;
		}

		if(end_date == '' || end_date == null){
	        alertify.error("End Date is required.");
	        return;
		}

		PROJECT_DATES.push({
			project_start_date : start_date,
			project_end_date : end_date
		});

		$('#project_start_date').val('');
		$('#project_end_date').val('');

		displayProjectDates();
	});

	$('#add-advances').on('click', function(){
		const advance_cv = $('#advance_cv').val();
		const advance_date = $('#advance_date').val();
		const advance_amount = $('#advance_amount').val();
		const advance_currency = $('#advance_currency').val();

        alertify.logPosition("bottom right");

		if(advance_cv == '' || advance_cv == null){
	        alertify.error("CV# is required.");
	        return;
		}

		if(advance_date == '' || advance_date == null){
	        alertify.error("Date is required.");
	        return;
		}

		if(advance_amount == '' || advance_amount == null){
	        alertify.error("Valid Amount is required.");
	        return;
		}

		LESS_ADVANCES.push({
			advance_cv : advance_cv,
			advance_date : advance_date,
			advance_amount : advance_amount,
			advance_currency: advance_currency
		});

		$('#advance_cv').val('');
		$('#advance_date').val('');
		$('#advance_amount').val('');

		displayAdvances();
	});

	function displayAdvances(){
		var data = LESS_ADVANCES;
		data.forEach(function(advance, index){
			advance.actions = "<a id='" + index + "' class='btn btn-danger btn-sm remove-advances'><span class='fa fa-trash'></span></a>";
		});

		if(data && data.length > 0){
          	$('#advances-table').loadTemplate($('#advances-select-template'), data);
		}
        else{
        	$('#advances-table').html('<tr><td align="center" colspan="4">No records added.</td></tr>');
        }

      	$('.remove-advances').on('click', function(){
      		var id = $(this).attr('id');
      		LESS_ADVANCES.splice(id, 1);
      		displayAdvances();
      	});
	}

	function displayProjectDates(){
		var data = PROJECT_DATES;
		data.forEach(function(dates, index){
			dates.actions = "<a id='" + index + "' class='btn btn-danger btn-sm remove-project-date'><span class='fa fa-trash'></span></a>";
		});

		if(data && data.length > 0){
          	$('#project-dates-table').loadTemplate($('#project-dates-template'), data);
		}
        else{
        	$('#project-dates-table').html('<tr><td align="center" colspan="4">No records added.</td></tr>');
        }

      	$('.remove-project-date').on('click', function(){
      		var id = $(this).attr('id');
      		PROJECT_DATES.splice(id, 1);
      		displayProjectDates();
      	});
	}

	$('#submit-invoice').on('click', function(e){
		e.preventDefault();

		if ($(this).attr("disabled"))
			return;
		
		$('#waitlabel').show();
		$('#navbarPreview').hide();

		var inputs = $('.main-invoice input[required]:visible');
		var checkboxes = $('input[type=checkbox]:checkbox:checked');
        alertify.logPosition("bottom right");
		var hasError = checkInputs(inputs);

		if(hasError)
			return;

		checkboxes.each(function(i, input){
			var checkboxID = $(input).attr('id');
			var checkbox_inputs = $('.' + checkboxID + ' input[required]:visible');
			hasError = checkInputs(checkbox_inputs, true);

			if(hasError)
				return false;
		});

		if(hasError)
			return;

		$("#submit-invoice").attr('disabled','disabled');

		$.ajax({
            type: 'POST',
            url: CONFIG.BASE_URL + 'invoice/edit_details/' + CONFIG.employee_invoice_id,
            dataType: 'json',
            data: {
            	invoice: $('#edit_invoice_form').serialize(),
            	advances: JSON.stringify(LESS_ADVANCES),
            	project_dates: JSON.stringify(PROJECT_DATES)
            },
            success: function(result){
            	alertify.success("Successfully Submitted!");
            	setTimeout(function(){
            		window.location.href = CONFIG.BASE_URL + "invoice/view";
            	}, 1500);
            }
      	});
	});

	$('#preview-invoice').on('click', function(e){
		e.preventDefault();
		var inputs = $('.main-invoice input[required]:visible');
		var checkboxes = $('input[type=checkbox]:checkbox:checked');
        alertify.logPosition("bottom right");
		var hasError = checkInputs(inputs);

		if(hasError)
			return;

		checkboxes.each(function(i, input){
			var checkboxID = $(input).attr('id');
			var checkbox_inputs = $('.' + checkboxID + ' input[required]:visible');
			hasError = checkInputs(checkbox_inputs, true);

			if(hasError)
				return false;
		});

		if(hasError)
			return;

		if(PROJECT_DATES.length == 0){
			alertify.error('Please add atleast one project date.');
			return;
		}

		var advances = { advances : LESS_ADVANCES };
		var project_dates = { project_dates : PROJECT_DATES };

		window.open(CONFIG.BASE_URL + 'invoice/preview/?' + $('#edit_invoice_form').serialize() + '&' + $.param(advances) + '&' + $.param(project_dates), '_blank');
	});

	function checkInputs(inputs, isNumber){
		var hasError = false;
		inputs.each(function(i, input){
			var inputVal = $(input).val();
			if(inputVal == '' || inputVal == null || inputVal == undefined){
				var placeholder = $(input).attr('placeholder');
		        alertify.error(placeholder + " is required.");
		        hasError = true;
		        return false;
		    }
		    else{
		    	if(isNumber && (inputVal == 0 || inputVal == '0')){
		    		var placeholder = $(input).attr('placeholder');
			        alertify.error(placeholder + " is required.");
			        hasError = true;
			        return false;
		    	}
		    }
		});

		return hasError;
	}

	function get_client_projects(callback = null){
		var client_id = $('#client_id').val();

	    $.ajax({
	      type: 'POST',
	      url: CONFIG.BASE_URL + 'project/get_projects/' + client_id,
	      dataType: 'json',
	      success: function(result){
	        $('#project_id').loadTemplate($('#project-row-template'), result);

	        if(callback){
	        	callback();
	        }
	      }
	    }); 	  
	}
});