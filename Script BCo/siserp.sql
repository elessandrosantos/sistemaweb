-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Maio-2020 às 15:49
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `siserp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `XCLIENTES` int(6) NOT NULL COMMENT 'Código do Cliente',
  `CODIGO_A` varchar(20) NOT NULL COMMENT 'Codigo Anterior',
  `CGC` varchar(20) NOT NULL,
  `RAZAO` varchar(60) NOT NULL,
  `NOME` varchar(50) NOT NULL,
  `LOGRA` varchar(6) NOT NULL,
  `ENDERECO` varchar(50) NOT NULL,
  `NUMERO` varchar(6) NOT NULL,
  `CJ` varchar(15) NOT NULL,
  `CEP` varchar(10) NOT NULL,
  `BAIRRO` varchar(30) NOT NULL,
  `CIDADE` varchar(40) NOT NULL,
  `ESTADO` varchar(2) NOT NULL,
  `COD_PAIS` varchar(4) NOT NULL,
  `DDD` varchar(10) NOT NULL,
  `TEL1` varchar(15) NOT NULL,
  `TEL2` varchar(15) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `HOMEPAGE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`XCLIENTES`, `CODIGO_A`, `CGC`, `RAZAO`, `NOME`, `LOGRA`, `ENDERECO`, `NUMERO`, `CJ`, `CEP`, `BAIRRO`, `CIDADE`, `ESTADO`, `COD_PAIS`, `DDD`, `TEL1`, `TEL2`, `EMAIL`, `HOMEPAGE`) VALUES
(1, '1', '213125', 'Elessandro', 'Elessandro', '', '', '', '', '', '', '', '', '', '15', '987456321', '', '', ''),
(2, '1', '213125', 'Elessandro', 'Elessandro', '', '', '', '', '', '', '', '', '', '15', '987456321', '', '', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`XCLIENTES`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `XCLIENTES` int(6) NOT NULL AUTO_INCREMENT COMMENT 'Código do Cliente', AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
