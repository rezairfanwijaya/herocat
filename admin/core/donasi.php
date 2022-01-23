<?php 
    require_once('../../partial/admin.php');

    // cek apakah ada data di tabel donasi
    $sql = mysqli_query($conn, "SELECT * FROM donasi");
    if (mysqli_num_rows($sql) === 0){
        $kosong = true;
    }

    // ambil data donasi
    $sql = "SELECT user.username as nama , donasi.no_telpon as telpon, donasi.nominal as nominal, donasi.bank as bank, donasi.tanggal as tanggal 
            FROM donasi
            JOIN user on donasi.id_user = user.id_user
            ORDER BY donasi.id_donasi DESC
    ";

    $donasi = tampil($sql);
    $no = 1;

    // total donasi
    // total dinasi
    $sqlDonasi = mysqli_query($conn, "SELECT SUM(nominal) as total from donasi");
    $totalDonasi = mysqli_fetch_assoc($sqlDonasi);


   
?>

<!-- jika data kosong -->
<?php if (isset($kosong)) : ?>
<h3 class="text-center">Belum Ada Data</h3>
<?php endif ?>
<!-- jika data kosong -->

<!-- jika ada data -->
<div class="container">
    <h5 class="mt-5">Total Donasi :Rp <?=number_format($totalDonasi["total"],0,',','.')?> </h5>
    <div class="table-responsive">
        <table class="table table-bordered text-center my-3">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>No Telepon</th>
                <th>Donasi</th>
                <th>Bank</th>
                <th>Tanggal</th>
            </tr>

            <?php foreach($donasi as $d):?>
            <tr>
                <td><?=$no++?></td>
                <td><?=$d["nama"]?></td>
                <td><?=$d["telpon"]?></td>
                <td>Rp <?= number_format($d["nominal"],0,',', '.') ?></td>
                <td><?=$d["bank"]?></td>
                <td><?=$d["tanggal"]?></td>
            </tr>
            <?php endforeach ?>

        </table>
    </div>
</div>
<!-- jika ada data -->