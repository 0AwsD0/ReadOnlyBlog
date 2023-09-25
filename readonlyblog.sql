-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 26 Wrz 2023, 00:04
-- Wersja serwera: 10.4.19-MariaDB
-- Wersja PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `readonlyblog`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rob_aside`
--

CREATE TABLE `rob_aside` (
  `id_aside` int(11) NOT NULL,
  `content_aside` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rob_footer`
--

CREATE TABLE `rob_footer` (
  `id_footer` int(11) NOT NULL,
  `is_enabled_footer` tinyint(1) NOT NULL DEFAULT 1,
  `name_footer` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'LINK',
  `link_footer` text COLLATE utf8_unicode_ci DEFAULT '#',
  `image_footer` text COLLATE utf8_unicode_ci NOT NULL DEFAULT 'img/ico/link.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `rob_footer`
--

INSERT INTO `rob_footer` (`id_footer`, `is_enabled_footer`, `name_footer`, `link_footer`, `image_footer`) VALUES
(1, 1, 'Github', 'https://github.com/0AwsD0', 'img/ico/link.png'),
(5, 1, 'Bitbucket', '#', 'img/ico/link.png'),
(6, 1, 'SourceForge', '#', 'img/ico/link.png'),
(7, 0, 'YouTube', '#', 'img/ico/link.png');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rob_log`
--

CREATE TABLE `rob_log` (
  `id_log` int(11) NOT NULL,
  `content_log` text COLLATE utf8_unicode_ci NOT NULL,
  `date_time_log` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rob_post`
--

CREATE TABLE `rob_post` (
  `id_post` int(11) NOT NULL,
  `visibility_post` tinyint(1) NOT NULL DEFAULT 1,
  `title_post` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'TITLE',
  `introduction_post` text COLLATE utf8_unicode_ci DEFAULT 'introduction',
  `creation_date_post` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `rob_post`
--

INSERT INTO `rob_post` (`id_post`, `visibility_post`, `title_post`, `introduction_post`, `creation_date_post`) VALUES
(1, 1, 'Test Post', 'This is test post created by Read Only Blog.', '2023-08-29 18:49:58'),
(2, 1, 'To jest post numero 2', 'To jest post numero 2 To jest post numero 2To jest post numero 2To jest post numero 2To jest post numero 2To jest post numero 2To jest post numero 2To jest post numero 2To jest post numero 2To jest post numero 2To jest post numero 2', '2023-08-29 18:49:50'),
(3, 1, 'Test3 To jest test BOTTOM GEAR 3 bo oglądałem ten mem za dużo RAZY KEKW', 'Today at BOTTOM GEAR. Using cars to to ride a cars inside cars in cars for cars because cars are so cars', '2023-08-29 18:51:30'),
(4, 1, 'Test3 To jest test BOTTOM GEAR 3 bo oglądałem ten mem za dużo RAZY KEKW', 'Today at BOTTOM GEAR. Using cars to to ride a cars inside cars in cars for cars because cars are so cars', '2023-08-29 18:51:37'),
(5, 1, 'Test44444 To jest test BOTTOM GEAR 3 bo oglądałem ten mem za dużo RAZY KEKW', '444444444444444 Today at BOTTOM GEAR. Using cars to to ride a cars inside cars in cars for cars because cars are so cars', '2023-08-29 18:51:53');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rob_post_content`
--

CREATE TABLE `rob_post_content` (
  `id_post_content` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `order_post_content` int(11) NOT NULL,
  `data_type_post_content` int(11) NOT NULL,
  `content_post_content` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `rob_post_content`
--

INSERT INTO `rob_post_content` (`id_post_content`, `id_post`, `order_post_content`, `data_type_post_content`, `content_post_content`) VALUES
(1, 1, 1, 1, 'To jest tekst w bazie danych oznaczony typem danych jako \"1\". \'1\' oznacza H1.');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rob_settings`
--

CREATE TABLE `rob_settings` (
  `id_setings` int(11) NOT NULL,
  `header_text_color_settings` tinytext COLLATE utf8_unicode_ci NOT NULL DEFAULT '\'black\'',
  `header_position_settings` tinytext COLLATE utf8_unicode_ci NOT NULL DEFAULT '\'center\'',
  `header_image_uri_settings` text COLLATE utf8_unicode_ci NOT NULL DEFAULT '\'img/header.jpg\'\'',
  `header_image_settings` tinytext COLLATE utf8_unicode_ci NOT NULL DEFAULT '\'cover\'',
  `active_settings` tinyint(1) NOT NULL DEFAULT 0,
  `blog_name_settings` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Read Only Blog',
  `active_footer_settings` tinyint(1) NOT NULL DEFAULT 0,
  `active_aside_settings` tinyint(1) NOT NULL DEFAULT 0,
  `css_settings` tinytext COLLATE utf8_unicode_ci NOT NULL DEFAULT 'old_grey_',
  `admin_panel_css_settings` tinytext COLLATE utf8_unicode_ci NOT NULL DEFAULT 'white_'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `rob_settings`
--

INSERT INTO `rob_settings` (`id_setings`, `header_text_color_settings`, `header_position_settings`, `header_image_uri_settings`, `header_image_settings`, `active_settings`, `blog_name_settings`, `active_footer_settings`, `active_aside_settings`, `css_settings`, `admin_panel_css_settings`) VALUES
(1, 'black', 'center', 'img/header.jpg', 'cover', 1, 'Read Only Blog Default', 1, 1, 'old_grey_', 'white_'),
(2, 'black', 'center', 'img/header.jpg', 'cover', 0, 'Set 2', 0, 0, 'old_grey_', 'white_');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rob_subpage`
--

CREATE TABLE `rob_subpage` (
  `id_subpage` int(11) NOT NULL,
  `id_settings` int(11) NOT NULL,
  `is_active_subpage` tinyint(1) NOT NULL DEFAULT 0,
  `type_subpage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rob_user`
--

CREATE TABLE `rob_user` (
  `id_user` int(11) NOT NULL,
  `email_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `rob_user`
--

INSERT INTO `rob_user` (`id_user`, `email_user`, `password_user`) VALUES
(1, '$2y$10$1xqNdt/FXFSUk1Snn6XL7.HsWimK26lVWWtdaQtSeD9sCtUwegBsC', '$2y$10$KiJx7nE86AW0z1lZdQzt3eR/W6RO5vj7ZbMHHIbdl5fJC0a86syJK');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `rob_aside`
--
ALTER TABLE `rob_aside`
  ADD PRIMARY KEY (`id_aside`),
  ADD UNIQUE KEY `id_aside` (`id_aside`);

--
-- Indeksy dla tabeli `rob_footer`
--
ALTER TABLE `rob_footer`
  ADD PRIMARY KEY (`id_footer`) USING BTREE,
  ADD UNIQUE KEY `id_footer` (`id_footer`);

--
-- Indeksy dla tabeli `rob_log`
--
ALTER TABLE `rob_log`
  ADD PRIMARY KEY (`id_log`),
  ADD UNIQUE KEY `id_log` (`id_log`);

--
-- Indeksy dla tabeli `rob_post`
--
ALTER TABLE `rob_post`
  ADD PRIMARY KEY (`id_post`),
  ADD UNIQUE KEY `id_post` (`id_post`);

--
-- Indeksy dla tabeli `rob_post_content`
--
ALTER TABLE `rob_post_content`
  ADD PRIMARY KEY (`id_post_content`),
  ADD UNIQUE KEY `id_post_content` (`id_post_content`),
  ADD KEY `rob_post_content_fk0` (`id_post`);

--
-- Indeksy dla tabeli `rob_settings`
--
ALTER TABLE `rob_settings`
  ADD PRIMARY KEY (`id_setings`),
  ADD UNIQUE KEY `id_setings` (`id_setings`);

--
-- Indeksy dla tabeli `rob_subpage`
--
ALTER TABLE `rob_subpage`
  ADD PRIMARY KEY (`id_subpage`),
  ADD UNIQUE KEY `id_subpage` (`id_subpage`),
  ADD KEY `rob_subpage_fk0` (`id_settings`);

--
-- Indeksy dla tabeli `rob_user`
--
ALTER TABLE `rob_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `rob_aside`
--
ALTER TABLE `rob_aside`
  MODIFY `id_aside` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `rob_footer`
--
ALTER TABLE `rob_footer`
  MODIFY `id_footer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `rob_log`
--
ALTER TABLE `rob_log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `rob_post`
--
ALTER TABLE `rob_post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `rob_post_content`
--
ALTER TABLE `rob_post_content`
  MODIFY `id_post_content` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `rob_settings`
--
ALTER TABLE `rob_settings`
  MODIFY `id_setings` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `rob_subpage`
--
ALTER TABLE `rob_subpage`
  MODIFY `id_subpage` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `rob_user`
--
ALTER TABLE `rob_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `rob_post_content`
--
ALTER TABLE `rob_post_content`
  ADD CONSTRAINT `rob_post_content_fk0` FOREIGN KEY (`id_post`) REFERENCES `rob_post` (`id_post`);

--
-- Ograniczenia dla tabeli `rob_subpage`
--
ALTER TABLE `rob_subpage`
  ADD CONSTRAINT `rob_subpage_fk0` FOREIGN KEY (`id_settings`) REFERENCES `rob_settings` (`id_setings`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
