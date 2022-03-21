<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Project</h4> 
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="<?=base_url()?>dashboard">Dashboard</a></li>
                <li class="active"><a href="<?=base_url()?>purchaseorder/display_mode"><i class="fa fa-th" aria-hidden="true"></i> Switch View</a></li>
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
                      <a href="<?=base_url()?>purchaseorder/add" class='btn btn-round btn-success'><span class='fa fa-plus'></span> Create</a>
                    </div>
                    <div class="pull-right">
                        <input type="text" id="search" placeholder="Search PO" class="form-control">
                    </div>
                    <h3>Manage Project</h3> 
                </div>
                <div class="table-responsive m-t-30">
                    <table class="table color-table inverse-table table-striped">
                        <thead>
                            <tr>
                                <th>PROJECT NAME</th>
                                <th>CLIENT</th>
                                <th>P.O. #</th>
                                <th>DEPARTURE DATE</th>
                                <th>START DATE</th>
                                <th>END DATE</th>
                                <th>AMOUNT</th>
                                <th>STATUS</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="purchase-order-table">
                            <tr>
                                <td class="text-center" colspan="9">No records found.</td>
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

<script type="text/html" id="purchase-order-row-template">
    <tr>
        <td><span class="font-medium" data-content="purchase_order_name"></span>
            <br/><span class="text-muted" data-content="purchase_order_scope"></span></td>
        <td><span class="text-muted" data-content="external_client_name"></span>
            <br/><span class="text-muted" data-content="external_client_site_address"></span></td>
        <td><span class="font-medium" data-content="purchase_order_number"></span></td>
        <td><span class="font-muted" data-content="purchase_order_deployment_schedule"></span></td>
        <td><span class="font-muted" data-content="purchase_order_start_date"></span></td>
        <td><span class="font-muted" data-content="purchase_order_end_date"></span></td>
        <td><span class="font-medium" data-content="purchase_order_amount"></span></td>
        <td><span class="text-muted" data-content="purchase_order_status"></span></td>
        <td><span class="text-medium" data-content="actions"></span></td>
    </tr>
</script>

<script type="text/javascript" src="<?=base_url()?>asset/src/purchase_order/view.js"></script>
<script type="text/javascript" src="<?=base_url();?>asset/components/js/tooltipster.bundle.min.js"></script>
