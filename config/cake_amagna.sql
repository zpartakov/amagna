-- MySQL dump 10.13  Distrib 5.5.32, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: cake_amagna
-- ------------------------------------------------------
-- Server version	5.5.32-0ubuntu0.12.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `activities`
--

DROP TABLE IF EXISTS `activities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activities` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `user_browser` varchar(255) NOT NULL,
  `user_ip` varchar(15) NOT NULL,
  `user_id` varchar(15) NOT NULL,
  `user_accessed` datetime NOT NULL,
  `referer` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=432 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `analyse_sites`
--

DROP TABLE IF EXISTS `analyse_sites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `analyse_sites` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `soft` varchar(255) COLLATE utf8_bin NOT NULL,
  `url` varchar(255) COLLATE utf8_bin NOT NULL,
  `rss` varchar(120) COLLATE utf8_bin NOT NULL,
  `lang` varchar(10) COLLATE utf8_bin NOT NULL,
  `calc_invites` varchar(255) COLLATE utf8_bin NOT NULL,
  `calc_ingredients` varchar(255) COLLATE utf8_bin NOT NULL,
  `formats` varchar(255) COLLATE utf8_bin NOT NULL,
  `langage` varchar(255) COLLATE utf8_bin NOT NULL,
  `glossaire` varchar(255) COLLATE utf8_bin NOT NULL,
  `icones` varchar(255) COLLATE utf8_bin NOT NULL,
  `graphisme` varchar(255) COLLATE utf8_bin NOT NULL,
  `audio` varchar(255) COLLATE utf8_bin NOT NULL,
  `video` varchar(255) COLLATE utf8_bin NOT NULL,
  `sequencage` varchar(255) COLLATE utf8_bin NOT NULL,
  `automatisation` varchar(255) COLLATE utf8_bin NOT NULL,
  `facilite` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_id` int(12) NOT NULL,
  `date_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `note` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='analyse de sites / logiciels de recettes de cuisine';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacts` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countries` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=133 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `countriesOLD`
--

DROP TABLE IF EXISTS `countriesOLD`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countriesOLD` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=133 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `emails`
--

DROP TABLE IF EXISTS `emails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emails` (
  `email` varchar(200) NOT NULL DEFAULT '',
  `date` date NOT NULL DEFAULT '0000-00-00',
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `etapes`
--

DROP TABLE IF EXISTS `etapes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `etapes` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `order` int(3) NOT NULL COMMENT 'ordre des étapes',
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `sound` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='séquences pour une recette';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `etapes0`
--

DROP TABLE IF EXISTS `etapes0`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `etapes0` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `order` int(3) NOT NULL COMMENT 'ordre des étapes',
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `sound` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `video` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='séquences pour une recette';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `etapes_ingredients`
--

DROP TABLE IF EXISTS `etapes_ingredients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `etapes_ingredients` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `ingredient_id` int(12) NOT NULL,
  `etape_id` int(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='association recettes étapes';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `etapes_recettes`
--

DROP TABLE IF EXISTS `etapes_recettes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `etapes_recettes` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `recette_id` int(12) NOT NULL,
  `etape_id` int(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=220 DEFAULT CHARSET=latin1 COMMENT='association recettes étapes';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `glossaires`
--

DROP TABLE IF EXISTS `glossaires`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `glossaires` (
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
) ENGINE=MyISAM AUTO_INCREMENT=518 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ilikerecipes`
--

DROP TABLE IF EXISTS `ilikerecipes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ilikerecipes` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(15) NOT NULL,
  `user_accessed` datetime NOT NULL,
  `recette_id` int(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ingredients`
--

DROP TABLE IF EXISTS `ingredients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ingredients` (
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
) ENGINE=MyISAM AUTO_INCREMENT=583 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ingredients_recettes`
--

DROP TABLE IF EXISTS `ingredients_recettes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ingredients_recettes` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `ingredient_id` int(12) NOT NULL,
  `recette_id` int(12) NOT NULL,
  `quant` decimal(11,3) NOT NULL COMMENT 'quantité ingrédient',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=198 DEFAULT CHARSET=latin1 COMMENT='association recettes ingrédients';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `invitations`
--

DROP TABLE IF EXISTS `invitations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invitations` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `invites` text COLLATE utf8_unicode_ci NOT NULL,
  `menu_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remarques` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='journal des repas et des invités';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `lespages`
--

DROP TABLE IF EXISTS `lespages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lespages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `introtext` mediumtext NOT NULL,
  `fulltext` mediumtext NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `images` text NOT NULL,
  `urls` text NOT NULL,
  `metadesc` text NOT NULL,
  `featured` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'Set if article is featured.',
  `language` char(7) NOT NULL COMMENT 'The language code for the article.',
  PRIMARY KEY (`id`),
  KEY `idx_featured_catid` (`featured`),
  KEY `idx_language` (`language`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `liens`
--

DROP TABLE IF EXISTS `liens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `liens` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `lib` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus` (
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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `menus_recettes`
--

DROP TABLE IF EXISTS `menus_recettes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus_recettes` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `menu_id` int(12) NOT NULL,
  `recette_id` int(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1 COMMENT='association recettes - menus';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `modecuissons`
--

DROP TABLE IF EXISTS `modecuissons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modecuissons` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `parent` int(3) NOT NULL,
  `lib` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rem` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `modecuissons00`
--

DROP TABLE IF EXISTS `modecuissons00`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modecuissons00` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `parent` int(3) NOT NULL,
  `lib` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rem` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `modecuissons_recettes`
--

DROP TABLE IF EXISTS `modecuissons_recettes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modecuissons_recettes` (
  `recette_id` int(12) NOT NULL,
  `modecuisson_id` int(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `orthographes`
--

DROP TABLE IF EXISTS `orthographes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orthographes` (
  `orthographe` varchar(250) NOT NULL DEFAULT '',
  `aurtograf` varchar(250) NOT NULL DEFAULT '',
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `aurtograf` (`aurtograf`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `recettes`
--

DROP TABLE IF EXISTS `recettes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recettes` (
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
) ENGINE=MyISAM AUTO_INCREMENT=9850 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `recettes_orthographe`
--

DROP TABLE IF EXISTS `recettes_orthographe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recettes_orthographe` (
  `orthographe` varchar(250) NOT NULL DEFAULT '',
  `aurtograf` varchar(250) NOT NULL DEFAULT '',
  UNIQUE KEY `aurtograf` (`aurtograf`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `recettes_saisons`
--

DROP TABLE IF EXISTS `recettes_saisons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recettes_saisons` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `recette_id` int(12) NOT NULL,
  `saison_id` int(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1 COMMENT='association recettes saisons';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `recettes_ustensiles`
--

DROP TABLE IF EXISTS `recettes_ustensiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recettes_ustensiles` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `recette_id` int(12) NOT NULL,
  `ustensile_id` int(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1 COMMENT='association recettes - ustensiles';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `saisons`
--

DROP TABLE IF EXISTS `saisons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `saisons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `saison` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `stats`
--

DROP TABLE IF EXISTS `stats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stats` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `recette_id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `stopwords`
--

DROP TABLE IF EXISTS `stopwords`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stopwords` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `lib` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `lib` (`lib`)
) ENGINE=MyISAM AUTO_INCREMENT=550 DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `types` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
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
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ustensiles`
--

DROP TABLE IF EXISTS `ustensiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ustensiles` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `groupe` varchar(255) COLLATE utf8_bin NOT NULL,
  `lib` varchar(255) CHARACTER SET latin1 NOT NULL,
  `img` varchar(255) COLLATE utf8_bin NOT NULL,
  `note` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='table des ustensiles de cuisine';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `vins_cepages`
--

DROP TABLE IF EXISTS `vins_cepages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vins_cepages` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `cepage` varchar(250) NOT NULL DEFAULT '',
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `vins_millesimes`
--

DROP TABLE IF EXISTS `vins_millesimes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vins_millesimes` (
  `an` varchar(6) NOT NULL DEFAULT '0',
  `millesime` tinyint(4) NOT NULL DEFAULT '0',
  `vin_type_id` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `vins_types`
--

DROP TABLE IF EXISTS `vins_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vins_types` (
  `id` varchar(50) NOT NULL DEFAULT '',
  `libelle` text NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-10-12 17:16:38
