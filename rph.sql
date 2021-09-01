-- MySQL dump 10.13  Distrib 5.7.19, for Linux (x86_64)
--
-- Host: localhost    Database: rph
-- ------------------------------------------------------
-- Server version	5.7.19-0ubuntu0.16.04.1

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
-- Table structure for table `cattles`
--

DROP TABLE IF EXISTS `cattles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cattles` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cattletype` smallint(6) DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `arrivaldate` datetime DEFAULT NULL,
  `arrivalweight` decimal(14,2) DEFAULT NULL,
  `vendor` smallint(6) DEFAULT NULL,
  `officer` smallint(6) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cattles`
--

LOCK TABLES `cattles` WRITE;
/*!40000 ALTER TABLE `cattles` DISABLE KEYS */;
/*!40000 ALTER TABLE `cattles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `distribution`
--

DROP TABLE IF EXISTS `distribution`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `distribution` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `package_id` bigint(20) DEFAULT NULL,
  `storage_id` int(11) DEFAULT NULL,
  `officer` smallint(6) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `distribution`
--

LOCK TABLES `distribution` WRITE;
/*!40000 ALTER TABLE `distribution` DISABLE KEYS */;
/*!40000 ALTER TABLE `distribution` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `packaging`
--

DROP TABLE IF EXISTS `packaging`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `packaging` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cattle_id` bigint(20) DEFAULT NULL,
  `packagingdate` datetime DEFAULT NULL,
  `officer` smallint(6) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `packaging`
--

LOCK TABLES `packaging` WRITE;
/*!40000 ALTER TABLE `packaging` DISABLE KEYS */;
/*!40000 ALTER TABLE `packaging` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `postslaughter`
--

DROP TABLE IF EXISTS `postslaughter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `postslaughter` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cattle_id` bigint(20) DEFAULT NULL,
  `slaughterdate` datetime DEFAULT NULL,
  `weight` decimal(14,2) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postslaughter`
--

LOCK TABLES `postslaughter` WRITE;
/*!40000 ALTER TABLE `postslaughter` DISABLE KEYS */;
/*!40000 ALTER TABLE `postslaughter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preslaughter`
--

DROP TABLE IF EXISTS `preslaughter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `preslaughter` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cattle_id` bigint(20) DEFAULT NULL,
  `slaughterdate` datetime DEFAULT NULL,
  `weight` decimal(14,2) DEFAULT NULL,
  `weightofficer` smallint(6) DEFAULT NULL,
  `slaughterer` smallint(6) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preslaughter`
--

LOCK TABLES `preslaughter` WRITE;
/*!40000 ALTER TABLE `preslaughter` DISABLE KEYS */;
/*!40000 ALTER TABLE `preslaughter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preslaughter_slaughterers`
--

DROP TABLE IF EXISTS `preslaughter_slaughterers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `preslaughter_slaughterers` (
  `preslaughter_id` bigint(20) DEFAULT NULL,
  `slaughterer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preslaughter_slaughterers`
--

LOCK TABLES `preslaughter_slaughterers` WRITE;
/*!40000 ALTER TABLE `preslaughter_slaughterers` DISABLE KEYS */;
/*!40000 ALTER TABLE `preslaughter_slaughterers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preslaughter_weightofficers`
--

DROP TABLE IF EXISTS `preslaughter_weightofficers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `preslaughter_weightofficers` (
  `preslaughter_id` bigint(20) DEFAULT NULL,
  `weightofficer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preslaughter_weightofficers`
--

LOCK TABLES `preslaughter_weightofficers` WRITE;
/*!40000 ALTER TABLE `preslaughter_weightofficers` DISABLE KEYS */;
/*!40000 ALTER TABLE `preslaughter_weightofficers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staffs`
--

DROP TABLE IF EXISTS `staffs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staffs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staffs`
--

LOCK TABLES `staffs` WRITE;
/*!40000 ALTER TABLE `staffs` DISABLE KEYS */;
/*!40000 ALTER TABLE `staffs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-02-27  7:44:48
