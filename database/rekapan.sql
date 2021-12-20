-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Des 2021 pada 07.02
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
  `id` int(110) NOT NULL,
  `timestamp` datetime NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `tanggal_awal` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `nama_tamu` varchar(100) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nuptk` varchar(20) NOT NULL,
  `jenis_kelamin` enum('pria','wanita') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `kota` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `nama_kantor` varchar(100) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `nama_tamu2` varchar(100) NOT NULL,
  `nik2` varchar(20) NOT NULL,
  `nuptk2` varchar(20) NOT NULL,
  `jenis_kelamin2` enum('wanita','pria') NOT NULL,
  `tanggal_lahir2` date NOT NULL,
  `kota2` varchar(100) NOT NULL,
  `jabatan2` varchar(100) NOT NULL,
  `nama_kantor2` varchar(100) NOT NULL,
  `no_hp2` varchar(13) NOT NULL,
  `wisma` enum('Handayani','Anggrek') NOT NULL,
  `nomor_kamar` int(4) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rekapan`
--

INSERT INTO `rekapan` (`id`, `timestamp`, `nama_kegiatan`, `tanggal_awal`, `tanggal_akhir`, `nama_tamu`, `nik`, `nuptk`, `jenis_kelamin`, `tanggal_lahir`, `kota`, `jabatan`, `nama_kantor`, `no_hp`, `nama_tamu2`, `nik2`, `nuptk2`, `jenis_kelamin2`, `tanggal_lahir2`, `kota2`, `jabatan2`, `nama_kantor2`, `no_hp2`, `wisma`, `nomor_kamar`, `keterangan`) VALUES
(11, '2021-12-20 08:59:06', 'Magang', '2021-12-20', '2021-12-20', 'Angga', '3201916077', '', 'pria', '2021-12-15', 'Pontianak', 'Ketua Umum', 'POLNEP', '08768755681', '', '', '', '', '0000-00-00', '', '', '', '', 'Anggrek', 106, ''),
(12, '2021-12-20 08:59:57', 'Magang', '2021-12-20', '2021-12-20', 'Muhammad Reza', '3201916087', '', 'pria', '2001-03-07', 'Pontianak', 'Ketua Umum', 'POLNEP', '08219321213', '', '', '', '', '0000-00-00', '', '', '', '', 'Anggrek', 107, ''),
(13, '2021-12-20 09:00:23', 'Magang', '2021-12-20', '2021-12-20', 'Bramantio Alif Perdana', '3201916069', '', 'pria', '2001-04-10', 'Pontianak', 'Ketua Umum', 'POLNEP', '08768755681', '', '', '', '', '0000-00-00', '', '', '', '', 'Handayani', 107, ''),
(14, '2021-12-20 10:27:36', 'Magang', '2021-12-20', '2021-12-20', 'Bramantio Alif Perdana', '3201916069', '', 'pria', '2001-04-10', 'Pontianak', 'Ketua Umum', 'POLNEP', '08768755681', '', '', '', '', '0000-00-00', '', '', '', '', 'Handayani', 102, ''),
(15, '2021-12-20 12:18:31', 'Magang', '2021-12-20', '2021-12-20', 'Bramantio Alif Perdana', '3201916069', '', 'pria', '2001-04-10', 'Pontianak', 'Ketua Umum', 'POLNEP', '08768755681', 'Muhammad Reza', '3201916087', '', '', '2001-03-07', 'Pontianak', 'Ketua Umum', 'POLNEP', '08219321213', 'Anggrek', 114, ''),
(16, '2021-12-20 13:00:46', 'Magang', '2021-12-20', '2021-12-20', 'Bramantio Alif Perdana', '3201916069', '', 'pria', '2001-04-10', 'Pontianak', 'Ketua Umum', 'POLNEP', '08768755681', 'Muhammad Dipo Punjabi', '3201916000', '3201916000', 'pria', '2021-12-20', 'Pontianak', 'Wakil Angga', 'POLNEP', '08219321213', 'Anggrek', 117, '');

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
  MODIFY `id` int(110) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
