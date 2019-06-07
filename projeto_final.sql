-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 07-Jun-2019 às 12:28
-- Versão do servidor: 5.7.11
-- PHP Version: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projeto_final`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_aluno`
--

CREATE TABLE `tb_aluno` (
  `id_aluno` int(5) NOT NULL,
  `id_login` int(5) NOT NULL,
  `nomeAluno` varchar(300) COLLATE utf8_bin NOT NULL,
  `dataNascimento` date NOT NULL,
  `status` varchar(20) COLLATE utf8_bin NOT NULL,
  `sexo` varchar(20) COLLATE utf8_bin NOT NULL,
  `id_curso` int(5) NOT NULL,
  `id_documentos` int(5) NOT NULL,
  `id_contato` int(5) NOT NULL,
  `id_periodo` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_contato`
--

CREATE TABLE `tb_contato` (
  `id_contato` int(5) NOT NULL,
  `telefone` varchar(14) COLLATE utf8_bin NOT NULL,
  `celular` varchar(14) COLLATE utf8_bin NOT NULL,
  `email` text COLLATE utf8_bin NOT NULL,
  `rua` int(11) NOT NULL,
  `numero` int(7) NOT NULL,
  `complemento` text COLLATE utf8_bin NOT NULL,
  `bairro` text COLLATE utf8_bin NOT NULL,
  `cidade` text COLLATE utf8_bin NOT NULL,
  `estado` int(2) NOT NULL,
  `cep` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_curso`
--

CREATE TABLE `tb_curso` (
  `id_curso` int(5) NOT NULL,
  `nomeCurso` varchar(300) COLLATE utf8_bin NOT NULL,
  `unidade` int(3) NOT NULL,
  `modalidade` int(2) NOT NULL,
  `qtdePeriodos` int(2) NOT NULL,
  `horario` int(2) NOT NULL,
  `cargaHoraria` text COLLATE utf8_bin NOT NULL,
  `descricao` text COLLATE utf8_bin NOT NULL,
  `valorCurso` double NOT NULL,
  `id_listaMateria` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_dependente`
--

CREATE TABLE `tb_dependente` (
  `id_dependente` int(5) NOT NULL,
  `nome` varchar(300) COLLATE utf8_bin NOT NULL,
  `dataNascimento` date NOT NULL,
  `grauParentesco` int(2) NOT NULL,
  `cpf` int(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_documentos`
--

CREATE TABLE `tb_documentos` (
  `id_documentos` int(5) NOT NULL,
  `cpf` int(14) NOT NULL,
  `identidade` int(10) NOT NULL,
  `cateiraMotorista` int(20) NOT NULL,
  `foto` blob NOT NULL,
  `cnpj` int(20) NOT NULL,
  `inscricaoEstadual` int(22) NOT NULL,
  `inscricaoMunicipal` int(22) NOT NULL,
  `historicoEscolar` blob NOT NULL,
  `compteEscolaridade` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_funcionario`
--

CREATE TABLE `tb_funcionario` (
  `id_funcionario` int(5) NOT NULL,
  `id_login` int(5) NOT NULL,
  `nomeFuncionario` varchar(300) COLLATE utf8_bin NOT NULL,
  `dataNasc` date NOT NULL,
  `sexo` text COLLATE utf8_bin NOT NULL,
  `cargoFunc` int(3) NOT NULL,
  `departamento` int(2) NOT NULL,
  `dataAdmissao` date NOT NULL,
  `status` text COLLATE utf8_bin NOT NULL,
  `dataDemissao` date NOT NULL,
  `hrTrabalho` text COLLATE utf8_bin NOT NULL,
  `salarioFunc` double NOT NULL,
  `id_contato` int(5) NOT NULL,
  `estadoCivil` int(2) NOT NULL,
  `conjuge` varchar(300) COLLATE utf8_bin NOT NULL,
  `dependentes` int(1) NOT NULL,
  `id_dependente` int(5) NOT NULL,
  `id_documentos` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_historicoacesso`
--

CREATE TABLE `tb_historicoacesso` (
  `id_historicoAcesso` int(5) NOT NULL,
  `dataAcesso` date NOT NULL,
  `id_listaAcesso` int(5) NOT NULL,
  `id_login` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_listaacesso`
--

CREATE TABLE `tb_listaacesso` (
  `id_listaAcesso` int(5) NOT NULL,
  `horaAcesso` time NOT NULL,
  `tempoPermanencia` text COLLATE utf8_bin NOT NULL,
  `descricao` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_listamateria`
--

CREATE TABLE `tb_listamateria` (
  `id_listaMateria` int(5) NOT NULL,
  `id_materia` int(5) NOT NULL,
  `id_funcionario` int(5) NOT NULL,
  `faltas` double NOT NULL,
  `prova1` double NOT NULL,
  `prova2` double NOT NULL,
  `prova3` double NOT NULL,
  `substitutiva` double NOT NULL,
  `recuperacao` double NOT NULL,
  `total` double NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_login`
--

CREATE TABLE `tb_login` (
  `id_login` int(5) NOT NULL,
  `usuario` varchar(255) COLLATE utf8_bin NOT NULL,
  `senha` varchar(255) COLLATE utf8_bin NOT NULL,
  `id_nivelAcesso` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tb_login`
--

INSERT INTO `tb_login` (`id_login`, `usuario`, `senha`, `id_nivelAcesso`) VALUES
(1, 'master@gmail.com', '123456', 1),
(2, 'admin@gmail.com', '1234', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_materia`
--

CREATE TABLE `tb_materia` (
  `id_materia` int(5) NOT NULL,
  `nome` varchar(300) COLLATE utf8_bin NOT NULL,
  `cargaHoraria` text COLLATE utf8_bin NOT NULL,
  `peso` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_nivelacesso`
--

CREATE TABLE `tb_nivelacesso` (
  `id_nivelAcesso` int(5) NOT NULL,
  `tipoAcesso` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tb_nivelacesso`
--

INSERT INTO `tb_nivelacesso` (`id_nivelAcesso`, `tipoAcesso`) VALUES
(1, 'Master'),
(2, 'Administrador'),
(3, 'Docente'),
(4, 'Aux Administrativo'),
(5, 'Aluno(a)'),
(6, 'Assist RH');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_periodo`
--

CREATE TABLE `tb_periodo` (
  `id_periodo` int(5) NOT NULL,
  `id_listaMateria` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_aluno`
--
ALTER TABLE `tb_aluno`
  ADD PRIMARY KEY (`id_aluno`),
  ADD KEY `id_periodo` (`id_periodo`),
  ADD KEY `id_contato` (`id_contato`),
  ADD KEY `id_documentos` (`id_documentos`),
  ADD KEY `id_curso` (`id_curso`),
  ADD KEY `id_login` (`id_login`);

--
-- Indexes for table `tb_contato`
--
ALTER TABLE `tb_contato`
  ADD PRIMARY KEY (`id_contato`);

--
-- Indexes for table `tb_curso`
--
ALTER TABLE `tb_curso`
  ADD PRIMARY KEY (`id_curso`),
  ADD KEY `id_listaMateria` (`id_listaMateria`);

--
-- Indexes for table `tb_dependente`
--
ALTER TABLE `tb_dependente`
  ADD PRIMARY KEY (`id_dependente`);

--
-- Indexes for table `tb_documentos`
--
ALTER TABLE `tb_documentos`
  ADD PRIMARY KEY (`id_documentos`);

--
-- Indexes for table `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  ADD PRIMARY KEY (`id_funcionario`),
  ADD KEY `id_dependente` (`id_dependente`),
  ADD KEY `id_documentos` (`id_documentos`),
  ADD KEY `id_contato` (`id_contato`),
  ADD KEY `id_login` (`id_login`);

--
-- Indexes for table `tb_historicoacesso`
--
ALTER TABLE `tb_historicoacesso`
  ADD PRIMARY KEY (`id_historicoAcesso`),
  ADD KEY `id_listaAcesso` (`id_listaAcesso`),
  ADD KEY `id_login` (`id_login`);

--
-- Indexes for table `tb_listaacesso`
--
ALTER TABLE `tb_listaacesso`
  ADD PRIMARY KEY (`id_listaAcesso`);

--
-- Indexes for table `tb_listamateria`
--
ALTER TABLE `tb_listamateria`
  ADD PRIMARY KEY (`id_listaMateria`),
  ADD KEY `id_materia` (`id_materia`),
  ADD KEY `id_funcionario` (`id_funcionario`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id_login`),
  ADD KEY `id_nivelAcesso` (`id_nivelAcesso`);

--
-- Indexes for table `tb_materia`
--
ALTER TABLE `tb_materia`
  ADD PRIMARY KEY (`id_materia`);

--
-- Indexes for table `tb_nivelacesso`
--
ALTER TABLE `tb_nivelacesso`
  ADD PRIMARY KEY (`id_nivelAcesso`);

--
-- Indexes for table `tb_periodo`
--
ALTER TABLE `tb_periodo`
  ADD PRIMARY KEY (`id_periodo`),
  ADD KEY `id_listaMateria` (`id_listaMateria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_aluno`
--
ALTER TABLE `tb_aluno`
  MODIFY `id_aluno` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_contato`
--
ALTER TABLE `tb_contato`
  MODIFY `id_contato` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_curso`
--
ALTER TABLE `tb_curso`
  MODIFY `id_curso` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_dependente`
--
ALTER TABLE `tb_dependente`
  MODIFY `id_dependente` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_documentos`
--
ALTER TABLE `tb_documentos`
  MODIFY `id_documentos` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  MODIFY `id_funcionario` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_historicoacesso`
--
ALTER TABLE `tb_historicoacesso`
  MODIFY `id_historicoAcesso` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_listaacesso`
--
ALTER TABLE `tb_listaacesso`
  MODIFY `id_listaAcesso` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_listamateria`
--
ALTER TABLE `tb_listamateria`
  MODIFY `id_listaMateria` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id_login` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_materia`
--
ALTER TABLE `tb_materia`
  MODIFY `id_materia` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_nivelacesso`
--
ALTER TABLE `tb_nivelacesso`
  MODIFY `id_nivelAcesso` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_periodo`
--
ALTER TABLE `tb_periodo`
  MODIFY `id_periodo` int(5) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_aluno`
--
ALTER TABLE `tb_aluno`
  ADD CONSTRAINT `tb_aluno_ibfk_1` FOREIGN KEY (`id_login`) REFERENCES `tb_login` (`id_login`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_aluno_ibfk_2` FOREIGN KEY (`id_contato`) REFERENCES `tb_contato` (`id_contato`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_aluno_ibfk_3` FOREIGN KEY (`id_documentos`) REFERENCES `tb_documentos` (`id_documentos`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_aluno_ibfk_4` FOREIGN KEY (`id_periodo`) REFERENCES `tb_periodo` (`id_periodo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_aluno_ibfk_5` FOREIGN KEY (`id_curso`) REFERENCES `tb_curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tb_curso`
--
ALTER TABLE `tb_curso`
  ADD CONSTRAINT `tb_curso_ibfk_1` FOREIGN KEY (`id_listaMateria`) REFERENCES `tb_listamateria` (`id_listaMateria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  ADD CONSTRAINT `tb_funcionario_ibfk_1` FOREIGN KEY (`id_login`) REFERENCES `tb_login` (`id_login`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_funcionario_ibfk_2` FOREIGN KEY (`id_documentos`) REFERENCES `tb_documentos` (`id_documentos`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_funcionario_ibfk_3` FOREIGN KEY (`id_contato`) REFERENCES `tb_contato` (`id_contato`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_funcionario_ibfk_4` FOREIGN KEY (`id_dependente`) REFERENCES `tb_dependente` (`id_dependente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tb_historicoacesso`
--
ALTER TABLE `tb_historicoacesso`
  ADD CONSTRAINT `tb_historicoacesso_ibfk_1` FOREIGN KEY (`id_listaAcesso`) REFERENCES `tb_listaacesso` (`id_listaAcesso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_historicoacesso_ibfk_2` FOREIGN KEY (`id_login`) REFERENCES `tb_login` (`id_login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tb_listamateria`
--
ALTER TABLE `tb_listamateria`
  ADD CONSTRAINT `tb_listamateria_ibfk_1` FOREIGN KEY (`id_materia`) REFERENCES `tb_materia` (`id_materia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_listamateria_ibfk_2` FOREIGN KEY (`id_funcionario`) REFERENCES `tb_funcionario` (`id_funcionario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tb_login`
--
ALTER TABLE `tb_login`
  ADD CONSTRAINT `tb_login_ibfk_1` FOREIGN KEY (`id_nivelAcesso`) REFERENCES `tb_nivelacesso` (`id_nivelAcesso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tb_periodo`
--
ALTER TABLE `tb_periodo`
  ADD CONSTRAINT `tb_periodo_ibfk_1` FOREIGN KEY (`id_listaMateria`) REFERENCES `tb_listamateria` (`id_listaMateria`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
