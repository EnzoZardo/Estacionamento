CREATE DATABASE  IF NOT EXISTS `estacionamento` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `estacionamento`;

--
-- Table structure for table `veiculos`
--

DROP TABLE IF EXISTS `veiculos`;

CREATE TABLE `veiculos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `placa` varchar(9) NOT NULL,
  `fabricante` varchar(45) NOT NULL,
  `modelo` varchar(45) NOT NULL,
  `cor` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `placa` (`placa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


--
-- Dumping data for table `veiculos`
--

LOCK TABLES `veiculos` WRITE;

INSERT INTO `veiculos` VALUES (1,'ZCS-9569','Mercedes-Benz','E-Class','Preto');

UNLOCK TABLES;

--
-- Table structure for table `entrada_saida`
--

DROP TABLE IF EXISTS `entrada_saida`;

CREATE TABLE `entrada_saida` (
  `id` int NOT NULL AUTO_INCREMENT,
  `veiculo` int NOT NULL,
  `hr_entrada` datetime NOT NULL,
  `hr_saida` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_entrada_saida_1_idx` (`veiculo`),
  CONSTRAINT `fk_entrada_saida_1` FOREIGN KEY (`veiculo`) REFERENCES `veiculos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


--
-- Dumping data for table `entrada_saida`
--

LOCK TABLES `entrada_saida` WRITE;

UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(6) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;

INSERT INTO `usuarios` VALUES (1,'teste','1234');

UNLOCK TABLES;