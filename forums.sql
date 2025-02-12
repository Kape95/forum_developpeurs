-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 13 fév. 2025 à 00:11
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `forums`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `contenu` varchar(100) NOT NULL,
  `utilisateur_id` varchar(200) NOT NULL,
  `sujet_id` varchar(200) NOT NULL,
  `date_post` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sujets`
--

CREATE TABLE `sujets` (
  `id` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `contenu` text NOT NULL,
  `utilisateur_id` int(200) NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `sujets`
--

INSERT INTO `sujets` (`id`, `titre`, `contenu`, `utilisateur_id`, `date_creation`) VALUES
(1, 'debat sur Messi et Cristiano qui est le plus fort', '', 8, '2025-02-12 18:40:15'),
(2, 'difficultés rencontré sur php', '', 9, '2025-02-12 22:31:59');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mot_de_passe` varchar(225) NOT NULL,
  `date_d'inscription` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `email`, `mot_de_passe`, `date_d'inscription`) VALUES
(1, 'kapee', 'kape94@gmail.com', '$2y$10$ouwPqxk97Q5P/hukugfyseuvn8n3mDhjPA9pY/Q3vfa', '2025-02-11 13:56:59'),
(2, 'Aziz', 'Aziz@gmail.com', '$2y$10$cwT8a5aSJAk.yKq86sY6h.AfjP6YRdiSgdvt57HQrkz', '2025-02-11 17:18:41'),
(3, 'BARRO', 'barro15@gmail.com', '$2y$10$gqJgPWvS6g7b96g9bcRKR.uKlDkT.EuELK.huYuq.UE', '2025-02-12 08:04:06'),
(4, 'Kape', 'kape45@gmail.com', '$2y$10$PpCOmhdQRYamyH3KmUmp2.e7/hx3GkHV7pkcGqqkum5', '2025-02-12 08:22:16'),
(5, 'Kape', 'kape15@gmail.com', '$2y$10$Qg0NXOCrIz8/VerqKgLTre6y0FYhbtN6h.N/n7Loxx6', '2025-02-12 13:57:01'),
(6, 'kape', 'kape10@gmail.com', '$2y$10$ZIpY.jdoRLooypcmtnMY/e5hDtfUIrJ8/slNl9la4Jr', '2025-02-12 14:51:40'),
(7, 'Aziz10', 'Aziz10@gmail.com', '$2y$10$rnge/b9MPxyC./CTofuP2utWUHoK2t7Gs0rTz.Y1Bsm', '2025-02-12 17:42:51'),
(8, 'Aziz15', 'Aziz15@gmail.com', '$2y$10$ULzPYhnOAxuVg5qNX1nMK.bFCaD3kGbpuQY.qVvwtPtC7tJB0Bafe', '2025-02-12 18:16:03'),
(9, 'kape', 'kape16@gmail.com', '$2y$10$Jm.bTbq5CgzR4hCeff.7J.l3fkD/Vmk8b8Mo8Bb5Dgda6plEgU7BO', '2025-02-12 22:29:08');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sujets`
--
ALTER TABLE `sujets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sujets`
--
ALTER TABLE `sujets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
