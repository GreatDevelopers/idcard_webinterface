-- MySQL dump 10.17  Distrib 10.3.18-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: idcard_system
-- ------------------------------------------------------
-- Server version	10.3.18-MariaDB-1

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
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identifier of student',
  `fname` varchar(255) NOT NULL COMMENT 'first name',
  `lname` varchar(255) NOT NULL COMMENT 'last name',
  `collegeRollNumber` int(16) NOT NULL COMMENT 'college roll number',
  `uniRollNumber` int(16) NOT NULL COMMENT 'university roll number',
  `address` varchar(512) DEFAULT NULL COMMENT 'address of student',
  `mobileNo` int(10) DEFAULT NULL COMMENT 'mobile number of student',
  `admissionDate` date DEFAULT NULL COMMENT 'admission date of student',
  `leavingDate` date DEFAULT NULL COMMENT 'purposed leaving date of student',
  `qrUrl` varchar(255) DEFAULT NULL COMMENT 'Url for QR code of information of student',
  `branch` varchar(255) NOT NULL COMMENT 'branch of student',
  `email` varchar(255) DEFAULT NULL COMMENT 'email of student',
  `image` longtext DEFAULT NULL COMMENT 'path to image',
  `gender` varchar(6) NOT NULL,
  `dob` date NOT NULL,
  `dayScholar` tinyint(1) DEFAULT 1,
  `fatherName` varchar(255) NOT NULL,
  `allowed` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,'shiv','sharma',1715074,1706512,'ludhiana',1234567890,'2019-10-09','2019-11-18','http://localhost/idcard_webinterface/index.php?crn=1715074','CSE','shivcharanmt@gmail.com','example.png','Male','2000-09-01',1,'Father Name',1);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier of the user',
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'First name',
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Last name',
  `login` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Identfier used to login (can be an email address)',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Email address',
  `password` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Password encrypted with BCRYPT or a similar method',
  `role` int(11) DEFAULT NULL COMMENT 'Role of the employee (binary mask). See table roles.',
  `country` int(11) DEFAULT NULL COMMENT 'Country code (for later use)',
  `Department` int(11) DEFAULT 0 COMMENT 'Entity where the employee has a position',
  `position` int(11) DEFAULT NULL COMMENT 'Position of the employee',
  `datehired` date DEFAULT NULL COMMENT 'Date hired / Started',
  `identifier` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Internal/company identifier',
  `language` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en' COMMENT 'Language ISO code',
  `ldap_path` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'LDAP Path for complex authentication schemes',
  `active` tinyint(1) DEFAULT 1 COMMENT 'Is user active',
  `random_hash` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Obfuscate public URLs',
  `user_properties` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Entity ID (eg. user id) to which the parameter is applied',
  `picture` blob DEFAULT NULL COMMENT 'Profile picture of user for tabular calendar',
  `sid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `organization` (`Department`),
  KEY `position` (`position`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='List of employees / users having access to Jorani';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Benjamin','BALET','bbalet','benjamin.balet@gmail.com','bbalet',8,NULL,0,1,'2013-10-28','PNC0025','en',NULL,1,NULL,NULL,NULL,NULL),(2,'shiv','sharma','shiv','shivcharanmt@gmail.com','shiv',NULL,NULL,0,NULL,NULL,'','en',NULL,1,NULL,NULL,NULL,'1dea037d1b8f846c65aa0efed77c43a6f21eedfd');
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

-- Dump completed on 2019-10-31  8:57:21
