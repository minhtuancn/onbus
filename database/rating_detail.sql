-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Sep 19, 2014 at 05:30 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `onbus`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `rating_detail`
-- 

CREATE TABLE `rating_detail` (
  `detail_id` int(11) NOT NULL auto_increment,
  `email_id` int(11) NOT NULL,
  `nhaxe_id` int(11) NOT NULL,
  `point1` tinyint(4) NOT NULL,
  `point2` tinyint(4) NOT NULL,
  `point3` tinyint(4) NOT NULL,
  `point4` tinyint(4) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `creation_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY  (`detail_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `rating_detail`
-- 

INSERT INTO `rating_detail` VALUES (1, 1, 19, 1, 2, 3, 4, 'Nguyen Hoang', 'hc,', 'Test 1', 'Chia sẻ cùng onbus về trải nghiệm trong hành trình du lịch', 1411162297, 1);
INSERT INTO `rating_detail` VALUES (2, 3, 19, 2, 3, 4, 5, 'Le HUy', 'hcm', 'Test 2', 'Chia sẻ cùng onbus về trải nghiệm trong hành trình du lịch xe khách của bạn tại Việt Na', 1411162328, 1);
INSERT INTO `rating_detail` VALUES (3, 4, 19, 3, 4, 5, 2, 'Tran tin', 'hcm', 'Tin test', 'Chia sẻ cùng onbus về trải nghiệm trong hành trình du lịch xe khách của bạn tại Việt Nam.', 1411162354, 1);
INSERT INTO `rating_detail` VALUES (4, 5, 19, 4, 5, 1, 2, 'Hua Quan', 'hcm', 'Quan test', 'Chia sẻ cùng onbus về trải nghiệm trong hành trình du lịch xe khách của bạn tại Việt Nam.', 1411162379, 1);
INSERT INTO `rating_detail` VALUES (5, 6, 19, 5, 1, 2, 3, 'TRuong Chuong', 'hcm', 'CHuong test', 'Chia sẻ cùng onbus về trải nghiệm trong hành trình du lịch xe khách của bạn tại Việt Nam', 1411162409, 1);
INSERT INTO `rating_detail` VALUES (6, 7, 19, 1, 2, 3, 4, 'Ten 2', 'hcm', 'Tets 2', 'Chia sẻ cùng onbus về trải nghiệm trong hành trình du lịch xe khách của bạn tại Việt Nam.', 1411164623, 1);
INSERT INTO `rating_detail` VALUES (7, 8, 19, 4, 4, 4, 4, 'Test 34', 'asgag', 'asfa', 'asfasfasfs', 1411164704, 1);
