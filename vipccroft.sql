-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 11 fév. 2021 à 17:43
-- Version du serveur :  8.0.21
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `vipccroft`
--

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210206000651', '2021-02-06 00:06:58', 404),
('DoctrineMigrations\\Version20210206000855', '2021-02-06 00:08:58', 59),
('DoctrineMigrations\\Version20210207230251', '2021-02-07 23:03:03', 537),
('DoctrineMigrations\\Version20210208121829', '2021-02-08 12:18:35', 164);

-- --------------------------------------------------------

--
-- Structure de la table `moderateur`
--

DROP TABLE IF EXISTS `moderateur`;
CREATE TABLE IF NOT EXISTS `moderateur` (
  `mdp` varchar(255) DEFAULT NULL,
  `lien` varchar(255) DEFAULT NULL,
  `super_modo` tinyint(1) NOT NULL,
  `id_moderateur` int NOT NULL AUTO_INCREMENT,
  `roles` json NOT NULL,
  `pseudo_moderateur` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `link_is_used` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_moderateur`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `moderateur`
--

INSERT INTO `moderateur` (`mdp`, `lien`, `super_modo`, `id_moderateur`, `roles`, `pseudo_moderateur`, `email`, `link_is_used`) VALUES
('raz', 'SUgtqXyRVRT', 1, 1, '[]', 'test', 'alexiscau@gmail.com', 1);

-- --------------------------------------------------------

--
-- Structure de la table `vip`
--

DROP TABLE IF EXISTS `vip`;
CREATE TABLE IF NOT EXISTS `vip` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pseudo_vip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `super_vip` int NOT NULL,
  `dateof_vip` date NOT NULL,
  `duree` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `vip`
--

INSERT INTO `vip` (`id`, `pseudo_vip`, `super_vip`, `dateof_vip`, `duree`) VALUES
(1, 'test', 2, '2021-02-07', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
