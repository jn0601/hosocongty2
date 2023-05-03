-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 03, 2023 at 05:06 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hosocongty`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_info`
--

DROP TABLE IF EXISTS `company_info`;
CREATE TABLE IF NOT EXISTS `company_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `tax_code` varchar(255) NOT NULL,
  `founding_date` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company_info`
--

INSERT INTO `company_info` (`id`, `company_name`, `address`, `tax_code`, `founding_date`, `created_at`) VALUES
(1, 'CÔNG TY TNHH XÂY DỰNG VÀ THƯƠNG MẠI MINH HẢI PHÁT', 'Địa chỉ: Tổ dân phố 1, Thị Trấn Hương Sơn, Huyện Phú Bình, Tỉnh Thái Nguyên', '4601604356', '29/04/2023', 'UTC'),
(2, 'CÔNG TY TNHH CƠ KHÍ CÔNG NGHIỆP LÂM AN', 'Địa chỉ: Số 429 Nguyễn Thiện Thuật, Phường Nhân Hòa, Thị xã Mỹ Hào, Tỉnh Hưng Yên', '0901139085', '29/04/2023', 'UTC'),
(3, 'CÔNG TY TNHH THỰC PHẨM CÔNG NGHIỆP VĂN NHẤT HÀ NỘI', 'Địa chỉ: Thôn Ngọc Lãng, Xã Ngọc Lâm, Thị xã Mỹ Hào, Tỉnh Hưng Yên', '0901139247', '29/04/2023', 'UTC'),
(4, 'CÔNG TY TNHH THƯƠNG MẠI VẬN TẢI XÂY DỰNG PHÚC PHÚC THỊNH', 'Địa chỉ: 3/1 Ấp 5, Xã Đông Thạnh, Huyện Hóc Môn, Thành phố Hồ Chí Minh', '0317808290', '29/04/2023', 'UTC'),
(5, 'CÔNG TY TNHH THƯƠNG MẠI XUẤT NHẬP KHẨU VITAGLOW', 'Địa chỉ: Thôn Trâu Quỳ, Xã Dương Xá, Huyện Gia Lâm, Thành phố Hà Nội', '0110334598', '29/04/2023', 'UTC'),
(6, 'CÔNG TY TNHH TM & DV VẬN TẢI ĐỖ GIA', 'Địa chỉ: Thôn Thượng Tân, Xã Vĩnh Khúc, Huyện Văn Giang, Tỉnh Hưng Yên', '0901139215', '29/04/2023', 'UTC'),
(7, 'CÔNG TY CỔ PHẦN MÔI TRƯỜNG HẢI HÀ XANH', 'Địa chỉ: Số 36 ngõ 48 Ngọc Hồi, Phường Hoàng Liệt, Quận Hoàng Mai, Thành phố Hà Nội', '0110333509', '29/04/2023', 'UTC'),
(8, 'CÔNG TY TNHH THƯƠNG MẠI VÀ DỊCH VỤ DU LỊCH PHÁP VĂN', 'Địa chỉ: 21 Nguyễn Huệ, Phường Hải Cảng, Thành phố Quy Nhơn, Tỉnh Bình Định', '4101628158', '29/04/2023', 'UTC'),
(9, 'CÔNG TY TNHH XĂNG DẦU NGUYỄN THÁI SƠN', 'Địa chỉ: Xóm Khẩu Đưa, Xã Phú Đình, Huyện Định Hoá, Tỉnh Thái Nguyên', '4601604388', '29/04/2023', 'UTC'),
(10, 'CÔNG TY TNHH MTV THIẾT BỊ ĐIỆN TH', 'Địa chỉ: Đường Nguyễn Lân, Phường Bần Yên Nhân, Thị xã Mỹ Hào, Tỉnh Hưng Yên', '0901139261', '29/04/2023', 'UTC'),
(11, 'CÔNG TY TNHH MỘT THÀNH VIÊN XÂY LẮP ĐIỆN VINH PHÁT', 'Địa chỉ: Số 40 đường Kinh xáng Bạc Liêu, khóm 8, Phường 6, Thành phố Cà Mau, Tỉnh Cà Mau', '2001368583', '29/04/2023', 'UTC'),
(12, 'CÔNG TY TNHH DỊCH VỤ THƯƠNG MẠI VÀ QUẢNG CÁO HỮU NHUẬN', 'Địa chỉ: Yên Hạ 2, Thị Trấn Yên Thịnh, Huyện Yên Mô, Tỉnh Ninh Bình', '2700952992', '29/04/2023', 'UTC');

-- --------------------------------------------------------

--
-- Table structure for table `founding_date`
--

DROP TABLE IF EXISTS `founding_date`;
CREATE TABLE IF NOT EXISTS `founding_date` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
