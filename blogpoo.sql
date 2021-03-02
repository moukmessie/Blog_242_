-- phpMyAdmin SQL Dump
-- Version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306 via TCP/IP
-- Server version: 10.4.14
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";





CREATE DATABASE IF NOT EXISTS `blogpoo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `blogpoo`;

----------------------------------------------------------------------------------------------
------------------------------------------------
-----   Table structure for table `articles`
------------------------------------------------

DROP TABLE IF EXISTS `articles`;
CREATE  TABLE IF NOT EXISTS `articles`(
    `id` int (11) NOT NULL AUTO_INCREMENT,
    `title` varchar (255) NOT NULL,
    `slug` varchar (255) NOT NULL,
    `introduction` text NOT NULL,
    `content` text NOT NULL?
    `created_at` datetime NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=142 DEFAULT CHARSET=latin1;

-----------------------------------------
-- Dumping data for table `article`
-----------------------------------------

INSERT INTO `articles` (`id`,`title`,`slug`,`introduction`,`content`,`created_at`) VALUES
-----addDATA----


----------------------------------------------------------
---- Table structure for table `comments`
----------------------------------------------------------

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments`(
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `author` varchar (255) NOT NULL,
    `content` text NOT  NULL,
    `created_at` datetime NOT NULL,
    `article_id` int(11) NOT NULL,
    PRIMARY KEY (`id`),
    KEY `FK_ARTICLES` (`article_id`)
)ENGINE=MyISAM AUTO_INCREMENT=204 DEFAULT CHARSET=latin1;


-----------------------------------------------
--- Dumping data for table `comments`
-----------------------------------------------

INSERT INTO `comments` (`id`,`author`,`content`,`created_at`,`article_id`)VALUES
-----addDATA----

-----------------------------------------------------------------------------------------------------

------------------------------------------------------
--- Table structure for `users`
------------------------------------------------------

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users`(
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `first_name` varchar (255) NOT NULL,
    `last_name` varchar (255) NOT NULL,
    `email` varchar (255) NOT NULL,
    PRIMARY KEY (`id`)
)ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

------------------------------------------------------
--- Dumping data for table `users`
------------------------------------------------------

INSERT INTO `users`(`id`,`first_name`,`last_name`,`email`)VALUES
-----addDATA----

COMMIT ;
