-- MySQL dump 10.13  Distrib 8.0.44, for Win64 (x86_64)
--
-- Host: localhost    Database: neogaucho_grupo24
-- ------------------------------------------------------
-- Server version	9.7.0

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
SET @MYSQLDUMP_TEMP_LOG_BIN = @@SESSION.SQL_LOG_BIN;
SET @@SESSION.SQL_LOG_BIN= 0;

--
-- GTID state at the beginning of the backup 
--

SET @@GLOBAL.GTID_PURGED=/*!80000 '+'*/ 'fbb71282-4c8f-11f1-9124-0045e2371110:1-1705';

--
-- Table structure for table `ventas_cabecera`
--

DROP TABLE IF EXISTS `ventas_cabecera`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ventas_cabecera` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fecha_venta` timestamp NULL DEFAULT NULL,
  `user_id` bigint unsigned NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'carrito',
  `total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ventas_cabecera_user_id_foreign` (`user_id`),
  CONSTRAINT `ventas_cabecera_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas_cabecera`
--

LOCK TABLES `ventas_cabecera` WRITE;
/*!40000 ALTER TABLE `ventas_cabecera` DISABLE KEYS */;
INSERT INTO `ventas_cabecera` VALUES (1,NULL,1,'carrito',780.00,'2026-06-11 01:36:11','2026-06-14 18:33:52'),(2,'2026-05-14 01:31:55',2,'confirmado',5430.00,'2026-06-13 23:56:15','2026-06-14 01:31:55'),(3,'2026-05-15 02:14:34',2,'confirmado',10860.00,'2026-06-14 01:54:11','2026-06-15 02:14:34'),(4,'2026-06-15 02:18:11',2,'confirmado',10860.00,'2026-06-15 02:18:04','2026-06-15 02:18:11'),(5,'2026-06-15 02:21:15',2,'confirmado',5430.00,'2026-06-15 02:20:56','2026-06-15 02:21:15'),(6,'2026-06-15 02:23:20',2,'confirmado',5430.00,'2026-06-15 02:22:49','2026-06-15 02:23:20'),(7,'2026-06-15 02:26:10',2,'confirmado',5430.00,'2026-06-15 02:26:02','2026-06-15 02:26:10'),(8,'2026-06-15 02:39:24',2,'confirmado',1560.00,'2026-06-15 02:39:07','2026-06-15 02:39:24'),(9,'2026-06-16 21:02:50',2,'confirmado',650.00,'2026-06-16 20:51:14','2026-06-16 21:02:50'),(10,'2026-06-16 21:16:06',2,'confirmado',650.00,'2026-06-16 21:15:23','2026-06-16 21:16:06'),(11,'2026-06-16 21:22:38',2,'confirmado',650.00,'2026-06-16 21:16:06','2026-06-16 21:22:38'),(12,'2026-06-16 21:25:45',2,'confirmado',650.00,'2026-06-16 21:25:35','2026-06-16 21:25:45'),(13,'2026-06-16 21:28:52',2,'confirmado',5430.00,'2026-06-16 21:28:44','2026-06-16 21:28:52'),(14,'2026-06-16 21:31:26',2,'confirmado',780.00,'2026-06-16 21:31:19','2026-06-16 21:31:26'),(15,'2026-06-16 21:41:56',2,'confirmado',2900.00,'2026-06-16 21:41:41','2026-06-16 21:41:56'),(16,'2026-06-18 01:08:07',2,'confirmado',3170.00,'2026-06-18 01:00:11','2026-06-18 01:08:07');
/*!40000 ALTER TABLE `ventas_cabecera` ENABLE KEYS */;
UNLOCK TABLES;
SET @@SESSION.SQL_LOG_BIN = @MYSQLDUMP_TEMP_LOG_BIN;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-06-17 23:28:03
