<div class="container-fluid">
    <form method="POST" id="curriculum_vitae_form">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Curriculum Vitae</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <!-- <div class="col-lg-2 col-sm-4 col-xs-12 pull-right">
                    <input type="submit" name="" value="SAVE" class="btn btn-block btn-info btn-rounded">
                </div> -->
                <ol class="breadcrumb m-t-10">
                    <li><a href="<?=base_url()?>dashboard/freelancer_view">Dashboard</a></li>
                    <li><a href="<?=base_url()?>freelancer/profile/<?=$freelancer_id?>">Profile</a></li>
                    <li class="active">Curriculum Vitae</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="white-box">
                    <h3 class="box-title m-b-0">Personal Details</h3>
                    <p class="text-muted m-b-30 font-13">Personal Details</p>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <div><?=$freelancer->freelancer_fullname?></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <div><?=$freelancer->freelancer_city?></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <div><?=$freelancer->freelancer_email?></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Mobile No.</label>
                                    <div><?=$freelancer->freelancer_contact?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="white-box">
                        <div class="form-group">
                            <label>ZIP Code</label>
                            <input type="text" id="freelancer_address_zip_code" name="freelancer_address_zip_code" class="form-control" placeholder="Address" value="<?=($cv)? $cv->freelancer_address_zip_code : ''?>"> 
                        </div>
                        <div class="form-group">
                            <label>Desired Position</label>
                            <input type="text" id="freelancer_desired_position" name="freelancer_desired_position" class="form-control" placeholder="Position" value="<?=($cv)? $cv->freelancer_desired_position : ''?>"> 
                        </div>
                    </div>
                 </div>
                 <div class="row">
                    <div class="col-sm-4">
                        <div class="white-box">
                            <div>
                                <div class="pull-right">
                                    <a id="add-skill" class="btn btn-primary"> <span class="fa fa-plus"> </span></a>
                                </div>
                                <h3 class="box-title m-b-0">Skills</h3>
                                <!-- <p class="text-muted m-b-30 font-13">Skills data</p> -->
                            </div>
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <!-- <label>Skill</label> -->
                                            <input type="text" id="skill_name" name="skill_name" class="form-control" placeholder="Skill"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <br>
                                            <div class="form-body">
                                                <table id="skill_table_display" class="table color-table inverse-table">
                                                    <thead>
                                                    <th width="90%">SKILL DESCRIPTION</th>
                                                    <th width="10%"></th> 
                                                    </thead>
                                                    <tbody id='skill_table'>
                                                        <tr>
                                                        <td align="center" colspan="2">No records found.</td>
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
             </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <div>
                        <div class="pull-right">
                            <a id="add-reference" class="btn btn-primary"> <span class="fa fa-plus"> </span></a>
                        </div>
                        <h3 class="box-title m-b-0">References</h3>
                        <p class="text-muted m-b-30 font-13">References data</p>
                    </div>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" id="reference_name" name="reference_name" class="form-control" placeholder="Name"> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Company</label>
                                    <input type="text" id="reference_company" name="reference_company" class="form-control" placeholder="Company"> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Position</label>
                                    <input type="text" id="reference_position" name="reference_position" class="form-control" placeholder="Position"> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Contact No.</label>
                                    <input type="text" id="reference_contact" name="reference_contact" class="form-control" placeholder="Contact No."> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <br>
                                    <div class="form-body">
                                        <table id="reference_table_display" class="table color-table inverse-table">
                                            <thead>
                                              <th width="25%">NAME</th>
                                              <th width="30%">COMPANY</th>           
                                              <th width="25%">POSITION</th>
                                              <th width="20%">CONTACT NO.</th> 
                                              <th></th> 
                                            </thead>
                                            <tbody id='reference_table'>
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
        <div class="row">
            <div class="col-md-12">
                <input type="submit" name="" value="SAVE" class="btn btn-block btn-info btn-rounded">
            </div>
        </div>
    </form>
</div>

<script type="text/html" id="prof-exp-data-template">
<tr>    
  <td data-content='company_name'></td>
  <td data-content='company_address'></td>
  <td data-content='freelancer_position'></td>
  <td data-content='freelancer_year'></td>
  <td data-content='action'></td>
</tr> 
</script>

<script type="text/html" id="skill-data-template">
<tr>    
  <td data-content='freelancer_skill_name'></td>
  <td data-content='action'></td>
</tr> 
</script>

<script type="text/html" id="language-data-template">
<tr>    
  <td data-content='freelancer_language_name'></td>
  <td data-content='action'></td>
</tr> 
</script>

<script type="text/html" id="hobby-data-template">
<tr>    
  <td data-content='freelancer_hobby_name'></td>
  <td data-content='action'></td>
</tr> 
</script>

<script type="text/html" id="reference-data-template">
<tr>    
  <td data-content='freelancer_reference_name'></td>
  <td data-content='freelancer_reference_company'></td>
  <td data-content='freelancer_reference_position'></td>
  <td data-content='freelancer_reference_contact_no'></td>
  <td data-content='action'></td>
</tr> 
</script>

<script type="text/javascript" src="<?=base_url()?>asset/src/freelancer/curriculum_vitae.js"></script> 