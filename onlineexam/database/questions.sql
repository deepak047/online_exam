-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2018 at 12:32 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_ex`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `choice1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `choice2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `choice3` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `choice4` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `quiz_id`, `question`, `choice1`, `choice2`, `choice3`, `choice4`, `answer`, `created_at`, `updated_at`) VALUES
(1, 11, 'Which of the following type of variables are special type that only has one value: NULL?', 'Strings', 'Doubles', 'Booleans', 'NULL', 'NULL', NULL, NULL),
(2, 11, 'Which of the following function is used to redirect a page?', 'redirect()', 'header()', 'reflect()', 'None of the above.', 'header()', NULL, NULL),
(3, 11, 'How will you concatenate two strings?', 'Using . operator.', 'Using + operator.', 'Using add() function', 'Using append() function', 'Using . operator.', NULL, NULL),
(4, 11, 'Which of the following is used to create a session?', 'session_start() function', '$_SESSION[]', 'isset() function', 'session_destroy() function', 'session_start() function', NULL, NULL),
(5, 11, 'Which of the following method of Exception class returns the code of exception when error occured?', 'getMessage()', 'getCode()', 'getFile()', 'getLine()', 'getCode()', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
