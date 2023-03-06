-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2016 at 09:53 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `users_id` int(3) NOT NULL,
  `users_fname` varchar(50) NOT NULL,
  `users_quesno` int(11) NOT NULL,
  `comment` text NOT NULL,
  `postdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`users_id`, `users_fname`, `users_quesno`, `comment`, `postdate`) VALUES
(1, 'subho.share@gmail.com', 2, 'u r ok', '2016-07-27 15:39:04'),
(1, 'subho.share@gmail.com', 1, 'its fine', '2016-07-27 15:39:11'),
(2, 'joypal@gmail.com', 2, 'its fine', '2016-07-27 15:40:37'),
(6, 'iam@gmail.com', 6, 'ok', '2016-07-28 06:00:54'),
(8, 'alexjohns@gmail.com', 6, 'ok\r\n\r\n', '2016-07-28 13:59:53'),
(8, 'alexjohns@gmail.com', 6, 'ok\r\n\r\n', '2016-07-28 13:59:56'),
(8, 'alexjohns@gmail.com', 9, '', '2016-07-28 15:02:33'),
(8, 'alexjohns@gmail.com', 9, 'what?', '2016-07-28 15:02:51'),
(1, 'subho.share@gmail.com', 9, 'its working', '2016-07-29 12:45:32'),
(1, 'subho.share@gmail.com', 6, 'jbjjj', '2016-07-29 12:46:52'),
(1, 'subho.share@gmail.com', 7, 'ok', '2016-07-29 12:47:08'),
(7, 'me@yahoo.com', 10, 'thanks.', '2016-07-29 17:32:19'),
(1, 'subho.share@gmail.com', 10, 'cool :)', '2016-07-29 17:32:53'),
(1, 'subho.share@gmail.com', 10, 'The ans is India', '2016-07-29 17:34:41'),
(9, 'sandyruth@gmail.com', 11, 'i get it. thank u man!', '2016-07-29 17:41:40'),
(7, 'me@yahoo.com', 11, 'Yes.Its Lotus.', '2016-07-29 17:43:46'),
(7, 'me@yahoo.com', 5, 'idk', '2016-07-29 17:48:02'),
(7, 'me@yahoo.com', 4, 'what are u saying?', '2016-07-29 17:48:17'),
(7, 'me@yahoo.com', 3, 'who are you?', '2016-07-29 17:48:38');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `users_id` int(150) NOT NULL,
  `users_quesno` int(3) NOT NULL,
  `users_ques` varchar(255) NOT NULL,
  `admin_ans` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`users_id`, `users_quesno`, `users_ques`, `admin_ans`, `username`) VALUES
(1, 1, 'Why is the birds so angry in ANGRY BIRDS?', 'its beacuse u are dumb', 'subho.share@gmail.com'),
(1, 2, 'my name is khan', 'ok', 'subho.share@gmail.com'),
(1, 3, 'u r tired?', 'yes', 'subho.share@gmail.com'),
(1, 4, 'give me freedom?', 'yes its done', 'subho.share@gmail.com'),
(1, 5, 'What is PHP?', 'ok', 'subho.share@gmail.com'),
(1, 6, 'Who is the Prime-minister of India?', 'Mr. Narendra Modi', 'alex@gmail.com'),
(7, 7, 'What is god?', 'God is whom we pray.', 'me@yahoo.com'),
(8, 8, 'Who is the Prime-minister of India? ', 'Mr. Narendra Modi', 'alexjohns@gmail.com'),
(1, 9, 'jhvhj', 'ok fine', 'subho.share@gmail.com'),
(7, 10, 'Delhi is the Capital of which Country?', 'India', 'me@yahoo.com'),
(9, 11, 'What is the national flower of India?', 'Lotus', 'sandyruth@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `temp_questions`
--

CREATE TABLE `temp_questions` (
  `serial_no` int(150) NOT NULL,
  `temp_users_id` int(150) NOT NULL,
  `temp_users_ques` text NOT NULL,
  `temp_username` varchar(150) NOT NULL,
  `temp_admin_answer` varchar(255) NOT NULL,
  `ques_postdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmpusers`
--

CREATE TABLE `tmpusers` (
  `tmpusers_id` int(3) NOT NULL,
  `tmpusers_fname` varchar(255) NOT NULL,
  `tmpusers_lname` varchar(255) NOT NULL,
  `tmpusers_email` varchar(255) NOT NULL,
  `tmpusers_pass` varchar(255) NOT NULL,
  `tmpusers_otp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `users_id` int(3) NOT NULL,
  `users_fname` varchar(255) NOT NULL,
  `users_lname` varchar(255) NOT NULL,
  `users_email` varchar(255) NOT NULL,
  `users_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`users_id`, `users_fname`, `users_lname`, `users_email`, `users_pass`) VALUES
(1, 'Subho', 'Pal', 'subho.share@gmail.com', '12345'),
(2, 'joy ', 'pal', 'joypal@gmail.com', '345'),
(3, 'alex', 'jones', 'alex@gmail.com', '12345'),
(4, 'pandu ', 'c', 'pandu@gmail.com', '123'),
(5, 'anish', 'manna', 'anish@gmail.com', '345'),
(6, 'ojha', 'ojha', 'iam@gmail.com', '12345'),
(7, 'Shuvam', 'Ray', 'me@yahoo.com', '190'),
(8, 'Alex', 'Johns', 'alexjohns@gmail.com', '12345'),
(9, 'Sandy', 'Ruth', 'sandyruth@gmail.com', '191');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`users_quesno`);

--
-- Indexes for table `temp_questions`
--
ALTER TABLE `temp_questions`
  ADD PRIMARY KEY (`serial_no`);

--
-- Indexes for table `tmpusers`
--
ALTER TABLE `tmpusers`
  ADD PRIMARY KEY (`tmpusers_id`),
  ADD UNIQUE KEY `tmpusers_email` (`tmpusers_email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`users_id`),
  ADD UNIQUE KEY `users_email` (`users_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `users_quesno` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `temp_questions`
--
ALTER TABLE `temp_questions`
  MODIFY `serial_no` int(150) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tmpusers`
--
ALTER TABLE `tmpusers`
  MODIFY `tmpusers_id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `users_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
