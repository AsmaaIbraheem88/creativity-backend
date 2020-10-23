-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 23, 2020 at 03:25 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `creative`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

DROP TABLE IF EXISTS `abouts`;
CREATE TABLE IF NOT EXISTS `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `about_us_ar` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_us_en` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `features_ar` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `features_en` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `about_us_ar`, `about_us_en`, `features_ar`, `features_en`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Creativity is a key factor for business success. It’s our job to showcase your ideas, products, and services in the most creative yet simple & engaging way.', 'Creativity is a key factor for business success. It’s our job to showcase your ideas, products, and services in the most creative yet simple & engaging way.', 'We provide our clients with a comprehensive package of services and business solutions to help them interpret their history and achievements into engaging words, designs, and videos. Going global is number 1 goal for any ambitious business; our mission is to accompany our clients along their journey to the international market with our main solutions: Corporate Writing, Translation, & Corporate Design', 'We provide our clients with a comprehensive package of services and business solutions to help them interpret their history and achievements into engaging words, designs, and videos. Going global is number 1 goal for any ambitious business; our mission is to accompany our clients along their journey to the international market with our main solutions: Corporate Writing, Translation, & Corporate Design', 'abouts/HX3jNYEHN5ca0TkEkNfRf1N5892qHM7jw56LX87I.jpeg', '2020-10-18 20:22:07', '2020-10-23 01:48:44');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_profile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`),
  KEY `admins_group_id_foreign` (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `photo_profile`, `password`, `group_id`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', NULL, '$2y$10$6HFS/tI1TqTZP/v6Yhol7OEvq8UY8trkUpGJ4rzcYl0BWfU4OgBji', NULL, NULL, NULL, '2020-10-18 06:09:40', '2020-10-18 06:09:40');

-- --------------------------------------------------------

--
-- Table structure for table `admin_groups`
--

DROP TABLE IF EXISTS `admin_groups`;
CREATE TABLE IF NOT EXISTS `admin_groups` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `child_services`
--

DROP TABLE IF EXISTS `child_services`;
CREATE TABLE IF NOT EXISTS `child_services` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `child_services_service_id_foreign` (`service_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `child_services`
--

INSERT INTO `child_services` (`id`, `name_ar`, `name_en`, `image`, `service_id`, `created_at`, `updated_at`) VALUES
(2, 'CEO Office', 'CEO Office', 'childservices/NX1XNdWqcu0y141CX9PmHUY8CbCkAF2fB8BCpn5C.jpeg', 3, '2020-10-20 08:12:09', '2020-10-22 13:56:57'),
(3, 'Corporate Communications', 'Corporate Communications', 'childservices/hdC143MNyE2UY7hgy3UyHu7TvmKn5exD2sWySbEl.jpeg', 3, '2020-10-20 18:57:34', '2020-10-22 13:56:27'),
(4, 'Marketing Services', 'Marketing Services', 'childservices/L3W7qP6iuJ52u8AWOuJwanvSr0UdYb8KEIGeoZPi.jpeg', 3, '2020-10-22 13:57:31', '2020-10-22 13:57:31'),
(5, 'Human Resources', 'Human Resources', 'childservices/UP4z0Dqaf9zCjII6IdnPaOPjo85eQxU6yUkbpgJQ.jpeg', 3, '2020-10-23 08:52:30', '2020-10-23 08:52:30');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `logo`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 'clients/tbnOxSU19j6088JsbCvQp0Ibp6YYE5XLTk8ta53Z.jpeg', NULL, '2020-10-21 20:26:46', '2020-10-21 20:28:14'),
(2, NULL, 'clients/NmY99UXyFldSRC0bAPQ0VETXtgPV6mccTN3vf5A8.jpeg', NULL, '2020-10-21 20:27:32', '2020-10-21 20:27:32'),
(3, NULL, 'clients/IlWodE1Ew3pAlmCzVrwmX4gsGxPZ7rHTeF0vSIss.jpeg', NULL, '2020-10-21 20:27:46', '2020-10-21 20:27:46'),
(4, NULL, 'clients/Fj9nvelc5yzrrMohUA4IfKy1A1Rfsk0COAaLRcsX.jpeg', NULL, '2020-10-21 20:33:56', '2020-10-21 20:33:56'),
(5, NULL, 'clients/iDPZgVa1MDPo40WFQiLm5eaQxcLiz1SOqfqJuEDD.jpeg', NULL, '2020-10-21 20:34:15', '2020-10-21 20:34:15'),
(6, NULL, 'clients/JXJ8Vb8Axysckri103J6gb4bvE9xXMYryxmAO7r6.jpeg', NULL, '2020-10-21 20:34:42', '2020-10-21 20:34:42'),
(7, NULL, 'clients/6442W0PJiFOkpwBacVFpfDxSAnaFmWHDQ8kSdder.png', '2020-10-21 20:40:42', '2020-10-21 20:35:11', '2020-10-21 20:40:42');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE IF NOT EXISTS `files` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ext` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size_bytes` bigint(20) NOT NULL,
  `mimtype` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `files_admin_id_foreign` (`admin_id`),
  KEY `files_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_admins_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_10_19_094109_create_admin_groups_table', 1),
(6, '2019_10_19_102130_create_files_table', 1),
(25, '2019_10_19_985759_create_settings_table', 6),
(8, '2020_10_11_116224_create_socials_table', 1),
(9, '2020_10_11_62934_create_abouts_table', 1),
(10, '2020_10_12_193233_create_sliders_table', 1),
(19, '2020_10_18_50933_create_sub_child_services_table', 4),
(12, '2020_10_12_479053_create_clients_table', 1),
(13, '2020_10_12_751951_create_services_table', 1),
(17, '2020_10_18_286534_create_child_services_table', 3),
(16, '2020_10_18_401427_create_portfolios_table', 2),
(22, '2020_10_20_990034_create_orders_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `service`, `file`, `message`, `created_at`, `updated_at`) VALUES
(1, 'asmaa', 'admin@admin.com', NULL, 'translate', 'orders/ruhCt9BQEQjiZdcJdsHhYyqbxaAdpQcJZOUI1Y7L.jpeg', NULL, '2020-10-20 20:11:41', '2020-10-20 20:11:41'),
(2, 'asmaa', 'admin@admin.com', NULL, 'translate', 'orders/LzIksOn0f5dkItJsTWH2iuFFTLKx2mZjgahokYv4.jpeg', NULL, '2020-10-20 20:15:56', '2020-10-20 20:15:56'),
(3, 'asmaa', 'admin@admin.com', NULL, 'translate', 'orders/9c7WGfzxuJfdn5OTECXfTM24xbn3s11zC9ZJyBRp.jpeg', NULL, '2020-10-20 20:19:20', '2020-10-20 20:19:20'),
(4, 'asmaa', 'admin@admin.com', NULL, 'translate', 'orders/70c8xRE89hEtv0oziXjGuphuNriamLghboD46WGw.jpeg', NULL, '2020-10-20 20:20:57', '2020-10-20 20:20:57'),
(5, 'asmaa', 'admin@admin.com', NULL, 'translate', 'orders/vL7fPAXRIUS3VPkRLmKx7djiB7OSCroqUBGkrwoJ.jpeg', NULL, '2020-10-20 20:23:04', '2020-10-20 20:23:04'),
(6, 'asmaa', 'admin@admin.com', NULL, 'translate2', 'orders/8uJiNMsDqGrOezFvjovaC2RN74P8ynXhPpDWdh9B.docx', NULL, '2020-10-21 09:57:41', '2020-10-21 09:57:41'),
(7, 'asmaa', 'admin@admin.com', NULL, 'translate2', 'orders/AvkAq4DzKq0RlO3wTlqMPzkE0M61CS7D5l4lyRql.docx', NULL, '2020-10-21 10:00:09', '2020-10-21 10:00:09'),
(8, 'asmaa', 'admin@admin.com', NULL, 'translate2', 'orders/IJHa6C5nDiUELk5y701yiCLnetm96aSsJ3zxf8AM.docx', NULL, '2020-10-21 10:05:57', '2020-10-21 10:05:57'),
(9, 'asmaa', 'admin@admin.com', NULL, 'translate2', 'orders/rNB7hwaYn3P6X9uIRvQ44LN6NI9kN4BttgjEYFVk.docx', NULL, '2020-10-21 10:10:48', '2020-10-21 10:10:48'),
(10, 'asmaa', 'admin@admin.com', NULL, 'translate2', 'orders/t0LcppTvuiYFGaE9CuSCh2CueS3khO3e3NmrWucR.docx', NULL, '2020-10-21 10:50:20', '2020-10-21 10:50:20'),
(11, 'asmaa', 'e.semsema27@yahoo.com', NULL, 'translate', 'orders/LSSxKVy16dhxIkYeyYn8lcAhNJ0skLEJh1UrftvQ.pdf', NULL, '2020-10-21 12:09:38', '2020-10-21 12:09:38'),
(12, 'asmaa', 'e.semsema27@yahoo.com', NULL, 'translate', 'orders/2HB27za1kVFM8GWuy4GmyauUQNGuPjmFvJGJsb5q.pdf', NULL, '2020-10-21 12:23:27', '2020-10-21 12:23:27');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

DROP TABLE IF EXISTS `portfolios`;
CREATE TABLE IF NOT EXISTS `portfolios` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `portfolios_service_id_foreign` (`service_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `name`, `client`, `image`, `service_id`, `created_at`, `updated_at`) VALUES
(4, 'about', 'test', 'portfolios/LO5g75KCcejXGbDBVY6WUxQZW2XiL56WiwOAMd9R.jpeg', 2, '2020-10-20 08:13:51', '2020-10-20 08:13:51'),
(5, 'project', 'client', 'portfolios/ueZb3fAr2a3dIbB9hJHrvX66g53Tad0ONyvTrRf1.jpeg', 3, '2020-10-21 20:16:59', '2020-10-21 20:16:59'),
(6, 'project', NULL, 'portfolios/z3J8OOep9DG79ERA8xvz53e2BENWxbpzkzWnC7NE.jpeg', 4, '2020-10-23 09:23:43', '2020-10-23 09:23:43'),
(7, 'project name', NULL, 'portfolios/P4AQ48xp3k55NlDZI8YzFh6Pm7yTUPol8Rpt3ExZ.jpeg', 2, '2020-10-23 09:24:16', '2020-10-23 09:24:16'),
(8, 'project name', NULL, 'portfolios/FNAbDmThqQxNCA3JvcAEiLjXUGqYRTPUXA1LxGvD.jpeg', 3, '2020-10-23 09:25:06', '2020-10-23 09:25:06');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ar` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_en` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name_ar`, `name_en`, `description_ar`, `description_en`, `image`, `active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'Translation & Localization', 'Translation & Localization', 'Are you planning to take your business to the next level penetrating new international markets? Then, a communicative and culturally-oriented translation is not an option anymore.', 'Are you planning to take your business to the next level penetrating new international markets? Then, a communicative and culturally-oriented translation is not an option anymore.', 'services/fQ2yp1xYhDmpiGtGLopLM21AsmRLF7VNPafHZMcf.jpeg', '1', NULL, '2020-10-19 19:37:53', '2020-10-23 13:18:29'),
(3, 'Corporate Writing', 'Corporate Writing', 'Whether it’s for your internal or external communications, you will get an error-free and engaging content that is adequately tailored to get your message across successfully to your target audience', 'Whether it’s for your internal or external communications, you will get an error-free and engaging content that is adequately tailored to get your message across successfully to your target audience', 'services/iF1k9AcaZOcgf9XXIHi99qKTbpU8wKgEJfVu8K6x.jpeg', '1', NULL, '2020-10-20 18:56:35', '2020-10-23 13:20:27'),
(4, 'Corporate Design', 'Corporate Design', 'Your brand is your identity, and every brand has its unique characteristics that need to be reflected via the right matching designs, themes, and colors. Check our corporate design packages and increase your business reach among your target customers.', 'Your brand is your identity, and every brand has its unique characteristics that need to be reflected via the right matching designs, themes, and colors. Check our corporate design packages and increase your business reach among your target customers.', 'services/vyQjpWtURXb0pkdkW2TjrR9o6WrvwofprpaMgPe5.jpeg', '1', NULL, '2020-10-22 18:49:27', '2020-10-23 01:02:05');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sitename_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sitename_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `system_status` enum('open','close') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `system_message` longtext COLLATE utf8mb4_unicode_ci,
  `footer_message_ar` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_message_en` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `sitename_ar`, `sitename_en`, `email`, `tel`, `address_ar`, `address_en`, `logo`, `icon`, `system_status`, `system_message`, `footer_message_ar`, `footer_message_en`, `keywords`, `description`, `created_at`, `updated_at`) VALUES
(1, 'creativity-and', 'Creativity-And', 'creativity@creativity-and.com', '+201010988911', 'PO Box 16122 Collins Street West Victoria 8007 Australia', 'PO Box 16122 Collins Street West Victoria 8007 Australia', 'setting/0Y99Bdaz3Q9XtlnxoyphHgt1Oiat7xayKUciNFhs.png', 'setting/qJRROLh7qWh14qul2k0rt8BH7u7dO1iPq9309LNv.png', 'open', NULL, 'Creativity& is an established company that provides a package of business solutions including content writing, translation, localization, interpretation, designs, and art in a variety of languages in several fields.\r\nOur mission is to spare our clients the hassle of branding and language related jobs. We take care of that for our clients efficiently and creatively, so they stay focused on their everyday business tasks and projects while their brand is spreading out in parallel.', 'Creativity& is an established company that provides a package of business solutions including content writing, translation, localization, interpretation, designs, and art in a variety of languages in several fields.\r\nOur mission is to spare our clients the hassle of branding and language related jobs. We take care of that for our clients efficiently and creatively, so they stay focused on their everyday business tasks and projects while their brand is spreading out in parallel.', 'translation , web design', 'this site  help you', '2020-10-21 19:46:26', '2020-10-23 09:03:56');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `heading_ar` longtext COLLATE utf8mb4_unicode_ci,
  `heading_en` longtext COLLATE utf8mb4_unicode_ci,
  `description_ar` longtext COLLATE utf8mb4_unicode_ci,
  `description_en` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `heading_ar`, `heading_en`, `description_ar`, `description_en`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '<p>Outstanding&nbsp;<span style=\"color:#f39c12\">Installation</span>&nbsp;Services</p>', '<p>Outstanding&nbsp;<span style=\"color:#f39c12\">Installation</span>&nbsp;Services</p>', '<p>Outstanding&nbsp;<span style=\"color:#f39c12\">Installation</span>&nbsp;Services</p>', '<p>test</p>', 'sliders/LwhgFZU1qDkCe7mOImG11SJIOksXpRYSQhsQf2Yq.jpeg', NULL, '2020-10-21 08:23:46', '2020-10-22 18:44:07'),
(2, '<h1>Outstanding&nbsp;<span style=\"color:#f1c40f\">Installation</span>&nbsp;Services</h1>', '<h1>Outstanding&nbsp;<span style=\"color:#f1c40f\">Installation</span>&nbsp;Services</h1>', '<p>Outstanding&nbsp;Installation&nbsp;Services</p>', '<p>Outstanding&nbsp;Installation&nbsp;Services</p>', 'sliders/7KbgUibFZVKZVW2zLxrhwkOeCR6o49sYgtJ7gKMW.jpeg', NULL, '2020-10-21 14:29:16', '2020-10-22 10:25:53'),
(3, '<p>test</p>', '<p>test</p>', NULL, NULL, 'sliders/MTu1Ga2tIWuiA8fQWQITradCuo7pSxpgwSveMfmR.jpeg', '2020-10-22 18:42:55', '2020-10-22 18:33:57', '2020-10-22 18:42:55'),
(4, '<p>te</p>', NULL, '<p>tes</p>', NULL, 'sliders/v01nEehHTCqInY4ziMdriyxgbMTKVMeGgG3svIYs.jpeg', '2020-10-22 18:42:37', '2020-10-22 18:41:20', '2020-10-22 18:42:37');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

DROP TABLE IF EXISTS `socials`;
CREATE TABLE IF NOT EXISTS `socials` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `whatsapp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linked` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `whatsapp`, `facebook`, `youtube`, `linked`, `instagram`, `created_at`, `updated_at`) VALUES
(1, '+201010988911', 'https://www.facebook.com/AllTalentGroup/', NULL, NULL, NULL, '2020-10-18 20:39:10', '2020-10-21 13:53:58');

-- --------------------------------------------------------

--
-- Table structure for table `sub_child_services`
--

DROP TABLE IF EXISTS `sub_child_services`;
CREATE TABLE IF NOT EXISTS `sub_child_services` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `child_service_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sub_child_services_child_service_id_foreign` (`child_service_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_child_services`
--

INSERT INTO `sub_child_services` (`id`, `name_en`, `name_ar`, `child_service_id`, `created_at`, `updated_at`) VALUES
(2, 'Internal Communications', 'Internal Communications', 3, '2020-10-20 08:12:31', '2020-10-22 13:58:23'),
(3, 'Internal Campaigns', 'Internal Campaigns', 3, '2020-10-20 19:08:16', '2020-10-22 13:59:05'),
(4, 'Branding Communication Materials', 'Branding Communication Materials', 3, '2020-10-22 13:59:41', '2020-10-22 13:59:41'),
(5, 'Senior Management Profiles', 'Senior Management Profiles', 3, '2020-10-22 14:01:13', '2020-10-22 14:01:13'),
(6, 'Newsletter Articles', 'Newsletter Articles', 3, '2020-10-22 14:01:34', '2020-10-22 14:01:34'),
(7, 'Magazine Articles', 'Magazine Articles', 3, '2020-10-23 02:23:32', '2020-10-23 02:23:32'),
(8, 'Events’ speeches, invitations, & landing pages', 'Events’ speeches, invitations, & landing pages', 3, '2020-10-23 02:23:57', '2020-10-23 02:23:57'),
(9, 'Annual Reports', 'Annual Reports', 3, '2020-10-23 02:24:21', '2020-10-23 02:24:21'),
(10, 'Monthly Bulletins', 'Monthly Bulletins', 3, '2020-10-23 02:25:17', '2020-10-23 02:25:17'),
(11, 'CEO Presentations', 'CEO Presentations', 2, '2020-10-23 02:26:46', '2020-10-23 02:26:46'),
(12, 'CEO Office Internal Communications', 'CEO Office Internal Communications', 2, '2020-10-23 02:27:09', '2020-10-23 02:27:09'),
(13, 'CEO Correspondences with External Entities', 'CEO Correspondences with External Entities', 2, '2020-10-23 02:27:33', '2020-10-23 02:27:33'),
(14, 'CEO Occasional Messages to Staff', 'CEO Occasional Messages to Staff', 2, '2020-10-23 02:27:57', '2020-10-23 02:27:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
