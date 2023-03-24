-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 24 Mars 2023 à 16:42
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `ecf-backend`
--

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `topic_id` int(11) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `profile_pic` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=89 ;

--
-- Contenu de la table `posts`
--

INSERT INTO `posts` (`id`, `content`, `username`, `topic_id`, `created_at`, `profile_pic`) VALUES
(73, 'lle reveiller le matin en se collant a lui ', 'kevin', 8, '2023-03-24 15:07:37', ''),
(79, 'miauler sans cesse', 'loic', 8, '2023-03-24 15:26:34', ''),
(81, 'attendre qu''ils ouvre la fenetre et hop ! ', 'loic', 13, '2023-03-24 15:26:57', ''),
(83, 's''assoir sur sa tete pour le reveiller', 'loicD', 8, '2023-03-24 15:34:43', ''),
(84, 's''assoir sur sa tete pour le reveiller', 'loicD', 8, '2023-03-24 15:34:47', ''),
(85, 'attendre qu''ils sortent de la maison pour s''echapper rapidement', 'loicD', 13, '2023-03-24 15:35:18', ''),
(86, 'attendre qu''ils sortent de la maison pour s''echapper rapidement', 'loicD', 13, '2023-03-24 15:35:20', ''),
(87, 'petition en ligne pour interdire aux humains d''avoir des chiens ', 'loicD', 16, '2023-03-24 15:35:47', ''),
(88, 'petition en ligne pour interdire aux humains d''avoir des chiens ', 'loicD', 16, '2023-03-24 15:35:50', '');

-- --------------------------------------------------------

--
-- Structure de la table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `topics`
--

INSERT INTO `topics` (`id`, `subject`, `content`, `username`, `created_at`) VALUES
(8, 'Comment embÃªter son humain ?', 'mettez vos idÃ©es et astuces en commentaire !', 'AnonyCat', '2023-03-24 10:18:44'),
(13, 'Comment s''Ã©chapper de la maison ', 'petit topics pour que vous donniez vos tips les cats !', '', '2023-03-24 15:21:34'),
(16, 'Les chiens ðŸ™„', 'les mechants', 'kevin', '2023-03-24 15:25:05'),
(17, 'topic test', 'test ðŸ˜', 'greta', '2023-03-24 15:36:15');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created_at`) VALUES
(12, 'kevin', '$2y$10$GbyYw.sWUC8.mZcTatFFveYuBD11HjvU2sQO4yjkB.s/bqHIbBK2K', 'kevin@gmail.com', '2023-03-24 14:53:33'),
(13, 'loic', '$2y$10$98Reu.IpZTHeBB5NdiBq3uIDPq2dZy.6Hj4Zw/UOsX8i0.riH0zB2', 'loic@gmail.com', '2023-03-24 15:26:11'),
(14, 'loicD', '$2y$10$ZlUNiI2Tgjd2KT5VrLtLD.O8W0Z9TcEXy8hSbTaUtgUx53LmLV7Ha', 'loicD@gmail.com', '2023-03-24 15:34:10'),
(15, 'dzqdzq', '$2y$10$Y1U3tUPyo47on42rZYxP5.78sQmfGwPXe5elm3TXCAE1z0V/htgSq', 'dzqdzq@gmail.com', '2023-03-24 15:37:43');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
