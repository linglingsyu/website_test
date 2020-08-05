-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-08-05 15:15:56
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
-- 資料庫： `db03`
--

-- --------------------------------------------------------

--
-- 資料表結構 `movie`
--

CREATE TABLE `movie` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` int(11) NOT NULL,
  `length` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `boss` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `director` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mv` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ord` int(10) UNSIGNED NOT NULL,
  `sh` int(10) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `movie`
--

INSERT INTO `movie` (`id`, `name`, `class`, `length`, `date`, `boss`, `director`, `mv`, `img`, `intro`, `ord`, `sh`) VALUES
(2, '預告片1', 2, '90', '2020-08-04', '片名1的發行商', '片名1的導演', '03B01v.mp4', '03B01.png', '片名1的簡介', 9, 1),
(3, '預告片2', 2, '90', '2020-08-04', '片名2的發行商', '片名2的導演', '03B02v.mp4', '03B02.png', '片名2的簡介', 8, 1),
(4, '預告片3', 2, '90', '2020-08-03', '片名3的發行商', '片名3的導演', '03B03v.mp4', '03B03.png', '片名3的簡介', 7, 1),
(5, '預告片4', 2, '90', '2020-08-02', '片名4的發行商', '片名4的導演', '03B04v.mp4', '03B04.png', '片名4的簡介', 6, 1),
(6, '預告片5', 2, '90', '2020-08-04', '片名5的發行商', '片名5的導演', '03B05v.mp4', '03B05.png', '片名5的簡介', 5, 1),
(7, '預告片6', 2, '90', '2020-08-03', '片名6的發行商', '片名6的導演', '03B06v.mp4', '03B06.png', '片名6的簡介', 4, 1),
(8, '預告片7', 2, '90', '2020-08-02', '片名7的發行商', '片名7的導演', '03B07v.mp4', '03B07.png', '片名7的簡介', 3, 1),
(9, '預告片8', 2, '90', '2020-08-05', '片名8的發行商', '片名8的導演', '03B08v.mp4', '03B08.png', '片名8的簡介', 2, 1),
(10, '預告片9', 2, '90', '2020-08-06', '片名9的發行商', '片名9的導演', '03B09v.mp4', '03B09.png', '片名9的簡介', 1, 1);

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

--
-- 傾印資料表的資料 `ord`
--

INSERT INTO `ord` (`id`, `no`, `name`, `date`, `session`, `qt`, `seat`) VALUES
(9, '202008050009', '預告片8', '2020-08-05', '4', 4, 'a:4:{i:0;s:2:\"on\";i:1;s:2:\"on\";i:2;s:2:\"on\";i:3;s:2:\"on\";}'),
(10, '202008050010', '預告片6', '2020-08-05', '4', 4, 'a:4:{i:0;s:2:\"on\";i:1;s:2:\"on\";i:2;s:2:\"on\";i:3;s:2:\"on\";}'),
(11, '202008050011', '預告片6', '2020-08-05', '3', 4, 'a:4:{i:0;s:1:\"1\";i:1;s:1:\"6\";i:2;s:2:\"11\";i:3;s:2:\"16\";}'),
(12, '202008050012', '預告片3', '2020-08-05', '3', 4, 'a:4:{i:0;s:2:\"17\";i:1;s:2:\"18\";i:2;s:2:\"19\";i:3;s:2:\"20\";}'),
(13, '202008050013', '預告片8', '2020-08-05', '3', 4, 'a:4:{i:0;s:1:\"7\";i:1;s:1:\"8\";i:2;s:1:\"9\";i:3;s:2:\"10\";}'),
(14, '202008050014', '預告片3', '2020-08-05', '4', 2, 'a:2:{i:0;s:1:\"5\";i:1;s:2:\"10\";}');

-- --------------------------------------------------------

--
-- 資料表結構 `poster`
--

CREATE TABLE `poster` (
  `id` int(10) UNSIGNED NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ord` int(10) UNSIGNED NOT NULL,
  `sh` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `effect` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `poster`
--

INSERT INTO `poster` (`id`, `img`, `name`, `ord`, `sh`, `effect`) VALUES
(1, '03A01.jpg', '咒怨', 1, 1, 1),
(2, '03A02.jpg', '哈利波特', 2, 1, 3),
(3, '03A03.jpg', '寒顫', 3, 0, 2);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `poster`
--
ALTER TABLE `poster`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
