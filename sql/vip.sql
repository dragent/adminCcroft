-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 12 fév. 2021 à 11:27
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
