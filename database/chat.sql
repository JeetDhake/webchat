-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2024 at 10:32 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `imgs` varchar(250) NOT NULL,
  `aud` varchar(250) NOT NULL,
  `vid` varchar(250) NOT NULL,
  `doc` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`, `imgs`, `aud`, `vid`, `doc`) VALUES
(2, 776370220, 1333425990, 'hi, hello ', '', '', '', ''),
(3, 1333425990, 776370220, 'hello there', '', '', '', ''),
(4, 776370220, 1333425990, 'new message again', '', '', '', ''),
(5, 776370220, 1333425990, 'type something', '', '', '', ''),
(6, 1333425990, 776370220, 'hey you again', '', '', '', ''),
(7, 1333425990, 776370220, 'this is a long paragraph, this is demo text just to fill space', '', '', '', ''),
(8, 776370220, 1333425990, 'ok, get the space cover up to get scroll effect, and generate long reading history', '', '', '', ''),
(9, 1333425990, 776370220, 'better send small message in parts', '', '', '', ''),
(10, 1333425990, 776370220, 'just like this', '', '', '', ''),
(11, 776370220, 1333425990, 'ok thanks', '', '', '', ''),
(12, 776370220, 1333425990, 'hi', '', '', '', ''),
(13, 776370220, 1333425990, 'hello', '', '', '', ''),
(14, 776370220, 1333425990, 'hey', '', '', '', ''),
(15, 776370220, 1333425990, 'oi', '', '', '', ''),
(16, 776370220, 1333425990, '', '66ebb76d27e5d0.81637616.png', '', '', ''),
(17, 776370220, 1333425990, '', '', '66ebb88e9fdb00.60884079.mp3', '', ''),
(18, 776370220, 1333425990, '', '', '', '66ebb909ba0b26.45868878.mp4', ''),
(19, 776370220, 1333425990, '', '', '', '', '66ebb9461cd827.51798989.docx'),
(20, 776370220, 1333425990, 'hi', '', '', '', ''),
(21, 1333425990, 776370220, '', '', '', '', '66ed2b54bbc358.55440129.docx'),
(22, 1333401895, 776370220, 'hi', '', '', '', ''),
(23, 776370220, 1333425990, 'hey', '', '', '', ''),
(24, 1333401895, 1333425990, 'hi', '', '', '', ''),
(25, 1333401895, 1333425990, '', '', '66ed32c5c63db4.24401388.mp3', '', ''),
(26, 1333425990, 1333401895, '', '', '', '', '66ed32ed9a6714.37920387.pdf'),
(27, 1333425990, 1333401895, 'watch this', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(225) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `unique_id`, `fname`, `lname`, `email`, `password`, `img`, `status`) VALUES
(1, 1333425990, 'person', 'one', 'one@gmail.com', 'personone', '1697809304profile1.png', 'Offline Now'),
(2, 776370220, 'person', 'two', 'two@gmail.com', 'persontwo', '1697809343profile2.png', 'Offline Now'),
(3, 1333401895, 'person', 'three', 'three@gmail.com', 'personthree', '1697809406profile3.png', 'Offline Now'),
(4, 246308670, 'person', 'four', 'four@gmail.com', 'personfour', '1697809443profile4.png', 'Offline Now');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
