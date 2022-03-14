<?php session_start(); ?>
<?php
require '../controllers/nahkoda.php';
require '../controllers/config_load_data.php';
if (isset($_POST["submit"])) {
    if (update($_POST) > 0) {
        echo "<script>
		alert('Data Berhasil Diubah')
		document.location.href='index.php';
		</script>";
    } else {
        echo "<script>
		alert('Data Gagal Diubah')
		document.location.href='index.php';
		</script>";
    }
}
$id_nahkoda = $_GET['id_nahkoda'];
$nahkoda = query("SELECT * FROM nahkoda WHERE id_nahkoda = $id_nahkoda")[0];
?>
<?php $id_users =  $_SESSION['login']['id_users'] ?>
<?php $login = query("SELECT * FROM users WHERE id_users = $id_users ")[0] ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Musi Tour</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../assets/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets/adminlte/dist/css/adminlte.min.css"><!-- summernote -->
    <link rel="stylesheet" href="../assets/adminlte/plugins/summernote/summernote-bs4.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">





        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->


            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../assets/adminlte/dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= $login['name'] ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class  with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="../dashboard/index.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <?php if ($login['level'] == 'Admin') : ?>
                            <li class="nav-item menu-open">
                                <a href="#" class="nav-link  active">
                                    <i class="nav-icon fas fa-key"></i>
                                    <p>
                                        Master
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="../kapal/index.php" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Data Kapal</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../nahkoda/index.php" class="nav-link active">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Data Nahkoda</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../destinasi/index.php" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Data Destinasi</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>

                        <?php if ($login['level'] != 'Pimpinan') : ?>
                            <li class="nav-item menu-open">
                                <a href="../pemesanan/index.php" class="nav-link">
                                    <i class="nav-icon fas fa-shopping-cart"></i>
                                    <p>
                                        Pemesanan
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item menu-open">
                                <a href="../pembayaran/index.php" class="nav-link">
                                    <i class="nav-icon fas fa-money-bill"></i>
                                    <p>
                                        Pembayaran
                                    </p>
                                </a>
                            </li>
                        <?php endif; ?>

                        <li class="nav-item menu-open">
                            <a href="../laporan_keuangan/index.php" class="nav-link">
                                <i class="nav-icon fas fa-money-bill-alt"></i>
                                <p>
                                    Laporan Keuangan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="../logout.php" class="nav-link">
                                <i class="nav-icon fas fa-power-off"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Data Nahkoda</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Data Nahkoda</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data Nahkoda Musi Tour</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form method="POST">
                                        <input type="hidden" name="id_nahkoda" value="<?= $id_nahkoda ?>">
                                        <div class="modal-body">
                                            <div class="mb-1">
                                                <label for="recipient-name" class="col-form-label">Nama Nahkoda:</label>
                                                <input type="text" name="nama_nahkoda" class="form-control" id="recipient-name" value="<?= $nahkoda['nama_nahkoda'] ?>" require>
                                            </div>
                                            <div class="mb-1">
                                                <label for="recipient-name" class="col-form-label">Pangkat/Gol:</label>
                                                <input type="text" name="pangkat_gol" class="form-control" id="recipient-name" value="<?= $nahkoda['pangkat_gol'] ?>" require>
                                            </div>
                                            <div class="mb-1">
                                                <label for="message-text" class="col-form-label">Jabatan:</label>
                                                <textarea class="form-control textarea" name="jabatan" id="message-text" require><?= $nahkoda['jabatan'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; <?= date('Y') ?></strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../assets/adminlte/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../assets/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../assets/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../assets/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../assets/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../assets/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../assets/adminlte/plugins/jszip/jszip.min.js"></script>
    <script src="../assets/adminlte/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../assets/adminlte/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../assets/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../assets/adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../assets/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/adminlte/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../assets/adminlte/dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["pdf"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    <!-- Summernote -->
    <script src="../assets/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
    <script>
        $(function() {
            // Summernote
            $('.textarea').summernote()
        })
    </script>
</body>

</html>