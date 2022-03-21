

<div class="container-fluid">
    <form method="POST" id="update_pull_out_details_form">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Update Pull Out Details</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="col-lg-2 col-sm-4 col-xs-12 pull-right">
                    <input type="submit" name="" value="UPDATE" class="btn btn-block btn-info btn-rounded">
                </div>
                <ol class="breadcrumb">
                    <li><a href="<?=base_url()?>purchaseorder/view">View Project</a></li>
                    <li class="active">Update Pull Out Details</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <div class="pull-left">
                        <h3 class="box-title m-b-0">PULL OUT</h3>
                        <p class="text-muted m-b-30">Details</p>
                    </div>
                    <div class="pull-right" style="margin-top: 15px;">
                        <label>Trucking Completion</label>
                        <div>
                            <input type="checkbox" name="purchase_order_trucking_completion" id="purchase_order_trucking_completion" <?php echo ($po->purchase_order_trucking_completion == 1) ? "checked" : ""; ?> class="js-switch" data-color="#f96262" data-size="medium" disabled />
                        </div>
                    </div>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Logistics Company</label>
                                    <input type="text" id="po_trucking_details" name="po_trucking_details" class="form-control" placeholder="Trucking / Contact Person" value="<?=$trucking->po_trucking_details;?>"> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Loading Date</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker-autoclose" id="po_trucking_loading_date" name="po_trucking_loading_date" placeholder="yyyy-mm-dd" autocomplete="off" value="<?php echo ($trucking->po_trucking_loading_date != NULL) ? $trucking->po_trucking_loading_date : "";?>"> <span class="input-group-addon"><i class="icon-calender"></i></span> 
                                    </div> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Shipping Date</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker-autoclose" id="po_trucking_shipping_date" name="po_trucking_shipping_date" placeholder="yyyy-mm-dd" autocomplete="off" value="<?php echo ($trucking->po_trucking_shipping_date != NULL) ? $trucking->po_trucking_shipping_date : "";?>"> <span class="input-group-addon"><i class="icon-calender"></i></span> 
                                    </div> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Arrival Date (Estimated)</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker-autoclose" id="po_trucking_arrival_date" name="po_trucking_arrival_date" placeholder="yyyy-mm-dd" autocomplete="off" value="<?php echo ($trucking->po_trucking_arrival_date != NULL) ? $trucking->po_trucking_arrival_date : "";?>"> <span class="input-group-addon"><i class="icon-calender"></i></span> 
                                    </div> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Quotation: &rarr; <a href="<?=base_url()?>asset/projects/quotations/<?=$trucking->po_trucking_quotation?>" target="_blank" style="color: #04c;"><span class="fa fa-file"></span> View File</a></label>
                                    <input type="file" id="po_trucking_quotation" name="po_trucking_quotation" class="form-control"> 
                                    <input type="hidden" id="po_trucking_quotation_file_name" name="po_trucking_quotation_file_name" class="form-control"value="<?=$trucking->po_trucking_quotation;?>"> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Shipper</label>
                                    <input type="text" id="po_trucking_shipper" name="po_trucking_shipper" class="form-control" placeholder="Shipper" value="<?=$trucking->po_trucking_shipper;?>"> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Consignee</label>
                                    <input type="text" id="po_trucking_consignee" name="po_trucking_consignee" class="form-control" placeholder="Consignee" value="<?=$trucking->po_trucking_consignee;?>"> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Broker</label>
                                    <input type="text" id="po_trucking_broker" name="po_trucking_broker" class="form-control" placeholder="Broker" value="<?=$trucking->po_trucking_broker;?>"> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Broker Contact</label>
                                    <input type="text" id="po_trucking_broker_contact" name="po_trucking_broker_contact" class="form-control" placeholder="Broker Contact" value="<?=$trucking->po_trucking_broker_contact;?>"> 
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
<script src="<?=base_url()?>asset/src/purchase_order/edit_pull_out_details.js"></script>
