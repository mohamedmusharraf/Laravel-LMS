-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2024 at 07:03 AM
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
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_messages`
--

CREATE TABLE `admin_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_messages`
--

INSERT INTO `admin_messages` (`id`, `name`, `message`, `created_at`, `updated_at`) VALUES
(6, 'Admin', 'Hi', '2024-04-24 06:58:35', '2024-04-24 06:58:35');

-- --------------------------------------------------------

--
-- Table structure for table `admin_tables`
--

CREATE TABLE `admin_tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_tables`
--

INSERT INTO `admin_tables` (`id`, `name`, `email`, `image`, `password`, `address`, `contact`, `type`, `created_at`, `updated_at`) VALUES
(3, 'Admin', 'admin@gmail.com', '1713878330.jpg', '$2y$12$VOYst/LPO/4yjn3xFAplQew9FVoa5ejcVqi7ek2MZQ9WKK68Ul9/6', 'Puttalam', 745896128, 'Admin', '2024-04-23 07:48:51', '2024-04-24 02:39:32');

-- --------------------------------------------------------

--
-- Table structure for table `books_tables`
--

CREATE TABLE `books_tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books_tables`
--

INSERT INTO `books_tables` (`id`, `book_title`, `author`, `publisher`, `year`, `quantity`, `created_at`, `updated_at`) VALUES
(4, 'Pride and Prejudice', 'Jane Austen', 'Jane Austen', '1813', '21', '2024-04-24 02:32:04', '2024-04-24 07:05:24'),
(6, 'One Hundred Years of Solitude', 'George Orwell', 'George Orwell', '1984', '35', '2024-04-24 03:30:38', '2024-04-24 03:30:38'),
(7, 'Wuthering Heights', 'Emily Brontë', 'Emily Brontë', '1847', '38', '2024-04-24 03:31:07', '2024-04-24 07:01:44'),
(9, 'The Great Gatsby', 'Musharraf', 'Ram', '2024', '20', '2024-04-24 05:11:04', '2024-04-24 05:11:04'),
(10, 'War and Peace', 'F. Scott Fitzgerald', 'Francis Cugat', '2013', '18', '2024-04-24 05:14:03', '2024-04-24 05:14:03'),
(11, 'Lolita', 'Vladimir Nabokov', 'Vladimir Nabokov', '1847', '9', '2024-04-24 05:35:54', '2024-04-24 09:23:52');

-- --------------------------------------------------------

--
-- Table structure for table `book_recommendations`
--

CREATE TABLE `book_recommendations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `borrowed_books`
--

CREATE TABLE `borrowed_books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `borrowed_date` varchar(255) NOT NULL,
  `return_date` varchar(255) NOT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `book_id` int(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `borrowed_books`
--

INSERT INTO `borrowed_books` (`id`, `book_name`, `user_name`, `borrowed_date`, `return_date`, `amount`, `status`, `action`, `created_at`, `updated_at`, `book_id`) VALUES
(1, 'The Great Gatsby', 'musharraf', '2024-04-23', '2024-04-25', 200.00, 'Returned', 'Paid', '2024-04-23 00:10:42', '2024-04-23 00:11:57', 1),
(2, 'The Great Gatsby', 'Kumar', '2024-04-02', '2024-04-17', 1500.00, 'returned', 'Paid', '2024-04-23 00:16:12', '2024-04-24 01:43:55', 1),
(3, 'The Great Gatsby', 'Atheef', '2024-04-23', '2024-04-24', 100.00, 'Returned', 'Paid', '2024-04-23 00:17:57', '2024-04-23 13:31:11', 1),
(4, 'The Great Gatsby', 'Dhasun', '2024-04-23', '2024-04-24', 100.00, 'not return', 'Not Paid', '2024-04-23 07:52:41', '2024-04-24 01:28:09', 1),
(5, 'The Great Gatsby', 'Abdhul', '2024-04-23', '2024-04-24', 100.00, 'Returned', 'Paid', '2024-04-23 07:55:31', '2024-04-24 07:04:07', 1),
(6, 'The Great Gatsby', 'musharraf', '2024-04-23', '2024-04-24', 100.00, 'Returned', 'Not Paid', '2024-04-23 08:55:56', '2024-04-23 14:01:11', 1),
(7, 'The Great Gatsby', 'Hasaranga', '2024-04-23', '2024-04-24', 100.00, 'Returned', 'Not Paid', '2024-04-23 08:58:48', '2024-04-23 14:01:48', 1),
(8, 'The Great Gatsby', 'Kumar', '2024-04-24', '2024-04-25', 100.00, 'Returned', 'Paid', '2024-04-23 23:14:33', '2024-04-24 02:34:44', 2),
(9, 'The Great Gatsby', 'Kumar', '2024-04-24', '2024-04-25', 100.00, 'Returned', 'Not Paid', '2024-04-23 23:36:05', '2024-04-23 23:36:11', 1),
(10, 'The Great Gatsby', 'Dhasun', '2024-04-24', '2024-04-25', 100.00, 'returned', 'Not Paid', '2024-04-23 23:51:09', '2024-04-24 01:18:42', 1),
(11, 'The Great Gatsby', 'Dhasun', '2024-04-24', '2024-04-25', 100.00, 'Returned', 'Not Paid', '2024-04-24 00:01:11', '2024-04-24 00:01:17', 2),
(12, 'The Great Gatsby', 'musharraf', '2024-04-24', '2024-04-25', 100.00, 'returned', 'Not Paid', '2024-04-24 00:52:12', '2024-04-24 01:50:23', 2),
(13, 'The Great Gatsby', 'Hasaranga', '2024-04-24', '2024-04-25', 100.00, 'returned', 'Not Paid', '2024-04-24 01:14:17', '2024-04-24 01:16:49', 1),
(14, 'The Great Gatsby', 'Abdhul', '2024-04-24', '2025-04-25', 36600.00, 'returned', 'Not Paid', '2024-04-24 01:15:21', '2024-04-24 01:17:53', 1),
(15, 'Pride and Prejudice', 'musharraf', '2024-04-24', '2024-04-25', 100.00, 'returned', 'Not Paid', '2024-04-24 02:33:25', '2024-04-24 02:33:34', 4),
(16, 'Pride and Prejudice', 'Abdhul', '2024-04-24', '2024-04-26', 200.00, 'returned', 'Not Paid', '2024-04-24 02:34:00', '2024-04-24 07:05:24', 4),
(17, 'Pride and Prejudice', 'musharraf', '2024-04-24', '2024-04-24', 0.00, 'returned', 'Paid', '2024-04-24 03:13:02', '2024-04-24 09:20:17', 4),
(18, 'Wuthering Heights', 'Atheef', '2024-04-24', '2024-04-25', 100.00, 'returned', 'Not Paid', '2024-04-24 07:01:37', '2024-04-24 07:01:44', 7),
(19, 'Lolita', 'Faiz', '2024-04-17', '2024-04-19', 200.00, 'Not Returned', 'Not Paid', '2024-04-24 09:23:52', '2024-04-24 09:23:52', 11);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `common_tables`
--

CREATE TABLE `common_tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_04_03_053717_create_common_tables_table', 1),
(5, '2024_04_08_065452_create_admin_tables_table', 1),
(6, '2024_04_09_070029_create_admin_messages_table', 1),
(7, '2024_04_09_084237_create_user_tables_table', 1),
(8, '2024_04_13_031721_create_books_tables_table', 1),
(9, '2024_04_16_045822_create_borrowed_books_table', 1),
(10, '2024_04_17_111459_create_user_messages_table', 1),
(11, '2024_04_18_044052_create_book_recommendations_table', 1),
(12, '2024_04_18_065023_add_amount_to_borrowed_books_table', 1),
(13, '2024_04_22_010857_create_user_logins_table', 1),
(14, '2024_04_22_115812_create_recommendations_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recommendations`
--

CREATE TABLE `recommendations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Book_id` varchar(255) NOT NULL,
  `Book_Title` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('9Si4UnmKXAytNrK6WNJP1csT5Vqr7JtdlRZRRbrd', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYktGdVZqSlNUYmlxOU5wcU9sTHpQbHh5Slk0QkJuck5KNUpISmc5dCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9hbGxfYm9va3MiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjU3OiJsb2dpbl91c2VyVGFibGVzXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDt9', 1713983088),
('W6zNlg8qJilYhzbUpngNvKlbik0SvbE3ZEy5CU9H', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUkgwMHBlcTY2TXJQTFJORWJNU0ROUUZJZ3Y3ODhLQ0Mwa2F4aHJWciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2Vycy9yZWNvbW1lbmRfYm9va3MiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjU3OiJsb2dpbl91c2VyVGFibGVzXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDt9', 1714021367);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_logins`
--

CREATE TABLE `user_logins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_messages`
--

CREATE TABLE `user_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_messages`
--

INSERT INTO `user_messages` (`id`, `name`, `message`, `created_at`, `updated_at`) VALUES
(3, 'Ram', 'dfgdg', '2024-04-24 03:11:49', '2024-04-24 03:11:49');

-- --------------------------------------------------------

--
-- Table structure for table `user_tables`
--

CREATE TABLE `user_tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_tables`
--

INSERT INTO `user_tables` (`id`, `name`, `email`, `image`, `password`, `address`, `contact`, `created_at`, `updated_at`) VALUES
(1, 'Williams2', 'Williams@gmail.com', '1713848520.jpg', '$2y$12$gl61mVt.HVOAeUiKVsY7aOE/iRvRosiz2vp8FAfeEZwBbdGv7VU26', 'Puttalam', 78654123, '2024-04-22 23:32:00', '2024-04-23 07:51:19'),
(4, 'Kumar', 'kumar@gmail.com', '1713961777.jpg', '$2y$12$k40jA8uxTSltNsO0Lxf..e1PUPhJ6AFQv/ncdhJqltk9avwqiPp2a', 'Puttalam', 745698123, '2024-04-24 06:59:37', '2024-04-24 06:59:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_messages`
--
ALTER TABLE `admin_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_tables`
--
ALTER TABLE `admin_tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books_tables`
--
ALTER TABLE `books_tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_recommendations`
--
ALTER TABLE `book_recommendations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `common_tables`
--
ALTER TABLE `common_tables`
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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `recommendations`
--
ALTER TABLE `recommendations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_logins`
--
ALTER TABLE `user_logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_messages`
--
ALTER TABLE `user_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tables`
--
ALTER TABLE `user_tables`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_messages`
--
ALTER TABLE `admin_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admin_tables`
--
ALTER TABLE `admin_tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `books_tables`
--
ALTER TABLE `books_tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `book_recommendations`
--
ALTER TABLE `book_recommendations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `common_tables`
--
ALTER TABLE `common_tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `recommendations`
--
ALTER TABLE `recommendations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_logins`
--
ALTER TABLE `user_logins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_messages`
--
ALTER TABLE `user_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_tables`
--
ALTER TABLE `user_tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
