<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>DryOn</title>
		<link rel="shortcut icon" href="<?php echo base_url()?>assets/image/title-logo.png">

	    <style>
			@import url(http://fonts.googleapis.com/css?family=Exo:100,200,400);
			@import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);

			body{
				margin: 0;
				padding: 0;
				background: #fff;
				color: #fff;
				font-family: Arial;
				font-size: 12px;
				width : 1394px;
				height : 750px;
			}

			.body{
				position: absolute;
				top: -20px;
				left: -20px;
				right: -40px;
				bottom: -40px;
				width: auto;
				height: auto;
				background-image: url(assets/image/02.jpg);
				background-size: cover;
				-webkit-filter: blur(5px);
				z-index: 0;
			}

			.grad{
				position: absolute;
				top: -20px;
				left: -20px;
				right: -40px;
				bottom: -40px;
				width: auto;
				height: auto;
				background: -webkit-gradient(linear, left top, left bottom, color-stop(30%,rgba(0,0,0,0)), color-stop(70%,rgba(0,0,0,0.65))); /* Chrome,Safari4+ */
				z-index: 1;
				opacity: 1;
			}

			.header{
				position: absolute;
				top: calc(50% - 50px);
				left: calc(55% - 400px);
				z-index: 2;
			}

			.header>a>img{
				float: left;
				width: 300px;
			}

			.login{
				position: absolute;
				top: calc(50% - 75px);
				left: calc(50% - 50px);
				height: 150px;
				width: 350px;
				padding: 10px;
				z-index: 2;
			}

			.login input[type=text]{
				width: 250px;
				height: 30px;
				background: transparent;
				border: 1px solid rgba(255,255,255,0.6);
				border-radius: 2px;
				color: #fff;
				font-family: 'Exo', sans-serif;
				font-size: 16px;
				font-weight: 400;
				padding: 4px;
			}

			.login input[type=password]{
				width: 250px;
				height: 30px;
				background: transparent;
				border: 1px solid rgba(255,255,255,0.6);
				border-radius: 2px;
				color: #fff;
				font-family: 'Exo', sans-serif;
				font-size: 16px;
				font-weight: 400;
				padding: 4px;
				margin-top: 10px;
			}

			.login input[type=submit]{
				width: 260px;
				height: 35px;
				background: #fff;
				border: 1px solid #fff;
				cursor: pointer;
				border-radius: 2px;
				color: #a18d6c;
				font-family: 'Exo', sans-serif;
				font-size: 16px;
				font-weight: 400;
				padding: 6px;
				margin-top: 10px;
			}

			.login input[type=submit]:hover{
				opacity: 0.8;
			}

			.login input[type=submit]:active{
				opacity: 0.6;
			}

			.login input[type=text]:focus{
				outline: none;
				border: 1px solid rgba(255,255,255,0.9);
			}

			.login input[type=password]:focus{
				outline: none;
				border: 1px solid rgba(255,255,255,0.9);
			}

			.login input[type=button]:focus{
				outline: none;
			}

			::-webkit-input-placeholder{
			color: rgba(255,255,255,0.6);
			}

			::-moz-input-placeholder{
			color: rgba(255,255,255,0.6);
			}
		</style>
		<script src="js/prefixfree.min.js"></script>

	</head>

	<body>

		<div class="body"></div>
			<div class="grad"></div>
				<div class="header">
						<a class="" href="">
							<img class="logonav" src="<?php echo base_url()?>assets/image/logo-laundry.png" alt="logo">
						</a>
				</div>
				<br>
				<div class="login">
					<form method="post" action="<?php echo base_url()?>adminLogins/loginAdmin">
						<input type="text" placeholder="username" name="username"><br>
						<input type="password" placeholder="password" name="password"><br>
						<input type="submit" value="Login">
						<div>
						<?php
                        echo '<label class="text-danger" id="login_error" style="font-size : 14pt;">'.$this->session->flashdata("message");
                    	?>
						</div>
					</form>
					
				</div>

  <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>

</body>

</html>