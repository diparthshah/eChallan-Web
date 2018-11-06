-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2018 at 04:26 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wdl`
--

-- --------------------------------------------------------

--
-- Table structure for table `challan`
--

CREATE TABLE `challan` (
  `challanid` varchar(20) NOT NULL,
  `officerid` varchar(20) DEFAULT NULL,
  `vehiclenumber` varchar(20) DEFAULT NULL,
  `challandatetime` varchar(30) DEFAULT NULL,
  `rulesbroken` varchar(100) DEFAULT NULL,
  `fineamount` varchar(30) DEFAULT NULL,
  `paystatus` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `civilian`
--

CREATE TABLE `civilian` (
  `aadharid` varchar(20) NOT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `pincode` varchar(20) DEFAULT NULL,
  `streetnum` varchar(20) DEFAULT NULL,
  `licensenum` varchar(20) DEFAULT NULL,
  `vehiclenum` varchar(20) DEFAULT NULL,
  `vehicletype` varchar(30) DEFAULT NULL,
  `vehiclemodel` varchar(20) DEFAULT NULL,
  `phonenum` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `currentlogin`
--

CREATE TABLE `currentlogin` (
  `rtoid` varchar(20) NOT NULL,
  `islogin` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currentlogin`
--

INSERT INTO `currentlogin` (`rtoid`, `islogin`) VALUES
('172256', '0'),
('172257', '0'),
('172258', '0');

-- --------------------------------------------------------

--
-- Table structure for table `currentlogincivil`
--

CREATE TABLE `currentlogincivil` (
  `civilid` varchar(30) NOT NULL,
  `islogin` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `officer`
--

CREATE TABLE `officer` (
  `officerid` varchar(20) NOT NULL,
  `officername` varchar(20) DEFAULT NULL,
  `officerdesg` varchar(20) DEFAULT NULL,
  `policestn` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `officer`
--

INSERT INTO `officer` (`officerid`, `officername`, `officerdesg`, `policestn`) VALUES
('172256', 'KATEKAR', 'CONSTABLE', 'BORIVALI'),
('172257', 'GAITONDE', 'COMMISONER', 'KANDIVALI'),
('172258', 'SARTAJ', 'INSPECTOR', 'VASAI');

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `ruleno` varchar(20) DEFAULT NULL,
  `rulename` varchar(200) DEFAULT NULL,
  `fineamount` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`ruleno`, `rulename`, `fineamount`) VALUES
('1', 'Signal Violation', '200'),
('2', 'No Driving documents', '300'),
('3', 'Speed Limit Violation', '500'),
('4', 'Road Safety Violation', '700');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `challan`
--
ALTER TABLE `challan`
  ADD PRIMARY KEY (`challanid`);

--
-- Indexes for table `civilian`
--
ALTER TABLE `civilian`
  ADD PRIMARY KEY (`aadharid`);

--
-- Indexes for table `currentlogin`
--
ALTER TABLE `currentlogin`
  ADD PRIMARY KEY (`rtoid`);

--
-- Indexes for table `currentlogincivil`
--
ALTER TABLE `currentlogincivil`
  ADD PRIMARY KEY (`civilid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
