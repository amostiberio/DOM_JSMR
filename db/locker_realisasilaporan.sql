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
-- Struktur dari tabel `locker_realisasilaporan`
--

CREATE TABLE `locker_realisasilaporan` (
  `id_locker` int(10) NOT NULL,
  `start_unggah` date NOT NULL,
  `end_unggah` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `locker_realisasilaporan`
--

INSERT INTO `locker_realisasilaporan` (`id_locker`, `start_unggah`, `end_unggah`) VALUES
(1, '2017-08-01', '2017-08-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `locker_realisasilaporan`
--
ALTER TABLE `locker_realisasilaporan`
  ADD PRIMARY KEY (`id_locker`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `locker_realisasilaporan`
--
ALTER TABLE `locker_realisasilaporan`
  MODIFY `id_locker` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
