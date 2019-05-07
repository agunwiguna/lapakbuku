<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Lapak Buku | Invoice</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../assets/backend/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../assets/backend/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../assets/backend/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../assets/backend/dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body onload="window.print();">
<?php  
include '../../koneksi/koneksi.php';

function tgl_indo($tanggal){
  $bulan = array (
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('-', $tanggal);

  return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

$no_transaksi = $_GET['no_transaksi'];
$query = "SELECT * FROM transaksi JOIN pembeli USING(id_pembeli)  WHERE no_transaksi='$no_transaksi'";
$data = mysqli_query($koneksi,$query);
while ($b= mysqli_fetch_array($data)) { ?>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-book"></i> Lapak Buku
          <small class="pull-right">Dicetak pada : <?php echo tgl_indo(date("Y-m-d")); ?> </small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        Dari
        <address>
          <strong>Lapak Buku</strong><br>
          Jln. In Aja Dulu No.8<br>
          Kota Bandung<br>
          Kontak: (804) 123-5432<br>
          Email: info@lapakbuku.com
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        Kepada
        <address>
          <strong><?php echo $b['nama_pembeli']; ?></strong><br>
          <?php echo $b['alamat']; ?><br>
          Kontak: <?php echo $b['no_telp']; ?><br>
          Email:  <?php echo $b['email']; ?>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>Invoice</b><br>
        <br>
        <b>Nomor Transaksi :</b> <?php echo $b['no_transaksi']; ?><br>
        <b>Tanggal Transaksi :</b> <?php echo tgl_indo($b['tanggal_beli']); ?><br>
      </div>
      <!-- /.col -->
        <?php } ?>
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>Jumlah</th>
            <th>Item</th>
            <th></th>
            <th></th>
            <th>Subtotal</th>
          </tr>
          </thead>
          <tbody>
          <?php  
          include '../../koneksi/koneksi.php';

          $no_transaksi = $_GET['no_transaksi'];
          $query = "SELECT * FROM detail_transaksi JOIN buku USING(id)  WHERE no_transaksi='$no_transaksi'";
          $data = mysqli_query($koneksi,$query);
          while ($c= mysqli_fetch_array($data)) { ?>
          <tr>
            <td><?php echo $c['jumlah'];?></td>
            <td><?php echo $c['name'];?></td>
            <td></td>
            <td></td>
            <td><?php echo rupiah($c['harga']); ?></td>
          </tr>
           <?php } ?>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-6">
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          Terimakasih telah berbelanja di Lapak Buku dan Selamat Membaca :)
        </p>
      </div>
      <!-- /.col -->
      <div class="col-xs-6">
        <p class="lead">Total Belanja :</p>

        <div class="table-responsive">
          <?php 
          include '../../koneksi/koneksi.php';

          function rupiah($angka){

            $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
            return $hasil_rupiah;

          }

          $no_transaksi = $_GET['no_transaksi'];
          $query = "SELECT * FROM transaksi JOIN pembeli USING(id_pembeli)  WHERE no_transaksi='$no_transaksi'";
          $data = mysqli_query($koneksi,$query); 
          while ($b= mysqli_fetch_array($data)) { ?>
          <table class="table">
            <tr>
              <th>Total:</th>
              <td> <?php echo rupiah($b['total_harga']); ?></td>
            </tr>
          </table>
            <?php } ?>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
