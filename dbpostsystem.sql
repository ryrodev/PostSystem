-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27/09/2023 às 19:01
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbtest`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_text` text NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `posts`
--

INSERT INTO `posts` (`post_id`, `post_text`, `post_date`) VALUES
(28, 'github.com/ryrodev', '2023-09-27 16:54:31'),
(30, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sit amet quam rhoncus, egestas dui eget, malesuada justo. Ut aliquam augue.', '2023-09-27 16:55:39'),
(31, 'Malesuada justo. Ut aliquam augue.', '2023-09-27 16:55:43'),
(32, 'consectetur adipiscing elit.', '2023-09-27 16:55:44'),
(33, 'Lorem ipsum dolor sit amet consectetue', '2023-09-27 16:55:45'),
(34, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sit amet quam rhoncus, egestas dui eget, malesuada justo. Ut aliquam augue.', '2023-09-27 16:55:46'),
(35, 'github.com/ryrodev', '2023-09-27 16:57:11');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
