-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2020 at 02:06 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_srms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin@diu', 'bcc432c48f5cbf56a152584a32c80b25', '2018-11-30 06:32:04');

-- --------------------------------------------------------

--
-- Table structure for table `tblbatch`
--

CREATE TABLE `tblbatch` (
  `id` int(11) NOT NULL,
  `batchname` varchar(80) DEFAULT NULL,
  `department` varchar(5) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbatch`
--

INSERT INTO `tblbatch` (`id`, `batchname`, `department`, `CreationDate`, `UpdationDate`) VALUES
(2, 'E-60', 'CSE', '2018-11-30 17:52:11', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblresult`
--

CREATE TABLE `tblresult` (
  `id` int(11) NOT NULL,
  `StudentId` int(11) DEFAULT NULL,
  `BatchId` int(11) DEFAULT NULL,
  `DepartmentId` int(11) DEFAULT NULL,
  `SemesterId` int(11) DEFAULT NULL,
  `SubjectId` int(11) DEFAULT NULL,
  `marks` int(11) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblresult`
--

INSERT INTO `tblresult` (`id`, `StudentId`, `BatchId`, `DepartmentId`, `SemesterId`, `SubjectId`, `marks`, `PostingDate`, `UpdationDate`) VALUES
(24, 13, 2, 2, 2, 10, 80, '2018-11-30 17:56:22', NULL),
(25, 13, 2, 2, 2, 12, 85, '2018-11-30 17:56:22', NULL),
(26, 13, 2, 2, 2, 13, 88, '2018-11-30 17:56:22', NULL),
(27, 13, 2, 2, 2, 11, 75, '2018-11-30 17:56:22', NULL),
(28, 14, 2, 2, 2, 10, 90, '2018-12-01 05:59:05', NULL),
(29, 14, 2, 2, 2, 12, 95, '2018-12-01 05:59:05', NULL),
(30, 14, 2, 2, 2, 13, 75, '2018-12-01 05:59:05', NULL),
(31, 14, 2, 2, 2, 11, 70, '2018-12-01 05:59:05', NULL),
(32, 15, 2, 2, 2, 10, 90, '2018-12-01 16:22:17', NULL),
(33, 15, 2, 2, 2, 12, 80, '2018-12-01 16:22:17', NULL),
(34, 15, 2, 2, 2, 13, 90, '2018-12-01 16:22:17', NULL),
(35, 15, 2, 2, 2, 11, 90, '2018-12-01 16:22:17', NULL),
(36, 16, 2, 2, 2, 10, 50, '2018-12-02 07:49:11', NULL),
(37, 16, 2, 2, 2, 12, 62, '2018-12-02 07:49:11', NULL),
(38, 16, 2, 2, 2, 13, 77, '2018-12-02 07:49:11', NULL),
(39, 16, 2, 2, 2, 11, 58, '2018-12-02 07:49:11', NULL),
(40, 17, 2, 2, 2, 10, 60, '2018-12-02 07:58:53', NULL),
(41, 17, 2, 2, 2, 12, 44, '2018-12-02 07:58:53', NULL),
(42, 17, 2, 2, 2, 13, 42, '2018-12-02 07:58:53', NULL),
(43, 17, 2, 2, 2, 11, 55, '2018-12-02 07:58:53', NULL),
(44, 18, 2, 2, 2, 10, 50, '2018-12-02 08:05:25', NULL),
(45, 18, 2, 2, 2, 12, 55, '2018-12-02 08:05:25', NULL),
(46, 18, 2, 2, 2, 13, 56, '2018-12-02 08:05:25', NULL),
(47, 18, 2, 2, 2, 11, 70, '2018-12-02 08:05:25', NULL),
(48, 19, 2, 2, 2, 10, 56, '2018-12-02 08:09:19', NULL),
(49, 19, 2, 2, 2, 12, 44, '2018-12-02 08:09:19', NULL),
(50, 19, 2, 2, 2, 13, 55, '2018-12-02 08:09:19', NULL),
(51, 19, 2, 2, 2, 11, 33, '2018-12-02 08:09:19', NULL),
(52, 19, 2, 2, 2, 10, 56, '2018-12-02 08:11:14', NULL),
(53, 19, 2, 2, 2, 12, 44, '2018-12-02 08:11:14', NULL),
(54, 19, 2, 2, 2, 13, 55, '2018-12-02 08:11:14', NULL),
(55, 19, 2, 2, 2, 11, 33, '2018-12-02 08:11:14', NULL),
(56, 19, 2, 2, 2, 10, 56, '2018-12-02 08:21:37', NULL),
(57, 19, 2, 2, 2, 12, 44, '2018-12-02 08:21:37', NULL),
(58, 19, 2, 2, 2, 13, 55, '2018-12-02 08:21:37', NULL),
(59, 19, 2, 2, 2, 11, 33, '2018-12-02 08:21:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblsemester`
--

CREATE TABLE `tblsemester` (
  `id` int(11) NOT NULL,
  `semester` varchar(80) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsemester`
--

INSERT INTO `tblsemester` (`id`, `semester`, `CreationDate`, `UpdationDate`) VALUES
(2, '7th', '2018-11-30 17:52:21', '0000-00-00 00:00:00'),
(3, '8th', '2018-12-01 16:18:55', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudents`
--

CREATE TABLE `tblstudents` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `registration` varchar(100) NOT NULL,
  `roll` varchar(100) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` int(11) NOT NULL,
  `batchId` varchar(30) NOT NULL,
  `departmentId` varchar(30) NOT NULL,
  `semesterId` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudents`
--

INSERT INTO `tblstudents` (`id`, `name`, `registration`, `roll`, `mobile`, `email`, `gender`, `batchId`, `departmentId`, `semesterId`, `dob`, `RegDate`, `UpdationDate`) VALUES
(13, 'Md. Shakil Hossain', 'CSE-104502', '48', '0173862024', 'sakilahmad776@yahoo.com', 0, '2', '2', '2', '1994-03-01', '2018-11-30 17:55:36', '2018-11-30 17:55:36'),
(14, 'Mehedy Hasan', 'CSE-253614', '46', '0175256325', 'mehedY@gmail.com', 0, '2', '2', '2', '1994-05-12', '2018-12-01 05:58:29', '2018-12-01 05:58:29'),
(15, 'Mahmudul Hasan shimul', '104421', '42', '0123456789', 'simple@gmial.com', 0, '2', '2', '2', '1995-03-03', '2018-12-01 16:21:18', '2018-12-01 16:21:18'),
(16, 'Mahmudul Hasan', '104475', '47', '1346545641', 'simple@gmail.com', 0, '2', '2', '2', '1999-12-13', '2018-12-02 07:48:31', '2018-12-02 07:48:31'),
(18, 'Ariful Islam', '10233', '40', '5435435643', 'simple@gmail.com', 0, '2', '2', '2', '1995-12-13', '2018-12-02 08:05:08', '2018-12-02 08:05:08'),
(19, 'Mitu', '10243', '41', '0984509409', 'simple@gmail.com', 1, '2', '2', '2', '1997-12-13', '2018-12-02 08:08:58', '2018-12-02 08:08:58');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjectcombination`
--

CREATE TABLE `tblsubjectcombination` (
  `id` int(11) NOT NULL,
  `BatchId` int(11) NOT NULL,
  `SemesterId` int(11) NOT NULL,
  `SubjectId` int(11) NOT NULL,
  `status` int(1) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updationdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubjectcombination`
--

INSERT INTO `tblsubjectcombination` (`id`, `BatchId`, `SemesterId`, `SubjectId`, `status`, `CreationDate`, `Updationdate`) VALUES
(10, 2, 2, 10, 1, '2018-11-30 17:53:55', '2018-11-30 17:53:55'),
(11, 2, 2, 11, 1, '2018-11-30 17:54:04', '2018-11-30 17:54:04'),
(12, 2, 2, 12, 1, '2018-11-30 17:54:11', '2018-11-30 17:54:11'),
(13, 2, 2, 13, 1, '2018-11-30 17:54:20', '2018-11-30 17:54:20'),
(14, 2, 2, 14, 1, '2018-12-02 07:50:36', '2018-12-02 07:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjects`
--

CREATE TABLE `tblsubjects` (
  `id` int(11) NOT NULL,
  `SubjectName` varchar(100) NOT NULL,
  `SubjectCode` varchar(100) NOT NULL,
  `Creationdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubjects`
--

INSERT INTO `tblsubjects` (`id`, `SubjectName`, `SubjectCode`, `Creationdate`, `UpdationDate`) VALUES
(10, 'Algorithm Design', 'CSE-301', '2018-11-30 17:53:12', '0000-00-00 00:00:00'),
(11, 'Numerical Analysis', 'CSE-303', '2018-11-30 17:53:17', '0000-00-00 00:00:00'),
(12, 'Data Telecommunication', 'EEE-301', '2018-11-30 17:53:23', '0000-00-00 00:00:00'),
(13, 'Law & Ethics in Engineering Practice', 'GED-301', '2018-11-30 17:53:32', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbatch`
--
ALTER TABLE `tblbatch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblresult`
--
ALTER TABLE `tblresult`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsemester`
--
ALTER TABLE `tblsemester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstudents`
--
ALTER TABLE `tblstudents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubjectcombination`
--
ALTER TABLE `tblsubjectcombination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbatch`
--
ALTER TABLE `tblbatch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblresult`
--
ALTER TABLE `tblresult`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tblsemester`
--
ALTER TABLE `tblsemester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblstudents`
--
ALTER TABLE `tblstudents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tblsubjectcombination`
--
ALTER TABLE `tblsubjectcombination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
