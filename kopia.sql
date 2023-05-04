-- MySQL dump 10.19  Distrib 10.3.36-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: jakub.piorkowski
-- ------------------------------------------------------
-- Server version	10.3.36-MariaDB-0+deb10u2

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
-- Table structure for table `footballer_info`
--

DROP TABLE IF EXISTS `footballer_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `footballer_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `footballer_id` int(11) NOT NULL,
  `season` varchar(15) COLLATE utf8mb4_polish_ci NOT NULL,
  `team` varchar(50) COLLATE utf8mb4_polish_ci NOT NULL,
  `goals` int(11) NOT NULL,
  `assists` int(11) NOT NULL,
  `yellow_cards` int(11) NOT NULL,
  `red_cards` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `footballer_id` (`footballer_id`),
  KEY `id_2` (`id`),
  CONSTRAINT `footballer_info_ibfk_1` FOREIGN KEY (`footballer_id`) REFERENCES `footballers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `footballer_info`
--

LOCK TABLES `footballer_info` WRITE;
/*!40000 ALTER TABLE `footballer_info` DISABLE KEYS */;
INSERT INTO `footballer_info` VALUES (2,31,'2010-2011','Barcelona',53,24,5,0),(3,31,'2011-2012','Barcelona',73,29,4,0),(4,31,'2012-2013','Barcelona',60,16,1,0),(5,31,'2013-2014','Barcelona',41,18,2,0),(6,31,'2014-2015','Barcelona',58,27,2,0),(7,31,'2015-2016','Barcelona',41,19,6,1),(8,31,'2016-2017','Barcelona',54,9,5,1),(9,31,'2017-2018','Barcelona',45,18,3,0),(10,31,'2018-2019','Barcelona',51,19,2,0),(11,31,'2019-2020','Barcelona',31,26,3,0),(12,31,'2020-2021','Barcelona',38,12,2,0),(13,32,'2010-2011','Real Madrid',40,10,7,1),(14,32,'2011-2012','Real Madrid',46,12,7,0),(15,32,'2012-2013','Real Madrid',34,10,5,1),(16,32,'2013-2014','Real Madrid',51,15,4,0),(17,32,'2014-2015','Real Madrid',48,16,6,0),(18,32,'2015-2016','Real Madrid',35,11,6,1),(19,32,'2016-2017','Real Madrid',25,6,2,1),(20,32,'2017-2018','Real Madrid',26,5,3,0),(21,32,'2018-2019','Juventus',21,8,3,0),(22,32,'2019-2020','Juventus',31,5,5,0),(23,32,'2020-2021','Juventus',29,3,4,0),(24,33,'2010-2011','Santos',42,12,8,2),(25,33,'2011-2012','Santos',43,16,5,0),(26,33,'2012-2013','Barcelona',15,11,1,0),(27,33,'2013-2014','Barcelona',15,10,3,1),(28,33,'2014-2015','Barcelona',39,10,5,1),(29,33,'2015-2016','Barcelona',31,13,4,1),(30,33,'2016-2017','Barcelona',20,21,5,0),(31,33,'2017-2018','Paris Saint-Germain',28,16,3,1),(32,33,'2018-2019','Paris Saint-Germain',23,13,2,1),(33,33,'2019-2020','Paris Saint-Germain',19,12,3,0),(34,33,'2020-2021','Paris Saint-Germain',16,10,2,0),(35,34,'2016-2017','AS Monaco',26,8,1,0),(36,34,'2017-2018','Paris Saint-Germain',21,8,2,0),(37,34,'2018-2019','Paris Saint-Germain',33,7,4,0),(38,34,'2019-2020','Paris Saint-Germain',30,18,4,0),(39,34,'2020-2021','Paris Saint-Germain',27,7,2,0),(40,35,'2010-2011','KRC Genk',5,16,2,0),(41,35,'2011-2012','KRC Genk',8,10,0,0),(42,35,'2012-2013','Werder Bremen',10,9,3,0),(43,35,'2013-2014','VfL Wolfsburg',10,20,2,0),(44,35,'2014-2015','VfL Wolfsburg',16,27,3,0),(45,35,'2015-2016','Manchester City',16,13,3,0),(46,35,'2016-2017','Manchester City',7,18,2,0),(47,35,'2017-2018','Manchester City',12,21,2,0),(48,35,'2018-2019','Manchester City',6,2,2,0),(49,35,'2019-2020','Manchester City',13,20,2,0),(50,35,'2020-2021','Manchester City',6,12,2,0),(51,36,'2010-2011','Lech Poznan',18,2,2,0),(52,36,'2011-2012','Borussia Dortmund',30,7,1,0),(53,36,'2012-2013','Borussia Dortmund',24,6,3,0),(54,36,'2013-2014','Borussia Dortmund',20,6,2,0),(55,36,'2014-2015','Bayern Munich',17,5,1,0),(56,36,'2015-2016','Bayern Munich',42,9,5,0),(57,36,'2016-2017','Bayern Munich',43,9,4,0),(58,36,'2017-2018','Bayern Munich',41,5,1,0),(59,36,'2018-2019','Bayern Munich',40,13,1,0),(60,36,'2019-2020','Bayern Munich',55,10,1,0),(61,36,'2020-2021','Bayern Munich',48,9,1,0),(62,38,'2014-2015','Tottenham Hotspur',21,2,4,0),(63,38,'2015-2016','Tottenham Hotspur',25,1,5,0),(64,38,'2016-2017','Tottenham Hotspur',29,7,5,0),(65,38,'2017-2018','Tottenham Hotspur',30,2,5,0),(66,38,'2018-2019','Tottenham Hotspur',17,4,6,0),(67,38,'2019-2020','Tottenham Hotspur',18,2,2,0),(68,38,'2020-2021','Tottenham Hotspur',23,14,1,0),(69,39,'2014-2015','Southampton',10,3,1,0),(70,39,'2015-2016','Southampton',11,6,2,0),(71,39,'2016-2017','Liverpool',13,5,3,0),(72,39,'2017-2018','Liverpool',20,9,3,0),(73,39,'2018-2019','Liverpool',22,1,4,0),(74,39,'2019-2020','Liverpool',18,7,2,0),(75,39,'2020-2021','Liverpool',16,7,1,0),(76,37,'2010/2011','El Mokawloon',11,2,2,0),(77,37,'2011/2012','FC Basel',4,1,1,0),(78,37,'2012/2013','FC Basel',5,3,0,0),(79,37,'2013/2014','FC Basel, Chelsea',10,5,2,0),(80,37,'2014/2015','Fiorentina, Chelsea',7,3,0,0),(81,37,'2015/2016','Roma, Fiorentina',15,6,2,0),(82,37,'2016/2017','Roma',15,11,1,0),(83,37,'2017/2018','Liverpool',32,10,1,0),(84,37,'2018/2019','Liverpool',22,8,1,0),(85,37,'2019/2020','Liverpool',19,10,1,0),(86,37,'2020/2021','Liverpool',22,5,2,0),(87,37,'2021/2022','Liverpool',22,7,2,0),(88,38,'2010/2011','Schalke 04',0,0,0,0),(89,38,'2011/2012','Schalke 04',0,0,0,0),(90,38,'2012/2013','Bayern Munich',0,0,0,0),(91,38,'2013/2014','Bayern Munich',0,0,0,0),(92,38,'2014/2015','Bayern Munich',0,1,0,0),(93,38,'2015/2016','Bayern Munich',0,0,0,0),(94,38,'2016/2017','Bayern Munich',0,0,0,0),(95,38,'2017/2018','Bayern Munich',0,0,0,0),(96,38,'2018/2019','Bayern Munich',0,0,0,0),(97,38,'2019/2020','Bayern Munich',0,0,0,0),(98,38,'2020/2021','Bayern Munich',0,0,0,0),(99,38,'2021/2022','Bayern Munich',0,0,0,0),(106,49,'2015-2016','bayern',10,10,10,10);
/*!40000 ALTER TABLE `footballer_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `footballers`
--

DROP TABLE IF EXISTS `footballers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `footballers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_polish_ci NOT NULL,
  `nationality` varchar(30) COLLATE utf8mb4_polish_ci NOT NULL,
  `club` varchar(50) COLLATE utf8mb4_polish_ci NOT NULL,
  `league` varchar(20) COLLATE utf8mb4_polish_ci NOT NULL,
  `height` float NOT NULL,
  `weight` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `position` varchar(20) COLLATE utf8mb4_polish_ci NOT NULL,
  `age` date NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `footballers`
--

LOCK TABLES `footballers` WRITE;
/*!40000 ALTER TABLE `footballers` DISABLE KEYS */;
INSERT INTO `footballers` VALUES (31,'Lionel Messi','Argentina','Paris Saint-Germain','Ligue 1',169,65,30,'Forward','1987-06-24','messi.png'),(32,'Cristiano Ronaldo','Portugal','Manchester United','Premier League',187,80,7,'Forward','1985-02-05','ronaldo.png'),(33,'Neymar Jr.','Brazil','Paris Saint-Germain','Ligue 1',175,68,10,'Forward','1992-02-05','neymar.png'),(34,'Kylian Mbappe','France','Paris Saint-Germain','Ligue 1',178,73,7,'Forward','1998-12-20','mbappe.png'),(35,'Kevin De Bruyne','Belgium','Manchester City','Premier League',181,70,17,'Midfielder','1991-06-28','debruyne.png'),(36,'Robert Lewandowski','Poland','Bayern Munich','Bundesliga',184,80,9,'Forward','1988-08-21','lewandowski.png'),(37,'Mohamed Salah','Egypt','Liverpool','Premier League',175,71,11,'Forward','1992-06-15','salah.png'),(38,'Harry Kane','England','Tottenham Hotspur','',196,93,20,'Forward','1993-07-28','kane.png'),(39,'Sadio Mane','Senegal','Liverpool','',178,63,17,'Forward','1992-04-10','mane.png'),(40,'Jan Oblak','Slovenia','Atletico Madrid','',163,92,97,'Goalkeeper','1993-01-07','oblak.png'),(41,'Manuel Neuer','Germany','Bayern Munich','',179,97,57,'Goalkeeper','1986-03-27','neuer.png'),(42,'Virgil van Dijk','Netherlands','Liverpool','',161,72,10,'Defender','1991-07-08','vandijk.png'),(43,'Gianluigi Donnarumma','Italy','Paris Saint-Germain','',169,79,39,'Goalkeeper','1999-02-25','donnarumma.png'),(44,'Alisson Becker','Brazil','Liverpool','',170,93,69,'Goalkeeper','1992-10-02','becker.png'),(45,'Thibaut Courtois','Belgium','Real Madrid','',204,67,8,'Goalkeeper','1992-05-11','courtois.png'),(46,'Marc-Andre ter Stegen','Germany','Barcelona','',176,68,89,'Goalkeeper','1992-04-30','terstegen.png'),(48,'Trent Alexander-Arnold','England','Liverpool','',179,60,82,'Defender','1998-10-07','taa.png'),(49,'Andrew Robertson','Scotland','Liverpool','',189,69,16,'Defender','1994-03-11','robertson.png'),(50,'Kalidou Koulibaly','Senegal','Napoli','',192,86,73,'Defender','1991-06-20','koulibaly.png'),(51,'Ruben Dias','Portugal','Manchester City','',184,59,49,'Defender','1997-05-14','dias.png'),(52,'Joao Cancelo','Portugal','Manchester City','',205,53,61,'Defender','1994-05-27','cancelo.png'),(53,'Frenkie de Jong','Netherlands','Barcelona','',204,77,9,'Midfielder','1997-05-12','dejong.png'),(54,'Bruno Fernandes','Portugal','Manchester United','',199,81,74,'Midfielder','1994-09-08','fernandes.png'),(55,'Phil Foden','England','Manchester City','',204,59,22,'Midfielder','2000-05-28','foden.png');
/*!40000 ALTER TABLE `footballers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ratings`
--

DROP TABLE IF EXISTS `ratings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ratings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `footballer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `footballer_id` (`footballer_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `ratings_ibfk_3` FOREIGN KEY (`footballer_id`) REFERENCES `footballers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ratings_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ratings`
--

LOCK TABLES `ratings` WRITE;
/*!40000 ALTER TABLE `ratings` DISABLE KEYS */;
INSERT INTO `ratings` VALUES (93,31,40,1),(94,33,40,1),(95,32,40,4),(96,34,40,3),(97,40,40,5),(98,43,40,1),(99,48,40,1),(100,53,40,5),(101,31,39,3),(102,33,39,1),(103,39,39,1),(104,32,39,1),(105,40,39,1),(106,55,39,1),(107,54,39,1);
/*!40000 ALTER TABLE `ratings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) COLLATE utf8mb4_polish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_polish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_polish_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_polish_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (39,'admin','admin@o2.pl','$2y$10$lFk/QVHW92vJLxx7DOTFSelek6Gt4rq4JqtgbbTkFab7pwxY9WAVS','Admin',''),(40,'user','user@o2.pl','$2y$10$NSSjlQAT0JZSkRUh0YJsueV.VShAFEXWNBRgpvJSETQDgP7vqeJDG','User','');
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

-- Dump completed on 2023-03-28 16:55:10
