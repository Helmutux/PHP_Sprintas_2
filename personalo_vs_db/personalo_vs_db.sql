-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2020 at 08:38 PM
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
-- Table structure for table `personalas`
--

CREATE TABLE `personalas` (
  `person_id` int(11) NOT NULL COMMENT 'unikalus id numeris',
  `Vardas` varchar(30) COLLATE utf8mb4_lithuanian_ci NOT NULL COMMENT 'Darbuotojo vardas',
  `Pavardė` varchar(30) COLLATE utf8mb4_lithuanian_ci NOT NULL COMMENT 'Darbuotojo pavardė',
  `Telefonas` varchar(13) COLLATE utf8mb4_lithuanian_ci NOT NULL COMMENT 'Kontaktinis telefonas su valstybes kodu. Pvz.: 37065044444',
  `Priskirtas_projektas` varchar(30) COLLATE utf8mb4_lithuanian_ci DEFAULT NULL COMMENT 'Projektas, kuriame darbuotojas dalyvauja'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_lithuanian_ci;

--
-- Dumping data for table `personalas`
--

INSERT INTO `personalas` (`person_id`, `Vardas`, `Pavardė`, `Telefonas`, `Priskirtas_projektas`) VALUES
(1, 'Topolis', 'Beržanskas', '37068890154', 'Alėjos sodinimas'),
(2, 'Gluosnis', 'Medelinskas', '37052401635', 'Medelyno reakreacija'),
(4, 'Eglė', 'Skarotė', '37037200356', 'Oranžerijos vystymas'),
(5, 'Ąžuolas', 'Paberžis', '37065533244', 'Medelyno rekreacija'),
(6, 'Klevas', 'Drebulis', '370069950123', 'Alėjos sodinimas'),
(7, 'Smilga', 'Pušinaitė', '37052401630', 'Oranžerijos vystymas');

-- --------------------------------------------------------

--
-- Table structure for table `projektai`
--

CREATE TABLE `projektai` (
  `pro_id` int(10) UNSIGNED NOT NULL,
  `Pavadinimas` varchar(255) COLLATE utf8mb4_lithuanian_ci NOT NULL,
  `Paskirtis` varchar(255) COLLATE utf8mb4_lithuanian_ci NOT NULL,
  `Realizavimo_pradžia` date NOT NULL,
  `Atsakingas_personalas` varchar(255) COLLATE utf8mb4_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_lithuanian_ci COMMENT='Projektų detalizavimo lentelė';

--
-- Dumping data for table `projektai`
--

INSERT INTO `projektai` (`pro_id`, `Pavadinimas`, `Paskirtis`, `Realizavimo_pradžia`, `Atsakingas_personalas`) VALUES
(1, 'Alėjos sodinimas', 'Miško gatvės arealo renovacija', '2020-05-10', ''),
(2, 'Medelyno rekreacija', 'Gudobelių tako parko atkūrimas', '2020-06-30', ''),
(3, 'Oranžerijos vystymas', 'Tulpių parko renovacijos dalis', '2020-07-10', ''),
(4, 'Sveikatingumo aikštyno įrengimas', 'Reakreacinio poilsio parko projekto dalis', '2020-05-20', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `personalas`
--
ALTER TABLE `personalas`
  ADD PRIMARY KEY (`person_id`);

--
-- Indexes for table `projektai`
--
ALTER TABLE `projektai`
  ADD PRIMARY KEY (`pro_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `personalas`
--
ALTER TABLE `personalas`
  MODIFY `person_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'unikalus id numeris', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `projektai`
--
ALTER TABLE `projektai`
  MODIFY `pro_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
