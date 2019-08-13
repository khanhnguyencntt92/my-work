CREATE TABLE `works` (
	`id` BIGINT NOT NULL AUTO_INCREMENT ,
	`work_name` VARCHAR(255) NOT NULL ,
	`start_date` INT NOT NULL ,
	`end_date` INT NOT NULL ,
	`status` ENUM('planing','doing','completed','') NOT NULL ,
	`created_at` INT NULL , PRIMARY KEY (`id`)
) ENGINE = InnoDB;