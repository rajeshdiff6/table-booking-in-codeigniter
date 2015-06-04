-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 01, 2013 at 06:02 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(100) NOT NULL,
  `ph` double NOT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY  (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`name`, `username`, `password`, `address`, `ph`, `user`) VALUES
('Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Bengaluru', 9123456789, 1),
('Ram Kumar', 'dfsadfdsaf', 'db26ee047a4c86fbd2fba73503feccb6', '', 3432424, 0),
('Ram Kumar', 'fadsfsafdsa', '4641999a7679fcaef2df0e26d11e3c72', '', 43242, 0),
('Raju', 'raju', '03c017f682085142f3b60f56673e22dc', 'Madurai', 9874563214, 0),
('Ram Kumar', 'ramkumar', '0911d1f883d425428fcfd5628ee3d68e', 'fadsfsafdsa', 43242, 0),
('Rani', 'rani', 'b9f81618db3b0d7a8be8fd904cca8b6a', 'fdsfddasf', 24324243, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `tableno` varchar(11) NOT NULL,
  `timein` datetime NOT NULL,
  `timeout` datetime NOT NULL,
  `recipe` varchar(50) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `smsno` double NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `tableno`, `timein`, `timeout`, `recipe`, `customer`, `smsno`) VALUES
(3, '9,10', '2013-06-22 13:56:31', '2013-06-22 14:56:31', 'Meals', 'Rani', 44790786),
(4, '1,2', '2013-06-20 13:59:08', '2013-06-20 14:59:08', 'Pitza', 'Rani', 34550241),
(5, '8,9', '2013-06-21 13:59:08', '2013-06-21 14:59:08', 'Burger', 'Rani', 42520976),
(6, '6,7', '2013-06-23 13:59:08', '2013-06-23 14:59:08', 'Idli', 'Rani', 37038029),
(7, '2,3', '2013-06-24 18:05:25', '2013-06-24 19:05:25', 'Dosa', 'Rani', 40909499),
(8, '3,8', '2013-06-30 23:13:08', '2013-07-01 00:13:08', 'Chicken 65', 'Rani', 35371719);
