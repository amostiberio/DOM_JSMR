-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09 Agu 2017 pada 05.28
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dom`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `referensifile_role`
--

CREATE TABLE `referensifile_role` (
  `id_referensirole` int(10) NOT NULL,
  `jenis` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `referensifile_role`
--

INSERT INTO `referensifile_role` (`id_referensirole`, `jenis`) VALUES
(1, 'RKAP'),
(2, 'Revisi'),
(3, 'Pencapaian');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `referensifile_role`
--
ALTER TABLE `referensifile_role`
  ADD PRIMARY KEY (`id_referensirole`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `referensifile_role`
--
ALTER TABLE `referensifile_role`
  MODIFY `id_referensirole` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
