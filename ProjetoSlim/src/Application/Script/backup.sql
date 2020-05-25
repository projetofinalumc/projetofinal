-- MySQL dump 10.13  Distrib 8.0.20, for Linux (x86_64)
--
-- Host: localhost    Database: bancoteste123
-- ------------------------------------------------------
-- Server version	8.0.20-0ubuntu0.19.10.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Categoria`
--

DROP TABLE IF EXISTS `Categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Categoria` (
  `codcategoria` int NOT NULL AUTO_INCREMENT,
  `nomeCategoria` varchar(50) NOT NULL,
  PRIMARY KEY (`codcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Categoria`
--

LOCK TABLES `Categoria` WRITE;
/*!40000 ALTER TABLE `Categoria` DISABLE KEYS */;
INSERT INTO `Categoria` VALUES (1,'naruto'),(3,'Vaso'),(9,'www'),(10,'sdas'),(11,'sdssdas'),(12,'TACHEGANDO'),(13,'TACHEGSANDO'),(14,'TACHsssEGSANDO'),(17,'sdwasdw');
/*!40000 ALTER TABLE `Categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Endereco`
--

DROP TABLE IF EXISTS `Endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Endereco` (
  `id_locatario` int DEFAULT NULL,
  `logradouro` varchar(100) NOT NULL,
  `cep` varchar(100) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `numero` int NOT NULL,
  `Bairro` varchar(255) DEFAULT NULL,
  `id_endereco` int NOT NULL AUTO_INCREMENT,
  `Cidade` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_endereco`),
  KEY `fk_Locatario` (`id_locatario`),
  CONSTRAINT `fk_Locatario` FOREIGN KEY (`id_locatario`) REFERENCES `Locatario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Endereco`
--

LOCK TABLES `Endereco` WRITE;
/*!40000 ALTER TABLE `Endereco` DISABLE KEYS */;
INSERT INTO `Endereco` VALUES (30,'LograEditado','888','mg',3222,'limeiras',4,'Mogi das Cruzes'),(22,'LogradouroEditado','1067','BA',222,'flores',5,NULL),(22,'LogradouroTeste','988','mg',12,'arvores',7,NULL),(30,'SegundoEndereco','8891','SP',222,'limeira',8,'Mogi das Cruzes'),(54,'Estrada do Itapeti 100','8771910','SP',11122,'Parque Residencial Itapeti',11,'Mogi das Cruzes'),(55,'Rua José Ayres','13065630','SP',11122,'Parque Via Norte',12,'Campinas'),(56,'Estrada do Itapeti 100','8771910','SP',22,'Parque Residencial Itapeti',13,'Mogi das Cruzes');
/*!40000 ALTER TABLE `Endereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Locatario`
--

DROP TABLE IF EXISTS `Locatario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Locatario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cpf` int NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senhaloc` varchar(100) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Locatario`
--

LOCK TABLES `Locatario` WRITE;
/*!40000 ALTER TABLE `Locatario` DISABLE KEYS */;
INSERT INTO `Locatario` VALUES (20,323,'Elton','pescador@sdsda','12345ss',NULL),(21,2321,'dsad','dsadasda@dsada','',NULL),(22,0,'elton','aaaa@eeee','123',NULL),(23,2321,'dsad','dsadasda@dsada','',NULL),(24,2321,'dsad','dsadasda@dsada','',NULL),(27,23213212,'Teste2 ','dsadsds@dasdad','',NULL),(30,4152,'Felipe','felipe@gmail.com','123456as',NULL),(41,8888,'Oltiny','sdadsass@www','',NULL),(42,8888,'Oltiny','sdadsass@www','',NULL),(43,8888,'Oltiny','sdadsass@www','dsdsds',NULL),(44,8888,'Oltiny','sdadsass@www','',NULL),(45,23131,'Usuario Vieira','c1a0a4e98c@emailmonkey.club','123456as',NULL),(46,23211,'Teste Boladao','adcf04ebf6@emailmonkey.club','123',NULL),(47,232112,'Teste Boladao','adcf04ebf6@emailmonkey.club','f3d2f0f639@emailmonkey.club',NULL),(48,23211211,'Testessss Boladao','adcf04ebf6@emailmonkey.club','3333',NULL),(49,23211211,'adsa Boladao','f3d2f0f639@emailmonkey.club','dasda',NULL),(50,11122,'adsa Boladao','0b10edf6f8@emailmonkey.club','321',NULL),(51,11122,'dddddddd ddddd','0cdd4ec8de@emailmonkey.club','11111',NULL),(52,11122,'ddddddddsss ddddd','0cdd4ec8de@emailmonkey.club','',NULL),(53,11122,'ttttttt ddddd','0cdd4ec8de@emailmonkey.club','',NULL),(54,11122,'wwwwww ddddd','0cdd4ec8de@emailmonkey.club','ddddddd',NULL),(55,7777,'Primeiro Users','d70b1b40d4@emailmonkey.club','123',NULL),(56,22223,'loca locs','278dfc198c@emailmonkey.club','123',NULL);
/*!40000 ALTER TABLE `Locatario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Pedido`
--

DROP TABLE IF EXISTS `Pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Pedido` (
  `idPedido` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `dataRetirada` date NOT NULL,
  `valorTotal` double NOT NULL,
  `dataDevolucao` date NOT NULL,
  `dataPedido` date NOT NULL,
  `id_endereco` int NOT NULL,
  `idLocatario` int NOT NULL,
  `Status` varchar(255) DEFAULT 'ESPERA',
  PRIMARY KEY (`idPedido`),
  KEY `fk_endereco` (`id_endereco`),
  KEY `FKlocatario` (`idLocatario`),
  CONSTRAINT `fk_endereco` FOREIGN KEY (`id_endereco`) REFERENCES `Endereco` (`id_endereco`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FKlocatario` FOREIGN KEY (`idLocatario`) REFERENCES `Locatario` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Pedido`
--

LOCK TABLES `Pedido` WRITE;
/*!40000 ALTER TABLE `Pedido` DISABLE KEYS */;
INSERT INTO `Pedido` VALUES (0000000001,'2015-12-18',1000,'2015-12-19','2015-12-17',4,30,'ESPERA'),(0000000002,'2016-01-20',100,'2016-02-20','2015-12-18',4,30,'ESPERA'),(0000000003,'2016-01-20',100,'2016-02-20','2015-12-18',4,30,'ESPERA'),(0000000004,'2015-12-18',1000,'2015-12-19','2015-05-17',4,30,'ESPERA'),(0000000005,'2020-05-20',13,'2020-05-22','2020-05-21',4,30,'ESPERA'),(0000000006,'2020-05-20',13,'2020-05-22','2020-05-21',4,30,'ESPERA'),(0000000007,'2020-05-20',13,'2020-05-22','2020-05-21',4,30,'ESPERA'),(0000000008,'2020-05-20',13,'2020-05-22','2020-05-21',4,30,'ESPERA'),(0000000009,'2020-05-20',13,'2020-05-22','2020-05-21',4,30,'ESPERA'),(0000000010,'2015-12-18',1000,'2015-12-19','2015-05-17',4,30,'ESPERA'),(0000000011,'2020-05-20',13,'2020-05-22','2020-05-21',4,30,'ESPERA'),(0000000012,'2015-12-22',22,'2015-12-23','2015-12-19',4,30,'ESPERA'),(0000000013,'2020-05-20',13,'2020-05-22','2020-05-21',4,30,'ESPERA'),(0000000014,'2020-05-20',13,'2020-05-22','2020-05-21',4,30,'ESPERA'),(0000000015,'2020-05-20',13,'2020-05-22','2020-05-21',4,30,'ESPERA'),(0000000016,'2015-12-22',22,'2015-12-23','2015-12-19',4,30,'ESPERA'),(0000000017,'2020-05-20',13,'2020-05-22','2020-05-21',4,30,'ESPERA'),(0000000018,'2020-05-20',13,'2020-05-22','2020-05-21',4,30,'ESPERA'),(0000000019,'2020-05-20',13,'2020-05-22','2020-05-21',4,30,'ESPERA'),(0000000020,'2020-05-22',13,'2020-05-22','2020-05-21',4,30,'CANCELADO'),(0000000021,'2020-05-22',13,'2020-05-22','2020-05-21',4,30,'CANCELADO'),(0000000022,'2020-05-22',13,'2020-05-22','2020-05-21',4,30,'ESPERA'),(0000000023,'2020-04-27',43,'2020-05-22','2020-05-21',8,30,'CANCELADO'),(0000000024,'2020-05-26',66,'2020-05-23','2020-05-22',8,30,'CANCELADO'),(0000000025,'2020-05-29',35,'2020-05-23','2020-05-22',4,30,'ESPERA'),(0000000026,'2020-05-25',43,'2020-05-23','2020-05-22',8,30,'ESPERA'),(0000000027,'2020-05-28',45,'2020-05-23','2020-05-22',4,30,'ESPERA'),(0000000028,'2020-05-27',96,'2020-05-23','2020-05-22',4,30,'ESPERA'),(0000000029,'2020-06-01',9,'2020-05-23','2020-05-22',8,30,'ESPERA'),(0000000030,'2020-05-20',6,'2020-05-23','2020-05-22',8,30,'ESPERA'),(0000000031,'2020-05-28',6,'2020-05-23','2020-05-22',8,30,'ESPERA'),(0000000032,'2020-05-26',25,'2020-05-23','2020-05-22',8,30,'ESPERA'),(0000000033,'2020-05-25',12,'2020-05-23','2020-05-22',8,30,'ESPERA'),(0000000034,'2020-05-27',33,'2020-05-23','2020-05-22',4,30,'ESPERA'),(0000000035,'2020-05-26',46,'2020-05-23','2020-05-22',8,30,'ESPERA'),(0000000036,'2020-05-27',10,'2020-05-28','2020-05-22',4,30,'ESPERA'),(0000000037,'2020-05-28',14,'2020-05-24','2020-05-23',8,30,'FINALIZADO'),(0000000038,'2020-05-27',1013,'2020-05-24','2020-05-23',8,30,'FINALIZADO'),(0000000039,'2020-05-23',57,'2020-05-25','2020-05-24',8,30,'ESPERA'),(0000000040,'2020-05-23',14,'2020-05-24','2020-05-24',8,30,'FINALIZADO'),(0000000041,'2020-05-23',25,'2020-05-24','2020-05-24',8,30,'FINALIZADO'),(0000000042,'2020-05-23',34,'2020-05-24','2020-05-24',8,30,'FINALIZADO'),(0000000043,'2020-05-24',1,'2020-05-25','2020-05-24',4,30,'FINALIZADO'),(0000000044,'2020-05-25',9,'2020-05-26','2020-05-24',12,55,'ESPERA'),(0000000045,'2020-05-28',1,'2020-05-29','2020-05-24',12,55,'ESPERA'),(0000000046,'2020-05-27',7,'2020-05-28','2020-05-24',12,55,'ESPERA'),(0000000047,'2020-05-27',13,'2020-05-28','2020-05-24',12,55,'ESPERA'),(0000000048,'2020-05-27',2,'2020-05-28','2020-05-24',12,55,'ESPERA'),(0000000049,'2020-05-23',11,'2020-05-24','2020-05-24',4,30,'FINALIZADO'),(0000000050,'2020-05-23',104,'2020-05-24','2020-05-24',8,30,'CANCELADO');
/*!40000 ALTER TABLE `Pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Produto`
--

DROP TABLE IF EXISTS `Produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Produto` (
  `idProduto` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `valdiaria` decimal(10,0) DEFAULT NULL,
  `dimensao` varchar(50) DEFAULT NULL,
  `quantidade` int DEFAULT NULL,
  `precoPerda` double DEFAULT NULL,
  `categoria` int DEFAULT NULL,
  `imgNome` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`idProduto`),
  KEY `fk_categoria` (`categoria`),
  CONSTRAINT `fk_categoria` FOREIGN KEY (`categoria`) REFERENCES `Categoria` (`codcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Produto`
--

LOCK TABLES `Produto` WRITE;
/*!40000 ALTER TABLE `Produto` DISABLE KEYS */;
INSERT INTO `Produto` VALUES (28,'Produto1zzzz','Modelo02',2,'2x22',2,2,13,NULL),(29,'Produto1','Modelo1',1,'2x2',1,1,1,NULL),(31,'Produto3','Modelo3',3,'2x2',3,3,1,NULL),(32,'Produto4','Modelo4',4,'2x2',4,4,1,NULL),(33,'Produto5','Modelo5',5,'2x2',5,5,1,NULL),(34,'Produto6','Modelo6',6,'2x2',6,6,1,NULL),(35,'Produto7','Modelo7',7,'2x2',7,7,1,NULL),(36,'Produto8','Modelo8',8,'2x2',8,8,1,NULL),(37,'Produto9','Modelo9',9,'2x2',9,9,1,NULL),(38,'Produto10','Modelo10',10,'2x2',10,10,1,NULL),(39,'Produto11','Modelo11',11,'2x2',11,11,1,NULL),(40,'Produto12','Modelo12',12,'2x2',12,12,1,NULL),(41,'Produto13','Modelo13',13,'2x2',13,13,1,NULL),(42,'Produto14','Modelo14',14,'2x2',14,14,1,NULL),(43,'Produto15','Modelo15',15,'2x2',15,15,1,NULL),(44,'Produto16','Modelo16',16,'2x2',16,16,1,NULL),(45,'Produto17','Modelo17',17,'2x2',17,17,1,NULL),(46,'Produto18','Modelo18',18,'2x2',18,18,1,NULL),(47,'Produto19','Modelo19',19,'2x2',19,19,1,NULL),(48,'Produto20','Modelo20',20,'2x2',20,20,1,NULL),(49,'Produto21','Modelo21',21,'2x2',21,21,1,NULL),(51,'Produto23','Modelo23',23,'2x2',23,23,1,NULL),(52,'Produto24','Modelo24',24,'2x2',24,24,1,NULL),(53,'Produto25','Modelo25',25,'2x2',25,25,1,NULL),(54,'Produto26','Modelo26',26,'2x2',26,26,1,NULL),(55,'Produto27','Modelo27',27,'2x2',27,27,1,NULL),(57,'Produto29','Modelo29',29,'2x2',29,29,1,NULL),(58,'Produto30','Modelo30',30,'2x2',30,30,1,NULL),(59,'Produto31','Modelo31',31,'2x2',31,31,1,NULL),(60,'Produto32','Modelo32',32,'2x2',32,32,1,NULL),(61,'Produto33','Modelo33',33,'2x2',33,33,1,NULL),(62,'Produto34','Modelo34',34,'2x2',34,34,1,NULL),(63,'Produto35','Modelo35',35,'2x2',35,35,1,NULL),(64,'Produto36','Modelo36',36,'2x2',36,36,1,NULL),(65,'Produto37','Modelo37',37,'2x2',37,37,1,NULL),(66,'Produto38','Modelo38',38,'2x2',38,38,1,NULL),(67,'Produto39','Modelo39',39,'2x2',39,39,1,NULL),(68,'Produto40','Modelo40',40,'2x2',40,40,1,NULL),(69,'Produto41','Modelo41',41,'2x2',41,41,1,NULL),(70,'Produto42','Modelo42',42,'2x2',42,42,1,NULL),(71,'Produto43','Modelo43',43,'2x2',43,43,1,NULL),(72,'Produto44','Modelo44',44,'2x2',44,44,1,NULL),(73,'Produto45','Modelo45',45,'2x2',45,45,1,NULL),(74,'Produto46','Modelo46',46,'2x2',46,46,1,NULL),(75,'Produto47','Modelo47',47,'2x2',47,47,1,NULL),(76,'Produto48','Modelo48',48,'2x2',48,48,1,NULL),(77,'Produto49','Modelo49',49,'2x2',49,49,1,NULL),(78,'Produto50','Modelo50',50,'2x2',50,50,1,NULL),(79,'Test1','TEst1',10,'20x20',20,20,13,NULL),(80,'Test1','TEst1',10,'20x20',20,20,13,NULL),(81,'Test1','TEst1',10,'20x20',20,20,13,NULL),(82,'dsad','dsada',12,'10',12,12,9,NULL),(83,'DSDSA','WD',10,'100X11',121,121,17,NULL),(84,'TesteProdutoAdicionar','ModeloTeste',0,'12x12',0,120,NULL,NULL),(85,'TesteProdutoAdicionar','ModeloTeste',12,'12x12',0,120,NULL,NULL),(86,'TesteProdutoAdicionar','ModeloTeste',12,'12x12',12,120,NULL,NULL),(89,'PrimeiroProduto','Vamo la',1000,'12',12,120,NULL,NULL),(90,'PrimeiroProduto','Vamo la',1000,'12',12,120,NULL,'1590269180.png'),(91,'Prot','dsda',23,'11',123,22,NULL,NULL),(92,'Prot','dsda',23,'11',123,22,NULL,NULL),(93,'sadasda','wsdweq',12,'33',11,33,NULL,'1590272194.png'),(94,'dasdas','fqfq',22,'12',222,21,NULL,'1590272974.png'),(95,'ssswwww','www',111,'111',22,111,NULL,'1590273067.png'),(97,'sdasdasda','2223234',2,'2',2,2,NULL,'1590277726.png');
/*!40000 ALTER TABLE `Produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `login` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES ('admin123','123');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `itemPedido`
--

DROP TABLE IF EXISTS `itemPedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `itemPedido` (
  `fk_Pedido` int(10) unsigned zerofill NOT NULL,
  `fk_Produto` int DEFAULT NULL,
  `quantidade` int DEFAULT NULL,
  `valorUnitario` double DEFAULT NULL,
  KEY `fk_Pedido` (`fk_Pedido`),
  KEY `fk_Produto` (`fk_Produto`),
  CONSTRAINT `itemPedido_ibfk_1` FOREIGN KEY (`fk_Pedido`) REFERENCES `Pedido` (`idPedido`),
  CONSTRAINT `itemPedido_ibfk_2` FOREIGN KEY (`fk_Produto`) REFERENCES `Produto` (`idProduto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `itemPedido`
--

LOCK TABLES `itemPedido` WRITE;
/*!40000 ALTER TABLE `itemPedido` DISABLE KEYS */;
INSERT INTO `itemPedido` VALUES (0000000021,28,2,10),(0000000020,33,5,5),(0000000020,34,6,6),(0000000023,29,1,1),(0000000023,31,3,3),(0000000023,33,5,5),(0000000023,37,9,9),(0000000023,39,11,11),(0000000023,42,14,14),(0000000024,29,6,1),(0000000024,32,5,4),(0000000024,36,5,8),(0000000025,28,2,2),(0000000025,33,3,5),(0000000025,36,2,8),(0000000026,31,4,3),(0000000026,42,1,14),(0000000026,45,1,17),(0000000027,31,5,3),(0000000027,34,5,6),(0000000028,37,4,9),(0000000028,48,3,20),(0000000029,29,3,1),(0000000029,34,1,6),(0000000030,34,1,6),(0000000031,34,1,6),(0000000032,29,1,1),(0000000032,34,4,6),(0000000033,29,1,1),(0000000033,33,1,5),(0000000033,34,1,6),(0000000034,33,1,5),(0000000034,35,4,7),(0000000035,28,5,2),(0000000035,31,2,3),(0000000035,33,6,5),(0000000036,29,1,1),(0000000036,31,1,3),(0000000036,34,1,6),(0000000037,28,2,2),(0000000037,33,2,5),(0000000038,29,1,1),(0000000038,90,1,1000),(0000000038,93,1,12),(0000000039,31,1,3),(0000000039,34,1,6),(0000000039,93,4,12),(0000000040,29,1,1),(0000000040,34,1,6),(0000000040,35,1,7),(0000000041,29,1,1),(0000000041,93,2,12),(0000000042,93,1,12),(0000000042,94,1,22),(0000000043,29,1,1),(0000000044,32,1,4),(0000000044,33,1,5),(0000000045,29,1,1),(0000000046,31,1,3),(0000000046,32,1,4),(0000000047,34,1,6),(0000000047,35,1,7),(0000000048,28,1,2),(0000000049,33,1,5),(0000000049,34,1,6),(0000000050,39,4,11),(0000000050,43,4,15);
/*!40000 ALTER TABLE `itemPedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Locador','123');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-25 10:24:33
