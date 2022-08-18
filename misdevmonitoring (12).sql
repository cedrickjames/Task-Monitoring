-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220629.14f90d77f8
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2022 at 08:13 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

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
(1, '11', 'admin'),
(7, '26', 'admincedrick');

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
(12, 'Peza Compliance');

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
(518, '', 54, ' July 1, 2022', '2022-07-01', '07:32 am', 'Canteen Billing', 'cedrick', 'daily', 'July', NULL, 'week 27', 27, NULL, '', '2022', 'MIS', 0, '', '', '2022-07-01', 0, 1, 0),
(519, '', 191, ' July 2, 2022', '2022-07-02', '09:54 am', 'Task Sample', 'cedrick', 'daily', 'July', NULL, 'week 27', 27, NULL, '', '2022', 'MIS', 10, 'asdas', '', '2022-07-02', 0, 0, 1),
(520, '', 192, ' July 3, 2022', '2022-07-03', '09:54 am', 'Formatting computer', 'cedrick', 'daily', 'July', NULL, 'week 27', 27, NULL, '', '2022', 'MIS', 7, 'asdasd', '', '2022-07-03', 0, 0, 1),
(535, '', 192, ' July 8, 2022', '2022-07-08', '01:14 pm', 'Formatting computer', 'cedrick', 'daily', 'July', NULL, 'week 27', 0, NULL, '', '2022', 'MIS', 0, '', '', '2022-07-08', 0, 0, 0),
(542, '', 30, ' July 8, 2022', '2022-07-08', '02:06 pm', 'Storage  16TB- Primary Back up (server room)', 'cedrick', 'weekly', 'July', NULL, 'week 27', 0, '2022-07-04', '', '2022', 'MIS', 0, '', '', '2022-07-08', 0, 0, 0),
(548, '', 191, ' July 8, 2022', '2022-07-08', '02:34 pm', 'Task Sample', 'cedrick', 'daily', 'July', NULL, 'week 27', 0, '2022-07-04', '', '2022', 'MIS', 5, '', '', '2022-07-08', 0, 1, 1),
(565, '', 191, ' July 11, 2022', '2022-07-04', '11:09 am', 'Task Sample', 'cedrick', 'daily', 'July', NULL, 'week 28', 0, '2022-07-11', '', '2022', 'MIS', 2, 'wala lang ulit', '', '2022-07-11', 0, 0, 1),
(572, '', 192, ' July 11, 2022', '2022-07-11', '02:25 pm', 'Formatting computer', 'cedrick', 'daily', 'July', NULL, 'week 28', 0, '2022-07-04', '', '2022', 'MIS', 0, '', '', '2022-07-11', 0, 0, 0),
(573, '', 54, ' July 11, 2022', '2022-07-11', '04:19 am', 'Canteen Billing', 'cedrick', 'daily', 'July', NULL, 'week 28', 0, '2022-07-04', '', '2022', 'MIS', -2, '', '', '2022-07-11', 0, 0, 0),
(574, '', 54, ' July 12, 2022', '2022-07-12', '04:26 am', 'Canteen Billing', 'cedrick', 'daily', 'July', NULL, 'week 28', 0, '2022-07-04', '', '2022', 'MIS', -1, '', '', '2022-07-12', 0, 0, 0),
(575, '', 192, ' July 13, 2022', '2022-07-13', '03:32 pm', 'Formatting computer', 'cedrick', 'daily', 'July', NULL, 'week 28', 0, NULL, '', '2022', 'MIS', -1, '', '', '2022-07-13', 0, 0, 0),
(577, '', 54, ' July 14, 2022', '2022-07-14', '02:36 pm', 'Canteen Billing', 'cedrick', 'daily', 'July', NULL, 'week 28', 0, NULL, '', '2022', 'MIS', -2, 'asdasd', '', '2022-07-14', 0, 0, 0),
(580, '', 30, ' July 21, 2022', NULL, '03:08 pm', 'Storage  16TB- Primary Back up (server room)', 'cedrick', 'weekly', 'July', NULL, 'week 28', 0, '2022-07-04', '', '2022', 'MIS', 5, '', 'magandang\naraw', '2022-07-14', 0, 1, 0),
(583, '', 53, ' July 14, 2022', NULL, '03:26 pm', 'VM MIS System', 'cedrick', 'weekly', 'July', NULL, 'week 28', 0, '2022-07-04', './uploaded_files/48c06d30d0e8943115dd36bde0b941c0.pdf', '2022', 'MIS', 0, 'magandang\naraw', 'The quick\nbrown fox\njumps\nover \n', '2022-07-14', 0, 1, 0),
(587, '', 54, ' July 18, 2022', '2022-07-18', '11:06 am', 'Canteen Billing', 'cedrick', 'daily', 'July', NULL, 'week 29', 0, NULL, '', '2022', 'MIS', 1, '', 'oraytsdf', '2022-07-18', 0, 0, 0),
(603, '', 30, ' July 19, 2022', '2022-07-19', '02:24 pm', 'Storage  16TB- Primary Back up (server room)', 'cedrick', 'weekly', 'July', NULL, 'week 29', 0, '2022-07-04', '', '2022', 'MIS', 0, '', 'sample action d', '2022-07-19', 1, 0, 0),
(606, '', 53, ' July 19, 2022', '2022-07-19', '02:26 pm', 'VM MIS System', 'cedrick', 'weekly', 'July', NULL, 'week 29', 0, '2022-07-04', '', '2022', 'MIS', 0, '', 'etodsd', '2022-07-19', 1, 0, 0),
(607, '', 54, ' July 19, 2022', '2022-07-19', '02:26 pm', 'Canteen Billing', 'cedrick', 'daily', 'July', NULL, 'week 29', 0, NULL, '', '2022', 'MIS', -1, '', 'my family', '2022-07-19', 1, 0, 0),
(608, '', 191, ' July 19, 2022', '2022-07-19', '02:39 pm', 'Task Sample', 'cedrick', 'daily', 'July', NULL, 'week 29', 0, NULL, '', '2022', 'MIS', -1, '', 'zsdfg', '2022-07-19', 1, 0, 0),
(610, '', 54, ' July 20, 2022', '2022-07-21', '07:47 am', 'Canteen Billing', 'cedrick', 'daily', 'July', NULL, 'week 29', 0, NULL, '', '2022', 'MIS', 0, '', 'orayt12312', '2022-07-20', 1, 1, 0),
(611, '', 54, ' July 21, 2022', '2022-07-21', '03:57 pm', 'Canteen Billing', 'cedrick', 'daily', 'July', NULL, 'week 29', 0, NULL, '', '2022', 'MIS', 0, '', ' n vnv', '2022-07-21', 1, 0, 0),
(617, '', 54, ' July 23, 2022', '2022-07-27', '12:43 pm', 'Canteen Billing', 'cedrick', 'daily', 'July', NULL, 'week 29', 0, NULL, '', '2022', 'MIS', 0, '', 'sdvsd', '2022-07-23', 1, 0, 0),
(619, '', 192, ' July 23, 2022', '2022-07-23', '12:44 pm', 'Formatting computer', 'cedrick', 'daily', 'July', NULL, 'week 29', 0, NULL, '', '2022', 'MIS', 2, 'sdvsd', 'sdsd', '2022-07-23', 0.5, 0, 1),
(672, '', 34, ' July 26, 2022', NULL, '02:05 pm', 'DMS- Server (backup and functionality)', 'cedrick', 'weekly', 'July', NULL, 'week 27', 0, '2022-07-04', '', '2022', 'MIS', 22, 'asdsds', 'asdasda', '2022-07-26', 0, 0, 0),
(673, '', 34, ' July 26, 2022', '2022-07-27', '02:05 pm', 'DMS- Server (backup and functionality)', 'cedrick', 'weekly', 'July', NULL, 'week 28', 0, '2022-07-11', '', '2022', 'MIS', 22, 'asdsds', 'asdasda', '2022-07-26', 0, 0, 0),
(674, '', 34, ' July 26, 2022', '2022-07-27', '02:05 pm', 'DMS- Server (backup and functionality)', 'cedrick', 'weekly', 'July', NULL, 'week 29', 29, '2022-07-18', '', '2022', 'MIS', 22, 'asdsds', 'asdasda', '2022-07-26', 0.5, 0, 0),
(675, '', 34, ' July 26, 2022', '2022-07-26', '02:05 pm', 'DMS- Server (backup and functionality)', 'cedrick', 'weekly', 'July', NULL, 'week 30', 30, '2022-07-25', '', '2022', 'MIS', 22, 'asdsds', 'asdasda', '2022-07-26', 1, 0, 0),
(839, '', 191, ' July 20, 2022', '2022-07-27', '01:23 pm', 'Task Sample', 'cedrick', 'daily', 'July', NULL, 'week 29', 0, NULL, '', '2022', 'MIS', 5, 'ASD', 'ASD', '2022-07-20', 0, 0, 1),
(840, '', 191, ' July 21, 2022', '2022-07-27', '01:23 pm', 'Task Sample', 'cedrick', 'daily', 'July', NULL, 'week 29', 0, NULL, '', '2022', 'MIS', 4, 'ASD', 'ASD', '2022-07-21', 0, 0, 1),
(841, '', 191, ' July 22, 2022', '2022-07-27', '01:23 pm', 'Task Sample', 'cedrick', 'daily', 'July', NULL, 'week 29', 0, NULL, '', '2022', 'MIS', 3, 'ASD', 'ASD', '2022-07-22', 0, 0, 1),
(842, '', 191, ' July 25, 2022', '2022-07-27', '01:23 pm', 'Task Sample', 'cedrick', 'daily', 'July', NULL, 'week 30', 0, NULL, '', '2022', 'MIS', 2, 'ASD', 'ASD', '2022-07-25', 0, 0, 1),
(843, '', 191, ' July 26, 2022', '2022-07-27', '01:23 pm', 'Task Sample', 'cedrick', 'daily', 'July', NULL, 'week 30', 0, NULL, '', '2022', 'MIS', 1, 'ASD', 'ASD', '2022-07-26', 0.5, 0, 1),
(844, '', 191, ' July 27, 2022', '2022-07-27', '01:23 pm', 'Task Sample', 'cedrick', 'daily', 'July', NULL, 'week 30', 0, NULL, '', '2022', 'MIS', 0, 'ASD', 'ASD', '2022-07-27', 1, 0, 1),
(866, '', 192, ' July 25, 2022', '2022-07-27', '03:06 pm', 'Formatting computer', 'cedrick', 'daily', 'July', NULL, 'week 30', 0, NULL, '', '2022', 'MIS', 2, '', 'asd', '2022-07-25', 0, 0, 0),
(867, '', 192, ' July 26, 2022', '2022-07-27', '03:06 pm', 'Formatting computer', 'cedrick', 'daily', 'July', NULL, 'week 30', 0, NULL, '', '2022', 'MIS', 1, '', 'asd', '2022-07-26', 0.5, 0, 0),
(868, '', 192, ' July 27, 2022', '2022-07-27', '03:06 pm', 'Formatting computer', 'cedrick', 'daily', 'July', NULL, 'week 30', 0, NULL, '', '2022', 'MIS', 0, '', 'asd', '2022-07-27', 1, 0, 0),
(1099, '', 54, ' July 28, 2022', '2022-08-01', '01:33 pm', 'Canteen Billing', 'cedrick', 'daily', 'July', NULL, 'week 30', 0, NULL, '', '2022', 'MIS', 2, 'Zxdczxc', 'ZXc', '2022-07-28', 0, 0, 1),
(1100, '', 54, ' July 29, 2022', '2022-08-01', '01:33 pm', 'Canteen Billing', 'cedrick', 'daily', 'July', NULL, 'week 30', 0, NULL, '', '2022', 'MIS', 1, 'Zxdczxc', 'ZXc', '2022-07-29', 0.5, 0, 1),
(1101, '', 54, ' August 1, 2022', '2022-08-01', '01:33 pm', 'Canteen Billing', 'cedrick', 'daily', 'August', NULL, 'week 31', 0, NULL, '', '2022', 'MIS', 0, 'Zxdczxc', 'ZXc', '2022-08-01', 1, 0, 1),
(1104, '', 191, ' July 29, 2022', '2022-08-01', '01:42 pm', 'Task Sample', 'cedrick', 'daily', 'July', NULL, 'week 30', 0, NULL, '', '2022', 'MIS', 1, '', 'asdf', '2022-07-29', 0.5, 0, 0),
(1105, '', 191, ' August 1, 2022', '2022-08-01', '01:42 pm', 'Task Sample', 'cedrick', 'daily', 'August', NULL, 'week 31', 0, NULL, '', '2022', 'MIS', 0, '', 'asdf', '2022-08-01', 1, 0, 0),
(1113, '', 192, ' July 28, 2022', '2022-08-01', '01:55 pm', 'Formatting computer', 'cedrick', 'daily', 'July', NULL, 'week 30', 0, NULL, './uploaded_files/fff1a2421adab9ed327a15d1bd090c32.pdf', '2022', 'MIS', 2, 'asdf', 'asdf', '2022-07-28', 0, 0, 1),
(1114, '', 192, ' July 29, 2022', '2022-08-01', '01:55 pm', 'Formatting computer', 'cedrick', 'daily', 'July', NULL, 'week 30', 0, NULL, './uploaded_files/fff1a2421adab9ed327a15d1bd090c32.pdf', '2022', 'MIS', 1, 'asdf', 'asdf', '2022-07-29', 0.5, 0, 1),
(1115, '', 192, ' August 1, 2022', '2022-08-01', '01:55 pm', 'Formatting computer', 'cedrick', 'daily', 'August', NULL, 'week 31', 0, '2022-08-01', './uploaded_files/fff1a2421adab9ed327a15d1bd090c32.pdf', '2022', 'MIS', 0, 'asdf', 'asdf', '2022-08-01', 1, 0, 1),
(1116, '', 30, ' August 1, 2022', NULL, '02:02 pm', 'Storage  16TB- Primary Back up (server room)', 'cedrick', 'weekly', 'July', NULL, 'week 30', 30, '2022-07-25', '', '2022', 'MIS', 6, 'SDF', 'ASDF', '2022-08-01', 0.5, 0, 1),
(1117, '', 30, ' August 1, 2022', NULL, '02:02 pm', 'Storage  16TB- Primary Back up (server room)', 'cedrick', 'weekly', 'August', NULL, 'week 31', 31, '2022-08-01', '', '2022', 'MIS', 6, 'SDF', 'ASDF', '2022-08-01', 1, 0, 1),
(1118, '', 34, ' August 1, 2022', NULL, '02:13 pm', 'DMS- Server (backup and functionality)', 'cedrick', 'weekly', 'August', NULL, 'week 31', 31, '2022-08-01', '', '2022', 'MIS', 0, '', 'zxc', '2022-08-01', 1, 0, 0),
(1119, '', 54, ' August 2, 2022', '2022-08-05', '03:20 pm', 'Canteen Billing', 'cedrick', 'daily', 'August', NULL, 'week 31', 0, '2022-08-01', '', '2022', 'MIS', 3, 'df', 'gdf', '2022-08-02', 0, 0, 1),
(1120, '', 54, ' August 3, 2022', '2022-08-05', '03:20 pm', 'Canteen Billing', 'cedrick', 'daily', 'August', NULL, 'week 31', 0, '2022-08-01', '', '2022', 'MIS', 2, 'df', 'gdf', '2022-08-03', 0, 0, 1),
(1121, '', 54, ' August 4, 2022', '2022-08-05', '03:20 pm', 'Canteen Billing', 'cedrick', 'daily', 'August', NULL, 'week 31', 0, '2022-08-01', '', '2022', 'MIS', 1, 'df', 'gdf', '2022-08-04', 0.5, 0, 1),
(1122, '', 54, ' August 5, 2022', '2022-08-05', '03:20 pm', 'Canteen Billing', 'cedrick', 'daily', 'August', NULL, 'week 31', 0, '2022-08-01', '', '2022', 'MIS', 0, 'df', 'gdf', '2022-08-05', 1, 0, 1),
(1123, '', 191, ' August 2, 2022', '2022-08-05', '03:20 pm', 'Task Sample', 'cedrick', 'daily', 'August', NULL, 'week 31', 0, '2022-08-01', '', '2022', 'MIS', 3, 'sdf', 'asdfsdf', '2022-08-02', 0, 0, 1),
(1124, '', 191, ' August 3, 2022', '2022-08-05', '03:20 pm', 'Task Sample', 'cedrick', 'daily', 'August', NULL, 'week 31', 0, '2022-08-01', '', '2022', 'MIS', 2, 'sdf', 'asdfsdf', '2022-08-03', 0, 0, 1),
(1125, '', 191, ' August 4, 2022', '2022-08-05', '03:20 pm', 'Task Sample', 'cedrick', 'daily', 'August', NULL, 'week 31', 0, '2022-08-01', '', '2022', 'MIS', 1, 'sdf', 'asdfsdf', '2022-08-04', 0.5, 0, 1),
(1126, '', 191, ' August 5, 2022', '2022-08-05', '03:20 pm', 'Task Sample', 'cedrick', 'daily', 'August', NULL, 'week 31', 0, '2022-08-01', '', '2022', 'MIS', 0, 'sdf', 'asdfsdf', '2022-08-05', 1, 0, 1),
(1127, '', 192, ' August 2, 2022', '2022-08-02', '03:20 pm', 'Formatting computer', 'cedrick', 'daily', 'August', NULL, 'week 31', 0, '2022-08-01', '', '2022', 'MIS', 3, 'fasdf', 'asdfasd', '2022-08-02', 0, 0, 1),
(1128, '', 192, ' August 3, 2022', '2022-08-03', '03:20 pm', 'Formatting computer', 'cedrick', 'daily', 'August', NULL, 'week 31', 0, '2022-08-01', '', '2022', 'MIS', 2, 'fasdf', 'asdfasd', '2022-08-03', 0, 0, 1),
(1129, '', 192, ' August 4, 2022', '2022-08-04', '03:20 pm', 'Formatting computer', 'cedrick', 'daily', 'August', NULL, 'week 31', 0, '2022-08-01', '', '2022', 'MIS', 1, 'fasdf', 'asdfasd', '2022-08-04', 0.5, 0, 1),
(1130, '', 192, ' August 5, 2022', '2022-08-05', '03:20 pm', 'Formatting computer', 'cedrick', 'daily', 'August', NULL, 'week 31', 0, '2022-08-01', '', '2022', 'MIS', 0, 'fasdf', 'asdfasd', '2022-08-05', 1, 0, 1),
(1131, '', 34, ' August 8, 2022', '2022-08-08', '11:10 am', 'DMS- Server (backup and functionality)', 'cedrick', 'weekly', 'August', NULL, 'week 32', 32, '2022-08-08', '', '2022', 'MIS', 0, '', 'sdasd', '2022-08-08', 1, 0, 0),
(1144, '', 54, ' August 8, 2022', '2022-08-08', '12:49 pm', 'Canteen Billing', 'cedrick', 'daily', 'August', NULL, 'week 32', 0, NULL, '', '2022', 'MIS', 0, '', 'rewr', '2022-08-08', 1, 1, 0),
(1146, '', 192, ' August 8, 2022', '2022-08-08', '12:49 pm', 'Formatting computer', 'cedrick', 'daily', 'August', NULL, 'week 32', 0, NULL, '', '2022', 'MIS', 0, '', 'wert', '2022-08-08', 1, 1, 0),
(1147, '', 54, ' August 9, 2022', '2022-08-09', '12:33 pm', 'Canteen Billing', 'cedrick', 'daily', 'August', NULL, 'week 32', 0, NULL, '', '2022', 'MIS', 0, '', 'sdef', '2022-08-09', 1, 0, 0),
(1156, '', 191, ' August 8, 2022', '2022-08-10', '09:21 am', 'Task Sample', 'cedrick', 'daily', 'August', NULL, 'week 32', 0, NULL, '', '2022', 'MIS', 2, 'sd', 'asd', '2022-08-08', 0, 0, 1),
(1157, '', 191, ' August 9, 2022', '2022-08-10', '09:21 am', 'Task Sample', 'cedrick', 'daily', 'August', NULL, 'week 32', 0, NULL, '', '2022', 'MIS', 1, 'sd', 'asd', '2022-08-09', 0.5, 0, 1),
(1158, '', 191, ' August 10, 2022', '2022-08-10', '09:21 am', 'Task Sample', 'cedrick', 'daily', 'August', NULL, 'week 32', 0, NULL, '', '2022', 'MIS', 0, 'sd', 'asd', '2022-08-10', 1, 0, 1),
(1163, '', 53, ' August 12, 2022', '2022-08-12', '08:56 am', 'VM MIS System', 'cedrick', 'weekly', 'July', NULL, 'week 30', 30, '2022-07-25', '', '2022', 'MIS', 10, 'Wala lang', 'Wala din', '2022-08-12', 0, 0, 1),
(1164, '', 53, ' August 12, 2022', '2022-08-12', '08:56 am', 'VM MIS System', 'cedrick', 'weekly', 'August', NULL, 'week 31', 31, '2022-08-01', '', '2022', 'MIS', 5, 'Wala lang', 'Wala din', '2022-08-12', 0.5, 0, 1),
(1165, '', 53, ' August 12, 2022', '2022-08-12', '08:56 am', 'VM MIS System', 'cedrick', 'weekly', 'August', NULL, 'week 32', 32, '2022-08-08', '', '2022', 'MIS', 0, 'Wala lang', 'Wala din', '2022-08-12', 1, 0, 1),
(1222, '191034220220812sdfg', 191, ' August 11, 2022', '2022-08-12', '03:42 pm', 'Task Sample', 'cedrick', 'daily', 'August', NULL, 'week 32', 0, NULL, '', '2022', 'MIS', 1, '', 'sdfg', '2022-08-11', 1, 0, 0),
(1223, '191034220220812sdfg', 191, ' August 12, 2022', '2022-08-12', '03:42 pm', 'Task Sample', 'cedrick', 'daily', 'August', NULL, 'week 32', 0, NULL, '', '2022', 'MIS', 0, '', 'sdfg', '2022-08-12', 1, 0, 0),
(1226, '540941asdasd', 54, ' August 10, 2022', '2022-08-15', '09:41 am', 'Canteen Billing', 'cedrick', 'daily', 'August', NULL, 'week 32', 0, NULL, '', '2022', 'MIS', 3, 'asd', 'asd', '2022-08-10', 0, 0, 1),
(1227, '5409412022-08-15asdasd', 54, ' August 11, 2022', '2022-08-15', '09:41 am', 'Canteen Billing', 'cedrick', 'daily', 'August', NULL, 'week 32', 0, NULL, '', '2022', 'MIS', 2, '', '', '2022-08-11', 0, 0, 1),
(1228, '5409412022-08-15asdasd', 54, ' August 12, 2022', '2022-08-15', '09:41 am', 'Canteen Billing', 'cedrick', 'daily', 'August', NULL, 'week 32', 0, NULL, '', '2022', 'MIS', 1, '', '', '2022-08-12', 0.5, 0, 1),
(1229, '5409412022-08-15asdasd', 54, ' August 15, 2022', '2022-08-15', '09:41 am', 'Canteen Billing', 'cedrick', 'daily', 'August', NULL, 'week 33', 0, NULL, '', '2022', 'MIS', 0, '', '', '2022-08-15', 1, 0, 1),
(1230, '1921006fgsdfdfgeg', 192, ' August 9, 2022', '2022-08-15', '10:06 am', 'Formatting computer', 'cedrick', 'daily', 'August', NULL, 'week 32', 0, NULL, '', '2022', 'MIS', 4, 'dfgeg', 'fgsdf', '2022-08-09', 0, 0, 1),
(1231, '19210062022-08-15fgsdfdfgeg', 192, ' August 10, 2022', '2022-08-15', '10:06 am', 'Formatting computer', 'cedrick', 'daily', 'August', NULL, 'week 32', 0, NULL, '', '2022', 'MIS', 3, 'dfgeg', 'fgsdf', '2022-08-10', 0, 0, 1),
(1232, '19210062022-08-15fgsdfdfgeg', 192, ' August 11, 2022', '2022-08-15', '10:06 am', 'Formatting computer', 'cedrick', 'daily', 'August', NULL, 'week 32', 0, NULL, '', '2022', 'MIS', 2, 'dfgeg', 'fgsdf', '2022-08-11', 0, 0, 1),
(1233, '19210062022-08-15fgsdfdfgeg', 192, ' August 12, 2022', '2022-08-15', '10:06 am', 'Formatting computer', 'cedrick', 'daily', 'August', NULL, 'week 32', 0, NULL, '', '2022', 'MIS', 1, 'dfgeg', 'fgsdf', '2022-08-12', 0.5, 0, 1),
(1234, '19210062022-08-15fgsdfdfgeg', 192, ' August 15, 2022', '2022-08-15', '10:06 am', 'Formatting computer', 'cedrick', 'daily', 'August', NULL, 'week 33', 0, NULL, '', '2022', 'MIS', 0, 'dfgeg', 'fgsdf', '2022-08-15', 1, 0, 1),
(1235, '300318sdfsdf', 30, ' August 15, 2022', '0000-00-00', '03:18 pm', 'Storage  16TB- Primary Back up (server room)', 'cedrick', 'weekly', 'August', NULL, 'week 32', 32, '2022-08-08', '', '2022', 'MIS', 1, 'sdf', 'sdf', '2022-08-15', 0.5, 0, 1),
(1236, '300318sdfsdf', 30, ' August 15, 2022', '0000-00-00', '03:18 pm', 'Storage  16TB- Primary Back up (server room)', 'cedrick', 'weekly', 'August', NULL, 'week 33', 33, '2022-08-15', '', '2022', 'MIS', 0, 'sdf', 'sdf', '2022-08-15', 1, 0, 1),
(1237, '3403-18sdfsd', 34, ' August 15, 2022', '2022-08-15', '03:18 pm', 'DMS- Server (backup and functionality)', 'cedrick', 'weekly', 'August', NULL, 'week 33', 33, '2022-08-15', '', '2022', 'MIS', 0, '', 'sdfsd', '2022-08-15', 1, 0, 0),
(1238, 'sdfsd', 204, ' August 18, 2022', '2022-08-18', '10:58 am', 'Annual Task 2', 'anton', 'annual', 'August', NULL, 'week 33', 33, NULL, '', '2022', 'FEM', 0, '', 'aswdasd', '2022-08-18', 0, 0, 0);

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
(6, 'nathan', '123456', '123456', 'Leader', 'Nathan', '', 'Nemedez', 'MIS'),
(7, 'cedrick', '123456', '123456', 'PIC', 'Cedrick James', 'M', 'Orozo', 'MIS'),
(11, 'admin', 'admin', 'admin', 'Admin', 'Nathan', '', 'Nemedez', 'Admin'),
(22, 'kevin', 'kevin', 'kevin', 'PIC', 'Kevin', '', 'Marero', 'MIS'),
(23, 'felmhar', 'felmhar', 'felmhar', 'PIC', 'Felmhar', '', 'Vivo', 'MIS'),
(24, 'anton', 'anton', 'anton', 'PIC', 'Antonio', '', 'Negrite', 'FEM'),
(26, 'admincedrick', 'admincedrick', 'admincedrick', 'Admin', 'Cedrick James', '', 'Orozo', 'Admin'),
(28, 'jcarlo', 'jcarlo', 'jcarlo', 'Leader', 'John Carlo', '', 'Siera', 'FEM');

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
  `dateStarted` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertask`
--

INSERT INTO `usertask` (`userid`, `username`, `taskName`, `taskCategory`, `taskArea`, `taskType`, `usertaskID`, `Department`, `dateStarted`) VALUES
(7, 'cedrick', 'Storage  16TB- Primary Back up (server room)', 'Storage', '', 'weekly', 30, 'MIS', 'August 15, 2022'),
(0, 'kevin ', 'VM- Production System', 'VM', '', 'weekly', 31, 'MIS', ''),
(22, 'kevin', 'GPSS- Server (backup and functionality)', 'Server', 'All', 'weekly', 33, 'MIS', ''),
(7, 'cedrick', 'DMS- Server (backup and functionality)', 'Server', '', 'weekly', 34, 'MIS', 'August 15, 2022'),
(7, 'cedrick', 'Monthly Billing Eastern PLDT Smart Fuji Ricoh', 'Others', 'All', 'monthly', 35, 'MIS', 'July 12, 2022'),
(23, 'felmhar', 'Monthly Report network server pms  pc disposal', 'Others', 'GPI 1', 'monthly', 36, 'MIS', ''),
(7, 'cedrick', 'VM MIS System', 'VM', '', 'weekly', 53, 'MIS', 'August 12, 2022'),
(7, 'cedrick', 'Canteen Billing', 'Others', 'All', 'daily', 54, 'MIS', 'August 15, 2022'),
(22, 'kevin', 'Core Switch (Cisco 1941)x2', 'Server', 'All', 'monthly', 55, 'MIS', ''),
(22, 'kevin', 'Firewall Fortigage 200D', 'Network', 'All', 'weekly', 56, 'MIS', ''),
(22, 'kevin', 'WLAN Controller AIR-CT2504', 'Network', 'All', 'weekly', 58, 'MIS', ''),
(22, 'kevin', 'VM- Host1 Lenovo X3350 M5 (backup and function)', 'Server', '', 'weekly', 59, 'MIS', ''),
(22, 'kevin', 'VM- Host2 Lenovo X3350 M5  (backup and function)', 'Server', '', 'weekly', 60, 'MIS', ''),
(22, 'kevin', 'AD/ File Server Lenovo X3350 M5 (backup and functi', 'Server', '', 'weekly', 61, 'MIS', ''),
(22, 'kevin', 'Vcenter Server Lenovo X3350 M5 (backup and functio', 'Server', '', 'weekly', 62, 'MIS', ''),
(22, 'kevin', 'Storage 4TB - EsXi Data Storage - Synology RS815RP', 'Storage', '', 'weekly', 63, 'MIS', ''),
(22, 'kevin', 'Storage 12TB- EsXi Data Storage -Lenovo', 'Storage', '', 'weekly', 64, 'MIS', ''),
(22, 'kevin', 'Storage 10TB- File Data', 'Storage', '', 'weekly', 65, 'MIS', ''),
(22, 'kevin', 'VM-Active Directory (Standby)', 'VM', '', 'weekly', 66, 'MIS', ''),
(22, 'kevin', 'VM- Accpac', 'VM', '', 'weekly', 67, 'MIS', ''),
(22, 'kevin', 'VM- Payroll', 'VM', '', 'weekly', 68, 'MIS', ''),
(22, 'kevin', 'VM- DTR', 'VM', '', 'weekly', 69, 'MIS', ''),
(22, 'kevin', 'MDM Security (report and subscription)', 'Others', 'All', 'weekly', 70, 'MIS', ''),
(22, 'kevin', 'Email Server (monitoring and subscription)', 'Others', 'GPI 7', 'weekly', 71, 'MIS', ''),
(22, 'kevin', 'Core Switch GPI8', 'Others', '', 'monthly', 72, 'MIS', ''),
(22, 'kevin', 'Firewall GPI8', 'Others', '', 'monthly', 73, 'MIS', ''),
(22, 'kevin', 'Layer 2 Switch GPI8', 'Storage', 'All', 'monthly', 74, 'MIS', ''),
(22, 'kevin', 'Access Point GPI8', 'Others', 'GPI 8', 'weekly', 75, 'MIS', ''),
(23, 'felmhar', 'Access Point', 'Network', 'All', 'weekly', 76, 'MIS', ''),
(23, 'felmhar', 'IDF Switches ', 'Network', 'All', 'monthly', 77, 'MIS', ''),
(23, 'felmhar', 'Storage  - Secondary  Backup (offsite)', 'Storage', '', 'weekly', 78, 'MIS', ''),
(23, 'felmhar', 'CCTV- Recording and functionality', 'Others', '', 'weekly', 79, 'MIS', ''),
(23, 'felmhar', 'PABX  GPI-1 5 7', 'Others', 'GPI 1', 'monthly', 80, 'MIS', ''),
(23, 'felmhar', 'Kaspersky Security (report and subscription)', 'Others', '', 'weekly', 81, 'MIS', ''),
(23, 'felmhar', 'Domain (glory.com.ph  subscription)', 'Others', '', 'monthly', 82, 'MIS', ''),
(23, 'felmhar', 'Time -Synchronization (DTR and Paging System all b', 'Others', '', 'weekly', 83, 'MIS', ''),
(23, 'felmhar', 'Performing Preventive Maintenance', 'Others', '', 'monthly', 84, 'MIS', ''),
(23, 'felmhar', 'Printer Monitoring and Subscription', 'Others', '', 'monthly', 85, 'MIS', ''),
(23, 'felmhar', 'Server 1 GPI8', 'Others', '', 'weekly', 86, 'MIS', ''),
(23, 'felmhar', 'Server 2 GPI8', 'Others', '', 'weekly', 87, 'MIS', ''),
(23, 'felmhar', 'Pabx GPI8', 'Others', '', 'weekly', 88, 'MIS', ''),
(23, 'felmhar', 'Paging System GPI8', 'Others', '', 'monthly', 89, 'MIS', ''),
(23, 'felmhar', 'CCTV GPI8', 'Others', '', 'weekly', 90, 'MIS', ''),
(22, 'kevin', 'Sample', 'Network', 'GPI 8', 'monthly', 91, 'MIS', ''),
(22, 'kevin', 'Canteen Billing', 'Storage', 'GPI 4', 'annual', 93, 'MIS', ''),
(24, 'anton', 'Certificates are Displayed on Entrance', 'Others', 'All', 'daily', 187, 'FEM', ''),
(24, 'anton', 'Set Backs on the Building are Clear and Accessible', 'Routine Inspection', 'All', 'daily', 188, 'FEM', ''),
(24, 'anton', 'Comfort Room for PWD are with grab bars and signag', 'Routine Inspection', 'All', 'daily', 189, 'FEM', ''),
(24, 'anton', 'PWD Parking Area', 'Routine Inspection', 'All', 'daily', 190, 'FEM', ''),
(7, 'cedrick', 'Task Sample', 'Server', 'All', 'daily', 191, 'MIS', 'August 12, 2022'),
(7, 'cedrick', 'Formatting computer', 'Others', 'GPI 1', 'daily', 192, 'MIS', 'August 15, 2022'),
(23, 'felmhar', 'JO Cheking', 'Others', 'All', 'daily', 194, 'MIS', ''),
(23, 'felmhar', 'Sample', 'Network', 'GPI 1', 'weekly', 195, 'MIS', ''),
(23, 'felmhar', 'Sample2', 'Server', 'GPI 1', 'monthly', 196, 'MIS', ''),
(22, 'kevin', 'Checking of JO', 'Others', 'All', 'daily', 197, 'MIS', 'August 10, 2022'),
(22, 'kevin', 'Sample ', 'Others', 'GPI 1', 'weekly', 198, 'MIS', 'August 10, 2022'),
(22, 'kevin', 'Sample 2', 'Others', 'GPI 2', 'monthly', 199, 'MIS', 'August 10, 2022'),
(24, 'anton', 'Cheking of JO', 'Others', 'All', 'daily', 202, 'FEM', 'August 10, 2022'),
(24, 'anton', 'sample Annual task', 'Others', 'All', 'annual', 203, 'FEM', 'August 18, 2022'),
(24, 'anton', 'Annual Task 2', 'Others', 'All', 'annual', 204, 'FEM', 'August 18, 2022');

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
  MODIFY `adminid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `finishedtask`
--
ALTER TABLE `finishedtask`
  MODIFY `FinishedTaskID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1241;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `holidayId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `usertask`
--
ALTER TABLE `usertask`
  MODIFY `usertaskID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



