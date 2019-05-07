<?php 

include './view/home/header.php';


if(isset($_GET['page'])){
	$page = $_GET['page'];
	
	switch ($page) {
		case 'cart':
			include './view/home/cart.php';
			break;
		case 'detail':
			include './view/home/detail.php';
			break;
		case 'confirm':
			include './view/home/confirm.php';
			break;
		case 'step-one':
			include './view/home/step-one.php';
			break;
		case 'step-two':
			include './view/home/step-two.php';
			break;
		case 'payment':
			include './model/order/payment.php';
			break;
		case 'cekout':
			include './model/order/cekout.php';
			break;													
		default:
			echo "<center><img src='./assets/img/error.png'></center>";
			break;
	}
}else{
	include "./view/home/home.php";
}

include './view/home/footer.php';

?>