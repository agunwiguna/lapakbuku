<?php 
error_reporting(0);

include('../../koneksi/koneksi.php');

$nama_pembeli 	=  	mysqli_real_escape_string($koneksi,$_POST['nama_pembeli']);
$email 			= 	mysqli_real_escape_string($koneksi,$_POST['email']);
$username 		=  	mysqli_real_escape_string($koneksi,$_POST['username']);
$password 		= 	md5(mysqli_real_escape_string($koneksi,$_POST['password']));
$no_telp 		= 	mysqli_real_escape_string($koneksi,$_POST['no_telp']);
$alamat 		= 	mysqli_real_escape_string($koneksi,$_POST['alamat']);

$query = "INSERT INTO pembeli VALUES ('','$nama_pembeli','$email','$username','$password','$no_telp','$alamat')";

$data = mysqli_query($koneksi,$query);

if ($data) {
    echo "<script>alert('Data berhasil disimpan');window.location ='../../view/layout/index.php?page=pembeli';</script>";
} else {
    echo "<script>alert('Data gagal disimpan'); window.location ='../../view/layout/index.php?page=pembeli';</script>";
}

?>