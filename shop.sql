-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Час створення: Гру 13 2017 р., 11:02
-- Версія сервера: 5.7.20-0ubuntu0.16.04.1
-- Версія PHP: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблиці `category`
--

CREATE TABLE `category` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Ноутбуки'),
(2, 'Телефоны'),
(3, 'Планшеты');

-- --------------------------------------------------------

--
-- Структура таблиці `product`
--

CREATE TABLE `product` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `date`, `category_id`) VALUES
(1, 'Смартфон Apple iPhone 8 64GB ', 25499, '2017-12-11 13:47:37', 2),
(2, 'Apple iPhone 6s 64GB', 12499, '2017-12-11 13:47:37', 2),
(3, 'Планшет Ergo Tab A720 7" 3G Black', 1300, '2017-12-11 13:48:52', 3),
(4, 'Планшет Impression ImPAD M701', 1580, '2017-12-11 13:48:52', 3),
(5, 'Ноутбук HP 255 G6', 8700, '2017-12-11 13:49:51', 1),
(6, 'Ноутбук Dell Inspiron 5567', 13400, '2017-12-11 13:49:51', 1),
(7, 'Ноутбук Acer Aspire 3 ', 13100, '2017-12-11 13:50:28', 1),
(8, 'Ноутбук Lenovo IdeaPad 100-15IBD ', 14000, '2017-12-11 13:50:28', 1),
(9, 'Ноутбук Asus Vivobook', 7999, '2017-12-11 13:51:15', 1),
(10, 'Ноутбук Lenovo Legion', 36000, '2017-12-11 13:51:15', 1),
(11, 'Планшет Prestigio MultiPad Grace', 1699, '2017-12-11 13:51:58', 3),
(12, 'Планшет Glofiish GPad Air', 1839, '2017-12-11 13:51:58', 3),
(13, 'Планшет Assistant AP-753G Black', 1400, '2017-12-11 13:52:45', 3),
(14, 'Планшет EvroMedia Play Pad 3G Goo', 1699, '2017-12-11 13:52:45', 3),
(15, 'Lenovo K6 Note', 7999, '2017-12-11 13:53:29', 2),
(16, 'Huawei P8 Lite', 8600, '2017-12-11 13:53:29', 2),
(17, 'Samsung Galaxy A5', 11999, '2017-12-11 13:53:57', 2),
(18, 'Xiaomi Redmi Note 4 ', 4500, '2017-12-11 13:53:57', 2),
(19, 'Nokia 6 Dual Sim Matte', 5600, '2017-12-11 13:54:31', 2),
(20, 'Samsung Galaxy J7 ', 4599, '2017-12-11 13:54:31', 2),
(21, 'Планшет Ergo Tab A720 7" 3G Black', 1499, '2017-12-13 11:00:26', 3),
(22, 'Планшет Pixus Vision 10.1 3G', 3999, '2017-12-13 11:00:26', 3),
(23, 'Ноутбук HP ProBook 440 G4\r\n', 14000, '2017-12-13 11:01:42', 1),
(24, 'Ноутбук Apple A1707 MacBook Pro TB Retina 15', 75000, '2017-12-13 11:01:42', 1);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблиці `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
