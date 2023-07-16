-- MySQL dump 10.13  Distrib 5.7.24, for Win64 (x86_64)
--
-- Host: localhost    Database: student
-- ------------------------------------------------------
-- Server version	5.7.24

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
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20210407134747','2021-04-07 13:48:27',15483),('DoctrineMigrations\\Version20210412154532','2021-04-12 15:45:54',2471);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enseignant`
--

DROP TABLE IF EXISTS `enseignant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enseignant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexe` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enseignant`
--

LOCK TABLES `enseignant` WRITE;
/*!40000 ALTER TABLE `enseignant` DISABLE KEYS */;
INSERT INTO `enseignant` VALUES (1,'M. KANSU Raoul','Masculin',NULL),(2,'M. MBANJOCK Didier','Masculin',NULL),(3,'Mme NGASSAM SEUWA Merveille','Féminin',NULL),(4,'M. NDOCK PIA Joseph','Masculin',NULL);
/*!40000 ALTER TABLE `enseignant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `filiere`
--

DROP TABLE IF EXISTS `filiere`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `filiere` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `filiere`
--

LOCK TABLES `filiere` WRITE;
/*!40000 ALTER TABLE `filiere` DISABLE KEYS */;
INSERT INTO `filiere` VALUES (1,'Génie Informatique'),(2,'Génie Mécanique'),(3,'Gestion');
/*!40000 ALTER TABLE `filiere` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matiere`
--

DROP TABLE IF EXISTS `matiere`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `matiere` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quota` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matiere`
--

LOCK TABLES `matiere` WRITE;
/*!40000 ALTER TABLE `matiere` DISABLE KEYS */;
INSERT INTO `matiere` VALUES (1,'Système d\'exploitation',28),(2,'Initiation au génie logiciel',28),(3,'Gestion des projets',30);
/*!40000 ALTER TABLE `matiere` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matiere_enseignant`
--

DROP TABLE IF EXISTS `matiere_enseignant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `matiere_enseignant` (
  `matiere_id` int(11) NOT NULL,
  `enseignant_id` int(11) NOT NULL,
  PRIMARY KEY (`matiere_id`,`enseignant_id`),
  KEY `IDX_536FA40FF46CD258` (`matiere_id`),
  KEY `IDX_536FA40FE455FCC0` (`enseignant_id`),
  CONSTRAINT `FK_536FA40FE455FCC0` FOREIGN KEY (`enseignant_id`) REFERENCES `enseignant` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_536FA40FF46CD258` FOREIGN KEY (`matiere_id`) REFERENCES `matiere` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matiere_enseignant`
--

LOCK TABLES `matiere_enseignant` WRITE;
/*!40000 ALTER TABLE `matiere_enseignant` DISABLE KEYS */;
INSERT INTO `matiere_enseignant` VALUES (1,3),(2,3),(3,1);
/*!40000 ALTER TABLE `matiere_enseignant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `niveau`
--

DROP TABLE IF EXISTS `niveau`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `niveau` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `niveau`
--

LOCK TABLES `niveau` WRITE;
/*!40000 ALTER TABLE `niveau` DISABLE KEYS */;
INSERT INTO `niveau` VALUES (1,'I'),(2,'II'),(3,'LICENCE'),(4,'MASTER I'),(5,'MASTER II');
/*!40000 ALTER TABLE `niveau` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `niveau_matiere`
--

DROP TABLE IF EXISTS `niveau_matiere`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `niveau_matiere` (
  `niveau_id` int(11) NOT NULL,
  `matiere_id` int(11) NOT NULL,
  PRIMARY KEY (`niveau_id`,`matiere_id`),
  KEY `IDX_F000ED3CB3E9C81` (`niveau_id`),
  KEY `IDX_F000ED3CF46CD258` (`matiere_id`),
  CONSTRAINT `FK_F000ED3CB3E9C81` FOREIGN KEY (`niveau_id`) REFERENCES `niveau` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_F000ED3CF46CD258` FOREIGN KEY (`matiere_id`) REFERENCES `matiere` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `niveau_matiere`
--

LOCK TABLES `niveau_matiere` WRITE;
/*!40000 ALTER TABLE `niveau_matiere` DISABLE KEYS */;
/*!40000 ALTER TABLE `niveau_matiere` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `progression`
--

DROP TABLE IF EXISTS `progression`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `progression` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `enseignants_id` int(11) NOT NULL,
  `matieres_id` int(11) NOT NULL,
  `seances_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `duree` int(11) NOT NULL,
  `number_printed` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D5B250737CF12A69` (`enseignants_id`),
  KEY `IDX_D5B2507382350831` (`matieres_id`),
  KEY `IDX_D5B2507310F09302` (`seances_id`),
  CONSTRAINT `FK_D5B2507310F09302` FOREIGN KEY (`seances_id`) REFERENCES `seance` (`id`),
  CONSTRAINT `FK_D5B250737CF12A69` FOREIGN KEY (`enseignants_id`) REFERENCES `enseignant` (`id`),
  CONSTRAINT `FK_D5B2507382350831` FOREIGN KEY (`matieres_id`) REFERENCES `matiere` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `progression`
--

LOCK TABLES `progression` WRITE;
/*!40000 ALTER TABLE `progression` DISABLE KEYS */;
INSERT INTO `progression` VALUES (1,3,1,3,'2021-04-07',4,0);
/*!40000 ALTER TABLE `progression` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seance`
--

DROP TABLE IF EXISTS `seance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seance`
--

LOCK TABLES `seance` WRITE;
/*!40000 ALTER TABLE `seance` DISABLE KEYS */;
INSERT INTO `seance` VALUES (1,'TD'),(2,'TP'),(3,'Cours magistraux'),(4,'TPE');
/*!40000 ALTER TABLE `seance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `specialite`
--

DROP TABLE IF EXISTS `specialite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `specialite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filieres_id` int(11) NOT NULL,
  `libelle` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E7D6FCC1A5DB2FE8` (`filieres_id`),
  CONSTRAINT `FK_E7D6FCC1A5DB2FE8` FOREIGN KEY (`filieres_id`) REFERENCES `filiere` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `specialite`
--

LOCK TABLES `specialite` WRITE;
/*!40000 ALTER TABLE `specialite` DISABLE KEYS */;
INSERT INTO `specialite` VALUES (1,1,'GL'),(2,3,'GSI'),(3,1,'RES'),(4,2,'MAVA');
/*!40000 ALTER TABLE `specialite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `specialite_matiere`
--

DROP TABLE IF EXISTS `specialite_matiere`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `specialite_matiere` (
  `specialite_id` int(11) NOT NULL,
  `matiere_id` int(11) NOT NULL,
  PRIMARY KEY (`specialite_id`,`matiere_id`),
  KEY `IDX_AF1D45CE2195E0F0` (`specialite_id`),
  KEY `IDX_AF1D45CEF46CD258` (`matiere_id`),
  CONSTRAINT `FK_AF1D45CE2195E0F0` FOREIGN KEY (`specialite_id`) REFERENCES `specialite` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_AF1D45CEF46CD258` FOREIGN KEY (`matiere_id`) REFERENCES `matiere` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `specialite_matiere`
--

LOCK TABLES `specialite_matiere` WRITE;
/*!40000 ALTER TABLE `specialite_matiere` DISABLE KEYS */;
/*!40000 ALTER TABLE `specialite_matiere` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `specialite_niveau`
--

DROP TABLE IF EXISTS `specialite_niveau`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `specialite_niveau` (
  `specialite_id` int(11) NOT NULL,
  `niveau_id` int(11) NOT NULL,
  PRIMARY KEY (`specialite_id`,`niveau_id`),
  KEY `IDX_F7CBAACD2195E0F0` (`specialite_id`),
  KEY `IDX_F7CBAACDB3E9C81` (`niveau_id`),
  CONSTRAINT `FK_F7CBAACD2195E0F0` FOREIGN KEY (`specialite_id`) REFERENCES `specialite` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_F7CBAACDB3E9C81` FOREIGN KEY (`niveau_id`) REFERENCES `niveau` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `specialite_niveau`
--

LOCK TABLES `specialite_niveau` WRITE;
/*!40000 ALTER TABLE `specialite_niveau` DISABLE KEYS */;
INSERT INTO `specialite_niveau` VALUES (1,1),(2,1),(3,1),(4,1);
/*!40000 ALTER TABLE `specialite_niveau` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'diane@gmail.com','diane','$2y$13$SpRAVlwS6j7po3Kk3OYA4ucrbudUJ1cUuvpi5dt97Cr1JQuPJEMui',0),(2,'daniella@gmail.com','daniella','$2y$13$NhfISrl4hm7w4zWiexhOV.juZGbPBo6Z2UQvt7sB2GcAZjUHOKzRK',0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-12 20:52:10
