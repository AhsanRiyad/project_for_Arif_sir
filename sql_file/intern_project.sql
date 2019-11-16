-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2019 at 06:53 AM
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


select count(*) into i from users_registration where email = email1 and password = password1;


if i < 1 
then
set result = 'NO' ; 
else
set result = 'YES' ; 
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

INSERT INTO verification_info (email,otp,status,type,visibility,completeness) VALUES (email1, otp1,'not_verified', 'user', 'name,email' , 20);

INSERT INTO users_info (email) VALUES (email1);
INSERT INTO users_address (email) VALUES (email1);
INSERT INTO user_uploads (email , recent_photo , old_photo) VALUES (email1 , 'not_set' , 'not_set');
INSERT INTO user_photos (email) VALUES (email1);


SET result="YES";



END IF ;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_profile_address` (IN `email1` VARCHAR(100), IN `present_line11` VARCHAR(100), IN `present_district1` VARCHAR(100), IN `present_post_code1` INT(100), IN `present_country1` VARCHAR(200), IN `permanent_line11` VARCHAR(100), IN `permanent_district1` VARCHAR(100), IN `permanent_post_code1` INT(100), IN `permanent_country1` VARCHAR(200), OUT `result` VARCHAR(100))  BEGIN
DECLARE count int(5);


update users_address set  present_line1 = present_line11, present_district = present_district1, present_post_code = present_post_code1 , present_country = present_country1 , parmanent_line1 = permanent_line11 , parmanent_district = permanent_district1, parmanent_post_code = permanent_post_code1 , parmanent_country = permanent_country1 where email = email1 ;


set result = 'success' ;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_profile_basic` (IN `email1` VARCHAR(100), IN `full_name1` VARCHAR(100), IN `mobile1` VARCHAR(100), IN `institution_id1` VARCHAR(100), IN `blood_group1` VARCHAR(100), IN `nid_or_passport1` VARCHAR(200), IN `dob1` VARCHAR(200), OUT `result` VARCHAR(100))  BEGIN

DECLARE count int(5);


update users_info set  nid_or_passport = nid_or_passport1, date_of_birth = dob1 , blood_group = blood_group1 where email = email1 ;


update users_registration set full_name = full_name1 , mobile = mobile1 , institution_id = institution_id1  where email = email1 ;



set result = 'success' ;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_profile_email` (IN `email1` VARCHAR(100), IN `email2` VARCHAR(100), OUT `result` VARCHAR(100))  BEGIN

DECLARE count int(5);


update users_registration set  email = email2 where email = email1 ;
update users_info set  email = email2 where email = email1 ;
update users_address set  email = email2 where email = email1 ;
update user_uploads set  email = email2 where email = email1 ;
update user_photos set  email = email2 where email = email1 ;
update verification_info set email_verification_status = 'not_verified' where email = email1;
update verification_info set  email = email2 where email = email1 ;



set result = 'success' ;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_profile_forgot_password` (IN `email1` VARCHAR(100), IN `forgot_password_crypto1` VARCHAR(500), IN `purpose` VARCHAR(100), OUT `result` VARCHAR(100))  BEGIN

DECLARE count int(5);

if purpose = 'generate_crypto'
then
select count(*) into count from verification_info where email = email1 ; 

if count >0 
then
update verification_info set forgot_password_crypto = forgot_password_crypto1 where email = email1 ; 
set result = 'crypto_added' ; 
else
set result = 'no_email_found';
end if ;

elseif purpose = 'crypto_check'
then
select count(*) into count from verification_info where email = email1 and forgot_password_crypto = forgot_password_crypto1 ;
if count > 0
then
set result = 'allow';
else
set result = 'invalid_link';
end if;

end if;





END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_profile_password` (IN `email1` VARCHAR(100), IN `password1` VARCHAR(500), OUT `result` VARCHAR(100))  BEGIN

DECLARE count int(5);


update users_registration set password = password1 where email = email1 ;


set result = 'success' ;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_profile_personal` (IN `email1` VARCHAR(100), IN `fathers_name1` VARCHAR(100), IN `mothers_name1` VARCHAR(100), IN `spouse_name1` VARCHAR(100), IN `number_of_children1` INT(100), IN `profession1` VARCHAR(100), IN `workplace_or_institution1` VARCHAR(200), IN `designation1` VARCHAR(200), OUT `result` VARCHAR(100))  BEGIN

DECLARE count int(5);


update users_info set  fathers_name = fathers_name1, mother_name = mothers_name1 , spouse_name = spouse_name1, number_of_children = number_of_children1 , profession = profession1 , institution = workplace_or_institution1 , designation = designation1 where email = email1 ;


set result = 'success' ;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `upload_photo` (IN `purpose` VARCHAR(100), IN `upload_link` VARCHAR(500), IN `email1` VARCHAR(100), OUT `existing_link` VARCHAR(500))  BEGIN


if purpose = 'recent_photo'
then
Select recent_photo into existing_link from user_uploads where email = email1 ;
update user_uploads set recent_photo = upload_link where email = email1 ; 
ELSEIF purpose = 'old_photo'
then
select old_photo into existing_link from user_uploads where email = email1;
update user_uploads set old_photo = upload_link where email = email1;
elseif purpose = 'group_photo'
then
insert into user_photos (email , group_photo) values (email1 , upload_link); 
end if;



END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `user_request` (IN `email1` VARCHAR(100), OUT `result` VARCHAR(100))  BEGIN

DECLARE count int(5);


SELECT max(membership_number) into count from users_registration;
-- SELECT COUNT(*) int count FROM verification_info WHERE status = 'approved' ; 



UPDATE verification_info SET status ='approved'   WHERE email = email1 ;


UPDATE users_registration SET membership_number = count+1   WHERE email = email1 ;




END$$

DELIMITER ;

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
('riyad298@yahoo.com', 67, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('riyad298@hotmail.com', 68, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('riyad298@gmail.com', 69, 'reafeaf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_info`
--

INSERT INTO `users_info` (`email`, `gender`, `id`, `nid_or_passport`, `fathers_name`, `mother_name`, `spouse_name`, `number_of_children`, `profession`, `designation`, `institution`, `blood_group`, `date_of_birth`) VALUES
('riyad298@gmail.com', NULL, 0, 'riyad298@gmail.com', 'arfeaf1', 'arefaef1', 'arefaerf1', 11, 'arferfafarffffffffffa', 'afearf1', 'aerfaerf', 'B+', '1991-03-26'),
('', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('riyad298@yahoo.com', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('riyad298@hotmail.com', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('riyad298@gffmail.com', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
('riyad298@gmail.com', 67, 'riyad298@gmail.com', '333333333333333', 'riyad298@gmail.com', '96e79218965eb72c92a549dd5a330112', '2019-11-07 01:55:49.000000', 1000),
('', 68, '', '', 'riyad', '448787', '2019-11-08 02:17:40.000000', 1000),
('riyad298@yahoo.com', 69, 'Md Ahsan Ferdous Riyad', '01919448787', 'riyad', '1', '2019-11-12 08:16:43.000000', 1000),
('riyad298@hotmail.com', 70, 'Md Ahsan Ferdous Riyad', '01919448787', 'riyad', '1', '2019-11-13 18:23:17.000000', 1001),
('riyad298@gffmail.com', 71, 'Md Ahsan Ferdous Riyad', '01919448787', 'riyad', '29cf2160ad1165db8dacdfd2eedcf5d0', '2019-11-15 18:04:32.000000', 1000);

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
('riyad298@gmail.com.jpg', 'riyad298@gmail.com', 72),
(NULL, 'riyad298@gffmail.com', 73);

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
(67, 'riyad298@gmail.com', 'riyad298@gmail.com.jpg', 'riyad298@gmail.com.jpg'),
(68, 'riyad298@hotmail.com', 'not_set', 'not_set'),
(69, 'riyad298@gffmail.com', 'not_set', 'not_set');

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
  `completeness` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `verification_info`
--

INSERT INTO `verification_info` (`id_v_info`, `email`, `otp`, `forgot_password_crypto`, `status`, `email_verification_status`, `change_request`, `type`, `visibility`, `completeness`) VALUES
(67, 'riyad298@gmail.com', '3138', 'b53b3a3d6ab90ce0268229151c9bde11', 'rejected', 'verified', 'not_requested', 'user', 'fathers_name,spouse_name,designation,date_of_birth,institution_id', 20),
(68, '', '4297', NULL, 'rejected', NULL, 'not_requested', 'user', 'email', 20),
(69, 'riyad298@yahoo.com', '7087', NULL, 'approved', NULL, 'not_requested', 'user', 'name,email', 20),
(70, 'riyad298@hotmail.com', '9376', NULL, 'approved', NULL, 'not_requested', 'user', 'name,email', 20),
(71, 'riyad298@gffmail.com', '3265', '', 'not_verified', NULL, 'not_requested', 'user', 'name,email', 20);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users_address`
--
ALTER TABLE `users_address`
  MODIFY `users_address_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `users_registration`
--
ALTER TABLE `users_registration`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `user_photos`
--
ALTER TABLE `user_photos`
  MODIFY `id_user_photos` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `user_uploads`
--
ALTER TABLE `user_uploads`
  MODIFY `id_user_uploads` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `verification_info`
--
ALTER TABLE `verification_info`
  MODIFY `id_v_info` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
