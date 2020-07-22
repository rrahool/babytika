-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2020 at 12:13 AM
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
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `admin_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `admin_password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_trashed` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `admin_name`, `admin_email`, `admin_password`, `is_trashed`) VALUES
(35, 'Tanjil', 'tanjil@gmail.com', 'd0970714757783e6cf17b26fb8e2298f', 'No'),
(36, 'John Doe', 'john@doe.com', 'e10adc3949ba59abbe56e057f20f883e', 'No'),
(37, 'Mary Jane', 'mary.jane@yahoo.com', 'd0970714757783e6cf17b26fb8e2298f', 'No'),
(38, 'Thomas Shelby', 'thomas@outlook.com', 'd0970714757783e6cf17b26fb8e2298f', 'No'),
(39, 'aaaaa', 'aa@gg.co', 'd0970714757783e6cf17b26fb8e2298f', 'No'),
(41, 'zzzz', 'zz@yy.co', 'd0970714757783e6cf17b26fb8e2298f', 'No'),
(44, 'Tanjil Islam', 'tanjil.ctg01@gmail.com', 'd0970714757783e6cf17b26fb8e2298f', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `baby`
--

CREATE TABLE `baby` (
  `id` int(11) NOT NULL,
  `B_Name` varchar(255) NOT NULL,
  `BM_Email` varchar(255) NOT NULL,
  `B_User` varchar(255) NOT NULL,
  `BF_Cell` varchar(255) NOT NULL,
  `B_Pass` varchar(255) NOT NULL,
  `B_Day` date NOT NULL,
  `B_Gender` varchar(255) NOT NULL,
  `otp` int(11) DEFAULT NULL,
  `status` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `baby`
--

INSERT INTO `baby` (`id`, `B_Name`, `BM_Email`, `B_User`, `BF_Cell`, `B_Pass`, `B_Day`, `B_Gender`, `otp`, `status`) VALUES
(1, 'Shafkat', 'shafkaait@gmail.com', '01828726867', '01812345678', '1234', '2020-07-01', 'Male', 66352, 'Yes'),
(2, 'tanjil masud', 'rbiswas596@gmail.com', '01836245719', '01616557756', '11223344', '2020-07-12', 'Male', 598680, 'Yes'),
(3, 'babu', 'tanjiltajil@gmail.com', '01616557761', '0166557782', '11223344', '2020-07-02', 'Male', NULL, ''),
(4, 'rudra', 'tanjiltajil@gmail.com', '01615557741', '01615557782', '11223344', '2020-07-01', 'Male', NULL, ''),
(5, 'test_baby', 'tb@gm.co', '55231462', '63245963', '112233', '2020-07-15', 'Female', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `moderator`
--

CREATE TABLE `moderator` (
  `id` int(11) NOT NULL,
  `first_name` varchar(111) NOT NULL,
  `last_name` varchar(111) NOT NULL,
  `email` varchar(111) NOT NULL,
  `password` varchar(111) NOT NULL,
  `phone` varchar(111) NOT NULL,
  `address` varchar(333) NOT NULL,
  `email_verified` varchar(111) DEFAULT NULL,
  `status` varchar(111) NOT NULL DEFAULT 'Pending',
  `is_trashed` varchar(255) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moderator`
--

INSERT INTO `moderator` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `address`, `email_verified`, `status`, `is_trashed`) VALUES
(27, 'Rahul', 'Biswas', 'rbiswas1802@gmail.com', 'd0970714757783e6cf17b26fb8e2298f', '12345678900', 'Ctg', 'Yes', 'Active', 'No'),
(31, 'Camila', 'Cabelo', 'cam@cab.co', 'd0970714757783e6cf17b26fb8e2298f', '39258147', 'Mexico', 'Yes', 'Pending', 'No'),
(32, 'Charlie', 'Puth', 'charlie@puth.com', 'd0970714757783e6cf17b26fb8e2298f', '12345678900', 'NY', '1dc533994b21b381425d95bedeb66121', 'Pending', 'No'),
(36, 'Ed', 'Shereen', 'ed@shereen.com', 'd0970714757783e6cf17b26fb8e2298f', '12345678900', 'London', '1b7f81d39c1bd6831dc86b3c5bbf8a8b', 'Pending', 'No'),
(37, 'Clean', 'Bandit', 'clean@bandit.com', 'd0970714757783e6cf17b26fb8e2298f', '12345678900', 'California', 'Yes', 'Active', 'No'),
(38, 'zara', 'liason', 'zara@lia.zl', 'd0970714757783e6cf17b26fb8e2298f', '12345678900', 'Manhattan', 'e2abbc193efd4eb154c726a8f9a7441b', 'Pending', 'No'),
(39, 'Kuddus', 'Mia', 'kuddus@mia.km', 'd0970714757783e6cf17b26fb8e2298f', '987456123', 'Faridpur', 'c2435a5f96068b11e4322609fc1df11d', 'Pending', 'No'),
(40, 'Sakhina', 'Khatun', 'sakhina@k.sk', 'd0970714757783e6cf17b26fb8e2298f', '456789321', 'Patuakhali', '88a408cafad614ff681d60ce8325f16a', 'Pending', 'No'),
(46, 'Jafar', 'Iqbal', 'jafar@iqbal.jj', 'd0970714757783e6cf17b26fb8e2298f', '666441235', 'Chattogram', 'ed61569220f256e9231cf0f03c2bbe2a', 'Pending', 'No'),
(52, 'Sukanta', 'Bhattacharya', 'sukanta@skb.co', 'd0970714757783e6cf17b26fb8e2298f', '45622145', 'Kolkata', 'Yes', 'Active', 'No'),
(53, 'Rabindranath', 'Thakur', 'rabi@thakur.rco', 'd0970714757783e6cf17b26fb8e2298f', '6655432156', 'Khulna', 'Yes', 'Active', 'No'),
(54, 'Justine', 'Timberlake', 'justine@tim.jut', 'd0970714757783e6cf17b26fb8e2298f', '55651235', 'LA', 'fb38e121e94abca83559c44d307d55f0', 'Pending', 'No'),
(57, 'AA', 'BB', 'rrahoolessence209@gmail.com', 'd0970714757783e6cf17b26fb8e2298f', '5656565', 'Ctg', '97b3d8d9b1a1879d20f7cb1deb7342c1', 'Pending', 'No'),
(59, 'Rahul', 'Biswas', 'rbiswas596@gmail.com', 'd0970714757783e6cf17b26fb8e2298f', '01812743059', 'Ctg', 'e6ed59cc11a836dd700f9184626b3a77', 'Pending', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `mother`
--

CREATE TABLE `mother` (
  `id` int(11) NOT NULL,
  `M_Name` varchar(255) NOT NULL,
  `M_Email` varchar(255) NOT NULL,
  `M_Cell` varchar(255) NOT NULL,
  `M_User` varchar(255) NOT NULL,
  `M_Blood` varchar(255) NOT NULL,
  `M_Week` int(11) NOT NULL,
  `M_Pass` varchar(255) NOT NULL,
  `M_Date` varchar(255) NOT NULL,
  `otp` int(11) DEFAULT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mother`
--

INSERT INTO `mother` (`id`, `M_Name`, `M_Email`, `M_Cell`, `M_User`, `M_Blood`, `M_Week`, `M_Pass`, `M_Date`, `otp`, `status`) VALUES
(1, 'tanjil', 's.tanjilislam@gmail.com', '01836245719', '01616557759', 'B+', 3, '11223344', '727429', 675603, 'Yes'),
(2, 'priyam', 'tofayel.ustc@gmail.com', '01817050996', '01616557759', 'B+', 3, '11223344', '727429', 338575, 'Yes'),
(3, 'Karima', 'shafkatislam1@gmail.com', '01822345678', '01815678906', 'AB+', 2, '1234', '727430', 904261, 'Yes'),
(4, 'ana murphy', 'oshantoxesan@gmail.com', '01616557767', '01616557786', 'A+', 3, '11223344', '', NULL, ''),
(5, 'ema', 'tanjiltajil@gmail.com', '01719909919', '01677089298', 'A+', 2, '11223344', '', NULL, ''),
(6, 'xyz', 'tanjil.ctg01@gmail.com', '01677089298', '01616557798', 'O+', 2, '11223344', '727430', 444479, 'No'),
(7, 'xyz', 's.tanjilislam@gmail.com', '01677089299', '01616557798', 'O+', 2, '11223344', '727430', 133034, 'No'),
(8, 'Nora', 's.tanjilislam@gmail.com', '01616557753', '01616557798', 'O+', 2, '11223344', '727430', 789319, 'No'),
(9, 'test_m', 'tm@gg.com', '01677549094', '01517111291', 'O+', 3, '112233', '', NULL, ''),
(10, 'test_m_2', 'tm2@gg.c', '01517111291', '01814621253', 'AB+', 4, '112233', '727431', NULL, ''),
(11, 'suma', 'a.yousuf5566@gmail.com', '01977266057', '01911188443', 'B+', 1, '01911188443', '727431', 906181, 'Yes'),
(12, 'Mamoni', 'mamoni@gmail.co', '01812743059', '01812743059', 'A+', 5, '112233', '727430', NULL, 'Yes'),
(13, 'test_mother', 'tm@gm.co', '6622464', '6325412', 'A+', 1, '112233', '727431', NULL, 'Yes');

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

-- --------------------------------------------------------

--
-- Table structure for table `vaccine`
--

CREATE TABLE `vaccine` (
  `id` int(11) NOT NULL,
  `cell` varchar(255) NOT NULL,
  `pdate` date NOT NULL,
  `ndate` date NOT NULL,
  `number` int(11) NOT NULL,
  `numbers` int(11) NOT NULL,
  `status` int(11) DEFAULT 0,
  `status_date` varchar(255) DEFAULT NULL,
  `final_date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vaccine`
--

INSERT INTO `vaccine` (`id`, `cell`, `pdate`, `ndate`, `number`, `numbers`, `status`, `status_date`, `final_date`) VALUES
(1, '01836245719', '2020-07-20', '2020-07-21', 3, 1, 1, '2020-07-18', ''),
(2, '01836245719', '2019-11-07', '2019-11-07', 1, 3, 0, NULL, ''),
(3, '01836245719', '2019-12-31', '2019-12-31', 2, 3, 0, NULL, ''),
(4, '01836245719', '2020-07-21', '2021-07-20', 4, 2, 0, NULL, ''),
(5, '01836245719', '2021-07-20', '2022-07-19', 5, 2, 0, NULL, '2020-9-24'),
(7, '01817050996', '2020-07-19', '2020-07-19', 1, 1, 0, NULL, ''),
(8, '01817050996', '2020-07-19', '2020-08-16', 2, 2, 0, NULL, ''),
(9, '01817050996', '2020-08-16', '2021-02-16', 3, 2, 0, '2020-07-19', ''),
(10, '01822345678', '2020-07-01', '2020-07-01', 1, 3, 0, NULL, ''),
(11, '01822345678', '2020-07-31', '2020-07-31', 2, 1, 1, '2020-07-19', ''),
(12, '01817050996', '2021-02-16', '2022-02-16', 4, 2, 1, '2020-07-19', ''),
(13, '01817050996', '2022-02-16', '2023-02-16', 5, 2, 1, '2020-07-21', ''),
(14, '01616557753', '2020-07-18', '2020-07-18', 1, 1, 0, NULL, ''),
(15, '01616557753', '2020-07-18', '2020-08-15', 2, 2, 1, '2020-07-19', ''),
(17, '01977266057', '2020-07-21', '2020-07-22', 2, 1, 0, NULL, ''),
(18, '01977266057', '2020-04-06', '2020-04-06', 1, 3, 0, NULL, ''),
(19, '01977266057', '2020-07-22', '2021-01-22', 3, 2, 0, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `vaccine_baby`
--

CREATE TABLE `vaccine_baby` (
  `id` int(11) NOT NULL,
  `cell` varchar(255) NOT NULL,
  `pdate` date NOT NULL,
  `ndate` date NOT NULL,
  `number` int(11) NOT NULL,
  `numbers` int(11) NOT NULL,
  `vaccine` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `status_date` varchar(255) DEFAULT NULL,
  `final_date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vaccine_baby`
--

INSERT INTO `vaccine_baby` (`id`, `cell`, `pdate`, `ndate`, `number`, `numbers`, `vaccine`, `status`, `status_date`, `final_date`) VALUES
(1, '01616557756', '2020-07-17', '2020-07-17', 1, 3, ' BCG, Hepatitis B', 0, NULL, ''),
(2, '01616557756', '2020-07-18', '2020-07-18', 2, 3, ' OPV-0', 0, NULL, ''),
(3, '01616557756', '2020-07-20', '2020-07-20', 3, 1, ' OPV-1, Hepatitis B-1, DPT-1', 0, NULL, ''),
(4, '01616557756', '2020-07-20', '2020-08-18', 4, 2, ' OPV-2, Hepatitis B-2, DPT-2', 0, NULL, ''),
(5, '01616557756', '2020-08-18', '2020-09-16', 5, 2, ' OPV-3, Hepatitis B-3, DPT-3', 0, NULL, '2020-11-10'),
(6, '01615557782', '2020-07-16', '2020-07-16', 1, 3, ' BCG, Hepatitis B', 0, NULL, ''),
(7, '01615557782', '2020-07-20', '2020-07-20', 2, 1, ' OPV-0', 0, NULL, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `baby`
--
ALTER TABLE `baby`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moderator`
--
ALTER TABLE `moderator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mother`
--
ALTER TABLE `mother`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vaccine`
--
ALTER TABLE `vaccine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vaccine_baby`
--
ALTER TABLE `vaccine_baby`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `baby`
--
ALTER TABLE `baby`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `moderator`
--
ALTER TABLE `moderator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `mother`
--
ALTER TABLE `mother`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `vaccine`
--
ALTER TABLE `vaccine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `vaccine_baby`
--
ALTER TABLE `vaccine_baby`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
