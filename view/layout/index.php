<?php 

include 'header.php';
include 'sidebar.php';


if(isset($_GET['page'])){
	$page = $_GET['page'];
	
	switch ($page) {
		case 'pembeli':
			include '../pembeli/active.php';
			include '../pembeli/v_pembeli.php';
			break;
		case 'home':
			include "../dashboard/home.php";
			break;
		case 'buku':
			include "../buku/v_buku.php";
			break;
		case 'transaksi':
			include "../transaksi/v_transaksi.php";
			break;
		case 'payments':
			include "../dashboard/konfirmasi.php";
			break;						
		default:
			include "../dashboard/error.php";
			break;
	}
}else{
	include "../dashboard/home.php";
}

include 'footer.php';

?>