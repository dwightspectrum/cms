<div class="container-fluid">
    <form method="POST" id="edit_invoice_form">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Edit Invoice</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="col-lg-2 col-sm-4 col-xs-6 pull-right">
                    <a id="submit-invoice" class="btn btn-block btn-danger btn-rounded">SUBMIT</a>
                </div>
                <div class="col-lg-2 col-sm-4 col-xs-6 pull-right">
                    <a id="preview-invoice" class="btn btn-block btn-info btn-rounded btn-outline">PREVIEW</a>
                </div>
                <ol class="breadcrumb m-t-10">
                    <li><a href="<?=base_url()?>invoice/view">Invoices</a></li>
                    <li class="active">Form</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-5">
                <div class="white-box">
                    <h3 class="box-title m-b-30">Project Invoice Form</h3>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Employee</label>
                                    <input type="text" name="" disabled="" class="form-control" value="<?=$employee->employee_first_name.' '.$employee->employee_last_name?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Client</label>
                                    <select name="client_id" id="client_id" class="form-control">
                                        <?php foreach ($clients as $client) {?>
                                            <option value="<?=$client->client_id;?>" <?=($invoice['client_id'] == $client->client_id)? "selected" : "" ?>><?=$client->client_name;?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Project</label>
                                    <select name="project_id" id="project_id" class="form-control">
                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Project Scope</label>
                                    <input type="text" name="project_scope" placeholder="Project Scope" class="form-control" required="" value="<?=$invoice['project_scope']?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="white-box">
                    <h3 class="box-title m-b-30">Others</h3>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>For Refund (Optional)</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">₱</span>
                                        <input type="number" step="0.01" name="for_refund" placeholder="For Refund (Optional)" value="<?=$invoice['for_refund']?>" class="form-control"> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if($employee->employee_is_regular == 0){ ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <input type="checkbox" id="with_travelling_rate" name="with_travelling_rate" class="others_checkbox" <?=($invoice['with_travelling_rate'] == 1)? "checked": ""?>>
                                        <label for="with_travelling_rate">With Travelling Rate</label>
                                    </div>
                                    <div style="display: <?=($invoice['with_travelling_rate'] == 1)? "block": "none"?>;" class="with_travelling_rate">
                                        <div class="col-md-4 m-b-20">
                                            <label>Number of Days</label>
                                            <input type="number" name="travelling_days" value="<?=$invoice['travelling_rate_days']?>" class="form-control" required="" placeholder="Travelling Rate Days">
                                        </div>
                                        <div class="col-md-8 m-b-20">
                                            <label>Dates</label>
                                            <input type="text" name="travelling_start_date" class="form-control" required="" placeholder="Dates (Ex. August 14, 2018 / August 16, 2019-August 19, 2019)" value="<?=$invoice['travelling_rate_dates']?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <input type="checkbox" id="with_project_leader_rate" name="with_project_leader_rate" class="others_checkbox" <?=($invoice['with_project_leader_rate'] == 1)? "checked": ""?>>
                                        <label for="with_project_leader_rate">With Project Leader Rate</label>
                                    </div>
                                    <div style="display: <?=($invoice['with_project_leader_rate'] == 1)? "block": "none"?>;" class="with_project_leader_rate">
                                        <div class="col-md-12 m-b-20">
                                            <div class="radio radio-primary">
                                                <input type="radio" name="pl_is_local" id="pl_is_local_1" value="1" <?=($invoice['pl_is_local'] == 1)? "checked":""?>>
                                                <label for="pl_is_local_1"> Local </label>
                                            </div>
                                            <div class="radio radio-primary">
                                                <input type="radio" name="pl_is_local" id="pl_is_local_0" value="0" <?=($invoice['pl_is_local'] == 0)? "checked":""?>>
                                                <label for="pl_is_local_0"> International </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 m-b-20">
                                            <label>Number of Days</label>
                                            <input type="number" name="project_leader_days" value="<?=$invoice['project_leader_rate_days']?>" class="form-control" required="" placeholder="Project Leader Rate Days">
                                        </div>
                                        <div class="col-md-9 m-b-20">
                                            <label>Dates</label>
                                            <input type="text" name="project_leader_start_date" class="form-control" required="" placeholder="Dates (Ex. August 14, 2018 / August 16, 2019-August 19, 2019)" value="<?=$invoice['project_leader_rate_dates']?>" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <input type="checkbox" id="with_meal_allowance" name="with_meal_allowance" class="others_checkbox" <?=($invoice['with_meal_allowance'] == 1)? "checked": ""?>>
                                        <label for="with_meal_allowance">With Meal Allowance</label>
                                    </div>
                                    <?php if($employee->employee_is_regular == 0){ ?>
                                    <div style="display: <?=($invoice['with_meal_allowance'] == 1)? "block": "none"?>;" class="with_meal_allowance">
                                        <div class="col-md-6 m-b-20">
                                            <label>Number of Days</label>
                                            <input type="number" name="meal_allowance_days" value="<?=$invoice['meal_allowance_days']?>" class="form-control" required="" placeholder="Meal Allowance Rate Days">
                                        </div>
                                        <div class="col-md-6 m-b-20">
                                            <label>Dates</label>
                                            <input type="text" name="meal_allowance_start_date" class="form-control" required="" placeholder="Dates (Ex. August 14, 2018 / August 16, 2019-August 19, 2019)" value="<?=$invoice['meal_allowance_dates']?>">
                                        </div>
                                    </div>
                                    <?php }else{ ?>
                                    <div style="display: <?=($invoice['with_meal_allowance'] == 1)? "block": "none"?>;" class="with_meal_allowance">
                                        <div class="col-md-3 m-b-20">
                                            <label>Number of Days</label>
                                            <input type="number" name="meal_allowance_days" value="<?=$invoice['meal_allowance_days']?>" class="form-control" required="" placeholder="Meal Allowance Rate Days">
                                        </div>
                                        <div class="col-md-9 m-b-20">
                                            <label>Dates</label>
                                            <input type="text" name="meal_allowance_start_date" class="form-control" required="" placeholder="Dates (Ex. August 14, 2018 / August 16, 2019-August 19, 2019)" value="<?=$invoice['meal_allowance_dates']?>">
                                        </div>
                                        <div class="col-md-3 m-b-20">
                                            <label>Currency</label>
                                            <input type="text" name="meal_allowance_currency" value="<?=$invoice['meal_allowance_currency']?>" class="form-control" required="" placeholder="Meal Allowance Rate Days">
                                        </div>
                                        <div class="col-md-9 m-b-20">
                                            <label>Value in PHP (note* If currency is PHP, just input 1.)</label>
                                            <input type="number" step="0.01" name="meal_allowance_php_value" class="form-control" required="" placeholder="PHP value" value="<?=$invoice['meal_allowance_php_value']?>">
                                        </div>
                                        <div class="col-md-12 m-b-20">
                                            <label>Meal Rate / day</label>
                                            <input type="number" step="0.01" name="meal_allowance_rate" class="form-control" required="" placeholder="Meal Rate / day" value="<?=$invoice['meal_allowance_rate']?>">
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <input type="checkbox" id="with_visa_application" name="with_visa_application" class="others_checkbox" <?=($invoice['with_visa_application'] == 1)? "checked": ""?>>
                                        <label for="with_visa_application">With VISA Application</label>
                                    </div>
                                    <div style="display: <?=($invoice['with_visa_application'] == 1)? "block": "none"?>;" class="with_visa_application">
                                        <div class="col-md-12 m-b-20">
                                            <div class="radio radio-primary">
                                                <input type="radio" name="visa_application_is_local" id="visa_application_is_local_1" value="1" <?=($invoice['visa_application_is_local'] == 1)? "checked":""?>>
                                                <label for="visa_application_is_local_1"> Local </label>
                                            </div>
                                            <div class="radio radio-primary">
                                                <input type="radio" name="visa_application_is_local" id="visa_application_is_local_0" value="0" <?=($invoice['visa_application_is_local'] == 0)? "checked":""?>>
                                                <label for="visa_application_is_local_0"> International </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 m-b-20">
                                            <label>Number of Days</label>
                                            <input type="number" name="visa_days" value="<?=$invoice['visa_application_days']?>" class="form-control" required="" placeholder="Visa Application Rate Days">
                                        </div>
                                        <div class="col-md-9 m-b-20">
                                            <label>Dates</label>
                                            <input type="text" name="visa_start_date" class="form-control datepicker" required="" placeholder="Dates (Ex. August 14, 2018 / August 16, 2019-August 19, 2019)"  value="<?=$invoice['visa_application_dates']?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="white-box">
                    <h3 class="box-title m-b-30">Daily Rate</h3>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Number of Days</label>
                                    <input type="number" name="daily_rate_days" id="daily_rate_days" value="<?=$invoice['daily_rate_days']?>" class="form-control" required="" placeholder="Daily Rate Days">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Dates</label>
                                    <input type="text" name="daily_rate_dates" class="form-control" required="" placeholder="Dates (Ex. August 14, 2018 / August 16, 2019-August 19, 2019)" value="<?=$invoice['daily_rate_dates']?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="white-box">
                    <div class="pull-right">
                        <a id="add-project-dates" class="btn btn-success"> <span class="fa fa-plus"> </span></a>
                    </div>
                    <h3 class="box-title m-b-30">Project Dates</h3>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker-autoclose" id="project_start_date" name="project_start_date" placeholder="yyyy-mm-dd" required=""> <span class="input-group-addon"><i class="icon-calender"></i></span> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>End Date</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker-autoclose" id="project_end_date" name="project_end_date" placeholder="yyyy-mm-dd" required=""> <span class="input-group-addon"><i class="icon-calender"></i></span> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <br>
                                    <div class="form-body">
                                        <table id="project-dates" class="table color-table inverse-table">
                                            <thead>
                                                <th width="40%">Start Date</th>
                                                <th width="40%">End Date</th>  
                                                <th></th> 
                                            </thead>
                                            <tbody id='project-dates-table'>
                                                <tr>
                                                  <td align="center" colspan="5">No records found.</td>
                                                </tr>
                                            </tbody> 
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="white-box">
                    <div class="pull-right">
                        <a id="add-advances" class="btn btn-success"> <span class="fa fa-plus"> </span></a>
                    </div>
                    <h3 class="box-title m-b-30">Advances</h3>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>CV#</label>
                                    <input type="text" id="advance_cv" name="advance_cv" placeholder="CV Number" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker-autoclose" id="advance_date" name="advance_date" placeholder="yyyy-mm-dd" required=""> <span class="input-group-addon"><i class="icon-calender"></i></span> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Currency</label>
                                    <select class="form-control" id="advance_currency" name="advance_currency" disabled="">
                                        <option>PHP</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Amount</label>
                                    <input type="number" step="0.01" id="advance_amount" name="advance_amount" placeholder="Amount" class="form-control">   
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <br>
                                    <div class="form-body">
                                        <table id="advances" class="table color-table inverse-table">
                                            <thead>
                                                <th width="20%">CV#</th>
                                                <th width="20%">Date</th> 
                                                <th width="25%">Currency</th> 
                                                <th width="25%">Amount</th> 
                                                <th></th> 
                                            </thead>
                                            <tbody id='advances-table'>
                                                <tr>
                                                  <td align="center" colspan="5">No records found.</td>
                                                </tr>
                                            </tbody> 
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script type="text/html" id="employee-select-template">
    <option data-value="employee_id" data-content="employee_fullname"></option>
</script>

<script type="text/html" id="advances-select-template">
    <tr>
        <td data-content="advance_cv"></td>
        <td data-content="advance_date"></td>
        <td data-content="advance_currency"></td>
        <td data-content="advance_amount"></td>
        <td data-content="actions"></td>
    </tr>
</script>

<script type="text/html" id="project-dates-template">
    <tr>
        <td data-content="project_start_date"></td>
        <td data-content="project_end_date"></td>
        <td data-content="actions"></td>
    </tr>
</script>

<script type="text/html" id="project-row-template">
  <option data-value="project_id" data-content="project_name"></option>
</script>

<script src="<?=base_url()?>asset/components/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>asset/src/invoice/edit.js"></script>