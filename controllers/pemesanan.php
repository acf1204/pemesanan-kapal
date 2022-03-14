<?php

require 'config_database.php';

function create($data)
{
    global $conn;
    $id_kapal = htmlspecialchars($data["id_kapal"]);
    $nama_pemesan = htmlspecialchars($data["nama_pemesan"]);
    $destinasi_tujuan = htmlspecialchars($data["destinasi_tujuan"]);
    $no_telepon = htmlspecialchars($data['no_telepon']);
    $email = htmlspecialchars($data['email']);
    $jumlah_penumpang = htmlspecialchars($data['jumlah_penumpang']);
    $tanggal_berangkat =  $data["tanggal_berangkat"];
    $jadwal_berangkat =  $data["jadwal_berangkat"];
    $ketersediaan =  '-';

    $query = "INSERT INTO pemesanan
    VALUES 
    ('', '$id_kapal', '$nama_pemesan', '$destinasi_tujuan', '$no_telepon', '$email', '$jumlah_penumpang', '$tanggal_berangkat', '$jadwal_berangkat', '$ketersediaan')
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function update($data)
{
    global $conn;
    $id_pemesanan = $data["id_pemesanan"];
    $id_kapal = htmlspecialchars($data["id_kapal"]);
    $nama_pemesan = htmlspecialchars($data["nama_pemesan"]);
    $destinasi_tujuan = htmlspecialchars($data["destinasi_tujuan"]);
    $no_telepon = htmlspecialchars($data["no_telepon"]);
    $email = htmlspecialchars($data["email"]);
    $jumlah_penumpang = htmlspecialchars($data["jumlah_penumpang"]);
    $tanggal_berangkat =  $data["tanggal_berangkat"];
    $jadwal_berangkat =  $data["jadwal_berangkat"];
    $ketersediaan =  $data["ketersediaan"];

    $query = "UPDATE pemesanan SET
    id_pemesanan = '$id_pemesanan', 
    id_kapal = '$id_kapal',
    nama_pemesan = '$nama_pemesan',
    destinasi_tujuan = '$destinasi_tujuan',
    no_telepon = '$no_telepon', 
    email = '$email', 
    jumlah_penumpang = '$jumlah_penumpang',  
    tanggal_berangkat = '$tanggal_berangkat',  
    jadwal_berangkat = '$jadwal_berangkat', 
    ketersediaan = '$ketersediaan' 
    WHERE id_pemesanan = $id_pemesanan
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function delete($id_pemesanan)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM pemesanan WHERE id_pemesanan = $id_pemesanan");
    return mysqli_affected_rows($conn);
}

function ketersediaan($data)
{
    global $conn;
    $id_pemesanan = $data['id_pemesanan'];
    $ketersediaan = htmlspecialchars($data['ketersediaan']);
    $query = "UPDATE pemesanan SET  
	id_pemesanan = '$id_pemesanan',    
	ketersediaan = '$ketersediaan'
	WHERE id_pemesanan = $id_pemesanan
	";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
