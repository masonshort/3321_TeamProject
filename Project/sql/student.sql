-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2020 at 07:31 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
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
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `loginid` int(8) NOT NULL,
  `accounttype` bit(1) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`loginid`, `accounttype`, `username`, `password`) VALUES
(1, b'1', 'admin', 'admin'),
(2, b'0', 'rkhan12', 'khantest'),
(3, b'0', 'knguyen61', 'stitch'),
(4, b'0', 'cwhitfield14', 'badpassword'),
(5, b'0', 'lemeka5', 'flower123'),
(6, b'0', 'ggonzales12', 'goodgame'),
(7, b'0', 'mmarkov3', 'pass!word'),
(8, b'0', 'pvarma8', '2cool4school'),
(9, b'0', 'jmeza10', 'sleepINclass'),
(10, b'0', 'testaccount', 'test'),
(11, b'1', 'mpatel0', '!pw4Prof');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `number` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `loginid` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`number`, `username`, `password`, `loginid`) VALUES
(1, 'admin', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseid` int(8) NOT NULL,
  `coursename` varchar(40) NOT NULL,
  `coursesubj` varchar(4) NOT NULL,
  `coursenum` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseid`, `coursename`, `coursesubj`, `coursenum`) VALUES
(1, 'Calculus 1', 'MATH', 1301),
(2, 'Calculus 2', 'MATH', 1302),
(3, 'English 1', 'ENGL', 1301),
(4, 'English 2', 'ENGL', 1302),
(5, 'United States History 1', 'HIST', 1376),
(6, 'United States History 2', 'HIST', 1377),
(7, 'Biology 1', 'BIOL', 1331),
(8, 'Biology 2', 'BIOL', 1332),
(9, 'Chemistry 1', 'CHEM', 1311),
(10, 'Chemistry 2', 'CHEM', 1312),
(12, 'Theory of Computation', 'CS', 3306),
(13, 'Data and Information Structure', 'CS', 3303),
(14, 'Software Engineering', 'CS', 3314),
(15, 'Operating Systems', 'CS', 4305),
(16, 'Database Systems', 'CS', 4307),
(17, 'Senior Project', 'CS', 4321),
(18, 'Computer Organization Intro', 'CS', 2311),
(19, 'Digital Logic', 'CS', 2312),
(20, 'Discrete Mathematics', 'CS', 2305),
(21, 'Linear Algebra', 'CS', 2306);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentid` int(6) NOT NULL,
  `loginid` int(8) NOT NULL,
  `name` varchar(100) NOT NULL,
  `rcourses` varchar(50) NOT NULL,
  `gpa` varchar(15) NOT NULL,
  `escore` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentid`, `loginid`, `name`, `rcourses`, `gpa`, `escore`, `image`) VALUES
(1000, 2, 'Rohan Khan', '3303. 3314, 4000', '3', 70, '2.jpg'),
(1001, 3, 'Kevin Nguyen', '3303,3306,4000', '4', 90, '6.png'),
(1002, 4, 'Claire Whitfield', '3303,3306,4000', '3', 80, '8.png'),
(1003, 5, 'Lulu Emeka', '4300,3314,3300', '2', 60, '3.jpg'),
(1004, 6, 'Gabriella Gonzales', '3303,3306,4000', '3', 90, '4.jpg'),
(1005, 7, 'Misha Markov', '3303,3306,4000', '4', 90, '5.png'),
(1006, 8, 'Puja Varma', '4300,3314,3300', '4', 80, '9.png'),
(1007, 9, 'Jose Meza', '3303,3306,4000', '3', 60, '1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `studentcourse`
--

CREATE TABLE `studentcourse` (
  `studentcourseid` int(8) NOT NULL,
  `studentid` int(6) NOT NULL,
  `courseid` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentcourse`
--

INSERT INTO `studentcourse` (`studentcourseid`, `studentid`, `courseid`) VALUES
(1, 1000, 15),
(2, 1000, 16),
(3, 1000, 17),
(4, 1006, 16),
(5, 1006, 14),
(6, 1006, 12),
(7, 1005, 1),
(8, 1005, 8),
(9, 1005, 18),
(10, 1003, 7),
(11, 1003, 9),
(12, 1003, 1),
(13, 1001, 17),
(14, 1001, 16),
(15, 1007, 20),
(16, 1007, 21),
(17, 1004, 13),
(18, 1004, 12),
(19, 1004, 18),
(20, 1004, 4),
(21, 1002, 3),
(22, 1002, 13),
(23, 1002, 5),
(24, 1006, 6);

-- --------------------------------------------------------

--
-- Table structure for table `studentgrade`
--

CREATE TABLE `studentgrade` (
  `gradeid` int(8) NOT NULL,
  `studentid` int(6) NOT NULL,
  `courseid` int(8) NOT NULL,
  `grade` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentgrade`
--

INSERT INTO `studentgrade` (`gradeid`, `studentid`, `courseid`, `grade`) VALUES
(1, 1002, 3, 100),
(2, 1002, 13, 78),
(3, 1002, 5, 90),
(4, 1004, 13, 76),
(5, 1000, 15, 83),
(6, 1000, 15, 69),
(7, 1000, 15, 76),
(8, 1000, 16, 94),
(9, 1000, 16, 88),
(10, 1000, 16, 85),
(11, 1000, 17, 85),
(12, 1000, 17, 89),
(13, 1000, 17, 85),
(14, 1001, 17, 94),
(15, 1001, 17, 83),
(16, 1001, 16, 85),
(17, 1001, 16, 78),
(18, 1001, 16, 84),
(19, 1004, 13, 86),
(20, 1004, 13, 77),
(21, 1004, 13, 71),
(22, 1004, 12, 78),
(23, 1004, 12, 81),
(24, 1004, 12, 85),
(25, 1004, 18, 85),
(26, 1004, 18, 86),
(27, 1004, 18, 79),
(28, 1007, 20, 75),
(29, 1007, 20, 86),
(30, 1007, 20, 80),
(31, 1007, 21, 80),
(32, 1007, 21, 79),
(33, 1007, 21, 80),
(34, 1003, 7, 89),
(35, 1003, 7, 76),
(36, 1003, 7, 91),
(37, 1003, 9, 94),
(38, 1003, 9, 73),
(39, 1003, 9, 73),
(40, 1003, 1, 83),
(41, 1003, 1, 87),
(42, 1003, 1, 83),
(43, 1005, 1, 91),
(44, 1005, 1, 84),
(45, 1005, 1, 91),
(46, 1005, 8, 84),
(47, 1005, 8, 68),
(48, 1005, 8, 85),
(49, 1005, 18, 68),
(50, 1005, 18, 66),
(51, 1005, 18, 86),
(52, 1006, 16, 76),
(53, 1006, 16, 85),
(54, 1006, 16, 85),
(55, 1006, 14, 84),
(56, 1006, 14, 69),
(57, 1006, 14, 83),
(58, 1006, 12, 83),
(59, 1006, 12, 72),
(60, 1006, 12, 91),
(61, 1002, 3, 89),
(62, 1002, 3, 78),
(63, 1002, 13, 86),
(64, 1002, 13, 88),
(65, 1002, 5, 92),
(66, 1002, 5, 77);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`loginid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`number`),
  ADD KEY `loginid` (`loginid`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentid`),
  ADD UNIQUE KEY `loginid` (`loginid`);

--
-- Indexes for table `studentcourse`
--
ALTER TABLE `studentcourse`
  ADD PRIMARY KEY (`studentcourseid`),
  ADD KEY `studentcourse_ibfk_1` (`studentid`),
  ADD KEY `courseid` (`courseid`);

--
-- Indexes for table `studentgrade`
--
ALTER TABLE `studentgrade`
  ADD PRIMARY KEY (`gradeid`),
  ADD KEY `studentid` (`studentid`),
  ADD KEY `studentgrade_ibfk_1` (`courseid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `loginid` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `courseid` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentid` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10001;

--
-- AUTO_INCREMENT for table `studentcourse`
--
ALTER TABLE `studentcourse`
  MODIFY `studentcourseid` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `studentgrade`
--
ALTER TABLE `studentgrade`
  MODIFY `gradeid` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`loginid`) REFERENCES `account` (`loginid`) ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`loginid`) REFERENCES `account` (`loginid`) ON UPDATE CASCADE;

--
-- Constraints for table `studentcourse`
--
ALTER TABLE `studentcourse`
  ADD CONSTRAINT `studentcourse_ibfk_1` FOREIGN KEY (`studentid`) REFERENCES `student` (`studentid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `studentcourse_ibfk_2` FOREIGN KEY (`courseid`) REFERENCES `course` (`courseid`) ON UPDATE CASCADE;

--
-- Constraints for table `studentgrade`
--
ALTER TABLE `studentgrade`
  ADD CONSTRAINT `studentgrade_ibfk_1` FOREIGN KEY (`courseid`) REFERENCES `course` (`courseid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `studentgrade_ibfk_2` FOREIGN KEY (`studentid`) REFERENCES `student` (`studentid`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
