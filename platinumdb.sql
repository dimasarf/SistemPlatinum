-- MySQL dump 10.13  Distrib 5.7.20, for Linux (x86_64)
--
-- Host: localhost    Database: platinumdb
-- ------------------------------------------------------
-- Server version	5.7.25-0ubuntu0.16.04.2

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
-- Table structure for table `jadwals`
--

DROP TABLE IF EXISTS `jadwals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jadwals` (
  `id` int(10) unsigned NOT NULL,
  `jam` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `idTentor` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `idMapel` int(11) NOT NULL,
  `idKelas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tanggal` varchar(255) COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`jam`,`idTentor`,`tanggal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jadwals`
--

LOCK TABLES `jadwals` WRITE;
/*!40000 ALTER TABLE `jadwals` DISABLE KEYS */;
INSERT INTO `jadwals` VALUES (3,'17.00 - 18.30','1',1,1,'2019-01-30 00:23:00','2019-01-30 00:23:00','2019-01-01'),(4,'17.00 - 18.30','1',1,1,'2019-01-30 00:26:56','2019-01-30 00:26:56','2019-01-02'),(5,'17.00 - 18.30','1',1,1,'2019-01-30 00:25:51','2019-01-30 00:25:51','2019-01-03'),(10,'17.00 - 18.30','1',1,1,'2019-01-30 00:30:32','2019-01-30 00:30:32','2019-01-23'),(13,'17.00 - 18.30','1',1,1,'2019-01-30 00:31:13','2019-01-30 00:31:13','2019-01-25'),(18,'17.00 - 18.30','1',1,1,'2019-02-03 23:36:30','2019-02-03 23:36:30','2019-02-14'),(33,'17.00 - 18.30','10',1,6,'2019-02-04 00:55:35','2019-02-04 00:55:35','2019-02-05'),(20,'17.00 - 18.30','12',14,6,'2019-02-04 00:03:12','2019-02-04 00:03:12','2019-02-04'),(22,'17.00 - 18.30','15',1,9,'2019-02-04 00:04:46','2019-02-04 00:04:46','2019-02-04'),(23,'17.00 - 18.30','18',13,17,'2019-02-04 00:05:03','2019-02-04 00:05:03','2019-02-04'),(7,'17.00 - 18.30','2',1,1,'2019-01-30 00:27:07','2019-01-30 00:27:07','2019-01-02'),(8,'17.00 - 18.30','2',1,1,'2019-01-30 00:26:19','2019-01-30 00:26:19','2019-01-03'),(11,'17.00 - 18.30','2',1,1,'2019-01-30 00:30:34','2019-01-30 00:30:34','2019-01-23'),(14,'17.00 - 18.30','2',1,1,'2019-01-30 00:31:16','2019-01-30 00:31:16','2019-01-25'),(21,'17.00 - 18.30','22',8,14,'2019-02-04 00:04:29','2019-02-04 00:04:29','2019-02-04'),(9,'17.00 - 18.30','3',1,1,'2019-01-30 00:25:57','2019-01-30 00:25:57','2019-01-03'),(12,'17.00 - 18.30','3',1,1,'2019-01-30 00:30:38','2019-01-30 00:30:38','2019-01-23'),(15,'17.00 - 18.30','3',2,1,'2019-01-30 00:31:21','2019-01-30 00:31:21','2019-01-25'),(19,'17.00 - 18.30','3',3,2,'2019-02-03 23:36:40','2019-02-03 23:36:40','2019-02-14'),(16,'18.30 - 20.00','1',1,1,'2019-01-30 00:31:25','2019-01-30 00:31:25','2019-01-25'),(28,'18.30 - 20.00','10',1,12,'2019-02-04 00:13:04','2019-02-04 00:13:04','2019-02-04'),(26,'18.30 - 20.00','14',4,10,'2019-02-04 00:06:49','2019-02-04 00:06:49','2019-02-04'),(25,'18.30 - 20.00','15',12,8,'2019-02-04 00:06:27','2019-02-04 00:06:27','2019-02-04'),(24,'18.30 - 20.00','17',6,7,'2019-02-04 00:05:24','2019-02-04 00:05:24','2019-02-04'),(27,'18.30 - 20.00','22',8,15,'2019-02-04 00:07:13','2019-02-04 00:07:13','2019-02-04'),(31,'20.00 - 21.30','10',12,20,'2019-02-04 00:14:53','2019-02-04 00:14:53','2019-02-04'),(29,'20.00 - 21.30','14',4,11,'2019-02-04 00:14:14','2019-02-04 00:14:14','2019-02-04'),(30,'20.00 - 21.30','15',12,16,'2019-02-04 00:14:35','2019-02-04 00:14:35','2019-02-04'),(32,'20.00 - 21.30','17',6,22,'2019-02-04 00:15:53','2019-02-04 00:15:53','2019-02-04'),(17,'20.30 - 22.00','1',1,1,'2019-01-30 00:31:29','2019-01-30 00:31:29','2019-01-25');
/*!40000 ALTER TABLE `jadwals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kelas`
--

DROP TABLE IF EXISTS `kelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kelas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jumlahMurid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kelas`
--

LOCK TABLES `kelas` WRITE;
/*!40000 ALTER TABLE `kelas` DISABLE KEYS */;
INSERT INTO `kelas` VALUES (6,'3 SMP A','2019-02-03 23:49:55','2019-02-03 23:49:55',11),(7,'3 SMP B','2019-02-03 23:50:12','2019-02-03 23:50:12',11),(8,'3 SMP C','2019-02-03 23:51:02','2019-02-03 23:51:02',11),(9,'2 IPA SMAN 1-A','2019-02-03 23:51:21','2019-02-03 23:51:21',10),(10,'2 IPA SMAN 1-B','2019-02-03 23:51:37','2019-02-03 23:51:37',11),(11,'3 IPA SMAN 1','2019-02-03 23:52:03','2019-02-03 23:52:03',8),(12,'3 IPA SMAN 4','2019-02-03 23:52:23','2019-02-03 23:52:23',10),(13,'3 IPA SMAN 8 - 12','2019-02-03 23:52:42','2019-02-03 23:52:42',8),(14,'3 IPS SMAN 1-A','2019-02-03 23:53:04','2019-02-03 23:53:04',9),(15,'3 IPS SMAN 1-B','2019-02-03 23:53:17','2019-02-03 23:53:17',17),(16,'3 IPS SMAN 4','2019-02-03 23:53:41','2019-02-03 23:53:41',6),(17,'3 SMKN 1-A','2019-02-03 23:54:03','2019-02-03 23:54:03',10),(18,'3 SMKN 1-B','2019-02-03 23:54:18','2019-02-03 23:54:18',14),(19,'3 SMKN 1-C TKJ','2019-02-03 23:54:33','2019-02-03 23:54:33',12),(20,'3 SMKN 1-D MESIN','2019-02-03 23:54:44','2019-02-03 23:54:44',12),(21,'3 SMKN 1-E ELEKTRO','2019-02-03 23:55:00','2019-02-03 23:55:00',9),(22,'3 SMKN 5','2019-02-03 23:55:14','2019-02-03 23:55:14',7);
/*!40000 ALTER TABLE `kelas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mapels`
--

DROP TABLE IF EXISTS `mapels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mapels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mapels`
--

LOCK TABLES `mapels` WRITE;
/*!40000 ALTER TABLE `mapels` DISABLE KEYS */;
INSERT INTO `mapels` VALUES (1,'Matematika Wajib','2018-03-26 08:30:03','2018-03-26 08:30:03'),(2,'Matematika Minat','2018-03-26 08:30:03','2018-03-26 08:30:03'),(3,'Fisika','2018-03-26 08:30:03','2018-03-26 08:30:03'),(4,'Kimia','2018-03-26 08:30:03','2018-03-26 08:30:03'),(5,'Biologi ','2018-03-26 08:30:03','2018-03-26 08:30:03'),(6,'Bahasa Indonesia','2018-03-26 08:30:03','2018-03-26 08:30:03'),(7,'Bahasa dan Sastra Inggris','2019-02-01 00:40:47','2019-02-01 00:40:47'),(8,'Ekonomi','2019-02-01 00:40:47','2019-02-01 00:40:47'),(9,'Sosiologi','2019-02-01 00:40:47','2019-02-01 00:40:47'),(10,'Geografi','2019-02-01 00:40:47','2019-02-01 00:40:47'),(11,'Sejarah','2019-02-01 00:40:47','2019-02-01 00:40:47'),(12,'Matematika','2019-02-01 00:40:47','2019-02-01 00:40:47'),(13,'Bahasa Inggris','2019-02-01 00:40:47','2019-02-01 00:40:47'),(14,'IPA','2019-02-01 00:40:47','2019-02-01 00:40:47'),(15,'Tes Potensi Akademik','2019-02-04 01:02:49','2019-02-04 01:02:49'),(16,'Seleksi Kompetensi Dasar - TIU','2019-02-04 01:03:35','2019-02-04 01:03:35'),(17,'Seleksi Kompetensi Dasar - TWK','2019-02-04 01:03:43','2019-02-04 01:03:43'),(18,'Seleksi Kompetensi Dasar - TKP','2019-02-04 01:03:52','2019-02-04 01:03:52'),(19,'Tes Bahasa Inggris','2019-02-04 01:04:11','2019-02-04 01:04:11');
/*!40000 ALTER TABLE `mapels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_01_29_135309_create_jadwals_table',1),(4,'2019_01_29_135621_create_mapels_table',1),(5,'2019_01_29_135640_create_tentors_table',1),(6,'2019_01_29_135729_create_classes_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tentors`
--

DROP TABLE IF EXISTS `tentors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tentors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tentor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tglGabung` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tentors`
--

LOCK TABLES `tentors` WRITE;
/*!40000 ALTER TABLE `tentors` DISABLE KEYS */;
INSERT INTO `tentors` VALUES (10,'Mas Khus','2019-02-03 23:45:48','2019-02-03 23:45:48','2019-02-02'),(11,'Mas Wawan','2019-02-03 23:46:00','2019-02-03 23:46:00','2019-02-01'),(12,'Mbak Sari','2019-02-03 23:46:09','2019-02-03 23:46:09','2019-02-01'),(13,'Mas Pebri','2019-02-03 23:46:20','2019-02-03 23:46:20','2019-02-01'),(14,'Mbak Rakhmah','2019-02-03 23:46:35','2019-02-03 23:46:35','2019-02-01'),(15,'Mbak Rima','2019-02-03 23:46:50','2019-02-03 23:46:50','2019-02-01'),(16,'Mas Dwi','2019-02-03 23:46:58','2019-02-03 23:46:58','2019-02-01'),(17,'Mas Arif','2019-02-03 23:47:04','2019-02-03 23:47:04','2019-02-01'),(18,'Mbak July','2019-02-03 23:47:14','2019-02-03 23:47:14','2019-02-01'),(19,'Mas Irwan','2019-02-03 23:47:20','2019-02-03 23:47:20','2019-02-01'),(20,'Mbak Putri','2019-02-03 23:47:27','2019-02-03 23:47:27','2019-02-01'),(21,'Mas Harry','2019-02-03 23:47:40','2019-02-03 23:47:40','2019-02-01'),(22,'Mbak Rini','2019-02-03 23:47:49','2019-02-03 23:47:49','2019-02-01'),(23,'Mbak Yeni','2019-02-03 23:47:56','2019-02-03 23:47:56','2019-02-01'),(24,'Mbak Jojo','2019-02-03 23:48:04','2019-02-03 23:48:04','2019-02-01');
/*!40000 ALTER TABLE `tentors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-02-20  9:59:24
