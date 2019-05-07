<?php

include('../../koneksi/koneksi.php');

$id_pembeli		=   mysqli_real_escape_string($koneksi,$_POST['id_pembeli']);
$nama_pembeli 	=  	mysqli_real_escape_string($koneksi,$_POST['nama_pembeli']);
$email 			= 	mysqli_real_escape_string($koneksi,$_POST['email']);
$username 		=  	mysqli_real_escape_string($koneksi,$_POST['username']);
$no_telp 		= 	mysqli_real_escape_string($koneksi,$_POST['no_telp']);
$alamat 		= 	mysqli_real_escape_string($koneksi,$_POST['alamat']);

$query = "UPDATE pembeli SET nama_pembeli='$nama_pembeli ', email='$email', username='$username', no_telp='$no_telp', alamat='$alamat' WHERE id_pembeli='$id_pembeli'";
$data = mysqli_query($koneksi,$query);

if ($data) {
    echo "<script>alert('Data berhasil di ubah');window.location ='../../view/pembeli/v_pembeli.php';</script>";
} else {
    echo "<script>alert('Data gagal di ubah'); window.location ='../../view/pembeli/v_pembeli.php';</script>";
}
?>