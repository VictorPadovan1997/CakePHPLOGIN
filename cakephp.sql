-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22-Maio-2019 às 20:10
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cakephp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ators`
--

CREATE TABLE `ators` (
  `id` int(11) NOT NULL,
  `nome` varchar(10) DEFAULT NULL,
  `datanascimento` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ators`
--

INSERT INTO `ators` (`id`, `nome`, `datanascimento`) VALUES
(2, 'Douglas', '02/02/1997'),
(5, 'Karina', '1969-12-31'),
(6, 'Roberto', '1998-04-14'),
(7, 'Victor', '1997-06-11'),
(9, 'Edilberto', '2019-01-01'),
(10, 'Victor', '1997-06-11');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ators_filmes`
--

CREATE TABLE `ators_filmes` (
  `id` int(11) NOT NULL,
  `filme_id` int(11) DEFAULT NULL,
  `ator_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ators_filmes`
--

INSERT INTO `ators_filmes` (`id`, `filme_id`, `ator_id`) VALUES
(4, 4, 6),
(5, 5, 5),
(6, 6, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `criticas`
--

CREATE TABLE `criticas` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) DEFAULT NULL,
  `avaliacao` int(5) DEFAULT NULL,
  `data_avaliacao` varchar(255) NOT NULL,
  `filme_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `criticas`
--

INSERT INTO `criticas` (`id`, `nome`, `avaliacao`, `data_avaliacao`, `filme_id`) VALUES
(1, 'victor', 5, '02/10/2019', 11),
(5, 'tes', 5, '10/10/2019', 19),
(26, 'teste', 3, '3', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `criticas_filmes`
--

CREATE TABLE `criticas_filmes` (
  `id` int(11) NOT NULL,
  `filme_id` int(11) DEFAULT NULL,
  `critica_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `criticas_filmes`
--

INSERT INTO `criticas_filmes` (`id`, `filme_id`, `critica_id`) VALUES
(1, 8, 7),
(2, 8, 9),
(3, 11, 10),
(4, 8, 11),
(5, 11, 12),
(6, 11, 13),
(7, 19, 14),
(8, 20, 25);

-- --------------------------------------------------------

--
-- Estrutura da tabela `filmes`
--

CREATE TABLE `filmes` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `ano` int(11) DEFAULT NULL,
  `duracao` varchar(50) DEFAULT NULL,
  `idioma` varchar(200) DEFAULT NULL,
  `genero` varchar(11) DEFAULT NULL,
  `ator_id` int(11) NOT NULL,
  `genero_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `filmes`
--

INSERT INTO `filmes` (`id`, `nome`, `ano`, `duracao`, `idioma`, `genero`, `ator_id`, `genero_id`) VALUES
(4, 'teste', 2018, '2hrs', 'InglÃªs', NULL, 0, 1),
(5, 'tes', 2019, '2hrs', 'InglÃªs', NULL, 0, 1),
(6, 'Vingadores', 2018, '2', 'InglÃªs', NULL, 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `generos`
--

CREATE TABLE `generos` (
  `id` int(11) NOT NULL,
  `nome` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `generos`
--

INSERT INTO `generos` (`id`, `nome`) VALUES
(1, 'Comedia'),
(2, 'Acao'),
(3, 'Drama'),
(6, 'Ficcao'),
(7, 'teste'),
(8, 'Terror');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
  `nome` varchar(10) DEFAULT NULL,
  `login` varchar(10) DEFAULT NULL,
  `senha` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `login`, `senha`) VALUES
(1, 'vitor', 'admin', '123'),
(2, 'victor', 'victor', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ators`
--
ALTER TABLE `ators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ators_filmes`
--
ALTER TABLE `ators_filmes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `criticas`
--
ALTER TABLE `criticas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `criticas_filmes`
--
ALTER TABLE `criticas_filmes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filmes`
--
ALTER TABLE `filmes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ators`
--
ALTER TABLE `ators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ators_filmes`
--
ALTER TABLE `ators_filmes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `criticas`
--
ALTER TABLE `criticas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `criticas_filmes`
--
ALTER TABLE `criticas_filmes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `filmes`
--
ALTER TABLE `filmes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `generos`
--
ALTER TABLE `generos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
