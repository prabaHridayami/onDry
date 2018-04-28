<!DOCTYPE html>
<html>
<head>
    <title>Ondry</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/signup.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-theme.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.css">
    <link rel="shortcut icon" href="<?php echo base_url()?>assets/image/title-logo.png">
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/navmenu/styles.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/fonticons.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/portfolio.jquery.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/responsive.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/plugins.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/fonts/stylesheet.css"/>
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js" type="text/javascript"></script>        
</head>

<body>
<div class="container">
    <div class="nav-top clearfix">
        <div class="logo">
            <a class="navbar-brand" href=" ">
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
                <li><a href="#" id="login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>
        <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse" type="button">
                <span class="sr-only">Toggle navigation</span><i class="fa fa-bars"></i>
        </button>
    </div>
</div>
<div class="blue"></div>
<div class="atas">
    <h3>Register</h3>
    <?php if (validation_errors()) : ?>
        <div class="col-md-5">
            <div class="alert alert-danger" role="alert" style="margin-left:100px;">
                <?= validation_errors() ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if (isset($error)) : ?>
        <div class="col-md-5">
            <div class="alert alert-danger" role="alert" style="margin-left:100px;>
                <?= $error ?>
            </div>
        </div>
    <?php endif; ?>
    <div class="col-md-12">
</div>
<form method="post" action="<?php echo base_url()?>users/register">
<?php if($responce = $this->session->flashdata('Successfully')):
    echo '<script type="text/javascript">';
    echo 'BootstrapDialog.alert(<?php echo $responce;?>)';
    echo '</script>';
?>
<?php endif;?>
    <br>
    <br>
    <p>Fill in the details to register in our website!!!</p>    
    <div class="input-group" style="margin-bottom: 10px">
        <span class="input-group-addon" id="basic-addon1"></span>
        <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama">
    </div>

    <div class="input-group" style="margin-bottom: 10px">
        <span class="input-group-addon" id="basic-addon1"></span>
        <input type="text" class="form-control" placeholder="Nomor Telepon" name="no_telp">
    </div>
    
    <div class="input-group" style="margin-bottom: 10px">
            <span class="input-group-addon" id="basic-addon1"></span>
            <input type="email" class="form-control" placeholder="E-mail" name="email">
    </div>

    <div class="input-group" style="margin-bottom: 10px">
        <span class="input-group-addon" id="basic-addon1"></span>
        <input type="text" class="form-control" placeholder="Username" name="username">
    </div>

    <div class="input-group" style="margin-bottom: 10px">
        <span class="input-group-addon" id="basic-addon1"></span>
        <input type="password" class="form-control" id="myInput" placeholder="Password" name="password">
    </div>
    <input type="checkbox" onclick="myFunction('myInput')">Show Password

    <div class="input-group" style="margin-bottom: 10px">
        <span class="input-group-addon" id="basic-addon1"></span>
        <input type="date" class="form-control" placeholder="Masukkan tanggal lahir" name="tgl_lahir">
    </div>

    <div class="input-group" style="margin-bottom: 10px">
        <span class="input-group-addon" id="basic-addon1"></span>
        <input type="text" class="form-control" placeholder="Masukkan alamat" name="alamat">
    </div>

    <div class="input-group" style="margin-bottom: 10px">
        <span class="input-group-addon" id="basic-addon1"></span>
        <select class="form-control" name="jenis_kelamin">
            <option disabled selected style="display:none">Pilih Jenis Kelamin</option>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
    </div>

    <div class="input-group" style="margin-bottom: 10px">
            <span class="input-group-addon" id="basic-addon1"></span>
            <select class="form-control" name="kabupaten">
                <option disabled selected style="display:none">Pilih Kabupaten</option>
                <?php foreach($kabupaten as $kabupaten ): ?>
                    <option value="<?php echo $kabupaten->id; ?>"><?php echo $kabupaten->nama; ?></option>';
                    <?php endforeach; ?>
            </select>
        </div>
        <div class="input-group" style="margin-bottom: 10px">
                <span class="input-group-addon" id="basic-addon1"></span>
                <select class="form-control" name="status_member">
                    <option disabled selected style="display:none">Pilih Status Member</option>
                    <option value="Premium">Premium</option>
                    <option value="Biasa">Biasa</option>
                </select>
            </div>
        <button name="register" type="submit" class="btn btn-primary" style="width: 100%;margin-bottom: 10px;" >Register</button>
</form>
</div>
</body>

</html>