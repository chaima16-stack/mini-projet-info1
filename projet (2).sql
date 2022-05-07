-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 07 mai 2022 à 21:33
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

CREATE TABLE `absence` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure` varchar(100) NOT NULL,
  `etat` int(100) NOT NULL,
  `module` varchar(100) NOT NULL,
  `cin` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `absence`
--

INSERT INTO `absence` (`id`, `date`, `heure`, `etat`, `module`, `cin`) VALUES
(1, '2022-05-16', 'AM', 1, 'Tech. Web', 7021227),
(2, '2022-05-18', 'PM', 1, 'Tech. Web', 7021227),
(4, '2022-05-19', 'AM', 1, 'Tech. Web', 14769341),
(5, '2022-05-21', 'AM', 1, 'Tech. Web', 14769341),
(6, '2022-05-21', 'PM', 1, 'Tech. Web', 14769341),
(7, '2022-05-09', 'AM', 1, 'Tech. Web', 7021227),
(8, '2022-05-11', 'PM', 1, 'Tech. Web', 7021227),
(9, '2022-05-11', 'PM', 1, 'Tech. Web', 14769341),
(17, '2022-06-04', 'AM', 1, 'Tech. Web', 7021227),
(18, '2022-06-04', 'PM', 1, 'Tech. Web', 7021227),
(21, '2022-05-09', 'AM', 1, 'SGBD', 12588887),
(22, '2022-05-11', 'PM', 1, 'SGBD', 12588887),
(23, '2022-04-26', 'PM', 0, 'SGBD', 12588887),
(24, '2022-04-27', 'AM', 0, 'SGBD', 12588887),
(25, '2022-04-28', 'PM', 0, 'SGBD', 12588887),
(26, '2022-04-29', 'AM', 0, 'SGBD', 12588887),
(27, '2022-04-25', 'PM', 1, 'SGBD', 7021227),
(28, '2022-06-02', 'AM', 1, 'SGBD', 14769341),
(29, '2022-06-02', 'PM', 1, 'SGBD', 14769341);

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

CREATE TABLE `enseignant` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `login` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `enseignant`
--

INSERT INTO `enseignant` (`id`, `date`, `nom`, `prenom`, `login`, `pass`) VALUES
(1, '2022-03-12 15:58:08', 'Saad', 'Walid', 'walid.saadd@gmail.com', '25f9e794323b453885f5181f1b624d0b'),
(2, '2022-05-03 18:23:46', 'dridi', 'samia', 'aa@gmail.com', 'df2b7e4da61fafd2761523ad48de018f'),
(3, '2022-05-04 21:04:52', 'yaich', 'sonia', 'sonia@gmail.com', 'e13f3643cc57e9c43577229842080912'),
(4, '2022-05-07 15:59:04', 'mouradi', 'imen', 'imen@gmail.com', 'df2b7e4da61fafd2761523ad48de018f'),
(5, '2022-05-07 16:10:38', 'yahia', 'rania', 'rania@gmail.com', 'df2b7e4da61fafd2761523ad48de018f');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `cin` int(8) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `cpassword` varchar(40) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `adresse` text NOT NULL,
  `groupe` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`cin`, `email`, `password`, `cpassword`, `nom`, `prenom`, `adresse`, `groupe`) VALUES
(7021227, 'yasmine@gmail.com', 'df2b7e4da61fafd2761523ad48de018f', 'df2b7e4da61fafd2761523ad48de018f', 'Ammarrrrr', 'yassmine', '     bizerte', 1),
(12588887, 'azza@gmail.com', 'e8a171150bfacbf4f78f0275ef832a16', 'e8a171150bfacbf4f78f0275ef832a16', 'Hadded', 'Azza', '     fff', 2),
(14769341, 'benghorbalchaima@gmail.com', 'df2b7e4da61fafd2761523ad48de018f', 'df2b7e4da61fafd2761523ad48de018f', 'Ben ghorbal', 'Chaima', '     20rue bardo', 1);

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `id` int(100) NOT NULL,
  `annee` int(100) NOT NULL,
  `filiere` varchar(100) NOT NULL,
  `classe` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `groupe`
--

INSERT INTO `groupe` (`id`, `annee`, `filiere`, `classe`) VALUES
(1, 1, 'INFO', 'B'),
(2, 1, 'INFO', 'C'),
(4, 1, 'INFO', 'A'),
(5, 2, 'MECA', 'C');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `absence`
--
ALTER TABLE `absence`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absence_ibfk_1` (`cin`);

--
-- Index pour la table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`cin`),
  ADD KEY `FK_CONSTRAINT_1` (`groupe`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `absence`
--
ALTER TABLE `absence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `enseignant`
--
ALTER TABLE `enseignant`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `absence`
--
ALTER TABLE `absence`
  ADD CONSTRAINT `absence_ibfk_1` FOREIGN KEY (`cin`) REFERENCES `etudiant` (`cin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `FK_CONSTRAINT_1` FOREIGN KEY (`groupe`) REFERENCES `groupe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
