
-- tables
drop table `users_registration`;
drop table `users_info`;
drop table `verification_info`;
drop table `user_uploads`;
drop table `user_photos`;
drop table `users_address`;


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
 `id_v_info` INT(5) DEFAULT NULL,
 `email` varchar(100) DEFAULT NULL,
 `otp` varchar(100) DEFAULT NULL,
 `otp_time` datetime(6) DEFAULT NULL,
 `status` varchar(20) DEFAULT NULL,
 `type` varchar(20) DEFAULT NULL,
 `visibility` varchar(1000) DEFAULT NULL,
 `completeness` int(5) DEFAULT NULL
);


CREATE TABLE `user_uploads`(
  `id_user_uploads` int(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `recent_photo` varchar(400) DEFAULT NULL,
  `old_photo` varchar(400) DEFAULT NULL
);

CREATE TABLE `user_photos`(

 `group_photo` varchar(400) DEFAULT NULL,
 `email` varchar(100) DEFAULT NULL,
 `id_user_photos` int(100) DEFAULT NULL

);

CREATE TABLE `users_registration` (
  `email` varchar(100) DEFAULT NULL,
  `id` int(100) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `institution_id` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `registration_date` datetime(6) DEFAULT NULL,
  `membership_number` int(255) DEFAULT NULL
  );

CREATE TABLE `users_address` (
  `users_address_id` int(100) NOT NULL,
  `present_line1` varchar(300) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `present_line2` varchar(300) DEFAULT NULL,
  `present_district` varchar(100) DEFAULT NULL,
  `present_post_code` varchar(100) DEFAULT NULL,
  `present_country` varchar(100) DEFAULT NULL,
  `parmanent_line1` varchar(300) DEFAULT NULL,
  `parmanent_line2` varchar(300) DEFAULT NULL,
  `parmanent_district` varchar(100) DEFAULT NULL,
  `parmanent_post_code` varchar(100) DEFAULT NULL,
  `parmanent_country` varchar(100) DEFAULT NULL
  
  );

ALTER TABLE `users_registration`
ADD PRIMARY KEY (`id`);

ALTER TABLE `users_registration`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;


ALTER TABLE `user_uploads`
ADD PRIMARY KEY (`id_user_uploads`);

ALTER TABLE `user_uploads`
MODIFY `id_user_uploads` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;



ALTER TABLE `user_photos`
ADD PRIMARY KEY (`id_user_photos`);

ALTER TABLE `user_photos`
MODIFY `id_user_photos` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;



ALTER TABLE `verification_info`
ADD PRIMARY KEY (`id_v_info`);

ALTER TABLE `verification_info`
MODIFY `id_v_info` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;



ALTER TABLE `users_address`
ADD PRIMARY KEY (`users_address_id`);

ALTER TABLE `users_address`
MODIFY `users_address_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;



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

INSERT INTO users_registration (email,full_name,mobile,institution_id,password,registration_date,membership_number) VALUES (email1,full_name1, mobile1,institution_id1,password1,NOW(), 1000);

INSERT INTO verification_info (email,otp,status,type,visibility,completeness) VALUES (email1, otp1,'not_verified', 'user', 'name,email' , 20);

INSERT INTO users_info (email) VALUES (email1);
INSERT INTO users_address (email) VALUES (email1);
INSERT INTO user_uploads (email , recent_photo , old_photo) VALUES (email1 , 'not_set' , 'not_set');
INSERT INTO user_photos (email) VALUES (email1);


SET result="YES";



END IF ;


END

END$$
DELIMITER ;




    DELIMITER $$
    CREATE OR REPLACE DEFINER=`root`@`localhost` PROCEDURE upload_photo(in purpose varchar(100) , in upload_link varchar(500) , in email1 varchar(100) , out existing_link varchar(500))
    BEGIN


    if purpose = 'current_photo'
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



          if existing_link = NULL
          then 
          set existing_link = 'not_set' ; 
          end if;


          END$$
          DELIMITER ;





-- login starts


DELIMITER $$
CREATE OR REPLACE DEFINER=`root`@`localhost` PROCEDURE login(in email1 varchar(500) , in password1 varchar(100) , out result varchar(500))

BEGIN

DECLARE i int(3);


select count(*) into i from users_registration where email = email1 and password = password1;


if i < 1 
then
set result = 'NO' ; 
else
set result = 'YES' ; 
end if;


END$$
DELIMITER ;








-- login ends









-- user_request





DELIMITER $$
CREATE OR REPLACE DEFINER=`root`@`localhost` PROCEDURE user_request(IN email1 VARCHAR(100), OUT result VARCHAR(100))
BEGIN

DECLARE count int(5);


SELECT max(membership_number) into count from users_registration;
-- SELECT COUNT(*) int count FROM verification_info WHERE status = 'approved' ; 



UPDATE verification_info SET status ='approved'   WHERE email = email1 ;


UPDATE users_registration SET membership_number = count+1   WHERE email = email1 ;




END$$
DELIMITER ;




DELIMITER $$
CREATE OR REPLACE DEFINER=`root`@`localhost` PROCEDURE update_profile_basic(IN email1 VARCHAR(100), in full_name1 varchar(100) , in mobile1 varchar(100) , in institution_id varchar(100) , in blood_group1 varchar(100) ,  in dob varchar(200) , OUT result VARCHAR(100))
BEGIN

DECLARE count int(5);

SELECT max(membership_number) into count from users_registration;
-- SELECT COUNT(*) int count FROM verification_info WHERE status = 'approved' ; 



UPDATE verification_info SET status ='approved'   WHERE email = email1 ;


UPDATE users_registration SET membership_number = count+1   WHERE email = email1 ;




END$$
DELIMITER ;












-- ideal code
$conn = get_mysqli_connection();
$sql = "call current_photo( ? , ? , @result )";
$stmt = $conn->prepare($sql);
$email = 'riyad298@gmail.com';
$basename = 'jtogstgjoigjsogogosjgiotgoisr';
$stmt->bind_param('ss' , $basename , $email );
$stmt->execute();
$stmt->close();
$sql = 'select @result as st';
$result = mysqli_query($conn , $sql);
$row = mysqli_fetch_assoc($result);
$conn->close();
echo $row['st'];
-- ideal code
