-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 28, 2015 at 01:05 
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bibit`
--

-- --------------------------------------------------------

--
-- Table structure for table `bibit`
--

CREATE TABLE IF NOT EXISTS `bibit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `usia` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=213 ;

--
-- Dumping data for table `bibit`
--

INSERT INTO `bibit` (`id`, `kode`, `jenis`, `usia`, `jumlah`) VALUES
(200, 'SW1', 'Sawit', '1 Tahun', 69975),
(203, 'SW2', 'Sawit', '2 Tahun', 50000),
(209, 'KR1', 'Karet', '1 Tahun', 200000),
(210, 'KR2', 'Karet', '2 Tahun', 150000),
(211, 'KK1', 'Kakao', '1 Tahun', 199950),
(212, 'KK2', 'Kakao', '2 Tahun', 149975);

-- --------------------------------------------------------

--
-- Table structure for table `distribusi`
--

CREATE TABLE IF NOT EXISTS `distribusi` (
  `id_dist` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `jumlah_dist` int(11) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  PRIMARY KEY (`id_dist`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=507 ;

--
-- Dumping data for table `distribusi`
--

INSERT INTO `distribusi` (`id_dist`, `nik`, `nama`, `kode`, `jumlah_dist`, `tanggal`) VALUES
(506, '149060407890001', 'Guntur Khadafi', 'KK2', 25, '12/07/2015');

-- --------------------------------------------------------

--
-- Table structure for table `kepala`
--

CREATE TABLE IF NOT EXISTS `kepala` (
  `nama` varchar(50) NOT NULL,
  `nip` varchar(50) NOT NULL,
  PRIMARY KEY (`nip`),
  UNIQUE KEY `nama` (`nama`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kepala`
--

INSERT INTO `kepala` (`nama`, `nip`) VALUES
('Wandi Gunawan', '1982 0628 201001 1 015');

-- --------------------------------------------------------

--
-- Table structure for table `keuangan`
--

CREATE TABLE IF NOT EXISTS `keuangan` (
  `id_keuangan` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_keuangan` varchar(20) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`id_keuangan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `keuangan`
--


-- --------------------------------------------------------

--
-- Table structure for table `penerima`
--

CREATE TABLE IF NOT EXISTS `penerima` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `id_wilayah` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nik` (`nik`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=307 ;

--
-- Dumping data for table `penerima`
--

INSERT INTO `penerima` (`id`, `nik`, `nama`, `jk`, `id_wilayah`, `kode`) VALUES
(306, '149060407890001', 'Guntur Khadafi', 'Pria', 400, 'KK2');

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE IF NOT EXISTS `surat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor` varchar(50) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `perihal` varchar(50) NOT NULL,
  `file` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=701 ;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id`, `nomor`, `tanggal`, `perihal`, `file`) VALUES
(700, '02/DISBUN/II/2015', '02/02/2015', 'Pemberitahuan', 'New Text Document.txt');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=106 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `nip`, `level`) VALUES
(100, 'balai', 'balai', 'Balai', '333009', 'balai'),
(104, 'dinas', 'dinas', 'Dinas', '124455', 'dinas');

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

CREATE TABLE IF NOT EXISTS `wilayah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kecamatan` varchar(50) NOT NULL,
  `desa` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=402 ;

--
-- Dumping data for table `wilayah`
--

INSERT INTO `wilayah` (`id`, `kecamatan`, `desa`) VALUES
(400, 'Benai', 'Koto Benai'),
(401, 'Benai', 'Benai');
