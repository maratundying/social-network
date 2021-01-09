-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Янв 09 2021 г., 06:21
-- Версия сервера: 10.4.13-MariaDB
-- Версия PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `social-network`
--

-- --------------------------------------------------------

--
-- Структура таблицы `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `user1_id` int(11) DEFAULT NULL,
  `user2_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `friends`
--

INSERT INTO `friends` (`id`, `user1_id`, `user2_id`, `created_at`, `updated_at`) VALUES
(8, 6, 4, NULL, NULL),
(9, 5, 4, NULL, NULL),
(10, 4, 7, NULL, NULL),
(11, 4, 8, NULL, NULL),
(12, 4, 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `likes`
--

INSERT INTO `likes` (`id`, `post_id`, `user_id`) VALUES
(102, 2, 5),
(103, 1, 5),
(104, 3, 5),
(120, 3, 4),
(127, 12, 6),
(128, 11, 6),
(136, 12, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_12_17_132409_create_user', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `photos`
--

CREATE TABLE `photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `photos`
--

INSERT INTO `photos` (`id`, `photo`, `user_id`) VALUES
(11, 'images/photos/5ff4291fcac911_Sfmx-F7kzbnuT-QQmL4dAQ.jpeg', 4),
(12, 'images/photos/5ff4479f0afc722-Beautiful-Photos-of-Mauritius-14.jpg', 4),
(13, 'images/photos/5ff447a7c22aa1_Sfmx-F7kzbnuT-QQmL4dAQ.jpeg', 4),
(14, 'images/photos/5ff56d1f9dac022-Beautiful-Photos-of-Mauritius-14.jpg', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `statuses`
--

INSERT INTO `statuses` (`id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 'asnisnfidsnansfinsd', NULL, NULL),
(2, 5, 'Asdonfonsafno', NULL, NULL),
(3, 6, 'asfasdf', NULL, NULL),
(4, 5, 'Status2', NULL, NULL),
(5, 5, 'Status3', NULL, NULL),
(6, 5, 'status4', NULL, NULL),
(11, 4, 'st', NULL, NULL),
(12, 4, 'sadf', '2021-01-03 09:43:22', NULL),
(14, 4, 'asdfasdfadsfasdf', '2021-01-06 11:25:02', '2021-01-06 11:25:02'),
(15, 4, 'asdfadfadsf', '2021-01-06 11:28:51', '2021-01-06 11:28:51'),
(16, 4, 'asfsadf', '2021-01-06 11:31:55', '2021-01-06 11:31:55');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'images/icons/avatar.png',
  `registered` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_status` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `email`, `password`, `image`, `registered`, `created_at`, `updated_at`, `user_status`) VALUES
(4, 'Marat', 'Arzumanyan', 'maratundying@gmail.com', '$2y$10$EzvzOnepwVMIJ/VfzRnM/.a2oIKCDV91mdAVMPlzLmpTNXLd2V5sW', 'images/photos/5ff56d1f9dac022-Beautiful-Photos-of-Mauritius-14.jpg', 1, '2020-12-17 10:44:58', '2021-01-06 04:56:15', ''),
(5, 'SADFK', 'ASKDF', 'marat@mail.ru', '$2y$10$vIk3nT9BEckFMDKPfajoKuBEouz9eN5sEKGQioi/rpn3hs8wRKaO2', 'images/icons/avatar.png', 1, '2020-12-23 15:24:04', '2020-12-23 15:24:04', NULL),
(6, 'Anna', 'Hakobyan', 'maratundying@mail.ru', '$2y$10$/tPPwUe3Zpwj0naNFA.T/.lVOqrsOthI8trVPy6Qm8jSAYGayfj5K', 'images/icons/avatar.png', 1, '2020-12-30 10:31:39', '2020-12-30 10:31:39', NULL),
(7, 'mamamamamama', 'mamamamamamamama', 'masdaf@mail.ru', '', 'images/icons/avatar.png', 1, NULL, NULL, NULL),
(8, 'qwerwqerni', 'nininini', 'ninininini@mail.ru', '', 'images/icons/avatar.png', 1, NULL, NULL, NULL),
(9, 'momomo', 'sadfasf', 'msomom@mail.ru', '', 'images/icons/avatar.png', 1, NULL, NULL, NULL),
(10, 'asfasf', 'safdasdfasfsadf', 'marartwsadf@mail.ru', '', 'images/icons/avatar.png', 1, NULL, NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
