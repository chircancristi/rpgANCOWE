-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21 Mai 2018 la 13:32
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

--
-- Salvarea datelor din tabel `abilities`
--

INSERT INTO `abilities` (`abilityId`, `charId`, `description`, `name`, `type`) VALUES
(1, 3, 'Rupe fasu!', 'Rasengan', 1),
(2, 1, 'Arunca o panza matas', 'Simtul paianjenului', 2),
(3, 3, 'O tamaduire foarte s', 'Jarvis!AJUTOR!!!', 2);

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

--
-- Salvarea datelor din tabel `char`
--

INSERT INTO `char` (`charId`, `name`, `bio`, `imgUrl`, `att`, `def`) VALUES
(1, 'SpiderMan', 'biologie', 'https://scontent.fsbz1-2.fna.fbcdn.net/v/t1.15752-9/33093475_1695539893816676_4138980599274668032_n.png?_nc_cat=0&oh=35b5f537d311579ad6c1f3e14125002a&oe=5B81A209', 15, 10),
(2, 'IronMan', 'O masina de spalat ce a fost lovita de un fulger radioactiv!', 'https://scontent.fsbz1-2.fna.fbcdn.net/v/t1.15752-9/33093475_1695539893816676_4138980599274668032_n.png?_nc_cat=0&oh=35b5f537d311579ad6c1f3e14125002a&oe=5B81A209', 30, 30),
(3, 'Naruto', 'Saaaaasuuuuukeeeeeeeeeeeee!', 'https://scontent.fsbz1-2.fna.fbcdn.net/v/t1.15752-9/33093475_1695539893816676_4138980599274668032_n.png?_nc_cat=0&oh=35b5f537d311579ad6c1f3e14125002a&oe=5B81A209', 25, 20),
(4, 'Ichigo', 'Ala din bleach', 'https://scontent.fsbz1-2.fna.fbcdn.net/v/t1.15752-9/33093475_1695539893816676_4138980599274668032_n.png?_nc_cat=0&oh=35b5f537d311579ad6c1f3e14125002a&oe=5B81A209', 0, 0);

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

--
-- Salvarea datelor din tabel `items`
--

INSERT INTO `items` (`id`, `name`, `type`, `imgUrl`, `price`, `att`, `def`) VALUES
(1, 'Batista lui SuperMan', 1, 'https://scontent.fsb', 230, 20, 5),
(2, 'Toporul lui Odin', 1, 'https://scontent.fsb', 500, 50, 15),
(3, 'Fesul lui Dublu D', 0, 'https://scontent.fsb', 150, 0, 30);

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

--
-- Salvarea datelor din tabel `user`
--

INSERT INTO `user` (`username`, `password`, `email`, `wins`, `losses`, `gamesPlayed`, `gamesPlayedWithAChar`) VALUES
('anggabard', 'ceapa123', 'jlik@hotman.com', 9999, 0, 13, 2),
('rzv420zbegu', 'nam', 'IamZbegu@html.css', 123, 321, 2, 0),
('TO', 'il las', 'teo_jmen@bo.ss', 69, 96, 3, 44),
('urcanCurcan', 'suntparola', 'cristy_raw@yahoo.sc', -1, 100, 20, 23);

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
