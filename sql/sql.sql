- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `client`;
CREATE TABLE `client` (
  `idCli` int(11) NOT NULL AUTO_INCREMENT,
  `nomCli` varchar(50) NOT NULL,
  `prenomCli` varchar(50) NOT NULL,
  `rueCli` varchar(50) NOT NULL,
  `cpCli` char(5) NOT NULL,
  `villeCli` varchar(50) NOT NULL,
  PRIMARY KEY (`idCli`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `client` (`idCli`, `nomCli`, `prenomCli`, `rueCli`, `cpCli`, `villeCli`) VALUES
(1,	'DUSSART',	'Jean',	'5 rue Saint-Gilles',	'91150',	'Etampes'),
(2,	'HURTAUX',	'Jeanne',	'26 avenue Bollée',	'72100',	'LE MANS'),
(3,	'PRAT',	'Marie',	'3 rue Gilbert',	'36000',	'Châteauroux'),
(4,	'GARNIER',	'Thierry',	'5 rue du stade',	'40200',	'Mimizan'),
(5,	'HAMON',	'Alban',	'12 impasse Malconte',	'47000',	'Agen'),
(6,	'ALBERT',	'Michel',	'5 rue du 8 mai',	'31000',	'Toulouse'),
(7,	'POUX',	'Jean-Paul',	'156 avenue de Belgique',	'80000',	'Amiens'),
(8,	'PELOU',	'Gérard',	'1 impasse Jean Giono',	'80100',	'Abbeville'),
(9,	'LE PENNEC',	'Gisèle',	'96 route de Lorient',	'35000',	'Rennes'),
(10,	'POUYOT',	'Mickaël',	'8 rue des marais',	'28000',	'Chartres');

DROP TABLE IF EXISTS `commande`;
CREATE TABLE `commande` (
  `numCde` int(11) NOT NULL AUTO_INCREMENT,
  `dateCde` date NOT NULL,
  `etatCde` varchar(50) NOT NULL,
  `idCliCde` int(11) NOT NULL,
  PRIMARY KEY (`numCde`),
  KEY `FK__client` (`idCliCde`),
  CONSTRAINT `FK__client` FOREIGN KEY (`idCliCde`) REFERENCES `client` (`idCli`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `commande` (`numCde`, `dateCde`, `etatCde`, `idCliCde`) VALUES
(2,	'2015-08-10',	'livrée',	4),
(3,	'2015-09-05',	'livrée',	5),
(5,	'2015-10-20',	'livrée',	6),
(6,	'2015-11-07',	'livrée',	7),
(7,	'2015-12-15',	'livrée',	5),
(8,	'2015-12-18',	'livrée',	3),
(9,	'2016-02-01',	'livrée',	10),
(10,	'2016-05-07',	'livrée',	8),
(11,	'2016-05-05',	'livrée',	9),
(12,	'2016-05-06',	'livrée',	7),
(13,	'2016-08-01',	'livrée',	10),
(14,	'2016-09-05',	'livrée',	3),
(15,	'2016-09-06',	'livrée',	9),
(17,	'2016-09-08',	'livrée',	1),
(19,	'2016-09-08',	'livrée',	10),
(20,	'2016-09-08',	'livrée',	4),
(21,	'2016-09-08',	'livrée',	1),
(22,	'2016-09-12',	'en préparation',	3),
(23,	'2016-09-12',	'en préparation',	1),
(24,	'2016-09-12',	'en préparation',	3),
(25,	'2016-09-18',	'en préparation',	3),
(26,	'2016-09-19',	'en attente',	10),
(27,	'2016-09-19',	'en attente',	9),
(28,	'2016-09-19',	'en attente',	10),
(29,	'2016-09-19',	'en attente',	5),
(30,	'2016-09-19',	'en préparation',	5),
(31,	'2016-09-19',	'en attente',	5),
(32,	'2016-09-19',	'en préparation',	6);

DROP TABLE IF EXISTS `comporter`;
CREATE TABLE `comporter` (
  `numCde` int(11) NOT NULL,
  `idProd` varchar(8) NOT NULL,
  `qte` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`numCde`,`idProd`),
  KEY `idProd` (`idProd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `comporter` (`numCde`, `idProd`, `qte`) VALUES
(2,	'CHA-0001',	1),
(3,	'TAB-0001',	1),
(5,	'TBT-0001',	2),
(6,	'TBT-0002',	8),
(7,	'CHA-0002',	2),
(8,	'CHA-0001',	4),
(8,	'TBT-0002',	2),
(9,	'TBT-0001',	2),
(10,	'TAB-0002',	1),
(11,	'TAB-0002',	1),
(11,	'TBT-0001',	8),
(12,	'CHA-0001',	2),
(13,	'CHA-0002',	2),
(14,	'CHA-0001',	2),
(14,	'CHA-0002',	2),
(15,	'TAB-0002',	1),
(17,	'CHA-0002',	1),
(19,	'CHA-0001',	3),
(20,	'TAB-0001',	4),
(21,	'TAB-0001',	10),
(22,	'CHA-0002',	2),
(22,	'TAB-0002',	1),
(22,	'TBT-0001',	1),
(22,	'TBT-0002',	6),
(23,	'TBT-0001',	1),
(24,	'CHA-0001',	4),
(24,	'TAB-0001',	2),
(24,	'TBT-0002',	3),
(25,	'CHA-0001',	1),
(25,	'TAB-0002',	1),
(26,	'CHA-0001',	6),
(26,	'TAB-0002',	1),
(27,	'CHA-0001',	6),
(27,	'TAB-0002',	1),
(28,	'CHA-0001',	2),
(28,	'TBT-0001',	12),
(29,	'CHA-0001',	1),
(29,	'TAB-0002',	1),
(30,	'CHA-0001',	1),
(30,	'TAB-0002',	1),
(31,	'CHA-0001',	1),
(31,	'TAB-0002',	1),
(32,	'TAB-0001',	1),
(32,	'TBT-0002',	8);

DROP TABLE IF EXISTS `fonction`;
CREATE TABLE `fonction` (
  `idF` int(11) NOT NULL AUTO_INCREMENT,
  `nomF` varchar(50) NOT NULL,
  PRIMARY KEY (`idF`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `fonction` (`idF`, `nomF`) VALUES
(1,	'Agent de manutention'),
(2,	'Gestionnaire des stocks'),
(3,	'Ajouteur de produits'),
(4,	'RH');

DROP TABLE IF EXISTS `produit`;
CREATE TABLE `produit` (
  `idProd` varchar(8) NOT NULL,
  `libProd` varchar(50) NOT NULL,
  `descProd` varchar(200) NOT NULL,
  `prixProd` decimal(8,2) NOT NULL,
  PRIMARY KEY (`idProd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- 2018-10-19 10:28:59