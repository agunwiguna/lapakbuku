<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(./assets/frontend/images/heading-pages-01.jpg);">
		<h2 class="l-text2 t-center">
			Konfirmasi Pembayaran
		</h2>
	</section>

	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<div class="row">


				<div class="col-md-6 p-b-30">
					<form action="index.php?page=payment" class="leave-comment" autocomplete="off" method="post">
						<h4 class="m-text26 p-b-36 p-t-15">
							Konfirmasi Pembayaran
						</h4>
						Nama:
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="nama_pembeli" placeholder="Nama Lengkap.." required>
						</div>
						E-mail :
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="email" name="email" placeholder="Alamat E-mail.." required>
						</div>
						Order Id(Nomor Pesanan)
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="no_transaksi" placeholder="Masukan Nomor Pesanan.." required>
						</div>
						Tanggal Pembayaran
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="date" name="tanggal" required>
						</div>
						Sebesar Rp. :
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="number" name="nominal" placeholder="Sebesar.." required>
						</div>
						Bank Kami
						<div class="bo4 of-hidden size15 m-b-20">
							<select class="sizefull s-text7 p-l-22 p-r-22" name="bank_kami" required>
								<option>-- Silahkan Pilih --</option>
								<option value="BNI Bandung. No. 465123678, a/n Agun Wiguna">BNI Bandung. No. 465123678, a/n Agun Wiguna</option>
								<option value="BCA Bandung. No. 144556788, a/n Agun Wiguna">BCA Bandung. No. 144556788, a/n Agun Wiguna</option>
								<option value="MANDIRI. No. 455667786, a/n Agun Wiguna">MANDIRI. No. 455667786, a/n Agun Wiguna</option>
							</select>
						</div>
						Anda Kirim dari Bank
						<div class="bo4 of-hidden size15 m-b-20">
							<select class="sizefull s-text7 p-l-22 p-r-22" name="kirim_dari" required>
								<option>-- Silahkan Pilih Bank anda --</option>
								<option value="BNI">BNI</option>
								<option value="BCA">BCA</option>
								<option value="BRI">BRI</option>
								<option value="DANAMON">DANAMON</option>
								<option value="MANDIRI">MANDIRI</option>
								<option value="MEGA">MEGA</option>
								<option value="Lainya">Lainya</option>
							</select>
						</div>
						Tipe Transaksi
						<div class="bo4 of-hidden size15 m-b-20">
						<select class="sizefull s-text7 p-l-22 p-r-22" name="tipe_order" required>
								<option>-- Silahkan Pilih tipe Transaksi --</option>
								<option value="ATM">ATM</option>
								<option value="Internet Banking">Internet Banking</option>
								<option value="Bank Transfer / Cash">Bank Transfer / Cash</option>
							</select>
						</div>
						Nama Anda di Rekening
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="nama_rek" placeholder="Nama Anda di Rekening.." required>
						</div>
						Nomor Rekening Anda
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="no_rek" placeholder="Nomor Rekening Anda.." required>
						</div>
						Pesan
						<textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="pesan" placeholder="Masukan Pesan.." required></textarea>

						<div class="w-size25">
							<!-- Button -->
							<button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
								KIRIM
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
