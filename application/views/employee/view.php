<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Employees</h4> </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="<?=base_url()?>dashboard">Dashboard</a></li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <div>
                    <div class="pull-right">
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <a data-toggle='modal' data-target='#add_currency_modal' class='btn btn-round btn-success'><span class='fa fa-plus'></span> Create</a>
                    </div>
                    <div class="pull-right">
                        <input type="text" id="search" placeholder="Search Employees" class="form-control">
                    </div>
                    <h3>Manage Employees</h3> 
                </div>
                <div class="table-responsive m-t-30">
                    <table class="table color-table inverse-table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 70px;" class="text-center">#</th>
                                <th>PROFILE</th>
                                <th>NAME</th>
                                <th>EMAIL</th>
                                <th>PASSPORT</th>
                                <th>MANAGE</th>
                            </tr>
                        </thead>
                        <tbody id="employee-table">
                            <tr>
                                <td class="text-center" colspan="10">No records found.</td>
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

<div class="modal fade" id="add_currency_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Create Employee</h4>
      </div>
      <form id="create-employee-form" method="POST">
        <div class="modal-body">
            <div class="form-group">
              <div class="col-md-12">
                <label>Company</label>
                <select class="form-control" id="company_id" name="company_id" required="">
                  <?php foreach($companies as $company){?>
                    <option value="<?=$company->company_id?>"><?=$company->company_name?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-md-12">
                <br>
                <label>Firstname</label>
                <input type="text" name="firstname" id="firstname" placeholder="Firstname" class="form-control"  required=""/>
              </div>
              <div class="col-md-12">
                <br>
                <label>Lastname</label>
                <input type="text" name="lastname" id="lastname" placeholder="Lastname" class="form-control" required="" />
              </div>
              <div class="col-md-12">
                <br>
                <label>Office Email (Username)</label>
                <input type="text" name="office_email" id="office_email" placeholder="Office Email" class="form-control" required="" />
              </div>
              <div class="col-md-12">
                <br>
                <label>Role</label>
                <select class="form-control" id="role_id" name="role_id" required="">
                  <?php foreach($roles as $role){?>
                    <option value="<?=$role->role_id?>"><?=$role->role_description?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-md-12">
                <br>
                <div class="checkbox checkbox-success m-b-20">
                    <input type="checkbox" id="employee_is_regular" name="employee_is_regular" class="others_checkbox">
                    <label for="employee_is_regular">Regular</label>
                </div>
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

<script type="text/html" id="employee-row-template">
    <tr>
        <td class="text-center" data-content="employee_id"></td>
        <td class="text-center"><img data-src="employee_profile" width="50" style="border-radius: 50%;"></td>
        <td><span class="font-medium" data-content="employee_fullname"></span>
            <br/><span class="text-muted" data-content="employee_initial"></span></td>
        <td><span data-content="employee_office_email"></span>
            <br/><span class="text-muted" data-content="employee_mobile_number"></span></td>
        <td><span data-content="employee_passport_number"></span>
            <br/>Expiry: <span class="text-muted" data-content="employee_passport_expiry_date"></span></td>
        <td>
            <a title="Edit" class="btn btn-info btn-outline btn-circle btn-lg m-r-5 btn-update" data-id="employee_id"><i class="ti-pencil-alt"></i></a>
            <button type="button" title="Profile" class="btn btn-success btn-outline btn-circle btn-lg m-r-5 btn-view-profile" data-id="employee_id"><i class="fa fa-user"></i></button>
            <button type="button" title="Curriculum Vitae" class="btn btn-primary btn-outline btn-circle btn-lg m-r-5 btn-cv" data-id="employee_id">C</button>
        </td>
    </tr>
</script>

<script type="text/javascript" src="<?=base_url()?>asset/src/employee/view.js"></script>
