-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 05 Juin 2017 à 23:37
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
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `solded` tinyint(1) NOT NULL,
  `sold_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sold_at` datetime NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `on_website` tinyint(1) NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F7FD148E12469DE2` (`category_id`),
  KEY `IDX_F7FD148E44F5D008` (`brand_id`),
  KEY `IDX_F7FD148E4D16C4DD` (`shop_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Contenu de la table `apparel_article`
--

INSERT INTO `apparel_article` (`id`, `name`, `price`, `size`, `solded`, `sold_by`, `sold_at`, `category_id`, `brand_id`, `shop_id`, `on_website`, `link`) VALUES
(2, 'Manteau long Tailored coton', 42, 'M', 2, 'Sara', '2017-04-05 00:00:00', 3, NULL, NULL, 1, 'http://localhost/ERP-Apparel-Back/web/assets/coat1.jpg'),
(3, 'Robe fleurie', 150, 'S', 3, 'John', '2017-04-03 00:00:00', 2, NULL, NULL, 1, 'http://localhost/ERP-Apparel-Back/web/assets/dress1.jpg'),
(4, 'Manteau long laine Tailored', 75, 'L', 0, 'Marco', '2014-11-30 18:51:05', 3, NULL, NULL, 1, 'http://localhost/ERP-Apparel-Back/web/assets/coat2.jpg'),
(5, 'Manteau tissu bouclé laine', 99, 'XL', 0, 'Marco', '2014-11-30 18:59:55', 3, NULL, NULL, 1, 'http://localhost/ERP-Apparel-Back/web/assets/coat3.jpg'),
(6, 'Anorak à capuche', 66, 'XS', 0, 'Marco', '2014-11-30 21:22:49', 3, NULL, NULL, 1, 'http://localhost/ERP-Apparel-Back/web/assets/coat4.jpg'),
(7, 'Robe base volantée', 66, 'XS', 0, 'Marco', '2014-11-30 21:43:32', 2, NULL, NULL, 1, 'http://localhost/ERP-Apparel-Back/web/assets/dress2.jpg'),
(8, 'Robe imprimée à nœud', 66, 'XS', 0, 'Marco', '2014-11-30 21:44:26', 2, NULL, NULL, 1, 'http://localhost/ERP-Apparel-Back/web/assets/dress3.jpg'),
(9, 'Parka coton', 66, 'XS', 0, 'Marco', '2014-11-30 22:46:40', 3, NULL, NULL, 0, 'http://localhost/ERP-Apparel-Back/web/assets/parka1.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `apparel_brand`
--

CREATE TABLE IF NOT EXISTS `apparel_brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Contenu de la table `apparel_brand`
--

INSERT INTO `apparel_brand` (`id`, `name`) VALUES
(1, 'Zara'),
(2, 'Desigual'),
(3, 'Lacoste'),
(4, 'Armani'),
(5, 'Mango'),
(6, 'brandTesttreee'),
(7, 'brandTestPost'),
(8, 'brandTesttreee'),
(9, 'brandTesttreee'),
(10, 'brandTesttreee'),
(11, 'brandTestPost');

-- --------------------------------------------------------

--
-- Structure de la table `apparel_category`
--

CREATE TABLE IF NOT EXISTS `apparel_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Contenu de la table `apparel_category`
--

INSERT INTO `apparel_category` (`id`, `name`) VALUES
(2, 'dress'),
(3, 'coat'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Contenu de la table `apparel_color`
--

INSERT INTO `apparel_color` (`id`, `name`) VALUES
(1, 'red'),
(2, 'blue'),
(3, 'green'),
(4, 'yellow'),
(5, 'black'),
(6, 'beige'),
(7, 'pink');

-- --------------------------------------------------------

--
-- Structure de la table `apparel_group`
--

CREATE TABLE IF NOT EXISTS `apparel_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `apparel_group`
--

INSERT INTO `apparel_group` (`id`, `name`) VALUES
(1, 'groupe 1'),
(2, 'groupe 2');

-- --------------------------------------------------------

--
-- Structure de la table `apparel_material`
--

CREATE TABLE IF NOT EXISTS `apparel_material` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Contenu de la table `apparel_material`
--

INSERT INTO `apparel_material` (`id`, `name`) VALUES
(1, 'Silk'),
(2, 'Cotton'),
(3, 'Wool'),
(4, 'Denim'),
(5, 'materialTestInsert'),
(6, 'materialTestInsert'),
(7, 'materialTestInsert'),
(8, 'materialTestInsert');

-- --------------------------------------------------------

--
-- Structure de la table `apparel_permission`
--

CREATE TABLE IF NOT EXISTS `apparel_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `apparel_permission`
--

INSERT INTO `apparel_permission` (`id`, `libelle`) VALUES
(1, 'permission1'),
(2, 'permission2');

-- --------------------------------------------------------

--
-- Structure de la table `apparel_role`
--

CREATE TABLE IF NOT EXISTS `apparel_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isactive` tinyint(1) NOT NULL,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `apparel_role`
--

INSERT INTO `apparel_role` (`id`, `isactive`, `libelle`) VALUES
(1, 1, 'role1'),
(2, 2, 'role2');

-- --------------------------------------------------------

--
-- Structure de la table `apparel_shop`
--

CREATE TABLE IF NOT EXISTS `apparel_shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `localisation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Contenu de la table `apparel_shop`
--

INSERT INTO `apparel_shop` (`id`, `name`, `localisation`) VALUES
(3, 'Shop1', 'Paris'),
(4, 'Shop2', 'Toulouse'),
(5, 'shopTesttreee', 'Strasbourg'),
(6, 'shopTesttreee', 'Strasbourg'),
(7, 'shopTesttreee', 'Strasbourg'),
(8, 'shopTesttreee', 'Strasbourg');

-- --------------------------------------------------------

--
-- Structure de la table `apparel_user`
--

CREATE TABLE IF NOT EXISTS `apparel_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `function` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_creation` datetime NOT NULL,
  `isactive` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D508CF45D60322AC` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `apparel_user`
--

INSERT INTO `apparel_user` (`id`, `role_id`, `name`, `firstname`, `login`, `password`, `email`, `phone`, `function`, `date_creation`, `isactive`) VALUES
(3, NULL, 'Smith', 'Sara', 'SS', 'testpwd', 'ss@test.com', 606060606, 'Manager', '2017-05-01 00:00:00', 1),
(4, NULL, 'Doe', 'John', 'JD', 'testpwd2', 'jd@test.com', 707070707, 'Employe', '2017-05-01 00:00:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `article_brand`
--

CREATE TABLE IF NOT EXISTS `article_brand` (
  `article_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  PRIMARY KEY (`article_id`,`brand_id`),
  KEY `IDX_6BE58B497294869C` (`article_id`),
  KEY `IDX_6BE58B4944F5D008` (`brand_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `article_brand`
--

INSERT INTO `article_brand` (`article_id`, `brand_id`) VALUES
(2, 1),
(3, 1),
(6, 6),
(7, 8),
(8, 9),
(9, 10);

-- --------------------------------------------------------

--
-- Structure de la table `article_category`
--

CREATE TABLE IF NOT EXISTS `article_category` (
  `article_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`article_id`,`category_id`),
  KEY `IDX_53A4EDAA7294869C` (`article_id`),
  KEY `IDX_53A4EDAA12469DE2` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `article_category`
--

INSERT INTO `article_category` (`article_id`, `category_id`) VALUES
(2, 2),
(3, 2);

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

--
-- Contenu de la table `article_color`
--

INSERT INTO `article_color` (`article_id`, `color_id`) VALUES
(2, 1),
(2, 2),
(3, 4),
(3, 5),
(3, 7),
(4, 2),
(5, 6),
(6, 6),
(7, 3),
(8, 5),
(9, 6);

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

--
-- Contenu de la table `article_material`
--

INSERT INTO `article_material` (`article_id`, `material_id`) VALUES
(2, 2),
(2, 4),
(3, 1),
(3, 3),
(6, 5),
(7, 6),
(8, 7),
(9, 8);

-- --------------------------------------------------------

--
-- Structure de la table `article_shop`
--

CREATE TABLE IF NOT EXISTS `article_shop` (
  `article_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  PRIMARY KEY (`article_id`,`shop_id`),
  KEY `IDX_1C28CBA37294869C` (`article_id`),
  KEY `IDX_1C28CBA34D16C4DD` (`shop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `article_shop`
--

INSERT INTO `article_shop` (`article_id`, `shop_id`) VALUES
(2, 3),
(3, 3),
(6, 5),
(7, 6),
(8, 7),
(9, 8);

-- --------------------------------------------------------

--
-- Structure de la table `role_permission`
--

CREATE TABLE IF NOT EXISTS `role_permission` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  PRIMARY KEY (`role_id`,`permission_id`),
  KEY `IDX_6F7DF886D60322AC` (`role_id`),
  KEY `IDX_6F7DF886FED90CCA` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `role_permission`
--

INSERT INTO `role_permission` (`role_id`, `permission_id`) VALUES
(1, 2),
(2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user_group`
--

CREATE TABLE IF NOT EXISTS `user_group` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `IDX_8F02BF9DA76ED395` (`user_id`),
  KEY `IDX_8F02BF9DFE54D947` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `user_group`
--

INSERT INTO `user_group` (`user_id`, `group_id`) VALUES
(3, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `user_shop`
--

CREATE TABLE IF NOT EXISTS `user_shop` (
  `user_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`shop_id`),
  KEY `IDX_D6EB006BA76ED395` (`user_id`),
  KEY `IDX_D6EB006B4D16C4DD` (`shop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `user_shop`
--

INSERT INTO `user_shop` (`user_id`, `shop_id`) VALUES
(3, 3),
(3, 4);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `apparel_article`
--
ALTER TABLE `apparel_article`
  ADD CONSTRAINT `FK_F7FD148E12469DE2` FOREIGN KEY (`category_id`) REFERENCES `apparel_category` (`id`),
  ADD CONSTRAINT `FK_F7FD148E44F5D008` FOREIGN KEY (`brand_id`) REFERENCES `apparel_brand` (`id`),
  ADD CONSTRAINT `FK_F7FD148E4D16C4DD` FOREIGN KEY (`shop_id`) REFERENCES `apparel_shop` (`id`);

--
-- Contraintes pour la table `apparel_user`
--
ALTER TABLE `apparel_user`
  ADD CONSTRAINT `FK_D508CF45D60322AC` FOREIGN KEY (`role_id`) REFERENCES `apparel_role` (`id`);

--
-- Contraintes pour la table `article_brand`
--
ALTER TABLE `article_brand`
  ADD CONSTRAINT `FK_6BE58B4944F5D008` FOREIGN KEY (`brand_id`) REFERENCES `apparel_brand` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_6BE58B497294869C` FOREIGN KEY (`article_id`) REFERENCES `apparel_article` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `article_category`
--
ALTER TABLE `article_category`
  ADD CONSTRAINT `FK_53A4EDAA12469DE2` FOREIGN KEY (`category_id`) REFERENCES `apparel_category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_53A4EDAA7294869C` FOREIGN KEY (`article_id`) REFERENCES `apparel_article` (`id`) ON DELETE CASCADE;

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
-- Contraintes pour la table `article_shop`
--
ALTER TABLE `article_shop`
  ADD CONSTRAINT `FK_1C28CBA34D16C4DD` FOREIGN KEY (`shop_id`) REFERENCES `apparel_shop` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_1C28CBA37294869C` FOREIGN KEY (`article_id`) REFERENCES `apparel_article` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `role_permission`
--
ALTER TABLE `role_permission`
  ADD CONSTRAINT `FK_6F7DF886D60322AC` FOREIGN KEY (`role_id`) REFERENCES `apparel_role` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_6F7DF886FED90CCA` FOREIGN KEY (`permission_id`) REFERENCES `apparel_permission` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `user_group`
--
ALTER TABLE `user_group`
  ADD CONSTRAINT `FK_8F02BF9DA76ED395` FOREIGN KEY (`user_id`) REFERENCES `apparel_user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_8F02BF9DFE54D947` FOREIGN KEY (`group_id`) REFERENCES `apparel_group` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `user_shop`
--
ALTER TABLE `user_shop`
  ADD CONSTRAINT `FK_D6EB006B4D16C4DD` FOREIGN KEY (`shop_id`) REFERENCES `apparel_shop` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_D6EB006BA76ED395` FOREIGN KEY (`user_id`) REFERENCES `apparel_user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
