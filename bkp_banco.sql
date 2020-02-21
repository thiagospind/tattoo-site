-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.7.26-log


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema `tattoo-site`
--

CREATE DATABASE IF NOT EXISTS `tattoo-site`;
USE `tattoo-site`;

--
-- Definition of table `solicitacao_orcamento`
--

DROP TABLE IF EXISTS `solicitacao_orcamento`;
CREATE TABLE `solicitacao_orcamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tamanho_tattoo` varchar(45) NOT NULL,
  `parte_corpo` varchar(100) NOT NULL,
  `outra_parte` varchar(255) DEFAULT NULL,
  `cor` varchar(45) NOT NULL,
  `descricao` text NOT NULL,
  `imagem_exemplo` varchar(255) DEFAULT NULL,
  `status` varchar(45) NOT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `observacao` varchar(255) DEFAULT NULL,
  `data_valor` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `solicitacao_orcamento`
--

/*!40000 ALTER TABLE `solicitacao_orcamento` DISABLE KEYS */;
INSERT INTO `solicitacao_orcamento` (`id`,`nome`,`telefone`,`email`,`tamanho_tattoo`,`parte_corpo`,`outra_parte`,`cor`,`descricao`,`imagem_exemplo`,`status`,`valor`,`observacao`,`data_valor`,`created_at`,`updated_at`) VALUES 
 (1,'thiago','thiago','thiago','thiago','thiago',NULL,'thiago','thiago','thiago','Novo',NULL,NULL,NULL,'2020-02-12 15:57:23','2020-02-12 15:57:23'),
 (2,'thiago','thiago','thiago','thiago','thiago',NULL,'thiago','thiago','thiago','Novo',NULL,NULL,NULL,'2020-02-12 16:06:49','2020-02-12 16:06:49'),
 (3,'thiago','24988127336','tspindola@gmail.com','15x7','Braço',NULL,'pb','teste teste teste',NULL,'Novo',NULL,NULL,NULL,'2020-02-12 16:12:14','2020-02-12 16:12:14'),
 (4,'thiago','24988127336','thiago@teste.com.br','9x9','Outra','bunda','colorido','teste','exemplos/9svxQ4pWyEkrESxUsS68hxdWEQb9G7rI6C0KTarT.png','Novo',NULL,NULL,NULL,'2020-02-20 14:10:21','2020-02-20 14:10:21');
/*!40000 ALTER TABLE `solicitacao_orcamento` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
