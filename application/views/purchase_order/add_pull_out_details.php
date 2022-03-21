<div class="container-fluid">
    <form method="POST" id="add_pull_out_details_form">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Pull Out Details</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="col-lg-2 col-sm-4 col-xs-12 pull-right">
                    <input type="submit" name="" value="SUBMIT" class="btn btn-block btn-info btn-rounded">
                </div>
                <ol class="breadcrumb">
                    <li><a href="<?=base_url()?>purchaseorder/view">View Project</a></li>
                    <li class="active">Add Pull Out Details</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title m-b-0">PULL OUT</h3>
                    <p class="text-muted m-b-30">Details</p>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Logistics Company</label>
                                    <textarea class="form-control" rows="3" id="po_trucking_details" name="po_trucking_details" class="form-control" placeholder="Logistics / Contact Person / Address"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Loading Date</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker-autoclose" id="po_trucking_loading_date" name="po_trucking_loading_date" placeholder="yyyy-mm-dd" autocomplete="off"> <span class="input-group-addon"><i class="icon-calender"></i></span> 
                                    </div> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Shipping Date</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker-autoclose" id="po_trucking_shipping_date" name="po_trucking_shipping_date" placeholder="yyyy-mm-dd" autocomplete="off"> <span class="input-group-addon"><i class="icon-calender"></i></span> 
                                    </div> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Arrival Date (Estimated)</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker-autoclose" id="po_trucking_arrival_date" name="po_trucking_arrival_date" placeholder="yyyy-mm-dd" autocomplete="off"> <span class="input-group-addon"><i class="icon-calender"></i></span> 
                                    </div> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Quotation</label>
                                    <input type="file" id="po_trucking_quotation" name="po_trucking_quotation" class="form-control"> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Shipper</label>
                                    <input type="text" id="po_trucking_shipper" name="po_trucking_shipper" class="form-control" placeholder="Shipper"> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Consignee</label>
                                    <input type="text" id="po_trucking_consignee" name="po_trucking_consignee" class="form-control" placeholder="Consignee"> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Broker</label>
                                    <input type="text" id="po_trucking_broker" name="po_trucking_broker" class="form-control" placeholder="Broker"> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Broker Contact</label>
                                    <input type="text" id="po_trucking_broker_contact" name="po_trucking_broker_contact" class="form-control" placeholder="Broker Contact"> 
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
<script src="<?=base_url()?>asset/src/purchase_order/add_pull_out_details.js"></script>
