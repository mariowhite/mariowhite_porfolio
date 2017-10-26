-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2015 at 02:51 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `stdenis`
--

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
  `ticketNumber` int(11) NOT NULL,
  `timeIn` time NOT NULL,
  `timeOut` time NOT NULL,
  `price` int(11) NOT NULL,
  `date` date NOT NULL,
  `username` varchar(30) NOT NULL,
  `complete` tinyint(1) NOT NULL,
  PRIMARY KEY (`ticketNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticketNumber`, `timeIn`, `timeOut`, `price`, `date`, `username`, `complete`) VALUES
(5, '02:01:21', '02:16:38', 5, '2015-10-30', 'mario', 1),
(123, '01:04:24', '02:00:40', 5, '2015-10-30', 'mario', 1),
(124, '01:04:32', '01:59:27', 5, '2015-10-30', 'mario', 1),
(125, '01:04:36', '04:00:01', 10, '2015-10-30', 'mario', 1),
(3333, '01:20:09', '01:59:19', 5, '2015-10-30', 'mario', 1),
(12345, '13:05:10', '15:03:07', 10, '2015-10-28', 'mario', 0),
(34555, '01:19:11', '01:59:24', 5, '2015-10-30', 'mario', 1),
(55555, '02:00:53', '01:00:02', 10, '2015-10-30', 'mario', 1),
(234555, '03:55:41', '04:00:03', 10, '2015-10-29', 'mario', 0),
(444444, '01:59:41', '01:00:01', 10, '2015-10-30', 'mario', 1),
(1111111, '02:19:12', '01:00:02', 0, '2015-10-30', 'mario', 0),
(1234567, '03:59:00', '04:00:03', 10, '2015-10-29', 'mario', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `memberSince` date NOT NULL,
  `comments` text NOT NULL,
  `language` varchar(30) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `type`, `firstName`, `lastName`, `memberSince`, `comments`, `language`) VALUES
('admin', 'admin', 'Admin', 'Administrator', 'Administrator', '2015-10-29', 'No comments', 'English'),
('mario', 'mario', 'User', 'Mario Alejandro', 'Blanco', '2015-10-28', '', 'English');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
