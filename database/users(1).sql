-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Jul 30, 2014 at 09:34 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `onbus`
-- 

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

INSERT INTO `users` VALUES (1, 'admin@onbus.vn', 'd6202b4ffd43a1dfdf9b3215c4d66e7e', 1, 'Admin', 1406725726, 1406725726, 1);
INSERT INTO `users` VALUES (10, 'dienth@onbus.vn', '8c13b5750412d922b01b2da95d24f8b6', 2, 'Hoàng Điển', 1406725726, 1406725792, 1);
INSERT INTO `users` VALUES (11, 'hoangnh@onbus.vn', '851eec1df720cab32b54a2241942d6ad', 2, 'Huy Hoàng', 1406725899, 1406725899, 1);
