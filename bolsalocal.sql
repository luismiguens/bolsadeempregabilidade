-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: localhost    Database: bolsadeempregabilidade
-- ------------------------------------------------------
-- Server version	5.7.24-0ubuntu0.16.04.1

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
-- Table structure for table `business`
--

DROP TABLE IF EXISTS `business`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `business` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `presentation` text,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `website` varchar(45) DEFAULT NULL,
  `image` varchar(128) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `business`
--

LOCK TABLES `business` WRITE;
/*!40000 ALTER TABLE `business` DISABLE KEYS */;
INSERT INTO `business` VALUES (2,'AORH+aaaa',NULL,'email','phone','http://www.aorhmais.pt/','5c06bf7582059179385359.png','2018-12-04 17:46:42'),(3,'APORMAR - TNN',NULL,'aaaa','22222','http://www.trabalharnumnavio.pt/','5a6fc0f034bb0.png','2018-02-14 16:09:12'),(4,'Bairro Alto Hotel',NULL,'aaaa','22222','https://www.bairroaltohotel.com/pt','5a6fc106a0700.png','2018-02-13 23:29:51'),(6,'Choupana Caffé',NULL,'aaaaaaaaa','22222','www.choupanacaffe.pt','5a6fc1140f517.png','2018-02-09 18:32:39'),(7,'Cooltour Oporto',NULL,NULL,'23123123','http://www.cooltouroporto.com/en/','5a863507bb23f.png','2018-02-16 01:33:59'),(8,'Cooltour Lisbon',NULL,NULL,NULL,'http://www.cooltourlisbon.com/pt','5a6fc13ca8c34.png','2018-02-16 01:18:36'),(9,'Discovery Hotel Management',NULL,NULL,NULL,'https://discoveryportugal.com/','5a8b0e8410b60.png','2018-02-19 17:51:00'),(10,'Campo Real Dolce Hotels and Resort',NULL,NULL,NULL,'https://www.dolcecamporeal.com/','5a6fc172d76fc.png','2018-02-13 23:36:12'),(11,'Grupo José Avillez',NULL,NULL,NULL,'http://www.joseavillez.pt/','5a6fc1a6619d5.png','2018-02-13 23:41:06'),(12,'H10 Hotels',NULL,NULL,NULL,'https://www.h10hotels.com/pt','5a8cc044160ca.png','2018-02-21 00:41:40'),(13,'Grupo Multifood',NULL,NULL,NULL,'www.multifood.pt','5a7d98c148a77.png','2018-02-09 18:35:58'),(14,'Hotéis Real',NULL,NULL,NULL,'https://www.realhotelsgroup.com/','5a6fc4b95b865.png','2018-02-13 23:42:34'),(15,'Hotel Quinta do Lago',NULL,NULL,NULL,'http://www.hotelquintadolago.com/','5a6fc5287437d.png','2018-02-13 23:46:51'),(16,'Grupo Hoti Hotels',NULL,NULL,NULL,'http://www.hotihoteis.com/pt','5a6fc5cd6948c.png','2018-02-14 00:29:22'),(17,'IEFP',NULL,NULL,NULL,'https://www.iefp.pt/','5a7d9d9dc470b.png','2018-02-13 23:59:49'),(18,'Briones International Consulting',NULL,NULL,NULL,'http://www.binternationalc.com/','5a6fc6a3ed95f.png','2018-02-13 23:48:50'),(41,'Alerta Emprego',NULL,NULL,NULL,'https://www.alertaemprego.pt/','5a7d99248d394.png','2018-02-14 00:00:20'),(42,'Armatis - Lc',NULL,NULL,NULL,'www.armatis.com/pt','5a7d989c67e08.png','2018-02-09 19:07:32'),(43,'Campingir',NULL,NULL,NULL,'http://www.campigir.com/pt','5a7d9939055fb.png','2018-02-14 00:02:45'),(45,'Dom Pedro Hotels',NULL,NULL,NULL,'https://www.dompedro.com/','5a8632aa473e6.png','2018-02-16 01:25:14'),(46,'Host- RH',NULL,NULL,NULL,'https://www.host-rh.com/','5a7d997480be9.png','2018-02-14 00:04:06'),(48,'Marriott Lisboa',NULL,NULL,NULL,'http://www.lisboamarriott.com/','5a84614c4f163.png','2018-02-14 16:18:20'),(50,'Pestana Hotel Group',NULL,NULL,NULL,'https://www.pestana.com/pt','5a7cf308ef838.png','2018-02-14 00:05:54'),(51,'SANA Hotels',NULL,NULL,NULL,'http://www.sanahotels.com/','5a8633f19f47d.png','2018-02-16 01:29:21'),(52,'Sonae Capital',NULL,NULL,NULL,'http://www.sonaecapital.pt/','5a86331c990d3.png','2018-02-16 01:25:48'),(53,'Turim Hotels',NULL,NULL,NULL,'https://www.turim-hotels.com/','5a7d9c6c915fa.png','2018-02-14 00:14:12'),(54,'Vida Edu',NULL,NULL,NULL,'http://vidaedu.com/','5a7d9c8742958.png','2018-02-14 00:14:57'),(55,'Zoomarine',NULL,NULL,NULL,'https://www.zoomarine.pt/pt/','5a7da12e08747.png','2018-02-14 00:15:37'),(56,'TimeOut Market',NULL,NULL,NULL,'https://www.timeoutmarket.com/','5a940ae6de1eb.png','2018-02-26 13:25:58'),(57,'Luna Hotels & Resorts',NULL,NULL,NULL,'http://www.lunahoteis.com/pt','5a7da15c09ce7.png','2018-02-14 00:17:43'),(58,'Viking River Cruise',NULL,NULL,NULL,'https://www.vikingcruises.com/','5a8c862402da6.png','2018-02-20 20:33:40'),(59,'Pine Cliffs Hotel',NULL,NULL,NULL,'http://www.pinecliffshotel.com/','5a7da2e15c978.png','2018-02-14 00:17:17'),(60,'Sheraton Lisboa Hotel',NULL,NULL,NULL,'http://www.sheratonlisboa.com/','5a980172d5946.jpg','2018-03-01 13:34:42'),(61,'ONYRIA GOLF RESORTS',NULL,NULL,NULL,'http://www.onyriaresorts.com/pt','5a7da82ea80e4.png','2018-02-14 00:19:22'),(62,'Penha Longa Resort',NULL,NULL,NULL,'http://www.penhalonga.com/pt','5a7da9ae032f5.png','2018-02-14 00:19:45'),(63,'Portvgália',NULL,NULL,NULL,'http://m.portugalia.pt/','5a7dac7dc161c.png','2018-02-14 00:21:14'),(64,'Palácio Chiado',NULL,NULL,NULL,'http://palaciochiado.pt/','5a7daebaedb16.png','2018-02-14 00:21:39'),(65,'RM Consulting Thailand',NULL,NULL,NULL,'http://www.4-my-future.com/','5a7db17bdc549.png','2018-02-14 00:22:26'),(66,'Vip Hotels',NULL,NULL,NULL,'http://www.viphotels.com/pt/Homepage.aspx','5a86343e0c7a1.png','2018-02-16 01:30:38'),(67,'Jupiter Hotel Group',NULL,NULL,NULL,'https://www.jupiterhoteis.com/pt/','5a8461696cd90.png','2018-02-14 16:18:49'),(68,'VidaMar Hotels & Resorts',NULL,NULL,NULL,'https://www.vidamarresorts.com/pt/','5a7db6e06707c.png','2018-02-14 00:24:22'),(69,'GRUPO TRAVELSTORE',NULL,NULL,NULL,'https://www.grupotravelstore.com/','5a7db91357fab.png','2018-02-21 17:01:04'),(70,'The Independente Collective',NULL,NULL,NULL,'https://theindependente.pt/collective/','5a7df45d47fb9.png','2018-02-14 00:26:34'),(71,'InterContinental Lisbon Hotel',NULL,NULL,NULL,'https://www.ihg.com/hotels/pt','5a7dbb27a07ca.png','2018-02-14 00:27:09'),(72,'Grupo Vila Galé',NULL,NULL,NULL,'https://www.vilagale.com/','5a7de2092927d.png','2018-02-14 00:27:57'),(73,'Stefan Marx',NULL,NULL,NULL,'http://www.s-marx.de','5a8ea9595a5e3.png','2018-02-22 11:33:59'),(74,'Randstad',NULL,NULL,NULL,'https://www.randstad.pt/','5a7de577cafde.png','2018-02-14 00:25:03'),(75,'Noah Surf House',NULL,NULL,NULL,'http://www.noahsurfhouseportugal.com/','5a7de629e841a.png','2018-02-14 00:25:17'),(76,'Connective',NULL,NULL,NULL,'https://www.connective.com.pt','5a8edec9dab8a.png','2018-02-22 15:16:25'),(77,'Viagens Abreu',NULL,NULL,NULL,'http://www.abreu.pt','5a8edf49ddfe3.png','2018-02-22 15:18:33'),(78,'Turijobs',NULL,NULL,NULL,'http://www.turijobs.pt/?lang=pt','5a8464ab79399.png','2018-02-14 16:32:43'),(79,'Lux Hotels',NULL,NULL,NULL,'http://www.luxhotels.pt/','5a84655596b6b.png','2018-02-14 16:35:33'),(82,'Connective',NULL,NULL,NULL,'https://www.connective.com.pt','5a8634d3191bd.png','2018-02-22 12:09:54'),(83,'McDonald\'s Corporation',NULL,NULL,NULL,'https://www.mcdonalds.pt','5a8e14b044453.png','2018-02-22 12:11:06'),(84,'Viagens Abreu',NULL,NULL,NULL,'http://www.abreu.pt','5a8e14f873515.png','2018-02-22 12:10:52'),(85,'Montebelo Hotels & Resorts',NULL,NULL,NULL,'https://montebelohotels.com/','5a8eaa6b70ff7.png','2018-02-22 11:32:59'),(86,'The Prime Hotels',NULL,NULL,NULL,'https://www.theprimehotels.com','5a8e1642ba88d.jpeg','2018-02-22 12:10:16'),(87,'Sheraton Cascais Resort',NULL,NULL,NULL,'https://www.sheratoncascaisresort.com/pt/','5a8edfc0dd0f2.png','2018-02-22 15:20:32'),(88,'Cascade Wellness & Lifestyle Resort',NULL,NULL,NULL,'http://www.cascaderesortalgarve.com','5a8ee132bc967.png','2018-02-22 15:26:42'),(89,'minor hotels',NULL,NULL,NULL,'https://www.minorhotels.com','5a97fa08a7cfa.png','2018-03-01 13:03:04'),(90,'asdasdasd','asdasda','sadasd','asdasd','asdasd','5c06c2fb6b443640230387.png','2018-12-04 17:10:03');
/*!40000 ALTER TABLE `business` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `business_year`
--

DROP TABLE IF EXISTS `business_year`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `business_year` (
  `business_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  PRIMARY KEY (`business_id`,`year_id`),
  KEY `IDX_EB19713A40C1FEA7` (`year_id`),
  CONSTRAINT `fk_business_year_1` FOREIGN KEY (`business_id`) REFERENCES `business` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_business_year_2` FOREIGN KEY (`year_id`) REFERENCES `year` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `business_year`
--

LOCK TABLES `business_year` WRITE;
/*!40000 ALTER TABLE `business_year` DISABLE KEYS */;
INSERT INTO `business_year` VALUES (2,2),(3,2),(4,2),(6,2),(7,2),(8,2),(9,2),(10,2),(11,2),(12,2),(13,2),(14,2),(15,2),(16,2),(17,2),(18,2),(41,2),(42,2),(43,2),(45,2),(46,2),(48,2),(50,2),(51,2),(52,2),(53,2),(54,2),(55,2),(56,2),(57,2),(58,2),(59,2),(60,2),(61,2),(62,2),(63,2),(64,2),(65,2),(66,2),(67,2),(68,2),(69,2),(70,2),(71,2),(72,2),(73,2),(74,2),(75,2),(76,2),(77,2),(78,2),(79,2),(82,2),(83,2),(84,2),(85,2),(86,2),(87,2),(88,2),(89,2),(90,2),(90,3);
/*!40000 ALTER TABLE `business_year` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fos_user`
--

DROP TABLE IF EXISTS `fos_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fos_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fos_user`
--

LOCK TABLES `fos_user` WRITE;
/*!40000 ALTER TABLE `fos_user` DISABLE KEYS */;
INSERT INTO `fos_user` VALUES (10,'luismiguens','luismiguens','luis.t.miguens@gmail.com','luis.t.miguens@gmail.com',1,NULL,'$2y$13$D1ar/fsNT/XL920piIT9gOge2K1XH33lOyj8B1b2CyYG7e9QvFx9C','2018-12-03 16:39:06',NULL,NULL,'a:0:{}');
/*!40000 ALTER TABLE `fos_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photo`
--

DROP TABLE IF EXISTS `photo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `image` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photo`
--

LOCK TABLES `photo` WRITE;
/*!40000 ALTER TABLE `photo` DISABLE KEYS */;
INSERT INTO `photo` VALUES (17,'Bolsa de Empregabilidade 2017','5a736aef17468.jpg',NULL,'2018-12-04 17:51:20'),(18,'Bolsa de Empregabilidade 2017','5a736b7b8d6e6.jpg',NULL,'2018-02-01 19:33:15'),(19,'Bolsa de Empregabilidade 2017','5a7373a4a5bab.jpg',NULL,'2018-02-01 20:08:04'),(20,'Bolsa de Empregabilidade 2017','5a7373fd386f3.jpg',NULL,'2018-02-01 20:09:33'),(21,'Bolsa de Empregabilidade 2017','5a73741defbc5.jpg',NULL,'2018-02-01 20:10:05'),(22,'Bolsa de Empregabilidade 2017','5a73742e8afc7.jpg',NULL,'2018-02-01 20:10:22'),(23,'Bolsa de Empregabilidade 2017','5a73745cd63b5.jpg',NULL,'2018-02-01 20:11:08'),(24,'Bolsa de Empregabilidade 2017','5a73750585888.jpg',NULL,'2018-02-01 20:14:02'),(25,'Bolsa de Empregabilidade 2017','5a73752553463.jpg',NULL,'2018-02-01 20:14:29'),(26,'Bolsa de Empregabilidade 2017','5a73753d5e3dd.jpg',NULL,'2018-02-01 20:15:03'),(27,'Bolsa de Empregabilidade 2017','5a737564b96da.jpg',NULL,'2018-02-01 20:15:32'),(28,'Bolsa de Empregabilidade 2017','5a737598bb08d.jpg',NULL,'2018-02-01 20:16:24'),(29,'Bolsa de Empregabilidade 2017','5a7375b8b4230.jpg',NULL,'2018-02-01 20:16:56'),(30,'Bolsa de Empregabilidade 2017','5a7375dc44de0.jpg',NULL,'2018-02-01 20:17:32'),(31,'Bolsa de Empregabilidade 2017','5a7375f54621f.jpg',NULL,'2018-02-01 20:17:57'),(32,'Bolsa de Empregabilidade 2017','5a73763080dfe.jpg',NULL,'2018-02-01 20:18:56');
/*!40000 ALTER TABLE `photo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photo_year`
--

DROP TABLE IF EXISTS `photo_year`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photo_year` (
  `photo_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  PRIMARY KEY (`photo_id`,`year_id`),
  KEY `IDX_3AB3C1C340C1FEA7` (`year_id`),
  CONSTRAINT `fk_photo_year_1` FOREIGN KEY (`photo_id`) REFERENCES `photo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_photo_year_2` FOREIGN KEY (`year_id`) REFERENCES `year` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photo_year`
--

LOCK TABLES `photo_year` WRITE;
/*!40000 ALTER TABLE `photo_year` DISABLE KEYS */;
INSERT INTO `photo_year` VALUES (17,2),(18,2),(19,2),(20,2),(21,2),(22,2),(23,2),(24,2),(25,2),(26,2),(27,2),(28,2),(29,2),(30,2),(31,2),(32,2);
/*!40000 ALTER TABLE `photo_year` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `speaker`
--

DROP TABLE IF EXISTS `speaker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `speaker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `image` varchar(80) DEFAULT NULL,
  `profession` varchar(45) DEFAULT NULL,
  `presentation` text,
  `linkedin` varchar(80) DEFAULT NULL,
  `twitter` varchar(80) DEFAULT NULL,
  `google` varchar(80) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `speaker`
--

LOCK TABLES `speaker` WRITE;
/*!40000 ALTER TABLE `speaker` DISABLE KEYS */;
INSERT INTO `speaker` VALUES (5,'PETER GIACOMINI','5a8b0d57bd845.jpg',NULL,'Motivational Speaker, Trainer And Consulting General Manager','http://www.petergiacomini.com/',NULL,NULL,'2018-12-04 17:50:44'),(6,'John S Lohr','5a8b0d6a38e4a.jpg',NULL,'Director of Development - School Relations at','https://www.linkedin.com/in/johnslohr/',NULL,NULL,'2018-12-04 17:51:05'),(7,'Alvaro Sardinha','5a8b0d7cddd39.jpg',NULL,'Shipping Industry Consultant, Marine Engineer','https://www.linkedin.com/in/alvarosardinha/',NULL,NULL,'2018-02-19 17:46:36'),(8,'Miguel Baptista','5a8b0d8d9105e.jpg',NULL,'Queres viajar comigo? Faz acontecer a tua vida','http://www.queresviajarcomigo.com/',NULL,NULL,'2018-02-19 17:48:36'),(9,'Nelson Emilio','5a954669bde14.jpg','Personal Brander & Leadership Strategist','Personal Brander & Leadership Strategist','https://www.linkedin.com/in/nelsonemilio/?locale=pt_BR',NULL,NULL,'2018-02-27 11:52:09');
/*!40000 ALTER TABLE `speaker` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `speaker_year`
--

DROP TABLE IF EXISTS `speaker_year`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `speaker_year` (
  `speaker_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  PRIMARY KEY (`speaker_id`,`year_id`),
  KEY `IDX_98951A1F40C1FEA7` (`year_id`),
  CONSTRAINT `fk_speaker_year_1` FOREIGN KEY (`speaker_id`) REFERENCES `speaker` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_speaker_year_2` FOREIGN KEY (`year_id`) REFERENCES `year` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `speaker_year`
--

LOCK TABLES `speaker_year` WRITE;
/*!40000 ALTER TABLE `speaker_year` DISABLE KEYS */;
INSERT INTO `speaker_year` VALUES (5,2),(6,2),(7,2),(8,2),(9,2);
/*!40000 ALTER TABLE `speaker_year` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sponsor`
--

DROP TABLE IF EXISTS `sponsor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sponsor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `image` varchar(80) DEFAULT NULL,
  `website` varchar(45) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sponsor`
--

LOCK TABLES `sponsor` WRITE;
/*!40000 ALTER TABLE `sponsor` DISABLE KEYS */;
INSERT INTO `sponsor` VALUES (1,'ME','5a736a23af2a3.png','turismo.pt','2018-12-04 17:52:36'),(2,'Turismo De Portugal, I. P.','5a706ac8de87f.png','http://www.turismodeportugal.pt/Portugu%C3%AA','2018-02-05 19:22:21'),(3,'BTL','5a706adbce071.png',NULL,'2018-01-30 12:53:47'),(5,'Horto do Campo Grande','5a8c7cb082f91.png','https://hortodocampogrande.com/','2018-02-20 19:53:20'),(6,'COPIANÇO','5a8e16a0240a9.png','http://copianco.pt/','2018-02-22 01:02:24');
/*!40000 ALTER TABLE `sponsor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sponsor_year`
--

DROP TABLE IF EXISTS `sponsor_year`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sponsor_year` (
  `sponsor_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  PRIMARY KEY (`sponsor_id`,`year_id`),
  KEY `IDX_5B2030D740C1FEA7` (`year_id`),
  CONSTRAINT `fk_sponsor_year_1` FOREIGN KEY (`sponsor_id`) REFERENCES `sponsor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_sponsor_year_2` FOREIGN KEY (`year_id`) REFERENCES `year` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sponsor_year`
--

LOCK TABLES `sponsor_year` WRITE;
/*!40000 ALTER TABLE `sponsor_year` DISABLE KEYS */;
INSERT INTO `sponsor_year` VALUES (1,2),(2,2),(3,2),(5,2),(6,2);
/*!40000 ALTER TABLE `sponsor_year` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `year`
--

DROP TABLE IF EXISTS `year`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `year` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `year`
--

LOCK TABLES `year` WRITE;
/*!40000 ALTER TABLE `year` DISABLE KEYS */;
INSERT INTO `year` VALUES (1,2017),(2,2018),(3,2019);
/*!40000 ALTER TABLE `year` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-07 13:43:40
