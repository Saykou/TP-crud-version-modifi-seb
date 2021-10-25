-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 25 oct. 2021 à 13:32
-- Version du serveur : 5.7.33
-- Version de PHP : 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mysql-training`
--

-- --------------------------------------------------------

--
-- Structure de la table `microservices`
--

CREATE TABLE `microservices` (
  `microservice_id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `microservices`
--

INSERT INTO `microservices` (`microservice_id`, `titre`, `auteur`, `contenu`, `prix`, `categorie_id`, `images`) VALUES
(1, 'Microservice 1', 'Toto', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '4.99', 1, ''),
(2, 'Microservice 2', 'Michou', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Fusce ut placerat orci nulla pellentesque. ', '4.99', 2, ''),
(3, 'Microservice 3', 'Patrick', 'Consectetur adipiscing elit pellentesque habitant morbi tristique. ', '3.99', 2, ''),
(4, 'Microservice 4', 'Boris', 'Diam maecenas ultricies mi eget. Mattis ullamcorper velit sed ullamcorper morbi tincidunt. Vestibulum sed arcu non odio euismod lacinia at quis risus.', '2.99', 2, ''),
(5, 'Microservice 5', 'Titi', 'Eu mi bibendum neque egestas congue quisque. Pellentesque elit ullamcorper dignissim cras.', '0.00', 2, ''),
(6, 'Microservice 6', 'Polo', 'Rhoncus est pellentesque elit ullamcorper. A diam maecenas sed enim ut sem viverra.', '9.99', 2, ''),
(7, 'Microservice 7', 'Toto', 'Tincidunt augue interdum velit euismod in pellentesque massa. Elementum nisi quis eleifend quam.', '999.99', 1, ''),
(9, 'francois', 'rip', '2021-10-30', '15.00', 5, ''),
(10, 'ffff', 'xxxx', '2021-10-29', '150.00', 10, '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `microservices`
--
ALTER TABLE `microservices`
  ADD PRIMARY KEY (`microservice_id`),
  ADD KEY `categorie_id` (`categorie_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `microservices`
--
ALTER TABLE `microservices`
  MODIFY `microservice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
