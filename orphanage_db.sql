-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2021 at 02:23 PM
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
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  `facebook` text NOT NULL,
  `twitter` text NOT NULL,
  `linkin` text NOT NULL,
  `google` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `phone`, `email`, `facebook`, `twitter`, `linkin`, `google`) VALUES
(1, '0987654321', 'gmail@gmail.com', 'facebook', 'twitter.com', 'linkedin', 'google,com');

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'Admin', '', 'admin', 'MTIzNDU2', 1, 0, 1),
(3, 'jay', 'jay@gmail.com', 'JAY2216', 'amF5MjIxNg==', 2, 0, 1),
(5, 'admin', 'admin1234@gmail.com', 'admin123', '1234', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orphanage_adopt_master`
--

CREATE TABLE `orphanage_adopt_master` (
  `ADOPT_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `CHILDREN_ID` int(11) NOT NULL,
  `CENTER_ID` int(11) NOT NULL,
  `JOB` varchar(100) NOT NULL,
  `SALARY` int(10) NOT NULL,
  `ADOPT_STATUS` tinyint(1) NOT NULL DEFAULT 1,
  `ADOPT_IS_DELETED` tinyint(1) NOT NULL DEFAULT 0,
  `DATETIME` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orphanage_adopt_master`
--

INSERT INTO `orphanage_adopt_master` (`ADOPT_ID`, `USER_ID`, `CHILDREN_ID`, `CENTER_ID`, `JOB`, `SALARY`, `ADOPT_STATUS`, `ADOPT_IS_DELETED`, `DATETIME`) VALUES
(1, 1, 1, 1, 'Watchman', 15000, 1, 0, '2020-12-26 11:24:46');

-- --------------------------------------------------------

--
-- Table structure for table `orphanage_center_master`
--

CREATE TABLE `orphanage_center_master` (
  `center_id` int(11) NOT NULL,
  `center_name` varchar(255) NOT NULL,
  `center_head_image` text NOT NULL,
  `center_head_name` varchar(50) NOT NULL,
  `center_reg_date` date NOT NULL,
  `center_mo_no` bigint(10) NOT NULL,
  `country` int(11) NOT NULL,
  `region` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `address` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `history` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `center_update_datetime` datetime NOT NULL,
  `center_status` tinyint(1) NOT NULL DEFAULT 1,
  `center_is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orphanage_center_master`
--

INSERT INTO `orphanage_center_master` (`center_id`, `center_name`, `center_head_image`, `center_head_name`, `center_reg_date`, `center_mo_no`, `country`, `region`, `city`, `address`, `email`, `password`, `history`, `datetime`, `center_update_datetime`, `center_status`, `center_is_deleted`) VALUES
(1, 'jay', '20201229024842128951.jpg', 'jay', '2003-02-02', 6355798337, 1, 1, 1, 'haldharu', 'jay223@gmail.com', '1234', 'hbsxsbubsck;kphuhwxhihd9uwhhxoh9hdxjoj0ud', '2020-12-29 14:15:58', '0000-00-00 00:00:00', 1, 0),
(2, 'test2', '20201229024842128951.jpg', 'patel', '2005-12-10', 7201012050, 1, 1, 1, 'surat', 'patel12@gmail.com', '76454', 'ugwkdwesgdkewbgkjb', '2020-12-29 14:51:46', '0000-00-00 00:00:00', 1, 0),
(3, 'test3', '20201229041050128878.jpg', 'abhi', '2003-02-02', 6355798337, 1, 1, 1, 'haldharu', 'jay223@gmail.com', '1234', 'hbsxsbubsck;kphuhwxhihd9uwhhxoh9hdxjoj0ud', '2020-12-29 16:10:50', '0000-00-00 00:00:00', 1, 0),
(4, 'test1', '20201230035029wallpaperflare.com_wallpaper (1).jpg', 'viraj', '2006-11-30', 6355798337, 1, 1, 1, 'haldharu', 'viraj123@gmail.com', 'sbqfutgsnxz', 'yfdstqhfqvawdhvxsbhnkwqebdc jsvhz', '2020-12-30 11:54:41', '0000-00-00 00:00:00', 1, 0),
(5, 'test5', '20201230120254128916.jpg', 'abhi', '2020-12-20', 0, 1, 1, 1, '', '', '', '', '2020-12-30 12:02:54', '0000-00-00 00:00:00', 1, 0),
(6, '', '20201230121106404687.jpg', '', '0000-00-00', 0, 1, 1, 1, '', '', '', '', '2020-12-30 12:11:05', '0000-00-00 00:00:00', 1, 0),
(7, 'jay', '20201230122010404453.jpg', 'Patel', '0000-00-00', 0, 1, 1, 1, '', '', '', '', '2020-12-30 12:20:10', '0000-00-00 00:00:00', 1, 0),
(8, 'test9', '20201230033225wallpaperflare.com_wallpaper (2).jpg', 'abhi', '2020-12-06', 7201012050, 1, 1, 1, 'surat', 'jay223@gmail.com', 'dqasxasz', 'wvdsjgqxayufdsxyzjh', '2020-12-30 15:32:24', '0000-00-00 00:00:00', 1, 0),
(9, 'jay3', '20201230033511wallpaperflare.com_wallpaper.jpg', 'viraj', '0000-00-00', 0, 1, 1, 1, '', '', '', '', '2020-12-30 15:35:11', '0000-00-00 00:00:00', 1, 0),
(10, 'vjvjjvdgksjgckjgcuegcsgjdcbjdiuvgruhvifgfujghhgk', '20201230034934wallpaperflare.com_wallpaper.jpg', '', '0000-00-00', 0, 1, 1, 1, '', '', '', '', '2020-12-30 15:42:59', '0000-00-00 00:00:00', 1, 0);

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
  `children_status` tinyint(1) DEFAULT 1,
  `children_is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `children_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `date` date NOT NULL DEFAULT current_timestamp(),
  `children_updated_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orphanage_children_master`
--

INSERT INTO `orphanage_children_master` (`children_id`, `children_name`, `children_img`, `children_gender`, `children_dob`, `children_age`, `children_height`, `children_weight`, `children_bloodgroup`, `center_id`, `children_status`, `children_is_deleted`, `children_datetime`, `date`, `children_updated_datetime`) VALUES
(1, 'jay', '20201230124836wallpaperflare.com_wallpaper (1).jpg', 1, '1998-12-15', 21, 5.2, 50, 'B+', 1, 1, 0, '2020-12-23 09:25:10', '2020-12-23', '2020-12-30 12:49:18'),
(2, 'abhi', '20201229112557128878.jpg', 1, '1970-01-01', 20, 5.3, 65, 'A+', 3, 1, 0, '2020-12-23 09:40:11', '2020-12-24', '2020-12-29 11:25:57'),
(3, 'viraj', '20201229112817annie-spratt-TCuDDduuppU-unsplash.jpg', 1, '2000-12-17', 20, 46, 76, 'a-', 2, 1, 0, '2020-12-28 15:55:37', '2021-01-04', '2020-12-29 11:28:17');

-- --------------------------------------------------------

--
-- Table structure for table `orphanage_country_master`
--

CREATE TABLE `orphanage_country_master` (
  `id` int(11) NOT NULL,
  `country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orphanage_country_master`
--

INSERT INTO `orphanage_country_master` (`id`, `country`) VALUES
(1, 'india'),
(2, 'pakistan'),
(3, 'afganistan'),
(4, 'usa'),
(5, 'uk'),
(6, 'london'),
(7, 'srilanka'),
(8, 'canada'),
(9, 'paris'),
(10, 'dubai'),
(11, 'china'),
(12, 'turkey'),
(13, 'maldives');

-- --------------------------------------------------------

--
-- Table structure for table `orphanage_donate_master`
--

CREATE TABLE `orphanage_donate_master` (
  `donate_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `place` text DEFAULT NULL,
  `center_id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` time NOT NULL DEFAULT current_timestamp(),
  `donate_status` tinyint(1) NOT NULL,
  `donate_is_deleted` tinyint(1) NOT NULL,
  `donate_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `donate_updated_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orphanage_donate_master`
--

INSERT INTO `orphanage_donate_master` (`donate_id`, `user_id`, `place`, `center_id`, `date`, `time`, `donate_status`, `donate_is_deleted`, `donate_datetime`, `donate_updated_datetime`) VALUES
(1, 1, 'haldharu', 3, '0000-00-00', '00:00:00', 1, 0, '2021-02-24 17:18:29', '2021-02-24 17:18:29');

-- --------------------------------------------------------

--
-- Table structure for table `orphanage_donation_master`
--

CREATE TABLE `orphanage_donation_master` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `center_id` int(11) NOT NULL,
  `amount` int(20) NOT NULL,
  `payment_method` int(10) NOT NULL DEFAULT 3,
  `message` text DEFAULT NULL,
  `payment_status` tinyint(1) NOT NULL DEFAULT 0,
  `payment_is_delete` tinyint(1) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orphanage_donation_master`
--

INSERT INTO `orphanage_donation_master` (`id`, `user_id`, `center_id`, `amount`, `payment_method`, `message`, `payment_status`, `payment_is_delete`, `datetime`) VALUES
(1, 1, 1, 10000, 3, NULL, 1, 0, '2020-12-28 12:10:21'),
(2, 2, 1, 15000, 3, NULL, 1, 0, '2020-12-28 12:10:21'),
(3, 0, 4, 16000, 16000, 'Hello', 0, 0, '2021-03-06 10:29:26'),
(4, 1, 0, 0, 0, '', 0, 0, '2021-03-06 10:34:31'),
(5, 1, 5, 25000, 25000, 'Hello Childrens!', 0, 0, '2021-03-06 10:35:05'),
(6, 1, 5, 25000, 25000, 'Hello Childrens!', 0, 0, '2021-03-06 10:35:39'),
(7, 1, 1, 10000, 10000, 'vhgncv bn ', 0, 1, '2021-03-06 11:24:12'),
(8, 1, 1, 8555, 8555, '0', 1, 0, '2021-03-06 11:25:45'),
(9, 1, 1, 8555, 3, '', 1, 0, '2021-03-06 11:17:41'),
(10, 1, 1, 0, 0, '', 0, 1, '2021-03-06 11:25:54'),
(11, 1, 1, 8555, 0, '', 1, 0, '2021-03-06 11:27:38'),
(12, 1, 1, 10000, 3, 'b jhvb hjn\r\n\r\n\r\n', 1, 0, '2021-03-06 13:20:09'),
(13, 1, 0, 0, 0, '', 0, 0, '2021-03-06 13:15:31'),
(14, 1, 1, 5000, 2, 'jgbffbc vc', 0, 0, '2021-03-06 13:16:57'),
(15, 1, 0, 0, 0, '', 0, 0, '2021-03-06 16:11:44'),
(16, 1, 10, 1100, 2, 'hello', 0, 0, '2021-03-06 16:18:58'),
(17, 1, 10, 1100, 2, 'hello', 0, 0, '2021-03-06 16:30:24'),
(18, 1, 0, 8555, 0, '', 0, 0, '2021-03-06 16:48:14'),
(19, 1, 0, 8555, 0, '', 0, 0, '2021-03-06 16:49:27'),
(20, 1, 0, 1100, 0, '', 0, 0, '2021-03-06 16:50:35'),
(21, 1, 0, 1100, 0, '', 0, 0, '2021-03-06 16:52:05'),
(22, 1, 1, 1100, 0, '', 0, 0, '2021-03-06 16:52:13'),
(23, 1, 1, 1100, 0, '', 0, 0, '2021-03-06 16:53:48'),
(24, 1, 1, 1100, 0, '', 0, 0, '2021-03-06 16:54:19'),
(25, 1, 2, 1100, 0, '', 0, 0, '2021-03-06 16:54:27'),
(26, 1, 3, 1100, 0, '', 0, 0, '2021-03-06 16:55:04'),
(27, 1, 3, 1100, 0, '', 0, 0, '2021-03-06 16:55:28');

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
(1, 'Test name', 'test app', 'tset.package', 'test link', '20201031011302codeigniter-logo.png', 4, 1, '3', '1', '5', '2', '8', '6', '7', '9', '10', '11', '12', '13', '14', 15, '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', 30, '31', '32', '2020-10-31 01:10:44', '33', '34', 0, 0, '2020-12-22 13:28:04', '2020-12-22 13:31:16');

-- --------------------------------------------------------

--
-- Table structure for table `orphanage_user_master`
--

CREATE TABLE `orphanage_user_master` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL DEFAULT '1',
  `mo_no` bigint(11) DEFAULT NULL,
  `dob` date NOT NULL,
  `email` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `country` varchar(50) NOT NULL DEFAULT 'India',
  `region` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `datetime` datetime NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `user_update_datetime` datetime NOT NULL,
  `user_status` tinyint(1) NOT NULL DEFAULT 1,
  `user_is_delete` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orphanage_user_master`
--

INSERT INTO `orphanage_user_master` (`id`, `image`, `name`, `username`, `gender`, `mo_no`, `dob`, `email`, `password`, `country`, `region`, `city`, `address`, `datetime`, `date`, `user_update_datetime`, `user_status`, `user_is_delete`) VALUES
(1, '2020122802383040059.jpg', 'Jay', 'jay', '1', 6355798337, '2003-02-02', 'patel12@gmail.com', 'MTIzNA==', '2', '2', '3', 'Haldharu', '2020-12-28 14:38:30', '2020-12-28', '2020-12-29 12:09:04', 1, 0),
(2, '2020122802383040059.jpg', 'patel', 'patel', '1', 6355798337, '2003-02-02', 'patel12@gmail.com', '76534', '2', '2', '3', 'Haldharu', '2021-01-14 14:38:30', '2021-01-05', '2020-12-29 12:09:04', 1, 0),
(4, '20210113124429lisa-lyne-blevins-6OdJ4qIwL0s-unsplash.jpg', 'abhi', '', '1', 8552936241, '2021-01-19', 'abhi123@gmail.com', 'MTIzNA==', '2', '1', '3', 'bardoli', '0000-00-00 00:00:00', '2021-01-13', '0000-00-00 00:00:00', 1, 0),
(9, '2021030103085340059.jpg', 'Jay', 'root', '1', 7201012050, '0000-00-00', 'patel12@gmail.com', 'MTIzNA==', '1', '1', '1', 'haldharu', '2021-02-27 15:59:49', '2021-02-27', '2021-03-01 15:08:53', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orphanage_volunteer_master`
--

CREATE TABLE `orphanage_volunteer_master` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `phone` int(20) NOT NULL,
  `gender` int(10) NOT NULL,
  `country` int(20) NOT NULL,
  `region` int(20) NOT NULL,
  `city` int(20) NOT NULL,
  `age` int(10) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `vol_is_delete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `head` text NOT NULL,
  `subhead` text NOT NULL,
  `contact` text NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`head`, `subhead`, `contact`, `img`) VALUES
('Lifesong for Orphans.', 'Lifesong for Orphans exists to bring joy and purpose to orphans. Our Method: We seek to mobilize the church, His body, where each member can provide a unique and special service: some to adopt, some to care, and some to give. Follow our blog for adoption testimonials, resources, orphan stories & latest happenings.', '0987654321', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orphanage_admin_master`
--
ALTER TABLE `orphanage_admin_master`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `orphanage_adopt_master`
--
ALTER TABLE `orphanage_adopt_master`
  ADD PRIMARY KEY (`ADOPT_ID`);

--
-- Indexes for table `orphanage_center_master`
--
ALTER TABLE `orphanage_center_master`
  ADD PRIMARY KEY (`center_id`);

--
-- Indexes for table `orphanage_children_master`
--
ALTER TABLE `orphanage_children_master`
  ADD PRIMARY KEY (`children_id`);

--
-- Indexes for table `orphanage_country_master`
--
ALTER TABLE `orphanage_country_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orphanage_donate_master`
--
ALTER TABLE `orphanage_donate_master`
  ADD PRIMARY KEY (`donate_id`);

--
-- Indexes for table `orphanage_donation_master`
--
ALTER TABLE `orphanage_donation_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orphanage_package_msater`
--
ALTER TABLE `orphanage_package_msater`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `orphanage_user_master`
--
ALTER TABLE `orphanage_user_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `orphanage_volunteer_master`
--
ALTER TABLE `orphanage_volunteer_master`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orphanage_admin_master`
--
ALTER TABLE `orphanage_admin_master`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orphanage_adopt_master`
--
ALTER TABLE `orphanage_adopt_master`
  MODIFY `ADOPT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orphanage_center_master`
--
ALTER TABLE `orphanage_center_master`
  MODIFY `center_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orphanage_children_master`
--
ALTER TABLE `orphanage_children_master`
  MODIFY `children_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orphanage_country_master`
--
ALTER TABLE `orphanage_country_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orphanage_donate_master`
--
ALTER TABLE `orphanage_donate_master`
  MODIFY `donate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orphanage_donation_master`
--
ALTER TABLE `orphanage_donation_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `orphanage_package_msater`
--
ALTER TABLE `orphanage_package_msater`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orphanage_user_master`
--
ALTER TABLE `orphanage_user_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orphanage_volunteer_master`
--
ALTER TABLE `orphanage_volunteer_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
