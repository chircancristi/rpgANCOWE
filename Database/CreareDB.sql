-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22 Mai 2018 la 22:13
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
(1, 'Batista lui SuperMan', 1, '../../webroot/img/weapon1.png', 230, 20, 5),
(2, 'Toporul lui Odin', 1, '../../webroot/img/weapon2.png', 500, 50, 15),
(3, 'Fesul lui Dublu D', 0, '../../webroot/img/armor1.png', 150, 0, 30),
(4, 'Aparatoarea lui Sasu', 0, '../../webroot/img/armor2.png', 150, 0, 20),
(5, 'Sabia lui DEADPOOL', 1, '../../webroot/img/weapon2.png', 450, 40, 20),
(6, 'Tunica de doua tone ', 0, '../../webroot/img/armor3.png', 650, 0, 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
