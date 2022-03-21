<div class="container-fluid">
    <form method="POST" id="add_post_project_details_form">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">POST PROJECT</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="col-lg-2 col-sm-4 col-xs-12 pull-right">
                    <input type="submit" name="" value="SUBMIT" class="btn btn-block btn-info btn-rounded">
                </div>
                <ol class="breadcrumb">
                    <li><a href="<?=base_url()?>purchaseorder/view">View Project</a></li>
                    <li class="active">Add Post Project Details</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title m-b-0">POST PROJECT DETAILS</h3>
                    <p class="text-muted m-b-30">Details</p>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Arrival at Site</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker-autoclose" id="purchase_order_arrival_date" name="purchase_order_arrival_date" placeholder="yyyy-mm-dd" autocomplete="off" required="" value="<?=$po->purchase_order_arrival_date;?>"> <span class="input-group-addon"><i class="icon-calender"></i></span> 
                                    </div> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Departure at Site</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker-autoclose" id="purchase_order_departure_date" name="purchase_order_departure_date" placeholder="yyyy-mm-dd" autocomplete="off" required="" value="<?=$po->purchase_order_departure_date;?>"> <span class="input-group-addon"><i class="icon-calender"></i></span> 
                                    </div> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Acceptance Report <br><?php if($po->purchase_order_acceptance_report){?><i><span class="text-muted">A file has been added already </span>&rarr; <a href="<?=base_url()?>asset/projects/<?=$po->purchase_order_acceptance_report;?>" target="_blank" style="color: #04c;"><span class="fa fa-file"></span> View File</a></i><?php }?></label>
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput"> 
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span>
                                    </div> 
                                    <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                    <input type="file" name="purchase_order_acceptance_report" id="purchase_order_acceptance_report" autofocus> </span> 
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Log Sheets (<i>Please attached a zip file if more than one.</i>) <br><?php if($po->purchase_order_logsheets){?><i><span class="text-muted">A file has been added already </span>&rarr; <a href="<?=base_url()?>asset/projects/<?=$po->purchase_order_logsheets;?>" target="_blank" style="color: #04c;"><span class="fa fa-file"></span> View File</a></i><?php }?></label>
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput"> 
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span>
                                    </div> 
                                    <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                    <input type="file" name="purchase_order_logsheets" id="purchase_order_logsheets" autofocus> </span> 
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
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
<script src="<?=base_url()?>asset/src/purchase_order/add_post_project_details.js"></script>
