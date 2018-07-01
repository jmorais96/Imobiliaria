-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 01-Jul-2018 às 18:26
-- Versão do servidor: 5.7.21
-- PHP Version: 5.6.35

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

DROP TABLE IF EXISTS `concelho`;
CREATE TABLE IF NOT EXISTS `concelho` (
  `idConcelho` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `concelho` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `idIlha` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`idConcelho`),
  KEY `fk_concelho_ilha_idx` (`idIlha`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `concelho`
--

INSERT INTO `concelho` (`idConcelho`, `concelho`, `idIlha`) VALUES
(1, 'Vila do Porto', 1),
(2, 'Lagoa', 2),
(3, 'Nordeste', 2),
(4, 'Ponta Delgada', 2),
(5, 'Vila da PovoaÃ§Ã£o', 2),
(6, 'Ribeira Grande', 2),
(7, 'Vila Franca do Campo', 2),
(8, 'Angra do HeroÃ­smo', 3),
(9, 'Praia da VitÃ³ria', 3),
(10, 'Santa Cruz da Graciosa', 6),
(11, 'Calheta de SÃ£o Jorge', 4),
(12, 'Velas', 4),
(13, 'Lajes do Pico', 5),
(14, 'Madalena', 5),
(15, 'SÃ£o Roque do Pico', 5),
(16, 'Horta', 7),
(17, 'Lajes das Flores', 8),
(18, 'Santa Cruz das Flores', 8),
(19, 'Vila do Corvo', 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `destaque`
--

DROP TABLE IF EXISTS `destaque`;
CREATE TABLE IF NOT EXISTS `destaque` (
  `idImovel` int(10) UNSIGNED NOT NULL,
  `destacado` tinyint(1) NOT NULL,
  PRIMARY KEY (`idImovel`),
  KEY `fk_idImovel_idImovel_idx` (`idImovel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `destaque`
--

INSERT INTO `destaque` (`idImovel`, `destacado`) VALUES
(1, 1),
(2, 0),
(3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `extras`
--

DROP TABLE IF EXISTS `extras`;
CREATE TABLE IF NOT EXISTS `extras` (
  `idImovel` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tipologia` int(11) UNSIGNED NOT NULL,
  `quartos` tinyint(3) UNSIGNED NOT NULL,
  `casasBanho` tinyint(3) UNSIGNED NOT NULL,
  `garagem` tinyint(1) NOT NULL,
  `piscina` tinyint(1) NOT NULL,
  `mobilia` tinyint(1) NOT NULL,
  `dataConstrucao` date NOT NULL,
  `informacao` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idImovel`),
  KEY `fk_idImovel_extras` (`idImovel`),
  KEY `fk_idTipologia_extras_idx` (`tipologia`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `extras`
--

INSERT INTO `extras` (`idImovel`, `tipologia`, `quartos`, `casasBanho`, `garagem`, `piscina`, `mobilia`, `dataConstrucao`, `informacao`) VALUES
(1, 3, 5, 2, 1, 1, 0, '2018-06-19', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `finalidade`
--

DROP TABLE IF EXISTS `finalidade`;
CREATE TABLE IF NOT EXISTS `finalidade` (
  `idFinalidade` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `finalidade` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idFinalidade`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

DROP TABLE IF EXISTS `freguesia`;
CREATE TABLE IF NOT EXISTS `freguesia` (
  `idFreguesia` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `freguesia` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `idConcelho` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`idFreguesia`),
  KEY `fk_freguesia_1_idx` (`idConcelho`)
) ENGINE=InnoDB AUTO_INCREMENT=157 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `freguesia`
--

INSERT INTO `freguesia` (`idFreguesia`, `freguesia`, `idConcelho`) VALUES
(1, 'Almagreira', 1),
(2, 'Santa BÃ¡rbara', 1),
(3, 'Santo EspÃ­rito', 1),
(4, 'SÃ£o Pedro', 1),
(5, 'Vila do Porto', 1),
(6, 'Vila de Ãgua de Pau', 2),
(7, 'Cabouco', 2),
(8, 'RosÃ¡rio', 2),
(9, 'Ribeira ChÃ£', 2),
(10, 'Santa Cruz', 2),
(11, 'Achada', 3),
(12, 'Achadinha', 3),
(13, 'Algarvia', 3),
(14, 'Lomba da Fazenda', 3),
(15, 'Nordeste', 3),
(16, 'Salga', 3),
(17, 'Santana', 3),
(18, 'Santo AntÃ³nio de Nordestinho', 3),
(19, 'SÃ£o Pedro de Nordestinho', 3),
(20, 'Ajuda da Bretanha', 4),
(21, 'Arrifes', 4),
(22, 'CandelÃ¡ria', 4),
(23, 'Vila das Capelas', 4),
(24, 'Covoada', 4),
(25, 'FajÃ£ de Baixo', 4),
(26, 'FajÃ£ de Cima', 4),
(27, 'Fenais da Luz', 4),
(28, 'Feteiras', 4),
(29, 'Ginetes', 4),
(30, 'Livramento', 4),
(31, 'Mosteiros', 4),
(32, 'Pilar da Bretanha', 4),
(33, 'Relva', 4),
(34, 'RemÃ©dios', 4),
(35, 'Santa BÃ¡rbara', 4),
(36, 'Santa Clara (Ponta Delgada)', 4),
(37, 'Santo AntÃ³nio', 4),
(38, 'SÃ£o JosÃ© (Ponta Delgada)', 4),
(39, 'SÃ£o Pedro (Ponta Delgada)', 4),
(40, 'SÃ£o Roque', 4),
(41, 'SÃ£o SebastiÃ£o (Ponta Delgada)', 4),
(42, 'SÃ£o Vicente Ferreira', 4),
(43, 'Sete Cidades', 4),
(44, 'Ãgua Retorta', 5),
(45, 'Faial da Terra', 5),
(46, 'Furnas', 5),
(47, 'RemÃ©dios', 5),
(48, 'PovoaÃ§Ã£o', 5),
(49, 'Ribeira Quente', 5),
(50, 'Calhetas', 6),
(51, 'ConceiÃ§Ã£o (Ribeira Grande)', 6),
(52, 'Fenais da Ajuda', 6),
(53, 'Lomba da Maia', 6),
(54, 'Lomba de SÃ£o Pedro', 6),
(55, 'Maia', 6),
(56, 'Matriz (Ribeira Grande)', 6),
(57, 'Pico da Pedra', 6),
(58, 'Porto Formoso', 6),
(59, 'Vila de Rabo de Peixe', 6),
(60, 'Ribeira Seca', 6),
(61, 'Ribeirinha', 6),
(62, 'Santa BÃ¡rbara', 6),
(63, 'SÃ£o BrÃ¡s', 6),
(64, 'Ãgua de Alto', 7),
(65, 'Ponta GarÃ§a', 7),
(66, 'Ribeira das Tainhas', 7),
(67, 'Ribeira Seca', 7),
(68, 'SÃ£o Miguel (Vila Franca do Campo)', 7),
(69, 'SÃ£o Pedro (Vila Franca do Campo)', 7),
(70, 'Altares', 8),
(71, 'Cinco Ribeiras', 8),
(72, 'Doze Ribeiras', 8),
(73, 'Feteira', 8),
(74, 'ConceiÃ§Ã£o (Angra do HeroÃ­smo)', 8),
(75, 'Porto Judeu', 8),
(76, 'Posto Santo', 8),
(77, 'Raminho', 8),
(78, 'Ribeirinha', 8),
(79, 'Santa BÃ¡rbara', 8),
(80, 'Santa Luzia (Angra do HeroÃ­smo)', 8),
(81, 'SÃ£o Bartolomeu dos Regatos', 8),
(82, 'SÃ£o Bento (Angra do HeroÃ­smo)', 8),
(83, 'SÃ£o Mateus da Calheta', 8),
(84, 'SÃ£o Pedro (Angra do HeroÃ­smo)', 8),
(85, 'SÃ© (Angra do HeroÃ­smo)', 8),
(86, 'Serreta', 8),
(87, 'Terra ChÃ£', 8),
(88, 'Vila de SÃ£o SebastiÃ£o', 8),
(89, 'Agualva', 9),
(90, 'Biscoitos', 9),
(91, 'Cabo da Praia', 9),
(92, 'Fonte do Bastardo', 9),
(93, 'Fontinhas', 9),
(94, 'Vila das Lajes', 9),
(95, 'Porto Martins', 9),
(96, 'Santa Cruz (Praia da VitÃ³ria)', 9),
(97, 'Quatro Ribeiras', 9),
(98, 'SÃ£o BrÃ¡s', 9),
(99, 'Vila Nova', 9),
(100, 'Guadalupe', 10),
(101, 'Luz', 10),
(102, 'SÃ£o Mateus', 10),
(103, 'Santa Cruz da Graciosa', 10),
(104, 'Calheta', 11),
(105, 'Norte Pequeno', 11),
(106, 'Ribeira Seca', 11),
(107, 'Santo AntÃ£o', 11),
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
(120, 'SÃ£o JoÃ£o', 13),
(121, 'Bandeiras', 14),
(122, 'CandelÃ¡ria', 14),
(123, 'CriaÃ§Ã£o Velha', 14),
(124, 'Madalena', 14),
(125, 'SÃ£o Caetano', 14),
(126, 'SÃ£o Mateus', 14),
(127, 'Prainha', 15),
(128, 'Santa Luzia', 15),
(129, 'Santo Amaro', 15),
(130, 'Santo AntÃ³nio', 15),
(131, 'SÃ£o Roque do Pico', 15),
(132, 'AngÃºstias (Horta)', 16),
(133, 'Capelo', 16),
(134, 'Castelo Branco', 16),
(135, 'Cedros', 16),
(136, 'ConceiÃ§Ã£o (Horta)', 16),
(137, 'Feteira', 16),
(138, 'Flamengos', 16),
(139, 'Matriz (Horta)', 16),
(140, 'Pedro Miguel', 16),
(141, 'Praia do Almoxarife', 16),
(142, 'Praia do Norte', 16),
(143, 'Ribeirinha', 16),
(144, 'SalÃ£o', 16),
(145, 'FajÃ£ Grande', 17),
(146, 'FajÃ£zinha', 17),
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

DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE IF NOT EXISTS `funcionario` (
  `idFuncionario` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `nomeProprio` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `sobrenome` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `contacto` int(11) NOT NULL,
  `tipoUser` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`idFuncionario`),
  KEY `fk_tipoUser_tipo_user_idx` (`tipoUser`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`idFuncionario`, `email`, `password`, `nomeProprio`, `sobrenome`, `contacto`, `tipoUser`) VALUES
(1, 'admin@admin.pt', '0192023a7bbd73250516f069df18b500', 'Admin', 'Admin', 919999999, 1),
(2, 'jose@jose.pt', '25d55ad283aa400af464c76d713c07ad', 'JosÃ©', 'Morais', 919999999, 2),
(3, 'teste@teste.pt', '25d55ad283aa400af464c76d713c07ad', 'testes', 'testes', 919999999, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `galeria`
--

DROP TABLE IF EXISTS `galeria`;
CREATE TABLE IF NOT EXISTS `galeria` (
  `idImagem` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idImovel` int(11) UNSIGNED NOT NULL,
  `nomeImagem` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idImagem`),
  KEY `fk_idImovel_galeria_idx` (`idImovel`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `galeria`
--

INSERT INTO `galeria` (`idImagem`, `idImovel`, `nomeImagem`, `descricao`) VALUES
(1, 2, 'transferir(1).jpg', 'imagem 2-1'),
(2, 1, 'Como-Investir-em-Imoveis-3-min.jpg', 'imagem 1-1'),
(3, 1, 'transferir.jpg', 'imagem 1-2'),
(4, 3, '8407597849-apart-t2-c-lugar-de-garagem-sao-jose.jpg', NULL),
(5, 3, '8408789835-apart-t2-c-lugar-de-garagem-sao-jose.jpg', NULL),
(6, 3, '8413141203-apart-t2-c-lugar-de-garagem-sao-jose.jpg', NULL),
(7, 3, '8453477970-apart-t2-c-lugar-de-garagem-sao-jose.jpg', NULL),
(8, 3, '8455757798-apart-t2-c-lugar-de-garagem-sao-jose.jpg', NULL),
(9, 3, '8470524608-apart-t2-c-lugar-de-garagem-sao-jose.jpg', NULL),
(10, 3, '8476380394-apart-t2-c-lugar-de-garagem-sao-jose.jpg', NULL),
(11, 3, '8482623885-apart-t2-c-lugar-de-garagem-sao-jose.jpg', NULL),
(12, 3, '8489851074-apart-t2-c-lugar-de-garagem-sao-jose.jpg', NULL),
(13, 3, '8496094565-apart-t2-c-lugar-de-garagem-sao-jose.jpg', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ilha`
--

DROP TABLE IF EXISTS `ilha`;
CREATE TABLE IF NOT EXISTS `ilha` (
  `idIlha` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ilha` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idIlha`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `ilha`
--

INSERT INTO `ilha` (`idIlha`, `ilha`) VALUES
(1, 'Santa Maria'),
(2, 'SÃ£o Miguel'),
(3, 'Terceira'),
(4, 'SÃ£o Jorge'),
(5, 'Pico'),
(6, 'Graciosa'),
(7, 'Faial'),
(8, 'Flores'),
(9, 'Corvo');

-- --------------------------------------------------------

--
-- Stand-in structure for view `imoveisdestacados`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `imoveisdestacados`;
CREATE TABLE IF NOT EXISTS `imoveisdestacados` (
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
,`lng` double
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
-- Stand-in structure for view `imoveispropostos`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `imoveispropostos`;
CREATE TABLE IF NOT EXISTS `imoveispropostos` (
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
,`lng` double
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

DROP TABLE IF EXISTS `imovel`;
CREATE TABLE IF NOT EXISTS `imovel` (
  `idImovel` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `gestor` int(11) UNSIGNED NOT NULL,
  `finalidade` int(11) UNSIGNED NOT NULL,
  `tipoImovel` int(11) UNSIGNED NOT NULL,
  `area` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `preco` decimal(10,2) UNSIGNED NOT NULL,
  `descricao` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `rua` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `codPostal` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `idFreguesia` int(11) UNSIGNED NOT NULL,
  `situacao` enum('Ativo','Concluído') COLLATE utf8_unicode_ci NOT NULL,
  `estado` enum('Em obras','Pronto a habitar') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idImovel`),
  KEY `fktipo_imovel_imovel_idx` (`tipoImovel`),
  KEY `fk_idimovel_frequesia_idx` (`idFreguesia`),
  KEY `fk_finalidade_idFinaldiade_idx` (`finalidade`),
  KEY `fk_gestor_gestao` (`gestor`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `imovel`
--

INSERT INTO `imovel` (`idImovel`, `gestor`, `finalidade`, `tipoImovel`, `area`, `preco`, `descricao`, `rua`, `codPostal`, `lat`, `lng`, `idFreguesia`, `situacao`, `estado`) VALUES
(1, 2, 1, 2, '500m*500m', '1000000.00', 'Casa Muito Bonita', 'Rua do Amorim, 7-G', '9500-102', 37.7484039, -25.6668802, 38, 'Ativo', 'Em obras'),
(2, 2, 2, 3, 'ssdfs', '34234.00', 'sdgdfgd', 'fdgdfg', 'dfgdfg', 37.7724084, -25.7431675, 1, 'Ativo', 'Pronto a habitar'),
(3, 2, 1, 1, '106 mÂ²', '139.00', 'Apartamento T2 em Ã³timo estado de conservaÃ§Ã£o, orientado a poente. Situado na Rua do Paiol com estacionamento exterior privativo e ainda lugar de garagem e arrecadaÃ§Ã£o na cave.\r\nConstituÃ­do por: hall, sala, cozinha com zona de tratamento de roupa, corredor de acesso aos quartos com roupeiro, 2 quartos cama e w.c.', 'Rua do Paiol, nÂº8', '', 37.745380694564844, -25.68036550055922, 38, 'Ativo', 'Pronto a habitar');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipologia`
--

DROP TABLE IF EXISTS `tipologia`;
CREATE TABLE IF NOT EXISTS `tipologia` (
  `idTipologia` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tipologia` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idTipologia`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

DROP TABLE IF EXISTS `tipo_imovel`;
CREATE TABLE IF NOT EXISTS `tipo_imovel` (
  `idTipoImovel` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tipoImovel` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `iconMarcador` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idTipoImovel`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tipo_imovel`
--

INSERT INTO `tipo_imovel` (`idTipoImovel`, `tipoImovel`, `iconMarcador`) VALUES
(1, 'Apartamento', 'pin1.png'),
(2, 'Moradia', 'pin2.png'),
(3, 'Terreno', 'pin3.png'),
(4, 'Quinta', 'pin4.png'),
(5, 'Garagem', 'pin5.png'),
(6, 'Edificio de HabitaÃ§Ã£o', 'pin6.png'),
(7, 'Duplex', 'pin7.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_user`
--

DROP TABLE IF EXISTS `tipo_user`;
CREATE TABLE IF NOT EXISTS `tipo_user` (
  `idTipoUser` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) NOT NULL,
  PRIMARY KEY (`idTipoUser`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

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
DROP VIEW IF EXISTS `todosimoveis`;
CREATE TABLE IF NOT EXISTS `todosimoveis` (
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
,`lng` double
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

DROP TABLE IF EXISTS `utilizador`;
CREATE TABLE IF NOT EXISTS `utilizador` (
  `idUser` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `nomeProprio` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `sobrenome` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `contacto` int(11) UNSIGNED NOT NULL,
  `idFreguesia` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_idFreguesia_user_idx` (`idFreguesia`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `utilizador`
--

INSERT INTO `utilizador` (`idUser`, `email`, `nomeProprio`, `sobrenome`, `password`, `contacto`, `idFreguesia`) VALUES
(3, 'jose.morais.96@hotmail.com', 'JosÃ©', 'Morais', '25d55ad283aa400af464c76d713c07ad', 919999999, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `visita`
--

DROP TABLE IF EXISTS `visita`;
CREATE TABLE IF NOT EXISTS `visita` (
  `idVisita` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user` int(11) UNSIGNED NOT NULL,
  `idImovel` int(11) UNSIGNED NOT NULL,
  `dataVisita` datetime NOT NULL,
  `estadoVisita` enum('Aceite','NÃ£o Aceite','Em apreciaÃ§Ã£o','') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idVisita`),
  KEY `fk_imovel_visita_idx` (`idImovel`),
  KEY `fk_user_visita_idx` (`user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `visita`
--

INSERT INTO `visita` (`idVisita`, `user`, `idImovel`, `dataVisita`, `estadoVisita`) VALUES
(1, 3, 1, '2018-06-21 10:29:00', 'Em apreciaÃ§Ã£o');

-- --------------------------------------------------------

--
-- Structure for view `imoveisdestacados`
--
DROP TABLE IF EXISTS `imoveisdestacados`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `imoveisdestacados`  AS  select `destaque`.`idImovel` AS `idImovel`,`destaque`.`destacado` AS `destacado`,`imovel`.`gestor` AS `gestor`,`imovel`.`finalidade` AS `finalidade`,`imovel`.`tipoImovel` AS `tipoImovel`,`imovel`.`area` AS `area`,`imovel`.`preco` AS `preco`,`imovel`.`descricao` AS `descricao`,`imovel`.`rua` AS `rua`,`imovel`.`codPostal` AS `codPostal`,`imovel`.`lat` AS `lat`,`imovel`.`lng` AS `lng`,`imovel`.`idFreguesia` AS `idFreguesia`,`imovel`.`situacao` AS `situacao`,`imovel`.`estado` AS `estado`,`extras`.`tipologia` AS `tipologia`,`extras`.`quartos` AS `quartos`,`extras`.`casasBanho` AS `casasBanho`,`extras`.`garagem` AS `garagem`,`extras`.`piscina` AS `piscina`,`extras`.`mobilia` AS `mobilia`,`extras`.`dataConstrucao` AS `dataConstrucao`,`extras`.`informacao` AS `informacao` from ((`destaque` join `imovel` on((`destaque`.`idImovel` = `imovel`.`idImovel`))) left join `extras` on((`destaque`.`idImovel` = `extras`.`idImovel`))) where (`destaque`.`destacado` <> 0) ;

-- --------------------------------------------------------

--
-- Structure for view `imoveispropostos`
--
DROP TABLE IF EXISTS `imoveispropostos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `imoveispropostos`  AS  select `destaque`.`idImovel` AS `idImovel`,`destaque`.`destacado` AS `destacado`,`imovel`.`gestor` AS `gestor`,`imovel`.`finalidade` AS `finalidade`,`imovel`.`tipoImovel` AS `tipoImovel`,`imovel`.`area` AS `area`,`imovel`.`preco` AS `preco`,`imovel`.`descricao` AS `descricao`,`imovel`.`rua` AS `rua`,`imovel`.`codPostal` AS `codPostal`,`imovel`.`lat` AS `lat`,`imovel`.`lng` AS `lng`,`imovel`.`idFreguesia` AS `idFreguesia`,`imovel`.`situacao` AS `situacao`,`imovel`.`estado` AS `estado`,`extras`.`tipologia` AS `tipologia`,`extras`.`quartos` AS `quartos`,`extras`.`casasBanho` AS `casasBanho`,`extras`.`garagem` AS `garagem`,`extras`.`piscina` AS `piscina`,`extras`.`mobilia` AS `mobilia`,`extras`.`dataConstrucao` AS `dataConstrucao`,`extras`.`informacao` AS `informacao` from ((`destaque` join `imovel` on((`destaque`.`idImovel` = `imovel`.`idImovel`))) left join `extras` on((`destaque`.`idImovel` = `extras`.`idImovel`))) where (`destaque`.`destacado` <> 1) ;

-- --------------------------------------------------------

--
-- Structure for view `todosimoveis`
--
DROP TABLE IF EXISTS `todosimoveis`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `todosimoveis`  AS  select `imovel`.`idImovel` AS `idImovel`,`imovel`.`gestor` AS `gestor`,`imovel`.`finalidade` AS `finalidade`,`imovel`.`tipoImovel` AS `tipoImovel`,`imovel`.`area` AS `area`,`imovel`.`preco` AS `preco`,`imovel`.`descricao` AS `descricao`,`imovel`.`rua` AS `rua`,`imovel`.`codPostal` AS `codPostal`,`imovel`.`lat` AS `lat`,`imovel`.`lng` AS `lng`,`imovel`.`idFreguesia` AS `idFreguesia`,`imovel`.`situacao` AS `situacao`,`imovel`.`estado` AS `estado`,`extras`.`tipologia` AS `tipologia`,`extras`.`quartos` AS `quartos`,`extras`.`casasBanho` AS `casasBanho`,`extras`.`garagem` AS `garagem`,`extras`.`piscina` AS `piscina`,`extras`.`mobilia` AS `mobilia`,`extras`.`dataConstrucao` AS `dataConstrucao`,`extras`.`informacao` AS `informacao` from (`imovel` left join `extras` on((`imovel`.`idImovel` = `extras`.`idImovel`))) ;

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
