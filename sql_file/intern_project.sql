-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2019 at 09:11 PM
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `count_request` (OUT `verification_request1` VARCHAR(100), OUT `change_request1` VARCHAR(100))  BEGIN
       
select count(*) into verification_request1 from all_info_together ai where  ai.completeness = 100 and email_verification_status = 'verified' and status = 'not_verified';
           
select count(*) into change_request1 from all_info_together ai where ai.completeness = 100 and status = 'approved' and change_request = 'requested' and type = 'user';

  
            
END$$

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

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_profile_address` (IN `id1` INT(100), IN `last_verified_info1` VARCHAR(1000), IN `present_line11` VARCHAR(100), IN `present_district1` VARCHAR(100), IN `present_post_code1` INT(100), IN `present_country1` VARCHAR(200), IN `permanent_line11` VARCHAR(100), IN `permanent_district1` VARCHAR(100), IN `permanent_post_code1` INT(100), IN `permanent_country1` VARCHAR(200), OUT `result` VARCHAR(100))  BEGIN
DECLARE count int(5);

DECLARE verification_status varchar(100);
DECLARE change_req_status varchar(100);
DECLARE user_type varchar(100);



select status into verification_status from all_info_together where id = id1;
select change_request into change_req_status from all_info_together where id = id1;
select type into user_type from all_info_together where id = id1;


update all_info_together set  present_line1 = present_line11, present_district = present_district1, present_post_code = present_post_code1 , present_country = present_country1 , parmanent_line1 = permanent_line11 , parmanent_district = permanent_district1, parmanent_post_code = permanent_post_code1 , parmanent_country = permanent_country1 where id = id1 ;

IF verification_status = 'approved' and change_req_status = 'not_requested' OR change_req_status = 'approved' and user_type !='admin'
THEN
UPDATE all_info_together set change_request = 'requested' , last_verified_info = last_verified_info1 , all_info_together.change_request_time = NOW() WHERE id = id1;
ELSE 
UPDATE all_info_together set change_request = 'requested' , all_info_together.change_request_time = NOW() WHERE id = id1;
end IF;




set result = 'success' ;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_profile_basic` (IN `id1` INT(100), IN `last_verified_info1` VARCHAR(1000), IN `full_name1` VARCHAR(100), IN `mobile1` VARCHAR(100), IN `institution_id1` VARCHAR(100), IN `blood_group1` VARCHAR(100), IN `nid_or_passport1` VARCHAR(200), IN `dob1` VARCHAR(200), OUT `result` VARCHAR(100))  BEGIN

DECLARE count int(5);


DECLARE verification_status varchar(100);
DECLARE change_req_status varchar(100);
DECLARE user_type varchar(100);


select status into verification_status from all_info_together where id = id1;
select change_request into change_req_status from all_info_together where id = id1;
select type into user_type from all_info_together where id = id1;


update all_info_together set  nid_or_passport = nid_or_passport1, date_of_birth = dob1 , blood_group = blood_group1 where id = id1 ;

update all_info_together set full_name = full_name1 , mobile = mobile1 , institution_id = institution_id1  where id = id1 ;



IF verification_status = 'approved' and change_req_status = 'not_requested' OR change_req_status = 'approved' and user_type !='admin'
THEN
UPDATE all_info_together set change_request = 'requested' , last_verified_info = last_verified_info1 , all_info_together.change_request_time = NOW() WHERE id = id1;
ELSE
UPDATE all_info_together set change_request = 'requested' , all_info_together.change_request_time = NOW() WHERE id = id1;
end IF;


set result = 'success' ;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_profile_email` (IN `id1` VARCHAR(100), IN `email1` VARCHAR(100), IN `email2` VARCHAR(100), IN `otp1` VARCHAR(100), OUT `result` VARCHAR(100))  BEGIN

DECLARE count int(5);

select COUNT(*) into count from verification_info WHERE email = email1 and otp = otp1;

if count = 0
THEN
set result = 'invalid_otp';
else 

UPDATE verification_info SET email_verification_status = 'verified' WHERE email = email1;

UPDATE users_address set email = email2 WHERE email = email1;
UPDATE users_info set email = email2 WHERE email = email1;
UPDATE users_registration set email = email2 WHERE email = email1;
UPDATE user_photos set email = email2 WHERE email = email1;
UPDATE user_uploads set email = email2 WHERE email = email1;
UPDATE verification_info set email = email2 WHERE email = email1;

set result = 'success';

END IF;

if otp1 = 'change_email_for_admin'
THEN
select COUNT(*) into count from all_info_together ai where ai.email = email1;

if count = 0
THEN
UPDATE users_address set email = email2 WHERE email = email1;
UPDATE users_info set email = email2 WHERE email = email1;
UPDATE users_registration set email = email2 WHERE email = email1;
UPDATE user_photos set email = email2 WHERE email = email1;
UPDATE user_uploads set email = email2 WHERE email = email1;
UPDATE verification_info set email = email2 WHERE email = email1;

set result = 'email_updated';

else
set result = 'email_already_used';

END IF;

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

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_profile_personal` (IN `id1` VARCHAR(100), IN `last_verified_info1` VARCHAR(1000), IN `fathers_name1` VARCHAR(100), IN `mothers_name1` VARCHAR(100), IN `spouse_name1` VARCHAR(100), IN `number_of_children1` INT(100), IN `profession1` VARCHAR(100), IN `workplace_or_institution1` VARCHAR(200), IN `designation1` VARCHAR(200), OUT `result` VARCHAR(100))  BEGIN

DECLARE count int(5);

DECLARE verification_status varchar(100);
DECLARE change_req_status varchar(100);
DECLARE user_type varchar(100);

select status into verification_status from all_info_together where id = id1;
select change_request into change_req_status from all_info_together where id = id1;
select type into user_type FROM all_info_together WHERE id = id1;


update all_info_together set  fathers_name = fathers_name1, mother_name = mothers_name1 , spouse_name = spouse_name1, number_of_children = number_of_children1 , profession = profession1 , institution = workplace_or_institution1 , designation = designation1 where id = id1 ;


IF verification_status = 'approved' and change_req_status = 'not_requested' OR change_req_status = 'approved' and user_type !='admin'
THEN
UPDATE all_info_together set change_request = 'requested' , last_verified_info = last_verified_info1 , all_info_together.change_request_time = NOW() WHERE id = id1;
ELSE
UPDATE all_info_together set change_request = 'requested' , all_info_together.change_request_time = NOW() WHERE id = id1;
end IF;




set result = 'success' ;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `upload_photo` (IN `purpose` VARCHAR(100), IN `upload_link` VARCHAR(500), IN `email1` VARCHAR(100), IN `id1` INT(100), OUT `existing_link` VARCHAR(500), OUT `result` VARCHAR(100))  BEGIN


if purpose = 'recent_photo'
then
Select recent_photo into existing_link from all_info_together where email = email1 ;
update all_info_together set recent_photo = upload_link where id = id1 ;


ELSEIF purpose = 'old_photo'
then
select old_photo into existing_link from all_info_together ai where ai.id = id1;
update all_info_together set old_photo = upload_link where email = email1;
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
,`change_request_time` datetime(6)
,`type` varchar(20)
,`visibility` varchar(1000)
,`completeness` int(10)
,`last_verified_info` varchar(5000)
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
(222, NULL, 'riyad298@hotmail.com'),
(223, NULL, 'riyad298@yahoo.com'),
(224, NULL, 'riyad298@gmail.com'),
(225, NULL, 'riyad298@gmail.com'),
(226, NULL, 'riyad298@gmail.com'),
(227, NULL, 'riyad298@gmail.com'),
(228, NULL, 'riyad298@gmail.com'),
(229, NULL, 'riyad298@gmail.com'),
(230, NULL, 'riyad298@gmail.com'),
(231, NULL, 'riyad298@gmail.com'),
(232, NULL, 'riyad298@gmail.com'),
(233, NULL, 'riyad298@gmail.com'),
(234, NULL, 'riyad298@gmail.com'),
(235, NULL, 'riyad298@gmail.com'),
(236, NULL, 'riyad298@gmail.com'),
(237, NULL, 'riyad298@gmail.com'),
(238, NULL, 'riyad298@gmail.com'),
(239, NULL, 'riyad298@gmail.com'),
(240, NULL, 'riyad298@gmail.com'),
(241, NULL, 'riyad298@gmail.com'),
(242, NULL, 'riyad298@gmail.com'),
(243, NULL, 'riyad298@gmail.com'),
(244, NULL, 'riyad298@gmail.com'),
(245, NULL, 'riyad298@gmail.com'),
(246, NULL, 'riyad298@gmail.com'),
(247, NULL, 'riyad298@gmail.com'),
(248, NULL, 'riyad298@gmail.com'),
(249, NULL, 'riyad298@gmail.com'),
(250, NULL, 'riyad298@gmail.com'),
(251, NULL, 'riyad298@gmail.com'),
(252, NULL, 'riyad298@gmail.com'),
(253, NULL, 'riyad298@gmail.com'),
(254, NULL, 'riyad298@gmail.com'),
(255, NULL, 'riyad298@gmail.com'),
(256, NULL, 'riyad298@gmail.com'),
(257, NULL, 'riyad298@gmail.com'),
(258, NULL, 'riyad298@gmail.com'),
(259, NULL, 'riyad298@gmail.com'),
(260, NULL, 'riyad298@gmail.com'),
(261, NULL, 'riyad298@gmail.com'),
(262, NULL, 'riyad298@gmail.com'),
(263, NULL, 'riyad298@gmail.com'),
(264, NULL, 'riyad298@gmail.com'),
(265, NULL, 'riyad298@gmail.com'),
(266, NULL, 'riyad298@gmail.com'),
(267, NULL, 'riyad298@gmail.com'),
(268, NULL, 'riyad298@gmail.com'),
(269, NULL, 'riyad298@gmail.com'),
(270, NULL, 'riyad298@gmail.com'),
(271, NULL, 'riyad298@gmail.com'),
(272, NULL, 'riyad298@gmail.com'),
(273, NULL, 'riyad298@gmail.com'),
(274, NULL, 'riyad298@gmail.com'),
(275, NULL, 'riyad298@gmail.com'),
(276, NULL, 'riyad298@gmail.com'),
(277, NULL, 'riyad298@gmail.com'),
(278, NULL, 'riyad298@gmail.com'),
(279, NULL, 'riyad298@gmail.com'),
(280, NULL, 'riyad298@gmail.com'),
(281, NULL, 'riyad298@gmail.com'),
(282, NULL, 'riyad298@gmail.com'),
(283, NULL, 'riyad298@gmail.com'),
(284, NULL, 'riyad298@gmail.com'),
(285, NULL, 'riyad298@gmail.com'),
(286, NULL, 'riyad298@gmail.com'),
(287, NULL, 'riyad298@gmail.com'),
(288, NULL, 'riyad298@gmail.com'),
(289, NULL, 'riyad298@gmail.com'),
(290, NULL, 'riyad298@gmail.com'),
(291, NULL, 'riyad298@gmail.com'),
(292, NULL, 'riyad298@gmail.com'),
(293, NULL, 'riyad298@gmail.com'),
(294, NULL, 'riyad298@gmail.com'),
(295, NULL, 'riyad298@gmail.com'),
(296, NULL, 'riyad298@gmail.com'),
(297, NULL, 'riyad298@gmail.com'),
(298, NULL, 'riyad298@gmail.com'),
(299, NULL, 'riyad298@gmail.com'),
(300, NULL, 'riyad298@gmail.com'),
(301, NULL, 'riyad298@gmail.com'),
(302, NULL, 'riyad298@gmail.com'),
(303, NULL, 'riyad298@gmail.com'),
(304, NULL, 'riyad298@gmail.com'),
(305, NULL, 'riyad298@gmail.com'),
(306, NULL, 'riyad298@gmail.com'),
(307, NULL, 'riyad298@gmail.com'),
(308, NULL, 'riyad298@gmail.com'),
(309, NULL, 'riyad298@gmail.com'),
(310, NULL, 'riyad298@gmail.com'),
(311, NULL, 'riyad298@gmail.com'),
(312, NULL, 'riyad298@gmail.com'),
(313, NULL, 'riyad298@gmail.com'),
(314, NULL, 'riyad298@gmail.com'),
(315, NULL, 'riyad298@gmail.com'),
(316, NULL, 'riyad298@gmail.com'),
(317, NULL, 'riyad298@gmail.com'),
(318, NULL, 'riyad298@gmail.com'),
(319, NULL, 'riyad298@gmail.com'),
(320, NULL, 'riyad298@gmail.com'),
(321, NULL, 'riyad298@gmail.com'),
(322, NULL, 'riyad298@gmail.com'),
(323, NULL, 'riyad298@gmail.com'),
(324, NULL, 'riyad298@gmail.com'),
(325, NULL, 'riyad298@gmail.com'),
(326, NULL, 'riyad298@gmail.com'),
(327, NULL, 'riyad298@gmail.com'),
(328, NULL, 'riyad298@gmail.com'),
(329, NULL, 'riyad298@gmail.com'),
(330, NULL, 'riyad298@gmail.com'),
(331, NULL, 'riyad298@gmail.com'),
(332, NULL, 'riyad298@gmail.com'),
(333, NULL, 'riyad298@gmail.com'),
(334, NULL, 'riyad298@gmail.com'),
(335, NULL, 'riyad298@gmail.com'),
(336, NULL, 'riyad298@gmail.com'),
(337, NULL, 'riyad298@gmail.com'),
(338, NULL, 'riyad298@gmail.com'),
(339, NULL, 'riyad298@gmail.com'),
(340, NULL, 'riyad298@gmail.com'),
(341, NULL, 'riyad298@gmail.com'),
(342, NULL, 'riyad298@gmail.com'),
(343, NULL, 'riyad298@gmail.com'),
(344, NULL, 'riyad298@gmail.com'),
(345, NULL, 'riyad298@gmail.com'),
(346, NULL, 'riyad298@gmail.com'),
(347, NULL, 'riyad298@gmail.com'),
(348, NULL, 'riyad298@gmail.com'),
(349, NULL, 'riyad298@gmail.com'),
(350, NULL, 'riyad298@gmail.com'),
(351, NULL, 'riyad298@gmail.com'),
(352, NULL, 'riyad298@gmail.com'),
(353, NULL, 'riyad298@gmail.com'),
(354, NULL, 'riyad298@gmail.com'),
(355, NULL, 'riyad298@gmail.com'),
(356, NULL, 'riyad298@gmail.com'),
(357, NULL, 'riyad298@gmail.com'),
(358, NULL, 'riyad298@gmail.com'),
(359, NULL, 'riyad298@gmail.com'),
(360, NULL, 'riyad298@gmail.com'),
(361, NULL, 'riyad298@gmail.com'),
(362, NULL, 'riyad298@yahoo.com'),
(363, NULL, 'riyad298@yahoo.com'),
(364, NULL, 'riyad298@yahoo.com'),
(365, NULL, 'riyad298@yahoo.com'),
(366, NULL, 'riyad298@yahoo.com'),
(367, NULL, 'riyad298@yahoo.com'),
(368, NULL, 'riyad298@yahoo.com'),
(369, NULL, 'riyad298@yahoo.com'),
(370, NULL, 'riyad298@yahoo.com'),
(371, NULL, 'riyad298@yahoo.com'),
(372, NULL, 'riyad298@yahoo.com'),
(373, NULL, 'riyad298@yahoo.com'),
(374, NULL, 'riyad298@hotmail.com'),
(375, NULL, 'riyad298@gmail.com'),
(376, NULL, 'riyad298@gmail.com'),
(377, NULL, 'riyad298@gmail.com'),
(378, NULL, 'riyad298@gmail.com'),
(379, NULL, 'riyad298@gmail.com'),
(380, NULL, 'riyad298@gmail.com'),
(381, NULL, 'riyad298@gmail.com'),
(382, NULL, 'riyad298@gmail.com'),
(383, NULL, 'riyad298@gmail.com'),
(384, NULL, 'riyad298@gmail.com'),
(385, NULL, 'riyad298@yahoo.com'),
(386, NULL, 'riyad298@gmail.com'),
(387, NULL, 'riyad298@gmail.com'),
(388, NULL, 'riyad298@gmail.com'),
(389, NULL, 'riyad298@gmail.com'),
(390, NULL, 'riyad298@gmail.com'),
(391, NULL, 'riyad298@gmail.com'),
(392, NULL, 'riyad298@gmail.com'),
(393, NULL, 'riyad298@gmail.com'),
(394, NULL, 'riyad298@gmail.com'),
(395, NULL, 'riyad298@gmail.com'),
(396, NULL, 'riyad298@gmail.com'),
(397, NULL, 'riyad298@yahoo.com'),
(398, NULL, 'riyad298@yahoo.com'),
(399, NULL, 'riyad298@yahoo.com'),
(400, NULL, 'riyad298@yahoo.com'),
(401, NULL, 'riyad298@yahoo.com'),
(402, NULL, 'riyad298@gmail.com'),
(403, NULL, 'riyad298@gmail.com'),
(404, NULL, 'riyad298@gmail.com'),
(405, NULL, 'riyad298@gmail.com'),
(406, NULL, 'riyad298@gmail.com'),
(407, NULL, 'riyad298@gmail.com'),
(408, NULL, 'riyad298@gmail.com'),
(409, NULL, 'riyad298@gmail.com'),
(410, NULL, 'riyad298@gmail.com'),
(411, NULL, 'riyad298@gmail.com'),
(412, NULL, 'riyad298@gmail.com'),
(413, NULL, 'riyad298@gmail.com'),
(414, NULL, 'riyad298@gmail.com'),
(415, NULL, 'riyad298@gmail.com'),
(416, NULL, 'riyad298@gmail.com'),
(417, NULL, 'riyad298@gmail.com'),
(418, NULL, 'riyad298@hotmail.com'),
(419, NULL, 'riyad298@gmail.com'),
(420, NULL, 'riyad298@gmail.com'),
(421, NULL, 'riyad298@gmail.com'),
(422, NULL, 'riyad298@gmail.com'),
(423, NULL, 'ahsan.riyad@outlook.com'),
(424, NULL, 'ahsan.riyad@outlook.com'),
(425, NULL, 'riyad298@gmail.com'),
(426, NULL, 'riyad298@gmail.com'),
(427, NULL, 'riyad298@gmail.com'),
(428, NULL, 'riyad298@gmail.com'),
(429, NULL, 'riyad298@gmail.com'),
(430, NULL, 'ahsan.riyad@outlook.com'),
(431, NULL, 'ahsan.riyad@outlook.com'),
(432, NULL, 'ahsan.riyad@outlook.com'),
(433, NULL, 'riyad298@gmail.com'),
(434, NULL, 'riyad298@gmail.com'),
(435, NULL, 'riyad298@gmail.com'),
(436, NULL, 'riyad298@gmail.com'),
(437, NULL, 'riyad298@gmail.com'),
(438, NULL, 'riyad298@gmail.com'),
(439, NULL, 'riyad298@gmail.com'),
(440, NULL, 'riyad298@gmail.com'),
(441, NULL, 'riyad298@gmail.com'),
(442, NULL, 'riyad298@gmail.com'),
(443, NULL, 'riyad298@gmail.com'),
(444, NULL, 'riyad298@gmail.com'),
(445, NULL, 'riyad298@gmail.com'),
(446, NULL, 'riyad298@gmail.com'),
(447, NULL, 'riyad298@gmail.com'),
(448, NULL, 'riyad298@gmail.com'),
(449, NULL, 'riyad298@gmail.com'),
(450, NULL, 'riyad298@gmail.com'),
(451, NULL, 'ahsan.riyad@outlook.com'),
(452, NULL, 'ahsan.riyad@outlook.com'),
(453, NULL, 'ahsan.riyad@outlook.com'),
(454, NULL, 'ahsan.riyad@outlook.com'),
(455, NULL, 'ahsan.riyad@outlook.com'),
(456, NULL, 'ahsan.riyad@outlook.com'),
(457, NULL, 'ahsan.riyad@outlook.com'),
(458, NULL, 'ahsan.riyad@outlook.com'),
(459, NULL, 'ahsan.riyad@outlook.com'),
(460, NULL, 'ahsan.riyad@outlook.com'),
(461, NULL, 'ahsan.riyad@outlook.com'),
(462, NULL, 'ahsan.riyad@outlook.com'),
(463, NULL, 'ahsan.riyad@outlook.com'),
(464, NULL, 'ahsan.riyad@outlook.com'),
(465, NULL, 'ahsan.riyad@outlook.com'),
(466, NULL, 'ahsan.riyad@outlook.com'),
(467, NULL, 'ahsan.riyad@outlook.com'),
(468, NULL, 'ahsan.riyad@outlook.com'),
(469, NULL, 'ahsan.riyad@outlook.com'),
(470, NULL, 'ahsan.riyad@outlook.com'),
(471, NULL, 'ahsan.riyad@outlook.com'),
(472, NULL, 'ahsan.riyad@outlook.com'),
(473, NULL, 'ahsan.riyad@outlook.com'),
(474, NULL, 'ahsan.riyad@outlook.com'),
(475, NULL, 'ahsan.riyad@outlook.com'),
(476, NULL, 'ahsan.riyad@outlook.com'),
(477, NULL, 'ahsan.riyad@outlook.com'),
(478, NULL, 'ahsan.riyad@outlook.com'),
(479, NULL, 'ahsan.riyad@outlook.com'),
(480, NULL, 'ahsan.riyad@outlook.com'),
(481, NULL, 'ahsan.riyad@outlook.com'),
(482, NULL, 'ahsan.riyad@outlook.com'),
(483, NULL, 'ahsan.riyad@outlook.com'),
(484, NULL, 'ahsan.riyad@outlook.com'),
(485, NULL, 'ahsan.riyad@outlook.com'),
(486, NULL, 'ahsan.riyad@outlook.com'),
(487, NULL, 'ahsan.riyad@outlook.com'),
(488, NULL, 'ahsan.riyad@outlook.com'),
(489, NULL, 'ahsan.riyad@outlook.com'),
(490, NULL, 'ahsan.riyad@outlook.com'),
(491, NULL, 'ahsan.riyad@outlook.com'),
(492, NULL, 'ahsan.riyad@outlook.com'),
(493, NULL, 'ahsan.riyad@outlook.com'),
(494, NULL, 'ahsan.riyad@outlook.com'),
(495, NULL, 'ahsan.riyad@outlook.com'),
(496, NULL, 'ahsan.riyad@outlook.com'),
(497, NULL, 'ahsan.riyad@outlook.com'),
(498, NULL, 'ahsan.riyad@outlook.com'),
(499, NULL, 'ahsan.riyad@outlook.com'),
(500, NULL, 'riyad298@yahoo.com'),
(501, NULL, 'riyad298@yahoo.com'),
(502, NULL, 'riyad298@yahoo.com'),
(503, NULL, 'riyad298@yahoo.com'),
(504, NULL, 'riyad298@yahoo.com'),
(505, NULL, 'riyad298@yahoo.com'),
(506, NULL, 'riyad298@yahoo.com'),
(507, NULL, 'riyad298@yahoo.com'),
(508, NULL, 'ahsan.riyad@outlook.com'),
(509, NULL, 'ahsan.riyad@outlook.com'),
(510, NULL, 'ahsan.riyad@outlook.com'),
(511, NULL, 'ahsan.riyad@outlook.com'),
(512, NULL, 'ahsan.riyad@outlook.com'),
(513, NULL, 'ahsan.riyad@outlook.com'),
(514, NULL, 'riyad298@yahoo.com'),
(515, NULL, 'riyad298@yahoo.com'),
(516, NULL, 'riyad298@yahoo.com'),
(517, NULL, 'ahsan.riyad@outlook.com'),
(518, NULL, 'ahsan.riyad@outlook.com'),
(519, NULL, 'ahsan.riyad@outlook.com'),
(520, NULL, 'ahsan.riyad@outlook.com'),
(521, NULL, 'ahsan.riyad@outlook.com'),
(522, NULL, 'ahsan.riyad@outlook.com'),
(523, NULL, 'ahsan.riyad@outlook.com'),
(524, NULL, 'ahsan.riyad@outlook.com'),
(525, NULL, 'ahsan.riyad@outlook.com'),
(526, NULL, 'ahsan.riyad@outlook.com'),
(527, NULL, 'ahsan.riyad@outlook.com'),
(528, NULL, 'ahsan.riyad@outlook.com'),
(529, NULL, 'ahsan.riyad@outlook.com'),
(530, NULL, 'ahsan.riyad@outlook.com'),
(531, NULL, 'ahsan.riyad@outlook.com'),
(532, NULL, 'ahsan.riyad@outlook.com'),
(533, NULL, 'ahsan.riyad@outlook.com'),
(534, NULL, 'ahsan.riyad@outlook.com'),
(535, NULL, 'ahsan.riyad@outlook.com'),
(536, NULL, 'ahsan.riyad@outlook.com'),
(537, NULL, 'ahsan.riyad@outlook.com'),
(538, NULL, 'ahsan.riyad@outlook.com'),
(539, NULL, 'ahsan.riyad@outlook.com'),
(540, NULL, 'ahsan.riyad@outlook.com'),
(541, NULL, 'ahsan.riyad@outlook.com'),
(542, NULL, 'ahsan.riyad@outlook.com'),
(543, NULL, 'ahsan.riyad@outlook.com'),
(544, NULL, 'ahsan.riyad@outlook.com');

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
('riyad298@gmail.com', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('ahsan.riyad@outlook.com', 2, '', NULL, 'Dhaka', '5600', '', 'Kuril kajibari', NULL, '', '', ''),
('riyad298@yahoo.com', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
('riyad298@gmail.com', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('ahsan.riyad@outlook.com', NULL, 0, '15-29804-2', NULL, NULL, NULL, NULL, 'Student', NULL, NULL, 'AB-', '1987-04-10'),
('riyad298@yahoo.com', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
('riyad298@gmail.com', 1, 'Md Ahsan Ferdous Riyad', '01919448787', '15-29804-2', '29cf2160ad1165db8dacdfd2eedcf5d0', '2019-11-23 22:54:13.000000', 1000),
('ahsan.riyad@outlook.com', 2, 'Riyad Ahsan', '01719246822', '15-29804-2', '29cf2160ad1165db8dacdfd2eedcf5d0', '2019-11-24 14:43:14.000000', 1001),
('riyad298@yahoo.com', 3, 'Munem', '01719246822', '1256698', '29cf2160ad1165db8dacdfd2eedcf5d0', '2019-11-24 19:29:36.000000', 1002);

-- --------------------------------------------------------

--
-- Table structure for table `user_photos`
--

CREATE TABLE `user_photos` (
  `group_photo` varchar(400) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `id_user_photos` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'riyad298@gmail.com', '1.jpg', 'not_set'),
(2, 'ahsan.riyad@outlook.com', '2.jpg', 'not_set'),
(3, 'riyad298@yahoo.com', 'not_set', 'not_set');

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
  `change_request_time` datetime(6) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `visibility` varchar(1000) DEFAULT NULL,
  `completeness` int(10) DEFAULT NULL,
  `last_verified_info` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `verification_info`
--

INSERT INTO `verification_info` (`id_v_info`, `email`, `otp`, `forgot_password_crypto`, `status`, `email_verification_status`, `change_request`, `change_request_time`, `type`, `visibility`, `completeness`, `last_verified_info`) VALUES
(1, 'riyad298@gmail.com', '6137', NULL, 'not_verified', 'verified', 'not_requested', NULL, 'admin', 'full_name,email,mobile,institution_id,spouse_name,number_of_children,profession,parmanent_district,membership_number,status', 60, NULL),
(2, 'ahsan.riyad@outlook.com', '4574', NULL, 'approved', 'not_verified', 'approved', '2019-11-24 17:27:51.000000', 'user', 'full_name,institution_id,membership_number', 100, 'full_name,mobile,institution_id,nid_or_passport,fathers_name,mother_name,spouse_name,number_of_children,profession,designation,institution,blood_group,date_of_birth,present_line1,present_district,present_post_code,present_country,parmanent_line1,parmanent_district,parmanent_post_code,parmanent_country@#$Riyad,01919448787,15-29804-2,15-29804-2,,,,,,,,O+,1987-04-24,,,,,,,,'),
(3, 'riyad298@yahoo.com', '6041', NULL, 'approved', 'not_verified', 'not_requested', NULL, 'user', 'full_name,institution_id,membership_number', 100, NULL);

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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `all_info_together`  AS  select `ur`.`full_name` AS `full_name`,`ur`.`mobile` AS `mobile`,`ur`.`institution_id` AS `institution_id`,`ur`.`password` AS `password`,`ur`.`registration_date` AS `registration_date`,`ur`.`membership_number` AS `membership_number`,`ui`.`gender` AS `gender`,`ui`.`nid_or_passport` AS `nid_or_passport`,`ui`.`fathers_name` AS `fathers_name`,`ui`.`mother_name` AS `mother_name`,`ui`.`spouse_name` AS `spouse_name`,`ui`.`number_of_children` AS `number_of_children`,`ui`.`profession` AS `profession`,`ui`.`designation` AS `designation`,`ui`.`institution` AS `institution`,`ui`.`blood_group` AS `blood_group`,`ui`.`date_of_birth` AS `date_of_birth`,`vi`.`id_v_info` AS `id_v_info`,`vi`.`otp` AS `otp`,`vi`.`forgot_password_crypto` AS `forgot_password_crypto`,`vi`.`status` AS `status`,`vi`.`email_verification_status` AS `email_verification_status`,`vi`.`change_request` AS `change_request`,`vi`.`change_request_time` AS `change_request_time`,`vi`.`type` AS `type`,`vi`.`visibility` AS `visibility`,`vi`.`completeness` AS `completeness`,`vi`.`last_verified_info` AS `last_verified_info`,`ur`.`id` AS `id`,`uu`.`recent_photo` AS `recent_photo`,`uu`.`old_photo` AS `old_photo`,`ur`.`email` AS `ur_email`,`vi`.`email` AS `vi_email`,`uu`.`email` AS `uu_email`,`ui`.`email` AS `ui_email`,`ua`.`email` AS `email`,`ua`.`users_address_id` AS `users_address_id`,`ua`.`present_line1` AS `present_line1`,`ua`.`present_line2` AS `present_line2`,`ua`.`present_district` AS `present_district`,`ua`.`present_post_code` AS `present_post_code`,`ua`.`present_country` AS `present_country`,`ua`.`parmanent_line1` AS `parmanent_line1`,`ua`.`parmanent_line2` AS `parmanent_line2`,`ua`.`parmanent_district` AS `parmanent_district`,`ua`.`parmanent_post_code` AS `parmanent_post_code`,`ua`.`parmanent_country` AS `parmanent_country` from ((((`users_registration` `ur` join `users_info` `ui`) join `users_address` `ua`) join `verification_info` `vi`) join `user_uploads` `uu`) where `uu`.`email` = `ur`.`email` and `ui`.`email` = `ur`.`email` and `ua`.`email` = `ur`.`email` and `vi`.`email` = `ur`.`email` ;

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
  MODIFY `log_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=545;

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
  MODIFY `id_user_photos` int(100) NOT NULL AUTO_INCREMENT;

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
