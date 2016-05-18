-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2016 at 01:44 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wineapp3`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_05_10_090814_create_roles_table', 1),
('2016_05_10_090906_create_foreign_keys', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', '2016-05-11 12:15:20', '2016-05-11 12:15:20'),
(2, 'User', 'user', '2016-05-11 12:15:20', '2016-05-11 12:15:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jayce Prohaska', 'larissa87@hotmail.com', '$2y$10$w9IWh46NwT9vZbUOC5k0w.c9bnbsum9HTEd4WNI21lg2pd0zLAjpm', 1, 'C66vD733cR', '1979-04-30 20:15:42', '1971-07-02 07:26:08'),
(2, 'Prof. Pierce Shields', 'vwaters@yahoo.com', '$2y$10$HTUgwVnZBkfPt8r7c3R7dOnAU.STX2wxiBGNIcbXuxneZtR1z593.', 2, 'B0lE6Qk1zz', '1975-04-19 17:28:22', '2002-04-06 05:06:52'),
(4, 'Ali Ryan Jr.', 'braun.ruthe@brekke.info', '$2y$10$hTEXxCARrGMVZ9TkSQOF4ukA/OeW2U.6dlwAUu1xXGtNudmC5SyUC', 2, 'doSP4Iv4nY', '1995-05-29 10:25:30', '1981-09-29 10:37:27'),
(6, 'Cayla Stamm', 'tabitha.veum@kozey.com', '$2y$10$YnVudWeRPxToIjskawxj7er.Y4Q4ccJ4HPiHbBBKcxF4qpHFiTXyG', 1, 'FzvRIQCpZn', '1980-09-19 15:21:21', '2008-03-08 14:18:56'),
(7, 'Dr. Marcellus Upton MD', 'isaiah.pfannerstill@berge.biz', '$2y$10$ryFHqvzsd0PqJ9g2K4ZvCeiU2P7HoahJnwzfvNGQF8sF9TuBfDufC', 2, 'cd5BkPXPhR', '2011-05-17 06:20:49', '1990-09-22 22:55:38'),
(8, 'Chanel Deckow', 'ryan.everett@runolfsdottir.info', '$2y$10$GcrY5Cf6Vl8Rkl3qev9zQeJ5X9P.eSi9taHixEL.nIDpSyr2nugrG', 1, 'gGGQ6aeRqB', '1981-11-29 03:20:11', '1995-02-13 07:31:32'),
(9, 'Therese Ferry Sr.', 'qwalsh@yahoo.com', '$2y$10$T0Yq.ceTXWJ44a6JmFjiOeHNoJHnoFgrV3DlJxqxHYJSA5SyrTrdq', 1, 'bx0s3xeHvj', '1991-12-25 03:01:23', '1995-10-06 07:28:29'),
(10, 'Magnus Hills', 'feest.taya@hahn.biz', '$2y$10$PTajM24kjWJVRu.P7t2LIOPcWS74t8rEFBbIEaoL3CYKuOSSciy7W', 1, 'hH2DY7ALYH', '1997-05-16 11:16:51', '1983-04-11 16:29:25'),
(11, 'GreatAdmin', 'admin@la.fr', '$2y$10$NyIrK9PSHPUGdANCUoS0ceTMXW.qLWWwhcSBZgjZL6GJ21s557G/C', 1, 'alNEttSwQCb8sn4XJdvLX8mXciNobxgNpFuo1esC7ttMW30WLvzGG1eHV4lN', '2016-05-11 12:15:20', '2016-05-11 12:22:03');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
