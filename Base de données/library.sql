-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 07 sep. 2021 à 19:37
-- Version du serveur :  8.0.21
-- Version de PHP : 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `library`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `FullName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `AdminEmail` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `UserName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ROLE` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `FullName`, `AdminEmail`, `UserName`, `ROLE`, `Password`, `updationDate`) VALUES
(3, 'admin', 'admin@gmail.com', 'admin', 'ADMIN', '827ccb0eea8a706c4c34a16891f84e7b', '2021-07-23 19:12:50'),
(4, 'Oumar Cissé', 'cisseoumar621@gmail.com', 'Oumar621', 'GEST', '827ccb0eea8a706c4c34a16891f84e7b', NULL),
(5, 'INTEC SUP', 'bibliotheque-intecsup@gmail.com', 'INTECSUP', 'ADMIN', '25f9e794323b453885f5181f1b624d0b', '2021-07-23 19:41:19');

-- --------------------------------------------------------

--
-- Structure de la table `annee`
--

DROP TABLE IF EXISTS `annee`;
CREATE TABLE IF NOT EXISTS `annee` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Creation_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Update_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `annee`
--

INSERT INTO `annee` (`id`, `libelle`, `Creation_date`, `Update_date`) VALUES
(15, '2021', '2021-05-30 18:38:13', '0000-00-00 00:00:00'),
(16, '2022', '2021-05-30 18:38:21', '0000-00-00 00:00:00'),
(18, '2023', '2021-05-30 18:39:15', '0000-00-00 00:00:00'),
(22, '2024', '2021-06-30 12:27:16', NULL),
(20, '2025', '2021-05-30 18:54:51', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `casier`
--

DROP TABLE IF EXISTS `casier`;
CREATE TABLE IF NOT EXISTS `casier` (
  `id_casier` int NOT NULL AUTO_INCREMENT,
  `casier` varchar(60) NOT NULL,
  `Creation_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Update_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_casier`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `casier`
--

INSERT INTO `casier` (`id_casier`, `casier`, `Creation_date`, `Update_date`) VALUES
(17, 'casier/01', '2021-06-03 15:46:43', '2021-06-03 19:17:19'),
(18, 'casier/02', '2021-06-04 08:54:29', '2021-06-04 08:54:39'),
(21, 'casier/03', '2021-07-09 10:10:01', '2021-08-06 23:06:51');

-- --------------------------------------------------------

--
-- Structure de la table `cycle`
--

DROP TABLE IF EXISTS `cycle`;
CREATE TABLE IF NOT EXISTS `cycle` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Nom_cycle` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Creation_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Update_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=103 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `cycle`
--

INSERT INTO `cycle` (`id`, `Nom_cycle`, `Creation_date`, `Update_date`) VALUES
(81, 'DUT 1', '2021-06-15 22:11:46', '2021-08-06 22:48:01'),
(85, 'DUT 2', '2021-06-20 20:58:45', '2021-08-06 22:48:11'),
(86, 'LICENCE', '2021-06-20 20:58:50', '2021-08-06 22:48:28'),
(90, 'MASTER', '2021-06-20 21:01:07', '2021-08-06 22:48:33');

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

DROP TABLE IF EXISTS `filiere`;
CREATE TABLE IF NOT EXISTS `filiere` (
  `id_filiere` int NOT NULL AUTO_INCREMENT,
  `id_cycle` int NOT NULL,
  `libelle` varchar(60) NOT NULL,
  `Creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Update_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_filiere`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `filiere`
--

INSERT INTO `filiere` (`id_filiere`, `id_cycle`, `libelle`, `Creation_date`, `Update_date`) VALUES
(17, 86, 'PDI', '2021-07-15 15:47:08', '2021-08-06 22:49:52');

-- --------------------------------------------------------

--
-- Structure de la table `memoire`
--

DROP TABLE IF EXISTS `memoire`;
CREATE TABLE IF NOT EXISTS `memoire` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_memoire` varchar(255) NOT NULL,
  `Filiere` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `CatId` int NOT NULL,
  `nom_auteur` varchar(100) NOT NULL,
  `Casier` varchar(60) NOT NULL,
  `Ranger` varchar(60) NOT NULL,
  `Cycle` varchar(60) NOT NULL,
  `Nbre_page` int NOT NULL,
  `Date_soutenance` date NOT NULL,
  `RegDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `memoire`
--

INSERT INTO `memoire` (`id`, `nom_memoire`, `Filiere`, `CatId`, `nom_auteur`, `Casier`, `Ranger`, `Cycle`, `Nbre_page`, `Date_soutenance`, `RegDate`, `UpdationDate`) VALUES
(15, 'GESTION DU TEMPS', '17', 32, '21', '17', '23', '', 25, '2021-08-06', '2021-08-06 18:25:03', '2021-08-06 19:42:47');

-- --------------------------------------------------------

--
-- Structure de la table `mois`
--

DROP TABLE IF EXISTS `mois`;
CREATE TABLE IF NOT EXISTS `mois` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Creation_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Update_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `mois`
--

INSERT INTO `mois` (`id`, `libelle`, `Creation_date`, `Update_date`) VALUES
(1, 'Janvier', '2021-05-28 19:49:43', NULL),
(2, 'Février', '2021-05-28 19:50:33', NULL),
(3, 'Mars', '2021-05-28 20:17:38', NULL),
(4, 'Avril', '2021-05-28 20:17:47', NULL),
(5, 'Mai', '2021-05-28 20:17:52', NULL),
(6, 'Juin', '2021-05-28 20:17:57', NULL),
(7, 'Juillet', '2021-05-29 08:14:32', NULL),
(8, 'Août', '2021-05-30 15:46:21', NULL),
(9, 'Septembre', '2021-05-30 15:46:33', NULL),
(23, 'Octobre', '2021-08-06 22:54:42', NULL),
(24, 'Novembre', '2021-08-06 22:54:54', NULL),
(25, 'Décembre', '2021-08-06 22:55:07', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `ranger`
--

DROP TABLE IF EXISTS `ranger`;
CREATE TABLE IF NOT EXISTS `ranger` (
  `id_ranger` int NOT NULL AUTO_INCREMENT,
  `ranger` varchar(60) NOT NULL,
  `Creation_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Update_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_ranger`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ranger`
--

INSERT INTO `ranger` (`id_ranger`, `ranger`, `Creation_date`, `Update_date`) VALUES
(22, 'rangée/01', '2021-06-03 15:46:20', '2021-08-06 22:48:55'),
(23, 'rangée/02', '2021-06-04 08:54:15', '2021-08-06 22:49:00'),
(25, 'ranger/03', '2021-06-30 11:53:33', '2021-08-06 22:49:09');

-- --------------------------------------------------------

--
-- Structure de la table `tblauthors`
--

DROP TABLE IF EXISTS `tblauthors`;
CREATE TABLE IF NOT EXISTS `tblauthors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `AuthorName` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tblauthors`
--

INSERT INTO `tblauthors` (`id`, `AuthorName`, `creationDate`, `UpdationDate`) VALUES
(20, 'Aly Traoré', '2021-07-30 20:10:34', '2021-08-06 22:56:24'),
(21, 'Moussa Cissé', '2021-07-30 20:10:39', '2021-08-06 22:56:31');

-- --------------------------------------------------------

--
-- Structure de la table `tblbooks`
--

DROP TABLE IF EXISTS `tblbooks`;
CREATE TABLE IF NOT EXISTS `tblbooks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `BookName` varchar(255) NOT NULL,
  `CatId` int NOT NULL,
  `AuthorId` int NOT NULL,
  `Casier` int NOT NULL,
  `Ranger` int NOT NULL,
  `Nbre_page` int NOT NULL,
  `Quantite` varchar(100) NOT NULL,
  `Stock` varchar(100) NOT NULL,
  `ISBNNumber` varchar(100) NOT NULL,
  `RegDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tblbooks`
--

INSERT INTO `tblbooks` (`id`, `BookName`, `CatId`, `AuthorId`, `Casier`, `Ranger`, `Nbre_page`, `Quantite`, `Stock`, `ISBNNumber`, `RegDate`, `UpdationDate`) VALUES
(5, 'OEUVRE POETIQUE', 35, 21, 17, 22, 123, '', '', '9782020121064', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tblcategory`
--

DROP TABLE IF EXISTS `tblcategory`;
CREATE TABLE IF NOT EXISTS `tblcategory` (
  `id` int NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Status` int DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `CategoryName`, `Status`, `CreationDate`, `UpdationDate`) VALUES
(32, 'Informatique', 1, '2021-07-15 15:47:58', '2021-08-06 22:40:39'),
(35, 'Littérature', 1, '2021-07-23 17:49:41', '2021-08-06 22:40:55'),
(38, 'Droit', 1, '2021-08-06 22:44:29', '2021-08-06 22:46:20'),
(39, 'Economie', 1, '2021-08-06 22:44:37', '2021-08-06 22:46:29'),
(40, 'Gestion', 1, '2021-08-06 22:44:47', '2021-08-06 22:46:59'),
(41, 'Journalisme et Communication', 1, '2021-08-06 22:45:07', '2021-08-06 22:47:06'),
(42, 'Marketing', 1, '2021-08-06 22:45:20', '2021-08-06 22:47:18'),
(43, 'Gestion Logistique', 1, '2021-08-06 22:45:41', '2021-08-06 22:47:38'),
(45, 'Droit des aFFAIRE', 1, '2021-08-07 09:36:00', '2021-08-07 09:36:10');

-- --------------------------------------------------------

--
-- Structure de la table `tblissuedbookdetails`
--

DROP TABLE IF EXISTS `tblissuedbookdetails`;
CREATE TABLE IF NOT EXISTS `tblissuedbookdetails` (
  `id` int NOT NULL AUTO_INCREMENT,
  `BookId` int DEFAULT NULL,
  `StudentID` varchar(150) DEFAULT NULL,
  `IssuesDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ReturnDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `RetrunStatus` int NOT NULL,
  `fine` int DEFAULT NULL,
  `Delai_livre` varchar(10) NOT NULL,
  `Mois` varchar(50) NOT NULL,
  `Annee` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `BookId` (`BookId`),
  KEY `BookId_2` (`BookId`)
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tblissuedbookdetails`
--

INSERT INTO `tblissuedbookdetails` (`id`, `BookId`, `StudentID`, `IssuesDate`, `ReturnDate`, `RetrunStatus`, `fine`, `Delai_livre`, `Mois`, `Annee`) VALUES
(134, 5, '894879KNKIU', '2021-08-07 09:38:31', NULL, 0, NULL, '22-08-2021', 'Août', '2021');

-- --------------------------------------------------------

--
-- Structure de la table `tblstudents`
--

DROP TABLE IF EXISTS `tblstudents`;
CREATE TABLE IF NOT EXISTS `tblstudents` (
  `id` int NOT NULL AUTO_INCREMENT,
  `StudentId` varchar(100) DEFAULT NULL,
  `FullName` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `EmailId` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Cycle` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `MobileNumber` int DEFAULT NULL,
  `Password` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Photo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `confirmkey` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `confirme` int NOT NULL,
  `message` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `RegDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `StudentId` (`StudentId`)
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tblstudents`
--

INSERT INTO `tblstudents` (`id`, `StudentId`, `FullName`, `EmailId`, `Cycle`, `MobileNumber`, `Password`, `Photo`, `confirmkey`, `confirme`, `message`, `RegDate`, `UpdationDate`) VALUES
(148, '894879KNKIU', 'Oumar Cissé', 'dev@gmail.com', 'LICENCE', 67890989, '827ccb0eea8a706c4c34a16891f84e7b', 'upload/1628324282.jpg', '02318486481840', 1, 'Bonjour !', '2021-08-07 08:07:39', '2021-08-07 09:39:29'),
(149, '874RKJJKD894', 'Moussa DIARRA', 'cisseoumar621@gmail.com', 'DUT 2', 67890989, '827ccb0eea8a706c4c34a16891f84e7b', '', '63349164340229', 1, 'Merci !', '2021-08-07 09:42:07', '2021-08-07 09:44:12');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tblissuedbookdetails`
--
ALTER TABLE `tblissuedbookdetails`
  ADD CONSTRAINT `tblissuedbookdetails_ibfk_1` FOREIGN KEY (`BookId`) REFERENCES `tblbooks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
