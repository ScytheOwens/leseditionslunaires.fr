-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 16, 2022 at 12:36 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leseditionslunaires`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `parution` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `contenu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `parution`, `contenu`) VALUES
(1, 'Cr&eacute;ation des Editions Lunaires', '2022-03-15 19:41:12', 'Les Editions Lunaires sont fières de vous annoncer le début de leurs activités littéraires, ainsi que l\'ouverture de leur site internet. C\'est une aventure dans l\'imaginaire qui débute, dans la région lyonnaise, et nous vous invitons à bord.\r\n</br></br>\r\nAu firmament de nos valeurs, la qualité, l\'originalité, et un brin d\'outrecuidance. Nos récits feront vibrer vos cœurs jusqu\'à votre chair. \r\n</br></br>\r\nBienvenue aux Editions Lunaires !');

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(4) NOT NULL,
  `pseudo` varchar(25) NOT NULL,
  `jourpublie` date DEFAULT NULL,
  `note` int(1) NOT NULL,
  `contenu` text,
  `romanid` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `listecommandes`
--

CREATE TABLE `listecommandes` (
  `id` int(10) UNSIGNED NOT NULL,
  `ladate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `facture` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `complement` varchar(255) DEFAULT NULL,
  `codepostal` int(5) UNSIGNED NOT NULL,
  `ville` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL DEFAULT 'France',
  `mail` varchar(255) NOT NULL,
  `telephone` int(10) UNSIGNED NOT NULL,
  `produits` text NOT NULL,
  `statut` varchar(255) NOT NULL DEFAULT 'commande'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `listelivres`
--

CREATE TABLE `listelivres` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `longueur` int(3) UNSIGNED NOT NULL,
  `dimensions` varchar(255) NOT NULL,
  `poids` int(3) UNSIGNED NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `isbnbroche` varchar(15) NOT NULL,
  `prixbroche` decimal(4,2) UNSIGNED NOT NULL,
  `isbnnumerique` varchar(15) NOT NULL,
  `prixnumerique` decimal(4,2) UNSIGNED NOT NULL,
  `resume` text NOT NULL,
  `note` decimal(4,2) DEFAULT NULL,
  `sortie` date NOT NULL,
  `stock` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `listelivres`
--

INSERT INTO `listelivres` (`id`, `titre`, `genre`, `longueur`, `dimensions`, `poids`, `auteur`, `isbnbroche`, `prixbroche`, `isbnnumerique`, `prixnumerique`, `resume`, `note`, `sortie`, `stock`) VALUES
(1, 'Symbiose', 'science-fiction, voyage de formation, anticipation', 368, '14,8x21x2,7cm', 481, 'Scythe Owens', '9782958200107', '19.00', '9782958200114', '5.99', 'Qu\'attendre de son existence ? Morgan le sait : monotonie et insipidité.</br>\nQuel ennui, quelle non-vie ! Il la fuit, chérit la moindre braise de liberté, immergé dans l\'amitié fusionnelle qu\'il partage avec Lucian. Cependant, l\'approche du baccalauréat menace de briser leur bulle.</br>\nSi seulement un astéroïde, une tornade, n\'importe quoi, pulvérisait cette échéance ; il regarderait ce monde brûler avec plaisir tant que son être pouvait vibrer.</br>\nMais si l\'opportunité de devenir un dieu se présentait, la saisirait-il ? Accepterait-il tout ce que cette puissance impliquait de destruction, et surtout, de création ?', NULL, '2022-05-02', 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listecommandes`
--
ALTER TABLE `listecommandes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listelivres`
--
ALTER TABLE `listelivres`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `listecommandes`
--
ALTER TABLE `listecommandes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `listelivres`
--
ALTER TABLE `listelivres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
