
<?php
include('../../koneksi/koneksi.php');
$id=$_GET['id'];
$modal=mysqli_query($koneksi,"SELECT * FROM transaksi WHERE no_transaksi='$id'");
while($r=mysqli_fetch_array($modal)){ ?>

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Update Data Transaksi</h4>
            </div>
            <div class="modal-body">
                <form action="../../model/order/proses_update.php" method="post" autocomplete="off" enctype="multipart/form-data" class="form-user">
                  <div class="form-group col-md-12">
                    <label for="name">No. Transaksi</label>
                    <input type="text" class="form-control" name="no_transaksi" value="<?php echo $r['no_transaksi'];?>" readonly>
                  </div>
                    <div class="form-group col-md-12">
                      <label for="nama_pembeli">Status</label>
                      <select class="form-control" name="status" required>
                          <option value="">-- Pilih --</option>
                          <option value="Belum Lunas">Belum Lunas</option>
                          <option value="Lunas">Lunas</option>
                          <option value="Di kirim">Di kirim</option>
                      </select>    
                    </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
              </div>                 
                </form>
            </div>
        </div>
    </div>

<?php } ?>