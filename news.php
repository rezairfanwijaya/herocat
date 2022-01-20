<?php

    // import function
    require_once('function/function.php');

    // ambil data artikel
    $articles = tampil("SELECT * from berita");

    // import nav
    require_once('partial/nav-news.php');


    // import cs
    require_once('partial/cs.php');

    
?>

<div class="container">
    <h1 class="text-primary text-center my-5">Arti<span style="background-color: #FE9A01;">kel</span></h1>
    <div class="row">
        <?php foreach($articles as $article) :?>
        <div class="col-12 col-md-6 col-lg-6 mt-5">
            <div class="card artikel" style="width: 95%; margin:auto; background-color:#C9E4FF; border: 0">
                <img src="assets/artikel/<?=$article["gambar"]?>" class="card-img-top" alt="...">
                <div class="card-body py-5">
                    <a href="#">
                        <h5 class="card-title mb-4 text-dark"><?=$article["judul"]?></h5>
                    </a>
                    <p class="text-muted">Pada : <?=$article["tanggal"]?></p>
                    <a href="#" style="font-size: 0.9rem; float:right">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
        <?php endforeach?>
    </div>
</div>

<!-- tampilan cari data tidak ditemukan -->
<?php if (isset($notfound)) :?>
<div class="error-search d-flex flex-column justify-content-center align-items-center">
    <img src="assets/img/datanotfound.png" class="img-fluid" width="400">
    <p style="color: #353535; margin-bottom:100px">Data tidak ditemukan. Periksa kata kunci anda</p>
</div>
<?php endif ?>
<!-- tampilan cari data tidak ditemukan -->

<?php 
require_once('partial/footer.php');
?>