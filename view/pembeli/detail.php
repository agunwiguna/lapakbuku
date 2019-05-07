
<?php
include('../../koneksi/koneksi.php');
$id=$_GET['id'];
$modal=mysqli_query($koneksi,"SELECT * FROM pembeli WHERE id_pembeli='$id'");
while($r=mysqli_fetch_array($modal)){
?>

    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Detail Data Pembeli</h4>
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
                        <td>Kontak</td>
                        <td>:</td>
                        <td><?php echo $r['no_telp'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><p align="justify"><?php echo $r['alamat'];?></p></td>
                    </tr>
                </tbody>
            </table>
         </div>
        <?php } ?>


    </div>


</div>
</div>  