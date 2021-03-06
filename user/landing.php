<?php 
require_once('../session/user/session_out.php');
require_once('../session/admin/session_out.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="../lib/node_modules/bootstrap/dist/css/bootstrap.min.css">

    <!-- CSS External -->
    <link rel="stylesheet" href="../css/landing.css">

    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>


    <title>Hero-Cat</title>

</head>

<body>


    <!-- float botton -->
    <a href="#navbar">
        <div class="float-botton" data-aos="fade-left" data-aos-delay="50" data-aos-duration="1100">
            <ion-icon name="chevron-up-outline" class="icon"></ion-icon>
        </div>
    </a>
    <!-- float botton -->


    <!-- Navbar -->
    <section id="navbar">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="logo text-decoration-none" href="#">Herocat</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav mx-auto">
                    <a class="nav-item text-decoration-none active" href="#">Home</a>
                    <a class="nav-item text-decoration-none" href="#fitur">Features</a>
                    <a class="nav-item text-decoration-none" href="#service">Service</a>
                    <a class="nav-item text-decoration-none" href="#testimoni">Testimonial</a>
                    <a class="nav-item text-decoration-none" href="#kontak">Contact</a>
                    <a class="nav-item text-decoration-none" href="#footer">About Us</a>
                </div>
                <!-- button login -->
                <a href="../gate/login.php" class="text-white text-decoration-none">
                    <div class="login">
                        Login
                    </div>
                </a>
            </div>
        </nav>
    </section>
    <!-- Navbar -->

    <!-- Hero -->
    <section id="hero">
        <div class="hero">
            <img src="../assets/img/hero.png" alt="">
        </div>

        <!-- caption -->
        <div class="caption">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <p class="title satu" data-aos="fade-right" data-aos-delay="50" data-aos-duration="1800">KUCING DI JALANAN </p>
                    <p class="title dua" data-aos="fade-left" data-aos-delay="90" data-aos-duration="1600">BUTUH BANTUANMU
                    </p>
                    <p class="desc-title" data-aos="fade-up" data-aos-delay="90" data-aos-duration="1600">Yuk Bersama Menolong Kucing-Kucing Jalanan!</p>
                    <!-- login button -->
                    <a href="../gate/login.php" class="text-decoration-none text-white login-button">
                        <div class="login" data-aos="fade-up" data-aos-delay="300" data-aos-duration="2000">
                            Login
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- caption -->
    </section>
    <!-- Hero -->


    <!-- fitur -->
    <section class="main" id="fitur">
        <div class="row">
            <div class="col-12">
                <p class="title text-center" data-aos="fade-right" data-aos-delay="300" data-aos-duration="2000">
                    Fe<span>atures</span></p>
            </div>

            <div class="col-12 col-md-4 konten-fitur">
                <div class="kartu" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-tilt>
                    <p class="title">Donasi</p>
                    <img src="../assets/img/donation.png" alt="donasi">
                    <p class="desc">Anda dapat berdonasi untuk membantu keberlangsungan hidup kucing disekitar anda</p>
                </div>
            </div>

            <div class="col-12 col-md-4 konten-fitur">
                <div class="kartu" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-tilt>
                    <p class="title">Adopsi</p>
                    <img src="../assets/img/adopsi.png" alt="adopsi">
                    <p class="desc">Jadilah pecinta kucing yang profesional dan berkualitas dengan memulai adopsi sekarang
                    </p>
                </div>
            </div>

            <div class="col-12 col-md-4  konten-fitur">
                <div class="kartu" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-tilt>
                    <p class="title">Tips & Trick</p>
                    <img src="../assets/img/tips-tricks.png" alt="tips&trick">
                    <p class="desc">Ikuti pedoman pemeliharaan kucing dengan menjadikan kucing lebih berkualitas</p>
                </div>
            </div>
        </div>
    </section>
    <!-- fitur -->

    <!-- service -->
    <section class="main" id="service">
        <div class="row">
            <div class="col-12">
                <p class="title service text-center" data-aos="fade-right" data-aos-delay="300" data-aos-duration="2000">
                    Se<span>rvice</span></p>
            </div>

            <div class="col-12 col-md-6">
                <div class="body" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1800">
                    <div class="bulet d-none d-lg-block" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1800"></div>
                    <p class="title-service">Kafe Kucing</p>
                    <p class="title-desc">Nikmati waktu berharga anda bersama kucing kesayangan di offline store kami dengan berkunjung ke cafe kucing</p>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <img src="../assets/img/cafe.png" alt="service" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1800">
            </div>
        </div>
    </section>
    <!-- service -->


    <!-- testimoni -->
    <section class="main" id="testimoni">
        <div class="row">
            <div class="col-12">
                <p class="title testi text-center" data-aos="fade-right" data-aos-delay="300" data-aos-duration="2000">
                    Testi<span>monial</span></p>
            </div>

            <div class="col-12 col-md-4 konten-fitur">
                <div class="kartu" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-tilt>
                    <img src="../assets/img/testi1.png" alt="testi1" class="testi">
                    <p class="desc">"Herocat membatu saya menemukan kucing impian???</p>
                    <p class="nama my-4 text-center">-Andrey-</p>
                </div>
            </div>

            <div class="col-12 col-md-4 konten-fitur">
                <div class="kartu" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-tilt>
                    <img src="../assets/img/testi2.png" alt="testi2" class="testi">
                    <p class="desc">???Sangat menyenangkan nongkrong dicafe kucing???</p>
                    <p class="nama my-4 text-center">-Sheryl-</p>
                </div>
            </div>

            <div class="col-12 col-md-4 konten-fitur">
                <div class="kartu" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-tilt>
                    <img src="../assets/img/testi3.png" alt="testi3" class="testi">
                    <p class="desc">???Berdonasi menjadi lebih mudah dan terpercaya???</p>
                    <p class="nama my-4 text-center">-Steve-</p>
                </div>
            </div>
        </div>
    </section>
    <!-- testimoni -->


    <!-- footer -->
    <section class="footer" id="footer">
        <div class="container-footer">
            <div class="about">
                <a href="#navbar" class="text-decoration-none">
                    <p class="logo">HeroCat</p>
                </a>
                <p class="desc">Herocat bertujuan untuk menolong kucing jalanan melalui program sterilisasi kucing jalanan yang disebut Trap Neuter Return (TNR) atau tangkap, steril, lepaskan kembali. </p>
            </div>
            <div class="alamat">
                <p class="title">Alamat</p>
                <p class="desc">Jl Martadireja 46 Purwokerto Selatan, Indonesia</p>
            </div>
            <div class="sosmed">
                <p class="title">Kontak</p>
                <div class="sosmed-list" id="kontak">
                    <a  href="https://api.whatsapp.com/send?phone=6283822755337&text=Hallo%20admin%20Herocat! %20Saya ada pertanyaan nih." class="text-decoration-none" target="blank">
                        <ion-icon name="logo-whatsapp" class="icon wa"></ion-icon>
                    </a>

                    <a href="#">
                        <ion-icon name="logo-facebook" class="icon fb"></ion-icon>
                    </a>

                    <a href="#">
                        <ion-icon name="logo-instagram" class="icon ig"></ion-icon>
                    </a>
                </div>
            </div>
        </div>
        <div class="copyright">
            <p>Copyright @ 2021. All Rights Reserved </p>
        </div>
    </section>
    <!-- footer -->




    <!-- jquery -->
    <script src="../lib/node_modules/jquery/dist/jquery.js"></script>
    <!-- js bootstrap -->
    <script src="../lib/node_modules/bootstrap/dist/js/bootstrap.js"></script>

    <!-- js External -->
    <script src="../js/main.js"></script>

    <!-- ION Icons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!-- AOS -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <!-- data tilt -->
    <script src="../lib/node_modules/vanilla-tilt/dist/vanilla-tilt.js"></script>



</body>

</html>