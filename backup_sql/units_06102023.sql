-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07/10/2023 às 04:32
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
-- Estrutura para tabela `units`
--

CREATE TABLE `units` (
  `id` int(2) NOT NULL,
  `sigla` varchar(8) DEFAULT NULL,
  `name` varchar(27) DEFAULT NULL,
  `street` varchar(74) DEFAULT NULL,
  `zip_code` varchar(9) DEFAULT NULL,
  `logo` varchar(34) DEFAULT NULL,
  `it_professional` varchar(36) DEFAULT NULL,
  `telephone` varchar(9) DEFAULT NULL,
  `ramal` varchar(4) DEFAULT NULL,
  `cell_phone` varchar(10) DEFAULT NULL,
  `email` varchar(41) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `units`
--

INSERT INTO `units` (`id`, `sigla`, `name`, `street`, `zip_code`, `logo`, `it_professional`, `telephone`, `ramal`, `cell_phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 'SUB - AF', 'ARICANDUVA', 'Rua Atucuri, 699 - Chácara Santo Antônio (Zona Leste)', '03411-000', 'logo_ass_aricanduva', 'Valdir Benedito Rodrigues Barcelos', '', '', '', 'vbarcelos@smsub.prefeitura.sp.gov.br', '2023-10-06 20:47:49', NULL),
(2, 'SUB - BT', 'BUTANTA', 'Rua Ulpiano da Costa Manso, 201 -  Jardim Peri Peri', '05538-000', 'logo_ass_butanta', 'Ronaldo Carlos Iusi', '', '', '98362-1091', 'ronaldoiusi@smsub.prefeitura.sp.gov.br', '2023-10-06 20:47:49', NULL),
(3, 'SUB - CL', 'CAMPO LIMPO', 'Rua Nossa Sra. do Bom Conselho, 59 - Jardim', '05763-470', 'logo_ass_campo_limpo', 'Darcio Luiz Americo Silva', '33970564', '', '94598-6415', 'darcioamerico@smsub.prefeitura.sp.gov.br', '2023-10-06 20:47:49', NULL),
(4, 'SUB - CS', 'CAPELA DO SOCORRO', 'Rua Cassiano dos Santos, 499 - Rio Bonito', '04827-110', 'logo_ass_capela_do_socorro', 'Edmilson Atanásio de Moraes Junior', '3397-2716', '', '98351-6716', 'edmilsonmoraes@smsub.prefeitura.sp.gov.br', '2023-10-06 20:47:49', NULL),
(5, 'SUB - CV', 'CASA VERDE', 'Av. Ordem e Progresso, 1001 - Jardim das Laranjeiras', '02518-130', 'logo_ass_casa_verde', 'Leandro José Santos da Cruz', '', '', '99354-3544', 'ljcruz@smsub.prefeitura.sp.gov.br', '2023-10-06 20:47:49', NULL),
(6, 'SUB - AD', 'CIDADE ADEMAR', 'Av. Yervant Kissajikian. 416 - Vila Constança', '04657-000', 'logo_ass_cidade_ademar', 'Acir Lopes de Andrade ', '5670-7056', '', '99558-9269', 'acirandrade@smsub.prefeitura.sp.gov.br', '2023-10-06 20:47:49', NULL),
(7, 'SUB - CT', 'CIDADE TIRADENTES', 'Estrado do Iguatemi, 2751 -  Jardim Pedra Branca', '08490-500', 'logo_ass_cidade_tiradentes', 'Samuel Vilela', '3396-0075', '42', '96226-5551', 'svilela@smsub.prefeitura.sp.gov.br', '2023-10-06 20:47:49', NULL),
(8, 'SUB - EM', 'ERMELINDO MATARAZZO', 'Av. São Miguel, 5550 - Parque Boturussu', '03871-100', 'logo_ass_ermelino_matarazzo', 'Alecio Gasperine JR', '2026-9326', '', '97193-9941', 'agasperini@smsub.prefeitura.sp.gov.br', '2023-10-06 20:47:49', '2023-10-07 01:07:20'),
(9, 'SUB - FO', 'FREGUESIA BRASILANDIA', 'Av. João Marcelino Branco, 95 - Vila dos Andrades', '02610-000', 'logo_ass_freguesia_brasilandia', 'Marcelo Bizerra', '', '', '99396-6068', 'marcelobizerra@smsub.prefeitura.sp.gov.br', '2023-10-06 20:47:49', '2023-10-07 01:04:57'),
(10, 'SUB - G', 'GUAIANASES', 'Estrada Itaquera-Guaianases, 2561 - Jardim Helena', '08420-000', 'logo_ass_guaianases', 'Jorge Manoel Rodrigues Ferreira', '2392-1030', '1031', '99121-3191', 'jferreira@smsub.prefeitura.sp.gov.br', '2023-10-06 20:47:49', NULL),
(11, 'SUB - IP', 'IPIRANGA', 'Rua Lino Coutinho, 444 - Ipiranga', '04207-000', 'logo_ass_ipiranga', 'Marcela Fasolin Ferreira', '2808-3651', '', '93255-5887', 'marcelafasolin@smsub.prefeitura.sp.gov.br', '2023-10-06 20:47:49', NULL),
(12, 'SUB - IT', 'ITAIM PAULISTA', 'Av. Marechal Tito, 3012 - Jardim Silva Teles', '08160-495', 'logo_ass_itaim_paulista', 'Marcelo Cleto Egidio', '', '', '99202-6262', 'mcegidio@smsub.prefeitura.sp.gov.br', '2023-10-06 20:47:49', NULL),
(13, 'SUB - IQ', 'ITAQUERA', 'Rua Augusto Carlos Bauman, 851 - Itaquera', '08210-590', 'logo_ass_itaquera', 'Renan Alves Pereira', '2070-1716', '', '97601-8789', 'renanalves@smsub.prefeitura.sp.gov.br', '2023-10-06 20:47:49', NULL),
(14, 'SUB - JA', 'JABAQUARA', 'Av. Engenheiro Armando de Arruda Pereira, 2314 - Vila Fachini', '04309-011', 'logo_ass_jabaquara', 'Caue Viera Mariano', '3397-3204', '', '96042-2764', 'cvmariano@smsub.prefeitura.sp.gov.br', '2023-10-06 20:47:49', NULL),
(15, 'SUB - JT', 'JAÇANÃ TREMEMBÉ', 'Av. Luis Stamatis, 300 - Vila Constança', '02260-000', 'logo_ass_jacana_tremembe', 'Douglas Eduardo Caldeira de Oliveira', '3218-4700', '4772', '97094-9665', 'decoliveira@smsub.prefeitura.sp.gov.br', '2023-10-06 20:47:49', '2023-10-07 01:45:05'),
(16, 'SUB - LA', 'LAPA', 'Rua Guaicurus, 1000 - Água Branca', '05033-002', 'logo_ass_lapa', 'Cleiton Luiz Nascimento Cantao', '', '', '98279-6769', 'ccantao@smsub.prefeitura.sp.gov.br', '2023-10-06 20:47:49', NULL),
(17, 'SUB - MB', 'M BOI MIRIM', 'Av. Guarapiranga, 1695 - Jardim das Flores', '04902-015', 'logo_ass_m_boi_mirim', 'Irapuan Farias de Menezes', '3396-8513', '', '97498-1380', 'ifmenezes@smsub.prefeitura.sp.gov.br', '2023-10-06 20:47:49', NULL),
(18, 'SUB - MO', 'MOOCA', 'Rua Taquari, 549 - Mooca', '03621-000', 'logo_ass_mooca', 'Enio Marcelo Alencar Silva', '2618-9136', '9135', '', 'emalencar@smsub.prefeitura.sp.gov.br', '2023-10-06 20:47:49', NULL),
(19, 'SUB - PA', 'PARELHEIROS', 'Av. Sadamu Inoue, 5252 - Parelheiros', '04890-380', 'logo_ass_parelheiros', 'Emerson da Silva Cardozo', '5926-6504', '', '96052-1027', 'ecardozo@smsub.prefeitura.sp.gov.br', '2023-10-06 20:47:49', NULL),
(20, 'SUB - PE', 'PENHA', 'Rua Candapuí, 492 - Vila Marieta', '03621-000', 'logo_ass_penha', 'Joseylton Sales de Almeida', '', '', '96730-4576', 'jsalmeida@smsub.prefeitura.sp.gov.br', '2023-10-06 20:47:49', NULL),
(21, 'SUB - PR', 'PERUS', 'Rua Ylídio Figueiredo, 349 - Vila Perus', '05204-020', 'logo_ass_perus', 'Paulo Sérgio Monteiro', '', '', '96417-5495', 'paulom@smsub.prefeitura.sp.gov.br', '2023-10-06 20:47:49', NULL),
(22, 'SUB - PI', 'PINHEIROS', 'Av. Nações Unidas, 7123 - Alto de Pinheiros', '05425-070', 'logo_ass_pinheiros', 'Robinson Alexandre Ferreira', '3095-9557', '', '97690-7791', 'ralexandref@smsub.prefeitura.sp.gov.br', '2023-10-06 20:47:49', NULL),
(23, 'SUB - PJ', 'PIRITUBA JARAGUA', 'Rua Carlos da Cunha Mattos, 67 - Chácara Inglesa', '05140-040', 'logo_ass_pirituba jaragua', 'Túlio César Zachello', '3973-2617', '', '99419-2717', 'tzachello@smsub.prefeitura.sp.gov.br', '2023-10-06 20:47:49', NULL),
(24, 'SUB - ST', 'SANTANA TUCURUVI', 'Av. Tucuruvi, 808 - Tucuruvi', '02304-002', 'logo_ass_santana_tucuruvi', 'Miriam Aparecida Fernandes Martins', '2987-3844', '', '95884-6711', 'mafmartins@smsub.prefeitura.sp.gov.br', '2023-10-06 20:47:49', NULL),
(25, 'SUB - SA', 'SANTO AMARO', 'Praça Floreano Peixoto, 54 - Santo Amaro', '04751-030', 'logo_ass_santo_amaro', 'Enoel Francisco Ramos Junior', '3396-6137', '', '97383-0146', 'erjunior@smsub.prefeitura.sp.gov.br', '2023-10-06 20:47:49', NULL),
(26, 'SUB - SB', 'SAPOPEMBA', 'Av. Sapopemba, 9064 - Jardim Adutora', '03988-010', 'logo_ass_sapopemba', 'Messias Lopes Souza', '2701-1468', '', '97627-7647', 'msouza@smsub.prefeitura.sp.gov.br', '2023-10-06 20:47:49', NULL),
(27, 'SUB - SM', 'SAO MATEUS', 'Av. Ragueb Chohfi, 1400 - Jardim Três Marias', '08375-000', 'logo_ass_sao_mateus', 'Lenilson Yoshino Alves', '3397-1116', '', '98204-3167', 'lyoshino@smsub.prefeitura.sp.gov.br', '2023-10-06 20:47:49', NULL),
(28, 'SUB - MP', 'SAO MIGUEL PAULISTA', 'Rua Dona Ana Flora Pinheiro de Sousa, 76- Vila Jacui', '08060-150', 'logo_ass_sao_miguel_paulista', 'Agnaldo Kendi Kussaba', '2030-3751', '', '', 'kendi@smsub.prefeitura.sp.gov.br', '2023-10-06 20:47:49', NULL),
(29, 'SUB - SE', 'SE', 'Rua Álvares Penteado, 49 - Centro Histórico de São Paulo', '01012-001', 'logo_ass_se', 'Carlos Roberto Mancini Junior', '3397-1227', '', '98945-4736', 'cmancini@smsub.prefeitura.sp.gov.br', '2023-10-06 20:47:49', NULL),
(30, 'SUB - MG', 'VILA MARIA / VILA GUILHERME', 'Rua General Mendes, 111 - Vila Maria Alta', '02127-020', 'logo_ass_vila_maria_vila_guilherme', 'Eliseu Esau dos Santos', '2967-8100', '8081', '99328-1998', 'eesantos@smsub.prefeitura.sp.gov.br', '2023-10-06 20:47:49', NULL),
(31, 'SUB - VM', 'VILA MARIANA', 'Rua José de Magalhões, 500 - Vila Clementino', '04026-090', 'logo_ass_vila_mariana', 'Katia Midori Nagamine Arakaki', '3397-4110', '', '98459-6359', 'karakaki@smsub.prefeitura.sp.gov.br', '2023-10-06 20:47:49', NULL),
(32, 'SUB - VP', 'VILA PRUDENTE', 'Av. do Oratório, 172 - Vila Prudente', '03220-000', 'logo_ass_vila_prudente', 'Miriã Romano Carvalho da Silva', '3397-0841', '', '97288-8812', 'mrcarvalho@smsub.prefeitura.sp.gov.br', '2023-10-06 20:47:49', NULL),
(33, 'SMSUB', 'LIBERO BADARO', 'Rua Líbero Badaró, 504 - Edifício Martinelli - Centro', '01008-906', 'logo_ass_smsub', NULL, '4934-3000', NULL, NULL, NULL, '2023-10-06 20:51:59', NULL),
(34, 'SMSUB', 'SAO BENTO', 'Rua São Bento, 405 - Edifício Martinelli - Centro', '01011-100', 'logo_ass_smsub', NULL, NULL, NULL, NULL, NULL, '2023-10-06 20:54:13', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `units`
--
ALTER TABLE `units`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
