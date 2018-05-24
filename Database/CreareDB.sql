-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25 Mai 2018 la 01:14
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
  `dff` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `abilities`
--

INSERT INTO `abilities` (`abilityId`, `charId`, `description`, `name`, `type`, `ImgUrl`, `heal`, `dmg`, `att`, `dff`) VALUES
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
(11, 2, '', 'Spider Sense', 3, '../../webroot/img/ability11.jpg', 0, 0, 0, 0),
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
(24, 6, '', '10x God Kamehameha', 4, '../../webroot/img/ability24.png', 0, 0, 0, 0);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abilities`
--
ALTER TABLE `abilities`
  MODIFY `abilityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restrictii pentru tabele sterse
--

--
-- Restrictii pentru tabele `abilities`
--
ALTER TABLE `abilities`
  ADD CONSTRAINT `abilities_ibfk_1` FOREIGN KEY (`charId`) REFERENCES `char` (`charId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
