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
-- Table structure for table `dp_skp_tahunan`
--

CREATE TABLE `dp_skp_tahunan` (
  `id_skp` int(11) NOT NULL,
  `id_uraian_kegiatan` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `id_unit` varchar(255) NOT NULL,
  `id_pangkat` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_skp_tahunan_ft` int(9) NOT NULL,
  `nip` bigint(20) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `ttl_angkakredit` float NOT NULL,
  `tgl_input` date NOT NULL,
  `status_periksa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dp_skp_tahunan`
--

INSERT INTO `dp_skp_tahunan` (`id_skp`, `id_uraian_kegiatan`, `id_pegawai`, `id_satuan`, `id_unit`, `id_pangkat`, `id_jabatan`, `id_skp_tahunan_ft`, `nip`, `kuantitas`, `ttl_angkakredit`, `tgl_input`, `status_periksa`) VALUES
(1, 2, 45, 7, 'yaBuMh4XXGxmW7CP1UbWpLvdAw==', 14, 995, 1, 196312311984122033, 100, 11, '2022-02-23', 'Diperiksa Atasan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dp_skp_tahunan`
--
ALTER TABLE `dp_skp_tahunan`
  ADD PRIMARY KEY (`id_skp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dp_skp_tahunan`
--
ALTER TABLE `dp_skp_tahunan`
  MODIFY `id_skp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
