-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-08-20 18:43:40
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
-- 資料庫： `db033`
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
  `rank` int(10) UNSIGNED NOT NULL,
  `sh` int(10) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `movie`
--

INSERT INTO `movie` (`id`, `name`, `class`, `length`, `date`, `boss`, `director`, `mv`, `img`, `intro`, `rank`, `sh`) VALUES
(1, '片u ', 4, 90, '2020-08-19', '片名1的發行商發行商', '片名1的導演導演', '03B01v.mp4', '03B01.png', '片名1的劇情片名1的劇情片名1的劇情', 8, 1),
(2, '片2', 2, 999, '2020-08-21', '片名2的發行商', '片名2的導演', '03B02v.mp4', '03B02.png', '片名2的劇情', 2, 1),
(3, '片3', 3, 90, '2020-08-20', '片3的發行商', '片3的導演', '03B03v.mp4', '03B03.png', '片3的劇情簡介', 3, 1),
(4, '片4', 1, 90, '2020-08-19', '片4的發行商', '片4的導演', '03B04v.mp4', '03B04.png', '片4的劇情簡介', 4, 1),
(5, '片5', 3, 90, '2020-08-19', '片5的發行商', '片5的導演', '03B05v.mp4', '03B05.png', '片5的劇情簡介', 5, 1),
(6, '片6', 2, 90, '2020-08-20', '片6的發行商', '片6的導演', '03B06v.mp4', '03B06.png', '片6的劇情簡介', 6, 1),
(7, '片7', 4, 90, '2020-08-20', '片7的發行商', '片7的導演', '03B07v.mp4', '03B07.png', '片7的劇情簡介', 7, 0),
(8, '片8', 4, 90, '2020-08-21', '片8的發行商', '片8的導演', '03B08v.mp4', '03B08.png', '片8的劇情簡介', 1, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `ord`
--

CREATE TABLE `ord` (
  `id` int(10) UNSIGNED NOT NULL,
  `no` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `session` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `qt` int(10) UNSIGNED NOT NULL,
  `seat` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `ord`
--

INSERT INTO `ord` (`id`, `no`, `movie`, `date`, `session`, `qt`, `seat`) VALUES
(4, '202008200002', '片2', '2020-08-20', '22:00-2400', 3, 'a:3:{i:0;i:5;i:1;i:6;i:2;i:7;}'),
(5, '202008200003', '片3', '2020-08-20', '22:00-2400', 3, 'a:3:{i:0;i:8;i:1;i:9;i:2;i:10;}');

-- --------------------------------------------------------

--
-- 資料表結構 `poster`
--

CREATE TABLE `poster` (
  `id` int(10) UNSIGNED NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ani` int(10) UNSIGNED DEFAULT 1,
  `rank` int(10) UNSIGNED NOT NULL,
  `sh` int(10) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `poster`
--

INSERT INTO `poster` (`id`, `img`, `name`, `ani`, `rank`, `sh`) VALUES
(1, '03A01.jpg', '03A01', 1, 1, 1),
(2, '03A02.jpg', '03A02', 2, 2, 1),
(3, '03A03.jpg', '03A03', 1, 6, 1),
(4, '03A04.jpg', '03A04', 3, 3, 1),
(5, '03A05.jpg', '03A05', 1, 4, 1),
(6, '03A06.jpg', '03A06', 3, 5, 1);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `poster`
--
ALTER TABLE `poster`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
