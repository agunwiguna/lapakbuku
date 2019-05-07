<!-- content page -->
<section class="bgwhite p-t-66 p-b-60">
	<div class="container">
		<div class="row">
	<?php  

	include './koneksi/koneksi.php';

	$nama_pembeli = mysqli_real_escape_string($koneksi,htmlspecialchars($_POST['nama_pembeli']));
	$email = mysqli_real_escape_string($koneksi,htmlspecialchars($_POST['email']));
	$no_transaksi = mysqli_real_escape_string($koneksi,htmlspecialchars($_POST['no_transaksi']));
	$tanggal = mysqli_real_escape_string($koneksi,htmlspecialchars($_POST['tanggal']));
	$nominal = mysqli_real_escape_string($koneksi,htmlspecialchars($_POST['nominal']));
	$bank_kami = mysqli_real_escape_string($koneksi,htmlspecialchars($_POST['bank_kami']));
	$kirim_dari =mysqli_real_escape_string($koneksi,htmlspecialchars($_POST['kirim_dari']));
	$tipe_order = mysqli_real_escape_string($koneksi,htmlspecialchars($_POST['tipe_order']));
	$nama_rek = mysqli_real_escape_string($koneksi,htmlspecialchars($_POST['nama_rek']));
	$no_rek = mysqli_real_escape_string($koneksi,htmlspecialchars($_POST['no_rek']));
	$pesan = mysqli_real_escape_string($koneksi,htmlspecialchars($_POST['pesan']));

	$query = "INSERT INTO payment VALUES ('','$nama_pembeli','$email','$no_transaksi','$tanggal','$nominal','$bank_kami','$kirim_dari','$tipe_order','$nama_rek','$no_rek','$pesan')";
	$data = mysqli_query($koneksi,$query);

	if ($data) { ?>
		<div class="col-md-12">
			<div class="alert alert-success">
				Konfirmasi pembayaran anda sukses terkirim ke database kami!
				Pantau terus pesanan anda di dashboard Lapak Buku <br/>
				<center>Terimakasih telah berbelanja di Lapak Buku :)</center>
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

				
