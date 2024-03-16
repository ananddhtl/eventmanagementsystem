-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 16, 2024 at 04:14 AM
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
-- Database: `eventmanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_events`
--

CREATE TABLE `book_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_code` text NOT NULL,
  `event_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `ticket_type` text NOT NULL,
  `total_price` text NOT NULL,
  `status` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_events`
--

INSERT INTO `book_events` (`id`, `user_id`, `transaction_code`, `event_id`, `qty`, `ticket_type`, `total_price`, `status`, `created_at`, `updated_at`) VALUES
(1, 9, '543e87bbgg', 1, 5, 'vip', '2000', NULL, '2024-03-15 13:33:47', '2024-03-15 13:33:47'),
(2, 9, '543e87bbgg', 1, 5, 'vip', '2000', NULL, '2024-03-15 13:34:30', '2024-03-15 13:34:30'),
(3, 9, '543e87bbgg', 1, 5, 'vip', '2000', NULL, '2024-03-15 13:34:42', '2024-03-15 13:34:42');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `event_date` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `organizer_id` int(11) NOT NULL,
  `total_seats` bigint(20) NOT NULL,
  `total_vip_seats` bigint(20) NOT NULL,
  `total_public_seats` bigint(20) NOT NULL,
  `total_available_vip_seats` bigint(20) DEFAULT NULL,
  `total_available_public_seats` bigint(20) DEFAULT NULL,
  `vip_seats_price` double NOT NULL,
  `public_seats_price` double NOT NULL,
  `status` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_title`, `description`, `thumbnail`, `event_date`, `location`, `organizer_id`, `total_seats`, `total_vip_seats`, `total_public_seats`, `total_available_vip_seats`, `total_available_public_seats`, `vip_seats_price`, `public_seats_price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Updated Event Title 1', 'Updated This is the description', 'abc.jog', '2023/12/09', 'Pokhara 14 Chauthe', 9, 100, 50, 50, 5, NULL, 500, 100, 0, '2024-03-15 12:43:41', '2024-03-15 13:34:42');

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
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(13, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(14, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(15, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(16, '2016_06_01_000004_create_oauth_clients_table', 1),
(17, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(18, '2019_08_19_000000_create_failed_jobs_table', 1),
(19, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(20, '2024_03_15_111211_create_normal_users_table', 1),
(22, '2024_03_15_162840_create_events_table', 2),
(23, '2024_03_15_183945_create_book_events_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `normal_users`
--

CREATE TABLE `normal_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phonenumber` bigint(20) NOT NULL,
  `address` tinytext NOT NULL,
  `gender` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `otp` varchar(255) DEFAULT NULL,
  `otp_sent_at` timestamp NULL DEFAULT NULL,
  `otp_verified_at` timestamp NULL DEFAULT NULL,
  `temp_token` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `normal_users`
--

INSERT INTO `normal_users` (`id`, `name`, `phonenumber`, `address`, `gender`, `email`, `email_verified_at`, `password`, `otp`, `otp_sent_at`, `otp_verified_at`, `temp_token`, `status`, `created_at`, `updated_at`) VALUES
(7, 'Ananda Dhital', 9846921008, 'Pokhara 14 Chauthe', 1, 'anddhital@2gmail.com', NULL, '$2y$12$TelrZklyrvR7IRU.5AHbR.JGmTXkeONgkRgPeYB7et0qGvndPeg82', NULL, NULL, '2024-03-15 10:33:00', NULL, 0, '2024-03-15 06:27:20', '2024-03-15 10:40:58'),
(8, 'Ananda Dhital', 9846921908, 'Pokhara 14 Chauthe', 1, 'anddhital2@gmail.com', NULL, '$2y$12$m3zq3N3HV6Y1CtolJuFR0ef3vFkeRJO4.YYmjzzXOv7GYe9XtB1Uq', NULL, NULL, NULL, NULL, 0, '2024-03-15 06:28:47', '2024-03-15 10:04:19'),
(9, 'Ananda Dhital', 9846921000, 'Pokhara 14 Chauthe', 1, 'anddhital@gmail.com', NULL, '$2y$12$DAuoCArT224WiJ6vOkURGeXjr6x8UfDQvei63U9fXokv51anKZVtS', '72320', '2024-03-15 10:33:06', NULL, 'o5Y77dTFUoSiqT1xc4DYsBCwWTzZ4eNGJfy1f3WqIRa0lJxXxhIIWZPXcc21', 1, '2024-03-15 10:05:44', '2024-03-15 11:05:07');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('0060b1a6b319cc7a922d733731bb19571d5ae0a8cb1978a54e151194ce0f2ce82770763598474c81', 6, 1, 'Personal Access Token', '[]', 0, '2024-03-15 06:26:23', '2024-03-15 06:26:23', '2024-06-15 12:11:23'),
('1a3706cf01bff73b2128f7a377f652f1d8828ec9b3b79c885e2def10d2a40cd75c659801dddb4e48', 9, 1, 'Personal Access Token', '[]', 0, '2024-03-15 11:03:28', '2024-03-15 11:03:28', '2024-06-15 16:48:28'),
('2d117b8f6f2853aa292c6827ec7c1ae995d8cc3290e66be7b703b0a52261c5906f2b4ef73cf1fb7e', 8, 1, 'Personal Access Token', '[]', 0, '2024-03-15 10:02:23', '2024-03-15 10:02:23', '2024-06-15 15:47:23'),
('33836c6851fe252180a5ef9e2da0c481f880532bf3fb501d81047c5288e934fe448c2f90df1ec4a0', 7, 1, 'Personal Access Token', '[]', 0, '2024-03-15 06:27:20', '2024-03-15 06:27:20', '2024-06-15 12:12:20'),
('3ef897edf2229dcb65e68e28364d1151b74640043ceb91293325890d1f4872b078c903a0df2e75d6', 9, 1, 'Personal Access Token', '[]', 0, '2024-03-15 10:39:55', '2024-03-15 10:39:55', '2024-06-15 16:24:55'),
('918ed96507a8661be2dec1ed138f4f81dfac9b88aca6ddc1392139014ed485f6ebd3454b768b4f3b', 5, 1, 'Personal Access Token', '[]', 0, '2024-03-15 06:21:44', '2024-03-15 06:21:44', '2024-06-15 12:06:44'),
('b3c991bde5529506cfe20e91c5c53f844c70c042663e19d17ede6ab3fb31d495fc53f4501cdc552b', 8, 1, 'Personal Access Token', '[]', 0, '2024-03-15 06:28:47', '2024-03-15 06:28:47', '2024-06-15 12:13:47'),
('ebeebbb14f124d213ff40d22794e7bfc723b6e04ecccfc1b194bf1caba4a63abb12b0a026f8d16e6', 9, 1, 'Personal Access Token', '[]', 0, '2024-03-15 10:05:44', '2024-03-15 10:05:44', '2024-06-15 15:50:44'),
('f94c09f5cc95ee30e3f565509ab138eae5c62d73a3187db80969c3179f86040a8e0ffad299a413d1', 8, 1, 'Personal Access Token', '[]', 1, '2024-03-15 09:49:14', '2024-03-15 10:01:41', '2024-06-15 15:34:14');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'ExuwnYsRYrhjbZiQqik5WC8iSwqFJDrWB3rAntvM', NULL, 'http://localhost', 1, 0, 0, '2024-03-15 06:10:42', '2024-03-15 06:10:42'),
(2, NULL, 'Laravel Password Grant Client', 'yTmv2yo8Sb1BOfnGS3ZYquqsDtkCTcblXWdVOcam', 'users', 'http://localhost', 0, 1, 0, '2024-03-15 06:10:42', '2024-03-15 06:10:42');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-03-15 06:10:42', '2024-03-15 06:10:42');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_events`
--
ALTER TABLE `book_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
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
-- Indexes for table `normal_users`
--
ALTER TABLE `normal_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `normal_users_email_unique` (`email`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_events`
--
ALTER TABLE `book_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `normal_users`
--
ALTER TABLE `normal_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
