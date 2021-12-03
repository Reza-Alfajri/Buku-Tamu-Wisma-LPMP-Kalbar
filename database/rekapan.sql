-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Des 2021 pada 07.54
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lpmp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekapan`
--

CREATE TABLE `rekapan` (
  `id` int(11) NOT NULL,
  `timestamp` datetime NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `tanggal_awal` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `nama_tamu` varchar(100) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `jenis_kelamin` enum('pria','wanita') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `kota` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `nama_kantor` varchar(100) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `wisma` enum('Handayani','Anggrek') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rekapan`
--

INSERT INTO `rekapan` (`id`, `timestamp`, `nama_kegiatan`, `tanggal_awal`, `tanggal_akhir`, `nama_tamu`, `nik`, `jenis_kelamin`, `tanggal_lahir`, `kota`, `jabatan`, `nama_kantor`, `no_hp`, `wisma`) VALUES
(1, '2021-12-02 09:31:41', 'B', '2021-12-16', '2021-12-29', 'Angga', '23102310', 'pria', '2021-12-29', '2112', '312', '211', '2112', 'Anggrek'),
(2, '2021-12-02 09:39:24', 'B', '2021-12-02', '2021-12-02', '1212', '2121', 'wanita', '2021-12-28', 'dassd', '121', 'q312', '312', 'Anggrek'),
(3, '2021-12-02 09:41:16', 'B', '2021-12-30', '2021-12-02', '1212', '23102310', 'pria', '2021-12-28', '2121', '212', 'LKPA', '1212', 'Handayani');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `rekapan`
--
ALTER TABLE `rekapan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `rekapan`
--
ALTER TABLE `rekapan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;