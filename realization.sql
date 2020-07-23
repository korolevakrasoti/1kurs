-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июн 28 2020 г., 20:48
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `realization`
--

-- --------------------------------------------------------

--
-- Структура таблицы `dogovori`
--

CREATE TABLE IF NOT EXISTS `dogovori` (
  `id_dogovora` int(10) NOT NULL,
  `srok` date NOT NULL,
  `id_zakazchika` int(11) NOT NULL,
  `fact_srok` date NOT NULL,
  `price_d` int(15) NOT NULL,
  `id_tovara` int(10) NOT NULL,
  PRIMARY KEY (`id_dogovora`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dogovori`
--

INSERT INTO `dogovori` (`id_dogovora`, `srok`, `id_zakazchika`, `fact_srok`, `price_d`, `id_tovara`) VALUES
(1, '2020-06-01', 1, '2020-06-07', 2000, 2),
(2, '2020-06-24', 2, '2020-06-24', 3000, 2),
(3, '2020-06-25', 3, '2020-06-28', 2600, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `postavhiki`
--

CREATE TABLE IF NOT EXISTS `postavhiki` (
  `id_p` int(10) NOT NULL,
  `name_p` text NOT NULL,
  `telefon_p` text NOT NULL,
  `id_sotr` int(10) NOT NULL,
  PRIMARY KEY (`id_p`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `postavhiki`
--

INSERT INTO `postavhiki` (`id_p`, `name_p`, `telefon_p`, `id_sotr`) VALUES
(1, 'завод чипсов', '123456', 1),
(2, 'ферма', '332', 2),
(3, 'Анальный корень', '123', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `sotrydniki`
--

CREATE TABLE IF NOT EXISTS `sotrydniki` (
  `id_sotrydnika` int(10) NOT NULL,
  `name_sotrydnika` text NOT NULL,
  `dolznost` text NOT NULL,
  PRIMARY KEY (`id_sotrydnika`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sotrydniki`
--

INSERT INTO `sotrydniki` (`id_sotrydnika`, `name_sotrydnika`, `dolznost`) VALUES
(1, 'Васильев', 'Менеджер по продажам'),
(2, 'Маркелов', 'Водитель'),
(3, 'Укропов', 'Грузчик');

-- --------------------------------------------------------

--
-- Структура таблицы `tovari`
--

CREATE TABLE IF NOT EXISTS `tovari` (
  `id_tovara` int(10) NOT NULL,
  `name_tovara` text NOT NULL,
  `kolvo` int(10) NOT NULL,
  `id_post` int(10) NOT NULL,
  `unit_price` int(10) NOT NULL,
  PRIMARY KEY (`id_tovara`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tovari`
--

INSERT INTO `tovari` (`id_tovara`, `name_tovara`, `kolvo`, `id_post`, `unit_price`) VALUES
(1, 'Чипсы', 1000, 1, 50),
(2, 'Свинина', 20, 2, 550),
(3, 'Торт Медовик', 50, 1, 350),
(4, 'Кружка 250мл', 1000, 3, 130);

-- --------------------------------------------------------

--
-- Структура таблицы `zakazchiki`
--

CREATE TABLE IF NOT EXISTS `zakazchiki` (
  `id_zakazchika` int(10) NOT NULL,
  `name_zakazchika` text NOT NULL,
  `adres` text NOT NULL,
  `phone` text NOT NULL,
  PRIMARY KEY (`id_zakazchika`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `zakazchiki`
--

INSERT INTO `zakazchiki` (`id_zakazchika`, `name_zakazchika`, `adres`, `phone`) VALUES
(1, 'Магазин', 'г.Чернушка', '888666'),
(2, 'Ресторан', 'г.Москва', '333655'),
(3, 'Булочная', 'пр.Культуры-47', '965846');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
