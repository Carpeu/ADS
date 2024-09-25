-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Abr-2024 às 17:47
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `lojan`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `nome_cli` varchar(25) NOT NULL,
  `telefone_cli` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nome_cli`, `telefone_cli`, `email`) VALUES
(1, 'Fernando', '61998772233', ''),
(2, 'Jonas', '61995534567', ''),
(3, 'Maria', '61985637890', ''),
(4, 'Joana', '61987771234', ''),
(5, 'Arthur', '61984055544', ''),
(6, 'Lana', '61995473785', ''),
(7, 'Lucas', '61986552585', ''),
(8, 'Paula', '61996952345', ''),
(9, 'Daniel', '61987234511', ''),
(10, 'Gustavo', '61995451234', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `idProduto` int(11) NOT NULL,
  `nomeProduto` varchar(20) NOT NULL,
  `valorUnitario` decimal(10,2) NOT NULL,
  `bolAtivo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`idProduto`, `nomeProduto`, `valorUnitario`, `bolAtivo`) VALUES
(1, 'Batata Chips', '10.50', 1),
(2, 'Ruffles', '11.00', 1),
(3, 'Mentos', '5.00', 1),
(4, 'Ruffles', '7.50', 1),
(5, 'Cerveja', '9.90', 1),
(6, 'Refrigerante', '4.50', 0),
(11, 'Refrigerante', '4.50', 1),
(12, 'Suco', '5.50', 1),
(13, 'Café', '3.50', 1),
(14, 'Café', '3.50', 1),
(15, 'Café', '3.50', 1),
(16, 'Café', '3.50', 0),
(17, 'Café', '3.50', 1),
(18, 'Café', '3.50', 0),
(19, 'Chopp', '7.50', 1),
(20, 'Chopp 600 ml', '16.50', 1),
(21, 'Salgadinho', '8.50', 1),
(22, 'Café', '3.50', 0),
(23, 'Arroz', '28.00', 1),
(24, 'Macarrão', '4.00', 1),
(25, 'Feijão', '7.00', 0),
(27, 'Mentos', '6.00', 1),
(28, 'Mentos', '6.00', 1),
(29, 'Ruffles', '5.00', 1),
(30, 'Mentos', '6.00', 1),
(32, 'Óleo de Soja', '5.50', 0),
(33, 'Óleo de Soja', '4.50', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idCliente` int(11) NOT NULL,
  `nome` varchar(140) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idCliente`, `nome`, `email`, `senha`) VALUES
(4, 'Sergio', 'sergio@gmail.com', '654321'),
(5, 'Arthur', 'arthur@gmail.com', '12345'),
(6, 'Fernando', 'fernando@gmail.com', '123456'),
(7, 'Wander', 'wander@gmail.com', '456789'),
(8, 'Lana', 'lana@gmail.com', '456123');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idProduto`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idCliente`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
