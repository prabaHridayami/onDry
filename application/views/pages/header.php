<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>DryOn</title>
    <link rel="shortcut icon" href="<?php echo base_url()?>assets/image/title-logo.png">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/login.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/navmenu/styles.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/style.css"/> 
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/fonticons.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/portfolio.jquery.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/responsive.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/plugins.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/fonts/stylesheet.css"/>
     
    <script src="<?php echo base_url()?>assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js" type="text/javascript"></script>
	<style>
		.list-group .active a{
			color:#ffffff;
		}
		.list-group .active{
			background:#2B5766;
			border:none;
		}
		.list-group .active:hover{
			background:#000000;
		}
		.list-group .head{
			background:#032F3E;
			color:#FFFFFF;
			font-weight:bold;
			font-size:17px;
		}
		label{
			cursor:pointer;
		}
	</style>
</head>
<body data-spy="scroll" data-target=".navbar-collapse">
    <nav>
        <div class="container">
            <div class="nav-top clearfix">
                <div class="logo">
                    <a class="navbar-brand" href="">
                        <img class="logonav" src="<?php echo base_url()?>assets/image/logo-laundry.png" alt="logo">
                    </a>
                </div>
                <div class="head_top_social pull-right">
                    <ul class="list-inline">
                        <li>Laundry Online</li>
                        <li class="top_socail">
                            <a href=""><i class="fa fa-facebook"></i></a>
                            <a href=""><i class="fa fa-twitter"></i></a>
                            <a href=""><i class="fa fa-google-plus"></i></a>
                            <a href=""><i class="fa fa-instagram"></i></a>
                        </li> 
						<?php
							if($this->session->userdata('username') ==""){
						?>
                        <li><a href="<?php echo base_url()?>/signupform"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                        <li><a href="#" id="login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
						<?php }else{?>
                        <li><a href="<?php echo base_url()?>/editprofile"><span class="glyphicon glyphicon-user"></span> <?=ucwords($user['nama'])?></a></li>
                        <li><a href="<?=base_url()?>Logins/logout" ><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
						<?php }?>
                    </ul>
                </div>
                <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse" type="button">
                        <span class="sr-only">Toggle navigation</span><i class="fa fa-bars"></i>
                </button>
            </div>
        </div>
        <!-- <div class="main-nav navbar-collapse collapse">
            <div class="container">
                <div class="minilogo">
                    <a href="">
                        <img src="<?php echo base_url()?>assets/image/logo-laundry.png" alt="logo">
                    </a>
                </div>
                <ul class="nav nav-justified">
                    <li><a href="">HOME</a></li>
                    <li><a href="">PROMOTION</a></li>
                    <li><a href="">LAUNDRY</a></li>
                    <li><a href="">FIND US</a></li>
                    <li><a href="<?php echo base_url()?>/about">ABOUT US</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="arrow-up"></div>
        <div class="login-form">
            <form method="post" action="<?php echo base_url()?>logins/login_validation">
                <div>
                    <label for="">Username</label>
                    <input id="user" name='username' type="text" placeholder="Username" required/>
                </div>
                <div>
                    <label for="">Password</label>
                    <input id="pass" name='password' type="password" placeholder="Password" required/>
                </div>
                <div>
                    <input id="login-bot" type="submit" value="Login" />
                    <?php
                        echo '<label class="text-danger">'.$this->session->flashdata("error")
                    ?>
                </div>
            </form>
        </div>		 -->