-- Valentina Studio --
-- MySQL dump --
-- ---------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- ---------------------------------------------------------


-- CREATE DATABASE "techo" ---------------------------------
CREATE DATABASE IF NOT EXISTS `techo` CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `techo`;
-- ---------------------------------------------------------


-- CREATE TABLE "logs" -------------------------------------
-- CREATE TABLE "logs" -----------------------------------------
CREATE TABLE `logs` ( 
	`id` MediumInt( 9 ) AUTO_INCREMENT NOT NULL,
	`request` JSON NULL,
	`response` JSON NULL,
	`created` Timestamp NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = MyISAM
AUTO_INCREMENT = 1;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE TABLE "types" ------------------------------------
-- CREATE TABLE "types" ----------------------------------------
CREATE TABLE `types` ( 
	`id` MediumInt( 9 ) AUTO_INCREMENT NOT NULL,
	`name` VarChar( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`created` Timestamp NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = MyISAM
AUTO_INCREMENT = 1;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE TABLE "vehicles" ---------------------------------
-- CREATE TABLE "vehicles" -------------------------------------
CREATE TABLE `vehicles` ( 
	`id` MediumInt( 9 ) AUTO_INCREMENT NOT NULL,
	`mark` VarChar( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`model` VarChar( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`type_id` MediumInt( 9 ) NOT NULL,
	`milage` Int( 11 ) NOT NULL,
	`price` Float( 12, 0 ) NOT NULL,
	`color` VarChar( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
	`year` VarChar( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
	`created` Timestamp NULL,
	`modified` Timestamp NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = MyISAM
AUTO_INCREMENT = 5;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE INDEX "type_id" ----------------------------------
-- CREATE INDEX "type_id" --------------------------------------
CREATE INDEX `type_id` USING BTREE ON `vehicles`( `type_id` );
-- -------------------------------------------------------------
-- ---------------------------------------------------------


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------


