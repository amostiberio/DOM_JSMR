-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01 Agu 2017 pada 03.49
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
-- Struktur dari tabel `beban_realisasi`
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
-- Dumping data untuk tabel `beban_realisasi`
--

INSERT INTO `beban_realisasi` (`id_twrl`, `id_sp`, `tahun`, `stat_twrl`, `stat_akhir`, `realisasi`, `jenis`) VALUES
(1, 19, 2017, 1, '123123', '123123', 'bpt'),
(2, 19, 2016, 1, '123123', '123123', 'bpt'),
(3, 20, 2016, 1, '100', '100', 'bpt'),
(4, 20, 2016, 2, '120', '120', 'bpt'),
(5, 20, 2016, 3, '120', '120', 'bpt'),
(6, 20, 2016, 4, '1200', '1200', 'bpt'),
(7, 0, 2017, 1, '123', '132', 'bpt');

-- --------------------------------------------------------

--
-- Struktur dari tabel `beban_rencana`
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
-- Dumping data untuk tabel `beban_rencana`
--

INSERT INTO `beban_rencana` (`id_twrc`, `id_sp`, `tahun`, `stat_twrc`, `rkap`, `jenis`) VALUES
(57, 7, 2016, 1, '1', 'bpt'),
(58, 7, 2016, 2, '1', 'bpt'),
(59, 7, 2016, 3, '1', 'bpt'),
(60, 7, 2016, 4, '1', 'bpt'),
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
(108, 20, 2018, 4, '123', 'bpt');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cabang`
--

CREATE TABLE `cabang` (
  `id_cabang` int(20) NOT NULL,
  `nama_cabang` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cabang`
--

INSERT INTO `cabang` (`id_cabang`, `nama_cabang`) VALUES
(1, 'Jagorawi'),
(2, 'Kalimalang'),
(3, 'Jatiwaringin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `capex_realisasi`
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
-- Struktur dari tabel `capex_rencana`
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
-- Struktur dari tabel `gerbang`
--

CREATE TABLE `gerbang` (
  `id_gerbang` int(11) NOT NULL,
  `nama_gerbang` varchar(25) NOT NULL,
  `id_cabang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_gardu`
--

CREATE TABLE `jenis_gardu` (
  `id_jenisgardu` int(11) NOT NULL,
  `nama_gardu` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_gardu`
--

INSERT INTO `jenis_gardu` (`id_jenisgardu`, `nama_gardu`) VALUES
(1, 'reguler'),
(2, 'gto'),
(3, 'epass');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_subgardu`
--

CREATE TABLE `jenis_subgardu` (
  `id_subgardu` int(11) NOT NULL,
  `nama_subgardu` varchar(25) NOT NULL,
  `id_jenisgardu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_subgardu`
--

INSERT INTO `jenis_subgardu` (`id_subgardu`, `nama_subgardu`, `id_jenisgardu`) VALUES
(1, 'gardu_terbuka', 1),
(2, 'gardu_masuk', 1),
(3, 'gardu_keluar', 1),
(4, 'gardu_terbuka', 2),
(5, 'gardu_masuk', 2),
(6, 'gardu_keluar', 2),
(7, 'gardu_terbuka', 3),
(8, 'gardu_masuk', 3),
(9, 'gardu_keluar', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_lock`
--

CREATE TABLE `laporan_lock` (
  `id_lock` int(11) NOT NULL,
  `start_time` date NOT NULL,
  `end_time` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `panjang_antrian`
--

CREATE TABLE `panjang_antrian` (
  `id_pa` int(11) NOT NULL,
  `panjang_antrian` int(11) NOT NULL,
  `id_gerbang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `program_kerja`
--

CREATE TABLE `program_kerja` (
  `id_pk` int(255) NOT NULL,
  `MA` varchar(1000) NOT NULL,
  `nama_pk` text NOT NULL,
  `id_cabang` int(30) NOT NULL,
  `jenis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `program_kerja`
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
-- Struktur dari tabel `realisasi_laporan`
--

CREATE TABLE `realisasi_laporan` (
  `id_realisasi` int(11) NOT NULL,
  `nama_file` varchar(25) NOT NULL,
  `type_file` varchar(25) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `referensi_file`
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
-- Struktur dari tabel `sub_program`
--

CREATE TABLE `sub_program` (
  `id_sp` int(255) NOT NULL,
  `nama_sp` varchar(1000) NOT NULL,
  `id_pk` int(10) NOT NULL,
  `id_cabang` int(30) NOT NULL,
  `jenis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sub_program`
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
-- Struktur dari tabel `transaksi_tinggi`
--

CREATE TABLE `transaksi_tinggi` (
  `id_transaksi` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `id_subgardu` int(11) NOT NULL,
  `id_gerbang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_cabang` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `id_role`, `id_cabang`) VALUES
(1, 'selfiq', '123456', 2, 1),
(2, 'rachel', '12345', 2, 2),
(3, 'amostiberio', 'amos123', 2, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id_role`, `role`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `waktu_transaksi`
--

CREATE TABLE `waktu_transaksi` (
  `id_waktutrans` int(11) NOT NULL,
  `nilai` int(25) NOT NULL,
  `id_gerbang` int(25) NOT NULL,
  `id_subgardu` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `jenis_subgardu`
--
ALTER TABLE `jenis_subgardu`
  ADD PRIMARY KEY (`id_subgardu`);

--
-- Indexes for table `panjang_antrian`
--
ALTER TABLE `panjang_antrian`
  ADD PRIMARY KEY (`id_pa`);

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
  MODIFY `id_twrc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
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
  MODIFY `id_gerbang` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `panjang_antrian`
--
ALTER TABLE `panjang_antrian`
  MODIFY `id_pa` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `program_kerja`
--
ALTER TABLE `program_kerja`
  MODIFY `id_pk` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `realisasi_laporan`
--
ALTER TABLE `realisasi_laporan`
  MODIFY `id_realisasi` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
