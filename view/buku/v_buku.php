<?php  

if ($_SESSION['level']=='admin') {?>
<link href="../../assets/swal/sweetalert2.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../../assets/swal/sweetalert2.min.js"></script>
<!-- DataTables -->
<link rel="stylesheet" href="../../assets/backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Buku
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Buku</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
               <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default">
                <span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Tambah
              </button>
                <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Input Data Buku</h4>
                    </div>
                    <div class="modal-body">
                      <form action="../../model/buku/proses_simpan.php" method="post" enctype="multipart/form-data" autocomplete="off" class="form-user">
                        <div class="form-group col-md-12">
                          <label for="name">Judul Buku</label>
                          <input type="text" class="form-control" name="name" placeholder="Masukan Judul Buku.." required>
                        </div>
                        <div class="form-group col-md-12">
                          <label for="kategori">Kategori Buku</label>
                          <select class="form-control" name="kategori" required>
                            <option value="">-- Pilih --</option>
                            <option value="Fiksi">Fiksi</option>
                            <option value="Non Fiksi">Non Fiksi</option>
                            <option value="Umum">Umum</option>
                            <option value="Anak-Anak">Anak-Anak</option>
                            <option value="Lainnya">Lainnya</option>
                          </select>    
                        </div>
                        <div class="form-group col-md-6">
                          <label for="pengarang">Pengarang</label>
                          <input type="text" class="form-control" name="pengarang" placeholder="Masukan Pengarang.."  required>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="penerbit">Penerbit</label>
                          <input type="text" class="form-control" name="penerbit" placeholder="Masukan Penerbit.."  required>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="isbn">ISBN</label>
                          <input type="text" class="form-control" name="isbn" placeholder="Masukan ISBN.."  required>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="penerbit">Bahasa</label>
                          <select class="form-control" name="bahasa" required>
                            <option value="">-- Pilih --</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Inggris">Inggris</option>
                            <option value="Mandarin">Mandarin</option>
                            <option value="Jepang">Jepang</option>
                            <option value="Arab">Arab</option>
                            <option value="Lainnya">Lainnya</option>
                          </select>  
                        </div>
                          <div class="form-group col-md-6">
                          <label for="quantity">Jumlah</label>
                          <input type="number" min="0" class="form-control" name="quantity" placeholder="Masukan Jumlah.."  required>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="price">Harga</label>
                          <input type="number" class="form-control" name="price" placeholder="Masukan Harga.."  required>
                        </div>
                        <div class="form-group col-md-12">
                          <label>Deskripsi</label>
                          <textarea class="form-control" name="deskripsi" rows="3" placeholder="Masukan deskripsi ..." required></textarea>
                        </div>
                        <div class="form-group col-md-12">
                          <label for="foto">Foto</label>
                          <input type="file" class="form-control" name="foto" accept="image/*" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
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
                  <th>Judul Buku</th>
                  <th>Kategori</th>              
                  <th>Jumlah</th>
                  <th>Harga</th>
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
                        $no=1;
                        $query = "SELECT * FROM buku ORDER BY id DESC";
                        $data = mysqli_query($koneksi,$query);
                        while($d=mysqli_fetch_array($data)){
                    ?>
                     <tr>
                        <td><?=$no++;?></td>
                        <td><?=$d['name']?></td>
                        <td><?=$d['kategori']?></td>
                        <td><?=$d['quantity']?></td>
                        <td><?=rupiah($d['price'])?></td>
                        <td>
                           <div class="btn-group">
                              <button type="button" class="btn btn-info" style="height:27px;">Pilih</button>
                              <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" style="height:27px;">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <ul class="dropdown-menu" role="menu">
                                <li>
                                  <a href='#' class='open_modal' id='<?php echo $d['id']; ?>'>Detail</a>
                                </li>
                                <li><a href="#" class='open_modals' id='<?php echo $d['id']; ?>'>Edit</a></li>
                                <li class="divider"></li>
                                <li><a href="../../model/buku/proses_hapus.php?id=<?=$d['id']?>" class="delete-link">Hapus</a></li>
                              </ul>
                            </div>
                        </td>
                    </tr>
                   <?php } ?>               
                </tbody>
                <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Judul Buku</th>
                  <th>Kategori</th>              
                  <th>Jumlah</th>
                  <th>Harga</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
              <!-- Modal Popup untuk Detail--> 
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

<script type="text/javascript">
   $(document).ready(function () {
   $(".open_modal").click(function(e) {
      var m = $(this).attr("id");
     $.ajax({
          url: "../buku/detail.php",
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
          url: "../buku/update.php",
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
            window.location.href = getLink;
            } else {
              swal("Batal", "Data batal di hapus :)", "error");
            }
          });
            return false;
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