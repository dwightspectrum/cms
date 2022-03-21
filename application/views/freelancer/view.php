<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Freelancers</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="<?= base_url() ?>dashboard">Dashboard</a></li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <div>
                    <button 
                      type="button"
                      class="btn btn-primary pull-right m-l-10" 
                      id="export-csv-button">Export</button>
                    <div class="pull-right">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a data-toggle='modal' data-target='#add_currency_modal' class='btn btn-round btn-success'><span class='fa fa-user'></span> Create Account</a>
                        &nbsp;
                        <a data-toggle='modal' data-target='#add_form_modal' class='btn btn-round btn-info'><span class='fa fa-plus'></span> Create</a>
                    </div>
                    <div class="pull-right">
                        <input type="text" id="search" placeholder="Search Freelancers" class="form-control">
                    </div>
                    <h3>Manage Freelancers</h3>
                </div>
                <div class="table-responsive m-t-30">
                    <table class="table color-table inverse-table table-striped">
                        <thead>
                            <tr>
                                <th width="5%" class="text-center">#</th>
                                <th width="5%">PROFILE</th>
                                <th width="15%">NAME</th>
                                <th width="13%">EMAIL</th>
                                <th width="18%">ADDRESS</th>
                                <th width="20%">SITE DEPLOYMENT</th>
                                <th width="25%">MISSING FIELDS</th>
                                <th width="10%"></th>
                            </tr>
                        </thead>
                        <tbody id="freelancer-table">
                            <tr>
                                <td class="text-center" colspan="5">No records found.</td>
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

<!-- Edit Form -->
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
                            <div class="white-box edit_preview_profile_wrapper">
                                <img id="edit_preview_profile" class="preview_profile">
                            </div>

                            <div class="white-box">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-12 ">
                                            <div class="form-group">
                                                <label>Change Photo<br><span class="text-muted" style="font-size:11px">PLEASE UPLOAD A CLEAR LATEST PHOTO OF YOURSELF: (Does not need to be Professional – but at least clear and on white background)</span></label>
                                                <div>
                                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                        <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                                            <input type="file" name="freelancer_profile" id="freelancer_profile_edit" autofocus> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Firstname</label>
                                                <input type="text" name="freelancer_first_name" class="form-control" placeholder="Firstname" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Middlename</label>
                                                <input type="text" name="freelancer_middle_name" class="form-control" placeholder="Middlename" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Lastname</label>
                                                <input type="text" name="freelancer_last_name" class="form-control" placeholder="Lastname" required>
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
                                                <input type="text" name="freelancer_BPI" class="form-control" placeholder="BPI">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>TIN</label>
                                                <input type="text" name="freelancer_TIN" class="form-control" placeholder="TIN">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>SSS</label>
                                                <input type="text" name="freelancer_SSS" class="form-control" placeholder="SSS">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>PAG-IBIG</label>
                                                <input type="text" name="freelancer_PAG_IBIG" class="form-control" placeholder="PAG_IBIG">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>PHILHEALTH</label>
                                                <input type="text" name="freelancer_PHILHEALTH" class="form-control" placeholder="PHILHEALTH">
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

<div class="modal fade" id="add_currency_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Create Freelancer</h4>
      </div>
      <form id="create-freelancer-form" method="POST">
        <div class="modal-body">
            <div class="form-group">
              <div class="col-md-12">
                <br>
                <label>Firstname</label>
                <input type="text" name="freelancer_first_name" placeholder="Firstname" class="form-control"  required/>
              </div>
              <div class="col-md-12">
                <br>
                <label>Lastname</label>
                <input type="text" name="freelancer_last_name" placeholder="Lastname" class="form-control" required/>
              </div>
              <div class="col-md-12">
                <br>
                <label>Office Email (Username)</label>
                <input type="text" name="freelancer_email" placeholder="Office Email" class="form-control" required/>
              </div>
              <div class="col-md-12">
                <br>
                <label>Note*</label>
                <span>Default password is `12345`</span>
              </div>
            </div>
        </div>
        <div class="modal-footer" style="border-top: 0px;">
          <div class="col-md-12">
            <input type="submit" class="btn btn-primary" value="Submit" id="add-exchange-value" style="width:100%;margin-top:20px;">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Add Form -->
<div class="modal fade" id="add_form_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog custom-modal" style="width: 100%;max-width: 1200px;">
        <div class="modal-content">
            <form method="POST" id="create_freelancer_form">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">Create Freelancer</h2>
                    <button type="button" class="close close-modal-create" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="white-box edit_preview_profile_wrapper">
                                <img id="add_preview_profile" class="preview_profile">
                            </div>
                            <div class="white-box">

                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-12 ">
                                            <div class="form-group">
                                                <label>Upload Photo<br><span class="text-muted" style="font-size:11px">PLEASE UPLOAD A CLEAR LATEST PHOTO OF YOURSELF: (Does not need to be Professional – but at least clear and on white background)</span></label>
                                                <div>
                                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                        <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                                            <input type="file" name="freelancer_profile" id="freelancer_profile_add" autofocus> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Firstname</label>
                                                <input type="text" name="freelancer_first_name" class="form-control" placeholder="Firstname" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Middlename</label>
                                                <input type="text" name="freelancer_middle_name" class="form-control" placeholder="Middlename" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Lastname</label>
                                                <input type="text" name="freelancer_last_name" class="form-control" placeholder="Lastname" required>
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
                                                <input type="radio" id="limay" name="freelancer_site_deployment" value="limay">
                                                <label for="limay">Limay</label><br>
                                                <input type="radio" id="mariveles" name="freelancer_site_deployment" value="mariveles">
                                                <label for="mariveles">Mariveles</label><br>
                                                <input type="radio" id="others" name="freelancer_site_deployment" value="others">
                                                <label for="others">Others</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div id="add-site-deployment-others-panel" class="form-group hide">
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
                                                <input type="text" name="freelancer_BPI" class="form-control" placeholder="BPI">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>TIN</label>
                                                <input type="text" name="freelancer_TIN" class="form-control" placeholder="TIN">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>SSS</label>
                                                <input type="text" name="freelancer_SSS" class="form-control" placeholder="SSS">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>PAG-IBIG</label>
                                                <input type="text" name="freelancer_PAG_IBIG" class="form-control" placeholder="PAG_IBIG">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>PHILHEALTH</label>
                                                <input type="text" name="freelancer_PHILHEALTH" class="form-control" placeholder="PHILHEALTH">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="checkbox checkbox-danger m-b-20">
                                                    <input type="checkbox" id="freelancer_handbook" name="freelancer_handbook">
                                                    <label for="freelancer_handbook">Handbook</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="checkbox checkbox-danger m-b-20">
                                                    <input type="checkbox" id="freelancer_employment_contract" name="freelancer_employment_contract">
                                                    <label for="freelancer_employment_contract">Employment Contract</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="checkbox checkbox-danger m-b-20">
                                                    <input type="checkbox" id="freelancer_id_badges" name="freelancer_id_badges">
                                                    <label for="freelancer_id_badges">ID Badges</label>
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
<iframe id="csv_iframe" style="display:none;"></iframe>

<!-- Date Picker Plugin JavaScript -->
<script src="<?= base_url() ?>asset/components/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url() ?>asset/src/freelancer/view.js?v=1.4"></script>