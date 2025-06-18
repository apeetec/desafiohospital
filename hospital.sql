-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: hospital
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tab_perfil`
--

DROP TABLE IF EXISTS `tab_perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tab_perfil` (
  `per_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `per_descricao` varchar(100) NOT NULL,
  PRIMARY KEY (`per_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_perfil`
--

LOCK TABLES `tab_perfil` WRITE;
/*!40000 ALTER TABLE `tab_perfil` DISABLE KEYS */;
INSERT INTO `tab_perfil` VALUES (1,'oi');
/*!40000 ALTER TABLE `tab_perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_usuario`
--

DROP TABLE IF EXISTS `tab_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tab_usuario` (
  `usu_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `per_codigo` int(11) DEFAULT NULL,
  `usu_nome` varchar(100) NOT NULL,
  `usu_senha` varchar(500) DEFAULT NULL,
  `usu_login_acesso` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`usu_codigo`),
  KEY `per_codigo` (`per_codigo`),
  CONSTRAINT `tab_usuario_ibfk_1` FOREIGN KEY (`per_codigo`) REFERENCES `tab_perfil` (`per_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_usuario`
--

LOCK TABLES `tab_usuario` WRITE;
/*!40000 ALTER TABLE `tab_usuario` DISABLE KEYS */;
INSERT INTO `tab_usuario` VALUES (6,NULL,'testeab','$2y$10$CGWJUEFD48vES7Y2686K0e2mycexmeFCRoTVQWlyb1havTLxRZ6MC','teste');
/*!40000 ALTER TABLE `tab_usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-06-18  3:22:18
