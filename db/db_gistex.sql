-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 12, 2021 at 03:24 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gistex`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbjabatan`
--

DROP TABLE IF EXISTS `tbjabatan`;
CREATE TABLE IF NOT EXISTS `tbjabatan` (
  `idJabatan` int(11) NOT NULL AUTO_INCREMENT,
  `namaJabatan` varchar(100) NOT NULL,
  PRIMARY KEY (`idJabatan`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbjabatan`
--

INSERT INTO `tbjabatan` (`idJabatan`, `namaJabatan`) VALUES
(1, 'Staff'),
(2, 'Suvervisor'),
(16, 'Operator'),
(17, 'Departement Head');

-- --------------------------------------------------------

--
-- Table structure for table `tbsuperior`
--

DROP TABLE IF EXISTS `tbsuperior`;
CREATE TABLE IF NOT EXISTS `tbsuperior` (
  `idSuperior` int(11) NOT NULL AUTO_INCREMENT,
  `usernameBawahan` int(11) NOT NULL,
  `usernameSuperior` int(11) NOT NULL,
  PRIMARY KEY (`idSuperior`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbsuperior`
--

INSERT INTO `tbsuperior` (`idSuperior`, `usernameBawahan`, `usernameSuperior`) VALUES
(6, 1002, 1000),
(5, 1001, 1000),
(4, 1111, 1000),
(7, 1003, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

DROP TABLE IF EXISTS `tbuser`;
CREATE TABLE IF NOT EXISTS `tbuser` (
  `username` int(11) NOT NULL,
  `fullNameUser` varchar(255) NOT NULL,
  `genderUser` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `addressUser` text NOT NULL,
  `idJabatan` int(11) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`username`, `fullNameUser`, `genderUser`, `password`, `addressUser`, `idJabatan`) VALUES
(1001, 'Santi', 'Female', 'ef4ee5401f8eebcd278d09bbeebc9e97', ' Perum Holis Block C No 12', 2),
(1002, 'Sony Kurniawan', 'Male', '2e18b0a44d0ec0f6452d9a018a5c7f41', ' Babakan Jeruk 1 no 32', 1),
(1000, 'Andi Setiawan', 'Male', '862c2e7563c99d7454b1e4de1f1fad51', ' Nanjung', 17),
(1003, 'Agus Rony', 'Male', '334195e9a2d621adf9acbc3a74fb8e86', ' Jl. Lembang No 10', 16);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
