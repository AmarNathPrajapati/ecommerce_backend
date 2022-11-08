-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2022 at 11:27 AM
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
-- Database: `ecommerce`
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
(42, 'Tax', 'this is the text for test. updated text', 'Colors 162fe1e953d23f7.23727794.png', 'png', 'case_study/Tax/index.php', 1, '2022-06-22 12:13:44', '2022-08-18 14:52:18', '2022-08-18 14:52:18'),
(43, 'Management', 'this is the management.', '0', '0', 'case_study/Management/index.php', 1, '2022-06-22 12:23:04', '2022-08-18 11:10:50', '2022-08-18 11:10:50'),
(44, 'Happy Shree Krishna Janmashtami', 'Wish you all happy happy Shree Krishna Janmashtami', 'Shree_krishna62fe19e0ee9081.64074855.jpg', 'jpg', 'case_study/Happy_Shree_Krishna_Janmashtami/index.php', 1, '2022-08-18 10:52:16', '2022-08-18 14:52:19', '2022-08-18 14:52:19'),
(45, 'Happy Independence Day', 'Wish you all Happy Independence Day', 'indian-independence62fe25ffe76607.13080829.jpg', 'jpg', 'case_study/Happy_Independence_Day/index.php', 1, '2022-08-18 11:43:59', '2022-08-18 14:52:22', '2022-08-18 14:52:22'),
(46, 'Happy Shree Krishna Janmashtami', 'Happy Shree Krishna Janmashtami to all', 'Shree_krishna62fe5243cc7808.42923108.jpg', 'jpg', 'case_study/Happy_Shree_Krishna_Janmashtami/index.php', 1, '2022-08-18 14:52:51', '2022-08-18 14:56:38', '2022-08-18 14:56:38'),
(47, 'Happy Shree Krishna Janmashtami', 'Happy Shree Krishna Janmashtami to all', 'Shree_krishna62fe533b5082b3.10700083.jpg', 'jpg', 'case_study/Happy_Shree_Krishna_Janmashtami/index.php', 1, '2022-08-18 14:56:59', '2022-08-19 05:57:17', '2022-08-19 05:57:17'),
(48, 'Tables', 'We provides best table ', '56101543SD00017_01_1500x150062ff2a747c7ff8.21783075.png', 'png', 'case_study/Tables/index.php', 1, '2022-08-19 06:12:32', '2022-08-19 06:41:11', '2022-08-19 06:41:11'),
(49, 'Tables', 'tables', '56101543SD00017_01_1500x150062ff309c77c5a8.53631811.png', 'png', 'products/Tables/index.php', 1, '2022-08-19 06:41:32', '2022-08-19 06:47:20', '2022-08-19 06:47:20'),
(50, 'Tables', 'tables', '56101543SD00017_01_1500x150062ff3214606ce3.27894027.png', 'png', 'products/Tables/index.php', 1, '2022-08-19 06:47:48', '2022-08-19 06:51:01', '2022-08-19 06:51:01'),
(51, 'Tables', 'tables', '56101543SD00017_01_1500x150062ff338cd4cc18.62795746.png', 'png', 'products/Tables/index.php', 1, '2022-08-19 06:54:04', NULL, NULL),
(52, 'clothes', 'You can find all types of clothes here.', '91Pka1f3yKS62ff3b1d91f119.09366078.jpg', 'jpg', 'products/clothes/index.php', 1, '2022-08-19 07:26:21', NULL, NULL),
(53, 'Bags', 'All types of bags are provided', 'video362ff3f9b731273.62389324.mp4', 'mp4', 'products/Bags/index.php', 1, '2022-08-19 07:45:31', NULL, NULL),
(54, 'Beds', 'provided all type of beds', 'download62ffc0288294c6.72586195.jpg', 'jpg', 'products/Beds/index.php', 1, '2022-08-19 16:54:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(255) NOT NULL,
  `service_name` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `currency_symbol` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `service_name`, `created_at`, `updated_at`, `deleted_at`, `currency_symbol`) VALUES
(1, 'Ruppee', '2022-08-24 12:54:16', '2022-08-24 13:04:23', '2022-08-24 13:04:03', '₹'),
(2, 'Ruppee', '2022-08-24 13:09:36', '2022-08-24 13:10:09', '2022-08-24 13:10:09', '₹'),
(3, 'Rupees', '2022-08-24 13:31:25', '2022-09-03 02:07:56', NULL, '₹'),
(4, 'Dollar', '2022-08-24 13:31:39', '2022-08-25 11:48:38', NULL, '$'),
(6, 'Euro', '2022-09-09 09:27:18', '2022-09-09 09:36:13', '2022-09-09 09:36:13', '€'),
(7, 'Euros', '2022-09-09 09:36:30', '2022-09-09 09:36:39', '2022-09-09 09:36:39', '€'),
(8, 'Euro', '2022-09-10 05:10:06', NULL, NULL, '€'),
(9, 'Amar', '2022-09-13 12:26:57', '2022-09-13 12:35:55', '2022-09-13 12:35:55', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(255) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` bigint(13) NOT NULL,
  `password` varchar(255) NOT NULL,
  `archive` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `password`, `archive`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Chandan', 'Admin@gmail.com', 9475847395, '$2y$10$IoasgWc3qBrzZsUwd2c0a.rO9GdwJXQdBza0NpM4wWTvaTuHMk/na', 0, '2022-08-31 01:44:33', NULL, NULL),
(9, 'Amar Nath', 'Amar@gmail.com', 9786424234, '$2y$10$S7/g4RK7oZhNCUwYH6zh2erT.GmCqhZ9k7jnH/ax6y1x5AhXXDYTq', 0, '2022-09-09 01:49:12', '2022-09-09 09:00:45', NULL),
(10, 'Pramod', 'Pramod@gmail.com', 9845213485, '$2y$10$CAxnV3usQatm4VrguQ0VHe0ChcNskS/Q/KwcgFyeorXD7soAj7UWa', 0, '2022-09-12 11:54:58', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `discount_category`
--

CREATE TABLE `discount_category` (
  `id` int(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `currency` text NOT NULL,
  `dis_type` varchar(20) NOT NULL,
  `value_per` int(10) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `discount_category`
--

INSERT INTO `discount_category` (`id`, `category`, `currency`, `dis_type`, `value_per`, `start_date`, `end_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Electronics', 'Rupees ₹', 'Percentage', 20, '2022-09-10', '2022-10-10', '2022-09-10 01:48:46', '2022-09-10 02:19:18', '2022-09-10 02:19:18'),
(2, 'Mobiles', 'Rupees ₹', 'Percentage', 20, '2022-09-11', '2022-09-20', '2022-09-10 01:56:25', '2022-09-10 02:26:40', NULL),
(3, 'Clothes', 'Rupees ₹', 'Percentage', 10, '2022-09-30', '2022-10-27', '2022-09-10 02:20:09', '2022-09-10 02:20:15', '2022-09-10 02:20:15');

-- --------------------------------------------------------

--
-- Table structure for table `discount_order`
--

CREATE TABLE `discount_order` (
  `id` int(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `currency` text NOT NULL,
  `dis_type` varchar(20) NOT NULL,
  `value_per` int(10) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `discount_order`
--

INSERT INTO `discount_order` (`id`, `category`, `currency`, `dis_type`, `value_per`, `start_date`, `end_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Clothes', 'Rupees ₹', 'Value In Currency', 49, '2022-09-14', '2022-10-14', '2022-09-10 03:26:04', '2022-09-10 03:32:15', '2022-09-10 03:32:15'),
(2, 'Trimmer', 'Rupees ₹', 'Value In Currency', 199, '2022-09-10', '2022-10-10', '2022-09-10 03:30:04', '2022-09-10 03:32:28', NULL),
(3, 'Not Available', 'Rupees ₹', 'Not Available', 0, '2022-09-10', '2022-10-10', '2022-09-10 04:40:21', '2022-09-10 04:41:17', '2022-09-10 04:41:17');

-- --------------------------------------------------------

--
-- Table structure for table `freeship`
--

CREATE TABLE `freeship` (
  `id` int(255) NOT NULL,
  `currency` text NOT NULL,
  `freeship_type` varchar(50) NOT NULL,
  `freeship_value` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `freeship`
--

INSERT INTO `freeship` (`id`, `currency`, `freeship_type`, `freeship_value`, `start_date`, `end_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Rupees ₹', 'On Particular Product', 'Not Available', '2022-09-17', '2022-09-30', '2022-09-10 04:43:47', '2022-09-10 04:53:10', '2022-09-10 04:53:10'),
(2, 'Rupees ₹', 'On Particular Product', 'Redmi 9 Pro', '2022-09-10', '2022-10-10', '2022-09-10 04:54:18', '2022-09-10 04:54:49', '2022-09-10 04:54:49'),
(3, 'Rupees ₹', 'On Above Total Amount', '5000', '2022-09-10', '2022-09-17', '2022-09-10 04:55:12', NULL, NULL);

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
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `product_name` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_status` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `user_id`, `product_id`, `user_name`, `product_name`, `quantity`, `order_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 3, 'Amar Nath', '0', 3, '0', '2022-09-04 04:48:03', '2022-09-04 06:51:11', '2022-09-04 06:51:11'),
(2, 4, 3, 'Amar Nath', '0', 0, '0', '2022-09-04 04:51:45', '2022-09-04 06:51:16', '2022-09-04 06:51:16'),
(3, 4, 3, 'Amar Nath', 'Redmi', 1, 'Accepted', '2022-09-04 04:55:26', NULL, NULL),
(4, 4, 3, 'Amar Nath', 'Redmi', 6, 'Accepted', '2022-09-04 06:01:48', '2022-09-05 11:36:59', '2022-09-05 11:36:59'),
(5, 4, 3, 'Amar Nath', 'Redmi', 2, 'Dispatch', '2022-09-04 06:03:48', '2022-09-05 14:41:45', '2022-09-05 14:41:45'),
(6, 4, 3, 'Amar Nath', 'Redmi', 1, 'Accepted', '2022-09-05 11:15:57', '2022-09-05 14:41:38', '2022-09-05 14:41:38'),
(7, 2, 3, 'Chandan', 'Redmi', 1, 'Delivered', '2022-09-05 11:34:54', '2022-09-05 12:03:17', NULL),
(8, 2, 2, 'Chandan', 'Levis Jeans', 1, 'Placed', '2022-09-05 12:37:41', NULL, NULL),
(9, 2, 4, 'Chandan', 'Trimmer', 1, 'Placed', '2022-09-05 12:40:29', NULL, NULL),
(10, 2, 2, 'Chandan', 'Levis Jeans', 1, 'Placed', '2022-09-05 14:34:43', NULL, NULL),
(11, 4, 4, 'Amar Nath', 'Trimmer', 1, 'Accept', '2022-09-05 14:59:32', '2022-09-10 06:17:23', NULL),
(12, 2, 8, 'Chandan', 'Sofa Set', 10, 'Accept', '2022-09-10 05:18:00', '2022-09-10 06:17:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(255) NOT NULL,
  `order_status` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `order_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Accepted', '2022-09-02 01:43:04', '2022-09-02 01:51:18', '2022-09-02 01:51:18'),
(2, 'Placed', '2022-09-02 01:51:33', '2022-09-02 01:51:38', '2022-09-02 01:51:38'),
(3, 'Placed', '2022-09-02 01:51:46', '2022-09-05 11:50:29', NULL),
(4, 'Accept', '2022-09-02 01:56:36', '2022-09-02 01:58:16', NULL),
(5, 'Dispatch', '2022-09-02 01:56:46', '2022-09-04 06:45:07', NULL),
(6, 'Accept', '2022-09-02 01:57:05', '2022-09-02 01:58:06', '2022-09-02 01:58:06'),
(7, 'Returned', '2022-09-05 11:50:43', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `description` text DEFAULT NULL,
  `currency` varchar(255) NOT NULL,
  `actual_price` varchar(255) NOT NULL,
  `sale_price` varchar(255) NOT NULL,
  `cost_price` varchar(255) NOT NULL,
  `sku_number` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `weight_unit` varchar(50) NOT NULL,
  `weight` varchar(10) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `marketing_angle` varchar(255) NOT NULL,
  `file` text NOT NULL,
  `file_type` text DEFAULT NULL,
  `php_file_location` text NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category`, `title`, `description`, `currency`, `actual_price`, `sale_price`, `cost_price`, `sku_number`, `quantity`, `weight_unit`, `weight`, `tag`, `marketing_angle`, `file`, `file_type`, `php_file_location`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Mobiles', 'Redmi', 'one of the best smartphone', '$', '12999', '9999', '7999', 'Re123z', '5', '', '250', 'Mobile', '', 'download (1)6312b0ca3460e4.55371328.jpg', 'jpg', 'products/Redmi/index.php', 1, '2022-09-03 01:28:44', '2022-09-04 02:22:30', '2022-09-03 02:07:04'),
(2, 'Clothes', 'Levis jeans', 'best jeans', '₹', '1299', '999', '799', 'Je123z', '6', '', '500', 'Clothes', 'jeans', 'mens-branded-heavy-knitted-jeans-thumb6312b996446a85.07504376.jpg', 'jpg', 'products/Levis_jeans/index.php', 1, '2022-09-03 02:00:51', '2022-09-05 14:34:43', NULL),
(3, 'Mobiles', 'Redmi', 'Best Smartphone', '₹', '11999', '9999', '7999', 'Re123z', '1', '', '250', 'Mobile', 'mobile', 'download (1)6312b776a48358.09358750.jpg', 'jpg', 'products/Redmi/index.php', 1, '2022-09-03 02:09:58', '2022-09-09 10:52:34', '2022-09-09 10:52:34'),
(4, 'Electronics', 'Trimmer', 'best trimmer', '₹', '1199', '899', '699', 't123z', '3', '', '250', 'trimmer', 'trimmer', 'Havells-BT6152C-Shavers-and-Trimmers-491392037-i-1-1200Wx1200H6312d3bd5a09f9.53117256.jpg', 'jpg', 'products/Trimmer/index.php', 1, '2022-09-03 04:10:37', '2022-09-05 14:59:32', NULL),
(5, 'Furnitures', 'Double Bed', 'Best Bed of the year', '₹', '11999', '9999', '8999', 'bd123z', '5', '', '100', 'Bed', 'Bed', 'download63140cce340810.22255975.jpg', 'jpg', 'products/Double_Bed/index.php', 1, '2022-09-04 02:26:22', '2022-09-09 10:52:03', '2022-09-09 10:52:03'),
(6, 'Mobiles', 'Narzo mobiles', 'Best seller mobile', '₹', '12999', '10999', '6999', '12narz', '10', '', '500', 'Mobile', 'mobile', 'narzo631b0c90a816e3.88573130.png', 'png', 'products/Narzo_mobiles/index.php', 1, '2022-09-09 09:50:25', '2022-09-09 10:21:07', '2022-09-09 10:21:07'),
(7, 'Mobiles', 'Redmi 9 pro', 'Best product', '₹', '11999', '9999', '7599', 'Re123z', '10', 'gram', '200', 'Mobile', 'mobile', 'mobile631b1c53bb9826.44879794.jpg', 'jpg', 'products/Redmi_9_pro/index.php', 1, '2022-09-09 10:53:41', '2022-09-09 10:58:27', NULL),
(8, 'Furnitures', 'Sofa set', 'best sofa set', '₹', '12000', '10000', '5000', 'f-123', '90', 'Kg', '20', 'bed, sofa, best sofa', 'bed,furniture', 'bed631c1d68eea733.48254458.jpg', 'jpg', 'products/Sofa_set/index.php', 1, '2022-09-10 05:14:12', '2022-09-10 05:18:00', NULL),
(9, 'Furnitures', 'Tables', 'best table', '$', '232', '234', '232', 'Je123z', '10', 'Kg', '434', 'bed, sofa, best sofa', 'trimmer', 'narzo63207f49e61e48.30156050.png', 'png', 'products/Tables/index.php', 1, '2022-09-13 13:02:01', '2022-09-13 13:04:42', '2022-09-13 13:04:42'),
(10, 'Furnitures', 'jeans', 'oijkj', '€', '12999', '2312', '343', 't123z', '10', 'Kg', '2324', 'bed, sofa, best sofa', 'dwe00', 'narzo6320808f7e0673.98660463.png', 'png', 'products/jeans/index.php', 1, '2022-09-13 13:07:27', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(255) NOT NULL,
  `service_name` text NOT NULL,
  `file` text NOT NULL,
  `file_type` text DEFAULT NULL,
  `php_file_location` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `file`, `file_type`, `php_file_location`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Clothes', '91Pka1f3yKS6304a4398b89c3.50201731.jpg', 'jpg', '', '2022-08-22 11:49:13', '2022-09-05 12:26:55', '2022-09-05 12:26:55'),
(4, 'Mobiles', 'download (1)6304a3ff660526.03375975.jpg', 'jpg', '', '2022-08-22 11:49:57', '2022-09-09 10:12:37', '2022-09-09 10:12:37'),
(7, 'Electronics', 'images6312d3124d1381.96056237.jpg', 'jpg', '', '2022-09-03 04:07:46', '2022-09-03 05:23:14', '2022-09-03 05:23:14'),
(8, 'Electronics', 'images6312e4e1297069.11067520.jpg', 'jpg', '', '2022-09-03 05:23:45', '2022-09-03 05:25:40', '2022-09-03 05:25:40'),
(9, 'Electronics', 'images6312e5654d9605.60379454.jpg', 'jpg', '', '2022-09-03 05:25:57', '2022-09-05 12:26:50', '2022-09-05 12:26:50'),
(10, 'Furnitures', 'download63140c5e0ea070.41773407.jpg', 'jpg', '', '2022-09-04 02:24:30', '2022-09-05 12:26:43', '2022-09-05 12:26:43'),
(11, 'Clothes', 'mens-branded-heavy-knitted-jeans-thumb6315ec0a1c8072.89907572.jpg', 'jpg', '', '2022-09-05 12:31:06', '2022-09-05 13:40:54', '2022-09-05 13:40:54'),
(12, 'Electronics', 'images6315ee2e74af92.75838045.jpg', 'jpg', '', '2022-09-05 12:40:14', '2022-09-08 13:47:27', '2022-09-08 13:47:27'),
(13, 'Clothes', '91Pka1f3yKS6315fcce07f379.62949311.jpg', 'jpg', '', '2022-09-05 13:42:38', NULL, NULL),
(14, 'Electronics', 'images6319f2866d07b7.91111344.jpg', 'jpg', '', '2022-09-08 13:47:50', '2022-09-08 13:48:24', '2022-09-08 13:48:24'),
(15, 'Electronics', 'images631b06201edd84.08741357.jpg', 'jpg', '', '2022-09-08 13:51:26', '2022-09-09 09:23:44', NULL),
(16, 'Furnitures', 'download631b01fc5c9260.66396418.jpg', 'jpg', '', '2022-09-09 09:05:26', '2022-09-09 09:09:43', '2022-09-09 09:09:43'),
(17, 'Furnitures', 'download631b02e85282d4.95955495.jpg', 'jpg', '', '2022-09-09 09:10:00', '2022-09-09 09:10:27', '2022-09-09 09:10:27'),
(18, 'Mobiles', 'download (1)631b11c3a8bbc4.90047209.jpg', 'jpg', '', '2022-09-09 10:13:23', NULL, NULL),
(19, 'Furnitures', 'bed631c1bf9ac7055.07756049.jpg', 'jpg', '', '2022-09-10 05:09:13', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_category`
--

CREATE TABLE `shipping_category` (
  `id` int(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `fixed_value` bigint(20) NOT NULL,
  `pincode` bigint(20) NOT NULL,
  `pin_value` bigint(20) NOT NULL,
  `range_km` varchar(255) NOT NULL,
  `range_value` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping_category`
--

INSERT INTO `shipping_category` (`id`, `category`, `currency`, `fixed_value`, `pincode`, `pin_value`, `range_km`, `range_value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Clothes', 'Rupees ₹', 100, 222002, 45, '0-5', 40, '2022-09-08 12:37:48', NULL, NULL),
(2, 'Clothes', 'Rupees ₹', 100, 222002, 65, '5-10', 50, '2022-09-08 12:37:48', '2022-09-09 11:35:58', '2022-09-09 11:35:58'),
(3, 'Electronics', 'Rupees ₹', 50, 222001, 120, '0-5', 50, '2022-09-09 11:37:35', NULL, NULL),
(4, 'Electronics', 'Rupees ₹', 50, 222111, 100, '5-10', 70, '2022-09-09 11:37:35', '2022-09-09 11:37:52', '2022-09-09 11:37:52');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_product`
--

CREATE TABLE `shipping_product` (
  `id` int(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `fixed_value` bigint(20) NOT NULL,
  `pincode` bigint(20) NOT NULL,
  `pin_value` bigint(20) NOT NULL,
  `range_km` varchar(255) NOT NULL,
  `range_value` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping_product`
--

INSERT INTO `shipping_product` (`id`, `category`, `currency`, `fixed_value`, `pincode`, `pin_value`, `range_km`, `range_value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Redmi 9 Pro', 'Rupees ₹', 50, 222002, 40, '0-5', 30, '2022-09-09 12:05:46', NULL, NULL),
(2, 'Redmi 9 Pro', 'Rupees ₹', 50, 222001, 50, '5-10', 60, '2022-09-09 12:05:46', NULL, NULL),
(3, 'Trimmer', 'Rupees ₹', 40, 222002, 45, '0-5', 60, '2022-09-09 12:08:24', NULL, NULL);

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
-- Indexes for table `category`
--
ALTER TABLE `category`
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
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount_category`
--
ALTER TABLE `discount_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount_order`
--
ALTER TABLE `discount_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `freeship`
--
ALTER TABLE `freeship`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_category`
--
ALTER TABLE `shipping_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_product`
--
ALTER TABLE `shipping_product`
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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `discount_category`
--
ALTER TABLE `discount_category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `discount_order`
--
ALTER TABLE `discount_order`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `freeship`
--
ALTER TABLE `freeship`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `shipping_category`
--
ALTER TABLE `shipping_category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shipping_product`
--
ALTER TABLE `shipping_product`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
