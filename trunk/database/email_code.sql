-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Sep 25, 2014 at 04:16 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `onbus`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `email_code`
-- 

CREATE TABLE `email_code` (
  `id` int(11) NOT NULL auto_increment,
  `email` varchar(255) NOT NULL,
  `code_id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `email_code`
-- 

INSERT INTO `email_code` VALUES (1, 'hoangnhonline@gmail.com', 1, 'OBKUE', 1);
INSERT INTO `email_code` VALUES (2, 'huynl@gmail.com', 1, 'OBKUE', 1);
INSERT INTO `email_code` VALUES (3, 'hoangnhonline@gmail.com', 4, 'ONTRUTIEN', 2);
