-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 05 2018 г., 11:51
-- Версия сервера: 5.6.37
-- Версия PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `Sataman`
--

-- --------------------------------------------------------

--
-- Структура таблицы `foods`
--

CREATE TABLE `foods` (
  `Id` int(4) NOT NULL,
  `img` varchar(255) NOT NULL,
  `nameFI` varchar(50) NOT NULL,
  `nameEN` varchar(50) NOT NULL,
  `nameRU` varchar(50) NOT NULL,
  `descriptionFI` text NOT NULL,
  `descriptionEN` text NOT NULL,
  `descriptionRU` text NOT NULL,
  `cost` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `foods`
--

INSERT INTO `foods` (`Id`, `img`, `nameFI`, `nameEN`, `nameRU`, `descriptionFI`, `descriptionEN`, `descriptionRU`, `cost`) VALUES
(1, 'img/food/chisburger.jpg', 'juustohampurilainen', 'cheeseburger', 'чизбургер', 'erittäin maukasta juustohampurilainen kurkku ja sipuli', 'very tasty cheeseburger with cucumber and onion', 'очень вкусный чизбургер с огурцом и луком', '2.10'),
(2, 'img/food/coffee.jpg', 'kahvia', 'coffee', 'кофе', 'herkullista mustaa kahvia', 'delicious black coffee', 'вкусное черное кофе ', '1.00'),
(3, 'img/food/potato.jpg', 'Ranskalaiset', 'French fries', 'Картошка фри', 'French fries spirals', 'Ranskalaiset kierteelle', 'картошка фри спиральками ', '2.30'),
(4, 'img/food/coffee2.jpg', 'kahvia', 'coffee2', 'кофе2', 'herkullista mustaa kahvia', 'delicious black coffee', 'вкусное черное кофе ', '0.80'),
(5, '../img/food/EnName Test.jpeg', 'FiName Test', 'EnName Test', 'Русское название Test', 'FiDescripnion Test', 'EnDescripnion Test', 'Русское Descripnion Test', '3.00'),
(6, '../img/food/sdfasdf.jpeg', 'sdf', 'sdfasdf', 'вапф', 'adfg arega ', 'gafdgFDSVGAFDBG', 'ФАВПФУКПФК', '99.99'),
(7, '../img/food/ASDFGHDAFG.jpeg', 'ADFGDAFG', 'ASDFGHDAFG', 'вапыавп', 'dsfagadfg', 'fdsagagh', 'фвыапфвап', '4.30'),
(12, '../img/food/SDBBsdbDFGB.jpeg', '', 'SDBBsdbDFGB', '', '', '', '', '34.00');

-- --------------------------------------------------------

--
-- Структура таблицы `languages`
--

CREATE TABLE `languages` (
  `variable` varchar(50) NOT NULL,
  `fi` text NOT NULL,
  `en` text NOT NULL,
  `ru` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `languages`
--

INSERT INTO `languages` (`variable`, `fi`, `en`, `ru`) VALUES
('addressname', 'Osoite', 'Address', 'Адрес'),
('addressP', 'Meidän ihana kahvila sijaitsee osoitteessa: Satamatie 2, 49460 Hamina, Suomi', 'Our wonderful cafe is located at the address: Satamatie 2, 49460 Hamina, Finland', 'Наше замечательное кафе находится по адресу: Satamantie 2, 49460 Hamina, Финляндия'),
('foodmenuname', 'Valikko', 'Menu', 'Меню'),
('footerdivname', 'Sähköpostia kehittäjä', 'An email to the developer', 'Письмо разработчику'),
('logo', 'Sataman Grilli Hamina', 'Sataman Grilli Hamina', 'Sataman Grilli Hamina'),
('navmenuaboutUs', 'Meistä', 'About us', 'О нас'),
('navmenuaddress', 'Miten saada', 'How to get', 'Как добраться'),
('navmenufoodmenu', 'Valikko', 'Menu', 'Меню'),
('title', 'Sataman Grilli Hamina', 'Sataman Grilli Hamina', 'Sataman Grilli Hamina'),
('worktime', 'Toiminta-aika', 'Working time', 'Время работы'),
('worktimedays', '<p>Maanantai</p><p>Tiistai</p><p>Keskiviikko</p><p>Torstai</p><p>Perjantai</p><p>Lauantai</p><p>Sunnuntai</p>', '<p>Monday</p><p>Tuesday</p><p>Wednesday</p><p>Thursday</p><p>Friday</p><p>Saturday</p><p>Sunday</p>', '<p>Понедельник</p><p>Вторник</p><p>Среда</p><p>Четверг</p><p>Пятница</p><p>Суббота</p><p>Воскресение</p>'),
('worktimetimes', '<p>9:30 - 16:00</p><p>9:30 - 16:00</p><p>9:30 - 16:00</p><p>9:30 - 16:00</p><p>9:30 - 16:00</p><p>Suljettu</p><p>Suljettu</p>', '<p>9:30 - 16:00</p><p>9:30 - 16:00</p><p>9:30 - 16:00</p><p>9:30 - 16:00</p><p>9:30 - 16:00</p><p>Closed</p><p>Closed</p>', '<p>9:30 - 16:00</p><p>9:30 - 16:00</p><p>9:30 - 16:00</p><p>9:30 - 16:00</p><p>9:30 - 16:00</p><p>Закрыто</p><p>Закрыто</p>');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`Id`);

--
-- Индексы таблицы `languages`
--
ALTER TABLE `languages`
  ADD UNIQUE KEY `variable` (`variable`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `foods`
--
ALTER TABLE `foods`
  MODIFY `Id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
