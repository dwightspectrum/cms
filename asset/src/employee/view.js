$(document).ready(function(){
	get();
	
	$('#search').on('keyup', function(){
		get();
	});

	function get(page = 1){
  	var search = $('#search').val();

  	$.ajax({
      	type: 'POST',
      	url: CONFIG.BASE_URL + 'employee/get',
      	dataType: 'json',
      	data: {
        	page : page,
        	search : search
      	},
      	success: function(result){
      		loadData(result.list);
			  //console.log(loadData);
		      $('#pagination').html(result.pagination);
        	setPaginationClicks();
      		addEventListeners();
      	}
  	});
	}

	function loadData(list){
		if(list.length > 0){
  		$('#employee-table').loadTemplate($('#employee-row-template'), list);
		}
		else{
			$('#employee-table').html('<tr><td class="text-center" colspan="10">No records found.</td></tr>');
		}                            
	}

	function setPaginationClicks(){
		$('.pagination a[href]').on("click", function(e){
		  e.preventDefault();
		  get($(this).attr('data-ci-pagination-page'));
		});
	}

	function addEventListeners(){
  	$('.btn-update').on('click', function(e){
  		e.preventDefault();
  		redirect(this, 'employee/edit/');
  	});

  	$('.btn-view-profile').on('click', function(e){
  		e.preventDefault();
  		redirect(this, 'employee/profile/');
  	});

    $('.btn-cv').on('click', function(e){
      e.preventDefault();
      redirect(this, 'employee/download_resume/');
    });
	}

	function redirect(parent, url){
		var id = $(parent).attr('id');
		window.location = CONFIG.BASE_URL + url + id;
	}

  $('#create-employee-form').submit(function(){
    var firstname = $('#create-employee-form #firstname').val();
    var lastname = $('#create-employee-form #lastname').val();
    var office_email = $('#create-employee-form #office_email').val();
    var company_id = $('#create-employee-form #company_id').val();
    var role_id = $('#create-employee-form #role_id').val();
    var is_regular = ($('#create-employee-form #employee_is_regular').is(':checked'))? 1 : 0;

    $.ajax({
        type: 'POST',
        url: CONFIG.BASE_URL + 'employee/create',
        dataType: 'json',
        data: {
          firstname: firstname,
          lastname: lastname,
          office_email: office_email,
          company_id: company_id,
          role_id: role_id,
          is_regular: is_regular
        },
        success: function(result) {
			alertify.logPosition("bottom right");
			alertify.success("Successfully created!");

			setTimeout(function() {
				window.location.href = CONFIG.BASE_URL + "employee/view";
			}, 1000);
		},
    });
  });

  // 	document.getElementById('create_freelancer_form')?addEventListener('submit', async (e) => {
		// e.preventDefault();
		// const formData = new FormData(e.target);
		// const res = await fetch(`${CONFIG.BASE_URL}/employee/add_details`, {
		// 				method: 'POST',
		// 				body: formData
		// 			});
		// const data = await res.json();
		// if (data.success) {
		// 	getLists();
		//   	clearFormInput('#create_freelancer_form');
		//   	alertify.logPosition("bottom right");
		//   	alertify.success("Successfully added!"); 
		// }
  // 	});
});
