-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Abr-2020 às 08:31
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `outros`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensalidades`
--

CREATE TABLE `mensalidades` (
  `mensalidade_id` int(11) NOT NULL,
  `mensalidade_mensalista_id` int(11) NOT NULL,
  `mensalidade_precificacao_id` int(11) NOT NULL,
  `mensalidade_valor_mensalidade` varchar(20) NOT NULL,
  `mensalidade_mensalista_dia_vencimento` int(11) NOT NULL,
  `mensalidade_data_vencimento` date NOT NULL,
  `mensalidade_data_pagamento` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `mensalidade_status` tinyint(1) NOT NULL,
  `mensalidade_data_alteracao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `mensalidades`
--
ALTER TABLE `mensalidades`
  ADD PRIMARY KEY (`mensalidade_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `mensalidades`
--
ALTER TABLE `mensalidades`
  MODIFY `mensalidade_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
