-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2023 at 10:12 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_models`
--

CREATE TABLE `car_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `manufacturer_name_id` int(10) UNSIGNED NOT NULL,
  `model_name` varchar(191) NOT NULL,
  `color_code` varchar(191) NOT NULL,
  `manufacturing_year` bigint(20) DEFAULT NULL,
  `registration_number` varchar(191) NOT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_models`
--

INSERT INTO `car_models` (`id`, `manufacturer_name_id`, `model_name`, `color_code`, `manufacturing_year`, `registration_number`, `image1`, `image2`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tata', '#104ee0', 2020, '9855434', 'tata-7754.jpg', 'tata-6496.jpg', 1, '2023-05-24 02:36:24', '2023-05-24 02:38:07'),
(2, 2, 'Nano', '#e80202', 2020, '5888342', 'nano-2104.jpg', 'nano-8341.jpg', 1, '2023-05-24 02:38:54', '2023-05-24 02:39:44');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manufactures`
--

CREATE TABLE `manufactures` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manufactures`
--

INSERT INTO `manufactures` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Maruti', 1, '2023-05-24 02:35:22', '2023-05-24 02:35:22'),
(2, 'Wagonr', 1, '2023-05-24 02:35:44', '2023-05-24 02:35:44');

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
(1, '2019_08_19_000000_create_failed_jobs_table', 1),
(2, '2023_03_20_010703_create_users_table', 1),
(3, '2023_05_24_003557_create_car_models_table', 1),
(4, '2023_05_24_054238_create_manufactures_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'faizan', 7304094851, 'mirzafaizan1931@gmail.com', '$2y$10$WhAn76BECNAkp/lcSP3mR.1hez9Kt90PoKEH72L19t0/azOW5mRsa', '2023-05-24 02:34:57', '2023-05-24 02:34:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car_models`
--
ALTER TABLE `car_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufactures`
--
ALTER TABLE `manufactures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car_models`
--
ALTER TABLE `car_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manufactures`
--
ALTER TABLE `manufactures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
