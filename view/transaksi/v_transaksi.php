<link href="../../assets/swal/sweetalert2.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../../assets/swal/sweetalert2.min.js"></script>
<!-- DataTables -->
<link rel="stylesheet" href="../../assets/backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Transaksi
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Transaksi</li>
      </ol>
    </section>

<?php  
function rupiah($angka){

  $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
  return $hasil_rupiah;

}
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

?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
                <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                </div>
                <!-- /.modal-dialog -->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>No. Transaksi</th>
                  <th>Tanggal</th>
                  <th>Status Pembayaran</th>
                  <th>Total Harga</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <?php  
                if ($_SESSION['level']=='admin') {?>
                  <tbody>               
                    <?php
                        include('../../koneksi/koneksi.php');
                        $no=1;
                        $query = "SELECT * FROM transaksi";
                        $data = mysqli_query($koneksi,$query);
                        while($d=mysqli_fetch_array($data)){
                    ?>
                     <tr>
                        <td><?=$no++;?></td>
                        <td><?=$d['no_transaksi']?></td>
                        <td><?=tgl_indo($d['tanggal_beli'])?></td>
                        <td><?=$d['status']?></td>
                        <td><?=rupiah($d['total_harga'])?></td>
                        <td>
                           <div class="btn-group">
                              <button type="button" class="btn btn-info" style="height:27px;">Pilih</button>
                              <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" style="height:27px;">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <ul class="dropdown-menu" role="menu">
                                <li><a href="#" class='open_modal' id='<?php echo $d['no_transaksi']; ?>'>Detail</a></li>
                                <li><a href="../transaksi/invoice_print.php?no_transaksi=<?=$d['no_transaksi']?>" target="_blank">Print</a></li>
                                <li><a href="#" class='open_modals' id='<?php echo $d['no_transaksi']; ?>'>Edit</a></li>
                                <li class="divider"></li>
                                <li><a href="../../model/order/delete.php?no_transaksi=<?=$d['no_transaksi']?>" class="delete-link">Hapus</a></li>
                              </ul>
                            </div>
                        </td>
                    </tr>
                   <?php } ?>               
                </tbody>
                <?php } else { ?>
                                 <tbody>               
                    <?php
                        include('../../koneksi/koneksi.php');
                        $no=1;
                        $id_pembeli = $_SESSION['id_pembeli'];
                        $query = "SELECT * FROM transaksi WHERE id_pembeli='$id_pembeli'";
                        $data = mysqli_query($koneksi,$query);
                        while($d=mysqli_fetch_array($data)){
                    ?>
                     <tr>
                        <td><?=$no++;?></td>
                        <td><?=$d['no_transaksi']?></td>
                        <td><?=tgl_indo($d['tanggal_beli'])?></td>
                        <td><?=$d['status']?></td>
                        <td><?=rupiah($d['total_harga'])?></td>
                        <td>
                           <div class="btn-group">
                              <button type="button" class="btn btn-info" style="height:27px;">Pilih</button>
                              <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" style="height:27px;">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <ul class="dropdown-menu" role="menu">
                                <li><a href="#" class='open_modal' id='<?php echo $d['no_transaksi']; ?>'>Detail</a></li>
                                <?php if ($d['status']=='Lunas') {?>
                                  <li><a href="../transaksi/invoice_print.php?no_transaksi=<?=$d['no_transaksi']?>" target="_blank">Print</a>
                                  </li>
                                <?php } ?>

                              </ul>
                            </div>
                        </td>
                    </tr>
                   <?php } ?>               
                </tbody>
                <?php }
                ?>

                <tfoot>
                <tr>
                  <th>No.</th>
                  <th>No. Transaksi</th>
                  <th>Tanggal</th>
                  <th>Status Pembayaran</th>
                  <th>Total Harga</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
               <div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              </div>
              <div id="ModalUpdate" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<!-- DataTables -->
<script src="../../assets/backend/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../assets/backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script>
    jQuery(document).ready(function($){
        $('.delete-link').on('click',function(){
          var getLink = $(this).attr('href');
          swal({
             title: 'Apa kamu yakin?',
              text: "Data akan dihapus secara permanen!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Hapus!'
          })
          .then((willDelete) => {
            if (willDelete) {
              swal({
                title: "Berhasil!",
                text: "Data berhasil terhapus.",
                type: "success",
                timer: 3000
             });
            window.location.href = getLink;
            } else {
              swal("Batal", "Data gagal di hapus :)", "error");
            }
          });
            return false;
        });
    });
</script>

<script type="text/javascript">
   $(document).ready(function () {
   $(".open_modal").click(function(e) {
      var m = $(this).attr("id");
     $.ajax({
          url: "../transaksi/detail.php",
          type: "GET",
          data : {id: m,},
          success: function (ajaxData){
            $("#ModalEdit").html(ajaxData);
            $("#ModalEdit").modal('show',{backdrop: 'true'});
           }
         });
        });
      });
</script>

<script type="text/javascript">
   $(document).ready(function () {
   $(".open_modals").click(function(e) {
      var m = $(this).attr("id");
     $.ajax({
          url: "../transaksi/update.php",
          type: "GET",
          data : {id: m,},
          success: function (ajaxData){
            $("#ModalUpdate").html(ajaxData);
            $("#ModalUpdate").modal('show',{backdrop: 'true'});
           }
         });
        });
      });
</script>
