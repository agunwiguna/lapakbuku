
<?php
include('../../koneksi/koneksi.php');
$id=mysqli_real_escape_string($koneksi,$_GET['id']);
$modal=mysqli_query($koneksi,"SELECT * FROM buku WHERE id='$id'");
while($r=mysqli_fetch_array($modal)){ ?>

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Update Data Buku</h4>
            </div>
            <div class="modal-body">
                <form action="../../model/buku/proses_update.php" method="post" autocomplete="off" enctype="multipart/form-data" class="form-user">
                  <input type="hidden" class="form-control" name="id" value="<?php echo $r['id'];?>">
                  <div class="form-group col-md-12">
                    <label for="name">Judul Buku</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $r['name'];?>" placeholder="Masukan Judul Buku.." required>
                  </div>
                    <div class="form-group col-md-12">
                      <label for="nama_pembeli">Kategori Buku</label>
                      <select class="form-control" name="kategori" required>
                          <option value="">-- Pilih --</option>
                          <option value="Fiksi" <?php if($r['kategori'] == 'Fiksi'){ echo 'selected'; } ?>>Fiksi</option>
                          <option value="Non Fiksi" <?php if($r['kategori'] == 'Non Fiksi'){ echo 'selected'; } ?>>Non Fiksi</option>
                          <option value="Umum" <?php if($r['kategori'] == 'Umum'){ echo 'selected'; } ?>>Umum</option>
                          <option value="Anak-Anak" <?php if($r['kategori'] == 'Anak-Anak'){ echo 'selected'; } ?>>Anak-Anak</option>
                          <option value="Lainnya" <?php if($r['kategori'] == 'Lainya'){ echo 'selected'; } ?>>Lainnya</option>
                      </select>    
                    </div>
                  <div class="form-group col-md-6">
                      <label for="pengarang">Pengarang</label>
                      <input type="text" class="form-control" name="pengarang" value="<?php echo $r['pengarang'];?>" placeholder="Masukan Pengarang.."  required>
                  </div>
                  <div class="form-group col-md-6">
                      <label for="penerbit">Penerbit</label>
                      <input type="text" class="form-control" name="penerbit" value="<?php echo $r['penerbit'];?>" placeholder="Masukan Penerbit.."  required>
                  </div>
                  <div class="form-group col-md-6">
                      <label for="isbn">ISBN</label>
                      <input type="text" class="form-control" name="isbn" value="<?php echo $r['isbn'];?>" placeholder="Masukan ISBN.."  required>
                  </div>
                  <div class="form-group col-md-6">
                      <label for="penerbit">Bahasa</label>
                      <select class="form-control" name="bahasa" required>
                        <option value="">-- Pilih --</option>
                        <option value="Indonesia" <?php if($r['bahasa'] == 'Indonesia'){ echo 'selected'; } ?>>Indonesia</option>
                        <option value="Inggris" <?php if($r['bahasa'] == 'Inggris'){ echo 'selected'; } ?>>Inggris</option>
                        <option value="Mandarin" <?php if($r['bahasa'] == 'Mandarin'){ echo 'selected'; } ?>>Mandarin</option>
                        <option value="Jepang" <?php if($r['bahasa'] == 'Jepang'){ echo 'selected'; } ?>>Jepang</option>
                        <option value="Arab" <?php if($r['bahasa'] == 'Arab'){ echo 'selected'; } ?>>Arab</option>
                        <option value="Lainnya" <?php if($r['bahasa'] == 'Lainya'){ echo 'selected'; } ?>>Lainnya</option>
                    </select>  
                </div>
                <div class="form-group col-md-6">
                  <label for="quantity">Jumlah</label>
                  <input type="number" min="0" class="form-control" value="<?php echo $r['quantity'];?>" name="quantity" placeholder="Masukan Jumlah.."  required>
              </div>
              <div class="form-group col-md-6">
                  <label for="price">Harga</label>
                  <input type="number" class="form-control" name="price" value="<?php echo $r['price'];?>" placeholder="Masukan Harga.."  required>
              </div>
              <div class="form-group col-md-12">
                <label>Deskripsi</label>
                <textarea class="form-control" name="deskripsi" rows="3" placeholder="Masukan deskripsi ..." required><?php echo $r['deskripsi'];?></textarea>
              </div>
              <div class="form-group col-md-12">
                  <label for="foto">Foto</label></br>
                  <input type="checkbox" name="ubah_foto" value="true"> Ceklis jika ingin mengubah foto<br>
                  <input type="file" class="form-control" name="foto">
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