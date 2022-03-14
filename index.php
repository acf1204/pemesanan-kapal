<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}
require 'controllers/config_database.php';
require 'controllers/config_load_data.php';

$kapal = query('SELECT * FROM kapal');
$detail_kapal = query('SELECT * FROM kapal');
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
            <a class="navbar-brand logo-image" href="index.html"><img src="./assets/images/dishub.png" alt="alternative"></a>

            <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ms-auto navbar-nav-scroll">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#header">Home</a>
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


    <!-- Home -->
    <section class="home py-2 d-flex align-items-center" id="header">
        <div class="container text-light py-3" data-aos="fade-right">
        </div> <!-- end of container -->
    </section> <!-- end of home -->


    <!-- Testimonials -->
    <div class="slider-1 testimonial text-light d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="text-center w-lg-75 m-auto pb-4">
                    <h2 class="py-2">Pilihan Kapal</h2>
                    <p class="para-light">Nikmati wisata menarik bersama orang-orang terdekat, pesan kapal wisatamu sekarang juga !</p>
                </div>
            </div> <!-- end of row -->
            <div class="row p-2" data-aos="zoom-in">
                <div class="col-lg-12">

                    <!-- Card Slider -->
                    <div class="slider-container">
                        <div class="swiper-container card-slider">
                            <div class="swiper-wrapper">
                                <?php $i = 1;
                                foreach ($kapal as $kapal) : ?>
                                    <!-- Slide -->
                                    <div class="swiper-slide">
                                        <div class="testimonial-card p-4">
                                            <img style="width: 100%; height:150px; object-fit:cover;" src="upload/<?= $kapal['foto_kapal'] ?>" alt="testimonial"><br><br>
                                            <h6 class="text-center"><?= $kapal['nama_kapal'] ?></h6>
                                            <p>Jenis : <?= $kapal['jenis'] ?> <br> Kat : <?= $kapal['kat'] ?> <br> Harga : <?= number_format($kapal['harga']) ?> / 3 jam</p><br>Tempat Berangkat : <?= $kapal['tempat_berangkat'] ?></p><br>
                                            <button class="btn-secondary text-light" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $i ?>">Detail</button>
                                        </div>
                                    </div> <!-- end of swiper-slide -->
                                    <!-- end of slide -->
                                <?php $i++;
                                endforeach; ?>

                            </div> <!-- end of swiper-wrapper -->

                            <!-- Add Arrows -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <!-- end of add arrows -->

                        </div> <!-- end of swiper-container -->
                    </div> <!-- end of slider-container -->
                    <!-- end of card slider -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of testimonials -->

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
    <?php $i = 1;
    foreach ($detail_kapal as $detail_kapal) : ?>
        <!-- Modal1 -->
        <div class="modal fade" id="exampleModal<?= $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Kapal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h4>FASILITAS</h4>
                        <?= $detail_kapal['fasilitas'] ?>
                        <br>
                        <h4>Kapasitas</h4>
                        <?= $detail_kapal['kapasitas'] ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <?php if (isset($_SESSION["login"])) { ?>
                            <a href="pemesanan.php?id_kapal=<?= $detail_kapal['id_kapal'] ?>" class="btn btn-secondary">Pesan</a>
                        <?php } else { ?>
                            <a href="login.php" class="btn btn-secondary">Login</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php $i++;
    endforeach; ?>



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