<div class="container-fluid">
  <div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
      <h4 class="page-title">Dashboard</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
      <ol class="breadcrumb">
        <?php if($isAdmin){ ?>
          <li><a href="<?=base_url()?>dashboard/freelancer_view">Freelancer</a></li>
        <?php } ?>
        <li class="active"> Dashboard</li>
      </ol>
    </div>
  </div>
  <div class="white-box">
    <div class="main-body">
      <div aria-label="breadcrumb" class="main-breadcrumb">
        <h1>Welcome,<i> <?=$freelancer->freelancer_first_name?></i>&nbsp;!</h1>
      </div>
      <div class= "white-box" style="margin-left: 10%;">
        <div class="row gutters-sm">
          <div class="col-md-4 mb-3">
            <div class="card">
              <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center m-b-20">
                  <a href="javascript:void(0)"><img src="<?=base_url()?>asset/freelancers/<?=$freelancer->freelancer_profile?>" class="img-thumbnail" alt="img" width="60%"></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card mb-3">
              <div class="card-body" style="padding-left: 5%;">
                <div class="row">
                  <div class="col-sm-3">
                    <h4 class="mb-0"><strong>Complete Name</strong></h4>
                  </div>
                  <div class="col-sm-9 text-secondary" style="margin-top: 5px; font-size: large;"><?=$freelancer->freelancer_first_name . ", " . $freelancer->freelancer_middle_name . " " . $freelancer->freelancer_last_name;?></div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                      <h4 class="mb-0"><strong>Email</strong></h4>
                    </div>
                    <h5 class="col-sm-9 text-secondary" style="margin-top: 5px; font-size: large;"><?=$freelancer->freelancer_email?></h5>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                      <h4 class=""><strong>Contact Number</strong></h4>
                    </div>
                    <div class="col-sm-9 text-secondary" style="margin-top: 5px; font-size: large;"><?=$freelancer->freelancer_contact?></div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                      <h4 class="mb-0"><strong>Home Address</strong></h4>
                    </div>
                    <div class="col-sm-9 text-secondary" style="margin-top: 5px; font-size: large;" font-size: x-large;><?=$freelancer->freelancer_city?></div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row" style="width: 85%; height: auto; margin: auto;">
        <div class="text-justify text-muted" style= "font-size: 17px;">
            <p>This page will serve as your profile as well as your checklist in completing all the necessary pre-employment requirements. It is your responsibility to frequently check this page for updates. All uploaded documents shall be subject to approval. please be mindful of your uploads. uploads must be clear scans, blurred uploads shall be rejected and will result to the delay of your approval for deployment. Your application shall be considered complete and you will be moved to deployment status once the status bar reflects 100% completed and is green.
            <br><p><strong><u><a href="<?=base_url()?>freelancer/profile/<?=$freelancer_id?>"> Click here</a></u></strong> to proceed submitting your requirements.</p>
            <br><br><br>
        </div>
    </div>
  </div>
</div>


