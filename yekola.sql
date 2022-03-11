-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 02 mars 2022 à 20:42
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `yekola`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `categorie` varchar(60) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `categorie`, `create_at`) VALUES
(1, 'Base de donnee', '2022-02-25 20:24:09');

-- --------------------------------------------------------

--
-- Structure de la table `ouvrages`
--

CREATE TABLE `ouvrages` (
  `id` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `auteur` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `livre` varchar(100) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ouvrages`
--

INSERT INTO `ouvrages` (`id`, `titre`, `auteur`, `description`, `photo`, `livre`, `categorie_id`, `users_id`, `create_at`) VALUES
(9, 'Expert Oracle Database', 'Sam L. Alapati', 'Bassanio counters that, in truth, Gratiano speaks too much: from two bushels of chaff, two\r\ngrains of wheat may be recovered. And that’s the raison d’être for this book: to separate the wheat\r\nfrom the chaff. This second part of the quotation is more apt when you consider the difficulty of\r\nextracting the right database management procedures from the tons of material available for the\r\nOracle Database 10g database. Oracle Corporation publishes copious material to help you manage\r\nits increasingly complex databases. Oracle Corporation also conducts a variety of in-person and\r\nWeb-based classes to explain the vast amount of subject matter that you need to understand to\r\neffectively work with the Oracle database today. Yet users will have a good deal of difficulty finding\r\nthe essential material for performing their jobs if they rely exclusively on Oracle’s voluminous\r\n(albeit well-written) material in the form of manuals, class notes, Web-based seminars, and so on.', 'affiche/pexels-pixabay-33688.jpg', 'pdf/Apress - Oracle 10g Admin Ebook.pdf', 1, 1, '2022-02-25 20:32:31'),
(10, 'Triggers et vues matérialisées (MySQL)', 'Lord Casque Noir', 'Un déclencheur (TRIGGER) spécifie que la base de données doit exécuter automatiquement une fonction donnée chaque fois\r\nqu\'un certain type d\'opération est exécuté. Les fonctions déclencheurs peuvent être définies pour s\'exécuter avant ou après\r\nune commande INSERT, UPDATE ou DELETE, soit une fois par ligne modifiée, soit une fois par expression SQL.', 'affiche/pexels-travis-blessing-1363876.jpg', 'pdf/227634-triggers-et-vues-materialisees-mysql.pdf', 1, 1, '2022-02-25 20:35:43'),
(11, 'Administrez vos bases de données avec MySQL', 'Chantal Gribaumont (Taguan)', 'Un Système de Gestion de Base de Données (SGBD) est un logiciel (ou un ensemble de logiciels) permettant de manipuler les données d\'une base de données. Manipuler, c\'est-à-dire sélectionner et afficher des informations tirées de cette base, modifier des données, en ajouter ou en supprimer (ce groupe de quatre opérations étant souvent appelé \"CRUD\", pour Create, Read, Update, Delete). MySQL est un système de gestion de bases de données.', 'affiche/pexels-pixabay-33545.jpg', 'pdf/[SITE DU ZERO] mysql site du zero.pdf', 1, 1, '2022-02-25 20:41:16'),
(12, 'système d’information et bases de données', 'MVIBUDULU KALUYIT Alphonse', 'Un système peut être défini comme:\r\n- Un ensemble d’éléments en interaction dynamique organisé en fonction d’un but;\r\n- Un ensemble d’objets et de relations entre ces objets et entre les attributs\r\n- Quelque chose qui fait (n’importe quoi) quelque chose (une activité) qui dote d’une\r\nstructure, qui évolue dans le temps dans un environnement pour quelque chose.\r\nApplique ces définitions aux entreprises, nous disons qu’une entreprise constitue un system\r\nayant des éléments d’entrée et de sortie ainsi que les éléments de transformation en interaction\r\nen vue de la réalisation d’un objectif prédéfini.', 'affiche/pexels-pixabay-206359.jpg', 'pdf/SGBD_G2_INFO_2015 Orginal.pdf', 1, 1, '2022-02-25 20:44:15');

-- --------------------------------------------------------

--
-- Structure de la table `telechargements`
--

CREATE TABLE `telechargements` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `ouvrages_id` varchar(60) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `telechargements`
--

INSERT INTO `telechargements` (`id`, `users_id`, `ouvrages_id`, `create_at`) VALUES
(1, 2, '9,10,11,12', '2022-03-02 19:40:47');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `prenom` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `password`, `status`, `create_at`) VALUES
(1, 'kanda', 'geedoo', 'kanda@gmail.com', '$2y$10$PPVNt9k9QrNOMMo3g9WYMuIjDo1/x8pqK6EeezxtUw40bFDPj5sJm', 1, '2022-02-28 21:25:11'),
(2, 'han nim', 'pacifique', 'hanpac@gmail.com', '$2y$10$y1Zr1WjL90avnk21pf4RMuAabJOQr48nOdPN3Mib3Xa7cyFrxejUq', 0, '2022-02-28 21:26:03');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ouvrages`
--
ALTER TABLE `ouvrages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `telechargements`
--
ALTER TABLE `telechargements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`,`ouvrages_id`);

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
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `ouvrages`
--
ALTER TABLE `ouvrages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `telechargements`
--
ALTER TABLE `telechargements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
