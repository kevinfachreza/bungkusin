-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.16-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for bungkusin
DROP DATABASE IF EXISTS `bungkusin`;
CREATE DATABASE IF NOT EXISTS `bungkusin` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bungkusin`;

-- Dumping structure for table bungkusin.log_mutasi
DROP TABLE IF EXISTS `log_mutasi`;
CREATE TABLE IF NOT EXISTS `log_mutasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Tipe` varchar(20) NOT NULL,
  `Nilai` int(30) NOT NULL,
  `Tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_penjual` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bungkusin.log_mutasi: ~11 rows (approximately)
DELETE FROM `log_mutasi`;
/*!40000 ALTER TABLE `log_mutasi` DISABLE KEYS */;
INSERT INTO `log_mutasi` (`id`, `Tipe`, `Nilai`, `Tanggal`, `id_penjual`) VALUES
	(1, 'Penjualan', 9800, '2017-05-03 00:00:00', 71),
	(2, 'Penjualan', 12000, '2017-05-10 00:00:00', 71),
	(3, 'Dana Cair', 10000, '2017-05-16 00:00:00', 71),
	(4, 'Dana Cair', 0, '2017-05-17 19:03:34', 38),
	(5, 'Penjualan', 36000, '2017-05-17 19:05:56', 38),
	(6, 'Penjualan', 36000, '2017-05-17 19:06:25', 38),
	(7, 'Penjualan', 36000, '2017-05-17 19:08:15', 38),
	(8, 'Dana Cair', 108000, '2017-05-18 02:27:37', 38),
	(9, 'Penjualan', 36000, '2017-05-18 02:42:47', 38),
	(10, 'Penjualan', 36000, '2017-05-18 02:45:11', 38),
	(11, 'Dana Cair', 72000, '2017-05-18 02:45:23', 38);
/*!40000 ALTER TABLE `log_mutasi` ENABLE KEYS */;

-- Dumping structure for table bungkusin.menu_makanan
DROP TABLE IF EXISTS `menu_makanan`;
CREATE TABLE IF NOT EXISTS `menu_makanan` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `penjual` int(12) DEFAULT NULL,
  `nama` varchar(256) DEFAULT NULL,
  `harga` varchar(24) DEFAULT NULL,
  `img` varchar(512) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bungkusin.menu_makanan: ~3 rows (approximately)
DELETE FROM `menu_makanan`;
/*!40000 ALTER TABLE `menu_makanan` DISABLE KEYS */;
INSERT INTO `menu_makanan` (`id`, `penjual`, `nama`, `harga`, `img`, `created_at`, `updated_at`) VALUES
	(1, 38, 'Nasi Goreng', '12000', NULL, NULL, NULL),
	(2, 39, 'Mie Goreng', '10000', NULL, NULL, NULL),
	(3, 38, 'Telur', '3000', NULL, NULL, NULL);
/*!40000 ALTER TABLE `menu_makanan` ENABLE KEYS */;

-- Dumping structure for table bungkusin.menu_makanan_kategori
DROP TABLE IF EXISTS `menu_makanan_kategori`;
CREATE TABLE IF NOT EXISTS `menu_makanan_kategori` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bungkusin.menu_makanan_kategori: ~9 rows (approximately)
DELETE FROM `menu_makanan_kategori`;
/*!40000 ALTER TABLE `menu_makanan_kategori` DISABLE KEYS */;
INSERT INTO `menu_makanan_kategori` (`id`, `nama`, `img`) VALUES
	(1, 'Tahu Tek', 'assets/menu/tahutek1.jpg'),
	(2, 'Nasi Goreng', 'assets/menu/tahutek1.jpg'),
	(3, 'Tahu Campur', 'assets/menu/tahutek1.jpg'),
	(4, 'Bebek', 'assets/menu/tahutek1.jpg'),
	(5, 'Gado Gado', 'assets/menu/tahutek1.jpg'),
	(6, 'Penyetan', 'assets/menu/tahutek1.jpg'),
	(7, 'Pecel', 'assets/menu/tahutek1.jpg'),
	(8, 'Soto', 'assets/menu/tahutek1.jpg'),
	(9, 'Mie Goreng', 'assets/menu/tahutek1.jpg');
/*!40000 ALTER TABLE `menu_makanan_kategori` ENABLE KEYS */;

-- Dumping structure for table bungkusin.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bungkusin.migrations: ~0 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table bungkusin.penjual_rating
DROP TABLE IF EXISTS `penjual_rating`;
CREATE TABLE IF NOT EXISTS `penjual_rating` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `penjual` int(12) DEFAULT NULL,
  `pembeli` int(12) DEFAULT NULL,
  `rating` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bungkusin.penjual_rating: ~0 rows (approximately)
DELETE FROM `penjual_rating`;
/*!40000 ALTER TABLE `penjual_rating` DISABLE KEYS */;
/*!40000 ALTER TABLE `penjual_rating` ENABLE KEYS */;

-- Dumping structure for table bungkusin.slider
DROP TABLE IF EXISTS `slider`;
CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `img` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `active` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bungkusin.slider: ~4 rows (approximately)
DELETE FROM `slider`;
/*!40000 ALTER TABLE `slider` DISABLE KEYS */;
INSERT INTO `slider` (`id`, `img`, `link`, `active`) VALUES
	(1, 'assets/slider/1.jpg', 'eatery/1', 1),
	(2, 'assets/slider/2.jpg', 'eatery/2', 1),
	(3, 'assets/slider/3.jpg', 'eatery/3', 1),
	(4, 'assets/slider/4.jpg', 'eatery/4', 1);
/*!40000 ALTER TABLE `slider` ENABLE KEYS */;

-- Dumping structure for table bungkusin.transaksi
DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE IF NOT EXISTS `transaksi` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `penjual` int(12) DEFAULT NULL,
  `pembeli` int(12) DEFAULT NULL,
  `total_harga` int(12) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(4) DEFAULT NULL COMMENT '2 = done, 1 = siap, 0 = dimasak, -1 = batal',
  `accepted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bungkusin.transaksi: ~7 rows (approximately)
DELETE FROM `transaksi`;
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
INSERT INTO `transaksi` (`id`, `penjual`, `pembeli`, `total_harga`, `created_at`, `updated_at`, `status`, `accepted_at`) VALUES
	(1, 38, 1, 300000, '2017-05-17 00:25:56', '2017-05-17 00:18:46', -1, '2017-05-17 00:18:35'),
	(2, 39, 1, 12000, '2017-05-17 00:26:57', '2017-05-17 00:24:30', 0, NULL),
	(3, 40, 1, 33000, '2017-05-17 00:25:54', '2017-05-17 00:24:33', 2, NULL),
	(4, 41, 1, 12000, '2017-05-17 00:25:49', '2017-05-17 00:24:42', 1, NULL),
	(25, 38, 1, 36000, '2017-05-18 09:45:07', '2017-05-16 20:05:11', 2, NULL),
	(26, 38, 1, 36000, '2017-05-17 03:16:49', '2017-05-16 20:08:13', 0, '2017-05-17 03:16:44'),
	(71, 71, 40, 80000, '2017-05-17 10:53:13', '0000-00-00 00:00:00', 0, NULL);
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;

-- Dumping structure for table bungkusin.transaksi_detail
DROP TABLE IF EXISTS `transaksi_detail`;
CREATE TABLE IF NOT EXISTS `transaksi_detail` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `transaksi` int(12) DEFAULT NULL,
  `menu` int(12) DEFAULT NULL,
  `jumlah` int(4) DEFAULT NULL,
  `sub_total` int(12) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bungkusin.transaksi_detail: ~15 rows (approximately)
DELETE FROM `transaksi_detail`;
/*!40000 ALTER TABLE `transaksi_detail` DISABLE KEYS */;
INSERT INTO `transaksi_detail` (`id`, `transaksi`, `menu`, `jumlah`, `sub_total`, `created_at`, `updated_at`) VALUES
	(3, 20, 1, 2, 24000, '2017-05-16 19:49:13', '2017-05-16 19:49:13'),
	(4, 20, 3, 4, 12000, '2017-05-16 19:49:13', '2017-05-16 19:49:13'),
	(5, 21, 1, 2, 24000, '2017-05-16 19:51:41', '2017-05-16 19:51:41'),
	(6, 21, 2, 4, 12000, '2017-05-16 19:51:41', '2017-05-16 19:51:41'),
	(7, 22, 2, 2, 24000, '2017-05-16 19:52:10', '2017-05-16 19:52:10'),
	(8, 22, 3, 4, 12000, '2017-05-16 19:52:10', '2017-05-16 19:52:10'),
	(9, 23, 1, 2, 24000, '2017-05-16 19:52:22', '2017-05-16 19:52:22'),
	(10, 23, 3, 4, 12000, '2017-05-16 19:52:22', '2017-05-16 19:52:22'),
	(11, 24, 1, 2, 24000, '2017-05-16 19:52:42', '2017-05-16 19:52:42'),
	(12, 24, 2, 4, 12000, '2017-05-16 19:52:42', '2017-05-16 19:52:42'),
	(13, 25, 1, 2, 24000, '2017-05-16 20:05:11', '2017-05-16 20:05:11'),
	(14, 25, 3, 4, 12000, '2017-05-16 20:05:11', '2017-05-16 20:05:11'),
	(15, 26, 1, 2, 24000, '2017-05-16 20:08:14', '2017-05-16 20:08:14'),
	(16, 26, 3, 4, 12000, '2017-05-16 20:08:14', '2017-05-16 20:08:14'),
	(17, 71, 2, 1, 30000, '2017-05-17 00:00:00', '2017-05-17 07:08:00');
/*!40000 ALTER TABLE `transaksi_detail` ENABLE KEYS */;

-- Dumping structure for table bungkusin.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `penjual` tinyint(1) DEFAULT NULL,
  `penjual_kategori` int(2) DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hp` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bungkusin.users: ~35 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `penjual`, `penjual_kategori`, `alamat`, `hp`, `avatar`) VALUES
	(1, 'Kevin Fachreza', 'kevinfachreza@yahoo.com', '$2y$10$95DI6owdUtjwPadLhvY2bOnZ4FGtvEZ1TG2Po4UgIVKtZTfFqAqSm', NULL, '2017-05-16 15:28:00', '2017-05-16 15:28:00', NULL, NULL, NULL, NULL, 'assets/users/avatar.png'),
	(38, 'RM Sejahtera', 'adamore@gmail.com', '$2y$10$rlHmw5pB4j98y5UDxbwWgeeM05RkD5Ju.TzrTcMd05oCaeWgGZhNm', NULL, '2017-05-16 15:50:04', '2017-05-16 15:50:04', 1, NULL, '8939 Legros Prairie\nFinnfort, WA 89295-6673', '(727) 442-7652 x503', 'assets/users/avatar.png'),
	(39, 'Mr. Reymundo Waelchi', 'bruen.bertram@collier.com', '$2y$10$jqzMBw/Pa5UWS2HGu1kXleJ5aiRqxjkCXoVdZQC3UWlxwSPq8AnVC', NULL, '2017-05-16 15:50:04', '2017-05-16 15:50:04', 1, NULL, '5824 Lueilwitz Wells\nWest Maxwellfort, SC 20643-7001', '219.388.6563 x5301', 'assets/users/avatar.png'),
	(40, 'Arjun Hirthe', 'jadon.windler@hotmail.com', '$2y$10$K5sXsdnt.EF9TOpYU8haXO3ej73SGc8OdPmpXeJYk8R5wWntrwn..', NULL, '2017-05-16 15:50:04', '2017-05-16 15:50:04', 1, NULL, '7553 Franecki Courts\nNorth Winfield, WI 07156', '794-512-5826', 'assets/users/avatar.png'),
	(41, 'Dr. Cathryn Abshire', 'emmanuel05@leffler.com', '$2y$10$vdYpJLmfhrZiVZ04rLyYROM7eJQRr9MvEmAVD77DDiBu5I.h6Jp5e', NULL, '2017-05-16 15:50:04', '2017-05-16 15:50:04', 1, NULL, '92467 Allen Rest\nSchusterborough, GA 04827', '772-493-7108 x5019', 'assets/users/avatar.png'),
	(42, 'Dr. Richmond Heaney', 'jacklyn.littel@yahoo.com', '$2y$10$UWLuUIboQwNWDukLqXnvcuiplbjhu2GpJikURAu2tqckLnHaWa.pq', NULL, '2017-05-16 15:50:04', '2017-05-16 15:50:04', 1, NULL, '532 Schiller Plain\nKeltonfort, IN 94352', '+1-292-256-3032', 'assets/users/avatar.png'),
	(43, 'Mr. Chester Mills IV', 'gbruen@gmail.com', '$2y$10$5dO0s491Ctv4HvGK7Z/CHua0KhXDhjwVzGJM9KTFnpdb0ntQxi4sa', NULL, '2017-05-16 15:50:04', '2017-05-16 15:50:04', 1, NULL, '9010 Kreiger Mount\nNorth Eldora, UT 65824-8568', '1-736-271-5178', 'assets/users/avatar.png'),
	(44, 'Verona Mueller', 'koelpin.jamil@gmail.com', '$2y$10$hTGbc1l5jxq9MQr/syzLa.9TW4tKyCkJtxljWz3nXjfZl13mxKzzK', NULL, '2017-05-16 15:50:04', '2017-05-16 15:50:04', 1, NULL, '74217 Lesly Junction\nLillianashire, OR 33180-9973', '(631) 754-9336', 'assets/users/avatar.png'),
	(45, 'Prof. Cole Jenkins II', 'goyette.jayde@hotmail.com', '$2y$10$sIDpDgD2nWWIRDJGdZtxZeOcZYNdmoPiCB5DXDZD0IqcK.0JxnLqO', NULL, '2017-05-16 15:50:04', '2017-05-16 15:50:04', 1, NULL, '534 Jammie Island\nNew Maudeside, MA 52598', '(394) 574-2030', 'assets/users/avatar.png'),
	(46, 'Krystal Conroy', 'zoberbrunner@kessler.com', '$2y$10$uQdWZgteyLAIWpAQj2brC.PW/TJ2ljB9GGl9P4.dsDpvf4GD19Avu', NULL, '2017-05-16 15:50:04', '2017-05-16 15:50:04', 1, NULL, '8099 Orin Manor\nPort Naomi, TX 43540-4308', '332.467.4429 x358', 'assets/users/avatar.png'),
	(47, 'Dr. Abbey Skiles', 'xbuckridge@hotmail.com', '$2y$10$e9bvP/qN/tRFsdGnbHEqtehvXITet/51NATUgDpxEx/eMmfr6jTSW', NULL, '2017-05-16 15:50:04', '2017-05-16 15:50:04', 1, NULL, '777 Claudia Estates Apt. 571\nLake Elza, CO 27565', '560-708-6004 x13938', 'assets/users/avatar.png'),
	(48, 'Laurianne Pagac', 'willow.abbott@gmail.com', '$2y$10$u9qvohtqrwdFcv6nuuLGVOqFxh42RlIEJuVZNnxiTu.7wnzn7lghi', NULL, '2017-05-16 15:50:05', '2017-05-16 15:50:05', 1, NULL, '1160 Deonte Roads\nPurdymouth, MT 00273-1478', '+15702966311', 'assets/users/avatar.png'),
	(49, 'Helena Marks', 'cassie99@gmail.com', '$2y$10$61p4XJ8orO0fU/JNflCTXeqCHjC7raaTSVbukVbLAjSY54gUpVbny', NULL, '2017-05-16 15:50:05', '2017-05-16 15:50:05', 1, NULL, '201 Lon Crest\nDareborough, KY 50756-1715', '+19989014906', 'assets/users/avatar.png'),
	(50, 'Justine Howe', 'hartmann.ignacio@schmidt.com', '$2y$10$ov1QFPT/7kEzghDasBgczuPVXYd6c7QuQSo.muy6ojeI6vSmUTjIW', NULL, '2017-05-16 15:50:05', '2017-05-16 15:50:05', 1, NULL, '9239 Alexandre Place\nWest Mattbury, ID 97744', '(632) 724-5487', 'assets/users/avatar.png'),
	(51, 'Alejandrin Cronin II', 'kstehr@flatley.biz', '$2y$10$Dqpb.pADXK3dVXanlrGu/urfPfeUqDVjyOeEQUMJhsB4YrRSLza.C', NULL, '2017-05-16 15:50:05', '2017-05-16 15:50:05', 1, NULL, '1825 Stamm Orchard\nNorth Yasmeen, LA 54102', '(435) 373-8348', 'assets/users/avatar.png'),
	(52, 'Julie Dicki', 'jkihn@yahoo.com', '$2y$10$mgG/8LdC9e6qewsBGAEWGeZ4gw2aObVnCPVJWL9IrPVs4qRyeR0Fq', NULL, '2017-05-16 15:50:05', '2017-05-16 15:50:05', 1, NULL, '3782 Williamson Circle\nSteuberberg, VA 79751', '1-938-333-1576 x110', 'assets/users/avatar.png'),
	(53, 'Owen Langosh', 'reilly.clay@gmail.com', '$2y$10$SslZ0PpIU6pifblMN1/vWOwLLX74pejS/aIaK2A0MCuMvEUwUz6EW', NULL, '2017-05-16 15:50:05', '2017-05-16 15:50:05', 1, NULL, '88745 Erik Mountains Apt. 349\nEzrastad, IA 45622-4967', '642.277.9822 x26195', 'assets/users/avatar.png'),
	(54, 'Mrs. Herta Shanahan Sr.', 'ruthe.morar@hotmail.com', '$2y$10$6Fa0UsBPwGbY1hWg2phUOe0jmf2FE.ssyvXv0seCMB4HIgWt9GENm', NULL, '2017-05-16 15:50:05', '2017-05-16 15:50:05', 1, NULL, '675 Flatley Fields Suite 847\nSouth Willa, NE 43151-1965', '+1.514.218.6587', 'assets/users/avatar.png'),
	(55, 'Lucile Lemke I', 'giovanna74@yahoo.com', '$2y$10$1x5AKVifuKAW7IDNmuRDWudF4bSqs0L9uw.XrHHktTkzye6exuxqS', NULL, '2017-05-16 15:50:05', '2017-05-16 15:50:05', 1, NULL, '5526 Cole Inlet\nKavonhaven, CA 88512-4081', '+1-672-277-4786', 'assets/users/avatar.png'),
	(56, 'Prof. Jonatan Sanford', 'ohara.isidro@strosin.net', '$2y$10$XG8M5d6t3x9mdDqqMxio8u9dBtCmCDnumuwddpPYtYUCwhOpepBaG', NULL, '2017-05-16 15:50:05', '2017-05-16 15:50:05', 1, NULL, '44300 Clark Crossroad Apt. 157\nDenesikberg, LA 50000-3043', '438-304-8711', 'assets/users/avatar.png'),
	(57, 'Abigayle Cruickshank', 'kip.graham@leffler.com', '$2y$10$ITejV03QDg.lFXY/Cv0Lt.jjC/VwABuyCQA6ySn3gQnYRnDHdjppC', NULL, '2017-05-16 15:50:05', '2017-05-16 15:50:05', 1, NULL, '7863 Luciano Way Suite 093\nBobbytown, WY 75086-9797', '1-726-489-3377', 'assets/users/avatar.png'),
	(58, 'Carolyn Gleichner', 'cruickshank.kylie@larkin.net', '$2y$10$UbdKOfnOsppE3KY0kMI12uL4.ES5ewQxLl5Fkd.NMIbOCCsXoxdBm', NULL, '2017-05-16 15:50:06', '2017-05-16 15:50:06', 1, NULL, '817 Wintheiser Walks Suite 624\nSouth Vivianneside, CA 27208', '1-309-888-8096', 'assets/users/avatar.png'),
	(59, 'Kendrick Koelpin', 'tdickinson@gmail.com', '$2y$10$cVzYQ4Mm83cC0hIBu8mbV.1j0G.iWv1Za4n1DfLojUxzdiSY1tXE2', NULL, '2017-05-16 15:50:06', '2017-05-16 15:50:06', 1, NULL, '88707 Carter Shoal Apt. 399\nConnborough, IN 39550', '1-353-333-0397 x9575', 'assets/users/avatar.png'),
	(60, 'Matt Harvey', 'kassulke.myrl@yahoo.com', '$2y$10$ZUblVJHm9WyFlcrk1Q.KceQpfyqrrx4LYb9ztHUXr45.2UHxkuPb.', NULL, '2017-05-16 15:50:06', '2017-05-16 15:50:06', 1, NULL, '8258 Kiera Drive\nBaileeville, NE 52428', '824-680-9359 x702', 'assets/users/avatar.png'),
	(61, 'Lourdes Fay', 'maye.hirthe@yahoo.com', '$2y$10$ysOOqe7PyIBJZAVqnKxX2eICgEHg6Pym7HaDRD2PTj5EwvnhgHOc6', NULL, '2017-05-16 15:50:06', '2017-05-16 15:50:06', 1, NULL, '4103 Mitchell Road\nMosciskiborough, AZ 58866', '(815) 512-3314 x501', 'assets/users/avatar.png'),
	(62, 'Ansel Daugherty II', 'treutel.jerome@rodriguez.biz', '$2y$10$1zHteLi85Sp./ooljo23ludLOEB60d0f7J4LckvZ.E7Pm5GbKm8te', NULL, '2017-05-16 15:50:06', '2017-05-16 15:50:06', 1, NULL, '219 Eileen Light\nPort Presleymouth, AZ 62462-6830', '(992) 558-9587 x2140', 'assets/users/avatar.png'),
	(63, 'Ettie Cremin', 'mikayla74@gmail.com', '$2y$10$r5PUa0dla1RukxvDHfWSHOrirh8G57/0ZS2CJcWc2exvCtb3F4qFS', NULL, '2017-05-16 15:50:06', '2017-05-16 15:50:06', 1, NULL, '8348 Connelly Mission Apt. 118\nArmstrongmouth, OK 49851', '682.851.9381 x677', 'assets/users/avatar.png'),
	(64, 'Prof. Emmanuelle Gerhold', 'herzog.darrell@gmail.com', '$2y$10$FCANG7fj.eUUNYVYBWdmD.k.BC9xJZCfP1een8Gt8CxdIJCAVxuP.', NULL, '2017-05-16 15:50:06', '2017-05-16 15:50:06', 1, NULL, '8590 Macejkovic Rue Apt. 019\nWest Deon, CA 67183-2895', '332-386-5206 x31420', 'assets/users/avatar.png'),
	(65, 'Joseph VonRueden', 'mckenzie.stuart@kovacek.com', '$2y$10$TjaOEvX3fYm446425O.FBu3bLb/ruFzOM974/L.W.PSkR3hv9kVym', NULL, '2017-05-16 15:50:06', '2017-05-16 15:50:06', 1, NULL, '78993 Gulgowski Locks Suite 485\nEast Millerborough, WV 04846-2016', '1-475-483-9985 x99976', 'assets/users/avatar.png'),
	(66, 'Aaliyah Zemlak', 'terrell28@herman.net', '$2y$10$ufolXDo0sjKWaL8pV3i9m.ka5BwyJOHN7CupCKcLpzllIAJ/eKa0.', NULL, '2017-05-16 15:50:06', '2017-05-16 15:50:06', 1, NULL, '433 Darlene Spring Suite 229\nMayerburgh, NH 99105', '+1-543-255-3085', 'assets/users/avatar.png'),
	(67, 'Addie Cormier', 'eunice.barrows@sawayn.com', '$2y$10$CkX5bUAdMNWcLsQSw5JQUuyETYo4Pxgo2VKuEqT3m58HOFg3.wGrG', NULL, '2017-05-16 15:50:07', '2017-05-16 15:50:07', 1, NULL, '44345 Thompson Route Apt. 387\nSouth Brooke, LA 03553', '1-860-639-3999 x01628', 'assets/users/avatar.png'),
	(68, 'Finn Mills', 'elijah08@gmail.com', '$2y$10$aK7hBy3SbN5Oq.7vd2bHhur5d2PVZQnAxHQJagSEBrvZAZZv.mp1a', NULL, '2017-05-16 15:50:07', '2017-05-16 15:50:07', 1, NULL, '28212 Bode Plain\nHeathcoteburgh, WI 04150-1508', '551-965-5553 x9846', 'assets/users/avatar.png'),
	(69, 'Andre Bailey', 'brandt52@gmail.com', '$2y$10$2vW.6k/DfKYmc6//SAeD4OUgs.PyNuf6h3p2eyuCMs5ClN89OEtMG', NULL, '2017-05-16 15:50:07', '2017-05-16 15:50:07', 1, NULL, '1100 Nicolas Via\nPort Neomaland, AK 24806', '425-637-8011 x99253', 'assets/users/avatar.png'),
	(70, 'Prof. Clementine Kilback DDS', 'devon.ullrich@jenkins.com', '$2y$10$gm8.YIuEYvckLeUDhojYaO7ne4afWrpzoYusOEZmQOg.sKnZ25cTG', NULL, '2017-05-16 15:50:07', '2017-05-16 15:50:07', 1, NULL, '59522 Abigail Canyon\nWest Stanleymouth, MO 07961', '+1 (256) 723-5387', 'assets/users/avatar.png'),
	(71, 'Upil', 'aa@gmail.com', '$2y$10$peSAMUR/3fsCYIusu2Prc.xLS8NfGAqI1ZSk0GpPczOKG6K9KAxXC', NULL, '2017-05-16 20:59:48', '2017-05-16 20:59:48', NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table bungkusin.users_favorite
DROP TABLE IF EXISTS `users_favorite`;
CREATE TABLE IF NOT EXISTS `users_favorite` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `user_id` int(12) DEFAULT NULL,
  `menu_id` int(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bungkusin.users_favorite: ~1 rows (approximately)
DELETE FROM `users_favorite`;
/*!40000 ALTER TABLE `users_favorite` DISABLE KEYS */;
INSERT INTO `users_favorite` (`id`, `user_id`, `menu_id`) VALUES
	(1, 2, 38);
/*!40000 ALTER TABLE `users_favorite` ENABLE KEYS */;

-- Dumping structure for table bungkusin.voucher
DROP TABLE IF EXISTS `voucher`;
CREATE TABLE IF NOT EXISTS `voucher` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `kode` varchar(12) DEFAULT NULL,
  `nominal` int(12) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bungkusin.voucher: ~0 rows (approximately)
DELETE FROM `voucher`;
/*!40000 ALTER TABLE `voucher` DISABLE KEYS */;
/*!40000 ALTER TABLE `voucher` ENABLE KEYS */;

-- Dumping structure for table bungkusin.wallet
DROP TABLE IF EXISTS `wallet`;
CREATE TABLE IF NOT EXISTS `wallet` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `user_id` int(12) DEFAULT NULL,
  `saldo` int(12) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bungkusin.wallet: ~3 rows (approximately)
DELETE FROM `wallet`;
/*!40000 ALTER TABLE `wallet` DISABLE KEYS */;
INSERT INTO `wallet` (`id`, `user_id`, `saldo`, `created_at`, `updated_at`) VALUES
	(1, 1, 0, '2017-05-17 02:51:41', '2017-05-16 19:51:41'),
	(2, 71, 60000, '2017-05-17 04:00:52', '0000-00-00 00:00:00'),
	(3, 38, 0, '2017-05-18 09:45:23', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `wallet` ENABLE KEYS */;

-- Dumping structure for table bungkusin.wallet_detail
DROP TABLE IF EXISTS `wallet_detail`;
CREATE TABLE IF NOT EXISTS `wallet_detail` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `wallet_id` int(12) DEFAULT NULL,
  `nominal` int(12) DEFAULT NULL,
  `type` tinyint(1) DEFAULT NULL COMMENT '1 = debet, -1 = kredit',
  `method` tinyint(1) DEFAULT NULL COMMENT '1 = voucher, 2 = transfer',
  `voucher_kode` varchar(12) DEFAULT NULL,
  `rekening` tinyint(1) DEFAULT NULL COMMENT '1 = bca, 2 = mandiri, 3 = bni',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '1 = done, 0 = waiting',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bungkusin.wallet_detail: ~7 rows (approximately)
DELETE FROM `wallet_detail`;
/*!40000 ALTER TABLE `wallet_detail` DISABLE KEYS */;
INSERT INTO `wallet_detail` (`id`, `wallet_id`, `nominal`, `type`, `method`, `voucher_kode`, `rekening`, `created_at`, `updated_at`, `status`) VALUES
	(1, 1, 10000, 1, 2, NULL, 1, '2017-05-17 00:48:11', '2017-05-17 00:48:13', 1),
	(2, 1, 20000, 1, 1, 'IDN', NULL, '2017-05-17 00:49:59', '2017-05-17 00:50:01', 1),
	(3, 1, 36000, -1, NULL, NULL, NULL, '2017-05-16 19:49:13', '2017-05-16 19:49:13', 1),
	(4, 1, 36000, -1, NULL, NULL, NULL, '2017-05-16 19:51:41', '2017-05-16 19:51:41', 1),
	(5, 1, 36000, -1, NULL, NULL, NULL, '2017-05-16 19:52:42', '2017-05-16 19:52:42', 1),
	(6, 1, 36000, -1, NULL, NULL, NULL, '2017-05-16 20:05:11', '2017-05-16 20:05:11', 1),
	(7, 1, 36000, -1, NULL, NULL, NULL, '2017-05-16 20:08:14', '2017-05-16 20:08:14', 1);
/*!40000 ALTER TABLE `wallet_detail` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
