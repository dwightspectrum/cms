<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Employee Rates</h4> </div>
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
                        <input type="text" id="search" placeholder="Search Employees" class="form-control">
                    </div>
                    <h3>Manage Employee Rates</h3> 
                </div>
                <div class="table-responsive m-t-30">
                    <table class="table color-table inverse-table table-striped">
                        <thead>
                            <tr>
                                <th width="10%">NAME</th>
                                <th width="12%" class="text-center">
                                  PHILIPPINES<br>
                                  day rate / travel rate
                                </th>
                                <th width="12%" class="text-center">
                                  ASIA<br>
                                  day rate / travel rate
                                </th>
                                <th width="12%" class="text-center">
                                  SOUTH AMERICA<br>
                                  day rate / travel rate
                                </th>
                                <th width="12%" class="text-center">
                                  AFRICA<br>
                                  day rate / travel rate
                                </th>
                                <th width="12%" class="text-center">
                                  EUROPE<br>
                                  day rate / travel rate
                                </th>
                                <th width="12%" class="text-center">
                                  MEAL <br>ALLOWANCE
                                </th>
                                <th width="12%" class="text-center">
                                  VISA APPLICATION <br>
                                  Local / International
                                </th>
                                <th width="6%" class="text-center">
                                  
                                </th>
                            </tr>
                        </thead>
                        <tbody id="employee-rate-table">
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

<script type="text/html" id="employee-rate-row-template">
    <tr>
        <td><span class="font-medium" data-content="employee_fullname"></span>
        <td class="text-center"><span data-content="philippine_daily_rate"></span>
            <br/><span class="text-muted" data-content="philippine_travel_rate"></span></td>
        <td class="text-center"><span data-content="asia_daily_rate"></span>
            <br/><span class="text-muted" data-content="asia_travel_rate"></span></td>
        <td class="text-center"><span data-content="south_america_daily_rate"></span>
            <br/><span class="text-muted" data-content="south_america_travel_rate"></span></td>
        <td class="text-center"><span data-content="africa_daily_rate"></span>
            <br/><span class="text-muted" data-content="africa_travel_rate"></span></td>
        <td class="text-center"><span data-content="europe_daily_rate"></span>
            <br/><span class="text-muted" data-content="europe_travel_rate"></span></td>
        <td class="text-center"><span data-content="meal_allowance"></span></td>
        <td class="text-center"><span data-content="visa_local_rate"></span>
            <br/><span class="text-muted" data-content="visa_international_rate"></span></td>
        <td class="text-center">
            <!-- <a title="Edit" class="btn btn-warning btn-outline btn-circle btn-sm m-r-5 btn-update" data-id="employee_id"><i class="ti-pencil-alt"></i></a> -->
        </td>
    </tr>
</script>

<script type="text/javascript" src="<?=base_url()?>asset/src/rate/view.js"></script>
