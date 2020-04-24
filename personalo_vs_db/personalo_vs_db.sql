-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Апр 24 2020 г., 21:21
-- Версия сервера: 8.0.18
-- Версия PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `personalo_vs_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `personalas`
--

CREATE TABLE `personalas` (
  `person_id` int(11) NOT NULL COMMENT 'unikalus id numeris',
  `Vardas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_lithuanian_ci NOT NULL COMMENT 'Darbuotojo vardas',
  `Pavardė` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_lithuanian_ci NOT NULL COMMENT 'Darbuotojo pavardė',
  `Telefonas` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_lithuanian_ci DEFAULT NULL COMMENT 'Kontaktinis telefonas su valstybes kodu. Pvz.: 37065044444',
  `pro_id` int(11) DEFAULT NULL COMMENT 'Unikalus priskirto projekto ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_lithuanian_ci;

--
-- Дамп данных таблицы `personalas`
--

INSERT INTO `personalas` (`person_id`, `Vardas`, `Pavardė`, `Telefonas`, `pro_id`) VALUES
(1, 'Topolis', 'Beržanskas', '37068890154', 3),
(2, 'Gluosnis', 'Medelinskas', '37052401635', 2),
(4, 'Eglė', 'Skarotė', '37037200356', 4),
(5, 'Ąžuolas', 'Paberžis', '37065533244', 2),
(6, 'Klevas', 'Drebulis', '370069950123', 1),
(7, 'Smilga', 'Pušinaitė', '37052401630', 3),
(8, 'Tilvitis', 'Gluosnys', '37054821546', 1),
(9, 'Liepa', 'Eglinskaitė', '370372005045', 5),
(10, 'Beržas', 'Pakalnis', '370375458090', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `projektai`
--

CREATE TABLE `projektai` (
  `pro_id` int(11) NOT NULL COMMENT 'Unikalus projekto ID',
  `Pavadinimas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_lithuanian_ci NOT NULL COMMENT 'Projekto pavadinimas',
  `Paskirtis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_lithuanian_ci NOT NULL COMMENT 'Projekto paskirties detalizacija',
  `Realizavimo_pradžia` date DEFAULT NULL COMMENT 'Projekto realizavimo pradžios data'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_lithuanian_ci COMMENT='Projektų detalizavimo lentelė';

--
-- Дамп данных таблицы `projektai`
--

INSERT INTO `projektai` (`pro_id`, `Pavadinimas`, `Paskirtis`, `Realizavimo_pradžia`) VALUES
(1, 'Alėjos sodinimas', 'Miško gatvės arealo renovacija', '2020-05-20'),
(2, 'Medelyno rekreacija', 'Gudobelių tako parko atkūrimas', '2020-06-30'),
(3, 'Oranžerijos vystymas', 'Tulpių parko renovacijos dalis', '2020-07-10'),
(4, 'Sveikatingumo aikštyno įrengimas', 'Rekreacinio poilsio parko projekto dalis', '2020-05-20'),
(5, 'Aeracijos sistemos diegimas', 'Tulpių parko drėkinimo sistemos sukūrimas', '2020-07-25');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `personalas`
--
ALTER TABLE `personalas`
  ADD PRIMARY KEY (`person_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Индексы таблицы `projektai`
--
ALTER TABLE `projektai`
  ADD PRIMARY KEY (`pro_id`) USING BTREE;

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `personalas`
--
ALTER TABLE `personalas`
  MODIFY `person_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'unikalus id numeris', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `projektai`
--
ALTER TABLE `projektai`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unikalus projekto ID', AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `personalas`
--
ALTER TABLE `personalas`
  ADD CONSTRAINT `personalas_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `projektai` (`pro_id`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
