<?php

require 'config_database.php';

function create($data)
{
    global $conn;
    $id_pemesanan = htmlspecialchars($data["id_pemesanan"]);
    $nama_pelanggan = htmlspecialchars($data["nama_pelanggan"]);
    $jenis_kapal = htmlspecialchars($data["jenis_kapal"]);
    $konfirmasi_pembayaran = '-';
    if ($_FILES['bukti_pembayaran']['error'] === 4) {
        $_SESSION["pesan"] = "Silahkan Upload Foto Bukti Pembayaran.";
        return false;
    } else {
        $bukti_pembayaran = upload_bukti_pembayaran();
    }
    $query = "INSERT INTO pembayaran
    VALUES 
    ('', '$id_pemesanan', '$nama_pelanggan', '$jenis_kapal', '$bukti_pembayaran', '$konfirmasi_pembayaran')
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function create_admin($data)
{
    global $conn;
    $id_pemesanan = htmlspecialchars($data["id_pemesanan"]);
    $nama_pelanggan = htmlspecialchars($data["nama_pelanggan"]);
    $jenis_kapal = htmlspecialchars($data["jenis_kapal"]);
    $konfirmasi_pembayaran = '-';
    if ($_FILES['bukti_pembayaran']['error'] === 4) {
        $_SESSION["pesan"] = "Silahkan Upload Foto Bukti Pembayaran.";
        return false;
    } else {
        $bukti_pembayaran = upload_bukti_pembayaran_admin();
    }
    $query = "INSERT INTO pembayaran
    VALUES 
    ('','$id_pemesanan', '$nama_pelanggan', '$jenis_kapal', '$bukti_pembayaran', '$konfirmasi_pembayaran')
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function update($data)
{
    global $conn;
    $id_pembayaran = $data["id_pembayaran"];
    $nama_pelanggan = htmlspecialchars($data["nama_pelanggan"]);
    $jenis_kapal = htmlspecialchars($data["jenis_kapal"]);
    $konfirmasi_pembayaran = htmlspecialchars($data["konfirmasi_pembayaran"]);
    $bukti_pembayaranLama = htmlspecialchars($data["bukti_pembayaranLama"]);
    if ($_FILES['bukti_pembayaran']['error'] === 4) {
        $bukti_pembayaran = $bukti_pembayaranLama;
    } else {
        $bukti_pembayaran = upload_bukti_pembayaran();
    }
    $query = "UPDATE pembayaran SET
    id_pembayaran = '$id_pembayaran', 
    nama_pelanggan = '$nama_pelanggan',
    jenis_kapal = '$jenis_kapal', 
    bukti_pembayaran = '$bukti_pembayaran', 
    konfirmasi_pembayaran = '$konfirmasi_pembayaran' 
    WHERE id_pembayaran = $id_pembayaran
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function update_admin($data)
{
    global $conn;
    $id_pembayaran = $data["id_pembayaran"];
    $nama_pelanggan = htmlspecialchars($data["nama_pelanggan"]);
    $jenis_kapal = htmlspecialchars($data["jenis_kapal"]);
    $konfirmasi_pembayaran = htmlspecialchars($data["konfirmasi_pembayaran"]);
    $bukti_pembayaranLama = htmlspecialchars($data["bukti_pembayaranLama"]);
    if ($_FILES['bukti_pembayaran']['error'] === 4) {
        $bukti_pembayaran = $bukti_pembayaranLama;
    } else {
        $bukti_pembayaran = upload_bukti_pembayaran_admin();
    }
    $query = "UPDATE pembayaran SET
    id_pembayaran = '$id_pembayaran', 
    nama_pelanggan = '$nama_pelanggan',
    jenis_kapal = '$jenis_kapal', 
    bukti_pembayaran = '$bukti_pembayaran', 
    konfirmasi_pembayaran = '$konfirmasi_pembayaran' 
    WHERE id_pembayaran = $id_pembayaran
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function delete($id_pembayaran)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM pembayaran WHERE id_pembayaran = $id_pembayaran");
    return mysqli_affected_rows($conn);
}


function upload_bukti_pembayaran()
{
    $File = $_FILES['bukti_pembayaran']['name'];
    $ukuranFile = $_FILES['bukti_pembayaran']['size'];
    $error = $_FILES['bukti_pembayaran']['error'];
    $tmpName = $_FILES['bukti_pembayaran']['tmp_name'];

    if ($error === 4) {
        echo "<script>
		alert('Silahkan Upload Bukti Pembayaran Terlebih Dahulu');
		</script>
		";
        return false;
    }

    $ekstensiGambarValid = ['png', 'jpg', 'doc', 'docx', 'pdf'];
    $ekstensiGambar = explode('.', $File);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
		alert('Silahkan Upload Foto Bukti Pembayaran dengan format jpg atau png doc atau docx atau pdf');
		</script>
		";
        return false;
    }

    if ($ukuranFile > 2000000000000) {
        echo "<script>
		alert('Silahkan Upload Foto Bukti Pembayaran dengan size max 2MB');
		</script>
		";
        return false;
    }

    $FileBaru = uniqid();
    $FileBaru .= '.';
    $FileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'upload/' . $FileBaru);
    return $FileBaru;
}

function upload_bukti_pembayaran_admin()
{
    $File = $_FILES['bukti_pembayaran']['name'];
    $ukuranFile = $_FILES['bukti_pembayaran']['size'];
    $error = $_FILES['bukti_pembayaran']['error'];
    $tmpName = $_FILES['bukti_pembayaran']['tmp_name'];

    if ($error === 4) {
        echo "<script>
		alert('Silahkan Upload Bukti Pembayaran Terlebih Dahulu');
		</script>
		";
        return false;
    }

    $ekstensiGambarValid = ['png', 'jpg', 'doc', 'docx', 'pdf'];
    $ekstensiGambar = explode('.', $File);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
		alert('Silahkan Upload Foto Bukti Pembayaran dengan format jpg atau png doc atau docx atau pdf');
		</script>
		";
        return false;
    }

    if ($ukuranFile > 2000000000000) {
        echo "<script>
		alert('Silahkan Upload Foto Bukti Pembayaran dengan size max 2MB');
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

function konfirmasi_pembayaran($data)
{
    global $conn;
    $id_pembayaran = $data['id_pembayaran'];
    $konfirmasi_pembayaran = htmlspecialchars($data['konfirmasi_pembayaran']);
    $query = "UPDATE pembayaran SET  
	id_pembayaran = '$id_pembayaran',    
	konfirmasi_pembayaran = '$konfirmasi_pembayaran'
	WHERE id_pembayaran = $id_pembayaran
	";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
