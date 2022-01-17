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
	`email` VARCHAR(100) NOT NULL UNIQUE,
	`password` VARCHAR(255) NOT NULL,
	`profile_picture` CHAR(12) DEFAULT 'default.jpg' NOT NULL ,
	`status` ENUM('Safe', 'Moderately Affected', 'Severely Affected') DEFAULT 'Safe' NOT NULL
) Engine=InnoDB;

INSERT INTO
	`user`
VALUES
	(DEFAULT, 'Theresa', 'De Ocampo', '09078806764', 'Makati, PH', 'theresa@yahoo.com', 
		'$2y$10$uyNGNk8Ccj35tfSpFOWVte4rOjE02VDMYTBMYJAqULRysMSDYWjuO', DEFAULT, DEFAULT),
	(DEFAULT, 'Jesus', 'Lopez', '09279841873', 'Naic, PH', 'jesusdthird@gmail.com',
		'$2y$10$y90BZ8Q/2gyBPqdAFXXDle7KIQ.VErpkzWNNZW8N2GEdkpadd8OiC', DEFAULT, DEFAULT),
	(DEFAULT, 'Jovy', 'Busque', '031943584', 'Auckland, NZ', 'jovy_c@yahoo.com',
		'$2y$10$Rzz.FIsCy5tTioESP0x2hea54NpXIfApGIxB4F4GAz8cnsWOv75me', DEFAULT, DEFAULT),
	(DEFAULT, 'Allan', 'Busque', '031953486', 'Auckland, NZ', 'allan_busque@yahoo.com',
		'$2y$10$jrKgPlicEXXraG5BYLmGiOyOEybsk6inmI/EmuDrweWqfmXLo/Rpa', DEFAULT, DEFAULT),
	(DEFAULT, 'Aurora', 'Liberato', '09664892158', 'Masaya, PH', 'aurora.liberato@gmail.com',
		'$2y$10$CtnzbINrxyH1wLupEyJ2U.ta2WbMK5PdJi8AXNPEK.dQffNpNr5.2', DEFAULT, DEFAULT),
	(DEFAULT, 'Ryan', 'Nable', '09973921024', 'Masaya, PH', 'ryan.nable@gmail.com',
		'$2y$10$nOpsIELnJbe5kQVWFiMKqOPX8MGprsty2Mto.1Uj7Cb0eNS6uPK7a', DEFAULT, DEFAULT),
	(DEFAULT, 'Carlo', 'Robiso', '09179457832', 'Vigan, PH', 'carlo.robiso@gmail.com',
		'$2y$10$jxR6Yl2Pzb422tKFtJBz2.SVXU3XLcAeNRQ4wzLz6TzF7Lh4w3OpW', DEFAULT, DEFAULT),
	(DEFAULT, 'Cherryluz', 'Javier', '09184711285', 'Vigan, PH', 'cherry.javier@gmail.com',
		'$2y$10$XXUH1F2sBoSNQ2HsXfS5aekKncilh1aj27ijIuiCV4JpWvDnhjC5.', DEFAULT, DEFAULT),
	(DEFAULT, 'Lych', 'Caballero', '09104873984', 'Santa Mesa, PH', 'lych.caballero@gmail.com',
		'$2y$10$Gd3K4OEADIR4B5TqKCNBJOtjdm17n1RqPR14BpGK2cyIRyFq6kaOK', DEFAULT, DEFAULT),
	(DEFAULT, 'Jericho', 'Lacsamana', '09494023612', 'Santa Mesa, PH', 'eris.lacz@gmail.com',
		'$2y$10$cYzfGs20..qEjeyx2Fw18eIRS8lfQvrYkhTPq9ZP4V0514vQP75u2', DEFAULT, DEFAULT),
	(DEFAULT, 'Kiev', 'Albarico', '09053892384', 'Tanza, PH', 'kiev.albarico@gmail.com',
		'$2y$10$dF99KWhXO7oNnuxOwpHzDeQFp00Qt2q94snn/GdLtdyitdX88mutC', DEFAULT, DEFAULT),
	(DEFAULT, 'Rafael', 'Quiniquini', '09204893128', 'Naic, PH', 'rafael07@gmail.com',
		'$2y$10$zrMAywZVI2Y4UTeyQ5f24uQ7r91IDKKzewALZtc6769klzT252KvK', DEFAULT, DEFAULT),
	(DEFAULT, 'Jasmin', 'Herera', '09214710483', 'Subic, PH', 'jasmine.herera@gmail.com',
		'$2y$10$6DV5h39eoGfNKQUVF6oSa.0hiWagkm/7YdSu1h7sfg66B76qSkEc.', DEFAULT, DEFAULT),
	(DEFAULT, 'Park', 'Seo-joon', '8295798893', 'Seoul, KR', 'park.seo.joon@gmail.com',
		'$2y$10$hf1HSfotzHB2rHL1aOVD2OqLRyWZSt6cE5tdbQSaHkUPJfuPD7CIq', DEFAULT, DEFAULT);