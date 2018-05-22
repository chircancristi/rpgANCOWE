-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22 Mai 2018 la 21:18
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
-- Structura de tabel pentru tabelul `user`
--

CREATE TABLE `user` (
  `username` varchar(20) CHARACTER SET utf32 COLLATE utf32_romanian_ci NOT NULL,
  `password` varchar(20) CHARACTER SET utf32 COLLATE utf32_romanian_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf32 COLLATE utf32_romanian_ci NOT NULL,
  `money` int(11) NOT NULL,
  `wins` int(11) NOT NULL DEFAULT '0',
  `losses` int(11) NOT NULL DEFAULT '0',
  `gamesPlayed` int(11) NOT NULL DEFAULT '0',
  `gamesPlayedWithAChar` int(11) NOT NULL COMMENT 'De implementat'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `user`
--

INSERT INTO `user` (`username`, `password`, `email`, `money`, `wins`, `losses`, `gamesPlayed`, `gamesPlayedWithAChar`) VALUES
('Adam', 'sexyEva', 'primul_nostru.user@hotmail.com', 0, 0, 0, 0, 0),
('anggabard', 'ceapa123', 'dasd@yahoo.com', 0, 0, 0, 0, 0),
('asdf', 'asdf', 'test@quick.connect', 0, 0, 0, 0, 0),
('Nostradamus', '123', 'ceapa@cea.ro', 0, 0, 0, 0, 0),
('rzv420zbegu', 'nam', 'IamZbegu@html.css', 0, 123, 321, 2, 0),
('TO', 'ilLas', 'teo_jmen@bo.ss', 0, 69, 96, 3, 44),
('urcanCurcan', 'suntparola', 'cristy_raw@yahoo.sc', 0, -1, 100, 20, 23);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
