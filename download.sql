-- phpMyAdmin SQL Dump
-- version 4.0.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 05, 2013 at 10:16 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `download`
--
CREATE DATABASE IF NOT EXISTS `download` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `download`;

-- --------------------------------------------------------

--
-- Table structure for table `upimages`
--

CREATE TABLE IF NOT EXISTS `upimages` (
  `uname` varchar(100) NOT NULL,
  `status` int(50) NOT NULL,
  `uploaded` varchar(500) NOT NULL,
  `ImageSize` varchar(100) NOT NULL,
  `downloaded` varchar(500) NOT NULL,
  `uptime` int(11) NOT NULL,
  `downtime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upimages`
--

INSERT INTO `upimages` (`uname`, `status`, `uploaded`, `ImageSize`, `downloaded`, `uptime`, `downtime`) VALUES
('a', 0, '3_300x300.jpg', '13193', '', 1375323487, 0),
('a', 0, '3_300x300.jpg', '13193', '', 1375323662, 0),
('a', 0, 'big_buck_bunny.webm', '5071076', '', 1375323903, 0),
('a', 0, 'How to use your VPS for proxy browsing instead of a VPN_files 2.zip', '1065597', '', 1375323917, 0),
('a', 0, 'big_buck_bunny.webm', '5071076', '', 1375328577, 0),
('a', 0, 'How to use your VPS for proxy browsing instead of a VPN_files 2.zip', '1065597', '', 1375328584, 0),
('a', 0, 'mini.png', '14030', '', 1375328590, 0),
('a', 0, '3_300x300.jpg', '13193', '', 1375328803, 0),
('a', 0, 'mini.png', '14030', '', 1375328804, 0),
('a', 0, 'mini.png', '14030', '', 1375328806, 0),
('a', 0, '3_300x300.jpg', '13193', '', 1375329670, 0),
('a', 0, '3_300x300.jpg', '13193', '', 1375335138, 0),
('a', 0, '3_300x300.jpg', '13193', '', 1375335242, 0),
('a', 0, '3_300x300.jpg', '13193', '', 1375335280, 0),
('a', 0, '3_300x300.jpg', '13193', '', 1375336713, 0),
('a', 0, '3_300x300.jpg', '13193', '', 1375336718, 0),
('a', 0, '3_300x300.jpg', '13193', '', 1375336832, 0),
('a', 0, '3_300x300.jpg', '13193', '', 1375336979, 0),
('a', 0, '3_300x300.jpg', '13193', '', 1375337547, 0),
('a', 0, '3_300x300.jpg', '13193', '', 1375337567, 0),
('a', 0, '3_300x300.jpg', '13193', '', 1375337797, 0),
('a', 0, '3_300x300.jpg', '13193', '', 1375338288, 0),
('a', 0, '3_300x300.jpg', '13193', '', 1375338918, 0),
('a', 0, '3_300x300.jpg', '13193', '', 1375338939, 0),
('a', 0, '3_300x300.jpg', '13193', '', 1375338960, 0),
('a', 0, '3_300x300.jpg', '13193', '', 1375340528, 0),
('a', 0, 'image.jpeg', '13193', '', 1375340606, 0),
('a', 0, 'image.jpeg', '13193', '', 1375340630, 0),
('a', 0, 'image.jpeg', '13193', '', 1375340656, 0),
('a', 0, 'image.jpeg', '13193', '', 1375340672, 0),
('a', 0, 'image.jpeg', '13193', '', 1375340676, 0),
('a', 0, 'image.jpeg', '13193', '', 1375340690, 0),
('a', 0, '3_300x300.jpg', '13193', '', 1375341962, 0),
('a', 0, '3_300x300.jpg', '13193', '', 1375342034, 0),
('a', 0, '3_300x300.jpg', '13193', '', 1375342079, 0),
('a', 0, '3_300x300.jpg', '13193', '', 1375342085, 0),
('a', 0, '3_300x300.jpg', '13193', '', 1375342206, 0),
('a', 0, 'image.jpeg', '13193', '', 1375342213, 0),
('a', 0, '3_300x300.jpg', '13193', '', 1375342316, 0),
('a', 0, 'big_buck_bunny.webm', '5071076', '', 1375342410, 0),
('a', 0, 'big_buck_bunny.webm', '5071076', '', 1375342473, 0),
('a', 0, 'big_buck_bunny.webm', '5071076', '', 1375343167, 0),
('a', 0, '3_300x300.jpg', '13193', '', 1375343247, 0),
('a', 0, '3_300x300.jpg', '13193', '', 1375343457, 0),
('a', 0, '3_300x300.jpg', '13193', '', 1375343821, 0),
('a', 0, '3_300x300.jpg', '13193', '', 1375343837, 0),
('a', 0, '3_300x300.jpg', '13193', '', 1375343931, 0),
('a', 0, '3_300x300.jpg', '13193', '', 1375343978, 0),
('a', 0, '3_300x300.jpg', '13193', '', 1375344106, 0),
('a', 0, '3_300x300.jpg', '13193', '', 1375344125, 0),
('a', 0, '3_300x300.jpg', '13193', '', 1375345457, 0),
('a', 0, 'big_buck_bunny.webm', '5071076', '', 1375345458, 0),
('a', 0, 'decrease.png', '1595', '', 1375345460, 0),
('a', 0, 'earth.ogv', '16637752', '', 1375345461, 0),
('a', 0, '12.jpg', '406720', '', 1375408706, 0),
('a', 1, '1.jpg', '731910', '', 1375408707, 0),
('a', 0, '1_850x850.jpg', '12048', '', 1375408709, 0),
('a', 0, '???? 2013-06-27 ??2.02.27.png', '48002', '', 1375409034, 0),
('a', 0, '???? 2013-06-14 ??11.18.24.png', '80848', '', 1375409036, 0),
('a', 0, '???? 2013-07-05 ??1.39.43.png', '26750', '', 1375409037, 0),
('a', 0, '???? 2013-07-05 ??1.39.43.png', '26750', '', 1375409039, 0),
('a', 0, '???? 2013-07-06 ??9.36.19.png', '355674', '', 1375409041, 0),
('a', 1, '8834332_201211241942180109.jpg', '155762', '', 1375409081, 0),
('a', 1, '14.png', '77106', '', 1375409083, 0),
('a', 1, '12.jpg', '406720', '', 1375409087, 0),
('a', 0, '???? 2013-07-29 ??10.56.51.png', '27340', '', 1375410249, 0),
('a', 1, 'a.jpg', '131444', '', 1375410252, 0),
('a', 1, 'Who Visited You.jpg', '95796', '', 1375410253, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `pword` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `uname` varchar(100) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `uname` (`uname`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `pword`, `fname`, `lname`, `email`, `uname`) VALUES
(1, '0cc175b9c0f1b6a831c399e269772661', 'a', 'a', 'a', 'a'),
(3, '92eb5ffee6ae2fec3ad71c777531578f', 'b', 'b', 'b@gmail.com', 'b'),
(5, '0cc175b9c0f1b6a831c399e269772661', 'a', 'a', 'c', 'c'),
(6, '0cc175b9c0f1b6a831c399e269772661', 'a', 'a', 'k', 'k'),
(8, '11a1bc23da9bcc6b9a492797f6ae829a', 'asasas', 'asasas', 'g', 'g'),
(9, '9f81ab4f8dc429c593f9f331f591aabd', 'sasas', 'sasa', 'g@gmail.com', 'sasas');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
