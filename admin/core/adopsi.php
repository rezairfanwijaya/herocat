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
    // print_r($adopsi);

?>


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
