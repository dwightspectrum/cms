<div class="container-fluid">
    <form method="POST" id="employee_form">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Add Employee</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="col-lg-2 col-sm-4 col-xs-12 pull-right">
                    <input type="submit" name="" value="SUBMIT" class="btn btn-block btn-info btn-rounded">
                </div>
                <ol class="breadcrumb">
                    <li><a href="<?=base_url()?>employee/view">Employee</a></li>
                    <li class="active">Add</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="white-box">
                    <h3 class="box-title m-b-0">Personal Details</h3>
                    <p class="text-muted m-b-30 font-13">Personal details</p>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label>Upload Photo<br><span class="text-muted" style="font-size:11px">PLEASE UPLOAD A CLEAR LATEST PHOTO OF YOURSELF: (Does not need to be Professional – but at least clear and on white background)</span></label>
                                    <div>
                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                            <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                            <input type="file" name="picture" id="picture" required="" autofocus> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Company</label>
                                    <div>
                                        <select class="form-control" id="company_id" name="company_id">
                                            <?php foreach($companies as $company){?>
                                            <option value="<?=$company->company_id?>"><?=$company->company_name?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Firstname</label>
                                    <input type="text" id="employee_first_name" name="employee_first_name" class="form-control" placeholder="Firstname" required=""> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Middlename</label>
                                    <input type="text" id="employee_middle_name" name="employee_middle_name" class="form-control" placeholder="Middlename" required=""> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Lastname</label>
                                    <input type="text" id="employee_last_name" name="employee_last_name" class="form-control" placeholder="Lastname" required=""> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Birthday</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker-autoclose" id="employee_birthdate" name="employee_birthdate" placeholder="yyyy-mm-dd" required=""> <span class="input-group-addon"><i class="icon-calender"></i></span> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Mobile Number</label>
                                    <input type="text" id="employee_mobile_number" name="employee_mobile_number" class="form-control" placeholder="Mobile Number" required=""> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Landline Number</label>
                                    <input type="text" id="employee_landline_number" name="employee_landline_number" class="form-control" placeholder="Landline Number" required=""> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Place of Birth</label>
                                    <input type="text" id="employee_birthplace" name="employee_birthplace" class="form-control" placeholder="Place of Birth" required=""> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select class="form-control" id="employee_gender" name="employee_gender">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Civil Status</label>
                                    <select name="employee_civil_status" id="employee_civil_status" class="form-control" required="">
                                      <?php $status = array("Single", "Married", "Widowed", "Separated", "Divorced"); 
                                        foreach($status as $value){?>
                                          <option value="<?=$value;?>"><?=$value;?></option>
                                      <?php }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Religion</label>
                                    <input type="text" id="employee_religion" name="employee_religion" class="form-control" placeholder="Religion" required=""> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Weight (kgs)</label>
                                    <input type="text" id="employee_weight" name="employee_weight" class="form-control" placeholder="Weight" required=""> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Height (ft)</label>
                                    <input type="text" id="employee_height" name="employee_height" class="form-control" placeholder="Height" required=""> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Personal Email</label>
                                    <input type="text" id="employee_personal_email" name="employee_personal_email" class="form-control" placeholder="Personal Email" required=""> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Office Email</label>
                                    <input type="text" id="employee_office_email" name="employee_office_email" class="form-control" placeholder="Office Email" required=""> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Start Date with Hotwork</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker-autoclose" id="employee_start_date" name="employee_start_date" placeholder="yyyy-mm-dd" required=""> <span class="input-group-addon"><i class="icon-calender"></i></span> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Blood Type: <i style="color: red;font-size: 12px;">Include Rhesus (+) or (-)</i></label>
                                    <input type="text" id="employee_blood_type" name="employee_blood_type" class="form-control" placeholder="Blood Type" required=""> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Complete City Address</label>
                                    <textarea class="form-control" rows="4" id="employee_city_address" name="employee_city_address" class="form-control" required=""></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Complete Provincial Address</label>
                                    <textarea class="form-control" rows="4" id="employee_provincial_address" name="employee_provincial_address" class="form-control" required=""></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="white-box">
                    <h3 class="box-title m-b-0">In Case of Emergency</h3>
                    <p class="text-muted m-b-30 font-13">Emergency contact details</p>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Contact Name</label>
                                    <input type="text" id="employee_emergency_contact_name" name="employee_emergency_contact_name" class="form-control" placeholder="Contact Name" required=""> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Relationship</label>
                                    <input type="text" id="employee_emergency_relationship" name="employee_emergency_relationship" class="form-control" placeholder="Relationship" required="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Contact Number</label>
                                    <input type="text" id="employee_emergency_contact_number" name="employee_emergency_contact_number" class="form-control" placeholder="Contact Number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" id="employee_emergency_email" name="employee_emergency_email" class="form-control" placeholder="Email"> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="white-box">
                    <h3 class="box-title m-b-0">Family Details</h3>
                    <p class="text-muted m-b-30 font-13">Family details</p>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Father’s Firstname</label>
                                    <input type="text" id="employee_father_first_name" name="employee_father_first_name" class="form-control" placeholder="Father’s Firstname" required=""> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Father’s Middlename</label>
                                    <input type="text" id="employee_father_middle_name" name="employee_father_middle_name" class="form-control" placeholder="Father’s Middlename" required=""> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Father’s Lastname</label>
                                    <input type="text" id="employee_father_last_name" name="employee_father_last_name" class="form-control" placeholder="Father’s Lastname" required=""> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Mother’s Firstname</label>
                                    <input type="text" id="employee_mother_first_name" name="employee_mother_first_name" class="form-control" placeholder="Mother’s Firstname" required=""> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Mother’s Maiden Middlename</label>
                                    <input type="text" id="employee_mother_maiden_middle_name" name="employee_mother_maiden_middle_name" class="form-control" placeholder="Mother’s Maiden Middlename" required=""> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Mother’s Maiden Lastname</label>
                                    <input type="text" id="employee_mother_maiden_last_name" name="employee_mother_maiden_last_name" class="form-control" placeholder="Mother’s Maiden Lastname" required=""> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Spouse’s Complete Name</label>
                                    <input type="text" id="employee_spouse_name" name="employee_spouse_name" class="form-control" placeholder="Spouse’s Complete Name"> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Spouse’s Birthday</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker-autoclose" id="employee_spouse_birthdate" name="employee_spouse_birthdate" placeholder="yyyy-mm-dd"> <span class="input-group-addon"><i class="icon-calender"></i></span> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Spouse’s Birthplace</label>
                                    <input type="text" id="employee_spouse_birthplace" name="employee_spouse_birthplace" class="form-control" placeholder="Spouse’s Birthplace"> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Spouse’s Occupation</label>
                                    <input type="text" id="employee_spouse_occupation" name="employee_spouse_occupation" class="form-control" placeholder="Spouse’s Occupation"> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Spouse’s Office Number</label>
                                    <input type="text" id="employee_spouse_office_number" name="employee_spouse_office_number" class="form-control" placeholder="Spouse’s Office Number"> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="white-box">
                    <h3 class="box-title m-b-0">Child Details</h3>
                    <p class="text-muted m-b-30 font-13">Add child details</p>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Child’s Name</label>
                                    <input type="text" id="child_name" name="child_name" class="form-control" placeholder="Child’s Name"> 
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Child’s Birthday</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker-autoclose" id="child_birthdate" name="child_birthdate" placeholder="yyyy-mm-dd"> <span class="input-group-addon"><i class="icon-calender"></i></span> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>&nbsp;</label>
                                    <br>
                                    <a id="add-child" class="btn btn-success"> <span class="fa fa-plus"> </span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table id="child_table_display" class="table table-striped table-hover" cellspacing="0">
                                    <thead>
                                        <th>CHILD'S NAME</th>
                                        <th>BIRTHDAY</th>      
                                        <th></th> 
                                    </thead>
                                    <tbody id='child_table'>
                                        <tr>
                                            <td align="center" colspan="3">No records found.</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="white-box">
                    <h3 class="box-title m-b-0">Documentary Details</h3>
                    <p class="text-muted m-b-30 font-13">Documentary details</p>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>SSS Number</label>
                                    <input type="text" id="employee_sss_number" name="employee_sss_number" class="form-control" placeholder="SSS Number" required=""> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Pag-Ibig Number</label>
                                    <input type="text" id="employee_pagibig_number" name="employee_pagibig_number" class="form-control" placeholder="Pag-Ibig Number" required=""> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phil-Health Number</label>
                                    <input type="text" id="employee_phealth_number" name="employee_phealth_number" class="form-control" placeholder="Phil-Health Number" required=""> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>TIN Number</label>
                                    <input type="text" id="employee_tin_number" name="employee_tin_number" class="form-control" placeholder="TIN Number" required=""> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>UMID Number</label>
                                    <input type="text" id="employee_umid_number" name="employee_umid_number" class="form-control" placeholder="UMID Number" required=""> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Passport Number</label>
                                    <input type="text" id="employee_passport_number" name="employee_passport_number" class="form-control" placeholder="Passport Number" required="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Passport Date of Issue</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker-autoclose" id="employee_passport_issue_date" name="employee_passport_issue_date" placeholder="yyyy-mm-dd" required=""> <span class="input-group-addon"><i class="icon-calender"></i></span> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Passport Date of Expiry</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker-autoclose" id="employee_passport_expiry_date" name="employee_passport_expiry_date" placeholder="yyyy-mm-dd" required=""> <span class="input-group-addon"><i class="icon-calender"></i></span> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Passport Place of Issue</label>
                                    <input type="text" id="employee_passport_issue_location" name="employee_passport_issue_location" class="form-control" placeholder="Passport Place of Issue" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Upload Passport Copy</label>
                                    <div>
                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                            <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                            <input type="file" name="passport_copy" id="passport_copy" required=""> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Diplomas / Certificates</label>
                                    <div>
                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                            <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                            <input type="file" name="employee_certificate" id="employee_certificate"> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> </div>
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

<script type="text/html" id="child-data-template">
    <tr>    
        <td data-content='child_name'></td>
        <td data-content='child_birthdate'></td>
        <td data-content='action'></td>
    </tr> 
</script>

<!-- Date Picker Plugin JavaScript -->
<script src="<?=base_url()?>asset/components/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="<?=base_url()?>asset/src/employee/add.js"></script>
