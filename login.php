<?php
session_start();
require 'controllers/cek_login.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta Tags -->
    <meta name="description" content="Your description">
    <meta name="author" content="Your name">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on Facebook, Twitter, LinkedIn -->
    <meta property="og:site_name" content="" /> <!-- website name -->
    <meta property="og:site" content="" /> <!-- website link -->
    <meta property="og:title" content="" /> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
    <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
    <meta name="twitter:card" content="summary_large_image"> <!-- to have large image post format in Twitter -->

    <!-- Webpage Title -->
    <title>Musi Tour</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/fontawesome-all.min.css" rel="stylesheet">
    <link href="./css/aos.min.css" rel="stylesheet">
    <link href="./css/swiper.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="./assets/images/dishub.png">
</head>

<body>

    <!-- Navigation -->
    <nav id="navbar" class="navbar navbar-expand-lg fixed-top navbar-dark" aria-label="Main navigation">
        <div class="container">

            <!-- Image Logo -->
            <a class="navbar-brand logo-image" href="index.php"><img src="./assets/images/dishub.png" alt="alternative"></a>

            <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ms-auto navbar-nav-scroll">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <?php if (isset($_SESSION["login"])) { ?>
                        <?php if ($_SESSION['login']['level'] == 'Admin') { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="dashboard/index.php">Dashboard</a>
                            </li>
                        <?php } else { ?>

                        <?php } ?>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="regis.php">Registrasi</a>
                        </li>
                    <?php } ?>

                </ul>
            </div> <!-- end of navbar-collapse -->
        </div> <!-- end of container -->
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->


    <!-- Header -->
    <header class="ex-header">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <h1>Halaman Login</h1>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
    <!-- end of header -->

    <!-- Contact -->
    <section class="contact d-flex align-items-center py-4" id="contact">
        <div class="container-fluid text-light">
            <div class="row">
                <div class="col-lg-6 d-flex justify-content-center justify-content-lg-end align-items-center px-lg-5" data-aos="fade-right">
                    <div style="width:90%">
                        <?php if (isset($error)) : ?>
                            <div class="alert alert-danger">
                                email/Password Anda Salah!
                            </div>
                        <?php endif; ?>
                        <?php if (isset($_SESSION["pesan"])) : ?>
                            <div class="alert alert-success">
                                <?= $_SESSION["pesan"]; ?>
                            </div>
                        <?php endif; ?>
                        <?php unset($_SESSION["pesan"]); ?>
                        <form action="" method="post">
                            <div>
                                <h5>Sebelum melakukan pemesanan anda harus melakukn proses login terbelih dulu, pastikan akun anda telah terdaftar</h5>

                                <div class="form-group py-1">
                                    <input type="email" class="form-control form-control-input" id="exampleFormControlInput3" name="email" placeholder="Enter email" require>
                                </div>
                                <div class="form-group py-1">
                                    <input type="password" class="form-control form-control-input" id="exampleFormControlInput3" name="password" placeholder="Enter password" require>
                                </div>
                            </div>
                            <div class="my-3">
                                <button name="login" type="submit" class="btn form-control-submit-button">Submit</button>
                            </div>
                        </form>

                        <p>Belum punya akun? <a href="regis.php">silakan lakukan registrasi disini!</a></p>
                    </div> <!-- end of div -->

                </div> <!-- end of col -->
                <div class="col-lg-6 d-flex align-items-center" data-aos="fade-down">
                    <img class="img-fluid d-none d-lg-block" src="./assets/images/kapal 01.jpg" alt="contact">
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </section> <!-- end of contact -->




    <!-- Location -->
    <section class="location text-light py-5">
        <div class="container" data-aos="zoom-in">
            <div class="row">
                <div class="col-lg-4 d-flex align-items-center">
                    <div class="p-2"><i class="far fa-map fa-3x"></i></div>
                    <div class="ms-2">
                        <h6>ADDRESS</h6>
                        <p>Jln Pangeran Sido Ing Lautan 35 Ilir Palembang Provinsi Smatera Selatan</p>
                    </div>
                </div>

                <div class="col-lg-4 d-flex align-items-center">
                    <div class="p-2"><i class="far fa-envelope fa-3x"></i></div>
                    <div class="ms-2">
                        <h6>SEND US MESSAGE</h6>
                        <p>dishub-Palembang@Yahoo.co.id</p>
                    </div>
                </div>

                <div class="col-lg-4 d-flex align-items-center">
                    <div class="p-2"><i class="fas fa-mobile-alt fa-3x"></i></div>
                    <div class="ms-2">
                        <h6>CALL</h6>
                        <p>08127827268</p>
                        <p>081273791977</p>
                    </div>
                </div>

            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </section> <!-- end of location -->


    <!-- Bottom -->
    <div class="bottom py-2 text-light">
        <div class="container d-flex justify-content-center">
            <div>
                <p>Copyright © Dinas Perhubungan Kota Palembang</p><br>
            </div>
        </div> <!-- end of container -->
    </div> <!-- end of bottom -->


    <!-- Back To Top Button -->
    <button onclick="topFunction()" id="myBtn">
        <img src="assets/images/up-arrow.png" alt="alternative">
    </button>
    <!-- end of back to top button -->


    <!-- Scripts -->
    <script src="./js/bootstrap.min.js"></script><!-- Bootstrap framework -->
    <script src="./js/purecounter.min.js"></script> <!-- Purecounter counter for statistics numbers -->
    <script src="./js/swiper.min.js"></script><!-- Swiper for image and text sliders -->
    <script src="./js/aos.js"></script><!-- AOS on Animation Scroll -->
    <script src="./js/script.js"></script> <!-- Custom scripts -->
</body>

</html>