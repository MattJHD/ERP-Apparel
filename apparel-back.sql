-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 04 Mai 2017 à 15:13
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `apparel-back`
--

-- --------------------------------------------------------

--
-- Structure de la table `apparel_article`
--

CREATE TABLE `apparel_article` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `solded` tinyint(1) NOT NULL,
  `sold_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sold_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `apparel_article`
--

INSERT INTO `apparel_article` (`id`, `name`, `price`, `size`, `solded`, `sold_by`, `sold_at`) VALUES
(2, 'Test article', 42, 'M', 2, 'Sara', '2017-04-05 00:00:00'),
(3, 'article 2', 150, 'S', 3, 'John', '2017-04-03 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `apparel_brand`
--

CREATE TABLE `apparel_brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

CREATE TABLE `apparel_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

CREATE TABLE `apparel_color` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

CREATE TABLE `apparel_group` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `apparel_group`
--

INSERT INTO `apparel_group` (`id`, `role_id`, `name`) VALUES
(1, 1, 'groupe 1'),
(2, 2, 'groupe 2');

-- --------------------------------------------------------

--
-- Structure de la table `apparel_material`
--

CREATE TABLE `apparel_material` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

CREATE TABLE `apparel_operation` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `apparel_operation`
--

INSERT INTO `apparel_operation` (`id`, `libelle`) VALUES
(1, 'GET'),
(2, 'POST'),
(3, 'PUT'),
(4, 'PATCH'),
(5, 'DELETE');

-- --------------------------------------------------------

--
-- Structure de la table `apparel_privilege`
--

CREATE TABLE `apparel_privilege` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `resource_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `apparel_privilege`
--

INSERT INTO `apparel_privilege` (`id`, `role_id`, `resource_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, NULL),
(5, 2, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `apparel_resource`
--

CREATE TABLE `apparel_resource` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `apparel_resource`
--

INSERT INTO `apparel_resource` (`id`, `libelle`) VALUES
(1, 'statistiques'),
(2, 'administration'),
(3, 'comptabilité'),
(4, 'reseaux sociaux'),
(5, 'site web');

-- --------------------------------------------------------

--
-- Structure de la table `apparel_role`
--

CREATE TABLE `apparel_role` (
  `id` int(11) NOT NULL,
  `isactive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `apparel_role`
--

INSERT INTO `apparel_role` (`id`, `isactive`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `apparel_shop`
--

CREATE TABLE `apparel_shop` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `localisation` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

CREATE TABLE `apparel_user` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `function` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_creation` datetime NOT NULL,
  `isactive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

CREATE TABLE `article_brand` (
  `article_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `article_brand`
--

INSERT INTO `article_brand` (`article_id`, `brand_id`) VALUES
(2, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `article_category`
--

CREATE TABLE `article_category` (
  `article_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
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

CREATE TABLE `article_color` (
  `article_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `article_color`
--

INSERT INTO `article_color` (`article_id`, `color_id`) VALUES
(2, 1),
(2, 2),
(3, 4),
(3, 5),
(3, 7);

-- --------------------------------------------------------

--
-- Structure de la table `article_material`
--

CREATE TABLE `article_material` (
  `article_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `article_material`
--

INSERT INTO `article_material` (`article_id`, `material_id`) VALUES
(2, 2),
(2, 4),
(3, 1),
(3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `article_shop`
--

CREATE TABLE `article_shop` (
  `article_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `article_shop`
--

INSERT INTO `article_shop` (`article_id`, `shop_id`) VALUES
(2, 3),
(3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `privilege_operation`
--

CREATE TABLE `privilege_operation` (
  `privilege_id` int(11) NOT NULL,
  `operation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `privilege_operation`
--

INSERT INTO `privilege_operation` (`privilege_id`, `operation_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5);

-- --------------------------------------------------------

--
-- Structure de la table `user_group`
--

CREATE TABLE `user_group` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
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

CREATE TABLE `user_shop` (
  `user_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `user_shop`
--

INSERT INTO `user_shop` (`user_id`, `shop_id`) VALUES
(3, 3),
(3, 4);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `apparel_article`
--
ALTER TABLE `apparel_article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `apparel_brand`
--
ALTER TABLE `apparel_brand`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `apparel_category`
--
ALTER TABLE `apparel_category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `apparel_color`
--
ALTER TABLE `apparel_color`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `apparel_group`
--
ALTER TABLE `apparel_group`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_642E93F7D60322AC` (`role_id`);

--
-- Index pour la table `apparel_material`
--
ALTER TABLE `apparel_material`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `apparel_operation`
--
ALTER TABLE `apparel_operation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `apparel_privilege`
--
ALTER TABLE `apparel_privilege`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_ECE5EFDE89329D25` (`resource_id`),
  ADD KEY `IDX_ECE5EFDED60322AC` (`role_id`);

--
-- Index pour la table `apparel_resource`
--
ALTER TABLE `apparel_resource`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `apparel_role`
--
ALTER TABLE `apparel_role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `apparel_shop`
--
ALTER TABLE `apparel_shop`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `apparel_user`
--
ALTER TABLE `apparel_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_D508CF45D60322AC` (`role_id`);

--
-- Index pour la table `article_brand`
--
ALTER TABLE `article_brand`
  ADD PRIMARY KEY (`article_id`,`brand_id`),
  ADD KEY `IDX_6BE58B497294869C` (`article_id`),
  ADD KEY `IDX_6BE58B4944F5D008` (`brand_id`);

--
-- Index pour la table `article_category`
--
ALTER TABLE `article_category`
  ADD PRIMARY KEY (`article_id`,`category_id`),
  ADD KEY `IDX_53A4EDAA7294869C` (`article_id`),
  ADD KEY `IDX_53A4EDAA12469DE2` (`category_id`);

--
-- Index pour la table `article_color`
--
ALTER TABLE `article_color`
  ADD PRIMARY KEY (`article_id`,`color_id`),
  ADD KEY `IDX_11E13AF87294869C` (`article_id`),
  ADD KEY `IDX_11E13AF87ADA1FB5` (`color_id`);

--
-- Index pour la table `article_material`
--
ALTER TABLE `article_material`
  ADD PRIMARY KEY (`article_id`,`material_id`),
  ADD KEY `IDX_295681FE7294869C` (`article_id`),
  ADD KEY `IDX_295681FEE308AC6F` (`material_id`);

--
-- Index pour la table `article_shop`
--
ALTER TABLE `article_shop`
  ADD PRIMARY KEY (`article_id`,`shop_id`),
  ADD KEY `IDX_1C28CBA37294869C` (`article_id`),
  ADD KEY `IDX_1C28CBA34D16C4DD` (`shop_id`);

--
-- Index pour la table `privilege_operation`
--
ALTER TABLE `privilege_operation`
  ADD PRIMARY KEY (`privilege_id`,`operation_id`),
  ADD KEY `IDX_BBB86B8232FB8AEA` (`privilege_id`),
  ADD KEY `IDX_BBB86B8244AC3583` (`operation_id`);

--
-- Index pour la table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`user_id`,`group_id`),
  ADD KEY `IDX_8F02BF9DA76ED395` (`user_id`),
  ADD KEY `IDX_8F02BF9DFE54D947` (`group_id`);

--
-- Index pour la table `user_shop`
--
ALTER TABLE `user_shop`
  ADD PRIMARY KEY (`user_id`,`shop_id`),
  ADD KEY `IDX_D6EB006BA76ED395` (`user_id`),
  ADD KEY `IDX_D6EB006B4D16C4DD` (`shop_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `apparel_article`
--
ALTER TABLE `apparel_article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `apparel_brand`
--
ALTER TABLE `apparel_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `apparel_category`
--
ALTER TABLE `apparel_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `apparel_color`
--
ALTER TABLE `apparel_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `apparel_group`
--
ALTER TABLE `apparel_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `apparel_material`
--
ALTER TABLE `apparel_material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `apparel_operation`
--
ALTER TABLE `apparel_operation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `apparel_privilege`
--
ALTER TABLE `apparel_privilege`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `apparel_resource`
--
ALTER TABLE `apparel_resource`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `apparel_role`
--
ALTER TABLE `apparel_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `apparel_shop`
--
ALTER TABLE `apparel_shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `apparel_user`
--
ALTER TABLE `apparel_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `apparel_group`
--
ALTER TABLE `apparel_group`
  ADD CONSTRAINT `FK_642E93F7D60322AC` FOREIGN KEY (`role_id`) REFERENCES `apparel_role` (`id`);

--
-- Contraintes pour la table `apparel_privilege`
--
ALTER TABLE `apparel_privilege`
  ADD CONSTRAINT `FK_ECE5EFDE89329D25` FOREIGN KEY (`resource_id`) REFERENCES `apparel_resource` (`id`),
  ADD CONSTRAINT `FK_ECE5EFDED60322AC` FOREIGN KEY (`role_id`) REFERENCES `apparel_role` (`id`);

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
-- Contraintes pour la table `privilege_operation`
--
ALTER TABLE `privilege_operation`
  ADD CONSTRAINT `FK_BBB86B8232FB8AEA` FOREIGN KEY (`privilege_id`) REFERENCES `apparel_privilege` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_BBB86B8244AC3583` FOREIGN KEY (`operation_id`) REFERENCES `apparel_operation` (`id`) ON DELETE CASCADE;

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
