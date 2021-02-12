-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 12 fév. 2021 à 11:25
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
-- Structure de la table `moderateur`
--

DROP TABLE IF EXISTS `Moderateur`;
CREATE TABLE IF NOT EXISTS `moderateur` (
  `mdp` varchar(255) DEFAULT NULL,
  `lien` varchar(255) NOT NULL,
  `super_modo` tinyint(1) NOT NULL,
  `id_moderateur` int NOT NULL AUTO_INCREMENT,
  `roles` varchar(255) NOT NULL,
  `pseudo_moderateur` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `link_is_used` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_moderateur`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `moderateur`
--

INSERT INTO `moderateur` (`mdp`, `lien`, `super_modo`, `id_moderateur`, `roles`, `pseudo_moderateur`, `email`, `link_is_used`) VALUES
('raz', 'SUgtqXyRVRT', 1, 1, '[]', 'test', 'alexiscau@gmail.com', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
