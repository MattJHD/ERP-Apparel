-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 01 Mai 2017 à 15:18
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `apparel`
--

-- --------------------------------------------------------

--
-- Structure de la table `apparel_article`
--

CREATE TABLE IF NOT EXISTS `apparel_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_id` int(11) DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `solded` tinyint(1) NOT NULL,
  `sold_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sold_at` datetime NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_B085138C4D16C4DD` (`shop_id`),
  UNIQUE KEY `UNIQ_B085138C44F5D008` (`brand_id`),
  UNIQUE KEY `UNIQ_B085138C12469DE2` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `apparel_article`
--

INSERT INTO `apparel_article` (`id`, `brand_id`, `shop_id`, `name`, `price`, `size`, `solded`, `sold_by`, `sold_at`, `category_id`) VALUES
(2, NULL, NULL, 'Test article', 42, 'M', 2, 'Sara', '2017-04-05 00:00:00', NULL),
(3, NULL, NULL, 'article 2', 150, 'S', 3, 'John', '2017-04-03 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `apparel_brand`
--

CREATE TABLE IF NOT EXISTS `apparel_brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `apparel_brand`
--

INSERT INTO `apparel_brand` (`id`, `name`) VALUES
(1, 'Zara'),
(2, 'Desigual'),
(3, 'Lacoste'),
(4, 'Armani'),
(5, 'Mango');

-- --------------------------------------------------------

--
-- Structure de la table `apparel_category`
--

CREATE TABLE IF NOT EXISTS `apparel_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `apparel_category`
--

INSERT INTO `apparel_category` (`id`, `name`) VALUES
(2, 'Jeans'),
(3, 'Pulls'),
(4, 'Jewels'),
(5, 'Scarfs');

-- --------------------------------------------------------

--
-- Structure de la table `apparel_color`
--

CREATE TABLE IF NOT EXISTS `apparel_color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Contenu de la table `apparel_color`
--

INSERT INTO `apparel_color` (`id`, `name`) VALUES
(1, 'Red'),
(2, 'Blue'),
(3, 'Green'),
(4, 'Yellow'),
(5, 'Black'),
(6, 'White'),
(7, 'Pink');

-- --------------------------------------------------------

--
-- Structure de la table `apparel_group`
--

CREATE TABLE IF NOT EXISTS `apparel_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Structure de la table `apparel_material`
--

CREATE TABLE IF NOT EXISTS `apparel_material` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `apparel_material`
--

INSERT INTO `apparel_material` (`id`, `name`) VALUES
(1, 'Silk'),
(2, 'Cotton'),
(3, 'Wool'),
(4, 'Denim');

-- --------------------------------------------------------

--
-- Structure de la table `apparel_operation`
--

CREATE TABLE IF NOT EXISTS `apparel_operation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `privilege_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_DE16636D32FB8AEA` (`privilege_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Structure de la table `apparel_privilege`
--

CREATE TABLE IF NOT EXISTS `apparel_privilege` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_40B75F87D60322AC` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Structure de la table `apparel_resource`
--

CREATE TABLE IF NOT EXISTS `apparel_resource` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `privilege_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_FCFC406D32FB8AEA` (`privilege_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Structure de la table `apparel_role`
--

CREATE TABLE IF NOT EXISTS `apparel_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `isactive` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_B7F1E7A0FE54D947` (`group_id`),
  UNIQUE KEY `UNIQ_B7F1E7A0A76ED395` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Structure de la table `apparel_shop`
--

CREATE TABLE IF NOT EXISTS `apparel_shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `localisation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `apparel_shop`
--

INSERT INTO `apparel_shop` (`id`, `name`, `localisation`) VALUES
(3, 'Shop1', 'Paris'),
(4, 'Shop2', 'Toulouse');

-- --------------------------------------------------------

--
-- Structure de la table `apparel_user`
--

CREATE TABLE IF NOT EXISTS `apparel_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `function` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_creation` datetime NOT NULL,
  `isactive` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `apparel_user`
--

INSERT INTO `apparel_user` (`id`, `name`, `firstname`, `login`, `password`, `email`, `phone`, `function`, `date_creation`, `isactive`) VALUES
(3, 'Smith', 'Sara', 'SS', 'testpwd', 'ss@test.com', 606060606, 'Manager', '2017-05-01 00:00:00', 1),
(4, 'Doe', 'John', 'JD', 'testpwd2', 'jd@test.com', 707070707, 'Employe', '2017-05-01 00:00:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `article_color`
--

CREATE TABLE IF NOT EXISTS `article_color` (
  `article_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  PRIMARY KEY (`article_id`,`color_id`),
  KEY `IDX_11E13AF87294869C` (`article_id`),
  KEY `IDX_11E13AF87ADA1FB5` (`color_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `article_material`
--

CREATE TABLE IF NOT EXISTS `article_material` (
  `article_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  PRIMARY KEY (`article_id`,`material_id`),
  KEY `IDX_295681FE7294869C` (`article_id`),
  KEY `IDX_295681FEE308AC6F` (`material_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `group_user`
--

CREATE TABLE IF NOT EXISTS `group_user` (
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`group_id`,`user_id`),
  KEY `IDX_A4C98D39FE54D947` (`group_id`),
  KEY `IDX_A4C98D39A76ED395` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shop_user`
--

CREATE TABLE IF NOT EXISTS `shop_user` (
  `shop_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`shop_id`,`user_id`),
  KEY `IDX_4C6130324D16C4DD` (`shop_id`),
  KEY `IDX_4C613032A76ED395` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `apparel_article`
--
ALTER TABLE `apparel_article`
  ADD CONSTRAINT `FK_B085138C12469DE2` FOREIGN KEY (`category_id`) REFERENCES `apparel_category` (`id`),
  ADD CONSTRAINT `FK_B085138C44F5D008` FOREIGN KEY (`brand_id`) REFERENCES `apparel_brand` (`id`),
  ADD CONSTRAINT `FK_B085138C4D16C4DD` FOREIGN KEY (`shop_id`) REFERENCES `apparel_shop` (`id`);

--
-- Contraintes pour la table `apparel_operation`
--
ALTER TABLE `apparel_operation`
  ADD CONSTRAINT `FK_DE16636D32FB8AEA` FOREIGN KEY (`privilege_id`) REFERENCES `apparel_privilege` (`id`);

--
-- Contraintes pour la table `apparel_privilege`
--
ALTER TABLE `apparel_privilege`
  ADD CONSTRAINT `FK_40B75F87D60322AC` FOREIGN KEY (`role_id`) REFERENCES `apparel_role` (`id`);

--
-- Contraintes pour la table `apparel_resource`
--
ALTER TABLE `apparel_resource`
  ADD CONSTRAINT `FK_FCFC406D32FB8AEA` FOREIGN KEY (`privilege_id`) REFERENCES `apparel_privilege` (`id`);

--
-- Contraintes pour la table `apparel_role`
--
ALTER TABLE `apparel_role`
  ADD CONSTRAINT `FK_B7F1E7A0A76ED395` FOREIGN KEY (`user_id`) REFERENCES `apparel_user` (`id`),
  ADD CONSTRAINT `FK_B7F1E7A0FE54D947` FOREIGN KEY (`group_id`) REFERENCES `apparel_group` (`id`);

--
-- Contraintes pour la table `article_color`
--
ALTER TABLE `article_color`
  ADD CONSTRAINT `FK_11E13AF87294869C` FOREIGN KEY (`article_id`) REFERENCES `apparel_article` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_11E13AF87ADA1FB5` FOREIGN KEY (`color_id`) REFERENCES `apparel_color` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `article_material`
--
ALTER TABLE `article_material`
  ADD CONSTRAINT `FK_295681FE7294869C` FOREIGN KEY (`article_id`) REFERENCES `apparel_article` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_295681FEE308AC6F` FOREIGN KEY (`material_id`) REFERENCES `apparel_material` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `group_user`
--
ALTER TABLE `group_user`
  ADD CONSTRAINT `FK_A4C98D39A76ED395` FOREIGN KEY (`user_id`) REFERENCES `apparel_user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_A4C98D39FE54D947` FOREIGN KEY (`group_id`) REFERENCES `apparel_group` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `shop_user`
--
ALTER TABLE `shop_user`
  ADD CONSTRAINT `FK_4C6130324D16C4DD` FOREIGN KEY (`shop_id`) REFERENCES `apparel_shop` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_4C613032A76ED395` FOREIGN KEY (`user_id`) REFERENCES `apparel_user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
