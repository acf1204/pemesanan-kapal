<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location: ../login.php");
    exit;
}

require '../controllers/destinasi.php';
$id_destinasi = $_GET["id_destinasi"];

if (delete($id_destinasi) > 0) {
    $_SESSION["pesan"] = "Data Berhasil Dihapus";
    header("location:index.php");
} else {
    $_SESSION["pesan"] = "Data Gagal Dihapus";
    header("location:index.php");
}
