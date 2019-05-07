
<?php
include('../../koneksi/koneksi.php');
function rupiah($angka){
    
    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;
 
}
$id=mysqli_real_escape_string($koneksi,$_GET['id']);
$modal=mysqli_query($koneksi,"SELECT * FROM buku WHERE id='$id'");
while($r=mysqli_fetch_array($modal)){
?>

    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Detail Data Buku</h4>
            </div>

            <div class="modal-body">
                 <center>
                    <img src="../../assets/img/<?php echo $r['foto'];?>" class="img-responsive thumbnail" style="height:180px; width:145px;">
                    </center>
                <div class="table-responsive">
                <table class="table table-striped" id="users">
                    <tbody>                
                    <tr>
                        <td width="30px"></td>
                        <td width="100px">Judul Buku</td>
                        <td width="50px">:</td>
                        <td><?php echo $r['name'];?></td>
                    </tr>
                    <tr>
                        <td width="30px"></td>
                        <td width="100px">Kategori</td>
                        <td width="50px">:</td>
                        <td><?php echo $r['kategori'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Pengarang</td>
                        <td>:</td>
                        <td><?php echo $r['pengarang'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Penerbit</td>
                        <td>:</td>
                        <td><?php echo $r['penerbit'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>ISBN</td>
                        <td>:</td>
                        <td><?php echo $r['isbn'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Bahasa</td>
                        <td>:</td>
                        <td><?php echo $r['bahasa'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Jumlah</td>
                        <td>:</td>
                        <td><?php echo $r['quantity'];?></td>
                    </tr>
                      <tr>
                        <td></td>
                        <td>Harga</td>
                        <td>:</td>
                        <td><?php echo rupiah($r['price']);?></td>
                    </tr>
                       <tr>
                        <td></td>
                        <td>Deskripsi</td>
                        <td>:</td>
                        <td><p align="justify"><?php echo $r['deskripsi'];?></p></td>
                    </tr>
                </tbody>
            </table>
         </div>
        <?php } ?>


    </div>


</div>
</div>  