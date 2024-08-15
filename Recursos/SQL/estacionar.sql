-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Abr-2020 às 03:53
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
-- Banco de dados: `estacionamento`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `estacionar`
--

CREATE TABLE `estacionar` (
  `estacionar_id` int(11) NOT NULL,
  `estacionar_precificacao_id` int(11) NOT NULL,
  `estacionar_forma_pagamento_id` int(11) DEFAULT NULL,
  `estacionar_valor_hora` varchar(20) NOT NULL,
  `estacionar_numero_vaga` int(11) NOT NULL,
  `estacionar_placa_veiculo` varchar(8) NOT NULL,
  `estacionar_marca_veiculo` varchar(30) NOT NULL,
  `estacionar_modelo_veiculo` varchar(20) NOT NULL,
  `estacionar_data_entrada` datetime NOT NULL DEFAULT current_timestamp(),
  `estacionar_data_saida` datetime DEFAULT NULL,
  `estacionar_tempo_decorrido` varchar(20) DEFAULT NULL,
  `estacionar_valor_devido` varchar(30) DEFAULT NULL,
  `estacionar_status` tinyint(1) NOT NULL,
  `estacionar_data_alteracao` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `estacionar`
--
ALTER TABLE `estacionar`
  ADD PRIMARY KEY (`estacionar_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `estacionar`
--
ALTER TABLE `estacionar`
  MODIFY `estacionar_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
