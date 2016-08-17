-- MySQL dump 10.13  Distrib 5.7.13, for osx10.11 (x86_64)
--
-- Host: localhost    Database: mqprop
-- ------------------------------------------------------
-- Server version	5.7.13-log

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
-- Table structure for table `listing_images`
--

DROP TABLE IF EXISTS `listing_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `listing_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `listing_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `listing_images_listing_id_foreign` (`listing_id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `listing_images`
--

LOCK TABLES `listing_images` WRITE;
/*!40000 ALTER TABLE `listing_images` DISABLE KEYS */;
INSERT INTO `listing_images` VALUES (40,'m4Dr8R3XJrEoecml3stE.jpg',9,'2016-07-23 05:42:52','2016-07-23 05:42:52'),(42,'DGKcfsHdY1eEhU0y7AJE.jpg',9,'2016-07-23 05:43:44','2016-07-23 05:43:44'),(43,'nw4rXx7c2OJ74VgfN6kU.jpg',9,'2016-07-23 05:43:44','2016-07-23 05:43:44'),(44,'Wzn2pS0cfXdoPwS5AIVK.jpg',7,'2016-07-29 02:40:28','2016-07-29 02:40:28'),(45,'GQaBy7ixtLupkRsKJsXZ.jpg',7,'2016-07-29 02:40:31','2016-07-29 02:40:31'),(46,'UtUWIjrmg3yNOwGNZRQT.jpg',59,'2016-08-05 02:18:49','2016-08-05 02:18:49'),(47,'UmOtq8gdGUgEuICEnvm8.jpg',60,'2016-08-05 15:52:21','2016-08-05 15:52:21'),(48,'RYkfrydvv38UlJZJBO8g.jpg',60,'2016-08-05 15:52:29','2016-08-05 15:52:29'),(49,'3ivkGHeSnncFXOMRDGlV.jpg',61,'2016-08-05 15:57:38','2016-08-05 15:57:38'),(50,'Ljuz4ecC58d0v2tVbK8R.jpg',63,'2016-08-05 15:57:51','2016-08-05 15:57:51'),(51,'6rLFrYXHlLRo3mJK3XDq.jpg',64,'2016-08-05 15:58:04','2016-08-05 15:58:04');
/*!40000 ALTER TABLE `listing_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `listing_types`
--

DROP TABLE IF EXISTS `listing_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `listing_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `listing_types`
--

LOCK TABLES `listing_types` WRITE;
/*!40000 ALTER TABLE `listing_types` DISABLE KEYS */;
INSERT INTO `listing_types` VALUES (1,'Departamentos',NULL,'2016-07-24 17:31:48'),(2,'Oficinas',NULL,NULL),(3,'Casas',NULL,NULL),(4,'Terrenos',NULL,NULL),(5,'Locales',NULL,NULL),(6,'Garages',NULL,NULL),(7,'Cocheras',NULL,NULL),(8,'PHs',NULL,NULL);
/*!40000 ALTER TABLE `listing_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `listings`
--

DROP TABLE IF EXISTS `listings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `listings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `operation` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'sale',
  `short_desc` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `long_desc` longtext COLLATE utf8_unicode_ci NOT NULL,
  `likes` int(10) unsigned NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Consultar',
  `type` int(10) unsigned NOT NULL,
  `currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'U$S',
  PRIMARY KEY (`id`),
  KEY `listings_type_foreign` (`type`),
  CONSTRAINT `listings_type_foreign` FOREIGN KEY (`type`) REFERENCES `listing_types` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `listings`
--

LOCK TABLES `listings` WRITE;
/*!40000 ALTER TABLE `listings` DISABLE KEYS */;
INSERT INTO `listings` VALUES (59,'sdgsdgsd','sale','dsgsdgsd','sdgdsg',0,'{\"lat\":-34.652532439260284,\"lng\":-58.66626624223636}','2016-07-30 16:52:04','2016-07-30 17:02:30','dsgds',1,'U$S'),(60,'Chalet a estrenar','sale','Hermoso chalet en zona Ituzaingo centro','- Apto credito.\r\n- 2 habitaciones\r\n- 3 baños.\r\n- 70 m2.',0,'{\"lat\":-34.65860430232829,\"lng\":-58.6781967079346}','2016-08-05 15:52:31','2016-08-05 15:52:31','55000',3,'U$S'),(61,'Chalet a estrenar','sale','Hermoso chalet en zona Ituzaingo centro','- Apto credito.\r\n- 2 habitaciones\r\n- 3 baños.\r\n- 70 m2.',0,'{\"lat\":-34.65860430232829,\"lng\":-58.6781967079346}','2016-08-05 15:52:31','2016-08-05 15:52:31','55000',3,'U$S'),(62,'Chalet a estrenar','sale','Hermoso chalet en zona Ituzaingo centro','- Apto credito.\r\n- 2 habitaciones\r\n- 3 baños.\r\n- 70 m2.',0,'{\"lat\":-34.65860430232829,\"lng\":-58.6781967079346}','2016-08-05 15:52:31','2016-08-05 15:52:31','55000',3,'U$S'),(63,'Chalet a estrenar','sale','Hermoso chalet en zona Ituzaingo centro','- Apto credito.\r\n- 2 habitaciones\r\n- 3 baños.\r\n- 70 m2.',0,'{\"lat\":-34.65860430232829,\"lng\":-58.6781967079346}','2016-08-05 15:52:31','2016-08-05 15:52:31','55000',3,'U$S'),(64,'Chalet a estrenar','sale','Hermoso chalet en zona Ituzaingo centro','- Apto credito.\r\n- 2 habitaciones\r\n- 3 baños.\r\n- 70 m2.',0,'{\"lat\":-34.65860430232829,\"lng\":-58.6781967079346}','2016-08-05 15:52:31','2016-08-05 15:52:31','55000',3,'U$S'),(65,'Chalet a estrenar','sale','Hermoso chalet en zona Ituzaingo centro','- Apto credito.\r\n- 2 habitaciones\r\n- 3 baños.\r\n- 70 m2.',0,'{\"lat\":-34.65860430232829,\"lng\":-58.6781967079346}','2016-08-05 15:52:31','2016-08-05 15:52:31','55000',3,'U$S'),(66,'Chalet a estrenar','sale','Hermoso chalet en zona Ituzaingo centro','- Apto credito.\r\n- 2 habitaciones\r\n- 3 baños.\r\n- 70 m2.',0,'{\"lat\":-34.65860430232829,\"lng\":-58.6781967079346}','2016-08-05 15:52:31','2016-08-05 15:52:31','55000',3,'U$S'),(67,'Chalet a estrenar','sale','Hermoso chalet en zona Ituzaingo centro','- Apto credito.\r\n- 2 habitaciones\r\n- 3 baños.\r\n- 70 m2.',0,'{\"lat\":-34.65860430232829,\"lng\":-58.6781967079346}','2016-08-05 15:52:31','2016-08-05 15:52:31','55000',3,'U$S'),(68,'Chalet a estrenar','sale','Hermoso chalet en zona Ituzaingo centro','- Apto credito.\r\n- 2 habitaciones\r\n- 3 baños.\r\n- 70 m2.',0,'{\"lat\":-34.65860430232829,\"lng\":-58.6781967079346}','2016-08-05 15:52:31','2016-08-05 15:52:31','55000',3,'U$S'),(69,'Chalet a estrenar','sale','Hermoso chalet en zona Ituzaingo centro','- Apto credito.\r\n- 2 habitaciones\r\n- 3 baños.\r\n- 70 m2.',0,'{\"lat\":-34.65860430232829,\"lng\":-58.6781967079346}','2016-08-05 15:52:31','2016-08-05 15:52:31','55000',3,'U$S'),(70,'Chalet a estrenar','sale','Hermoso chalet en zona Ituzaingo centro','- Apto credito.\r\n- 2 habitaciones\r\n- 3 baños.\r\n- 70 m2.',0,'{\"lat\":-34.65860430232829,\"lng\":-58.6781967079346}','2016-08-05 15:52:31','2016-08-05 15:52:31','55000',3,'U$S'),(71,'Chalet a estrenar','sale','Hermoso chalet en zona Ituzaingo centro','- Apto credito.\r\n- 2 habitaciones\r\n- 3 baños.\r\n- 70 m2.',0,'{\"lat\":-34.65860430232829,\"lng\":-58.6781967079346}','2016-08-05 15:52:31','2016-08-05 15:52:31','55000',3,'U$S');
/*!40000 ALTER TABLE `listings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2016_06_08_024047_create_listings_table',1),('2016_06_17_005620_add_remember_to_users_table',1),('2016_07_03_153045_alter_users_v2',1),('2016_07_03_192526_alter_users_v3',1),('2016_07_03_204102_alter_price',1),('2016_07_04_221544_create_listing_types',1),('2016_07_04_222901_add_listing_types',1),('2016_07_17_233216_addListingImages',2),('2016_07_19_002930_addListingImageTimestamps',3),('2016_07_19_003144_listingImageDropKey',4),('2016_07_29_032301_listings_add_currency',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (41,'Fran','fran@marasco.com','$2y$10$6oD1tJnYKQjWmtwCDyCrCuSaedm4oRbHmAPEcBX5xKxW/EhO3jhCO','2016-07-24 14:44:52','rffU5Bjv72cO01c4FOcyeQFnnH1IkMOqKrX1jm4dyfGPBXjDQ8bhSa4sGrr3','2016-08-11 12:42:06');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-08-17 20:00:45
