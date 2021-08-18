-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2021 at 04:04 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tunasdash`
--

-- --------------------------------------------------------

--
-- Table structure for table `actuatordevices`
--

CREATE TABLE `actuatordevices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site` varchar(100) NOT NULL,
  `floor` int(11) NOT NULL,
  `devices` varchar(100) NOT NULL,
  `airtemperature` int(11) NOT NULL,
  `humidity` int(11) NOT NULL,
  `acstart` int(11) NOT NULL,
  `acend` int(11) NOT NULL,
  `lightstart` int(11) NOT NULL,
  `lightend` int(11) NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `actuatorgrowinstallations`
--

CREATE TABLE `actuatorgrowinstallations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site` varchar(100) NOT NULL,
  `floor` int(11) NOT NULL,
  `devices` varchar(100) NOT NULL,
  `growinstallation` varchar(100) NOT NULL,
  `watertemperature` int(11) NOT NULL,
  `tds` int(11) NOT NULL,
  `ph` int(11) NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'Admin Tunas Farm', 0, '2021-07-03 00:38:10', '2021-07-09 17:20:33', NULL),
(2, 'grower', 'Grower Tunas', 0, '2021-07-03 00:52:06', '2021-07-03 00:52:06', NULL),
(3, 'owner', 'Owner Tunas', 0, '2021-07-04 12:48:59', '2021-07-04 12:48:59', '2021-07-04 07:48:50'),
(4, 'grower', 'Grower Tunas', 0, '2021-07-09 17:18:27', '2021-07-09 17:19:05', '2021-07-09 05:19:05'),
(5, 'owner', 'Owner Tunas', 0, '2021-07-09 17:18:56', '2021-07-09 17:18:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `id` int(11) NOT NULL,
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`id`, `group_id`, `user_id`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 0, '2021-07-03 00:41:06', '2021-07-09 17:10:15', NULL),
(2, 2, 3, 0, '2021-07-03 00:53:17', '2021-07-09 17:10:20', NULL),
(3, 3, 4, 0, '2021-07-04 11:54:54', '2021-07-11 11:59:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '127.0.0.1', 'admin', 1, '2021-07-02 12:42:03', 0, 0, '2021-07-03 00:42:03', '2021-07-03 00:42:03', NULL),
(2, '127.0.0.1', 'admin@tunas.com', 1, '2021-07-02 12:44:27', 1, 0, '2021-07-03 00:44:27', '2021-07-03 00:44:27', NULL),
(3, '127.0.0.1', 'grower@tunas.com', 3, '2021-07-02 12:55:23', 1, 0, '2021-07-03 00:55:23', '2021-07-03 00:55:23', NULL),
(4, '127.0.0.1', 'grower', NULL, '2021-07-03 23:17:33', 0, 0, '2021-07-04 11:17:33', '2021-07-04 11:17:33', NULL),
(5, '127.0.0.1', 'grower@tunas.com', 3, '2021-07-03 23:17:51', 1, 0, '2021-07-04 11:17:51', '2021-07-04 11:17:51', NULL),
(6, '127.0.0.1', 'admin@tunas.com', 1, '2021-07-03 23:53:38', 1, 0, '2021-07-04 11:53:38', '2021-07-04 11:53:38', NULL),
(7, '127.0.0.1', 'admin@tunas.com', 1, '2021-07-03 23:54:39', 1, 0, '2021-07-04 11:54:39', '2021-07-04 11:54:39', NULL),
(8, '127.0.0.1', 'owner@tunas.com', 4, '2021-07-03 23:55:06', 1, 0, '2021-07-04 11:55:06', '2021-07-04 11:55:06', NULL),
(9, '127.0.0.1', 'grower@tunas.com', 3, '2021-07-04 00:19:02', 1, 0, '2021-07-04 12:19:02', '2021-07-04 12:19:02', NULL),
(10, '127.0.0.1', 'admin@tunas.com', 1, '2021-07-04 00:48:11', 1, 0, '2021-07-04 12:48:11', '2021-07-04 12:48:11', NULL),
(11, '127.0.0.1', 'admin@tunas.com', 1, '2021-07-05 22:25:38', 1, 0, '2021-07-06 10:25:38', '2021-07-06 10:25:38', NULL),
(12, '127.0.0.1', 'admin@tunas.com', 1, '2021-07-06 07:59:34', 1, 0, '2021-07-06 19:59:34', '2021-07-06 19:59:34', NULL),
(13, '127.0.0.1', 'admin@tunas.com', 1, '2021-07-07 07:31:15', 1, 0, '2021-07-07 19:31:15', '2021-07-07 19:31:15', NULL),
(14, '127.0.0.1', 'admin@tunas.com', 1, '2021-07-07 07:33:42', 1, 0, '2021-07-07 19:33:42', '2021-07-07 19:33:42', NULL),
(15, '127.0.0.1', 'admin@tunas.com', 1, '2021-07-07 07:34:01', 1, 0, '2021-07-07 19:34:01', '2021-07-07 19:34:01', NULL),
(16, '127.0.0.1', 'admin@tunas.com', 1, '2021-07-09 04:51:04', 1, 0, '2021-07-09 16:51:04', '2021-07-09 16:51:04', NULL),
(17, '127.0.0.1', 'admin@tunas.com', 1, '2021-07-09 04:51:46', 1, 0, '2021-07-09 16:51:46', '2021-07-09 16:51:46', NULL),
(18, '127.0.0.1', 'admin@tunas.com', 1, '2021-07-09 04:54:15', 1, 0, '2021-07-09 16:54:15', '2021-07-09 16:54:15', NULL),
(19, '127.0.0.1', 'grower@tunas.com', 3, '2021-07-09 04:54:34', 1, 0, '2021-07-09 16:54:34', '2021-07-09 16:54:34', NULL),
(20, '127.0.0.1', 'grower@tunas.com', 3, '2021-07-09 04:55:54', 1, 0, '2021-07-09 16:55:54', '2021-07-09 16:55:54', NULL),
(21, '127.0.0.1', 'grower@tunas.com', 3, '2021-07-09 04:56:38', 1, 0, '2021-07-09 16:56:38', '2021-07-09 16:56:38', NULL),
(22, '127.0.0.1', 'admin', NULL, '2021-07-09 04:56:47', 0, 0, '2021-07-09 16:56:47', '2021-07-09 16:56:47', NULL),
(23, '127.0.0.1', 'admin@tunas.com', 1, '2021-07-09 04:56:53', 1, 0, '2021-07-09 16:56:53', '2021-07-09 16:56:53', NULL),
(24, '127.0.0.1', 'admin@tunas.com', 1, '2021-07-10 22:54:15', 1, 0, '2021-07-11 10:54:15', '2021-07-11 10:54:15', NULL),
(25, '127.0.0.1', 'owner@tunas.com', 4, '2021-07-13 09:08:54', 1, 0, '2021-07-13 21:08:54', '2021-07-13 21:08:54', NULL),
(26, '127.0.0.1', 'admin@tunas.com', 1, '2021-07-13 09:09:10', 1, 0, '2021-07-13 21:09:10', '2021-07-13 21:09:10', NULL),
(27, '127.0.0.1', 'grower@tunas.com', 3, '2021-07-13 09:09:24', 1, 0, '2021-07-13 21:09:24', '2021-07-13 21:09:24', NULL),
(28, '127.0.0.1', 'admin@tunas.com', 1, '2021-07-13 09:16:23', 1, 0, '2021-07-13 21:16:23', '2021-07-13 21:16:23', NULL),
(29, '127.0.0.1', 'admin', NULL, '2021-07-13 10:27:15', 0, 0, '2021-07-13 22:27:15', '2021-07-13 22:27:15', NULL),
(30, '127.0.0.1', 'admin@tunas.com', 1, '2021-07-13 10:27:27', 1, 0, '2021-07-13 22:27:27', '2021-07-13 22:27:27', NULL),
(31, '127.0.0.1', 'admin', NULL, '2021-07-13 10:30:13', 0, 0, '2021-07-13 22:30:13', '2021-07-13 22:30:13', NULL),
(32, '127.0.0.1', 'admin@tunas.com', 1, '2021-07-13 10:30:20', 1, 0, '2021-07-13 22:30:20', '2021-07-13 22:30:20', NULL),
(33, '127.0.0.1', 'grower', NULL, '2021-07-13 10:30:43', 0, 0, '2021-07-13 22:30:43', '2021-07-13 22:30:43', NULL),
(34, '127.0.0.1', 'grower@tunas.com', 3, '2021-07-13 10:30:55', 1, 0, '2021-07-13 22:30:55', '2021-07-13 22:30:55', NULL),
(35, '127.0.0.1', 'bri', NULL, '2021-07-13 22:51:57', 0, 0, '2021-07-14 10:51:57', '2021-07-14 10:51:57', NULL),
(36, '127.0.0.1', 'admin', NULL, '2021-07-14 03:19:29', 0, 0, '2021-07-14 15:19:29', '2021-07-14 15:19:29', NULL),
(37, '127.0.0.1', 'mwiamdiwa', NULL, '2021-07-14 03:19:36', 0, 0, '2021-07-14 15:19:36', '2021-07-14 15:19:36', NULL),
(38, '127.0.0.1', 'admin@tunas.com', 1, '2021-07-14 03:19:53', 1, 0, '2021-07-14 15:19:53', '2021-07-14 15:19:53', NULL),
(39, '127.0.0.1', 'grower@tunas.com', 3, '2021-07-14 03:26:50', 1, 0, '2021-07-14 15:26:50', '2021-07-14 15:26:50', NULL),
(40, '127.0.0.1', 'admin@tunas.com', 1, '2021-07-14 03:28:00', 1, 0, '2021-07-14 15:28:00', '2021-07-14 15:28:00', NULL),
(41, '127.0.0.1', 'admin@tunas.com', 1, '2021-07-14 03:38:57', 1, 0, '2021-07-14 15:38:57', '2021-07-14 15:38:57', NULL),
(42, '127.0.0.1', 'grower@tunas.com', 3, '2021-07-14 08:48:26', 1, 0, '2021-07-14 20:48:26', '2021-07-14 20:48:26', NULL),
(43, '127.0.0.1', 'admin@tunas.com', 1, '2021-07-14 09:27:38', 1, 0, '2021-07-14 21:27:38', '2021-07-14 21:27:38', NULL),
(44, '127.0.0.1', 'admin', NULL, '2021-07-14 20:22:34', 0, 0, '2021-07-15 08:22:34', '2021-07-15 08:22:34', NULL),
(45, '127.0.0.1', 'awda', NULL, '2021-07-14 20:22:42', 0, 0, '2021-07-15 08:22:42', '2021-07-15 08:22:42', NULL),
(46, '127.0.0.1', 'admin@tunas.com', 1, '2021-07-14 20:22:56', 1, 0, '2021-07-15 08:22:56', '2021-07-15 08:22:56', NULL),
(47, '127.0.0.1', 'grower@tunas.com', 3, '2021-07-14 20:27:38', 1, 0, '2021-07-15 08:27:38', '2021-07-15 08:27:38', NULL),
(48, '127.0.0.1', 'admin@tunas.com', 1, '2021-07-14 20:38:01', 1, 0, '2021-07-15 08:38:01', '2021-07-15 08:38:01', NULL),
(49, '127.0.0.1', 'admin@tunas.com', 1, '2021-08-03 23:23:55', 1, 0, '2021-08-04 11:23:55', '2021-08-04 11:23:55', NULL),
(50, '127.0.0.1', 'grower@tunas.com', 3, '2021-08-03 23:24:10', 1, 0, '2021-08-04 11:24:10', '2021-08-04 11:24:10', NULL),
(51, '127.0.0.1', 'admin', NULL, '2021-08-03 23:32:41', 0, 0, '2021-08-04 11:32:41', '2021-08-04 11:32:41', NULL),
(52, '127.0.0.1', 'admin@tunas.com', 1, '2021-08-03 23:32:47', 1, 0, '2021-08-04 11:32:47', '2021-08-04 11:32:47', NULL),
(53, '127.0.0.1', 'grower@tunas.com', 3, '2021-08-03 23:32:56', 1, 0, '2021-08-04 11:32:56', '2021-08-04 11:32:56', NULL),
(54, '127.0.0.1', 'grower@tunas.com', 3, '2021-08-14 20:04:29', 1, 0, '2021-08-15 08:04:29', '2021-08-15 08:04:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `token` text NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_tokens`
--

INSERT INTO `auth_tokens` (`id`, `user_id`, `token`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(16, 4, '$2y$10$m7GFKiH2CzdwbBlS0I3TOOP9fmRMleTG.0BPQyenw9mx2FKDMJttG', 0, '2021-07-15 08:37:00', '2021-07-15 08:37:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prefix_code` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `customer` varchar(200) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `prefix_code`, `name`, `address`, `customer`, `phone`, `email`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'TF', 'Tunas Farm', 'Serpong, BSD ', '1', '08979912381287', 'info@tunas.com', 0, 0, '2021-06-23 13:29:42', '2021-06-23 13:30:51', '2021-06-23 01:30:51'),
(3, 'TF', 'Tunas Farm', 'Serpong, BSD ', '1', '08123981238', 'info@tunasfarm.id', 0, 0, '2021-06-23 13:34:33', '2021-06-23 13:35:12', '2021-06-23 01:35:12'),
(5, 'w', 'wdiaiaw', 'ldjldiwjildjd ', '1', '098190238014', 'kdnkaw@mail.com', 0, 0, '2021-06-23 13:38:47', '2021-06-23 13:38:47', NULL),
(6, 'd', 'test', 'dkaw;odko;awd ', '1', '01828321921721', 'dljaw@mail.com', 0, 0, '2021-06-23 13:42:05', '2021-06-24 13:42:27', NULL),
(7, 'a', 'Adhitia Lukmana', 'test', '1', '091829038103', 'lakdja@mail.com', 0, 0, '2021-06-23 13:44:51', '2021-06-24 13:06:32', '2021-06-24 01:06:32'),
(8, 'j', 'joiwiad', 'odjwjwad ', '1', '109823018314', 'dadioaowdwa@mail.com', 0, 0, '2021-06-23 13:50:52', '2021-06-25 11:44:11', '2021-06-24 23:44:11'),
(9, 'AL', 'Adhitia Lukmana', 'dlawdlalwji ', '1', '901908391028', 'adiawn@mail.com', 0, 0, '2021-06-24 13:06:56', '2021-06-24 13:42:15', '2021-06-24 01:42:15'),
(10, 'TF', 'Tunas Farm', 'Serpong ', '7', '08123098333', 'info@tunasfarm.com', 0, 0, '2021-07-14 21:28:50', '2021-07-14 21:29:05', '2021-07-14 09:29:05'),
(11, 'TF', 'Tunas Farm', 'Serpong ', '7', '08811223300', 'info@tunas.id', 0, 0, '2021-07-14 21:29:56', '2021-07-14 21:29:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company` varchar(100) NOT NULL,
  `site` varchar(100) NOT NULL,
  `start_period` varchar(100) NOT NULL,
  `end_period` varchar(100) NOT NULL,
  `contract_document` varchar(100) NOT NULL,
  `contract_commitment` int(11) NOT NULL,
  `partnership_objective` enum('building utilization','additional income','main income','agriculture contribution') NOT NULL DEFAULT 'building utilization',
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`id`, `company`, `site`, `start_period`, `end_period`, `contract_document`, `contract_commitment`, `partnership_objective`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '5', '2', '05 - 21', '05 - 22', 'caisim.jpg', 1, 'additional income', 0, 0, '2021-07-02 20:42:40', '2021-07-02 20:42:40', NULL),
(2, '11', '3', '07 - 21', '07 - 22', 'grower.txt', 1, 'building utilization', 0, 0, '2021-07-14 21:31:25', '2021-07-14 21:34:34', '2021-07-14 09:34:34'),
(3, '11', '3', '07 - 21', '07 - 22', 'grower.txt', 1, 'building utilization', 0, 0, '2021-07-14 21:33:11', '2021-07-14 21:34:36', '2021-07-14 09:34:36'),
(4, '11', '3', '05 - 21', '05 - 22', 'grower.txt', 1, 'additional income', 0, 0, '2021-07-14 21:35:22', '2021-07-14 21:37:43', '2021-07-14 09:37:43'),
(5, '11', '3', '05 - 21', '05 - 22', 'grower.txt', 1, 'building utilization', 0, 0, '2021-07-14 21:38:03', '2021-07-14 21:40:57', '2021-07-14 09:40:57'),
(6, '11', '3', '05 - 21', '05 -22', 'caisim.jpg', 1, 'building utilization', 0, 0, '2021-07-14 21:41:12', '2021-07-14 21:48:08', '2021-07-14 09:48:08'),
(7, '11', '3', '05 - 21', '05 - 22', 'Screenshot_1.jpg', 1, 'main income', 0, 0, '2021-07-14 21:46:04', '2021-07-14 21:48:10', '2021-07-14 09:48:10'),
(8, '11', '3', '05 - 21', '05 - 22', 'Screenshot_1.jpg', 1, 'main income', 0, 0, '2021-07-14 21:48:25', '2021-07-14 21:50:14', '2021-07-14 09:50:14'),
(9, '11', '3', '05 -21', ' 05 -22', 'Screenshot_1.jpg', 2, 'additional income', 0, 0, '2021-07-14 21:48:58', '2021-07-14 21:50:16', '2021-07-14 09:50:16'),
(10, '11', '3', '05 - 21', '05 - 23', 'Screenshot_1.jpg', 2, 'main income', 0, 0, '2021-07-14 21:50:32', '2021-07-14 21:50:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `investment` enum('conservative','moderate','aggresive') NOT NULL DEFAULT 'conservative',
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `address`, `phone`, `email`, `investment`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Tunas Dash', 'Serpong, BSD ', '08123123123', 'tunasdash@mail.com', 'moderate', 0, 0, '2021-06-23 12:53:02', '2021-06-23 12:53:02', NULL),
(3, 'Tost', 'Test ', '081122334411', 'test@gmail.com', 'conservative', 0, 0, '2021-06-30 17:28:38', '2021-06-30 17:31:00', '2021-06-30 05:31:00'),
(4, 'tunas', ' serpong', '080909123123', 'tunas@gmail.com', 'moderate', 0, 0, '2021-06-30 17:36:24', '2021-06-30 17:37:19', '2021-06-30 05:37:19'),
(5, 'TIM 5', 'Ciledug', '081122334455', 'email@gmail.com', 'conservative', 0, 0, '2021-07-14 15:44:12', '2021-07-14 15:44:20', '2021-07-14 03:44:20'),
(7, 'TIM 5', ' Cildeug', '081123121321', 'mail@gmail.com', 'moderate', 0, 0, '2021-07-14 15:45:09', '2021-07-14 15:45:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(100) NOT NULL,
  `type` enum('Tower','Grow Bed','Home Kit') NOT NULL DEFAULT 'Tower',
  `floor` int(11) NOT NULL,
  `level_count` int(11) NOT NULL,
  `holes` int(11) NOT NULL,
  `site` varchar(100) NOT NULL,
  `grow_installation` varchar(100) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `code`, `type`, `floor`, `level_count`, `holes`, `site`, `grow_installation`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'DS74-1', 'Tower', 0, 0, 0, '1', '1', 'active', 0, 0, '2021-06-30 15:39:08', '2021-06-30 15:46:04', '2021-06-30 03:46:04'),
(2, 'DS84-Tunas Dash', 'Tower', 0, 0, 0, '2', '1', 'active', 0, 0, '2021-06-30 15:47:37', '2021-07-14 22:04:59', '2021-07-14 10:04:59'),
(3, 'DS06', 'Tower', 0, 0, 0, '3', '2', 'active', 0, 0, '2021-07-14 21:58:20', '2021-07-14 21:59:53', '2021-07-14 09:59:53'),
(4, 'DS26-', 'Tower', 0, 0, 0, '3', '2', 'active', 0, 0, '2021-07-14 21:59:58', '2021-07-14 22:00:23', '2021-07-14 10:00:23'),
(5, 'DS76--', 'Tower', 0, 0, 0, '3', '2', 'active', 0, 0, '2021-07-14 22:00:28', '2021-07-14 22:03:18', '2021-07-14 10:03:18'),
(6, 'DS97-Choose...-Tunas Fresh-Tunas Fresh', 'Tower', 0, 0, 0, '3', '2', 'active', 0, 0, '2021-07-14 22:03:23', '2021-07-14 22:03:27', '2021-07-14 10:03:27'),
(7, 'DS97-Choose...-Tunas Fresh-Tunas Fresh-Choose...-Tunas Fresh', 'Tower', 0, 0, 0, '3', '2', 'active', 0, 0, '2021-07-14 22:03:50', '2021-07-14 22:05:01', '2021-07-14 10:05:01'),
(8, 'DS23-Tunas Fresh', 'Tower', 0, 0, 0, '3', '2', 'active', 0, 0, '2021-07-14 22:05:06', '2021-07-14 22:05:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `grooming`
--

CREATE TABLE `grooming` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(200) NOT NULL,
  `seedling` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `tower_level` varchar(100) NOT NULL,
  `terproses` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `id_tanaman` int(11) NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grooming`
--

INSERT INTO `grooming` (`id`, `code`, `seedling`, `tanggal`, `tower_level`, `terproses`, `sisa`, `status`, `id_tanaman`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'GR79-Caisim', '3', '2021-06-29', 'tower 1 - level 1', 90, 10, 'active', 5, 0, 0, '2021-06-30 11:48:11', '2021-06-30 12:10:06', '2021-06-30 00:10:06'),
(2, 'GR52-Green romaine', '4', '2021-06-30', 'tower 1 - level 1', 80, 0, 'active', 8, 0, 0, '2021-06-30 12:21:38', '2021-07-14 20:59:48', '2021-07-14 08:59:48'),
(3, 'GR93-Green romaine', '4', '2021-06-30', 'tower 1 - level 1', 8, 0, 'active', 8, 0, 0, '2021-06-30 12:23:31', '2021-07-13 23:48:38', '2021-07-13 11:48:38'),
(4, 'GR98-Green romaine', '5', '2021-07-13', 'tower 1 - level 1', 80, 0, 'inactive', 8, 0, 0, '2021-06-30 16:16:53', '2021-07-14 20:59:52', '2021-07-14 08:59:52'),
(5, 'GR29', '4', '2021-07-13', 'tower 1 - level 1', 90, 0, 'active', 8, 0, 0, '2021-07-13 23:48:57', '2021-07-13 23:50:07', '2021-07-13 11:50:07'),
(6, 'GR13', '4', '2021-07-13', 'tower 1 - level 1', 90, 0, 'active', 8, 0, 0, '2021-07-13 23:50:16', '2021-07-14 20:59:50', '2021-07-14 08:59:50'),
(7, 'GR42-Caisim', '15', '2021-07-14', 'tower 1 - level 1', 50, 0, 'inactive', 24, 0, 0, '2021-07-14 21:22:07', '2021-07-15 08:30:26', NULL),
(8, 'GR66-Caisim', '21', '2021-08-18', 'tower 1 - level 1', 25, -25, 'active', 24, 0, 0, '2021-08-15 08:44:30', '2021-08-15 08:51:23', NULL),
(9, 'GR90-Caisim', '22', '2021-08-04', 'tower 1 - level 1', 50, 0, 'inactive', 24, 0, 0, '2021-08-15 08:45:15', '2021-08-15 08:50:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `grow_installations`
--

CREATE TABLE `grow_installations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(100) NOT NULL,
  `customer` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `type` enum('tower','grow bed','home kit') NOT NULL DEFAULT 'tower',
  `level_count` int(11) NOT NULL,
  `level_hole` int(11) NOT NULL,
  `hole` int(11) NOT NULL,
  `site` varchar(100) NOT NULL,
  `floor` int(11) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grow_installations`
--

INSERT INTO `grow_installations` (`id`, `code`, `customer`, `company`, `type`, `level_count`, `level_hole`, `hole`, `site`, `floor`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'GI83-tower', '1', '6', 'tower', 9, 40, 0, '1', 0, 'active', 0, 0, '2021-06-30 15:08:17', '2021-06-30 15:08:17', NULL),
(2, 'GI16-tower', '7', '11', 'tower', 5, 40, 0, '3', 0, 'active', 0, 0, '2021-07-14 21:51:27', '2021-07-14 21:51:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `harvesting`
--

CREATE TABLE `harvesting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `transplanting` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `terproses` bigint(20) NOT NULL,
  `sisa` bigint(20) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `id_tanaman` int(11) NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `harvesting`
--

INSERT INTO `harvesting` (`id`, `code`, `transplanting`, `tanggal`, `terproses`, `sisa`, `status`, `id_tanaman`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'HA16-undefined', 'TR35-Caisim', '2021-06-30', 70, 0, 'active', 5, 0, 0, '2021-06-30 12:06:47', '2021-06-30 12:07:46', '2021-06-30 00:07:46'),
(2, 'HA03-Caisim', 'TR35-Caisim', '2021-06-30', 70, 0, 'active', 5, 0, 0, '2021-06-30 12:09:03', '2021-06-30 12:10:16', '2021-06-30 00:10:16'),
(3, 'HA32-Green romaine', 'TR88-Green romaine', '2021-06-30', 57, 0, 'active', 8, 0, 0, '2021-06-30 12:27:09', '2021-07-13 23:45:40', '2021-07-13 11:45:40'),
(4, 'HA51', 'TR88-Green romaine', '2021-07-13', 70, 0, 'active', 8, 0, 0, '2021-07-13 23:45:49', '2021-07-13 23:55:19', '2021-07-13 11:55:19'),
(5, 'HA56', 'TR63', '2021-07-13', 90, 0, 'active', 8, 0, 0, '2021-07-13 23:51:56', '2021-07-13 23:52:07', '2021-07-13 11:52:07'),
(6, 'HA03', 'TR63', '2021-07-13', 80, 0, 'active', 8, 0, 0, '2021-07-13 23:52:13', '2021-07-13 23:52:55', '2021-07-13 11:52:55'),
(7, 'HA67', 'TR63', '2021-07-13', 80, 0, 'active', 8, 0, 0, '2021-07-13 23:53:01', '2021-07-14 20:59:58', '2021-07-14 08:59:58'),
(8, 'HA43', 'TR88-Green romaine', '2021-07-13', 70, 0, 'active', 8, 0, 0, '2021-07-13 23:56:08', '2021-07-14 21:00:00', '2021-07-14 09:00:00'),
(9, 'HA27-Caisim', 'TR21-Caisim', '2021-07-14', 50, 0, 'active', 24, 0, 0, '2021-07-15 08:30:34', '2021-07-15 08:30:34', NULL),
(10, 'HA01-Caisim', 'TR73-Caisim-Caisim', '2021-08-25', 50, 50, 'active', 0, 0, 0, '2021-08-15 08:56:41', '2021-08-15 09:03:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2021-05-02-235225', 'App\\Database\\Migrations\\Planttypes', 'default', 'App', 1624248863, 1),
(2, '2021-05-04-142653', 'App\\Database\\Migrations\\Customers', 'default', 'App', 1624248864, 1),
(3, '2021-05-09-151119', 'App\\Database\\Migrations\\Contracts', 'default', 'App', 1624248864, 1),
(4, '2021-05-10-021154', 'App\\Database\\Migrations\\Systemlogs', 'default', 'App', 1624248864, 1),
(5, '2021-05-10-051134', 'App\\Database\\Migrations\\Plantdatalogs', 'default', 'App', 1624248864, 1),
(6, '2021-05-10-084342', 'App\\Database\\Migrations\\Devices', 'default', 'App', 1624248864, 1),
(7, '2021-05-10-102618', 'App\\Database\\Migrations\\Growsinstallations', 'default', 'App', 1624248864, 1),
(8, '2021-05-11-044506', 'App\\Database\\Migrations\\Sites', 'default', 'App', 1624248864, 1),
(9, '2021-05-11-062026', 'App\\Database\\Migrations\\Company', 'default', 'App', 1624248864, 1),
(10, '2021-05-24-034526', 'App\\Database\\Migrations\\Sprouting', 'default', 'App', 1624248964, 2),
(11, '2021-05-24-034600', 'App\\Database\\Migrations\\Grooming', 'default', 'App', 1624248964, 2),
(12, '2021-05-24-034628', 'App\\Database\\Migrations\\Seedling', 'default', 'App', 1624248964, 2),
(13, '2021-05-24-034650', 'App\\Database\\Migrations\\Transplanting', 'default', 'App', 1624248964, 2),
(14, '2021-05-24-034704', 'App\\Database\\Migrations\\Harvesting', 'default', 'App', 1624248964, 2),
(15, '2021-06-02-085238', 'App\\Database\\Migrations\\Actuatorsetup', 'default', 'App', 1624248965, 2),
(17, '2021-07-02-135934', 'App\\Database\\Migrations\\Actuatorgrowinstallations', 'default', 'App', 1625234736, 4),
(18, '2021-07-02-135940', 'App\\Database\\Migrations\\Actuatordevices', 'default', 'App', 1625234736, 4),
(19, '2021-07-02-152840', 'App\\Database\\Migrations\\Privilegesettings', 'default', 'App', 1625239805, 5),
(20, '2021-07-02-173442', 'App\\Database\\Migrations\\Authgroups', 'default', 'App', 1625247471, 6),
(22, '2021-07-02-173553', 'App\\Database\\Migrations\\Authgroupsusers', 'default', 'App', 1625247647, 7);

-- --------------------------------------------------------

--
-- Table structure for table `plantdatalogs`
--

CREATE TABLE `plantdatalogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `device` varchar(100) NOT NULL,
  `grow_installation` varchar(100) NOT NULL,
  `water` int(11) NOT NULL,
  `air` int(11) NOT NULL,
  `humidity` int(11) NOT NULL,
  `tds` int(11) NOT NULL,
  `ph` int(11) NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plantdatalogs`
--

INSERT INTO `plantdatalogs` (`id`, `device`, `grow_installation`, `water`, `air`, `humidity`, `tds`, `ph`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', '', 35, 30, 10, 10, 4, 0, 0, '2021-06-30 18:05:58', '2021-07-02 20:45:43', '2021-07-02 08:45:43'),
(2, '2', '1', 35, 30, 10, 10, 4, 0, 0, '2021-06-30 18:07:23', '2021-07-14 15:39:19', '2021-07-14 03:39:19'),
(3, '2', '1', 12, 12, 12, 12, 12, 0, 0, '2021-07-14 15:43:19', '2021-07-14 15:43:22', '2021-07-14 03:43:22');

-- --------------------------------------------------------

--
-- Table structure for table `planttypes`
--

CREATE TABLE `planttypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `est_harvest_time` int(11) NOT NULL,
  `est_weight` int(11) NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `planttypes`
--

INSERT INTO `planttypes` (`id`, `code`, `name`, `image`, `est_harvest_time`, `est_weight`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'PT26', 'Tes', '1.PNG', 10, 125, 0, 0, '2021-06-28 15:46:27', '2021-06-29 11:33:50', '2021-06-28 23:33:50'),
(2, 'PT68', 'caisim', '1.PNG', 10, 125, 0, 0, '2021-06-28 15:46:28', '2021-06-28 15:47:42', '2021-06-28 03:47:42'),
(3, 'PT99', 'Caisim', '185622315_138591208308419_2468171971595353701_n.jpg', 10, 100, 0, 0, '2021-06-29 11:39:43', '2021-06-30 12:09:48', '2021-06-30 00:09:48'),
(4, 'PT30', 'Kelor', '1.PNG', 12, 123, 0, 0, '2021-06-29 11:40:27', '2021-06-30 12:09:45', '2021-06-30 00:09:45'),
(5, 'PT28', 'Caisim', 'Caisim.jpg', 20, 120, 0, 0, '2021-06-30 11:17:20', '2021-06-30 12:09:50', '2021-06-30 00:09:50'),
(6, 'PT48', 'Kangkung', 'Caisim.jpg', 20, 120, 0, 0, '2021-06-30 11:18:46', '2021-06-30 12:09:46', '2021-06-30 00:09:46'),
(7, 'PT69', 'Caisim', 'caisim.jpg', 10, 100, 0, 0, '2021-06-30 12:11:58', '2021-06-30 12:12:04', '2021-06-30 00:12:04'),
(8, 'PT55', 'Green romaine', 'caisim.jpg', 49, 125, 0, 0, '2021-06-30 12:16:05', '2021-06-30 17:25:49', '2021-06-30 05:25:49'),
(9, 'PT02', 'Kejsnsn', 'caisim.jpg', 20, 120, 0, 0, '2021-06-30 17:27:37', '2021-07-02 20:15:25', '2021-07-02 08:15:25'),
(10, 'PT20', 'Green Romaine', 'caisim.jpg', 25, 125, 0, 0, '2021-07-02 20:15:40', '2021-07-02 20:19:28', '2021-07-02 08:19:28'),
(11, 'PT33', 'Caisim', 'caisim.jpg', 20, 120, 0, 0, '2021-07-02 20:16:48', '2021-07-02 20:17:25', '2021-07-02 08:17:25'),
(12, 'PT14', 'Caisim', 'caisim.jpg', 30, 150, 0, 0, '2021-07-02 20:18:42', '2021-07-02 20:18:57', '2021-07-02 08:18:57'),
(13, 'PT71', 'Caisim', 'caisim.jpg', 20, 125, 0, 0, '2021-07-02 20:21:40', '2021-07-02 20:23:02', '2021-07-02 08:23:02'),
(14, 'PT39', 'test', 'caisim.jpg', 12, 123, 0, 0, '2021-07-02 20:24:57', '2021-07-02 20:25:52', '2021-07-02 08:25:52'),
(15, 'PT80', 'test', 'caisim.jpg', 12, 123, 0, 0, '2021-07-02 20:26:29', '2021-07-02 20:29:21', '2021-07-02 08:29:21'),
(16, 'PT86', 'test', 'caisim.jpg', 12, 123, 0, 0, '2021-07-02 20:26:30', '2021-07-02 20:28:41', '2021-07-02 08:28:41'),
(17, 'PT34', 'taewa', 'caisim.jpg', 123, 123, 0, 0, '2021-07-02 20:32:05', '2021-07-02 20:32:54', '2021-07-02 08:32:54'),
(18, 'PT92', 'Caisim', 'caisim.jpg', 25, 125, 0, 0, '2021-07-02 20:35:26', '2021-07-06 20:00:54', '2021-07-06 08:00:54'),
(19, 'PT27', 'Kangkung', 'caisim.jpg', 25, 125, 0, 0, '2021-07-06 20:00:02', '2021-07-06 20:11:54', '2021-07-06 08:11:54'),
(20, 'PT07', 'Kangkung', 'caisim.jpg', 25, 125, 0, 0, '2021-07-06 20:00:15', '2021-07-06 20:11:05', '2021-07-06 08:11:05'),
(21, 'PT84', 'Caisim', 'caisim.jpg', 12, 123, 0, 0, '2021-07-06 20:12:37', '2021-07-06 20:13:40', '2021-07-06 08:13:40'),
(23, 'PT49', 'Caisim', 'caisim.jpg', 25, 125, 0, 0, '2021-07-06 20:18:51', '2021-07-06 20:21:21', '2021-07-06 08:21:21'),
(24, 'PT21', 'Caisim', 'caisim.jpg', 3, 125, 0, 0, '2021-07-07 19:37:49', '2021-07-11 12:27:06', NULL),
(25, 'PT95', 'Caisimmm', 'caisim.jpg', 12, 12, 0, 0, '2021-07-14 15:20:30', '2021-07-14 15:20:42', '2021-07-14 03:20:42'),
(26, 'PT38', 'Caisimm', 'caisim.jpg', 24, 12, 0, 0, '2021-07-15 08:23:18', '2021-07-15 08:23:28', '2021-07-14 20:23:28'),
(27, 'PT24', 'Test', 'caisim.jpg', 50, 50, 0, 0, '2021-07-15 08:38:41', '2021-07-15 08:38:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `privilegesettings`
--

CREATE TABLE `privilegesettings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(100) NOT NULL,
  `settings` text NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `seedling`
--

CREATE TABLE `seedling` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(200) NOT NULL,
  `sprouting` varchar(100) NOT NULL,
  `seedling` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `sisa` int(11) NOT NULL,
  `reject` int(11) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `id_tanaman` int(11) NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seedling`
--

INSERT INTO `seedling` (`id`, `code`, `sprouting`, `seedling`, `tanggal`, `sisa`, `reject`, `status`, `id_tanaman`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SE84-undefined', 'SP95-Caisim', 90, '2021-06-29', 0, 0, 'active', 5, 0, 0, '2021-06-30 11:31:38', '2021-06-30 11:34:15', '2021-06-29 23:34:15'),
(2, 'SE79-undefined', 'SP95-Caisim', 100, '2021-06-29', 0, 0, 'active', 5, 0, 0, '2021-06-30 11:44:43', '2021-06-30 11:46:06', '2021-06-29 23:46:06'),
(3, 'SE85-Caisim', 'SP95-Caisim', 100, '2021-06-29', 10, 0, 'active', 5, 0, 0, '2021-06-30 11:46:00', '2021-06-30 12:09:59', '2021-06-30 00:09:59'),
(4, 'SE09-Green romaine', 'SP43-Green romaine', 90, '2021-06-30', 0, 10, 'inactive', 8, 0, 0, '2021-06-30 12:21:00', '2021-07-13 23:50:16', NULL),
(5, 'SE100-Green romaine', 'SP34-Green romaine', 90, '2021-06-30', 10, 0, 'active', 8, 0, 0, '2021-06-30 16:15:50', '2021-07-13 23:32:25', NULL),
(6, 'SE25', '2', 50, '2021-07-14', 0, 0, 'active', 8, 0, 0, '2021-07-14 20:49:26', '2021-07-14 20:59:37', '2021-07-14 08:59:37'),
(7, 'SE48-Caisim', '4', 50, '2021-07-14', 0, 0, 'active', 24, 0, 0, '2021-07-14 21:00:15', '2021-07-14 21:04:58', '2021-07-14 09:04:58'),
(8, 'SE22-Caisim', '4', 50, '2021-07-14', 0, 0, 'active', 24, 0, 0, '2021-07-14 21:05:30', '2021-07-14 21:09:48', '2021-07-14 09:09:48'),
(9, 'SE53-Caisim', '6', 51, '2021-07-14', 0, 0, 'active', 24, 0, 0, '2021-07-14 21:09:53', '2021-07-14 21:10:25', '2021-07-14 09:10:25'),
(10, 'SE85-Caisim', '6', 51, '2021-07-14', 0, 0, 'active', 24, 0, 0, '2021-07-14 21:10:31', '2021-07-14 21:11:33', '2021-07-14 09:11:33'),
(11, 'SE02-Caisim', '6', 50, '2021-07-14', 0, 0, 'active', 24, 0, 0, '2021-07-14 21:13:05', '2021-07-14 21:15:15', '2021-07-14 09:15:15'),
(12, 'SE46-Caisim', '6', 40, '2021-07-14', 0, 0, 'active', 24, 0, 0, '2021-07-14 21:15:20', '2021-07-14 21:18:34', '2021-07-14 09:18:34'),
(13, 'SE78-Caisim', '6', 50, '2021-07-14', 0, 0, 'active', 24, 0, 0, '2021-07-14 21:18:40', '2021-07-14 21:18:49', '2021-07-14 09:18:49'),
(14, 'SE78-Caisim', '6', 40, '2021-07-14', 0, 0, 'active', 24, 0, 0, '2021-07-14 21:18:54', '2021-07-14 21:20:32', '2021-07-14 09:20:32'),
(15, 'SE63-Caisim', '6', 50, '2021-07-14', 0, 0, 'active', 24, 0, 0, '2021-07-14 21:20:36', '2021-07-14 21:23:13', '2021-07-14 09:23:13'),
(16, 'SE79-Caisim', '6', 50, '2021-07-14', 0, 0, 'active', 24, 0, 0, '2021-07-14 21:23:24', '2021-07-14 21:25:06', '2021-07-14 09:25:06'),
(17, 'SE71-Caisim', '6', 50, '2021-07-14', 0, 0, 'active', 24, 0, 0, '2021-07-14 21:25:13', '2021-07-14 21:26:07', '2021-07-14 09:26:07'),
(18, 'SE41-Caisim', '6', 50, '2021-07-14', 0, 0, 'active', 24, 0, 0, '2021-07-14 21:26:11', '2021-07-14 21:26:51', '2021-07-14 09:26:51'),
(19, 'SE95-Caisim', '6', 50, '2021-07-14', 0, 0, 'inactive', 24, 0, 0, '2021-07-14 21:27:13', '2021-07-15 08:29:00', NULL),
(20, 'SE32-Caisim', '8', 50, '2021-08-17', 100, 0, 'active', 24, 0, 0, '2021-08-15 08:37:16', '2021-08-15 08:37:36', '2021-08-14 20:37:36'),
(21, 'SE82-Caisim', '8', 25, '2021-08-17', 0, 0, 'inactive', 24, 0, 0, '2021-08-15 08:38:05', '2021-08-15 08:44:30', NULL),
(22, 'SE23-Caisim', '8', 75, '2021-08-16', 25, 0, 'active', 24, 0, 0, '2021-08-15 08:45:01', '2021-08-15 08:45:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE `sites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `company` varchar(200) NOT NULL,
  `type` enum('indoor','outdoor') NOT NULL DEFAULT 'indoor',
  `subtype` enum('warehouse','shophouse','open space') NOT NULL DEFAULT 'warehouse',
  `floor` int(11) NOT NULL,
  `building_area` enum('70 m2 - 100 m2','100 m2 - 500 m2','500 m2 - 1000 m2','>1000 m2') NOT NULL DEFAULT '70 m2 - 100 m2',
  `photo` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `jalan` text NOT NULL,
  `kota` varchar(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longtitude` varchar(100) NOT NULL,
  `building_status` enum('owned','rent') NOT NULL DEFAULT 'owned',
  `rent_period` int(11) NOT NULL,
  `rent_cost` int(11) NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`id`, `code`, `name`, `company`, `type`, `subtype`, `floor`, `building_area`, `photo`, `address`, `jalan`, `kota`, `provinsi`, `latitude`, `longtitude`, `building_status`, `rent_period`, `rent_cost`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '6SIndex', 'Tunas Site', '6', 'indoor', 'warehouse', 0, '70 m2 - 100 m2', '185622315_138591208308419_2468171971595353701_n.jpg', ' Serpong, BSD', 'Dalton', 'Serpong', 'Banten', '123412341234', '098709870987', 'rent', 1, 1000000, 0, 0, '2021-06-29 11:50:23', '2021-07-14 21:29:17', '2021-07-14 09:29:17'),
(2, 'wSIndex', 'Tunas Dash', '5', 'indoor', 'warehouse', 0, '100 m2 - 500 m2', '185622315_138591208308419_2468171971595353701_n.jpg', ' Serpong, BSD', 'Dalton', 'Serpong', 'Banten', '098098098', '123123123', 'rent', 1, 1500000, 0, 0, '2021-06-29 12:00:20', '2021-07-14 21:29:19', '2021-07-14 09:29:19'),
(3, 'TFSIndex', 'Tunas Fresh', '11', 'indoor', 'warehouse', 0, '100 m2 - 500 m2', 'Screenshot_1.jpg', ' Serpong', 'Dalton', 'Serpong', 'Banten', '08912312321', '01923910381', 'rent', 1, 12500000, 0, 0, '2021-07-14 21:30:52', '2021-07-14 21:30:52', NULL),
(4, 'wSIndex', 'Test Site', '5', 'indoor', 'warehouse', 0, '100 m2 - 500 m2', 'Screenshot_1.jpg', ' adaw', 'awdwa', 'dwda', 'dawdwa', '1232132131', '1232132131', 'owned', 0, 0, 0, 0, '2021-07-14 21:43:20', '2021-07-14 21:43:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sprouting`
--

CREATE TABLE `sprouting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(200) NOT NULL,
  `tipe_tanaman` varchar(100) NOT NULL,
  `benih` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `sisa` int(11) NOT NULL,
  `reject` int(11) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `id_tanaman` int(11) NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sprouting`
--

INSERT INTO `sprouting` (`id`, `code`, `tipe_tanaman`, `benih`, `tanggal`, `sisa`, `reject`, `status`, `id_tanaman`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SP95-Caisim', 'Caisim', 100, '2021-06-29', 0, 0, 'active', 5, 0, 0, '2021-06-30 11:30:48', '2021-06-30 12:09:55', '2021-06-30 00:09:55'),
(2, 'SP43-Green romaine', 'Caisim', 100, '2021-06-30', 0, 0, 'active', 8, 0, 0, '2021-06-30 12:19:14', '2021-07-14 20:59:01', '2021-07-14 08:59:01'),
(3, 'SP34-Green romaine', 'Green romaine', 100, '2021-06-30', 0, 0, 'active', 8, 0, 0, '2021-06-30 16:15:38', '2021-07-14 20:59:03', '2021-07-14 08:59:03'),
(4, 'SP73-Caisim', 'Caisim', 100, '2021-07-14', 0, 0, 'active', 24, 0, 0, '2021-07-14 21:00:07', '2021-07-14 21:06:46', '2021-07-14 09:06:46'),
(5, 'SP93-Caisim-Choose...-Caisim', 'Caisim', 50, '2021-07-14', 0, 0, 'active', 24, 0, 0, '2021-07-14 21:06:57', '2021-07-14 21:09:35', '2021-07-14 09:09:35'),
(6, 'SP94-Caisim', 'Caisim', 50, '2021-07-14', 0, 10, 'inactive', 24, 0, 0, '2021-07-14 21:09:41', '2021-07-14 21:27:13', NULL),
(7, 'SP09-Caisim', 'Caisim', 90, '2021-08-14', 90, 0, 'active', 24, 0, 0, '2021-08-15 08:18:25', '2021-08-15 08:18:25', NULL),
(8, 'SP31-Caisim', 'Caisim', 100, '2021-08-16', 25, 0, 'active', 24, 0, 0, '2021-08-15 08:21:56', '2021-08-15 08:45:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `systemlogs`
--

CREATE TABLE `systemlogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `timestamp` datetime DEFAULT current_timestamp(),
  `user` varchar(100) NOT NULL,
  `controller` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `systemlogs`
--

INSERT INTO `systemlogs` (`id`, `timestamp`, `user`, `controller`, `message`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2021-07-06 20:21:21', 'admin', 'planttypes', 'Delete Plant Type', 0, 0, '2021-07-06 20:21:21', '2021-07-06 20:21:21', NULL),
(2, '2021-07-07 19:37:50', 'admin', 'planttypes', 'Create Plant Type', 0, 0, '2021-07-07 19:37:50', '2021-07-07 19:37:50', NULL),
(3, '2021-07-09 17:12:49', 'admin', 'authgroupsusers', 'Update Role User', 0, 0, '2021-07-09 17:12:49', '2021-07-09 17:12:49', NULL),
(4, '2021-07-09 17:19:05', 'admin', 'authgroups', 'Delete Role', 0, 0, '2021-07-09 17:19:05', '2021-07-09 17:19:05', NULL),
(5, '2021-07-09 17:20:33', 'admin', 'authgroups', 'Update Role', 0, 0, '2021-07-09 17:20:33', '2021-07-09 17:20:33', NULL),
(6, '2021-07-11 11:00:21', 'admin', 'users', 'Create User', 0, 0, '2021-07-11 11:00:21', '2021-07-11 11:00:21', NULL),
(7, '2021-07-11 11:00:29', 'admin', 'users', 'Delete User', 0, 0, '2021-07-11 11:00:29', '2021-07-11 11:00:29', NULL),
(8, '2021-07-13 21:13:57', 'grower', 'grooming', 'Update Grooming', 0, 0, '2021-07-13 21:13:57', '2021-07-13 21:13:57', NULL),
(9, '2021-07-13 21:21:55', 'admin', 'users', 'Update User', 0, 0, '2021-07-13 21:21:55', '2021-07-13 21:21:55', NULL),
(10, '2021-07-13 22:19:16', 'admin', 'users', 'Create User', 0, 0, '2021-07-13 22:19:16', '2021-07-13 22:19:16', NULL),
(11, '2021-07-13 22:19:42', 'admin', 'users', 'Update User', 0, 0, '2021-07-13 22:19:42', '2021-07-13 22:19:42', NULL),
(12, '2021-07-13 22:22:45', 'admin', 'users', 'Update User', 0, 0, '2021-07-13 22:22:45', '2021-07-13 22:22:45', NULL),
(13, '2021-07-13 22:25:33', 'admin', 'users', 'Update Password', 0, 0, '2021-07-13 22:25:33', '2021-07-13 22:25:33', NULL),
(14, '2021-07-13 22:26:58', 'admin', 'users', 'Update Password', 0, 0, '2021-07-13 22:26:58', '2021-07-13 22:26:58', NULL),
(15, '2021-07-13 23:28:21', 'grower', 'sprouting', 'Update Sprouting', 0, 0, '2021-07-13 23:28:21', '2021-07-13 23:28:21', NULL),
(16, '2021-07-13 23:30:40', 'grower', 'sprouting', 'Update Sprouting', 0, 0, '2021-07-13 23:30:40', '2021-07-13 23:30:40', NULL),
(17, '2021-07-13 23:30:50', 'grower', 'sprouting', 'Update Sprouting', 0, 0, '2021-07-13 23:30:50', '2021-07-13 23:30:50', NULL),
(18, '2021-07-13 23:32:05', 'grower', 'seedling', 'Update Seedling', 0, 0, '2021-07-13 23:32:05', '2021-07-13 23:32:05', NULL),
(19, '2021-07-13 23:32:25', 'grower', 'seedling', 'Update Seedling', 0, 0, '2021-07-13 23:32:25', '2021-07-13 23:32:25', NULL),
(20, '2021-07-13 23:34:03', 'grower', 'grooming', 'Update Grooming', 0, 0, '2021-07-13 23:34:03', '2021-07-13 23:34:03', NULL),
(21, '2021-07-13 23:34:24', 'grower', 'grooming', 'Update Grooming', 0, 0, '2021-07-13 23:34:24', '2021-07-13 23:34:24', NULL),
(22, '2021-07-13 23:37:34', 'grower', 'transplanting', 'Update Transplanting', 0, 0, '2021-07-13 23:37:34', '2021-07-13 23:37:34', NULL),
(23, '2021-07-13 23:37:36', 'grower', 'transplanting', 'Update Transplanting', 0, 0, '2021-07-13 23:37:36', '2021-07-13 23:37:36', NULL),
(24, '2021-07-13 23:45:40', 'grower', 'harvesting', 'Delete Harvesting', 0, 0, '2021-07-13 23:45:40', '2021-07-13 23:45:40', NULL),
(25, '2021-07-13 23:45:49', 'grower', 'transplanting', 'Update Transplanting', 0, 0, '2021-07-13 23:45:49', '2021-07-13 23:45:49', NULL),
(26, '2021-07-13 23:45:49', 'grower', 'harvesting', 'Create Harvesting', 0, 0, '2021-07-13 23:45:49', '2021-07-13 23:45:49', NULL),
(27, '2021-07-13 23:47:08', 'grower', 'transplanting', 'Create Transplanting', 0, 0, '2021-07-13 23:47:08', '2021-07-13 23:47:08', NULL),
(28, '2021-07-13 23:47:08', 'grower', 'grooming', 'Update Grooming', 0, 0, '2021-07-13 23:47:08', '2021-07-13 23:47:08', NULL),
(29, '2021-07-13 23:48:38', 'grower', 'grooming', 'Delete Grooming', 0, 0, '2021-07-13 23:48:38', '2021-07-13 23:48:38', NULL),
(30, '2021-07-13 23:48:57', 'grower', 'seedling', 'Update Seedling', 0, 0, '2021-07-13 23:48:57', '2021-07-13 23:48:57', NULL),
(31, '2021-07-13 23:48:57', 'grower', 'grooming', 'Create Grooming', 0, 0, '2021-07-13 23:48:57', '2021-07-13 23:48:57', NULL),
(32, '2021-07-13 23:49:22', 'grower', 'grooming', 'Update Grooming', 0, 0, '2021-07-13 23:49:22', '2021-07-13 23:49:22', NULL),
(33, '2021-07-13 23:50:02', 'grower', 'seedling', 'Update Seedling', 0, 0, '2021-07-13 23:50:02', '2021-07-13 23:50:02', NULL),
(34, '2021-07-13 23:50:07', 'grower', 'grooming', 'Delete Grooming', 0, 0, '2021-07-13 23:50:07', '2021-07-13 23:50:07', NULL),
(35, '2021-07-13 23:50:16', 'grower', 'grooming', 'Create Grooming', 0, 0, '2021-07-13 23:50:16', '2021-07-13 23:50:16', NULL),
(36, '2021-07-13 23:50:16', 'grower', 'seedling', 'Update Seedling', 0, 0, '2021-07-13 23:50:16', '2021-07-13 23:50:16', NULL),
(37, '2021-07-13 23:51:56', 'grower', 'harvesting', 'Create Harvesting', 0, 0, '2021-07-13 23:51:56', '2021-07-13 23:51:56', NULL),
(38, '2021-07-13 23:51:56', 'grower', 'transplanting', 'Update Transplanting', 0, 0, '2021-07-13 23:51:56', '2021-07-13 23:51:56', NULL),
(39, '2021-07-13 23:52:07', 'grower', 'harvesting', 'Delete Harvesting', 0, 0, '2021-07-13 23:52:07', '2021-07-13 23:52:07', NULL),
(40, '2021-07-13 23:52:13', 'grower', 'transplanting', 'Update Transplanting', 0, 0, '2021-07-13 23:52:13', '2021-07-13 23:52:13', NULL),
(41, '2021-07-13 23:52:13', 'grower', 'harvesting', 'Create Harvesting', 0, 0, '2021-07-13 23:52:13', '2021-07-13 23:52:13', NULL),
(42, '2021-07-13 23:52:55', 'grower', 'harvesting', 'Delete Harvesting', 0, 0, '2021-07-13 23:52:55', '2021-07-13 23:52:55', NULL),
(43, '2021-07-13 23:53:01', 'grower', 'harvesting', 'Create Harvesting', 0, 0, '2021-07-13 23:53:01', '2021-07-13 23:53:01', NULL),
(44, '2021-07-13 23:53:01', 'grower', 'transplanting', 'Update Transplanting', 0, 0, '2021-07-13 23:53:01', '2021-07-13 23:53:01', NULL),
(45, '2021-07-13 23:55:19', 'grower', 'harvesting', 'Delete Harvesting', 0, 0, '2021-07-13 23:55:19', '2021-07-13 23:55:19', NULL),
(46, '2021-07-13 23:56:08', 'grower', 'harvesting', 'Create Harvesting', 0, 0, '2021-07-13 23:56:08', '2021-07-13 23:56:08', NULL),
(47, '2021-07-13 23:56:08', 'grower', 'transplanting', 'Update Transplanting', 0, 0, '2021-07-13 23:56:08', '2021-07-13 23:56:08', NULL),
(48, '2021-07-13 23:56:21', 'grower', 'transplanting', 'Update Transplanting', 0, 0, '2021-07-13 23:56:21', '2021-07-13 23:56:21', NULL),
(49, '2021-07-13 23:56:22', 'grower', 'transplanting', 'Update Transplanting', 0, 0, '2021-07-13 23:56:22', '2021-07-13 23:56:22', NULL),
(50, '2021-07-13 23:57:03', 'grower', 'transplanting', 'Update Transplanting', 0, 0, '2021-07-13 23:57:03', '2021-07-13 23:57:03', NULL),
(51, '2021-07-13 23:57:03', 'grower', 'transplanting', 'Update Transplanting', 0, 0, '2021-07-13 23:57:03', '2021-07-13 23:57:03', NULL),
(52, '2021-07-14 15:20:30', 'admin', 'planttypes', 'Create Plant Type', 0, 0, '2021-07-14 15:20:30', '2021-07-14 15:20:30', NULL),
(53, '2021-07-14 15:20:42', 'admin', 'planttypes', 'Delete Plant Type', 0, 0, '2021-07-14 15:20:42', '2021-07-14 15:20:42', NULL),
(54, '2021-07-14 15:39:19', 'admin', 'plantdatalogs', 'Delete Plant Data Log', 0, 0, '2021-07-14 15:39:19', '2021-07-14 15:39:19', NULL),
(55, '2021-07-14 15:43:19', 'admin', 'plantdatalogs', 'Create Plant Data Log', 0, 0, '2021-07-14 15:43:19', '2021-07-14 15:43:19', NULL),
(56, '2021-07-14 15:43:22', 'admin', 'plantdatalogs', 'Delete Plant Data Log', 0, 0, '2021-07-14 15:43:22', '2021-07-14 15:43:22', NULL),
(57, '2021-07-14 15:44:12', 'admin', 'customers', 'Create Customer', 0, 0, '2021-07-14 15:44:12', '2021-07-14 15:44:12', NULL),
(58, '2021-07-14 15:44:20', 'admin', 'customers', 'Delete Customer', 0, 0, '2021-07-14 15:44:20', '2021-07-14 15:44:20', NULL),
(59, '2021-07-14 15:45:09', 'admin', 'customers', 'Create Customer', 0, 0, '2021-07-14 15:45:09', '2021-07-14 15:45:09', NULL),
(60, '2021-07-14 20:49:26', 'grower', 'seedling', 'Create Seedling', 0, 0, '2021-07-14 20:49:26', '2021-07-14 20:49:26', NULL),
(61, '2021-07-14 20:50:52', 'grower', 'seedling', 'Update Seedling', 0, 0, '2021-07-14 20:50:52', '2021-07-14 20:50:52', NULL),
(62, '2021-07-14 20:50:56', 'grower', 'seedling', 'Update Seedling', 0, 0, '2021-07-14 20:50:56', '2021-07-14 20:50:56', NULL),
(63, '2021-07-14 20:51:02', 'grower', 'seedling', 'Update Seedling', 0, 0, '2021-07-14 20:51:02', '2021-07-14 20:51:02', NULL),
(64, '2021-07-14 20:51:37', 'grower', 'seedling', 'Update Seedling', 0, 0, '2021-07-14 20:51:37', '2021-07-14 20:51:37', NULL),
(65, '2021-07-14 20:51:38', 'grower', 'seedling', 'Update Seedling', 0, 0, '2021-07-14 20:51:38', '2021-07-14 20:51:38', NULL),
(66, '2021-07-14 20:51:38', 'grower', 'seedling', 'Update Seedling', 0, 0, '2021-07-14 20:51:38', '2021-07-14 20:51:38', NULL),
(67, '2021-07-14 20:51:38', 'grower', 'seedling', 'Update Seedling', 0, 0, '2021-07-14 20:51:38', '2021-07-14 20:51:38', NULL),
(68, '2021-07-14 20:51:39', 'grower', 'seedling', 'Update Seedling', 0, 0, '2021-07-14 20:51:39', '2021-07-14 20:51:39', NULL),
(69, '2021-07-14 20:51:39', 'grower', 'seedling', 'Update Seedling', 0, 0, '2021-07-14 20:51:39', '2021-07-14 20:51:39', NULL),
(70, '2021-07-14 20:51:39', 'grower', 'seedling', 'Update Seedling', 0, 0, '2021-07-14 20:51:39', '2021-07-14 20:51:39', NULL),
(71, '2021-07-14 20:51:39', 'grower', 'seedling', 'Update Seedling', 0, 0, '2021-07-14 20:51:39', '2021-07-14 20:51:39', NULL),
(72, '2021-07-14 20:51:39', 'grower', 'seedling', 'Update Seedling', 0, 0, '2021-07-14 20:51:39', '2021-07-14 20:51:39', NULL),
(73, '2021-07-14 20:51:42', 'grower', 'grooming', 'Update Grooming', 0, 0, '2021-07-14 20:51:42', '2021-07-14 20:51:42', NULL),
(74, '2021-07-14 20:52:12', 'grower', 'seedling', 'Update Seedling', 0, 0, '2021-07-14 20:52:12', '2021-07-14 20:52:12', NULL),
(75, '2021-07-14 20:52:13', 'grower', 'seedling', 'Update Seedling', 0, 0, '2021-07-14 20:52:13', '2021-07-14 20:52:13', NULL),
(76, '2021-07-14 20:58:28', 'grower', 'seedling', 'Update Seedling', 0, 0, '2021-07-14 20:58:28', '2021-07-14 20:58:28', NULL),
(77, '2021-07-14 20:58:29', 'grower', 'seedling', 'Update Seedling', 0, 0, '2021-07-14 20:58:29', '2021-07-14 20:58:29', NULL),
(78, '2021-07-14 20:58:43', 'grower', 'seedling', 'Update Seedling', 0, 0, '2021-07-14 20:58:43', '2021-07-14 20:58:43', NULL),
(79, '2021-07-14 20:59:01', 'grower', 'sprouting', 'Delete Sprouting', 0, 0, '2021-07-14 20:59:01', '2021-07-14 20:59:01', NULL),
(80, '2021-07-14 20:59:03', 'grower', 'sprouting', 'Delete Sprouting', 0, 0, '2021-07-14 20:59:03', '2021-07-14 20:59:03', NULL),
(81, '2021-07-14 20:59:37', 'grower', 'seedling', 'Delete Seedling', 0, 0, '2021-07-14 20:59:37', '2021-07-14 20:59:37', NULL),
(82, '2021-07-14 20:59:41', 'grower', 'transplanting', 'Delete Transplanting', 0, 0, '2021-07-14 20:59:41', '2021-07-14 20:59:41', NULL),
(83, '2021-07-14 20:59:43', 'grower', 'transplanting', 'Delete Transplanting', 0, 0, '2021-07-14 20:59:43', '2021-07-14 20:59:43', NULL),
(84, '2021-07-14 20:59:48', 'grower', 'grooming', 'Delete Grooming', 0, 0, '2021-07-14 20:59:48', '2021-07-14 20:59:48', NULL),
(85, '2021-07-14 20:59:50', 'grower', 'grooming', 'Delete Grooming', 0, 0, '2021-07-14 20:59:50', '2021-07-14 20:59:50', NULL),
(86, '2021-07-14 20:59:52', 'grower', 'grooming', 'Delete Grooming', 0, 0, '2021-07-14 20:59:52', '2021-07-14 20:59:52', NULL),
(87, '2021-07-14 20:59:58', 'grower', 'harvesting', 'Delete Harvesting', 0, 0, '2021-07-14 20:59:58', '2021-07-14 20:59:58', NULL),
(88, '2021-07-14 21:00:00', 'grower', 'harvesting', 'Delete Harvesting', 0, 0, '2021-07-14 21:00:00', '2021-07-14 21:00:00', NULL),
(89, '2021-07-14 21:00:07', 'grower', 'sprouting', 'Create Sprouting', 0, 0, '2021-07-14 21:00:07', '2021-07-14 21:00:07', NULL),
(90, '2021-07-14 21:00:15', 'grower', 'seedling', 'Create Seedling', 0, 0, '2021-07-14 21:00:15', '2021-07-14 21:00:15', NULL),
(91, '2021-07-14 21:04:58', 'grower', 'seedling', 'Delete Seedling', 0, 0, '2021-07-14 21:04:58', '2021-07-14 21:04:58', NULL),
(92, '2021-07-14 21:05:30', 'grower', 'seedling', 'Create Seedling', 0, 0, '2021-07-14 21:05:30', '2021-07-14 21:05:30', NULL),
(93, '2021-07-14 21:06:46', 'grower', 'sprouting', 'Delete Sprouting', 0, 0, '2021-07-14 21:06:46', '2021-07-14 21:06:46', NULL),
(94, '2021-07-14 21:06:57', 'grower', 'sprouting', 'Create Sprouting', 0, 0, '2021-07-14 21:06:57', '2021-07-14 21:06:57', NULL),
(95, '2021-07-14 21:09:35', 'grower', 'sprouting', 'Delete Sprouting', 0, 0, '2021-07-14 21:09:35', '2021-07-14 21:09:35', NULL),
(96, '2021-07-14 21:09:41', 'grower', 'sprouting', 'Create Sprouting', 0, 0, '2021-07-14 21:09:41', '2021-07-14 21:09:41', NULL),
(97, '2021-07-14 21:09:48', 'grower', 'seedling', 'Delete Seedling', 0, 0, '2021-07-14 21:09:48', '2021-07-14 21:09:48', NULL),
(98, '2021-07-14 21:09:54', 'grower', 'seedling', 'Create Seedling', 0, 0, '2021-07-14 21:09:54', '2021-07-14 21:09:54', NULL),
(99, '2021-07-14 21:10:25', 'grower', 'seedling', 'Delete Seedling', 0, 0, '2021-07-14 21:10:25', '2021-07-14 21:10:25', NULL),
(100, '2021-07-14 21:10:31', 'grower', 'seedling', 'Create Seedling', 0, 0, '2021-07-14 21:10:31', '2021-07-14 21:10:31', NULL),
(101, '2021-07-14 21:11:33', 'grower', 'seedling', 'Delete Seedling', 0, 0, '2021-07-14 21:11:33', '2021-07-14 21:11:33', NULL),
(102, '2021-07-14 21:13:05', 'grower', 'seedling', 'Create Seedling', 0, 0, '2021-07-14 21:13:05', '2021-07-14 21:13:05', NULL),
(103, '2021-07-14 21:13:07', 'grower', 'seedling', 'Update Seedling', 0, 0, '2021-07-14 21:13:07', '2021-07-14 21:13:07', NULL),
(104, '2021-07-14 21:13:08', 'grower', 'seedling', 'Update Seedling', 0, 0, '2021-07-14 21:13:08', '2021-07-14 21:13:08', NULL),
(105, '2021-07-14 21:14:16', 'grower', 'seedling', 'Update Seedling', 0, 0, '2021-07-14 21:14:16', '2021-07-14 21:14:16', NULL),
(106, '2021-07-14 21:14:26', 'grower', 'seedling', 'Update Seedling', 0, 0, '2021-07-14 21:14:26', '2021-07-14 21:14:26', NULL),
(107, '2021-07-14 21:15:15', 'grower', 'seedling', 'Delete Seedling', 0, 0, '2021-07-14 21:15:15', '2021-07-14 21:15:15', NULL),
(108, '2021-07-14 21:15:20', 'grower', 'seedling', 'Create Seedling', 0, 0, '2021-07-14 21:15:20', '2021-07-14 21:15:20', NULL),
(109, '2021-07-14 21:18:34', 'grower', 'seedling', 'Delete Seedling', 0, 0, '2021-07-14 21:18:34', '2021-07-14 21:18:34', NULL),
(110, '2021-07-14 21:18:40', 'grower', 'seedling', 'Create Seedling', 0, 0, '2021-07-14 21:18:40', '2021-07-14 21:18:40', NULL),
(111, '2021-07-14 21:18:49', 'grower', 'seedling', 'Delete Seedling', 0, 0, '2021-07-14 21:18:49', '2021-07-14 21:18:49', NULL),
(112, '2021-07-14 21:18:54', 'grower', 'seedling', 'Create Seedling', 0, 0, '2021-07-14 21:18:54', '2021-07-14 21:18:54', NULL),
(113, '2021-07-14 21:20:09', 'grower', 'sprouting', 'Update Sprouting', 0, 0, '2021-07-14 21:20:09', '2021-07-14 21:20:09', NULL),
(114, '2021-07-14 21:20:16', 'grower', 'sprouting', 'Update Sprouting', 0, 0, '2021-07-14 21:20:16', '2021-07-14 21:20:16', NULL),
(115, '2021-07-14 21:20:17', 'grower', 'sprouting', 'Update Sprouting', 0, 0, '2021-07-14 21:20:17', '2021-07-14 21:20:17', NULL),
(116, '2021-07-14 21:20:18', 'grower', 'sprouting', 'Update Sprouting', 0, 0, '2021-07-14 21:20:18', '2021-07-14 21:20:18', NULL),
(117, '2021-07-14 21:20:24', 'grower', 'sprouting', 'Update Sprouting', 0, 0, '2021-07-14 21:20:24', '2021-07-14 21:20:24', NULL),
(118, '2021-07-14 21:20:32', 'grower', 'seedling', 'Delete Seedling', 0, 0, '2021-07-14 21:20:32', '2021-07-14 21:20:32', NULL),
(119, '2021-07-14 21:20:36', 'grower', 'seedling', 'Create Seedling', 0, 0, '2021-07-14 21:20:36', '2021-07-14 21:20:36', NULL),
(120, '2021-07-14 21:21:19', 'grower', 'seedling', 'Update Seedling', 0, 0, '2021-07-14 21:21:19', '2021-07-14 21:21:19', NULL),
(121, '2021-07-14 21:22:00', 'grower', 'seedling', 'Update Seedling', 0, 0, '2021-07-14 21:22:00', '2021-07-14 21:22:00', NULL),
(122, '2021-07-14 21:22:07', 'grower', 'grooming', 'Create Grooming', 0, 0, '2021-07-14 21:22:07', '2021-07-14 21:22:07', NULL),
(123, '2021-07-14 21:22:07', 'grower', 'seedling', 'Update Seedling', 0, 0, '2021-07-14 21:22:07', '2021-07-14 21:22:07', NULL),
(124, '2021-07-14 21:23:09', 'grower', 'seedling', 'Update Seedling', 0, 0, '2021-07-14 21:23:09', '2021-07-14 21:23:09', NULL),
(125, '2021-07-14 21:23:13', 'grower', 'seedling', 'Delete Seedling', 0, 0, '2021-07-14 21:23:13', '2021-07-14 21:23:13', NULL),
(126, '2021-07-14 21:23:16', 'grower', 'grooming', 'Update Grooming', 0, 0, '2021-07-14 21:23:16', '2021-07-14 21:23:16', NULL),
(127, '2021-07-14 21:23:24', 'grower', 'seedling', 'Create Seedling', 0, 0, '2021-07-14 21:23:24', '2021-07-14 21:23:24', NULL),
(128, '2021-07-14 21:23:27', 'grower', 'sprouting', 'Update Sprouting', 0, 0, '2021-07-14 21:23:27', '2021-07-14 21:23:27', NULL),
(129, '2021-07-14 21:23:28', 'grower', 'sprouting', 'Update Sprouting', 0, 0, '2021-07-14 21:23:28', '2021-07-14 21:23:28', NULL),
(130, '2021-07-14 21:25:06', 'grower', 'seedling', 'Delete Seedling', 0, 0, '2021-07-14 21:25:06', '2021-07-14 21:25:06', NULL),
(131, '2021-07-14 21:25:13', 'grower', 'seedling', 'Create Seedling', 0, 0, '2021-07-14 21:25:13', '2021-07-14 21:25:13', NULL),
(132, '2021-07-14 21:26:07', 'grower', 'seedling', 'Delete Seedling', 0, 0, '2021-07-14 21:26:07', '2021-07-14 21:26:07', NULL),
(133, '2021-07-14 21:26:11', 'grower', 'seedling', 'Create Seedling', 0, 0, '2021-07-14 21:26:11', '2021-07-14 21:26:11', NULL),
(134, '2021-07-14 21:26:11', 'grower', 'sprouting', 'Update Sprouting', 0, 0, '2021-07-14 21:26:11', '2021-07-14 21:26:11', NULL),
(135, '2021-07-14 21:26:51', 'grower', 'seedling', 'Delete Seedling', 0, 0, '2021-07-14 21:26:51', '2021-07-14 21:26:51', NULL),
(136, '2021-07-14 21:27:03', 'grower', 'sprouting', 'Update Sprouting', 0, 0, '2021-07-14 21:27:03', '2021-07-14 21:27:03', NULL),
(137, '2021-07-14 21:27:13', 'grower', 'sprouting', 'Update Sprouting', 0, 0, '2021-07-14 21:27:13', '2021-07-14 21:27:13', NULL),
(138, '2021-07-14 21:27:13', 'grower', 'seedling', 'Create Seedling', 0, 0, '2021-07-14 21:27:13', '2021-07-14 21:27:13', NULL),
(139, '2021-07-14 21:27:50', 'admin', 'users', 'Update User', 0, 0, '2021-07-14 21:27:50', '2021-07-14 21:27:50', NULL),
(140, '2021-07-14 21:28:50', 'admin', 'companies', 'Create Company', 0, 0, '2021-07-14 21:28:50', '2021-07-14 21:28:50', NULL),
(141, '2021-07-14 21:29:01', 'admin', 'companies', 'Update Company', 0, 0, '2021-07-14 21:29:01', '2021-07-14 21:29:01', NULL),
(142, '2021-07-14 21:29:05', 'admin', 'companies', 'Delete Company', 0, 0, '2021-07-14 21:29:05', '2021-07-14 21:29:05', NULL),
(143, '2021-07-14 21:29:17', 'admin', 'sites', 'Delete Site', 0, 0, '2021-07-14 21:29:17', '2021-07-14 21:29:17', NULL),
(144, '2021-07-14 21:29:19', 'admin', 'sites', 'Delete Site', 0, 0, '2021-07-14 21:29:19', '2021-07-14 21:29:19', NULL),
(145, '2021-07-14 21:29:56', 'admin', 'companies', 'Create Company', 0, 0, '2021-07-14 21:29:56', '2021-07-14 21:29:56', NULL),
(146, '2021-07-14 21:30:52', 'admin', 'sites', 'Create Site', 0, 0, '2021-07-14 21:30:52', '2021-07-14 21:30:52', NULL),
(147, '2021-07-14 21:31:25', 'admin', 'contracts', 'Create Contract', 0, 0, '2021-07-14 21:31:25', '2021-07-14 21:31:25', NULL),
(148, '2021-07-14 21:33:11', 'admin', 'contracts', 'Create Contract', 0, 0, '2021-07-14 21:33:11', '2021-07-14 21:33:11', NULL),
(149, '2021-07-14 21:34:34', 'admin', 'contracts', 'Delete Contract', 0, 0, '2021-07-14 21:34:34', '2021-07-14 21:34:34', NULL),
(150, '2021-07-14 21:34:36', 'admin', 'contracts', 'Delete Contract', 0, 0, '2021-07-14 21:34:36', '2021-07-14 21:34:36', NULL),
(151, '2021-07-14 21:35:22', 'admin', 'contracts', 'Create Contract', 0, 0, '2021-07-14 21:35:22', '2021-07-14 21:35:22', NULL),
(152, '2021-07-14 21:37:43', 'admin', 'contracts', 'Delete Contract', 0, 0, '2021-07-14 21:37:43', '2021-07-14 21:37:43', NULL),
(153, '2021-07-14 21:38:03', 'admin', 'contracts', 'Create Contract', 0, 0, '2021-07-14 21:38:03', '2021-07-14 21:38:03', NULL),
(154, '2021-07-14 21:40:57', 'admin', 'contracts', 'Delete Contract', 0, 0, '2021-07-14 21:40:57', '2021-07-14 21:40:57', NULL),
(155, '2021-07-14 21:41:12', 'admin', 'contracts', 'Create Contract', 0, 0, '2021-07-14 21:41:12', '2021-07-14 21:41:12', NULL),
(156, '2021-07-14 21:43:20', 'admin', 'sites', 'Create Site', 0, 0, '2021-07-14 21:43:20', '2021-07-14 21:43:20', NULL),
(157, '2021-07-14 21:46:04', 'admin', 'contracts', 'Create Contract', 0, 0, '2021-07-14 21:46:04', '2021-07-14 21:46:04', NULL),
(158, '2021-07-14 21:48:08', 'admin', 'contracts', 'Delete Contract', 0, 0, '2021-07-14 21:48:08', '2021-07-14 21:48:08', NULL),
(159, '2021-07-14 21:48:10', 'admin', 'contracts', 'Delete Contract', 0, 0, '2021-07-14 21:48:10', '2021-07-14 21:48:10', NULL),
(160, '2021-07-14 21:48:25', 'admin', 'contracts', 'Create Contract', 0, 0, '2021-07-14 21:48:25', '2021-07-14 21:48:25', NULL),
(161, '2021-07-14 21:48:58', 'admin', 'contracts', 'Create Contract', 0, 0, '2021-07-14 21:48:58', '2021-07-14 21:48:58', NULL),
(162, '2021-07-14 21:50:14', 'admin', 'contracts', 'Delete Contract', 0, 0, '2021-07-14 21:50:14', '2021-07-14 21:50:14', NULL),
(163, '2021-07-14 21:50:16', 'admin', 'contracts', 'Delete Contract', 0, 0, '2021-07-14 21:50:16', '2021-07-14 21:50:16', NULL),
(164, '2021-07-14 21:50:32', 'admin', 'contracts', 'Create Contract', 0, 0, '2021-07-14 21:50:32', '2021-07-14 21:50:32', NULL),
(165, '2021-07-14 21:50:46', 'admin', 'contracts', 'Update Contract', 0, 0, '2021-07-14 21:50:46', '2021-07-14 21:50:46', NULL),
(166, '2021-07-14 21:51:27', 'admin', 'growinstallations', 'Create Grow Installation', 0, 0, '2021-07-14 21:51:27', '2021-07-14 21:51:27', NULL),
(167, '2021-07-14 21:58:20', 'admin', 'devices', 'Create Device', 0, 0, '2021-07-14 21:58:20', '2021-07-14 21:58:20', NULL),
(168, '2021-07-14 21:58:26', 'admin', 'devices', 'Update Device', 0, 0, '2021-07-14 21:58:26', '2021-07-14 21:58:26', NULL),
(169, '2021-07-14 21:58:38', 'admin', 'devices', 'Update Device', 0, 0, '2021-07-14 21:58:38', '2021-07-14 21:58:38', NULL),
(170, '2021-07-14 21:59:53', 'admin', 'devices', 'Delete Device', 0, 0, '2021-07-14 21:59:53', '2021-07-14 21:59:53', NULL),
(171, '2021-07-14 21:59:58', 'admin', 'devices', 'Create Device', 0, 0, '2021-07-14 21:59:58', '2021-07-14 21:59:58', NULL),
(172, '2021-07-14 22:00:23', 'admin', 'devices', 'Delete Device', 0, 0, '2021-07-14 22:00:23', '2021-07-14 22:00:23', NULL),
(173, '2021-07-14 22:00:28', 'admin', 'devices', 'Create Device', 0, 0, '2021-07-14 22:00:28', '2021-07-14 22:00:28', NULL),
(174, '2021-07-14 22:03:18', 'admin', 'devices', 'Delete Device', 0, 0, '2021-07-14 22:03:18', '2021-07-14 22:03:18', NULL),
(175, '2021-07-14 22:03:23', 'admin', 'devices', 'Create Device', 0, 0, '2021-07-14 22:03:23', '2021-07-14 22:03:23', NULL),
(176, '2021-07-14 22:03:27', 'admin', 'devices', 'Delete Device', 0, 0, '2021-07-14 22:03:27', '2021-07-14 22:03:27', NULL),
(177, '2021-07-14 22:03:50', 'admin', 'devices', 'Create Device', 0, 0, '2021-07-14 22:03:50', '2021-07-14 22:03:50', NULL),
(178, '2021-07-14 22:04:59', 'admin', 'devices', 'Delete Device', 0, 0, '2021-07-14 22:04:59', '2021-07-14 22:04:59', NULL),
(179, '2021-07-14 22:05:01', 'admin', 'devices', 'Delete Device', 0, 0, '2021-07-14 22:05:01', '2021-07-14 22:05:01', NULL),
(180, '2021-07-14 22:05:06', 'admin', 'devices', 'Create Device', 0, 0, '2021-07-14 22:05:06', '2021-07-14 22:05:06', NULL),
(181, '2021-07-15 08:23:18', 'admin', 'planttypes', 'Create Plant Type', 0, 0, '2021-07-15 08:23:18', '2021-07-15 08:23:18', NULL),
(182, '2021-07-15 08:23:28', 'admin', 'planttypes', 'Delete Plant Type', 0, 0, '2021-07-15 08:23:28', '2021-07-15 08:23:28', NULL),
(183, '2021-07-15 08:29:00', 'grower', 'seedling', 'Update Seedling', 0, 0, '2021-07-15 08:29:00', '2021-07-15 08:29:00', NULL),
(184, '2021-07-15 08:29:18', 'grower', 'grooming', 'Update Grooming', 0, 0, '2021-07-15 08:29:18', '2021-07-15 08:29:18', NULL),
(185, '2021-07-15 08:30:26', 'grower', 'grooming', 'Update Grooming', 0, 0, '2021-07-15 08:30:26', '2021-07-15 08:30:26', NULL),
(186, '2021-07-15 08:30:26', 'grower', 'transplanting', 'Create Transplanting', 0, 0, '2021-07-15 08:30:26', '2021-07-15 08:30:26', NULL),
(187, '2021-07-15 08:30:34', 'grower', 'harvesting', 'Create Harvesting', 0, 0, '2021-07-15 08:30:34', '2021-07-15 08:30:34', NULL),
(188, '2021-07-15 08:30:34', 'grower', 'transplanting', 'Update Transplanting', 0, 0, '2021-07-15 08:30:34', '2021-07-15 08:30:34', NULL),
(189, '2021-07-15 08:38:41', 'admin', 'planttypes', 'Create Plant Type', 0, 0, '2021-07-15 08:38:41', '2021-07-15 08:38:41', NULL),
(190, '2021-08-15 08:18:25', 'grower', 'sprouting', 'Create Sprouting', 0, 0, '2021-08-15 08:18:25', '2021-08-15 08:18:25', NULL),
(191, '2021-08-15 08:21:56', 'grower', 'sprouting', 'Create Sprouting', 0, 0, '2021-08-15 08:21:56', '2021-08-15 08:21:56', NULL),
(192, '2021-08-15 08:26:41', 'grower', 'sprouting', 'Update Sprouting', 0, 0, '2021-08-15 08:26:41', '2021-08-15 08:26:41', NULL),
(193, '2021-08-15 08:37:16', 'grower', 'seedling', 'Create Seedling', 0, 0, '2021-08-15 08:37:16', '2021-08-15 08:37:16', NULL),
(194, '2021-08-15 08:37:16', 'grower', 'sprouting', 'Update Sprouting', 0, 0, '2021-08-15 08:37:16', '2021-08-15 08:37:16', NULL),
(195, '2021-08-15 08:37:36', 'grower', 'seedling', 'Delete Seedling', 0, 0, '2021-08-15 08:37:36', '2021-08-15 08:37:36', NULL),
(196, '2021-08-15 08:38:05', 'grower', 'seedling', 'Create Seedling', 0, 0, '2021-08-15 08:38:05', '2021-08-15 08:38:05', NULL),
(197, '2021-08-15 08:38:05', 'grower', 'sprouting', 'Update Sprouting', 0, 0, '2021-08-15 08:38:05', '2021-08-15 08:38:05', NULL),
(198, '2021-08-15 08:38:16', 'grower', 'seedling', 'Update Seedling', 0, 0, '2021-08-15 08:38:16', '2021-08-15 08:38:16', NULL),
(199, '2021-08-15 08:38:58', 'grower', 'seedling', 'Update Seedling', 0, 0, '2021-08-15 08:38:58', '2021-08-15 08:38:58', NULL),
(200, '2021-08-15 08:44:30', 'grower', 'grooming', 'Create Grooming', 0, 0, '2021-08-15 08:44:30', '2021-08-15 08:44:30', NULL),
(201, '2021-08-15 08:44:30', 'grower', 'seedling', 'Update Seedling', 0, 0, '2021-08-15 08:44:30', '2021-08-15 08:44:30', NULL),
(202, '2021-08-15 08:45:01', 'grower', 'seedling', 'Create Seedling', 0, 0, '2021-08-15 08:45:01', '2021-08-15 08:45:01', NULL),
(203, '2021-08-15 08:45:01', 'grower', 'sprouting', 'Update Sprouting', 0, 0, '2021-08-15 08:45:01', '2021-08-15 08:45:01', NULL),
(204, '2021-08-15 08:45:15', 'grower', 'grooming', 'Create Grooming', 0, 0, '2021-08-15 08:45:15', '2021-08-15 08:45:15', NULL),
(205, '2021-08-15 08:45:15', 'grower', 'seedling', 'Update Seedling', 0, 0, '2021-08-15 08:45:15', '2021-08-15 08:45:15', NULL),
(206, '2021-08-15 08:50:13', 'grower', 'transplanting', 'Create Transplanting', 0, 0, '2021-08-15 08:50:13', '2021-08-15 08:50:13', NULL),
(207, '2021-08-15 08:50:14', 'grower', 'grooming', 'Update Grooming', 0, 0, '2021-08-15 08:50:14', '2021-08-15 08:50:14', NULL),
(208, '2021-08-15 08:51:23', 'grower', 'transplanting', 'Update Transplanting', 0, 0, '2021-08-15 08:51:23', '2021-08-15 08:51:23', NULL),
(209, '2021-08-15 08:51:23', 'grower', 'grooming', 'Update Grooming', 0, 0, '2021-08-15 08:51:23', '2021-08-15 08:51:23', NULL),
(210, '2021-08-15 08:56:41', 'grower', 'harvesting', 'Create Harvesting', 0, 0, '2021-08-15 08:56:41', '2021-08-15 08:56:41', NULL),
(211, '2021-08-15 08:56:41', 'grower', 'transplanting', 'Update Transplanting', 0, 0, '2021-08-15 08:56:41', '2021-08-15 08:56:41', NULL),
(212, '2021-08-15 08:59:40', 'grower', 'transplanting', 'Update Transplanting', 0, 0, '2021-08-15 08:59:40', '2021-08-15 08:59:40', NULL),
(213, '2021-08-15 08:59:41', 'grower', 'transplanting', 'Update Transplanting', 0, 0, '2021-08-15 08:59:41', '2021-08-15 08:59:41', NULL),
(214, '2021-08-15 08:59:41', 'grower', 'transplanting', 'Update Transplanting', 0, 0, '2021-08-15 08:59:41', '2021-08-15 08:59:41', NULL),
(215, '2021-08-15 08:59:41', 'grower', 'transplanting', 'Update Transplanting', 0, 0, '2021-08-15 08:59:41', '2021-08-15 08:59:41', NULL),
(216, '2021-08-15 08:59:41', 'grower', 'transplanting', 'Update Transplanting', 0, 0, '2021-08-15 08:59:41', '2021-08-15 08:59:41', NULL),
(217, '2021-08-15 08:59:47', 'grower', 'transplanting', 'Update Transplanting', 0, 0, '2021-08-15 08:59:47', '2021-08-15 08:59:47', NULL),
(218, '2021-08-15 09:00:40', 'grower', 'transplanting', 'Update Transplanting', 0, 0, '2021-08-15 09:00:40', '2021-08-15 09:00:40', NULL),
(219, '2021-08-15 09:00:40', 'grower', 'transplanting', 'Update Transplanting', 0, 0, '2021-08-15 09:00:40', '2021-08-15 09:00:40', NULL),
(220, '2021-08-15 09:00:47', 'grower', 'transplanting', 'Update Transplanting', 0, 0, '2021-08-15 09:00:47', '2021-08-15 09:00:47', NULL),
(221, '2021-08-15 09:00:47', 'grower', 'harvesting', 'Update Harvesting', 0, 0, '2021-08-15 09:00:47', '2021-08-15 09:00:47', NULL),
(222, '2021-08-15 09:02:42', 'grower', 'harvesting', 'Update Harvesting', 0, 0, '2021-08-15 09:02:42', '2021-08-15 09:02:42', NULL),
(223, '2021-08-15 09:03:03', 'grower', 'harvesting', 'Update Harvesting', 0, 0, '2021-08-15 09:03:03', '2021-08-15 09:03:03', NULL),
(224, '2021-08-15 09:03:04', 'grower', 'harvesting', 'Update Harvesting', 0, 0, '2021-08-15 09:03:04', '2021-08-15 09:03:04', NULL),
(225, '2021-08-15 09:03:05', 'grower', 'harvesting', 'Update Harvesting', 0, 0, '2021-08-15 09:03:05', '2021-08-15 09:03:05', NULL),
(226, '2021-08-15 09:03:37', 'grower', 'harvesting', 'Update Harvesting', 0, 0, '2021-08-15 09:03:37', '2021-08-15 09:03:37', NULL),
(227, '2021-08-15 09:03:39', 'grower', 'harvesting', 'Update Harvesting', 0, 0, '2021-08-15 09:03:39', '2021-08-15 09:03:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transplanting`
--

CREATE TABLE `transplanting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(200) NOT NULL,
  `grooming` varchar(100) NOT NULL,
  `tower_level` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `terproses` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `id_tanaman` int(11) NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transplanting`
--

INSERT INTO `transplanting` (`id`, `code`, `grooming`, `tower_level`, `tanggal`, `terproses`, `sisa`, `status`, `id_tanaman`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'TR39-undefined', 'GR79-Caisim', 'tower 1 - level 1', '2021-06-30', 75, 0, 'active', 5, 0, 0, '2021-06-30 12:01:48', '2021-06-30 12:04:43', '2021-06-30 00:04:43'),
(2, 'TR64-undefined', 'GR79-Caisim', 'tower 1 - level 1', '2021-06-30', 75, 0, 'active', 5, 0, 0, '2021-06-30 12:04:52', '2021-06-30 12:06:25', '2021-06-30 00:06:25'),
(3, 'TR35-Caisim', 'GR79-Caisim', 'tower 1 - level 1', '2021-06-30', 80, 10, 'active', 5, 0, 0, '2021-06-30 12:06:22', '2021-06-30 12:10:12', '2021-06-30 00:10:12'),
(4, 'TR88-Green romaine', 'GR52-Green romaine', 'tower 1 - level 1', '2021-06-30', 70, 0, 'active', 8, 0, 0, '2021-06-30 12:24:52', '2021-07-14 20:59:41', '2021-07-14 08:59:41'),
(5, 'TR63', 'GR52-Green romaine', 'tower 1 - level 1', '2021-07-13', 80, 0, 'active', 8, 0, 0, '2021-07-13 23:47:08', '2021-07-14 20:59:43', '2021-07-14 08:59:43'),
(6, 'TR21-Caisim', 'GR42-Caisim', 'tower 1 - level 1', '2021-07-14', 50, 0, 'inactive', 24, 0, 0, '2021-07-15 08:30:26', '2021-08-15 09:00:40', NULL),
(7, 'TR73-Caisim-Caisim', 'GR66-Caisim', 'tower 1 - level 1', '2021-08-17', 50, 0, 'inactive', 24, 0, 0, '2021-08-15 08:50:13', '2021-08-15 08:56:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) NOT NULL DEFAULT 'default.svg',
  `customer` int(11) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `fullname`, `user_image`, `customer`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin@tunas.com', 'admin', 'Admin Tunas Farm', 'default.svg', 1, '$2y$10$rmyI8eVqHf6EYzhIYHuDjOwkMb9sdnmmRksDt9WAhkfIjxARgjrT6', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, '2021-07-03 00:31:17', '2021-07-13 22:26:58', NULL),
(3, 'grower@tunas.com', 'grower', 'Grower Tunas', 'default.svg', 0, '$2y$10$IKXUlz9aJ57eB60r4tf8reo1GCciEnuPlIidxmG1jX3DYvub/WVyG', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, '2021-07-03 00:44:11', '2021-07-03 00:44:11', NULL),
(4, 'owner@tunas.com', 'owner', 'Owner Tunas', 'default.svg', 0, '$2y$10$uQmKswcZIjmsQkJbnE/bCOiVU9kPXy4mu0r5jNK5wq7nf.g3g0jdK', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, '2021-07-04 11:54:11', '2021-07-04 11:54:11', NULL),
(5, 'test@gmail.com', 'test', 'Coba Test', 'default.svg', 1, '$2y$10$l3ea3GvX7FNV4vCLhdGebOu1PGng7xCieI13cJjK73lpQ7Zcticgm', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, '2021-07-11 11:00:21', '2021-07-11 11:00:29', '2021-07-10 23:00:29'),
(6, 'dhitluk@gmail.com', 'adhitia', 'adhitia lukmana', 'default.svg', 7, '$2y$10$v3mgPDRHvkSrexIIkMnTQOoRA5nyhhh3jdsKoL2fYTSX/mKk6A68.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, '2021-07-13 22:19:16', '2021-07-14 21:27:50', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actuatordevices`
--
ALTER TABLE `actuatordevices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `actuatorgrowinstallations`
--
ALTER TABLE `actuatorgrowinstallations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `auth_groups_users_group_id_foreign` (`group_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grooming`
--
ALTER TABLE `grooming`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grow_installations`
--
ALTER TABLE `grow_installations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `harvesting`
--
ALTER TABLE `harvesting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plantdatalogs`
--
ALTER TABLE `plantdatalogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `planttypes`
--
ALTER TABLE `planttypes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `privilegesettings`
--
ALTER TABLE `privilegesettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seedling`
--
ALTER TABLE `seedling`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sprouting`
--
ALTER TABLE `sprouting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `systemlogs`
--
ALTER TABLE `systemlogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transplanting`
--
ALTER TABLE `transplanting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actuatordevices`
--
ALTER TABLE `actuatordevices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `actuatorgrowinstallations`
--
ALTER TABLE `actuatorgrowinstallations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `grooming`
--
ALTER TABLE `grooming`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `grow_installations`
--
ALTER TABLE `grow_installations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `harvesting`
--
ALTER TABLE `harvesting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `plantdatalogs`
--
ALTER TABLE `plantdatalogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `planttypes`
--
ALTER TABLE `planttypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `privilegesettings`
--
ALTER TABLE `privilegesettings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seedling`
--
ALTER TABLE `seedling`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `sites`
--
ALTER TABLE `sites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sprouting`
--
ALTER TABLE `sprouting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `systemlogs`
--
ALTER TABLE `systemlogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT for table `transplanting`
--
ALTER TABLE `transplanting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
