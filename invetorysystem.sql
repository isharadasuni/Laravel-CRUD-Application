-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2024 at 10:24 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invetorysystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `code`, `quantity`, `price`, `image`, `notes`, `created_at`, `updated_at`) VALUES
(9, 'Toothbrush', 'C001', 10, '250.00', 'sDdPjalcLo84N1j6Cd9HCf3yXUtBaw2JZTJfqmTa.png', 'Signal Toothbrush Fighter Double Pack', '2024-09-12 02:33:20', '2024-09-12 02:33:20'),
(10, 'Body Wash', 'C002', 23, '220.00', 'XrMQsp2IUxa1vcP5AMfm8IDsSPQdhidBDbFrwrj7.png', 'Lux B/Wash Fragrant Skin 125Ml Pouch', '2024-09-12 02:35:46', '2024-09-12 02:35:46'),
(11, 'Washing Powder', 'C003', 9, '680.00', '978woAJFatUcr3LUoZVpzrEBCrYyVnVX5Vwzvt4S.png', 'Surf Excel Matic Washing Powder 1kg', '2024-09-12 02:39:00', '2024-09-12 02:39:00'),
(12, 'Soap', 'C004', 11, '620.00', '0OYWREGf8OLm5bQC7LnOS4tRr5FNngZgBEWdoSxA.png', 'Lux Limited Edition Multipack 400g', '2024-09-12 02:41:16', '2024-09-12 02:41:16'),
(13, 'Fabric Conditioner', 'C005', 120, '300.00', 'wxPKXQZ7SYPJdoYXWpRDhd7zaD5uVb2vtuitHVVI.png', 'Comfort Fabric Conditioner Blue 220ml', '2024-09-12 02:42:46', '2024-09-12 02:42:46'),
(14, 'Shampoo', 'C006', 21, '300.00', 'lMSZ2MeitlzLnjEFleRbjsIyVob2KWCqJAh2YQEN.png', 'Lifebuoy Anti Dandruff Strong And Long Shampoo 80ml', '2024-09-12 02:43:58', '2024-09-12 02:43:58'),
(15, 'Body Lotion', 'C007', 5, '425.00', '6VSardYnr3DZzr9E6Ob2l4y5BhWXFrSjgIbPsDEx.png', 'Vaseline Intensive Care Deep Restore Lotion 100ml', '2024-09-12 02:45:37', '2024-09-12 02:45:37'),
(16, 'Dishwash', 'C008', 43, '449.98', 'UA3EslEYCTzvz5HtDrQxyG6W8ESdtOATUyxvNUOd.png', 'Vim Dishwash Liquid Lemon And Mint 500ml', '2024-09-12 02:46:47', '2024-09-12 02:46:47'),
(17, 'Face Wash', 'C009', 7, '1140.00', 'IkAahFkdKgRY9cZEeQtftwx81pduQeOBLIf3YFPt.png', 'Ayush Anti Pimple Turmeric Face Wash 80g', '2024-09-12 02:49:25', '2024-09-12 02:49:25'),
(18, 'Toothpaste', 'C010', 17, '125.00', 'KzGGn9OJgLAZgEgHnpipT8PW9kaRHqYt4CGrm3pS.png', 'Signal Toothpaste Strong Teeth 40g', '2024-09-12 02:51:15', '2024-09-12 02:51:15');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_09_12_050521_create_items_table', 2),
(6, '2024_09_12_051325_create_items_table', 3),
(8, '2024_09_12_051918_create_items_table', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `items_code_unique` (`code`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
