-- Adminer 4.8.1 MySQL 5.5.5-10.5.25-MariaDB-ubu2004 dump
-- CRIANDO O BANCO E AS TABELAS

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
  `data_devolucao` date NOT NULL,
  `km_rodados` varchar(45) NOT NULL,
  `valor_cobrado` varchar(45) NOT NULL,
  `tb_aluguel_id_aluguel` int(11) NOT NULL,
  PRIMARY KEY (`id_devolucao`,`tb_aluguel_id_aluguel`),
  KEY `fk_tb_devolucao_tb_aluguel1_idx` (`tb_aluguel_id_aluguel`),
  CONSTRAINT `fk_tb_devolucao_tb_aluguel1` FOREIGN KEY (`tb_aluguel_id_aluguel`) REFERENCES `tb_aluguel` (`id_aluguel`) ON DELETE CASCADE ON UPDATE CASCADE
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


DROP TABLE IF EXISTS `tb_manutencao`;
CREATE TABLE `tb_manutencao` (
  `id_manutencao` int(11) NOT NULL AUTO_INCREMENT,
  `data_ida` date NOT NULL,
  `data_prev_volta` date NOT NULL,
  `tb_veiculo_id_veiculo` int(11) NOT NULL,
  PRIMARY KEY (`id_manutencao`,`tb_veiculo_id_veiculo`),
  KEY `fk_tb_manutencao_tb_veiculo1_idx` (`tb_veiculo_id_veiculo`),
  CONSTRAINT `fk_tb_manutencao_tb_veiculo1` FOREIGN KEY (`tb_veiculo_id_veiculo`) REFERENCES `tb_veiculo` (`id_veiculo`) ON DELETE CASCADE ON UPDATE CASCADE
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
  KEY `fk_tb_veiculo_has_tb_aluguel_tb_aluguel1_idx` (`tb_aluguel_id_aluguel`),
  KEY `fk_tb_veiculo_has_tb_aluguel_tb_veiculo1_idx` (`tb_veiculo_id_veiculo`),
  CONSTRAINT `fk_tb_veiculo_has_tb_aluguel_tb_aluguel1` FOREIGN KEY (`tb_aluguel_id_aluguel`) REFERENCES `tb_aluguel` (`id_aluguel`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_tb_veiculo_has_tb_aluguel_tb_veiculo1` FOREIGN KEY (`tb_veiculo_id_veiculo`) REFERENCES `tb_veiculo` (`id_veiculo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


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
INSERT INTO `tb_empresa` (`id_empresa`, `nome_empresa`, `cnpj`, `func_responsavel`, `tb_cliente_id_cliente`) VALUES
(1, 'Empresa ABC', '12.345.678/0001-99', 'Marcos Lima', 3),
(2, 'Empresa XYZ', '98.765.432/0001-88', 'Fernanda Souza', 5),
(3, 'Empresa QWE', '11.111.111/0001-11', 'Lucas Martins', 7),
(4, 'Empresa RTY', '22.222.222/0001-22', 'Ana Paula', 9),
(5, 'Empresa UIO', '33.333.333/0001-33', 'Ricardo Mendes', 12),
(6, 'Empresa PAS', '44.444.444/0001-44', 'Cláudia Silva', 15),
(7, 'Empresa LKO', '55.555.555/0001-55', 'Daniel Borges', 17),
(8, 'Empresa MNB', '66.666.666/0001-66', 'Patrícia Souza', 20);

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
(4, 'Julian Victor', '084.545.461-70', 'senha101');

-- Inserindo dados na tabela tb_veiculo
INSERT INTO `tb_veiculo` (`id_veiculo`, `nome_veiculo`, `ano_veiculo`, `marca_veiculo`, `tipo_veiculo`, `cor_veiculo`, `placa_veiculo`, `estado_veiculo`, `motor_veiculo`, `km_rodados`, `descricao_veiculo`, `qtd_portas`, `arcondicionado_veiculo`, `portamala_veiculo`, `tamanho_veiculo`, `cambio_veiculo`, `npassageiro_veiculo`) VALUES
(1, 'Fiat Uno', '2018', 'Fiat', 'c', 'Branco', 'ABC-1234', 'a', '1.0', '50000', 'Econômico', '2', 's', 's', 'p', 'm', '5'),
(2, 'Honda Civic', '2020', 'Honda', 'c', 'Preto', 'DEF-5678', 'a', '2.0', '30000', 'Confortável', '4', 's', 's', 'm', 'a', '5'),
(3, 'Yamaha YZF', '2019', 'Yamaha', 'm', 'Azul', 'GHI-9012', 'a', '600cc', '10000', 'Esportiva', '0', 'n', 'n', 'p', 'm', '2'),
(4, 'Chevrolet Onix', '2021', 'Chevrolet', 'c', 'Vermelho', 'JKL-3456', 'a', '1.4', '20000', 'Compacto', '4', 's', 's', 'm', 'm', '5'),
(5, 'Volkswagen Golf', '2017', 'Volkswagen', 'c', 'Cinza', 'MNO-7890', 'd', '1.6', '60000', 'Luxo', '4', 's', 's', 'm', 'a', '5'),
(6, 'Ford Ka', '2019', 'Ford', 'c', 'Prata', 'PQR-6789', 'd', '1.5', '25000', 'Popular', '4', 's', 's', 'p', 'm', '5'),
(7, 'BMW X1', '2020', 'BMW', 'c', 'Preto', 'STU-5432', 'd', '2.0', '15000', 'Luxo', '4', 's', 's', 'g', 'a', '5'),
(8, 'Kawasaki Ninja', '2018', 'Kawasaki', 'm', 'Verde', 'VWX-9876', 'd', '650cc', '8000', 'Esportiva', '0', 'n', 'n', 'p', 'm', '2'),
(9, 'Hyundai HB20', '2021', 'Hyundai', 'c', 'Azul', 'YZA-4321', 'd', '1.6', '10000', 'Compacto', '4', 's', 's', 'm', 'm', '5'),
(10, 'Toyota Corolla', '2019', 'Toyota', 'c', 'Branco', 'BCD-1234', 'd', '2.0', '35000', 'Sedan', '4', 's', 's', 'm', 'a', '5'),
(11, 'Renault Kwid', '2020', 'Renault', 'c', 'Laranja', 'EFG-5678', 'd', '1.0', '12000', 'Popular', '4', 's', 's', 'p', 'm', '5'),
(12, 'Audi A3', '2017', 'Audi', 'c', 'Cinza', 'HIJ-9012', 'd', '1.8', '45000', 'Luxo', '4', 's', 's', 'm', 'a', '5'),
(13, 'Suzuki GSX', '2019', 'Suzuki', 'm', 'Preto', 'KLM-3456', 'd', '750cc', '7000', 'Esportiva', '0', 'n', 'n', 'p', 'm', '2'),
(14, 'Peugeot 208', '2021', 'Peugeot', 'c', 'Vermelho', 'NOP-7890', 'd', '1.2', '15000', 'Hatch', '4', 's', 's', 'p', 'm', '5'),
(15, 'Chevrolet Cruze', '2018', 'Chevrolet', 'c', 'Prata', 'QRS-6789', 'd', '1.4', '30000', 'Sedan', '4', 's', 's', 'm', 'a', '5'),
(16, 'Honda Fit', '2020', 'Honda', 'c', 'Azul', 'TUV-5432', 'd', '1.5', '20000', 'Compacto', '4', 's', 's', 'm', 'm', '5'),
(17, 'Jeep Compass', '2019', 'Jeep', 'c', 'Preto', 'WXY-9876', 'd', '2.0', '25000', 'SUV', '4', 's', 's', 'g', 'a', '5'),
(18, 'Volkswagen Polo', '2018', 'Volkswagen', 'c', 'Branco', 'ZAB-4321', 'd', '1.0', '40000', 'Hatch', '4', 's', 's', 'p', 'm', '5'),
(19, 'Ford Fiesta', '2017', 'Ford', 'c', 'Cinza', 'CDE-1234', 'd', '1.6', '50000', 'Popular', '4', 's', 's', 'p', 'm', '5'),
(20, 'Nissan Versa', '2021', 'Nissan', 'c', 'Prata', 'FGH-5678', 'd', '1.6', '8000', 'Sedan', '4', 's', 's', 'm', 'm', '5');

-- Inserindo dados na tabela tb_aluguel
INSERT INTO `tb_aluguel` (`id_aluguel`, `data_aluguel`, `tb_funcionario_id_funcionario`, `tb_cliente_id_cliente`) VALUES
(1, '2024-06-01', 1, 1),
(2, '2024-06-05', 2, 2),
(3, '2024-06-10', 1, 3),
(4, '2024-06-15', 3, 4);


-- Inserindo dados na tabela tb_devolucao
INSERT INTO `tb_devolucao` (`id_devolucao`, `data_devolucao`, `km_rodados`, `valor_cobrado`, `tb_aluguel_id_aluguel`) VALUES
(1, '2024-06-10', '50500', '100', 1),
(2, '2024-06-15', '30500', '150', 2),
(3, '2024-06-20', '11000', '200', 3),
(4, '2024-06-25', '20500', '120', 4),
(5, '2024-06-30', '60500', '180', 5),
(6, '2024-07-05', '25000', '140', 6),
(7, '2024-07-10', '15000', '160', 7),
(8, '2024-07-15', '8000', '130', 8),
(9, '2024-07-20', '10000', '170', 9),
(10, '2024-07-25', '35000', '190', 10),
(11, '2024-07-30', '12000', '200', 11),
(12, '2024-08-05', '45000', '210', 12),
(13, '2024-08-10', '7000', '220', 13),
(14, '2024-08-15', '15000', '230', 14),
(15, '2024-08-20', '8000', '240', 15),
(16, '2024-08-25', '20000', '250', 16),
(17, '2024-08-30', '40000', '260', 17),
(18, '2024-09-05', '50000', '270', 18),
(19, '2024-09-10', '10000', '280', 19),
(20, '2024-09-15', '60000', '290', 20);


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

-- Inserindo dados na tabela tb_manutencao
INSERT INTO `tb_manutencao` (`id_manutencao`, `data_ida`, `data_prev_volta`, `tb_veiculo_id_veiculo`) VALUES
(1, '2024-06-01', '2024-06-05', 1),
(2, '2024-06-10', '2024-06-15', 2),
(3, '2024-06-20', '2024-06-25', 3),
(4, '2024-07-01', '2024-07-05', 4),
(5, '2024-07-10', '2024-07-15', 5),
(6, '2024-07-20', '2024-07-25', 6),
(7, '2024-08-01', '2024-08-05', 7),
(8, '2024-08-10', '2024-08-15', 8),
(9, '2024-08-20', '2024-08-25', 9),
(10, '2024-09-01', '2024-09-05', 10),
(11, '2024-09-10', '2024-09-15', 11),
(12, '2024-09-20', '2024-09-25', 12),
(13, '2024-10-01', '2024-10-05', 13),
(14, '2024-10-10', '2024-10-15', 14),
(15, '2024-10-20', '2024-10-25', 15),
(16, '2024-11-01', '2024-11-05', 16),
(17, '2024-11-10', '2024-11-15', 17),
(18, '2024-11-20', '2024-11-25', 18),
(19, '2024-12-01', '2024-12-05', 19),
(20, '2024-12-10', '2024-12-15', 20);

-- Inserindo dados na tabela tb_carro_aluguel
INSERT INTO `tb_veiculo_aluguel` (`tb_veiculo_id_veiculo`, `tb_aluguel_id_aluguel`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4);