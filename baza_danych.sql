-- phpMyAdmin SQL Dump
-- version home.pl
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 02 Maj 2019, 11:51
-- Wersja serwera: 5.7.24-27-log
-- Wersja PHP: 5.6.34

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `30189788_dzieci`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ceny`
--

CREATE TABLE IF NOT EXISTS `ceny` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cena` int(11) NOT NULL,
  `cenaTotal` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Zrzut danych tabeli `ceny`
--

INSERT INTO `ceny` (`id`, `cena`, `cenaTotal`) VALUES
(11, 149, 1341),
(12, 159, 1431),
(13, 159, 1431),
(14, 179, 1611),
(15, 189, 1701),
(16, 199, 1791);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `daty`
--

CREATE TABLE IF NOT EXISTS `daty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `PierD` int(11) NOT NULL,
  `PierM` int(11) NOT NULL,
  `PierR` int(11) NOT NULL,
  `DrugiD` int(11) NOT NULL,
  `DrugiM` int(11) NOT NULL,
  `DrugiR` int(11) NOT NULL,
  `TrzeciD` int(11) NOT NULL,
  `TrzeciM` int(11) NOT NULL,
  `TrzeciR` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Zrzut danych tabeli `daty`
--

INSERT INTO `daty` (`id`, `PierD`, `PierM`, `PierR`, `DrugiD`, `DrugiM`, `DrugiR`, `TrzeciD`, `TrzeciM`, `TrzeciR`) VALUES
(1, 1, 6, 2019, 1, 8, 2019, 1, 9, 2019);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dzieci`
--

CREATE TABLE IF NOT EXISTS `dzieci` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `telefon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `klasa` int(11) NOT NULL,
  `DataUr` date NOT NULL,
  `grupa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `polityka` tinyint(1) NOT NULL,
  `uwagi` longtext COLLATE utf8_unicode_ci,
  `k24_nazwa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `k24_ulica` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `k24_numer_dom` int(11) NOT NULL,
  `k24_numer_lok` int(11) DEFAULT NULL,
  `k24_kod` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `k24_miasto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `k24_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `z24_id_sprzedawcy` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `z24_crc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `z24_return_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `z24_language` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nazwaDz` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Zrzut danych tabeli `dzieci`
--

INSERT INTO `dzieci` (`id`, `telefon`, `klasa`, `DataUr`, `grupa`, `polityka`, `uwagi`, `k24_nazwa`, `k24_ulica`, `k24_numer_dom`, `k24_numer_lok`, `k24_kod`, `k24_miasto`, `k24_email`, `z24_id_sprzedawcy`, `z24_crc`, `z24_return_url`, `z24_language`, `nazwaDz`) VALUES
(6, '664036435', 4, '2011-10-18', '1', 1, NULL, 'Tomasz Mlastek', 'Falista', 4, 35, '61-249', 'Poznań', 'tomaszmlastek@gmail.com', 'xxxxx', '5ebc7348', 'http://czytaniedladzieci/dziekuje', 'pl', 'Katarzyna Mlastek');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kursy`
--

CREATE TABLE IF NOT EXISTS `kursy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nazwa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adres` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dzienigodzina` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `poczatekkursu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mapa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `liczbakursantow` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `kursy`
--

INSERT INTO `kursy` (`id`, `grupa`, `nazwa`, `adres`, `dzienigodzina`, `poczatekkursu`, `mapa`, `liczbakursantow`) VALUES
(1, '4-6', 'Szkoła językowa PERFECT', 'Św. Marcin 26/15, Poznań', '9.15', '28.09.2019', 'pb=!1m14!1m8!1m3!1d9736.101218429443!2d16.9274146!3d52.4062176!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4fb5feebae105637!2sPERFECT+Kursy+J%C4%99zykowe!5e0!3m2!1spl!2spl!4v1555963391934!5m2!1spl!2spl" width="', 1),
(2, '4-6', 'Szkoła językowa PERFECT', 'Św. Marcin 26/15, Poznań', '11.30', '28.09.2019', 'pb=!1m14!1m8!1m3!1d9736.101218429443!2d16.9274146!3d52.4062176!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4fb5feebae105637!2sPERFECT+Kursy+J%C4%99zykowe!5e0!3m2!1spl!2spl!4v1555963391934!5m2!1spl!2spl" width="', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `licznik`
--

CREATE TABLE IF NOT EXISTS `licznik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `licznik` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wiadomosc`
--

CREATE TABLE IF NOT EXISTS `wiadomosc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imie` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `wiadomosc` longtext COLLATE utf8_unicode_ci NOT NULL,
  `zgoda` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
