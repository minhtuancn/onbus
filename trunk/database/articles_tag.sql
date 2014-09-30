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
-- Table structure for table `articles_tag`
-- 

CREATE TABLE `articles_tag` (
  `article_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `lang` char(2) NOT NULL,
  PRIMARY KEY  (`article_id`,`tag_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `articles_tag`
-- 

INSERT INTO `articles_tag` VALUES (33, 1, '1');
INSERT INTO `articles_tag` VALUES (33, 2, '1');
INSERT INTO `articles_tag` VALUES (33, 3, '1');
