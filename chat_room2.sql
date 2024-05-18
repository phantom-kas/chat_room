-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2024 at 04:21 PM
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
-- Database: `chat_room2`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` int(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `acitivity` varchar(255) NOT NULL,
  `time_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `title` varchar(255) NOT NULL,
  `discription` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `created_by`, `created_at`, `title`, `discription`) VALUES
(1, '', '0000-00-00 00:00:00', 'dsad', 'dsadasdas\r\n'),
(2, '', '0000-00-00 00:00:00', 'asdas', 'dsadsadas\r\n\r\n'),
(3, '1', '0000-00-00 00:00:00', 'The room', 'Hi hih ihih i\r\n'),
(4, '1', '0000-00-00 00:00:00', 'Room i', 'Hi msdsadkaskdkhbadhfdabs\r\n'),
(5, '1', '0000-00-00 00:00:00', 'ghvghvhg', 'gfcngmgmn\r\n'),
(6, '1', '0000-00-00 00:00:00', 'iuhkui', 'iluhuhkj'),
(7, '2', '0000-00-00 00:00:00', 'bjbo', 'kbjbobo');

-- --------------------------------------------------------

--
-- Table structure for table `room_messages`
--

CREATE TABLE `room_messages` (
  `id` int(255) NOT NULL,
  `from_user` varchar(255) NOT NULL,
  `room_id` varchar(255) NOT NULL,
  `meesage` longtext NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `profile_image_filename` varchar(255) NOT NULL DEFAULT 'null'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fname`, `lname`, `created_at`, `role`, `profile_image_filename`) VALUES
(1, '0', '123', 'jhon', 'sam', '2024-05-11 23:19:08', 'user', 'ww'),
(2, 'jk', 'jk', 'ss', 'il', '2024-05-15 08:16:24', 'user', 'null'),
(3, 'dasasd', '123', 'dsaas', 'dsad', '2024-05-15 12:11:18', 'user', 'null'),
(4, 'dasasds', '12345', 'dsaass', 'dsads', '2024-05-15 12:13:12', 'user', 'null'),
(5, 'sssss', '1234567', 'dsadas', 'dsadasfasadf', '2024-05-15 12:15:41', 'user', 'null'),
(6, 'ssssss', '1234567s', 'dsadas', 'dsadasfasadf', '2024-05-15 12:20:01', 'user', 'null'),
(7, 'sssssss', '1234567ss', 'dsadas', 'dsadasfasadf', '2024-05-15 12:22:37', 'user', 'null'),
(8, 'sssssssd', '1234567ss', 'dsadas', 'dsadasfasadf', '2024-05-15 12:23:01', 'user', 'null'),
(9, 'sssssssdd', '1234567ss', 'dsadas', 'dsadasfasadf', '2024-05-15 12:28:36', 'user', '1715747316.jpg'),
(10, 'kon', 'kon', 'kon', 'kon', '2024-05-15 12:37:47', 'user', '1715747867.jpg'),
(11, 'kons', 'kon', 'kon', 'kon', '2024-05-15 12:38:05', 'user', '1715747885.jpg'),
(12, 'dsadas', 'e', 'dd', 'dsadasfasadf', '2024-05-15 12:40:42', 'user', '1715748042.jpg'),
(13, 'dsadasnnn', 'e', 'dd', 'dsadasfasadf', '2024-05-15 12:43:31', 'user', '1715748211.jpg'),
(14, 'sam', '123', 'jhon', 'steward', '2024-05-18 22:10:28', 'user', '1716041428.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_messages`
--
ALTER TABLE `room_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `room_messages`
--
ALTER TABLE `room_messages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
