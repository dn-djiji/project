-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 30 mai 2024 à 21:30
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `emploi`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', '123');

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id`, `name`, `address`, `type`, `email`, `password`, `role`) VALUES
(5, 'SANILUX PLUS,SARL', '29, boulevard Saouli Abdelkader 23000 Annaba Algérie', 'Public', 'Commercial@saniluxplus.com', '1234', 'entreprise'),
(6, 'IDEAL ART GLASS,SARL SIAG', 'Zone Industrielle Mebaaoudja N°4/5 rdc Sidi Amar rdc Sidi Amar 23005 Sidi Amar Algérie', 'Public', 'idealaersiag@gmail.com', '1234', 'entreprise'),
(7, 'ASMIDAL GROUPE INDUSTIEL', '2, rue Hamza Mohamed Sidi Brahim 23000 Annaba Algérie', 'Public', 'asmidalgroupeindustiel@gmail.com', '1234', 'entreprise'),
(10, 'ENTREPRISE NATIONALE DE CONSTRUCTIONS DE MATÉRIELS & EQUIPEMENTS FERROVIAIRES,SPA', '2, rue Hamza Mohamed Sidi Brahim 23000 Annaba Algérie', 'Public', 'entreprisespa@gmail.com', '123456', 'entreprise');

-- --------------------------------------------------------

--
-- Structure de la table `offres`
--

CREATE TABLE `offres` (
  `id` int(11) NOT NULL,
  `nom_du_travail` varchar(100) NOT NULL,
  `salaire` int(11) NOT NULL,
  `localisation` varchar(100) NOT NULL,
  `start` varchar(50) NOT NULL,
  `end` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `offres`
--

INSERT INTO `offres` (`id`, `nom_du_travail`, `salaire`, `localisation`, `start`, `end`, `description`, `email`) VALUES
(9, 'SANILUX PLUS,SARL', 0, '29, boulevard Saouli Abdelkader 23000 Annaba Algérie', '2024-05-15', '2024-06-07', 'Fabrication appareils et articles sanitaires en\r\ncéramique:\r\n-Evier de cuisine\r\n-Receveur de douche\r\n-Lave-main\r\n-Lavabos\r\n-WC anglais\r\n-WC turque', 'Commercial@saniluxplus.com'),
(10, 'SANILUX PLUS,SARL', 0, '29, boulevard Saouli Abdelkader 23000 Annaba Algérie', '2024-05-14', '2024-06-05', 'Fabrication appareils et articles sanitaires', 'Commercial@saniluxplus.com'),
(11, 'IDEAL ART GLASS,SARL SIAG', 0, 'Zone Industrielle Mebaaoudja N°4/5 rdc Sidi Amar rdc Sidi Amar 23005 Sidi Amar Algérie', '2024-05-02', '2024-06-06', 'Présentation - IDEAL ART GLASS,Sarl Siag\r\nTransformation du Verre et Fabrication de Tous Genres de\r\nPare Brise et Glass.', 'idealaersiag@gmail.com'),
(12, 'ASMIDAL GROUPE INDUSTIEL', 0, '2, rue Hamza Mohamed Sidi Brahim 23000 Annaba Algérie', '2024-05-08', '2024-06-28', 'Présentation - ASMIDAL Groupe industiel\r\nSpécialisée dans la production, la commercialisation et\r\nle développement des engrais, des nutriments et\r\nproduits phytosanitaires.', 'asmidalgroupeindustiel@gmail.com'),
(13, 'ASMIDAL GROUPE INDUSTIEL', 0, '2, rue Hamza Mohamed Sidi Brahim 23000 Annaba Algérie', '2024-04-05', '2024-07-04', 'Spécialisée dans la production, la commercialisation et\r\nle développement des engrais, des nutriments et\r\nproduits phytosanitaires.', 'asmidalgroupeindustiel@gmail.com'),
(14, '', 0, '', '', '', '', 'Commercial@saniluxplus.com'),
(15, '', 0, '', '', '', '', 'Commercial@saniluxplus.com');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_offer` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `nom_du_travail` varchar(100) NOT NULL,
  `salaire` int(11) NOT NULL,
  `localisation` varchar(1001) NOT NULL,
  `start` varchar(100) NOT NULL,
  `end` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `email_entreprise` varchar(100) NOT NULL,
  `cv` text NOT NULL,
  `date_ent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `email`, `id_offer`, `status`, `nom_du_travail`, `salaire`, `localisation`, `start`, `end`, `description`, `email_entreprise`, `cv`, `date_ent`) VALUES
(1, 'hp@gmail.com', 1, 1, 'FNFN', 0, 'FFNKF', '2024-05-29', '2024-06-06', 'jfjfnf,,fq,QFFL?', 'hp@gmail.com', '', ''),
(2, 'hp@gmail.com', 1, NULL, 'FNFN', 0, 'FFNKF', '2024-05-29', '2024-06-06', 'jfjfnf,,fq,QFFL?', 'hp@gmail.com', '', ''),
(3, 'dendanidjihane23@gmail.com', 5, 1, 'JJJ', 0, 'ANNABA', '2024-05-28', '2024-06-01', ',fqf,qkfn', 'hp@gmail.com', '1717006834.png', '2024-05-30'),
(4, 'dendanidjihane23@gmail.com', 10, 1, 'SANILUX PLUS,SARL', 0, '29, boulevard Saouli Abdelkader 23000 Annaba Algérie', '2024-05-14', '2024-06-05', 'Fabrication appareils et articles sanitaires', 'Commercial@saniluxplus.com', '1717090734.png', '2024-06-03'),
(5, 'dendanidjihane23@gmail.com', 13, NULL, 'ASMIDAL GROUPE INDUSTIEL', 0, '2, rue Hamza Mohamed Sidi Brahim 23000 Annaba Algérie', '2024-04-05', '2024-07-04', 'Spécialisée dans la production, la commercialisation et\r\nle développement des engrais, des nutriment', 'asmidalgroupeindustiel@gmail.com', '1717090734.png', ''),
(6, 'knanisalma@gmail.com', 9, NULL, 'SANILUX PLUS,SARL', 0, '29, boulevard Saouli Abdelkader 23000 Annaba Algérie', '2024-05-15', '2024-06-07', 'Fabrication appareils et articles sanitaires en\r\ncéramique:\r\n-Evier de cuisine\r\n-Receveur de douche\r', 'Commercial@saniluxplus.com', '1717091315.txt', ''),
(7, 'knanisalma@gmail.com', 10, NULL, 'SANILUX PLUS,SARL', 0, '29, boulevard Saouli Abdelkader 23000 Annaba Algérie', '2024-05-14', '2024-06-05', 'Fabrication appareils et articles sanitaires', 'Commercial@saniluxplus.com', '1717091315.txt', ''),
(8, 'knanisalma@gmail.com', 10, NULL, 'SANILUX PLUS,SARL', 0, '29, boulevard Saouli Abdelkader 23000 Annaba Algérie', '2024-05-14', '2024-06-05', 'Fabrication appareils et articles sanitaires', 'Commercial@saniluxplus.com', '1717091315.txt', ''),
(9, 'asmaden@gmail.com', 10, 1, 'SANILUX PLUS,SARL', 0, '29, boulevard Saouli Abdelkader 23000 Annaba Algérie', '2024-05-14', '2024-06-05', 'Fabrication appareils et articles sanitaires', 'Commercial@saniluxplus.com', '', '2024-05-31');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `competences` text DEFAULT NULL,
  `sexe` varchar(50) DEFAULT NULL,
  `experience` text DEFAULT NULL,
  `cv` text DEFAULT NULL,
  `niveau` varchar(100) DEFAULT NULL,
  `service_national` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `adresse`, `phone`, `competences`, `sexe`, `experience`, `cv`, `niveau`, `service_national`) VALUES
(20, 'djihane', 'dendanidjihane23@gmail.com', '123', 'ANNABA', '0699332417', 'Bac+3\r\nNiveau anglais B1\r\nNiveau français B2\r\n', 'Femme', 'Rien', '1717090734.png', 'L3', ''),
(21, 'Knani ', 'knanisalma@gmail.com', '1234', 'ANNABA', '0688442417', 'BAC+3\r\n', 'Femme', 'rien', '1717091315.txt', 'L3', ''),
(22, 'asma', 'asmaden@gmail.com', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `offres`
--
ALTER TABLE `offres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `offres`
--
ALTER TABLE `offres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
