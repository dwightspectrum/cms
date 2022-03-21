<div class="container-fluid">
    <form method="POST" id="freelancer_form">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Add Employee</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="col-lg-2 col-sm-4 col-xs-12 pull-right">
                    <input type="submit" name="" value="SUBMIT" class="btn btn-block btn-info btn-rounded">
                </div>
                <ol class="breadcrumb">
                    <li><a href="<?= base_url() ?>freelancer/view">Freelancer</a></li>
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
                                                <input type="file" name="freelancer_profile" id="freelancer_profile" autofocus> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
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
                                    <input type="text" name="freelancer_middle_name" class="form-control" placeholder="Middlename">
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="freelancer_emergency_email" class="form-control" placeholder="Email">
                                </div>
                            </div>
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
    </form>
</div>


<!-- Date Picker Plugin JavaScript -->
<script src="<?= base_url() ?>asset/components/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url() ?>asset/src/freelancer/add.js?v=1.1"></script>