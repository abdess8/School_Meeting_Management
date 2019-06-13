-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  lun. 10 juin 2019 à 13:16
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestionsdr`
--

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

DROP TABLE IF EXISTS `departement`;
CREATE TABLE IF NOT EXISTS `departement` (
  `id_dep` int(50) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `sigle` varchar(10) NOT NULL,
  `date_c` varchar(50) NOT NULL,
  `date_m` varchar(50) NOT NULL,
  PRIMARY KEY (`id_dep`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `departement`
--

INSERT INTO `departement` (`id_dep`, `nom`, `sigle`, `date_c`, `date_m`) VALUES
(16, 'Sciences MathÃ©matiques et Aide Ã  la DÃ©cision', 'SIAD', '09/06/2019 05:44:09', '09/06/2019 05:44:09'),
(17, 'GÃ©nie Informatique', 'GI', '09/06/2019 05:44:45', '09/06/2019 05:44:45'),
(18, 'Sciences et Technologies Industrielles et Civiles', 'STIC', '09/06/2019 05:45:06', '09/06/2019 05:45:06'),
(19, 'Telecom', 'Telecom', '09/06/2019 05:45:19', '09/06/2019 05:45:19');

-- --------------------------------------------------------

--
-- Structure de la table `inscrire_admin`
--

DROP TABLE IF EXISTS `inscrire_admin`;
CREATE TABLE IF NOT EXISTS `inscrire_admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nom_admin` varchar(255) NOT NULL,
  `prenom_admin` varchar(255) NOT NULL,
  `email_admin` varchar(255) NOT NULL,
  `cin_admin` varchar(255) NOT NULL,
  `phone_admin` varchar(255) NOT NULL,
  `pwd_admin` varchar(255) NOT NULL,
  `conf_pwd_admin` varchar(255) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `inscrire_admin`
--

INSERT INTO `inscrire_admin` (`id_admin`, `nom_admin`, `prenom_admin`, `email_admin`, `cin_admin`, `phone_admin`, `pwd_admin`, `conf_pwd_admin`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', 'aze', '0659264735', '21232f297a57a5a743894a0e4a801fc3', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'Directeur', 'Directeur', 'directeur@uae.edu', 'aa255825', '0685958585', '736007832d2167baaae763fd3a3f3cf1', '736007832d2167baaae763fd3a3f3cf1');

-- --------------------------------------------------------

--
-- Structure de la table `inscrire_prof`
--

DROP TABLE IF EXISTS `inscrire_prof`;
CREATE TABLE IF NOT EXISTS `inscrire_prof` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `departement` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `conf_pwd` varchar(255) NOT NULL,
  `date_ajout` varchar(255) NOT NULL,
  `date_m` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `inscrire_prof`
--

INSERT INTO `inscrire_prof` (`id`, `nom`, `prenom`, `email`, `departement`, `phone`, `pwd`, `conf_pwd`, `date_ajout`, `date_m`) VALUES
(11, 'Professeur', 'Professeur', 'prof@prof.com', 'GI', '0661258587', 'd450c5dbcc10db0749277efc32f15f9f', 'd450c5dbcc10db0749277efc32f15f9f', '10/06/2019 12:41:05', '10/06/2019 12:41:05'),
(8, 'Nassima', 'Lhor', 'lhor@uae.edu', 'GI', '89658555', 'LHOR', 'LHOR', '09/06/2019 05:40:55', '09/06/2019 05:42:49'),
(9, 'prof', 'prof', 'prof@uae.edu', 'GI', '0369852448', 'prof', 'prof', '09/06/2019 05:50:50', '09/06/2019 05:50:50');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id_res` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `motif` varchar(255) NOT NULL,
  `date_res` varchar(255) NOT NULL,
  `date_m` varchar(255) NOT NULL,
  `conf` varchar(255) NOT NULL,
  PRIMARY KEY (`id_res`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id_res`, `email`, `motif`, `date_res`, `date_m`, `conf`) VALUES
(3, 'saidsaadi@uae.edu', 'reunion', '2019-06-28', '09/06/2019 06:17:46', 'En cours de traitment'),
(7, 'u1@p.it', 'Confidentiel', '2019-06-13', '09/06/2019 06:27:17', 'AcceptÃ©'),
(8, 'prof@uae.edu', 'RÃ©union ', '2019-06-12', '09/06/2019 06:27:01', 'RejectÃ©');

-- --------------------------------------------------------

--
-- Structure de la table `reunion`
--

DROP TABLE IF EXISTS `reunion`;
CREATE TABLE IF NOT EXISTS `reunion` (
  `id_reunion` int(50) NOT NULL AUTO_INCREMENT,
  `date_reunion` date NOT NULL,
  `heure_debut` time(6) NOT NULL,
  `heure_fin` time(6) NOT NULL,
  PRIMARY KEY (`id_reunion`)
) ENGINE=InnoDB AUTO_INCREMENT=593 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reunion`
--

INSERT INTO `reunion` (`id_reunion`, `date_reunion`, `heure_debut`, `heure_fin`) VALUES
(304, '2019-06-16', '21:57:00.000000', '03:56:00.000000'),
(453, '2019-06-26', '00:03:00.000000', '01:01:00.000000'),
(591, '2019-06-07', '23:02:00.000000', '06:06:00.000000'),
(592, '2019-06-04', '00:10:00.000000', '10:20:00.000000');

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

DROP TABLE IF EXISTS `salle`;
CREATE TABLE IF NOT EXISTS `salle` (
  `id_salle` int(50) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(200) NOT NULL,
  `statut` varchar(255) NOT NULL,
  PRIMARY KEY (`id_salle`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`id_salle`, `intitule`, `statut`) VALUES
(6, 'Salle de conference', 'OccupÃ©e'),
(7, 'Salle 101', 'Libre');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
