-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Feb 2022 pada 09.19
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
-- Struktur dari tabel `dp_skp_tahunan`
--

CREATE TABLE `dp_skp_tahunan` (
  `id_skp` int(11) NOT NULL,
  `id_uraian_kegiatan` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `id_unit` varchar(255) NOT NULL,
  `id_pangkat` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `nip` bigint(20) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `ttl_angkakredit` float NOT NULL,
  `tgl_input` date NOT NULL,
  `status_periksa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dp_skp_tahunan`
--

INSERT INTO `dp_skp_tahunan` (`id_skp`, `id_uraian_kegiatan`, `id_pegawai`, `id_satuan`, `id_unit`, `id_pangkat`, `id_jabatan`, `nip`, `kuantitas`, `ttl_angkakredit`, `tgl_input`, `status_periksa`) VALUES
(1, 1, 0, 0, '', 0, 0, 197301082014062003, 50, 0.05, '2022-02-09', 'Diperiksa Atasan'),
(2, 2, 0, 0, '', 0, 0, 197301082014062003, 200, 2.4, '2022-02-09', 'Diperiksa Atasan'),
(3, 1, 0, 0, '', 0, 0, 197301082014062003, 111, 0.111, '2022-02-09', 'Diperiksa Atasan'),
(4, 1, 10, 7, 'epg3MQa2chM7R0y8TaA4uuLS9Q==', 9, 995, 198901042017042012, 100, 0.1, '2022-02-09', 'Diperiksa Atasan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dp_skp_tahunan`
--
ALTER TABLE `dp_skp_tahunan`
  ADD PRIMARY KEY (`id_skp`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dp_skp_tahunan`
--
ALTER TABLE `dp_skp_tahunan`
  MODIFY `id_skp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
