<?php
$conn = mysqli_connect('localhost', 'root', '', 'laundry123');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['modalAccept'])) {
        $id_member = $_POST['member_id'];

         header("location:../Transaksi/Transaksi.php?id_member=".$id_member);
    }else if(isset($_POST['statusAccept'])){
        $id = $_GET['id'];
        $status = mysqli_real_escape_string($conn,$_POST['status']);
        $pembayaran = mysqli_real_escape_string($conn,$_POST['pembayaran']);
        $biaya = mysqli_real_escape_string($conn,$_POST['biaya']);
        $updateStatus = mysqli_query($conn, "UPDATE transaksi SET transaksi.`status_transaksi` = '$status', transaksi.status_pembayaran = '$pembayaran', transaksi.biaya = '$biaya' WHERE id_transaksi = $id");
        if ($updateStatus) {
            header("location:HomePegawai.php?page=1&data=10");
        }
    }
}

?>