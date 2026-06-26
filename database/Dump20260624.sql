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

SET @@GLOBAL.GTID_PURGED=/*!80000 '+'*/ 'fbb71282-4c8f-11f1-9124-0045e2371110:1-2214';

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorias` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'zapatos',NULL,NULL),(2,'partes de arriba',NULL,NULL),(3,'partes de abajo',NULL,NULL),(4,'accesorio',NULL,NULL);
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consultas`
--

DROP TABLE IF EXISTS `consultas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `consultas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mensaje` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` enum('no_visto','visto') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no_visto',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consultas`
--

LOCK TABLES `consultas` WRITE;
/*!40000 ALTER TABLE `consultas` DISABLE KEYS */;
INSERT INTO `consultas` VALUES (1,'catalinamaidana18@gmail.com','caroooo','no_visto','2026-06-15 20:41:57','2026-06-15 20:41:57'),(2,'catalinamaidana18@gmail.com','lindo','visto','2026-06-15 20:44:32','2026-06-17 17:51:16'),(3,'facundomoreira12@hotmail.com','q tops tiene disponibles','visto','2026-06-15 20:49:50','2026-06-15 20:56:30');
/*!40000 ALTER TABLE `consultas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_05_15_165645_create_roles_table',1),(5,'2026_05_15_165821_create_usuarios_table',1),(6,'2026_05_18_011314_create_productos_table',1),(7,'2026_05_28_220002_add_imagen_to_productos_table',1),(8,'2026_05_29_183827_create_ventas_cabecera_table',1),(9,'2026_05_29_184005_create_ventas_detalle_table',1),(10,'2026_06_10_210545_add_new_fields_to_productos_table',1),(11,'2026_06_10_211534_remove_stock_from_productos_table',1),(12,'2026_06_10_211959_create_producto_talles_table',1),(13,'2026_06_10_210728_create_categorias_table',2),(14,'2026_06_15_143453_create_consultas_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto_talles`
--

DROP TABLE IF EXISTS `producto_talles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `producto_talles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `producto_id` bigint unsigned NOT NULL,
  `talle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `producto_talles_producto_id_foreign` (`producto_id`),
  CONSTRAINT `producto_talles_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto_talles`
--

LOCK TABLES `producto_talles` WRITE;
/*!40000 ALTER TABLE `producto_talles` DISABLE KEYS */;
INSERT INTO `producto_talles` VALUES (3,4,'m',0,'2026-06-11 16:48:28','2026-06-14 01:31:55'),(4,4,'xl',0,'2026-06-11 16:48:28','2026-06-16 21:28:52'),(12,5,'s',1,'2026-06-15 01:44:47','2026-06-15 02:39:24'),(13,5,'l',1,'2026-06-15 01:44:47','2026-06-16 21:31:26'),(15,7,'xs',8,'2026-06-16 18:23:25','2026-06-16 18:23:25'),(16,7,'s',2,'2026-06-16 18:23:25','2026-06-16 21:41:56'),(17,8,'m',1,'2026-06-16 18:28:48','2026-06-16 18:28:48'),(18,8,'l',2,'2026-06-16 18:28:48','2026-06-16 18:28:48'),(19,8,'xl',1,'2026-06-16 18:28:48','2026-06-18 01:08:07'),(20,9,'xs',2,'2026-06-16 18:31:16','2026-06-18 01:08:07'),(21,9,'s',1,'2026-06-16 18:31:16','2026-06-16 18:31:16'),(22,10,'37',1,'2026-06-16 20:26:27','2026-06-16 20:26:27'),(23,10,'38',1,'2026-06-16 20:26:27','2026-06-16 20:26:27'),(24,10,'39',1,'2026-06-16 20:26:27','2026-06-16 21:25:45'),(27,6,'único',2,'2026-06-17 01:21:41','2026-06-17 01:21:41'),(28,11,'unico',3,'2026-06-17 23:34:21','2026-06-17 23:34:21'),(29,12,'s',3,'2026-06-18 03:19:04','2026-06-18 03:19:04'),(30,12,'m',8,'2026-06-18 03:19:04','2026-06-18 03:19:04'),(31,13,'xs',1,'2026-06-18 03:22:01','2026-06-18 03:22:01'),(32,13,'l',3,'2026-06-18 03:22:01','2026-06-18 03:22:01'),(33,14,'m',6,'2026-06-18 03:24:59','2026-06-18 03:24:59'),(34,14,'xl',4,'2026-06-18 03:24:59','2026-06-18 03:24:59'),(35,15,'unico',4,'2026-06-18 03:40:24','2026-06-18 03:40:24'),(36,16,'36',1,'2026-06-18 03:45:43','2026-06-18 03:45:43'),(37,16,'37',1,'2026-06-18 03:45:43','2026-06-18 03:45:43'),(38,16,'38',1,'2026-06-18 03:45:43','2026-06-18 03:45:43'),(39,16,'39',1,'2026-06-18 03:45:43','2026-06-18 03:45:43'),(40,16,'40',5,'2026-06-18 03:45:43','2026-06-18 03:45:43'),(41,17,'xs',3,'2026-06-18 03:58:29','2026-06-18 03:58:29'),(42,17,'s',3,'2026-06-18 03:58:29','2026-06-18 03:58:29'),(43,17,'m',5,'2026-06-18 03:58:29','2026-06-18 03:58:29'),(44,17,'l',2,'2026-06-18 03:58:29','2026-06-18 03:58:29'),(45,18,'xs',8,'2026-06-18 04:05:00','2026-06-18 04:05:00'),(46,18,'s',3,'2026-06-18 04:05:00','2026-06-18 04:05:00'),(47,18,'m',2,'2026-06-18 04:05:00','2026-06-18 04:05:00'),(48,18,'l',6,'2026-06-18 04:05:00','2026-06-18 04:05:00'),(49,18,'xl',7,'2026-06-18 04:05:00','2026-06-18 04:05:00'),(50,19,'xs',6,'2026-06-18 04:13:56','2026-06-18 04:13:56'),(51,19,'s',7,'2026-06-18 04:13:56','2026-06-18 04:13:56'),(52,19,'m',6,'2026-06-18 04:13:56','2026-06-18 04:13:56'),(53,19,'l',7,'2026-06-18 04:13:56','2026-06-18 04:13:56'),(54,19,'xl',8,'2026-06-18 04:13:56','2026-06-18 04:13:56'),(55,20,'s',8,'2026-06-18 04:56:44','2026-06-18 04:56:44'),(56,20,'m',3,'2026-06-18 04:56:44','2026-06-18 04:56:44'),(57,21,'unico',10,'2026-06-18 05:06:33','2026-06-18 05:06:33'),(58,22,'xs',5,'2026-06-18 05:12:25','2026-06-18 05:12:25'),(59,22,'s',14,'2026-06-18 05:12:25','2026-06-18 05:12:25'),(60,22,'m',15,'2026-06-18 05:12:25','2026-06-18 05:12:25'),(61,22,'l',7,'2026-06-18 05:12:25','2026-06-18 05:12:25'),(62,22,'xl',5,'2026-06-18 05:12:25','2026-06-18 05:12:25'),(63,23,'xs',3,'2026-06-18 05:20:58','2026-06-18 05:20:58'),(64,23,'s',4,'2026-06-18 05:20:58','2026-06-18 05:20:58'),(65,23,'m',7,'2026-06-18 05:20:58','2026-06-18 05:20:58');
/*!40000 ALTER TABLE `producto_talles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `material` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `año` int DEFAULT NULL,
  `diseñador` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion_drop` text COLLATE utf8mb4_unicode_ci,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `precio` decimal(8,2) NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `categoria_id` bigint unsigned DEFAULT NULL,
  `estado` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo',
  PRIMARY KEY (`id`),
  KEY `productos_categoria_id_foreign` (`categoria_id`),
  CONSTRAINT `productos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (4,'Coat Diesel','Jacquard Oblique y Detalles en Cuero Vacuno',2019,'John Galliano','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc bibendum leo sit amet magna placerat, ut porttitor lacus pharetra.','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc bibendum leo sit amet magna placerat, ut porttitor lacus pharetra. Donec ornare, enim id rutrum cursus, risus ligula dignissim turpis, et pretium leo neque quis ipsum.',5430.00,'productos/eatsZP7bu98CzylIAqoKprr1YN08hqi04kupb9vg.jpg','2026-06-11 16:48:28','2026-06-11 16:48:28',NULL,2,'activo'),(5,'Amnesia Bra','Jacquard Oblique y Detalles en Cuero Vacuno',2019,'John Galliano','et pretium leo neque quis ipsum.','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc bibendum leo sit amet magna placerat, ut porttitor lacus pharetra. Donec ornare, enim id rutrum cursus, risus ligula dignissim turpis, et pretium leo neque quis ipsum.',780.00,'productos/UmO6H4tNFvmoIMtlJ2juRCQPdLVxHBWzTLO836xl.jpg','2026-06-11 16:49:49','2026-06-15 01:44:47',NULL,2,'activo'),(6,'Chanel Bag','lorem',2012,'lorem','lorem','lorem',2100.00,'productos/1djXUKQV15gUca057majvUUK1kPYQBTgJZyzE7lb.jpg','2026-06-16 18:19:10','2026-06-17 01:21:41',NULL,4,'inactivo'),(7,'Corset Dior Sastrero de Archivo','Forrería de seda natural y herrajes de fijación ocultos',2002,'John Galliano','Una selección curada que tiende un puente entre la opulencia del viejo continente y la melancolía','Una obra maestra de la arquitectura sobre el cuerpo. Este corset Dior evoca la mítica silueta del New Look a través de una moldería sastrera impecable y ballenas internas que esculpen la figura con absoluta elegancia.',2900.00,'productos/inVPjxBgcrToGwcR1G9aZ1N3GYQAFuCtxcgS2MFk.jpg','2026-06-16 18:23:25','2026-06-16 18:23:25',NULL,2,'activo'),(8,'Remera de Fútbol \"Ciudad de Dios\"','Poliéster técnico satinado',1997,'Manufactura Deportiva Brasileña (Archivo Independiente)','Sudestada Urbana. Un tributo al potrero, la calle y el ritmo de las barriadas latinoamericanas. Celebramos la cultura popular del continente a través de texturas, camisetas y prendas que cargan con una narrativa real, áspera y cargada de identidad local.','Una pieza de culto que respira la cultura popular brasileña y el pulso de los años 90. Esta camiseta de fútbol rinde homenaje al mítico barrio de Río de Janeiro, Cidade de Deus, capturando la esencia del potrero, la supervivencia y el ritmo de las calles que inspiraron el cine y la música latinoamericana.',1280.00,'productos/tmu3kgMd8j7uxdVC87GPnpD4BYUPvgbcoOsR6xum.jpg','2026-06-16 18:28:48','2026-06-16 18:28:48',NULL,2,'activo'),(9,'Baby Tee Marc Jacobs','100% Algodón peinado de trama acanalada',2014,'Marc Jacobs','Nostalgia del Trópico. Inspirado en el cruce cultural de la juventud latinoamericana de entresiglos. Una selección de prendas compactas, urbanas y atemporales que resisten el paso de las tendencias y celebran la identidad del guardarropa de herencia relajado pero con carácter.','El epítome del minimalismo rebelde de la transición de milenio. Esta baby tee de Marc Jacobs presenta el corte icónico de los años 90: mangas cortas pegadas, silueta sutilmente al cuerpo y un largo sutil sobre la cadera.',1890.00,'productos/FGRg3So0yq4dCqcSxsPQtLYlGgrdlITRMeIGzeVr.jpg','2026-06-16 18:31:16','2026-06-16 18:31:16',NULL,2,'activo'),(10,'Puma Speedcat \"Motorsport\"','Capellada de gamuza legítima (Suede), detalles en cuero flor y suela de caucho vulcanizado antideslizante.',2001,'Puma Archive','Una edición inspirada en el movimiento, los contrastes y las grandes distancias de nuestro continente. Un cruce entre la indumentaria técnica europea y el pulso vibrante de las metrópolis latinoamericanas, reuniendo piezas diseñadas para dejar huella a través del tiempo.','Nacidas en las pistas de carreras y consagradas en el asfalto urbano. Las emblemáticas Puma Speedcat se distinguen por su silueta aerodinámica de perfil bajo y su puntera redondeada confeccionada en gamuza de archivo premium.',650.00,'productos/XX2cmYMVHq3ebaRcPZYpSjXLp6sK9R63hPLhQNd2.jpg','2026-06-16 20:26:27','2026-06-16 20:26:27',NULL,1,'activo'),(11,'Anillo Dior Carrie Bradshaw','Metal noble con baño de paladio de alto brillo y acabado espejado.',2004,'John Galliano','Presentamos una selección de joyería y accesorios de archivo global que llegan a nuestro continente para aportar una impronta histórica, nostálgica y con una fuerte carga de identidad cultural a los armarios de nuestra región.','Una pieza de culto de la cultura pop y el coleccionismo de moda. Este anillo Dior de silueta robusta evoca la opulencia maximalista de principios de los años 2000, famoso por ser uno de los accesorios fetiche en los estilismos de Carrie Bradshaw. Destaca por el icónico logotipo de la maison labrado en relieve sobre una estructura imponente y pulida. Una joya que encapsula la era más rebelde y glamorosa de la alta costura, ideal para llevar como pieza única de declaración.',450.00,'productos/yPBK8nYoo2NUQEUvCmBcU5MLmoVZ2wZbLTMowFIk.jpg','2026-06-17 23:34:21','2026-06-17 23:34:21',NULL,4,'activo'),(12,'Pantalón Roberto Cavalli Archival','Premium Denim',2003,'Roberto Cavalli','Una pieza de archivo icónica de la era dorada de Roberto Cavalli. Este pantalón presenta un calce texturado con detalles de confección editorial, ideal para nuestra curaduría contemporánea. Conservado en excelentes condiciones de preservación vintage.','Deconstructed low-rise jeans with signature Cavalli print.',2560.00,'productos/ajYeyO3gfgHEZo2MBxPdvxJzQp2fz0SAHJivn73o.jpg','2026-06-18 03:19:04','2026-06-18 03:19:04',NULL,3,'activo'),(13,'Minifalda Denim Lolita','Denim de algodón premium con lavado vintage y detalles de avíos grabados',1998,'Vivienne Westwood','Una absoluta joya de la era dorada de Vivienne Westwood. Esta pollerita denim fusiona a la perfección la irreverencia del punk británico con la silueta delicada e inocente del estilo Lolita. Confeccionada en un denim texturado de caída impecable, destaca por su tablas marcadas y una estructura que realza el calce de forma espectacular.','Falda de jean plisada con el icónico corte rebelde y romántico de Vivienne.',980.00,'productos/vyrru5vX5BUvQugJi7pCsXec7i77PVHyy5Yg5MmW.jpg','2026-06-18 03:22:01','2026-06-18 03:22:01',NULL,3,'activo'),(14,'Minifalda Rayada Jean Paul Gaultier','Lana fría liviana y elastano con el clásico patrón marinero de la maison',1996,'Jean Paul Gaultier','Una pieza fundamental para entender el universo de Jean Paul Gaultier. Esta minifalda fusiona el clásico e identitario patrón a rayas marineras de la casa con un corte sastrero de tiro medio que esculpe la silueta a la perfección. Su tejido combina una caída estructurada con la comodidad justa para el uso diario, destacando por su simetría impecable y un carácter marcadamente urbano y vanguardista.','Pollera corta de archivo con la icónica estampa náutica subversiva de Gaultier.',1599.99,'productos/tUknVQFLoKdPDf8oH0WGjVRnwkc6SJwdybSa65pn.jpg','2026-06-18 03:24:59','2026-06-18 03:24:59',NULL,3,'activo'),(15,'Cartera de Hombro Jimmy Choo Archival','Cuero italiano genuino con detalles de herrajes dorados pulidos a espejo',2005,'Jimmy Choo','Una pieza de archivo deslumbrante que define la opulencia urbana de Jimmy Choo de mediados de los 2000. Esta cartera de hombro destaca por la sofisticación de su silueta estructurada, confeccionada en un cuero de grano finísimo que ha ganado carácter con los años. Cuenta con un imponente cierre de herraje grabado con el logo de la maison y un interior forrado en gamuza suave de conservación impoluta','Bolso de hombro confeccionado en cuero seleccionado con detalles metálicos identitarios',1350.00,'productos/ImaE4ZTSKhmKsDpHdoCcwxXF9R6Wx4Zb2YEH7RPt.jpg','2026-06-18 03:40:24','2026-06-18 03:40:24',NULL,4,'activo'),(16,'Zapatillas Isabel Marant Archival Beckett','Gamuza premium y cuero seleccionado con ajuste de abrojos y lengüeta acolchada',2012,'Isabel Marant','Una silueta legendaria que redefinió el calzado urbano de lujo en la década de 2010. Estas zapatillas de Isabel Marant combinan a la perfección la comodidad del calzado deportivo con la sofisticación de una plataforma oculta que estiliza la figura de manera orgánica. Destacan por su icónico diseño de paneles texturados en gamuza ultra suave, triples tiras de abrojo y una lengüeta sobredimensionada que aporta volumen editorial','Zapatillas de archivo con plataforma oculta en una combinación de texturas exquisita.',720.00,'productos/ydfg0iToprWke8OCpvKbmdPovK1Uw8bF6W9Z4R5R.jpg','2026-06-18 03:45:43','2026-06-18 03:45:43',NULL,1,'activo'),(17,'Corset Top Vivienne Westwood Archival Portrait','Satén de seda grueso con paneles estructurados y cordón ajustable premium',1993,'Vivienne Westwood','Una obra de arte icónica e invaluable del universo de Vivienne Westwood. Este top estilo corset rinde homenaje a la obsesión de la diseñadora por el arte rococó y las estructuras de la indumentaria histórica del siglo XVIII. Diseñado con paneles internos que moldean y estructuran la silueta de manera dramática y espectacular, la pieza destaca por el brillo sutil de su satén de seda y su confección de alta costura','Top estilo corset de archivo con estructura clásica y estampa artística de la maison',1420.00,'productos/aCR1Cf52VT3cVe6fYQhaOWocSCg77WEFHduZdKT7.jpg','2026-06-18 03:58:29','2026-06-18 03:58:29',NULL,2,'activo'),(18,'Campera Cardea Grey Archival Distressed','Algodón pesado texturado con lavado mineral profundo y avíos metálicos oxidados',2024,'Cardea Grey','Una pieza de ingeniería textil impecable de Cardea Grey. Esta campera encarna a la perfección la visión brutalista y orgánica de la marca a través de un corte deconstruido de hombros caídos y proporciones sutilmente boxy. Destaca por su proceso de teñido artesanal y lavado mineral, que le otorga una textura visual tridimensional única llena de matices grisáceos y desgastes sutiles en las costuras','Campera de archivo con silueta deconstruida, tintura artesanal y sutil desgaste matérico.',1250.00,'productos/eUhVwpVXKx7RXYeHJ3nMY8IWqISRH1FnSLs8Pdzi.jpg','2026-06-18 04:05:00','2026-06-18 04:05:00',NULL,2,'activo'),(19,'Campera Roberto Cavalli Archival Burgundy','Gamuza bovina premium color borgoña, apliques de piel de zorro natural y flecos de cuero cortados a mano',2002,'Roberto Cavalli','Una obra maestra absoluta del maximalismo y la sensualidad de Roberto Cavalli de principios de los 2000. Esta campera en un tono burgundy profundo y magnético es una declaración de puro diseño de archivo. Confeccionada en una gamuza suntuosa de tacto aterciopelado, la estructura destaca por su imponente cuello y puños de piel ultra suave, entrelazados con una cascada de flecos que aportan un movimiento espectacular y tridimensional a cada paso.','Pieza de pasarela icónica en gamuza profunda con imponentes detalles de piel y flecos en movimiento.',2450.00,'productos/hXLsgzErsfkwFO2mHkCD1KQVX2qH3o0zCMVLUKbX.jpg','2026-06-18 04:13:56','2026-06-18 04:13:56',NULL,2,'activo'),(20,'Minifalda Just Cavalli Archival Yellow Feather','Seda natural satinada con apliques completos de plumas de avestruz seleccionadas y teñidas a mano',2004,'Roberto Cavalli','Una pieza de archivo absolutamente magnética e irreverente de la línea Just Cavalli. Esta minifalda despliega toda la audacia y el glamour festivo de mediados de los años 2000. Diseñada sobre una base de seda ligera en un tono amarillo vibrante, destaca por su exquisito y suntuoso trabajo de plumas que caen en capas, aportando una textura orgánica, fluida y un movimiento espectacular con cada paso. Una silueta icónica de la cultura pop de la época, ideal para quienes buscan una prenda con carácter de colección y una presencia visual inigualable. Conservada en impecables condiciones vintage.','Minifalda de archivo confeccionada en seda con un imponente trabajo artesanal de plumas en amarillo vibrante.',1100.00,'productos/fzWH1LB1aEcl7YjS5N7D7CS54jrnNJKVPojsA8XM.jpg','2026-06-18 04:56:44','2026-06-18 04:56:44',NULL,3,'activo'),(21,'Anillo Escultural Archival Greco-Romano con Gemas','Oro sólido satinado con engaste artesanal de zafiros multicolores, turmalinas y topacios',2001,'Fine Jewelry Archive','Una verdadera obra de arte hecha joya. Este anillo de moldería escultural presenta la mitad de un rostro de inspiración clásica greco-romana tallado minuciosamente sobre oro con un acabado mate satinado espectacular. El contorno del rostro se ve sutilmente interrumpido por un delicado racimo de gemas naturales engastadas a mano, incluyendo zafiros profundos, turmalinas rosadas y topacios en tonos cálidos y verdosos que aportan un contraste cromático y una luz fascinante. Una pieza magnética, cargada de simbolismo, historia y un valor artístico inigualable, seleccionada especialmente para nuestra curaduría de objetos de culto.','Anillo de diseño escultural que fusiona misticismo antiguo y gemas preciosas.',399.99,'productos/PjfEsR3NwqQINVWr5eeJyJRHsWQ3nUuh3KZbjCxH.jpg','2026-06-18 05:06:33','2026-06-18 05:06:33',NULL,4,'activo'),(22,'Top de Tirantes Archival Sequined Pin-Up Illustration','Malla ligera completamente bordada con micro-lentejuelas reflectantes y tirantes de satén de seda',2002,'Y2K Luxury Archive','Una pieza de archivo deslumbrante y ultra identitaria de la estética Y2K de pasarela. Este top de tirantes finos destaca por su confección artesanal, donde miles de micro-lentejuelas cosidas meticulosamente recrean la ilustración de una chica de inspiración pin-up y trazos anime con un chupetín. La caída fluida del tejido se complementa con sutiles tirantes contrastantes en tono borgoña profundo, logrando un balance perfecto entre la irreverencia pop y la sofisticación del diseño de culto. Una prenda de colección sumamente llamativa, ideal para coleccionistas y amantes del archivo de lujo contemporáneo, conservada en excelentes condiciones.','Top de archivo completamente cubierto de lentejuelas con una ilustración gráfica de gran impacto visual.',600.00,'productos/IacbH9JSbJenYkwT0fksDqfXUFm67UUfQ0XXGoaX.jpg','2026-06-18 05:12:25','2026-06-18 05:12:25',NULL,2,'activo'),(23,'Body Escultural Halter Archival Textured Fringe','Licra mate de alta compresión en tono oliva profundo y aplique tridimensional de hilos textiles texturados en degradé',1990,'Avant-Garde Studio','Una pieza de diseño verdaderamente vanguardista y arquitectónica. Este body destaca por su silueta de cuello halter con tirantes cruzados minimalistas que contrastan de forma espectacular con un monumental aplique tridimensional. El panel frontal despliega una corona texturada de flecos densos con un degradé orgánico que transiciona de verdes musgo a tonos tierra y naranjas quemados, simulando texturas de la naturaleza con una sofisticación urbana inigualable. Confeccionado sobre una base de licra premium que esculpe la silueta de manera impecable, es una prenda con una carga conceptual y una presencia escénica arrolladora, seleccionada especialmente para nuestra curaduría contemporánea.','Body de diseño halter con un imponente juego de texturas orgánicas y movimiento.',1150.00,'productos/7ctRCtEh4svUXwsGVvcj1hTNSsrUQ51MLJS9Ho1f.jpg','2026-06-18 05:20:58','2026-06-18 05:20:58',NULL,2,'activo');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_nombre_unique` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,NULL,NULL,'Admin',NULL,NULL),(2,NULL,NULL,'Cliente',NULL,NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('18nuFefyCaRx6OeGu92G5w4lXzw94CJruIdoRAwA',1,'127.0.0.1','Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1','eyJfdG9rZW4iOiJXbjBPd2pQSWp5R0pSc1Vma0J1dWVvd1l4QzlYeEN1QmxVb2xHZDR6IiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvZ3J1cG8yNC50ZXN0XC9wcm9kdWN0b3NcLzQiLCJyb3V0ZSI6InByb2R1Y3Rvcy5zaG93In0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxfQ==',1781750565),('8t5VUBy0eCelDsmjXcS12mQPkyyzgEQOucW0d6ZA',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.28.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36','eyJfdG9rZW4iOiJTWnRPM3VFT21uMHlpeGFWbW9zMDFtbzdPZTViVzFHNkxXRGdpRjdIIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2dydXBvMjQudGVzdFwvP2hlcmQ9cHJldmlldyIsInJvdXRlIjoiaG9tZSJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19',1781796048),('FbKiSjAAHKkSx0qub35j1cFeVuVhT9KBmLsKABDq',NULL,'127.0.0.1','Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1','eyJfdG9rZW4iOiJKNHBoOGIwWEhCWURYQjFua0lLbzJDVnlnNU9tVnR6cjIwdHA1TGFnIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2dydXBvMjQudGVzdFwvcHJvZHVjdG9zXC8yMyIsInJvdXRlIjoicHJvZHVjdG9zLnNob3cifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1781797119),('gxabVQCJhE12XZC9ASd138sZ3e7vUJloj5aZVi9d',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.28.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36','eyJfdG9rZW4iOiJhMGVZbDA1MUxNV0R4ODFHcDFyYWdmRkJXbnA0aEFrUUVQVU9yM0VYIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2dydXBvMjQudGVzdFwvP2hlcmQ9cHJldmlldyIsInJvdXRlIjoiaG9tZSJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19',1782050338),('jxMU3BmBnI5DyLEmmevQJNbFXOYNoGWd8mrUztEb',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJjTm1nOVhQYXRhZEduRWU3cDRGc2RtRDZGY3FuN0FVZnAwRGx0b0V1IiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvZ3J1cG8yNC50ZXN0Iiwicm91dGUiOiJob21lIn19',1782327676),('Rcd1bvzrlV0DNZ0g3FlxvHnMcJj5SEWzleqTPSUr',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36','eyJfdG9rZW4iOiIxMDh4TDBTWXBicWpWR3VZZnlmSFJKU0VpbnNQUjdlVmxKYzFVNVdsIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2dydXBvMjQudGVzdFwvbG9naW4iLCJyb3V0ZSI6ImxvZ2luIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1782335435),('VDtfBzLN8BjeaSAR3ufwLTgquSfhtyhU1TWmwyOQ',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.28.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36','eyJfdG9rZW4iOiJ5cUFpUUlsZ3JhN2EzUHlzc1Z0TkZVUGZTS284SnNZdXpBbjVpamNFIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2dydXBvMjQudGVzdFwvP2hlcmQ9cHJldmlldyIsInJvdXRlIjoiaG9tZSJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19',1782321426);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rol_id` bigint unsigned NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuarios_email_unique` (`email`),
  KEY `usuarios_rol_id_foreign` (`rol_id`),
  CONSTRAINT `usuarios_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'2026-06-11 00:46:58','2026-06-11 00:46:58','Catalina Maidana','catalinamaidana18@gmail.com','$2y$12$IAG6X1Lk.ydweYD82IXMq.1vQWNJsosEfqUbWV2m.4Js0b9BslTrq',1,NULL,NULL),(2,'2026-06-11 02:27:07','2026-06-11 02:27:07','Camila Maidana','camilamaidana18@gmail.com','$2y$12$b0QxNXWZ3JtMB3H10M2aY.dFrDndDF39SuroFulbBNpxXHaEf2u5e',2,NULL,NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

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

-- Dump completed on 2026-06-24 20:09:53
