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
                    <a href="#" style="font-family: sans-serif">
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
                    <a href="#" class="activeSideBar" style="border-left-color: #3c8dbc; font-family: sans-serif">
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
                    <b>Daftar Member</b>
                </h3>
                <hr>

            </div>

            <div class="contentHeader content" id="contentHeader">
                <ul class="nav nav-pills" style="margin-bottom: 5px">
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
                                <th style="text-align: center">No</th>
                                <th style="text-align: center">ID</th>
                                <th style="text-align: center">Nama</th>
                                <th style="text-align: center">Nomor Telepon</th>
                                <th style="text-align: center">Email</th>
                                <th style="text-align: center">Alamat</th>
                                <th style="text-align: center">Jenis Kelamin</th>
                                <th style="text-align: center">Status</th>
                            </thead>
                            <?php
                                $no = 1;
                                foreach($member as $member){
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $member->id; ?></td>
                                <td><?php echo $member->nama; ?></td>
                                <td><?php echo $member->no_telp; ?></td>
                                <td><?php echo $member->email; ?></td>
                                <td><?php echo $member->alamat; ?></td>
                                <td><?php echo $member->jenis_kelamin; ?></td>
                                <td><?php echo $member->status_member; ?></td>
                            </tr>

                            <?php 
                                }
                            ?>
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