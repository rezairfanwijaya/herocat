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
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap");
body {
    font-family: "Poppins", sans-serif;
    overflow-x: hidden;
}

html {
    overflow-x: hidden;
    scroll-behavior: smooth;
}
    body {
        background-color: #F5F5F5;
    }

    .list {
        background-color: #fff;

    }

    .list:hover {
        border: 1px solid #007cfe;
        background-color: #C4DFFC;
        transition: .3s;
    }
</style>

<body>
    <div class="welcome text-center my-5">
        <h2>Hallo  <?=$user["username"]?></h2>
    </div>

    <!-- Aktifitas Terakhir -->
    <div class="container my-5">
        <div class="aktifitas">
            <h3>Aktifitas Terakhir</h3>
        </div>

        <?php foreach($donasi as $d):?>
        <div class="list my-3  shadow-sm rounded-1 p-4">
            Anda Berdonasi sebesar Rp <?= number_format($d["nominal"],0,',','.') ?> Pada <?=$d["tanggal"]?>
        </div>
        <?php endforeach?>

    </div>
    <!-- Aktifitas Terakhir -->


    <!-- button -->
    <div class="tombol d-flex justify-content-center my-3">
        <a href="../index.php" class="text-decoration-none btn btn-success text-white mx-3">Beranda</a>
        <form action="" method="POST">
            <button class="keluar btn btn-danger" type="button" name="keluar" data-bs-toggle="modal"
                data-bs-target="#keluar">Keluar</button>
        </form>
    </div>
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
                        <button type="submit" name="keluar" class="btn btn-primary">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>



</body>

</html>