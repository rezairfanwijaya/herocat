<?php 
 require_once('../../partial/admin.php');
 require_once('../../function/function.php');
 error_reporting(0);

//  ambil id
$id = $_GET["id"];


// ambil data dari db 
$query = mysqli_query($conn, "SELECT * FROM berita WHERE id_berita = $id");
$artikel = mysqli_fetch_assoc($query);


?>

<div class="container my-3">

    <!-- thumbnail -->
    <img src="../../assets/artikel/<?=$artikel["gambar"]?>" width="800" class="mx-auto img-fluid"
        style="display: grid;">

    <!-- judul -->
    <div class="my-5">
        <h1 class=""> <b><?=$artikel["judul"]?></b> </h1>
        <p>Diposting pada <?=$artikel["tanggal"]?></p>
    </div>

    <!-- isi konten -->
    <article>
        <?=$artikel["konten"]?>
    </article>
    


</div>