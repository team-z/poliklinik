-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2017 at 02:43 AM
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
  `id_dokter` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `id_poli`, `id_resep`, `nama_dokter`, `tempat_lahir`, `tanggal_lahir`, `bulan_lahir`, `tahun_lahir`, `alamat`, `no_hp`, `spesialisasi`, `foto`, `bio`) VALUES
(1, '1', 0, 'Ryan', 'Lumajang', '12', 'Januari', '1974', 'Lumajang', '08123456789', 'Bedah Jantung Koroner', '', 'Ryan Adalah seorang dokter Jantung'),
(2, '2', 0, 'Elysia', 'Sukodono', '2', 'Maret', '1976', 'Tekung', '08124567890', 'Mata Katarak', '', 'Elysia adalah seorang Dokter Mata dengan lulusan S3 di Universitas Harvard bidang kedokteran');

-- --------------------------------------------------------

--
-- Table structure for table `poli`
--

CREATE TABLE IF NOT EXISTS `poli` (
  `id_poli` int(11) NOT NULL AUTO_INCREMENT,
  `nama_poli` varchar(255) NOT NULL,
  PRIMARY KEY (`id_poli`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `poli`
--

INSERT INTO `poli` (`id_poli`, `nama_poli`) VALUES
(1, 'Poli Jantung'),
(2, 'Poli Mata');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('admin','poli','apoteker','resepsionis','kasir') NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` varchar(255) NOT NULL,
  `bulan_lahir` varchar(255) NOT NULL,
  `tahun_lahir` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user`, `password`, `status`, `tempat_lahir`, `tanggal_lahir`, `bulan_lahir`, `tahun_lahir`, `alamat`, `no_hp`, `gambar`, `nama_lengkap`) VALUES
(1, 'admin@admin.com', 'admin', 'admin', 'lumajang', '3', 'Januari', '1999', 'lumajang', '08123456789', '', ''),
(2, 'poli@poli.com', 'poli', 'poli', 'lumajang', '9', 'Maret', '2003', 'lumajang', '08124356783', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
