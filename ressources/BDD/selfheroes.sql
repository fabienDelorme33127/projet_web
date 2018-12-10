-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  lun. 10 déc. 2018 à 11:31
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `selfheroes`
--

-- --------------------------------------------------------

--
-- Structure de la table `detail_histoire`
--

CREATE TABLE `detail_histoire` (
  `id_detail_histoire` int(11) NOT NULL,
  `numero_page` int(11) NOT NULL,
  `contenue` longtext NOT NULL,
  `id_histoire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `detail_histoire`
--

INSERT INTO `detail_histoire` (`id_detail_histoire`, `numero_page`, `contenue`, `id_histoire`) VALUES
(1, 1, '{\"text\":\"LOREPSUM KJFOIAJFUONA ZFJNAIZUF NUIAZFNIUFAHOU FHJAOUF OAZJFUOAHN FUNAUOF NUOAZF NOUAFN ONZAFOI\", \"bts\": {\"bt1\": {\"nombt\":\"Attaquer\", \"lienbt\":\"2\"},\"bt2\": {\"nombt\":\"Fuir\", \"lienbt\":\"3\"}}}', 1),
(2, 3, '{\"text\":\"LOREPSUM KJFOIAJFUONA ZFJNAIZUF NUIAZFNIUFAHOU FHJAOUF OAZJFUOAHN FUNAUOF NUOAZF NOUAFN ONZAFOI\", \"bts\": {\"bt1\": {\"nombt\":\"PokeBall\", \"lienbt\":\"2\"},\"bt2\": {\"nombt\":\"Prendre le chemin\", \"lienbt\":\"4\"}}}', 1),
(3, 2, '{\"text\":\"LOREPSUM KJFOIAJFUONA ZFJNAIZUF NUIAZFNIUFAHOU FHJAOUF OAZJFUOAHN FUNAUOF NUOAZF NOUAFN ONZAFOI\", \"bts\": {\"bt1\": {\"nombt\":\"Aller de l\'avant\", \"lienbt\":\"3\"},\"bt2\": {\"nombt\":\"Revenir sur ses pas\", \"lienbt\":\"1\"}}}', 1);

-- --------------------------------------------------------

--
-- Structure de la table `equipement`
--

CREATE TABLE `equipement` (
  `id_equipement` int(11) NOT NULL,
  `valeur` int(11) NOT NULL,
  `id_ref_slot` int(11) NOT NULL,
  `id_personnage` int(11) NOT NULL,
  `id_ref_equipement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `heroes`
--

CREATE TABLE `heroes` (
  `id_heroes` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `heroes`
--

INSERT INTO `heroes` (`id_heroes`, `login`, `password`) VALUES
(1, 'login', 'password'),
(2, 'luc', 'luc'),
(3, 'luc', 'luc');

-- --------------------------------------------------------

--
-- Structure de la table `heroes_histoire`
--

CREATE TABLE `heroes_histoire` (
  `id_heroes` int(11) NOT NULL,
  `id_histoire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `histoire`
--

CREATE TABLE `histoire` (
  `id_histoire` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `histoire`
--

INSERT INTO `histoire` (`id_histoire`, `titre`, `auteur`, `description`) VALUES
(1, 'Les chevaliers du Zodiaque', 'Zouif', 'Un livre pensé par un homme, créé par un homme, contenant des hommes se battant contre d\'autres hommes visant la communauté hommes et donc lu par des hommes'),
(2, 'w', 'w', 'w');

-- --------------------------------------------------------

--
-- Structure de la table `inventaire`
--

CREATE TABLE `inventaire` (
  `id_inventaire` int(11) NOT NULL,
  `id_personnage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `inventaire_objet`
--

CREATE TABLE `inventaire_objet` (
  `id_inventaire` int(11) NOT NULL,
  `id_ref_objet` int(11) NOT NULL,
  `nombre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `personnage`
--

CREATE TABLE `personnage` (
  `id_personnage` int(11) NOT NULL,
  `id_sauvegarde` int(11) DEFAULT NULL,
  `id_histoire` int(11) NOT NULL,
  `id_heroes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ref_equipement`
--

CREATE TABLE `ref_equipement` (
  `id_ref_equipement` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ref_objet`
--

CREATE TABLE `ref_objet` (
  `id_ref_objet` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ref_slot`
--

CREATE TABLE `ref_slot` (
  `id_ref_slot` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ref_stat`
--

CREATE TABLE `ref_stat` (
  `id_ref_stat` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sauvegarde`
--

CREATE TABLE `sauvegarde` (
  `id_sauvegarde` int(11) NOT NULL,
  `id_heroes` int(11) NOT NULL,
  `id_histoire` int(11) NOT NULL,
  `id_detail_histoire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `stat_personnage`
--

CREATE TABLE `stat_personnage` (
  `id_stat_personnage` int(11) NOT NULL,
  `id_ref_stat` int(11) NOT NULL,
  `valeur` int(11) NOT NULL,
  `id_ref_stat_appartenir` int(11) NOT NULL,
  `id_personnage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `detail_histoire`
--
ALTER TABLE `detail_histoire`
  ADD PRIMARY KEY (`id_detail_histoire`),
  ADD KEY `detail_histoire_histoire_FK` (`id_histoire`);

--
-- Index pour la table `equipement`
--
ALTER TABLE `equipement`
  ADD PRIMARY KEY (`id_equipement`);

--
-- Index pour la table `heroes`
--
ALTER TABLE `heroes`
  ADD PRIMARY KEY (`id_heroes`);

--
-- Index pour la table `heroes_histoire`
--
ALTER TABLE `heroes_histoire`
  ADD PRIMARY KEY (`id_heroes`,`id_histoire`),
  ADD KEY `heroes_histoire_histoire0_FK` (`id_histoire`);

--
-- Index pour la table `histoire`
--
ALTER TABLE `histoire`
  ADD PRIMARY KEY (`id_histoire`);

--
-- Index pour la table `inventaire`
--
ALTER TABLE `inventaire`
  ADD PRIMARY KEY (`id_inventaire`);

--
-- Index pour la table `inventaire_objet`
--
ALTER TABLE `inventaire_objet`
  ADD PRIMARY KEY (`id_inventaire`,`id_ref_objet`);

--
-- Index pour la table `personnage`
--
ALTER TABLE `personnage`
  ADD PRIMARY KEY (`id_personnage`),
  ADD KEY `personnage_sauvegarde_FK` (`id_sauvegarde`),
  ADD KEY `personnage_histoire0_FK` (`id_histoire`),
  ADD KEY `personnage_heroes1_FK` (`id_heroes`);

--
-- Index pour la table `ref_equipement`
--
ALTER TABLE `ref_equipement`
  ADD PRIMARY KEY (`id_ref_equipement`);

--
-- Index pour la table `ref_objet`
--
ALTER TABLE `ref_objet`
  ADD PRIMARY KEY (`id_ref_objet`);

--
-- Index pour la table `ref_slot`
--
ALTER TABLE `ref_slot`
  ADD PRIMARY KEY (`id_ref_slot`);

--
-- Index pour la table `ref_stat`
--
ALTER TABLE `ref_stat`
  ADD PRIMARY KEY (`id_ref_stat`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Index pour la table `sauvegarde`
--
ALTER TABLE `sauvegarde`
  ADD PRIMARY KEY (`id_sauvegarde`),
  ADD KEY `sauvegarde_heroes_FK` (`id_heroes`),
  ADD KEY `sauvegarde_histoire0_FK` (`id_histoire`),
  ADD KEY `sauvegarde_detail_histoire1_FK` (`id_detail_histoire`);

--
-- Index pour la table `stat_personnage`
--
ALTER TABLE `stat_personnage`
  ADD PRIMARY KEY (`id_stat_personnage`,`id_ref_stat`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `detail_histoire`
--
ALTER TABLE `detail_histoire`
  MODIFY `id_detail_histoire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `heroes`
--
ALTER TABLE `heroes`
  MODIFY `id_heroes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `histoire`
--
ALTER TABLE `histoire`
  MODIFY `id_histoire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `personnage`
--
ALTER TABLE `personnage`
  MODIFY `id_personnage` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ref_equipement`
--
ALTER TABLE `ref_equipement`
  MODIFY `id_ref_equipement` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ref_objet`
--
ALTER TABLE `ref_objet`
  MODIFY `id_ref_objet` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ref_slot`
--
ALTER TABLE `ref_slot`
  MODIFY `id_ref_slot` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ref_stat`
--
ALTER TABLE `ref_stat`
  MODIFY `id_ref_stat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sauvegarde`
--
ALTER TABLE `sauvegarde`
  MODIFY `id_sauvegarde` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `detail_histoire`
--
ALTER TABLE `detail_histoire`
  ADD CONSTRAINT `detail_histoire_histoire_FK` FOREIGN KEY (`id_histoire`) REFERENCES `histoire` (`id_histoire`);

--
-- Contraintes pour la table `heroes_histoire`
--
ALTER TABLE `heroes_histoire`
  ADD CONSTRAINT `heroes_histoire_heroes_FK` FOREIGN KEY (`id_heroes`) REFERENCES `heroes` (`id_heroes`),
  ADD CONSTRAINT `heroes_histoire_histoire0_FK` FOREIGN KEY (`id_histoire`) REFERENCES `histoire` (`id_histoire`);

--
-- Contraintes pour la table `personnage`
--
ALTER TABLE `personnage`
  ADD CONSTRAINT `personnage_heroes1_FK` FOREIGN KEY (`id_heroes`) REFERENCES `heroes` (`id_heroes`),
  ADD CONSTRAINT `personnage_histoire0_FK` FOREIGN KEY (`id_histoire`) REFERENCES `histoire` (`id_histoire`),
  ADD CONSTRAINT `personnage_sauvegarde_FK` FOREIGN KEY (`id_sauvegarde`) REFERENCES `sauvegarde` (`id_sauvegarde`);

--
-- Contraintes pour la table `sauvegarde`
--
ALTER TABLE `sauvegarde`
  ADD CONSTRAINT `sauvegarde_detail_histoire1_FK` FOREIGN KEY (`id_detail_histoire`) REFERENCES `detail_histoire` (`id_detail_histoire`),
  ADD CONSTRAINT `sauvegarde_heroes_FK` FOREIGN KEY (`id_heroes`) REFERENCES `heroes` (`id_heroes`),
  ADD CONSTRAINT `sauvegarde_histoire0_FK` FOREIGN KEY (`id_histoire`) REFERENCES `histoire` (`id_histoire`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
