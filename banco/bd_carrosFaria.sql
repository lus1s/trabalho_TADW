-- Adminer 4.8.1 MySQL 5.5.5-10.5.25-MariaDB-ubu2004 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;

DROP DATABASE IF EXISTS `bd_veiculosFaria`;
CREATE DATABASE `bd_veiculosFaria` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci */;
USE `bd_veiculosFaria`;

DROP TABLE IF EXISTS `tb_aluguel`;
CREATE TABLE `tb_aluguel` (
  `id_aluguel` int(11) NOT NULL AUTO_INCREMENT,
  `data_aluguel` date NOT NULL,
  `tb_funcionario_id_funcionario` int(11) NOT NULL,
  `tb_cliente_id_cliente` int(11) NOT NULL,
  PRIMARY KEY (`id_aluguel`),
  UNIQUE KEY `id_aluguel_UNIQUE` (`id_aluguel`),
  KEY `fk_tb_aluguel_tb_funcionario1_idx` (`tb_funcionario_id_funcionario`),
  KEY `fk_tb_aluguel_tb_cliente1_idx` (`tb_cliente_id_cliente`),
  CONSTRAINT `fk_tb_aluguel_tb_cliente1` FOREIGN KEY (`tb_cliente_id_cliente`) REFERENCES `tb_cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_aluguel_tb_funcionario1` FOREIGN KEY (`tb_funcionario_id_funcionario`) REFERENCES `tb_funcionario` (`id_funcionario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


DROP TABLE IF EXISTS `tb_cliente`;
CREATE TABLE `tb_cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome_cliente` varchar(45) NOT NULL,
  `tipo_cliente` enum('e','p') NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


DROP TABLE IF EXISTS `tb_devolucao`;
CREATE TABLE `tb_devolucao` (
  `id_devolucao` int(11) NOT NULL AUTO_INCREMENT,
  `data_devolucao` date NOT NULL,
  `km_rodados` varchar(45) NOT NULL,
  `valor_cobrado` varchar(45) NOT NULL,
  `tb_aluguel_id_aluguel` int(11) NOT NULL,
  PRIMARY KEY (`id_devolucao`,`tb_aluguel_id_aluguel`),
  KEY `fk_tb_devolucao_tb_aluguel1_idx` (`tb_aluguel_id_aluguel`),
  CONSTRAINT `fk_tb_devolucao_tb_aluguel1` FOREIGN KEY (`tb_aluguel_id_aluguel`) REFERENCES `tb_aluguel` (`id_aluguel`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


DROP TABLE IF EXISTS `tb_empresa`;
CREATE TABLE `tb_empresa` (
  `id_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `nome_empresa` varchar(45) NOT NULL,
  `cnpj` varchar(45) NOT NULL,
  `func_responsavel` varchar(45) NOT NULL,
  `tb_cliente_id_cliente` int(11) NOT NULL,
  PRIMARY KEY (`id_empresa`,`tb_cliente_id_cliente`),
  KEY `fk_tb_empresa_tb_cliente1_idx` (`tb_cliente_id_cliente`),
  CONSTRAINT `fk_tb_empresa_tb_cliente1` FOREIGN KEY (`tb_cliente_id_cliente`) REFERENCES `tb_cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


DROP TABLE IF EXISTS `tb_enderecos`;
CREATE TABLE `tb_enderecos` (
  `id_enderecos` int(11) NOT NULL AUTO_INCREMENT,
  `endereco` varchar(45) NOT NULL,
  `tb_cliente_id_cliente` int(11) NOT NULL,
  PRIMARY KEY (`id_enderecos`,`tb_cliente_id_cliente`),
  KEY `fk_tb_enderecos_tb_cliente1_idx` (`tb_cliente_id_cliente`),
  CONSTRAINT `fk_tb_enderecos_tb_cliente1` FOREIGN KEY (`tb_cliente_id_cliente`) REFERENCES `tb_cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


DROP TABLE IF EXISTS `tb_funcionario`;
CREATE TABLE `tb_funcionario` (
  `id_funcionario` int(11) NOT NULL AUTO_INCREMENT,
  `nome_funcionario` varchar(45) NOT NULL,
  `cpf_funcionario` varchar(45) NOT NULL,
  `senha_funcionario` varchar(45) NOT NULL,
  PRIMARY KEY (`id_funcionario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


DROP TABLE IF EXISTS `tb_manutencao`;
CREATE TABLE `tb_manutencao` (
  `id_manutencao` int(11) NOT NULL AUTO_INCREMENT,
  `data_ida` date NOT NULL,
  `data_prev_volta` date NOT NULL,
  `tb_veiculo_id_veiculo` int(11) NOT NULL,
  PRIMARY KEY (`id_manutencao`,`tb_veiculo_id_veiculo`),
  KEY `fk_tb_manutencao_tb_veiculo1_idx` (`tb_veiculo_id_veiculo`),
  CONSTRAINT `fk_tb_manutencao_tb_veiculo1` FOREIGN KEY (`tb_veiculo_id_veiculo`) REFERENCES `tb_veiculo` (`id_veiculo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


DROP TABLE IF EXISTS `tb_pessoa`;
CREATE TABLE `tb_pessoa` (
  `id_pessoa` int(11) NOT NULL AUTO_INCREMENT,
  `cpf` varchar(45) NOT NULL,
  `cnh` varchar(45) NOT NULL,
  `tb_cliente_id_cliente` int(11) NOT NULL,
  PRIMARY KEY (`id_pessoa`,`tb_cliente_id_cliente`),
  UNIQUE KEY `cpf_UNIQUE` (`cpf`),
  UNIQUE KEY `cnh_UNIQUE` (`cnh`),
  KEY `fk_tb_pessoa_tb_cliente_idx` (`tb_cliente_id_cliente`),
  CONSTRAINT `fk_tb_pessoa_tb_cliente` FOREIGN KEY (`tb_cliente_id_cliente`) REFERENCES `tb_cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


DROP TABLE IF EXISTS `tb_veiculo`;
CREATE TABLE `tb_veiculo` (
  `id_veiculo` int(11) NOT NULL AUTO_INCREMENT,
  `nome_veiculo` varchar(45) NOT NULL,
  `ano_veiculo` varchar(45) NOT NULL,
  `marca_veiculo` varchar(45) NOT NULL,
  `tipo_veiculo` enum('c','m') NOT NULL,
  `cor_veiculo` varchar(45) NOT NULL,
  `placa_veiculo` varchar(45) NOT NULL,
  `estado_veiculo` enum('a','d') NOT NULL,
  `motor_veiculo` varchar(45) NOT NULL,
  `km_rodados` varchar(45) NOT NULL,
  `descricao_veiculo` varchar(45) NOT NULL,
  `qtd_portas` enum('0','2','4') NOT NULL,
  `arcondicionado_veiculo` enum('s','n') NOT NULL,
  `portamala_veiculo` enum('s','n') NOT NULL,
  `tamanho_veiculo` enum('p','m','g') NOT NULL,
  `cambio_veiculo` enum('m','a') NOT NULL,
  `npassageiro_veiculo` enum('2','4','5','6','7') NOT NULL,
  PRIMARY KEY (`id_veiculo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


DROP TABLE IF EXISTS `tb_veiculo_aluguel`;
CREATE TABLE `tb_veiculo_aluguel` (
  `tb_veiculo_id_veiculo` int(11) NOT NULL,
  `tb_aluguel_id_aluguel` int(11) NOT NULL,
  PRIMARY KEY (`tb_veiculo_id_veiculo`,`tb_aluguel_id_aluguel`),
  KEY `fk_tb_veiculo_has_tb_aluguel_tb_aluguel1_idx` (`tb_aluguel_id_aluguel`),
  KEY `fk_tb_veiculo_has_tb_aluguel_tb_veiculo1_idx` (`tb_veiculo_id_veiculo`),
  CONSTRAINT `fk_tb_veiculo_has_tb_aluguel_tb_aluguel1` FOREIGN KEY (`tb_aluguel_id_aluguel`) REFERENCES `tb_aluguel` (`id_aluguel`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_veiculo_has_tb_aluguel_tb_veiculo1` FOREIGN KEY (`tb_veiculo_id_veiculo`) REFERENCES `tb_veiculo` (`id_veiculo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


-- 2024-07-12 19:28:58
