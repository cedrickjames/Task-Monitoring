-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2022 at 07:36 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `misdevmonitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(50) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `userid`, `name`) VALUES
(1, '11', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` int(11) NOT NULL,
  `CategoryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `CategoryName`) VALUES
(0, 'Others'),
(1, 'Network'),
(2, 'Server'),
(3, 'VM'),
(4, 'Storage'),
(5, 'Building Facilities Inspection'),
(6, 'Equipment'),
(7, 'Billing'),
(8, 'Routine Inspection'),
(10, 'Annual Maintenance'),
(11, 'Certification'),
(12, 'Peza Compliance'),
(17, 'sample'),
(18, 'ksjdfgkjdfhkjf'),
(19, 'sdgferg');

-- --------------------------------------------------------

--
-- Table structure for table `finishedtask`
--

CREATE TABLE `finishedtask` (
  `FinishedTaskID` int(50) NOT NULL,
  `sameID` varchar(100) NOT NULL,
  `taskID` int(50) NOT NULL,
  `Date` varchar(50) NOT NULL,
  `DateSubmitted` date DEFAULT NULL,
  `timestamp` varchar(50) NOT NULL,
  `task_Name` varchar(50) NOT NULL,
  `in_charge` varchar(50) NOT NULL,
  `sched_Type` varchar(50) NOT NULL,
  `month` varchar(50) NOT NULL,
  `firstDateOfTheMonth` date DEFAULT NULL,
  `week` varchar(50) NOT NULL,
  `weekNumber` int(10) NOT NULL,
  `lastMonday` date DEFAULT NULL,
  `attachments` varchar(100) NOT NULL,
  `year` varchar(10) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `noOfDaysLate` int(10) NOT NULL,
  `reason` longtext NOT NULL,
  `action` varchar(100) NOT NULL,
  `realDate` date DEFAULT current_timestamp(),
  `score` float NOT NULL,
  `isCheckedByLeader` tinyint(10) NOT NULL,
  `isLate` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `finishedtask`
--

INSERT INTO `finishedtask` (`FinishedTaskID`, `sameID`, `taskID`, `Date`, `DateSubmitted`, `timestamp`, `task_Name`, `in_charge`, `sched_Type`, `month`, `firstDateOfTheMonth`, `week`, `weekNumber`, `lastMonday`, `attachments`, `year`, `Department`, `noOfDaysLate`, `reason`, `action`, `realDate`, `score`, `isCheckedByLeader`, `isLate`) VALUES
(1314, '27001222022-09-01asf', 270, ' 2022-09-01', '2022-09-01', '01:22 pm', 'qawe', 'GP-22-722', 'daily', 'September', NULL, 'week 35', 0, NULL, '', '2022', 'MIS', 0, '', 'asf', '2022-09-01', 1, 0, 0),
(1315, '27601-332022-09-01sadf', 276, ' 2022-09-01', '2022-09-01', '01:33 pm', 'asdf', 'GP-22-722', 'weekly', 'September', NULL, 'week 35', 35, '2022-08-29', '', '2022', 'MIS', 0, '', 'sadf', '2022-09-01', 1, 0, 0),
(1316, '29501332022-09-01asd', 295, ' 2022-09-01', '2022-09-01', '01:33 pm', '3', 'GP-22-722', 'monthly', 'September', '2022-09-01', 'week 35', 0, NULL, '', '2022', 'MIS', 0, '', 'asd', '2022-09-01', 1, 0, 0),
(1317, '2960133asdf', 296, ' 2022-09-01', NULL, '01:33 pm', '4', 'GP-22-722', 'annual', 'September', '2022-09-01', 'week 35', 0, NULL, '', '2022', 'MIS', 0, '', 'asdf', '2022-09-01', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `holidayId` int(100) NOT NULL,
  `dateOfHoliday` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`holidayId`, `dateOfHoliday`) VALUES
(1, '2022-04-14'),
(2, '2022-04-15'),
(3, '2022-04-14'),
(4, '2022-04-14'),
(5, '2022-04-14'),
(6, '2022-05-09'),
(7, '2022-08-17'),
(8, '2022-10-31'),
(9, '2022-11-01'),
(10, '2022-11-30'),
(11, '2022-12-08'),
(12, '2022-12-23'),
(13, '2022-12-26'),
(14, '2022-12-27'),
(15, '2022-12-28'),
(16, '2022-12-29'),
(17, '2022-12-30'),
(18, '2023-01-01'),
(19, '2023-01-02'),
(20, '2023-01-03'),
(21, '2022-08-15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `userpass` varchar(50) NOT NULL,
  `conpass` varchar(50) NOT NULL,
  `userlevel` varchar(50) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `m_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `userpass`, `conpass`, `userlevel`, `f_name`, `m_name`, `l_name`, `department`) VALUES
(6, 'GP-11-306', 'GP-11-306', 'GP-11-306', 'Leader', 'Nathan', '', 'Nemedez', 'MIS'),
(7, 'GP-22-722', 'GP-22-722', 'GP-22-722', 'PIC', 'Cedrick James', 'M', 'Orozo', 'MIS'),
(11, 'admin', 'admin', 'admin', 'Admin', 'Nathan', '', 'Nemedez', 'Admin'),
(22, 'GP-22-729', 'GP-22-729', 'GP-22-729', 'PIC', 'Kevin', '', 'Marero', 'MIS'),
(23, 'GP-17-571', 'GP-17-571', 'GP-17-571', 'PIC', 'Felmhar', '', 'Vivo', 'MIS'),
(24, 'GP-22-718', 'GP-22-718', 'GP-22-718', 'PIC', 'Antonio', '', 'Negrite', 'FEM'),
(28, 'GP-16-478', 'GP-16-478', 'GP-16-478', 'Leader', 'John Carlo', '', 'Siera', 'FEM'),
(31, 'GP-12-356', 'GP-12-356', 'GP-12-356', 'Leader', 'Francisco', '', 'Ramirez', 'FEM'),
(32, 'GP-18-614', 'GP-18-614', 'GP-18-614', 'PIC', 'Tricy Ann', '', 'Escamillas', 'FEM'),
(33, 'GP-22-730', 'GP-22-730', 'GP-22-730', 'PIC', 'Ralph Gabriel', '', 'Parma', 'FEM'),
(34, 'GP-11-301', 'GP-11-301', 'GP-11-301', 'PIC', 'Roel', '', 'Magat', 'FEM'),
(35, 'GP-17-516', 'GP-17-516', 'GP-17-516', 'PIC', 'Jonathan', '', 'Natuel', 'FEM');

-- --------------------------------------------------------

--
-- Table structure for table `usertask`
--

CREATE TABLE `usertask` (
  `userid` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `taskName` varchar(50) NOT NULL,
  `taskCategory` varchar(50) NOT NULL,
  `taskArea` varchar(10) NOT NULL,
  `taskType` varchar(50) NOT NULL,
  `usertaskID` int(50) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `dateStarted` date DEFAULT NULL,
  `dateAdded` varchar(10) NOT NULL,
  `targetDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertask`
--

INSERT INTO `usertask` (`userid`, `username`, `taskName`, `taskCategory`, `taskArea`, `taskType`, `usertaskID`, `Department`, `dateStarted`, `dateAdded`, `targetDate`) VALUES
(7, 'GP-22-722', 'qawe', 'Certification', 'All', 'daily', 270, 'MIS', '2022-09-01', '2022-09-01', '2023-03-31'),
(7, 'GP-22-722', 'gyu', 'Certification', 'GPI 3', 'monthly', 273, 'MIS', '2022-08-06', '2022-09-06', '2023-03-31'),
(7, 'GP-22-722', 'awd', 'Annual Maintenance', 'GPI 3', 'annual', 274, 'MIS', '2021-09-05', '2022-09-05', '2023-03-31'),
(7, 'GP-22-722', 'ase', 'Annual Maintenance', 'GPI 2', 'daily', 275, 'MIS', '2022-09-04', '2022-09-05', '2023-03-31'),
(7, 'GP-22-722', 'asdf', 'Annual Maintenance', 'GPI 4', 'weekly', 276, 'MIS', '2022-09-01', '2022-09-05', '2023-03-31'),
(7, 'GP-22-722', 'fqwer', 'Annual Maintenance', 'GPI 5', 'monthly', 277, 'MIS', '2022-08-05', '2022-09-05', '2023-03-31'),
(7, 'GP-22-722', 'qwer', 'Billing', 'GPI 5', 'annual', 278, 'MIS', '2021-09-05', '2022-09-05', '2023-03-31'),
(7, 'GP-22-722', 'a', 'Equipment', 'GPI 2', 'daily', 290, 'MIS', '2022-09-04', '2022-09-05', '2023-03-31'),
(7, 'GP-22-722', 'b', 'Building Facilities Inspection', 'GPI 1', 'weekly', 291, 'MIS', '2022-09-05', '2022-09-12', '2023-03-31'),
(7, 'GP-22-722', 'c', 'VM', 'GPI 2', 'monthly', 292, 'MIS', '2022-08-19', '2022-09-19', '2023-03-31'),
(7, 'GP-22-722', '1', 'Others', 'All', 'daily', 293, 'MIS', '2022-09-04', '2022-09-05', '2022-11-01'),
(7, 'GP-22-722', '2', 'Network', 'GPI 1', 'weekly', 294, 'MIS', '2022-09-05', '2022-09-12', '2022-12-28'),
(7, 'GP-22-722', '3', 'Server', 'GPI 2', 'monthly', 295, 'MIS', '2022-09-01', '2022-09-19', '2023-03-09'),
(7, 'GP-22-722', '4', 'Others', 'GPI 4', 'annual', 296, 'MIS', '2022-09-01', '2022-09-26', '2023-03-31'),
(23, 'GP-17-571', 'fasdf', 'Others', 'GPI 1', 'daily', 297, 'MIS', '2022-09-07', '2022-09-08', '2023-03-31'),
(23, 'GP-17-571', 'asdf', 'Certification', 'GPI 1', 'weekly', 298, 'MIS', '2022-08-22', '2022-09-02', '2023-03-16'),
(32, 'GP-18-614', 'a', 'Others', 'All', 'daily', 304, 'FEM', '2022-08-31', '2022-09-01', '2023-03-24'),
(32, 'GP-18-614', 'b', 'Network', 'GPI 1', 'weekly', 305, 'FEM', '2022-08-29', '2022-09-08', '2023-03-17'),
(32, 'GP-18-614', 'c', 'Server', 'GPI 1', 'monthly', 306, 'FEM', '2022-08-22', '2022-09-22', '2023-03-10'),
(32, 'GP-18-614', 'd', 'Storage', 'GPI 1', 'annual', 307, 'FEM', '2021-09-29', '2022-09-29', '2023-03-03'),
(7, 'GP-22-722', 'samp', 'Network', 'GPI 1', 'monthly', 308, 'MIS', '2022-10-01', '2022-11-01', '2023-03-31'),
(7, 'GP-22-722', 'asd', 'Others', 'All', 'daily', 309, 'MIS', '2022-09-08', '2022-09-09', '2023-03-31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `finishedtask`
--
ALTER TABLE `finishedtask`
  ADD PRIMARY KEY (`FinishedTaskID`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`holidayId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `usertask`
--
ALTER TABLE `usertask`
  ADD PRIMARY KEY (`usertaskID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `finishedtask`
--
ALTER TABLE `finishedtask`
  MODIFY `FinishedTaskID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1318;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `holidayId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `usertask`
--
ALTER TABLE `usertask`
  MODIFY `usertaskID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=310;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
