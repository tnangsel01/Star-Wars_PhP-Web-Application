-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 02, 2023 at 03:04 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `StarWars`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `post` text NOT NULL,
  `date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `post`, `date`) VALUES
(22, 4, 'Who is the main StarWars character?', '2023-04-30 11:13:59.000000'),
(23, 3, 'Tenzin is posting this. ', '2023-04-30 12:21:04.000000'),
(24, 3, 'Raju is asking for an example. ', '2023-04-30 13:16:58.000000'),
(25, 4, 'tdolma is here. ', '2023-04-30 13:36:17.000000'),
(26, 3, 'what is my picture?', '2023-04-30 16:22:20.000000'),
(27, 3, 'what is next?', '2023-04-30 17:39:03.000000'),
(28, 3, 'Tenzin is here to test the next and previous pages. ', '2023-05-01 15:42:48.000000');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `profile_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `image` varchar(400) NOT NULL,
  `status` int(50) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`profile_id`, `user_id`, `image`, `status`) VALUES
(10, 4, '../images/profile4.jpg', 1),
(11, 3, '../images/profile3.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `reply_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `post_id` int(50) NOT NULL,
  `reply` text NOT NULL,
  `reply_date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`reply_id`, `user_id`, `post_id`, `reply`, `reply_date`) VALUES
(20, 3, 22, 'Who is replying this post checking the username. ', '2023-04-30 11:59:13.000000'),
(21, 3, 22, 'Tenzin is replying this. ', '2023-04-30 12:05:52.000000'),
(22, 4, 22, 'Hi, this is T.Dolma replying. ', '2023-04-30 12:11:58.000000'),
(23, 3, 22, 'profile image checking with reply by username . ', '2023-04-30 12:20:07.000000'),
(24, 3, 22, 'profile pic checking. ', '2023-04-30 12:23:51.000000'),
(25, 3, 22, 'who am I?', '2023-04-30 12:45:52.000000'),
(26, 4, 24, 'Tenzin is replying. ', '2023-04-30 13:18:23.000000'),
(27, 3, 25, 'Tenzin said hi love. ', '2023-04-30 13:37:16.000000'),
(28, 4, 25, 'I love you baby', '2023-04-30 13:37:50.000000'),
(29, 4, 24, 'I am also here. ', '2023-04-30 13:38:55.000000'),
(30, 4, 22, 'tdolma is here', '2023-04-30 13:39:59.000000'),
(31, 4, 25, 'i love you too. ', '2023-04-30 13:40:37.000000'),
(32, 4, 25, 'what is this?', '2023-04-30 13:41:05.000000'),
(33, 4, 23, 'What&#039;s my name?', '2023-04-30 13:48:04.000000'),
(34, 3, 23, 'you are my love. ', '2023-04-30 13:48:43.000000'),
(35, 3, 25, 'hello?', '2023-04-30 13:50:35.000000'),
(36, 3, 24, 'WHere is my previous comment?', '2023-04-30 13:51:20.000000'),
(37, 3, 25, 'i know you are here but i would li ktointoi opgopjsoidj oiasj[gi js[osdhjosdijg[ opasdjglk lkasdjgoiasdhgopiasrgkl; asdo;gihsdpogihasdopg haspigh asdiklgh lop;asd gh paosdih gpoaerhigpqeriogh[oriehgp iobharpg h asd;lgh sdiuh;asdohgkasdh ;jklasdhksd ik asdk jsdhf jj gd h gjkdhgkj gh.  sd ghdf g ', '2023-04-30 16:10:37.000000'),
(38, 3, 25, 'what is this?', '2023-04-30 17:50:12.000000'),
(39, 3, 27, 'You can post answer now. ', '2023-04-30 22:52:27.000000'),
(40, 3, 27, 'How long will it take him to get done?', '2023-05-01 15:42:05.000000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `email`, `password`) VALUES
(3, 'Tenzin Nangsel', 'tnangsel01@gmail.com', 'tnangsel01@gmail.com', '$2y$10$vRdakHsHatTtYc6yJVuPX.ENteJAvuBqnpONhlNs307btWARgDare'),
(4, 'Tsephel Dolma', 'tdolma', 'tdolma@gmail.com', '$2y$10$Alsa82xr9QtAcsc.h8bN5.ccXoyZosE1EUb7gZ6474bTVei3/pPt.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`profile_id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `profile_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `reply_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
