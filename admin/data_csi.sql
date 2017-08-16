-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16 Agu 2017 pada 04.00
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
  `stat_twrl` int(1) NOT NULL,
  `id_cabang` int(10) NOT NULL,
  `jenis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_csi`
--

INSERT INTO `data_csi` (`id_csi`, `nilai_csi`, `tahun`, `id_semester`, `stat_twrl`, `id_cabang`, `jenis`) VALUES
(8, 4, 2017, 1, 1, 1, 'Rencana'),
(9, 3, 2017, 2, 2, 1, 'Rencana'),
(10, 4, 2017, 2, 1, 1, 'Rencana'),
(12, 3, 2017, 1, 2, 1, 'Rencana'),
(13, 4, 2017, 1, 1, 1, 'Realisasi'),
(14, 4, 2017, 1, 2, 1, 'Realisasi'),
(15, 2, 2017, 2, 1, 1, 'Realisasi'),
(16, 4, 2017, 2, 2, 1, 'Realisasi');

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
  MODIFY `id_csi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
