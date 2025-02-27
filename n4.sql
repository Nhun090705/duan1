-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 06, 2025 at 09:02 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `n4`
--

-- --------------------------------------------------------

--
-- Table structure for table `binh_luans`
--

CREATE TABLE `binh_luans` (
  `id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `tai_khoan_id` int NOT NULL,
  `noi_dung` text NOT NULL,
  `ngay_dang` date NOT NULL,
  `trang_thai` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `binh_luans`
--

INSERT INTO `binh_luans` (`id`, `san_pham_id`, `tai_khoan_id`, `noi_dung`, `ngay_dang`, `trang_thai`) VALUES
(1, 1, 22, 'giày đẹp', '2024-12-04', 1),
(2, 1, 23, 'giày siêu đẹp luôn, mê luôn', '2024-12-01', 1),
(11, 2, 23, 'Giày siêu siêu đẹp', '2024-12-11', 1),
(12, 1, 19, 'Giày chất', '2024-12-10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hangs`
--

CREATE TABLE `chi_tiet_don_hangs` (
  `id` int NOT NULL,
  `don_hang_id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `don_gia` decimal(10,2) NOT NULL,
  `so_luong` int NOT NULL,
  `thanh_tien` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chi_tiet_don_hangs`
--

INSERT INTO `chi_tiet_don_hangs` (`id`, `don_hang_id`, `san_pham_id`, `don_gia`, `so_luong`, `thanh_tien`) VALUES
(1, 1, 2, '12000.00', 3, '36000.00'),
(2, 1, 1, '12000.00', 5, '60000.00'),
(3, 3, 4, '12000.00', 5, '60000.00'),
(4, 4, 6, '123000.00', 2, '246000.00'),
(5, 5, 1, '4500000.00', 2, '9000000.00'),
(6, 6, 5, '999999.00', 1, '999999.00'),
(7, 7, 1, '4500000.00', 1, '4500000.00'),
(8, 8, 2, '6900000.00', 1, '6900000.00'),
(9, 8, 4, '10000.00', 1, '10000.00'),
(10, 10, 2, '6900000.00', 3, '20700000.00'),
(11, 12, 2, '6900000.00', 1, '6900000.00'),
(12, 14, 5, '999999.00', 1, '999999.00'),
(13, 14, 1, '4500000.00', 1, '4500000.00'),
(14, 16, 5, '999999.00', 1, '999999.00'),
(15, 20, 1, '4500000.00', 1, '4500000.00'),
(16, 21, 4, '10000.00', 2, '20000.00'),
(17, 22, 1, '4500000.00', 1, '4500000.00'),
(18, 23, 2, '6900000.00', 7, '48300000.00'),
(19, 24, 2, '6900000.00', 1, '6900000.00'),
(20, 24, 4, '10000.00', 1, '10000.00'),
(21, 25, 2, '6900000.00', 1, '6900000.00'),
(22, 25, 4, '10000.00', 2, '20000.00');

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_gio_hangs`
--

CREATE TABLE `chi_tiet_gio_hangs` (
  `id` int NOT NULL,
  `gio_hang_id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `so_luong` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chi_tiet_gio_hangs`
--

INSERT INTO `chi_tiet_gio_hangs` (`id`, `gio_hang_id`, `san_pham_id`, `so_luong`) VALUES
(4, 3, 5, 11),
(5, 3, 6, 5),
(6, 3, 8, 2),
(7, 3, 4, 3),
(8, 3, 1, 19),
(9, 3, 2, 11),
(10, 3, 9, 1),
(30, 25, 4, 1),
(31, 27, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chuc_vus`
--

CREATE TABLE `chuc_vus` (
  `id` int NOT NULL,
  `ten_chuc_vu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danh_mucs`
--

CREATE TABLE `danh_mucs` (
  `id` int NOT NULL,
  `ten_danh_muc` varchar(255) NOT NULL,
  `mo_ta` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `danh_mucs`
--

INSERT INTO `danh_mucs` (`id`, `ten_danh_muc`, `mo_ta`) VALUES
(1, 'giày cổ cao', 'hotttttt'),
(2, 'giày cổ thấp', 'hotttt search'),
(3, 'giay the thao adidas', 'hang xin    '),
(4, 'giày samba 2024', 'hàng rep 1:2\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `don_hangs`
--

CREATE TABLE `don_hangs` (
  `id` int NOT NULL,
  `ma_don_hang` varchar(50) NOT NULL,
  `tai_khoan_id` int NOT NULL,
  `ten_nguoi_nhan` varchar(255) NOT NULL,
  `email_nguoi_nhan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sdt_nguoi_nhan` varchar(15) NOT NULL,
  `dia_chi_nguoi_nhan` text NOT NULL,
  `ngay_dat` date NOT NULL,
  `tong_tien` decimal(10,2) NOT NULL,
  `ghi_chu` text,
  `phuong_thuc_thanh_toan_id` int NOT NULL,
  `trang_thai_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `don_hangs`
--

INSERT INTO `don_hangs` (`id`, `ma_don_hang`, `tai_khoan_id`, `ten_nguoi_nhan`, `email_nguoi_nhan`, `sdt_nguoi_nhan`, `dia_chi_nguoi_nhan`, `ngay_dat`, `tong_tien`, `ghi_chu`, `phuong_thuc_thanh_toan_id`, `trang_thai_id`) VALUES
(22, 'DH-7956', 21, 'đam11', 'damvu134@gmail.com', '0123456789', 'ưdesfdc', '2024-11-29', '4530000.00', '', 1, 5),
(23, 'DH-6440', 20, 'đam', 'damvtph49192@gmail.com', '0123456789', 'ưdesfdc', '2024-12-01', '48330000.00', '', 1, 4),
(24, 'DH-4141', 20, 'đam', 'damvtph49192@gmail.com', '0123456789', 'ưdesfdc', '2024-12-01', '6940000.00', '', 1, 1),
(25, 'DH-7935', 23, 'lan', 'damvtph49192@gmail.com', '0123456789', 'ưdesfdc', '2024-12-01', '6950000.00', '', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `gio_hangs`
--

CREATE TABLE `gio_hangs` (
  `id` int NOT NULL,
  `tai_khoan_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `gio_hangs`
--

INSERT INTO `gio_hangs` (`id`, `tai_khoan_id`) VALUES
(3, 11),
(25, 20),
(26, 22),
(27, 23);

-- --------------------------------------------------------

--
-- Table structure for table `phuong_thuc_thanh_toans`
--

CREATE TABLE `phuong_thuc_thanh_toans` (
  `id` int NOT NULL,
  `ten_phuong_thuc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `phuong_thuc_thanh_toans`
--

INSERT INTO `phuong_thuc_thanh_toans` (`id`, `ten_phuong_thuc`) VALUES
(1, 'COD(thanh toán khi nhận hàng)'),
(2, 'Thanh toán online');

-- --------------------------------------------------------

--
-- Table structure for table `san_phams`
--

CREATE TABLE `san_phams` (
  `id` int NOT NULL,
  `ten_san_pham` varchar(255) NOT NULL,
  `gia_san_pham` decimal(10,2) NOT NULL,
  `gia_khuyen_mai` decimal(10,2) DEFAULT NULL,
  `hinh_anh` varchar(255) DEFAULT NULL,
  `so_luong` int NOT NULL,
  `luot_xem` int DEFAULT '0',
  `ngay_nhap` date NOT NULL,
  `mo_ta` text,
  `danh_muc_id` int NOT NULL,
  `trang_thai` tinyint NOT NULL DEFAULT '1',
  `ngay_cap_nhat_luot_xem` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `san_phams`
--

INSERT INTO `san_phams` (`id`, `ten_san_pham`, `gia_san_pham`, `gia_khuyen_mai`, `hinh_anh`, `so_luong`, `luot_xem`, `ngay_nhap`, `mo_ta`, `danh_muc_id`, `trang_thai`, `ngay_cap_nhat_luot_xem`) VALUES
(1, 'cho phu quoc lông dàiiiiii', '5000000.00', '4500000.00', './upload/1732520878madaothanhcaong.jpg', 5, 0, '2024-11-05', 'cho long dai phu quoc dong moi nhat', 1, 1, NULL),
(2, 'giày xịn đăng cấp pro', '7899999.00', '6900000.00', './upload/1732520917z6000485476890_25fd3654f277b9738b3aca4c4a19a1ef.jpg', 8, 0, '2024-11-05', 'giày ngon bỏ rẻ', 4, 2, NULL),
(4, 'giay adidas nam 2024', '123000.00', '10000.00', './upload/1732521139images.jpg', 10, 0, '2024-11-13', 'giay dep re', 1, 1, NULL),
(5, 'giay 2100', '123000.00', '999999.00', './upload/1732521118tải xuống (2).jpg', 76, 0, '2024-11-22', 'giày mới nhập về', 4, 1, NULL),
(6, 'giày tdb', '317000.00', '123000.00', './upload/1732521111tải xuống (1).jpg', 12, 0, '2024-12-01', 'giày 123 xịn quá nha', 3, 1, NULL),
(8, 'giày sambaa 2025555', '290000.00', '190000.00', './upload/1732521081tải xuống.jpg', 23, 0, '2024-11-08', 'giày đẹp cho phong cách\r\n', 4, 1, NULL),
(9, 'giay adidas nam', '278900.00', '100000.00', './upload/1732521640images (1).jpg', 12, 0, '2024-11-07', 'hottt trend', 2, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tai_khoans`
--

CREATE TABLE `tai_khoans` (
  `id` int NOT NULL,
  `ho_ten` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `anh_dai_dien` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `ngay_sinh` date DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `gioi_tinh` tinyint(1) NOT NULL DEFAULT '1',
  `dia_chi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `mat_khau` varchar(255) NOT NULL,
  `chuc_vu_id` int NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tai_khoans`
--

INSERT INTO `tai_khoans` (`id`, `ho_ten`, `anh_dai_dien`, `ngay_sinh`, `email`, `so_dien_thoai`, `gioi_tinh`, `dia_chi`, `mat_khau`, `chuc_vu_id`, `trang_thai`) VALUES
(1, 'trinh dang bao', NULL, '2005-07-31', 'trinhdangbao2005@gmail.com', '0813869087    ', 1, '', '$2y$10$J09nk9dDZ8/3vFwInEZno.IGtHiKbshZCyBqId/7VzK6D5fr3QoKq', 1, 1),
(19, 'Vu The Dam', 'https://th.bing.com/th?id=OIP.4akau9Zyzq-ioaE0S_YVrwHaHa&w=250&h=250&c=8&rs=1&qlt=90&o=6&dpr=1.3&pid=3.1&rm=2', NULL, 'damvuthe2005@gmail.com', NULL, 1, NULL, '$2y$10$Kl.kkwl3NlaxNoUBJjrB3uH6It0o7WKK4jIpSFVQD98UUeehKOF0S', 2, 1),
(20, 'đam', NULL, NULL, 'damvtph49192@gmail.com', NULL, 1, NULL, '$2y$10$rKrMDNcSWlvf6rcckEfi0OCQ29NIATK2ZgxIn2HrzvIC2usrPdiBS', 1, 1),
(21, 'đam11', NULL, NULL, 'damvu134@gmail.com', NULL, 1, NULL, '$2y$10$XNvAA2/UQ3ezZtQ.UGvQU.eKznS1K8Zxml//GyXv9ScIjXM2bBuju', 2, 1),
(22, 'hùng', 'https://th.bing.com/th?id=OIP.qUBh6RMHZSV2nMYwcPfaVAHaEi&w=319&h=195&c=8&rs=1&qlt=90&o=6&dpr=1.3&pid=3.1&rm=2', NULL, 'hung@gmail.com', NULL, 1, NULL, '$2y$10$hKiQm7v92pSx81Yj.3.iheB.PB9CDbnN45WB5Fd/upJlxm0NHlIIm', 2, 1),
(23, 'lan', 'https://th.bing.com/th?id=OIP.n2J-te2edVD91F8w6udMmgHaHa&w=250&h=250&c=8&rs=1&qlt=90&o=6&dpr=1.3&pid=3.1&rm=2', NULL, 'lan@gmail.com', NULL, 1, NULL, '$2y$10$OCodbFLR9VrBGW87sSWM0ebcXILYk466cZEPH/B7duXQ96e75jLxm', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trang_thai_don_hangs`
--

CREATE TABLE `trang_thai_don_hangs` (
  `id` int NOT NULL,
  `ten_trang_thai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `trang_thai_don_hangs`
--

INSERT INTO `trang_thai_don_hangs` (`id`, `ten_trang_thai`) VALUES
(1, 'chưa xác nhận'),
(2, 'đã xác nhận'),
(3, 'Đang chuẩn bị hàng'),
(4, 'Đang giao'),
(5, 'Đã giao thành công'),
(6, 'Hoàn hàng'),
(7, 'Hủy hàng');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binh_luans`
--
ALTER TABLE `binh_luans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chi_tiet_gio_hangs`
--
ALTER TABLE `chi_tiet_gio_hangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chuc_vus`
--
ALTER TABLE `chuc_vus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phuong_thuc_thanh_toans`
--
ALTER TABLE `phuong_thuc_thanh_toans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `san_phams`
--
ALTER TABLE `san_phams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tai_khoans`
--
ALTER TABLE `tai_khoans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `trang_thai_don_hangs`
--
ALTER TABLE `trang_thai_don_hangs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binh_luans`
--
ALTER TABLE `binh_luans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `chi_tiet_gio_hangs`
--
ALTER TABLE `chi_tiet_gio_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `chuc_vus`
--
ALTER TABLE `chuc_vus`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `don_hangs`
--
ALTER TABLE `don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `phuong_thuc_thanh_toans`
--
ALTER TABLE `phuong_thuc_thanh_toans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `san_phams`
--
ALTER TABLE `san_phams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tai_khoans`
--
ALTER TABLE `tai_khoans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `trang_thai_don_hangs`
--
ALTER TABLE `trang_thai_don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
