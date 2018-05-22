<!DOCTYPE html>
<html>
<?php 
    if($this->session->flashdata('Successfully')){
    echo '<script language="javascript">';
    echo 'alert("Registration Success")';
    echo '</script>';
    }
?>                  
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
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/dashbor.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/style.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/fonticons.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/portfolio.jquery.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/responsive.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/plugins.css"/>
    <!-- <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/js/slide.js"/> -->
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/fonts/stylesheet.css"/>
    
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js" type="text/javascript"></script>
    <style>
        .button-log{
            padding:5px;
            border-radius:5px;
            background:#fff;
            color:#3399cc;
            font-size: 16px;
            border:none;
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
                            <a href="https://www.facebook.com/Laundry-Online-382465492228437/?modal=admin_todo_tour"><i class="fa fa-facebook"></i></a>
                            <a href=""><i class="fa fa-twitter"></i></a>
                            <a href=""><i class="fa fa-google-plus"></i></a>
                            <a href=""><i class="fa fa-instagram"></i></a>
                        </li> 
                        <?php
							if($this->session->userdata('user') ==""){
						?>
                        <li><a href="<?php echo base_url()?>/signupform"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                        <li><a href="#" id="login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
						<?php }else{ ($username = $this->session->userdata['usernameUser']);?>
                        <li><a href="<?php echo base_url()?>/mydashbor/index"><span class="glyphicon glyphicon-user"></span> <?= $username?></a></li>
                        <li><button class="button-log" data-toggle="modal" data-target=".bs-example-modal-sm"><span class="glyphicon glyphicon-log-in"></span> Logout</button></li>
						<?php }?>
                    </ul>
                </div>
                <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse" type="button">
                        <span class="sr-only">Toggle navigation</span><i class="fa fa-bars"></i>
                </button>
            </div>
        </div>
        <div class="main-nav navbar-collapse collapse">
            <div class="container">
                <div class="minilogo">
                    <a href="">
                        <img src="<?php echo base_url()?>assets/image/logo-laundry.png" alt="logo">
                    </a>
                </div>
                <ul class="nav nav-justified">
                    <li><a href="#home">HOME</a></li>
                    <li><a href="#laundry">LAUNDRY</a></li>
                    <li><a href="#promotion">PROMOTION</a></li>
                    <li><a href="#find-us">FIND US</a></li>
                    <li><a href="#about-us">ABOUT US</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="arrow-up"></div>
        <div class="login-form">
            <form method="post" action="<?php echo base_url()?>logins/login">
            <?php

            ?>
                <div>
                    <label for="">Username</label>
                    <input id="user" name='username' type="text" placeholder="Username" required/>
                </div>
                <div>
                    <label for="">Password</label>
                    <input id="pass" name='password' type="password" placeholder="Password" required/>
                </div>
                <div>
                    <input type="checkbox" name="remember" value="TRUE" id="remember" /><label>Remember Me</label>
                </div>
                <div>
                    <input id="login-bot" type="submit" value="Login" />
                </div>
                <?php
                        echo '<label class="text-danger" id="login_error">'.$this->session->flashdata("message");
                ?>
            </form>
        </div>

    <section id="home" class="home" style= "background-image: url('assets/image/02.jpg'); width:1349px; height:750px; ">
        <div class="overlay" >
        
        </div>
    </section>
    <section id="laundry">
            <div class="container">
                <p>PUT LAUNDRY HERE</p>
                <a style="margin-top:150px; margin-bottom:50px; width:30%" href="<?php echo base_url()?>mydashbor/order" class="btn btn-primary">Order Here</a>	
                <?php
                    if(isset($_GET['st'])){
                        if($_GET['st']=="success"){
                            echo"
                            <div class='alert alert-success'>
                                Aksi berhasil
                            </div>";
                        }else{
                            echo"
                                <div class='alert alert-danger'>
                                    Login terlebih dahulu
                                </div>
                            ";
                                        
                        }
                    }
                ?> 
            </div>
        </div>
    </section>
    <section id="promotion">
        <div id="slide" >
            <div class="slideshow-container" >
                <div class="mySlides fade"> <img class="promo" src="<?php echo base_url()?>assets/image/promo1.png"> </div>
                <div class="mySlides fade"> <img class="promo" src="<?php echo base_url()?>assets/image/promo2.png" style="width:100%"> </div>
                <div class="mySlides fade"> <img class="promo" src="<?php echo base_url()?>assets/image/03.jpg"> </div>
                <div class="mySlides fade"> <img class="promo" src="<?php echo base_url()?>assets/image/04.jpg" style="width:100%"> </div>
                
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a> <a class="next" onclick="plusSlides(1)">&#10095;</a> 
                <div style="text-align:center"> 
                    <span class="dot" onclick="currentSlide(1)"></span> 
                    <span class="dot" onclick="currentSlide(2)"></span> 
                    <span class="dot" onclick="currentSlide(3)"></span>
                    <span class="dot" onclick="currentSlide(4)"></span>
                </div>
            </div>
        </div>
    </section>
    <section id="find-us">
        <div class="container">
            <h3 style="margin-top:-70px;">FIND US HERE</h3>
            <iframe src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;coord=-8.7982727,115.17239210000002&amp;q=Jln.%20Raya%20Kampus%20Unud%2C%20Bukit%20Jimbaran+(Ondry)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=A&amp;output=embed" width="100%" height="515px" frameborder="0" style="border:0" scrolling="no" marginheight="0" marginwidth="0"></iframe></script>
        </div>
    </section>
    <section id="about-us" style=" background:#032f3e; width:1349px; height:200px; ">
        <div class="container">
        </div>
    </section>

    <div class="footer">   
        <h6  style="margin:0px;">© 2018 DryOn Inc. All rights reserved. </h6>
    </div>
    <!-- Small modal -->
    <div class="modal bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
            <div class="modal-header"><h4>Logout <i class="fa fa-lock"></i></h4></div>
            <div class="modal-body"><i class="fa fa-question-circle"></i> Are you sure you want to log-out?</div>
            <div class="modal-footer"><a href="<?=base_url()?>Logins/logout" class="btn btn-primary btn-block">Logout</a></div>
            </div>
        </div>
    </div>

        <script src="assets/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="assets/js/vendor/bootstrap.min.js"></script>
        <script src="assets/js/jquery.easypiechart.min.js"></script>
        <script src="assets/js/portfolio.jquery.js"></script>
        <script src="assets/js/jquery.mixitup.min.js"></script>
        <script src="assets/js/jquery.easing.1.3.js"></script>
        <script src="assets/js/jquery.slicknav.min.js"></script>
        <!--This is link only for gmaps-->
       
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>

        <script type="text/javascript">
            $(document).ready(function(){
            var arrow =$('.arrow-up');
            var form =$('.login-form');
            var status = "false";
                $('#login').click(function(event){
                    event.preventDefault();
                    if(status==false){
                        arrow.fadeIn();
                        form.fadeIn();
                        status = true;
                    }
                
                    else{
                    arrow.fadeOut();
                        form.fadeOut();
                        status = false;
                    }
                })
            })
        </script>
        <script>

            var slideIndex = 0;
            showSlides();
            var slides,dots;

            function plusSlides(position) {
                slideIndex += position;
                if (slideIndex > slides.length) {slideIndex = 1}
                else if(slideIndex < 1){slideIndex = slides.length}
                for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");

                }
                    slides[slideIndex-1].style.display = "block";  
                    dots[slideIndex-1].className += " active";
                }

            function currentSlide(index) {
                if (index > slides.length) {index = 1}
                else if(index < 1){index = slides.length}
                for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                    slides[index-1].style.display = "block";  
                    dots[index-1].className += " active";
                }

            function showSlides() {
                var i;
                slides = document.getElementsByClassName("mySlides");
                dots = document.getElementsByClassName("dot");
                for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
                }
                slideIndex++;
                if (slideIndex> slides.length) {slideIndex = 1}    
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex-1].style.display = "block";  
                dots[slideIndex-1].className += " active";
                setTimeout(showSlides, 5000); // Change image every 3 seconds
            }

            function initMap() {
                var uluru = {lat: -25.363, lng: 131.044};
                var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 4,
                center: uluru
                });
                var marker = new google.maps.Marker({
                position: uluru,
                map: map
                });
            }

        </script>
        <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFuysYvwzP87U4KqDVk423Ew8AYb7y920">
        </script>

        <script>
            $('#divjp').hide();$('#divbp').hide();
            
            $('#jp').click(function(){
                $('#divjp').show();
                $('#divbp').hide();
                $('#berat_pakaian').removeAttr('required');
            });
            $('#bp').click(function(){
                $('#divbp').show();
                $('#divjp').hide();
                $('#berat_pakaian').attr('required','required');
            });
        </script>

</body>
</html>
