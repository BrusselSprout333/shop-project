-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Окт 02 2022 г., 17:15
-- Версия сервера: 5.7.34
-- Версия PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `myshop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `image`) VALUES
(1, 'Всё', 'все.png'),
(2, 'Диваны', 'диван.png'),
(3, 'Кресла', 'кресло.png'),
(5, 'Кровати', 'кровать.png'),
(7, 'Шкафы', 'Шкаф.png'),
(9, 'Тумбы', 'тумба.png'),
(10, 'Столы', 'стол.png'),
(11, 'Стулья', 'стул.png'),
(12, 'Полки', 'полка.png'),
(20, 'Прочее', 'прочее.png');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` float UNSIGNED NOT NULL,
  `about` text,
  `image` varchar(100) DEFAULT NULL,
  `category_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `about`, `image`, `category_id`) VALUES
(12, 'Диван Рон', 260.3, 'Каркас: массив, фанера, ДВП, ДСП <br>\r\nМатериал опор: сращенный массив<br>\r\nТкань: Велюр', 'Диван_Рон.jpg', 2),
(13, 'Диван Мисл', 310, 'Каркас: массив, фанера, мебельный ремень<br>\r\nМатериал опор: сращенный массив<br>\r\nТкань: Велюр', 'Диван_Мисл.jpg', 2),
(14, 'Диван Шилдс', 450.7, 'Каркас: фанера, ДВП, ДСП<br>\r\nМатериал опор: пластик<br>\r\nТкань: Рогожка', 'Диван_Шилдс.jpg', 2),
(15, 'Диван Карлос', 800, 'Каркас: фанера, ДВП, ДСП<br>\r\nМатериал опор: пластик<br>\r\nТкань: Рогожка', 'Диван_Карлос.jpg', 2),
(16, 'Кресло Тилар', 600.5, 'Каркас: фанера, ДВП, пружинная змейка<br>\r\nЦвет основной: синий<br> \r\nТип обивки: ткань', 'Кресло_Тилар.jpg', 3),
(17, 'Кресло Пайл', 550, 'Каркас: массив, фанера, мебельный ремень<br>\r\nЦвет основной: зеленый<br>\r\nТип обивки: ткань', 'Кресло_Пайл.jpg', 3),
(18, 'Кресло-кровать Бонс-Т', 860.7, 'Каркас: массив, фанера, мебельный ремень<br>Цвет основной: желтый<br>Тип обивки: ткань', 'Кресло-кровать_Бонс-Т.jpg', 3),
(19, 'Кресло-кровать Слипсон', 1010, 'Каркас: фанера, ДВП, ДСП, пружинная змейка<br>Тип обивки: ткань<br>Цвет основной: серый', 'Кресло-кровать_Слипсон.jpg', 3),
(20, 'Модульное кресло Полан', 1500, 'Каркас: массив, фанера, ДВП, ДСП, пружинная змейка<br>Ткань: Велюр<br>Цвет основной: розовый', 'Модульное_кресло_Полан.jpg', 3),
(21, 'Кресло Витио', 499.9, 'Каркас: фанера, ДВП, ДСП<br>\r\nТип обивки: ткань<br>\r\nЦвет основной: красный', 'Кресло_Витио.jpg', 3),
(22, 'Кровать Ситено', 1217, 'Спальное место: 200 x 160<br>Материал изголовья: ткань, мебельный щит<br>Цвет основной: серый', 'Кровать_Ситено.jpg', 5),
(23, 'Кровать Льери', 1346, 'Спальное место: 200 x 180<br>\r\nМатериал изголовья: ткань, мебельный щит<br>\r\nЦвет основной: розовый', 'Кровать_Льери.jpg', 5),
(24, 'Кровать Кьево', 1278.8, 'Спальное место: 200 x 160<br>\r\nМатериал изголовья: ткань, мебельный щит<br>\r\nЦвет основной: голубой', 'Кровать_Кьево.jpg', 5),
(25, 'Распашной шкаф Монблан', 2185, 'Материал корпуса: ЛДСП 16 мм<br>Материал фасада: МДФ 16 мм<br>Цвет основной: синий, бежевый', 'Распашной_шкаф_Монблан.jpg', 7),
(26, 'Шкаф-купе Тебар', 1029, 'Материал корпуса: ЛДСП 16 мм<br>\r\nМатериал фасада: ЛДСП 16 мм<br>\r\nЦвет основной: белый', 'Шкаф-купе_Тебар.jpg', 7),
(27, 'Распашной шкаф Пронто', 1383, 'Материал корпуса: ЛДСП 16 мм<br>\r\nМатериал фасада: ЛДСП 16 мм<br>Цвет основной: серый', 'Распашной_шкаф_Пронто.jpg', 7),
(30, 'Покрывало Китн', 180.7, 'Размеры: 220см х 240см<br>\r\nСостав: 100% полиэстер<br>\r\nЦвет основной: бежевый', 'Покрывало_Китн.jpg', 20),
(31, 'Плед Рифф', 117, 'Размеры: 130см х 170см<br>\r\nСостав: 100% акрил<br>\r\nЦвет основной: розовый', 'Плед_Рифф.jpg', 20),
(32, 'Подушка Линкс', 56.5, 'Размеры: 45см х 450см<br>\r\nТкань: Велюр<br>\r\nЦвет основной: зеленый', 'Подушка_Линкс.jpg', 20),
(33, 'Тумба Лорэна', 210, 'Размеры: 55см х 44см х 50см<br>\r\nМатериал корпуса: ЛДСП 16 мм<br>\r\nЦвет основной: черный', 'Тумба_Лорэна.jpg', 9),
(34, 'Тумба Ивейн', 315, 'Размеры: 43см х 36см х 57см<br>\r\nМатериал корпуса: ЛДСП 16 мм<br>\r\nЦвет основной: бежевый', 'Тумба_Ивейн.jpg', 9),
(35, 'Тумба Ферран', 478.4, 'Размеры: 50см х 42см х 62см<br>\r\nМатериал корпуса: ЛДСП 16 мм<br>\r\nЦвет основной: серый, бежевый', 'Тумба_Ферран.jpg', 9),
(36, 'Письменный стол Дантон', 497, 'Размеры: 100см х 50см х 76см<br>\r\nМатериал корпуса: ЛДСП 16 мм<br>\r\nЦвет основной: белый, бежевый', 'Письменный_стол_Дантон.jpg', 10),
(37, 'Стол Нордик', 650.7, 'Размеры: 120см х 50см х 80см<br>\r\nМатериал корпуса: ЛДСП 16 мм<br>\r\nЦвет основной: белый', 'Стол_Нордик.jpg', 10),
(38, 'Письменный стол Теджонс', 854, 'Размеры: 120см х 50см х 87см<br>\r\nМатериал корпуса: ЛДСП 32 мм<br>\r\nЦвет основной: синий, бежевый', 'Письменный_стол_Теджонс.jpg', 10),
(39, 'Стол Лофт', 766, 'Размеры: 120см х 60см х 81см<br>\r\nМатериал корпуса: ЛДСП 32 мм<br>\r\nЦвет основной: коричневый, черный', 'Стол_Лофт.jpg', 10),
(40, 'Стул барный Эймс', 366, 'Высота сиденья: 75 см<br>\r\nМаксимальная нагрузка: 120 кг<br>\r\nЦвет основной: черный', 'Стул_барный_Эймс.jpg', 11),
(41, 'Стул Валенсия', 410.5, 'Высота сиденья: 46 см<br>\r\nТкань: Велюр<br>\r\nЦвет основной: бежевый', 'Стул_Валенсия.jpg', 11),
(42, 'Стул Меган', 319, 'Высота сиденья: 47 см<br>\r\nТкань: Велюр<br>\r\nЦвет основной: бежевый', 'Стул_Меган.jpg', 11),
(43, 'Полка Кливленд', 215, 'Размеры: 36см х 30см х 35см<br>\r\nМатериал корпуса: ЛДСП 16 мм<br>\r\nЦвет основной: бежевый', 'Полка_Кливленд.jpg', 12),
(44, 'Полка Хайдер', 130, 'Размеры: 115см х 20см х 20см<br>\r\nМатериал корпуса: ЛДСП 16 мм<br>\r\nЦвет основной: коричневый, черный', 'Полка_Хайдер.jpg', 12);

-- --------------------------------------------------------

--
-- Структура таблицы `product_users`
--

CREATE TABLE `product_users` (
  `id` int(11) NOT NULL,
  `id_users` int(5) NOT NULL,
  `id_product` int(5) NOT NULL,
  `count` int(3) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_users`
--

INSERT INTO `product_users` (`id`, `id_users`, `id_product`, `count`) VALUES
(28, 10, 15, 1),
(29, 10, 21, 1),
(39, 7, 13, 2),
(43, 7, 21, 1),
(44, 7, 14, 1),
(45, 7, 33, 1),
(46, 11, 13, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `is_admin`, `email`, `login`, `password`) VALUES
(6, NULL, 'fofo@fo.com', 'fofo', '1634d62b14babc2dbeb5cbd7b81154d1'),
(7, 1, 'admin@admin.com', 'admin', 'e1fd090173f00b74ef1c485530e8fb93'),
(8, NULL, 'bobo@sha.by', 'bobo', '4e9888275df791b573cbfd271bc1bb82'),
(9, NULL, 'momo@mo.mo', 'momo', '6312476060d23b9fc9ca0a1b02497f5b'),
(10, 1, 'admin2@as.as', 'admin2', '6312476060d23b9fc9ca0a1b02497f5b'),
(11, NULL, 'korol@voron.com', 'Korol', 'bce6671f7c4f466b4ff8e389277435b4'),
(12, NULL, 'nastya@kot', 'nastya', '236e14588f2e3c26681ea496318c5300'),
(16, NULL, 'goose@dd.d', 'goose', '232f0c225d44c428c0870836f0279b44');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category` (`name`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `cat_id` (`category_id`);

--
-- Индексы таблицы `product_users`
--
ALTER TABLE `product_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_users_ibfk_1` (`id_product`),
  ADD KEY `product_users_ibfk_2` (`id_users`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`,`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT для таблицы `product_users`
--
ALTER TABLE `product_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `product_users`
--
ALTER TABLE `product_users`
  ADD CONSTRAINT `product_users_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_users_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
