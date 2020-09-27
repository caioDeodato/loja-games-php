-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 27-Set-2020 às 23:11
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdProjeto1`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra`
--

CREATE TABLE `compra` (
  `id` bigint(20) NOT NULL,
  `id_game` bigint(20) NOT NULL,
  `id_usuario` bigint(20) NOT NULL,
  `data_compra` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `compra`
--

INSERT INTO `compra` (`id`, `id_game`, `id_usuario`, `data_compra`) VALUES
(7, 1, 3, '27-09-2020 16:31'),
(8, 1, 3, '27-09-2020 16:33');

-- --------------------------------------------------------

--
-- Estrutura da tabela `games`
--

CREATE TABLE `games` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `categoria` varchar(25) NOT NULL,
  `preco` varchar(15) NOT NULL,
  `descricao` text NOT NULL,
  `plataforma` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `games`
--

INSERT INTO `games` (`id`, `nome`, `categoria`, `preco`, `descricao`, `plataforma`) VALUES
(1, 'Assassin\'s Creed Unity', 'ação', '8.50', ' É estrelado por Arno Dorian, um jovem que teve seu pai assassinado quando ainda era criança e, assim, acaba trabalhando como servo na casa de alguns nobres franceses', 'Xbox One'),
(2, 'Call of Duty: WWII', 'tiro', '35.00', 'Tem como foco às ações de um esquadrão de 1944 a 1945 no campo de batalha europeu, enquanto as forças Aliadas começam a ganhar força em seu caminho à Alemanha.', 'PlayStation 4'),
(3, 'Outlast 2', 'terror', '65.00', 'Blake Langermann, um jornalista investigativo e cinegrafista, e sua esposa Lynn Langermann, que trabalham juntos, sofrem um acidente de helicóptero na região de Supai, localizada no Planalto do Colorado, Arizona, enquanto investigavam o misterioso assassinato de uma jovem grávida conhecida apenas como Jane Doe.', 'PlayStation 4'),
(4, 'Crash Bandicoot 4: It\'s About Time', 'aventura', '125.00', 'Crash está relaxando e explorando sua ilha em seu tempo, 1998, quando ele encontra uma máscara misteriosa escondida em uma caverna, a Lani-Loli. A máscara é uma das Máscaras Quânticas e aparentemente conhece Aku-Aku, a máscara amiga de Crash!', 'Xbox One'),
(5, 'Forza Horizon 4', 'corrida', '74.50', 'A proposta de Forza Horizon 4 é te levar para uma competição em uma região que é apaixonada por velocidade.', 'Xbox One');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Administrador', 'admin@admin.com', 'admin'),
(3, 'Teste 01', 'teste1@teste.com', 'teste'),
(5, 'Teste 02', 'teste2@teste.com', 'teste'),
(6, 'Teste 03', 'teste3@teste.com', 'teste');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `compra`
--
ALTER TABLE `compra`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `games`
--
ALTER TABLE `games`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
