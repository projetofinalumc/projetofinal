-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 21-Abr-2020 às 21:57
-- Versão do servidor: 8.0.19
-- versão do PHP: 7.2.24-0ubuntu0.18.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bancoteste123`
--
CREATE DATABASE IF NOT EXISTS `bancoteste123` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `bancoteste123`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `login` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`login`, `senha`) VALUES
('admin123', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Categoria`
--

CREATE TABLE `Categoria` (
  `codcategoria` int NOT NULL,
  `nomeCategoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Categoria`
--

INSERT INTO `Categoria` (`codcategoria`, `nomeCategoria`) VALUES
(1, 'naruto'),
(3, 'Vaso'),
(9, 'www'),
(10, 'sdas'),
(11, 'sdssdas'),
(12, 'TACHEGANDO'),
(13, 'TACHEGSANDO'),
(14, 'TACHsssEGSANDO'),
(17, 'sdwasdw');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Endereco`
--

CREATE TABLE `Endereco` (
  `id_locatario` int DEFAULT NULL,
  `logradouro` varchar(100) NOT NULL,
  `cep` varchar(100) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `numero` int NOT NULL,
  `Bairro` varchar(255) DEFAULT NULL,
  `id_endereco` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `Endereco`
--

INSERT INTO `Endereco` (`id_locatario`, `logradouro`, `cep`, `estado`, `numero`, `Bairro`, `id_endereco`) VALUES
(30, 'LograEditado', '888', 'mg', 321, 'limeira', 4),
(22, 'LogradouroEditado', '1067', 'BA', 222, 'flores', 5),
(22, 'LogradouroTeste', '988', 'mg', 12, 'arvores', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `itemPedido`
--

CREATE TABLE `itemPedido` (
  `id_itemPedido` int NOT NULL,
  `valorUnitario` double DEFAULT NULL,
  `quantidade` int DEFAULT NULL,
  `fk_Produto` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Locatario`
--

CREATE TABLE `Locatario` (
  `id` int NOT NULL,
  `cpf` int NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senhaloc` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `data_nascimento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `Locatario`
--

INSERT INTO `Locatario` (`id`, `cpf`, `Nome`, `email`, `senhaloc`, `data_nascimento`) VALUES
(20, 323, 'Elton', 'pescador@sdsda', '12345ss', NULL),
(21, 2321, 'dsad', 'dsadasda@dsada', '', NULL),
(22, 0, 'elton', 'aaaa@eeee', '123', NULL),
(23, 2321, 'dsad', 'dsadasda@dsada', '', NULL),
(24, 2321, 'dsad', 'dsadasda@dsada', '', NULL),
(27, 23213212, 'Teste2 ', 'dsadsds@dasdad', '', NULL),
(30, 4152, 'Felipe', 'felipe@gmail.com', '', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Pedido`
--

CREATE TABLE `Pedido` (
  `idPedido` int(10) UNSIGNED ZEROFILL NOT NULL,
  `dataRetirada` date NOT NULL,
  `valorTotal` double NOT NULL,
  `dataDevolucao` date NOT NULL,
  `dataPedido` date NOT NULL,
  `id_endereco` int NOT NULL,
  `idLocatario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Produto`
--

CREATE TABLE `Produto` (
  `idProduto` int NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `valdiaria` decimal(10,0) DEFAULT NULL,
  `dimensao` varchar(50) DEFAULT NULL,
  `quantidade` int DEFAULT NULL,
  `precoPerda` double DEFAULT NULL,
  `categoria` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Produto`
--

INSERT INTO `Produto` (`idProduto`, `nome`, `modelo`, `valdiaria`, `dimensao`, `quantidade`, `precoPerda`, `categoria`) VALUES
(28, 'Produto02', 'Modelo02', '2', '2x22', 2, 2, 13),
(29, 'Produto1', 'Modelo1', '1', '2x2', 1, 1, 1),
(31, 'Produto3', 'Modelo3', '3', '2x2', 3, 3, 1),
(32, 'Produto4', 'Modelo4', '4', '2x2', 4, 4, 1),
(33, 'Produto5', 'Modelo5', '5', '2x2', 5, 5, 1),
(34, 'Produto6', 'Modelo6', '6', '2x2', 6, 6, 1),
(35, 'Produto7', 'Modelo7', '7', '2x2', 7, 7, 1),
(36, 'Produto8', 'Modelo8', '8', '2x2', 8, 8, 1),
(37, 'Produto9', 'Modelo9', '9', '2x2', 9, 9, 1),
(38, 'Produto10', 'Modelo10', '10', '2x2', 10, 10, 1),
(39, 'Produto11', 'Modelo11', '11', '2x2', 11, 11, 1),
(40, 'Produto12', 'Modelo12', '12', '2x2', 12, 12, 1),
(41, 'Produto13', 'Modelo13', '13', '2x2', 13, 13, 1),
(42, 'Produto14', 'Modelo14', '14', '2x2', 14, 14, 1),
(43, 'Produto15', 'Modelo15', '15', '2x2', 15, 15, 1),
(44, 'Produto16', 'Modelo16', '16', '2x2', 16, 16, 1),
(45, 'Produto17', 'Modelo17', '17', '2x2', 17, 17, 1),
(46, 'Produto18', 'Modelo18', '18', '2x2', 18, 18, 1),
(47, 'Produto19', 'Modelo19', '19', '2x2', 19, 19, 1),
(48, 'Produto20', 'Modelo20', '20', '2x2', 20, 20, 1),
(49, 'Produto21', 'Modelo21', '21', '2x2', 21, 21, 1),
(50, 'Produto22', 'Modelo22', '22', '2x2', 22, 22, 1),
(51, 'Produto23', 'Modelo23', '23', '2x2', 23, 23, 1),
(52, 'Produto24', 'Modelo24', '24', '2x2', 24, 24, 1),
(53, 'Produto25', 'Modelo25', '25', '2x2', 25, 25, 1),
(54, 'Produto26', 'Modelo26', '26', '2x2', 26, 26, 1),
(55, 'Produto27', 'Modelo27', '27', '2x2', 27, 27, 1),
(56, 'Produto28', 'Modelo28', '28', '2x2', 28, 28, 1),
(57, 'Produto29', 'Modelo29', '29', '2x2', 29, 29, 1),
(58, 'Produto30', 'Modelo30', '30', '2x2', 30, 30, 1),
(59, 'Produto31', 'Modelo31', '31', '2x2', 31, 31, 1),
(60, 'Produto32', 'Modelo32', '32', '2x2', 32, 32, 1),
(61, 'Produto33', 'Modelo33', '33', '2x2', 33, 33, 1),
(62, 'Produto34', 'Modelo34', '34', '2x2', 34, 34, 1),
(63, 'Produto35', 'Modelo35', '35', '2x2', 35, 35, 1),
(64, 'Produto36', 'Modelo36', '36', '2x2', 36, 36, 1),
(65, 'Produto37', 'Modelo37', '37', '2x2', 37, 37, 1),
(66, 'Produto38', 'Modelo38', '38', '2x2', 38, 38, 1),
(67, 'Produto39', 'Modelo39', '39', '2x2', 39, 39, 1),
(68, 'Produto40', 'Modelo40', '40', '2x2', 40, 40, 1),
(69, 'Produto41', 'Modelo41', '41', '2x2', 41, 41, 1),
(70, 'Produto42', 'Modelo42', '42', '2x2', 42, 42, 1),
(71, 'Produto43', 'Modelo43', '43', '2x2', 43, 43, 1),
(72, 'Produto44', 'Modelo44', '44', '2x2', 44, 44, 1),
(73, 'Produto45', 'Modelo45', '45', '2x2', 45, 45, 1),
(74, 'Produto46', 'Modelo46', '46', '2x2', 46, 46, 1),
(75, 'Produto47', 'Modelo47', '47', '2x2', 47, 47, 1),
(76, 'Produto48', 'Modelo48', '48', '2x2', 48, 48, 1),
(77, 'Produto49', 'Modelo49', '49', '2x2', 49, 49, 1),
(78, 'Produto50', 'Modelo50', '50', '2x2', 50, 50, 1),
(79, 'Test1', 'TEst1', '10', '20x20', 20, 20, 13),
(80, 'Test1', 'TEst1', '10', '20x20', 20, 20, 13),
(81, 'Test1', 'TEst1', '10', '20x20', 20, 20, 13),
(82, 'dsad', 'dsada', '12', '10', 12, 12, 9),
(83, 'DSDSA', 'WD', '10', '100X11', 121, 121, 17);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `senha`) VALUES
(1, 'Locador', '123');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `Categoria`
--
ALTER TABLE `Categoria`
  ADD PRIMARY KEY (`codcategoria`);

--
-- Índices para tabela `Endereco`
--
ALTER TABLE `Endereco`
  ADD PRIMARY KEY (`id_endereco`),
  ADD KEY `fk_Locatario` (`id_locatario`);

--
-- Índices para tabela `itemPedido`
--
ALTER TABLE `itemPedido`
  ADD PRIMARY KEY (`id_itemPedido`),
  ADD KEY `fk_Produto` (`fk_Produto`);

--
-- Índices para tabela `Locatario`
--
ALTER TABLE `Locatario`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `Pedido`
--
ALTER TABLE `Pedido`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `fk_endereco` (`id_endereco`),
  ADD KEY `FKlocatario` (`idLocatario`);

--
-- Índices para tabela `Produto`
--
ALTER TABLE `Produto`
  ADD PRIMARY KEY (`idProduto`),
  ADD KEY `fk_categoria` (`categoria`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `Categoria`
--
ALTER TABLE `Categoria`
  MODIFY `codcategoria` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `Endereco`
--
ALTER TABLE `Endereco`
  MODIFY `id_endereco` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `itemPedido`
--
ALTER TABLE `itemPedido`
  MODIFY `id_itemPedido` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `Locatario`
--
ALTER TABLE `Locatario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `Pedido`
--
ALTER TABLE `Pedido`
  MODIFY `idPedido` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `Produto`
--
ALTER TABLE `Produto`
  MODIFY `idProduto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `Endereco`
--
ALTER TABLE `Endereco`
  ADD CONSTRAINT `fk_Locatario` FOREIGN KEY (`id_locatario`) REFERENCES `Locatario` (`id`);

--
-- Limitadores para a tabela `itemPedido`
--
ALTER TABLE `itemPedido`
  ADD CONSTRAINT `fk_Produto` FOREIGN KEY (`fk_Produto`) REFERENCES `Produto` (`idProduto`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `Pedido`
--
ALTER TABLE `Pedido`
  ADD CONSTRAINT `fk_endereco` FOREIGN KEY (`id_endereco`) REFERENCES `Endereco` (`id_endereco`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FKlocatario` FOREIGN KEY (`idLocatario`) REFERENCES `Locatario` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `Produto`
--
ALTER TABLE `Produto`
  ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`categoria`) REFERENCES `Categoria` (`codcategoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
