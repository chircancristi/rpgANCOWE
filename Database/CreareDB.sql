-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12 Iun 2018 la 01:28
-- Versiune server: 10.1.32-MariaDB
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
-- Structura de tabel pentru tabelul `abilities`
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
-- Salvarea datelor din tabel `abilities`
--

INSERT INTO `abilities` (`abilityId`, `charId`, `description`, `name`, `type`, `ImgUrl`, `heal`, `dmg`, `att`, `def`) VALUES
(1, 1, '0/10/2/1', 'Punch', 1, '../../webroot/img/ability1.png', 0, 10, 2, 1),
(2, 1, '0/15/2/2', 'Rage', 2, '../../webroot/img/ability2.jpg', 0, 15, 2, 2),
(3, 1, '15/0/0/2', 'Iron Skin', 3, '../../webroot/img/ability3.jpg', 15, 0, 0, 2),
(4, 1, '0/20/4/4', 'HULK SMASH!', 4, '../../webroot/img/ability4.png', 0, 20, 4, 4),
(5, 2, '0/11/1/0', 'Sexy justsu', 1, '../../webroot/img/ability5.png', 0, 11, 1, 0),
(6, 2, '0/13/2/1', 'Shadow Clone', 2, '../../webroot/img/ability6.jpg', 0, 13, 2, 1),
(7, 2, '20/0/0/0', 'Rasengan', 3, '../../webroot/img/ability7.jpg', 20, 0, 0, 0),
(8, 2, '0/30/0/0', 'Rasen Shuriken', 4, '../../webroot/img/ability8.jpg', 0, 30, 0, 0),
(9, 3, '0/18/0/-4', 'Low Kick', 1, '../../webroot/img/ability9.png', 0, 18, 0, -4),
(10, 3, '0/18/2/-2', 'Web Shot', 2, '../../webroot/img/ability10.jpg', 0, 18, 2, -2),
(11, 3, '18/0/0/1', 'Spider Sense', 3, '../../webroot/img/ability11.jpg', 18, 0, 0, 1),
(12, 3, '0/0/0/18', 'Impress MJ', 4, '../../webroot/img/ability12.png', 0, 0, 0, 18),
(13, 4, '0/14/1/2', 'Super Punch', 1, '../../webroot/img/ability13.png', 0, 14, 1, 2),
(14, 4, '0/16/0/0', 'Laser Vision', 2, '../../webroot/img/ability14.jpg', 0, 16, 0, 0),
(15, 4, '20/0/4/0', 'Tornado', 3, '../../webroot/img/ability15.jpg', 20, 0, 4, 0),
(16, 4, '5/10/10/10', 'Solar Power', 4, '../../webroot/img/ability16.jpg', 5, 10, 10, 10),
(17, 5, '0/18/1/-1', 'Sword Attack', 1, '../../webroot/img/ability17.jpg', 0, 18, 1, -1),
(18, 5, '0/0/15/7', 'Grappling Hook', 2, '../../webroot/img/ability18.jpg', 0, 0, 15, 7),
(19, 5, '19/0/0/0', 'First Aid', 3, '../../webroot/img/ability19.png', 19, 0, 0, 0),
(20, 5, '5/10/5/8', 'Titan Transform', 4, '../../webroot/img/ability20.jpg', 5, 10, 5, 8),
(21, 6, '0/2/2/2', 'Ki Blast', 1, '../../webroot/img/ability21.jpg', 0, 2, 2, 2),
(22, 6, '0/3/3/3', 'Twin Dragon Shot', 2, '../../webroot/img/ability22.jpg', 0, 3, 3, 3),
(23, 6, '15/1/0/2', 'Finger Beam', 3, '../../webroot/img/ability23.png', 15, 1, 0, 2),
(24, 6, '5/30/0/0', '10x God Kamehameha', 4, '../../webroot/img/ability24.png', 5, 30, 0, 0),
(25, 1, '0/12/0/2', 'Charge', 1, '../../webroot/img/ability25.png', 0, 12, 0, 2),
(26, 1, '0/17/4/0', 'Drop Kick', 2, '../../webroot/img/ability26.jpg', 0, 17, 4, 0),
(27, 1, '17/0/0/0', 'Flex Muscles', 3, '../../webroot/img/ability27.jpg', 17, 0, 0, 0),
(28, 1, '0/25/0/0', 'Gamma Quake', 4, '../../webroot/img/ability28.jpg', 0, 25, 0, 0),
(29, 2, '0/12/0/0', 'Summoning Technique ', 1, '../../webroot/img/ability29.jpg', 0, 12, 0, 0),
(30, 2, '0/15/0/1', 'Sage Mode', 2, '../../webroot/img/ability30.jpg', 0, 15, 0, 1),
(31, 2, '16/0/0/1', ' Six Paths Mode', 3, '../../webroot/img/ability31.jpg', 16, 0, 0, 1),
(32, 2, '0/25/2/0', 'Tailed Beast Bomb', 4, '../../webroot/img/ability32.jpg', 0, 25, 2, 0);

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
  `bio` varchar(1000) CHARACTER SET utf32 COLLATE utf32_romanian_ci NOT NULL,
  `imgUrl` text NOT NULL,
  `att` int(11) NOT NULL,
  `def` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `char`
--

INSERT INTO `char` (`charId`, `name`, `bio`, `imgUrl`, `att`, `def`) VALUES
(1, 'Hulk', 'Caught in a gamma bomb explosion while trying to save the life of a teenager, Dr. Bruce Banner was transformed into the incredibly powerful creature called the Hulk. An all too often misunderstood hero, the angrier the Hulk gets, the stronger the Hulk gets.', '../../webroot/img/char_portrait_1.jpg', 15, 15),
(2, 'Naruto', 'Naruto Uzumaki is a shinobi of Konohagakure and a descendant of the Uzumaki clan. He became the jinchuriki of the Nine-Tails on the day of his birth - a fate that caused him to be shunned by most of Konoha throughout his childhood. After joining Team Kakashi, Naruto worked hard to gain the village\'s acknowledgement all the while chasing his dream to become Hokage.', '../../webroot/img/char_portrait_2.jpg', 16, 12),
(3, 'SpiderMan', 'Bitten by a radioactive spider, high school student Peter Parker gained the speed, strength and powers of a spider. Adopting the name Spider-Man, Peter hoped to start a career using his new abilities. Taught that with great power comes great responsibility, Spidey has vowed to use his powers to help people.', '../../webroot/img/char_portrait_3.jpg', 18, 10),
(4, 'SuperMan', 'Superman is born on an alien world to a technologically advanced species that resembles humans. When his world is on the verge of destruction, his father, a scientist, places his infant son alone in a spaceship that takes him to Earth.', '../../webroot/img/char_portrait_4.jpg', 20, 11),
(5, 'Eren Jaeger', 'Eren Jeager is a member of the Survey Corps. He lived in the Shiganshina District with his parents and adopted sister Mikasa Ackerman until the fall of Wall Maria. During the incident, Eren impotently witnessed his mother being eaten by a Titan. This event aroused in Eren an intense hatred towards the Titans, and he swore to wipe all of them off the face of the Earth.', '../../webroot/img/char_portrait_5.jpg', 16, 14),
(6, 'Goku', 'Son Goku, born Kakarot, is a male Saiyan. Cheerful, tenacious, and also a bit naive, Goku is a Saiyan originally sent to Earth as an infant with the mission to destroy it. However, an accident alters his memory, allowing him to grow up pure-hearted and become Earth\'s greatest defender, as well as the informal leader of the Dragon Team. Throughout his life, he constantly strives and trains to be the greatest warrior possible and to fight stronger opponents, which has kept the Earth and the universe safe from destruction many times.', '../../webroot/img/char_portrait_6.jpg', 19, 13);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `gamesinprogress`
--

CREATE TABLE `gamesinprogress` (
  `id` int(11) NOT NULL,
  `usernamePlayer1` varchar(20) CHARACTER SET utf32 COLLATE utf32_romanian_ci NOT NULL,
  `usernamePlayer2` varchar(20) CHARACTER SET utf32 COLLATE utf32_romanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `gamesinprogress`
--

INSERT INTO `gamesinprogress` (`id`, `usernamePlayer1`, `usernamePlayer2`) VALUES
(1, 'anggabard', 'cdc4ever');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `items`
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
-- Salvarea datelor din tabel `items`
--

INSERT INTO `items` (`id`, `name`, `type`, `imgUrl`, `price`, `att`, `def`) VALUES
(1, 'Batista lui SuperMan', 1, '../../webroot/img/weapon1.jpg', 230, 15, 5),
(2, 'Toporul lui Odin', 1, '../../webroot/img/weapon2.jpg', 500, 25, 5),
(3, 'Fesul lui Dublu D', 0, '../../webroot/img/armor1.jpg', 150, 8, 5),
(4, 'Aparatoare de Cap', 0, '../../webroot/img/armor2.jpg', 150, 7, 6),
(5, 'Sabia lui DEADPOOL', 1, '../../webroot/img/weapon3.jpg', 450, 20, 4),
(6, 'Sort de Bucatarie', 0, '../../webroot/img/armor3.jpg', 650, 0, 50);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `playersingame`
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
-- Salvarea datelor din tabel `playersingame`
--

INSERT INTO `playersingame` (`gameId`, `username`, `att`, `dff`, `health`, `charId`) VALUES
(1, 'anggabard', 0, 30, 67, 0),
(1, 'cdc4ever', 0, 80, 56, 0);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `user`
--

CREATE TABLE `user` (
  `username` varchar(20) CHARACTER SET utf32 COLLATE utf32_romanian_ci NOT NULL,
  `password` varchar(150) CHARACTER SET utf32 COLLATE utf32_romanian_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf32 COLLATE utf32_romanian_ci NOT NULL,
  `money` int(11) NOT NULL,
  `wins` int(11) NOT NULL DEFAULT '0',
  `losses` int(11) NOT NULL DEFAULT '0',
  `gamesPlayed` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `user`
--

INSERT INTO `user` (`username`, `password`, `email`, `money`, `wins`, `losses`, `gamesPlayed`) VALUES
('anggabard', '516543b4103cee5f417ef40984d3774ead1507d1c5248a2efe4c8a476dc2a5f0', 'gelo@yahoo.com', 0, 0, 0, 0),
('cdc4ever', '4d0282941aaf2d694ddaa24fca75e503c73ab16fff3884cac12f39f882bc60cb', 'cristianchircan1@gmail.com', 0, 0, 0, 0),
('Lemnesh', '44ae0d87a4569b0e2d41ac6e5af878d230875103da1a3df2f20b7ab09a39173b', 'ploaeteodor@yahoo.com', 0, 0, 0, 0);

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
  `gamesLost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `userchr`
--

INSERT INTO `userchr` (`username`, `charId`, `lvl`, `gamesPlayed`, `gamesWon`, `gamesLost`) VALUES
('anggabard', 1, 0, 0, 0, 0),
('anggabard', 2, 0, 0, 0, 0),
('anggabard', 3, 0, 0, 0, 0),
('anggabard', 4, 0, 0, 0, 0),
('anggabard', 5, 0, 0, 0, 0),
('anggabard', 6, 0, 0, 0, 0),
('cdc4ever', 1, 0, 0, 0, 0),
('cdc4ever', 2, 0, 0, 0, 0),
('cdc4ever', 3, 0, 0, 0, 0),
('cdc4ever', 4, 0, 0, 0, 0),
('cdc4ever', 5, 0, 0, 0, 0),
('cdc4ever', 6, 0, 0, 0, 0),
('Lemnesh', 1, 0, 0, 0, 0),
('Lemnesh', 2, 0, 0, 0, 0),
('Lemnesh', 3, 0, 0, 0, 0),
('Lemnesh', 4, 0, 0, 0, 0),
('Lemnesh', 5, 0, 0, 0, 0),
('Lemnesh', 6, 0, 0, 0, 0);

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
-- Restrictii pentru tabele sterse
--

--
-- Restrictii pentru tabele `abilities`
--
ALTER TABLE `abilities`
  ADD CONSTRAINT `abilities_ibfk_1` FOREIGN KEY (`charId`) REFERENCES `char` (`charId`);

--
-- Restrictii pentru tabele `asocitems`
--
ALTER TABLE `asocitems`
  ADD CONSTRAINT `asocitems_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `asocitems_ibfk_2` FOREIGN KEY (`itemId`) REFERENCES `items` (`id`);

--
-- Restrictii pentru tabele `playersingame`
--
ALTER TABLE `playersingame`
  ADD CONSTRAINT `playersingame_ibfk_5` FOREIGN KEY (`gameId`) REFERENCES `gamesinprogress` (`id`) ON UPDATE NO ACTION;

--
-- Restrictii pentru tabele `userchr`
--
ALTER TABLE `userchr`
  ADD CONSTRAINT `userchr_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `userchr_ibfk_2` FOREIGN KEY (`charId`) REFERENCES `char` (`charId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
