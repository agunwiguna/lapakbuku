<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(./assets/frontend/images/heading-pages-01.jpg);">
		<h2 class="l-text2 t-center">
			Pembayaran
		</h2>
	</section>

	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 p-b-30">
					<form action="index.php?page=step-two" class="leave-comment" autocomplete="off" method="post">
						<h4 class="m-text26 p-b-36 p-t-15">
						Isi Form berikut :
						</h4>
						Nama:
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="nama_pembeli" placeholder="Nama Lengkap.." required>
						</div>
						E-mail :
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="email" name="email" placeholder="Alamat E-mail.." required>
						</div>
						Kontak:
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="no_telp" placeholder="Kontak.." required>
						</div>
						Alamat
						<textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="alamat" placeholder="Masukan Alamat Lengkap.." required></textarea>
						<br/>
						<hr/>
						<br/>
						Username: 
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="username" placeholder="Masukan Username.." id="username" required>
						</div>
						Password:
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="password" placeholder="Masukan Password.." required>
						</div>

						<div class="w-size25">
							<!-- Button -->						
							<!-- <button type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
								KIRIM
							</button> -->
							<span id="hasil"></span>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
<script type="text/javascript">
$(document).ready(function(){    
	$("#username").keyup(function()	{		
		var name = $(this).val();	
		if(name.length > 3)		{		
			$("#hasil").html('Memeriksa Ketersediaan...');
			$.ajax({
			type : 'POST',
			url  : './model/order/check_user.php',
			data : $(this).serialize(),
			success : function(data)  {
			$("#hasil").html(data);
			   }
			});
		return false;
		}
		else
		{
		$("#hasil").html('');
		}
	});
});
</script>
