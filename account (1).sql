-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Počítač: endora-db-06.stable.cz:3306
-- Vytvořeno: Úte 03. říj 2023, 08:14
-- Verze serveru: 10.3.35-MariaDB
-- Verze PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `account`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `autor`
--

CREATE TABLE `autor` (
  `autor_id` int(11) NOT NULL,
  `jmeno` varchar(50) NOT NULL,
  `prezdivka` varchar(50) NOT NULL,
  `narozeni` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabulky `knihy`
--

CREATE TABLE `knihy` (
  `knihy_id` int(11) NOT NULL,
  `nazev` varchar(50) NOT NULL,
  `vydani` date NOT NULL,
  `ISBN` int(11) NOT NULL,
  `autor_id` int(11) NOT NULL,
  `pocet_stran` int(11) NOT NULL,
  `zanr` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabulky `ukazky`
--

CREATE TABLE `ukazky` (
  `ukazky_id` int(11) NOT NULL,
  `uziv_id` int(11) NOT NULL,
  `datum_add` date NOT NULL,
  `knihy_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabulky `uzivatel`
--

CREATE TABLE `uzivatel` (
  `uziv_id` int(11) NOT NULL,
  `jmeno` varchar(50) NOT NULL,
  `prezdivka` varchar(50) NOT NULL,
  `narozeni` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`autor_id`);

--
-- Klíče pro tabulku `knihy`
--
ALTER TABLE `knihy`
  ADD PRIMARY KEY (`knihy_id`),
  ADD KEY `autor_id` (`autor_id`) USING BTREE;

--
-- Klíče pro tabulku `ukazky`
--
ALTER TABLE `ukazky`
  ADD PRIMARY KEY (`ukazky_id`);

--
-- Klíče pro tabulku `uzivatel`
--
ALTER TABLE `uzivatel`
  ADD PRIMARY KEY (`uziv_id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `autor`
--
ALTER TABLE `autor`
  MODIFY `autor_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `knihy`
--
ALTER TABLE `knihy`
  MODIFY `knihy_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `ukazky`
--
ALTER TABLE `ukazky`
  MODIFY `ukazky_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `uzivatel`
--
ALTER TABLE `uzivatel`
  MODIFY `uziv_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
