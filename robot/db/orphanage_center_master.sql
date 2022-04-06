-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2020 at 12:03 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

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
-- Table structure for table `orphanage_center_master`
--

CREATE TABLE `orphanage_center_master` (
  `center_id` int(11) NOT NULL,
  `center_name` varchar(500) DEFAULT NULL,
  `center_registrationid` varchar(300) DEFAULT NULL,
  `center_address` text DEFAULT NULL,
  `center_status` tinyint(1) NOT NULL DEFAULT 1,
  `center_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `center_updated_datetime` datetime DEFAULT NULL,
  `center_is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orphanage_center_master`
--

INSERT INTO `orphanage_center_master` (`center_id`, `center_name`, `center_registrationid`, `center_address`, `center_status`, `center_datetime`, `center_updated_datetime`, `center_is_deleted`) VALUES
(1, 'Test center', '123', 'Surat', 1, '2020-11-14 13:48:30', NULL, 0),
(2, 'Test center2', '1234', 'Surat', 1, '2020-11-14 13:48:30', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orphanage_center_master`
--
ALTER TABLE `orphanage_center_master`
  ADD PRIMARY KEY (`center_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orphanage_center_master`
--
ALTER TABLE `orphanage_center_master`
  MODIFY `center_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
