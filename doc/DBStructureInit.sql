-- MySQL Script generated by MySQL Workbench
-- Fri Dec 15 08:22:51 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema questionnaire_db
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `questionnaire_db` ;

-- -----------------------------------------------------
-- Schema questionnaire_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `questionnaire_db` DEFAULT CHARACTER SET utf8 ;
USE `questionnaire_db` ;

-- -----------------------------------------------------
-- Table `questionnaire_db`.`questionnaires`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `questionnaire_db`.`questionnaires` ;

CREATE TABLE IF NOT EXISTS `questionnaire_db`.`questionnaires` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `state` ENUM("Building", "Answering", "Closed") NOT NULL,
  `title` VARCHAR(256) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `questionnaire_db`.`fillings`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `questionnaire_db`.`fillings` ;

CREATE TABLE IF NOT EXISTS `questionnaire_db`.`fillings` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `questionnaires_id` INT NOT NULL,
  `submission_date` DATETIME NOT NULL DEFAULT NOW(),
  PRIMARY KEY (`id`),
  INDEX `fk_fillings_questionnaires1_idx` (`questionnaires_id` ASC) INVISIBLE,
  CONSTRAINT `fk_fillings_questionnaires1`
    FOREIGN KEY (`questionnaires_id`)
    REFERENCES `questionnaire_db`.`questionnaires` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `questionnaire_db`.`questions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `questionnaire_db`.`questions` ;

CREATE TABLE IF NOT EXISTS `questionnaire_db`.`questions` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `statement` VARCHAR(512) NOT NULL,
  `kind` ENUM("SingleLineText", "ListOfSingleLines", "MultilineText") NOT NULL,
  `questionnaires_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_questions_questionnaires1_idx` (`questionnaires_id` ASC) VISIBLE,
  CONSTRAINT `fk_questions_questionnaires1`
    FOREIGN KEY (`questionnaires_id`)
    REFERENCES `questionnaire_db`.`questionnaires` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `questionnaire_db`.`answers`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `questionnaire_db`.`answers` ;

CREATE TABLE IF NOT EXISTS `questionnaire_db`.`answers` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `content` VARCHAR(1024) NULL,
  `fillings_id` INT NOT NULL,
  `questions_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_answers_fillings_idx` (`fillings_id` ASC) VISIBLE,
  INDEX `fk_answers_questions1_idx` (`questions_id` ASC) VISIBLE,
  CONSTRAINT `fk_answers_fillings`
    FOREIGN KEY (`fillings_id`)
    REFERENCES `questionnaire_db`.`fillings` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_answers_questions1`
    FOREIGN KEY (`questions_id`)
    REFERENCES `questionnaire_db`.`questions` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;