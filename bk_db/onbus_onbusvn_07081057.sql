-- phpMyAdmin SQL Dump
-- version 4.2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 07, 2014 at 10:57 AM
-- Server version: 5.5.31
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `onbus_onbusvn`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
`article_id` int(11) NOT NULL,
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
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_id`, `title`, `title_safe`, `image_url`, `description`, `content`, `category_id`, `hot`, `lang_id`, `creation_time`, `update_time`, `status`, `user_id`) VALUES
(1, 'Kinh nghiệm đi xe không say', 'kinh-nghiem-di-xe-khong-say', 'upload/images/tin-tuc/Untitled-1.jpg', 'Onbus.vn xin chia sẻ cách đi xe không say, đây là kinh nghiệm đi xe để không bị say xe. Hãy đọc kỹ hoặc in cũng như chia sẻ cho bạn bè để cùng có kinh nghiệm đi xe KINH NGHIỆM ĐI XE KHÔNG SAY Đối với những người say xe, đi du lịch bằng xe là nỗi ám ảnh đối với nhiều du khách.', 'Onbus.vn xin chia sẻ c&aacute;ch đi xe kh&ocirc;ng say, đ&acirc;y l&agrave; kinh nghiệm đi xe để kh&ocirc;ng bị say xe. H&atilde;y đọc kỹ hoặc in cũng như chia sẻ cho bạn b&egrave; để c&ugrave;ng c&oacute; kinh nghiệm đi xe KINH NGHIỆM ĐI XE KH&Ocirc;NG SAY Đối với những người say xe, đi du lịch bằng xe l&agrave; nỗi &aacute;m ảnh đối với nhiều du kh&aacute;ch. C&oacute; người, muốn đi du lịch nhưng bị say xe lại kh&ocirc;ng d&aacute;m đi, cũng c&oacute; người đi đến du lịch th&igrave; kh&ocirc;ng c&ograve;n t&acirc;m tr&iacute; m&agrave; đi tham quan hay nghỉ dưỡng, kh&aacute;m ph&aacute; cũng v&igrave; say xe. Để gi&uacute;p nhiều du kh&aacute;ch bị say xe c&oacute; một chuyến đi vui vẻ nhất v&agrave;o m&ugrave;a du lịch, atour.com.vn xin chia sẻ một v&agrave;i kinh nghiệm để tr&aacute;nh bị say xe. Mỗi một c&aacute;ch lại ph&ugrave; hợp với những người kh&aacute;c nhau, tuy nhi&ecirc;n, qua thực tế v&agrave; kiểm nghiệm ch&uacute;ng t&ocirc;i thấy những điều sau kh&aacute; đ&uacute;ng v&agrave; hữu &iacute;ch, c&oacute; t&aacute;c dụng với nhiều người.<br />\r\n<div style="text-align: center;">\r\n	<img alt="" src="../upload/images/tin-tuc/Untitled-1.jpg" style="width: 303px; height: 200px;" /></div>\r\n<br />\r\nTại sao, qu&yacute; kh&aacute;ch kh&ocirc;ng thử để tr&aacute;nh được cảm gi&aacute;c say xe qua mỗi chuyến đi. Lựa chọn vị tr&iacute; tr&ecirc;n xe Một sai lầm của nhiều du kh&aacute;ch khi đi xe ngay cả với xe 45 chỗ l&agrave; ngồi ghế đầu. Thực ra n&oacute; chỉ đ&uacute;ng khi qu&yacute; kh&aacute;ch ngồi xe con. Đối với c&aacute;c loại xe từ 30 chỗ trở l&ecirc;n người say xe kh&ocirc;ng n&ecirc;n ngồi ghế đầu. C&oacute; thể nhiều du kh&aacute;ch kh&ocirc;ng để &yacute;, ghế đầu ti&ecirc;n của xe 45 chỗ l&agrave; đ&uacute;ng vị tr&iacute; của b&aacute;nh xe trước. Khi xe v&agrave;o đoạn cua, đặc biệt l&agrave; đường đ&egrave;o, người ngồi đầu sẽ c&oacute; cảm gi&aacute;c như m&igrave;nh đang bị quay v&ograve;ng tr&ograve;n g&acirc;y ch&oacute;ng mặt. Nếu bị cua đi cua lại nhiều lần chắc chắn du kh&aacute;ch sẽ bị say. Chỗ tuyệt vời nhất đồi với người say xe l&agrave; ở giữa xe, vị tr&iacute; của giữ b&aacute;ng trước v&agrave; b&aacute;nh sau. Khi xe cua hay quay, ngồi vị tr&iacute; n&agrave;y mọi người kh&ocirc;ng c&oacute; cảm gi&aacute;c bị quay người m&agrave; chỉ cảm gi&aacute;c m&igrave;nh vẫn ngồi theo đ&uacute;ng một hướng. trong-xe-du-lich H&igrave;nh ảnh b&ecirc;n trong xe du lịch Hướng nh&igrave;n tr&ecirc;n xe Rất nhiều người khi say xe c&oacute; th&oacute;i quen gục đầu ngủ hoặc nh&igrave;n trong xe, nh&igrave;n v&agrave;o ghế đằng trước hoặc c&uacute;i đầu. Điều n&agrave;y c&agrave;ng g&acirc;y say xe. H&atilde;y cố gắng nh&igrave;n thật xa. Khi bạn nh&igrave;n v&agrave;o dệ đường hoặc gần th&igrave; cảm gi&aacute;c xe đi rất nhanh. Nếu bạn nh&igrave;n ra xa, c&agrave;ng xa th&igrave; c&agrave;ng cảm gi&aacute;c xe đi rất chậm, thậm ch&iacute; xe đứng y&ecirc;n. H&atilde;y cố gắng ngồi gần cửa k&iacute;nh để nh&igrave;n ra thật xa. Ăn, uống tr&ecirc;n xe Nhiều người đi du lịch hay chuẩn bị đồ ăn cho đỡ buồn hoặc uống nước. Tr&ecirc;n thực tế, nếu qu&yacute; kh&aacute;ch uống đồ nước ngọt c&oacute; ga hoặc ăn những đồ ăn nặng m&ugrave;i, lạc v&agrave; những đồ ăn g&acirc;y đầy bụng rất dễ g&acirc;y say xe. H&atilde;y chỉ uống nước lọc tr&ecirc;n xe v&agrave; ăn một v&agrave;i loại hoa quả như t&aacute;o, bưởi...Nếu ăn hoặc ngửi b&aacute;nh mỳ n&ecirc;n d&ugrave;ng loại b&aacute;nh mặn như b&aacute;nh b&igrave;nh thường v&agrave; kh&ocirc;ng kẹp thịt hoặc chả, gi&ograve;... V&agrave;o m&ugrave;a lễ hội, du kh&aacute;ch thường chuẩn bị những đồ lễ, v&agrave; khi lễ xong th&igrave; thụ lộc c&oacute; khi tr&ecirc;n xe lu&ocirc;n.<br />\r\n<br />\r\nRất nhiều kh&aacute;ch ăn b&aacute;nh, kẹo tr&ecirc;n xe c&agrave;ng g&acirc;y say xe. H&atilde;y chỉ ăn những hoa quả nhất l&agrave; cam hoặc bưởi. Hoạt động tr&ecirc;n xe Khoảng 40% du kh&aacute;ch bị say xe l&agrave; do kh&ocirc;ng giao lưu c&aacute;c hoạt động tr&ecirc;n xe. H&atilde;y cố gắng giao lưu ca h&aacute;t, n&oacute;i chuyện với người b&ecirc;n cạnh hoặc ch&uacute; &yacute; theo sự hướng dẫn của người hướng dẫn vi&ecirc;n. Đặc biệt kh&ocirc;ng n&ecirc;n đọc s&aacute;ch, d&ugrave;ng điện thoại nhắn tin tr&ecirc;n xe. Khi du kh&aacute;ch để &yacute; v&agrave;o một m&agrave;n h&igrave;nh m&aacute;y t&iacute;nh hoặc s&aacute;ch b&aacute;o sẽ dễ say xe hơn do để &yacute; v&agrave;o vật dụng qu&aacute; nhỏ m&agrave; kh&ocirc;ng c&oacute; tầm nh&igrave;n tho&aacute;ng đ&atilde;ng. H&atilde;y xem m&agrave;n h&igrave;nh ti vi tr&ecirc;n xe, nh&igrave;n hướng dẫn vi&ecirc;n hoặc nh&igrave;n v&agrave;o những người kh&aacute;c n&oacute;i chuyện sẽ rất hữu &iacute;ch để tr&aacute;nh say xe. 90% du kh&aacute;ch say xe do chơi b&agrave;i tr&ecirc;n xe do tập trung v&agrave;o khoảng c&aacute;ch qu&aacute; gần. Đừng bao giờ ngồi quay người về ph&iacute;a sau xe khi xe đang đi về ph&iacute;a trước bởi l&agrave;m vậy cực kỳ nhanh say xe.', 1, 0, 1, 1406705933, 1406708218, 1, 0),
(2, 'Hướng dẫn kinh nghiệm đi xe giường nằm dịp Tết', 'huong-dan-kinh-nghiem-di-xe-giuong-nam-dip-tet', 'upload/images/tin-tuc/Screenshot_1.png', 'Chọn giường khi mua vé: Một số hãng xe giường nằm tại Việt Nam hiện nay: Hoàng Long, Mailinh, Trà Lan Viên, Phương Nam...', 'Chọn giường khi mua v&eacute;: Một số h&atilde;ng xe giường nằm tại Việt Nam hiện nay: Ho&agrave;ng Long, Mailinh, Tr&agrave; Lan Vi&ecirc;n, Phương Nam... Xe giường nằm: th&ocirc;ng thường gồm c&oacute; 3 d&atilde;y giường nằm (kh&aacute;ch với xe kh&aacute;ch th&ocirc;ng thường chỉ c&oacute; 2 d&atilde;y ghế ngồi), mỗi d&atilde;y c&oacute; 2 tầng: tr&ecirc;n v&agrave; dưới. Một số xe c&oacute; nh&agrave; vệ sinh tr&ecirc;n xe, một số lại kh&ocirc;ng. V&igrave; &iacute;t chỗ hơn n&ecirc;n gi&aacute; v&eacute; dạng xe n&agrave;y sẽ đắt hơn xe ghế một &iacute;t. Thường th&igrave; vị tr&iacute; c&aacute;c giường như sau: - Nếu được chọn th&igrave; n&ecirc;n chọn giường nằm ở d&atilde;y giữa l&agrave; tốt nhất. N&ecirc;n chọn giường nằm từ vị tr&iacute; giường thứ 2 đến thứ 5 l&agrave; được. Tuy nhi&ecirc;n, một v&agrave;i thương hiệu xe (v&iacute; dụ như HL), nếu sợ lạnh th&igrave; bạn phải tr&aacute;nh h&agrave;ng giữa đặc biệt 2-3 gường đầu h&agrave;ng v&igrave; hệ thống điều h&ograve;a thổi mạnh ở đấy m&agrave; bạn kh&ocirc;ng thể điều chỉnh to nhỏ, hướng thổi. - Nằm tầng dưới sẽ tiện cho việc l&ecirc;n xuống xe, giảm được lắc lư. - Nếu bạn l&agrave; người kh&ocirc;ng th&iacute;ch khoảng kh&ocirc;ng gian chật chội tr&ecirc;n đầu th&igrave; n&ecirc;n nằm tầng tr&ecirc;n v&igrave; khoảng c&aacute;ch từ giừơng đến mui xe (tầng 2) sẽ rộng hơn khoảng c&aacute;ch từ giường dưới l&ecirc;n giường tr&ecirc;n (tầng 1) - Nếu bạn th&iacute;ch chọn giường đ&ocirc;i th&igrave; h&atilde;y chọn trong 5 giuờng cuối c&ugrave;ng ở tầng một (gường số 15, 16, 17, 18, 19). - Nếu bạn đi c&oacute; trẻ em th&igrave; n&ecirc;n mua những giường liền nhau ph&iacute;a tầng 2 (giường số 35, 36, 37, 38, 39)<br />\r\n<div style="text-align: center;">\r\n	<img alt="" src="../upload/images/tin-tuc/Screenshot_1.png" style="width: 469px; height: 356px;" /></div>\r\n<br />\r\n&nbsp;H&agrave;nh l&yacute;: - N&ecirc;n gửi h&agrave;nh l&yacute; ở hầm xe (lấy phiếu gửi h&agrave;nh l&yacute;). Do giường nằm c&oacute; diện t&iacute;ch hạn chế cho n&ecirc;n chỉ mang l&ecirc;n xe những vật dụng cần thiết sử dụng dọc đường đi m&agrave; th&ocirc;i. Giầy d&eacute;p: Bạn n&ecirc;n đi d&eacute;p để tiện cho việc l&ecirc;n xuống v&igrave; bạn sẽ kh&ocirc;ng được đi d&eacute;p v&agrave;o giường. Bạn phải để giầy d&eacute;p v&agrave;o một t&uacute;i nil&ocirc;ng để giữ đề ph&ograve;ng người kh&aacute;c v&ocirc; t&igrave;nh hay cố &yacute; sỏ nhầm. An to&agrave;n: N&ecirc;n thắt d&acirc;y an to&agrave;n, đặc biệt với giường nằm ở tầng tr&ecirc;n. WC: Xe c&oacute; WC sẽ rất thuận tiện với h&agrave;nh kh&aacute;ch tr&ecirc;n chặng đường xa, &iacute;t phải gh&eacute; c&aacute;c trạm. Dĩ nhi&ecirc;n l&agrave; nếu WC đ&oacute; sạch sẽ. Nếu bạn muốn giữ n&oacute; sạch th&igrave; đường bao giờ qu&ecirc;n việc nhấn n&uacute;t x&atilde; nước trước khi rời khỏi ph&ograve;ng vệ sinh. Để tr&aacute;nh t&eacute; ng&atilde; khi xe thắng: n&ecirc;n cầm c&aacute;c tay vịn hoặc tỳ tr&aacute;n l&ecirc;n v&aacute;ch. C&oacute; thể hứng nước trong bồn rửa mặt để dội s&agrave;n đứng nếu bạn l&agrave;m bẩn n&oacute;, s&agrave;n n&agrave;y c&oacute; lỗ tho&aacute;t nước, đừng lo. Ăn uống: Th&ocirc;ng thường gi&aacute; v&eacute; xe sẽ bao gồm lu&ocirc;n suất ăn c&aacute;c bữa (dĩ nhi&ecirc;n với c&aacute;c tuyến xa). C&aacute;c h&atilde;ng xe sẽ sắp xếp cho du kh&aacute;ch d&ugrave;ng bữa theo kiểu ăn cơm phần (trừ ăn s&aacute;ng). Nếu du kh&aacute;ch muốn ăn phở, b&uacute;n, hủ tiếu... thay cho phần cơm th&igrave; c&oacute; thể li&ecirc;n hệ với tổ phục vụ tr&ecirc;n xe để đặt trước. C&aacute;c khoản như: ăn th&ecirc;m, nước uống cho bữa ăn,... bạn phải tự thanh to&aacute;n nếu sử dụng.', 1, 1, 1, 1406707383, 1406708191, 1, 0),
(3, 'FP', 'fp', '', '', '', 1, 1, 2, 1406962548, 1406962556, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE IF NOT EXISTS `branch` (
`branch_id` int(11) NOT NULL,
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
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `nhaxe_id`, `branch_name_vi`, `branch_name_safe_vi`, `branch_name_en`, `branch_name_safe_en`, `tinh_id`, `address_vi`, `address_en`, `phone`, `creation_time`, `update_time`, `status`, `user_id`) VALUES
(1, 1, 'Bến xe Vũng Tàu', 'Bến xe Vũng Tàu', '11', '192 Nam Lỳ Khởi Nghĩa, Phường 3, Vũng Tàu, Tỉnh Bà Rịa-Vũng Tàu', 0, '1900 6484', '1406359307', '1406359307', 1, 0, 0, 0),
(2, 1, 'Bến xe Vũng Tàu', 'Bến xe Vũng Tàu', '11', '192 Nam Lỳ Khởi Nghĩa, Phường 3, Vũng Tàu, Tỉnh Bà Rịa-Vũng Tàu', 0, '1900 6484', '1406359581', '1406359581', 1, 0, 0, 0),
(3, 1, 'Bến xe Vũng Tàu', 'ben-xe-vung-tau', 'Bến xe Vũng Tàu', 'ben-xe-vung-tau', 11, '192 Nam Lỳ Khởi Nghĩa, Phường 3, Vũng Tàu, Tỉnh Bà Rịa-Vũng Tàu', '', '1900 6484', 1406359700, 1406360614, 0, 0),
(4, 1, 'Bến xe Vũng Tàu', 'ben-xe-vung-tau', 'Bến xe Vũng Tàu', 'ben-xe-vung-tau', 11, '192 Nam Lỳ Khởi Nghĩa, Phường 3, Vũng Tàu, Tỉnh Bà Rịa-Vũng Tàu', '', '1900 6484', 1406359749, 1406360617, 0, 0),
(5, 1, 'Bến xe Vũng Tàu', 'ben-xe-vung-tau', 'Bến xe Vũng Tàu', 'ben-xe-vung-tau', 11, '192 Nam Lỳ Khởi Nghĩa, Phường 3, Vũng Tàu, Tỉnh Bà Rịa-Vũng Tàu', '192 Nam Lỳ Khởi Nghĩa, Phường 3, Vũng Tàu, Tỉnh Bà Rịa-Vũng Tàu', '1900 6484', 1406359777, 1406360626, 0, 0),
(6, 1, 'Bến xe Vũng Tàu', 'ben-xe-vung-tau', 'Bến xe Vũng Tàu', 'ben-xe-vung-tau', 11, '192 Nam Lỳ Khởi Nghĩa, Phường 3, Vũng Tàu, Tỉnh Bà Rịa-Vũng Tàu', '192 Nam Lỳ Khởi Nghĩa, Phường 3, Vũng Tàu, Tỉnh Bà Rịa-Vũng Tàu', '1900 6484', 1406359807, 1406360654, 1, 0),
(7, 1, 'Bến xe Bắc Giang', 'ben-xe-bac-giang', 'Bến xe Bắc Giang', 'ben-xe-bac-giang', 14, 'Số 167A Đường Xương Giang, Phường Ngô Quyền, Bắc Giang, Tỉnh Bắc Giang', 'Số 167A Đường Xương Giang, Phường Ngô Quyền, Bắc Giang, Tỉnh Bắc Giang', '1900 6484', 1406360801, 1406360801, 1, 0),
(8, 1, 'Vp Quy Nhơn', 'vp-quy-nhon', 'Vp Quy Nhơn', 'vp-quy-nhon', 18, '60 Tây Sơn, Qui Nhơn, Tỉnh Bình Định', '60 Tây Sơn, Qui Nhơn, Tỉnh Bình Định', '1900 6484', 1406360831, 1406360831, 1, 0),
(9, 1, 'Vp Bình Thuận', 'vp-binh-thuan', 'Vp Bình Thuận', 'vp-binh-thuan', 5, '18 khu phố 2 Trường Chinh, P. Xuân An, Phan Thiết, Tỉnh Bình Thuận', '18 khu phố 2 Trường Chinh, P. Xuân An, Phan Thiết, Tỉnh Bình Thuận', '1900 6484', 1406360860, 1406360860, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `car_type`
--

CREATE TABLE IF NOT EXISTS `car_type` (
`type_id` int(11) NOT NULL,
  `type_name_vi` varchar(255) NOT NULL,
  `type_name_en` varchar(255) NOT NULL,
  `creation_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `car_type`
--

INSERT INTO `car_type` (`type_id`, `type_name_vi`, `type_name_en`, `creation_time`, `update_time`, `status`, `user_id`) VALUES
(1, 'Giường nằm', 'Giường nằm', 1406441869, 1406441869, 1, 0),
(2, 'Ghế ngồi', 'Ghế ngồi', 1406441980, 1406441980, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE IF NOT EXISTS `coupon` (
`coupon_id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `type_id` int(11) NOT NULL COMMENT '1: Giam gia 2: tru tien 3:gift',
  `coupon_value` text NOT NULL,
  `description` text NOT NULL,
  `start_date` int(11) NOT NULL,
  `end_date` int(11) NOT NULL,
  `creation_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
`image_id` int(11) NOT NULL,
  `nhaxe_id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `creation_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`image_id`, `nhaxe_id`, `image_url`, `creation_time`, `update_time`, `status`, `user_id`) VALUES
(33, 2, 'upload/2014/07/26/1406356540/Jellyfish.jpg', 1406356544, 1406356544, 1, 0),
(2, 1, 'upload/2014/07/23/1406101722/Desert.jpg', 1406101795, 1406342102, 0, 0),
(3, 1, 'upload/2014/07/23/1406101722/Hydrangeas.jpg', 1406101795, 1406342105, 0, 0),
(4, 1, 'upload/2014/07/23/1406101722/Koala.jpg', 1406101795, 1406342285, 0, 0),
(5, 1, 'upload/2014/07/23/1406101722/Tulips.jpg', 1406101795, 1406342282, 0, 0),
(6, 1, 'upload/2014/07/26/1406342168/Jellyfish.jpg', 1406342171, 1406342274, 0, 0),
(7, 1, 'upload/2014/07/26/1406342168/Koala.jpg', 1406342171, 1406342279, 0, 0),
(8, 1, 'upload/2014/07/26/1406342168/Penguins.jpg', 1406342171, 1406342277, 0, 0),
(9, 1, 'upload/2014/07/26/1406342168/Jellyfish.jpg', 1406342171, 1406342266, 0, 0),
(10, 1, 'upload/2014/07/26/1406342168/Koala.jpg', 1406342171, 1406342272, 0, 0),
(11, 1, 'upload/2014/07/26/1406342168/Penguins.jpg', 1406342171, 1406342269, 0, 0),
(12, 1, 'upload/2014/07/26/1406342296/Koala.jpg', 1406342299, 1406342338, 0, 0),
(13, 1, 'upload/2014/07/26/1406342296/Tulips.jpg', 1406342299, 1406342336, 0, 0),
(14, 1, 'upload/2014/07/26/1406342296/Penguins.jpg', 1406342299, 1406342311, 0, 0),
(15, 1, 'upload/2014/07/26/1406342296/Koala.jpg', 1406342299, 1406342319, 0, 0),
(16, 1, 'upload/2014/07/26/1406342296/Tulips.jpg', 1406342299, 1406342313, 0, 0),
(17, 1, 'upload/2014/07/26/1406342296/Penguins.jpg', 1406342299, 1406342317, 0, 0),
(18, 1, 'upload/2014/07/26/1406342347/Penguins.jpg', 1406342349, 1406342496, 0, 0),
(19, 1, 'upload/2014/07/26/1406342347/Tulips.jpg', 1406342349, 1406342426, 0, 0),
(20, 1, 'upload/2014/07/26/1406342347/Lighthouse.jpg', 1406342349, 1406342428, 0, 0),
(21, 1, 'upload/2014/07/26/1406342440/Hydrangeas.jpg', 1406342444, 1406342493, 0, 0),
(22, 1, 'upload/2014/07/26/1406342440/Koala.jpg', 1406342444, 1406342489, 0, 0),
(23, 1, 'upload/2014/07/26/1406342440/Lighthouse.jpg', 1406342444, 1406342491, 0, 0),
(24, 1, 'upload/2014/07/26/1406342506/Lighthouse.jpg', 1406342511, 1406342511, 1, 0),
(25, 1, 'upload/2014/07/26/1406342506/Tulips.jpg', 1406342511, 1406343684, 0, 0),
(26, 1, 'upload/2014/07/26/1406342506/Penguins.jpg', 1406342511, 1406343705, 0, 0),
(27, 1, 'upload/2014/07/26/1406343715/Lighthouse.jpg', 1406343721, 1406343727, 0, 0),
(28, 1, 'upload/2014/07/26/1406343715/Penguins.jpg', 1406343721, 1406343721, 1, 0),
(29, 1, 'upload/2014/07/26/1406343715/Tulips.jpg', 1406343721, 1406343721, 1, 0),
(30, 2, 'upload/2014/07/26/1406356423/Chrysanthemum.jpg', 1406356425, 1406356425, 1, 0),
(31, 2, 'upload/2014/07/26/1406356423/Desert.jpg', 1406356425, 1406356425, 1, 0),
(32, 2, 'upload/2014/07/26/1406356423/Hydrangeas.jpg', 1406356425, 1406356425, 1, 0),
(34, 2, 'upload/2014/07/26/1406356540/Lighthouse.jpg', 1406356544, 1406356544, 1, 0),
(35, 2, 'upload/2014/07/26/1406356540/Penguins.jpg', 1406356544, 1406356544, 1, 0),
(36, 2, 'upload/2014/07/26/1406356678/Koala.jpg', 1406356684, 1406356684, 1, 0),
(37, 2, 'upload/2014/07/26/1406356678/Lighthouse.jpg', 1406356684, 1406356684, 1, 0),
(38, 2, 'upload/2014/07/26/1406356678/Penguins.jpg', 1406356684, 1406356883, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
`news_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_safe` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `creation_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `nhaxe`
--

CREATE TABLE IF NOT EXISTS `nhaxe` (
`nhaxe_id` int(11) NOT NULL,
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
  `hot` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `nhaxe`
--

INSERT INTO `nhaxe` (`nhaxe_id`, `nhaxe_name_vi`, `nhaxe_name_safe_vi`, `nhaxe_name_en`, `nhaxe_name_safe_en`, `address_vi`, `address_en`, `phone`, `description_vi`, `description_en`, `image_url`, `creation_time`, `update_time`, `hot`, `status`, `user_id`) VALUES
(1, 'Hoàng Long', 'hoang-long', 'Hoàng Long', 'hoang-long', 'Ngô Quyền, TP. Hải Phòng', 'Ngô Quyền, TP. Hải Phòng', '0917492306', 'Giới thiệu nhà xe Hoàng Long', 'Giới thiệu nhà xe Hoàng Long', 'upload/images/nha-xe/hoanlong.jpg', 1406092248, 1407311423, 1, 0, 1),
(2, 'Phương Trang', 'phuong-trang', 'Phuong Trang', 'phuong-trang', '123 Pham Ngu Lao', '123 Pham Ngu Lao', '091857453256', 'safdsg dfsg d h d', 'safgsghjgj j j fjf', 'upload/images/nha-xe/Koala.jpg', 1406356401, 1407311425, 1, 0, 1),
(7, 'Mai Linh', 'mai-linh', 'Mai Linh', 'mai-linh', '123 abc', '123 abc', '0917492306', 'adsfadsf', 'sdfasdf', 'upload/images/nha-xe/Lighthouse.jpg', 1406565130, 1407311426, 1, 0, 1),
(8, 'Vietbus', 'vietbus', 'Vietbus', 'vietbus', 'Vietbus', 'Vietbus', '0986388413', 'Vietbus', 'Vietbus', 'upload/images/nha-xe/Desert.jpg', 1406565185, 1407311426, 1, 0, 1),
(9, 'Sao Việt', 'sao-viet', 'Sao Việt', 'sao-viet', 'Sao Việt', 'Sao Việt', '08768743342', 'Sao Việt', 'Sao Việt', 'upload/images/Hydrangeas.jpg', 1406565224, 1407311427, 1, 0, 1),
(10, 'Phương Nam', 'phuong-nam', 'Phương Nam', 'phuong-nam', 'Phương Nam', 'Phương Nam', '0876874342', 'Phương Nam', 'Phương Nam', '', 1406565293, 1407311428, 1, 0, 1),
(11, 'Danatransco', 'danatransco', 'Danatransco', 'danatransco', 'Danatransco', 'Danatransco', '09832134551', 'Danatransco', 'Danatransco', '', 1406565317, 1407311428, 1, 0, 1),
(12, 'Livitrans', 'livitrans', 'Livitrans', 'livitrans', 'Livitrans', 'Livitrans', '0917492306', 'Livitrans', 'Livitrans', '', 1406565345, 1407311429, 0, 0, 1),
(13, 'Minh Tâm', 'minh-tam', 'Minh Tâm', 'minh-tam', 'Minh Tâm', 'Minh Tâm', '0685684562', 'Minh Tâm', 'Minh Tâm', '', 1406565376, 1407311430, 0, 0, 1),
(14, 'Kumo', 'kumo', 'Kumo', 'kumo', 'Kumo', 'Kumo', '0753523535', 'Kumo', 'Kumo', '', 1406565393, 1407311431, 0, 0, 1),
(15, 'KaLong', 'kalong', 'KaLong', 'kalong', 'KaLong', 'KaLong', '0123144354', 'KaLong', 'KaLong', '', 1406565417, 1407311431, 0, 0, 1),
(16, 'Superdong', 'superdong', 'Superdong', 'superdong', 'Superdong', 'Superdong', '0876874342', 'Superdong', 'Superdong', '', 1406565441, 1407311433, 0, 0, 1),
(17, '', '', '', '', '', '', '', '', '', '', 1406962419, 1406962621, 0, 0, 0),
(18, 'văn quân', 'van-quan', 'van quan', 'van-quan', '33 duogn 44', '33 duong 44', '1234556678', 'tốt', 'tot', '', 1407212848, 1407311434, 0, 0, 1),
(19, 'Mai Linh', 'mai-linh', 'Mai Linh', 'mai-linh', '64-68 Hai Bà Trưng, phường Bến Nghé, Quận 1, Tp. Hồ Chí Minh', '64-68 Hai Bà Trưng, phường Bến Nghé, Quận 1, Tp. Hồ Chí Minh', '08.38 29 8888', 'Công Ty Cổ Phần Vận Tải Tốc Hành Mai Linh - Mai Linh Express có hơn 500 xe hoạt động trên 49 tuyến đường xe khách Bắc Nam nối liền trên 24 tỉnh thành. Với phương châm “xe khởi hành đúng giờ - không khói thuốc – không đón khách dọc đường”, cùng với phong cách phục vụ chuyên nghiệp, tận tình, chu đáo và trung thực, đến nay hình ảnh xe khách chất lượng cao Mai Linh đã trở nên quen thuộc với khách hàng. Xe Mai Linh đang nỗ lực từng ngày, từng giờ, tiến dần đến mục tiêu phục vụ hành khách với chất lượng ngang tầm khu vực và đạt chuẩn quốc tế. Mai Linh - An toàn, chất lượng, mọi lúc, mọi nơi.', 'Công Ty Cổ Phần Vận Tải Tốc Hành Mai Linh - Mai Linh Express có hơn 500 xe hoạt động trên 49 tuyến đường xe khách Bắc Nam nối liền trên 24 tỉnh thành. Với phương châm “xe khởi hành đúng giờ - không khói thuốc – không đón khách dọc đường”, cùng với phong cách phục vụ chuyên nghiệp, tận tình, chu đáo và trung thực, đến nay hình ảnh xe khách chất lượng cao Mai Linh đã trở nên quen thuộc với khách hàng. Xe Mai Linh đang nỗ lực từng ngày, từng giờ, tiến dần đến mục tiêu phục vụ hành khách với chất lượng ngang tầm khu vực và đạt chuẩn quốc tế. Mai Linh - An toàn, chất lượng, mọi lúc, mọi nơi.', 'upload/images/Logo%20Mai%20Linh_large.png', 1407311754, 1407311790, 1, 1, 1),
(20, 'TheSinh Tourist', 'thesinh-tourist', 'TheSinh Tourist', 'thesinh-tourist', '246 - 248 Đề Thám, Quận 1, TP.Hồ Chí Minh', '246 - 248 Đề Thám, Quận 1, TP.Hồ Chí Minh', '08 3838 9597', 'Được thành lập năm 1993, hãng xe TheSinhTourist (tiền thân là Sinh Café) đã không ngừng phát triển và hiện nay là một trong những công ty lữ hành hàng đầu Việt Nam. Điểm nổi bật nhất ở nhà xe The Sinh Tourist là các chuyến đi khởi hành hàng ngày và không phụ thuộc vào số lượng khách. Cùng với việc khai trương hai khách sạn ở Campuchia, cũng như đưa vào hệ thống xe buýt chạy thẳng Sài Gòn – Phnom Penh – Siêm Riệp, nhà xe TheSinhTourist đang nỗ lực hết mình để trở thành một trong những công ty lữ hành hàng đầu Đông Nam Á. Lấy niềm vui khách hàng là niềm vui của mình: The Sinh Tourist thật sự hạnh phúc khi cảm nhận được sự hài lòng và nhìn thấy nụ cười của quý khách.', 'Được thành lập năm 1993, hãng xe TheSinhTourist (tiền thân là Sinh Café) đã không ngừng phát triển và hiện nay là một trong những công ty lữ hành hàng đầu Việt Nam. Điểm nổi bật nhất ở nhà xe The Sinh Tourist là các chuyến đi khởi hành hàng ngày và không phụ thuộc vào số lượng khách. Cùng với việc khai trương hai khách sạn ở Campuchia, cũng như đưa vào hệ thống xe buýt chạy thẳng Sài Gòn – Phnom Penh – Siêm Riệp, nhà xe TheSinhTourist đang nỗ lực hết mình để trở thành một trong những công ty lữ hành hàng đầu Đông Nam Á. Lấy niềm vui khách hàng là niềm vui của mình: The Sinh Tourist thật sự hạnh phúc khi cảm nhận được sự hài lòng và nhìn thấy nụ cười của quý khách.', 'upload/images/Thesinhtourist.jpg', 1407311964, 1407311964, 0, 1, 1),
(21, 'Phương Nam', 'phuong-nam', 'Phương Nam', 'phuong-nam', '275E Phạm Ngũ Lão, P. Phạm Ngũ Lão, Quận 1, TP.Hồ Chí Minh', 'Địa chỉ: 275E Phạm Ngũ Lão, P. Phạm Ngũ Lão, Quận 1, TP.Hồ Chí Minh', '3836 4086', 'Với xe chất lượng cao, Hãng xe PHƯƠNG NAM (PHƯƠNG NAM EXPRESS) được ra đời nhằm đáp ứng nhu cầu về du lịch lữ hành, đi lại, tour, đặc biệt là trên tuyến đường hướng về thành phố Nha Trang và khu vực miền Trung. Nhà xe PHƯƠNG NAM luôn nỗ lực cung cấp cho hành khách dịch vụ chuyên nghiệp và tận tình nhất. Xe có đầy đủ các tiện ích như tivi màn hình phẳng, toilet được dọn dẹp thường xuyên và sạch sẽ. Đội ngũ lái xe và nhân viên phục vụ được huấn luyện kỹ càng vì quan niệm: ‘AN TOÀN LÀ TRÊN HẾT’ Hãng xe PHƯƠNG NAM EXPRESS còn cung cấp các loại hình tour du lịch ở các thành phố du lịch nổi tiếng như: Nha Trang, Huế, Hội An, Đà Nẵng. Nhà xe cũng hỗ trợ đặt phòng khách sạn, resort, tìm kiếm tour du lịch phù hợp khi du khách có cần trợ giúp.', 'Với xe chất lượng cao, Hãng xe PHƯƠNG NAM (PHƯƠNG NAM EXPRESS) được ra đời nhằm đáp ứng nhu cầu về du lịch lữ hành, đi lại, tour, đặc biệt là trên tuyến đường hướng về thành phố Nha Trang và khu vực miền Trung. Nhà xe PHƯƠNG NAM luôn nỗ lực cung cấp cho hành khách dịch vụ chuyên nghiệp và tận tình nhất. Xe có đầy đủ các tiện ích như tivi màn hình phẳng, toilet được dọn dẹp thường xuyên và sạch sẽ. Đội ngũ lái xe và nhân viên phục vụ được huấn luyện kỹ càng vì quan niệm: ‘AN TOÀN LÀ TRÊN HẾT’ Hãng xe PHƯƠNG NAM EXPRESS còn cung cấp các loại hình tour du lịch ở các thành phố du lịch nổi tiếng như: Nha Trang, Huế, Hội An, Đà Nẵng. Nhà xe cũng hỗ trợ đặt phòng khách sạn, resort, tìm kiếm tour du lịch phù hợp khi du khách có cần trợ giúp.', 'upload/images/Logo%20Phuong%20Nam.png', 1407312189, 1407383602, 1, 1, 1),
(22, 'Thành Bưởi', 'thanh-buoi', 'Thành Bưởi', 'thanh-buoi', '266-268 Lê Hồng Phong, phường 4, quận 5, Tp. Hồ Chí Minh', '266-268 Lê Hồng Phong, phường 4, quận 5, Tp. Hồ Chí Minh', '08 38 308090', 'Công ty TNHH Thành Bưởi thành lập ngày 08/03/2000. Đến tháng 5/2008 với lực lượng lao động trong toàn Công ty khoảng 300 người; số lượng phương tiện vận chuyển khỏang 70 xe Hyundai Aero Space đời mới và sang trọng; 06 xe ghế nằm Huyndai Aero Queen Limousine (Ghế tương đương ghế máy bay hạng VIP); trên 20 xe trung chuyển phục vụ đưa đón khách; 05 xe tải các loại.', 'Công ty TNHH Thành Bưởi thành lập ngày 08/03/2000. Đến tháng 5/2008 với lực lượng lao động trong toàn Công ty khoảng 300 người; số lượng phương tiện vận chuyển khỏang 70 xe Hyundai Aero Space đời mới và sang trọng; 06 xe ghế nằm Huyndai Aero Queen Limousine (Ghế tương đương ghế máy bay hạng VIP); trên 20 xe trung chuyển phục vụ đưa đón khách; 05 xe tải các loại.', 'upload/images/thanhbuoi.png', 1407313233, 1407313233, 1, 1, 1),
(23, 'Phương Trang', 'phuong-trang', 'Phương Trang', 'phuong-trang', '486 - 486A Lê Văn Lương, P. Tân Phong, Q 7, TP Hồ Chí Minh', '486 - 486A Lê Văn Lương, P. Tân Phong, Q 7, TP Hồ Chí Minh', '0838 386 852', 'Mang một phong cách nổi bật và hiện đại, màu cam của xe Phương Trang (còn gọi là Futatrans hoặc Futa Phương Trang) đã ghi lại dấu ấn tốt đẹp trong lòng hành khách trong suốt 11 năm hình thành và phát triển. Xe giường nằm cao cấp Phương Trang hoạt động từ từ Huế và Đà Nẵng đổ vào đến hầu hết các tỉnh miền Tây nhằm phục vụ tối đa nhu cầu đi lại của hành khách. Sự phục vụ lịch thiệp và chu đáo của đội ngũ nhân viên đã giúp xe khách Phương Trang trở thành một địa chỉ tin cậy nhất của đông đảo khách hàng trong và ngoài nước. Phương Trang – Chất lượng là danh dự', 'Mang một phong cách nổi bật và hiện đại, màu cam của xe Phương Trang (còn gọi là Futatrans hoặc Futa Phương Trang) đã ghi lại dấu ấn tốt đẹp trong lòng hành khách trong suốt 11 năm hình thành và phát triển. Xe giường nằm cao cấp Phương Trang hoạt động từ từ Huế và Đà Nẵng đổ vào đến hầu hết các tỉnh miền Tây nhằm phục vụ tối đa nhu cầu đi lại của hành khách. Sự phục vụ lịch thiệp và chu đáo của đội ngũ nhân viên đã giúp xe khách Phương Trang trở thành một địa chỉ tin cậy nhất của đông đảo khách hàng trong và ngoài nước. Phương Trang – Chất lượng là danh dự', 'upload/images/Logo%20Phuongtrang.png', 1407313702, 1407313702, 1, 1, 1),
(24, 'Thuận Thảo', 'thuan-thao', 'Thuận Thảo', 'thuan-thao', '03 Hải Dương - Bình Ngọc - Thành phố Tuy Hòa - Phú Yên', '03 Hải Dương - Bình Ngọc - Thành phố Tuy Hòa - Phú Yên', '3824 229', 'Hiếm ai biết xe khách Thuận Thảo là hãng xe thành lập Bến xe tư nhân Chất lượng cao đầu tiên và duy nhất ở Việt Nam vào thời điểm 2001-2003. Luôn tuân theo tôn chỉ kinh doanh “Uy tín tạo dựng thành công”, xe Thuận Thảo đã đạt được rất nhiều thành tựu, giải thưởng: chứng chỉ ISO, bằng khen của Thủ tướng và các cấp lãnh đạo, Cúp vàng Thương Hiệu Việt, Huân chương Lao động, Cúp vàng thương hiệu Việt, Sao vàng Đất Việt,…nhiều năm liền. Nhà xe Thuận Thảo luôn là nhãn hiệu đặc biệt tin tưởng của người dân Phú Yên và các tỉnh thành gần xa khi có nhu cầu vận chuyển, chuyên chở. Thuận Thảo – Uy tín tạo dựng thành công', 'Hiếm ai biết xe khách Thuận Thảo là hãng xe thành lập Bến xe tư nhân Chất lượng cao đầu tiên và duy nhất ở Việt Nam vào thời điểm 2001-2003. Luôn tuân theo tôn chỉ kinh doanh “Uy tín tạo dựng thành công”, xe Thuận Thảo đã đạt được rất nhiều thành tựu, giải thưởng: chứng chỉ ISO, bằng khen của Thủ tướng và các cấp lãnh đạo, Cúp vàng Thương Hiệu Việt, Huân chương Lao động, Cúp vàng thương hiệu Việt, Sao vàng Đất Việt,…nhiều năm liền. Nhà xe Thuận Thảo luôn là nhãn hiệu đặc biệt tin tưởng của người dân Phú Yên và các tỉnh thành gần xa khi có nhu cầu vận chuyển, chuyên chở. Thuận Thảo – Uy tín tạo dựng thành công', 'upload/images/Logo%20ThuanThao.png', 1407314003, 1407314003, 0, 1, 1),
(25, 'Hạnh Cafe', 'hanh-cafe', 'Hạnh Cafe', 'hanh-cafe', '10 Hùng Vương, Lộc Thọ, tp. Nha Trang, Khánh Hòa', '10 Hùng Vương, Lộc Thọ, tp. Nha Trang, Khánh Hòa', '058 3527 466', 'Hơn 20 năm xây dựng và phát triển thương hiệu, hãng xe Hanh Café - Phạm Ngũ Lão đã phục vụ hàng chục triệu khách hàng trên suốt tuyến đường từ Sài Gòn đến Huế. Chất lượng nhà xe Hanh Café nổi tiếng đã thu hút đông đảo khách hàng trong và ngoài nước với nhiều khen ngợi. Xe giường nằm Hanh Café luôn được khách du lịch trong nước và quốc tế lựa chọn vì chất lượng phục vụ, sự an toàn và luôn đặt lợi ích của khách hàng lên trên hết. Hiện tại, hãng xe khách Hanh Café đã có tuyến xe đến hầu hết các thành phố du lịch nổi tiếng của Việt Nam, với đội ngũ xe khách, xe du lịch từ giường nằm 40 chỗ đến ghế ngồi 45 chỗ thuộc các dòng cao cấp nhất hiện nay.', 'Hơn 20 năm xây dựng và phát triển thương hiệu, hãng xe Hanh Café - Phạm Ngũ Lão đã phục vụ hàng chục triệu khách hàng trên suốt tuyến đường từ Sài Gòn đến Huế. Chất lượng nhà xe Hanh Café nổi tiếng đã thu hút đông đảo khách hàng trong và ngoài nước với nhiều khen ngợi. Xe giường nằm Hanh Café luôn được khách du lịch trong nước và quốc tế lựa chọn vì chất lượng phục vụ, sự an toàn và luôn đặt lợi ích của khách hàng lên trên hết. Hiện tại, hãng xe khách Hanh Café đã có tuyến xe đến hầu hết các thành phố du lịch nổi tiếng của Việt Nam, với đội ngũ xe khách, xe du lịch từ giường nằm 40 chỗ đến ghế ngồi 45 chỗ thuộc các dòng cao cấp nhất hiện nay.', 'upload/images/Logo%20Hanh%20Cafe.png', 1407314492, 1407314492, 0, 1, 1),
(26, 'Hoàng Long', 'hoang-long', 'Hoàng Long', 'hoang-long', 'Số 05 Phạm Ngũ Lão - P.Lương Khánh Thiện - Q.Ngô Quyền - TP. Hải Phòng', 'Số 05 Phạm Ngũ Lão - P.Lương Khánh Thiện - Q.Ngô Quyền - TP. Hải Phòng', '0313 920920', 'Hãng xe Hoàng Long hay còn gọi là Hoàng Long Asia hoặc Hoàng Long Bus là một trong những thương hiệu xe chất lượng cao hàng đầu Việt Nam. Phục vụ hàng chục triệu hành khách Việt Nam và quốc tế trong suốt 16 năm hoạt động, xe khách Hoàng Long đã đạt giải thưởng Sao Vàng đất Việt 3 lần liên tiếp. Xe giường nằm cao cấp Hoàng Long liên tục cải tiến với rất nhiều tiện ích như TV, máy lạnh, khăn lạnh, nhà vệ sinh,... giúp hành khách trên xe luôn cảm giác thoải mái. Tất cả các lái phụ xe của nhà xe Hoàng Long đều được học giao tiếp du lịch để luôn đối xử ân cần và lịch sự đối với hành khách. Nhờ những cố gắng không ngừng, danh tiếng của Hoàng Long lan rộng khắp Việt Nam và quốc tế. Hoàng Long - Không ngừng đổi mới, không ngừng nâng cao chất lượng phục vụ.', 'Hãng xe Hoàng Long hay còn gọi là Hoàng Long Asia hoặc Hoàng Long Bus là một trong những thương hiệu xe chất lượng cao hàng đầu Việt Nam. Phục vụ hàng chục triệu hành khách Việt Nam và quốc tế trong suốt 16 năm hoạt động, xe khách Hoàng Long đã đạt giải thưởng Sao Vàng đất Việt 3 lần liên tiếp. Xe giường nằm cao cấp Hoàng Long liên tục cải tiến với rất nhiều tiện ích như TV, máy lạnh, khăn lạnh, nhà vệ sinh,... giúp hành khách trên xe luôn cảm giác thoải mái. Tất cả các lái phụ xe của nhà xe Hoàng Long đều được học giao tiếp du lịch để luôn đối xử ân cần và lịch sự đối với hành khách. Nhờ những cố gắng không ngừng, danh tiếng của Hoàng Long lan rộng khắp Việt Nam và quốc tế. Hoàng Long - Không ngừng đổi mới, không ngừng nâng cao chất lượng phục vụ.', 'upload/images/Logo%20Hoang%20Long.png', 1407314600, 1407314600, 1, 1, 1),
(27, 'Anh Khoa', 'anh-khoa', 'Anh Khoa', 'anh-khoa', '306 Lê Hồng Phong, P.10, Quận 10, TP.Hồ Chí Minh', 'Địa chỉ: 306 Lê Hồng Phong, P.10, Quận 10, TP.Hồ Chí Minh', '08 6650 3399', 'Hãng xe Anh Khoa (Anh Khoa Bus) tập trung vào dịch vụ xe khách tuyến Buôn Ma Thuột- TP HCM, do vậy nhà xe Anh Khoa luôn coi chất lượng phục vụ hành khách là hàng đầu và tạo khác biệt với các nhà xe khác ở sự thân thiện, dễ mến. Hiện tại xe Anh Khoa có dịch vụ xe khách chất lượng cao và chuyển phát hàng hóa luôn được khen ngợi về sự an toàn, thuận tiện, giao nhận dễ dàng. Hiện tại, xe khách Anh Khoa bao gồm cả xe ghế ngồi và xe giường nằm, phục vụ nhiều chuyến một ngày và có xe trung chuyển trong TP HCM.', 'Hãng xe Anh Khoa (Anh Khoa Bus) tập trung vào dịch vụ xe khách tuyến Buôn Ma Thuột- TP HCM, do vậy nhà xe Anh Khoa luôn coi chất lượng phục vụ hành khách là hàng đầu và tạo khác biệt với các nhà xe khác ở sự thân thiện, dễ mến. Hiện tại xe Anh Khoa có dịch vụ xe khách chất lượng cao và chuyển phát hàng hóa luôn được khen ngợi về sự an toàn, thuận tiện, giao nhận dễ dàng. Hiện tại, xe khách Anh Khoa bao gồm cả xe ghế ngồi và xe giường nằm, phục vụ nhiều chuyến một ngày và có xe trung chuyển trong TP HCM.', '', 1407314740, 1407383561, 0, 1, 1),
(28, 'Minh Thắng', 'minh-thang', 'Minh Thắng', 'minh-thang', '306 Lê Hồng Phong, P.10, Quận 10, TP.Hồ Chí Minh', 'Địa chỉ: 306 Lê Hồng Phong, P.10, Quận 10, TP.Hồ Chí Minh', '08 6650 3399', 'Thương hiệu hãng xe Hoa Mai hiện đã trở nên rất quen thuộc với hành khách trên tuyến TP HCM – Vũng Tàu với loại xe 16 chỗ chạy tần suất 10-15 phút/chuyến. Xe khách Hoa Mai có chất lượng phục vụ ổn định, thân thiện, và được nhiều hành khách tin dùng để tham quan, du lịch Vũng Tàu, đặc biệt là các kỳ nghỉ, lễ tết. Nhà xe Hoa Mai tin chắc rằng sự tận tâm phục vụ của mình sẽ làm hài lòng mọi quý khách. thu gọn', 'Thương hiệu hãng xe Hoa Mai hiện đã trở nên rất quen thuộc với hành khách trên tuyến TP HCM – Vũng Tàu với loại xe 16 chỗ chạy tần suất 10-15 phút/chuyến. Xe khách Hoa Mai có chất lượng phục vụ ổn định, thân thiện, và được nhiều hành khách tin dùng để tham quan, du lịch Vũng Tàu, đặc biệt là các kỳ nghỉ, lễ tết. Nhà xe Hoa Mai tin chắc rằng sự tận tâm phục vụ của mình sẽ làm hài lòng mọi quý khách. thu gọn', '', 1407314803, 1407383571, 0, 1, 1),
(29, 'Nam Phương', 'nam-phuong', 'Nam Phương', 'nam-phuong', '269 Phạm Ngũ Lão, Quận 1, Hồ Chi Minh', '269 Phạm Ngũ Lão, Quận 1, Hồ Chi Minh', '08. 39209868', 'Nam Phương Travel là thành viên của Nam Phương Group, được thành lập và hoạt động từ năm 2012. Sau một năm hoạt động, chúng tôi đã liên tục tăng số lượng đầu xe cùng với đội ngũ lái xe được tuyển chọn và đào tạo nghiệp vụ đã nhanh chóng đưa Nam Phương Travel trở thành thương hiệu mạnh trên tuyến đường Nha Trang – TP. Hồ Chí Minh.\r\n\r\nXin cảm ơn quý khách đã lựa chọn dịch vụ của Nam Phương Travel. Quý khách là những người đã lựa chọn và giúp Nam Phương Travel trở thành thương hiệu được ưa chuộng nhất trên cung đường Nha Trang – TP. Hồ Chí Minh. Đây là niềm vinh dự và là sự động viên lớn lao để chúng tôi tiếp tục nỗ lực hết sức phục vụ Quý khách ngày càng tốt hơn.\r\n\r\nHiện nay, các dịch vụ mà chúng tôi đang cung cấp trên tuyến đường Nha Trang – Hồ Chí Minh gồm có:\r\n\r\nVận chuyển khách\r\nVận chuyển hàng hóa\r\nChuyển tiền nhanh\r\nDu lịch lữ hành nội địa và quốc tế', 'Nam Phương Travel là thành viên của Nam Phương Group, được thành lập và hoạt động từ năm 2012. Sau một năm hoạt động, chúng tôi đã liên tục tăng số lượng đầu xe cùng với đội ngũ lái xe được tuyển chọn và đào tạo nghiệp vụ đã nhanh chóng đưa Nam Phương Travel trở thành thương hiệu mạnh trên tuyến đường Nha Trang – TP. Hồ Chí Minh.\r\n\r\nXin cảm ơn quý khách đã lựa chọn dịch vụ của Nam Phương Travel. Quý khách là những người đã lựa chọn và giúp Nam Phương Travel trở thành thương hiệu được ưa chuộng nhất trên cung đường Nha Trang – TP. Hồ Chí Minh. Đây là niềm vinh dự và là sự động viên lớn lao để chúng tôi tiếp tục nỗ lực hết sức phục vụ Quý khách ngày càng tốt hơn.\r\n\r\nHiện nay, các dịch vụ mà chúng tôi đang cung cấp trên tuyến đường Nha Trang – Hồ Chí Minh gồm có:\r\n\r\nVận chuyển khách\r\nVận chuyển hàng hóa\r\nChuyển tiền nhanh\r\nDu lịch lữ hành nội địa và quốc tế', 'upload/images/Logo%20Nam%20Phuong.png', 1407315564, 1407315564, 1, 1, 1),
(30, 'Minh Tâm', 'minh-tam', 'Minh Tâm', 'minh-tam', '204C Sư Vạn Hạnh,Phường 9, Quận 5, Hồ Chí Minh', '204C Sư Vạn Hạnh,Phường 9, Quận 5, Hồ Chí Minh', '38 30 61 06', 'Từ khi thành lập cho đến nay Công ty TNHH Minh Tâm với thế mạnh vận chuyển hành khách và hàng hóa theo tuyến đường Sài Gòn  ⇔  Bến Tre. Do đó để đáp ứng nhu cầu ngày càng cao của quý khách, công ty chúng tôi đang từng bước phát triển từ phương thức quản lý đến công tác trang bị và đang đa dạng hóa phương tiện vận chuyển. Với kiểu dáng đẹp, hiện đại, sang trọng, rộng rãi và thoáng mát, từ 7 chỗ đến 29 chổ, phù hợp với nhu cầu đa dạng của khách hàng. Với 3 gam màu chủ đạo trắng, xanh, đỏ xen kẻ nhau sẽ tạo cảm giác an toàn, thoải mái trên suốt chặng đường.\r\nVới giá  cả vận chuyển hàng hóa hợp lý, ổn định, uy tín thì Minh Tâm sẽ là nơi đáng được quý khách đặt trọn niềm tin.\r\nMinh Tâm hoạt động dựa trên phương châm "Sự hài lòng của quý khách là thành công của Minh Tâm” cho nên chúng tôi không ngừng học hỏi kinh nghiệm, đổi mới công tác quản lý nhằm đem đến cho khách hàng một dịch vụ tốt nhất. Đội ngũ nhân viên đông đảo, giàu kinh nghiệm, phong cách phục vụ nhiệt tình, chu đáo, thân thiện. ', 'Từ khi thành lập cho đến nay Công ty TNHH Minh Tâm với thế mạnh vận chuyển hành khách và hàng hóa theo tuyến đường Sài Gòn  ⇔  Bến Tre. Do đó để đáp ứng nhu cầu ngày càng cao của quý khách, công ty chúng tôi đang từng bước phát triển từ phương thức quản lý đến công tác trang bị và đang đa dạng hóa phương tiện vận chuyển. Với kiểu dáng đẹp, hiện đại, sang trọng, rộng rãi và thoáng mát, từ 7 chỗ đến 29 chổ, phù hợp với nhu cầu đa dạng của khách hàng. Với 3 gam màu chủ đạo trắng, xanh, đỏ xen kẻ nhau sẽ tạo cảm giác an toàn, thoải mái trên suốt chặng đường.\r\nVới giá  cả vận chuyển hàng hóa hợp lý, ổn định, uy tín thì Minh Tâm sẽ là nơi đáng được quý khách đặt trọn niềm tin.\r\nMinh Tâm hoạt động dựa trên phương châm "Sự hài lòng của quý khách là thành công của Minh Tâm” cho nên chúng tôi không ngừng học hỏi kinh nghiệm, đổi mới công tác quản lý nhằm đem đến cho khách hàng một dịch vụ tốt nhất. Đội ngũ nhân viên đông đảo, giàu kinh nghiệm, phong cách phục vụ nhiệt tình, chu đáo, thân thiện. ', '', 1407315882, 1407315882, 0, 1, 1),
(31, 'Thịnh Phát', 'thinh-phat', 'Thịnh Phát', 'thinh-phat', '25A Sư Vạn Hạnh, Phường 9, Quận 5, Thành Phố Hồ Chí Minh', '25A Su Van Hanh, Ward 9, Dict 5, Ho Chi Minh City', '(08) 3830.30.42', 'Công ty TNHH TM DV Thịnh Phát được thành lập vào ngày 23 tháng 03 năm 2004,  là một công ty chuyên vận tải hành khách và vận chuyển hàng hóa tuyến đường Thành Phố Hồ Chí Minh – Bến Tre và Thành Phố Hồ Chí Minh – Tiền Giang.\r\n\r\nKhởi đầu từ một doanh nghiệp nhỏ với số lượng xe ít, Công ty TNHH TM DV Thịnh Phát đã từng bước phát triển, tăng cường số lượng xe cũng như tổ chức nhiều giờ chạy hơn để có thể đáp ứng nhu cầu của khách hàng, nhằm cung cấp cho khách hàng phương tiện vận chuyển nhanh nhất.\r\n\r\nVới đội ngũ xe Hyundai County và SAMCO đời mới, Công ty TNHH TM DV Thịnh Phát luôn đảm bảo chất lượng xe tốt nhất để tạo sự thoải mái cho khách hàng.  \r\n\r\nHiện tại, Công Ty đã trang bị 100% thiết bị giám sát hành trình trên các xe để có thể theo dõi lộ trình và tốc độ lái xe nhằm đảm bảo sự an toàn cho khách hàng trên suốt hành trình.\r\n\r\nBên cạnh vận chuyển hành khách, Công ty TNHH TM DV Thịnh Phát còn cung cấp dịch vụ vận chuyển hàng hóa theo tiêu chí vận chuyển hàng hóa nhanh nhất, an toàn ', 'Công ty TNHH TM DV Thịnh Phát được thành lập vào ngày 23 tháng 03 năm 2004,  là một công ty chuyên vận tải hành khách và vận chuyển hàng hóa tuyến đường Thành Phố Hồ Chí Minh – Bến Tre và Thành Phố Hồ Chí Minh – Tiền Giang.\r\n\r\nKhởi đầu từ một doanh nghiệp nhỏ với số lượng xe ít, Công ty TNHH TM DV Thịnh Phát đã từng bước phát triển, tăng cường số lượng xe cũng như tổ chức nhiều giờ chạy hơn để có thể đáp ứng nhu cầu của khách hàng, nhằm cung cấp cho khách hàng phương tiện vận chuyển nhanh nhất.\r\n\r\nVới đội ngũ xe Hyundai County và SAMCO đời mới, Công ty TNHH TM DV Thịnh Phát luôn đảm bảo chất lượng xe tốt nhất để tạo sự thoải mái cho khách hàng.  \r\n\r\nHiện tại, Công Ty đã trang bị 100% thiết bị giám sát hành trình trên các xe để có thể theo dõi lộ trình và tốc độ lái xe nhằm đảm bảo sự an toàn cho khách hàng trên suốt hành trình.\r\n\r\nBên cạnh vận chuyển hành khách, Công ty TNHH TM DV Thịnh Phát còn cung cấp dịch vụ vận chuyển hàng hóa theo tiêu chí vận chuyển hàng hóa nhanh nhất, an toàn ', 'upload/images/Logo%20ThinhPhat.png', 1407380089, 1407380089, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE IF NOT EXISTS `place` (
`place_id` int(11) NOT NULL,
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
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`place_id`, `nhaxe_id`, `place_name_vi`, `place_name_safe_vi`, `place_name_en`, `place_name_safe_en`, `address_vi`, `address_en`, `creation_time`, `update_time`, `status`, `user_id`) VALUES
(1, 0, 'Bến xe Tây Ninh', 'ben-xe-tay-ninh', 'Tay Ninh', 'tay-ninh', '', '', 1406043966, 1406086214, 0, 0),
(2, 0, 'Hồ Chí Minh', 'ho-chi-minh', 'Ho Chi Minh', 'ho-chi-minh', '', '', 1406043982, 1406074005, 0, 0),
(3, 0, 'Hà Nội', 'ha-noi', 'Ha Noi', 'ha-noi', '', '', 1406043993, 1406073583, 0, 0),
(4, 0, 'Test', 'test', 'Test', 'test', '', '', 1406074473, 1406076724, 0, 0),
(5, 0, 'aaa', 'aaa', '', '', '', '', 1406075066, 1406076695, 0, 0),
(6, 0, 'asdasd', 'asdasd', '', '', '', '', 1406075136, 1406076693, 0, 0),
(7, 0, 'asdad', 'asdad', '', '', '', '', 1406075180, 1406076627, 0, 0),
(8, 0, 'asd', 'asd', '', '', '', '', 1406075358, 1406076623, 0, 0),
(9, 0, 'asdasdf', 'asdasdf', '', '', '', '', 1406075365, 1406076592, 0, 0),
(10, 0, 'asdasd', 'asdasd', 'asdasd', 'asdasd', '', '', 1406075430, 1406076360, 0, 0),
(11, 0, '', '', '', '', '', '', 1406076717, 1406076720, 0, 0),
(12, 2, 'Bến xe Miền Đông', 'ben-xe-mien-dong', 'Mien Dong', 'mien-dong', '292 Đinh Bộ Lĩnh, Phường 26 - Bình Thạnh - Hồ Chí Minh', '292 Đinh Bộ Lĩnh, Phường 26 - Bình Thạnh - Hồ Chí Minh', 1406076736, 1407309844, 0, 1),
(13, 0, 'Bến xe Thành Bưởi', 'ben-xe-thanh-buoi', 'Thanh Buoi', 'thanh-buoi', '', '', 1406076759, 1406087135, 0, 0),
(14, 9, 'Nha Trang', 'nha-trang', 'Nha Trang', 'nha-trang', 'Nha Trang - Khánh Hòa', 'Nha Trang - Khánh Hòa', 1406076779, 1407309850, 0, 1),
(15, 0, 'Bến xe Phan Thiết', 'ben-xe-phan-thiet', 'Phan Thiet', 'phan-thiet', '', '', 1406076789, 1406087340, 0, 0),
(16, 0, 'Bến xe Thái Bình', 'ben-xe-thai-binh', 'Thai Binh', 'thai-binh', '', '', 1406076799, 1406087343, 0, 0),
(17, 0, 'Huế', 'hue', 'Hue', 'hue', '', '', 1406076850, 1406082260, 0, 0),
(18, 0, 'Hải Phòng', 'hai-phong', 'Hai Phong', 'hai-phong', '', '', 1406076859, 1406082257, 0, 0),
(19, 0, 'Đà Nẵng', 'da-nang', 'Da Nang', 'da-nang', '', '', 1406076869, 1406082254, 0, 0),
(20, 0, 'Bến xe Long An', 'ben-xe-long-an', 'Long An', 'long-an', '', '', 1406076898, 1406087347, 0, 0),
(21, 0, 'Lạng Sơn', 'lang-son', 'Lang Son', 'lang-son', '', '', 1406076918, 1406084718, 0, 0),
(22, 0, '', '', '', '', '', '', 1406079731, 1406083472, 0, 0),
(23, 0, '', '', '', '', '', '', 1406079767, 1406083468, 0, 0),
(24, 0, '', '', '', '', '', '', 1406079829, 1406083544, 0, 0),
(25, 0, '', '', '', '', '', '', 1406079858, 1406083541, 0, 0),
(26, 14, 'Bến xe Lương Yên', 'ben-xe-luong-yen', 'Luong Yen', 'luong-yen', '3 Nguyễn Khoái, Bạch Đằng - Hai Bà Trưng - Hà Nội', '3 Nguyễn Khoái, Bạch Đằng - Hai Bà Trưng - Hà Nội', 1406084714, 1407309851, 0, 1),
(27, 1, 'Khu phố Tây', 'khu-pho-tay', 'Khu pho Tay', 'khu-pho-tay', 'Phạm Ngũ Lão - Quận 1 - Hồ Chí Minh', 'Phạm Ngũ Lão - Quận 1 - Hồ Chí Minh', 1406085816, 1407309852, 0, 1),
(28, 2, 'Văn phòng Cần Thơ', 'van-phong-can-tho', 'Van Phong Can Tho', 'van-phong-can-tho', 'Quốc lộ 91B, P.Hưng Lợi - Ninh Kiều - Cần Thơ', 'Quốc lộ 91B, P.Hưng Lợi - Ninh Kiều - Cần Thơ', 1406087194, 1407309853, 0, 1),
(29, 8, 'Bến xe 91B Cần Thơ', 'ben-xe-91b-can-tho', 'Ben xe 91B Can Tho', 'ben-xe-91b-can-tho', 'Lộ 91B, Nguyễn Văn Linh, Phường Hưng Lợi - Ninh Kiều - Cần Thơ', 'Lộ 91B, Nguyễn Văn Linh, Phường Hưng Lợi - Ninh Kiều - Cần Thơ', 1406087285, 1407309855, 0, 1),
(30, 13, 'Mũi Né', 'mui-ne', 'Mui Ne', 'mui-ne', '20 Huỳnh Thúc Kháng, P. Hàm Tiến - Phan Thiết - Bình Thuận', '20 Huỳnh Thúc Kháng, P. Hàm Tiến - Phan Thiết - Bình Thuận', 1406087332, 1407309856, 0, 1),
(31, 14, 'Bến xe Mỹ Đình', 'ben-xe-my-dinh', 'Ben xe My Dinh', 'ben-xe-my-dinh', '20 Phạm Hùng, Mỹ Đình - Từ Liêm - Hà Nội', '20 Phạm Hùng, Mỹ Đình - Từ Liêm - Hà Nội', 1406087381, 1407309857, 0, 1),
(32, 14, 'Bến xe Giáp Bát', 'ben-xe-giap-bat', 'Bến xe Giáp Bát', 'ben-xe-giap-bat', 'Km6 đường Giải phóng - Hoàng Mai - Hà Nội', 'Km6 đường Giải phóng - Hoàng Mai - Hà Nội', 1406087506, 1407309858, 0, 1),
(33, 20, 'Bến xe Quỳnh Côi', 'ben-xe-quynh-coi', 'Bến xe Quỳnh Côi', 'ben-xe-quynh-coi', 'Thị trấn Quỳnh Côi - Quỳnh Phụ - Thái Bình', 'Thị trấn Quỳnh Côi - Quỳnh Phụ - Thái Bình', 1406087555, 1407253664, 0, 0),
(34, 0, 'Cửa Ông', 'cua-ong', 'Cửa Ông', 'cua-ong', 'Phường Cửa Ông - Cẩm Phả - Quảng Ninh', 'Phường Cửa Ông - Cẩm Phả - Quảng Ninh', 1406087609, 1406566351, 0, 0),
(35, 0, '', '', '', '', '', '', 1406435084, 1406566349, 0, 0),
(36, 0, '', '', '', '', '', '', 1406446266, 1406566347, 0, 0),
(37, 9, 'Bưu Điện Cam Ranh', 'buu-dien-cam-ranh', 'Bưu Điện Cam Ranh', 'buu-dien-cam-ranh', '01 Nguyễn Trọng Kỷ, P.Cam Lợi - Cam Ranh - Khánh Hòa', '01 Nguyễn Trọng Kỷ, P.Cam Lợi - Cam Ranh - Khánh Hòa', 1406566193, 1407309859, 0, 1),
(38, 13, 'Mũi Né', 'mui-ne', 'Mũi Né', 'mui-ne', '20 Huỳnh Thúc Kháng, P. Hàm Tiến - Phan Thiết - Bình Thuận', '20 Huỳnh Thúc Kháng, P. Hàm Tiến - Phan Thiết - Bình Thuận', 1406566256, 1406566288, 0, 0),
(39, 13, 'Văn phòng Bình Thuận', 'van-phong-binh-thuan', 'Văn phòng Bình Thuận', 'van-phong-binh-thuan', '18 khu phố 2 Trường Chinh, P. Xuân An - Phan Thiết - Bình Thuận', '18 khu phố 2 Trường Chinh, P. Xuân An - Phan Thiết - Bình Thuận', 1406566334, 1407309860, 0, 1),
(40, 1, 'bến xe miềm bắc', 'ben-xe-miem-bac', 'ben xe mien bac', 'ben-xe-mien-bac', '345 dsfhsufsdn', '345 enguyeun', 1407221838, 1407309861, 0, 1),
(41, 2, 'Bến Xe Miền Đông', 'ben-xe-mien-dong', 'Ben xe Mien Dong', 'ben-xe-mien-dong', '292 Đinh Bộ Lĩnh, Phường 26 - Bình Thạnh - Hồ Chí Minh', '292 Dinh Bo Linh St, Ward 26, Dist 1, Ho Chi Minh City', 1407310811, 1407310811, 1, 1),
(42, 2, 'Khu Phố Tây', 'khu-pho-tay', 'Khu Pho Tay', 'khu-pho-tay', '205 Phạm Ngũ Lão - Quận 1 - Hồ Chí Minh', '205 Pham Ngu Lao St, Dist 1, Ho Chi Minh City', 1407310928, 1407310928, 1, 1),
(43, 21, 'Khu phố Tây', 'khu-pho-tay', 'Khu Pho Tay', 'khu-pho-tay', '275F Phạm Ngũ Lão, P.Phạm Ngũ Lão, Q.1, Thành Phố Hồ Chí Minh', '275F Pham Ngu Lao St, Pham Ngu Lao Ward, Dict 1, Ho Chi Minh City', 1407314964, 1407314964, 1, 1),
(44, 20, 'Khu Phố Tây', 'khu-pho-tay', 'Khu Pho Tay', 'khu-pho-tay', '246 - 248 Đề Thám, Quận 1, Hồ Chí Minh', '246 - 248 De Tham St, Dict 1, Ho Chi Minh City', 1407315045, 1407380174, 1, 1),
(45, 25, 'Khu Phố Tây', 'khu-pho-tay', 'Khu Pho Tay', 'khu-pho-tay', '229 Phạm Ngũ Lão, Quận 1, Hồ Chí Minh', '229 Pham Ngu Lao, Dict 1, Ho Chi Minh City', 1407315109, 1407315109, 1, 1),
(46, 30, 'Bến Xe Miền Tây', 'ben-xe-mien-tay', 'Ben Xe Mien Tay', 'ben-xe-mien-tay', '395 Kinh Dương Vương - Phường An Lạc - Bình Tân - Hồ Chí Minh', '395 Kinh Duong Vuong St, An Lac Ward, Binh Tan Dict, Ho Chi Minh City', 1407316105, 1407316105, 1, 1),
(47, 23, 'Bến Xe Phía Nam', 'ben-xe-phia-nam', 'Ben Xe Phia Nam', 'ben-xe-phia-nam', 'Số 58 Đường 23/10 - Nha Trang - Khánh Hòa', '58, 23/10 St, Nha Trang City, Khanh Hoa Province', 1407380306, 1407380306, 1, 1),
(48, 20, 'Văn Phòng Nha Trang', 'van-phong-nha-trang', 'Nha Trang Office', 'nha-trang-office', '90C Hùng Vương - Nha Trang - Khánh Hòa', '90C Hung Vuong St, Nha Trang City, Khanh Hoa Province', 1407380439, 1407381952, 1, 1),
(49, 25, 'Văn Phòng Nha Trang', 'van-phong-nha-trang', 'Nha Trang Office', 'nha-trang-office', '10 Hùng Vương - Nha Trang - Khánh Hòa', '10 Hung Vuong St, Nha Trang City, Khanh Hoa Province', 1407380706, 1407381972, 1, 1),
(50, 29, 'Bến Xe Miền Đông', 'ben-xe-mien-dong', 'Ben xe Mien Dong', 'ben-xe-mien-dong', '292 Đinh Bộ Lĩnh, Phường 26 - Bình Thạnh - Hồ Chí Minh', '292 Dinh Bo Linh, Ward 26, Binh Thanh Dict, Ho Chi Minh City', 1407380794, 1407380794, 1, 1),
(51, 29, 'Văn Phòng Nha Trang', 'van-phong-nha-trang', 'Nha Trang Office', 'nha-trang-office', '01 Nguyễn Thiện Thuật - P. Lộc Thọ - Nha Trang - Khánh Hòa', '01 Nguyen Thien Thuat St, Loc Tho Ward, Nha Trang City, Khanh hoa Province', 1407380881, 1407382000, 1, 1),
(52, 20, 'Văn Phòng Mũi Né', 'van-phong-mui-ne', 'Mui Ne Office', 'mui-ne-office', '20 Huỳnh Thúc Kháng, P. Hàm Tiến - Phan Thiết - Bình Thuận', '20 Huynh Thuc Khang St, Ham Tien Ward, Phan Thiet City, Binh Thuan Province', 1407382470, 1407382470, 1, 1),
(53, 21, 'Văn Phòng Mũi Né', 'van-phong-mui-ne', 'Mui Ne Office', 'mui-ne-office', '107 Nguyễn Đình Chiểu - Hàm Tiến - Phan Thiết - Bình Thuận', '107 Nguyen Dinh Chieu, Ham Tien Ward, Phan Thiet City, Binh Thuan Province', 1407382560, 1407382560, 1, 1),
(54, 25, 'Văn Phòng Mũi Né', 'van-phong-mui-ne', 'Mui Ne Office', 'mui-ne-office', '117 Nguyễn Đình Chiểu - Phan Thiết - Bình Thuận', '117 Nguyen Dinh Chieu, Phan Thiet City, Binh Thuan Province', 1407382640, 1407382640, 1, 1),
(55, 23, 'Văn Phòng Lê Hồng Phong', 'van-phong-le-hong-phong', 'Le Hong Phong Office', 'le-hong-phong-office', '231 - 233 Lê Hồng Phong - Phường 4 - Quận 5 - Hồ Chí Minh', '231 - 233 Le Hong Phong St, Ward 4, Dict 5, Ho Chi Minh City', 1407382728, 1407382728, 1, 1),
(56, 23, 'Bến Xe Đà Lạt', 'ben-xe-da-lat', 'Bến Xe Đà Lạt', 'ben-xe-da-lat', '01 Tô Hiến Thành, Phường 3 - Đà Lạt - Lâm Đồng', '01 Tô Hiến Thành, Phường 3 - Đà Lạt - Lâm Đồng', 1407382772, 1407382772, 1, 1),
(57, 26, 'Văn Phòng Lê Hồng Phong', 'van-phong-le-hong-phong', 'Le Hong Phong Office', 'le-hong-phong-office', '266-268 Lê Hồng Phong, phường 4 - Quận 5 - Hồ Chí Minh', '266 - 268 Le Hong Phong St, Ward 4, Dict 5, Ho Chi Minh', 1407382846, 1407382846, 1, 1),
(58, 26, 'Văn Phòng Đà Lạt', 'van-phong-da-lat', 'Da Lat Office', 'da-lat-office', '05 Lữ Gia, phường 9 - Đà Lạt - Lâm Đồng', '05 Lu Gia St, Ward 9, Da Lat City, Lam Dong Province', 1407382910, 1407382910, 1, 1),
(59, 20, 'Văn Phòng Đà Lạt', 'van-phong-da-lat', 'Da Lat Office', 'da-lat-office', '22 Bùi Thị Xuân - Đà Lạt - Lâm Đồng', '22 Bui Thi Xuan St, Da Lat City, Lam Dong Province', 1407382973, 1407382973, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE IF NOT EXISTS `route` (
`route_id` int(11) NOT NULL,
  `route_name_vi` varchar(255) NOT NULL,
  `route_name_safe_vi` varchar(255) NOT NULL,
  `route_name_en` varchar(255) NOT NULL,
  `route_name_safe_en` varchar(255) NOT NULL,
  `hot` tinyint(1) NOT NULL,
  `description` varchar(255) NOT NULL,
  `tinh_id_start` int(11) NOT NULL,
  `tinh_id_end` int(11) NOT NULL,
  `distance` varchar(100) DEFAULT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `creation_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`route_id`, `route_name_vi`, `route_name_safe_vi`, `route_name_en`, `route_name_safe_en`, `hot`, `description`, `tinh_id_start`, `tinh_id_end`, `distance`, `duration`, `creation_time`, `update_time`, `status`, `user_id`) VALUES
(1, 'Sài Gòn - Hà Nội', 'sai-gon-ha-noi', 'Sai Gon - Ha Noi', 'sai-gon-ha-noi', 0, 'Tuyến xe từ Sài Gòn đi Hà Nội.', 12, 26, '0', '', 1406084756, 1406341967, 0, 0),
(3, 'Sài Gòn - Khánh Hòa', 'sai-gon-khanh-hoa', 'Sai Gon - Nha Trang', 'sai-gon-nha-trang', 1, 'Chuyến xe từ Sài gòn đi Khánh Hòa\r\n', 1, 9, '1000', '6 gio', 1406085862, 1407379359, 1, 1),
(4, 'Sài Gòn - Phan Thiết, Bình Thuận', 'sai-gon-phan-thiet-binh-thuan', 'Sài Gòn - Phan Thiết, Bình Thuận', 'sai-gon-phan-thiet-binh-thuan', 0, 'Chuyến xe SG đi Phan Thiết\r\n', 1, 13, '0', '', 1406087441, 1406567220, 1, 0),
(5, 'Hà Nội - Thái Bình', 'ha-noi-thai-binh', 'Hà Nội - Thái Bình', 'ha-noi-thai-binh', 0, 'Hà Nội đi Thái Bình', 32, 33, '0', '', 1406087578, 1406102278, 0, 0),
(6, 'Hà Nội - Quảng Ninh', 'ha-noi-quang-ninh', 'Hà Nội - Quảng Ninh', 'ha-noi-quang-ninh', 0, 'Hà Nội đi Quảng Ninh', 16, 16, '', '', 1406087650, 1407379366, 1, 1),
(7, 'Sài Gòn - Hà Nội', 'sai-gon-ha-noi', 'Sài Gòn - Hà Nội', 'sai-gon-ha-noi', 1, 'SG di HN', 1, 14, '0', '', 1406567574, 1406617742, 1, 0),
(8, 'Sài Gòn - Cần Thơ', 'sai-gon-can-tho', 'Sài Gòn - Cần Thơ', 'sai-gon-can-tho', 1, 'Sài Gòn - Cần Thơ', 1, 2, '0', '', 1406567609, 1406567609, 1, 0),
(9, 'Sài Gòn - Đà Lạt', 'sai-gon-da-lat', 'Sài Gòn - Đà Lạt', 'sai-gon-da-lat', 1, 'Sài Gòn - Đà Lạt', 1, 11, '0', '', 1406567671, 1406567671, 1, 0),
(10, 'Hà Nội - Đà Nẵng', 'ha-noi-da-nang', 'Hà Nội - Đà Nẵng', 'ha-noi-da-nang', 1, 'Hà Nội - Đà Nẵng', 14, 7, '0', '', 1406567702, 1406567702, 1, 0),
(11, 'Sài Gòn - Đà Nẵng', 'sai-gon-da-nang', 'Sài Gòn - Đà Nẵng', 'sai-gon-da-nang', 1, 'Sài Gòn - Đà Nẵng', 1, 7, '0', '', 1406567744, 1406567744, 1, 0),
(12, 'Huế - Hà Nội', 'hue-ha-noi', 'Huế - Hà Nội', 'hue-ha-noi', 0, 'Huế - Hà Nội', 10, 14, '0', '', 1406567865, 1406567865, 1, 0),
(13, 'sai gòn - nha trang', 'sai-gon-nha-trang', 'sai gon - nha trang', 'sai-gon-nha-trang', 1, 'quân\r\n', 1, 9, '0', '', 1407212334, 1407212334, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
`service_id` int(11) NOT NULL,
  `service_name_vi` varchar(255) NOT NULL,
  `service_name_safe_vi` varchar(255) DEFAULT NULL,
  `service_name_en` varchar(255) NOT NULL,
  `service_name_safe_en` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `creation_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name_vi`, `service_name_safe_vi`, `service_name_en`, `service_name_safe_en`, `image_url`, `creation_time`, `update_time`, `status`, `user_id`) VALUES
(1, 'Nước uống', 'nuoc-uong', 'Water', 'water', NULL, 1406080116, 1407309729, 1, 1),
(2, 'Wifi', 'wifi', 'Wifi', 'wifi', NULL, 1406080167, 1406080167, 1, 0),
(3, 'Khăn lạnh', 'khan-lanh', 'Cold towel', 'cold-towel', NULL, 1406080198, 1407309708, 1, 1),
(4, 'Chăn', 'chan', 'Blanket', 'blanket', NULL, 1407309693, 1407309693, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `service_ticket`
--

CREATE TABLE IF NOT EXISTS `service_ticket` (
  `ticket_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
`ticket_id` int(11) NOT NULL,
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
  `key_all` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `time_start`
--

CREATE TABLE IF NOT EXISTS `time_start` (
`time_id` int(11) NOT NULL,
  `time_start` varchar(255) NOT NULL,
  `time_start_safe` varchar(255) NOT NULL,
  `creation_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `time_start`
--

INSERT INTO `time_start` (`time_id`, `time_start`, `time_start_safe`, `creation_time`, `update_time`, `status`) VALUES
(1, '00:30', '', 1406078587, 1407309110, 1),
(2, '01:00', '', 1406078610, 1407309120, 1),
(3, '01:30', '', 1406078650, 1407309129, 1),
(4, '02:00', '', 1406078692, 1407309139, 1),
(5, '02:30', '', 1406078810, 1407309149, 1),
(6, '03:00', '', 1406078818, 1407309160, 1),
(9, '03:30', '', 1407308776, 1407309174, 1),
(10, '04:00', '', 1407308852, 1407309181, 1),
(11, '04:30', '', 1407309202, 1407309202, 1),
(12, '05:00', '', 1407309209, 1407309209, 1),
(13, '05:30', '', 1407309217, 1407309217, 1),
(14, '06:00', '', 1407309226, 1407309226, 1),
(15, '06:30', '', 1407309236, 1407309236, 1),
(16, '07:00', '', 1407309245, 1407309245, 1),
(17, '07:30', '', 1407309253, 1407309253, 1),
(18, '08:00', '', 1407309265, 1407309265, 1),
(19, '08:30', '', 1407309275, 1407309275, 1),
(20, '09:00', '', 1407309282, 1407309282, 1),
(21, '09:30', '', 1407309294, 1407309294, 1),
(22, '10:00', '', 1407309305, 1407309305, 1),
(23, '10:30', '', 1407309311, 1407309311, 1),
(24, '11:00', '', 1407309325, 1407309325, 1),
(25, '11:30', '', 1407309340, 1407309340, 1),
(26, '12:00', '', 1407309346, 1407309346, 1),
(27, '12:30', '', 1407309360, 1407309360, 1),
(28, '13:00', '', 1407309367, 1407309367, 1),
(29, '13:30', '', 1407309374, 1407309374, 1),
(30, '14:00', '', 1407309381, 1407309381, 1),
(31, '14:30', '', 1407309395, 1407309395, 1),
(32, '15:00', '', 1407309406, 1407309406, 1),
(33, '15:30', '', 1407309413, 1407309413, 1),
(34, '16:00', '', 1407309421, 1407309421, 1),
(35, '16:30', '', 1407309430, 1407309430, 1),
(36, '17:00', '', 1407309446, 1407309446, 1),
(37, '17:30', '', 1407309465, 1407309465, 1),
(38, '18:00', '', 1407309475, 1407309475, 1),
(39, '18:30', '', 1407309487, 1407309487, 1),
(40, '19:00', '', 1407309494, 1407309494, 1),
(41, '19:30', '', 1407309500, 1407309500, 1),
(42, '20:00', '', 1407309507, 1407309507, 1),
(43, '20:30', '', 1407309514, 1407309514, 1),
(44, '21:00', '', 1407309520, 1407309520, 1),
(45, '21:30', '', 1407309527, 1407309527, 1),
(46, '22:00', '', 1407309535, 1407309535, 1),
(47, '22:30', '', 1407309599, 1407309599, 1),
(48, '23:00', '', 1407309605, 1407309605, 1),
(49, '23:30', '', 1407309610, 1407309610, 1),
(50, '24:00', '', 1407309639, 1407309639, 1);

-- --------------------------------------------------------

--
-- Table structure for table `time_ticket`
--

CREATE TABLE IF NOT EXISTS `time_ticket` (
  `ticket_id` int(11) NOT NULL,
  `time_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tinh`
--

CREATE TABLE IF NOT EXISTS `tinh` (
`tinh_id` int(11) NOT NULL,
  `tinh_name_vi` varchar(255) NOT NULL,
  `tinh_name_safe_vi` varchar(255) NOT NULL,
  `tinh_name_en` varchar(255) NOT NULL,
  `tinh_name_safe_en` varchar(255) NOT NULL,
  `mien_id` tinyint(4) NOT NULL COMMENT '1: Mien Nam 2 : Trung - Tay Nguyen 3 : Mien Bac',
  `hot` tinyint(1) NOT NULL DEFAULT '0',
  `image_url` varchar(255) DEFAULT NULL,
  `price_between` varchar(100) DEFAULT NULL,
  `display_order` int(11) NOT NULL,
  `creation_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `tinh`
--

INSERT INTO `tinh` (`tinh_id`, `tinh_name_vi`, `tinh_name_safe_vi`, `tinh_name_en`, `tinh_name_safe_en`, `mien_id`, `hot`, `image_url`, `price_between`, `display_order`, `creation_time`, `update_time`, `status`, `user_id`) VALUES
(1, 'Sài Gòn', 'sai-gon', 'Sài Gòn', 'sai-gon', 1, 1, NULL, NULL, 1, 1406428915, 1406446027, 1, 0),
(2, 'Cần Thơ', 'can-tho', 'Can Tho', 'can-tho', 1, 1, NULL, NULL, 1, 1406429550, 1406429707, 1, 0),
(3, 'Bà Rịa - Vũng Tàu', 'ba-ria-vung-tau', 'Bà Rịa - Vũng Tàu', 'ba-ria-vung-tau', 1, 1, '', '', 1, 1406429724, 1406429724, 1, 0),
(4, 'Cà Mau', 'ca-mau', 'Ca Mau', 'ca-mau', 1, 0, '', '', 1, 1406429739, 1406429739, 1, 0),
(5, 'An Giang', 'an-giang', 'An Giang', 'an-giang', 1, 0, '', '', 1, 1406430542, 1406430542, 1, 0),
(6, 'Bạc Liêu', 'bac-lieu', 'Bac Lieu', 'bac-lieu', 1, 0, '', '', 1, 1406430564, 1406430564, 1, 0),
(7, 'Đà Nẵng', 'da-nang', 'Da Nang', 'da-nang', 2, 1, '', '', 1, 1406430592, 1406430592, 1, 0),
(8, 'Quãng Ngãi', 'quang-ngai', 'Quang Ngai', 'quang-ngai', 2, 1, '', '', 1, 1406430607, 1406430607, 1, 0),
(9, 'Khánh Hòa', 'khanh-hoa', 'Khanh Hoa', 'khanh-hoa', 2, 1, '', '', 1, 1406430629, 1406430629, 1, 0),
(10, 'Thừa Thiên - Huế', 'thua-thien-hue', 'Thua Thien - Hue', 'thua-thien-hue', 2, 1, '', '', 1, 1406430655, 1406430655, 1, 0),
(11, 'Lâm Đồng', 'lam-dong', 'Lam Dong', 'lam-dong', 2, 0, '', '', 1, 1406430672, 1406430672, 1, 0),
(12, 'Bình Định', 'binh-dinh', 'Binh Dinh', 'binh-dinh', 2, 0, '', '', 1, 1406430688, 1406430688, 1, 0),
(13, 'Bình Thuận', 'binh-thuan', 'Binh Thuan', 'binh-thuan', 2, 0, '', '', 1, 1406430703, 1406430703, 1, 0),
(14, 'Hà Nội', 'ha-noi', 'Ha Noi', 'ha-noi', 3, 1, '', '', 1, 1406430724, 1406430724, 1, 0),
(15, 'Hải Phòng', 'hai-phong', 'Hai Phong', 'hai-phong', 3, 1, '', '', 1, 1406430741, 1406430741, 1, 0),
(16, 'Quảng Ninh', 'quang-ninh', 'Quang Ninh', 'quang-ninh', 3, 1, '', '', 1, 1406430757, 1406430757, 1, 0),
(17, 'Thái Nguyên', 'thai-nguyen', 'Thai Nguyen', 'thai-nguyen', 3, 1, '', '', 1, 1406430771, 1406430771, 1, 0),
(18, 'Bắc Giang', 'bac-giang', 'Bac Giang', 'bac-giang', 3, 0, '', '', 1, 1406430786, 1406430786, 1, 0),
(19, 'Bắc Kạn', 'bac-kan', 'Bac Kan', 'bac-kan', 3, 0, '', '', 1, 1406430808, 1406430808, 1, 0),
(20, 'Thái Bình', 'thai-binh', 'Thai Binh', 'thai-binh', 3, 0, '', '', 1, 1406433647, 1406433647, 1, 0),
(21, 'sài gòn', 'sai-gon', 'sai gon', 'sai-gon', 1, 0, '', '', 1, 1407221781, 1407221781, 1, 0),
(22, 'Test', 'test', 'asdas', 'asdas', 1, 0, '', '', 1, 1407383801, 1407383807, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `group_id` tinyint(4) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `creation_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `group_id`, `fullname`, `creation_time`, `update_time`, `status`) VALUES
(1, 'admin@onbus.vn', 'd6202b4ffd43a1dfdf9b3215c4d66e7e', 1, 'Admin', 1406725726, 1406728008, 1),
(10, 'dienth@onbus.vn', '8c13b5750412d922b01b2da95d24f8b6', 2, 'Hoàng Điển', 1406725726, 1406725792, 1),
(11, 'hoangnh@onbus.vn', '851eec1df720cab32b54a2241942d6ad', 2, 'Huy Hoàng', 1406725899, 1406725899, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
 ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
 ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `car_type`
--
ALTER TABLE `car_type`
 ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
 ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
 ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
 ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `nhaxe`
--
ALTER TABLE `nhaxe`
 ADD PRIMARY KEY (`nhaxe_id`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
 ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
 ADD PRIMARY KEY (`route_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
 ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `service_ticket`
--
ALTER TABLE `service_ticket`
 ADD PRIMARY KEY (`ticket_id`,`service_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
 ADD PRIMARY KEY (`ticket_id`);

--
-- Indexes for table `time_start`
--
ALTER TABLE `time_start`
 ADD PRIMARY KEY (`time_id`);

--
-- Indexes for table `time_ticket`
--
ALTER TABLE `time_ticket`
 ADD PRIMARY KEY (`ticket_id`,`time_id`);

--
-- Indexes for table `tinh`
--
ALTER TABLE `tinh`
 ADD PRIMARY KEY (`tinh_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `car_type`
--
ALTER TABLE `car_type`
MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nhaxe`
--
ALTER TABLE `nhaxe`
MODIFY `nhaxe_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
MODIFY `route_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `time_start`
--
ALTER TABLE `time_start`
MODIFY `time_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `tinh`
--
ALTER TABLE `tinh`
MODIFY `tinh_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
