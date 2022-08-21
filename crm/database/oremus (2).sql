-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2022 at 07:18 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oremus`
--

-- --------------------------------------------------------

--
-- Table structure for table `career`
--

CREATE TABLE `career` (
  `id` int(255) NOT NULL,
  `title` text NOT NULL,
  `description` text DEFAULT NULL,
  `php_file_location` text NOT NULL,
  `job_type` text DEFAULT NULL,
  `job_location` text DEFAULT NULL,
  `job_category` text DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `career`
--

INSERT INTO `career` (`id`, `title`, `description`, `php_file_location`, `job_type`, `job_location`, `job_category`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(39, 'Management', '<h1><strong>Team are required for management.</strong></h1>\r\n\r\n<ul>\r\n	<li><strong>Position 1</strong></li>\r\n	<li><strong>Position 2</strong></li>\r\n</ul>\r\n', 'career/Management/index.php', 'Full Time', 'Hydrabad', '0', 1, '2022-06-22 12:33:03', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `case_study`
--

CREATE TABLE `case_study` (
  `id` int(255) NOT NULL,
  `title` text NOT NULL,
  `description` text DEFAULT NULL,
  `file` text NOT NULL,
  `file_type` text DEFAULT NULL,
  `php_file_location` text NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `case_study`
--

INSERT INTO `case_study` (`id`, `title`, `description`, `file`, `file_type`, `php_file_location`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(42, 'Tax', 'this is the text for test.', 'security62b30778f00b00.39918308.jpg', 'jpg', 'case_study/Tax/index.php', 0, '2022-06-22 12:13:44', '2022-06-22 12:20:04', NULL),
(43, 'Management', 'this is the management.', '0', '0', 'case_study/Management/index.php', 1, '2022-06-22 12:23:04', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_subject_list`
--

CREATE TABLE `contact_subject_list` (
  `id` int(255) NOT NULL,
  `service_id` int(255) NOT NULL,
  `code` bigint(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_subject_list`
--

INSERT INTO `contact_subject_list` (`id`, `service_id`, `code`, `created_at`, `updated_at`, `deleted_at`) VALUES
(12, 8, 1655727227, '2022-06-20 12:13:47', NULL, NULL),
(13, 6, 1655727227, '2022-06-20 12:13:47', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(255) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` bigint(13) NOT NULL,
  `company_name` text DEFAULT NULL,
  `message` text DEFAULT NULL,
  `subject_code` bigint(255) NOT NULL,
  `page_name` text DEFAULT NULL,
  `archive` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `phone`, `company_name`, `message`, `subject_code`, `page_name`, `archive`, `created_at`, `updated_at`, `deleted_at`) VALUES
(19, 'DA Team', 'xyzhjs@gmail.com', 7851332230, 'test com', 'Test Query', 1655727227, 'http://localhost/folder123/oremus/contact.php', 0, '2022-06-20 12:13:47', '2022-07-19 09:23:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(255) NOT NULL,
  `title` text NOT NULL,
  `description` text DEFAULT NULL,
  `file` text NOT NULL,
  `file_type` text DEFAULT NULL,
  `php_file_location` text NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `title`, `description`, `file`, `file_type`, `php_file_location`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(34, 'Tax', 'something is there.', 'security62b30a1ede2f73.49187168.jpg', 'jpg', '', 0, '2022-06-22 12:25:02', '2022-06-22 12:26:10', NULL),
(35, 'Management', 'this is the description', 'Image (1)62c14109684010.59971343.png', 'png', '', 1, '2022-07-03 07:11:05', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(255) NOT NULL,
  `service_name` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Taxation', '2022-06-17 11:18:44', '2022-06-17 11:44:09', '2022-06-17 11:44:09'),
(2, 'Transaction Processing', '2022-06-17 11:37:15', '2022-06-17 11:44:15', '2022-06-17 11:44:15'),
(3, 'Transaction Processing', '2022-06-17 11:44:24', '2022-06-17 11:45:48', NULL),
(4, 'payroll managment', '2022-06-17 11:46:03', '2022-06-17 11:46:51', '2022-06-17 11:46:51'),
(5, 'Payroll Managment', '2022-06-17 11:46:57', NULL, NULL),
(6, 'Taxation', '2022-06-18 12:20:03', NULL, NULL),
(7, 'Custom Reporting', '2022-06-18 12:20:22', NULL, NULL),
(8, 'Book Keeping', '2022-06-18 12:20:58', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `phone` bigint(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_admin` int(11) NOT NULL DEFAULT 0 COMMENT ' 1-godfather, 2-super admin,3-admin, \r\n',
  `verification_code` text DEFAULT NULL,
  `forgot_token` text DEFAULT NULL,
  `verified` int(10) NOT NULL DEFAULT 0 COMMENT '0-No, 1-Yes',
  `user_block` int(10) NOT NULL DEFAULT 0 COMMENT '0-unblock, 1-block',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `is_admin`, `verification_code`, `forgot_token`, `verified`, `user_block`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'admin 1', 'admin@gmail.com', 7775875580, '$2y$10$0HoVpDL4bhRdmw4cGlFfZeilr0C8EyHslRdWDiQcQiLyB63GcdCym', 1, NULL, '6616', 1, 0, '2022-03-03 07:44:41', '2022-06-20 12:12:17', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `career`
--
ALTER TABLE `career`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_study`
--
ALTER TABLE `case_study`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_subject_list`
--
ALTER TABLE `contact_subject_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `career`
--
ALTER TABLE `career`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `case_study`
--
ALTER TABLE `case_study`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `contact_subject_list`
--
ALTER TABLE `contact_subject_list`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
