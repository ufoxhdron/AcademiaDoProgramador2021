-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Mar-2021 às 19:34
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sisequipa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `chamado`
--

CREATE TABLE `chamado` (
  `chaId` int(11) NOT NULL,
  `chaTitulo` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `chaDescricao` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `chaDataInicio` date NOT NULL,
  `chaDataFim` date NOT NULL,
  `chaStatus` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `equiNumeroSerie` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `chamado`
--

INSERT INTO `chamado` (`chaId`, `chaTitulo`, `chaDescricao`, `chaDataInicio`, `chaDataFim`, `chaStatus`, `equiNumeroSerie`) VALUES
(1, 'Impressora de Varsovia', 'Falha na comunicação de rede e cilindro riscando folha', '2021-03-19', '2021-04-19', 'Aberto', 'A123456789'),
(2, 'Impressora Espanha', 'Tonner Errado', '2021-03-19', '2021-05-19', 'Fechado', 'B123456789');

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipamento`
--

CREATE TABLE `equipamento` (
  `equiNumeroSerie` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `equiFabricante` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `equiNome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `equiDataFabricacao` date NOT NULL,
  `equiValor` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `equipamento`
--

INSERT INTO `equipamento` (`equiNumeroSerie`, `equiFabricante`, `equiNome`, `equiDataFabricacao`, `equiValor`) VALUES
('A123456789', 'Xerox', 'Fabrica HP Suplementos', '2021-03-19', '5289.39'),
('B123456789', 'RICOH', 'Fabrica Ricoh Periféricos', '2021-03-04', '35268.14'),
('C113213213', 'HP', 'Fabrica Xerox', '2021-03-03', '12582.32');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `funCpf` bigint(11) UNSIGNED ZEROFILL NOT NULL,
  `funNome` varchar(150) NOT NULL,
  `funEmail` varchar(200) NOT NULL,
  `funSenha` varchar(42) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`funCpf`, `funNome`, `funEmail`, `funSenha`) VALUES
(04342641992, 'José Claudinei de Oliveira', 'etriangulos@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `chamado`
--
ALTER TABLE `chamado`
  ADD PRIMARY KEY (`chaId`),
  ADD KEY `equiNumeroSerie` (`equiNumeroSerie`);

--
-- Índices para tabela `equipamento`
--
ALTER TABLE `equipamento`
  ADD PRIMARY KEY (`equiNumeroSerie`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`funCpf`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `chamado`
--
ALTER TABLE `chamado`
  MODIFY `chaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `chamado`
--
ALTER TABLE `chamado`
  ADD CONSTRAINT `chamado_ibfk_1` FOREIGN KEY (`equiNumeroSerie`) REFERENCES `equipamento` (`equiNumeroSerie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
