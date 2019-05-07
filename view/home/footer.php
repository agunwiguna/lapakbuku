<!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
		<div class="flex-w p-b-90">
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					Alamat
				</h4>

				<div>
					<p class="s-text7 w-size27">
						Jl. In Aja dulu No. 8, Bandung. 
					</p>

					<div class="flex-m p-t-30">
						<a href="#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
					</div>
				</div>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Kategori
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Fiksi
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Non Fiksi
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Umum
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Anak-Anak
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Lapak Buku
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Tentang Lapak Buku
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Aturan Penggunaan
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Kebijakan Privasi
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Media Partner
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Layanan
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Lacak Pengiriman
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Pengembalian
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Pengiriman
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Daftar Pertanyaan (FAQ)
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					Lapak Buku Apps
				</h4>

				<form>
					<div class="effect1 w-size9">
						<a href="#">
						<img src="./assets/img/playstore.png" style="width: 250px;height: 90px;">
						</a>
					</div>

					<div class="w-size2 p-t-20">
						<!-- Button -->
						
					</div>

				</form>
			</div>
		</div>

		<div class="t-center p-l-15 p-r-15">
			<a href="#">
				<img class="h-size2" src="./assets/frontend/images/icons/paypal.png" alt="IMG-PAYPAL">
			</a>

			<a href="#">
				<img class="h-size2" src="./assets/frontend/images/icons/visa.png" alt="IMG-VISA">
			</a>

			<a href="#">
				<img class="h-size2" src="./assets/frontend/images/icons/mastercard.png" alt="IMG-MASTERCARD">
			</a>

			<a href="#">
				<img class="h-size2" src="./assets/frontend/images/icons/express.png" alt="IMG-EXPRESS">
			</a>

			<a href="#">
				<img class="h-size2" src="./assets/frontend/images/icons/discover.png" alt="IMG-DISCOVER">
			</a>

			<div class="t-center s-text8 p-t-20">
				Copyright © 2018 All rights reserved. | Designed by Colorlib Modified by Lapak Buku
			</div>
		</div>
	</footer>



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->

<!--===============================================================================================-->
	<script type="text/javascript" src="./assets/frontend/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="./assets/frontend/vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="./assets/frontend/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="./assets/frontend/vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="./assets/frontend/vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="./assets/frontend/js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="./assets/frontend/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="./assets/frontend/vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="./assets/swal/sweetalert2.min.js"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "di tambahkan ke keranjang !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>

<!--===============================================================================================-->
	<script src="./assets/frontend/js/main.js"></script>
<!-- WhatsHelp.io widget -->
<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "+6282316369078", // WhatsApp number
            viber: "+6282316369078", // Viber number
            call_to_action: "Hubungi Kami", // Call to action
            button_color: "#FF6550", // Color of button
            position: "left", // Position may be 'right' or 'left'
            order: "whatsapp,viber", // Order of buttons
        };
        var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<!-- /WhatsHelp.io widget -->
</body>
</html>
