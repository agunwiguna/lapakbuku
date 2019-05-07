<?php 

include('../../koneksi/koneksi.php');

$no_transaksi = mysqli_real_escape_string($koneksi,htmlspecialchars($_GET['no_transaksi']));

$query = "DELETE FROM transaksi WHERE no_transaksi='$no_transaksi'";

$data = mysqli_query($koneksi,$query);

if ($data) {
   header('location:../../view/layout/index.php?page=transaksi');
} 

?>