-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2018 at 05:55 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nra`
--

-- --------------------------------------------------------

--
-- Table structure for table `allocation`
--

CREATE TABLE IF NOT EXISTS `allocation` (
  `resource` varchar(200) NOT NULL,
  `status` int(2) NOT NULL,
  `period` varchar(30) NOT NULL,
  `day` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `staff` varchar(200) NOT NULL,
  PRIMARY KEY (`period`,`day`,`year`,`staff`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allocation`
--

INSERT INTO `allocation` (`resource`, `status`, `period`, `day`, `year`, `dept`, `staff`) VALUES
('NETWORKING-LAB', 0, 'p1', 'Monday', '1', '', 'AIC'),
('CR3', 0, 'p1', 'Wednesday', '2', '', 'DEEPA'),
('VCS', 0, 'p2', 'Monday', '1', '', 'AIC'),
('CR3', 0, 'p2', 'Wednesday', '1', '', 'AIC'),
('PL-LAB', 0, 'p2', 'Wednesday', '1', '', 'DEEPA'),
('MM-LAB', 0, 'p3', 'Wednesday', 'I', '', 'DEEPA'),
('MM-LAB', 0, 'p8', 'Tuesday', 'I', '', 'DEEPA'),
('MM-LAB', 0, 'p8', 'Wednesday', '2', '', 'DEEPA');

-- --------------------------------------------------------

--
-- Table structure for table `lock`
--

CREATE TABLE IF NOT EXISTS `lock` (
  `id` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lock`
--

INSERT INTO `lock` (`id`, `pass`) VALUES
('AIC', '0987654321');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `dept` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `dept`) VALUES
('AIC', '12345', 'NEC'),
('DEEPA', 'wtlab', 'CP09');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `userid` varchar(50) NOT NULL COMMENT 'userid',
  `name` varchar(50) NOT NULL COMMENT 'name',
  `email` varchar(50) NOT NULL COMMENT 'email',
  `password` varchar(50) NOT NULL COMMENT 'password',
  `address` varchar(500) NOT NULL COMMENT 'address',
  `contact` varchar(50) NOT NULL COMMENT 'contact',
  `message` varchar(500) NOT NULL COMMENT 'Message',
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`userid`, `name`, `email`, `password`, `address`, `contact`, `message`) VALUES
('AbhijeetMuneshwar', 'Abhijeet Ashok Muneshwar', 'openingknots@gmail.com', 'ABHIJ33T@1', 'Sphurti Vihar, B wing, Survey no. 16, 4/3, 2nd floor, block no. 4, Ambegaon Pathar, Pune ? 411046.', '9174112881', 'asfaf'),
('Mohit', 'Abhijeet Ashok Muneshwar', 'openingknots@gmail.com', 'Mohit', 'Sphurti Vihar, B wing, Survey no. 16, 4/3, 2nd floor, block no. 4, Ambegaon Pathar, Pune ? 411046.', '9174112881', 'Hi !!\r\nHello\r\nHow are you ?'),
('suyash', 'Suyash', 'suyash@gmal.com', 'suyash', 'NITK', '7984561200', 'Hi');

-- --------------------------------------------------------

--
-- Table structure for table `resource`
--

CREATE TABLE IF NOT EXISTS `resource` (
  `selected_by` varchar(200) NOT NULL,
  `resource` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `p1` tinyint(1) NOT NULL,
  `p2` tinyint(1) NOT NULL,
  `p3` tinyint(1) NOT NULL,
  `p4` tinyint(1) NOT NULL,
  `p5` tinyint(1) NOT NULL,
  `p6` tinyint(1) NOT NULL,
  `p7` tinyint(1) NOT NULL,
  `p8` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
