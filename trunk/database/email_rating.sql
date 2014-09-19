-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Sep 19, 2014 at 10:49 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `onbus`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `email_rating`
-- 

CREATE TABLE `email_rating` (
  `email_id` int(11) NOT NULL auto_increment,
  `email` varchar(255) NOT NULL,
  `send_time` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `nhaxe_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY  (`email_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `email_rating`
-- 

INSERT INTO `email_rating` VALUES (1, 'hoangnhonline@gmail.com', 1411146285, '8799abf9ba4b33b8ead80fc0a583566c', 19, 2);
