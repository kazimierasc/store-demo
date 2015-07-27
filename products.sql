-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2015 at 11:57 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `store-demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 COLLATE utf8_lithuanian_ci NOT NULL,
  `brand` text CHARACTER SET utf8 COLLATE utf8_lithuanian_ci NOT NULL,
  `color` text CHARACTER SET utf8 COLLATE utf8_lithuanian_ci NOT NULL,
  `shape` text CHARACTER SET utf8 COLLATE utf8_lithuanian_ci NOT NULL,
  `length` text CHARACTER SET utf8 COLLATE utf8_lithuanian_ci NOT NULL,
  `size` text CHARACTER SET utf8 COLLATE utf8_lithuanian_ci NOT NULL,
  `price` int(11) NOT NULL,
  `description` mediumtext CHARACTER SET utf8 COLLATE utf8_lithuanian_ci NOT NULL,
  `image` text CHARACTER SET utf8 COLLATE utf8_lithuanian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `brand`, `color`, `shape`, `length`, `size`, `price`, `description`, `image`) VALUES
(3, 'Jūrinė', 'Suknelės Inc.', 'mėlyna', 'tiesi', 'vidutinė', 'M', 100, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris semper erat ut libero placerat, a ullamcorper mauris accumsan.', '1.jpg'),
(4, 'Raudona', 'Drabužiai Inc.', 'raudona', 'platėjanti', 'trumpa', 'S', 324, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris semper erat ut libero placerat, a ullamcorper mauris accumsan.', '2.jpg'),
(5, 'Marga', 'Rūbai, GmbH', 'marga', 'liemenuota', 'trumpa', 'L', 239, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris semper erat ut libero placerat, a ullamcorper mauris accumsan.', '3.jpg'),
(6, 'Vakarėlio', 'Suknelės Inc.', 'tamsiai mėlyna', 'tiesi', 'vidutinė', 'M', 412, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris semper erat ut libero placerat, a ullamcorper mauris accumsan.', '4.jpg'),
(7, 'Trikotažinė', 'Suknelės Inc.', 'rožinė', 'tiesi', 'vidutinė', 'S', 399, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris semper erat ut libero placerat, a ullamcorper mauris accumsan.', '5.jpg'),
(8, 'Vasariška', 'Rūbai, GmbH', 'balta', 'platėjanti', 'trumpa', 'M', 199, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris semper erat ut libero placerat, a ullamcorper mauris accumsan.', '6.jpg'),
(9, 'Direktorės', 'Suknelės, AB', 'juoda', 'liemenuota', 'vidutinė', 'L', 85, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris semper erat ut libero placerat, a ullamcorper mauris accumsan.', '7.jpg'),
(10, 'Drobinė', 'Drabužiai Inc.', 'marga', 'tiesi', 'trumpa', 'S', 199, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris semper erat ut libero placerat, a ullamcorper mauris accumsan.', '8.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
