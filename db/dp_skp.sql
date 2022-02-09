-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Feb 2022 pada 08.32
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

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
-- Struktur dari tabel `dp_skp`
--

CREATE TABLE `dp_skp` (
  `id_skp` int(11) NOT NULL,
  `id_uraian_kegiatan` int(11) NOT NULL,
  `nip` bigint(20) NOT NULL,
  `nip_pemeriksa` bigint(16) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `ttl_angkakredit` float NOT NULL,
  `tgl_input` date NOT NULL,
  `status_periksa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dp_skp`
--

INSERT INTO `dp_skp` (`id_skp`, `id_uraian_kegiatan`, `nip`, `nip_pemeriksa`, `kuantitas`, `ttl_angkakredit`, `tgl_input`, `status_periksa`) VALUES
(1, 1, 197301082014062003, 198306112005012004, 50, 0.05, '2022-02-09', 'Diperiksa Atasan'),
(2, 2, 197301082014062003, 198306112005012004, 200, 2.4, '2022-02-09', 'Diperiksa Atasan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dp_skp`
--
ALTER TABLE `dp_skp`
  ADD PRIMARY KEY (`id_skp`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dp_skp`
--
ALTER TABLE `dp_skp`
  MODIFY `id_skp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
