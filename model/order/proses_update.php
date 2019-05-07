<!DOCTYPE html>
<html>
<head>
  <title></title>
  <script src="../../assets/backend/bower_components/jquery/dist/jquery.min.js"></script>
   <link href="../../assets/swal/sweetalert2.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../../assets/swal/sweetalert2.min.js"></script>
</head>
<body>
<?php

include('../../koneksi/koneksi.php');

$no_transaksi = mysqli_real_escape_string($koneksi,htmlspecialchars($_POST['no_transaksi']));

$status = mysqli_real_escape_string($koneksi,htmlspecialchars($_POST['status']));

  $query = "UPDATE transaksi SET status='".$status."' WHERE no_transaksi='".$no_transaksi."'";
  $sql = mysqli_query($koneksi, $query);
  
  if ($sql) {?>
    <script>
      swal({
       title: "Berhasil!",
       text: "Data Berhasil disimpan!",
       type: "success",
     }).then(function() {
      window.location = "../../view/layout/index.php?page=transaksi";
    });
  </script>
  <?php } else {?>
    <script>
      swal({
       title: "Gagal!",
       text: "Data gagal di simpan!",
       type: "error",
     }).then(function() {
      window.location = "../../view/layout/index.php?page=transaksi";
    });
  </script>
  <?php } ?>
</body>
</html>