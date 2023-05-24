-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2023 at 04:43 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL,
  `answer` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`) VALUES
(1, 'What makes html', '1', '2', '3', '4', 4),
(2, 'What makes html', '1', '2', '3', '4', 4),
(3, 'What makes html', '1', '2', '3', '4', 4),
(4, 'What is html', '1', '2', '3', '4', 4),
(5, 'Check', 'a', 'b', 'c', 'd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `last_name`, `first_name`, `middle_name`, `email`, `password`, `user_type`) VALUES
(1, 'Ezekiel Narvasa', '', NULL, 'narvasa@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(2, '123', '', NULL, 'test@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin'),
(3, 'User', '', NULL, 'user@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(4, 'admin', '', NULL, 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin'),
(5, 'Ez Borja', '', NULL, 'ez@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(6, 'Narvasa', 'Ez', 'U', 'narvs@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(7, 'narvasa', 'jo', '', 'jo1@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin'),
(8, 'Narvasa', 'E', '', 'e@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(9, 'Fort', 'Ly', '', 'fort@gmail.com', 'db62e76d611a0061079d717d9f42fbc0', 'user'),
(10, 'jo', 'Prof', '', 'prof@gmail.com', '7e6acc15d768d00896005d96a8caf75d', 'admin'),
(11, '321', '123', '312', '123@gmail.com', '876dfefef3ef6f4548f48bbddd856cef', 'user'),
(12, 'Last', 'First', 'Mid', 'First@gmail.com', '876dfefef3ef6f4548f48bbddd856cef', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
