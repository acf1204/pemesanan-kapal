<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan Keuangan.xls");
session_start();
require '../controllers/config_database.php';
// require_once __DIR__ . '/../vendor/autoload.php';
// $mpdf = new \Mpdf\Mpdf();
// $mpdf->AddPage('L');
// ob_start();
require '../controllers/config_load_data.php';
$pemesanan = query('SELECT * FROM pemesanan inner join kapal on pemesanan.id_kapal=kapal.id_kapal inner join nahkoda on kapal.id_nahkoda=nahkoda.id_nahkoda WHERE ketersediaan = "Tersedia" ');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Laporan Keuangan - Excel</title>
</head>

<body>
    <h1 align="center">Daftar Laporan Keuangan</h1>
    Tanggal Dicetak : <?= date('d/m/Y') ?>
    <table border="1" width="100%">
        <tr>
            <td align="center" style="padding:10px;">Id.Pelanggan</td>
            <td align="center" style="padding:10px;">Nama Pemesan</td>
            <td align="center" style="padding:10px;">Email</td>
            <td align="center" style="padding:10px;" width="35%">No. Telepon </td>
            <td align="center" style="padding:10px;">Destinasi Tujuan</td>
            <td align="center" style="padding:10px;">Total Biaya</td>
        </tr>
        <?php $i = 1;
        $total = 0;
        foreach ($pemesanan as $pemesanan) : ?>
            <tr>
                <td align="center" style="padding:10px;"><?= $i ?></td>
                <td align="center" style="padding:10px;"><?= $pemesanan['nama_pemesan'] ?></td>
                <td align="center" style="padding:10px;"><?= $pemesanan['email'] ?></td>
                <td align="center" style="padding:10px;"><?= $pemesanan['no_telepon'] ?></td>
                <td align="center" style="padding:10px;"><?= $pemesanan['destinasi_tujuan'] ?></td>
                <td align="center" style="padding:10px;">Rp<?= number_format($pemesanan['jumlah_penumpang'] * $pemesanan['harga'])  ?></td>
            </tr>
        <?php $i++;
            $total += $pemesanan['jumlah_penumpang'] * $pemesanan['harga'];
        endforeach; ?>
    </table>
    <h3>Total Pemasukkan: Rp<?= number_format($total) ?> </h3>
</body>

</html>

</html>
<?php
// $html = ob_get_contents();
// ob_end_clean();
// $mpdf->WriteHTML(utf8_encode($html));
// $mpdf->Output("Laporan Keuangan.pdf", 'I');

?>