-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 13, 2016 at 05:00 PM
-- Server version: 5.5.49
-- PHP Version: 5.6.14-1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ebrigadev2`
--

-- --------------------------------------------------------

--
-- Table structure for table `availabilities`
--

CREATE TABLE IF NOT EXISTS `availabilities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `result` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `availabilities`
--

INSERT INTO `availabilities` (`id`, `result`, `user_id`, `modified`) VALUES
(5, '2016-09-10T00:00:00Z|2016-09-12T00:00:00Z|ABSENT,2016-09-14T00:00:00Z|2016-09-19T00:00:00Z|ASTREINTE,2016-10-02T00:00:00Z|2016-10-03T00:00:00Z|ABSENT,2016-09-19T00:00:00Z|2016-09-20T00:00:00Z|SOIR,2016-09-23T00:00:00Z|2016-09-24T00:00:00Z|SOIR,2016-09-23T00:00:00Z|2016-09-24T00:00:00Z|NUIT,2016-09-02T07:30:00Z|2016-09-02T13:00:00Z|MATIN,2016-08-29T00:00:00Z|2016-09-03T00:00:00Z|SOIR,2016-09-03T00:00:00Z|2016-09-04T00:00:00Z|NUIT,2016-09-04T00:00:00Z|2016-09-05T00:00:00Z|NUIT,2016-09-05T00:00:00Z|2016-09-10T00:00:00Z|MIDI,2016-10-05T07:00:00Z|2016-10-05T13:00:00Z|MATIN', 4, '2016-09-13 15:30:38'),
(6, '2016-09-03T00:00:00Z|2016-09-05T00:00:00Z|ABSENT,2016-09-10T00:00:00Z|2016-09-12T00:00:00Z|ABSENT,2016-09-14T00:00:00Z|2016-09-19T00:00:00Z|ASTREINTE,2016-09-25T00:00:00Z|2016-09-26T00:00:00Z|ABSENT,2016-10-02T00:00:00Z|2016-10-03T00:00:00Z|ABSENT,2016-08-29T00:00:00Z|2016-09-02T00:00:00Z|APRES-MIDI,2016-09-06T00:00:00Z|2016-09-09T00:00:00Z|APRES-MIDI,2016-09-19T00:00:00Z|2016-09-20T00:00:00Z|SOIR,2016-09-21T00:00:00Z|2016-09-22T00:00:00Z|SOIR,2016-09-23T00:00:00Z|2016-09-24T00:00:00Z|SOIR,2016-09-26T00:00:00Z|2016-09-28T00:00:00Z|NUIT,2016-09-29T00:00:00Z|2016-10-01T00:00:00Z|NUIT,2016-09-23T00:00:00Z|2016-09-24T00:00:00Z|NUIT,2016-09-06T00:00:00Z|2016-09-07T00:00:00Z|MIDI,2016-09-06T00:00:00Z|2016-09-07T00:00:00Z|MATIN,2016-09-06T00:00:00Z|2016-09-07T00:00:00Z|SOIR,2016-09-06T00:00:00Z|2016-09-07T00:00:00Z|NUIT,2016-09-05T00:00:00Z|2016-09-06T00:00:00Z|ASTREINTE,2016-09-28T00:00:00Z|2016-09-29T00:00:00Z|ABSENT,2016-09-02T07:30:00Z|2016-09-02T13:00:00Z|MATIN', 1, '2016-09-07 06:13:19'),
(7, '2016-09-03T00:00:00Z|2016-09-05T00:00:00Z|ABSENT,2016-09-10T00:00:00Z|2016-09-12T00:00:00Z|ABSENT,2016-09-14T00:00:00Z|2016-09-19T00:00:00Z|ASTREINTE,2016-09-25T00:00:00Z|2016-09-26T00:00:00Z|ABSENT,2016-10-02T00:00:00Z|2016-10-03T00:00:00Z|ABSENT,2016-08-29T00:00:00Z|2016-09-02T00:00:00Z|APRES-MIDI,2016-09-06T00:00:00Z|2016-09-09T00:00:00Z|APRES-MIDI,2016-09-19T00:00:00Z|2016-09-20T00:00:00Z|SOIR,2016-09-21T00:00:00Z|2016-09-22T00:00:00Z|SOIR,2016-09-23T00:00:00Z|2016-09-24T00:00:00Z|SOIR,2016-09-26T00:00:00Z|2016-09-28T00:00:00Z|NUIT,2016-09-29T00:00:00Z|2016-10-01T00:00:00Z|NUIT,2016-09-23T00:00:00Z|2016-09-24T00:00:00Z|NUIT,2016-09-06T00:00:00Z|2016-09-07T00:00:00Z|MIDI,2016-09-06T00:00:00Z|2016-09-07T00:00:00Z|MATIN,2016-09-06T00:00:00Z|2016-09-07T00:00:00Z|SOIR,2016-09-06T00:00:00Z|2016-09-07T00:00:00Z|NUIT,2016-09-05T00:00:00Z|2016-09-06T00:00:00Z|ASTREINTE,2016-09-28T00:00:00Z|2016-09-29T00:00:00Z|ABSENT,2016-09-02T07:30:00Z|2016-09-02T13:00:00Z|MATIN', 2, '2016-09-07 06:13:19'),
(8, '2016-09-03T00:00:00Z|2016-09-05T00:00:00Z|ABSENT,2016-09-10T00:00:00Z|2016-09-12T00:00:00Z|ABSENT,2016-09-14T00:00:00Z|2016-09-19T00:00:00Z|ASTREINTE,2016-09-25T00:00:00Z|2016-09-26T00:00:00Z|ABSENT,2016-10-02T00:00:00Z|2016-10-03T00:00:00Z|ABSENT,2016-08-29T00:00:00Z|2016-09-02T00:00:00Z|APRES-MIDI,2016-09-06T00:00:00Z|2016-09-09T00:00:00Z|APRES-MIDI,2016-09-19T00:00:00Z|2016-09-20T00:00:00Z|SOIR,2016-09-21T00:00:00Z|2016-09-22T00:00:00Z|SOIR,2016-09-23T00:00:00Z|2016-09-24T00:00:00Z|SOIR,2016-09-26T00:00:00Z|2016-09-28T00:00:00Z|NUIT,2016-09-29T00:00:00Z|2016-10-01T00:00:00Z|NUIT,2016-09-23T00:00:00Z|2016-09-24T00:00:00Z|NUIT,2016-09-06T00:00:00Z|2016-09-07T00:00:00Z|MIDI,2016-09-06T00:00:00Z|2016-09-07T00:00:00Z|MATIN,2016-09-06T00:00:00Z|2016-09-07T00:00:00Z|SOIR,2016-09-06T00:00:00Z|2016-09-07T00:00:00Z|NUIT,2016-09-05T00:00:00Z|2016-09-06T00:00:00Z|ASTREINTE,2016-09-28T00:00:00Z|2016-09-29T00:00:00Z|ABSENT,2016-09-02T07:30:00Z|2016-09-02T13:00:00Z|MATIN', 3, '2016-09-07 06:13:19');

-- --------------------------------------------------------

--
-- Table structure for table `barracks`
--

CREATE TABLE IF NOT EXISTS `barracks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city_id` int(11) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `fax` varchar(14) NOT NULL,
  `email` varchar(100) NOT NULL,
  `website_url` varchar(255) NOT NULL,
  `ordre` varchar(255) NOT NULL,
  `rib` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `barracks`
--

INSERT INTO `barracks` (`id`, `name`, `address`, `city_id`, `phone`, `fax`, `email`, `website_url`, `ordre`, `rib`) VALUES
(1, 'simplon', '44 hadrange', 5, '0608857023', '0890887645', 'perrinolivier88@gmail.com', 'www.test.com', '', ''),
(2, 'simplon2', '44 hadrange', 14, '0608857023', '', 'perrinolivieri88@gmail.com', '', 'test ordre', 'test rib'),
(4, 'Test', 'pas tres loin', 34942, '0328983377', '0132448392', 'truc@gmail.com', 'www.chose.com', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `barracks_materials`
--

CREATE TABLE IF NOT EXISTS `barracks_materials` (
  `barrack_id` int(11) NOT NULL DEFAULT '0',
  `material_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`barrack_id`,`material_id`),
  KEY `material_id` (`material_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `barracks_users`
--

CREATE TABLE IF NOT EXISTS `barracks_users` (
  `user_id` int(11) NOT NULL DEFAULT '0',
  `barrack_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`barrack_id`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barracks_users`
--

INSERT INTO `barracks_users` (`user_id`, `barrack_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `barracks_vehicles`
--

CREATE TABLE IF NOT EXISTS `barracks_vehicles` (
  `barrack_id` int(11) NOT NULL DEFAULT '0',
  `vehicle_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`barrack_id`,`vehicle_id`),
  KEY `vehicle_id` (`vehicle_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barracks_vehicles`
--

INSERT INTO `barracks_vehicles` (`barrack_id`, `vehicle_id`) VALUES
(1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `barrack_types`
--

CREATE TABLE IF NOT EXISTS `barrack_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE IF NOT EXISTS `bills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `equipment_types`
--

CREATE TABLE IF NOT EXISTS `equipment_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `equipment_types`
--

INSERT INTO `equipment_types` (`id`, `title`) VALUES
(1, 'tous types de matériel'),
(2, 'matériel aquatique'),
(3, 'matériel de déblaiement'),
(4, 'matériel divers'),
(5, 'matériel d''éclairage'),
(6, 'matériel d''élagage'),
(7, 'matériel éléctrique'),
(8, 'matériel de formation'),
(9, 'tenues vestimentaires'),
(10, 'matériel d''hébergement'),
(11, 'matériel d''incendie'),
(12, 'matériel informatique'),
(13, 'matériel de logistique'),
(14, 'matériel de pompage'),
(15, 'Promotion Communication'),
(16, 'matériel médical'),
(17, 'Lots de sauvetage'),
(18, 'Equipement Sécurité - EPI'),
(19, 'matériel d''émission/transmission');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_id` int(11) DEFAULT NULL,
  `bill_id` int(11) DEFAULT NULL,
  `title` varchar(70) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(180) CHARACTER SET utf8 DEFAULT NULL,
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `is_closed` tinyint(1) DEFAULT NULL,
  `closed` date DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `canceled` tinyint(1) DEFAULT NULL,
  `canceled_detail` varchar(400) CHARACTER SET utf8 DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `instructions` varchar(400) CHARACTER SET utf8 DEFAULT NULL,
  `details` varchar(400) CHARACTER SET utf8 DEFAULT NULL,
  `barrack_id` int(11) DEFAULT NULL,
  `event_start_date` datetime DEFAULT NULL,
  `event_end_date` datetime DEFAULT NULL,
  `horaires` varchar(400) CHARACTER SET utf8 DEFAULT NULL,
  `public` tinyint(1) DEFAULT NULL,
  `module` varchar(255) DEFAULT NULL,
  `module_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `city_id`, `bill_id`, `title`, `address`, `latitude`, `longitude`, `created`, `modified`, `is_closed`, `closed`, `price`, `canceled`, `canceled_detail`, `is_active`, `instructions`, `details`, `barrack_id`, `event_start_date`, `event_end_date`, `horaires`, `public`, `module`, `module_id`) VALUES
(1, 7, NULL, 'evenement numéro 1', '26 rue charles de gaules', 48.8142, 2.41483, '2016-09-05', '2016-09-13', 0, NULL, 122, 0, '', 0, '', 'blablabla   test details', 1, '2016-09-10 00:00:00', '2016-09-13 00:00:00', '', 0, 'formations', 1),
(2, 8, NULL, 'evenement numero 2', '44 hadrange', 48.175, 6.66798, '2016-09-05', '2016-09-13', 0, NULL, 333, 0, '', 1, '', 'test colonne details', NULL, '2016-09-14 00:00:00', '2016-09-14 00:00:00', 'sdfsef', 0, 'formations', 1),
(3, 12, NULL, 'evenement numero 3', '2 rue de bellefontaine', 49.2738, -0.696698, '2016-09-05', '2016-09-13', 0, NULL, 333, 0, '', 1, '', 'test colonne details', NULL, '2016-09-11 00:00:00', '2016-09-11 00:00:00', '', 0, '11', NULL),
(4, 1, NULL, 'Formation1', 'address', 41.6764, -71.5372, '2016-09-08', '2016-09-13', 0, NULL, 58, 0, '', 1, 'Instruction', 'Details', 1, '2016-10-17 00:00:00', '2017-10-17 00:00:00', '16H00 à 17H00', 0, '10', NULL),
(5, 91, NULL, 'Opération bal des morues', 'salle des fetes', 34.9264, -2.33171, '2016-09-13', '2016-09-13', 0, NULL, NULL, 0, '', 0, 'canne à pèche recommandée', 'attention à odeur et prendre des bottes', NULL, '2016-09-14 00:00:00', '2016-09-29 00:00:00', 'principalement de nuit', 0, NULL, NULL),
(13, 1, NULL, 'Formation2', 'address', 41.6764, -71.5372, '2016-09-13', '2016-09-13', NULL, NULL, 12321, NULL, NULL, 0, 'Instruction', 'Details', 4, '2017-02-10 00:00:00', '2018-03-16 00:00:00', '16H00 à 17H00', 0, '10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events_materials`
--

CREATE TABLE IF NOT EXISTS `events_materials` (
  `event_id` int(11) NOT NULL DEFAULT '0',
  `material_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`event_id`,`material_id`),
  KEY `material_id` (`material_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events_materials`
--

INSERT INTO `events_materials` (`event_id`, `material_id`) VALUES
(4, 134),
(4, 139);

-- --------------------------------------------------------

--
-- Table structure for table `events_teams`
--

CREATE TABLE IF NOT EXISTS `events_teams` (
  `team_id` int(11) NOT NULL DEFAULT '0',
  `event_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`team_id`,`event_id`),
  KEY `event_id` (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events_teams`
--

INSERT INTO `events_teams` (`team_id`, `event_id`) VALUES
(1, 1),
(5, 1),
(3, 2),
(1, 4),
(3, 4),
(4, 4),
(5, 4),
(6, 4),
(11, 4),
(1, 5),
(6, 5),
(1, 13);

-- --------------------------------------------------------

--
-- Table structure for table `events_vehicles`
--

CREATE TABLE IF NOT EXISTS `events_vehicles` (
  `event_id` int(11) NOT NULL DEFAULT '0',
  `vehicle_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`event_id`,`vehicle_id`),
  KEY `vehicle_id` (`vehicle_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `event_types`
--

CREATE TABLE IF NOT EXISTS `event_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(5) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `module` varchar(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `event_types`
--

INSERT INTO `event_types` (`id`, `code`, `title`, `module`) VALUES
(1, 'CER', 'Cérémonie', 'event'),
(2, 'COM', 'Communication - Promotion', 'event'),
(3, 'DIV', 'Evénement divers', 'event'),
(4, 'MC', 'Main courante', 'event'),
(5, 'MLA', 'Mission Logistique et Administrative', 'event'),
(6, 'REU', 'Réunion', 'event'),
(7, 'SPO', 'Compétition sportive', 'event'),
(8, 'TEC', 'Entretien, opérations techniques', 'event'),
(9, 'WEB', 'Visio conférence', 'event'),
(10, 'EXE', 'Participation à exercice état-sdis-samu', 'formations'),
(11, 'MAN', 'Manoeuvre', 'formations'),
(12, 'AH', 'Autres actions humanitaires', 'catastrophes'),
(13, 'AIP', 'Aide aux populations', 'catastrophes'),
(14, 'HEB', 'Hébergement durgence', 'catastrophes'),
(15, 'MET', 'Alerte des bénévoles', 'catastrophes'),
(16, 'COOP', 'Coopération état-sdis-samu', 'operations'),
(17, 'DPS', 'Dispositif Prévisionnel de Secours', 'operations'),
(18, 'GAR', 'Garde', 'operations'),
(19, 'MAR', 'Maraude', 'operations'),
(20, 'MED', 'Médicalisation, équipe médicale', 'operations'),
(21, 'NAUT', 'Activité nautique', 'operations');

-- --------------------------------------------------------

--
-- Table structure for table `formations`
--

CREATE TABLE IF NOT EXISTS `formations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `diploma` varchar(100) DEFAULT NULL,
  `skills` varchar(100) DEFAULT NULL,
  `formation_type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `formations`
--

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `formation_types` (
   `id` int(11) NOT NULL,
   `name` int(11) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `functions`
--

CREATE TABLE IF NOT EXISTS `functions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `functions`
--

INSERT INTO `functions` (`id`, `title`) VALUES
(1, 'PSE1 - Secouriste'),
(2, 'PSE2 - Equipier secouriste'),
(3, 'CE0 - Chef d''équipe'),
(4, 'CE1 - Chef de poste'),
(5, 'CE2 - Chef de section'),
(6, 'CE3 - Chef de dispositif'),
(7, 'CIA - Coordinateur Inter Associatif'),
(8, 'LAT - Logisticien Administratif et Technique'),
(9, 'CVPS - Conducteur VPS'),
(10, 'RAD - Opérateur radio'),
(11, 'DEB - Déblaiement');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE IF NOT EXISTS `grades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `name`) VALUES
(1,'Président (siège)'),
(2,'Vice Président (siège)'),
(3,'Secrétaire');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE IF NOT EXISTS `materials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text,
  `material_type_id` int(11) NOT NULL,
  `barrack_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `name`, `description`, `material_type_id`, `barrack_id`) VALUES
(1, 'Seau d''eau bleu', 'Seau d''eau bleu servant au nettoyage', 1, 1),
(2, 'Sceau normal', 'Un sceau basique.', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `material_stocks`
--

CREATE TABLE IF NOT EXISTS `material_stocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `material_id` int(11) NOT NULL,
  `stock` int(6) NOT NULL,
  `affectation` varchar(15) NOT NULL,
  `affectation_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `materials_teams`
--

CREATE TABLE IF NOT EXISTS `materials_teams` (
  `team_id` int(11) NOT NULL DEFAULT '0',
  `material_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`team_id`,`material_id`),
  KEY `material_id` (`material_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `materials_teams`
--

INSERT INTO `materials_teams` (`team_id`, `material_id`) VALUES
(3, 6),
(6, 6),
(6, 134),
(1, 135),
(3, 139),
(4, 139),
(5, 139),
(3, 140),
(6, 147);

-- --------------------------------------------------------

--
-- Table structure for table `material_types`
--

CREATE TABLE IF NOT EXISTS `material_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `description` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `material_types`
--

INSERT INTO `material_types` (`id`, `name`, `description`) VALUES
(1, 'Logistisque', 'Affecté à la caserne simplon');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `to_user` int(11) NOT NULL,
  `from_user` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `created` datetime NOT NULL,
  `send` tinyint(1) NOT NULL,
  `recipients` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `to_user`, `from_user`, `subject`, `text`, `created`, `send`, `recipients`) VALUES
(9, 4, 4, 'Bienvenue sur votre messagerie privé', '<b><span style="color:rgb(0,0,255);">Blablabla :)</span></b>', '2016-09-05 14:46:37', 0, ''),
(10, 4, 4, 'Bienvenue sur votre messagerie privé', '<b><span style="color:rgb(0,0,255);">Blablabla :)</span></b>', '2016-09-05 14:46:39', 1, 'a:1:{i:0;i:4;}'),
(14, 1, 4, 'Bienvenue sur votre messagerie privé', '<b><span style="color:rgb(0,0,255);">Blablabla :)</span></b>', '2016-09-05 14:46:37', 0, ''),
(15, 2, 4, 'Bienvenue sur votre messagerie privé', '<b><span style="color:rgb(0,0,255);">Blablabla :)</span></b>', '2016-09-05 14:46:37', 0, ''),
(19, 4, 4, 'test', 'dfhdfh', '2016-09-08 19:52:33', 1, 'a:2:{i:0;i:4;i:1;i:4;}'),
(20, 4, 4, 'grrr', 'rt', '2016-09-08 19:56:29', 0, ''),
(22, 4, 4, 'grrr', 'rt', '2016-09-08 19:56:31', 1, 'a:2:{i:0;i:4;i:1;i:4;}'),
(24, 4, 4, 'jkj', 'jhlhj', '2016-09-10 12:17:33', 1, 'a:1:{i:0;i:4;}'),
(26, 1, 4, 'test', 'test', '2016-09-13 15:37:16', 0, ''),
(27, 1, 4, 'test', 'test', '2016-09-13 15:37:20', 1, 'a:2:{i:0;i:4;i:1;i:1;}');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `source_id` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `type` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `source_id`, `receiver`, `type`) VALUES
(1, 17, 0, 0),
(2, 18, 0, 0),
(4, 26, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `provider_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `orders_supplies`
--

CREATE TABLE IF NOT EXISTS `orders_supplies` (
  `order_id` int(11) NOT NULL DEFAULT '0',
  `supply_id` int(11) NOT NULL DEFAULT '0',
  `quantity` int(11) DEFAULT '1',
  PRIMARY KEY (`order_id`,`supply_id`),
  KEY `supply_id` (`supply_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE IF NOT EXISTS `organizations` (
  `id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `address1` varchar(200) DEFAULT NULL,
  `address2` varchar(200) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone` varchar(14) DEFAULT NULL,
  `cellphone` varchar(14) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `providers`
--

CREATE TABLE IF NOT EXISTS `providers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` text,
  `zipcode` varchar(5) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `phone` varchar(14) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `descritpion` text,
  `website` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `providers_supplies`
--

CREATE TABLE IF NOT EXISTS `providers_supplies` (
  `provider_id` int(11) NOT NULL DEFAULT '0',
  `supply_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`provider_id`,`supply_id`),
  KEY `supply_id` (`supply_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `operations`
--

CREATE TABLE IF NOT EXISTS `operations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL DEFAULT '0',
  `barrack_id` int(11) NOT NULL DEFAULT '0',
  `city_id` int(11) DEFAULT NULL,
  `address` varchar(180) CHARACTER SET utf8 DEFAULT NULL,
  `public_headcount` int(11) NOT NULL DEFAULT '0',
  `operation_activity_id` int(11) NOT NULL DEFAULT '0',
  `operation_environment_id` int(11) NOT NULL DEFAULT '0',
  `operation_delay_id` int(11) NOT NULL DEFAULT '0',
  `public_ris` float NOT NULL DEFAULT '0',
  `operation_type_id` int(11) DEFAULT NULL,
  `operation_recommendation_id` int(11) NOT NULL DEFAULT '0',
  `public_reinforcement` varchar(255) NOT NULL DEFAULT '0',
  `public_total` int(11) NOT NULL DEFAULT '0',
  `organization_id` int(11) NOT NULL DEFAULT '0',
  `actors_headcount` int(11) NOT NULL DEFAULT '0',
  `rescuers_total` int(11) NOT NULL DEFAULT '0',
  `headcount_total` int(11) NOT NULL DEFAULT '0',
  `actors_organization` text,
  `general_organization` text,
  `transport_organization` text,
  `team_instructions` text,
  `report_assisted` int(11) DEFAULT NULL,
  `report_slight` int(11) DEFAULT NULL,
  `report_medicalized` int(11) DEFAULT NULL,
  `report_reinforcement` int(11) DEFAULT NULL,
  `report_evacuated` int(11) DEFAULT NULL,
  `report_bilan_notes` text,
  `meals_morning` int(11) NOT NULL DEFAULT '0',
  `meals_lunch` int(11) NOT NULL DEFAULT '0',
  `meals_dinner` int(11) NOT NULL DEFAULT '0',
  `meals_unit_cost` int(11) NOT NULL DEFAULT '0',
  `meals_charge` int(11) NOT NULL DEFAULT '0',
  `meals_cost` int(11) NOT NULL DEFAULT '0',
  `cost_kilometers_vps` int(11) NOT NULL DEFAULT '0',
  `cost_kilometers_other` int(11) NOT NULL DEFAULT '0',
  `discount_percentage` int(11) NOT NULL DEFAULT '0',
  `discount_reason` text,
  `cost_percentage_adpc` int(11) NOT NULL DEFAULT '0',
  `total_cost` int(11) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `operations`
--

-- --------------------------------------------------------

--
-- Table structure for table `operation_activities`
--

CREATE TABLE IF NOT EXISTS `operation_activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coefficient` varchar(255) DEFAULT NULL,
  `title` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `operation_activities`
--

INSERT INTO `operation_activities` (`id`, `coefficient`, `title`) VALUES
(1, '0.25', 'Public assis : spectacle, cérémonie culturelle, réunion publique, restauration, rendez-vous sportif,,,,'),
(2, '0.30', 'Public debout : cérémonie culturelle, réunion publique, restauration, exposition, foire, salon, comice agricole, ,,,'),
(3, '0.35', 'Public debout : spectacle avec public statique, fête foraine, rendez-vous sportif avec protection du publique par rapport à l''événement,,,,'),
(4, '0.40', 'Public debout : spectacle avec public dynamique, danse feria, fête votive, carnaval, spectacle de rue, garnde parade, rendez-vous sportif sans protection du publique par rapport à l''é`vénement'),
(5, '0.40', 'Evénement se déroulant sur plusieurs jours avec présence permanente du public : hébergement sur site ou à proximité');

-- --------------------------------------------------------

--
-- Table structure for table `operation_delays`
--

CREATE TABLE IF NOT EXISTS `operation_delays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coefficient` decimal(30,2) DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `operation_delays`
--

INSERT INTO `operation_delays` (`id`, `coefficient`, `title`) VALUES
(1, 0.25, '< 10 min'),
(2, 0.30, '> 10 min et < 20 min'),
(3, 0.35, '> 20 min et < 30 min'),
(4, 0.40, '> 30 min');

-- --------------------------------------------------------

--
-- Table structure for table `operation_environments`
--

CREATE TABLE IF NOT EXISTS `operation_environments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coefficient` decimal(30,2) DEFAULT NULL,
  `title` longtext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `operation_environments`
--

INSERT INTO `operation_environments` (`id`, `coefficient`, `title`) VALUES
(1, 0.25, 'Structures permanentes (bâtiments, salle en dur, …) / Voies publiques, rue avec accès dégagés / Conditions d''accès aisés'),
(2, 0.30, 'Structures NON permanentes (gradin, tribunes, châpiteaux,,,) / Espaces naturels <2 hectares / Brancardage 150 m < longueur < 300 m / Terrain en pente sur plus de 100 mètres'),
(3, 0.35, 'Espaces naturels 2 ha < surface < 5 ha / Brancardage 300 m < longueur < 600 m / Terrain en pente sur plus de 150 mètres / Autres conditions d''accès difficiles'),
(4, 0.40, 'Espaces naturels > 5 ha / Brancardage : > 600 m Terrain en pente sur plus de 300 m / Autres conditions d''accès difficiles : Talus, escaliers, voie d''accès non carrossables, ,,, / Progression des secours rendue difficile par la présence du public');

-- --------------------------------------------------------

--
-- Table structure for table `operation_recommendations`
--

CREATE TABLE IF NOT EXISTS `operation_recommendations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coefficient` int(11) DEFAULT '0',
  `title` longtext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `operation_recommendations`
--

INSERT INTO `operation_recommendations` (`id`, `coefficient`, `title`) VALUES
(1, 0, 'Aucune demande n''a été effectué pour un dispositif public, ou celui ci à peut être été rattaché au dispositif acteur car la manifestation est à but non lucratif.'),
(2, 2, '1 binôme + 1 lot B'),
(3, 4, '1 chef + 3 intervenants secouristes + 1 lot A'),
(4, 6, '1 chef + 3 intervenants secouristes + 1 lot A ++ 1 binôme + 1 lot B'),
(5, 8, '1 chef + 3 intervenants secouristes + 1 lot A ++ 1 chef + 3 intervenants secouristes + 1 lot C'),
(6, 10, '1 chef + 3 intervenants secouristes + 1 lot A ++ 1 chef + 3 intervenants secouristes + 1 lot C ++ 1 binôme + 1 lot B'),
(7, 12, '1 chef + 3 intervenants secouristes + 1 lot A ++ 1 chef + 3 intervenants secouristes + 1 lot C ++ 2 binômes + 2 lots B'),
(8, 14, '1 chef de dispositif + 2 LAT + 2 postes de secours (4 à 12 personnes par postes au maximum) comprenant  dans l''ensemble 14 intervenants composés en équipes de 4 et en binômes ayant les matériels correspondants'),
(9, 16, '1 chef de dispositif + 2 LAT + 2 postes de secours (4 à 12 personnes par postes au maximum) comprenant  dans l''ensemble 16 intervenants composés en équipes de 4 et en binômes ayant les matériels correspondants'),
(10, 18, '1 chef de dispositif + 2 LAT + 2 postes de secours (4 à 12 personnes par postes au maximum) comprenant  dans l''ensemble 18 intervenants composés en équipes de 4 et en binômes ayant les matériels correspondants'),
(11, 20, '1 chef de dispositif + 2 LAT + 2 postes de secours  4 à 12 personnes par postes au maximum) comprenant  dans l''ensemble 20 intervenants composés en équipes de 4 et en binômes ayant les matériels correspondants'),
(12, 22, '1 chef de dispositif + 2 LAT + 2 postes de secours (4 à 12 personnes par postes au maximum) comprenant  dans l''ensemble 22 intervenants composés en équipes de 4 et en binômes ayant les matériels correspondants'),
(13, 24, '1 chef de dispositif + 2 LAT + 2 postes de secours (4 à 12 personnes par postes au maximum) comprenant  dans l''ensemble 24 intervenants composés en équipes de 4 et en binômes ayant les matériels correspondants'),
(14, 26, '1 chef de dispositif + 2 LAT + 3 postes de secours (4 à 12 personnes par postes au maximum) comprenant  dans l''ensemble 26 intervenants composés en équipes de 4 et en binômes ayant les matériels correspondants'),
(15, 28, '1 chef de dispositif + 2 LAT + 3 postes de secours (4 à 12 personnes par postes au maximum) comprenant  dans l''ensemble 28 intervenants composés en équipes de 4 et en binômes ayant les matériels correspondants'),
(16, 30, '1 chef de dispositif + 2 LAT + 3 postes de secours (4 à 12 personnes par postes au maximum) comprenant  dans l''ensemble 30 intervenants composés en équipes de 4 et en binômes ayant les matériels correspondants'),
(17, 32, '1 chef de dispositif + 2 LAT + 3 postes de secours (4 à 12 personnes par postes au maximum) comprenant  dans l''ensemble 32 intervenants composés en équipes de 4 et en binômes ayant les matériels correspondants'),
(18, 34, '1 chef de dispositif + 2 LAT + 3 postes de secours (4 à 12 personnes par postes au maximum) comprenant  dans l''ensemble 34 intervenants composés en équipes de 4 et en binômes ayant les matériels correspondants'),
(19, 36, '1 chef de dispositif + 2 LAT + 3 postes de secours (4 à 12 personnes par postes au maximum) comprenant  dans l''ensemble 36 intervenants composés en équipes de 4 et en binômes ayant les matériels correspondants'),
(20, 38, '1 chef de dispositif + 2 LAT + 1 chef de secteur par secteur créé, chaque secteur comprend 1 à 3 poste de secours (4 à 12 personnes par postes au maximum) comprenant  dans l''ensemble 36 intervenants composés en équipes de 4 et en binômes ayant les matériels correspondants');

-- --------------------------------------------------------

--
-- Table structure for table `operation_types`
--

CREATE TABLE IF NOT EXISTS `operation_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT NULL,
  `min` int(11) DEFAULT NULL,
  `max` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `operation_types`
--

INSERT INTO `operation_types` (`id`, `title`, `min`, `max`) VALUES
(1, 'AUCUN DISPOSITIF', -1000000, 0),
(2, 'POINT D''ALERTE ET DE PREMIERS SECOURS', 0, 2),
(3, 'DPS - PETITE ENVERGURE', 2, 12),
(4, 'DPS - MOYENNE ENVERGURE', 12, 36),
(5, 'DPS - GRANDE ENVERGURE', 36, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `validity_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `skills_users`
--

CREATE TABLE IF NOT EXISTS `skills_users` (
  `skill_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_acquired` date NOT NULL,
  `validity_date` date NOT NULL,
  PRIMARY KEY (`skill_id`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--

CREATE TABLE IF NOT EXISTS `supplies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `supply_types`
--

CREATE TABLE IF NOT EXISTS `supply_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(12) NOT NULL,
  `name` varchar(100) NOT NULL,
  `measure_unit` char(2) NOT NULL,
  `quantity_per_unit` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=75 ;

--
-- Dumping data for table `supply_types`
--

INSERT INTO `supply_types` (`id`, `code`, `name`, `measure_unit`, `quantity_per_unit`) VALUES
(1, 'ALIMENTATION', 'Eau', 'cl', 150),
(2, 'ALIMENTATION', 'Eau', 'li', 10),
(3, 'ALIMENTATION', 'Soupe', 'li', 1),
(4, 'ALIMENTATION', 'Sucre en morceaux', 'kg', 1),
(5, 'ALIMENTATION', 'dosette café soluble', 'un', 1),
(6, 'ALIMENTATION', 'dosette boisson chocolatée', 'un', 1),
(7, 'ALIMENTATION', 'gobelet', 'un', 1),
(8, 'ALIMENTATION', 'cuillère en plastique / touillette', 'un', 1),
(9, 'PHARMACIE', 'Dosiseptine', 'ml', 10),
(10, 'PHARMACIE', 'Chlorure de sodium / sérum physiologique', 'ml', 10),
(11, 'PHARMACIE', 'Dakin stabilisé', 'ml', 10),
(12, 'PHARMACIE', 'Compresses stériles', 'un', 1),
(13, 'PHARMACIE', 'Collier cervical adulte', 'un', 1),
(14, 'PHARMACIE', 'Collier cervical enfant', 'un', 1),
(15, 'PHARMACIE', 'Masque haute concentration adulte', 'un', 1),
(16, 'PHARMACIE', 'Masque haute concentration enfant', 'un', 1),
(17, 'PHARMACIE', 'gants à usage unique S', 'un', 100),
(18, 'PHARMACIE', 'gants à usage unique M', 'un', 100),
(19, 'PHARMACIE', 'gants à usage unique L', 'un', 100),
(20, 'PHARMACIE', 'gants à usage unique XL', 'un', 100),
(21, 'PHARMACIE', 'solution hydro-alcoolique', 'cl', 1),
(22, 'VEHICULES', 'Essence groupe électrogène', 'li', 10),
(23, 'VEHICULES', 'Essence groupe électrogène', 'li', 20),
(24, 'VEHICULES', 'Gasoil groupe électrogène', 'li', 20),
(25, 'VEHICULES', 'Huile moteur', 'li', 5),
(26, 'VEHICULES', 'Liquide lave glace', 'li', 5),
(27, 'VEHICULES', 'Liquide de freins', 'li', 5),
(28, 'ENTRETIEN', 'Désinfectant surface', 'cl', 50),
(29, 'ENTRETIEN', 'Alkidiol', 'cl', 50),
(30, 'ENTRETIEN', 'Solution hydro-alcoolique', 'cl', 50),
(31, 'ENTRETIEN', 'Spray désinfectant de surface', 'cl', 50),
(32, 'ENTRETIEN', 'Liquide vaisselle', 'cl', 100),
(33, 'ENTRETIEN', 'Papier toilette rouleau', 'un', 1),
(34, 'BUREAU', 'Ramette Papier A4', 'un', 500),
(35, 'BUREAU', 'Cartouche encre pour imprimante', 'un', 1),
(36, 'BUREAU', 'main courante', 'un', 1),
(37, 'BUREAU', 'fiche d''intervention', 'un', 1),
(38, 'BUREAU', 'bracelet d''identification adulte', 'un', 1),
(39, 'BUREAU', 'bracelet d''identification enfant', 'un', 1),
(40, 'PHARMACIE', 'protection de sonde pour thermomètre tympanique', 'un', 1),
(41, 'PHARMACIE', 'coussin Hémostatique d''urgence', 'un', 1),
(42, 'PHARMACIE', 'antiseptique', 'ml', 5),
(43, 'PHARMACIE', 'champs stérile', 'un', 1),
(44, 'PHARMACIE', 'bande extensible', 'un', 1),
(45, 'PHARMACIE', 'pansements pré-découpés', 'un', 1),
(46, 'PHARMACIE', 'sparadrap rouleau', 'un', 1),
(47, 'PHARMACIE', 'pansement absorbant, américain', 'un', 1),
(48, 'PHARMACIE', 'gants stériles', 'un', 1),
(49, 'PHARMACIE', 'compresses brulure', 'un', 1),
(50, 'PHARMACIE', 'couverture de survie', 'un', 1),
(51, 'PHARMACIE', 'couverture de survie stérile', 'un', 1),
(52, 'PHARMACIE', 'écharpe triangulaire', 'un', 1),
(53, 'PHARMACIE', 'poche de froid', 'un', 1),
(54, 'PHARMACIE', 'tuyau patient pour aspirateur de mucosités', 'un', 1),
(55, 'PHARMACIE', 'masque insufflateur adulte', 'un', 1),
(56, 'PHARMACIE', 'masque insufflateur enfant', 'un', 1),
(57, 'PHARMACIE', 'masque insufflateur nourisson', 'un', 1),
(58, 'PHARMACIE', 'tubulure à oxygène', 'un', 1),
(59, 'PHARMACIE', 'raccord biconique', 'un', 1),
(60, 'PHARMACIE', 'sonde d''aspiration adulte', 'un', 1),
(61, 'PHARMACIE', 'sonde d''aspiration pédiatrique', 'un', 1),
(62, 'PHARMACIE', 'stop vide', 'un', 1),
(63, 'PHARMACIE', 'canule de Guédel taille 00', 'un', 1),
(64, 'PHARMACIE', 'canule de Guédel taille 0', 'un', 1),
(65, 'PHARMACIE', 'canule de Guédel taille 1', 'un', 1),
(66, 'PHARMACIE', 'canule de Guédel taille 2', 'un', 1),
(67, 'PHARMACIE', 'canule de Guédel taille 3', 'un', 1),
(68, 'PHARMACIE', 'canule de Guédel taille 4', 'un', 1),
(69, 'PHARMACIE', 'canule de Guédel taille 5', 'un', 1),
(70, 'PHARMACIE', 'masque FFP2', 'un', 1),
(71, 'PHARMACIE', 'masque chirurgical', 'un', 1),
(72, 'PHARMACIE', 'drap d''hôpital', 'un', 1),
(73, 'VEHICULES', 'Gasoil', 'li', 1),
(74, 'VEHICULES', 'Essence SP', 'li', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `description`) VALUES
(1, 'équipe de dessoudage manuel', 'portez des gants'),
(2, 'Team2', 'itqyuzayiulyutfdtuyxsusx'),
(3, 'la team des oeufs', 'attention au lapin !'),
(4, 'la team à poil', 'se promène sans slip'),
(5, 'hahah', ''),
(6, 'les bras cassés', 'qu''ils sont beaux'),
(7, 'zerge', 'hge(rgd'),
(8, 'dfg', 'dfg'),
(9, 'sqcsd', 'sdvsdv'),
(10, 'sdf', 'sdf'),
(11, 'egsdfsefs', 'sef');

-- --------------------------------------------------------

--
-- Table structure for table `teams_users`
--

CREATE TABLE IF NOT EXISTS `teams_users` (
  `team_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`team_id`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teams_users`
--

INSERT INTO `teams_users` (`team_id`, `user_id`) VALUES
(1, 1),
(4, 1),
(5, 2),
(3, 3),
(4, 3),
(2, 4),
(4, 4),
(6, 4),
(2, 8),
(3, 8),
(6, 9);

-- --------------------------------------------------------

--
-- Table structure for table `teams_vehicles`
--

CREATE TABLE IF NOT EXISTS `teams_vehicles` (
  `team_id` int(11) NOT NULL DEFAULT '0',
  `vehicle_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`team_id`,`vehicle_id`),
  KEY `vehicle_id` (`vehicle_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teams_vehicles`
--

INSERT INTO `teams_vehicles` (`team_id`, `vehicle_id`) VALUES
(1, 1),
(2, 1),
(4, 1),
(6, 1),
(6, 3),
(1, 4),
(3, 4),
(4, 4),
(5, 4),
(6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `birthname` varchar(100) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(14) DEFAULT NULL,
  `cellphone` varchar(14) DEFAULT NULL,
  `workphone` varchar(14) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `address_complement` varchar(255) NOT NULL,
  `zipcode` varchar(5) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `birthplace` varchar(100) DEFAULT NULL,
  `skype` varchar(100) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `external` tinyint(1) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `connected` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `birthname`, `email`, `login`, `password`, `phone`, `cellphone`, `workphone`, `address`, `address_complement`, `zipcode`, `city_id`, `birthday`, `birthplace`, `skype`, `is_active`, `external`, `created`, `modified`, `connected`) VALUES
(1, 'Florent', 'Maillard', '', 'florent.maillard.pro@gmail.com', 'admin', '$2y$10$eL4kkR6rtnADpKIU0zQyPOp3vuDraNznRHRqfCNsCCH5ww5rr9/ya', '0611214341', '', '', 'rue pakonnue', 'rue pakonnu', '88000', 12, '1985-03-05', '', '', 1, 0, '2016-08-30', '2016-09-08', NULL),
(2, 'Nicolas', 'Hel', '', 'znirgal@gmail.com', 'nirgal', '$2y$10$IS67pIEg25UG6lN556WDleoEGpbAXBE2k7bYYtRt/4y7BaOI2SMua', '', '', NULL, '', '', '', 1, NULL, '', '', 0, NULL, '2016-08-31', '2016-08-31', NULL),
(3, 'Gwenael', 'Prevot', '', 'prevotgwenael@gmail.com', 'frexwimsn', '$2y$10$zBLH6jfO99bjjNEif7qmquN0Ms2E7eE2we8BFrs2iODm7KKhxRbBi', '', '', NULL, '', '', '', 0, NULL, '', '', 0, NULL, '2016-08-31', '2016-08-31', NULL),
(4, 'Olivier', 'Perrin', '', 'perrinolivier88@gmail.com', 'kaki88', '$2y$10$8Wn4cnW9eqsdrNfqPRbxM.YuOw/JUE4GbhYUHTyvskiIE1vIxtBta', '0329634397', '0608857023', '0329376014', '44 rue de la hadrange', 'complement', '88600', 1200, '2011-11-04', 'gerardmer', '', 1, 0, '2016-08-31', '2016-09-12', NULL),
(8, 'test', 'rené', '', 'rene@gmail.com', 'rene', '$2y$10$oGjzSzh/4P8DDLQ6FKtH4e.0PmzS2jAPAO.5LmaLj/fHSLvAvNVxy', '', '', '', '22 rue leclerc', 'osef', '', 0, '1983-09-09', '', '', 0, 0, '2016-09-09', '2016-09-09', NULL),
(9, 'Fresse', 'Gerome', '', 'gfresse@gmail.com', 'fresse', '$2y$10$WEpYspvQkMLyD89byrcCNesG6drwgK0O39prYds3bxq9KcQP0apBu', '0908837748', '0698980499', '0329887735', '26 rue charles de gaules', 'pas loin', '88000', 1322, '2016-09-08', '', '', 0, 0, '2016-09-12', '2016-09-12', NULL),
(10, 'dfs', 'dsfhfdsh', '', 'dir@gmail.com', 'dh', '$2y$10$i/zRvj5C8poEyIi6TWx55.ceo9DYSGbbbQUmtnCN90OcIABkmOVgW', '', '', '', 'dshd', 'dfhdfshdfsh', '', 14, NULL, '', '', 1, 0, '2016-09-13', '2016-09-13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_vehicles`
--

CREATE TABLE IF NOT EXISTS `users_vehicles` (
  `user_id` int(11) NOT NULL DEFAULT '0',
  `vehicle_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`vehicle_id`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_materials`
--

CREATE TABLE IF NOT EXISTS `user_materials` (
  `user_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `quantity` int(6) DEFAULT '1',
  `from_date` date NOT NULL,
  `to_date` date DEFAULT NULL,
  PRIMARY KEY (`user_id`,`material_id`),
  KEY `materials_key` (`material_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_materials`
--

INSERT INTO `user_materials` (`user_id`, `material_id`, `quantity`, `from_date`, `to_date`) VALUES
(1, 134, 3, '2016-09-12', '2016-09-23'),
(2, 139, 1, '2016-09-12', NULL),
(3, 134, 1, '2016-09-12', '2016-09-20'),
(4, 134, 1, '2016-09-12', '2016-09-09');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE IF NOT EXISTS `vehicles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matriculation` varchar(255) DEFAULT NULL,
  `number_kilometer` int(11) DEFAULT '0',
  `snow` tinyint(1) DEFAULT '0',
  `air_conditionner` tinyint(1) DEFAULT '0',
  `vehicle_type_id` int(11) DEFAULT NULL,
  `vehicle_model_id` int(11) DEFAULT NULL,
  `bought` date DEFAULT NULL,
  `end_warranty` date DEFAULT NULL,
  `next_revision` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `matriculation`, `number_kilometer`, `snow`, `air_conditionner`, `vehicle_type_id`, `vehicle_model_id`, `bought`, `end_warranty`, `next_revision`) VALUES
(1, 'qsdfsd', 0, 0, 0, 4, NULL, NULL, NULL, NULL),
(2, 'AK-123-WA', 12000, 0, 1, 18, NULL, NULL, NULL, NULL),
(3, 'AQ-278-WL', 44500, 0, 1, 1, NULL, '2011-09-05', '2016-09-08', '2018-03-01'),
(4, 'EE-777-WN', 79000, 1, 0, 20, NULL, '2015-09-04', '2018-09-27', '2017-03-16'),
(5, 'ZZ-121-WL', 155009, 1, 1, 11, NULL, '2011-09-30', '2018-09-13', '2017-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_models`
--

CREATE TABLE IF NOT EXISTS `vehicle_models` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `label` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_types`
--

CREATE TABLE IF NOT EXISTS `vehicle_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(15) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `vehicle_types`
--

INSERT INTO `vehicle_types` (`id`, `code`, `name`, `type`, `picture`) VALUES
(1, 'ASSU', 'Ambulance de secours et de soins d''urgence', 'SECOURS', 'vehicules/VSAV.png'),
(2, 'CCFL', 'Camion citerne Forêt léger', 'FEU', 'vehicules/CCF.png'),
(3, 'CCFM', 'Camion citerne Forêt moyen', 'FEU', 'vehicules/CCF.png'),
(4, 'CCFS', 'Camion citerne Forêt super', 'FEU', 'vehicules/CCGC.png'),
(5, 'CCGC', 'Camion citerne grande capacité', 'FEU', 'vehicules/CCGC.png'),
(6, 'CTU', 'Camionnette tous usages', 'DIVERS', 'vehicules/VTU.png'),
(7, 'EPA', 'Echelle pivotante automatique', 'FEU', 'vehicules/EPA.png'),
(8, 'ERS', 'Embarcation de Reconnaissance et de Sauvetage', 'SECOURS', 'vehicules/BOAT1.png'),
(9, 'FPT', 'Fourgon pompe tonne', 'FEU', 'vehicules/FPT.png'),
(10, 'FPTL', 'Fourgon pompe tonne léger', 'FEU', 'vehicules/FPT.png'),
(11, 'FPTLHR', 'Fourgon pompe tonne léger hors route', 'FEU', 'vehicules/FMOGP.png'),
(12, 'GER', 'Groupe Electrogène Remorquable', 'DIVERS', NULL),
(13, 'MOTO', 'Motocyclette', 'DIVERS', 'vehicules/MOTO.png'),
(14, 'MPS', 'Moto de premiers secours', 'SECOURS', 'vehicules/MOTO.png'),
(15, 'PCM', 'Poste de Commandement Mobile', 'DIVERS', 'vehicules/PC.png'),
(16, 'QUAD', 'Véhicule quad', 'DIVERS', 'vehicules/QUAD.png'),
(17, 'REM', 'Remorque', 'DIVERS', NULL),
(18, 'VCYN', 'Véhicule Cynotechnique', 'DIVERS', 'vehicules/CYNO.png'),
(19, 'VELO', 'Vélo tout terrain', 'DIVERS', 'vehicules/VELO.png'),
(20, 'VL', 'Véhicule léger', 'DIVERS', 'vehicules/VL.png'),
(21, 'VLC', 'Véhicule Léger de Commandement', 'DIVERS', 'vehicules/VLCG.png'),
(22, 'VLHR', 'Véhicule léger hors route', 'DIVERS', 'vehicules/VLHR.png'),
(23, 'VPI', 'Véhicule polyvalent d''intervention', 'DIVERS', 'vehicules/VPI.png'),
(24, 'VPS', 'Véhicule de premier secours', 'SECOURS', 'vehicules/AMBULANCE1.png'),
(25, 'VSAV', 'Véhicule de secours aux blessés', 'SECOURS', 'vehicules/VSAV.png'),
(26, 'VSR', 'Véhicule de secours routier', 'SECOURS', 'vehicules/VSR.png'),
(27, 'VTD', 'Véhicule technique déblaiement', 'DIVERS', 'vehicules/VSD.png'),
(28, 'VTH', 'Véhicule technique hébergement', 'LOGISTIQUE', 'vehicules/CMIC.png'),
(29, 'VTI', 'Véhicule technique soutien intendance', 'LOGISTIQUE', 'vehicules/VIRT.png'),
(30, 'VTP', 'Véhicule de transport de personnel', 'DIVERS', 'vehicules/BUS.png'),
(31, 'VTU', 'Véhicule tous usages', 'DIVERS', 'vehicules/VTU.png');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barracks_materials`
--
ALTER TABLE `barracks_materials`
  ADD CONSTRAINT `barracks_materials_ibfk_1` FOREIGN KEY (`barrack_id`) REFERENCES `barracks` (`id`),
  ADD CONSTRAINT `barracks_materials_ibfk_2` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`);

--
-- Constraints for table `barracks_users`
--
ALTER TABLE `barracks_users`
  ADD CONSTRAINT `barracks_users_ibfk_1` FOREIGN KEY (`barrack_id`) REFERENCES `barracks` (`id`),
  ADD CONSTRAINT `barracks_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `barracks_vehicles`
--
ALTER TABLE `barracks_vehicles`
  ADD CONSTRAINT `barracks_vehicles_ibfk_1` FOREIGN KEY (`barrack_id`) REFERENCES `barracks` (`id`),
  ADD CONSTRAINT `barracks_vehicles_ibfk_2` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`);

--
-- Constraints for table `events_materials`
--
ALTER TABLE `events_materials`
  ADD CONSTRAINT `events_materials_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `events_materials_ibfk_2` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`);

--
-- Constraints for table `events_teams`
--
ALTER TABLE `events_teams`
  ADD CONSTRAINT `events_teams_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`),
  ADD CONSTRAINT `events_teams_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);

--
-- Constraints for table `events_vehicles`
--
ALTER TABLE `events_vehicles`
  ADD CONSTRAINT `events_vehicles_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `events_vehicles_ibfk_2` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`);

--
-- Constraints for table `materials_teams`
--
ALTER TABLE `materials_teams`
  ADD CONSTRAINT `materials_teams_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`),
  ADD CONSTRAINT `materials_teams_ibfk_2` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`);

--
-- Constraints for table `orders_supplies`
--
ALTER TABLE `orders_supplies`
  ADD CONSTRAINT `orders_supplies_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `orders_supplies_ibfk_2` FOREIGN KEY (`supply_id`) REFERENCES `supplies` (`id`);

--
-- Constraints for table `providers_supplies`
--
ALTER TABLE `providers_supplies`
  ADD CONSTRAINT `providers_supplies_ibfk_1` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`),
  ADD CONSTRAINT `providers_supplies_ibfk_2` FOREIGN KEY (`supply_id`) REFERENCES `supplies` (`id`);

--
-- Constraints for table `teams_users`
--
ALTER TABLE `teams_users`
  ADD CONSTRAINT `teams_users_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`),
  ADD CONSTRAINT `teams_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `teams_vehicles`
--
ALTER TABLE `teams_vehicles`
  ADD CONSTRAINT `teams_vehicles_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`),
  ADD CONSTRAINT `teams_vehicles_ibfk_2` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`);

--
-- Constraints for table `users_vehicles`
--
ALTER TABLE `users_vehicles`
  ADD CONSTRAINT `users_vehicles_ibfk_1` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`),
  ADD CONSTRAINT `users_vehicles_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
