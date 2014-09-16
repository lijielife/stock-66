-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 16, 2013 at 05:14 PM
-- Server version: 5.5.34
-- PHP Version: 5.3.10-1ubuntu3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `stock_algunas`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent`) VALUES
(1, 'remeritas', NULL),
(2, 'nena cula', NULL),
(3, 'pañuelito', NULL),
(4, 'vestiditos de plush', NULL),
(5, 'vestiditos de lana', NULL),
(6, 'sucundrules', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE IF NOT EXISTS `expenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `comment` varchar(3000) DEFAULT NULL,
  `stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `movements`
--

CREATE TABLE IF NOT EXISTS `movements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `movementstypes_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `unitprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `comment` varchar(3000) DEFAULT NULL,
  `stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `movementtypes_id` (`movementstypes_id`),
  KEY `products_id` (`products_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `movements`
--

INSERT INTO `movements` (`id`, `movementstypes_id`, `products_id`, `quantity`, `unitprice`, `comment`, `stamp`) VALUES
(1, 1, 18, 3, 0.00, 'Venta al público', '2013-12-07 20:58:30'),
(2, 1, 19, 50, 0.00, 'Compra a proveedor', '2013-12-07 21:15:51'),
(3, 1, 20, 2, 0.00, 'Compra a proveedor', '2013-12-07 21:19:09'),
(4, 1, 19, 10, 49.00, '', '2013-12-08 20:40:18'),
(5, 3, 19, 1, 49.00, 'Una vieja devuelve un batón', '2013-12-08 20:50:37'),
(6, 2, 19, -2, 49.00, '', '2013-12-08 20:53:09');

-- --------------------------------------------------------

--
-- Table structure for table `movementstypes`
--

CREATE TABLE IF NOT EXISTS `movementstypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `class` varchar(10) NOT NULL DEFAULT 'bg_grey',
  `sign` enum('-1','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `movementstypes`
--

INSERT INTO `movementstypes` (`id`, `name`, `class`, `sign`) VALUES
(1, 'Ingreso', 'EEEEEE', '1'),
(2, 'Devolución', 'EEEEEE', '1'),
(3, 'Baja', 'EEEEEE', '-1');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categories_id` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT '0',
  `code` varchar(20) NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `categories_id` (`categories_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `categories_id`, `description`, `stock`, `code`, `price`) VALUES
(1, 1, 'remerita pedorra 1', 10, '101010', 0.00),
(2, 0, 'werwer', 0, '345345', 0.00),
(3, 0, 'tyutyutyu', 0, '345543', 0.00),
(4, 2, 'chaleco de cuero', 0, '890098', 20.00),
(5, 3, 'camison piola', 0, '123451', 0.00),
(6, 3, 'pollera 3/4', 2, '7764', 0.00),
(7, 4, 'camperita de modal', 5, '342', 50.00),
(8, 4, 'remerita de los picapiedtas', 20, '123', 80.00),
(10, 4, 'remerita de los picapiedras', 20, '5435', 90.00),
(12, 1, 'remerita de razo', 43, '42343', 30.00),
(13, 1, 'pollerita bandana', 43, 'POPO9000', 50.00),
(14, 5, 'Chalequito de lino', 3, 'MONO4', 200.00),
(16, 3, 'Pollera amarilla', 21, 'MONO5', 100.00),
(18, 5, 'Camisa mágica', 0, 'MONO6', 300.00),
(19, 5, 'pollera coloraa', 0, '1', 49.00),
(20, 5, 'poncho de lana', 2, '22', 600.00);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` varchar(1000) DEFAULT NULL,
  `stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('new','pending','confirmed','cancelled') NOT NULL DEFAULT 'new',
  PRIMARY KEY (`id`),
  KEY `products_id` (`comment`(767))
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `saleslines`
--

CREATE TABLE IF NOT EXISTS `saleslines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unitprice` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sales_id` (`sales_id`),
  KEY `products_id` (`products_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
