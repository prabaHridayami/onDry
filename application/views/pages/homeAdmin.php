<!DOCTYPE html>
<html>
<?php
    if (isset($this->session->userdata['logged'])) {
        $username = ($this->session->userdata['username']);
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
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar">
            <div class="user-panel">
                <div class="info-image-sidebar">

                </div>
                <div class="info-user-sidebar">
                    <span>Owen</span>
                </div>
            </div>
            <ul class="list-unstyled components" style="font-family: sans-serif">
                <li class="header">
                    MAIN NAVIGATION
                </li>
                <li>
                    <a href="#" class="activeSideBar" style="border-left-color: #3c8dbc;font-family: sans-serif">
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
                    <a href="#" style="font-family: sans-serif">
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
        <div class="mainContent" id="mainContent">
            <div class="contentHeader">
                <h3>
                    <b>DASHBOARD</b>
                </h3>
                <hr>

            </div>

            <div class="contentHeader content" id="contentHeader">
                <ul class="nav nav-pills" style="margin-bottom: 5px">
                    <li class="active">
                        <a data-toggle="pill" id="#menu1" href="#home" style="font-family: sans-serif">Home</a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#menu1" style="font-family: sans-serif">
                            <span>Not Checked</span>
                            <span style="margin-left: 10px;background: #dd4b39;color: white;padding-left: 5px;padding-right: 5px">
                            </span>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#menu2" style="font-family: sans-serif">
                            <span>Progres</span>
                            <span style="margin-left: 10px;background: #f39c12;color: white;padding-left: 5px;padding-right: 5px">

                            </span>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#menu3" style="font-family: sans-serif">
                            <span>Selesai</span>
                            <span style="margin-left: 10px;background: #00a65a;color: white;padding-left: 5px;padding-right: 5px">

                            </span>
                        </a>
                    </li>

                    <li class="search" style="float: right">
                        <div class="input-group stylish-input-group">
                            <input type="text" class="form-control" placeholder="Search" id="myInput" onkeyup="myFunction()">
                            <span class="input-group-addon">
                                <button type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                    </li>
                    <li style="float: right;width: 20%">
                        <div class="form-group">
                            <label class="col-sm-7 control-label" style="margin-top: 8px;padding-left: 25px">Data Entris</label>
                            <div class="col-sm-5" style="padding-left: 0px">
                                <select class="form-control" name="selectedValue" id="selectedValue" onchange="window.location.href=this.value">
                                    <option disabled selected style="display:none;">10
                                    </option>
                                    <option value="">10</option>
                                    <option value="">15</option>
                                    <option value="">20</option>
                                </select>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="tab-content" id="myTable">
                    <div id="home" class="tab-fane in active">
                        <hr>
                        <table>
                            <thead>
                                <th style="text-align: center">ID</th>
                                <th style="text-align: center">Nama</th>
                                <th style="text-align: center">Nomor Telepon</th>
                                <th style="text-align: center">Alamat</th>
                                <th style="text-align: center">Kabupaten</th>
                                <th style="text-align: center">Tanggal Transaksi</th>
                                <th style="text-align: center">Status</th>
                                <th style="text-align: center">Action</th>
                            </thead>

                            <tr>
                                <td>1</td>
                                <td>Owen Nirvana</td>
                                <td>085829706523</td>
                                <td>Jln. Goa Gong</td>
                                <td>Badung</td>
                                <td>2018-04-16 11:45:46 </td>
                                <td style="text-align: center">
                                    <span style="background: #dd4b39;padding: 5px;color: white;border-radius: 6px;text-align: center;width: 90%">
                                        <h6>Not Checked</h6>
                                    </span>
                                </td>
                                <td>
                                    <a href="#">
                                        <i class="glyphicon glyphicon-check" style="color: green"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Bayu Bahari</td>
                                <td>085829706523</td>
                                <td>Jln. Sedap Malam</td>
                                <td>Denpasar</td>
                                <td>2018-04-16 11:45:46 </td>
                                <td style="text-align: center">
                                    <span style="background: #f39c12;padding: 5px;color: white;border-radius: 6px;text-align: center;width: 90%;padding-top: 5px">
                                        <h6>Progres</h6>
                                    </span>
                                </td>
                                <td>
                                    <a href="#">
                                        <i class="glyphicon glyphicon-check" style="color: green"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Praba</td>
                                <td>085829706523</td>
                                <td>Jln. Nusantara</td>
                                <td>Tabanan</td>
                                <td>2018-04-16 11:45:46 </td>
                                <td style="text-align: center">
                                    <span style="background: #00a65a;padding: 5px;color: white;border-radius: 6px;text-align: center;width: 90%">
                                        <h6>Finish</h6>
                                    </span>
                                </td>
                                <td>
                                    <a href="#">
                                        <i class="glyphicon glyphicon-check" style="color: green"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                        </table>
                    </div>
                </div>
                <nav style="text-align: end;height: 50px">
                    <ul class="pagination pagination-sm">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" style="font-family: sans-serif">
                                Page
                            </a>
                        </li>
                    </ul>
                    <ul class="pagination pagination-sm">

                        <li class="page-item disabled">
                            <a class="page-link" href="#" style="font-family: sans-serif">First</a>
                        </li>
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">
                                <i class="glyphicon glyphicon-backward"></i>
                            </a>
                        </li>

                        <li class="page-item">
                            <a class="page-link" href="" style="font-family: sans-serif">First</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="">
                                <i class="glyphicon glyphicon-backward"></i>
                            </a>
                        </li>

                        <li class="page-item">
                            <a href="#">
                                1
                            </a>
                        </li>

                        <li class="page-item">
                            <a class="page-link" href="">
                                2
                            </a>
                        </li>

                        <li class="page-item">
                            <a class="page-link" href="">
                                <i class="glyphicon glyphicon-forward"></i>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="">Last</a>
                        </li>

                        <li class="page-item disabled">
                            <a class="page-item">
                                <i class="glyphicon glyphicon-forward"></i>
                            </a>
                        </li>
                        <li class="page-item disabled">
                            <a class="page-link" href="#">Last</a>
                        </li>

                    </ul>
                </nav>
            </div>
        </div>
    </div>
</body>
<script>
    function myFunction() {
        var input, filter, table, tr, td, i, td1;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            td1 = tr[i].getElementsByTagName("td")[2];
            td2 = tr[i].getElementsByTagName("td")[3];
            if (td || td1 || td2) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1 || td1.innerHTML.toUpperCase().indexOf(filter) > -1 || td2.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>

</html>