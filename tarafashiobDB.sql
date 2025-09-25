-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: localhost    Database: tharafashion
-- ------------------------------------------------------
-- Server version	8.0.29

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

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `email` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `verification_code` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES ('duleeshasavindi@gmail.com','Savindini','Duleesha','63f5c1bd692ff');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_img`
--

DROP TABLE IF EXISTS `admin_img`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_img` (
  `path` varchar(50) NOT NULL,
  `admin_email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`path`),
  KEY `admin_email` (`admin_email`),
  CONSTRAINT `admin_email` FOREIGN KEY (`admin_email`) REFERENCES `admin` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_img`
--

LOCK TABLES `admin_img` WRITE;
/*!40000 ALTER TABLE `admin_img` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_img` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_email` varchar(100) NOT NULL,
  `product_id` int NOT NULL,
  `qty` int DEFAULT NULL,
  `check` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cart_user1_idx` (`user_email`),
  KEY `fk_cart_product1_idx` (`product_id`),
  CONSTRAINT `fk_cart_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_cart_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES (58,'duleeshasavindi@gmail.com',15,1,1),(59,'duleeshasavindi@gmail.com',16,1,0),(110,'sakuni@gmail.com',19,1,1),(119,'hiru@gmail.com',15,4,1),(120,'hiru@gmail.com',14,1,1);
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart_invoice`
--

DROP TABLE IF EXISTS `cart_invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart_invoice` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int DEFAULT NULL,
  `order_id` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8_general_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `shipping_price` double DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `cart_id` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`cart_id`),
  KEY `fk_cart_invoice_cart1_idx` (`cart_id`),
  KEY `fk_cart_invoice_user1_idx` (`user_email`),
  KEY `fk_cart_invoice_product1_idx` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart_invoice`
--

LOCK TABLES `cart_invoice` WRITE;
/*!40000 ALTER TABLE `cart_invoice` DISABLE KEYS */;
INSERT INTO `cart_invoice` VALUES (14,16,'63dbcde35e051',2590,300,1,83,'hiru@gmail.com','2023-02-02 20:21:45'),(15,11,'63dbcde35e051',2300,300,1,84,'hiru@gmail.com','2023-02-02 20:21:45'),(16,5,'63dbcde35e051',2100,300,1,85,'hiru@gmail.com','2023-02-02 20:21:45'),(17,14,'63dbcde35e051',2090,300,1,86,'hiru@gmail.com','2023-02-02 20:25:10'),(18,16,'63dd6a27e00a4',2590,300,1,87,'hiru@gmail.com','2023-02-04 01:40:43'),(19,5,'63dd6a27e00a4',2100,300,1,88,'hiru@gmail.com','2023-02-04 01:40:43'),(20,15,'63dd6abeb0431',3900,300,1,89,'hiru@gmail.com','2023-02-04 01:43:10'),(21,1,'63dd6abeb0431',1500,300,1,90,'hiru@gmail.com','2023-02-04 01:43:10'),(22,15,'63dd6b597f332',3900,300,1,91,'hiru@gmail.com','2023-02-04 01:45:54'),(23,5,'63dd6b597f332',2100,300,1,92,'hiru@gmail.com','2023-02-04 01:45:54'),(27,15,'63e4bbbce0315',3900,300,3,99,'hiru@gmail.com','2023-02-09 14:54:45'),(28,15,'63e61c87442dc',3900,300,1,100,'hiru@gmail.com','2023-02-10 15:59:47'),(29,5,'63e61c87442dc',2100,300,1,101,'hiru@gmail.com','2023-02-10 15:59:47');
/*!40000 ALTER TABLE `cart_invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `coleection_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_category_coleection1_idx` (`coleection_id`),
  CONSTRAINT `fk_category_coleection1` FOREIGN KEY (`coleection_id`) REFERENCES `coleection` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Frocks',1),(2,'Tops',1),(3,'Pants',1),(4,'Skirts',1),(5,'T-shirts',2),(6,'Trousers & Pants',2),(7,'Shirts',2);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `content` text CHARACTER SET utf8mb3 COLLATE utf8_general_ci,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `status` int DEFAULT NULL,
  `admin_email` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `type` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_chat_user1_idx` (`user_email`),
  KEY `fk_chat_admin1_idx` (`admin_email`),
  CONSTRAINT `fk_chat_admin1` FOREIGN KEY (`admin_email`) REFERENCES `admin` (`email`),
  CONSTRAINT `fk_chat_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat`
--

LOCK TABLES `chat` WRITE;
/*!40000 ALTER TABLE `chat` DISABLE KEYS */;
INSERT INTO `chat` VALUES (44,'hi','2023-01-26','10:23:39',2,'duleeshasavindi@gmail.com','hiru@gmail.com',0),(45,'hi','2023-01-26','10:24:13',1,'duleeshasavindi@gmail.com','hiru@gmail.com',0),(46,'hi','2023-01-26','10:24:29',2,'duleeshasavindi@gmail.com','hiru@gmail.com',0),(47,'hi','2023-01-26','10:24:46',1,'duleeshasavindi@gmail.com','hiru@gmail.com',0),(48,'     hi','2023-01-26','10:46:55',1,'duleeshasavindi@gmail.com','hiru@gmail.com',0),(49,'hii','2023-02-04','22:09:51',2,'duleeshasavindi@gmail.com','hiru@gmail.com',0),(50,'hi','2023-02-04','22:10:14',1,'duleeshasavindi@gmail.com','hiru@gmail.com',0),(51,'hi','2023-02-09','15:59:12',1,'duleeshasavindi@gmail.com','hiru@gmail.com',0),(52,'hi','2023-02-09','15:59:40',1,'duleeshasavindi@gmail.com','hiru@gmail.com',0),(53,'hi','2023-02-09','16:00:01',2,'duleeshasavindi@gmail.com','hiru@gmail.com',0),(54,'ok','2023-02-09','16:00:46',2,'duleeshasavindi@gmail.com','hiru@gmail.com',0),(55,'hi','2023-02-09','16:02:57',2,'duleeshasavindi@gmail.com','hiru@gmail.com',0),(56,'jhh','2023-02-09','16:03:12',1,'duleeshasavindi@gmail.com','hiru@gmail.com',0),(57,'hi','2023-02-10','00:20:49',1,'duleeshasavindi@gmail.com','hiru@gmail.com',0),(58,'hi','2023-02-10','00:21:43',1,'duleeshasavindi@gmail.com','hiru@gmail.com',0),(59,'hi','2023-02-10','00:22:06',1,'duleeshasavindi@gmail.com','hiru@gmail.com',0),(60,'hi','2023-02-10','00:23:19',1,'duleeshasavindi@gmail.com','hiru@gmail.com',0),(61,'hi','2023-02-10','00:23:46',1,'duleeshasavindi@gmail.com','hiru@gmail.com',0),(62,'hi','2023-02-10','00:26:08',1,'duleeshasavindi@gmail.com','hiru@gmail.com',0),(63,'hi','2023-02-10','00:31:11',1,'duleeshasavindi@gmail.com','hiru@gmail.com',0),(64,'hi','2023-02-10','00:32:32',1,'duleeshasavindi@gmail.com','hiru@gmail.com',0),(65,'hi','2023-02-10','00:34:23',1,'duleeshasavindi@gmail.com','hiru@gmail.com',0),(66,'hi','2023-02-10','12:36:01',1,'duleeshasavindi@gmail.com','hiru@gmail.com',0),(67,'hi','2023-02-10','12:38:52',1,'duleeshasavindi@gmail.com','hiru@gmail.com',0),(68,'GG','2023-02-10','12:40:29',1,'duleeshasavindi@gmail.com','hiru@gmail.com',0),(69,'D','2023-02-10','12:42:38',1,'duleeshasavindi@gmail.com','hiru@gmail.com',0),(70,'hi','2023-02-10','13:08:32',1,'duleeshasavindi@gmail.com','hiru@gmail.com',0),(71,'hi','2023-02-10','13:13:30',1,'duleeshasavindi@gmail.com','hiru@gmail.com',0);
/*!40000 ALTER TABLE `chat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `city` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `district_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_city_district1_idx` (`district_id`),
  CONSTRAINT `fk_city_district1` FOREIGN KEY (`district_id`) REFERENCES `district` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` VALUES (1,'Malabe',1),(2,'Minuwangoda',2),(3,'Pilimatalawa',3),(4,'Borella',1),(5,'Moratuwa',1),(6,'Mount Lavinia',1),(7,'Awissawella',1),(8,'Ja-Ela',2),(9,'Katunayaka',2),(10,'Negombo',2),(11,'Dewlapitiya',2),(12,'Mathugama',6),(13,'Beruwala',6);
/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coleection`
--

DROP TABLE IF EXISTS `coleection`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coleection` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coleection`
--

LOCK TABLES `coleection` WRITE;
/*!40000 ALTER TABLE `coleection` DISABLE KEYS */;
INSERT INTO `coleection` VALUES (1,'Women\'s Collection'),(2,'Men\'s Collection');
/*!40000 ALTER TABLE `coleection` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `collection_img`
--

DROP TABLE IF EXISTS `collection_img`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `collection_img` (
  `path` varchar(100) NOT NULL,
  `coleection_id` int NOT NULL,
  PRIMARY KEY (`path`),
  KEY `fk_collection_img_coleection1_idx` (`coleection_id`),
  CONSTRAINT `fk_collection_img_coleection1` FOREIGN KEY (`coleection_id`) REFERENCES `coleection` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `collection_img`
--

LOCK TABLES `collection_img` WRITE;
/*!40000 ALTER TABLE `collection_img` DISABLE KEYS */;
INSERT INTO `collection_img` VALUES ('resources//collection_img//women_c.jpg',1),('resources//collection_img//men_c.jpg',2);
/*!40000 ALTER TABLE `collection_img` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `color`
--

DROP TABLE IF EXISTS `color`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `color` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `color`
--

LOCK TABLES `color` WRITE;
/*!40000 ALTER TABLE `color` DISABLE KEYS */;
INSERT INTO `color` VALUES (1,'Black'),(2,'White'),(3,'Red'),(4,'Blue'),(5,'Yellow'),(6,'Green'),(7,'Multicolor'),(8,'Denim Blue'),(9,'Light Blue');
/*!40000 ALTER TABLE `color` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `district`
--

DROP TABLE IF EXISTS `district`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `district` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `province_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_district_province1_idx` (`province_id`),
  CONSTRAINT `fk_district_province1` FOREIGN KEY (`province_id`) REFERENCES `province` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `district`
--

LOCK TABLES `district` WRITE;
/*!40000 ALTER TABLE `district` DISABLE KEYS */;
INSERT INTO `district` VALUES (1,'Colombo',1),(2,'Gampaha',1),(3,'Kandy',2),(4,'Mathale',2),(5,'Nuwara Eliya',2),(6,'Kaluthara',1),(7,'Jaffna',3),(8,'Kilinochchi',3),(9,'Mullaitivu',3),(10,'Mannar',3),(11,'Vavuniya',3),(12,'Anuradhapura',4),(13,'Polonnaruwa',4),(14,'Trincomalee',5),(15,'Batticaloa',5),(16,'Ampara',5),(17,'Puttalam',6),(18,'Kurunegala',6),(19,'Badulla',7),(20,'Monaragala',7),(21,'Kegalle',8),(22,'Rathnapura',8),(23,'Galle',9),(24,'Matara',9),(25,'Hambanthota',9);
/*!40000 ALTER TABLE `district` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feedback` (
  `id` int NOT NULL AUTO_INCREMENT,
  `feedback` text,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `product_id` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_feedback_product1_idx` (`product_id`),
  KEY `fk_feedback_user1_idx` (`user_email`),
  CONSTRAINT `fk_feedback_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_feedback_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
INSERT INTO `feedback` VALUES (1,'Its so beautiful . ','2022-12-03','00:55:31',12,'duleeshasavindi@gmail.com',0),(2,'This is my very first order through site, and I am totally and completely satisfied! The fit is great and so are the prices. I will definitely return again and again...','2022-12-03','00:55:40',5,'duleeshasavindi@gmail.com',1),(3,'I love this dress. It is so pretty and stylish with shorts and jeans. I have not washed it yet so I am not sure how it is going to hold up but for now, I am super happy!','2022-12-03','00:55:52',1,'duleeshasavindi@gmail.com',0),(4,'The best! Found me the perfect dress and such lovely service and attention. Not stuffy or overbearing and listen to what you want.','2022-12-03','00:57:43',12,'duleeshasavindi@gmail.com',0),(5,'Its so beautiful ','2022-12-03','00:58:54',17,'duleeshasavindi@gmail.com',0),(6,'woww','2022-12-03','01:18:00',17,'duleeshasavindi@gmail.com',0),(7,'supper product','2022-12-06','17:10:44',1,'hiru@gmail.com',0),(8,'nice frock','2023-01-03','19:23:59',1,'hiru@gmail.com',0),(9,'wow nice dress ','2023-01-14','17:07:42',1,'hiru@gmail.com',0),(10,'wow nice dress','2023-01-18','12:19:05',5,'hiru@gmail.com',0);
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback_img`
--

DROP TABLE IF EXISTS `feedback_img`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feedback_img` (
  `path` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `feedback_id` int NOT NULL,
  PRIMARY KEY (`path`),
  KEY `fk_feedback_img_feedback1_idx` (`feedback_id`),
  CONSTRAINT `fk_feedback_img_feedback1` FOREIGN KEY (`feedback_id`) REFERENCES `feedback` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback_img`
--

LOCK TABLES `feedback_img` WRITE;
/*!40000 ALTER TABLE `feedback_img` DISABLE KEYS */;
/*!40000 ALTER TABLE `feedback_img` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoice` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `total` double DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `user_email` varchar(100) NOT NULL,
  `type` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_invoice_product1_idx` (`product_id`),
  KEY `fk_invoice_user1_idx` (`user_email`),
  CONSTRAINT `fk_invoice_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice`
--

LOCK TABLES `invoice` WRITE;
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
INSERT INTO `invoice` VALUES (47,'63db72168f894','2022-01-02',1400,1,4,4,'hiru@gmail.com',1),(58,'63dbcde35e051','2023-02-02',7290,NULL,4,NULL,'hiru@gmail.com',2),(60,'63dd6a27e00a4','2023-02-04',4990,NULL,4,NULL,'hiru@gmail.com',2),(61,'63dd6abeb0431','2023-02-04',5700,NULL,4,NULL,'hiru@gmail.com',2),(62,'63dd6b597f332','2023-02-04',6300,NULL,4,NULL,'hiru@gmail.com',2),(63,'63dd6ba138805','2023-02-04',10200,1,5,2,'hiru@gmail.com',1),(65,'63e3d5be6254a','2023-02-08',1800,1,4,1,'hiru@gmail.com',1),(67,'63e3d61a48f4d','2023-01-08',11400,1,4,4,'hiru@gmail.com',1),(68,'63e3d64086fb1','2023-02-08',2600,1,4,11,'hiru@gmail.com',1),(71,'63e4add2f2d4d','2023-02-09',2390,1,4,14,'hiru@gmail.com',1),(72,'63e4bbbce0315','2023-02-09',12000,NULL,6,NULL,'hiru@gmail.com',2),(73,'63e61c3fb500e','2023-02-10',4200,1,6,15,'hiru@gmail.com',1),(74,'63e61c87442dc','2023-02-10',6300,NULL,6,NULL,'hiru@gmail.com',2);
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `material`
--

DROP TABLE IF EXISTS `material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `material` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material`
--

LOCK TABLES `material` WRITE;
/*!40000 ALTER TABLE `material` DISABLE KEYS */;
INSERT INTO `material` VALUES (1,'Cotton'),(2,'Linen'),(3,'Viscose'),(4,'Jersey'),(5,'Broadcloth'),(6,'Denim'),(7,'No Brand');
/*!40000 ALTER TABLE `material` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notification` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date_time` datetime DEFAULT NULL,
  `invoice_id` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  `user_email` varchar(100) NOT NULL,
  `usertype` int DEFAULT NULL,
  `seen` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_notification_invoice1_idx` (`invoice_id`),
  KEY `fk_notification_user1_idx` (`user_email`),
  CONSTRAINT `fk_notification_invoice1` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`id`),
  CONSTRAINT `fk_notification_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification`
--

LOCK TABLES `notification` WRITE;
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
INSERT INTO `notification` VALUES (100,'2023-02-09 13:47:54',62,0,'hiru@gmail.com',1,1),(101,'2023-02-09 13:48:22',63,0,'hiru@gmail.com',1,1),(102,'2023-02-09 13:48:34',63,1,'hiru@gmail.com',1,1),(103,'2023-02-09 13:48:42',63,2,'hiru@gmail.com',1,1),(104,'2023-02-09 13:57:09',71,0,'hiru@gmail.com',1,1),(105,'2023-02-09 13:57:31',71,1,'hiru@gmail.com',1,1),(107,'2023-02-09 13:57:46',71,2,'hiru@gmail.com',1,1),(108,'2023-02-09 14:55:03',72,0,'hiru@gmail.com',1,1),(109,'2023-02-09 14:55:03',72,1,'hiru@gmail.com',1,1),(110,'2023-02-09 14:55:04',72,2,'hiru@gmail.com',1,1),(138,'2023-02-10 13:08:32',NULL,6,'hiru@gmail.com',3,2),(139,'2023-02-10 13:13:30',NULL,6,'hiru@gmail.com',3,2),(140,'2023-02-17 15:34:01',71,1,'hiru@gmail.com',NULL,NULL),(141,'2023-02-17 15:34:06',73,0,'hiru@gmail.com',NULL,NULL),(142,'2023-02-17 15:47:23',74,0,'hiru@gmail.com',NULL,NULL),(143,'2023-02-17 16:54:46',71,2,'hiru@gmail.com',NULL,NULL),(144,'2023-02-22 16:56:27',71,4,'hiru@gmail.com',3,2);
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `coleection_id` int DEFAULT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `description` text,
  `datetime_added` datetime DEFAULT NULL,
  `delivery_fee_weston` double DEFAULT NULL,
  `delivery_fee_other` double DEFAULT NULL,
  `color_id` int DEFAULT NULL,
  `status_id` int DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `material_id` int DEFAULT NULL,
  `trend_id` int DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `size_id` int DEFAULT NULL,
  `admin_email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `color_id` (`color_id`),
  KEY `status_id` (`status_id`),
  KEY `fk_product_user1_idx` (`user_email`),
  KEY `fk_product_material1_idx` (`material_id`),
  KEY `category_id` (`category_id`),
  KEY `coleection_id` (`coleection_id`),
  KEY `size_id` (`size_id`),
  KEY `fk_product_trent1_idx` (`trend_id`) USING BTREE,
  CONSTRAINT `category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `coleection_id` FOREIGN KEY (`coleection_id`) REFERENCES `coleection` (`id`),
  CONSTRAINT `color_id` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`),
  CONSTRAINT `fk_product_material1` FOREIGN KEY (`material_id`) REFERENCES `material` (`id`),
  CONSTRAINT `fk_product_trent1` FOREIGN KEY (`trend_id`) REFERENCES `trend` (`id`),
  CONSTRAINT `fk_product_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`),
  CONSTRAINT `size_id` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`),
  CONSTRAINT `status_id` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,1,'Western Smoked black frock ',1500,10,'Condition : New.\r\nLightweight & Perfect Fit\r\nEasy To Clean\r\nTrue to size\r\nAll-day comfort\r\nA Go-To Wardrobe Addition\r\nSuperior Quality Material\r\nFashionable Elegance\r\nConvenient and Practical\r\nPerfect for evenings & ocassions\r\nPremium Edition\r\nExclusive Outlook','2023-02-20 13:22:29',150,300,1,1,NULL,2,3,1,2,'duleeshasavindi@gmail.com'),(1,2,'V-neck   Flower Print frock ',1200,3,'Sizes :- S, M (all sizes are inches)For a Casual, Party Wear, Or Everyday LookFit Type :- regulerCirculer HemSmoking ConstructionPull Over','2022-11-20 15:42:14',150,300,6,1,NULL,2,2,1,2,'duleeshasavindi@gmail.com'),(1,4,'Crop top offsholder design',1100,19,'Sizes :- S, M (all sizes are inches)For a Casual, Party Wear, Or Everyday LookFit Type :- regulerCirculer HemSmoking ConstructionPull Over','2022-11-17 16:36:28',150,300,2,1,NULL,3,2,2,2,'duleeshasavindi@gmail.com'),(1,5,'Princess line new frock design',2100,12,'Condition : New.\r\nLightweight & Perfect Fit\r\nEasy To Clean\r\nTrue to size\r\nAll-day comfort\r\nA Go-To Wardrobe Addition\r\nSuperior Quality Material\r\nFashionable Elegance\r\nConvenient and Practical\r\nPerfect for evenings & ocassions\r\nPremium Edition\r\nExclusive Outlook','2022-11-17 20:16:50',150,300,3,1,NULL,3,2,1,3,'duleeshasavindi@gmail.com'),(1,11,'Off shoulder casual frock',2300,44,'Condition : New.\r\nLightweight & Perfect Fit\r\nEasy To Clean\r\nTrue to size\r\nAll-day comfort\r\nA Go-To Wardrobe Addition\r\nSuperior Quality Material\r\nFashionable Elegance\r\nConvenient and Practical\r\nPerfect for evenings & ocassions\r\nPremium Edition\r\nExclusive Outlook','2022-11-22 03:11:20',150,300,4,1,NULL,1,2,1,1,'duleeshasavindi@gmail.com'),(1,12,'Singrain maxi frock new ',2100,67,'Condition : New.\r\nLightweight & Perfect Fit\r\nEasy To Clean\r\nTrue to size\r\nAll-day comfort\r\nA Go-To Wardrobe Addition\r\nSuperior Quality Material\r\nFashionable Elegance\r\nConvenient and Practical\r\nPerfect for evenings & ocassions\r\nPremium Edition\r\nExclusive Outlook','2022-11-22 03:17:38',150,300,4,1,NULL,2,2,1,1,'duleeshasavindi@gmail.com'),(1,14,'Crossover new design frock',2090,23,'Condition : New.\r\nLightweight & Perfect Fit\r\nEasy To Clean\r\nTrue to size\r\nAll-day comfort\r\nA Go-To Wardrobe Addition\r\nSuperior Quality Material\r\nFashionable Elegance\r\nConvenient and Practical\r\nPerfect for evenings & ocassions\r\nPremium Edition\r\nExclusive Outlook','2023-02-20 03:30:43',150,300,7,1,NULL,4,2,1,2,'duleeshasavindi@gmail.com'),(1,15,'Shein tie shoulder floral dress',3900,5,'Condition : New.\r\nLightweight & Perfect Fit\r\nEasy To Clean\r\nTrue to size\r\nAll-day comfort\r\nA Go-To Wardrobe Addition\r\nSuperior Quality Material\r\nFashionable Elegance\r\nConvenient and Practical\r\nPerfect for evenings & ocassions\r\nPremium Edition\r\nExclusive Outlook','2023-02-19 20:46:29',150,300,7,1,NULL,3,2,1,2,NULL),(1,16,'Long sleeve orange frock ',2590,19,'Condition : New.\r\nLightweight & Perfect Fit\r\nEasy To Clean\r\nTrue to size\r\nAll-day comfort\r\nA Go-To Wardrobe Addition\r\nSuperior Quality Material\r\nFashionable Elegance\r\nConvenient and Practical\r\nPerfect for evenings & ocassions\r\nPremium Edition\r\nExclusive Outlook','2022-11-22 20:52:23',150,300,7,1,NULL,1,2,1,2,NULL),(1,17,'Ruffle trim top new design',1300,0,'Condition : New.\r\nLightweight & Perfect Fit\r\nEasy To Clean\r\nTrue to size\r\nAll-day comfort\r\nA Go-To Wardrobe Addition\r\nSuperior Quality Material\r\nFashionable Elegance\r\nConvenient and Practical\r\nPerfect for evenings & ocassions\r\nPremium Edition\r\nExclusive Outlook','2022-11-22 21:00:58',150,300,7,1,NULL,1,2,2,2,NULL),(1,18,'Criss Cross Backless Croptop',1990,30,'','2023-02-18 12:36:16',300,150,1,1,NULL,1,2,2,2,NULL),(1,19,'Crop top Frill Outfit',1400,20,'','2023-02-18 12:39:26',300,150,2,1,NULL,2,2,2,2,NULL),(1,20,'New ladies retro Croptop',1300,43,'','2023-02-18 12:40:41',300,150,6,1,NULL,7,2,2,2,NULL),(1,21,'Split Front Vissible Top',2100,21,'','2023-02-18 13:02:15',300,150,2,1,NULL,3,2,2,2,NULL),(1,22,'Denim Trouser Butterfly Lite',3200,33,'','2023-02-18 16:30:01',300,150,4,1,NULL,6,2,3,2,NULL),(1,23,'Skinny Fit Jean for Women',3500,22,'','2023-01-20 15:17:16',300,150,4,1,NULL,6,2,3,2,NULL),(1,24,'Light Blue ST Patch Denim',4500,2,'','2023-01-20 15:21:20',300,150,4,1,NULL,6,2,3,2,NULL),(1,26,'New Ladies denim trouser',3200,43,'','2023-01-20 15:36:28',300,150,8,1,NULL,6,2,3,2,NULL),(1,28,'Dark Blue Palazzo Pant',3000,32,'','2023-01-20 15:43:46',300,150,4,1,NULL,1,1,3,2,NULL),(1,29,'Womens Traveller Short Pant',1900,22,'','2023-01-20 15:53:44',300,150,2,1,NULL,2,2,3,2,NULL),(1,30,'Row Ham Denim Skirt',2010,9,'','2023-01-20 16:11:40',300,150,8,1,NULL,6,2,4,2,NULL),(1,31,'Floral Ruffled Midi Skirt',2800,18,'','2023-01-19 16:13:58',300,150,5,1,NULL,1,2,4,2,NULL),(1,32,'Satin Jacquard Red Skirt',3900,16,'','2023-01-11 16:16:12',300,150,3,1,NULL,7,2,4,2,NULL),(1,33,'Summer Button Down Skirt',1900,17,'','2023-02-10 16:18:50',300,150,6,1,NULL,2,2,4,2,NULL),(1,34,'Side Split Leopard Skirt',3900,17,'','2022-12-20 16:20:47',300,150,7,1,NULL,7,2,4,2,NULL);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_img`
--

DROP TABLE IF EXISTS `product_img`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_img` (
  `path` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `product_id` int DEFAULT NULL,
  PRIMARY KEY (`path`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_img`
--

LOCK TABLES `product_img` WRITE;
/*!40000 ALTER TABLE `product_img` DISABLE KEYS */;
INSERT INTO `product_img` VALUES ('resources//product_images//Western Smoked black frock _0_63ef65995dac3.jpeg',1),('resources//product_images//frock6.jpg',2),('resources//product_images//b1.jpg',4),('resources//product_images//Princess line new frock design_0_63d1fb0d146dd.jpeg',5),('resources//product_images//frock10.jpg',11),('resources//product_images//frock11.jpg',12),('resources//product_images//frock8.jpg',14),('resources//product_images//sk4.jpg',14),('resources//product_images//frock13.jpg',15),('resources//product_images//frock12.jpg',16),('resources//product_images//top1.webp',17),('resources//product_images//Criss Cross Backless Croptop_0_63f07e8198fd6.jpeg',18),('resources//product_images//Criss Cross Backless Croptop_1_63f07e819a0f0.jpeg',18),('resources//product_images//Crop top Frill Outfit_0_63f079a648efd.jpeg',19),('resources//product_images//New ladies retro Croptop_0_63f079f1adb8d.jpeg',20),('resources//product_images//Split Front Vissible Top_0_63f07eff3253e.jpeg',21),('resources//product_images//Denim Trouser Butterfly Lite_0_63f0b06851e16.jpeg',22),('resources//product_images//Skinny Fit Jean for Women_0_63f341a4a0a47.jpeg',23),('resources//product_images//Light Blue ST Patch Denim_0_63f344c7763ba.jpeg',24),('resources//product_images//New Ladies denim trouser_0_63f346249c359.jpeg',26),('resources//product_images//Dark Blue Palazzo Pant_0_63f347da2f933.jpeg',28),('resources//product_images//Womens Traveller Short Pant_0_63f34a302f64f.jpeg',29),('resources//product_images//Row Ham Denim Skirt_0_63f34e64a39d6.jpeg',30),('resources//product_images//Floral Ruffled Midi Skirt_0_63f34eeeb1e67.jpeg',31),('resources//product_images//Satin Jacquard Red Skirt_0_63f34f7490604.jpeg',32),('resources//product_images//Satin Jacquard Red Skirt_1_63f34f7491a15.jpeg',32),('resources//product_images//Summer Button Down Skirt_0_63f35012672e2.jpeg',33),('resources//product_images//Side Split Leopard Skirt_0_63f350f685313.jpeg',34);
/*!40000 ALTER TABLE `product_img` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profile_img`
--

DROP TABLE IF EXISTS `profile_img`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profile_img` (
  `path` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`path`),
  KEY `user_email` (`user_email`),
  CONSTRAINT `user_email` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile_img`
--

LOCK TABLES `profile_img` WRITE;
/*!40000 ALTER TABLE `profile_img` DISABLE KEYS */;
INSERT INTO `profile_img` VALUES ('profile_img/Savindi63789d718e10f.jpeg','duleeshasavindi@gmail.com'),('profile_img/Hirushima63a04a41f2ba4.jpeg','hiru@gmail.com');
/*!40000 ALTER TABLE `profile_img` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `province`
--

DROP TABLE IF EXISTS `province`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `province` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `province`
--

LOCK TABLES `province` WRITE;
/*!40000 ALTER TABLE `province` DISABLE KEYS */;
INSERT INTO `province` VALUES (1,'Weston'),(2,'Central'),(3,'Northern'),(4,'North Central'),(5,'Eastern'),(6,'North Weston'),(7,'Uva'),(8,'Sabaragamuwa'),(9,'Southern');
/*!40000 ALTER TABLE `province` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ratings`
--

DROP TABLE IF EXISTS `ratings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ratings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `range` int NOT NULL,
  `product_id` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ratings_product1_idx` (`product_id`),
  KEY `fk_ratings_user1_idx` (`user_email`),
  CONSTRAINT `fk_ratings_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_ratings_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ratings`
--

LOCK TABLES `ratings` WRITE;
/*!40000 ALTER TABLE `ratings` DISABLE KEYS */;
/*!40000 ALTER TABLE `ratings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recent`
--

DROP TABLE IF EXISTS `recent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `recent` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_email` varchar(100) NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_recent_user1_idx` (`user_email`),
  KEY `fk_recent_product1_idx` (`product_id`),
  CONSTRAINT `fk_recent_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_recent_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recent`
--

LOCK TABLES `recent` WRITE;
/*!40000 ALTER TABLE `recent` DISABLE KEYS */;
INSERT INTO `recent` VALUES (1,'duleeshasavindi@gmail.com',14),(2,'duleeshasavindi@gmail.com',14),(3,'duleeshasavindi@gmail.com',1),(4,'duleeshasavindi@gmail.com',4),(5,'duleeshasavindi@gmail.com',12),(6,'duleeshasavindi@gmail.com',14),(7,'duleeshasavindi@gmail.com',17),(8,'duleeshasavindi@gmail.com',16),(9,'duleeshasavindi@gmail.com',12),(10,'duleeshasavindi@gmail.com',17),(11,'duleeshasavindi@gmail.com',11),(12,'hiru@gmail.com',17),(13,'duleeshasavindi@gmail.com',11),(14,'duleeshasavindi@gmail.com',1),(15,'duleeshasavindi@gmail.com',15),(16,'duleeshasavindi@gmail.com',16),(17,'duleeshasavindi@gmail.com',11),(18,'duleeshasavindi@gmail.com',5),(19,'duleeshasavindi@gmail.com',11),(20,'duleeshasavindi@gmail.com',5),(21,'duleeshasavindi@gmail.com',14),(22,'duleeshasavindi@gmail.com',11),(23,'hiru@gmail.com',16),(24,'hiru@gmail.com',4),(25,'hiru@gmail.com',12),(26,'hiru@gmail.com',12),(27,'hiru@gmail.com',17),(28,'hiru@gmail.com',15),(29,'hiru@gmail.com',1),(30,'hiru@gmail.com',14),(31,'hiru@gmail.com',1),(32,'hiru@gmail.com',14),(33,'hiru@gmail.com',15),(34,'hiru@gmail.com',16),(35,'hiru@gmail.com',17),(36,'hiru@gmail.com',12),(37,'hiru@gmail.com',15),(38,'hiru@gmail.com',14),(39,'hiru@gmail.com',15),(40,'hiru@gmail.com',5),(41,'hiru@gmail.com',15),(42,'hiru@gmail.com',15),(43,'hiru@gmail.com',5),(44,'hiru@gmail.com',1),(45,'hiru@gmail.com',14),(46,'sakuni@gmail.com',21),(47,'sakuni@gmail.com',15),(48,'hiru@gmail.com',12),(49,'hiru@gmail.com',17),(50,'hiru@gmail.com',16),(51,'hiru@gmail.com',15),(52,'hiru@gmail.com',5),(53,'hiru@gmail.com',15),(54,'hiru@gmail.com',14),(55,'hiru@gmail.com',15),(56,'hiru@gmail.com',5),(57,'hiru@gmail.com',21),(58,'hiru@gmail.com',22),(59,'hiru@gmail.com',15),(60,'hiru@gmail.com',14);
/*!40000 ALTER TABLE `recent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `size`
--

DROP TABLE IF EXISTS `size`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `size` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `size`
--

LOCK TABLES `size` WRITE;
/*!40000 ALTER TABLE `size` DISABLE KEYS */;
INSERT INTO `size` VALUES (1,'S'),(2,'M'),(3,'L'),(4,'XL');
/*!40000 ALTER TABLE `size` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'active'),(2,'deactive');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trend`
--

DROP TABLE IF EXISTS `trend`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trend` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trend`
--

LOCK TABLES `trend` WRITE;
/*!40000 ALTER TABLE `trend` DISABLE KEYS */;
INSERT INTO `trend` VALUES (1,'Office'),(2,'Casual'),(3,'Party');
/*!40000 ALTER TABLE `trend` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `email` varchar(100) NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL,
  `join_date` datetime DEFAULT NULL,
  `verification_code` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('duleeshasavindi@gmail.com','Savindi','duleesha','0771100980','Savi123','2022-11-16 03:31:57','63e6252f9abac','2'),('hiru@gmail.com','Hirushima','Sandalika','0771100986','Savi123','2022-11-15 01:48:08',NULL,'2'),('nim@gmail.com','Savindi','Duleesha',NULL,'Savi123','2023-01-25 22:36:07',NULL,'1'),('nimaa@gmail.com','Savindim','Duleesha',NULL,'Savi123','2023-01-25 22:33:23',NULL,'1'),('nimali@gmail.com','Nimali','Sandaya','0776677897','Savi123','2022-11-08 02:38:29',NULL,'1'),('nimnnnnn@gmail.com','Savindimm','Duleeshap',NULL,'Savi123','2023-01-25 22:28:17',NULL,'1'),('nimnnnnnnnnnnn@gmail.com','Savindinn','Duleeshass',NULL,'Savi123','2023-01-25 22:32:46',NULL,'1'),('nimss@gmail.com','Savindin','Duleeshas',NULL,'Savi123','2023-01-25 22:34:24',NULL,'1'),('s11111111111111111111akuni@gmail.com','Savindi','Duleesha','0723344543','Savi123','2022-11-08 02:48:00',NULL,'1'),('sa7ghhjgjggkuni@gmail.com','Savindi','Duleesha','0753311111','Savi123','2022-11-08 02:39:08',NULL,'1'),('sakuni666666@gmail.com','Savindi','Duleesha','0774433210','Savi123','2022-11-07 01:23:54',NULL,'1'),('sakuni@gmail.com','Dinithi','Duleesha','0782233456','Savi123','2022-11-07 01:22:13',NULL,'2'),('sakuni@gmail.com5444','Savindi','Duleesha','0778888888','Savi123','2022-11-07 01:23:28',NULL,'1'),('sakutttni@gmail.com','Savindi','Duleesha','0774213456','Savi123','2022-11-07 01:22:49',NULL,'2'),('savindi@gmail.com','Savindini','Duleesnha','0775967524','Savi123','2022-11-07 01:08:47',NULL,'2');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_has_address`
--

DROP TABLE IF EXISTS `user_has_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_has_address` (
  `user_email` varchar(100) DEFAULT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `line1` varchar(100) DEFAULT NULL,
  `line2` varchar(100) DEFAULT NULL,
  `postal_code` varchar(45) DEFAULT NULL,
  `city_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_has_address_city1_idx` (`city_id`),
  CONSTRAINT `fk_user_has_address_city1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_has_address`
--

LOCK TABLES `user_has_address` WRITE;
/*!40000 ALTER TABLE `user_has_address` DISABLE KEYS */;
INSERT INTO `user_has_address` VALUES ('duleeshasavindi@gmail.com',1,'22/G, Nuwarapara','Kelaniya','12324',1),('hiru@gmail.com',2,'22/G, Nuwarapara','Pilimatalava','1239',13),('savindi@gmail.com',3,'33/A, New Road','Maradana','99872',1);
/*!40000 ALTER TABLE `user_has_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wishlist` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_wishlist_product1_idx` (`product_id`),
  KEY `fk_wishlist_user1_idx` (`user_email`),
  CONSTRAINT `fk_wishlist_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_wishlist_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlist`
--

LOCK TABLES `wishlist` WRITE;
/*!40000 ALTER TABLE `wishlist` DISABLE KEYS */;
INSERT INTO `wishlist` VALUES (13,1,'duleeshasavindi@gmail.com'),(15,5,'duleeshasavindi@gmail.com'),(16,14,'duleeshasavindi@gmail.com'),(17,12,'duleeshasavindi@gmail.com'),(18,4,'duleeshasavindi@gmail.com'),(19,17,'duleeshasavindi@gmail.com'),(22,16,'duleeshasavindi@gmail.com'),(24,15,'hiru@gmail.com'),(25,15,'duleeshasavindi@gmail.com'),(30,5,'hiru@gmail.com'),(35,1,'hiru@gmail.com'),(36,14,'hiru@gmail.com'),(41,22,'sakuni@gmail.com'),(42,19,'sakuni@gmail.com'),(43,16,'sakuni@gmail.com'),(44,12,'sakuni@gmail.com');
/*!40000 ALTER TABLE `wishlist` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-01  7:28:42
