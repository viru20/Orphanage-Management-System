-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2020 at 05:17 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `orphanage_admin_master`
--

CREATE TABLE `orphanage_admin_master` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` text NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `admin_is_master` tinyint(1) NOT NULL COMMENT '1=admin, 2=sub admin',
  `admin_is_delete` tinyint(1) NOT NULL,
  `admin_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orphanage_admin_master`
--

INSERT INTO `orphanage_admin_master` (`admin_id`, `admin_name`, `admin_email`, `admin_username`, `admin_password`, `admin_is_master`, `admin_is_delete`, `admin_status`) VALUES
(1, 'Admin', '', 'admin', 'MTIzNDU2', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orphanage_package_msater`
--

CREATE TABLE `orphanage_package_msater` (
  `package_id` int(11) NOT NULL,
  `package_devlopar_name` text DEFAULT NULL,
  `package_app_name` varchar(100) NOT NULL,
  `package_package_name` text DEFAULT NULL,
  `package_link` text NOT NULL,
  `package_logo` text NOT NULL,
  `package_ad_type` int(11) NOT NULL DEFAULT 1,
  `package_isAdShow` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0-Hide, 1-Show',
  `package_interstitial_ad_code` text DEFAULT NULL,
  `package_banner_ad_code` text DEFAULT NULL,
  `package_video_ad_code` text DEFAULT NULL,
  `package_native_id` varchar(100) DEFAULT NULL,
  `package_fb_interstial` varchar(100) DEFAULT NULL,
  `package_fb_banner` varchar(100) DEFAULT NULL,
  `package_fb_native` varchar(100) DEFAULT NULL,
  `package_fb_video` varchar(100) DEFAULT NULL,
  `package_unity_game_id` text DEFAULT NULL,
  `package_appLovin` text DEFAULT NULL,
  `package_startup_appid` text DEFAULT NULL,
  `package_startup_devid` text DEFAULT NULL,
  `package_version` varchar(10) DEFAULT NULL,
  `package_isupdate` tinyint(1) NOT NULL DEFAULT 0,
  `package_spintime` varchar(10) NOT NULL DEFAULT '0',
  `package_totalspin` varchar(10) DEFAULT NULL,
  `package_total_search_card` varchar(10) DEFAULT NULL,
  `package_crash_card_random_amt` varchar(10) DEFAULT NULL,
  `package_min_widharw_amt` varchar(10) DEFAULT NULL,
  `package_min_widhdraw_dailog_msg` text DEFAULT NULL,
  `package_rateus` varchar(10) DEFAULT NULL,
  `package_rate_bonus` varchar(10) DEFAULT NULL,
  `package_rate_bonus_amt` varchar(10) DEFAULT '0',
  `package_daily_bonus_amt` varchar(10) NOT NULL DEFAULT '0',
  `package_daily_bonus_dailog_msg` text DEFAULT NULL,
  `package_rate_rs` varchar(10) NOT NULL DEFAULT '0',
  `dimond_rate_doller` varchar(10) NOT NULL DEFAULT '0',
  `package_rate_euro` varchar(10) NOT NULL DEFAULT '0',
  `package_is_video_btn_show` tinyint(1) NOT NULL DEFAULT 0,
  `package_video_cnt` varchar(10) NOT NULL DEFAULT '0',
  `package_spin_on_video` varchar(10) NOT NULL DEFAULT '0',
  `package_system_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `package_jackpot_from` varchar(10) NOT NULL DEFAULT '0',
  `package_jackpot_to` varchar(10) NOT NULL DEFAULT '0',
  `package_status` tinyint(1) NOT NULL DEFAULT 1,
  `package_is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `package_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `package_updated_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orphanage_package_msater`
--

INSERT INTO `orphanage_package_msater` (`package_id`, `package_devlopar_name`, `package_app_name`, `package_package_name`, `package_link`, `package_logo`, `package_ad_type`, `package_isAdShow`, `package_interstitial_ad_code`, `package_banner_ad_code`, `package_video_ad_code`, `package_native_id`, `package_fb_interstial`, `package_fb_banner`, `package_fb_native`, `package_fb_video`, `package_unity_game_id`, `package_appLovin`, `package_startup_appid`, `package_startup_devid`, `package_version`, `package_isupdate`, `package_spintime`, `package_totalspin`, `package_total_search_card`, `package_crash_card_random_amt`, `package_min_widharw_amt`, `package_min_widhdraw_dailog_msg`, `package_rateus`, `package_rate_bonus`, `package_rate_bonus_amt`, `package_daily_bonus_amt`, `package_daily_bonus_dailog_msg`, `package_rate_rs`, `dimond_rate_doller`, `package_rate_euro`, `package_is_video_btn_show`, `package_video_cnt`, `package_spin_on_video`, `package_system_datetime`, `package_jackpot_from`, `package_jackpot_to`, `package_status`, `package_is_deleted`, `package_datetime`, `package_updated_datetime`) VALUES
(1, 'Test name', 'test app', 'tset.package', 'test link', '20201031011302codeigniter-logo.png', 4, 1, '3', '1', '5', '2', '8', '6', '7', '9', '10', '11', '12', '13', '14', 15, '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', 30, '31', '32', '2020-10-31 01:10:44', '33', '34', 1, 0, '2020-10-31 01:13:02', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orphanage_admin_master`
--
ALTER TABLE `orphanage_admin_master`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `orphanage_package_msater`
--
ALTER TABLE `orphanage_package_msater`
  ADD PRIMARY KEY (`package_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orphanage_admin_master`
--
ALTER TABLE `orphanage_admin_master`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orphanage_package_msater`
--
ALTER TABLE `orphanage_package_msater`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
