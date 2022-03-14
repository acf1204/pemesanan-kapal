<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location: ../login.php");
    exit;
}

require '../controllers/nahkoda.php';
$id_nahkoda = $_GET["id_nahkoda"];

if (delete($id_nahkoda) > 0) {
    $_SESSION["pesan"] = "Data Berhasil Dihapus";
    header("location:index.php");
} else {
    $_SESSION["pesan"] = "Data Gagal Dihapus";
    header("location:index.php");
}
