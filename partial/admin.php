<?php
require_once('../../session/admin/session_in.php');
require_once('../../function/function.php');

if (isset($_POST["logout"])) {
    require_once('../../session/logout.php');
    header('location: ../../gate/login.php');
}

// hapus data kucing
if(isset($_POST["hapus"])){
    $id = $_POST['id'];
    hapus($id);
}



// hapus data artikel
if (isset($_POST["hapus-artikel"])){
    $id = $_POST["id"];
    hapusArtikel($id);
    $hapusSuccess = true;
}

  // hapus data adopsi
  if (isset($_POST["delete"])){
    mysqli_query($conn, "TRUNCATE adopsi");
    $succes = true;
}

  // hapus data donasi
  if (isset($_POST["kosongkan"])){
    mysqli_query($conn, "TRUNCATE donasi");
    $succes = true;
}



?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Herocat | ADMIN</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- CSS Bootstrap -->
    <link href="../../lib/node_modules/bootstrap/dist/css/bootstrap.min.css">

    <!-- Jquery Bootstrap -->
    <script src="../../lib/node_modules/jquery/dist/jquery.min.js"></script>

    <!-- JS Bootstrap -->
    <script src="../../lib/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- CSS external Produk -->
    <link href="../../css/admin.css" rel="stylesheet">

    <!-- tiny untuk form artikel admin -->
    <script src="https://cdn.tiny.cloud/1/u51yxlzu6rzzlsbo9lsxoneshd5wmkt1roipja2fz5m12imf/tinymce/5/tinymce.min.js"referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>

    


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-text mx-3">HEROCAT</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">



            <!-- Produk -->
            <li class="nav-item ">
                <a class="nav-link collapsed" href="pengguna.php">
                <i class="fas fa-users"></i>
                    <span>Pengguna</span>
                </a>
            </li>

            <!-- Produk -->
            <li class="nav-item ">
                <a class="nav-link collapsed" href="produk.php">
                    <i class="fas fa-database fa-cog"></i>
                    <span>Produk</span>
                </a>
            </li>

            <!-- Donasi -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="donasi.php">
                    <i class="far fa-money-bill-alt fa-cog"></i>
                    <span>Donasi</span>
                </a>
            </li>

            <!-- Adopsi -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="adopsi.php">
                    <i class="fas fa-cat"></i>
                    <span>Adopsi</span>
                </a>
            </li>

            <!-- Artikel -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="artikel.php">
                    <i class="far fa-newspaper"></i>
                    <span>Artikel</span>
                </a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle" src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">

                                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                                    <form action="" method="POST">
                                        <button name="logout" type="submit" class="btn">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                                        </button>
                                    </form>
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Bootstrap core JavaScript-->
                <script src="../vendor/jquery/jquery.min.js"></script>
                <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                <!-- Core plugin JavaScript-->
                <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

                <!-- Custom scripts for all pages-->
                <script src="../js/sb-admin-2.js"></script>

                <!-- sweet alert -->
                <script src="../../lib/node_modules/sweetalert/dist/sweetalert.min.js"></script>
               


</body>

</html>