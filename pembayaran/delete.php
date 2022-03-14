<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location: ../login.php");
    exit;
}

require '../controllers/bayar.php';
$id_pembayaran = $_GET["id_pembayaran"];

if (delete($id_pembayaran) > 0) {
    $_SESSION["pesan"] = "Data Berhasil Dihapus";
    header("location:index.php");
} else {
    $_SESSION["pesan"] = "Data Gagal Dihapus";
    header("location:index.php");
}
