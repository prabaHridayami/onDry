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
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/loader/main.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/loader/normalize.css"/>
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
        .sos-ico{
            text-align : center;
        }
        .social-list {
            display: inline-block;
            line-height: 1;
            padding: 0px; 
        }
        
        .social-list > * {
            display: inline-block;
            margin: 0 8px;
        }
        
        .social-list a {
            display: block;
            transition: opacity 0.4s ease-out; 
        }
        
        .social-list a:hover {
            opacity: 0.6; 
        }

        .ico{
            height: 40px;
            width: auto;
        }
    </style>
</head>
		<div id="loader-wrapper">
			<div id="loader"></div>

			<div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>

		</div>
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

    <section id="home" class="home" style= "background-image: url('assets/image/08.jpg'); width:1349px; height:750px; ">
        <div class="overlay" >
        
        </div>
    </section>
    <section id="laundry" style="background-image: url('assets/image/07.jpg'); height:600px;" >
            <div class="container">
                <p>PUT LAUNDRY HERE</p>
                <a style="margin-top:100px; margin-bottom:50px;width:30%" href="<?php echo base_url()?>order" class="btn btn-primary">Order Here</a>	
                <?php
                    if(isset($_GET['st'])){
                        if($_GET['st']=="success"){
                            echo"
                            <div class='alert alert-success'>
                                Aksi berhasil
                            </div>";
                        }else{
                            echo"
                            <script language='javascript'>alert('Login First')</script>
                            ";
                                        
                        }
                    }
                ?> 
            </div>
        </div>
    </section>
    <section id="promotion" style="background:#fff;">
    
    <script src="<?php echo base_url()?>assets/js/jssor.slider-27.1.0.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        jssor_1_slider_init = function() {

            var jssor_1_SlideoTransitions = [
              [{b:-1,d:1,o:-0.7}],
              [{b:900,d:2000,x:-379,e:{x:7}}],
              [{b:900,d:2000,x:-379,e:{x:7}}],
              [{b:-1,d:1,o:-1,sX:2,sY:2},{b:0,d:900,x:-171,y:-341,o:1,sX:-2,sY:-2,e:{x:3,y:3,sX:3,sY:3}},{b:900,d:1600,x:-283,o:-1,e:{x:16}}]
            ];

            var jssor_1_options = {
              $AutoPlay: 1,
              $SlideDuration: 800,
              $SlideEasing: $Jease$.$OutQuint,
              $CaptionSliderOptions: {
                $Class: $JssorCaptionSlideo$,
                $Transitions: jssor_1_SlideoTransitions
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 3000;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
    </script>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300italic,regular,italic,700,700italic&subset=latin-ext,greek-ext,cyrillic-ext,greek,vietnamese,latin,cyrillic" rel="stylesheet" type="text/css" />
    <style>
        /*jssor slider loading skin spin css*/
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /*jssor slider bullet skin 032 css*/
        .jssorb032 {position:absolute;}
        .jssorb032 .i {position:absolute;cursor:pointer;}
        .jssorb032 .i .b {fill:#fff;fill-opacity:0.7;stroke:#000;stroke-width:1200;stroke-miterlimit:10;stroke-opacity:0.25;}
        .jssorb032 .i:hover .b {fill:#000;fill-opacity:.6;stroke:#fff;stroke-opacity:.35;}
        .jssorb032 .iav .b {fill:#000;fill-opacity:1;stroke:#fff;stroke-opacity:.35;}
        .jssorb032 .i.idn {opacity:.3;}

        /*jssor slider arrow skin 051 css*/
        .jssora051 {display:block;position:absolute;cursor:pointer;}
        .jssora051 .a {fill:none;stroke:#fff;stroke-width:360;stroke-miterlimit:10;}
        .jssora051:hover {opacity:.8;}
        .jssora051.jssora051dn {opacity:.5;}
        .jssora051.jssora051ds {opacity:.3;pointer-events:none;}
    </style>
    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;">
            <div data-p="225.00">
                <img data-u="image" src="<?php echo base_url()?>assets/image/03.jpg" />
                <div data-u="caption" data-t="0" style="position:absolute;top:120px;left:75px;width:470px;height:220px;">
                    <img style="position:absolute;top:0px;left:0px;width:470px;height:220px;" src="<?php echo base_url()?>assets/img/c-phone-horizontal.png" />
                    <div style="position:absolute;top:4px;left:45px;width:379px;height:213px;overflow:hidden;">
                        <img data-u="caption" data-t="1" style="position:absolute;top:0px;left:0px;width:379px;height:213px;" src="<?php echo base_url()?>assets/img/c-slide-1.jpg" />
                        <img data-u="caption" data-t="2" style="position:absolute;top:0px;left:379px;width:379px;height:213px;" src="<?php echo base_url()?>assets/img/c-slide-3.jpg" />
                    </div>
                    <img style="position:absolute;top:4px;left:45px;width:379px;height:213px;" src="img/c-navigator-horizontal.png" />
                    <img data-u="caption" data-t="3" style="position:absolute;top:476px;left:454px;width:63px;height:77px;" src="<?php echo base_url()?>assets/img/hand.png" />
                </div>
            </div>
            <div data-p="225.00">
                <img data-u="image" src="<?php echo base_url()?>assets/image/promo1.png" />
            </div>
            <div data-p="225.00">
                <img data-u="image" src="<?php echo base_url()?>assets/image/promo2.png" />
                <div style="position:absolute;top:30px;left:30px;width:480px;height:130px;font-family:'Roboto Condensed',sans-serif;font-size:40px;color:#000000;line-height:1.5;padding:5px 5px 5px 5px;box-sizing:border-box;">
<br />
                </div>
                <div style="position:absolute;top:300px;left:30px;width:480px;height:130px;font-family:'Roboto Condensed',sans-serif;font-size:30px;color:#000000;line-height:1.27;padding:5px 5px 5px 5px;box-sizing:border-box;"></div>
            </div>
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb032" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
            <div data-u="prototype" class="i" style="width:16px;height:16px;">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                </svg>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora051" style="width:65px;height:65px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora051" style="width:65px;height:65px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
            </svg>
        </div>
    </div>
    <script type="text/javascript">jssor_1_slider_init();</script>
    </section>
    <section id="find-us" style="background:#fff">
        <div class="container">
            <h3 style="margin-top:-70px; color:#000;">FIND US HERE</h3>
            <iframe src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;coord=-8.7982727,115.17239210000002&amp;q=Jln.%20Raya%20Kampus%20Unud%2C%20Bukit%20Jimbaran+(Ondry)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=A&amp;output=embed" width="100%" height="515px" frameborder="0" style="border:0" scrolling="no" marginheight="0" marginwidth="0"></iframe></script>
        </div>
    </section>
    <section id="about-us" style=" background:#032f3e; width:1349px; height:550px; color:#fff; ">
        <div class="container">
            <div>
                <h3 style="text-align: center;font-size: 24px; letter-spacing: 0.35em; ">Ondry</h3>
                <hr>
            </div>
            <h3 style="text-align: center; margin-top: 0 ">About Us</h3>
            <p style="text-decoration-color: aliceblue; color: #fff; ">Ondry merupakan sebuah layanan online laundry. Rapid Clean disini tercipta karena banyaknya mahasiswa dilingkungan
                kampus, dan faktor utamanya disini karena ada beberapa orang yang memang malas mencuci pakainnya dan membawanya
                ke laundry dan beberapa orang yang memang sibuk dengan pekerjaan kantor ataupun tugas - tugas dari kegiatan
                kampusnya, jadi disini kami membuat sebuah website yang memudahkan orang - orang tersebut.</p>
            <hr>
        </div>
        <div class="footer">
            <div>
                <div class="sos-ico ">
                    <ul class="social-list ">
                        <li>
                            <a href="#" target="_blank ">
                                <img class="ico" src="<?php echo base_url()?>assets/image/fb.png">

                            </a>
                        </li>
                        <li>
                            <a href="#" target="_blank ">
                                <img class="ico" src="<?php echo base_url()?>assets/image/insta.png">
                            </a>
                        </li>
                        <li>
                            <a href="#" target="_blank ">
                                <img class="ico" src="<?php echo base_url()?>assets/image/g+.png">
                            </a>
                        </li>
                    </ul>
                    <p class="sos-text "> Follow US On Social Media</p>
                    <p  style="margin:0px;">© 2018 DryOn Inc. All rights reserved. </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Small modal -->
    <div class="modal bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
            <div class="modal-header"><h4>Logout <i class="fa fa-lock"></i></h4></div>
            <div class="modal-body"><i class="fa fa-question-circle"></i> Are you sure you want to log-out?</div>
            <div class="modal-footer"><form method="post" action="<?=base_url()?>Logins/logout"><input name="logoutuser" type="hidden" value="<?=$username?>"/><button class="btn btn-primary btn-block">Logout</button></form></div>
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

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	    <script>window.jQuery || document.write('<script src="<?php echo base_url()?>js/loader/vendor/jquery-1.9.1.min.js"><\/script>')</script>
	    <script src="<?php echo base_url()?>assets/js/loader/main.js"></script>

</body>
</html>
