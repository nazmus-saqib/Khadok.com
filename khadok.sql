-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2017 at 11:38 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khadok`
--

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `Umail` varchar(55) NOT NULL,
  `OrderID` int(65) NOT NULL,
  `ItemCode` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`Umail`, `OrderID`, `ItemCode`) VALUES
('sks@gmail.com', 442533, '3-44');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `Rid` int(5) NOT NULL,
  `Fid` int(5) NOT NULL,
  `Fname` varchar(15) NOT NULL,
  `Price` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`Rid`, `Fid`, `Fname`, `Price`) VALUES
(1, 11, 'Bhat+dal+Mach', 120),
(1, 22, 'Biriyani', 220),
(1, 33, 'Pizza', 450),
(1, 44, 'Burger', 120),
(1, 55, 'Shwarma', 79),
(2, 11, 'Bhat+Dal+Mach', 199),
(2, 22, 'Biriyani', 130),
(2, 55, 'Shwarma', 85),
(3, 11, 'Bhat+Dal+Mach', 100),
(3, 22, 'Biriyani', 110),
(3, 33, 'Pizza', 450),
(3, 44, 'Burger', 220),
(3, 55, 'Shwarma', 94),
(4, 33, 'Pizza', 550),
(4, 44, 'Burger', 120),
(4, 55, 'Shwarma', 78),
(5, 11, 'Bhat+Dal+Mach', 99),
(5, 22, 'Biriyani', 110),
(5, 33, 'Pizza', 300),
(5, 44, 'Burger', 65),
(5, 55, 'Shwarma', 65);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `Location` varchar(55) NOT NULL,
  `Rid` int(5) NOT NULL,
  `Rname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`Location`, `Rid`, `Rname`) VALUES
('Ghatpar ', 1, 'Gaogram'),
('Basundhara Gate', 2, 'Petuk'),
('Ghatpar ', 3, 'Saladia!!'),
('Apollo', 4, 'Kamrai!!'),
('Apollo', 5, 'khabi ki??');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `sl` int(15) NOT NULL,
  `Fid` int(10) NOT NULL,
  `Rid` int(15) NOT NULL,
  `Ratings` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`sl`, `Fid`, `Rid`, `Ratings`) VALUES
(2, 33, 3, 5),
(3, 22, 3, 5),
(4, 11, 3, 4),
(5, 33, 3, 1),
(6, 44, 4, 5),
(7, 11, 2, 2),
(8, 11, 1, 4),
(9, 44, 5, 3),
(10, 11, 3, 2),
(11, 11, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UName` varchar(25) NOT NULL,
  `Uadd` varchar(50) NOT NULL,
  `UPhone` varchar(15) NOT NULL,
  `Umail` varchar(30) NOT NULL,
  `Upass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UName`, `Uadd`, `UPhone`, `Umail`, `Upass`) VALUES
('Shadhin ', 'Mohakhali', '1770022042', 'sks@gmail.com', 'sks');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`Rid`,`Fid`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`Rid`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`sl`),
  ADD KEY `Rid` (`Rid`,`Fid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Umail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `Rid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `sl` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `food_ibfk_1` FOREIGN KEY (`Rid`) REFERENCES `restaurant` (`Rid`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`Rid`,`Fid`) REFERENCES `food` (`Rid`, `Fid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
