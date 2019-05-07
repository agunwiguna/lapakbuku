<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(./assets/frontend/images/heading-pages-01.jpg);">
		<h2 class="l-text2 t-center">
			Cart
		</h2>
	</section>
<?php 
error_reporting(0); 
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
?>
	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<form method="POST">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th></th>
							<th class="column-1">ID</th>
							<th class="column-2">Item</th>
							<th class="column-3">Harga</th>
							<th class="column-4 p-l-70">Jumlah</th>
							<th class="column-5">Sub Total</th>
						</tr>
						<?php 
						$cart = unserialize(serialize($_SESSION['cart']));
						$s = 0;
						$index = 0;
						for($i=0; $i<count($cart); $i++){
							$s += $cart[$i]->price * $cart[$i]->quantity;
							?>	
						<tr class="table-row">
							<td><a href="index.php?page=cart&index=<?php echo $index; ?>" class="btn btn-info btn-xs" onclick="return confirm('Apakah kamu yakin?')">Hapus</a>
							</td>
							<td class="column-1">
								<?php echo $cart[$i]->id; ?>
							</td>
							<td class="column-2"><?php echo $cart[$i]->name; ?></td>
							<td class="column-3"><?php echo rupiah($cart[$i]->price); ?></td>
							<td class="column-4">
								<div class="flex-w bo5 of-hidden w-size17">
									<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
									</button>

									<input type="number" class="size8 m-text18 t-center num-product" min="1" value="<?php echo $cart[$i]->quantity; ?>" name="quantity[]">

									<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
									</button>
								</div>
							</td>
							<td class="column-5"><?php echo rupiah($cart[$i]->price * $cart[$i]->quantity); ?> </td>
						</tr>
						<?php 
						$index++;
					} ?>
					</table>
				</div>
			</div>

			<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
				<div class="flex-w flex-m w-full-sm">
					<a href="index.php">Lanjutkan Belanja</a>
					<div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
					
					</div>
				</div>

				<div class="size10 trans-0-4 m-t-10 m-b-10">
					<!-- Button -->
					<input id="saveimg" type="image" src="./assets/img/update.png" name="update" style="width:180px; height:50px;" alt="Save Button">
         			<input type="hidden" name="update">

				</div>
			</div>
			</form>
			<!-- Total -->
			<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
				<h5 class="m-text20 p-b-24">
					Total Belanja
				</h5>
				<!--  -->
				<div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Total:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						<?php echo rupiah($s); ?>
					</span>
				</div>

				<div class="size15 trans-0-4">
					<!-- Button -->
					<a href="index.php?page=step-one">
					<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
						Selesaikan
					</button>
					</a>
				</div>
			</div>
		</div>
	</section>
<?php 
if(isset($_GET["id"]) || isset($_GET["index"])){
 header('Location: index.php?page=cart');
} 
?>