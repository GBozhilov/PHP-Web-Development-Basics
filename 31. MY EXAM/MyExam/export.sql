CREATE DATABASE IF NOT EXISTS `softuni_library` /*!40100 COLLATE 'utf8_general_ci' */;

USE `softuni_library`;


CREATE TABLE IF NOT EXISTS `users` (
  `id`        INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username`  VARCHAR(255)     NOT NULL,
  `password`  VARCHAR(255)     NOT NULL,
  `full_name` VARCHAR(255)     NOT NULL,
  `born_on`   DATE             NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `username` (`username`)
)
  COLLATE = 'utf8_general_ci';


CREATE TABLE IF NOT EXISTS `genres` (
  `id`   INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50)      NOT NULL,
  PRIMARY KEY (`id`)
)
  COLLATE = 'utf8_general_ci';


CREATE TABLE IF NOT EXISTS `books` (
  `id`          INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title`       VARCHAR(50)      NOT NULL,
  `author`      VARCHAR(50)      NOT NULL,
  `description` TEXT             NOT NULL,
  `image`       TEXT             NULL,
  `genre_id`    INT(11) UNSIGNED NOT NULL,
  `user_id`     INT(11) UNSIGNED NOT NULL,
  `added_on`    TIMESTAMP        NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `FK_books_genres` (`genre_id`),
  INDEX `FK_books_users` (`user_id`),
  CONSTRAINT `FK_books_genres` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`),
  CONSTRAINT `FK_books_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
)
  COLLATE = 'utf8_general_ci';


INSERT INTO `softuni_library`.`genres` (`name`) VALUES ('Drama');
INSERT INTO `softuni_library`.`genres` (`name`) VALUES ('Educational');
INSERT INTO `softuni_library`.`genres` (`name`) VALUES ('Adventure');