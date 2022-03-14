<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location:index.php");
    exit;
}
require 'controllers/bayar.php';
require 'controllers/config_load_data.php';
// $id_kapal = $_GET['id_kapal'];
// $jumlah_penumpang = $_GET['jumlah_penumpang'];
$id_pemesanan = $_GET['id_pemesanan'];
if (isset($_POST["submit"])) {
    if (create($_POST) > 0) {
        echo "<script>
		alert('Pembayaran Berhasil!.Kami akan menghubungi anda kembal melalui via email atau telpon yang telah terdaftar')
		document.location.href='index.php';
		</script>";
    } else {
        echo "<script>
		alert('Pembayaran Gagal !')
		document.location.href='bayar.php?id_kapal=$id_kapal&jumlah_penumpang=$jumlah_penumpang';
		</script>";
    }
}
$destinasi = query('SELECT * FROM destinasi');
// $kapal = query("SELECT * FROM kapal WHERE id_kapal = $id_kapal")[0];
$pemesanan = query("SELECT * FROM pemesanan inner join kapal on pemesanan.id_kapal = kapal.id_kapal WHERE id_pemesanan = $id_pemesanan")[0];
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

    < <!-- Navigation -->
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


        <!-- Header -->
        <header class="ex-header">
        </header> <!-- end of ex-header -->
        <!-- end of header -->

        <section>
            <div class="container mt-5 mb-5">
                <p>Berikut ini biaya pemesanan kapal <b><?= $pemesanan['nama_kapal'] ?></b></p><br>
                <h4><b>Total Biaya : <?= number_format($pemesanan['harga'] * $pemesanan['jumlah_penumpang']) ?></b></h4><br>
                <p>Silakan melakukan pembayaran secara tunai dengan langsung mendatangi kantor dinas perhubungan kota palembang atau melalui via transfer ke BNI No.rek 0287341942 a.n Hesta Rahmana</p>
                <br>
                <p>Nama Pemesan : <?= $_SESSION['login']['name'] ?></p>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_pemesanan" value="<?= $_GET['id_pemesanan'] ?>">
                    <input type="hidden" name="nama_pelanggan" value="<?= $_SESSION['login']['name'] ?>">
                    <input type="hidden" name="jenis_kapal" value="<?= $pemesanan['nama_kapal'] ?>">
                    <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Upload Bukti Pembayaran</label>
                        <input class="form-control" name="bukti_pembayaran" type="file" id="formFileMultiple" multiple>
                    </div>
                    <button type="submit" name="submit" class="btn btn-danger" style="background-color: #1c262f;">Kirim</button>
                </form>
            </div>
        </section>

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

        !-- Modal1 -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Note</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Terimakasih telah melakukan pemesanan, untuk mengecek ketersediaan dari kapal yang anda pilih kami membutuhkan waktu maksimal 6 jam untuk mengkonfirmasi pesanan anda</p>
                        <hr>
                        <p>Kami akan menghubungi anda kembal melalui via email atau telpon yang telah terdaftar</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary">Pesan</button>
                    </div>
                </div>
            </div>
        </div>



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