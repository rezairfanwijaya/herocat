<link href="css/detail-adopsi.css" rel=stylesheet>
<link href="lib/node_modules/bootstrap/dist/css/bootstrap.min.css" rel=stylesheet>



<?php 

    // function
    require_once('function/function.php');
    $id = $_GET["id"];

    $cat = tampil("SELECT * FROM kucing WHERE id_kucing = $id")[0];
    
    
?>


<div class="container-fluid">
    <!-- gambar kucing -->
    <div class="gambar-kucing my-4">
        <img src="assets/adopsi/<?=$cat["gambar"]?>" alt="gambar-kucing">
    </div>

    <!-- jenis kucing -->
    <div class="jenis-kucing my-5">
        <p class="text-center text-primary mx-auto"><?=$cat["jenis_kucing"]?></p>
    </div>

    <div class="cover">
        <!-- deskripsi kucing -->
        <div class="deskripsi-kucing">
            <p class="judul mt-5">Deskripsi</p>
            <p class="deskripsi"><?=$cat["deskripsi_kucing"]?></p>
            <p class="warning my-5">*biaya penanganan Rp.200.000,00 bayar ditempat saat pengambilan kucing</p>
        </div>
        <!-- deskripsi kucing -->


        <!-- form adopsi -->
        <form>
            <div class="mb-5">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" placeholder="ex: John Cena" class="form-control" id="nama">
            </div>
            <div class="mb-5">
                <label for="telpon" class="form-label">No. Telpon</label>
                <input type="number" name="no-telp" placeholder="ex: 0838xxxxxx" class="form-control" id="telpon">
            </div>
            <div class="mb-5">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" name="alamat" placeholder="ex: Jakarta" class="form-control" id="telpon">
            </div>
            
            <button class="btn btn-primary adopsi" name="adopsi" type="submit">Adposi Sekarang</button>
        </form>
        <!-- form adopsi -->
    </div>




</div>