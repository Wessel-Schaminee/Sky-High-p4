-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 24 jun 2024 om 13:59
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
-- Database: `bestbooking`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `booking`
--

CREATE TABLE `booking` (
  `userid` int(255) NOT NULL,
  `bookingid` int(255) NOT NULL,
  `placeid` int(255) NOT NULL,
  `date` date DEFAULT NULL,
  `ampeople` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `booking`
--

INSERT INTO `booking` (`userid`, `bookingid`, `placeid`, `date`, `ampeople`) VALUES
(9, 7, 1, '2024-06-29', 1),
(9, 8, 2, '2024-07-03', 1),
(10, 9, 1, '2024-06-29', 1),
(9, 10, 1, '2024-06-22', 4);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`, `created_at`) VALUES
(1, 'Wessel Schaminee', 'Wesselschaminee2006@gmail.com', 'peoples', 'uoo', '2024-06-22 15:28:26'),
(2, 'Wessel Schaminee', 'Wesselschaminee2006@gmail.com', 'peoples', 'uoo', '2024-06-22 15:28:29'),
(3, 'Wessel Schaminee', 'Wesselschaminee2006@gmail.com', 'peoples', 'uoo', '2024-06-22 15:29:20');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `feedback` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `feedback`
--

INSERT INTO `feedback` (`id`, `user`, `feedback`, `created_at`) VALUES
(1, 'w', 'wwwwwww', '2024-06-22 14:00:52'),
(2, 'w', 'www', '2024-06-22 14:00:54'),
(3, 'w', 'www', '2024-06-22 14:00:55'),
(4, 'w', 'Yo wussup fella\'s', '2024-06-22 14:11:34');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `place`
--

CREATE TABLE `place` (
  `placeid` int(11) NOT NULL,
  `location` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `adress` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `placemeta`
--

CREATE TABLE `placemeta` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `imgname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `placemeta`
--

INSERT INTO `placemeta` (`id`, `name`, `description`, `price`, `imgname`) VALUES
(1, 'spanje', 'Spanje is een leuke plek om vakantie te houden ', 100, 'spanje.jpg'),
(2, 'loret de mar', 'Voor een leuke zuip vakantie moet je hier zijn!!', 1500, 'loret.jpeg'),
(3, 'Spanje', 'Super leuke trip', 800, 'Screenshot 2024-06-09 164838.png');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `usermeta`
--

CREATE TABLE `usermeta` (
  `customerid` int(11) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `name` varchar(30) NOT NULL,
  `adress` varchar(60) NOT NULL,
  `age` varchar(3) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `rol`) VALUES
(7, 'wessel', 'what the sigma', 'sigma@gmail.com', 1),
(9, 'w', 'w', 'Wesselschaminee2006@gmail.com', 1),
(10, '1209860@student.roc-nijmegen.nl', 'ww', 'webselpower@gmail.com', 3);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingid`);

--
-- Indexen voor tabel `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_email` (`email`),
  ADD KEY `idx_subject` (`subject`);

--
-- Indexen voor tabel `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`placeid`);

--
-- Indexen voor tabel `placemeta`
--
ALTER TABLE `placemeta`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `usermeta`
--
ALTER TABLE `usermeta`
  ADD PRIMARY KEY (`customerid`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `place`
--
ALTER TABLE `place`
  MODIFY `placeid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `placemeta`
--
ALTER TABLE `placemeta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `usermeta`
--
ALTER TABLE `usermeta`
  MODIFY `customerid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
