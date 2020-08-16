-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-08-16 18:16:25
-- 伺服器版本： 10.4.11-MariaDB
-- PHP 版本： 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `db032`
--

-- --------------------------------------------------------

--
-- 資料表結構 `movie`
--

CREATE TABLE `movie` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` int(10) UNSIGNED NOT NULL,
  `length` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `boss` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `director` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mv` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sh` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `rank` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `movie`
--

INSERT INTO `movie` (`id`, `name`, `class`, `length`, `date`, `boss`, `director`, `mv`, `img`, `intro`, `sh`, `rank`) VALUES
(3, '片名25', 4, 999, '2020-08-17', '片名25的發行商', '片名25的導演', '03B25v.mp4', '03B25.png', '片名25的劇情簡介', 1, 1),
(4, '片名3', 1, 120, '2020-08-16', '片名3的發行商', '片名3的導演', '03B01v.mp4', '03B01.png', '片名3的劇情簡介', 1, 2),
(5, '片名4', 3, 120, '2020-08-16', '片名4的發行商', '片名4的導演', '03B02v.mp4', '03B02.png', '片名4的劇情簡介', 1, 3),
(6, '片名5', 2, 120, '2020-08-15', '片名5的發行商', '片名5的導演', '03B03v.mp4', '03B03.png', '片名4的劇情簡介', 1, 4),
(7, '片名7', 4, 120, '2020-08-14', '片名7的發行商', '片名7的導演', '03B04v.mp4', '03B04.png', '片名4的劇情簡介', 1, 5),
(8, '片名6', 1, 120, '2020-08-17', '片名6的發行商', '片名6的導演', '03B05v.mp4', '03B05.png', '片名4的劇情簡介', 1, 6),
(9, '片名8', 4, 120, '2020-08-16', '片名8的發行商', '片名8的導演', '03B06v.mp4', '03B06.png', '片名4的劇情簡介', 1, 7);

-- --------------------------------------------------------

--
-- 資料表結構 `ord`
--

CREATE TABLE `ord` (
  `id` int(10) UNSIGNED NOT NULL,
  `no` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `session` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `qt` int(10) UNSIGNED NOT NULL,
  `seat` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `poster`
--

CREATE TABLE `poster` (
  `id` int(10) UNSIGNED NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rank` int(10) UNSIGNED NOT NULL,
  `sh` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `effect` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `poster`
--

INSERT INTO `poster` (`id`, `img`, `name`, `rank`, `sh`, `effect`) VALUES
(1, '03A01.jpg', '預告片1', 1, 1, 1),
(2, '03A02.jpg', '預告片2', 2, 0, 3),
(3, '03A03.jpg', '預告片3', 3, 1, 2),
(4, '03A04.jpg', '預告片4', 4, 0, 3),
(5, '03A05.jpg', '預告片6', 5, 0, 1),
(6, '03A06.jpg', '預告片5', 6, 0, 2);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `ord`
--
ALTER TABLE `ord`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `poster`
--
ALTER TABLE `poster`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `ord`
--
ALTER TABLE `ord`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `poster`
--
ALTER TABLE `poster`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
