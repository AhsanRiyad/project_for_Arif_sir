
-- tables
drop table `users_registration`;
drop table `users_info`;
drop table `verification_info`;
drop table `user_uploads`;

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
 `visibility` varchar(20) DEFAULT NULL

);


CREATE TABLE `user_uploads`(
 `email` varchar(100) DEFAULT NULL,
 `recent_photo` varchar(400) DEFAULT NULL,
 `old_photo` varchar(400) DEFAULT NULL,
 `group_photo` varchar(400) DEFAULT NULL
);

CREATE TABLE `users_registration` (
  `email` varchar(100) DEFAULT NULL,
  `id` int(100) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `mobile` int(20) DEFAULT NULL,
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

INSERT INTO `users_registration`(`email`,  `full_name`, `mobile`, `institution_id`, `password`, `registration_date`, `membership_number`) VALUES ( email,  full_name, mobile, institution_id, password, registration_date, membership_number )

INSERT INTO `verification_info`(`email`, `otp`, `otp_time`, `status`, `type`, `visibility`) VALUES (`email`, `otp`, `otp_time`, `status`, `type`, `visibility`)

-- query