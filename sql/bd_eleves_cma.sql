-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 03 fév. 2023 à 17:44
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bd_eleves_cma`
--

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

DROP TABLE IF EXISTS `competences`;
CREATE TABLE IF NOT EXISTS `competences` (
  `ID` bigint NOT NULL AUTO_INCREMENT,
  `TITRE` varchar(255) COLLATE utf8mb4_0900_as_ci NOT NULL,
  `DESCRIPTION` text COLLATE utf8mb4_0900_as_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_as_ci;

--
-- Déchargement des données de la table `competences`
--

INSERT INTO `competences` (`ID`, `TITRE`, `DESCRIPTION`) VALUES
(1, 'Curiosité', 'Tendance qui porte à apprendre, à connaître des choses nouvelles ou cachées.'),
(2, 'Imagination', 'Faculté de faire des combinaisons nouvelles d\'images ou d\'idées.'),
(3, 'Humour', 'Forme d\'esprit qui consiste à dégager les aspects plaisants et insolites de la réalité.'),
(4, 'Persévérance', 'Action de persévérer, qualité, conduite de quelqu\'un qui persévère.'),
(5, 'Autonomie', 'Faculté d\'agir librement, indépendance.');

-- --------------------------------------------------------

--
-- Structure de la table `eleves`
--

DROP TABLE IF EXISTS `eleves`;
CREATE TABLE IF NOT EXISTS `eleves` (
  `ID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `PRENOM` varchar(255) COLLATE utf8mb4_0900_as_cs NOT NULL,
  `NOM` varchar(255) COLLATE utf8mb4_0900_as_cs NOT NULL,
  `LOGIN` varchar(255) COLLATE utf8mb4_0900_as_cs NOT NULL,
  `PSW` longtext COLLATE utf8mb4_0900_as_cs NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_as_cs;

--
-- Déchargement des données de la table `eleves`
--

INSERT INTO `eleves` (`ID`, `PRENOM`, `NOM`, `LOGIN`, `PSW`) VALUES
(1, 'Paul', 'Renard', 'log1', 'psw1'),
(2, 'Marie', 'Renarde', 'log2', 'psw2'),
(3, 'Julie', 'Dupont', 'log3', 'psw3'),
(4, 'Dominic', 'Martin', 'log4', 'psw4'),
(5, 'Etienne', 'Renault', 'log5', 'psw5'),
(6, 'Jean-Marc', 'Mareau', 'log6', 'psw6'),
(7, 'Julien', 'Marceau', 'log7', 'psw7');

-- --------------------------------------------------------

--
-- Structure de la table `eleves_competences`
--

DROP TABLE IF EXISTS `eleves_competences`;
CREATE TABLE IF NOT EXISTS `eleves_competences` (
  `ID` bigint NOT NULL AUTO_INCREMENT,
  `NIVEAU` tinyint NOT NULL,
  `NIVEAU_AE` tinyint NOT NULL,
  `ELEVES_ID` bigint NOT NULL,
  `COMPETENCES_ID` tinyint NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `EC_COMPETENCES_ID_INDEX` (`COMPETENCES_ID`),
  KEY `EC_ELEVE_ID_INDEX` (`ELEVES_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `eleves_competences`
--

INSERT INTO `eleves_competences` (`ID`, `NIVEAU`, `NIVEAU_AE`, `ELEVES_ID`, `COMPETENCES_ID`) VALUES
(1, 10, 12, 1, 1),
(2, 8, 7, 1, 2),
(3, 12, 12, 1, 3),
(4, 14, 15, 1, 4),
(5, 9, 8, 1, 5),
(6, 11, 11, 2, 1),
(7, 5, 7, 2, 2),
(8, 14, 18, 2, 3),
(9, 12, 10, 2, 4),
(10, 8, 12, 3, 1),
(11, 8, 12, 3, 2),
(12, 12, 8, 3, 3),
(13, 10, 12, 4, 1),
(14, 18, 17, 4, 2),
(15, 17, 12, 5, 1),
(16, 3, 9, 5, 2),
(17, 9, 3, 5, 3),
(18, 14, 16, 5, 4),
(19, 19, 18, 5, 5),
(20, 10, 12, 6, 1),
(21, 8, 7, 6, 2),
(22, 12, 12, 6, 3),
(23, 14, 15, 6, 4),
(24, 9, 8, 6, 5);

-- --------------------------------------------------------

--
-- Structure de la table `eleves_informations`
--

DROP TABLE IF EXISTS `eleves_informations`;
CREATE TABLE IF NOT EXISTS `eleves_informations` (
  `AGE` smallint NOT NULL,
  `VILLE` varchar(255) NOT NULL,
  `AVATAR` varchar(255) NOT NULL,
  `ELEVES_ID` bigint NOT NULL,
  KEY `EI_ELEVE_ID_INDEX` (`ELEVES_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `eleves_informations`
--

INSERT INTO `eleves_informations` (`AGE`, `VILLE`, `AVATAR`, `ELEVES_ID`) VALUES
(15, 'Paris', 'paulrenard1.png', 1),
(18, 'Paris', 'marierenarde2.png', 2),
(14, 'Lille', 'juliedupont3.png', 3),
(16, 'Bordeaux', 'dominicmartin4.png', 4),
(18, 'Lille', 'etiennerenault5.png', 5),
(15, 'Nemours', 'jeanmarcmareau6.png', 6),
(15, 'Paris', 'julienmarceau7.png', 7);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
