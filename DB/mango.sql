-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2020 at 11:07 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mango`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_orderdetails`
--

CREATE TABLE `admin_orderdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kg` int(11) NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_orderdetails`
--

INSERT INTO `admin_orderdetails` (`id`, `product_id`, `order`, `product`, `price`, `qty`, `kg`, `total`, `created_at`, `updated_at`) VALUES
(13, '9', '8', 'Beef', '550', '1', 1, '550', '2020-07-07 06:00:55', '2020-07-07 06:00:55'),
(14, '9', '9', 'Beef', '550', '1', 1, '550', '2020-07-07 06:08:39', '2020-07-07 06:08:39'),
(15, '7', '10', 'Begun', '50', '4', 4, '200', '2020-07-08 05:04:14', '2020-07-08 05:04:14'),
(16, '6', '10', 'Potol', '50', '7', 7, '350', '2020-07-08 05:04:14', '2020-07-08 05:04:14'),
(17, '10', '11', 'Nobel Book', '100', '8', 0, '800', '2020-07-15 17:25:06', '2020-07-15 17:25:06');

-- --------------------------------------------------------

--
-- Table structure for table `admin_orders`
--

CREATE TABLE `admin_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalkg` int(11) NOT NULL,
  `shipcost` int(11) NOT NULL,
  `packcost` int(11) NOT NULL,
  `status_type` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_orders`
--

INSERT INTO `admin_orders` (`id`, `invoice`, `customer`, `shipping`, `total`, `payment`, `qty`, `totalkg`, `shipcost`, `packcost`, `status_type`, `created_at`, `updated_at`) VALUES
(1, '87237', '5', '5', '6396', '6396', '4', 0, 0, 0, 0, '2020-05-16 09:45:39', '2020-05-16 09:45:39'),
(2, '73503', '7', '6', '7280', '7280', '7', 0, 0, 0, 0, '2020-07-07 10:00:28', '2020-05-16 16:18:32'),
(3, '69170', '4', '8', '13824', '13824', '10', 136, 0, 0, 0, '2020-05-16 18:18:59', '2020-05-16 18:18:59'),
(4, '97959', '6', '9', '16840', '16840', '8', 180, 0, 0, 0, '2020-05-16 18:31:51', '2020-05-16 18:31:51'),
(5, '51769', '6', '10', '9388', '9388', '7', 92, 1380, 276, 4, '2020-05-16 19:01:22', '2020-07-07 05:06:04'),
(6, '57555', '10', '11', '568', '568', '1', 1, 15, 3, 3, '2020-07-02 10:06:19', '2020-07-07 05:02:20'),
(7, '39499', '14', '15', '175', '175', '2', 2, 75, 0, 2, '2020-07-03 04:29:22', '2020-07-07 04:55:13'),
(8, '24854', '12', '16', '625', '625', '1', 1, 75, 0, 3, '2020-07-07 06:00:55', '2020-07-07 06:02:22'),
(9, '31824', '12', '17', '625', '0', '1', 1, 75, 0, 0, '2020-07-08 06:08:39', '2020-07-07 06:08:39'),
(10, '8946', '12', '18', '625', '625', '11', 11, 75, 0, 1, '2020-07-08 05:04:14', '2020-07-08 09:20:04'),
(11, '71113', '12', '19', '875', '875', '8', 0, 75, 0, 4, '2020-07-15 17:25:06', '2020-07-15 17:27:50');

-- --------------------------------------------------------

--
-- Table structure for table `admin_payments`
--

CREATE TABLE `admin_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trxid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `send_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_payments`
--

INSERT INTO `admin_payments` (`id`, `order_id`, `pay_type`, `amount`, `trxid`, `send_no`, `created_at`, `updated_at`) VALUES
(1, '1', 'Bkash', '6396', 'rrrrrrr', '1318712782', '2020-05-16 09:45:40', '2020-05-16 09:45:40'),
(2, '2', 'Nagad', '7280', '4576rgffv', '1318712782', '2020-05-16 10:00:28', '2020-05-16 10:00:28'),
(3, '3', 'Rocket', '13824', 'efkjer734', '01318712782', '2020-05-16 18:18:59', '2020-05-16 18:18:59'),
(4, '4', 'Nagad', '16840', '4576rgffv', '1318712782', '2020-05-16 18:31:51', '2020-05-16 18:31:51'),
(5, '5', 'Rocket', '9388', '4576rgffv', '1318712782', '2020-05-16 19:01:22', '2020-05-16 19:01:22'),
(6, '6', 'delivery', '568', NULL, NULL, '2020-07-02 10:06:19', '2020-07-02 10:06:19'),
(7, '7', 'Rocket', '175', '4576rgffv', '01318712782', '2020-07-03 04:29:23', '2020-07-03 04:29:23'),
(8, '8', 'Cash', '625', NULL, NULL, '2020-07-07 06:00:55', '2020-07-07 06:00:55'),
(9, '9', 'Cash', '0', NULL, NULL, '2020-07-07 06:08:39', '2020-07-07 06:08:39'),
(10, '10', 'Bkash', '625', '4576rgffv', '01318712782', '2020-07-08 05:04:14', '2020-07-08 05:04:14'),
(11, '11', 'Bkash', '875', '4576rgffv', '01318712782', '2020-07-15 17:25:06', '2020-07-15 17:25:06');

-- --------------------------------------------------------

--
-- Table structure for table `admin_shippings`
--

CREATE TABLE `admin_shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courier` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_shippings`
--

INSERT INTO `admin_shippings` (`id`, `name`, `email`, `phone`, `division`, `district`, `courier`, `address`, `created_at`, `updated_at`) VALUES
(5, 'Nurul Islam Sayeed', 'abu.sayeed.diu@gmail.com', '01798493171', 'Rajshahi', 'Joypurhat', 'S.A.Paribahan', 'mirpur-13 block-B Road-4 house-28', '2020-05-16 08:07:21', '2020-05-16 08:07:21'),
(6, 'Nurul Islam Sayeed', 'abu.sayeed.diu@gmail.com', '01318712782', 'Rajshahi', 'Natore', 'S.A.Paribahan', 'mirpur-13 block-B Road-4 house-28', '2020-05-16 10:00:13', '2020-05-16 10:00:13'),
(7, 'Nurul Islam Sayeed', 'abu.sayeed.diu@gmail.com', '01798493171', 'Dhaka', 'Joypurhat', 'S.A.Paribahan', 'mirpur-13 block-B Road-4 house-28', '2020-05-16 10:04:24', '2020-05-16 10:04:24'),
(8, 'Nurul Islam Sayeed', 'abu.sayeed.diu@gmail.com', '01318712782', 'Dhaka', 'Pabna', 'Sundarban Courier', 'mirpur-13 block-B Road-4 house-28', '2020-05-16 18:18:43', '2020-05-16 18:18:43'),
(9, 'Hello World', NULL, '01318712782', 'Rajshahi', 'Rajshahi', 'S.A.Paribahan', 'mirpur-13 block-B Road-4 house-28', '2020-05-16 18:28:57', '2020-05-16 18:28:57'),
(10, 'Nurul Islam Sayeed', 'abu.sayeed.diu@gmail.com', '01798493171', 'Rajshahi', 'Natore', 'Sundarban Courier', 'mirpur-13 block-B Road-4 house-28', '2020-05-16 19:01:09', '2020-05-16 19:01:09'),
(11, 'Nurul Islam Sayeed', 'abu.sayeed.diu@gmail.com', '01798493171', 'Dhaka', 'Natore', NULL, 'mirpur-13 block-B Road-4 house-28', '2020-07-02 10:00:56', '2020-07-02 10:00:56'),
(12, 'Nurul Islam Sayeed', 'abu.sayeed.diu@gmail.com', '01798493171', 'Dhaka', 'Chapainawabganj', NULL, 'mirpur-13 block-B Road-4 house-28', '2020-07-03 04:03:05', '2020-07-03 04:03:05'),
(13, 'Nurul Islam Sayeed', 'abu.sayeed.diu@gmail.com', '01798493171', 'Rajshahi', 'Natore', NULL, 'mirpur-13 block-B Road-4 house-28', '2020-07-03 04:03:21', '2020-07-03 04:03:21'),
(14, 'Nurul Islam Sayeed', 'abu.sayeed.diu@gmail.com', '01798493171', 'Rajshahi', 'Pabna', NULL, 'mirpur-13 block-B Road-4 house-28', '2020-07-03 04:05:00', '2020-07-03 04:05:00'),
(15, 'Nurul Islam Sayeed', 'abu.sayeed.diu@gmail.com', '01798493171', 'Dhaka', 'Rajshahi', NULL, 'mirpur-13 block-B Road-4 house-28', '2020-07-03 04:27:15', '2020-07-03 04:27:15'),
(16, 'Nurul Islam Sayeed', 'abu.sayeed.diu@gmail.com', '01798493171', 'Rajshahi', 'Joypurhat', NULL, 'mirpur-13 block-B Road-4 house-28', '2020-07-07 06:00:48', '2020-07-07 06:00:48'),
(17, 'Nurul Islam Sayeed', 'abu.sayeed.diu@gmail.com', '01798493171', 'Rangpur', 'Chapainawabganj', NULL, 'mirpur-13 block-B Road-4 house-28', '2020-07-07 06:08:33', '2020-07-07 06:08:33'),
(18, 'Nurul Islam Sayeed', 'abu.sayeed.diu@gmail.com', '01798493171', 'Rajshahi', 'Tangail', NULL, 'mirpur-13 block-B Road-4 house-28', '2020-07-08 05:04:03', '2020-07-08 05:04:03'),
(19, 'Nurul Islam Sayeed', 'abu.sayeed.diu@gmail.com', '01798493171', 'Rajshahi', 'Joypurhat', NULL, 'mirpur-13 block-B Road-4 house-28', '2020-07-15 16:25:43', '2020-07-15 16:25:43');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `quota` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `image`, `quota`, `created_at`, `updated_at`) VALUES
(9, 'Vegetables', '', '', '2020-07-02 08:41:47', '2020-07-02 08:41:47'),
(10, 'Fruits', '', '', '2020-07-02 08:41:59', '2020-07-02 08:41:59'),
(11, 'Fish & Meat', '', '', '2020-07-02 08:42:14', '2020-07-02 08:42:14'),
(12, 'Fashion', '', '', '2020-07-02 08:42:30', '2020-07-02 08:42:30'),
(13, 'Bangladesh', 'public/image/5f5dda2f10759logo_small.png', 'Very good', '2020-07-02 08:42:48', '2020-09-13 08:42:39'),
(14, 'Honey & Ghree', '', '', '2020-07-02 08:44:00', '2020-07-02 08:44:00');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` int(255) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `free` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `mobile`, `password`, `status`, `type`, `free`, `free1`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 555, '$2y$10$hJ8g7HIgvVe1.OqBSZDky.yzRYCOlhJoRjd2OBdohenHBsZQDhmAi', '1', '1', NULL, NULL, '2020-05-11 09:39:45', '2020-05-13 09:20:17'),
(3, 'Sayeed Telecom', 1949384257, '$2y$10$rwDrxXMQrPNRoF2kEob3luZoE6Nym/7fgohJv6kmasmJAKxoxcQJC', '1', '2', NULL, NULL, '2020-05-11 09:41:10', '2020-05-11 09:41:10'),
(6, 'Mr. Maleq', 1670078232, '$2y$10$9DIEu8tgGq4AHmQUwqjTCeNAhUbYLVtIRJUoTwzlCfTr1ZZ1HWRPi', '1', '2', NULL, NULL, '2020-05-11 10:40:41', '2020-05-11 10:40:41'),
(7, 'Nurul Islam Sayeed', 1700000000, '$2y$10$LMVjY/78Nl63zuOpC7LpuO/7RfXbeO0JU5iehZI6IWZiS5aUz7oKK', '1', '2', NULL, NULL, '2020-05-13 09:38:16', '2020-05-13 09:38:16'),
(8, 'Nurul Islam Sayeed', 1670078231, '$2y$10$O9FgALV/UfStVkT.aZ5HsOkQkQgmM2RwSVY9vVPQCtObQMXaQoGl.', '1', '2', NULL, NULL, '2020-05-15 17:14:05', '2020-05-15 17:14:05'),
(9, 'Nurul Islam Sayeed', 1670078233, '$2y$10$AsmEDaMpDKSIvOfrZo9Dp.HkgyowxSHTQtT7xcccLd9LVRcHIcaG6', '1', '2', NULL, NULL, '2020-05-17 09:38:39', '2020-05-17 09:38:39'),
(10, 'Nurul Islam Sayeed', 1571232323, '$2y$10$yJVLUs7.9bwog16tSYStIuZ5UvsM6xceZHRRWe7oC6LDjp1LBZYlS', '1', '2', NULL, NULL, '2020-07-02 09:36:03', '2020-07-02 09:36:03'),
(11, 'Nurul Islam Sayeed', 1318712785, '$2y$10$Qz2gafaqj/WwHoCCZ3qSseH6KzAwJSd2rtGVP05sQag4flPbyMnZC', '1', '2', NULL, NULL, '2020-07-03 03:15:10', '2020-07-03 03:15:10'),
(12, 'Nurul Islam Sayeed', 1318712782, '$2y$10$9PoKv8SKTftM0leykkh/Ve4eFdvmppnemwVO0.84PFNVcftUCHL.u', '1', '2', NULL, NULL, '2020-07-03 03:15:27', '2020-07-03 04:33:58'),
(14, 'Nurul Islam Sayeed', 1700000002, '$2y$10$PwAxu7ojCm3XWyacOq4VGOnMcVpFRwjvx6mNRTVFDWSpYwfeFYMVy', '1', '2', NULL, NULL, '2020-07-03 04:19:25', '2020-07-03 04:19:25');

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
(1, '2020_05_10_223221_create_customers_table', 1),
(2, '2020_05_10_224500_create_sliders_table', 2),
(3, '2020_05_12_101439_create_categories_table', 3),
(4, '2020_05_12_111309_create_products_table', 4),
(5, '2020_05_13_132030_create_packages_table', 5),
(6, '2020_05_16_001240_create_admin_orders_table', 6),
(7, '2020_05_16_001251_create_admin_orderdetails_table', 6),
(8, '2020_05_16_001316_create_admin_shippings_table', 6),
(9, '2020_05_16_001351_create_admin_payments_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `one` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `three` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `price`, `weight`, `one`, `two`, `three`, `created_at`, `updated_at`) VALUES
(383443, 'Family', '1000', '2', 'Sweets 1.5 KG', 'Ghree 250 gm', 'Makkhon 250gm', '2020-05-13 07:46:18', '2020-07-03 02:59:32'),
(1394873, 'Official', '100', '20', 'Mollika 10 KG', 'Langra  5 KG', 'Gopalvog 5 KG', '2020-05-13 07:44:55', '2020-05-17 18:28:48'),
(2384347, 'Small Family', '500', '30', 'Mollika 10 KG', 'Langra  15 KG', 'Gopalvog 5 KG', '2020-05-13 07:45:45', '2020-05-17 18:28:31');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(2555) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `free` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `name`, `price`, `weight`, `size`, `stock`, `details`, `image`, `free`, `created_at`, `updated_at`) VALUES
(6, '9', 'Potol', '50', '1', '10 Pices Per KG', 'Available', 'Potol Is good Food', 'public/image/5efd9fa5aaaecunnamed.jpg', NULL, '2020-07-02 08:49:41', '2020-07-15 08:39:05'),
(7, '9', 'Begun', '50', '1', '5 pices per  KG', 'Available', 'Bugun Deshi', 'public/image/5efda32e2313eimages.jpg', NULL, '2020-07-02 09:04:46', '2020-07-15 08:38:48'),
(8, '11', 'Deshi Rui', '270', '1', '1-2 KG Per pices', 'Available', 'Rui Fish', 'public/image/5efda4b7cf9d7product-500x500.jpeg', NULL, '2020-07-02 09:11:19', '2020-07-15 08:38:56'),
(9, '11', 'Beef', '550', '1', 'Special Meat', 'Upcoming', 'Beef Special', 'public/image/5efda8a84b0ed3720.jpg', NULL, '2020-07-02 09:28:08', '2020-07-15 08:38:40'),
(10, '13', 'Nobel Book', '100', '0', '400 Pages', 'Upcoming', 'Hello This a book', 'public/image/5f0eb925eccfbleather-book-preview.png', NULL, '2020-07-15 08:07:02', '2020-07-15 08:33:50');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `header` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `header`, `title`, `details`, `image`, `created_at`, `updated_at`) VALUES
(1, 'কেন আমাদের আম কিনবেন ?', 'ঘরে বসেই আম কিনুন', 'পাকা আমের স্বাদ যেমন ভালো তেমনি গুনেও অসাধারন।চারিদিকে আমের মো মো গন্ধ। বাজারের ফলের দোকান গুলোতে এখন পাওয়া যাচ্ছে নানা জাতের আম। বাজার না এখন ঘরে বসেই আম কিনুন।', 'public/image/5ebc20941e89e1088-removebg-preview.png', '2020-05-11 11:27:41', '2020-05-14 07:40:32'),
(2, 'সম্পন্ন ফরমালিন মুক্ত', 'বাগান থেকে সরাসরি আপনার কাছে', 'আমরা সেরা মানের আম বাছাই করে দিয়ে থাকি।আমাদের নিজেদের বাগান থেকে পেড়ে সম্পন্ন ফরমালিন মুক্ত আম আপনার হাতে তুলে দিতে চাই।', 'public/image/5ebc211e28ee3hapus-mango-500x500-removebg-preview.png', '2020-05-11 11:29:20', '2020-05-13 17:03:53'),
(3, 'রাজশাহীর আম', 'আপনার জন্য আমাদের প্রচেষ্টা', 'আম একটি রসালো ও গ্রীষ্ম মণ্ডলীয় ফল। পাকলে এটিকে সরাসরি খাওয়া যায় কিংবা কাঁচা অবস্থায় আঁঁচার কিংবা চাটনি বানানো যায়। দুনিয়ায় নানা বৈচিত্র্যের আম রয়েছে, যার সবগুলো হয়তো আমাদের সুপার মার্কেটে পাওয়া যাবে না। আমরা আপনাকে সকল আম দিয়ে থাকবো', 'public/image/5ebc1e72ef51ahealth-benefits-of-mango-removebg-preview.png', '2020-05-11 12:03:19', '2020-05-13 17:17:37'),
(4, 'শুধু দেখতে না খেতেও দারুন', 'রাজশাহীর সেরা বাগানের সেরা আম', 'আমের জাত আমাদের দেশে জনপ্রিয় কতগুলো আমের জাত রয়েছে যেমন- গোপালভোগ, ল্যাংড়া, হাঁড়িভাঙা, ক্ষীরসাপাতি, হিমসাগর, ফজলি ও আশ্বিনা এসব। এ জাতগুলো ইদানীং বাণিজ্যিকভাবেও চাষাবাদ হচ্ছে।চাষ এর না সরাসরি বাগান থেকে আপনার কাছে ।', 'public/image/5ebc1af092c7c6652964_thumb.png', '2020-05-11 15:59:14', '2020-05-13 17:18:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_orderdetails`
--
ALTER TABLE `admin_orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_orders`
--
ALTER TABLE `admin_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_payments`
--
ALTER TABLE `admin_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_shippings`
--
ALTER TABLE `admin_shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
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
-- AUTO_INCREMENT for table `admin_orderdetails`
--
ALTER TABLE `admin_orderdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `admin_orders`
--
ALTER TABLE `admin_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `admin_payments`
--
ALTER TABLE `admin_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `admin_shippings`
--
ALTER TABLE `admin_shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2384348;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
