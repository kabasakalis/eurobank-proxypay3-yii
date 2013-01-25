-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 25, 2013 at 02:35 PM
-- Server version: 5.1.66-cll
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `mer_ref` varchar(20) NOT NULL COMMENT 'Merchant Reference,Order ID',
  `amount` varchar(20) NOT NULL COMMENT 'Transaction Amount',
  `currency` varchar(6) NOT NULL,
  `mer_id` varchar(30) NOT NULL,
  KEY `mer_ref` (`mer_ref`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transactions_done`
--

CREATE TABLE IF NOT EXISTS `transactions_done` (
  `shop` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `currencysymbol` varchar(10) NOT NULL,
  `ref` varchar(30) NOT NULL,
  `transid` varchar(128) NOT NULL,
  `var1` varchar(30) NOT NULL,
  `var2` varchar(30) NOT NULL,
  `var3` varchar(30) NOT NULL,
  `var4` varchar(30) NOT NULL,
  `var5` varchar(30) NOT NULL,
  `var6` varchar(30) NOT NULL,
  `var7` varchar(30) NOT NULL,
  `var8` varchar(30) NOT NULL,
  `var9` varchar(30) NOT NULL,
  `method` varchar(30) NOT NULL,
  `datetime` varchar(20) NOT NULL,
  `remoteaddr` varchar(10) NOT NULL,
  UNIQUE KEY `OrderID` (`ref`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
