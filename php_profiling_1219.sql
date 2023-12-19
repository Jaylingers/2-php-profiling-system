-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:33306
-- Generation Time: Dec 19, 2023 at 02:32 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `php_profiling`
--

-- --------------------------------------------------------

--
-- Table structure for table `persons_info`
--

CREATE TABLE IF NOT EXISTS `persons_info` (
  `id` int(11) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `extension_name` varchar(10) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `home_address` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Active',
  `gender` varchar(25) NOT NULL,
  `contact_number` varchar(25) NOT NULL,
  `email_address` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `persons_info`
--

INSERT INTO `persons_info` (`id`, `last_name`, `first_name`, `middle_name`, `extension_name`, `age`, `home_address`, `birthday`, `status`, `gender`, `contact_number`, `email_address`) VALUES
(1, 'amodia', 'radney', 'Z', '', 69, 'gabi, cordova', NULL, 'Active', '', '', ''),
(2, 'rizal', 'jose', 'Z', '', 69, 'gabi, cordova', NULL, 'Active', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

CREATE TABLE IF NOT EXISTS `users_info` (
  `id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `user_type` varchar(25) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `dark_mode` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_info`
--

INSERT INTO `users_info` (`id`, `person_id`, `username`, `password`, `user_type`, `image_path`, `dark_mode`) VALUES
(1, 1, 'admin', 'admin', 'admin', '', 0),
(2, 2, 'user', 'user', 'user', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `persons_info`
--
ALTER TABLE `persons_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_info`
--
ALTER TABLE `users_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `persons_info`
--
ALTER TABLE `persons_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users_info`
--
ALTER TABLE `users_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
