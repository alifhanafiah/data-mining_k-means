-- phpMyAdmin SQL Dump
-- version 3.1.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 31, 2018 at 11:37 PM
-- Server version: 5.1.35
-- PHP Version: 5.2.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_datamining`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `nama_lengkap` varchar(15) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama_lengkap`) VALUES
('alif', '0987', 'alif hanafiah');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(25) NOT NULL,
  `stok` int(2) NOT NULL,
  `jan` int(2) NOT NULL,
  `feb` int(2) NOT NULL,
  `mar` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `nama_barang`, `stok`, `jan`, `feb`, `mar`) VALUES
(1, 'Smartphone Samsung A701', 40, 5, 13, 3),
(2, 'Smartphone Samsung A702', 50, 5, 7, 2),
(3, 'Smartphone Samsung A703', 33, 2, 14, 7),
(4, 'Smartphone Samsung A704', 30, 2, 4, 6),
(5, 'Smartphone Samsung A705', 30, 3, 13, 7),
(6, 'Smart TV Google G800', 25, 6, 3, 3),
(7, 'Smart TV Google G801', 32, 21, 5, 2),
(8, 'Smart TV Google G802', 40, 9, 5, 23),
(9, 'Smart TV Google G803', 35, 10, 8, 2),
(10, 'Smart TV Google G804', 50, 29, 3, 12),
(11, 'Smart Fridge SHARP S01', 30, 5, 3, 2),
(12, 'Smart Fridge SHARP S02', 31, 3, 5, 24),
(13, 'Smart Fridge SHARP S03', 32, 5, 6, 9),
(14, 'Smart Fridge SHARP S04', 51, 3, 4, 7),
(15, 'Smart Fridge SHARP S05', 41, 4, 20, 15),
(16, 'Smart Watch APPLE M800', 20, 3, 7, 6),
(17, 'Smart Watch APPLE M801', 36, 10, 5, 12),
(18, 'Smart Watch APPLE M802', 32, 14, 6, 4),
(19, 'Smart Watch APPLE M803', 35, 23, 1, 5),
(20, 'Smart Watch APPLE M804', 63, 3, 37, 10);

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE IF NOT EXISTS `hasil` (
  `id_hasil` int(11) NOT NULL,
  `c1x` int(4) NOT NULL,
  `c2x` int(4) NOT NULL,
  `c1y` int(4) NOT NULL,
  `c2y` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `c1x`, `c2x`, `c1y`, `c2y`) VALUES
(1, 0, 0, 0, 0);
