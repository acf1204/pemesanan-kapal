<?php

require 'config_database.php';

function create($data)
{
    global $conn;
    $name = htmlspecialchars($data["name"]);
    $address = htmlspecialchars($data["address"]);
    $email = htmlspecialchars($data["email"]);
    $username = htmlspecialchars($data['username']);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $username = htmlspecialchars($data['username']);
    $result_username = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
    if (mysqli_fetch_assoc($result_username)) {
        $_SESSION["pesan"] = "Username Telah Terdaftar. Silahkan Gunakan Username yang Lain";
        return false;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);
    $number =  htmlspecialchars($data['number']);
    $level = 'Penumpang';

    $query = "INSERT INTO users
    VALUES 
    ('','$name', '$address', '$email', '$username', '$password', '$number', '$level')
    ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function delete($id_users)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM users WHERE id_users = $id_users");
    return mysqli_affected_rows($conn);
}
