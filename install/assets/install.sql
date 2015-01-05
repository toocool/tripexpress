


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
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



DROP TABLE IF EXISTS `destinations`;
CREATE TABLE IF NOT EXISTS `destinations` (
  `destination_id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(50) NOT NULL,
  `iso` varchar(3) NOT NULL,
  PRIMARY KEY (`destination_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `role`) VALUES
(1, 'John', 'Doe', 'admin', 'youremail@example.com', '2ab64f4ee279e5baf7ab7059b15e6d12', '0');


