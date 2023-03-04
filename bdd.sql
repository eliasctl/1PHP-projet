-- phpMyAdmin SQL Dump
-- version 5.1.4deb1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : sam. 25 fév. 2023 à 22:44
-- Version du serveur : 8.0.32-0ubuntu0.22.10.2
-- Version de PHP : 8.1.7-1ubuntu3.2
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET
  time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;

/*!40101 SET NAMES utf8mb4 */
;

--
-- Base de données : `1php`
--
-- --------------------------------------------------------
--
-- Structure de la table `utilisateurs`
--
CREATE TABLE `utilisateurs` (
  `id` int NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

-- --------------------------------------------------------
--
-- Structure de la table `videos`
--
CREATE TABLE `videos` (
  `id` int NOT NULL,
  `cathegorie` varchar(30) NOT NULL,
  `annee` year NOT NULL,
  `titre` varchar(255) NOT NULL,
  `realisateur` varchar(255) NOT NULL,
  `acteurs` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `prix` int NOT NULL,
  `spoiler` varchar(255) NOT NULL,
  `telechargement` varchar(255) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;

--
-- Index pour les tables déchargées
--
--
-- Index pour la table `videos`
--
ALTER TABLE
  `videos`
ADD
  PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--
--
-- AUTO_INCREMENT pour la table `videos`
--
ALTER TABLE
  `videos`
MODIFY
  `id` int NOT NULL AUTO_INCREMENT;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;

/* 8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918 */