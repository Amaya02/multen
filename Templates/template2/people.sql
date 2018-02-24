-- phpMyAdmin SQL Dump
-- version 2.9.0.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Mar 12, 2016 at 02:36 AM
-- Server version: 5.0.27
-- PHP Version: 5.2.0
-- 
-- Database: `people`
-- 
DROP DATABASE `people`;
CREATE DATABASE `people` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `people`;

-- --------------------------------------------------------

-- 
-- Table structure for table `persons`
-- 

CREATE TABLE `persons` (
  `id` int(6) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  `age` int(3) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- 
-- Dumping data for table `persons`
-- 

INSERT INTO `persons` (`id`, `name`, `age`) VALUES 
(1, 'Edang', 16),
(2, 'Enriquez', 16),
(3, 'mira', 69),
(4, 'Panch', 12),
(5, 'Toyama', 17),
(6, 'Daigo', 15),
(7, 'Paner', 18),
(8, 'Potty', 21);
