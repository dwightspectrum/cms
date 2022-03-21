<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Invoice</h4> </div>
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
                        <input type="text" id="search" placeholder="Search Invoice" class="form-control">
                    </div>
                    <h3>Manage Invoices</h3> 
                </div>
                <div class="table-responsive m-t-30">
                    <table class="table color-table inverse-table table-striped">
                        <thead>
                            <tr>
                                <th>INVOICE NUMBER</th>
                                <?php if($is_accounting){ ?>
                                <th>EMPLOYEE</th>
                                <?php } ?>
                                <th>CLIENT</th>
                                <th>PROJECT</th>
                                <th>SCOPE</th>
                                <th>DATE</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="invoice-table">
                            <tr>
                                <td class="text-center" colspan="6">No records found.</td>
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

<script type="text/html" id="invoice-row-template">
    <tr>
        <td data-content="employee_invoice_number"></td>
        <?php if($is_accounting){ ?>
        <td data-content="employee_fullname"></td>
        <?php } ?>
        <td data-content="client_name"></td>
        <td data-content="project_name"></td>
        <td data-content="project_scope"></td>
        <td data-content="project_dates"></td>
        <td>
            <a title="View" class="btn btn-info btn-outline btn-circle btn-sm m-r-5 btn-view" data-id="employee_invoice_id"><i class="fa fa-search"></i></a>
            <a title="Edit" class="btn btn-warning btn-outline btn-circle btn-sm m-r-5 btn-update" data-id="employee_invoice_id"><i class="ti-pencil-alt"></i></a>
            <!-- <button type="button" title="Delete" class="btn btn-danger btn-outline btn-circle btn-sm m-r-5 btn-view-profile" data-id="employee_invoice_id"><i class="fa fa-trash"></i></button> -->
        </td>
    </tr>
</script>

<script type="text/javascript" src="<?=base_url()?>asset/src/invoice/view.js"></script>
