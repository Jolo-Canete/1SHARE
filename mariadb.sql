-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2024 at 11:31 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mariadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(12) NOT NULL,
  `adFirstname` varchar(45) NOT NULL,
  `adMiddleName` varchar(45) NOT NULL,
  `adLastName` varchar(45) NOT NULL,
  `barangayPosition` varchar(45) NOT NULL,
  `adUsername` varchar(45) NOT NULL,
  `adPassword` varchar(45) NOT NULL,
  `userID` int(12) NOT NULL,
  `itemID` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `itemID` int(12) NOT NULL,
  `itemName` varchar(45) NOT NULL,
  `itemDescription` varchar(45) NOT NULL,
  `category` varchar(45) NOT NULL,
  `itemCondition` varchar(45) NOT NULL,
  `price` int(12) NOT NULL,
  `userID` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `itemrating`
--

CREATE TABLE `itemrating` (
  `idItemRating` int(12) NOT NULL,
  `itemID` int(12) NOT NULL,
  `rate` varchar(45) NOT NULL,
  `comment` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `requestID` int(12) NOT NULL,
  `status` varchar(45) NOT NULL,
  `requestType` varchar(45) NOT NULL,
  `reqDateTime` datetime NOT NULL,
  `reqDateTimeClosed` datetime NOT NULL,
  `userID` int(12) NOT NULL,
  `itemID` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(12) NOT NULL,
  `firstName` varchar(45) NOT NULL,
  `middleName` varchar(45) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `contactNumber` varchar(45) NOT NULL,
  `zone` varchar(45) NOT NULL,
  `purok` varchar(50) NOT NULL,
  `dateJoined` datetime NOT NULL,
  `userEmail` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `userRating` varchar(45) NOT NULL,
  `transaction` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `idUserPassword` int(12) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `recoveryEmail` varchar(45) NOT NULL,
  `recoveryNo` varchar(45) NOT NULL,
  `recentPassword` varchar(45) NOT NULL,
  `userID` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`),
  ADD KEY `fk_admin_user1` (`userID`),
  ADD KEY `fk_admin_item1` (`itemID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemID`),
  ADD KEY `fk_item_user1` (`userID`);

--
-- Indexes for table `itemrating`
--
ALTER TABLE `itemrating`
  ADD PRIMARY KEY (`idItemRating`),
  ADD KEY `fk_itemrating_item1` (`itemID`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`requestID`),
  ADD KEY `fk_request_user1` (`userID`),
  ADD KEY `fk_request_item1` (`itemID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `contactNumber` (`contactNumber`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`idUserPassword`),
  ADD UNIQUE KEY `recoveryEmail` (`recoveryEmail`),
  ADD UNIQUE KEY `recoveryNo` (`recoveryNo`),
  ADD KEY `fk_userlogin_admin1` (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `itemID` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `itemrating`
--
ALTER TABLE `itemrating`
  MODIFY `idItemRating` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `requestID` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `idUserPassword` int(12) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_admin_item1` FOREIGN KEY (`itemID`) REFERENCES `item` (`itemID`),
  ADD CONSTRAINT `fk_admin_user1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `fk_item_user1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Constraints for table `itemrating`
--
ALTER TABLE `itemrating`
  ADD CONSTRAINT `fk_itemrating_item1` FOREIGN KEY (`itemID`) REFERENCES `item` (`itemID`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `fk_request_item1` FOREIGN KEY (`itemID`) REFERENCES `item` (`itemID`),
  ADD CONSTRAINT `fk_request_user1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Constraints for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD CONSTRAINT `fk_userlogin_admin1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
