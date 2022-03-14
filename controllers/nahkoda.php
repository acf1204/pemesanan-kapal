<?php

require 'config_database.php';

function create($data)
{
    global $conn;
    $nama_nahkoda = htmlspecialchars($data["nama_nahkoda"]);
    $pangkat_gol = htmlspecialchars($data["pangkat_gol"]);
    $jabatan = $data["jabatan"];

    $query = "INSERT INTO nahkoda
    VALUES 
    ('','$nama_nahkoda', '$pangkat_gol', '$jabatan')
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function update($data)
{
    global $conn;
    $id_nahkoda = $data["id_nahkoda"];
    $nama_nahkoda = htmlspecialchars($data["nama_nahkoda"]);
    $pangkat_gol = htmlspecialchars($data["pangkat_gol"]);
    $jabatan = $data["jabatan"];

    $query = "UPDATE nahkoda SET
    id_nahkoda = '$id_nahkoda',
    nama_nahkoda = '$nama_nahkoda',
    pangkat_gol = '$pangkat_gol',
    jabatan = '$jabatan'
    WHERE id_nahkoda = $id_nahkoda
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function delete($id_nahkoda)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM nahkoda WHERE id_nahkoda = $id_nahkoda");
    return mysqli_affected_rows($conn);
}
