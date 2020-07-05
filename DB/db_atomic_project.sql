-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2020 at 03:18 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_atomic_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_birthday`
--

CREATE TABLE `tbl_birthday` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `is_trashed` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_birthday`
--

INSERT INTO `tbl_birthday` (`id`, `name`, `dob`, `is_trashed`) VALUES
(1, 'rahul', '1992-07-08', 'No'),
(2, 'avi', '1994-09-20', 'No'),
(3, 'mickey mouse', '1928-11-18', 'No'),
(4, 'woody woodpecker', '1941-07-07', 'No'),
(6, 'dfjkbdsf', '1997-05-06', '2017-06-15 13:36:22'),
(13, 'jcvhzbjhdf', '2017-06-13', 'No'),
(14, 'dffs', '2017-06-14', '2017-06-15 13:36:23'),
(15, 'sdfgf', '2017-06-14', '2017-06-15 13:36:23'),
(16, 'sdfzsdrf', '2017-06-12', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book_title`
--

CREATE TABLE `tbl_book_title` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `admin_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `admin_password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `book_image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_trashed` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_book_title`
--

INSERT INTO `tbl_book_title` (`id`, `admin_name`, `admin_email`, `admin_password`, `book_image`, `is_trashed`) VALUES
(20, 'yjdydghx', 'srtsrfr4', '', '', '2020-07-05 00:45:16'),
(21, 'dxzgfg', 'rsgtsrzgtr', '', '', '2017-06-14 12:40:05'),
(22, 'wstrrws', 'rtewsrtf', '', '', '2017-06-14 12:40:05'),
(26, 'ewrewr', 'hgffh', '', '', '2017-06-14 12:40:38'),
(28, 'trutry', 'rte4ert', '', '', '2017-06-14 12:40:56'),
(29, 'et5ert', 'eryt5ert', '', '', '2020-07-05 00:45:16'),
(30, 'erytert', 'yruhryth', '', '', '2017-06-14 23:21:08'),
(31, 'rter', 'gfrrt', '', '', '2020-07-05 00:45:16'),
(32, 'rtgr', 'rstgr', '', '', '2017-06-14 23:21:16'),
(35, 'Tanjil', 'tanjil@gmail.com', '112233', '', 'No'),
(36, 'John Doe', 'john@doe.com', '123456', '', 'No'),
(37, 'Mary Jane', 'mary.jane@yahoo.com', '112233', '', 'No'),
(38, 'Thomas Shelby', 'thomas@outlook.com', '112233', '', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cities`
--

CREATE TABLE `tbl_cities` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_trashed` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_cities`
--

INSERT INTO `tbl_cities` (`id`, `name`, `city`, `is_trashed`) VALUES
(1, 'Rahul Biswas', 'Chittagong', 'No'),
(2, 'Avinanda', 'Chittagong', 'No'),
(3, 'Rubel Mazumdar', 'Dhaka', 'No'),
(4, 'yayusd', 'Sylhet', 'No'),
(5, 'fxchxfh', 'Barisal', 'No'),
(6, 'xhhgxdg', 'Rangpur', '2017-06-16 02:43:28'),
(7, 'xgxdtdt', 'Rajshahi', '2017-06-16 02:41:56'),
(8, 'dfhdxghtxd', 'Dhaka', '2017-06-16 02:41:43'),
(9, 'dchxdgb', 'Khulna', '2017-06-16 02:41:43'),
(10, 'xdfgdfgdxfg', 'Rangpur', '2017-06-16 02:39:43'),
(11, 'dxfgbfgb', 'Chittagong', 'No'),
(12, 'dxfgxdfgb', 'Dhaka', '2017-06-16 02:39:43'),
(13, 'dgxdgdfxg', 'Dhaka', '2017-06-16 02:42:37'),
(14, 'dxfgbxdgb', 'Rajshahi', '2017-06-16 02:42:37'),
(15, 'xgxfg', 'Barisal', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gender`
--

CREATE TABLE `tbl_gender` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_trashed` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_gender`
--

INSERT INTO `tbl_gender` (`id`, `name`, `gender`, `is_trashed`) VALUES
(1, 'rahul', 'Male', 'No'),
(2, 'avi', 'Female', 'No'),
(3, 'someone', 'Female', 'No'),
(4, 'pagla', 'Male', 'No'),
(5, 'szdfgzsdfsz', 'Male', 'No'),
(6, 'dfgxdfgxdfg', 'Female', 'No'),
(7, 'sddsrtgg', 'Female', '2017-06-16 02:55:11'),
(8, 'dxrtgsdrtg', 'Male', '2017-06-16 02:55:12'),
(9, 'dtgrstger', 'Male', '2017-06-16 02:55:12'),
(10, 'xdzrtgsrdtger', 'Male', '2017-06-16 02:55:54'),
(11, 'rtgertg', 'Female', '2017-06-16 02:55:54'),
(12, 'rtgeetger', 'Male', '2017-06-16 02:55:54'),
(13, 'tgretg', 'Female', 'No'),
(14, 'rtgg', 'Male', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hobbies`
--

CREATE TABLE `tbl_hobbies` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hobbies` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_trashed` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_hobbies`
--

INSERT INTO `tbl_hobbies` (`id`, `name`, `hobbies`, `is_trashed`) VALUES
(1, 'rahul', 'Book Reading, Gaming', 'No'),
(2, 'avi', 'Gardening, Book Reading, Traveling', 'No'),
(3, 'weqsa', 'Book Reading, Photography, Traveling', 'No'),
(4, 'sdgsg', 'Photography', 'No'),
(5, 'dsgesztg', 'Photography, Gaming', 'No'),
(6, 'dxzsgdzstg', 'Photography, Gaming', 'No'),
(7, 'rgtgreter', 'Photography', '2017-06-16 00:41:49'),
(8, 'rstgers', 'Gardening', '2017-06-16 00:41:58'),
(9, 'rgertg', 'Book Reading', 'No'),
(10, 'zwe4test', 'Gaming', '2017-06-16 00:41:58'),
(11, 'rtgeert', 'Traveling', '2017-06-16 00:41:58'),
(12, 'rtgertf', 'Photography, Gaming', '2017-06-16 00:41:38'),
(13, 'tgeert', 'Book Reading, Photography, Gaming', 'No'),
(14, 'rstgsrztfg', 'Book Reading, Photography, Gaming, Traveling', 'No'),
(15, 'rtgfrstfgser', 'Gardening, Book Reading, Photography, Gaming, Traveling', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_profile_pictures`
--

CREATE TABLE `tbl_profile_pictures` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `profile_picture` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_trashed` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_profile_pictures`
--

INSERT INTO `tbl_profile_pictures` (`id`, `name`, `profile_picture`, `is_trashed`) VALUES
(1, 'rahul', '1496342491avatar-1.png', 'No'),
(2, 'birthday cake', '1496342529Pink and White 2 Tier Minny Mouse theme First Birthday Cake for Girl.JPG', 'No'),
(3, 'rrrrrr', '1497460556jeans4.jpg', 'No'),
(4, 'sherlock', '1497460575sherlock.jpg', 'No'),
(5, 'sesher kobita', '1497460609shesher_kobita.jpg', 'No'),
(6, 'himu shomogro', '1497460631himu_sm.jpg', 'No'),
(7, 'something', '1496343184love-quotes-for-her-wallpaper - Copy.bmp', '2017-06-16 02:24:32'),
(8, 'object', '1497558249avatar-1.png', '2017-06-16 02:01:37'),
(9, 'jhggvhvv', '1497558032smiley-creator.png', '2017-06-16 02:01:37'),
(10, 'dxdsrtsert', '149747077418.PNG', '2017-06-16 02:24:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_summary`
--

CREATE TABLE `tbl_summary` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `organization` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `summary` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_trashed` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_summary`
--

INSERT INTO `tbl_summary` (`id`, `name`, `organization`, `summary`, `is_trashed`) VALUES
(1, 'Rahul Biswas', 'AAAAAA', 'bla bla bla....bla bla bla....bla bla bla....bla bla bla....bla bla bla....bla bla bla....bla bla bla....bla bla bla....bla bla bla....bla bla bla....', 'No'),
(2, 'sdfjjsdbf', 'ksdkkdf', ':D', 'No'),
(3, 'dfgdrtd', 'dsgdrtes', 'rstsedrtg dgxdfgxd xdfgbx.....rstsedrtg dgxdfgxd xdfgbx.....rstsedrtg dgxdfgxd xdfgbx.....rstsedrtg dgxdfgxd xdfgbx.....', 'No'),
(4, 'sFsdzzsdg', 'szzsdgfvzxdgv', 'rstsedrtg dgxdfgxd xdfgbx.....rstsedrtg dgxdfgxd xdfgbx.....rstsedrtg dgxdfgxd xdfgbx.....', 'No'),
(5, 'cvghcfgjhfgy', 'tyhtfcg', 'rstsedrtg dgxdfgxd xdfgbx.....rstsedrtg dgxdfgxd xdfgbx.....', '2017-06-16 03:23:47'),
(6, 'gchcfghn', 'xhtfhtfgh', 'rstsedrtg dgxdfgxd xdfgbx.....rstsedrtg dgxdfgxd xdfgbx.....rstsedrtg dgxdfgxd xdfgbx.....rstsedrtg dgxdfgxd xdfgbx.....rstsedrtg dgxdfgxd xdfgbx.....', '2017-06-16 03:22:42'),
(7, 'fchcfcfgh', 'fyhtfghytfg', 'rstsedrtg dgxdfgxd xdfgbx.....', '2017-06-16 03:23:47'),
(8, 'klbjh', 'xcvxcfgv', 'rstsedrtg dgxdfgxd xdfgbx.....rstsedrtg dgxdfgxd xdfgbx.....rstsedrtg dgxdfgxd xdfgbx.....', 'No'),
(9, 'xdffgxdg', 'dfgvzxdgv', 'rstsedrtg dgxdfgxd xdfgbx.....rstsedrtg dgxdfgxd xdfgbx.....rstsedrtg dgxdfgxd xdfgbx.....rstsedrtg dgxdfgxd xdfgbx.....', 'No'),
(10, 'vhbfgchn', 'fxhfcg', 'rstsedrtg dgxdfgxd xdfgbx.....rstsedrtg dgxdfgxd xdfgbx.....rstsedrtg dgxdfgxd xdfgbx.....rstsedrtg dgxdfgxd xdfgbx.....rstsedrtg dgxdfgxd xdfgbx.....rstsedrtg dgxdfgxd xdfgbx.....rstsedrtg dgxdfgxd xdfgbx.....rstsedrtg dgxdfgxd xdfgbx.....\r\n', '2017-06-16 03:24:40'),
(11, 'cbcvb', 'ghdfhtfgh', 'rstsedrtg dgxdfgxd xdfgbx.....rstsedrtg dgxdfgxd xdfgbx.....rstsedrtg dgxdfgxd xdfgbx.....', '2017-06-16 03:24:40'),
(12, 'cbhfgh', 'dfgbdxg', 'rstsedrtg dgxdfgxd xdfgbx.....rstsedrtg dgxdfgxd xdfgbx.....rstsedrtg dgxdfgxd xdfgbx.....', '2017-06-16 03:24:40'),
(13, 'zxvzxdfg', 'dfxg', 'rstsedrtg dgxdfgxd xdfgbx.....rstsedrtg dgxdfgxd xdfgbx.....', '2017-06-16 03:24:53'),
(14, 'dfxgxdfg', 'fxdgxdfg', 'rstsedrtg dgxdfgxd xdfgbx.....rstsedrtg dgxdfgxd xdfgbx.....rstsedrtg dgxdfgxd xdfgbx.....', 'No'),
(15, 'xdfgxdfg', 'dfxgxdfg', 'rstsedrtg dgxdfgxd xdfgbx.....rstsedrtg dgxdfgxd xdfgbx.....', 'No'),
(16, 'zfgdf', 'gsdfgsdrf', 'rstsedrtg dgxdfgxd xdfgbx.....', 'No'),
(17, 'bcfghtfgc', 'fgxdg', 'rstsedrtg dgxdfgxd xdfgbx.....rstsedrtg dgxdfgxd xdfgbx.....rstsedrtg dgxdfgxd xdfgbx.....rstsedrtg dgxdfgxd xdfgbx.....', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(111) NOT NULL,
  `last_name` varchar(111) NOT NULL,
  `email` varchar(111) NOT NULL,
  `password` varchar(111) NOT NULL,
  `phone` varchar(111) NOT NULL,
  `address` varchar(333) NOT NULL,
  `email_verified` varchar(111) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `address`, `email_verified`) VALUES
(19, 'asfds', 'sdfgs', 'x@y.z', '202cb962ac59075b964b07152d234b70', '4545', 'sfsj', '4ae15d1c46f25be8db9d07061463c5f0'),
(23, 'Rahul', 'Biswas', 'rbiswas596@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '+8801812743059', 'Chattogram', 'Yes'),
(24, 'Tanjil', 'Islam', 'tanjil.ctg01@gmail.com', 'd0970714757783e6cf17b26fb8e2298f', '12345678900', 'Chattogram', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_birthday`
--
ALTER TABLE `tbl_birthday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_book_title`
--
ALTER TABLE `tbl_book_title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cities`
--
ALTER TABLE `tbl_cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gender`
--
ALTER TABLE `tbl_gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_hobbies`
--
ALTER TABLE `tbl_hobbies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_profile_pictures`
--
ALTER TABLE `tbl_profile_pictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_summary`
--
ALTER TABLE `tbl_summary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_birthday`
--
ALTER TABLE `tbl_birthday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_book_title`
--
ALTER TABLE `tbl_book_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_cities`
--
ALTER TABLE `tbl_cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_gender`
--
ALTER TABLE `tbl_gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_hobbies`
--
ALTER TABLE `tbl_hobbies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_profile_pictures`
--
ALTER TABLE `tbl_profile_pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_summary`
--
ALTER TABLE `tbl_summary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
