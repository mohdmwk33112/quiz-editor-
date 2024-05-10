-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 28, 2023 at 03:42 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online programing courses`
--

-- --------------------------------------------------------
--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `question_id` int NOT NULL AUTO_INCREMENT,
  `quizid` int DEFAULT NULL,
  `questiontext` text NOT NULL,
  `option_a` varchar(100) NOT NULL,
  `option_b` varchar(100) NOT NULL,
  `option_c` varchar(100) NOT NULL,
  `option_d` varchar(100) NOT NULL,
  `correctanswer` varchar(1) NOT NULL,
  PRIMARY KEY (`question_id`),
  KEY `quizid` (`quizid`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `quizid`, `questiontext`, `option_a`, `option_b`, `option_c`, `option_d`, `correctanswer`) VALUES
(1, 6, 'asdg', 'sadg', 'sadg', 'sadg', 'sadg', 'b'),
(2, 9, 'asdg', 'sadg', 'sadg', 'sadg', 'sadg', 'b'),
(3, 10, 'asdg', 'sadg', 'sadg', 'sadg', 'sadg', 'b'),
(4, 10, 'sadg', 'fgnv', 'sadg', 'sadg', 'sadg', 'a'),
(5, 11, 'asdg', 'sadg', 'sadg', 'sadg', 'sadg', 'b'),
(6, 11, 'sadg', 'fgnv', 'sadg', 'sadg', 'sadg', 'a'),
(7, 12, 'asdg', 'sadg', 'sadg', 'sadg', 'sadg', 'b'),
(8, 13, 'asdg', 'sadg', 'sadg', 'mgfn', 'whater', 'b'),
(9, 14, 'asdg', 'sadg', 'sadg', 'mgfn', 'whater', 'b'),
(10, 15, 'asdg', 'try', 'try', 'try', 'try', 'b'),
(11, 16, 'asdg', 'try', 'try', 'try', 'try', 'b'),
(12, 17, 'asdg', 'try', 'try', 'try', 'try', 'b'),
(13, 18, 'asdg', 'try', 'try', 'try', 'try', 'b'),
(14, 22, 'htyh', 'odsfnl', 'kzxlnv', 'iyhvk', 'ikhgv', 'a'),
(15, 22, 'rsxfj', 'ytd', 'yhdx', 'yhdx', 'ykhdx', 'a'),
(16, 23, 'asdg', 'sadg', 'sadg', 'sadg', 'sadg', 'b'),
(17, 23, 'sadg', 'sadg', 'sadg', 'sadg', 'sadg', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

DROP TABLE IF EXISTS `quizzes`;
CREATE TABLE IF NOT EXISTS `quizzes` (
  `courseid` varchar(100) DEFAULT NULL,
  `quizid` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `duration` int NOT NULL,
  PRIMARY KEY (`quizid`),
  KEY `courseid` (`courseid`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`courseid`, `quizid`, `title`, `duration`) VALUES
(NULL, 1, 'helooooo', 1),
(NULL, 2, 'helooooo', 1),
(NULL, 3, 'helooooo', 1),
(NULL, 4, 'helooooo', 1),
(NULL, 5, 'helooooo', 1),
(NULL, 6, 'helooooo', 1),
(NULL, 7, 'qwe', 1),
(NULL, 8, 'qwe', 1),
('1', 9, 'qwe', 1),
('', 10, 'qwe', 2),
('', 11, 'qwe', 2),
('', 12, 'qwe', 2),
('', 13, 'qwe', 1),
('', 14, 'qwe', 1),
('', 15, 'alo', 2),
('', 16, 'alo', 2),
('', 17, 'alo', 2),
('', 18, 'alo', 2),
('', 19, '', 0),
('', 20, '', 0),
('', 21, '', 0),
('', 22, 'gftr', 2),
('', 23, 'title', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_responses`
--

DROP TABLE IF EXISTS `quiz_responses`;
CREATE TABLE IF NOT EXISTS `quiz_responses` (
  `quizid` int DEFAULT NULL,
  `questionid` int DEFAULT NULL,
  `susername` varchar(100) DEFAULT NULL,
  `selectedanswer` varchar(1) NOT NULL,
  KEY `susername` (`susername`),
  KEY `quizid` (`quizid`),
  KEY `questionid` (`questionid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `quiz_responses`
--

INSERT INTO `quiz_responses` (`quizid`, `questionid`, `susername`, `selectedanswer`) VALUES
(6, 0, NULL, 'C'),
(9, 2, NULL, 'B'),
(9, 2, NULL, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
