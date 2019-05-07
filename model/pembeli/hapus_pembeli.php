<?php 

include('../../koneksi/koneksi.php');

$id_pembeli = mysqli_real_escape_string($koneksi,htmlspecialchars($_GET['id_pembeli']));

$query = "DELETE FROM pembeli WHERE id_pembeli='$id_pembeli'";

$data = mysqli_query($koneksi,$query);

if ($data) {
   header('location:../../view/layout/index.php?page=pembeli');
} 

?>