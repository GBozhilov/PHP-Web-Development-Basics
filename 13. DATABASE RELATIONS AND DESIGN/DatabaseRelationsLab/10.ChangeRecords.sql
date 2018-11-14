UPDATE `php-course` . `students`
SET `phone` = '+3592865432'
WHERE `student_id` = 2
/* OR `student_id` = 3; */

UPDATE `students`
SET `home_address` = 'Varna, bul.Levski 6'
WHERE `phone` IS NULL
AND `student_id` = 6;

UPDATE `students`
SET `phone` = '+359878654823'
WHERE `home_address` = 'Varna, bul.Levski 6';

UPDATE `students`
SET `home_address` = 'Plovdiv, ul. Neznaina 56'
WHERE student_id = 7;