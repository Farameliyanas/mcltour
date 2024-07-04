-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.37 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for reservasi
CREATE DATABASE IF NOT EXISTS `reservasi` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `reservasi`;

-- Dumping structure for table reservasi.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `user_admin` varchar(12) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table reservasi.admin: ~2 rows (approximately)
INSERT INTO `admin` (`id`, `email`, `name`, `user_admin`, `password`) VALUES
	(1, 'imi@gmail.com', 'imi', 'imi', 'imi'),
	(2, 'admin@gmail.com', 'admin', NULL, '$2y$10$j0taCVRcSIepxLbY31Yps.ute17SNsGbQuqxtCJO7k1fsgEGjkkRi');

-- Dumping structure for table reservasi.datas
CREATE TABLE IF NOT EXISTS `datas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table reservasi.datas: ~0 rows (approximately)

-- Dumping structure for table reservasi.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table reservasi.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table reservasi.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table reservasi.migrations: ~5 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2024_05_20_130359_create_datas_table', 1),
	(6, '2024_06_16_054350_add_role_to_users_table', 2);

-- Dumping structure for table reservasi.paket_wisata
CREATE TABLE IF NOT EXISTS `paket_wisata` (
  `idpaket_wisata` int NOT NULL AUTO_INCREMENT,
  `nama_paket` varchar(45) NOT NULL,
  `destinasi_wisata` varchar(45) NOT NULL,
  `durasi_wisata` varchar(45) NOT NULL,
  `kategori_wisata` varchar(45) NOT NULL,
  `harga` varchar(45) NOT NULL,
  PRIMARY KEY (`idpaket_wisata`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table reservasi.paket_wisata: ~0 rows (approximately)

-- Dumping structure for table reservasi.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table reservasi.password_resets: ~0 rows (approximately)

-- Dumping structure for table reservasi.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table reservasi.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table reservasi.reservasi
CREATE TABLE IF NOT EXISTS `reservasi` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_paket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paket_wisata_id` bigint unsigned NOT NULL,
  `jml_pax` int NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_reservasi` date NOT NULL,
  `spesial_request` text COLLATE utf8mb4_unicode_ci,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total_bayar` decimal(20,6) DEFAULT NULL,
  `status_bayar` set('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table reservasi.reservasi: ~1 rows (approximately)
INSERT INTO `reservasi` (`id`, `nama`, `nama_paket`, `paket_wisata_id`, `jml_pax`, `no_telp`, `tanggal_reservasi`, `spesial_request`, `created_by`, `created_at`, `updated_at`, `total_bayar`, `status_bayar`) VALUES
	(1, '', 'Midnight Sunrise', 10, 1, '0989', '2024-06-19', NULL, 'fara@gmail.com', '2024-06-18 10:26:24', '2024-06-18 10:26:24', 10000.000000, ''),
	(2, '', 'Midnight Sunrise', 10, 1, '0989', '2024-06-19', NULL, 'fara@gmail.com', '2024-06-18 10:31:20', '2024-06-18 10:31:20', 10000.000000, ''),
	(3, '', 'Midnight Sunrise', 10, 2, '0989', '2024-06-19', NULL, 'fara@gmail.com', '2024-06-18 10:34:14', '2024-06-18 10:34:14', 10000.000000, ''),
	(4, '', 'Midnight Sunrise', 10, 2, '0989', '2024-06-19', NULL, 'fara@gmail.com', '2024-06-18 13:09:36', '2024-06-18 13:09:36', 10000.000000, ''),
	(5, '', 'Midnight Sunrise', 10, 1, '0989', '2024-06-20', NULL, 'fara@gmail.com', '2024-06-18 17:05:59', '2024-06-18 17:05:59', 650000.000000, '');

-- Dumping structure for table reservasi.transaksi
CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` int NOT NULL AUTO_INCREMENT,
  `nama_pemesan` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table reservasi.transaksi: ~0 rows (approximately)

-- Dumping structure for table reservasi.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `nomor_telp` varchar(12) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `jenis_kelamin` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `wisata_idwisata` int DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table reservasi.users: ~2 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `alamat`, `nomor_telp`, `jenis_kelamin`, `password`, `wisata_idwisata`, `role`) VALUES
	(7, 'fara2', 'fara@gmail.com', 'DS CEWENG', '0', 'Perempuan', '$2y$10$ovBT21PyThurVnDjHXNvpOrmOz3uD4GY/.Twfs3cBzyO0JlB0eppq', NULL, 'user'),
	(10, 'admin', 'admin@gmail.com', 'madiun', '9090', 'Laki-laki', '$2y$10$KlxN5Xq.P3ok65sFuzbU8e.hxFSu2OCQd0h3CKB8wCVa3UwbaWSMi', NULL, 'admin');

-- Dumping structure for table reservasi.wisata
CREATE TABLE IF NOT EXISTS `wisata` (
  `idwisata` int NOT NULL AUTO_INCREMENT,
  `destinasi` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `nama_wisata` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `harga` decimal(16,2) DEFAULT NULL,
  PRIMARY KEY (`idwisata`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table reservasi.wisata: ~0 rows (approximately)
INSERT INTO `wisata` (`idwisata`, `destinasi`, `nama_wisata`, `harga`) VALUES
	(10, 'Dieng', 'Midnight Sunrise', 650000.00),
	(11, 'Bromo', 'Bromo Midnight', 450000.00),
	(12, 'Batu', 'Wisata Batu', 34000.00),
	(13, 'Jogja', 'Tour DeJogja', 295000.00),
	(14, 'Karimun Jawa', 'Trip Karimun Jawa', 1999000.00),
	(15, 'Bali', 'Ke Pulau Dewata Bali', 27000000.00);

-- Dumping structure for table reservasi.wisata_favorit
CREATE TABLE IF NOT EXISTS `wisata_favorit` (
  `idwisata_favorit` int NOT NULL AUTO_INCREMENT,
  `jumlah_like` int NOT NULL,
  `nama_wisata` varchar(45) NOT NULL,
  `wisata_idwisata` int NOT NULL,
  PRIMARY KEY (`idwisata_favorit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table reservasi.wisata_favorit: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
