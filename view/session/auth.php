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

session_start();

include('../../koneksi/koneksi.php');

$username= mysqli_real_escape_string($koneksi,$_POST['username']);
$password= md5(mysqli_real_escape_string($koneksi,$_POST['password']));

$data = mysqli_query($koneksi,"SELECT * FROM pembeli WHERE username='$username' AND password='$password'");

$cek = mysqli_num_rows($data);

if ($cek > 0) {

	$row = mysqli_fetch_array($data);
	$_SESSION['username'] = $row['username'];
	$_SESSION['id_pembeli'] = $row['id_pembeli'];
	$_SESSION['nama_pembeli'] = $row['nama_pembeli'];
	$_SESSION['status'] = "login";
	$_SESSION['level'] = $row['level'];
	?>
	<script>
	swal({
	   title: "Berhasil!",
  	   text: "Welcome to Lapak Buku!",
  	   type: "success",
	}).then(function() {
	    window.location = "../layout/";
	});
</script>
	

<?php } else {?>

<script>
	swal({
	   title: "Gagal!",
  	   text: "Username dan Password salah!",
  	   type: "error",
	}).then(function() {
	    window.location = "login";
	});
</script>

<?php } ?>
</body>
</html>