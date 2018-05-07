<html>
<?php
    if ($this->session->userdata['admin']==TRUE) {
        $username = ($this->session->userdata['usernameAdmin']);
    } else {
        $this->session->set_flashdata('error','Invalid Username and Password');
    }
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>DryOn</title>
    <link rel="shortcut icon" href="<?php echo base_url()?>assets/image/title-logo.png">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/fonticons.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/portfolio.jquery.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/table.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/sidebar.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/style.css" />
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/jquery-1.11.2.min.js" type="text/javascript"></script>

</head>

<body>
    <div class="wrapper">
        <nav id="sidebar">
            <ul class="list-unstyled" style="font-family: sans-serif; margin-top:50px;">
                <li class="header">
                    MAIN NAVIGATION
                </li>
                <li>
                    <a href="<?php echo base_url()?>/Admins/index">
                        <i class="glyphicon glyphicon-home"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="#" style="font-family: sans-serif">
                        <i class="glyphicon glyphicon-briefcase"></i>
                        Transaksi
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url()?>/Admins/member" style="font-family: sans-serif">
                        <i class="glyphicon glyphicon-user"></i>
                        Member
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url()?>/Admins/pegawai" style="font-family: sans-serif">
                        <i class="glyphicon glyphicon-info-sign"></i>
                        Pegawai
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url()?>/adminLogins/logoutAdmin" style="font-family: sans-serif">
                        <i class="glyphicon glyphicon-off"></i>
                        Log Out
                    </a>
                </li>
            </ul>
        </nav>
        <div class="main-navbar">
            <div class="main-header">
                <a href="#" class="logo">
                    <div class="logo-lg" id="logo">
                        <img class="logonav" src="<?php echo base_url()?>assets/image/logo-laundry.png" alt="logo">
                    </div>
                </a>
            </div>
            <nav class="navbar" id="navbar">
                <!-- <a href="#" class="navbar-left" id="sidebarCollapse">
                    <i class="glyphicon glyphicon-th-list">
                    </i>
                </a> -->
                <a href="#" id="account" style="float:left; margin-top:15px; margin-left:50px;"><span class="glyphicon glyphicon-user" style="right:10px;"></span><?php echo $username ?></a>
            </nav>
        </div>
        
