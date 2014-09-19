-- phpMyAdmin SQL Dump
-- version 4.2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 19, 2014 at 12:54 PM
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
-- Table structure for table `email_rating`
--

CREATE TABLE IF NOT EXISTS `email_rating` (
`email_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `send_time` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `nhaxe_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=71 ;

--
-- Dumping data for table `email_rating`
--

INSERT INTO `email_rating` (`email_id`, `email`, `send_time`, `code`, `nhaxe_id`, `status`) VALUES
(1, 'hoangnhonline@gmail.com', 1411146285, '8799abf9ba4b33b8ead80fc0a583566c', 19, 2),
(3, 'test1@gmail.com', 1411105216, 'b77af1a5c9f7e8d52b8d42c9eebc0a78', 19, 2),
(4, 'test2@gmail.com', 1411105216, '2c040d449a76b8d99f46c56912d3f24b', 19, 2),
(5, 'test3@gmail.com', 1411105216, '2ce582be93d9e03f713f29464159bcd7', 19, 2),
(6, 'test4@gmail.com', 1411105216, 'e188f2535ebb201930777f45153c1c90', 19, 2),
(7, 'test5@gmail.com', 1411105216, '77cc906aca3c2a65442e77513b2b630a', 19, 2),
(8, 'test6@gmail.com', 1411105216, '7099fa5f6ba0593253418df36b9a84aa', 19, 2),
(9, 'test7@gmail.com', 1411105216, '397962f391d521e7edefa56da2f7aa70', 19, 2),
(10, 'test8@gmail.com', 1411105216, '96e271f5123d77c4764d53cd426bbb26', 19, 2),
(11, 'test9@gmail.com', 1411105216, '0a326485b3fc303be97591e4fd1853fd', 19, 2),
(12, 'test10@gmail.com', 1411105216, '90de161709d974b09ecd6f06f5704967', 19, 2),
(13, 'test12@gmail.com', 1411105361, 'ab8853a2cd5ffe386084b33a99f1380b', 19, 2),
(14, 'test13@gmail.com', 1411105361, '2af9166525f159c6bf67f71fd5098473', 19, 2),
(15, 'test14@gmail.com', 1411105361, '766c8eacc1d2446b666111e28ac4a03b', 19, 2),
(16, 'test15@gmail.com', 1411105361, '2c621bafa93f59018eb5cd2caf36d970', 19, 2),
(17, 'test16@gmail.com', 1411105361, 'a16c5e28ac89b1562b3cf5ed44539be4', 19, 2),
(18, 'test17@gmail.com', 1411105361, 'a000c0c991e9f2cbde9d1a45f57ed0b0', 19, 2),
(19, 'test18@gmail.com', 1411105361, '9bf55d5950acf10f0804c51daa962b9e', 19, 2),
(20, 'test19@gmail.com', 1411105361, '162c022165f7e431c69a51e5260c5145', 19, 2),
(21, 'test20@gmail.com', 1411105361, 'a04e120c555caa49c72347df2a3a9edf', 19, 2),
(22, 'test21@gmail.com', 1411105361, '82b2c8e2616eef417cac642c307b18d9', 19, 2),
(23, 'test22@gmail.com', 1411105361, '7af38f3b542ba897256e86713ca6a957', 19, 2),
(24, 'test23@gmail.com', 1411105361, '0f00f8d1f00aca6b291717dbcc371dec', 19, 2),
(25, 'test24@gmail.com', 1411105361, '5ef96b4b2656d5ad942751faada99227', 19, 2),
(26, 'test25@gmail.com', 1411105361, 'bc8e9a48053de57bccad594135ba3d85', 19, 2),
(27, 'test26@gmail.com', 1411105361, 'e3a98b7da108ecacfd19ddb12da8be91', 19, 2),
(28, 'test27@gmail.com', 1411105361, '65429144b4b782b209666cf325d813e5', 19, 2),
(29, 'test28@gmail.com', 1411105361, '4d0522491efc5426a9b9b7469e7da944', 19, 2),
(30, 'test29@gmail.com', 1411105361, '54055f1c99d9912176f12d97a870aa69', 19, 2),
(31, 'test30@gmail.com', 1411105361, '92bbb855a731986e4bffe6b34bcb5742', 19, 2),
(32, 'test31@gmail.com', 1411105361, 'f1818dc8a72b74cb2d413a63f4021664', 19, 2),
(33, 'test32@gmail.com', 1411105361, 'c90af006ff00a4e75c4e3cab7eecb83d', 19, 2),
(34, 'test33@gmail.com', 1411105361, '668872414a1df256c49e9818fa0da253', 19, 2),
(35, 'test34@gmail.com', 1411105361, '535f4aeaf6ce9882ffb74065d063e088', 19, 2),
(36, 'test35@gmail.com', 1411105361, '54e83a909b7c792d56398e3300753006', 19, 2),
(37, 'test36@gmail.com', 1411105361, 'a2438001252fe9959400a96fdc10e486', 19, 2),
(38, 'test37@gmail.com', 1411105361, '6b3c9019964ebb287a5fde3e01fae1ad', 19, 2),
(39, 'test38@gmail.com', 1411105361, '409be6e5953f99c4f110f922ea103e8d', 19, 2),
(40, 'test39@gmail.com', 1411105361, '02bfc9eb587b37131b5534185c341bb0', 19, 2),
(41, 'test40@gmail.com', 1411105361, '8459d765c8fc29e5ea7ffbaf23287290', 19, 2),
(42, 'emailtest12@gmail.com', 1411105543, '499d8a7dadd101437ddfd07de010cfcb', 20, 2),
(43, 'emailtest13@gmail.com', 1411105543, '22febe5c7ed7452591b9bc3623cd7120', 20, 2),
(44, 'emailtest14@gmail.com', 1411105543, '47af41a8404c5bd0065709900004b323', 20, 2),
(45, 'emailtest15@gmail.com', 1411105543, 'e19a4d8f4fcb488089611f3ec8660032', 20, 2),
(46, 'emailtest16@gmail.com', 1411105543, '104442954dbae175dbea8ebb95343bd6', 20, 2),
(47, 'emailtest17@gmail.com', 1411105543, '3d722e3dd5794639e7fdcc13bf991bba', 20, 2),
(48, 'emailtest18@gmail.com', 1411105543, 'de3c27b28ec66bd9b5a99d2f11fbe040', 20, 2),
(49, 'emailtest19@gmail.com', 1411105543, 'a8e0a95fb6e5b1b26bf005f0d2b25576', 20, 2),
(50, 'emailtest20@gmail.com', 1411105543, '7eecf7084a5c78e5c7ea2f4016eeb34f', 20, 2),
(51, 'emailtest21@gmail.com', 1411105543, '28c53418da94f588284e4d7a61cb5629', 20, 2),
(52, 'emailtest22@gmail.com', 1411105543, '26db86e9cf28eb9c94567093be6b6ac4', 20, 2),
(53, 'emailtest23@gmail.com', 1411105543, '1a8362cde247e8216bcc3f178e102470', 20, 2),
(54, 'emailtest24@gmail.com', 1411105543, 'f323789974dd12f3511d2b3a781054a8', 20, 2),
(55, 'emailtest25@gmail.com', 1411105543, '23c567295e58d825376341e8a04402c1', 20, 2),
(56, 'emailtest26@gmail.com', 1411105543, 'ad529e36b6f6879fa89084b61fc6ca40', 20, 2),
(57, 'emailtest27@gmail.com', 1411105543, '76701e9f81717cd18307bd875fe0f277', 20, 2),
(58, 'emailtest28@gmail.com', 1411105543, '9bcbe759e50f1b68395c77cc6d7bbdfe', 20, 2),
(59, 'emailtest29@gmail.com', 1411105543, '30743272520052f6a0f88c5edef15789', 20, 2),
(60, 'emailtest30@gmail.com', 1411105543, '3f3de4cfe8ab27bcfe4cd39524391177', 20, 2),
(61, 'emailtest31@gmail.com', 1411105543, '58deb9dc9835ec0c034312218b843562', 20, 2),
(62, 'emailtest32@gmail.com', 1411105543, '58f21008a0b84507dd177947645127ad', 20, 2),
(63, 'emailtest33@gmail.com', 1411105543, '6860abb7f54f529d5af0ce77f70bb6fe', 20, 2),
(64, 'emailtest34@gmail.com', 1411105543, '855771da531ea5c69daa67a9dc3f5dbd', 20, 2),
(65, 'emailtest35@gmail.com', 1411105543, 'e59862889fe9304238785555857b99cf', 20, 2),
(66, 'emailtest36@gmail.com', 1411105543, '3c0a9e60bee3bffe74d50d23c126c6d6', 20, 2),
(67, 'emailtest37@gmail.com', 1411105543, '0a334cf533ef1a937097ebbb117964ce', 20, 2),
(68, 'emailtest38@gmail.com', 1411105543, '9f4130024b232758566a8190b900dba7', 20, 2),
(69, 'emailtest39@gmail.com', 1411105543, '147e1263626d499b50f466f28317d0de', 20, 2),
(70, 'emailtest40@gmail.com', 1411105543, 'c2dee25eaa067d4a1e8380853e6ea73b', 20, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `email_rating`
--
ALTER TABLE `email_rating`
 ADD PRIMARY KEY (`email_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `email_rating`
--
ALTER TABLE `email_rating`
MODIFY `email_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=71;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
