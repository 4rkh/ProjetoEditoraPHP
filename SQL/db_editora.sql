-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Nov-2024 às 19:59
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
-- Banco de dados: `db editora`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `autores`
--

CREATE TABLE `autores` (
  `id_autor` int(11) NOT NULL,
  `nm_autor` varchar(30) DEFAULT NULL,
  `cd_cpf_autor` decimal(11,0) DEFAULT NULL,
  `qt_idade_autor` decimal(3,0) DEFAULT NULL,
  `id_classificacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `classificacao_autores`
--

CREATE TABLE `classificacao_autores` (
  `id_classificacao` int(11) NOT NULL,
  `nm_classificacao` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `convidado`
--

CREATE TABLE `convidado` (
  `id_convidado` int(11) NOT NULL,
  `nm_convidado` varchar(30) DEFAULT NULL,
  `cd_cpf_convidado` decimal(11,0) DEFAULT NULL,
  `qt_idade_conviado` decimal(3,0) DEFAULT NULL,
  `id_divulgacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `divulgacao`
--

CREATE TABLE `divulgacao` (
  `id_divulgacao` int(11) NOT NULL,
  `nm_divulgacao` varchar(50) DEFAULT NULL,
  `dt_inicio` date DEFAULT NULL,
  `dt_fim` date DEFAULT NULL,
  `nm_endereco` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `publicacao`
--

CREATE TABLE `publicacao` (
  `id_publicacao` int(11) NOT NULL,
  `id_tipo_publicacao` int(11) DEFAULT NULL,
  `id_autor` int(11) DEFAULT NULL,
  `id_divulgacao` int(11) DEFAULT NULL,
  `dt_publicacao` date DEFAULT NULL,
  `nm_editora` varchar(30) DEFAULT NULL,
  `nm_edicao` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_publicacao`
--

CREATE TABLE `tipo_publicacao` (
  `id_tipo_publicacao` int(11) NOT NULL,
  `nm_tipo_publicacao` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`id_autor`),
  ADD KEY `classificacao_autores_fk` (`id_classificacao`);

--
-- Índices para tabela `classificacao_autores`
--
ALTER TABLE `classificacao_autores`
  ADD PRIMARY KEY (`id_classificacao`);

--
-- Índices para tabela `convidado`
--
ALTER TABLE `convidado`
  ADD PRIMARY KEY (`id_convidado`),
  ADD KEY `id_divulgacao_fk` (`id_divulgacao`);

--
-- Índices para tabela `divulgacao`
--
ALTER TABLE `divulgacao`
  ADD PRIMARY KEY (`id_divulgacao`);

--
-- Índices para tabela `publicacao`
--
ALTER TABLE `publicacao`
  ADD PRIMARY KEY (`id_publicacao`),
  ADD KEY `id_autor_fk` (`id_autor`),
  ADD KEY `id_divulgacao` (`id_divulgacao`),
  ADD KEY `id_tipo_publicacao` (`id_tipo_publicacao`);

--
-- Índices para tabela `tipo_publicacao`
--
ALTER TABLE `tipo_publicacao`
  ADD PRIMARY KEY (`id_tipo_publicacao`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `autores`
--
ALTER TABLE `autores`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `classificacao_autores`
--
ALTER TABLE `classificacao_autores`
  MODIFY `id_classificacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `convidado`
--
ALTER TABLE `convidado`
  MODIFY `id_convidado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `divulgacao`
--
ALTER TABLE `divulgacao`
  MODIFY `id_divulgacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `publicacao`
--
ALTER TABLE `publicacao`
  MODIFY `id_publicacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tipo_publicacao`
--
ALTER TABLE `tipo_publicacao`
  MODIFY `id_tipo_publicacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `autores`
--
ALTER TABLE `autores`
  ADD CONSTRAINT `classificacao_autores_fk` FOREIGN KEY (`id_classificacao`) REFERENCES `classificacao_autores` (`id_classificacao`);

--
-- Limitadores para a tabela `convidado`
--
ALTER TABLE `convidado`
  ADD CONSTRAINT `id_divulgacao_fk` FOREIGN KEY (`id_divulgacao`) REFERENCES `divulgacao` (`id_divulgacao`);

--
-- Limitadores para a tabela `publicacao`
--
ALTER TABLE `publicacao`
  ADD CONSTRAINT `id_autor_fk` FOREIGN KEY (`id_autor`) REFERENCES `autores` (`id_autor`),
  ADD CONSTRAINT `publicacao_ibfk_1` FOREIGN KEY (`id_divulgacao`) REFERENCES `divulgacao` (`id_divulgacao`),
  ADD CONSTRAINT `publicacao_ibfk_2` FOREIGN KEY (`id_tipo_publicacao`) REFERENCES `tipo_publicacao` (`id_tipo_publicacao`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
