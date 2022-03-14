-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Feb 2022 pada 13.44
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemesanan_kapal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `destinasi`
--

CREATE TABLE `destinasi` (
  `id_destinasi` int(11) NOT NULL,
  `tujuan_destinasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `destinasi`
--

INSERT INTO `destinasi` (`id_destinasi`, `tujuan_destinasi`) VALUES
(1, 'Pulau Kemarau');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kapal`
--

CREATE TABLE `kapal` (
  `id_kapal` int(11) NOT NULL,
  `nama_kapal` varchar(100) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `kat` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `id_nahkoda` int(11) NOT NULL,
  `tanda_selar` varchar(100) NOT NULL,
  `awak_kapal` text NOT NULL,
  `fasilitas` text NOT NULL,
  `kapasitas` text NOT NULL,
  `tempat_berangkat` varchar(50) NOT NULL,
  `foto_kapal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kapal`
--

INSERT INTO `kapal` (`id_kapal`, `nama_kapal`, `jenis`, `kat`, `harga`, `id_nahkoda`, `tanda_selar`, `awak_kapal`, `fasilitas`, `kapasitas`, `tempat_berangkat`, `foto_kapal`) VALUES
(2, 'KM. Segentar Alam', 'Besi', 'Besar', 7500000, 7, '-', '<ol><li>awak kapal satu</li><li>awak kapal dua</li><li>awak kapal tiga</li></ol>', '<h4 style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; color: rgb(33, 37, 41);\"><br></h4><ol class=\"list-group list-group-numbered\" style=\"list-style-type: none; counter-reset: section 0; font-family: system-ui, -apple-system, \"Segoe UI\", Roboto, \"Helvetica Neue\", Arial, \"Noto Sans\", \"Liberation Sans\", sans-serif, \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\", \"Noto Color Emoji\";\"><li class=\"list-group-item\" style=\"list-style-type: none; padding: 0.5rem 1rem;\">Meja VIP</li><li class=\"list-group-item\" style=\"list-style-type: none; padding: 0.5rem 1rem;\">Meja Catering</li><li class=\"list-group-item\" style=\"list-style-type: none; padding: 0.5rem 1rem;\">Sofa</li><li class=\"list-group-item\" style=\"list-style-type: none; padding: 0.5rem 1rem;\">Kursi Stainless dan Sarung Kursi</li><li class=\"list-group-item\" style=\"list-style-type: none; padding: 0.5rem 1rem;\">Ruang Sholat Lantai 1</li><li class=\"list-group-item\" style=\"list-style-type: none; padding: 0.5rem 1rem;\">Toilet 2 unit</li><li class=\"list-group-item\" style=\"list-style-type: none; padding: 0.5rem 1rem;\">Life Jacket & Pelampung</li><div><br></div></ol>', '<ol class=\"list-group list-group-numbered\" style=\"list-style-type: none; counter-reset: section 0; font-family: system-ui, -apple-system, \"Segoe UI\", Roboto, \"Helvetica Neue\", Arial, \"Noto Sans\", \"Liberation Sans\", sans-serif, \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\", \"Noto Color Emoji\";\"><li class=\"list-group-item\" style=\"list-style-type: none; padding: 0.5rem 1rem;\">Penumpang : 150 orang</li><li class=\"list-group-item\" style=\"list-style-type: none; padding: 0.5rem 1rem;\">Kru Kapal : 6 orang</li><li class=\"list-group-item\" style=\"list-style-type: none; padding: 0.5rem 1rem;\">Orgen & Penyanyi 4 orang</li></ol>', 'pelabuhan 35', '61ef8724b9e9a.jpg'),
(3, 'BA. Mayang Sari', 'besi', 'sedang', 3500000, 7, '-', '<ol><li>awak kapal satu</li><li>awak kapal dua</li><li>awak kapal tiga</li></ol>', '<ol class=\"list-group list-group-numbered\" style=\"list-style-type: none; counter-reset: section 0; font-family: system-ui, -apple-system, \"Segoe UI\", Roboto, \"Helvetica Neue\", Arial, \"Noto Sans\", \"Liberation Sans\", sans-serif, \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\", \"Noto Color Emoji\";\"><li class=\"list-group-item\" style=\"list-style-type: none; padding: 0.5rem 1rem;\">Meja VIP</li><li class=\"list-group-item\" style=\"list-style-type: none; padding: 0.5rem 1rem;\">Meja Catering</li><li class=\"list-group-item\" style=\"list-style-type: none; padding: 0.5rem 1rem;\">Sofa</li><li class=\"list-group-item\" style=\"list-style-type: none; padding: 0.5rem 1rem;\">Kursi Stainless dan Sarung Kursi</li><li class=\"list-group-item\" style=\"list-style-type: none; padding: 0.5rem 1rem;\">Ruang Sholat Lantai 1</li><li class=\"list-group-item\" style=\"list-style-type: none; padding: 0.5rem 1rem;\">Toilet 2 unit</li><li class=\"list-group-item\" style=\"list-style-type: none; padding: 0.5rem 1rem;\">Life Jacket & Pelampung</li></ol>', '<ol class=\"list-group list-group-numbered\" style=\"list-style-type: none; counter-reset: section 0; font-family: system-ui, -apple-system, \"Segoe UI\", Roboto, \"Helvetica Neue\", Arial, \"Noto Sans\", \"Liberation Sans\", sans-serif, \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\", \"Noto Color Emoji\";\"><li class=\"list-group-item\" style=\"list-style-type: none; padding: 0.5rem 1rem;\">Penumpang : 150 orang</li><li class=\"list-group-item\" style=\"list-style-type: none; padding: 0.5rem 1rem;\">Kru Kapal : 6 orang</li><li class=\"list-group-item\" style=\"list-style-type: none; padding: 0.5rem 1rem;\">Orgen & Penyanyi 4 orang</li></ol>', 'pelabuhan 35', '61ef87fba4f15.jpeg'),
(5, 'BA P. Sido Ing Lautan', 'besi', 'besar', 7500000, 7, '-', '<ol><li>awak kapal satu</li><li>awak kapal dua</li><li>awak kapal tiga</li></ol>', '<ol class=\"list-group list-group-numbered\" style=\"list-style-type: none; counter-reset: section 0; font-family: system-ui, -apple-system, \"Segoe UI\", Roboto, \"Helvetica Neue\", Arial, \"Noto Sans\", \"Liberation Sans\", sans-serif, \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\", \"Noto Color Emoji\";\"><li class=\"list-group-item\" style=\"list-style-type: none; padding: 0.5rem 1rem;\">Meja VIP</li><li class=\"list-group-item\" style=\"list-style-type: none; padding: 0.5rem 1rem;\">Meja Catering</li><li class=\"list-group-item\" style=\"list-style-type: none; padding: 0.5rem 1rem;\">Sofa</li><li class=\"list-group-item\" style=\"list-style-type: none; padding: 0.5rem 1rem;\">Kursi Stainless dan Sarung Kursi</li><li class=\"list-group-item\" style=\"list-style-type: none; padding: 0.5rem 1rem;\">Ruang Sholat Lantai 1</li><li class=\"list-group-item\" style=\"list-style-type: none; padding: 0.5rem 1rem;\">Toilet 2 unit</li><li class=\"list-group-item\" style=\"list-style-type: none; padding: 0.5rem 1rem;\">Life Jacket & Pelampung</li></ol>', '<ol class=\"list-group list-group-numbered\" style=\"list-style-type: none; counter-reset: section 0; font-family: system-ui, -apple-system, \"Segoe UI\", Roboto, \"Helvetica Neue\", Arial, \"Noto Sans\", \"Liberation Sans\", sans-serif, \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\", \"Noto Color Emoji\";\"><li class=\"list-group-item\" style=\"list-style-type: none; padding: 0.5rem 1rem;\">Penumpang : 150 orang</li><li class=\"list-group-item\" style=\"list-style-type: none; padding: 0.5rem 1rem;\">Kru Kapal : 6 orang</li><li class=\"list-group-item\" style=\"list-style-type: none; padding: 0.5rem 1rem;\">Orgen & Penyanyi 4 orang</li></ol>', 'pelabuhan 35', '61ef891b929b6.jpeg'),
(10, 'BA Ariodila', '-', '-', 1000000, 7, '-', '<p>-</p>', '<p>-</p>', '<p>-</p>', 'Pelabuhan 35', '61ef8974ce577.jpg'),
(11, 'BA Seluang', '-', '-', 1000000, 7, '-', '<p>-</p>', '<p>-</p>', '<p>-</p>', 'Pelabuhan 35', '61ef89c32b690.jpg'),
(12, 'KM Putri Kembang Dadar', '-', '-', 1000000, 7, '-', '<p>-</p>', '<p>-</p>', '<p>-</p>', 'Dermaga Kamping Kapitan', '61ef8a01131cf.jpg'),
(13, 'BA Transmusi 01', '-', '-', 100000, 7, '-', '<p>-</p>', '<p>-</p>', '<p>-</p>', 'Dermaga Kampung Kapitan', '61ef8aa450a0e.jpeg'),
(14, 'BA Transmusi 01', '-', '-', 1000000, 7, '-', '<p>-</p>', '<p>-</p>', '<p>-</p>', 'Pelabuhan 35', '61ef8acba6f6f.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nahkoda`
--

CREATE TABLE `nahkoda` (
  `id_nahkoda` int(11) NOT NULL,
  `nama_nahkoda` varchar(50) NOT NULL,
  `pangkat_gol` varchar(50) NOT NULL,
  `jabatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nahkoda`
--

INSERT INTO `nahkoda` (`id_nahkoda`, `nama_nahkoda`, `pangkat_gol`, `jabatan`) VALUES
(7, 'Dolly Kurniawan S.E', 'Non PNSD', '<p>Nahkoda BA. Seluang<br>Nahkoda BA. Baung<br>Nahkoda BA. Lais<br>Nahkoda BA. Transmusi2<br></p>'),
(8, 'Eko Irwansyah A.Md', 'Non PNSD', '<p>BA. Putri Mayang Sari<br></p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pemesanan` int(11) DEFAULT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `jenis_kapal` varchar(50) NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `konfirmasi_pembayaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pemesanan`, `nama_pelanggan`, `jenis_kapal`, `bukti_pembayaran`, `konfirmasi_pembayaran`) VALUES
(1, 4, 'yubhar', 'KM. Segentar Alam', '61ed707cad508.png', '-'),
(3, 5, 'yubhar', 'KM. Segentar Alam', '61ee6c0b2d2e1.png', 'Approved'),
(4, 7, 'yubhar', 'KM. Segentar Alam', '61efda1a63f2e.png', 'Ditolak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_kapal` int(11) NOT NULL,
  `nama_pemesan` varchar(50) NOT NULL,
  `destinasi_tujuan` varchar(50) NOT NULL,
  `no_telepon` varchar(17) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jumlah_penumpang` int(11) NOT NULL,
  `tanggal_berangkat` date NOT NULL,
  `jadwal_berangkat` varchar(50) NOT NULL,
  `ketersediaan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_kapal`, `nama_pemesan`, `destinasi_tujuan`, `no_telepon`, `email`, `jumlah_penumpang`, `tanggal_berangkat`, `jadwal_berangkat`, `ketersediaan`) VALUES
(4, 2, 'yubhar', 'Destinasi Tujuan', '+628984898966', 'yubhar99@gmail.com', 2, '2022-01-25', 'Pagi : 09.00 s/d 13.00 ', '-'),
(5, 2, 'yubhar', 'Pulau Kemarau', '+628984898966', 'yubhar46@gmail.com', 1, '2022-01-27', 'Pagi : 09.00 s/d 13.00 ', 'Tersedia'),
(7, 5, 'yubhar', 'Destinasi Tujuan', '+628984898966', 'yubhar99@gmail.com', 1, '2022-01-27', 'Pagi : 09.00 s/d 13.00 ', 'Tidak Tersedia'),
(9, 2, 'yubhar', 'Pulau Kemarau', '8984898966', 'yubhar99@gmail.com', 2, '2022-01-26', 'Pagi : 09.00 s/d 13.00', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(355) NOT NULL,
  `number` varchar(17) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `name`, `address`, `email`, `username`, `password`, `number`, `level`) VALUES
(1, 'Admin', 'Jl. Sungai Sahang, Ilir Barat 1', 'admin@musitour.com', 'admin', '$2y$10$/IGZthvA00BC3uBKLXdhgOhvkN16jHpLMK8CBTuBalFUr9x3aSmy2', '08984898966', 'Admin'),
(2, 'yubhar', 'tanjung raja, ogan ilir', 'yubhar99@gmail.com', 'yubhar', '$2y$10$iM3e9bFrCqcpp63EG4MsBOT2xmVlkinFpQpUZzIoWU0PqRL2cSZ9S', '08984898966', 'Penumpang'),
(3, 'yubhar 2', 'tanjung raja, ogan ilir', 'yubhar46@gmail.com', 'yubhar2', '$2y$10$fxjiGMEk5uBcCSo2TQExYO9MCRpD4UhWytMUHQQOHoHbsG3zoyGHS', '08984898966', 'Penumpang'),
(4, 'Keuangan', 'Jl. Sungai Sahang, Ilir Barat 1', 'keuangan@musitour.com', 'keuangan', '$2y$10$iM3e9bFrCqcpp63EG4MsBOT2xmVlkinFpQpUZzIoWU0PqRL2cSZ9S', '08984898966', 'Keuangan'),
(5, 'Pimpinan', 'Jl. Sungai Sahang, Ilir Barat 1', 'pimpinan@musitour.com', 'pimpinan', '$2y$10$iM3e9bFrCqcpp63EG4MsBOT2xmVlkinFpQpUZzIoWU0PqRL2cSZ9S', '08984898966', 'Pimpinan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `destinasi`
--
ALTER TABLE `destinasi`
  ADD PRIMARY KEY (`id_destinasi`);

--
-- Indeks untuk tabel `kapal`
--
ALTER TABLE `kapal`
  ADD PRIMARY KEY (`id_kapal`);

--
-- Indeks untuk tabel `nahkoda`
--
ALTER TABLE `nahkoda`
  ADD PRIMARY KEY (`id_nahkoda`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `destinasi`
--
ALTER TABLE `destinasi`
  MODIFY `id_destinasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kapal`
--
ALTER TABLE `kapal`
  MODIFY `id_kapal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `nahkoda`
--
ALTER TABLE `nahkoda`
  MODIFY `id_nahkoda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
