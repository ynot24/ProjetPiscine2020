-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 18 avr. 2020 à 20:15
-- Version du serveur :  8.0.18
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
-- Base de données :  `ebayce`
--

-- --------------------------------------------------------

--
-- Structure de la table `achats_immediats`
--

DROP TABLE IF EXISTS `achats_immediats`;
CREATE TABLE IF NOT EXISTS `achats_immediats` (
  `ID_AchatImmediat` int(255) NOT NULL AUTO_INCREMENT,
  `Statut_vente` varchar(255) NOT NULL,
  `ID_Item` int(255) NOT NULL,
  PRIMARY KEY (`ID_AchatImmediat`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `achats_immediats`
--

INSERT INTO `achats_immediats` (`ID_AchatImmediat`, `Statut_vente`, `ID_Item`) VALUES
(1, 'non vendu', 1),
(2, 'non vendu', 2),
(3, 'non vendu', 3);

-- --------------------------------------------------------

--
-- Structure de la table `acheteurs`
--

DROP TABLE IF EXISTS `acheteurs`;
CREATE TABLE IF NOT EXISTS `acheteurs` (
  `ID_Acheteur` int(255) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `DateNaissance` date NOT NULL,
  `Adresse` varchar(255) NOT NULL,
  `Paiement` varchar(10) NOT NULL,
  `Solde` int(255) NOT NULL,
  `Mail` varchar(255) NOT NULL,
  `MotDePasse` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_Acheteur`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `acheteurs`
--

INSERT INTO `acheteurs` (`ID_Acheteur`, `Nom`, `Prenom`, `DateNaissance`, `Adresse`, `Paiement`, `Solde`, `Mail`, `MotDePasse`) VALUES
(1, 'Faure', 'Pascal', '1956-08-09', '1 Rue des Oliviers, 75010 Paris', 'Visa', 200, 'p.faure@gmail.com', 'PascalFaure56'),
(2, 'Petit', 'Claire', '1995-07-30', '1 Avenue Jean Moulin, 75010 Paris', 'Visa', 200, 'claire.petit@gmail.com', 'ClairePetit95');

-- --------------------------------------------------------

--
-- Structure de la table `administrateurs`
--

DROP TABLE IF EXISTS `administrateurs`;
CREATE TABLE IF NOT EXISTS `administrateurs` (
  `ID_Administrateur` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `DateNaissance` date NOT NULL,
  `Mail` varchar(255) NOT NULL,
  `MotDePasse` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_Administrateur`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `administrateurs`
--

INSERT INTO `administrateurs` (`ID_Administrateur`, `Nom`, `Prenom`, `DateNaissance`, `Mail`, `MotDePasse`) VALUES
(1, 'Dupont', 'Jean', '1990-05-20', 'jean.dupont@ebayce.fr', 'JeanDupont90'),
(2, 'Pierre', 'Michel', '1991-04-12', 'michel.pierre@ebayce.fr', 'MichelPierre91'),
(3, 'Fritz', 'Léa', '1992-12-07', 'lea.fritz@ebayce.fr', 'LeaFritz92');

-- --------------------------------------------------------

--
-- Structure de la table `encheres`
--

DROP TABLE IF EXISTS `encheres`;
CREATE TABLE IF NOT EXISTS `encheres` (
  `ID_Enchere` int(255) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `Heure` time NOT NULL,
  `PrixEnchere` int(255) NOT NULL,
  `PrixMax` int(255) NOT NULL,
  `Statut_vente` int(255) NOT NULL,
  `ID_Item` int(255) NOT NULL,
  PRIMARY KEY (`ID_Enchere`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `ID_Item` int(255) NOT NULL AUTO_INCREMENT,
  `Intitule` varchar(255) NOT NULL,
  `Prix` int(255) NOT NULL,
  `Categorie` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `Video` varchar(255) NOT NULL,
  `Statut_vente` varchar(255) NOT NULL,
  `ID_Vendeur` int(255) NOT NULL,
  `ID_Acheteur` int(255) NOT NULL,
  PRIMARY KEY (`ID_Item`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `items`
--

INSERT INTO `items` (`ID_Item`, `Intitule`, `Prix`, `Categorie`, `Description`, `Photo`, `Video`, `Statut_vente`, `ID_Vendeur`, `ID_Acheteur`) VALUES
(1, 'Totem du Chevalier de Hadoque 21 cm Tintin', 75, 'ferraille', 'Objet ayant été utilisé. Quelques imperfections au niveau du buste. Bon état.', 'images/Totem.jpg', '', 'non vendu', 2, 0),
(2, 'Médaille centenaire 1918', 60, 'ferraille', 'Trésor de France Médaille Souvenir Albert Première Guerre Mondial\r\n', 'images/Pièce1.jpg', '', 'non vendu', 2, 0),
(3, 'Coffret de pièces françaises de 1996 [RARE]', 260, 'ferraille', '11 pièces, belle épreuve, comme neuf. Petite inscription sur le carton.', 'images/Set.JPG', '', 'non vendu', 2, 0);

-- --------------------------------------------------------

--
-- Structure de la table `meilleures_offres`
--

DROP TABLE IF EXISTS `meilleures_offres`;
CREATE TABLE IF NOT EXISTS `meilleures_offres` (
  `ID_MeilleureOffre` int(255) NOT NULL AUTO_INCREMENT,
  `PrixNego` int(255) NOT NULL,
  `Statut_vente` int(255) NOT NULL,
  `ID_Item` int(255) NOT NULL,
  PRIMARY KEY (`ID_MeilleureOffre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `vendeurs`
--

DROP TABLE IF EXISTS `vendeurs`;
CREATE TABLE IF NOT EXISTS `vendeurs` (
  `ID_Vendeur` int(255) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `DateNaissance` date NOT NULL,
  `Mail` varchar(255) NOT NULL,
  `MotDePasse` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_Vendeur`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `vendeurs`
--

INSERT INTO `vendeurs` (`ID_Vendeur`, `Nom`, `Prenom`, `DateNaissance`, `Mail`, `MotDePasse`) VALUES
(1, 'Grand', 'Tom', '1979-09-02', 'tom.grand@museedeparis.fr', 'TomGrand79'),
(2, 'Dassaut', 'Eric', '1976-04-15', 'eric.dassaut@dassaut.fr', 'EricDassaut76');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
