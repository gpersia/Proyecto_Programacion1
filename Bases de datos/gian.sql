-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: localhost    Database: proyecto
-- ------------------------------------------------------
-- Server version	5.7.24-0ubuntu0.16.04.1

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
-- Table structure for table `auditoria`
--

DROP TABLE IF EXISTS `auditoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auditoria` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `fecha_acceso` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(30) NOT NULL DEFAULT '',
  `response_time` float NOT NULL DEFAULT '0' COMMENT 'tiempo en milisegundos',
  `endpoint` varchar(300) NOT NULL DEFAULT '',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auditoria`
--

LOCK TABLES `auditoria` WRITE;
/*!40000 ALTER TABLE `auditoria` DISABLE KEYS */;
INSERT INTO `auditoria` VALUES (14,'2018-12-06 16:16:29','gian1',0.0927,'localhost/Facultad/Programacion_1_Persia/Proyecto/api/vehiculo/CRUD.php/GET','2018-12-06 16:16:29'),(15,'2018-12-06 16:25:02','Gonzalo',0.0968,'localhost/Facultad/Programacion_1_Persia/Proyecto/api/chofer/CRUD.php/GET','2018-12-06 16:25:02'),(16,'2018-12-06 16:25:30','Cabify',0.1038,'localhost/Facultad/Programacion_1_Persia/Proyecto/api/transporte/CRUD.php/GET','2018-12-06 16:25:30'),(17,'2018-12-06 16:26:16','Cabify',0.2505,'localhost/Facultad/Programacion_1_Persia/Proyecto/api/transporte/CRUD.php/GET','2018-12-06 16:26:16');
/*!40000 ALTER TABLE `auditoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chofer`
--

DROP TABLE IF EXISTS `chofer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chofer` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `dni` int(9) DEFAULT NULL,
  `FK_vehiculo` int(255) NOT NULL,
  `FK_transporte` int(255) NOT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dni` (`dni`),
  KEY `FK_vehiculos` (`FK_vehiculo`),
  KEY `FK_transporte` (`FK_transporte`),
  CONSTRAINT `FK_transporte` FOREIGN KEY (`FK_transporte`) REFERENCES `transporte` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_vehiculos` FOREIGN KEY (`FK_vehiculo`) REFERENCES `vehiculo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chofer`
--

LOCK TABLES `chofer` WRITE;
/*!40000 ALTER TABLE `chofer` DISABLE KEYS */;
INSERT INTO `chofer` VALUES (34,'Gonzalo','Tempra','gonzalotempra96@hotmail.com',39850155,1,3,'2018-12-06 14:02:03','2018-12-06 14:02:03');
/*!40000 ALTER TABLE `chofer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `relaciones`
--

DROP TABLE IF EXISTS `relaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `relaciones` (
  `FK_vehiculos` int(255) NOT NULL,
  `FK_transporte` int(255) NOT NULL,
  PRIMARY KEY (`FK_vehiculos`,`FK_transporte`),
  KEY `FK_T` (`FK_transporte`),
  CONSTRAINT `FK_T` FOREIGN KEY (`FK_transporte`) REFERENCES `transporte` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_V` FOREIGN KEY (`FK_vehiculos`) REFERENCES `vehiculo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `relaciones`
--

LOCK TABLES `relaciones` WRITE;
/*!40000 ALTER TABLE `relaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `relaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transporte`
--

DROP TABLE IF EXISTS `transporte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transporte` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  `pais_procedencia` varchar(30) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transporte`
--

LOCK TABLES `transporte` WRITE;
/*!40000 ALTER TABLE `transporte` DISABLE KEYS */;
INSERT INTO `transporte` VALUES (1,'Uber','USA','2018-11-30 22:01:23','2018-11-30 22:01:23'),(2,'Taxi','Argentina','2018-11-30 22:02:48','2018-11-30 22:02:48'),(3,'Remis','Argentina','2018-11-30 22:03:04','2018-11-30 22:03:04'),(4,'Cabify','España','2018-11-30 22:03:17','2018-11-30 22:03:17');
/*!40000 ALTER TABLE `transporte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(2048) NOT NULL,
  `fechaAcceso` varchar(25) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (31,'Gonzalo','12345',NULL,'2018-12-05 23:28:10'),(32,'GonzaloCRUD','$2y$10$0aGA7l97qf..XTMaWcAwCevtmM82q58jHPsn9O7xUDkiP5LkzXiZy',NULL,'2018-12-06 12:22:11'),(33,'gian','$2y$10$eUb7dXQ5patmiFiPlUGY1.ilZ2HtXAEE6IpyjAH.d3JgK7CoLg2Fm',NULL,'2018-12-06 15:49:18'),(34,'gian1','$2y$10$FpCBDw4UWr3qsP3Ox1RRDe/BIiZBfBPPJWp8CAPTrk/wWh2AUy9qe',NULL,'2018-12-06 15:56:19');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehiculo`
--

DROP TABLE IF EXISTS `vehiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehiculo` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `marca` varchar(12) DEFAULT NULL,
  `modelo` varchar(12) DEFAULT NULL,
  `anho_fabricacion` int(6) DEFAULT NULL,
  `patente` varchar(12) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `patente` (`patente`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiculo`
--

LOCK TABLES `vehiculo` WRITE;
/*!40000 ALTER TABLE `vehiculo` DISABLE KEYS */;
INSERT INTO `vehiculo` VALUES (1,'peugeot','206',2012,'aa888aa','2018-12-03 14:34:41','2018-12-05 20:17:12'),(4,'fiat','uno',2007,'JUT221','2018-12-05 13:11:58','2018-12-05 13:12:42'),(5,'nissan','tida',2009,'KDT684','2018-12-05 13:12:30','2018-12-05 13:12:30');
/*!40000 ALTER TABLE `vehiculo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-06 13:34:55
