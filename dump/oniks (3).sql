-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 192.168.1.2:3306
-- Время создания: Мар 01 2024 г., 21:25
-- Версия сервера: 8.0.30
-- Версия PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `oniks`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bookings`
--

CREATE TABLE `bookings` (
  `id` int NOT NULL,
  `name` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `number` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `data` date NOT NULL,
  `person` int NOT NULL,
  `time` time NOT NULL,
  `comments` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `owner` int NOT NULL,
  `Status` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Одобрено',
  `Reason` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `bookings`
--

INSERT INTO `bookings` (`id`, `name`, `number`, `data`, `person`, `time`, `comments`, `owner`, `Status`, `Reason`) VALUES
(58, 'Кирилл', '7999999999999', '2024-03-01', 5, '11:11:00', 'ХОЧУ ПИЦЦУ ', 1, 'Одобрено', ''),
(59, 'Антон', '88888', '2024-03-01', 5, '11:11:00', '    border-bottom: 1px solid black;\n    border-bottom: 1px solid black;\n    border-bottom: 1px solid black;\n    border-bottom: 1px solid black;\n', 1, 'Одобрено', ''),
(60, 'Дима', '7999999999999', '2024-03-01', 5, '11:11:00', 'Ничего кроме мяса', 1, 'Одобрено', ''),
(61, 'Свеиа', '7999999999999', '2024-03-01', 5, '11:11:00', '-', 1, 'Одобрено', ''),
(62, 'Лера', '7999999999999', '2024-03-01', 5, '11:11:00', '-', 1, 'Одобрено', ''),
(63, 'Кира', '7999999999999', '2024-03-01', 5, '11:11:00', '-', 1, 'Одобрено', ''),
(64, 'Свят', '7999999999999', '2024-03-01', 5, '11:11:00', '-', 1, 'Одобрено', ''),
(65, 'Александр ермалаев', '7999999999999', '2024-03-01', 5, '11:11:00', '-', 1, 'Одобрено', ''),
(66, 'Мой господин', '7999999999999', '2024-03-01', 5, '11:11:00', '-', 1, 'Одобрено', ''),
(67, 'test', '7999999999999', '2024-03-11', 13, '11:11:00', '111', 1, 'Одобрено', '');

-- --------------------------------------------------------

--
-- Структура таблицы `claim-feedback`
--

CREATE TABLE `claim-feedback` (
  `id` int NOT NULL,
  `IDpost` int NOT NULL,
  `reson` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `claim-feedback`
--

INSERT INTO `claim-feedback` (`id`, `IDpost`, `reson`, `description`) VALUES
(1, 1, 'spam', ''),
(13, 4, 'noinfo', ''),
(14, 1, 'spam', ''),
(15, 1, 'other', 'еуые');

-- --------------------------------------------------------

--
-- Структура таблицы `dell_users`
--

CREATE TABLE `dell_users` (
  `id` int NOT NULL,
  `name` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `login` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pass` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `number` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ban` int NOT NULL,
  `reson` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int NOT NULL,
  `user` int NOT NULL,
  `data` date NOT NULL,
  `general` int NOT NULL,
  `eat` int NOT NULL,
  `service` int NOT NULL,
  `atmosphere` int NOT NULL,
  `dignities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `disadvantages` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `likes` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `user`, `data`, `general`, `eat`, `service`, `atmosphere`, `dignities`, `disadvantages`, `likes`) VALUES
(1, 1, '2023-10-31', 3, 4, 5, 6, 'Не ну вообщем туда сюда еда приятен, сервис прелесть Не ну вообщем туда сюда еда приятен, сервис прелесть Не ну вообщем туда сюда еда приятен, сервис прелесть Не ну вообщем туда сюда еда приятен, сервис прелесть Не ну вообщем туда сюда еда приятен, сервис прелесть Не ну вообщем туда сюда еда приятен, сервис прелесть Не ну вообщем туда сюда еда приятен, сервис прелесть Не ну вообщем туда сюда еда приятен, сервис прелесть Не ну вообщем туда сюда еда приятен, сервис прелесть Не ну вообщем туда сюда еда приятен, сервис прелесть Не ну вообщем туда сюда еда приятен, сервис прелесть Не ну вообщем туда сюда еда приятен, сервис прелесть Не ну вообщем туда сюда еда приятен, сервис прелесть Не ну вообщем туда сюда еда приятен, сервис прелесть Не ну вообщем туда сюда еда приятен, сервис прелесть Не ну вообщем туда сюда еда приятен, сервис прелесть ', 'Отсутствует', 100),
(4, 7, '2023-10-31', 5, 5, 5, 5, 'Вкусно и точка', 'Отсутствует', 100);

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int NOT NULL,
  `Composition` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `type` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `Composition`, `img`, `price`, `type`) VALUES
(1, 'Потом', '16951523171.png', 1111, 'breakfast'),
(2, 'Потом', '16951523252.jpg', 11, 'breakfast'),
(3, 'Потом', '16951523313.png', 111, 'breakfast'),
(4, 'Потом', '16951523384.jpg', 111, 'breakfast'),
(6, '111', '16951523695.jpg', 111, 'breakfast'),
(7, '111', '16951523746.jpg', 111, 'breakfast'),
(8, '111', '16951523817.jpg', 111, 'breakfast'),
(9, '111', '16951523868.jpg', 111, 'breakfast'),
(10, '111', '16951523919.jpg', 111, 'breakfast'),
(11, '111', '169515239710.jpeg', 111, 'breakfast'),
(12, '111', '169515240311.jpg', 111, 'breakfast'),
(14, 'Потом', '16951525391.jpeg', 111, 'snacks'),
(15, '111', '16951525592.jpg', 111, 'snacks'),
(16, '111', '16951525673.jpg', 111, 'snacks'),
(17, '111', '16951525764.jpg', 111, 'snacks'),
(18, '111', '16951525825.jpg', 111, 'snacks'),
(19, '111', '16951525916.jpeg', 111, 'snacks'),
(20, '111', '16951525977.jpeg', 111, 'snacks'),
(21, '111', '16951526068.png', 111, 'snacks'),
(22, '111', '16951526159.jpeg', 111, 'snacks'),
(23, '111', '169515263310.jpeg', 111, 'snacks'),
(24, '111', '16952387411.jpg', 111, 'salads'),
(25, '111', '16952387472.jpg', 111, 'salads'),
(26, '111', '16952387693.jpg', 111, 'salads'),
(27, '111', '16952387754.jpeg', 111, 'salads'),
(29, '111', '16952387865.jpeg', 111, 'salads'),
(30, '111', '16952388016.jpeg', 111, 'salads'),
(31, '111', '16952388087.jpeg', 111, 'salads'),
(33, '111', '16952388328.jpeg', 111, 'salads'),
(34, '111', '16952388529.jpeg', 111, 'salads'),
(35, '111', '16952389111.jpg', 111, 'soups'),
(36, '111', '16952389172.jpeg', 111, 'soups'),
(37, '111', '16952389253.jpeg', 111, 'soups'),
(38, '111', '16952389374.jpg', 111, 'soups'),
(39, '111', '16952391331.jpg', 111, 'hotter'),
(40, '111', '16952391392.jpg', 111, 'hotter'),
(41, '111', '16952391453.jpeg', 111, 'hotter'),
(42, '111', '16952391524.jpg', 111, 'hotter'),
(43, '111', '16952391575.jpeg', 111, 'hotter'),
(44, '111', '16952391666.jpeg', 111, 'hotter'),
(45, '111', '16952391717.jpeg', 111, 'hotter'),
(46, '111', '16952391788.jpg', 111, 'hotter'),
(47, '111', '16952391869.jpg', 111, 'hotter'),
(48, '111', '169523919210.jpeg', 111, 'hotter'),
(54, '111', '17067956011.jpeg', 111, 'pizza'),
(55, '111', '17067956082.jpeg', 111, 'pizza'),
(56, '111', '17067956143.jpeg', 111, 'pizza'),
(57, '111', '17067956244.jpeg', 111, 'pizza'),
(58, '111', '17067956325.jpeg', 111, 'pizza'),
(64, '111', '17067959166.jpeg', 111, 'pizza'),
(65, '111', '17067959441.jpeg', 111, 'side_dishes'),
(66, '111', '17067959522.jpeg', 111, 'side_dishes'),
(67, '111', '17067960053.jpeg', 111, 'side_dishes'),
(68, '111', '17067960134.jpeg', 111, 'side_dishes'),
(69, '111', '17067960205.jpeg', 111, 'side_dishes'),
(70, '111', '17067960401.png', 111, 'asia'),
(71, '111', '17067960472.jpg', 111, 'asia'),
(72, '111', '17067960533.png', 111, 'asia'),
(73, '111', '17067960604.jpg', 111, 'asia'),
(74, '111', '17067960665.jpg', 111, 'asia'),
(75, '111', '17067960766.jpg', 111, 'asia'),
(76, '111', '17067960827.jpg', 111, 'asia'),
(77, '111', '17067960981.png', 111, 'desserts'),
(78, '111', '17067961042.png', 111, 'desserts'),
(79, '111', '17067961103.png', 111, 'desserts'),
(80, '111', '17067961174.jpg', 111, 'desserts'),
(81, '111', '17067961245.jpg', 111, 'desserts'),
(82, '111', '17067961316.jpeg', 111, 'desserts'),
(83, '111', '17067961367.png', 111, 'desserts'),
(84, '111', '17067961581.png', 111, 'drinks'),
(85, '111', '17067961642.png', 111, 'drinks'),
(86, '111', '17067961713.png', 111, 'drinks'),
(87, '111', '17067961774.png', 111, 'drinks'),
(88, '111', '17067961835.jpg', 111, 'drinks'),
(89, '111', '17067961886.jpg', 111, 'drinks'),
(90, '111', '17067961957.jpg', 111, 'drinks'),
(91, '111', '17067962028.png', 111, 'drinks');

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `id` int NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `address` varchar(256) NOT NULL,
  `number` varchar(256) NOT NULL,
  `time` varchar(256) NOT NULL,
  `vk` varchar(256) NOT NULL,
  `tg` varchar(256) NOT NULL,
  `yandex` text NOT NULL,
  `supports` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `name`, `description`, `address`, `number`, `time`, `vk`, `tg`, `yandex`, `supports`) VALUES
(1, 'ONIKS', 'Ресторан ONIKS - это идеальное место для тех, кто стремится погрузиться в роскошную атмосферу и насладиться непревзойденными блюдами. Здесь время замирает, а каждый визит оставляет незабываемые воспоминания. Опытные и внимательные официанты ресторана ONIKS радушно встретят гостей, предлагая им комфортное и роскошное обслуживание.', 'Ониксовская 12', '+7 (999) 999-99-99', '09:00 - 00:00', 'https://vk.com/oniks.business', 'https://vk.com/oniks.business', 'https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A5aec328f0aa78d06ae8c1f7d231c2455612573180d92a8ff02236397de8af419', 'oniks@support.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `tables`
--

CREATE TABLE `tables` (
  `id` int NOT NULL,
  `status` varchar(256) NOT NULL,
  `access` int NOT NULL,
  `persons` int NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `tables`
--

INSERT INTO `tables` (`id`, `status`, `access`, `persons`, `img`) VALUES
(1, 'Свободен', 1, 2, '1.jpg'),
(2, 'Занят', 0, 4, '2.jpg'),
(3, 'Свободен', 1, 5, '3.jpg'),
(4, 'Занят', 0, 3, '4.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `login` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pass` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `number` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ban` int NOT NULL,
  `reson` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `pass`, `number`, `email`, `role`, `ban`, `reson`) VALUES
(1, 'Kirill Oniks', 'oniks', 'e3153e3b990edd0028d34405ec79d55d', '+7 (999) 999-99-99', 'oniks@mail.ru', 'admin', 0, ''),
(2, 'Kirill Alexandrovich', '15_ONIKS_49', 'e3153e3b990edd0028d34405ec79d55d', '+7 (999) 999-99-97', 'on1ks@mail.ru', 'admin', 0, ''),
(3, 'Admin User', 'Userov', 'e3153e3b990edd0028d34405ec79d55d', '+7 (999) 999-99-96', '15_oniks_49@mail.ru', 'admin', 0, ''),
(4, 'Admin Adminov', 'Adminov', 'e3153e3b990edd0028d34405ec79d55d', '+7 (999) 999-99-95', '15_on1ks_49@mail.ru', 'admin', 0, ''),
(5, 'Dima', 'programator', 'e3153e3b990edd0028d34405ec79d55d', '+7 (999) 999-99-94', 'programator@mail.ru', 'editor', 0, ''),
(6, 'Danil', 'unstoppable666', 'e3153e3b990edd0028d34405ec79d55d', '+7 (999) 999-99-93', 'unstoppable666@mail.ru', 'user', 0, ''),
(7, 'Alina', 'CHOOO', 'e3153e3b990edd0028d34405ec79d55d', '+7 (999) 999-99-92', 'CHOOO@mail.ru', 'user', 0, ''),
(8, 'Slava', 'Kuzmin', 'e3153e3b990edd0028d34405ec79d55d', '+7 (999) 999-99-91', 's.kuzmin@mail.ru', 'user', 0, ''),
(10, 'Pochta', 'onikss', '098f6bcd4621d373cade4e832627b4f6', '+7 (999) 999-99-90', 'test@test.ru', 'admin', 0, ''),
(32, 'Pochta', 'onikss', '098f6bcd4621d373cade4e832627b4f6', '+7 (999) 999-99-90', 'test@test.ru', 'admin', 0, ''),
(36, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '7999999999999', 'oniks@mail.ru', 'admin', 0, '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner` (`owner`);

--
-- Индексы таблицы `claim-feedback`
--
ALTER TABLE `claim-feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDpost` (`IDpost`);

--
-- Индексы таблицы `dell_users`
--
ALTER TABLE `dell_users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`,`reson`) USING BTREE,
  ADD KEY `name` (`name`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT для таблицы `claim-feedback`
--
ALTER TABLE `claim-feedback`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT для таблицы `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`owner`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `claim-feedback`
--
ALTER TABLE `claim-feedback`
  ADD CONSTRAINT `claim-feedback_ibfk_1` FOREIGN KEY (`IDpost`) REFERENCES `feedback` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
