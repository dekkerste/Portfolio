-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 10 mrt 2022 om 14:15
-- Serverversie: 10.4.22-MariaDB
-- PHP-versie: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stemwijzer`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `keyname`
--

CREATE TABLE `keyname` (
  `id` int(11) NOT NULL,
  `keyName` varchar(50) NOT NULL,
  `count` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `keyname`
--

INSERT INTO `keyname` (`id`, `keyName`, `count`) VALUES
(1, 'admin', 7),
(4, 'szGUk3D2', 0),
(5, '6QvsGQqV', 0),
(6, 'nzhdrdFm', 0),
(7, 'jhoeogtz', 0),
(8, 'aEQKHgqG', 0),
(9, 'xMBtVwGX', 0),
(10, 'Bq4bR9JL', 0),
(11, 'QyNsLT72', 0),
(12, 'svTYZRof', 0),
(13, 'Dkraz6u9', 0),
(14, '3jPTdhfF', 0),
(15, 'zURg4oBe', 0),
(16, 'WbBeq3gD', 0),
(17, 'oEcVkueD', 0),
(18, 'oTye2LH8', 0),
(19, 'rMTdcNmm', 0),
(20, 'gJaAjRp7', 0),
(21, 'DSKP83Mt', 0),
(22, 'jw92jpQ5', 0),
(23, '22XJF6zk', 0),
(24, 'zrJYyHxy', 0),
(25, 'qovqNPhu', 0),
(26, 'M5MJvhku', 0),
(27, 'd7W44sJW', 0),
(28, 'vjnJNiDo', 0),
(29, '7xgA5Uep', 0),
(30, 'KVKsbvy5', 0),
(31, 'WvErfPQe', 0),
(32, 'nos8Hv7b', 0),
(33, '4nCF4uF5', 0),
(34, 'GArz4djd', 0),
(35, 'orNSZDqf', 0),
(36, 'x9gUnuHX', 0),
(37, 'ACcWXjv6', 0),
(38, 'KZC6CwRv', 0),
(39, 'n9UWX7Jn', 0),
(40, 'eaHRnF9M', 0),
(41, 'Q3HJiEer', 0),
(42, 'hmKxizT5', 0),
(43, 'UmAjq4JD', 0),
(44, 'dMWTTwPS', 0),
(45, '88WWAFjG', 0),
(46, 'NPp8gR8t', 0),
(47, '7RHKgToo', 0),
(48, 'xAvRpPCG', 0),
(49, 'xtJMxxat', 0),
(50, 'Jhwq24WX', 0),
(51, 'MaDqjoD3', 0),
(52, 'C8nxsewZ', 0),
(53, '7kjwuMhN', 0),
(54, 'VefK9nfo', 0),
(55, 'pfom8dBs', 0),
(56, 'S5jFMbdz', 0),
(57, 'WzhoQr8u', 0),
(58, 'GbCXX2Bc', 0),
(59, 'EAQJkah6', 0),
(60, 'jf5hUyXR', 0),
(61, 'gDFivCvQ', 0),
(62, 'D2p8FskV', 0),
(63, 'ffGLWjN3', 0),
(64, 'BrsymCDs', 0),
(65, 'ZeCPQeLn', 0),
(66, 'dNQxVibx', 0),
(67, 'fKNfpRoF', 0),
(68, 'Zw2fqZ5L', 0),
(69, 'FN65J48E', 0),
(70, 'h4oPvqzU', 0),
(71, 'h3DVW7ws', 0),
(72, '74mPQrFX', 0),
(73, 'XZEzByPr', 0),
(74, 'ofbYdzre', 0),
(75, 'YT47JpRz', 0),
(76, 'fGvKrzce', 0),
(77, 'qYEsBnG2', 0),
(78, '3QWs7Gzj', 0),
(79, '7gr8DhaA', 0),
(80, '4H98eWXJ', 0),
(81, '5pmfAt6E', 0),
(82, 'RyZyn9Cj', 0),
(83, 'mrB8xTkg', 0),
(84, '5EiKjmJi', 0),
(85, 'HpkZ5htf', 0),
(86, 'QoYwWgjr', 0),
(87, '2ze8mAiS', 0),
(88, 'bPefVSwo', 0),
(89, 'cpg3647Z', 0),
(90, 'nxmxWRam', 0),
(91, 'HMZdPCGd', 0),
(92, 'D5bCiwvs', 0),
(93, 'QCdSFx5m', 0),
(94, 'gdX7ZpB5', 0),
(95, 'n68jnjkp', 0),
(96, 'oy2GosUh', 0),
(97, 'WQqj5HZv', 0),
(98, 'ovSq5FbK', 0),
(99, 'yEnWhKLJ', 0),
(100, '9n8TmioZ', 0),
(101, 'XYocFyWM', 0),
(102, '9c9dbAao', 0),
(103, 'bSwYo3Lh', 0),
(104, '3jVYos59', 0),
(105, 'cGdFRn8p', 0),
(106, 'LG95v5EN', 0),
(107, '69Kr43Af', 0),
(108, 'hqvZXhgg', 0),
(109, 'zcz3kTLc', 0),
(110, '4nXLD5Ys', 0),
(111, 'P8ewXrwa', 0),
(112, 'DoisK4jm', 0),
(113, 'pcbREQ3A', 0),
(114, '9CrTV5kS', 0),
(115, 'B9ELvLDn', 0),
(116, 'kCUWvEVy', 0),
(117, 'AH8gUmPX', 0),
(118, '9vhFDcZF', 0),
(119, 'PCVRe5kw', 0),
(120, 'FBfECKwt', 0),
(121, 'aoUAqJU4', 0),
(122, 'U9WRgY7X', 0),
(123, 'DnAGwfay', 0),
(124, 'w8Ub8vi2', 0),
(125, 'jRuPyYrZ', 0),
(126, 'SHWuBMJy', 0),
(127, '9hBdErDv', 0),
(128, 'WV6Nqj4z', 0),
(129, '77wcDyeZ', 0),
(130, 'HtfCUEeF', 0),
(131, 'YJeYV5Ld', 0),
(132, 'nqYRgvJv', 0),
(133, '6V6xvQw5', 0),
(134, 'QqWXi4D9', 0),
(135, 'qqJfuHq8', 0),
(136, 'byig2DmP', 0),
(137, 'nkuweHD9', 0),
(138, 'rYwYSxmq', 0),
(139, '9854iVMr', 0),
(140, 'sPsSso5r', 0),
(141, 'MGgfRnVF', 0),
(142, 'z6XvA7kS', 0),
(143, 'LAK7Xu8G', 0),
(144, 'vaTBRCYY', 0),
(145, 'UzDhcM3j', 0),
(146, 'rWKB2LY6', 0),
(147, 'rumY4Lbr', 0),
(148, 'dNeKyw7y', 0),
(149, 'cn3oRhfW', 0),
(150, '3fyDktXU', 0),
(151, '333zL9iH', 0),
(152, 'A64pp2vU', 0),
(153, 'T3uyLhyi', 0),
(154, 'W7LXzNpD', 0),
(155, 'vKKjbEZd', 0),
(156, 'FaFxWCji', 0),
(157, '4wZP8tDN', 0),
(158, 'SoP9VSnk', 0),
(159, 'qLV3h9Zx', 0),
(160, 'AQKNHajR', 0),
(161, 'figanVLe', 0),
(162, 'Pq9wXNoa', 0),
(163, 'HTMRnDvV', 0),
(164, 'FdRipodU', 0),
(165, 'bQTJ5NHS', 0),
(166, 'uQwoFTRm', 0),
(167, '3JyrVxUH', 0),
(168, 'NKTDR7e2', 0),
(169, 'X2HfLzp7', 0),
(170, 'epWAbWpF', 0),
(171, 'Qad4M8HW', 0),
(172, 'E2AeWkze', 0),
(173, 'Y3EkWU6k', 0),
(174, 'vyFZAxxw', 0),
(175, 'qGqvdzH6', 0),
(176, 'cbUSnKz2', 0),
(177, 'JVVdiFKF', 0),
(178, 'gPQzNcDi', 0),
(179, 'ShZDMLGB', 0),
(180, 'bAyy4uLB', 0),
(181, 'VQLrH3e8', 0),
(182, 'zRf4xCgm', 0),
(183, 'CpevFZqb', 0),
(184, 'CSrf5A3J', 0),
(185, 'SsWTSa5v', 0),
(186, 'jtBeCUvT', 0),
(187, 'gSv8J2iY', 0),
(188, 'Hm7QwMRa', 0),
(189, 'JeuQX4gw', 0),
(190, 'YRHxiggc', 0),
(191, 'A5hLRNH8', 0),
(192, 'A3fDS6WB', 0),
(193, 'rEy4Q88f', 0),
(194, 'uhSezg5v', 0),
(195, 'jT3KrCYr', 0),
(196, 'dongPRcP', 0),
(197, 'JgnWS3eh', 0),
(198, 'HCxdkpda', 0),
(199, 'LzEe9Cg4', 0),
(200, 'tTdb6qGV', 0),
(201, '9FMDzAMf', 0),
(202, 'fErZ4hfw', 0),
(203, 'JS5gtnkG', 0),
(204, '727VQbBH', 0),
(205, 'kSq7aGFL', 0),
(206, 'JvFbwhgA', 0),
(207, 'kMwBY58Z', 0),
(208, 'qQ2PTdFK', 0),
(209, 'frYtYCix', 0),
(210, 'sApBh2pQ', 0),
(211, 'xFQKUkcw', 0),
(212, 'XCMvWxjZ', 0),
(213, 'hxUdZz66', 0),
(214, 'Jsvis2Jt', 0),
(215, 'wZ5fKZLj', 0),
(216, 'Y9Go5RW7', 0),
(217, 'NcMb2m87', 0),
(218, 'WBz5uMQQ', 0),
(219, 'qYgrWXT3', 0),
(220, 'SFNDS2N4', 0),
(221, 'vTNKZzCj', 0),
(222, 'EjRr2v23', 0),
(223, 'tJB7w8mH', 0),
(224, 'dK598rSF', 0),
(225, 'CTKJRRQV', 0),
(226, 'f3FppLAb', 0),
(227, 'dSGEwSiU', 0),
(228, 'i94cw32Q', 0),
(229, 'WCDrds3p', 0),
(230, 'w3Jotfkb', 0),
(231, '2A4GYTCX', 0),
(232, 'm3u7PzZp', 0),
(233, 'qYupp9nC', 0),
(234, 'CHety4HS', 0),
(235, 'jMJrbpY8', 0),
(236, '5UbppUi8', 0),
(237, 'PdvRG9JA', 0),
(238, 'p33tAM8o', 0),
(239, 'FKAU3jmk', 0),
(240, 'ZfGA8Luj', 0),
(241, 'nRtgjcPg', 0),
(242, 'Cv89kLXZ', 0),
(243, 'qGUDANkr', 0),
(244, '3duPXQ54', 0),
(245, 'sbBpAdPS', 0),
(246, '3b6DGaL5', 0),
(247, 'uYWwXE5T', 0),
(248, 'BSdpTKMK', 0),
(249, '5ecqHQWX', 0),
(250, 'DuHMGyFB', 0),
(251, 'p3dqDpwW', 0),
(252, 'pB8o5GnV', 0),
(253, 'C6YhTDvK', 0),
(254, 'vfmup4Tm', 0),
(255, 'gKF3o3Ec', 0),
(256, 'L9AoLHC7', 0),
(257, '2VsSJ44t', 0),
(258, 'vsJEEKQ7', 0),
(259, 'GUxDzyRh', 0),
(260, 'BdJXw9tN', 0),
(261, 'sWNTkLZJ', 0),
(262, 'YdTDibmT', 0),
(263, 'GVypfngH', 0),
(264, '4bQZ4xRQ', 0),
(265, 'ndRedt5Z', 0),
(266, 'YmR6bVE5', 0),
(267, 'Usu53iPz', 0),
(268, 'VUbrD6VX', 0),
(269, '9B458dPw', 0),
(270, 'yJKZJKnT', 0),
(271, '2Li6mnGE', 0),
(272, 'Bo2og7t6', 0),
(273, 'FE4ouCV8', 0),
(274, 'bTcMMhHT', 0),
(275, 'AZ5NKUNo', 0),
(276, 'yfTkhKzh', 0),
(277, '7CKzVxVo', 0),
(278, 'FjeR8kQW', 0),
(279, 'JYqSN4FZ', 0),
(280, 'uoPNhFVQ', 0),
(281, 'HZe9m6TS', 0),
(282, 'kWpFmRVV', 0),
(283, '93UtJ42H', 0),
(284, 'Jsx9X88G', 0),
(285, 'wwX4uwnQ', 0),
(286, 'Nh6D2D4M', 0),
(287, '6S2J6sQw', 0),
(288, 'dwAi37iy', 0),
(289, 'hdWDWnAg', 0),
(290, 'gzytVkSf', 0),
(291, 'gJPQF8dT', 0),
(292, 'zCFYHZC5', 0),
(293, 'asHdBBSa', 0),
(294, 'T5eQcvoU', 0),
(295, 'UN8HM4Rf', 0),
(296, 'MgakTpAG', 0),
(297, 'DyXcCPWs', 0),
(298, 'YKPduFFa', 0),
(299, '8fNjcbaK', 0),
(300, 'Yq4z5n5D', 0),
(301, '8oofwifN', 0),
(302, 'jCUCgT7w', 0),
(303, '4sFz27qf', 0),
(304, 'HuVhM3zF', 0),
(305, 'neogkoee', 0),
(306, 'vh2XoeHE', 0),
(307, 'JNxn5kAj', 0),
(308, 'HQo5aHm2', 0),
(309, 'oYFyaUjV', 0),
(310, 'U7ScE5Xj', 0),
(311, 'd6QBv6C8', 0),
(312, 'saX56BBY', 0),
(313, 'aa5sq5WB', 0),
(314, 'QQgsuLES', 0),
(315, 'VYrRxb96', 0),
(316, 'kfqJbzGN', 0),
(317, 'TXURMXn8', 0),
(318, 'aVbATWyQ', 0),
(319, 'uiASrWV4', 0),
(320, 'QbGbAoLa', 0),
(321, 'vBQuWU2f', 0),
(322, 'zuSacbd5', 0),
(323, 'JyGUbf32', 0),
(324, 'wA3WACbi', 0),
(325, 'MKRabJNC', 0),
(326, 'F3ee6AZF', 0),
(327, 'G67urZu5', 0),
(328, 'AN9f2oSq', 0),
(329, 'jRpQYcCb', 0),
(330, 'JjC3sDAp', 0),
(331, 'zAT3K7W7', 0),
(332, '6Rwvr8uG', 0),
(333, 'G53QKYjV', 0),
(334, 'fo7LkdK6', 0),
(335, 'hkg3inZT', 0),
(336, 'wNEiNm94', 0),
(337, 'PE5eu7qN', 0),
(338, 'TpJeowY3', 0),
(339, 'dZy2z368', 0),
(340, 'jNRKXGvX', 0),
(341, 'tFTJVsKz', 0),
(342, 'p9yNynkY', 0),
(343, 'ZLLD3LGd', 0),
(344, 'XRk74tur', 0),
(345, 'WM7C3pXw', 0),
(346, 'UveUtidS', 0),
(347, 'PfmxMYLZ', 0),
(348, 'LG2GNE9V', 0),
(349, 'eHyCRZiT', 0),
(350, 'n4KTLL87', 0),
(351, 'ztrzBG92', 0),
(352, 'nMewst6M', 0),
(353, 'BVYSAETy', 0),
(354, 'x3cYqV5c', 0),
(355, 'UbatFQSQ', 0),
(356, 'Gh4fYGVe', 0),
(357, 'kbn4zLAs', 0),
(358, '6Zgfh75i', 0),
(359, '9qDu459q', 0),
(360, 'VFZwnmd6', 0),
(361, 'F5NhTnHm', 0),
(362, 'XUJxf9Ew', 0),
(363, 'qoDE8J4K', 0),
(364, 'dNjswU7z', 0),
(365, 'L8uJUJuY', 0),
(366, 'TsUSxC3W', 0),
(367, 'c9Ta3DP4', 0),
(368, '437DKQjq', 0),
(369, '5VVcdZfF', 0),
(370, 'RiFGXyfi', 0),
(371, 'Ydpd4K9F', 0),
(372, 'XWGevodc', 0),
(373, 'xVYDgBm6', 0),
(374, 'T9Je2hXu', 0),
(375, 'EHjVMobS', 0),
(376, 'WZtSx9J3', 0),
(377, 'ncAeQU7Z', 0),
(378, 'bmxe4g2o', 0),
(379, 'KfeAsT3S', 0),
(380, 'J758Dwdk', 0),
(381, 'R7hLCwT6', 0),
(382, 'qKZJp9ee', 0),
(383, 'Nx3dC6mk', 0),
(384, 'CvVaTzsB', 0),
(385, 'CkC4P2Gj', 0),
(386, '3xAQ8MRp', 0),
(387, 'BTZtfC5m', 0),
(388, 'EuiY7mu4', 0),
(389, 'Vptp4hsW', 0),
(390, 'C3mDG4TX', 0),
(391, 'LcUwNwBX', 0),
(392, 'WutkRFmU', 0),
(393, 'VDZbVwiN', 0),
(394, 'bcCDrdEJ', 0),
(395, 'X4MAB7Ys', 0),
(396, 'GNbsuxqK', 0),
(397, 'S2r3g39R', 0),
(398, 'bsshwC6z', 0),
(399, 'ZJAR7hVy', 0),
(400, 'G92hL5hT', 0),
(401, 'kDeE9sGk', 0),
(402, 'xHzXWXW9', 0),
(403, 'kUKmLU4N', 0),
(404, 'yJhUgv2c', 0),
(405, 'WqTcNMsM', 0),
(406, 'drPmmpXf', 0),
(407, 'EaaCVJkZ', 0),
(408, '9pH7JEhz', 0),
(409, 'v8rMJgJD', 0),
(410, 'pF5RHnrM', 0),
(411, 'ztFbpFwy', 0),
(412, 'obzSpuaS', 0),
(413, 'pkKDRgok', 0),
(414, 'GvFwbFe4', 0),
(415, 'FSWdvyUd', 0),
(416, 'nvzgVuAm', 0),
(417, '35z7egf6', 0),
(418, 'oV7uzfaL', 0),
(419, 'SJcy99Po', 0),
(420, 'VCSJcqo8', 0),
(421, 'MPmiDYXK', 0),
(422, 'B4CLcoeQ', 0),
(423, 'e5bZr7cC', 0),
(424, 'mYfaLf6W', 0),
(425, 'w9L7auyj', 0),
(426, 'AwadJdnm', 0),
(427, 'LetFBaQo', 0),
(428, 'hXf6uyiE', 0),
(429, 'GB6rZeGb', 0),
(430, '4er4kjhG', 0),
(431, '2SgbegJJ', 0),
(432, 'amXaD9dt', 0),
(433, 'UJWv7E4J', 0),
(434, 'uZ6ad6AE', 0),
(435, 'oCg6XdDS', 0),
(436, 'ysaTX3kJ', 0),
(437, 'wYKvanAN', 0),
(438, 'wnKaWkWU', 0),
(439, 'RcD989SU', 0),
(440, 'U8RGQLen', 0),
(441, 'Ev9F2PxA', 0),
(442, 'Bz4YE8uV', 0),
(443, 'ZvYNmubt', 0),
(444, 'RzuiR3CN', 0),
(445, 'QHBVPBaJ', 0),
(446, 'Krr8Am45', 0),
(447, 'smaWdnrh', 0),
(448, 'dp8ETpsb', 0),
(449, '2R9jhu38', 0),
(450, 'UXuuAD8B', 0),
(451, '76rnargw', 0),
(452, 'Z4MBHmTv', 0),
(453, 'vRvyp7Pm', 0),
(454, 'xLcPhWDb', 0),
(455, '9Xn8GkRY', 0),
(456, '2TNZ66Wv', 0),
(457, 'UFE4msJE', 0),
(458, 'ksJXrEXm', 0),
(459, 'sZzJ9a3B', 0),
(460, 'yyWeWckt', 0),
(461, 'HUX63p5T', 0),
(462, 'X8pTNtQd', 0),
(463, 'RHuroEaT', 0),
(464, 'TzoYeoCF', 0),
(465, 'aRVCobdy', 0),
(466, 'tiyjEmMq', 0),
(467, 'MiwtfAjh', 0),
(468, 'p84YAbDo', 0),
(469, 'DjEWjtjw', 0),
(470, 'kq2HriLG', 0),
(471, 'aL7Nu8ix', 0),
(472, 'JT3AZxPf', 0),
(473, 'v8PUnw4X', 0),
(474, '8zrCnUGA', 0),
(475, 'qiMgGdxD', 0),
(476, 'zKkqjYuv', 0),
(477, 'tmQJqRVk', 0),
(478, 'nxCzkiM7', 0),
(479, 'DettxQmb', 0),
(480, 'J6gWgQGA', 0),
(481, 'WSrXgFbd', 0),
(482, 'ZdJRcBEX', 0),
(483, 'yWmaoaZU', 0),
(484, 'VWEGiW9S', 0),
(485, 'ZZndDuFP', 0),
(486, 'UwEBmyHL', 0),
(487, 'Uy6TquqS', 0),
(488, 'V4P6LQXm', 0),
(489, 'grNrPtWd', 0),
(490, 'sVijvkPq', 0),
(491, 'N4UFa7ME', 0),
(492, 'GgPhQtMX', 0),
(493, 'umKx4nQM', 0),
(494, 'MxtfzjbJ', 0),
(495, 'UjQVpsNS', 0),
(496, 't5zUM5BR', 0),
(497, 'qrctkiMy', 0),
(498, '4eJQX23F', 0),
(499, '74jtepDg', 0),
(500, '3UJS4Z8N', 0),
(501, 'V4Faopgf', 0),
(502, 'sn2Zrz5o', 0),
(503, 'HWn5CSB2', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `parties`
--

CREATE TABLE `parties` (
  `id` int(11) NOT NULL,
  `party` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `parties`
--

INSERT INTO `parties` (`id`, `party`, `description`) VALUES
(1, 'CDA', 'Voor een land dat we willen doorgeven.'),
(2, 'Seniorenpartij Schagen', 'Senioren dienen, waar dat mogelijk is, een zelfstandig bestaan te leiden.'),
(3, 'VVD', 'Niet doorschuiven, maar aanpakken.'),
(4, 'JessLokaal', 'Goede ideeën proberen we onderdeel van beleid te maken of te laten uitvoeren.'),
(5, 'Partij van de Arbeid', 'Nederland sterker en socialer.'),
(6, 'GROENLINKS', 'Groene kansen voor Nederland.'),
(7, 'D66', 'Kansen voor iedereen.'),
(8, 'SP', 'Klaar om te knokken.'),
(9, 'Wens4U', 'Een fijn leven voor iedereen.');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `partypeople`
--

CREATE TABLE `partypeople` (
  `id` int(11) NOT NULL,
  `party` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL,
  `position` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `partypeople`
--

INSERT INTO `partypeople` (`id`, `party`, `name`, `description`, `position`) VALUES
(11, 'CDA', 'de Nijs-Visser P. (Puck) (v)', 'Warmenhuizen', 1),
(12, 'CDA', 'Wiskerke J. (Co) (m)', 'Schagen', 2),
(13, 'CDA', 'Burger-de Graaf D. (Debby) (v)', 't Zand', 3),
(14, 'CDA', 'Glashouwer B.J. (Boudien) (v)', 'Waarland', 4),
(15, 'CDA', 'Vonk W. (Wim) (m)', 'Schagerbrug', 5),
(16, 'CDA', 'van Oerle M. (Menno) (m)', 'Schagen', 6),
(17, 'CDA', 'Sanders M.A.J. (Marcel) (m)', 'Schagen', 7),
(18, 'CDA', 'van Bergen R.A.J.C. (Richard) (m)', 'Warmenhuizen', 8),
(19, 'CDA', 'Slijkhuis S.T. (Tim) (m)', 'Schagen', 9),
(20, 'CDA', 'Bakker R.M. (Ruud) (m)', 'Waarland', 10),
(21, 'CDA', 'Kleimeer A.T. (Arco) (m)', 'Warmenhuizen', 11),
(22, 'CDA', 'Bloom S.G.M. (Sonja) (v)', 'Schagerbrug', 12),
(23, 'CDA', 'van Tol Y.A. (Youri) (m)', 'Schagen', 13),
(24, 'CDA', 'Huits P.H.M. (Peter) (m)', 'Tuitjenhorn', 14),
(25, 'CDA', 'Visser J.J. (Johan) (m)', 'Burgerbrug', 15),
(26, 'CDA', 'Boon P.N.S. (Peter) (m)', 'Tuitjenhorn', 16),
(27, 'CDA', 'Schouten G.E.K. (Gerard) (m)', 't Zand', 17),
(28, 'CDA', 'Niesten-Vork W.M. (WI) (v)', 'Schagen', 18),
(29, 'CDA', 'van de Giesen-Ruiter E.G. (Els) (v)', 'Waarland', 19),
(30, 'CDA', 'van Kampen J.C.J. (Hans) (m)', 'Schagen', 20),
(31, 'CDA', 'de Wit C.W. (Kees) (m)', 't Zand', 21),
(32, 'CDA', 'Tams-Ferwerda H. (Hillie) (v)', 'Sint Maarten', 22),
(33, 'CDA', 'Komproe H.A.C. (Hedwig) (m)', 't Zand', 23),
(34, 'CDA', 'de Groot L.W.M. (Leo) (m)', 'Schagen', 24),
(35, 'CDA', 'Joling W. (Willem) (m)', 'Schagen', 25),
(36, 'CDA', 'Ruijs C. (Calvin) (m)', 'Dirkshorn', 26),
(37, 'CDA', 'Beemsterboer J.N.J.J. (Jos) (m)', 'Sint Maarten', 27),
(38, 'CDA', 'van Noort-Zonneveld J.G.J.M. (Coby) (v)', 'Petten', 28),
(39, 'CDA', 'Boersen-Bergen C.M. (Nel) (v)', 'Schagen', 29),
(40, 'CDA', 'Wolters B.J. (Ben) (m)', 'Waarland', 30),
(41, 'CDA', 'Blankendaal C.W. (Cora) (v)', 'Sint Maarten', 31),
(42, 'CDA', 'van Duin B.G. (Bart) (m)', 'Warmenhuizen', 32),
(43, 'CDA', 'Prij J. (Jan) (m)', 'Schagen', 33),
(44, 'CDA', 'Rijbroek-Hijink C.J. (Cindy) (v)', 'Schagerbrug', 34),
(45, 'CDA', 'Broersen N.J. (Koos) (m)', 'Tuitjenhorn', 35),
(46, 'CDA', 'Vrijhof J. (Jelle) (m)', 'Schagen', 36),
(47, 'CDA', 'Kleverlaan P.C. (Piet) (m)', 'Waarland', 37),
(48, 'CDA', 'de Groot W.B. (WI) (m)', 'Warmenhuizen', 38),
(49, 'CDA', 'de Wit A.N.M. (Adrie) (m)', 't Zand', 39),
(50, 'CDA', 'Pronk J.A. (Jan) (m)', 'Schagen', 40),
(51, 'CDA', 'van Zanten H. (Henk) (m)', 'Schagen', 41),
(52, 'CDA', 'Rustenburg D.P.W. (Daniel) (m)', 'Schagen', 42),
(53, 'CDA', 'van Duin-Scholten P.A.M. (Paula) (v)', 'Warmenhuizen', 43),
(54, 'CDA', 'Rob D.C. (Daphne) (v)', 'Schagen', 44),
(55, 'CDA', 'Boersen S.P.T. (Sam) (m)', 'Schagen', 45),
(56, 'CDA', 'Slijkerman G.J. (Gert-Jan) (m)', 't Zand', 46),
(57, 'CDA', 'van der Veek S.J.A. (Sigge) (m)', 'Burgerbrug', 47),
(58, 'CDA', 'Lensink S.M. (Sander) (m)', 'Schagen', 48),
(59, 'CDA', 'Broersen H.C. (Bram) (m)', 'Tuitjenhorn', 49),
(60, 'CDA', 'Beemsterboer J.C.J. (Jelle) (m)', 'Tuitjenhorn', 50),
(61, 'Seniorenpartij Schagen', 'Vriend P.F.J. (Perry) (m)', 't Zand', 1),
(62, 'Seniorenpartij Schagen', 'Groot A.S. (Andre) (m)', 'Schagen', 2),
(63, 'Seniorenpartij Schagen', 'Mulder-Keij M.C.M. (Marga) (v)', 'Sint Maarten', 3),
(64, 'Seniorenpartij Schagen', 'Wijnker M.A.F. (Marianne) (v)', 'Waarland', 4),
(65, 'Seniorenpartij Schagen', 'Quint C.H.J. (Cor) (m)', 'Schagen', 5),
(66, 'Seniorenpartij Schagen', 'Cooper-Limmen G.E.M. (Truus) (v)', 'Schagen', 6),
(67, 'Seniorenpartij Schagen', 'Roozendaal L.G.M. (Louis) (m)', 'Sint Maarten', 7),
(68, 'Seniorenpartij Schagen', 'van de Wateringen A.P.L. (Arthur) (m)', 'Schagen', 8),
(69, 'Seniorenpartij Schagen', 'Schouten A. (Ton) (m)', 'Schagen', 9),
(70, 'Seniorenpartij Schagen', 'Wang C.C. (Cietjong) (m)', 'Schagen', 10),
(71, 'Seniorenpartij Schagen', 'VVissink B.H. (Ben) (m)', 't Zand', 11),
(72, 'Seniorenpartij Schagen', 'Bloembergen G.R. (Gjalt) (m)', 'Schagen', 12),
(73, 'Seniorenpartij Schagen', 'Bosman-van Kessel I.B.M. (Ivonne) (v)', 'Tuitjenhorn', 13),
(74, 'Seniorenpartij Schagen', 'Dam D. (Dick) (m)', 'Waarland', 14),
(75, 'Seniorenpartij Schagen', 'van Dipten L.M. (Leen) (m)', 'Schagen', 15),
(76, 'Seniorenpartij Schagen', 'Drieenhuizen P.T. (Piet) (m)', 'Callantsoog', 16),
(77, 'Seniorenpartij Schagen', 'de Haan G.H. (Ger) (m)', 'Callantsoog', 17),
(78, 'Seniorenpartij Schagen', 'Mensingh-de Ruigh C.M. (Connie) (v)', 'Schagen', 18),
(79, 'Seniorenpartij Schagen', 'Mulder W.E. (Nil) (m)', 'Sint Maarten', 19),
(80, 'Seniorenpartij Schagen', 'Schagen G.J. (Gerard) (m)', 't Zand', 20),
(81, 'Seniorenpartij Schagen', 'Schravemade-Vriend J.M.M. (Sabine) (v)', 'Warmenhuizen', 21),
(82, 'Seniorenpartij Schagen', 'Vriend-van der Helm M.A.J. (Ria) (v)', 't Zand', 22),
(83, 'Seniorenpartij Schagen', 'van de Wateringen E.J.M. (Ellen) (v)', 'Schagen', 23),
(84, 'Seniorenpartij Schagen', 'Wit J. (Jaap) (m)', 't Zand', 24),
(85, 'VVD', 'van Wijk - Ligthart A.M. (Angelique) (v)', 'Schagerbrug', 1),
(86, 'VVD', 'Stam W.J. (Willem-Jan) (m)', 'Schagen', 2),
(87, 'VVD', 'Takes R.A.J. (Roel) (m)', 'Schagen', 3),
(88, 'VVD', 'Parton J. (Jur) (m)', 'Warmenhuizen', 4),
(89, 'VVD', 'Vlam P.J. (Peter) (m)', 'Warmenhuizen', 5),
(90, 'VVD', 'Stoelinga-Souman H.M.I.N. (Heleen) (v)', 'Schagen', 6),
(91, 'VVD', 'van de Sande W.M. (Willem) (m)', 'Schagen', 7),
(92, 'VVD', 'Blok C. (Claudio) (m)', 'Schagen', 8),
(93, 'VVD', 'Bos A. (Alie) (v)', 'Sint Maartensvlotbrug', 9),
(94, 'VVD', 'Buis E. (Eva) (v)', 'Schagen', 10),
(95, 'VVD', 'Ligthart A.A.N.P. (Arjan) (m)', 'Schagerbrug', 11),
(96, 'VVD', 'Baltus M.M. (Martien) (m)', 'Schagen', 12),
(97, 'VVD', 'Bakker V.A. (Volkert) (m)', 'Schagerbrug', 13),
(98, 'VVD', 'Groot J.P. (Jeroen) (m)', 'Schagerbrug', 14),
(99, 'VVD', 'van der Ploeg T.A. (Thomas) (m)', 'Callantsoog', 15),
(100, 'VVD', 'Marees P.J. (Piet) (m)', 'Oudesluis', 16),
(101, 'VVD', 'Bouwes J. (Jan) (m)', 'Schagen', 17),
(102, 'JessLokaal', 'Dignum L. (Lars) (m)', 'Warmenhuizen', 1),
(103, 'JessLokaal', 'Kruijer S.C. (Simco) (m)', 'Schagen', 2),
(104, 'JessLokaal', 'Kruijer J.P. (Jack) (m)', 'Schagerbrug', 3),
(105, 'JessLokaal', 'Streefkerk M. (Marijn) (m)', 'Schagen', 4),
(106, 'JessLokaal', 'Zut R.P. (Ron) (m)', 'Tuitjenhorn', 5),
(107, 'JessLokaal', 'Tesselaar M. (Maaike) (v)', 'Schagen', 6),
(108, 'JessLokaal', 'Kroger J.T. (Hans) (m)', 'Schagerbrug', 7),
(109, 'JessLokaal', 'Rampen - van de Put C.H.T. (Carla) (v)', 'Schagerbrug', 8),
(110, 'JessLokaal', 'de Vries W. (Wietse) (m)', 'Tuitjenhorn', 9),
(111, 'JessLokaal', 'van Egmond D. (Dirk) (m)', 'Callantsoog', 10),
(112, 'JessLokaal', 'Taams P.D. (Petra) (v)', 'Sint Maarten', 11),
(113, 'JessLokaal', 'Haver L.J. (Lars) (m)', 'Waarland', 12),
(114, 'JessLokaal', 'van Emmerik P.J. (Patrick) (m)', 'Schagen', 13),
(115, 'JessLokaal', 'Raap A. (Andrea) (v)', 't Zand', 14),
(116, 'JessLokaal', 'van der Salm H.C. (Harry) (m)', 'Sint Maartensvlotbrug', 15),
(117, 'JessLokaal', 'Rijs H. (Henk) (m)', 'Dirkshorn', 16),
(118, 'JessLokaal', 'Kramer I.W.A. (Irene) (v)', 'Burgerbrug', 17),
(119, 'JessLokaal', 'Zutt K.P. (Koen) (m)', 'Sint Maartensbrug', 18),
(120, 'JessLokaal', 'de Vries J.J. (Jacob Jan) (m)', 'Warmenhuizen', 19),
(121, 'JessLokaal', 'van Diepen - Rampen M.M. (Thildy) (v)', 't Zand', 20),
(122, 'JessLokaal', 'Helvrich R. (Ronald) (m)', 'Schagen', 21),
(123, 'JessLokaal', 'Kat J.K. (Jodie) (v)', 'Waarland', 22),
(124, 'JessLokaal', 'Otto S.M.T.J. (Sjef) (m)', 'Callantsoog', 23),
(125, 'JessLokaal', 'Don P.J. (Peter Jaap) (m)', 'Tuitjenhorn', 24),
(126, 'JessLokaal', 'de Graaf M.C. (Margreet) (v)', 'Schagen', 25),
(127, 'JessLokaal', 'van der Ham W. (Willem) (m)', 'Callantsoog', 26),
(128, 'JessLokaal', 'Nieman J.G. (Hans) (m)', 'Warmenhuizen', 27),
(129, 'JessLokaal', 'Kaandorp S. (Sander) (m)', 'Sint Maartensbrug', 28),
(130, 'JessLokaal', 'Raap - Zwart C. (Nel) (v)', 'Sint Maarten', 29),
(131, 'JessLokaal', 'Cappon W.L. (Rens) (m)', 'Sint Maarten', 30),
(132, 'Partij van de Arbeid', 'van Vuuren V.C. (Vera) (v)', 'Sint Maartensvlotbrug', 1),
(133, 'Partij van de Arbeid', 'Muntjewerf S. (Samuel) (m)', 'Schagen', 2),
(134, 'Partij van de Arbeid', 'van Musscher M.G. (Mirjam) (v)', 'Dirkshorn', 3),
(135, 'Partij van de Arbeid', 'Wagemaker A.H. (Helga) (v)', 'Burgerbrug', 4),
(136, 'Partij van de Arbeid', 'Heddes J.J. (Hans) (m)', 'Schagen', 5),
(137, 'Partij van de Arbeid', 'Piket H.C.P.M. (Harry) (m)', 'Tuitjenhorn', 6),
(138, 'Partij van de Arbeid', 'Schrijver J.C. (Jan) (m)', 'Sint Maarten', 7),
(139, 'Partij van de Arbeid', 'Juckenack S.E.B. (Sabine) (v)', 'Petten', 8),
(140, 'Partij van de Arbeid', 'Blonk B. (Ben) (m)', 'Petten', 9),
(141, 'Partij van de Arbeid', 'Numan R. (Roosje) (v)', 'Schagen', 10),
(142, 'Partij van de Arbeid', 'van der Jagt M.C. (Martin) (m)', 'Schagen', 11),
(143, 'Partij van de Arbeid', 'Talsma-Hoejenbos K.M. (Marlene) (v)', 'Callantsoog', 12),
(144, 'Partij van de Arbeid', 'van der Wal P. (Pieter) (m)', 'Schagen', 13),
(145, 'Partij van de Arbeid', 'Janssen-de Koning J.W. (Marianne) (v)', 'Tuitjenhorn', 14),
(146, 'Partij van de Arbeid', 'van der Zee P. (Philip) (m)', 'Dirkshorn', 15),
(147, 'Partij van de Arbeid', 'de Groen M.A.M. (Marga) (v)', 'Schagen', 16),
(148, 'Partij van de Arbeid', 'Muntjewerf J. (Jan) (m)', 'Schagen', 17),
(149, 'Partij van de Arbeid', 'van Dijk J.J.H. (Jolijn) (v)', 'Callantsoog', 18),
(150, 'Partij van de Arbeid', 'Mud R. (Rienk) (m)', 'Schagen', 19),
(151, 'Partij van de Arbeid', 'Paarlberg J. (Jannie) (v)', 'Schagen', 20),
(152, 'Partij van de Arbeid', 'Klant R.J. (Rolf) (m)', 'Petten', 21),
(153, 'Partij van de Arbeid', 'van Mourik M.G. (Bertie) (v)', 'Tuitjenhorn', 22),
(154, 'Partij van de Arbeid', 'Goudsmit J. (Jaap) (m)', 'Schagen', 23),
(155, 'Partij van de Arbeid', 'Zoon R.B. (Ruud) (m)', 'Schagen', 24),
(156, 'Partij van de Arbeid', 'Moussault M.A.J. (Marc) (m)', 'Schagen', 25),
(157, 'Partij van de Arbeid', 'van Vliet F. (Erik) (m)', 'Callantsoog', 26),
(158, 'Partij van de Arbeid', 'Leijen M.A. (Marjan) (v)', 'Warmenhuizen', 27),
(159, 'GROENLINKS', 'Riteco L.A.J. (Lambert)', 'Schagen', 1),
(160, 'GROENLINKS', 'Menkveld J.W. (Joke)', 'Callantsoog', 2),
(161, 'GROENLINKS', 'Sintenie B.W. (Ben)', 'Schagerbrug', 3),
(162, 'GROENLINKS', 'Bijlsma A.J.J. (Andre)', 'Schagen', 4),
(163, 'GROENLINKS', 'Groen K.D. (Kelly)', 'Schagen', 5),
(164, 'GROENLINKS', 'Rot G. (Gerrit)', 'Schagen', 6),
(165, 'GROENLINKS', 'Komen - de Leeuw S.J. (Sandra)', 'Warmenhuizen', 7),
(166, 'GROENLINKS', 'Bart J. (Jacob)', 'Sint Maarten', 8),
(167, 'GROENLINKS', 'Brus I.D.G.M. (Isabelle)', 'Dirkshorn', 9),
(168, 'GROENLINKS', 'Mazurel M.J. (Maureen)', 'Schagen', 10),
(169, 'GROENLINKS', 'Ismael M. (Mo)', 'Schagen', 11),
(170, 'GROENLINKS', 'van der Geest - Donkers J.E.B. (Hans)', 'Sint Maarten', 12),
(171, 'GROENLINKS', 'Kleemans A.H.M. (Lineke)', 'Schagen', 13),
(172, 'GROENLINKS', 'Maarschall R. (Ruud)', 'Petten', 14),
(173, 'GROENLINKS', 'Bakker R.P. (Ruud)', 'Schagen', 15),
(174, 'D66', 'Jansen F.N.J. (Frans) (m)', 'Schagen', 1),
(175, 'D66', 'Struijf M. (Margriet) (v)', 'Schagen', 2),
(176, 'D66', 'Vogel H. (Harry) (m)', 'Warmenhuizen', 3),
(177, 'D66', 'Horn J.G. (Hans) (m)', 'Burgerbrug', 4),
(178, 'D66', 'Toorenent-Jonker J.A. (Hanneke) (v)', 'Sint Maarten', 5),
(179, 'D66', 'Frowijn-Druijven M.M.A. (Margreet) (v)', 'Schagen', 6),
(180, 'D66', 'Vlietstra-Wouterse E.M.M. (Liesbeth) (v)', 'Schagen', 7),
(181, 'D66', 'Veenvliet C. (Kees) (m)', 'Schagen', 8),
(182, 'D66', 'Jansen J.C. (Jaap) (m)', 'Schagen', 9),
(183, 'D66', 'van Opbergen-Velthuizen J. (Jolanda) (v)', 'Schagen', 10),
(184, 'D66', 'van Drimmelen A.A.J. (Harry) (m)', 'Dirkshorn', 11),
(185, 'D66', 'Meijer-van den Broek M.S. (Marijke) (v)', 'Schagen', 12),
(186, 'D66', 'de Winter P.H. (Paul) (m)', 'Petten', 13),
(187, 'D66', 'Velt N.A. (Nick) (m)', 'Dirkshorn', 14),
(188, 'SP', 'Rijnders W.P. (Wim) (m)', 'Callantsoog', 1),
(189, 'SP', 'Smit-Kiekebos U.L.M. (Ursula) (v)', 'Waarland', 2),
(190, 'SP', 'van der Harst G.L. (Leo) (m)', 'Burgerbrug', 3),
(191, 'SP', 'Pouw A.M.M. (Jeanne) (v)', 'Schagerbrug', 4),
(192, 'SP', 'de Boer H. (Henk) (m)', 'Schagen', 5),
(193, 'SP', 'Piket G.P. (Galina) (v)', 'Warmenhuizen', 6),
(194, 'SP', 'Rezelman S. (Sander) (m)', 'Schagen', 7),
(195, 'SP', 'Muntjewerf J.J.P. (Jeroen) (m)', 'Schagen', 8),
(196, 'SP', 'Komen-van Dijk M. (Margreet) (v)', 'Schagen', 9),
(197, 'SP', 'Rezelman B.G.C. (Bjarne) (m)', 'Schagen', 10),
(198, 'SP', 'Loeve C.P. (Nel) (v)', 'Schagen', 11),
(199, 'SP', 'Komen R.G. (Ronald) (m)', 'Schagen', 12),
(200, 'SP', 'Hoogeboom W.G. (Wilma) (v)', 'Schagen', 13),
(201, 'Wens4U', 'Bredewold H.P. (Merieke) (v)', 'Schagen', 1),
(202, 'Wens4U', 'Freijsen-Vacano J.H. (Jacqueline) (v)', 'Schagen', 2),
(203, 'Wens4U', 'Verloop M.C. (Margreet) (v)', 'Schagen', 3),
(204, 'Wens4U', 'Steijger L. (Linda) (v)', 'Schagen', 4),
(205, 'Wens4U', 'Steijger S. (Suzanne) (v)', 'Schagen', 5),
(206, 'Wens4U', 'Hartman F. (Emma) (v)', 'Schagen', 6),
(207, 'Wens4U', 'Visscher-Spakman M. (Marjolein) (v)', 'Schagen', 7),
(208, 'Wens4U', 'Bloem-van der Wel H.E. (Hilda) (v)', 'Schagen', 8),
(209, 'Wens4U', 'Sedney R.D. (Rudi) (m)', 'Schagen', 9),
(210, 'Wens4U', 'Cornelisse M. (Marcel) (m)', 'Schagen', 10),
(211, 'Wens4U', 'Melchers M.I.P. (Ingrid) (v)', 'Schagen', 11),
(212, 'Wens4U', 'Hogenes R.C.M. (Rob) (m)', 'Schagen', 12),
(213, 'Wens4U', 'Wit P. (Piet) (m)', 'Schagen', 13),
(214, 'Wens4U', 'Obradovio S. (Nina) (v)', 'Schagen', 14),
(215, 'Wens4U', 'Stam G.M. (GailIli) (v)', 'Schagen', 15);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `uservote`
--

CREATE TABLE `uservote` (
  `id` int(11) NOT NULL,
  `usedKey` varchar(50) NOT NULL,
  `candidate` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `uservote`
--

INSERT INTO `uservote` (`id`, `usedKey`, `candidate`, `date`) VALUES
(22, 'admin', 'de Nijs-Visser P. (Puck) (v)', '2022-03-10 11:58:56'),
(23, '01234567', 'Wiskerke J. (Co) (m)', '2022-03-10 12:07:36'),
(24, '01234567', 'de Nijs-Visser P. (Puck) (v)', '2022-03-10 12:08:17'),
(25, 'admin', 'Glashouwer B.J. (Boudien) (v)', '2022-03-10 12:15:22');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `keyname`
--
ALTER TABLE `keyname`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `parties`
--
ALTER TABLE `parties`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `partypeople`
--
ALTER TABLE `partypeople`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `uservote`
--
ALTER TABLE `uservote`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `keyname`
--
ALTER TABLE `keyname`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=505;

--
-- AUTO_INCREMENT voor een tabel `parties`
--
ALTER TABLE `parties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `partypeople`
--
ALTER TABLE `partypeople`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT voor een tabel `uservote`
--
ALTER TABLE `uservote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
