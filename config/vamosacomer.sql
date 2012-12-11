-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Mar 11 Décembre 2012 à 16:22
-- Version du serveur: 5.5.28
-- Version de PHP: 5.3.10-1ubuntu3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `picadametlesch5`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `zip` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=133 ;

-- --------------------------------------------------------

--
-- Structure de la table `emails`
--

CREATE TABLE IF NOT EXISTS `emails` (
  `email` varchar(200) NOT NULL DEFAULT '',
  `date` date NOT NULL DEFAULT '0000-00-00',
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `etapes`
--

CREATE TABLE IF NOT EXISTS `etapes` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `order` int(3) NOT NULL COMMENT 'ordre des étapes',
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `sound` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='séquences pour une recette' AUTO_INCREMENT=50 ;

-- --------------------------------------------------------

--
-- Structure de la table `etapes0`
--

CREATE TABLE IF NOT EXISTS `etapes0` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `order` int(3) NOT NULL COMMENT 'ordre des étapes',
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `sound` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `video` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='séquences pour une recette' AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Structure de la table `etapes_recettes`
--

CREATE TABLE IF NOT EXISTS `etapes_recettes` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `recette_id` int(12) NOT NULL,
  `etape_id` int(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='association recettes étapes' AUTO_INCREMENT=95 ;

-- --------------------------------------------------------

--
-- Structure de la table `glossaires`
--

CREATE TABLE IF NOT EXISTS `glossaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(250) NOT NULL DEFAULT '',
  `definition1` text NOT NULL,
  `definition2` text NOT NULL,
  `definition3` text NOT NULL,
  `definition4` text NOT NULL,
  `source` varchar(250) NOT NULL DEFAULT '',
  `type` enum('action','ustensile','ingredient','recette','autre') NOT NULL DEFAULT 'action',
  `image` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `libelle` (`libelle`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=513 ;

-- --------------------------------------------------------

--
-- Structure de la table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Structure de la table `ingredients`
--

CREATE TABLE IF NOT EXISTS `ingredients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(250) NOT NULL DEFAULT '',
  `typ` enum('Agneau','Bases','Boeuf','Cave','Céréales','Champignons','Crèmerie','Épicerie','Épices','Fines herbes','Fruits','Légumes','Légumineuses','Mollusques et crustacés','Pâtisserie','Poissons','Poissons de mer','Poissons eau douce','Porc','Veau','Volaille - gibier') NOT NULL DEFAULT 'Agneau',
  `unit` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '0',
  `kcal` decimal(11,3) NOT NULL DEFAULT '0.000',
  `price` decimal(11,3) NOT NULL DEFAULT '0.000',
  `img` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '0',
  `commissions` int(9) NOT NULL COMMENT 'reserve pour cet ingrédient',
  PRIMARY KEY (`id`),
  UNIQUE KEY `libelle` (`libelle`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=569 ;

-- --------------------------------------------------------

--
-- Structure de la table `ingredients_recettes`
--

CREATE TABLE IF NOT EXISTS `ingredients_recettes` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `ingredient_id` int(12) NOT NULL,
  `recette_id` int(12) NOT NULL,
  `quant` decimal(11,3) NOT NULL COMMENT 'quantité ingrédient',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='association recettes ingrédients' AUTO_INCREMENT=104 ;

-- --------------------------------------------------------

--
-- Structure de la table `ingredients_recettes00`
--

CREATE TABLE IF NOT EXISTS `ingredients_recettes00` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `ingredient_id` int(12) NOT NULL,
  `recette_id` int(12) NOT NULL,
  `quant` int(6) NOT NULL COMMENT 'quantité ingrédient',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='association recettes ingrédients' AUTO_INCREMENT=27 ;

-- --------------------------------------------------------

--
-- Structure de la table `invitations`
--

CREATE TABLE IF NOT EXISTS `invitations` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `invites` text COLLATE utf8_unicode_ci NOT NULL,
  `menu_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remarques` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='journal des repas et des invités' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `liens`
--

CREATE TABLE IF NOT EXISTS `liens` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `lib` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Structure de la table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descriptif` text NOT NULL,
  `prix` varchar(100) NOT NULL,
  `difficulte` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `saison_id` int(12) NOT NULL,
  `rem` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Structure de la table `menus_recettes`
--

CREATE TABLE IF NOT EXISTS `menus_recettes` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `menu_id` int(12) NOT NULL,
  `recette_id` int(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='association recettes - menus' AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Structure de la table `modecuissons`
--

CREATE TABLE IF NOT EXISTS `modecuissons` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `parent` int(3) NOT NULL,
  `lib` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rem` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

-- --------------------------------------------------------

--
-- Structure de la table `modecuissons_recettes`
--

CREATE TABLE IF NOT EXISTS `modecuissons_recettes` (
  `recette_id` int(12) NOT NULL,
  `modecuisson_id` int(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `orthographes`
--

CREATE TABLE IF NOT EXISTS `orthographes` (
  `orthographe` varchar(250) NOT NULL DEFAULT '',
  `aurtograf` varchar(250) NOT NULL DEFAULT '',
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `aurtograf` (`aurtograf`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Structure de la table `recettes`
--

CREATE TABLE IF NOT EXISTS `recettes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(4) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `temps` text NOT NULL,
  `ingr` longtext NOT NULL,
  `pers` tinyint(2) NOT NULL DEFAULT '0',
  `type_id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `prep` longtext NOT NULL,
  `date` date NOT NULL DEFAULT '0000-00-00',
  `score` tinyint(4) NOT NULL DEFAULT '0',
  `source` text NOT NULL,
  `pict` text NOT NULL,
  `private` tinyint(1) NOT NULL DEFAULT '0',
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `titre` (`titre`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9838 ;

-- --------------------------------------------------------

--
-- Structure de la table `recettes_orthographe`
--

CREATE TABLE IF NOT EXISTS `recettes_orthographe` (
  `orthographe` varchar(250) NOT NULL DEFAULT '',
  `aurtograf` varchar(250) NOT NULL DEFAULT '',
  UNIQUE KEY `aurtograf` (`aurtograf`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `recettes_saisons`
--

CREATE TABLE IF NOT EXISTS `recettes_saisons` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `recette_id` int(12) NOT NULL,
  `saison_id` int(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='association recettes saisons' AUTO_INCREMENT=20 ;

-- --------------------------------------------------------

--
-- Structure de la table `recettes_ustensiles`
--

CREATE TABLE IF NOT EXISTS `recettes_ustensiles` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `recette_id` int(12) NOT NULL,
  `ustensile_id` int(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='association recettes - ustensiles' AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Structure de la table `restaurants`
--

CREATE TABLE IF NOT EXISTS `restaurants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `adresse` text,
  `tel` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `rem` text NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `saisons`
--

CREATE TABLE IF NOT EXISTS `saisons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `saison` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Structure de la table `stats`
--

CREATE TABLE IF NOT EXISTS `stats` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `recette_id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(255) NOT NULL,
  `password` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `role` varchar(50) DEFAULT 'www',
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `dateIn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

-- --------------------------------------------------------

--
-- Structure de la table `ustensiles`
--

CREATE TABLE IF NOT EXISTS `ustensiles` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `groupe` varchar(255) COLLATE utf8_bin NOT NULL,
  `lib` varchar(255) CHARACTER SET latin1 NOT NULL,
  `img` varchar(255) COLLATE utf8_bin NOT NULL,
  `note` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='table des ustensiles de cuisine' AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Structure de la table `vins_cepages`
--

CREATE TABLE IF NOT EXISTS `vins_cepages` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `cepage` varchar(250) NOT NULL DEFAULT '',
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

-- --------------------------------------------------------

--
-- Structure de la table `vins_millesimes`
--

CREATE TABLE IF NOT EXISTS `vins_millesimes` (
  `an` varchar(6) NOT NULL DEFAULT '0',
  `millesime` tinyint(4) NOT NULL DEFAULT '0',
  `vin_type_id` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `vins_types`
--

CREATE TABLE IF NOT EXISTS `vins_types` (
  `id` varchar(50) NOT NULL DEFAULT '',
  `libelle` text NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
