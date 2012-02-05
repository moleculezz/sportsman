CREATE TABLE IF NOT EXISTS `#__sportsman_sports` (
  `sportsman_sport_id` bigint(20) UNSIGNED NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY ( `sportsman_sport_id` )
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__sportsman_divisions` (
  `sportsman_division_id` bigint(20) UNSIGNED NOT NULL auto_increment,
  `sportsman_sport_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `access` int(11) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ended_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY ( `sportsman_division_id` )
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__sportsman_teams` (
  `sportsman_team_id` bigint(20) UNSIGNED NOT NULL auto_increment,
  `sportsman_division_id` bigint(20) UNSIGNED NOT NULL,
  `sportsman_club_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `sponsor` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL DEFAULT 'media/com_sportsman/images/default_logo.png',
  `photo` varchar(255) NOT NULL DEFAULT 'media/com_sportsman/images/team_photo.jpg',
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ended_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY ( `sportsman_team_id` )
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__sportsman_clubs` (
  `sportsman_club_id` bigint(20) UNSIGNED NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `logo` varchar(60),
  PRIMARY KEY ( `sportsman_club_id` )
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__sportsman_venues` (
  `sportsman_venue_id` bigint(20) UNSIGNED NOT NULL auto_increment,
  `sportsman_club_id` bigint(20) UNSIGNED NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY ( `sportsman_venue_id` )
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__sportsman_teams_members` (
  `sportsman_team_id` bigint(20) UNSIGNED NOT NULL,
  `sportsman_member_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY ( `sportsman_team_id`, `sportsman_member_id )
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__sportsman_members` (
  `sportsman_member_id` bigint(20) UNSIGNED NOT NULL auto_increment,
  PRIMARY KEY ( `sportsman_member_id` )
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__sportsman_games` (
  `sportsman_game_id` bigint(20) UNSIGNED NOT NULL auto_increment,
  `sportsman_tournament_id` bigint(20) UNSIGNED NOT NULL,
  `sportsman_home_team_id` bigint(20) UNSIGNED NOT NULL,
  `sportsman_away_team_id` bigint(20) UNSIGNED NOT NULL,
  `sportsman_venue_id` bigint(20) UNSIGNED NOT NULL,
  `game_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `home_team_score` tinyint(3) NOT NULL,
  `away_team_score` tinyint(3) NOT NULL,
  PRIMARY KEY ( `sportsman_game_id` )
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__sportsman_tournaments` (
  `sportsman_tournament_id` bigint(20) UNSIGNED NOT NULL auto_increment,
  `sportsman_division_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ended_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY ( `sportsman_tournament_id` )
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__sportsman_basketballstats` (
  `sportsman_basketballstat_id` bigint(20) UNSIGNED NOT NULL auto_increment,
  PRIMARY KEY ( `sportsman_basketballstat_id` )
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__sportsman_baseballstats` (
  `sportsman_baseballstat_id` bigint(20) UNSIGNED NOT NULL auto_increment,
  PRIMARY KEY ( `sportsman_baseballstat_id` )
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__sportsman_softballstats` (
  `sportsman_softballstat_id` bigint(20) UNSIGNED NOT NULL auto_increment,
  PRIMARY KEY ( `sportsman_softballstat_id` )
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

INSERT INTO `#__sportsman_teams` (`sportsman_team_id`, `sportsman_division_id`, `title`, `sponsor`, `enabled`) VALUES 
(1, 2, 'Aruba Jrs Pirates', 'Banco di Caribe', 1),
(2, 8, 'Aruba Juniors', 'Aruba Lions', 1),
(3, 5, 'Blue Devils', 'Radio Shack', 1),
(4, 7, 'Aruba Juniors', 'Aruba Juniors', 1)

INSERT INTO `#__sportsman_clubs` VALUES (1, 'None');
INSERT INTO `#__sportsman_clubs` VALUES (2, 'Club');

INSERT INTO `#__sportsman_venues` VALUES (1, NULL, 'None');

INSERT INTO `#__sportsman_games` VALUES (1, 1, 6, 'Aruba Juniors', '2011-09-01 19:00:00', 102, 98);

INSERT INTO `#__files_containers` VALUES (NULL, 'sportsman-team-logos', 'Container for sportsman team logos', 'images/sportsman/teams/logo', '{\"upload_extensions\":\"jpg,jpeg,png,gif\",\"upload_maxsize\":1048576,\"check_mime\":0}');

CREATE OR REPLACE VIEW `#__sportsman_view_divisions` AS
  SELECT tbl.*, s.title AS sport_title
  FROM `#__sportsman_divisions` AS tbl
  LEFT JOIN `#__sportsman_sports` AS s ON s.sportsman_sport_id = tbl.sportsman_sport_id;
  
CREATE OR REPLACE VIEW `#__sportsman_view_venues` AS
  SELECT tbl.*, c.title AS club_title
  FROM `#__sportsman_venues` AS tbl
  LEFT JOIN `#__sportsman_clubs` AS s ON c.sportsman_club_id = tbl.sportsman_club_id;
  
CREATE OR REPLACE VIEW `#__sportsman_view_teams` AS
  SELECT tbl.*, d.title AS division_title, s.title AS sport_title, c.title AS club_title, s.sportsman_sport_id
  FROM `#__sportsman_teams` AS tbl
  LEFT JOIN `#__sportsman_clubs` AS c ON c.sportsman_club_id = tbl.sportsman_club_id
  LEFT JOIN `#__sportsman_divisions` AS d ON d.sportsman_division_id = tbl.sportsman_division_id
  LEFT JOIN `#__sportsman_sports` AS s ON s.sportsman_sport_id = d.sportsman_sport_id;
  
CREATE OR REPLACE VIEW `#__sportsman_view_tournaments` AS
  SELECT tbl.*, d.title AS division_title, s.title AS sport_title, s.sportsman_sport_id
  FROM `#__sportsman_tournaments` AS tbl
  LEFT JOIN `#__sportsman_divisions` AS d ON d.sportsman_division_id = tbl.sportsman_division_id
  LEFT JOIN `#__sportsman_sports` AS s ON s.sportsman_sport_id = d.sportsman_sport_id;
  
CREATE OR REPLACE VIEW `#__sportsman_view_games` AS
  SELECT tbl.*, h.title AS home_team_title, h.sportsman_club_id AS home_team_club_id,
    a.title AS away_team_title, a.sportsman_club_id AS away_team_club_id,
    t.title AS tournament_title, d.sportsman_division_id, d.title AS division_title, s.sportsman_sport_id, s.title AS sports_title,
    v.title AS venue_title
  FROM `#__sportsman_games` AS tbl 
  LEFT OUTER JOIN `#__sportsman_teams` AS h ON h.sportsman_team_id = tbl.home_team_id
  LEFT OUTER JOIN `#__sportsman_teams` AS a ON a.sportsman_team_id = tbl.away_team_id 
  LEFT JOIN `#__sportsman_tournaments` AS t ON tbl.sportsman_tournament_id = t.sportsman_tournament_id
  LEFT JOIN `#__sportsman_venues` AS v ON tbl.sportsman_venue_id = v.sportsman_venue_id
  LEFT JOIN `#__sportsman_divisions` AS d ON h.sportsman_division_id = d.sportsman_division_id
  LEFT JOIN `#__sportsman_sports` AS s ON d.sportsman_sport_id = s.sportsman_sport_id

