-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Aug 06, 2014 at 07:53 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `onbus`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `articles`
-- 

CREATE TABLE `articles` (
  `article_id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `title_safe` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `content` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `hot` tinyint(1) NOT NULL,
  `lang_id` tinyint(4) NOT NULL,
  `creation_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY  (`article_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `articles`
-- 

INSERT INTO `articles` VALUES (1, 'Kinh nghiệm đi xe không say', 'kinh-nghiem-di-xe-khong-say', 'upload/images/tin-tuc/Untitled-1.jpg', 'Onbus.vn xin chia sẻ cách đi xe không say, đây là kinh nghiệm đi xe để không bị say xe. Hãy đọc kỹ hoặc in cũng như chia sẻ cho bạn bè để cùng có kinh nghiệm đi xe KINH NGHIỆM ĐI XE KHÔNG SAY Đối với những người say xe, đi du lịch bằng xe là nỗi ám ảnh đối với nhiều du khách.', 'Onbus.vn xin chia sẻ c&aacute;ch đi xe kh&ocirc;ng say, đ&acirc;y l&agrave; kinh nghiệm đi xe để kh&ocirc;ng bị say xe. H&atilde;y đọc kỹ hoặc in cũng như chia sẻ cho bạn b&egrave; để c&ugrave;ng c&oacute; kinh nghiệm đi xe KINH NGHIỆM ĐI XE KH&Ocirc;NG SAY Đối với những người say xe, đi du lịch bằng xe l&agrave; nỗi &aacute;m ảnh đối với nhiều du kh&aacute;ch. C&oacute; người, muốn đi du lịch nhưng bị say xe lại kh&ocirc;ng d&aacute;m đi, cũng c&oacute; người đi đến du lịch th&igrave; kh&ocirc;ng c&ograve;n t&acirc;m tr&iacute; m&agrave; đi tham quan hay nghỉ dưỡng, kh&aacute;m ph&aacute; cũng v&igrave; say xe. Để gi&uacute;p nhiều du kh&aacute;ch bị say xe c&oacute; một chuyến đi vui vẻ nhất v&agrave;o m&ugrave;a du lịch, atour.com.vn xin chia sẻ một v&agrave;i kinh nghiệm để tr&aacute;nh bị say xe. Mỗi một c&aacute;ch lại ph&ugrave; hợp với những người kh&aacute;c nhau, tuy nhi&ecirc;n, qua thực tế v&agrave; kiểm nghiệm ch&uacute;ng t&ocirc;i thấy những điều sau kh&aacute; đ&uacute;ng v&agrave; hữu &iacute;ch, c&oacute; t&aacute;c dụng với nhiều người.<br />\r\n<div style="text-align: center;">\r\n	<img alt="" src="../upload/images/tin-tuc/Untitled-1.jpg" style="width: 303px; height: 200px;" /></div>\r\n<br />\r\nTại sao, qu&yacute; kh&aacute;ch kh&ocirc;ng thử để tr&aacute;nh được cảm gi&aacute;c say xe qua mỗi chuyến đi. Lựa chọn vị tr&iacute; tr&ecirc;n xe Một sai lầm của nhiều du kh&aacute;ch khi đi xe ngay cả với xe 45 chỗ l&agrave; ngồi ghế đầu. Thực ra n&oacute; chỉ đ&uacute;ng khi qu&yacute; kh&aacute;ch ngồi xe con. Đối với c&aacute;c loại xe từ 30 chỗ trở l&ecirc;n người say xe kh&ocirc;ng n&ecirc;n ngồi ghế đầu. C&oacute; thể nhiều du kh&aacute;ch kh&ocirc;ng để &yacute;, ghế đầu ti&ecirc;n của xe 45 chỗ l&agrave; đ&uacute;ng vị tr&iacute; của b&aacute;nh xe trước. Khi xe v&agrave;o đoạn cua, đặc biệt l&agrave; đường đ&egrave;o, người ngồi đầu sẽ c&oacute; cảm gi&aacute;c như m&igrave;nh đang bị quay v&ograve;ng tr&ograve;n g&acirc;y ch&oacute;ng mặt. Nếu bị cua đi cua lại nhiều lần chắc chắn du kh&aacute;ch sẽ bị say. Chỗ tuyệt vời nhất đồi với người say xe l&agrave; ở giữa xe, vị tr&iacute; của giữ b&aacute;ng trước v&agrave; b&aacute;nh sau. Khi xe cua hay quay, ngồi vị tr&iacute; n&agrave;y mọi người kh&ocirc;ng c&oacute; cảm gi&aacute;c bị quay người m&agrave; chỉ cảm gi&aacute;c m&igrave;nh vẫn ngồi theo đ&uacute;ng một hướng. trong-xe-du-lich H&igrave;nh ảnh b&ecirc;n trong xe du lịch Hướng nh&igrave;n tr&ecirc;n xe Rất nhiều người khi say xe c&oacute; th&oacute;i quen gục đầu ngủ hoặc nh&igrave;n trong xe, nh&igrave;n v&agrave;o ghế đằng trước hoặc c&uacute;i đầu. Điều n&agrave;y c&agrave;ng g&acirc;y say xe. H&atilde;y cố gắng nh&igrave;n thật xa. Khi bạn nh&igrave;n v&agrave;o dệ đường hoặc gần th&igrave; cảm gi&aacute;c xe đi rất nhanh. Nếu bạn nh&igrave;n ra xa, c&agrave;ng xa th&igrave; c&agrave;ng cảm gi&aacute;c xe đi rất chậm, thậm ch&iacute; xe đứng y&ecirc;n. H&atilde;y cố gắng ngồi gần cửa k&iacute;nh để nh&igrave;n ra thật xa. Ăn, uống tr&ecirc;n xe Nhiều người đi du lịch hay chuẩn bị đồ ăn cho đỡ buồn hoặc uống nước. Tr&ecirc;n thực tế, nếu qu&yacute; kh&aacute;ch uống đồ nước ngọt c&oacute; ga hoặc ăn những đồ ăn nặng m&ugrave;i, lạc v&agrave; những đồ ăn g&acirc;y đầy bụng rất dễ g&acirc;y say xe. H&atilde;y chỉ uống nước lọc tr&ecirc;n xe v&agrave; ăn một v&agrave;i loại hoa quả như t&aacute;o, bưởi...Nếu ăn hoặc ngửi b&aacute;nh mỳ n&ecirc;n d&ugrave;ng loại b&aacute;nh mặn như b&aacute;nh b&igrave;nh thường v&agrave; kh&ocirc;ng kẹp thịt hoặc chả, gi&ograve;... V&agrave;o m&ugrave;a lễ hội, du kh&aacute;ch thường chuẩn bị những đồ lễ, v&agrave; khi lễ xong th&igrave; thụ lộc c&oacute; khi tr&ecirc;n xe lu&ocirc;n.<br />\r\n<br />\r\nRất nhiều kh&aacute;ch ăn b&aacute;nh, kẹo tr&ecirc;n xe c&agrave;ng g&acirc;y say xe. H&atilde;y chỉ ăn những hoa quả nhất l&agrave; cam hoặc bưởi. Hoạt động tr&ecirc;n xe Khoảng 40% du kh&aacute;ch bị say xe l&agrave; do kh&ocirc;ng giao lưu c&aacute;c hoạt động tr&ecirc;n xe. H&atilde;y cố gắng giao lưu ca h&aacute;t, n&oacute;i chuyện với người b&ecirc;n cạnh hoặc ch&uacute; &yacute; theo sự hướng dẫn của người hướng dẫn vi&ecirc;n. Đặc biệt kh&ocirc;ng n&ecirc;n đọc s&aacute;ch, d&ugrave;ng điện thoại nhắn tin tr&ecirc;n xe. Khi du kh&aacute;ch để &yacute; v&agrave;o một m&agrave;n h&igrave;nh m&aacute;y t&iacute;nh hoặc s&aacute;ch b&aacute;o sẽ dễ say xe hơn do để &yacute; v&agrave;o vật dụng qu&aacute; nhỏ m&agrave; kh&ocirc;ng c&oacute; tầm nh&igrave;n tho&aacute;ng đ&atilde;ng. H&atilde;y xem m&agrave;n h&igrave;nh ti vi tr&ecirc;n xe, nh&igrave;n hướng dẫn vi&ecirc;n hoặc nh&igrave;n v&agrave;o những người kh&aacute;c n&oacute;i chuyện sẽ rất hữu &iacute;ch để tr&aacute;nh say xe. 90% du kh&aacute;ch say xe do chơi b&agrave;i tr&ecirc;n xe do tập trung v&agrave;o khoảng c&aacute;ch qu&aacute; gần. Đừng bao giờ ngồi quay người về ph&iacute;a sau xe khi xe đang đi về ph&iacute;a trước bởi l&agrave;m vậy cực kỳ nhanh say xe.', 1, 0, 1, 1406705933, 1406708218, 1, 0);
INSERT INTO `articles` VALUES (2, 'Hướng dẫn kinh nghiệm đi xe giường nằm dịp Tết', 'huong-dan-kinh-nghiem-di-xe-giuong-nam-dip-tet', 'upload/images/tin-tuc/Screenshot_1.png', 'Chọn giường khi mua vé: Một số hãng xe giường nằm tại Việt Nam hiện nay: Hoàng Long, Mailinh, Trà Lan Viên, Phương Nam...', 'Chọn giường khi mua v&eacute;: Một số h&atilde;ng xe giường nằm tại Việt Nam hiện nay: Ho&agrave;ng Long, Mailinh, Tr&agrave; Lan Vi&ecirc;n, Phương Nam... Xe giường nằm: th&ocirc;ng thường gồm c&oacute; 3 d&atilde;y giường nằm (kh&aacute;ch với xe kh&aacute;ch th&ocirc;ng thường chỉ c&oacute; 2 d&atilde;y ghế ngồi), mỗi d&atilde;y c&oacute; 2 tầng: tr&ecirc;n v&agrave; dưới. Một số xe c&oacute; nh&agrave; vệ sinh tr&ecirc;n xe, một số lại kh&ocirc;ng. V&igrave; &iacute;t chỗ hơn n&ecirc;n gi&aacute; v&eacute; dạng xe n&agrave;y sẽ đắt hơn xe ghế một &iacute;t. Thường th&igrave; vị tr&iacute; c&aacute;c giường như sau: - Nếu được chọn th&igrave; n&ecirc;n chọn giường nằm ở d&atilde;y giữa l&agrave; tốt nhất. N&ecirc;n chọn giường nằm từ vị tr&iacute; giường thứ 2 đến thứ 5 l&agrave; được. Tuy nhi&ecirc;n, một v&agrave;i thương hiệu xe (v&iacute; dụ như HL), nếu sợ lạnh th&igrave; bạn phải tr&aacute;nh h&agrave;ng giữa đặc biệt 2-3 gường đầu h&agrave;ng v&igrave; hệ thống điều h&ograve;a thổi mạnh ở đấy m&agrave; bạn kh&ocirc;ng thể điều chỉnh to nhỏ, hướng thổi. - Nằm tầng dưới sẽ tiện cho việc l&ecirc;n xuống xe, giảm được lắc lư. - Nếu bạn l&agrave; người kh&ocirc;ng th&iacute;ch khoảng kh&ocirc;ng gian chật chội tr&ecirc;n đầu th&igrave; n&ecirc;n nằm tầng tr&ecirc;n v&igrave; khoảng c&aacute;ch từ giừơng đến mui xe (tầng 2) sẽ rộng hơn khoảng c&aacute;ch từ giường dưới l&ecirc;n giường tr&ecirc;n (tầng 1) - Nếu bạn th&iacute;ch chọn giường đ&ocirc;i th&igrave; h&atilde;y chọn trong 5 giuờng cuối c&ugrave;ng ở tầng một (gường số 15, 16, 17, 18, 19). - Nếu bạn đi c&oacute; trẻ em th&igrave; n&ecirc;n mua những giường liền nhau ph&iacute;a tầng 2 (giường số 35, 36, 37, 38, 39)<br />\r\n<div style="text-align: center;">\r\n	<img alt="" src="../upload/images/tin-tuc/Screenshot_1.png" style="width: 469px; height: 356px;" /></div>\r\n<br />\r\n&nbsp;H&agrave;nh l&yacute;: - N&ecirc;n gửi h&agrave;nh l&yacute; ở hầm xe (lấy phiếu gửi h&agrave;nh l&yacute;). Do giường nằm c&oacute; diện t&iacute;ch hạn chế cho n&ecirc;n chỉ mang l&ecirc;n xe những vật dụng cần thiết sử dụng dọc đường đi m&agrave; th&ocirc;i. Giầy d&eacute;p: Bạn n&ecirc;n đi d&eacute;p để tiện cho việc l&ecirc;n xuống v&igrave; bạn sẽ kh&ocirc;ng được đi d&eacute;p v&agrave;o giường. Bạn phải để giầy d&eacute;p v&agrave;o một t&uacute;i nil&ocirc;ng để giữ đề ph&ograve;ng người kh&aacute;c v&ocirc; t&igrave;nh hay cố &yacute; sỏ nhầm. An to&agrave;n: N&ecirc;n thắt d&acirc;y an to&agrave;n, đặc biệt với giường nằm ở tầng tr&ecirc;n. WC: Xe c&oacute; WC sẽ rất thuận tiện với h&agrave;nh kh&aacute;ch tr&ecirc;n chặng đường xa, &iacute;t phải gh&eacute; c&aacute;c trạm. Dĩ nhi&ecirc;n l&agrave; nếu WC đ&oacute; sạch sẽ. Nếu bạn muốn giữ n&oacute; sạch th&igrave; đường bao giờ qu&ecirc;n việc nhấn n&uacute;t x&atilde; nước trước khi rời khỏi ph&ograve;ng vệ sinh. Để tr&aacute;nh t&eacute; ng&atilde; khi xe thắng: n&ecirc;n cầm c&aacute;c tay vịn hoặc tỳ tr&aacute;n l&ecirc;n v&aacute;ch. C&oacute; thể hứng nước trong bồn rửa mặt để dội s&agrave;n đứng nếu bạn l&agrave;m bẩn n&oacute;, s&agrave;n n&agrave;y c&oacute; lỗ tho&aacute;t nước, đừng lo. Ăn uống: Th&ocirc;ng thường gi&aacute; v&eacute; xe sẽ bao gồm lu&ocirc;n suất ăn c&aacute;c bữa (dĩ nhi&ecirc;n với c&aacute;c tuyến xa). C&aacute;c h&atilde;ng xe sẽ sắp xếp cho du kh&aacute;ch d&ugrave;ng bữa theo kiểu ăn cơm phần (trừ ăn s&aacute;ng). Nếu du kh&aacute;ch muốn ăn phở, b&uacute;n, hủ tiếu... thay cho phần cơm th&igrave; c&oacute; thể li&ecirc;n hệ với tổ phục vụ tr&ecirc;n xe để đặt trước. C&aacute;c khoản như: ăn th&ecirc;m, nước uống cho bữa ăn,... bạn phải tự thanh to&aacute;n nếu sử dụng.', 1, 1, 1, 1406707383, 1406708191, 1, 0);
INSERT INTO `articles` VALUES (3, 'FP', 'fp', '', '', '', 1, 1, 2, 1406962548, 1406962556, 0, 0);

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
  `user_id` int(11) NOT NULL,
  PRIMARY KEY  (`branch_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- 
-- Dumping data for table `branch`
-- 

INSERT INTO `branch` VALUES (1, 1, 'Bến xe Vũng Tàu', 'Bến xe Vũng Tàu', '11', '192 Nam Lỳ Khởi Nghĩa, Phường 3, Vũng Tàu, Tỉnh Bà Rịa-Vũng Tàu', 0, '1900 6484', '1406359307', '1406359307', 1, 0, 0, 0);
INSERT INTO `branch` VALUES (2, 1, 'Bến xe Vũng Tàu', 'Bến xe Vũng Tàu', '11', '192 Nam Lỳ Khởi Nghĩa, Phường 3, Vũng Tàu, Tỉnh Bà Rịa-Vũng Tàu', 0, '1900 6484', '1406359581', '1406359581', 1, 0, 0, 0);
INSERT INTO `branch` VALUES (3, 1, 'Bến xe Vũng Tàu', 'ben-xe-vung-tau', 'Bến xe Vũng Tàu', 'ben-xe-vung-tau', 11, '192 Nam Lỳ Khởi Nghĩa, Phường 3, Vũng Tàu, Tỉnh Bà Rịa-Vũng Tàu', '', '1900 6484', 1406359700, 1406360614, 0, 0);
INSERT INTO `branch` VALUES (4, 1, 'Bến xe Vũng Tàu', 'ben-xe-vung-tau', 'Bến xe Vũng Tàu', 'ben-xe-vung-tau', 11, '192 Nam Lỳ Khởi Nghĩa, Phường 3, Vũng Tàu, Tỉnh Bà Rịa-Vũng Tàu', '', '1900 6484', 1406359749, 1406360617, 0, 0);
INSERT INTO `branch` VALUES (5, 1, 'Bến xe Vũng Tàu', 'ben-xe-vung-tau', 'Bến xe Vũng Tàu', 'ben-xe-vung-tau', 11, '192 Nam Lỳ Khởi Nghĩa, Phường 3, Vũng Tàu, Tỉnh Bà Rịa-Vũng Tàu', '192 Nam Lỳ Khởi Nghĩa, Phường 3, Vũng Tàu, Tỉnh Bà Rịa-Vũng Tàu', '1900 6484', 1406359777, 1406360626, 0, 0);
INSERT INTO `branch` VALUES (6, 1, 'Bến xe Vũng Tàu', 'ben-xe-vung-tau', 'Bến xe Vũng Tàu', 'ben-xe-vung-tau', 11, '192 Nam Lỳ Khởi Nghĩa, Phường 3, Vũng Tàu, Tỉnh Bà Rịa-Vũng Tàu', '192 Nam Lỳ Khởi Nghĩa, Phường 3, Vũng Tàu, Tỉnh Bà Rịa-Vũng Tàu', '1900 6484', 1406359807, 1406360654, 1, 0);
INSERT INTO `branch` VALUES (7, 1, 'Bến xe Bắc Giang', 'ben-xe-bac-giang', 'Bến xe Bắc Giang', 'ben-xe-bac-giang', 14, 'Số 167A Đường Xương Giang, Phường Ngô Quyền, Bắc Giang, Tỉnh Bắc Giang', 'Số 167A Đường Xương Giang, Phường Ngô Quyền, Bắc Giang, Tỉnh Bắc Giang', '1900 6484', 1406360801, 1406360801, 1, 0);
INSERT INTO `branch` VALUES (8, 1, 'Vp Quy Nhơn', 'vp-quy-nhon', 'Vp Quy Nhơn', 'vp-quy-nhon', 18, '60 Tây Sơn, Qui Nhơn, Tỉnh Bình Định', '60 Tây Sơn, Qui Nhơn, Tỉnh Bình Định', '1900 6484', 1406360831, 1406360831, 1, 0);
INSERT INTO `branch` VALUES (9, 1, 'Vp Bình Thuận', 'vp-binh-thuan', 'Vp Bình Thuận', 'vp-binh-thuan', 5, '18 khu phố 2 Trường Chinh, P. Xuân An, Phan Thiết, Tỉnh Bình Thuận', '18 khu phố 2 Trường Chinh, P. Xuân An, Phan Thiết, Tỉnh Bình Thuận', '1900 6484', 1406360860, 1406360860, 1, 0);

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
  `user_id` int(11) NOT NULL,
  PRIMARY KEY  (`type_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `car_type`
-- 

INSERT INTO `car_type` VALUES (1, 'Giường nằm', 'Giường nằm', 1406441869, 1406441869, 1, 0);
INSERT INTO `car_type` VALUES (2, 'Ghế ngồi', 'Ghế ngồi', 1406441980, 1406441980, 1, 0);

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
  `user_id` int(11) NOT NULL,
  PRIMARY KEY  (`image_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

-- 
-- Dumping data for table `image`
-- 

INSERT INTO `image` VALUES (33, 2, 'upload/2014/07/26/1406356540/Jellyfish.jpg', 1406356544, 1406356544, 1, 0);
INSERT INTO `image` VALUES (2, 1, 'upload/2014/07/23/1406101722/Desert.jpg', 1406101795, 1406342102, 0, 0);
INSERT INTO `image` VALUES (3, 1, 'upload/2014/07/23/1406101722/Hydrangeas.jpg', 1406101795, 1406342105, 0, 0);
INSERT INTO `image` VALUES (4, 1, 'upload/2014/07/23/1406101722/Koala.jpg', 1406101795, 1406342285, 0, 0);
INSERT INTO `image` VALUES (5, 1, 'upload/2014/07/23/1406101722/Tulips.jpg', 1406101795, 1406342282, 0, 0);
INSERT INTO `image` VALUES (6, 1, 'upload/2014/07/26/1406342168/Jellyfish.jpg', 1406342171, 1406342274, 0, 0);
INSERT INTO `image` VALUES (7, 1, 'upload/2014/07/26/1406342168/Koala.jpg', 1406342171, 1406342279, 0, 0);
INSERT INTO `image` VALUES (8, 1, 'upload/2014/07/26/1406342168/Penguins.jpg', 1406342171, 1406342277, 0, 0);
INSERT INTO `image` VALUES (9, 1, 'upload/2014/07/26/1406342168/Jellyfish.jpg', 1406342171, 1406342266, 0, 0);
INSERT INTO `image` VALUES (10, 1, 'upload/2014/07/26/1406342168/Koala.jpg', 1406342171, 1406342272, 0, 0);
INSERT INTO `image` VALUES (11, 1, 'upload/2014/07/26/1406342168/Penguins.jpg', 1406342171, 1406342269, 0, 0);
INSERT INTO `image` VALUES (12, 1, 'upload/2014/07/26/1406342296/Koala.jpg', 1406342299, 1406342338, 0, 0);
INSERT INTO `image` VALUES (13, 1, 'upload/2014/07/26/1406342296/Tulips.jpg', 1406342299, 1406342336, 0, 0);
INSERT INTO `image` VALUES (14, 1, 'upload/2014/07/26/1406342296/Penguins.jpg', 1406342299, 1406342311, 0, 0);
INSERT INTO `image` VALUES (15, 1, 'upload/2014/07/26/1406342296/Koala.jpg', 1406342299, 1406342319, 0, 0);
INSERT INTO `image` VALUES (16, 1, 'upload/2014/07/26/1406342296/Tulips.jpg', 1406342299, 1406342313, 0, 0);
INSERT INTO `image` VALUES (17, 1, 'upload/2014/07/26/1406342296/Penguins.jpg', 1406342299, 1406342317, 0, 0);
INSERT INTO `image` VALUES (18, 1, 'upload/2014/07/26/1406342347/Penguins.jpg', 1406342349, 1406342496, 0, 0);
INSERT INTO `image` VALUES (19, 1, 'upload/2014/07/26/1406342347/Tulips.jpg', 1406342349, 1406342426, 0, 0);
INSERT INTO `image` VALUES (20, 1, 'upload/2014/07/26/1406342347/Lighthouse.jpg', 1406342349, 1406342428, 0, 0);
INSERT INTO `image` VALUES (21, 1, 'upload/2014/07/26/1406342440/Hydrangeas.jpg', 1406342444, 1406342493, 0, 0);
INSERT INTO `image` VALUES (22, 1, 'upload/2014/07/26/1406342440/Koala.jpg', 1406342444, 1406342489, 0, 0);
INSERT INTO `image` VALUES (23, 1, 'upload/2014/07/26/1406342440/Lighthouse.jpg', 1406342444, 1406342491, 0, 0);
INSERT INTO `image` VALUES (24, 1, 'upload/2014/07/26/1406342506/Lighthouse.jpg', 1406342511, 1406342511, 1, 0);
INSERT INTO `image` VALUES (25, 1, 'upload/2014/07/26/1406342506/Tulips.jpg', 1406342511, 1406343684, 0, 0);
INSERT INTO `image` VALUES (26, 1, 'upload/2014/07/26/1406342506/Penguins.jpg', 1406342511, 1406343705, 0, 0);
INSERT INTO `image` VALUES (27, 1, 'upload/2014/07/26/1406343715/Lighthouse.jpg', 1406343721, 1406343727, 0, 0);
INSERT INTO `image` VALUES (28, 1, 'upload/2014/07/26/1406343715/Penguins.jpg', 1406343721, 1406343721, 1, 0);
INSERT INTO `image` VALUES (29, 1, 'upload/2014/07/26/1406343715/Tulips.jpg', 1406343721, 1406343721, 1, 0);
INSERT INTO `image` VALUES (30, 2, 'upload/2014/07/26/1406356423/Chrysanthemum.jpg', 1406356425, 1406356425, 1, 0);
INSERT INTO `image` VALUES (31, 2, 'upload/2014/07/26/1406356423/Desert.jpg', 1406356425, 1406356425, 1, 0);
INSERT INTO `image` VALUES (32, 2, 'upload/2014/07/26/1406356423/Hydrangeas.jpg', 1406356425, 1406356425, 1, 0);
INSERT INTO `image` VALUES (34, 2, 'upload/2014/07/26/1406356540/Lighthouse.jpg', 1406356544, 1406356544, 1, 0);
INSERT INTO `image` VALUES (35, 2, 'upload/2014/07/26/1406356540/Penguins.jpg', 1406356544, 1406356544, 1, 0);
INSERT INTO `image` VALUES (36, 2, 'upload/2014/07/26/1406356678/Koala.jpg', 1406356684, 1406356684, 1, 0);
INSERT INTO `image` VALUES (37, 2, 'upload/2014/07/26/1406356678/Lighthouse.jpg', 1406356684, 1406356684, 1, 0);
INSERT INTO `image` VALUES (38, 2, 'upload/2014/07/26/1406356678/Penguins.jpg', 1406356684, 1406356883, 0, 0);

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
  `user_id` int(11) NOT NULL,
  PRIMARY KEY  (`nhaxe_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

-- 
-- Dumping data for table `nhaxe`
-- 

INSERT INTO `nhaxe` VALUES (1, 'Hoàng Long', 'hoang-long', 'Hoàng Long', 'hoang-long', 'Ngô Quyền, TP. Hải Phòng', 'Ngô Quyền, TP. Hải Phòng', '0917492306', 'Giới thiệu nhà xe Hoàng Long', 'Giới thiệu nhà xe Hoàng Long', 'upload/images/nha-xe/hoanlong.jpg', 1406092248, 1407282754, 1, 1, 1);
INSERT INTO `nhaxe` VALUES (2, 'Phương Trang', 'phuong-trang', 'Phuong Trang', 'phuong-trang', '123 Pham Ngu Lao', '123 Pham Ngu Lao', '091857453256', 'safdsg dfsg d h d', 'safgsghjgj j j fjf', 'upload/images/nha-xe/Koala.jpg', 1406356401, 1406363369, 1, 1, 0);
INSERT INTO `nhaxe` VALUES (7, 'Mai Linh', 'mai-linh', 'Mai Linh', 'mai-linh', '123 abc', '123 abc', '0917492306', 'adsfadsf', 'sdfasdf', 'upload/images/nha-xe/Lighthouse.jpg', 1406565130, 1406565130, 1, 1, 0);
INSERT INTO `nhaxe` VALUES (8, 'Vietbus', 'vietbus', 'Vietbus', 'vietbus', 'Vietbus', 'Vietbus', '0986388413', 'Vietbus', 'Vietbus', 'upload/images/nha-xe/Desert.jpg', 1406565185, 1406565185, 1, 1, 0);
INSERT INTO `nhaxe` VALUES (9, 'Sao Việt', 'sao-viet', 'Sao Việt', 'sao-viet', 'Sao Việt', 'Sao Việt', '08768743342', 'Sao Việt', 'Sao Việt', 'upload/images/Hydrangeas.jpg', 1406565224, 1406565224, 1, 1, 0);
INSERT INTO `nhaxe` VALUES (10, 'Phương Nam', 'phuong-nam', 'Phương Nam', 'phuong-nam', 'Phương Nam', 'Phương Nam', '0876874342', 'Phương Nam', 'Phương Nam', '', 1406565293, 1406565293, 1, 1, 0);
INSERT INTO `nhaxe` VALUES (11, 'Danatransco', 'danatransco', 'Danatransco', 'danatransco', 'Danatransco', 'Danatransco', '09832134551', 'Danatransco', 'Danatransco', '', 1406565317, 1406565317, 1, 1, 0);
INSERT INTO `nhaxe` VALUES (12, 'Livitrans', 'livitrans', 'Livitrans', 'livitrans', 'Livitrans', 'Livitrans', '0917492306', 'Livitrans', 'Livitrans', '', 1406565345, 1406565345, 0, 1, 0);
INSERT INTO `nhaxe` VALUES (13, 'Minh Tâm', 'minh-tam', 'Minh Tâm', 'minh-tam', 'Minh Tâm', 'Minh Tâm', '0685684562', 'Minh Tâm', 'Minh Tâm', '', 1406565376, 1406565376, 0, 1, 0);
INSERT INTO `nhaxe` VALUES (14, 'Kumo', 'kumo', 'Kumo', 'kumo', 'Kumo', 'Kumo', '0753523535', 'Kumo', 'Kumo', '', 1406565393, 1406565393, 0, 1, 0);
INSERT INTO `nhaxe` VALUES (15, 'KaLong', 'kalong', 'KaLong', 'kalong', 'KaLong', 'KaLong', '0123144354', 'KaLong', 'KaLong', '', 1406565417, 1406565417, 0, 1, 0);
INSERT INTO `nhaxe` VALUES (16, 'Superdong', 'superdong', 'Superdong', 'superdong', 'Superdong', 'Superdong', '0876874342', 'Superdong', 'Superdong', '', 1406565441, 1406565441, 0, 1, 0);
INSERT INTO `nhaxe` VALUES (17, '', '', '', '', '', '', '', '', '', '', 1406962419, 1406962621, 0, 0, 0);
INSERT INTO `nhaxe` VALUES (18, 'văn quân', 'van-quan', 'van quan', 'van-quan', '33 duogn 44', '33 duong 44', '1234556678', 'tốt', 'tot', '', 1407212848, 1407212848, 0, 1, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `place`
-- 

CREATE TABLE `place` (
  `place_id` int(11) NOT NULL auto_increment,
  `nhaxe_id` int(11) NOT NULL,
  `place_name_vi` varchar(255) NOT NULL,
  `place_name_safe_vi` varchar(255) NOT NULL,
  `place_name_en` varchar(255) NOT NULL,
  `place_name_safe_en` varchar(255) NOT NULL,
  `address_vi` varchar(255) NOT NULL,
  `address_en` varchar(255) NOT NULL,
  `creation_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY  (`place_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

-- 
-- Dumping data for table `place`
-- 

INSERT INTO `place` VALUES (1, 0, 'Bến xe Tây Ninh', 'ben-xe-tay-ninh', 'Tay Ninh', 'tay-ninh', '', '', 1406043966, 1406086214, 0, 0);
INSERT INTO `place` VALUES (2, 0, 'Hồ Chí Minh', 'ho-chi-minh', 'Ho Chi Minh', 'ho-chi-minh', '', '', 1406043982, 1406074005, 0, 0);
INSERT INTO `place` VALUES (3, 0, 'Hà Nội', 'ha-noi', 'Ha Noi', 'ha-noi', '', '', 1406043993, 1406073583, 0, 0);
INSERT INTO `place` VALUES (4, 0, 'Test', 'test', 'Test', 'test', '', '', 1406074473, 1406076724, 0, 0);
INSERT INTO `place` VALUES (5, 0, 'aaa', 'aaa', '', '', '', '', 1406075066, 1406076695, 0, 0);
INSERT INTO `place` VALUES (6, 0, 'asdasd', 'asdasd', '', '', '', '', 1406075136, 1406076693, 0, 0);
INSERT INTO `place` VALUES (7, 0, 'asdad', 'asdad', '', '', '', '', 1406075180, 1406076627, 0, 0);
INSERT INTO `place` VALUES (8, 0, 'asd', 'asd', '', '', '', '', 1406075358, 1406076623, 0, 0);
INSERT INTO `place` VALUES (9, 0, 'asdasdf', 'asdasdf', '', '', '', '', 1406075365, 1406076592, 0, 0);
INSERT INTO `place` VALUES (10, 0, 'asdasd', 'asdasd', 'asdasd', 'asdasd', '', '', 1406075430, 1406076360, 0, 0);
INSERT INTO `place` VALUES (11, 0, '', '', '', '', '', '', 1406076717, 1406076720, 0, 0);
INSERT INTO `place` VALUES (12, 2, 'Bến xe Miền Đông', 'ben-xe-mien-dong', 'Mien Dong', 'mien-dong', '292 Đinh Bộ Lĩnh, Phường 26 - Bình Thạnh - Hồ Chí Minh', '292 Đinh Bộ Lĩnh, Phường 26 - Bình Thạnh - Hồ Chí Minh', 1406076736, 1407253698, 1, 0);
INSERT INTO `place` VALUES (13, 0, 'Bến xe Thành Bưởi', 'ben-xe-thanh-buoi', 'Thanh Buoi', 'thanh-buoi', '', '', 1406076759, 1406087135, 0, 0);
INSERT INTO `place` VALUES (14, 9, 'Nha Trang', 'nha-trang', 'Nha Trang', 'nha-trang', 'Nha Trang - Khánh Hòa', 'Nha Trang - Khánh Hòa', 1406076779, 1406434507, 1, 0);
INSERT INTO `place` VALUES (15, 0, 'Bến xe Phan Thiết', 'ben-xe-phan-thiet', 'Phan Thiet', 'phan-thiet', '', '', 1406076789, 1406087340, 0, 0);
INSERT INTO `place` VALUES (16, 0, 'Bến xe Thái Bình', 'ben-xe-thai-binh', 'Thai Binh', 'thai-binh', '', '', 1406076799, 1406087343, 0, 0);
INSERT INTO `place` VALUES (17, 0, 'Huế', 'hue', 'Hue', 'hue', '', '', 1406076850, 1406082260, 0, 0);
INSERT INTO `place` VALUES (18, 0, 'Hải Phòng', 'hai-phong', 'Hai Phong', 'hai-phong', '', '', 1406076859, 1406082257, 0, 0);
INSERT INTO `place` VALUES (19, 0, 'Đà Nẵng', 'da-nang', 'Da Nang', 'da-nang', '', '', 1406076869, 1406082254, 0, 0);
INSERT INTO `place` VALUES (20, 0, 'Bến xe Long An', 'ben-xe-long-an', 'Long An', 'long-an', '', '', 1406076898, 1406087347, 0, 0);
INSERT INTO `place` VALUES (21, 0, 'Lạng Sơn', 'lang-son', 'Lang Son', 'lang-son', '', '', 1406076918, 1406084718, 0, 0);
INSERT INTO `place` VALUES (22, 0, '', '', '', '', '', '', 1406079731, 1406083472, 0, 0);
INSERT INTO `place` VALUES (23, 0, '', '', '', '', '', '', 1406079767, 1406083468, 0, 0);
INSERT INTO `place` VALUES (24, 0, '', '', '', '', '', '', 1406079829, 1406083544, 0, 0);
INSERT INTO `place` VALUES (25, 0, '', '', '', '', '', '', 1406079858, 1406083541, 0, 0);
INSERT INTO `place` VALUES (26, 14, 'Bến xe Lương Yên', 'ben-xe-luong-yen', 'Luong Yen', 'luong-yen', '3 Nguyễn Khoái, Bạch Đằng - Hai Bà Trưng - Hà Nội', '3 Nguyễn Khoái, Bạch Đằng - Hai Bà Trưng - Hà Nội', 1406084714, 1406434515, 1, 0);
INSERT INTO `place` VALUES (27, 1, 'Khu phố Tây', 'khu-pho-tay', 'Khu pho Tay', 'khu-pho-tay', 'Phạm Ngũ Lão - Quận 1 - Hồ Chí Minh', 'Phạm Ngũ Lão - Quận 1 - Hồ Chí Minh', 1406085816, 1406434533, 1, 0);
INSERT INTO `place` VALUES (28, 2, 'Văn phòng Cần Thơ', 'van-phong-can-tho', 'Van Phong Can Tho', 'van-phong-can-tho', 'Quốc lộ 91B, P.Hưng Lợi - Ninh Kiều - Cần Thơ', 'Quốc lộ 91B, P.Hưng Lợi - Ninh Kiều - Cần Thơ', 1406087194, 1406433556, 1, 0);
INSERT INTO `place` VALUES (29, 8, 'Bến xe 91B Cần Thơ', 'ben-xe-91b-can-tho', 'Ben xe 91B Can Tho', 'ben-xe-91b-can-tho', 'Lộ 91B, Nguyễn Văn Linh, Phường Hưng Lợi - Ninh Kiều - Cần Thơ', 'Lộ 91B, Nguyễn Văn Linh, Phường Hưng Lợi - Ninh Kiều - Cần Thơ', 1406087285, 1407253717, 1, 0);
INSERT INTO `place` VALUES (30, 13, 'Mũi Né', 'mui-ne', 'Mui Ne', 'mui-ne', '20 Huỳnh Thúc Kháng, P. Hàm Tiến - Phan Thiết - Bình Thuận', '20 Huỳnh Thúc Kháng, P. Hàm Tiến - Phan Thiết - Bình Thuận', 1406087332, 1406434814, 1, 0);
INSERT INTO `place` VALUES (31, 14, 'Bến xe Mỹ Đình', 'ben-xe-my-dinh', 'Ben xe My Dinh', 'ben-xe-my-dinh', '20 Phạm Hùng, Mỹ Đình - Từ Liêm - Hà Nội', '20 Phạm Hùng, Mỹ Đình - Từ Liêm - Hà Nội', 1406087381, 1406434823, 1, 0);
INSERT INTO `place` VALUES (32, 14, 'Bến xe Giáp Bát', 'ben-xe-giap-bat', 'Bến xe Giáp Bát', 'ben-xe-giap-bat', 'Km6 đường Giải phóng - Hoàng Mai - Hà Nội', 'Km6 đường Giải phóng - Hoàng Mai - Hà Nội', 1406087506, 1406434831, 1, 0);
INSERT INTO `place` VALUES (33, 20, 'Bến xe Quỳnh Côi', 'ben-xe-quynh-coi', 'Bến xe Quỳnh Côi', 'ben-xe-quynh-coi', 'Thị trấn Quỳnh Côi - Quỳnh Phụ - Thái Bình', 'Thị trấn Quỳnh Côi - Quỳnh Phụ - Thái Bình', 1406087555, 1407253664, 0, 0);
INSERT INTO `place` VALUES (34, 0, 'Cửa Ông', 'cua-ong', 'Cửa Ông', 'cua-ong', 'Phường Cửa Ông - Cẩm Phả - Quảng Ninh', 'Phường Cửa Ông - Cẩm Phả - Quảng Ninh', 1406087609, 1406566351, 0, 0);
INSERT INTO `place` VALUES (35, 0, '', '', '', '', '', '', 1406435084, 1406566349, 0, 0);
INSERT INTO `place` VALUES (36, 0, '', '', '', '', '', '', 1406446266, 1406566347, 0, 0);
INSERT INTO `place` VALUES (37, 9, 'Bưu Điện Cam Ranh', 'buu-dien-cam-ranh', 'Bưu Điện Cam Ranh', 'buu-dien-cam-ranh', '01 Nguyễn Trọng Kỷ, P.Cam Lợi - Cam Ranh - Khánh Hòa', '01 Nguyễn Trọng Kỷ, P.Cam Lợi - Cam Ranh - Khánh Hòa', 1406566193, 1406566193, 1, 0);
INSERT INTO `place` VALUES (38, 13, 'Mũi Né', 'mui-ne', 'Mũi Né', 'mui-ne', '20 Huỳnh Thúc Kháng, P. Hàm Tiến - Phan Thiết - Bình Thuận', '20 Huỳnh Thúc Kháng, P. Hàm Tiến - Phan Thiết - Bình Thuận', 1406566256, 1406566288, 0, 0);
INSERT INTO `place` VALUES (39, 13, 'Văn phòng Bình Thuận', 'van-phong-binh-thuan', 'Văn phòng Bình Thuận', 'van-phong-binh-thuan', '18 khu phố 2 Trường Chinh, P. Xuân An - Phan Thiết - Bình Thuận', '18 khu phố 2 Trường Chinh, P. Xuân An - Phan Thiết - Bình Thuận', 1406566334, 1406566334, 1, 0);
INSERT INTO `place` VALUES (40, 1, 'bến xe miềm bắc', 'ben-xe-miem-bac', 'ben xe mien bac', 'ben-xe-mien-bac', '345 dsfhsufsdn', '345 enguyeun', 1407221838, 1407221838, 1, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `route`
-- 

CREATE TABLE `route` (
  `route_id` int(11) NOT NULL auto_increment,
  `route_name_vi` varchar(255) NOT NULL,
  `route_name_safe_vi` varchar(255) NOT NULL,
  `route_name_en` varchar(255) NOT NULL,
  `route_name_safe_en` varchar(255) NOT NULL,
  `hot` tinyint(1) NOT NULL,
  `description` varchar(255) NOT NULL,
  `tinh_id_start` int(11) NOT NULL,
  `tinh_id_end` int(11) NOT NULL,
  `distance` varchar(100) default NULL,
  `duration` varchar(100) default NULL,
  `creation_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY  (`route_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

-- 
-- Dumping data for table `route`
-- 

INSERT INTO `route` VALUES (1, 'Sài Gòn - Hà Nội', 'sai-gon-ha-noi', 'Sai Gon - Ha Noi', 'sai-gon-ha-noi', 0, 'Tuyến xe từ Sài Gòn đi Hà Nội.', 12, 26, '0', '', 1406084756, 1406341967, 0, 0);
INSERT INTO `route` VALUES (3, 'Sài Gòn - Khánh Hòa', 'sai-gon-khanh-hoa', 'Sai Gon - Nha Trang', 'sai-gon-nha-trang', 1, 'Chuyến xe từ Sài gòn đi Khánh Hòa\r\n', 1, 9, '1000', '6 gio', 1406085862, 1407255507, 1, 0);
INSERT INTO `route` VALUES (4, 'Sài Gòn - Phan Thiết, Bình Thuận', 'sai-gon-phan-thiet-binh-thuan', 'Sài Gòn - Phan Thiết, Bình Thuận', 'sai-gon-phan-thiet-binh-thuan', 0, 'Chuyến xe SG đi Phan Thiết\r\n', 1, 13, '0', '', 1406087441, 1406567220, 1, 0);
INSERT INTO `route` VALUES (5, 'Hà Nội - Thái Bình', 'ha-noi-thai-binh', 'Hà Nội - Thái Bình', 'ha-noi-thai-binh', 0, 'Hà Nội đi Thái Bình', 32, 33, '0', '', 1406087578, 1406102278, 0, 0);
INSERT INTO `route` VALUES (6, 'Hà Nội - Quảng Ninh', 'ha-noi-quang-ninh', 'Hà Nội - Quảng Ninh', 'ha-noi-quang-ninh', 0, 'Hà Nội đi Quảng Ninh', 16, 16, '0', '', 1406087650, 1406567242, 1, 0);
INSERT INTO `route` VALUES (7, 'Sài Gòn - Hà Nội', 'sai-gon-ha-noi', 'Sài Gòn - Hà Nội', 'sai-gon-ha-noi', 1, 'SG di HN', 1, 14, '0', '', 1406567574, 1406617742, 1, 0);
INSERT INTO `route` VALUES (8, 'Sài Gòn - Cần Thơ', 'sai-gon-can-tho', 'Sài Gòn - Cần Thơ', 'sai-gon-can-tho', 1, 'Sài Gòn - Cần Thơ', 1, 2, '0', '', 1406567609, 1406567609, 1, 0);
INSERT INTO `route` VALUES (9, 'Sài Gòn - Đà Lạt', 'sai-gon-da-lat', 'Sài Gòn - Đà Lạt', 'sai-gon-da-lat', 1, 'Sài Gòn - Đà Lạt', 1, 11, '0', '', 1406567671, 1406567671, 1, 0);
INSERT INTO `route` VALUES (10, 'Hà Nội - Đà Nẵng', 'ha-noi-da-nang', 'Hà Nội - Đà Nẵng', 'ha-noi-da-nang', 1, 'Hà Nội - Đà Nẵng', 14, 7, '0', '', 1406567702, 1406567702, 1, 0);
INSERT INTO `route` VALUES (11, 'Sài Gòn - Đà Nẵng', 'sai-gon-da-nang', 'Sài Gòn - Đà Nẵng', 'sai-gon-da-nang', 1, 'Sài Gòn - Đà Nẵng', 1, 7, '0', '', 1406567744, 1406567744, 1, 0);
INSERT INTO `route` VALUES (12, 'Huế - Hà Nội', 'hue-ha-noi', 'Huế - Hà Nội', 'hue-ha-noi', 0, 'Huế - Hà Nội', 10, 14, '0', '', 1406567865, 1406567865, 1, 0);
INSERT INTO `route` VALUES (13, 'sai gòn - nha trang', 'sai-gon-nha-trang', 'sai gon - nha trang', 'sai-gon-nha-trang', 1, 'quân\r\n', 1, 9, '0', '', 1407212334, 1407212334, 1, 0);

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
  `user_id` int(11) NOT NULL,
  PRIMARY KEY  (`service_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `services`
-- 

INSERT INTO `services` VALUES (1, 'Nước uống', 'nuoc-uong', 'Drinking water', 'drinking-water', NULL, 1406080116, 1406080159, 1, 0);
INSERT INTO `services` VALUES (2, 'Wifi', 'wifi', 'Wifi', 'wifi', NULL, 1406080167, 1406080167, 1, 0);
INSERT INTO `services` VALUES (3, 'Khăn lạnh', 'khan-lanh', 'Cold towels', 'cold-towels', NULL, 1406080198, 1406080198, 1, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `service_ticket`
-- 

CREATE TABLE `service_ticket` (
  `ticket_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  PRIMARY KEY  (`ticket_id`,`service_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `service_ticket`
-- 

INSERT INTO `service_ticket` VALUES (1, 1);
INSERT INTO `service_ticket` VALUES (1, 2);
INSERT INTO `service_ticket` VALUES (2, 1);
INSERT INTO `service_ticket` VALUES (2, 2);
INSERT INTO `service_ticket` VALUES (3, 1);
INSERT INTO `service_ticket` VALUES (3, 2);
INSERT INTO `service_ticket` VALUES (3, 3);
INSERT INTO `service_ticket` VALUES (5, 1);
INSERT INTO `service_ticket` VALUES (5, 2);
INSERT INTO `service_ticket` VALUES (5, 3);
INSERT INTO `service_ticket` VALUES (22, 1);
INSERT INTO `service_ticket` VALUES (22, 2);
INSERT INTO `service_ticket` VALUES (22, 3);
INSERT INTO `service_ticket` VALUES (23, 1);
INSERT INTO `service_ticket` VALUES (23, 2);
INSERT INTO `service_ticket` VALUES (23, 3);
INSERT INTO `service_ticket` VALUES (24, 1);
INSERT INTO `service_ticket` VALUES (24, 2);
INSERT INTO `service_ticket` VALUES (24, 3);
INSERT INTO `service_ticket` VALUES (25, 1);
INSERT INTO `service_ticket` VALUES (25, 2);
INSERT INTO `service_ticket` VALUES (25, 3);

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
  `creation_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY  (`ticket_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

-- 
-- Dumping data for table `ticket`
-- 

INSERT INTO `ticket` VALUES (1, 1, 1, 14, 27, 31, 800000, 1, '8 gio 30 phut', 14, 1, 3, '', 1406739600, 1406459045, 1406459045, 1, 0);
INSERT INTO `ticket` VALUES (2, 2, 1, 14, 12, 26, 800000, 1, '8 gio 30 phut', 14, 1, 3, '', 1406739600, 1406459835, 1406459835, 1, 0);
INSERT INTO `ticket` VALUES (3, 7, 1, 14, 12, 26, 750000, 1, '8 gio 30 phut', 14, 1, 3, '', 1406739600, 1406460978, 1406460978, 1, 0);
INSERT INTO `ticket` VALUES (4, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '', 0, 1406556196, 1406559340, 0, 0);
INSERT INTO `ticket` VALUES (5, 10, 1, 14, 27, 32, 800000, 1, '8 gio 30 phut', 14, 2, 3, '', 1406739600, 1406564167, 1406564167, 1, 0);
INSERT INTO `ticket` VALUES (6, 9, 1, 14, 12, 31, 455000, 1, '8 gio 30 phut', 23, 1, 3, '', 1406739600, 1406565829, 1406565829, 1, 0);
INSERT INTO `ticket` VALUES (7, 1, 1, 2, 12, 28, 455000, 1, '2 gio', 1, 2, 2, '', 1406739600, 1406620066, 1406620066, 1, 0);
INSERT INTO `ticket` VALUES (8, 1, 1, 9, 12, 14, 250000, 1, '2', 8, 1, 2, '', 1406739600, 1406620093, 1406620093, 1, 0);
INSERT INTO `ticket` VALUES (9, 0, 0, 0, 0, 0, 0, 1, '', 0, 0, 0, '', 0, 1406620180, 1406621831, 0, 0);
INSERT INTO `ticket` VALUES (10, 1, 1, 9, 12, 37, 120000, 1, '7', 1, 1, 1, '', 1406826000, 1406622279, 1406622279, 1, 0);
INSERT INTO `ticket` VALUES (11, 2, 1, 9, 12, 14, 235000, 1, '7:30', 0, 1, 0, '', 1406912400, 1406622484, 1406622484, 1, 0);
INSERT INTO `ticket` VALUES (12, 2, 1, 9, 12, 37, 220000, 1, '6', 0, 1, 2, '', 1406912400, 1406622644, 1406622644, 1, 0);
INSERT INTO `ticket` VALUES (13, 2, 1, 3, 0, 0, 500000, 1, '', 4, 0, 0, '', 1407258000, 1407210748, 1407259944, 0, 0);
INSERT INTO `ticket` VALUES (14, 0, 1, 0, 0, 0, 0, 0, '', 0, 1, 0, '', 0, 1407213859, 1407259929, 0, 0);
INSERT INTO `ticket` VALUES (15, 1, 8, 3, 40, 27, 31, 0, '1111', 111, 1, 2, '', 1407254400, 1407259893, 1407259893, 1, 0);
INSERT INTO `ticket` VALUES (16, 1, 8, 3, 40, 27, 31, 0, '1111', 111, 1, 2, '', 1407340800, 1407259893, 1407259893, 1, 0);
INSERT INTO `ticket` VALUES (17, 1, 8, 3, 40, 27, 31, 0, '1111', 111, 1, 2, '', 1407427200, 1407259893, 1407259893, 1, 0);
INSERT INTO `ticket` VALUES (18, 1, 8, 3, 40, 27, 31, 0, '1111', 111, 1, 2, '', 1407513600, 1407259893, 1407259893, 1, 0);
INSERT INTO `ticket` VALUES (19, 1, 8, 3, 40, 27, 31, 0, '1111', 111, 1, 2, '', 1407600000, 1407259983, 1407259983, 1, 0);
INSERT INTO `ticket` VALUES (20, 1, 8, 3, 40, 27, 31, 0, '1111', 111, 1, 2, '', 1407686400, 1407259983, 1407259983, 1, 0);
INSERT INTO `ticket` VALUES (21, 1, 8, 3, 40, 27, 31, 0, '1111', 111, 1, 2, '', 1407772800, 1407259983, 1407259983, 1, 0);
INSERT INTO `ticket` VALUES (22, 2, 1, 16, 12, 28, 31, 0, '1111', 111, 1, 2, '', 1407859200, 1407260129, 1407260129, 1, 0);
INSERT INTO `ticket` VALUES (23, 2, 1, 16, 12, 28, 31, 0, '1111', 111, 1, 2, '', 1407945600, 1407260129, 1407260129, 1, 0);
INSERT INTO `ticket` VALUES (24, 2, 1, 16, 12, 28, 31, 0, '1111', 111, 1, 2, '', 1409328000, 1407260129, 1407260129, 1, 0);
INSERT INTO `ticket` VALUES (25, 2, 1, 16, 12, 28, 31111111, 0, '1111', 111, 1, 2, '', 1408118400, 1407261356, 1407261356, 1, 1);

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
-- Table structure for table `time_ticket`
-- 

CREATE TABLE `time_ticket` (
  `ticket_id` int(11) NOT NULL,
  `time_id` int(11) NOT NULL,
  PRIMARY KEY  (`ticket_id`,`time_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `time_ticket`
-- 

INSERT INTO `time_ticket` VALUES (1, 1);
INSERT INTO `time_ticket` VALUES (1, 2);
INSERT INTO `time_ticket` VALUES (1, 3);
INSERT INTO `time_ticket` VALUES (1, 5);
INSERT INTO `time_ticket` VALUES (1, 6);
INSERT INTO `time_ticket` VALUES (2, 1);
INSERT INTO `time_ticket` VALUES (2, 2);
INSERT INTO `time_ticket` VALUES (2, 3);
INSERT INTO `time_ticket` VALUES (2, 4);
INSERT INTO `time_ticket` VALUES (2, 5);
INSERT INTO `time_ticket` VALUES (2, 6);
INSERT INTO `time_ticket` VALUES (3, 1);
INSERT INTO `time_ticket` VALUES (3, 2);
INSERT INTO `time_ticket` VALUES (3, 3);
INSERT INTO `time_ticket` VALUES (3, 4);
INSERT INTO `time_ticket` VALUES (3, 5);
INSERT INTO `time_ticket` VALUES (3, 6);
INSERT INTO `time_ticket` VALUES (5, 1);
INSERT INTO `time_ticket` VALUES (5, 2);
INSERT INTO `time_ticket` VALUES (6, 1);
INSERT INTO `time_ticket` VALUES (6, 2);
INSERT INTO `time_ticket` VALUES (6, 3);
INSERT INTO `time_ticket` VALUES (6, 4);
INSERT INTO `time_ticket` VALUES (6, 5);
INSERT INTO `time_ticket` VALUES (6, 6);
INSERT INTO `time_ticket` VALUES (7, 1);
INSERT INTO `time_ticket` VALUES (7, 2);
INSERT INTO `time_ticket` VALUES (8, 1);
INSERT INTO `time_ticket` VALUES (10, 1);
INSERT INTO `time_ticket` VALUES (10, 2);
INSERT INTO `time_ticket` VALUES (10, 3);
INSERT INTO `time_ticket` VALUES (11, 1);
INSERT INTO `time_ticket` VALUES (11, 2);
INSERT INTO `time_ticket` VALUES (11, 3);
INSERT INTO `time_ticket` VALUES (11, 5);
INSERT INTO `time_ticket` VALUES (11, 6);
INSERT INTO `time_ticket` VALUES (12, 1);
INSERT INTO `time_ticket` VALUES (12, 2);
INSERT INTO `time_ticket` VALUES (12, 3);
INSERT INTO `time_ticket` VALUES (12, 4);
INSERT INTO `time_ticket` VALUES (12, 5);
INSERT INTO `time_ticket` VALUES (12, 6);
INSERT INTO `time_ticket` VALUES (15, 1);
INSERT INTO `time_ticket` VALUES (15, 2);
INSERT INTO `time_ticket` VALUES (15, 3);
INSERT INTO `time_ticket` VALUES (15, 4);
INSERT INTO `time_ticket` VALUES (15, 5);
INSERT INTO `time_ticket` VALUES (15, 6);
INSERT INTO `time_ticket` VALUES (16, 1);
INSERT INTO `time_ticket` VALUES (16, 2);
INSERT INTO `time_ticket` VALUES (16, 3);
INSERT INTO `time_ticket` VALUES (16, 4);
INSERT INTO `time_ticket` VALUES (16, 5);
INSERT INTO `time_ticket` VALUES (16, 6);
INSERT INTO `time_ticket` VALUES (17, 1);
INSERT INTO `time_ticket` VALUES (17, 2);
INSERT INTO `time_ticket` VALUES (17, 3);
INSERT INTO `time_ticket` VALUES (17, 4);
INSERT INTO `time_ticket` VALUES (17, 5);
INSERT INTO `time_ticket` VALUES (17, 6);
INSERT INTO `time_ticket` VALUES (18, 1);
INSERT INTO `time_ticket` VALUES (18, 2);
INSERT INTO `time_ticket` VALUES (18, 3);
INSERT INTO `time_ticket` VALUES (18, 4);
INSERT INTO `time_ticket` VALUES (18, 5);
INSERT INTO `time_ticket` VALUES (18, 6);
INSERT INTO `time_ticket` VALUES (19, 1);
INSERT INTO `time_ticket` VALUES (19, 2);
INSERT INTO `time_ticket` VALUES (19, 3);
INSERT INTO `time_ticket` VALUES (19, 4);
INSERT INTO `time_ticket` VALUES (19, 5);
INSERT INTO `time_ticket` VALUES (19, 6);
INSERT INTO `time_ticket` VALUES (20, 1);
INSERT INTO `time_ticket` VALUES (20, 2);
INSERT INTO `time_ticket` VALUES (20, 3);
INSERT INTO `time_ticket` VALUES (20, 4);
INSERT INTO `time_ticket` VALUES (20, 5);
INSERT INTO `time_ticket` VALUES (20, 6);
INSERT INTO `time_ticket` VALUES (21, 1);
INSERT INTO `time_ticket` VALUES (21, 2);
INSERT INTO `time_ticket` VALUES (21, 3);
INSERT INTO `time_ticket` VALUES (21, 4);
INSERT INTO `time_ticket` VALUES (21, 5);
INSERT INTO `time_ticket` VALUES (21, 6);
INSERT INTO `time_ticket` VALUES (22, 1);
INSERT INTO `time_ticket` VALUES (22, 2);
INSERT INTO `time_ticket` VALUES (22, 3);
INSERT INTO `time_ticket` VALUES (22, 4);
INSERT INTO `time_ticket` VALUES (22, 5);
INSERT INTO `time_ticket` VALUES (22, 6);
INSERT INTO `time_ticket` VALUES (23, 1);
INSERT INTO `time_ticket` VALUES (23, 2);
INSERT INTO `time_ticket` VALUES (23, 3);
INSERT INTO `time_ticket` VALUES (23, 4);
INSERT INTO `time_ticket` VALUES (23, 5);
INSERT INTO `time_ticket` VALUES (23, 6);
INSERT INTO `time_ticket` VALUES (24, 1);
INSERT INTO `time_ticket` VALUES (24, 2);
INSERT INTO `time_ticket` VALUES (24, 3);
INSERT INTO `time_ticket` VALUES (24, 4);
INSERT INTO `time_ticket` VALUES (24, 5);
INSERT INTO `time_ticket` VALUES (24, 6);
INSERT INTO `time_ticket` VALUES (25, 1);
INSERT INTO `time_ticket` VALUES (25, 2);
INSERT INTO `time_ticket` VALUES (25, 3);
INSERT INTO `time_ticket` VALUES (25, 4);
INSERT INTO `time_ticket` VALUES (25, 5);
INSERT INTO `time_ticket` VALUES (25, 6);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

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
INSERT INTO `tinh` VALUES (21, 'sài gòn', 'sai-gon', 'sai gon', 'sai-gon', 1, 0, '', '', 1, 1407221781, 1407221781, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL auto_increment,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `group_id` tinyint(4) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `creation_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

-- 
-- Dumping data for table `users`
-- 

INSERT INTO `users` VALUES (1, 'admin@onbus.vn', 'd6202b4ffd43a1dfdf9b3215c4d66e7e', 1, 'Admin', 1406725726, 1406728008, 1);
INSERT INTO `users` VALUES (10, 'dienth@onbus.vn', '8c13b5750412d922b01b2da95d24f8b6', 2, 'Hoàng Điển', 1406725726, 1406725792, 1);
INSERT INTO `users` VALUES (11, 'hoangnh@onbus.vn', '851eec1df720cab32b54a2241942d6ad', 2, 'Huy Hoàng', 1406725899, 1406725899, 1);
