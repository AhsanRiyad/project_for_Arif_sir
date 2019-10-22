-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2019 at 09:57 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intern_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `first_name` varchar(100) DEFAULT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `membership_number` varchar(100) DEFAULT NULL,
  `id` int(100) NOT NULL,
  `institution_id` varchar(100) DEFAULT NULL,
  `nid_or_passport` varchar(100) DEFAULT NULL,
  `fathers_name` varchar(100) DEFAULT NULL,
  `mother_name` varchar(100) DEFAULT NULL,
  `spouse_name` varchar(100) DEFAULT NULL,
  `number_of_children` int(100) DEFAULT NULL,
  `present_line_1` varchar(100) DEFAULT NULL,
  `present_line_2` varchar(100) DEFAULT NULL,
  `present_city_or_district` varchar(100) DEFAULT NULL,
  `present_post_code` varchar(100) DEFAULT NULL,
  `present_country` varchar(100) DEFAULT NULL,
  `parmanent_line_1` varchar(100) DEFAULT NULL,
  `parmanent_line_2` varchar(100) DEFAULT NULL,
  `parmanent_post_code` varchar(100) DEFAULT NULL,
  `parmanent_country` varchar(100) DEFAULT NULL,
  `parmanent_city_or_district` varchar(100) DEFAULT NULL,
  `profession` varchar(100) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `blood_group` varchar(10) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
