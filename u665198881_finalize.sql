-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 11, 2023 at 05:03 AM
-- Server version: 10.6.11-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u665198881_finalize`
--

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fnz_account`
--

CREATE TABLE `fnz_account` (
  `id` int(10) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL DEFAULT '',
  `cash_blance` varchar(255) NOT NULL DEFAULT '',
  `credit_price` varchar(255) NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = ACTIVE , 1 = INACTIVE',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fnz_account`
--

INSERT INTO `fnz_account` (`id`, `heading`, `cash_blance`, `credit_price`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Demo', '$12.00', '$12.00', 0, '2021-09-20 16:55:58', '2021-09-20 16:59:55');

-- --------------------------------------------------------

--
-- Table structure for table `fnz_attributes`
--

CREATE TABLE `fnz_attributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `attr_name` varchar(255) NOT NULL DEFAULT '',
  `attr_slug` varchar(255) NOT NULL DEFAULT '',
  `category` int(11) NOT NULL DEFAULT 0,
  `role` bigint(20) NOT NULL COMMENT '1=admin,3=vendor',
  `adder_id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fnz_attributes`
--

INSERT INTO `fnz_attributes` (`id`, `attr_name`, `attr_slug`, `category`, `role`, `adder_id`, `created_at`, `updated_at`) VALUES
(1, 'Color', 'color', 1, 1, 1, '2021-09-20 14:26:51', '0000-00-00 00:00:00'),
(2, 'Size', 'size', 1, 1, 1, '2021-09-20 14:26:51', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fnz_attributes_values`
--

CREATE TABLE `fnz_attributes_values` (
  `id` int(10) UNSIGNED NOT NULL,
  `attr_id` int(11) NOT NULL,
  `attr_value` varchar(255) NOT NULL DEFAULT '',
  `attr_value_slug` varchar(255) NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = ACTIVE , 1 = INACTIVE',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fnz_attributes_values`
--

INSERT INTO `fnz_attributes_values` (`id`, `attr_id`, `attr_value`, `attr_value_slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Red', 'red', 0, '2021-09-20 14:26:51', '0000-00-00 00:00:00'),
(2, 1, 'Green', 'green', 0, '2021-09-20 14:26:51', '0000-00-00 00:00:00'),
(3, 1, 'Blue', 'blue', 0, '2021-09-20 14:26:51', '0000-00-00 00:00:00'),
(4, 2, 'Small', 'small', 0, '2021-09-20 14:26:51', '0000-00-00 00:00:00'),
(5, 2, 'Medium', 'medium', 0, '2021-09-20 14:26:51', '0000-00-00 00:00:00'),
(6, 2, 'Large', 'large', 0, '2021-09-20 14:26:51', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fnz_blogs`
--

CREATE TABLE `fnz_blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 1,
  `slug` varchar(255) NOT NULL,
  `heading` text NOT NULL DEFAULT '',
  `imgs` text NOT NULL DEFAULT '',
  `content` text NOT NULL DEFAULT '',
  `views` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = ACTIVE , 1 = INACTIVE',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fnz_blogs`
--

INSERT INTO `fnz_blogs` (`id`, `user_id`, `slug`, `heading`, `imgs`, `content`, `views`, `status`, `created_at`, `updated_at`) VALUES
(3, 1, 'test-dd', 'Test dd', '{\"0\":\"1632132436-7ff1550877c877f9ff512dbbf6c912d5.png\"}', 'demo', 0, 0, '2021-09-20 15:37:16', '2021-09-20 15:37:38'),
(4, 1, 'tournament', 'Tournament', '{\"0\":\"1632936675-b65d2026161aa287dd986916d9e98928.png\"}', '<p>rgtdgtdtgdt</p>', 0, 0, '2021-09-29 10:31:15', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fnz_brands`
--

CREATE TABLE `fnz_brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(255) NOT NULL DEFAULT '',
  `brand_slug` varchar(255) NOT NULL DEFAULT '',
  `logo` varchar(255) NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = ACTIVE , 1 = INACTIVE',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fnz_brands`
--

INSERT INTO `fnz_brands` (`id`, `brand_name`, `brand_slug`, `logo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Apple', 'apple', '', 0, '2021-09-20 14:26:51', '0000-00-00 00:00:00'),
(2, 'Google', 'google', '', 0, '2021-09-20 14:26:51', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fnz_categories`
--

CREATE TABLE `fnz_categories` (
  `cat_id` int(10) UNSIGNED NOT NULL,
  `cate_name` varchar(255) NOT NULL DEFAULT '',
  `slug` varchar(255) NOT NULL DEFAULT '',
  `table_slug` varchar(255) NOT NULL DEFAULT '',
  `description` text NOT NULL DEFAULT '',
  `cate_img` text NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = ACTIVE , 1 = INACTIVE',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fnz_categories`
--

INSERT INTO `fnz_categories` (`cat_id`, `cate_name`, `slug`, `table_slug`, `description`, `cate_img`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', 'electronics', 'electronics', 'electronics electronics electronics electronics', '', 0, '2021-09-20 14:26:51', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fnz_content_creators`
--

CREATE TABLE `fnz_content_creators` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `sub_title` varchar(255) NOT NULL DEFAULT '',
  `imgs` text NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = ACTIVE , 1 = INACTIVE',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fnz_content_creators`
--

INSERT INTO `fnz_content_creators` (`id`, `title`, `sub_title`, `imgs`, `status`, `created_at`, `updated_at`) VALUES
(1, 'demo', 'test', '1632132325_f1475428da16c2a7ed642be380d95d60.png', 0, '2021-09-20 10:05:25', '0000-00-00 00:00:00'),
(3, 'test', 'demosdfdfn', '1633327216_7266c5b47611203302066031297e7981.png', 0, '2021-10-04 06:00:16', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fnz_coupon`
--

CREATE TABLE `fnz_coupon` (
  `id` int(10) UNSIGNED NOT NULL,
  `coupon_code` varchar(255) NOT NULL DEFAULT '',
  `coupon_name` varchar(255) NOT NULL DEFAULT '',
  `adder_id` int(11) NOT NULL DEFAULT 0,
  `products` text NOT NULL DEFAULT '{}',
  `discount` int(11) NOT NULL DEFAULT 0,
  `limit_count` int(11) NOT NULL DEFAULT 0,
  `no_of_user` int(11) NOT NULL DEFAULT 0,
  `dis_type` int(11) NOT NULL DEFAULT 0 COMMENT '0 = FLAT , 1 = PERCENTAGE',
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = ACTIVE , 1 = INACTIVE',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fnz_excel`
--

CREATE TABLE `fnz_excel` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `cate_id` varchar(255) NOT NULL DEFAULT '',
  `subcate_ids` varchar(255) NOT NULL DEFAULT '',
  `brand_id` int(11) NOT NULL,
  `pro_name` varchar(255) NOT NULL DEFAULT '',
  `pro_slug` varchar(255) NOT NULL DEFAULT '',
  `short_desc` text NOT NULL DEFAULT '',
  `description` text NOT NULL DEFAULT '',
  `mrp` varchar(255) NOT NULL DEFAULT '',
  `sell_price` varchar(255) NOT NULL DEFAULT '',
  `SKU` varchar(255) NOT NULL DEFAULT '' COMMENT 'Barcode',
  `tags` varchar(255) NOT NULL DEFAULT '',
  `weight` varchar(255) NOT NULL DEFAULT '' COMMENT '(KG)',
  `dimensions` varchar(255) NOT NULL DEFAULT '' COMMENT '(CM)',
  `country` varchar(255) NOT NULL DEFAULT '',
  `latitude` varchar(255) NOT NULL DEFAULT '',
  `longitude` varchar(255) NOT NULL DEFAULT '',
  `main_image` text NOT NULL DEFAULT '',
  `gallery` text NOT NULL DEFAULT '',
  `pro_video` text NOT NULL DEFAULT '',
  `product_type` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Simple , 1 = Variable',
  `meta_title` text NOT NULL DEFAULT '',
  `meta_description` text NOT NULL DEFAULT '',
  `views` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = ACTIVE , 1 = INACTIVE',
  `inventory` text NOT NULL DEFAULT '',
  `inventory_id` int(11) NOT NULL,
  `stocks` int(11) NOT NULL DEFAULT 0,
  `avail_status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = ACTIVE , 1 = INACTIVE',
  `cat_id` int(11) NOT NULL,
  `attr_id` int(11) NOT NULL,
  `variant_id` int(11) NOT NULL,
  `attr_val_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fnz_faqs`
--

CREATE TABLE `fnz_faqs` (
  `id` int(10) UNSIGNED NOT NULL,
  `cate_id` int(11) NOT NULL DEFAULT 0,
  `heading` text NOT NULL DEFAULT '',
  `content` text NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = ACTIVE , 1 = INACTIVE',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fnz_faqs`
--

INSERT INTO `fnz_faqs` (`id`, `cate_id`, `heading`, `content`, `status`, `created_at`, `updated_at`) VALUES
(2, 0, 'What are the different data types present in C++?', 'use data-type during declaration to restrict the type of data to be stored. Therefore, we can say that data types are used to tell the variables the type of data it can store. Whenever a variable is defined in C++, the compiler allocates some memory for that variable based on the data-type with which it is declared. Every data type requires a different amount of memory', 0, '2021-09-22 17:23:53', '2021-09-22 18:24:28'),
(3, 0, 'What are class and object in C++?', 'use data-type during declaration to restrict the type of data to be stored. Therefore, we can say that data types are used to tell the variables the type of data it can store. Whenever a variable is defined in C++, the compiler allocates some memory for that variable based on the data-type with which it is declared. Every data type requires a different amount of memory.', 0, '2021-09-22 17:25:39', '2021-09-22 18:25:01');

-- --------------------------------------------------------

--
-- Table structure for table `fnz_home_page`
--

CREATE TABLE `fnz_home_page` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `heading` text NOT NULL DEFAULT '',
  `content` text NOT NULL DEFAULT '',
  `image` varchar(255) NOT NULL DEFAULT '',
  `urls` text NOT NULL DEFAULT '',
  `type` varchar(255) NOT NULL DEFAULT '',
  `page_name` varchar(255) NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fnz_home_page`
--

INSERT INTO `fnz_home_page` (`id`, `name`, `heading`, `content`, `image`, `urls`, `type`, `page_name`, `created_at`, `updated_at`) VALUES
(16, 'banner', 'FINALIZE TOURNAMENTS', 'FOR ALL SKILL LEVELS', '1632212248_035f834109b6c049e51f85c59bf40ca0.png', '', 'section-1', 'home', '2021-09-20 16:30:18', '2021-09-21 13:47:28');

-- --------------------------------------------------------

--
-- Table structure for table `fnz_inventory`
--

CREATE TABLE `fnz_inventory` (
  `id` int(10) UNSIGNED NOT NULL,
  `pro_id` int(11) NOT NULL,
  `inventory` text NOT NULL DEFAULT '',
  `inventory_id` int(11) NOT NULL,
  `mrp` varchar(255) NOT NULL DEFAULT '',
  `sell_price` varchar(255) NOT NULL DEFAULT '',
  `stocks` int(11) NOT NULL DEFAULT 0,
  `avail_status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = ACTIVE , 1 = INACTIVE',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fnz_payment`
--

CREATE TABLE `fnz_payment` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `amount` varchar(255) NOT NULL,
  `payment_id` varchar(255) NOT NULL DEFAULT '',
  `razarpay_id` varchar(255) NOT NULL DEFAULT '',
  `payment_done` varchar(255) NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = ACTIVE , 1 = INACTIVE',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fnz_payment`
--

INSERT INTO `fnz_payment` (`id`, `name`, `amount`, `payment_id`, `razarpay_id`, `payment_done`, `status`, `created_at`, `updated_at`) VALUES
(17, ' PHP Developer', '2000', 'order_I0mDFphXvNpkmQ', 'pay_I0mDgQcrQMcrpo', 'true', 0, '2021-09-23 10:07:21', '2021-09-24 12:04:18'),
(18, 'test', '2999', 'order_I0npnZoGzWTD5f', 'pay_I0nq1gqzgIKs99', 'true', 0, '2021-09-23 11:42:32', '2021-09-24 12:04:24'),
(19, 'aman', '2000', 'order_I39haS6yCwC78K', 'pay_I39jrYtqQHnEtU', 'true', 0, '2021-09-29 10:22:45', '2021-09-29 10:25:05'),
(20, 'gtghrth', '2000', 'order_I39rQUzSZxdJAE', 'pay_I39rzhBUKtkcPC', 'true', 0, '2021-09-29 10:32:04', '2021-09-29 10:32:43'),
(21, 'sdfgsfg', '2000', 'order_I3YNrlAwVmSvbJ', 'null', 'null', 0, '2021-09-30 10:31:27', '0000-00-00 00:00:00'),
(22, 'a', '10', 'order_I4TicMQHkZg3e2', 'null', 'null', 0, '2021-10-02 13:06:19', '0000-00-00 00:00:00'),
(23, 'Sara Test Demo', '30000', 'order_I5XWmtgcgzVucn', 'pay_I5XX6gx0eUmKc3', 'true', 0, '2021-10-05 05:28:54', '2021-10-05 05:29:27'),
(24, 'Sara Test Demo', '2999', 'order_I5Xc47JszYQ25t', 'null', 'null', 0, '2021-10-05 05:33:54', '0000-00-00 00:00:00'),
(25, 'Sara Test Demo', '2999', 'order_I5XcWwrvheZX4d', 'null', 'null', 0, '2021-10-05 05:34:20', '0000-00-00 00:00:00'),
(26, 'Sara Test Demo', '2999', 'order_I5Xd8b1PVCRd7Q', 'pay_I5XdMnE23g1pJU', 'true', 0, '2021-10-05 05:34:54', '2021-10-05 05:35:11'),
(27, 'VS POT', '5000', 'order_I5Y9aUBpdKXps4', 'null', 'null', 0, '2021-10-05 06:05:38', '0000-00-00 00:00:00'),
(28, 'VS POT', '5000', 'order_I5YA32LWB3bWDM', 'null', 'null', 0, '2021-10-05 06:06:04', '0000-00-00 00:00:00'),
(29, 'Sara Test Demo', '2999', 'order_I5YAQPr4Ifnfre', 'null', 'null', 0, '2021-10-05 06:06:25', '0000-00-00 00:00:00'),
(30, 'VS POT', '5000', 'order_I5YBJFLKQo4xXh', 'null', 'null', 0, '2021-10-05 06:07:15', '0000-00-00 00:00:00'),
(31, 'Sara Test Demo', '2999', 'order_I5YGZo8bnvSiYg', 'null', 'null', 0, '2021-10-05 06:12:15', '0000-00-00 00:00:00'),
(32, 'Sara Test Demo', '2999', 'order_I5YHfCMg7xHTAZ', 'null', 'null', 0, '2021-10-05 06:13:16', '0000-00-00 00:00:00'),
(33, 'Sara Test Demo', '2999', 'order_I5YIvNn4MFXx0F', 'null', 'null', 0, '2021-10-05 06:14:28', '0000-00-00 00:00:00'),
(34, 'Sara Test Demo', '2999', 'order_I5YMDT52e7YOCx', 'null', 'null', 0, '2021-10-05 06:17:35', '0000-00-00 00:00:00'),
(35, 'Sara Test Demo', '2999', 'order_I5YOT4iBjvqaaI', 'null', 'null', 0, '2021-10-05 06:19:43', '0000-00-00 00:00:00'),
(36, 'Sara Test Demo', '2999', 'order_I5bIEmRRjwNvc6', 'pay_I5bIN4TZ7WXmyd', 'true', 0, '2021-10-05 09:09:54', '2021-10-05 09:10:06'),
(37, 'Test Demo STS', '25000', 'order_IIzwOksEi63vNt', 'null', 'null', 0, '2021-11-08 05:43:35', '0000-00-00 00:00:00'),
(38, 'Test Demo STS', '25000', 'order_IIzx0inAkjIGK7', 'null', 'null', 0, '2021-11-08 05:44:10', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fnz_products`
--

CREATE TABLE `fnz_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `cate_id` varchar(255) NOT NULL DEFAULT '',
  `subcate_ids` varchar(255) NOT NULL DEFAULT '',
  `brand_id` int(11) NOT NULL,
  `pro_name` varchar(255) NOT NULL DEFAULT '',
  `pro_slug` varchar(255) NOT NULL DEFAULT '',
  `short_desc` text NOT NULL DEFAULT '',
  `description` text NOT NULL DEFAULT '',
  `mrp` varchar(255) NOT NULL DEFAULT '',
  `sell_price` varchar(255) NOT NULL DEFAULT '',
  `SKU` varchar(255) NOT NULL DEFAULT '' COMMENT 'Barcode',
  `tags` varchar(255) NOT NULL DEFAULT '',
  `weight` varchar(255) NOT NULL DEFAULT '' COMMENT '(KG)',
  `dimensions` varchar(255) NOT NULL DEFAULT '' COMMENT '(CM)',
  `country` varchar(255) NOT NULL DEFAULT '',
  `latitude` varchar(255) NOT NULL DEFAULT '',
  `longitude` varchar(255) NOT NULL DEFAULT '',
  `main_image` text NOT NULL DEFAULT '',
  `gallery` text NOT NULL DEFAULT '',
  `pro_video` text NOT NULL DEFAULT '',
  `product_type` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Simple , 1 = Variable',
  `meta_title` text NOT NULL DEFAULT '',
  `meta_description` text NOT NULL DEFAULT '',
  `views` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = ACTIVE , 1 = INACTIVE',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fnz_pro_relation`
--

CREATE TABLE `fnz_pro_relation` (
  `id` int(10) UNSIGNED NOT NULL,
  `pro_id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `attr_id` int(11) NOT NULL,
  `attr_value_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = ACTIVE , 1 = INACTIVE',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fnz_rating`
--

CREATE TABLE `fnz_rating` (
  `id` int(10) UNSIGNED NOT NULL,
  `rater_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL DEFAULT 0,
  `comment` text NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = ACTIVE , 1 = INACTIVE',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fnz_settings`
--

CREATE TABLE `fnz_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT '',
  `details` text NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = ACTIVE , 1 = INACTIVE',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fnz_settings`
--

INSERT INTO `fnz_settings` (`id`, `type`, `details`, `status`, `created_at`, `updated_at`) VALUES
(1, 'paypal', '{\"paypal_client_id\":\"Test\",\"paypal_secret_id\":\"Test\"}', 1, '2021-09-20 08:56:52', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fnz_signup`
--

CREATE TABLE `fnz_signup` (
  `id` int(10) UNSIGNED NOT NULL,
  `otp` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `address` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `players_id` varchar(255) NOT NULL DEFAULT '',
  `phone` varchar(255) NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fnz_signup`
--

INSERT INTO `fnz_signup` (`id`, `otp`, `name`, `email`, `address`, `password`, `players_id`, `phone`, `created_at`, `updated_at`) VALUES
(1, 0, 'test', 'yogiaman704@gmail.com', 'sdfgzsdvgf', '$2y$10$V.n5tOXK5fW2kLnpT0.NG.BFI.SSoiCErr5Wdcdx7mAchizIq4VFe', '', '9887484578', '2021-10-02 01:56:36', '2021-10-01 18:47:39'),
(2, 0, 'demo', 'testph13@gmail.com', 'jaipur', '$2y$10$20hPKkdcEtJToPCbXLnmsO9eYA8WTwE2K4Wfn/sIYQZF36CQkF/56', '', '8845112233', '2021-10-04 06:57:17', '0000-00-00 00:00:00'),
(3, 0, 'test', 'test12@gmail.com', 'sfdrf', '$2y$10$PzzqmA3FalJMMGxAxCk8u.O1itEa/D06aqNMc.4MFtgNIiigq7Wku', '', '8872818811', '2021-12-31 12:01:48', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fnz_social_users`
--

CREATE TABLE `fnz_social_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `facebook_url` varchar(255) NOT NULL DEFAULT '',
  `twitter_url` varchar(255) NOT NULL DEFAULT '',
  `linkedin_url` varchar(255) NOT NULL DEFAULT '',
  `instagram_url` varchar(255) NOT NULL DEFAULT '',
  `telegram_url` varchar(255) NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = ACTIVE , 1 = INACTIVE',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fnz_social_users`
--

INSERT INTO `fnz_social_users` (`id`, `facebook_url`, `twitter_url`, `linkedin_url`, `instagram_url`, `telegram_url`, `status`, `created_at`, `updated_at`) VALUES
(1, 'urlsdemo.in/facebook.com', 'urlsdemo.in/twiiter.com', 'urlsdemo.in/linkedin.url', 'urlsdemo.in/instagram.url', 'urlsdemo.in./telegram.com', 0, '2021-09-21 16:31:32', '2021-09-21 16:39:13');

-- --------------------------------------------------------

--
-- Table structure for table `fnz_subadmin_access`
--

CREATE TABLE `fnz_subadmin_access` (
  `id` int(10) UNSIGNED NOT NULL,
  `subadmin` int(11) NOT NULL,
  `fields` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fnz_subcategories`
--

CREATE TABLE `fnz_subcategories` (
  `subcat_id` int(10) UNSIGNED NOT NULL,
  `subcate_name` varchar(255) NOT NULL DEFAULT '',
  `cat_id` int(11) NOT NULL DEFAULT 0,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `sub_cate_slug` varchar(255) NOT NULL DEFAULT '',
  `description` text NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = ACTIVE , 1 = INACTIVE',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fnz_subcategories`
--

INSERT INTO `fnz_subcategories` (`subcat_id`, `subcate_name`, `cat_id`, `parent_id`, `sub_cate_slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mobile', 1, 0, 'mobile', 'electronics electronics electronics electronics', 0, '2021-09-20 14:26:51', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fnz_tables_info_pro`
--

CREATE TABLE `fnz_tables_info_pro` (
  `id` int(10) UNSIGNED NOT NULL,
  `cate_id` int(11) NOT NULL DEFAULT 0,
  `cate_table_name` varchar(255) NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fnz_tags`
--

CREATE TABLE `fnz_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `tag_name` varchar(255) NOT NULL DEFAULT '',
  `tag_slug` varchar(255) NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = ACTIVE , 1 = INACTIVE',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fnz_tags`
--

INSERT INTO `fnz_tags` (`id`, `tag_name`, `tag_slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Best', 'best', 0, '2021-09-20 14:26:51', '0000-00-00 00:00:00'),
(2, 'Good', 'good', 0, '2021-09-20 14:26:51', '0000-00-00 00:00:00'),
(3, 'New', 'new', 0, '2021-09-20 14:26:51', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fnz_template`
--

CREATE TABLE `fnz_template` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `heading` varchar(255) NOT NULL DEFAULT '',
  `content` text NOT NULL DEFAULT '',
  `img` varchar(255) NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = ACTIVE , 1 = INACTIVE',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fnz_tnc_privacy`
--

CREATE TABLE `fnz_tnc_privacy` (
  `id` int(10) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL DEFAULT '',
  `content` text NOT NULL DEFAULT '',
  `type` varchar(255) NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fnz_tnc_privacy`
--

INSERT INTO `fnz_tnc_privacy` (`id`, `heading`, `content`, `type`, `created_at`, `updated_at`) VALUES
(1, 'heading', 'content', 'terms', '2021-09-20 08:56:52', '0000-00-00 00:00:00'),
(2, 'heading', 'content', 'privacy', '2021-09-20 08:56:52', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fnz_tournament`
--

CREATE TABLE `fnz_tournament` (
  `id` int(10) UNSIGNED NOT NULL,
  `tournament_id` varchar(255) NOT NULL DEFAULT '',
  `tournament_name` varchar(255) NOT NULL DEFAULT '',
  `tournament_date` varchar(255) NOT NULL DEFAULT '',
  `tournament_time` varchar(255) NOT NULL DEFAULT '',
  `registration_start_date` varchar(255) NOT NULL DEFAULT '',
  `registration_end_date` varchar(255) NOT NULL DEFAULT '',
  `players` varchar(255) NOT NULL DEFAULT '',
  `amount` varchar(255) NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = ACTIVE , 1 = INACTIVE',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fnz_tournament`
--

INSERT INTO `fnz_tournament` (`id`, `tournament_id`, `tournament_name`, `tournament_date`, `tournament_time`, `registration_start_date`, `registration_end_date`, `players`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, '6CgekFi1XUy3vcm9u5tX', 'Test Demo STS', '2021-12-09', '12:00', '2021-12-30', '2021-12-31', '30', '25000', 0, '2021-09-24 11:23:59', '2021-12-31 11:59:35'),
(2, '2nsLoqrOVo8dDH9zoz8w', 'Sara Test Demo', '2021-10-10', '04:00', '2021-09-26', '2021-09-30', '60', '2999', 0, '2021-09-24 11:25:01', '2021-10-05 05:33:33'),
(3, '92wpFeirAfQ1Zvz9RWyy', 'VS POT', '2021-10-28', '11:25', '2021-09-24', '2021-09-26', '30', '5000', 0, '2021-09-24 11:26:45', '0000-00-00 00:00:00'),
(4, 'pGXAianDWBcVPw6NKdtP', 'Free Test', '2021-12-31', '14:30', '2021-12-30', '2021-12-31', '15', '25000', 0, '2021-09-24 11:27:57', '2021-12-31 12:03:17');

-- --------------------------------------------------------

--
-- Table structure for table `fnz_users`
--

CREATE TABLE `fnz_users` (
  `ID` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL DEFAULT '',
  `first_name` varchar(255) NOT NULL DEFAULT '',
  `last_name` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `dec_password` varchar(255) NOT NULL DEFAULT '',
  `mobile` varchar(255) NOT NULL DEFAULT '',
  `avatar` varchar(255) NOT NULL DEFAULT '',
  `google_id` varchar(255) NOT NULL DEFAULT '',
  `fb_id` varchar(255) NOT NULL DEFAULT '',
  `role_status` int(11) NOT NULL DEFAULT 4 COMMENT '1 = ADMIN , 2 = SUBADMIN , 3 = VENDOR, 4 = USER',
  `forget_key` varchar(255) NOT NULL DEFAULT '',
  `expire_forget_key` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `resend_otp_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `user_status` int(11) NOT NULL DEFAULT 1 COMMENT '0 = ACTIVE , 1 = INACTIVE',
  `login_status` int(11) NOT NULL DEFAULT 1 COMMENT '0 = ACTIVE , 1 = INACTIVE',
  `user_block_status` int(11) NOT NULL DEFAULT 1 COMMENT '0 = ACTIVE , 1 = INACTIVE',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fnz_users`
--

INSERT INTO `fnz_users` (`ID`, `username`, `first_name`, `last_name`, `email`, `password`, `dec_password`, `mobile`, `avatar`, `google_id`, `fb_id`, `role_status`, `forget_key`, `expire_forget_key`, `resend_otp_time`, `user_status`, `login_status`, `user_block_status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'super', 'admin', 'admin@gmail.com', '$2y$10$RuT.49et5L2y3V7eC4GvyeAyLguXcgpfBtqXGbdbFLNWSla9eEHdG', 'admin1234', '', '', '', '', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0, '2021-09-20 08:56:50', '0000-00-00 00:00:00'),
(2, 'cyrax', 'sir', 'cyrax', 'cyrax@gmail.com', '$2y$10$jkkCEZvLNfP6FlXWE8iJR.DiTlZ6qMtdWupw0UBoCknQBfbZ.c0X6', 'admin1234', '', '', '', '', 4, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0, '2021-09-20 08:56:51', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fnz_vendors`
--

CREATE TABLE `fnz_vendors` (
  `ven_id` int(10) UNSIGNED NOT NULL,
  `ven_slug` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `dec_password` varchar(255) NOT NULL DEFAULT '',
  `mobile` varchar(255) NOT NULL DEFAULT '',
  `avatar` varchar(255) NOT NULL DEFAULT '',
  `bio` text NOT NULL DEFAULT '',
  `login_type` varchar(255) NOT NULL DEFAULT 'email' COMMENT 'email, google, fb',
  `google_id` varchar(255) NOT NULL DEFAULT '',
  `fb_id` varchar(255) NOT NULL DEFAULT '',
  `role_status` int(11) NOT NULL DEFAULT 3 COMMENT '1 = ADMIN , 2 = SUBADMIN , 3 = VENDOR, 4 = USER',
  `forget_key` varchar(255) NOT NULL DEFAULT '',
  `expire_forget_key` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `vendor_status` int(11) NOT NULL DEFAULT 1 COMMENT '0 = ACTIVE , 1 = INACTIVE',
  `login_status` int(11) NOT NULL DEFAULT 1 COMMENT '0 = ACTIVE , 1 = INACTIVE',
  `vendor_block_status` int(11) NOT NULL DEFAULT 1 COMMENT '0 = ACTIVE , 1 = INACTIVE',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fnz_vendors`
--

INSERT INTO `fnz_vendors` (`ven_id`, `ven_slug`, `username`, `name`, `email`, `password`, `dec_password`, `mobile`, `avatar`, `bio`, `login_type`, `google_id`, `fb_id`, `role_status`, `forget_key`, `expire_forget_key`, `vendor_status`, `login_status`, `vendor_block_status`, `created_at`, `updated_at`) VALUES
(1, 'jack', 'jack', '', 'jack@gmail.com', '$2y$10$4Ec8iHGfcPvwySyDBodJ9uvBOCzFFvihB/Z4.B.dezdYwFAkj9n5m', 'admin1234', '', '', '', 'email', '', '', 3, '', '0000-00-00 00:00:00', 0, 1, 0, '2021-09-20 08:56:51', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2021_05_09_143156_fnz_users', 1),
(3, '2021_05_11_063637_fnz_categories', 1),
(4, '2021_05_12_093306_vendors', 1),
(5, '2021_05_18_095803_fnz_attributes', 1),
(6, '2021_05_19_061622_fnz_products', 1),
(7, '2021_05_20_052816_fnz_tnc_privacy', 1),
(8, '2021_05_20_081502_fnz_faqs', 1),
(9, '2021_05_20_083721_fnz_template', 1),
(10, '2021_05_21_060119_settings', 1),
(11, '2021_05_22_022330_fnz_blogs', 1),
(12, '2021_05_22_044325_fnz_brands', 1),
(13, '2021_05_22_071135_fnz_tags', 1),
(14, '2021_05_28_082820_fnz_tables_info_pro', 1),
(15, '2021_05_29_092159_fnz_subcategories', 1),
(16, '2021_06_04_034308_fnz_attributes_values', 1),
(17, '2021_06_10_074117_excel', 1),
(18, '2021_06_14_133757_subadmin_access', 1),
(19, '2021_06_19_032120_home-page', 1),
(20, '2021_06_22_090309_fnz_rating', 1),
(21, '2021_07_14_045522_fnz_inventory', 1),
(22, '2021_07_15_054427_fnz_pro_relation', 1),
(23, '2021_07_22_103137_fnz_coupon', 1),
(24, '2021_07_22_103200_fnz-coupon-used', 1),
(25, '2021_09_13_190407_create_flights_table', 1),
(26, '2021_09_13_190509_fnz_content_creators', 1),
(27, '2021_09_14_013855_fnz_tournament', 1),
(28, '2021_09_16_004501_rollback', 1),
(29, '2021_09_16_010838_fnz_account', 1),
(30, '2021_09_18_221103_fnz_social_users', 1),
(31, '2021_09_19_004636_fnz_payment', 1),
(32, '2021_09_20_130738_fnz_tournament', 2),
(33, '2021_09_21_113539_fnz_payment', 3),
(34, '2021_09_21_114255_fnz_payment', 4),
(35, '2021_09_22_044104_fnz_payment', 5),
(36, '2021_09_22_044616_fnz_payment', 6),
(37, '2021_09_24_055129_fnz_tournament', 7),
(38, '2021_09_29_184343_fnz_signup', 8),
(39, '2021_10_01_213038_fnz_signup', 9),
(40, '2021_10_01_224619_fnz_signup', 10);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fnz_account`
--
ALTER TABLE `fnz_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fnz_attributes`
--
ALTER TABLE `fnz_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fnz_attributes_values`
--
ALTER TABLE `fnz_attributes_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fnz_blogs`
--
ALTER TABLE `fnz_blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fnz_brands`
--
ALTER TABLE `fnz_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fnz_categories`
--
ALTER TABLE `fnz_categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `fnz_content_creators`
--
ALTER TABLE `fnz_content_creators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fnz_coupon`
--
ALTER TABLE `fnz_coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fnz_excel`
--
ALTER TABLE `fnz_excel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fnz_faqs`
--
ALTER TABLE `fnz_faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fnz_home_page`
--
ALTER TABLE `fnz_home_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fnz_inventory`
--
ALTER TABLE `fnz_inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fnz_payment`
--
ALTER TABLE `fnz_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fnz_products`
--
ALTER TABLE `fnz_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fnz_pro_relation`
--
ALTER TABLE `fnz_pro_relation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fnz_rating`
--
ALTER TABLE `fnz_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fnz_settings`
--
ALTER TABLE `fnz_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fnz_signup`
--
ALTER TABLE `fnz_signup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fnz_social_users`
--
ALTER TABLE `fnz_social_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fnz_subadmin_access`
--
ALTER TABLE `fnz_subadmin_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fnz_subcategories`
--
ALTER TABLE `fnz_subcategories`
  ADD PRIMARY KEY (`subcat_id`);

--
-- Indexes for table `fnz_tables_info_pro`
--
ALTER TABLE `fnz_tables_info_pro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fnz_tags`
--
ALTER TABLE `fnz_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fnz_template`
--
ALTER TABLE `fnz_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fnz_tnc_privacy`
--
ALTER TABLE `fnz_tnc_privacy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fnz_tournament`
--
ALTER TABLE `fnz_tournament`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fnz_users`
--
ALTER TABLE `fnz_users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `fnz_vendors`
--
ALTER TABLE `fnz_vendors`
  ADD PRIMARY KEY (`ven_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `flights`
--
ALTER TABLE `flights`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fnz_account`
--
ALTER TABLE `fnz_account`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fnz_attributes`
--
ALTER TABLE `fnz_attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fnz_attributes_values`
--
ALTER TABLE `fnz_attributes_values`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fnz_blogs`
--
ALTER TABLE `fnz_blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fnz_brands`
--
ALTER TABLE `fnz_brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fnz_categories`
--
ALTER TABLE `fnz_categories`
  MODIFY `cat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fnz_content_creators`
--
ALTER TABLE `fnz_content_creators`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fnz_coupon`
--
ALTER TABLE `fnz_coupon`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fnz_excel`
--
ALTER TABLE `fnz_excel`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fnz_faqs`
--
ALTER TABLE `fnz_faqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fnz_home_page`
--
ALTER TABLE `fnz_home_page`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `fnz_inventory`
--
ALTER TABLE `fnz_inventory`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fnz_payment`
--
ALTER TABLE `fnz_payment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `fnz_products`
--
ALTER TABLE `fnz_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fnz_pro_relation`
--
ALTER TABLE `fnz_pro_relation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fnz_rating`
--
ALTER TABLE `fnz_rating`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fnz_settings`
--
ALTER TABLE `fnz_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fnz_signup`
--
ALTER TABLE `fnz_signup`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fnz_social_users`
--
ALTER TABLE `fnz_social_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fnz_subadmin_access`
--
ALTER TABLE `fnz_subadmin_access`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fnz_subcategories`
--
ALTER TABLE `fnz_subcategories`
  MODIFY `subcat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fnz_tables_info_pro`
--
ALTER TABLE `fnz_tables_info_pro`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fnz_tags`
--
ALTER TABLE `fnz_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fnz_template`
--
ALTER TABLE `fnz_template`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fnz_tnc_privacy`
--
ALTER TABLE `fnz_tnc_privacy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fnz_tournament`
--
ALTER TABLE `fnz_tournament`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fnz_users`
--
ALTER TABLE `fnz_users`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fnz_vendors`
--
ALTER TABLE `fnz_vendors`
  MODIFY `ven_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
