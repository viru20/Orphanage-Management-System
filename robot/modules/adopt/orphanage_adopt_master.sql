-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 01, 2021 at 05:52 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orphanage_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `orphanage_adopt_master`
--

DROP TABLE IF EXISTS `orphanage_adopt_master`;
CREATE TABLE IF NOT EXISTS `orphanage_adopt_master` (
  `ADOPT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(11) NOT NULL,
  `CHILDREN_ID` int(11) NOT NULL,
  `CENTER_ID` int(11) NOT NULL,
  `USER_ID_PROOF` text NOT NULL,
  `JOB` varchar(100) NOT NULL,
  `SALARY` int(10) NOT NULL,
  `ADOPT_STATUS` tinyint(1) NOT NULL DEFAULT '1',
  `ADOPT_IS_DELETED` tinyint(1) NOT NULL DEFAULT '0',
  `DATETIME` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ADOPT_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orphanage_adopt_master`
--

INSERT INTO `orphanage_adopt_master` (`ADOPT_ID`, `USER_ID`, `CHILDREN_ID`, `CENTER_ID`, `USER_ID_PROOF`, `JOB`, `SALARY`, `ADOPT_STATUS`, `ADOPT_IS_DELETED`, `DATETIME`) VALUES
(1, 1, 1, 1, '', 'Watchman', 15000, 1, 0, '2020-12-26 11:24:46');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
