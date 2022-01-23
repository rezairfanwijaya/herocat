<link href="css/donasi.css" rel="stylesheet">
<link href="css/index.css" rel=stylesheet>
<link href="lib/node_modules/bootstrap/dist/css/bootstrap.min.css" rel=stylesheet>
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">

<?php 
    // import navbar
    require_once('partial/nav-donate.php');

    require_once('partial/cs.php');

    // id user
    $id_user = $_SESSION["id"];

    if (isset($_POST["donasi"])){
        if (donasi($_POST)>0){
            $succes = true;
        }else{
            $failed = true;
        }
    }
?>

<div class="container-fluid my-4">
    <!-- header -->
    <div class="header">
        <p class="text-center text-primary">Let's Don<span>ate for cats!!!</span></p>
    </div>
    <!-- header -->

    <!-- hero -->
    <div class="hero">
        <img src="assets/img/hero-donasi.png" alt="hero" class="img-fluid">

        <p class="text-center">We will use your donation to meet the cat's needs such as shelter, food, vitamins,
            clinics and others for the street cats we take care of.</p>
    </div>
    <!-- hero -->

    <!-- form  -->
    <form action="" method="POST" class="my-5">

        <!-- id user -->
        <input type="hidden" name="id_user" value="<?=$id_user?>">

        <!-- nama -->
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" name="nama" placeholder="ex: John Cena" class="form-control" id="nama" autocomplete="off"
                required>
        </div>

        <!-- telpon -->
        <div class="mb-3">
            <label for="telpon" class="form-label">Nomor Telpon</label>
            <input type="number" name="telpon" placeholder="ex: 0838xxxxxx" class="form-control" id="telpon"
                autocomplete="off" required>
        </div>

        <!-- nominal -->
        <div class="mb-3">
            <label for="nominal" class="form-label">Nominal Donasi</label>
            <input type="number" name="nominal" class="form-control" id="nominal"  autocomplete="off" required>
        </div>

        <!-- rekening tujuan -->
        <div class="mb-4">
            <label for="norek" class="form-label">Rekening Tujuan</label>
            <input type="text" readonly name="norek" class="form-control" id="norek" value="08343437346"
                autocomplete="off">
        </div>


        <!-- metode pembayaran -->
        <p class="mt-5 metode-bayar">* Pilih metode pembayaran</p>
        <!-- BRI -->
        <div class="mb-3 bri metode">
            <img src="assets/img/BRI.png">
            <input type="radio" name="metode" value="bri" autocomplete="off">
        </div>

        <!-- bni -->
        <div class="mb-3 bni metode">
            <img src="assets/img/BNI.png">
            <input type="radio" name="metode" value="bni" autocomplete="off">
        </div>

        <!-- bca -->
        <div class="mb-5 bca metode">
            <img src="assets/img/BCA.png">
            <input type="radio" name="metode" value="bca" autocomplete="off">
        </div>

        <button type="submit" name="donasi" class="btn donasi btn-primary px-5">Donasi</button>
    </form>
    <!-- form  -->
</div>


<!-- notif donasi berhasil-->
<?php if (isset($succes)) :?>
<script>
    swal({
        title: "Donasi Berhasil",
        icon: "success",
        button: "OK",
    })
    .then((donasi)=>{
        location.href='user/profile.php'
    });
</script>
<?php endif ?>

<!-- notif donasi gagal-->
<?php if (isset($failed)) :?>
<script>
    swal({
        title: "Donasi Gagal",
        icon: "error",
        button: "OK",
    });
</script>
<?php endif ?>





<!-- footer -->
<?php require_once('partial/footer.php');?>