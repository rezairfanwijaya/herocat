<?php

error_reporting(0);
require_once('../../partial/admin.php');
require_once('../../function/function.php');

// proses save data
if (isset($_POST["simpan"])) {
    if (addData($_POST) > 0 ){
        $succes= true;
    }else{
        $failed= true;
    }
}

// pengecekan apakah data di db kosong atau tidak
$query = mysqli_query($conn, "SELECT * FROM kucing");
if (mysqli_num_rows($query) === 0) {
    $kosong = true;
} else {
    $ada = true;
}

// tampil data
$cats = tampil("SELECT * FROM kucing");

$no = 1;

// proses cari data
if (isset($_POST["btn-cari"])){
    $key = $_POST["keyword"];
    // jika data ditemukan
    if ($cats = cari($key)){
        $cats = cari($key);
        // $sqlTotal = mysqli_query($conn,$cats);
    }else{
        // jika data tidak ditemukan
        $noMatch = true;

        $cats = tampil("SELECT * FROM kucing");
    }
}



// menghitung jumlah data umum
$sqlTotal = mysqli_query($conn, "SELECT COUNT(id_kucing) as total FROM kucing");

$res = mysqli_fetch_assoc($sqlTotal);




?>


<!-- ############################################################################# -->


<div class="container">
    <div class="head mt-5">
        <!-- Modal tambah produk -->
        <div class="tambah-produk ">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fas fa-plus-square"></i> Tambah Produk
            </button>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                    <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                        <span style="font-size: 20px;">
                            <i class="fas fa-times-circle"></i>
                        </span>
                    </button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="px-3">
                        <div class="mb-3">
                            <label for="jenis" class="form-label">Jenis Kucing</label>
                            <input type="text" class="form-control" id="jenis" name="jenis" autocomplete="off" required>
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi Kucing</label>
                            <textarea name="deskripsi" autocomplete="off" required id="deskripsi"
                                class="form-control"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="number" class="form-control" id="stok" name="stok" value="1" readonly
                                autocomplete="off" required>
                        </div>

                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control-file" id="gambar" name="gambar" autocomplete="off"
                                required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal tambah produk -->



    <!-- field tampil data -->

    <!-- jika data kosong -->
    <?php if (isset($kosong)) : ?>
    <h3 class="text-center">Belum Ada Data</h3>
    <?php endif ?>
    <!-- jika data kosong -->

    <!-- jika data tidak kosong -->
    <?php if (isset($ada)) : ?>

    <!-- sub header -->
    <div class="sub-header mt-5 mb-3 container d-flex justify-content-end">

        <!-- cari -->
        <form action="" method="POST">
            <div>
                <input type="text" name="keyword" placeholder="Cari berdasarkan jenis dan stok" autocomplete="off">
            </div>
            <div>
                <button name="btn-cari" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
        <!-- cari -->
    </div>

    <!-- subheader -->



    <div class="table-responsive container">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis</th>
                    <th>Gambar</th>
                    <th>Deskripsi</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <?php foreach ($cats as $cat) : ?>

            <tr>
                <div class="isi-tabel">
                    <td><?= $no++ ?></td>
                    <td><?= $cat["jenis_kucing"] ?></td>
                    <td>
                        <img src="../../assets/adopsi/<?= $cat["gambar"] ?>" width="160px">
                    </td>
                    <td class="desc"><?= $cat["deskripsi_kucing"] ?></td>
                    <td><?= $cat["stok"] ?></td>
                    <td>
                        <form action="" method="POST">

                            <!-- id kucing -->
                            <input type="hidden" name="id" value="<?=$cat["id_kucing"]?>">

                            <!-- tombol edit -->
                            <a href="edit.php?id=<?=$cat["id_kucing"]?>" class="text-decoration-none">
                                <button type="button" class="btn btn-success mx-3" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </a>

                            <!-- tombol hapus -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal<?=$cat["id_kucing"]?>" data-bs-placement="bottom">
                                <i class="fas fa-trash-alt"></i>
                            </button>

                        </form>
                    </td>
                </div>
            </tr>

            <div class="modal fade" id="deleteModal<?=$cat["id_kucing"]?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin ?</h5>
                        </div>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?=$cat["id_kucing"]?>">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                <button type="submit" name="hapus" class="btn btn-danger">Ya</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php endforeach ?>
        </table>
    </div>
    <?php endif ?>
    <!-- jika data tidak kosong -->
    <!-- field tampil data -->



</div>



<!-- enable toolpip -->
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>


<!-- notif save data berhasil-->
<?php if (isset($succes)) :?>
<script>
    swal({
        title: "Kucing Berhasil Ditambahkan",
        icon: "success",
        button: "OK",
    });
</script>
<?php endif ?>

<!-- notif save data gagal-->
<?php if (isset($failed)) :?>
<script>
    swal({
        title: "Kucing Gagal Ditambahkan",
        icon: "error",
        button: "OK",
    });
</script>
<?php endif ?>


<!-- notif jika data search tidak cocok -->
<?php if (isset($noMatch)) :?>
<script>
    swal({
        title: "Data Tidak Ditemukan",
        text: "Periksa kata kunci anda!",
        icon: "warning",
        button: "OK",
    });
</script>
<?php endif ?>