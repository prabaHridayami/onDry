<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>DryOn</title>
    <link rel="shortcut icon" href="<?php echo base_url()?>assets/image/title-logo.png">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/sidebar.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/tabeltransaksi.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/style.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/button.css" />
    <script src="<?php echo base_url()?>assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js" type="text/javascript"></script>
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar">
            <div class="user-panel">
                <div class="info-image-sidebar">

                </div>
                <div class="info-user-sidebar">
                    <span></span>
                </div>
            </div>
            <ul class="list-unstyled components" style="font-family: sans-serif">
                <li class="header">
                    MAIN NAVIGATION
                </li>
                <li>
                    <a href="<?php echo base_url()?>/homepegawai" style="font-family: sans-serif">
                        <i class="glyphicon glyphicon-home"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url()?>/transaksi" class="activeSideBar" style="border-left-color: #3c8dbc;font-family: sans-serif">
                        <i class="glyphicon glyphicon-briefcase"></i>
                        Transaksi
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url()?>/member" style="font-family: sans-serif">
                        <i class="glyphicon glyphicon-user"></i>
                        Member
                    </a>
                </li>
                <li>
                    <a href="#" style="font-family: sans-serif">
                        <i class="glyphicon glyphicon-info-sign"></i>
                        Pegawai
                    </a>
                </li>
                <li>
                    <a href="#" style="font-family: sans-serif">
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
                <a href="#" class="navbar-left" id="sidebarCollapse">
                    <i class="glyphicon glyphicon-th-list">
                    </i>
                </a>

            </nav>
        </div>
        <div class="mainContent" id="mainContent">
            <div class="contentHeader content" id="contentHeader" style="margin-bottom: 40px;">
                <h3 style="text-align: center;">
                    <b>TRANSAKSI</b>
                </h3>
                <form action="FunctionTransaksi.php" method="post">
                    <table style="margin-top: 40px">
                        <tr>
                            <td style="width: 20%">
                                <label style="float: left" class="control-label">ID Member</label>
                            </td>
                            <td style="width: 80%">
                                <input type="text" class="form-control" placeholder="Masukan ID Member" name="id_member" required>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 20%">
                                <label style="float: left" class="control-label">Jenis Paket Laundry</label>
                            </td>
                            <td style="width: 80%">
                                <select class="form-control" name="paket" required>
                                    <option disabled selected value=""> Jenis Paket Laundry</option>
                                    <option value="">
                                        6 jam
                                    </option>
                                    <option value="">12 jam</option>
                                    <option value="">18 jam</option>
                                    <option value="">1 hari</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 20%">
                                <label style="float: left" class="control-label">Kategori Laundry</label>
                            </td>
                            <td style="width: 80%">
                                <select class="form-control" name="kategori" required>
                                    <option disabled selected value=""> Jenis Kategori Laundry</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 20%">
                                <label style="float: left" class="control-label">Antar Laundry</label>
                            </td>
                            <td style="width: 80%">
                                <select class="form-control" name="antar" required>
                                    <option disabled selected value=""> Jenis Antar Laundry</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 20%">
                                <label style="float: left" class="control-label">Berat Pakaian</label>
                            </td>
                            <td style="width: 80%">
                                <input type="text" class="form-control" placeholder="Masukan Berat Pakaian" name="berat" required>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 20%">
                                <label style="float: left" class="control-label">Status Pembayaran</label>
                            </td>
                            <td style="width: 80%">
                                <select class="form-control" name="pembayaran" required>
                                    <option disabled selected value=""> Status Pembayaran Laundry</option>
                                    <option value="Lunas">Lunas</option>
                                    <option value="Belum Lunas">Belum Lunas</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <div style="text-align: center">
                        <button class="button5" type="submit" style="margin-top: 30px;width: 100%;height: 40px;" name="transaksi">
                            SUBMIT
                        </button>
                    </div>
                </form>
            </div>
        </div>

</body>
<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active'), $('#logo').toggleClass('activeS'), $('#navbar').toggleClass('navbarS'), $('#mainContent').toggleClass('active');
            ;
            ;
        });
    });
</script>

</html>