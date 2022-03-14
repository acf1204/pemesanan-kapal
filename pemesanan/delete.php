<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location: ../login.php");
    exit;
}

require '../controllers/pemesanan.php';
$id_pemesanan = $_GET["id_pemesanan"];

if (delete($id_pemesanan) > 0) {
    $_SESSION["pesan"] = "Data Berhasil Dihapus";
    header("location:index.php");
} else {
    $_SESSION["pesan"] = "Data Gagal Dihapus";
    header("location:index.php");
}
