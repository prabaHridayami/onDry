<?php
$conn = new mysqli("localhost","root","","laundry");
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST["nama"];
    $notlp = $_POST["no_telp"];
    $alamat = $_POST["alamat"];
    $jk = $_POST["jenis_kelamin"];
    $tgllahir = $_POST["tgl_lahir"];
    $kabupaten = $_POST["kabupaten"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $data = hash('md5', $password, false);

    if ($_POST["password"] === $_POST["pswrepeat"]) {
        $query = "INSERT INTO member (nama_member, nomer_telepon, alamat_member, jenis_kelamin, tgl_lahir, create_at, status_member,id_kabupaten, username, password, email)  
                             VALUES ('$nama','$notlp','$alamat','$jk','$tgllahir', current_date, 'Member', '$kabupaten','$username', '$data', '$email')";
        if (mysqli_query($conn, $query)) {
            header("location:###");
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }
}
?>