-- Users Table
-- -------------------------------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`(
    `ID` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
    `username` varchar(50) NOT NULL,
    `password` varchar(65) NOT NULL,
    `approved` boolean NOT NULL,
    `emailAddress` varchar(100) NOT NULL,
    `ipAddr` varchar(50) NOT NULL,
    PRIMARY KEY(`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- Users Session Saves
-- -------------------------------------------------
DROP TABLE IF EXISTS `session`;
CREATE TABLE `session`(
    `sID` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
    `username` varchar(50) NOT NULL,
    `sessionPages` varchar(200) NOT NULL,
    `ipAddr` varchar(50) NOT NULL,
    PRIMARY KEY(`sID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- Users Feedback
-- -------------------------------------------------
DROP TABLE IF EXISTS `feedback`;
CREATE TABLE `feedback`(
    `fID` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
    `username` varchar(50) NOT NULL,
    `rating` tinyint(3) NULL,
    `answer` text NULL,
    `type` varchar(100) NULL,
    `section` varchar(100) NULL,
    PRIMARY KEY(`fID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Logging and Tracking
-- -------------------------------------------------
DROP TABLE IF EXISTS `logs`;
CREATE TABLE `logs`(
    `lID` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
    `ipAddr` varchar(50) NOT NULL,
    `page` varchar(100) NULL,
    `date` date NOT NULL,
    `timestamp` int(16) NOT NULL,
    PRIMARY KEY(`lID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `loginLogs`;
CREATE TABLE `loginLogs`(
    `ulogID` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
    `username` varchar(50) NOT NULL,
    `lastLogin` int(16) NOT NULL,
    `ipAddr` varchar(50) NOT NULL,
    PRIMARY KEY(`ulogID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;