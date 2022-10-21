-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2022 at 01:10 AM
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
-- Database: `taskmonitoringsystemfinal`
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
(13, '53', 'GP-10-273'),
(14, '55', '11306');

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
(21, 'Computer'),
(22, 'Job Order ');

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
  `action` varchar(255) NOT NULL,
  `realDate` date DEFAULT current_timestamp(),
  `score` float NOT NULL,
  `isCheckedByLeader` tinyint(10) NOT NULL,
  `isLate` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `finishedtask`
--

INSERT INTO `finishedtask` (`FinishedTaskID`, `sameID`, `taskID`, `Date`, `DateSubmitted`, `timestamp`, `task_Name`, `in_charge`, `sched_Type`, `month`, `firstDateOfTheMonth`, `week`, `weekNumber`, `lastMonday`, `attachments`, `year`, `Department`, `noOfDaysLate`, `reason`, `action`, `realDate`, `score`, `isCheckedByLeader`, `isLate`) VALUES
(1325, '31109142022-09-02ROVING\r\n', 311, ' 2022-09-02', '2022-09-02', '09:14 am', 'Roving', 'GP-22-718', 'daily', 'September', NULL, 'week 35', 0, NULL, '', '2022', 'FEM', 0, '', 'ROVING\r\n', '2022-09-02', 1, 0, 0),
(1327, '33810252022-09-02As per checking, No reported trouble was found. Endorsed back to Guards on Duty. ', 338, ' 2022-09-02', '2022-09-02', '10:25 am', 'Security Guard Checklist', 'GP-18-614', 'daily', 'September', NULL, 'week 35', 0, NULL, '', '2022', 'FEM', 0, '', 'As per checking, No reported trouble was found. Endorsed back to Guards on Duty. ', '2022-09-02', 1, 0, 0),
(1329, '33701553 trouble reports are created for malfunction Aircon units, ACU #8 and 29 at GPI 5 and ACU #3', 337, ' 2022-09-02', NULL, '01:55 pm', 'Create trouble report', 'GP-18-614', 'annual', 'September', '2022-09-01', 'week 35', 0, NULL, '', '2022', 'FEM', 0, '', '3 trouble reports are created for malfunction Aircon units, ACU #8 and 29 at GPI 5 and ACU #32 at GP', '2022-09-02', 1, 0, 0),
(1330, '34202192022-09-02Conducted PMS', 342, ' 2022-09-02', '2022-09-02', '02:19 pm', 'PMS of Aircon', 'CG1420', 'daily', 'September', NULL, 'week 35', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted PMS', '2022-09-02', 1, 0, 0),
(1331, '34102292022-09-02Conducted PMS of ACUs', 341, ' 2022-09-02', '2022-09-02', '02:29 pm', 'PMS of Aircon', 'CG0676', 'daily', 'September', NULL, 'week 35', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted PMS of ACUs', '2022-09-02', 1, 0, 0),
(1332, '32802352022-09-02Conducted cleaning of aircon filters', 328, ' 2022-09-02', '2022-09-02', '02:35 pm', 'Cleaning of Air con filters ', 'CG1420', 'daily', 'September', NULL, 'week 35', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of aircon filters', '2022-09-02', 1, 0, 0),
(1333, '32502372022-09-02Conducted cleaning of aircon filters', 325, ' 2022-09-02', '2022-09-02', '02:37 pm', 'Cleaning of Air con filters ', 'CG0676', 'daily', 'September', NULL, 'week 35', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of aircon filters', '2022-09-02', 1, 0, 0),
(1334, '3400310Constructed template and detailed information of the meeting last August 31. For signature by', 340, ' 2022-09-02', NULL, '03:10 pm', 'Create Minutes of Meeting', 'GP-18-614', 'annual', 'September', '2022-09-01', 'week 35', 0, NULL, '', '2022', 'FEM', 0, '', 'Constructed template and detailed information of the meeting last August 31. For signature by affect', '2022-09-02', 1, 0, 0),
(1335, '32603172022-09-02Conducted cleaning of exhaust fan', 326, ' 2022-09-02', '2022-09-02', '03:17 pm', 'Cleaning of exhaust Fan', 'CG0676', 'daily', 'September', NULL, 'week 35', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of exhaust fan', '2022-09-02', 1, 0, 0),
(1337, '32903222022-09-02Conducted cleaning of exhaust fan', 329, ' 2022-09-02', '2022-09-02', '03:22 pm', 'Cleaning of exhaust Fan', 'CG1420', 'daily', 'September', NULL, 'week 35', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of exhaust fan', '2022-09-02', 1, 0, 0),
(1338, '32103232022-09-02Cleaning of filters at canteen area and kitchen.', 321, ' 2022-09-02', '2022-09-02', '03:23 pm', 'Cleaning of Air con filters ', 'GP-22-730', 'daily', 'September', NULL, 'week 35', 0, NULL, '', '2022', 'FEM', 0, '', 'Cleaning of filters at canteen area and kitchen.', '2022-09-02', 1, 0, 0),
(1339, '32203242022-09-02Conduct cleaning of exhaust.', 322, ' 2022-09-02', '2022-09-02', '03:24 pm', 'Cleaning of exhaust Fan', 'GP-22-730', 'daily', 'September', NULL, 'week 35', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct cleaning of exhaust.', '2022-09-02', 1, 0, 0),
(1341, '33403252022-09-02conduct cleaning of Aircon filters.', 334, ' 2022-09-02', '2022-09-02', '03:25 pm', 'Cleaning of Air con filters ', 'CG1805', 'daily', 'September', NULL, 'week 35', 0, NULL, '', '2022', 'FEM', 0, '', 'conduct cleaning of Aircon filters.', '2022-09-02', 1, 0, 0),
(1342, '33503252022-09-02conduct cleaning of exhaust.', 335, ' 2022-09-02', '2022-09-02', '03:25 pm', 'Cleaning of exhaust Fan', 'CG1805', 'daily', 'September', NULL, 'week 35', 0, NULL, '', '2022', 'FEM', 0, '', 'conduct cleaning of exhaust.', '2022-09-02', 1, 0, 0),
(1343, '34403262022-09-02conduct cleaning of ACUs', 344, ' 2022-09-02', '2022-09-02', '03:26 pm', 'PM of ACUs', 'CG1805', 'daily', 'September', NULL, 'week 35', 0, NULL, '', '2022', 'FEM', 0, '', 'conduct cleaning of ACUs', '2022-09-02', 1, 0, 0),
(1346, '34303442022-09-02Perform monitoring', 343, ' 2022-09-02', '2022-09-02', '03:44 pm', 'CCTV Cheking', 'GP-17-571', 'daily', 'September', NULL, 'week 35', 0, NULL, '', '2022', 'MIS', 0, '', 'Perform monitoring', '2022-09-02', 1, 0, 0),
(1347, '31203482022-09-02start designing propose warehouse using Autocad application', 312, ' 2022-09-02', '2022-09-02', '03:48 pm', 'GPI 8 Warehouse Layout', 'GP-22-718', 'daily', 'September', NULL, 'week 35', 0, NULL, '', '2022', 'FEM', 0, '', 'start designing propose warehouse using Autocad application', '2022-09-02', 1, 0, 0),
(1348, '33903572022-09-02Done checking. For continuation on PRS ', 339, ' 2022-09-02', '2022-09-02', '03:57 pm', 'Checking of consumables', 'GP-18-614', 'monthly', 'September', '2022-09-01', 'week 35', 0, NULL, '', '2022', 'FEM', 0, '', 'Done checking. For continuation on PRS ', '2022-09-02', 1, 0, 0),
(1349, '33807382022-09-05Checked all checklist from all building. Found 1 trouble at GPI 5 emailed to FEM st', 338, ' 2022-09-05', '2022-09-05', '07:38 am', 'Security Guard Checklist', 'GP-18-614', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Checked all checklist from all building. Found 1 trouble at GPI 5 emailed to FEM staff assigned at G', '2022-09-05', 1, 0, 0),
(1350, '31110272022-09-05done roving', 311, ' 2022-09-05', '2022-09-05', '10:27 am', 'Roving', 'GP-22-718', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'done roving', '2022-09-05', 1, 0, 0),
(1351, '31310302022-09-05All required documents needed for peza inspection are already compiled', 313, ' 2022-09-05', '2022-09-05', '10:30 am', 'Preparation of Documents for PEZA Inspection GPI 6', 'GP-22-718', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'All required documents needed for peza inspection are already compiled', '2022-09-05', 1, 0, 0),
(1352, '35910322022-09-05preparation of documents are already finish.', 359, ' 2022-09-05', '2022-09-05', '10:32 am', 'Preparation of Documents for PEZA Inspection at GP', 'GP-22-718', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'preparation of documents are already finish.', '2022-09-05', 1, 0, 0),
(1353, '36110362022-09-05PRS is already submitted.', 361, ' 2022-09-05', '2022-09-05', '10:36 am', 'Preparation for UTG Test for Air Receiver Tank ', 'GP-22-718', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'PRS is already submitted.', '2022-09-05', 1, 0, 0),
(1354, '32112362022-09-05Conduct cleaning of filters.', 321, ' 2022-09-05', '2022-09-05', '12:36 pm', 'Cleaning of Air con filters ', 'GP-22-730', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct cleaning of filters.', '2022-09-05', 1, 0, 0),
(1355, '32212362022-09-05Conduct cleaning of exhaust.', 322, ' 2022-09-05', '2022-09-05', '12:36 pm', 'Cleaning of exhaust Fan', 'GP-22-730', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct cleaning of exhaust.', '2022-09-05', 1, 0, 0),
(1357, '36412402022-09-05Conduct of cleaning of aircon.', 364, ' 2022-09-05', '2022-09-05', '12:40 pm', 'PMS of ACUs', 'GP-22-730', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct of cleaning of aircon.', '2022-09-05', 1, 0, 0),
(1360, '38312482022-09-05done filled up', 383, ' 2022-09-05', '2022-09-05', '12:48 pm', 'Pill up of ECM', 'GP-22-718', 'monthly', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Done filled up for the month of august.', '2022-09-05', 1, 0, 0),
(1362, '32803352022-09-05Conducted cleaning of aircon filters', 328, ' 2022-09-05', '2022-09-05', '03:35 pm', 'Cleaning of Air con filters ', 'CG1420', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of aircon filters', '2022-09-05', 1, 0, 0),
(1363, '32903362022-09-05Conducted cleaning of exhaust fan', 329, ' 2022-09-05', '2022-09-05', '03:36 pm', 'Cleaning of exhaust Fan', 'CG1420', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of exhaust fan', '2022-09-05', 1, 0, 0),
(1364, '34203372022-09-05Conducted PMS of aircon', 342, ' 2022-09-05', '2022-09-05', '03:37 pm', 'PMS of Aircon', 'CG1420', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted PMS of aircon', '2022-09-05', 1, 0, 0),
(1365, '37603382022-09-05Conducted dryrun of genset', 376, ' 2022-09-05', '2022-09-05', '03:38 pm', 'Genset Dry run', 'CG1420', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted dryrun of genset', '2022-09-05', 1, 0, 0),
(1370, '31203452022-09-05done 80% of warehouse design.', 312, ' 2022-09-05', '2022-09-05', '03:45 pm', 'GPI 8 Warehouse Layout', 'GP-22-718', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'done 80% of warehouse design.', '2022-09-05', 1, 0, 0),
(1371, '35003542022-09-05Reformat computer', 350, ' 2022-09-05', '2022-09-05', '03:54 pm', 'Attending pending JO request', 'CG1732', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'MIS', 0, '', 'Reformat computer', '2022-09-05', 1, 0, 0),
(1372, '34803552022-09-05Fix bios of C2203-020', 348, ' 2022-09-05', '2022-09-05', '03:55 pm', 'Attending pending JO request', 'GP-22-729', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'MIS', 0, '', 'Fix bios of C2203-020', '2022-09-05', 1, 0, 0),
(1373, '35103562022-09-05Automated monitoring thru GPI-Nagios', 351, ' 2022-09-05', '2022-09-05', '03:56 pm', 'Checking of network and mail security', 'GP-22-729', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'MIS', 0, '', 'Automated monitoring thru GPI-Nagios', '2022-09-05', 1, 0, 0),
(1374, '33403572022-09-05conduct cleaning aircon filters', 334, ' 2022-09-05', '2022-09-05', '03:57 pm', 'Cleaning of Air con filters ', 'CG1805', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'conduct cleaning aircon filters', '2022-09-05', 1, 0, 0),
(1375, '33503582022-09-05conduct cleaning of exhaust fans', 335, ' 2022-09-05', '2022-09-05', '03:58 pm', 'Cleaning of exhaust Fan', 'CG1805', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'conduct cleaning of exhaust fans', '2022-09-05', 1, 0, 0),
(1376, '34403582022-09-05conduct PM of ACUs', 344, ' 2022-09-05', '2022-09-05', '03:58 pm', 'PM of ACUs', 'CG1805', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'conduct PM of ACUs', '2022-09-05', 1, 0, 0),
(1379, '37003592022-09-05conduct PMs of Aircon', 370, ' 2022-09-05', '2022-09-05', '03:59 pm', ' PMs of Air con', 'CG1805', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'conduct PMs of Aircon', '2022-09-05', 1, 0, 0),
(1381, '37104002022-09-05conduct Dry run of Gen Set', 371, ' 2022-09-05', '2022-09-05', '04:00 pm', 'Genset Dry run', 'CG1805', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'conduct Dry run of Gen Set', '2022-09-05', 1, 0, 0),
(1382, '34704032022-09-05Code\r\n', 347, ' 2022-09-05', '2022-09-05', '04:03 pm', 'Coding Manpower System', 'GP-22-722', 'daily', 'September', NULL, 'week 36', 0, NULL, './uploaded_files/1dfc65e02eba6948a2178ead5c242eb1.png', '2022', 'MIS', 0, '', 'Code\r\n', '2022-09-05', 1, 0, 0),
(1384, '33606462022-09-06conduct cleaning of grassdue to un-able to open task monitoing app', 336, ' 2022-09-06', '2022-09-06', '06:46 am', 'Checking of Transformer(Extruction of grass)', 'CG1805', 'monthly', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'FEM', 0, 'due to un-able to open task monitoing app', 'conduct cleaning of grass', '2022-09-06', 1, 0, 0),
(1386, '32407182022-09-06Conduct cleaning of grass at transformer at gpi 1.due to unable to open task monito', 324, ' 2022-09-06', '2022-09-06', '07:18 am', 'Checking of Transformer(Extruction of grass)', 'GP-22-730', 'monthly', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'FEM', 0, 'due to unable to open task monitoring.', 'Conduct cleaning of grass at transformer at gpi 1.', '2022-09-06', 1, 0, 0),
(1387, '36607222022-09-06Conduct Dry run of genset at gpi 2 and 1.Unable to open of task monitoring', 366, ' 2022-09-05', '2022-09-06', '07:22 am', 'Genset Dry run', 'GP-22-730', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, 'Unable to open of task monitoring', 'Conduct Dry run of genset at gpi 2 and 1.', '2022-09-05', 1, 1, 0),
(1388, '36607222022-09-06Conduct Dry run of genset at gpi 2 and 1.Unable to open of task monitoring', 366, ' 2022-09-06', '2022-09-06', '07:22 am', 'Genset Dry run', 'GP-22-730', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, 'Unable to open of task monitoring', 'Conduct Dry run of genset at gpi 2 and 1.', '2022-09-06', 1, 0, 0),
(1389, '32007-322022-09-06Performed on all servers', 320, ' 2022-09-05', '2022-09-06', '07:32 am', 'Backup', 'GP-22-729', 'weekly', 'September', NULL, 'week 36', 36, '2022-09-05', '', '2022', 'MIS', 0, '', 'Performed on all servers', '2022-09-05', 1, 0, 0),
(1390, '32507322022-09-06Conducted cleaning of aircon filters', 325, ' 2022-09-05', '2022-09-06', '07:32 am', 'Cleaning of Air con filters ', 'CG0676', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of aircon filters', '2022-09-05', 1, 1, 0),
(1391, '32507322022-09-06Conducted cleaning of aircon filters', 325, ' 2022-09-06', '2022-09-06', '07:32 am', 'Cleaning of Air con filters ', 'CG0676', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of aircon filters', '2022-09-06', 1, 0, 0),
(1392, '32607352022-09-06Conducted cleaning of exhaust fan', 326, ' 2022-09-05', '2022-09-06', '07:35 am', 'Cleaning of exhaust Fan', 'CG0676', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of exhaust fan', '2022-09-05', 1, 1, 0),
(1393, '32607352022-09-06Conducted cleaning of exhaust fan', 326, ' 2022-09-06', '2022-09-06', '07:35 am', 'Cleaning of exhaust Fan', 'CG0676', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of exhaust fan', '2022-09-06', 1, 0, 0),
(1395, '32707362022-09-06Conducted extrusion of grass and checking of transformer', 327, ' 2022-09-06', '2022-09-06', '07:36 am', 'Checking of Transformer(Extruction of grass)', 'CG0676', 'monthly', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted extrusion of grass and checking of transformer', '2022-09-06', 1, 0, 0),
(1396, '34107372022-09-06Conducted PMS of aircon', 341, ' 2022-09-05', '2022-09-06', '07:37 am', 'PMS of Aircon', 'CG0676', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted PMS of aircon', '2022-09-05', 1, 1, 0),
(1397, '34107372022-09-06Conducted PMS of aircon', 341, ' 2022-09-06', '2022-09-06', '07:37 am', 'PMS of Aircon', 'CG0676', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted PMS of aircon', '2022-09-06', 1, 0, 0),
(1404, '38107432022-09-06Conducted dryrun of genset', 381, ' 2022-09-05', '2022-09-06', '07:43 am', 'Genset Dry run', 'CG0676', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted dryrun of genset', '2022-09-05', 1, 1, 0),
(1405, '38107432022-09-06Conducted dryrun of genset', 381, ' 2022-09-06', '2022-09-06', '07:43 am', 'Genset Dry run', 'CG0676', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted dryrun of genset', '2022-09-06', 1, 0, 0),
(1407, '38207432022-09-06Conducted checking of sheet shutter', 382, ' 2022-09-06', '2022-09-06', '07:43 am', 'Checking of Sheet Shutter', 'CG0676', 'monthly', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted checking of sheet shutter', '2022-09-06', 1, 0, 0),
(1408, '33807482022-09-06No found trouble. Endorsed back to Guards on Duty.', 338, ' 2022-09-06', '2022-09-06', '07:48 am', 'Security Guard Checklist', 'GP-18-614', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'No found trouble. Endorsed back to Guards on Duty.', '2022-09-06', 1, 0, 0),
(1409, '32109352022-09-06Conduct cleaning aircon filter.', 321, ' 2022-09-06', '2022-09-06', '09:35 am', 'Cleaning of Air con filters ', 'GP-22-730', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct cleaning aircon filter.', '2022-09-06', 1, 0, 0),
(1410, '33409362022-09-06Conduct cleaning of Air con filters on gpi 1 conference room #1,2,3,4,5 and Clinic', 334, ' 2022-09-06', '2022-09-06', '09:36 am', 'Cleaning of Air con filters ', 'CG1805', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct cleaning of Air con filters on gpi 1 conference room #1,2,3,4,5 and Clinic', '2022-09-06', 1, 0, 0),
(1411, '32209362022-09-06Conduct cleaning of exhaust.', 322, ' 2022-09-06', '2022-09-06', '09:36 am', 'Cleaning of exhaust Fan', 'GP-22-730', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct cleaning of exhaust.', '2022-09-06', 1, 0, 0),
(1412, '33509372022-09-06Conduct cleaning of Exhaust fan ', 335, ' 2022-09-06', '2022-09-06', '09:37 am', 'Cleaning of exhaust Fan', 'CG1805', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct cleaning of Exhaust fan ', '2022-09-06', 1, 0, 0),
(1414, '34409382022-09-06Already done scheduled on Sept 2.', 344, ' 2022-09-06', '2022-09-06', '09:38 am', 'PM of ACUs', 'CG1805', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct cleaning of ACUs', '2022-09-06', 1, 0, 0),
(1420, '37109432022-09-06Already done on Sept 5.', 371, ' 2022-09-06', '2022-09-06', '09:43 am', 'Genset Dry run', 'CG1805', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Already done on Sept 5.', '2022-09-06', 1, 0, 0),
(1421, '36709432022-09-06Already done scheduled on September 5.', 367, ' 2022-09-06', '2022-09-06', '09:43 am', 'Checking of Sheet Shutter', 'GP-22-730', 'monthly', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Already done scheduled on September 5.', '2022-09-06', 1, 0, 0),
(1422, '37209432022-09-06Already done on Sept. 5.', 372, ' 2022-09-06', '2022-09-06', '09:43 am', 'Checking of Sheet Shutter', 'CG1805', 'monthly', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Already done on Sept. 5.', '2022-09-06', 1, 0, 0),
(1423, '32809572022-09-06Conducted cleaning of aircon filters', 328, ' 2022-09-06', '2022-09-06', '09:57 am', 'Cleaning of Air con filters ', 'CG1420', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of aircon filters', '2022-09-06', 1, 0, 0),
(1424, '34209572022-09-06Conducted PMS of aircon', 342, ' 2022-09-06', '2022-09-06', '09:57 am', 'PMS of Aircon', 'CG1420', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted PMS of aircon', '2022-09-06', 1, 0, 0),
(1425, '32909582022-09-06Conducted cleaning of exhaust fan', 329, ' 2022-09-06', '2022-09-06', '09:58 am', 'Cleaning of exhaust Fan', 'CG1420', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of exhaust fan', '2022-09-06', 1, 0, 0),
(1429, '37702112022-09-06Conducted checking of sheet shutter', 377, ' 2022-09-06', '2022-09-06', '02:11 pm', 'Checking of Sheet Shutter', 'CG1420', 'monthly', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted checking of sheet shutter', '2022-09-06', 1, 0, 0),
(1430, '37602112022-09-06Conducted dry run of Genset', 376, ' 2022-09-06', '2022-09-06', '02:11 pm', 'Genset Dry run', 'CG1420', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted dry run of Genset', '2022-09-06', 1, 0, 0),
(1431, '33002122022-09-06Conducted extruction of grass and checking of transformer', 330, ' 2022-09-06', '2022-09-06', '02:12 pm', 'Checking of Transformer(Extruction of grass)', 'CG1420', 'monthly', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted extruction of grass and checking of transformer', '2022-09-06', 1, 0, 0),
(1432, '35202342022-09-061. Process the Billings for Rental on August 8, 2022.\r\n2. Consumption on August 30,', 352, ' 2022-09-06', '2022-09-06', '02:34 pm', 'Billing Fujifilm', 'cg1374', 'monthly', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'MIS', 0, '', '1. Process the Billings for Rental on August 8, 2022.\r\n2. Consumption on August 30, 2022.\r\n3. Submit', '2022-09-06', 1, 0, 0),
(1433, '35002362022-09-06Performed Reformatting of computer', 350, ' 2022-09-06', '2022-09-06', '02:36 pm', 'Attending pending JO request', 'CG1732', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'MIS', 0, '', 'Performed Reformatting of computer', '2022-09-06', 1, 0, 0),
(1434, '35402-412022-09-06Process the billings on Sep 6, and submitted on the same date.', 354, ' 2022-09-06', '2022-09-06', '02:41 pm', 'Canteen Billing', 'cg1374', 'weekly', 'September', NULL, 'week 36', 36, '2022-09-05', '', '2022', 'MIS', 0, '', 'Process the billings on Sep 6, and submitted on the same date.', '2022-09-06', 1, 0, 0),
(1435, '35702422022-09-06Process the billings and submitted on Sep 1, 2022.', 357, ' 2022-09-06', '2022-09-06', '02:42 pm', 'Billing PLDT', 'cg1374', 'monthly', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'MIS', 0, '', 'Process the billings and submitted on Sep 1, 2022.', '2022-09-06', 1, 0, 0),
(1436, '35502442022-09-06check pending JOon-going revision of the report.', 355, ' 2022-09-05', '2022-09-06', '02:44 pm', 'Checking of pending JO', 'cg1374', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'MIS', 1, 'on-going revision of the report.', 'check pending JO', '2022-09-05', 0.5, 0, 1),
(1437, '35502442022-09-06check pending JOon-going revision of the report.', 355, ' 2022-09-06', '2022-09-06', '02:44 pm', 'Checking of pending JO', 'cg1374', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'MIS', 0, 'on-going revision of the report.', 'check pending JO', '2022-09-06', 1, 0, 0),
(1438, '35802-462022-09-06Checking the safety stocks and availability of the consumables', 358, ' 2022-09-06', '2022-09-06', '02:46 pm', 'Checking of consumable', 'cg1374', 'weekly', 'September', NULL, 'week 36', 36, '2022-09-05', '', '2022', 'MIS', 0, '', 'Checking the safety stocks and availability of the consumables', '2022-09-06', 1, 0, 0),
(1439, '37003192022-09-06Conduct PMs of Air con', 370, ' 2022-09-06', '2022-09-06', '03:19 pm', ' PMs of Air con', 'CG1805', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct PMs of Air con', '2022-09-06', 1, 0, 0),
(1440, '34303262022-09-06late update', 343, ' 2022-09-05', '2022-09-06', '03:26 pm', 'CCTV Cheking', 'GP-17-571', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'MIS', 1, 'late update', '', '2022-09-05', 0.5, 0, 1),
(1441, '34303262022-09-06late update', 343, ' 2022-09-06', '2022-09-06', '03:26 pm', 'CCTV Cheking', 'GP-17-571', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'MIS', 0, 'late update', '', '2022-09-06', 1, 0, 0),
(1442, '34903262022-09-06Attended jo request', 349, ' 2022-09-05', '2022-09-06', '03:26 pm', 'Attending pending JO request', 'GP-17-571', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'MIS', 1, 'Attended jo request', '', '2022-09-05', 0.5, 0, 1),
(1443, '34903262022-09-06Attended jo request', 349, ' 2022-09-06', '2022-09-06', '03:26 pm', 'Attending pending JO request', 'GP-17-571', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'MIS', 0, 'Attended jo request', '', '2022-09-06', 1, 0, 0),
(1444, '31203372022-09-06warehouse design is already done', 312, ' 2022-09-06', '2022-09-06', '03:37 pm', 'GPI 8 Warehouse Layout', 'GP-22-718', 'daily', 'September', NULL, 'week 36', 0, NULL, './uploaded_files/73fea701f5be403635977bc52cb516c4.pdf', '2022', 'FEM', 0, '', 'warehouse design is already done', '2022-09-06', 1, 0, 0),
(1445, '36103392022-09-06already submitted to admin., waiting for approval', 361, ' 2022-09-06', '2022-09-06', '03:39 pm', 'Preparation for UTG Test for Air Receiver Tank ', 'GP-22-718', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'already submitted to admin., waiting for approval', '2022-09-06', 1, 0, 0),
(1446, '35903402022-09-06already compiled', 359, ' 2022-09-06', '2022-09-06', '03:40 pm', 'Preparation of Documents for PEZA Inspection at GP', 'GP-22-718', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'already compiled', '2022-09-06', 1, 0, 0),
(1447, '31103412022-09-06no findings', 311, ' 2022-09-06', '2022-09-06', '03:41 pm', 'Roving', 'GP-22-718', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'no findings', '2022-09-06', 1, 0, 0),
(1448, '36403422022-09-06Conduct of cleaning of aircon at saitama.', 364, ' 2022-09-06', '2022-09-06', '03:42 pm', 'PMS of ACUs', 'GP-22-730', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct of cleaning of aircon at saitama.', '2022-09-06', 1, 0, 0),
(1449, '34709242022-09-07Fix bugs and errorsForgot to finish in the system.', 347, ' 2022-09-06', '2022-09-07', '09:24 am', 'Coding Manpower System', 'GP-22-722', 'daily', 'September', NULL, 'week 36', 0, NULL, './uploaded_files/bbe13fec620bd2555bed26fb61912979.png', '2022', 'MIS', 1, 'Forgot to finish in the system.', 'Fix bugs and errors', '2022-09-06', 0.5, 0, 1),
(1450, '34709242022-09-07Fix bugs and errorsForgot to finish in the system.', 347, ' 2022-09-07', '2022-09-07', '09:24 am', 'Coding Manpower System', 'GP-22-722', 'daily', 'September', NULL, 'week 36', 0, NULL, './uploaded_files/bbe13fec620bd2555bed26fb61912979.png', '2022', 'MIS', 0, 'Forgot to finish in the system.', 'Fix bugs and errors', '2022-09-07', 1, 0, 0),
(1451, '32512062022-09-07Conducted cleaning of aircon filters', 325, ' 2022-09-07', '2022-09-07', '12:06 pm', 'Cleaning of Air con filters ', 'CG0676', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of aircon filters', '2022-09-07', 1, 0, 0),
(1452, '32612072022-09-07Conducted cleaning of exhaust fan', 326, ' 2022-09-07', '2022-09-07', '12:07 pm', 'Cleaning of exhaust Fan', 'CG0676', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of exhaust fan', '2022-09-07', 1, 0, 0),
(1453, '34112072022-09-07Conducted PMS of aircon', 341, ' 2022-09-07', '2022-09-07', '12:07 pm', 'PMS of Aircon', 'CG0676', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted PMS of aircon', '2022-09-07', 1, 0, 0),
(1457, '38112102022-09-07Conducted dry run of Genset', 381, ' 2022-09-07', '2022-09-07', '12:10 pm', 'Genset Dry run', 'CG0676', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted dry run of Genset', '2022-09-07', 1, 0, 0),
(1461, '32812142022-09-07Conducted cleaning of aircon filters', 328, ' 2022-09-07', '2022-09-07', '12:14 pm', 'Cleaning of Air con filters ', 'CG1420', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of aircon filters', '2022-09-07', 1, 0, 0),
(1462, '32912152022-09-07Conducted cleaning of exhaust fan', 329, ' 2022-09-07', '2022-09-07', '12:15 pm', 'Cleaning of exhaust Fan', 'CG1420', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of exhaust fan', '2022-09-07', 1, 0, 0),
(1466, '40512172022-09-07As per PEZA, reschedule was confirmed for 10 am of Wednesday. Done', 405, ' 2022-09-07', '2022-09-07', '12:17 pm', 'Contact PEZA for Schedule of Inpection', 'GP-18-614', 'annual', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'As per PEZA, reschedule was confirmed for 10 am of Wednesday. Done', '2022-09-07', 1, 0, 0),
(1468, '33812182022-09-07No found reported trouble in all building. Immediately endorsed back to guard house', 338, ' 2022-09-07', '2022-09-07', '12:18 pm', 'Security Guard Checklist', 'GP-18-614', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'No found reported trouble in all building. Immediately endorsed back to guard house all checklist fo', '2022-09-07', 1, 0, 0),
(1469, '39212192022-09-07Conduct checking of 250kg and 500kg hoist crane', 392, ' 2022-09-07', '2022-09-07', '12:19 pm', 'Checking of Hoist Crane', 'CG1805', 'monthly', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct checking of 250kg and 500kg hoist crane', '2022-09-07', 1, 0, 0),
(1512, '40012212022-09-07Perfomed. 1 trouble at GPI 5 was endorsed via emailThe actual activity was performe', 400, ' 2022-09-06', '2022-09-07', '12:21 pm', 'Security Guard Checklist', 'GP-18-614', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, 'The actual activity was performed. The update was not performed due to busy schedule.', 'Perfomed. 1 trouble at GPI 5 was endorsed via email', '2022-09-06', 1, 1, 0),
(1513, '40012212022-09-07Perfomed. 1 trouble at GPI 5 was endorsed via emailThe actual activity was performe', 400, ' 2022-09-07', '2022-09-07', '12:21 pm', 'Security Guard Checklist', 'GP-18-614', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, 'The actual activity was performed. The update was not performed due to busy schedule.', 'Perfomed. 1 trouble at GPI 5 was endorsed via email', '2022-09-07', 1, 0, 0),
(1535, '37112222022-09-07Conduct Dry run of Gen set on gpi 1 and 2', 371, ' 2022-09-07', '2022-09-07', '12:22 pm', 'Genset Dry run', 'CG1805', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct Dry run of Gen set on gpi 1 and 2', '2022-09-07', 1, 0, 0),
(1539, '40112232022-09-07Check G-DMS for pending IMS document for COA. Breakdown all pending for awareness a', 401, ' 2022-09-07', '2022-09-07', '12:23 pm', 'Prepare COA', 'GP-18-614', 'annual', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Check G-DMS for pending IMS document for COA. Breakdown all pending for awareness and encode to COA ', '2022-09-07', 1, 0, 0),
(1540, '42212232022-09-07Conduct painting of IDs on gpi 3', 422, ' 2022-09-07', '2022-09-07', '12:23 pm', 'Painting of IDs', 'CG1805', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct painting of IDs on gpi 3', '2022-09-07', 1, 0, 0),
(1541, '40212242022-09-07PRS of ACU #8 repair damage unit. Also encode to 250 for FEM Expenses monitoring fo', 402, ' 2022-09-07', '2022-09-07', '12:24 pm', 'Prepare PRS', 'GP-18-614', 'annual', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'PRS of ACU #8 repair damage unit. Also encode to 250 for FEM Expenses monitoring for F.Y 2022', '2022-09-07', 1, 0, 0),
(1542, '39312242022-09-07Conduct checking of Frequency Converter on gpi 1', 393, ' 2022-09-07', '2022-09-07', '12:24 pm', 'Checking of Frequency Converter', 'CG1805', 'monthly', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct checking of Frequency Converter on gpi 1', '2022-09-07', 1, 0, 0),
(1543, '40312262022-09-07Contact VAC-EX and Sontech Engineering for checking of Damage gutter at GPI 1 build', 403, ' 2022-09-07', '2022-09-07', '12:26 pm', 'Contact Service Provider', 'GP-18-614', 'annual', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Contact VAC-EX and Sontech Engineering for checking of Damage gutter at GPI 1 building and damage bu', '2022-09-07', 1, 0, 0),
(1544, '40412272022-09-07Revised PEZA letter and submit for approval. Signed by Ms. Gemma and President. End', 404, ' 2022-09-07', '2022-09-07', '12:27 pm', 'Finalize letter for PEZA', 'GP-18-614', 'annual', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Revised PEZA letter and submit for approval. Signed by Ms. Gemma and President. Endorsed back to Eng', '2022-09-07', 1, 0, 0),
(1545, '40612292022-09-07Create attachement of COA for Sub-contractors (Canteen Staff, Security at Suntrust ', 406, ' 2022-09-07', '2022-09-07', '12:29 pm', 'Prepare attachement for awareness of Subcon', 'GP-18-614', 'annual', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Create attachement of COA for Sub-contractors (Canteen Staff, Security at Suntrust and Security- Man', '2022-09-07', 1, 0, 0),
(1546, '34602-442022-09-07Check if the request for payment and summary report is correct and accurate', 346, ' 2022-09-07', '2022-09-07', '02:44 pm', 'Canteen Billing', 'GP-22-722', 'weekly', 'September', NULL, 'week 36', 36, '2022-09-05', '', '2022', 'MIS', 0, '', 'Check if the request for payment and summary report is correct and accurate', '2022-09-07', 1, 0, 0),
(1547, '34803002022-09-07Check JOnalimutan ko sir hehe', 348, ' 2022-09-06', '2022-09-07', '03:00 pm', 'Attending pending JO request', 'GP-22-729', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'MIS', 1, 'nalimutan ko sir hehe', 'Check JO', '2022-09-06', 0.5, 0, 1),
(1548, '34803002022-09-07Check JOnalimutan ko sir hehe', 348, ' 2022-09-07', '2022-09-07', '03:00 pm', 'Attending pending JO request', 'GP-22-729', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'MIS', 0, 'nalimutan ko sir hehe', 'Check JO', '2022-09-07', 1, 0, 0),
(1549, '35103012022-09-07Automated monitoringAutomated monitoring, no problem found', 351, ' 2022-09-06', '2022-09-07', '03:01 pm', 'Checking of network and mail security', 'GP-22-729', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'MIS', 1, 'Automated monitoring, no problem found', 'Automated monitoring', '2022-09-06', 0.5, 0, 1),
(1550, '35103012022-09-07Automated monitoringAutomated monitoring, no problem found', 351, ' 2022-09-07', '2022-09-07', '03:01 pm', 'Checking of network and mail security', 'GP-22-729', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'MIS', 0, 'Automated monitoring, no problem found', 'Automated monitoring', '2022-09-07', 1, 0, 0),
(1551, '35003012022-09-071.Performed reformatting PC.', 350, ' 2022-09-07', '2022-09-07', '03:01 pm', 'Attending pending JO request', 'CG1732', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'MIS', 0, '', '1.Performed reformatting PC.', '2022-09-07', 1, 0, 0),
(1552, '40803032022-09-07All quotation are requested. PRS ACU #8 and re-PRS to request for discount in the s', 408, ' 2022-09-07', '2022-09-07', '03:03 pm', 'Prepare of Documents for PRS', 'GP-18-614', 'annual', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'All quotation are requested. PRS ACU #8 and re-PRS to request for discount in the service provider. ', '2022-09-07', 1, 0, 0),
(1553, '40703042022-09-07Checked all consumables and endorsed the list of items with imbalances to FEM Staff', 407, ' 2022-09-07', '2022-09-07', '03:04 pm', 'Check and Balance of Stocks system', 'GP-18-614', 'annual', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Checked all consumables and endorsed the list of items with imbalances to FEM Staff to verify unenco', '2022-09-07', 1, 0, 0),
(1554, '34203082022-09-07Conducted PMS of aircon', 342, ' 2022-09-07', '2022-09-07', '03:08 pm', 'PMS of Aircon', 'CG1420', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted PMS of aircon', '2022-09-07', 1, 0, 0),
(1557, '37603102022-09-07Conducted dry run of genset', 376, ' 2022-09-07', '2022-09-07', '03:10 pm', 'Genset Dry run', 'CG1420', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted dry run of genset', '2022-09-07', 1, 0, 0),
(1558, '33403112022-09-07Conduct cleaning of Air con filters', 334, ' 2022-09-07', '2022-09-07', '03:11 pm', 'Cleaning of Air con filters ', 'CG1805', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct cleaning of Air con filters', '2022-09-07', 1, 0, 0),
(1559, '33503122022-09-07Conduct cleaning of Exhaust fan', 335, ' 2022-09-07', '2022-09-07', '03:12 pm', 'Cleaning of exhaust Fan', 'CG1805', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct cleaning of Exhaust fan', '2022-09-07', 1, 0, 0),
(1560, '34403122022-09-07Conduct PMs of ACUs', 344, ' 2022-09-07', '2022-09-07', '03:12 pm', 'PM of ACUs', 'CG1805', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct PMs of ACUs', '2022-09-07', 1, 0, 0),
(1563, '37003132022-09-07Conduct PMs of Air con', 370, ' 2022-09-07', '2022-09-07', '03:13 pm', ' PMs of Air con', 'CG1805', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct PMs of Air con', '2022-09-07', 1, 0, 0),
(1564, '42303322022-09-07Replacement of door knob and repair.', 423, ' 2022-09-07', '2022-09-07', '03:32 pm', 'repair of exit door', 'GP-22-730', 'annual', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Replacement of door knob and repair.', '2022-09-07', 1, 0, 0),
(1565, '41803332022-09-07already painting the id back to back and already endorsed to ms. Aileen.', 418, ' 2022-09-07', '2022-09-07', '03:33 pm', 'Painting of IDs', 'GP-22-730', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'already painting the id back to back and already endorsed to ms. Aileen.', '2022-09-07', 1, 0, 0),
(1569, '38803392022-09-07already finish september 6,2022', 388, ' 2022-09-07', '2022-09-07', '03:39 pm', 'Checking of Frequency Converter', 'GP-22-730', 'monthly', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'already finish september 6,2022', '2022-09-07', 1, 0, 0),
(1570, '38703402022-09-07already finish september 6,2022', 387, ' 2022-09-07', '2022-09-07', '03:40 pm', 'Checking of Hoist Crane', 'GP-22-730', 'monthly', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'already finish september 6,2022', '2022-09-07', 1, 0, 0),
(1572, '36603412022-09-07already dry run of genset last september 5.', 366, ' 2022-09-07', '2022-09-07', '03:41 pm', 'Genset Dry run', 'GP-22-730', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'already dry run of genset last september 5.', '2022-09-07', 1, 0, 0),
(1576, '36403432022-09-07already finished of cleaning aircon', 364, ' 2022-09-07', '2022-09-07', '03:43 pm', 'PMS of ACUs', 'GP-22-730', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'already finished of cleaning aircon', '2022-09-07', 1, 0, 0),
(1579, '32203452022-09-07already finished of cleaning', 322, ' 2022-09-07', '2022-09-07', '03:45 pm', 'Cleaning of exhaust Fan', 'GP-22-730', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'already finished of cleaning', '2022-09-07', 1, 0, 0),
(1580, '32103452022-09-07already cleaning of filter of aircon', 321, ' 2022-09-07', '2022-09-07', '03:45 pm', 'Cleaning of Air con filters ', 'GP-22-730', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'already cleaning of filter of aircon', '2022-09-07', 1, 0, 0),
(1581, '31103522022-09-07Not applicable today due to schedule PEZA compliance today at GPI 8 and submission ', 311, ' 2022-09-07', '2022-09-07', '03:52 pm', 'Roving', 'GP-22-718', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Not applicable today due to schedule PEZA compliance today at GPI 8 and submission of letter for ren', '2022-09-07', 1, 0, 0),
(1582, '31203532022-09-07Already present to contractor for request quotation.', 312, ' 2022-09-07', '2022-09-07', '03:53 pm', 'GPI 8 Warehouse Layout', 'GP-22-718', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Already present to contractor for request quotation.', '2022-09-07', 1, 0, 0),
(1583, '36003552022-09-07PEZA  Inspection is already done and no findings.', 360, ' 2022-09-07', '2022-09-07', '03:55 pm', 'PEZA Inspection for GPI 8 (Additional Injection Ma', 'GP-22-718', 'annual', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'PEZA  Inspection is already done and no findings.', '2022-09-07', 1, 0, 0),
(1584, '35303552022-09-07Process billing (September 7, 2022)', 353, ' 2022-09-07', '2022-09-07', '03:55 pm', 'Billing Smart', 'cg1374', 'monthly', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'MIS', 0, '', 'Process billing (September 7, 2022)', '2022-09-07', 1, 0, 0),
(1585, '35503562022-09-07Checking pending JO', 355, ' 2022-09-07', '2022-09-07', '03:56 pm', 'Checking of pending JO', 'cg1374', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'MIS', 0, '', 'Checking pending JO', '2022-09-07', 1, 0, 0),
(1586, '36103562022-09-07Waiting for approval/signature by management.', 361, ' 2022-09-07', '2022-09-07', '03:56 pm', 'Preparation for UTG Test for Air Receiver Tank ', 'GP-22-718', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Waiting for approval/signature by management.', '2022-09-07', 1, 0, 0),
(1587, '35603582022-09-07Process the billings for rental and consumption.\r\nGenerated and submit the report o', 356, ' 2022-09-07', '2022-09-07', '03:58 pm', 'Billing Ricoh', 'cg1374', 'monthly', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'MIS', 0, '', 'Process the billings for rental and consumption.\r\nGenerated and submit the report on printer consump', '2022-09-07', 1, 0, 0),
(1588, '41807152022-09-08PAINT ID', 418, ' 2022-09-08', '2022-09-08', '07:15 am', 'Painting of IDs', 'GP-22-730', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'PAINT ID', '2022-09-08', 1, 0, 0),
(1589, '33808392022-09-08No found trouble. Endorsed to security on duty at GPI 1', 338, ' 2022-09-08', '2022-09-08', '08:39 am', 'Security Guard Checklist', 'GP-18-614', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'No found trouble. Endorsed to security on duty at GPI 1', '2022-09-08', 1, 0, 0),
(1590, '40008412022-09-08No found trouble. Endorsed to guards on duty at GPI 1.', 400, ' 2022-09-08', '2022-09-08', '08:41 am', 'Security Guard Checklist', 'GP-18-614', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'No found trouble. Endorsed to guards on duty at GPI 1.', '2022-09-08', 1, 0, 0),
(1591, '42508422022-09-08requested MIS Cedrick to set up computer and projector in Conference Room 1 &2. Req', 425, ' 2022-09-08', '2022-09-08', '08:42 am', 'Preparation of G-DMS / IMS documents for aware (Mo', 'GP-18-614', 'annual', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'requested MIS Cedrick to set up computer and projector in Conference Room 1 &2. Request for VNC and ', '2022-09-08', 1, 0, 0),
(1592, '42608462022-09-08Check previous request of all items out in supplies. Write down all forecasted item', 426, ' 2022-09-08', '2022-09-08', '08:46 am', 'Prepare and submit consumables report to Admin Sup', 'GP-18-614', 'annual', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Check previous request of all items out in supplies. Write down all forecasted item for month of sep', '2022-09-08', 1, 0, 0),
(1593, '42708492022-09-08Disseminate COA to all admin Members during awareness and after. Check all COA with', 427, ' 2022-09-08', '2022-09-08', '08:49 am', 'Disseminate COA to all Admin Members and Subcontra', 'GP-18-614', 'annual', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Disseminate COA to all admin Members during awareness and after. Check all COA without signature and', '2022-09-08', 1, 0, 0),
(1594, '42808512022-09-08All GDMS approved and emailed information that needed to aware are encoded to the C', 428, ' 2022-09-08', '2022-09-08', '08:51 am', 'Encode new batch of awareness in COA Form', 'GP-18-614', 'annual', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'All GDMS approved and emailed information that needed to aware are encoded to the COA form right awa', '2022-09-08', 1, 0, 0),
(1595, '42908542022-09-08I received a returned PRS from Ms. Gemma to request to negotiate the price of the s', 429, ' 2022-09-08', '2022-09-08', '08:54 am', 'Contact Negative Zero to negotiate discount on ACU', 'GP-18-614', 'annual', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'I received a returned PRS from Ms. Gemma to request to negotiate the price of the sevice. I contact ', '2022-09-08', 1, 0, 0),
(1596, '43008562022-09-08Every items we PRS comes with monitoring record at 250. I re-PRS the quotation afte', 430, ' 2022-09-08', '2022-09-08', '08:56 am', 'Re-PRS and re-encode revised quotation', 'GP-18-614', 'annual', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Every items we PRS comes with monitoring record at 250. I re-PRS the quotation after be given a disc', '2022-09-08', 1, 0, 0),
(1597, '43108582022-09-08To keep up all the cost per ACU and other equipment I continued the activity of sav', 431, ' 2022-09-08', '2022-09-08', '08:58 am', 'Export Service report and quotation of ACUs to Air', 'GP-18-614', 'annual', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'To keep up all the cost per ACU and other equipment I continued the activity of saving service repor', '2022-09-08', 1, 0, 0),
(1598, '32809342022-09-08Conducted cleaning of air filters of ACU. no. 17,18,19,20,21,22', 328, ' 2022-09-08', '2022-09-08', '09:34 am', 'Cleaning of Air con filters ', 'CG1420', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of air filters of ACU. no. 17,18,19,20,21,22', '2022-09-08', 1, 0, 0),
(1599, '32909352022-09-08Conducted cleaning of exhaust fan at locker area', 329, ' 2022-09-08', '2022-09-08', '09:35 am', 'Cleaning of exhaust Fan', 'CG1420', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of exhaust fan at locker area', '2022-09-08', 1, 0, 0),
(1600, '34209372022-09-08Conducted PMS of ACU. no. 9 and 10', 342, ' 2022-09-08', '2022-09-08', '09:37 am', 'PMS of Aircon', 'CG1420', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted PMS of ACU. no. 9 and 10 at RBW 100', '2022-09-08', 1, 0, 0),
(1601, '32509382022-09-08Conducted cleaning of air filters of ACU. no. 17,18,19,20,21,22', 325, ' 2022-09-08', '2022-09-08', '09:38 am', 'Cleaning of Air con filters ', 'CG0676', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of air filters of ACU. no. 17,18,19,20,21,22', '2022-09-08', 1, 0, 0),
(1602, '32609392022-09-08Conducted cleaning of exhaust fan at locker area', 326, ' 2022-09-08', '2022-09-08', '09:39 am', 'Cleaning of exhaust Fan', 'CG0676', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of exhaust fan at locker area', '2022-09-08', 1, 0, 0),
(1603, '34109402022-09-08Conducted PMS of ACU. no. 9 and 10', 341, ' 2022-09-08', '2022-09-08', '09:40 am', 'PMS of Aircon', 'CG0676', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted PMS of ACU. no. 9 and 10 at RBW-100', '2022-09-08', 1, 0, 0),
(1616, '38109452022-09-08Conducted dry run of genset at GPI-5', 381, ' 2022-09-08', '2022-09-08', '09:45 am', 'Genset Dry run', 'CG0676', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted dry run of genset at GPI-5', '2022-09-08', 1, 0, 0),
(1618, '39409462022-09-08Conducted cleaning of air filters of ACU. no. 17,18,19,20,21,22', 394, ' 2022-09-07', '2022-09-08', '09:46 am', 'Cleaning of Air con filters ', 'CG1420', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 1, '', 'Conducted cleaning of air filters of ACU. no. 17,18,19,20,21,22', '2022-09-07', 0.5, 0, 1),
(1619, '39409462022-09-08Conducted cleaning of air filters of ACU. no. 17,18,19,20,21,22', 394, ' 2022-09-08', '2022-09-08', '09:46 am', 'Cleaning of Air con filters ', 'CG1420', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of air filters of ACU. no. 17,18,19,20,21,22', '2022-09-08', 1, 0, 0),
(1629, '37609502022-09-08Conducted dry run of genset at GPI-5', 376, ' 2022-09-08', '2022-09-08', '09:50 am', 'Genset Dry run', 'CG1420', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted dry run of genset at GPI-5', '2022-09-08', 1, 0, 0),
(1630, '42209502022-09-08Conduct painting of IDs\r\n', 422, ' 2022-09-08', '2022-09-08', '09:50 am', 'Painting of IDs', 'CG1805', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct painting of IDs\r\n', '2022-09-08', 1, 0, 0),
(1637, '37109552022-09-08Conduct Dry Run of Genset', 371, ' 2022-09-08', '2022-09-08', '09:55 am', 'Genset Dry run', 'CG1805', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct Dry Run of Genset', '2022-09-08', 1, 0, 0),
(1638, '37009552022-09-08Conduct PMs of Air Con', 370, ' 2022-09-08', '2022-09-08', '09:55 am', ' PMs of Air con', 'CG1805', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct PMs of Air Con', '2022-09-08', 1, 0, 0),
(1639, '42409552022-09-08already repaired of mop squeezer. ', 424, ' 2022-09-08', '2022-09-08', '09:55 am', 'Repair the Mop Squeezer of FEM', 'GP-22-730', 'annual', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'already repaired of mop squeezer. ', '2022-09-08', 1, 0, 0);
INSERT INTO `finishedtask` (`FinishedTaskID`, `sameID`, `taskID`, `Date`, `DateSubmitted`, `timestamp`, `task_Name`, `in_charge`, `sched_Type`, `month`, `firstDateOfTheMonth`, `week`, `weekNumber`, `lastMonday`, `attachments`, `year`, `Department`, `noOfDaysLate`, `reason`, `action`, `realDate`, `score`, `isCheckedByLeader`, `isLate`) VALUES
(1642, '32109572022-09-08cleaning of filter number pac 1-1,1-2,1-3,1-4,1-5,and 29,30', 321, ' 2022-09-08', '2022-09-08', '09:57 am', 'Cleaning of Air con filters ', 'GP-22-730', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'cleaning of filter number pac 1-1,1-2,1-3,1-4,1-5,and 29,30', '2022-09-08', 1, 0, 0),
(1643, '33409572022-09-08Conduct cleaning of Air Con filters', 334, ' 2022-09-08', '2022-09-08', '09:57 am', 'Cleaning of Air con filters ', 'CG1805', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct cleaning of Air Con filters', '2022-09-08', 1, 0, 0),
(1644, '32209582022-09-08conduct of cleaning of exhaust fan at con.5,male and female and guest toilet.', 322, ' 2022-09-08', '2022-09-08', '09:58 am', 'Cleaning of exhaust Fan', 'GP-22-730', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'conduct of cleaning of exhaust fan at con.5,male and female and guest toilet.', '2022-09-08', 1, 0, 0),
(1645, '36609592022-09-08already done last September 5', 366, ' 2022-09-08', '2022-09-08', '09:59 am', 'Genset Dry run', 'GP-22-730', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'already done last September 5', '2022-09-08', 1, 0, 0),
(1646, '35001272022-09-08Wring LAN cable, deploying reformat pc.', 350, ' 2022-09-08', '2022-09-08', '01:27 pm', 'Attending pending JO request', 'CG1732', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'MIS', 0, '', 'Wring LAN cable, deploying reformat pc.', '2022-09-08', 1, 0, 0),
(1647, '34801292022-09-08Perfom Job Order request M2209-273 (Created email for Bobby John)', 348, ' 2022-09-08', '2022-09-08', '01:29 pm', 'Attending pending JO request', 'GP-22-729', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'MIS', 0, '', 'Perfom Job Order request M2209-273 (Created email for Bobby John)', '2022-09-08', 1, 0, 0),
(1648, '35101352022-09-08Mail - working properly\r\nNetwork - Suntrust high latency (PLDT)', 351, ' 2022-09-08', '2022-09-08', '01:35 pm', 'Checking of network and mail security', 'GP-22-729', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'MIS', 0, '', 'Mail - working properly\r\nNetwork - Suntrust high latency (PLDT)', '2022-09-08', 1, 0, 0),
(1649, '33502112022-09-08Conduct cleaning of Exhaust fan', 335, ' 2022-09-08', '2022-09-08', '02:11 pm', 'Cleaning of exhaust Fan', 'CG1805', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct cleaning of Exhaust fan', '2022-09-08', 1, 0, 0),
(1650, '36103082022-09-08PRS is ongoing for approval of management', 361, ' 2022-09-08', '2022-09-08', '03:08 pm', 'Preparation for UTG Test for Air Receiver Tank ', 'GP-22-718', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'PRS is ongoing for approval of management', '2022-09-08', 1, 0, 0),
(1651, '31203102022-09-08Already presented to contractor for request quotation.', 312, ' 2022-09-08', '2022-09-08', '03:10 pm', 'GPI 8 Warehouse Layout', 'GP-22-718', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Already presented to contractor for request quotation.', '2022-09-08', 1, 0, 0),
(1652, '34403352022-09-08Conduct PM of ACUs', 344, ' 2022-09-08', '2022-09-08', '03:35 pm', 'PM of ACUs', 'CG1805', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct PM of ACUs', '2022-09-08', 1, 0, 0),
(1655, '44203362022-09-08Replacement of Lavatory faucet at GPI 1 near Agency', 442, ' 2022-09-08', '2022-09-08', '03:36 pm', 'PERFORM JOB ORDER', 'CG1805', 'annual', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Replacement of Lavatory faucet at GPI 1 near Agency', '2022-09-08', 1, 0, 0),
(1657, '36403392022-09-08Conduct pm of aircon at DOK area.', 364, ' 2022-09-08', '2022-09-08', '03:39 pm', 'PMS of ACUs', 'GP-22-730', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct pm of aircon at DOK area.', '2022-09-08', 1, 0, 0),
(1667, '43404082022-09-08CLEANING OF FILTER AT PAC 1-1,1-2,1-3,1-4,1-5,29,30', 434, ' 2022-09-08', '2022-09-08', '04:08 pm', 'Cleaning of Filters', 'GP-22-730', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'CLEANING OF FILTER AT PAC 1-1,1-2,1-3,1-4,1-5,29,30', '2022-09-08', 1, 0, 0),
(1668, '43504092022-09-08CONDUCT BUILDING MAINTENANCE AT AL GPI EXCEPT GPI 8 ', 435, ' 2022-09-08', '2022-09-08', '04:09 pm', 'Inspection of Building Maintenance', 'GP-22-730', 'monthly', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'CONDUCT BUILDING MAINTENANCE AT AL GPI EXCEPT GPI 8 ', '2022-09-08', 1, 0, 0),
(1669, '43604102022-09-08DISPOSED ALL HAZARDOUS ITEM', 436, ' 2022-09-08', '2022-09-08', '04:10 pm', 'Disposal of hazardous waste', 'GP-22-730', 'monthly', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'DISPOSED ALL HAZARDOUS ITEM', '2022-09-08', 1, 0, 0),
(1670, '43704102022-09-08REPLACE OF LAVATORY FAUCET AT AGENCY OFFICE', 437, ' 2022-09-08', '2022-09-08', '04:10 pm', 'Perform Job order request', 'GP-22-730', 'annual', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'REPLACE OF LAVATORY FAUCET AT AGENCY OFFICE', '2022-09-08', 1, 0, 0),
(1671, '43804112022-09-08Conduct PM of Air con', 438, ' 2022-09-08', '2022-09-08', '04:11 pm', 'PM of ACUs', 'CG1805', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct PM of Air con', '2022-09-08', 1, 0, 0),
(1672, '44104112022-09-08Dispose Hazardous waste', 441, ' 2022-09-08', '2022-09-08', '04:11 pm', 'DISPOSAL OF HAZARDOUS WASTE', 'CG1805', 'monthly', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Dispose Hazardous waste', '2022-09-08', 1, 0, 0),
(1673, '44304122022-09-08Inspect all building except gpi 8', 443, ' 2022-09-08', '2022-09-08', '04:12 pm', 'Building Inspection', 'CG1805', 'monthly', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Inspect all building except gpi 8', '2022-09-08', 1, 0, 0),
(1674, '33807302022-09-09Already checked security guard checkist. No trouble was found. ', 338, ' 2022-09-09', '2022-09-09', '07:30 am', 'Security Guard Checklist', 'GP-18-614', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Already checked security guard checkist. No trouble was found. ', '2022-09-09', 1, 0, 0),
(1675, '40007312022-09-09Duplicated task for daily routine. ', 400, ' 2022-09-09', '2022-09-09', '07:31 am', 'Security Guard Checklist', 'GP-18-614', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Duplicated task for daily routine. ', '2022-09-09', 1, 0, 0),
(1676, '45007382022-09-09Fixed the disconnected chain of tank lever at cubicle no. 08.\r\nReplacement of damag', 450, ' 2022-09-09', '2022-09-09', '07:38 am', 'perform job order request', 'CG0676', 'annual', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'FEM', 527714, '', 'Fixed the disconnected chain of tank lever at cubicle no. 08.\r\nReplacement of damaged door lock at c', '0000-00-00', 0, 0, 1),
(1677, '45107392022-09-09Replacement of damaged/busted light at BRM area', 451, ' 2022-09-09', '2022-09-09', '07:39 am', 'replacement of busted  18 watts light', 'CG0676', 'annual', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Replacement of damaged/busted light at BRM area', '2022-09-09', 1, 0, 0),
(1678, '44607422022-09-09Replacement of damaged/busted light at BRM area', 446, ' 2022-09-09', '2022-09-09', '07:42 am', 'replacement of busted light', 'CG1420', 'annual', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Replacement of damaged/busted light at BRM area', '2022-09-09', 1, 0, 0),
(1679, '44707442022-09-09Fixed the disconnected chain of tank lever at cubicle no.08.\r\nReplacement of damage', 447, ' 2022-09-09', '2022-09-09', '07:44 am', 'Perform JOB ORDER', 'CG1420', 'annual', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Fixed the disconnected chain of tank lever at cubicle no.08.\r\nReplacement of damaged door lock of cu', '2022-09-08', 1, 1, 0),
(1681, '33408472022-09-09Conduct cleaning of Air con filters', 334, ' 2022-09-09', '2022-09-09', '08:47 am', 'Cleaning of Air con filters ', 'CG1805', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct cleaning of Air con filters', '2022-09-09', 1, 0, 0),
(1682, '33508472022-09-09Conduct cleaning of Exhaust fan', 335, ' 2022-09-09', '2022-09-09', '08:47 am', 'Cleaning of exhaust Fan', 'CG1805', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct cleaning of Exhaust fan', '2022-09-09', 1, 0, 0),
(1683, '34408472022-09-09Conduct PM of ACUs', 344, ' 2022-09-09', '2022-09-09', '08:47 am', 'PM of ACUs', 'CG1805', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct PM of ACUs', '2022-09-09', 1, 0, 0),
(1686, '37008482022-09-09Conduct PMs of Air con', 370, ' 2022-09-09', '2022-09-09', '08:48 am', ' PMs of Air con', 'CG1805', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct PMs of Air con', '2022-09-09', 1, 0, 0),
(1687, '37108492022-09-09Conduct Dry run of Genset at gpi 1 and 2', 371, ' 2022-09-09', '2022-09-09', '08:49 am', 'Genset Dry run', 'CG1805', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct Dry run of Genset at gpi 1 and 2', '2022-09-09', 1, 0, 0),
(1694, '46109242022-09-09Replacement of damage aircon  belt at GPI-5 canteen', 461, ' 2022-09-09', '2022-09-09', '09:24 am', 'Checking of Aircon at Canteen ', 'CG0676', 'annual', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Replacement of damage aircon  belt at GPI-5 canteen', '2022-09-09', 1, 0, 0),
(1695, '46209272022-09-09Replacement of damage aircon belt at GPI-5 canteen', 462, ' 2022-09-09', '2022-09-09', '09:27 am', 'Checking of Aircon at Canteen', 'CG1420', 'annual', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Replacement of damage aircon belt at GPI-5 canteen', '2022-09-09', 1, 0, 0),
(1696, '32809472022-09-09Conducted cleaning of aircon filters of ACU. no. 23,24,25,26,27,28,29,30', 328, ' 2022-09-09', '2022-09-09', '09:47 am', 'Cleaning of Air con filters ', 'CG1420', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of aircon filters of ACU. no. 23,24,25,26,27,28,29,30', '2022-09-09', 1, 0, 0),
(1698, '36109482022-09-09Now already subject for purchase order .', 361, ' 2022-09-09', '2022-09-09', '09:48 am', 'Preparation for UTG Test for Air Receiver Tank ', 'GP-22-718', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Now already subject for purchase order .', '2022-09-09', 1, 0, 0),
(1699, '39409482022-09-09Conducted cleaning of aircon filters of ACU. no. 23,24,25,26,27,28,29,30', 394, ' 2022-09-09', '2022-09-09', '09:48 am', 'Cleaning of Air con filters ', 'CG1420', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of aircon filters of ACU. no. 23,24,25,26,27,28,29,30', '2022-09-09', 1, 0, 0),
(1703, '32509502022-09-09Conducted cleaning of aircon filters of ACU. no. 23,24,25,26,27,28,29,30', 325, ' 2022-09-09', '2022-09-09', '09:50 am', 'Cleaning of Air con filters ', 'CG0676', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of aircon filters of ACU. no. 23,24,25,26,27,28,29,30', '2022-09-09', 1, 0, 0),
(1709, '32609552022-09-09Conducted cleaning of exhaust fan at male and female locker', 326, ' 2022-09-09', '2022-09-09', '09:55 am', 'Cleaning of exhaust Fan', 'CG0676', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of exhaust fan at male and female locker', '2022-09-09', 1, 0, 0),
(1714, '32909572022-09-09Conducted cleaning of exhaust fan at male and female locker', 329, ' 2022-09-09', '2022-09-09', '09:57 am', 'Cleaning of exhaust Fan', 'CG1420', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of exhaust fan at male and female locker', '2022-09-09', 1, 0, 0),
(1721, '44811012022-09-09Conducted cleaning and PM of acu no.18 and 19', 448, ' 2022-09-08', '2022-09-09', '11:01 am', 'PM of ACUs', 'CG0676', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 1, '', 'Conducted cleaning and PM of acu no.18 and 19', '2022-09-08', 0.5, 0, 1),
(1722, '44811012022-09-09Conducted cleaning and PM of acu no.18 and 19', 448, ' 2022-09-09', '2022-09-09', '11:01 am', 'PM of ACUs', 'CG0676', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning and PM of acu no.18 and 19', '2022-09-09', 1, 0, 0),
(1725, '38112342022-09-09Conducted dry run of gen set at GPI-5', 381, ' 2022-09-09', '2022-09-09', '12:34 pm', 'Genset Dry run', 'CG0676', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted dry run of gen set at GPI-5', '2022-09-09', 1, 0, 0),
(1729, '37612362022-09-09Conducted dry run of gen set at GPI-5', 376, ' 2022-09-09', '2022-09-09', '12:36 pm', 'Genset Dry run', 'CG1420', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted dry run of gen set at GPI-5', '2022-09-09', 1, 0, 0),
(1731, '34102152022-09-09Conducted PMS of ACU. no.11', 341, ' 2022-09-09', '2022-09-09', '02:15 pm', 'PMS of Aircon', 'CG0676', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted PMS of ACU. no.11', '2022-09-09', 1, 0, 0),
(1736, '34202182022-09-09Conducted PMS of ACU no.11', 342, ' 2022-09-09', '2022-09-09', '02:18 pm', 'PMS of Aircon', 'CG1420', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted PMS of ACU no.11', '2022-09-09', 1, 0, 0),
(1740, '45402222022-09-09Conducted cleaning of filters of air compressor.', 454, ' 2022-09-09', '2022-09-09', '02:22 pm', 'Cleaning of filter of Aircompressor', 'CG1420', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of filters of air compressor.', '2022-09-09', 1, 0, 0),
(1741, '32102272022-09-09CLEANING OF FILTER', 321, ' 2022-09-09', '2022-09-09', '02:27 pm', 'Cleaning of Air con filters ', 'GP-22-730', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'CLEANING OF FILTER', '2022-09-09', 1, 0, 0),
(1742, '32202272022-09-09CLEANING OF EXHAUST MALE AND FEMALE CR.', 322, ' 2022-09-09', '2022-09-09', '02:27 pm', 'Cleaning of exhaust Fan', 'GP-22-730', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'CLEANING OF EXHAUST MALE AND FEMALE CR.', '2022-09-09', 1, 0, 0),
(1745, '36602292022-09-09ALREADY DONE LAST SEPTEMBER 5.', 366, ' 2022-09-09', '2022-09-09', '02:29 pm', 'Genset Dry run', 'GP-22-730', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'ALREADY DONE LAST SEPTEMBER 5.', '2022-09-09', 1, 0, 0),
(1750, '35502382022-09-09Checking of Pending JO', 355, ' 2022-09-08', '2022-09-09', '02:38 pm', 'Checking of pending JO', 'cg1374', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'MIS', 1, '', 'Checking of Pending JO', '2022-09-08', 0.5, 0, 1),
(1751, '35502382022-09-09Checking of Pending JO', 355, ' 2022-09-09', '2022-09-09', '02:38 pm', 'Checking of pending JO', 'cg1374', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'MIS', 0, '', 'Checking of Pending JO', '2022-09-09', 1, 0, 0),
(1752, '31203072022-09-09already finish', 312, ' 2022-09-09', '2022-09-09', '03:07 pm', 'GPI 8 Warehouse Layout', 'GP-22-718', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'already finish', '2022-09-09', 1, 0, 0),
(1753, '31103242022-09-09conduct roving around 3pm at GPI 2,3,7,9 and no finding to concern. ', 311, ' 2022-09-09', '2022-09-09', '03:24 pm', 'Roving', 'GP-22-718', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'conduct roving around 3pm at GPI 2,3,7,9 and no finding to concern. ', '2022-09-09', 1, 0, 0),
(1754, '45903422022-09-09Disposal of waste', 459, ' 2022-09-09', '2022-09-09', '03:42 pm', 'Disposal of waste', 'CG0676', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Disposal of waste', '2022-09-09', 1, 0, 0),
(1755, '46303442022-09-09Disposal of waste', 463, ' 2022-09-09', '2022-09-09', '03:44 pm', 'Disposal of Waste', 'CG1420', 'monthly', 'September', '2022-09-01', 'week 36', 0, NULL, '', '2022', 'FEM', 0, '', 'Disposal of waste', '2022-09-09', 1, 0, 0),
(1756, '3470733Review the existing system and create design ideas\r\nNeeded to update Task Monitoring System a', 347, ' 2022-09-08', '2022-09-10', '07:33 am', 'Coding Manpower System', 'GP-22-722', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'MIS', 2, 'Needed to update Task Monitoring System and create a volleyball Scoring board', 'Review the existing system and create design ideas\r\n', '2022-09-08', 0.5, 0, 1),
(1757, '34707332022-09-10Review the existing system and create design ideas\r\nNeeded to update Task Monitorin', 347, ' 2022-09-09', '2022-09-10', '07:33 am', 'Coding Manpower System', 'GP-22-722', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'MIS', 1, 'Needed to update Task Monitoring System and create a volleyball Scoring board', 'Review the existing system and create design ideas\r\n', '2022-09-09', 1, 0, 1),
(1758, '36412242022-09-10CLEANING OF AIRCON OVERTIME HOURS.not access due to office hours at QA OFFICE. BUT ', 364, ' 2022-09-09', '2022-09-10', '12:24 pm', 'PMS of ACUs', 'GP-22-730', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 0, 'not access due to office hours at QA OFFICE. BUT PERFORMED OVERTIME WITH EDVIR LUMAGUI AND JEN MARK RONDERO.', 'CLEANING OF AIRCON OVERTIME HOURS.', '2022-09-09', 1, 1, 0),
(1763, '34507322022-09-12created report for pms.', 345, ' 2022-09-12', '2022-09-12', '07:32 am', 'Computer PMS', 'GP-22-722', 'monthly', 'September', '2022-09-01', 'week 37', 0, NULL, '', '2022', 'MIS', 0, '', 'created report for pms.', '2022-09-12', 1, 0, 0),
(1764, '32510312022-09-12Cleaning of aircon filters of Parts Receiving and P.I.', 325, ' 2022-09-12', '2022-09-12', '10:31 am', 'Cleaning of Air con filters ', 'CG0676', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Cleaning of aircon filters of Parts Receiving and P.I.', '2022-09-12', 1, 0, 0),
(1768, '32610322022-09-12Conducted cleaning of exhaust fan', 326, ' 2022-09-12', '2022-09-12', '10:32 am', 'Cleaning of exhaust Fan', 'CG0676', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of exhaust fan', '2022-09-12', 1, 0, 0),
(1772, '32810352022-09-12Cleaning of aircon filters of Parts Receiving and P.I.', 328, ' 2022-09-12', '2022-09-12', '10:35 am', 'Cleaning of Air con filters ', 'CG1420', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Cleaning of aircon filters of Parts Receiving and P.I.', '2022-09-12', 1, 0, 0),
(1774, '39410362022-09-12Cleaning of aircon filters of Parts Receiving and P.I.', 394, ' 2022-09-12', '2022-09-12', '10:36 am', 'Cleaning of Air con filters ', 'CG1420', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Cleaning of aircon filters of Parts Receiving and P.I.', '2022-09-12', 1, 0, 0),
(1777, '32910372022-09-12Conducted cleaning of exhaust fan', 329, ' 2022-09-12', '2022-09-12', '10:37 am', 'Cleaning of exhaust Fan', 'CG1420', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of exhaust fan', '2022-09-12', 1, 0, 0),
(1780, '34212262022-09-12Conducted cleaning of ACU no.14', 342, ' 2022-09-12', '2022-09-12', '12:26 pm', 'PMS of Aircon', 'CG1420', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of ACU no.14', '2022-09-12', 1, 0, 0),
(1783, '37612272022-09-12Conducted dry run of gen set at GPI-5', 376, ' 2022-09-12', '2022-09-12', '12:27 pm', 'Genset Dry run', 'CG1420', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted dry run of gen set at GPI-5', '2022-09-12', 1, 0, 0),
(1784, '34112282022-09-12Conducted cleaning of ACU no.14', 341, ' 2022-09-12', '2022-09-12', '12:28 pm', 'PMS of Aircon', 'CG0676', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of ACU no.14', '2022-09-12', 1, 0, 0),
(1787, '38112302022-09-12Conducted dry run of gen set at GPI-5', 381, ' 2022-09-12', '2022-09-12', '12:30 pm', 'Genset Dry run', 'CG0676', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted dry run of gen set at GPI-5', '2022-09-12', 1, 0, 0),
(1789, '47303272022-09-12Waiting for contactor quotation to include in proposal', 473, ' 2022-09-12', '2022-09-12', '03:27 pm', 'Additional Aircon Proposal', 'GP-22-718', 'annual', 'September', '2022-09-01', 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Waiting for contactor quotation to include in proposal', '2022-09-12', 1, 0, 0),
(1790, '31103432022-09-12conduct roving at GPI 1,7,9 around 2:50 - 3:20pm and have a finding of plant grown ', 311, ' 2022-09-12', '2022-09-12', '03:43 pm', 'Roving', 'GP-22-718', 'daily', 'September', NULL, 'week 37', 0, NULL, './uploaded_files/73154f9ca55872daf66ba34bb94d1f5c.jpg', '2022', 'FEM', 0, '', 'conduct roving at GPI 1,7,9 around 2:50 - 3:20pm and have a finding of plant grown inside substation', '2022-09-12', 1, 0, 0),
(1791, '32003-592022-09-12All backups are okay, Ongoing offsite backup', 320, ' 2022-09-12', '2022-09-12', '03:59 pm', 'Backup', 'GP-22-729', 'weekly', 'September', NULL, 'week 37', 37, '2022-09-12', '', '2022', 'MIS', 0, '', 'All backups are okay, Ongoing offsite backup', '2022-09-12', 1, 0, 0),
(1792, '35504002022-09-12Checking of Pending JO', 355, ' 2022-09-12', '2022-09-12', '04:00 pm', 'Checking of pending JO', 'cg1374', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'MIS', 0, '', 'Checking of Pending JO', '2022-09-12', 1, 0, 0),
(1793, '35004002022-09-12No duty on saturday', 350, ' 2022-09-09', '2022-09-12', '04:00 pm', 'Attending pending JO request', 'CG1732', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'MIS', 1, 'No duty on saturday', '', '2022-09-09', 0.5, 0, 1),
(1794, '35004002022-09-12No duty on saturday', 350, ' 2022-09-12', '2022-09-12', '04:00 pm', 'Attending pending JO request', 'CG1732', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'MIS', 0, 'No duty on saturday', '', '2022-09-12', 1, 0, 0),
(1795, '35404-002022-09-12Update  the list of employment', 354, ' 2022-09-12', '2022-09-12', '04:00 pm', 'Canteen Billing', 'cg1374', 'weekly', 'September', NULL, 'week 37', 37, '2022-09-12', '', '2022', 'MIS', 0, '', 'Update  the list of employment', '2022-09-12', 1, 0, 0),
(1796, '35804-012022-09-12Check the consumables ', 358, ' 2022-09-12', '2022-09-12', '04:01 pm', 'Checking of consumable', 'cg1374', 'weekly', 'September', NULL, 'week 37', 37, '2022-09-12', '', '2022', 'MIS', 0, '', 'Swipe card inventory and monitoring', '2022-09-12', 1, 0, 0),
(1797, '35104012022-09-12Network - OKSaturday late?', 351, ' 2022-09-09', '2022-09-12', '04:01 pm', 'Checking of network and mail security', 'GP-22-729', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'MIS', 1, 'Saturday late?', 'Network - OK', '2022-09-09', 0.5, 0, 1),
(1798, '35104012022-09-12Network - OKSaturday late?', 351, ' 2022-09-12', '2022-09-12', '04:01 pm', 'Checking of network and mail security', 'GP-22-729', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'MIS', 0, 'Saturday late?', 'Network - OK', '2022-09-12', 1, 0, 0),
(1800, '34706372022-09-13Collect Informations Forgot to finish in the system', 347, ' 2022-09-12', '2022-09-13', '06:37 am', 'Coding Manpower System', 'GP-22-722', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'MIS', 1, 'Forgot to finish in the system', 'Collect Informations ', '2022-09-12', 0.5, 0, 1),
(1801, '34706372022-09-13Collect Informations Forgot to finish in the system', 347, ' 2022-09-13', '2022-09-13', '06:37 am', 'Coding Manpower System', 'GP-22-722', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'MIS', 0, 'Forgot to finish in the system', 'Collect Informations ', '2022-09-13', 1, 0, 0),
(1808, '3480715asdasd', 348, ' 2022-09-09', '2022-09-13', '07:15 am', 'Attending pending JO request', 'GP-22-729', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'MIS', 2, 'asd', 'asd', '2022-09-09', 0, 0, 1),
(1809, '34807152022-09-13asdasd', 348, ' 2022-09-12', '2022-09-13', '07:15 am', 'Attending pending JO request', 'GP-22-729', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'MIS', 1, 'asd', 'asd', '2022-09-12', 0.5, 0, 1),
(1810, '34807152022-09-13asdasd', 348, ' 2022-09-13', '2022-09-13', '07:15 am', 'Attending pending JO request', 'GP-22-729', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'MIS', 0, 'asd', 'asd', '2022-09-13', 1, 0, 1),
(1811, '34607-202022-09-13asd', 346, ' 2022-09-13', '2022-09-13', '07:20 am', 'Canteen Billing', 'GP-22-722', 'weekly', 'September', NULL, 'week 37', 37, '2022-09-12', '', '2022', 'MIS', 0, '', 'asd', '2022-09-13', 1, 0, 0),
(1812, '33807312022-09-13Checked. Found no trouble. Endorsed back to GPI GuardsOverlooked due to busy schedu', 338, ' 2022-09-12', '2022-09-13', '07:31 am', 'Security Guard Checklist', 'GP-18-614', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 1, 'Overlooked due to busy schedule.', 'Checked. Found no trouble. Endorsed back to GPI Guards', '2022-09-12', 0.5, 0, 1),
(1813, '33807312022-09-13Checked. Found no trouble. Endorsed back to GPI GuardsOverlooked due to busy schedu', 338, ' 2022-09-13', '2022-09-13', '07:31 am', 'Security Guard Checklist', 'GP-18-614', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, 'Overlooked due to busy schedule.', 'Checked. Found no trouble. Endorsed back to GPI Guards', '2022-09-13', 1, 0, 0),
(1814, '40007312022-09-13Checked. Found no trouble. Endorsed back to GPI 1 GuardsLate due to busy schedule. ', 400, ' 2022-09-12', '2022-09-13', '07:31 am', 'Security Guard Checklist', 'GP-18-614', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 1, 'Late due to busy schedule. ', 'Checked. Found no trouble. Endorsed back to GPI 1 Guards', '2022-09-12', 0.5, 0, 1),
(1815, '40007312022-09-13Checked. Found no trouble. Endorsed back to GPI 1 GuardsLate due to busy schedule. ', 400, ' 2022-09-13', '2022-09-13', '07:31 am', 'Security Guard Checklist', 'GP-18-614', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, 'Late due to busy schedule. ', 'Checked. Found no trouble. Endorsed back to GPI 1 Guards', '2022-09-13', 1, 0, 0),
(1816, '4340938not perform due to cleaning of aircon #24 ,25', 434, ' 2022-09-09', '2022-09-13', '09:38 am', 'Cleaning of Filters', 'GP-22-730', 'daily', 'September', NULL, 'week 36', 0, NULL, '', '2022', 'FEM', 2, 'not perform due to cleaning of aircon #24 ,25', '', '2022-09-09', 0, 0, 1),
(1817, '43409382022-09-13not perform due to cleaning of aircon #24 ,25', 434, ' 2022-09-12', '2022-09-13', '09:38 am', 'Cleaning of Filters', 'GP-22-730', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 1, 'not perform due to cleaning of aircon #24 ,25', '', '2022-09-12', 0.5, 0, 1),
(1818, '43409382022-09-13not perform due to cleaning of aircon #24 ,25', 434, ' 2022-09-13', '2022-09-13', '09:38 am', 'Cleaning of Filters', 'GP-22-730', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, 'not perform due to cleaning of aircon #24 ,25', '', '2022-09-13', 1, 0, 1),
(1819, '32109402022-09-13perform after office hours at admin office and accounting officenot perform due to ', 321, ' 2022-09-12', '2022-09-13', '09:40 am', 'Cleaning of Air con filters ', 'GP-22-730', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 1, 'not perform due to cleaning aircon at production area #24 and 25', 'perform after office hours at admin office and accounting office', '2022-09-12', 0.5, 0, 1),
(1820, '32109402022-09-13perform after office hours at admin office and accounting officenot perform due to ', 321, ' 2022-09-13', '2022-09-13', '09:40 am', 'Cleaning of Air con filters ', 'GP-22-730', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, 'not perform due to cleaning aircon at production area #24 and 25', 'perform after office hours at admin office and accounting office', '2022-09-13', 1, 0, 0),
(1821, '32209422022-09-13perform this day september 13,2022not perform due to cleaning of aircon at producti', 322, ' 2022-09-12', '2022-09-13', '09:42 am', 'Cleaning of exhaust Fan', 'GP-22-730', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 1, 'not perform due to cleaning of aircon at production area # 24 and 25', 'perform this day september 13,2022', '2022-09-12', 0.5, 0, 1),
(1822, '32209422022-09-13perform this day september 13,2022not perform due to cleaning of aircon at producti', 322, ' 2022-09-13', '2022-09-13', '09:42 am', 'Cleaning of exhaust Fan', 'GP-22-730', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, 'not perform due to cleaning of aircon at production area # 24 and 25', 'perform this day september 13,2022', '2022-09-13', 1, 0, 0),
(1823, '36409442022-09-13cleaning of aircon # 24 and 25.no update due to aircon cleaning and repair of drain', 364, ' 2022-09-12', '2022-09-13', '09:44 am', 'PMS of ACUs', 'GP-22-730', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 1, 'no update due to aircon cleaning and repair of drain of aircon.', 'cleaning of aircon # 24 and 25.', '2022-09-12', 0.5, 0, 1),
(1824, '36409442022-09-13cleaning of aircon # 24 and 25.no update due to aircon cleaning and repair of drain', 364, ' 2022-09-13', '2022-09-13', '09:44 am', 'PMS of ACUs', 'GP-22-730', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, 'no update due to aircon cleaning and repair of drain of aircon.', 'cleaning of aircon # 24 and 25.', '2022-09-13', 1, 0, 0),
(1825, '36609462022-09-13done update september 5,2022twist a month schedule sepetember 5 and 19', 366, ' 2022-09-12', '2022-09-13', '09:46 am', 'Genset Dry run', 'GP-22-730', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 1, 'twist a month schedule sepetember 5 and 19', 'done update september 5,2022', '2022-09-12', 0.5, 0, 1),
(1826, '36609462022-09-13done update september 5,2022twist a month schedule sepetember 5 and 19', 366, ' 2022-09-13', '2022-09-13', '09:46 am', 'Genset Dry run', 'GP-22-730', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, 'twist a month schedule sepetember 5 and 19', 'done update september 5,2022', '2022-09-13', 1, 0, 0),
(1827, '33409472022-09-13Cleaned the aircon filters by ralphON LEAVE', 334, ' 2022-09-12', '2022-09-13', '09:47 am', 'Cleaning of Air con filters ', 'CG1805', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 1, 'ON LEAVE', 'Cleaned the aircon filters by ralph on Sept. 12', '2022-09-12', 0.5, 0, 1),
(1828, '33409472022-09-13Cleaned the aircon filters by ralphON LEAVE', 334, ' 2022-09-13', '2022-09-13', '09:47 am', 'Cleaning of Air con filters ', 'CG1805', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, 'ON LEAVE', 'Cleaned the aircon filters by ralph on Sept. 12', '2022-09-13', 1, 0, 0),
(1829, '33509522022-09-13cleaned by mr ralphon leave', 335, ' 2022-09-12', '2022-09-13', '09:52 am', 'Cleaning of exhaust Fan', 'CG1805', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 1, 'on leave', 'cleaned by mr ralph on Sept. 12', '2022-09-12', 0.5, 0, 1),
(1830, '33509522022-09-13cleaned by mr ralphon leave', 335, ' 2022-09-13', '2022-09-13', '09:52 am', 'Cleaning of exhaust Fan', 'CG1805', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, 'on leave', 'cleaned by mr ralph on Sept. 12', '2022-09-13', 1, 0, 0),
(1831, '34409522022-09-13pm by ralphon leave', 344, ' 2022-09-12', '2022-09-13', '09:52 am', 'PM of ACUs', 'CG1805', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 1, 'on leave', 'pm by ralph on Sept. 12', '2022-09-12', 0.5, 0, 1),
(1832, '34409522022-09-13pm by ralphon leave', 344, ' 2022-09-13', '2022-09-13', '09:52 am', 'PM of ACUs', 'CG1805', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, 'on leave', 'pm by ralph on Sept. 12', '2022-09-13', 1, 0, 0),
(1833, '37009532022-09-13pm of acu by mr ralphon leave', 370, ' 2022-09-12', '2022-09-13', '09:53 am', ' PMs of Air con', 'CG1805', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 1, 'on leave', 'pm of acu by mr ralph on Sept. 12', '2022-09-12', 0.5, 0, 1),
(1834, '37009532022-09-13pm of acu by mr ralphon leave', 370, ' 2022-09-13', '2022-09-13', '09:53 am', ' PMs of Air con', 'CG1805', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, 'on leave', 'pm of acu by mr ralph on Sept. 12', '2022-09-13', 1, 0, 0),
(1835, '37109532022-09-13pm by mr ralphon leave', 371, ' 2022-09-12', '2022-09-13', '09:53 am', 'Genset Dry run', 'CG1805', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 1, 'on leave', 'Already conducted Dry run of Genset on Sept. 5', '2022-09-12', 0.5, 0, 1),
(1836, '37109532022-09-13pm by mr ralphon leave', 371, ' 2022-09-13', '2022-09-13', '09:53 am', 'Genset Dry run', 'CG1805', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, 'on leave', 'Already conducted Dry run of Genset on Sept. 5', '2022-09-13', 1, 0, 0),
(1837, '47109542022-09-13checked by fem', 471, ' 2022-09-13', '2022-09-13', '09:54 am', 'Checking of ACU s at Conference Room 4', 'CG1805', 'annual', 'September', '2022-09-01', 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'checked by fem', '2022-09-13', 1, 0, 0),
(1838, '32510162022-09-13Conducted cleaning of air con filters of ACU. no.6,7,8,910,24 and CMM room', 325, ' 2022-09-13', '2022-09-13', '10:16 am', 'Cleaning of Air con filters ', 'CG0676', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of air con filters of ACU. no.6,7,8,910,24 and CMM room', '2022-09-13', 1, 0, 0),
(1839, '32810172022-09-13Conducted cleaning of air con filters of ACU. no.6,7,8,910,24 and CMM room', 328, ' 2022-09-13', '2022-09-13', '10:17 am', 'Cleaning of Air con filters ', 'CG1420', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of air con filters of ACU. no.6,7,8,910,24 and CMM room', '2022-09-13', 1, 0, 0),
(1840, '39412222022-09-13Conducted cleaning of air con filters of ACU. no.6,7,8,910,24 and CMM room', 394, ' 2022-09-13', '2022-09-13', '12:22 pm', 'Cleaning of Air con filters ', 'CG1420', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of air con filters of ACU. no.6,7,8,910,24 and CMM room', '2022-09-13', 1, 0, 0),
(1841, '32912272022-09-13Conducted cleaning exhaust fan ', 329, ' 2022-09-13', '2022-09-13', '12:27 pm', 'Cleaning of exhaust Fan', 'CG1420', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning exhaust fan ', '2022-09-13', 1, 0, 0),
(1842, '37612292022-09-13Conducted dry run of gen set at GPI-5', 376, ' 2022-09-13', '2022-09-13', '12:29 pm', 'Genset Dry run', 'CG1420', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted dry run of gen set at GPI-5', '2022-09-13', 1, 0, 0),
(1843, '34212312022-09-13Conducted PMS of ACU no.15', 342, ' 2022-09-13', '2022-09-13', '12:31 pm', 'PMS of Aircon', 'CG1420', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted PMS of ACU no.15', '2022-09-13', 1, 0, 0),
(1844, '38112342022-09-13Conducted dry run of gen set at GPI-5', 381, ' 2022-09-13', '2022-09-13', '12:34 pm', 'Genset Dry run', 'CG0676', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted dry run of gen set at GPI-5', '2022-09-13', 1, 0, 0),
(1845, '34112362022-09-13Conducted PMS of ACU. no.15', 341, ' 2022-09-13', '2022-09-13', '12:36 pm', 'PMS of Aircon', 'CG0676', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted PMS of ACU. no.15', '2022-09-13', 1, 0, 0),
(1846, '32612372022-09-13Conducted cleaning of exhaust fan', 326, ' 2022-09-13', '2022-09-13', '12:37 pm', 'Cleaning of exhaust Fan', 'CG0676', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of exhaust fan', '2022-09-13', 1, 0, 0),
(1847, '35003222022-09-131.Reformat and back up files.', 350, ' 2022-09-13', '2022-09-13', '03:22 pm', 'Attending pending JO request', 'CG1732', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'MIS', 0, '', '1.Reformat and back up files.', '2022-09-13', 1, 0, 0),
(1848, '31103342022-09-13conduct roving at GPI 5 around 3:00pm. no findings found', 311, ' 2022-09-13', '2022-09-13', '03:34 pm', 'Roving', 'GP-22-718', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'conduct roving at GPI 5 around 3:00pm. no findings found', '2022-09-13', 1, 0, 0),
(1849, '35503572022-09-13Check pending JO', 355, ' 2022-09-13', '2022-09-13', '03:57 pm', 'Checking of pending JO', 'cg1374', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'MIS', 0, '', 'Check pending JO', '2022-09-13', 1, 0, 0),
(1850, '32809182022-09-14Conducted cleaning of aircon filters', 328, ' 2022-09-14', '2022-09-14', '09:18 am', 'Cleaning of Air con filters ', 'CG1420', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of aircon filters', '2022-09-14', 1, 0, 0),
(1851, '39409182022-09-14Conducted cleaning of aircon filters', 394, ' 2022-09-14', '2022-09-14', '09:18 am', 'Cleaning of Air con filters ', 'CG1420', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of aircon filters', '2022-09-14', 1, 0, 0),
(1852, '33409202022-09-14Conduct cleaning of Air con filters at QA, Dok, Saitama, Admin.', 334, ' 2022-09-14', '2022-09-14', '09:20 am', 'Cleaning of Air con filters ', 'CG1805', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct cleaning of Air con filters at QA, Dok, Saitama, Admin.', '2022-09-14', 1, 0, 0),
(1853, '37109202022-09-14Already done on Sept. 5', 371, ' 2022-09-14', '2022-09-14', '09:20 am', 'Genset Dry run', 'CG1805', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Already done on Sept. 5', '2022-09-14', 1, 0, 0),
(1854, '32509262022-09-14Conduct Cleaning of air con filter 11,12,14,15,16', 325, ' 2022-09-14', '2022-09-14', '09:26 am', 'Cleaning of Air con filters ', 'CG0676', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct Cleaning of air con filter 11,12,14,15,16', '2022-09-14', 1, 0, 0),
(1855, '38109282022-09-14ALREADY DONE LAST SEPT.5 THE SCHED. IS SEPT,19', 381, ' 2022-09-14', '2022-09-14', '09:28 am', 'Genset Dry run', 'CG0676', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'ALREADY DONE LAST SEPT.5 THE SCHED. IS SEPT,19', '2022-09-14', 1, 0, 0),
(1856, '33811072022-09-14Already checked. found 2 trouble. Endorsed to FEM Staff. ', 338, ' 2022-09-14', '2022-09-14', '11:07 am', 'Security Guard Checklist', 'GP-18-614', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Already checked. found 2 trouble. Endorsed to FEM Staff. ', '2022-09-14', 1, 0, 0),
(1857, '40011082022-09-14Already checked. Found 2 trouble. Endorsed to FEM Staff to verify', 400, ' 2022-09-14', '2022-09-14', '11:08 am', 'Security Guard Checklist', 'GP-18-614', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Already checked. Found 2 trouble. Endorsed to FEM Staff to verify', '2022-09-14', 1, 0, 0),
(1858, '32112342022-09-14conduct cleaning of filter at prod.office.near saitama,QA,audit & training,prod,sup', 321, ' 2022-09-14', '2022-09-14', '12:34 pm', 'Cleaning of Air con filters ', 'GP-22-730', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'conduct cleaning of filter at prod.office.near saitama,QA,audit & training,prod,supplies.DOK', '2022-09-14', 1, 0, 0),
(1859, '32212372022-09-14conduct cleaning of exhaust at emp. lounge,clinic,fem storage,female shoe locker.', 322, ' 2022-09-14', '2022-09-14', '12:37 pm', 'Cleaning of exhaust Fan', 'GP-22-730', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'conduct cleaning of exhaust at emp. lounge,clinic,fem storage,female shoe locker.', '2022-09-14', 1, 0, 0),
(1860, '36612382022-09-14already done september 5.the next sched. is september 19.', 366, ' 2022-09-14', '2022-09-14', '12:38 pm', 'Genset Dry run', 'GP-22-730', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'already done september 5.the next sched. is september 19.', '2022-09-14', 1, 0, 0),
(1861, '35501532022-09-14Update and check pending JO', 355, ' 2022-09-14', '2022-09-14', '01:53 pm', 'Checking of pending JO', 'cg1374', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'MIS', 0, '', 'Update and check pending JO', '2022-09-14', 1, 0, 0),
(1862, '32602412022-09-14Conduct Cleaning of exhaust fan in female locker area', 326, ' 2022-09-14', '2022-09-14', '02:41 pm', 'Cleaning of exhaust Fan', 'CG0676', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct Cleaning of exhaust fan in female locker area', '2022-09-14', 1, 0, 0),
(1863, '34102442022-09-14Conduct Cleaning PMS of aircon', 341, ' 2022-09-14', '2022-09-14', '02:44 pm', 'PMS of Aircon', 'CG0676', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct Cleaning PMS of aircon', '2022-09-14', 1, 0, 0),
(1864, '33502462022-09-14Conduct cleaning of Exhaust fan at Clinic, Emp. Louge, Fem Storage, Female Shoe Loc', 335, ' 2022-09-14', '2022-09-14', '02:46 pm', 'Cleaning of exhaust Fan', 'CG1805', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct cleaning of Exhaust fan at Clinic, Emp. Louge, Fem Storage, Female Shoe Locker.', '2022-09-14', 1, 0, 0),
(1865, '31103522022-09-14did not conduct roving due to assisting of contractor and study smoke control  air ', 311, ' 2022-09-14', '2022-09-14', '03:52 pm', 'Roving', 'GP-22-718', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'did not conduct roving due to assisting of contractor and study smoke control  air changes per hour ', '2022-09-14', 1, 0, 0),
(1866, '34803532022-09-14Check DOK camera', 348, ' 2022-09-14', '2022-09-14', '03:53 pm', 'Attending pending JO request', 'GP-22-729', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'MIS', 0, '', 'Check DOK camera', '2022-09-14', 1, 0, 0),
(1867, '35103532022-09-14Check logs and status of firewall, ssh to mail server check logs1', 351, ' 2022-09-13', '2022-09-14', '03:53 pm', 'Checking of network and mail security', 'GP-22-729', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'MIS', 1, '1', 'Check logs and status of firewall, ssh to mail server check logs', '2022-09-13', 0.5, 0, 1),
(1868, '35103532022-09-14Check logs and status of firewall, ssh to mail server check logs1', 351, ' 2022-09-14', '2022-09-14', '03:53 pm', 'Checking of network and mail security', 'GP-22-729', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'MIS', 0, '1', 'Check logs and status of firewall, ssh to mail server check logs', '2022-09-14', 1, 0, 0),
(1869, '32904482022-09-14Cleaning of exhaust fan', 329, ' 2022-09-14', '2022-09-14', '04:48 pm', 'Cleaning of exhaust Fan', 'CG1420', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Cleaning of exhaust fan', '2022-09-14', 1, 0, 0),
(1870, '34204482022-09-14Conducted PMS of aircon', 342, ' 2022-09-14', '2022-09-14', '04:48 pm', 'PMS of Aircon', 'CG1420', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted PMS of aircon', '2022-09-14', 1, 0, 0),
(1871, '37604492022-09-14Already done on Sept. 05 2022', 376, ' 2022-09-14', '2022-09-14', '04:49 pm', 'Genset Dry run', 'CG1420', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Already done on Sept. 05 2022', '2022-09-14', 1, 0, 0),
(1872, '36405472022-09-14cleaning of aircon # 27', 364, ' 2022-09-14', '2022-09-14', '05:47 pm', 'PMS of ACUs', 'GP-22-730', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'cleaning of aircon # 27', '2022-09-14', 1, 0, 0),
(1873, '34405512022-09-14Conduct PM of ACUs', 344, ' 2022-09-14', '2022-09-14', '05:51 pm', 'PM of ACUs', 'CG1805', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct PM of ACUs', '2022-09-14', 1, 0, 0),
(1874, '37005512022-09-14Conduct PM of ACUs', 370, ' 2022-09-14', '2022-09-14', '05:51 pm', ' PMs of Air con', 'CG1805', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct PM of ACUs', '2022-09-14', 1, 0, 0),
(1875, '34707592022-09-15Design the home pageForgot to finish in the system', 347, ' 2022-09-14', '2022-09-15', '07:59 am', 'Coding Manpower System', 'GP-22-722', 'daily', 'September', NULL, 'week 37', 0, NULL, './uploaded_files/986529aa8853ea23319d542637b1ebc7.png', '2022', 'MIS', 1, 'Forgot to finish in the system', 'Design the home page', '2022-09-14', 0.5, 0, 1),
(1876, '34707592022-09-15Design the home pageForgot to finish in the system', 347, ' 2022-09-15', '2022-09-15', '07:59 am', 'Coding Manpower System', 'GP-22-722', 'daily', 'September', NULL, 'week 37', 0, NULL, './uploaded_files/986529aa8853ea23319d542637b1ebc7.png', '2022', 'MIS', 0, 'Forgot to finish in the system', 'Design the home page', '2022-09-15', 1, 0, 0),
(1877, '33808142022-09-15Checked. Found no trouble. Endorsed back to Guards of GPI 1', 338, ' 2022-09-15', '2022-09-15', '08:14 am', 'Security Guard Checklist', 'GP-18-614', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Checked. Found no trouble. Endorsed back to Guards of GPI 1', '2022-09-15', 1, 0, 0),
(1878, '34810302022-09-15Created batch file for Production Technician', 348, ' 2022-09-15', '2022-09-15', '10:30 am', 'Attending pending JO request', 'GP-22-729', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'MIS', 0, '', 'Created batch file for Production Technician', '2022-09-15', 1, 0, 0),
(1879, '35110302022-09-15Check network and Mail server config and log,', 351, ' 2022-09-15', '2022-09-15', '10:30 am', 'Checking of network and mail security', 'GP-22-729', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'MIS', 0, '', 'Check network and Mail server config and log,', '2022-09-15', 1, 0, 0),
(1880, '35010422022-09-15Back-up all data. PC of Ms.Yalung from warehouse.I was in GPI-8 at 9:30 am to 3:00 ', 350, ' 2022-09-14', '2022-09-15', '10:42 am', 'Attending pending JO request', 'CG1732', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'MIS', 1, 'I was in GPI-8 at 9:30 am to 3:00 pm. after that, I helped FEM and MIS personnel to paint the volley ball field.', 'Back-up all data. PC of Ms.Yalung from warehouse.', '2022-09-14', 0.5, 0, 1),
(1881, '35010422022-09-15Back-up all data. PC of Ms.Yalung from warehouse.I was in GPI-8 at 9:30 am to 3:00 ', 350, ' 2022-09-15', '2022-09-15', '10:42 am', 'Attending pending JO request', 'CG1732', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'MIS', 0, 'I was in GPI-8 at 9:30 am to 3:00 pm. after that, I helped FEM and MIS personnel to paint the volley ball field.', 'Back-up all data. PC of Ms.Yalung from warehouse.', '2022-09-15', 1, 0, 0),
(1882, '32510542022-09-15Cleaning of aircon filter 17,18,19,20,21,22', 325, ' 2022-09-15', '2022-09-15', '10:54 am', 'Cleaning of Air con filters ', 'CG0676', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Cleaning of aircon filter 17,18,19,20,21,22', '2022-09-15', 1, 0, 0),
(1883, '32610562022-09-15Conducted of exhaust fan old female cr', 326, ' 2022-09-15', '2022-09-15', '10:56 am', 'Cleaning of exhaust Fan', 'CG0676', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted claning of exhaust fan old female cr', '2022-09-15', 1, 0, 0),
(1884, '38110582022-09-15Already done on sept,5 ', 381, ' 2022-09-15', '2022-09-15', '10:58 am', 'Genset Dry run', 'CG0676', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Already done on sept,5 ', '2022-09-15', 1, 0, 0),
(1885, '32811002022-09-15Conducted cleaning of ACU. filters at PAC area', 328, ' 2022-09-15', '2022-09-15', '11:00 am', 'Cleaning of Air con filters ', 'CG1420', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of ACU. filters at PAC area', '2022-09-15', 1, 0, 0),
(1886, '39411012022-09-15Conducted cleaning of ACU. filters at PAC area', 394, ' 2022-09-15', '2022-09-15', '11:01 am', 'Cleaning of Air con filters ', 'CG1420', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of ACU. filters at PAC area', '2022-09-15', 1, 0, 0),
(1887, '37611022022-09-15Already done on Sept. 05 2022.', 376, ' 2022-09-15', '2022-09-15', '11:02 am', 'Genset Dry run', 'CG1420', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Already done on Sept. 05 2022.', '2022-09-15', 1, 0, 0),
(1888, '33411042022-09-15Conducted cleaning of Air con filters at PAC Area.', 334, ' 2022-09-15', '2022-09-15', '11:04 am', 'Cleaning of Air con filters ', 'CG1805', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of Air con filters at PAC Area.', '2022-09-15', 1, 0, 0);
INSERT INTO `finishedtask` (`FinishedTaskID`, `sameID`, `taskID`, `Date`, `DateSubmitted`, `timestamp`, `task_Name`, `in_charge`, `sched_Type`, `month`, `firstDateOfTheMonth`, `week`, `weekNumber`, `lastMonday`, `attachments`, `year`, `Department`, `noOfDaysLate`, `reason`, `action`, `realDate`, `score`, `isCheckedByLeader`, `isLate`) VALUES
(1889, '37111042022-09-15Already done on Sept. 5, 2022.', 371, ' 2022-09-15', '2022-09-15', '11:04 am', 'Genset Dry run', 'CG1805', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Already done on Sept. 5, 2022.', '2022-09-15', 1, 0, 0),
(1890, '32112232022-09-15cleaning of the aircon filter # 24,25,26,27,28,29,30.', 321, ' 2022-09-15', '2022-09-15', '12:23 pm', 'Cleaning of Air con filters ', 'GP-22-730', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'cleaning of the aircon filter # 24,25,26,27,28,29,30.', '2022-09-15', 1, 0, 0),
(1891, '36612252022-09-15aleady done last sept.5 the next sched. sept.19', 366, ' 2022-09-15', '2022-09-15', '12:25 pm', 'Genset Dry run', 'GP-22-730', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'aleady done last sept.5 the next sched. sept.19', '2022-09-15', 1, 0, 0),
(1892, '34101492022-09-15Conducted Cleaning PMS of aircon no,18', 341, ' 2022-09-15', '2022-09-15', '01:49 pm', 'PMS of Aircon', 'CG0676', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted Cleaning PMS of aircon no,18', '2022-09-15', 1, 0, 0),
(1893, '35502262022-09-15Check Pending JO', 355, ' 2022-09-15', '2022-09-15', '02:26 pm', 'Checking of pending JO', 'cg1374', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'MIS', 0, '', 'Check Pending JO', '2022-09-15', 1, 0, 0),
(1894, '47802302022-09-15Billing process on Sept 7, 2022. Done', 478, ' 2022-09-15', '2022-09-15', '02:30 pm', 'Billing Eastern', 'cg1374', 'monthly', 'September', '2022-09-01', 'week 37', 0, NULL, '', '2022', 'MIS', 0, '', 'Billing process on Sept 7, 2022. Done', '2022-09-15', 1, 0, 0),
(1895, '33504182022-09-15Conduct cleaning of Exhaust fan.', 335, ' 2022-09-15', '2022-09-15', '04:18 pm', 'Cleaning of exhaust Fan', 'CG1805', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct cleaning of Exhaust fan.', '2022-09-15', 1, 0, 0),
(1896, '34404182022-09-15Conduct PMs of ACU at PAC Area.', 344, ' 2022-09-15', '2022-09-15', '04:18 pm', 'PM of ACUs', 'CG1805', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct PMs of ACU at PAC Area.', '2022-09-15', 1, 0, 0),
(1897, '37004182022-09-15Conduct PMs of ACU at PAC Area.', 370, ' 2022-09-15', '2022-09-15', '04:18 pm', ' PMs of Air con', 'CG1805', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct PMs of ACU at PAC Area.', '2022-09-15', 1, 0, 0),
(1898, '32905542022-09-15Conducted cleaning of exhaust fan', 329, ' 2022-09-15', '2022-09-15', '05:54 pm', 'Cleaning of exhaust Fan', 'CG1420', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of exhaust fan', '2022-09-15', 1, 0, 0),
(1899, '34205552022-09-15Conducted PMS of ACU. no. 28 PAC area', 342, ' 2022-09-15', '2022-09-15', '05:55 pm', 'PMS of Aircon', 'CG1420', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted PMS of ACU. no. 28 PAC area', '2022-09-15', 1, 0, 0),
(1900, '31106532022-09-16not applicable today due to preparation for annual peza inspection on GPI 6. study ', 311, ' 2022-09-15', '2022-09-16', '06:53 am', 'Roving', 'GP-22-718', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 1, 'not applicable today due to preparation for annual peza inspection on GPI 6. study the proposal of adding aircon on GPI5. ', '', '2022-09-15', 0.5, 0, 1),
(1901, '31106532022-09-16not applicable today due to preparation for annual peza inspection on GPI 6. study ', 311, ' 2022-09-16', '2022-09-16', '06:53 am', 'Roving', 'GP-22-718', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, 'not applicable today due to preparation for annual peza inspection on GPI 6. study the proposal of adding aircon on GPI5. ', '', '2022-09-16', 1, 0, 0),
(1902, '33807522022-09-16Checked. Found 5 pairs of busted light at Prod area at GPI 1. Endorsed to FEM Staff', 338, ' 2022-09-16', '2022-09-16', '07:52 am', 'Security Guard Checklist', 'GP-18-614', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Checked. Found 5 pairs of busted light at Prod area at GPI 1. Endorsed to FEM Staff.', '2022-09-16', 1, 0, 0),
(1903, '47908252022-09-16Send email and directly call Ms. Lota to inform the time of inspection and request ', 479, ' 2022-09-16', '2022-09-16', '08:25 am', 'Coordinate to Ichikawa the PEZA inspection for ren', 'GP-18-614', 'annual', 'September', '2022-09-01', 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Send email and directly call Ms. Lota to inform the time of inspection and request to prepare the new as-built plan of GPI 4 building (Ichikawa rented).', '2022-09-16', 1, 0, 0),
(1904, '32509472022-09-16Conducted cleaning of aircon filter 23,24,25,26,27,28,29,30', 325, ' 2022-09-16', '2022-09-16', '09:47 am', 'Cleaning of Air con filters ', 'CG0676', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of aircon filter 23,24,25,26,27,28,29,30', '2022-09-16', 1, 0, 0),
(1905, '38109492022-09-16Already done on sept,05', 381, ' 2022-09-16', '2022-09-16', '09:49 am', 'Genset Dry run', 'CG0676', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Already done on sept,05', '2022-09-16', 1, 0, 0),
(1906, '48610102022-09-16Done assisting PEZA ,no findings and certification can be claim on Monday (Septembe', 486, ' 2022-09-16', '2022-09-16', '10:10 am', 'Assist PEZA inspection at  ICHIKAWA for LOA applic', 'GP-22-718', 'annual', 'September', '2022-09-01', 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Done assisting PEZA ,no findings and certification can be claim on Monday (September 19, 2022)', '2022-09-16', 1, 0, 0),
(1907, '32811032022-09-16Conducted cleaning of ACU. filters at canteen area', 328, ' 2022-09-16', '2022-09-16', '11:03 am', 'Cleaning of Air con filters ', 'CG1420', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of ACU. filters at canteen area', '2022-09-16', 1, 0, 0),
(1908, '39411042022-09-16Conducted cleaning of ACU. filters at canteen area', 394, ' 2022-09-16', '2022-09-16', '11:04 am', 'Cleaning of Air con filters ', 'CG1420', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of ACU. filters at canteen area', '2022-09-16', 1, 0, 0),
(1909, '37611052022-09-16Already done on Sept. 05,2022', 376, ' 2022-09-16', '2022-09-16', '11:05 am', 'Genset Dry run', 'CG1420', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Already done on Sept. 05,2022', '2022-09-16', 1, 0, 0),
(1910, '33411062022-09-16Conducted cleaning of Air con filters.', 334, ' 2022-09-16', '2022-09-16', '11:06 am', 'Cleaning of Air con filters ', 'CG1805', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of Air con filters.', '2022-09-16', 1, 0, 0),
(1911, '33511062022-09-16Conduct cleaning of Exhaust fan.', 335, ' 2022-09-16', '2022-09-16', '11:06 am', 'Cleaning of exhaust Fan', 'CG1805', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct cleaning of Exhaust fan.', '2022-09-16', 1, 0, 0),
(1912, '37111072022-09-16Already done on Sept. 5, 2022.', 371, ' 2022-09-16', '2022-09-16', '11:07 am', 'Genset Dry run', 'CG1805', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 0, '', 'Already done on Sept. 5, 2022.', '2022-09-16', 1, 0, 0),
(1913, '35012222022-09-16Repair outlook of Ms. Shaydel in PI.', 350, ' 2022-09-16', '2022-09-16', '12:22 pm', 'Attending pending JO request', 'CG1732', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'MIS', 0, '', 'Repair outlook of Ms. Shaydel in PI.', '2022-09-16', 1, 0, 0),
(1914, '35503392022-09-16check pending JO', 355, ' 2022-09-16', '2022-09-16', '03:39 pm', 'Checking of pending JO', 'cg1374', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'MIS', 0, '', 'check pending JO', '2022-09-16', 1, 0, 0),
(1915, '32607282022-09-19Already done cleaning of exhaust fandue to relay out of rbw 200', 326, ' 2022-09-16', '2022-09-19', '07:28 am', 'Cleaning of exhaust Fan', 'CG0676', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 1, 'due to relay out of rbw 200', 'Already done cleaning of exhaust fan', '2022-09-16', 0.5, 0, 1),
(1916, '32607282022-09-19Already done cleaning of exhaust fandue to relay out of rbw 200', 326, ' 2022-09-19', '2022-09-19', '07:28 am', 'Cleaning of exhaust Fan', 'CG0676', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, 'due to relay out of rbw 200', 'Already done cleaning of exhaust fan', '2022-09-19', 1, 0, 0),
(1917, '34107312022-09-19already done of cleaning PMS of aircon no,19due to relay out of gpi7', 341, ' 2022-09-16', '2022-09-19', '07:31 am', 'PMS of Aircon', 'CG0676', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 1, 'due to relay out of gpi7', 'already done of cleaning PMS of aircon no,19', '2022-09-16', 0.5, 0, 1),
(1918, '34107312022-09-19already done of cleaning PMS of aircon no,19due to relay out of gpi7', 341, ' 2022-09-19', '2022-09-19', '07:31 am', 'PMS of Aircon', 'CG0676', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, 'due to relay out of gpi7', 'already done of cleaning PMS of aircon no,19', '2022-09-19', 1, 0, 0),
(1919, '33808282022-09-19Checked all report from weekend. Found 1 trouble at GPI 7. Endorsed to FEM. Done', 338, ' 2022-09-19', '2022-09-19', '08:28 am', 'Security Guard Checklist', 'GP-18-614', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Checked all report from weekend. Found 1 trouble at GPI 7. Endorsed to FEM. Done', '2022-09-19', 1, 0, 0),
(1920, '32109202022-09-19clean after the relayout of brm 10not perform due to relayout at brm 10', 321, ' 2022-09-16', '2022-09-19', '09:20 am', 'Cleaning of Air con filters ', 'GP-22-730', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 1, 'not perform due to relayout at brm 10', 'clean after the relayout of brm 10', '2022-09-16', 0.5, 0, 1),
(1921, '32109202022-09-19clean after the relayout of brm 10not perform due to relayout at brm 10', 321, ' 2022-09-19', '2022-09-19', '09:20 am', 'Cleaning of Air con filters ', 'GP-22-730', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, 'not perform due to relayout at brm 10', 'clean after the relayout of brm 10', '2022-09-19', 1, 0, 0),
(1922, '3220921perform after relayout at brm 10.not perform due to relayout of brm 10', 322, ' 2022-09-15', '2022-09-19', '09:21 am', 'Cleaning of exhaust Fan', 'GP-22-730', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 2, 'not perform due to relayout of brm 10', 'perform after relayout at brm 10.', '2022-09-15', 0, 0, 1),
(1923, '32209212022-09-19perform after relayout at brm 10.not perform due to relayout of brm 10', 322, ' 2022-09-16', '2022-09-19', '09:21 am', 'Cleaning of exhaust Fan', 'GP-22-730', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 1, 'not perform due to relayout of brm 10', 'perform after relayout at brm 10.', '2022-09-16', 0.5, 0, 1),
(1924, '32209212022-09-19perform after relayout at brm 10.not perform due to relayout of brm 10', 322, ' 2022-09-19', '2022-09-19', '09:21 am', 'Cleaning of exhaust Fan', 'GP-22-730', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, 'not perform due to relayout of brm 10', 'perform after relayout at brm 10.', '2022-09-19', 1, 0, 1),
(1925, '3640923perform after the relayout of brm 10not perform due to relayout of brm 10', 364, ' 2022-09-15', '2022-09-19', '09:23 am', 'PMS of ACUs', 'GP-22-730', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 2, 'not perform due to relayout of brm 10', 'perform after the relayout of brm 10', '2022-09-15', 0, 0, 1),
(1926, '36409232022-09-19perform after the relayout of brm 10not perform due to relayout of brm 10', 364, ' 2022-09-16', '2022-09-19', '09:23 am', 'PMS of ACUs', 'GP-22-730', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 1, 'not perform due to relayout of brm 10', 'perform after the relayout of brm 10', '2022-09-16', 0.5, 0, 1),
(1927, '36409232022-09-19perform after the relayout of brm 10not perform due to relayout of brm 10', 364, ' 2022-09-19', '2022-09-19', '09:23 am', 'PMS of ACUs', 'GP-22-730', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, 'not perform due to relayout of brm 10', 'perform after the relayout of brm 10', '2022-09-19', 1, 0, 1),
(1928, '36609252022-09-19schedule today sept 19, 2022.already perform sept.5 and the next sched is sept.19,2', 366, ' 2022-09-16', '2022-09-19', '09:25 am', 'Genset Dry run', 'GP-22-730', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 1, 'already perform sept.5 and the next sched is sept.19,2022', 'schedule today sept 19, 2022.', '2022-09-16', 0.5, 0, 1),
(1929, '36609252022-09-19schedule today sept 19, 2022.already perform sept.5 and the next sched is sept.19,2', 366, ' 2022-09-19', '2022-09-19', '09:25 am', 'Genset Dry run', 'GP-22-730', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, 'already perform sept.5 and the next sched is sept.19,2022', 'schedule today sept 19, 2022.', '2022-09-19', 1, 0, 0),
(1930, '32509422022-09-19Conducted Cleaning of aircon filters no,1,2,3,4,5', 325, ' 2022-09-19', '2022-09-19', '09:42 am', 'Cleaning of Air con filters ', 'CG0676', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted Cleaning of aircon filters no,1,2,3,4,5', '2022-09-19', 1, 0, 0),
(1931, '38110522022-09-19Conducted of Genset Dry run in GPI.5 DONE', 381, ' 2022-09-19', '2022-09-19', '10:52 am', 'Genset Dry run', 'CG0676', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted of Genset Dry run in GPI.5 DONE', '2022-09-19', 1, 0, 0),
(1932, '31412482022-09-19Sir JC assist the PEZA inspector at GPI 6. There was no findings.attend train the t', 314, ' 2022-09-19', '2022-09-19', '12:48 pm', 'GPI 6 PEZA Annual Inspection', 'GP-22-718', 'annual', 'September', '2022-09-01', 'week 38', 0, NULL, '', '2022', 'FEM', 2, 'attend train the trainer program from 2pm to 4pm.', 'Sir JC assist the PEZA inspector at GPI 6. There was no findings.', '2022-09-16', 0.5, 0, 1),
(1933, '32802142022-09-19Conducted cleaning of ACU. filters', 328, ' 2022-09-19', '2022-09-19', '02:14 pm', 'Cleaning of Air con filters ', 'CG1420', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of ACU. filters', '2022-09-19', 1, 0, 0),
(1934, '39402142022-09-19Conducted cleaning of ACU. filters', 394, ' 2022-09-19', '2022-09-19', '02:14 pm', 'Cleaning of Air con filters ', 'CG1420', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of ACU. filters', '2022-09-19', 1, 0, 0),
(1935, '32902142022-09-19Conducted cleaning of exhaust fan', 329, ' 2022-09-16', '2022-09-19', '02:14 pm', 'Cleaning of exhaust Fan', 'CG1420', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 1, '', 'Conducted cleaning of exhaust fan', '2022-09-16', 0.5, 0, 1),
(1936, '32902142022-09-19Conducted cleaning of exhaust fan', 329, ' 2022-09-19', '2022-09-19', '02:14 pm', 'Cleaning of exhaust Fan', 'CG1420', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of exhaust fan', '2022-09-19', 1, 0, 0),
(1937, '34202152022-09-19Conducted PMS of aircon', 342, ' 2022-09-16', '2022-09-19', '02:15 pm', 'PMS of Aircon', 'CG1420', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 1, '', 'Conducted PMS of aircon', '2022-09-16', 0.5, 0, 1),
(1938, '34202152022-09-19Conducted PMS of aircon', 342, ' 2022-09-19', '2022-09-19', '02:15 pm', 'PMS of Aircon', 'CG1420', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted PMS of aircon', '2022-09-19', 1, 0, 0),
(1939, '37602162022-09-19Conducted dry run of genset ', 376, ' 2022-09-19', '2022-09-19', '02:16 pm', 'Genset Dry run', 'CG1420', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted dry run of genset ', '2022-09-19', 1, 0, 0),
(1940, '35003282022-09-19Back-up data of Suntrust clinic system unit.', 350, ' 2022-09-19', '2022-09-19', '03:28 pm', 'Attending pending JO request', 'CG1732', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'MIS', 0, '', 'Back-up data of Suntrust clinic system unit.', '2022-09-19', 1, 0, 0),
(1941, '35403-392022-09-19Encoding logs from Sun trust', 354, ' 2022-09-19', '2022-09-19', '03:39 pm', 'Canteen Billing', 'cg1374', 'weekly', 'September', NULL, 'week 38', 38, '2022-09-19', '', '2022', 'MIS', 0, '', 'Encoding logs from Sun trust', '2022-09-19', 1, 0, 0),
(1942, '35503392022-09-19check pending JO', 355, ' 2022-09-19', '2022-09-19', '03:39 pm', 'Checking of pending JO', 'cg1374', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'MIS', 0, '', 'check pending JO', '2022-09-19', 1, 0, 0),
(1943, '35803-402022-09-19Monitor the consumables.Done', 358, ' 2022-09-19', '2022-09-19', '03:40 pm', 'Checking of consumable', 'cg1374', 'weekly', 'September', NULL, 'week 38', 38, '2022-09-19', '', '2022', 'MIS', 0, '', 'Monitor the consumables.Done', '2022-09-19', 1, 0, 0),
(1944, '31103502022-09-19Conduct roving at GPI 7 and there was no findings.', 311, ' 2022-09-19', '2022-09-19', '03:50 pm', 'Roving', 'GP-22-718', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct roving at GPI 7 and there was no findings.', '2022-09-19', 1, 0, 0),
(1945, '33405592022-09-19Conduct cleaning of Air con filters', 334, ' 2022-09-19', '2022-09-19', '05:59 pm', 'Cleaning of Air con filters ', 'CG1805', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct cleaning of Air con filters', '2022-09-19', 1, 0, 0),
(1946, '33506002022-09-19Conduct cleaning of Exhaust fan', 335, ' 2022-09-19', '2022-09-19', '06:00 pm', 'Cleaning of exhaust Fan', 'CG1805', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct cleaning of Exhaust fan', '2022-09-19', 1, 0, 0),
(1947, '3440707PM of ACUsForgot to update', 344, ' 2022-09-16', '2022-09-20', '07:07 am', 'PM of ACUs', 'CG1805', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 5, 'Forgot to update', 'PM of ACUs', '2022-09-16', 0.5, 1, 1),
(1948, '34407072022-09-20PM of ACUsForgot to update', 344, ' 2022-09-19', '2022-09-20', '07:07 am', 'PM of ACUs', 'CG1805', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 1, 'Forgot to update', 'PM of ACUs', '2022-09-19', 0.5, 0, 1),
(1949, '34407072022-09-20PM of ACUsForgot to update', 344, ' 2022-09-20', '2022-09-20', '07:07 am', 'PM of ACUs', 'CG1805', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, 'Forgot to update', 'PM of ACUs', '2022-09-20', 1, 0, 1),
(1950, '3700707PM of ACUsForgot to update', 370, ' 2022-09-16', '2022-09-20', '07:07 am', ' PMs of Air con', 'CG1805', 'daily', 'September', NULL, 'week 37', 0, NULL, '', '2022', 'FEM', 2, 'Forgot to update', 'PM of ACUs', '2022-09-16', 0, 0, 1),
(1951, '37007072022-09-20PM of ACUsForgot to update', 370, ' 2022-09-19', '2022-09-20', '07:07 am', ' PMs of Air con', 'CG1805', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 1, 'Forgot to update', 'PM of ACUs', '2022-09-19', 0.5, 0, 1),
(1952, '37007072022-09-20PM of ACUsForgot to update', 370, ' 2022-09-20', '2022-09-20', '07:07 am', ' PMs of Air con', 'CG1805', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, 'Forgot to update', 'PM of ACUs', '2022-09-20', 1, 0, 1),
(1953, '3470807Create a design for forecast pageForgot to finish in the system', 347, ' 2022-09-16', '2022-09-20', '08:07 am', 'Coding Manpower System', 'GP-22-722', 'daily', 'September', NULL, 'week 37', 0, NULL, './uploaded_files/98caa8274d74743438e42fd812ce1013.png', '2022', 'MIS', 2, 'Forgot to finish in the system', 'Create a design for forecast page', '2022-09-16', 0, 0, 1),
(1954, '34708072022-09-20Create a design for forecast pageForgot to finish in the system', 347, ' 2022-09-19', '2022-09-20', '08:07 am', 'Coding Manpower System', 'GP-22-722', 'daily', 'September', NULL, 'week 38', 0, NULL, './uploaded_files/98caa8274d74743438e42fd812ce1013.png', '2022', 'MIS', 1, 'Forgot to finish in the system', 'Create a design for forecast page', '2022-09-19', 0.5, 0, 1),
(1955, '34708072022-09-20Create a design for forecast pageForgot to finish in the system', 347, ' 2022-09-20', '2022-09-20', '08:07 am', 'Coding Manpower System', 'GP-22-722', 'daily', 'September', NULL, 'week 38', 0, NULL, './uploaded_files/98caa8274d74743438e42fd812ce1013.png', '2022', 'MIS', 0, 'Forgot to finish in the system', 'Create a design for forecast page', '2022-09-20', 1, 0, 1),
(1956, '38108352022-09-20Already done on schedule', 381, ' 2022-09-20', '2022-09-20', '08:35 am', 'Genset Dry run', 'CG0676', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Already done on schedule', '2022-09-20', 1, 0, 0),
(1957, '32508372022-09-20Conducted cleaning of air con filters', 325, ' 2022-09-20', '2022-09-20', '08:37 am', 'Cleaning of Air con filters ', 'CG0676', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of air con filters', '2022-09-20', 1, 0, 0),
(1958, '33808442022-09-20Checked. Found no trouble. Done', 338, ' 2022-09-20', '2022-09-20', '08:44 am', 'Security Guard Checklist', 'GP-18-614', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Checked. Found no trouble. Done', '2022-09-20', 1, 0, 0),
(1959, '32908472022-09-20Conducted cleaning of exhaust fan at new female and male CR', 329, ' 2022-09-20', '2022-09-20', '08:47 am', 'Cleaning of exhaust Fan', 'CG1420', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of exhaust fan at new female and male CR', '2022-09-20', 1, 0, 0),
(1960, '32808472022-09-20Conducted cleaning of ACU. filters', 328, ' 2022-09-20', '2022-09-20', '08:47 am', 'Cleaning of Air con filters ', 'CG1420', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of ACU. filters', '2022-09-20', 1, 0, 0),
(1961, '39408482022-09-20Conducted cleaning of ACU. filters', 394, ' 2022-09-20', '2022-09-20', '08:48 am', 'Cleaning of Air con filters ', 'CG1420', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of ACU. filters', '2022-09-20', 1, 0, 0),
(1962, '32610192022-09-20Conducted Cleaning of exhaust fan in new male&female cr', 326, ' 2022-09-20', '2022-09-20', '10:19 am', 'Cleaning of exhaust Fan', 'CG0676', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted Cleaning of exhaust fan in new male&female cr', '2022-09-20', 1, 0, 0),
(1963, '33502122022-09-20Conduct cleaning of Exhaust fan.', 335, ' 2022-09-20', '2022-09-20', '02:12 pm', 'Cleaning of exhaust Fan', 'CG1805', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct cleaning of Exhaust fan.', '2022-09-20', 1, 0, 0),
(1964, '33402122022-09-20Conduct cleaning of Air con filters.', 334, ' 2022-09-20', '2022-09-20', '02:12 pm', 'Cleaning of Air con filters ', 'CG1805', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct cleaning of Air con filters.', '2022-09-20', 1, 0, 0),
(1965, '37102122022-09-20Focus on Relay out of GPI 7', 371, ' 2022-09-19', '2022-09-20', '02:12 pm', 'Genset Dry run', 'CG1805', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 1, 'Focus on Relay out of GPI 7', '', '2022-09-19', 0.5, 0, 1),
(1966, '37102122022-09-20Focus on Relay out of GPI 7', 371, ' 2022-09-20', '2022-09-20', '02:12 pm', 'Genset Dry run', 'CG1805', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, 'Focus on Relay out of GPI 7', '', '2022-09-20', 1, 0, 0),
(1967, '34102152022-09-20Conducted cleaning PMS of aircon no,21', 341, ' 2022-09-20', '2022-09-20', '02:15 pm', 'PMS of Aircon', 'CG0676', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning PMS of aircon no,21', '2022-09-20', 1, 0, 0),
(1968, '35503502022-09-20check pending JO', 355, ' 2022-09-20', '2022-09-20', '03:50 pm', 'Checking of pending JO', 'cg1374', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'MIS', 0, '', 'check pending JO', '2022-09-20', 1, 0, 0),
(1969, '31103582022-09-20check relay out activity at GPI 7  ', 311, ' 2022-09-20', '2022-09-20', '03:58 pm', 'Roving', 'GP-22-718', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'check relay out activity at GPI 7  ', '2022-09-20', 1, 0, 0),
(1970, '32105472022-09-20Cleaning of aircon filter at conference 1,2,3,,5,clinic ', 321, ' 2022-09-20', '2022-09-20', '05:47 pm', 'Cleaning of Air con filters ', 'GP-22-730', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Cleaning of aircon filter at conference 1,2,3,,5,clinic ', '2022-09-20', 1, 0, 0),
(1971, '32205482022-09-20cleaning of exhaust fan.', 322, ' 2022-09-20', '2022-09-20', '05:48 pm', 'Cleaning of exhaust Fan', 'GP-22-730', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'cleaning of exhaust fan.', '2022-09-20', 1, 0, 0),
(1972, '36405482022-09-20cleaning of aircon', 364, ' 2022-09-20', '2022-09-20', '05:48 pm', 'PMS of ACUs', 'GP-22-730', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'cleaning of aircon', '2022-09-20', 1, 0, 0),
(1973, '36605492022-09-20dry run of genset at gpi 2 and 1', 366, ' 2022-09-20', '2022-09-20', '05:49 pm', 'Genset Dry run', 'GP-22-730', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'dry run of genset at gpi 2 and 1', '2022-09-20', 1, 0, 0),
(1974, '34205552022-09-20Conducted PMS of aircon', 342, ' 2022-09-20', '2022-09-20', '05:55 pm', 'PMS of Aircon', 'CG1420', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted PMS of aircon', '2022-09-20', 1, 0, 0),
(1975, '37605562022-09-20Conducted dry run of gen set', 376, ' 2022-09-20', '2022-09-20', '05:56 pm', 'Genset Dry run', 'CG1420', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted dry run of gen set', '2022-09-20', 1, 0, 0),
(1976, '38108522022-09-21Already done on sept,19 2022', 381, ' 2022-09-21', '2022-09-21', '08:52 am', 'Genset Dry run', 'CG0676', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Already done on sept,19 2022', '2022-09-21', 1, 0, 0),
(1977, '34708542022-09-21Create an \"Add Line\" feature. ', 347, ' 2022-09-21', '2022-09-21', '08:54 am', 'Coding Manpower System', 'GP-22-722', 'daily', 'September', NULL, 'week 38', 0, NULL, './uploaded_files/b123df8c7772216694dd84b4988779ba.png', '2022', 'MIS', 0, '', 'Create an \"Add Line\" feature. ', '2022-09-21', 1, 0, 0),
(1978, '34608-572022-09-21Generate reports for canteen billing for this week', 346, ' 2022-09-21', '2022-09-21', '08:57 am', 'Canteen Billing', 'GP-22-722', 'weekly', 'September', NULL, 'week 38', 38, '2022-09-19', './uploaded_files/61d95fefb558076494e529b50be38e48.png', '2022', 'MIS', 0, '', 'Generate reports for canteen billing for this week', '2022-09-21', 1, 0, 0),
(1979, '32509212022-09-21Conducted Cleaning of aircon filters no,11,12,14,15,16', 325, ' 2022-09-21', '2022-09-21', '09:21 am', 'Cleaning of Air con filters ', 'CG0676', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted Cleaning of aircon filters no,11,12,14,15,16', '2022-09-21', 1, 0, 0),
(1980, '32609542022-09-21Conducted cleaning of exhaust fan in female shoe locker', 326, ' 2022-09-21', '2022-09-21', '09:54 am', 'Cleaning of exhaust Fan', 'CG0676', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of exhaust fan in female shoe locker', '2022-09-21', 1, 0, 0),
(1981, '32810312022-09-21Conducted cleaning of ACU. filters at saitma,Q.A and admin area', 328, ' 2022-09-21', '2022-09-21', '10:31 am', 'Cleaning of Air con filters ', 'CG1420', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of ACU. filters at saitma,Q.A and admin area', '2022-09-21', 1, 0, 0),
(1982, '39410312022-09-21Conducted cleaning of ACU. filters at saitma,Q.A and admin area', 394, ' 2022-09-21', '2022-09-21', '10:31 am', 'Cleaning of Air con filters ', 'CG1420', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of ACU. filters at saitma,Q.A and admin area', '2022-09-21', 1, 0, 0),
(1983, '32910322022-09-21Conducted cleaning of exhaust fan', 329, ' 2022-09-21', '2022-09-21', '10:32 am', 'Cleaning of exhaust Fan', 'CG1420', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of exhaust fan', '2022-09-21', 1, 0, 0),
(1984, '34110352022-09-21Conducted PMS of ACU. at canteen area and parts inspection area', 341, ' 2022-09-21', '2022-09-21', '10:35 am', 'PMS of Aircon', 'CG0676', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted PMS of ACU. at canteen area and parts inspection area', '2022-09-21', 1, 0, 0),
(1985, '33410562022-09-21Conduct cleaning of Air con filters at QA area, DOK, Prod. Supplies, And Saitama.', 334, ' 2022-09-21', '2022-09-21', '10:56 am', 'Cleaning of Air con filters ', 'CG1805', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct cleaning of Air con filters at QA area, DOK, Prod. Supplies, And Saitama.', '2022-09-21', 1, 0, 0),
(1986, '33510572022-09-21Conduct cleaning of Exhaust fan.', 335, ' 2022-09-21', '2022-09-21', '10:57 am', 'Cleaning of exhaust Fan', 'CG1805', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct cleaning of Exhaust fan.', '2022-09-21', 1, 0, 0),
(1987, '48812232022-09-21Already submit letter to MERLCO-CEZ', 488, ' 2022-09-21', '2022-09-21', '12:23 pm', 'Submit formal letter of request to meralco for tem', 'GP-22-718', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Already submit letter to MERLCO-CEZ', '2022-09-21', 1, 0, 0),
(1988, '33812352022-09-21Checked. Found no trouble. Endorsed back to Security Guard', 338, ' 2022-09-21', '2022-09-21', '12:35 pm', 'Security Guard Checklist', 'GP-18-614', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Checked. Found no trouble. Endorsed back to Security Guard', '2022-09-21', 1, 0, 0),
(1989, '47712382022-09-21Sorted all engineering documents based on its category. Collect similar documents a', 477, ' 2022-09-21', '2022-09-21', '12:38 pm', 'Sort all engineering forms and categorize ', 'GP-18-614', 'annual', 'September', '2022-09-01', 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Sorted all engineering documents based on its category. Collect similar documents and put inside clear sheets and consolidate in one archfile. Clean sheets and archfile before putting documents inside. ', '2022-09-21', 1, 0, 0),
(1990, '31103012022-09-21Not applicable today due to processing of formal letter of request to Meralco for t', 311, ' 2022-09-21', '2022-09-21', '03:01 pm', 'Roving', 'GP-22-718', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Not applicable today due to processing of formal letter of request to Meralco for temporary power shutdown of GPI 9 and processing of documents to submit to Meralco sta. Rosa.', '2022-09-21', 1, 0, 0),
(1991, '35503512022-09-21perform JO, play the presentation for external and internal audit at GPI1 canteen', 355, ' 2022-09-21', '2022-09-21', '03:51 pm', 'Checking of pending JO', 'cg1374', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'MIS', 0, '', 'perform JO, play the presentation for external and internal audit at GPI1 canteen', '2022-09-21', 1, 0, 0),
(1992, '34205542022-09-21Conducted PMS of aircon', 342, ' 2022-09-21', '2022-09-21', '05:54 pm', 'PMS of Aircon', 'CG1420', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted PMS of aircon', '2022-09-21', 1, 0, 0),
(1993, '37605552022-09-21Conducted dry run of gen set', 376, ' 2022-09-21', '2022-09-21', '05:55 pm', 'Genset Dry run', 'CG1420', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted dry run of gen set', '2022-09-21', 1, 0, 0),
(1994, '34405552022-09-21Conduct PM of ACUs', 344, ' 2022-09-21', '2022-09-21', '05:55 pm', 'PM of ACUs', 'CG1805', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct PM of ACUs', '2022-09-21', 1, 0, 0),
(1995, '37005552022-09-21Conduct PM of ACUs', 370, ' 2022-09-21', '2022-09-21', '05:55 pm', ' PMs of Air con', 'CG1805', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct PM of ACUs', '2022-09-21', 1, 0, 0),
(1996, '37105562022-09-21Conduct Dry run of Genset', 371, ' 2022-09-21', '2022-09-21', '05:56 pm', 'Genset Dry run', 'CG1805', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct Dry run of Genset', '2022-09-21', 1, 0, 0),
(1997, '38106472022-09-22Already done on sept.19,2022', 381, ' 2022-09-22', '2022-09-22', '06:47 am', 'Genset Dry run', 'CG0676', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Already done on sept.19,2022', '2022-09-22', 1, 0, 0),
(1998, '32107142022-09-22cleaning of fiter prod.office,saitama area,audit and training,prod supplies.perform', 321, ' 2022-09-21', '2022-09-22', '07:14 am', 'Cleaning of Air con filters ', 'GP-22-730', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 1, 'perform but not update due to relayout of rbw 200.', 'cleaning of fiter prod.office,saitama area,audit and training,prod supplies.', '2022-09-21', 0.5, 0, 1),
(1999, '32107142022-09-22cleaning of fiter prod.office,saitama area,audit and training,prod supplies.perform', 321, ' 2022-09-22', '2022-09-22', '07:14 am', 'Cleaning of Air con filters ', 'GP-22-730', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, 'perform but not update due to relayout of rbw 200.', 'cleaning of fiter prod.office,saitama area,audit and training,prod supplies.', '2022-09-22', 1, 0, 0),
(2000, '32207142022-09-22cleaning of exhaust fan.perform but not update due to relayout of rbw 200.', 322, ' 2022-09-21', '2022-09-22', '07:14 am', 'Cleaning of exhaust Fan', 'GP-22-730', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 1, 'perform but not update due to relayout of rbw 200.', 'cleaning of exhaust fan.', '2022-09-21', 0.5, 0, 1),
(2001, '32207142022-09-22cleaning of exhaust fan.perform but not update due to relayout of rbw 200.', 322, ' 2022-09-22', '2022-09-22', '07:14 am', 'Cleaning of exhaust Fan', 'GP-22-730', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, 'perform but not update due to relayout of rbw 200.', 'cleaning of exhaust fan.', '2022-09-22', 1, 0, 0),
(2002, '36407162022-09-22conduct of cleaning of aircon.perform but not update due to relayout of rbw 200.', 364, ' 2022-09-21', '2022-09-22', '07:16 am', 'PMS of ACUs', 'GP-22-730', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 1, 'perform but not update due to relayout of rbw 200.', 'conduct of cleaning of aircon.', '2022-09-21', 0.5, 0, 1),
(2003, '36407162022-09-22conduct of cleaning of aircon.perform but not update due to relayout of rbw 200.', 364, ' 2022-09-22', '2022-09-22', '07:16 am', 'PMS of ACUs', 'GP-22-730', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, 'perform but not update due to relayout of rbw 200.', 'conduct of cleaning of aircon.', '2022-09-22', 1, 0, 0),
(2004, '36607162022-09-22counduct of dry run of gensetalready finish last sept 5 and sept 19', 366, ' 2022-09-21', '2022-09-22', '07:16 am', 'Genset Dry run', 'GP-22-730', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 1, 'already finish last sept 5 and sept 19', 'counduct of dry run of genset', '2022-09-21', 0.5, 0, 1),
(2005, '36607162022-09-22counduct of dry run of gensetalready finish last sept 5 and sept 19', 366, ' 2022-09-22', '2022-09-22', '07:16 am', 'Genset Dry run', 'GP-22-730', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, 'already finish last sept 5 and sept 19', 'counduct of dry run of genset', '2022-09-22', 1, 0, 0),
(2006, '32508492022-09-22Conducted Cleaning of aircon filters 17.18,19,20,21,22', 325, ' 2022-09-22', '2022-09-22', '08:49 am', 'Cleaning of Air con filters ', 'CG0676', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted Cleaning of aircon filters 17.18,19,20,21,22', '2022-09-22', 1, 0, 0),
(2007, '32609422022-09-22CONDUCTED CLEANING OF EXHAUST FAN, MALE AND FEMALE, CR.', 326, ' 2022-09-22', '2022-09-22', '09:42 am', 'Cleaning of exhaust Fan', 'CG0676', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'CONDUCTED CLEANING OF EXHAUST FAN, MALE AND FEMALE, CR.', '2022-09-22', 1, 0, 0),
(2008, '34109452022-09-22CONDUCTED PMS OF AIRCO NO.23,25,26.', 341, ' 2022-09-22', '2022-09-22', '09:45 am', 'PMS of Aircon', 'CG0676', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'CONDUCTED PMS OF AIRCO NO.23,25,26.', '2022-09-22', 1, 0, 0),
(2009, '32810142022-09-22Conducted cleaning of ACU. filters at PAC. area', 328, ' 2022-09-22', '2022-09-22', '10:14 am', 'Cleaning of Air con filters ', 'CG1420', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of ACU. filters at PAC. area', '2022-09-22', 1, 0, 0),
(2010, '39410152022-09-22Conducted cleaning of ACU. filters at PAC. area', 394, ' 2022-09-22', '2022-09-22', '10:15 am', 'Cleaning of Air con filters ', 'CG1420', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of ACU. filters at PAC. area', '2022-09-22', 1, 0, 0),
(2011, '33410202022-09-22Conduct cleaning of Air con filters.', 334, ' 2022-09-22', '2022-09-22', '10:20 am', 'Cleaning of Air con filters ', 'CG1805', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct cleaning of Air con filters.', '2022-09-22', 1, 0, 0),
(2012, '33810442022-09-22Checked. Found no trouble. Endorsed back to GPI 1 Security', 338, ' 2022-09-22', '2022-09-22', '10:44 am', 'Security Guard Checklist', 'GP-18-614', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Checked. Found no trouble. Endorsed back to GPI 1 Security', '2022-09-22', 1, 0, 0),
(2013, '48910462022-09-22Went to PEZA and Process payment. Accomplish photo copy of the receipt. Submit to P', 489, ' 2022-09-22', '2022-09-22', '10:46 am', 'Process LOA and certification payment ', 'GP-18-614', 'annual', 'September', '2022-09-01', 'week 38', 0, NULL, '', '2022', 'FEM', 2, 'Tight Schedule', 'Went to PEZA and Process payment. Accomplish photo copy of the receipt. Submit to PEZA Office. ', '2022-09-21', 0.5, 0, 1),
(2014, '49010472022-09-22Already performed. Tight Schedule', 490, ' 2022-09-22', '2022-09-22', '10:47 am', 'Contact Supplier to outsource parts', 'GP-18-614', 'annual', 'September', '2022-09-01', 'week 38', 0, NULL, '', '2022', 'FEM', 2, 'Tight Schedule', 'Already performed. ', '2022-09-21', 0.5, 0, 1),
(2015, '32910492022-09-22Conducted cleaning of exhaust fan', 329, ' 2022-09-22', '2022-09-22', '10:49 am', 'Cleaning of exhaust Fan', 'CG1420', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of exhaust fan', '2022-09-22', 1, 0, 0),
(2016, '33510502022-09-22Conduct cleaning of Exhaust fan.', 335, ' 2022-09-22', '2022-09-22', '10:50 am', 'Cleaning of exhaust Fan', 'CG1805', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct cleaning of Exhaust fan.', '2022-09-22', 1, 0, 0),
(2017, '49310562022-09-22Compose announcement for all ADMIN Members and send as email notificationTight Sche', 493, ' 2022-09-22', '2022-09-22', '10:56 am', 'Email COA Awareness notification to all Admin Memb', 'GP-18-614', 'annual', 'September', '2022-09-01', 'week 38', 0, NULL, '', '2022', 'FEM', 2, 'Tight Schedule', 'Compose announcement for all ADMIN Members and send as email notification', '2022-09-21', 0.5, 0, 1),
(2018, '49211022022-09-22Copy materials needed. Contact Supplier for price inquiry and encode to excel. Comp', 492, ' 2022-09-22', '2022-09-22', '11:02 am', 'Request quotation of materials for gate 3 parking', 'GP-18-614', 'annual', 'September', '2022-09-01', 'week 38', 0, NULL, '', '2022', 'FEM', 2, 'Tight Schedule', 'Copy materials needed. Contact Supplier for price inquiry and encode to excel. Compute and Send to FEM leaders.', '2022-09-21', 0.5, 0, 1),
(2019, '34202492022-09-22Conducted PMS of ACU.', 342, ' 2022-09-22', '2022-09-22', '02:49 pm', 'PMS of Aircon', 'CG1420', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted PMS of ACU.', '2022-09-22', 1, 0, 0),
(2020, '31103032022-09-22Conduct roving at plant 2,3,7&9 around 2:40pm and found out air leaks at plant 7, a', 311, ' 2022-09-22', '2022-09-22', '03:03 pm', 'Roving', 'GP-22-718', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct roving at plant 2,3,7&9 around 2:40pm and found out air leaks at plant 7, already coordinate to FEM.', '2022-09-22', 1, 0, 0),
(2021, '34403432022-09-22Conduct PM of ACUs', 344, ' 2022-09-22', '2022-09-22', '03:43 pm', 'PM of ACUs', 'CG1805', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct PM of ACUs', '2022-09-22', 1, 0, 0),
(2022, '37003432022-09-22Conduct PM of ACUs.', 370, ' 2022-09-22', '2022-09-22', '03:43 pm', ' PMs of Air con', 'CG1805', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct PM of ACUs.', '2022-09-22', 1, 0, 0),
(2023, '37105512022-09-22Conduct Dry run of Gen set.', 371, ' 2022-09-22', '2022-09-22', '05:51 pm', 'Genset Dry run', 'CG1805', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct Dry run of Gen set.', '2022-09-22', 1, 0, 0),
(2024, '37605542022-09-22Conducted dry run of genset ', 376, ' 2022-09-22', '2022-09-22', '05:54 pm', 'Genset Dry run', 'CG1420', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted dry run of genset ', '2022-09-22', 1, 0, 0),
(2025, '34706112022-09-23connect to database so that the user can add machine, model and number of working d', 347, ' 2022-09-22', '2022-09-23', '06:11 am', 'Coding Manpower System', 'GP-22-722', 'daily', 'September', NULL, 'week 38', 0, NULL, './uploaded_files/3f82663f3764ff2f46b2a71ff199ec1d.png', '2022', 'MIS', 1, 'Forgot to finish the task in the system', 'connect to database so that the user can add machine, model and number of working days in every month', '2022-09-22', 0.5, 0, 1),
(2026, '34706112022-09-23connect to database so that the user can add machine, model and number of working d', 347, ' 2022-09-23', '2022-09-23', '06:11 am', 'Coding Manpower System', 'GP-22-722', 'daily', 'September', NULL, 'week 38', 0, NULL, './uploaded_files/3f82663f3764ff2f46b2a71ff199ec1d.png', '2022', 'MIS', 0, 'Forgot to finish the task in the system', 'connect to database so that the user can add machine, model and number of working days in every month', '2022-09-23', 1, 0, 0),
(2027, '38106412022-09-23ALREADY DONE ON SEPT. 19,2022', 381, ' 2022-09-23', '2022-09-23', '06:41 am', 'Genset Dry run', 'CG0676', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'ALREADY DONE ON SEPT. 19,2022', '2022-09-23', 1, 0, 0),
(2028, '33408442022-09-23Conduct cleanig of Air con filters.', 334, ' 2022-09-23', '2022-09-23', '08:44 am', 'Cleaning of Air con filters ', 'CG1805', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct cleanig of Air con filters.', '2022-09-23', 1, 0, 0),
(2029, '37108442022-09-23Conduct dry run of genset.', 371, ' 2022-09-23', '2022-09-23', '08:44 am', 'Genset Dry run', 'CG1805', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct dry run of genset.', '2022-09-23', 1, 0, 0),
(2030, '32808452022-09-23Conducted cleaning of ACU. filters at canteen area GPI-1', 328, ' 2022-09-23', '2022-09-23', '08:45 am', 'Cleaning of Air con filters ', 'CG1420', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of ACU. filters at canteen area GPI-1', '2022-09-23', 1, 0, 0),
(2031, '39408462022-09-23Conducted cleaning of ACU. filters at canteen area GPI-1', 394, ' 2022-09-23', '2022-09-23', '08:46 am', 'Cleaning of Air con filters ', 'CG1420', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of ACU. filters at canteen area GPI-1', '2022-09-23', 1, 0, 0),
(2032, '37608482022-09-23Already done till next schedule', 376, ' 2022-09-23', '2022-09-23', '08:48 am', 'Genset Dry run', 'CG1420', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Already done till next schedule', '2022-09-23', 1, 0, 0),
(2033, '32510442022-09-23Conducted cleaning of aircon filters. no. 23,24,25,26,27,28,29,30', 325, ' 2022-09-23', '2022-09-23', '10:44 am', 'Cleaning of Air con filters ', 'CG0676', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of aircon filters. no. 23,24,25,26,27,28,29,30', '2022-09-23', 1, 0, 0),
(2034, '32610462022-09-23Conducted of exhaust fan male and female locker area', 326, ' 2022-09-23', '2022-09-23', '10:46 am', 'Cleaning of exhaust Fan', 'CG0676', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted of exhaust fan male and female locker area', '2022-09-23', 1, 0, 0),
(2035, '36611122022-09-23ALREADY FINISH LAST SEPTEMBER 5 AND SEPTEMBER 19,2022', 366, ' 2022-09-23', '2022-09-23', '11:12 am', 'Genset Dry run', 'GP-22-730', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'ALREADY FINISH LAST SEPTEMBER 5 AND SEPTEMBER 19,2022', '2022-09-23', 1, 0, 0),
(2036, '32111132022-09-23CLEANING OF AIRCON FILTER AT CANTEEN AREA,CON.4,AGENCY OFFICE,AND KITCHEN.', 321, ' 2022-09-23', '2022-09-23', '11:13 am', 'Cleaning of Air con filters ', 'GP-22-730', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'CLEANING OF AIRCON FILTER AT CANTEEN AREA,CON.4,AGENCY OFFICE,AND KITCHEN.', '2022-09-23', 1, 0, 0),
(2037, '33512212022-09-23Conduct cleaning of Exhaust fan.', 335, ' 2022-09-23', '2022-09-23', '12:21 pm', 'Cleaning of exhaust Fan', 'CG1805', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct cleaning of Exhaust fan.', '2022-09-23', 1, 0, 0),
(2038, '34101522022-09-23Conducted pms of aircon 27,28', 341, ' 2022-09-23', '2022-09-23', '01:52 pm', 'PMS of Aircon', 'CG0676', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted pms of aircon 27,28', '2022-09-23', 1, 0, 0),
(2039, '31103472022-09-23conduct roving at GPI 3,7,5 and there was no findings.', 311, ' 2022-09-23', '2022-09-23', '03:47 pm', 'Roving', 'GP-22-718', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'conduct roving at GPI 3,7,5 and there was no findings.', '2022-09-23', 1, 0, 0),
(2040, '3500347Performed daily JO, and assisting co-employeeforgot to update.', 350, ' 2022-09-20', '2022-09-23', '03:47 pm', 'Attending pending JO request', 'CG1732', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'MIS', 3, 'forgot to update.', 'Performed daily JO, and assisting co-employee', '2022-09-20', 0, 0, 1),
(2041, '35003472022-09-23Performed daily JO, and assisting co-employeeforgot to update.', 350, ' 2022-09-21', '2022-09-23', '03:47 pm', 'Attending pending JO request', 'CG1732', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'MIS', 2, 'forgot to update.', 'Performed daily JO, and assisting co-employee', '2022-09-21', 0, 0, 1),
(2042, '35003472022-09-23Performed daily JO, and assisting co-employeeforgot to update.', 350, ' 2022-09-22', '2022-09-23', '03:47 pm', 'Attending pending JO request', 'CG1732', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'MIS', 1, 'forgot to update.', 'Performed daily JO, and assisting co-employee', '2022-09-22', 0.5, 0, 1),
(2043, '35003472022-09-23Performed daily JO, and assisting co-employeeforgot to update.', 350, ' 2022-09-23', '2022-09-23', '03:47 pm', 'Attending pending JO request', 'CG1732', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'MIS', 0, 'forgot to update.', 'Performed daily JO, and assisting co-employee', '2022-09-23', 1, 0, 1),
(2044, '32904002022-09-23cleaning of aircon.', 329, ' 2022-09-23', '2022-09-23', '04:00 pm', 'Cleaning of exhaust Fan', 'CG1420', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'cleaning of aircon.', '2022-09-23', 1, 0, 0),
(2045, '34204002022-09-23cleaning of aircon', 342, ' 2022-09-23', '2022-09-23', '04:00 pm', 'PMS of Aircon', 'CG1420', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'cleaning of aircon', '2022-09-23', 1, 0, 0),
(2046, '32204012022-09-23cleaning of exhaust fan.', 322, ' 2022-09-23', '2022-09-23', '04:01 pm', 'Cleaning of exhaust Fan', 'GP-22-730', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'cleaning of exhaust fan.', '2022-09-23', 1, 0, 0),
(2047, '36404012022-09-23pm of aircon.', 364, ' 2022-09-23', '2022-09-23', '04:01 pm', 'PMS of ACUs', 'GP-22-730', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 0, '', 'pm of aircon.', '2022-09-23', 1, 0, 0);
INSERT INTO `finishedtask` (`FinishedTaskID`, `sameID`, `taskID`, `Date`, `DateSubmitted`, `timestamp`, `task_Name`, `in_charge`, `sched_Type`, `month`, `firstDateOfTheMonth`, `week`, `weekNumber`, `lastMonday`, `attachments`, `year`, `Department`, `noOfDaysLate`, `reason`, `action`, `realDate`, `score`, `isCheckedByLeader`, `isLate`) VALUES
(2048, '33812202022-09-24Performed within the set date. No found trouble. Endorsed back to GPI 1 guardsTight', 338, ' 2022-09-23', '2022-09-24', '12:20 pm', 'Security Guard Checklist', 'GP-18-614', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 1, 'Tight Schedule', 'Performed within the set date. No found trouble. Endorsed back to GPI 1 guards', '2022-09-23', 1, 0, 0),
(2049, '3550111update the pending JOon leave', 355, ' 2022-09-22', '2022-09-24', '01:11 pm', 'Checking of pending JO', 'cg1374', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'MIS', 2, 'on leave', 'update the pending JO', '2022-09-22', 0.5, 0, 1),
(2050, '35501112022-09-24update the pending JOon leave', 355, ' 2022-09-23', '2022-09-24', '01:11 pm', 'Checking of pending JO', 'cg1374', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'MIS', 1, 'on leave', 'update the pending JO', '2022-09-23', 1, 0, 1),
(2051, '33808042022-09-27Security guard checklist is performed on tuesdayNo work schedule yesterday due to w', 338, ' 2022-09-26', '2022-09-27', '08:04 am', 'Security Guard Checklist', 'GP-18-614', 'daily', 'September', NULL, 'week 39', 0, NULL, '', '2022', 'FEM', 1, 'No work schedule yesterday due to work cancellation (typhoon)', 'Security guard checklist is performed on tuesday', '2022-09-26', 0.5, 0, 1),
(2052, '33808042022-09-27Security guard checklist is performed on tuesdayNo work schedule yesterday due to w', 338, ' 2022-09-27', '2022-09-27', '08:04 am', 'Security Guard Checklist', 'GP-18-614', 'daily', 'September', NULL, 'week 39', 0, NULL, '', '2022', 'FEM', 0, 'No work schedule yesterday due to work cancellation (typhoon)', 'Security guard checklist is performed on tuesday', '2022-09-27', 1, 0, 0),
(2053, '48008052022-09-27Need to outsource/request colored paper Tight schedule', 480, ' 2022-09-27', '2022-09-27', '08:05 am', 'Create label and tagging for Engineering Archfiles', 'GP-18-614', 'annual', 'September', '2022-09-01', 'week 39', 0, NULL, '', '2022', 'FEM', 5, 'Tight schedule', 'Need to outsource/request colored paper ', '2022-09-21', 0, 0, 1),
(2054, '33408422022-09-27Conduct cleaning of Air con filters.', 334, ' 2022-09-27', '2022-09-27', '08:42 am', 'Cleaning of Air con filters ', 'CG1805', 'daily', 'September', NULL, 'week 39', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct cleaning of Air con filters.', '2022-09-27', 1, 0, 0),
(2055, '48308512022-09-27Done.We finished the training at extended time. I was not able to update my task.', 483, ' 2022-09-27', '2022-09-27', '08:51 am', 'Participate in Training', 'GP-18-614', 'annual', 'September', '2022-09-01', 'week 39', 0, NULL, '', '2022', 'FEM', 1, 'We finished the training at extended time. I was not able to update my task.', 'Done.', '2022-09-26', 0.5, 0, 1),
(2056, '38109272022-09-27TO BE SCHEDULENO. WORK', 381, ' 2022-09-27', '2022-09-27', '09:27 am', 'Genset Dry run', 'CG0676', 'daily', 'September', NULL, 'week 39', 0, NULL, '', '2022', 'FEM', 0, 'NO. WORK', 'TO BE SCHEDULE', '2022-09-27', 1, 0, 0),
(2057, '32812072022-09-27Conducted cleaning of air con filters at conference room 1,2,3,5 and clinic', 328, ' 2022-09-27', '2022-09-27', '12:07 pm', 'Cleaning of Air con filters ', 'CG1420', 'daily', 'September', NULL, 'week 39', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of air con filters at conference room 1,2,3,5 and clinic', '2022-09-27', 1, 0, 0),
(2058, '39412072022-09-27Conducted cleaning of air con filters at conference room 1,2,3,5 and clinic', 394, ' 2022-09-27', '2022-09-27', '12:07 pm', 'Cleaning of Air con filters ', 'CG1420', 'daily', 'September', NULL, 'week 39', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of air con filters at conference room 1,2,3,5 and clinic', '2022-09-27', 1, 0, 0),
(2059, '32912092022-09-27Conducted cleaning of exhaust fan at new male and female cr', 329, ' 2022-09-27', '2022-09-27', '12:09 pm', 'Cleaning of exhaust Fan', 'CG1420', 'daily', 'September', NULL, 'week 39', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of exhaust fan at new male and female cr', '2022-09-27', 1, 0, 0),
(2060, '37612092022-09-27Already done', 376, ' 2022-09-27', '2022-09-27', '12:09 pm', 'Genset Dry run', 'CG1420', 'daily', 'September', NULL, 'week 39', 0, NULL, '', '2022', 'FEM', 0, '', 'Already done', '2022-09-27', 1, 0, 0),
(2061, '32501112022-09-27Conduct Cleaning of aircon filters no.6,7,8,9,10,24', 325, ' 2022-09-27', '2022-09-27', '01:11 pm', 'Cleaning of Air con filters ', 'CG0676', 'daily', 'September', NULL, 'week 39', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct Cleaning of aircon filters no.6,7,8,9,10,24', '2022-09-27', 1, 0, 0),
(2062, '32601122022-09-27Conduct cleaning of exhaust fan', 326, ' 2022-09-27', '2022-09-27', '01:12 pm', 'Cleaning of exhaust Fan', 'CG0676', 'daily', 'September', NULL, 'week 39', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct cleaning of exhaust fan', '2022-09-27', 1, 0, 0),
(2063, '34101142022-09-27Conduct PMS of aircon no.30', 341, ' 2022-09-27', '2022-09-27', '01:14 pm', 'PMS of Aircon', 'CG0676', 'daily', 'September', NULL, 'week 39', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct PMS of aircon no.30', '2022-09-27', 1, 0, 0),
(2064, '31103272022-09-27Not applicable today due to processing of documents for Meralco and for PTO documen', 311, ' 2022-09-27', '2022-09-27', '03:27 pm', 'Roving', 'GP-22-718', 'daily', 'September', NULL, 'week 39', 0, NULL, '', '2022', 'FEM', 0, '', 'Not applicable today due to processing of documents for Meralco and for PTO documents of smoke control system.', '2022-09-27', 1, 0, 0),
(2065, '34205592022-09-27Conducted PMS of air con', 342, ' 2022-09-27', '2022-09-27', '05:59 pm', 'PMS of Aircon', 'CG1420', 'daily', 'September', NULL, 'week 39', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted PMS of air con', '2022-09-27', 1, 0, 0),
(2066, '32107492022-09-28cleaning of aircon filter.perform the cleaning of filter but not update.', 321, ' 2022-09-27', '2022-09-28', '07:49 am', 'Cleaning of Air con filters ', 'GP-22-730', 'daily', 'September', NULL, 'week 39', 0, NULL, '', '2022', 'FEM', 1, 'perform the cleaning of filter but not update.', 'cleaning of aircon filter.', '2022-09-27', 0.5, 0, 1),
(2067, '32107492022-09-28cleaning of aircon filter.perform the cleaning of filter but not update.', 321, ' 2022-09-28', '2022-09-28', '07:49 am', 'Cleaning of Air con filters ', 'GP-22-730', 'daily', 'September', NULL, 'week 39', 0, NULL, '', '2022', 'FEM', 0, 'perform the cleaning of filter but not update.', 'cleaning of aircon filter.', '2022-09-28', 1, 0, 0),
(2068, '32207502022-09-28cleaning of exhaust fan.perform the cleaning of exhaust but not update', 322, ' 2022-09-27', '2022-09-28', '07:50 am', 'Cleaning of exhaust Fan', 'GP-22-730', 'daily', 'September', NULL, 'week 39', 0, NULL, '', '2022', 'FEM', 1, 'perform the cleaning of exhaust but not update', 'cleaning of exhaust fan.', '2022-09-27', 0.5, 0, 1),
(2069, '32207502022-09-28cleaning of exhaust fan.perform the cleaning of exhaust but not update', 322, ' 2022-09-28', '2022-09-28', '07:50 am', 'Cleaning of exhaust Fan', 'GP-22-730', 'daily', 'September', NULL, 'week 39', 0, NULL, '', '2022', 'FEM', 0, 'perform the cleaning of exhaust but not update', 'cleaning of exhaust fan.', '2022-09-28', 1, 0, 0),
(2070, '36407512022-09-28cleaning of airconperform the cleaning of aircon but not update', 364, ' 2022-09-27', '2022-09-28', '07:51 am', 'PMS of ACUs', 'GP-22-730', 'daily', 'September', NULL, 'week 39', 0, NULL, '', '2022', 'FEM', 1, 'perform the cleaning of aircon but not update', 'cleaning of aircon', '2022-09-27', 0.5, 0, 1),
(2071, '36407512022-09-28cleaning of airconperform the cleaning of aircon but not update', 364, ' 2022-09-28', '2022-09-28', '07:51 am', 'PMS of ACUs', 'GP-22-730', 'daily', 'September', NULL, 'week 39', 0, NULL, '', '2022', 'FEM', 0, 'perform the cleaning of aircon but not update', 'cleaning of aircon', '2022-09-28', 1, 0, 0),
(2072, '36607512022-09-28already done.already done last seot 5 and seot 19', 366, ' 2022-09-27', '2022-09-28', '07:51 am', 'Genset Dry run', 'GP-22-730', 'daily', 'September', NULL, 'week 39', 0, NULL, '', '2022', 'FEM', 1, 'already done last seot 5 and seot 19', 'already done.', '2022-09-27', 0.5, 0, 1),
(2073, '36607512022-09-28already done.already done last seot 5 and seot 19', 366, ' 2022-09-28', '2022-09-28', '07:51 am', 'Genset Dry run', 'GP-22-730', 'daily', 'September', NULL, 'week 39', 0, NULL, '', '2022', 'FEM', 0, 'already done last seot 5 and seot 19', 'already done.', '2022-09-28', 1, 0, 0),
(2074, '38107572022-09-28ALREADY DONE ON SEPT.19,2022', 381, ' 2022-09-28', '2022-09-28', '07:57 am', 'Genset Dry run', 'CG0676', 'daily', 'September', NULL, 'week 39', 0, NULL, '', '2022', 'FEM', 0, '', 'ALREADY DONE ON SEPT.19,2022', '2022-09-28', 1, 0, 0),
(2075, '37608492022-09-28Already done', 376, ' 2022-09-28', '2022-09-28', '08:49 am', 'Genset Dry run', 'CG1420', 'daily', 'September', NULL, 'week 39', 0, NULL, '', '2022', 'FEM', 0, '', 'Already done', '2022-09-28', 1, 0, 0),
(2076, '37108512022-09-28Already done on Sept. 19, 2022Forget to update ', 371, ' 2022-09-27', '2022-09-28', '08:51 am', 'Genset Dry run', 'CG1805', 'daily', 'September', NULL, 'week 39', 0, NULL, '', '2022', 'FEM', 1, 'Forget to update ', 'Already done on Sept. 19, 2022', '2022-09-27', 0.5, 0, 1),
(2077, '37108512022-09-28Already done on Sept. 19, 2022Forget to update ', 371, ' 2022-09-28', '2022-09-28', '08:51 am', 'Genset Dry run', 'CG1805', 'daily', 'September', NULL, 'week 39', 0, NULL, '', '2022', 'FEM', 0, 'Forget to update ', 'Already done on Sept. 19, 2022', '2022-09-28', 1, 0, 0),
(2078, '3700852PM of ACUsForget to update.', 370, ' 2022-09-23', '2022-09-28', '08:52 am', ' PMs of Air con', 'CG1805', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 2, 'Forget to update.', 'PM of ACUs', '2022-09-23', 0, 0, 1),
(2079, '37008522022-09-28PM of ACUsForget to update.', 370, ' 2022-09-27', '2022-09-28', '08:52 am', ' PMs of Air con', 'CG1805', 'daily', 'September', NULL, 'week 39', 0, NULL, '', '2022', 'FEM', 1, 'Forget to update.', 'PM of ACUs', '2022-09-27', 0.5, 0, 1),
(2080, '37008522022-09-28PM of ACUsForget to update.', 370, ' 2022-09-28', '2022-09-28', '08:52 am', ' PMs of Air con', 'CG1805', 'daily', 'September', NULL, 'week 39', 0, NULL, '', '2022', 'FEM', 0, 'Forget to update.', 'PM of ACUs', '2022-09-28', 1, 0, 1),
(2081, '3440852PM of ACUs.Forget to update.', 344, ' 2022-09-23', '2022-09-28', '08:52 am', 'PM of ACUs', 'CG1805', 'daily', 'September', NULL, 'week 38', 0, NULL, '', '2022', 'FEM', 2, 'Forget to update.', 'PM of ACUs.', '2022-09-23', 0, 0, 1),
(2082, '34408522022-09-28PM of ACUs.Forget to update.', 344, ' 2022-09-27', '2022-09-28', '08:52 am', 'PM of ACUs', 'CG1805', 'daily', 'September', NULL, 'week 39', 0, NULL, '', '2022', 'FEM', 1, 'Forget to update.', 'PM of ACUs.', '2022-09-27', 0.5, 0, 1),
(2083, '34408522022-09-28PM of ACUs.Forget to update.', 344, ' 2022-09-28', '2022-09-28', '08:52 am', 'PM of ACUs', 'CG1805', 'daily', 'September', NULL, 'week 39', 0, NULL, '', '2022', 'FEM', 0, 'Forget to update.', 'PM of ACUs.', '2022-09-28', 1, 0, 1),
(2084, '33808522022-09-28Found 2 trouble at GPI 3 and GPI 5. Email result to GPI 5 to coordinate and endorse', 338, ' 2022-09-28', '2022-09-28', '08:52 am', 'Security Guard Checklist', 'GP-18-614', 'daily', 'September', NULL, 'week 39', 0, NULL, '', '2022', 'FEM', 0, '', 'Found 2 trouble at GPI 3 and GPI 5. Email result to GPI 5 to coordinate and endorse GPI 3 trouble to Ralph. Done', '2022-09-28', 1, 0, 0),
(2085, '33408522022-09-28Conduct cleaning of Air con filters.', 334, ' 2022-09-28', '2022-09-28', '08:52 am', 'Cleaning of Air con filters ', 'CG1805', 'daily', 'September', NULL, 'week 39', 0, NULL, '', '2022', 'FEM', 0, '', 'Conduct cleaning of Air con filters.', '2022-09-28', 1, 0, 0),
(2086, '32808532022-09-28Conducted cleaning of air con filters at Saitama, Q.A, Admin, D.O.K.', 328, ' 2022-09-28', '2022-09-28', '08:53 am', 'Cleaning of Air con filters ', 'CG1420', 'daily', 'September', NULL, 'week 39', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of air con filters at Saitama, Q.A, Admin, D.O.K.', '2022-09-28', 1, 0, 0),
(2087, '39408532022-09-28Conducted cleaning of air con filters at Saitama, Q.A, Admin, D.O.K.', 394, ' 2022-09-28', '2022-09-28', '08:53 am', 'Cleaning of Air con filters ', 'CG1420', 'daily', 'September', NULL, 'week 39', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of air con filters at Saitama, Q.A, Admin, D.O.K.', '2022-09-28', 1, 0, 0),
(2088, '33508532022-09-28Conduct cleaning of Exhaust fan.Forget to update.', 335, ' 2022-09-27', '2022-09-28', '08:53 am', 'Cleaning of exhaust Fan', 'CG1805', 'daily', 'September', NULL, 'week 39', 0, NULL, '', '2022', 'FEM', 1, 'Forget to update.', 'Conduct cleaning of Exhaust fan.', '2022-09-27', 0.5, 0, 1),
(2089, '33508532022-09-28Conduct cleaning of Exhaust fan.Forget to update.', 335, ' 2022-09-28', '2022-09-28', '08:53 am', 'Cleaning of exhaust Fan', 'CG1805', 'daily', 'September', NULL, 'week 39', 0, NULL, '', '2022', 'FEM', 0, 'Forget to update.', 'Conduct cleaning of Exhaust fan.', '2022-09-28', 1, 0, 0),
(2090, '49510062022-09-28Revised the letter and submit for signature to Ms. Gemma. ', 495, ' 2022-09-28', '2022-09-28', '10:06 am', 'Revise Letter of PTO application to PEZA', 'GP-18-614', 'annual', 'September', '2022-09-01', 'week 39', 0, NULL, '', '2022', 'FEM', 0, '', 'Revised the letter and submit for signature to Ms. Gemma. ', '2022-09-28', 1, 0, 0),
(2091, '49610092022-09-28Collect data of Admin OFI and Commendable Results. Break down all and update PDCA f', 496, ' 2022-09-28', '2022-09-28', '10:09 am', 'Update PDCA ', 'GP-18-614', 'monthly', 'September', '2022-09-01', 'week 39', 0, NULL, '', '2022', 'FEM', 0, '', 'Collect data of Admin OFI and Commendable Results. Break down all and update PDCA for Month of August. ', '2022-09-28', 1, 0, 0),
(2092, '32912062022-09-28Conducted cleaning exhaust fan ', 329, ' 2022-09-28', '2022-09-28', '12:06 pm', 'Cleaning of exhaust Fan', 'CG1420', 'daily', 'September', NULL, 'week 39', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning exhaust fan ', '2022-09-28', 1, 0, 0),
(2093, '34212062022-09-28Conducted PMS of aircon', 342, ' 2022-09-28', '2022-09-28', '12:06 pm', 'PMS of Aircon', 'CG1420', 'daily', 'September', NULL, 'week 39', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted PMS of aircon', '2022-09-28', 1, 0, 0),
(2094, '32512122022-09-28Conducted cleaning of air con filters ', 325, ' 2022-09-28', '2022-09-28', '12:12 pm', 'Cleaning of Air con filters ', 'CG0676', 'daily', 'September', NULL, 'week 39', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of air con filters ', '2022-09-28', 1, 0, 0),
(2095, '32612132022-09-28Conducted cleaning of exhaust fan', 326, ' 2022-09-28', '2022-09-28', '12:13 pm', 'Cleaning of exhaust Fan', 'CG0676', 'daily', 'September', NULL, 'week 39', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning of exhaust fan', '2022-09-28', 1, 0, 0),
(2096, '34112142022-09-28Conducted cleaning/PMS of aircon', 341, ' 2022-09-28', '2022-09-28', '12:14 pm', 'PMS of Aircon', 'CG0676', 'daily', 'September', NULL, 'week 39', 0, NULL, '', '2022', 'FEM', 0, '', 'Conducted cleaning/PMS of aircon', '2022-09-28', 1, 0, 0),
(2097, '49703242022-09-28Purchase item for FEM and checked item requested by GS.', 497, ' 2022-09-28', '2022-09-28', '03:24 pm', 'OB- Purchase of Consumable SM Bacoor', 'GP-18-614', 'annual', 'September', '2022-09-01', 'week 39', 0, NULL, '', '2022', 'FEM', 0, '', 'Purchase item for FEM and checked item requested by GS.', '2022-09-28', 1, 0, 0),
(2098, '49803252022-09-28Liquidated items and payment. Surrender change and return to Accounting. ', 498, ' 2022-09-28', '2022-09-28', '03:25 pm', 'Liquidate items purchased ', 'GP-18-614', 'annual', 'September', '2022-09-01', 'week 39', 0, NULL, '', '2022', 'FEM', 0, '', 'Liquidated items and payment. Surrender change and return to Accounting. ', '2022-09-28', 1, 0, 0),
(2099, '50303272022-09-28Visit PEZA and Process LOA release. Submit copy of contract. Done. ', 503, ' 2022-09-28', '2022-09-28', '03:27 pm', 'OB- To PEZA to collect LOA and Certificate', 'GP-18-614', 'annual', 'September', '2022-09-01', 'week 39', 0, NULL, '', '2022', 'FEM', 0, '', 'Visit PEZA and Process LOA release. Submit copy of contract. Done. ', '2022-09-28', 1, 0, 0),
(2100, '31103412022-09-28Did not conduct roving today due to we submit documents to Meralco sta. Rosa for re', 311, ' 2022-09-28', '2022-09-28', '03:41 pm', 'Roving', 'GP-22-718', 'daily', 'September', NULL, 'week 39', 0, NULL, '', '2022', 'FEM', 0, '', 'Did not conduct roving today due to we submit documents to Meralco sta. Rosa for re-contracted capacity application.', '2022-09-28', 1, 0, 0),
(2101, '38106402022-09-29ALREADY DONE ON SEPT, 19,2022', 381, ' 2022-09-29', '2022-09-29', '06:40 am', 'Genset Dry run', 'CG0676', 'daily', 'September', NULL, 'week 39', 0, NULL, '', '2022', 'FEM', 0, '', 'ALREADY DONE ON SEPT, 19,2022', '2022-09-29', 1, 0, 0);

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
(35, 'GP-17-516', 'GP-17-516', 'GP-17-516', 'PIC', 'Jonathan', '', 'Natuel', 'FEM'),
(48, 'CG1796', 'CG1796', 'CG1796', 'PIC', 'Erick John ', '', 'Frias', 'FEM'),
(49, 'CG1805', 'CG1805', 'CG1805', 'PIC', 'Felipe', '', 'Plojo Jr.', 'FEM'),
(50, 'CG1420', 'CG1420', 'CG1420', 'PIC', 'Jen Mark', '', 'Rondero', 'FEM'),
(51, 'CG0676', 'CG0676', 'CG0676', 'PIC', 'Edvir', '', 'Lumagui', 'FEM'),
(52, 'CG1732', 'CG1732', 'CG1732', 'PIC', 'John Spencer', '', 'Sandigan', 'MIS'),
(53, 'GP-10-273', 'GP-10-273', 'GP-10-273', 'Admin', 'Gemma', '', 'Calalo', 'Admin'),
(55, '11306', '11306', '11306', 'Admin', 'Nathan', 'M.', 'Nemedez', 'Admin'),
(56, 'cg1374', 'cg1374', 'cg1374', 'PIC', 'Aileen', '', 'Domo', 'MIS');

-- --------------------------------------------------------

--
-- Table structure for table `usertask`
--

CREATE TABLE `usertask` (
  `userid` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `taskName` varchar(100) NOT NULL,
  `taskCategory` varchar(50) NOT NULL,
  `taskArea` varchar(10) NOT NULL,
  `taskType` varchar(50) NOT NULL,
  `usertaskID` int(50) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `dateStarted` date DEFAULT NULL,
  `dateAdded` varchar(10) NOT NULL,
  `targetDate` date DEFAULT NULL,
  `ended` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertask`
--

INSERT INTO `usertask` (`userid`, `username`, `taskName`, `taskCategory`, `taskArea`, `taskType`, `usertaskID`, `Department`, `dateStarted`, `dateAdded`, `targetDate`, `ended`) VALUES
(24, 'GP-22-718', 'Roving', 'Routine Inspection', 'All', 'daily', 311, 'FEM', '2022-09-28', '2022-09-02', '2023-03-31', 0),
(24, 'GP-22-718', 'GPI 8 Warehouse Layout', 'Others', 'GPI 8', 'daily', 312, 'FEM', '2022-09-09', '2022-09-02', '2022-09-08', 1),
(24, 'GP-22-718', 'Preparation of Documents for PEZA Inspection GPI 6', 'Peza Compliance', 'GPI 6', 'daily', 313, 'FEM', '2022-09-05', '2022-09-05', '2022-09-05', 1),
(24, 'GP-22-718', 'GPI 6 PEZA Annual Inspection', 'Peza Compliance', 'GPI 6', 'annual', 314, 'FEM', '2022-09-19', '2022-09-16', '2022-09-16', 1),
(22, 'GP-22-729', 'Backup', 'Server', 'All', 'weekly', 320, 'MIS', '2022-09-12', '2022-09-02', '2022-09-30', 0),
(33, 'GP-22-730', 'Cleaning of Air con filters ', 'Routine Inspection', 'GPI 1', 'daily', 321, 'FEM', '2022-09-28', '2022-09-02', '2022-09-30', 0),
(33, 'GP-22-730', 'Cleaning of exhaust Fan', 'Routine Inspection', 'GPI 1', 'daily', 322, 'FEM', '2022-09-28', '2022-09-02', '2022-09-30', 0),
(33, 'GP-22-730', 'Checking of Transformer(Extruction of grass)', 'Routine Inspection', 'GPI 1', 'monthly', 324, 'FEM', '2022-09-06', '2022-09-02', '2022-09-30', 0),
(51, 'CG0676', 'Cleaning of Air con filters ', 'Routine Inspection', 'GPI 5', 'daily', 325, 'FEM', '2022-09-28', '2022-09-02', '2022-09-30', 0),
(51, 'CG0676', 'Cleaning of exhaust Fan', 'Routine Inspection', 'GPI 5', 'daily', 326, 'FEM', '2022-09-28', '2022-09-02', '2022-09-30', 0),
(51, 'CG0676', 'Checking of Transformer(Extruction of grass)', 'Routine Inspection', 'GPI 5', 'monthly', 327, 'FEM', '2022-09-06', '2022-09-02', '2022-09-30', 0),
(50, 'CG1420', 'Cleaning of Air con filters ', 'Routine Inspection', 'GPI 5', 'daily', 328, 'FEM', '2022-09-28', '2022-09-02', '2022-09-30', 0),
(50, 'CG1420', 'Cleaning of exhaust Fan', 'Routine Inspection', 'GPI 5', 'daily', 329, 'FEM', '2022-09-28', '2022-09-02', '2022-09-30', 0),
(50, 'CG1420', 'Checking of Transformer(Extruction of grass)', 'Routine Inspection', 'All', 'monthly', 330, 'FEM', '2022-09-06', '2022-09-02', '2022-09-30', 0),
(34, 'GP-11-301', 'Prepare Monthly Schedule', 'Others', 'GPI 8', 'monthly', 331, 'FEM', '2022-08-02', '2022-09-02', '2022-09-30', 0),
(34, 'GP-11-301', 'Updating Checksheet', 'Routine Inspection', 'GPI 8', 'daily', 332, 'FEM', '2022-09-01', '2022-09-02', '2022-09-30', 0),
(34, 'GP-11-301', 'roving', 'Routine Inspection', 'GPI 8', 'daily', 333, 'FEM', '2022-09-01', '2022-09-02', '2022-09-30', 0),
(49, 'CG1805', 'Cleaning of Air con filters ', 'Routine Inspection', 'GPI 1', 'daily', 334, 'FEM', '2022-09-28', '2022-09-02', '2022-09-30', 0),
(49, 'CG1805', 'Cleaning of exhaust Fan', 'Routine Inspection', 'GPI 1', 'daily', 335, 'FEM', '2022-09-28', '2022-09-02', '2022-09-30', 0),
(49, 'CG1805', 'Checking of Transformer(Extruction of grass)', 'Routine Inspection', 'GPI 1', 'monthly', 336, 'FEM', '2022-09-06', '2022-09-02', '2022-09-30', 0),
(32, 'GP-18-614', 'Create trouble report', 'Others', 'All', 'annual', 337, 'FEM', '2022-09-02', '2022-09-02', '2022-09-30', 0),
(32, 'GP-18-614', 'Security Guard Checklist', 'Routine Inspection', 'All', 'daily', 338, 'FEM', '2022-09-28', '2022-09-02', '2022-09-30', 0),
(32, 'GP-18-614', 'Checking of consumables', 'Others', 'All', 'monthly', 339, 'FEM', '2022-09-02', '2022-09-02', '2022-09-30', 0),
(32, 'GP-18-614', 'Create Minutes of Meeting', 'Others', 'All', 'annual', 340, 'FEM', '2022-09-02', '2022-09-02', '2022-09-30', 0),
(51, 'CG0676', 'PMS of Aircon', 'Routine Inspection', 'GPI 5', 'daily', 341, 'FEM', '2022-09-28', '2022-09-02', '2022-11-30', 0),
(50, 'CG1420', 'PMS of Aircon', 'Routine Inspection', 'GPI 5', 'daily', 342, 'FEM', '2022-09-28', '2022-09-02', '2022-09-30', 0),
(23, 'GP-17-571', 'CCTV Cheking', 'Others', 'All', 'daily', 343, 'MIS', '2022-09-06', '2022-09-02', '2022-09-30', 0),
(49, 'CG1805', 'PM of ACUs', 'Routine Inspection', 'GPI 1', 'daily', 344, 'FEM', '2022-09-28', '2022-09-02', '2022-09-30', 0),
(7, 'GP-22-722', 'Computer PMS', 'Computer', 'All', 'monthly', 345, 'MIS', '2022-09-12', '2022-09-05', '2022-09-30', 0),
(7, 'GP-22-722', 'Canteen Billing', 'Billing', 'All', 'weekly', 346, 'MIS', '2022-09-21', '2022-09-05', '2022-09-30', 0),
(7, 'GP-22-722', 'Coding Manpower System', 'Computer', 'All', 'daily', 347, 'MIS', '2022-09-23', '2022-09-05', '2022-09-30', 0),
(22, 'GP-22-729', 'Attending pending JO request', 'Job Order ', 'All', 'daily', 348, 'MIS', '2022-09-15', '2022-09-05', '2022-09-30', 0),
(23, 'GP-17-571', 'Attending pending JO request', 'Job Order ', 'All', 'daily', 349, 'MIS', '2022-09-06', '2022-09-05', '2022-09-30', 0),
(52, 'CG1732', 'Attending pending JO request', 'Job Order ', 'All', 'daily', 350, 'MIS', '2022-09-23', '2022-09-05', '2022-09-30', 0),
(22, 'GP-22-729', 'Checking of network and mail security', 'Network', 'All', 'daily', 351, 'MIS', '2022-09-15', '2022-09-05', '2022-09-30', 0),
(56, 'cg1374', 'Billing Fujifilm', 'Billing', 'All', 'monthly', 352, 'MIS', '2022-09-06', '2022-09-05', '2022-09-30', 0),
(56, 'cg1374', 'Billing Smart', 'Billing', 'All', 'monthly', 353, 'MIS', '2022-09-07', '2022-09-05', '2022-09-30', 0),
(56, 'cg1374', 'Canteen Billing', 'Billing', 'All', 'weekly', 354, 'MIS', '2022-09-19', '2022-09-05', '2022-09-30', 0),
(56, 'cg1374', 'Checking of pending JO', 'Job Order ', 'All', 'daily', 355, 'MIS', '2022-09-24', '2022-09-05', '2022-09-30', 0),
(56, 'cg1374', 'Billing Ricoh', 'Billing', 'All', 'monthly', 356, 'MIS', '2022-09-07', '2022-09-05', '2022-09-30', 0),
(56, 'cg1374', 'Billing PLDT', 'Billing', 'All', 'monthly', 357, 'MIS', '2022-09-06', '2022-09-05', '2022-09-30', 0),
(56, 'cg1374', 'Checking of consumable', 'Others', 'All', 'weekly', 358, 'MIS', '2022-09-19', '2022-09-05', '2022-09-30', 0),
(24, 'GP-22-718', 'Preparation of Documents for PEZA Inspection at GPI 8', 'Peza Compliance', 'GPI 8', 'daily', 359, 'FEM', '2022-09-06', '2022-09-05', '2022-09-06', 1),
(24, 'GP-22-718', 'PEZA Inspection for GPI 8 (Additional Injection Ma', 'Peza Compliance', 'GPI 8', 'annual', 360, 'FEM', '2022-09-07', '2022-09-07', '2022-09-07', 1),
(24, 'GP-22-718', 'Preparation for UTG Test for Air Receiver Tank ', 'Certification', 'GPI 7', 'daily', 361, 'FEM', '2022-09-10', '2022-09-05', '2022-09-10', 1),
(24, 'GP-22-718', 'Perform of UTG Test with Certificate of PME', 'Certification', 'GPI 7', 'annual', 362, 'FEM', '2021-09-30', '2022-09-30', '2022-09-30', 0),
(33, 'GP-22-730', 'PMS of ACUs', 'Routine Inspection', 'GPI 1', 'daily', 364, 'FEM', '2022-09-28', '2022-09-05', '2022-09-30', 0),
(33, 'GP-22-730', 'Genset Dry run', 'Routine Inspection', 'GPI 1', 'daily', 366, 'FEM', '2022-09-28', '2022-09-05', '2022-09-30', 0),
(33, 'GP-22-730', 'Checking of Sheet Shutter', 'Routine Inspection', 'GPI 1', 'monthly', 367, 'FEM', '2022-09-06', '2022-09-05', '2022-09-30', 0),
(49, 'CG1805', ' PMs of Air con', 'Routine Inspection', 'GPI 1', 'daily', 370, 'FEM', '2022-09-28', '2022-09-05', '2022-09-30', 0),
(49, 'CG1805', 'Genset Dry run', 'Routine Inspection', 'GPI 1', 'daily', 371, 'FEM', '2022-09-28', '2022-09-05', '2022-09-30', 0),
(49, 'CG1805', 'Checking of Sheet Shutter', 'Routine Inspection', 'GPI 1', 'monthly', 372, 'FEM', '2022-09-06', '2022-09-05', '2022-09-30', 0),
(50, 'CG1420', 'Genset Dry run', 'Routine Inspection', 'GPI 5', 'daily', 376, 'FEM', '2022-09-28', '2022-09-05', '2022-09-30', 0),
(50, 'CG1420', 'Checking of Sheet Shutter', 'Routine Inspection', 'GPI 5', 'monthly', 377, 'FEM', '2022-09-06', '2022-09-05', '2022-09-30', 0),
(51, 'CG0676', 'Genset Dry run', 'Routine Inspection', 'GPI 5', 'daily', 381, 'FEM', '2022-09-29', '2022-09-05', '2022-09-30', 0),
(51, 'CG0676', 'Checking of Sheet Shutter', 'Routine Inspection', 'GPI 5', 'monthly', 382, 'FEM', '2022-09-06', '2022-09-05', '2022-09-30', 0),
(24, 'GP-22-718', 'Pill up of ECM', 'Others', 'All', 'monthly', 383, 'FEM', '2022-09-05', '2022-09-05', '2023-03-09', 0),
(33, 'GP-22-730', 'Checking of Hoist Crane', 'Routine Inspection', 'GPI 1', 'monthly', 387, 'FEM', '2022-09-07', '2022-09-06', '2022-09-30', 0),
(33, 'GP-22-730', 'Checking of Frequency Converter', 'Routine Inspection', 'GPI 1', 'monthly', 388, 'FEM', '2022-09-07', '2022-09-06', '2022-09-30', 0),
(49, 'CG1805', 'Checking of Hoist Crane', 'Routine Inspection', 'GPI 1', 'monthly', 392, 'FEM', '2022-09-07', '2022-09-06', '2022-09-30', 0),
(49, 'CG1805', 'Checking of Frequency Converter', 'Routine Inspection', 'GPI 1', 'monthly', 393, 'FEM', '2022-09-07', '2022-09-06', '2022-09-30', 0),
(50, 'CG1420', 'Cleaning of Air con filters ', 'Routine Inspection', 'GPI 5', 'daily', 394, 'FEM', '2022-09-28', '2022-09-06', '2022-09-30', 0),
(32, 'GP-18-614', 'Prepare COA', 'Others', 'All', 'annual', 401, 'FEM', '2022-09-07', '2022-09-06', '2022-09-30', 0),
(32, 'GP-18-614', 'Prepare PRS', 'Others', 'All', 'annual', 402, 'FEM', '2022-09-07', '2022-09-06', '2022-09-30', 0),
(32, 'GP-18-614', 'Contact Service Provider', 'Others', 'All', 'annual', 403, 'FEM', '2022-09-07', '2022-09-06', '2022-09-30', 0),
(32, 'GP-18-614', 'Finalize letter for PEZA', 'Others', 'All', 'annual', 404, 'FEM', '2022-09-07', '2022-09-06', '2022-09-30', 0),
(32, 'GP-18-614', 'Contact PEZA for Schedule of Inpection', 'Others', 'All', 'annual', 405, 'FEM', '2022-09-07', '2022-09-06', '2022-09-30', 0),
(32, 'GP-18-614', 'Prepare attachement for awareness of Subcon', 'Others', 'All', 'annual', 406, 'FEM', '2022-09-07', '2022-09-06', '2022-09-30', 0),
(32, 'GP-18-614', 'Check and Balance of Stocks system', 'Others', 'All', 'annual', 407, 'FEM', '2022-09-07', '2022-09-06', '2022-09-30', 0),
(32, 'GP-18-614', 'Prepare of Documents for PRS', 'Others', 'All', 'annual', 408, 'FEM', '2022-09-07', '2022-09-06', '2022-09-30', 0),
(33, 'GP-22-730', 'Painting of IDs', 'Routine Inspection', 'GPI 1', 'daily', 418, 'FEM', '2022-09-08', '2022-09-07', '2022-09-08', 1),
(49, 'CG1805', 'Painting of IDs', 'Routine Inspection', 'GPI 1', 'daily', 422, 'FEM', '2022-09-08', '2022-09-07', '2022-09-08', 1),
(33, 'GP-22-730', 'repair of exit door', 'Others', 'GPI 1', 'annual', 423, 'FEM', '2022-09-07', '2022-09-06', '2022-09-30', 0),
(33, 'GP-22-730', 'Repair the Mop Squeezer of FEM', 'Others', 'GPI 1', 'annual', 424, 'FEM', '2022-09-08', '2022-09-07', '2022-09-30', 0),
(32, 'GP-18-614', 'Preparation of G-DMS / IMS documents for aware (Morning meeting)', 'Others', 'GPI 1', 'annual', 425, 'FEM', '2022-09-08', '2022-09-07', '2022-09-30', 0),
(32, 'GP-18-614', 'Prepare and submit consumables report to Admin Supplies', 'Others', 'GPI 1', 'annual', 426, 'FEM', '2022-09-08', '2022-09-07', '2022-09-30', 0),
(32, 'GP-18-614', 'Disseminate COA to all Admin Members and Subcontractors', 'Others', 'GPI 1', 'annual', 427, 'FEM', '2022-09-08', '2022-09-07', '2022-09-30', 0),
(32, 'GP-18-614', 'Encode new batch of awareness in COA Form', 'Others', 'GPI 1', 'annual', 428, 'FEM', '2022-09-08', '2022-09-07', '2022-09-30', 0),
(32, 'GP-18-614', 'Contact Negative Zero to negotiate discount on ACU8', 'Others', 'GPI 1', 'annual', 429, 'FEM', '2022-09-08', '2022-09-07', '2022-09-30', 0),
(32, 'GP-18-614', 'Re-PRS and re-encode revised quotation', 'Others', 'GPI 1', 'annual', 430, 'FEM', '2022-09-08', '2022-09-07', '2022-09-30', 0),
(32, 'GP-18-614', 'Export Service report and quotation of ACUs to Aircon cost folde as reference for expenses', 'Others', 'GPI 1', 'annual', 431, 'FEM', '2022-09-08', '2022-09-07', '2022-09-30', 0),
(33, 'GP-22-730', 'Cleaning of Filters', 'Routine Inspection', 'GPI 1', 'daily', 434, 'FEM', '2022-09-13', '2022-09-08', '2022-09-13', 1),
(33, 'GP-22-730', 'Inspection of Building Maintenance', 'Routine Inspection', 'All', 'monthly', 435, 'FEM', '2022-09-08', '2022-09-08', '2022-09-08', 1),
(33, 'GP-22-730', 'Disposal of hazardous waste', 'Routine Inspection', 'All', 'monthly', 436, 'FEM', '2022-09-08', '2022-09-08', '2022-09-08', 1),
(33, 'GP-22-730', 'Perform Job order request', 'Others', 'GPI 1', 'annual', 437, 'FEM', '2022-09-08', '2022-09-08', '2022-09-30', 0),
(49, 'CG1805', 'PM of ACUs', 'Routine Inspection', 'GPI 1', 'daily', 438, 'FEM', '2022-09-08', '2022-09-08', '2022-09-08', 1),
(49, 'CG1805', 'DISPOSAL OF HAZARDOUS WASTE', 'Routine Inspection', 'All', 'monthly', 441, 'FEM', '2022-09-08', '2022-09-08', '2022-09-08', 1),
(49, 'CG1805', 'PERFORM JOB ORDER', 'Routine Inspection', 'GPI 1', 'annual', 442, 'FEM', '2022-09-08', '2022-09-08', '2022-09-30', 0),
(49, 'CG1805', 'Building Inspection', 'Building Facilities Inspection', 'All', 'monthly', 443, 'FEM', '2022-09-08', '2022-09-08', '2022-09-08', 1),
(50, 'CG1420', 'replacement of busted light', 'Others', 'GPI 5', 'annual', 446, 'FEM', '2022-09-09', '2022-09-08', '2022-09-30', 0),
(50, 'CG1420', 'Perform JOB ORDER', 'Others', 'GPI 5', 'annual', 447, 'FEM', '2022-09-09', '2022-09-08', '2022-09-08', 1),
(51, 'CG0676', 'PM of ACUs', 'Routine Inspection', 'GPI 5', 'daily', 448, 'FEM', '2022-09-09', '2022-09-08', '2022-09-09', 1),
(51, 'CG0676', 'perform job order request', 'Job Order ', 'GPI 5', 'annual', 450, 'FEM', '2022-09-09', '2022-09-08', '0000-00-00', 1),
(51, 'CG0676', 'replacement of busted  18 watts light', 'Routine Inspection', 'GPI 5', 'annual', 451, 'FEM', '2022-09-09', '2022-09-08', '2022-09-30', 0),
(50, 'CG1420', 'Cleaning of filter of Aircompressor', 'Routine Inspection', 'GPI 5', 'daily', 454, 'FEM', '2022-09-09', '2022-09-09', '2022-09-09', 1),
(51, 'CG0676', 'Disposal of waste', 'Routine Inspection', 'GPI 5', 'daily', 459, 'FEM', '2022-09-09', '2022-09-09', '2022-09-09', 1),
(51, 'CG0676', 'Checking of Aircon at Canteen ', 'Others', 'GPI 5', 'annual', 461, 'FEM', '2022-09-09', '2022-09-09', '2022-09-30', 0),
(50, 'CG1420', 'Checking of Aircon at Canteen', 'Others', 'GPI 5', 'annual', 462, 'FEM', '2022-09-09', '2022-09-09', '2022-09-30', 0),
(50, 'CG1420', 'Disposal of Waste', 'Others', 'GPI 5', 'monthly', 463, 'FEM', '2022-09-09', '2022-09-09', '2022-09-30', 0),
(33, 'GP-22-730', 'Checking of ACU at Conference  room 4', 'Others', 'GPI 1', 'annual', 467, 'FEM', '2021-09-09', '2022-09-09', '2022-09-30', 0),
(49, 'CG1805', 'Checking of ACU s at Conference Room 4', 'Others', 'GPI 1', 'annual', 471, 'FEM', '2022-09-13', '2022-09-09', '2022-09-30', 0),
(24, 'GP-22-718', 'Electric Billing Reduction', 'Billing', 'GPI 8', 'annual', 472, 'FEM', '2021-09-12', '2022-09-12', '2022-09-30', 0),
(24, 'GP-22-718', 'Additional Aircon Proposal', 'Others', 'GPI 5', 'annual', 473, 'FEM', '2022-09-12', '2022-09-12', '2022-10-28', 0),
(31, 'GP-12-356', 'heck /Veriffy member task', 'Others', 'All', 'daily', 474, 'FEM', '2022-09-12', '2022-09-13', '2022-09-30', 0),
(28, 'GP-16-478', 'Roving identify mechanical and electrical  issue', 'Others', 'All', 'daily', 475, 'FEM', '2022-09-12', '2022-09-13', '2022-09-30', 0),
(34, 'GP-11-301', 'Check and verify members activity', 'Others', 'All', 'daily', 476, 'FEM', '2022-09-12', '2022-09-13', '2022-09-30', 0),
(32, 'GP-18-614', 'Sort all engineering forms and categorize ', 'Others', 'All', 'annual', 477, 'FEM', '2022-09-21', '2022-09-14', '2022-09-30', 0),
(56, 'cg1374', 'Billing Eastern', 'Billing', 'All', 'monthly', 478, 'MIS', '2022-09-15', '2022-09-15', '2023-03-31', 0),
(32, 'GP-18-614', 'Coordinate to Ichikawa the PEZA inspection for rent renewal', 'Building Facilities Inspection', 'GPI 4', 'annual', 479, 'FEM', '2022-09-16', '2022-09-16', '2022-09-16', 1),
(32, 'GP-18-614', 'Create label and tagging for Engineering Archfiles of documents', 'Others', 'All', 'annual', 480, 'FEM', '2022-09-27', '2022-09-16', '2022-09-21', 1),
(32, 'GP-18-614', 'Construct FEM Month  End Reports', 'Others', 'All', 'monthly', 481, 'FEM', '2022-08-29', '2022-09-29', '2022-09-30', 0),
(32, 'GP-18-614', 'Inventory of Consumables', 'Storage', 'All', 'monthly', 482, 'FEM', '2022-08-27', '2022-09-27', '2022-09-28', 0),
(32, 'GP-18-614', 'Participate in Training', 'Others', 'GPI 1', 'annual', 483, 'FEM', '2022-09-27', '2022-09-16', '2022-09-26', 1),
(32, 'GP-18-614', 'Monthly RMC Inspection', 'Routine Inspection', 'GPI 1', 'monthly', 484, 'FEM', '2022-09-19', '2022-09-12', '2022-09-16', 1),
(32, 'GP-18-614', 'Contact Supplier to confirm updated price ', 'Others', 'All', 'annual', 485, 'FEM', '2022-09-19', '2022-09-16', '2022-09-16', 1),
(24, 'GP-22-718', 'Assist PEZA inspection at  ICHIKAWA for LOA application', 'Peza Compliance', 'GPI 4', 'annual', 486, 'FEM', '2022-09-16', '2022-09-16', '2022-09-16', 1),
(32, 'GP-18-614', 'Create Report of RMC Inspection Result', 'Others', 'GPI 1', 'monthly', 487, 'FEM', '2022-09-19', '2022-09-16', '2022-09-16', 1),
(24, 'GP-22-718', 'Submit formal letter of request to meralco for temporary power shutdown', 'Others', 'GPI 9', 'daily', 488, 'FEM', '2022-09-21', '2022-09-21', '2022-09-21', 1),
(32, 'GP-18-614', 'Process LOA and certification payment ', 'Certification', 'GPI 4', 'annual', 489, 'FEM', '2022-09-22', '2022-09-21', '2022-09-21', 1),
(32, 'GP-18-614', 'Contact Supplier to outsource parts', 'Others', 'All', 'annual', 490, 'FEM', '2022-09-22', '2022-09-21', '2022-09-21', 1),
(32, 'GP-18-614', 'Create signage for sheet shutter at GPI 8', 'Others', 'GPI 8', 'annual', 491, 'FEM', '2022-09-22', '2022-09-21', '2022-09-21', 1),
(32, 'GP-18-614', 'Request quotation of materials for gate 3 parking', 'Others', 'GPI 1', 'annual', 492, 'FEM', '2022-09-22', '2022-09-21', '2022-09-21', 1),
(32, 'GP-18-614', 'Email COA Awareness notification to all Admin Members', 'Others', 'All', 'annual', 493, 'FEM', '2022-09-22', '2022-09-21', '2022-09-21', 1),
(24, 'GP-22-718', 'process the request of temporary power shutdown for GPI 9 ', 'Others', 'GPI 9', 'monthly', 494, 'FEM', '2022-08-22', '2022-09-22', '2022-10-01', 0),
(32, 'GP-18-614', 'Revise Letter of PTO application to PEZA', 'Peza Compliance', 'All', 'annual', 495, 'FEM', '2022-09-28', '2022-09-28', '2022-09-28', 1),
(32, 'GP-18-614', 'Update PDCA ', 'Others', 'All', 'monthly', 496, 'FEM', '2022-09-28', '2022-09-20', '2022-09-28', 1),
(32, 'GP-18-614', 'OB- Purchase of Consumable SM Bacoor', 'Others', 'All', 'annual', 497, 'FEM', '2022-09-28', '2022-09-28', '2022-09-30', 0),
(32, 'GP-18-614', 'Liquidate items purchased ', 'Others', 'All', 'annual', 498, 'FEM', '2022-09-28', '2022-09-28', '2022-09-30', 0),
(32, 'GP-18-614', 'Construct Management Review Minutes of Meeting for Apr- August Result', 'Others', 'All', 'annual', 499, 'FEM', '2021-09-28', '2022-09-28', '2022-10-07', 0),
(32, 'GP-18-614', 'Collect all for awareness and encode to COA', 'Others', 'All', 'annual', 500, 'FEM', '2021-09-28', '2022-09-28', '2022-09-29', 0),
(32, 'GP-18-614', 'Contact Ms. Rose Caballo of PEZA to inquire condition concern on LOA of Ichikawa Lease', 'Others', 'All', 'annual', 501, 'FEM', '2021-09-28', '2022-09-28', '2022-10-07', 0),
(32, 'GP-18-614', 'Email IMS Awareness to all ADMIN Members', 'Others', 'All', 'annual', 502, 'FEM', '2021-09-28', '2022-09-28', '2022-09-29', 0),
(32, 'GP-18-614', 'OB- To PEZA to collect LOA and Certificate', 'Others', 'All', 'annual', 503, 'FEM', '2022-09-28', '2022-09-28', '2022-09-28', 1);

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
  MODIFY `adminid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `finishedtask`
--
ALTER TABLE `finishedtask`
  MODIFY `FinishedTaskID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2102;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `holidayId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `usertask`
--
ALTER TABLE `usertask`
  MODIFY `usertaskID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=504;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
