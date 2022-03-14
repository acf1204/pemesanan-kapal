<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location: ../login.php");
    exit;
}

require '../controllers/kapal.php';
$id_kapal = $_GET["id_kapal"];

if (delete($id_kapal) > 0) {
    $_SESSION["pesan"] = "Data Berhasil Dihapus";
    header("location:index.php");
} else {
    $_SESSION["pesan"] = "Data Gagal Dihapus";
    header("location:index.php");
}
