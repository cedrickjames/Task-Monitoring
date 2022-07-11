-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220629.14f90d77f8
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2022 at 01:55 AM
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
(12, 'Peza Compliance'),
(15, 'a'),
(16, 'sasas');

-- --------------------------------------------------------

--
-- Table structure for table `finishedtask`
--

CREATE TABLE `finishedtask` (
  `FinishedTaskID` int(50) NOT NULL,
  `taskID` int(50) NOT NULL,
  `Date` varchar(50) NOT NULL,
  `timestamp` varchar(50) NOT NULL,
  `task_Name` varchar(50) NOT NULL,
  `in_charge` varchar(50) NOT NULL,
  `sched_Type` varchar(50) NOT NULL,
  `month` varchar(50) NOT NULL,
  `week` varchar(50) NOT NULL,
  `attachments` varchar(100) NOT NULL,
  `year` varchar(10) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `noOfDaysLate` int(10) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `realDate` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `finishedtask`
--

INSERT INTO `finishedtask` (`FinishedTaskID`, `taskID`, `Date`, `timestamp`, `task_Name`, `in_charge`, `sched_Type`, `month`, `week`, `attachments`, `year`, `Department`, `noOfDaysLate`, `reason`, `realDate`) VALUES
(518, 54, ' July 1, 2022', '07:32 am', 'Canteen Billing', 'cedrick', 'daily', 'July', 'week 2', '', '2022', 'MIS', 2, '', '2022-07-01'),
(519, 191, ' July 2, 2022', '09:54 am', 'Task Sample', 'cedrick', 'daily', 'July', 'week 2', '', '2022', 'MIS', 10, 'asdas', '2022-07-02'),
(520, 192, ' July 3, 2022', '09:54 am', 'Formatting computer', 'cedrick', 'daily', 'July', 'week 2', '', '2022', 'MIS', 7, 'asdasd', '2022-07-03'),
(535, 192, ' July 8, 2022', '01:14 pm', 'Formatting computer', 'cedrick', 'daily', 'July', 'week 2', '', '2022', 'MIS', 0, '', '2022-07-08'),
(542, 30, ' July 8, 2022', '02:06 pm', 'Storage  16TB- Primary Back up (server room)', 'cedrick', 'weekly', 'July', 'week 2', '', '2022', 'MIS', 0, '', '2022-07-08'),
(546, 34, ' June 27, 2022', '02:16 pm', 'DMS- Server (backup and functionality)', 'cedrick', 'weekly', 'June', 'week 5', '', '2022', 'MIS', 4, '', '2022-06-27'),
(547, 34, ' July 8, 2022', '02:25 pm', 'DMS- Server (backup and functionality)', 'cedrick', 'weekly', 'July', 'week 2', '', '2022', 'MIS', 0, '', '2022-07-08'),
(548, 191, ' July 8, 2022', '02:34 pm', 'Task Sample', 'cedrick', 'daily', 'July', 'week 2', '', '2022', 'MIS', 0, '', '2022-07-08'),
(565, 191, ' July 11, 2022', '11:09 am', 'Task Sample', 'cedrick', 'daily', 'July', 'week 3', '', '2022', 'MIS', 2, 'wala lang ulit', '2022-07-11'),
(570, 54, ' July 11, 2022', '02:14 pm', 'Canteen Billing', 'cedrick', 'daily', 'July', 'week 3', '', '2022', 'MIS', -1, '', '2022-07-11'),
(571, 35, ' July 11, 2022', '02:25 pm', 'Monthly Billing (Eastern,PLDT,Smart,Fuji,Ricoh)', 'cedrick', 'monthly', 'July', 'week 3', '', '2022', 'MIS', 4, 'hehehehe', '2022-07-11'),
(572, 192, ' July 11, 2022', '02:25 pm', 'Formatting computer', 'cedrick', 'daily', 'July', 'week 3', '', '2022', 'MIS', 0, '', '2022-07-11');

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
(27, 'juan', 'juan', 'juan', 'PIC', 'Juan', '', 'Dela Cruz', 'FEM'),
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
(7, 'cedrick', 'Storage  16TB- Primary Back up (server room)', 'Storage', '', 'weekly', 30, 'MIS', 'July 6, 2022'),
(0, ' kevin ', 'VM- Production System', 'VM', '', 'weekly', 31, 'MIS', ''),
(22, 'kevin', 'GPSS- Server (backup and functionality)', 'Server', 'All', 'weekly', 33, 'MIS', ''),
(7, 'cedrick', 'DMS- Server (backup and functionality)', 'Server', '', 'weekly', 34, 'MIS', 'July 8, 2022'),
(7, 'cedrick', 'Monthly Billing (Eastern,PLDT,Smart,Fuji,Ricoh)', 'Others', 'All', 'monthly', 35, 'MIS', 'July 11, 2022'),
(23, 'felmhar', 'Monthly Report (network,server,pms,pc,disposal)', 'Others', 'GPI 1', 'monthly', 36, 'MIS', ''),
(7, 'cedrick', 'VM MIS System', 'VM', '', 'weekly', 53, 'MIS', 'July 11, 2022'),
(7, 'cedrick', 'Canteen Billing', 'Others', 'All', 'daily', 54, 'MIS', 'July 11, 2022'),
(22, 'kevin', 'Core Switch (Cisco 1941)x2', 'Server', 'All', 'monthly', 55, 'MIS', ''),
(22, 'kevin', 'Firewall Fortigage 200D', 'Network', 'All', 'weekly', 56, 'MIS', ''),
(22, 'kevin', 'WLAN Controller (AIR-CT2504)', 'Network', 'All', 'weekly', 58, 'MIS', ''),
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
(22, 'kevin', 'MDM Security (report and subscription)', 'Others', '', 'weekly', 70, 'MIS', ''),
(22, 'kevin', 'Email Server (monitoring and subscription)', 'Others', '', 'weekly', 71, 'MIS', ''),
(22, 'kevin', 'Core Switch GPI8', 'Others', '', 'monthly', 72, 'MIS', ''),
(22, 'kevin', 'Firewall GPI8', 'Others', '', 'monthly', 73, 'MIS', ''),
(22, 'kevin', 'Layer 2 Switch GPI8', 'Storage', 'All', 'monthly', 74, 'MIS', ''),
(22, 'kevin', 'Access Point GPI8', 'Others', 'GPI 8', 'weekly', 75, 'MIS', ''),
(23, 'felmhar', 'Access Point', 'Network', 'All', 'weekly', 76, 'MIS', ''),
(23, 'felmhar', 'IDF Switches ', 'Network', 'All', 'monthly', 77, 'MIS', ''),
(23, 'felmhar', 'Storage  - Secondary  Backup (offsite)', 'Storage', '', 'weekly', 78, 'MIS', ''),
(23, 'felmhar', 'CCTV- Recording and functionality', 'Others', '', 'weekly', 79, 'MIS', ''),
(23, 'felmhar', 'PABX  (GPI-1,5,7)', 'Others', '', 'monthly', 80, 'MIS', ''),
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
(7, 'cedrick', 'Task Sample', 'Server', 'GPI 1', 'daily', 191, 'MIS', 'July 11, 2022'),
(7, 'cedrick', 'Formatting computer', 'Others', 'GPI 1', 'daily', 192, 'MIS', 'July 11, 2022');

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
  MODIFY `FinishedTaskID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=573;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `usertask`
--
ALTER TABLE `usertask`
  MODIFY `usertaskID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



