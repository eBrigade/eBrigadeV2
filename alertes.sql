-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 09 Septembre 2016 à 15:25
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `ebrigadev2`
--

-- --------------------------------------------------------

--
-- Structure de la table `alertes`
--

CREATE TABLE IF NOT EXISTS `alertes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `equipe` varchar(255) NOT NULL,
  `list` longtext NOT NULL,
  `message` longtext NOT NULL,
  `success` tinyint(4) NOT NULL DEFAULT '0',
  `liste` tinyint(4) NOT NULL,
  `date_envoi` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Contenu de la table `alertes`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
