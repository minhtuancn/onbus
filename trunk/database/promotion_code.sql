-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Sep 18, 2014 at 05:50 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `onbus`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `promotion_code`
-- 

CREATE TABLE `promotion_code` (
  `code_id` int(11) NOT NULL auto_increment,
  `code` varchar(20) NOT NULL,
  `amount` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `code_value` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY  (`code_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `promotion_code`
-- 

INSERT INTO `promotion_code` VALUES (1, 'OBKUE', 2, 1, '30', 2);
