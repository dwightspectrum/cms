<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Freelancer</title>

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
              <img src="<?=base_url()?>asset/freelancers/<?=$freelancer->freelancer_profile?>" width="150px;">
            </td>
          </tr>
          <tr>
            <td style="padding:20px;">
              <font style="font-size:23px;"><?=$freelancer->freelancer_first_name . ", " . $freelancer->freelancer_last_name . " " . $freelancer->freelancer_middle_name;?></font>
              <br>
              <font ><?=$freelancer->freelancer_province;?>
              <br>
              <font style="font-size:18px;"><?=$freelancer->freelancer_contact?>  
              <br>
              <font style="font-size:18px;"><?=$freelancer->freelancer_email?>  
            </td>
          </tr>
        </table>
    </div>
    <div style="padding-left: 8px; background-color:#BDBDBD !important;font-size:18px;">
      OBJECTIVE / PROJECT ACCOMPLISHMENTS
    </div>
    <div style="margin: 10px;">
      <font style="margin-left:15px;"><?php echo ($cv != null) ? $cv->freelancer_object : "<br>";?></font>
    </div>
    <div style="padding-left: 8px; background-color:#BDBDBD !important;font-size:18px;">
      <br>EDUCATION (Tertiary)
    </div>
    <div style="margin: 10px;">
      <div style="margin-left:15px;"><?php echo ($cv != null) ? $cv->freelancer_school_name : "";?></div>
      <div style="margin-left:15px;"><?php echo ($cv != null) ? $cv->freelancer_school_address : "";?></div>
      <div style="margin-left:15px;"><?php echo ($cv != null) ? $cv->freelancer_course : "";?></div>
      <div style="margin-left:15px;"><?php if($cv != null){ if($cv->freelancer_graduate == 1){ echo "Graduate"; }else{ echo "Undergraduate"; } }else{echo "";}?></div>
    </div>
    <div style="padding-left: 8px; background-color:#BDBDBD !important;font-size:18px;">
      <br>PROFESSIONAL EXPERIENCE
    </div>
    <div style="margin: 10px;">
      <table style="text-align:left">
        <?php foreach($pe as $experience){?>
          <tr>
            <td style="vertical-align:top;padding: 10px;">
              <?=$experience->freelancer_name;?><br>
              <?=$experience->freelancer_address;?><br>
              <?=$experience->freelancer_position;?>
            </td>
            <td style="vertical-align:top;width:150px;padding: 15px;">Year <?=$experience->freelancer_year;?></td>
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
          <li style="list-style-type: square"><?=$skill->freelancer_skill_name?></li>
        <?php }?>
      </ul>
    </div>
    <div style="padding-left: 8px; background-color:#BDBDBD !important;font-size:18px;">
      <br>LANGUAGES
    </div>
    <div style="margin: 10px;">
      <ul>
        <?php foreach($languages as $language){?>
          <li style="list-style-type: square"><?=$language->freelancer_language_name?></li>
        <?php }?>
      </ul>
    </div>
    <div style="padding-left: 8px; background-color:#BDBDBD !important;font-size:18px;">
      <br>HOBBIES/INTERESTS
    </div>
    <div style="margin: 10px;">
      <ul>
        <?php foreach($hobbies as $hobby){?>
          <li style="list-style-type: square"><?=$hobby->freelancer_hobby_name?></li>
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
              <?=$job->freelancer_job_history_client;?><br>
              <?=$job->freelancer_job_history_scope;?>
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
            <b><?=$reference->freelancer_reference_name?></b><br>
            <?=$reference->freelancer_reference_position?><br>
            <?=$reference->freelancer_reference_company?><br>
            <?=$reference->freelancer_reference_contact_no?>
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