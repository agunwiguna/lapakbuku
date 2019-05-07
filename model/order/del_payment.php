<?php 

include('../../koneksi/koneksi.php');

$id_payment = mysqli_real_escape_string($koneksi,htmlspecialchars($_GET['id_payment']));

$query = "DELETE FROM payment WHERE id_payment='$id_payment'";

$data = mysqli_query($koneksi,$query);

if ($data) {
   header('location:../../view/layout/index.php?page=payments');
} 

?>