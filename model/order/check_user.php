<?php
include '../../koneksi/koneksi.php';

if($_POST){
      $username  = strip_tags(mysqli_real_escape_string($koneksi,htmlspecialchars($_POST['username'])));
	  $sql= mysqli_query($koneksi,"SELECT username FROM pembeli WHERE username='".$username."'");
	  $count = mysqli_num_rows($sql);
	  if($count > 0) {
		  echo "<span style='color:#fe0d0d;'>Ups...Username tidak tersedia</span>";		  
	  } else {
		  echo "<span style='color:green;'>Username Tersedia</span>";
		  echo "<br/>";
		  echo "<button type='submit' class='flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4'>
					KIRIM
				</button>";
	  }
  }
?>