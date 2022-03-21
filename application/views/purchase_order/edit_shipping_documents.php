<div class="container-fluid">
    <form method="POST" id="edit_shipping_documents_form">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">SHIPPING DOCUMENTS</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="col-lg-2 col-sm-4 col-xs-12 pull-right">
                    <input type="submit" name="" value="SUBMIT" class="btn btn-block btn-info btn-rounded">
                </div>
                <ol class="breadcrumb">
                    <li><a href="<?=base_url()?>purchaseorder/view">View Project</a></li>
                    <li class="active">Update Packing List / Commercial Invoice</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <div class="pull-left">
                        <h3 class="box-title m-b-0">PACKING LIST / COMMERCIAL INVOICE</h3>
                        <p class="text-muted m-b-30">Details</p>
                    </div>
                    <div class="pull-right" style="margin-top: 15px;">
                        <label>Shipping Documents</label>
                        <div>
                            <input type="checkbox" name="purchase_order_shipping_completion" id="purchase_order_shipping_completion" <?php echo ($po->purchase_order_shipping_completion == 1) ? "checked" : ""; ?> class="js-switch" data-color="#f96262" data-size="medium" disabled />
                        </div>
                    </div>
                    <div class="col-md-12"></div>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6 m-b-20">
                                <label>Packing List <br><?php if($po->purchase_order_packing_list){?><i><span class="text-muted">A file has been added already </span>&rarr; <a href="<?=base_url()?>asset/projects/shipping_documents/<?=$po->purchase_order_packing_list?>" target="_blank" style="color: #04c;"><span class="fa fa-file"></span> View File</a></i><?php }?></label>
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput"> 
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span>
                                    </div> 
                                    <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                    <input type="file" name="purchase_order_packing_list" id="purchase_order_packing_list" autofocus> </span> 
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    <input type="hidden" id="purchase_order_packing_list_data" name="purchase_order_packing_list_data" class="form-control" value="<?=$po->purchase_order_packing_list;?>"> 
                                </div>
                            </div>
                            <div class="col-md-6 m-b-20">
                                <label>Commercial Invoice <br><?php if($po->purchase_order_commercial_invoice){?><i><span class="text-muted">A file has been added already </span>&rarr; <a href="<?=base_url()?>asset/projects/shipping_documents/<?=$po->purchase_order_commercial_invoice?>" target="_blank" style="color: #04c;"><span class="fa fa-file"></span> View File</a></i><?php }?></label>
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput"> 
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span>
                                    </div> 
                                    <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                    <input type="file" name="purchase_order_commercial_invoice" id="purchase_order_commercial_invoice" autofocus> </span> 
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    <input type="hidden" id="purchase_order_commercial_invoice_data" name="purchase_order_commercial_invoice_data" class="form-control" value="<?=$po->purchase_order_commercial_invoice;?>"> 
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
<script src="<?=base_url()?>asset/src/purchase_order/edit_shipping_documents.js"></script>
