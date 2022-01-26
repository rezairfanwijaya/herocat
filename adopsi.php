<?php 

    // import function 
    require_once('function/function.php');

    // ambil data kucing
    $cats = tampil("SELECT * FROM kucing ORDER BY id_kucing DESC");
    

    // import navbar
    require_once('partial/nav-adopt.php');

    // import session
    require_once('session/user/session_in.php');

    //import cs
    require_once('partial/cs.php')
    
?>


<div class="container py-5">
    <h1 class="text-center text-primary">Choose <span style="background-color: #FE9A01;"> Your Favorite Cat</span></h1>
    <div class="row">
        <?php foreach($cats as $cat) :?>
        <div class="col-12 col-md-6 col-lg-4 mt-5">
            <div class="card" style="width: 21rem; margin:auto; background-color:#C9E4FF; border:0">
                <img src="assets/adopsi/<?=$cat["gambar"]?>" class="card-img-top" alt="...">
                <div class="card-body text-center py-4">
                    <h5 class="card-title mb-4"><?=$cat["jenis_kucing"]?></h5>

                    <?php if ($cat["stok"] === "0") :?>
                    <div class="btn btn-secondary px-4 "style="font-size: 1.2rem;">stok kosong</div>

                    <?php else :?>
                    <a href="detail-adopsi.php?id=<?=$cat["id_kucing"]?>" class="btn btn-primary px-4"
                        style="font-size: 1.2rem;">Adopsi</a>
                    <?php endif?>

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