-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08 Mai 2018 la 13:49
-- Versiune server: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sundaybrawl`
--
CREATE DATABASE IF NOT EXISTS `sundaybrawl` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sundaybrawl`;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `abilities`
--

CREATE TABLE `abilities` (
  `abilityId` int(11) NOT NULL,
  `charId` int(11) NOT NULL,
  `description` varchar(20) CHARACTER SET utf32 COLLATE utf32_romanian_ci NOT NULL,
  `name` varchar(20) CHARACTER SET utf32 COLLATE utf32_romanian_ci NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `asocchars`
--

CREATE TABLE `asocchars` (
  `charId` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `username` varchar(20) CHARACTER SET utf32 COLLATE utf32_romanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `asocitems`
--

CREATE TABLE `asocitems` (
  `username` varchar(20) CHARACTER SET utf32 COLLATE utf32_romanian_ci NOT NULL,
  `itemId` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `char`
--

CREATE TABLE `char` (
  `charId` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `bio` text CHARACTER SET utf32 COLLATE utf32_romanian_ci NOT NULL,
  `imgUrl` text NOT NULL,
  `att` int(11) NOT NULL,
  `def` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `type` int(11) NOT NULL,
  `imgUrl` varchar(20) NOT NULL,
  `price` int(11) NOT NULL,
  `att` int(11) NOT NULL,
  `def` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `user`
--

CREATE TABLE `user` (
  `username` varchar(20) CHARACTER SET utf32 COLLATE utf32_romanian_ci NOT NULL,
  `password` varchar(20) CHARACTER SET utf32 COLLATE utf32_romanian_ci NOT NULL,
  `email` varchar(20) CHARACTER SET utf32 COLLATE utf32_romanian_ci NOT NULL,
  `wins` int(11) NOT NULL DEFAULT '0',
  `losses` int(11) NOT NULL DEFAULT '0',
  `gamesPlayed` int(11) NOT NULL DEFAULT '0',
  `gamesPlayedWithAChar` int(11) NOT NULL COMMENT 'De implementat'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `userchr`
--

CREATE TABLE `userchr` (
  `username` varchar(20) CHARACTER SET utf32 COLLATE utf32_romanian_ci NOT NULL,
  `charId` int(11) NOT NULL,
  `lvl` int(11) NOT NULL,
  `gamesPlayed` int(11) NOT NULL,
  `gamesWon` int(11) NOT NULL,
  `gamesLost` int(11) NOT NULL,
  `selectedSkills` int(11) NOT NULL COMMENT 'De implementat'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abilities`
--
ALTER TABLE `abilities`
  ADD PRIMARY KEY (`abilityId`),
  ADD KEY `charId` (`charId`);

--
-- Indexes for table `asocchars`
--
ALTER TABLE `asocchars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `charId` (`charId`),
  ADD KEY `username` (`username`,`charId`);

--
-- Indexes for table `asocitems`
--
ALTER TABLE `asocitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `itemId` (`itemId`);

--
-- Indexes for table `char`
--
ALTER TABLE `char`
  ADD PRIMARY KEY (`charId`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `userchr`
--
ALTER TABLE `userchr`
  ADD PRIMARY KEY (`username`,`charId`);

--
-- Restrictii pentru tabele sterse
--

--
-- Restrictii pentru tabele `abilities`
--
ALTER TABLE `abilities`
  ADD CONSTRAINT `abilities_ibfk_1` FOREIGN KEY (`charId`) REFERENCES `char` (`charId`);

--
-- Restrictii pentru tabele `asocchars`
--
ALTER TABLE `asocchars`
  ADD CONSTRAINT `asocchars_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `asocchars_ibfk_2` FOREIGN KEY (`charId`) REFERENCES `char` (`charId`),
  ADD CONSTRAINT `asocchars_ibfk_3` FOREIGN KEY (`username`,`charId`) REFERENCES `userchr` (`username`, `charId`);

--
-- Restrictii pentru tabele `asocitems`
--
ALTER TABLE `asocitems`
  ADD CONSTRAINT `asocitems_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `asocitems_ibfk_2` FOREIGN KEY (`itemId`) REFERENCES `items` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
