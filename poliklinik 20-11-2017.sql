-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2017 at 12:35 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poliklinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE `bayar` (
  `id_pembayaran` int(11) NOT NULL,
  `id_bayar` varchar(11) NOT NULL,
  `id_pasien` varchar(11) NOT NULL,
  `biaya_daftar` int(11) NOT NULL,
  `biaya_dokter` int(11) NOT NULL,
  `biaya_obat` int(11) NOT NULL,
  `biaya_total` int(11) NOT NULL,
  `uang_bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `Status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `dokter` (
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
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `id_poli`, `id_resep`, `nama_dokter`, `tempat_lahir`, `tanggal_lahir`, `bulan_lahir`, `tahun_lahir`, `alamat`, `no_hp`, `spesialisasi`, `foto`, `bio`, `status`) VALUES
('D0001', 'PL0002', 0, 'Putri', 'Malang', '31', '12', '1999', 'Jl MT Haryono', '08345234312', '', '', '---', 1),
('D0002', 'PL00001', 0, 'Dika', 'Lumajang', '3', '12', '1999', 'Lumajang', '08123456789', '', '', 'test', 2),
('D0003', 'PL0001', 0, 'Sabdari Bella Chrisdian', 'Magelang', '10', '6', '1999', 'dfsdfsdfsdfdsfsdfsdfs', '89439308038493943', '', '', 'fdsfsfsdfsdfsfds', 0);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` varchar(11) NOT NULL,
  `nama_obat` varchar(255) NOT NULL,
  `type` enum('pil','sirup','umum') NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `type`, `stok`, `harga_satuan`, `foto`) VALUES
('1', 'jsdjsjs', 'pil', 100, 10000, 'kalska'),
('2', 'parasetamol', 'pil', 100, 10000, 'kalska'),
('A0001', 'asasa', 'pil', 200, 1000, 'kalska');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` varchar(11) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `umur_pasien` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` int(11) NOT NULL,
  `bulan_lahir` int(11) NOT NULL,
  `tahun_lahir` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `jenis_kelamin` int(2) NOT NULL
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

CREATE TABLE `pembayaran` (
  `id_bayar` char(8) NOT NULL,
  `id_pasien` char(8) NOT NULL,
  `biaya_daftar` int(11) NOT NULL,
  `biaya_dokter` int(11) NOT NULL,
  `biaya_obat` int(11) NOT NULL,
  `total_biaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_bayar`, `id_pasien`, `biaya_daftar`, `biaya_dokter`, `biaya_obat`, `total_biaya`) VALUES
('RB0001', 'P0001', 5000, 100000, 150000, 255000),
('RB0002', 'P0002', 5000, 200000, 200000, 405000),
('RB0003', 'P0003', 5000, 100000, 500000, 605000),
('RB0004', 'P0004', 5000, 300000, 300000, 605000),
('RB0005', 'P0005', 5000, 200000, 250000, 455000),
('RB0006', 'P0006', 5000, 500000, 1000000, 1505000);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` varchar(11) NOT NULL,
  `id_pasien` varchar(11) NOT NULL,
  `id_poli` varchar(11) NOT NULL,
  `id_dokter` varchar(11) NOT NULL,
  `tanggal_pendaftaran` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `biaya` int(11) NOT NULL,
  `keterangan` text NOT NULL
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
('PD0022', 'P0001', 'PL0001', 'D0001', '2017-11-18 16:32:25', 50000, 'bjjb');

-- --------------------------------------------------------

--
-- Table structure for table `poli`
--

CREATE TABLE `poli` (
  `id_poli` char(8) NOT NULL,
  `nama_poli` varchar(255) NOT NULL
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

CREATE TABLE `rekam` (
  `id_rekam` char(8) NOT NULL,
  `id_pasien` char(8) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekam`
--

INSERT INTO `rekam` (`id_rekam`, `id_pasien`, `tanggal`, `bulan`, `tahun`, `waktu`, `keterangan`) VALUES
('R0001', 'P0001', 0, 0, 0, '2017-11-19 03:39:58', 'sakit hati');

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `id_resep` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `jumlah obat` int(11) NOT NULL,
  `dosis` varchar(255) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
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
  `nama_lengkap` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user`, `password`, `status`, `tempat_lahir`, `tanggal_lahir`, `bulan_lahir`, `tahun_lahir`, `alamat`, `no_hp`, `gambar`, `nama_lengkap`) VALUES
(1, 'admin@admin.com', 'admin', 'admin', 'lumajang', '3', 'Januari', '1999', 'lumajang', '08123456789', '', ''),
(2, 'poli@poli.com', 'poli', 'poli', 'lumajang', '9', 'Maret', '2003', 'lumajang', '08124356783', '', ''),
(3, 'apotek', 'apotek', 'apotek', '', '', '', '', '', '', '', ''),
(4, 'resepsionis', 'resepsionis', 'resepsionis', '', '', '', '', '', '', '', ''),
(5, 'kasir', 'kasir', 'kasir', '', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indexes for table `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indexes for table `rekam`
--
ALTER TABLE `rekam`
  ADD PRIMARY KEY (`id_rekam`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id_resep`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bayar`
--
ALTER TABLE `bayar`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `resep`
--
ALTER TABLE `resep`
  MODIFY `id_resep` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
