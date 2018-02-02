
SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `device`;
CREATE TABLE `device` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `device` (`id`, `name`) VALUES
(1,	'alarme'),
(2,	'generator'),
(3,	'iphone'),
(4,	'smarther'),
(5,	'tronxy 3D');

DROP TABLE IF EXISTS `device_scene`;
CREATE TABLE `device_scene` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `device_id` int(11) NOT NULL,
  `scene_id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `update_at` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1FFC0FBD94A4C7D4` (`device_id`),
  KEY `IDX_1FFC0FBD166053B4` (`scene_id`),
  CONSTRAINT `FK_1FFC0FBD166053B4` FOREIGN KEY (`scene_id`) REFERENCES `scene` (`id`),
  CONSTRAINT `FK_1FFC0FBD94A4C7D4` FOREIGN KEY (`device_id`) REFERENCES `device` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `device_scene` (`id`, `device_id`, `scene_id`, `created_at`, `update_at`) VALUES
(1,	2,	1,	'2018-01-31',	'2018-01-31'),
(2,	2,	2,	'2018-01-31',	'2018-01-31'),
(3,	5,	1,	'2018-01-31',	'2018-01-31');

DROP TABLE IF EXISTS `scene`;
CREATE TABLE `scene` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `scene` (`id`, `type`, `message`) VALUES
(1,	'Orange',	'fermer la porte'),
(2,	'Rouge',	'coupe Electricit'),
(3,	'Vert',	'Aucun danger ');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zone_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8D93D6499F2C3FAB` (`zone_id`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`zone_id`) REFERENCES `zone` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `user` (`id`, `login`, `password`, `firstname`, `lastname`, `zone_id`) VALUES
(1,	'Kevin',	'root',	'kevin',	'lastname',	1),
(2,	'mohamad',	'root',	'mohamad',	'lastname',	1),
(3,	'marc',	'root',	'marc',	'lastname',	2),
(4,	'nasri',	'root',	'nasri',	'lastname',	2);

DROP TABLE IF EXISTS `user_device`;
CREATE TABLE `user_device` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `device_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `alert` tinyint(1) NOT NULL,
  `mac_adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6C7DADB394A4C7D4` (`device_id`),
  KEY `IDX_6C7DADB3A76ED395` (`user_id`),
  CONSTRAINT `FK_6C7DADB394A4C7D4` FOREIGN KEY (`device_id`) REFERENCES `device` (`id`),
  CONSTRAINT `FK_6C7DADB3A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `user_device` (`id`, `device_id`, `user_id`, `created_at`, `alert`, `mac_adresse`) VALUES
(1,	1,	1,	'2018-01-31',	0,	'351564165'),
(2,	2,	1,	'2018-01-31',	1,	'584646848'),
(3,	2,	3,	'2018-01-31',	1,	'3516168461'),
(4,	4,	3,	'2018-01-31',	0,	'5168465'),
(5,	4,	2,	'2018-01-31',	0,	'51645461'),
(6,	5,	2,	'2018-01-31',	0,	'5184684'),
(7,	3,	4,	'2018-01-31',	0,	'265468486'),
(8,	4,	4,	'2018-01-31',	0,	'213516565'),
(9,	1,	2,	'2018-02-02',	0,	'51654684'),
(10,	1,	3,	'2018-02-02',	0,	'5126515'),
(11,	1,	4,	'2018-02-02',	0,	'1565515');

DROP TABLE IF EXISTS `zone`;
CREATE TABLE `zone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:json_array)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `zone` (`id`, `name`, `position`) VALUES
(1,	'Zone 1',	'Position 1'),
(2,	'Zone 2',	'Position 2');

