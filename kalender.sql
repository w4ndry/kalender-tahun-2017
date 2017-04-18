-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 18, 2017 at 07:17 PM
-- Server version: 10.1.22-MariaDB-1~xenial
-- PHP Version: 7.1.3-3+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kalender`
--

-- --------------------------------------------------------

--
-- Table structure for table `hari_libur`
--

CREATE TABLE `hari_libur` (
  `id` int(11) NOT NULL,
  `tanggal` varchar(10) NOT NULL,
  `bulan` varchar(25) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `hari_libur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hari_libur`
--

INSERT INTO `hari_libur` (`id`, `tanggal`, `bulan`, `tahun`, `hari_libur`) VALUES
(1, '1', '1', '2017', 'Tahun Baru Masehi'),
(2, '28', '1', '2017', 'Tahun Baru Imlek 2568 Kongzili'),
(3, '28', '3', '2017', 'Hari Raya Nyepi Tahun Baru Saka 1939'),
(4, '14', '4', '2017', 'Wafat Isa Al Masih'),
(5, '24', '4', '2017', 'Isra Miraj Nabi Muhammad SAW'),
(6, '1', '5', '2017', 'Hari Buruh Internasional'),
(7, '11', '5', '2017', 'Hari Raya Waisak 2561'),
(8, '25', '5', '2017', 'Kenaikan Isa Al Masih'),
(9, '01', '6', '2017', 'Hari Lahir Pancasila'),
(10, '25', '6', '2017', 'Hari Raya Idul Fitri 1438 Hijriah'),
(11, '26', '6', '2017', 'Hari Raya Idul Fitri 1438 Hijriah'),
(12, '17', '8', '2017', 'Hari Kemerdekaan Republik Indonesia'),
(13, '1', '9', '2017', 'Hari Raya Idul Adha 1438 Hijriah'),
(14, '21', '9', '2017', 'Tahun Baru Islam 1439 Hijriah'),
(15, '1', '12', '2017', 'Maulid Nabi Muhammad SAW'),
(16, '25', '12', '2017', 'Hari Raya Natal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hari_libur`
--
ALTER TABLE `hari_libur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hari_libur`
--
ALTER TABLE `hari_libur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
