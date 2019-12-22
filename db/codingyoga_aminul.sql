-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 30, 2019 at 09:34 AM
-- Server version: 5.7.28-0ubuntu0.18.04.4
-- PHP Version: 7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codingyoga_aminul`
--

-- --------------------------------------------------------

--
-- Table structure for table `additional_services`
--

CREATE TABLE `additional_services` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(33) NOT NULL,
  `service_value` varchar(22) NOT NULL,
  `service_status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `additional_services`
--

INSERT INTO `additional_services` (`service_id`, `service_name`, `service_value`, `service_status`) VALUES
(1, 'Crop Image', '2', '1'),
(2, 'Correction Masks', '3', '1'),
(3, 'Shadow', '5', '1');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `category_image` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`, `category_image`, `created_on`, `updated_on`) VALUES
(11, 'Clipping Path Fashion Accessories', './assets/uploads/categories/8049410415d8223d8df33f.png', '2019-09-18 12:32:24', '0000-00-00 00:00:00'),
(12, 'Clipping Path Clothing', './assets/uploads/categories/738620785d8223ef313c6.png', '2019-09-18 12:32:47', '0000-00-00 00:00:00'),
(14, 'Clipping Path Package Food', '', '2019-09-18 12:40:22', '2019-09-28 13:43:26');

-- --------------------------------------------------------

--
-- Table structure for table `custom_order_upload_by_admin`
--

CREATE TABLE `custom_order_upload_by_admin` (
  `upload_id` int(11) NOT NULL,
  `fixed_id` int(11) NOT NULL,
  `upload_file_ids` varchar(22) NOT NULL,
  `file` varchar(55) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `custom_order_upload_by_admin`
--

INSERT INTO `custom_order_upload_by_admin` (`upload_id`, `fixed_id`, `upload_file_ids`, `file`, `created_at`) VALUES
(13, 108, 'bagag', 'bagag.png', '2019-11-28 07:39:45'),
(14, 108, 'checkbox', 'checkbox.png', '2019-11-28 07:39:47'),
(15, 109, 'bagag', 'bagag.png', '2019-11-28 11:17:24'),
(16, 109, 'checkbox', 'checkbox.png', '2019-11-28 11:17:26');

-- --------------------------------------------------------

--
-- Table structure for table `custom_payments`
--

CREATE TABLE `custom_payments` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `txn_id` varchar(22) NOT NULL,
  `payment_gross` varchar(11) NOT NULL,
  `currency_code` varchar(11) NOT NULL,
  `payer_email` varchar(33) NOT NULL,
  `payment_status` varchar(22) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `custom_quote`
--

CREATE TABLE `custom_quote` (
  `custom_quote_id` int(11) NOT NULL,
  `fixed_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `upload_file_ids` varchar(33) NOT NULL,
  `file` varchar(55) NOT NULL,
  `custom_quote_value` varchar(555) NOT NULL,
  `price` varchar(22) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `custom_quote`
--

INSERT INTO `custom_quote` (`custom_quote_id`, `fixed_id`, `user_id`, `upload_file_ids`, `file`, `custom_quote_value`, `price`, `created_at`, `updated_at`) VALUES
(202, 108, 15, 'bagag', 'bagag.png', 'dasdas', '2', '2019-11-28 07:37:13', '2019-11-28 07:37:13'),
(204, 109, 15, 'bagag', 'bagag.png', 'sdfghjkl', '3', '2019-11-28 11:06:33', '2019-11-28 11:06:33'),
(205, 109, 15, 'checkbox', 'checkbox.png', 'sdfghjkl', '3', '2019-11-28 11:08:24', '2019-11-28 11:08:24'),
(206, 110, 15, 'bagag', 'bagag.png', '', '12', '2019-11-28 12:13:35', '2019-11-28 12:13:35'),
(207, 110, 15, 'checkbox', 'checkbox.png', '', '12', '2019-11-28 12:13:38', '2019-11-28 12:13:38'),
(208, 111, 15, 'bagag', 'bagag.png', '', NULL, '2019-11-30 09:26:23', '2019-11-30 09:26:23'),
(209, 111, 15, 'checkbox', 'checkbox.png', '', NULL, '2019-11-30 09:26:23', '2019-11-30 09:26:23');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_charges`
--

CREATE TABLE `delivery_charges` (
  `charge_id` int(11) NOT NULL,
  `charge_hours` varchar(22) NOT NULL,
  `charge_value` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `delivery_charges`
--

INSERT INTO `delivery_charges` (`charge_id`, `charge_hours`, `charge_value`) VALUES
(1, 'Standard 72 Hours', '0.00'),
(2, 'Next Day 24 Hours', '0.20'),
(3, 'Same Day 5 Hours', '1.00');

-- --------------------------------------------------------

--
-- Table structure for table `failedOrder`
--

CREATE TABLE `failedOrder` (
  `id` int(11) NOT NULL,
  `failedOrderData` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `failedOrder`
--

INSERT INTO `failedOrder` (`id`, `failedOrderData`, `created_at`) VALUES
(1, 'sorry', '2019-10-31 18:09:40'),
(2, 'Hello', '2019-11-01 18:04:12');

-- --------------------------------------------------------

--
-- Table structure for table `free_order_upload_by_admin`
--

CREATE TABLE `free_order_upload_by_admin` (
  `upload_id` int(11) NOT NULL,
  `fixed_id` int(11) NOT NULL,
  `upload_file_ids` varchar(22) NOT NULL,
  `file` varchar(44) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `free_order_upload_by_admin`
--

INSERT INTO `free_order_upload_by_admin` (`upload_id`, `fixed_id`, `upload_file_ids`, `file`, `created_at`) VALUES
(4, 12, 'demopic', 'demo_pic.png', '2019-11-11 08:35:57'),
(5, 17, 'demopic', 'demo_pic.png', '2019-11-11 10:34:16');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image`, `created`, `modified`) VALUES
(1, 'google.com', '2019-10-02 07:18:27', '2019-10-02 07:37:33'),
(2, 'demo_pic1.png', '2019-10-02 10:40:11', '2019-10-02 10:40:11'),
(3, 'sidebar.png', '2019-10-02 10:40:21', '2019-10-02 10:40:21'),
(4, 'checkbox.png', '2019-10-02 10:40:37', '2019-10-02 10:40:37'),
(5, 'ci2.png', '2019-10-02 10:40:37', '2019-10-02 10:40:37'),
(6, 'codeigniter2.png', '2019-10-02 10:40:37', '2019-10-02 10:40:37'),
(7, 'demo_pic2.png', '2019-10-02 10:40:37', '2019-10-02 10:40:37'),
(8, 'hbd.png', '2019-10-02 10:40:37', '2019-10-02 10:40:37'),
(9, 'sidebar1.png', '2019-10-02 10:40:37', '2019-10-02 10:40:37'),
(10, 'fab-lentz-mRMQwK513hY-unsplash.jpg', '2019-10-02 10:47:20', '2019-10-02 10:47:20'),
(11, 'Screenshot_from_2019-08-20_15-59-57.png', '2019-10-02 10:47:20', '2019-10-02 10:47:20'),
(12, 'Screenshot_from_2019-09-02_14-12-25.png', '2019-10-02 10:47:20', '2019-10-02 10:47:20'),
(13, 'Screenshot_from_2019-09-02_14-12-03.png', '2019-10-02 10:47:20', '2019-10-02 10:47:20'),
(14, 'Screenshot_from_2019-09-02_14-13-15.png', '2019-10-02 10:47:20', '2019-10-02 10:47:20'),
(15, '22520208_1918523418474293_2616067534898350435_o.jpg', '2019-10-02 10:48:35', '2019-10-02 10:48:35'),
(16, 'Screenshot_from_2019-09-24_02-53-11.png', '2019-10-02 10:48:35', '2019-10-02 10:48:35'),
(17, 'Screenshot_from_2019-08-03_14-01-31.png', '2019-10-02 10:48:35', '2019-10-02 10:48:35'),
(18, 'fab-lentz-mRMQwK513hY-unsplash1.jpg', '2019-10-02 10:48:35', '2019-10-02 10:48:35'),
(19, 'checkbox1.png', '2019-10-02 10:51:53', '2019-10-02 10:51:53'),
(20, 'ci21.png', '2019-10-02 10:51:53', '2019-10-02 10:51:53'),
(21, 'codeigniter3.png', '2019-10-02 10:51:53', '2019-10-02 10:51:53'),
(22, 'demo_pic3.png', '2019-10-02 10:51:53', '2019-10-02 10:51:53'),
(23, 'hbd1.png', '2019-10-02 10:51:53', '2019-10-02 10:51:53'),
(24, 'sidebar2.png', '2019-10-02 10:51:53', '2019-10-02 10:51:53'),
(25, 'BlenderGuru_KeyboardShortcutGuide_v2.pdf', '2019-10-02 10:55:08', '2019-10-02 10:55:08'),
(26, 'BlenderGuru_KeyboardShortcutGuide_v21.pdf', '2019-10-02 10:55:16', '2019-10-02 10:55:16'),
(27, 'BlenderGuru_KeyboardShortcutGuide_v22.pdf', '2019-10-02 10:56:41', '2019-10-02 10:56:41'),
(28, 'BlenderGuru_KeyboardShortcutGuide_v23.pdf', '2019-10-02 10:56:56', '2019-10-02 10:56:56'),
(29, 'BlenderGuru_KeyboardShortcutGuide_v24.pdf', '2019-10-02 10:57:06', '2019-10-02 10:57:06'),
(30, 'BlenderGuru_KeyboardShortcutGuide_v25.pdf', '2019-10-02 10:57:12', '2019-10-02 10:57:12'),
(31, 'BlenderGuru_KeyboardShortcutGuide_v26.pdf', '2019-10-02 10:57:20', '2019-10-02 10:57:20'),
(32, 'BlenderGuru_KeyboardShortcutGuide_v27.pdf', '2019-10-02 10:58:12', '2019-10-02 10:58:12'),
(33, 'BlenderGuru_KeyboardShortcutGuide_v28.pdf', '2019-10-02 11:08:15', '2019-10-02 11:08:15');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `invoice_id` varchar(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `order_id` int(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(33) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`, `created_at`) VALUES
(1, 'bagag@bagaglivenezia.com', '2019-10-07 10:43:20'),
(2, 'putul@mail.com', '2019-10-07 10:43:37'),
(3, 'fahimsultan4@gmail.com', '2019-10-07 10:55:39'),
(4, 'nnilanjana255@gmail.com', '2019-10-09 13:43:58'),
(5, 'fahimsultan4@gmail.com9', '2019-10-12 20:07:25'),
(7, 'fahimsultan4@gmail.comf', '2019-11-18 10:06:12'),
(8, 'shuhanshuvo85@gmail.com', '2019-11-28 11:52:38');

-- --------------------------------------------------------

--
-- Table structure for table `ordered_file`
--

CREATE TABLE `ordered_file` (
  `file_id` int(11) NOT NULL,
  `upload_file_ids` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `file` varchar(100) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ordered_file`
--

INSERT INTO `ordered_file` (`file_id`, `upload_file_ids`, `user_id`, `order_id`, `product_id`, `file`, `created_on`, `updated_on`) VALUES
(31, '', 15, 68, 14, '1e9812db398c8c48edae826a0fcb9b1a.zip', '2019-09-25 13:20:48', '2019-09-25 13:20:48'),
(32, '', 15, 69, 14, 'eb8573ed2f48655915cd6c59eb253f39.jpg', '2019-09-25 18:03:40', '2019-09-25 18:03:40'),
(33, '', 15, 69, 14, 'c15b2c7c7894b73f8aa501c46cf56c97.zip', '2019-09-25 18:04:09', '2019-09-25 18:04:09'),
(34, '', 15, 70, 13, '7e26190ea9e1aef65d8caa2ca0aad01a.jpg', '2019-09-25 21:06:32', '2019-09-25 21:06:32'),
(35, '', 15, 70, 14, '6a4dc7d937b71fcd095484020a1c3059.jpg', '2019-09-25 21:07:00', '2019-09-25 21:07:00'),
(37, '', 15, 70, 15, '02ccba3c1ecf6250ca2de8f2f12885b1.jpg', '2019-09-26 09:30:10', '2019-09-26 09:30:10'),
(38, '', 15, 70, 14, '320f618778ed54efe4e32f141905e362.pdf', '2019-09-26 09:30:41', '2019-09-26 09:30:41'),
(39, '', 15, 72, 10, 'c816b99faa001028675ace54cea13594.jpg', '2019-09-28 13:47:04', '2019-09-28 13:47:04'),
(40, '', 15, 72, 12, 'f308ec4ba3bfabd87c499da1e64d6926.jpg', '2019-09-28 13:47:46', '2019-09-28 13:47:46'),
(43, '', 15, 64, 13, './assets/uploads/categories/21245060375d91c5cd526d5.png', '2019-09-30 09:07:25', '2019-09-30 09:07:25'),
(44, '', 15, 64, 13, './assets/uploads/categories/4663362385d91c5e7380fe.png', '2019-09-30 09:07:51', '2019-09-30 09:07:51'),
(45, '', 15, 64, 13, './assets/uploads/categories/18116637905d91c6366a4f8.pdf', '2019-09-30 09:09:10', '2019-09-30 09:09:10'),
(46, '', 15, 64, 13, './assets/zip/2868470385d91c674a5fc1.pdf', '2019-09-30 09:10:12', '2019-09-30 09:10:12'),
(48, '', 15, 70, 13, 'checkbox3.png', '2019-10-02 06:38:40', '2019-10-02 06:38:40'),
(49, '', 15, 70, 13, 'ci25.png', '2019-10-02 06:38:40', '2019-10-02 06:38:40'),
(50, '', 15, 70, 13, 'codeigniter7.png', '2019-10-02 06:38:40', '2019-10-02 06:38:40'),
(51, '', 15, 70, 13, 'demo_pic5.png', '2019-10-02 06:38:40', '2019-10-02 06:38:40'),
(52, '', 15, 70, 13, 'hbd10.png', '2019-10-02 06:38:40', '2019-10-02 06:38:40'),
(53, '', 15, 70, 13, 'checkbox4.png', '2019-10-02 06:39:51', '2019-10-02 06:39:51'),
(54, '', 15, 70, 13, 'ci26.png', '2019-10-02 06:39:51', '2019-10-02 06:39:51'),
(55, '', 15, 70, 13, 'codeigniter8.png', '2019-10-02 06:39:51', '2019-10-02 06:39:51'),
(56, '', 15, 70, 13, 'demo_pic6.png', '2019-10-02 06:39:51', '2019-10-02 06:39:51'),
(57, '', 15, 70, 13, 'hbd11.png', '2019-10-02 06:39:51', '2019-10-02 06:39:51'),
(58, '', 15, 70, 13, 'checkbox5.png', '2019-10-02 06:47:12', '2019-10-02 06:47:12'),
(59, '', 15, 70, 13, 'ci27.png', '2019-10-02 06:47:12', '2019-10-02 06:47:12'),
(60, '', 15, 70, 13, 'codeigniter9.png', '2019-10-02 06:47:12', '2019-10-02 06:47:12'),
(61, '', 15, 70, 13, 'demo_pic7.png', '2019-10-02 06:47:12', '2019-10-02 06:47:12'),
(62, '', 15, 70, 13, 'hbd12.png', '2019-10-02 06:47:12', '2019-10-02 06:47:12'),
(63, '', 15, 70, 13, 'checkbox6.png', '2019-10-02 06:51:11', '2019-10-02 06:51:11'),
(64, '', 15, 70, 13, 'ci28.png', '2019-10-02 06:51:11', '2019-10-02 06:51:11'),
(163, '', 15, 77, 10, 'checkbox27.png', '2019-10-02 07:54:59', '2019-10-02 07:54:59'),
(164, '', 15, 77, 10, 'ci229.png', '2019-10-02 07:54:59', '2019-10-02 07:54:59'),
(165, '', 15, 77, 10, 'codeigniter31.png', '2019-10-02 07:54:59', '2019-10-02 07:54:59'),
(166, '', 15, 77, 10, 'demo_pic29.png', '2019-10-02 07:54:59', '2019-10-02 07:54:59'),
(168, '', 15, 77, 10, 'class_diagram.pdf', '2019-10-02 08:12:57', '2019-10-02 08:12:57'),
(169, '', 15, 77, 10, 'IMG-20190605-WA0036.jpg', '2019-10-02 08:12:57', '2019-10-02 08:12:57'),
(170, '', 15, 77, 10, 'checkbox32.png', '2019-10-02 08:23:18', '2019-10-02 08:23:18'),
(171, '', 15, 77, 10, 'ci231.png', '2019-10-02 08:23:18', '2019-10-02 08:23:18'),
(172, '', 15, 70, 13, 'checkbox33.png', '2019-10-02 09:24:36', '2019-10-02 09:24:36'),
(173, '', 15, 70, 13, 'ci232.png', '2019-10-02 09:24:36', '2019-10-02 09:24:36'),
(174, '', 15, 70, 13, 'codeigniter32.png', '2019-10-02 09:24:36', '2019-10-02 09:24:36'),
(175, '', 15, 70, 13, 'demo_pic30.png', '2019-10-02 09:24:36', '2019-10-02 09:24:36'),
(176, '', 15, 70, 13, 'hbd35.png', '2019-10-02 09:24:36', '2019-10-02 09:24:36'),
(177, '', 15, 68, 14, 'checkbox34.png', '2019-10-03 02:25:44', '2019-10-03 02:25:44'),
(178, '', 15, 68, 14, 'ci233.png', '2019-10-03 02:25:44', '2019-10-03 02:25:44'),
(179, '', 15, 68, 14, 'codeigniter33.png', '2019-10-03 02:25:44', '2019-10-03 02:25:44'),
(180, '', 15, 68, 14, 'demo_pic31.png', '2019-10-03 02:25:44', '2019-10-03 02:25:44'),
(181, '', 15, 178, 11, 'handbag.jpg', '2019-10-13 03:37:48', '2019-10-13 03:37:48'),
(182, '', 15, 178, 11, 'handbag3.png', '2019-10-13 03:37:48', '2019-10-13 03:37:48'),
(183, '', 15, 178, 10, 'shoe2.png', '2019-10-13 13:33:18', '2019-10-13 13:33:18'),
(184, '', 15, 178, 10, 'shoes9.jpg', '2019-10-13 13:33:18', '2019-10-13 13:33:18'),
(185, '', 15, 178, 10, 'sunglass1.png', '2019-10-13 13:33:18', '2019-10-13 13:33:18'),
(186, '', 15, 178, 10, 'shoe3.png', '2019-10-13 13:34:37', '2019-10-13 13:34:37'),
(187, '', 15, 178, 10, 'shoe4.png', '2019-10-13 13:35:16', '2019-10-13 13:35:16'),
(188, '', 15, 178, 10, 'shoe5.png', '2019-10-13 13:36:55', '2019-10-13 13:36:55'),
(189, '', 15, 178, 10, 'shoe6.png', '2019-10-13 13:37:36', '2019-10-13 13:37:36'),
(190, '', 15, 170, 10, 'shoe7.png', '2019-10-13 14:15:28', '2019-10-13 14:15:28'),
(194, '', 0, 0, 0, '', '2019-10-15 10:18:59', '2019-10-15 10:18:59'),
(195, '', 0, 0, 0, '', '2019-10-15 10:18:59', '2019-10-15 10:18:59'),
(196, '', 0, 0, 0, '', '2019-10-15 10:18:59', '2019-10-15 10:18:59'),
(197, '', 0, 0, 0, '', '2019-10-15 10:18:59', '2019-10-15 10:18:59'),
(198, '', 0, 0, 0, '', '2019-10-15 10:18:59', '2019-10-15 10:18:59'),
(199, '', 0, 0, 0, '', '2019-10-15 10:19:01', '2019-10-15 10:19:01'),
(200, '', 0, 0, 0, '', '2019-10-15 10:19:01', '2019-10-15 10:19:01'),
(201, '', 0, 0, 0, '', '2019-10-15 10:19:01', '2019-10-15 10:19:01'),
(202, '', 0, 0, 0, '', '2019-10-15 10:19:01', '2019-10-15 10:19:01'),
(203, '', 0, 0, 0, '', '2019-10-15 10:19:01', '2019-10-15 10:19:01'),
(204, '', 0, 0, 0, '', '2019-10-15 10:19:03', '2019-10-15 10:19:03'),
(205, '', 0, 0, 0, '', '2019-10-15 10:19:03', '2019-10-15 10:19:03'),
(206, '', 0, 0, 0, '', '2019-10-15 10:19:03', '2019-10-15 10:19:03'),
(207, '', 0, 0, 0, '', '2019-10-15 10:19:03', '2019-10-15 10:19:03'),
(208, '', 0, 0, 0, '', '2019-10-15 10:19:03', '2019-10-15 10:19:03'),
(209, '', 0, 0, 0, '', '2019-10-15 10:20:48', '2019-10-15 10:20:48'),
(210, '', 0, 0, 0, '', '2019-10-15 10:20:48', '2019-10-15 10:20:48'),
(211, '', 0, 0, 0, '', '2019-10-15 10:20:48', '2019-10-15 10:20:48'),
(212, '', 0, 0, 0, '', '2019-10-15 10:20:48', '2019-10-15 10:20:48'),
(213, '', 0, 0, 0, '', '2019-10-15 10:20:48', '2019-10-15 10:20:48'),
(214, '', 0, 0, 0, '', '2019-10-15 10:20:50', '2019-10-15 10:20:50'),
(215, '', 0, 0, 0, '', '2019-10-15 10:20:50', '2019-10-15 10:20:50'),
(216, '', 0, 0, 0, '', '2019-10-15 10:20:50', '2019-10-15 10:20:50'),
(217, '', 0, 0, 0, '', '2019-10-15 10:20:50', '2019-10-15 10:20:50'),
(218, '', 0, 0, 0, '', '2019-10-15 10:20:50', '2019-10-15 10:20:50'),
(219, '', 0, 0, 0, '', '2019-10-15 10:20:52', '2019-10-15 10:20:52'),
(220, '', 0, 0, 0, '', '2019-10-15 10:20:52', '2019-10-15 10:20:52'),
(221, '', 0, 0, 0, '', '2019-10-15 10:20:52', '2019-10-15 10:20:52'),
(222, '', 0, 0, 0, '', '2019-10-15 10:20:52', '2019-10-15 10:20:52'),
(223, '', 0, 0, 0, '', '2019-10-15 10:20:52', '2019-10-15 10:20:52'),
(224, 'codeigniter', 15, 179, 14, 'codeigniter.png', '2019-10-15 10:22:22', '2019-10-15 10:22:22'),
(225, 'demopic', 15, 179, 14, 'demo_pic.png', '2019-10-15 10:22:24', '2019-10-15 10:22:24'),
(226, 'hbd', 15, 179, 14, 'hbd.png', '2019-10-15 10:28:17', '2019-10-15 10:28:17'),
(227, 'sidebar', 15, 179, 14, 'sidebar.png', '2019-10-15 10:33:38', '2019-10-15 10:33:38'),
(228, 'sidebar', 15, 179, 14, 'sidebar.png', '2019-10-15 10:34:56', '2019-10-15 10:34:56'),
(229, 'sidebar', 15, 179, 14, 'sidebar.png', '2019-10-15 10:35:04', '2019-10-15 10:35:04'),
(230, 'hbd', 15, 179, 14, 'hbd.png', '2019-10-15 10:38:29', '2019-10-15 10:38:29'),
(231, 'hbd', 15, 179, 14, 'hbd.png', '2019-10-15 10:38:34', '2019-10-15 10:38:34'),
(232, 'hbd', 15, 179, 14, 'hbd.png', '2019-10-15 10:38:43', '2019-10-15 10:38:43'),
(233, 'codeigniter', 15, 179, 14, 'codeigniter.png', '2019-10-15 10:39:26', '2019-10-15 10:39:26'),
(234, 'handbag', 15, 177, 11, 'handbag.jpg', '2019-10-15 10:43:55', '2019-10-15 10:43:55'),
(235, 'handbag', 15, 177, 11, 'handbag.png', '2019-10-15 10:43:57', '2019-10-15 10:43:57'),
(236, 'shoe', 15, 177, 11, 'shoe.png', '2019-10-15 10:44:37', '2019-10-15 10:44:37'),
(237, 'shoes', 15, 177, 11, 'shoes.jpg', '2019-10-15 10:44:39', '2019-10-15 10:44:39'),
(238, 'sunglass', 15, 177, 11, 'sunglass.png', '2019-10-15 10:44:41', '2019-10-15 10:44:41'),
(239, 'sunglasses', 15, 177, 11, 'sunglasses.jpeg', '2019-10-15 10:44:43', '2019-10-15 10:44:43'),
(240, 'fruits', 15, 179, 14, 'fruits.jpeg', '2019-10-15 10:46:33', '2019-10-15 10:46:33'),
(241, 'handbag', 15, 179, 14, 'handbag.jpg', '2019-10-15 10:46:35', '2019-10-15 10:46:35'),
(242, 'handbag', 15, 179, 14, 'handbag.png', '2019-10-15 10:46:37', '2019-10-15 10:46:37'),
(244, 'fruits', 15, 178, 11, 'fruits.jpeg', '2019-10-15 11:35:51', '2019-10-15 11:35:51'),
(245, 'handbag', 15, 178, 11, 'handbag.jpg', '2019-10-15 11:35:54', '2019-10-15 11:35:54'),
(246, 'handbag', 15, 178, 11, 'handbag.png', '2019-10-15 11:36:00', '2019-10-15 11:36:00'),
(247, 'jeans', 15, 178, 11, 'jeans.jpg', '2019-10-15 11:36:03', '2019-10-15 11:36:03'),
(248, 'checkbox', 15, 182, 11, 'checkbox.png', '2019-10-24 16:29:56', '2019-10-24 16:29:56'),
(249, 'ci2', 15, 182, 11, 'ci2.png', '2019-10-24 16:29:59', '2019-10-24 16:29:59'),
(250, 'codeigniter', 15, 182, 11, 'codeigniter.png', '2019-10-24 16:30:01', '2019-10-24 16:30:01'),
(251, 'demopic', 15, 182, 11, 'demo_pic.png', '2019-10-24 16:30:03', '2019-10-24 16:30:03'),
(252, 'ci2', 15, 182, 11, 'ci2.png', '2019-10-26 05:43:49', '2019-10-26 05:43:49'),
(253, 'codeigniter', 15, 182, 11, 'codeigniter.png', '2019-10-26 05:43:52', '2019-10-26 05:43:52'),
(254, 'ci2', 15, 178, 11, 'ci2.png', '2019-10-26 06:09:23', '2019-10-26 06:09:23'),
(255, 'codeigniter', 15, 178, 11, 'codeigniter.png', '2019-10-26 06:09:25', '2019-10-26 06:09:25'),
(256, 'demopic', 15, 178, 11, 'demo_pic.png', '2019-10-26 06:09:27', '2019-10-26 06:09:27'),
(257, 'codeigniter', 15, 178, 11, 'codeigniter.png', '2019-10-26 06:25:16', '2019-10-26 06:25:16'),
(258, 'demopic', 15, 178, 11, 'demo_pic.png', '2019-10-26 06:25:18', '2019-10-26 06:25:18'),
(259, 'hbd', 15, 178, 11, 'hbd.png', '2019-10-26 06:50:07', '2019-10-26 06:50:07'),
(260, 'hbd', 15, 178, 11, 'hbd.png', '2019-10-26 07:25:54', '2019-10-26 07:25:54'),
(261, 'codeigniter', 15, 178, 11, 'codeigniter.png', '2019-10-26 07:26:06', '2019-10-26 07:26:06'),
(262, 'codeigniter', 15, 178, 11, 'codeigniter.png', '2019-10-26 07:50:45', '2019-10-26 07:50:45'),
(263, 'demopic', 15, 178, 11, 'demo_pic.png', '2019-10-26 07:50:47', '2019-10-26 07:50:47'),
(275, 'codeigniter', 15, 170, 10, 'codeigniter.png', '2019-10-27 11:18:47', '2019-10-27 11:18:47'),
(276, 'demopic', 15, 170, 10, 'demo_pic.png', '2019-10-27 11:18:50', '2019-10-27 11:18:50'),
(277, 'hbd', 15, 170, 10, 'hbd.png', '2019-10-27 11:18:52', '2019-10-27 11:18:52'),
(278, 'ci2', 0, 0, 0, 'ci2.png', '2019-10-28 11:27:53', '2019-10-28 11:27:53'),
(279, 'ci2', 0, 0, 0, 'ci2.png', '2019-10-28 11:27:53', '2019-10-28 11:27:53'),
(280, 'codeigniter', 0, 0, 0, 'codeigniter.png', '2019-10-28 11:27:55', '2019-10-28 11:27:55'),
(281, 'codeigniter', 0, 0, 0, 'codeigniter.png', '2019-10-28 11:27:55', '2019-10-28 11:27:55'),
(282, 'demopic', 0, 0, 0, 'demo_pic.png', '2019-10-28 11:27:57', '2019-10-28 11:27:57'),
(283, 'hbd', 0, 0, 0, 'hbd.png', '2019-10-28 11:27:59', '2019-10-28 11:27:59'),
(284, 'monika', 0, 0, 0, 'monika.png', '2019-10-28 11:28:01', '2019-10-28 11:28:01'),
(285, 'sidebar', 0, 0, 0, 'sidebar.png', '2019-10-28 11:28:03', '2019-10-28 11:28:03'),
(286, 'signature', 0, 0, 0, 'signature.jpg', '2019-10-28 11:28:05', '2019-10-28 11:28:05'),
(287, 'ci2', 0, 0, 0, 'ci2.png', '2019-10-28 11:28:26', '2019-10-28 11:28:26'),
(288, 'ci2', 0, 0, 0, 'ci2.png', '2019-10-28 11:28:26', '2019-10-28 11:28:26'),
(289, 'codeigniter', 0, 0, 0, 'codeigniter.png', '2019-10-28 11:28:28', '2019-10-28 11:28:28'),
(290, 'codeigniter', 0, 0, 0, 'codeigniter.png', '2019-10-28 11:28:28', '2019-10-28 11:28:28'),
(291, 'demopic', 0, 0, 0, 'demo_pic.png', '2019-10-28 11:28:30', '2019-10-28 11:28:30'),
(292, 'hbd', 0, 0, 0, 'hbd.png', '2019-10-28 11:28:32', '2019-10-28 11:28:32'),
(293, 'monika', 0, 0, 0, 'monika.png', '2019-10-28 11:28:34', '2019-10-28 11:28:34'),
(294, 'sidebar', 0, 0, 0, 'sidebar.png', '2019-10-28 11:28:36', '2019-10-28 11:28:36'),
(295, 'signature', 0, 0, 0, 'signature.jpg', '2019-10-28 11:28:38', '2019-10-28 11:28:38'),
(296, 'ci2', 0, 0, 0, 'ci2.png', '2019-10-28 13:57:24', '2019-10-28 13:57:24'),
(297, 'codeigniter', 0, 0, 0, 'codeigniter.png', '2019-10-28 13:57:26', '2019-10-28 13:57:26'),
(298, 'demopic', 0, 0, 0, 'demo_pic.png', '2019-10-28 13:57:28', '2019-10-28 13:57:28'),
(299, 'hbd', 0, 0, 0, 'hbd.png', '2019-10-28 13:57:30', '2019-10-28 13:57:30'),
(300, 'ci2', 0, 0, 0, 'ci2.png', '2019-10-28 13:58:07', '2019-10-28 13:58:07'),
(301, 'codeigniter', 0, 0, 0, 'codeigniter.png', '2019-10-28 13:58:10', '2019-10-28 13:58:10'),
(302, 'demopic', 0, 0, 0, 'demo_pic.png', '2019-10-28 13:58:12', '2019-10-28 13:58:12'),
(303, 'hbd', 0, 0, 0, 'hbd.png', '2019-10-28 13:58:14', '2019-10-28 13:58:14'),
(304, 'ci2', 15, 169, 10, 'ci2.png', '2019-10-28 13:58:43', '2019-10-28 13:58:43'),
(305, 'codeigniter', 15, 169, 10, 'codeigniter.png', '2019-10-28 13:58:45', '2019-10-28 13:58:45'),
(306, 'jeans', 15, 169, 11, 'jeans.jpg', '2019-10-29 06:56:27', '2019-10-29 06:56:27'),
(307, 'luggage', 15, 169, 11, 'luggage.png', '2019-10-29 06:56:29', '2019-10-29 06:56:29'),
(308, 'fruits', 15, 169, 10, 'fruits.jpeg', '2019-10-29 06:56:29', '2019-10-29 06:56:29'),
(309, 'googlelogocolor92x30dp', 15, 169, 10, 'googlelogo_color_92x30dp.png', '2019-10-29 06:56:32', '2019-10-29 06:56:32'),
(310, 'handbag', 15, 169, 11, 'handbag.jpg', '2019-10-29 07:16:41', '2019-10-29 07:16:41'),
(311, 'handbag', 15, 169, 11, 'handbag.png', '2019-10-29 07:18:04', '2019-10-29 07:18:04'),
(312, 'profilepage', 15, 169, 11, 'profile_page.pdf', '2019-10-29 07:23:12', '2019-10-29 07:23:12'),
(313, 'profilepage', 15, 169, 11, 'profile_page.pdf', '2019-10-29 07:24:21', '2019-10-29 07:24:21'),
(314, 'jeans', 15, 169, 11, 'jeans.jpg', '2019-10-29 07:24:21', '2019-10-29 07:24:21'),
(315, 'googlelogocolor92x30dp', 15, 169, 11, 'googlelogo_color_92x30dp.png', '2019-10-29 07:25:51', '2019-10-29 07:25:51'),
(316, 'handbag', 15, 169, 11, 'handbag.jpg', '2019-10-29 09:59:44', '2019-10-29 09:59:44'),
(317, 'handbag', 15, 169, 11, 'handbag.png', '2019-10-29 09:59:46', '2019-10-29 09:59:46'),
(318, 'handbag', 15, 169, 11, 'handbag.jpg', '2019-10-29 09:59:54', '2019-10-29 09:59:54'),
(319, 'handbag', 15, 169, 11, 'handbag.png', '2019-10-29 09:59:56', '2019-10-29 09:59:56'),
(320, 'shoe', 15, 169, 11, 'shoe.png', '2019-10-29 10:00:10', '2019-10-29 10:00:10'),
(321, 'shoes', 15, 169, 11, 'shoes.jpg', '2019-10-29 10:00:12', '2019-10-29 10:00:12'),
(322, 'sunglass', 15, 169, 11, 'sunglass.png', '2019-10-29 10:00:14', '2019-10-29 10:00:14'),
(323, 'sunglasses', 15, 169, 11, 'sunglasses.jpeg', '2019-10-29 10:00:16', '2019-10-29 10:00:16'),
(324, 'shoe', 15, 169, 11, 'shoe.png', '2019-10-29 10:06:18', '2019-10-29 10:06:18'),
(325, 'shoes', 15, 169, 11, 'shoes.jpg', '2019-10-29 10:06:21', '2019-10-29 10:06:21'),
(326, 'sunglass', 15, 169, 11, 'sunglass.png', '2019-10-29 10:06:23', '2019-10-29 10:06:23'),
(327, 'shoe', 15, 169, 11, 'shoe.png', '2019-10-29 10:46:56', '2019-10-29 10:46:56'),
(328, 'shoes', 15, 169, 11, 'shoes.jpg', '2019-10-29 10:46:58', '2019-10-29 10:46:58'),
(329, 'sunglass', 15, 169, 11, 'sunglass.png', '2019-10-29 10:47:00', '2019-10-29 10:47:00'),
(330, 'sunglasses', 15, 169, 11, 'sunglasses.jpeg', '2019-10-29 10:47:03', '2019-10-29 10:47:03'),
(331, 'shoe', 15, 178, 10, 'shoe.png', '2019-10-29 18:06:27', '2019-10-29 18:06:27'),
(332, 'shoes', 15, 178, 10, 'shoes.jpg', '2019-10-29 18:06:30', '2019-10-29 18:06:30'),
(333, 'sunglass', 15, 178, 10, 'sunglass.png', '2019-10-29 18:06:33', '2019-10-29 18:06:33'),
(334, 'sunglasses', 15, 178, 10, 'sunglasses.jpeg', '2019-10-29 18:06:35', '2019-10-29 18:06:35'),
(335, 'checkbox', 15, 183, 10, 'checkbox.png', '2019-11-03 08:02:38', '2019-11-03 08:02:38'),
(336, 'ci2', 15, 183, 10, 'ci2.png', '2019-11-03 08:02:40', '2019-11-03 08:02:40'),
(337, 'codeigniter', 15, 178, 10, 'codeigniter.png', '2019-11-06 19:43:36', '2019-11-06 19:43:36'),
(338, 'demopic', 15, 178, 10, 'demo_pic.png', '2019-11-06 19:43:38', '2019-11-06 19:43:38'),
(339, 'checkbox', 15, 178, 11, 'checkbox.png', '2019-11-07 11:58:40', '2019-11-07 11:58:40'),
(340, 'ci2', 15, 178, 11, 'ci2.png', '2019-11-07 11:58:42', '2019-11-07 11:58:42'),
(341, 'codeigniter', 15, 178, 11, 'codeigniter.png', '2019-11-07 11:58:44', '2019-11-07 11:58:44'),
(342, 'demopic', 15, 178, 11, 'demo_pic.png', '2019-11-07 11:58:47', '2019-11-07 11:58:47'),
(343, 'hbd', 15, 178, 11, 'hbd.png', '2019-11-07 11:58:49', '2019-11-07 11:58:49');

-- --------------------------------------------------------

--
-- Table structure for table `orders_status`
--

CREATE TABLE `orders_status` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_status` varchar(22) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `txn_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `payment_gross` float(10,2) NOT NULL,
  `currency_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `payer_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `user_id`, `txn_id`, `payment_gross`, `currency_code`, `payer_email`, `payment_status`, `created_at`) VALUES
(1, 1, '6PG28369NA8380937', 31.72, 'USD', 'sultanularefin15439@gmail.com', 'Completed', '2019-09-02 05:29:26'),
(2, 1, '4XG366124G612584V', 38.06, 'USD', 'sultanularefin15439@gmail.com', 'Completed', '2019-09-02 05:29:26'),
(3, 1, '1F907232V0928064W', 31.72, 'USD', 'hrakib_buyer@neucave.com', 'Completed', '2019-09-02 05:29:26'),
(4, 1, '9JR21596PT807871V', 60.27, 'USD', 'sultanularefin15439@gmail.com', 'Completed', '2019-09-02 05:29:26'),
(5, 1, '8W9984670L540752U', 3.17, 'USD', 'sultanularefin15439@gmail.com', 'Completed', '2019-09-02 05:29:26'),
(6, 1, '56H36670S1704514M', 15.86, 'USD', 'sultanularefin15439@gmail.com', 'Completed', '2019-09-02 05:29:26'),
(7, 2, '6T7431776A826852G', 3.17, 'USD', 'sultanularefin15439@gmail.com', 'Completed', '2019-09-02 05:29:26'),
(8, 2, '7DC99767AM1346154', 3.17, 'USD', 'sultanularefin15439@gmail.com', 'Completed', '2019-09-02 05:29:26'),
(9, 2, '6SG256310U150012E', 6.34, 'USD', 'sultanularefin15439@gmail.com', 'Completed', '2019-09-02 05:32:03'),
(10, 2, '40K01823PP712810T', 41.23, 'USD', 'sultanularefin15439@gmail.com', 'Completed', '2019-09-02 06:16:01'),
(11, 2, '0X5144859E686813X', 15.86, 'USD', 'sultanularefin15439@gmail.com', 'Completed', '2019-09-02 07:38:00'),
(12, 1, '55N35659ND772525M', 9.52, 'USD', 'sultanularefin15439@gmail.com', 'Completed', '2019-09-07 08:43:24');

-- --------------------------------------------------------

--
-- Table structure for table `pre_custom_quote`
--

CREATE TABLE `pre_custom_quote` (
  `custom_quote_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `custom_quote_info` varchar(555) NOT NULL,
  `amount` varchar(22) DEFAULT '0',
  `quote_status` varchar(22) NOT NULL DEFAULT 'Processing',
  `payment_status` varchar(22) NOT NULL DEFAULT 'Unpaid',
  `payment_method` varchar(22) DEFAULT NULL,
  `order_status` varchar(22) NOT NULL DEFAULT 'Processing',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pre_custom_quote`
--

INSERT INTO `pre_custom_quote` (`custom_quote_id`, `user_id`, `custom_quote_info`, `amount`, `quote_status`, `payment_status`, `payment_method`, `order_status`, `created_at`) VALUES
(108, 15, '{\"amnt\":\"2\",\"j_name\":\"bag\",\"additional_service\":\"{\\\"Multipath\\\":{\\\"Price\\\":\\\"15\\\"},\\\"Shadow\\/ Reflect\\\":{\\\"Price\\\":\\\"5\\\",\\\"Option\\\":\\\"original\\\"},\\\"Background Change\\\":{\\\"Price\\\":\\\"20\\\",\\\"Option\\\":\\\"white\\\"}}\",\"d_charge\":\"0.00\"}', '7.32', 'Done', 'Unpaid', '', '', '2019-11-30 06:31:34'),
(109, 15, '{\"amnt\":\"2\",\"j_name\":\"bag\",\"additional_service\":\"{\\\"Neckjoint\\\":{\\\"Price\\\":\\\"25\\\"},\\\"Output File Format\\\":{\\\"Price\\\":\\\"30\\\",\\\"Option\\\":\\\"original\\\"}}\",\"d_charge\":\"0.20\"}', '7.32', 'Done', 'Paid', 'bank', 'Done', '2019-11-28 11:17:43'),
(110, 15, '{\"amnt\":\"2\",\"j_name\":\"222\",\"additional_service\":\"{\\\"Background Change\\\":{\\\"Price\\\":\\\"20\\\",\\\"Option\\\":\\\"white\\\"},\\\"Neckjoint\\\":{\\\"Price\\\":\\\"25\\\"}}\",\"d_charge\":\"0.00\"}', '29.28', 'Done', 'Unpaid', 'bank', '', '2019-11-30 07:05:52'),
(111, 15, '{\"amnt\":\"2\",\"j_name\":\"two\",\"additional_service\":\"{\\\"Multipath\\\":{\\\"Price\\\":\\\"15\\\"},\\\"Shadow\\/ Reflect\\\":{\\\"Price\\\":\\\"5\\\",\\\"Option\\\":\\\"original\\\"},\\\"Background Change\\\":{\\\"Price\\\":\\\"20\\\",\\\"Option\\\":\\\"white\\\"}}\",\"d_charge\":\"0.00\"}', NULL, 'Processing', 'Unpaid', NULL, '', '2019-11-30 09:26:59');

-- --------------------------------------------------------

--
-- Table structure for table `pre_orders_info`
--

CREATE TABLE `pre_orders_info` (
  `order_id` int(11) NOT NULL,
  `order_info` varchar(2000) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '1',
  `payment_status` enum('0','1') NOT NULL DEFAULT '0',
  `payment_method` varchar(22) NOT NULL DEFAULT 'Not Yet' COMMENT 'bank, paypal, Not Yet',
  `order_status` varchar(22) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pre_orders_info`
--

INSERT INTO `pre_orders_info` (`order_id`, `order_info`, `user_id`, `payment_status`, `payment_method`, `order_status`, `created_at`, `updated_on`) VALUES
(385, '[{\"product_id\":\"10\",\"product_image\":\"http:\\/\\/localhost:1111\\/.\\/assets\\/uploads\\/categories\\/6989225335d8f6c4392aaf.png\",\"product_name\":\"Handbag\",\"order_name\":\"two\",\"additional_service\":\"\\\"{\\\\\\\"Multipath\\\\\\\":{\\\\\\\"Price\\\\\\\":\\\\\\\"15\\\\\\\"},\\\\\\\"Shadow\\\\\\/ Reflect\\\\\\\":{\\\\\\\"Price\\\\\\\":\\\\\\\"5\\\\\\\",\\\\\\\"Option\\\\\\\":\\\\\\\"original\\\\\\\"},\\\\\\\"Background Change\\\\\\\":{\\\\\\\"Price\\\\\\\":\\\\\\\"20\\\\\\\",\\\\\\\"Option\\\\\\\":\\\\\\\"white\\\\\\\"},\\\\\\\"Neckjoint\\\\\\\":{\\\\\\\"Price\\\\\\\":\\\\\\\"25\\\\\\\"},\\\\\\\"Output File Format\\\\\\\":{\\\\\\\"Price\\\\\\\":\\\\\\\"30\\\\\\\",\\\\\\\"Option\\\\\\\":\\\\\\\"original\\\\\\\"}}\\\"\",\"sub_total\":\"298.17\",\"quantity\":\"1\",\"number\":\"2\",\"additional_service_value\":null,\"vat\":\"53.77\",\"delivery_price\":\"0.40\",\"totalphotoamount\":\"44\",\"order_status\":\"Pending\"},{\"product_id\":\"10\",\"product_image\":\"http:\\/\\/localhost:1111\\/.\\/assets\\/uploads\\/categories\\/6989225335d8f6c4392aaf.png\",\"product_name\":\"Handbag\",\"order_name\":\"three\",\"additional_service\":\"\\\"{\\\\\\\"Multipath\\\\\\\":{\\\\\\\"Price\\\\\\\":\\\\\\\"15\\\\\\\"},\\\\\\\"Shadow\\\\\\/ Reflect\\\\\\\":{\\\\\\\"Price\\\\\\\":\\\\\\\"5\\\\\\\",\\\\\\\"Option\\\\\\\":\\\\\\\"original\\\\\\\"},\\\\\\\"Background Change\\\\\\\":{\\\\\\\"Price\\\\\\\":\\\\\\\"20\\\\\\\",\\\\\\\"Option\\\\\\\":\\\\\\\"white\\\\\\\"}}\\\"\",\"sub_total\":\"245.22\",\"quantity\":\"1\",\"number\":\"3\",\"additional_service_value\":null,\"vat\":\"44.22\",\"delivery_price\":\"0.00\",\"totalphotoamount\":\"66\",\"order_status\":\"Pending\"}]', 15, '0', 'bank', 'Done', '2019-11-28 13:02:31', '2019-11-30 07:06:48');

-- --------------------------------------------------------

--
-- Table structure for table `pricing`
--

CREATE TABLE `pricing` (
  `price_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `package` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service_name` varchar(33) NOT NULL,
  `service_icon` varchar(55) NOT NULL,
  `service_image` varchar(55) NOT NULL,
  `service_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `service_icon`, `service_image`, `service_description`) VALUES
(3, 'Clipping paths', './assets/uploads/services/14799357325d832b4a695a4.png', './assets/uploads/services/20369650315d832b4a69662.jpg', 'You can get a clipping path of all your images. Only the images of complex images such as bicycles are excluded. tennis rackets, crystal chandeliers, nets or jewelry with thin meshes. Processing is available for these subjects “Complex contours”'),
(4, 'Crop Image', './assets/uploads/services/12803605115d832b83bb60b.png', './assets/uploads/services/12947788195d832b83bb670.jpg', 'You can specify a resolution and size for all images or keep the original images of individual files. You can indicate the size of the image margins. Top margin, right lateral, left lateral and lower depending on your needs.'),
(5, 'Ombra / riflettere', './assets/uploads/services/20925799295d832f785ff32.png', './assets/uploads/services/11332077865d832f786012c.jpg', 'Genera o crea un’ombra all’oggetto. L’ombra può essere quella originale o una richiesta.'),
(6, 'Più tracciati', './assets/uploads/services/10514023735d832fb0668d0.png', './assets/uploads/services/15385133725d832fb066911.jpg', 'Verranno creati più tracciati di ritaglio (maschere) per lavorazioni di correzione o cambio colore successive. Le maschere create sono in genere dalle 4 alle 8 per immagine Tali sezioni saranno visibili in Photoshop'),
(7, 'Background change', './assets/uploads/services/17222840915d832fe545620.png', './assets/uploads/services/21063166555d832fe54566f.jpg', 'Request a custom background for your images. Include a background image in the project files, this will be applied as a background for all elements'),
(8, 'Nock Join (Ritocco Manichino)', './assets/uploads/services/10123395295d8330d3c4a51.png', './assets/uploads/services/7980842045d8330d3c4aa7.jpg', 'Puoi ottenere una ricostruzione professionale delle tue im- magini.  Toglieremo noi il manichino ricreando le parti nascoste. Basterà fornire la sconda immagine senza manichino per ottenere il double neck.');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `sub_category_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_name` varchar(22) NOT NULL,
  `sub_category_image` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `sub_category_description` text NOT NULL,
  `current_price` varchar(11) NOT NULL,
  `previous_price` varchar(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`sub_category_id`, `category_id`, `sub_category_name`, `sub_category_image`, `sub_category_description`, `current_price`, `previous_price`, `created_on`, `updated_on`) VALUES
(10, 11, 'Handbag', './assets/uploads/categories/6989225335d8f6c4392aaf.png', 'this product is good', '22.00', '30.00', '2019-09-18 12:42:21', '2019-09-28 14:20:51'),
(11, 11, 'Sunglasses', './assets/uploads/categories/21077025145d8f6c2299510.png', 'this product is good', '22.00', '30.00', '2019-09-18 12:43:08', '2019-09-28 14:20:18'),
(12, 14, 'Fruits', './assets/uploads/categories/14842879075d8233517f356.jpeg', 'this product is good', '22.00', '30.00', '2019-09-18 13:38:25', '2019-09-28 12:42:27'),
(13, 12, 'Boys Accessories', './assets/uploads/categories/15950714435d886dbd7487f.jpg', 'this product is good', '22.00', '30.00', '2019-09-23 07:01:17', '2019-09-28 12:42:29'),
(14, 11, 'Luggage', './assets/uploads/categories/20089439305d8f6c1541f12.png', 'this product is good', '22.00', '30.00', '2019-09-26 09:59:35', '2019-09-28 14:20:05'),
(9, 11, 'Shoes', './assets/uploads/categories/893851675d8f6c4e08c64.png', 'this product is good', '22.00', '30.00', '2019-09-18 12:41:38', '2019-09-28 14:21:02'),
(15, 12, 'Jeans', './assets/uploads/categories/11026976775d8f77c8cca97.jpg', 'Jeans are a type of pants or trousers, typically made from denim or dungaree cloth. Often the term \"jeans\" refers to a particular style of trousers, called \"blue jeans\", which were invented by Jacob W. Davis in partnership with Levi Strauss & Co. in 1871 and patented by Jacob W. Davis and Levi Strauss on May 20, 1873.', '15', '38', '2019-09-28 13:27:16', '2019-09-28 15:10:00'),
(16, 11, 'Watch', './assets/uploads/categories/538551185d9df097afbe8.png', 'Displays the current Time. Featuring \"Time Icon\" and customizable Themes. Made by the Creator of Timer Tab.', '33', '48', '2019-10-09 14:37:11', '2019-10-09 14:37:11');

-- --------------------------------------------------------

--
-- Table structure for table `try_it_free`
--

CREATE TABLE `try_it_free` (
  `try_it_free_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `try_it_free_info` varchar(555) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `try_it_free_file`
--

CREATE TABLE `try_it_free_file` (
  `try_it_free_id` int(11) NOT NULL,
  `fixed_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `upload_file_ids` varchar(22) NOT NULL,
  `file` varchar(55) NOT NULL,
  `try_free_value` varchar(555) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `upload_by_admin`
--

CREATE TABLE `upload_by_admin` (
  `upload_id` int(11) NOT NULL,
  `upload_file_ids` varchar(33) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `file` varchar(55) NOT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `upload_by_admin`
--

INSERT INTO `upload_by_admin` (`upload_id`, `upload_file_ids`, `user_id`, `order_id`, `product_id`, `file`, `uploaded_at`) VALUES
(6, 'hbd', 15, 178, 2, 'hbd.png', '2019-10-26 08:40:47'),
(7, 'codeigniter', 15, 181, 2, 'codeigniter.png', '2019-11-02 06:16:55'),
(8, 'demopic', 15, 181, 2, 'demo_pic.png', '2019-11-02 06:16:58'),
(9, 'codeigniter', 15, 181, 2, 'codeigniter.png', '2019-11-02 06:18:19'),
(10, 'bagag', 15, 181, 2, 'bagag.png', '2019-11-02 06:18:19'),
(11, 'demopic', 15, 181, 2, 'demo_pic.png', '2019-11-02 06:18:21'),
(12, 'ci2', 15, 181, 2, 'ci2.png', '2019-11-02 06:24:28'),
(13, 'sidebar', 15, 181, 2, 'sidebar.png', '2019-11-02 06:24:30'),
(14, 'ci2', 15, 181, 2, 'ci2.png', '2019-11-02 06:26:09'),
(15, 'checkbox', 15, 181, 2, 'checkbox.png', '2019-11-02 06:26:09'),
(16, 'sidebar', 15, 181, 2, 'sidebar.png', '2019-11-02 06:26:11'),
(17, 'ci2', 15, 181, 2, 'ci2.png', '2019-11-02 06:26:11'),
(18, 'codeigniter', 15, 181, 2, 'codeigniter.png', '2019-11-02 06:26:13'),
(19, 'demopic', 15, 181, 2, 'demo_pic.png', '2019-11-02 06:26:15'),
(20, 'hbd', 15, 181, 2, 'hbd.png', '2019-11-02 06:26:17'),
(21, 'sidebar', 15, 181, 2, 'sidebar.png', '2019-11-02 06:26:19'),
(22, 'demopic', 15, 181, 2, 'demo_pic.png', '2019-11-02 06:28:01'),
(23, 'codeigniter', 15, 181, 2, 'codeigniter.png', '2019-11-02 06:29:11'),
(24, 'checkbox', 15, 183, 2, 'checkbox.png', '2019-11-03 08:03:41'),
(25, 'ci2', 15, 183, 2, 'ci2.png', '2019-11-03 08:03:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$08$200Z6ZZbp3RAEXoaWcMA6uJOFicwNZaqk4oDhqTUiFXFe63MG.Daa', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, '8dVvsiA6NhOJXC2jpO4oa.', 1268889823, 1575106006, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `typeRadio` varchar(11) NOT NULL,
  `email` varchar(33) NOT NULL,
  `password` varchar(55) NOT NULL,
  `forgotPassword` varchar(22) DEFAULT NULL,
  `d_name` text NOT NULL,
  `d_surname` text NOT NULL,
  `c_name` varchar(55) DEFAULT NULL,
  `d_vat` varchar(11) DEFAULT NULL,
  `d_address` varchar(255) NOT NULL,
  `d_city` varchar(55) NOT NULL,
  `d_zip` varchar(11) NOT NULL,
  `d_country` varchar(22) NOT NULL,
  `pec` varchar(11) DEFAULT NULL,
  `sdi` varchar(11) DEFAULT NULL,
  `fiscal` varchar(11) DEFAULT NULL,
  `telephone` varchar(22) NOT NULL,
  `fax` varchar(22) DEFAULT NULL,
  `typeAgree` varchar(22) NOT NULL DEFAULT 'idonotaccept',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `typeRadio`, `email`, `password`, `forgotPassword`, `d_name`, `d_surname`, `c_name`, `d_vat`, `d_address`, `d_city`, `d_zip`, `d_country`, `pec`, `sdi`, `fiscal`, `telephone`, `fax`, `typeAgree`, `created_at`, `updated_at`) VALUES
(15, 'private', 'fahimsultan4@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '268320201', 'Sultanul Arefin', 'Arefin', NULL, NULL, 'House No-13, Rod No-1/B, Sector-9, Uttara, Dhaka, Chowk Bazar, Comilla', 'Dhaka', '1230', 'Bangladesh', NULL, NULL, NULL, '+8801670505780', '', 'iaccept', '2019-09-29 19:16:29', '2019-11-28 09:14:49'),
(16, 'private', 'fahimsultan44@gmail.com', '2d1459434902c9bc1f8d4f25059130bd', NULL, 'Sultanul Arefin', 'Arefin', '', '', 'House No-13, Rod No-1/B, Sector-9, Uttara, Dhaka, Chowk Bazar, Comilla', 'Dhaka', '1230', 'Switzerland', '', '', '', '+8801670505780', '111111', 'iaccept', '2019-11-14 13:29:37', '2019-11-14 13:29:37'),
(17, 'private', 'fahimsultan43@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Sultanul Arefin', 'Arefin', '', '', 'House No-13, Rod No-1/B, Sector-9, Uttara, Dhaka, Chowk Bazar, Comilla', 'Dhaka', '1230', 'Italy', '', '', '', '+8801670505780', '', 'iaccept', '2019-11-16 07:12:54', '2019-11-16 07:12:54'),
(18, 'private', 'fahimsultan41@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Sultanul Arefin', 'Arefin', '', '', 'House No-13, Rod No-1/B, Sector-9, Uttara, Dhaka, Chowk Bazar, Comilla', 'Dhaka', '1230', 'Italy', '', '', '', '+8801670505780', '', 'iaccept', '2019-11-16 07:15:40', '2019-11-16 07:15:40'),
(19, 'private', 'fahimsultan40@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'SULTANUL AREFIN FAHIM', 'Fahim', '', '', 'UTTARA, DHAKA', 'DHAKA', '1230', 'Italy', '', '', '', '+8801670505780', '', 'idonotaccept', '2019-11-16 07:17:22', '2019-11-16 07:17:22'),
(20, 'private', 'fahimsultan45@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Sultanul Arefin', 'Fahim', '', '', 'House No-13, Rod No-1/B, Sector-9, Uttara, Dhaka, Chowk Bazar, Comilla', 'Dhaka', '1230', 'Italy', '', '', '', '+8801670505780', '', 'iaccept', '2019-11-16 07:18:47', '2019-11-16 07:18:47'),
(21, 'private', 'fahimsultan4@gmail.comf', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Sultanul Arefin', 'Arefin', '', '', 'House No-13, Rod No-1/B, Sector-9, Uttara, Dhaka, Chowk Bazar, Comilla', 'Dhaka', '1230', 'Andorra', '', '', '', '+8801670505780', '111111', 'idonotaccept', '2019-11-18 10:07:15', '2019-11-18 10:07:15'),
(22, 'company', 'sultanularefin1@outlook.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Arefin Fahim', 'Arefin', 'Daffodil International University', '11', 'House No-13, Rod No-1/B, Sector-9, Uttara, Dhaka, Chowk Bazar, Comilla', 'Dhaka', '1230', 'Italy', '111111', '111111', '111111', '+8801670505780', '', 'iaccept', '2019-11-26 09:49:01', '2019-11-28 09:32:30'),
(23, 'company', 'fahimsultan4@gmail.comm', '1bbd886460827015e5d605ed44252251', NULL, 'Sayed', '11111', 'Daffodil International University', '123', 'House No-13, Rod No-1/B, Sector-9, Uttara, Dhaka, Chowk Bazar, Comilla', 'Dhaka', '1230', 'Italy', '321', '12345', '8e7', '+8801670505780', '11111', 'iaccept', '2019-11-26 13:00:05', '2019-11-26 13:16:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `additional_services`
--
ALTER TABLE `additional_services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `custom_order_upload_by_admin`
--
ALTER TABLE `custom_order_upload_by_admin`
  ADD PRIMARY KEY (`upload_id`);

--
-- Indexes for table `custom_payments`
--
ALTER TABLE `custom_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `custom_quote`
--
ALTER TABLE `custom_quote`
  ADD PRIMARY KEY (`custom_quote_id`);

--
-- Indexes for table `delivery_charges`
--
ALTER TABLE `delivery_charges`
  ADD PRIMARY KEY (`charge_id`);

--
-- Indexes for table `failedOrder`
--
ALTER TABLE `failedOrder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `free_order_upload_by_admin`
--
ALTER TABLE `free_order_upload_by_admin`
  ADD PRIMARY KEY (`upload_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordered_file`
--
ALTER TABLE `ordered_file`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `orders_status`
--
ALTER TABLE `orders_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pre_custom_quote`
--
ALTER TABLE `pre_custom_quote`
  ADD PRIMARY KEY (`custom_quote_id`);

--
-- Indexes for table `pre_orders_info`
--
ALTER TABLE `pre_orders_info`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `pricing`
--
ALTER TABLE `pricing`
  ADD PRIMARY KEY (`price_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`sub_category_id`);

--
-- Indexes for table `try_it_free`
--
ALTER TABLE `try_it_free`
  ADD PRIMARY KEY (`try_it_free_id`);

--
-- Indexes for table `try_it_free_file`
--
ALTER TABLE `try_it_free_file`
  ADD PRIMARY KEY (`try_it_free_id`);

--
-- Indexes for table `upload_by_admin`
--
ALTER TABLE `upload_by_admin`
  ADD PRIMARY KEY (`upload_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `additional_services`
--
ALTER TABLE `additional_services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `custom_order_upload_by_admin`
--
ALTER TABLE `custom_order_upload_by_admin`
  MODIFY `upload_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `custom_payments`
--
ALTER TABLE `custom_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `custom_quote`
--
ALTER TABLE `custom_quote`
  MODIFY `custom_quote_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;
--
-- AUTO_INCREMENT for table `delivery_charges`
--
ALTER TABLE `delivery_charges`
  MODIFY `charge_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `failedOrder`
--
ALTER TABLE `failedOrder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `free_order_upload_by_admin`
--
ALTER TABLE `free_order_upload_by_admin`
  MODIFY `upload_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `ordered_file`
--
ALTER TABLE `ordered_file`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=344;
--
-- AUTO_INCREMENT for table `orders_status`
--
ALTER TABLE `orders_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pre_custom_quote`
--
ALTER TABLE `pre_custom_quote`
  MODIFY `custom_quote_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT for table `pre_orders_info`
--
ALTER TABLE `pre_orders_info`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=386;
--
-- AUTO_INCREMENT for table `pricing`
--
ALTER TABLE `pricing`
  MODIFY `price_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `sub_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `try_it_free`
--
ALTER TABLE `try_it_free`
  MODIFY `try_it_free_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `try_it_free_file`
--
ALTER TABLE `try_it_free_file`
  MODIFY `try_it_free_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `upload_by_admin`
--
ALTER TABLE `upload_by_admin`
  MODIFY `upload_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
