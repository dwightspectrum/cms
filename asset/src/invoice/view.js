$(document).ready(function(){
	get();

	$('#search').on('keyup', function(){
		get();
	});

	function get(page = 1){
  	var search = $('#search').val();

  	$.ajax({
      	type: 'POST',
      	url: CONFIG.BASE_URL + 'invoice/get',
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
  		$('#invoice-table').loadTemplate($('#invoice-row-template'), list);
		}
		else{
			$('#invoice-table').html('<tr><td class="text-center" colspan="10">No records found.</td></tr>');
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

  	$('.btn-view').on('click', function(e){
  		e.preventDefault();
      var id = $(this).attr('id');
      window.open(CONFIG.BASE_URL + 'invoice/details/' + id, '_blank');
  	});

    $('.btn-cv').on('click', function(e){
      e.preventDefault();
      redirect(this, 'invoice/download/');
    });
	}

	function redirect(parent, url){
		var id = $(parent).attr('id');
		window.location = CONFIG.BASE_URL + url + id;
	}
});