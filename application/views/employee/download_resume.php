<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Employee</title>

  <link href="<?php echo base_url(); ?>asset/bootstrap/css/bootswatch.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>asset/css/app.css" rel="stylesheet">
</head>
<body style="font-size:16px;">
  <div class="col-md-12">
    <div class="container">
      <div class="col-md-12">
        <table>
          <tr>
            <td rowspan="3">
              <img src="<?=base_url()?>asset/employees/<?=$employee->employee_photo?>" width="150px;">
            </td>
          </tr>
          <tr>
            <td style="padding:20px;">
              <font style="font-size:23px;"><?=$employee->employee_first_name . ", " . $employee->employee_last_name . " " . $employee->employee_middle_name;?></font>
              <br>
              <font"><?=$employee->employee_provincial_address;?>
              <br>
              <font style="font-size:18px;"><?=$employee->employee_mobile_number . " | " . $employee->employee_landline_number;?>  
              <br>
              <font style="font-size:18px;"><?=$employee->employee_personal_email . " | " . $employee->employee_office_email;?>  
            </td>
          </tr>
        </table>
    </div>
    <div style="padding-left: 8px; background-color:#BDBDBD !important;font-size:18px;">
      OBJECTIVE / PROJECT ACCOMPLISHMENTS
    </div>
    <div style="margin: 10px;">
      <font style="margin-left:15px;"><?php echo ($cv != null) ? $cv->employee_object : "<br>";?></font>
    </div>
    <div style="padding-left: 8px; background-color:#BDBDBD !important;font-size:18px;">
      <br>EDUCATION (Tertiary)
    </div>
    <div style="margin: 10px;">
      <div style="margin-left:15px;"><?php echo ($cv != null) ? $cv->employee_school_name : "";?></div>
      <div style="margin-left:15px;"><?php echo ($cv != null) ? $cv->employee_school_address : "";?></div>
      <div style="margin-left:15px;"><?php echo ($cv != null) ? $cv->employee_course : "";?></div>
      <div style="margin-left:15px;"><?php if($cv != null){ if($cv->employee_graduate == 1){ echo "Graduate"; }else{ echo "Undergraduate"; } }else{echo "";}?></div>
    </div>
    <div style="padding-left: 8px; background-color:#BDBDBD !important;font-size:18px;">
      <br>PROFESSIONAL EXPERIENCE
    </div>
    <div style="margin: 10px;">
      <table style="text-align:left">
        <?php foreach($pe as $experience){?>
          <tr>
            <td style="vertical-align:top;padding: 10px;">
              <?=$experience->company_name;?><br>
              <?=$experience->company_address;?><br>
              <?=$experience->employee_position;?>
            </td>
            <td style="vertical-align:top;width:150px;padding: 15px;">Year <?=$experience->employee_year;?></td>
          </tr>
        <?php }?>
      </table>
    </div>
    <div style="padding-left: 8px; background-color:#BDBDBD !important;font-size:18px;">
      <br>SKILLS
    </div>
    <div style="margin: 10px;">
      <ul>
        <?php foreach($skills as $skill){?>
          <li style="list-style-type: square"><?=$skill->employee_skill_name?></li>
        <?php }?>
      </ul>
    </div>
    <div style="padding-left: 8px; background-color:#BDBDBD !important;font-size:18px;">
      <br>LANGUAGES
    </div>
    <div style="margin: 10px;">
      <ul>
        <?php foreach($languages as $language){?>
          <li style="list-style-type: square"><?=$language->employee_language_name?></li>
        <?php }?>
      </ul>
    </div>
    <div style="padding-left: 8px; background-color:#BDBDBD !important;font-size:18px;">
      <br>HOBBIES/INTERESTS
    </div>
    <div style="margin: 10px;">
      <ul>
        <?php foreach($hobbies as $hobby){?>
          <li style="list-style-type: square"><?=$hobby->employee_hobby_name?></li>
        <?php }?>
      </ul>
    </div>
    <div style="padding-left: 8px; background-color:#BDBDBD !important;font-size:18px;">
      <br>JOB HISTORY
    </div>
    <div style="margin: 10px;">
      <table style="text-align:left">
        <?php foreach($job_history as $job){?>
          <tr>
            <td style="vertical-align:top;padding: 10px;text-align:left">
              <?=$job->employee_job_history_client;?><br>
              <?=$job->employee_job_history_scope;?>
            </td>
          </tr>
        <?php }?>
      </table>
    </div>
    <div style="padding-left: 8px; background-color:#BDBDBD !important;font-size:18px;">
      <br>REFERENCES
    </div>
    <div style="margin: 10px;">
      <ul>
        <?php foreach($references as $reference){?>
          <li style="list-style-type: none;padding-bottom: 15px;margin-left:-20px;">
            <b><?=$reference->employee_reference_name?></b><br>
            <?=$reference->employee_reference_position?><br>
            <?=$reference->employee_reference_company?><br>
            <?=$reference->employee_reference_contact_no?>
          </li>
        <?php }?>
      </ul>
    </div>
  <div>

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