CREATE TABLE IF NOT EXISTS `#__sportsman_sports` (
  `sportsman_sport_id` SERIAL,
  `title` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__sportsman_divisions` (
  `sportsman_division_id` SERIAL,
  `sportsman_sport_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `access` int(11) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT 0,
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT 0,
  `locked_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `locked_by` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__sportsman_teams` (
  `sportsman_team_id` SERIAL,
  `title` varchar(255) NOT NULL,
  
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__sportsman_games` (
  `sportsman_game_id` SERIAL,
  
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__sportsman_tournaments` (
  `sportsman_tournament_id` SERIAL,
  
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__sportsman_teammembers` (
  `sportsman_teammember_id` SERIAL,
  
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__sportsman_basketballstats` (
  `sportsman_basketballstat_id` SERIAL,
  
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__sportsman_baseballstats` (
  `sportsman_baseballstat_id` SERIAL,
  
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__sportsman_softballstats` (
  `sportsman_softballstat_id` SERIAL,
  
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `#__sportsman_sports` VALUES (1, 'Basketball');
INSERT INTO `#__sportsman_sports` VALUES (2, 'Baseball');
INSERT INTO `#__sportsman_sports` VALUES (3, 'Softball');

INSERT INTO `#__sportsman_divisions` (`sportsman_division_id`, `sportsman_sport_id`, `title`, `enabled`, `access`, `created_on`, `created_by`, `modified_on`, `modified_by`, `locked_on`, `locked_by`) VALUES 
(1, 1, 'Mini', 1, 0, '2011-07-30 09:00:00', 0, '2011-07-31 09:00:00', 0, '0000-00-00 00:00:00', 0),
(2, 1, 'Pasarella', 1, 0, '2011-07-30 09:00:00', 0, '2011-07-31 09:00:00', 0, '0000-00-00 00:00:00', 0),
(3, 1, 'Cadet', 1, 0, '2011-07-30 09:00:00', 0, '2011-07-31 09:00:00', 0, '0000-00-00 00:00:00', 0),
(4, 1, 'Junioren', 1, 0, '2011-07-30 09:00:00', 0, '2011-07-31 09:00:00', 0, '0000-00-00 00:00:00', 0),
(5, 1, 'A-Klas', 1, 0, '2011-07-30 09:00:00', 0, '2011-07-31 09:00:00', 0, '0000-00-00 00:00:00', 0),
(6, 1, 'Masters', 1, 0, '2011-07-30 09:00:00', 0, '2011-07-31 09:00:00', 0, '0000-00-00 00:00:00', 0),
(7, 2, 'Little League', 1, 0, '2011-07-30 09:00:00', 0, '2011-07-31 09:00:00', 0, '0000-00-00 00:00:00', 0),
(8, 2, 'Junior League', 1, 0, '2011-07-30 09:00:00', 0, '2011-07-31 09:00:00', 0, '0000-00-00 00:00:00', 0),
(9, 3, 'Veterano', 1, 0, '2011-07-30 09:00:00', 0, '2011-07-31 09:00:00', 0, '0000-00-00 00:00:00', 0),
(10, 1, 'Special', 1, 0, '2011-07-30 09:00:00', 0, '2011-07-31 09:00:00', 0, '0000-00-00 00:00:00', 0),
(11, 2, 'Special', 1, 0, '2011-07-30 09:00:00', 0, '2011-07-31 09:00:00', 0, '0000-00-00 00:00:00', 0),
(12, 3, 'Special', 1, 0, '2011-07-30 09:00:00', 0, '2011-07-31 09:00:00', 0, '0000-00-00 00:00:00', 0)
