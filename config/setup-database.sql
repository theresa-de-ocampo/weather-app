USE mysql;
DROP DATABASE IF EXISTS `weather_app`;
CREATE DATABASE `weather_app`;
USE `weather_app`;

CREATE TABLE `user` (
	`user_id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	`fname` VARCHAR(50) NOT NULL,
	`lname` VARCHAR(50) NOT NULL,
	`contact_no` CHAR(13) NOT NULL,
	`location` VARCHAR(50) NOT NULL,
	`email` VARCHAR(100) NOT NULL,
	`password` VARCHAR(255) NOT NULL,
	`profile_picture` CHAR(12) DEFAULT 'default.jpg' NOT NULL ,
	`status` ENUM('Safe', 'Moderately Affected', 'Severely Affected') DEFAULT 'Safe' NOT NULL
) Engine=InnoDB;