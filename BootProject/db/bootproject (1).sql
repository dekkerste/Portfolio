-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 25 mei 2022 om 01:10
-- Serverversie: 10.4.17-MariaDB
-- PHP-versie: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bootproject`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `locationhistory`
--

CREATE TABLE `locationhistory` (
  `locID` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `markerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `locationhistory`
--

INSERT INTO `locationhistory` (`locID`, `createdAt`, `updatedAt`, `lat`, `lng`, `date`, `time`, `markerID`) VALUES
(43, '2022-05-24 22:02:44', '0000-00-00 00:00:00', 53.0445, 4.88754, '2022-05-25', '2022-05-24 22:02:44', 60),
(44, '2022-05-24 22:08:24', '0000-00-00 00:00:00', 53.335, 5.33661, '2022-05-25', '2022-05-24 22:08:24', 60),
(45, '2022-05-24 22:21:04', '0000-00-00 00:00:00', 53.335, 5.33661, '2022-05-25', '2022-05-24 22:21:04', 60),
(46, '2022-05-24 22:52:28', '0000-00-00 00:00:00', 53.1723, 5.18005, '2022-05-25', '2022-05-24 22:52:28', 61),
(47, '2022-05-24 22:53:00', '0000-00-00 00:00:00', 53.1723, 5.18005, '2022-05-25', '2022-05-24 22:53:00', 61),
(48, '2022-05-24 23:04:26', '0000-00-00 00:00:00', 53.0924, 5.03586, '2022-05-25', '2022-05-24 23:04:26', 61),
(49, '2022-05-24 23:07:56', '0000-00-00 00:00:00', 53.1772, 5.20477, '2022-05-25', '2022-05-24 23:07:56', 62),
(50, '2022-05-24 23:08:06', '0000-00-00 00:00:00', 53.1781, 5.15808, '2022-05-25', '2022-05-24 23:08:06', 62),
(51, '2022-05-24 23:08:11', '0000-00-00 00:00:00', 53.127, 5.15808, '2022-05-25', '2022-05-24 23:08:11', 62);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `logs`
--

CREATE TABLE `logs` (
  `logID` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL,
  `userID` int(11) NOT NULL,
  `logEntry` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `logs`
--

INSERT INTO `logs` (`logID`, `createdAt`, `updatedAt`, `userID`, `logEntry`) VALUES
(1, '2022-05-23 10:29:50', NULL, 5, 'Dylan added a marker named: \'Lil lappy\' on lat: 52.8218526927 | lng: 4.8435974121'),
(2, '2022-05-23 10:39:35', NULL, 5, 'Dylan added a marker named \'jevader\' on Lat: 52.8309803399 | Lng: 4.8449707031'),
(3, '2022-05-23 10:39:44', NULL, 5, 'Dylan deleted a marker named \''),
(4, '2022-05-23 10:45:29', NULL, 5, 'Dylan added a marker named \'shipsahoy\' on Lat: 52.8293209103 | Lng: 4.8435974121'),
(5, '2022-05-23 10:45:37', NULL, 5, 'Dylan deleted a marker named \'\''),
(6, '2022-05-23 10:47:31', NULL, 5, 'Dylan added a marker named \'ohodgf[pl\' on Lat: 52.8210228115 | Lng: 4.8559570313'),
(7, '2022-05-23 10:47:59', NULL, 5, 'Dylan deleted a marker named \'ohodgf[pl\''),
(8, '2022-05-23 10:49:52', NULL, 5, 'Dylan added a marker named \'holwerda\' on Lat: 52.9171833553 | Lng: 4.7735595703'),
(9, '2022-05-23 10:49:57', NULL, 5, 'Dylan deleted a marker named \'holwerda\''),
(10, '2022-05-23 10:50:14', NULL, 5, 'Dylan added a marker named \'slkvmsdlk;\' on Lat: 52.8035916453 | Lng: 4.8669433594'),
(11, '2022-05-23 10:50:36', NULL, 5, 'Dylan deleted a marker named \'slkvmsdlk;\''),
(12, '2022-05-24 12:29:22', NULL, 5, 'jelle added a marker named \'testobj\' on Lat: 52.6622247602 | Lng: 5.1622009277'),
(13, '2022-05-24 12:30:03', NULL, 5, 'jelle added a marker named \'uhuhuhuh\' on Lat: 52.7288074567 | Lng: 5.0015258789'),
(14, '2022-05-24 12:30:30', NULL, 5, 'jelle added a marker named \'gtgtg\' on Lat: 52.9436728999 | Lng: 4.9850463867'),
(15, '2022-05-24 12:31:41', NULL, 5, 'jelle logged out'),
(16, '2022-05-24 12:33:49', NULL, 5, 'Dylan logged in'),
(17, '2022-05-24 18:22:05', NULL, 5, 'Dylan added a marker named \'uwu\' on Lat: 52.9171833553 | Lng: 4.7721862793'),
(18, '2022-05-24 18:30:02', NULL, 5, 'Dylan added a marker named \'step\' on Lat: 52.8558641779 | Lng: 5.0221252441'),
(19, '2022-05-24 18:42:18', NULL, 5, 'Dylan published a marker named \'step\''),
(20, '2022-05-24 21:49:07', NULL, 5, 'Dylan deleted a marker named \'anele\''),
(21, '2022-05-24 21:50:15', NULL, 5, 'Dylan added a marker named \'Russisch platformpie\' on Lat: 52.8600100978 | Lng: 5.3022766113'),
(22, '2022-05-24 21:51:10', NULL, 5, 'Dylan logged out'),
(23, '2022-05-24 21:51:55', NULL, 8, 'Admin logged in'),
(24, '2022-05-24 22:02:44', NULL, 8, 'Admin added a marker named \'hooty\' on Lat: 53.0445156264 | Lng: 4.8875427246'),
(25, '2022-05-24 22:26:35', NULL, 8, 'Admin logged out'),
(26, '2022-05-24 22:26:40', NULL, 6, 'Gebruiker logged in'),
(27, '2022-05-24 22:26:47', NULL, 6, 'Gebruiker logged out'),
(28, '2022-05-24 22:26:55', NULL, 8, 'Admin logged in'),
(29, '2022-05-24 22:27:01', NULL, 8, 'Admin published a marker named \'hooty\''),
(30, '2022-05-24 22:27:10', NULL, 8, 'Admin logged out'),
(31, '2022-05-24 22:27:17', NULL, 6, 'Gebruiker logged in'),
(32, '2022-05-24 22:52:28', NULL, 6, 'Gebruiker added a marker named \'qwwwe\' on Lat: 53.1722960452 | Lng: 5.1800537109'),
(33, '2022-05-24 22:53:00', NULL, 6, 'Gebruiker updated marker (ID: 61)'),
(34, '2022-05-24 22:57:15', NULL, 6, 'Gebruiker logged out'),
(35, '2022-05-24 22:57:21', NULL, 8, 'Admin logged in'),
(36, '2022-05-24 22:57:26', NULL, 8, 'Admin logged out'),
(37, '2022-05-24 22:57:33', NULL, 6, 'Gebruiker logged in'),
(38, '2022-05-24 22:57:38', NULL, 6, 'Gebruiker published a marker named \'qwwwe\''),
(39, '2022-05-24 22:57:42', NULL, 6, 'Gebruiker logged out'),
(40, '2022-05-24 22:57:47', NULL, 8, 'Admin logged in'),
(41, '2022-05-24 22:57:52', NULL, 8, 'Admin (ID: 8) ordered an attack on a marker (ID: )'),
(42, '2022-05-24 23:04:26', NULL, 8, 'Admin updated a marker (ID: 61)'),
(43, '2022-05-24 23:06:46', NULL, 8, 'Admin (ID: 8) destroyed a marker (ID: 61)'),
(44, '2022-05-24 23:07:56', NULL, 8, 'Admin added a marker (ID: 8) named \'chipsahoy\' on Lat: 53.1772347529 | Lng: 5.2047729492'),
(45, '2022-05-24 23:08:06', NULL, 8, 'Admin updated a marker (ID: 62)'),
(46, '2022-05-24 23:08:11', NULL, 8, 'Admin updated a marker (ID: 62)');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `markers`
--

CREATE TABLE `markers` (
  `id` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL,
  `userID` int(11) NOT NULL,
  `author` text NOT NULL,
  `name` text NOT NULL,
  `object` text NOT NULL,
  `affiliation` varchar(25) NOT NULL,
  `public` tinyint(1) NOT NULL DEFAULT 0,
  `attackstatus` tinyint(1) NOT NULL,
  `destroyed` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `markers`
--

INSERT INTO `markers` (`id`, `createdAt`, `updatedAt`, `userID`, `author`, `name`, `object`, `affiliation`, `public`, `attackstatus`, `destroyed`) VALUES
(60, '2022-05-24 22:02:44', NULL, 0, 'Admin', 'hooty', 'Ship', 'Enemy', 1, 1, 1),
(61, '2022-05-24 22:52:28', NULL, 0, 'Gebruiker', 'qwwwe', 'Oilplatform', 'Enemy', 1, 1, 1),
(62, '2022-05-24 23:07:56', NULL, 0, 'Admin', 'chipsahoy', 'Ship', 'Friendly', 0, 0, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `objects`
--

CREATE TABLE `objects` (
  `objectID` int(11) NOT NULL,
  `objecttype` varchar(32) NOT NULL,
  `img` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbolocations`
--

CREATE TABLE `tbolocations` (
  `locID` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `markerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `tbolocations`
--

INSERT INTO `tbolocations` (`locID`, `createdAt`, `updatedAt`, `lat`, `lng`, `date`, `time`, `markerID`) VALUES
(46, '2022-05-24 22:02:44', '0000-00-00 00:00:00', 53.335, 5.33661, '2022-05-25', '2022-05-24 22:02:44', 60),
(47, '2022-05-24 22:52:28', '0000-00-00 00:00:00', 53.0924, 5.03586, '2022-05-25', '2022-05-24 22:52:28', 61),
(48, '2022-05-24 23:07:56', '0000-00-00 00:00:00', 53.127, 5.15808, '2022-05-25', '2022-05-24 23:07:56', 62);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ipadres` varchar(50) NOT NULL,
  `logintime` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `actions` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`ID`, `createdAt`, `updatedAt`, `name`, `password`, `ipadres`, `logintime`, `role`, `actions`) VALUES
(6, '2022-05-24 12:34:05', NULL, 'Gebruiker', '$2y$10$ZgHzC5wiRPlseGJ/paXe.ezXzncoRojoNUYx1c3HyRC4Ouki6o5CK', '', '', '0', ''),
(7, '2022-05-24 12:34:22', NULL, 'Mod', '$2y$10$JpjCcsQzPYz0yFz1Z29G3.aP3Eovb74YY2O8nsl/XlOJ/R894QBX2', '', '', '1', ''),
(8, '2022-05-24 12:35:07', NULL, 'Admin', '$2y$10$2xJLXWlsdYs35JjsBeGbQurtnbuq1MGWzS4YZwgGDi0m/GCmzEh/i', '', '', '2', '');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `locationhistory`
--
ALTER TABLE `locationhistory`
  ADD PRIMARY KEY (`locID`);

--
-- Indexen voor tabel `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`logID`);

--
-- Indexen voor tabel `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `objects`
--
ALTER TABLE `objects`
  ADD PRIMARY KEY (`objectID`);

--
-- Indexen voor tabel `tbolocations`
--
ALTER TABLE `tbolocations`
  ADD PRIMARY KEY (`locID`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `locationhistory`
--
ALTER TABLE `locationhistory`
  MODIFY `locID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT voor een tabel `logs`
--
ALTER TABLE `logs`
  MODIFY `logID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT voor een tabel `markers`
--
ALTER TABLE `markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT voor een tabel `objects`
--
ALTER TABLE `objects`
  MODIFY `objectID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `tbolocations`
--
ALTER TABLE `tbolocations`
  MODIFY `locID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
