-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Maio-2024 às 02:01
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `metalink`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `links`
--

CREATE TABLE `links` (
  `idLinks` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `link` varchar(255) NOT NULL,
  `bolAtivo` tinyint(1) NOT NULL,
  `Usuario_idUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `links`
--

INSERT INTO `links` (`idLinks`, `titulo`, `link`, `bolAtivo`, `Usuario_idUsuario`) VALUES
(8, 'lukas_penha', 'google.com', 1, NULL),
(9, 'lukas', 'google.com', 0, NULL),
(10, 'andre', 'google.com', 1, NULL),
(11, 'julio', 'youtube.com', 1, NULL),
(12, 'felipe', 'youtube.com', 1, NULL),
(13, 'joao', 'facebook.com', 1, NULL),
(14, 'fefe', 'google.com', 1, NULL),
(15, 'fefe55', 'google.com', 1, NULL),
(16, 'wanderson', 'google.com', 1, NULL),
(17, 'lukas_penha', 'dfasd', 1, NULL),
(18, 'kokoko', 'google.com', 1, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telefone` char(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `user` varchar(15) NOT NULL,
  `perfil` char(1) NOT NULL DEFAULT 'U'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `email`, `password`, `telefone`, `nome`, `user`, `perfil`) VALUES
(1, 'admin@gmail.com', '111', '0000000', 'admin', 'admin', 'A'),
(5, 'andre@gmail.com', '$2y$10$NCeqXpwOj64PzYd2KLiUfOK1cXnBzdzsd2vLqM/yYk7yKmJQmlPw6', '25696556', 'andre', 'andrek', 'A'),
(6, 'vava@gmail.com', '$2y$10$1jzmp5bR5ZeeJJnYu/Z54.Re6Jh1XOxlA/4h2.VIoTfnIoHakWIzC', '161656', 'naoounao', 'simousim', 'U'),
(7, 'lo@gmail.com', '$2y$10$VGPbx6ueGFBnMBRfhGLZ8uwYBY9LnFxoTlEWu2jiTvUATFHpwTm4O', '6854684984', 'lu', 'lo', 'U');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`idLinks`),
  ADD KEY `Usuario_idUsuario` (`Usuario_idUsuario`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `unq_user` (`user`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `links`
--
ALTER TABLE `links`
  MODIFY `idLinks` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `links`
--
ALTER TABLE `links`
  ADD CONSTRAINT `links_ibfk_1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idusuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
