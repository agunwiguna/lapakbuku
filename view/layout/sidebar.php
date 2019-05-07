 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../assets/backend/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['nama_pembeli']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <?php  
        if ($_SESSION['level']=='admin') {?>
        <li>
          <a href="index.php?page=home">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="index.php?page=buku">
            <i class="fa fa-book"></i> <span>Data Buku</span>
          </a>
        </li>
        <li>
          <a href="index.php?page=pembeli">
            <i class="fa fa-user"></i> <span>Data Pembeli</span>
          </a>
        </li>
        <li>
          <a href="index.php?page=transaksi">
            <i class="fa fa-cart-plus"></i> <span>Data Transaksi</span>
          </a>
        </li>
        <li>
          <a href="index.php?page=payments">
            <i class="fa fa-money"></i> <span>Konfirmasi Pembayaran</span>
          </a>
        </li>
        <?php } else { ?>
        <li>
          <a href="index.php?page=transaksi">
            <i class="fa fa-cart-plus"></i> <span>Data Transaksi</span>
          </a>
        </li>
        <?php } ?>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>