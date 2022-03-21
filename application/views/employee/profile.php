<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"></h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="<?=base_url()?>">Dashboard</a></li>
                <li class="active">Profile</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-xs-12">
            <div class="white-box">
                <div class="user-bg"> 
                    <img width="100%" alt="user" src="<?=base_url()?>asset/components/images/screw.jpeg">
                    <div class="overlay-box">
                        <div class="user-content">
                            <a href="javascript:void(0)"><img alt="img" id="profile_pic" class="thumb-lg img-circle" alt="user"></a>
                            <span class="profile_fullname" id="profile_fullname" style="display: none;"></span>
                            <h3 class="text-white"><?=$employee->employee_first_name . ", " . $employee->employee_last_name . " " . $employee->employee_middle_name;?></h3>
                            <h5 class="text-white">
                                <?=$employee->employee_office_email?>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="user-btm-box">
                    <div class="col-md-6 col-sm-12 text-center">
                        <h3 class="text-purple"><i class="fa fa-phone"></i></h3>
                        <h4><?=$employee->employee_mobile_number?></h4> </div>
                    <div class="col-md-6 col-sm-12 text-center">
                        <h3 class="text-blue"><i class="fa fa-phone-square"></i></h3>
                        <h4><?=$employee->employee_landline_number?></h4> </div>
                    <div class="col-md-12 col-sm-12 text-center">
                        <h3 class="text-danger"><i class="fa fa-envelope-o"></i></h3>
                        <h3><?=$employee->employee_personal_email?></h3></div>
                </div>
                <div class="user-btm-box">
                    <div class="col-md-12 col-sm-12 text-center">
                        <a class="btn btn-info btn-outline btn-rounded change-password" id="change-password" style="width:100%;"><span class="fa fa-key"></span> Change Password</a>
                    </div>
                    <div class="col-md-12 col-sm-12 text-center">
                        <br>
                        <a class="btn btn-primary btn-outline btn-rounded change-picture" id="change-picture" style="width:100%;"><span class="fa fa-image"></span> Change Picture</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-xs-12">
            <div class="white-box">
                <ul class="nav nav-tabs tabs customtab">
                    <li class="active tab">
                        <a href="#personal" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-home"></i></span> <span class="hidden-xs">Personal Details</span> </a>
                    </li>
                    <li class="tab">
                        <a href="#job" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Job History</span> </a>
                    </li>
                    <li class="tab">
                        <a href="#vitae" data-toggle="tab" aria-expanded="true"> <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> <span class="hidden-xs">Curriculum Vitae</span> </a>
                    </li>
                    <li class="tab">
                        <a href="#requirements" data-toggle="tab" aria-expanded="true"> <span class="visible-xs"><i class="fa fa-picture-o"></i></span> <span class="hidden-xs">Requirements</span> </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="personal">
                        <div>
                            <div class="pull-right">
                                <a href="<?=base_url()?>employee/edit/<?=$employee->employee_id?>" class="btn btn-primary btn-rounded btn-outline">Update</a>
                            </div>
                            <h3 class="box-title m-b-0 text-danger">Personal Details</h3>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Firstname</strong>
                                <br>
                                <p class="text-muted" id="employee_firstname" personal-name="employee_first_name"></p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Middlename</strong>
                                <br>
                                <p class="text-muted" id="employee_middle" personal-name="employee_middle_name"></p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Lastname</strong>
                                <br>
                                <p class="text-muted" id="employee_last_name" personal-name="employee_last_name"></p>
                            </div>
                            <div class="col-md-3 col-xs-6"> <strong>Birthday</strong>
                                <br>
                                <p class="text-muted" id="employee_birthday" personal-name="employee_birthdate"></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Gender</strong>
                                <br>
                                <p class="text-muted" id="employee_gender" personal-name="employee_gender"></p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Civil Status</strong>
                                <br>
                                <p class="text-muted" id="employee_civil_status" personal-name="employee_civil_status"></p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Blood Type</strong>
                                <br>
                                <p class="text-muted" id="employee_blood_type" personal-name="employee_blood_type"></p>
                            </div>
                            <div class="col-md-3 col-xs-6"> <strong>Hire Date</strong>
                                <br>
                                <p class="text-muted" id="employee_start_date" personal-name="employee_start_date"></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Religion</strong>
                                <br>
                                <p class="text-muted" id="employee_religion" personal-name="employee_religion"></p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Weight</strong>
                                <br>
                                <p class="text-muted" id="employee_weight" personal-name="employee_weight"></p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Height</strong>
                                <br>
                                <p class="text-muted" id="employee_height" personal-name="employee_height"></p>
                            </div>
                            <div class="col-md-3 col-xs-6"> <strong>Place of Birth</strong>
                                <br>
                                <p class="text-muted" id="employee_birthplace" personal-name="employee_birthplace"></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 col-xs-6 b-r"> <strong>City Address</strong>
                                <br>
                                <p class="text-muted" id="employee_city_address" personal-name="employee_city_address"></p>
                            </div>
                            <div class="col-md-6 col-xs-6 b-r"> <strong>Provincial Address</strong>
                                <br>
                                <p class="text-muted" id="employee_provincial_address" personal-name="employee_provincial_address"></p>
                            </div>
                        </div>
                        <hr>
                        <h3 class="box-title m-b-0 text-danger">In Case of Emergency</h3>
                        <br>
                        <div class="row">
                            <div class="col-md-6 col-xs-6 b-r"> <strong>Contact Name</strong>
                                <br>
                                <p class="text-muted" id="employee_emergency_contact_name" personal-name="employee_emergency_contact_name"></p>
                            </div>
                            <div class="col-md-6 col-xs-6 b-r"> <strong>Relationship</strong>
                                <br>
                                <p class="text-muted" id="employee_emergency_relationship" personal-name="employee_emergency_relationship"></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 col-xs-6 b-r"> <strong>Contact Number</strong>
                                <br>
                                <p class="text-muted" id="employee_emergency_contact_number" personal-name="employee_emergency_contact_number"></p>
                            </div>
                            <div class="col-md-6 col-xs-6 b-r"> <strong>Email Address</strong>
                                <br>
                                <p class="text-muted" id="employee_emergency_email" personal-name="employee_emergency_email"></p>
                            </div>
                        </div>
                        <hr>
                        <h3 class="box-title m-b-0 text-danger">Family Details</h3>
                        <br>
                        <div class="row">
                            <div class="col-md-4 col-xs-4 b-r"> <strong>Father's First Name</strong>
                                <br>
                                <p class="text-muted" id="employee_father_first_name" personal-name="employee_father_first_name"></p>
                            </div>
                            <div class="col-md-4 col-xs-4 b-r"> <strong>Father's Middle Name</strong>
                                <br>
                                <p class="text-muted" id="employee_father_middle_name" personal-name="employee_father_middle_name"></p>
                            </div>
                            <div class="col-md-4 col-xs-4 b-r"> <strong>Father's Last Name</strong>
                                <br>
                                <p class="text-muted" id="employee_father_last_name" personal-name="employee_father_last_name"></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4 col-xs-4 b-r"> <strong>Mother's First Name</strong>
                                <br>
                                <p class="text-muted" id="employee_mother_first_name" personal-name="employee_mother_first_name"></p>
                            </div>
                            <div class="col-md-4 col-xs-4 b-r"><strong>Mother's Maiden Middle Name</strong>
                                <br>
                                <p class="text-muted" id="employee_mother_maiden_middle_name" personal-name="employee_mother_maiden_middle_name"></p>
                            </div>
                            <div class="col-md-4 col-xs-4 b-r"> <strong>Mother's Maiden Last Name</strong>
                                <br>
                                <p class="text-muted" id="employee_mother_maiden_last_name" personal-name="employee_mother_maiden_last_name"></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4 col-xs-4 b-r"> <strong>Spouse First Name</strong>
                                <br>
                                <p class="text-muted" id="employee_spouse_first_name" personal-name="employee_spouse_first_name"></p>
                            </div>
                            <div class="col-md-4 col-xs-4 b-r"> <strong>Spouse Middle Name</strong>
                                <br>
                                <p class="text-muted" id="employee_spouse_middle_name" personal-name="employee_spouse_middle_name"></p>
                            </div>
                            <div class="col-md-4 col-xs-4 b-r"> <strong>Spouse Last Name</strong>
                                <br>
                                <p class="text-muted" id="employee_spouse_last_name" personal-name="employee_spouse_last_name"></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4 col-xs-4 b-r"> <strong>Spouse Birthdate</strong>
                                <br>
                                <p class="text-muted" id="employee_spouse_birthdate" personal-name="employee_spouse_birthdate"></p>
                            </div>
                            <div class="col-md-4 col-xs-4 "> <strong>Spouse Birthplace</strong>
                                <br>
                                <p class="text-muted" id="employee_spouse_birthplace" personal-name="employee_spouse_birthplace"></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4 col-xs-4 b-r"> <strong>Spouse Contact Number</strong>
                                <br>
                                <p class="text-muted" id="employee_spouse_office_number" personal-name="employee_spouse_office_number"></p>
                            </div>
                            <div class="col-md-4 col-xs-4"> <strong>Spouse Occupation</strong>
                                <br>
                                <p class="text-muted" id="employee_spouse_occupation" personal-name="employee_spouse_occupation"></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <table id="child_table_display" class="table table-striped table-hover" cellspacing="0">
                                    <thead>
                                        <th>CHILD'S NAME</th>
                                        <th>BIRTHDAY</th>  
                                        <th>AGE</th>
                                    </thead>
                                    <tbody id='child_table'>
                                        <?php 
                                            if($children){
                                                foreach($children as $child){
                                                    echo "<tr>
                                                            <td>" . $child->employee_child_name . "</td>    
                                                            <td>" . $child->employee_child_birthdate . "</td> 
                                                            <td>" . $child->employee_child_age . "</td>
                                                         </tr>";
                                                }
                                            }else{
                                                echo "<td align='center' colspan='2'>No records found.</td>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>
                        <h3 class="box-title m-b-0 text-danger">Documentary Details</h3>
                        <br>
                        <div class="row">
                            <div class="col-md-4 col-xs-4 b-r"> <strong>SSS Number</strong>
                                <br>
                                <p class="text-muted" id="employee_sss_number" personal-name="employee_sss_number"></p>
                            </div>
                            <div class="col-md-4 col-xs-4 b-r"> <strong>Pagibig Number</strong>
                                <br>
                                <p class="text-muted" id="employee_pagibig_number" personal-name="employee_pagibig_number"></p>
                            </div>
                            <div class="col-md-4 col-xs-4 b-r"> <strong>PhilHealth Number</strong>
                                <br>
                                <p class="text-muted" id="employee_phealth_number" personal-name="employee_phealth_number"></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4 col-xs-4 b-r"> <strong>TIN Number</strong>
                                <br>
                                <p id="profile_tin" class="text-muted" personal-name="employee_tin_number"></p>
                            </div>
                            <div class="col-md-4 col-xs-4 b-r"> <strong>UMID Number</strong>
                                <br>
                                <p class="text-muted" personal-name="employee_umid_number"></p>
                            </div>
                            <div class="col-md-4 col-xs-4"> <strong>BPI Number</strong>
                                <br>
                                <p class="text-muted" personal-name="employee_bpi_number"></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4 col-xs-4 b-r"> <strong>Passport Copy</strong>
                                <br>
                                <p id="employee_passport_copy" class="text-muted" personal-name="employee_passport_copy"></p>
                            </div>
                            <div class="col-md-4 col-xs-4 b-r"> <strong>Employee Certificate</strong>
                                <br>
                                <p class="text-muted" personal-name="employee_certificate"></p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="tab-pane" id="visa">
                        <div>
                            <div class="pull-right">
                                <a href="<?=base_url()?>employee/visa_update/<?=$employee->employee_id?>" class="btn btn-primary btn-rounded btn-outline">Update</a>
                            </div>
                            <h3 class="box-title m-b-0 text-danger">Visas Granted</h3>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12 col-xs-12 b-r">
                                <table class="table color-table inverse-table">
                                    <thead>
                                        <tr>
                                            <th></th>    
                                            <th>Issue Date</th>    
                                            <th>Expiry Date</th>    
                                            <th>Country</th>    
                                            <th>File</th>     
                                        </tr>
                                    </thead>
                                    <?php $ctr=1; foreach($visas as $visa){?>
                                    <tr>
                                        <td><?=$ctr;?></td>
                                        <td><?=$visa->employee_visa_issue_date;?></td>
                                        <td><?=$visa->employee_visa_expiry_date;?></td>
                                        <td><?=$visa->employee_visa_country;?></td>
                                        <td><?=$visa->employee_visa_file;?></td>
                                    </tr>
                                    <?php $ctr++; }
                                        if($ctr == 1){
                                    ?>
                                    <tr>
                                        <td colspan="5" align="center">No records found.</td>
                                    </tr> 
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="job">
                        <div>
                            <div class="pull-right">
                                <!-- <a href="<?=base_url()?>employee/job_history/<?=$employee->employee_id?>" class="btn btn-primary btn-rounded btn-outline">Add</a> -->
                                <a href="<?=base_url()?>employee/job_history/<?=$employee->employee_id?>" class="btn btn-primary btn-rounded btn-outline">Update</a>
                                <a href="<?=base_url()?>employee/download_job_history/<?=$employee->employee_id?>" class="btn btn-success btn-rounded btn-outline" target="_blank">Download</a>
                            </div>
                            <h3 class="box-title m-b-0 text-danger">Job History</h3>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12 col-xs-12 b-r table-responsive">
                                <table class="table color-table inverse-table" style="text-align: center;">
                                    <thead>
                                        <tr>
                                            <th>Count</th>    
                                            <th>Customer / Client</th>      
                                            <th>Scope</th>
                                            <th>Location</th>
                                            <th>Country / Address</th>
                                            <th>Date of Departure / Date of Entry</th>
                                            <th>Date of Return / Date of Exit</th>   
                                            <th>Services</th>
                                        </tr>
                                    </thead>
                                    <?php $ctr=1; foreach($job_history as $jh){?>
                                    <tr>
                                        <td><?=$ctr;?></td>
                                        <td><?=$jh->employee_job_history_client;?></td>
                                        <td><?=$jh->employee_job_history_scope;?></td>
                                        <td><?=$jh->employee_job_location;?></td>
                                        <td><?=$jh->employee_job_address;?><?=$jh->employee_job_country;?></td>
                                        <td><?=$jh->employee_job_departure_date;?><?=$jh->employee_job_entry_date;?></td>
                                        <td><?=$jh->employee_job_return_date;?><?=$jh->employee_job_exit_date;?></td>
                                        <td><?=implode(", ", $jh->service_scopes);?></td>
                                    </tr>
                                    <?php $ctr++; }
                                        if($ctr == 1){
                                    ?>
                                    <tr>
                                        <td colspan="10" align="center">No records found.</td>
                                    </tr> 
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="vitae">
                        <div>
                            <div class="pull-right">
                                <!-- <a id="upload_resume" class="btn btn-primary btn-rounded btn-outline">Upload</a> -->
                                <a href="<?=base_url()?>employee/download_resume/<?=$employee->employee_id?>" class="btn btn-success btn-rounded btn-outline" target="_blank">Download</a>
                                <a href="<?=base_url()?>employee/curriculum_vitae/<?=$employee->employee_id?>" class="btn btn-primary btn-rounded btn-outline">Update</a>
                            </div>
                            <h3 class="box-title m-b-0 text-danger">Curriculum Vitae</h3>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3 col-xs-12"> <strong>Last Name</strong></div>
                            <div class="col-md-9 col-xs-12 b-r text-muted"> <?=$employee->employee_last_name?></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3 col-xs-12"> <strong>First Name</strong></div>
                            <div class="col-md-9 col-xs-12 b-r text-muted"> <?=$employee->employee_first_name?></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3 col-xs-12"> <strong>Middle Name</strong></div>
                            <div class="col-md-9 col-xs-12 b-r text-muted"> <?=$employee->employee_middle_name?></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3 col-xs-12"> <strong>Complete Address</strong></div>
                            <div class="col-md-9 col-xs-12 b-r text-muted"> <?=$employee->employee_city_address?></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3 col-xs-12"><strong>ZIP Code</strong></div>
                            <div class="col-md-9 col-xs-12 text-muted"><?php echo ($cv != null) ? $cv->employee_address_zip_code: "";?></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3 col-xs-12"> <strong>Date of Birth</strong></div>
                            <div class="col-md-9 col-xs-12 b-r text-muted"> <?=$employee->employee_birthdate?></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3 col-xs-12"> <strong>Contact No.</strong></div>
                            <div class="col-md-9 col-xs-12 b-r text-muted"> <?=$employee->employee_mobile_number?></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3 col-xs-12"> <strong>Email Address</strong></div>
                            <div class="col-md-9 col-xs-12 b-r text-muted"> <?=$employee->employee_personal_email?></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3 col-xs-12"> <strong>Marital Status</strong></div>
                            <div class="col-md-9 col-xs-12 b-r text-muted"> <?=$employee->employee_civil_status?></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3 col-xs-12"> <strong>Religion</strong></div>
                            <div class="col-md-9 col-xs-12 b-r text-muted"> <?=$employee->employee_religion?></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3 col-xs-12"> <strong>Desired Position</strong></div>
                            <div class="col-md-9 col-xs-12 text-muted"><?php echo ($cv != null) ? $cv->employee_desired_position: "";?></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3 col-xs-12"> <strong>Emergency Contact</strong></div>
                            <div class="col-md-9 col-xs-12 b-r text-muted"> <?=$employee->employee_emergency_contact_name?></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3 col-xs-12"> <strong>Contact No. of Emergency Contact</strong></div>
                            <div class="col-md-9 col-xs-12 b-r text-muted"> <?=$employee->employee_emergency_contact_number?></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3 col-xs-12"> <strong>Relationship</strong></div>
                            <div class="col-md-9 col-xs-12 b-r text-muted"> <?=$employee->employee_emergency_relationship?></div>
                        </div>
                        <hr>
                        <!-- <h3 class="box-title m-b-0 text-danger">Curriculum Vitae</h3>
                        <br>
                        <div class="row" id="vitae">
                            <div class="col-md-12 col-xs-12 b-r">
                                <table class="table color-table inverse-table">
                                    <thead>
                                        <tr>
                                            <th>Count</th>    
                                            <th>Curriculum Vitae</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $ctr=1;
                                            if($ctr == 1)
                                        ?>
                                        <tr>
                                            <td><?=$ctr;?></td>
                                            <td id="employee_cv_upload" personal-name="employee_cv_upload"></td>
                                        </tr>
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                        <br> -->
                        <h3 class="box-title m-b-0 text-danger">Skills</h3>
                        <br>
                        <div class="row">
                            <div class="col-md-12 col-xs-12 b-r">
                                <table class="table color-table inverse-table">
                                    <thead>
                                        <tr>
                                            <th>Count</th>    
                                            <th>Skill Name</th> 
                                        </tr>
                                    </thead>
                                    <?php $ctr=1; foreach($skills as $skill){?>
                                    <tr>
                                        <td><?=$ctr;?></td>
                                        <td><?=$skill->employee_skill_name;?></td>
                                    </tr>
                                    <?php $ctr++; }
                                        if($ctr == 1){
                                    ?>
                                    <tr>
                                        <td colspan="10" align="center">No records found.</td>
                                    </tr> 
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                        <br>
                        <br>
                        <h3 class="box-title m-b-0 text-danger">References</h3>
                        <br>
                        <div class="row">
                            <div class="col-md-12 col-xs-12 b-r table-responsive">
                                <table class="table color-table inverse-table">
                                    <thead>
                                        <tr>
                                            <th>Count</th>    
                                            <th>Name</th> 
                                            <th>Company</th> 
                                            <th>Position</th> 
                                            <th>Contact No.</th>
                                        </tr>
                                    </thead>
                                    <?php $ctr=1; foreach($references as $reference){?>
                                    <tr>
                                        <td><?=$ctr;?></td>
                                        <td><?=$reference->employee_reference_name;?></td>
                                        <td><?=$reference->employee_reference_company;?></td>
                                        <td><?=$reference->employee_reference_position;?></td>
                                        <td><?=$reference->employee_reference_contact_no;?></td>
                                    </tr>
                                    <?php $ctr++; }
                                        if($ctr == 1){
                                    ?>
                                    <tr>
                                        <td colspan="10" align="center">No records found.</td>
                                    </tr> 
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="requirements">
                        <div id="myProgress" style = "background-color: #e9ecef;border-radius: 5px;overflow: hidden;">
                            <div id="myBar" style=" width: 0; height: 30px; background-color: #2cabe3; text-align: center; line-height: 30px; color: white;border-radius: 5px;">
                                <span class="text-progress-percent"></span>
                                <span class="text-progress"></span>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div>
                            <div class="pull-right">
                                <!-- <a data-toggle='modal' data-target='#add_form_modal'><button class="btn btn-primary btn-rounded btn-outline" id="btn-update-files">Update</button></a>           -->
                                <button class="btn btn-primary btn-rounded btn-outline" id="btn-update-files">Update Images</button>
                            </div>
                 
                            <h3 class="box-title m-b-0 text-danger">Requirements</h3>
                        </div>
                        <br><br>
                        <div id="requirements-wrapper">
                            <div class="row">
                                <div class="col-md-4 col-xs-12">
                                    <p>
                                        <strong>Tax Identification Number</strong>
                                    </p>
                                    <span class="text-muted" personal-name="employee_tin_number"></span>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <p>
                                        <strong>Attach image</strong>
                                    </p>
                                    <span id="tin-picture" style="cursor: pointer;" class="text-primary">
                                        <span class="fa fa-image m-r-5"></span>
                                        <a>
                                            <span class="attach_image link_img" id="employee_img_tin" personal-name="employee_img_tin">
                                                <!-- <strong class="" id="employee_img_tin"></strong> -->
                                            </span>
                                        </a>
                                    </span>
                                </div>
                                <div class="col-md-2 col-xs-12 m-t-10 text-right">
                                    <span class="disable_tin">
                                        <a id="delete_tin" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
                                        <button title="View" class="btn btn-success edit_button" id="employee_img_tin">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                        <a id="employee_img_tin" class="btn btn-primary download_btn" title="Download"><i class="fa fa-download"></i></a>
                                    </span>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4 col-xs-12">
                                    <p>
                                        <strong>SSS Number</strong>
                                    </p>
                                    <span class="text-muted" personal-name="employee_sss_number"></span>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <p>
                                        <strong>Attach image</strong>
                                    </p>
                                    <span id="sss-picture" style="cursor: pointer;" class="text-primary">
                                        <span class="fa fa-image m-r-5"></span>
                                            <span class="attach_image link_img" id="employee_img_sss" personal-name="employee_img_sss"> 
                                                <!-- <strong class="" id="employee_img_sss"></strong> -->
                                        </span>
                                    </span>
                                </div>
                                <div class="col-md-2 col-xs-12 m-t-10 text-right">
                                    <span class="disable_sss">
                                    <a id="delete_sss" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
                                    <button title="View" class="btn btn-success edit_button" id="employee_img_sss" src="<?=base_url()?>asset/employees/requirements/<?=$employee->employee_img_sss?>">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <a id="employee_img_sss" class="btn btn-primary download_btn" title="Download"><i class="fa fa-download"></i></a>
                                    </span>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4 col-xs-12">
                                    <p>
                                        <strong>Pagibig Number</strong>
                                    </p>
                                    <span class="text-muted" personal-name="employee_pagibig_number"></span>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <p>
                                        <strong>Attach image</strong>
                                    </p>
                                    <span id="pagibig-picture" style="cursor: pointer;" class="text-primary">
                                        <span class="fa fa-image m-r-5"></span>
                                            <span class="attach_image link_img" id="employee_img_pagibig" personal-name="employee_img_pagibig"> 
                                                <!-- <strong class="" id="freelancer_img_PAG_IBIG_filename"></strong> -->
                                        </span>
                                    </span>
                                </div>
                                <div class="col-md-2 col-xs-12 m-t-10 text-right">
                                <span class="disable_pagibig">
                                    <a id="delete_pagibig" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
                                    <button title="View" class="btn btn-success edit_button" id="employee_img_pagibig" src="<?=base_url()?>asset/employees/requirements/<?=$employee->employee_img_pagibig?>">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <a id="employee_img_pagibig" class="btn btn-primary download_btn" title="Download"><i class="fa fa-download"></i></a>
                               </span>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4 col-xs-12">
                                    <p>
                                        <strong>Philhealth Number</strong>
                                    </p>
                                    <span class="text-muted" personal-name="employee_phealth_number"></span>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <p>
                                        <strong>Attach image</strong>
                                    </p>
                                    <span id="phil-picture" style="cursor: pointer;" class="text-primary">
                                        <span class="fa fa-image m-r-5"></span>
                                            <span class="attach_image link_img" id="employee_img_philhealth" personal-name="employee_img_philhealth"> 
                                                <!-- <strong class="" id="freelancer_img_PHILHEALTH_filename"></strong> -->
                                        </span>
                                    </span>
                                </div>
                                <div class="col-md-2 col-xs-12 m-t-10 text-right">
                                <span class="disable_phil">
                                    <a id="delete_philhealth" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
                                    <button title="View" class="btn btn-success edit_button" id="employee_img_philhealth" src="<?=base_url()?>asset/employees/requirements/<?=$employee->employee_img_philhealth?>">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <a id="employee_img_philhealth" class="btn btn-primary download_btn" title="Download"><i class="fa fa-download"></i></a>
                                </span>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4 col-xs-12">
                                    <p>
                                        <strong>BPI ATM Number</strong>
                                    </p>
                                    <span class="text-muted" personal-name="employee_bpi_number"></span>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <p>
                                        <strong>Attach image</strong>
                                    </p>
                                    <span id="bpi-picture" style="cursor: pointer;" class="text-primary">
                                        <span class="fa fa-image m-r-5"></span>
                                            <span class="attach_image link_img" id="employee_img_bpi" personal-name="employee_img_bpi"> 
                                                <!-- <strong class="" id="freelancer_img_BPI_filename"></strong> -->
                                        </span>
                                    </span>
                                </div>
                                <div class="col-md-2 col-xs-12 m-t-10 text-right">
                                <span class="disable_bpi">
                                    <a id="delete_bpi" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
                                    <button title="View" class="btn btn-success edit_button" id="employee_img_bpi" src="<?=base_url()?>asset/employees/requirements/<?=$employee->employee_img_bpi?>">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <a id="employee_img_bpi" class="btn btn-primary download_btn" title="Download"><i class="fa fa-download"></i></a>
                                </span>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4 col-xs-12">
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <p>
                                    <strong>Cirriculum Vitae</strong>
                                    </p>
                                    <span id="cv-picture" style="cursor: pointer;" class="text-primary">
                                    <span class="fa fa-image m-r-5"></span>
                                    <span class="attach_image link_img" id="employee_img_cv" personal-name="employee_img_cv">
                                        <!-- <strong class="" id="employee_img_cv_filename"></strong> -->
                                        </span>
                                    </span>
                                </div>
                                <div class="col-md-2 col-xs-12 m-t-10 text-right">
                                <span class="disable_cv">
                                    <a id="delete_cv" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
                                    <button title="View" class="btn btn-success edit_button" id="employee_img_cv" src="<?=base_url()?>asset/employees/requirements/<?=$employee->employee_img_cv?>">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <a id="employee_img_cv" class="btn btn-primary download_btn" title="Download"><i class="fa fa-download"></i></a>
                                </span>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4 col-xs-12">
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <p>
                                    <strong>Passport or Government ID</strong>
                                    </p>
                                    <span id="pass-picture" style="cursor: pointer;" class="text-primary">
                                    <span class="fa fa-image m-r-5"></span>
                                    <span class="attach_image link_img" id="employee_img_passport" personal-name="employee_img_passport"> 
                                        <!-- <strong class="" id="employee_pass_filename"></strong> -->
                                        </span>
                                    </span>
                                </div>
                                <div class="col-md-2 col-xs-12 m-t-10 text-right">
                                <span class="disable_pass">
                                    <a id="delete_passport" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
                                    <button title="View" class="btn btn-success edit_button" id="employee_img_passport" src="<?=base_url()?>asset/employees/requirements/<?=$employee->employee_img_passport?>">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <a id="employee_img_passport" class="btn btn-primary download_btn" title="Download"><i class="fa fa-download"></i></a>
                                </span>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4 col-xs-12"> 
                                </div>
                                <div class="col-md-6 col-xs-12"> 
                                    <p>
                                    <strong>Medical</strong>
                                    </p>
                                    <span id="medical-picture" style="cursor: pointer;" class="text-primary">
                                    <span class="fa fa-image m-r-5"></span>
                                    <span class="attach_image link_img" id="employee_img_medical" personal-name="employee_img_medical"> 
                                    <!-- <strong class="" id="freelancer_medical_filename"></strong> -->
                                        </span>
                                    </span>
                                </div>
                                <div class="col-md-2 col-xs-12 m-t-10 text-right">
                                <span class="disable_med">
                                    <a id="delete_medical" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
                                    <button title="View" class="btn btn-success edit_button" id="employee_img_medical" src="<?=base_url()?>asset/employees/requirements/<?=$employee->employee_img_medical?>">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <a id="employee_img_medical" class="btn btn-primary download_btn" title="Download"><i class="fa fa-download"></i></a>
                                </span>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4 col-xs-12"> 
                                </div>
                                <div class="col-md-6 col-xs-12"> 
                                    <p>
                                    <strong>NBI Clearance / Police Clearance</strong>
                                    </p>
                                    <span id="nbi-picture" style="cursor: pointer;" class="text-primary">
                                    <span class="fa fa-image m-r-5"></span>
                                    <span class="attach_image link_img" id="employee_img_nbi" personal-name="employee_img_nbi"> 
                                    <!-- <strong class="" id="freelancer_NBI_POLICE_filename"></strong> -->
                                        </span>
                                    </span>
                                </div>
                                <div class="col-md-2 col-xs-12 m-t-10 text-right">
                                <span class="disable_nbi">
                                    <a id="delete_nbi" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
                                    <button title="View" class="btn btn-success edit_button" id="employee_img_nbi" src="<?=base_url()?>asset/employees/requirements/<?=$employee->employee_img_nbi?>">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <a id="employee_img_nbi" class="btn btn-primary download_btn" title="Download"><i class="fa fa-download"></i></a>
                                </span>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4 col-xs-12"> 
                                </div>
                                <div class="col-md-6 col-xs-12"> 
                                    <p>
                                    <strong>NRT-PCR Test</strong>
                                    </p>
                                    <span id="rtpcr-picture" style="cursor: pointer;" class="text-primary">
                                    <span class="fa fa-image m-r-5"></span>
                                    <span class="attach_image link_img" id="employee_img_swab" personal-name="employee_img_swab"> 
                                    <!-- <strong class="" id="freelancer_RT_PCR_filename"></strong> -->
                                        </span>
                                    </span>
                                </div>
                                <div class="col-md-2 col-xs-12 m-t-10 text-right">
                                <span class="disable_swab">
                                    <a id="delete_swab" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
                                    <button title="View" class="btn btn-success edit_button" id="employee_img_swab" src="<?=base_url()?>asset/employees/requirements/<?=$employee->employee_img_swab?>">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <a id="employee_img_swab" class="btn btn-primary download_btn" title="Download"><i class="fa fa-download"></i></a>
                                </span>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4 col-xs-12"> 
                                </div>
                                <div class="col-md-6 col-xs-12"> 
                                    <p>
                                    <strong>Signatures</strong>
                                    </p>
                                    <span id="signature-picture" style="cursor: pointer;" class="text-primary">
                                    <span class="fa fa-image m-r-5"></span>
                                    <span class="attach_image link_img" id="employee_img_signature" personal-name="employee_img_signature"> 
                                    <!-- <strong class="" id="freelancer_SIGNATURES_filename"></strong> -->
                                        </span>
                                    </span>
                                </div>
                                <div class="col-md-2 col-xs-12 m-t-10 text-right">
                                <span class="disable_sig">
                                    <a id="delete_signature" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
                                    <button title="View" class="btn btn-success edit_button" id="employee_img_signature" src="<?=base_url()?>asset/employees/requirements/<?=$employee->employee_img_signature?>">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <a id="employee_img_signature" class="btn btn-primary download_btn" title="Download"><i class="fa fa-download"></i></a>
                                </span>
                                </div>
                            </div>
                        </div>
                    </div>   
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="upload_resume_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="modalLabel">Upload Curriculum Vitae</h4>
            </div>
            <div class="modal-body">
                <form method="POST" id="employee_upload_cv"> 
                    <div style="margin:20px;" class="row">
                        <div class="col-md-12">
                            <br>
                            <label for="userfile"> Select a file to upload</label> 
                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                <div class="form-control" data-trigger="fileinput"> 
                                    <i class="glyphicon glyphicon-file fileinput-exists"></i> 
                                    <span class="fileinput-filename"></span>
                                </div> 
                                <span class="input-group-addon btn btn-default btn-file"> 
                                    <span class="fileinput-new">Select file</span> 
                                    <span class="fileinput-exists">Change</span>
                                    <input type="file" id="cv_upload" name="cv_upload" required="" autofocus> 
                                </span> 
                                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                            </div>
                        </div>
                        <div class="col-md-12">
                            <br>
                            <input type="submit" value="Upload" class="btn btn-info" style="width:100%;"> 
                        </div>
                    </div>            
                </form>
            </div>
        </div>
    </div>
</div>
 
<div class="modal fade" id="add_form_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
   <div class="modal-dialog custom-modal" style="width: 100%;max-width: 1200px;">
      <div class="modal-content">
         <form method="POST" id="employee_form" enctype="multipart/form-data">
            <div class="modal-header">
               <h2 class="modal-title" id="exampleModalLabel">Employee Requirements</h2>
               <button type="button" class="close close-modal-create" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-sm-6">
                     <div class="white-box">
                        <div class="form-body">
                           <div class="row image-upload">
                              <div class="white-box edit_preview_profile_wrapper">
                                 <img id="cv_preview" class="preview_profile image-preview" name="employee_img_cv">
                              </div>
                              <div class="col-md-12 ">
                                 <div class="form-group">
                                    <label>CURRICULUM VITAE / RESUME<span class="text-muted" style="font-size:11px"></span></label>
                                    <div>
                                       <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                          <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                          <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                          <input type="file" name="employee_img_cv" id="employee_img_cv" autofocus></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row image-upload">
                              <div class="white-box edit_preview_profile_wrapper">
                                 <img id="passport_preview" class="preview_profile image-preview" name="employee_img_passport">
                              </div>
                              <div class="col-md-12 ">
                                 <div class="form-group">
                                    <label>Clear scan of passport or any government ID with picture and signature<br><span class="text-muted" style="font-size:11px">Passport is preferred</span></label>
                                    <div>
                                       <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                          <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                          <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                          <input type="file" name="employee_img_passport" id="employee_img_passport" autofocus> </span> 
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row image-upload">
                              <div class="white-box edit_preview_profile_wrapper">
                                 <img id="tin_preview" class="preview_profile image-preview" name="employee_img_tin">
                              </div>
                              <div class="col-md-12 ">
                                 <div class="form-group">
                                    <label>Tax Identification Number (TIN)<br><span class="text-muted" style="font-size:11px">ID preferred</span></label>
                                    <div>
                                       <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                          <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                          <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                          <input type="file" name="employee_img_tin" id="employee_img_tin" autofocus> </span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row image-upload">
                              <div class="white-box edit_preview_profile_wrapper">
                                 <img id="sss_preview" class="preview_profile  image-preview" name="employee_img_sss">
                              </div>
                              <div class="col-md-12 ">
                                 <div class="form-group">
                                    <label>SSS Number<br><span class="text-muted" style="font-size:11px">ID preferred</span></label>
                                    <div>
                                       <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                          <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                          <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                          <input type="file" name="employee_img_sss" id="employee_img_sss" autofocus> </span> 
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row image-upload">
                              <div class="white-box edit_preview_profile_wrapper">
                                 <img id="phil_preview" class="preview_profile  image-preview" name="employee_img_philhealth">
                              </div>
                              <div class="col-md-12 ">
                                 <div class="form-group">
                                    <label>Philhealth Number<br><span class="text-muted" style="font-size:11px">ID preferred</span></label>
                                    <div>
                                       <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                          <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                          <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                          <input type="file" name="employee_img_philhealth" id="employee_img_philhealth" autofocus> </span> 
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row image-upload">
                              <div class="white-box edit_preview_profile_wrapper">
                                 <img id="medical_preview" class="preview_profile  image-preview" name="employee_img_medical">
                              </div>
                              <div class="col-md-12 ">
                                 <div class="form-group">
                                    <label>Medical<br><span class="text-muted" style="font-size:11px">ID preferred</span></label>
                                    <div>
                                       <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                          <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                          <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                          <input type="file" name="employee_img_medical" id="employee_img_medical" autofocus> </span> 
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="white-box">
                        <div class="form-body">
                           <div class="row image-upload">
                              <div class="white-box edit_preview_profile_wrapper">
                                 <img id="pagibig_preview" class="preview_profile image-preview" name="employee_img_pagibig">
                              </div>
                              <div class="col-md-12 ">
                                 <div class="form-group">
                                    <label>Pagibig (HDMF) Number<br><span class="text-muted" style="font-size:11px">ID preferred</span></label>
                                    <div>
                                       <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                          <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                          <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                          <input type="file" name="employee_img_pagibig" id="employee_img_pagibig" autofocus> </span> 
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row image-upload">
                              <div class="white-box edit_preview_profile_wrapper">
                                 <img id="signature_preview" class="preview_profile  image-preview" name="employee_img_signature">
                              </div>
                              <div class="col-md-12 ">
                                 <div class="form-group">
                                    <label>Three specimen signatures on white bondpaper<br><span class="text-muted" style="font-size:11px"></span></label>
                                    <div>
                                       <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                          <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                          <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                          <input type="file" name="employee_img_signature" id="employee_img_signature" autofocus> </span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row image-upload">
                              <div class="white-box edit_preview_profile_wrapper">
                                 <img id="bpi_preview" class="preview_profile  image-preview" name="employee_img_bpi">
                              </div>
                              <div class="col-md-12 ">
                                 <div class="form-group">
                                    <label>BPI ATM Account Number<br><span class="text-muted" style="font-size:11px">ATM Card / Slip Required</span></label>
                                    <div>
                                       <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                          <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                          <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                          <input type="file" name="employee_img_bpi" id="employee_img_bpi" autofocus> </span> 
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- <div class="row">
                              <div class="col-md-6">
                                  <label>Medical / Physical Exam</label>
                                  <div class="form-group">
                                      <label><span class="text-muted" style="font-size:11px">Fit to Work</span></label>
                                      <div>
                                          <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                              <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                                  <input type="file" name="freelancer_profile" id="freelancer_profile_add" autofocus> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                          </div>
                                      </div>
                                      <label><span class="text-muted" style="font-size:11px">CBC</span></label>
                                      <div>
                                          <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                              <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                                  <input type="file" name="freelancer_profile" id="freelancer_profile_add" autofocus> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                          </div>
                                      </div>
                                      <label><span class="text-muted" style="font-size:11px">Urinalysis</span></label>
                                      <div>
                                          <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                              <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                                  <input type="file" name="freelancer_profile" id="freelancer_profile_add" autofocus> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <br>
                                  <div class="form-group">
                                      <label><span class="text-muted" style="font-size:11px">Fecalysis</span></label>
                                      <div>
                                          <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                              <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                                  <input type="file" name="freelancer_profile" id="freelancer_profile_add" autofocus> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                          </div>
                                      </div>
                                      <label><span class="text-muted" style="font-size:11px">X-Ray</span></label>
                                      <div>
                                          <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                              <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                                  <input type="file" name="freelancer_profile" id="freelancer_profile_add" autofocus> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                          </div>
                                      </div>
                                      <label><span class="text-muted" style="font-size:11px">ECG for those older than 45 years old</span></label>
                                      <div>
                                          <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                              <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                                  <input type="file" name="freelancer_profile" id="freelancer_profile_add" autofocus> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label><span class="text-muted" style="font-size:11px">Drug Test</span></label>
                                      <div>
                                          <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                              <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                                  <input type="file" name="freelancer_profile" id="freelancer_profile_add" autofocus> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              </div> -->
                           <div class="row image-upload">
                              <div class="white-box edit_preview_profile_wrapper">
                                 <img id="nbi_preview" class="preview_profile  image-preview" name="employee_img_nbi">
                              </div>
                              <div class="col-md-12 ">
                                 <div class="form-group">
                                    <label>NBI Clearance / Police Clearance<br><span class="text-muted" style="font-size:11px">(for Limay)</span></label>
                                    <div>
                                       <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                          <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                          <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                          <input type="file" name="employee_img_nbi" id="employee_img_nbi" autofocus> </span> 
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row image-upload">
                              <div class="white-box edit_preview_profile_wrapper">
                                 <img id="rtpcr_preview" class="preview_profile image-preview" name="employee_img_swab">
                              </div>
                              <div class="col-md-12 ">
                                 <div class="form-group">
                                    <label>RT-PCR Test<br><span class="text-muted" style="font-size:11px">(Swab Test)</span></label>
                                    <div>
                                       <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                          <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                          <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                          <input type="file" name="employee_img_swab" id="employee_img_swab" autofocus> </span> 
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
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
               <button type="submit" class="btn btn-primary">Submit</button>
            </div>
         </form>
      </div>
   </div>
</div>

<!-- <div class="modal fade" id="profile_picture_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog custom-modal">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="modalLabel">Change Profile</h4>
            <button type="button" class="close close-modal-create" data-dismiss="modal">
            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
            </button>
         </div>
         <div class="modal-body">
            <form id="upload_profile" method="POST" enctype="multipart/form-data">
               <div style="margin:20px;" class="row">
                  <div class="col-md-12" style="text-align: center">
                     <img style="max-width: 100%;max-height: 100%;border-radius: 50%;width: 200px;height: 200px;object-fit: cover;" id="profile_picture_preview">
                  </div>
                  <div class="col-md-12">
                     <br>
                     <label for="userfile"> Select a file to upload</label>
                     <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                        <div class="form-control" data-trigger="fileinput">
                           <i class="glyphicon glyphicon-file fileinput-exists"></i>
                           <span class="fileinput-filename"></span>
                        </div>
                        <span class="input-group-addon btn btn-default btn-file">
                        <span class="fileinput-new">Select file</span>
                        <span class="fileinput-exists">Change</span>
                        <input type="file" name="picture" id="change_picture" required="" autofocus accept="image/x-png,image/gif,image/jpeg">
                        </span>
                        <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                     </div>
                  </div>
                  <div class="col-md-12 ">
                     <br>
                     <input type="submit" value="submit" class="btn btn-info" style="width:100%;">
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div> -->

<div class="modal fade" id="edit_form_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
   <div class="modal-dialog custom-modal" style="width: 100%;max-width: 1200px;">
      <div class="modal-content">
         <form method="POST" id="freelancer_edit_form">
            <div class="modal-header">
               <h2 class="modal-title" id="exampleModalLabel">Edit Freelancer</h2>
               <button type="button" class="close close-modal-create" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-sm-6">
                     <div class="white-box">
                        <div class="form-body">
                           <div class="row">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Firstname</label>
                                    <input type="text" name="employee_first_name" class="form-control" placeholder="Firstname" required>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Middlename</label>
                                    <input type="text" name="employee_middle_name" class="form-control" placeholder="Middlename">
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Lastname</label>
                                    <input type="text" name="employee_last_name" class="form-control" placeholder="Lastname" required>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Mobile Number</label>
                                    <input type="text" name="freelancer_contact" class="form-control" placeholder="Mobile Number">
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Personal Email</label>
                                    <input type="text" name="freelancer_email" class="form-control" placeholder="Personal Email">
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Birthday</label>
                                    <div class="input-group">
                                       <input autocomplete="off" type="text" class="form-control datepicker-autoclose" name="freelancer_birthdate" placeholder="yyyy-mm-dd"> <span class="input-group-addon"><i class="icon-calender"></i></span>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Civil Status</label>
                                    <select name="freelancer_civil_status" class="form-control">
                                       <?php $status = array("Single", "Married", "Widowed", "Separated", "Divorced");
                                          foreach ($status as $value) { ?>
                                       <option value="<?= $value; ?>"><?= $value; ?></option>
                                       <?php } ?>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Street / house no.</label>
                                    <input type="text" class="form-control" name="freelancer_barangay_street" placeholder="Street / house no.">
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>City</label>
                                    <input type="text" class="form-control" name="freelancer_city" placeholder="City">
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Province</label>
                                    <input type="text" class="form-control" name="freelancer_province" placeholder="Province">
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Zip code</label>
                                    <input type="text" class="form-control" name="freelancer_zip_code" placeholder="Zip code">
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Position</label>
                                    <input type="text" class="form-control" name="freelancer_position" placeholder="Position">
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Site Deployment</label><br>
                                    <input type="radio" id="edit_limay" name="freelancer_site_deployment" value="limay">
                                    <label for="edit_limay">Limay</label><br>
                                    <input type="radio" id="edit_mariveles" name="freelancer_site_deployment" value="mariveles">
                                    <label for="edit_mariveles">Mariveles</label><br>
                                    <input type="radio" id="edit_others" name="freelancer_site_deployment" value="others">
                                    <label for="edit_others">Others</label>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div id="edit-site-deployment-others-panel" class="form-group hide">
                                    <label>Site Deployment Others</label>
                                    <input type="text" class="form-control" name="freelancer_site_deployment_others" placeholder="Site Deployment Others">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="white-box">
                        <h3 class="box-title m-b-0">In Case of Emergency</h3>
                        <p class="text-muted m-b-30 font-13">Emergency contact details</p>
                        <div class="form-body">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Contact Name</label>
                                    <input type="text" name="freelancer_emergency_contact_name" class="form-control" placeholder="Contact Name">
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Relationship</label>
                                    <input type="text" name="freelancer_emergency_relationship" class="form-control" placeholder="Relationship">
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Contact Number</label>
                                    <input type="text" name="freelancer_emergency_contact_num" class="form-control" placeholder="Contact Number">
                                 </div>
                              </div>
                              <!-- <div class="col-md-6">
                                 <div class="form-group">
                                     <label>Email</label>
                                     <input type="text" name="freelancer_emergency_email" class="form-control" placeholder="Email">
                                 </div>
                                 </div> -->
                           </div>
                        </div>
                     </div>
                     <div class="white-box">
                        <div class="form-body">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>BPI</label>
                                    <input type="text" name="employee_bpi_number" class="form-control" placeholder="BPI">
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>TIN</label>
                                    <input type="text" name="employee_tin_number" class="form-control" placeholder="TIN">
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>SSS</label>
                                    <input type="text" name="employee_sss_number" class="form-control" placeholder="SSS">
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>PAG-IBIG</label>
                                    <input type="text" name="employee_pagibig_number" class="form-control" placeholder="PAG_IBIG">
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>PHILHEALTH</label>
                                    <input type="text" name="employee_phealth_number" class="form-control" placeholder="PHILHEALTH">
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <div class="checkbox checkbox-danger m-b-20">
                                       <input type="checkbox" id="edit_freelancer_handbook" name="freelancer_handbook">
                                       <label for="edit_freelancer_handbook">Handbook</label>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <div class="checkbox checkbox-danger m-b-20">
                                       <input type="checkbox" id="edit_freelancer_employment_contract" name="freelancer_employment_contract">
                                       <label for="edit_freelancer_employment_contract">Employment Contract</label>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <div class="checkbox checkbox-danger m-b-20">
                                       <input type="checkbox" id="edit_freelancer_id_badges" name="freelancer_id_badges">
                                       <label for="edit_freelancer_id_badges">ID Badges</label>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
               <button type="submit" class="btn btn-primary">Update</button>
            </div>
         </form>
      </div>
   </div>
</div>

<div class="modal fade" id="change_password_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="modalLabel">Change Password</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data" id="change_password_form"> 
                    <div style="margin:20px;" class="row">
                        <div class="col-md-12">
                            <label for="password"> Old Password</label> 
                            <input type="password" name="current_password" id="current_password" class="form-control"> 
                        </div>
                        <div class="col-md-12 m-t-10">
                            <label for="password"> New Password</label> 
                            <input type="password" name="new_password" id="new_password" class="form-control"> 
                        </div>
                        <div class="col-md-12" style="margin-top: 10px;">
                            <label for="password"> Confirm Password</label> 
                            <input type="password" name="confirm_new_password" id="confirm_new_password" class="form-control"> 
                        </div>
                        <div class="col-md-12 ">
                            <br>
                            <input type="submit" value="Change Password" class="btn btn-info" style="width:100%;"> 
                        </div>
                    </div>            
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="files_picture_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <form id="upload_files" method="POST" enctype="multipart/form-data">
               <div style="margin:20px;" class="row">
                  <div class="col-md-12" style="text-align: center">
                     <img id="files_picture_preview" style="width:100%;">
                  </div>
                  <!-- <div class="col-md-12">
                      <br>
                      <label for="userfile"> Select a file to update</label>
                      <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                         <div class="form-control" data-trigger="fileinput">
                            <i class="glyphicon glyphicon-file fileinput-exists"></i>
                            <span class="fileinput-filename"></span>
                         </div>
                         <span class="input-group-addon btn btn-default btn-file">
                         <span class="fileinput-new">Select file</span>
                         <span class="fileinput-exists">Change</span>
                         <input type="file" name="picture" id="change_picture" required="" autofocus accept="image/x-png,image/gif,image/jpeg">
                         </span>
                         <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                      </div>
                   </div>
                   <div class="col-md-12 ">
                      <br>
                      <input type="submit" value="submit" class="btn btn-info" style="width:100%;">
                   </div> -->
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="profile_picture_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="modalLabel">Change Profile</h4>
            </div>
            <div class="modal-body">
                <form id="upload_profile" method="POST" enctype="multipart/form-data"> 
                    <div style="margin:20px;" class="row">
                        <div class="col-md-12">
                            <img style="max-width:100%;max-height:100%;border-radius:50%;margin-right: auto;margin-left: auto;display: block;" id="profile_picture_preview">
                        </div>
                        <div class="col-md-12">
                            <br>
                            <label for="userfile"> Select a file to upload</label> 
                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                <div class="form-control" data-trigger="fileinput"> 
                                    <i class="glyphicon glyphicon-file fileinput-exists"></i> 
                                    <span class="fileinput-filename"></span>
                                </div> 
                                <span class="input-group-addon btn btn-default btn-file"> 
                                    <span class="fileinput-new">Select file</span> 
                                    <span class="fileinput-exists">Change</span>
                                    <input type="file" name="picture" id="change_picture" required="" autofocus accept="image/x-png,image/gif,image/jpeg"> 
                                </span> 
                                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                            </div>
                        </div>
                        <div class="col-md-12">
                            <br>
                            <input type="submit" value="submit" class="btn btn-info" style="width:100%;"> 
                        </div>
                    </div>            
                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?=base_url()?>asset/components/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>asset/src/employee/profile.js?v=1.2"></script>