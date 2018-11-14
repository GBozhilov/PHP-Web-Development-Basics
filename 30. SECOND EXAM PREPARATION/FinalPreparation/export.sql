CREATE DATABASE IF NOT EXISTS `final_prep` /*!40100 COLLATE 'utf8_general_ci' */;

USE final_prep;

CREATE TABLE IF NOT EXISTS `users` (
  `id`         INT(11)      NOT NULL AUTO_INCREMENT,
  `username`   VARCHAR(255) NOT NULL,
  `password`   VARCHAR(255) NOT NULL,
  `first_name` VARCHAR(255) NULL     DEFAULT NULL,
  `last_name`  VARCHAR(255) NULL     DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `username` (`username`)
)
  COLLATE = 'utf8_general_ci'
  ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `categories` (
  `id`   INT(11)     NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`)
)
  COLLATE = 'utf8_general_ci'
  ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `tasks` (
  `id`          INT(11)      NOT NULL AUTO_INCREMENT,
  `title`       VARCHAR(50)  NOT NULL,
  `description` TEXT         NULL,
  `location`    VARCHAR(100) NULL     DEFAULT NULL,
  `user_id`     INT(11)      NOT NULL,
  `category_id` INT(11)      NOT NULL,
  `started_on`  DATETIME     NOT NULL,
  `due_date`    DATETIME     NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `FK_tasks_users` (`user_id`),
  INDEX `FK_tasks_categories` (`category_id`),
  CONSTRAINT `FK_tasks_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `FK_tasks_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
)
  COLLATE = 'utf8_general_ci'
  ENGINE = InnoDB;

INSERT INTO `categories` (`name`) VALUES ('Anniversary');
INSERT INTO `categories` (`name`) VALUES ('Birthday');
INSERT INTO `categories` (`name`) VALUES ('Business');