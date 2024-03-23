-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2024 at 02:13 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `creativecruisers`
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
(25, 21, 'uk', '546 road', 'user@gmail.com', 13.99, 0, NULL, '2024-03-13 10:54:32', '2024-03-13 10:54:32');

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
(18, 24, 2, NULL, 'Pending', '2024-03-13 10:51:56', '2024-03-13 10:51:56', NULL),
(19, 25, 3, NULL, 'Processed', '2024-03-13 10:54:32', '2024-03-16 11:05:41', NULL);

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
('dragosstefannecula@gmail.com', '$2y$12$O6hs4vxDM7KfoyukDU1mJeKXL.TKau.HQUABhogwI/MPxfo4sD03C', '2024-03-22 12:15:00');

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
  `category` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `quantity`, `category`, `updated_at`, `created_at`) VALUES
(1, 'Grassy Lands Skateboard', '23', 'Skateboard depicting Grassy Lands', 20, 'Decks', '2024-02-21 10:17:55', '2024-02-21 10:17:55'),
(2, 'Galaxy Cluster Skateboard', '35', 'Skateboard depicting a Galaxy Cluster', 1, 'Decks', '2024-02-21 10:17:55', '2024-02-21 10:17:55'),
(3, 'Bird on Sand Skateboard', '5', 'Skateboard depicting a Bird on Sand', 10, 'Decks', '2024-02-21 10:17:55', '2024-02-21 10:17:55'),
(4, 'Dog Skateboard', '15', 'Skateboard depicting a Dog', 0, 'Decks', '2024-02-21 10:17:55', '2024-02-21 10:17:55'),
(5, 'Sunflower Skateboard', '17', 'Skateboard depicting Sunflower Petals', 26, 'Decks', '2024-02-21 10:17:55', '2024-02-21 10:17:55'),
(6, 'Galaxy Cluster Helmet', '35', 'Helmet depicting a Galaxy Cluster', 25, 'Helmets', '2024-02-21 10:17:55', '2024-02-21 10:17:55'),
(7, 'Robot Helmet', '5', 'Helmet depicting a Robot', 10, 'Helmets', '2024-02-21 10:17:55', '2024-02-21 10:17:55'),
(8, 'Dog Helmet', '15', 'Helmet depicting a Dog', 23, 'Helmets', '2024-02-21 10:17:55', '2024-02-21 10:17:55'),
(9, 'Sunflower Helmet', '17', 'Helmet depicting Sunflower Petals', 2, 'Helmets', '2024-02-21 10:17:55', '2024-02-21 10:17:55'),
(10, 'Grassy Lands Helmet', '15', 'Helmet depicting Grassy Lands', 0, 'Helmets', '2024-02-21 10:17:55', '2024-02-21 10:17:55'),
(11, 'Galaxy Cluster Shoes (Size 8)', '35', 'Shoes depicting a Galaxy Cluster', 25, 'Shoes', '2024-02-21 10:17:55', '2024-02-21 10:17:55'),
(12, 'Robot Shoes (Size 8)', '5', 'Shoes depicting a Robot', 10, 'Shoes', '2024-02-21 10:17:55', '2024-02-21 10:17:55'),
(13, 'Dog Shoes (Size 7)', '15', 'Shoes depicting a Dog', 23, 'Shoes', '2024-02-21 10:17:55', '2024-02-21 10:17:55'),
(14, 'Sunflower Shoes (Size 6)', '17', 'Shoes depicting Sunflower Petals', 26, 'Shoes', '2024-02-21 10:17:55', '2024-02-21 10:17:55'),
(15, 'Grassy Lands Shoes (Size 5)', '15', 'Shoes depicting Grassy Lands', 23, 'Shoes', '2024-02-21 10:17:55', '2024-02-21 10:17:55'),
(16, 'Galaxy Cluster Wheels', '35', 'Wheels depicting a Galaxy Cluster', 25, 'Wheels', '2024-02-21 10:17:55', '2024-02-21 10:17:55'),
(17, 'Bird on Sand Wheels', '5', 'Wheels depicting a Bird on Sand', 10, 'Wheels', '2024-02-21 10:17:55', '2024-02-21 10:17:55'),
(18, 'Dog Wheels', '15', 'Wheels depicting a Dog', 23, 'Wheels', '2024-02-21 10:17:55', '2024-02-21 10:17:55'),
(19, 'Sunflower Wheels', '17', 'Wheels depicting Sunflower Petals', 26, 'Wheels', '2024-02-21 10:17:55', '2024-02-21 10:17:55'),
(20, 'Grassy Lands Wheels', '15', 'Wheels depicting Grassy Lands', 3, 'Wheels', '2024-02-21 10:17:55', '2024-02-21 10:17:55'),
(21, 'Trucks 140MM', '35', 'Skateboard Trucks with 140MM width', 25, 'Trucks', '2024-02-21 10:17:55', '2024-02-21 10:17:55'),
(22, 'Trucks 145MM', '5', 'Skateboard Trucks with 145MM width', 10, 'Trucks', '2024-02-21 10:17:55', '2024-02-21 10:17:55'),
(23, 'Trucks 150MM', '15', 'Skateboard Trucks with 150MM width', 23, 'Trucks', '2024-02-21 10:17:55', '2024-02-21 10:17:55'),
(24, 'Trucks 155MM', '17', 'Skateboard Trucks with 155MM width', 26, 'Trucks', '2024-02-21 10:17:55', '2024-02-21 10:17:55'),
(25, 'Trucks 135MM', '15', 'Skateboard Trucks with 135MM width', 23, 'Trucks', '2024-02-21 10:17:55', '2024-02-21 10:17:55');

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

--
-- Dumping data for table `product_review`
--

INSERT INTO `product_review` (`id`, `product_id`, `name`, `review`, `rating`, `created_at`, `updated_at`) VALUES
(1, 1, 'John Doe', 'Great product, highly recommend it!', '5', '2024-03-23 13:02:16', '2024-03-23 13:02:16'),
(2, 2, 'Jane Smith', 'Average product, could be better', '3', '2024-03-23 13:02:16', '2024-03-23 13:02:16'),
(3, 3, 'Alice Johnson', 'Terrible product, waste of money', '1', '2024-03-23 13:02:16', '2024-03-23 13:02:16'),
(4, 4, 'Bob Brown', 'Amazing quality, exceeded my expectations', '5', '2024-03-23 13:02:16', '2024-03-23 13:02:16'),
(5, 5, 'Emma Davis', 'Good product, but a bit pricey', '4', '2024-03-23 13:02:16', '2024-03-23 13:02:16'),
(6, 6, 'Michael Wilson', 'Not bad, could use some improvements', '3', '2024-03-23 13:02:16', '2024-03-23 13:02:16'),
(7, 7, 'Sarah Lee', 'Excellent customer service, but product needs improvement', '4', '2024-03-23 13:02:16', '2024-03-23 13:02:16'),
(8, 8, 'David Martinez', 'Decent product, does the job', '3', '2024-03-23 13:02:16', '2024-03-23 13:02:16'),
(9, 9, 'Jennifer Taylor', 'Poor quality, disappointed with the purchase', '2', '2024-03-23 13:02:16', '2024-03-23 13:02:16'),
(10, 10, 'Christopher Anderson', 'Impressive product, worth the price', '5', '2024-03-23 13:02:16', '2024-03-23 13:02:16'),
(11, 11, 'John Doe', 'Great product, highly recommend it!', '5', '2024-03-23 13:02:16', '2024-03-23 13:02:16'),
(12, 22, 'Jane Smith', 'Average product, could be better', '3', '2024-03-23 13:02:16', '2024-03-23 13:02:16'),
(13, 13, 'Alice Johnson', 'Terrible product, waste of money', '1', '2024-03-23 13:02:16', '2024-03-23 13:02:16'),
(14, 14, 'Bob Brown', 'Amazing quality, exceeded my expectations', '5', '2024-03-23 13:02:16', '2024-03-23 13:02:16'),
(15, 15, 'Emma Davis', 'Good product, but a bit pricey', '4', '2024-03-23 13:02:16', '2024-03-23 13:02:16'),
(16, 16, 'Michael Wilson', 'Not bad, could use some improvements', '3', '2024-03-23 13:02:16', '2024-03-23 13:02:16'),
(17, 17, 'Sarah Lee', 'Excellent customer service, but product needs improvement', '4', '2024-03-23 13:02:16', '2024-03-23 13:02:16'),
(18, 18, 'David Martinez', 'Decent product, does the job', '3', '2024-03-23 13:02:16', '2024-03-23 13:02:16'),
(19, 19, 'Jennifer Taylor', 'Poor quality, disappointed with the purchase', '2', '2024-03-23 13:02:16', '2024-03-23 13:02:16'),
(20, 11, 'Christopher Anderson', 'Impressive product, worth the price', '5', '2024-03-23 13:02:16', '2024-03-23 13:02:16'),
(21, 2, 'John Doe', 'Great product, highly recommend it!', '5', '2024-03-23 13:02:16', '2024-03-23 13:02:16'),
(22, 3, 'Jane Smith', 'Average product, could be better', '3', '2024-03-23 13:02:16', '2024-03-23 13:02:16'),
(23, 4, 'Alice Johnson', 'Terrible product, waste of money', '1', '2024-03-23 13:02:16', '2024-03-23 13:02:16'),
(24, 5, 'Bob Brown', 'Amazing quality, exceeded my expectations', '5', '2024-03-23 13:02:16', '2024-03-23 13:02:16'),
(25, 6, 'Emma Davis', 'Good product, but a bit pricey', '4', '2024-03-23 13:02:16', '2024-03-23 13:02:16'),
(26, 6, 'Michael Wilson', 'Not bad, could use some improvements', '3', '2024-03-23 13:02:16', '2024-03-23 13:02:16'),
(27, 7, 'Sarah Lee', 'Excellent customer service, but product needs improvement', '4', '2024-03-23 13:02:16', '2024-03-23 13:02:16'),
(28, 8, 'David Martinez', 'Decent product, does the job', '3', '2024-03-23 13:02:16', '2024-03-23 13:02:16'),
(29, 12, 'Jennifer Taylor', 'Poor quality, disappointed with the purchase', '2', '2024-03-23 13:02:16', '2024-03-23 13:02:16'),
(30, 13, 'Christopher Anderson', 'Impressive product, worth the price', '5', '2024-03-23 13:02:16', '2024-03-23 13:02:16'),
(31, 1, 'John Doe', 'Great product, highly recommend it!', '5', '2024-03-23 13:03:36', '2024-03-23 13:03:36'),
(32, 2, 'Jane Smith', 'Average product, could be better', '3', '2024-03-23 13:03:36', '2024-03-23 13:03:36'),
(33, 3, 'Alice Johnson', 'Terrible product, waste of money', '1', '2024-03-23 13:03:36', '2024-03-23 13:03:36'),
(34, 4, 'Bob Brown', 'Amazing quality, exceeded my expectations', '5', '2024-03-23 13:03:36', '2024-03-23 13:03:36'),
(35, 5, 'Emma Davis', 'Good product, but a bit pricey', '4', '2024-03-23 13:03:36', '2024-03-23 13:03:36'),
(36, 6, 'Michael Wilson', 'Not bad, could use some improvements', '3', '2024-03-23 13:03:36', '2024-03-23 13:03:36'),
(37, 7, 'Sarah Lee', 'Excellent customer service, but product needs improvement', '4', '2024-03-23 13:03:36', '2024-03-23 13:03:36'),
(38, 8, 'David Martinez', 'Decent product, does the job', '3', '2024-03-23 13:03:36', '2024-03-23 13:03:36'),
(39, 9, 'Jennifer Taylor', 'Poor quality, disappointed with the purchase', '2', '2024-03-23 13:03:36', '2024-03-23 13:03:36'),
(40, 10, 'Christopher Anderson', 'Impressive product, worth the price', '5', '2024-03-23 13:03:36', '2024-03-23 13:03:36'),
(41, 11, 'Emily Rodriguez', 'Satisfactory, met my expectations', '4', '2024-03-23 13:03:36', '2024-03-23 13:03:36'),
(42, 12, 'Daniel Garcia', 'Could be better, not entirely satisfied', '2', '2024-03-23 13:03:36', '2024-03-23 13:03:36'),
(43, 13, 'Olivia Hernandez', 'Good value for money', '4', '2024-03-23 13:03:36', '2024-03-23 13:03:36'),
(44, 14, 'Sophia Martinez', 'Needs improvement, not recommended', '2', '2024-03-23 13:03:36', '2024-03-23 13:03:36'),
(45, 15, 'Lucas Smith', 'Excellent product, exceeded expectations', '5', '2024-03-23 13:03:36', '2024-03-23 13:03:36'),
(46, 16, 'Mia Johnson', 'Okay product, nothing special', '3', '2024-03-23 13:03:36', '2024-03-23 13:03:36'),
(47, 17, 'Ethan Wilson', 'Disappointed, not as advertised', '2', '2024-03-23 13:03:36', '2024-03-23 13:03:36'),
(48, 18, 'Isabella Taylor', 'Decent quality, but overpriced', '3', '2024-03-23 13:03:36', '2024-03-23 13:03:36'),
(49, 19, 'Alexander Brown', 'Highly recommend, great value', '5', '2024-03-23 13:03:36', '2024-03-23 13:03:36'),
(50, 20, 'Ava Jones', 'Not satisfied, expected better', '2', '2024-03-23 13:03:36', '2024-03-23 13:03:36'),
(51, 21, 'Logan Davis', 'Good product overall, some minor issues', '4', '2024-03-23 13:03:36', '2024-03-23 13:03:36'),
(52, 22, 'Harper Miller', 'Average quality, nothing exceptional', '3', '2024-03-23 13:03:36', '2024-03-23 13:03:36'),
(53, 23, 'Ryan Wilson', 'Impressed with the performance', '5', '2024-03-23 13:03:36', '2024-03-23 13:03:36'),
(54, 24, 'Evelyn White', 'Below expectations, poor quality', '2', '2024-03-23 13:03:36', '2024-03-23 13:03:36'),
(55, 25, 'Jackson Garcia', 'Great features, worth the investment', '5', '2024-03-23 13:03:36', '2024-03-23 13:03:36'),
(56, 1, 'Sophia Adams', 'Excellent product, highly recommended', '5', '2024-03-23 13:04:49', '2024-03-23 13:04:49'),
(57, 2, 'Oliver Martinez', 'Average product, nothing special', '3', '2024-03-23 13:04:49', '2024-03-23 13:04:49'),
(58, 3, 'Amelia Rodriguez', 'Great value for the price', '4', '2024-03-23 13:04:49', '2024-03-23 13:04:49'),
(59, 4, 'Ethan Green', 'Poor quality, disappointed', '2', '2024-03-23 13:04:49', '2024-03-23 13:04:49'),
(60, 5, 'Ava Thomas', 'Satisfied with the purchase', '4', '2024-03-23 13:04:49', '2024-03-23 13:04:49'),
(61, 6, 'Mason White', 'Could be better, not entirely satisfied', '3', '2024-03-23 13:04:49', '2024-03-23 13:04:49'),
(62, 7, 'Isabella Clark', 'Impressive performance, exceeded expectations', '5', '2024-03-23 13:04:49', '2024-03-23 13:04:49'),
(63, 8, 'William Hall', 'Decent product, met expectations', '3', '2024-03-23 13:04:49', '2024-03-23 13:04:49'),
(64, 9, 'Mia Adams', 'Disappointed with the quality', '2', '2024-03-23 13:04:49', '2024-03-23 13:04:49'),
(65, 10, 'James Thompson', 'Great features, worth the money', '5', '2024-03-23 13:04:49', '2024-03-23 13:04:49'),
(66, 11, 'Emily Parker', 'Average quality, needs improvement', '3', '2024-03-23 13:04:49', '2024-03-23 13:04:49'),
(67, 12, 'Matthew King', 'Satisfactory purchase, but not exceptional', '4', '2024-03-23 13:04:49', '2024-03-23 13:04:49'),
(68, 13, 'Ella Scott', 'Good value for money, satisfied', '4', '2024-03-23 13:04:49', '2024-03-23 13:04:49'),
(69, 14, 'Daniel Hill', 'Poor product, would not recommend', '1', '2024-03-23 13:04:49', '2024-03-23 13:04:49'),
(70, 15, 'Grace Wright', 'Impressed with the durability', '5', '2024-03-23 13:04:49', '2024-03-23 13:04:49'),
(71, 16, 'Michael Young', 'Average product, nothing extraordinary', '3', '2024-03-23 13:04:49', '2024-03-23 13:04:49'),
(72, 17, 'Lily Turner', 'Below expectations, not satisfied', '2', '2024-03-23 13:04:49', '2024-03-23 13:04:49'),
(73, 18, 'Jacob Harris', 'Decent quality, fair price', '4', '2024-03-23 13:04:49', '2024-03-23 13:04:49'),
(74, 19, 'Avery Martin', 'Great customer service, average product', '3', '2024-03-23 13:04:49', '2024-03-23 13:04:49'),
(75, 20, 'Sofia Wright', 'Fantastic product, worth every penny', '5', '2024-03-23 13:04:49', '2024-03-23 13:04:49'),
(76, 21, 'Jackson Rodriguez', 'Poor quality, disappointed with the purchase', '2', '2024-03-23 13:04:49', '2024-03-23 13:04:49'),
(77, 22, 'Harper Brown', 'Average product, nothing special', '3', '2024-03-23 13:04:49', '2024-03-23 13:04:49'),
(78, 23, 'Benjamin Lopez', 'Good value for money, satisfied with the purchase', '4', '2024-03-23 13:04:49', '2024-03-23 13:04:49'),
(79, 24, 'Mila Adams', 'Highly recommend, exceeded expectations', '5', '2024-03-23 13:04:49', '2024-03-23 13:04:49'),
(80, 25, 'Liam Clark', 'Poor quality, would not buy again', '1', '2024-03-23 13:04:49', '2024-03-23 13:04:49'),
(81, 1, 'Sophie Turner', 'Great product, highly recommended', '5', '2024-03-23 13:05:14', '2024-03-23 13:05:14'),
(82, 2, 'Olivia Parker', 'Average product, nothing special', '3', '2024-03-23 13:05:14', '2024-03-23 13:05:14'),
(83, 3, 'Alexander White', 'Great value for the price', '4', '2024-03-23 13:05:14', '2024-03-23 13:05:14'),
(84, 4, 'Daniel Harris', 'Poor quality, disappointed', '2', '2024-03-23 13:05:14', '2024-03-23 13:05:14'),
(85, 5, 'Ella Martinez', 'Satisfied with the purchase', '4', '2024-03-23 13:05:14', '2024-03-23 13:05:14'),
(86, 6, 'Logan Thompson', 'Could be better, not entirely satisfied', '3', '2024-03-23 13:05:14', '2024-03-23 13:05:14'),
(87, 7, 'Mia Wright', 'Impressive performance, exceeded expectations', '5', '2024-03-23 13:05:14', '2024-03-23 13:05:14'),
(88, 8, 'William Baker', 'Decent product, met expectations', '3', '2024-03-23 13:05:14', '2024-03-23 13:05:14'),
(89, 9, 'Charlotte King', 'Disappointed with the quality', '2', '2024-03-23 13:05:14', '2024-03-23 13:05:14'),
(90, 10, 'Ethan Lopez', 'Great features, worth the money', '5', '2024-03-23 13:05:14', '2024-03-23 13:05:14'),
(91, 11, 'Ava Adams', 'Average quality, needs improvement', '3', '2024-03-23 13:05:14', '2024-03-23 13:05:14'),
(92, 12, 'Jacob Scott', 'Satisfactory purchase, but not exceptional', '4', '2024-03-23 13:05:14', '2024-03-23 13:05:14'),
(93, 13, 'Liam Hill', 'Good value for money, satisfied', '4', '2024-03-23 13:05:14', '2024-03-23 13:05:14'),
(94, 14, 'Sophia Young', 'Poor product, would not recommend', '1', '2024-03-23 13:05:14', '2024-03-23 13:05:14'),
(95, 15, 'Emma Harris', 'Impressed with the durability', '5', '2024-03-23 13:05:14', '2024-03-23 13:05:14'),
(96, 16, 'Oliver Wright', 'Average product, nothing extraordinary', '3', '2024-03-23 13:05:14', '2024-03-23 13:05:14'),
(97, 17, 'Avery Martin', 'Below expectations, not satisfied', '2', '2024-03-23 13:05:14', '2024-03-23 13:05:14'),
(98, 18, 'Ella Parker', 'Decent quality, fair price', '4', '2024-03-23 13:05:14', '2024-03-23 13:05:14'),
(99, 19, 'Jacob Turner', 'Great customer service, average product', '3', '2024-03-23 13:05:14', '2024-03-23 13:05:14'),
(100, 20, 'Mia Lopez', 'Fantastic product, worth every penny', '5', '2024-03-23 13:05:14', '2024-03-23 13:05:14'),
(101, 21, 'William Adams', 'Poor quality, disappointed with the purchase', '2', '2024-03-23 13:05:14', '2024-03-23 13:05:14'),
(102, 22, 'Sophie White', 'Average product, nothing special', '3', '2024-03-23 13:05:14', '2024-03-23 13:05:14'),
(103, 23, 'Olivia Martinez', 'Good value for money, satisfied with the purchase', '4', '2024-03-23 13:05:14', '2024-03-23 13:05:14'),
(104, 24, 'Ethan Harris', 'Highly recommend, exceeded expectations', '5', '2024-03-23 13:05:14', '2024-03-23 13:05:14'),
(105, 25, 'Charlotte Turner', 'Poor quality, would not buy again', '1', '2024-03-23 13:05:14', '2024-03-23 13:05:14'),
(106, 1, 'Sophia Baker', 'Great product, highly recommended', '5', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(107, 2, 'Oliver Harris', 'Average product, nothing special', '3', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(108, 3, 'Ava King', 'Great value for the price', '4', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(109, 4, 'Ethan Martin', 'Poor quality, disappointed', '2', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(110, 5, 'Emma Scott', 'Satisfied with the purchase', '4', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(111, 6, 'Logan Hill', 'Could be better, not entirely satisfied', '3', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(112, 7, 'Mia Wright', 'Impressive performance, exceeded expectations', '5', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(113, 8, 'William Baker', 'Decent product, met expectations', '3', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(114, 9, 'Charlotte King', 'Disappointed with the quality', '2', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(115, 10, 'Ethan Lopez', 'Great features, worth the money', '5', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(116, 11, 'Ava Adams', 'Average quality, needs improvement', '3', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(117, 12, 'Jacob Scott', 'Satisfactory purchase, but not exceptional', '4', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(118, 13, 'Liam Hill', 'Good value for money, satisfied', '4', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(119, 14, 'Sophia Young', 'Poor product, would not recommend', '1', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(120, 15, 'Emma Harris', 'Impressed with the durability', '5', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(121, 16, 'Oliver Wright', 'Average product, nothing extraordinary', '3', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(122, 17, 'Avery Martin', 'Below expectations, not satisfied', '2', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(123, 18, 'Ella Parker', 'Decent quality, fair price', '4', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(124, 19, 'Jacob Turner', 'Great customer service, average product', '3', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(125, 20, 'Mia Lopez', 'Fantastic product, worth every penny', '5', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(126, 21, 'William Adams', 'Poor quality, disappointed with the purchase', '2', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(127, 22, 'Sophie White', 'Average product, nothing special', '3', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(128, 23, 'Olivia Martinez', 'Good value for money, satisfied with the purchase', '4', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(129, 24, 'Ethan Harris', 'Highly recommend, exceeded expectations', '5', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(130, 25, 'Charlotte Turner', 'Poor quality, would not buy again', '1', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(131, 1, 'Olivia Baker', 'Great product, highly recommended', '5', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(132, 2, 'Oliver Harris', 'Average product, nothing special', '3', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(133, 3, 'Ava King', 'Great value for the price', '4', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(134, 4, 'Ethan Martin', 'Poor quality, disappointed', '2', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(135, 5, 'Emma Scott', 'Satisfied with the purchase', '4', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(136, 6, 'Logan Hill', 'Could be better, not entirely satisfied', '3', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(137, 7, 'Mia Wright', 'Impressive performance, exceeded expectations', '5', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(138, 8, 'William Baker', 'Decent product, met expectations', '3', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(139, 9, 'Charlotte King', 'Disappointed with the quality', '2', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(140, 10, 'Ethan Lopez', 'Great features, worth the money', '5', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(141, 11, 'Ava Adams', 'Average quality, needs improvement', '3', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(142, 12, 'Jacob Scott', 'Satisfactory purchase, but not exceptional', '4', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(143, 13, 'Liam Hill', 'Good value for money, satisfied', '4', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(144, 14, 'Sophia Young', 'Poor product, would not recommend', '1', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(145, 15, 'Emma Harris', 'Impressed with the durability', '5', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(146, 16, 'Oliver Wright', 'Average product, nothing extraordinary', '3', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(147, 17, 'Avery Martin', 'Below expectations, not satisfied', '2', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(148, 18, 'Ella Parker', 'Decent quality, fair price', '4', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(149, 19, 'Jacob Turner', 'Great customer service, average product', '3', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(150, 20, 'Mia Lopez', 'Fantastic product, worth every penny', '5', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(151, 21, 'William Adams', 'Poor quality, disappointed with the purchase', '2', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(152, 22, 'Sophie White', 'Average product, nothing special', '3', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(153, 23, 'Olivia Martinez', 'Good value for money, satisfied with the purchase', '4', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(154, 24, 'Ethan Harris', 'Highly recommend, exceeded expectations', '5', '2024-03-23 13:08:29', '2024-03-23 13:08:29'),
(155, 25, 'Charlotte Turner', 'Poor quality, would not buy again', '1', '2024-03-23 13:08:29', '2024-03-23 13:08:29');

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
(1, 'test', 'user@gmail.com', 'test', '2024-03-13 10:52:25', '2024-03-13 10:52:25');

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
(22, 'jeff', 'jeff@gmail.com', NULL, '$2y$12$DceB2maC9jA31PS6D.FExeFHUAhWhHOziBexwCsq3/mxL3jeo5b9e', 0, NULL, '2024-03-05 22:56:45', '2024-03-05 22:57:07'),
(23, 'Test User', 'test109@example.com', NULL, '$2y$04$tJrNyoUmLdfc8qOydQSbpedhQavsGvcedugQUM5ArifZ1dMgXZNRe', 0, NULL, '2024-03-21 20:43:24', '2024-03-21 20:43:24'),
(24, 'Herta Conn Sr.', 'dturner@example.org', '2024-03-21 20:43:25', '$2y$04$/yIOolBA5KDi.a5zhFO1aOngIeTXAV0XD1VXtU0rW2pGCPfacU1p.', 0, 'IZ3ywRtxZp', '2024-03-21 20:43:25', '2024-03-21 20:43:25'),
(25, 'Dragos', 'dragosstefannecula@gmail.com', NULL, '$2y$12$vvfyV64gOmee.vPAveCku.6DdL3PUezqez63OsAfPOBrbKHJTq45a', 0, NULL, '2024-03-22 12:03:09', '2024-03-22 12:03:09');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product_review`
--
ALTER TABLE `product_review`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
