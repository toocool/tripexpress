-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2014 at 05:20 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `trip_express`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `tour_id` int(11) NOT NULL,
  `client_firstname` varchar(50) NOT NULL,
  `client_lastname` varchar(50) NOT NULL,
  `identification_nr` varchar(166) NOT NULL,
  `booked_seats` int(2) NOT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `tour_id`, `client_firstname`, `client_lastname`, `identification_nr`, `booked_seats`) VALUES
(1, 4, 'shpetim', 'islami', '1701991473053', 3),
(2, 8, 'john', 'doe', '1701991483553', 1);

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

DROP TABLE IF EXISTS `destinations`;
CREATE TABLE IF NOT EXISTS `destinations` (
  `destination_id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(50) NOT NULL,
  `iso` varchar(3) NOT NULL,
  PRIMARY KEY (`destination_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`destination_id`, `city`, `iso`) VALUES
(1, 'Stuttgart', 'stu'),
(2, 'Berlin', 'ber'),
(3, 'Paris', 'par'),
(4, 'Hong Kong', 'hng'),
(8, 'Skopje', 'SKP');

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

DROP TABLE IF EXISTS `tours`;
CREATE TABLE IF NOT EXISTS `tours` (
  `tour_id` int(11) NOT NULL AUTO_INCREMENT,
  `from` int(50) NOT NULL,
  `to` int(50) NOT NULL,
  `from_start_time` datetime NOT NULL,
  `return_start_time` datetime NOT NULL,
  `available_seats` int(5) NOT NULL,
  `start_price` decimal(10,2) NOT NULL,
  `return_price` decimal(10,2) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`tour_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`tour_id`, `from`, `to`, `from_start_time`, `return_start_time`, `available_seats`, `start_price`, `return_price`, `date_created`) VALUES
(1, 1, 2, '2014-09-09 04:23:22', '2014-09-30 06:16:34', 50, 100.00, 180.00, '2014-08-31 22:00:00'),
(2, 8, 1, '2014-09-09 15:20:22', '2014-11-12 23:59:59', 48, 120.00, 200.00, '2014-08-31 22:00:00'),
(3, 2, 1, '2014-09-17 01:16:09', '2014-10-22 06:16:19', 35, 50.00, 80.00, '2014-08-31 22:00:00'),
(4, 1, 4, '1970-03-02 01:16:00', '1970-01-01 06:16:00', 10, 10.00, 80.00, '2014-09-20 05:48:06'),
(8, 1, 1, '2014-09-28 11:15:00', '2014-09-29 11:15:00', 22, 22.00, 22.00, '2014-09-20 06:16:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `username` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0 - Administrator, 1 - Worker, 2 - Reseller',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `role`) VALUES
(1, 'shpetim', 'islami', 'shpetim', 'shpetim@artlemon.de', '62fee300894a8b30ceaa998307f90728', '0'),
(2, 'John', 'Doe', 'worker', 'shpetim@githoster.com', '62fee300894a8b30ceaa998307f90728', '1'),
(3, 'John', 'Doe', 'reseller', 'shpetim.islami@gmail.com', '62fee300894a8b30ceaa998307f90728', '2'),
(10, 'pashd', 'pojhaspodj', 'shpei', 'shpetim@artlemon.de', '202cb962ac59075b964b07152d234b70', '0'),
(11, 'Shpetim', 'Islami', 'tsfsgsdgsd', 'shpetim@artlemon.de', '202cb962ac59075b964b07152d234b70', '1'),
(13, 'sysy', 'su', 'tripi', 'draodakum@gmail.com', '10f8767c2ccb71f2afafbc7ed19971bb', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
