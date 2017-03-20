-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19-Mar-2017 às 23:08
-- Versão do servidor: 5.6.15
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clientes`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `cpf`) VALUES
(1, 'Gabriela Rayssa Rodrigues', '39101160940');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato_clientes`
--

CREATE TABLE `contato_clientes` (
  `id` int(11) NOT NULL,
  `logadouro` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `email` varchar(80) NOT NULL,
  `celular` varchar(40) NOT NULL,
  `id_clientes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contato_clientes`
--

INSERT INTO `contato_clientes` (`id`, `logadouro`, `bairro`, `email`, `celular`, `id_clientes`) VALUES
(1, 'Praça das Bandeiras 945', 'Centro', 'gabriela_r_rodrigues@hotmail.com', '47988282525', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contato_clientes`
--
ALTER TABLE `contato_clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_clientes` (`id_clientes`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `contato_clientes`
--
ALTER TABLE `contato_clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `contato_clientes`
--
ALTER TABLE `contato_clientes`
  ADD CONSTRAINT `contato_clientes_ibfk_1` FOREIGN KEY (`id_clientes`) REFERENCES `clientes` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
