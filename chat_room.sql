-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 29, 2024 at 04:11 PM
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
-- Database: `chat_room`
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
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
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
(7, '2', '0000-00-00 00:00:00', 'bjbo', 'kbjbobo'),
(8, '16', '2024-05-19 00:22:42', 'rom', 'd'),
(9, '18', '2024-05-20 15:33:38', 'room2', 'hehe');

-- --------------------------------------------------------

--
-- Table structure for table `room_messages`
--

CREATE TABLE `room_messages` (
  `id` int(255) NOT NULL,
  `from_user` varchar(255) NOT NULL,
  `room_id` varchar(255) NOT NULL,
  `messages` longtext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `image_file_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_messages`
--

INSERT INTO `room_messages` (`id`, `from_user`, `room_id`, `messages`, `created_at`, `image_file_name`) VALUES
(1, '2', '2', 'hi  m', '2024-05-19 15:30:46', NULL),
(2, '2', '2', 'hi  m', '2024-05-19 15:31:05', NULL),
(3, '2', '2', 'hi  m', '2024-05-19 15:31:16', NULL),
(4, '16', '8', 'assdaasdasfasd', '2024-05-19 15:45:20', NULL),
(5, '16', '8', 'adsfasfs', '2024-05-19 16:02:01', NULL),
(6, '16', '8', 'adsfasfsasfsdafdsa', '2024-05-19 16:02:04', NULL),
(7, '16', '8', 'adsfasfsasfsdafdsasdafdas', '2024-05-19 16:02:06', NULL),
(8, '16', '8', 'adsfasdfads', '2024-05-19 16:02:11', NULL),
(9, '17', '8', 'asdfdasfads\r\n', '2024-05-19 16:18:56', NULL),
(10, '17', '8', 'asdfdasfads\r\n', '2024-05-19 16:18:58', NULL),
(11, '17', '8', 'gogo', '2024-05-19 16:19:29', NULL),
(12, '16', '8', 'gogo', '2024-05-19 16:19:36', NULL),
(13, '16', '8', 'fsgdgd', '2024-05-19 16:22:48', NULL),
(14, '16', '8', 'dsfsd', '2024-05-19 16:23:13', NULL),
(15, '16', '8', 'dsfsd', '2024-05-19 16:23:13', NULL),
(16, '16', '8', 'dsfsd', '2024-05-19 16:23:58', NULL),
(17, '16', '8', 'ds', '2024-05-19 16:24:03', NULL),
(18, '16', '8', 'dsaa', '2024-05-19 16:25:29', NULL),
(19, '16', '8', 'fdfdasfads\r\n', '2024-05-19 16:33:00', NULL),
(20, '16', '8', 'dfdasfadssad', '2024-05-19 16:38:22', NULL),
(21, '16', '8', 'hi', '2024-05-19 16:39:08', NULL),
(22, '16', '8', 'dsadasdsa', '2024-05-19 16:40:35', NULL),
(23, '16', '8', 'dfasfasd', '2024-05-19 16:41:54', NULL),
(24, '16', '8', 'dfasfasd', '2024-05-19 16:42:05', NULL),
(25, '16', '8', 'dfasfasddafadsfads', '2024-05-19 16:42:54', NULL),
(26, '16', '8', 'fff', '2024-05-19 16:43:04', NULL),
(27, '16', '8', 'vvvdavads', '2024-05-19 16:43:35', NULL),
(28, '16', '8', 'dasdsa', '2024-05-19 16:45:27', NULL),
(29, '16', '8', 'dsasdas', '2024-05-19 16:45:30', NULL),
(30, '16', '8', 'dsadsadafadsf daf ads f das fdsafdsadasfasd', '2024-05-19 16:45:38', NULL),
(31, '16', '8', 'hi', '2024-05-19 16:48:13', NULL),
(32, '16', '8', '', '2024-05-19 16:48:16', NULL),
(33, '16', '8', 'how you doing', '2024-05-19 16:48:25', NULL),
(34, '16', '8', 'adsadas\r\n', '2024-05-20 10:27:32', NULL),
(35, '16', '8', '', '2024-05-20 10:35:49', NULL),
(36, '16', '8', 'dadsa', '2024-05-20 13:01:21', NULL),
(37, '16', '8', 'dasdsadsa', '2024-05-20 13:01:37', NULL),
(38, '16', '8', 'adsadas', '2024-05-20 13:02:12', NULL),
(39, '16', '8', 'hello\r\n', '2024-05-20 13:04:24', NULL),
(40, '16', '8', 'hali', '2024-05-20 13:05:30', NULL),
(41, '17', '8', 'dsadsa', '2024-05-20 13:05:43', NULL),
(42, '16', '8', 'dsadsa', '2024-05-20 13:06:25', NULL),
(43, '17', '8', 'dadsa', '2024-05-20 13:06:31', NULL),
(44, '16', '8', 'dasdsadas', '2024-05-20 13:07:19', NULL),
(45, '16', '8', 'dfsasafsda', '2024-05-20 13:12:29', NULL),
(46, '16', '8', 'hellow', '2024-05-20 13:12:37', NULL),
(47, '16', '8', 'hi', '2024-05-20 13:14:23', NULL),
(48, '16', '8', 'hello', '2024-05-20 13:14:53', NULL),
(49, '16', '8', 'hi', '2024-05-20 13:15:13', NULL),
(50, '16', '8', 'my name is ligma', '2024-05-20 13:15:20', NULL),
(51, '16', '8', '', '2024-05-20 13:15:20', NULL),
(52, '17', '8', 'hello', '2024-05-20 13:15:33', NULL),
(53, '16', '8', 'HimHimHIm', '2024-05-20 13:15:43', NULL),
(54, '17', '8', 'yoyoyo', '2024-05-20 13:15:47', NULL),
(55, '16', '8', 'ligma', '2024-05-20 13:17:21', NULL),
(56, '16', '8', 'sam', '2024-05-20 13:17:30', NULL),
(57, '16', '8', 'hi hi hi', '2024-05-20 13:18:10', NULL),
(58, '16', '8', 'dsadsa', '2024-05-20 13:33:19', NULL),
(59, '17', '8', 'testing', '2024-05-20 13:37:11', NULL),
(60, '17', '8', 'dsaas', '2024-05-20 13:37:53', NULL),
(61, '17', '8', 'hello', '2024-05-20 13:38:49', NULL),
(62, '17', '8', 'hi', '2024-05-20 13:39:42', NULL),
(63, '17', '8', 'hi', '2024-05-20 13:40:30', NULL),
(64, '17', '8', 'dsadas', '2024-05-20 13:41:09', NULL),
(65, '17', '8', 'dsa', '2024-05-20 13:41:47', NULL),
(66, '17', '8', 'dsadas', '2024-05-20 13:42:31', NULL),
(67, '17', '8', 'dd', '2024-05-20 13:42:59', NULL),
(68, '17', '8', 'dsadas', '2024-05-20 13:44:58', NULL),
(69, '17', '8', 'dsa', '2024-05-20 13:46:51', NULL),
(70, '16', '8', 'dd', '2024-05-20 13:47:06', NULL),
(71, '17', '8', 'dd', '2024-05-20 13:47:35', NULL),
(72, '17', '8', 'sss', '2024-05-20 13:47:39', NULL),
(73, '16', '8', 'hello', '2024-05-20 13:48:29', NULL),
(74, '17', '8', 'dsadsa', '2024-05-20 13:48:41', NULL),
(75, '17', '8', 'dsadas', '2024-05-20 15:06:31', NULL),
(76, '17', '8', 'dsadsadas', '2024-05-20 15:07:02', NULL),
(77, '17', '8', 'kk', '2024-05-20 15:07:16', NULL),
(78, '17', '8', 'jii', '2024-05-20 15:07:39', NULL),
(79, '16', '8', 'hhh', '2024-05-20 15:10:50', NULL),
(80, '16', '8', 'bb', '2024-05-20 15:10:54', NULL),
(81, '16', '8', 'bb', '2024-05-20 15:10:59', NULL),
(82, '17', '8', 'bbb', '2024-05-20 15:11:13', NULL),
(83, '17', '8', 'bb', '2024-05-20 15:11:52', NULL),
(84, '17', '8', 'hi', '2024-05-20 15:12:14', NULL),
(85, '17', '8', 'bb', '2024-05-20 15:12:38', NULL),
(86, '16', '8', 'hi', '2024-05-20 15:15:35', NULL),
(87, '16', '8', 'hi', '2024-05-20 15:15:49', NULL),
(88, '16', '8', 'hi', '2024-05-20 15:16:15', NULL),
(89, '16', '8', 'j', '2024-05-20 15:16:19', NULL),
(90, '16', '8', 'k', '2024-05-20 15:16:33', NULL),
(91, '16', '8', 'hh', '2024-05-20 15:16:54', NULL),
(92, '16', '8', 'h', '2024-05-20 15:25:39', NULL),
(93, '16', '8', 'hhhh', '2024-05-20 15:25:48', NULL),
(94, '17', '8', 'o\r\n', '2024-05-20 15:26:06', NULL),
(95, '16', '8', 'hi', '2024-05-20 15:26:32', NULL),
(96, '16', '8', 'i im ligma', '2024-05-20 15:26:39', NULL),
(97, '16', '8', 'hi', '2024-05-20 15:27:48', NULL),
(98, '16', '8', 'hi', '2024-05-20 15:27:53', NULL),
(99, '17', '8', 'jj', '2024-05-20 15:27:58', NULL),
(100, '16', '8', 'ligma', '2024-05-20 15:28:30', NULL),
(101, '16', '8', 'hello', '2024-05-20 15:28:34', NULL),
(102, '16', '8', 'fine sire', '2024-05-20 15:28:41', NULL),
(103, '17', '8', 'hi', '2024-05-20 15:31:11', NULL),
(104, '18', '8', 'ji im user', '2024-05-20 15:33:03', NULL),
(105, '17', '8', 'hello user', '2024-05-20 15:33:15', NULL),
(106, '17', '8', 'hello', '2024-05-20 15:33:45', NULL),
(107, '18', '9', 'hehe', '2024-05-20 15:33:55', NULL),
(108, '16', '9', 'yo', '2024-05-20 15:34:03', NULL),
(109, '16', '9', 'Im going to see ligma tomorrow', '2024-05-20 15:34:19', NULL),
(110, '18', '9', 'whats ligma', '2024-05-20 15:34:33', NULL),
(111, '16', '9', 'ligma ballls!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!', '2024-05-20 15:34:43', NULL),
(112, '18', '9', 'hahahahahah', '2024-05-20 15:34:48', NULL),
(113, '18', '9', 'helo', '2024-05-20 16:20:54', NULL),
(114, '16', '9', 'hi', '2024-05-20 16:25:53', NULL),
(115, '16', '8', 'hi', '2024-05-20 21:25:48', NULL),
(116, '16', '8', 'hello', '2024-05-20 21:25:54', NULL),
(117, '16', '8', 'hi', '2024-05-20 21:26:59', NULL),
(118, '16', '8', 'hi', '2024-05-20 21:27:04', NULL),
(119, '18', '8', 'hi', '2024-05-20 21:27:16', NULL),
(120, '16', '8', 'hellow', '2024-05-20 21:27:27', NULL),
(121, '16', '8', 'hi', '2024-05-27 13:41:26', NULL),
(122, '16', '8', 'hello', '2024-05-27 13:42:58', NULL),
(123, '16', '8', 'hh', '2024-05-27 13:43:47', NULL);

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
(15, 'sam', '123', 'Jhon', 'sam', '2024-05-19 00:17:15', 'user', 'null'),
(16, 'samm', '123', 'Jhon', 'sam', '2024-05-19 00:21:12', 'user', '1716049272.jpg'),
(17, 'lim', '123', 'lim', 'lim', '2024-05-19 16:18:43', 'user', '1716106723.jpg'),
(18, 'user', '123', 'user', 'user', '2024-05-20 15:32:38', 'user', '1716190358.jpg');

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `room_messages`
--
ALTER TABLE `room_messages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
