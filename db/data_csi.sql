-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10 Agu 2017 pada 04.32
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
-- Struktur dari tabel `data_csi`
--

CREATE TABLE `data_csi` (
  `id_csi` int(10) NOT NULL,
  `nilai_csi` float NOT NULL,
  `tahun` year(4) NOT NULL,
  `id_semester` int(10) NOT NULL,
  `id_cabang` int(10) NOT NULL,
  `jenis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_csi`
--

INSERT INTO `data_csi` (`id_csi`, `nilai_csi`, `tahun`, `id_semester`, `id_cabang`, `jenis`) VALUES
(1, 2012, 2017, 1, 1, 'Rencana'),
(2, 4.1, 2017, 1, 2, 'Rencana'),
(3, 2010, 2017, 1, 1, 'Realisasi'),
(4, 2008, 2017, 2, 1, 'Rencana'),
(5, 4, 2016, 1, 1, 'Realisasi'),
(6, 4, 2016, 1, 1, 'Rencana'),
(7, 41, 2017, 2, 1, 'Realisasi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_csi`
--
ALTER TABLE `data_csi`
  ADD PRIMARY KEY (`id_csi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_csi`
--
ALTER TABLE `data_csi`
  MODIFY `id_csi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
