-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 10, 2013 at 04:02 PM
-- Server version: 5.5.32-MariaDB
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ems`
--
CREATE DATABASE IF NOT EXISTS `ems` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ems`;

-- --------------------------------------------------------

--
-- Table structure for table `access_control`
--

CREATE TABLE IF NOT EXISTS `access_control` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `controller` varchar(20) NOT NULL,
  `function` varchar(20) NOT NULL,
  `nav_display` tinyint(1) NOT NULL DEFAULT '1',
  `sort_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `level_1` tinyint(1) DEFAULT NULL,
  `level_2` tinyint(1) DEFAULT NULL,
  `level_3` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `access_control`
--

INSERT INTO `access_control` (`id`, `controller`, `function`, `nav_display`, `sort_id`, `title`, `level_1`, `level_2`, `level_3`) VALUES
(1, 'client', 'add', 1, 2, 'Add a Client', 1, 0, 0),
(2, 'client', 'index', 1, 1, 'Overview', 1, 1, 1),
(3, 'about', 'developer', 1, 2, 'Developer', 1, 1, 1),
(4, 'about', 'index', 1, 1, 'Overview', 1, 1, 1),
(5, 'notice', 'index', 1, 1, 'Overview', 1, 1, 1),
(6, 'notice', 'add', 1, 2, 'Add a notice', 1, 0, 0),
(7, 'notice', 'view', 0, 1, 'View Notice', 1, 1, 1),
(8, 'notice', 'type', 0, 3, 'Notice by Type', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shortname` varchar(10) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `shortname` (`shortname`,`fullname`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `shortname`, `fullname`, `address`) VALUES
(1, 'care', 'Care International in Nepal', 'Dhobighat, Lalitpur');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `notice_content` text NOT NULL,
  `pinned` tinyint(1) NOT NULL,
  `reference` varchar(20) NOT NULL,
  `owner_id` int(30) NOT NULL,
  `timestamp` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`,`reference`),
  KEY `type_2` (`type`),
  KEY `type_3` (`type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `title`, `type`, `notice_content`, `pinned`, `reference`, `owner_id`, `timestamp`) VALUES
(2, 'Office Hours', 'firm', '<p>Dear Staffs,</p>\r\n\r\n<p>This is to inform you that the office hours has not been resumed back to be <b>10 AM to 5 PM</b>.<p> \r\n\r\n<p>Enjoy your hour of personal life.</p>\r\n\r\n<p>Administration,</p>\r\n<p>Dev Associates</p>', 1, '', 1, '2013-12-07 20:15:00'),
(3, '7th Anniversary', 'firm', '<p>Dear Staffs,</p>\r\n\r\n<p>The ACCA has called for the International Accounting Standards Board (IASB) and the Financial Accounting Standards Board (FASB) to abandon their converged proposal for lease accounting, which aims at bring leases on-balance sheet. ACCA said the current proposed right-of-use model will make accounting more complex and time consuming.<p> \r\n\r\n<p>Enjoy your hour of personal life.</p>\r\n\r\n<p>Administration,</p>\r\n<p>Dev Associates</p>', 1, '', 1, '2013-12-07 20:15:00'),
(4, 'No holidays for Pous', 'firm', '<p>Dear Staffs,</p>\r\n\r\n<p>This is to inform you that there shall be no holidays provided for the month of Poush. This is the time where we have a lot of clients to deal with. There are a lot of pending assignments, so no sms will be entertained.<p> \r\n\r\n<p>Hope to have your support during the month.</p>\r\n\r\n<p>Administration,</p>\r\n<p>Dev Associates</p>', 1, '', 1, '2013-12-07 20:15:00'),
(5, 'Office Hours', 'client', '<p>Dear Staffs,</p>\r\n\r\n<p>This is to inform you that the office hours has not been resumed back to be <b>10 AM to 5 PM</b>.<p> \r\n\r\n<p>Enjoy your hour of personal life.</p>\r\n\r\n<p>Administration,</p>\r\n<p>Dev Associates</p>', 1, '', 1, '2013-12-07 20:15:00'),
(6, '7th Anniversary', 'assignment', '<p>Dear Staffs,</p>\r\n\r\n<p>The ACCA has called for the International Accounting Standards Board (IASB) and the Financial Accounting Standards Board (FASB) to abandon their converged proposal for lease accounting, which aims at bring leases on-balance sheet. ACCA said the current proposed right-of-use model will make accounting more complex and time consuming.<p> \r\n\r\n<p>Enjoy your hour of personal life.</p>\r\n\r\n<p>Administration,</p>\r\n<p>Dev Associates</p>', 1, '', 1, '2013-12-07 20:15:00'),
(7, 'Office Hours', 'assignment', '<p>Dear Staffs,</p>\r\n\r\n<p>This is to inform you that the office hours has not been resumed back to be <b>10 AM to 5 PM</b>.<p> \r\n\r\n<p>Enjoy your hour of personal life.</p>\r\n\r\n<p>Administration,</p>\r\n<p>Dev Associates</p>', 1, '', 1, '2013-12-07 20:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_level` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `password`, `user_level`) VALUES
(1, 'manish', 'Manish', 'Bhattarai', 'Almunia24', 1),
(2, 'staff', 'Staff', 'Name', 'staffpassword', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
