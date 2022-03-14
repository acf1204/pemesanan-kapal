<?php
require 'config_database.php';

if (isset($_SESSION["login"])) {
    header("location: dashboard/index.php");
    exit;
}
if (isset($_POST["login"])) {
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            $_SESSION["login"] = $row;
            header("location: dashboard/index.php");
            exit;
        }
    }
    $error = true;
}
