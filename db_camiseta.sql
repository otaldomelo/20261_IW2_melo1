-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 23-Jun-2026 às 11:58
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `db_camiseta`
--
CREATE DATABASE IF NOT EXISTS `db_camiseta` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_camiseta`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_camiseta`
--

CREATE TABLE IF NOT EXISTS `tb_camiseta` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `id_tamanho` int(11) DEFAULT NULL,
  `id_cor` int(11) DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  KEY `fk_cor` (`id_cor`),
  KEY `fk_tamanho` (`id_tamanho`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `tb_camiseta`
--

INSERT INTO `tb_camiseta` (`codigo`, `id_tamanho`, `id_cor`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5),
(6, 1, 6),
(7, 2, 7),
(8, 3, 8),
(9, 4, 9),
(10, 5, 10),
(11, 5, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cor`
--

CREATE TABLE IF NOT EXISTS `tb_cor` (
  `id_cor` int(11) NOT NULL AUTO_INCREMENT,
  `cor` varchar(20) NOT NULL,
  PRIMARY KEY (`id_cor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `tb_cor`
--

INSERT INTO `tb_cor` (`id_cor`, `cor`) VALUES
(1, 'Preto'),
(2, 'Branco'),
(3, 'Azul'),
(4, 'Vermelho'),
(5, 'Laranja'),
(6, 'Amarelo'),
(7, 'Ciano'),
(8, 'Verde'),
(9, 'Marrom'),
(10, 'Cinza');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tamanho`
--

CREATE TABLE IF NOT EXISTS `tb_tamanho` (
  `id_tamanho` int(11) NOT NULL AUTO_INCREMENT,
  `tamanho` varchar(10) NOT NULL,
  PRIMARY KEY (`id_tamanho`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `tb_tamanho`
--

INSERT INTO `tb_tamanho` (`id_tamanho`, `tamanho`) VALUES
(1, 'PP'),
(2, 'P'),
(3, 'M'),
(4, 'G'),
(5, 'GG');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_camiseta`
--
ALTER TABLE `tb_camiseta`
  ADD CONSTRAINT `fk_cor` FOREIGN KEY (`id_cor`) REFERENCES `tb_cor` (`id_cor`),
  ADD CONSTRAINT `fk_tamanho` FOREIGN KEY (`id_tamanho`) REFERENCES `tb_tamanho` (`id_tamanho`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
