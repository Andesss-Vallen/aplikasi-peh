-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for pehstudio
CREATE DATABASE IF NOT EXISTS `pehstudio` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `pehstudio`;

-- Dumping structure for table pehstudio.customer_services
CREATE TABLE IF NOT EXISTS `customer_services` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pehstudio.customer_services: ~0 rows (approximately)
REPLACE INTO `customer_services` (`id`, `nama`, `nomor_hp`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Fadilla Gita Juliana', '0877564332178', 0, NULL, NULL),
	(2, 'Anissa Dwi Oktaviaputri Raharmaja', '086512386539', 0, NULL, NULL);

-- Dumping structure for table pehstudio.detail_jadwals
CREATE TABLE IF NOT EXISTS `detail_jadwals` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `album` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medsos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_ready` time NOT NULL,
  `rundown` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jadwal` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detail_jadwals_id_jadwal_foreign` (`id_jadwal`),
  CONSTRAINT `detail_jadwals_id_jadwal_foreign` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwals` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pehstudio.detail_jadwals: ~0 rows (approximately)

-- Dumping structure for table pehstudio.failed_jobs
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

-- Dumping data for table pehstudio.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table pehstudio.jadwals
CREATE TABLE IF NOT EXISTS `jadwals` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `client` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `bvia_foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bvia_video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pakaian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_cs` bigint unsigned NOT NULL,
  `id_tfoto` bigint unsigned NOT NULL,
  `id_tvideo` bigint unsigned NOT NULL,
  `id_paket` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jadwals_id_cs_foreign` (`id_cs`),
  KEY `jadwals_id_tfoto_foreign` (`id_tfoto`),
  KEY `jadwals_id_tvideo_foreign` (`id_tvideo`),
  KEY `jadwals_id_paket_foreign` (`id_paket`),
  CONSTRAINT `jadwals_id_cs_foreign` FOREIGN KEY (`id_cs`) REFERENCES `customer_services` (`id`),
  CONSTRAINT `jadwals_id_paket_foreign` FOREIGN KEY (`id_paket`) REFERENCES `pakets` (`id`),
  CONSTRAINT `jadwals_id_tfoto_foreign` FOREIGN KEY (`id_tfoto`) REFERENCES `tim_fotos` (`id`),
  CONSTRAINT `jadwals_id_tvideo_foreign` FOREIGN KEY (`id_tvideo`) REFERENCES `tim_videos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pehstudio.jadwals: ~1 rows (approximately)
REPLACE INTO `jadwals` (`id`, `client`, `brand`, `tanggal`, `bvia_foto`, `bvia_video`, `keterangan`, `pakaian`, `id_cs`, `id_tfoto`, `id_tvideo`, `id_paket`, `created_at`, `updated_at`) VALUES
	(1, 'Dewi & Sukarman', 'Wuling', '2025-03-29', 'Tiyo', 'Tiyo', 'Request Music', 'Hitam', 1, 1, 1, 1, NULL, NULL),
	(2, 'Dewi & Sukarman', 'Wuling', '2025-03-21', 'Tiyo', 'Tiyo', 'Request Music', 'Hitam', 2, 2, 1, 1, NULL, NULL);

-- Dumping structure for table pehstudio.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pehstudio.migrations: ~0 rows (approximately)
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2025_03_18_070221_create_pakets_table', 1),
	(6, '2025_03_18_070221_create_tim_fotos_table', 1),
	(7, '2025_03_18_070221_create_tim_videos_table', 1),
	(8, '2025_03_18_070222_create_customer_services_table', 1),
	(9, '2025_03_18_070222_create_jadwals_table', 2),
	(10, '2025_03_18_070223_create_detail_jadwals_table', 3),
	(11, '2025_03_18_071201_create_permission_tables', 3),
	(12, '2025_03_12_024407_create_cs_pehpotrets_table', 4);

-- Dumping structure for table pehstudio.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pehstudio.model_has_permissions: ~0 rows (approximately)

-- Dumping structure for table pehstudio.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pehstudio.model_has_roles: ~0 rows (approximately)
REPLACE INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\User', 1),
	(2, 'App\\Models\\User', 2),
	(3, 'App\\Models\\User', 3);

-- Dumping structure for table pehstudio.pakets
CREATE TABLE IF NOT EXISTS `pakets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pehstudio.pakets: ~0 rows (approximately)
REPLACE INTO `pakets` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(1, 'Video & Photo Wedding GOLD', NULL, NULL);

-- Dumping structure for table pehstudio.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pehstudio.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table pehstudio.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pehstudio.permissions: ~0 rows (approximately)
REPLACE INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'tambah-user', 'web', '2025-03-18 20:58:11', '2025-03-18 20:58:11'),
	(2, 'edit-user', 'web', '2025-03-18 20:58:11', '2025-03-18 20:58:11'),
	(3, 'hapus-user', 'web', '2025-03-18 20:58:11', '2025-03-18 20:58:11'),
	(4, 'lihat-user', 'web', '2025-03-18 20:58:11', '2025-03-18 20:58:11'),
	(5, 'tambah-datautama', 'web', '2025-03-18 20:58:11', '2025-03-18 20:58:11'),
	(6, 'edit-datautama', 'web', '2025-03-18 20:58:11', '2025-03-18 20:58:11'),
	(7, 'hapus-datautama', 'web', '2025-03-18 20:58:11', '2025-03-18 20:58:11'),
	(8, 'lihat-datautama', 'web', '2025-03-18 20:58:11', '2025-03-18 20:58:11');

-- Dumping structure for table pehstudio.personal_access_tokens
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

-- Dumping data for table pehstudio.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table pehstudio.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pehstudio.roles: ~0 rows (approximately)
REPLACE INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'web', '2025-03-18 20:58:11', '2025-03-18 20:58:11'),
	(2, 'superuser', 'web', '2025-03-18 20:58:11', '2025-03-18 20:58:11'),
	(3, 'freelance', 'web', '2025-03-18 20:58:11', '2025-03-18 20:58:11');

-- Dumping structure for table pehstudio.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pehstudio.role_has_permissions: ~0 rows (approximately)
REPLACE INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(5, 1),
	(6, 1),
	(7, 1),
	(8, 1),
	(1, 2),
	(2, 2),
	(3, 2),
	(4, 2),
	(5, 2),
	(6, 2),
	(7, 2),
	(8, 2),
	(8, 3);

-- Dumping structure for table pehstudio.tim_fotos
CREATE TABLE IF NOT EXISTS `tim_fotos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pehstudio.tim_fotos: ~0 rows (approximately)
REPLACE INTO `tim_fotos` (`id`, `nama`, `nomor_hp`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Wildun Mahardika', '085932145876', 1, NULL, NULL),
	(2, 'Dhodit Rengga Tisna', '0877564332179', 1, NULL, NULL);

-- Dumping structure for table pehstudio.tim_videos
CREATE TABLE IF NOT EXISTS `tim_videos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pehstudio.tim_videos: ~0 rows (approximately)
REPLACE INTO `tim_videos` (`id`, `nama`, `nomor_hp`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Redo Setiawan', '0877342176453', 1, NULL, NULL);

-- Dumping structure for table pehstudio.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pehstudio.users: ~0 rows (approximately)
REPLACE INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'adminpeh65', 'rinajhe54@gmail.com', NULL, '$2y$12$HbTTap33z2YCt0Li0MNl1eFzofxLy/3Z1EiBWbWZCk3vSs99AEyKK', NULL, '2025-03-18 20:58:23', '2025-03-18 20:58:23'),
	(2, 'superuser', 'tiyomarte45', 'raehanandes@gmail.com', NULL, '$2y$12$XlE2eNDXT7t6KN29YMb7x.J65NyYGGCfc/ev7BFjqHZgIoYfPEbDm', '7ZnldL60IdJEomBQlrCiZoTlPnz17j7K7nljlWgkhnS4E5FYWBwELKFPQKEe', '2025-03-18 20:58:23', '2025-03-18 20:58:23'),
	(3, 'freelance', 'freelancepehpotret', 'wasisto513@gmail.com', NULL, '$2y$12$jzFNAHs5iiJY3YONLh1Aw.I3mI3IPii1qAMbWQJtSsjXGuUwyWOvG', NULL, '2025-03-18 20:58:24', '2025-03-18 20:58:24');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
