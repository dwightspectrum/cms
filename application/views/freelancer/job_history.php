<div class="container-fluid">
   <form method="POST" id="job_history_form" autocomplete="off">
      <div class="row bg-title">
         <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Job History</h4>
         </div>
         <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <!-- <div class="col-lg-2 col-sm-4 col-xs-12 pull-right">
               <input type="submit" name="" value="SAVE" class="btn btn-block btn-info btn-rounded">
            </div> -->
            <ol class="breadcrumb m-t-10">
               <li><a href="<?=base_url()?>dashboard/freelancer_view">Dashboard</a></li>
               <li><a href="<?=base_url()?>freelancer/profile/<?=$freelancer_id?>">Profile</a></li>
               <li class="active">Job History</li>
            </ol>
         </div>
         <!-- /.col-lg-12 -->
      </div>
      <div class="row">
         <div class="col-sm-7">
            <div class="white-box">
            <h3 class="box-title m-b-0">Job History</h3>
               <p class="text-muted m-b-30 font-13">Job history data</p>   
               <div class="form-body">
                  <div class="row">
                     <div class="col-md-4">
                        <div class="form-group">
                           <label>Customer / Client</label><br><br>
                           <input type="text" id="freelancer_job_history_client" name="freelancer_job_history_client" class="form-control" placeholder="Our direct contact">
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label>Location</label><br><br>
                           <select class="form-control require" id="freelancer_job_location" name="freelancer_job_location">
                              <option value="">Select</option>
                              <option value="Local">Local</option>
                              <option value="International">International</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label>Scope</label><br><br>
                           <input type="text" id="freelancer_job_history_scope" name="freelancer_job_history_scope" class="form-control" placeholder="Target area of our job (Combustion Area, Cyclone, Inlet/Outlet, Etc.)"><br>
                        </div>
                     </div>
                     <!-- <div class="col-md-12">
                        <div class="form-group">
                           <label>Month / Year</label>
                           <input type="text" id="employee_job_history_date" name="employee_job_history_date" class="form-control" placeholder="Month and year job was completed">
                           <br><br>
                        </div>
                     </div> -->
                     <div class="col-md-1">
                     <label>&nbsp;</label>
                        <div class="form-group"><br>
                           <a id="add-job-history" class="btn btn-success"><span class="fa fa-plus"></span></a>
                        </div>
                     </div>
                  </div>
              
               </div>
               <h3 class="box-title m-b-0">Services</h3>
               <div class="form-body">
                  <div class="row">
                     <div class="col-md-12">
                      <div class="form-group">
                           <label>&nbsp;</label>
                           <?php
                              foreach ($categories as $category) {
                                    ?>
                           <div class="col-md-12">
                              <br>
                              <b><?=$category->service_scope_name;?></b>
                           </div>
                           <?php foreach ($category->sub_categories as $sub) {?>
                           <div class="col-md-4 col-xs-12">
                              <div class="checkbox checkbox-primary">
                                 <input type="checkbox" name="service_scope" id="<?=$sub->service_scope_list_id;?>" value="<?=$sub->service_scope_list_id;?>">
                                 <label for="<?=$sub->service_scope_list_id;?>"> <?=$sub->service_scope_list_name;?> </label>
                              </div>
                           </div>
                           <?php }}?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
   </form>
   <div class="col-sm-5 p-0">
      <form method="POST" id="freelancer_survey_form" autocomplete="off">
         <div class="white-box">
            <h3 class="box-title m-b-0">Survey Form</h3><br>
               <div class="form-body">
                  <div class="row">
                     <div class="col-md-10 p-0">
                        <div class="form-group">
                           <select id="select_category" class="form-control require">
                              <?php $categories = array(1 => "Employee", 2 => "Freelancer");
                                 foreach($categories as $key => $category){?>
                                    <option value="<?=$key?>"><?=$category;?></option>
                                 <?php }?>
                           </select><br>
                           <select id="survey_email" name="survey_email" class="form-control require">
                              
                           </select>
                           <input type="hidden" id="freelancer_email_id" name="freelancer_email_id">
                           <!-- <input type="email" id="survey_email" name="survey_email" class="form-control" placeholder="Email address" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" autofocus required title="Please enter valid E-mail">  -->
                        </div>
                     </div>
                     <div class="col-md-2">
                        <div class="form-group">
                              <label>&nbsp;</label>
                              <button type="submit" value="Submit" name="add-survey" class="btn btn-success"><i class="fa fa-plus"></i></button>
                        </div>
                     </div>
                     <div class="col-md-10 p-0">
                        <select id="select_client" class="form-control require">
                           
                        </select><br>
                     </div>
                     <div class="col-md-12 p-0 table-responsive" >
                        <h3 class="box-title m-b-0">Survey List</h3><br>
                        <table class="table color-table inverse-table">
                           <thead>
                              <th>Email</th>
                              <th>Status</th>
                              <th>Name</th>
                              <?php if ($isAdmin) { ?>
                              <th>Evaluation</th>
                              <?php } ?> 
                              <th class="text-center">Action</th>   
                           </thead>
                           <tbody id="survey_table">
                              <tr>
                                 <td align="center" colspan="3">No records found.</td>
                              </tr>
                           </tbody>
                        </table>
                        <div id="paginations" class="pull-right"></div>
                     </div>
                  </div>
               </div>
         </div>
      </form>
   </div>
   <div class="col-sm-12">
      <div class="white-box">
         <h3 class="box-title m-b-0">List</h3>
            <br>
         <div class="form-body">
            <div class="row">
               <div class="col-md-12 table-responsive">
                  <table class="table color-table inverse-table">
                     <thead>
                        <!-- <th>CLIENT / CUSTOMER</th> -->
                        <!-- <th>END USER</th> -->
                        <th>Customer / Client</th>      
                        <th>Scope</th>
                        <th>Location</th>
                        <th>Country / Address</th> 
                        <th>Date of Entry / Date of Departure</th> 
                        <th>Date of Exit / Date of Return</th> 
                        <th>Services</th> 
                        <th></th>
                     </thead>
                     <tbody id="job_history_table">
                        <tr>
                           <td align="center" colspan="6">No records found.</td>
                        </tr>
                     </tbody>
                  </table>
                  <div id="list_pagination" class="pull-right"></div>
               </div>
               <!-- <div class="col-md-12">
                  <input type="submit" name="" value="SAVE" class="btn btn-block btn-info btn-rounded">
               </div> -->
         </div>
      </div>
      <!-- </div> -->

      </div>
   </div>
   
</div>

<form id="myForm" name="myForm" onsubmit="return false" method="POST" autocomplete="off">
   <div class="modal fade" id="local-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title" id="myModalLabel">LOCAL</h4>
            </div>
            <div class="modal-body">
               <div class="form-body">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label>Location</label>
                           <input type="text" id="freelancer_job_address" name="freelancer_job_address" class="form-control" placeholder="Our direct contact">
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <label>Date of Departure</label>
                           <div class="input-group">
                              <input type="text" class="form-control datepicker-autoclose" id="freelancer_job_departure_date" name="freelancer_job_departure_date" placeholder="yyyy-mm-dd"><span class="input-group-addon"><i class="icon-calender"></i></span>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <label>Date of Return</label>
                           <div class="input-group">
                              <input type="text" class="form-control datepicker-autoclose" id="freelancer_job_return_date" name="freelancer_job_return_date" placeholder="yyyy-mm-dd"><span class="input-group-addon"><i class="icon-calender"></i></span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <input type="submit" id="save-local" class="btn btn-primary" value="SAVE">
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
         </div>
      </div>
   </div>
</form>
<form id="myForm" name="myForm" onsubmit="return false" method="POST" autocomplete="off">
   <div class="modal fade" id="international-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title" id="myModalLabel">INTERNATIONAL</h4>
            </div>
            <div class="modal-body">
               <div class="form-body">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label>Country</label>
                           <input type="text" id="freelancer_job_country" name="freelancer_job_country" class="form-control" placeholder="Our direct contact">
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <label>Date of Entry</label>
                           <div class="input-group">
                              <input type="text" class="form-control datepicker-autoclose" id="freelancer_job_entry_date" name="freelancer_job_entry_date" placeholder="yyyy-mm-dd" required=""><span class="input-group-addon"><i class="icon-calender"></i></span>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <label>Date of Exit</label>
                           <div class="input-group">
                              <input type="text" class="form-control datepicker-autoclose" id="freelancer_job_exit_date" name="freelancer_job_exit_date" placeholder="yyyy-mm-dd" required=""><span class="input-group-addon"><i class="icon-calender"></i></span>
                           </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <a id="save-international" class="btn btn-primary">Save</a>
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               
            </div>
         </div>
      </div>
   </div>
</form>
<script type="text/html" id="job-data-template">
   <tr>
       <td data-content='freelancer_job_history_client'></td>
       <!-- <td data-content='employee_job_history_end_user'></td> -->
       <td data-content='freelancer_job_history_scope'></td>
       <td data-content='freelancer_job_location'></td>
       <td data-content='freelancer_job_address' data-content='freelancer_job_country'></td>
       <td data-content='freelancer_job_departure_date' data-content='freelancer_job_entry_date'></td>
       <td data-content='freelancer_job_return_date' data-content= 'freelancer_job_exit_date'></td>
       <td data-content='service_scope_name'></td>
       <td data-content='action'>
         <a title="Delete" class="btn btn-danger btn-sm m-r-5 remove-job" data-id="freelancer_job_history_id"><i class="fa fa-trash"></i></a>
       </td>
       
   </tr>
</script>

<script type="text/html" id="select_user_category">
   <option data-content='category_name' data-value="category_id"></option>
</script>

<script type="text/html" id="employee_email_category">
   <option data-content='employee_office_email' data-value="employee_office_email"></option>
</script>

<script type="text/html" id="freelancer_email_category">
   <option data-content='freelancer_email' data-value="freelancer_email"></option>
</script>

<script type="text/html" id="survey_template">
    <tr>    
      <td data-content="survey_email"></td>
      <td data-content="survey_category" id="survey_category"></td>
      <td data-content="freelancer_job_history_client" data-value="freelancer_job_history_id"></td>
      <?php if ($isAdmin) { ?>    
      <td data-content="email_link"></td>
      <?php } ?> 
      <td data-content="action" class="text-right" colspan="3"></td>
   </tr> 
</script>

<script type="text/html" id="select_client_template">
   <option data-content='freelancer_job_history_client' data-value="freelancer_job_history_id"></option>
</script>
<script src="<?=base_url()?>asset/components/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>asset/src/freelancer/job_history.js"></script>
