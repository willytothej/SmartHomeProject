-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2015 at 07:13 PM
-- Server version: 5.5.40-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `FluidityHome`
--

-- --------------------------------------------------------

--
-- Table structure for table `ActivityLog`
--

CREATE TABLE IF NOT EXISTS `ActivityLog` (
  `UserID` int(40) NOT NULL,
  `Phidgets` varchar(40) NOT NULL,
  `Changes` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `AlertConfig`
--

CREATE TABLE IF NOT EXISTS `AlertConfig` (
  `HouseID` int(11) NOT NULL,
  `Mobile` int(11) DEFAULT NULL,
  `Email` int(11) DEFAULT NULL,
  `Phone` int(11) DEFAULT NULL,
  `TempLow` int(11) DEFAULT NULL,
  `TempHigh` int(11) DEFAULT NULL,
  `Active` tinyint(1) DEFAULT NULL,
  `Light` varchar(20) DEFAULT NULL,
  `Curtains` varchar(4) DEFAULT NULL,
  `Door` varchar(4) DEFAULT NULL,
  `SentTempAlert` tinyint(1) DEFAULT NULL,
  `SentLightAlert` tinyint(1) DEFAULT NULL,
  `SentDoorAlert` int(11) DEFAULT NULL,
  `SentCurtainsAlert` tinyint(1) DEFAULT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `AlertNotifications`
--

CREATE TABLE IF NOT EXISTS `AlertNotifications` (
  `HouseID` int(11) NOT NULL,
  `Device` int(11) NOT NULL,
  `Time` varchar(100) NOT NULL,
  `UniqueID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`UniqueID`),
  UNIQUE KEY `UniqueID` (`UniqueID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=95 ;

-- --------------------------------------------------------

--
-- Table structure for table `Devices`
--

CREATE TABLE IF NOT EXISTS `Devices` (
  `HouseID` int(11) NOT NULL,
  `DeviceID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Active` tinyint(4) NOT NULL,
  `UniqueDeviceID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`UniqueDeviceID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1417 ;

-- --------------------------------------------------------

--
-- Table structure for table `House`
--

CREATE TABLE IF NOT EXISTS `House` (
  `HouseID` int(11) NOT NULL AUTO_INCREMENT,
  `HouseName` text NOT NULL,
  `UniqueCardID` int(16) NOT NULL,
  PRIMARY KEY (`HouseID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=122 ;

-- --------------------------------------------------------

--
-- Table structure for table `LoggedInSessions`
--

CREATE TABLE IF NOT EXISTS `LoggedInSessions` (
  `UniqueID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `UserIDString` varchar(1000) NOT NULL,
  `IPAddress` varchar(20) NOT NULL,
  `TimeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`UniqueID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=99 ;

-- --------------------------------------------------------

--
-- Table structure for table `Permissions`
--

CREATE TABLE IF NOT EXISTS `Permissions` (
  `UserID` int(11) NOT NULL,
  `HouseID` int(11) NOT NULL,
  `ConfirmCode` int(11) NOT NULL,
  `CanDelete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `RFIDKeyData`
--

CREATE TABLE IF NOT EXISTS `RFIDKeyData` (
  `UserID` int(11) NOT NULL,
  `KeyCode` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `Type` tinyint(1) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=233 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
