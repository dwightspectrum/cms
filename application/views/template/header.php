<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>asset/components/images/hwi_favicon_logo.png">
    <title>Hotwork International Inc.</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url()?>asset/components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="<?=base_url()?>asset/components/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="<?=base_url()?>asset/components/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="<?=base_url()?>asset/components/plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!--alerts CSS -->
    <link href="<?=base_url()?>asset/components/plugins/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <!-- Switchery -->
    <link href="<?=base_url()?>asset/components/plugins/bower_components/switchery/dist/switchery.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>asset/components/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- Calendar CSS -->
    <link href="<?=base_url()?>asset/components/plugins/bower_components/calendar/dist/fullcalendar.css" rel="stylesheet" />
    <!-- animation CSS -->
    <link href="<?=base_url()?>asset/components/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?=base_url()?>asset/components/css/style.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?=base_url()?>asset/components/css/app.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?=base_url()?>asset/components/css/colors/default.css" id="theme" rel="stylesheet">
    <!-- Date picker plugins css -->
    <link href="<?=base_url()?>asset/components/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>asset/components/plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
    <!-- Alertify CSS -->
    <link href="<?=base_url()?>asset/components/alertify/alertify.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>asset/components/css/tooltipster.bundle.min.css" rel="stylesheet">
    <link href="<?=base_url()?>asset/components/css/tooltipster-sideTip-punk.min.css" rel="stylesheet">

    <script type="text/javascript">
        var CONFIG = <?=json_encode($cfg)?>;
        
    </script>

    <script src="<?=base_url()?>asset/components/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?=base_url()?>asset/components/js/popper.min.js"></script>
    <script src="<?=base_url()?>asset/components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>asset/components/js/tooltipster.bundle.min.js"></script>
    <script src="<?=base_url()?>asset/src/common.js"></script>

  
</head>

<body class="fix-header show-sidebar hide-sidebar">
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo m-b-0" href="<?=base_url()?>">
                        <!-- Logo icon image, you can use font-icon also --><b>
                        <!--This is dark logo icon--><img src="<?=base_url()?>asset/components/images/hwi-logo-r.png" alt="home" class="light-logo" width="40" /><!--This is light logo icon--></b>
                        <!--This is light logo icon-->
                        <b class="hidden-xs">
                            <img src="<?=base_url()?>asset/components/images/hwi_logo.png" alt="home" class="light-logo" width="100" loading="lazy" />
                        </b>
                        
                    </a>
  
                </div>
                <!-- /Logo -->
                <!-- Search input and Toggle icon -->
                <ul class="nav navbar-top-links navbar-left">
                    <?php if($isAdmin){ ?>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="mdi mdi-account-multiple"></i> <span class="hide-menu">Employee <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li> <a href="<?=base_url()?>employee/view"><i class="mdi mdi-clipboard-text fa-fw"></i><span class="hide-menu">List</span></a> </li>
                                <li> <a href="<?=base_url()?>employee/add"><i class="mdi mdi-plus fa-fw"></i><span class="hide-menu">Add</span></a> </li>
                            </ul>
                            <!-- /.dropdown-user -->
                        </li>

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="mdi mdi-account"></i> <span class="hide-menu">Freelancer <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li> 
                                    <a href="<?=base_url()?>freelancer/view"><i class="mdi mdi-clipboard-text fa-fw"></i><span class="hide-menu">List</span></a> 
                                </li>
                                <li> 
                                    <a href="<?=base_url()?>freelancer/add"><i class="mdi mdi-plus fa-fw"></i><span class="hide-menu">Add</span></a> 
                                </li>
                            </ul>
                            <!-- /.dropdown-user -->
                        </li>
                        <!-- /.dropdown -->
                    <?php }?>
                </ul>
 
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <?php if($isAdmin){ ?>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <img id="employee_profile_pic" alt="user-img" width="36" class="img-circle">&nbsp;&nbsp;<b class="hidden-xs"><?=$this->session->userdata('employee_first_name')?></b>&nbsp;&nbsp; <span class="badge badge-light" id="notification"> 0 </span> &nbsp;</a>
                            <div class="dropdown-menu dropdown-user animated flipInY">
                                <div id="nofication-data" style="overflow-x:hidden; overflow-y: scroll;"></div>
                                <a href="#" id="mark_all_btn" class="pull-right" style="padding: 10px; font-size: 13px;"><i>&rarr; mark all as read</i></a>
                            </div>
                            <!-- /.dropdown-user -->
                        </li>
                        <li class="dropdown ">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span> </a>
                            <ul class="dropdown-menu dropdown-user animated flipInY">
                                <li><a href="<?=base_url()?>login/logout"><i class="fa fa-power-off"></i> Logout</a></li>
                            </ul>
                            <!-- /.dropdown-user -->
                        </li>
                        <?php }else if($isFreelancer) {?>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <img id="freelancer_profile_pic" alt="user-img" width="36" class="img-circle">&nbsp;&nbsp;<b class="hidden-xs"><?=$this->session->userdata('freelancer_first_name')?></b>&nbsp;<span class="caret"></span> </a>
                            <ul class="dropdown-menu dropdown-user animated flipInY">
                                <li><a href="<?=base_url()?>login/logout"><i class="fa fa-power-off"></i> Logout</a></li>
                            </ul>
                            <!-- /.dropdown-user -->
                        </li>
                    <?php }else {?>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <img id="employee_profile_pic"  alt="user-img" width="36" class="img-circle">&nbsp;&nbsp;<b class="hidden-xs"><?=$this->session->userdata('employee_first_name')?></b>&nbsp;<span class="caret"></span> </a>
                            <ul class="dropdown-menu dropdown-user animated flipInY">
                                <li><a href="<?=base_url()?>login/logout"><i class="fa fa-power-off"></i> Logout</a></li>
                            </ul>
                            <!-- /.dropdown-user -->
                        </li>  
                    <?php }  ?>
                    
                    <!-- /.dropdown -->
                </ul>
            </div>
        </nav>
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3> </div>
                <ul class="nav" id="side-menu">
                    <!-- <li> <a href="<?=base_url()?>dashboard" class="waves-effect"><i class="mdi mdi-av-timer fa-fw" data-icon="v"></i> <span class="hide-menu"> Dashboard </span></a>
                    </li> -->
                    <?php if($isAdmin){ ?>
                    <li> <a href="<?=base_url()?>employee" class="waves-effect"><i class="mdi mdi-account fa-fw" data-icon="v"></i> <span class="hide-menu"> Employee <span class="fa arrow"></span> </span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="<?=base_url()?>employee/view"><i class="mdi mdi-clipboard-text fa-fw"></i><span class="hide-menu">List</span></a> </li>
                            <li> <a href="<?=base_url()?>employee/add"><i class="mdi mdi-plus fa-fw"></i><span class="hide-menu">Add</span></a> </li>
                        </ul>
                    </li>
                    <?php } ?>
                    <?php if($isAdmin){ ?>
                    <li> <a href="<?=base_url()?>freelancer" class="waves-effect"><i class="mdi mdi-account fa-fw" data-icon="v"></i> <span class="hide-menu"> Freelancer <span class="fa arrow"></span> </span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="<?=base_url()?>freelancer/view"><i class="mdi mdi-clipboard-text fa-fw"></i><span class="hide-menu">List</span></a> </li>
                            <li> <a href="<?=base_url()?>freelancer/add"><i class="mdi mdi-plus fa-fw"></i><span class="hide-menu">Add</span></a> </li>
                        </ul>
                    </li>
                    <?php } ?>
                    <!-- <li> <a href="<?=base_url()?>invoice" class="waves-effect"><i class="mdi mdi-book fa-fw" data-icon="v"></i> <span class="hide-menu"> Invoice <span class="fa arrow"></span> </span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="<?=base_url()?>invoice/view"><i class="mdi mdi-book-multiple fa-fw"></i><span class="hide-menu">List</span></a> </li>
                            <li> <a href="<?=base_url()?>invoice/form"><i class="mdi mdi-plus fa-fw"></i><span class="hide-menu">Add</span></a> </li>
                        </ul>
                    </li>
                    <li class="devider"></li>
                    <?php if($isAccounting){ ?>
                    <li><a href="<?=base_url()?>rate" class="waves-effect"><i class="fa fa-money fa-fw"></i> <span class="hide-menu">Rates</span></a></li>
                    <li><a href="<?=base_url()?>currencyexchange" class="waves-effect"><i class="fa fa-usd fa-fw"></i> <span class="hide-menu">Currency Exchange</span></a></li>
                    <?php } ?>
                    <?php if($isAdmin){ ?>
                    <li><a href="<?=base_url()?>tickettracker" class="waves-effect"><i class="fa fa-plane fa-fw"></i> <span class="hide-menu">Airline Ticket Tracker</span></a></li>
                    <li><a href="<?=base_url()?>purchaseorder" class="waves-effect"><i class="fa fa-briefcase fa-fw"></i> <span class="hide-menu">Project</span></a></li>
                    <?php } ?>
                    <li><a href="<?=base_url()?>login/logout" class="waves-effect"><i class="mdi mdi-logout fa-fw"></i> <span class="hide-menu">Log out</span></a></li>
                    <li class="devider"></li> -->
                    <!-- <li><a href="documentation.html" class="waves-effect"><i class="fa fa-circle-o text-danger"></i> <span class="hide-menu">Documentation</span></a></li>
                    <li><a href="gallery.html" class="waves-effect"><i class="fa fa-circle-o text-info"></i> <span class="hide-menu">Gallery</span></a></li>
                    <li><a href="faq.html" class="waves-effect"><i class="fa fa-circle-o text-success"></i> <span class="hide-menu">Faqs</span></a></li> -->
                </ul>
            </div>
        </div>
        <div id="page-wrapper">