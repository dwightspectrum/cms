<div class="container-fluid">
    <form method="POST" id="travel-history-form">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Travel History</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb m-t-10">
                    <li><a href="<?=base_url()?>employee/view">Employee</a></li>
                    <li><a href="<?=base_url()?>employee/profile/<?=$employee_id?>">Profile</a></li>
                    <li class="active">Travel History</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="white-box">
                    <h3 class="box-title m-b-0">Travel History</h3>
                    <p class="text-muted m-b-30 font-13">Travel history data</p>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Countries</label>
                                    <textarea type="text" id="employee_travel_history_country" name="employee_travel_history_country" class="form-control" placeholder="Enter countries travelled" rows="3"> </textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Date Entered</label>
                                    <input type="text" class="form-control datepicker-autoclose" id="employee_travel_history_date_enter" name="employee_travel_history_date_enter" placeholder="yyyy-mm-dd" required="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Date Exited</label>
                                    <input type="text" class="form-control datepicker-autoclose" id="employee_travel_history_date_exit" name="employee_travel_history_date_exit" placeholder="yyyy-mm-dd" required="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input type="submit" name="add-travel-history" value="SAVE" class="btn btn-block btn-info btn-rounded">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="white-box">
                    <div class="pull-right">
                        <input type="text" id="search" placeholder="Search list" class="form-control">
                        <br>
                    </div>
                    <h3 class="box-title m-b-0">List</h3>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table color-table inverse-table">
                                    <thead>
                                        <th>COUNTRIES</th>
                                        <th>DATE ENTERED</th>
                                        <th>DATE EXITED</th>  
                                        <th></th> 
                                    </thead>
                                    <tbody id='travel_history_table'>
                                        <tr>
                                          <td align="center" colspan="4">No records found.</td>
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
        </div>
    </form>
</div>

<script type="text/html" id="travel-history-data-template">
    <tr>    
        <td data-content='employee_travel_history_country'></td>
        <td data-content='employee_travel_history_date_enter'></td>
        <td data-content='employee_travel_history_date_exit'></td>
        <td>
            <a title="Delete" class="btn btn-danger btn-sm m-r-5 btn-delete" data-id="employee_travel_history_id" data-template-bind='[{"attribute" : "data-ref", "value": "employee_travel_history_country"}]'><i class="fa fa-trash"></i></a>
        </td>
    </tr> 
</script>

<!-- Date Picker Plugin JavaScript -->
<script src="<?=base_url()?>asset/components/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>asset/src/employee/travel_history.js"></script>