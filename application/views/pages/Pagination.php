<?php
$conn = mysqli_connect('localhost', 'root', '', 'laundry123');
$page = $_GET['page'];

if ($page < 1) $page = 1;
$numberOfPages = 10;
$resultsPerPage = $_GET['data'];
$startResults = ($page - 1) * $resultsPerPage;

$displayHome = mysqli_query($conn,"CALL displayTransaksi($startResults,$resultsPerPage)");
mysqli_next_result($conn);

// menghitung data dari masning - masing status transaksi
$dataNumberNotChecked = mysqli_num_rows(mysqli_query($conn,"CALL selectTransaksi('Not Checked')"));
mysqli_next_result($conn);
$dataNumberProcess = mysqli_num_rows(mysqli_query($conn,"CALL selectTransaksi('Process')"));
mysqli_next_result($conn);
$dataNumberFinish = mysqli_num_rows(mysqli_query($conn,"CALL selectTransaksi('Finish')"));

//menampilkan data dari masing - masing status Transaksi
mysqli_next_result($conn);
$notChecked = mysqli_query($conn,"CALL statusTransaksiLimit('Not Checked',$startResults,$resultsPerPage)");
mysqli_next_result($conn);
$process = mysqli_query($conn,"CALL statusTransaksiLimit('Process',$startResults,$resultsPerPage)");
mysqli_next_result($conn);
$finish = mysqli_query($conn,"CALL statusTransaksiLimit('Finish',$startResults,$resultsPerPage)");
mysqli_next_result($conn);
$paginationTransaksi = mysqli_num_rows(mysqli_query($conn,"CALL pagination()"));
mysqli_next_result($conn);
$totalPages = ceil($paginationTransaksi / $resultsPerPage);

$halfPages = floor($numberOfPages / 2);

?>