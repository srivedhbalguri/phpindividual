-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2021 at 04:10 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `PId` int(2) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Price` decimal(7,2) NOT NULL,
  `Inventory` int(11) NOT NULL,
  `Image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`PId`, `Name`, `Price`, `Inventory`, `Image`) VALUES
(1, 'Java', '100.00', 0, 'java.jpg'),
(2, 'Linux', '150.00', 20, 'linux.jpg'),
(3, 'Fracture Mechanics', '80.00', 8, 'mechanics.jpg'),
(4, 'Finance', '50.50', 0, 'finance.jpg'),
(5, 'Web Services', '99.00', 29, 'webservices.jpg'),
(6, 'Hacker\'s HandBook', '200.00', 26, 'webapphack.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Id` int(11) NOT NULL,
  `LastName` text NOT NULL,
  `FirstName` text NOT NULL,
  `Payment` text NOT NULL,
  `Address` varchar(45) NOT NULL,
  `PhoneNo` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `PId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Id`, `LastName`, `FirstName`, `Payment`, `Address`, `PhoneNo`, `Email`, `PId`) VALUES
(1, 'balguri', 'srivedh', 'Debit Card', '228 kitchener', '9999999999', 'sunnyZ@gmail.com', 2),
(2, 'mnb', 'hhbvn', 'Credit Card', 'hgf', '9999', 'bmnb', 2),
(3, ',jhv,h,jhv,', 'jhgkhg', 'Credit Card', 'hmvbv', '9999', 'khmgv,hg', 5),
(4, 'bakjdb', 'dharpan', 'Debit Card', 'adslfbaf', '99999', 'alsdjfbjlasdf', 6),
(5, 'jsdbchjs', 'asjcfbsdc', 'Credit Card', 'sjjndcb', '999', 'kjbsdj', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`PId`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_Order_1_idx` (`PId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `fk_Order_1` FOREIGN KEY (`PId`) REFERENCES `books` (`PId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
