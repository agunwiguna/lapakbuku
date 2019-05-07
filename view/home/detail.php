<?php
include('./koneksi/koneksi.php');
function rupiah($angka){

	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;

}
$id=$_GET['id'];
$modal=mysqli_query($koneksi,"SELECT * FROM buku WHERE id='$id'");
while($r=mysqli_fetch_array($modal)){ ?>
	<!-- breadcrumb -->
	<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
		<a href="index.html" class="s-text16">
			Home
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<span class="s-text17">
			Detail Buku
		</span>
	</div>

	<!-- Product Detail -->
	<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="wrap-slick3-dots"></div>

					<div class="slick3">
						<div class="item-slick3" data-thumb="./assets/img/<?php echo $r['foto'];?>">
							<div class="wrap-pic-w">
								<img src="./assets/img/<?php echo $r['foto'];?>" alt="IMG-PRODUCT" style="width:430px; height:530px;">
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="w-size14 p-t-30 respon5">
				<h4 class="product-detail-name m-text16 p-b-13">
					<?php echo $r['name'];?>
				</h4>

				<span class="m-text17">
					<?php echo rupiah($r['price']);?>
				</span>
				<br/> <br/> 
				<table class="table table-striped" id="users">
                    <tbody>
                    <tr>
                        <td width="30px"></td>
                        <td width="100px">Kategori</td>
                        <td width="50px">:</td>
                        <td><?php echo $r['kategori'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Pengarang</td>
                        <td>:</td>
                        <td><?php echo $r['pengarang'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Penerbit</td>
                        <td>:</td>
                        <td><?php echo $r['penerbit'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>ISBN</td>
                        <td>:</td>
                        <td><?php echo $r['isbn'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Bahasa</td>
                        <td>:</td>
                        <td><?php echo $r['bahasa'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Stok</td>
                        <td>:</td>
                        <td><?php echo $r['quantity'];?></td>
                    </tr>
                </tbody>
            </table>

				<!--  -->
				<div class="p-t-33 p-b-60">

					<div class="flex-r-m flex-w p-t-10">
						<div class="w-size16 flex-m flex-w">
							<div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
								<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
								</button>

								<input class="size8 m-text18 t-center num-product" type="number" name="num-product" value="1">

								<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
								</button>
							</div>

							<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
								<!-- Button -->
								<a href="index.php?page=cart&id=<?=$r['id'];?>">
									<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
										Add to Cart
									</button>
								</a>	
							</div>
						</div>
					</div>
				</div>

				<!--  -->
				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Deskripsi
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8" align="justify">
							<?php echo $r['deskripsi'];?>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>	