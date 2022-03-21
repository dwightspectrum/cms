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
		<!-- animation CSS -->
		<link href="<?=base_url()?>asset/components/css/animate.css" rel="stylesheet">
		<!-- Custom CSS -->
		<link href="<?=base_url()?>asset/components/css/style.css" rel="stylesheet">
		<!-- Custom CSS -->
		<link href="<?=base_url()?>asset/components/css/app.css" rel="stylesheet">
		<!-- color CSS -->
		<link href="<?=base_url()?>asset/components/css/colors/default.css" id="theme"  rel="stylesheet">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<style type="text/css">
        #particles-js canvas {
            display: block;
            -webkit-transform: scale(1);
            -ms-transform: scale(1);
            transform: scale(1);
            opacity: 1;
            -webkit-transition: opacity .8s ease, -webkit-transform 1.4s ease;
            transition: opacity .8s ease, transform 1.4s ease
        }

        #particles-js {
            width: 100%;
            height: 100%;
            position: fixed;
            z-index: -10;
            top: 0;
            left: 0
        }
        </style>
	</head>
	<body>
	<div id="particles-js"></div>
<!-- Preloader -->
	<div class="preloader">
	  <div class="cssload-speeding-wheel"></div>
	</div>
	<section id="wrapper" class="new-login-register">
      	<div class="lg-info-panel">
          	<div class="inner-panel">
              	<a href="javascript:void(0)" class="p-20 di"><img src="<?=base_url()?>asset/components/images/hwi-logo-r.png" width="40"></a>
              	<div class="lg-content">
              		<h2>Welcome to <br>Hotwork International Inc.</h2>
                  	<p class="text-muted">Flexibility, Experience and 24/7 Availability and 150+ fully committed Engineers in over 8 locations. Hotwork International is “Your Best Solutions Partner” for your global projects. We provide services such as refractory dry out and heat up solutions for all industries. Our specialized Combustion and Melting system technology increases energy efficiency and reduce emissions (Low NOx, reduced CO2).</p>
                  	<a href="https://www.hotwork.ag/about-us/" class="btn btn-rounded btn-danger p-l-20 p-r-20">About Us</a>
              	</div>
          	</div>
  		</div>
      	<div class="new-login-box">
            <div class="white-box " style="border: 1px solid #c7c7c7;box-shadow: 0px 0px 20px 10px rgb(136 136 137 / 64%);">
	            <h3 class="box-title m-b-0">Sign In</h3>
	            <small>Enter your details below</small>
                  <form class="form-horizontal new-lg-form" id="loginform" action="<?=base_url()?>login/login_user_credentials" method="POST">
                    
                    <div class="form-group  m-t-20"> 
                      	<div class="col-xs-12">
                        	<label>Username</label>
                        	<input class="form-control" name="employee_username" type="text" required="" placeholder="Username">
                      	</div>
                    </div>
                    <div class="form-group">
                      	<div class="col-xs-12">
                        	<label>Password</label>
                        	<input class="form-control" name="employee_password" type="password" required="" placeholder="Password">
                      	</div>
                    </div>                    <div class="form-group text-center m-t-20">
						<div class="col-md-12">
							<a class="btn btn-warning" id="alert" style="width:100%;<?php echo ($this->session->flashdata('error')) ? "":"display:none"; ?>"><?php echo $this->session->flashdata('error'); ?></a> 
						</div>
                    </div>
                    <div class="form-group text-center m-t-20">
                      	<div class="col-xs-12">
                        	<button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="submit">Log In</button>
                      	</div>
                    </div>
                    <div class="form-group m-b-0">
                      	<div class="col-sm-12 text-center">
                        	<p>Don't have an account? Please send a request at <a><b>warren.taniza@hotwork.ag</b></a></p>
							<p>Are you a <mark>Freelancer</mark>? Click <a href="<?=base_url()?>login/login_freelancer" style="color:#d9534f;" onMouseOver="this.style.color='#ff0700'" onMouseOut="this.style.color='#d9534f'"><b><u>here</u></b></a> to sign in.</p>
                      	</div>
                    </div>
              	</form>
            </div>
      	</div>
		 
	</section>
	<!-- jQuery -->
	<script src="<?=base_url()?>asset/components/plugins/bower_components/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="<?=base_url()?>asset/components/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- Menu Plugin JavaScript -->
	<script src="<?=base_url()?>asset/components/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>

	<!--slimscroll JavaScript -->
	<script src="<?=base_url()?>asset/components/js/jquery.slimscroll.js"></script>
	<!--Wave Effects -->
	<script src="<?=base_url()?>asset/components/js/waves.js"></script>
	<!-- Custom Theme JavaScript -->
	<script src="<?=base_url()?>asset/components/js/custom.min.js"></script>
	<!--Style Switcher -->
	<script src="<?=base_url()?>asset/components/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
		    $(function () {
		        $(".preloader").fadeOut()
		    });
			particlesJS("particles-js", {
                "particles": {
                    "number": {
                        "value": 50,
                        "density": {
                            "enable": true,
                            "value_area": 800
                        }
                    },
                    "color": {
                        "value": "#9E9E9E"
                    },
                    "shape": {
                        "type": "circle",
                        "stroke": {
                            "width": 0,
                            "color": "#eee"
                        },
                        "polygon": {
                            "nb_sides": 5
                        },
                        "image": {
                            "src": "img/github.svg",
                            "width": 70,
                            "height": 70
                        }
                    },
                    "opacity": {
                        "value": 0.5,
                        "random": false,
                        "anim": {
                            "enable": false,
                            "speed": 1,
                            "opacity_min": 0.1,
                            "sync": false
                        }
                    },
                    "size": {
                        "value": 3,
                        "random": true,
                        "anim": {
                            "enable": false,
                            "speed": 40,
                            "size_min": 0.1,
                            "sync": false
                        }
                    },
                    "line_linked": {
                        "enable": true,
                        "distance": 150,
                        "color": "#616161",
                        "opacity": 0.4,
                        "width": 1
                    },
                    "move": {
                        "enable": true,
                        "speed": 6,
                        "direction": "none",
                        "random": false,
                        "straight": false,
                        "out_mode": "out",
                        "bounce": false,
                        "attract": {
                            "enable": false,
                            "rotateX": 600,
                            "rotateY": 1200
                        }
                    }
                },
                "interactivity": {
                    "detect_on": "canvas",
                    "events": {
                        "onhover": {
                            "enable": true,
                            "mode": "repulse"
                        },
                        "onclick": {
                            "enable": true,
                            "mode": "push"
                        },
                        "resize": true
                    },
                    "modes": {
                        "grab": {
                            "distance": 400,
                            "line_linked": {
                                "opacity": 1
                            }
                        },
                        "bubble": {
                            "distance": 400,
                            "size": 40,
                            "duration": 2,
                            "opacity": 8,
                            "speed": 3
                        },
                        "repulse": {
                            "distance": 200,
                            "duration": 0.4
                        },
                        "push": {
                            "particles_nb": 4
                        },
                        "remove": {
                            "particles_nb": 2
                        }
                    }
                },
                "retina_detect": true
            })
	   });	
	</script>
	<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js" defer data-deferred="1"></script>
	</body>
</html>
