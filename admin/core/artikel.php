<?php 
    require_once('../../partial/admin.php');
    require_once('../../function/function.php');
    error_reporting(0);

    // menampilkan seluruh artikel
    $articles = tampil("SELECT * FROM berita");

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
        <label>Judul Artikel</label>
        <input type="text" name="judul" placeholder="Masukan judul artikel disini" class="form-control mb-4"
            autocomplete="off">
        <textarea name="artikel" id="mytextarea" placeholder="Tulis isi artikel disini" autocomplete="off"></textarea>
        <input type="file" name="gambar" class="form-control mt-4">

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
        <div class="col-12 col-md-6 col-lg-3  my-2" style="width:max-content">
            <div class="card" style="width: auto;">
                <img src="../../assets/artikel/<?=$artikel["gambar"]?>" class="card-img-top" alt="gambar">
                <div class="card-body">
                    <h5 class="card-title"><?=$artikel["judul"]?></h5>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
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


<!-- notif save data berhasil-->
<?php if (isset($succes)) :?>
<script>
    swal({
        title: "Data Berhasil Ditambahkan",
        icon: "success",
        button: "OK",
    });
</script>
<?php endif ?>

<!-- notif save data gagal-->
<?php if (isset($failed)) :?>
<script>
    swal({
        title: "Data Gagal Ditambahkan",
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