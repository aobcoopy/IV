-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2023 at 03:18 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inspiring_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE `blog_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blog_category`
--

INSERT INTO `blog_category` (`id`, `name`, `slug`, `status`, `created`, `updated`, `user`, `sort`, `color`) VALUES
(1, 'Lifestyle', 'lifestyle', 1, '2023-06-12 15:49:16', '2023-06-20 15:20:54', 8, 1, '#1fe5ff'),
(3, 'Fashion', 'fashion', 1, '2023-06-12 15:58:03', '2023-06-20 16:32:43', 8, 5, '#ffee2e'),
(4, 'Travel', 'travel', 1, '2023-06-12 15:58:10', '2023-06-20 15:24:12', 8, 2, '#ff7070'),
(5, 'Vlogs', 'vlogs', 1, '2023-06-12 15:58:25', '2023-06-20 14:52:41', 8, 4, NULL),
(6, 'Food', 'food', 1, '2023-06-12 15:58:33', '2023-06-20 16:31:14', 8, 3, '#39fe5a'),
(7, 'Health', 'health', 1, '2023-06-12 15:58:39', '2023-06-20 16:31:23', 8, 6, '#388eff'),
(8, 'test', 'test', 0, '2023-06-20 14:52:34', '2023-06-20 14:52:41', 8, 7, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
