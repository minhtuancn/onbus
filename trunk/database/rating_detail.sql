-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Sep 19, 2014 at 10:48 AM
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
  `point5` tinyint(4) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `creation_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY  (`detail_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `rating_detail`
-- 

