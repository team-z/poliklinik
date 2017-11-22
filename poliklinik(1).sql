-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2017 at 12:32 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `poliklinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE IF NOT EXISTS `bayar` (
  `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `id_bayar` varchar(11) NOT NULL,
  `id_pasien` varchar(11) NOT NULL,
  `biaya_daftar` int(11) NOT NULL,
  `biaya_dokter` int(11) NOT NULL,
  `biaya_obat` int(11) NOT NULL,
  `biaya_total` int(11) NOT NULL,
  `uang_bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `Status` varchar(11) NOT NULL,
  PRIMARY KEY (`id_pembayaran`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `bayar`
--

INSERT INTO `bayar` (`id_pembayaran`, `id_bayar`, `id_pasien`, `biaya_daftar`, `biaya_dokter`, `biaya_obat`, `biaya_total`, `uang_bayar`, `kembalian`, `Status`) VALUES
(1, 'RB0001', 'P0001', 5000, 100000, 150000, 255000, 300000, 45000, 'LUNAS'),
(2, 'RB0002', 'P0002', 5000, 200000, 200000, 405000, 410000, 5000, 'LUNAS'),
(3, 'RB0003', 'P0003', 5000, 100000, 500000, 605000, 700000, 95000, 'LUNAS'),
(4, 'RB0004', 'P0004', 5000, 300000, 300000, 605000, 680000, 75000, 'LUNAS'),
(5, 'RB0005', 'P0005', 5000, 200000, 250000, 455000, 460000, 5000, 'LUNAS');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE IF NOT EXISTS `dokter` (
  `id_dokter` char(8) NOT NULL,
  `id_poli` varchar(255) NOT NULL,
  `id_resep` int(11) NOT NULL,
  `nama_dokter` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` varchar(255) NOT NULL,
  `bulan_lahir` varchar(255) NOT NULL,
  `tahun_lahir` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `spesialisasi` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `tarif` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id_dokter`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `id_poli`, `id_resep`, `nama_dokter`, `tempat_lahir`, `tanggal_lahir`, `bulan_lahir`, `tahun_lahir`, `alamat`, `no_hp`, `spesialisasi`, `foto`, `bio`, `tarif`, `status`) VALUES
('D0001', 'PL0002', 0, 'Putri', 'Malang', '31', '12', '1999', 'Jl MT Haryono', '08345234312', '', 'large.jpg', '---', 100000, 1),
('D0002', 'PL00001', 0, 'Dika', 'Lumajang', '3', '12', '1999', 'Lumajang', '08123456789', '', 'd225d0c593d80f01ef0df7e09e30fcbf--anime-sketch-boy-manga-boy-drawing.jpg', 'test', 200000, 2),
('D0003', 'PL0001', 0, 'Sabdari Bella Chrisdian', 'Magelang', '10', '6', '1999', 'dfsdfsdfsdfdsfsdfsdfs', '89439308038493943', '', '007a2ededa8b0ce87e048c60fa6f847b.jpg', 'fdsfsfsdfsdfsfds', 300000, 0),
('D0004', 'PL0002', 0, 'Kaneki', 'Tokyo', '10', '6', '1975', '???', '98765432', '', 'how-to-draw-kaneki-ken-from-tokyo-ghoul_3_000000016217_4.png', '????', 400000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE IF NOT EXISTS `obat` (
  `id_obat` varchar(11) NOT NULL,
  `nama_obat` varchar(255) NOT NULL,
  `type` enum('1','2','3','4','5') NOT NULL,
  `kategori` enum('1','2','3','4') NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id_obat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `type`, `kategori`, `harga_satuan`, `foto`) VALUES
('1', 'Bodrex', '1', '1', 10000, ''),
('2', 'parasetamol', '2', '2', 10000, ''),
('A0001', 'Insto', '3', '2', 1000, '');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE IF NOT EXISTS `pasien` (
  `id_pasien` varchar(11) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `umur_pasien` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` int(11) NOT NULL,
  `bulan_lahir` int(11) NOT NULL,
  `tahun_lahir` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `jenis_kelamin` int(2) NOT NULL,
  PRIMARY KEY (`id_pasien`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `umur_pasien`, `tempat_lahir`, `tanggal_lahir`, `bulan_lahir`, `tahun_lahir`, `alamat`, `no_hp`, `jenis_kelamin`) VALUES
('P0001', 'jovi', '16', 'Lumajang', 29, 1, 2000, 'sdfdsfsdfsdfsdfsdfsfsdfs', '3902302302302', 1),
('P0002', 'melody', '16', 'Surabaya', 15, 9, 2000, 'dhsuhuisdhfksdhfbdsbfsdhfuisdjkfdsfbsdbfdjfs', '1902813726732', 2),
('P0003', 'Nita', '18', 'Pronojiwo', 15, 3, 1999, 'saasasasasasa', '2801201820802801', 2),
('P0004', 'gamma', '18', 'pasirian', 7, 8, 1999, 'bjdnjsndjsnjdnsj', '891891289891289', 2),
('P0005', 'Synce', '17', 'Lumajang', 16, 6, 1999, 'dwdwdwwddcd', '81928120192891', 2),
('P0006', 'Theresia', '16', 'Surabaya', 7, 3, 2001, 'ddsdsdsds', '8299328932', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id_bayar` char(8) NOT NULL,
  `id_pasien` char(8) NOT NULL,
  `id_dokter` varchar(8) NOT NULL,
  `biaya_daftar` int(11) NOT NULL,
  `biaya_dokter` int(11) NOT NULL,
  `biaya_obat` int(11) NOT NULL,
  `total_biaya` int(11) NOT NULL,
  PRIMARY KEY (`id_bayar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_bayar`, `id_pasien`, `id_dokter`, `biaya_daftar`, `biaya_dokter`, `biaya_obat`, `total_biaya`) VALUES
('RB0001', 'P0001', '', 5000, 100000, 150000, 255000),
('RB0002', 'P0002', '', 5000, 200000, 200000, 405000),
('RB0003', 'P0003', '', 5000, 100000, 500000, 605000),
('RB0004', 'P0004', '', 5000, 300000, 300000, 605000),
('RB0005', 'P0005', '', 5000, 200000, 250000, 455000),
('RB0006', 'P0006', '', 5000, 500000, 1000000, 1505000),
('RB0007', 'P0003', '', 50000, 0, 0, 50000),
('RB0008', 'P0003', '', 50000, 200000, 0, 50000),
('RB0009', 'P0004', '', 50000, 200000, 0, 50000),
('RB0010', 'P0004', '', 50000, 200000, 0, 50000),
('RB0011', 'P0004', '', 50000, 300000, 0, 50000),
('RB0012', 'P0002', 'D0001', 50000, 100000, 0, 50000),
('RB0013', 'P0002', 'D0001', 50000, 100000, 0, 50000),
('RB0014', 'P0005', 'D0001', 50000, 100000, 0, 50000),
('RB0015', 'P0005', 'D0001', 50000, 100000, 0, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE IF NOT EXISTS `pendaftaran` (
  `id_pendaftaran` varchar(11) NOT NULL,
  `id_pasien` varchar(11) NOT NULL,
  `id_poli` varchar(11) NOT NULL,
  `id_dokter` varchar(11) NOT NULL,
  `tanggal_pendaftaran` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `biaya` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_pendaftaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `id_pasien`, `id_poli`, `id_dokter`, `tanggal_pendaftaran`, `biaya`, `keterangan`) VALUES
('PD0001', 'P0002', 'PL0002', 'D0003', '2017-11-18 15:31:54', 50000, 'sasa'),
('PD0002', 'P0002', 'PL00001', 'D0002', '2017-11-18 15:33:12', 50000, 'bkbkjb'),
('PD0003', 'P0001', 'PL00001', 'D0001', '2017-11-18 15:55:11', 50000, 'hkhk'),
('PD0004', 'P0003', 'PL0001', '', '2017-11-18 16:01:16', 50000, 'dsdsdsds'),
('PD0005', 'P0003', 'PL0001', '', '2017-11-18 16:01:25', 50000, 'dsdsdsds'),
('PD0006', 'P0003', 'PL00001', 'D0001', '2017-11-18 16:03:06', 50000, 'sasas'),
('PD0007', 'P0003', 'PL00001', 'D0001', '2017-11-18 16:03:08', 50000, 'sasas'),
('PD0008', 'P0003', 'PL00001', 'D0001', '2017-11-18 16:04:05', 50000, 'bjbjbj'),
('PD0009', 'P0003', 'PL00001', 'D0001', '2017-11-18 16:04:07', 50000, 'bjbjbj'),
('PD0010', 'P0003', 'PL00001', 'D0001', '2017-11-18 16:04:26', 50000, 'bjbjbj'),
('PD0011', 'P0003', 'PL00001', 'D0001', '2017-11-18 16:04:27', 50000, 'bjbjbj'),
('PD0012', 'P0003', 'PL0001', 'D0002', '2017-11-18 16:10:52', 50000, 'asas'),
('PD0013', 'P0003', 'PL0001', 'D0002', '2017-11-18 16:10:58', 50000, 'asas'),
('PD0014', 'P0003', 'PL0001', 'D0002', '2017-11-18 16:11:17', 50000, 'asas'),
('PD0015', 'P0002', 'PL0001', 'D0005', '2017-11-18 16:26:08', 50000, 'xsasa'),
('PD0016', 'P0002', 'PL0001', 'D0005', '2017-11-18 16:26:17', 50000, 'xsasa'),
('PD0017', 'P0001', 'PL0001', 'D0004', '2017-11-18 16:28:17', 50000, 'hjbh'),
('PD0018', 'P0001', 'PL0001', 'D0004', '2017-11-18 16:28:20', 50000, 'hjbh'),
('PD0019', 'P0001', 'PL0001', 'D0004', '2017-11-18 16:28:42', 50000, 'hjbh'),
('PD0020', 'P0001', 'PL0001', 'D0004', '2017-11-18 16:28:45', 50000, 'hjbh'),
('PD0021', 'P0001', 'PL0001', 'D0001', '2017-11-18 16:32:08', 50000, 'bjjb'),
('PD0022', 'P0001', 'PL0001', 'D0001', '2017-11-18 16:32:25', 50000, 'bjjb'),
('PD0023', 'P0006', 'PL0002', 'D0004', '2017-11-06 04:16:02', 50000, 'agsash'),
('PD0024', 'P0004', 'PL0002', 'D0001', '2017-11-06 07:16:52', 50000, 'kelilipan'),
('PD0026', 'P0003', 'PL0001', 'D0003', '2017-11-06 07:21:34', 50000, 'ndredek'),
('PD0027', 'P0003', 'PL00001', 'D0002', '2017-11-06 07:37:45', 50000, 'bengkak'),
('PD0028', 'P0004', 'PL00001', 'D0002', '2017-11-06 10:49:23', 50000, 'gemeter'),
('PD0029', 'P0004', 'PL00001', 'D0002', '2017-11-06 10:50:46', 50000, 'pokok sakit'),
('PD0030', 'P0004', 'PL0001', 'D0003', '2017-11-06 10:53:06', 50000, 'kejet2'),
('PD0031', 'P0002', 'PL0002', 'D0001', '2017-11-06 11:03:38', 50000, 'mata lelah'),
('PD0032', 'P0002', 'PL0002', 'D0001', '2017-11-06 11:06:42', 50000, 'mata lelah'),
('PD0033', 'P0005', 'PL0002', 'D0001', '2017-11-06 11:07:25', 50000, 'lelah'),
('PD0034', 'P0005', 'PL0002', 'D0001', '2017-11-06 11:08:18', 50000, 'capek');

-- --------------------------------------------------------

--
-- Table structure for table `poli`
--

CREATE TABLE IF NOT EXISTS `poli` (
  `id_poli` char(8) NOT NULL,
  `nama_poli` varchar(255) NOT NULL,
  PRIMARY KEY (`id_poli`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poli`
--

INSERT INTO `poli` (`id_poli`, `nama_poli`) VALUES
('PL00001', 'Poli Sekel'),
('PL0001', 'Poli Jantung'),
('PL0002', 'Poli Mata');

-- --------------------------------------------------------

--
-- Table structure for table `rekam`
--

CREATE TABLE IF NOT EXISTS `rekam` (
  `id_rekam` char(8) NOT NULL,
  `id_pasien` char(8) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_rekam`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekam`
--

INSERT INTO `rekam` (`id_rekam`, `id_pasien`, `tanggal`, `bulan`, `tahun`, `waktu`, `keterangan`) VALUES
('R0001', 'P0001', 0, 0, 0, '2017-11-19 03:39:58', 'sakit hati'),
('R0002', 'P0003', 0, 0, 0, '2017-11-06 01:27:47', 'ndredek');

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE IF NOT EXISTS `resep` (
  `id_resep` char(8) NOT NULL,
  `id_pasien` char(8) NOT NULL,
  `id_obat` char(8) NOT NULL,
  `id_bayar` varchar(11) NOT NULL,
  `jumlah_obat` int(11) NOT NULL,
  `dosis` varchar(255) NOT NULL,
  `total_harga` int(11) NOT NULL,
  PRIMARY KEY (`id_resep`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resep`
--

INSERT INTO `resep` (`id_resep`, `id_pasien`, `id_obat`, `id_bayar`, `jumlah_obat`, `dosis`, `total_harga`) VALUES
('RS0001', 'P0001', '1', '', 12, 'dfdf', 120000),
('RS0002', 'P0001', 'A0001', '', 1212, 'hghngf', 1212000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('admin','poli','apotek','resepsionis','kasir') NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` varchar(255) NOT NULL,
  `bulan_lahir` varchar(255) NOT NULL,
  `tahun_lahir` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user`, `password`, `status`, `tempat_lahir`, `tanggal_lahir`, `bulan_lahir`, `tahun_lahir`, `alamat`, `no_hp`, `gambar`, `nama_lengkap`) VALUES
(1, 'admin', 'admin', 'admin', 'Jatim', '3', '1', '1999', 'lumajang', '08123456789', 'user.jpg', 'ADMINISTRATOR'),
(2, 'poli', 'poli', 'poli', 'lumajang', '10', '9', '1962', 'lumajang', '08124356783', 'pein_sama_by_evilaka-d5q60f6.jpg', 'MASTER POLI'),
(3, 'apotek', 'apotek', 'apotek', 'Akihabara', '5', '4', '1998', 'Tokyo', '0998765432', 's2Vhf0Mu.png', 'KAORI MIYAZONO'),
(4, 'resepsionis', 'resepsionis', 'resepsionis', 'tokyo', '1', '1', '1957', 'Tokyo', '987654321', 'arima_kousei_by_axionfong-db21fyw.jpg', 'ARIMA KOUSEI'),
(5, 'kasir', 'kasir', 'kasir', '??', '1', '1', '1957', '??', '08123456789', '0950c553f0f5b0ab00c46cc9f55614f6.jpg', 'JUN NARUSE');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
