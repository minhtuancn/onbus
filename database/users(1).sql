-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Jul 29, 2014 at 02:06 AM
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
  `idUser` int(11) NOT NULL auto_increment,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `group` tinyint(4) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`idUser`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

-- 
-- Dumping data for table `users`
-- 

INSERT INTO `users` VALUES (1, 'admin@onbus.vn', 'd6202b4ffd43a1dfdf9b3215c4d66e7e', 1, 'Admin', 1);
INSERT INTO `users` VALUES (10, 'admin@thepalmyhotel.vn', '8c13b5750412d922b01b2da95d24f8b6', 1, 'admin', 1);
