-- phpMyAdmin SQL Dump
-- version 4.0.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 09, 2015 at 03:18 AM
-- Server version: 5.5.33
-- PHP Version: 5.3.24
-- Microsoft IIS 6.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tradingpost`
--
CREATE DATABASE IF NOT EXISTS `tradingpost` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `tradingpost`;

-- --------------------------------------------------------

--
-- Table structure for table `laf`
--

CREATE TABLE IF NOT EXISTS `laf` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `itemtitle` varchar(45) DEFAULT NULL,
  `poster` varchar(45) DEFAULT NULL,
  `postermail` varchar(45) DEFAULT NULL,
  `phone` varchar(14) DEFAULT NULL,
  `description` text,
  `imageurl` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `purgatory`
--

CREATE TABLE IF NOT EXISTS `purgatory` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `itemtitle` varchar(45) DEFAULT NULL,
  `poster` varchar(45) DEFAULT NULL,
  `postermail` varchar(45) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `description` text,
  `imageurl` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tpfinal`
--

CREATE TABLE IF NOT EXISTS `tpfinal` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `itemtitle` varchar(45) DEFAULT NULL,
  `poster` varchar(45) DEFAULT NULL,
  `postermail` varchar(45) DEFAULT NULL,
  `phone` varchar(14) DEFAULT NULL,
  `description` text,
  `imageurl` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
