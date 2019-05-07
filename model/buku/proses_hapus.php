
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

$id =  mysqli_real_escape_string($koneksi,htmlspecialchars($_GET['id']));

$query = "SELECT * FROM buku WHERE id='".$id."'";
$sql = mysqli_query($koneksi, $query); 
$data = mysqli_fetch_array($sql); 

if(is_file("../../assets/img/".$data['foto'])) 
  unlink("../../assets/img/".$data['foto']); 
$query2 = "DELETE FROM buku WHERE id='".$id."'";
$sql2 = mysqli_query($koneksi, $query2); 

if($sql2){ ?>
    <script>
      swal({
           title: "Berhasil!",
           text: "Data Berhasil dihapus!",
           type: "success",
      }).then(function() {
          window.location = "../../view/layout/index.php?page=buku";
      });
    </script> 
<?php }else{ ?>
  <script>
      swal({
       title: "Gagal!",
       text: "Data gagal dihapus!",
       type: "error",
     }).then(function() {
      window.location = "../../view/layout/index.php?page=buku";
    });
  </script>
<?php }
?>
</body>
</html>
