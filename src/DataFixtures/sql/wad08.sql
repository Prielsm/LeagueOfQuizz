-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 20 mai 2021 à 08:07
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `wad08`
--

-- --------------------------------------------------------

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
(1, 'Choix multiples'),
(2, 'Qui-est-ce'),
(3, 'Vrai ou Faux');

-- --------------------------------------------------------

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`id`, `title`, `category_id`) VALUES
(1, 'Quel champion est le: \"Veilleur Lugubre\" ?', 1),
(2, 'Akali, Shen et Kennen font tous trois partie de :', 1),
(3, 'Quel est le nom de l ulti à Khartus ?', 1),
(4, 'Qui a un skin Hot Rod ?', 1),
(5, 'Combien de boules tournent autour d`Aurelion Sol ?', 1),
(6, 'Combien de stacks de R Cho`Gath peut acquérir en ne mangeant que des creeps ?', 1),
(7, 'Quel sort d`Ahri applique un fear ?', 1),
(8, 'A combien de stacks de Mejai l`item nous donne de la vitesse de déplacement ?', 1),
(9, 'Quel champion a la plus grande vitesse de déplacement de base au lvl 18 ?', 1),
(10, 'Quel item du jeu est le plus cher ?', 1);

-- --------------------------------------------------------

--
-- Déchargement des données de la table `answer`
--

INSERT INTO `answer` (`id`, `title`, `status`, `question_id`) VALUES
(1, 'Malzahar', 0, 1),
(2, 'Ryze', 0, 1),
(3, 'Galio', 1, 1),
(4, 'Kog`Maw', 0, 1),
(5, 'La trinité des forces', 0, 2),
(6, 'L`Ordre Kinkou', 1, 2),
(7, 'L`équipe des Ninjas Légendaires', 0, 2),
(8, 'Forces des Ombres', 0, 2),
(9, 'Requiem', 1, 3),
(10, 'Voile Mortel', 0, 3),
(11, 'Apocalypse', 0, 3),
(12, 'Ravage', 0, 3),
(13, 'Blitzcrank', 0, 4),
(14, 'Mordekaiser', 0, 4),
(15, 'Rammus', 0, 4),
(16, 'Corki', 1, 4),
(17, '3', 1, 5),
(18, '4', 0, 5),
(19, '5', 0, 5),
(20, '2', 0, 5),
(21, '5', 0, 6),
(22, '6', 1, 6),
(23, '7', 0, 6),
(24, '8', 0, 6),
(25, 'Le Q', 0, 7),
(26, 'Le E', 0, 7),
(27, 'Le Z', 0, 7),
(28, 'Aucun', 1, 7),
(29, '10', 1, 8),
(30, '15', 0, 8),
(31, '25', 0, 8),
(32, '20', 0, 8),
(33, 'Cassiopea', 1, 9),
(34, 'Maitre Yi', 0, 9),
(35, 'Hecarim', 0, 9),
(36, 'Elise', 0, 9),
(37, 'Tueur de Krakens', 0, 10),
(38, 'Force de la trinité', 0, 10),
(39, 'Rancune de Serylda', 0, 10),
(40, 'Coiffe de Rabadon', 1, 10);

-- --------------------------------------------------------

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `pseudo`, `access`, `password`) VALUES
(1, 'manon.priels@gmail.com', 'Manon', 'player', '$2y$13$ct13ItMGtHEAe7DPdHBYcOByXw/GNF5sd8BtmaP3gt0ayQqPgS7ke'),
(2, 'manon.prielss@gmail.com', 'ManonAdmin', 'admin', '$2y$13$3fNlW8wmIPYabyzw03rVd.L2/nZzqWrLQsTMq.cZ5dGDxp6R2uqM6');

-- --------------------------------------------------------

--
-- Déchargement des données de la table `game`
--

INSERT INTO `game` (`id`, `user_id`, `type`, `score`, `user_point`, `created_at`) VALUES
(1, 2, 'normal', 2, 0, '2021-05-20 07:59:42'),
(2, 2, 'normal', 3, 0, '2021-05-20 08:00:12');






/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
