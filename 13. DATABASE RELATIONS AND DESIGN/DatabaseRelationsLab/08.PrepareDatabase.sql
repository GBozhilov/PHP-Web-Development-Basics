CREATE DATABASE `php-course` /*!40100 COLLATE 'utf8_general_ci' */;

CREATE TABLE `students` (
	`student_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`first_name` VARCHAR(50) NOT NULL,
	`last_name` VARCHAR(50) NOT NULL,
	`student_number` VARCHAR(50) NOT NULL,
	`phone` VARCHAR(50) NULL,
	`home_address` VARCHAR(255) NULL,
	`date_of_record` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`date_of_last_data_change` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	`is_active_or_not` ENUM('active','not active') NULL DEFAULT NULL,
	`motivation_letter` TEXT NULL DEFAULT NULL,
	`notes` TEXT NULL DEFAULT NULL,
	PRIMARY KEY (`student_id`)
)
COLLATE='utf8_general_ci';