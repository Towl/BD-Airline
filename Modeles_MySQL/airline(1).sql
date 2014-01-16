-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 06 Janvier 2014 à 12:41
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `airline`
--
CREATE DATABASE IF NOT EXISTS `airline` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `airline`;

-- --------------------------------------------------------

--
-- Structure de la table `aeroport`
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
-- Contenu de la table `aeroport`
--

INSERT INTO `aeroport` (`idaeroport`, `code`, `nom`, `pays`, `ville`) VALUES
(1, 'CDG', 'Charles de Gaulle', 'France', 'Paris'),
(2, 'NAY', 'Nan Yuan Air Base', 'Beijin', 'Chine'),
(3, 'NGS', 'Nagasaki International Airport', 'Nagasaki', 'Japan'),
(4, 'NOR', 'Nordfjordur', 'Nordfjordu', 'Islande'),
(5, 'NQU', 'Nuqui', 'Nuqui', 'Colombie');

-- --------------------------------------------------------

--
-- Structure de la table `assignements`
--

CREATE TABLE IF NOT EXISTS `assignements` (
  `valAssign` char(3) NOT NULL,
  PRIMARY KEY (`valAssign`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `assignements`
--

INSERT INTO `assignements` (`valAssign`) VALUES
('sol'),
('vol');

-- --------------------------------------------------------

--
-- Structure de la table `avions`
--

CREATE TABLE IF NOT EXISTS `avions` (
  `immatricule` int(11) NOT NULL,
  `modele` varchar(45) NOT NULL,
  PRIMARY KEY (`immatricule`,`modele`),
  KEY `fk_Avion_modele1_idx` (`modele`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `avions`
--

INSERT INTO `avions` (`immatricule`, `modele`) VALUES
(0, 'Airbus A320');

-- --------------------------------------------------------

--
-- Structure de la table `billets`
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
-- Structure de la table `candidatures`
--

CREATE TABLE IF NOT EXISTS `candidatures` (
  `idcandidat` int(11) NOT NULL,
  `secu` int(11) NOT NULL,
  PRIMARY KEY (`idcandidat`),
  KEY `fk_candidat_personne_idx` (`idcandidat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `candidatures`
--

INSERT INTO `candidatures` (`idcandidat`, `secu`) VALUES
(1, 123456),
(5, 369852),
(6, 145236);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `donneeemployes`
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
-- Doublure de structure pour la vue `donnees_accueil`
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
-- Structure de la table `employes`
--

CREATE TABLE IF NOT EXISTS `employes` (
  `idemploye` int(11) NOT NULL,
  `assign` char(3) NOT NULL,
  `salaire` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idemploye`),
  KEY `typeDePersonnel_idx` (`assign`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `employes`
--

INSERT INTO `employes` (`idemploye`, `assign`, `salaire`) VALUES
(1, 'vol', 20000),
(5, 'vol', 6000),
(6, 'sol', 7500);

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
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
-- Structure de la table `fonctions`
--

CREATE TABLE IF NOT EXISTS `fonctions` (
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `hebdodepart`
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
-- Structure de la table `liaisons`
--

CREATE TABLE IF NOT EXISTS `liaisons` (
  `idliaison` int(11) NOT NULL AUTO_INCREMENT,
  `idaeroport_origin` int(11) NOT NULL,
  `idaeroport_destin` int(11) NOT NULL,
  PRIMARY KEY (`idliaison`),
  KEY `fk_liaisons_aeroport2_idx` (`idaeroport_destin`),
  KEY `fk_liaisons_aeroport1` (`idaeroport_origin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `liaisons`
--

INSERT INTO `liaisons` (`idliaison`, `idaeroport_origin`, `idaeroport_destin`) VALUES
(1, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE IF NOT EXISTS `membres` (
  `idmembre` int(11) NOT NULL,
  `fonction` varchar(45) NOT NULL,
  PRIMARY KEY (`idmembre`),
  KEY `fk_membres_fonction_idx` (`fonction`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `modeles`
--

CREATE TABLE IF NOT EXISTS `modeles` (
  `idmodele` varchar(45) NOT NULL,
  PRIMARY KEY (`idmodele`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `modeles`
--

INSERT INTO `modeles` (`idmodele`) VALUES
('Airbus A320');

-- --------------------------------------------------------

--
-- Structure de la table `navigants`
--

CREATE TABLE IF NOT EXISTS `navigants` (
  `idnavigants` int(11) NOT NULL,
  `heures` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idnavigants`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `passagers`
--

CREATE TABLE IF NOT EXISTS `passagers` (
  `idpassagers` int(11) NOT NULL,
  PRIMARY KEY (`idpassagers`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `periodes`
--

CREATE TABLE IF NOT EXISTS `periodes` (
  `idperiode` int(11) NOT NULL,
  `debut` date NOT NULL,
  `fin` date NOT NULL,
  PRIMARY KEY (`idperiode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `periodes`
--

INSERT INTO `periodes` (`idperiode`, `debut`, `fin`) VALUES
(0, '2013-01-01', '2014-01-01');

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

CREATE TABLE IF NOT EXISTS `personnes` (
  `idpersonne` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `adresse` varchar(45) NOT NULL DEFAULT 'undefined',
  PRIMARY KEY (`idpersonne`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `personnes`
--

INSERT INTO `personnes` (`idpersonne`, `nom`, `prenom`, `adresse`) VALUES
(1, 'Benoit', 'Eudier', ' rue Machin'),
(5, 'Franck', 'Coutouly', 'Quelque part dans Lyon'),
(6, 'Jean', 'Paul', '7 rue de la RÃ©publique');

-- --------------------------------------------------------

--
-- Structure de la table `pilotes`
--

CREATE TABLE IF NOT EXISTS `pilotes` (
  `idpilote` int(11) NOT NULL,
  `license` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idpilote`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `vol`
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
-- Contenu de la table `vol`
--

INSERT INTO `vol` (`idvol`, `avions_immatricule`, `idliaison`, `idperiode`, `hdepart`, `harrivee`) VALUES
(0, 0, 1, 0, '2013-04-26 06:00:00', '2013-04-26 20:22:00'),
(1, 0, 1, 0, '2013-04-26 06:00:00', '2013-04-26 20:22:00');

-- --------------------------------------------------------

--
-- Structure de la vue `donneeemployes`
--
DROP TABLE IF EXISTS `donneeemployes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `donneeemployes` AS select `p`.`idpersonne` AS `id`,`p`.`nom` AS `nom`,`p`.`prenom` AS `prenom`,`p`.`adresse` AS `adresse`,`c`.`secu` AS `secu`,`e`.`assign` AS `assign`,`e`.`salaire` AS `salaire` from ((`personnes` `p` join `candidatures` `c`) join `employes` `e`) where ((`p`.`idpersonne` = `c`.`idcandidat`) and (`c`.`idcandidat` = `e`.`idemploye`));

-- --------------------------------------------------------

--
-- Structure de la vue `donnees_accueil`
--
DROP TABLE IF EXISTS `donnees_accueil`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `donnees_accueil` AS select `l`.`idliaison` AS `idliaison`,`a1`.`nom` AS `nom_depart`,`a1`.`code` AS `code_depart`,`a1`.`pays` AS `pays_depart`,`a1`.`ville` AS `ville_depart`,`a2`.`nom` AS `nom_destin`,`a2`.`code` AS `code_destin`,`a2`.`pays` AS `pays_destin`,`a2`.`ville` AS `ville_destin` from ((`aeroport` `a1` join `aeroport` `a2`) join `liaisons` `l`) where ((`l`.`idaeroport_origin` = `a1`.`idaeroport`) and (`l`.`idaeroport_destin` = `a2`.`idaeroport`));

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `avions`
--
ALTER TABLE `avions`
  ADD CONSTRAINT `fk_Avion_modele1` FOREIGN KEY (`modele`) REFERENCES `modeles` (`idmodele`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `billets`
--
ALTER TABLE `billets`
  ADD CONSTRAINT `fk_billets_hebdodepart` FOREIGN KEY (`iddepart`) REFERENCES `hebdodepart` (`idhebdodepart`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_billets_passager` FOREIGN KEY (`idpassager`) REFERENCES `passagers` (`idpassagers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `candidatures`
--
ALTER TABLE `candidatures`
  ADD CONSTRAINT `fk_candidat_personne` FOREIGN KEY (`idcandidat`) REFERENCES `personnes` (`idpersonne`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `employes`
--
ALTER TABLE `employes`
  ADD CONSTRAINT `typeDePersonnel` FOREIGN KEY (`assign`) REFERENCES `assignements` (`valAssign`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_employe_candidat` FOREIGN KEY (`idemploye`) REFERENCES `candidatures` (`idcandidat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD CONSTRAINT `fk_equipe_membre1` FOREIGN KEY (`idnavigant1`) REFERENCES `membres` (`idmembre`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_equipe_membre2` FOREIGN KEY (`idnavigant2`) REFERENCES `membres` (`idmembre`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_equipe_pilote1` FOREIGN KEY (`idpilote1`) REFERENCES `pilotes` (`idpilote`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_equipe_pilote2` FOREIGN KEY (`idpilote2`) REFERENCES `pilotes` (`idpilote`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `hebdodepart`
--
ALTER TABLE `hebdodepart`
  ADD CONSTRAINT `fk_hebdodepart_equipe` FOREIGN KEY (`idequipe`) REFERENCES `equipe` (`idequipe`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hebdodepart_vol1` FOREIGN KEY (`idvol`) REFERENCES `vol` (`idvol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `liaisons`
--
ALTER TABLE `liaisons`
  ADD CONSTRAINT `fk_liaisons_aeroport1` FOREIGN KEY (`idaeroport_origin`) REFERENCES `aeroport` (`idaeroport`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_liaisons_aeroport2` FOREIGN KEY (`idaeroport_destin`) REFERENCES `aeroport` (`idaeroport`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `membres`
--
ALTER TABLE `membres`
  ADD CONSTRAINT `fk_membres_fonction` FOREIGN KEY (`fonction`) REFERENCES `fonctions` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_membres_navigant` FOREIGN KEY (`idmembre`) REFERENCES `navigants` (`idnavigants`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `navigants`
--
ALTER TABLE `navigants`
  ADD CONSTRAINT `employesNavigant` FOREIGN KEY (`idnavigants`) REFERENCES `employes` (`idemploye`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `passagers`
--
ALTER TABLE `passagers`
  ADD CONSTRAINT `fk_passagers_personnes` FOREIGN KEY (`idpassagers`) REFERENCES `personnes` (`idpersonne`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `pilotes`
--
ALTER TABLE `pilotes`
  ADD CONSTRAINT `identifiantFromPersVol` FOREIGN KEY (`idpilote`) REFERENCES `navigants` (`idnavigants`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `vol`
--
ALTER TABLE `vol`
  ADD CONSTRAINT `fk_vol_avions` FOREIGN KEY (`avions_immatricule`) REFERENCES `avions` (`immatricule`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vol_liaisons` FOREIGN KEY (`idliaison`) REFERENCES `liaisons` (`idliaison`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vol_periode` FOREIGN KEY (`idperiode`) REFERENCES `periodes` (`idperiode`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
