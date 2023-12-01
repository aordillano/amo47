-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: sql1.njit.edu
-- Generation Time: Nov 18, 2023 at 12:44 AM
-- Server version: 8.0.17
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `amo47`
--

-- --------------------------------------------------------

--
-- Table structure for table `shoeCategories`
--

CREATE TABLE IF NOT EXISTS `shoeCategories` (
`shoeCategoryID` int(11) NOT NULL,
  `shoeCategoryName` varchar(255) NOT NULL,
  `dateAdded` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `shoeCategories`
--

INSERT INTO `shoeCategories` (`shoeCategoryID`, `shoeCategoryName`, `dateAdded`) VALUES
(1, 'Boots', '2023-10-19 17:43:45'),
(2, 'Flats', '2023-10-19 17:47:31'),
(3, 'Heels', '2023-10-19 17:48:00'),
(4, 'Lounge', '2023-10-19 17:48:09'),
(5, 'Sandals', '2023-10-19 17:48:16'),
(6, 'Sneakers', '2023-10-19 17:48:25');

-- --------------------------------------------------------

--
-- Table structure for table `shoeManagers`
--

CREATE TABLE IF NOT EXISTS `shoeManagers` (
`shoeManagerID` int(11) NOT NULL,
  `emailAddress` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(60) NOT NULL,
  `lastName` varchar(60) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `shoeManagers`
--

INSERT INTO `shoeManagers` (`shoeManagerID`, `emailAddress`, `password`, `firstName`, `lastName`) VALUES
(1, 'mary_gardner@gmail.com', '$2y$10$lW//6lhB2Eq/uUhdY2YABuguZfVLnkCpJZfTmYFTBmajJQGku55kW', 'Mary', 'Gardner'),
(2, 'sophie.vasquez@gmail.com', '$2y$10$YPJ4iDfYM7UA2N34iFq44e2hhmTyn8xY230rWZ2BGUTKydd4BxToS', 'Sophie', 'Vasquez'),
(3, 'morgantaylor@gmail.com', '$2y$10$N3HVucn75flyyApstv/f0OjOxs8xjnetXatsKIrrOuQhfqC1qak5W', 'Morgan', 'Taylor');

-- --------------------------------------------------------

--
-- Table structure for table `shoes`
--

CREATE TABLE IF NOT EXISTS `shoes` (
`shoeID` int(11) NOT NULL,
  `shoeCategoryID` int(11) NOT NULL,
  `shoeCode` varchar(10) NOT NULL,
  `shoeName` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `dateAdded` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=33 ;

--
-- Dumping data for table `shoes`
--

INSERT INTO `shoes` (`shoeID`, `shoeCategoryID`, `shoeCode`, `shoeName`, `description`, `price`, `dateAdded`) VALUES
(1, 1, 'luna_boot', 'Luna Black Knee-High Boots', 'Black knee-high boots with 2-inch heels and made of quality suede', 60.00, '2023-10-19 18:15:38'),
(2, 1, 'ebony_boot', 'Ebony Black Combat Boots', 'Classic black combat boots made of water resistant material', 45.00, '2023-10-19 18:21:19'),
(3, 1, 'umbra_boot', 'Umbra Black Block Heel Ankle Boots', 'Black ankle boots with 2-inch block heels made of quality suede', 35.00, '2023-10-19 18:21:19'),
(4, 2, 'jewel_flat', 'Jewel Sparkly Silver Pointed Flats', 'Sparkly silver pointed-toe flats with jewel design', 45.00, '2023-10-19 18:44:19'),
(5, 2, 'blush_flat', 'Blush Light Pink Pointed Toe Flats', 'Simple blush pink flats with pointed toes and bow design', 25.00, '2023-10-19 18:44:19'),
(6, 2, 'celes_flat', 'Celestia Beige Square Toe Flats', 'Simple beige flats with black square toes', 20.00, '2023-10-19 18:44:19'),
(7, 3, 'ayla_heel', 'Ayla White Chunky Heels', 'White 2-inch block heels with beautiful embroidery and lace around ankle', 35.00, '2023-10-19 18:47:10'),
(8, 3, 'flora_heel', 'Flora Rose Gold Heels', 'Light pink 2-inch stilettos with gorgeous jewel designs', 60.00, '2023-10-19 18:47:10'),
(9, 3, 'stell_heel', 'Stella Sparkly Silver Heels', 'Sparkly silver 2-inch stilettos with pointed toes', 35.00, '2023-10-19 18:47:10'),
(10, 4, 'ros_lounge', 'Rosa Pink Fluffy Slides', 'Light pink open-toed slides with pink fluffy straps', 20.00, '2023-10-19 18:50:30'),
(11, 4, 'con_lounge', 'Coney Fluffy Purple Rabbit Slippers', 'Cute fluffy purple slippers with rabbit design and closed-toe straps', 30.00, '2023-10-19 18:50:30'),
(12, 4, 'rib_lounge', 'Ribbon White Fluffy Slippers', 'White fluffy slippers with open-toe straps and bow design', 25.00, '2023-10-19 18:50:30'),
(13, 5, 'sol_sandal', 'Sol Beige Summer Sandals', 'Flat beige sandals with brown soles and jeweled straps', 35.00, '2023-10-19 18:53:33'),
(14, 5, 'blo_sandal', 'Blossom White Flat Sandals', 'Simple flat sandals with brown soles and white floral straps', 20.00, '2023-10-19 18:53:33'),
(15, 5, 'fau_sandal', 'Fauna Beige Flat Sandals', 'Flat sandals with brown soles and beige woven straps', 30.00, '2023-10-19 18:53:33'),
(16, 6, 'mari_sneak', 'Mariposa White Sneakers', 'Simple white sneakers with gold chain and butterfly pendant', 40.00, '2023-10-19 18:56:00'),
(17, 6, 'timb_sneak', 'Timber Brown Sneakers', 'Brown sneakers with beige block designs', 35.00, '2023-10-19 18:56:00'),
(18, 6, 'cara_sneak', 'Carat White Sneakers', 'Simple white sneakers with pink and blue designs', 35.00, '2023-10-19 18:56:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shoeCategories`
--
ALTER TABLE `shoeCategories`
 ADD PRIMARY KEY (`shoeCategoryID`);

--
-- Indexes for table `shoeManagers`
--
ALTER TABLE `shoeManagers`
 ADD PRIMARY KEY (`shoeManagerID`), ADD UNIQUE KEY `emailAddress` (`emailAddress`);

--
-- Indexes for table `shoes`
--
ALTER TABLE `shoes`
 ADD PRIMARY KEY (`shoeID`), ADD UNIQUE KEY `shoeCode` (`shoeCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shoeCategories`
--
ALTER TABLE `shoeCategories`
MODIFY `shoeCategoryID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `shoeManagers`
--
ALTER TABLE `shoeManagers`
MODIFY `shoeManagerID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `shoes`
--
ALTER TABLE `shoes`
MODIFY `shoeID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
