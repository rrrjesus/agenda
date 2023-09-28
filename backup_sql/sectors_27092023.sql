-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: smsub
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `sectors`
--

DROP TABLE IF EXISTS `sectors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sectors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_name` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `trash` int(11) NOT NULL DEFAULT 0,
  `status` varchar(15) NOT NULL DEFAULT 'post',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sectors`
--

LOCK TABLES `sectors` WRITE;
/*!40000 ALTER TABLE `sectors` DISABLE KEYS */;
INSERT INTO `sectors` VALUES (1,'GABINETE','2023-08-26 06:19:49','2023-08-26 06:19:49',NULL,0,'post'),(2,'ABAST','2023-08-26 06:19:49','2023-09-26 15:07:33','0000-00-00 00:00:00',0,'post'),(3,'AC','2023-08-26 06:19:49','2023-08-26 06:19:49',NULL,0,'post'),(4,'AJ','2023-08-26 06:19:49','2023-08-26 06:19:49',NULL,0,'post'),(5,'ASSESSORIA DE GABINETE','2023-08-26 06:19:49','2023-08-26 06:19:49',NULL,0,'post'),(6,'ASSESSORIA ESPECIAL','2023-08-26 06:19:49','2023-08-26 06:19:49',NULL,0,'post'),(7,'ASSESSORIA PARLAMENTAR','2023-08-26 06:19:49','2023-08-26 06:19:49',NULL,0,'post'),(8,'ASSESSORIA SEC. ADJUNTA','2023-08-26 06:19:49','2023-08-26 06:19:49',NULL,0,'post'),(9,'ASSESSORIA TÉCNICA','2023-08-26 06:19:49','2023-08-26 06:19:49',NULL,0,'post'),(10,'ATOS','2023-08-26 06:19:49','2023-08-26 06:19:49',NULL,0,'post'),(11,'CADM','2023-08-26 06:19:49','2023-08-26 06:19:49',NULL,0,'post'),(12,'COGEL','2023-08-26 06:19:49','2023-08-26 06:19:49',NULL,0,'post'),(13,'CONSEMAVI','2023-08-26 06:19:49','2023-08-26 06:19:49',NULL,0,'post'),(14,'CONVIAS','2023-08-26 06:19:49','2023-08-26 06:19:49',NULL,0,'post'),(15,'COPLAN','2023-08-26 06:19:49','2023-08-26 06:19:49',NULL,0,'post'),(16,'COPURB','2023-08-26 06:19:49','2023-08-26 06:19:49',NULL,0,'post'),(17,'COTI','2023-08-26 06:19:49','2023-08-26 06:19:49',NULL,0,'post'),(18,'DEGUOS','2023-08-26 06:19:49','2023-08-26 06:19:49',NULL,0,'post'),(19,'DFIN','2023-08-26 06:19:49','2023-08-26 06:19:49',NULL,0,'post'),(20,'DGEP','2023-08-26 06:19:49','2023-08-26 06:19:49',NULL,0,'post'),(21,'DZU','2023-08-26 06:19:49','2023-08-26 06:19:49',NULL,0,'post'),(22,'SELIMP','2023-08-26 06:19:49','2023-08-26 06:19:49',NULL,0,'post'),(23,'UNILOG','2023-08-26 06:19:49','2023-08-26 06:19:49',NULL,0,'post'),(24,'NAO DEFINIDO','2023-09-01 09:24:18','2023-09-01 09:24:18',NULL,0,'post');
/*!40000 ALTER TABLE `sectors` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-09-27  9:53:51