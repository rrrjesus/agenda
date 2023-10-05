-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/10/2023 às 22:53
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `smsub`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `smsubs`
--

CREATE TABLE `smsubs` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL DEFAULT '',
  `zip_code` varchar(10) NOT NULL,
  `logo` varchar(255) NOT NULL DEFAULT 'logo_assinatura_smsub.png',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `smsubs`
--

INSERT INTO `smsubs` (`id`, `name`, `street`, `zip_code`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'SMSUB', 'Rua Líbero Badaró, 504 - Edifício Martinelli - Centro', '01008-906', 'logo_assinatura_smsub.png', '2023-10-05 15:05:34', NULL),
(2, 'ARICANDUVA / FORMOSA / CARRÃO', 'Rua Atucuri, 699 - Vila Carrão', '03411-000', 'logo_assinatura_sub_aricanduva.png', '2023-10-05 15:07:17', NULL),
(3, 'BUTANTÃ', 'Rua Dr. Ulpiano da Costa Manso, 201 - Jardim Peri Peri', '05538-000', 'logo_assinatura_sub_butanta.png', '2023-10-05 18:33:44', NULL),
(4, 'CAMPO LIMPO', 'Rua Nossa Senhora do Bom Conselho, 59 - Chacara Nossa Sra. do Bom Conselho', '05763-470', 'logo_assinatura_sub_campo_limpo.png', '2023-10-05 18:49:13', NULL),
(5, 'CAPELA DO SOCORRO', 'Rua Cassiano dos Santos, 499 - Morumbi', '04827-110', 'logo_assinatura_sub_capela_do_socorro.png', '2023-10-05 19:22:19', NULL),
(6, 'CASA VERDE', 'Av. Ordem e Progresso, 1001 - Jardim das Laranjeiras', '02518-130', 'logo_assinatura_sub_casa_verde.png', '2023-10-05 19:26:10', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `smsubs`
--
ALTER TABLE `smsubs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `smsubs`
--
ALTER TABLE `smsubs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
