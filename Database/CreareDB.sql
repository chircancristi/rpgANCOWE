-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10 Iun 2018 la 12:14
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
(1, 1, '', 'Punch', 1, '../../webroot/img/ability1.png', 0, 0, 0, 0),
(2, 1, '', 'Rage', 2, '../../webroot/img/ability2.jpg', 0, 0, 0, 0),
(3, 1, '', 'Iron Skin', 3, '../../webroot/img/ability3.jpg', 0, 0, 0, 0),
(4, 1, '', 'HULK SMASH!', 4, '../../webroot/img/ability4.png', 0, 0, 0, 0),
(5, 2, '', 'Sexy justsu', 1, '../../webroot/img/ability5.png', 0, 0, 0, 0),
(6, 2, '', 'Shadow Clone', 2, '../../webroot/img/ability6.jpg', 0, 0, 0, 0),
(7, 2, '', 'Rasengan', 3, '../../webroot/img/ability7.jpg', 0, 0, 0, 0),
(8, 2, '', 'Rasen Shuriken', 4, '../../webroot/img/ability8.jpg', 0, 0, 0, 0),
(9, 3, '', 'Low Kick', 1, '../../webroot/img/ability9.png', 0, 0, 0, 0),
(10, 3, '', 'Web Shot', 2, '../../webroot/img/ability10.jpg', 0, 0, 0, 0),
(11, 3, '', 'Spider Sense', 3, '../../webroot/img/ability11.jpg', 0, 0, 0, 0),
(12, 3, '', 'Impress MJ', 4, '../../webroot/img/ability12.png', 0, 0, 0, 0),
(13, 4, '', 'Super Punch', 1, '../../webroot/img/ability13.png', 0, 0, 0, 0),
(14, 4, '', 'Laser Vision', 2, '../../webroot/img/ability14.jpg', 0, 0, 0, 0),
(15, 4, '', 'Tornado', 3, '../../webroot/img/ability15.jpg', 0, 0, 0, 0),
(16, 4, '', 'Solar Power', 4, '../../webroot/img/ability16.jpg', 0, 0, 0, 0),
(17, 5, '', 'Sword Attack', 1, '../../webroot/img/ability17.jpg', 0, 0, 0, 0),
(18, 5, '', 'Grappling Hook', 2, '../../webroot/img/ability18.jpg', 0, 0, 0, 0),
(19, 5, '', 'First Aid', 3, '../../webroot/img/ability19.png', 0, 0, 0, 0),
(20, 5, '', 'Titan Transform', 4, '../../webroot/img/ability20.jpg', 0, 0, 0, 0),
(21, 6, '', 'Ki Blast', 1, '../../webroot/img/ability21.jpg', 0, 0, 0, 0),
(22, 6, '', 'Twin Dragon Shot', 2, '../../webroot/img/ability22.jpg', 0, 0, 0, 0),
(23, 6, '', 'Finger Beam', 3, '../../webroot/img/ability23.png', 0, 0, 0, 0),
(24, 6, '', '10x God Kamehameha', 4, '../../webroot/img/ability24.png', 0, 0, 0, 0),
(25, 1, '', 'Charge', 1, '../../webroot/img/ability25.png', 0, 0, 0, 0),
(26, 1, '', 'Drop Kick', 2, '../../webroot/img/ability26.jpg', 0, 0, 0, 0),
(27, 1, '', 'Flex Muscles', 3, '../../webroot/img/ability27.jpg', 0, 0, 0, 0),
(28, 1, '', 'Gamma Quake', 4, '../../webroot/img/ability28.jpg', 0, 0, 0, 0),
(29, 2, '', 'Summoning Technique ', 1, '../../webroot/img/ability29.jpg', 0, 0, 0, 0),
(30, 2, '', 'Sage Mode', 2, '../../webroot/img/ability30.jpg', 0, 0, 0, 0),
(31, 2, '', ' Six Paths Mode', 3, '../../webroot/img/ability31.jpg', 0, 0, 0, 0),
(32, 2, '', 'Tailed Beast Bomb', 4, '../../webroot/img/ability32.jpg', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `asocitems`
--

CREATE TABLE `asocitems` (
  `username` varchar(20) CHARACTER SET utf32 COLLATE utf32_romanian_ci NOT NULL,
  `itemId` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `asocitems`
--

INSERT INTO `asocitems` (`username`, `itemId`, `id`) VALUES
('anggabard', 1, 119),
('anggabard', 3, 120);

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
(1, 'Hulk', 'Hulk este un personaj ficțional, un supererou, care apare în cărțile de benzi desenate publicate de Marvel Comics. Creat de Stan Lee și Jack Kirby, personajul a apărut prima oară în The Incredible Hulk #1 (mai 1962). Hulk este un monstru umanoid mutant, gigantic, verde, iradiat, cu o forță incredibilă și care nu își poate controla furia.', '../../webroot/img/char_portrait_1.jpg', 80, 80),
(2, 'Naruto', 'Naruto este o serie manga japoneză scrisă și ilustrată de Masashi Kishimoto, având și o adaptare anime. Personajul principal, Naruto Uzumaki, este un ninja adolescent, imprevizibil și hiperactiv, care este într-o constantă căutare de cunoaștere, visând să devină Hokage, un ninja recunoscut ca cel mai puternic dintre toți și liderul satului.', '../../webroot/img/char_portrait_2.jpg', 50, 30),
(3, 'SpiderMan', 'Omul Păianjen este de fapt un tânăr student orfan de ambii părinți pe nume Peter Benjamin Parker, care locuia împreună cu unchiul Ben și mătușa May.in New York', '../../webroot/img/char_portrait_3.jpg', 15, 10),
(4, 'SuperMan', 'Superman s-a născut pe planeta Krypton, din părinți pământeni, primind numele de Kal-El. Odată întors pe Terra, datorită puterilor sale extraordinare a ajuns să apere orașul Metropolis, din Statele Unite ale Americii. În timpul liber, Superman este reporter la cotidianul Daily Planet, ascuzându-și adevărata identitate sub numele de Clark Kent. Supergirl, o altă supereroină din universul DC Comics, este verișoara lui Superman.', '../../webroot/img/char_portrait_4.jpg', 80, 60),
(5, 'Eren Jaeger', 'Eren Jeager is a member of the Survey Corps and the main protagonist of Attack on Titan. He lived in the Shiganshina District with his parents and adopted sister Mikasa Ackerman until the fall of Wall Maria. During the incident, Eren impotently witnessed his mother being eaten by a Titan.[26] This event aroused in Eren an intense hatred towards the Titans, and he swore to wipe all of them off the face of the Earth.', '../../webroot/img/char_portrait_5.jpg', 2, 5),
(6, 'Goku', 'Son Goku, born Kakarot, is a male Saiyan and the main protagonist of the Dragon Ball meta-series created by Akira Toriyama. Cheerful, tenacious, and also a bit naïve, Goku is a Saiyan originally sent to Earth as an infant with the mission to destroy it. However, an accident alters his memory, allowing him to grow up pure-hearted and become Earth\'s greatest defender, as well as the informal leader of the Dragon Team. Throughout his life, he constantly strives and trains to be the greatest warrior possible and to fight stronger opponents, which has kept the Earth and the universe safe from destruction many times.', '../../webroot/img/char_portrait_6.jpg', 80, 50);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `gamesinprogress`
--

CREATE TABLE `gamesinprogress` (
  `id` int(11) NOT NULL,
  `usernamePlayer1` varchar(30) NOT NULL,
  `usernamePlayer2` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Batista lui SuperMan', 1, '../../webroot/img/weapon1.jpg', 230, 20, 5),
(2, 'Toporul lui Odin', 1, '../../webroot/img/weapon2.jpg', 500, 50, 15),
(3, 'Fesul lui Dublu D', 0, '../../webroot/img/armor1.jpg', 150, 0, 30),
(4, 'Aparatoare de Cap', 0, '../../webroot/img/armor2.jpg', 150, 0, 20),
(5, 'Sabia lui DEADPOOL', 1, '../../webroot/img/weapon3.jpg', 450, 40, 20),
(6, 'Sort de Bucatarie', 0, '../../webroot/img/armor3.jpg', 650, 0, 100);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `playersingame`
--

CREATE TABLE `playersingame` (
  `username` varchar(30) NOT NULL,
  `att` int(11) NOT NULL,
  `dff` int(11) NOT NULL,
  `health` int(11) NOT NULL,
  `charName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `user`
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
-- Salvarea datelor din tabel `user`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playersingame`
--
ALTER TABLE `playersingame`
  ADD UNIQUE KEY `username` (`username`);

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
-- Restrictii pentru tabele `userchr`
--
ALTER TABLE `userchr`
  ADD CONSTRAINT `userchr_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `userchr_ibfk_2` FOREIGN KEY (`charId`) REFERENCES `char` (`charId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
