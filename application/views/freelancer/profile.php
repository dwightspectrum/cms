<div class="container-fluid">
   <div class="row bg-title">
      <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
         <h4 class="page-title">Profile</h4>
      </div>
      <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
         <ol class="breadcrumb">
            <li><a href="<?= base_url() ?>dashboard/freelancer_view">Dashboard</a></li>
            <li class="active">Profile</li>
         </ol>
      </div>
   </div>
   <div class="row">
      <div class="col-md-4 col-xs-12">
         <div class="white-box"> 
            <div class="user-bg">
               <img width="100%" alt="user" src="<?= base_url() ?>asset/components/images/screw.jpeg">
               <div class="overlay-box">
                  <div class="user-content">
                     <a href="javascript:void(0)"><img id="profile_pic" style="object-fit: cover;" class="thumb-lg img-circle" alt="img"></a>
                     <span class="profile_fullname" id="profile_fullname" style="display: none;"></span>
                     <h3 class="text-white" id="profile_fullname_2"></h3>
                     <h5 class="text-white" id="profile_street"></h5>
                  </div>
               </div>
            </div>
            <div class="user-btm-box">
               <div class="col-md-6 col-sm-12 text-center">
                  <h3 class="text-purple"><i class="fa fa-phone"></i></h3>
                  <h4 id="profile_mobile"></h4> 
               </div>
               <div class="col-md-6 col-sm-12 text-center">
                  <h3 class="text-blue"><i class="fa fa-phone-square"></i></h3>
                  <h4 id="profile_emergency_num"></h4>
               </div>
               <div class="col-md-12 col-sm-12 text-center">
                  <h3 class="text-danger"><i class="fa fa-envelope-o"></i></h3>
                  <h3 id="profile_email"></h3>
               </div>
               <div class="user-btm-box">
                    <div class="col-md-12 col-sm-12 text-center">
                        <a class="btn btn-info btn-outline btn-rounded" id="change-password" style="width:100%;"><span class="fa fa-key"></span> Change Password</a>
                    </div>
                    <div class="col-md-12 col-sm-12 text-center">
                        <br>
                        <a class="btn btn-primary btn-outline btn-rounded change-picture" id="change-picture" style="width:100%;"><span class="fa fa-image"></span> Change Picture</a>
                    </div>
                </div>
               <?php if ($isAdmin) { ?>
               <div class="col-md-12 col-sm-12 text-center">
                  <br>
                  <a class="btn btn-danger btn-outline btn-rounded" id="delete-account-btn" style="width:100%;"><span class="fa fa-trash"></span> Delete Account</a>
               </div>
               <?php } ?>
            </div>
         </div>
      </div>
      <div class="col-md-8 col-xs-12">
         <div class="white-box">
         <ul class="nav nav-tabs tabs customtab">
            <li class="active tab">
               <a href="#personal" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-home"></i></span> <span class="hidden-xs">Personal Details</span> </a>
            </li>
            <li class="tab">
               <a href="#vitae" data-toggle="tab" aria-expanded="true"> <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> <span class="hidden-xs">Curriculum Vitae</span> </a>
            </li>
            <li class="tab">
               <a href="#job" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-home"></i></span> <span class="hidden-xs">Job History</span> </a>
            </li>
            <li class="tab">
               <a href="#requirements" data-toggle="tab" aria-expanded="true"> <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> <span class="hidden-xs">Requirements</span> </a>
            </li>   
         </ul>
         <div class="tab-content">
            <div class="tab-pane active" id="personal">
               <div>
                  <div class="pull-right">
                     <button class="btn btn-primary btn-rounded btn-outline" id="btn-update">Update</button>
                  </div>
                  <h3 class="box-title m-b-0 text-danger">Personal Details</h3>
               </div>
               <br>
         
               <div class="row">
                  <div class="col-md-3 col-xs-6 b-r">
                     <strong>Firstname</strong>
                     <br>
                     <p class="text-muted" id="profile_firstname" personal-name="freelancer_first_name"></p>
                  </div>
                  <div class="col-md-3 col-xs-6 b-r">
                     <strong>Middlename</strong>
                     <br>
                     <p class="text-muted" id="profile_middlename" personal-name="freelancer_middle_name"></p>
                  </div>
                  <div class="col-md-3 col-xs-6 b-r">
                     <strong>Lastname</strong>
                     <br>
                     <p class="text-muted" id="profile_lastname" personal-name="freelancer_last_name"></p>
                  </div>
                  <div class="col-md-3 col-xs-6">
                     <strong>Birthday</strong>
                     <br>
                     <p class="text-muted" id="profile_birthdate" personal-name="freelancer_birthdate"></p>
                  </div>
               </div>
               <hr>
               <div class="row">
                  <div class="col-md-3 col-xs-6 b-r">
                     <strong>Mobile Number</strong>
                     <br>
                     <p class="text-muted" id="profile_contact_num" personal-name="freelancer_contact"></p>
                  </div>
                  <div class="col-md-3 col-xs-6 b-r">
                     <strong>Position</strong>
                     <br>
                     <p class="text-muted" id="profile_position" personal-name="freelancer_position"></p>
                  </div>
                  <div class="col-md-3 col-xs-6 b-r">
                     <strong>Civil Status</strong>
                     <br>
                     <p class="text-muted" id="profile_status" personal-name="freelancer_civil_status"></p>
                  </div>
                  <div class="col-md-3 col-xs-6 b-r">
                     <strong>City Address</strong>
                     <br>
                     <p class="text-muted" id="profile_city" personal-name="freelancer_city"></p>
                  </div>
               </div>
               <hr>
               <div class="row">
                  <div class="col-md-3 col-xs-6">
                     <strong>Provincial Address</strong>
                     <br>
                     <p class="text-muted" id="profile_province" personal-name="freelancer_province"></p>
                  </div>
                  <div class="col-md-3 col-xs-6 b-r">
                     <strong>Site Deployment</strong>
                     <br>
                     <p class="text-muted" id="profile_site_deployment" personal-name="freelancer_site_deployment"></p>
                  </div>
               </div>
               <hr>
               <h3 class="box-title m-b-0 text-danger">In Case of Emergency</h3>
               <br>
               <div class="row">
                  <div class="col-md-6 col-xs-6 b-r">
                     <strong>Contact Name</strong>
                     <br>
                     <p class="text-muted" id="profile_em_name" personal-name="freelancer_emergency_contact_name"></p>
                  </div>
                  <div class="col-md-6 col-xs-6 b-r">
                     <strong>Relationship</strong>
                     <br>
                     <p class="text-muted" id="profile_em_rel" personal-name="freelancer_emergency_relationship"></p>
                  </div>
               </div>
               <hr>
               <div class="row">
                  <div class="col-md-6 col-xs-6 b-r">
                     <strong>Contact Number</strong>
                     <br>
                     <p class="text-muted" id="profile_em_cnum" personal-name="freelancer_emergency_contact_num"></p>
                  </div>
               </div>
               <hr>
               <div class="row">
                  <div class="col-md-6 col-xs-6 b-r">
                     <strong>Employment Contract</strong>
                     <br>
                     <p class="text-muted" id="profile_employment_contract"></p>
                  </div>
                  <div class="col-md-6 col-xs-6 b-r">
                     <strong>ID Badges</strong>
                     <br>
                     <p class="text-muted" id="profile_id_badges"></p>
                  </div>
               </div>
               <hr>
               <div class="row">
                  <div class="col-md-6 col-xs-6 b-r">
                     <strong>Handbook</strong>
                     <br>
                     <p class="text-muted" id="profile_handbook"></p>
                  </div>
               </div>
            </div>
            <div class="tab-pane" id="vitae">
               <div>
                     <div class="pull-right">
                        <!-- <a id="upload_resume" class="btn btn-primary btn-rounded btn-outline">Upload</a> -->
                        <a href="<?=base_url()?>freelancer/download_resume/<?=$freelancer->freelancer_id?>" class="btn btn-success btn-rounded btn-outline" target="_blank">Download</a>
                        <a href="<?=base_url()?>freelancer/curriculum_vitae/<?=$freelancer->freelancer_id?>" class="btn btn-primary btn-rounded btn-outline">Update</a>
                     </div>
                     <h3 class="box-title m-b-0 text-danger">Curriculum Vitae</h3>
               </div>
               <br>
               <div class="row">
                     <div class="col-md-3 col-xs-12"> <strong>Last Name</strong></div>
                     <div class="col-md-9 col-xs-12 b-r text-muted"> <?=$freelancer->freelancer_last_name?></div>
               </div>
               <hr>
               <div class="row">
                     <div class="col-md-3 col-xs-12"> <strong>First Name</strong></div>
                     <div class="col-md-9 col-xs-12 b-r text-muted"> <?=$freelancer->freelancer_first_name?></div>
               </div>
               <hr>
               <div class="row">
                     <div class="col-md-3 col-xs-12"> <strong>Middle Name</strong></div>
                     <div class="col-md-9 col-xs-12 b-r text-muted"> <?=$freelancer->freelancer_middle_name?></div>
               </div>
               <hr>
               <div class="row">
                     <div class="col-md-3 col-xs-12"> <strong>Complete Address</strong></div>
                     <div class="col-md-9 col-xs-12 b-r text-muted"> <?=$freelancer->freelancer_city?></div>
               </div>
               <hr>
               <div class="row">
                     <div class="col-md-3 col-xs-12"><strong>ZIP Code</strong></div>
                     <div class="col-md-9 col-xs-12 text-muted"><?php echo ($cv != null) ? $cv->freelancer_address_zip_code: "";?></div>
               </div>
               <hr>
               <div class="row">
                     <div class="col-md-3 col-xs-12"> <strong>Date of Birth</strong></div>
                     <div class="col-md-9 col-xs-12 b-r text-muted"> <?=$freelancer->freelancer_birthdate?></div>
               </div>
               <hr>
               <div class="row">
                     <div class="col-md-3 col-xs-12"> <strong>Contact No.</strong></div>
                     <div class="col-md-9 col-xs-12 b-r text-muted"> <?=$freelancer->freelancer_contact?></div>
               </div>
               <hr>
               <div class="row">
                     <div class="col-md-3 col-xs-12"> <strong>Email Address</strong></div>
                     <div class="col-md-9 col-xs-12 b-r text-muted"> <?=$freelancer->freelancer_email?></div>
               </div>
               <hr>
               <div class="row">
                     <div class="col-md-3 col-xs-12"> <strong>Marital Status</strong></div>
                     <div class="col-md-9 col-xs-12 b-r text-muted"> <?=$freelancer->freelancer_civil_status?></div>
               </div>
               <hr>
               <div class="row">
                     <div class="col-md-3 col-xs-12"> <strong>Desired Position</strong></div>
                     <div class="col-md-9 col-xs-12 text-muted"><?php echo ($cv != null) ? $cv->freelancer_desired_position: "";?></div>
               </div>
               <hr>
               <div class="row">
                     <div class="col-md-3 col-xs-12"> <strong>Emergency Contact</strong></div>
                     <div class="col-md-9 col-xs-12 b-r text-muted"> <?=$freelancer->freelancer_emergency_contact_name?></div>
               </div>
               <hr>
               <div class="row">
                     <div class="col-md-3 col-xs-12"> <strong>Contact No. of Emergency Contact</strong></div>
                     <div class="col-md-9 col-xs-12 b-r text-muted"> <?=$freelancer->freelancer_emergency_contact_num?></div>
               </div>
               <hr>
               <div class="row">
                     <div class="col-md-3 col-xs-12"> <strong>Relationship</strong></div>
                     <div class="col-md-9 col-xs-12 b-r text-muted"> <?=$freelancer->freelancer_emergency_relationship?></div>
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
                                 <td><?=$skill->freelancer_skill_name;?></td>
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
                                 <td><?=$reference->freelancer_reference_name;?></td>
                                 <td><?=$reference->freelancer_reference_company;?></td>
                                 <td><?=$reference->freelancer_reference_position;?></td>
                                 <td><?=$reference->freelancer_reference_contact_no;?></td>
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
            <div class="tab-pane" id="job">
            <div>
               <div class="pull-right">
                  <a href="<?=base_url()?>freelancer/job_history/<?=$freelancer->freelancer_id?>" class="btn btn-primary btn-rounded btn-outline">Update</a>
                  <a href="<?=base_url()?>freelancer/download_job_history/<?=$freelancer->freelancer_id?>" class="btn btn-success btn-rounded btn-outline" target="_blank">Download</a>
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
                        <?php $ctr=1; foreach($freelancer_job_history as $jh){?>
                        <tr>
                           <td><?=$ctr;?></td>
                           <td><?=$jh->freelancer_job_history_client;?></td>
                           <td><?=$jh->freelancer_job_history_scope;?></td>
                           <td><?=$jh->freelancer_job_location;?></td>
                           <td><?=$jh->freelancer_job_address;?><?=$jh->freelancer_job_country;?></td>
                           <td><?=$jh->freelancer_job_departure_date;?><?=$jh->freelancer_job_entry_date;?></td>
                           <td><?=$jh->freelancer_job_return_date;?><?=$jh->freelancer_job_exit_date;?></td>
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
               <br>  
               
               <!-- Requirements -->
               <div id="requirements-wrapper">

                  <div class="row" >
                     <div class="col-md-3 col-xs-12"> 
                        <p>
                           <strong>Tax Identification Number</strong>
                        </p>
                        <span class="text-muted" requirement="freelancer_TIN"></span>
                     </div>
                     <span class="col-md-3 col-xs-12">
                        <p>
                           <strong>Attach image</strong>
                        </p>
                        <span id="tin-picture" style="cursor: pointer;" class="text-primary">
                           <span class="fa fa-image m-r-5"></span>
                           <a > 
                              <span class="attach_image link_img" id="freelancer_img_TIN" >
                           </a>
                           <strong class="" id="freelancer_img_TIN_filename"></strong>
                           </span>
                        </span>
                     </span>
                     <span class="disable_tin">
                        <div class="m-t-15">
                           <span>
                           <a title="View" class="btn btn-info btn-sm m-r-5 btn-info view_button" id="freelancer_img_TIN">
                              <i class="fa fa-eye"></i>
                           </a>
                           <a title="Download" class="btn btn-primary btn-sm m-r-5 btn-primary download_btn" id="freelancer_img_TIN" >
                              <i class="fa fa-download"></i>
                           </a>
                           <a id="delete_tin" href="#" title="Delete" class="btn btn-danger btn-sm m-r-5 btn-delete delete_img">
                              <i class="fa fa-trash"></i>
                           </a>
                        </div>
                     </span>
                  </div>
                  <hr>
                  <div class="row">
                     <div class="col-md-3 col-xs-12"> 
                        <p>
                           <strong>SSS Number</strong>
                        </p>
                        <span class="text-muted" requirement="freelancer_SSS"></span>
                     </div>
                     <span class="col-md-3 col-xs-12">
                        <p>
                           <strong>Attach image</strong>
                        </p>
                        <span id="sss-picture" style="cursor: pointer;" class="text-primary">
                           <span class="fa fa-image m-r-5"></span>
                           <a> 
                              <span class="attach_image link_img" id="freelancer_img_SSS"> 
                           </a>
                           <strong class="" id="freelancer_img_SSS_filename"></strong>
                           </span>
                        </span>
                     </span>
                     <span class="disable_sss">
                        <div class="m-t-15 ">
                           <a title="View" class="btn btn-info btn-sm m-r-5 btn-info view_button" id="freelancer_img_SSS">
                              <i class="fa fa-eye"></i>
                           </a>
                           <a title="Download" class="btn btn-primary btn-sm m-r-5 btn-primary download_btn" id="freelancer_img_SSS">
                              <i class="fa fa-download"></i>
                           </a>
                           <a id="delete_sss" href="#" title="Delete" class="btn btn-danger btn-sm m-r-5 btn-delete">
                              <i class="fa fa-trash"></i>
                           </a>
                        </div>
                     </span>
                  </div>
                  <hr>

                  <div class="row">
                     <div class="col-md-3 col-xs-12"> 
                        <p>
                           <strong>Pagibig Number</strong>
                        </p>
                        <span class="text-muted" requirement="freelancer_PAG_IBIG"></span>
                     </div>
                     <span class="col-md-3 col-xs-12">
                        <p>
                           <strong class="attach_image">Attach image</strong>
                        </p>
                        <span id="pagibig-picture" style="cursor: pointer;" class="text-primary">
                           <span class="fa fa-image m-r-5"></span>
                           <a> 
                              <span class="attach_image link_img" id="freelancer_img_PAG_IBIG"> 
                           </a> 
                           <strong class="" id="freelancer_img_PAG_IBIG_filename"></strong>
                           </span>
                        </span>
                     </span>
                    <span class="disable_pagibig">
                        <div class="m-t-15">
                           <a title="View" class="btn btn-info btn-sm m-r-5 btn-info view_button" id="freelancer_img_PAG_IBIG">
                              <i class="fa fa-eye"></i>
                           </a>
                           <a title="Download" class="btn btn-primary btn-sm m-r-5 btn-primary download_btn" id="freelancer_img_PAG_IBIG">
                              <i class="fa fa-download"></i>
                           </a>
                           <a id="delete_pagibig" href="#" title="Delete" class="btn btn-danger btn-sm m-r-5 btn-delete">
                              <i class="fa fa-trash"></i>
                           </a>
                        </div>
                     </span>
                  </div>
                  <hr>
                  <div class="row">
                     <div class="col-md-3 col-xs-12"> 
                        <p>
                           <strong>Philhealth Number</strong>
                        </p>
                        <span class="text-muted" requirement="freelancer_PHILHEALTH"></span>
                     </div>
                     <span class="col-md-3 col-xs-12">
                        <p>
                           <strong>Attach image</strong>
                        </p>
                        <span id="phil-picture" style="cursor: pointer;" class="text-primary">
                           <span class="fa fa-image m-r-5"></span>
                           <a> 
                              <span class="attach_image link_img" id="freelancer_img_PHILHEALTH"> 
                           </a>  
                           <strong class="" id="freelancer_img_PHILHEALTH_filename"></strong>
                           </span>
                        </span>
                     </span>
                     <span class="disable_philhealth">
                        <div class="m-t-15">
                           <a title="View" class="btn btn-info btn-sm m-r-5 btn-info view_button" id="freelancer_img_PHILHEALTH">
                              <i class="fa fa-eye"></i>
                           </a>
                           <a title="Download" class="btn btn-primary btn-sm m-r-5 btn-primary download_btn" id="freelancer_img_PHILHEALTH">
                              <i class="fa fa-download"></i>
                           </a>
                           <a id="delete_philhealth" href="#" title="Delete" class="btn btn-danger btn-sm m-r-5 btn-delete">
                              <i class="fa fa-trash"></i>
                           </a>
                        </div>
                     </span>
                  </div>
                  <hr>

                  <div class="row">
                     <div class="col-md-3 col-xs-12"> 
                        <p>
                           <strong>BPI ATM Account Number</strong>
                        </p>
                        <span class="text-muted" requirement="freelancer_BPI"></span>
                     </div>
                     <span class="col-md-3 col-xs-12">
                        <p>
                           <strong>Attach image</strong>
                        </p>
                        <span id="bpi-picture" style="cursor: pointer;" class="text-primary">
                           <span class="fa fa-image m-r-5"></span>
                           <a> 
                              <span class="attach_image link_img" id="freelancer_img_BPI"> 
                           </a> 
                           <strong class="" id="freelancer_img_BPI_filename"></strong>
                           </span>
                        </span>
                     </span>
                     <span class="disable_bpi">
                        <div class="m-t-15">
                           <a title="View" class="btn btn-info btn-sm m-r-5 btn-info view_button" id="freelancer_img_BPI">
                              <i class="fa fa-eye"></i>
                           </a>
                           <a title="Download" class="btn btn-primary btn-sm m-r-5 btn-primary download_btn" id="freelancer_img_BPI">
                              <i class="fa fa-download"></i>
                           </a>
                           <a id="delete_bpi" href="#" title="Delete" class="btn btn-danger btn-sm m-r-5 btn-delete">
                              <i class="fa fa-trash"></i>
                           </a>
                        </div>
                     </span>
                  </div>
                  <hr>
                  <div class="row">
                     <div class="col-md-3 col-xs-12"> 
                        <p>
                           <strong>Cirriculum Vitae</strong>
                        </p>
                        <span class="text-muted">Resume</span>
                     </div>
                     <span class="col-md-3 col-xs-12">
                        <p>
                           <strong>Attach image</strong>
                        </p>
                        <span id="cv-picture" style="cursor: pointer;" class="text-primary">
                           <span class="fa fa-image m-r-5"></span>
                           <a> 
                              <span class="attach_image link_img" id="freelancer_CV"> 
                           </a> 
                              <strong class="" id="freelancer_CV_filename"></strong>
                           </span>
                        </span>
                     </span>
                     <span class="disable_cv">
                        <div class="m-t-15">
                           <a title="View" class="btn btn-info btn-sm m-r-5 btn-info view_button" id="freelancer_CV">
                              <i class="fa fa-eye"></i>
                           </a>
                           <a title="Download" class="btn btn-primary btn-sm m-r-5 btn-primary download_btn" id="freelancer_CV">
                              <i class="fa fa-download"></i>
                           </a>
                           <a id="delete_cv" href="#" title="Delete" class="btn btn-danger btn-sm m-r-5 btn-delete">
                              <i class="fa fa-trash"></i>
                           </a>
                        </div>
                     </span>
                  </div>
                  <hr>

                  <div class="row">
                     <div class="col-md-3 col-xs-12"> 
                        <p>
                           <strong>Passport or Government ID</strong>
                        </p>
                        <span class="text-muted">Passport is preferred</span>
                     </div>
                     <span class="col-md-3 col-xs-12">
                        <p>
                           <strong>Attach image</strong>
                        </p>
                        <span id="passport-picture" style="cursor: pointer;" class="text-primary">
                           <span class="fa fa-image m-r-5"></span>
                           <a> 
                              <span class="attach_image link_img" id="freelancer_PASSPORT"> 
                           </a> 
                           <strong class="" id="freelancer_PASSPORT_filename"></strong>
                           </span>
                        </span>
                     </span>
                     <span class="disable_passport">
                        <div class="m-t-15">
                           <a title="View" class="btn btn-info btn-sm m-r-5 btn-info view_button" id="freelancer_PASSPORT">
                              <i class="fa fa-eye"></i>
                           </a>
                           <a title="Download" class="btn btn-primary btn-sm m-r-5 btn-primary download_btn" id="freelancer_PASSPORT">
                              <i class="fa fa-download"></i>
                           </a>
                           <a id="delete_passport" href="#" title="Delete" class="btn btn-danger btn-sm m-r-5 btn-delete">
                              <i class="fa fa-trash"></i>
                           </a>
                        </div>
                     </span>
                  </div>
                  <hr>

                  <div class="row">
                     <div class="col-md-3 col-xs-12"> 
                        <p>
                           <strong>Medical</strong>
                        </p>
                        <p class="text-muted">ID preferred</p>
                     </div>
                     <span class="col-md-3 col-xs-12">
                        <p>
                           <strong>Attach image</strong>
                        </p>
                        <span id="medical-picture" style="cursor: pointer;" class="text-primary">
                           <span class="fa fa-image m-r-5"></span>
                           <a> 
                              <span class="attach_image link_img" id="freelancer_medical"> 
                           </a> 
                           <strong class="" id="freelancer_medical_filename"></strong>
                           </span>
                        </span>
                     </span>
                     <span class="disable_medical">
                        <div class="m-t-15">
                           <a title="View" class="btn btn-info btn-sm m-r-5 btn-info view_button" id="freelancer_medical">
                              <i class="fa fa-eye"></i>
                           </a>
                           <a title="Download" class="btn btn-primary btn-sm m-r-5 btn-primary download_btn" id="freelancer_medical">
                              <i class="fa fa-download"></i>
                           </a>
                           <a id="delete_medical" href="#" title="Delete" class="btn btn-danger btn-sm m-r-5 btn-delete">
                              <i class="fa fa-trash"></i>
                           </a>
                        </div>
                     </span>
                  </div>
                  <hr>

                  <div class="row">
                     <div class="col-md-3 col-xs-12"> 
                        <p>
                           <strong>NBI Clearance / Police Clearance</strong>
                        </p>
                        <p class="text-muted">ID preferred</p>
                     </div>
                     <span class="col-md-3 col-xs-12">
                        <p>
                           <strong>Attach image</strong>
                        </p>
                        <span id="nbi-picture" style="cursor: pointer;" class="text-primary">
                           <span class="fa fa-image m-r-5"></span>
                           <a> 
                              <span class="attach_image link_img" id="freelancer_NBI_POLICE"> 
                           </a> 
                           <strong class="" id="freelancer_NBI_POLICE_filename"></strong>
                           </span>
                        </span>
                     </span>
                     <span class="disable_nbi">
                        <div class="m-t-15">
                           <a title="View" class="btn btn-info btn-sm m-r-5 btn-info view_button" id="freelancer_NBI_POLICE">
                              <i class="fa fa-eye"></i>
                           </a>
                           <a title="Download" class="btn btn-primary btn-sm m-r-5 btn-primary download_btn" id="freelancer_NBI_POLICE">
                              <i class="fa fa-download"></i>
                           </a>
                           <a id="delete_nbi" href="#" title="Delete" class="btn btn-danger btn-sm m-r-5 btn-delete">
                              <i class="fa fa-trash"></i>
                           </a>
                        </div>
                     </span>
                  </div>
                  <hr>

                  <div class="row">
                     <div class="col-md-3 col-xs-12"> 
                        <p>
                           <strong>RT-PCR Test</strong>
                        </p>
                        <span class="text-muted">Swab Test</span>
                     </div>
                     <span class="col-md-3 col-xs-12">
                        <p>
                           <strong>Attach image</strong>
                        </p>
                        <span id="rtpcr-picture" style="cursor: pointer;" class="text-primary">
                           <span class="fa fa-image m-r-5"></span>
                           <a> 
                              <span class="attach_image link_img" id="freelancer_RT_PCR"> 
                           </a> 
                           <strong class="" id="freelancer_RT_PCR_filename"></strong>
                           </span>
                        </span>
                     </span>
                     <span clas="disable_rtpcr">
                        <div class="m-t-15">
                           <a title="View" class="btn btn-info btn-sm m-r-5 btn-info view_button" id="freelancer_RT_PCR">
                              <i class="fa fa-eye"></i>
                           </a>
                           <a title="Download" class="btn btn-primary btn-sm m-r-5 btn-primary download_btn" id="freelancer_RT_PCR">
                              <i class="fa fa-download"></i>
                           </a>
                           <a id="delete_swab" href="#" title="Delete" class="btn btn-danger btn-sm m-r-5 btn-delete">
                              <i class="fa fa-trash"></i>
                           </a>
                        </div>
                     </span>
                  </div>
                  <hr>

                  <div class="row">
                     <div class="col-md-3 col-xs-12"> 
                        <p>
                           <strong>Signatures</strong>
                        </p>
                        <span class="text-muted">Three signatures</span>
                     </div>
                     <span class="col-md-3 col-xs-12">
                        <p>
                           <strong>Attach image</strong>
                        </p>
                        <span id="signature-picture" style="cursor: pointer;" class="text-primary">
                           <span class="fa fa-image m-r-5"></span>
                           <a> 
                              <span class="attach_image link_img" id="freelancer_SIGNATURES"> 
                           </a>  
                           <strong class="" id="freelancer_SIGNATURES_filename"></strong>
                           </span>
                        </span>
                     </span>
                     <span class="disable_signature">
                     <div class="m-t-15">
                        <a title="View" class="btn btn-info btn-sm m-r-5 btn-info view_button" id="freelancer_SIGNATURES">
                           <i class="fa fa-eye"></i>
                        </a>
                        <a title="Download" class="btn btn-primary btn-sm m-r-5 btn-primary download_btn" id="freelancer_SIGNATURES">
                           <i class="fa fa-download"></i>
                        </a>
                        <a id="delete_signature" href="#" id="delete_requirement" title="Delete" class="btn btn-danger btn-sm m-r-5 btn-delete">
                           <i class="fa fa-trash"></i>
                        </a>
                     </div>
                     </span>
                  </div>
               </div>
               <!-- Requirements -->
            </div>
         </div>
         
      </div>    
   </div>
</div>
</div>

<div class="modal fade" id="add_form_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
   <div class="modal-dialog custom-modal" style="width: 100%;max-width: 1200px;">
      <div class="modal-content">
         <form method="POST" id="freelancer_form">
            <div class="modal-header">
               <h2 class="modal-title" id="exampleModalLabel">Freelancer Requirements</h2>
               <button type="button" class="close close-modal-create" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-sm-6">
                     <div class="white-box">
                        <div class="form-body">
                           <div class="row image-upload">
                              <div class="white-box edit_preview_profile_wrapper">
                                 <img id="cv_preview" class="preview_profile image-preview" name="freelancer_CV">
                              </div>
                              <div class="col-md-12 ">
                                 <div class="form-group">
                                    <label>CURRICULUM VITAE / RESUME<span class="text-muted" style="font-size:11px"></span></label>
                                    <div>
                                       <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                          <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                          <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                          <input type="file" name="freelancer_CV" id="freelancer_CV" autofocus> </span> 
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row image-upload">.

                              <div class="white-box edit_preview_profile_wrapper">
                                 <img id="passport_preview" class="preview_profile  image-preview" name="freelancer_PASSPORT">
                              </div>
                              <div class="col-md-12 ">
                                 <div class="form-group">
                                    <label>Clear scan of passport or any government ID with picture and signature<br><span class="text-muted" style="font-size:11px">Passport is preferred</span></label>
                                    <div>
                                       <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                          <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                          <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                          <input type="file" name="freelancer_PASSPORT" id="freelancer_PASSPORT" autofocus> </span> 
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row image-upload">
                              <div class="white-box edit_preview_profile_wrapper">
                                 <img id="tin_preview" class="preview_profile  image-preview" name="freelancer_img_TIN">
                              </div>
                              <div class="col-md-12 ">
                                 <div class="form-group">
                                    <label>Tax Identification Number (TIN)<br><span class="text-muted" style="font-size:11px">ID preferred</span></label>
                                    <div>
                                       <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                          <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                          <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                          <input type="file" name="freelancer_img_TIN" id="freelancer_img_TIN" autofocus> </span> 
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row image-upload">
                              <div class="white-box edit_preview_profile_wrapper">
                                 <img id="sss_preview" class="preview_profile  image-preview" name="freelancer_img_SSS">
                              </div>
                              <div class="col-md-12 ">
                                 <div class="form-group">
                                    <label>SSS Number<br><span class="text-muted" style="font-size:11px">ID preferred</span></label>
                                    <div>
                                       <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                          <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                          <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                          <input type="file" name="freelancer_img_SSS" id="freelancer_img_SSS" autofocus> </span> 
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row image-upload">
                              <div class="white-box edit_preview_profile_wrapper">
                                 <img id="phil_preview" class="preview_profile  image-preview" name="freelancer_img_PHILHEALTH">
                              </div>
                              <div class="col-md-12 ">
                                 <div class="form-group">
                                    <label>Philhealth Number<br><span class="text-muted" style="font-size:11px">ID preferred</span></label>
                                    <div>
                                       <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                          <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                          <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                          <input type="file" name="freelancer_img_PHILHEALTH" id="freelancer_img_PHILHEALTH" autofocus> </span> 
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row image-upload">
                              <div class="white-box edit_preview_profile_wrapper">
                                 <img id="medical_preview" class="preview_profile  image-preview" name="freelancer_medical">
                              </div>
                              <div class="col-md-12 ">
                                 <div class="form-group">
                                    <label>Medical<br><span class="text-muted" style="font-size:11px">ID preferred</span></label>
                                    <div>
                                       <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                          <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                          <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                          <input type="file" name="freelancer_medical" id="freelancer_medical" autofocus> </span> 
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
                                 <img id="pagibig_preview" class="preview_profile image-preview" name="freelancer_img_PAG_IBIG">
                              </div>
                              <div class="col-md-12 ">
                                 <div class="form-group">
                                    <label>Pagibig (HDMF) Number<br><span class="text-muted" style="font-size:11px">ID preferred</span></label>
                                    <div>
                                       <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                          <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                          <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                          <input type="file" name="freelancer_img_PAG_IBIG" id="freelancer_img_PAG_IBIG" autofocus> </span> 
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row image-upload">
                              <div class="white-box edit_preview_profile_wrapper">
                                 <img id="signature_preview" class="preview_profile  image-preview">
                              </div>
                              <div class="col-md-12 ">
                                 <div class="form-group">
                                    <label>Three specimen signatures on white bondpaper<br><span class="text-muted" style="font-size:11px"></span></label>
                                    <div>
                                       <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                          <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                          <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                          <input type="file" name="freelancer_SIGNATURES" id="freelancer_SIGNATURES" autofocus> </span> 
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row image-upload">
                              <div class="white-box edit_preview_profile_wrapper">
                                 <img id="bpi_preview" class="preview_profile  image-preview">
                              </div>
                              <div class="col-md-12 ">
                                 <div class="form-group">
                                    <label>BPI ATM Account Number<br><span class="text-muted" style="font-size:11px">ATM Card / Slip Required</span></label>
                                    <div>
                                       <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                          <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                          <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                          <input type="file" name="freelancer_img_BPI" id="freelancer_img_BPI" autofocus> </span> 
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
                                 <img id="nbi_preview" class="preview_profile  image-preview">
                              </div>
                              <div class="col-md-12 ">
                                 <div class="form-group">
                                    <label>NBI Clearance / Police Clearance<br><span class="text-muted" style="font-size:11px">(for Limay)</span></label>
                                    <div>
                                       <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                          <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                          <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                          <input type="file" name="freelancer_NBI_POLICE" id="freelancer_NBI_POLICE" autofocus> </span> 
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row image-upload">
                              <div class="white-box edit_preview_profile_wrapper">
                                 <img id="rtpcr_preview" class="preview_profile image-preview">
                              </div>
                              <div class="col-md-12 ">
                                 <div class="form-group">
                                    <label>RT-PCR Test<br><span class="text-muted" style="font-size:11px">(Swab Test)</span></label>
                                    <div>
                                       <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                          <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                          <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                          <input type="file" name="freelancer_RT_PCR" id="freelancer_RT_PCR" autofocus> </span> 
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <br>
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
                                    <input type="text" name="freelancer_first_name" class="form-control" placeholder="Firstname" >
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Middlename</label>
                                    <input type="text" name="freelancer_middle_name" class="form-control" placeholder="Middlename" >
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Lastname</label>
                                    <input type="text" name="freelancer_last_name" class="form-control" placeholder="Lastname" >
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Mobile Number</label>
                                    <input type="text" name="freelancer_contact" class="form-control" placeholder="Mobile Number" required>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Personal Email</label>
                                    <input type="email" name="freelancer_email" class="form-control" placeholder="Personal Email" autofocus required title="Please enter valid E-mail">
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
                                    <input type="text" class="form-control" name="freelancer_zip_code" placeholder="Zip code" />
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
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Site Deployment</label><br>
                                    <input type="text" class="form-control" name="freelancer_site_deployment" placeholder="Site Deployment">
                                 </div>
                              </div>
                           </div>
                           <div class="white-box">
                        <div class="form-body">
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
                  <div class="col-sm-6">
                     <div class="white-box">
                        <h3 class="box-title m-b-0">In Case of Emergency</h3>
                        <p class="text-muted m-b-30 font-13">Emergency contact details</p>
                        <div class="form-body">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Contact Name</label>
                                    <input type="text" name="freelancer_emergency_contact_name" class="form-control" placeholder="Contact Name" />
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
                              <div class="col-md-6">
                                 <div class="form-group">
                                     <label>Emergency Email</label>
                                     <input type="text" name="freelancer_emergency_email" class="form-control" placeholder="Email" autofocus required title="Please enter valid E-mail">
                                 </div>
                              </div>
                              <h3 class="box-title m-b-0">Requirements</h3>
                              <br>
                              <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label>BPI</label>
                                          <input type="text" name="freelancer_BPI" class="form-control" placeholder="BPI" />
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label>TIN</label>
                                          <input type="text" name="freelancer_TIN" class="form-control" placeholder="TIN" />
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                       <label>SSS</label>
                                       <input type="text" name="freelancer_SSS" class="form-control" placeholder="SSS" />
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>PAG-IBIG</label>
                                       <input type="text" name="freelancer_PAG_IBIG" class="form-control" placeholder="PAG_IBIG" />
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>PHILHEALTH</label>
                                       <input type="text" name="freelancer_PHILHEALTH" class="form-control" placeholder="PHILHEALTH" />
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
<script src="<?= base_url() ?>asset/components/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>asset/src/freelancer/profile.js?v=1.2="></script>