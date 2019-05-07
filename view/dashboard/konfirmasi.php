<?php  

if ($_SESSION['level']=='admin') {?>
<link href="../../assets/swal/sweetalert2.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../../assets/swal/sweetalert2.min.js"></script>
<!-- DataTables -->
<link rel="stylesheet" href="../../assets/backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="../../assets/backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Konfirmasi Pembayaran
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Konfirmasi Pemabayaran</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
        
                <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                  <div class="modal-content">
                  </div>
                  <!-- /.modal-content -->
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
                  <th>Nama</th>
                  <th>No. Transaksi</th>
                  <th>Tanggal</th>
                  <th>Nominal</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>               
                    <?php
                        include('../../koneksi/koneksi.php');
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
                        $no=1;
                        $query = "SELECT * FROM payment";
                        $data = mysqli_query($koneksi,$query);
                        while($d=mysqli_fetch_array($data)){
                    ?>
                     <tr>
                        <td><?=$no++;?></td>
                        <td><?=$d['nama_pembeli']?></td>
                        <td><?=$d['no_transaksi']?></td>
                        <td><?=tgl_indo($d['tanggal'])?></td>
                        <td><?=rupiah($d['nominal'])?></td>
                        <td>
                           <div class="btn-group">
                              <button type="button" class="btn btn-info" style="height:27px;">Pilih</button>
                              <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" style="height:27px;">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <ul class="dropdown-menu" role="menu">
                                <li><a href="#" class='open_modal' id='<?php echo $d['id_payment']; ?>'>Detail</a></li>
                                <li class="divider"></li>
                                <li><a href="../../model/order/del_payment.php?id_payment=<?=$d['id_payment']?>" class="delete-link">Hapus</a></li>
                              </ul>
                            </div>
                        </td>
                    </tr>
                   <?php } ?>               
                </tbody>
                <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Nama</th>
                  <th>No. Transaksi</th>
                  <th>Tanggal</th>
                  <th>Nominal</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
               <div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
          url: "../dashboard/detail.php",
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

<?php } else { ?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        404 Error Page
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">404 error</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="error-page">
        <h2 class="headline text-yellow"> 404</h2>

        <div class="error-content">
          <h3><i class="fa fa-warning text-yellow"></i> Oops! Halaman tidak ditemukan.</h3>

          <p>
            <a href="../layout/">Kembali ke dashboard</a>
          </p>
        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>
    <!-- /.content -->
  </div>
<?php } ?>