<div class="container-fluid">
    <form method="POST" id="edit_purchase_order_form">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Edit Project</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="col-lg-2 col-sm-4 col-xs-12 pull-right">
                    <input type="submit" name="" value="SUBMIT" class="btn btn-block btn-info btn-rounded">
                </div>
                <ol class="breadcrumb">
                    <li><a href="<?=base_url()?>purchaseorder/view">View Project</a></li>
                    <li class="active">Edit</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="white-box">
                    <h3 class="box-title m-b-0">TECHNICAL/WAREHOUSE</h3>
                    <p class="text-muted m-b-30 font-13">Details</p>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Project Name</label>
                                    <input type="text" id="purchase_order_name" name="purchase_order_name" class="form-control" placeholder="Project Name" value="<?=$po->purchase_order_name;?>"> 
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Origin of Equipment</label>
                                    <input type="text" id="purchase_order_equipment_origin" name="purchase_order_equipment_origin" class="form-control" placeholder="Origin of Equipment" value="<?=$po->purchase_order_equipment_origin;?>"> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>No. of Manpower</label>
                                    <input type="text" id="purchase_order_manpower" name="purchase_order_manpower" class="form-control" placeholder="0" value="<?=$po->purchase_order_manpower;?>"> 
                                    <input type="hidden" id="purchase_order_manpower_db" name="purchase_order_manpower_db" class="form-control" placeholder="0" value="<?=$po->purchase_order_manpower;?>"> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Departure Date</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker-autoclose" id="purchase_order_deployment_schedule" name="purchase_order_deployment_schedule" placeholder="yyyy-mm-dd" autocomplete="off"  value="<?=$po->purchase_order_deployment_schedule;?>"> <span class="input-group-addon"><i class="icon-calender"></i></span> 
                                    </div> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker-autoclose" id="purchase_order_start_date" name="purchase_order_start_date" placeholder="yyyy-mm-dd" autocomplete="off" value="<?=$po->purchase_order_start_date;?>"> <span class="input-group-addon"><i class="icon-calender"></i></span> 
                                    </div> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>End Date</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker-autoclose" id="purchase_order_end_date" name="purchase_order_end_date" placeholder="yyyy-mm-dd" autocomplete="off" value="<?=$po->purchase_order_end_date;?>"> <span class="input-group-addon"><i class="icon-calender"></i></span> 
                                    </div> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Job / Scope</label>
                                    <textarea class="form-control" rows="3" id="purchase_order_scope" name="purchase_order_scope" class="form-control"><?=$po->purchase_order_scope;?></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Equipment Description</label>
                                    <textarea class="form-control" rows="3" id="purchase_order_equipment_description" name="purchase_order_equipment_description" class="form-control"><?=$po->purchase_order_equipment_description;?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="white-box" style="min-height: 524px;">
                    <h3 class="box-title m-b-0">ACCOUNTING</h3>
                    <p class="text-muted m-b-30">Details</p>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Purchase Order #</label>
                                    <input type="text" id="purchase_order_number" name="purchase_order_number" class="form-control" placeholder="Purchase Order Number" value="<?=$po->purchase_order_number;?>"> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Purchase Order Date</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker-autoclose" id="purchase_order_date" name="purchase_order_date" placeholder="yyyy-mm-dd" autocomplete="off" value="<?=$po->purchase_order_date;?>"> <span class="input-group-addon"><i class="icon-calender"></i></span> 
                                    </div> 
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Terms of Payment</label>
                                    <input type="text" id="purchase_order_terms" name="purchase_order_terms" class="form-control" placeholder="Terms of Payment" value="<?=$po->purchase_order_terms;?>"> 
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Currency</label>
                                    <select id="purchase_order_currency" name="purchase_order_currency" class="form-control">
                                        <?php $currency = array("PHP", "USD", "EURO");
                                            foreach($currency as $cur){?>
                                            <option value="<?=$cur;?>" <?php echo ($po->purchase_order_currency == $cur) ? "selected" : ""; ?>><?=$cur;?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Amount</label>
                                    <input type="text" id="purchase_order_amount" name="purchase_order_amount" class="form-control" placeholder="0.00" value="<?=$po->purchase_order_amount;?>"> 
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Vat Amount</label>
                                    <input type="text" id="purchase_order_vat_amount" name="purchase_order_vat_amount" class="form-control" placeholder="0.00" value="<?=$po->purchase_order_vat_amount;?>"> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Net Amount</label>
                                    <input type="text" id="purchase_order_net_amount" name="purchase_order_net_amount" class="form-control" placeholder="0.00" value="<?=$po->purchase_order_net_amount;?>"> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Total Site Time (In Days)</label>
                                    <input type="text" id="purchase_order_total_site_time" name="purchase_order_total_site_time" class="form-control" placeholder="0" value="<?=$po->purchase_order_total_site_time;?>"> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Extra Day Rate</label>
                                    <input type="text" id="purchase_order_extra_day_rate" name="purchase_order_extra_day_rate" class="form-control" placeholder="0" value="<?=$po->purchase_order_extra_day_rate;?>"> 
                                </div><br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="white-box">
                    <h3 class="box-title m-b-0">CLIENT INFORMATION</h3>
                    <p class="text-muted m-b-30">Details</p>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Client Name</label>
                                    <input type="hidden" id="external_client_id" name="external_client_id" class="form-control"  value="<?=$po->external_client_id;?>">
                                    <input type="text" id="external_client_name" name="external_client_name" class="form-control" placeholder="Client Name" value="<?=$po->external_client_name;?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Client Address</label>
                                    <textarea class="form-control" rows="3" id="external_client_address" name="external_client_address" class="form-control"><?=$po->external_client_address;?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Site Address</label>
                                    <textarea class="form-control" rows="4" id="external_client_site_address" name="external_client_site_address" class="form-control"><?=$po->external_client_site_address;?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Contact Person</label>
                                    <input type="text" id="external_client_contact_person" name="external_client_contact_person" class="form-control" placeholder="Contact Person" value="<?=$po->external_client_contact_person;?>"> 
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="email" id="external_client_email_address" name="external_client_email_address" class="form-control" placeholder="abc@123.com" value="<?=$po->external_client_email_address;?>"> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Contact Number</label>
                                    <input type="text" id="external_client_contact_number" name="external_client_contact_number" class="form-control" placeholder="341-3826" value="<?=$po->external_client_contact_number;?>"> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>TIN Number</label>
                                    <input type="text" id="external_client_tin_number" name="external_client_tin_number" class="form-control" placeholder="33483****" value="<?=$po->external_client_tin_number;?>"> 
                                </div>
                                <br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="white-box">
                    <h3 class="box-title m-b-0">OPERATIONS</h3>
                    <p class="text-muted m-b-30">Details</p>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <input type="checkbox" id="po_operations_accomodation" name="po_operations_accomodation" <?=($po->po_operations_accomodation == 1)? "checked": ""?> value="checked">
                                        <label for="po_operations_accomodation">Hotel / Accomodation</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <input type="checkbox" id="po_operations_transporation" name="po_operations_transporation" <?=($po->po_operations_transporation == 1)? "checked": ""?> value="checked">
                                        <label for="po_operations_transporation">Transportation</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <input type="checkbox" id="po_operations_airfares" name="po_operations_airfares" <?=($po->po_operations_airfares == 1)? "checked": ""?> value="checked">
                                        <label for="po_operations_airfares">Flight Tickets</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <input type="checkbox" id="po_operations_wifi" name="po_operations_wifi" <?=($po->po_operations_wifi == 1)? "checked": ""?> value="checked">
                                        <label for="po_operations_wifi">WIFI</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <input type="checkbox" id="po_operations_intel_license" name="po_operations_intel_license" <?=($po->po_operations_intel_license == 1)? "checked": ""?> value="checked">
                                        <label for="po_operations_intel_license">International License</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <input type="checkbox" id="po_operations_ppe" name="po_operations_ppe" <?=($po->po_operations_ppe == 1)? "checked": ""?> value="checked">
                                        <label for="po_operations_ppe">PPE</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <input type="checkbox" id="po_operations_visa" name="po_operations_visa" <?=($po->po_operations_visa == 1)? "checked": ""?> value="checked">
                                        <label for="po_operations_visa">VISA</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <input type="checkbox" id="po_operations_bosh" name="po_operations_bosh" <?=($po->po_operations_bosh == 1)? "checked": ""?> value="checked">
                                        <label for="po_operations_bosh">BOSH</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <input type="checkbox" id="po_operations_confined_spaces" name="po_operations_confined_spaces" <?=($po->po_operations_confined_spaces == 1)? "checked": ""?> value="checked">
                                        <label for="po_operations_confined_spaces">Confined Spaces</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <input type="checkbox" id="po_operations_work_at_heights" name="po_operations_work_at_heights" <?=($po->po_operations_work_at_heights == 1)? "checked": ""?> value="checked">
                                        <label for="po_operations_work_at_heights">Work at Heights</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <input type="checkbox" id="po_operations_site_safety_orientation" name="po_operations_site_safety_orientation" <?=($po->po_operations_site_safety_orientation == 1)? "checked": "";?> value="checked">
                                        <label for="po_operations_site_safety_orientation">Safety Orientation</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <input type="checkbox" id="po_operations_work_permit" name="po_operations_work_permit" <?=($po->po_operations_work_permit == 1)? "checked": "";?> value="checked">
                                        <label for="po_operations_work_permit">Work Permit</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <input type="checkbox" id="po_operations_insurance_coverage" name="po_operations_insurance_coverage" <?=($po->po_operations_insurance_coverage == 1)? "checked": "";?> value="checked">
                                        <label for="po_operations_insurance_coverage">Insurance Coverage</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <h3 class="box-title m-b-0">MEDICAL REQUIREMENTS</h3>
                                        <p class="text-muted m-b-30">Details</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <input type="checkbox" id="po_operations_nbi" name="po_operations_nbi" <?=($po->po_operations_nbi == 1)? "checked": ""?> value="checked">
                                        <label for="po_operations_nbi">NBI Clearance</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <input type="checkbox" id="po_operations_dfa" name="po_operations_dfa" <?=($po->po_operations_dfa == 1)? "checked": ""?> value="checked">
                                        <label for="po_operations_dfa">DFA Red Ribbon/Authentication</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <input type="checkbox" id="po_operations_medical" name="po_operations_medical" <?=($po->po_operations_medical == 1)? "checked": ""?> value="checked">
                                        <label for="po_operations_medical">Medical</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <input type="checkbox" id="po_operations_drug_test" name="po_operations_drug_test" <?=($po->po_operations_drug_test == 1)? "checked": ""?> value="checked">
                                        <label for="po_operations_drug_test">Drug Test</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <input type="checkbox" id="po_operations_urinalysis" name="po_operations_urinalysis" <?=($po->po_operations_urinalysis == 1)? "checked": ""?> value="checked">
                                        <label for="po_operations_urinalysis">Urinalysis</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <input type="checkbox" id="po_operations_xray" name="po_operations_xray" <?=($po->po_operations_xray == 1)? "checked": ""?> value="checked">
                                        <label for="po_operations_xray">Chest X-Ray</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <input type="checkbox" id="po_operations_fecalysis" name="po_operations_fecalysis" <?=($po->po_operations_fecalysis == 1)? "checked": ""?> value="checked">
                                        <label for="po_operations_fecalysis">Fecalysis</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <input type="checkbox" id="po_operations_ecg" name="po_operations_ecg" <?=($po->po_operations_ecg == 1)? "checked": ""?> value="checked">
                                        <label for="po_operations_ecg">ECG</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="white-box">
                    <h3 class="box-title m-b-0">ADDITIONALS</h3>
                    <p class="text-muted m-b-30 font-13">Details</p>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Additional Notes/Remarks</label>
                                    <textarea class="form-control" rows="3" id="purchase_order_remarks" name="purchase_order_remarks" class="form-control"><?=$po->purchase_order_remarks;?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="white-box">
                    <h3 class="box-title m-b-0">SET REMINDER</h3>
                    <p class="text-muted m-b-30 font-13">Details</p>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="radio radio-success">
                                    <input type="radio" name="radio" id="radio1" value="1" style="font-size:30px;" <?php echo ($po->purchase_order_reminder_date != null ) ? "checked" : "";?> >
                                    <label for="radio1"> MANUALLY ADD A DATE REMINDER </label>
                                </div>

                                <div id="manual">
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker-autoclose" id="purchase_order_reminder_date" name="purchase_order_reminder_date" placeholder="yyyy-mm-dd" autocomplete="off" value="<?php echo ($po->purchase_order_reminder_date != null ) ? $po->purchase_order_reminder_date : "";?>"> <span class="input-group-addon"><i class="icon-calender"></i></span> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="radio radio-success">
                                    <input type="radio" name="radio" id="radio2" value="2" style="font-size:30px;" <?php echo ($po->purchase_order_reminder_month != null ) ? "checked" : "";?>>
                                    <label for="radio2"> SELECT REMINDER BY MONTH </label>
                                </div>
                                <div id="monthly">
                                    <select id="purchase_order_reminder_month" name="purchase_order_reminder_month" class="form-control">
                                        <?php $reminder = array("1 MONTH", "2 MONTHS", "3 MONTHS", "4 MONTHS", "5 MONTHS", "6 MONTHS", "7 MONTHS", "8 MONTHS", "9 MONTHS", "10 MONTHS", "11 MONTHS", "12 MONTHS");
                                            foreach($reminder as $key => $value){
                                        ?>
                                        <option value="<?=$key+1;?>" <?php echo ($po->purchase_order_reminder_month == ($key+1) ) ? "selected" : "";?>><?=$value;?></option>
                                        <?php }?>
                                    </select>
                                    <br><br>
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
<!-- Sweetalert Plugin JavaScript -->
<script src="<?=base_url()?>asset/components/js/sweetalert.min.js"></script>

<script src="<?=base_url()?>asset/components/plugins/bower_components/switchery/dist/switchery.min.js"></script>
<script src="<?=base_url()?>asset/src/purchase_order/edit.js"></script>
