<?php 
// session_start();
require_once('../function/function.php');
require_once('../partial/profile-inisial.php');

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/index.css">

    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />


</head>
<style>
    
</style>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand logo" href="../index.php">Herocat</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav mx-auto">
                    <a class="nav-item text-decoration-none" href="../index.php">Home</a>
                    <a class="nav-item text-decoration-none" href="../adopsi.php">Adopt</a>
                    <a class="nav-item text-decoration-none" href="../donasi.php">Donate</a>
                    <a class="nav-item text-decoration-none" href="../news.php">News</a>
                </div>
                
                <!-- profile -->
                <div class="profile">
                    <a href="profile.php" class="text-decoration-none">
                        <?php echo strtoupper(substr($nama,0,1))?>
                    </a>
                </div>
                <!-- profile -->

            </div>
        </div>
    </nav>




    <!-- jquery -->
    <script src="lib/node_modules/jquery/dist/jquery.min.js"></script>

    <!-- JS Bootatrap -->
    <script src="lib/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Js External -->
    <script src="js/script.js"></script>

    <!-- ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!-- AOS -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>