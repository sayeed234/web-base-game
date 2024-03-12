-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2020 at 05:18 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coinbaseclub`
--

-- --------------------------------------------------------

--
-- Table structure for table `adintoagnetfund_histories`
--

CREATE TABLE `adintoagnetfund_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_admin` int(11) DEFAULT NULL,
  `to_agent` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adintoagnetfund_histories`
--

INSERT INTO `adintoagnetfund_histories` (`id`, `from_admin`, `to_agent`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 10000, 0, '2019-12-04 10:39:16', '2019-12-01 10:39:16'),
(2, 1, 2, 15000, 0, '2019-12-01 10:39:35', '2019-12-01 10:39:35'),
(3, 1, 3, 20000, 0, '2019-12-01 10:39:45', '2019-12-01 10:39:45'),
(4, 1, 1, 25000, 0, '2019-12-01 10:40:02', '2019-12-01 10:40:02'),
(5, 1, 2, 20000, 0, '2019-12-01 10:40:22', '2019-12-01 10:40:22'),
(6, 1, 3, 45000, 0, '2019-12-01 10:40:35', '2019-12-01 10:40:35'),
(7, 1, 1, 35000, 0, '2019-12-01 10:40:59', '2019-12-01 10:40:59'),
(8, 1, 5, 95000, 0, '2019-12-04 04:42:52', '2019-12-04 04:42:52'),
(9, 1, 5, 50000, 0, '2019-12-05 04:22:41', '2019-12-05 04:22:41'),
(10, 1, 5, 50000, 0, '2019-12-05 04:24:16', '2019-12-05 04:24:16'),
(11, 1, 3, 5000, 0, '2019-12-05 04:35:27', '2019-12-05 04:35:27'),
(12, 1, 8, 10000, 0, '2019-12-05 04:37:47', '2019-12-05 04:37:47'),
(13, 1, 5, 10000, 0, '2019-12-05 04:54:55', '2019-12-05 04:54:55'),
(14, 1, 5, 50000, 0, '2019-12-05 04:55:47', '2019-12-05 04:55:47'),
(15, 1, 8, 2000, 0, '2019-12-05 08:06:43', '2019-12-05 08:06:43'),
(16, 1, 5, 5000, 0, '2019-12-05 08:07:37', '2019-12-05 08:07:37'),
(17, 1, 5, 7000, 0, '2019-12-05 08:08:21', '2019-12-05 08:08:21'),
(18, 1, 5, 7000, 0, '2019-12-05 08:09:26', '2019-12-05 08:09:26'),
(19, 1, 5, 7000, 0, '2019-12-05 08:10:01', '2019-12-05 08:10:01'),
(20, 1, 5, 5000, 0, '2019-12-05 08:10:58', '2019-12-05 08:10:58'),
(21, 1, 8, 30, 0, '2019-12-05 08:12:15', '2019-12-05 08:12:15'),
(22, 1, 5, 10000, 0, '2019-12-05 09:30:00', '2019-12-05 09:30:00'),
(23, 1, 8, 334, 0, '2019-12-05 09:33:23', '2019-12-05 09:33:23'),
(24, 1, 5, 33, 0, '2019-12-05 09:37:00', '2019-12-05 09:37:00'),
(25, 1, 8, 10000, 0, '2019-12-06 04:52:41', '2019-12-06 04:52:41'),
(26, 1, 1, 200, 0, '2019-12-13 09:35:22', '2019-12-13 09:35:22'),
(27, 1, 60, 50000, 0, '2019-12-14 10:23:52', '2019-12-14 10:23:52'),
(28, 1, 57, 4545, 0, '2019-12-18 02:39:56', '2019-12-18 02:39:56');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@admin.com', '$2y$10$.EUb8P3unwdUGkNP.fhHr.Q0LHTRL3TMC2oR7yLhC1ja57twNpiJa', '2019-09-09 21:00:00', '2019-09-09 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `adminto_agentfunds`
--

CREATE TABLE `adminto_agentfunds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_admin` int(11) DEFAULT NULL,
  `to_agent` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adminto_agentfunds`
--

INSERT INTO `adminto_agentfunds` (`id`, `from_admin`, `to_agent`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 22302, 0, '2019-12-01 10:39:16', '2019-12-14 04:49:22'),
(2, 1, 2, 25030, 0, '2019-12-01 10:39:35', '2019-12-12 06:57:07'),
(3, 1, 3, 70000, 0, '2019-12-01 10:39:45', '2019-12-05 04:35:27'),
(4, 1, 5, 296033, 0, '2019-12-04 04:42:52', '2019-12-05 09:37:00'),
(5, 1, 8, 38000, 0, '2019-12-05 04:37:47', '2019-12-08 09:35:43'),
(6, 1, 60, 35079, 0, '2019-12-14 10:23:52', '2019-12-17 23:28:38'),
(7, 1, 57, 4545, 0, '2019-12-18 02:39:56', '2019-12-18 02:39:56');

-- --------------------------------------------------------

--
-- Table structure for table `admin_fundhistories`
--

CREATE TABLE `admin_fundhistories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `adminamount` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_fundhistories`
--

INSERT INTO `admin_fundhistories` (`id`, `adminamount`, `created_at`, `updated_at`) VALUES
(1, 50000, '2019-12-01 10:34:59', '2019-12-01 10:34:59'),
(2, 45000, '2019-12-01 10:35:08', '2019-12-01 10:35:08'),
(3, 45000, '2019-12-01 10:35:08', '2019-12-01 10:35:08'),
(4, 120000, '2019-12-01 10:35:28', '2019-12-01 10:35:28'),
(5, 1000000, '2019-12-01 10:35:45', '2019-12-01 10:35:45'),
(6, 5000, '2019-12-04 04:40:25', '2019-12-04 04:40:25');

-- --------------------------------------------------------

--
-- Table structure for table `admin_funds`
--

CREATE TABLE `admin_funds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `adminamount` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_funds`
--

INSERT INTO `admin_funds` (`id`, `adminamount`, `created_at`, `updated_at`) VALUES
(1, 716858, '2019-12-01 10:34:59', '2019-12-18 02:39:56');

-- --------------------------------------------------------

--
-- Table structure for table `agentlogins`
--

CREATE TABLE `agentlogins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agentcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agentcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agenttoclientfund_histories`
--

CREATE TABLE `agenttoclientfund_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_agent` int(11) DEFAULT NULL,
  `to_client` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agenttoclientfund_histories`
--

INSERT INTO `agenttoclientfund_histories` (`id`, `from_agent`, `to_client`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 5000, 0, '2019-12-01 11:02:30', '2019-12-01 11:02:30'),
(2, 1, 4, 3500, 0, '2019-12-01 11:02:49', '2019-12-01 11:02:49'),
(3, 1, 4, 2222, 0, '2019-12-03 03:42:51', '2019-12-03 03:42:51'),
(4, 5, 6, 222222, 0, '2019-12-05 04:19:39', '2019-12-05 04:19:39'),
(5, 5, 6, 12000, 0, '2019-12-05 04:20:09', '2019-12-05 04:20:09'),
(6, 5, 7, 5000, 0, '2019-12-05 04:56:48', '2019-12-05 04:56:48'),
(7, 5, 7, 300, 0, '2019-12-05 09:29:02', '2019-12-05 09:29:02'),
(8, 5, 7, 730, 0, '2019-12-05 09:29:23', '2019-12-05 09:29:23'),
(9, 8, 15, 3000, 0, '2019-12-06 04:55:52', '2019-12-06 04:55:52'),
(10, 8, 15, 334, 0, '2019-12-08 04:44:49', '2019-12-08 04:44:49'),
(11, 8, 15, 2222, 0, '2019-12-08 05:58:04', '2019-12-08 05:58:04'),
(12, 8, 15, 14, 0, '2019-12-08 06:09:55', '2019-12-08 06:09:55'),
(13, 8, 15, 2222, 0, '2019-12-08 06:22:06', '2019-12-08 06:22:06'),
(14, 8, 15, 8, 0, '2019-12-08 06:41:48', '2019-12-08 06:41:48'),
(15, 8, 15, 2222, 0, '2019-12-08 07:28:31', '2019-12-08 07:28:31'),
(16, 8, 15, 2222, 0, '2019-12-08 08:09:00', '2019-12-08 08:09:00'),
(17, 8, 15, 12, 0, '2019-12-08 08:09:19', '2019-12-08 08:09:19'),
(18, 8, 15, 10, 0, '2019-12-08 08:16:41', '2019-12-08 08:16:41'),
(19, 8, 15, 4, 0, '2019-12-08 08:17:20', '2019-12-08 08:17:20'),
(20, 8, 15, 86, 0, '2019-12-08 09:35:43', '2019-12-08 09:35:43'),
(21, 1, 16, 10000, 0, '2019-12-09 04:56:06', '2019-12-09 04:56:06'),
(22, 1, 16, 5000, 0, '2019-12-10 07:10:16', '2019-12-10 07:10:16'),
(23, 1, 17, 10000, 0, '2019-12-10 07:10:27', '2019-12-10 07:10:27'),
(24, 1, 18, 10000, 0, '2019-12-10 07:10:36', '2019-12-10 07:10:36'),
(25, 2, 19, 10000, 0, '2019-12-10 08:23:57', '2019-12-10 08:23:57'),
(26, 1, 16, 2222, 0, '2019-12-11 04:57:07', '2019-12-11 04:57:07'),
(27, 1, 17, 44, 0, '2019-12-13 09:34:31', '2019-12-13 09:34:31'),
(28, 1, 18, 22, 0, '2019-12-14 04:18:46', '2019-12-14 04:18:46'),
(29, 1, 17, 22, 0, '2019-12-14 04:21:38', '2019-12-14 04:21:38'),
(30, 1, 16, 11, 0, '2019-12-14 04:24:15', '2019-12-14 04:24:15'),
(31, 1, 17, 22, 0, '2019-12-14 04:26:36', '2019-12-14 04:26:36'),
(32, 1, 17, 11, 0, '2019-12-14 04:30:54', '2019-12-14 04:30:54'),
(33, 1, 16, 4, 0, '2019-12-14 04:31:05', '2019-12-14 04:31:05'),
(34, 1, 17, 2, 0, '2019-12-14 04:32:00', '2019-12-14 04:32:00'),
(35, 1, 17, 2, 0, '2019-12-14 04:33:53', '2019-12-14 04:33:53'),
(36, 1, 17, 2, 0, '2019-12-14 04:34:13', '2019-12-14 04:34:13'),
(37, 1, 17, 22, 0, '2019-12-14 04:49:22', '2019-12-14 04:49:22'),
(38, 60, 62, 10000, 0, '2019-12-14 10:25:30', '2019-12-14 10:25:30'),
(39, 60, 63, 5000, 0, '2019-12-14 10:51:06', '2019-12-14 10:51:06'),
(40, 60, 61, 34, 0, '2019-12-17 03:16:41', '2019-12-17 03:16:41');

-- --------------------------------------------------------

--
-- Table structure for table `agentto_clientfunds`
--

CREATE TABLE `agentto_clientfunds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_agent` int(11) DEFAULT NULL,
  `to_client` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agentto_clientfunds`
--

INSERT INTO `agentto_clientfunds` (`id`, `from_agent`, `to_client`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 7234, 0, '2019-12-01 11:02:30', '2019-12-06 09:17:20'),
(2, 5, 6, 228322, 0, '2019-12-05 04:19:39', '2019-12-06 04:58:19'),
(3, 5, 7, 3730, 0, '2019-12-05 04:56:48', '2019-12-05 09:29:23'),
(4, 8, 15, 124685, 0, '2019-12-06 04:55:52', '2019-12-14 02:35:24'),
(5, 1, 16, 4612, 0, '2019-12-09 04:56:06', '2019-12-14 04:31:05'),
(6, 1, 17, 9627, 0, '2019-12-10 07:10:27', '2019-12-14 04:49:22'),
(7, 1, 18, 1522, 0, '2019-12-10 07:10:36', '2019-12-14 04:18:46'),
(8, 2, 19, 2053, 0, '2019-12-10 08:23:57', '2019-12-18 04:07:57'),
(9, 60, 62, 9535, 0, '2019-12-14 10:25:30', '2019-12-17 23:28:37'),
(10, 60, 63, 1190, 0, '2019-12-14 10:51:06', '2019-12-17 23:30:36'),
(11, 60, 61, 34, 0, '2019-12-17 03:16:41', '2019-12-17 03:16:41'),
(12, 2, 21, 847, 0, '2019-12-17 06:09:47', '2019-12-18 04:07:57'),
(13, 15, 2, 1000, 0, '2019-12-18 04:06:43', '2019-12-18 04:06:43');

-- --------------------------------------------------------

--
-- Table structure for table `a_g_commisions`
--

CREATE TABLE `a_g_commisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agentscode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `referrercode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comdate` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `a_g_commisions`
--

INSERT INTO `a_g_commisions` (`id`, `agentscode`, `referrercode`, `amount`, `comdate`, `created_at`, `updated_at`) VALUES
(2, 'AG5466', 'REF73766', '40', NULL, '2019-12-12 06:52:50', '2019-12-12 06:57:07'),
(3, 'AG7803', 'REF53134', '10', NULL, '2019-12-12 07:24:58', '2019-12-12 07:24:58'),
(7, 'AG7803', 'REF15661', '20', '2019-12-11', '2019-12-11 07:55:19', '2019-12-11 08:01:21'),
(8, 'AG7803', 'REF65836', '80', '2019-12-13', '2019-12-13 08:03:56', '2019-12-13 08:44:21'),
(9, 'AG7803', 'REF15661', '60', '2019-12-13', '2019-12-13 08:03:56', '2019-12-13 08:39:37'),
(10, 'AG7803', 'REF15661', '20', '2019-12-14', '2019-12-14 02:34:54', '2019-12-14 02:35:24'),
(11, 'AG6556', 'REF43969', '20', '2019-12-14', '2019-12-14 10:48:10', '2019-12-14 10:48:53'),
(12, 'AG6556', 'REF46619', '60', '2019-12-14', '2019-12-14 10:52:01', '2019-12-14 10:53:18'),
(13, 'AG6556', 'REF46619', '33.5154', '2019-12-18', '2019-12-17 23:25:49', '2019-12-17 23:28:38');

-- --------------------------------------------------------

--
-- Table structure for table `bet_holds`
--

CREATE TABLE `bet_holds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `betid` int(11) DEFAULT NULL,
  `betname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `betprice` int(11) DEFAULT NULL,
  `clientid` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT 0,
  `status` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bet_holds`
--

INSERT INTO `bet_holds` (`id`, `betid`, `betname`, `betprice`, `clientid`, `quantity`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Apple', 300, 4, 3, 0, '2019-12-01 11:04:29', '2019-12-01 11:04:29'),
(2, 3, 'Banana', 200, 4, 2, 0, '2019-12-01 11:04:52', '2019-12-01 11:04:52'),
(3, 1, 'Apple', 400, 4, 4, 0, '2019-12-03 06:08:29', '2019-12-03 06:08:29'),
(4, 1, 'Apple', 200, 4, 2, 0, '2019-12-04 04:51:51', '2019-12-04 04:51:51'),
(5, 4, 'Graps', 400, 4, 4, 0, '2019-12-04 04:52:00', '2019-12-04 04:52:00'),
(6, 2, 'Orange', 400, 4, 4, 0, '2019-12-04 09:20:02', '2019-12-04 09:20:02'),
(7, 1, 'Apple', 300, 7, 3, 0, '2019-12-05 08:35:32', '2019-12-05 08:35:32'),
(8, 3, 'Banana', 500, 6, 5, 0, '2019-12-05 08:37:21', '2019-12-05 08:37:21'),
(9, 5, 'Potato', 400, 6, 4, 0, '2019-12-05 08:37:33', '2019-12-05 08:37:33'),
(10, 4, 'Graps', 500, 7, 5, 0, '2019-12-05 08:39:17', '2019-12-05 08:39:17'),
(11, 1, 'Club-1', 2500, 6, 5, 0, '2019-12-06 04:58:09', '2019-12-06 04:58:09'),
(12, 3, 'Club-3', 2500, 6, 5, 0, '2019-12-06 04:58:19', '2019-12-06 04:58:19'),
(13, 1, 'Club-1', 1500, 4, 3, 0, '2019-12-06 04:58:40', '2019-12-06 04:58:40'),
(14, 5, 'Club-5', 2500, 4, 5, 0, '2019-12-06 04:58:52', '2019-12-06 04:58:52'),
(15, 1, 'Club-1', 500, 15, 1, 0, '2019-12-08 06:42:21', '2019-12-08 06:42:21'),
(16, 2, 'Club-2', 2500, 15, 5, 0, '2019-12-08 06:42:50', '2019-12-08 06:42:50'),
(17, 3, 'Club-3', 1000, 15, 2, 0, '2019-12-08 06:42:57', '2019-12-08 06:42:57'),
(18, 4, 'Club-4', 1500, 15, 3, 0, '2019-12-08 06:43:05', '2019-12-08 06:43:05'),
(19, 5, 'Club-5', 2000, 15, 4, 0, '2019-12-08 06:43:15', '2019-12-08 06:43:15'),
(20, 1, 'Club-1', 500, 16, 1, 0, '2019-12-09 06:40:55', '2019-12-09 06:40:55'),
(21, 1, 'Club-1', 1000, 15, 2, 0, '2019-12-09 06:46:10', '2019-12-09 06:46:10'),
(22, 5, 'Club-5', 1500, 16, 3, 0, '2019-12-09 07:18:12', '2019-12-09 07:18:12'),
(23, 3, 'Club-3', 1000, 15, 2, 0, '2019-12-09 08:25:32', '2019-12-09 08:25:32'),
(24, 2, 'Club-2', 2000, 16, 4, 0, '2019-12-09 08:26:03', '2019-12-09 08:26:03'),
(25, 2, 'Club-2', 2000, 15, 4, 0, '2019-12-09 08:29:50', '2019-12-09 08:29:50'),
(26, 2, 'Club-2', 1000, 16, 2, 0, '2019-12-09 08:30:28', '2019-12-09 08:30:28'),
(27, 3, 'Club-3', 1500, 16, 3, 0, '2019-12-09 08:31:53', '2019-12-09 08:31:53'),
(28, 3, 'Club-3', 2500, 16, 5, 0, '2019-12-09 08:32:03', '2019-12-09 08:32:03'),
(29, 1, 'Club-1', 1500, 16, 3, 0, '2019-12-09 08:53:45', '2019-12-09 08:53:45'),
(30, 1, 'Club-1', 2000, 15, 4, 0, '2019-12-10 03:46:23', '2019-12-10 03:46:23'),
(31, 2, 'Club-2', 2000, 15, 4, 0, '2019-12-10 03:46:35', '2019-12-10 03:46:35'),
(32, 1, 'Club-1', 2000, 16, 4, 0, '2019-12-10 03:47:05', '2019-12-10 03:47:05'),
(33, 2, 'Club-2', 1500, 16, 3, 0, '2019-12-10 03:47:15', '2019-12-10 03:47:15'),
(34, 3, 'Club-3', 2000, 16, 4, 0, '2019-12-10 06:16:47', '2019-12-10 06:16:47'),
(35, 4, 'Club-4', 500, 16, 1, 0, '2019-12-10 06:17:41', '2019-12-10 06:17:41'),
(36, 4, 'Club-4', 1000, 16, 2, 0, '2019-12-10 06:18:42', '2019-12-10 06:18:42'),
(37, 4, 'Club-4', 500, 16, 1, 0, '2019-12-10 06:19:17', '2019-12-10 06:19:17'),
(38, 3, 'Club-3', 500, 15, 1, 0, '2019-12-10 06:19:50', '2019-12-10 06:19:50'),
(39, 2, 'Club-2', 500, 16, 1, 0, '2019-12-10 06:31:47', '2019-12-10 06:31:47'),
(40, 5, 'Club-5', 500, 16, 1, 0, '2019-12-10 06:33:39', '2019-12-10 06:33:39'),
(41, 5, 'Club-5', 500, 16, 1, 0, '2019-12-10 06:37:53', '2019-12-10 06:37:53'),
(42, 5, 'Club-5', 500, 16, 1, 0, '2019-12-10 06:41:03', '2019-12-10 06:41:03'),
(43, 5, 'Club-5', 500, 16, 1, 0, '2019-12-10 06:41:36', '2019-12-10 06:41:36'),
(44, 1, 'Club-1', 500, 16, 1, 0, '2019-12-10 06:43:39', '2019-12-10 06:43:39'),
(45, 4, 'Club-4', 2500, 15, 5, 0, '2019-12-10 06:44:06', '2019-12-10 06:44:06'),
(46, 3, 'Club-3', 500, 15, 1, 0, '2019-12-10 06:44:58', '2019-12-10 06:44:58'),
(47, 3, 'Club-3', 500, 15, 1, 0, '2019-12-10 06:45:53', '2019-12-10 06:45:53'),
(48, 1, 'Club-1', 2000, 18, 4, 0, '2019-12-10 07:11:38', '2019-12-10 07:11:38'),
(49, 4, 'Club-4', 2500, 18, 5, 0, '2019-12-10 07:11:49', '2019-12-10 07:11:49'),
(50, 2, 'Club-2', 500, 15, 1, 0, '2019-12-10 08:19:06', '2019-12-10 08:19:06'),
(51, 5, 'Club-5', 2500, 15, 5, 0, '2019-12-10 08:20:15', '2019-12-10 08:20:15'),
(52, 1, 'Club-1', 2000, 19, 4, 0, '2019-12-10 08:26:09', '2019-12-10 08:26:09'),
(53, 3, 'Club-3', 1000, 19, 2, 0, '2019-12-10 08:26:53', '2019-12-10 08:26:53'),
(54, 1, 'Club-1', 1500, 16, 3, 0, '2019-12-11 05:42:36', '2019-12-11 05:42:36'),
(55, 2, 'Club-2', 2500, 16, 5, 0, '2019-12-11 05:43:27', '2019-12-11 05:43:27'),
(56, 1, 'Club-1', 1000, 16, 2, 0, '2019-12-11 05:44:16', '2019-12-11 05:44:16'),
(57, 3, 'Club-3', 2000, 16, 4, 0, '2019-12-11 05:45:06', '2019-12-11 05:45:06'),
(58, 4, 'Club-4', 2500, 16, 5, 0, '2019-12-11 05:45:22', '2019-12-11 05:45:22'),
(59, 5, 'Club-5', 2500, 16, 5, 0, '2019-12-11 05:45:37', '2019-12-11 05:45:37'),
(60, 1, 'Club-1', 1000, 16, 2, 0, '2019-12-12 06:18:39', '2019-12-12 06:18:39'),
(61, 1, 'Club-1', 1000, 16, 2, 0, '2019-12-12 06:19:31', '2019-12-12 06:19:31'),
(62, 1, 'Club-1', 500, 16, 1, 0, '2019-12-12 06:21:32', '2019-12-12 06:21:32'),
(63, 2, 'Club-2', 500, 16, 1, 0, '2019-12-12 06:43:31', '2019-12-12 06:43:31'),
(64, 2, 'Club-2', 500, 16, 1, 0, '2019-12-12 06:44:01', '2019-12-12 06:44:01'),
(65, 1, 'Club-1', 1000, 19, 2, 0, '2019-12-12 06:52:50', '2019-12-12 06:52:50'),
(66, 2, 'Club-2', 500, 19, 1, 0, '2019-12-12 06:53:18', '2019-12-12 06:53:18'),
(67, 2, 'Club-2', 500, 19, 1, 0, '2019-12-12 06:56:16', '2019-12-12 06:56:16'),
(68, 2, 'Club-2', 500, 19, 1, 0, '2019-12-12 06:57:07', '2019-12-12 06:57:07'),
(69, 1, 'Club-1', 500, 17, 1, 0, '2019-12-12 07:24:57', '2019-12-12 07:24:57'),
(70, 3, 'Club-3', 500, 16, 1, 0, '2019-12-12 07:27:50', '2019-12-12 07:27:50'),
(71, 1, 'Club-1', 500, 16, 1, 0, '2019-12-13 07:40:27', '2019-12-13 07:40:27'),
(72, 1, 'Club-1', 500, 16, 1, 0, '2019-12-13 07:41:58', '2019-12-13 07:41:58'),
(73, 2, 'Club-2', 500, 16, 1, 0, '2019-12-13 07:42:45', '2019-12-13 07:42:45'),
(74, 2, 'Club-2', 500, 16, 1, 0, '2019-12-13 07:44:39', '2019-12-13 07:44:39'),
(75, 2, 'Club-2', 500, 16, 1, 0, '2019-12-13 07:52:26', '2019-12-13 07:52:26'),
(76, 2, 'Club-2', 500, 16, 1, 0, '2019-12-13 07:55:18', '2019-12-13 07:55:18'),
(77, 3, 'Club-3', 500, 16, 1, 0, '2019-12-13 08:01:21', '2019-12-13 08:01:21'),
(78, 1, 'Club-1', 500, 18, 1, 0, '2019-12-13 08:03:56', '2019-12-13 08:03:56'),
(79, 4, 'Club-4', 500, 16, 1, 0, '2019-12-13 08:39:37', '2019-12-13 08:39:37'),
(80, 2, 'Club-2', 1000, 18, 2, 0, '2019-12-13 08:43:16', '2019-12-13 08:43:16'),
(81, 4, 'Club-4', 2500, 18, 5, 0, '2019-12-13 08:44:21', '2019-12-13 08:44:21'),
(82, 1, 'Club-1', 500, 16, 1, 0, '2019-12-14 02:34:54', '2019-12-14 02:34:54'),
(83, 2, 'Club-2', 500, 16, 1, 0, '2019-12-14 02:35:24', '2019-12-14 02:35:24'),
(84, 1, 'Club-1', 500, 62, 1, 0, '2019-12-14 10:26:00', '2019-12-14 10:26:00'),
(85, 1, 'Club-1', 500, 62, 1, 0, '2019-12-14 10:48:10', '2019-12-14 10:48:10'),
(86, 2, 'Club-2', 500, 62, 1, 0, '2019-12-14 10:48:53', '2019-12-14 10:48:53'),
(87, 1, 'Club-1', 500, 63, 1, 0, '2019-12-14 10:52:00', '2019-12-14 10:52:00'),
(88, 3, 'Club-3', 2500, 63, 5, 0, '2019-12-14 10:53:18', '2019-12-14 10:53:18'),
(89, 1, 'Club-1', 1502, 63, 3, 0, '2019-12-17 23:25:49', '2019-12-17 23:25:49'),
(90, 2, 'Club-2', 173, 63, 2, 0, '2019-12-17 23:28:37', '2019-12-17 23:28:37');

-- --------------------------------------------------------

--
-- Table structure for table `bet_tables`
--

CREATE TABLE `bet_tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bet_tables`
--

INSERT INTO `bet_tables` (`id`, `name`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 'Club-1', '500.79', 1, '2019-12-01 10:29:34', '2019-12-17 03:44:30'),
(2, 'Club-2', '86.70', 1, '2019-12-01 10:30:02', '2019-12-17 03:45:10'),
(3, 'Club-3', '500', 1, '2019-12-01 10:30:24', '2019-12-05 08:44:06'),
(4, 'Club-4', '500', 1, '2019-12-01 10:30:57', '2019-12-05 08:44:16'),
(5, 'Club-5', '500', 1, '2019-12-01 10:31:11', '2019-12-05 08:44:27');

-- --------------------------------------------------------

--
-- Table structure for table `bet_wins`
--

CREATE TABLE `bet_wins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namewin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `betid` int(11) DEFAULT NULL,
  `clientid` int(11) DEFAULT NULL,
  `bcount` int(11) DEFAULT NULL,
  `bamount` int(11) DEFAULT NULL,
  `userwincode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `winstatus` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bet_wins`
--

INSERT INTO `bet_wins` (`id`, `namewin`, `betid`, `clientid`, `bcount`, `bamount`, `userwincode`, `winstatus`, `created_at`, `updated_at`) VALUES
(5, NULL, 2, 15, 5, 12500, NULL, 0, '2019-12-08 06:51:25', '2019-12-08 06:51:25'),
(6, NULL, 3, 15, 2, 5000, NULL, 0, '2019-12-09 08:40:16', '2019-12-09 08:40:16'),
(7, NULL, 3, 16, 8, 20000, NULL, 0, '2019-12-09 08:40:17', '2019-12-09 08:40:17'),
(8, NULL, 2, 15, 4, 10000, NULL, 0, '2019-12-10 03:47:33', '2019-12-10 03:47:33'),
(9, NULL, 2, 16, 3, 7500, NULL, 0, '2019-12-10 03:47:33', '2019-12-10 03:47:33'),
(10, NULL, 2, 16, 5, 12500, NULL, 0, '2019-12-11 05:53:08', '2019-12-11 05:53:08'),
(11, NULL, 2, 63, 2, 865, NULL, 0, '2019-12-17 23:30:36', '2019-12-17 23:30:36');

-- --------------------------------------------------------

--
-- Table structure for table `client_transfers`
--

CREATE TABLE `client_transfers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fromid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `toid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transferamount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_transfers`
--

INSERT INTO `client_transfers` (`id`, `fromid`, `toid`, `transferamount`, `created_at`, `updated_at`) VALUES
(1, '19', '21', '12', '2019-12-17 06:29:08', '2019-12-17 06:29:08'),
(2, '19', '59', '100', '2019-12-17 06:29:24', '2019-12-17 06:29:24'),
(3, '59', '19', '100', '2019-12-17 06:35:01', '2019-12-17 06:35:01'),
(4, '21', '19', '300', '2019-12-17 06:35:01', NULL),
(5, '19', '19', '100', '2019-12-17 07:39:58', '2019-12-17 07:39:58'),
(6, '19', '21', '123', '2019-12-17 07:47:24', '2019-12-17 07:47:24'),
(7, '19', '21', '12', '2019-12-17 07:48:10', '2019-12-17 07:48:10'),
(8, '19', '21', '300', '2019-12-17 09:35:11', '2019-12-17 09:35:11'),
(9, '19', '2', '1000', '2019-12-18 04:06:43', '2019-12-18 04:06:43'),
(10, '19', '21', '100', '2019-12-18 04:07:57', '2019-12-18 04:07:57');

-- --------------------------------------------------------

--
-- Table structure for table `client_withdraws`
--

CREATE TABLE `client_withdraws` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agentid` int(11) DEFAULT NULL,
  `clientid` int(11) DEFAULT NULL,
  `withdrawamount` int(11) DEFAULT NULL,
  `payment` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actualamount` int(11) DEFAULT NULL,
  `chargeamount` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_withdraws`
--

INSERT INTO `client_withdraws` (`id`, `agentid`, `clientid`, `withdrawamount`, `payment`, `number`, `actualamount`, `chargeamount`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 4000, NULL, NULL, 3600, 400, 0, '2019-12-03 06:22:41', '2019-12-04 04:50:28'),
(2, 5, 7, 3000, NULL, NULL, 2700, 300, 0, '2019-12-05 08:56:21', '2019-12-08 06:25:14'),
(3, 1, 4, 2488, 'Bkash', '01318712782', 2239, 249, 0, '2019-12-06 09:10:08', '2019-12-08 06:40:07'),
(4, 1, 4, 5600, 'Nagad', '01670078232', 5040, 560, 0, '2019-12-06 09:17:20', '2019-12-11 08:36:47'),
(5, 8, 15, 5000, 'Roket', '01318712782', 4500, 500, 0, '2019-12-08 06:55:38', '2019-12-11 08:36:44'),
(6, 8, 15, 356, 'Bkash', '111111111111', 320, 36, 0, '2019-12-09 04:56:46', '2019-12-11 08:36:42'),
(7, 8, 15, 123, 'Bkash', '222222222222222222', 111, 12, 0, '2019-12-09 09:34:34', '2019-12-11 08:36:39'),
(8, 1, 16, 1000, 'Roket', '01318712782', 900, 100, 0, '2019-12-11 05:16:10', '2019-12-14 05:04:25'),
(9, 1, 16, 11500, 'Bkash', '01318712782', 10350, 1150, 1, '2019-12-01 05:46:13', '2019-12-11 08:40:59'),
(10, 2, 19, 300, 'Bitcoin', 'admin@admin.com', 270, 30, 0, '2019-12-11 09:10:30', '2019-12-14 05:03:44'),
(11, 2, 19, NULL, NULL, NULL, 0, 0, 0, '2019-12-17 04:14:20', '2019-12-17 04:14:20');

-- --------------------------------------------------------

--
-- Table structure for table `commisions`
--

CREATE TABLE `commisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `referercode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userscode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commision` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cdate` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commisions`
--

INSERT INTO `commisions` (`id`, `referercode`, `userscode`, `commision`, `cdate`, `created_at`, `updated_at`) VALUES
(3, 'REF15661', 'REF53134', '350', '2019-12-11', '2019-12-10 06:19:50', '2019-12-10 08:20:15'),
(4, 'REF54480', 'REF15661', '2150', '2019-12-11', '2019-12-10 06:41:36', '2019-12-13 08:39:37'),
(5, 'REF15661', 'REF65836', '1025', '2019-12-12', '2019-12-10 07:11:39', '2019-12-13 08:44:21'),
(6, 'REF54480', 'REF73766', '650', '2019-12-14', '2019-12-10 08:26:09', '2019-12-12 06:57:07'),
(7, 'REF15661', 'REF53134', '100', '2019-12-14', '2019-12-12 07:24:57', '2019-12-12 07:24:57'),
(8, 'REF54480', 'REF15661', '200', '2019-12-14', '2019-12-14 02:34:54', '2019-12-14 02:35:24'),
(9, 'REF27780', 'REF43969', '200', '2019-12-14', '2019-12-14 10:48:10', '2019-12-14 10:48:53'),
(10, 'REF43969', 'REF46619', '600', '2019-12-14', '2019-12-14 10:52:00', '2019-12-14 10:53:18'),
(11, 'REF43969', 'REF46619', '335.15400000000005', '2019-12-18', '2019-12-17 23:25:49', '2019-12-17 23:28:38');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_09_10_162317_create_admins_table', 2),
(31, '2014_10_12_000000_create_users_table', 3),
(32, '2019_10_16_163820_create_agents_table', 3),
(33, '2019_10_17_164103_create_agentlogins_table', 3),
(34, '2019_10_20_164559_create_ref_users_table', 3),
(35, '2019_10_20_181224_create_bet_tables_table', 3),
(36, '2019_11_02_160833_create_admin_funds_table', 3),
(37, '2019_11_02_160949_create_adminto_agentfunds_table', 3),
(38, '2019_11_02_161021_create_agentto_clientfunds_table', 3),
(39, '2019_11_03_150947_create_agenttoclientfund_histories_table', 3),
(40, '2019_11_03_151016_create_adintoagnetfund_histories_table', 3),
(41, '2019_11_04_161427_create_bet_holds_table', 3),
(42, '2019_11_07_155433_create_bet_wins_table', 3),
(43, '2019_11_16_051723_create_admin_fundhistories_table', 3),
(44, '2019_11_16_120348_create_client_withdraws_table', 3),
(45, '2019_12_10_111440_create_commisions_table', 4),
(46, '2019_12_12_115842_create_a_g_commisions_table', 5),
(47, '2019_12_17_101747_create_client_transfers_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admffffin@admin.com', '$2y$10$Sr4snQpDvkV7Gjt70NtyKegKNueKYEtgzylpq55ay86cPDyzqah7G', '2019-12-18 11:17:22'),
('nurul.sayeed.dev@gmail.com', '$2y$10$pDv60Sozs9wU7N0bmGfW6e3cROi3OsZHer4.6R7hSDzOXKtRURtCi', '2020-01-03 08:28:31');

-- --------------------------------------------------------

--
-- Table structure for table `ref_users`
--

CREATE TABLE `ref_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref_from_id` int(11) DEFAULT NULL,
  `ref_from_refcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref_to_id` int(11) DEFAULT NULL,
  `ref_to_refcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_users`
--

INSERT INTO `ref_users` (`id`, `ref_from_id`, `ref_from_refcode`, `ref_to_id`, `ref_to_refcode`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 4, 'REF20805', '2019-12-01 10:57:01', '2019-12-01 10:57:01'),
(2, 4, 'REF20805', 6, 'REF96166', '2019-12-05 04:06:54', '2019-12-05 04:06:54'),
(3, 6, 'REF96166', 7, 'REF34206', '2019-12-05 04:10:01', '2019-12-05 04:10:01'),
(4, 7, 'REF34206', 9, 'REF70072', '2019-12-05 06:22:16', '2019-12-05 06:22:16'),
(5, 9, 'REF70072', 10, 'REF26331', '2019-12-05 06:30:50', '2019-12-05 06:30:50'),
(6, 10, 'REF26331', 11, 'REF49588', '2019-12-05 06:32:48', '2019-12-05 06:32:48'),
(7, 11, 'REF49588', 12, 'REF97577', '2019-12-05 06:42:06', '2019-12-05 06:42:06'),
(8, 7, 'REF34206', 13, 'REF78383', '2019-12-05 07:11:38', '2019-12-05 07:11:38'),
(9, 13, 'REF78383', 14, 'REF96476', '2019-12-05 07:14:04', '2019-12-05 07:14:04'),
(10, 7, 'REF34206', 15, 'REF54480', '2019-12-05 07:18:27', '2019-12-05 07:18:27'),
(11, 15, 'REF54480', 16, 'REF15661', '2019-12-05 07:23:23', '2019-12-05 07:23:23'),
(12, 16, 'REF15661', 17, 'REF53134', '2019-12-05 07:24:44', '2019-12-05 07:24:44'),
(13, 16, 'REF15661', 18, 'REF65836', '2019-12-05 07:26:18', '2019-12-05 07:26:18'),
(14, 15, 'REF54480', 19, 'REF73766', '2019-12-05 08:15:09', '2019-12-05 08:15:09'),
(15, 19, 'REF73766', 20, 'REF68993', '2019-12-12 04:16:17', '2019-12-12 04:16:17'),
(16, 19, 'REF73766', 21, 'REF63391', '2019-12-12 10:03:03', '2019-12-12 10:03:03'),
(17, 58, 'REF18399', 59, 'REF24738', '2019-12-14 08:34:54', '2019-12-14 08:34:54'),
(18, 61, 'REF27780', 62, 'REF43969', '2019-12-14 10:25:11', '2019-12-14 10:25:11'),
(19, 62, 'REF43969', 63, 'REF46619', '2019-12-14 10:50:41', '2019-12-14 10:50:41'),
(20, 63, 'REF46619', 1000005, 'REF11676', '2019-12-18 04:42:04', '2019-12-18 04:42:04'),
(21, 63, 'REF46619', 1000006, 'REF72210', '2019-12-18 04:45:14', '2019-12-18 04:45:14'),
(22, 1000006, 'REF72210', 1000007, 'REF94821', '2019-12-18 05:01:36', '2019-12-18 05:01:36'),
(23, 63, 'REF46619', 1000008, 'REF81834', '2019-12-18 05:08:30', '2019-12-18 05:08:30'),
(24, 63, 'REF46619', 1000009, 'REF17900', '2019-12-18 05:34:51', '2019-12-18 05:34:51'),
(25, 63, 'REF46619', 1000012, 'REF61152', '2019-12-18 05:39:50', '2019-12-18 05:39:50'),
(26, 62, 'REF43969', 1000013, 'REF85507', '2019-12-18 05:44:29', '2019-12-18 05:44:29'),
(27, 62, 'REF43969', 1000014, 'REF98878', '2019-12-18 05:46:22', '2019-12-18 05:46:22'),
(28, 62, 'REF43969', 1000015, 'REF44404', '2019-12-18 06:31:23', '2019-12-18 06:31:23'),
(29, 62, 'REF43969', 1000016, 'REF70204', '2019-12-21 05:34:07', '2019-12-21 05:34:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refcode` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usercode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `useragentcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agentcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roleid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `profileimage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `showpassword` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `refcode`, `usercode`, `useragentcode`, `agentcode`, `country`, `roleid`, `profileimage`, `email_verified_at`, `password`, `remember_token`, `showpassword`, `created_at`, `updated_at`) VALUES
(1, 'Ismail Hossain', 'Ismail@gmail.com', '01720262307', NULL, NULL, NULL, 'AG7803', NULL, '2', '191575363332.jpg', NULL, '$2y$10$i2TuxozliiEYBFiK1QJZDO11g5hRFBFaTqis.2Yf5R4oNdC2z9Aaq', NULL, NULL, '2019-12-01 10:14:14', '2019-12-03 02:55:33'),
(2, 'Adnan Abdullah', 'adnan@gmail.com', '01613195777', NULL, NULL, NULL, 'AG5466', NULL, '2', '271575365693.jpg', NULL, '$2y$10$i2TuxozliiEYBFiK1QJZDO11g5hRFBFaTqis.2Yf5R4oNdC2z9Aaq', NULL, NULL, '2019-12-01 10:15:27', '2019-12-03 05:01:45'),
(3, 'Hbibullah Bahari', 'habibullah@gmail.com', '01742645651', NULL, NULL, NULL, 'AG3924', NULL, '2', '641575542108.jpg', NULL, '$2y$10$i2TuxozliiEYBFiK1QJZDO11g5hRFBFaTqis.2Yf5R4oNdC2z9Aaq', NULL, NULL, '2019-12-01 10:16:21', '2019-12-05 04:35:08'),
(5, 'Sayeed', 'sayeed@gmail.com', '01318712782', NULL, NULL, NULL, 'AG9276', NULL, '2', '661576061249.jpg', NULL, '$2y$10$i2TuxozliiEYBFiK1QJZDO11g5hRFBFaTqis.2Yf5R4oNdC2z9Aaq', NULL, NULL, '2019-12-04 04:38:21', '2019-12-11 04:47:30'),
(8, 'Temple Run', 'tamp@gmail.com', '01611111111', NULL, NULL, NULL, 'AG5855', NULL, '2', '851575806051.jpg', NULL, '$2y$10$i2TuxozliiEYBFiK1QJZDO11g5hRFBFaTqis.2Yf5R4oNdC2z9Aaq', NULL, NULL, '2019-12-05 04:36:55', '2019-12-08 07:43:11'),
(15, 'Mr.Symex It ltd.', 'admeein@admin.com', '12365678912', 'REF15661', 'REF54480', 'AG5855', NULL, 'Bangladesh', '1', NULL, NULL, '$2y$10$i2TuxozliiEYBFiK1QJZDO11g5hRFBFaTqis.2Yf5R4oNdC2z9Aaq', NULL, NULL, '2019-12-05 07:18:27', '2019-12-05 07:18:27'),
(16, 'Mr.Symex It ltd.2', 'mohddasin@gmail.com', '01756736353', 'REF54480', 'REF15661', 'AG7803', NULL, 'Bangladesh', '1', '701576063257.jpg', NULL, '$2y$10$i2TuxozliiEYBFiK1QJZDO11g5hRFBFaTqis.2Yf5R4oNdC2z9Aaq', NULL, NULL, '2019-12-05 07:23:23', '2019-12-11 05:20:57'),
(17, 'Cyan Group', 'neddw@gmail.com', '01789878787', 'REF15661', 'REF53134', 'AG7803', NULL, 'Bangladesh', '1', NULL, NULL, '$2y$10$i2TuxozliiEYBFiK1QJZDO11g5hRFBFaTqis.2Yf5R4oNdC2z9Aaq', NULL, NULL, '2019-12-05 07:24:44', '2019-12-05 07:24:44'),
(18, 'Mr.Symex It ltd.', 'adsdsdmin@admin.com', '12345678998', 'REF15661', 'REF65836', 'AG7803', NULL, 'Bangladesh', '1', NULL, NULL, '$2y$10$i2TuxozliiEYBFiK1QJZDO11g5hRFBFaTqis.2Yf5R4oNdC2z9Aaq', NULL, NULL, '2019-12-05 07:26:18', '2019-12-05 07:26:18'),
(19, 'new', 'abdddu@gmail.com', '12345678976', 'REF54480', 'REF73766', 'AG5466', NULL, 'Bangladesh', '1', NULL, NULL, '$2y$10$i2TuxozliiEYBFiK1QJZDO11g5hRFBFaTqis.2Yf5R4oNdC2z9Aaq', NULL, NULL, '2019-12-05 08:15:09', '2019-12-05 08:15:09'),
(21, 'Mr. Mamun', 'abu@gmail.com', '01720', 'REF73766', 'REF63391', 'AG5466', NULL, 'Bangladesh', '1', NULL, NULL, '$2y$10$i2TuxozliiEYBFiK1QJZDO11g5hRFBFaTqis.2Yf5R4oNdC2z9Aaq', NULL, NULL, '2019-12-12 10:03:03', '2019-12-12 10:03:03'),
(22, 'Sayeed Islam', 'Sayeed1@gmail.com', '01318712783', NULL, NULL, NULL, 'AG3314', NULL, '2', NULL, NULL, '$2y$10$i2TuxozliiEYBFiK1QJZDO11g5hRFBFaTqis.2Yf5R4oNdC2z9Aaq', NULL, NULL, '2019-12-14 05:34:36', '2019-12-14 05:34:36'),
(55, 'eeeeee', 'admineee@admin.com', '12345', 'REF55453', NULL, NULL, 'AG5013', NULL, '2', NULL, NULL, '$2y$10$i2TuxozliiEYBFiK1QJZDO11g5hRFBFaTqis.2Yf5R4oNdC2z9Aaq', NULL, NULL, '2019-12-14 08:12:15', '2019-12-14 08:12:15'),
(56, 'eeeeee', NULL, NULL, NULL, 'REF55453', 'AG5013', NULL, NULL, '5', NULL, NULL, '$2y$10$i2TuxozliiEYBFiK1QJZDO11g5hRFBFaTqis.2Yf5R4oNdC2z9Aaq', NULL, NULL, '2019-12-14 08:12:15', '2019-12-14 08:12:15'),
(57, 'fff', 'admffffin@admin.com', '123456', 'REF18399', NULL, NULL, 'AG3378', NULL, '2', NULL, NULL, '$2y$10$i2TuxozliiEYBFiK1QJZDO11g5hRFBFaTqis.2Yf5R4oNdC2z9Aaq', NULL, NULL, '2019-12-14 08:22:12', '2019-12-14 08:22:12'),
(58, 'fff', NULL, NULL, NULL, 'REF18399', 'AG3378', NULL, NULL, '5', NULL, NULL, '$2y$10$i2TuxozliiEYBFiK1QJZDO11g5hRFBFaTqis.2Yf5R4oNdC2z9Aaq', NULL, NULL, '2019-12-14 08:22:12', '2019-12-14 08:22:12'),
(60, 'gggggggggg', 'admggggggin@admin.com', '1234564444', 'REF27780', NULL, NULL, 'AG6556', NULL, '2', NULL, NULL, '$2y$10$i2TuxozliiEYBFiK1QJZDO11g5hRFBFaTqis.2Yf5R4oNdC2z9Aaq', NULL, NULL, '2019-12-14 09:10:44', '2019-12-14 09:10:44'),
(61, 'gggggggggg', NULL, NULL, NULL, 'REF27780', 'AG6556', NULL, NULL, '5', NULL, NULL, '$2y$10$i2TuxozliiEYBFiK1QJZDO11g5hRFBFaTqis.2Yf5R4oNdC2z9Aaq', NULL, NULL, '2019-12-14 09:10:45', '2019-12-14 09:10:45'),
(62, 'ggg', 'gg@gmail.com', '0132', 'REF27780', 'REF43969', 'AG6556', NULL, 'Bangladesh', '1', NULL, NULL, '$2y$10$i2TuxozliiEYBFiK1QJZDO11g5hRFBFaTqis.2Yf5R4oNdC2z9Aaq', NULL, NULL, '2019-12-14 10:25:11', '2019-12-14 10:25:11'),
(63, 'Mr Shohel Rana', 'nurul.sayeed.dev@gmail.com', '0133', 'REF43969', 'REF46619', 'AG6556', NULL, 'Cyprus North', '1', NULL, NULL, '5', NULL, NULL, '2019-12-14 10:50:41', '2019-12-17 23:33:11'),
(1000001, 'Sayeed', 'Sayeeeeed@gmail.com', '01750', 'REF93583', NULL, NULL, 'AG4085', NULL, '2', NULL, NULL, '$2y$10$i2TuxozliiEYBFiK1QJZDO11g5hRFBFaTqis.2Yf5R4oNdC2z9Aaq', NULL, NULL, '2019-12-17 03:28:35', '2019-12-17 03:28:35'),
(1000003, 'hello', 'hello@gmail.com', '9000', 'REF91703', NULL, NULL, 'AG1994', NULL, '2', NULL, NULL, '$2y$10$i2TuxozliiEYBFiK1QJZDO11g5hRFBFaTqis.2Yf5R4oNdC2z9Aaq', NULL, NULL, '2019-12-17 03:30:42', '2019-12-17 03:30:42'),
(1000010, 'sayeedgggggggggg', 'Sayerred1@gmail.com', '12345678911', 'REF54741', NULL, NULL, 'AG7757', NULL, '2', NULL, NULL, '$2y$10$i2TuxozliiEYBFiK1QJZDO11g5hRFBFaTqis.2Yf5R4oNdC2z9Aaq', NULL, NULL, '2019-12-18 05:37:28', '2019-12-18 05:37:28'),
(1000015, 'jhgfgyrey', 'abrrrru@gmail.com', '01923', 'REF43969', 'REF44404', 'AG6556', NULL, 'US', '1', NULL, NULL, '$2y$10$i2TuxozliiEYBFiK1QJZDO11g5hRFBFaTqis.2Yf5R4oNdC2z9Aaq', NULL, NULL, '2019-12-18 06:31:23', '2019-12-18 06:31:23'),
(1000016, 'TopLine', 'admuuuin@admin.com', '34565768778', 'REF43969', 'REF70204', 'AG6556', NULL, 'US', '1', NULL, NULL, '$2y$10$dQve4.PWzKdlnOfHux1yZueejsDhUB6EsSMuWRP6R0HRCNpGVGVDO', NULL, '12345678', '2019-12-21 05:34:07', '2019-12-21 05:34:07'),
(1000017, 'TopLine', 'adffffmin@admin.com', '123544668779', 'REF79546', NULL, NULL, 'AG6044', NULL, '2', NULL, NULL, '$2y$10$SUDyBdnr49WMPyKZmLTthOoCJazZipJGWKv6YhDPspqTbc2vI3.yG', NULL, '12345678', '2019-12-21 05:41:13', '2019-12-21 05:41:13'),
(1000018, 'TopLine', NULL, NULL, NULL, 'REF79546', 'AG6044', NULL, NULL, '5', NULL, NULL, '$2y$10$sZxvzAWC7arsqKXXZF4EyuWAjPwnwW4gJTRyoSarNgtLOxbM8xr1O', NULL, NULL, '2019-12-21 05:41:14', '2019-12-21 05:41:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adintoagnetfund_histories`
--
ALTER TABLE `adintoagnetfund_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `adminto_agentfunds`
--
ALTER TABLE `adminto_agentfunds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_fundhistories`
--
ALTER TABLE `admin_fundhistories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_funds`
--
ALTER TABLE `admin_funds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agentlogins`
--
ALTER TABLE `agentlogins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `agentlogins_agentcode_unique` (`agentcode`),
  ADD UNIQUE KEY `agentlogins_email_unique` (`email`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `agents_agentcode_unique` (`agentcode`);

--
-- Indexes for table `agenttoclientfund_histories`
--
ALTER TABLE `agenttoclientfund_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agentto_clientfunds`
--
ALTER TABLE `agentto_clientfunds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `a_g_commisions`
--
ALTER TABLE `a_g_commisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bet_holds`
--
ALTER TABLE `bet_holds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bet_tables`
--
ALTER TABLE `bet_tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bet_wins`
--
ALTER TABLE `bet_wins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_transfers`
--
ALTER TABLE `client_transfers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_withdraws`
--
ALTER TABLE `client_withdraws`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commisions`
--
ALTER TABLE `commisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `ref_users`
--
ALTER TABLE `ref_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`),
  ADD UNIQUE KEY `users_usercode_unique` (`usercode`),
  ADD UNIQUE KEY `users_agentcode_unique` (`agentcode`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adintoagnetfund_histories`
--
ALTER TABLE `adintoagnetfund_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `adminto_agentfunds`
--
ALTER TABLE `adminto_agentfunds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `admin_fundhistories`
--
ALTER TABLE `admin_fundhistories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admin_funds`
--
ALTER TABLE `admin_funds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agentlogins`
--
ALTER TABLE `agentlogins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agenttoclientfund_histories`
--
ALTER TABLE `agenttoclientfund_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `agentto_clientfunds`
--
ALTER TABLE `agentto_clientfunds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `a_g_commisions`
--
ALTER TABLE `a_g_commisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `bet_holds`
--
ALTER TABLE `bet_holds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `bet_tables`
--
ALTER TABLE `bet_tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bet_wins`
--
ALTER TABLE `bet_wins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `client_transfers`
--
ALTER TABLE `client_transfers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `client_withdraws`
--
ALTER TABLE `client_withdraws`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `commisions`
--
ALTER TABLE `commisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `ref_users`
--
ALTER TABLE `ref_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000019;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
