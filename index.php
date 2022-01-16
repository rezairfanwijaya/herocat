<?php
// import session
require_once('session/user/session_in.php');

// import navbar
require_once("partial/nav.php");

// import function
require_once("function/function.php");

// tampilkan data kucing adposi
$cats = tampil("SELECT * FROM kucing LIMIT 3");

// cek apakah tombol cari sudah di klik
if (isset($_POST["btn-cari"])){
    $key = $_POST["cari"];
    if($cats = cariDataUser($key)){
        $cats = cariDataUser($key);
    }else{
        $notfound =true;
    }
}

$articles = tampil("SELECT * FROM berita");
?>

<!-- CS -->
<a href="#" class="text-decoration-none">
    <div class="help" data-aos="fade-up" data-aos-delay="50" data-aos-duration="2000">
        <img src="assets/img/help.png">
    </div>
</a>
<!-- CS -->

<!-- adopsi -->
<section class="main container-fluid">
    <p class="title-section">Adopsi</p>
    <div class="row adopsi">
        <?php foreach ($cats as $cat) : ?>
        <div class="col-12 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1000">
            <div class="card" style="width: 18rem;">
                <img src="assets/adopsi/<?= $cat["gambar"] ?>" class="card-img-top" alt="anggora">
                <div class="card-body">
                    <h5 class="card-title my-4 text-center"><?= $cat["nama_kucing"] ?></h5>
                    <a href="#" class="btn text-white ">Adopsi</a>
                </div>
            </div>
        </div>
        <?php endforeach ?>
    </div>
</section>
<!-- adopsi -->

<!-- tampilan cari data tidak ditemukan -->
<?php if (isset($notfound)) :?>
<div class="error-search d-flex flex-column justify-content-center align-items-center">
    <img src="assets/img/datanotfound.png" class="img-fluid" width="400">
    <p style="color: #353535; margin-bottom:100px">Data tidak ditemukan. Periksa kata kunci anda</p>
</div>
<?php endif ?>
<!-- tampilan cari data tidak ditemukan -->


<!-- donasi -->
<section class="main container-fluid">
    <p class="title-section">Donasi</p>
    <div class="row">
        <div class="col-12 donasi">
            <div class="card">
                <img src="assets/img/donation.png" class="card-img-top donasi" alt="anggora">
                <div class="card-body">
                    <h5 class="card-title my-4 text-center donasi">Kepedulian Anda akan nasib kucing jalanan dapat
                        disalurkan dengan memberikan donasi untuk kucing jalanan</h5>
                    <a href="#" class="btn donasi">Donate now</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- donasi -->



<!-- artikel -->
<section class="main container-fluid">

    <p class="title-section">Artikel</p>
    <div class="row">
        <?php foreach ($articles as $article) : ?>
        <div class="col-12 col-md-6" >
            <div class="card artikel" style="width: 18rem;">
                <img src="assets/artikel/<?=$article["gambar"]?>" class="card-img-top" alt="trik">
                <div class="card-body">
                    <h5 class="card-title my-4 "><?= $article["judul"]?></h5>
                    <a href="#" class="text-decoration-none read">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
        <?php endforeach ?>
    </div>

</section>
<!-- artikel -->

<?php
require_once("partial/footer.php");
?>

</body>

</html>