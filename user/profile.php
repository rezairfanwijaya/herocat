<?php 
    session_start();
    
    require_once('../partial/nav-profile.php');
    
    

    // ambil user yang login
    $id = $_SESSION["id"];
    $query = mysqli_query($conn, "SELECT * FROM user WHERE id_user = $id");
    $user = mysqli_fetch_assoc($query);

    // aktifitas terakhir user
    // donasi
    $sqlDonasi = "SELECT * FROM donasi
                    JOIN user ON donasi.id_user = user.id_user
                    WHERE user.id_user = $id
                    ORDER BY donasi.id_donasi DESC
                    
    ";
    $donasi = tampil($sqlDonasi);

    // adopsi
    $sqlAdopsi = "SELECT kucing.jenis_kucing as jenis, adopsi.tanggal as tanggal FROM adopsi
                    JOIN user ON adopsi.id_user = user.id_user
                    JOIN kucing ON adopsi.id_kucing = kucing.id_kucing
                    WHERE user.id_user = $id
                    ORDER BY adopsi.id_adopsi DESC
                    
    ";
    $adopsi = tampil($sqlAdopsi);
    
    

    // logout
    if (isset($_POST["keluar"])){
        require_once('../session/logout.php');
        header('location:landing.php');
    }
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Profile | <?=$user["username"]?> </title>
</head>
<style>
    body {
        font-family: "Poppins", sans-serif;
        overflow-x: hidden;
        background-color: #F5F5F5;
    }

    html {
        overflow-x: hidden;
        scroll-behavior: smooth;
    }

    .list {
        background-color: #fff;

    }

    .list:hover {
        border: 1px solid #007cfe;
        background-color: #C4DFFC;
        transition: .3s;
    }

    .profilee {
        background-color: #fdae02;
        width: 65px;
        height: 65px;
        margin: 0;
        margin-top: 0;
        margin-bottom: 0;
        border-radius: 100px;
        font-size: 1.3rem;
        font-weight: 700;
        line-height: 65px;
    }

    .kiri {
        width: 100%;
        box-shadow: 2px 1px 10px rgba(0, 0, 0, 10%);
        padding: 10px;
    }

    .kiri:hover {
        box-shadow: 2px 1px 10px rgba(0, 0, 0, 25%);
        border: 1px solid #007cfe;
        background-color: #C4DFFC;
        transition: .3s;
    }

    .utama{
        padding: 0 45px;
    }

    @media (min-width:1023px){
        .kiri {
        width: 26%;
        padding: 40px;
    }
    }
  
        
    
</style>

<body>
    <div class="utama">

        <div class="main d-flex justify-content-evenly align-items-start flex-wrap flex-lg-nowrap py-3 ">

            <div class="kiri d-flex flex-column align-items-center justify-content-center mb-3 mx-4  bg-white"
                style="border-radius:15px">
                <div class="biodata mb-1 d-flex flex-column align-items-center ">
                    <div class="profilee text-center text-white">
                        <?php echo strtoupper(substr($nama,0,1))?>
                    </div>

                    <div class="nama fw-bold mt-3">
                        <?=$user["username"]?>
                    </div>

                    <div class="email  text-muted ">
                        <?=$user["gmail"]?>
                    </div>
                </div>

                <div class="tombol">
                    <div class="tombol d-flex justify-content-center my-3">
                        <a href="../index.php" class="text-decoration-none btn btn-success text-white mx-3"
                            style="background-color:#198754">Beranda</a>
                        <form action="" method="POST">
                            <button class="keluar btn btn-danger" type="button" name="keluar" data-bs-toggle="modal"
                                data-bs-target="#keluar"
                                style="background-color: #dc3545; width:max-content">Keluar</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="kanan mx-3 my-4 my-lg-0 flex-grow-1">
                <!-- Aktifitas Terakhir -->
                <div>
                    <div class="aktifitas">
                        <h3>Aktifitas Terakhir</h3>
                    </div>

                    <?php foreach($donasi as $d):?>
                    <div class="list my-3  shadow-sm rounded-1 p-4">
                        Anda berhasil <b>berdonasi</b> sebesar Rp <?= number_format($d["nominal"],0,',','.') ?> Pada
                        <?=$d["tanggal"]?>
                    </div>
                    <?php endforeach?>

                    <?php foreach($adopsi as $a):?>
                    <div class="list my-3  shadow-sm rounded-1 p-4">
                        Anda berhasil <b>mengadopsi</b> kucing jenis <?=$a["jenis"]?> Pada <?=$a["tanggal"]?>
                    </div>
                    <?php endforeach?>

                </div>
                <!-- Aktifitas Terakhir -->
            </div>
        </div>





        <!-- button -->

        <!-- button -->




        <!-- notif keluar -->
        <div class=" modal fade" id="keluar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Lanjutkan Keluar ?</h5>
                    </div>
                    <form action="" method="POST">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                            <button type="submit" name="keluar" class="btn btn-danger">Ya</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>



</body>

</html>