<?php
require_once('../../partial/admin.php');
require_once('../../function/function.php');

// total arikel
$sqlArtikel = mysqli_query($conn,"SELECT COUNT(id_berita) as total FROM berita");
$totalArtikel = mysqli_fetch_assoc($sqlArtikel)["total"];

// total pengguna
$sqlUser = mysqli_query($conn,"SELECT COUNT(id_user)-1 as total FROM user");
$totalUser = mysqli_fetch_assoc($sqlUser)["total"];

// total dinasi
$sqlDonasi = mysqli_query($conn, "SELECT SUM(nominal) as total from donasi");
$totalDonasi = mysqli_fetch_assoc($sqlDonasi);





?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- total pengguna -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
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
        </div>

        <!-- total donasi -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Donasi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?=number_format($totalDonasi["total"],0,',','.')?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- total adopsi -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Total Adopsi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">600 Ekor</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-cat fa-2x text-gray-300"></i>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- total artikel -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
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
        </div>

    </div>
</div>