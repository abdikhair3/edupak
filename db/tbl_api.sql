-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.8-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table e_dupak.dp_api
CREATE TABLE IF NOT EXISTS `dp_api` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_api` varchar(50) DEFAULT NULL,
  `request` varchar(50) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `last_sync` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table e_dupak.dp_api: ~6 rows (approximately)
/*!40000 ALTER TABLE `dp_api` DISABLE KEYS */;
INSERT INTO `dp_api` (`id`, `nama_api`, `request`, `url`, `last_sync`) VALUES
	(1, 'Satuan Kerja', 'GET', 'http://localhost/API-SIMPEG/api_edupak/satuan', '2022-01-29 11:26:47'),
	(2, 'Unit Kerja', 'GET', 'http://localhost/API-SIMPEG/api_edupak/unit', '2022-01-29 11:26:49'),
	(3, 'Jenis Jabatan', 'GET', 'http://localhost/API-SIMPEG/api_edupak/jenis_jabatan', '2022-01-29 11:26:57'),
	(4, 'Jabatan', 'GET', 'http://localhost/API-SIMPEG/api_edupak/jabatan', '2022-01-29 11:26:59'),
	(5, 'Pangkat', 'GET', 'http://localhost/API-SIMPEG/api_edupak/pangkat', '2022-01-29 11:27:04'),
	(6, 'Pegawai', 'GET', 'http://localhost/API-SIMPEG/api_edupak/pegawai', '2022-01-29 11:27:06');
/*!40000 ALTER TABLE `dp_api` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
