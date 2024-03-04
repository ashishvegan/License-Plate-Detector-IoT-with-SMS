-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 27, 2022 at 04:01 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `license_plate`
--

-- --------------------------------------------------------

--
-- Table structure for table `detected_records`
--

DROP TABLE IF EXISTS `detected_records`;
CREATE TABLE IF NOT EXISTS `detected_records` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rowid` varchar(255) NOT NULL,
  `license` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `fine` varchar(255) NOT NULL,
  `chassis_no` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `govrecords` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detected_records`
--

INSERT INTO `detected_records` (`id`, `rowid`, `license`, `owner`, `address`, `fine`, `chassis_no`, `time`, `date`, `govrecords`) VALUES
(4, '6383056ba21f0', 'MH31FU3238', 'Ashish Vegan', 'Dabha, Nagpur', '1200', 'M2514FT7895214', '12:06 pm', '27-11-2022', 1),
(3, '6383056ae048e', 'MH31FU3238', 'Ashish Vegan', 'Dabha, Nagpur', '1200', 'M2514FT7895214', '12:06 pm', '27-11-2022', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gov_records`
--

DROP TABLE IF EXISTS `gov_records`;
CREATE TABLE IF NOT EXISTS `gov_records` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `license` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `chassis_no` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gov_records`
--

INSERT INTO `gov_records` (`id`, `license`, `owner`, `address`, `chassis_no`) VALUES
(1, 'MH31FU3238', 'Ashish Vegan', 'Dabha, Nagpur', 'M2514FT7895214');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(3, 'Ashish Vegan', 'ashishvegan@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964'),
(4, 'Testing', 'testing@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
