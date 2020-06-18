-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 18, 2020 at 02:54 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gs_book_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `gs_bool_db`
--

CREATE TABLE `gs_bool_db` (
  `id` int(12) NOT NULL,
  `isbn` int(48) NOT NULL,
  `title` varchar(128) NOT NULL,
  `author` varchar(64) NOT NULL,
  `genre` varchar(64) NOT NULL,
  `evaluation` int(12) NOT NULL,
  `comment` text NOT NULL,
  `number_times` int(12) NOT NULL,
  `indate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gs_bool_db`
--

INSERT INTO `gs_bool_db` (`id`, `isbn`, `title`, `author`, `genre`, `evaluation`, `comment`, `number_times`, `indate`) VALUES
(12, 11, '111', '3333', '333', 33, '33', 33, '2020-06-18'),
(13, 111, 'ttttt', '板垣政樹', '工学', 1, '1', 1, '2020-06-18'),
(16, 40460, '今すぐ書ける１分間プログラミング', '板垣政樹', '工学', 1, '', 1, '2020-06-18'),
(17, 40615, '本を読む本', 'Ｍ．Ｊ．アドラー', '文庫', 5, '勉強になった', 3, '2020-06-18'),
(18, 4569, '日本経済予言の書　２０２０年代、不安な未', '鈴木　貴博', '新書', 1, '', 0, '2020-06-18'),
(19, 4502, 'ｂｅｙｏｎｄ５Ｇはインターネットの危機を', '西　正', '経営', 2, '', 0, '2020-06-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_bool_db`
--
ALTER TABLE `gs_bool_db`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_bool_db`
--
ALTER TABLE `gs_bool_db`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
