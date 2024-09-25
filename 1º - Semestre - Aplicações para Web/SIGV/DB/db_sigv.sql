-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23/05/2024 às 18:25
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_sigv`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `manutencoes`
--

CREATE TABLE `manutencoes` (
  `id` int(11) NOT NULL,
  `id_viatura` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_tipo_manutencao` int(11) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `dt_revisao` date NOT NULL,
  `dt_criacao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `manutencoes`
--

INSERT INTO `manutencoes` (`id`, `id_viatura`, `id_usuario`, `id_tipo_manutencao`, `descricao`, `status`, `dt_revisao`, `dt_criacao`) VALUES
(1, 1, 1, 2, 'Troca de Oleo e Filtros', 1, '2024-05-08', '2024-05-07'),
(2, 5, 1, 3, 'Revisão Geral', 1, '2024-05-15', '2024-05-10'),
(3, 6, 1, 3, 'Revisão Programada da viatura', 1, '2024-05-10', '2024-05-10'),
(5, 16, 1, 2, 'Troca de Pastilhas de Freio', 1, '2024-05-16', '2024-05-15'),
(6, 6, 1, 2, 'Troca de Bateria', 1, '2024-05-16', '2024-05-15'),
(7, 1, 1, 2, 'vubhacs hzuvn zouihvipnasnvpsmc', 1, '2024-05-16', '2024-05-16'),
(9, 16, 1, 2, 'Correção de defeitos na injeção', 1, '2024-05-23', '2024-05-23'),
(10, 16, 1, 4, 'Verificação da integridade estrutural da viatura', 1, '2024-05-23', '2024-05-23');

-- --------------------------------------------------------

--
-- Estrutura para tabela `modelos_viaturas`
--

CREATE TABLE `modelos_viaturas` (
  `id` int(11) NOT NULL,
  `modelo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `modelos_viaturas`
--

INSERT INTO `modelos_viaturas` (`id`, `modelo`) VALUES
(1, 'ASX 2.0'),
(2, 'JOURNEY'),
(3, 'PAJERO DAKAR'),
(4, 'TRAILBLAZER');

-- --------------------------------------------------------

--
-- Estrutura para tabela `quilometros`
--

CREATE TABLE `quilometros` (
  `id` int(11) NOT NULL,
  `km_atual` int(11) DEFAULT NULL,
  `km_ultima_revisao` int(11) DEFAULT NULL,
  `km_proxima_revisao` int(11) DEFAULT NULL,
  `id_viatura` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `quilometros`
--

INSERT INTO `quilometros` (`id`, `km_atual`, `km_ultima_revisao`, `km_proxima_revisao`, `id_viatura`) VALUES
(1, 257895, 257895, 267895, 1),
(4, 26500, 17000, 27000, 3),
(5, 154893, 154893, 164893, 6),
(8, 170015, 170015, 180005, 16);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_manutencoes`
--

CREATE TABLE `tipo_manutencoes` (
  `id` int(11) NOT NULL,
  `manutencao` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tipo_manutencoes`
--

INSERT INTO `tipo_manutencoes` (`id`, `manutencao`) VALUES
(1, 'ATIVO'),
(2, 'CORRETIVA'),
(3, 'PREVENTIVA'),
(4, 'INSPEÇÃO TÉCNICA');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `adm` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `login`, `senha`, `adm`) VALUES
(1, 'Administrador', 'admin', '4badaee57fed5610012a296273158f5f', 1),
(8, 'Andre Felipe', 'andre', 'e10adc3949ba59abbe56e057f20f883e', 1),
(10, 'Lucas', 'lucas', '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `viaturas`
--

CREATE TABLE `viaturas` (
  `id` int(11) NOT NULL,
  `placa` varchar(45) DEFAULT NULL,
  `prefixo` varchar(45) DEFAULT NULL,
  `ano` year(4) DEFAULT NULL,
  `id_modelo` int(11) DEFAULT NULL,
  `id_tipo_manutencao` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `viaturas`
--

INSERT INTO `viaturas` (`id`, `placa`, `prefixo`, `ano`, `id_modelo`, `id_tipo_manutencao`) VALUES
(1, 'JHA9A05', '6669', '2015', 3, 1),
(3, 'JGT1254', '15789', '2016', 1, 1),
(5, 'JHF8569', '654123', '2014', 1, 1),
(6, 'PVG8256', '3585', '2017', 1, 1),
(16, 'PAZ7895', '4566', '2015', 3, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `manutencoes`
--
ALTER TABLE `manutencoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_viatura` (`id_viatura`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_tipo_manutencao` (`id_tipo_manutencao`);

--
-- Índices de tabela `modelos_viaturas`
--
ALTER TABLE `modelos_viaturas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `quilometros`
--
ALTER TABLE `quilometros`
  ADD KEY `id_viatura` (`id_viatura`),
  ADD KEY `id` (`id`);

--
-- Índices de tabela `tipo_manutencoes`
--
ALTER TABLE `tipo_manutencoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `viaturas`
--
ALTER TABLE `viaturas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_modelo` (`id_modelo`),
  ADD KEY `id_tipo_manutencao` (`id_tipo_manutencao`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `manutencoes`
--
ALTER TABLE `manutencoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `modelos_viaturas`
--
ALTER TABLE `modelos_viaturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `quilometros`
--
ALTER TABLE `quilometros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tipo_manutencoes`
--
ALTER TABLE `tipo_manutencoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `viaturas`
--
ALTER TABLE `viaturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `manutencoes`
--
ALTER TABLE `manutencoes`
  ADD CONSTRAINT `fk_id_tipo_manutencao` FOREIGN KEY (`id_tipo_manutencao`) REFERENCES `tipo_manutencoes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_viatura` FOREIGN KEY (`id_viatura`) REFERENCES `viaturas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `quilometros`
--
ALTER TABLE `quilometros`
  ADD CONSTRAINT `id_viatura` FOREIGN KEY (`id_viatura`) REFERENCES `viaturas` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Restrições para tabelas `viaturas`
--
ALTER TABLE `viaturas`
  ADD CONSTRAINT `id_modelo` FOREIGN KEY (`id_modelo`) REFERENCES `modelos_viaturas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_tipo_manutencao` FOREIGN KEY (`id_tipo_manutencao`) REFERENCES `tipo_manutencoes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
