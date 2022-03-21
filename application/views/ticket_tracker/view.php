<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Airline Ticket Tracker</h4> </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="<?=base_url()?>dashboard">Dashboard</a></li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <div>
                    <div class="pull-right">
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <a href="<?=base_url()?>tickettracker/add" class='btn btn-round btn-success'><span class='fa fa-plus'></span> Create</a>
                    </div>
                    <div class="pull-right">
                        <input type="text" id="search" placeholder="Search Tickets" class="form-control">
                    </div>
                    <h3>Manage Tickets</h3> 
                </div>
                <div class="table-responsive m-t-30">
                    <table class="table color-table inverse-table table-striped">
                        <thead>
                            <tr>
                                <th>BOOKING</th>
                                <th>PASSENGER</th>
                                <th>AIRLINE/WEBSITE/PROVIDER</th>
                                <th>ROUTE</th>
                                <th>DEPARTURE</th>
                                <th>RETURN</th>
                                <th>REBOOKABLE</th>
                                <th>STATUS</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="ticket-table">
                            <tr>
                                <td class="text-center" colspan="10">No records found.</td>
                            </tr>
                        </tbody>
                    </table>
                    <div id="pagination" class="pull-right">
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/html" id="ticket-row-template">
    <tr>
        <td><span class="font-medium" data-content="airline_ticket_ref_number"></span>
            <br/><span class="text-muted" data-content="airline_ticket_booking_date"></span></td>
        <td><span class="font-medium" data-content="airline_ticket_passenger"></span></td>
        <td><span class="font-medium" data-content="airline_ticket_provider"></span></td>
        <td><span class="font-medium" data-content="airline_ticket_route"></span>
          <br/><span class="text-muted" data-content="airline_ticket_trip"></span></td>
        <td><span data-content="airline_ticket_departure_date"></span>
            <br/><span class="text-muted" data-content="airline_ticket_departure_time"></span></td>
        <td><span data-content="airline_ticket_return_date"></span>
            <br/><span class="text-muted" data-content="airline_ticket_return_time"></span></td>
        <td><span class="font-medium" data-content="airline_ticket_rebookable"></span></td>
        <td><span class="font-medium" data-content="airline_ticket_status"></span></td>
        <td>
            <a title="Edit" class="btn btn-warning  btn-sm m-r-5 btn-update" data-id="airline_ticket_id"><i class="ti-pencil-alt"></i></a>
            <a title="Edit" class="btn btn-danger  btn-sm m-r-5 btn-delete" data-id="airline_ticket_id" data-template-bind='[{"attribute" : "data-ref", "value": "airline_ticket_ref_number"}]'><i class="fa fa-trash"></i></a>
        </td>
    </tr>
</script>

<script type="text/javascript" src="<?=base_url()?>asset/src/ticket_tracker/view.js"></script>
