-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Mer 20 Mars 2013 à 18:21
-- Version du serveur: 5.5.29
-- Version de PHP: 5.3.10-1ubuntu3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `socialfood`
--

-- --------------------------------------------------------

--
-- Structure de la table `fo_announces`
--

CREATE TABLE IF NOT EXISTS `fo_announces` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `place` varchar(45) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `recipes_id` int(11) DEFAULT NULL,
  `recipe` text,
  PRIMARY KEY (`id`),
  KEY `fk_fo_announces_fo_recipes1` (`recipes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `fo_comments`
--

CREATE TABLE IF NOT EXISTS `fo_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text,
  `recipes_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_fo_comments_fo_recipes1` (`recipes_id`),
  KEY `fk_fo_comments_fo_users1` (`users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `fo_commments_photos`
--

CREATE TABLE IF NOT EXISTS `fo_commments_photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photos_id` int(11) NOT NULL,
  `comment` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `level` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_fo_commments_photos_fo_photos1` (`photos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `fo_likes`
--

CREATE TABLE IF NOT EXISTS `fo_likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `photos_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_fo_likes_fo_photos1` (`photos_id`),
  KEY `fk_fo_likes_fo_users1` (`users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `fo_messages`
--

CREATE TABLE IF NOT EXISTS `fo_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_fo_messages_fo_users1` (`from`),
  KEY `fk_fo_messages_fo_users2` (`to`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `fo_photos`
--

CREATE TABLE IF NOT EXISTS `fo_photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo` varchar(45) DEFAULT NULL,
  `like` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_fo_photos_fo_users1` (`users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `fo_profiles`
--

CREATE TABLE IF NOT EXISTS `fo_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `avatar` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `zip` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `description` tinytext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_fo_profiles_fo_users` (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `fo_profiles`
--

INSERT INTO `fo_profiles` (`id`, `avatar`, `address`, `zip`, `city`, `created`, `modified`, `users_id`, `description`) VALUES
(3, 'plop', '4, rue marc sangnier', '33400', 'Talence', '2013-03-20 17:45:08', '2013-03-20 18:15:14', 6, 'just fine');

-- --------------------------------------------------------

--
-- Structure de la table `fo_recipes`
--

CREATE TABLE IF NOT EXISTS `fo_recipes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `recipe` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_fo_recipes_fo_users1` (`users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `fo_recipes_likes`
--

CREATE TABLE IF NOT EXISTS `fo_recipes_likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `recipes_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_fo_recipes_likes_fo_recipes1` (`recipes_id`),
  KEY `fk_fo_recipes_likes_fo_users1` (`users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `fo_subscribers`
--

CREATE TABLE IF NOT EXISTS `fo_subscribers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `announces_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_fo_subscribers_fo_announces1` (`announces_id`),
  KEY `fk_fo_subscribers_fo_users1` (`users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `fo_users`
--

CREATE TABLE IF NOT EXISTS `fo_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `online` tinyint(4) NOT NULL DEFAULT '0',
  `role` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `fo_users`
--

INSERT INTO `fo_users` (`id`, `username`, `email`, `password`, `firstname`, `lastname`, `created`, `modified`, `birthday`, `online`, `role`) VALUES
(6, 'thod', 'bjorne@live.fr', 'cf64bc8d9eaa9ad72cf12d7c7858c8b70150217b', 'Thierno', 'Bah', '2013-03-20 17:45:08', '2013-03-20 17:45:08', '2013-03-20 17:42:00', 1, 'author');

-- --------------------------------------------------------

--
-- Structure de la table `fo_videos`
--

CREATE TABLE IF NOT EXISTS `fo_videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `video` varchar(45) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_fo_videos_fo_users1` (`users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `fo_announces`
--
ALTER TABLE `fo_announces`
  ADD CONSTRAINT `fk_fo_announces_fo_recipes1` FOREIGN KEY (`recipes_id`) REFERENCES `fo_recipes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `fo_comments`
--
ALTER TABLE `fo_comments`
  ADD CONSTRAINT `fk_fo_comments_fo_recipes1` FOREIGN KEY (`recipes_id`) REFERENCES `fo_recipes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_fo_comments_fo_users1` FOREIGN KEY (`users_id`) REFERENCES `fo_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `fo_commments_photos`
--
ALTER TABLE `fo_commments_photos`
  ADD CONSTRAINT `fk_fo_commments_photos_fo_photos1` FOREIGN KEY (`photos_id`) REFERENCES `fo_photos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `fo_likes`
--
ALTER TABLE `fo_likes`
  ADD CONSTRAINT `fk_fo_likes_fo_photos1` FOREIGN KEY (`photos_id`) REFERENCES `fo_photos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_fo_likes_fo_users1` FOREIGN KEY (`users_id`) REFERENCES `fo_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `fo_messages`
--
ALTER TABLE `fo_messages`
  ADD CONSTRAINT `fk_fo_messages_fo_users1` FOREIGN KEY (`from`) REFERENCES `fo_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_fo_messages_fo_users2` FOREIGN KEY (`to`) REFERENCES `fo_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `fo_photos`
--
ALTER TABLE `fo_photos`
  ADD CONSTRAINT `fk_fo_photos_fo_users1` FOREIGN KEY (`users_id`) REFERENCES `fo_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `fo_profiles`
--
ALTER TABLE `fo_profiles`
  ADD CONSTRAINT `fo_profiles_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `fo_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `fo_recipes`
--
ALTER TABLE `fo_recipes`
  ADD CONSTRAINT `fk_fo_recipes_fo_users1` FOREIGN KEY (`users_id`) REFERENCES `fo_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `fo_recipes_likes`
--
ALTER TABLE `fo_recipes_likes`
  ADD CONSTRAINT `fk_fo_recipes_likes_fo_recipes1` FOREIGN KEY (`recipes_id`) REFERENCES `fo_recipes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_fo_recipes_likes_fo_users1` FOREIGN KEY (`users_id`) REFERENCES `fo_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `fo_subscribers`
--
ALTER TABLE `fo_subscribers`
  ADD CONSTRAINT `fk_fo_subscribers_fo_announces1` FOREIGN KEY (`announces_id`) REFERENCES `fo_announces` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_fo_subscribers_fo_users1` FOREIGN KEY (`users_id`) REFERENCES `fo_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `fo_videos`
--
ALTER TABLE `fo_videos`
  ADD CONSTRAINT `fk_fo_videos_fo_users1` FOREIGN KEY (`users_id`) REFERENCES `fo_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
