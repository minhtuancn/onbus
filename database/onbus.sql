-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Jul 20, 2014 at 11:47 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `onbus`
-- 

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
-- Table structure for table `hot_place`
-- 

CREATE TABLE `hot_place` (
  `hot_place_id` int(11) NOT NULL,
  `hot_place_vi` varchar(255) NOT NULL,
  `hot_place_safe_vi` varchar(255) NOT NULL,
  `hot_place_en` varchar(255) NOT NULL,
  `hot_place_safe_en` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `price_between` varchar(255) NOT NULL,
  `display_order` int(11) NOT NULL,
  `creation_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `hot_place`
-- 


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
-- Table structure for table `place`
-- 

CREATE TABLE `place` (
  `place_id` int(11) NOT NULL auto_increment,
  `place_name_vi` varchar(255) NOT NULL,
  `place_name_safe_vi` varchar(255) NOT NULL,
  `place_name_en` varchar(255) NOT NULL,
  `place_name_safe_en` varchar(255) NOT NULL,
  `creation_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY  (`place_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `place`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `route`
-- 

CREATE TABLE `route` (
  `route_id` int(11) NOT NULL auto_increment,
  `route_name` varchar(255) NOT NULL,
  `route_name_safe` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `place_id_start` int(11) NOT NULL,
  `place_id_end` int(11) NOT NULL,
  `creation_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY  (`route_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `route`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `services`
-- 

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_name_safe` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `creation_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `services`
-- 


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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `time_start`
-- 

