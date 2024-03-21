-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 20, 2024 at 11:34 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `creative`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_11_28_124839_create_carts_table', 1),
(7, '2023_11_28_175605_products', 2),
(8, '2023_12_03_185904_carts', 3),
(9, '2023_12_10_190419_carts', 4),
(10, '2023_12_10_195433_add_category_to_products', 5),
(11, '2024_01_24_095217_add_image', 6),
(12, '2024_01_30_184807_create_orders_table', 7),
(13, '2024_01_30_190131_create_order_product_table', 7),
(14, '2024_02_02_032212_create_order_status_table', 8),
(15, '2024_02_18_180241_create_shoppingcart_table', 9),
(16, '2024_02_21_104516_add_total_to_orders', 10),
(17, '2024_02_21_104836_add_new_total_to_orders', 11),
(18, '2024_02_27_194449_add_quantity_to_products', 12),
(19, '2024_03_06_121411_create_reviews_table', 13),
(20, '2024_03_06_183247_create_product_review_table', 13),
(21, '2024_03_07_021716_add_updated_at_to_products', 13),
(22, '2024_03_13_203352_add_user_id_to_order_product', 14);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `billing_country` varchar(255) NOT NULL,
  `billing_address` varchar(255) NOT NULL,
  `billing_email` varchar(255) NOT NULL,
  `billing_total` double(8,2) NOT NULL,
  `shipped` tinyint(1) NOT NULL DEFAULT 0,
  `error` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `billing_country`, `billing_address`, `billing_email`, `billing_total`, `shipped`, `error`, `created_at`, `updated_at`) VALUES
(1, 1, 'uk', '56 Blue Road', 'david123@gmail.com', 0.00, 0, NULL, '2024-02-21 10:17:55', '2024-02-21 10:17:55'),
(2, 1, 'uk', '56 Red Road', 'david123@gmail.com', 0.00, 0, NULL, '2024-02-21 10:22:46', '2024-02-21 10:22:46'),
(3, 1, 'uk', '56 Green Road', 'david123@gmail.com', 0.00, 0, NULL, '2024-02-21 10:26:22', '2024-02-21 10:26:22'),
(4, 1, 'uk', '56 Black Road', 'david123@gmail.com', 0.00, 0, NULL, '2024-02-21 10:29:09', '2024-02-21 10:29:09'),
(5, 1, 'uk', '56 Black Road', 'david123@gmail.com', 23.98, 0, NULL, '2024-02-21 10:51:22', '2024-02-21 10:51:22'),
(6, 1, 'uk', '56 Black Road', 'david123@gmail.com', 23.98, 0, NULL, '2024-02-21 10:56:44', '2024-02-21 10:56:44'),
(7, 1, 'uk', '56 Black Road', 'david123@gmail.com', 23.98, 0, NULL, '2024-02-21 10:58:10', '2024-02-21 10:58:10'),
(8, 1, 'uk', '56 Black Road', 'david123@gmail.com', 23.98, 0, NULL, '2024-02-21 10:58:32', '2024-02-21 10:58:32'),
(9, 1, 'uk', '56 Black Road', 'david123@gmail.com', 23.98, 0, NULL, '2024-02-21 11:01:24', '2024-02-21 11:01:24'),
(10, 1, 'uk', '56 Black Road', 'david123@gmail.com', 23.98, 0, NULL, '2024-02-21 11:06:55', '2024-02-21 11:06:55'),
(11, 1, 'uk', '56 Blue Road', 'david123@gmail.com', 39.98, 0, NULL, '2024-02-21 19:45:29', '2024-02-21 19:45:29'),
(12, 1, 'uk', '56 Blue Road', 'david123@gmail.com', 23.98, 0, NULL, '2024-02-22 21:22:31', '2024-02-22 21:22:31'),
(13, 1, 'uk', '56 Blue Road', 'david123@gmail.com', 39.98, 0, NULL, '2024-02-26 13:58:24', '2024-02-26 13:58:24'),
(14, 1, 'uk', '56 Blue Road', 'david123@gmail.com', 29.99, 0, NULL, '2024-03-06 10:03:06', '2024-03-06 10:03:06'),
(15, 1, 'uk', '56 Black Road', 'david123@gmail.com', 59.98, 0, NULL, '2024-03-06 10:05:20', '2024-03-06 10:05:20'),
(16, 1, 'uk', '56 Blue Road', 'david123@gmail.com', 59.98, 0, NULL, '2024-03-06 10:25:43', '2024-03-06 10:25:43'),
(17, 1, 'uk', '56 Black Road', 'david123@gmail.com', 29.99, 0, NULL, '2024-03-07 02:02:19', '2024-03-07 02:02:19'),
(18, 1, 'uk', '56 Blue Road', 'david123@gmail.com', 9.99, 0, NULL, '2024-03-07 02:04:58', '2024-03-07 02:04:58'),
(19, 1, 'uk', '56 Blue Road', 'david123@gmail.com', 13.99, 0, NULL, '2024-03-07 02:12:42', '2024-03-07 02:12:42'),
(20, 1, 'uk', '56 Blue Road', 'david123@gmail.com', 13.99, 0, NULL, '2024-03-07 02:18:46', '2024-03-07 02:18:46'),
(21, 1, 'uk', '56 Blue Road', 'david123@gmail.com', 13.99, 0, NULL, '2024-03-07 02:19:14', '2024-03-07 02:19:14'),
(22, 1, 'uk', '56 Red Road', 'david123@gmail.com', 119.96, 0, NULL, '2024-03-07 02:24:26', '2024-03-07 02:24:26'),
(23, 21, 'uk', '123 road', 'user@gmail.com', 9.99, 0, NULL, '2024-03-13 10:51:08', '2024-03-13 10:51:08'),
(24, 21, 'uk', '123 road', 'user@gmail.com', 9.99, 0, NULL, '2024-03-13 10:51:56', '2024-03-13 10:51:56'),
(25, 21, 'uk', '546 road', 'user@gmail.com', 13.99, 0, NULL, '2024-03-13 10:54:32', '2024-03-13 10:54:32'),
(26, 21, 'uk', '123 road', 'user@gmail.com', 9.99, 0, NULL, '2024-03-18 11:35:12', '2024-03-18 11:35:12'),
(27, NULL, 'uk', '123 road', 'jeff@gmail.com', 9.99, 0, NULL, '2024-03-19 16:06:52', '2024-03-19 16:06:52'),
(28, NULL, 'uk', '123 road', 'jeff@gmail.com', 9.99, 0, NULL, '2024-03-19 16:07:22', '2024-03-19 16:07:22');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(10) UNSIGNED DEFAULT 0,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `quantity`, `status`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 10, 2, NULL, 'Pending', '2024-02-21 11:06:55', '2024-02-21 11:06:55', NULL),
(2, 10, 3, 43, 'Pending', '2024-02-21 11:06:55', '2024-02-21 11:06:55', NULL),
(3, 11, 1, NULL, 'Pending', '2024-02-21 19:45:29', '2024-02-21 19:45:29', NULL),
(4, 11, 2, NULL, 'Pending', '2024-02-21 19:45:29', '2024-02-21 19:45:29', NULL),
(5, 12, 2, NULL, 'Pending', '2024-02-22 21:22:31', '2024-02-22 21:22:31', NULL),
(6, 12, 3, NULL, 'Pending', '2024-02-22 21:22:31', '2024-02-22 21:22:31', NULL),
(7, 13, 2, NULL, 'Pending', '2024-02-26 13:58:24', '2024-02-26 13:58:24', NULL),
(8, 13, 1, NULL, 'Pending', '2024-02-26 13:58:24', '2024-02-26 13:58:24', NULL),
(9, 14, 1, NULL, 'Pending', '2024-03-06 10:03:06', '2024-03-06 10:03:06', NULL),
(10, 15, 1, NULL, 'Pending', '2024-03-06 10:05:20', '2024-03-06 10:05:20', NULL),
(11, 16, 1, NULL, 'Pending', '2024-03-06 10:25:43', '2024-03-06 10:25:43', NULL),
(12, 17, 1, NULL, 'Pending', '2024-03-07 02:02:19', '2024-03-07 02:02:19', NULL),
(13, 18, 2, NULL, 'Pending', '2024-03-07 02:04:58', '2024-03-07 02:04:58', NULL),
(14, 19, 3, NULL, 'Pending', '2024-03-07 02:12:42', '2024-03-07 02:12:42', NULL),
(15, 20, 3, NULL, 'Pending', '2024-03-07 02:18:46', '2024-03-07 02:18:46', NULL),
(16, 21, 3, NULL, 'Pending', '2024-03-07 02:19:14', '2024-03-07 02:19:14', NULL),
(17, 22, 1, NULL, 'Pending', '2024-03-07 02:24:26', '2024-03-07 02:24:26', NULL),
(18, 24, 2, NULL, 'Processed', '2024-03-13 10:51:56', '2024-03-13 13:05:01', NULL),
(19, 25, 3, NULL, 'Pending', '2024-03-13 10:54:32', '2024-03-13 10:54:32', NULL),
(20, 26, 2, NULL, 'Pending', '2024-03-18 11:35:12', '2024-03-18 11:35:12', 21),
(21, 28, 2, NULL, 'Pending', '2024-03-19 16:07:22', '2024-03-19 16:07:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('user@gmail.com', '$2y$12$UBNVOIS1zxepEg.5m.Vvz.MsXBWKVJQkHXuq0UdRGgbMPGaprx9.C', '2024-03-13 10:59:23');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 10,
  `file` varchar(255) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `quantity`, `file`, `category`, `image`, `updated_at`) VALUES
(1, 'Skateboard1', '29.99', 'Skull-inspired skateboard', 10, 'image1', NULL, NULL, '2024-03-07 02:24:26'),
(2, 'Wheel1', '9.99', 'Black-white wheel', 7, 'image2', NULL, NULL, '2024-03-19 16:07:22'),
(3, 'Truck1', '13.99', 'Blue Truck', 0, 'image3', NULL, 'C:\\Users\\daveo\\CreativeCruisers\\CreativeCruisers\\public\\products\\1.png', '2024-03-13 10:54:32');

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

CREATE TABLE `product_review` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `review` varchar(255) NOT NULL,
  `rating` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `review` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `email`, `review`, `created_at`, `updated_at`) VALUES
(1, 'test', 'user@gmail.com', 'test', '2024-03-13 10:52:25', '2024-03-13 10:52:25'),
(2, 'user', 'user@gmail.com', 'great service', '2024-03-13 17:38:54', '2024-03-13 17:38:54');

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(255) NOT NULL,
  `instance` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(12, 'hello', 'test@gmail.com', NULL, '$2y$12$Hu9Syn6lQPD6uZdn5OcmC.GnOI4ImdS3MIfyKHtntaZc1rwJlY3Km', 0, NULL, '2024-02-22 14:45:48', '2024-03-01 10:48:26'),
(13, 'bgcgh', 'hello@gmail.com', NULL, '$2y$12$5rxxGEivT/9f2ZdsvU9UqeGP7qUt0TyOh8jdd1T4oXFgx5g8Nga6G', 0, NULL, '2024-02-22 14:46:07', '2024-02-28 23:20:49'),
(15, 'hello', 'world@gmail.com', NULL, '$2y$12$vIJA4x4UmD5h90S7MJRUDuLbZ7qVBjptRz3L/65PT6OXKhacVJss6', 0, NULL, '2024-02-22 15:40:02', '2024-02-28 20:25:51'),
(16, 'admin', 'admin@gmail.com', NULL, '$2y$12$EvkznJab8v4N4MNQibIj7uObm3k0ZvMDXiIV9Z73P77SkSuEyWgJG', 1, NULL, '2024-02-22 16:02:57', '2024-02-22 16:02:57'),
(18, 'users', 'users@gmail.com', NULL, '$2y$12$EvkznJab8v4N4MNQibIj7uObm3k0ZvMDXiIV9Z73P77SkSuEyWgJG', 0, NULL, '2024-02-27 16:02:57', '2024-02-22 16:02:57'),
(19, 'hgjhghgghj', 'jhjkkh@gmail.com', NULL, '$2y$12$F0JL/a4/1D7UigRJkiLgeOk/49ECrYiuQXmA4D60JqOzhr90rvkVO', 0, NULL, '2024-02-25 19:32:30', '2024-02-25 19:32:30'),
(21, 'user', 'user@gmail.com', NULL, '$2y$12$Hhz7cWl10xD7VEXwmluITeS5hGUpnJK8cvmPD9HN7YikD4Y/SIgWC', 0, NULL, '2024-02-27 23:38:54', '2024-03-05 22:56:12'),
(22, 'jeff', 'jeff@gmail.com', NULL, '$2y$12$PicQjk07UIOGNCGJ6jSTI.3M/.LInrzNAn5Ycwjc7n9MAdv4qsepO', 0, 'A1y83Ipn8D5Lb65qdHwHCoMqvovQQHrLQ7z9rXHxa8Bd3OOClY01oueGuyVE', '2024-03-05 22:56:45', '2024-03-13 11:19:04'),
(23, 'bob', 'bob@gmail.com', NULL, '$2y$12$giHlvd1WXgkk8iQnlD2/JOjcLLTjXSUWpBxET2YFz/f61TBe8sXn2', 0, NULL, '2024-03-14 17:52:35', '2024-03-14 17:52:35'),
(24, 'john', 'john@gmail.com', NULL, '$2y$12$oUXSZLdGQR6hsMlW4kDenu5wcKUyj6.rifPCivgfwK4JHPTlWu1XG', 0, NULL, '2024-03-14 18:20:54', '2024-03-14 18:20:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_product_order_id_foreign` (`order_id`),
  ADD KEY `order_product_product_id_foreign` (`product_id`),
  ADD KEY `order_product_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_review`
--
ALTER TABLE `product_review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_review_product_id_foreign` (`product_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_review`
--
ALTER TABLE `product_review`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `orders` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `product_review`
--
ALTER TABLE `product_review`
  ADD CONSTRAINT `product_review_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
