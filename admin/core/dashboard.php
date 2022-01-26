<?php
require_once('../../partial/admin.php');
require_once('../../function/function.php');

// total arikel
$sqlArtikel = mysqli_query($conn,"SELECT COUNT(id_berita) as total FROM berita");
$totalArtikel = mysqli_fetch_assoc($sqlArtikel)["total"];

// total pengguna
$sqlUser = mysqli_query($conn,"SELECT COUNT(id_user)-1 as total FROM user");
$totalUser = mysqli_fetch_assoc($sqlUser)["total"];

// total donasi
$sqlDonasi = mysqli_query($conn, "SELECT SUM(nominal) as total from donasi");
$totalDonasi = mysqli_fetch_assoc($sqlDonasi);

// total adopsi
$sqlDonasi = mysqli_query($conn, "SELECT COUNT(id_adopsi) as total from adopsi");
$totalAdopsi = mysqli_fetch_assoc($sqlDonasi);

// total kucing
$sqlKucing = mysqli_query($conn, "SELECT COUNT(id_kucing) as total from kucing");
$totalKucing = mysqli_fetch_assoc($sqlKucing);


// cek apakah data pengguna ada
$data = mysqli_query($conn, "SELECT * FROM user where level = 'user' ");
if (mysqli_num_rows($data)>0){
    $adaPengguna = true;
}else{
    $kosongPengguna = true;
}

// memunculkan data pengguna
$user = tampil("SELECT * FROM user WHERE level NOT LIKE '%admin%' ORDER BY id_user DESC");
$noPengguna = 1;


 // cek apakah ada data di tabel donasi
 $sqlDataDonasi = mysqli_query($conn, "SELECT * FROM donasi");
 if (mysqli_num_rows($sqlDataDonasi) === 0){
     $kosongDonasi = true;
 }else{
     $adaDonasi = true;
 }
 $noDonasi = 1;

   // ambil data donasi
   $sqlJoinDonasi = "SELECT user.username as nama , donasi.no_telpon as telpon, donasi.nominal as nominal, donasi.bank as bank, donasi.tanggal as tanggal 
   FROM donasi
   JOIN user on donasi.id_user = user.id_user
   ORDER BY donasi.id_donasi DESC
";

$donasi = tampil($sqlJoinDonasi);


  // cek apakah ada data di tabel adposi
  $sqladopsi = mysqli_query($conn, "SELECT * FROM adopsi");
  if (mysqli_num_rows($sqladopsi) === 0){
      $kosongAdopsi = true;
  }else{
      $adaAdopsi = true;
  }

      // ambil data adposi
      $sqlAdopsi = "SELECT user.username as nama, kucing.jenis_kucing as jenis, kucing.gambar as gambar, adopsi.alamat as alamat, adopsi.no_telepon as telepon, adopsi.tanggal as tanggal 
      FROM adopsi
      JOIN user on adopsi.id_user = user.id_user
      JOIN kucing on adopsi.id_kucing = kucing.id_kucing
      ORDER BY adopsi.id_adopsi DESC
      ";
  
      $adopsi = tampil($sqlAdopsi);
      $noAdopsi = 1;
?>
<style>
    .card {
        border: 0;
        box-shadow: 1px 1px 12px rgba(0, 0, 0, 10%);
    }

    .card:hover {
        box-shadow: 6px 6px 18px rgba(0, 0, 0, 13%);
    }
</style>



<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="cetak.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div> -->

    <!-- Content Row -->
    <div class="row mb-5">

        <!-- total pengguna -->

        <div class="col-xl-3 col-md-6 mb-4">
            <a href="pengguna.php" class="text-decoration-none">
                <div class="card border-left-primary h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Pengguna Terdaftar</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$totalUser?> Pengguna</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>


        <!-- total donasi -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="donasi.php" class="text-decoration-none">
                <div class="card border-left-success h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Donasi</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp
                                    <?=number_format($totalDonasi["total"],0,',','.')?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- total adopsi -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="adopsi.php" class="text-decoration-none">
                <div class="card border-left-warning h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Total Adopsi</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$totalAdopsi["total"]?> Ekor
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-cat fa-2x text-gray-300"></i>

                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- total artikel -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="artikel.php" class="text-decoration-none">
                <div class="card border-left-danger h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Total Artikel</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$totalArtikel?> Artikel</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- total artikel -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="produk.php" class="text-decoration-none">
                <div class="card border-left-danger h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Total Kucing</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$totalKucing["total"]?> Ekor
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-cat fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </div>
    <hr class="mb-5">
    <!-- data pengguna -->
    <div class="table-responsive bg-white shadow-sm rounded-3 p-5 mb-5">

        <div class="head d-flex ">
            <h1 class="h3 mb-0 text-gray-800 mr-3">Pengguna</h1> <i class="fas fa-users fa-2x text-gray-300"></i>
        </div>

        <!-- jika ada -->
        <?php if (isset($adaPengguna)) :?>
        <table class="table table-bordered text-center my-3">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Gmail</th>
                <th>Tanggal Bergabung</th>
            </tr>
            <?php foreach ($user as $u) :?>
            <tr>
                <th><?=$noPengguna++?></th>
                <th><?=$u["username"]?></th>
                <th><?=$u["gmail"]?></th>
                <td><?=date('d F Y', strtotime($u["tanggal"]))?></td>
            </tr>
            <?php endforeach;?>
        </table>
        <?php endif ?>

        <!-- jika tidak ada -->

        <!-- jika data kosong -->
        <?php if (isset($kosongPengguna)) : ?>
        <h3 class="text-center">Belum Ada Data Pengguna</h3>
        <?php endif ?>
        <!-- jika data kosong -->
    </div>

    <!-- data pengguna -->


    <!-- data donasi -->
    <div class="table-responsive bg-white shadow-sm rounded-3 p-5 mb-5">

        <div class="head d-flex ">
            <h1 class="h3 mb-0 text-gray-800 mr-3">Donasi</h1>
            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
        </div>

        <!-- jika data kosong -->
        <?php if (isset($kosongDonasi)) : ?>
        <h3 class="text-center">Belum Ada Data Donasi</h3>
        <?php endif ?>
        <!-- jika data kosong -->

        <?php if (isset($adaDonasi)):?>
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
                <td><?=$noDonasi++?></td>
                <td><?=$d["nama"]?></td>
                <td><?=$d["telpon"]?></td>
                <td>Rp <?= number_format($d["nominal"],0,',', '.') ?></td>
                <td><?=$d["bank"]?></td>
                <td><?=$d["tanggal"]?></td>
            </tr>
            <?php endforeach ?>

        </table>
        <?php endif?>

    </div>
    <!-- data donasi -->

    <!-- data adopsi -->
    <div class="table-responsive bg-white shadow-sm rounded-3 p-5 mb-5">

        <div class="head d-flex ">
            <h1 class="h3 mb-0 text-gray-800 mr-3">Adopsi</h1>
            <i class="fas fa-cat fa-2x text-gray-300"></i>
        </div>

        <!-- jika data kosong -->
        <?php if (isset($kosongAdopsi)) : ?>
        <h3 class="text-center">Belum Ada Data Adopsi</h3>
        <?php endif ?>
        <!-- jika data kosong -->

        <?php if (isset($adaAdopsi)):?>
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
                <td><?=$noAdopsi++?></td>
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
        <?php endif?>

    </div>
    <!-- data adopsi -->

</div>