-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 28, 2015 at 01:04 
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

