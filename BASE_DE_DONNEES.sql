-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 05 mars 2020 à 22:39
-- Version du serveur :  8.0.15
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_etudiant`
--

-- --------------------------------------------------------

--
-- Structure de la table `annees`
--

DROP TABLE IF EXISTS `annees`;
CREATE TABLE IF NOT EXISTS `annees` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomAnnee` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `annees`
--

INSERT INTO `annees` (`id`, `nomAnnee`, `created_at`, `updated_at`) VALUES
(8, '2019-2020', NULL, NULL),
(9, '2020-2021', NULL, NULL),
(10, '2021-2022', NULL, NULL),
(11, '2022-2023', NULL, NULL),
(12, '2023-2024', NULL, NULL),
(13, '2024-2025', NULL, NULL),
(14, '2025-2026', NULL, NULL),
(7, '2018-2019', NULL, NULL),
(6, '2017-2018', NULL, NULL),
(5, '2016-2017', NULL, NULL),
(4, '2015-2016', NULL, NULL),
(3, '2014-2015', NULL, NULL),
(2, '2013-2014', NULL, NULL),
(1, '2012-2013', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `annee_universitaires`
--

DROP TABLE IF EXISTS `annee_universitaires`;
CREATE TABLE IF NOT EXISTS `annee_universitaires` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idEtu` bigint(20) NOT NULL,
  `idPromotion` bigint(20) NOT NULL,
  `idVoie` bigint(20) NOT NULL,
  `idAnnee` bigint(20) NOT NULL,
  `idResultat` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `annee_universitaires_idetu_foreign` (`idEtu`),
  KEY `annee_universitaires_idpromotion_foreign` (`idPromotion`),
  KEY `annee_universitaires_idvoie_foreign` (`idVoie`),
  KEY `annee_universitaires_idannee_foreign` (`idAnnee`),
  KEY `annee_universitaires_idresultat_foreign` (`idResultat`)
) ENGINE=MyISAM AUTO_INCREMENT=140 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `annee_universitaires`
--

INSERT INTO `annee_universitaires` (`id`, `idEtu`, `idPromotion`, `idVoie`, `idAnnee`, `idResultat`, `created_at`, `updated_at`) VALUES
(2, 340002, 1, 2, 8, 1, NULL, NULL),
(4, 340004, 1, 2, 8, 1, NULL, NULL),
(5, 340005, 2, 1, 7, 2, NULL, NULL),
(9, 340009, 3, 1, 6, 3, NULL, NULL),
(8, 340008, 2, 2, 6, 3, NULL, NULL),
(7, 340007, 2, 1, 7, 2, NULL, NULL),
(6, 340006, 2, 2, 7, 2, NULL, NULL),
(3, 340003, 1, 1, 8, 1, NULL, NULL),
(126, 340118, 3, 1, 1, 1, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(1, 340001, 1, 1, 8, 1, NULL, NULL),
(128, 340121, 3, 1, 1, 1, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(129, 340122, 3, 1, 1, 1, '2020-03-05 20:43:45', '2020-03-05 20:43:45'),
(130, 340123, 3, 1, 1, 1, '2020-03-05 20:43:45', '2020-03-05 20:43:45'),
(131, 340124, 3, 1, 1, 1, '2020-03-05 20:43:45', '2020-03-05 20:43:45'),
(132, 340125, 3, 1, 1, 1, '2020-03-05 20:43:45', '2020-03-05 20:43:45'),
(133, 340126, 3, 1, 1, 1, '2020-03-05 20:43:45', '2020-03-05 20:43:45'),
(134, 340127, 3, 1, 1, 1, '2020-03-05 20:43:45', '2020-03-05 20:43:45'),
(135, 340128, 3, 1, 1, 1, '2020-03-05 20:43:45', '2020-03-05 20:43:45'),
(136, 340129, 3, 1, 1, 1, '2020-03-05 20:43:45', '2020-03-05 20:43:45'),
(137, 340130, 3, 1, 1, 1, '2020-03-05 20:43:45', '2020-03-05 20:43:45'),
(138, 340131, 3, 1, 1, 1, '2020-03-05 20:43:45', '2020-03-05 20:43:45'),
(139, 340132, 3, 1, 1, 1, '2020-03-05 20:43:45', '2020-03-05 20:43:45');

-- --------------------------------------------------------

--
-- Structure de la table `entreprises`
--

DROP TABLE IF EXISTS `entreprises`;
CREATE TABLE IF NOT EXISTS `entreprises` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `entreprises`
--

INSERT INTO `entreprises` (`id`, `nom`, `telephone`, `adresse`, `created_at`, `updated_at`) VALUES
(13, 'Societe Generale', '01 45 27 88 77', 'Paris 9', NULL, NULL),
(12, 'SPA', '01 98 27 88 77', 'Paris 11', NULL, NULL),
(11, 'Carrefour', '01 87 26 77 34', 'Courbevoie', NULL, NULL),
(10, 'Engie', '01 87 26 77 34', 'Courbevoie', NULL, NULL),
(9, 'BNP Paribas', '01 23 98 77 45', 'Rueil-Malmaison', NULL, NULL),
(8, 'Axa', '01 99 88 77 23', 'Boulgone-Billancourt', NULL, NULL),
(7, 'Nigel Frank', '01 92 77 98 28', 'Colombes', NULL, NULL),
(6, 'Altimate', '01 92 77 87 99', 'Nanterre', NULL, NULL),
(5, 'Citech', '01 89 77 88 98', 'Levallois-Perret', NULL, NULL),
(4, 'Nextedia', '01 72 33 88 98', 'Asnières-Sur-Seine', NULL, NULL),
(3, 'Atos', '01 47 54 555 99', 'Paris 3', NULL, NULL),
(2, 'Capgemini', '01 47 54 50 00', 'Paris 8', NULL, NULL),
(1, 'IBM', '01 58 75 00 00', 'Paris La Défense', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

DROP TABLE IF EXISTS `etudiants`;
CREATE TABLE IF NOT EXISTS `etudiants` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateNaiss` date DEFAULT NULL,
  `telephone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mailPerso` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mailUniv` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mailPro` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8778545525 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etudiants`
--

INSERT INTO `etudiants` (`id`, `nom`, `prenom`, `dateNaiss`, `telephone`, `mailPerso`, `mailUniv`, `mailPro`, `adresse`, `created_at`, `updated_at`) VALUES
(4524524525, 'toto', 'titi', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 16:12:28', '2020-03-05 16:12:28'),
(8778545524, 'martin', 'dupond', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 16:12:28', '2020-03-05 16:12:28'),
(7001, 'AAAAA', 'AAAA', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 16:12:28', '2020-03-05 16:12:28'),
(7002, 'BAAAA', 'BAAA', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 16:12:28', '2020-03-05 16:12:28'),
(7003, 'CAAAA', 'BAAA', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 16:12:28', '2020-03-05 16:12:28'),
(39001807, 'NAIT BELKACEM', 'Driss', '2020-03-07', '0751028277', 'driss.naitbelkacem@gmail.com', 'driss.naitbelkacem@gmail.com', 'driss.naitbelkacem@gmail.com', '144, Rue Emile Zola', '2020-03-05 16:28:57', '2020-03-05 16:28:57'),
(98, 'Habert', 'Lea', NULL, NULL, 'lea.habert@gmail.com', NULL, NULL, NULL, '2020-03-05 17:17:30', '2020-03-05 17:17:30'),
(99, 'mboma', 'yohan', NULL, '0987276378', 'yohan.mboma@gmail.com', NULL, NULL, NULL, '2020-03-05 17:19:06', '2020-03-05 17:19:06'),
(33, 'Blondeau', 'victor', '2020-03-14', '0765940676', 'victor.blondeau@gmail.com', 'victor.blondeau@nanterre.com', 'victor.blondeau@ibm.com', NULL, '2020-03-05 18:01:39', '2020-03-05 18:01:39'),
(90, 'Guanessin', 'Delbot', NULL, NULL, 'g.delbot@gmail.com', NULL, NULL, NULL, '2020-03-05 18:04:23', '2020-03-05 18:04:23'),
(88, 'har', 'erwyn', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 18:11:10', '2020-03-05 18:11:10'),
(340001, 'Ahmed', 'Noufeine', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:43', '2020-03-05 20:43:43'),
(340002, 'Ait akli', 'Litissia', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:43', '2020-03-05 20:43:43'),
(340003, 'Ba', 'Adja', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:43', '2020-03-05 20:43:43'),
(340004, 'Binous', 'Wassim', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:43', '2020-03-05 20:43:43'),
(340005, 'Bocoum', 'Idy', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:43', '2020-03-05 20:43:43'),
(340006, 'Brochado', 'Alexandre', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:43', '2020-03-05 20:43:43'),
(340007, 'Clebien', 'Nangninta', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:43', '2020-03-05 20:43:43'),
(340008, 'Das', 'Rahul', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:43', '2020-03-05 20:43:43'),
(340009, 'Elarj', 'Aniss', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:43', '2020-03-05 20:43:43'),
(340010, 'Fall', 'Seynabou', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:43', '2020-03-05 20:43:43'),
(340011, 'Jestin', 'Gabriel', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:43', '2020-03-05 20:43:43'),
(340012, 'Keloute ndamukong', 'Ubald', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:43', '2020-03-05 20:43:43'),
(340013, 'Khalfi', 'Sofian', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340014, 'Le men', 'Yann', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340015, 'Mboup', 'Gaye', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340016, 'Mouzouri', 'Ilhame', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340017, 'Ndiaye', 'Moussa', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340018, 'Quellec', 'Nathan', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340019, 'Rajaratnam', 'Sarujan', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340020, 'Raypoulet', 'Hemanath', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340021, 'Sakho', 'Assane', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340022, 'Schauffler', 'Ophelie', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340023, 'Si-mohammed', 'Samy', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340024, 'Sidate', 'Alexis', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340025, 'Zemali', 'Lynda', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340026, 'Abalil', 'Rizlane', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340027, 'Achou', 'Sara', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340028, 'Akkoura', 'Aniesse', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340029, 'Ali', 'Ikram-masjid', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340030, 'Ali', 'Faiz', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340031, 'Ali', 'Ikram-masjid', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340032, 'Alouda', 'Lidao', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340034, 'Askar', 'Mohammad', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340035, 'Auger', 'Antoine', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340037, 'Balde', 'Mamadou saliou', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340038, 'Baro', 'Mohamed', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340039, 'Barolle', 'Romain', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340040, 'Barolle', 'Romain', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340041, 'Barry', 'Aissatou', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340042, 'Belhaimeur', 'Mohamed', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340043, 'Benaissa', 'Adam', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340044, 'Benali', 'Ahmed', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340045, 'Berte', 'Ulrich', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340047, 'Beyaz', 'Sefkan', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340048, 'Bodart', 'Valentin', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340049, 'Boucamus', 'Cassandra', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340050, 'Boumaza', 'Karim', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340051, 'Bouzekri', 'Ryan', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340053, 'Callet', 'Theo', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340055, 'Cazenave', 'Louis', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340056, 'Chatillon', 'Julien', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340058, 'Chen', 'Juline', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340060, 'Crentsil', 'Robert', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340062, 'Dandeu', 'Tom', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340064, 'Delaporte', 'Lucie', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340066, 'Diop', 'Maguette', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340067, 'Djamaldine ben', 'Hadji', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340068, 'Dubois', 'Dorian', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340069, 'El amrani', 'Amine', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340070, 'Esmel', 'Nome', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340071, 'Fahim', 'Aymane', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340072, 'Fekih', 'Kevin', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340073, 'Feugier', 'Augustin', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340074, 'Gac', 'Kevin', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340075, 'Ganeshn', 'Haresh', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340076, 'Gavalda', 'Clement', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340077, 'Gilbert', 'Cyprien', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340079, 'Gorlicki', 'Paul', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340080, 'Goyet', 'Camille', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340082, 'Grandelaude', 'Mathias', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340083, 'Hadjara', 'Celina', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340084, 'Houhou', 'Sara', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340085, 'Igoudjilene', 'Kenza', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340086, 'Jalloh', 'Yusuf', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340087, 'Jardin', 'Samy', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340089, 'Jules', 'Julissa', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340090, 'Kadi', 'Imane', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340091, 'Kadri', 'Nassim', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340092, 'Kende', 'Emmanuela', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340093, 'Kouhafa', 'Latifa', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340094, 'Lacom', 'Marveen', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340095, 'Le', 'Phong sac', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340096, 'Le lorier', 'Lucas', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340097, 'Legendre', 'Angele', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340098, 'Lemaza kunday ndjuka', 'Revelle', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340099, 'Limbasse', 'Noemie', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340101, 'Lin', 'Xinlei', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340102, 'Louveau', 'Christophe', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340103, 'Malinvaud', 'Paul', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340104, 'Martin', 'Vanessa', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340105, 'Medaoud', 'Salim', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340107, 'Mousset', 'Pierre', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340108, 'Nanquette', 'Olivier', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340110, 'Nass', 'Julien', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340112, 'Noursaid', 'Lahcen', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340113, 'Oumbe oumbe', 'David', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340114, 'Pires', 'Dany', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340116, 'Quenum', 'Heloise', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340118, 'Rageh', 'Nydel', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340120, 'Ripert', 'Alexandre', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340121, 'Sadat', 'Halima', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:44', '2020-03-05 20:43:44'),
(340122, 'Sardaoui', 'Amine', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:45', '2020-03-05 20:43:45'),
(340123, 'Sereir', 'Zohra', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:45', '2020-03-05 20:43:45'),
(340124, 'Sharma', 'Aurelien', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:45', '2020-03-05 20:43:45'),
(340125, 'Sintes', 'Manon', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:45', '2020-03-05 20:43:45'),
(340126, 'Smahi', 'Lydia', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:45', '2020-03-05 20:43:45'),
(340127, 'Soleil', 'Emilie', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:45', '2020-03-05 20:43:45'),
(340128, 'Soumare', 'Fatimata', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:45', '2020-03-05 20:43:45'),
(340129, 'Sun', 'Jialei', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:45', '2020-03-05 20:43:45'),
(340130, 'Tahir', 'Mohamed - imrane', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:45', '2020-03-05 20:43:45'),
(340131, 'Tissot', 'Guilhem', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:45', '2020-03-05 20:43:45'),
(340132, 'Tliba', 'Ahmed', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05 20:43:45', '2020-03-05 20:43:45');

-- --------------------------------------------------------

--
-- Structure de la table `managers`
--

DROP TABLE IF EXISTS `managers`;
CREATE TABLE IF NOT EXISTS `managers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `idEntreprise` bigint(20) NOT NULL,
  `mail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `managers_identreprise_foreign` (`idEntreprise`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `managers`
--

INSERT INTO `managers` (`id`, `nom`, `prenom`, `idEntreprise`, `mail`, `telephone`, `created_at`, `updated_at`) VALUES
(10, 'Barreau', 'Sebastien', 10, 'sebastien.barreau@hotmail.fr', '06 37 87 99 38 ', NULL, NULL),
(9, 'Leqsiouer', 'Mehdi', 9, 'mehdi.leqsiouer@gmail.com', '06 27 94 28 33 00', NULL, NULL),
(8, 'Barbot', 'Emanuelle', 8, 'emanuelle.barbot@gmail.com', '06 37 85 69 88', NULL, NULL),
(7, 'Niquet', 'Celine', 7, 'celine.niquet@hotmail.fr', '06 73 38 40 87', NULL, NULL),
(6, 'Mboma', 'Yohan', 6, 'yohan.mboma@gmail.com', '06 73 75 89 34', NULL, NULL),
(5, 'Alaoui', 'Karim', 5, 'karim.alaoui@yahoo.fr', '07 26 38 93 72', NULL, NULL),
(4, 'Alami', 'Mehdi', 4, 'mehdi.alami@hotmail.fr', '07 48 93 85 95', NULL, NULL),
(3, 'cagnar', 'Vincent', 3, 'vincent.cagnar@gmail.com', '07 92 38 74 90', NULL, NULL),
(2, 'Redondin', 'Maxime', 2, 'Maxime.redondin@gmail.com', '06 87 39 03 84', NULL, NULL),
(1, 'Delbot', 'François', 1, 'Delbot.François@gmail.com', '07 87 28 93 84', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(34, '2020_02_04_223027_create_etudiants_table', 1),
(35, '2020_02_04_223233_create_entreprises_table', 1),
(36, '2020_02_04_223257_create_managers_table', 1),
(37, '2020_02_04_223332_create_missions_table', 1),
(38, '2020_02_04_223354_create_annee_universitaires_table', 1),
(39, '2020_02_17_121910_create_type_missions_table', 1),
(40, '2020_02_17_122515_create_annees_table', 1),
(41, '2020_02_17_122601_create_promotions_table', 1),
(42, '2020_02_17_122633_create_resultats_table', 1),
(43, '2020_02_17_122716_create_voies_table', 1),
(44, '2020_02_19_193429_rename_label_to_label_promo_promotions_table', 1),
(45, '2020_02_19_193716_rename_libelle_to_nom_voie_voies_table', 1),
(46, '2020_02_19_194013_rename_libelle_to_nom_annees_annees_table', 1),
(47, '2020_02_19_194104_rename_libelle_to_nom_resultat_resultats_table', 1),
(20, '2020_02_04_223027_create_etudiants_table', 1),
(21, '2020_02_04_223233_create_entreprises_table', 1),
(22, '2020_02_04_223257_create_managers_table', 1),
(23, '2020_02_04_223332_create_missions_table', 1),
(24, '2020_02_04_223354_create_annee_universitaires_table', 1),
(25, '2020_02_17_121910_create_type_missions_table', 1),
(26, '2020_02_17_122515_create_annees_table', 1),
(27, '2020_02_17_122601_create_promotions_table', 1),
(28, '2020_02_17_122633_create_resultats_table', 1),
(29, '2020_02_17_122716_create_voies_table', 1),
(30, '2020_02_19_193429_rename_label_to_label_promo_promotions_table', 1),
(31, '2020_02_19_193716_rename_libelle_to_nom_voie_voies_table', 1),
(32, '2020_02_19_194013_rename_libelle_to_nom_annees_annees_table', 1),
(33, '2020_02_19_194104_rename_libelle_to_nom_resultat_resultats_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `missions`
--

DROP TABLE IF EXISTS `missions`;
CREATE TABLE IF NOT EXISTS `missions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idEtu` bigint(20) NOT NULL,
  `idManager` bigint(20) DEFAULT NULL,
  `idEntreprise` bigint(20) NOT NULL,
  `idType` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `thematique` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateEntree` date DEFAULT NULL,
  `dateSortie` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `missions_idetu_foreign` (`idEtu`),
  KEY `missions_idmanager_foreign` (`idManager`),
  KEY `missions_identreprise_foreign` (`idEntreprise`),
  KEY `missions_idtype_foreign` (`idType`(250))
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `missions`
--

INSERT INTO `missions` (`id`, `idEtu`, `idManager`, `idEntreprise`, `idType`, `thematique`, `description`, `dateEntree`, `dateSortie`, `created_at`, `updated_at`) VALUES
(7, 340007, 5, 4, '1', 'Responsable technique', 'REsponsable technique de projets informatique', '2019-07-17', '2020-03-15', NULL, NULL),
(6, 340006, 4, 4, '1', 'Developpeur', 'Developpeur mobile', '2019-07-30', '2020-03-21', NULL, NULL),
(5, 340005, 3, 3, '2', 'Scrum master', 'Professionnel methode scrum et agile', '2020-10-24', '2021-09-10', NULL, NULL),
(4, 340004, 2, 2, '2', 'Developpeur', 'Developpeur POO', '2019-11-21', '2020-09-11', NULL, NULL),
(3, 340002, 1, 1, '3', 'Chef de projet', 'Chef de projet informatique', '2019-02-12', '2021-05-14', NULL, NULL),
(2, 340001, 8, 8, '4', 'Manager', 'Manager Application', '2019-07-17', '2020-03-28', NULL, NULL),
(1, 39001807, 9, 9, '2', 'Developpeur', 'Developpeur Application Web', '2019-06-01', '2021-02-12', NULL, NULL),
(8, 340008, 6, 6, '3', 'Developpeur ', 'Developpeur POO java', '2019-12-18', '2020-07-09', NULL, NULL),
(9, 340009, 7, 7, '1', 'Developpeur', 'Developpeur full stack', '2020-01-28', '2020-10-08', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `promotions`
--

DROP TABLE IF EXISTS `promotions`;
CREATE TABLE IF NOT EXISTS `promotions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomPromo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `promotions`
--

INSERT INTO `promotions` (`id`, `nomPromo`, `created_at`, `updated_at`) VALUES
(1, 'L3', NULL, NULL),
(2, 'M1', NULL, NULL),
(3, 'M2', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `resultats`
--

DROP TABLE IF EXISTS `resultats`;
CREATE TABLE IF NOT EXISTS `resultats` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomResultat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `resultats`
--

INSERT INTO `resultats` (`id`, `nomResultat`, `created_at`, `updated_at`) VALUES
(1, 'En cours', NULL, NULL),
(2, 'Reussite', NULL, NULL),
(3, 'Redoublement', NULL, NULL),
(4, 'Abandon', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `type_missions`
--

DROP TABLE IF EXISTS `type_missions`;
CREATE TABLE IF NOT EXISTS `type_missions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_missions`
--

INSERT INTO `type_missions` (`id`, `libelle`, `created_at`, `updated_at`) VALUES
(1, 'Stage', NULL, NULL),
(2, 'Alternance', NULL, NULL),
(3, 'CDI', NULL, NULL),
(4, 'CDD', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `voies`
--

DROP TABLE IF EXISTS `voies`;
CREATE TABLE IF NOT EXISTS `voies` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomVoie` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `voies`
--

INSERT INTO `voies` (`id`, `nomVoie`, `created_at`, `updated_at`) VALUES
(1, 'CLASS', NULL, NULL),
(2, 'APP', NULL, NULL),
(3, 'AUTRE', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
