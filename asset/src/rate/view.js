$(document).ready(function(){
	get();

	$('#search').on('keyup', function(){
		get();
	});

	function get(page = 1){
  	var search = $('#search').val();

  	$.ajax({
      	type: 'POST',
      	url: CONFIG.BASE_URL + 'rate/get',
      	dataType: 'json',
      	data: {
        	page : page,
        	search : search
      	},
      	success: function(result){
          console.log(result);
      		loadData(result.list);
		      $('#pagination').html(result.pagination);
        	setPaginationClicks();
      		addEventListeners();
      	}
  	});
	}

	function loadData(list){
		if(list.length > 0){
  		$('#employee-rate-table').loadTemplate($('#employee-rate-row-template'), list);
		}
		else{
			$('#employee-rate-table').html('<tr><td class="text-center" colspan="10">No records found.</td></tr>');
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
  		redirect(this, 'invoice/edit/');
  	});
	}

	function redirect(parent, url){
		var id = $(parent).attr('id');
		window.location = CONFIG.BASE_URL + url + id;
	}
});