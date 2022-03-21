<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Project</h4> 
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="<?=base_url()?>dashboard">Dashboard</a></li>
                <li class="active"><a href="<?=base_url()?>purchaseorder/view"><i class="fa fa-th" aria-hidden="true"></i> Switch View</a></li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12">
            <div class="panel">
                <div class="p-20">
                    <div class="row">
                        <div class="col-xs-8">
                            <h4 class="m-b-0 font-medium">Yearly Projects</h4>
                            <h2 class="m-t-0"><span id="year_display">2019</span></h2>
                        </div>
                        <div class="col-xs-4 p-20">
                            <select class="form-control" id="year_view_filter" name="year_view_filter">
                                <?php for($i = $current_year; $i > ($current_year - 6); $i--){?>
                                <option><?=$i?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="panel-footer bg-extralight">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="panel panel-default">
                                <div class="panel-heading"> JANUARY
                                    <div class="pull-right"><a href="#" data-perform="panel-collapse"><i class="ti-minus"></i></a></div>
                                </div>
                                <div class="panel-wrapper collapse in" aria-expanded="true">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover manage-u-table">
                                                <thead>
                                                    <tr>
                                                        <th>PROJECT</th>
                                                        <th>DATE</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="january-table">
                                                    <tr>
                                                        <td class="text-center" colspan="2">No records found.</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div id="january-pagination" class="pull-right"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="panel panel-default">
                                <div class="panel-heading"> FEBRUARY
                                    <div class="pull-right"><a href="#" data-perform="panel-collapse"><i class="ti-minus"></i></a></div>
                                </div>
                                <div class="panel-wrapper collapse in" aria-expanded="true">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover manage-u-table">
                                                <thead>
                                                    <tr>
                                                        <th>PROJECT</th>
                                                        <th>DATE</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="february-table">
                                                    <tr>
                                                        <td class="text-center" colspan="2">No records found.</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div id="february-pagination" class="pull-right"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="panel panel-default">
                                <div class="panel-heading"> MARCH
                                    <div class="pull-right"><a href="#" data-perform="panel-collapse"><i class="ti-minus"></i></a></div>
                                </div>
                                <div class="panel-wrapper collapse in" aria-expanded="true">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover manage-u-table">
                                                <thead>
                                                    <tr>
                                                        <th>PROJECT</th>
                                                        <th>DATE</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="march-table">
                                                    <tr>
                                                        <td class="text-center" colspan="2">No records found.</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div id="march-pagination" class="pull-right"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="panel panel-default">
                                <div class="panel-heading"> APRIL
                                    <div class="pull-right"><a href="#" data-perform="panel-collapse"><i class="ti-minus"></i></a></div>
                                </div>
                                <div class="panel-wrapper collapse in" aria-expanded="true">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover manage-u-table">
                                                <thead>
                                                    <tr>
                                                        <th>PROJECT</th>
                                                        <th>DATE</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="april-table">
                                                    <tr>
                                                        <td class="text-center" colspan="2">No records found.</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div id="april-pagination" class="pull-right"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="panel panel-default">
                                <div class="panel-heading"> MAY
                                    <div class="pull-right"><a href="#" data-perform="panel-collapse"><i class="ti-minus"></i></a></div>
                                </div>
                                <div class="panel-wrapper collapse in" aria-expanded="true">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover manage-u-table">
                                                <thead>
                                                    <tr>
                                                        <th>PROJECT</th>
                                                        <th>DATE</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="may-table">
                                                    <tr>
                                                        <td class="text-center" colspan="2">No records found.</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div id="may-pagination" class="pull-right"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="panel panel-default">
                                <div class="panel-heading"> JUNE
                                    <div class="pull-right"><a href="#" data-perform="panel-collapse"><i class="ti-minus"></i></a></div>
                                </div>
                                <div class="panel-wrapper collapse in" aria-expanded="true">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover manage-u-table">
                                                <thead>
                                                    <tr>
                                                        <th>PROJECT</th>
                                                        <th>DATE</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="june-table">
                                                    <tr>
                                                        <td class="text-center" colspan="2">No records found.</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div id="june-pagination" class="pull-right"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="panel panel-default">
                                <div class="panel-heading"> JULY
                                    <div class="pull-right"><a href="#" data-perform="panel-collapse"><i class="ti-minus"></i></a></div>
                                </div>
                                <div class="panel-wrapper collapse in" aria-expanded="true">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover manage-u-table">
                                                <thead>
                                                    <tr>
                                                        <th>PROJECT</th>
                                                        <th>DATE</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="july-table">
                                                    <tr>
                                                        <td class="text-center" colspan="2">No records found.</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div id="july-pagination" class="pull-right"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="panel panel-default">
                                <div class="panel-heading"> AUGUST
                                    <div class="pull-right"><a href="#" data-perform="panel-collapse"><i class="ti-minus"></i></a></div>
                                </div>
                                <div class="panel-wrapper collapse in" aria-expanded="true">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover manage-u-table">
                                                <thead>
                                                    <tr>
                                                        <th>PROJECT</th>
                                                        <th>DATE</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="august-table">
                                                    <tr>
                                                        <td class="text-center" colspan="2">No records found.</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div id="august-pagination" class="pull-right"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="panel panel-default">
                                <div class="panel-heading"> SEPTEMBER
                                    <div class="pull-right"><a href="#" data-perform="panel-collapse"><i class="ti-minus"></i></a></div>
                                </div>
                                <div class="panel-wrapper collapse in" aria-expanded="true">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover manage-u-table">
                                                <thead>
                                                    <tr>
                                                        <th>PROJECT</th>
                                                        <th>DATE</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="september-table">
                                                    <tr>
                                                        <td class="text-center" colspan="2">No records found.</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div id="september-pagination" class="pull-right"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="panel panel-default">
                                <div class="panel-heading"> OCTOBER
                                    <div class="pull-right"><a href="#" data-perform="panel-collapse"><i class="ti-minus"></i></a></div>
                                </div>
                                <div class="panel-wrapper collapse in" aria-expanded="true">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover manage-u-table">
                                                <thead>
                                                    <tr>
                                                        <th>PROJECT</th>
                                                        <th>DATE</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="october-table">
                                                    <tr>
                                                        <td class="text-center" colspan="2">No records found.</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div id="october-pagination" class="pull-right"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="panel panel-default">
                                <div class="panel-heading"> NOVEMBER
                                    <div class="pull-right"><a href="#" data-perform="panel-collapse"><i class="ti-minus"></i></a></div>
                                </div>
                                <div class="panel-wrapper collapse in" aria-expanded="true">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover manage-u-table">
                                                <thead>
                                                    <tr>
                                                        <th>PROJECT</th>
                                                        <th>DATE</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="november-table">
                                                    <tr>
                                                        <td class="text-center" colspan="2">No records found.</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div id="november-pagination" class="pull-right"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="panel panel-default">
                                <div class="panel-heading"> DECEMBER
                                    <div class="pull-right"><a href="#" data-perform="panel-collapse"><i class="ti-minus"></i></a></div>
                                </div>
                                <div class="panel-wrapper collapse in" aria-expanded="true">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover manage-u-table">
                                                <thead>
                                                    <tr>
                                                        <th>PROJECT</th>
                                                        <th>DATE</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="december-table">
                                                    <tr>
                                                        <td class="text-center" colspan="2">No records found.</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div id="december-pagination" class="pull-right"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="options_menu_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close close-create-modal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="exampleModalLabel">CHECK PROJECT DETAILS: </h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label></label>
                  <div class="list-group">
                    <button type="button" class="list-group-item project_details_btn" data-value="1">CONTINUE</button>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

<script type="text/html" id="projects-row-template">
    <tr>
        <td>
            <span class="font-medium" data-content="purchase_order_name"></span><br/>
            <b><span class="project-tooltip" title="Client Name">CN:</span></b> <span class="text-muted" data-content="external_client_name"></span>
        </td>
        <td>
            <b><span class="project-tooltip" title="Start Date">SD:</span></b> <span class="font-muted" data-content="purchase_order_start_date"></span><br/>
            <b><span class="project-tooltip" title="End Date">ED:</span></b> <span class="font-muted" data-content="purchase_order_end_date"></span>
        </td>
        <td><span class="text-medium" data-content="actions"></span></td>
    </tr>
</script>



<script type="text/javascript" src="<?=base_url()?>asset/components/js/tooltipster.bundle.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>asset/src/purchase_order/display_mode.js"></script>
