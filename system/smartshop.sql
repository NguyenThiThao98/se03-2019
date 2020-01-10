-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2018 at 10:16 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT 'public/images/user.png',
  `role` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `email`, `phone`, `fullname`, `address`, `img`, `role`, `created_at`, `updated_at`, `status`) VALUES
(1, 'admin', 'admin123', 'admin@gmail.com', '0914249694', 'Nguyến Văn Admin', 'Nam định', 'public/images/img.jpg', 1, '2018-05-21', '2018-05-21', 1),
(2, 'Monkey D.Dragon', '600c849881fb596aacc5', 'oda@onepiece.jp', '01234731395', 'Dragon', 'Japan', 'public/images/user.png', 0, '2018-05-21', NULL, 1),
(3, 'sdfsdf', '2292fbd5a58d91c10ea2', 'dfsdfsdf', 'sdfsdfsdf', 'dsfdsfsdfsdf', '', 'public/images/user.png', 0, '2018-05-21', NULL, 0),
(4, 'wesdfdsf', 'd58e3582afa99040e27b', 'sdfsdfsdfwer', 'sdfsdfsdf', 'sdfsdfsdf', '', 'public/images/user.png', 0, '2018-05-21', NULL, 0),
(5, 'fghfg', 'e734d367553d90266fe8', 'hgfhgfh', 'fghgfhgfh', 'gfhgfhgf', '', 'public/images/user.png', 0, '2018-05-21', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `description` text,
  `position` varchar(255) DEFAULT NULL,
  `created_at` date NOT NULL,
  `update_at` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `created_at` date NOT NULL,
  `update_at` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `logo`, `image`, `description`, `meta_title`, `meta_keyword`, `meta_description`, `created_at`, `update_at`, `status`) VALUES
(1, 'Apple', 'Apple', NULL, NULL, NULL, NULL, NULL, NULL, '2018-05-23', NULL, 1),
(2, 'Sony', 'Sony', NULL, NULL, NULL, NULL, NULL, NULL, '2018-05-23', NULL, 1),
(3, 'Asus', 'asus', NULL, NULL, NULL, NULL, NULL, NULL, '2018-05-23', NULL, 1),
(4, 'Xiaomi', 'xiaomi', NULL, NULL, NULL, NULL, NULL, NULL, '2018-05-23', NULL, 1),
(5, 'Samsung', 'samsung', NULL, NULL, NULL, NULL, NULL, NULL, '2018-05-23', NULL, 1),
(6, 'Kingston', 'Kingston', NULL, NULL, 'Hãng sản xuất thẻ nhớ ', NULL, NULL, NULL, '2018-05-23', NULL, 1),
(7, 'Unik', 'unik', NULL, NULL, 'Hãng sản xuất tai nghe, ốp lưng ..', NULL, NULL, NULL, '2018-05-23', NULL, 1),
(8, 'iCORE', 'iCORE', NULL, NULL, 'Hãng sản xuất sạc cáp điện thoại', NULL, NULL, NULL, '2018-05-23', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `usage_limit_per_user` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `provicence_id` int(11) DEFAULT NULL,
  `districts_id` int(11) DEFAULT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  `customer_group_id` int(11) DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `fullname`, `email`, `phone`, `address`, `provicence_id`, `districts_id`, `gender`, `password`, `customer_group_id`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Kotono', 'korokoro@gmail.com', '01234731395', '337,Cầu giấy', 59, 358, 1, '123456abcde', NULL, '2018-05-24', '2018-05-24', 1),
(2, 'customer_test', 'testter@gmail.com', '0124753951', '338.Cầu gò', 50, 537, 1, '123456abcde', NULL, '2018-05-24', '2018-05-24', 1),
(3, 'tranthutrang', 'trang@gmail.com', '12345666666', 'Thai Binh', 22, 241, 0, '1232211abc', NULL, '2018-05-24', '2018-05-24', 1),
(4, 'nguyendonghung', 'hung@gmail.com', '0167881545845', 'Thái Binh', 22, 242, 1, '1245abc', NULL, '2018-05-27', '2018-05-27', 1),
(5, 'danghuycanh', 'canh@gmail.com', '0231456789', 'Nam Định', 24, 230, 1, '123abcd', NULL, '2018-05-25', '2018-05-25', 0),
(6, 'nguyenthianh', 'anh@gmail.com', '012457954', 'Hải Dương', 19, 145, 0, '45ghj', NULL, '2018-05-01', '2018-05-01', 0),
(7, 'nguyenbagiap', 'giap@gmail.com', '012457896554', 'Nam Định', 24, 158, 1, '154acb', NULL, '2018-05-26', '2018-05-27', 1),
(8, 'dovanthang', 'thang@gmail.com', '1245875224', 'Hưng Yên', 21, 402, NULL, '158fgh', NULL, '2018-05-03', '2018-05-03', 1),
(9, 'nguyentiendung', 'dung@gmail.com', '019823222', 'Hải Phòng', 20, 278, 1, '123abcdf', NULL, '2018-05-11', '2018-05-11', 0),
(11, 'nguyenlananh', 'anhn@gmail.com', '0193847554', 'Hà Nội', 15, 665, 0, '456rgf', NULL, '2018-05-07', '2018-05-07', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers_group`
--

CREATE TABLE `customers_group` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `province_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `province_id`) VALUES
(2, 'Quận Ba Đình', 1),
(3, 'Quận Hoàn Kiếm', 1),
(4, 'Quận Tây Hồ', 1),
(5, 'Quận Long Biên', 1),
(6, 'Quận Cầu Giấy', 1),
(7, 'Quận Đống Đa', 1),
(8, 'Quận Hai Bà Trưng', 1),
(9, 'Quận Hoàng Mai', 1),
(10, 'Quận Thanh Xuân', 1),
(11, 'Huyện Sóc Sơn', 1),
(12, 'Huyện Đông Anh', 1),
(13, 'Huyện Gia Lâm', 1),
(14, 'Quận Nam Từ Liêm', 1),
(15, 'Huyện Thanh Trì', 1),
(16, 'Quận Bắc Từ Liêm', 1),
(17, 'Huyện Mê Linh', 1),
(18, 'Quận Hà Đông', 1),
(19, 'Thị xã Sơn Tây', 1),
(20, 'Huyện Ba Vì', 1),
(21, 'Huyện Phúc Thọ', 1),
(22, 'Huyện Đan Phượng', 1),
(23, 'Huyện Hoài Đức', 1),
(24, 'Huyện Quốc Oai', 1),
(25, 'Huyện Thạch Thất', 1),
(26, 'Huyện Chương Mỹ', 1),
(27, 'Huyện Thanh Oai', 1),
(28, 'Huyện Thường Tín', 1),
(29, 'Huyện Phú Xuyên', 1),
(30, 'Huyện Ứng Hòa', 1),
(31, 'Huyện Mỹ Đức', 1),
(32, 'Thành phố Hà Giang', 2),
(33, 'Huyện Đồng Văn', 2),
(34, 'Huyện Mèo Vạc', 2),
(35, 'Huyện Yên Minh', 2),
(36, 'Huyện Quản Bạ', 2),
(37, 'Huyện Vị Xuyên', 2),
(38, 'Huyện Bắc Mê', 2),
(39, 'Huyện Hoàng Su Phì', 2),
(40, 'Huyện Xín Mần', 2),
(41, 'Huyện Bắc Quang', 2),
(42, 'Huyện Quang Bình', 2),
(43, 'Thành phố Cao Bằng', 3),
(44, 'Huyện Bảo Lâm', 3),
(45, 'Huyện Bảo Lạc', 3),
(46, 'Huyện Thông Nông', 3),
(47, 'Huyện Hà Quảng', 3),
(48, 'Huyện Trà Lĩnh', 3),
(49, 'Huyện Trùng Khánh', 3),
(50, 'Huyện Hạ Lang', 3),
(51, 'Huyện Quảng Uyên', 3),
(52, 'Huyện Phục Hoà', 3),
(53, 'Huyện Hoà An', 3),
(54, 'Huyện Nguyên Bình', 3),
(55, 'Huyện Thạch An', 3),
(56, 'Thành Phố Bắc Kạn', 4),
(57, 'Huyện Pác Nặm', 4),
(58, 'Huyện Ba Bể', 4),
(59, 'Huyện Ngân Sơn', 4),
(60, 'Huyện Bạch Thông', 4),
(61, 'Huyện Chợ Đồn', 4),
(62, 'Huyện Chợ Mới', 4),
(63, 'Huyện Na Rì', 4),
(64, 'Thành phố Tuyên Quang', 5),
(65, 'Huyện Lâm Bình', 5),
(66, 'Huyện Nà Hang', 5),
(67, 'Huyện Chiêm Hóa', 5),
(68, 'Huyện Hàm Yên', 5),
(69, 'Huyện Yên Sơn', 5),
(70, 'Huyện Sơn Dương', 5),
(71, 'Thành phố Lào Cai', 6),
(72, 'Huyện Bát Xát', 6),
(73, 'Huyện Mường Khương', 6),
(74, 'Huyện Si Ma Cai', 6),
(75, 'Huyện Bắc Hà', 6),
(76, 'Huyện Bảo Thắng', 6),
(77, 'Huyện Bảo Yên', 6),
(78, 'Huyện Sa Pa', 6),
(79, 'Huyện Văn Bàn', 6),
(80, 'Thành phố Điện Biên Phủ', 7),
(81, 'Thị Xã Mường Lay', 7),
(82, 'Huyện Mường Nhé', 7),
(83, 'Huyện Mường Chà', 7),
(84, 'Huyện Tủa Chùa', 7),
(85, 'Huyện Tuần Giáo', 7),
(86, 'Huyện Điện Biên', 7),
(87, 'Huyện Điện Biên Đông', 7),
(88, 'Huyện Mường Ảng', 7),
(89, 'Huyện Nậm Pồ', 7),
(90, 'Thành phố Lai Châu', 8),
(91, 'Huyện Tam Đường', 8),
(92, 'Huyện Mường Tè', 8),
(93, 'Huyện Sìn Hồ', 8),
(94, 'Huyện Phong Thổ', 8),
(95, 'Huyện Than Uyên', 8),
(96, 'Huyện Tân Uyên', 8),
(97, 'Huyện Nậm Nhùn', 8),
(98, 'Thành phố Sơn La', 9),
(99, 'Huyện Quỳnh Nhai', 9),
(100, 'Huyện Thuận Châu', 9),
(101, 'Huyện Mường La', 9),
(102, 'Huyện Bắc Yên', 9),
(103, 'Huyện Phù Yên', 9),
(104, 'Huyện Mộc Châu', 9),
(105, 'Huyện Yên Châu', 9),
(106, 'Huyện Mai Sơn', 9),
(107, 'Huyện Sông Mã', 9),
(108, 'Huyện Sốp Cộp', 9),
(109, 'Huyện Vân Hồ', 9),
(110, 'Thành phố Yên Bái', 10),
(111, 'Thị xã Nghĩa Lộ', 10),
(112, 'Huyện Lục Yên', 10),
(113, 'Huyện Văn Yên', 10),
(114, 'Huyện Mù Căng Chải', 10),
(115, 'Huyện Trấn Yên', 10),
(116, 'Huyện Trạm Tấu', 10),
(117, 'Huyện Văn Chấn', 10),
(118, 'Huyện Yên Bình', 10),
(119, 'Thành phố Hòa Bình', 11),
(120, 'Huyện Đà Bắc', 11),
(121, 'Huyện Kỳ Sơn', 11),
(122, 'Huyện Lương Sơn', 11),
(123, 'Huyện Kim Bôi', 11),
(124, 'Huyện Cao Phong', 11),
(125, 'Huyện Tân Lạc', 11),
(126, 'Huyện Mai Châu', 11),
(127, 'Huyện Lạc Sơn', 11),
(128, 'Huyện Yên Thủy', 11),
(129, 'Huyện Lạc Thủy', 11),
(130, 'Thành phố Thái Nguyên', 12),
(131, 'Thành phố Sông Công', 12),
(132, 'Huyện Định Hóa', 12),
(133, 'Huyện Phú Lương', 12),
(134, 'Huyện Đồng Hỷ', 12),
(135, 'Huyện Võ Nhai', 12),
(136, 'Huyện Đại Từ', 12),
(137, 'Thị xã Phổ Yên', 12),
(138, 'Huyện Phú Bình', 12),
(139, 'Thành phố Lạng Sơn', 13),
(140, 'Huyện Tràng Định', 13),
(141, 'Huyện Bình Gia', 13),
(142, 'Huyện Văn Lãng', 13),
(143, 'Huyện Cao Lộc', 13),
(144, 'Huyện Văn Quan', 13),
(145, 'Huyện Bắc Sơn', 13),
(146, 'Huyện Hữu Lũng', 13),
(147, 'Huyện Chi Lăng', 13),
(148, 'Huyện Lộc Bình', 13),
(149, 'Huyện Đình Lập', 13),
(150, 'Thành phố Hạ Long', 14),
(151, 'Thành phố Móng Cái', 14),
(152, 'Thành phố Cẩm Phả', 14),
(153, 'Thành phố Uông Bí', 14),
(154, 'Huyện Bình Liêu', 14),
(155, 'Huyện Tiên Yên', 14),
(156, 'Huyện Đầm Hà', 14),
(157, 'Huyện Hải Hà', 14),
(158, 'Huyện Ba Chẽ', 14),
(159, 'Huyện Vân Đồn', 14),
(160, 'Huyện Hoành Bồ', 14),
(161, 'Thị xã Đông Triều', 14),
(162, 'Thị xã Quảng Yên', 14),
(163, 'Huyện Cô Tô', 14),
(164, 'Thành phố Bắc Giang', 15),
(165, 'Huyện Yên Thế', 15),
(166, 'Huyện Tân Yên', 15),
(167, 'Huyện Lạng Giang', 15),
(168, 'Huyện Lục Nam', 15),
(169, 'Huyện Lục Ngạn', 15),
(170, 'Huyện Sơn Động', 15),
(171, 'Huyện Yên Dũng', 15),
(172, 'Huyện Việt Yên', 15),
(173, 'Huyện Hiệp Hòa', 15),
(174, 'Thành phố Việt Trì', 16),
(175, 'Thị xã Phú Thọ', 16),
(176, 'Huyện Đoan Hùng', 16),
(177, 'Huyện Hạ Hoà', 16),
(178, 'Huyện Thanh Ba', 16),
(179, 'Huyện Phù Ninh', 16),
(180, 'Huyện Yên Lập', 16),
(181, 'Huyện Cẩm Khê', 16),
(182, 'Huyện Tam Nông', 16),
(183, 'Huyện Lâm Thao', 16),
(184, 'Huyện Thanh Sơn', 16),
(185, 'Huyện Thanh Thuỷ', 16),
(186, 'Huyện Tân Sơn', 16),
(187, 'Thành phố Vĩnh Yên', 17),
(188, 'Thị xã Phúc Yên', 17),
(189, 'Huyện Lập Thạch', 17),
(190, 'Huyện Tam Dương', 17),
(191, 'Huyện Tam Đảo', 17),
(192, 'Huyện Bình Xuyên', 17),
(193, 'Huyện Yên Lạc', 17),
(194, 'Huyện Vĩnh Tường', 17),
(195, 'Huyện Sông Lô', 17),
(196, 'Thành phố Bắc Ninh', 18),
(197, 'Huyện Yên Phong', 18),
(198, 'Huyện Quế Võ', 18),
(199, 'Huyện Tiên Du', 18),
(200, 'Thị xã Từ Sơn', 18),
(201, 'Huyện Thuận Thành', 18),
(202, 'Huyện Gia Bình', 18),
(203, 'Huyện Lương Tài', 18),
(204, 'Thành phố Hải Dương', 19),
(205, 'Thị xã Chí Linh', 19),
(206, 'Huyện Nam Sách', 19),
(207, 'Huyện Kinh Môn', 19),
(208, 'Huyện Kim Thành', 19),
(209, 'Huyện Thanh Hà', 19),
(210, 'Huyện Cẩm Giàng', 19),
(211, 'Huyện Bình Giang', 19),
(212, 'Huyện Gia Lộc', 19),
(213, 'Huyện Tứ Kỳ', 19),
(214, 'Huyện Ninh Giang', 19),
(215, 'Huyện Thanh Miện', 19),
(216, 'Quận Hồng Bàng', 20),
(217, 'Quận Ngô Quyền', 20),
(218, 'Quận Lê Chân', 20),
(219, 'Quận Hải An', 20),
(220, 'Quận Kiến An', 20),
(221, 'Quận Đồ Sơn', 20),
(222, 'Quận Dương Kinh', 20),
(223, 'Huyện Thuỷ Nguyên', 20),
(224, 'Huyện An Dương', 20),
(225, 'Huyện An Lão', 20),
(226, 'Huyện Kiến Thuỵ', 20),
(227, 'Huyện Tiên Lãng', 20),
(228, 'Huyện Vĩnh Bảo', 20),
(229, 'Huyện Cát Hải', 20),
(230, 'Huyện Bạch Long Vĩ', 20),
(231, 'Thành phố Hưng Yên', 21),
(232, 'Huyện Văn Lâm', 21),
(233, 'Huyện Văn Giang', 21),
(234, 'Huyện Yên Mỹ', 21),
(235, 'Huyện Mỹ Hào', 21),
(236, 'Huyện Ân Thi', 21),
(237, 'Huyện Khoái Châu', 21),
(238, 'Huyện Kim Động', 21),
(239, 'Huyện Tiên Lữ', 21),
(240, 'Huyện Phù Cừ', 21),
(241, 'Thành phố Thái Bình', 22),
(242, 'Huyện Quỳnh Phụ', 22),
(243, 'Huyện Hưng Hà', 22),
(244, 'Huyện Đông Hưng', 22),
(245, 'Huyện Thái Thụy', 22),
(246, 'Huyện Tiền Hải', 22),
(247, 'Huyện Kiến Xương', 22),
(248, 'Huyện Vũ Thư', 22),
(249, 'Thành phố Phủ Lý', 23),
(250, 'Huyện Duy Tiên', 23),
(251, 'Huyện Kim Bảng', 23),
(252, 'Huyện Thanh Liêm', 23),
(253, 'Huyện Bình Lục', 23),
(254, 'Huyện Lý Nhân', 23),
(255, 'Thành phố Nam Định', 24),
(256, 'Huyện Mỹ Lộc', 24),
(257, 'Huyện Vụ Bản', 24),
(258, 'Huyện Ý Yên', 24),
(259, 'Huyện Nghĩa Hưng', 24),
(260, 'Huyện Nam Trực', 24),
(261, 'Huyện Trực Ninh', 24),
(262, 'Huyện Xuân Trường', 24),
(263, 'Huyện Giao Thủy', 24),
(264, 'Huyện Hải Hậu', 24),
(265, 'Thành phố Ninh Bình', 25),
(266, 'Thành phố Tam Điệp', 25),
(267, 'Huyện Nho Quan', 25),
(268, 'Huyện Gia Viễn', 25),
(269, 'Huyện Hoa Lư', 25),
(270, 'Huyện Yên Khánh', 25),
(271, 'Huyện Kim Sơn', 25),
(272, 'Huyện Yên Mô', 25),
(273, 'Thành phố Thanh Hóa', 26),
(274, 'Thị xã Bỉm Sơn', 26),
(275, 'Thành phố Sầm Sơn', 26),
(276, 'Huyện Mường Lát', 26),
(277, 'Huyện Quan Hóa', 26),
(278, 'Huyện Bá Thước', 26),
(279, 'Huyện Quan Sơn', 26),
(280, 'Huyện Lang Chánh', 26),
(281, 'Huyện Ngọc Lặc', 26),
(282, 'Huyện Cẩm Thủy', 26),
(283, 'Huyện Thạch Thành', 26),
(284, 'Huyện Hà Trung', 26),
(285, 'Huyện Vĩnh Lộc', 26),
(286, 'Huyện Yên Định', 26),
(287, 'Huyện Thọ Xuân', 26),
(288, 'Huyện Thường Xuân', 26),
(289, 'Huyện Triệu Sơn', 26),
(290, 'Huyện Thiệu Hóa', 26),
(291, 'Huyện Hoằng Hóa', 26),
(292, 'Huyện Hậu Lộc', 26),
(293, 'Huyện Nga Sơn', 26),
(294, 'Huyện Như Xuân', 26),
(295, 'Huyện Như Thanh', 26),
(296, 'Huyện Nông Cống', 26),
(297, 'Huyện Đông Sơn', 26),
(298, 'Huyện Quảng Xương', 26),
(299, 'Huyện Tĩnh Gia', 26),
(300, 'Thành phố Vinh', 27),
(301, 'Thị xã Cửa Lò', 27),
(302, 'Thị xã Thái Hoà', 27),
(303, 'Huyện Quế Phong', 27),
(304, 'Huyện Quỳ Châu', 27),
(305, 'Huyện Kỳ Sơn', 27),
(306, 'Huyện Tương Dương', 27),
(307, 'Huyện Nghĩa Đàn', 27),
(308, 'Huyện Quỳ Hợp', 27),
(309, 'Huyện Quỳnh Lưu', 27),
(310, 'Huyện Con Cuông', 27),
(311, 'Huyện Tân Kỳ', 27),
(312, 'Huyện Anh Sơn', 27),
(313, 'Huyện Diễn Châu', 27),
(314, 'Huyện Yên Thành', 27),
(315, 'Huyện Đô Lương', 27),
(316, 'Huyện Thanh Chương', 27),
(317, 'Huyện Nghi Lộc', 27),
(318, 'Huyện Nam Đàn', 27),
(319, 'Huyện Hưng Nguyên', 27),
(320, 'Thị xã Hoàng Mai', 27),
(321, 'Thành phố Hà Tĩnh', 28),
(322, 'Thị xã Hồng Lĩnh', 28),
(323, 'Huyện Hương Sơn', 28),
(324, 'Huyện Đức Thọ', 28),
(325, 'Huyện Vũ Quang', 28),
(326, 'Huyện Nghi Xuân', 28),
(327, 'Huyện Can Lộc', 28),
(328, 'Huyện Hương Khê', 28),
(329, 'Huyện Thạch Hà', 28),
(330, 'Huyện Cẩm Xuyên', 28),
(331, 'Huyện Kỳ Anh', 28),
(332, 'Huyện Lộc Hà', 28),
(333, 'Thị xã Kỳ Anh', 28),
(334, 'Thành Phố Đồng Hới', 29),
(335, 'Huyện Minh Hóa', 29),
(336, 'Huyện Tuyên Hóa', 29),
(337, 'Huyện Quảng Trạch', 29),
(338, 'Huyện Bố Trạch', 29),
(339, 'Huyện Quảng Ninh', 29),
(340, 'Huyện Lệ Thủy', 29),
(341, 'Thị xã Ba Đồn', 29),
(342, 'Thành phố Đông Hà', 30),
(343, 'Thị xã Quảng Trị', 30),
(344, 'Huyện Vĩnh Linh', 30),
(345, 'Huyện Hướng Hóa', 30),
(346, 'Huyện Gio Linh', 30),
(347, 'Huyện Đa Krông', 30),
(348, 'Huyện Cam Lộ', 30),
(349, 'Huyện Triệu Phong', 30),
(350, 'Huyện Hải Lăng', 30),
(351, 'Huyện Cồn Cỏ', 30),
(352, 'Thành phố Huế', 31),
(353, 'Huyện Phong Điền', 31),
(354, 'Huyện Quảng Điền', 31),
(355, 'Huyện Phú Vang', 31),
(356, 'Thị xã Hương Thủy', 31),
(357, 'Thị xã Hương Trà', 31),
(358, 'Huyện A Lưới', 31),
(359, 'Huyện Phú Lộc', 31),
(360, 'Huyện Nam Đông', 31),
(361, 'Quận Liên Chiểu', 32),
(362, 'Quận Thanh Khê', 32),
(363, 'Quận Hải Châu', 32),
(364, 'Quận Sơn Trà', 32),
(365, 'Quận Ngũ Hành Sơn', 32),
(366, 'Quận Cẩm Lệ', 32),
(367, 'Huyện Hòa Vang', 32),
(368, 'Huyện Hoàng Sa', 32),
(369, 'Thành phố Tam Kỳ', 33),
(370, 'Thành phố Hội An', 33),
(371, 'Huyện Tây Giang', 33),
(372, 'Huyện Đông Giang', 33),
(373, 'Huyện Đại Lộc', 33),
(374, 'Thị xã Điện Bàn', 33),
(375, 'Huyện Duy Xuyên', 33),
(376, 'Huyện Quế Sơn', 33),
(377, 'Huyện Nam Giang', 33),
(378, 'Huyện Phước Sơn', 33),
(379, 'Huyện Hiệp Đức', 33),
(380, 'Huyện Thăng Bình', 33),
(381, 'Huyện Tiên Phước', 33),
(382, 'Huyện Bắc Trà My', 33),
(383, 'Huyện Nam Trà My', 33),
(384, 'Huyện Núi Thành', 33),
(385, 'Huyện Phú Ninh', 33),
(386, 'Huyện Nông Sơn', 33),
(387, 'Thành phố Quảng Ngãi', 34),
(388, 'Huyện Bình Sơn', 34),
(389, 'Huyện Trà Bồng', 34),
(390, 'Huyện Tây Trà', 34),
(391, 'Huyện Sơn Tịnh', 34),
(392, 'Huyện Tư Nghĩa', 34),
(393, 'Huyện Sơn Hà', 34),
(394, 'Huyện Sơn Tây', 34),
(395, 'Huyện Minh Long', 34),
(396, 'Huyện Nghĩa Hành', 34),
(397, 'Huyện Mộ Đức', 34),
(398, 'Huyện Đức Phổ', 34),
(399, 'Huyện Ba Tơ', 34),
(400, 'Huyện Lý Sơn', 34),
(401, 'Thành phố Qui Nhơn', 35),
(402, 'Huyện An Lão', 35),
(403, 'Huyện Hoài Nhơn', 35),
(404, 'Huyện Hoài Ân', 35),
(405, 'Huyện Phù Mỹ', 35),
(406, 'Huyện Vĩnh Thạnh', 35),
(407, 'Huyện Tây Sơn', 35),
(408, 'Huyện Phù Cát', 35),
(409, 'Thị xã An Nhơn', 35),
(410, 'Huyện Tuy Phước', 35),
(411, 'Huyện Vân Canh', 35),
(412, 'Thành phố Tuy Hoà', 36),
(413, 'Thị xã Sông Cầu', 36),
(414, 'Huyện Đồng Xuân', 36),
(415, 'Huyện Tuy An', 36),
(416, 'Huyện Sơn Hòa', 36),
(417, 'Huyện Sông Hinh', 36),
(418, 'Huyện Tây Hoà', 36),
(419, 'Huyện Phú Hoà', 36),
(420, 'Huyện Đông Hòa', 36),
(421, 'Thành phố Nha Trang', 37),
(422, 'Thành phố Cam Ranh', 37),
(423, 'Huyện Cam Lâm', 37),
(424, 'Huyện Vạn Ninh', 37),
(425, 'Thị xã Ninh Hòa', 37),
(426, 'Huyện Khánh Vĩnh', 37),
(427, 'Huyện Diên Khánh', 37),
(428, 'Huyện Khánh Sơn', 37),
(429, 'Huyện Trường Sa', 37),
(430, 'Thành phố Phan Rang-Tháp Chàm', 38),
(431, 'Huyện Bác Ái', 38),
(432, 'Huyện Ninh Sơn', 38),
(433, 'Huyện Ninh Hải', 38),
(434, 'Huyện Ninh Phước', 38),
(435, 'Huyện Thuận Bắc', 38),
(436, 'Huyện Thuận Nam', 38),
(437, 'Thành phố Phan Thiết', 39),
(438, 'Thị xã La Gi', 39),
(439, 'Huyện Tuy Phong', 39),
(440, 'Huyện Bắc Bình', 39),
(441, 'Huyện Hàm Thuận Bắc', 39),
(442, 'Huyện Hàm Thuận Nam', 39),
(443, 'Huyện Tánh Linh', 39),
(444, 'Huyện Đức Linh', 39),
(445, 'Huyện Hàm Tân', 39),
(446, 'Huyện Phú Quí', 39),
(447, 'Thành phố Kon Tum', 40),
(448, 'Huyện Đắk Glei', 40),
(449, 'Huyện Ngọc Hồi', 40),
(450, 'Huyện Đắk Tô', 40),
(451, 'Huyện Kon Plông', 40),
(452, 'Huyện Kon Rẫy', 40),
(453, 'Huyện Đắk Hà', 40),
(454, 'Huyện Sa Thầy', 40),
(455, 'Huyện Tu Mơ Rông', 40),
(456, 'Huyện Ia H\' Drai', 40),
(457, 'Thành phố Pleiku', 41),
(458, 'Thị xã An Khê', 41),
(459, 'Thị xã Ayun Pa', 41),
(460, 'Huyện KBang', 41),
(461, 'Huyện Đăk Đoa', 41),
(462, 'Huyện Chư Păh', 41),
(463, 'Huyện Ia Grai', 41),
(464, 'Huyện Mang Yang', 41),
(465, 'Huyện Kông Chro', 41),
(466, 'Huyện Đức Cơ', 41),
(467, 'Huyện Chư Prông', 41),
(468, 'Huyện Chư Sê', 41),
(469, 'Huyện Đăk Pơ', 41),
(470, 'Huyện Ia Pa', 41),
(471, 'Huyện Krông Pa', 41),
(472, 'Huyện Phú Thiện', 41),
(473, 'Huyện Chư Pưh', 41),
(474, 'Thành phố Buôn Ma Thuột', 42),
(475, 'Thị Xã Buôn Hồ', 42),
(476, 'Huyện Ea H\'leo', 42),
(477, 'Huyện Ea Súp', 42),
(478, 'Huyện Buôn Đôn', 42),
(479, 'Huyện Cư M\'gar', 42),
(480, 'Huyện Krông Búk', 42),
(481, 'Huyện Krông Năng', 42),
(482, 'Huyện Ea Kar', 42),
(483, 'Huyện M\'Đrắk', 42),
(484, 'Huyện Krông Bông', 42),
(485, 'Huyện Krông Pắc', 42),
(486, 'Huyện Krông A Na', 42),
(487, 'Huyện Lắk', 42),
(488, 'Huyện Cư Kuin', 42),
(489, 'Thị xã Gia Nghĩa', 43),
(490, 'Huyện Đăk Glong', 43),
(491, 'Huyện Cư Jút', 43),
(492, 'Huyện Đắk Mil', 43),
(493, 'Huyện Krông Nô', 43),
(494, 'Huyện Đắk Song', 43),
(495, 'Huyện Đắk R\'Lấp', 43),
(496, 'Huyện Tuy Đức', 43),
(497, 'Thành phố Đà Lạt', 44),
(498, 'Thành phố Bảo Lộc', 44),
(499, 'Huyện Đam Rông', 44),
(500, 'Huyện Lạc Dương', 44),
(501, 'Huyện Lâm Hà', 44),
(502, 'Huyện Đơn Dương', 44),
(503, 'Huyện Đức Trọng', 44),
(504, 'Huyện Di Linh', 44),
(505, 'Huyện Bảo Lâm', 44),
(506, 'Huyện Đạ Huoai', 44),
(507, 'Huyện Đạ Tẻh', 44),
(508, 'Huyện Cát Tiên', 44),
(509, 'Thị xã Phước Long', 45),
(510, 'Thị xã Đồng Xoài', 45),
(511, 'Thị xã Bình Long', 45),
(512, 'Huyện Bù Gia Mập', 45),
(513, 'Huyện Lộc Ninh', 45),
(514, 'Huyện Bù Đốp', 45),
(515, 'Huyện Hớn Quản', 45),
(516, 'Huyện Đồng Phú', 45),
(517, 'Huyện Bù Đăng', 45),
(518, 'Huyện Chơn Thành', 45),
(519, 'Huyện Phú Riềng', 45),
(520, 'Thành phố Tây Ninh', 46),
(521, 'Huyện Tân Biên', 46),
(522, 'Huyện Tân Châu', 46),
(523, 'Huyện Dương Minh Châu', 46),
(524, 'Huyện Châu Thành', 46),
(525, 'Huyện Hòa Thành', 46),
(526, 'Huyện Gò Dầu', 46),
(527, 'Huyện Bến Cầu', 46),
(528, 'Huyện Trảng Bàng', 46),
(529, 'Thành phố Thủ Dầu Một', 47),
(530, 'Huyện Bàu Bàng', 47),
(531, 'Huyện Dầu Tiếng', 47),
(532, 'Thị xã Bến Cát', 47),
(533, 'Huyện Phú Giáo', 47),
(534, 'Thị xã Tân Uyên', 47),
(535, 'Thị xã Dĩ An', 47),
(536, 'Thị xã Thuận An', 47),
(537, 'Huyện Bắc Tân Uyên', 47),
(538, 'Thành phố Biên Hòa', 48),
(539, 'Thị xã Long Khánh', 48),
(540, 'Huyện Tân Phú', 48),
(541, 'Huyện Vĩnh Cửu', 48),
(542, 'Huyện Định Quán', 48),
(543, 'Huyện Trảng Bom', 48),
(544, 'Huyện Thống Nhất', 48),
(545, 'Huyện Cẩm Mỹ', 48),
(546, 'Huyện Long Thành', 48),
(547, 'Huyện Xuân Lộc', 48),
(548, 'Huyện Nhơn Trạch', 48),
(549, 'Thành phố Vũng Tàu', 49),
(550, 'Thành phố Bà Rịa', 49),
(551, 'Huyện Châu Đức', 49),
(552, 'Huyện Xuyên Mộc', 49),
(553, 'Huyện Long Điền', 49),
(554, 'Huyện Đất Đỏ', 49),
(555, 'Huyện Tân Thành', 49),
(556, 'Huyện Côn Đảo', 49),
(557, 'Quận 1', 50),
(558, 'Quận 12', 50),
(559, 'Quận Thủ Đức', 50),
(560, 'Quận 9', 50),
(561, 'Quận Gò Vấp', 50),
(562, 'Quận Bình Thạnh', 50),
(563, 'Quận Tân Bình', 50),
(564, 'Quận Tân Phú', 50),
(565, 'Quận Phú Nhuận', 50),
(566, 'Quận 2', 50),
(567, 'Quận 3', 50),
(568, 'Quận 10', 50),
(569, 'Quận 11', 50),
(570, 'Quận 4', 50),
(571, 'Quận 5', 50),
(572, 'Quận 6', 50),
(573, 'Quận 8', 50),
(574, 'Quận Bình Tân', 50),
(575, 'Quận 7', 50),
(576, 'Huyện Củ Chi', 50),
(577, 'Huyện Hóc Môn', 50),
(578, 'Huyện Bình Chánh', 50),
(579, 'Huyện Nhà Bè', 50),
(580, 'Huyện Cần Giờ', 50),
(581, 'Thành phố Tân An', 51),
(582, 'Thị xã Kiến Tường', 51),
(583, 'Huyện Tân Hưng', 51),
(584, 'Huyện Vĩnh Hưng', 51),
(585, 'Huyện Mộc Hóa', 51),
(586, 'Huyện Tân Thạnh', 51),
(587, 'Huyện Thạnh Hóa', 51),
(588, 'Huyện Đức Huệ', 51),
(589, 'Huyện Đức Hòa', 51),
(590, 'Huyện Bến Lức', 51),
(591, 'Huyện Thủ Thừa', 51),
(592, 'Huyện Tân Trụ', 51),
(593, 'Huyện Cần Đước', 51),
(594, 'Huyện Cần Giuộc', 51),
(595, 'Huyện Châu Thành', 51),
(596, 'Thành phố Mỹ Tho', 52),
(597, 'Thị xã Gò Công', 52),
(598, 'Thị xã Cai Lậy', 52),
(599, 'Huyện Tân Phước', 52),
(600, 'Huyện Cái Bè', 52),
(601, 'Huyện Cai Lậy', 52),
(602, 'Huyện Châu Thành', 52),
(603, 'Huyện Chợ Gạo', 52),
(604, 'Huyện Gò Công Tây', 52),
(605, 'Huyện Gò Công Đông', 52),
(606, 'Huyện Tân Phú Đông', 52),
(607, 'Thành phố Bến Tre', 53),
(608, 'Huyện Châu Thành', 53),
(609, 'Huyện Chợ Lách', 53),
(610, 'Huyện Mỏ Cày Nam', 53),
(611, 'Huyện Giồng Trôm', 53),
(612, 'Huyện Bình Đại', 53),
(613, 'Huyện Ba Tri', 53),
(614, 'Huyện Thạnh Phú', 53),
(615, 'Huyện Mỏ Cày Bắc', 53),
(616, 'Thành phố Trà Vinh', 54),
(617, 'Huyện Càng Long', 54),
(618, 'Huyện Cầu Kè', 54),
(619, 'Huyện Tiểu Cần', 54),
(620, 'Huyện Châu Thành', 54),
(621, 'Huyện Cầu Ngang', 54),
(622, 'Huyện Trà Cú', 54),
(623, 'Huyện Duyên Hải', 54),
(624, 'Thị xã Duyên Hải', 54),
(625, 'Thành phố Vĩnh Long', 55),
(626, 'Huyện Long Hồ', 55),
(627, 'Huyện Mang Thít', 55),
(628, 'Huyện Vũng Liêm', 55),
(629, 'Huyện Tam Bình', 55),
(630, 'Thị xã Bình Minh', 55),
(631, 'Huyện Trà Ôn', 55),
(632, 'Huyện Bình Tân', 55),
(633, 'Thành phố Cao Lãnh', 56),
(634, 'Thành phố Sa Đéc', 56),
(635, 'Thị xã Hồng Ngự', 56),
(636, 'Huyện Tân Hồng', 56),
(637, 'Huyện Hồng Ngự', 56),
(638, 'Huyện Tam Nông', 56),
(639, 'Huyện Tháp Mười', 56),
(640, 'Huyện Cao Lãnh', 56),
(641, 'Huyện Thanh Bình', 56),
(642, 'Huyện Lấp Vò', 56),
(643, 'Huyện Lai Vung', 56),
(644, 'Huyện Châu Thành', 56),
(645, 'Thành phố Long Xuyên', 57),
(646, 'Thành phố Châu Đốc', 57),
(647, 'Huyện An Phú', 57),
(648, 'Thị xã Tân Châu', 57),
(649, 'Huyện Phú Tân', 57),
(650, 'Huyện Châu Phú', 57),
(651, 'Huyện Tịnh Biên', 57),
(652, 'Huyện Tri Tôn', 57),
(653, 'Huyện Châu Thành', 57),
(654, 'Huyện Chợ Mới', 57),
(655, 'Huyện Thoại Sơn', 57),
(656, 'Thành phố Rạch Giá', 58),
(657, 'Thị xã Hà Tiên', 58),
(658, 'Huyện Kiên Lương', 58),
(659, 'Huyện Hòn Đất', 58),
(660, 'Huyện Tân Hiệp', 58),
(661, 'Huyện Châu Thành', 58),
(662, 'Huyện Giồng Riềng', 58),
(663, 'Huyện Gò Quao', 58),
(664, 'Huyện An Biên', 58),
(665, 'Huyện An Minh', 58),
(666, 'Huyện Vĩnh Thuận', 58),
(667, 'Huyện Phú Quốc', 58),
(668, 'Huyện Kiên Hải', 58),
(669, 'Huyện U Minh Thượng', 58),
(670, 'Huyện Giang Thành', 58),
(671, 'Quận Ninh Kiều', 59),
(672, 'Quận Ô Môn', 59),
(673, 'Quận Bình Thuỷ', 59),
(674, 'Quận Cái Răng', 59),
(675, 'Quận Thốt Nốt', 59),
(676, 'Huyện Vĩnh Thạnh', 59),
(677, 'Huyện Cờ Đỏ', 59),
(678, 'Huyện Phong Điền', 59),
(679, 'Huyện Thới Lai', 59),
(680, 'Thành phố Vị Thanh', 60),
(681, 'Thị xã Ngã Bảy', 60),
(682, 'Huyện Châu Thành A', 60),
(683, 'Huyện Châu Thành', 60),
(684, 'Huyện Phụng Hiệp', 60),
(685, 'Huyện Vị Thuỷ', 60),
(686, 'Huyện Long Mỹ', 60),
(687, 'Thị xã Long Mỹ', 60),
(688, 'Thành phố Sóc Trăng', 61),
(689, 'Huyện Châu Thành', 61),
(690, 'Huyện Kế Sách', 61),
(691, 'Huyện Mỹ Tú', 61),
(692, 'Huyện Cù Lao Dung', 61),
(693, 'Huyện Long Phú', 61),
(694, 'Huyện Mỹ Xuyên', 61),
(695, 'Thị xã Ngã Năm', 61),
(696, 'Huyện Thạnh Trị', 61),
(697, 'Thị xã Vĩnh Châu', 61),
(698, 'Huyện Trần Đề', 61),
(699, 'Thành phố Bạc Liêu', 62),
(700, 'Huyện Hồng Dân', 62),
(701, 'Huyện Phước Long', 62),
(702, 'Huyện Vĩnh Lợi', 62),
(703, 'Thị xã Giá Rai', 62),
(704, 'Huyện Đông Hải', 62),
(705, 'Huyện Hoà Bình', 62),
(706, 'Thành phố Cà Mau', 63),
(707, 'Huyện U Minh', 63),
(708, 'Huyện Thới Bình', 63),
(709, 'Huyện Trần Văn Thời', 63),
(710, 'Huyện Cái Nước', 63),
(711, 'Huyện Đầm Dơi', 63),
(712, 'Huyện Năm Căn', 63),
(713, 'Huyện Phú Tân', 63),
(714, 'Huyện Ngọc Hiển', 63);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `provicence_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `fullname`, `email`, `phone`, `address`, `provicence_id`, `district_id`, `amount`, `note`, `created_at`, `updated_at`, `status`) VALUES
(2, NULL, 'tathiphuonganh', 'anhpt@gmail.com', '0154875545', 'Thái Bình', 22, 358, '10', '', '2018-05-01', '2018-05-02', 0),
(3, 2, 'phamcongdanh', 'danh@gmail.com', '0154545875', 'TP Hồ Chí Minh', 50, 278, '20', '', '2018-05-03', '2018-05-03', 1),
(4, NULL, 'nguyenthito', 'to@gmail.com', '0125879654\r\n', 'Hải Dương', 19, 351, '30', '', '2018-06-01', '2018-06-01', 1),
(5, NULL, 'dothutra', 'tra@gmail.com', '21365548754', 'Hưng Yên', 21, 173, '', '', '2018-05-14', '2018-05-14', 0),
(6, NULL, 'phamthutrang', 'trangpt@gmail.com', '087965421', 'Bắc Giang', 15, 157, '', '', '2018-05-29', '2018-05-29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `price`, `qty`) VALUES
(2, 2, 1, '100000', 3),
(3, 2, 1, '100000', 7),
(5, 3, 7, '2510', 7),
(6, 3, 9, '250000', 11),
(7, 3, 14, '5400', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL,
  `content` text,
  `img` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `description` text,
  `content` text,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL,
  `post_category_id` int(11) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `is_featured` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `name`, `slug`, `img`, `description`, `content`, `created_at`, `updated_at`, `post_category_id`, `meta_title`, `meta_keyword`, `meta_description`, `is_featured`, `status`) VALUES
(1, '8 lý do nên mua smartphone 530 USD này thay vì iPhone X', '8-ly-do-nen-mua-smartphone-530-usd-nay-thay-vi-iphone-x', 'public/img/post/a1.jpg', 'Giá rẻ, hiệu năng siêu mạnh là 2 trong những lý do tiêu biểu bạn nên cân nhắc để mua OnePlus 6 thay vì iPhone X.', '<p> OnePlus 6, từ nhà sản xuất ít người biết đến là OnePlus, là một trong những lựa chọn tốt nhất thay thế iPhone X hiện nay, dù chưa bán ở Việt Nam. </p>\r\n\r\n<p>Ở một vài khía cạnh, smartphone này còn tốt hơn iPhone X. Giá bán của nó chỉ là 530 USD. Nó có thể là lựa chọn tuyệt vời cho những người đã sử dụng iPhone từ lâu và muốn tìm kiếm thứ gì đó khác lạ.</p>\r\n\r\n<b>OnePlus có giá bằng nửa iPhone X </b>\r\n<p>Với thiết kế hiện đại, iPhone X tỏ ra khác biệt với tất cả những smartphone còn lại của Apple. Tuy nhiên, giá bán của nó lên đến 1.000 USD. Tất nhiên, iPhone 8, 8 Plus rẻ hơn nhưng thiết kế của nó quá cũ kỹ, chẳng khác mấy so với một chiếc iPhone 6 ra mắt năm 2014. Chúng vẫn rất đẹp, nhưng kém phần hiện đại.</p>', '2018-05-23', '2018-05-23', 1, NULL, NULL, NULL, 1, 1),
(2, 'Viettel khuyến mãi tặng 20% mệnh giá thẻ nạp ngày vàng 19/5/2018.\r\n', 'viettel-khuyen-mai-tang-20-%-menh-gia-the-nap-ngay-vang-19-5-2018', 'public/img/post/viettel-khuyen-mai-nap-the-ngay-1952018.jpg', 'Ưu đãi hấp dẫn từ chương trình khuyến mãi thẻ nạp ngày vàng Viettel 19/5/2018:', 'Khuyến mãi ngày vàng 19/5/2018 của Viettel thực sự là món quà đáng mong chờ trong thời điểm đầu tháng khi tài khoản các thuê bao hầu hết đều rơi vào tình trạng “rỗng tuếch”. Chương trình được triển khai kịp thời sẽ là cơ hội tuyệt vời để quý khách hàng trở thành triệu phú tài khoản chỉ sau một vài thẻ nạp, đặc biệt là những thuê bao đang bị khóa chiều có thể mở được kích hoạt trở lại.', '2018-05-23', '2018-05-23', 2, NULL, NULL, NULL, 1, 1),
(3, 'Apple đang làm ra \'bộ não\' mạnh nhất cho chiếc iPhone mới', 'apple-dang-lam-ra-bo-nao-manh-nhat-cho-chieu-iphone-moi', 'public/img/post/iphonexphoto.jpg', 'Smartphone kế nhiệm iPhone X có thể là thiết bị thương mại đầu tiên sử dụng con chip kiến trúc 7 nm.', '<p>Đối tác cung cấp chip cho Apple là TSMC đã bắt đầu sản xuất đại trà dòng chip cho các mẫu iPhone mới, dự kiến ra mắt mùa thu năm nay, theo Bloomberg.</p>\r\n<br>\r\n<p>Con chip này có thể mang tên A12, nhiều khả năng là vi xử lý đầu tiên dùng cấu trúc 7 nanomet trên một thiết bị thương mại. Đây cũng là thứ các nhà sản xuất chip hướng đến trong thời gian dài vừa qua.</p>\r\n<br>\r\n<p>Công nghệ 7 nm nói đến mật độ bóng bán dẫn trên một con chip, mặc dù thông số kỹ thuật có thể khác nhau giữa các nhà sản xuất. Sử dụng cấu trúc càng nhỏ cho phép sản xuất những con chip nhỏ hơn, nhanh hơn, tiết kiệm pin và chi phí.</p>\r\n<br>\r\n<p>Những con chip hàng đầu trên thị trường hiện nay như Apple A11 Bionic hay Qualcomm Snapdragon 845 đang sử dụng kiến trúc 10 nm.</p>\r\n<br>\r\n<p>Samsung cũng vừa công bố đã sẵn sàng sản xuất chip 7 nm quy mô mớn vào năm sau. Công ty này từng sản xuất chip cho iPhone trong quá khứ và cùng với TSMC sản xuất chip A9 cho iPhone 6S. Sau đó, TSMC thành tối tác độc quyền sản xuất chip cho Apple cho đến nay.</p>\r\n<br>\r\n<p>Apple được cho sẽ ra mắt 3 chiếc iPhone mới vào mùa thu năm nay: một phiên bản nâng cấp của iPhone X, một bản kích thước Plus (có thể là 6,5 inch) và một bản giá mềm sử dụng màn hình LCD 6,1 inch.</p>', '2018-05-23', '2018-05-23', 1, NULL, NULL, NULL, 1, 1),
(4, 'Startup Mỹ gây sửng sốt vì tìm ra cách siêu việt bảo vệ máy tính', 'startup-my-gay-sung-sot-vi-tim-ra-cach-sieu-viet-bao-ve-may-tinh', 'public/img/post/1Mike.jpg', 'Kolide, một start-up nhỏ về bảo mật đang thu hút chú ý của những ông lớn nhờ giải pháp cực kỳ hiệu quả dành cho Mac, Windows lẫn Linux.', '<p>Startup tên Kolide đang được chú ý vì giám đốc kỹ thuật - đồng sáng lập Mike Arpaia từng tạo ra một dự án mã nguồn mở tại Facebook tên là OSquery. Nó giúp các doanh nghiệp đi sâu vào máy Mac để tìm ra tất cả những sơ hở mà hacker có thể lợi dụng, đột nhập vào mạng nội bộ.</p>\r\n<br>\r\n<p>Chỉ trong vòng 4 năm, OSquery đã trở thành một hệ thống bảo mật cực kì phổ biến được sử dụng bởi các công ty như Dropbox, Stripe, Palantir, Heroku, Airbnb, Yahoo và các công ty khác.</p>\r\n<br>\r\n<p>Sự nghiệp của Arpaia chỉ ra rằng điều quan trọng nhất mà bạn có thể làm là tin vào ý tưởng của mình, bảo vệ nó và tiếp cận những người khác để có được sự giúp đỡ.</p>', '2018-05-23', '2018-05-23', 1, NULL, NULL, NULL, 1, 1),
(5, 'Hot hừng hực với hè smartphone - Điện thoại khuyến mãi giá cực tốt quà cực ngon', 'hot-hung-huc-voi-he-smartphone-dien-thoai-khuyen-mai-gia-cuc-tot-qua-cuc-ngon', 'public/img/post/HotHungHuc_Banner.jpg', '<p>Bằng cách tham gia khuyến mãi mùa hè rực rỡ của shop quý khách hàng sẽ nhanh chóng sở hữu được smartphone với mức chi phí tiết kiệm nhất.</p>', '<p>Chào mùa hè 2018 rực rỡ và quyến rũ, chào những ngày lễ lớn của cả nước trong tháng 4, từ ngày 11/04 - 01/05/2018</p><br> <p>TCGSHOP.com trân trọng mang đến cho bạn chương trình khuyến mãi đặc biệt “HÈ SMARTPHONE - HOT HỪNG HỰC” được áp dụng trên pham vị toàn quốc.</p>', '2018-05-23', '2018-05-23', 2, NULL, NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE `post_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `description` text,
  `parent_id` int(11) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_categories`
--

INSERT INTO `post_categories` (`id`, `name`, `slug`, `img`, `description`, `parent_id`, `meta_title`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Tin tức công nghệ', 'tin-tuc-cong-nghe', NULL, 'Cập nhật bản tin công nghệ mới nhất.', 0, NULL, NULL, NULL, '2018-05-23', '2018-05-23', 1),
(2, 'Thông tin khuyến mại', 'thong-tin-khuyen-mai', NULL, NULL, 0, NULL, NULL, NULL, '2018-05-23', '2018-05-23', 1),
(3, 'Tin tuyển dụng', 'tin-tuyen-dung', NULL, NULL, 0, NULL, NULL, NULL, '2018-05-23', '2018-05-23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price` varchar(255) DEFAULT NULL,
  `colors` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `qty` float NOT NULL DEFAULT '0',
  `brand_id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `description` text,
  `content` text,
  `views` int(11) DEFAULT NULL,
  `is_new` tinyint(4) NOT NULL DEFAULT '0',
  `is_promo` tinyint(4) NOT NULL DEFAULT '0',
  `is_featured` tinyint(4) NOT NULL DEFAULT '0',
  `is_sale` int(11) NOT NULL DEFAULT '0',
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `sku`, `name`, `slug`, `price`, `colors`, `size`, `qty`, `brand_id`, `product_category_id`, `description`, `content`, `views`, `is_new`, `is_promo`, `is_featured`, `is_sale`, `created_at`, `updated_at`, `status`) VALUES
(1, 'IT01', 'iPhone 8 Plus RED', 'iphone-8-plus-256G-product-red', '28790000', NULL, NULL, 100, 1, 1, NULL, NULL, 1250, 1, 0, 0, 0, '2018-02-06', '2018-04-18', 1),
(2, 'IT02', 'iPhone 8 Plus 64GB', 'iphone-8-plus-64gb', '23990000', NULL, NULL, 100, 1, 1, NULL, NULL, 1425, 1, 0, 1, 0, '2018-02-06', '2018-04-18', 1),
(3, 'IT03', 'iPhone 8 Plus 64GB PRODUCT RED', 'iphone-8-plus-64gb-product-red', '23990000', NULL, NULL, 100, 1, 1, NULL, NULL, 45870, 1, 0, 1, 0, '2018-02-06', '2018-04-18', 1),
(4, 'IT04', 'iPhone X 256GB', 'iphone-x-256gb', '34790000', NULL, NULL, 100, 1, 1, NULL, NULL, 14500, 1, 0, 1, 0, '2018-02-06', '2018-04-18', 1),
(5, 'IT05', 'iPhone X 64GB ', 'iphone-x', '29990000', NULL, NULL, 100, 1, 1, '<h2>Cấu hình sản phẩm: </h2><br>\r\n\r\nMàn Hình: 5.8 inchs OLED <br>\r\nCamera: 7.0 MP/ Dual 12.0 MP <br>\r\nPin: 2716 mAh, Li-Ion battery <br>\r\nRam: 3 GB <br> \r\nCPU: Apple A11 Bionic <br> \r\nHĐH: iOS 11 <br>', '<h2 align=\"center\">  Đánh giá chi tiết iPhone X 64GB </h2>\r\n<p> Đã lâu lắm rồi Apple mới ra mắt một sản phẩm với thiết kế đột phá và liều lĩnh. Dù vấp phải khá nhiều ý kiến trái chiều nhưng cũng không thể phủ nhận độ hấp dẫn của chiếc iPhone thế hệ thứ 10 này. Công nghệ bảo mật mới, loại bỏ nút home truyền thống, camera với những tính năng độc quyền, tất cả đã khiến người dùng đứng ngồi không yên cho đến khi được trên tay. </p>\r\n<br>\r\n<b>iPhone X 64GB có thiết kế lột xác hoàn toàn </b> <br>\r\n<p>iPhone X 64GB đã lột xác hoàn toàn với việc loại bỏ nút Home truyền thống, màn hình tràn viền và camera kép ở phía sau đã được đặt lại vị trí theo chiều dọc. Khung viền từ thép sáng bóng bền bỉ và mặt lưng kính với các góc bo tròn dễ dàng cầm nắm. Có thể nói đây là một thiết kế khá đột phá mà lâu lắm rồi Apple mới thể hiện lại. Người dùng cần phải trên tay thì mới cảm nhận được hết nét tinh tế và sang trọng của sản phẩm.</p><br>\r\n<b>Màn hình của iPhone X 64GB hiển thị đẹp hơn</b> <br>\r\n<p>iPhone X 64GB là chiếc smartphone đầu tiên được Apple ưu ái cho tấm nền màn hình OLED, kích thước 5.8 inch và độ phân giải đạt chuẩn Super Retina HD, Điều này giúp cho màn hình có màu sắc sống động, góc nhìn rộng hơn, cải thiện độ sáng và tốn ít điện năng hơn. Bên cạnh đó, công nghệ True Tone còn giúp màu sắc trở nên cực kì trung thực.\r\n\r\n </p>\r\n', 24780, 1, 0, 1, 0, '2018-02-06', '2018-04-18', 1),
(6, 'IT06', 'iPhone 6 32GB (2017)', 'iphone-6-32gb', '7499000', NULL, NULL, 100, 1, 1, NULL, NULL, 45600, 0, 0, 1, 0, '2018-02-06', '2018-04-18', 1),
(7, 'IT07', 'iPhone 6s Plus 32GB', 'iphone-6s-plus-32gb', '13999000', NULL, NULL, 100, 1, 1, NULL, NULL, 124, 0, 0, 0, 0, '2018-02-06', '2018-04-18', 1),
(8, 'IT08', 'iPhone 8 256GB', 'iphone-8-256gb', '25790000', NULL, NULL, 100, 1, 1, NULL, NULL, 47840, 1, 0, 1, 0, '2018-02-06', '2018-04-18', 1),
(9, 'IT09', 'iPhone 7 Plus 32GB', 'iphone-7-plus', '19999000', NULL, NULL, 100, 1, 1, NULL, NULL, 1245, 0, 0, 0, 0, '2018-02-06', '2018-04-18', 1),
(10, 'IT10', 'iPhone 7 32GB', 'iphone-7', '15999000', NULL, NULL, 100, 1, 1, NULL, NULL, 3214, 0, 0, 1, 1, '2018-02-06', '2018-04-18', 1),
(11, 'IT11', 'Sony Xperia L1 Dual', 'sony-xperia-l1-dual', '3590000', NULL, NULL, 100, 2, 1, NULL, NULL, 48712, 0, 0, 1, 1, '2018-02-06', '2018-04-18', 1),
(12, 'IT12', 'Sony Xperia L2', 'sony-xperia-l2', '4990000', NULL, NULL, 100, 2, 1, NULL, NULL, 4245, 0, 0, 0, 0, '2018-02-06', '2018-04-18', 1),
(13, 'IT13', 'Sony Xperia XA1 Plus', 'sony-xperia-xa1-plus', '5990000', NULL, NULL, 100, 2, 1, NULL, NULL, 45214, 0, 0, 1, 1, '2018-02-06', '2018-04-18', 1),
(14, 'IT14', 'Sony Xperia XA1 Ultra', 'sony-xperia-xa1-ultra', '6990000', NULL, NULL, 100, 2, 1, NULL, NULL, 1212, 0, 0, 0, 0, '2018-02-06', '2018-04-18', 1),
(15, 'IT15', 'Sony Xperia XA Ultra', 'sony-xperia-xa-ultra', '6990000', NULL, NULL, 100, 2, 1, NULL, NULL, 475400, 0, 0, 1, 0, '2018-02-06', '2018-04-18', 1),
(16, 'IT16', 'Sony Xperia X', 'sony-xperia-x', '7990000', NULL, NULL, 100, 2, 1, NULL, NULL, 121400, 0, 0, 1, 0, '2018-02-06', '2018-04-18', 1),
(17, 'IT17', 'Sony Xperia XZs', 'sony-xperia-xzs', '9990000', NULL, NULL, 100, 2, 1, NULL, NULL, 1235, 0, 0, 0, 0, '2018-02-06', '2018-04-18', 1),
(18, 'IT18', 'Sony Xperia XZ1', 'sony-xperia-xz1', '11990000', NULL, NULL, 100, 2, 1, NULL, NULL, 1247, 0, 0, 0, 0, '2018-02-06', '2018-04-18', 1),
(19, 'IT19', 'Sony Xperia XZ Premium Pink Gold', 'sony-xperia-xz-premium-pink-gold', '13490000', NULL, NULL, 100, 2, 1, NULL, NULL, 1244000, 0, 0, 1, 0, '2018-02-06', '2018-04-18', 1),
(20, 'IT20', 'Sony Xperia XZ Premium', 'sony-xperia-xz-premium', '14990000', NULL, NULL, 100, 2, 1, NULL, NULL, 50000, 0, 0, 1, 0, '2018-02-06', '2018-04-18', 1),
(21, 'IT21', 'Asus Zenfone 4 Max', 'asus-zenfone-4-max', '3490000', NULL, NULL, 100, 3, 1, NULL, NULL, NULL, 1, 0, 1, 1, '2018-02-06', '2018-04-18', 1),
(22, 'IT22', 'Asus Zenfone 4 Max Pro', 'asus-zenfone-4-max-pro', '4690000', NULL, NULL, 100, 3, 1, NULL, NULL, NULL, 0, 0, 0, 0, '2018-02-06', '2018-04-18', 1),
(23, 'IT23', 'Asus Zenfone Max Plus M1', 'asus-zenfone-max-plus-m1', '4990000', NULL, NULL, 100, 3, 1, NULL, NULL, NULL, 0, 0, 0, 0, '2018-02-06', '2018-04-18', 1),
(24, 'IT24', 'ASUS Zenfone Max Plus M1 - ZB570TL', 'asus-zenfone-max-plus-m1-zb570tl', '4990000', NULL, NULL, 100, 3, 1, NULL, NULL, NULL, 0, 0, 0, 0, '2018-02-06', '2018-04-18', 1),
(25, 'IT25', 'Asus Zenfone 4 Max Pro ZC554KL', 'asus-zenfone-4-max-pro-zc554kl', '4690000', NULL, NULL, 100, 3, 1, NULL, NULL, NULL, 0, 0, 1, 1, '2018-02-06', '2018-04-18', 1),
(26, 'IT26', 'Asus Zenfone 4 Max ZC520KL', 'asus-zenfone-4-max-zc520kl', '3490000', NULL, NULL, 100, 3, 1, NULL, NULL, 1241, 127, 0, 0, 0, '2018-02-06', '2018-04-18', 1),
(27, 'IT27', 'Asus Zenfone Live ZB501KL', 'asus-zenfone-live-zb501kl', '2990000', NULL, NULL, 100, 3, 1, NULL, NULL, 1245, 0, 0, 0, 0, '2018-02-06', '2018-04-18', 1),
(28, 'IT28', 'Asus Zenfone 5', 'asus-zenfone-5', '7990000', NULL, NULL, 100, 3, 1, NULL, NULL, 1242, 0, 0, 0, 0, '2018-02-06', '2018-04-18', 1),
(29, 'IT29', 'Asus Zenfone 3 Max 5.5\" - ZC553KL', 'asus-zenfone-3-max-5-5-zc553kl', '4379000', NULL, NULL, 100, 3, 1, NULL, NULL, 1245, 0, 0, 0, 0, '2018-02-06', '2018-04-18', 1),
(30, 'IT30', 'Asus Zenfone 3 - ZE552KL', 'asus-zenfone-3-ze552kl', '8179000', NULL, NULL, 100, 3, 1, NULL, NULL, 4541, 0, 0, 0, 0, '2018-02-06', '2018-04-18', 1),
(31, 'IT31', 'Xiaomi Redmi Note 4 32GB', 'xiaomi-redmi-note-4-32gb', '4290000', NULL, NULL, 100, 4, 1, NULL, NULL, 1478, 0, 0, 0, 0, '2018-02-06', '2018-04-18', 1),
(32, 'IT32', 'Xiaomi Redmi Note 5 32GB', 'xiaomi-redmi-note-5', '4799000', NULL, NULL, 100, 4, 1, NULL, NULL, 1236, 0, 0, 0, 0, '2018-02-06', '2018-04-18', 1),
(33, 'IT33', 'Xiaomi Mi A1 32GB', 'xiaomi-mi-a1-32gb', '4990000', NULL, NULL, 100, 4, 1, NULL, NULL, 1478, 0, 0, 0, 0, '2018-02-06', '2018-04-18', 1),
(34, 'IT34', 'Xiaomi Mi A1', 'xiaomi-mi-a1', '5490000 ', NULL, NULL, 100, 4, 1, NULL, NULL, 1456, 0, 0, 0, 0, '2018-02-06', '2018-04-18', 1),
(35, 'IT35', 'Xiaomi Redmi S2 32GB', 'xiaomi-redmi-s2', 'NULL', NULL, NULL, 100, 4, 1, NULL, NULL, 14587, 0, 0, 0, 0, '2018-02-06', '2018-04-18', 1),
(36, 'IT36', 'Xiaomi Redmi Note 5 a Prime', 'xiaomi-redmi-note-5a-prime', '3690000', NULL, NULL, 100, 4, 1, NULL, NULL, 1121, 0, 0, 0, 0, '2018-02-06', '2018-04-18', 1),
(37, 'IT37', 'Xiaomi Redmi 4X', 'xiaomi-redmi-4x', '3690000', NULL, NULL, 100, 4, 1, NULL, NULL, 2134, 0, 0, 0, 0, '2018-02-06', '2018-04-18', 1),
(38, 'IT38', 'Xiaomi Redmi 5 Plus', 'xiaomi-redmi-5-plus', '3999000', NULL, NULL, 100, 4, 1, NULL, NULL, 1241, 0, 0, 0, 0, '2018-02-06', '2018-04-18', 1),
(39, 'IT39', 'Xiaomi Redmi Note 5A', 'xiaomi-redmi-note-5a', '2990000', NULL, NULL, 100, 4, 1, NULL, NULL, 2144, 0, 0, 0, 0, '2018-02-06', '2018-04-18', 1),
(40, 'IT40', 'Xiaomi Redmi 5A 16GB Ram 2GB ', 'xiaomi-redmi-5a-16gb-ram-2gb', '1990000', NULL, NULL, 100, 4, 1, NULL, NULL, 1256, 0, 0, 0, 0, '2018-02-06', '2018-04-18', 1),
(41, 'IT41', 'Samsung Galaxy S8 Plus Orchid Gray', 'samsung-galaxy-s8-plus-orchid-gray', '17990000', NULL, NULL, 100, 5, 1, NULL, NULL, NULL, 0, 0, 0, 0, '2018-02-06', '2018-04-18', 1),
(42, 'IT42', 'Samsung Galaxy S8 Plus', 'samsung-galaxy-s8-plus', '17990000', NULL, NULL, 100, 5, 1, NULL, NULL, NULL, 0, 0, 0, 0, '2018-02-06', '2018-04-18', 1),
(43, 'IT43', 'Samsung Galaxy Note 8 Orchid Grey ', 'samsung-galaxy-note-8-orchid-grey', '22490000', NULL, NULL, 100, 5, 1, NULL, NULL, NULL, 0, 0, 0, 0, '2018-02-06', '2018-04-18', 1),
(44, 'IT44', 'Samsung Galaxy S9+ 128GB', 'samsung-galaxy-s9-plus-128gb', '24990000', NULL, NULL, 100, 5, 1, NULL, NULL, NULL, 0, 0, 0, 0, '2018-02-06', '2018-04-18', 1),
(45, 'IT45', 'Samsung Galaxy S9+ Lilac Purple 128GB ', 'samsung-galaxy-s9-plus-lilac-purple', '24990000', NULL, NULL, 100, 5, 1, NULL, NULL, NULL, 0, 0, 0, 0, '2018-02-06', '2018-04-18', 1),
(46, 'IT46', 'Samsung Galaxy J7+', 'samsung-galaxy-j7-plus', '7290000', NULL, NULL, 100, 5, 1, NULL, NULL, NULL, 0, 0, 0, 0, '2018-02-06', '2018-04-18', 1),
(47, 'IT47', 'Samsung Galaxy J3 Pro', 'samsung-galaxy-j3-pro', '3990000', NULL, NULL, 100, 5, 1, NULL, NULL, NULL, 0, 0, 0, 0, '2018-02-06', '2018-04-18', 1),
(48, 'IT48', 'Samsung Galaxy J7 Pro', 'samsung-galaxy-j7-pro', '6090000', NULL, NULL, 100, 5, 1, NULL, NULL, NULL, 0, 0, 0, 0, '2018-02-06', '2018-04-18', 1),
(49, 'IT49', 'Samsung Galaxy A8 (2018)', 'samsung-galaxy-a8-2018', '10990000', NULL, NULL, 100, 5, 1, NULL, NULL, NULL, 0, 0, 0, 0, '2018-02-06', '2018-04-18', 1),
(50, 'IT50', 'Samsung Galaxy A8+ (2018)', 'samsung-galaxy-a8-plus-2018', '13490000', NULL, NULL, 100, 5, 1, NULL, NULL, NULL, 0, 0, 0, 0, '2018-02-06', '2018-04-18', 1),
(51, 'IT51', 'Usb 3.0 32GB Kingston Data Traveler 100G3 Black', 'Usb 3.0 32GB Kingston Data Traveler 100G3 Black', '390000', NULL, NULL, 100, 6, 3, NULL, NULL, 1245, 0, 0, 1, 1, '2018-02-06', '2018-04-18', 1),
(52, 'IT52', 'USB 3.0 16Gb Kingston 101G3', 'usb-30-16gb-kingston-101g3', '250000', NULL, NULL, 100, 6, 3, NULL, NULL, 1245, 0, 0, 1, 1, '2018-02-06', '2018-04-18', 1),
(53, 'IT53', 'Thẻ nhớ MicroSD 64GB Kingston C10', 'the-nho-microsd-64gb-kingston-c10', '790000', NULL, NULL, 100, 6, 3, NULL, NULL, 124, 0, 0, 1, 1, '2018-02-06', '2018-04-18', 1),
(54, 'IT54', 'Thẻ nhớ MicroSD 8GB Kingston Class 4', 'the-nho-microsd-8gb-kingston-class-4', '170000', NULL, NULL, 100, 6, 3, NULL, NULL, 1465, 0, 0, 1, 1, '2018-02-06', '2018-04-18', 1),
(55, 'IT55', 'Thẻ nhớ MicroSD 16GB Kingston', 'the-nho-microsd-16gb-kingston-sdchc-class-4', '270000', NULL, NULL, 100, 6, 3, NULL, NULL, 1435, 0, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(56, 'IT56', 'Tai nghe choàng đầu Unik S416', 'tai-nghe-choang-dau-unik-s416', '249000', NULL, NULL, 100, 7, 4, NULL, NULL, 1247, 0, 0, 0, 0, '2018-02-06', '2018-04-18', 1),
(57, 'IT57', 'Tai nghe choàng đầu Unik S448', 'tai-nghe-choang-dau-unik-s448', '249000', NULL, NULL, 100, 7, 4, NULL, NULL, 1248, 0, 0, 0, 0, '2018-02-06', '2018-04-18', 1),
(58, 'IT58', 'Tai nghe có mic Unik S810', 'tai-nghe-co-mic-unik-s810', '150000', NULL, NULL, 100, 7, 4, NULL, NULL, 523, 0, 0, 0, 0, '2018-02-06', '2018-04-18', 1),
(59, 'IT59', 'Tai nghe có mic Unik S704', 'tai-nghe-co-mic-unik-s704', '150000', NULL, NULL, 100, 7, 4, NULL, NULL, 154, 0, 0, 0, 0, '2018-02-06', '2018-04-18', 1),
(60, 'IT60', 'Tai nghe choàng đầu có MIC Bluetooth Unik BT05', 'tai-nghe-choang-dau-co-mic-bluetooth-unik-bt05', '599000', NULL, NULL, 100, 7, 4, NULL, NULL, 1254, 0, 0, 1, 1, '2018-02-06', '2018-04-18', 1),
(61, 'IT61', 'Sạc điện thoại liền cáp 1m Icore 1A', 'sac-dien-thoai-lien-cap-1m-icore-1a', '100000', NULL, NULL, 100, 8, 6, NULL, NULL, NULL, 0, 0, 0, 0, '2018-02-06', '2018-04-18', 1),
(62, 'IT62', 'Sạc ĐT USB Icore 1 cổng 1A cho ĐT', 'sac-dt-usb-icore-1-cong-1a-cho-dt', '100000', NULL, NULL, 100, 8, 6, NULL, NULL, NULL, 0, 0, 0, 0, '2018-02-06', '2018-04-18', 1),
(63, 'IT63', 'Sạc ĐT liền cáp micro usb Icore', 'sac-dt-lien-cap-micro-usb-icore', '80000', NULL, NULL, 100, 8, 6, NULL, NULL, NULL, 0, 0, 0, 0, '2018-02-06', '2018-04-18', 1),
(64, 'IT64', 'Cáp Lightning MFI Icore 1m', 'Cap-Lightning-MFI-Icore-1m', '180000', NULL, NULL, 100, 8, 6, NULL, NULL, NULL, 0, 0, 0, 0, '2018-02-06', '2018-04-18', 1),
(65, 'IT65', 'Cáp Micro Usb Icore 1m', 'cap-micro-usb-icore-1m', '80000', NULL, NULL, 100, 8, 6, NULL, NULL, NULL, 0, 0, 0, 0, '2018-02-06', '2018-04-18', 1),
(66, 'IT66', 'Sạc dự phòng Icore 10000mAh (polymer)', 'sac-du-phong-icore-10000mah-polymer', '450000', NULL, NULL, 100, 8, 7, NULL, NULL, NULL, 0, 0, 0, 0, '2018-02-06', '2018-04-18', 1),
(67, 'IT67', 'Sạc dự phòng Icore 5000mAh', 'Sac-du-phong-Icore-5000mAh', '190000', NULL, NULL, 100, 8, 7, NULL, NULL, NULL, 0, 0, 0, 0, '2018-02-06', '2018-04-18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text,
  `img` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) CHARACTER SET utf32 DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `slug`, `description`, `img`, `parent_id`, `meta_title`, `meta_keyword`, `meta_description`, `status`) VALUES
(1, 'Điện thoại', 'dien-thoai', 'Điện thoại', NULL, 0, NULL, NULL, NULL, 1),
(2, 'Phụ kiện', 'phu-kien', 'Phụ kiện điện thoại chính hãng.', NULL, 0, NULL, NULL, NULL, 1),
(3, 'Thẻ nhớ', 'the-nho', 'Thẻ nhớ điện thoại', NULL, 2, NULL, NULL, NULL, 1),
(4, 'Tai nghe', 'tai-nghe', 'Tai nghe điện thoại', NULL, 2, NULL, NULL, NULL, 1),
(5, 'Bao da ốp lưng', 'bao-da-op-lung', 'Bao da ốp lưng điện thoại', NULL, 2, NULL, NULL, NULL, 1),
(6, 'Sạc cáp', 'sac-cap', 'Sạc cáp điện thoại', NULL, 2, NULL, NULL, NULL, 1),
(7, 'Sạc dự phòng', 'sac-du-phong', 'Sạc dự phòng cực khỏe', NULL, 2, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `is_featured` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `img`, `is_featured`) VALUES
(1, 1, 'public/img/products/636614727176851624_iphone--8-plus-red-1.png', 1),
(2, 2, 'public/img/products/636459040422660236_1.jpg', 1),
(3, 3, 'public/img/products/636614727176851624_iphone--8-plus-red-1 (1).png', 1),
(4, 4, 'public/img/products/636483223586180190_1.jpg', 1),
(5, 5, 'public/img/products/636483223586180190_1 (1).jpg', 1),
(6, 6, 'public/img/products/636506509528306435_iphone6-32GB-2.jpg', 1),
(7, 7, 'public/img/products/636172339622394948_apple-Iphone-6s-gold-1.jpg', 1),
(8, 8, 'public/img/products/636459060591822074_1.jpg', 1),
(9, 9, 'public/img/products/636159432323817451_ip7p-gold-1.jpg', 1),
(10, 10, 'public/img/products/636159398645952790_ip7-black-1.jpg', 1),
(11, 11, 'public/img/products/636347803366796448_1.jpg', 1),
(12, 12, 'public/img/products/636534255386871307_1.jpg', 1),
(13, 13, 'public/img/products/636449525827101531_1.jpg', 1),
(14, 14, 'public/img/products/636313235962471668_800-1.jpg', 1),
(15, 15, 'public/img/products/636161892755323252_xperia-xa-ultra-1.jpg', 1),
(16, 16, 'public/img/products/636160168215487121_xperia-x-silver-1.jpg', 1),
(17, 17, 'public/img/products/636259601365302936_800trang.jpg', 1),
(18, 18, 'public/img/products/636449520592598133_1.jpg', 1),
(19, 19, 'public/img/products/sony-xperia-xz-premium-pink-gold-400x460.png', 1),
(20, 20, 'public/img/products/sony-xperia-xz-premium-1-400x460.png', 1),
(21, 21, 'public/img/products/636473926771819711_1.jpg', 1),
(22, 22, 'public/img/products/636403898586199374_1.jpg', 1),
(23, 23, 'public/img/products/636524079493403495_1.jpg', 1),
(24, 24, 'public/img/products/asus-zenfone-max-plus-m1-zb570tl-den-1-3-org.jpg', 1),
(25, 25, 'public/img/products/asus-zenfone-4-max-pro-zc554kl-den-1-org.jpg', 1),
(26, 26, 'public/img/products/asus-zenfone-4-max-zc520kl-m-den-1-org.jpg', 1),
(27, 27, 'public/img/products/asus-zenfone-live-zb501kl-400-1-400x460.png', 1),
(28, 28, 'public/img/products/asus-zenfone-5-didongviet.jpg', 1),
(29, 29, 'public/img/products/asus-zenfone-3-max-zc553kl-vang-dong-didongviet_1.jpg', 1),
(30, 30, 'public/img/products/asus-zenfone-3-ze552kl-den-didongviet.jpg', 1),
(31, 31, 'public/img/products/636453055114651902_1.jpg', 1),
(32, 32, 'public/img/products/636619088468711666_1.jpg', 1),
(33, 33, 'public/img/products/636415156301744244_1o.png', 1),
(34, 34, 'public/img/products/636415162482543484_2.jpg', 1),
(35, 35, 'public/img/products/636623236912499129_xiaomi-s2-3-xam.jpg', 1),
(36, 36, 'public/img/products/636463347832890173_1.jpg', 1),
(37, 37, 'public/img/products/636453072940146775_1.jpg', 1),
(38, 38, 'public/img/products/636549777491044706_1.jpg', 1),
(39, 39, 'public/img/products/636427922203447399_1.jpg', 1),
(40, 40, 'public/img/products/xiaomi-redmi-5a-16gb-ram-2gb.jpg', 1),
(41, 41, 'public/img/products/636344641451328424_636344634241195520_800-1.jpg', 1),
(42, 42, 'public/img/products/636396217066191623_1.jpg', 1),
(43, 43, 'public/img/products/636506554439585001_1.jpg', 1),
(44, 44, 'public/img/products/636552331208636703_1.jpg', 1),
(45, 45, 'public/img/products/636552333148760332_1.jpg', 1),
(46, 46, 'public/img/products/636447213995680282_1.jpg', 1),
(47, 47, 'public/img/products/636383938496757496_1.jpg', 1),
(48, 48, 'public/img/products/636529900670656200_1.jpg', 1),
(49, 49, 'public/img/products/636494458643613986_1.jpg', 1),
(50, 50, 'public/img/products/636523998806629206_1.jpg', 1),
(51, 51, 'public/img/products/636075724321439795_HAPK-USB-30-32GB-KINGSTON-DATA-TRAVELER-100G3-07.JPG', 1),
(52, 52, 'public/img/products/636074847972740142_USB-30-16GB-KINGSTON-101G3-00006137-1.jpg', 1),
(53, 53, 'public/img/products/636075714037196583_HAPK-THE-NHO-MICROSD-64GB-KINGSTON-C10-05.JPG', 1),
(54, 54, 'public/img/products/the-nho-microsd-8gb-kingston-class-4-id26826.jpg', 1),
(55, 55, 'public/img/products/636251948217518300_HMPK-THE-NHO-MICROSD-16GB-KINGSTON-SDCHC-CLASS-4-01.jpg', 1),
(56, 56, 'public/img/products/636455617292459552_HASP-TAI-NGHE-CHOANG-DAU-UNIK-S416-00391764.JPG', 1),
(57, 57, 'public/img/products/636459935421057396_HASP-TAI-NGHE-CHOANG-DAU-UNIK-S448-00391765.JPG', 1),
(58, 58, 'public/img/products/636455624103887552_HASP-TAI-NGHE-CO-MIC-UNIK-S810-00391762 (7).JPG', 1),
(59, 59, 'public/img/products/636455619571619552_HASP-TAI-NGHE-CO-MIC-UNIK-S704-00391763 (7).JPG', 1),
(60, 60, 'public/img/products/636455608714643552_HASP-TAI-NGHE-CO-MIC-BLUETOOTH-UNIK-BT05-00391766 (7).JPG', 1),
(61, 61, 'public/img/products/636282152873274000_HAPK-SAC-DT-LIEN-CAP-1M-ICORE-1A-002476861 (1).JPG', 1),
(62, 62, 'public/img/products/636281936660201622_HAPK-SAC-DT-USB-ICORE-1-CONG-1A-CHO-DT- 000041651 (1).JPG', 1),
(63, 63, 'public/img/products/636070537766014404_HAPK-SAC-DT-LIEN-CAP-MICRO-USB-ICORE-01.JPG', 1),
(64, 64, 'public/img/products/636269252051143690_HAPK-CAP-LIGHTNING-MFI-ICORE-1M-00007147 (1).JPG', 1),
(65, 65, 'public/img/products/636079082096344865_HAPK-CAP-MICRO-USB-ICORE-1M-00007146-4.JPG', 1),
(66, 66, 'public/img/products/636530151291840952_HASP-PIN-DU-PHONG-ICORE-15.JPG', 1),
(67, 67, 'public/img/products/636230100679237505_HAPK-SAC-DU-PHONG-ICORE-5000MAH-00262041 (1).JPG', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_relates`
--

CREATE TABLE `product_relates` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_relate_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_relates`
--

INSERT INTO `product_relates` (`id`, `product_id`, `product_relate_id`, `status`) VALUES
(1, 1, 9, 1),
(2, 1, 3, 1),
(3, 1, 16, 1),
(4, 1, 17, 1),
(5, 5, 9, 1),
(6, 5, 10, 1),
(7, 5, 11, 1),
(8, 5, 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `rate` int(1) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_reviews`
--

INSERT INTO `product_reviews` (`id`, `product_id`, `user_id`, `content`, `rate`, `created_at`, `updated_at`, `status`) VALUES
(1, 5, 1, 'Cái này được', 5, '2018-05-24', '2018-05-24', 1),
(2, 5, 2, 'Quá đắt nhưng mà cũng được.', 5, '2018-05-24', '2018-05-24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `code`, `zipcode`) VALUES
(1, 'Thành phố Hà Nội', '1', '100000'),
(2, 'Tỉnh Hà Giang', '2', '310000'),
(3, 'Tỉnh Cao Bằng', '4', '270000'),
(4, 'Tỉnh Bắc Kạn', '6', '960000'),
(5, 'Tỉnh Tuyên Quang', '8', '300000'),
(6, 'Tỉnh Lào Cai', '10', '330000'),
(7, 'Tỉnh Điện Biên', '11', '380000'),
(8, 'Tỉnh Lai Châu', '12', '390000'),
(9, 'Tỉnh Sơn La', '14', '360000'),
(10, 'Tỉnh Yên Bái', '15', '320000'),
(11, 'Tỉnh Hoà Bình', '17', '350000'),
(12, 'Tỉnh Thái Nguyên', '19', '250000'),
(13, 'Tỉnh Lạng Sơn', '20', '240000'),
(14, 'Tỉnh Quảng Ninh', '22', '200000'),
(15, 'Tỉnh Bắc Giang', '24', '220000'),
(16, 'Tỉnh Phú Thọ', '25', '290000'),
(17, 'Tỉnh Vĩnh Phúc', '26', '280000'),
(18, 'Tỉnh Bắc Ninh', '27', '790000'),
(19, 'Tỉnh Hải Dương', '30', '170000'),
(20, 'Thành phố Hải Phòng', '31', '180000'),
(21, 'Tỉnh Hưng Yên', '33', '160000'),
(22, 'Tỉnh Thái Bình', '34', '410000'),
(23, 'Tỉnh Hà Nam', '35', '400000'),
(24, 'Tỉnh Nam Định', '36', '420000'),
(25, 'Tỉnh Ninh Bình', '37', '430000'),
(26, 'Tỉnh Thanh Hóa', '38', '440000'),
(27, 'Tỉnh Nghệ An', '40', '460000'),
(28, 'Tỉnh Hà Tĩnh', '42', '480000'),
(29, 'Tỉnh Quảng Bình', '44', '510000'),
(30, 'Tỉnh Quảng Trị', '45', '520000'),
(31, 'Tỉnh Thừa Thiên Huế', '46', '530000'),
(32, 'Thành phố Đà Nẵng', '48', '550000'),
(33, 'Tỉnh Quảng Nam', '49', '560000'),
(34, 'Tỉnh Quảng Ngãi', '51', '570000'),
(35, 'Tỉnh Bình Định', '52', '820000'),
(36, 'Tỉnh Phú Yên', '54', '620000'),
(37, 'Tỉnh Khánh Hòa', '56', '650000'),
(38, 'Tỉnh Ninh Thuận', '58', '660000'),
(39, 'Tỉnh Bình Thuận', '60', '800000'),
(40, 'Tỉnh Kon Tum', '62', '580000'),
(41, 'Tỉnh Gia Lai', '64', '600000'),
(42, 'Tỉnh Đắk Lắk', '66', '630000'),
(43, 'Tỉnh Đắk Nông', '67', '640000'),
(44, 'Tỉnh Lâm Đồng', '68', '670000'),
(45, 'Tỉnh Bình Phước', '70', '830000'),
(46, 'Tỉnh Tây Ninh', '72', '840000'),
(47, 'Tỉnh Bình Dương', '74', '590000'),
(48, 'Tỉnh Đồng Nai', '75', '810000'),
(49, 'Tỉnh Bà Rịa - Vũng Tàu', '77', '790000'),
(50, 'Thành phố Hồ Chí Minh', '79', '700000'),
(51, 'Tỉnh Long An', '80', '850000'),
(52, 'Tỉnh Tiền Giang', '82', '860000'),
(53, 'Tỉnh Bến Tre', '83', '930000'),
(54, 'Tỉnh Trà Vinh', '84', '940000'),
(55, 'Tỉnh Vĩnh Long', '86', '890000'),
(56, 'Tỉnh Đồng Tháp', '87', '870000'),
(57, 'Tỉnh An Giang', '89', '880000'),
(58, 'Tỉnh Kiên Giang', '91', '920000'),
(59, 'Thành phố Cần Thơ', '92', '900000'),
(60, 'Tỉnh Hậu Giang', '93', '910000'),
(61, 'Tỉnh Sóc Trăng', '94', '950000'),
(62, 'Tỉnh Bạc Liêu', '95', '260000'),
(63, 'Tỉnh Cà Mau', '96', '970000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `provicence_id` (`provicence_id`),
  ADD KEY `districts_id` (`districts_id`),
  ADD KEY `customer_group_id` (`customer_group_id`);

--
-- Indexes for table `customers_group`
--
ALTER TABLE `customers_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `province_id` (`province_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `provicence_id` (`provicence_id`),
  ADD KEY `district_id` (`district_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `post_category_id` (`post_category_id`);

--
-- Indexes for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sku` (`sku`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `product_category_id` (`product_category_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_relates`
--
ALTER TABLE `product_relates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `customers_group`
--
ALTER TABLE `customers_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=715;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `product_relates`
--
ALTER TABLE `product_relates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`customer_group_id`) REFERENCES `customers_group` (`id`),
  ADD CONSTRAINT `customers_ibfk_2` FOREIGN KEY (`provicence_id`) REFERENCES `provinces` (`id`),
  ADD CONSTRAINT `customers_ibfk_3` FOREIGN KEY (`districts_id`) REFERENCES `districts` (`id`);

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`provicence_id`) REFERENCES `provinces` (`id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`post_category_id`) REFERENCES `post_categories` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`);

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_relates`
--
ALTER TABLE `product_relates`
  ADD CONSTRAINT `product_relates_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD CONSTRAINT `product_reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `customers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
