-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 21 Novembre 2013 à 21:05
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `spaceengine`
--

-- --------------------------------------------------------

--
-- Structure de la table `mod_games`
--

CREATE TABLE IF NOT EXISTS `mod_games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pageId` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `pitch` text NOT NULL,
  `players` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL COMMENT 'name + extension',
  `valide` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pageId` (`pageId`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `mod_games`
--

INSERT INTO `mod_games` (`id`, `pageId`, `name`, `pitch`, `players`, `image`, `valide`) VALUES
(1, 1, 'league of legend', 'League of Legend est un MOBA proposant au joueur de contrôler 1 héros sur un champ de bataille opposant des équipes de 5 joueurs.', '5v5', 'lol.jpeg', 1),
(2, 3, 'star citizen', 'MMO à univers persistant en cours de développement, Star Citizen détient le record de financement par crownfunding : plus de 27M !', 'MMO', 'starcitizen.jpg', 1),
(3, 4, 'pokémon', 'Description à venir', '2v2', 'lol.jpeg', 0),
(14, 0, 'tétris', 'Description à venir tétris !&lt;br&gt;', '1v1', 'starcitizen.jpg', 0);

-- --------------------------------------------------------

--
-- Structure de la table `mod_pages`
--

CREATE TABLE IF NOT EXISTS `mod_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `text` text NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1: visible, 0: hidden',
  `lastAuthor` varchar(50) NOT NULL,
  `activity` int(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `mod_pages`
--

INSERT INTO `mod_pages` (`id`, `title`, `text`, `visible`, `lastAuthor`, `activity`) VALUES
(0, 'Oups', '&lt;h4&gt;&lt;font color=&quot;#FF6600&quot;&gt;Il semble que cette page ne soit pas accessible !&lt;/font&gt;&lt;/h4&gt;&lt;font color=&quot;#000000&quot;&gt;Vous ne pouvez pas accèder à cette page, ou bien celle-ci n''existe pas.&lt;br&gt;Merci de contacter l''administrateur si vous êtes arrivé ici depuis un lien mort.&lt;/font&gt;&lt;br&gt;\r\n', 1, 'PSSL', 1383047067),
(1, 'League Of Legend', '&lt;h4&gt;&lt;font color=&quot;#FF9933&quot;&gt;Présentation globale&lt;/font&gt;&lt;/h4&gt;&lt;font color=&quot;#000000&quot;&gt;&lt;b&gt;League of Legends&lt;/b&gt; est un &lt;b&gt;free to play&lt;/b&gt; qui se présente comme le \r\nsuccesseur de dota.&lt;br&gt;Le jeu ne révolutionne pas le genre, mais comme des &lt;b&gt;Starcraft &lt;/b&gt;ou &lt;b&gt;\r\nWarcraft &lt;/b&gt;en leur temps, &lt;b&gt;LOL&lt;/b&gt; (abréviation de &lt;i&gt;League Of Legend&lt;/i&gt;) sait tirer partie de ses aînés et les \r\nexploiter au maximum.&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;&lt;br&gt;&lt;br&gt;&lt;/font&gt;&lt;div align=&quot;center&quot;&gt;&lt;font color=&quot;#000000&quot;&gt;&lt;img alt=&quot;Image LOL&quot; src=&quot;http://euw.leagueoflegends.com/sites/default/files/styles/scale_large/public/upload/art/teamfight2.jpg?itok=eR994qjf&quot; align=&quot;none&quot;&gt;&lt;/font&gt;&lt;br&gt;&lt;/div&gt;&lt;font color=&quot;#000000&quot;&gt;&lt;br&gt;&lt;/font&gt;&lt;h6&gt;&lt;font color=&quot;#000000&quot;&gt;\r\nSuccesseur de DOTA : kezako ?!&lt;/font&gt;&lt;/h6&gt;\r\n&lt;font color=&quot;#000000&quot;&gt;&lt;b&gt;\r\nDOTA&lt;/b&gt;, ou Defense of the Ancients, est à l''origine une &lt;i&gt;custom map&lt;/i&gt; pour &lt;b&gt;\r\nWarcraft3 &lt;/b&gt;qui proposait aux joueurs de contrôler un héros et de se \r\ntaper les un sur les autres pour détruire la base adverse en équipe de 5\r\n contre 5.&lt;br&gt;&lt;br&gt;&lt;b&gt;&lt;font color=&quot;#FF9933&quot;&gt;Pas de construction&lt;/font&gt;&lt;/b&gt;, &lt;b&gt;&lt;font color=&quot;#FF9933&quot;&gt;pas \r\nd’unités à gérer&lt;/font&gt;&lt;/b&gt;, c’est une sorte de &lt;i&gt;Diablo-like&lt;/i&gt; en team.&lt;br&gt;&lt;br&gt;Le\r\n mod a pris \r\ntrès rapidement de l’essor et de nombreuses variantes ont été créées. \r\nL’engouement a été tel qu’aujourd’hui plusieurs jeux tentent de \r\nrécupérer les joueurs de &lt;i&gt;DOTA&lt;/i&gt;, notamment &lt;b&gt;Heroes of Newerth&lt;/b&gt;, &lt;i&gt;Demigod &lt;/i&gt;ou \r\nbien évidemment &lt;b&gt;LOL&lt;/b&gt;.&lt;br&gt;&lt;br&gt;&lt;/font&gt;\r\n&lt;font color=&quot;#000000&quot;&gt;&lt;br&gt;&lt;/font&gt;&lt;h6&gt;&lt;font color=&quot;#000000&quot;&gt;\r\nRevenons à nos moutons…&lt;/font&gt;&lt;/h6&gt;\r\n&lt;font color=&quot;#000000&quot;&gt;\r\n&lt;i&gt;League of Legends&lt;/i&gt; propose donc une pléthore de héros (une cinquantaine !), des items à foison, mais seulement 3 maps pour le \r\nmoment, 2 sont en 5v5, 1 en 3v3.&lt;br&gt;&lt;br&gt;&lt;/font&gt;&lt;font color=&quot;#000000&quot;&gt;Par rapport à &lt;b&gt;DOTA&lt;/b&gt;, le jeu gagne une &lt;b&gt;&lt;font color=&quot;#FF9933&quot;&gt;meilleure lisibilité au niveau des \r\nitems&lt;/font&gt;&lt;/b&gt; (surtout pour les nouveaux joueurs). Lorsqu’on sélectionne un item\r\n dans la &lt;b&gt;boutique&lt;/b&gt;, on peut directement voir quels autres items sont \r\nnécessaires à sa création, ou bien en quoi cet item est upgradable.&lt;br&gt;&lt;br&gt;&lt;b&gt;&lt;font color=&quot;#FF9933&quot;&gt;Chaque héros dispose de 6 items&lt;/font&gt;&lt;/b&gt; conseillés (pas toujours pertinents \r\nmalheureusement) permettant une prise en main plus rapide en évitant de\r\n chercher des heures quels items acheter.&lt;br&gt;\r\nOn gagne aussi par rapport à &lt;i&gt;DOTA &lt;/i&gt;des moyens de &lt;b&gt;&lt;font color=&quot;#FF9933&quot;&gt;customiser son \r\npersonnage&lt;/font&gt;&lt;/b&gt; par l’ajout d’un &lt;b&gt;arbre de maîtrises et de runes&lt;/b&gt;.&lt;br&gt;&lt;br&gt;Des\r\n skins \r\nsont également disponibles, mais n’apportent pas grand-chose au jeu, il \r\ns''agît plus de personnalisation de ses personnages préférés qu''autre \r\nchose.&lt;br&gt;&lt;br&gt;&lt;/font&gt;&lt;div align=&quot;center&quot;&gt;&lt;a target=&quot;&quot; title=&quot;&quot; href=&quot;subscribe.php&quot;&gt;&lt;font color=&quot;#FF9933&quot;&gt;&lt;b&gt;Alors, prêt à jour à League Of Legend ?&lt;/b&gt;&lt;/font&gt;&lt;/a&gt;&lt;br&gt;&lt;br&gt;&lt;/div&gt;&lt;font color=&quot;#000000&quot;&gt;&lt;br&gt;&lt;/font&gt;&lt;div align=&quot;right&quot;&gt;&lt;font color=&quot;#000000&quot;&gt;Site officiel de League Of Legend : &lt;a target=&quot;_blank&quot; title=&quot;&quot; href=&quot;http://euw.leagueoflegends.com/fr&quot;&gt;LeagueOfLegend.com&lt;/a&gt;&lt;/font&gt;&lt;br&gt;&lt;font color=&quot;#000000&quot;&gt;Source article : &lt;a target=&quot;_blank&quot; title=&quot;&quot; href=&quot;http://www.fureur.org/forums/showthread.php?t=14155&quot;&gt;Fureur.org&lt;/a&gt;&lt;/font&gt;&lt;/div&gt;', 1, 'super', 1383047067),
(3, 'Star Citizen', '&lt;h5 align=&quot;left&quot;&gt;Sommaire rapide :&lt;/h5&gt;&lt;ol&gt;&lt;li&gt;&lt;font color=&quot;#000000&quot;&gt;Le rêve d''un homme&lt;/font&gt;&lt;/li&gt;&lt;li&gt;&lt;font color=&quot;#000000&quot;&gt;Un MMO, oui mai...&lt;/font&gt;&lt;/li&gt;&lt;li&gt;&lt;font color=&quot;#000000&quot;&gt;Squadron 42 (solo)&lt;/font&gt;&lt;/li&gt;&lt;li&gt;&lt;font color=&quot;#000000&quot;&gt;Environnement : 150 systèmes&lt;/font&gt;&lt;/li&gt;&lt;li&gt;&lt;font color=&quot;#000000&quot;&gt;Les vaisseaux&lt;/font&gt;&lt;/li&gt;&lt;li&gt;&lt;font color=&quot;#000000&quot;&gt;Quand est-ce que l''on pourra jouer et combien il coûte ?&lt;/font&gt;&lt;/li&gt;&lt;/ol&gt;&lt;h3 align=&quot;center&quot;&gt;&lt;span id=&quot;Le-rve-dun-homme&quot;&gt;&lt;/span&gt;&lt;/h3&gt;&lt;h3&gt;&lt;br&gt;&lt;span id=&quot;Le-rve-dun-homme&quot;&gt;&lt;/span&gt;&lt;/h3&gt;&lt;h3&gt;&lt;span id=&quot;Le-rve-dun-homme&quot;&gt;Le rêve d’un homme&lt;/span&gt;&lt;/h3&gt;&lt;p&gt;N’avez-vous jamais rêvé de prendre les commandes du Faucon Millenium \r\net de déambuler dans ses coursives ? De pouvoir visiter des vaisseaux \r\ncapitaux ou des stations spatiales dans leurs moindres recoins, à \r\nl’échelle et avec des graphismes à tomber ? Le tout dans un monde riche,\r\n cohérent et vivant ?&lt;/p&gt;&lt;p&gt;Présenté le 10 octobre 2012 lors d’un direct de 24h, Star Citizen est actuellement encore en développement mais à dors et déjà atteint le record du plus haut financement participatif. Il s''élève aujourd''hui à plus de 27 millions de dollars !&lt;/p&gt;&lt;p style=&quot;text-align: justify;&quot; align=&quot;center&quot;&gt;&lt;img class=&quot;aligncenter&quot; alt=&quot;&quot; src=&quot;https://docs.google.com/document/d/1KP7So-wjN7ULjjzyyc6t2ZSjpshHRgXJ7dcoVlafiiA/pubimage?id=1KP7So-wjN7ULjjzyyc6t2ZSjpshHRgXJ7dcoVlafiiA&amp;amp;image_id=1HTfeUNXvldpI7UDlruX8LwtTPUo6K1geB0mNaA&quot; height=&quot;321&quot; width=&quot;629&quot;&gt;&lt;/p&gt;&lt;p style=&quot;text-align: justify;&quot; align=&quot;center&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;h3&gt;Un MMO, oui mais…&lt;/h3&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Star Citizen&amp;nbsp;sera&amp;nbsp;un jeu massivement \r\nmultijoueurs (MMO)&amp;nbsp;se déroulant dans&amp;nbsp;un univers persistant.&amp;nbsp;Les joueurs \r\nne seront pas répartis entre différents serveurs&amp;nbsp;(pas de duplication de \r\nl’univers persistant), &amp;nbsp;ils ‘existeront’ tous dans le même univers.&amp;nbsp;Un&amp;nbsp;&lt;a href=&quot;http://www.google.com/url?q=http%3A%2F%2Fwww.starcitizen.fr%2F2012%2F11%2F11%2Fcomm-link-du-11112012-chris-roberts-a-propos-du-solo-multi%2F&amp;amp;sa=D&amp;amp;sntz=1&amp;amp;usg=AFQjCNEyxYvmlAuxq0IDB6C_Pqv5CIVWIg&quot;&gt;système d’instances dynamiques&lt;/a&gt;&amp;nbsp;gérera&amp;nbsp;les\r\n rencontres entre plusieurs joueurs et pnj (personnages non joueurs).&lt;/p&gt;&lt;p style=&quot;text-align: justify;&quot;&gt;Ce\r\n n’est ni un MMORPG, ni un pay-to-win : pas de système de niveaux pour \r\nvotre personnage, chaque vaisseau aura ses propres avantages et \r\ninconvénients et l’adresse du pilote sera déterminante.&lt;/p&gt;&lt;p style=&quot;text-align: justify;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;h3&gt;&lt;span id=&quot;Squadron-42&quot;&gt;Squadron 42&lt;/span&gt;&lt;/h3&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Une campagne solo intitulée&amp;nbsp;&lt;a href=&quot;http://images.eurogamer.net/2012/articles//a/1/5/1/9/7/6/7/CS_42_SQUAD_STENCIL_LOGO_02.tif.jpg&quot; rel=&quot;lightbox-0&quot;&gt;Squadron 42&lt;/a&gt;,\r\n est également prévue.&amp;nbsp;Cette campagne scénarisée&amp;nbsp;sera aussi bien \r\njouable&amp;nbsp;en solo qu’en mode coopération,&amp;nbsp;ce&amp;nbsp;qui permettra&amp;nbsp;à vos amis de \r\nvenir vous prêter main-forte en tant qu’ailiers, ou au contraire vous \r\nmettre des bâtons dans les roues en incarnant les pnj ennemis.&amp;nbsp;Si vous \r\nêtes courageux et assez habile&amp;nbsp;pour finir les 62 missions de la&amp;nbsp;campagne\r\n solo, vous pourrez importer votre personnage dans le monde persistant \r\nde&amp;nbsp;Star Citizen,&amp;nbsp;celui-ci bénéficiant désormais du statut de Citoyen, \r\npuisqu’ayant accompli son service militaire.&lt;/p&gt;&lt;p style=&quot;text-align: justify;&quot; align=&quot;center&quot;&gt;&lt;img class=&quot;alignleft&quot; alt=&quot;&quot; src=&quot;https://docs.google.com/document/d/1KP7So-wjN7ULjjzyyc6t2ZSjpshHRgXJ7dcoVlafiiA/pubimage?id=1KP7So-wjN7ULjjzyyc6t2ZSjpshHRgXJ7dcoVlafiiA&amp;amp;image_id=1vDb0Y5tlBU0H49-m0zBfxPXW1DS4hsWXMZDVnA&quot; height=&quot;334&quot; width=&quot;617&quot;&gt;&lt;/p&gt;&lt;p style=&quot;text-align: justify;&quot; align=&quot;center&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;h3&gt;&lt;span id=&quot;Environnement-150-systmes&quot;&gt;Environnement : 150 systèmes&lt;/span&gt;&lt;/h3&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;L’univers persistant comptera pas moins \r\nde 150 systèmes au lancement du jeu. Au moins deux tiers d’entre eux \r\nseront à découvrir par les joueurs.&amp;nbsp;L’exploration fera donc partie \r\nintégrante du jeu&amp;nbsp;et apportera gloire et argent à ceux qui&amp;nbsp;trouveront un\r\n chemin vers d’autres systèmes…&lt;/p&gt;&lt;p style=&quot;text-align: justify;&quot;&gt;De plus, l’économie constituera véritablement le nerf de la guerre dans&amp;nbsp;Star \r\nCitizen. Les joueurs disposeront d’une liberté totale quant à la \r\ncréation de leur propre entreprise, de la PME ultra-spécialisée à la \r\nfiliale généraliste employant des milliers de&amp;nbsp;salariés&amp;nbsp;(joueurs comme \r\nPnj !).&lt;/p&gt;&lt;p style=&quot;text-align: justify;&quot; align=&quot;center&quot;&gt;&lt;img class=&quot;alignright&quot; alt=&quot;&quot; src=&quot;https://docs.google.com/document/d/1KP7So-wjN7ULjjzyyc6t2ZSjpshHRgXJ7dcoVlafiiA/pubimage?id=1KP7So-wjN7ULjjzyyc6t2ZSjpshHRgXJ7dcoVlafiiA&amp;amp;image_id=1v5VI9ZFYe6wTm7xH3095Hc29B0jgFdkRPQfVWw&quot; height=&quot;335&quot; width=&quot;620&quot;&gt;&lt;/p&gt;&lt;p style=&quot;text-align: justify;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;h3&gt;&lt;span id=&quot;Les-vaisseaux&quot;&gt;Les vaisseaux&lt;/span&gt;&lt;/h3&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;A sa sortie,&amp;nbsp;Star Citizen&amp;nbsp;donnera&amp;nbsp;accès \r\nà&amp;nbsp;plusieurs dizaines&amp;nbsp;de bâtiments, allant du chasseur léger aux \r\nvaisseaux capitaux, tous&amp;nbsp;pilotables et modélisés dans les moindres \r\ndétails. Quel autre jeu peut se targuer de vous mettre littéralement \r\ndans le siège du commandant d’un vaisseau comme le&amp;nbsp;transporteur de \r\nclasse&amp;nbsp;&lt;a href=&quot;http://images.gamersyde.com/image_star_citizen-20600-2615_0007.jpg&quot; rel=&quot;lightbox-4&quot;&gt;Bengal&lt;/a&gt;&amp;nbsp;qui, avec ses1000 mètres de long&amp;nbsp;et ses 755 membres d’équipage, constitue le plus gros vaisseau du jeu ?&lt;/p&gt;&lt;p style=&quot;text-align: justify;&quot; align=&quot;center&quot;&gt;&lt;img class=&quot;aligncenter&quot; alt=&quot;&quot; src=&quot;https://docs.google.com/document/d/1KP7So-wjN7ULjjzyyc6t2ZSjpshHRgXJ7dcoVlafiiA/pubimage?id=1KP7So-wjN7ULjjzyyc6t2ZSjpshHRgXJ7dcoVlafiiA&amp;amp;image_id=12xIj5gd9q0IXeoOWPbdEjaQoET8NBXZmKuy7lQ&quot; height=&quot;337&quot; width=&quot;628&quot;&gt;&lt;/p&gt;&lt;p style=&quot;text-align: justify;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;h3 align=&quot;left&quot;&gt;&lt;span id=&quot;Les-vaisseaux&quot;&gt;Quand est-ce que l''on pourra jouer et combien il coûte !&lt;br&gt;&lt;/span&gt;&lt;/h3&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Pour &lt;a target=&quot;&quot; title=&quot;&quot; href=&quot;https://robertsspaceindustries.com/store/68-digital-scout&quot;&gt;un pack aux environs des 20 euros&lt;/a&gt;, vous aurez déjà accès à votre hangar pour commencer à personnaliser votre vaisseau (ou vos vaisseaux si vous en achetez plusieurs !).&lt;/p&gt;&lt;p style=&quot;text-align: justify;&quot;&gt;La partie intéressante arrivera courant décembre pour les joueurs ayants des packs &lt;a target=&quot;&quot; title=&quot;&quot; href=&quot;https://robertsspaceindustries.com/pledge/70-digital-bounty-hunter&quot;&gt;avec accès à l''alpha/bêta&lt;/a&gt; pour la sortie du premier module de l''alpha : le dogfight. Ce module permettra tout simplement de pouvoir combattre contre d''autres joueurs avec nos propres vaisseaux !&lt;/p&gt;&lt;p style=&quot;text-align: justify;&quot;&gt;Voilà pourquoi ce jeu sera disponible à nos événements : imaginez une bataille spatiale opposant une dizaines de joueurs dans le plus grand &lt;i&gt;space sim&lt;/i&gt; de tous les temps ?!&lt;/p&gt;&lt;p style=&quot;text-align: justify;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p align=&quot;center&quot;&gt;&lt;a target=&quot;&quot; title=&quot;&quot; href=&quot;https://robertsspaceindustries.com/&quot;&gt;Site officiel&lt;/a&gt; - &lt;a target=&quot;&quot; title=&quot;&quot; href=&quot;https://robertsspaceindustries.com/pledge&quot;&gt;Les packs actuels&lt;/a&gt; - &lt;a target=&quot;&quot; title=&quot;&quot; href=&quot;http://localhost:8000/Intech/S4/PSSL/starcitizen.fr&quot;&gt;Communauté FR (chercher Jibi !)&lt;/a&gt;&lt;/p&gt;', 1, 'jibi', 1383089778),
(4, 'Pokémon', 'C''est pokémon !&lt;br&gt;', 1, 'jibi', 1384616237);

-- --------------------------------------------------------

--
-- Structure de la table `mod_tournaments`
--

CREATE TABLE IF NOT EXISTS `mod_tournaments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gameId` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `valide` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `mod_tournaments`
--

INSERT INTO `mod_tournaments` (`id`, `gameId`, `title`, `valide`) VALUES
(1, 1, 'league of legend (5v5)', 1),
(2, 1, 'league of legend (3v3)', 1),
(3, 2, 'star citizen (1v1)', 1);

-- --------------------------------------------------------

--
-- Structure de la table `next_event`
--

CREATE TABLE IF NOT EXISTS `next_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `price` decimal(4,2) NOT NULL COMMENT 'Euro, like 00.00',
  `participate` tinyint(1) NOT NULL COMMENT '1:present, 2:not present',
  PRIMARY KEY (`id`),
  UNIQUE KEY `userId` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `rank` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Rang de l''utilisateur.',
  `token` varchar(20) NOT NULL COMMENT 'Session sécurisée',
  `activity` int(11) NOT NULL COMMENT 'Dernière activitée sur le site.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `token` (`token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `rank`, `token`, `activity`) VALUES
(6, 'julien bernard', 'jibi', 'saj6Zas9nc2dg', 3, '37c1WnmQkvM', 1385067865),
(7, 'corentin', 'fifou', 'sarUgHzrqRjmY', 2, '1383051821fifou', 1383051821),
(8, 'johan', 'yopif', 'sa9cCEqcVOYhY', 2, '1383051857yopif', 1383051857),
(9, 'romain souyri', 'aramatu', 'saZRbXi0ksedY', 2, 'xPmbM.BM.yc', 1383051956),
(10, 'brice hoffmann', 'aretis', 'sapxOt7jFZrDE', 2, 'SaMw85Euwtg', 1383052355),
(11, 'adossou', 'ados1991', 'saQ3IRW0teiPw', 2, 'sX2abYsggwE', 1383052710),
(12, 'ludovic', 'dacove', 'saDEwrGWnd3MA', 2, 'AWqqrUuNRVw', 1383052596),
(15, 'hugo', 'hugo', 'saOVhL18134Fw', 1, 'd2XpfAC2mPY', 1383053169),
(16, 'test', 'test', 'sa1zXUPByxFOc', 1, '4ecP5ryu5D6', 1385061266),
(17, 'compte compte', 'compte', 'saopEPJjJ/73Q', 1, 'qn8giA7sy8g', 1385064485);

-- --------------------------------------------------------

--
-- Structure de la table `user_to_game`
--

CREATE TABLE IF NOT EXISTS `user_to_game` (
  `userId` int(11) NOT NULL,
  `gameId` int(11) NOT NULL,
  `level` enum('1','2','3','4','5') NOT NULL DEFAULT '2' COMMENT 'newbie, low, medium, high, pro'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user_to_game`
--

INSERT INTO `user_to_game` (`userId`, `gameId`, `level`) VALUES
(16, 2, '3'),
(16, 1, '4');

-- --------------------------------------------------------

--
-- Structure de la table `user_to_tournament`
--

CREATE TABLE IF NOT EXISTS `user_to_tournament` (
  `userId` int(11) NOT NULL,
  `tournamentId` int(11) NOT NULL,
  `team` varchar(100) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user_to_tournament`
--

INSERT INTO `user_to_tournament` (`userId`, `tournamentId`, `team`) VALUES
(15, 1, 'aucune'),
(16, 2, 'big poulet'),
(17, 2, 'big poulet');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
