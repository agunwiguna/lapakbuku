<!DOCTYPE html>
<html>
<head>
	<title>Data Pembeli</title>
</head>
<body>
	<?php
	    include('../../koneksi/koneksi.php');
	    $id_pembeli = $_GET['id_pembeli'];
	    $no=1;
	    $query = "SELECT * FROM pembeli WHERE id_pembeli='$id_pembeli'";
	    $data = mysqli_query($koneksi,$query);
	    while($d=mysqli_fetch_array($data)){
    ?>
	<h3>Data Pemebeli Lapak Baca</h3>
	<form action="../../model/pembeli/proses_edit.php" method="post" autocomplete="off">
		<input type="hidden" name="id_pembeli" value="<?=$d['id_pembeli'] ?>">
	<table>
		<tr>
			<td>Nama</td>
			<td>:<input type="text" name="nama_pembeli" placeholder="Masukan Nama.." value="<?=$d['nama_pembeli']?>" required></td>
		</tr>
		<tr>
			<td>Email</td>
			<td>:<input type="email" name="email" placeholder="Masukan E-Mail.." value="<?=$d['email']?>" required></td>
		</tr>
		<tr>
			<td>Username</td>
			<td>:<input type="text" name="username" placeholder="Masukan Username.." value="<?=$d['username']?>" required></td>
		</tr>
		<tr>
			<td>Kontak</td>
			<td>:<input type="text" name="no_telp" placeholder="Masukan No. Kontak.." value="<?=$d['no_telp']?>" required></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>:<textarea name="alamat" placeholder="Masukan Alamat.." required><?=$d['alamat']?></textarea></td>
		</tr>
		<tr>
			<td><button type="submit">Simpan</button></td>
			<td><button type="reset">Reset</button></td>
		</tr>

	</table>
	</form>
	<?php
        }
    ?>
</body>
</html>