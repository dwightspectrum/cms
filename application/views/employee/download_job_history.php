<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Job History</title>
      <link href="<?php echo base_url(); ?>asset/components/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="<?php echo base_url(); ?>asset/css/app.css" rel="stylesheet">
      <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>asset/components/images/hwi_favicon_logo.png">
   </head>
   <body class="pdf">
      <div class="nav nav-bar">
         <center>
            <img class="img-responsive" src="<?=base_url()?>asset/components/images/hwi_letterhead.png">
         </center>
      </div>
      <div class="card-outline-danger" style="padding:30px;">
         <div class="card-block">
            <div class="col-md-12">
               <h4 class="card-title"><?=$employee->employee_first_name." ".$employee->employee_last_name?></h4>
               <h6 class="card-subtitle mb-2 text-muted">List of all job history.</h6>
            </div>
            <br>
            <div class="col-md-12">
               <table border="1" class="table">
                  <thead >
                     <th style="border:1px solid;border-color: #000;">CUSTOMER/CLIENT</th>
                     <th style="border:1px solid;border-color: #000;">SCOPE</th>
                     <th style="border:1px solid;border-color: #000;">LOCATION</th>
                     <th style="border:1px solid;border-color: #000;">COUNTRY / ADDRESS</th>
                     <th style="border:1px solid;border-color: #000;">DATE DEPARTURE / ENTRY</th>
                     <th style="border:1px solid;border-color: #000;">DATE RETURN / EXIT</th>
                     <th style="border:1px solid;border-color: #000;">SERVICES</th>
                  </thead>
                  <tbody id='client-table'>
                     <?php $ctr = 0;
                        if($job_history){ 
                          foreach ($job_history as $job) {
                        ?>
                     <tr>
                        <td><?=$job->employee_job_history_client;?></td>
                        <td><?=$job->employee_job_history_scope;?></td>
                        <td><?=$job->employee_job_location;?></td>
                        <td><?=$job->employee_job_address;?><?=$job->employee_job_country;?></td>
                        <td><?=$job->employee_job_departure_date;?><?=$job->employee_job_entry_date;?></td>
                        <td><?=$job->employee_job_return_date;?><?=$job->employee_job_exit_date;?></td>
                        <td><?=implode(", ", $job->service_scopes);?></td>
                     </tr>
                     <?php }}else{ ?>
                     <tr>
                        <td align="center" colspan="7">No records.</td>
                     </tr>
                     <?php } ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <script type="text/javascript">
         setTimeout(function() {
            window.print();
        }, 200);
        window.onfocus = function() {
            setTimeout(function() {
                window.close();
            }, 200);
        }
      </script>
   </body>
</html>