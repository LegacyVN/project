SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



INSERT INTO `categories` (`id`, `cat_name`, `created_at`, `updated_at`) VALUES
(1, 'Masala', '2024-10-17 15:39:48', NULL),
(2, 'Paste', '2024-10-16 15:39:53', NULL),
(3, 'Herb', '2024-10-17 15:39:55', NULL);


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
(21, '1729425117_masala_sambar3.jpg', 11, '2024-10-19 14:51:57', '2024-10-19 14:51:57'),
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

INSERT INTO `users` (`id`, `name`, `email`, `usertype`, `phone`, `address`, `email_verified_at`, `password`, `user_status`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'admin@gmail.com', 'admin', '893487343487', 'efdvsdsds', '2024-10-07 20:28:34', '$2y$12$OqZzHohp8dhmKCFx5FwoZONUuYoWEzvERBRVwtEYTYu2ZbNzviSHG', 1, '2MRruObRdJelEWE4yVENF1jnIgekYi0zefvRebd3sUnYQSJdIUeXEsIht1DW', '2024-10-07 20:28:10', '2024-10-07 20:28:34'),
(6, 'user', 'user@gmail.com', 'user', '893487343487', 'efdvsdsds', '2024-10-07 20:28:34', '$2y$12$OqZzHohp8dhmKCFx5FwoZONUuYoWEzvERBRVwtEYTYu2ZbNzviSHG', 1, 'TZNnp11PdIWm1tWnYb7p17WipiWXG4t3c6Hs3boJH4ZHkHvTRoeexw9LKw21', '2024-10-07 20:28:10', '2024-10-21 23:23:19');



INSERT INTO `orders` (`order_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(38, 6, 0, '2024-10-21 03:26:16', '2024-10-21 03:26:16'),
(43, 6, 1, '2024-10-21 05:05:22', '2024-10-21 05:05:53');


INSERT INTO `order_details` (`detail_id`, `order_id`, `product_id`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(32, 38, 18, 15.40, 1, '2024-10-21 03:26:16', '2024-10-21 03:26:16'),
(38, 43, 13, 9.60, 6, '2024-10-21 05:05:22', '2024-10-21 05:05:22');



INSERT INTO `ratings` (`rate_id`, `rate_comment`, `rate_score`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(18, 'I love this', 5, 6, 18, '2024-10-21 23:15:56', '2024-10-21 23:15:56');


COMMIT;
