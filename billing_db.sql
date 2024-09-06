-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 06, 2024 at 11:03 AM
-- Server version: 8.0.31
-- PHP Version: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `billing_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1725616684),
('admin', '2', 1725616700);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` smallint NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` blob,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, NULL, NULL, NULL, 1725616652, 1725616652),
('/admin/assignment/index', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/assignment/view', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/assignment/assign', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/assignment/revoke', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/assignment/*', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/default/index', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/default/*', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/menu/index', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/menu/view', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/menu/create', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/menu/update', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/menu/delete', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/menu/*', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/permission/index', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/permission/view', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/permission/create', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/permission/update', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/permission/delete', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/permission/assign', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/permission/get-users', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/permission/remove', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/permission/*', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/role/index', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/role/view', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/role/create', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/role/update', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/role/delete', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/role/assign', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/role/get-users', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/role/remove', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/role/*', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/route/index', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/route/create', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/route/assign', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/route/remove', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/route/refresh', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/route/*', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/rule/index', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/rule/view', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/rule/create', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/rule/update', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/rule/delete', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/rule/*', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/user/index', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/user/view', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/user/delete', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/user/login', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/user/logout', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/user/signup', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/user/request-password-reset', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/user/reset-password', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/user/change-password', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/user/activate', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/user/*', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/admin/*', 2, NULL, NULL, NULL, 1725616657, 1725616657),
('/gridview/export/download', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/gridview/export/*', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/gridview/grid-edited-row/back', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/gridview/grid-edited-row/*', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/gridview/*', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/gii/default/index', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/gii/default/view', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/gii/default/preview', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/gii/default/diff', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/gii/default/action', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/gii/default/*', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/gii/*', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/debug/default/db-explain', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/debug/default/index', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/debug/default/view', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/debug/default/toolbar', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/debug/default/download-mail', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/debug/default/*', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/debug/user/set-identity', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/debug/user/reset-identity', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/debug/user/*', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/debug/*', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/company-details/index', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/company-details/view', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/company-details/create', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/company-details/update', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/company-details/delete', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/company-details/*', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/customer/index', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/customer/view', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/customer/create', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/customer/update', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/customer/delete', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/customer/*', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/item/index', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/item/view', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/item/create', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/item/update', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/item/delete', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/item/*', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/registration/index', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/registration/view', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/registration/create', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/registration/update', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/registration/delete', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/registration/*', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/site/error', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/site/captcha', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/site/index', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/site/login', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/site/logout', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/site/contact', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/site/about', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/site/signup', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/site/request-password-reset', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/site/reset-password', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/site/verify-email', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/site/resend-verification-email', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/site/*', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/*', 2, NULL, NULL, NULL, 1725616658, 1725616658),
('/*', 2, NULL, NULL, NULL, 1725616671, 1725616671);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', '/*');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` blob,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

DROP TABLE IF EXISTS `company_details`;
CREATE TABLE IF NOT EXISTS `company_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `alt_mobile_no` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `account_holder_name` varchar(255) DEFAULT NULL,
  `account_no` varchar(30) DEFAULT NULL,
  `ifsc_code` varchar(50) DEFAULT NULL,
  `branch_name` varchar(255) DEFAULT NULL,
  `gpay_no` varchar(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `mobile_no` varchar(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int NOT NULL,
  `record_status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int NOT NULL,
  `record_status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `rate`, `created_at`, `created_by`, `record_status`) VALUES
(1, 'Optical Fiber 2F', '12.00', '2024-09-06 08:11:32', 1, 1),
(2, 'Optical Fiber 4F', '14.00', '2024-09-06 08:11:32', 1, 1),
(3, 'Patch Cord 5m', '350.00', '2024-09-06 08:11:32', 1, 1),
(4, 'Installation charges', '1000.00', '2024-09-06 08:11:32', 1, 1),
(5, 'Dual band ONT', '3500.00', '2024-09-06 08:11:32', 1, 1),
(6, 'Single band ONT', '2500.00', '2024-09-06 08:11:32', 1, 1),
(7, 'One month recharge 50Mbps', '442.00', '2024-09-06 08:11:32', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE IF NOT EXISTS `registration` (
  `id` int NOT NULL AUTO_INCREMENT,
  `customer_id` int NOT NULL,
  `total_amt` decimal(10,2) NOT NULL,
  `gst_amt` decimal(10,2) NOT NULL,
  `grand_total` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int NOT NULL,
  `record_status` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registration_item`
--

DROP TABLE IF EXISTS `registration_item`;
CREATE TABLE IF NOT EXISTS `registration_item` (
  `id` int NOT NULL AUTO_INCREMENT,
  `registration_id` int NOT NULL,
  `item_id` int NOT NULL,
  `quantity` int NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `item_id` (`item_id`),
  KEY `registration_id` (`registration_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` smallint NOT NULL DEFAULT '10',
  `created_at` int NOT NULL,
  `updated_at` int DEFAULT NULL,
  `verification_token` varchar(255) DEFAULT NULL,
  `is_block` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`, `is_block`) VALUES
(1, 'admin', 'x0qrvV6P2dcdY8zAIy4Ko3T4lKCNSXGi', '$2y$13$6kHC11EUG/kgZQ9jRW.m4.ku6xMVNuopfSK51.QRfMcbFMAL0/oHi', NULL, NULL, 10, 1671511795, 1675927918, NULL, 0),
(2, 'bidyanda', '3yZPkWNZgZJbN9l1bpdC5Xe3glERZeNc', '$2y$13$gJZV2NCxA5z6I77ZJEPXmOqDtb8BS1N222uEQ.5TEmCBvyY7JHlUu', NULL, 'bidyanda@gmail.com', 10, 1723185205, 1723185205, NULL, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `registration`
--
ALTER TABLE `registration`
  ADD CONSTRAINT `registration_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `registration_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `registration_item`
--
ALTER TABLE `registration_item`
  ADD CONSTRAINT `registration_item_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `registration_item_ibfk_2` FOREIGN KEY (`registration_id`) REFERENCES `registration` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
