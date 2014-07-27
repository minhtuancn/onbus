-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Jul 28, 2014 at 12:11 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `onbus`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `branch`
-- 

CREATE TABLE `branch` (
  `branch_id` int(11) NOT NULL auto_increment,
  `nhaxe_id` int(11) NOT NULL,
  `branch_name_vi` varchar(255) NOT NULL,
  `branch_name_safe_vi` varchar(255) NOT NULL,
  `branch_name_en` varchar(255) NOT NULL,
  `branch_name_safe_en` varchar(255) NOT NULL,
  `tinh_id` int(11) NOT NULL,
  `address_vi` varchar(255) NOT NULL,
  `address_en` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `creation_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY  (`branch_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- 
-- Dumping data for table `branch`
-- 

INSERT INTO `branch` VALUES (1, 1, 'Bến xe Vũng Tàu', 'Bến xe Vũng Tàu', '11', '192 Nam Lỳ Khởi Nghĩa, Phường 3, Vũng Tàu, Tỉnh Bà Rịa-Vũng Tàu', 0, '1900 6484', '1406359307', '1406359307', 1, 0, 0);
INSERT INTO `branch` VALUES (2, 1, 'Bến xe Vũng Tàu', 'Bến xe Vũng Tàu', '11', '192 Nam Lỳ Khởi Nghĩa, Phường 3, Vũng Tàu, Tỉnh Bà Rịa-Vũng Tàu', 0, '1900 6484', '1406359581', '1406359581', 1, 0, 0);
INSERT INTO `branch` VALUES (3, 1, 'Bến xe Vũng Tàu', 'ben-xe-vung-tau', 'Bến xe Vũng Tàu', 'ben-xe-vung-tau', 11, '192 Nam Lỳ Khởi Nghĩa, Phường 3, Vũng Tàu, Tỉnh Bà Rịa-Vũng Tàu', '', '1900 6484', 1406359700, 1406360614, 0);
INSERT INTO `branch` VALUES (4, 1, 'Bến xe Vũng Tàu', 'ben-xe-vung-tau', 'Bến xe Vũng Tàu', 'ben-xe-vung-tau', 11, '192 Nam Lỳ Khởi Nghĩa, Phường 3, Vũng Tàu, Tỉnh Bà Rịa-Vũng Tàu', '', '1900 6484', 1406359749, 1406360617, 0);
INSERT INTO `branch` VALUES (5, 1, 'Bến xe Vũng Tàu', 'ben-xe-vung-tau', 'Bến xe Vũng Tàu', 'ben-xe-vung-tau', 11, '192 Nam Lỳ Khởi Nghĩa, Phường 3, Vũng Tàu, Tỉnh Bà Rịa-Vũng Tàu', '192 Nam Lỳ Khởi Nghĩa, Phường 3, Vũng Tàu, Tỉnh Bà Rịa-Vũng Tàu', '1900 6484', 1406359777, 1406360626, 0);
INSERT INTO `branch` VALUES (6, 1, 'Bến xe Vũng Tàu', 'ben-xe-vung-tau', 'Bến xe Vũng Tàu', 'ben-xe-vung-tau', 11, '192 Nam Lỳ Khởi Nghĩa, Phường 3, Vũng Tàu, Tỉnh Bà Rịa-Vũng Tàu', '192 Nam Lỳ Khởi Nghĩa, Phường 3, Vũng Tàu, Tỉnh Bà Rịa-Vũng Tàu', '1900 6484', 1406359807, 1406360654, 1);
INSERT INTO `branch` VALUES (7, 1, 'Bến xe Bắc Giang', 'ben-xe-bac-giang', 'Bến xe Bắc Giang', 'ben-xe-bac-giang', 14, 'Số 167A Đường Xương Giang, Phường Ngô Quyền, Bắc Giang, Tỉnh Bắc Giang', 'Số 167A Đường Xương Giang, Phường Ngô Quyền, Bắc Giang, Tỉnh Bắc Giang', '1900 6484', 1406360801, 1406360801, 1);
INSERT INTO `branch` VALUES (8, 1, 'Vp Quy Nhơn', 'vp-quy-nhon', 'Vp Quy Nhơn', 'vp-quy-nhon', 18, '60 Tây Sơn, Qui Nhơn, Tỉnh Bình Định', '60 Tây Sơn, Qui Nhơn, Tỉnh Bình Định', '1900 6484', 1406360831, 1406360831, 1);
INSERT INTO `branch` VALUES (9, 1, 'Vp Bình Thuận', 'vp-binh-thuan', 'Vp Bình Thuận', 'vp-binh-thuan', 5, '18 khu phố 2 Trường Chinh, P. Xuân An, Phan Thiết, Tỉnh Bình Thuận', '18 khu phố 2 Trường Chinh, P. Xuân An, Phan Thiết, Tỉnh Bình Thuận', '1900 6484', 1406360860, 1406360860, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `car_type`
-- 

CREATE TABLE `car_type` (
  `type_id` int(11) NOT NULL auto_increment,
  `type_name_vi` varchar(255) NOT NULL,
  `type_name_en` varchar(255) NOT NULL,
  `creation_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY  (`type_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `car_type`
-- 

INSERT INTO `car_type` VALUES (1, 'Giường nằm 39 chỗ', 'Giường nằm 39 chỗ', 1406441869, 1406441869, 1);
INSERT INTO `car_type` VALUES (2, 'Ghế ngồi 29 chỗ', 'Ghế ngồi 29 chỗ', 1406441980, 1406441980, 1);
INSERT INTO `car_type` VALUES (3, 'Ghế ngồi 45 chỗ', 'Ghế ngồi 45 chỗ', 1406441993, 1406441993, 1);
INSERT INTO `car_type` VALUES (4, 'Giường nằm 40 chỗ', 'Giường nằm 40 chỗ', 1406442005, 1406442005, 1);
INSERT INTO `car_type` VALUES (5, 'Ghế ngồi 16 chỗ', 'Ghế ngồi 16 chỗ', 1406442058, 1406442058, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `coupon`
-- 

CREATE TABLE `coupon` (
  `coupon_id` int(11) NOT NULL auto_increment,
  `code` varchar(20) NOT NULL,
  `type_id` int(11) NOT NULL COMMENT '1: Giam gia 2: tru tien 3:gift',
  `coupon_value` text NOT NULL,
  `description` text NOT NULL,
  `start_date` int(11) NOT NULL,
  `end_date` int(11) NOT NULL,
  `creation_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY  (`coupon_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `coupon`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `image`
-- 

CREATE TABLE `image` (
  `image_id` int(11) NOT NULL auto_increment,
  `nhaxe_id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `creation_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY  (`image_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

-- 
-- Dumping data for table `image`
-- 

INSERT INTO `image` VALUES (33, 2, 'upload/2014/07/26/1406356540/Jellyfish.jpg', 1406356544, 1406356544, 1);
INSERT INTO `image` VALUES (2, 1, 'upload/2014/07/23/1406101722/Desert.jpg', 1406101795, 1406342102, 0);
INSERT INTO `image` VALUES (3, 1, 'upload/2014/07/23/1406101722/Hydrangeas.jpg', 1406101795, 1406342105, 0);
INSERT INTO `image` VALUES (4, 1, 'upload/2014/07/23/1406101722/Koala.jpg', 1406101795, 1406342285, 0);
INSERT INTO `image` VALUES (5, 1, 'upload/2014/07/23/1406101722/Tulips.jpg', 1406101795, 1406342282, 0);
INSERT INTO `image` VALUES (6, 1, 'upload/2014/07/26/1406342168/Jellyfish.jpg', 1406342171, 1406342274, 0);
INSERT INTO `image` VALUES (7, 1, 'upload/2014/07/26/1406342168/Koala.jpg', 1406342171, 1406342279, 0);
INSERT INTO `image` VALUES (8, 1, 'upload/2014/07/26/1406342168/Penguins.jpg', 1406342171, 1406342277, 0);
INSERT INTO `image` VALUES (9, 1, 'upload/2014/07/26/1406342168/Jellyfish.jpg', 1406342171, 1406342266, 0);
INSERT INTO `image` VALUES (10, 1, 'upload/2014/07/26/1406342168/Koala.jpg', 1406342171, 1406342272, 0);
INSERT INTO `image` VALUES (11, 1, 'upload/2014/07/26/1406342168/Penguins.jpg', 1406342171, 1406342269, 0);
INSERT INTO `image` VALUES (12, 1, 'upload/2014/07/26/1406342296/Koala.jpg', 1406342299, 1406342338, 0);
INSERT INTO `image` VALUES (13, 1, 'upload/2014/07/26/1406342296/Tulips.jpg', 1406342299, 1406342336, 0);
INSERT INTO `image` VALUES (14, 1, 'upload/2014/07/26/1406342296/Penguins.jpg', 1406342299, 1406342311, 0);
INSERT INTO `image` VALUES (15, 1, 'upload/2014/07/26/1406342296/Koala.jpg', 1406342299, 1406342319, 0);
INSERT INTO `image` VALUES (16, 1, 'upload/2014/07/26/1406342296/Tulips.jpg', 1406342299, 1406342313, 0);
INSERT INTO `image` VALUES (17, 1, 'upload/2014/07/26/1406342296/Penguins.jpg', 1406342299, 1406342317, 0);
INSERT INTO `image` VALUES (18, 1, 'upload/2014/07/26/1406342347/Penguins.jpg', 1406342349, 1406342496, 0);
INSERT INTO `image` VALUES (19, 1, 'upload/2014/07/26/1406342347/Tulips.jpg', 1406342349, 1406342426, 0);
INSERT INTO `image` VALUES (20, 1, 'upload/2014/07/26/1406342347/Lighthouse.jpg', 1406342349, 1406342428, 0);
INSERT INTO `image` VALUES (21, 1, 'upload/2014/07/26/1406342440/Hydrangeas.jpg', 1406342444, 1406342493, 0);
INSERT INTO `image` VALUES (22, 1, 'upload/2014/07/26/1406342440/Koala.jpg', 1406342444, 1406342489, 0);
INSERT INTO `image` VALUES (23, 1, 'upload/2014/07/26/1406342440/Lighthouse.jpg', 1406342444, 1406342491, 0);
INSERT INTO `image` VALUES (24, 1, 'upload/2014/07/26/1406342506/Lighthouse.jpg', 1406342511, 1406342511, 1);
INSERT INTO `image` VALUES (25, 1, 'upload/2014/07/26/1406342506/Tulips.jpg', 1406342511, 1406343684, 0);
INSERT INTO `image` VALUES (26, 1, 'upload/2014/07/26/1406342506/Penguins.jpg', 1406342511, 1406343705, 0);
INSERT INTO `image` VALUES (27, 1, 'upload/2014/07/26/1406343715/Lighthouse.jpg', 1406343721, 1406343727, 0);
INSERT INTO `image` VALUES (28, 1, 'upload/2014/07/26/1406343715/Penguins.jpg', 1406343721, 1406343721, 1);
INSERT INTO `image` VALUES (29, 1, 'upload/2014/07/26/1406343715/Tulips.jpg', 1406343721, 1406343721, 1);
INSERT INTO `image` VALUES (30, 2, 'upload/2014/07/26/1406356423/Chrysanthemum.jpg', 1406356425, 1406356425, 1);
INSERT INTO `image` VALUES (31, 2, 'upload/2014/07/26/1406356423/Desert.jpg', 1406356425, 1406356425, 1);
INSERT INTO `image` VALUES (32, 2, 'upload/2014/07/26/1406356423/Hydrangeas.jpg', 1406356425, 1406356425, 1);
INSERT INTO `image` VALUES (34, 2, 'upload/2014/07/26/1406356540/Lighthouse.jpg', 1406356544, 1406356544, 1);
INSERT INTO `image` VALUES (35, 2, 'upload/2014/07/26/1406356540/Penguins.jpg', 1406356544, 1406356544, 1);
INSERT INTO `image` VALUES (36, 2, 'upload/2014/07/26/1406356678/Koala.jpg', 1406356684, 1406356684, 1);
INSERT INTO `image` VALUES (37, 2, 'upload/2014/07/26/1406356678/Lighthouse.jpg', 1406356684, 1406356684, 1);
INSERT INTO `image` VALUES (38, 2, 'upload/2014/07/26/1406356678/Penguins.jpg', 1406356684, 1406356883, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `news`
-- 

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `title_safe` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `creation_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY  (`news_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `news`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `nhaxe`
-- 

CREATE TABLE `nhaxe` (
  `nhaxe_id` int(11) NOT NULL auto_increment,
  `nhaxe_name_vi` varchar(255) NOT NULL,
  `nhaxe_name_safe_vi` varchar(255) NOT NULL,
  `nhaxe_name_en` varchar(255) NOT NULL,
  `nhaxe_name_safe_en` varchar(255) NOT NULL,
  `address_vi` varchar(255) NOT NULL,
  `address_en` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `description_vi` varchar(1000) NOT NULL,
  `description_en` varchar(1000) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `creation_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `hot` tinyint(1) NOT NULL default '0',
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY  (`nhaxe_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `nhaxe`
-- 

INSERT INTO `nhaxe` VALUES (1, 'Hoàng Long', 'hoang-long', 'Hoàng Long', 'hoang-long', 'Ngô Quyền, TP. Hải Phòng', 'Ngô Quyền, TP. Hải Phòng', '0917492306', 'Giới thiệu nhà xe Hoàng Long', 'Giới thiệu nhà xe Hoàng Long', 'upload/images/nha-xe/hoanlong.jpg', 1406092248, 1406360902, 1, 1);
INSERT INTO `nhaxe` VALUES (2, 'Phương Trang', 'phuong-trang', 'Phuong Trang', 'phuong-trang', '123 Pham Ngu Lao', '123 Pham Ngu Lao', '091857453256', 'safdsg dfsg d h d', 'safgsghjgj j j fjf', 'upload/images/nha-xe/Koala.jpg', 1406356401, 1406363369, 1, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `place`
-- 

CREATE TABLE `place` (
  `place_id` int(11) NOT NULL auto_increment,
  `tinh_id` int(11) NOT NULL,
  `mien_id` int(11) NOT NULL,
  `place_name_vi` varchar(255) NOT NULL,
  `place_name_safe_vi` varchar(255) NOT NULL,
  `place_name_en` varchar(255) NOT NULL,
  `place_name_safe_en` varchar(255) NOT NULL,
  `address_vi` varchar(255) NOT NULL,
  `address_en` varchar(255) NOT NULL,
  `creation_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY  (`place_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

-- 
-- Dumping data for table `place`
-- 

INSERT INTO `place` VALUES (1, 0, 0, 'Bến xe Tây Ninh', 'ben-xe-tay-ninh', 'Tay Ninh', 'tay-ninh', '', '', 1406043966, 1406086214, 0);
INSERT INTO `place` VALUES (2, 0, 0, 'Hồ Chí Minh', 'ho-chi-minh', 'Ho Chi Minh', 'ho-chi-minh', '', '', 1406043982, 1406074005, 0);
INSERT INTO `place` VALUES (3, 0, 0, 'Hà Nội', 'ha-noi', 'Ha Noi', 'ha-noi', '', '', 1406043993, 1406073583, 0);
INSERT INTO `place` VALUES (4, 0, 0, 'Test', 'test', 'Test', 'test', '', '', 1406074473, 1406076724, 0);
INSERT INTO `place` VALUES (5, 0, 0, 'aaa', 'aaa', '', '', '', '', 1406075066, 1406076695, 0);
INSERT INTO `place` VALUES (6, 0, 0, 'asdasd', 'asdasd', '', '', '', '', 1406075136, 1406076693, 0);
INSERT INTO `place` VALUES (7, 0, 0, 'asdad', 'asdad', '', '', '', '', 1406075180, 1406076627, 0);
INSERT INTO `place` VALUES (8, 0, 0, 'asd', 'asd', '', '', '', '', 1406075358, 1406076623, 0);
INSERT INTO `place` VALUES (9, 0, 0, 'asdasdf', 'asdasdf', '', '', '', '', 1406075365, 1406076592, 0);
INSERT INTO `place` VALUES (10, 0, 0, 'asdasd', 'asdasd', 'asdasd', 'asdasd', '', '', 1406075430, 1406076360, 0);
INSERT INTO `place` VALUES (11, 0, 0, '', '', '', '', '', '', 1406076717, 1406076720, 0);
INSERT INTO `place` VALUES (12, 1, 1, 'Bến xe Miền Đông', 'ben-xe-mien-dong', 'Mien Dong', 'mien-dong', '292 Đinh Bộ Lĩnh, Phường 26 - Bình Thạnh - Hồ Chí Minh', '292 Đinh Bộ Lĩnh, Phường 26 - Bình Thạnh - Hồ Chí Minh', 1406076736, 1406434565, 1);
INSERT INTO `place` VALUES (13, 0, 0, 'Bến xe Thành Bưởi', 'ben-xe-thanh-buoi', 'Thanh Buoi', 'thanh-buoi', '', '', 1406076759, 1406087135, 0);
INSERT INTO `place` VALUES (14, 9, 2, 'Nha Trang', 'nha-trang', 'Nha Trang', 'nha-trang', 'Nha Trang - Khánh Hòa', 'Nha Trang - Khánh Hòa', 1406076779, 1406434507, 1);
INSERT INTO `place` VALUES (15, 0, 0, 'Bến xe Phan Thiết', 'ben-xe-phan-thiet', 'Phan Thiet', 'phan-thiet', '', '', 1406076789, 1406087340, 0);
INSERT INTO `place` VALUES (16, 0, 0, 'Bến xe Thái Bình', 'ben-xe-thai-binh', 'Thai Binh', 'thai-binh', '', '', 1406076799, 1406087343, 0);
INSERT INTO `place` VALUES (17, 0, 0, 'Huế', 'hue', 'Hue', 'hue', '', '', 1406076850, 1406082260, 0);
INSERT INTO `place` VALUES (18, 0, 0, 'Hải Phòng', 'hai-phong', 'Hai Phong', 'hai-phong', '', '', 1406076859, 1406082257, 0);
INSERT INTO `place` VALUES (19, 0, 0, 'Đà Nẵng', 'da-nang', 'Da Nang', 'da-nang', '', '', 1406076869, 1406082254, 0);
INSERT INTO `place` VALUES (20, 0, 0, 'Bến xe Long An', 'ben-xe-long-an', 'Long An', 'long-an', '', '', 1406076898, 1406087347, 0);
INSERT INTO `place` VALUES (21, 0, 0, 'Lạng Sơn', 'lang-son', 'Lang Son', 'lang-son', '', '', 1406076918, 1406084718, 0);
INSERT INTO `place` VALUES (22, 0, 0, '', '', '', '', '', '', 1406079731, 1406083472, 0);
INSERT INTO `place` VALUES (23, 0, 0, '', '', '', '', '', '', 1406079767, 1406083468, 0);
INSERT INTO `place` VALUES (24, 0, 0, '', '', '', '', '', '', 1406079829, 1406083544, 0);
INSERT INTO `place` VALUES (25, 0, 0, '', '', '', '', '', '', 1406079858, 1406083541, 0);
INSERT INTO `place` VALUES (26, 14, 3, 'Bến xe Lương Yên', 'ben-xe-luong-yen', 'Luong Yen', 'luong-yen', '3 Nguyễn Khoái, Bạch Đằng - Hai Bà Trưng - Hà Nội', '3 Nguyễn Khoái, Bạch Đằng - Hai Bà Trưng - Hà Nội', 1406084714, 1406434515, 1);
INSERT INTO `place` VALUES (27, 1, 1, 'Khu phố Tây', 'khu-pho-tay', 'Khu pho Tay', 'khu-pho-tay', 'Phạm Ngũ Lão - Quận 1 - Hồ Chí Minh', 'Phạm Ngũ Lão - Quận 1 - Hồ Chí Minh', 1406085816, 1406434533, 1);
INSERT INTO `place` VALUES (28, 2, 0, 'Văn phòng Cần Thơ', 'van-phong-can-tho', 'Van Phong Can Tho', 'van-phong-can-tho', 'Quốc lộ 91B, P.Hưng Lợi - Ninh Kiều - Cần Thơ', 'Quốc lộ 91B, P.Hưng Lợi - Ninh Kiều - Cần Thơ', 1406087194, 1406433556, 1);
INSERT INTO `place` VALUES (29, 2, 1, 'Bến xe 91B Cần Thơ', 'ben-xe-91b-can-tho', 'Ben xe 91B Can Tho', 'ben-xe-91b-can-tho', 'Lộ 91B, Nguyễn Văn Linh, Phường Hưng Lợi - Ninh Kiều - Cần Thơ', 'Lộ 91B, Nguyễn Văn Linh, Phường Hưng Lợi - Ninh Kiều - Cần Thơ', 1406087285, 1406434802, 1);
INSERT INTO `place` VALUES (30, 13, 2, 'Mũi Né', 'mui-ne', 'Mui Ne', 'mui-ne', '20 Huỳnh Thúc Kháng, P. Hàm Tiến - Phan Thiết - Bình Thuận', '20 Huỳnh Thúc Kháng, P. Hàm Tiến - Phan Thiết - Bình Thuận', 1406087332, 1406434814, 1);
INSERT INTO `place` VALUES (31, 14, 3, 'Bến xe Mỹ Đình', 'ben-xe-my-dinh', 'Ben xe My Dinh', 'ben-xe-my-dinh', '20 Phạm Hùng, Mỹ Đình - Từ Liêm - Hà Nội', '20 Phạm Hùng, Mỹ Đình - Từ Liêm - Hà Nội', 1406087381, 1406434823, 1);
INSERT INTO `place` VALUES (32, 14, 3, 'Bến xe Giáp Bát', 'ben-xe-giap-bat', 'Bến xe Giáp Bát', 'ben-xe-giap-bat', 'Km6 đường Giải phóng - Hoàng Mai - Hà Nội', 'Km6 đường Giải phóng - Hoàng Mai - Hà Nội', 1406087506, 1406434831, 1);
INSERT INTO `place` VALUES (33, 20, 3, 'Bến xe Quỳnh Côi', 'ben-xe-quynh-coi', 'Bến xe Quỳnh Côi', 'ben-xe-quynh-coi', 'Thị trấn Quỳnh Côi - Quỳnh Phụ - Thái Bình', 'Thị trấn Quỳnh Côi - Quỳnh Phụ - Thái Bình', 1406087555, 1406434793, 1);
INSERT INTO `place` VALUES (34, 0, 0, 'Cửa Ông', 'cua-ong', 'Cửa Ông', 'cua-ong', 'Phường Cửa Ông - Cẩm Phả - Quảng Ninh', 'Phường Cửa Ông - Cẩm Phả - Quảng Ninh', 1406087609, 1406087609, 1);
INSERT INTO `place` VALUES (35, 0, 0, '', '', '', '', '', '', 1406435084, 1406435084, 1);
INSERT INTO `place` VALUES (36, 0, 0, '', '', '', '', '', '', 1406446266, 1406446266, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `route`
-- 

CREATE TABLE `route` (
  `route_id` int(11) NOT NULL auto_increment,
  `nhaxe_id` int(11) NOT NULL,
  `route_name_vi` varchar(255) NOT NULL,
  `route_name_safe_vi` varchar(255) NOT NULL,
  `route_name_en` varchar(255) NOT NULL,
  `route_name_safe_en` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `place_id_start` int(11) NOT NULL,
  `place_id_end` int(11) NOT NULL,
  `creation_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY  (`route_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `route`
-- 

INSERT INTO `route` VALUES (1, 1, 'Sài Gòn - Hà Nội', 'sai-gon-ha-noi', 'Sai Gon - Ha Noi', 'sai-gon-ha-noi', 'Tuyến xe từ Sài Gòn đi Hà Nội.', 12, 26, 1406084756, 1406341967, 0);
INSERT INTO `route` VALUES (3, 2, 'Sài Gòn - Nha Trang', 'sai-gon-nha-trang', 'Sai Gon - Nha Trang', 'sai-gon-nha-trang', 'Chuyến xe từ Sài gòn đi Nha Trang', 27, 14, 1406085862, 1406371302, 1);
INSERT INTO `route` VALUES (4, 1, 'Sài Gòn - Phan Thiết, Bình Thuận', 'sai-gon-phan-thiet-binh-thuan', 'Sài Gòn - Phan Thiết, Bình Thuận', 'sai-gon-phan-thiet-binh-thuan', 'Chuyến xe SG đi Phan Thiết\r\n', 12, 30, 1406087441, 1406087441, 1);
INSERT INTO `route` VALUES (5, 1, 'Hà Nội - Thái Bình', 'ha-noi-thai-binh', 'Hà Nội - Thái Bình', 'ha-noi-thai-binh', 'Hà Nội đi Thái Bình', 32, 33, 1406087578, 1406102278, 0);
INSERT INTO `route` VALUES (6, 1, 'Hà Nội - Quảng Ninh', 'ha-noi-quang-ninh', 'Hà Nội - Quảng Ninh', 'ha-noi-quang-ninh', 'Hà Nội đi Quảng Ninh', 31, 34, 1406087650, 1406087650, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `services`
-- 

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL auto_increment,
  `service_name_vi` varchar(255) NOT NULL,
  `service_name_safe_vi` varchar(255) default NULL,
  `service_name_en` varchar(255) NOT NULL,
  `service_name_safe_en` varchar(255) default NULL,
  `image_url` varchar(255) default NULL,
  `creation_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY  (`service_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `services`
-- 

INSERT INTO `services` VALUES (1, 'Nước uống', 'nuoc-uong', 'Drinking water', 'drinking-water', NULL, 1406080116, 1406080159, 1);
INSERT INTO `services` VALUES (2, 'Wifi', 'wifi', 'Wifi', 'wifi', NULL, 1406080167, 1406080167, 1);
INSERT INTO `services` VALUES (3, 'Khăn lạnh', 'khan-lanh', 'Cold towels', 'cold-towels', NULL, 1406080198, 1406080198, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `ticket`
-- 

CREATE TABLE `ticket` (
  `ticket_id` int(11) NOT NULL auto_increment,
  `nhaxe_id` int(11) NOT NULL,
  `tinh_id_start` int(11) NOT NULL,
  `tinh_id_end` int(11) NOT NULL,
  `place_id_start` int(11) NOT NULL,
  `place_id_end` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `car_type` tinyint(4) NOT NULL,
  `stop` tinyint(4) NOT NULL,
  `note` varchar(255) NOT NULL,
  `date_start` int(11) NOT NULL,
  `date_end` int(11) NOT NULL,
  `creation_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY  (`ticket_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `ticket`
-- 

INSERT INTO `ticket` VALUES (1, 1, 1, 14, 12, 26, 800000, 1, '8 gio 30 phut', 14, 3, 3, '', 1406390400, 1406563200, 1406459045, 1406459045, 1);
INSERT INTO `ticket` VALUES (2, 1, 1, 14, 12, 26, 800000, 2, '8 gio 30 phut', 14, 3, 3, '', 1406390400, 1406563200, 1406459835, 1406459835, 1);
INSERT INTO `ticket` VALUES (3, 1, 1, 14, 27, 32, 800000, 2, '8 gio 30 phut', 14, 3, 3, '', 1406390400, 1406563200, 1406460978, 1406460978, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `time_start`
-- 

CREATE TABLE `time_start` (
  `time_id` int(11) NOT NULL auto_increment,
  `time_start` varchar(255) NOT NULL,
  `time_start_safe` varchar(255) NOT NULL,
  `creation_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY  (`time_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- 
-- Dumping data for table `time_start`
-- 

INSERT INTO `time_start` VALUES (1, '04:00 AM', '', 1406078587, 1406078881, 1);
INSERT INTO `time_start` VALUES (2, '05:00 AM', '', 1406078610, 1406078887, 1);
INSERT INTO `time_start` VALUES (3, '6:00 AM', '', 1406078650, 1406078650, 1);
INSERT INTO `time_start` VALUES (4, '07:00 AM', '', 1406078692, 1406078894, 1);
INSERT INTO `time_start` VALUES (5, '08:00 AM', '', 1406078810, 1406078900, 1);
INSERT INTO `time_start` VALUES (6, '09:00 AM', '', 1406078818, 1406078946, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `tinh`
-- 

CREATE TABLE `tinh` (
  `tinh_id` int(11) NOT NULL auto_increment,
  `tinh_name_vi` varchar(255) NOT NULL,
  `tinh_name_safe_vi` varchar(255) NOT NULL,
  `tinh_name_en` varchar(255) NOT NULL,
  `tinh_name_safe_en` varchar(255) NOT NULL,
  `mien_id` tinyint(4) NOT NULL COMMENT '1: Mien Nam 2 : Trung - Tay Nguyen 3 : Mien Bac',
  `hot` tinyint(1) NOT NULL default '0',
  `image_url` varchar(255) default NULL,
  `price_between` varchar(100) default NULL,
  `display_order` int(11) NOT NULL,
  `creation_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY  (`tinh_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

-- 
-- Dumping data for table `tinh`
-- 

INSERT INTO `tinh` VALUES (1, 'Sài Gòn', 'sai-gon', 'Sài Gòn', 'sai-gon', 1, 1, NULL, NULL, 1, 1406428915, 1406446027, 1);
INSERT INTO `tinh` VALUES (2, 'Cần Thơ', 'can-tho', 'Can Tho', 'can-tho', 1, 1, NULL, NULL, 1, 1406429550, 1406429707, 1);
INSERT INTO `tinh` VALUES (3, 'Bà Rịa - Vũng Tàu', 'ba-ria-vung-tau', 'Bà Rịa - Vũng Tàu', 'ba-ria-vung-tau', 1, 1, '', '', 1, 1406429724, 1406429724, 1);
INSERT INTO `tinh` VALUES (4, 'Cà Mau', 'ca-mau', 'Ca Mau', 'ca-mau', 1, 0, '', '', 1, 1406429739, 1406429739, 1);
INSERT INTO `tinh` VALUES (5, 'An Giang', 'an-giang', 'An Giang', 'an-giang', 1, 0, '', '', 1, 1406430542, 1406430542, 1);
INSERT INTO `tinh` VALUES (6, 'Bạc Liêu', 'bac-lieu', 'Bac Lieu', 'bac-lieu', 1, 0, '', '', 1, 1406430564, 1406430564, 1);
INSERT INTO `tinh` VALUES (7, 'Đà Nẵng', 'da-nang', 'Da Nang', 'da-nang', 2, 1, '', '', 1, 1406430592, 1406430592, 1);
INSERT INTO `tinh` VALUES (8, 'Quãng Ngãi', 'quang-ngai', 'Quang Ngai', 'quang-ngai', 2, 1, '', '', 1, 1406430607, 1406430607, 1);
INSERT INTO `tinh` VALUES (9, 'Khánh Hòa', 'khanh-hoa', 'Khanh Hoa', 'khanh-hoa', 2, 1, '', '', 1, 1406430629, 1406430629, 1);
INSERT INTO `tinh` VALUES (10, 'Thừa Thiên - Huế', 'thua-thien-hue', 'Thua Thien - Hue', 'thua-thien-hue', 2, 1, '', '', 1, 1406430655, 1406430655, 1);
INSERT INTO `tinh` VALUES (11, 'Lâm Đồng', 'lam-dong', 'Lam Dong', 'lam-dong', 2, 0, '', '', 1, 1406430672, 1406430672, 1);
INSERT INTO `tinh` VALUES (12, 'Bình Định', 'binh-dinh', 'Binh Dinh', 'binh-dinh', 2, 0, '', '', 1, 1406430688, 1406430688, 1);
INSERT INTO `tinh` VALUES (13, 'Bình Thuận', 'binh-thuan', 'Binh Thuan', 'binh-thuan', 2, 0, '', '', 1, 1406430703, 1406430703, 1);
INSERT INTO `tinh` VALUES (14, 'Hà Nội', 'ha-noi', 'Ha Noi', 'ha-noi', 3, 1, '', '', 1, 1406430724, 1406430724, 1);
INSERT INTO `tinh` VALUES (15, 'Hải Phòng', 'hai-phong', 'Hai Phong', 'hai-phong', 3, 1, '', '', 1, 1406430741, 1406430741, 1);
INSERT INTO `tinh` VALUES (16, 'Quảng Ninh', 'quang-ninh', 'Quang Ninh', 'quang-ninh', 3, 1, '', '', 1, 1406430757, 1406430757, 1);
INSERT INTO `tinh` VALUES (17, 'Thái Nguyên', 'thai-nguyen', 'Thai Nguyen', 'thai-nguyen', 3, 1, '', '', 1, 1406430771, 1406430771, 1);
INSERT INTO `tinh` VALUES (18, 'Bắc Giang', 'bac-giang', 'Bac Giang', 'bac-giang', 3, 0, '', '', 1, 1406430786, 1406430786, 1);
INSERT INTO `tinh` VALUES (19, 'Bắc Kạn', 'bac-kan', 'Bac Kan', 'bac-kan', 3, 0, '', '', 1, 1406430808, 1406430808, 1);
INSERT INTO `tinh` VALUES (20, 'Thái Bình', 'thai-binh', 'Thai Binh', 'thai-binh', 3, 0, '', '', 1, 1406433647, 1406433647, 1);
