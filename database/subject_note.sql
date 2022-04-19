-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2022 at 02:47 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `subject_note`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(10) UNSIGNED NOT NULL,
  `note` text NOT NULL,
  `ma_Mon` varchar(8) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `note`, `ma_Mon`, `user_id`, `created_at`, `updated_at`) VALUES
(78, 'Chuẩn bị thi học kì', 'CT273', 10, '2022-04-19 07:44:24', '2022-04-19 07:44:24'),
(79, 'Tuần sau nghỉ', 'CT296', 10, '2022-04-19 07:45:33', '2022-04-19 07:45:33');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `so_chi` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `teacher` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ma_subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_name`, `so_chi`, `teacher`, `ma_subject`, `user_id`, `created_at`, `updated_at`) VALUES
(9, 'Lý Thuyết Đồ Thị', '3', 'Lê Thị Phương Dung', 'CT175', 10, '2022-04-19 07:41:07', '2022-04-19 07:41:07'),
(10, 'Quản Trị Hệ Thống', '3', 'Bùi Võ Quốc Bảo', 'CT179', 10, '2022-04-19 07:41:32', '2022-04-19 07:41:32'),
(11, 'Ngôn Ngữ Mô Hình Hóa', '3', 'Nguyễn Thanh Hải', 'CT182', 10, '2022-04-19 07:42:03', '2022-04-19 07:42:03'),
(12, 'Giao Diện Người Máy', '4', 'Bùi Đăng Phương Hà', 'CT273', 10, '2022-04-19 07:42:58', '2022-04-19 07:42:58'),
(13, 'Phân Tích Và Thiết Kế Hệ Thống', '3', 'Trương Quốc Định', 'CT296', 10, '2022-04-19 07:43:47', '2022-04-19 07:43:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(6, 'Student', 'student@cit.ctu.edu.vn', '$2y$10$Use.MHRzGdW3IVu0dqVNT.Wnmibj0eNPr8q7RFlclQlbAWNUQtvPu', '2016-10-08 15:20:51', '2016-10-08 15:20:51'),
(10, 'Phan Thái Hiền', 'phanthaihien000@gmail.com', '$2y$10$xkc3D9IIadIy7tLBRlgFT.p.KpOb8pXsVgnl04umttA1k5jAUpXSG', '2022-04-10 06:06:26', '2022-04-10 06:06:26'),
(11, 'Phan Thái Hiền', 'hient1800155@student.ctu.edu.vn', '$2y$10$fTN5LZvqkm/mVwIljrNUZeYC8VZdq26EBkVwNpsJE8M78yZgexgNu', '2022-04-11 14:23:45', '2022-04-11 14:23:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `note_id_user_forein` (`user_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subjects_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
