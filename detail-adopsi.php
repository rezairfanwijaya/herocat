<link href="css/detail-adopsi.css" rel=stylesheet>
<link href="css/index.css" rel=stylesheet>
<link href="lib/node_modules/bootstrap/dist/css/bootstrap.min.css" rel=stylesheet>
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />



<?php 

    // function
    require_once('function/function.php');
    require_once('partial/nav-detail-adopt.php');
    require_once('partial/cs.php');

    $id_user = $_SESSION['id'];
    $id_kucing = $_GET["id"];


    $cat = tampil("SELECT * FROM kucing WHERE id_kucing = $id_kucing")[0];

    // cek ketika tombol adopsi di klik
    if (isset($_POST["adopsi"])){
        // save data ke db dan muncul notif
        if (adopsi($_POST)>0){
            $succes = true;
        }else{
            $failed = true;
        }
    }
    
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
        <form action="" method="POST">
            <!-- id user -->
            <input type="hidden" name="id_user" value="<?=$id_user?>">
            <!-- id kucing -->
            <input type="hidden" name="id_kucing" value="<?=$id_kucing?>">
            <div class="mb-5">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" placeholder="ex: John Cena" class="form-control" id="nama" required>
            </div>
            <div class="mb-5">
                <label for="telpon" class="form-label">No. Telepon</label>
                <input type="number" name="telpon" placeholder="ex: 0838xxxxxx" class="form-control" id="telpon" required>
            </div>
            <div class="mb-5">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" name="alamat" placeholder="ex: Jakarta" class="form-control" id="alamat" required>
            </div>

            <button class="btn btn-primary adopsi" name="adopsi" type="submit">Adposi Sekarang</button>
        </form>
        <!-- form adopsi -->
    </div>
</div>



<!-- notif adopsi berhasil-->
<?php if (isset($succes)) :?>
<script>
    swal({
        title: "Adopsi Berhasil",
        icon: "success",
        button: "OK",
    })
    .then((adopsi)=>{
        location.href='user/profile.php'
    });
</script>
<?php endif ?>

<!-- notif adopsi gagal-->
<?php if (isset($failed)) :?>
<script>
    swal({
        title: "Adopsi Gagal",
        icon: "error",
        button: "OK",
    });
</script>
<?php endif ?>





<?php require_once('partial/footer.php');?>
<!-- AOS -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>