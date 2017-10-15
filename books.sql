-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 27 2017 г., 01:13
-- Версия сервера: 5.5.53
-- Версия PHP: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `books`
--

-- --------------------------------------------------------

--
-- Структура таблицы `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `authors`
--

INSERT INTO `authors` (`id`, `name`) VALUES
(1, 'Л.Н. Толстой'),
(2, 'М.А. Булгаков'),
(3, 'М. Шолохов'),
(4, 'А. Дюма'),
(5, 'А. Конан Дойл');

-- --------------------------------------------------------

--
-- Структура таблицы `bookmarks`
--

CREATE TABLE `bookmarks` (
  `user_id` int(11) NOT NULL,
  `bookmark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `bookmarks`
--

INSERT INTO `bookmarks` (`user_id`, `bookmark`) VALUES
(48, '5/134'),
(48, '6/254'),
(48, '4/519'),
(48, '3/927'),
(48, '4/621'),
(39, '4/212'),
(49, '2/95'),
(49, '6/648'),
(49, '6/348'),
(49, '3/1445'),
(43, '1/223'),
(43, '1/741'),
(43, '3/1114'),
(43, '3/1122'),
(43, '5/136'),
(43, '4/452'),
(43, '1/5');

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `year` int(4) NOT NULL,
  `pub_date` datetime NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `genre`, `description`, `year`, `pub_date`, `rate`) VALUES
(1, 'Война и мир', '1', '1', 'война и мир - роман-эпопея, написанный Львом Николаевичем Толстым', 1856, '2017-04-06 18:40:31', 35),
(2, 'Мастер и Маргарита', '2', '4', 'Роман Михаила Афанасьевича Булгакова, работа над которым началась в конце 1920-х годов и продолжалась вплоть до смерти писателя. Роман относится к незавершённым произведениям; редактирование и сведение воедино черновых записей ', 1935, '2017-04-06 18:40:31', 28),
(3, 'Тихий Дон', '3', '1', '«Ти́хий Дон» — роман-эпопея Михаила Шолохова в четырёх томах. Тома 1—3 написаны с 1925 по 1932 год, опубликованы в журнале «Октябрь» в 1928—1932 гг. Том 4 закончен в 1940 году, опубликован в журнале «Новый мир» в 1937—1940 году[1].', 1940, '2017-05-14 06:43:24', 76),
(4, 'Граф Мон­те-Крис­то', '4', '11', 'Приключенческий роман Александра Дюма, классика французской литературы, написанный в 1844-1845 годах', 1845, '2017-05-14 11:27:23', 42),
(5, 'Приключения Шерлока Холмса', '5', '9', 'Приключе́ния Ше́рлока Хо́лмса — сборник из 12 детективных рассказов, созданных Артуром Конаном Дойлом. Был опубликован в 1892 году и является первым сборником рассказов о Холмсе.', 1892, '2017-06-15 07:25:31', 97),
(6, 'Три мушкетёра', '4', '13', '«Три мушкетёра» (фр. Les trois mousquetaires) — историко-приключенческий роман Александра Дюма-отца, написанный в 1844 году. Книга посвящена приключениям молодого человека по имени д’Артаньян, покинувшего дом, чтобы стать мушкетёром, и трёх его друзей-мушкетёров Атоса, Портоса и Арамиса в период между 1625 и 1628 годами.', 1844, '2017-06-14 09:26:15', 19);

-- --------------------------------------------------------

--
-- Структура таблицы `favorites`
--

CREATE TABLE `favorites` (
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `favorites`
--

INSERT INTO `favorites` (`user_id`, `book_id`) VALUES
(40, 2),
(40, 6),
(40, 3),
(40, 5),
(40, 1),
(48, 1),
(48, 4),
(48, 3),
(48, 6),
(48, 2),
(48, 5),
(39, 1),
(39, 3),
(39, 5),
(49, 4),
(49, 1),
(49, 2),
(49, 3),
(49, 6),
(43, 1),
(43, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `genres`
--

INSERT INTO `genres` (`id`, `name`, `sort_order`, `status`) VALUES
(1, 'Роман-эпопея', 1, 1),
(2, 'Фантастика', 3, 1),
(3, 'Фэнтези', 4, 1),
(4, 'Роман', 0, 1),
(6, 'Бизнес-книги', 0, 1),
(7, 'Биография', 0, 1),
(8, 'Боевик', 0, 1),
(9, 'Детектив', 0, 1),
(10, 'Компьютерная литература', 0, 1),
(11, 'Приключения', 0, 1),
(13, 'Исторический роман', 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `rating`
--

CREATE TABLE `rating` (
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `action` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `rating`
--

INSERT INTO `rating` (`user_id`, `book_id`, `created_at`, `action`) VALUES
(43, 6, '2017-06-22 04:52:45', 1),
(43, 3, '2017-06-22 04:52:48', 1),
(43, 4, '2017-06-22 05:05:01', 1),
(43, 2, '2017-06-22 05:05:03', 0),
(43, 5, '2017-06-22 05:05:06', 1),
(43, 1, '2017-06-22 05:58:17', 1),
(40, 6, '2017-06-22 21:58:18', 1),
(40, 3, '2017-06-22 21:58:19', 1),
(40, 5, '2017-06-22 21:58:20', 1),
(40, 1, '2017-06-22 21:58:21', 1),
(40, 4, '2017-06-22 21:58:22', 1),
(40, 2, '2017-06-22 21:58:23', 1),
(49, 1, '2017-06-24 10:12:39', 1),
(49, 5, '2017-06-24 10:12:44', 1),
(48, 2, '2017-06-24 20:20:31', 1),
(48, 4, '2017-06-24 20:20:32', 1),
(48, 1, '2017-06-24 20:22:03', 1),
(48, 3, '2017-06-25 01:53:22', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `pass`, `created_at`) VALUES
(39, '123123123@ya.ru', '4297f44b13955235245b2497399d7a93', '2017-06-20 23:11:59'),
(40, '123@ya.ru', '4297f44b13955235245b2497399d7a93', '2017-06-20 23:14:06'),
(41, '!123@ya.ru', '4297f44b13955235245b2497399d7a93', '2017-06-20 23:27:19'),
(42, '1212@ya.ru', '4297f44b13955235245b2497399d7a93', '2017-06-20 23:32:58'),
(43, '123123@ya.ru', '4297f44b13955235245b2497399d7a93', '2017-06-20 23:53:28'),
(44, '123123123123@ya.ru', '4297f44b13955235245b2497399d7a93', '2017-06-21 00:30:12'),
(45, '123321@ya.ru', '4297f44b13955235245b2497399d7a93', '2017-06-21 22:50:20'),
(46, '12312312312312@ya.ru', 'aae77dd310a3d99c13ac36b042c934ee', '2017-06-22 02:32:32'),
(47, '112312312@ya.ru', 'c4242a4064b9bd1cce1da7b11bddf900', '2017-06-22 21:54:18'),
(48, 'semen123@ya.ru', '3217ee2e396503d814106ce9c0500a4b', '2017-06-24 07:48:07'),
(49, '123123321@ya.ru', '4297f44b13955235245b2497399d7a93', '2017-06-24 10:12:23');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
