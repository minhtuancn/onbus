-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Jul 30, 2014 at 06:00 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `onbus`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `promotion`
-- 

CREATE TABLE `promotion` (
  `promotion_id` int(11) NOT NULL auto_increment,
  `title_vi` varchar(255) NOT NULL,
  `title_safe_vi` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `title_safe_en` varchar(255) NOT NULL,
  `description_vi` varchar(500) NOT NULL,
  `description_en` varchar(500) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `content_vi` text NOT NULL,
  `content_en` text NOT NULL,
  `hot` tinyint(1) NOT NULL,
  `creation_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY  (`promotion_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `promotion`
-- 

INSERT INTO `promotion` VALUES (1, 'sdfasdf', 'sdfasdf', 'sdfasd', 'sdfasd', 'sdfasd', 'sfadfasdf', '', 'asdfsadfasd', 'asdf', 1, 1406714212, 1406714212, 1);
