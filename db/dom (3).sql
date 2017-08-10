-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10 Agu 2017 pada 04.38
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
(65, 16, 2016, 1, '1', 'bpt'),
(66, 16, 2016, 2, '1', 'bpt'),
(67, 16, 2016, 3, '1', 'bpt'),
(68, 16, 2016, 4, '1', 'bpt'),
(93, 19, 2017, 1, '120', 'bpt'),
(94, 19, 2017, 2, '120', 'bpt'),
(95, 19, 2017, 3, '121', 'bpt'),
(96, 19, 2017, 4, '122', 'bpt'),
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
(2, 'Jakarta-Cikampek'),
(3, 'Jakarta-Tangerang'),
(4, 'Cawang-Tomang-Cengkareng'),
(5, 'Purbaleunyi'),
(6, 'Palikanci'),
(7, 'Semarang'),
(8, 'Surabaya-Gempol'),
(9, 'Belmera'),
(10, 'PT JLJ'),
(11, 'Suramadu');

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `gerbang`
--

CREATE TABLE `gerbang` (
  `id_gerbang` int(11) NOT NULL,
  `nama_gerbang` varchar(59) NOT NULL,
  `id_cabang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gerbang`
--

INSERT INTO `gerbang` (`id_gerbang`, `nama_gerbang`, `id_cabang`) VALUES
(8, 'Gerbang Ramp Taman Mini 1', 1),
(9, 'Gerbang Ramp Taman Mini 2', 1),
(10, 'Gerbang Ramp Dukuh 2', 1),
(11, 'Gerbang Ramp Cibubur 1', 1),
(12, 'Gerbang Cibubur Utama', 1),
(13, 'Gerbang Cibubur 3', 1),
(14, 'Gerbang Cimanggis Utama', 1),
(15, 'Gerbang Cimanggis ', 1),
(16, 'Gerbang Gunung Putri', 1),
(17, 'Gerbang Karanggan', 1),
(18, 'Gerbang Citeureup', 1),
(19, 'Gerbang Sentul', 1),
(20, 'Gerbang Sentul Selatan', 1),
(21, 'Gerbang Bogor', 1),
(22, 'Gerbang Ciawi', 1),
(23, 'Garbang Halim', 2),
(24, 'Gerbang Ramp Pondok Gede Barat', 2),
(25, 'Gerbang Ramp Pondok Gede Timur', 2),
(26, 'Gerbang Cikunir', 2),
(27, 'Gerbang Bekasi Barat', 2),
(28, 'Gerbang Bekasi Timur', 2),
(29, 'Gerbang Tambun', 2),
(30, 'Gerbang Cibitung', 2),
(31, 'Gerbang Cikarang Timur', 2),
(32, 'Gerbang Cikarang Barat', 2),
(33, 'Gerbang Karawang Barat', 2),
(34, 'Gerbang Karawang Timur', 2),
(35, 'Gerbang Cikampek', 2),
(36, 'Gerbang Cikopo', 2);

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
-- Struktur dari tabel `jenis_karyawan`
--

CREATE TABLE `jenis_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `kode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_karyawan`
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
(7, 'epass_lalintinggi', 3),
(8, 'epass_jmltersedia', 3),
(9, 'panjang_antrian', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jml_gardutersedia`
--

CREATE TABLE `jml_gardutersedia` (
  `id_gardutersedia` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `nilai` int(11) NOT NULL,
  `id_subgardu` int(11) NOT NULL,
  `id_gerbang` int(11) NOT NULL,
  `id_cabang` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jml_gardutersedia`
--

INSERT INTO `jml_gardutersedia` (`id_gardutersedia`, `tahun`, `nilai`, `id_subgardu`, `id_gerbang`, `id_cabang`) VALUES
(128, 2010, 10, 1, 8, 1),
(129, 2010, 10, 2, 8, 1),
(130, 2010, 10, 3, 8, 1),
(131, 2010, 10, 4, 8, 1),
(132, 2010, 10, 5, 8, 1),
(133, 2010, 10, 6, 8, 1),
(134, 2010, 10, 8, 8, 1);

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
(1, '2017-08-02', '2017-08-30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `panjang_antrian`
--

CREATE TABLE `panjang_antrian` (
  `id_pa` int(11) NOT NULL,
  `panjang_antrian` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `id_gerbang` int(11) NOT NULL,
  `id_semester` int(11) NOT NULL,
  `id_cabang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `panjang_antrian`
--

INSERT INTO `panjang_antrian` (`id_pa`, `panjang_antrian`, `tahun`, `id_gerbang`, `id_semester`, `id_cabang`) VALUES
(60, 7, 2017, 8, 1, 1),
(61, 3, 2017, 8, 2, 1),
(62, 3, 2017, 21, 1, 1),
(63, 5, 2017, 21, 2, 1),
(64, 2, 2017, 23, 1, 2),
(65, 5, 2017, 23, 2, 2),
(66, 4, 2017, 30, 2, 2),
(67, 3, 2017, 30, 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumpul_tol`
--

CREATE TABLE `pengumpul_tol` (
  `id_pt` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_karyawan` int(25) NOT NULL,
  `id_gerbang` int(11) NOT NULL,
  `id_cabang` int(11) NOT NULL
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
  `content` mediumblob NOT NULL,
  `size_file` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_cabang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `realisasi_laporan`
--

INSERT INTO `realisasi_laporan` (`id_realisasi`, `nama_file`, `type_file`, `content`, `size_file`, `tahun`, `waktu`, `id_cabang`) VALUES
(1, '1', 'xlsx', 0x504b0304140000080800f482024b98daeb8bae000000270100000b0000005f72656c732f2e72656c738dcfc10e82300c06e057597a978107630c838b31e16af001e6560601d6659b0a6fef8e623c786cfaf7fbd3b25ee6893dd18781ac8022cb81a155a4076b04dcdacbee082c4469b59cc8a2801503d45579c549c67412fac105960c1b04f431ba13e741f538cb9091439b361df959c6347ac39d54a334c8f7797ee0fed380adc91a2dc037ba00d6ae0effb1a9eb068567528f196dfc51f19548b2f406a38065e22ff2e39d68cc120abc2af9e6c1ea0d504b0304140000080800f482024b2655e01e15010000db020000130000005b436f6e74656e745f54797065735d2e786d6cad52cb4ec33010fc15cb5714bbe580106ada038f2370281fb0389bc48d5ff2baa5f97b1c9772a84ab9f4b45acfccceecca8bd5de1ab6c348dabb9acfc58c3374ca37da7535ff58bf54f79c5102d780f10e6b3e22f1d572b11e0312cb5a4735ef530a0f5292ead102091fd065a4f5d142ca6dec6400354087f27636bb93cabb842e55699ac1978b276c616b127bdee7e7438e2ce7ecf1c09bac6a0e2118ad2065584ea83cab8b68e88270e79a9374d54f3291958543bd0e74f3b7c3266077e2a0edb45a01b2e62d1f33ea06d93bc4f40a3613e4dec82f1f874fef077179b533097ddb6a858d575b9b2582424468a8474cd688528505ed8e992ff81732c952e6570ef23bff9f1c94468374ed2b94a14767593ee7f21b504b0304140000080800f482024bab212c6ec2000000a70100001a000000786c2f5f72656c732f776f726b626f6f6b2e786d6c2e72656c73ad90cd0a02310c845fa5e4ee66770f2262f5228257d10728ddec0feeb6a5893ffbf6164551f0e0c15398847c33cc62751d7a75a6c89d771a8a2c0745cefaaa738d86c37e3399816231ae32bd77a4612486d572b1a3de487ae1b60bac12c3b1865624cc11d9b63418ce7c20972eb58f8391246383c1d8a36908cb3c9f627c67c027536d2b0d715b15a0f663a05fd8beae3b4b6b6f4f0339f96281171f8fdc1249829ad8906878ad18efa3c81215f07b98f29f6158c63e75f94af2d04f7bfc28787903504b0304140000080800f482024b4149c5a23c010000190200000f000000786c2f776f726b626f6f6b2e786d6c8d51cb6ec23010fc15cbf7e20415441101f5a972a9501f7036f18658d8dec8761af8fb6e8c28f4d693677735b333ebd9e2600dfb061f34ba82e7838c3370252aed7605fffa7cb9997016a2744a1a7450f02304be98cf3af4fb2de29e11dd8582d7313653214259839561800d389a54e8ad8c54fa9d088d07a9420d10ad11c32c1b0b2bb5e32785a9ff8f0656952ee109cbd6828b27110f4646321f6add043e9f55dac0fa9487c9a67993965c1f0c674686f8ac740455f01195d8c19f866f9b87561b2a86b7937cccc525e5cab35063b774fb7be730a67d05a753c936e2235a8a16c24a97b125d00f88dbf3d61aba7091e94b76d868a7b04bf4e315ee12dc68156b72301a67bfbd57d0bb3ad2e7dc65436a46b97def1d90e92c6d1257abd27dcf2f7329fc478f73fac6fe5d523ec27eaa09f8a5ca93c29926ce56e73f504b0304140000080800f482024b16f19ce9f8020000e51900000d000000786c2f7374796c65732e786d6ced995b6bdb3014c7bf8ad07be3dab1bb25c42eac25d0878d415bd8ab224b8ea82c195bee927dfa1df9920bed489772fad404a2db39ff23eb879483bcb8de949a3c8bba51d6a4349c5c52220cb7b932454a1f1f96175fe975b668dc568bfbb5108e80bd6952ba76ae9a0741c3d7a264cdc456c2c088b475c91c34eb2268aa5ab0bcf14ea50ea2cbcbaba064cad05e615ef2b78894ac7e6aab0b6ecb8a39b5525ab96da735ca6cc298bd542a15af6d63a59b806760a5545cbc9cd02c98058c5352f2f95d616ccd565aa4b453a4d9425ae31ac26d6b5c4a1388e7fbe74fc6fe364b3f04ab3558c1fafc21cf4c434f48836c615829faf60dd36a552bdf19f4966fb6e756db9ad4c52aa5cbe1738eccea0c1f75864fbbf7e98a067c95d6bb05bca27d47b600904ed466090d32d41fb6152cbcb146f48fd8d9f9dfe0a45363b5cabd767173b860b733ffed1660185026171b91c34ce22ec881e251c87362cdbecc928f882525bf12928b8f8ac5a590ff1bab2b80fecad6391c2b23ff888e5dd9420be9c0bd56c5da97ce563e86750ef66ab6c8152bac619e7d307af42519871e2b981fd38da0bbae5bd89663671f817487564add1a0e9d713fb1d659bf71bdb8371a6671d2b6b3eaa67ad2146cc6a73969db9bbdfecc430596920badefbdd22fb95b4f7ff66c24316db92cdd1d208183dbefbbb10a10866a2fd337bcfea15aaf7d201b9d254b5855e9ad3f15fdc4861698ee5bdf3aebe1b1ff1520c40e10610798620788b1031c408eb02147d890236cc81136e4081b728c0d39c6861c63438eb121c79f903f21bf1b72820d39c1869c60434eb02127d8908ffef443ecc42bc44ebc42ecc42bc44ebc42ecc42bc44ebc42ecc42bc44ebc42ecc40b03f2141bf2141bf2141bf2141bf2141b728c0d39c6861c63438eb121c7d890136cc80936e4041b72820df97d0182e116ece0aaede8a26dd74bfcdd774a7ff837149a928d1cf3815669a7cc2b976ca0996ff6f76bdda8f32f1a8ea380462e246bb57bd80da6745fff2e72d596b39dd54ff56cdd60b5aff756fdddecfe954df617504b0304140000080800f482024bc9ef6c84840200007b0b000018000000786c2f776f726b7368656574732f7368656574312e786d6ca5965b53ea301485ff4a26ef1252b98853ea8078450505c7e75802cdb149982478f9f7067ad1b135ed411e0aeddadfca4a3609f827ef3c06af546926451fe24613022a42b96062d5878ff3f3832308b42162416229681f7e500d4f02ff4daa171d516a80e585eec3c898f531423a8c2827ba21d7545865291527c6deaa15d26b45c96207f11879cd660771c2044c1c8e551d0fb95cb2908e64b8e15498c444d198189b5e476cad33371ed6b1e344bd6cd607a1e46b6bf1cc62663e76a699cd3b6e91a21367a1925a2e4dc39269a6e2f47aa8874808010f8faf56422af21cdbf5db39c2c00f65ac7757c0d976e16d1d79dfbdbfb18589eca73604e1461bc99fd207107d03bc14f0be80ae13384c81c31ce86027d04a81560e78ee48ed1468e780bbbe93d6776ad677d3faeed7943d277094024739d073d6f7d2fa5ecd40b89975ad593712ce1b8d6b86c259a7b1573756d66a7c583b56d66cdcaa1b2beb36aedb6e9cf51b776ac7ca5a8ebbee5828d94ebbdd37228604be926f406d556b074c1f321133416746c1ede3815d7dbddd3c81cf2c6782a9922b45381853f58ff8c858cbad80c2527cf8139f6d9ec1ff599cfeb4984b43623033c46c3418bc444c01dd5880f913a87eb52a871b15869bcc0737e081929869a2593e56b5d559c18a441b51899dffc41ec6836925755158e96f0b54495f16c6cce65b895eed15f7fa4f71c7fbc7bdd92beeed9fe2deed1f77b257dce99fe2ded78c8becd1919f1fde2fe7c797cbe964380083dbc90c0ca77380abcf8edfd0d9e3b00416c969b1855e830ef67cf45a50474ef52c51bd266e97c9e7898cad5e265f64729978e912af72e332f53a4b55aa8e9dea8dd3f9d6c9de39d589d379ea64ef8b6af25542df7e9650fec739f804504b01021400140000080800f482024b98daeb8bae000000270100000b00000000000000000000000000000000005f72656c732f2e72656c73504b01021400140000080800f482024b2655e01e15010000db0200001300000000000000000000000000d70000005b436f6e74656e745f54797065735d2e786d6c504b01021400140000080800f482024bab212c6ec2000000a70100001a000000000000000000000000001d020000786c2f5f72656c732f776f726b626f6f6b2e786d6c2e72656c73504b01021400140000080800f482024b4149c5a23c010000190200000f0000000000000000000000000017030000786c2f776f726b626f6f6b2e786d6c504b01021400140000080800f482024b16f19ce9f8020000e51900000d0000000000000000000000000080040000786c2f7374796c65732e786d6c504b01021400140000080800f482024bc9ef6c84840200007b0b00001800000000000000000000000000a3070000786c2f776f726b7368656574732f7368656574312e786d6c504b05060000000006000600800100005d0a00000000, 3059, 2010, '2017-08-09 02:36:17', 0);

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `referensi_file`
--

CREATE TABLE `referensi_file` (
  `id_referensi` int(11) NOT NULL,
  `nama_file` varchar(25) NOT NULL,
  `type_file` varchar(25) NOT NULL,
  `content` mediumblob NOT NULL,
  `size_file` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_referensirole` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `referensi_file`
--

INSERT INTO `referensi_file` (`id_referensi`, `nama_file`, `type_file`, `content`, `size_file`, `tahun`, `waktu`, `id_referensirole`) VALUES
(6, '2017\\', 'xlsx', 0x504b0304140000080800f482024b98daeb8bae000000270100000b0000005f72656c732f2e72656c738dcfc10e82300c06e057597a978107630c838b31e16af001e6560601d6659b0a6fef8e623c786cfaf7fbd3b25ee6893dd18781ac8022cb81a155a4076b04dcdacbee082c4469b59cc8a2801503d45579c549c67412fac105960c1b04f431ba13e741f538cb9091439b361df959c6347ac39d54a334c8f7797ee0fed380adc91a2dc037ba00d6ae0effb1a9eb068567528f196dfc51f19548b2f406a38065e22ff2e39d68cc120abc2af9e6c1ea0d504b0304140000080800f482024b2655e01e15010000db020000130000005b436f6e74656e745f54797065735d2e786d6cad52cb4ec33010fc15cb5714bbe580106ada038f2370281fb0389bc48d5ff2baa5f97b1c9772a84ab9f4b45acfccceecca8bd5de1ab6c348dabb9acfc58c3374ca37da7535ff58bf54f79c5102d780f10e6b3e22f1d572b11e0312cb5a4735ef530a0f5292ead102091fd065a4f5d142ca6dec6400354087f27636bb93cabb842e55699ac1978b276c616b127bdee7e7438e2ce7ecf1c09bac6a0e2118ad2065584ea83cab8b68e88270e79a9374d54f3291958543bd0e74f3b7c3266077e2a0edb45a01b2e62d1f33ea06d93bc4f40a3613e4dec82f1f874fef077179b533097ddb6a858d575b9b2582424468a8474cd688528505ed8e992ff81732c952e6570ef23bff9f1c94468374ed2b94a14767593ee7f21b504b0304140000080800f482024bab212c6ec2000000a70100001a000000786c2f5f72656c732f776f726b626f6f6b2e786d6c2e72656c73ad90cd0a02310c845fa5e4ee66770f2262f5228257d10728ddec0feeb6a5893ffbf6164551f0e0c15398847c33cc62751d7a75a6c89d771a8a2c0745cefaaa738d86c37e3399816231ae32bd77a4612486d572b1a3de487ae1b60bac12c3b1865624cc11d9b63418ce7c20972eb58f8391246383c1d8a36908cb3c9f627c67c027536d2b0d715b15a0f663a05fd8beae3b4b6b6f4f0339f96281171f8fdc1249829ad8906878ad18efa3c81215f07b98f29f6158c63e75f94af2d04f7bfc28787903504b0304140000080800f482024b4149c5a23c010000190200000f000000786c2f776f726b626f6f6b2e786d6c8d51cb6ec23010fc15cbf7e20415441101f5a972a9501f7036f18658d8dec8761af8fb6e8c28f4d693677735b333ebd9e2600dfb061f34ba82e7838c3370252aed7605fffa7cb9997016a2744a1a7450f02304be98cf3af4fb2de29e11dd8582d7313653214259839561800d389a54e8ad8c54fa9d088d07a9420d10ad11c32c1b0b2bb5e32785a9ff8f0656952ee109cbd6828b27110f4646321f6add043e9f55dac0fa9487c9a67993965c1f0c674686f8ac740455f01195d8c19f866f9b87561b2a86b7937cccc525e5cab35063b774fb7be730a67d05a753c936e2235a8a16c24a97b125d00f88dbf3d61aba7091e94b76d868a7b04bf4e315ee12dc68156b72301a67bfbd57d0bb3ad2e7dc65436a46b97def1d90e92c6d1257abd27dcf2f7329fc478f73fac6fe5d523ec27eaa09f8a5ca93c29926ce56e73f504b0304140000080800f482024b16f19ce9f8020000e51900000d000000786c2f7374796c65732e786d6ced995b6bdb3014c7bf8ad07be3dab1bb25c42eac25d0878d415bd8ab224b8ea82c195bee927dfa1df9920bed489772fad404a2db39ff23eb879483bcb8de949a3c8bba51d6a4349c5c52220cb7b932454a1f1f96175fe975b668dc568bfbb5108e80bd6952ba76ae9a0741c3d7a264cdc456c2c088b475c91c34eb2268aa5ab0bcf14ea50ea2cbcbaba064cad05e615ef2b78894ac7e6aab0b6ecb8a39b5525ab96da735ca6cc298bd542a15af6d63a59b806760a5545cbc9cd02c98058c5352f2f95d616ccd565aa4b453a4d9425ae31ac26d6b5c4a1388e7fbe74fc6fe364b3f04ab3558c1fafc21cf4c434f48836c615829faf60dd36a552bdf19f4966fb6e756db9ad4c52aa5cbe1738eccea0c1f75864fbbf7e98a067c95d6bb05bca27d47b600904ed466090d32d41fb6152cbcb146f48fd8d9f9dfe0a45363b5cabd767173b860b733ffed1660185026171b91c34ce22ec881e251c87362cdbecc928f882525bf12928b8f8ac5a590ff1bab2b80fecad6391c2b23ff888e5dd9420be9c0bd56c5da97ce563e86750ef66ab6c8152bac619e7d307af42519871e2b981fd38da0bbae5bd89663671f817487564add1a0e9d713fb1d659bf71bdb8371a6671d2b6b3eaa67ad2146cc6a73969db9bbdfecc430596920badefbdd22fb95b4f7ff66c24316db92cdd1d208183dbefbbb10a10866a2fd337bcfea15aaf7d201b9d254b5855e9ad3f15fdc4861698ee5bdf3aebe1b1ff1520c40e10610798620788b1031c408eb02147d890236cc81136e4081b728c0d39c6861c63438eb121c79f903f21bf1b72820d39c1869c60434eb02127d8908ffef443ecc42bc44ebc42ecc42bc44ebc42ecc42bc44ebc42ecc42bc44ebc42ecc40b03f2141bf2141bf2141bf2141bf2141b728c0d39c6861c63438eb121c7d890136cc80936e4041b72820df97d0182e116ece0aaede8a26dd74bfcdd774a7ff837149a928d1cf3815669a7cc2b976ca0996ff6f76bdda8f32f1a8ea380462e246bb57bd80da6745fff2e72d596b39dd54ff56cdd60b5aff756fdddecfe954df617504b0304140000080800f482024bc9ef6c84840200007b0b000018000000786c2f776f726b7368656574732f7368656574312e786d6ca5965b53ea301485ff4a26ef1252b98853ea8078450505c7e75802cdb149982478f9f7067ad1b135ed411e0aeddadfca4a3609f827ef3c06af546926451fe24613022a42b96062d5878ff3f3832308b42162416229681f7e500d4f02ff4daa171d516a80e585eec3c898f531423a8c2827ba21d7545865291527c6deaa15d26b45c96207f11879cd660771c2044c1c8e551d0fb95cb2908e64b8e15498c444d198189b5e476cad33371ed6b1e344bd6cd607a1e46b6bf1cc62663e76a699cd3b6e91a21367a1925a2e4dc39269a6e2f47aa8874808010f8faf56422af21cdbf5db39c2c00f65ac7757c0d976e16d1d79dfbdbfb18589eca73604e1461bc99fd207107d03bc14f0be80ae13384c81c31ce86027d04a81560e78ee48ed1468e780bbbe93d6776ad677d3faeed7943d277094024739d073d6f7d2fa5ecd40b89975ad593712ce1b8d6b86c259a7b1573756d66a7c583b56d66cdcaa1b2beb36aedb6e9cf51b776ac7ca5a8ebbee5828d94ebbdd37228604be926f406d556b074c1f321133416746c1ede3815d7dbddd3c81cf2c6782a9922b45381853f58ff8c858cbad80c2527cf8139f6d9ec1ff599cfeb4984b43623033c46c3418bc444c01dd5880f913a87eb52a871b15869bcc0737e081929869a2593e56b5d559c18a441b51899dffc41ec6836925755158e96f0b54495f16c6cce65b895eed15f7fa4f71c7fbc7bdd92beeed9fe2deed1f77b257dce99fe2ded78c8becd1919f1fde2fe7c797cbe964380083dbc90c0ca77380abcf8edfd0d9e3b00416c969b1855e830ef67cf45a50474ef52c51bd266e97c9e7898cad5e265f64729978e912af72e332f53a4b55aa8e9dea8dd3f9d6c9de39d589d379ea64ef8b6af25542df7e9650fec739f804504b01021400140000080800f482024b98daeb8bae000000270100000b00000000000000000000000000000000005f72656c732f2e72656c73504b01021400140000080800f482024b2655e01e15010000db0200001300000000000000000000000000d70000005b436f6e74656e745f54797065735d2e786d6c504b01021400140000080800f482024bab212c6ec2000000a70100001a000000000000000000000000001d020000786c2f5f72656c732f776f726b626f6f6b2e786d6c2e72656c73504b01021400140000080800f482024b4149c5a23c010000190200000f0000000000000000000000000017030000786c2f776f726b626f6f6b2e786d6c504b01021400140000080800f482024b16f19ce9f8020000e51900000d0000000000000000000000000080040000786c2f7374796c65732e786d6c504b01021400140000080800f482024bc9ef6c84840200007b0b00001800000000000000000000000000a3070000786c2f776f726b7368656574732f7368656574312e786d6c504b05060000000006000600800100005d0a00000000, 3059, 2017, '2017-08-09 02:53:40', 1),
(7, '2017', 'docx', 0x504b0304140000080800f482024b98daeb8bae000000270100000b0000005f72656c732f2e72656c738dcfc10e82300c06e057597a978107630c838b31e16af001e6560601d6659b0a6fef8e623c786cfaf7fbd3b25ee6893dd18781ac8022cb81a155a4076b04dcdacbee082c4469b59cc8a2801503d45579c549c67412fac105960c1b04f431ba13e741f538cb9091439b361df959c6347ac39d54a334c8f7797ee0fed380adc91a2dc037ba00d6ae0effb1a9eb068567528f196dfc51f19548b2f406a38065e22ff2e39d68cc120abc2af9e6c1ea0d504b0304140000080800f482024b2655e01e15010000db020000130000005b436f6e74656e745f54797065735d2e786d6cad52cb4ec33010fc15cb5714bbe580106ada038f2370281fb0389bc48d5ff2baa5f97b1c9772a84ab9f4b45acfccceecca8bd5de1ab6c348dabb9acfc58c3374ca37da7535ff58bf54f79c5102d780f10e6b3e22f1d572b11e0312cb5a4735ef530a0f5292ead102091fd065a4f5d142ca6dec6400354087f27636bb93cabb842e55699ac1978b276c616b127bdee7e7438e2ce7ecf1c09bac6a0e2118ad2065584ea83cab8b68e88270e79a9374d54f3291958543bd0e74f3b7c3266077e2a0edb45a01b2e62d1f33ea06d93bc4f40a3613e4dec82f1f874fef077179b533097ddb6a858d575b9b2582424468a8474cd688528505ed8e992ff81732c952e6570ef23bff9f1c94468374ed2b94a14767593ee7f21b504b0304140000080800f482024bab212c6ec2000000a70100001a000000786c2f5f72656c732f776f726b626f6f6b2e786d6c2e72656c73ad90cd0a02310c845fa5e4ee66770f2262f5228257d10728ddec0feeb6a5893ffbf6164551f0e0c15398847c33cc62751d7a75a6c89d771a8a2c0745cefaaa738d86c37e3399816231ae32bd77a4612486d572b1a3de487ae1b60bac12c3b1865624cc11d9b63418ce7c20972eb58f8391246383c1d8a36908cb3c9f627c67c027536d2b0d715b15a0f663a05fd8beae3b4b6b6f4f0339f96281171f8fdc1249829ad8906878ad18efa3c81215f07b98f29f6158c63e75f94af2d04f7bfc28787903504b0304140000080800f482024b4149c5a23c010000190200000f000000786c2f776f726b626f6f6b2e786d6c8d51cb6ec23010fc15cbf7e20415441101f5a972a9501f7036f18658d8dec8761af8fb6e8c28f4d693677735b333ebd9e2600dfb061f34ba82e7838c3370252aed7605fffa7cb9997016a2744a1a7450f02304be98cf3af4fb2de29e11dd8582d7313653214259839561800d389a54e8ad8c54fa9d088d07a9420d10ad11c32c1b0b2bb5e32785a9ff8f0656952ee109cbd6828b27110f4646321f6add043e9f55dac0fa9487c9a67993965c1f0c674686f8ac740455f01195d8c19f866f9b87561b2a86b7937cccc525e5cab35063b774fb7be730a67d05a753c936e2235a8a16c24a97b125d00f88dbf3d61aba7091e94b76d868a7b04bf4e315ee12dc68156b72301a67bfbd57d0bb3ad2e7dc65436a46b97def1d90e92c6d1257abd27dcf2f7329fc478f73fac6fe5d523ec27eaa09f8a5ca93c29926ce56e73f504b0304140000080800f482024b16f19ce9f8020000e51900000d000000786c2f7374796c65732e786d6ced995b6bdb3014c7bf8ad07be3dab1bb25c42eac25d0878d415bd8ab224b8ea82c195bee927dfa1df9920bed489772fad404a2db39ff23eb879483bcb8de949a3c8bba51d6a4349c5c52220cb7b932454a1f1f96175fe975b668dc568bfbb5108e80bd6952ba76ae9a0741c3d7a264cdc456c2c088b475c91c34eb2268aa5ab0bcf14ea50ea2cbcbaba064cad05e615ef2b78894ac7e6aab0b6ecb8a39b5525ab96da735ca6cc298bd542a15af6d63a59b806760a5545cbc9cd02c98058c5352f2f95d616ccd565aa4b453a4d9425ae31ac26d6b5c4a1388e7fbe74fc6fe364b3f04ab3558c1fafc21cf4c434f48836c615829faf60dd36a552bdf19f4966fb6e756db9ad4c52aa5cbe1738eccea0c1f75864fbbf7e98a067c95d6bb05bca27d47b600904ed466090d32d41fb6152cbcb146f48fd8d9f9dfe0a45363b5cabd767173b860b733ffed1660185026171b91c34ce22ec881e251c87362cdbecc928f882525bf12928b8f8ac5a590ff1bab2b80fecad6391c2b23ff888e5dd9420be9c0bd56c5da97ce563e86750ef66ab6c8152bac619e7d307af42519871e2b981fd38da0bbae5bd89663671f817487564add1a0e9d713fb1d659bf71bdb8371a6671d2b6b3eaa67ad2146cc6a73969db9bbdfecc430596920badefbdd22fb95b4f7ff66c24316db92cdd1d208183dbefbbb10a10866a2fd337bcfea15aaf7d201b9d254b5855e9ad3f15fdc4861698ee5bdf3aebe1b1ff1520c40e10610798620788b1031c408eb02147d890236cc81136e4081b728c0d39c6861c63438eb121c79f903f21bf1b72820d39c1869c60434eb02127d8908ffef443ecc42bc44ebc42ecc42bc44ebc42ecc42bc44ebc42ecc42bc44ebc42ecc40b03f2141bf2141bf2141bf2141bf2141b728c0d39c6861c63438eb121c7d890136cc80936e4041b72820df97d0182e116ece0aaede8a26dd74bfcdd774a7ff837149a928d1cf3815669a7cc2b976ca0996ff6f76bdda8f32f1a8ea380462e246bb57bd80da6745fff2e72d596b39dd54ff56cdd60b5aff756fdddecfe954df617504b0304140000080800f482024bc9ef6c84840200007b0b000018000000786c2f776f726b7368656574732f7368656574312e786d6ca5965b53ea301485ff4a26ef1252b98853ea8078450505c7e75802cdb149982478f9f7067ad1b135ed411e0aeddadfca4a3609f827ef3c06af546926451fe24613022a42b96062d5878ff3f3832308b42162416229681f7e500d4f02ff4daa171d516a80e585eec3c898f531423a8c2827ba21d7545865291527c6deaa15d26b45c96207f11879cd660771c2044c1c8e551d0fb95cb2908e64b8e15498c444d198189b5e476cad33371ed6b1e344bd6cd607a1e46b6bf1cc62663e76a699cd3b6e91a21367a1925a2e4dc39269a6e2f47aa8874808010f8faf56422af21cdbf5db39c2c00f65ac7757c0d976e16d1d79dfbdbfb18589eca73604e1461bc99fd207107d03bc14f0be80ae13384c81c31ce86027d04a81560e78ee48ed1468e780bbbe93d6776ad677d3faeed7943d277094024739d073d6f7d2fa5ecd40b89975ad593712ce1b8d6b86c259a7b1573756d66a7c583b56d66cdcaa1b2beb36aedb6e9cf51b776ac7ca5a8ebbee5828d94ebbdd37228604be926f406d556b074c1f321133416746c1ede3815d7dbddd3c81cf2c6782a9922b45381853f58ff8c858cbad80c2527cf8139f6d9ec1ff599cfeb4984b43623033c46c3418bc444c01dd5880f913a87eb52a871b15869bcc0737e081929869a2593e56b5d559c18a441b51899dffc41ec6836925755158e96f0b54495f16c6cce65b895eed15f7fa4f71c7fbc7bdd92beeed9fe2deed1f77b257dce99fe2ded78c8becd1919f1fde2fe7c797cbe964380083dbc90c0ca77380abcf8edfd0d9e3b00416c969b1855e830ef67cf45a50474ef52c51bd266e97c9e7898cad5e265f64729978e912af72e332f53a4b55aa8e9dea8dd3f9d6c9de39d589d379ea64ef8b6af25542df7e9650fec739f804504b01021400140000080800f482024b98daeb8bae000000270100000b00000000000000000000000000000000005f72656c732f2e72656c73504b01021400140000080800f482024b2655e01e15010000db0200001300000000000000000000000000d70000005b436f6e74656e745f54797065735d2e786d6c504b01021400140000080800f482024bab212c6ec2000000a70100001a000000000000000000000000001d020000786c2f5f72656c732f776f726b626f6f6b2e786d6c2e72656c73504b01021400140000080800f482024b4149c5a23c010000190200000f0000000000000000000000000017030000786c2f776f726b626f6f6b2e786d6c504b01021400140000080800f482024b16f19ce9f8020000e51900000d0000000000000000000000000080040000786c2f7374796c65732e786d6c504b01021400140000080800f482024bc9ef6c84840200007b0b00001800000000000000000000000000a3070000786c2f776f726b7368656574732f7368656574312e786d6c504b05060000000006000600800100005d0a00000000, 3059, 2017, '2017-08-09 02:53:57', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `semester`
--

CREATE TABLE `semester` (
  `id_semester` int(11) NOT NULL,
  `semester` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `semester`
--

INSERT INTO `semester` (`id_semester`, `semester`) VALUES
(1, 'Semester 1'),
(2, 'Semester 2');

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
  `tahun` year(4) NOT NULL,
  `nilai` int(11) NOT NULL,
  `id_subgardu` int(11) NOT NULL,
  `id_gerbang` int(11) NOT NULL,
  `id_cabang` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_tinggi`
--

INSERT INTO `transaksi_tinggi` (`id_transaksi`, `tahun`, `nilai`, `id_subgardu`, `id_gerbang`, `id_cabang`) VALUES
(220, 2010, 10, 1, 8, 1),
(221, 2010, 10, 2, 8, 1),
(222, 2010, 10, 3, 8, 1),
(223, 2010, 10, 4, 8, 1),
(224, 2010, 10, 5, 8, 1),
(225, 2010, 10, 6, 8, 1),
(226, 2010, 10, 7, 8, 1),
(227, 2010, 10, 1, 9, 1),
(228, 2010, 10, 2, 9, 1),
(229, 2010, 10, 3, 9, 1),
(230, 2010, 10, 4, 9, 1),
(231, 2010, 10, 5, 9, 1),
(232, 2010, 10, 6, 9, 1),
(233, 2010, 10, 7, 9, 1);

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
(3, 'amostiberio', 'amos123', 2, 3),
(4, 'admin', '1234', 1, 0),
(5, 'adminamos', 'admin123', 1, 0);

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
  `tahun` int(11) NOT NULL,
  `id_gerbang` int(25) NOT NULL,
  `id_subgardu` int(25) NOT NULL,
  `id_cabang` int(25) NOT NULL,
  `id_semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `waktu_transaksi`
--

INSERT INTO `waktu_transaksi` (`id_waktutrans`, `nilai`, `tahun`, `id_gerbang`, `id_subgardu`, `id_cabang`, `id_semester`) VALUES
(326, 1, 2017, 8, 1, 1, 1),
(327, 2, 2017, 8, 2, 1, 1),
(328, 3, 2017, 8, 3, 1, 1),
(329, 4, 2017, 8, 4, 1, 1),
(330, 5, 2017, 8, 5, 1, 1),
(331, 6, 2017, 8, 6, 1, 1),
(332, 6, 2017, 8, 1, 1, 2),
(333, 3, 2017, 8, 2, 1, 2),
(334, 2, 2017, 8, 3, 1, 2),
(335, 4, 2017, 8, 4, 1, 2),
(336, 3, 2017, 8, 5, 1, 2),
(337, 1, 2017, 8, 6, 1, 2),
(338, 3, 2017, 21, 1, 1, 1),
(339, 5, 2017, 21, 2, 1, 1),
(340, 4, 2017, 21, 3, 1, 1),
(341, 3, 2017, 21, 4, 1, 1),
(342, 5, 2017, 21, 5, 1, 1),
(343, 6, 2017, 21, 6, 1, 1),
(344, 2, 2017, 21, 1, 1, 2),
(345, 4, 2017, 21, 2, 1, 2),
(346, 3, 2017, 21, 3, 1, 2),
(347, 3, 2017, 21, 4, 1, 2),
(348, 6, 2017, 21, 5, 1, 2),
(349, 6, 2017, 21, 6, 1, 2),
(350, 2, 2017, 23, 1, 2, 1),
(351, 3, 2017, 23, 2, 2, 1),
(352, 4, 2017, 23, 3, 2, 1),
(353, 5, 2017, 23, 4, 2, 1),
(354, 3, 2017, 23, 5, 2, 1),
(355, 4, 2017, 23, 6, 2, 1),
(356, 2, 2017, 23, 1, 2, 2),
(357, 4, 2017, 23, 2, 2, 2),
(358, 5, 2017, 23, 3, 2, 2),
(359, 4, 2017, 23, 4, 2, 2),
(360, 3, 2017, 23, 5, 2, 2),
(361, 5, 2017, 23, 6, 2, 2),
(362, 2, 2017, 30, 1, 2, 2),
(363, 5, 2017, 30, 2, 2, 2),
(364, 4, 2017, 30, 3, 2, 2),
(365, 4, 2017, 30, 4, 2, 2),
(366, 3, 2017, 30, 5, 2, 2),
(367, 2, 2017, 30, 6, 2, 2),
(368, 4, 2017, 30, 1, 2, 1),
(369, 3, 2017, 30, 2, 2, 1),
(370, 5, 2017, 30, 3, 2, 1),
(371, 2, 2017, 30, 4, 2, 1),
(372, 4, 2017, 30, 5, 2, 1),
(373, 5, 2017, 30, 6, 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wt_rencana`
--

CREATE TABLE `wt_rencana` (
  `id_wtrencana` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `id_subgardu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `wt_rencana`
--

INSERT INTO `wt_rencana` (`id_wtrencana`, `nilai`, `id_subgardu`) VALUES
(1, 5, 2),
(2, 9, 3),
(3, 6, 1),
(4, 4, 5),
(5, 5, 4),
(6, 10, 9);

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
-- Indexes for table `data_csi`
--
ALTER TABLE `data_csi`
  ADD PRIMARY KEY (`id_csi`);

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
-- Indexes for table `locker_realisasilaporan`
--
ALTER TABLE `locker_realisasilaporan`
  ADD PRIMARY KEY (`id_locker`);

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
-- Indexes for table `referensifile_role`
--
ALTER TABLE `referensifile_role`
  ADD PRIMARY KEY (`id_referensirole`);

--
-- Indexes for table `referensi_file`
--
ALTER TABLE `referensi_file`
  ADD PRIMARY KEY (`id_referensi`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id_semester`);

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
-- Indexes for table `wt_rencana`
--
ALTER TABLE `wt_rencana`
  ADD PRIMARY KEY (`id_wtrencana`);

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
  MODIFY `id_cabang` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
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
-- AUTO_INCREMENT for table `data_csi`
--
ALTER TABLE `data_csi`
  MODIFY `id_csi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `gerbang`
--
ALTER TABLE `gerbang`
  MODIFY `id_gerbang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `jml_gardutersedia`
--
ALTER TABLE `jml_gardutersedia`
  MODIFY `id_gardutersedia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;
--
-- AUTO_INCREMENT for table `locker_realisasilaporan`
--
ALTER TABLE `locker_realisasilaporan`
  MODIFY `id_locker` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `panjang_antrian`
--
ALTER TABLE `panjang_antrian`
  MODIFY `id_pa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `pengumpul_tol`
--
ALTER TABLE `pengumpul_tol`
  MODIFY `id_pt` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `program_kerja`
--
ALTER TABLE `program_kerja`
  MODIFY `id_pk` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `realisasi_laporan`
--
ALTER TABLE `realisasi_laporan`
  MODIFY `id_realisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `referensifile_role`
--
ALTER TABLE `referensifile_role`
  MODIFY `id_referensirole` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `referensi_file`
--
ALTER TABLE `referensi_file`
  MODIFY `id_referensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `sub_program`
--
ALTER TABLE `sub_program`
  MODIFY `id_sp` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `transaksi_tinggi`
--
ALTER TABLE `transaksi_tinggi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `waktu_transaksi`
--
ALTER TABLE `waktu_transaksi`
  MODIFY `id_waktutrans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=374;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
