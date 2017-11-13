-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2017 at 08:52 AM
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
  PRIMARY KEY (`id_dokter`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `id_poli`, `id_resep`, `nama_dokter`, `tempat_lahir`, `tanggal_lahir`, `bulan_lahir`, `tahun_lahir`, `alamat`, `no_hp`, `spesialisasi`, `foto`, `bio`) VALUES
('D0001', 'PL0002', 0, 'Putri', 'Malang', '31', '12', '1999', 'Jl MT Haryono', '08345234312', '', '', '---'),
('D0002', 'PL0003', 0, 'Dika', 'Lumajang', '3', '12', '1999', 'Lumajang', '08123456789', '', '', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE IF NOT EXISTS `obat` (
  `id_obat` int(11) NOT NULL AUTO_INCREMENT,
  `nama_obat` varchar(255) NOT NULL,
  `type` enum('pil','sirup','umum') NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id_obat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE IF NOT EXISTS `pasien` (
  `id_pasien` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pasien` varchar(255) NOT NULL,
  `umur_pasien` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` int(11) NOT NULL,
  `bulan_lahir` int(11) NOT NULL,
  `tahun_lahir` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `no hp` varchar(255) NOT NULL,
  `id_poli` int(11) NOT NULL,
  `jenis_kelamin` enum('1','2') NOT NULL,
  PRIMARY KEY (`id_pasien`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
('PL0001', 'Poli Jantung'),
('PL0002', 'Poli Mata'),
('PL0003', 'Poli Umum');

-- --------------------------------------------------------

--
-- Table structure for table `rekam`
--

CREATE TABLE IF NOT EXISTS `rekam` (
  `id_rekam` int(11) NOT NULL AUTO_INCREMENT,
  `id_pasien` int(11) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_rekam`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE IF NOT EXISTS `resep` (
  `id_resep` int(11) NOT NULL AUTO_INCREMENT,
  `id_dokter` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `jumlah obat` int(11) NOT NULL,
  `dosis` varchar(255) NOT NULL,
  `total_harga` int(11) NOT NULL,
  PRIMARY KEY (`id_resep`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user`, `password`, `status`, `tempat_lahir`, `tanggal_lahir`, `bulan_lahir`, `tahun_lahir`, `alamat`, `no_hp`, `gambar`, `nama_lengkap`) VALUES
(1, 'admin@admin.com', 'admin', 'admin', 'lumajang', '3', 'Januari', '1999', 'lumajang', '08123456789', '', ''),
(2, 'poli@poli.com', 'poli', 'poli', 'lumajang', '9', 'Maret', '2003', 'lumajang', '08124356783', '', ''),
(3, 'apotek', 'apotek', 'apotek', '', '', '', '', '', '', '', ''),
(4, 'resepsionis', 'resepsionis', 'resepsionis', '', '', '', '', '', '', '', ''),
(5, 'kasir', 'kasir', 'kasir', '', '', '', '', '', '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
