<?php 
require_once('partial/nav-detail-news.php');
require_once('function/function.php');
$id = $_GET["id"];

$articles = tampil("SELECT * FROM berita WHERE not id_berita = $id limit 3");


$query = mysqli_query($conn, "SELECT * FROM berita WHERE id_berita = $id ");
$article = mysqli_fetch_assoc($query);

$tanggal = date('d F Y', strtotime($article["tanggal"]));

?>

<style>
    .lainnya {
        box-shadow: 2px 3px 15px rgba(0, 0, 0, 10%);
    }

    .lainnya:hover {
        box-shadow: 2px 3px 15px rgba(0, 0, 0, 30%);
    }
    .content{
        width: 90%;
        text-align: justify;
        line-height: 33px;
    }
</style>

<div class="container-fluid px-md-5 py-2 d-flex justify-content-between flex-lg-nowrap flex-wrap ">

    <div class="side-kiri d-flex flex-column flex-grow-1 px-2" >
        <!-- gambar -->
        <div class="gambar my-3">
            <img src="assets/artikel/<?=$article["gambar"]?>" alt="gambar"
                style="width: 70%; display:grid; margin:auto;">
        </div>
        <!-- gambar -->

        <!-- judul -->
        <div class="judul mt-4">
            <h3><?=$article["judul"]?></h3>
            <p class="text-muted">Oleh Admin, <?=$tanggal?></p>
        </div>
        <!-- judul -->


        <!-- konten -->
        <div class="content mt-4">
            <?=$article["konten"]?>
        </div>
        <!-- konten -->
    </div>

    <div class="side-kanan ">
        <div class="sub-judul mt-3">
            Arikel Lainnnya
        </div>

        <div class="berita d-flex flex-md-column justify-content-md-around flex-wrap">
            <?php foreach ($articles as $item):?>
            <div class="card lainnya my-3 mx-sm-2" style="width: 18rem; margin: 0 auto">
                <img src="assets/artikel/<?=$item["gambar"]?>" class="card-img-top" alt="image">
                <div class="card-body">
                    <a href="detail-artikel.php?id=<?=$item["id_berita"]?>">
                        <h5 class="card-title text-center my-4 text-dark"><?= $item["judul"]?></h5>
                    </a>
                </div>
            </div>
            <?php endforeach?>
        </div>
    </div>

</div>



<?php require_once('partial/footer.php')?>