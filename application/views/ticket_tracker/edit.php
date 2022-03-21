<div class="container-fluid">
    <form method="POST" id="ticket_form">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Update Ticket</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="col-lg-2 col-sm-4 col-xs-12 pull-right">
                    <input type="submit" name="" value="UPDATE" class="btn btn-block btn-info btn-rounded">
                </div>
                <ol class="breadcrumb">
                    <li><a href="<?=base_url()?>tickettracker/view">Ticket</a></li>
                    <li class="active">Update</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="white-box">
                    <h3 class="box-title m-b-0">Airline Ticket</h3>
                    <p class="text-muted m-b-30 font-13">Details</p>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Booking Reference Number</label>
                                    <input type="text" id="airline_ticket_ref_number" name="airline_ticket_ref_number" class="form-control" placeholder="Reference Number" required="" value="<?=$ticket->airline_ticket_ref_number?>"> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Booking Date</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker-autoclose" id="airline_ticket_booking_date" name="airline_ticket_booking_date" placeholder="yyyy-mm-dd" required="" autocomplete="off" value="<?=$ticket->airline_ticket_booking_date?>"> <span class="input-group-addon"><i class="icon-calender"></i></span> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Passenger</label>
                                    <input type="text" id="airline_ticket_passenger" name="airline_ticket_passenger" class="form-control" placeholder="Passenger" required="" value="<?=$ticket->airline_ticket_passenger?>"> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Airline/Website/Provider</label>
                                    <input type="text" id="airline_ticket_provider" name="airline_ticket_provider" class="form-control" placeholder="Airline/Website/Provider" required="" value="<?=$ticket->airline_ticket_provider?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Route</label>
                                    <input type="text" id="airline_ticket_route" name="airline_ticket_route" class="form-control" placeholder="Route" required="" value="<?=$ticket->airline_ticket_route?>"> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="white-box" style="min-height: 485px;">
                    <h3 class="box-title m-b-0">Schedule</h3>
                    <p class="text-muted m-b-30 font-13">Ticket Schedule</p>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Flight</label>
                                    <select class="form-control" id="airline_ticket_flight_trip" name="airline_ticket_flight_trip">
                                        <option value="1" <?=($ticket->airline_ticket_flight_trip == 1)? "selected": "" ?>>Round trip</option>
                                        <option value="2" <?=($ticket->airline_ticket_flight_trip == 2)? "selected": "" ?>>One way</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Departure Date</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker-autoclose" id="airline_ticket_departure_date" name="airline_ticket_departure_date" placeholder="yyyy-mm-dd" autocomplete="off" required="" value="<?=$ticket->airline_ticket_departure_date?>"> <span class="input-group-addon"><i class="icon-calender"></i></span> 
                                    </div> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Departure Time</label>
                                    <div class="input-group clockpicker " data-placement="bottom" data-align="top" data-autoclose="true">
                                        <input type="text" class="form-control" id="airline_ticket_departure_time" name="airline_ticket_departure_time" required="" value="<?=$ticket->airline_ticket_departure_time?>"> <span class="input-group-addon"> <span class="glyphicon glyphicon-time"></span> </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row return-div">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Return Date</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker-autoclose" id="airline_ticket_return_date" name="airline_ticket_return_date" placeholder="yyyy-mm-dd" autocomplete="off" value="<?=$ticket->airline_ticket_return_date?>"> <span class="input-group-addon"><i class="icon-calender"></i></span> 
                                    </div> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Return Time</label>
                                    <div class="input-group clockpicker " data-placement="bottom" data-align="top" data-autoclose="true">
                                        <input type="text" class="form-control" value="<?=$ticket->airline_ticket_return_time?>" id="airline_ticket_return_time" name="airline_ticket_return_time"> <span class="input-group-addon"> <span class="glyphicon glyphicon-time"></span> </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Rebookable?</label>
                                    <div>
                                        <input type="checkbox" name="airline_ticket_rebookable" id="airline_ticket_rebookable" <?=($ticket->airline_ticket_rebookable == 1)? "checked": ""?> class="js-switch" data-color="#f96262" data-size="small" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" id="airline_ticket_status" name="airline_ticket_status">
                                        <option <?=($ticket->airline_ticket_status == "New")? "selected": "" ?>>New</option>
                                        <option <?=($ticket->airline_ticket_status == "Rebooked (1)")? "selected": "" ?>>Rebooked (1)</option>
                                        <option <?=($ticket->airline_ticket_status == "Rebooked (2)")? "selected": "" ?>>Rebooked (2)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Date Picker Plugin JavaScript -->
<script src="<?=base_url()?>asset/components/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<!-- Clock Plugin JavaScript -->
<script src="<?=base_url()?>asset/components/plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.js"></script>
<script src="<?=base_url()?>asset/components/plugins/bower_components/switchery/dist/switchery.min.js"></script>
<script src="<?=base_url()?>asset/src/ticket_tracker/edit.js"></script>
