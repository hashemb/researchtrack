-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2019 at 11:21 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `researchers`
--

-- --------------------------------------------------------

--
-- Table structure for table `authorship`
--

CREATE TABLE `authorship` (
  `resId` int(20) NOT NULL,
  `paperId` int(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `authorship`
--

INSERT INTO `authorship` (`resId`, `paperId`, `date`) VALUES
(1, 1, '2018-11-14'),
(1, 2, '2017-06-12'),
(5, 3, '2012-01-01'),
(9, 12, '2013-07-05'),
(11, 8, '2018-02-11'),
(6, 11, '2019-01-14'),
(4, 11, '2018-12-12'),
(12, 9, '2017-01-01'),
(2, 6, '2019-01-05'),
(10, 5, '2019-01-08');

-- --------------------------------------------------------

--
-- Table structure for table `institution`
--

CREATE TABLE `institution` (
  `country` varchar(20) COLLATE utf8_bin NOT NULL,
  `inaugYear` int(20) NOT NULL,
  `id` int(20) NOT NULL,
  `name` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `institution`
--

INSERT INTO `institution` (`country`, `inaugYear`, `id`, `name`) VALUES
('Lebanon', 1940, 1, 'AUB'),
('Lebanon', 1989, 2, 'LIU'),
('US', 1940, 3, 'Harvard'),
('UK', 1930, 4, 'Cambridge'),
('Syria', 1955, 5, 'Damascus Uni'),
('USA', 1920, 6, 'MIT'),
('Canada', 1972, 7, 'Toronto Uni.'),
('Jordan', 1996, 8, 'JIU'),
('Lebanon', 2000, 9, 'BAU'),
('Lebanon', 2001, 10, 'LAU');

-- --------------------------------------------------------

--
-- Table structure for table `paper`
--

CREATE TABLE `paper` (
  `id` int(20) NOT NULL,
  `title` varchar(999) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `paper`
--

INSERT INTO `paper` (`id`, `title`) VALUES
(1, 'Atoms'),
(2, 'Environment'),
(3, 'CS effect on Busines'),
(4, 'Algorithms Impact'),
(5, 'Data in MENA'),
(6, 'CS Observations'),
(7, 'AI Impact'),
(8, 'Security in the 20th'),
(9, 'Latest forecasting techniques'),
(10, 'Statistical Economic Analysis in the MENA Region'),
(11, 'Big-data ethics'),
(12, 'Neural Networks Limitations'),
(13, 'IT World'),
(14, 'IT World'),
(15, 'IT World');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `instId` int(20) NOT NULL,
  `resId` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `posName` varchar(90) COLLATE utf8_bin NOT NULL DEFAULT 'Researcher'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`instId`, `resId`, `startDate`, `endDate`, `posName`) VALUES
(1, 1, '2017-10-17', '2019-10-10', 'Researcher'),
(10, 10, '2018-10-09', '2020-01-01', 'Researcher'),
(6, 7, '2017-01-01', '2019-01-20', 'Researcher'),
(5, 9, '2016-01-01', '2019-01-30', 'Researcher'),
(7, 3, '2018-01-01', '2019-02-01', 'Researcher'),
(3, 11, '2018-12-06', '2021-01-01', 'Researcher'),
(7, 4, '2010-10-19', '2022-01-01', 'Researcher'),
(4, 12, '2018-11-24', '2020-11-24', 'Researcher'),
(5, 8, '2017-11-11', '2018-05-01', 'Researcher'),
(8, 1, '2016-01-01', '0000-00-00', 'Researcher');

-- --------------------------------------------------------

--
-- Table structure for table `researcher`
--

CREATE TABLE `researcher` (
  `id` int(20) NOT NULL,
  `fname` varchar(20) COLLATE utf8_bin NOT NULL,
  `lname` varchar(20) COLLATE utf8_bin NOT NULL,
  `YOB` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `researcher`
--

INSERT INTO `researcher` (`id`, `fname`, `lname`, `YOB`) VALUES
(1, 'Ihab', 'Agha', '1988-05-01'),
(2, 'Mahmood', 'Samad', '1970-01-01'),
(3, 'Jordan', 'Peterson', '1970-01-01'),
(4, 'Wassim', 'Masri', '1980-01-01'),
(5, 'Hamza', 'Al-Jundi', '1999-01-01'),
(6, 'Joe', 'Doe', '1977-01-01'),
(7, 'Jones', 'Smith', '1960-01-01'),
(8, 'Ahmad', 'Ahdab', '1971-01-01'),
(9, 'Mohamad', 'Kial', '1998-01-01'),
(10, 'Robert', 'Smith', '1970-01-01'),
(11, 'Hasan', 'Nabulsi', '1993-01-01'),
(12, 'Carla', 'Ramia', '1997-01-01'),
(13, 'Abraham', 'Housni', '1988-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) COLLATE utf8_bin NOT NULL,
  `password` varchar(20) COLLATE utf8_bin NOT NULL,
  `fname` varchar(20) COLLATE utf8_bin NOT NULL,
  `roleId` int(2) NOT NULL,
  `lname` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `fname`, `roleId`, `lname`) VALUES
('admin1', '0000', 'Ahmad', 1, 'Mouhsin'),
('ahmad9', '0000', 'Ahmad', 2, 'Rifai'),
('ajam666', '0000', 'Mohammad', 2, 'Fattal'),
('carla001', '0000', 'Carla', 2, 'Ramia'),
('hashem', '0000', 'Hashem', 1, 'Bulbol'),
('khaled', '0000', 'Khaled', 2, 'Bulbol'),
('mm', '123', 'M', 1, 'S'),
('nezar', '0000', 'Nezar', 2, 'Bulbol'),
('tammam111', '0000', 'Tammam', 2, 'Al-Sibai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authorship`
--
ALTER TABLE `authorship`
  ADD KEY `resId` (`resId`),
  ADD KEY `paperId` (`paperId`);

--
-- Indexes for table `institution`
--
ALTER TABLE `institution`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `paper`
--
ALTER TABLE `paper`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD KEY `resId` (`resId`),
  ADD KEY `instId` (`instId`);

--
-- Indexes for table `researcher`
--
ALTER TABLE `researcher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `institution`
--
ALTER TABLE `institution`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `paper`
--
ALTER TABLE `paper`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `researcher`
--
ALTER TABLE `researcher`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authorship`
--
ALTER TABLE `authorship`
  ADD CONSTRAINT `authorship_ibfk_1` FOREIGN KEY (`paperId`) REFERENCES `paper` (`id`),
  ADD CONSTRAINT `authorship_ibfk_2` FOREIGN KEY (`resId`) REFERENCES `researcher` (`id`);

--
-- Constraints for table `position`
--
ALTER TABLE `position`
  ADD CONSTRAINT `position_ibfk_2` FOREIGN KEY (`resId`) REFERENCES `researcher` (`id`),
  ADD CONSTRAINT `position_ibfk_3` FOREIGN KEY (`instId`) REFERENCES `institution` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
