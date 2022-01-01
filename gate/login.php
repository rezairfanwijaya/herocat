<?php
session_start();
require_once "../function/function.php";


// cek cookie
if (isset($_COOKIE["id"]) && isset($_COOKIE["username"])) {
    // jika ada tampung cookie ke dalam variable
    $id = $_COOKIE["id"];
    $username = $_COOKIE["username"];

    // apakah cookie sesuai dengan user yang login
    $sql = "SELECT * FROM user WHERE id = $id";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($query);
    // jika sama maka buatkan session
    if ($username === hash("sha256", $data["username"])) {
        $_SESSION["login"] = true;
    }
}

// jika sudah punya session maka arahkan user ke home
if (isset($_SESSION["login"])) {
    header("location:../index.php");
}








// apakah tombol login telah di klik
if (isset($_POST["login"])) {
    // ambil data yang diinput user
    $username = $_POST["username"];
    $password = $_POST["password"];

    // cek apakah username ada di db
    $sql = "SELECT * FROM user where username = '$username'";
    $query = mysqli_query($conn, $sql);

    if (mysqli_num_rows($query) === 1) {
        $data = mysqli_fetch_assoc($query);
        // jika ada maka cek passwordnya
        if (password_verify($password, $data["password"])) {

            if (isset($_POST["cookie"])) {
                // buat cookies
                setcookie('id', $data["id_user"]);
                setcookie("username", hash("sha256", $data["username"]), time() + 60);
            }



            // memilih antara admin atau user
            if ($data["level"] === 'user') {
                // buat session
                $_SESSION["id"] = $data["id_user"];
                $_SESSION["login"] = true;
                $successuser = true;
            } else {
                // buat session
                $_SESSION["id"] = $data["id_user"];
                $_SESSION["login"] = true;
                $successadmin = true;
            }
        } else {
            $failed = true;
        }
    } else {
        // jika username belum terdaftar
        $notfound = true;
    }
}


?>




<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="../lib/node_modules/bootstrap/dist/css/bootstrap.min.css">

    <!-- CSS external -->
    <link rel="stylesheet" href="../css/login.css">
    <title>Masuk - HeroCat</title>
</head>

<body>

    <!-- gagal login -->
    <?php if (isset($failed)) : ?>
        <div class="alert alert-warning alert-dismissible fade show sticky-top" role="alert">
            <strong>Gagal Masuk</strong> username atau password salah.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>
    <!-- gagal login -->

    <!-- navbar untuk logo -->
    <section class="navbar">
        <a href="../user/landing.html" class="text-decoration-none logo">HeroCat</a>
    </section>
    <!-- navbar untuk logo -->

    <!-- form login -->
    <form action="" method="post">
        <div class="main">
            <p class="title">Login to Herocat</p>

            <div class="username form mb-4">
                <label for="username" class="mb-2">Username</label>
                <br>
                <input type="text" name="username" placeholder="ex : Clarissa" id="username" autocomplete="off">
            </div>

            <div class="password form mb-2">
                <label for="password" class="mb-2">password</label>
                <br>
                <input type="password" name="password" id="password" autocomplete="off">
                <img src="../assets/img/see.png" alt="see" class="icon" onclick="see(true)">
                <img src="../assets/img/hide.png" alt="see" class="icon" onclick="see(false)">
            </div>
            <div class="cookie form mb-5">
                <input type="checkbox" name="cookie" class="cookie" id="cookie">
                <label for="cookie">Remember Me</label>
            </div>

            <div class=" login mb-4 ">
                <button type="submit " name="login" class="btn-login ">Login</button>
            </div>

            <div class="to-signup mt-3 ">
                <p>New here?
                    <a href="register.php" class="text-decoration-none"><span>Create an account</span></a>
                </p>
            </div>


        </div>
    </form>
    <!-- form login -->



    <!-- jquery -->
    <script src="../lib/node_modules/jquery/dist/jquery.js"></script>
    <!-- js bootstrap -->
    <script src="../lib/node_modules/bootstrap/dist/js/bootstrap.js"></script>

    <!-- sweetalert -->
    <script src="../lib/node_modules/sweetalert/dist/sweetalert.min.js"></script>

    <!-- ionicon -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js "></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js "></script>

    <script>
        function see(issee) {
            var pass = document.getElementById('password')

            if (issee) {
                pass.setAttribute('type', 'text')
                document.body.setAttribute('id', 'see')
            } else {
                pass.setAttribute('type', 'password')
                document.body.setAttribute('id', '')
            }
        }
    </script>

    <!-- notifikasi sukses login user -->
    <?php if (isset($successuser)) : ?>
        <script>
            swal({
                    title: "Behasil",
                    icon: "success",
                    button: "OK",
                })
                .then((login) => {
                    if (login) {
                        location.href = "../index.php"
                    }
                });
        </script>
    <?php endif ?>


    <!-- notifikasi sukses login admin -->
    <?php if (isset($successadmin)) : ?>
        <script>
            swal({
                    title: "Behasil",
                    icon: "success",
                    button: "OK",
                })
                .then((login) => {
                    if (login) {
                        location.href = "../admin/index.php"
                    }
                });
        </script>
    <?php endif ?>

    <!-- notifikasi username belum terdaftar -->
    <?php if (isset($notfound)) : ?>
        <script>
            swal({
                    title: "Username Belum Terdaftar",
                    text: "Silahkan daftar terlebih dahulu",
                    icon: "warning",
                    buttons: {
                        cancel: "Batal",
                        Daftar: true
                    }
                })
                .then((value) => {
                    switch (value) {
                        case "Daftar":
                            location.href = "register.php"
                    }

                });
        </script>
    <?php endif ?>

</body>

</html>