<?php 
    require_once('../../partial/admin.php');
    require_once('../../function/function.php');
    error_reporting(0);

  

    // cek apakah artikel sudah ada atau belum
    $artikel = mysqli_query($conn, "SELECT * FROM berita");
    if (mysqli_num_rows($artikel) === 0){
        $noArticle = true;
    }
    
    // upload artikel
    if (isset($_POST["simpan"])){
        
        if (addArticles($_POST)>0){
            $success = true;
        }else{
            $failed = true;
        }
    }

      // menampilkan seluruh artikel
      $articles = tampil("SELECT * FROM berita");

    // cari artikel
    if (isset($_POST["btn-cari"])){
        $key = $_POST["keyword"];

        if($articles = cariDataArtikel($key)){
            $articles = cariDataArtikel($key);
        }else{
            // jika data tidak ditemukan
            $noMatch = true;
            $articles = tampil("SELECT * FROM berita");
        }
    }

    
    

?>


<div class="container my-5">

    <form action="" method="POST" enctype="multipart/form-data" class="mb-5">
        <label for="judul">Judul Artikel</label>
        <input type="text" id="judul" name="judul" placeholder="Masukan judul artikel disini" class="form-control mb-4"
            autocomplete="off" required>
        <textarea name="artikel" id="mytextarea" placeholder="Tulis isi artikel disini" autocomplete="off"></textarea>

        <label for="gambar" class="mt-4">Pilih gambar sebagai header </label>
        <input type="file" name="gambar" class="form-control-file ">

        <button name="simpan" type="submit" class="btn btn-success mt-4 mb-5">Upload</button>
    </form>


    <!--  serach bar -->
    <div class="sub-header d-flex justify-content-end align-items-center mb-4">

        <form action="" method="POST">
            <div>
                <input type="text" name="keyword" placeholder="Masukan judul artikel" autocomplete="off">
            </div>
            <div>
                <button name="btn-cari" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>

    </div>
    <!--  serach bar -->


    <!-- list artikel yang sudah diupload -->
    <div class="row d-flex justify-content-center">
        <?php foreach ($articles as $artikel) :?>
        <div class="col-12 col-md-6 col-lg-6  my-2" style="width:max-content">
            <div class="card artikel">
                <img src="../../assets/artikel/<?=$artikel["gambar"]?>" class="card-img-top" alt="gambar" height="auto">
                <div class="card-body my-3">
                    <div class="d-flex justify-content-between mb-3">
                        <a href="detail-artikel.php?id=<?=$artikel["id_berita"]?>">
                            <h5 class="card-title text-dark"><b><?=$artikel["judul"]?></b></h5>
                        </a>

                        <p>Dibuat pada : <?=date('d F Y', strtotime($artikel["tanggal"]))?></p>
                    </div>
                    <div class="aksi">
                        <!-- Tombol -->
                        <form action="" method="POST">
                            <div class="d-flex justify-content-end">
                                <!-- lihat -->
                                <a href="detail-artikel.php?id=<?=$artikel["id_berita"]?>"
                                    class="btn btn-success text-white px-4">Lihat</a>

                                <!-- tombol edit -->
                                <a href="edit-artikel.php?id=<?=$artikel["id_berita"]?>" class="text-decoration-none">
                                    <button type="button" class="btn btn-primary mx-3" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </a>

                                <!-- tombol hapus -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal<?=$artikel["id_berita"]?>" data-bs-placement="bottom">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </form>
                        <!-- Tombol -->
                    </div>

                    <!-- notif konfirmasi hapus -->
                    <div class="modal fade" id="deleteModal<?=$artikel["id_berita"]?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin ?</h5>
                                </div>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?=$artikel["id_berita"]?>">
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tidak</button>
                                        <button type="submit" name="hapus-artikel" class="btn btn-primary">Ya</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- notif konfirmasi hapus -->
                </div>
            </div>
        </div>
        <?php endforeach ?>
    </div>
    <!-- list artikel yang sudah diupload -->

    <!-- jika artikel masih kosong -->
    <?php if (isset($noArticle)) :?>
    <div class="d-flex jutify-content-center align-items-center flex-column mt-5">
        <img src="../../assets/img/dataArtikelKosong.png" class="img-fluid" width="300">
        <p>Tidak Ada Artikel</p>
    </div>
    <?php endif ?>
    <!-- jika artikel masih kosong -->

</div>


<!-- enable toolpip -->
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>


<!-- notif save data berhasil-->
<?php if (isset($success)) :?>
<script>
    swal({
        title: "Artikel Berhasil Ditambahkan",
        icon: "success",
        button: "OK",
    });
</script>
<?php endif ?>

<!-- notif save data gagal-->
<?php if (isset($failed)) :?>
<script>
    swal({
        title: "Artikel Gagal Ditambahkan",
        icon: "error",
        button: "OK",
    });
</script>
<?php endif ?>


<!-- notif jika data search tidak cocok -->
<?php if (isset($noMatch)) :?>
<script>
    swal({
        title: "Artikel Tidak Ditemukan",
        text: "Periksa kata kunci anda!",
        icon: "warning",
        button: "OK",
    });
</script>
<?php endif ?>

<!-- notif berhasil hapus artikel -->
<?php if (isset($hapusSuccess)) :?>
<script>
    swal({
        title: "Artikel Berhasil Dihapus",
        icon: "success",
        button: "OK",
    });
</script>
<?php endif ?>