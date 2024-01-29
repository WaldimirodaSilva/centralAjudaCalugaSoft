-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Jan-2024 às 13:05
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `centralajudacalugasoft_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `softwares`
--

CREATE TABLE `softwares` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `imagem` varchar(150) NOT NULL,
  `estado` int(11) NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `softwares`
--

INSERT INTO `softwares` (`id`, `nome`, `imagem`, `estado`, `descricao`) VALUES
(3, 'ngonlaApp', 'arquivo65b7922ed87ca3.43669128.jpg', 1, 'qualquer coisa');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `softwares`
--
ALTER TABLE `softwares`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `softwares`
--
ALTER TABLE `softwares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
