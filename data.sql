-- Valentina Studio --
-- MySQL dump --
-- ---------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- ---------------------------------------------------------


-- Dump data of "logs" -------------------------------------
-- ---------------------------------------------------------


-- Dump data of "types" ------------------------------------
INSERT INTO `types`(`id`,`name`,`created`) VALUES ( '1', 'car', '2017-08-26 20:05:56' );
INSERT INTO `types`(`id`,`name`,`created`) VALUES ( '2', 'motorcycle', '2017-08-26 20:06:37' );
-- ---------------------------------------------------------


-- Dump data of "vehicles" ---------------------------------
INSERT INTO `vehicles`(`id`,`mark`,`model`,`type_id`,`milage`,`price`,`color`,`year`,`created`,`modified`) VALUES ( '3', 'cherry', 'qq', '1', '30000', '10000', 'red', '2010', '2017-08-26 18:16:31', '2017-08-26 18:16:31' );
INSERT INTO `vehicles`(`id`,`mark`,`model`,`type_id`,`milage`,`price`,`color`,`year`,`created`,`modified`) VALUES ( '4', 'ford', 'mustang', '1', '0', '7000', 'grey', '1930', '2017-08-26 18:16:20', '2017-08-26 18:16:20' );
INSERT INTO `vehicles`(`id`,`mark`,`model`,`type_id`,`milage`,`price`,`color`,`year`,`created`,`modified`) VALUES ( '5', 'cherry', 'qq', '1', '25000', '10000', 'red', '2018', '2017-08-26 23:15:08', '2017-08-26 23:15:08' );
INSERT INTO `vehicles`(`id`,`mark`,`model`,`type_id`,`milage`,`price`,`color`,`year`,`created`,`modified`) VALUES ( '6', 'cherry', 'qq', '1', '25000', '10000', 'red', '2018', '2017-08-26 23:16:15', '2017-08-26 23:16:15' );
INSERT INTO `vehicles`(`id`,`mark`,`model`,`type_id`,`milage`,`price`,`color`,`year`,`created`,`modified`) VALUES ( '7', 'mazda', '3', '1', '0', '100000', 'yellos', '2018', '2017-08-26 23:20:23', '2017-08-26 23:20:23' );
INSERT INTO `vehicles`(`id`,`mark`,`model`,`type_id`,`milage`,`price`,`color`,`year`,`created`,`modified`) VALUES ( '8', 'yamaha', 'jog', '2', '0', '10000', 'yellow', '2017', '2017-08-26 20:25:26', '2017-08-26 20:25:26' );
INSERT INTO `vehicles`(`id`,`mark`,`model`,`type_id`,`milage`,`price`,`color`,`year`,`created`,`modified`) VALUES ( '9', 'susuki', '3', '2', '0', '100000', 'yellow', '2018', '2017-08-26 23:28:46', '2017-08-26 23:28:46' );
-- ---------------------------------------------------------


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------
