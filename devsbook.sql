-- MySQL dump 10.17  Distrib 10.3.25-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: devsbook
-- ------------------------------------------------------
-- Server version	10.3.25-MariaDB-0ubuntu0.20.04.1

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
-- Table structure for table `postcomments`
--

DROP TABLE IF EXISTS `postcomments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `postcomments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `body` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postcomments`
--

LOCK TABLES `postcomments` WRITE;
/*!40000 ALTER TABLE `postcomments` DISABLE KEYS */;
INSERT INTO `postcomments` VALUES (1,1,6,'2021-03-29 07:11:09','testando'),(2,1,7,'2021-03-29 07:13:33','Este é um teste para ter a certeza que está tudo testado'),(3,2,7,'2021-03-29 07:14:09','Por conseguinte, a constante divulgação das informações desafia a capacidade de equalização das direções preferenciais no sentido do progresso.'),(4,1,6,'2021-03-29 07:15:03','Por conseguinte, a constante divulgação das informações desafia a capacidade de equalização das direções preferenciais no sentido do progresso.');
/*!40000 ALTER TABLE `postcomments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `postlikes`
--

DROP TABLE IF EXISTS `postlikes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `postlikes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postlikes`
--

LOCK TABLES `postlikes` WRITE;
/*!40000 ALTER TABLE `postlikes` DISABLE KEYS */;
INSERT INTO `postlikes` VALUES (1,2,7,'2021-03-29 07:14:39'),(3,1,7,'2021-03-29 07:14:45'),(4,1,6,'2021-03-29 07:14:57'),(5,2,6,'2021-03-30 06:24:24');
/*!40000 ALTER TABLE `postlikes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `body` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,6,'text','2021-03-29 07:10:59','Teste de comentarios'),(2,7,'text','2021-03-29 07:13:59','Percebemos, cada vez mais, que a valorização de fatores subjetivos estimula a padronização das condições financeiras e administrativas exigidas.'),(3,6,'photo','2021-03-30 06:51:25','6eb2b2307de3e9f9dfe2b857c090eb0d.jpg'),(4,6,'photo','2021-03-30 06:52:27','28c740ec560827eac094a76f6abd496e.jpg'),(5,6,'photo','2021-03-30 07:01:51','702ee95ff6eb37f702c29934d6569463.jpg'),(6,6,'text','2021-03-30 07:02:16','Post de texto após ter feito o post de imagens, só para testar mesmo'),(7,6,'photo','2021-03-30 07:02:24','0626e636e42ddfe4dc51a56cc48b95c6.jpg');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userrelations`
--

DROP TABLE IF EXISTS `userrelations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userrelations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_from` int(11) NOT NULL,
  `user_to` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userrelations`
--

LOCK TABLES `userrelations` WRITE;
/*!40000 ALTER TABLE `userrelations` DISABLE KEYS */;
INSERT INTO `userrelations` VALUES (1,7,6),(2,6,7);
/*!40000 ALTER TABLE `userrelations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `city` varchar(100) DEFAULT NULL,
  `work` varchar(100) DEFAULT NULL,
  `avatar` varchar(100) NOT NULL DEFAULT 'default.jpg',
  `cover` varchar(100) NOT NULL DEFAULT 'cover.jpg',
  `token` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (6,'sousacmpedro@gmail.com','$2y$10$RZiMmRImd9h21nCn39jAUuixoNpL7TxGFYfq1wGLxCN0PnQX9zgzq','Pedro Miguel Sousa','1986-04-15','Belo Horizonte','VS Condominios','e6a7178f8e6aeadf0ebab28912d36728.jpg','ca28da499565af41e82eecee104d1b3c.jpg','145e5e4e694c53e2b397fc30dd9ddc6b'),(7,'leticiamandrade@gmail.com','$2y$10$DiuEWM3dtCvruOdTF6Bx5.If3AtFQvo0t409q8CgMsQvApSlKFDkG','Leticia Machado de Andrade Sousa','1980-09-09',NULL,NULL,'default.jpg','cover.jpg','38c877597f874124a10d6f64862f6650'),(8,'luiz@hotmail.com','$2y$10$4.aKZl554kaHmAQTQIx9i.7hhKKaA4NC.wSrVOHrFfUlimr9lwAsC','Luiz Henrique','1999-02-16',NULL,NULL,'default.jpg','cover.jpg','e9f7d6e7eeb8eb7fbcf349f4b31c8863'),(9,'rebecca@hotmail.com','$2y$10$HzWccbz9wNINsuc5RZFF8uWr.VXUZ8uBzgF2IOJN/RNIcZjQrAYGO','Rebecca Sousa','2017-11-30',NULL,NULL,'default.jpg','cover.jpg','fd9ffeeac9887270e446d1dc87ac0d5c'),(10,'alguem@iol.pt','$2y$10$5S9.Tj6KrcQq.k6/4Rqavupm5LMTD3Dce1PbcLQr7rX5d2x7xh/H6','Alguem','2000-01-01',NULL,NULL,'default.jpg','cover.jpg','03e7dfd1cae859e849204a554ccdcbd0'),(11,'antonini@pedlets.com','$2y$10$lxLRl7.Bc3rvuHjaZ2WOyeMXvhVKSMS623.m.yMAwydD2NYvpZaZ6','Antonini','1980-12-12',NULL,NULL,'default.jpg','cover.jpg','4acd4c5dc4014026f7162560eea58770'),(12,'teste@teste.com','$2y$10$zc7c7CBU21x1SRo4zrP5De5JP8It8vj/Kff5Lu8a9Q.4WbxhzN65G','Teste','1800-12-12',NULL,NULL,'default.jpg','cover.jpg','2eb7c14f7679e34679f28129176e62cb'),(13,'teste@123.pt','$2y$10$PmWD3GizY016ypiJ/wDPmuxwUMmtkzOG3tQkJ.Q3d1N5633pcmTqW','Pedro Miguel','2021-03-12',NULL,NULL,'default.jpg','cover.jpg','ac6d23bdc021c90cb1b17b18020fdce5');
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

-- Dump completed on 2021-03-30  8:53:19
