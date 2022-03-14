<?php

require 'config_database.php';

function create($data)
{
    global $conn;
    $nama_kapal = htmlspecialchars($data["nama_kapal"]);
    $jenis = htmlspecialchars($data["jenis"]);
    $kat = htmlspecialchars($data["kat"]);
    $harga = htmlspecialchars($data["harga"]);
    $id_nahkoda = htmlspecialchars($data['id_nahkoda']);
    $tanda_selar = htmlspecialchars($data['tanda_selar']);
    $awak_kapal =  $data["awak_kapal"];
    $fasilitas =  $data["fasilitas"];
    $kapasitas =  $data["kapasitas"];
    $tempat_berangkat =  $data["tempat_berangkat"];
    if ($_FILES['foto_kapal']['error'] === 4) {
        $_SESSION["pesan"] = "Silahkan Upload Foto Kapal.";
        return false;
    } else {
        $foto_kapal = upload_foto_kapal();
    }
    $query = "INSERT INTO kapal
    VALUES 
    ('','$nama_kapal', '$jenis', '$kat', '$harga', '$id_nahkoda', '$tanda_selar', '$awak_kapal', '$fasilitas', '$kapasitas', '$tempat_berangkat', '$foto_kapal')
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function update($data)
{
    global $conn;
    $id_kapal = $data["id_kapal"];
    $nama_kapal = htmlspecialchars($data["nama_kapal"]);
    $jenis = htmlspecialchars($data["jenis"]);
    $kat = htmlspecialchars($data["kat"]);
    $harga = htmlspecialchars($data["harga"]);
    $id_nahkoda = htmlspecialchars($data["id_nahkoda"]);
    $tanda_selar = htmlspecialchars($data["tanda_selar"]);
    $awak_kapal =  $data["awak_kapal"];
    $fasilitas =  $data["fasilitas"];
    $kapasitas =  $data["kapasitas"];
    $tempat_berangkat =  $data["tempat_berangkat"];
    $foto_kapalLama = htmlspecialchars($data["foto_kapalLama"]);
    if ($_FILES['foto_kapal']['error'] === 4) {
        $foto_kapal = $foto_kapalLama;
    } else {
        $foto_kapal = upload_foto_kapal();
    }
    $query = "UPDATE kapal SET
    id_kapal = '$id_kapal',
    nama_kapal = '$nama_kapal',
    jenis = '$jenis',
    kat = '$kat',
    harga = '$harga',
    id_nahkoda = '$id_nahkoda', 
    tanda_selar = '$tanda_selar',  
    awak_kapal = '$awak_kapal',  
    fasilitas = '$fasilitas', 
    kapasitas = '$kapasitas', 
    tempat_berangkat = '$tempat_berangkat', 
    foto_kapal = '$foto_kapal' 
    WHERE id_kapal = $id_kapal
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function delete($id_kapal)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM kapal WHERE id_kapal = $id_kapal");
    return mysqli_affected_rows($conn);
}


function upload_foto_kapal()
{
    $File = $_FILES['foto_kapal']['name'];
    $ukuranFile = $_FILES['foto_kapal']['size'];
    $error = $_FILES['foto_kapal']['error'];
    $tmpName = $_FILES['foto_kapal']['tmp_name'];

    if ($error === 4) {
        echo "<script>
		alert('Silahkan Upload Kapal Terlebih Dahulu');
		</script>
		";
        return false;
    }

    $ekstensiGambarValid = ['png', 'jpg', 'doc', 'docx', 'pdf', 'jpeg'];
    $ekstensiGambar = explode('.', $File);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
		alert('Silahkan Upload Foto Kapal dengan format jpg atau png doc atau docx atau pdf');
		</script>
		";
        return false;
    }

    if ($ukuranFile > 2000000000000) {
        echo "<script>
		alert('Silahkan Upload Foto Kapal dengan size max 2MB');
		</script>
		";
        return false;
    }

    $FileBaru = uniqid();
    $FileBaru .= '.';
    $FileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../upload/' . $FileBaru);
    return $FileBaru;
}
