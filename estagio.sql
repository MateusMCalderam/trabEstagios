-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Nov-2024 às 00:42
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `estagio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE `cidade` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cep` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `coordenador`
--

CREATE TABLE `coordenador` (
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `coorientador`
--

CREATE TABLE `coorientador` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `nome` varchar(255) NOT NULL,
  `supervisor` varchar(255) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `telefone` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `cnpj` int(11) NOT NULL,
  `representante` varchar(255) DEFAULT NULL,
  `numConvenio` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estagio`
--

CREATE TABLE `estagio` (
  `id` int(11) NOT NULL,
  `periodo` int(11) NOT NULL,
  `area` varchar(255) DEFAULT NULL,
  `cargaHoraria` int(11) NOT NULL,
  `idEstudante` int(11) NOT NULL,
  `idCoordenador` int(11) NOT NULL,
  `idEmpresa` int(11) NOT NULL,
  `nomeSupervisor` varchar(255) DEFAULT NULL,
  `cargoSupervisor` varchar(255) DEFAULT NULL,
  `telefoneSupervisor` varchar(20) DEFAULT NULL,
  `emailSupervisor` varchar(255) DEFAULT NULL,
  `idRepresentanteempresa` int(11) NOT NULL,
  `idCidade` int(11) NOT NULL,
  `idCoorientador` int(11) DEFAULT NULL,
  `tipoProcesso` varchar(255) DEFAULT NULL,
  `encaminhamentos` varchar(255) DEFAULT NULL,
  `planoAtividades` varchar(255) DEFAULT NULL,
  `relatorioFinal` varchar(255) DEFAULT NULL,
  `autoavaliacaoEmpresa` varchar(255) DEFAULT NULL,
  `autoavaliacao` varchar(255) DEFAULT NULL,
  `termoCompromisso` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estudante`
--

CREATE TABLE `estudante` (
  `matricula` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `curso` varchar(255) NOT NULL,
  `cpf` int(11) NOT NULL,
  `rg` int(11) NOT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) NOT NULL,
  `telefone` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `representanteempresa`
--

CREATE TABLE `representanteempresa` (
  `id` int(11) NOT NULL,
  `funcao` varchar(255) DEFAULT NULL,
  `cpf` varchar(15) NOT NULL,
  `rg` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nivel` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `coordenador`
--
ALTER TABLE `coordenador`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `coorientador`
--
ALTER TABLE `coorientador`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `estagio`
--
ALTER TABLE `estagio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEmpresa` (`idEmpresa`),
  ADD KEY `idEstudante` (`idEstudante`),
  ADD KEY `idCidade` (`idCidade`),
  ADD KEY `idCoordenador` (`idCoordenador`),
  ADD KEY `idCoorientador` (`idCoorientador`),
  ADD KEY `idRepresentanteempresa` (`idRepresentanteempresa`);

--
-- Índices para tabela `estudante`
--
ALTER TABLE `estudante`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `representanteempresa`
--
ALTER TABLE `representanteempresa`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cidade`
--
ALTER TABLE `cidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `coordenador`
--
ALTER TABLE `coordenador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `coorientador`
--
ALTER TABLE `coorientador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `estagio`
--
ALTER TABLE `estagio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `estudante`
--
ALTER TABLE `estudante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `representanteempresa`
--
ALTER TABLE `representanteempresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `estagio`
--
ALTER TABLE `estagio`
  ADD CONSTRAINT `estagio_ibfk_1` FOREIGN KEY (`idEmpresa`) REFERENCES `empresa` (`id`),
  ADD CONSTRAINT `estagio_ibfk_2` FOREIGN KEY (`idEstudante`) REFERENCES `estudante` (`id`),
  ADD CONSTRAINT `estagio_ibfk_3` FOREIGN KEY (`idCidade`) REFERENCES `cidade` (`id`),
  ADD CONSTRAINT `estagio_ibfk_4` FOREIGN KEY (`idCoordenador`) REFERENCES `coordenador` (`id`),
  ADD CONSTRAINT `estagio_ibfk_5` FOREIGN KEY (`idCoorientador`) REFERENCES `coorientador` (`id`),
  ADD CONSTRAINT `estagio_ibfk_6` FOREIGN KEY (`idRepresentanteempresa`) REFERENCES `representanteempresa` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
