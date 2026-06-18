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
-- Table structure for table `ventas_detalle`
--

DROP TABLE IF EXISTS `ventas_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ventas_detalle` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `venta_id` bigint unsigned NOT NULL,
  `producto_id` bigint unsigned NOT NULL,
  `cantidad` int NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `talle` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ventas_detalle_venta_id_foreign` (`venta_id`),
  KEY `ventas_detalle_producto_id_foreign` (`producto_id`),
  CONSTRAINT `ventas_detalle_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`),
  CONSTRAINT `ventas_detalle_venta_id_foreign` FOREIGN KEY (`venta_id`) REFERENCES `ventas_cabecera` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas_detalle`
--

LOCK TABLES `ventas_detalle` WRITE;
/*!40000 ALTER TABLE `ventas_detalle` DISABLE KEYS */;
INSERT INTO `ventas_detalle` VALUES (5,2,4,1,5430.00,5430.00,'2026-06-14 01:06:09','2026-06-14 01:06:09','m'),(8,1,5,1,780.00,780.00,'2026-06-14 18:33:52','2026-06-14 18:33:52','s'),(9,3,4,2,5430.00,10860.00,'2026-06-15 02:14:24','2026-06-15 02:14:24','xl'),(10,4,4,2,5430.00,10860.00,'2026-06-15 02:18:04','2026-06-15 02:18:04','xl'),(12,5,4,1,5430.00,5430.00,'2026-06-15 02:21:08','2026-06-15 02:21:08','xl'),(13,6,4,1,5430.00,5430.00,'2026-06-15 02:23:12','2026-06-15 02:23:12','xl'),(14,7,4,1,5430.00,5430.00,'2026-06-15 02:26:02','2026-06-15 02:26:02','xl'),(15,8,5,2,780.00,1560.00,'2026-06-15 02:39:07','2026-06-15 02:39:07','s'),(16,9,10,1,650.00,650.00,'2026-06-16 20:51:14','2026-06-16 20:51:14','39'),(17,10,10,1,650.00,650.00,'2026-06-16 21:15:56','2026-06-16 21:15:56','39'),(18,11,10,1,650.00,650.00,'2026-06-16 21:22:31','2026-06-16 21:22:31','39'),(19,12,10,1,650.00,650.00,'2026-06-16 21:25:35','2026-06-16 21:25:35','39'),(20,13,4,1,5430.00,5430.00,'2026-06-16 21:28:44','2026-06-16 21:28:44','xl'),(21,14,5,1,780.00,780.00,'2026-06-16 21:31:19','2026-06-16 21:31:19','l'),(22,15,7,1,2900.00,2900.00,'2026-06-16 21:41:41','2026-06-16 21:41:41','s'),(23,16,8,1,1280.00,1280.00,'2026-06-18 01:00:11','2026-06-18 01:00:11','xl'),(24,16,9,1,1890.00,1890.00,'2026-06-18 01:01:57','2026-06-18 01:01:57','xs');
/*!40000 ALTER TABLE `ventas_detalle` ENABLE KEYS */;
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

-- Dump completed on 2026-06-17 23:27:57
