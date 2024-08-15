-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Abr-2020 às 02:24
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
-- Estrutura da tabela `precificacoes`
--

CREATE TABLE `precificacoes` (
  `precificacao_id` int(11) NOT NULL,
  `precificacao_categoria` varchar(50) NOT NULL,
  `precificacao_valor_hora` varchar(50) NOT NULL,
  `precificacao_valor_mensalidade` varchar(20) NOT NULL,
  `precificacao_numero_vagas` int(11) NOT NULL,
  `precificacao_ativa` tinyint(1) NOT NULL,
  `precificacao_data_alteracao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `precificacoes`
--
ALTER TABLE `precificacoes`
  ADD PRIMARY KEY (`precificacao_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `precificacoes`
--
ALTER TABLE `precificacoes`
  MODIFY `precificacao_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
