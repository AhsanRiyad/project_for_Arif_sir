
-- tables
drop table `users_registration`;
drop table `users_info`;
drop table `verification_info`;
drop table `user_uploads`;
drop table `user_photos`;

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
);

CREATE TABLE `verification_info`(
 `email` varchar(100) DEFAULT NULL,
 `otp` varchar(100) DEFAULT NULL,
 `otp_time` datetime(6) DEFAULT NULL,
 `status` varchar(20) DEFAULT NULL,
 `type` varchar(20) DEFAULT NULL,
 `visibility` varchar(20) DEFAULT NULL,
 `completeness` int(5) DEFAULT NULL
);


CREATE TABLE `user_uploads`(
 `email` varchar(100) DEFAULT NULL,
 `recent_photo` varchar(400) DEFAULT NULL,
 `old_photo` varchar(400) DEFAULT NULL
);

CREATE TABLE `user_photos`(
 `group_photo` varchar(400) DEFAULT NULL,
 `email` varchar(100) DEFAULT NULL

);

CREATE TABLE `users_registration` (
  `email` varchar(100) DEFAULT NULL,
  `id` int(100) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `institution_id` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `registration_date` datetime(6) DEFAULT NULL,
  `membership_number` varchar(100) DEFAULT NULL
  );

ALTER TABLE `users_registration`
ADD PRIMARY KEY (`id`);

ALTER TABLE `users_registration`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

-- tables

-- query


INSERT INTO users_registration (email,full_name,mobile,institution_id,password,registration_date,membership_number) VALUES (email1,full_name1, mobile1,institution_id1,password1,NOW(), 'not_set');

INSERT INTO verification_info (email,otp,status,type,visibility,completeness) VALUES (email1, otp1,'not_verified', 'user', 'name,email' , 20);
SET result="YES";

-- query



DELIMITER $$
CREATE OR REPLACE DEFINER=`root`@`localhost` PROCEDURE REGISTRATION(IN email1 VARCHAR(100),IN full_name1 VARCHAR(100),IN mobile1 VARCHAR(20),IN institution_id1 VARCHAR(100),IN password1 VARCHAR(100),IN otp1 VARCHAR(100),OUT result VARCHAR(100))
BEGIN

DECLARE UID INT(3); 
SET UID = 0 ;
SELECT COUNT(*) INTO UID FROM users_registration  WHERE EMAIL=lower(email1) ;   

SELECT UID;

IF UID>0
THEN 

SET result="NO";

ELSE 

INSERT INTO users_registration (email,full_name,mobile,institution_id,password,registration_date,membership_number) VALUES (email1,full_name1, mobile1,institution_id1,password1,NOW(), 'not_set');

INSERT INTO verification_info (email,otp,status,type,visibility,completeness) VALUES (email1, otp1,'not_verified', 'user', 'name,email' , 20);

INSERT INTO users_info (email) VALUES (email1);

INSERT INTO user_uploads (email) VALUES (email1);
INSERT INTO user_photos (email) VALUES (email1);


SET result="YES";



END IF ;


END$$
DELIMITER ;




CREATE OR REPLACE PROCEDURE `REGISTRATION`(IN )