<!-- content page -->
<section class="bgwhite p-t-66 p-b-60">
	<div class="container">
		<div class="row">
	<?php  

	require './koneksi/koneksi.php';
	require './model/order/item.php';

	//save pembeli
	$nama_pembeli =  mysqli_real_escape_string($koneksi,htmlspecialchars($_POST['nama_pembeli']));
	$email =  mysqli_real_escape_string($koneksi,htmlspecialchars($_POST['email']));
	$no_telp =  mysqli_real_escape_string($koneksi,htmlspecialchars($_POST['no_telp']));
	$alamat =  mysqli_real_escape_string($koneksi,htmlspecialchars($_POST['alamat']));
	$username =  mysqli_real_escape_string($koneksi,htmlspecialchars($_POST['username']));
	$password = md5(mysqli_real_escape_string($koneksi,htmlspecialchars($_POST['password'])));
	$no_transaksi =  mysqli_real_escape_string($koneksi,htmlspecialchars($_POST['no_transaksi']));
	$level = "user";
	$total_harga =  mysqli_real_escape_string($koneksi,htmlspecialchars($_POST['total_harga']));

	$hit = "INSERT INTO pembeli VALUES ('','$nama_pembeli','$email','$username','$password','$no_telp','$alamat','$level')";
	$data = mysqli_query($koneksi, $hit);
	$id_pembeli = mysqli_insert_id($koneksi);

	$status = "Belum Lunas";
	$tanggal_beli = date('Y-m-d');
	$query = "INSERT INTO transaksi VALUES ('$no_transaksi','$id_pembeli','$tanggal_beli','$total_harga','$status')";
	$data2 = mysqli_query($koneksi, $query);


	// Save order details for new orders
	$cart = unserialize(serialize($_SESSION['cart']));
	for($i=0; $i<count($cart);$i++) {
	$sql2 = 'INSERT INTO detail_transaksi (no_transaksi, id, harga, jumlah, total) VALUES ('.$no_transaksi.','.$cart[$i]->id.', '.$cart[$i]->price.', '.$cart[$i]->quantity.','.$total_harga.')';
	$data3 = mysqli_query($koneksi, $sql2);
	}

	// Clear all product in cart
	unset($_SESSION['cart']);

	if ($data && $data2 && $data3) { ?>
		<div class="col-md-12">
			<div class="alert alert-success">
				<center>
				Permintaan anda akan kami proses <br/>
				Pantau terus pesanan anda di dashboard Lapak Buku <br/>
				<a href="./view/session/login" target="_blank">Login</a> <br/>
				Terimakasih telah berbelanja di Lapak Buku :)
				</center>
			</div>
		</div>
	<?php } else { ?>
		
		<div class="col-md-12">
			<div class="alert alert-danger">
				Oppsss... Data Gagal disimpan
			</div>
		</div>
	<?php }

	?>
			
		</div>
	</div>
</section>

				
