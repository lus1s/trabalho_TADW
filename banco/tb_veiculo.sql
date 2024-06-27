-- Adminer 4.8.1 MySQL 5.5.5-10.5.23-MariaDB-1:10.5.23+maria~ubu2004 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

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
  `acordicinado_veiculo` enum('s','n') NOT NULL,
  `portamala_ veiculo` enum('s','n') NOT NULL,
  `tamaho_veiculo` enum('p','m','g') NOT NULL,
  `cambio_veiculo` enum('m','a') NOT NULL,
  `npassageiro_veiculo` enum('2','4','5','6','7') NOT NULL,
  PRIMARY KEY (`id_veiculo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


-- 2024-06-27 18:26:20