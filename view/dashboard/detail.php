
<?php
include('../../koneksi/koneksi.php');
function rupiah($angka){
    
    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;
 
}
$id=mysqli_real_escape_string($koneksi,$_GET['id']);
$modal=mysqli_query($koneksi,"SELECT * FROM payment WHERE id_payment='$id'");
while($r=mysqli_fetch_array($modal)){
?>

    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Detail Data Buku</h4>
            </div>

            <div class="modal-body">
                <div class="table-responsive">
                <table class="table table-striped" id="users">
                    <tbody>                
                    <tr>
                        <td width="30px"></td>
                        <td width="100px">Nama</td>
                        <td width="50px">:</td>
                        <td><?php echo $r['nama_pembeli'];?></td>
                    </tr>
                    <tr>
                        <td width="30px"></td>
                        <td width="100px">Email</td>
                        <td width="50px">:</td>
                        <td><?php echo $r['email'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>No. Transaksi</td>
                        <td>:</td>
                        <td><?php echo $r['no_transaksi'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Tanggal</td>
                        <td>:</td>
                        <td><?php echo $r['tanggal'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Nominal</td>
                        <td>:</td>
                        <td><?php echo rupiah($r['nominal']);?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Bank Kami</td>
                        <td>:</td>
                        <td><?php echo $r['bank_kami'];?></td>
                    </tr>
                      <tr>
                        <td></td>
                        <td>Kirim Dari</td>
                        <td>:</td>
                        <td><?php echo $r['kirim_dari'];?></td>
                    </tr>
                      <tr>
                        <td></td>
                        <td>Tipe Pembayaran</td>
                        <td>:</td>
                        <td><?php echo $r['tipe_order'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Nama di Rekening</td>
                        <td>:</td>
                        <td><?php echo $r['nama_rek'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Nomor Rekening</td>
                        <td>:</td>
                        <td><?php echo $r['no_rek'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Pesan</td>
                        <td>:</td>
                        <td><p align="justify"><?php echo $r['pesan'];?></p></td>
                    </tr>
                </tbody>
            </table>
         </div>
        <?php } ?>


    </div>


</div>
</div>  