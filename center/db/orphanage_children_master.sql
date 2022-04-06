-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2020 at 10:19 AM
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
-- Table structure for table `orphanage_children_master`
--

CREATE TABLE `orphanage_children_master` (
  `children_id` int(11) NOT NULL,
  `children_name` varchar(30) DEFAULT NULL,
  `children_img` text DEFAULT NULL,
  `children_gender` int(11) DEFAULT NULL,
  `children_dob` date DEFAULT NULL,
  `children_age` int(4) DEFAULT NULL,
  `children_height` float DEFAULT NULL,
  `children_weight` int(4) DEFAULT NULL,
  `children_bloodgroup` varchar(20) DEFAULT NULL,
  `center_id` int(11) DEFAULT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` date NOT NULL DEFAULT current_timestamp(),
  `children_status` tinyint(1) DEFAULT 1,
  `children_is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `children_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `children_updated_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orphanage_children_master`
--

INSERT INTO `orphanage_children_master` (`children_id`, `children_name`, `children_img`, `children_gender`, `children_dob`, `children_age`, `children_height`, `children_weight`, `children_bloodgroup`, `center_id`, `date`, `time`, `children_status`, `children_is_deleted`, `children_datetime`, `children_updated_datetime`) VALUES
(1, 'jay', '20201223092510202012071133578bc9f8f1625efab4a751ebd5b28fb402.png', 1, '1998-12-15', 21, 5.2, 50, 'B+', 2, '2020-12-23', '2020-12-23', 1, 0, '2020-12-23 09:25:10', '2020-12-23 09:43:04'),
(2, 'abhi', '20201223094011hum_naa_rahein_hum.jpg', 1, '1970-01-01', 20, 5.3, 65, 'A+', 1, '2020-12-23', '2020-12-23', 1, 0, '2020-12-23 09:40:11', '2020-12-27 15:24:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orphanage_children_master`
--
ALTER TABLE `orphanage_children_master`
  ADD PRIMARY KEY (`children_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orphanage_children_master`
--
ALTER TABLE `orphanage_children_master`
  MODIFY `children_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
