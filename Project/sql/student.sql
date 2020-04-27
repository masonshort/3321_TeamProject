-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2020 at 08:55 AM
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
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentid` int(6) NOT NULL,
  `loginid` int(8) NOT NULL,
  `name` varchar(100) NOT NULL,
  `rcourses` varchar(50) NOT NULL,
  `gpa` decimal(4,3) NOT NULL,
  `escore` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentid`, `loginid`, `name`, `rcourses`, `gpa`, `escore`, `image`) VALUES
(1000, 2, 'Rohan Khan', '3303. 3314, 4000', '3.000', 70, '2.jpg'),
(1001, 3, 'Kevin Nguyen', '3303,3306,4000', '3.000', 90, '6.png'),
(1002, 4, 'Claire Whitfield', '3303,3306,4000', '3.667', 80, '8.png'),
(1003, 5, 'Lulu Emeka', '4300,3314,3300', '3.333', 60, '3.jpg'),
(1004, 6, 'Gabriella Gonzales', '3303,3306,4000', '2.750', 90, '4.jpg'),
(1005, 7, 'Misha Markov', '3303,3306,4000', '2.333', 90, '5.png'),
(1006, 8, 'Puja Varma', '4300,3314,3300', '2.500', 80, '9.png'),
(1007, 9, 'Jose Meza', '3303,3306,4000', '3.000', 60, '1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentid`),
  ADD UNIQUE KEY `loginid` (`loginid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentid` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10001;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`loginid`) REFERENCES `account` (`loginid`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
