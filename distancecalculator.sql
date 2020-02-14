-- MySQL dump 10.13  Distrib 5.6.21, for Win32 (x86)
--
-- Host: localhost    Database: distancecalculator
-- ------------------------------------------------------
-- Server version	5.6.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `citylocation`
--

DROP TABLE IF EXISTS `citylocation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `citylocation` (
  `CityName` text CHARACTER SET utf8,
  `CityID` int(11) NOT NULL AUTO_INCREMENT,
  `Longitude` int(11) NOT NULL,
  `Latitude` int(11) NOT NULL,
  `DATETIME` datetime NOT NULL,
  PRIMARY KEY (`CityID`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `citylocation`
--

LOCK TABLES `citylocation` WRITE;
/*!40000 ALTER TABLE `citylocation` DISABLE KEYS */;
INSERT INTO `citylocation` VALUES ('Россия, Москва',32,135441,200712,'2020-02-13 21:36:13'),('Россия, Санкт-Петербург',33,109136,215780,'2020-02-13 21:36:25'),('Россия, Самара',34,180366,191504,'2020-02-13 21:36:35'),('Россия, Республика Северная Осетия — Алания, Владикавказ',35,160855,154876,'2020-02-13 21:36:45'),('Россия, Республика Башкортостан, Уфа',36,201451,197047,'2020-02-13 21:36:56'),('Россия, Нижний Новгород',37,158423,202776,'2020-02-13 21:37:07'),('Франция, Иль-де-Франс, Париж',38,8466,175884,'2020-02-13 21:37:16'),('Франция, Прованс-Альпы-Лазурный Берег, Буш-дю-Рон, город Марсель',39,19363,155891,'2020-02-13 21:37:28'),('Соединённые Штаты Америки, штат Нью-Йорк, Нью-Йорк',40,-266410,146573,'2020-02-13 21:37:42'),('Израиль, Иерусалим',41,126739,114399,'2020-02-13 21:37:55'),('Россия, Камчатский край, Петропавловск-Камчатский',42,571117,190887,'2020-02-13 21:46:34');
/*!40000 ALTER TABLE `citylocation` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-14 17:05:14
