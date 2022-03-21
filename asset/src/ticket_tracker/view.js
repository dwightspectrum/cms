$(document).ready(function(){
	get();

	$('#search').on('keyup', function(){
		get();
	});

	function get(page = 1){
  	var search = $('#search').val();

  	$.ajax({
      	type: 'POST',
      	url: CONFIG.BASE_URL + 'tickettracker/get',
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
        obj.airline_ticket_booking_date = moment(obj.airline_ticket_booking_date).format("MMM DD, YYYY");
        obj.airline_ticket_departure_date = moment(obj.airline_ticket_departure_date).format("MMM DD, YYYY");
        obj.airline_ticket_return_date = (obj.airline_ticket_flight_trip == 1)? moment(obj.airline_ticket_return_date).format("MMM DD, YYYY") : '-';
        obj.airline_ticket_rebookable = (obj.airline_ticket_rebookable == 1)? "YES" : "NO";  
        obj.airline_ticket_trip = (obj.airline_ticket_flight_trip == 1)? "Round trip" : "One way";  
      });

  		$('#ticket-table').loadTemplate($('#ticket-row-template'), list);
		}
		else{
			$('#ticket-table').html('<tr><td class="text-center" colspan="10">No records found.</td></tr>');
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
  		redirect(this, 'tickettracker/edit/');
  	});

  	$(".btn-delete").on("click", function(e){
          e.preventDefault();
          var parent = $(this);

          swal({   
              title: "Are you sure?",   
              text: "Are you sure you want to delete reference number " + parent.attr("data-ref") + "?",   
              type: "warning",   
              showCancelButton: true,   
              confirmButtonColor: "#DD6B55",   
              confirmButtonText: "Yes",   
              closeOnConfirm: true 
          }, function(){   
              $.ajax({
                type: 'POST',
                url: CONFIG.BASE_URL + 'tickettracker/delete/' + parent.attr("id"),
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

	function redirect(parent, url){
		var id = $(parent).attr('id');
		window.location = CONFIG.BASE_URL + url + id;
	}
});