-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2019 at 11:27 PM
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `current_photo` (IN `upload_link` VARCHAR(500), IN `email1` VARCHAR(100), OUT `existing_link` VARCHAR(500))  BEGIN


Select recent_photo into existing_link from user_uploads where email = email1 ;


if existing_link = NULL
then 

set existing_link = 'not_set' ; 

end if;


update user_uploads set recent_photo = upload_link where email = email1 ; 



END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `email_verification_otp` (IN `email1` VARCHAR(100), IN `otp1` VARCHAR(100), IN `purpose` VARCHAR(100), OUT `result` VARCHAR(100))  BEGIN

DECLARE count int(5);

if purpose = 'verify_email_otp'
then
select count(*) into count from verification_info where email = email1 and otp = otp1  ; 

if count >0 
then
update verification_info set email_verification_status = 'verified' where email = email1 ; 
set result = 'email_verified' ; 
else
set result = 'invalid_otp';
end if ;

elseif purpose = 'send_otp'
then

update verification_info set otp = otp1 where email = email1 ;

set result = 'otp_sent';

end if;




END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `login` (IN `email1` VARCHAR(500), IN `password1` VARCHAR(100), OUT `result` VARCHAR(500))  BEGIN

DECLARE i int(3);
DECLARE type1 varchar(100);

select count(*) into i from users_registration where email = email1 and password = password1;


if i < 1 
then
set result = 'NO' ; 
else
SELECT type into type1 FROM verification_info vi WHERE vi.email = email1;

IF type1 = 'user'
THEN
set result = 'YES_USER' ;
ELSEIF type1 = 'admin'
THEN
SET result = 'YES_ADMIN';
END IF;

end if;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `old_photo` (IN `upload_link` VARCHAR(500), IN `email1` VARCHAR(100), OUT `existing_link` VARCHAR(500))  BEGIN


Select old_photo into existing_link from user_uploads where email = email1 ;


if existing_link = NULL
then 

set existing_link = 'not_set' ; 

end if;


update user_uploads set old_photo = upload_link where email = email1 ; 



END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `REGISTRATION` (IN `email1` VARCHAR(100), IN `full_name1` VARCHAR(100), IN `mobile1` VARCHAR(20), IN `institution_id1` VARCHAR(100), IN `password1` VARCHAR(100), IN `otp1` VARCHAR(100), OUT `result` VARCHAR(100))  BEGIN

DECLARE UID INT(3); 
SET UID = 0 ;
SELECT COUNT(*) INTO UID FROM users_registration  WHERE EMAIL=lower(email1) ;   

SELECT UID;

IF UID>0
THEN 

SET result="NO";

ELSE 

INSERT INTO users_registration (email,full_name,mobile,institution_id,password,registration_date,membership_number) VALUES (email1,full_name1, mobile1,institution_id1,password1,NOW(), 1000);

INSERT INTO verification_info (email,otp,status,type,visibility,completeness) VALUES (email1, otp1,'not_verified', 'user', 'full_name,institution_id,membership_number' , 60);

INSERT INTO users_info (email) VALUES (email1);
INSERT INTO users_address (email) VALUES (email1);
INSERT INTO user_uploads (email , recent_photo , old_photo) VALUES (email1 , 'not_set' , 'not_set');



SET result="YES";



END IF ;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_profile_address` (IN `id1` INT(100), IN `present_line11` VARCHAR(100), IN `present_district1` VARCHAR(100), IN `present_post_code1` INT(100), IN `present_country1` VARCHAR(200), IN `permanent_line11` VARCHAR(100), IN `permanent_district1` VARCHAR(100), IN `permanent_post_code1` INT(100), IN `permanent_country1` VARCHAR(200), OUT `result` VARCHAR(100))  BEGIN
DECLARE count int(5);


update all_info_together set  present_line1 = present_line11, present_district = present_district1, present_post_code = present_post_code1 , present_country = present_country1 , parmanent_line1 = permanent_line11 , parmanent_district = permanent_district1, parmanent_post_code = permanent_post_code1 , parmanent_country = permanent_country1 where id = id1 ;




set result = 'success' ;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_profile_basic` (IN `id1` INT(100), IN `full_name1` VARCHAR(100), IN `mobile1` VARCHAR(100), IN `institution_id1` VARCHAR(100), IN `blood_group1` VARCHAR(100), IN `nid_or_passport1` VARCHAR(200), IN `dob1` VARCHAR(200), OUT `result` VARCHAR(100))  BEGIN

DECLARE count int(5);

update all_info_together set  nid_or_passport = nid_or_passport1, date_of_birth = dob1 , blood_group = blood_group1 where id = id1 ;

update all_info_together set full_name = full_name1 , mobile = mobile1 , institution_id = institution_id1  where id = id1 ;


set result = 'success' ;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_profile_email` (IN `id1` VARCHAR(100), IN `email1` VARCHAR(100), IN `email2` VARCHAR(100), OUT `result` VARCHAR(100))  BEGIN

DECLARE count int(5);

SELECT COUNT(*) into COUNT FROM all_info_together where id = id1;

if COUNT = 0
THEN
update all_info_together ai set  email = email2 , ai.ur_email = email2 , ai.vi_email = email2 , ai.ui_email = email2 , ai.uu_email = email2  where ai.id = id1 ;

update user_photos set  email = email2 where email = email1 ;

update all_info_together set email_verification_status = 'not_verified' where id = id1;

set result = 'success' ;
ELSE
set result = 'email_exist';

END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_profile_forgot_password` (IN `email1` VARCHAR(100), IN `forgot_password_crypto1` VARCHAR(500), IN `purpose` VARCHAR(100), OUT `result` VARCHAR(100))  BEGIN

DECLARE count int(5);

if purpose = 'generate_crypto'
then
select count(*) into count from all_info_together where email = email1 ; 

if count >0 
then
update all_info_together set forgot_password_crypto = forgot_password_crypto1 where email = email1 ; 
set result = 'crypto_added' ; 
else
set result = 'no_email_found';
end if ;

elseif purpose = 'crypto_check'
then
select count(*) into count from all_info_together where email = email1 and forgot_password_crypto = forgot_password_crypto1 ;
if count > 0
then
set result = 'allow';
else
set result = 'invalid_link';
end if;

end if;





END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_profile_password` (IN `id1` VARCHAR(100), IN `password1` VARCHAR(500), OUT `result` VARCHAR(100))  BEGIN

DECLARE count int(5);


update all_info_together set password = password1 where id = id1 ;


set result = 'success' ;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_profile_personal` (IN `id1` VARCHAR(100), IN `fathers_name1` VARCHAR(100), IN `mothers_name1` VARCHAR(100), IN `spouse_name1` VARCHAR(100), IN `number_of_children1` INT(100), IN `profession1` VARCHAR(100), IN `workplace_or_institution1` VARCHAR(200), IN `designation1` VARCHAR(200), OUT `result` VARCHAR(100))  BEGIN

DECLARE count int(5);


update all_info_together set  fathers_name = fathers_name1, mother_name = mothers_name1 , spouse_name = spouse_name1, number_of_children = number_of_children1 , profession = profession1 , institution = workplace_or_institution1 , designation = designation1 where id = id1 ;



set result = 'success' ;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `upload_photo` (IN `purpose` VARCHAR(100), IN `upload_link` VARCHAR(500), IN `email1` VARCHAR(100), OUT `existing_link` VARCHAR(500), OUT `result` VARCHAR(100))  BEGIN


if purpose = 'recent_photo'
then
Select recent_photo into existing_link from user_uploads where email = email1 ;
update user_uploads set recent_photo = upload_link where email = email1 ;
UPDATE verification_info SET verification_info.completeness = verification_info.completeness + 10 WHERE verification_info.email = email1;

ELSEIF purpose = 'old_photo'
then
select old_photo into existing_link from user_uploads where email = email1;
update user_uploads set old_photo = upload_link where email = email1;
elseif purpose = 'group_photo'
then
insert into user_photos (email , group_photo) values (email1 , upload_link); 
end if;

SET result = 'success';


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `user_request` (IN `id1` INT(100), OUT `result` VARCHAR(100))  BEGIN
DECLARE count , mem_num int(5);

select ai.membership_number into mem_num from all_info_together ai WHERE ai.id = id1;

UPDATE all_info_together ai SET ai.status ='approved' , ai.completeness = 100   WHERE id = id1 ;

if mem_num = 1000
THEN

SELECT max(membership_number) into count from all_info_together ;
-- SELECT COUNT(*) int count FROM verification_info WHERE status = 'approved' ; 

UPDATE all_info_together ai SET ai.membership_number = count+1   WHERE id = id1 ;

END IF;


END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `all_info_together`
-- (See below for the actual view)
--
CREATE TABLE `all_info_together` (
`full_name` varchar(100)
,`mobile` varchar(20)
,`institution_id` varchar(100)
,`password` varchar(500)
,`registration_date` datetime(6)
,`membership_number` int(255)
,`gender` varchar(100)
,`nid_or_passport` varchar(100)
,`fathers_name` varchar(100)
,`mother_name` varchar(100)
,`spouse_name` varchar(100)
,`number_of_children` int(100)
,`profession` varchar(100)
,`designation` varchar(100)
,`institution` varchar(100)
,`blood_group` varchar(10)
,`date_of_birth` date
,`id_v_info` int(100)
,`otp` varchar(100)
,`forgot_password_crypto` varchar(500)
,`status` varchar(20)
,`email_verification_status` varchar(100)
,`change_request` varchar(100)
,`type` varchar(20)
,`visibility` varchar(1000)
,`completeness` int(10)
,`id` int(100)
,`recent_photo` varchar(400)
,`old_photo` varchar(400)
,`ur_email` varchar(100)
,`vi_email` varchar(100)
,`uu_email` varchar(100)
,`ui_email` varchar(100)
,`email` varchar(100)
,`users_address_id` int(100)
,`present_line1` varchar(300)
,`present_line2` varchar(300)
,`present_district` varchar(100)
,`present_post_code` varchar(100)
,`present_country` varchar(100)
,`parmanent_line1` varchar(300)
,`parmanent_line2` varchar(300)
,`parmanent_district` varchar(100)
,`parmanent_post_code` varchar(100)
,`parmanent_country` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `log_table`
--

CREATE TABLE `log_table` (
  `log_id` int(255) NOT NULL,
  `user` varchar(100) DEFAULT NULL,
  `log_info` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_table`
--

INSERT INTO `log_table` (`log_id`, `user`, `log_info`) VALUES
(1, NULL, 'riyad298@gmail.com'),
(2, NULL, 'riyad298@yahoo.com'),
(3, NULL, 'riyad298@yahoo.com'),
(4, NULL, 'riyada'),
(5, NULL, 'riyad298@gmail.com'),
(6, NULL, 'riyad298@gmail.com'),
(7, NULL, 'riyad298@gmail.com'),
(8, NULL, 'riyad298@gmail.com'),
(9, NULL, 'riyad298@gmail.com'),
(10, NULL, 'riyad298@gmail.com'),
(11, NULL, 'riyad298@gmail.com'),
(12, NULL, 'riyad298@gmail.com'),
(13, NULL, 'riyad298@gmail.com'),
(14, NULL, 'riyad298@gmail.com'),
(15, NULL, 'riyad298@gmail.com'),
(16, NULL, 'riyad298@gmail.com'),
(17, NULL, 'riyad298@gmail.com'),
(18, NULL, 'riyad298@gmail.com'),
(19, NULL, 'riyad298@gmail.com'),
(20, NULL, 'riyad298@gmail.com'),
(21, NULL, 'riyad298@gmail.com'),
(22, NULL, 'riyad298@gmail.com'),
(23, NULL, 'riyad298@gmail.com'),
(24, NULL, 'riyad298@gmail.com'),
(25, NULL, 'riyad298@gmail.com'),
(26, NULL, 'riyad298@gmail.com'),
(27, NULL, 'riyad298@gmail.com'),
(28, NULL, 'riyad298@gmail.com'),
(29, NULL, 'riyad298@gmail.com'),
(30, NULL, 'riyad298@gmail.com'),
(31, NULL, 'riyad298@gmail.com'),
(32, NULL, 'riyad298@gmail.com'),
(33, NULL, 'riyad298@gmail.com'),
(34, NULL, 'riyad298@gmail.com'),
(35, NULL, 'riyad298@gmail.com'),
(36, NULL, 'riyad298@gmail.com'),
(37, NULL, 'riyad298@gmail.com'),
(38, NULL, 'riyad298@gmail.com'),
(39, NULL, 'riyad298@gmail.com'),
(40, NULL, 'riyad298@gmail.com'),
(41, NULL, 'riyad298@gmail.com'),
(42, NULL, 'riyad298@gmail.com'),
(43, NULL, 'riyad298@gmail.com'),
(44, NULL, 'riyad298@gmail.com'),
(45, NULL, 'riyad298@gmail.com'),
(46, NULL, 'riyad298@gmail.com'),
(47, NULL, 'riyad298@yahoo.com'),
(48, NULL, 'riyad298@gmail.com'),
(49, NULL, 'riyad298@gmail.com'),
(50, NULL, 'riyad298@gmail.com'),
(51, NULL, 'riyad298@gmail.com'),
(52, NULL, 'riyad298@gmail.com'),
(53, NULL, 'riyad298@gmail.com'),
(54, NULL, 'riyad298@gmail.com'),
(55, NULL, 'riyad298@gmail.com'),
(56, NULL, 'riyad298@gmail.com'),
(57, NULL, 'riyad298@gmail.com'),
(58, NULL, 'riyad298@yahoo.com'),
(59, NULL, 'riyad298@gmail.com'),
(60, NULL, 'riyad298@gmail.com'),
(61, NULL, 'riyad298@gmail.com'),
(62, NULL, 'riyad298@gmail.com'),
(63, NULL, 'riyad298@gmail.com'),
(64, NULL, 'riyad298@gmail.com'),
(65, NULL, 'riyad298@gmail.com'),
(66, NULL, 'riyad298@gmail.com'),
(67, NULL, 'riyad298@gmail.com'),
(68, NULL, 'riyad298@gmail.com'),
(69, NULL, 'riyad298@gmail.com'),
(70, NULL, 'riyad298@gmail.com'),
(71, NULL, 'riyad298@gmail.com'),
(72, NULL, 'riyad298@gmail.com'),
(73, NULL, 'riyad298@gmail.com'),
(74, NULL, 'riyad298@gmail.com'),
(75, NULL, 'riyad298@gmail.com'),
(76, NULL, 'riyad298@gmail.com'),
(77, NULL, 'riyad298@gmail.com'),
(78, NULL, 'riyad298@gmail.com'),
(79, NULL, 'riyad298@gmail.com'),
(80, NULL, 'riyad298@gmail.com'),
(81, NULL, 'riyad298@gmail.com'),
(82, NULL, 'riyad298@gmail.com'),
(83, NULL, 'riyad298@gmail.com'),
(84, NULL, 'riyad298@gmail.com'),
(85, NULL, 'riyad298@gmail.com'),
(86, NULL, 'riyad298@gmail.com'),
(87, NULL, 'riyad298@yahoo.com'),
(88, NULL, 'riyad298@yahoo.com'),
(89, NULL, 'riyad298@yahoo.com'),
(90, NULL, 'riyad298@yahoo.com'),
(91, NULL, 'riyad298@yahoo.com'),
(92, NULL, 'riyad298@yahoo.com'),
(93, NULL, 'riyad298@yahoo.com'),
(94, NULL, 'riyad298@yahoo.com'),
(95, NULL, 'riyad298@gmail.com'),
(96, NULL, 'riyad298@gmail.com'),
(97, NULL, 'riyad298@gmail.com'),
(98, NULL, 'riyad298@gmail.com'),
(99, NULL, 'riyad298@gmail.com'),
(100, NULL, 'riyad298@gmail.com'),
(101, NULL, 'riyad298@yahoo.com'),
(102, NULL, 'riyad298@yahoo.com'),
(103, NULL, 'riyad298@yahoo.com'),
(104, NULL, 'riyad298@yahoo.com'),
(105, NULL, 'riyad298@yahoo.com'),
(106, NULL, 'riyad298@yahoo.com'),
(107, NULL, 'riyad298@gmail.com'),
(108, NULL, 'riyad298@gmail.com'),
(109, NULL, 'riyad298@yahoo.com'),
(110, NULL, 'riyad298@yahoo.com'),
(111, NULL, 'riyad298@gmail.com'),
(112, NULL, 'riyad298@yahoo.com'),
(113, NULL, 'riyad298@gmail.com'),
(114, NULL, 'riyad298@gmail.com'),
(115, NULL, 'riyad298@gmail.com'),
(116, NULL, 'riyad298@yahoo.com'),
(117, NULL, 'riyad298@yahoo.com'),
(118, NULL, 'riyad298@yahoo.com'),
(119, NULL, 'riyad298@gmail.com'),
(120, NULL, 'riyad298@gmail.com'),
(121, NULL, 'riyad298@yahoo.com'),
(122, NULL, 'riyad298@yahoo.com'),
(123, NULL, 'riyad298@yahoo.com'),
(124, NULL, 'riyad298@yahoo.com'),
(125, NULL, 'riyad298@yahoo.com'),
(126, NULL, 'riyad298@gmail.com'),
(127, NULL, 'riyad298@gmail.com'),
(128, NULL, 'riyad298@gmail.com'),
(129, NULL, 'riyad298@gmail.com'),
(130, NULL, 'riyad298@gmail.com'),
(131, NULL, 'riyad298@gmail.com'),
(132, NULL, 'riyad298@gmail.com'),
(133, NULL, 'riyad298@gmail.com'),
(134, NULL, 'riyad298@yahoo.com'),
(135, NULL, 'riyad298@yahoo.com'),
(136, NULL, 'riyad298@yahoo.com'),
(137, NULL, 'riyad298@yahoo.com'),
(138, NULL, 'riyad298@yahoo.com'),
(139, NULL, 'riyad298@yahoo.com'),
(140, NULL, 'riyad298@yahoo.com'),
(141, NULL, 'riyad298@yahoo.com'),
(142, NULL, 'riyad298@yahoo.com'),
(143, NULL, 'riyad298@yahoo.com'),
(144, NULL, 'riyad298@yahoo.com'),
(145, NULL, 'riyad298@yahoo.com'),
(146, NULL, 'riyad298@yahoo.com'),
(147, NULL, 'riyad298@yahoo.com'),
(148, NULL, 'riyad298@yahoo.com'),
(149, NULL, 'riyad298@yahoo.com'),
(150, NULL, 'riyad298@yahoo.com'),
(151, NULL, 'riyad298@yahoo.com'),
(152, NULL, 'riyad298@yahoo.com'),
(153, NULL, 'riyad298@gmail.com'),
(154, NULL, 'riyad298@gmail.com'),
(155, NULL, 'riyad298@yahoo.com'),
(156, NULL, 'riyad298@gmail.com'),
(157, NULL, 'riyad298@gmail.com'),
(158, NULL, 'riyad298@gmail.com'),
(159, NULL, 'riyad298@yahoo.com'),
(160, NULL, 'riyad298@yahoo.com'),
(161, NULL, 'riyad298@yahoo.com'),
(162, NULL, 'riyad298@yahoo.com'),
(163, NULL, 'riyad298@yahoo.com'),
(164, NULL, 'riyad298@yahoo.com'),
(165, NULL, 'riyad298@yahoo.com'),
(166, NULL, 'riyad298@yahoo.com'),
(167, NULL, 'riyad298@yahoo.com'),
(168, NULL, 'riyad298@yahoo.com'),
(169, NULL, 'riyad298@yahoo.com'),
(170, NULL, 'riyad298@yahoo.com'),
(171, NULL, 'riyad298@yahoo.com'),
(172, NULL, 'riyad298@yahoo.com'),
(173, NULL, 'riyad298@yahoo.com'),
(174, NULL, 'riyad298@yahoo.com'),
(175, NULL, 'riyad298@yahoo.com'),
(176, NULL, 'riyad298@yahoo.com'),
(177, NULL, 'riyad298@yahoo.com'),
(178, NULL, 'riyad298@yahoo.com'),
(179, NULL, 'riyad298@yahoo.com'),
(180, NULL, 'riyad298@yahoo.com'),
(181, NULL, 'riyad298@yahoo.com'),
(182, NULL, 'riyad298@yahoo.com'),
(183, NULL, 'riyad298@yahoo.com'),
(184, NULL, 'riyad298@yahoo.com'),
(185, NULL, 'riyad298@yahoo.com'),
(186, NULL, 'riyad298@yahoo.com'),
(187, NULL, 'riyad298@yahoo.com'),
(188, NULL, 'riyad298@yahoo.com'),
(189, NULL, 'riyad298@yahoo.com'),
(190, NULL, 'riyad298@yahoo.com'),
(191, NULL, 'riyad298@yahoo.com'),
(192, NULL, 'riyad298@yahoo.com'),
(193, NULL, 'riyad298@yahoo.com'),
(194, NULL, 'riyad298@yahoo.com'),
(195, NULL, 'riyad298@yahoo.com'),
(196, NULL, 'riyad298@yahoo.com'),
(197, NULL, 'riyad298@yahoo.com'),
(198, NULL, 'riyad298@hotmail.com'),
(199, NULL, 'riyad298@hotmail.com'),
(200, NULL, 'riyad298@hotmail.com'),
(201, NULL, 'riyad298@hotmail.com'),
(202, NULL, 'riyad298@hotmail.com'),
(203, NULL, 'riyad298@hotmail.com'),
(204, NULL, 'riyad298@hotmail.com'),
(205, NULL, 'riyad298@yahoo.com'),
(206, NULL, 'riyad298@yahoo.com'),
(207, NULL, 'riyad298@hotmail.com'),
(208, NULL, 'riyad298@hotmail.com'),
(209, NULL, 'riyad298@hotmail.com'),
(210, NULL, 'riyad298@hotmail.com'),
(211, NULL, 'riyad298@hotmail.com'),
(212, NULL, 'riyad298@hotmail.com'),
(213, NULL, 'riyad298@hotmail.com'),
(214, NULL, 'riyad298@hotmail.com'),
(215, NULL, 'riyad298@hotmail.com'),
(216, NULL, 'riyad298@hotmail.com'),
(217, NULL, 'riyad298@hotmail.com'),
(218, NULL, 'riyad298@hotmail.com'),
(219, NULL, 'riyad298@hotmail.com'),
(220, NULL, 'riyad298@hotmail.com'),
(221, NULL, 'riyad298@hotmail.com'),
(222, NULL, 'riyad298@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users_address`
--

CREATE TABLE `users_address` (
  `email` varchar(100) DEFAULT NULL,
  `users_address_id` int(100) NOT NULL,
  `present_line1` varchar(300) DEFAULT NULL,
  `present_line2` varchar(300) DEFAULT NULL,
  `present_district` varchar(100) DEFAULT NULL,
  `present_post_code` varchar(100) DEFAULT NULL,
  `present_country` varchar(100) DEFAULT NULL,
  `parmanent_line1` varchar(300) DEFAULT NULL,
  `parmanent_line2` varchar(300) DEFAULT NULL,
  `parmanent_district` varchar(100) DEFAULT NULL,
  `parmanent_post_code` varchar(100) DEFAULT NULL,
  `parmanent_country` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_address`
--

INSERT INTO `users_address` (`email`, `users_address_id`, `present_line1`, `present_line2`, `present_district`, `present_post_code`, `present_country`, `parmanent_line1`, `parmanent_line2`, `parmanent_district`, `parmanent_post_code`, `parmanent_country`) VALUES
('riyad298@gmail.com', 1, 'kaa-153/3', NULL, 'dhaka north', '3900', 'bangladesh', 'house 4 , protap', NULL, 'kurigram', '5600', 'bangladesh'),
('riyad298@yahoo.com', 2, 'kaa-153/3', NULL, 'dhaka', '3900', 'bangladesh', 'protap', NULL, 'kurigram', '5600', 'bangladesh'),
('riyad298@hotmail.com', 3, 'dhaka', NULL, 'dhaka', '5600', 'bangladesh', 'kurigram', NULL, 'kurigram', '5600', 'bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

CREATE TABLE `users_info` (
  `email` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `ui_id` int(100) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_info`
--

INSERT INTO `users_info` (`email`, `gender`, `ui_id`, `nid_or_passport`, `fathers_name`, `mother_name`, `spouse_name`, `number_of_children`, `profession`, `designation`, `institution`, `blood_group`, `date_of_birth`) VALUES
('riyad298@gmail.com', NULL, 0, '111111111111', 'Barkat Alam', 'Urmee', 'Maliha', 0, 'student', 'student', 'aiuba', 'O+', '1992-08-02'),
('riyad298@yahoo.com', NULL, 0, '11555511144', 'Barkat Alam', 'Sultana', 'Tahera', 0, 'student', 'student', 'aiub dhaka', 'O+', '1992-11-12'),
('riyad298@hotmail.com', NULL, 0, '1369845635', 'Rubel', 'Nihar', 'Borno', 0, 'student', 'student', 'kghs kurigram', 'O+', '1992-08-02');

-- --------------------------------------------------------

--
-- Table structure for table `users_registration`
--

CREATE TABLE `users_registration` (
  `email` varchar(100) DEFAULT NULL,
  `id` int(100) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `institution_id` varchar(100) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `registration_date` datetime(6) DEFAULT NULL,
  `membership_number` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_registration`
--

INSERT INTO `users_registration` (`email`, `id`, `full_name`, `mobile`, `institution_id`, `password`, `registration_date`, `membership_number`) VALUES
('riyad298@gmail.com', 1, 'Md Ahsan Ferdous Riyad', '01919448787', '15-29804-2', 'e10adc3949ba59abbe56e057f20f883e', '2019-11-18 03:08:20.000000', 1037),
('riyad298@yahoo.com', 2, 'Ahsan Ferdous Riyad', '01919448787', 'riyad', '29cf2160ad1165db8dacdfd2eedcf5d0', '2019-11-18 14:55:01.000000', 1025),
('riyad298@hotmail.com', 3, 'Munem Rimo', '01919448787', '15-29804-2', '29cf2160ad1165db8dacdfd2eedcf5d0', '2019-11-20 03:03:27.000000', 1038);

-- --------------------------------------------------------

--
-- Table structure for table `user_photos`
--

CREATE TABLE `user_photos` (
  `group_photo` varchar(400) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `id_user_photos` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_photos`
--

INSERT INTO `user_photos` (`group_photo`, `email`, `id_user_photos`) VALUES
('riyad298@gmail.com.png', 'riyad298@gmail.com', 3),
('riyad298@hotmail.com.jpg', 'riyad298@hotmail.com', 11);

-- --------------------------------------------------------

--
-- Table structure for table `user_uploads`
--

CREATE TABLE `user_uploads` (
  `id_user_uploads` int(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `recent_photo` varchar(400) DEFAULT NULL,
  `old_photo` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_uploads`
--

INSERT INTO `user_uploads` (`id_user_uploads`, `email`, `recent_photo`, `old_photo`) VALUES
(1, 'riyad298@gmail.com', 'riyad298@gmail.com.jpg', 'riyad298@gmail.com.jpg'),
(2, 'riyad298@yahoo.com', 'riyad298@yahoo.com.jpg', 'not_set'),
(3, 'riyad298@hotmail.com', 'riyad298@hotmail.com.png', 'riyad298@hotmail.com.png');

-- --------------------------------------------------------

--
-- Table structure for table `verification_info`
--

CREATE TABLE `verification_info` (
  `id_v_info` int(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `otp` varchar(100) DEFAULT NULL,
  `forgot_password_crypto` varchar(500) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `email_verification_status` varchar(100) DEFAULT 'not_verified',
  `change_request` varchar(100) NOT NULL DEFAULT 'not_requested',
  `type` varchar(20) DEFAULT NULL,
  `visibility` varchar(1000) DEFAULT NULL,
  `completeness` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `verification_info`
--

INSERT INTO `verification_info` (`id_v_info`, `email`, `otp`, `forgot_password_crypto`, `status`, `email_verification_status`, `change_request`, `type`, `visibility`, `completeness`) VALUES
(1, 'riyad298@gmail.com', '7724', '335f5352088d7d9bf74191e006d8e24c', 'approved', 'verified', 'not_requested', 'admin', 'full_name,email,mobile,institution_id,nid_or_passport,fathers_name,present_line1,parmanent_country,membership_number', 100),
(2, 'riyad298@yahoo.com', '7882', 'dc6a6489640ca02b0d42dabeb8e46bb7', 'approved', 'verified', 'not_requested', 'admin', 'full_name,institution_id,membership_number', 100),
(3, 'riyad298@hotmail.com', '9964', NULL, 'approved', 'verified', 'not_requested', 'user', 'full_name,institution_id,membership_number', 100);

--
-- Triggers `verification_info`
--
DELIMITER $$
CREATE TRIGGER `keep_log` AFTER UPDATE ON `verification_info` FOR EACH ROW BEGIN
INSERT into log_table ( log_table.log_info ) VALUES ( OLD.email );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure for view `all_info_together`
--
DROP TABLE IF EXISTS `all_info_together`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `all_info_together`  AS  select `ur`.`full_name` AS `full_name`,`ur`.`mobile` AS `mobile`,`ur`.`institution_id` AS `institution_id`,`ur`.`password` AS `password`,`ur`.`registration_date` AS `registration_date`,`ur`.`membership_number` AS `membership_number`,`ui`.`gender` AS `gender`,`ui`.`nid_or_passport` AS `nid_or_passport`,`ui`.`fathers_name` AS `fathers_name`,`ui`.`mother_name` AS `mother_name`,`ui`.`spouse_name` AS `spouse_name`,`ui`.`number_of_children` AS `number_of_children`,`ui`.`profession` AS `profession`,`ui`.`designation` AS `designation`,`ui`.`institution` AS `institution`,`ui`.`blood_group` AS `blood_group`,`ui`.`date_of_birth` AS `date_of_birth`,`vi`.`id_v_info` AS `id_v_info`,`vi`.`otp` AS `otp`,`vi`.`forgot_password_crypto` AS `forgot_password_crypto`,`vi`.`status` AS `status`,`vi`.`email_verification_status` AS `email_verification_status`,`vi`.`change_request` AS `change_request`,`vi`.`type` AS `type`,`vi`.`visibility` AS `visibility`,`vi`.`completeness` AS `completeness`,`ur`.`id` AS `id`,`uu`.`recent_photo` AS `recent_photo`,`uu`.`old_photo` AS `old_photo`,`ur`.`email` AS `ur_email`,`vi`.`email` AS `vi_email`,`uu`.`email` AS `uu_email`,`ui`.`email` AS `ui_email`,`ua`.`email` AS `email`,`ua`.`users_address_id` AS `users_address_id`,`ua`.`present_line1` AS `present_line1`,`ua`.`present_line2` AS `present_line2`,`ua`.`present_district` AS `present_district`,`ua`.`present_post_code` AS `present_post_code`,`ua`.`present_country` AS `present_country`,`ua`.`parmanent_line1` AS `parmanent_line1`,`ua`.`parmanent_line2` AS `parmanent_line2`,`ua`.`parmanent_district` AS `parmanent_district`,`ua`.`parmanent_post_code` AS `parmanent_post_code`,`ua`.`parmanent_country` AS `parmanent_country` from ((((`users_registration` `ur` join `users_info` `ui`) join `users_address` `ua`) join `verification_info` `vi`) join `user_uploads` `uu`) where `uu`.`email` = `ur`.`email` and `ui`.`email` = `ur`.`email` and `ua`.`email` = `ur`.`email` and `vi`.`email` = `ur`.`email` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log_table`
--
ALTER TABLE `log_table`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `users_address`
--
ALTER TABLE `users_address`
  ADD PRIMARY KEY (`users_address_id`);

--
-- Indexes for table `users_registration`
--
ALTER TABLE `users_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_photos`
--
ALTER TABLE `user_photos`
  ADD PRIMARY KEY (`id_user_photos`);

--
-- Indexes for table `user_uploads`
--
ALTER TABLE `user_uploads`
  ADD PRIMARY KEY (`id_user_uploads`);

--
-- Indexes for table `verification_info`
--
ALTER TABLE `verification_info`
  ADD PRIMARY KEY (`id_v_info`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_table`
--
ALTER TABLE `log_table`
  MODIFY `log_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT for table `users_address`
--
ALTER TABLE `users_address`
  MODIFY `users_address_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users_registration`
--
ALTER TABLE `users_registration`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_photos`
--
ALTER TABLE `user_photos`
  MODIFY `id_user_photos` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_uploads`
--
ALTER TABLE `user_uploads`
  MODIFY `id_user_uploads` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `verification_info`
--
ALTER TABLE `verification_info`
  MODIFY `id_v_info` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
