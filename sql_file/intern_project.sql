-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2019 at 08:05 PM
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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `LOGIN` (IN `EMAIL1` VARCHAR(100), IN `PASSWORD1` VARCHAR(100), OUT `STATUS` VARCHAR(100))  BEGIN
DECLARE UID INT(3); 
SET UID = 0 ;
SELECT COUNT(*) INTO UID FROM USERS WHERE `EMAIL`=EMAIL1 AND `PASSWORD`=PASSWORD1 LIMIT 1 ;   

SELECT UID;

IF UID>0
THEN 
SET STATUS="YES" ;

ELSE 
SET STATUS="NO";

END IF ;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_TEST` (INOUT `EMAIL1` VARCHAR(100))  BEGIN
DECLARE UID INT(3); 
SET UID = 0 ;
SELECT COUNT(*) INTO UID FROM USERS WHERE `EMAIL`=EMAIL1 ;   



IF UID>0
THEN 
SET EMAIL1="YES" ;

ELSE 
SET EMAIL1="NO";

END IF ;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `REGISTRATION` (IN `EMAIL1` VARCHAR(100), OUT `STATUS` VARCHAR(100))  BEGIN
DECLARE UID INT(3); 
SET UID = 0 ;
SELECT COUNT(*) INTO UID FROM USERS WHERE `EMAIL`=lower(EMAIL1) ;   

SELECT UID;

IF UID>0
THEN 
SET STATUS="NO" ;

ELSE 
SET STATUS="YES";

END IF ;

END$$

DELIMITER ;

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
  `institution` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `blood_group` varchar(10) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `mobile` int(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `registration_date` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`first_name`, `middle_name`, `last_name`, `gender`, `membership_number`, `id`, `institution_id`, `nid_or_passport`, `fathers_name`, `mother_name`, `spouse_name`, `number_of_children`, `present_line_1`, `present_line_2`, `present_city_or_district`, `present_post_code`, `present_country`, `parmanent_line_1`, `parmanent_line_2`, `parmanent_post_code`, `parmanent_country`, `parmanent_city_or_district`, `profession`, `designation`, `institution`, `email`, `blood_group`, `date_of_birth`, `type`, `mobile`, `password`, `status`, `registration_date`) VALUES
('', '', '', 'Gender', NULL, 39, 'riyad', '', '', '', '', 0, '', '', '', '', '', '', '', '3200', 'Bangladesh', 'Dhaka', '', '', '', 'riyad298@gmail.com', 'bangladesh', '0000-00-00', 'user', 1919448787, '1', NULL, NULL),
('', '', '', 'Gender', NULL, 40, 'riyad', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'bangladesh', '0000-00-00', 'user', 0, '448787', NULL, NULL),
('arfefa', '', '', 'Gender', NULL, 41, 'riyad', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'bangladesh', '0000-00-00', 'user', 0, '448787', NULL, NULL),
('Md Ahsan', 'Ferdous', 'Riyad', 'Gender', NULL, 42, 'riyad', '', '', '', '', 0, '', '', 'Dhaka', '3200', 'Bangladesh', '', '', '', '', '', '', '', '', '', 'bangladesh', '0000-00-00', 'user', 0, '448787', NULL, NULL),
('Md Ahsanfff', 'Ferdousff', 'Riyadff', 'Gender', NULL, 43, 'riyad', '', '', '', '', 0, '', '', 'Dhaka', '3200', 'Bangladesh', '', '', 'fff', '', '', '', '', '', '', 'bangladesh', '0000-00-00', 'user', 0, '448787', NULL, NULL),
('', '', '', 'Gender', NULL, 44, 'riyad', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'arfarfffffffffffffff', 'bangladesh', '0000-00-00', 'user', 0, '448787', NULL, NULL),
('', '', '', 'Gender', NULL, 45, 'riyad', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'arfarfffffffffffffff', 'bangladesh', '0000-00-00', 'user', 0, '448787', NULL, NULL),
('', '', '', 'Gender', NULL, 46, 'riyad', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'arfarfffffffffffffff', 'bangladesh', '0000-00-00', 'user', 0, '448787', NULL, NULL),
('', '', '', 'Gender', NULL, 47, 'riyad', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'arfarfffffffffffffff', 'bangladesh', '0000-00-00', 'user', 0, '448787', NULL, NULL),
('', '', '', 'Gender', NULL, 48, 'riyad', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'arfarfffffffffffffff', 'bangladesh', '0000-00-00', 'user', 0, '448787', NULL, NULL),
('', '', '', 'Gender', NULL, 49, 'riyad', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'arfarfffffffffffffff', 'bangladesh', '0000-00-00', 'user', 0, '448787', NULL, NULL),
('', '', '', 'Gender', NULL, 50, 'riyad', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'arfarfffffffffffffff', 'bangladesh', '0000-00-00', 'user', 0, '448787', NULL, NULL),
('', '', '', 'Gender', NULL, 51, 'riyad', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'arfarfffffffffffffff', 'bangladesh', '0000-00-00', 'user', 0, '448787', NULL, NULL),
('', '', '', 'Gender', NULL, 52, 'riyad', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'arfarfffffffffffffff', 'bangladesh', '0000-00-00', 'user', 0, '448787', NULL, NULL),
('', '', '', 'Gender', NULL, 53, 'riyad', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'arfarfffffffffffffff', 'bangladesh', '0000-00-00', 'user', 0, '448787', NULL, NULL),
('', '', '', 'Gender', NULL, 54, 'riyad', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'arfarfffffffffffffff', 'bangladesh', '0000-00-00', 'user', 0, '448787', NULL, NULL),
('', '', '', 'Gender', NULL, 55, 'riyad', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'arfarfffffffffffffff', 'bangladesh', '0000-00-00', 'user', 0, '448787', NULL, NULL),
('', '', '', 'Gender', NULL, 56, 'riyad', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'arfarfffffffffffffff', 'bangladesh', '0000-00-00', 'user', 0, '448787', NULL, NULL),
('', '', '', 'Gender', NULL, 57, 'riyad', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'arfarfffffffffffffff', 'bangladesh', '0000-00-00', 'user', 0, '448787', NULL, NULL),
('', '', '', 'Gender', NULL, 58, 'riyad', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'arfarfffffffffffffffrefer', 'bangladesh', '0000-00-00', 'user', 0, '448787', NULL, NULL),
('', '', '', 'Gender', NULL, 59, 'riyad', '', '', '', '', 0, '', '', '', '', '', '', '', '3200', 'Bangladesh', 'Dhaka', '', '', '', 'riyad298@gmail.com', 'bangladesh', '0000-00-00', 'user', 1919448787, '448787', NULL, NULL),
('', '', '', 'Gender', NULL, 60, 'riyad', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'ffffffffffffffffffffffffffffaaaaaaaa', 'bangladesh', '0000-00-00', 'user', 0, '448787', 'not_verified', NULL),
('', '', '', 'Gender', NULL, 61, 'riyad', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'riyad', 'bangladesh', '0000-00-00', 'user', 0, '448787', 'rejected', NULL),
('hhhhhh', '', '', 'Gender', NULL, 62, 'riyad', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'bangladesh', '0000-00-00', 'user', 0, '448787', 'rejected', NULL),
('ggaatrg^^', '', '', 'Gender', NULL, 63, 'riyad', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'bangladesh', '0000-00-00', 'user', 0, '448787', 'rejected', NULL),
('hellow', '', '', 'Gender', NULL, 64, 'riyad', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'bangladesh', '0000-00-00', 'user', 0, '448787', 'rejected', NULL),
('hellow', '', '', 'Gender', NULL, 65, 'riyad', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'bangladesh', '0000-00-00', 'user', 0, '448787', 'rejected', NULL),
('', '', '', 'Gender', NULL, 66, 'riyad', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'rimo', 'bangladesh', '0000-00-00', 'user', 0, '448787', 'not_verified', '2019-11-02 18:50:58.000000');

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
