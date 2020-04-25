-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2020 m. Bal 25 d. 12:34
-- Server version: 8.0.18
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `personalo_vs_db`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `personalas`
--

CREATE TABLE `personalas` (
  `person_id` int(11) NOT NULL COMMENT 'unikalus id numeris',
  `Vardas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_lithuanian_ci NOT NULL COMMENT 'Darbuotojo vardas',
  `Pavardė` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_lithuanian_ci NOT NULL COMMENT 'Darbuotojo pavardė',
  `Telefonas` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_lithuanian_ci DEFAULT NULL COMMENT 'Kontaktinis telefonas su valstybes kodu. Pvz.: 37065044444',
  `pro_id` int(11) NOT NULL COMMENT 'Unikalus priskirto projekto ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_lithuanian_ci;

--
-- Sukurta duomenų kopija lentelei `personalas`
--

INSERT INTO `personalas` (`person_id`, `Vardas`, `Pavardė`, `Telefonas`, `pro_id`) VALUES
(1, 'Topolis', 'Beržanskas', '37068890154', 3),
(2, 'Gluosnis', 'Medelinskas', '37052401635', 2),
(4, 'Eglė', 'Skarotė', '37037200356', 4),
(5, 'Ąžuolas', 'Paberžis', '37065533244', 2),
(6, 'Klevas', 'Drebulis', '37069950123', 1),
(7, 'Smilga', 'Pušinaitė', '37052401630', 4),
(8, 'Tilvitis', 'Gluosnys', '37054821546', 1),
(9, 'Liepa', 'Eglinskaitė', '37037200504', 5),
(12, 'Beržas', 'Pakalnis', '37068745123', 3),
(13, 'Ieva', 'Smilgytė', '3705484642', 5);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `projektai`
--

CREATE TABLE `projektai` (
  `pro_id` int(11) NOT NULL COMMENT 'Unikalus projekto ID',
  `Pavadinimas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_lithuanian_ci NOT NULL COMMENT 'Projekto pavadinimas',
  `Paskirtis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_lithuanian_ci NOT NULL COMMENT 'Projekto paskirties detalizacija',
  `Realizavimo_pradžia` date NOT NULL COMMENT 'Projekto realizavimo pradžios data'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_lithuanian_ci COMMENT='Projektų detalizavimo lentelė';

--
-- Sukurta duomenų kopija lentelei `projektai`
--

INSERT INTO `projektai` (`pro_id`, `Pavadinimas`, `Paskirtis`, `Realizavimo_pradžia`) VALUES
(1, 'Alėjos sodinimas', 'Miško gatvės arealo renovacija', '2020-05-20'),
(2, 'Medelyno rekreacija', 'Gudobelių tako parko atkūrimas', '2020-06-30'),
(3, 'Oranžerijos vystymas', 'Tulpių parko renovacijos dalis', '2020-07-15'),
(4, 'Sveikatingumo aikštyno įrengimas', 'Rekreacinio poilsio parko projekto dalis', '2020-05-20'),
(5, 'Aeracijos sistemos diegimas', 'Tulpių parko drėkinimo sistemos sukūrimas', '2020-07-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `personalas`
--
ALTER TABLE `personalas`
  ADD PRIMARY KEY (`person_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `projektai`
--
ALTER TABLE `projektai`
  ADD PRIMARY KEY (`pro_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `personalas`
--
ALTER TABLE `personalas`
  MODIFY `person_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'unikalus id numeris', AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `projektai`
--
ALTER TABLE `projektai`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unikalus projekto ID', AUTO_INCREMENT=8;

--
-- Apribojimai eksportuotom lentelėm
--

--
-- Apribojimai lentelei `personalas`
--
ALTER TABLE `personalas`
  ADD CONSTRAINT `personalas_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `projektai` (`pro_id`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
