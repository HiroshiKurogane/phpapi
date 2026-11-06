-- --------------------------------------------------------
-- Hoszt:                        127.0.0.1
-- Szerver verzió:               8.4.3 - MySQL Community Server - GPL
-- Szerver OS:                   Win64
-- HeidiSQL Verzió:              12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Adatbázis struktúra mentése a petsdb.
CREATE DATABASE IF NOT EXISTS `petsdb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `petsdb`;

-- Struktúra mentése tábla petsdb. pets
CREATE TABLE IF NOT EXISTS `pets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cuteness` int NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL,
  `picture` varchar(50) DEFAULT NULL,
  `typeid` int NOT NULL,
  `age` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_pets_pet_types` (`typeid`),
  CONSTRAINT `FK_pets_pet_types` FOREIGN KEY (`typeid`) REFERENCES `pet_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Tábla adatainak mentése petsdb.pets: ~3 rows (hozzávetőleg)
INSERT INTO `pets` (`id`, `cuteness`, `name`, `picture`, `typeid`, `age`) VALUES
	(1, 10, 'megatron', 'megatron.png', 1, 4),
	(2, 8, 'zeus', 'zeus.png', 2, 2),
	(3, 5, 'hampter', 'hampter.png', 3, 1);

-- Struktúra mentése tábla petsdb. pet_types
CREATE TABLE IF NOT EXISTS `pet_types` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Tábla adatainak mentése petsdb.pet_types: ~6 rows (hozzávetőleg)
INSERT INTO `pet_types` (`id`, `name`) VALUES
	(1, 'cica'),
	(2, 'kutya'),
	(3, 'hörcsög'),
	(4, 'gekkó'),
	(5, 'tigris'),
	(6, 'hal');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
