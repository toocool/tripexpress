SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `tour_id` int(11) NOT NULL,
  `tour_back_id` varchar(166) NOT NULL,
  `returning` enum('1','2') NOT NULL DEFAULT '1',
  `client_firstname` varchar(50) NOT NULL,
  `client_lastname` varchar(50) NOT NULL,
  `identification_nr` varchar(166) NOT NULL,
  `booked_seats` int(2) NOT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

INSERT INTO `bookings` (`booking_id`, `tour_id`, `tour_back_id`, `returning`, `client_firstname`, `client_lastname`, `identification_nr`, `booked_seats`) VALUES
(1, 3, '8', '1', 'shpetim', 'islami', '1701991483553', 3),
(2, 8, '0', '1', 'john', 'doe', '1701991483544', 9),
(6, 1, '3', '2', 'shpetim', 'islami', '1701991483553', 5);

DROP TABLE IF EXISTS `destinations`;
CREATE TABLE IF NOT EXISTS `destinations` (
  `destination_id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(50) NOT NULL,
  `iso` varchar(3) NOT NULL,
  PRIMARY KEY (`destination_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

INSERT INTO `destinations` (`destination_id`, `city`, `iso`) VALUES
(1, 'Stuttgart', 'stu'),
(2, 'Berlin', 'ber'),
(3, 'Paris', 'par'),
(4, 'Hong Kong', 'hng'),
(8, 'Skopje', 'SKP');

DROP TABLE IF EXISTS `tours`;
CREATE TABLE IF NOT EXISTS `tours` (
  `tour_id` int(11) NOT NULL AUTO_INCREMENT,
  `from` int(50) NOT NULL,
  `to` int(50) NOT NULL,
  `from_start_time` datetime NOT NULL,
  `available_seats` int(5) NOT NULL,
  `start_price` decimal(10,2) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`tour_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

INSERT INTO `tours` (`tour_id`, `from`, `to`, `from_start_time`, `available_seats`, `start_price`, `date_created`) VALUES
(1, 1, 2, '2015-02-26 04:23:22', 50, 100.00, '2014-11-18 08:37:00'),
(2, 8, 1, '2014-09-09 15:20:22', 48, 120.00, '2014-08-31 22:00:00'),
(3, 2, 1, '2015-07-31 01:16:09', 35, 50.00, '2014-11-18 13:54:14'),
(4, 1, 4, '1970-03-02 01:16:00', 10, 10.00, '2014-09-20 05:48:06'),
(8, 1, 2, '2016-01-22 11:15:00', 22, 22.00, '2014-11-19 22:06:09');

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

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `role`) VALUES
(1, 'shpetim', 'islami', 'shpetim', 'shpetim@artlemon.de', '62fee300894a8b30ceaa998307f90728', '0'),
(2, 'John', 'Doe', 'worker', 'shpetim@githoster.com', '62fee300894a8b30ceaa998307f90728', '1'),
(3, 'John', 'Doe', 'reseller', 'shpetim.islami@gmail.com', '62fee300894a8b30ceaa998307f90728', '2'),
(10, 'pashd', 'pojhaspodj', 'shpei', 'shpetim@artlemon.de', '202cb962ac59075b964b07152d234b70', '0'),
(11, 'Shpetim', 'Islami', 'tsfsgsdgsd', 'shpetim@artlemon.de', '202cb962ac59075b964b07152d234b70', '1'),
(13, 'sysy', 'su', 'tripi', 'draodakum@gmail.com', '10f8767c2ccb71f2afafbc7ed19971bb', '1');
