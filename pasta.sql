-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 20 jun 2025 om 14:38
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pasta`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pastavorm`
--

CREATE TABLE `pastavorm` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `krul` varchar(255) NOT NULL,
  `kleur` varchar(255) NOT NULL,
  `lengte` varchar(255) NOT NULL,
  `saus_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `pastavorm`
--

INSERT INTO `pastavorm` (`id`, `naam`, `krul`, `kleur`, `lengte`, `saus_id`) VALUES
(2, 'SPAGHETTIT', 'nee', 'beige/bruin mogelijk', 'lang', 3),
(3, 'fettucini', 'nee', 'je wet zelf', 'lang', 4);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `saus`
--

CREATE TABLE `saus` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `smaak` varchar(11) NOT NULL,
  `kleur` varchar(11) NOT NULL,
  `textuur` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `saus`
--

INSERT INTO `saus` (`id`, `naam`, `smaak`, `kleur`, `textuur`) VALUES
(3, 'Carbonara', 'Ei, kaas', 'geel', 'romig'),
(4, 'Bolognese', 'vleesachtig', 'bruin/rood', 'chunky'),
(5, 'Cacio e Pepe', 'peper', 'neutraal?', 'peperachtig'),
(6, 'champignon saus', 'champignon', 'beige', 'romig');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `pastavorm`
--
ALTER TABLE `pastavorm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `saus_id` (`saus_id`);

--
-- Indexen voor tabel `saus`
--
ALTER TABLE `saus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `pastavorm`
--
ALTER TABLE `pastavorm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `saus`
--
ALTER TABLE `saus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `pastavorm`
--
ALTER TABLE `pastavorm`
  ADD CONSTRAINT `pastavorm_ibfk_1` FOREIGN KEY (`saus_id`) REFERENCES `saus` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
