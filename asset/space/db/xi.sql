/*M!999999\- enable the sandbox mode */ 
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
-- Table structure for table `Blogs`
--

DROP TABLE IF EXISTS `Blogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Blogs` (
  `blogId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` enum('draft','published','archived') NOT NULL DEFAULT 'draft',
  `category` text DEFAULT NULL,
  `uid` varchar(20) NOT NULL,
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
  PRIMARY KEY (`blogId`),
  KEY `fk_blogs_users` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Blogs`
--

LOCK TABLES `Blogs` WRITE;
/*!40000 ALTER TABLE `Blogs` DISABLE KEYS */;
INSERT INTO `Blogs` VALUES
(1,'published','[\"marketing insight\",\"seo\"]','cristine','What is SEO? A beginner’s guide to search engine optimization','What is SEO ?','SEO is the strategic art of enhancing a website\'s visibility on search engines like Google, Bing, and Yahoo. It involves optimizing various elements to rank higher in search results, driving organic traffic and, ultimately, increasing the chances of converting visitors into customers.','/blog/what-is-seo/asset/img/what-is-seo.webp','/blog/what-is-seo',NULL,'2024-05-15 12:05:14','2024-08-24 19:28:47','A beginner\'s guide to understanding and implementing (SEO) Search Engine Optimization.','what is SEO, Search Engine Optimization, what is website optimization, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL),
(2,'published','[\"PASSIVE INCOME\"]','zet','Passive income by sharing internet',NULL,'The Internet powers virtually every aspect of the modern economy, transform your Internet connection into a passive income stream by merely sharing your Internet connection','/blog/passive-income-by-sharing-internet/asset/img/passive-income-by-sharing-internet.webp','/blog/passive-income-by-sharing-internet',NULL,'2024-05-16 12:06:14','2024-08-24 19:26:29','The Internet powers virtually every aspect of the modern economy, you can transform your Internet connection into a passive income stream by merely sharing your Internet connection','how to make money online, ways to make maney online, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL),
(3,'published','[\"mysterium node\"]','xet','Mysterium node backup & restore',NULL,'Backup & restore your mysterium node on windows and linux','/blog/mysterium-node-backup-and-restore/asset/img/mysterium-node-backup-and-restore.webp','/blog/mysterium-node-backup-and-restore',NULL,'2024-05-01 12:06:14','2024-08-25 13:48:14','The Internet powers virtually every aspect of the modern economy, you can transform your Internet connection into a passive income stream by merely sharing your Internet connection','how to make money online, ways to make maney online, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL),
(4,'published',NULL,'xet','Landscaping website cost guide',NULL,'The Internet powers virtually every aspect of the modern economy, transform your Internet connection into a passive income stream by merely sharing your Internet connection','https://static.wixstatic.com/media/4a5235_0c43c4a10f21440db61c8a99eeb102aa~mv2.jpg/v1/fill/w_740,h_488,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/4a5235_0c43c4a10f21440db61c8a99eeb102aa~mv2.jpg','/blog/passive-income-by-sharing-internet',NULL,'2024-05-17 12:06:14','2024-08-24 19:26:29','The Internet powers virtually every aspect of the modern economy, you can transform your Internet connection into a passive income stream by merely sharing your Internet connection','how to make money online, ways to make maney online, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL),
(5,'published',NULL,'xet','Rental property marketing to land more tenants. There goes',NULL,'The Internet powers virtually every aspect of the modern economy, transform your Internet connection into a passive income stream by merely sharing your Internet connection','https://static.wixstatic.com/media/c50e9e_1aca593a4e2942af9e21dea91269d1b0~mv2.jpg/v1/fill/w_740,h_403,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/c50e9e_1aca593a4e2942af9e21dea91269d1b0~mv2.jpg','/blog/passive-income-by-sharing-internet',NULL,'2024-05-01 12:06:14','2024-08-18 22:28:15','The Internet powers virtually every aspect of the modern economy, you can transform your Internet connection into a passive income stream by merely sharing your Internet connection','how to make money online, ways to make maney online, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL),
(6,'published',NULL,'xet','How to create a defensible eCommerce business plan',NULL,'The Internet powers virtually every aspect of the modern economy, transform your Internet connection into a passive income stream by merely sharing your Internet connection','https://static.wixstatic.com/media/a77aa0_22823f1c03d44ced82ddc59885b8695f~mv2.jpg/v1/fill/w_740,h_423,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/a77aa0_22823f1c03d44ced82ddc59885b8695f~mv2.jpg','/blog/passive-income-by-sharing-internet',NULL,'2024-05-01 12:06:14','2024-08-18 22:28:15','The Internet powers virtually every aspect of the modern economy, you can transform your Internet connection into a passive income stream by merely sharing your Internet connection','how to make money online, ways to make maney online, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL),
(16,'published',NULL,'cristine','What is SEO? A beginner’s guide to search engine optimization','What is SEO ?','SEO is the strategic art of enhancing a website\'s visibility on search engines like Google, Bing, and Yahoo. It involves optimizing various elements to rank higher in search results, driving organic traffic and, ultimately, increasing the chances of converting visitors into customers.','/blog/what-is-seo/asset/img/what-is-seo.webp','/blog/what-is-seo',NULL,'2024-05-15 12:05:14','2024-08-24 19:30:36','A beginner\'s guide to understanding and implementing (SEO) Search Engine Optimization.','what is SEO, Search Engine Optimization, what is website optimization, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL),
(17,'published',NULL,'xet','Passive income by sharing internet',NULL,'The Internet powers virtually every aspect of the modern economy, transform your Internet connection into a passive income stream by merely sharing your Internet connection','/blog/passive-income-by-sharing-internet/asset/img/passive-income-by-sharing-internet.webp','/blog/passive-income-by-sharing-internet',NULL,'2024-04-16 12:06:14','2024-08-18 22:28:15','The Internet powers virtually every aspect of the modern economy, you can transform your Internet connection into a passive income stream by merely sharing your Internet connection','how to make money online, ways to make maney online, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL),
(18,'published',NULL,'xet','Mysterium node backup & restore',NULL,'Backup & restore your mysterium node on windows and linux','/blog/mysterium-node-backup-and-restore/asset/img/mysterium-node-backup-and-restore.webp','/blog/mysterium-node-backup-and-restore',NULL,'2024-04-01 12:06:14','2024-08-18 22:28:15','The Internet powers virtually every aspect of the modern economy, you can transform your Internet connection into a passive income stream by merely sharing your Internet connection','how to make money online, ways to make maney online, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL),
(19,'published',NULL,'xet','Landscaping website cost guide',NULL,'The Internet powers virtually every aspect of the modern economy, transform your Internet connection into a passive income stream by merely sharing your Internet connection','https://static.wixstatic.com/media/4a5235_0c43c4a10f21440db61c8a99eeb102aa~mv2.jpg/v1/fill/w_740,h_488,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/4a5235_0c43c4a10f21440db61c8a99eeb102aa~mv2.jpg','/blog/passive-income-by-sharing-internet',NULL,'2024-04-17 12:06:14','2024-08-18 22:28:15','The Internet powers virtually every aspect of the modern economy, you can transform your Internet connection into a passive income stream by merely sharing your Internet connection','how to make money online, ways to make maney online, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL),
(20,'published',NULL,'xet','Rental property marketing to land more tenants. There goes',NULL,'The Internet powers virtually every aspect of the modern economy, transform your Internet connection into a passive income stream by merely sharing your Internet connection','https://static.wixstatic.com/media/c50e9e_1aca593a4e2942af9e21dea91269d1b0~mv2.jpg/v1/fill/w_740,h_403,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/c50e9e_1aca593a4e2942af9e21dea91269d1b0~mv2.jpg','/blog/passive-income-by-sharing-internet',NULL,'2024-04-01 12:06:14','2024-08-18 22:28:15','The Internet powers virtually every aspect of the modern economy, you can transform your Internet connection into a passive income stream by merely sharing your Internet connection','how to make money online, ways to make maney online, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL),
(21,'published',NULL,'xet','How to create a defensible eCommerce business plan',NULL,'The Internet powers virtually every aspect of the modern economy, transform your Internet connection into a passive income stream by merely sharing your Internet connection','https://static.wixstatic.com/media/a77aa0_22823f1c03d44ced82ddc59885b8695f~mv2.jpg/v1/fill/w_740,h_423,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/a77aa0_22823f1c03d44ced82ddc59885b8695f~mv2.jpg','/blog/passive-income-by-sharing-internet',NULL,'2024-04-01 12:06:14','2024-08-18 22:28:15','The Internet powers virtually every aspect of the modern economy, you can transform your Internet connection into a passive income stream by merely sharing your Internet connection','how to make money online, ways to make maney online, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL),
(28,'published',NULL,'xet','What is SEO? A beginner’s guide to search engine optimization','What is SEO ?','SEO is the strategic art of enhancing a website\'s visibility on search engines like Google, Bing, and Yahoo. It involves optimizing various elements to rank higher in search results, driving organic traffic and, ultimately, increasing the chances of converting visitors into customers.','/blog/what-is-seo/asset/img/what-is-seo.webp','/blog/what-is-seo',NULL,'2024-03-15 12:05:14','2024-08-18 22:28:15','A beginner\'s guide to understanding and implementing (SEO) Search Engine Optimization.','what is SEO, Search Engine Optimization, what is website optimization, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL),
(29,'published',NULL,'xet','Passive income by sharing internet',NULL,'The Internet powers virtually every aspect of the modern economy, transform your Internet connection into a passive income stream by merely sharing your Internet connection','/blog/passive-income-by-sharing-internet/asset/img/passive-income-by-sharing-internet.webp','/blog/passive-income-by-sharing-internet',NULL,'2024-03-16 12:06:14','2024-08-18 22:28:15','The Internet powers virtually every aspect of the modern economy, you can transform your Internet connection into a passive income stream by merely sharing your Internet connection','how to make money online, ways to make maney online, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL),
(30,'published',NULL,'xet','Mysterium node backup & restore',NULL,'Backup & restore your mysterium node on windows and linux','/blog/mysterium-node-backup-and-restore/asset/img/mysterium-node-backup-and-restore.webp','/blog/mysterium-node-backup-and-restore',NULL,'2024-03-01 12:06:14','2024-08-18 22:28:15','The Internet powers virtually every aspect of the modern economy, you can transform your Internet connection into a passive income stream by merely sharing your Internet connection','how to make money online, ways to make maney online, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL),
(31,'published',NULL,'xet','Landscaping website cost guide',NULL,'The Internet powers virtually every aspect of the modern economy, transform your Internet connection into a passive income stream by merely sharing your Internet connection','https://static.wixstatic.com/media/4a5235_0c43c4a10f21440db61c8a99eeb102aa~mv2.jpg/v1/fill/w_740,h_488,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/4a5235_0c43c4a10f21440db61c8a99eeb102aa~mv2.jpg','/blog/passive-income-by-sharing-internet',NULL,'2024-03-17 12:06:14','2024-08-18 22:28:15','The Internet powers virtually every aspect of the modern economy, you can transform your Internet connection into a passive income stream by merely sharing your Internet connection','how to make money online, ways to make maney online, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL),
(32,'published',NULL,'xet','Rental property marketing to land more tenants. There goes',NULL,'The Internet powers virtually every aspect of the modern economy, transform your Internet connection into a passive income stream by merely sharing your Internet connection','https://static.wixstatic.com/media/c50e9e_1aca593a4e2942af9e21dea91269d1b0~mv2.jpg/v1/fill/w_740,h_403,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/c50e9e_1aca593a4e2942af9e21dea91269d1b0~mv2.jpg','/blog/passive-income-by-sharing-internet',NULL,'2024-03-01 12:06:14','2024-08-18 22:28:15','The Internet powers virtually every aspect of the modern economy, you can transform your Internet connection into a passive income stream by merely sharing your Internet connection','how to make money online, ways to make maney online, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL),
(33,'published',NULL,'xet','How to create a defensible eCommerce business plan',NULL,'The Internet powers virtually every aspect of the modern economy, transform your Internet connection into a passive income stream by merely sharing your Internet connection','https://static.wixstatic.com/media/a77aa0_22823f1c03d44ced82ddc59885b8695f~mv2.jpg/v1/fill/w_740,h_423,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/a77aa0_22823f1c03d44ced82ddc59885b8695f~mv2.jpg','/blog/passive-income-by-sharing-internet',NULL,'2024-03-01 12:06:14','2024-08-18 22:28:15','The Internet powers virtually every aspect of the modern economy, you can transform your Internet connection into a passive income stream by merely sharing your Internet connection','how to make money online, ways to make maney online, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL),
(34,'published',NULL,'xet','What is SEO? A beginner’s guide to search engine optimization','What is SEO ?','SEO is the strategic art of enhancing a website\'s visibility on search engines like Google, Bing, and Yahoo. It involves optimizing various elements to rank higher in search results, driving organic traffic and, ultimately, increasing the chances of converting visitors into customers.','/blog/what-is-seo/asset/img/what-is-seo.webp','/blog/what-is-seo',NULL,'2024-03-15 12:05:14','2024-08-18 22:28:15','A beginner\'s guide to understanding and implementing (SEO) Search Engine Optimization.','what is SEO, Search Engine Optimization, what is website optimization, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL),
(35,'published',NULL,'xet','Passive income by sharing internet',NULL,'The Internet powers virtually every aspect of the modern economy, transform your Internet connection into a passive income stream by merely sharing your Internet connection','/blog/passive-income-by-sharing-internet/asset/img/passive-income-by-sharing-internet.webp','/blog/passive-income-by-sharing-internet',NULL,'2024-03-16 12:06:14','2024-08-18 22:28:15','The Internet powers virtually every aspect of the modern economy, you can transform your Internet connection into a passive income stream by merely sharing your Internet connection','how to make money online, ways to make maney online, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL),
(36,'published',NULL,'xet','Mysterium node backup & restore',NULL,'Backup & restore your mysterium node on windows and linux','/blog/mysterium-node-backup-and-restore/asset/img/mysterium-node-backup-and-restore.webp','/blog/mysterium-node-backup-and-restore',NULL,'2024-03-01 12:06:14','2024-08-18 22:28:15','The Internet powers virtually every aspect of the modern economy, you can transform your Internet connection into a passive income stream by merely sharing your Internet connection','how to make money online, ways to make maney online, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL),
(37,'published',NULL,'xet','Landscaping website cost guide',NULL,'The Internet powers virtually every aspect of the modern economy, transform your Internet connection into a passive income stream by merely sharing your Internet connection','https://static.wixstatic.com/media/4a5235_0c43c4a10f21440db61c8a99eeb102aa~mv2.jpg/v1/fill/w_740,h_488,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/4a5235_0c43c4a10f21440db61c8a99eeb102aa~mv2.jpg','/blog/passive-income-by-sharing-internet',NULL,'2024-03-17 12:06:14','2024-08-18 22:28:15','The Internet powers virtually every aspect of the modern economy, you can transform your Internet connection into a passive income stream by merely sharing your Internet connection','how to make money online, ways to make maney online, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL),
(38,'published',NULL,'xet','Rental property marketing to land more tenants. There goes',NULL,'The Internet powers virtually every aspect of the modern economy, transform your Internet connection into a passive income stream by merely sharing your Internet connection','https://static.wixstatic.com/media/c50e9e_1aca593a4e2942af9e21dea91269d1b0~mv2.jpg/v1/fill/w_740,h_403,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/c50e9e_1aca593a4e2942af9e21dea91269d1b0~mv2.jpg','/blog/passive-income-by-sharing-internet',NULL,'2024-03-01 12:06:14','2024-08-18 22:28:15','The Internet powers virtually every aspect of the modern economy, you can transform your Internet connection into a passive income stream by merely sharing your Internet connection','how to make money online, ways to make maney online, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL),
(39,'published',NULL,'xet','How to create a defensible eCommerce business plan',NULL,'The Internet powers virtually every aspect of the modern economy, transform your Internet connection into a passive income stream by merely sharing your Internet connection','https://static.wixstatic.com/media/a77aa0_22823f1c03d44ced82ddc59885b8695f~mv2.jpg/v1/fill/w_740,h_423,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/a77aa0_22823f1c03d44ced82ddc59885b8695f~mv2.jpg','/blog/passive-income-by-sharing-internet',NULL,'2024-03-01 12:06:14','2024-08-18 22:28:15','The Internet powers virtually every aspect of the modern economy, you can transform your Internet connection into a passive income stream by merely sharing your Internet connection','how to make money online, ways to make maney online, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad',NULL,NULL);
/*!40000 ALTER TABLE `Blogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Users` (
  `userId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `name_l` varchar(80) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `pass` varchar(255) NOT NULL,
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
  PRIMARY KEY (`userId`),
  UNIQUE KEY `uid` (`uid`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES
(1,'xet','Rishikesh','Prasad','rishikeshprasad@xetindustries.com',1,'$2y$10$G138k//BXVCnNzu/.Ke/YOKHVwn2YfxAGL7iRSDRv/JFc6.Rtaxcq','user','2024-07-27 04:05:01','2024-09-07 18:55:04',NULL,'active','/asset/img/profile/xet.webp',NULL,NULL,NULL,NULL),
(2,'zet','Zet','Ohio','zet@g.com',0,'$2y$10$G138k//BXVCnNzu/.Ke/YOKHVwn2YfxAGL7iRSDRv/JFc6.Rtaxcq','user','2024-07-27 04:13:44','2024-09-07 19:23:16',NULL,'active','/asset/img/profile/zet.jpg',NULL,NULL,NULL,NULL),
(3,'t1','t1',NULL,'t1@g.com',0,'$2y$10$G138k//BXVCnNzu/.Ke/YOKHVwn2YfxAGL7iRSDRv/JFc6.Rtaxcq','user','2024-07-27 04:13:44','2024-07-27 04:13:44',NULL,'active','/asset/img/profile/zet.jpg',NULL,NULL,NULL,NULL),
(4,'cristine','Cristine','Lepcha','cr@g.com',0,'$2y$10$G138k//BXVCnNzu/.Ke/YOKHVwn2YfxAGL7iRSDRv/JFc6.Rtaxcq','user','2024-07-27 04:13:44','2024-08-24 19:39:37',NULL,'active','/asset/img/profile/cristine.jpg',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- Dump completed on 2024-09-17  0:12:19
