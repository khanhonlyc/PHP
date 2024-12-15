-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 15, 2024 lúc 04:57 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `form_example`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `business_types` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`business_types`)),
  `KhuVuc` varchar(256) NOT NULL,
  `SanPhamDichVu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `files`
--

INSERT INTO `files` (`id`, `name`, `email`, `file_path`, `created_at`, `business_types`, `KhuVuc`, `SanPhamDichVu`) VALUES
(1, 'sdfse', 'khanhonlyc@gmail.com', 'uploads/675ce9fea4f84_tai-hinh-anh-cong-giao-dep-nhat-cho-may.jpg', '2024-12-14 02:09:25', '', '', ''),
(2, 'B', 'khanhonlyc2@gmail.com', 'uploads/675d47e352e23_dang-thanh-gia-chu-de-dong-hanh-voi-nguoi-tre-va-cau-nguyen-trong-dai-dich-covid-191954834.jpg', '2024-12-14 08:54:59', '', '', ''),
(3, 'Nguyễn Quốc Khánh', 'kkk@gmail.com', 'uploads/675d53e3a7fca_tai-hinh-anh-cong-giao-dep-nhat-cho-may.jpg', '2024-12-14 09:46:11', '[\"X\\u00e2y d\\u1ef1ng\",\"Gi\\u00e1o d\\u1ee5c\",\"Y t\\u1ebf\"]', '', ''),
(4, 'KAIN GUENKUOKKU', 'khanhonlyc444@gmail.com', 'uploads/675d57e6a37f8_tải xuống (2).jpg', '2024-12-14 10:03:18', '[\"X\\u00e2y d\\u1ef1ng\",\"Gi\\u00e1o d\\u1ee5c\"]', 'Miền Trung', ''),
(5, 'dd', 'khanhonlyc12312@gmail.com', 'uploads/675e2f909ffd6_dang-thanh-gia-chu-de-dong-hanh-voi-nguoi-tre-va-cau-nguyen-trong-dai-dich-covid-191954834.jpg', '2024-12-15 01:23:28', '[\"X\\u00e2y d\\u1ef1ng\",\"Y t\\u1ebf\"]', 'Miền Nam', '[\"Dich vu NNNNN\",\"DIch vu CKKKKK\",\"Dich vu F\",\" Dich vu YYY\",\"\"]');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
