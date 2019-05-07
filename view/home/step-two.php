<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(./assets/frontend/images/heading-pages-01.jpg);">
		<h2 class="l-text2 t-center">
			Cart
		</h2>
	</section>
<?php  
require './koneksi/koneksi.php';
require './model/order/item.php';

if(isset($_GET['id']) && !isset($_POST['update']))  { 
	$sql = "SELECT * FROM buku WHERE id=".$_GET['id'];
	$result = mysqli_query($koneksi, $sql);
	$buku = mysqli_fetch_object($result); 
	$item = new Item();
	$item->id = $buku->id;
	$item->name = $buku->name;
	$item->price = $buku->price;
    $iteminstock = $buku->quantity;
	$item->quantity = 1;
	// Check product is existing in cart
	$index = -1;
	$cart = unserialize(serialize($_SESSION['cart'])); // set $cart as an array, unserialize() converts a string into array
	for($i=0; $i<count($cart);$i++)
		if ($cart[$i]->id == $_GET['id']){
			$index = $i;
			break;
		}
		if($index == -1) 
			$_SESSION['cart'][] = $item; // $_SESSION['cart']: set $cart as session variable
		else {
			
			if (($cart[$index]->quantity) < $iteminstock)
				 $cart[$index]->quantity ++;
			     $_SESSION['cart'] = $cart;
		}
}
// Delete product in cart
if(isset($_GET['index']) && !isset($_POST['update'])) {
	$cart = unserialize(serialize($_SESSION['cart']));
	unset($cart[$_GET['index']]);
	$cart = array_values($cart);
	$_SESSION['cart'] = $cart;
}
// Update quantity in cart
if(isset($_POST['update'])) {
  $arrQuantity = $_POST['quantity'];
  $cart = unserialize(serialize($_SESSION['cart']));
  for($i=0; $i<count($cart);$i++) {
     $cart[$i]->quantity = $arrQuantity[$i];
  }
  $_SESSION['cart'] = $cart;
}

function rupiah($angka){

	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;

}

function acak($panjang)
{
    $karakter= '123456789';
    $string = '';
    for ($i = 0; $i < $panjang; $i++) {
  		$pos = rand(0, strlen($karakter)-1);
  		$string .= $karakter{$pos};
    }
    return $string;
}

$hasil_2= acak(8);


$nama_pembeli =  mysqli_real_escape_string($koneksi,htmlspecialchars($_POST['nama_pembeli']));
$email =  mysqli_real_escape_string($koneksi,htmlspecialchars($_POST['email']));
$no_telp =  mysqli_real_escape_string($koneksi,htmlspecialchars($_POST['no_telp']));
$alamat =  mysqli_real_escape_string($koneksi,htmlspecialchars($_POST['alamat']));
$username =  mysqli_real_escape_string($koneksi,htmlspecialchars($_POST['username']));
$password =  mysqli_real_escape_string($koneksi,htmlspecialchars($_POST['password']));

?>
	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<form action="index.php?page=cekout" method="post">
					<input type="hidden" name="email" value="<?php echo $email; ?>">
					<input type="hidden" name="username" value="<?php echo $username; ?>">
					<input type="hidden" name="password" value="<?php echo $password; ?>">
					<input type="hidden" name="no_transaksi" value="<?php echo $hasil_2; ?>">
						<table class="table-shopping-cart">
						<tr class="table-head">
							<th></th>
							<th class="column-1">Nama</th>
							<th class="column-2 p-l-70">Alamat Pengiriman</th>
							<th class="column-3">Kontak</th>
							<th class="column-4"></th>
							<th class="column-5"></th>
						</tr>
						<tr class="table-row">
							<td></td>
							<td class="column-1"><input type="text" name="nama_pembeli" value="<?php echo $nama_pembeli; ?>" readonly></td>
							<td class="column-2"><input type="text" name="alamat" value="<?php echo $alamat; ?>" readonly></td>
							<td class="column-3"><input type="text" name="no_telp" value="<?php echo $no_telp; ?>" readonly></td>
							<td class="column-4"></td>
							<td class="column-5"></td>
						</tr>
					</table>
					<br/>
					<hr/>
					<br/>
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th></th>
							<th class="column-1">Judul Buku</th>
							<th class="column-2">Harga</th>
							<th class="column-3"></th>
							<th class="column-4">Jumlah</th>
							<th class="column-5">Total</th>
						</tr>
						<?php 
						$cart = unserialize(serialize($_SESSION['cart']));
						$s = 0;
						$index = 0;
						for($i=0; $i<count($cart); $i++){
							$s += $cart[$i]->price * $cart[$i]->quantity;
							?>	
						<tr class="table-row">
							<td><?php $cart[$i]->id; ?></td>
							<td class="column-1">
								<?php echo $cart[$i]->name; ?>
							</td>
							<td class="column-2"><?php echo rupiah($cart[$i]->price); ?></td>
							<td class="column-3"></td>
							<td class="column-4"><?php echo $cart[$i]->quantity; ?>
							</td>
							<td class="column-5"><?php echo rupiah($cart[$i]->price * $cart[$i]->quantity); ?> </td>
						</tr>
						<?php 
						$index++;
					} ?>
					</table>
				</div>
			</div>
			<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
			Silahkan transfer Total nominal pada akun Bank dibawah ini.
			<div class="alert alert-danger">
				BANK BCA <br>
				Nomor Rekening 465123678 <br>
				a.n Agun Wiguna
				<br>
				Pembelian anda belum kami proses sebelum kami menerima pembayaran.
			</div>
			</div>
			<!-- Total -->
			<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
				<h5 class="m-text20 p-b-24">
					Total Belanja
				</h5>

				<!--  -->

				<!--  -->
				<div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Total:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						<?php echo rupiah($s); ?>
						<input type="hidden" name="total_harga" value="<?php echo $s; ?>" readonly>
					</span>
				</div>

				<div class="size15 trans-0-4">
					<!-- Button -->
					<button type="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
						Setujui
					</button>
				</div>
				</form>
			</div>
		</div>
	</section>
