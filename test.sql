-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

INSERT INTO `members` (`id`, `username`, `address`) VALUES
(1, 'ema cha cha', 'kajang durjana'),
(2, 'jijie lol', 'jb'),
(3, '', 'hebat'),
(4, 'aiman', 'awesome');