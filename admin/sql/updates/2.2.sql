CREATE TABLE IF NOT EXISTS `#__identityproof_facebook` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `facebook_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `hometown` varchar(128) NOT NULL DEFAULT '',
  `link` varchar(256) NOT NULL,
  `website` varchar(64) DEFAULT NULL,
  `picture` varchar(512) DEFAULT NULL,
  `verified` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__identityproof_google` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `google_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `location` varchar(128) NOT NULL DEFAULT '',
  `link` varchar(256) NOT NULL,
  `website` varchar(64) DEFAULT NULL,
  `picture` varchar(512) DEFAULT NULL,
  `verified` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__identityproof_twitter` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `twitter_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(128) NOT NULL DEFAULT '',
  `link` varchar(256) NOT NULL,
  `website` varchar(64) DEFAULT NULL,
  `picture` varchar(512) DEFAULT NULL,
  `verified` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;