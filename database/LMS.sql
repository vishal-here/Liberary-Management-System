-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 12, 2022 at 03:24 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `LMS`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `BookId` int(10) NOT NULL,
  `Title` varchar(50) DEFAULT NULL,
  `Authors` varchar(200) NOT NULL,
  `Publisher` varchar(100) DEFAULT NULL,
  `Year` varchar(50) DEFAULT NULL,
  `Availability` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`BookId`, `Title`, `Authors`, `Publisher`, `Year`, `Availability`) VALUES
(1, 'Operating System', 'Khurana Rohit , Abraham Silberschatz', 'PEARSON', '2006', 0),
(2, 'DBMS', 'Rajiv Chopra , Raghu Ramakrishnan, and Johannes Gehrke', 'LDS Marketing', '2010', 1),
(3, 'TOC', 'Alan Turing', 'Pearson', '2010', 4),
(4, 'Artificial Intelligence', 'Melanie Mitchell', 'Farrar and Macmillan (US) Pelican Books (UK)', '2019', 1),
(5, 'DAA', 'Thomas H. Cormen, Charles E. Leiserson, Ronald L. Rivest and Clifford Stein', ' Pearson', '2022', 0),
(6, 'DSA', ' Clifford Stein', 'P.H.I', '2020', 3),
(7, 'Engineering Economics', 'Panneerselvam R', 'VTU students', '2022', 10),
(8, 'Computer Networks', 'Behrouz A. Forouzan and Richard F. Gilberg', 'JNTU', '2013', 12),
(9, 'Computer Organization and Architecture', 'William Stallings', 'Pearson', '2015', 4),
(10, 'C: How to program', ' Brian Kernighan  and  Dennis Ritchie', 'Prentice Hall', '2009', 0),
(11, 'Java', 'Joshua Bloch', 'Pearson India ', '2017', 13),
(12, 'C++ for Beginner', ' Stanley B. Lippman, Josée Lajoie, and Barbara E. Moo', 'Stinson', '2022', 12),
(13, 'Engineering Physics', 'Hitendra K. Malik', 'Pearson India ', '2019', 4),
(14, 'Engineering Chemistry', 'S. S. Dara', 'Pearson', '2017', 9),
(15, 'Wings of Fire', ' Dr. A. P. J. Abdul Kalam', 'vidyapeeth', '2005', 4),
(19, 'Rich Dad Poor Dad', 'Robert Keyosaki', 'LDS Marketing', '2000', 5);

-- --------------------------------------------------------

--
-- Table structure for table `new_book_requests`
--

CREATE TABLE `new_book_requests` (
  `recommendation_id` int(100) NOT NULL,
  `Book_Name` varchar(50) DEFAULT NULL,
  `Authors` varchar(255) DEFAULT NULL,
  `RollNo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `new_book_requests`
--

INSERT INTO `new_book_requests` (`recommendation_id`, `Book_Name`, `Authors`, `RollNo`) VALUES
(1, 'Rich Dad Poor Dad', ' Robert Keyosaki', 'B200060CS');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `RollNo` varchar(50) NOT NULL,
  `BookId` int(10) NOT NULL,
  `Date_of_Issue` date DEFAULT NULL,
  `Due_Date` date DEFAULT NULL,
  `Date_of_Return` date DEFAULT NULL,
  `Dues` int(10) DEFAULT 0,
  `Renewals_left` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`RollNo`, `BookId`, `Date_of_Issue`, `Due_Date`, `Date_of_Return`, `Dues`, `Renewals_left`) VALUES
('B200060CS', 2, NULL, NULL, NULL, 0, NULL),
('B200060CS', 7, '2022-06-10', '2022-07-10', NULL, 306, 1),
('B200062CS', 6, '2022-10-02', '2022-10-12', NULL, 118, 1),
('B200062CS', 13, '2022-10-02', '2022-10-12', NULL, 118, 1);

-- --------------------------------------------------------

--
-- Table structure for table `renew`
--

CREATE TABLE `renew` (
  `RollNo` varchar(50) NOT NULL,
  `BookId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `return`
--

CREATE TABLE `return` (
  `RollNo` varchar(50) NOT NULL,
  `BookId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `RollNo` varchar(50) CHARACTER SET latin1 NOT NULL,
  `EmailId` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Password` varchar(50) CHARACTER SET latin1 NOT NULL,
  `MobNo` bigint(10) NOT NULL,
  `Type` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Name`, `RollNo`, `EmailId`, `Password`, `MobNo`, `Type`) VALUES
('Harsh', 'B200035CS', 'b200035@nitsikkim.ac.in', 'b200035', 7894561230, 'Student'),
('Vishal', 'B200059CS', 'b2000059@nitsikkim.ac.in', 'admin', 9608851340, 'admin'),
('Manish', 'B200060CS', 'b200060@nitsikkim.ac.in', 'b200060', 9876543210, 'Student'),
('Ujjwal', 'B200062CS', 'b200062@nitsikkim.ac.in', 'b200062', 9123456780, 'Student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`BookId`);

--
-- Indexes for table `new_book_requests`
--
ALTER TABLE `new_book_requests`
  ADD PRIMARY KEY (`recommendation_id`),
  ADD KEY `RollNo` (`RollNo`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`RollNo`,`BookId`),
  ADD KEY `BookId` (`BookId`);

--
-- Indexes for table `renew`
--
ALTER TABLE `renew`
  ADD PRIMARY KEY (`RollNo`,`BookId`),
  ADD KEY `BookId` (`BookId`);

--
-- Indexes for table `return`
--
ALTER TABLE `return`
  ADD PRIMARY KEY (`RollNo`,`BookId`),
  ADD KEY `BookId` (`BookId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`RollNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `BookId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `new_book_requests`
--
ALTER TABLE `new_book_requests`
  MODIFY `recommendation_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
