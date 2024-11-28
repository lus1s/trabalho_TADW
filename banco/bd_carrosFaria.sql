-- Adminer 4.8.1 MySQL 5.5.5-10.5.25-MariaDB-ubu2004 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `bd_veiculosFaria`;
CREATE DATABASE `bd_veiculosFaria` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci */;
USE `bd_veiculosFaria`;

DROP TABLE IF EXISTS `tb_aluguel`;
CREATE TABLE `tb_aluguel` (
  `id_aluguel` int(11) NOT NULL AUTO_INCREMENT,
  `data_aluguel` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tb_funcionario_id_funcionario` int(11) NOT NULL,
  `tb_cliente_id_cliente` int(11) NOT NULL,
  PRIMARY KEY (`id_aluguel`),
  UNIQUE KEY `id_aluguel_UNIQUE` (`id_aluguel`),
  KEY `fk_tb_aluguel_tb_funcionario1_idx` (`tb_funcionario_id_funcionario`),
  KEY `fk_tb_aluguel_tb_cliente1_idx` (`tb_cliente_id_cliente`),
  CONSTRAINT `fk_tb_aluguel_tb_cliente1` FOREIGN KEY (`tb_cliente_id_cliente`) REFERENCES `tb_cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_tb_aluguel_tb_funcionario1` FOREIGN KEY (`tb_funcionario_id_funcionario`) REFERENCES `tb_funcionario` (`id_funcionario`) ON DELETE CASCADE ON UPDATE CASCADE
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
  `data_devolucao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `valor_cobrado` decimal(10,2) NOT NULL,
  `forma_pagamento` enum('1','2','3') NOT NULL,
  `tb_aluguel_id_aluguel` int(11) NOT NULL,
  `tb_funcionario_id_funcionario` int(11) NOT NULL,
  PRIMARY KEY (`id_devolucao`,`tb_aluguel_id_aluguel`),
  KEY `fk_tb_devolucao_tb_aluguel1_idx` (`tb_aluguel_id_aluguel`),
  KEY `tb_funcionario_id_funcionario` (`tb_funcionario_id_funcionario`),
  CONSTRAINT `fk_tb_devolucao_tb_aluguel1` FOREIGN KEY (`tb_aluguel_id_aluguel`) REFERENCES `tb_aluguel` (`id_aluguel`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_devolucao_ibfk_1` FOREIGN KEY (`tb_funcionario_id_funcionario`) REFERENCES `tb_funcionario` (`id_funcionario`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


DROP TABLE IF EXISTS `tb_empresa`;
CREATE TABLE `tb_empresa` (
  `id_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `cnpj` varchar(45) NOT NULL,
  `func_responsavel` varchar(45) NOT NULL,
  `tb_cliente_id_cliente` int(11) NOT NULL,
  PRIMARY KEY (`id_empresa`,`tb_cliente_id_cliente`),
  KEY `fk_tb_empresa_tb_cliente1_idx` (`tb_cliente_id_cliente`),
  CONSTRAINT `fk_tb_empresa_tb_cliente1` FOREIGN KEY (`tb_cliente_id_cliente`) REFERENCES `tb_cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


DROP TABLE IF EXISTS `tb_enderecos`;
CREATE TABLE `tb_enderecos` (
  `id_enderecos` int(11) NOT NULL AUTO_INCREMENT,
  `endereco` varchar(45) NOT NULL,
  `tb_cliente_id_cliente` int(11) NOT NULL,
  PRIMARY KEY (`id_enderecos`,`tb_cliente_id_cliente`),
  KEY `fk_tb_enderecos_tb_cliente1_idx` (`tb_cliente_id_cliente`),
  CONSTRAINT `fk_tb_enderecos_tb_cliente1` FOREIGN KEY (`tb_cliente_id_cliente`) REFERENCES `tb_cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


DROP TABLE IF EXISTS `tb_funcionario`;
CREATE TABLE `tb_funcionario` (
  `id_funcionario` int(11) NOT NULL AUTO_INCREMENT,
  `nome_funcionario` varchar(45) NOT NULL,
  `cpf_funcionario` varchar(45) NOT NULL,
  `senha_funcionario` varchar(45) NOT NULL,
  PRIMARY KEY (`id_funcionario`)
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
  CONSTRAINT `fk_tb_pessoa_tb_cliente` FOREIGN KEY (`tb_cliente_id_cliente`) REFERENCES `tb_cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


DROP TABLE IF EXISTS `tb_veiculo`;
CREATE TABLE `tb_veiculo` (
  `id_veiculo` int(11) NOT NULL AUTO_INCREMENT,
  `nome_veiculo` varchar(45) NOT NULL,
  `ano_veiculo` varchar(45) NOT NULL,
  `marca_veiculo` varchar(45) NOT NULL,
  `tipo_veiculo` enum('1','2') NOT NULL,
  `cor_veiculo` varchar(45) NOT NULL,
  `placa_veiculo` varchar(45) NOT NULL,
  `estado_veiculo` enum('1','2') NOT NULL,
  `motor_veiculo` varchar(45) NOT NULL,
  `km_rodados` varchar(45) NOT NULL,
  `descricao_veiculo` varchar(45) NOT NULL,
  `qtd_portas` varchar(1) NOT NULL,
  `arcondicionado_veiculo` enum('1','2') NOT NULL,
  `portamala_veiculo` enum('1','2') NOT NULL,
  `tamanho_veiculo` enum('1','2','3') NOT NULL,
  `cambio_veiculo` enum('1','2') NOT NULL,
  PRIMARY KEY (`id_veiculo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


DROP TABLE IF EXISTS `tb_veiculo_aluguel`;
CREATE TABLE `tb_veiculo_aluguel` (
  `tb_veiculo_id_veiculo` int(11) NOT NULL,
  `tb_aluguel_id_aluguel` int(11) NOT NULL,
  `km_incial` int(11) NOT NULL,
  `km_final` int(11) NOT NULL,
  KEY `fk_tb_veiculo_has_tb_aluguel_tb_aluguel1_idx` (`tb_aluguel_id_aluguel`),
  KEY `fk_tb_veiculo_has_tb_aluguel_tb_veiculo1_idx` (`tb_veiculo_id_veiculo`),
  CONSTRAINT `fk_tb_veiculo_has_tb_aluguel_tb_aluguel1` FOREIGN KEY (`tb_aluguel_id_aluguel`) REFERENCES `tb_aluguel` (`id_aluguel`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_tb_veiculo_has_tb_aluguel_tb_veiculo1` FOREIGN KEY (`tb_veiculo_id_veiculo`) REFERENCES `tb_veiculo` (`id_veiculo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


-- 2024-09-25 17:58:56


-- 2024-07-12 19:28:58

-- INSERÇÃO DOS DADOS
-- Inserindo dados na tabela tb_cliente
INSERT INTO `tb_cliente` (`id_cliente`, `nome_cliente`, `tipo_cliente`) VALUES
(1, 'João Silva', 'p'),
(2, 'Maria Oliveira', 'p'),
(3, 'Empresa ABC', 'e'),
(4, 'Pedro Santos', 'p'),
(5, 'Empresa XYZ', 'e'),
(6, 'Lucas Mendes', 'p'),
(7, 'Empresa QWE', 'e'),
(8, 'Ana Clara', 'p'),
(9, 'Empresa RTY', 'e'),
(10, 'Carlos Souza', 'p'),
(11, 'José Almeida', 'p'),
(12, 'Empresa UIO', 'e'),
(13, 'Fernanda Lima', 'p'),
(14, 'Roberto Pinto', 'p'),
(15, 'Empresa PAS', 'e'),
(16, 'Cláudia Silva', 'p'),
(17, 'Empresa LKO', 'e'),
(18, 'Ricardo Pereira', 'p'),
(19, 'Sofia Costa', 'p'),
(20, 'Empresa MNB', 'e');

-- Inserindo dados na tabela tb_empresa
INSERT INTO `tb_empresa` (`id_empresa`, `cnpj`, `func_responsavel`, `tb_cliente_id_cliente`) VALUES
(1, '12.345.678/0001-99', 'Marcos Lima', 3),
(2, '98.765.432/0001-88', 'Fernanda Souza', 5),
(3, '11.111.111/0001-11', 'Lucas Martins', 7),
(4, '22.222.222/0001-22', 'Ana Paula', 9),
(5, '33.333.333/0001-33', 'Ricardo Mendes', 12),
(6, '44.444.444/0001-44', 'Cláudia Silva', 15),
(7, '55.555.555/0001-55', 'Daniel Borges', 17),
(8, '66.666.666/0001-66', 'Patrícia Souza', 20);

-- Inserindo dados na tabela tb_pessoa
INSERT INTO `tb_pessoa` (`id_pessoa`, `cpf`, `cnh`, `tb_cliente_id_cliente`) VALUES
(1, '123.456.789-00', 'ABC123456', 1),
(2, '987.654.321-00', 'DEF654321', 2),
(3, '456.789.123-00', 'GHI789123', 4),
(4, '654.321.987-00', 'MNO321654', 6),
(5, '159.753.486-00', 'STU159753', 8),
(6, '258.147.369-00', 'YZA258147', 10),
(7, '147.258.369-00', 'BCD147258', 11),
(8, '951.753.852-00', 'HIJ951753', 13),
(9, '852.951.753-00', 'KLM852951', 14),
(10, '456.321.789-00', 'QRS456321', 16),
(11, '147.369.258-00', 'WXY147369', 18),
(12, '258.963.147-00', 'ZAB258963', 19);

-- Inserindo dados na tabela tb_funcionario
INSERT INTO `tb_funcionario` (`id_funcionario`, `nome_funcionario`, `cpf_funcionario`, `senha_funcionario`) VALUES
(1, 'Luís Carlos', '087.671.801-24', 'senha123'),
(2, 'Ana Júlia', '091.411.261-90', 'senha456'),
(3, 'Maria Beatriz', '456.789.123-00', 'senha789'),
(4, 'Julian Victor', '084.545.461-70', 'senha101'),
(5, 'Lucas Faria' , '987.456.789.00', 'senha121');

-- Inserindo dados na tabela tb_veiculo
INSERT INTO `tb_veiculo` (`id_veiculo`, `nome_veiculo`, `ano_veiculo`, `marca_veiculo`, `tipo_veiculo`, `cor_veiculo`, `placa_veiculo`, `estado_veiculo`, `motor_veiculo`, `km_rodados`, `descricao_veiculo`, `qtd_portas`, `arcondicionado_veiculo`, `portamala_veiculo`, `tamanho_veiculo`, `cambio_veiculo`) VALUES
(1,	'Civic',	'2022',	'Honda',	'1',	'Preto',	'ABC-1234',	'2',	'2.0',	'10000',	'Sedan confortável',	'4',	'1',	'1',	'2',	'1'),
(2,	'Corolla',	'2021',	'Toyota',	'1',	'Branco',	'XYZ-5678',	'2',	'1.8',	'15000',	'Sedan econômico',	'4',	'1',	'1',	'2',	'1'),
(3,	'Uno',	'2015',	'Fiat',	'1',	'Vermelho',	'DEF-9876',	'2',	'1.0',	'50000',	'Compacto urbano',	'2',	'2',	'2',	'1',	'2'),
(4,	'Gol',	'2019',	'Volkswagen',	'1',	'Prata',	'GHI-5432',	'2',	'1.6',	'30000',	'Hatch popular',	'2',	'2',	'1',	'1',	'2'),
(5,	'Tucson',	'2018',	'Hyundai',	'2',	'Azul',	'JKL-3210',	'2',	'2.0',	'40000',	'SUV espaçoso',	'4',	'1',	'1',	'3',	'1'),
(6,	'EcoSport',	'2020',	'Ford',	'2',	'Cinza',	'MNO-6543',	'2',	'1.5',	'20000',	'SUV compacto',	'4',	'1',	'1',	'3',	'2'),
(7,	'HB20',	'2017',	'Hyundai',	'1',	'Branco',	'PQR-8765',	'1',	'1.6',	'35000',	'Hatchback confiável',	'4',	'1',	'2',	'2',	'2'),
(8,	'Polo',	'2022',	'Volkswagen',	'1',	'Preto',	'STU-4321',	'1',	'1.0',	'5000',	'Hatch moderno',	'4',	'1',	'2',	'2',	'1'),
(9,	'Duster',	'2019',	'Renault',	'2',	'Verde',	'VWX-0987',	'1',	'2.0',	'25000',	'SUV robusto',	'4',	'1',	'1',	'3',	'1'),
(10,	'Focus',	'2016',	'Ford',	'1',	'Prata',	'YZA-7654',	'1',	'2.0',	'60000',	'Sedan esportivo',	'4',	'1',	'1',	'2',	'1'),
(11,	'Celta',	'2014',	'Chevrolet',	'1',	'Vermelho',	'BCD-2345',	'1',	'1.0',	'70000',	'Compacto econômico',	'2',	'2',	'2',	'1',	'2'),
(12,	'Ranger',	'2020',	'Ford',	'2',	'Preto',	'EFG-8765',	'1',	'3.2',	'15000',	'Picape poderosa',	'4',	'1',	'1',	'3',	'2'),
(13,	'Cruze',	'2017',	'Chevrolet',	'1',	'Branco',	'NOP-5432',	'1',	'1.4',	'35000',	'Sedan sofisticado',	'4',	'1',	'1',	'2',	'1');


-- Inserindo dados na tabela tb_aluguel
INSERT INTO `tb_aluguel` (`id_aluguel`, `data_aluguel`, `tb_funcionario_id_funcionario`, `tb_cliente_id_cliente`) VALUES
(1,	'2024-09-05 22:31:06',	1,	7),
(2,	'2024-09-05 22:33:26',	1,	8),
(3,	'2024-09-05 23:19:50',	1,	9),
(4,	'2024-09-05 23:29:44',	1,	12),
(5,	'2024-09-05 23:31:57',	1,	13),
(6,	'2024-09-05 23:32:30',	1,	14);
-- Inserindo dados na tabela tb_enderecos
INSERT INTO `tb_enderecos` (`id_enderecos`, `endereco`, `tb_cliente_id_cliente`) VALUES
(1, 'Rua A, 123', 1),
(2, 'Av. B, 456', 2),
(3, 'Praça C, 789', 3),
(4, 'Rua D, 101', 4),
(5, 'Av. E, 202', 5),
(6, 'Rua F, 303', 6),
(7, 'Av. G, 404', 7),
(8, 'Praça H, 505', 8),
(9, 'Rua I, 606', 9),
(10, 'Av. J, 707', 10),
(11, 'Rua K, 808', 11),
(12, 'Av. L, 909', 12),
(13, 'Praça M, 101', 13),
(14, 'Rua N, 202', 14),
(15, 'Av. O, 303', 15),
(16, 'Rua P, 404', 16),
(17, 'Av. Q, 505', 17),
(18, 'Praça R, 606', 18),
(19, 'Rua S, 707', 19),
(20, 'Av. T, 808', 20);

-- Inserindo dados na tabela tb_carro_aluguel
INSERT INTO `tb_veiculo_aluguel` (`tb_veiculo_id_veiculo`, `tb_aluguel_id_aluguel`, `km_incial`, `km_final`) VALUES
(1,	1,	'10000',	'0'),
(2,	2,	'15000',	'0'),
(3,	3,	'50000',	'0'),
(6,	4,	'20000',	'0'),
(4,	5,	'30000',	'0'),
(5,	6,	'30000',	'0');