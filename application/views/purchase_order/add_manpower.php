<div class="container-fluid">
    <form method="POST" id="add_po_operation_details_form">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Add Manpower</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="col-lg-2 col-sm-4 col-xs-12 pull-right">
                    <input type="submit" name="" value="SUBMIT" class="btn btn-block btn-info btn-rounded">
                </div>
                <ol class="breadcrumb">
                    <li><a href="<?=base_url()?>purchaseorder/view">View Project</a></li>
                    <li class="active">Add Manpower</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <label>Select Employee</label>
                    <select name="employee_id" id="employee_id" class="form-control">
                    </select>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    <label>Set as PM</label>
                    <input type="checkbox" name="po_operations_set_as_pm" id="po_operations_set_as_pm" class="js-switch" value="checked" data-color="#f96262" data-size="medium" />
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Estimated Manpower Needed</label>
                    <input type="text" value="<?=$po->purchase_order_manpower;?>" id="purchase_order_manpower" name="purchase_order_manpower" class="form-control" disabled="" style="background: #f7fafc;">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Manpower Completion</label>
                    <div>
                        <input type="checkbox" name="purchase_order_manpower_completion" id="purchase_order_manpower_completion" <?php echo ($po->purchase_order_manpower_completion == 1) ? "checked" : ""; ?> class="js-switch" data-color="#f96262" data-size="medium" disabled />
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="white-box">
                    <h3 class="box-title m-b-0">OPERATIONS</h3>
                    <p class="text-muted m-b-30">Details</p>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <input type="checkbox" id="po_operations_accomodation" name="po_operations_accomodation" value="checked" class="others_checkbox" <?=($po->po_operations_accomodation == 1)? "checked": ""?> disabled="">
                                        <label for="po_operations_accomodation">Hotel / Accomodation</label>
                                    </div>
                                    <div style="display: none;" class="po_operations_accomodation">
                                        <div class="col-md-12 m-b-20">
                                            <label>Attach a file.</label>
                                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                <div class="form-control" data-trigger="fileinput"> 
                                                    <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span>
                                                </div> 
                                                <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                                <input type="file" name="po_operations_accomodation_file" id="po_operations_accomodation_file" autofocus> </span> 
                                                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <input type="checkbox" id="po_operations_transporation" name="po_operations_transporation" value="checked" class="others_checkbox" <?=($po->po_operations_transporation == 1)? "checked": ""?> disabled="">
                                        <label for="po_operations_transporation">Transportation</label>
                                    </div>
                                    <div style="display: none;" class="po_operations_transporation">
                                        <div class="col-md-12 m-b-20">
                                            <label>Attach a file.</label>
                                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                <div class="form-control" data-trigger="fileinput"> 
                                                    <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span>
                                                </div> 
                                                <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                                <input type="file" name="po_operations_transporation_file" id="po_operations_transporation_file"  autofocus> </span> 
                                                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <input type="checkbox" id="po_operations_airfares" name="po_operations_airfares" value="checked" class="others_checkbox" <?=($po->po_operations_airfares == 1)? "checked": ""?> disabled="">
                                        <label for="po_operations_airfares">Flight Tickets</label>
                                    </div>
                                    <div style="display: none;" class="po_operations_airfares">
                                        <div class="col-md-12 m-b-20">
                                            <label>Attach a file.</label>
                                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                <div class="form-control" data-trigger="fileinput"> 
                                                    <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span>
                                                </div> 
                                                <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                                <input type="file" name="po_operations_airfares_file" id="po_operations_airfares_file" autofocus> </span> 
                                                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <input type="checkbox" id="po_operations_wifi" name="po_operations_wifi" value="checked" class="others_checkbox" <?=($po->po_operations_wifi == 1)? "checked": ""?> disabled="">
                                        <label for="po_operations_wifi">WIFI</label>
                                    </div>
                                    <div style="display: none;" class="po_operations_wifi">
                                        <div class="col-md-12 m-b-20">
                                            <label>Attach a file.</label>
                                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                <div class="form-control" data-trigger="fileinput"> 
                                                    <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span>
                                                </div> 
                                                <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                                <input type="file" name="po_operations_wifi_file" id="po_operations_wifi_file" autofocus class="form-control-file"> </span> 
                                                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <input type="checkbox" id="po_operations_visa" name="po_operations_visa" value="checked" class="others_checkbox" <?=($po->po_operations_visa == 1)? "checked": ""?> disabled="">
                                        <label for="po_operations_visa">VISA</label>
                                    </div>
                                    <div style="display: none;" class="po_operations_visa">
                                        <div class="col-md-12 m-b-20">
                                            <label>Attach a file.</label>
                                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                <div class="form-control" data-trigger="fileinput"> 
                                                    <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span>
                                                </div> 
                                                <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                                <input type="file" name="po_operations_visa_file" id="po_operations_visa_file" autofocus> </span> 
                                                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <input type="checkbox" id="po_operations_bosh" name="po_operations_bosh" value="checked" class="others_checkbox" <?=($po->po_operations_bosh == 1)? "checked": ""?> disabled="">
                                        <label for="po_operations_bosh">BOSH</label>
                                    </div>
                                    <div style="display: none;" class="po_operations_bosh">
                                        <div class="col-md-12 m-b-20">
                                            <label>Attach a file.</label>
                                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                <div class="form-control" data-trigger="fileinput"> 
                                                    <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span>
                                                </div> 
                                                <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                                <input type="file" name="po_operations_bosh_file" id="po_operations_bosh_file" autofocus> </span> 
                                                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <input type="checkbox" id="po_operations_confined_spaces" name="po_operations_confined_spaces" value="checked" class="others_checkbox" <?=($po->po_operations_confined_spaces == 1)? "checked": ""?> disabled="">
                                        <label for="po_operations_confined_spaces">Confined Spaces</label>
                                    </div>
                                    <div style="display: none;" class="po_operations_confined_spaces">
                                        <div class="col-md-12 m-b-20">
                                            <label>Attach a file.</label>
                                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                <div class="form-control" data-trigger="fileinput"> 
                                                    <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span>
                                                </div> 
                                                <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                                <input type="file" name="po_operations_confined_spaces_file" id="po_operations_confined_spaces_file" autofocus> </span> 
                                                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <input type="checkbox" id="po_operations_work_at_heights" name="po_operations_work_at_heights" value="checked" class="others_checkbox" <?=($po->po_operations_work_at_heights == 1)? "checked": ""?> disabled="">
                                        <label for="po_operations_work_at_heights">Work at Heights</label>
                                    </div>
                                    <div style="display: none;" class="po_operations_work_at_heights">
                                        <div class="col-md-12 m-b-20">
                                            <label>Attach a file.</label>
                                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                <div class="form-control" data-trigger="fileinput"> 
                                                    <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span>
                                                </div> 
                                                <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                                <input type="file" name="po_operations_work_at_heights_file" id="po_operations_work_at_heights_file" autofocus> </span> 
                                                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <input type="checkbox" id="po_operations_work_permit" name="po_operations_work_permit" value="checked" class="others_checkbox" <?=($po->po_operations_work_permit == 1)? "checked": ""?> disabled="">
                                        <label for="po_operations_work_permit">Work Permit</label>
                                    </div>
                                    <div style="display: none;" class="po_operations_work_permit">
                                        <div class="col-md-12 m-b-20">
                                            <label>Attach a file.</label>
                                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                <div class="form-control" data-trigger="fileinput"> 
                                                    <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span>
                                                </div> 
                                                <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                                <input type="file" name="po_operations_work_permit_file" id="po_operations_work_permit_file" autofocus> </span> 
                                                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <input type="checkbox" id="po_operations_insurance_coverage" name="po_operations_insurance_coverage" value="checked" class="others_checkbox" <?=($po->po_operations_insurance_coverage == 1)? "checked": ""?> disabled="">
                                        <label for="po_operations_insurance_coverage">Insurance Coverage</label>
                                    </div>
                                    <div style="display: none;" class="po_operations_insurance_coverage">
                                        <div class="col-md-12 m-b-20">
                                            <label>Attach a file.</label>
                                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                <div class="form-control" data-trigger="fileinput"> 
                                                    <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span>
                                                </div> 
                                                <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                                <input type="file" name="po_operations_insurance_coverage_file" id="po_operations_insurance_coverage_file" autofocus> </span> 
                                                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <input type="checkbox" id="po_operations_site_safety_orientation" name="po_operations_site_safety_orientation" value="checked" class="others_checkbox" <?=($po->po_operations_site_safety_orientation == 1)? "checked": ""?> disabled="">
                                        <label for="po_operations_site_safety_orientation">Site Safety Orientation</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <input type="checkbox" id="po_operations_intel_license" name="po_operations_intel_license" value="checked" class="others_checkbox" <?=($po->po_operations_intel_license == 1)? "checked": ""?> disabled="">
                                        <label for="po_operations_intel_license">International License</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <input type="checkbox" id="po_operations_ppe" name="po_operations_ppe" value="checked" class="others_checkbox" <?=($po->po_operations_ppe == 1)? "checked": ""?> disabled="">
                                        <label for="po_operations_ppe">PPE</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="white-box">
                    <h3 class="box-title m-b-0">MEDICAL REQUIREMENTS</h3>
                    <p class="text-muted m-b-30">Details</p>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <input type="checkbox" id="po_operations_nbi" name="po_operations_nbi" value="checked" class="others_checkbox" <?=($po->po_operations_nbi == 1)? "checked": ""?> disabled="">
                                        <label for="po_operations_nbi">NBI Clearance</label>
                                    </div>
                                    <div style="display: none;" class="po_operations_nbi">
                                        <div class="col-md-12 m-b-20">
                                            <label>Attach a file.</label>
                                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                <div class="form-control" data-trigger="fileinput"> 
                                                    <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span>
                                                </div> 
                                                <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                                <input type="file" name="po_operations_nbi_file" id="po_operations_nbi_file" autofocus> </span> 
                                                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <input type="checkbox" id="po_operations_dfa" name="po_operations_dfa" value="checked" <?=($po->po_operations_dfa == 1)? "checked": ""?> class="others_checkbox" disabled="">
                                        <label for="po_operations_dfa">DFA Red Ribbon/Authentication</label>
                                    </div>
                                    <div style="display: none;" class="po_operations_dfa">
                                        <div class="col-md-12 m-b-20">
                                            <label>Attach a file.</label>
                                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                <div class="form-control" data-trigger="fileinput"> 
                                                    <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span>
                                                </div> 
                                                <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                                <input type="file" name="po_operations_dfa_file" id="po_operations_dfa_file" autofocus> </span> 
                                                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <input type="checkbox" id="po_operations_medical" name="po_operations_medical" value="checked" <?=($po->po_operations_medical == 1)? "checked": ""?> class="others_checkbox" disabled="">
                                        <label for="po_operations_medical">Medical</label>
                                    </div>
                                    <div style="display: none;" class="po_operations_medical">
                                        <div class="col-md-12 m-b-20">
                                            <label>Attach a file.</label>
                                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                <div class="form-control" data-trigger="fileinput"> 
                                                    <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span>
                                                </div> 
                                                <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                                <input type="file" name="po_operations_medical_file" id="po_operations_medical_file" autofocus> </span> 
                                                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <input type="checkbox" id="po_operations_drug_test" name="po_operations_drug_test" value="checked" <?=($po->po_operations_drug_test == 1)? "checked": ""?> class="others_checkbox" disabled="">
                                        <label for="po_operations_drug_test">Drug Test</label>
                                    </div>
                                    <div style="display: none;" class="po_operations_drug_test">
                                        <div class="col-md-12 m-b-20">
                                            <label>Attach a file.</label>
                                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                <div class="form-control" data-trigger="fileinput"> 
                                                    <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span>
                                                </div> 
                                                <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                                <input type="file" name="po_operations_drug_test_file" id="po_operations_drug_test_file" autofocus> </span> 
                                                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <input type="checkbox" id="po_operations_urinalysis" name="po_operations_urinalysis" value="checked" <?=($po->po_operations_urinalysis == 1)? "checked": ""?> class="others_checkbox" disabled="">
                                        <label for="po_operations_urinalysis">Urinalysis</label>
                                    </div>
                                    <div style="display: none;" class="po_operations_urinalysis">
                                        <div class="col-md-12 m-b-20">
                                            <label>Attach a file.</label>
                                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                <div class="form-control" data-trigger="fileinput"> 
                                                    <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span>
                                                </div> 
                                                <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                                <input type="file" name="po_operations_urinalysis_file" id="po_operations_urinalysis_file" autofocus> </span> 
                                                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <input type="checkbox" id="po_operations_xray" name="po_operations_xray" value="checked" <?=($po->po_operations_xray == 1)? "checked": ""?> class="others_checkbox" disabled="">
                                        <label for="po_operations_xray">Chest X-Ray</label>
                                    </div>
                                    <div style="display: none;" class="po_operations_xray">
                                        <div class="col-md-12 m-b-20">
                                            <label>Attach a file.</label>
                                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                <div class="form-control" data-trigger="fileinput"> 
                                                    <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span>
                                                </div> 
                                                <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                                <input type="file" name="po_operations_xray_file" id="po_operations_xray_file" autofocus> </span> 
                                                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <input type="checkbox" id="po_operations_fecalysis" name="po_operations_fecalysis" value="checked" <?=($po->po_operations_fecalysis == 1)? "checked": ""?> class="others_checkbox" disabled="">
                                        <label for="po_operations_fecalysis">Fecalysis</label>
                                    </div>
                                    <div style="display: none;" class="po_operations_fecalysis">
                                        <div class="col-md-12 m-b-20">
                                            <label>Attach a file.</label>
                                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                <div class="form-control" data-trigger="fileinput"> 
                                                    <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span>
                                                </div> 
                                                <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                                <input type="file" name="po_operations_fecalysis_file" id="po_operations_fecalysis_file" autofocus> </span> 
                                                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary m-b-20">
                                        <input type="checkbox" id="po_operations_ecg" name="po_operations_ecg" value="checked" <?=($po->po_operations_ecg == 1)? "checked": ""?> class="others_checkbox" disabled="">
                                        <label for="po_operations_ecg">ECG</label>
                                    </div>
                                    <div style="display: none;" class="po_operations_ecg">
                                        <div class="col-md-12 m-b-20">
                                            <label>Attach a file.</label>
                                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                <div class="form-control" data-trigger="fileinput"> 
                                                    <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span>
                                                </div> 
                                                <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                                <input type="file" name="po_operations_ecg_file" id="po_operations_ecg_file" autofocus> </span> 
                                                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
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

        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <div>
                        <div class="pull-right">
                            <input type="text" id="search" placeholder="Search list" class="form-control">
                        </div>
                        <h3>List of All Added Technicians</h3> 
                    </div>
                    <div class="table-responsive m-t-30">
                        <table class="table color-table inverse-table table-striped">
                            <thead>
                                <tr>
                                    <th title="TECHNICIAN NAME">NAME</th>
                                    <th title="PROJECT MANAGER">PM</th>
                                    <th title="ACCOMODATION FILE">ACC. FILE</th>
                                    <th title="TRANSPORTATION FILE">TRA. FILE</th>
                                    <th title="AIR FARE FILE">AIR. FILE</th>
                                    <th title="WIFI FILE">WIF. FILE</th>
                                    <th title="VISA FILE">VIS. FILE</th>
                                    <th title="BOSH FILE">BOS. FILE</th>
                                    <th title="CONFINED SPACES FILE">CON. FILE</th>
                                    <th title="WORK AT HEIGHTS FILE">WOR. FILE</th>
                                    <th title="WORK PERMIT">PER. FILE</th>
                                    <th title="INSURANCE COVERAGE">INS. FILE</th>
                                    <th title="NBI CLEARANCE FILE">NBI. FILE</th>
                                    <th title="DFA RED RIBBON/AUTHENTICATION">DFA. FILE</th>
                                    <th title="MEDICAL FILE">MED. FILE</th>
                                    <th title="DRUG TEST FILE">DRU. FILE</th>
                                    <th title="URINALIYSIS FILE">URI. FILE</th>
                                    <th title="XRAY FILE">XRA. FILE</th>
                                    <th title="FECALYSIS FILE">FEC. FILE</th>
                                    <th title="ECG FILE">ECG. FILE</th>
                                    <th title=""></th>
                                </tr>
                            </thead>
                            <tbody id="technician-lists">
                                <tr>
                                    <td class="text-center" colspan="22">No records found.</td>
                                </tr>
                            </tbody>
                        </table>
                        <div id="pagination" class="pull-right">
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script type="text/html" id="technician-list-row-template">
    <tr>
        <td><span class="font-medium" data-content="technician_name"></span></td>
        <td style="text-align:center;"><span class="text-medium" data-content="po_operations_set_as_pm"></span></td>
        <td style="text-align:center;"><span class="text-medium" data-content="po_operations_accomodation_file"></span></td>
        <td style="text-align:center;"><span class="font-medium" data-content="po_operations_transporation_file"></span></td>
        <td style="text-align:center;"><span class="font-medium" data-content="po_operations_airfares_file"></span></td>
        <td style="text-align:center;"><span class="font-medium" data-content="po_operations_wifi_file"></span></td>
        <td style="text-align:center;"><span class="font-medium" data-content="po_operations_visa_file"></span></td>
        <td style="text-align:center;"><span class="font-medium" data-content="po_operations_bosh_file"></span></td>
        <td style="text-align:center;"><span class="font-medium" data-content="po_operations_confined_spaces_file"></span></td>
        <td style="text-align:center;"><span class="font-medium" data-content="po_operations_work_at_heights_file"></span></td>
        <td style="text-align:center;"><span class="font-medium" data-content="po_operations_work_permit_file"></span></td>
        <td style="text-align:center;"><span class="font-medium" data-content="po_operations_insurance_coverage_file"></span></td>
        <td style="text-align:center;"><span class="text-medium" data-content="po_operations_nbi_file"></span></td>
        <td style="text-align:center;"><span class="font-medium" data-content="po_operations_dfa_file"></span></td>
        <td style="text-align:center;"><span class="text-medium" data-content="po_operations_medical_file"></span></td>
        <td style="text-align:center;"><span class="text-medium" data-content="po_operations_drug_test_file"></span></td>
        <td style="text-align:center;"><span class="text-medium" data-content="po_operations_urinalysis_file"></span></td>
        <td style="text-align:center;"><span class="text-medium" data-content="po_operations_xray_file"></span></td>
        <td style="text-align:center;"><span class="text-medium" data-content="po_operations_fecalysis_file"></span></td>
        <td style="text-align:center;"><span class="text-medium" data-content="po_operations_ecg_file"></span></td>
        <td>
            <a title="Delete" class="btn btn-danger btn-sm m-r-5 btn-delete" data-id="po_operations_details_id" data-template-bind='[{"attribute" : "data-ref", "value": "technician_name"}]'><i class="fa fa-trash"></i></a>
        </td>
    </tr>
</script>

<!-- Date Picker Plugin JavaScript -->
<script src="<?=base_url()?>asset/components/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<!-- Clock Plugin JavaScript -->
<script src="<?=base_url()?>asset/components/plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.js"></script>
<script src="<?=base_url()?>asset/components/plugins/bower_components/switchery/dist/switchery.min.js"></script>
<script src="<?=base_url()?>asset/src/purchase_order/add_manpower.js"></script>

<script type="text/html" id="employee-row-template">
  <option data-value="employee_id" data-content="employee_details"></option>
</script>
