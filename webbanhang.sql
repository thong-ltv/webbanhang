-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2021 at 03:41 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webbanhang`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `level` int(4) NOT NULL,
  `idgroup` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `fullname`, `level`, `idgroup`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gsu.vn', 'Phạm Minh Hoàng Nam', 1, 1),
(2, 'tester', 'f5d1278e8109edd94e1e4197e04873b9', 'tester@gmail.com', 'tester', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id_banner` int(11) NOT NULL,
  `name_banner` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link_banner` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id_banner`, `name_banner`, `link_banner`) VALUES
(1, 'giảm giá các sản phẩm 50%', 'slideshow.jpg'),
(2, 'túi xách thời trang', 'slideshow_1.jpg'),
(3, 'túi xinh quà đẹp', 'slideshow_2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `transaction_id` int(255) NOT NULL,
  `id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `slspdh` int(11) NOT NULL DEFAULT 0,
  `amount` decimal(15,4) NOT NULL DEFAULT 0.0000,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`transaction_id`, `id`, `product_id`, `slspdh`, `amount`, `status`) VALUES
(19, 15, 16, 1, '575000.0000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `giaodich`
--

CREATE TABLE `giaodich` (
  `id` bigint(20) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `user_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(50) COLLATE utf8_bin NOT NULL,
  `user_phone` varchar(20) COLLATE utf8_bin NOT NULL,
  `amount` decimal(15,4) NOT NULL DEFAULT 0.0000,
  `payment` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `payment_info` text COLLATE utf8_bin NOT NULL,
  `message` varchar(255) COLLATE utf8_bin NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `giaodich`
--

INSERT INTO `giaodich` (`id`, `status`, `user_id`, `user_name`, `user_email`, `user_phone`, `amount`, `payment`, `payment_info`, `message`, `created`) VALUES
(19, 0, 1, 'Nguyễn Thế Luân', 'theluan@gmail.com', '0964986096', '575000.0000', '', '', '', '2021-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id_logo` int(11) NOT NULL,
  `name_logo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_logo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id_logo`, `name_logo`, `image_logo`) VALUES
(1, 'logo web bán hàng', '/images/logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_catalog` int(11) NOT NULL,
  `name_menu` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `invalid_menu` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_catalog`, `name_menu`, `invalid_menu`) VALUES
(25, 'Túi xách', 'tui-xach'),
(26, 'Balo', 'balo'),
(27, 'Ví Bóp', 'vi-bop');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sanpham` int(255) NOT NULL,
  `id_catalog` int(11) NOT NULL,
  `id_sub` int(11) NOT NULL,
  `tensp` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `code_product` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` decimal(15,4) NOT NULL DEFAULT 0.0000,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `image_sp` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created` date DEFAULT NULL,
  `view` int(11) DEFAULT 0,
  `xuatxu` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sizess` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mausac` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_name_menu` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_name_sub` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id_sanpham`, `id_catalog`, `id_sub`, `tensp`, `code_product`, `price`, `description`, `content`, `discount`, `image_sp`, `created`, `view`, `xuatxu`, `sizess`, `mausac`, `parent_name_menu`, `parent_name_sub`) VALUES
(16, 25, 2, 'Túi Đeo Chéo SHO - Màu Hồng', '0101', '575000.0000', '', NULL, 0, 'tui-deo-cheo-1.jpg', '2018-05-22', 0, 'Mỹ', 'L', 'Hồng', 'túi xách', ''),
(17, 25, 3, 'Balo BAC - Màu Xanh Rêu', '0075', '795000.0000', 'Những thiết kế nhỏ xinh này hiện đang \" làm mưa làm gió\" bởi sức hút khó cưỡng và đặc biệt rất hợp với xu hướng thời trang hiện nay.', 'Balo BAC 0075 - Màu Xanh Rêu\r\n\r\nPhụ kiện túi xách có rất nhiều chủng loại, kiểu dáng và màu sắc...Trước đây đã có thời điểm những mẫu túi bigsize được ưa chuộng bởi tính tiện dụng giúp các nàng mang cả \" thế giới phụ nữ\" theo mình ra ngoài. Rồi đến thời điểm những mẫu túi size vừa với dây kéo trẻ trung hay tay cầm quý phái lại lên nắm giữ quyền lực thay cho những thiết kế bigsize. Tuy nhiên dòng chảy thời trang liên tục biến đổi và các thiết kế túi xách cũng không ngừng di chuyển theo, bên cạnh sự chuyển mình về chất liệu, màu sắc, kiểu dáng thì lúc này những chiếc túi mini lại chiếm được vị trí cực kỳ \" đắt giá\" trong lòng các tín đồ thời trang.', NULL, 'tui-xach-0.jpg', NULL, 0, 'Mỹ', 'M', 'Xanh Rêu', 'túi xách', ''),
(18, 25, 3, 'Túi Xách Da Thật SAT - Màu Đen', '0176', '2199000.0000', NULL, NULL, NULL, 'tui-xach-1.jpg', NULL, 0, 'Mỹ', 'M', 'Đen', 'túi xách', ''),
(19, 25, 3, 'Balo BAC - Màu Đen', '0075', '795000.0000', NULL, NULL, NULL, 'tui-xach-2.jpg', NULL, 0, 'Việt Nam', 'M,L', 'Đen', 'túi xách', ''),
(20, 25, 1, 'Túi Xách Tay SAT - Màu Vàng', '0185', '2199000.0000', NULL, NULL, NULL, 'tui-xach-3.jpg', NULL, 0, 'Việt Nam', 'S', 'Vàng', 'túi xách', ''),
(21, 25, 3, 'Balo Mini BAC - Màu Vàng', '0081', '675000.0000', NULL, NULL, NULL, 'tui-xach-4.jpg', NULL, 0, 'Hàn Quốc', 'L,XL', 'Vàng', 'túi xách', ''),
(22, 27, 4, 'Ví Cầm Tay WAL - Màu Vàng', '0145', '395000.0000', NULL, NULL, NULL, 'vi1.jpg', NULL, 0, 'Mỹ', 'M', 'Vàng', 'túi xách', ''),
(23, 27, 5, 'Ví Dự Tiệc CLU - Màu Đen', '0035', '625000.0000', NULL, NULL, NULL, 'vi2.jpg', NULL, 0, 'Lào', 'S,M', 'Đen', 'balo -ví', ''),
(24, 27, 4, 'Ví Cầm Tay WAL - Màu Hồng Nhạt', '0145', '395000.0000', NULL, NULL, NULL, 'vi3.jpg', NULL, 0, 'Trung Quốc', 'S,M,L', '', 'balo -ví', ''),
(25, 27, 4, 'Ví Cầm Tay WAL - Màu Xanh Bạc Hà', '0145', '395000.0000', NULL, NULL, NULL, 'vi4.jpg', NULL, 0, 'Mỹ', 'M', 'Xanh Bạc Hà', 'balo -ví', ''),
(26, 27, 5, 'Ví Dự Tiệc CLU - Màu Bạc', '0028', '1199000.0000', NULL, NULL, NULL, 'vi5.jpg', NULL, 0, NULL, NULL, NULL, 'balo -ví', ''),
(27, 25, 0, 'Túi Xách Da Thật SAT - Màu Đỏ', '0154', '2199000.0000', NULL, NULL, NULL, 'tui-xach-5.jpg', NULL, 0, NULL, NULL, NULL, 'balo -ví', ''),
(28, 25, 3, 'Túi Xách Da Thật SAT - Màu Be', '0155', '1999000.0000', NULL, NULL, NULL, 'tui-xach-6.jpg', NULL, 0, NULL, NULL, NULL, 'balo -ví', '');

-- --------------------------------------------------------

--
-- Table structure for table `sub_menu`
--

CREATE TABLE `sub_menu` (
  `id_sub` int(11) NOT NULL,
  `name_sub` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ivalid_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_catalog` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sub_menu`
--

INSERT INTO `sub_menu` (`id_sub`, `name_sub`, `ivalid_name`, `id_catalog`) VALUES
(1, 'Túi xách tay', 'tui-xach-tay', 25),
(2, 'Túi đeo chéo', 'tui-deo-cheo', 25),
(3, 'Túi xách da thật', 'tui-xach-da-that', 25),
(4, 'Ví cầm tay', '#', 27),
(5, 'Ví dự tiệc', '#', 27);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `created` date DEFAULT current_timestamp(),
  `level` int(4) DEFAULT NULL,
  `idgroup` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fullname`, `email`, `phone`, `address`, `created`, `level`, `idgroup`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Nguyễn Thế Luân', 'theluan@gmail.com', '0964986096', 'HCM', '0000-00-00', 1, 1),
(25, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test', 'namhoang@gsu.vn', '0964876096', 'HCM', '0000-00-00', 3, 0),
(26, 'gadola', 'a30df04e23318ff21c6875a57d6514d5', 'Phạm Minh Hoàng Nam', 'namhoang@gsu.vn', '0855457078', 'TCH18,TCH,Q12,HCM', '0000-00-00', 3, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giaodich`
--
ALTER TABLE `giaodich`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id_logo`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_catalog`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sanpham`),
  ADD KEY `id_catalog` (`id_catalog`),
  ADD KEY `id_catalog_2` (`id_catalog`);
ALTER TABLE `sanpham` ADD FULLTEXT KEY `name` (`tensp`);

--
-- Indexes for table `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD PRIMARY KEY (`id_sub`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `giaodich`
--
ALTER TABLE `giaodich`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id_logo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_catalog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sanpham` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `sub_menu`
--
ALTER TABLE `sub_menu`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
