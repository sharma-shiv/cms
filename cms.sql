                 -- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2016 at 05:58 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cover_image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0:deactivate 1:activate 2: pending',
  `delete_status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `user_id`, `title`, `cover_image`, `content`, `status`, `delete_status`) VALUES
(1, 1, 'new', '1462185996sports.jpg', 'this is test blog', 1, 0),
(6, 1, 'tytrytry', 'ASPdotNET_logofgf.jpg', 'tytry', 1, 1),
(9, 1, 'social', 'ASPdotNET_logo.png', 'company', 1, 0),
(11, 1, 'new', 'ASPdotNET_logofgf.jpg', 'asdsad', 1, 0),
(12, 1, 'new', 'ASPdotNET_logofgf.jpg', 'asdsad', 1, 0),
(13, 1, '', 'ASPdotNET_logofgf.jpg', '', 1, 1),
(14, 1, 'fsadfsadd', '1462184761', 'sdsadsa', 0, 0),
(15, 1, 'fdf', '', 'dfds', 1, 0),
(17, 1, 'fgf', '1462184861no-user.gif', 'gfdg', 0, 0),
(18, 1, 'fgf', '3.jpg', 'gfdg', 0, 0),
(20, 2, 'fghgh', 'ASPdotNET_logo.png', 'hfgh', 0, 0),
(21, 2, 'fghgh', '14621851804.png', 'hfgh', 1, 0),
(23, 1, 'admin blog', '1462185094Passport-Size-Photo_15_1457440865.jpg', 'it is created by admin', 0, 0),
(24, 2, 'bvb', 'ASPdotNET_logo.png', 'bvbv', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `page_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` int(11) DEFAULT NULL COMMENT '1:header 2:side_menu 3:',
  `weight` int(11) DEFAULT NULL COMMENT 'preferences',
  `content` varchar(1500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `delete_status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `alias`, `page_name`, `position`, `weight`, `content`, `delete_status`) VALUES
(1, NULL, 'new', NULL, NULL, 'sddsdsf', 0),
(3, NULL, 'Friends', NULL, NULL, 'ree', 0),
(5, NULL, 'Agriculture', NULL, NULL, 'fdggf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'it is send to activate user',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0 : deactivate 1: activate 2: pending',
  `active` tinyint(4) NOT NULL DEFAULT '0',
  `usertype` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=31 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `token`, `status`, `active`, `usertype`) VALUES
(1, 'admin', '12345678', NULL, NULL, 1, 0, 'admin'),
(2, 'stpl011', '12345678', 'gf@hgh.gfdg', 'welcome', 0, 0, 'user'),
(3, 'stpl011', '12345678', 'gf@hgh.gfdg', 'welcome', 0, 0, 'user'),
(4, 'stpl011', '12345678', 'gf@hgh.gfdg', 'welcome', 0, 0, 'user'),
(5, 'stpl011', '12345678', 'gf@hgh.gfdg', 'welcome', 0, 0, 'user'),
(6, 'stpl011', '12345678', 'rer@fdsf.ghfdg', 'welcome', 0, 0, 'user'),
(7, 'stpl011', '12345678', 'rer@fdsf.ghfdg', 'welcome', 0, 0, 'user'),
(8, 'stpl011', '12345678', 'rer@fdsf.ghfdg', 'welcome', 0, 0, 'user'),
(9, 'stpl011', '12345678', 'fdsfs@ghfdh.ghgfh', 'welcome', 0, 0, 'user'),
(10, 'stpl011', '12345678', 'fdsfs@ghfdh.ghgfh', 'welcome', 0, 0, 'user'),
(11, 'stpl011', '12345678', 'fdsfs@ghfdh.ghgfh', 'welcome', 0, 0, 'user'),
(12, 'stpl011', '12345678', 'retre@fgdf.fgh', 'welcome', 0, 0, 'user'),
(13, 'stpl011', '12345678', 'fdsfds@fdsf.dfgdf', 'welcome', 0, 0, 'user'),
(14, 'stpl011', '12345678', 'fdsfds@fdsf.dfgdf', 'welcome', 0, 0, 'user'),
(15, 'stpl011', '12345678', 'gfd@gdfg.ghfgh', 'welcome', 0, 0, 'user'),
(28, 'stpl011', '12345678', '', 'welcome', 0, 0, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `firstname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_pic` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `firstname`, `lastname`, `mobile`, `city`, `state`, `country`, `profile_pic`) VALUES
(1, 9, 'dsfdsf', 'fdsf', 0, '', '', '', ''),
(2, 11, 'dsfdsf', 'fdsf', 0, 'select', 'select', '', NULL),
(3, 12, 'ttrtr', 'tretret', 9878768787, 'select', 'select', '', NULL),
(4, 13, 'fdsfdsf', 'dsfdsfd', 8876876876, 'select', 'select', '', NULL),
(5, 14, 'fdsfdsf', 'dsfdsfd', 8876876876, 'select', 'select', '', NULL),
(6, 15, 'fgfdg', 'fdgdfgdf', 9887876887, 'select', 'select', 'select', NULL),
(7, 19, '', '', 0, '', '', '', ''),
(8, 20, '', '', 0, '', '', '', ''),
(9, 21, '', '', 0, '', '', '', ''),
(10, 22, '', '', 0, 'select', 'select', 'select', NULL),
(11, 23, '', '', 0, 'select', 'select', 'select', NULL),
(12, 24, '', '', 0, 'select', 'select', 'select', NULL),
(13, 25, '', '', 0, 'select', 'select', 'select', NULL),
(14, 26, '', '', 0, 'select', 'select', 'select', NULL),
(15, 27, '', '', 0, 'select', 'select', 'select', NULL),
(16, 28, '', '', 0, 'select', 'select', 'select', NULL),
(17, 29, '', '', 0, 'select', 'select', 'select', NULL),
(18, 30, '', '', 0, 'select', 'select', 'select', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

CREATE TABLE IF NOT EXISTS `user_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `login_time` timestamp NULL DEFAULT NULL,
  `logout_time` timestamp NULL DEFAULT NULL,
  `os` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `browser` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `website_settings`
--

CREATE TABLE IF NOT EXISTS `website_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
