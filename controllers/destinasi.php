<?php

require 'config_database.php';

function create($data)
{
    global $conn;
    $tujuan_destinasi = htmlspecialchars($data["tujuan_destinasi"]);

    $query = "INSERT INTO destinasi
    VALUES 
    ('','$tujuan_destinasi')
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function update($data)
{
    global $conn;
    $id_destinasi = $data["id_destinasi"];
    $tujuan_destinasi = htmlspecialchars($data["tujuan_destinasi"]);

    $query = "UPDATE destinasi SET
    id_destinasi = '$id_destinasi',
    tujuan_destinasi = '$tujuan_destinasi' 
    WHERE id_destinasi = $id_destinasi
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function delete($id_destinasi)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM destinasi WHERE id_destinasi = $id_destinasi");
    return mysqli_affected_rows($conn);
}
