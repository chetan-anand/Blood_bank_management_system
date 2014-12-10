CREATE DATABASE  IF NOT EXISTS `bloodbank` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `bloodbank`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: localhost    Database: bloodbank
-- ------------------------------------------------------
-- Server version	5.6.15

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
-- Table structure for table `bloodrepo`
--

DROP TABLE IF EXISTS `bloodrepo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bloodrepo` (
  `blood_id` int(11) NOT NULL AUTO_INCREMENT,
  `blood_group` varchar(45) NOT NULL,
  `blood_amout` int(11) NOT NULL,
  `blood_price` int(11) NOT NULL DEFAULT '100',
  PRIMARY KEY (`blood_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bloodrepo`
--

LOCK TABLES `bloodrepo` WRITE;
/*!40000 ALTER TABLE `bloodrepo` DISABLE KEYS */;
/*!40000 ALTER TABLE `bloodrepo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bloodrequest`
--

DROP TABLE IF EXISTS `bloodrequest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bloodrequest` (
  `req_id` int(11) NOT NULL AUTO_INCREMENT,
  `req_name` varchar(45) NOT NULL,
  `req_phone` bigint(20) NOT NULL,
  `req_email` varchar(45) DEFAULT NULL,
  `req_address` varchar(45) NOT NULL,
  `req_area` varchar(45) NOT NULL,
  `req_hospital` varchar(45) NOT NULL,
  `req_confirm` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `req_amount` varchar(45) NOT NULL,
  `req_blood_group` varchar(45) NOT NULL,
  PRIMARY KEY (`req_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bloodrequest`
--

LOCK TABLES `bloodrequest` WRITE;
/*!40000 ALTER TABLE `bloodrequest` DISABLE KEYS */;
/*!40000 ALTER TABLE `bloodrequest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `br_don_rel`
--

DROP TABLE IF EXISTS `br_don_rel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `br_don_rel` (
  `br_id` int(11) DEFAULT NULL,
  `d_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`d_id`),
  KEY `fk_3` (`br_id`),
  CONSTRAINT `fk_3` FOREIGN KEY (`br_id`) REFERENCES `branch` (`br_id`) ON DELETE CASCADE,
  CONSTRAINT `fk_4` FOREIGN KEY (`d_id`) REFERENCES `donor` (`d_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `br_don_rel`
--

LOCK TABLES `br_don_rel` WRITE;
/*!40000 ALTER TABLE `br_don_rel` DISABLE KEYS */;
/*!40000 ALTER TABLE `br_don_rel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `br_emp_rel`
--

DROP TABLE IF EXISTS `br_emp_rel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `br_emp_rel` (
  `br_id` int(11) DEFAULT NULL,
  `emp_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`emp_id`),
  KEY `fk_1` (`br_id`),
  CONSTRAINT `fk_1` FOREIGN KEY (`br_id`) REFERENCES `branch` (`br_id`) ON DELETE CASCADE,
  CONSTRAINT `fk_2` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `br_emp_rel`
--

LOCK TABLES `br_emp_rel` WRITE;
/*!40000 ALTER TABLE `br_emp_rel` DISABLE KEYS */;
/*!40000 ALTER TABLE `br_emp_rel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `br_req_rel`
--

DROP TABLE IF EXISTS `br_req_rel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `br_req_rel` (
  `br_id` int(11) DEFAULT NULL,
  `req_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`req_id`),
  KEY `fk_7` (`br_id`),
  CONSTRAINT `fk_7` FOREIGN KEY (`br_id`) REFERENCES `branch` (`br_id`) ON DELETE CASCADE,
  CONSTRAINT `fk_8` FOREIGN KEY (`req_id`) REFERENCES `bloodrequest` (`req_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `br_req_rel`
--

LOCK TABLES `br_req_rel` WRITE;
/*!40000 ALTER TABLE `br_req_rel` DISABLE KEYS */;
/*!40000 ALTER TABLE `br_req_rel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `branch`
--

DROP TABLE IF EXISTS `branch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `branch` (
  `br_id` int(11) NOT NULL AUTO_INCREMENT,
  `br_name` varchar(45) NOT NULL,
  `br_address` varchar(45) NOT NULL,
  `br_phone` bigint(20) NOT NULL,
  `br_email` varchar(45) DEFAULT NULL,
  `br_area` varchar(45) NOT NULL,
  PRIMARY KEY (`br_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branch`
--

LOCK TABLES `branch` WRITE;
/*!40000 ALTER TABLE `branch` DISABLE KEYS */;
/*!40000 ALTER TABLE `branch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `branch_v`
--

DROP TABLE IF EXISTS `branch_v`;
/*!50001 DROP VIEW IF EXISTS `branch_v`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `branch_v` (
  `br_id` tinyint NOT NULL,
  `br_name` tinyint NOT NULL,
  `br_address` tinyint NOT NULL,
  `br_phone` tinyint NOT NULL,
  `br_email` tinyint NOT NULL,
  `br_area` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `don_repo_rel`
--

DROP TABLE IF EXISTS `don_repo_rel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `don_repo_rel` (
  `d_id` int(11) DEFAULT NULL,
  `blood_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`blood_id`),
  KEY `fk_5` (`d_id`),
  CONSTRAINT `fk_5` FOREIGN KEY (`d_id`) REFERENCES `donor` (`d_id`) ON DELETE CASCADE,
  CONSTRAINT `fk_6` FOREIGN KEY (`blood_id`) REFERENCES `bloodrepo` (`blood_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `don_repo_rel`
--

LOCK TABLES `don_repo_rel` WRITE;
/*!40000 ALTER TABLE `don_repo_rel` DISABLE KEYS */;
/*!40000 ALTER TABLE `don_repo_rel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `donbank_v`
--

DROP TABLE IF EXISTS `donbank_v`;
/*!50001 DROP VIEW IF EXISTS `donbank_v`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `donbank_v` (
  `blood_id` tinyint NOT NULL,
  `blood_group` tinyint NOT NULL,
  `blood_amout` tinyint NOT NULL,
  `blood_price` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `donor`
--

DROP TABLE IF EXISTS `donor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `donor` (
  `d_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_name` varchar(45) NOT NULL,
  `d_address` varchar(45) NOT NULL,
  `d_area` varchar(45) NOT NULL,
  `d_blood_group` varchar(45) NOT NULL,
  `d_nationality` varchar(45) NOT NULL DEFAULT 'INDIAN',
  `d_email` varchar(45) DEFAULT NULL,
  `d_phone` bigint(20) NOT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donor`
--

LOCK TABLES `donor` WRITE;
/*!40000 ALTER TABLE `donor` DISABLE KEYS */;
/*!40000 ALTER TABLE `donor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_role` varchar(45) NOT NULL,
  `emp_salary` int(11) NOT NULL DEFAULT '1500',
  `emp_phone` bigint(20) DEFAULT NULL,
  `emp_email` varchar(45) DEFAULT NULL,
  `emp_address` varchar(45) NOT NULL,
  `emp_name` varchar(45) NOT NULL,
  `emp_area` varchar(45) NOT NULL,
  `emp_sex` varchar(45) NOT NULL,
  `emp_status` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `employee_v`
--

DROP TABLE IF EXISTS `employee_v`;
/*!50001 DROP VIEW IF EXISTS `employee_v`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `employee_v` (
  `emp_id` tinyint NOT NULL,
  `emp_role` tinyint NOT NULL,
  `emp_salary` tinyint NOT NULL,
  `emp_phone` tinyint NOT NULL,
  `emp_email` tinyint NOT NULL,
  `emp_address` tinyint NOT NULL,
  `emp_name` tinyint NOT NULL,
  `emp_area` tinyint NOT NULL,
  `emp_sex` tinyint NOT NULL,
  `emp_status` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `user` varchar(45) NOT NULL,
  `password` blob NOT NULL,
  `type` varchar(45) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_UNIQUE` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `req_v`
--

DROP TABLE IF EXISTS `req_v`;
/*!50001 DROP VIEW IF EXISTS `req_v`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `req_v` (
  `req_id` tinyint NOT NULL,
  `req_name` tinyint NOT NULL,
  `req_phone` tinyint NOT NULL,
  `req_email` tinyint NOT NULL,
  `req_address` tinyint NOT NULL,
  `req_area` tinyint NOT NULL,
  `req_hospital` tinyint NOT NULL,
  `req_confirm` tinyint NOT NULL,
  `req_amount` tinyint NOT NULL,
  `req_blood_group` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `branch_v`
--

/*!50001 DROP TABLE IF EXISTS `branch_v`*/;
/*!50001 DROP VIEW IF EXISTS `branch_v`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `branch_v` AS select `branch`.`br_id` AS `br_id`,`branch`.`br_name` AS `br_name`,`branch`.`br_address` AS `br_address`,`branch`.`br_phone` AS `br_phone`,`branch`.`br_email` AS `br_email`,`branch`.`br_area` AS `br_area` from `branch` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `donbank_v`
--

/*!50001 DROP TABLE IF EXISTS `donbank_v`*/;
/*!50001 DROP VIEW IF EXISTS `donbank_v`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `donbank_v` AS select `bloodrepo`.`blood_id` AS `blood_id`,`bloodrepo`.`blood_group` AS `blood_group`,`bloodrepo`.`blood_amout` AS `blood_amout`,`bloodrepo`.`blood_price` AS `blood_price` from `bloodrepo` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `employee_v`
--

/*!50001 DROP TABLE IF EXISTS `employee_v`*/;
/*!50001 DROP VIEW IF EXISTS `employee_v`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `employee_v` AS select `employee`.`emp_id` AS `emp_id`,`employee`.`emp_role` AS `emp_role`,`employee`.`emp_salary` AS `emp_salary`,`employee`.`emp_phone` AS `emp_phone`,`employee`.`emp_email` AS `emp_email`,`employee`.`emp_address` AS `emp_address`,`employee`.`emp_name` AS `emp_name`,`employee`.`emp_area` AS `emp_area`,`employee`.`emp_sex` AS `emp_sex`,`employee`.`emp_status` AS `emp_status` from `employee` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `req_v`
--

/*!50001 DROP TABLE IF EXISTS `req_v`*/;
/*!50001 DROP VIEW IF EXISTS `req_v`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `req_v` AS select `bloodrequest`.`req_id` AS `req_id`,`bloodrequest`.`req_name` AS `req_name`,`bloodrequest`.`req_phone` AS `req_phone`,`bloodrequest`.`req_email` AS `req_email`,`bloodrequest`.`req_address` AS `req_address`,`bloodrequest`.`req_area` AS `req_area`,`bloodrequest`.`req_hospital` AS `req_hospital`,`bloodrequest`.`req_confirm` AS `req_confirm`,`bloodrequest`.`req_amount` AS `req_amount`,`bloodrequest`.`req_blood_group` AS `req_blood_group` from `bloodrequest` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-04-07 19:33:55
