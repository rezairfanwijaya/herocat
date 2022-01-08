<?php
require_once('../session/user/session_out.php');
require_once('../session/admin/session_out.php');
// import file function
require_once("../function/function.php");

// cek tombol daftar sudah diklik atau belum
if (isset($_POST["register"])) {
    // jalankan function register
    if (register($_POST) > 0) {
        $success = true;
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
    <link rel="stylesheet" href="../css/register.css">
    <title>Daftar - HeroCat</title>
</head>

<body>

    <!-- navbar untuk logo -->
    <section class="navbar">
        <a href="../user/landing.php" class="text-decoration-none logo">HeroCat</a>
    </section>
    <!-- navbar untuk logo -->

    <!-- form login -->
    <form action="" method="post">
        <div class="main">
            <p class="title">Create Your Account</p>

            <div class="username form mb-4">
                <label for="username" class="mb-2">Username</label>
                <br>
                <input type="text" name="username" placeholder="ex : Clarissa" id="username" autocomplete="off" required>
            </div>

            <div class="gmail form mb-4">
                <label for="gmail" class="mb-2">Gmail</label>
                <br>
                <input type="email" name="gmail" placeholder="ex clarissa@gmail.com" id="gmail" autocomplete="off" required>
            </div>

            <div class="password form mb-5">
                <label for="password" class="mb-2">password</label>
                <br>
                <input type="password" name="password" id="password" autocomplete="off" required>
                <img src="../assets/img/see.png" alt="see" class="icon" onclick="see(true)">
                <img src="../assets/img/hide.png" alt="see" class="icon" onclick="see(false)">
            </div>

            <div class=" login mb-4 ">
                <button type="submit " name="register" class="btn-login ">Register</button>
            </div>

            <div class="to-signup mt-3 ">
                <p>Already have an account?
                    <a href="login.php" class="text-decoration-none"><span>Login</span></a>
                </p>
            </div>


        </div>
    </form>
    <!-- form login -->



    <!-- jquery -->
    <script src="../lib/node_modules/jquery/dist/jquery.slim.min.js"></script>
    
    <!-- js bootstrap -->
    <script src="../lib/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

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

    <!-- notifikasi sukses registrasi -->
    <?php if (isset($success)) : ?>
        <script>
            swal({
                title: "Behasil",
                text: "Registrasi Berhasil",
                icon: "success",
                button: "OK",
            })
            .then((register) =>{
                if (register){
                    location.href ="login.php"
                }
            });
        </script>
    <?php endif ?>

</body>

</html>