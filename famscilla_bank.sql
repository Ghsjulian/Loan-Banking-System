-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 29, 2023 at 11:20 AM
-- Server version: 5.6.38
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `famscilla_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `id` int(11) NOT NULL,
  `user_id` int(50) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `account_number` varchar(100) NOT NULL,
  `zip_code` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `home_address` varchar(100) NOT NULL,
  `bvn_number` varchar(100) NOT NULL,
  `nin_number` varchar(100) NOT NULL,
  `loan_amount` varchar(100) NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customize`
--

CREATE TABLE `customize` (
  `id` int(11) NOT NULL,
  `logo_text` varchar(100) NOT NULL,
  `hero_text` varchar(800) NOT NULL,
  `hero_bottom` varchar(800) NOT NULL,
  `about_text` varchar(800) NOT NULL,
  `contact_text` varchar(800) NOT NULL,
  `service_text` varchar(800) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customize`
--

INSERT INTO `customize` (`id`, `logo_text`, `hero_text`, `hero_bottom`, `about_text`, `contact_text`, `service_text`) VALUES
(1, 'Ghs Julian', 'Hero Texted ', 'Hero_bottom5', 'Here you can add your about section Bishal ', 'You can add contact details etc....', 'Here you can add service and manu more ');

-- --------------------------------------------------------

--
-- Table structure for table `loan_history`
--

CREATE TABLE `loan_history` (
  `id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `user_avtar` varchar(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `notification` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `loan_paid`
--

CREATE TABLE `loan_paid` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `payment_id` varchar(100) NOT NULL,
  `transition_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loan_paid`
--

INSERT INTO `loan_paid` (`id`, `user_id`, `user_name`, `payment_id`, `transition_id`) VALUES
(1, '', '', '', ''),
(2, '3', 'Smita Smith ', 'ghs', 'ghs'),
(3, '12', 'Sweta Sharma', 'ghs', 'ghs'),
(4, '3', 'Smita Smith ', 'ghs', 'ghs');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `notification` varchar(100) NOT NULL,
  `user_avtar` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `paid`
--

CREATE TABLE `paid` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `loan_amount` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paid`
--

INSERT INTO `paid` (`id`, `user_id`, `user_name`, `account_name`, `loan_amount`, `user_email`, `phone_number`) VALUES
(10, '11', 'Kamal Martin ', '57454545', '250', 'kamal@gmail.com', '78757445'),
(9, '4', 'Dlx Dipto Munda ', '01743789311', '500', 'dlx@gmail.com', '01743789311');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_phone` varchar(100) NOT NULL,
  `user_avtar` varchar(100) NOT NULL,
  `user_role` varchar(50) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `verification` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_email`, `user_phone`, `user_avtar`, `user_role`, `user_password`, `verification`) VALUES
(1, 'Ghs Julian', 'ghsjulian@gmail.com', '01743789311', '', 'Admin_ghs', '7c4a8d09ca3762af61e59520943dc26494f8941b', ''),
(2, 'Smita Sharma', 'smita@gmail.com', '01743789311', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', ''),
(3, 'Smita Smith', 'smita@gmail.com', '01743789311', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', '1'),
(4, 'Dlx Dipto Munda', 'dlx@gmail.com', '01743789311', '__ghsdlx.jpg', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', '1'),
(5, 'Sunita Sharma', 'sunita@gmail.com', '01743789311', 'ghs__20523.jpg', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', ''),
(6, 'Sweta Sharma', 'sweta@gmail.com', '01743789311', 'ghs__179fa.jpg', '', '20eabe5d64b0e216796e834f52d61fd0b70332fc', ''),
(7, 'Rani Mukherjee', 'rani@gmail.com', '1234567890', 'ghs__58fce.jpg', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', ''),
(8, 'Sumi', 'sumi@gmail.com', '01743789311', 'ghs__04386.jpg', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', ''),
(9, 'Sumon Seuka', 'sumon@gmail.com', '01743789311', 'ghs__c62e8.jpg', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', ''),
(10, 'Test', 'test@gmail.com', '01302661227', 'ghs__df7af.jpg', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', ''),
(11, 'Kamal Smith', 'kamal@gmail.com', '01743789311', 'ghs__8dbe0.jpg', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', '1'),
(12, 'Sweta', 'sweta@gmail.com', '123456789', 'ghs__ff487.jpg', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_noti`
--

CREATE TABLE `user_noti` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `notification` varchar(100) NOT NULL,
  `avtar` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customize`
--
ALTER TABLE `customize`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_history`
--
ALTER TABLE `loan_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_paid`
--
ALTER TABLE `loan_paid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paid`
--
ALTER TABLE `paid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_noti`
--
ALTER TABLE `user_noti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `customize`
--
ALTER TABLE `customize`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loan_history`
--
ALTER TABLE `loan_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `loan_paid`
--
ALTER TABLE `loan_paid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `paid`
--
ALTER TABLE `paid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_noti`
--
ALTER TABLE `user_noti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
