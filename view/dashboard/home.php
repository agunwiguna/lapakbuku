<?php  

if ($_SESSION['level']=='admin') {?>
  <script src="../../assets/chartjs/Chart.bundle.js"></script>

  <style type="text/css">
  .container {
    width: 50%;
    margin: 15px auto;
  }
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <?php 
              include('../../koneksi/koneksi.php');
              $sql="SELECT * FROM transaksi"; 
              if ($result=mysqli_query($koneksi,$sql)) 
              { 
                $rowcount=mysqli_num_rows($result); 
                printf("<h3>%d \n",$rowcount); 
                mysqli_free_result($result); 
              } 
              mysqli_close($koneksi); 
              ?>

              <p>Pesanan Baru</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="index.php?page=transaksi" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <?php 
              include('../../koneksi/koneksi.php');
              $sql="SELECT * FROM buku"; 
              if ($result=mysqli_query($koneksi,$sql)) 
              { 
                $rowcount=mysqli_num_rows($result); 
                printf("<h3>%d \n",$rowcount); 
                mysqli_free_result($result); 
              } 
              mysqli_close($koneksi); 
              ?>
              <p>Data Buku</p>
            </div>
            <div class="icon">
              <i class="ion-ios-book"></i>
            </div>
            <a href="index.php?page=buku" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
                 <?php 
                  include('../../koneksi/koneksi.php');
                  $sql="SELECT * FROM pembeli WHERE level!='admin'"; 
                  if ($result=mysqli_query($koneksi,$sql)) 
                  { 
                    $rowcount=mysqli_num_rows($result); 
                    printf("<h3>%d \n",$rowcount); 
                    mysqli_free_result($result); 
                  } 
                  mysqli_close($koneksi); 
                  ?>

              <p>Data Pembeli</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="index.php?page=pembeli" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
         <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <?php 
              include('../../koneksi/koneksi.php');
              $sql="SELECT * FROM payment"; 
              if ($result=mysqli_query($koneksi,$sql)) 
              { 
                $rowcount=mysqli_num_rows($result); 
                printf("<h3>%d \n",$rowcount); 
                mysqli_free_result($result); 
              } 
              mysqli_close($koneksi); 
              ?>

              <p>Konfirmasi Pembayaran</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="index.php?page=payments" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- /.col (LEFT) -->

        <?php
        include('../../koneksi/koneksi.php');
        $name       = mysqli_query($koneksi, "SELECT name FROM buku order by id asc");
        $quantity = mysqli_query($koneksi, "SELECT quantity FROM buku order by id asc");
        ?>
        <div class="col-md-12">
          <!-- BAR CHART -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Data Buku</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="container">
                  <canvas id="myChart" width="100" height="100"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
   <script>
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?php while ($b = mysqli_fetch_array($name)) { echo '"' . $b['name'] . '",';}?>],
            datasets: [{
                    label: '# Stok Buku',
                    data: [<?php while ($p = mysqli_fetch_array($quantity)) { echo '"' . $p['quantity'] . '",';}?>],
                    backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                       'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                    ],
                    borderWidth: 1
                }]
        },
        options: {
            scales: {
                yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
            }
        }
    });
</script>

 
<?php } else { ?>

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <h3 align="center">SELAMAT DATANG DI DASHBOARD LAPAK BUKU</h3>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
 <?php } ?>