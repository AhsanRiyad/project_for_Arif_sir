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
drop table `users_registration`;


CREATE TABLE `users_info` (
 `email` varchar(100) DEFAULT NULL,
 `gender` varchar(100) DEFAULT NULL,
 `id` int(100) NOT NULL,
 `nid_or_passport` varchar(100) DEFAULT NULL,
 `fathers_name` varchar(100) DEFAULT NULL,
 `mother_name` varchar(100) DEFAULT NULL,
 `spouse_name` varchar(100) DEFAULT NULL,
 `number_of_children` int(100) DEFAULT NULL,
 `profession` varchar(100) DEFAULT NULL,
 `designation` varchar(100) DEFAULT NULL,
 `institution` varchar(100) DEFAULT NULL,
 `blood_group` varchar(10) DEFAULT NULL,
 `date_of_birth` date DEFAULT NULL
)

;

CREATE TABLE `verification_info`(
 `email` varchar(100) DEFAULT NULL,
 `otp` varchar(100) DEFAULT NULL,
 `status` varchar(20) DEFAULT NULL,
 `type` varchar(20) DEFAULT NULL,
 `visibility` varchar(20) DEFAULT NULL

)

;

CREATE TABLE `users_registration` (
  `email` varchar(100) DEFAULT NULL,
  `id` int(100) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `mobile` int(20) DEFAULT NULL,
  `institution_id` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `registration_date` datetime(6) DEFAULT NULL,
  `membership_number` varchar(100) DEFAULT NULL,
  `recent_photo` varchar(200) DEFAULT NULL
  );


ALTER TABLE `users_registration`
ADD PRIMARY KEY (`id`);


ALTER TABLE `users_registration`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
