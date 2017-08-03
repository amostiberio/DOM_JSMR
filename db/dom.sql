-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2017 at 10:44 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

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
-- Table structure for table `beban_realisasi`
--

CREATE TABLE `beban_realisasi` (
  `id_twrl` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `tahun` int(4) NOT NULL,
  `stat_twrl` int(1) NOT NULL,
  `stat_akhir` decimal(20,0) NOT NULL,
  `realisasi` decimal(20,0) NOT NULL,
  `jenis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beban_realisasi`
--

INSERT INTO `beban_realisasi` (`id_twrl`, `id_sp`, `tahun`, `stat_twrl`, `stat_akhir`, `realisasi`, `jenis`) VALUES
(2, 19, 2016, 1, '123123', '123123', 'bpt'),
(3, 20, 2016, 1, '100', '100', 'bpt'),
(4, 20, 2016, 2, '120', '120', 'bpt'),
(5, 20, 2016, 3, '120', '120', 'bpt'),
(6, 20, 2016, 4, '1200', '1200', 'bpt'),
(7, 0, 2017, 1, '123', '132', 'bpt');

-- --------------------------------------------------------

--
-- Table structure for table `beban_rencana`
--

CREATE TABLE `beban_rencana` (
  `id_twrc` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `tahun` int(4) NOT NULL,
  `stat_twrc` int(1) NOT NULL,
  `rkap` decimal(20,0) NOT NULL,
  `jenis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beban_rencana`
--

INSERT INTO `beban_rencana` (`id_twrc`, `id_sp`, `tahun`, `stat_twrc`, `rkap`, `jenis`) VALUES
(65, 16, 2016, 1, '1', 'bpt'),
(66, 16, 2016, 2, '1', 'bpt'),
(67, 16, 2016, 3, '1', 'bpt'),
(68, 16, 2016, 4, '1', 'bpt'),
(93, 19, 2017, 1, '120', 'bpt'),
(94, 19, 2017, 2, '120', 'bpt'),
(95, 19, 2017, 3, '121', 'bpt'),
(96, 19, 2017, 4, '121', 'bpt'),
(97, 20, 2016, 1, '123', 'bpt'),
(98, 20, 2016, 2, '213123', 'bpt'),
(99, 20, 2016, 3, '12321', 'bpt'),
(100, 20, 2016, 4, '123123', 'bpt'),
(101, 20, 2017, 1, '123', 'bpt'),
(102, 20, 2017, 2, '123', 'bpt'),
(103, 20, 2017, 3, '123', 'bpt'),
(104, 20, 2017, 4, '123', 'bpt'),
(105, 20, 2018, 1, '123', 'bpt'),
(106, 20, 2018, 2, '123', 'bpt'),
(107, 20, 2018, 3, '123', 'bpt'),
(108, 20, 2018, 4, '123', 'bpt'),
(109, 0, 0, 1, '0', ''),
(110, 0, 0, 2, '0', ''),
(111, 0, 0, 3, '0', ''),
(112, 0, 0, 4, '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE `cabang` (
  `id_cabang` int(20) NOT NULL,
  `nama_cabang` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cabang`
--

INSERT INTO `cabang` (`id_cabang`, `nama_cabang`) VALUES
(1, 'Jagorawi'),
(2, 'Kalimalang'),
(3, 'Jatiwaringin');

-- --------------------------------------------------------

--
-- Table structure for table `capex_realisasi`
--

CREATE TABLE `capex_realisasi` (
  `id_twrl` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `tahun` int(4) NOT NULL,
  `stat_twrl` int(1) NOT NULL,
  `stat_akhir` decimal(20,0) NOT NULL,
  `realisasi` decimal(20,0) NOT NULL,
  `jenis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `capex_rencana`
--

CREATE TABLE `capex_rencana` (
  `id_twrc` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `tahun` int(4) NOT NULL,
  `stat_twrc` int(1) NOT NULL,
  `rkap` decimal(20,0) NOT NULL,
  `jenis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gerbang`
--

CREATE TABLE `gerbang` (
  `id_gerbang` int(11) NOT NULL,
  `nama_gerbang` varchar(25) NOT NULL,
  `id_cabang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gerbang`
--

INSERT INTO `gerbang` (`id_gerbang`, `nama_gerbang`, `id_cabang`) VALUES
(1, 'Gerbang A', 1),
(3, 'Gerbang B', 1),
(4, 'C', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_gardu`
--

CREATE TABLE `jenis_gardu` (
  `id_jenisgardu` int(11) NOT NULL,
  `nama_gardu` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_gardu`
--

INSERT INTO `jenis_gardu` (`id_jenisgardu`, `nama_gardu`) VALUES
(1, 'reguler'),
(2, 'gto'),
(3, 'epass');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_karyawan`
--

CREATE TABLE `jenis_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `kode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_karyawan`
--

INSERT INTO `jenis_karyawan` (`id_karyawan`, `nama`, `kode`) VALUES
(1, 'Karyawan Jasamarga', 1),
(2, 'Karyawan JLJ', 2),
(3, 'Karyawan JLO', 3),
(4, 'Sakit Permanen', 4),
(5, 'Kepala Gerbang Tol', 5),
(6, 'KSPT', 6),
(7, 'TUGT', 7);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_subgardu`
--

CREATE TABLE `jenis_subgardu` (
  `id_subgardu` int(11) NOT NULL,
  `nama_subgardu` varchar(25) NOT NULL,
  `id_jenisgardu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_subgardu`
--

INSERT INTO `jenis_subgardu` (`id_subgardu`, `nama_subgardu`, `id_jenisgardu`) VALUES
(1, 'gardu_terbuka', 1),
(2, 'gardu_masuk', 1),
(3, 'gardu_keluar', 1),
(4, 'gardu_terbuka', 2),
(5, 'gardu_masuk', 2),
(6, 'gardu_keluar', 2),
(7, 'epass_lalintinggi', 3),
(8, 'epass_jmltersedia', 3);

-- --------------------------------------------------------

--
-- Table structure for table `jml_gardutersedia`
--

CREATE TABLE `jml_gardutersedia` (
  `id_gardutersedia` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `id_subgardu` int(11) NOT NULL,
  `id_gerbang` int(11) NOT NULL,
  `id_cabang` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jml_gardutersedia`
--

INSERT INTO `jml_gardutersedia` (`id_gardutersedia`, `nilai`, `id_subgardu`, `id_gerbang`, `id_cabang`) VALUES
(1, 34, 1, 1, 1),
(2, 45, 2, 1, 1),
(3, 65, 3, 1, 1),
(4, 76, 8, 1, 1),
(5, 32, 4, 1, 1),
(6, 343, 5, 1, 1),
(7, 234, 6, 1, 1),
(8, 76, 8, 1, 1),
(9, 1400, 1, 3, 1),
(10, 300, 2, 3, 1),
(11, 540, 3, 3, 1),
(12, 250, 4, 3, 1),
(13, 300, 5, 3, 1),
(14, 500, 6, 3, 1),
(15, 1900, 8, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `laporan_lock`
--

CREATE TABLE `laporan_lock` (
  `id_lock` int(11) NOT NULL,
  `start_time` date NOT NULL,
  `end_time` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `panjang_antrian`
--

CREATE TABLE `panjang_antrian` (
  `id_pa` int(11) NOT NULL,
  `panjang_antrian` int(11) NOT NULL,
  `id_gerbang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `panjang_antrian`
--

INSERT INTO `panjang_antrian` (`id_pa`, `panjang_antrian`, `id_gerbang`) VALUES
(4, 7, 3),
(5, 11, 1),
(6, 6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pengumpul_tol`
--

CREATE TABLE `pengumpul_tol` (
  `id_pt` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_karyawan` int(25) NOT NULL,
  `id_gerbang` int(11) NOT NULL,
  `id_cabang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengumpul_tol`
--

INSERT INTO `pengumpul_tol` (`id_pt`, `jumlah`, `id_karyawan`, `id_gerbang`, `id_cabang`) VALUES
(1, 43, 5, 1, 1),
(2, 34, 6, 1, 1),
(3, 54, 1, 1, 1),
(4, 0, 0, 1, 1),
(5, 51, 3, 1, 1),
(6, 12, 0, 1, 1),
(7, 11, 7, 1, 1),
(8, 2, 5, 3, 1),
(9, 3, 6, 3, 1),
(10, 4, 1, 3, 1),
(11, 2, 2, 3, 1),
(12, 2, 3, 3, 1),
(13, 1, 4, 3, 1),
(14, 11, 7, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `program_kerja`
--

CREATE TABLE `program_kerja` (
  `id_pk` int(255) NOT NULL,
  `MA` varchar(1000) NOT NULL,
  `nama_pk` text NOT NULL,
  `id_cabang` int(30) NOT NULL,
  `jenis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_kerja`
--

INSERT INTO `program_kerja` (`id_pk`, `MA`, `nama_pk`, `id_cabang`, `jenis`) VALUES
(6, '0001', 'Apa', 1, 'beban'),
(7, '222', 'App', 1, 'beban'),
(8, '808080', 'Coba Program', 2, 'beban'),
(9, '122', 'Pembangunan Toilet', 2, 'beban'),
(10, '12938', 'Selfi Coba Program', 1, 'beban'),
(11, '1230012', 'asadasd', 3, 'beban'),
(12, '202010', 'Menuju Hidup yang indah', 3, 'beban'),
(13, '80802', 'Coba Capex', 3, 'capex');

-- --------------------------------------------------------

--
-- Table structure for table `realisasi_laporan`
--

CREATE TABLE `realisasi_laporan` (
  `id_realisasi` int(11) NOT NULL,
  `nama_file` varchar(25) NOT NULL,
  `type_file` varchar(25) NOT NULL,
  `content` mediumblob NOT NULL,
  `size_file` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_cabang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `referensi_file`
--

CREATE TABLE `referensi_file` (
  `id_referensi` int(11) NOT NULL,
  `nama_file` varchar(25) NOT NULL,
  `type_file` varchar(11) NOT NULL,
  `tahun` int(4) NOT NULL,
  `id_cabang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sub_program`
--

CREATE TABLE `sub_program` (
  `id_sp` int(255) NOT NULL,
  `nama_sp` varchar(1000) NOT NULL,
  `id_pk` int(10) NOT NULL,
  `id_cabang` int(30) NOT NULL,
  `jenis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_program`
--

INSERT INTO `sub_program` (`id_sp`, `nama_sp`, `id_pk`, `id_cabang`, `jenis`) VALUES
(7, 'Apa1', 6, 1, 'beban'),
(8, 'Apa2', 6, 2, 'beban'),
(9, 'Alala', 7, 2, 'beban'),
(10, 'Alala', 6, 3, 'beban'),
(11, 'Apa1', 7, 3, 'beban'),
(12, 'Apa2', 7, 1, 'beban'),
(13, 'Coba', 7, 2, 'beban'),
(14, 'Coba', 6, 1, 'beban'),
(16, 'Coba Program AA', 8, 2, ''),
(17, 'K', 8, 2, 'beban'),
(18, 'K', 9, 2, 'beban'),
(19, 'Coba aja', 10, 1, 'beban'),
(20, 'Amos coba', 11, 3, 'beban'),
(21, 'Coba Capex Sub', 13, 3, 'capex');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_tinggi`
--

CREATE TABLE `transaksi_tinggi` (
  `id_transaksi` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `id_subgardu` int(11) NOT NULL,
  `id_gerbang` int(11) NOT NULL,
  `id_cabang` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_tinggi`
--

INSERT INTO `transaksi_tinggi` (`id_transaksi`, `nilai`, `id_subgardu`, `id_gerbang`, `id_cabang`) VALUES
(57, 100, 1, 1, 1),
(58, 90, 2, 1, 1),
(59, 76, 3, 1, 1),
(60, 40, 7, 1, 1),
(61, 190, 4, 1, 1),
(62, 69, 5, 1, 1),
(63, 65, 6, 1, 1),
(64, 40, 7, 1, 1),
(65, 2000, 1, 3, 1),
(66, 1500, 2, 3, 1),
(67, 1000, 3, 3, 1),
(68, 1900, 4, 3, 1),
(69, 2000, 5, 3, 1),
(70, 2300, 6, 3, 1),
(71, 450, 7, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_cabang` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `id_role`, `id_cabang`) VALUES
(1, 'selfiq', '123456', 2, 1),
(2, 'rachel', '12345', 2, 2),
(3, 'amostiberio', 'amos123', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id_role`, `role`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `waktu_transaksi`
--

CREATE TABLE `waktu_transaksi` (
  `id_waktutrans` int(11) NOT NULL,
  `nilai` int(25) NOT NULL,
  `id_gerbang` int(25) NOT NULL,
  `id_subgardu` int(25) NOT NULL,
  `id_cabang` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `waktu_transaksi`
--

INSERT INTO `waktu_transaksi` (`id_waktutrans`, `nilai`, `id_gerbang`, `id_subgardu`, `id_cabang`) VALUES
(31, 2, 3, 1, 1),
(32, 3, 3, 2, 1),
(33, 4, 3, 3, 1),
(34, 1, 3, 4, 1),
(35, 2, 3, 5, 1),
(36, 3, 3, 6, 1),
(37, 5, 1, 1, 1),
(38, 3, 1, 2, 1),
(39, 7, 1, 3, 1),
(40, 8, 1, 4, 1),
(41, 9, 1, 5, 1),
(42, 10, 1, 6, 1),
(43, 5, 4, 1, 1),
(44, 4, 4, 2, 1),
(45, 6, 4, 3, 1),
(46, 3, 4, 4, 1),
(47, 3, 4, 5, 1),
(48, 1, 4, 6, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beban_realisasi`
--
ALTER TABLE `beban_realisasi`
  ADD PRIMARY KEY (`id_twrl`);

--
-- Indexes for table `beban_rencana`
--
ALTER TABLE `beban_rencana`
  ADD PRIMARY KEY (`id_twrc`);

--
-- Indexes for table `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`id_cabang`);

--
-- Indexes for table `capex_realisasi`
--
ALTER TABLE `capex_realisasi`
  ADD PRIMARY KEY (`id_twrl`);

--
-- Indexes for table `capex_rencana`
--
ALTER TABLE `capex_rencana`
  ADD PRIMARY KEY (`id_twrc`);

--
-- Indexes for table `gerbang`
--
ALTER TABLE `gerbang`
  ADD PRIMARY KEY (`id_gerbang`);

--
-- Indexes for table `jenis_gardu`
--
ALTER TABLE `jenis_gardu`
  ADD PRIMARY KEY (`id_jenisgardu`);

--
-- Indexes for table `jenis_karyawan`
--
ALTER TABLE `jenis_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `jenis_subgardu`
--
ALTER TABLE `jenis_subgardu`
  ADD PRIMARY KEY (`id_subgardu`);

--
-- Indexes for table `jml_gardutersedia`
--
ALTER TABLE `jml_gardutersedia`
  ADD PRIMARY KEY (`id_gardutersedia`);

--
-- Indexes for table `panjang_antrian`
--
ALTER TABLE `panjang_antrian`
  ADD PRIMARY KEY (`id_pa`);

--
-- Indexes for table `pengumpul_tol`
--
ALTER TABLE `pengumpul_tol`
  ADD PRIMARY KEY (`id_pt`);

--
-- Indexes for table `program_kerja`
--
ALTER TABLE `program_kerja`
  ADD PRIMARY KEY (`id_pk`);

--
-- Indexes for table `realisasi_laporan`
--
ALTER TABLE `realisasi_laporan`
  ADD PRIMARY KEY (`id_realisasi`);

--
-- Indexes for table `referensi_file`
--
ALTER TABLE `referensi_file`
  ADD PRIMARY KEY (`id_referensi`);

--
-- Indexes for table `sub_program`
--
ALTER TABLE `sub_program`
  ADD PRIMARY KEY (`id_sp`);

--
-- Indexes for table `transaksi_tinggi`
--
ALTER TABLE `transaksi_tinggi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `waktu_transaksi`
--
ALTER TABLE `waktu_transaksi`
  ADD PRIMARY KEY (`id_waktutrans`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beban_realisasi`
--
ALTER TABLE `beban_realisasi`
  MODIFY `id_twrl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `beban_rencana`
--
ALTER TABLE `beban_rencana`
  MODIFY `id_twrc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT for table `cabang`
--
ALTER TABLE `cabang`
  MODIFY `id_cabang` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `capex_realisasi`
--
ALTER TABLE `capex_realisasi`
  MODIFY `id_twrl` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `capex_rencana`
--
ALTER TABLE `capex_rencana`
  MODIFY `id_twrc` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gerbang`
--
ALTER TABLE `gerbang`
  MODIFY `id_gerbang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `jml_gardutersedia`
--
ALTER TABLE `jml_gardutersedia`
  MODIFY `id_gardutersedia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `panjang_antrian`
--
ALTER TABLE `panjang_antrian`
  MODIFY `id_pa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pengumpul_tol`
--
ALTER TABLE `pengumpul_tol`
  MODIFY `id_pt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `program_kerja`
--
ALTER TABLE `program_kerja`
  MODIFY `id_pk` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `realisasi_laporan`
--
ALTER TABLE `realisasi_laporan`
  MODIFY `id_realisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `referensi_file`
--
ALTER TABLE `referensi_file`
  MODIFY `id_referensi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sub_program`
--
ALTER TABLE `sub_program`
  MODIFY `id_sp` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `transaksi_tinggi`
--
ALTER TABLE `transaksi_tinggi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `waktu_transaksi`
--
ALTER TABLE `waktu_transaksi`
  MODIFY `id_waktutrans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
