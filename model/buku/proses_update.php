<!DOCTYPE html>
<html>
<head>
  <title></title>
    <script src="../../assets/backend/bower_components/jquery/dist/jquery.min.js"></script>
   <link href="../../assets/swal/sweetalert2.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../../assets/swal/sweetalert2.min.js"></script>
</head>
<body>
<?php

include('../../koneksi/koneksi.php');

$id =  mysqli_real_escape_string($koneksi,htmlspecialchars($_POST['id']));

$name =  mysqli_real_escape_string($koneksi,htmlspecialchars($_POST['name']));
$pengarang =  mysqli_real_escape_string($koneksi,htmlspecialchars($_POST['pengarang']));
$penerbit =  mysqli_real_escape_string($koneksi,htmlspecialchars($_POST['penerbit']));
$quantity =  mysqli_real_escape_string($koneksi,htmlspecialchars($_POST['quantity']));
$price =  mysqli_real_escape_string($koneksi,htmlspecialchars($_POST['price']));
$isbn =  mysqli_real_escape_string($koneksi,htmlspecialchars($_POST['isbn']));
$kategori =  mysqli_real_escape_string($koneksi,htmlspecialchars($_POST['kategori']));
$bahasa =  mysqli_real_escape_string($koneksi,htmlspecialchars($_POST['bahasa']));
$deskripsi =  mysqli_real_escape_string($koneksi,htmlspecialchars($_POST['deskripsi']));

$query = "SELECT * FROM buku WHERE id='".$id."'";
$sql = mysqli_query($koneksi, $query); 
$data = mysqli_fetch_array($sql);

if(isset($_POST['ubah_foto'])){ 
  
  $ekstensi_v = array('png','jpg');
  $foto = $_FILES['foto']['name'];
  $x = explode('.', $foto);
  $ekstensi = strtolower(end($x));
  $ukuran = $_FILES['foto']['size'];
  $file_tmp = $_FILES['foto']['tmp_name'];

  if (in_array($ekstensi, $ekstensi_v) === true) {
    if ($ukuran < 1044070) {
      move_uploaded_file($file_tmp,'../../assets/img/'.$foto);

      if(is_file("../../assets/img/".$data['foto'])) 
      unlink("../../assets/img/".$data['foto']);

      $query = "UPDATE buku SET name='".$name."', pengarang='".$pengarang."', penerbit='".$penerbit."', quantity='".$quantity."', price='".$price."', foto='".$foto."', isbn='".$isbn."', kategori='".$kategori."', bahasa='".$bahasa."', deskripsi='".$deskripsi."' WHERE id='".$id."'";
        $sql = mysqli_query($koneksi, $query);

        if($sql){?>

           <script>
            swal({
                 title: "Berhasil!",
                 text: "Data Berhasil disimpan!",
                 type: "success",
            }).then(function() {
                window.location = "../../view/layout/index.php?page=buku";
            });
          </script>

        <?php }else{ ?>
          
         <script>
          swal({
           title: "Gagal!",
           text: "Gambar gagal di Upload!",
           type: "error",
         }).then(function() {
          window.location = "../../view/layout/index.php?page=buku";
        });
        </script>


        <?php }

    }else {  ?>
           <script>
          swal({
               title: "Gagal!",
               text: "Ukuran Gambar terlalu besar!",
               type: "error",
          }).then(function() {
              window.location = "../../view/layout/index.php?page=buku";
          });
        </script>
    <?php }
    
  }else {?>

       <script>
          swal({
               title: "Gagal!",
               text: "Ekstensi File tidak diperbolehkan!",
               type: "error",
          }).then(function() {
              window.location = "../../view/layout/index.php?page=buku";
          });
        </script>
  <?php } 


}else{

  $query = "UPDATE buku SET name='".$name."', pengarang='".$pengarang."', penerbit='".$penerbit."', quantity='".$quantity."', price='".$price."', isbn='".$isbn."', kategori='".$kategori."', bahasa='".$bahasa."' , deskripsi='".$deskripsi."' WHERE id='".$id."'";
  $sql = mysqli_query($koneksi, $query);
  
  if ($sql) {?>
     <script>
        swal({
             title: "Berhasil!",
             text: "Data Berhasil disimpan!",
             type: "success",
        }).then(function() {
            window.location = "../../view/layout/index.php?page=buku";
        });
      </script>
  <?php } else {?>
    <script>
      swal({
       title: "Gagal!",
       text: "Data gagal di simpan!",
       type: "error",
     }).then(function() {
      window.location = "../../view/layout/index.php?page=buku";
    });
  </script>
  <?php }
  
   
}?>
</body>
</html>