-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2023 at 04:25 PM
-- Server version: 10.4.22-MariaDB-log
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `room_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `bilding_images`
--

CREATE TABLE `bilding_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `building_id` bigint(20) UNSIGNED NOT NULL,
  `building_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bilding_images`
--

INSERT INTO `bilding_images` (`id`, `building_id`, `building_image`, `created_at`, `updated_at`) VALUES
(1, 1, 'building-1-1-1.jpg', '2023-07-08 09:59:26', '2023-07-08 09:59:26'),
(2, 1, 'building-1-1-2.jpg', '2023-07-08 09:59:33', '2023-07-08 09:59:33');

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

CREATE TABLE `buildings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `building_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `building_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `building_zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `building_place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `building_country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buildings`
--

INSERT INTO `buildings` (`id`, `building_name`, `building_address`, `building_zip`, `building_place`, `building_country`, `created_at`, `updated_at`) VALUES
(1, 'Villa LUX', 'Ilindenska 555 66666', '6000', 'Ohrid', 'Macedonia', '2023-07-08 09:59:17', '2023-07-08 11:50:51');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2013_06_30_132007_create_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_06_30_132407_create_buildings_table', 1),
(7, '2023_06_30_132711_create_bilding_images_table', 1),
(8, '2023_06_30_132949_create_rooms_table', 1),
(9, '2023_06_30_133349_create_room_images_table', 1),
(10, '2023_06_30_133538_create_room_accessories_table', 1),
(11, '2023_06_30_133735_create_room_user_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `building_id` bigint(20) UNSIGNED NOT NULL,
  `room_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `avg_rate` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `building_id`, `room_number`, `room_description`, `price`, `avg_rate`, `created_at`, `updated_at`) VALUES
(1, 1, '01', 'aaaaaaaaaaaaaaaaaaaaaaaaaaa', '22.00', NULL, '2023-07-08 09:59:50', '2023-07-08 10:00:10'),
(2, 1, '02', 'dadasdadadadadadad', '29.00', NULL, '2023-07-08 11:51:15', '2023-07-08 11:51:34'),
(3, 1, '03', 'dasdsadsadasdadasdasdasd\r\nsadad\r\nasd\r\nasdd\r\naa', '12.00', NULL, '2023-07-12 11:24:03', '2023-07-12 11:24:03'),
(4, 1, '04', 'asdasdasdasdad\r\nasda\r\ndas\r\ndsad\r\nadaaaa', '22.00', NULL, '2023-07-12 11:24:27', '2023-07-12 11:24:27');

-- --------------------------------------------------------

--
-- Table structure for table `room_accessories`
--

CREATE TABLE `room_accessories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `room_accessory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room_images`
--

CREATE TABLE `room_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `room_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_images`
--

INSERT INTO `room_images` (`id`, `room_id`, `room_image`, `created_at`, `updated_at`) VALUES
(1, 1, 'room-1-1-1.jpg', '2023-07-08 10:00:04', '2023-07-08 10:00:04'),
(2, 1, 'room-1-1-2.jpg', '2023-07-08 10:00:19', '2023-07-08 10:00:19'),
(3, 2, 'room-1-2-1.jpg', '2023-07-08 11:51:25', '2023-07-08 11:51:25'),
(4, 1, 'room-1-1-3.jpg', '2023-07-12 10:31:56', '2023-07-12 10:31:56'),
(5, 3, 'room-1-3-1.jpg', '2023-07-12 11:24:13', '2023-07-12 11:24:13'),
(6, 4, 'room-1-4-1.jpg', '2023-07-12 11:24:38', '2023-07-12 11:24:38');

-- --------------------------------------------------------

--
-- Table structure for table `room_user`
--

CREATE TABLE `room_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `check_in` date DEFAULT NULL,
  `check_out` date DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_user`
--

INSERT INTO `room_user` (`id`, `room_id`, `user_id`, `check_in`, `check_out`, `comment`, `rate`, `created_at`, `updated_at`) VALUES
(11, 1, 2, '2023-06-08', '2023-06-23', NULL, NULL, '2023-07-08 10:15:12', '2023-07-08 10:15:12'),
(14, 1, 2, '2023-07-28', '2023-08-04', NULL, NULL, '2023-07-08 11:36:14', '2023-07-08 11:36:14'),
(15, 1, 2, '2023-08-05', '2023-08-22', NULL, NULL, '2023-07-08 11:36:37', '2023-07-08 11:36:37'),
(16, 1, 2, '2023-08-23', '2023-07-26', NULL, NULL, '2023-07-08 11:49:02', '2023-07-08 11:49:02'),
(17, 1, 2, '2023-07-09', '2023-07-15', NULL, NULL, '2023-07-08 11:49:56', '2023-07-08 11:49:56'),
(18, 2, 3, '2023-07-12', '2023-07-19', NULL, NULL, '2023-07-11 12:01:22', '2023-07-11 12:01:22'),
(19, 2, 3, '2023-07-31', '2023-08-05', NULL, NULL, '2023-07-11 12:01:48', '2023-07-11 12:01:48'),
(20, 1, 3, '2023-07-16', '2023-07-22', NULL, NULL, '2023-07-11 12:02:05', '2023-07-11 12:02:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL DEFAULT 2,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `first_name`, `last_name`, `email`, `email_verified_at`, `phone`, `password`, `user_address`, `user_zip`, `user_place`, `user_country`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'John', 'Doe', 'admin@admin.com', NULL, '123123', '$2y$10$5e7PT/2sL1iKtAWeWhQ3Dux328AYCXR0T5/2UtOrniFoUMyqM4dTu', 'Street 123', '1000', 'Skopje', 'Macedonia', NULL, '2023-07-08 09:58:07', '2023-07-08 09:58:07'),
(2, 2, 'Jane', 'Doe', 'jane@doe.com', NULL, '123123123', '$2y$10$BB1t9uOhuC2vig51tzvKlOIJqV6h9tt8MWdt/.F/tR2yR8X.PZT4u', 'ssssssssssssssss', '12222', 'Skopje', 'Macedonia', NULL, '2023-07-08 09:58:36', '2023-07-08 09:58:36'),
(3, 2, 'Mike', 'Smith', 'mike@smith.com', NULL, '15999991', '$2y$10$vep1ncar9Xg8T5SJIYEHAO2vDOLFqIP5HTOTkzxdNjQPKbUlnaXXO', 'Some street Name 123/22/9', '15990', 'Melbourne', 'Australia', NULL, '2023-07-11 12:00:38', '2023-07-11 12:00:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bilding_images`
--
ALTER TABLE `bilding_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bilding_images_building_id_foreign` (`building_id`);

--
-- Indexes for table `buildings`
--
ALTER TABLE `buildings`
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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_building_id_foreign` (`building_id`);

--
-- Indexes for table `room_accessories`
--
ALTER TABLE `room_accessories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_accessories_room_id_foreign` (`room_id`);

--
-- Indexes for table `room_images`
--
ALTER TABLE `room_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_images_room_id_foreign` (`room_id`);

--
-- Indexes for table `room_user`
--
ALTER TABLE `room_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_user_room_id_foreign` (`room_id`),
  ADD KEY `room_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bilding_images`
--
ALTER TABLE `bilding_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `buildings`
--
ALTER TABLE `buildings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `room_accessories`
--
ALTER TABLE `room_accessories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room_images`
--
ALTER TABLE `room_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `room_user`
--
ALTER TABLE `room_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bilding_images`
--
ALTER TABLE `bilding_images`
  ADD CONSTRAINT `bilding_images_building_id_foreign` FOREIGN KEY (`building_id`) REFERENCES `buildings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_building_id_foreign` FOREIGN KEY (`building_id`) REFERENCES `buildings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `room_accessories`
--
ALTER TABLE `room_accessories`
  ADD CONSTRAINT `room_accessories_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `room_images`
--
ALTER TABLE `room_images`
  ADD CONSTRAINT `room_images_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `room_user`
--
ALTER TABLE `room_user`
  ADD CONSTRAINT `room_user_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `room_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
