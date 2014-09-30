-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Sep 30, 2014 at 09:57 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `onbus`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `tag`
-- 

CREATE TABLE `tag` (
  `tag_id` int(11) NOT NULL auto_increment,
  `tag_name` varchar(255) NOT NULL,
  `tag_name_kd` varchar(255) NOT NULL,
  `lang` tinyint(4) NOT NULL,
  PRIMARY KEY  (`tag_id`),
  FULLTEXT KEY `tag_name` (`tag_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `tag`
-- 

INSERT INTO `tag` VALUES (1, 'sdfsadf', 'sdfsadf', 1);
INSERT INTO `tag` VALUES (2, 'sdfsdaf', 'sdfsdaf', 1);
INSERT INTO `tag` VALUES (3, 'asd', 'asd', 1);
