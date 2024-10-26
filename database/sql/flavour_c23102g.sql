-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2024 at 06:29 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flavour_c2310g`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--
DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--
DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `created_at`, `updated_at`) VALUES
(1, 'Masala', '2024-10-17 15:39:48', NULL),
(2, 'Paste', '2024-10-16 15:39:53', NULL),
(3, 'Herb', '2024-10-17 15:39:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--
DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_10_01_160324_create_categories_table', 1),
(5, '2024_10_01_164803_create_products_table', 1),
(6, '2024_10_01_170150_create_orders_table', 1),
(7, '2024_10_01_170318_create_order_details_table', 1),
(8, '2024_10_01_170430_create_photos_table', 1),
(9, '2024_10_01_170511_create_ratings_table', 1),
(10, '2024_10_22_091532_create_password_reset_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--
DROP TABLE IF EXISTS `order_details`;
CREATE TABLE `order_details` (
  `detail_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--
DROP TABLE IF EXISTS `photos`;
CREATE TABLE `photos` (
  `photo_id` bigint(20) UNSIGNED NOT NULL,
  `photo_name` varchar(255) NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`photo_id`, `photo_name`, `product_id`, `created_at`, `updated_at`) VALUES
(7, '1729423474_masala_chicken1.jpg', 8, '2024-10-19 14:24:34', '2024-10-19 14:24:34'),
(8, '1729423483_masala_chicken2.jpg', 8, '2024-10-19 14:24:43', '2024-10-19 14:24:43'),
(10, '1729423873_masala_chicken3.png', 8, '2024-10-19 14:31:13', '2024-10-19 14:31:13'),
(11, '1729424397_masala_sajib1.jpg', 9, '2024-10-19 14:39:57', '2024-10-19 14:39:57'),
(12, '1729424408_masala_sajib2.jpg', 9, '2024-10-19 14:40:08', '2024-10-19 14:40:08'),
(13, '1729424527_masala_sajib3.jpg', 9, '2024-10-19 14:42:07', '2024-10-19 14:42:07'),
(16, '1729424936_masala_mutton1.jpg', 10, '2024-10-19 14:48:56', '2024-10-19 14:48:56'),
(17, '1729424977_masala_sambar1.jpg', 11, '2024-10-19 14:49:37', '2024-10-19 14:49:37'),
(18, '1729424985_masala_mutton2.jpg', 10, '2024-10-19 14:49:45', '2024-10-19 14:49:45'),
(19, '1729424996_masala_mutton3.jpg', 10, '2024-10-19 14:49:56', '2024-10-19 14:49:56'),
(20, '1729425108_masala_sambar2.jpg', 11, '2024-10-19 14:51:48', '2024-10-19 14:51:48'),
(21, '1729425117_masala_mutton3.jpg', 11, '2024-10-19 14:51:57', '2024-10-19 14:51:57'),
(22, '1729429227_herb_chilli1.jpg', 12, '2024-10-19 16:00:27', '2024-10-19 16:00:27'),
(23, '1729429234_herb_chilli2.jpg', 12, '2024-10-19 16:00:34', '2024-10-19 16:00:34'),
(24, '1729429241_herb_chilli3.jpg', 12, '2024-10-19 16:00:41', '2024-10-19 16:00:41'),
(25, '1729429299_herb_mint1.jpg', 13, '2024-10-19 16:01:39', '2024-10-19 16:01:39'),
(26, '1729429307_herb_mint2.jpg', 13, '2024-10-19 16:01:47', '2024-10-19 16:01:47'),
(27, '1729429314_herb_mint3.jpg', 13, '2024-10-19 16:01:54', '2024-10-19 16:01:54'),
(28, '1729429440_herb_oregano1.jpg', 14, '2024-10-19 16:04:00', '2024-10-19 16:04:00'),
(29, '1729429454_herb_oregano2.jpg', 14, '2024-10-19 16:04:14', '2024-10-19 16:04:14'),
(30, '1729429462_herb_oregano3.jpg', 14, '2024-10-19 16:04:22', '2024-10-19 16:04:22'),
(31, '1729429529_herb_lemongrass1.jpg', 15, '2024-10-19 16:05:29', '2024-10-19 16:05:29'),
(32, '1729429541_herb_lemongrass2.jpg', 15, '2024-10-19 16:05:41', '2024-10-19 16:05:41'),
(34, '1729429595_herb_lemongrass3.jpg', 15, '2024-10-19 16:06:35', '2024-10-19 16:06:35'),
(35, '1729429718_paste_tamarind1.jpg', 16, '2024-10-19 16:08:38', '2024-10-19 16:08:38'),
(36, '1729429737_paste_tamarind2.jpg', 16, '2024-10-19 16:08:57', '2024-10-19 16:08:57'),
(37, '1729429745_paste_tamarind3.jpg', 16, '2024-10-19 16:09:05', '2024-10-19 16:09:05'),
(38, '1729429772_paste_garlic1.jpg', 17, '2024-10-19 16:09:32', '2024-10-19 16:09:32'),
(39, '1729429782_paste_garlic2.jpg', 17, '2024-10-19 16:09:42', '2024-10-19 16:09:42'),
(40, '1729429790_paste_garlic3.jpg', 17, '2024-10-19 16:09:50', '2024-10-19 16:09:50'),
(41, '1729429820_paste_curry1.jpg', 18, '2024-10-19 16:10:20', '2024-10-19 16:10:20'),
(42, '1729429843_paste_curry2.jpg', 18, '2024-10-19 16:10:43', '2024-10-19 16:10:43'),
(43, '1729429855_paste_curry3.jpg', 18, '2024-10-19 16:10:55', '2024-10-19 16:10:55'),
(44, '1729429887_paste_nonvegcurry1.jpg', 19, '2024-10-19 16:11:27', '2024-10-19 16:11:27'),
(45, '1729429897_paste_nonvegcurry2.jpg', 19, '2024-10-19 16:11:37', '2024-10-19 16:11:37'),
(46, '1729429908_paste_nonvegcurry3.jpg', 19, '2024-10-19 16:11:48', '2024-10-19 16:11:48');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `discount_price` decimal(8,2) DEFAULT 0.00,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`, `price`, `category_id`, `quantity`, `discount_price`, `status`, `created_at`, `updated_at`) VALUES
(8, 'Chicken Masala', 'Chicken Masala', '1729423474_masala_chicken1.jpg', 8.90, 1, 100, 0.00, '1', '2024-10-20 04:24:34', '2024-10-20 04:24:34'),
(9, 'Sajib Masala', 'Sajib Masala', '1729424408_masala_sajib2.jpg', 5.40, 1, 100, 0.00, '1', '2024-10-20 04:39:57', '2024-10-20 06:20:22'),
(10, 'Mutton Masala', 'Mutton Masala', '1729424936_masala_mutton1.jpg', 7.50, 1, 100, 0.30, '1', '2024-10-20 04:48:56', '2024-10-20 04:48:56'),
(11, 'Sambar Masala', 'Sambar Masala', '1729424977_masala_sambar1.jpg', 4.60, 1, 100, 0.00, '1', '2024-10-20 04:49:37', '2024-10-20 04:49:37'),
(12, 'Chilli Flakes', 'Chilli Flakes', '1729429227_herb_chilli1.jpg', 5.60, 3, 100, 0.00, '1', '2024-10-20 06:00:27', '2024-10-20 06:00:27'),
(13, 'Mint', 'Mint', '1729429299_herb_mint1.jpg', 9.60, 3, 100, 0.30, '1', '2024-10-20 06:01:39', '2024-10-20 06:01:39'),
(14, 'Oregano', 'Oregano', '1729429440_herb_oregano1.jpg', 10.20, 3, 100, 0.00, '1', '2024-10-20 06:04:00', '2024-10-20 06:04:00'),
(15, 'Lemon Grass', 'Lemongrass', '1729429529_herb_lemongrass1.jpg', 4.30, 3, 100, 0.00, '1', '2024-10-20 06:05:29', '2024-10-20 06:06:14'),
(16, 'Tamarind Paste', 'Tamarind Paste', '1729429718_paste_tamarind1.jpg', 8.50, 2, 100, 0.20, '1', '2024-10-20 06:08:38', '2024-10-20 06:08:38'),
(17, 'Garlic Paste', 'Garlic Paste', '1729429772_paste_garlic1.jpg', 9.40, 2, 100, 0.00, '1', '2024-10-20 06:09:32', '2024-10-20 06:09:32'),
(18, 'Veg Curry Paste', 'Veg Curry Paste', '1729429820_paste_curry1.jpg', 15.40, 2, 100, 0.00, '1', '2024-10-20 06:10:20', '2024-10-20 06:10:20'),
(19, 'Non Veg Curry Paste', 'Non Veg Curry Paste', '1729429887_paste_nonvegcurry1.jpg', 15.30, 2, 99, 0.00, '1', '2024-10-20 06:11:27', '2024-10-20 06:32:20');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--
DROP TABLE IF EXISTS `ratings`;
CREATE TABLE `ratings` (
  `rate_id` bigint(20) UNSIGNED NOT NULL,
  `rate_comment` text DEFAULT NULL,
  `rate_score` double DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `usertype` enum('user','admin') NOT NULL DEFAULT 'user',
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `user_status` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `usertype`, `phone`, `address`, `email_verified_at`, `password`, `user_status`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'admin@gmail.com', 'admin', '893487343487', 'efdvsdsds', '2024-10-07 20:28:34', '$2y$12$OqZzHohp8dhmKCFx5FwoZONUuYoWEzvERBRVwtEYTYu2ZbNzviSHG', 1, 'EtizZkP2xM70PzV3JB6iNAc0vPVaEc0m33HDp0B7Pw1vwEptNiUnj7k0hasw', '2024-10-07 20:28:10', '2024-10-07 20:28:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD KEY `password_reset_tokens_email_index` (`email`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`photo_id`),
  ADD KEY `photos_product_id_foreign` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rate_id`),
  ADD KEY `ratings_user_id_foreign` (`user_id`),
  ADD KEY `ratings_product_id_foreign` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `detail_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `photo_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rate_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
