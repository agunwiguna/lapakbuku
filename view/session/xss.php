<?php

$nama=htmlspecialchars(isset($_GET['nama']));
$username=htmlspecialchars(isset($_GET['username']));
$nama_pembeli=htmlspecialchars(isset($_GET['nama_pembeli']));
$id_pembeli=htmlspecialchars(isset($_GET['id_pembeli']));
$status=htmlspecialchars(isset($_GET['status']));
$level=htmlspecialchars(isset($_GET['level']));

if($nama_pembeli !=""){
	echo "<h1>Tidak Boleh Mengakses $nama_pembeli</h1>";
}

if($username !=""){
	echo "<h1>Tidak Boleh Mengakses $username</h1>";
}

if($id_pembeli !=""){
	echo "<h1>Tidak Boleh Mengakses $id_pembeli</h1>";
}

if($status !=""){
	echo "<h1>Tidak Boleh Mengakses $status</h1>";
}

if($level !=""){
	echo "<h1>Tidak Boleh Mengakses $level</h1>";
}
?>
