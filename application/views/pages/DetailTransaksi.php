<?php
$conn = mysqli_connect('localhost', 'root', '', 'laundry123');
$id = $_GET['id_transaksi'];
$sql = mysqli_query($conn, "
SELECT transaksi.`id_transaksi` AS id_transaksi,status_pembayaran,total_harga,berat_pakaian,antar.jenis_antar AS jenis_antar,antar.harga_antar AS harga_antar,kategori.jenis_kategori AS jenis_kategori,kategori.harga_kategori AS harga_kategori,
paket.nama_paket AS nama_paket,paket.harga_paket AS harga_paket,member.id_member AS id_member,status_member,member.`nama_member` AS nama_member,member.`nomer_telepon` AS nomer_telepon,member.`alamat_member` AS alamat_member,
kabupaten.`nama_kabupaten` AS nama_kabupaten,transaksi.`tgl_transaksi` AS tgl_transaksi,transaksi.`status_transaksi` AS status_transaksi, member.jenis_kelamin AS jenis_kelamin, member.tgl_lahir AS tgl_lahir FROM transaksi
INNER JOIN member ON member.`id_member` = transaksi.`id_member`
INNER JOIN kabupaten ON kabupaten.`id_kabupaten`=member.`id_kabupaten` 
INNER JOIN paket ON paket.id_paket= transaksi.id_paket
INNER JOIN kategori ON kategori.id_kategori = transaksi.id_kategori
INNER JOIN antar ON antar.id_antar = transaksi.id_antar
WHERE transaksi.id_transaksi = '$id'");
$result = mysqli_fetch_assoc($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    </script>
    <link rel="stylesheet" href="../Sidebar.css">
    <link rel="stylesheet" href="../Table.css">
</head>
<body>
<div class="wrapper">
    <nav id="sidebar">
        <div class="user-panel">
            <div class="info-image-sidebar">
                <img src=data:image/png;base64,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>
            </div>
            <div class="info-user-sidebar">
                <span>Krisna Pranata</span>
            </div>
        </div>
        <ul class="list-unstyled components">
            <li class="header">
                MAIN NAVIGATION
            </li>
            <li >
                <a href="../Dashboard/HomePegawai.php?page=1&data=10">
                    <i class="glyphicon glyphicon-home"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="../Transaksi/Transaksi.php">
                    <i class="glyphicon glyphicon-briefcase"></i>
                    Transaksi
                </a>
            </li>
            <li>
                <a href="Member.php?page=1&data=10" class="activeSideBar" style="border-left-color: #3c8dbc;">
                    <i class="glyphicon glyphicon-user"></i>
                    Member
                </a>
            </li>
            <li>
                <a href="../Pegawai/ProfilePegawai.php">
                    <i class="glyphicon glyphicon-info-sign"></i>
                    Pegawai
                </a>
            </li>
            <li>
                <a href="../Logout.php">
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
                    <b>Laundry</b>
                    <strong>LA</strong>
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
        <div class="contentHeader">
            <h3><b>DETAIL TRANSAKSI</b></h3>
            <hr>
            <a href="javascript:history.go(-1)"><button type="submit" class="btn btn-default" style="margin-bottom: 20px"><i class="glyphicon glyphicon-arrow-left"></i> <span>Kembali</span></button></div></a>
        </div>
        <div class="contentHeader content" id="contentHeader">
            <form class="form-inline">
                <div class="form-group" style="width: 20%">
                    <label style="display: block;">ID Member :</label>
                    <input type="text" class="form-control" style="width: 100%" disabled
                           value="<?php echo $result['id_member'] ?>">
                </div>
                <div class="form-group" style="width: 20%;margin-left: 25px">
                    <label style="display: block;">Nama :</label>
                    <input type="text" class="form-control" style="width: 100%" disabled
                           value="<?php echo $result['nama_member'] ?>">
                </div>
                <div class="form-group" style="width: 20%;margin-left: 25px">
                    <label style="display: block;">Nomer Telepon :</label>
                    <input type="text" class="form-control" style="width: 100%" disabled
                           value="<?php echo $result['nomer_telepon'] ?>">
                </div>
                <div class="form-group" style="width: 30%;margin-left: 25px">
                    <label style="display: block;">Alamat :</label>
                    <input type="text" class="form-control" style="width: 100%" disabled
                           value="<?php echo $result['alamat_member'] ?>">
                </div>
            </form>
            <form class="form-inline" style="margin-top: 20px">
                <div class="form-group" style="width: 20%">
                    <label style="display: block;">Kabupaten :</label>
                    <input type="text" class="form-control" style="width: 100%" disabled
                           value="<?php echo $result['nama_kabupaten'] ?>">
                </div>
                <div class="form-group" style="width: 20%;margin-left: 25px">
                    <label style="display: block;">Jenis Kelamin :</label>
                    <input type="text" class="form-control" style="width: 100%" disabled
                           value="<?php echo $result['jenis_kelamin'] ?>">
                </div>
                <div class="form-group" style="width: 20%;margin-left: 25px">
                    <label style="display: block;">Status Member :</label>
                    <input type="text" class="form-control" style="width: 100%" disabled
                           value="<?php echo $result['status_member'] ?>">
                </div>
                <div class="form-group" style="width: 30%;margin-left: 25px">
                    <label style="display: block;">Tanggal Lahir :</label>
                    <input type="text" class="form-control" style="width: 100%" disabled
                           value="<?php echo $result['tgl_lahir'] ?>">
                </div>
            </form>
        </div>
        <form method="post" action="update.php?id=<?php echo $id ?>">
            <div class="contentBody " id="contentBody">
                <div class="contentBodyLeft content" id="contentBodyLeft" style="border-top: 3px solid green;">
                    <div class="form-group">
                        <label style="display: block;">ID Transaksi :</label>
                        <input type="text" class="form-control" disabled value="<?php echo $result['id_transaksi'] ?>">
                    </div>
                    <div class="form-group">
                        <label style="display: block;">Paket Laundry :</label>
                        <input type="text" class="form-control" disabled value="<?php echo $result['nama_paket'] ?>">
                    </div>
                    <div class="form-group">
                        <label style="display: block;">Kategori :</label>
                        <input type="text" class="form-control" disabled value="<?php echo $result['jenis_kategori'] ?>">
                    </div>
                    <div class="form-group">
                        <label style="display: block;">Sistem Antar :</label>
                        <input type="text" class="form-control" disabled value="<?php echo $result['jenis_antar'] ?>">
                    </div>
                    <div class="form-group">
                        <label style="display: block;">Tanggal Transaksi :</label>
                        <input type="text" class="form-control" disabled value="<?php echo $result['tgl_transaksi'] ?>">
                    </div>
                    <div class="form-group">
                        <label style="display: block;">Berat Pakaian :</label>
                        <input type="text" class="form-control" disabled value="<?php echo $result['berat_pakaian'] ?>">
                    </div>
                    <div class="form-group">
                        <label style="display: block;">Status Transaksi :</label>
                        <?php if ($result['status_transaksi'] == 'Finish') { ?>
                            <select class="form-control" name="status">
                                <option value="Finish">Finish</option>
                                <option value="Taken">Taken</option>
                            </select>
                        <?php }
                        else if ($result['status_transaksi'] == 'Process') { ?>
                            <select class="form-control" name="status">
                                <option value="Process">Process</option>
                                <option value="Finish">Finish</option>
                                <option value="Taken">Taken</option>
                            </select>
                        <?php } else { ?>
                            <input type="text" class="form-control" readonly value="<?php echo $result['status_transaksi'] ?>" name="status">
                        <?php } ?>

                    </div>
                </div>
                <div class="contentBodyRight">
                    <div class="contentBodyRight2 content" id="contentBodyRight2"
                         style="border-top: 3px solid #f39c12;">
                        <div class="form-group">
                            <label style="display: block;">Total Biaya :</label>
                            <input type="text" class="form-control" readonly
                                   value="<?php echo $result['total_harga'] ?>">
                        </div>
                        <div class="form-group">
                            <label style="display: block;">Status Pembayaran :</label>
                            <?php if ($result['status_pembayaran'] == 'Lunas') { ?>
                                <input type="text" class="form-control"
                                       value="<?php echo $result['status_pembayaran'] ?>"
                                        readonly>
                                <?php
                            } else {
                                ?>
                                <select class="form-control" name="pembayaran" id="selectPembayaran" >
                                    <option value="Belum Lunas">Belum Lunas</option>
                                    <option value="Lunas">Lunas</option>
                                </select>
                                <label style="display: block;margin-top: 10px">Biaya :</label>
                                <input type="text" class="form-control" id="pembayaran" name="biaya" >
                            <?php } ?>
                        </div>
                        <a href="HomePegawai.php?page=1&data=10">
                            <button type="button" class="btn btn-danger">Cancel</button>
                        </a>
                        <?php if($result['status_transaksi'] == 'Finished'){?>
                        <button type="submit" class="btn btn-primary" disabled>Accept</button>
                        <?php }else{ ?>
                        <button type="submit" class="btn btn-primary" name="statusAccept">Accept</button>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active'), $('#logo').toggleClass('activeS'), $('#navbar').toggleClass('navbarS'), $('#mainContent').toggleClass('active');
            ;
            ;
        });
    });
</script>
</body>

</html>
