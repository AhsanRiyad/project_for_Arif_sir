
-- tables
drop table `users_registration`;
drop table `users_info`;
drop table `verification_info`;
drop table `user_uploads`;
drop table `user_photos`;
drop table `users_address`;


truncate table `users_registration`;
truncate table `users_info`;
truncate table `verification_info`;
truncate table `user_uploads`;
truncate table `user_photos`;
truncate table `users_address`;


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
  `password` varchar(500) DEFAULT NULL,
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
CREATE OR REPLACE DEFINER=`root`@`localhost` PROCEDURE update_profile_email(IN email1 VARCHAR(100), in email2 varchar(100)  , out result VARCHAR(100))

BEGIN

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
DELIMITER ;





DELIMITER $$
CREATE OR REPLACE DEFINER=`root`@`localhost` PROCEDURE update_profile_forgot_password(IN email1 VARCHAR(100), in forgot_password_crypto1 varchar(500)  , in purpose varchar(100) ,  out result VARCHAR(100))

BEGIN

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
DELIMITER ;





DELIMITER $$
CREATE OR REPLACE DEFINER=`root`@`localhost` PROCEDURE email_verification_otp(IN email1 VARCHAR(100), in otp1 varchar(100)  , in purpose varchar(100) ,  out result VARCHAR(100))

BEGIN

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
DELIMITER ;





CREATE or REPLACE view verification_info_users_registration
AS
SELECT ur.email , ur.full_name , ur.mobile , ur.institution_id , ur.registration_date , ur.membership_number, vi.status as verification_status , vi.email_verification_status, vi.change_request , vi.completeness , vi.visibility , vi.type  from users_registration as ur , verification_info as vi  WHERE ur.email = vi.email;




SELECT vi.email as em FROM verification_info vi LEFT JOIN users_registration ur ON vi.email = ur.email WHERE vi.completeness = 100
SELECT vi.email as em FROM verification_info vi JOIN users_registration ur ON vi.email = ur.email WHERE vi.completeness = 100

SELECT * FROM verification_info vi JOIN users_registration ur ON vi.email = ur.email WHERE vi.completeness = 100 and vi.status = 'not_verified'


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
