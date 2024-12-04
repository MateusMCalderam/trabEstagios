-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 04/12/2024 às 13:20
-- Versão do servidor: 8.0.30
-- Versão do PHP: 8.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `estagio2`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cidade`
--

CREATE TABLE `cidade` (
  `id` int NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `cep` varchar(8) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cidade`
--

INSERT INTO `cidade` (`id`, `nome`, `cep`) VALUES
(1, 'Bento Gonçalves', '95703300');

-- --------------------------------------------------------

--
-- Estrutura para tabela `curso`
--

CREATE TABLE `curso` (
  `id` int NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `idOrientador` int DEFAULT NULL,
  `emailOrientador` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `curso`
--

INSERT INTO `curso` (`id`, `nome`, `idOrientador`, `emailOrientador`) VALUES
(1, 'Info', 1, 'bbbbbbbb@gmail.com'),
(3, 'Agro', 3, 'aaaa@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresa`
--

CREATE TABLE `empresa` (
  `id` int NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `endereco` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telefone` int DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `cnpj` int NOT NULL,
  `representante` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `funcaoRepresentante` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cpfRepresentante` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `rgRepresentante` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `numConvenio` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `estagio`
--

CREATE TABLE `estagio` (
  `id` int NOT NULL,
  `periodo` int NOT NULL,
  `area` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cargaHoraria` int NOT NULL,
  `idEstudante` int NOT NULL,
  `idEmpresa` int NOT NULL,
  `nomeSupervisor` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cargoSupervisor` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telefoneSupervisor` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `emailSupervisor` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `representante` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `idCidade` int NOT NULL,
  `idCoorientador` int NOT NULL,
  `idOrientador` int NOT NULL,
  `tipoProcesso` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `planoAtividades` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `relatorioFinal` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `autoavaliacaoEmpresa` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `autoavaliacao` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `termoCompromisso` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `estudante`
--

CREATE TABLE `estudante` (
  `id` int NOT NULL,
  `matricula` int NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `cpf` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `rg` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `endereco` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telefone` int DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `idCurso` int NOT NULL,
  `idCidade` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `estudante`
--

INSERT INTO `estudante` (`id`, `matricula`, `nome`, `cpf`, `rg`, `endereco`, `telefone`, `email`, `idCurso`, `idCidade`) VALUES
(29, 312312, 'Mateus Teste', '123', '0', 'Rua Osvaldo Aranha', 0, 'mateusmmcalderam@gmail.com', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `professor`
--

CREATE TABLE `professor` (
  `id` int NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `siape` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `professor`
--

INSERT INTO `professor` (`id`, `nome`, `siape`, `email`) VALUES
(1, 'Professor Nome', '122121211222333', 'professor@gmail.com'),
(3, 'Professor Nome 2 ', '12212121', 'professor@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nivel` int NOT NULL DEFAULT '1',
  `idProfessor` int DEFAULT NULL,
  `idEstudante` int DEFAULT NULL,
  `idEmpresa` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `login`, `senha`, `nivel`, `idProfessor`, `idEstudante`, `idEmpresa`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, NULL, NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idOrientador` (`idOrientador`);

--
-- Índices de tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `representante` (`representante`);

--
-- Índices de tabela `estagio`
--
ALTER TABLE `estagio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEstudante` (`idEstudante`),
  ADD KEY `idEmpresa` (`idEmpresa`),
  ADD KEY `idCidade` (`idCidade`),
  ADD KEY `representante` (`representante`),
  ADD KEY `idCoorientador` (`idCoorientador`),
  ADD KEY `idOrientador` (`idOrientador`);

--
-- Índices de tabela `estudante`
--
ALTER TABLE `estudante`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCurso` (`idCurso`),
  ADD KEY `idCidade` (`idCidade`);

--
-- Índices de tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuario_professor` (`idProfessor`),
  ADD KEY `fk_usuario_estudante` (`idEstudante`),
  ADD KEY `fk_usuario_empresa` (`idEmpresa`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cidade`
--
ALTER TABLE `cidade`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `estagio`
--
ALTER TABLE `estagio`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `estudante`
--
ALTER TABLE `estudante`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `curso_ibfk_1` FOREIGN KEY (`idOrientador`) REFERENCES `professor` (`id`);

--
-- Restrições para tabelas `estagio`
--
ALTER TABLE `estagio`
  ADD CONSTRAINT `estagio_ibfk_1` FOREIGN KEY (`idEstudante`) REFERENCES `estudante` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estagio_ibfk_2` FOREIGN KEY (`idEmpresa`) REFERENCES `empresa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estagio_ibfk_3` FOREIGN KEY (`idCidade`) REFERENCES `cidade` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estagio_ibfk_4` FOREIGN KEY (`representante`) REFERENCES `empresa` (`representante`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estagio_ibfk_5` FOREIGN KEY (`idCoorientador`) REFERENCES `professor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estagio_ibfk_6` FOREIGN KEY (`idOrientador`) REFERENCES `professor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `estudante`
--
ALTER TABLE `estudante`
  ADD CONSTRAINT `estudante_ibfk_1` FOREIGN KEY (`idCurso`) REFERENCES `curso` (`id`),
  ADD CONSTRAINT `estudante_ibfk_2` FOREIGN KEY (`idCidade`) REFERENCES `cidade` (`id`);

--
-- Restrições para tabelas `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_empresa` FOREIGN KEY (`idEmpresa`) REFERENCES `empresa` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_usuario_estudante` FOREIGN KEY (`idEstudante`) REFERENCES `estudante` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_usuario_professor` FOREIGN KEY (`idProfessor`) REFERENCES `professor` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
