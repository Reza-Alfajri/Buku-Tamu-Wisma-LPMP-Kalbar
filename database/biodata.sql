-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Des 2021 pada 03.03
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
-- Struktur dari tabel `biodata`
--

CREATE TABLE `biodata` (
  `nama_tamu` varchar(100) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nuptk` varchar(20) NOT NULL,
  `jenis_kelamin` enum('pria','wanita') NOT NULL,
  `kota` varchar(15) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `nama_kantor` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `biodata`
--

INSERT INTO `biodata` (`nama_tamu`, `nik`, `nuptk`, `jenis_kelamin`, `kota`, `tanggal_lahir`, `jabatan`, `nama_kantor`, `no_hp`) VALUES
('Bramantio Alif Perdana', '1111', '', 'pria', 'Pontianak', '2021-12-15', 'Ketua Umum', 'POLNEP', '08788755681'),
('Angga Solihin', '112233', '', 'pria', 'Pontianak', '2021-12-15', 'Wakil Ketua Umum', 'POLNEP', '08768755681'),
('Bramantio Alif Perdana', '121212', '12121212', 'pria', 'Pontianak', '2021-12-15', 'Ketua Umum', 'POLNEP', '08768755681'),
('Angga123', '12345', '', 'pria', 'Pontianak', '2021-12-15', 'Ketua Umum', 'POLNEP', '08768755681'),
('Bramantio Alif Perdana', '3201916069', '', 'pria', 'Pontianak', '2001-04-10', 'Ketua Umum', 'POLNEP', '08768755681'),
('Angga', '3201916077', '', 'pria', 'Pontianak', '2021-12-15', 'Ketua Umum', 'POLNEP', '08768755681'),
('Angga Hin Qazzafi', '3201916084', '', 'pria', 'Pontianak', '2001-04-13', 'Ketua Umum', 'POLNEP', '08768755601'),
('Sahdiki', '3201916086', '', 'pria', 'Pontianak', '2000-05-14', 'Ketua Umum', 'POLNEP', '08788755681'),
('Muhammad Reza', '3201916087', '', 'pria', 'Pontianak', '2001-03-07', 'Ketua Umum', 'POLNEP', '08219321213'),
('Ommar Rudberg', '3201916088', '', 'pria', 'Pontianak', '1996-12-09', 'Wakil Ketua Umum', 'LKPA', '08788755681'),
('Lala Nabila Sintiana', '3201916099', '', 'wanita', 'Pontianak', '1996-12-19', 'Ketua Umum', 'LKPA', '085559531605');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`nik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
