-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13-Jun-2018 às 19:49
-- Versão do servidor: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imobiliariadb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `concelho`
--

CREATE TABLE `concelho` (
  `idConcelho` int(11) UNSIGNED NOT NULL,
  `concelho` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `idIlha` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `concelho`
--

INSERT INTO `concelho` (`idConcelho`, `concelho`, `idIlha`) VALUES
(1, 'Vila do Porto', 1),
(2, 'Lagoa', 2),
(3, 'Nordeste', 2),
(4, 'Ponta Delgada', 2),
(5, 'Vila da Povoação', 2),
(6, 'Ribeira Grande', 2),
(7, 'Vila Franca do Campo', 2),
(8, 'Angra do Heroísmo', 3),
(9, 'Praia da Vitória', 3),
(10, 'Santa Cruz da Graciosa', 6),
(11, 'Calheta de São Jorge', 4),
(12, 'Velas', 4),
(13, 'Lajes do Pico', 5),
(14, 'Madalena', 5),
(15, 'São Roque do Pico', 5),
(16, 'Horta', 7),
(17, 'Lajes das Flores', 8),
(18, 'Santa Cruz das Flores', 8),
(19, 'Vila do Corvo', 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `destaque`
--

CREATE TABLE `destaque` (
  `idImovel` int(10) UNSIGNED NOT NULL,
  `destacado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `destaque`
--

INSERT INTO `destaque` (`idImovel`, `destacado`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `extras`
--

CREATE TABLE `extras` (
  `idImovel` int(11) UNSIGNED NOT NULL,
  `tipologia` int(11) UNSIGNED NOT NULL,
  `quartos` tinyint(3) UNSIGNED NOT NULL,
  `casasBanho` tinyint(3) UNSIGNED NOT NULL,
  `garagem` tinyint(1) NOT NULL,
  `piscina` tinyint(1) NOT NULL,
  `mobilia` tinyint(1) NOT NULL,
  `dataConstrucao` date NOT NULL,
  `informacao` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `finalidade`
--

CREATE TABLE `finalidade` (
  `idFinalidade` int(11) UNSIGNED NOT NULL,
  `finalidade` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `finalidade`
--

INSERT INTO `finalidade` (`idFinalidade`, `finalidade`) VALUES
(1, 'Comprar'),
(2, 'Arrendar');

-- --------------------------------------------------------

--
-- Estrutura da tabela `freguesia`
--

CREATE TABLE `freguesia` (
  `idFreguesia` int(11) UNSIGNED NOT NULL,
  `freguesia` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `idConcelho` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `freguesia`
--

INSERT INTO `freguesia` (`idFreguesia`, `freguesia`, `idConcelho`) VALUES
(1, 'Almagreira', 1),
(2, 'Santa Bárbara', 1),
(3, 'Santo Espírito', 1),
(4, 'São Pedro', 1),
(5, 'Vila do Porto', 1),
(6, 'Vila de Água de Pau', 2),
(7, 'Cabouco', 2),
(8, 'Rosário', 2),
(9, 'Ribeira Chã', 2),
(10, 'Santa Cruz', 2),
(11, 'Achada', 3),
(12, 'Achadinha', 3),
(13, 'Algarvia', 3),
(14, 'Lomba da Fazenda', 3),
(15, 'Nordeste', 3),
(16, 'Salga', 3),
(17, 'Santana', 3),
(18, 'Santo António de Nordestinho', 3),
(19, 'São Pedro de Nordestinho', 3),
(20, 'Ajuda da Bretanha', 4),
(21, 'Arrifes', 4),
(22, 'Candelária', 4),
(23, 'Vila das Capelas', 4),
(24, 'Covoada', 4),
(25, 'Fajã de Baixo', 4),
(26, 'Fajã de Cima', 4),
(27, 'Fenais da Luz', 4),
(28, 'Feteiras', 4),
(29, 'Ginetes', 4),
(30, 'Livramento', 4),
(31, 'Mosteiros', 4),
(32, 'Pilar da Bretanha', 4),
(33, 'Relva', 4),
(34, 'Remédios', 4),
(35, 'Santa Bárbara', 4),
(36, 'Santa Clara (Ponta Delgada)', 4),
(37, 'Santo António', 4),
(38, 'São José (Ponta Delgada)', 4),
(39, 'São Pedro (Ponta Delgada)', 4),
(40, 'São Roque', 4),
(41, 'São Sebastião (Ponta Delgada)', 4),
(42, 'São Vicente Ferreira', 4),
(43, 'Sete Cidades', 4),
(44, 'Água Retorta', 5),
(45, 'Faial da Terra', 5),
(46, 'Furnas', 5),
(47, 'Remédios', 5),
(48, 'Povoação', 5),
(49, 'Ribeira Quente', 5),
(50, 'Calhetas', 6),
(51, 'Conceição (Ribeira Grande)', 6),
(52, 'Fenais da Ajuda', 6),
(53, 'Lomba da Maia', 6),
(54, 'Lomba de São Pedro', 6),
(55, 'Maia', 6),
(56, 'Matriz (Ribeira Grande)', 6),
(57, 'Pico da Pedra', 6),
(58, 'Porto Formoso', 6),
(59, 'Vila de Rabo de Peixe', 6),
(60, 'Ribeira Seca', 6),
(61, 'Ribeirinha', 6),
(62, 'Santa Bárbara', 6),
(63, 'São Brás', 6),
(64, 'Água de Alto', 7),
(65, 'Ponta Garça', 7),
(66, 'Ribeira das Tainhas', 7),
(67, 'Ribeira Seca', 7),
(68, 'São Miguel (Vila Franca do Campo)', 7),
(69, 'São Pedro (Vila Franca do Campo)', 7),
(70, 'Altares', 8),
(71, 'Cinco Ribeiras', 8),
(72, 'Doze Ribeiras', 8),
(73, 'Feteira', 8),
(74, 'Conceição (Angra do Heroísmo)', 8),
(75, 'Porto Judeu', 8),
(76, 'Posto Santo', 8),
(77, 'Raminho', 8),
(78, 'Ribeirinha', 8),
(79, 'Santa Bárbara', 8),
(80, 'Santa Luzia (Angra do Heroísmo)', 8),
(81, 'São Bartolomeu dos Regatos', 8),
(82, 'São Bento (Angra do Heroísmo)', 8),
(83, 'São Mateus da Calheta', 8),
(84, 'São Pedro (Angra do Heroísmo)', 8),
(85, 'Sé (Angra do Heroísmo)', 8),
(86, 'Serreta', 8),
(87, 'Terra Chã', 8),
(88, 'Vila de São Sebastião', 8),
(89, 'Agualva', 9),
(90, 'Biscoitos', 9),
(91, 'Cabo da Praia', 9),
(92, 'Fonte do Bastardo', 9),
(93, 'Fontinhas', 9),
(94, 'Vila das Lajes', 9),
(95, 'Porto Martins', 9),
(96, 'Santa Cruz (Praia da Vitória)', 9),
(97, 'Quatro Ribeiras', 9),
(98, 'São Brás', 9),
(99, 'Vila Nova', 9),
(100, 'Guadalupe', 10),
(101, 'Luz', 10),
(102, 'São Mateus', 10),
(103, 'Santa Cruz da Graciosa', 10),
(104, 'Calheta', 11),
(105, 'Norte Pequeno', 11),
(106, 'Ribeira Seca', 11),
(107, 'Santo Antão', 11),
(108, 'Vila do Topo', 11),
(109, 'Manadas', 12),
(110, 'Norte Grande', 12),
(111, 'Rosais', 12),
(112, 'Santo Amaro', 12),
(113, 'Urzelina', 12),
(114, 'Velas', 12),
(115, 'Calheta de Nesquim', 13),
(116, 'Lajes do Pico', 13),
(117, 'Piedade', 13),
(118, 'Ribeiras', 13),
(119, 'Ribeirinha', 13),
(120, 'São João', 13),
(121, 'Bandeiras', 14),
(122, 'Candelária', 14),
(123, 'Criação Velha', 14),
(124, 'Madalena', 14),
(125, 'São Caetano', 14),
(126, 'São Mateus', 14),
(127, 'Prainha', 15),
(128, 'Santa Luzia', 15),
(129, 'Santo Amaro', 15),
(130, 'Santo António', 15),
(131, 'São Roque do Pico', 15),
(132, 'Angústias (Horta)', 16),
(133, 'Capelo', 16),
(134, 'Castelo Branco', 16),
(135, 'Cedros', 16),
(136, 'Conceição (Horta)', 16),
(137, 'Feteira', 16),
(138, 'Flamengos', 16),
(139, 'Matriz (Horta)', 16),
(140, 'Pedro Miguel', 16),
(141, 'Praia do Almoxarife', 16),
(142, 'Praia do Norte', 16),
(143, 'Ribeirinha', 16),
(144, 'Salão', 16),
(145, 'Fajã Grande', 17),
(146, 'Fajãzinha', 17),
(147, 'Fazenda', 17),
(148, 'Lajedo', 17),
(149, 'Lajes das Flores', 17),
(150, 'Lomba', 17),
(151, 'Mosteiro', 17),
(152, 'Caveira', 18),
(153, 'Cedros', 18),
(154, 'Ponta Delgada', 18),
(155, 'Santa Cruz', 18),
(156, 'Vila do Corvo', 19);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `idFuncionario` int(11) UNSIGNED NOT NULL,
  `email` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `nomeProprio` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `sobrenome` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `contacto` int(11) NOT NULL,
  `tipoUser` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`idFuncionario`, `email`, `password`, `nomeProprio`, `sobrenome`, `contacto`, `tipoUser`) VALUES
(1, 'admin@admin.pt', 'admin123', 'Admin', 'Admin', 919999999, 1),
(2, 'jose@jose.pt', '12345678', 'José', 'Morais', 919999999, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `galeria`
--

CREATE TABLE `galeria` (
  `idImagem` int(10) UNSIGNED NOT NULL,
  `idImovel` int(11) UNSIGNED NOT NULL,
  `nomeImagem` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ilha`
--

CREATE TABLE `ilha` (
  `idIlha` int(11) UNSIGNED NOT NULL,
  `ilha` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `ilha`
--

INSERT INTO `ilha` (`idIlha`, `ilha`) VALUES
(1, 'Santa Maria'),
(2, 'SÃ£o Miguel'),
(3, 'Terceira'),
(4, 'São Jorge'),
(5, 'Pico'),
(6, 'Graciosa'),
(7, 'Faial'),
(8, 'Flores'),
(9, 'Corvo');

-- --------------------------------------------------------

--
-- Stand-in structure for view `imoveisdestcados`
-- (See below for the actual view)
--
CREATE TABLE `imoveisdestcados` (
`idImovel` int(10) unsigned
,`destacado` tinyint(1)
,`gestor` int(11) unsigned
,`finalidade` int(11) unsigned
,`tipoImovel` int(11) unsigned
,`area` varchar(50)
,`preco` decimal(10,2) unsigned
,`descricao` varchar(500)
,`rua` varchar(100)
,`codPostal` varchar(9)
,`lat` double
,`long` double
,`idFreguesia` int(11) unsigned
,`situacao` enum('Ativo','Concluído')
,`estado` enum('Em obras','Pronto a habitar')
,`tipologia` int(11) unsigned
,`quartos` tinyint(3) unsigned
,`casasBanho` tinyint(3) unsigned
,`garagem` tinyint(1)
,`piscina` tinyint(1)
,`mobilia` tinyint(1)
,`dataConstrucao` date
,`informacao` varchar(500)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `imovel`
--

CREATE TABLE `imovel` (
  `idImovel` int(11) UNSIGNED NOT NULL,
  `gestor` int(11) UNSIGNED NOT NULL,
  `finalidade` int(11) UNSIGNED NOT NULL,
  `tipoImovel` int(11) UNSIGNED NOT NULL,
  `area` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `preco` decimal(10,2) UNSIGNED NOT NULL,
  `descricao` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `rua` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `codPostal` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `lat` double NOT NULL,
  `long` double NOT NULL,
  `idFreguesia` int(11) UNSIGNED NOT NULL,
  `situacao` enum('Ativo','Concluído') COLLATE utf8_unicode_ci NOT NULL,
  `estado` enum('Em obras','Pronto a habitar') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `imovel`
--

INSERT INTO `imovel` (`idImovel`, `gestor`, `finalidade`, `tipoImovel`, `area`, `preco`, `descricao`, `rua`, `codPostal`, `lat`, `long`, `idFreguesia`, `situacao`, `estado`) VALUES
(1, 2, 1, 2, '500m*500m', '1000000.00', 'Casa Muito Bonita', 'Rua do Amorim, 7-G', '9500-102', 37.7484039, -25.6668802, 38, 'Ativo', 'Em obras'),
(2, 2, 2, 3, 'ssdfs', '34234.00', 'sdgdfgd', 'fdgdfg', 'dfgdfg', 37.7724084, -25.7431675, 1, 'Ativo', 'Pronto a habitar');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipologia`
--

CREATE TABLE `tipologia` (
  `idTipologia` int(11) UNSIGNED NOT NULL,
  `tipologia` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tipologia`
--

INSERT INTO `tipologia` (`idTipologia`, `tipologia`) VALUES
(1, 'T0'),
(2, 'T1'),
(3, 'T2'),
(4, 'T3'),
(5, 'T4'),
(6, 'T5+');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_imovel`
--

CREATE TABLE `tipo_imovel` (
  `idTipoImovel` int(11) UNSIGNED NOT NULL,
  `tipoImovel` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tipo_imovel`
--

INSERT INTO `tipo_imovel` (`idTipoImovel`, `tipoImovel`) VALUES
(1, 'Apartamento'),
(2, 'Moradia'),
(3, 'Terreno'),
(4, 'Quinta'),
(5, 'Garagem'),
(6, 'Edificio de Habitação'),
(7, 'Duplex');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_user`
--

CREATE TABLE `tipo_user` (
  `idTipoUser` int(11) UNSIGNED NOT NULL,
  `tipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo_user`
--

INSERT INTO `tipo_user` (`idTipoUser`, `tipo`) VALUES
(1, 'Administrador'),
(2, 'Gestor');

-- --------------------------------------------------------

--
-- Stand-in structure for view `todosimoveis`
-- (See below for the actual view)
--
CREATE TABLE `todosimoveis` (
`idImovel` int(11) unsigned
,`gestor` int(11) unsigned
,`finalidade` int(11) unsigned
,`tipoImovel` int(11) unsigned
,`area` varchar(50)
,`preco` decimal(10,2) unsigned
,`descricao` varchar(500)
,`rua` varchar(100)
,`codPostal` varchar(9)
,`lat` double
,`long` double
,`idFreguesia` int(11) unsigned
,`situacao` enum('Ativo','Concluído')
,`estado` enum('Em obras','Pronto a habitar')
,`tipologia` int(11) unsigned
,`quartos` tinyint(3) unsigned
,`casasBanho` tinyint(3) unsigned
,`garagem` tinyint(1)
,`piscina` tinyint(1)
,`mobilia` tinyint(1)
,`dataConstrucao` date
,`informacao` varchar(500)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

CREATE TABLE `utilizador` (
  `idUser` int(11) UNSIGNED NOT NULL,
  `email` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `nomeProprio` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `sobrenome` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `contacto` int(11) UNSIGNED NOT NULL,
  `idFreguesia` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `visita`
--

CREATE TABLE `visita` (
  `idVisita` int(11) UNSIGNED NOT NULL,
  `user` int(11) UNSIGNED NOT NULL,
  `idImovel` int(11) UNSIGNED NOT NULL,
  `dataVisita` datetime NOT NULL,
  `estadoVisita` enum('Aceite','Não aceite','Em apreciação') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure for view `imoveisdestcados`
--
DROP TABLE IF EXISTS `imoveisdestcados`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `imoveisdestcados`  AS  select `destaque`.`idImovel` AS `idImovel`,`destaque`.`destacado` AS `destacado`,`imovel`.`gestor` AS `gestor`,`imovel`.`finalidade` AS `finalidade`,`imovel`.`tipoImovel` AS `tipoImovel`,`imovel`.`area` AS `area`,`imovel`.`preco` AS `preco`,`imovel`.`descricao` AS `descricao`,`imovel`.`rua` AS `rua`,`imovel`.`codPostal` AS `codPostal`,`imovel`.`lat` AS `lat`,`imovel`.`long` AS `long`,`imovel`.`idFreguesia` AS `idFreguesia`,`imovel`.`situacao` AS `situacao`,`imovel`.`estado` AS `estado`,`extras`.`tipologia` AS `tipologia`,`extras`.`quartos` AS `quartos`,`extras`.`casasBanho` AS `casasBanho`,`extras`.`garagem` AS `garagem`,`extras`.`piscina` AS `piscina`,`extras`.`mobilia` AS `mobilia`,`extras`.`dataConstrucao` AS `dataConstrucao`,`extras`.`informacao` AS `informacao` from ((`destaque` join `imovel` on((`destaque`.`idImovel` = `imovel`.`idImovel`))) left join `extras` on((`destaque`.`idImovel` = `extras`.`idImovel`))) where (`destaque`.`destacado` <> 0) ;

-- --------------------------------------------------------

--
-- Structure for view `todosimoveis`
--
DROP TABLE IF EXISTS `todosimoveis`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `todosimoveis`  AS  select `imovel`.`idImovel` AS `idImovel`,`imovel`.`gestor` AS `gestor`,`imovel`.`finalidade` AS `finalidade`,`imovel`.`tipoImovel` AS `tipoImovel`,`imovel`.`area` AS `area`,`imovel`.`preco` AS `preco`,`imovel`.`descricao` AS `descricao`,`imovel`.`rua` AS `rua`,`imovel`.`codPostal` AS `codPostal`,`imovel`.`lat` AS `lat`,`imovel`.`long` AS `long`,`imovel`.`idFreguesia` AS `idFreguesia`,`imovel`.`situacao` AS `situacao`,`imovel`.`estado` AS `estado`,`extras`.`tipologia` AS `tipologia`,`extras`.`quartos` AS `quartos`,`extras`.`casasBanho` AS `casasBanho`,`extras`.`garagem` AS `garagem`,`extras`.`piscina` AS `piscina`,`extras`.`mobilia` AS `mobilia`,`extras`.`dataConstrucao` AS `dataConstrucao`,`extras`.`informacao` AS `informacao` from (`imovel` left join `extras` on((`imovel`.`idImovel` = `extras`.`idImovel`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `concelho`
--
ALTER TABLE `concelho`
  ADD PRIMARY KEY (`idConcelho`),
  ADD KEY `fk_concelho_ilha_idx` (`idIlha`);

--
-- Indexes for table `destaque`
--
ALTER TABLE `destaque`
  ADD PRIMARY KEY (`idImovel`),
  ADD KEY `fk_idImovel_idImovel_idx` (`idImovel`);

--
-- Indexes for table `extras`
--
ALTER TABLE `extras`
  ADD PRIMARY KEY (`idImovel`),
  ADD KEY `fk_idImovel_extras` (`idImovel`),
  ADD KEY `fk_idTipologia_extras_idx` (`tipologia`);

--
-- Indexes for table `finalidade`
--
ALTER TABLE `finalidade`
  ADD PRIMARY KEY (`idFinalidade`);

--
-- Indexes for table `freguesia`
--
ALTER TABLE `freguesia`
  ADD PRIMARY KEY (`idFreguesia`),
  ADD KEY `fk_freguesia_1_idx` (`idConcelho`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`idFuncionario`),
  ADD KEY `fk_tipoUser_tipo_user_idx` (`tipoUser`);

--
-- Indexes for table `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`idImagem`),
  ADD KEY `fk_idImovel_galeria_idx` (`idImovel`);

--
-- Indexes for table `ilha`
--
ALTER TABLE `ilha`
  ADD PRIMARY KEY (`idIlha`);

--
-- Indexes for table `imovel`
--
ALTER TABLE `imovel`
  ADD PRIMARY KEY (`idImovel`),
  ADD KEY `fktipo_imovel_imovel_idx` (`tipoImovel`),
  ADD KEY `fk_idimovel_frequesia_idx` (`idFreguesia`),
  ADD KEY `fk_finalidade_idFinaldiade_idx` (`finalidade`),
  ADD KEY `fk_gestor_gestao` (`gestor`);

--
-- Indexes for table `tipologia`
--
ALTER TABLE `tipologia`
  ADD PRIMARY KEY (`idTipologia`);

--
-- Indexes for table `tipo_imovel`
--
ALTER TABLE `tipo_imovel`
  ADD PRIMARY KEY (`idTipoImovel`);

--
-- Indexes for table `tipo_user`
--
ALTER TABLE `tipo_user`
  ADD PRIMARY KEY (`idTipoUser`);

--
-- Indexes for table `utilizador`
--
ALTER TABLE `utilizador`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `fk_idFreguesia_user_idx` (`idFreguesia`);

--
-- Indexes for table `visita`
--
ALTER TABLE `visita`
  ADD PRIMARY KEY (`idVisita`),
  ADD KEY `fk_imovel_visita_idx` (`idImovel`),
  ADD KEY `fk_user_visita_idx` (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `concelho`
--
ALTER TABLE `concelho`
  MODIFY `idConcelho` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `extras`
--
ALTER TABLE `extras`
  MODIFY `idImovel` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `finalidade`
--
ALTER TABLE `finalidade`
  MODIFY `idFinalidade` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `freguesia`
--
ALTER TABLE `freguesia`
  MODIFY `idFreguesia` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `idFuncionario` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `galeria`
--
ALTER TABLE `galeria`
  MODIFY `idImagem` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ilha`
--
ALTER TABLE `ilha`
  MODIFY `idIlha` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `imovel`
--
ALTER TABLE `imovel`
  MODIFY `idImovel` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tipologia`
--
ALTER TABLE `tipologia`
  MODIFY `idTipologia` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tipo_imovel`
--
ALTER TABLE `tipo_imovel`
  MODIFY `idTipoImovel` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tipo_user`
--
ALTER TABLE `tipo_user`
  MODIFY `idTipoUser` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `utilizador`
--
ALTER TABLE `utilizador`
  MODIFY `idUser` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visita`
--
ALTER TABLE `visita`
  MODIFY `idVisita` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `concelho`
--
ALTER TABLE `concelho`
  ADD CONSTRAINT `concelho_ibfk_1` FOREIGN KEY (`idIlha`) REFERENCES `ilha` (`idIlha`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `destaque`
--
ALTER TABLE `destaque`
  ADD CONSTRAINT `destaque_ibfk_1` FOREIGN KEY (`idImovel`) REFERENCES `imovel` (`idImovel`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `extras`
--
ALTER TABLE `extras`
  ADD CONSTRAINT `extras_ibfk_1` FOREIGN KEY (`idImovel`) REFERENCES `imovel` (`idImovel`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `extras_ibfk_2` FOREIGN KEY (`tipologia`) REFERENCES `tipologia` (`idTipologia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `freguesia`
--
ALTER TABLE `freguesia`
  ADD CONSTRAINT `freguesia_ibfk_1` FOREIGN KEY (`idConcelho`) REFERENCES `concelho` (`idConcelho`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`tipoUser`) REFERENCES `tipo_user` (`idTipoUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `galeria`
--
ALTER TABLE `galeria`
  ADD CONSTRAINT `galeria_ibfk_1` FOREIGN KEY (`idImovel`) REFERENCES `imovel` (`idImovel`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `imovel`
--
ALTER TABLE `imovel`
  ADD CONSTRAINT `imovel_ibfk_1` FOREIGN KEY (`tipoImovel`) REFERENCES `tipo_imovel` (`idTipoImovel`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `imovel_ibfk_2` FOREIGN KEY (`idFreguesia`) REFERENCES `freguesia` (`idFreguesia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `imovel_ibfk_3` FOREIGN KEY (`finalidade`) REFERENCES `finalidade` (`idFinalidade`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `imovel_ibfk_4` FOREIGN KEY (`gestor`) REFERENCES `funcionario` (`idFuncionario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `utilizador`
--
ALTER TABLE `utilizador`
  ADD CONSTRAINT `utilizador_ibfk_1` FOREIGN KEY (`idFreguesia`) REFERENCES `freguesia` (`idFreguesia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `visita`
--
ALTER TABLE `visita`
  ADD CONSTRAINT `visita_ibfk_1` FOREIGN KEY (`idImovel`) REFERENCES `imovel` (`idImovel`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `visita_ibfk_2` FOREIGN KEY (`user`) REFERENCES `utilizador` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;