-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 20, 2014 at 08:04 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `airline`
--
CREATE DATABASE IF NOT EXISTS `airline` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `airline`;

-- --------------------------------------------------------

--
-- Table structure for table `aeroport`
--

CREATE TABLE IF NOT EXISTS `aeroport` (
  `idaeroport` int(11) NOT NULL AUTO_INCREMENT,
  `code` char(3) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `pays` varchar(45) NOT NULL,
  `ville` varchar(45) NOT NULL,
  PRIMARY KEY (`idaeroport`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `aeroport`
--

INSERT INTO `aeroport` (`idaeroport`, `code`, `nom`, `pays`, `ville`) VALUES
(1, 'CDG', 'Charles de Gaulle', 'France', 'Paris'),
(2, 'NAY', 'Nan Yuan Air Base', 'Beijin', 'Chine'),
(3, 'NGS', 'Nagasaki International Airport', 'Nagasaki', 'Japan'),
(4, 'NOR', 'Nordfjordur', 'Nordfjordu', 'Islande'),
(5, 'NQU', 'Nuqui', 'Nuqui', 'Colombie');

-- --------------------------------------------------------

--
-- Table structure for table `assignements`
--

CREATE TABLE IF NOT EXISTS `assignements` (
  `valAssign` char(3) NOT NULL,
  PRIMARY KEY (`valAssign`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assignements`
--

INSERT INTO `assignements` (`valAssign`) VALUES
('sol'),
('vol');

-- --------------------------------------------------------

--
-- Table structure for table `avions`
--

CREATE TABLE IF NOT EXISTS `avions` (
  `immatricule` int(11) NOT NULL AUTO_INCREMENT,
  `modele` varchar(45) NOT NULL,
  `idaeroport` int(11) NOT NULL,
  PRIMARY KEY (`immatricule`,`modele`),
  KEY `fk_Avion_modele1_idx` (`modele`),
  KEY `idaeroport` (`idaeroport`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `avions`
--

INSERT INTO `avions` (`immatricule`, `modele`, `idaeroport`) VALUES
(1, 'Airbus A320', 0),
(2, 'Airbus A320', 0),
(5, 'Airbus A320', 0),
(6, 'Helicopter', 0),
(7, 'Drone', 0),
(9, '747', 0),
(10, 'Airbus A320', 0);

-- --------------------------------------------------------

--
-- Table structure for table `billets`
--

CREATE TABLE IF NOT EXISTS `billets` (
  `idbillets` int(11) NOT NULL,
  `idpassager` int(11) NOT NULL,
  `iddepart` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `emission` datetime NOT NULL,
  PRIMARY KEY (`idbillets`),
  KEY `fk_billets_passager_idx` (`idpassager`),
  KEY `fk_billets_hebdodepart_idx` (`iddepart`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `candidatures`
--

CREATE TABLE IF NOT EXISTS `candidatures` (
  `idcandidat` int(11) NOT NULL,
  `secu` int(11) NOT NULL,
  PRIMARY KEY (`idcandidat`),
  KEY `fk_candidat_personne_idx` (`idcandidat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `candidatures`
--

INSERT INTO `candidatures` (`idcandidat`, `secu`) VALUES
(1, 123456),
(5, 369852),
(6, 145236),
(13, 12345);

-- --------------------------------------------------------

--
-- Stand-in structure for view `donneeemployes`
--
CREATE TABLE IF NOT EXISTS `donneeemployes` (
`id` int(11)
,`nom` varchar(45)
,`prenom` varchar(45)
,`adresse` varchar(45)
,`secu` int(11)
,`assign` char(3)
,`salaire` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `donnees_accueil`
--
CREATE TABLE IF NOT EXISTS `donnees_accueil` (
`idliaison` int(11)
,`nom_depart` varchar(45)
,`code_depart` char(3)
,`pays_depart` varchar(45)
,`ville_depart` varchar(45)
,`nom_destin` varchar(45)
,`code_destin` char(3)
,`pays_destin` varchar(45)
,`ville_destin` varchar(45)
);
-- --------------------------------------------------------

--
-- Table structure for table `employes`
--

CREATE TABLE IF NOT EXISTS `employes` (
  `idemploye` int(11) NOT NULL,
  `assign` char(3) NOT NULL,
  `salaire` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idemploye`),
  KEY `typeDePersonnel_idx` (`assign`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employes`
--

INSERT INTO `employes` (`idemploye`, `assign`, `salaire`) VALUES
(1, 'vol', 20000),
(5, 'vol', 6000),
(6, 'sol', 7500),
(13, 'vol', 21345);

-- --------------------------------------------------------

--
-- Table structure for table `equipe`
--

CREATE TABLE IF NOT EXISTS `equipe` (
  `idequipe` int(11) NOT NULL,
  `idpilote1` int(11) NOT NULL,
  `idpilote2` int(11) DEFAULT NULL,
  `idnavigant1` int(11) NOT NULL,
  `idnavigant2` int(11) NOT NULL,
  PRIMARY KEY (`idequipe`),
  KEY `fk_equipe_pilote_idx` (`idpilote1`),
  KEY `fk_equipe_membre_idx` (`idnavigant1`),
  KEY `fk_equipe_pilote2_idx` (`idpilote2`),
  KEY `fk_equipe_membre2_idx` (`idnavigant2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `equipe`
--

INSERT INTO `equipe` (`idequipe`, `idpilote1`, `idpilote2`, `idnavigant1`, `idnavigant2`) VALUES
(0, 1, NULL, 5, 6),
(1, 1, NULL, 5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `fonctions`
--

CREATE TABLE IF NOT EXISTS `fonctions` (
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fonctions`
--

INSERT INTO `fonctions` (`name`) VALUES
('Hotesse'),
('Stewart');

-- --------------------------------------------------------

--
-- Table structure for table `hebdodepart`
--

CREATE TABLE IF NOT EXISTS `hebdodepart` (
  `idhebdodepart` int(11) NOT NULL,
  `idequipe` int(11) NOT NULL,
  `idvol` int(11) NOT NULL,
  `places` int(11) NOT NULL DEFAULT '0',
  `reservations` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idhebdodepart`),
  KEY `fk_hebdodepart_vol1_idx` (`idvol`),
  KEY `fk_hebdodepart_equipe_idx` (`idequipe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hebdodepart`
--

INSERT INTO `hebdodepart` (`idhebdodepart`, `idequipe`, `idvol`, `places`, `reservations`) VALUES
(1, 1, 1, 100, 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `liaisonnom`
--
CREATE TABLE IF NOT EXISTS `liaisonnom` (
`idliaison` int(11)
,`nom_aero_dep` varchar(45)
,`nom_aero_arr` varchar(45)
);
-- --------------------------------------------------------

--
-- Table structure for table `liaisons`
--

CREATE TABLE IF NOT EXISTS `liaisons` (
  `idliaison` int(11) NOT NULL AUTO_INCREMENT,
  `idaeroport_origin` int(11) NOT NULL,
  `idaeroport_destin` int(11) NOT NULL,
  PRIMARY KEY (`idliaison`),
  KEY `fk_liaisons_aeroport2_idx` (`idaeroport_destin`),
  KEY `fk_liaisons_aeroport1` (`idaeroport_origin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `liaisons`
--

INSERT INTO `liaisons` (`idliaison`, `idaeroport_origin`, `idaeroport_destin`) VALUES
(1, 1, 2),
(9, 5, 1),
(10, 4, 2),
(11, 2, 5),
(12, 1, 3),
(13, 2, 1),
(14, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `membres`
--

CREATE TABLE IF NOT EXISTS `membres` (
  `idmembre` int(11) NOT NULL,
  `fonction` varchar(45) NOT NULL,
  PRIMARY KEY (`idmembre`),
  KEY `fk_membres_fonction_idx` (`fonction`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `membres`
--

INSERT INTO `membres` (`idmembre`, `fonction`) VALUES
(5, 'Stewart'),
(6, 'Stewart');

-- --------------------------------------------------------

--
-- Table structure for table `modeles`
--

CREATE TABLE IF NOT EXISTS `modeles` (
  `idmodele` varchar(45) NOT NULL,
  PRIMARY KEY (`idmodele`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `modeles`
--

INSERT INTO `modeles` (`idmodele`) VALUES
('747'),
('Airbus A320'),
('Drone'),
('Helicopter');

-- --------------------------------------------------------

--
-- Table structure for table `navigants`
--

CREATE TABLE IF NOT EXISTS `navigants` (
  `idnavigants` int(11) NOT NULL,
  `heures` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idnavigants`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `navigants`
--

INSERT INTO `navigants` (`idnavigants`, `heures`) VALUES
(1, 1000),
(5, 15000),
(6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `passagers`
--

CREATE TABLE IF NOT EXISTS `passagers` (
  `idpassagers` int(11) NOT NULL,
  PRIMARY KEY (`idpassagers`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `periodes`
--

CREATE TABLE IF NOT EXISTS `periodes` (
  `idperiode` int(11) NOT NULL,
  `debut` date NOT NULL,
  `fin` date NOT NULL,
  PRIMARY KEY (`idperiode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `periodes`
--

INSERT INTO `periodes` (`idperiode`, `debut`, `fin`) VALUES
(1, '2014-01-01', '2015-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `personnes`
--

CREATE TABLE IF NOT EXISTS `personnes` (
  `idpersonne` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `adresse` varchar(45) NOT NULL DEFAULT 'undefined',
  PRIMARY KEY (`idpersonne`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personnes`
--

INSERT INTO `personnes` (`idpersonne`, `nom`, `prenom`, `adresse`) VALUES
(1, 'Benoit', 'Eudier', ' rue Machin'),
(5, 'Franck', 'Coutouly', 'Quelque part dans Lyon'),
(6, 'Jean', 'Paul', '7 rue de la RÃ©publique'),
(13, 'Edouard', 'Philipe', 'quelque part');

-- --------------------------------------------------------

--
-- Table structure for table `pilotes`
--

CREATE TABLE IF NOT EXISTS `pilotes` (
  `idpilote` int(11) NOT NULL,
  `license` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idpilote`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pilotes`
--

INSERT INTO `pilotes` (`idpilote`, `license`) VALUES
(1, 127438);

-- --------------------------------------------------------

--
-- Table structure for table `vol`
--

CREATE TABLE IF NOT EXISTS `vol` (
  `idvol` int(11) NOT NULL AUTO_INCREMENT,
  `avions_immatricule` int(11) NOT NULL,
  `idliaison` int(11) NOT NULL,
  `idperiode` int(11) NOT NULL,
  `hdepart` time NOT NULL,
  `harrivee` time NOT NULL,
  PRIMARY KEY (`idvol`),
  KEY `fk_vol_liaisons1_idx` (`idliaison`),
  KEY `fk_vol_avions1_idx` (`avions_immatricule`),
  KEY `fk_vol_periode_idx` (`idperiode`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `vol`
--

INSERT INTO `vol` (`idvol`, `avions_immatricule`, `idliaison`, `idperiode`, `hdepart`, `harrivee`) VALUES
(1, 1, 1, 1, '06:00:00', '20:22:00'),
(3, 5, 11, 1, '07:00:00', '14:00:00'),
(5, 7, 1, 1, '12:00:00', '14:00:00');

-- --------------------------------------------------------

--
-- Stand-in structure for view `volnom`
--
CREATE TABLE IF NOT EXISTS `volnom` (
`idvol` int(11)
,`idavion` int(11)
,`modele` varchar(45)
,`depart` varchar(45)
,`arrivee` varchar(45)
,`debut` date
,`fin` date
,`hdepart` time
,`harrivee` time
);
-- --------------------------------------------------------

--
-- Structure for view `donneeemployes`
--
DROP TABLE IF EXISTS `donneeemployes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `donneeemployes` AS select `p`.`idpersonne` AS `id`,`p`.`nom` AS `nom`,`p`.`prenom` AS `prenom`,`p`.`adresse` AS `adresse`,`c`.`secu` AS `secu`,`e`.`assign` AS `assign`,`e`.`salaire` AS `salaire` from ((`personnes` `p` join `candidatures` `c`) join `employes` `e`) where ((`p`.`idpersonne` = `c`.`idcandidat`) and (`c`.`idcandidat` = `e`.`idemploye`));

-- --------------------------------------------------------

--
-- Structure for view `donnees_accueil`
--
DROP TABLE IF EXISTS `donnees_accueil`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `donnees_accueil` AS select `l`.`idliaison` AS `idliaison`,`a1`.`nom` AS `nom_depart`,`a1`.`code` AS `code_depart`,`a1`.`pays` AS `pays_depart`,`a1`.`ville` AS `ville_depart`,`a2`.`nom` AS `nom_destin`,`a2`.`code` AS `code_destin`,`a2`.`pays` AS `pays_destin`,`a2`.`ville` AS `ville_destin` from ((`aeroport` `a1` join `aeroport` `a2`) join `liaisons` `l`) where ((`l`.`idaeroport_origin` = `a1`.`idaeroport`) and (`l`.`idaeroport_destin` = `a2`.`idaeroport`));

-- --------------------------------------------------------

--
-- Structure for view `liaisonnom`
--
DROP TABLE IF EXISTS `liaisonnom`;

CREATE ALGORITHM=MERGE DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `liaisonnom` AS select `l`.`idliaison` AS `idliaison`,`a1`.`nom` AS `nom_aero_dep`,`a2`.`nom` AS `nom_aero_arr` from ((`liaisons` `l` join `aeroport` `a1`) join `aeroport` `a2`) where ((`a1`.`idaeroport` = `l`.`idaeroport_origin`) and (`a2`.`idaeroport` = `l`.`idaeroport_destin`));

-- --------------------------------------------------------

--
-- Structure for view `volnom`
--
DROP TABLE IF EXISTS `volnom`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `volnom` AS select `v`.`idvol` AS `idvol`,`a`.`immatricule` AS `idavion`,`a`.`modele` AS `modele`,`l`.`nom_aero_dep` AS `depart`,`l`.`nom_aero_arr` AS `arrivee`,`p`.`debut` AS `debut`,`p`.`fin` AS `fin`,`v`.`hdepart` AS `hdepart`,`v`.`harrivee` AS `harrivee` from (((`vol` `v` join `avions` `a`) join `liaisonnom` `l`) join `periodes` `p`) where ((`v`.`avions_immatricule` = `a`.`immatricule`) and (`v`.`idliaison` = `l`.`idliaison`) and (`v`.`idperiode` = `p`.`idperiode`));

--
-- Constraints for dumped tables
--

--
-- Constraints for table `avions`
--
ALTER TABLE `avions`
  ADD CONSTRAINT `fk_Avion_modele1` FOREIGN KEY (`modele`) REFERENCES `modeles` (`idmodele`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `billets`
--
ALTER TABLE `billets`
  ADD CONSTRAINT `fk_billets_hebdodepart` FOREIGN KEY (`iddepart`) REFERENCES `hebdodepart` (`idhebdodepart`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_billets_passager` FOREIGN KEY (`idpassager`) REFERENCES `passagers` (`idpassagers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `candidatures`
--
ALTER TABLE `candidatures`
  ADD CONSTRAINT `fk_candidat_personne` FOREIGN KEY (`idcandidat`) REFERENCES `personnes` (`idpersonne`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employes`
--
ALTER TABLE `employes`
  ADD CONSTRAINT `fk_employe_candidat` FOREIGN KEY (`idemploye`) REFERENCES `candidatures` (`idcandidat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `typeDePersonnel` FOREIGN KEY (`assign`) REFERENCES `assignements` (`valAssign`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `equipe`
--
ALTER TABLE `equipe`
  ADD CONSTRAINT `fk_equipe_membre1` FOREIGN KEY (`idnavigant1`) REFERENCES `membres` (`idmembre`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_equipe_membre2` FOREIGN KEY (`idnavigant2`) REFERENCES `membres` (`idmembre`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_equipe_pilote1` FOREIGN KEY (`idpilote1`) REFERENCES `pilotes` (`idpilote`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_equipe_pilote2` FOREIGN KEY (`idpilote2`) REFERENCES `pilotes` (`idpilote`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hebdodepart`
--
ALTER TABLE `hebdodepart`
  ADD CONSTRAINT `fk_hebdodepart_equipe` FOREIGN KEY (`idequipe`) REFERENCES `equipe` (`idequipe`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hebdo_vol` FOREIGN KEY (`idvol`) REFERENCES `vol` (`idvol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `liaisons`
--
ALTER TABLE `liaisons`
  ADD CONSTRAINT `fk_liaisons_aeroport1` FOREIGN KEY (`idaeroport_origin`) REFERENCES `aeroport` (`idaeroport`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_liaisons_aeroport2` FOREIGN KEY (`idaeroport_destin`) REFERENCES `aeroport` (`idaeroport`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `membres`
--
ALTER TABLE `membres`
  ADD CONSTRAINT `fk_membres_fonction` FOREIGN KEY (`fonction`) REFERENCES `fonctions` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_membres_navigant` FOREIGN KEY (`idmembre`) REFERENCES `navigants` (`idnavigants`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `navigants`
--
ALTER TABLE `navigants`
  ADD CONSTRAINT `employesNavigant` FOREIGN KEY (`idnavigants`) REFERENCES `employes` (`idemploye`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `passagers`
--
ALTER TABLE `passagers`
  ADD CONSTRAINT `fk_passagers_personnes` FOREIGN KEY (`idpassagers`) REFERENCES `personnes` (`idpersonne`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pilotes`
--
ALTER TABLE `pilotes`
  ADD CONSTRAINT `identifiantFromPersVol` FOREIGN KEY (`idpilote`) REFERENCES `navigants` (`idnavigants`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vol`
--
ALTER TABLE `vol`
  ADD CONSTRAINT `fk_vol_liaisons` FOREIGN KEY (`idliaison`) REFERENCES `liaisons` (`idliaison`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vol_periode` FOREIGN KEY (`idperiode`) REFERENCES `periodes` (`idperiode`) ON DELETE NO ACTION ON UPDATE CASCADE;
--
-- Database: `airlinebackup`
--
CREATE DATABASE IF NOT EXISTS `airlinebackup` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `airlinebackup`;

-- --------------------------------------------------------

--
-- Table structure for table `aeroport`
--

CREATE TABLE IF NOT EXISTS `aeroport` (
  `idaeroport` int(11) NOT NULL AUTO_INCREMENT,
  `code` char(3) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `pays` varchar(45) NOT NULL,
  `ville` varchar(45) NOT NULL,
  PRIMARY KEY (`idaeroport`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `aeroport`
--

INSERT INTO `aeroport` (`idaeroport`, `code`, `nom`, `pays`, `ville`) VALUES
(1, 'CDG', 'Charles de Gaulle', 'France', 'Paris'),
(2, 'NAY', 'Nan Yuan Air Base', 'Beijin', 'Chine'),
(3, 'NGS', 'Nagasaki International Airport', 'Nagasaki', 'Japan'),
(4, 'NOR', 'Nordfjordur', 'Nordfjordu', 'Islande'),
(5, 'NQU', 'Nuqui', 'Nuqui', 'Colombie');

-- --------------------------------------------------------

--
-- Table structure for table `assignements`
--

CREATE TABLE IF NOT EXISTS `assignements` (
  `valAssign` char(3) NOT NULL,
  PRIMARY KEY (`valAssign`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assignements`
--

INSERT INTO `assignements` (`valAssign`) VALUES
('sol'),
('vol');

-- --------------------------------------------------------

--
-- Table structure for table `avions`
--

CREATE TABLE IF NOT EXISTS `avions` (
  `immatricule` int(11) NOT NULL,
  `modele` varchar(45) NOT NULL,
  PRIMARY KEY (`immatricule`,`modele`),
  KEY `fk_Avion_modele1_idx` (`modele`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `billets`
--

CREATE TABLE IF NOT EXISTS `billets` (
  `idbillets` int(11) NOT NULL,
  `idpassager` int(11) NOT NULL,
  `iddepart` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `emission` datetime NOT NULL,
  PRIMARY KEY (`idbillets`),
  KEY `fk_billets_passager_idx` (`idpassager`),
  KEY `fk_billets_hebdodepart_idx` (`iddepart`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `candidatures`
--

CREATE TABLE IF NOT EXISTS `candidatures` (
  `idcandidat` int(11) NOT NULL,
  `secu` int(11) NOT NULL,
  PRIMARY KEY (`idcandidat`),
  KEY `fk_candidat_personne_idx` (`idcandidat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employes`
--

CREATE TABLE IF NOT EXISTS `employes` (
  `idemploye` int(11) NOT NULL,
  `assign` char(3) NOT NULL,
  `salaire` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idemploye`),
  KEY `typeDePersonnel_idx` (`assign`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `equipe`
--

CREATE TABLE IF NOT EXISTS `equipe` (
  `idequipe` int(11) NOT NULL,
  `idpilote1` int(11) NOT NULL,
  `idpilote2` int(11) DEFAULT NULL,
  `idnavigant1` int(11) NOT NULL,
  `idnavigant2` int(11) NOT NULL,
  PRIMARY KEY (`idequipe`),
  KEY `fk_equipe_pilote_idx` (`idpilote1`),
  KEY `fk_equipe_membre_idx` (`idnavigant1`),
  KEY `fk_equipe_pilote2_idx` (`idpilote2`),
  KEY `fk_equipe_membre2_idx` (`idnavigant2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fonctions`
--

CREATE TABLE IF NOT EXISTS `fonctions` (
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hebdodepart`
--

CREATE TABLE IF NOT EXISTS `hebdodepart` (
  `idhebdodepart` int(11) NOT NULL,
  `idequipe` int(11) NOT NULL,
  `idvol` int(11) NOT NULL,
  `places` int(11) NOT NULL DEFAULT '0',
  `reservations` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idhebdodepart`),
  KEY `fk_hebdodepart_vol1_idx` (`idvol`),
  KEY `fk_hebdodepart_equipe_idx` (`idequipe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `liaisons`
--

CREATE TABLE IF NOT EXISTS `liaisons` (
  `idliaison` int(11) NOT NULL AUTO_INCREMENT,
  `idaeroport_origin` int(11) NOT NULL,
  `idaeroport_destin` int(11) NOT NULL,
  PRIMARY KEY (`idliaison`),
  KEY `fk_liaisons_aeroport2_idx` (`idaeroport_destin`),
  KEY `fk_liaisons_aeroport1` (`idaeroport_origin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `membres`
--

CREATE TABLE IF NOT EXISTS `membres` (
  `idmembre` int(11) NOT NULL,
  `fonction` varchar(45) NOT NULL,
  PRIMARY KEY (`idmembre`),
  KEY `fk_membres_fonction_idx` (`fonction`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `modeles`
--

CREATE TABLE IF NOT EXISTS `modeles` (
  `idmodele` varchar(45) NOT NULL,
  PRIMARY KEY (`idmodele`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `navigants`
--

CREATE TABLE IF NOT EXISTS `navigants` (
  `idnavigants` int(11) NOT NULL,
  `heures` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idnavigants`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `passagers`
--

CREATE TABLE IF NOT EXISTS `passagers` (
  `idpassagers` int(11) NOT NULL,
  PRIMARY KEY (`idpassagers`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `periodes`
--

CREATE TABLE IF NOT EXISTS `periodes` (
  `idperiode` int(11) NOT NULL,
  `debut` date NOT NULL,
  `fin` date NOT NULL,
  PRIMARY KEY (`idperiode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `personnes`
--

CREATE TABLE IF NOT EXISTS `personnes` (
  `idpersonne` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `adresse` varchar(45) NOT NULL DEFAULT 'undefined',
  PRIMARY KEY (`idpersonne`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pilotes`
--

CREATE TABLE IF NOT EXISTS `pilotes` (
  `idpilote` int(11) NOT NULL,
  `license` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idpilote`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vol`
--

CREATE TABLE IF NOT EXISTS `vol` (
  `idvol` int(11) NOT NULL,
  `avions_immatricule` int(11) NOT NULL,
  `idliaison` int(11) NOT NULL,
  `idperiode` int(11) NOT NULL,
  `hdepart` datetime NOT NULL,
  `harrivee` datetime NOT NULL,
  PRIMARY KEY (`idvol`),
  KEY `fk_vol_liaisons1_idx` (`idliaison`),
  KEY `fk_vol_avions1_idx` (`avions_immatricule`),
  KEY `fk_vol_periode_idx` (`idperiode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `avions`
--
ALTER TABLE `avions`
  ADD CONSTRAINT `fk_Avion_modele1` FOREIGN KEY (`modele`) REFERENCES `modeles` (`idmodele`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `billets`
--
ALTER TABLE `billets`
  ADD CONSTRAINT `fk_billets_hebdodepart` FOREIGN KEY (`iddepart`) REFERENCES `hebdodepart` (`idhebdodepart`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_billets_passager` FOREIGN KEY (`idpassager`) REFERENCES `passagers` (`idpassagers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `candidatures`
--
ALTER TABLE `candidatures`
  ADD CONSTRAINT `fk_candidat_personne` FOREIGN KEY (`idcandidat`) REFERENCES `personnes` (`idpersonne`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `employes`
--
ALTER TABLE `employes`
  ADD CONSTRAINT `fk_employe_candidat` FOREIGN KEY (`idemploye`) REFERENCES `candidatures` (`idcandidat`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `typeDePersonnel` FOREIGN KEY (`assign`) REFERENCES `assignements` (`valAssign`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `equipe`
--
ALTER TABLE `equipe`
  ADD CONSTRAINT `fk_equipe_membre1` FOREIGN KEY (`idnavigant1`) REFERENCES `membres` (`idmembre`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_equipe_membre2` FOREIGN KEY (`idnavigant2`) REFERENCES `membres` (`idmembre`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_equipe_pilote1` FOREIGN KEY (`idpilote1`) REFERENCES `pilotes` (`idpilote`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_equipe_pilote2` FOREIGN KEY (`idpilote2`) REFERENCES `pilotes` (`idpilote`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hebdodepart`
--
ALTER TABLE `hebdodepart`
  ADD CONSTRAINT `fk_hebdodepart_equipe` FOREIGN KEY (`idequipe`) REFERENCES `equipe` (`idequipe`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hebdodepart_vol1` FOREIGN KEY (`idvol`) REFERENCES `vol` (`idvol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `liaisons`
--
ALTER TABLE `liaisons`
  ADD CONSTRAINT `fk_liaisons_aeroport1` FOREIGN KEY (`idaeroport_origin`) REFERENCES `aeroport` (`idaeroport`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_liaisons_aeroport2` FOREIGN KEY (`idaeroport_destin`) REFERENCES `aeroport` (`idaeroport`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `membres`
--
ALTER TABLE `membres`
  ADD CONSTRAINT `fk_membres_fonction` FOREIGN KEY (`fonction`) REFERENCES `fonctions` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_membres_navigant` FOREIGN KEY (`idmembre`) REFERENCES `navigants` (`idnavigants`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `navigants`
--
ALTER TABLE `navigants`
  ADD CONSTRAINT `employesNavigant` FOREIGN KEY (`idnavigants`) REFERENCES `employes` (`idemploye`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `passagers`
--
ALTER TABLE `passagers`
  ADD CONSTRAINT `fk_passagers_personnes` FOREIGN KEY (`idpassagers`) REFERENCES `personnes` (`idpersonne`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pilotes`
--
ALTER TABLE `pilotes`
  ADD CONSTRAINT `identifiantFromPersVol` FOREIGN KEY (`idpilote`) REFERENCES `navigants` (`idnavigants`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vol`
--
ALTER TABLE `vol`
  ADD CONSTRAINT `fk_vol_avions` FOREIGN KEY (`avions_immatricule`) REFERENCES `avions` (`immatricule`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vol_liaisons` FOREIGN KEY (`idliaison`) REFERENCES `liaisons` (`idliaison`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vol_periode` FOREIGN KEY (`idperiode`) REFERENCES `periodes` (`idperiode`) ON DELETE NO ACTION ON UPDATE NO ACTION;
--
-- Database: `be1`
--
CREATE DATABASE IF NOT EXISTS `be1` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `be1`;

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `conso_checker`(IN surnom_coloc VARCHAR(10))
BEGIN
	SELECT * FROM conso WHERE surnom = surnom_coloc;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `colocataire`
--

CREATE TABLE IF NOT EXISTS `colocataire` (
  `surnom` varchar(10) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  PRIMARY KEY (`surnom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `colocataire`
--

INSERT INTO `colocataire` (`surnom`, `nom`, `numero`) VALUES
('Gambet', 'Alexis', 23452132),
('Keup', 'Mounier', 27308744),
('PB', 'Bechu', 92374402),
('Pifitte', 'Chloe', 23432532);

-- --------------------------------------------------------

--
-- Table structure for table `conso`
--

CREATE TABLE IF NOT EXISTS `conso` (
  `consoID` int(11) NOT NULL AUTO_INCREMENT,
  `surnom` varchar(10) DEFAULT NULL,
  `objet` varchar(20) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  PRIMARY KEY (`consoID`),
  KEY `a consome_idx` (`surnom`),
  KEY `ingredient_idx` (`objet`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `conso`
--

INSERT INTO `conso` (`consoID`, `surnom`, `objet`, `quantite`) VALUES
(1, 'Keup', 'Pelfort', 2),
(2, 'Gambet', 'Grimbergen', 1),
(3, 'PB', 'Leffe', 4),
(4, 'Pifitte', 'Eau', 1),
(5, 'Gambet', 'Heineken', 2),
(6, 'Keup', 'Kilkenny', 2),
(7, 'Gambet', 'Guinness', 1),
(8, 'Keup', 'Pelfort', 2);

--
-- Triggers `conso`
--
DROP TRIGGER IF EXISTS `update_conso_stock`;
DELIMITER //
CREATE TRIGGER `update_conso_stock` BEFORE INSERT ON `conso`
 FOR EACH ROW BEGIN
	DECLARE qtConso integer;
	DECLARE prodConso VARCHAR(10);
	DECLARE restante integer;
	DECLARE reste integer;

	SET qtConso = NEW.quantite;
	SET prodConso = NEW.objet;
	SELECT quantite INTO restante FROM stock WHERE objet = prodConso;
	SET reste = restante - qtConso;

	IF reste<0 THEN
		SET NEW.quantite = restant;
		UPDATE stock SET quantite = 0 WHERE objet = prodConso;
	ELSE
		UPDATE stock SET quantite = reste WHERE objet = prodConso;
	END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `coursesID` int(11) NOT NULL AUTO_INCREMENT,
  `objet` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`coursesID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`coursesID`, `objet`) VALUES
(1, 'Pelfort');

-- --------------------------------------------------------

--
-- Table structure for table `ingredient`
--

CREATE TABLE IF NOT EXISTS `ingredient` (
  `objet` varchar(20) NOT NULL DEFAULT '',
  `categorie` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`objet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ingredient`
--

INSERT INTO `ingredient` (`objet`, `categorie`) VALUES
('Eau', 'Boisson'),
('Fritte', 'Nourriture'),
('Grimbergen', 'Boisson'),
('Guinness', 'Boisson'),
('Heineken', 'Boisson'),
('Kilkenny', 'Boisson'),
('Leffe', 'Boisson'),
('Pelfort', 'Boisson'),
('Saucisson', 'Nourriture'),
('Steak', 'Nourriture');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `objet` varchar(20) NOT NULL DEFAULT '',
  `quantite` int(11) DEFAULT NULL,
  PRIMARY KEY (`objet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`objet`, `quantite`) VALUES
('Eau', 1000),
('Fritte', 1000),
('Grimbergen', 5),
('Guinness', 10),
('Heineken', 7),
('Kilkenny', 10),
('Leffe', 4),
('Pelfort', 0),
('Saucisson', 10),
('Steak', 50);

--
-- Triggers `stock`
--
DROP TRIGGER IF EXISTS `update_courses_stock`;
DELIMITER //
CREATE TRIGGER `update_courses_stock` AFTER UPDATE ON `stock`
 FOR EACH ROW BEGIN

	IF NEW.quantite = 0 THEN
		INSERT INTO courses (objet) VALUES (NEW.objet);
	END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `stock_boisson`
--
CREATE TABLE IF NOT EXISTS `stock_boisson` (
`objet` varchar(20)
,`quantite` int(11)
);
-- --------------------------------------------------------

--
-- Structure for view `stock_boisson`
--
DROP TABLE IF EXISTS `stock_boisson`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `stock_boisson` AS select `stock`.`objet` AS `objet`,`stock`.`quantite` AS `quantite` from (`stock` join `ingredient`) where ((`stock`.`objet` = `ingredient`.`objet`) and (`ingredient`.`categorie` = 'Boisson'));

--
-- Constraints for dumped tables
--

--
-- Constraints for table `conso`
--
ALTER TABLE `conso`
  ADD CONSTRAINT `a_consome` FOREIGN KEY (`surnom`) REFERENCES `colocataire` (`surnom`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `l_ingredient` FOREIGN KEY (`objet`) REFERENCES `ingredient` (`objet`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ingredient`
--
ALTER TABLE `ingredient`
  ADD CONSTRAINT `objet_stocke` FOREIGN KEY (`objet`) REFERENCES `stock` (`objet`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `ingerdient_stocker` FOREIGN KEY (`objet`) REFERENCES `ingredient` (`objet`) ON DELETE NO ACTION ON UPDATE NO ACTION;
--
-- Database: `finances`
--
CREATE DATABASE IF NOT EXISTS `finances` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `finances`;

-- --------------------------------------------------------

--
-- Table structure for table `depenses`
--

CREATE TABLE IF NOT EXISTS `depenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `categorie` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `montant` double NOT NULL DEFAULT '0',
  `auteur` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auteur` (`auteur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=54 ;

--
-- Dumping data for table `depenses`
--

INSERT INTO `depenses` (`id`, `label`, `categorie`, `montant`, `auteur`, `date`) VALUES
(2, 'Carrefour', 'alimentation', 33.27, 'Silene', '2013-11-02'),
(3, 'Monoprix', 'alimentation', 12.78, 'Silene', '2013-11-02'),
(4, 'Picard', 'alimentation', 8.75, 'Silene', '2013-11-02'),
(5, 'Monoprix', 'alimentation', 9.54, 'Silene', '2013-11-08'),
(6, 'Carrefour', 'alimentation', 32.35, 'Franck', '2013-11-26'),
(7, 'Picard', 'alimentation', 3.95, 'Silene', '2013-11-08'),
(8, 'Veterinaire', 'charleston', 4.85, 'Silene', '2013-11-15'),
(9, 'Carrefour', 'alimentation', 25.47, 'Silene', '2013-11-16'),
(10, 'Monoprix', 'alimentation', 7.61, 'Silene', '2013-11-25'),
(11, 'Monoprix', 'alimentation', 1.34, 'Silene', '2013-11-25'),
(12, 'Carrefour', 'alimentation', 33, 'Silene', '2013-11-26'),
(13, 'Pharmacie-pilule', 'exceptionnel', 7.12, 'Silene', '2013-11-27'),
(14, 'Monoprix', 'alimentation', 5.6, 'Franck', '2013-11-23'),
(15, 'Carrefour', 'alimentation', 26, 'Franck', '2013-11-16'),
(16, 'Carrefour', 'alimentation', 43.43, 'Franck', '2013-11-09'),
(17, 'Lidl', 'alimentation', 5.98, 'Franck', '2013-11-04'),
(18, 'MarchÃ© presqu ile', 'alimentation', 7.51, 'Franck', '2013-11-05'),
(19, 'Monop', 'alimentation', 10.81, 'Franck', '2013-11-27'),
(20, 'L bar', 'alimentation', 18, 'Franck', '2013-11-28'),
(21, 'Carrefour', 'alimentation', 27.61, 'Franck', '2013-12-02'),
(22, 'Picard', 'alimentation', 16.7, 'Franck', '2013-12-07'),
(23, 'Crepe', 'alimentation', 20.4, 'Franck', '2013-12-11'),
(24, 'Picard', 'alimentation', 6, 'Franck', '2013-12-07'),
(25, 'VÃ©tÃ©rinaire', 'charleston', 7, 'Silene', '2013-12-03'),
(26, 'Monoprix', 'alimentation', 4.78, 'Silene', '2013-12-04'),
(27, 'Carrefour', 'alimentation', 27.61, 'Silene', '2013-12-02'),
(28, 'Picard', 'alimentation', 7.9, 'Silene', '2013-12-09'),
(29, 'Carrefour', 'alimentation', 38.4, 'Silene', '2013-12-12'),
(30, 'Litiere', 'charleston', 5.8, 'Franck', '2013-12-16'),
(31, 'Bouffe', 'alimentation', 13.2, 'Franck', '2013-12-16'),
(32, 'Monoprix', 'exceptionnel', 1.34, 'Silene', '2013-12-16'),
(33, 'Carrefour', 'alimentation', 15.38, 'Silene', '2013-12-23'),
(34, 'Picard', 'alimentation', 2.8, 'Silene', '2013-12-19'),
(35, 'A2 pas', 'alimentation', 1.94, 'Silene', '2013-12-24'),
(36, 'Picard', 'alimentation', 12.9, 'Franck', '2013-12-30'),
(37, 'Carrefour', 'alimentation', 39.95, 'Silene', '2013-12-30'),
(38, 'Monoprix', 'alimentation', 24.18, 'Franck', '2013-12-19'),
(39, 'Monoprix', 'exceptionnel', 1.34, 'Silene', '2013-12-23'),
(40, 'Monoprix', 'charleston', 5.59, 'Silene', '2014-01-04'),
(41, 'Picard', 'alimentation', 5.05, 'Silene', '2014-01-04'),
(42, 'OpÃ©ration', 'charleston', 4.85, 'Silene', '2014-01-15'),
(43, 'Pizza', 'exceptionnel', 15.98, 'Franck', '2014-01-07'),
(44, 'A2 pas - biÃ¨res', 'alimentation', 4.63, 'Franck', '2014-01-07'),
(45, 'Carrefour', 'alimentation', 22.34, 'Silene', '2014-01-07'),
(46, 'Carrefour', 'alimentation', 22.34, 'Franck', '2014-01-07'),
(47, 'Carrefour', 'alimentation', 32.83, 'Silene', '2014-01-16'),
(48, 'Carrefour', 'alimentation', 32.84, 'Franck', '2014-01-16'),
(49, 'Picard', 'alimentation', 9, 'Franck', '2014-01-15'),
(50, 'A2 pas', 'alimentation', 8.5, 'Franck', '2014-01-15'),
(51, 'Monoprix', 'alimentation', 7.15, 'Silene', '2014-01-15'),
(52, 'A2 pas - anniversaire Keup', 'exceptionnel', 2.85, 'Silene', '2014-01-10'),
(53, 'Monoprix', 'alimentation', 8.34, 'Silene', '2014-01-17');

-- --------------------------------------------------------

--
-- Table structure for table `personnes`
--

CREATE TABLE IF NOT EXISTS `personnes` (
  `nom` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `personnes`
--

INSERT INTO `personnes` (`nom`) VALUES
('Franck'),
('Silene');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `depenses`
--
ALTER TABLE `depenses`
  ADD CONSTRAINT `de` FOREIGN KEY (`auteur`) REFERENCES `personnes` (`nom`) ON DELETE NO ACTION ON UPDATE CASCADE;
--
-- Database: `manga`
--
CREATE DATABASE IF NOT EXISTS `manga` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `manga`;

-- --------------------------------------------------------

--
-- Stand-in structure for view `bibliotheque_manga`
--
CREATE TABLE IF NOT EXISTS `bibliotheque_manga` (
`nom` varchar(45)
,`num` mediumint(9)
);
-- --------------------------------------------------------

--
-- Table structure for table `manga`
--

CREATE TABLE IF NOT EXISTS `manga` (
  `idmanga` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `idauteur` int(11) NOT NULL,
  `iddessinateur` int(11) NOT NULL,
  PRIMARY KEY (`idmanga`),
  KEY `fk_manga_personnes_idx` (`idauteur`),
  KEY `fk_manga_dessin_idx` (`iddessinateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `manga`
--

INSERT INTO `manga` (`idmanga`, `nom`, `idauteur`, `iddessinateur`) VALUES
(1, 'One Piece', 1, 1),
(2, 'Hunter X Hunter', 3, 3),
(3, 'Bleach', 4, 4),
(4, 'Naruto', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `personnes`
--

CREATE TABLE IF NOT EXISTS `personnes` (
  `idpersonnes` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `nation` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idpersonnes`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `personnes`
--

INSERT INTO `personnes` (`idpersonnes`, `nom`, `prenom`, `nation`) VALUES
(1, 'Oda', 'Eiichiro', 'Japon'),
(2, 'Kishimoto', 'Masashi', 'Japon'),
(3, 'Togashi', 'Yoshihiro', 'Japon'),
(4, 'Kubo', 'Tite', '');

-- --------------------------------------------------------

--
-- Table structure for table `possedes`
--

CREATE TABLE IF NOT EXISTS `possedes` (
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `possedes`
--

INSERT INTO `possedes` (`id`) VALUES
(1),
(2),
(3),
(4),
(5);

-- --------------------------------------------------------

--
-- Table structure for table `scan`
--

CREATE TABLE IF NOT EXISTS `scan` (
  `idscan` int(11) NOT NULL AUTO_INCREMENT,
  `idmanga` int(11) NOT NULL,
  `idtome` int(11) DEFAULT NULL,
  `numero` int(11) NOT NULL,
  PRIMARY KEY (`idscan`),
  KEY `fk_scan_manga_idx` (`idmanga`),
  KEY `fk_scan_tome_idx` (`idtome`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tome`
--

CREATE TABLE IF NOT EXISTS `tome` (
  `idtome` int(11) NOT NULL AUTO_INCREMENT,
  `idmanga` int(11) NOT NULL,
  `numero` mediumint(9) NOT NULL DEFAULT '0',
  `prix` double NOT NULL DEFAULT '6.5',
  `nom` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idtome`,`idmanga`),
  KEY `fk_tome_manga_idx` (`idmanga`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tome`
--

INSERT INTO `tome` (`idtome`, `idmanga`, `numero`, `prix`, `nom`) VALUES
(1, 1, 1, 0, NULL),
(2, 1, 2, 0, NULL),
(3, 1, 3, 0, NULL),
(4, 2, 1, 0, NULL),
(5, 3, 1, 0, NULL),
(6, 4, 1, 0, NULL);

-- --------------------------------------------------------

--
-- Structure for view `bibliotheque_manga`
--
DROP TABLE IF EXISTS `bibliotheque_manga`;

CREATE ALGORITHM=UNDEFINED DEFINER=`Malhgor`@`localhost` SQL SECURITY DEFINER VIEW `bibliotheque_manga` AS select `nom` AS `nom`,`tome`.`numero` AS `num` from ((`manga` join `tome` on((`idmanga` = `tome`.`idmanga`))) join `possedes`) where (`tome`.`idtome` = `possedes`.`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `manga`
--
ALTER TABLE `manga`
  ADD CONSTRAINT `fk_manga_auteur` FOREIGN KEY (`idauteur`) REFERENCES `personnes` (`idpersonnes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_manga_dessin` FOREIGN KEY (`iddessinateur`) REFERENCES `personnes` (`idpersonnes`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `possedes`
--
ALTER TABLE `possedes`
  ADD CONSTRAINT `fk_possedes_manga` FOREIGN KEY (`id`) REFERENCES `tome` (`idtome`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `scan`
--
ALTER TABLE `scan`
  ADD CONSTRAINT `fk_scan_manga` FOREIGN KEY (`idmanga`) REFERENCES `manga` (`idmanga`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_scan_tome` FOREIGN KEY (`idtome`) REFERENCES `tome` (`idtome`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tome`
--
ALTER TABLE `tome`
  ADD CONSTRAINT `fk_tome_manga` FOREIGN KEY (`idmanga`) REFERENCES `manga` (`idmanga`) ON DELETE NO ACTION ON UPDATE NO ACTION;
--
-- Database: `projet`
--
CREATE DATABASE IF NOT EXISTS `projet` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `projet`;

-- --------------------------------------------------------

--
-- Table structure for table `employes`
--

CREATE TABLE IF NOT EXISTS `employes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `adresse` varchar(45) DEFAULT NULL,
  `salaire` int(11) DEFAULT '0',
  `secu` int(11) DEFAULT '0',
  `sol` char(3) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT 'sol',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Triggers `employes`
--
DROP TRIGGER IF EXISTS `autoAddPersoVol`;
DELIMITER //
CREATE TRIGGER `autoAddPersoVol` AFTER INSERT ON `employes`
 FOR EACH ROW BEGIN
	IF NEW.assign = 'vol' THEN 
		INSERT INTO personnel_vol (id,heures,fonction) VALUES (NEW.id,DEFAULT,DEFAULT);
	END IF;
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `autoUpdatePersVol`;
DELIMITER //
CREATE TRIGGER `autoUpdatePersVol` AFTER UPDATE ON `employes`
 FOR EACH ROW BEGIN
	DECLARE previousAssign CHAR(3);
	DECLARE previousPersoVolID integer;	
	SELECT assign INTO previousAssign FROM employes WHERE NEW.id = employes.id;
	SELECT id INTO previousPersoVolID FROM personnel_vol WHERE NEW.id = personnel_vol.id;
	IF NEW.assign = 'vol' & previousPersoVolID = NULL THEN 
		INSERT INTO personnel_vol (id,heures,fonction) VALUES (NEW.id,DEFAULT,DEFAULT);
	ELSEIF NEW.assign != 'vol' & previousAssign = 'vol' THEN
		DELETE FROM personnel_vol WHERE NEW.id = personnel_vol.id;
	END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `personnel_vol`
--

CREATE TABLE IF NOT EXISTS `personnel_vol` (
  `id` int(11) NOT NULL,
  `heures` int(11) DEFAULT '0',
  `fonction` varchar(45) DEFAULT 'undefined',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `personnel_vol`
--
DROP TRIGGER IF EXISTS `autoAddPilote`;
DELIMITER //
CREATE TRIGGER `autoAddPilote` AFTER INSERT ON `personnel_vol`
 FOR EACH ROW BEGIN
	IF NEW.fonction = 'pilote' THEN 
		INSERT INTO pilotes (id,license) VALUES (NEW.id,DEFAULT);
	END IF;
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `autoUpdatePilote`;
DELIMITER //
CREATE TRIGGER `autoUpdatePilote` AFTER UPDATE ON `personnel_vol`
 FOR EACH ROW BEGIN
	DECLARE previousFonction VARCHAR(45);
	SELECT fonction INTO previousFonction FROM personnel_vol WHERE NEW.id = id;
	
	IF NEW.fonction = 'pilote' THEN 
		INSERT INTO pilotes (id,license) VALUES (NEW.id,DEFAULT);
	
	ELSEIF previousFonction = 'pilote' & NEW.fonction != 'pilote' THEN
		DELETE FROM pilotes WHERE NEW.id = pilotes.id;
	END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pilotes`
--

CREATE TABLE IF NOT EXISTS `pilotes` (
  `id` int(11) NOT NULL,
  `license` varchar(45) DEFAULT 'undefined',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `personnel_vol`
--
ALTER TABLE `personnel_vol`
  ADD CONSTRAINT `identifiantFromEmployes` FOREIGN KEY (`id`) REFERENCES `employes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pilotes`
--
ALTER TABLE `pilotes`
  ADD CONSTRAINT `identifiantFromPersVol` FOREIGN KEY (`id`) REFERENCES `personnel_vol` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
