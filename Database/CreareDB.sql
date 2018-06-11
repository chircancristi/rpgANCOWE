-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2018 at 09:09 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

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
-- Table structure for table `abilities`
--

CREATE TABLE `abilities` (
  `abilityId` int(11) NOT NULL,
  `charId` int(11) NOT NULL,
  `description` varchar(20) CHARACTER SET utf32 COLLATE utf32_romanian_ci NOT NULL,
  `name` varchar(20) CHARACTER SET utf32 COLLATE utf32_romanian_ci NOT NULL,
  `type` int(11) NOT NULL,
  `ImgUrl` text NOT NULL,
  `heal` int(11) NOT NULL,
  `dmg` int(11) NOT NULL,
  `att` int(11) NOT NULL,
  `def` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `abilities`
--

INSERT INTO `abilities` (`abilityId`, `charId`, `description`, `name`, `type`, `ImgUrl`, `heal`, `dmg`, `att`, `def`) VALUES
(1, 1, '', 'Punch', 1, '../../webroot/img/ability1.png', 0, 50, 20, 0),
(2, 1, '', 'Rage', 2, '../../webroot/img/ability2.jpg', 0, 10, 30, 30),
(3, 1, '', 'Iron Skin', 3, '../../webroot/img/ability3.jpg', 0, 0, 40, 40),
(4, 1, '', 'HULK SMASH!', 4, '../../webroot/img/ability4.png', 0, 70, 10, 0),
(5, 2, '', 'Sexy justsu', 1, '../../webroot/img/ability5.png', 30, 0, 10, 10),
(6, 2, '', 'Shadow Clone', 2, '../../webroot/img/ability6.jpg', 0, 30, 10, 10),
(7, 2, '', 'Rasengan', 3, '../../webroot/img/ability7.jpg', 0, 50, 0, 0),
(8, 2, '', 'Rasen Shuriken', 4, '../../webroot/img/ability8.jpg', 0, 80, 15, 0),
(9, 3, '', 'Low Kick', 1, '../../webroot/img/ability9.png', 0, 20, 0, 0),
(10, 3, '', 'Web Shot', 2, '../../webroot/img/ability10.jpg', 0, 0, 10, 10),
(11, 3, '', 'Spider Sense', 3, '../../webroot/img/ability11.jpg', 0, 0, 25, 40),
(12, 3, '', 'Impress MJ', 4, '../../webroot/img/ability12.png', 30, 50, 15, 15),
(13, 4, '', 'Super Punch', 1, '../../webroot/img/ability13.png', 0, 40, 0, 10),
(14, 4, '', 'Laser Vision', 2, '../../webroot/img/ability14.jpg', 10, 30, 0, 0),
(15, 4, '', 'Tornado', 3, '../../webroot/img/ability15.jpg', 0, 30, 0, 30),
(16, 4, '', 'Solar Power', 4, '../../webroot/img/ability16.jpg', 50, 0, 20, 50),
(17, 5, '', 'Sword Attack', 1, '../../webroot/img/ability17.jpg', 0, 20, 15, 0),
(18, 5, '', 'Grappling Hook', 2, '../../webroot/img/ability18.jpg', 20, 0, 10, 0),
(19, 5, '', 'First Aid', 3, '../../webroot/img/ability19.png', 40, 0, 10, 20),
(20, 5, '', 'Titan Transform', 4, '../../webroot/img/ability20.jpg', 30, 15, 30, 30),
(21, 6, '', 'Ki Blast', 1, '../../webroot/img/ability21.jpg', 0, 20, 5, 5),
(22, 6, '', 'Twin Dragon Shot', 2, '../../webroot/img/ability22.jpg', 0, 25, 10, 10),
(23, 6, '', 'Finger Beam', 3, '../../webroot/img/ability23.png', 0, 30, 10, 10),
(24, 6, '', '10x God Kamehameha', 4, '../../webroot/img/ability24.png', 20, 50, 15, 15),
(25, 1, '', 'Charge', 1, '../../webroot/img/ability25.png', 0, 35, 0, 15),
(26, 1, '', 'Drop Kick', 2, '../../webroot/img/ability26.jpg', 0, 40, 10, 10),
(27, 1, '', 'Flex Muscles', 3, '../../webroot/img/ability27.jpg', 20, 0, 20, 20),
(28, 1, '', 'Gamma Quake', 4, '../../webroot/img/ability28.jpg', 15, 30, 20, 20),
(29, 2, '', 'Summoning Technique ', 1, '../../webroot/img/ability29.jpg', 0, 0, 25, 25),
(30, 2, '', 'Sage Mode', 2, '../../webroot/img/ability30.jpg', 15, 30, 20, 20),
(31, 2, '', ' Six Paths Mode', 3, '../../webroot/img/ability31.jpg', 15, 0, 50, 0),
(32, 2, '', 'Tailed Beast Bomb', 4, '../../webroot/img/ability32.jpg', 0, 70, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `asocitems`
--

CREATE TABLE `asocitems` (
  `username` varchar(20) CHARACTER SET utf32 COLLATE utf32_romanian_ci NOT NULL,
  `itemId` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asocitems`
--

INSERT INTO `asocitems` (`username`, `itemId`, `id`) VALUES
('anggabard', 1, 119),
('anggabard', 3, 120);

-- --------------------------------------------------------

--
-- Table structure for table `char`
--

CREATE TABLE `char` (
  `charId` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `bio` varchar(1000) CHARACTER SET utf32 COLLATE utf32_romanian_ci NOT NULL,
  `imgUrl` text NOT NULL,
  `att` int(11) NOT NULL,
  `def` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `char`
--

INSERT INTO `char` (`charId`, `name`, `bio`, `imgUrl`, `att`, `def`) VALUES
(1, 'Hulk', 'Caught in a gamma bomb explosion while trying to save the life of a teenager, Dr. Bruce Banner was transformed into the incredibly powerful creature called the Hulk. An all too often misunderstood hero, the angrier the Hulk gets, the stronger the Hulk gets.', '../../webroot/img/char_portrait_1.jpg', 80, 80),
(2, 'Naruto', 'Naruto Uzumaki is a shinobi of Konohagakure and a descendant of the Uzumaki clan. He became the jinchuriki of the Nine-Tails on the day of his birth - a fate that caused him to be shunned by most of Konoha throughout his childhood. After joining Team Kakashi, Naruto worked hard to gain the village\'s acknowledgement all the while chasing his dream to become Hokage.', '../../webroot/img/char_portrait_2.jpg', 50, 30),
(3, 'SpiderMan', 'Bitten by a radioactive spider, high school student Peter Parker gained the speed, strength and powers of a spider. Adopting the name Spider-Man, Peter hoped to start a career using his new abilities. Taught that with great power comes great responsibility, Spidey has vowed to use his powers to help people.', '../../webroot/img/char_portrait_3.jpg', 15, 10),
(4, 'SuperMan', 'Superman is born on an alien world to a technologically advanced species that resembles humans. When his world is on the verge of destruction, his father, a scientist, places his infant son alone in a spaceship that takes him to Earth.', '../../webroot/img/char_portrait_4.jpg', 80, 60),
(5, 'Eren Jaeger', 'Eren Jeager is a member of the Survey Corps. He lived in the Shiganshina District with his parents and adopted sister Mikasa Ackerman until the fall of Wall Maria. During the incident, Eren impotently witnessed his mother being eaten by a Titan. This event aroused in Eren an intense hatred towards the Titans, and he swore to wipe all of them off the face of the Earth.', '../../webroot/img/char_portrait_5.jpg', 2, 5),
(6, 'Goku', 'Son Goku, born Kakarot, is a male Saiyan. Cheerful, tenacious, and also a bit naive, Goku is a Saiyan originally sent to Earth as an infant with the mission to destroy it. However, an accident alters his memory, allowing him to grow up pure-hearted and become Earth\'s greatest defender, as well as the informal leader of the Dragon Team. Throughout his life, he constantly strives and trains to be the greatest warrior possible and to fight stronger opponents, which has kept the Earth and the universe safe from destruction many times.', '../../webroot/img/char_portrait_6.jpg', 80, 50);

-- --------------------------------------------------------

--
-- Table structure for table `gamesinprogress`
--

CREATE TABLE `gamesinprogress` (
  `id` int(11) NOT NULL,
  `usernamePlayer1` varchar(20) CHARACTER SET utf32 COLLATE utf32_romanian_ci NOT NULL,
  `usernamePlayer2` varchar(20) CHARACTER SET utf32 COLLATE utf32_romanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gamesinprogress`
--

INSERT INTO `gamesinprogress` (`id`, `usernamePlayer1`, `usernamePlayer2`) VALUES
(1, 'iusti', 'anggabard');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `type` int(11) NOT NULL,
  `imgUrl` varchar(40) NOT NULL,
  `price` int(11) NOT NULL,
  `att` int(11) NOT NULL,
  `def` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `type`, `imgUrl`, `price`, `att`, `def`) VALUES
(1, 'Batista lui SuperMan', 1, '../../webroot/img/weapon1.jpg', 230, 20, 5),
(2, 'Toporul lui Odin', 1, '../../webroot/img/weapon2.jpg', 500, 50, 15),
(3, 'Fesul lui Dublu D', 0, '../../webroot/img/armor1.jpg', 150, 0, 30),
(4, 'Aparatoare de Cap', 0, '../../webroot/img/armor2.jpg', 150, 0, 20),
(5, 'Sabia lui DEADPOOL', 1, '../../webroot/img/weapon3.jpg', 450, 40, 20),
(6, 'Sort de Bucatarie', 0, '../../webroot/img/armor3.jpg', 650, 0, 100);

-- --------------------------------------------------------

--
-- Table structure for table `playersingame`
--

CREATE TABLE `playersingame` (
  `gameId` int(11) NOT NULL,
  `username` varchar(20) CHARACTER SET utf32 COLLATE utf32_romanian_ci NOT NULL,
  `att` int(11) NOT NULL,
  `dff` int(11) NOT NULL,
  `health` int(11) NOT NULL,
  `charId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playersingame`
--

INSERT INTO `playersingame` (`gameId`, `username`, `att`, `dff`, `health`, `charId`) VALUES
(1, 'anggabard', 100, 115, 100, 0),
(1, 'iusti', 50, 30, 100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) CHARACTER SET utf32 COLLATE utf32_romanian_ci NOT NULL,
  `password` varchar(20) CHARACTER SET utf32 COLLATE utf32_romanian_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf32 COLLATE utf32_romanian_ci NOT NULL,
  `money` int(11) NOT NULL,
  `wins` int(11) NOT NULL DEFAULT '0',
  `losses` int(11) NOT NULL DEFAULT '0',
  `gamesPlayed` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `email`, `money`, `wins`, `losses`, `gamesPlayed`) VALUES
('Adam', 'sexyEva', 'primul_nostru.user@hotmail.com', 0, 0, 0, 0),
('anggabard', 'ceapa123', 'dasda@gelu.com', 115293, 9999, -1, 2),
('bestiaDinMoldova', 'bunbun', 'popopica.marinaru@yahoo.com', 0, 0, 0, 0),
('gelu', 'dada', 'dan.chircan@gmail.com', 0, 0, 0, 0),
('giigiii', 'acxz', 'dorel@yahoo.com', 0, 0, 0, 0),
('ioio', 'yoyo', '123', 123, 321, 2, 4),
('iusti', 'muzica', 'iustinaiosub@yahoo.com', 0, 0, 0, 0),
('kamikaze', 'lala', 'sandu@love.com', 0, 0, 0, 0),
('Lemnesh2', 'CEAMAIJMK', 'ploaetdr@yahoo.com', 119, 0, 0, 0),
('rzv420zbegu', 'nam', 'IamZbegu@html.css', 0, 123, 321, 2),
('TO', 'ilLas', 'teo_jmen@bo.ss', 0, 69, 96, 3),
('urcanCurcan', 'suntparola', 'cristy_raw@yahoo.sc', 0, -1, 100, 20);

-- --------------------------------------------------------

--
-- Table structure for table `userchr`
--

CREATE TABLE `userchr` (
  `username` varchar(20) CHARACTER SET utf32 COLLATE utf32_romanian_ci NOT NULL,
  `charId` int(11) NOT NULL,
  `lvl` int(11) NOT NULL,
  `gamesPlayed` int(11) NOT NULL,
  `gamesWon` int(11) NOT NULL,
  `gamesLost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userchr`
--

INSERT INTO `userchr` (`username`, `charId`, `lvl`, `gamesPlayed`, `gamesWon`, `gamesLost`) VALUES
('anggabard', 1, 0, 0, 0, 0),
('anggabard', 2, 0, 0, 0, 0),
('anggabard', 3, 0, 0, 0, 0),
('anggabard', 4, 1, 0, 0, 0),
('anggabard', 5, 4, 0, 0, 0),
('anggabard', 6, 6, 0, 0, 0),
('bestiaDinMoldova', 1, 0, 0, 0, 0),
('bestiaDinMoldova', 2, 0, 0, 0, 0),
('bestiaDinMoldova', 3, 0, 0, 0, 0),
('bestiaDinMoldova', 4, 0, 0, 0, 0),
('bestiaDinMoldova', 5, 0, 0, 0, 0),
('bestiaDinMoldova', 6, 0, 0, 0, 0),
('gelu', 1, 0, 0, 0, 0),
('gelu', 2, 0, 0, 0, 0),
('gelu', 3, 0, 0, 0, 0),
('gelu', 4, 0, 0, 0, 0),
('gelu', 5, 0, 0, 0, 0),
('gelu', 6, 0, 0, 0, 0),
('giigiii', 1, 0, 0, 0, 0),
('giigiii', 2, 0, 0, 0, 0),
('giigiii', 3, 0, 0, 0, 0),
('giigiii', 4, 0, 0, 0, 0),
('giigiii', 5, 0, 0, 0, 0),
('giigiii', 6, 0, 0, 0, 0),
('ioio', 1, 0, 0, 0, 0),
('ioio', 2, 0, 0, 0, 0),
('ioio', 3, 0, 0, 0, 0),
('ioio', 4, 0, 0, 0, 0),
('ioio', 5, 0, 0, 0, 0),
('ioio', 6, 0, 0, 0, 0),
('iusti', 1, 0, 0, 0, 0),
('iusti', 2, 0, 0, 0, 0),
('iusti', 3, 0, 0, 0, 0),
('iusti', 4, 0, 0, 0, 0),
('iusti', 5, 0, 0, 0, 0),
('iusti', 6, 0, 0, 0, 0),
('kamikaze', 1, 0, 0, 0, 0),
('kamikaze', 2, 0, 0, 0, 0),
('kamikaze', 3, 0, 0, 0, 0),
('kamikaze', 4, 0, 0, 0, 0),
('kamikaze', 5, 0, 0, 0, 0),
('kamikaze', 6, 0, 0, 0, 0),
('Lemnesh2', 1, 0, 0, 0, 0),
('Lemnesh2', 2, 0, 0, 0, 0),
('Lemnesh2', 3, 0, 0, 0, 0),
('Lemnesh2', 4, 0, 0, 0, 0),
('Lemnesh2', 5, 0, 0, 0, 0),
('Lemnesh2', 6, 0, 0, 0, 0);

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
-- Indexes for table `gamesinprogress`
--
ALTER TABLE `gamesinprogress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usernamePlayer1` (`usernamePlayer1`),
  ADD KEY `usernamePlayer2` (`usernamePlayer2`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playersingame`
--
ALTER TABLE `playersingame`
  ADD PRIMARY KEY (`username`),
  ADD KEY `charId` (`charId`),
  ADD KEY `gameId` (`gameId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `userchr`
--
ALTER TABLE `userchr`
  ADD PRIMARY KEY (`username`,`charId`),
  ADD KEY `charId` (`charId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abilities`
--
ALTER TABLE `abilities`
  MODIFY `abilityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `asocitems`
--
ALTER TABLE `asocitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `abilities`
--
ALTER TABLE `abilities`
  ADD CONSTRAINT `abilities_ibfk_1` FOREIGN KEY (`charId`) REFERENCES `char` (`charId`);

--
-- Constraints for table `asocitems`
--
ALTER TABLE `asocitems`
  ADD CONSTRAINT `asocitems_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `asocitems_ibfk_2` FOREIGN KEY (`itemId`) REFERENCES `items` (`id`);

--
-- Constraints for table `playersingame`
--
ALTER TABLE `playersingame`
  ADD CONSTRAINT `playersingame_ibfk_5` FOREIGN KEY (`gameId`) REFERENCES `gamesinprogress` (`id`) ON UPDATE NO ACTION;

--
-- Constraints for table `userchr`
--
ALTER TABLE `userchr`
  ADD CONSTRAINT `userchr_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `userchr_ibfk_2` FOREIGN KEY (`charId`) REFERENCES `char` (`charId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
