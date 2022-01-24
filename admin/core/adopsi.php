<?php 
    require_once('../../partial/admin.php');

     // cek apakah ada data di tabel adposi
     $sql = mysqli_query($conn, "SELECT * FROM adopsi");
     if (mysqli_num_rows($sql) === 0){
         $kosong = true;
     }else{
         $ada = true;
     }

    // ambil data adposi
    $sql = "SELECT user.username as nama, kucing.jenis_kucing as jenis, kucing.gambar as gambar, adopsi.alamat as alamat, adopsi.no_telepon as telepon, adopsi.tanggal as tanggal 
    FROM adopsi
    JOIN user on adopsi.id_user = user.id_user
    JOIN kucing on adopsi.id_kucing = kucing.id_kucing
    ORDER BY adopsi.id_adopsi DESC
    ";

    $adopsi = tampil($sql);
    $no = 1;

?>

<!-- hapus data -->
<div class="d-flex justify-content-end container">

    <button type="button" class="btn btn-danger px-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Hapus
    </button>

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
        
      </div>
      <div class="modal-body">
        Dengan menekan hapus semua data akan hilang
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <form action="" method="POST">
            <button type="submit" name="delete" class="btn btn-danger">Hapus</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- hapus data -->


<!-- jika data kosong -->
<?php if (isset($kosong)) : ?>
<h3 class="text-center">Belum Ada Data</h3>
<?php endif ?>
<!-- jika data kosong -->


<!-- jika ada data -->
<?php if (isset($ada)) :?>
<div class="container">

    <div class="table-responsive">
        <table class="table table-bordered text-center my-3">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jenis Kucing</th>
                <th>Gambar</th>
                <th>Alamat</th>
                <th>No Telepon</th>
                <th>Tanggal</th>
            </tr>

            <?php foreach($adopsi as $a):?>
            <tr>
                <td><?=$no++?></td>
                <td><?=$a["nama"]?></td>
                <td><?=$a["jenis"]?></td>
                <td style="width: 15%;">
                    <img src="../../assets/adopsi/<?=$a["gambar"]?>" style="width:100%; float:left">
                </td>
                <td><?=$a["alamat"]?></td>
                <td><?=$a["telepon"]?></td>
                <td><?=$a["tanggal"]?></td>
            </tr>
            <?php endforeach ?>

        </table>
    </div>
</div>
<?php endif?>
<!-- jika ada data -->

<!-- notif hapus data berhasil-->
<?php if (isset($succes)) :?>
<script>
    swal({
        title: "Data Berhasil Dihapus",
        icon: "success",
        button: "OK",
    });
</script>
<?php endif ?>