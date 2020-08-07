-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-08-07 02:25:46
-- 伺服器版本： 10.4.11-MariaDB
-- PHP 版本： 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `db04`
--

-- --------------------------------------------------------

--
-- 資料表結構 `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `acc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pw` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pr` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `admin`
--

INSERT INTO `admin` (`id`, `acc`, `pw`, `pr`) VALUES
(2, 'admin', '1234', 'a:5:{i:0;i:1;i:1;i:2;i:2;i:3;i:3;i:4;i:4;i:5;}'),
(3, 'test123', '123', 'a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";}');

-- --------------------------------------------------------

--
-- 資料表結構 `bottom`
--

CREATE TABLE `bottom` (
  `id` int(10) UNSIGNED NOT NULL,
  `bottom` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `bottom`
--

INSERT INTO `bottom` (`id`, `bottom`) VALUES
(1, '頁尾版權2023');

-- --------------------------------------------------------

--
-- 資料表結構 `goods`
--

CREATE TABLE `goods` (
  `id` int(10) UNSIGNED NOT NULL,
  `big` int(10) UNSIGNED NOT NULL,
  `sec` int(10) UNSIGNED NOT NULL,
  `no` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `spec` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(10) UNSIGNED NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `acc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pw` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `addr` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`id`, `name`, `acc`, `pw`, `email`, `addr`, `tel`, `date`) VALUES
(1, '喵咪蛋', 'test', '123', 'fsdfa@gsfdg', 'dfagf', '12345464', '2020-08-06'),
(2, '王大明bb', 'bbb', 'bbb', 'bb@123', 'bb', 'bbb', '2020-08-06');

-- --------------------------------------------------------

--
-- 資料表結構 `ord`
--

CREATE TABLE `ord` (
  `id` int(10) UNSIGNED NOT NULL,
  `acc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `addr` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `goods` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `type`
--

CREATE TABLE `type` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `type`
--

INSERT INTO `type` (`id`, `name`, `parent`) VALUES
(1, 'aaaaaaa', 0);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `bottom`
--
ALTER TABLE `bottom`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `ord`
--
ALTER TABLE `ord`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `bottom`
--
ALTER TABLE `bottom`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `ord`
--
ALTER TABLE `ord`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `type`
--
ALTER TABLE `type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
