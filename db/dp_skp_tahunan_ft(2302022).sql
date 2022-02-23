-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2022 at 02:39 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_dupak`
--

-- --------------------------------------------------------

--
-- Table structure for table `dp_skp_tahunan_ft`
--

CREATE TABLE `dp_skp_tahunan_ft` (
  `id_skp_tahunan_ft` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `dt_ml` date NOT NULL,
  `dt_ak` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dp_skp_tahunan_ft`
--

INSERT INTO `dp_skp_tahunan_ft` (`id_skp_tahunan_ft`, `id_pegawai`, `dt_ml`, `dt_ak`) VALUES
(1, 45, '2022-02-01', '2023-03-30'),
(2, 45, '2021-01-01', '2021-12-31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dp_skp_tahunan_ft`
--
ALTER TABLE `dp_skp_tahunan_ft`
  ADD PRIMARY KEY (`id_skp_tahunan_ft`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dp_skp_tahunan_ft`
--
ALTER TABLE `dp_skp_tahunan_ft`
  MODIFY `id_skp_tahunan_ft` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
