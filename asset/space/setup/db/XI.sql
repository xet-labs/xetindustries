-- MariaDB dump 10.19-11.4.3-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: XI
-- ------------------------------------------------------
-- Server version	11.4.3-MariaDB-1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

--
-- Table structure for table `blog_media`
--

DROP TABLE IF EXISTS `blog_media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_media` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `blog_id` bigint(20) unsigned NOT NULL,
  `media_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `blog_id` (`blog_id`),
  KEY `media_id` (`media_id`),
  CONSTRAINT `blog_media_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE,
  CONSTRAINT `blog_media_ibfk_2` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_media`
--

LOCK TABLES `blog_media` WRITE;
/*!40000 ALTER TABLE `blog_media` DISABLE KEYS */;
/*!40000 ALTER TABLE `blog_media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blogs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `status` enum('draft','published','published_hidden','archived') NOT NULL DEFAULT 'draft',
  `tags` varchar(255) DEFAULT NULL,
  `uid` bigint(20) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_title` varchar(255) DEFAULT NULL,
  `excerpt` text DEFAULT NULL,
  `featured_img` varchar(255) DEFAULT NULL,
  `path` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `page_meta` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `meta_og` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`meta_og`)),
  `meta_ld` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`meta_ld`)),
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blogs`
--

LOCK TABLES `blogs` WRITE;
/*!40000 ALTER TABLE `blogs` DISABLE KEYS */;
INSERT INTO `blogs` VALUES
(1,'published','[\"marketing insight\",\"seo\"]',4,'What is SEO? A beginner’s guide to search engine optimization','What is SEO ?','SEO is the strategic art of enhancing a website\'s visibility on search engines like Google, Bing, and Yahoo. It involves optimizing various elements to rank higher in search results, driving organic traffic and, ultimately, increasing the chances of converting visitors into customers.','/media/4/img/what-is-seo.webp','','what-is-seo','2024-05-15 12:05:14','2024-11-29 17:04:46','A beginner\'s guide to understanding and implementing (SEO) Search Engine Optimization.','what is SEO, Search Engine Optimization, what is website optimization, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL),
(2,'published','[\"passive income\"]',2,'Passive income by sharing internet',NULL,'Transform your internet connection into a Passive Income Stream by sharing your internet','/media/2/img/passive-income-by-sharing-internet.webp','','passive-income-by-sharing-internet','2024-05-16 12:06:14','2025-01-13 02:07:14','The Internet powers virtually every aspect of the modern economy, you can transform your Internet connection into a passive income stream by merely sharing your Internet connection','how to make money online, ways to make maney online, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL),
(3,'published','[\"mysterium node\"]',1,'Mysterium node backup & restore',NULL,'Backup & restore your mysterium node on windows and linux','/media/1/img/mysterium-node-backup-and-restore.webp','','mysterium-node-backup-and-restore','2024-05-01 12:06:14','2024-11-29 17:07:39','The Internet powers virtually every aspect of the modern economy, you can transform your Internet connection into a passive income stream by merely sharing your Internet connection','how to make money online, ways to make maney online, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL),
(4,'published_hidden',NULL,1,'Landscaping website cost guide',NULL,'The Internet powers virtually every aspect of the modern economy, transform your Internet connection into a passive income stream by merely sharing your Internet connection','https://static.wixstatic.com/media/4a5235_0c43c4a10f21440db61c8a99eeb102aa~mv2.jpg/v1/fill/w_740,h_488,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/4a5235_0c43c4a10f21440db61c8a99eeb102aa~mv2.jpg','/blog/@zet/passive-income-by-sharing-internet','passive-income-by-sharing-internet','2024-05-17 12:06:14','2025-01-12 15:05:39','The Internet powers virtually every aspect of the modern economy, you can transform your Internet connection into a passive income stream by merely sharing your Internet connection','how to make money online, ways to make maney online, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL),
(5,'published_hidden',NULL,1,'Rental property marketing to land more tenants. There goes',NULL,'The Internet powers virtually every aspect of the modern economy, transform your Internet connection into a passive income stream by merely sharing your Internet connection','https://static.wixstatic.com/media/c50e9e_1aca593a4e2942af9e21dea91269d1b0~mv2.jpg/v1/fill/w_740,h_403,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/c50e9e_1aca593a4e2942af9e21dea91269d1b0~mv2.jpg','','passive-income-by-sharing-internet','2024-05-01 12:06:14','2025-01-12 15:05:39','The Internet powers virtually every aspect of the modern economy, you can transform your Internet connection into a passive income stream by merely sharing your Internet connection','how to make money online, ways to make maney online, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL),
(6,'published_hidden',NULL,1,'How to create a defensible eCommerce business plan',NULL,'The Internet powers virtually every aspect of the modern economy, transform your Internet connection into a passive income stream by merely sharing your Internet connection','https://static.wixstatic.com/media/a77aa0_22823f1c03d44ced82ddc59885b8695f~mv2.jpg/v1/fill/w_740,h_423,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/a77aa0_22823f1c03d44ced82ddc59885b8695f~mv2.jpg','','passive-income-by-sharing-internet','2024-05-01 12:06:14','2025-01-12 15:05:39','The Internet powers virtually every aspect of the modern economy, you can transform your Internet connection into a passive income stream by merely sharing your Internet connection','how to make money online, ways to make maney online, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL),
(16,'published_hidden',NULL,4,'What is SEO? A beginner’s guide to search engine optimization','What is SEO ?','SEO is the strategic art of enhancing a website\'s visibility on search engines like Google, Bing, and Yahoo. It involves optimizing various elements to rank higher in search results, driving organic traffic and, ultimately, increasing the chances of converting visitors into customers.','/media/4/img/what-is-seo.webp','','what-is-seo','2024-05-15 12:05:14','2025-01-12 15:05:39','A beginner\'s guide to understanding and implementing (SEO) Search Engine Optimization.','what is SEO, Search Engine Optimization, what is website optimization, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL),
(17,'published_hidden',NULL,1,'Passive income by sharing internet',NULL,'The Internet powers virtually every aspect of the modern economy, transform your Internet connection into a passive income stream by merely sharing your Internet connection','/media/2/img/passive-income-by-sharing-internet.webp','','passive-income-by-sharing-internet','2024-04-16 12:06:14','2025-01-12 15:05:39','The Internet powers virtually every aspect of the modern economy, you can transform your Internet connection into a passive income stream by merely sharing your Internet connection','how to make money online, ways to make maney online, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL),
(18,'published_hidden',NULL,1,'Mysterium node backup & restore',NULL,'Backup & restore your mysterium node on windows and linux','/media/1/img/mysterium-node-backup-and-restore.webp','','mysterium-node-backup-and-restore','2024-04-01 12:06:14','2025-01-12 15:05:39','The Internet powers virtually every aspect of the modern economy, you can transform your Internet connection into a passive income stream by merely sharing your Internet connection','how to make money online, ways to make maney online, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL),
(19,'published_hidden',NULL,1,'Landscaping website cost guide',NULL,'The Internet powers virtually every aspect of the modern economy, transform your Internet connection into a passive income stream by merely sharing your Internet connection','https://static.wixstatic.com/media/4a5235_0c43c4a10f21440db61c8a99eeb102aa~mv2.jpg/v1/fill/w_740,h_488,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/4a5235_0c43c4a10f21440db61c8a99eeb102aa~mv2.jpg','/blog/@zet/passive-income-by-sharing-internet','passive-income-by-sharing-internet','2024-04-17 12:06:14','2025-01-12 15:05:39','The Internet powers virtually every aspect of the modern economy, you can transform your Internet connection into a passive income stream by merely sharing your Internet connection','how to make money online, ways to make maney online, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL),
(20,'published_hidden',NULL,1,'Rental property marketing to land more tenants. There goes',NULL,'The Internet powers virtually every aspect of the modern economy, transform your Internet connection into a passive income stream by merely sharing your Internet connection','https://static.wixstatic.com/media/c50e9e_1aca593a4e2942af9e21dea91269d1b0~mv2.jpg/v1/fill/w_740,h_403,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/c50e9e_1aca593a4e2942af9e21dea91269d1b0~mv2.jpg','','passive-income-by-sharing-internet','2024-04-01 12:06:14','2025-01-12 15:05:39','The Internet powers virtually every aspect of the modern economy, you can transform your Internet connection into a passive income stream by merely sharing your Internet connection','how to make money online, ways to make maney online, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL),
(21,'published_hidden',NULL,1,'How to create a defensible eCommerce business plan',NULL,'The Internet powers virtually every aspect of the modern economy, transform your Internet connection into a passive income stream by merely sharing your Internet connection','https://static.wixstatic.com/media/a77aa0_22823f1c03d44ced82ddc59885b8695f~mv2.jpg/v1/fill/w_740,h_423,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/a77aa0_22823f1c03d44ced82ddc59885b8695f~mv2.jpg','','passive-income-by-sharing-internet','2024-04-01 12:06:14','2025-01-12 15:05:39','The Internet powers virtually every aspect of the modern economy, you can transform your Internet connection into a passive income stream by merely sharing your Internet connection','how to make money online, ways to make maney online, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL),
(28,'published_hidden',NULL,1,'What is SEO? A beginner’s guide to search engine optimization','What is SEO ?','SEO is the strategic art of enhancing a website\'s visibility on search engines like Google, Bing, and Yahoo. It involves optimizing various elements to rank higher in search results, driving organic traffic and, ultimately, increasing the chances of converting visitors into customers.','/media/4/img/what-is-seo.webp','','what-is-seo','2024-03-15 12:05:14','2025-01-12 15:05:39','A beginner\'s guide to understanding and implementing (SEO) Search Engine Optimization.','what is SEO, Search Engine Optimization, what is website optimization, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL),
(29,'published_hidden',NULL,1,'Passive income by sharing internet',NULL,'The Internet powers virtually every aspect of the modern economy, transform your Internet connection into a passive income stream by merely sharing your Internet connection','/media/2/img/passive-income-by-sharing-internet.webp','','passive-income-by-sharing-internet','2024-03-16 12:06:14','2025-01-12 15:05:39','The Internet powers virtually every aspect of the modern economy, you can transform your Internet connection into a passive income stream by merely sharing your Internet connection','how to make money online, ways to make maney online, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL),
(30,'published_hidden',NULL,1,'Mysterium node backup & restore',NULL,'Backup & restore your mysterium node on windows and linux','/media/1/img/mysterium-node-backup-and-restore.webp','','mysterium-node-backup-and-restore','2024-03-01 12:06:14','2025-01-12 15:05:39','The Internet powers virtually every aspect of the modern economy, you can transform your Internet connection into a passive income stream by merely sharing your Internet connection','how to make money online, ways to make maney online, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL),
(31,'published_hidden',NULL,1,'Landscaping website cost guide',NULL,'The Internet powers virtually every aspect of the modern economy, transform your Internet connection into a passive income stream by merely sharing your Internet connection','https://static.wixstatic.com/media/4a5235_0c43c4a10f21440db61c8a99eeb102aa~mv2.jpg/v1/fill/w_740,h_488,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/4a5235_0c43c4a10f21440db61c8a99eeb102aa~mv2.jpg','/blog/@zet/passive-income-by-sharing-internet','passive-income-by-sharing-internet','2024-03-17 12:06:14','2025-01-12 15:05:39','The Internet powers virtually every aspect of the modern economy, you can transform your Internet connection into a passive income stream by merely sharing your Internet connection','how to make money online, ways to make maney online, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL),
(32,'published_hidden',NULL,1,'Rental property marketing to land more tenants. There goes',NULL,'The Internet powers virtually every aspect of the modern economy, transform your Internet connection into a passive income stream by merely sharing your Internet connection','https://static.wixstatic.com/media/c50e9e_1aca593a4e2942af9e21dea91269d1b0~mv2.jpg/v1/fill/w_740,h_403,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/c50e9e_1aca593a4e2942af9e21dea91269d1b0~mv2.jpg','','passive-income-by-sharing-internet','2024-03-01 12:06:14','2025-01-12 15:05:39','The Internet powers virtually every aspect of the modern economy, you can transform your Internet connection into a passive income stream by merely sharing your Internet connection','how to make money online, ways to make maney online, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL),
(33,'published_hidden',NULL,1,'How to create a defensible eCommerce business plan',NULL,'The Internet powers virtually every aspect of the modern economy, transform your Internet connection into a passive income stream by merely sharing your Internet connection','https://static.wixstatic.com/media/a77aa0_22823f1c03d44ced82ddc59885b8695f~mv2.jpg/v1/fill/w_740,h_423,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/a77aa0_22823f1c03d44ced82ddc59885b8695f~mv2.jpg','','passive-income-by-sharing-internet','2024-03-01 12:06:14','2025-01-12 15:05:39','The Internet powers virtually every aspect of the modern economy, you can transform your Internet connection into a passive income stream by merely sharing your Internet connection','how to make money online, ways to make maney online, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL),
(34,'published_hidden',NULL,1,'What is SEO? A beginner’s guide to search engine optimization','What is SEO ?','SEO is the strategic art of enhancing a website\'s visibility on search engines like Google, Bing, and Yahoo. It involves optimizing various elements to rank higher in search results, driving organic traffic and, ultimately, increasing the chances of converting visitors into customers.','/media/4/img/what-is-seo.webp','','what-is-seo','2024-03-15 12:05:14','2025-01-12 15:05:39','A beginner\'s guide to understanding and implementing (SEO) Search Engine Optimization.','what is SEO, Search Engine Optimization, what is website optimization, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL),
(35,'published_hidden',NULL,1,'Passive income by sharing internet',NULL,'The Internet powers virtually every aspect of the modern economy, transform your Internet connection into a passive income stream by merely sharing your Internet connection','/media/2/img/passive-income-by-sharing-internet.webp','','passive-income-by-sharing-internet','2024-03-16 12:06:14','2025-01-12 15:05:39','The Internet powers virtually every aspect of the modern economy, you can transform your Internet connection into a passive income stream by merely sharing your Internet connection','how to make money online, ways to make maney online, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL),
(36,'published_hidden',NULL,1,'Mysterium node backup & restore',NULL,'Backup & restore your mysterium node on windows and linux','/media/1/img/mysterium-node-backup-and-restore.webp','','mysterium-node-backup-and-restore','2024-03-01 12:06:14','2025-01-12 15:05:39','The Internet powers virtually every aspect of the modern economy, you can transform your Internet connection into a passive income stream by merely sharing your Internet connection','how to make money online, ways to make maney online, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL),
(37,'published_hidden',NULL,1,'Landscaping website cost guide',NULL,'The Internet powers virtually every aspect of the modern economy, transform your Internet connection into a passive income stream by merely sharing your Internet connection','https://static.wixstatic.com/media/4a5235_0c43c4a10f21440db61c8a99eeb102aa~mv2.jpg/v1/fill/w_740,h_488,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/4a5235_0c43c4a10f21440db61c8a99eeb102aa~mv2.jpg','/blog/@zet/passive-income-by-sharing-internet','passive-income-by-sharing-internet','2024-03-17 12:06:14','2025-01-12 15:05:39','The Internet powers virtually every aspect of the modern economy, you can transform your Internet connection into a passive income stream by merely sharing your Internet connection','how to make money online, ways to make maney online, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL),
(38,'published_hidden',NULL,1,'Rental property marketing to land more tenants. There goes',NULL,'The Internet powers virtually every aspect of the modern economy, transform your Internet connection into a passive income stream by merely sharing your Internet connection','https://static.wixstatic.com/media/c50e9e_1aca593a4e2942af9e21dea91269d1b0~mv2.jpg/v1/fill/w_740,h_403,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/c50e9e_1aca593a4e2942af9e21dea91269d1b0~mv2.jpg','','passive-income-by-sharing-internet','2024-03-01 12:06:14','2025-01-12 15:05:39','The Internet powers virtually every aspect of the modern economy, you can transform your Internet connection into a passive income stream by merely sharing your Internet connection','how to make money online, ways to make maney online, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL),
(39,'published_hidden',NULL,1,'How to create a defensible eCommerce business plan',NULL,'The Internet powers virtually every aspect of the modern economy, transform your Internet connection into a passive income stream by merely sharing your Internet connection','https://static.wixstatic.com/media/a77aa0_22823f1c03d44ced82ddc59885b8695f~mv2.jpg/v1/fill/w_740,h_423,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/a77aa0_22823f1c03d44ced82ddc59885b8695f~mv2.jpg','','passive-income-by-sharing-internet','2024-03-01 12:06:14','2025-01-12 15:05:39','The Internet powers virtually every aspect of the modern economy, you can transform your Internet connection into a passive income stream by merely sharing your Internet connection','how to make money online, ways to make maney online, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL);
/*!40000 ALTER TABLE `blogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('audio','image','video','document') NOT NULL,
  `hash` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `size` bigint(20) unsigned NOT NULL,
  `format` varchar(50) NOT NULL,
  `width` int(10) unsigned DEFAULT NULL,
  `height` int(10) unsigned DEFAULT NULL,
  `duration` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `hash` (`hash`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_media`
--

DROP TABLE IF EXISTS `user_media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_media` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uid` bigint(20) unsigned NOT NULL,
  `media_id` bigint(20) unsigned NOT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `uid` (`uid`,`media_id`),
  KEY `media_id` (`media_id`),
  CONSTRAINT `user_media_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE CASCADE,
  CONSTRAINT `user_media_ibfk_2` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_media`
--

LOCK TABLES `user_media` WRITE;
/*!40000 ALTER TABLE `user_media` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `uid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `name_l` varchar(80) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','dev','user') DEFAULT 'user',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `last_login` datetime DEFAULT NULL,
  `status` enum('active','inactive','suspended','deleted') DEFAULT 'active',
  `profile_img` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `config` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`config`)),
  `remember_token` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,'xet','Rishikesh','Prasad','rishikeshprasad@xetindustries.com',1,'$2y$12$3zXdoKP91LvYctZUrN9cYOfBV8TyAEeoQK5ADAVQuBINSBt1nJRTK','user','2024-07-27 04:05:01','2024-11-30 16:24:46',NULL,'active','/media/1/profile/xet.jpg',NULL,NULL,NULL,NULL,NULL),
(2,'zet','Zet','Ohio','zet@g.com',1,'$2y$12$3zXdoKP91LvYctZUrN9cYOfBV8TyAEeoQK5ADAVQuBINSBt1nJRTK','user','2024-07-27 04:13:44','2024-12-01 21:20:28',NULL,'active','/media/2/profile/zet.jpg',NULL,NULL,NULL,NULL,NULL),
(4,'cristine','Cristine','Lepcha','cr@g.com',0,'$2y$12$3zXdoKP91LvYctZUrN9cYOfBV8TyAEeoQK5ADAVQuBINSBt1nJRTK','user','2024-07-27 04:13:44','2024-11-29 16:29:56',NULL,'active','/media/4/profile/cristine.jpg',NULL,NULL,NULL,NULL,NULL),
(5,'t1','t1',NULL,'t1@g.com',0,'$2y$12$3zXdoKP91LvYctZUrN9cYOfBV8TyAEeoQK5ADAVQuBINSBt1nJRTK','user','2024-07-27 04:13:44','2024-11-29 21:22:51',NULL,'active','/media/3/profile/zet.jpg',NULL,NULL,NULL,NULL,NULL),
(6,'t','t11',NULL,'t@g.com',0,'$2y$12$gO0ra29BLIe/XpH9X688VeQUPm1eAc/B2sxXkYMZh/v36cpTAcSme','user','2024-11-30 15:33:21','2024-11-30 15:33:21',NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- Dump completed on 2025-01-13  2:31:20
