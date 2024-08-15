-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Abr-2020 às 04:40
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
-- Estrutura da tabela `mensalistas`
--

CREATE TABLE `mensalistas` (
  `mensalista_id` int(11) NOT NULL,
  `mensalista_data_cadastro` timestamp NULL DEFAULT current_timestamp(),
  `mensalista_nome` varchar(45) NOT NULL,
  `mensalista_sobrenome` varchar(150) NOT NULL,
  `mensalista_data_nascimento` date DEFAULT NULL,
  `mensalista_cpf` varchar(20) NOT NULL,
  `mensalista_rg` varchar(20) NOT NULL,
  `mensalista_email` varchar(50) NOT NULL,
  `mensalista_telefone_fixo` varchar(20) DEFAULT NULL,
  `mensalista_telefone_movel` varchar(20) NOT NULL,
  `mensalista_cep` varchar(10) NOT NULL,
  `mensalista_endereco` varchar(155) NOT NULL,
  `mensalista_numero_endereco` varchar(20) NOT NULL,
  `mensalista_bairro` varchar(45) NOT NULL,
  `mensalista_cidade` varchar(105) NOT NULL,
  `mensalista_estado` varchar(2) NOT NULL,
  `mensalista_complemento` varchar(145) NOT NULL,
  `mensalista_ativo` tinyint(1) NOT NULL,
  `mensalista_dia_vencimento` int(11) NOT NULL,
  `mensalista_obs` tinytext DEFAULT NULL,
  `mensalista_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `mensalistas`
--

INSERT INTO `mensalistas` (`mensalista_id`, `mensalista_data_cadastro`, `mensalista_nome`, `mensalista_sobrenome`, `mensalista_data_nascimento`, `mensalista_cpf`, `mensalista_rg`, `mensalista_email`, `mensalista_telefone_fixo`, `mensalista_telefone_movel`, `mensalista_cep`, `mensalista_endereco`, `mensalista_numero_endereco`, `mensalista_bairro`, `mensalista_cidade`, `mensalista_estado`, `mensalista_complemento`, `mensalista_ativo`, `mensalista_dia_vencimento`, `mensalista_obs`, `mensalista_data_alteracao`) VALUES
(1, '2020-03-13 22:00:02', 'Lucio', 'Souza', '2020-03-13', '359.731.420-19', '334.44644-12', 'lucio@gmail.com', '', '(41) 9999-9999', '80530-000', 'Rua de Curitiba', '45', 'Centro', 'Curitiba', 'PR', '', 1, 31, '', '2020-03-17 23:33:25'),
(2, '2020-03-16 18:32:17', 'João', 'Antonio', '1984-03-13', '964.222.370-81', '33.036.268-9', 'joao@gmail.com', '', '', '80120-000', 'Rua do Trabalho', 'sem número', 'Centro', 'Curitiba', 'PR', '', 0, 10, '', '2020-03-20 02:47:42');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `mensalistas`
--
ALTER TABLE `mensalistas`
  ADD PRIMARY KEY (`mensalista_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `mensalistas`
--
ALTER TABLE `mensalistas`
  MODIFY `mensalista_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
