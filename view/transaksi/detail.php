<?php
include('../../koneksi/koneksi.php');
function rupiah($angka){
    
    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;
 
}
$id=$_GET['id'];
$modal=mysqli_query($koneksi,"SELECT * FROM transaksi JOIN pembeli USING(id_pembeli) WHERE no_transaksi='$id'");
while($r=mysqli_fetch_array($modal)){
?>


    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Detail Data Transaksi</h4>
            </div>

            <div class="modal-body">
                <div class="table-responsive">
                <table class="table table-striped" id="users">
                    <tbody>                
                        <tr>
                            <td width="30px"></td>
                            <td width="100px">No. Transaksi</td>
                            <td width="50px">:</td>
                            <td><?php echo $r['no_transaksi'];?></td>
                        </tr>
                        <tr>
                            <td width="30px"></td>
                            <td width="100px">Tanggal</td>
                            <td width="50px">:</td>
                            <td><?php echo $r['tanggal_beli'];?></td>
                        </tr>
                         <tr>
                            <td width="30px"></td>
                            <td width="100px">Nama</td>
                            <td width="50px">:</td>
                            <td><?php echo $r['nama_pembeli'];?></td>
                        </tr>
                         <tr>
                            <td width="30px"></td>
                            <td width="100px">Alamat</td>
                            <td width="50px">:</td>
                            <td><?php echo $r['alamat'];?></td>
                        </tr>
                          <tr>
                            <td width="30px"></td>
                            <td width="100px">Kontak</td>
                            <td width="50px">:</td>
                            <td><?php echo $r['no_telp'];?></td>
                        </tr>
                          <tr>
                            <td width="30px"></td>
                            <td width="100px">Status</td>
                            <td width="50px">:</td>
                            <td><?php echo $r['status'];?></td>
                        </tr>
                    </tbody>
            </table>
             <?php } ?>
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

          $id = $_GET['id'];
          $query = "SELECT * FROM detail_transaksi JOIN buku USING(id)  WHERE no_transaksi='$id'";
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

            <?php 
          include '../../koneksi/koneksi.php';

          $id = $_GET['id'];
          $query = "SELECT * FROM transaksi JOIN pembeli USING(id_pembeli)  WHERE no_transaksi='$id'";
          $data = mysqli_query($koneksi,$query); 
          while ($b= mysqli_fetch_array($data)) { ?>
          <table class="table table-striped"> 
            <tr>
              <td>Total:</td>
              <td></td>
              <td></td>
              <td width="180px"><?php echo rupiah($b['total_harga']); ?></td>
            </tr>
          </table>
            <?php } ?>

            </div>


        </div>


    </div>
