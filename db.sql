-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mar 16 Mai 2017 à 13:13
-- Version du serveur :  5.5.42
-- Version de PHP :  5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `ERP-Apparel`
--

-- --------------------------------------------------------

--
-- Structure de la table `apparel_article`
--

CREATE TABLE `apparel_article` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `solded` tinyint(1) NOT NULL,
  `sold_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sold_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `apparel_article`
--

INSERT INTO `apparel_article` (`id`, `category_id`, `brand_id`, `shop_id`, `name`, `price`, `size`, `solded`, `sold_by`, `sold_at`) VALUES
(1, 1, 1, 1, 'toto', 40, 'M', 0, 'tata', '2017-05-15 00:00:00'),
(2, 1, 1, 1, 'zozo', 30, 'L', 0, 'zaza', '2017-05-15 00:00:00'),
(3, 1, 1, 1, 'ESSAI', 20, 'S', 1, 'toto', '2017-05-12 08:26:17'),
(4, 1, 1, 1, 'test', 20, 'S', 1, 'toto', '2017-05-12 09:28:23');

-- --------------------------------------------------------

--
-- Structure de la table `apparel_brand`
--

CREATE TABLE `apparel_brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `apparel_brand`
--

INSERT INTO `apparel_brand` (`id`, `name`) VALUES
(1, 'adidas'),
(2, 'nike');

-- --------------------------------------------------------

--
-- Structure de la table `apparel_category`
--

CREATE TABLE `apparel_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `apparel_category`
--

INSERT INTO `apparel_category` (`id`, `name`) VALUES
(1, 'pull'),
(2, 'pantalon');

-- --------------------------------------------------------

--
-- Structure de la table `apparel_color`
--

CREATE TABLE `apparel_color` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `apparel_color`
--

INSERT INTO `apparel_color` (`id`, `name`) VALUES
(1, 'vert'),
(2, 'jaune'),
(4, 'vert'),
(5, 'vert');

-- --------------------------------------------------------

--
-- Structure de la table `apparel_group`
--

CREATE TABLE `apparel_group` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `apparel_material`
--

CREATE TABLE `apparel_material` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `apparel_material`
--

INSERT INTO `apparel_material` (`id`, `name`) VALUES
(1, 'cuir'),
(2, 'jean'),
(5, 'cuir'),
(6, 'jean'),
(7, 'cuir'),
(8, 'jean');

-- --------------------------------------------------------

--
-- Structure de la table `apparel_permission`
--

CREATE TABLE `apparel_permission` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `apparel_role`
--

CREATE TABLE `apparel_role` (
  `id` int(11) NOT NULL,
  `isactive` tinyint(1) NOT NULL,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `apparel_shop`
--

CREATE TABLE `apparel_shop` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `localisation` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `apparel_shop`
--

INSERT INTO `apparel_shop` (`id`, `name`, `localisation`) VALUES
(1, 'shop 1', 'paris'),
(2, 'shop 2', 'nantes');

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
(1, 1),
(1, 2),
(3, 4),
(4, 5);

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
(1, 1),
(1, 2),
(3, 5),
(3, 6),
(4, 7),
(4, 8);

-- --------------------------------------------------------

--
-- Structure de la table `role_permission`
--

CREATE TABLE `role_permission` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user_group`
--

CREATE TABLE `user_group` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user_shop`
--

CREATE TABLE `user_shop` (
  `user_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `apparel_article`
--
ALTER TABLE `apparel_article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F7FD148E12469DE2` (`category_id`),
  ADD KEY `IDX_F7FD148E44F5D008` (`brand_id`),
  ADD KEY `IDX_F7FD148E4D16C4DD` (`shop_id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `apparel_material`
--
ALTER TABLE `apparel_material`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `apparel_permission`
--
ALTER TABLE `apparel_permission`
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
  ADD KEY `IDX_D508CF45D60322AC` (`role_id`);

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
-- Index pour la table `role_permission`
--
ALTER TABLE `role_permission`
  ADD PRIMARY KEY (`role_id`,`permission_id`),
  ADD KEY `IDX_6F7DF886D60322AC` (`role_id`),
  ADD KEY `IDX_6F7DF886FED90CCA` (`permission_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `apparel_brand`
--
ALTER TABLE `apparel_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `apparel_category`
--
ALTER TABLE `apparel_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `apparel_color`
--
ALTER TABLE `apparel_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `apparel_group`
--
ALTER TABLE `apparel_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `apparel_material`
--
ALTER TABLE `apparel_material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `apparel_permission`
--
ALTER TABLE `apparel_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `apparel_role`
--
ALTER TABLE `apparel_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `apparel_shop`
--
ALTER TABLE `apparel_shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `apparel_user`
--
ALTER TABLE `apparel_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
