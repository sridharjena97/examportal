-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 12, 2020 at 05:37 PM
-- Server version: 8.0.21-0ubuntu0.20.04.4
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scl_u`
--

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `exam_id` int NOT NULL,
  `exam_title` varchar(30) NOT NULL,
  `exam_for_class` int NOT NULL,
  `exam_for_stream` enum('science','commerce','NA','') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `exam_for_section` varchar(1) NOT NULL,
  `exam_start_time` datetime NOT NULL,
  `exam_end_time` datetime NOT NULL,
  `exam_link` text NOT NULL,
  `created_by` text NOT NULL,
  `time_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`exam_id`, `exam_title`, `exam_for_class`, `exam_for_stream`, `exam_for_section`, `exam_start_time`, `exam_end_time`, `exam_link`, `created_by`, `time_added`) VALUES
(9, 'English Half Yearly', 10, 'NA', 'A', '2020-08-28 00:16:00', '2020-08-28 01:22:00', '&lt;iframe src=\"https://docs.google.com/forms/d/e/1FAIpQLSeci_KJcNfzTWArtm6H70iQxJwj6zKJnhu2ZOc2Lv-3k-NwIg/viewform?embedded=true\" width=\"640\" height=\"1657\" frameborder=\"0\" marginheight=\"0\" marginwidth=\"0\"&gt;Loading…&lt;/iframe&gt;', 'Teacher Sridh', '2020-08-27 18:46:50'),
(10, 'English Half Yearly', 12, 'commerce', 'A', '2020-08-28 00:40:00', '2020-08-28 00:59:00', '&lt;iframe src=\"https://docs.google.com/forms/d/e/1FAIpQLSeci_KJcNfzTWArtm6H70iQxJwj6zKJnhu2ZOc2Lv-3k-NwIg/viewform?embedded=true\" width=\"640\" height=\"1657\" frameborder=\"0\" marginheight=\"0\" marginwidth=\"0\"&gt;Loading…&lt;/iframe&gt;', 'Teacher Sridh', '2020-08-27 19:07:21'),
(11, 'English Half Yearly', 12, 'science', 'A', '2020-08-28 00:45:00', '2020-08-28 01:45:00', '&lt;iframe src=\"https://docs.google.com/forms/d/e/1FAIpQLSeci_KJcNfzTWArtm6H70iQxJwj6zKJnhu2ZOc2Lv-3k-NwIg/viewform?embedded=true\" width=\"640\" height=\"1657\" frameborder=\"0\" marginheight=\"0\" marginwidth=\"0\"&gt;Loading…&lt;/iframe&gt;', 'Teacher Sridh', '2020-08-27 19:13:32'),
(12, 'My exam2', 10, 'NA', 'A', '2020-08-28 08:38:00', '2020-08-28 09:38:00', '&lt;iframe src=\"https://docs.google.com/forms/d/e/1FAIpQLSeci_KJcNfzTWArtm6H70iQxJwj6zKJnhu2ZOc2Lv-3k-NwIg/viewform?embedded=true\" width=\"640\" height=\"1657\" frameborder=\"0\" marginheight=\"0\" marginwidth=\"0\"&gt;Loading…&lt;/iframe&gt;', 'admin user', '2020-08-28 03:09:03'),
(13, 'My exam', 10, 'NA', 'A', '2020-08-28 08:42:00', '2020-08-28 10:39:00', '&lt;iframe src=\"https://docs.google.com/forms/d/e/1FAIpQLSeci_KJcNfzTWArtm6H70iQxJwj6zKJnhu2ZOc2Lv-3k-NwIg/viewform?embedded=true\" width=\"640\" height=\"1657\" frameborder=\"0\" marginheight=\"0\" marginwidth=\"0\"&gt;Loading…&lt;/iframe&gt;', 'admin user', '2020-08-28 03:09:24'),
(14, 'My exam3', 10, 'NA', 'C', '2020-08-28 10:39:00', '2020-08-28 11:42:00', '&lt;iframe src=\"https://docs.google.com/forms/d/e/1FAIpQLSeci_KJcNfzTWArtm6H70iQxJwj6zKJnhu2ZOc2Lv-3k-NwIg/viewform?embedded=true\" width=\"640\" height=\"1657\" frameborder=\"0\" marginheight=\"0\" marginwidth=\"0\"&gt;Loading…&lt;/iframe&gt;', 'admin user', '2020-08-28 03:09:48'),
(15, 'Engilsh', 10, 'NA', 'A', '2020-08-29 09:49:00', '2020-08-29 10:45:00', '&lt;iframe src=\"https://docs.google.com/forms/d/e/1FAIpQLSeJOXMwzb1MTWYUu-lcgyLvqpeRPXTArYMk_hzs5xYK1xiUlg/viewform?embedded=true\" width=\"700\" height=\"520\" frameborder=\"0\" marginheight=\"0\" marginwidth=\"0\"&gt;Loading…&lt;/iframe&gt;', 'Teacher Sridh', '2020-08-29 04:17:11'),
(17, 'English Half Yearly', 12, 'commerce', 'A', '2020-08-29 22:00:00', '2020-08-29 22:15:00', '&lt;iframe src=\"https://docs.google.com/forms/d/e/1FAIpQLSeci_KJcNfzTWArtm6H70iQxJwj6zKJnhu2ZOc2Lv-3k-NwIg/viewform?embedded=true\" width=\"640\" height=\"1653\" frameborder=\"0\" marginheight=\"0\" marginwidth=\"0\"&gt;Loading…&lt;/iframe&gt;', 'Teacher Sridh', '2020-08-29 16:29:25'),
(18, 'English Half Yearly', 12, 'science', 'A', '2020-08-29 22:26:00', '2020-08-29 22:58:00', '&lt;iframe src=\"https://docs.google.com/forms/d/e/1FAIpQLSeci_KJcNfzTWArtm6H70iQxJwj6zKJnhu2ZOc2Lv-3k-NwIg/viewform?embedded=true\" width=\"640\" height=\"1657\" frameborder=\"0\" marginheight=\"0\" marginwidth=\"0\"&gt;Loading…&lt;/iframe&gt;', 'Teacher Sridh', '2020-08-29 16:30:13'),
(19, 'English Half Yearly', 12, 'commerce', 'A', '2020-08-30 07:53:00', '2020-08-30 10:53:00', '&lt;iframe src=\"https://docs.google.com/forms/d/e/1FAIpQLSeci_KJcNfzTWArtm6H70iQxJwj6zKJnhu2ZOc2Lv-3k-NwIg/viewform?embedded=true\" width=\"640\" height=\"1657\" frameborder=\"0\" marginheight=\"0\" marginwidth=\"0\"&gt;Loading…&lt;/iframe&gt;', 'Teacher Sridh', '2020-08-30 02:23:56');

-- --------------------------------------------------------

--
-- Table structure for table `forum_answers`
--

CREATE TABLE `forum_answers` (
  `answer_id` int NOT NULL,
  `question_id` int NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `answer` text NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `forum_answers`
--

INSERT INTO `forum_answers` (`answer_id`, `question_id`, `user_name`, `answer`, `time`) VALUES
(4, 5, 'user ', 'answer', '2020-08-30 09:14:25'),
(5, 1, 'user ', '\n\n\n my name', '2020-09-01 03:25:06');

-- --------------------------------------------------------

--
-- Table structure for table `forum_categories`
--

CREATE TABLE `forum_categories` (
  `forum_cat_srl` int NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `category` enum('english','hindi','account','bst','physics','chem','science','zoology','bio','computer') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `forum_categories`
--

INSERT INTO `forum_categories` (`forum_cat_srl`, `title`, `description`, `category`, `time`) VALUES
(1, 'ENGLISH', 'English is a West Germanic language that was first spoken in early medieval England and eventually became a global lingua franca. It is named after the Angles, one of the ancient Germanic peoples that migrated to the area of Great Britain that later took their name, England.', 'english', '2020-08-27 15:58:36'),
(2, 'HINDI', 'Hindi, or more precisely Modern Standard Hindi, is an Indo-Aryan language spoken in India. Hindi is often described as a standardised and Sanskritised register of the Hindustani language, which itself is based primarily on the Khariboli dialect of Delhi and neighbouring areas of Northern India', 'hindi', '2020-08-27 16:00:56'),
(3, 'ACCOUNTING', 'Accounting or accountancy is the measurement, processing, and communication of financial and non financial information about economic entities such as businesses and corporations.', 'account', '2020-08-27 16:02:12'),
(4, 'BUSINESS STUDIES', 'Business Studies is an academic subject taught in schools and at university level in many countries. Its study combines elements of accountancy, finance, marketing, organizational studies and economics.', 'bst', '2020-08-27 16:08:36'),
(5, 'PHYSICS', 'Physics is the natural science that studies matter, its motion and behavior through space and time, and the related entities of energy and force. Physics is one of the most fundamental scientific disciplines, and its main goal is to understand how the universe behaves.', 'physics', '2020-08-27 16:10:11'),
(6, 'CHEMISTRY', 'Chemistry is the scientific discipline involved with elements and compounds composed of atoms, molecules and ions: their composition, structure, properties, behavior and the changes they undergo during a reaction with other substances.', 'chem', '2020-08-27 16:13:50'),
(7, 'SCIENCE', 'Science is a systematic enterprise that builds and organizes knowledge in the form of testable explanations and predictions about the universe. The earliest roots of science can be traced to Ancient Egypt and Mesopotamia in around 3500 to 3000 BCE', 'science', '2020-08-27 16:16:13'),
(8, 'ZOOLOGY', 'Zoology is the branch of biology that studies the animal kingdom, including the structure, embryology, evolution, classification, habits, and distribution of all animals, both living and extinct, and how they interact with their ecosystems.', 'zoology', '2020-08-27 16:17:49'),
(9, 'BIOLOGY', 'Biology is the natural science that studies life and living organisms, including their physical structure, chemical processes, molecular interactions, physiological mechanisms, development and evolution. Despite the complexity of the science, certain unifying concepts consolidate it into a single, coherent field.', 'bio', '2020-08-27 16:18:29'),
(10, 'COMPUTER PROGRAMMING', 'Computer programming is the process of designing and building an executable computer program to accomplish a specific computing result or to perform a specific task.', 'computer', '2020-08-27 16:21:28');

-- --------------------------------------------------------

--
-- Table structure for table `forum_questions`
--

CREATE TABLE `forum_questions` (
  `question_category` varchar(30) NOT NULL,
  `question_id` int NOT NULL,
  `question_title` varchar(150) NOT NULL,
  `question_details` text NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `forum_questions`
--

INSERT INTO `forum_questions` (`question_category`, `question_id`, `question_title`, `question_details`, `user_name`, `time`) VALUES
('english', 1, 'Test Question', 'Test Description.', 'user ', '2020-08-28 02:02:01'),
('english', 2, 'What is thermodynamics?', 'Please help.', 'Rohan Das', '2020-08-29 15:59:23'),
('english', 3, 'Test Question 2', 'Description2', 'user ', '2020-08-29 16:02:05'),
('english', 4, 'Test Question 2', 'description', 'user ', '2020-08-29 16:40:00'),
('hindi', 5, 'What is this?', 'description', 'user ', '2020-08-30 09:10:49');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `srl` int NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`srl`, `title`, `description`, `time`) VALUES
(6, 'Regarding: An important Message', 'message', '2020-08-29 16:37:42'),
(7, 'Regarding: An important Message', 'this is the message', '2020-08-30 09:46:53');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `userid` int NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `regdno` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(160) NOT NULL,
  `mobile` text NOT NULL,
  `dob` date NOT NULL,
  `class` text NOT NULL,
  `section` varchar(1) NOT NULL,
  `stream` enum('science','commerce','NA','') NOT NULL,
  `signuptime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usertype` enum('user','teacher','admin','') NOT NULL DEFAULT 'user',
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `srl` int NOT NULL,
  `notice_description` text NOT NULL,
  `class` varchar(3) NOT NULL,
  `stream` enum('science','commerce','NA','') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `section` varchar(1) NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `link` text NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`srl`, `notice_description`, `class`, `stream`, `section`, `created_by`, `link`, `time`) VALUES
(19, 'class 12 sec d science result published', '12', 'science', 'D', 'Teacher Sridh', 'https://drive.google.com/file/d/1d71bj-E3TswtLJjb4H0M0ci951ceHItM/view?usp=sharing', '2020-08-30 09:37:47');

-- --------------------------------------------------------

--
-- Table structure for table `users_scl`
--

CREATE TABLE `users_scl` (
  `userid` int NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `regdno` varchar(10) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(160) NOT NULL,
  `mobile` text NOT NULL,
  `dob` date NOT NULL,
  `class` text NOT NULL,
  `section` varchar(1) NOT NULL,
  `stream` enum('science','commerce','NA','') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `signuptime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usertype` enum('user','teacher','admin') NOT NULL DEFAULT 'user',
  `Comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users_scl`
--

INSERT INTO `users_scl` (`userid`, `firstname`, `lastname`, `regdno`, `email`, `password`, `mobile`, `dob`, `class`, `section`, `stream`, `signuptime`, `usertype`, `Comment`) VALUES
(1, 'Teacher', 'Sridh', 'NA', 'teacher@site', '$2y$10$9YJWUEUyyYCe7/wQW9/tduEyF2I8E7ZsUR4IMgozDUPH1CadefZDm', '', '2020-08-19', '', '', '', '2020-08-19 20:36:59', 'teacher', ''),
(2, 'admin', 'user', 'NA', 'admin@site', '$2y$10$kCCZADKr5iXolYJdAGxDoei3Z5X/SOL0Dp/WjByogwvyg3T38x7KW', '', '2020-08-19', '', '', '', '2020-08-19 20:38:32', 'admin', ''),
(3, 'user', '', 'NA', 'user@site', '$2y$10$R/7QBGSeYfexLt/VBxXRrOqqTuTRtqG4/.z7TJYVn86o0a.c5zjqy', '', '2020-08-20', '10', '', '', '2020-08-20 08:05:15', 'user', ''),
(7, 'sridhr', 'Jena', '257/20', 'sridharjena97@gmail.com', '$2y$10$LW4ZgR0mF9A37jDYz6Ioseo/4t44f9gqy4thfVtiyATnLWR4Eqdyq', '8796306320', '2020-08-26', '12', 'A', '', '2020-08-26 17:25:31', 'user', ''),
(8, 'Rohan', 'Das', '258/20', 'rohandas@gmail.com', '$2y$10$JbPz28d1VssbC2UNGxstGOwT5YB.a2k4swANyQT6WQSylrtsKCqHy', '1234567890', '2020-08-26', '11', 'A', '', '2020-08-26 17:55:30', 'user', 'admin user'),
(9, 'parth', 'sarathi', '256/19', 'parth@gmail.com', '$2y$10$wMmh/J/WtUIdFKq3.C4OguMAwGkFlHI590BOeanX4ntSOvWgPzpV.', '9279370654', '2020-08-27', '12', 'B', '', '2020-08-27 13:39:52', 'user', 'admin user'),
(14, 'satya prakash', 'samal', '200/300', 'satyaprakash@gmail.com', '$2y$10$AbY/bN5bBWnm2LXJgivVc.IJaJlnhTjXZq2H0pukXIx6NL4mGkBFC', '1234567890', '2020-08-30', '12', 'D', 'science', '2020-08-30 08:11:54', 'user', 'Teacher Sridh'),
(15, 'kunal', 'sharma', '150/3', 'kunalsharma@gmail.com', '$2y$10$RZHlaT/XTmInCbSobPhLXOjx0ywWW51yYWC67iDUGFKxuRhle8NXO', '1234567890', '2020-08-30', '11', 'A', 'science', '2020-08-30 08:11:59', 'user', 'Teacher Sridh'),
(16, 'harkant', 'pandit', '15/2020', 'harkantpandit@gmail.com', '$2y$10$cuwu5rtWiDM4d0DaMl/s4OkWEPnf5zGYjS9BSEczUq3FBZgl0QnxC', '1234567890', '1995-06-22', '11', 'B', 'science', '2020-08-30 09:44:54', 'user', 'Teacher Sridh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `forum_answers`
--
ALTER TABLE `forum_answers`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `forum_categories`
--
ALTER TABLE `forum_categories`
  ADD PRIMARY KEY (`forum_cat_srl`);

--
-- Indexes for table `forum_questions`
--
ALTER TABLE `forum_questions`
  ADD PRIMARY KEY (`question_id`);
ALTER TABLE `forum_questions` ADD FULLTEXT KEY `question_title` (`question_title`,`question_details`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`srl`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `username` (`email`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`srl`);

--
-- Indexes for table `users_scl`
--
ALTER TABLE `users_scl`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `exam_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `forum_answers`
--
ALTER TABLE `forum_answers`
  MODIFY `answer_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `forum_categories`
--
ALTER TABLE `forum_categories`
  MODIFY `forum_cat_srl` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `forum_questions`
--
ALTER TABLE `forum_questions`
  MODIFY `question_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `srl` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `userid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `srl` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users_scl`
--
ALTER TABLE `users_scl`
  MODIFY `userid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
