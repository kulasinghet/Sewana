-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 03, 2021 at 10:54 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sewana`
--
CREATE DATABASE IF NOT EXISTS `sewana` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sewana`;

-- --------------------------------------------------------

--
-- Table structure for table `advertise`
--

DROP TABLE IF EXISTS `advertise`;
CREATE TABLE IF NOT EXISTS `advertise` (
  `Advertisement_Id` int(9) NOT NULL AUTO_INCREMENT,
  `Newspaper_Id` int(9) DEFAULT NULL,
  `Property_number` int(9) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  PRIMARY KEY (`Advertisement_Id`),
  KEY `advertise_ibfk_2` (`Property_number`),
  KEY `advertise_ibfk_1` (`Newspaper_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `advertise`
--

INSERT INTO `advertise` (`Advertisement_Id`, `Newspaper_Id`, `Property_number`, `Date`) VALUES
(1, 1, 1, '2021-09-25');

-- --------------------------------------------------------

--
-- Table structure for table `assistant`
--

DROP TABLE IF EXISTS `assistant`;
CREATE TABLE IF NOT EXISTS `assistant` (
  `Emp_ID` int(9) NOT NULL,
  `Supervisor_No` int(9) DEFAULT NULL,
  PRIMARY KEY (`Emp_ID`),
  KEY `assitant_ibfk_2` (`Supervisor_No`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assistant`
--

INSERT INTO `assistant` (`Emp_ID`, `Supervisor_No`) VALUES
(12231, 1);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

DROP TABLE IF EXISTS `branch`;
CREATE TABLE IF NOT EXISTS `branch` (
  `BRANCH_ID` int(9) NOT NULL AUTO_INCREMENT,
  `City` varchar(30) NOT NULL,
  `Phone` char(10) DEFAULT NULL,
  `Mail_Address` varchar(200) DEFAULT NULL,
  `EMail` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`BRANCH_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`BRANCH_ID`, `City`, `Phone`, `Mail_Address`, `EMail`) VALUES
(1, 'Galle', '0774466566', 'galle road', 'gallesewana@gmail.com'),
(2, 'Matara', '2147483647', '28, Nilmini Uyana, Rathanajothi Mawatha, Bataduwa, Galle', 'kulasinghet@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `Client_number` int(9) NOT NULL AUTO_INCREMENT,
  `NIC` char(12) DEFAULT NULL,
  `Full_name` varchar(100) DEFAULT NULL,
  `Email` varchar(100) NOT NULL,
  `Registered_date` date DEFAULT NULL,
  `Emp_Id` int(9) DEFAULT NULL,
  `Branch_Id` int(9) DEFAULT NULL,
  PRIMARY KEY (`Client_number`),
  KEY `client_ibfk_3` (`Email`),
  KEY `client_ibfk_1` (`Emp_Id`),
  KEY `client_ibfk_2` (`Branch_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`Client_number`, `NIC`, `Full_name`, `Email`, `Registered_date`, `Emp_Id`, `Branch_Id`) VALUES
(1, '2147483647', 'Angi Fernando', 'angi@gmail.com', '2021-09-27', 12216, 1),
(3, '200010101231', 'Amal Disanayake', 'amal@gmail.com', '2021-10-02', 12216, 1),
(4, '199712402V', 'Mohomed Hafsa', 'hafsa@gmail.com', '2021-10-02', 12216, 1),
(5, '199712402V', 'Mohomed Hafsa', 'hafsa@gmail.com', '2021-10-02', 12216, 1);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `Company_Id` int(9) NOT NULL AUTO_INCREMENT,
  `Name` varchar(200) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Contact_number` char(10) DEFAULT NULL,
  `Owner_Id` int(9) DEFAULT NULL,
  PRIMARY KEY (`Company_Id`),
  KEY `company_ibfk_1` (`Owner_Id`),
  KEY `company_ibfk_2` (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `current_property`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `current_property`;
CREATE TABLE IF NOT EXISTS `current_property` (
`Property_number` int(9)
,`Client_number` int(9)
,`Address` varchar(50)
,`Proposed_rental` int(15)
,`Number_of_rooms` int(10)
,`Availability` int(1)
,`Type` varchar(10)
,`Owner_ID` int(9)
,`Branch_ID` int(9)
);

-- --------------------------------------------------------

--
-- Table structure for table `lease`
--

DROP TABLE IF EXISTS `lease`;
CREATE TABLE IF NOT EXISTS `lease` (
  `Lease_ID` int(9) NOT NULL AUTO_INCREMENT,
  `Property_number` int(9) DEFAULT NULL,
  `Client_number` int(9) DEFAULT NULL,
  `Monthly_rent` int(10) DEFAULT NULL,
  `Payment_method` varchar(20) DEFAULT NULL,
  `Start_date` date DEFAULT NULL,
  `End_date` date DEFAULT NULL,
  PRIMARY KEY (`Lease_ID`),
  KEY `lease_ibfk_2` (`Property_number`),
  KEY `lease_ibfk_1` (`Client_number`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lease`
--

INSERT INTO `lease` (`Lease_ID`, `Property_number`, `Client_number`, `Monthly_rent`, `Payment_method`, `Start_date`, `End_date`) VALUES
(1, 1, 1, 500000, 'cheq', '2021-10-27', '2021-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

DROP TABLE IF EXISTS `manager`;
CREATE TABLE IF NOT EXISTS `manager` (
  `Emp_ID` int(9) NOT NULL,
  `Manager_No` int(9) NOT NULL AUTO_INCREMENT,
  `Appointed_Date` date DEFAULT NULL,
  `Branch_Id` int(9) DEFAULT NULL,
  PRIMARY KEY (`Emp_ID`),
  UNIQUE KEY `manager` (`Manager_No`) USING BTREE,
  KEY `manager_ibfk_2` (`Branch_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`Emp_ID`, `Manager_No`, `Appointed_Date`, `Branch_Id`) VALUES
(12216, 1, '2021-09-08', 1),
(12219, 3, '2021-10-29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `newspaper`
--

DROP TABLE IF EXISTS `newspaper`;
CREATE TABLE IF NOT EXISTS `newspaper` (
  `Newspaper_Id` int(9) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `EMail` varchar(50) DEFAULT NULL,
  `Contact_Number` char(10) DEFAULT NULL,
  `D_W_Flag` char(1) DEFAULT NULL,
  PRIMARY KEY (`Newspaper_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newspaper`
--

INSERT INTO `newspaper` (`Newspaper_Id`, `Name`, `Address`, `EMail`, `Contact_Number`, `D_W_Flag`) VALUES
(1, 'Daily Mirror', 'No. 90, Colombo', 'dailymirror@gmail.com', '0714445410', 'D'),
(2, 'sunday observer', 'No 80, Galle Road, Galle', 'sunday@gmail.com', '0111241414', 'D'),
(3, 'Lanka Papers', 'Ward Place, Pamunuwa', 'lankapapers@gmail.com', '0711112410', 'D'),
(4, 'Dinamina', 'Junction Road, Rajagiriya', 'dinamina@gmail.com', '0114145412', 'W');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

DROP TABLE IF EXISTS `person`;
CREATE TABLE IF NOT EXISTS `person` (
  `NIC` int(9) NOT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Contact_number` char(10) DEFAULT NULL,
  `Owner_Id` int(9) DEFAULT NULL,
  PRIMARY KEY (`NIC`),
  KEY `person_ibfk_1` (`Owner_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`NIC`, `Name`, `Address`, `Email`, `Contact_number`, `Owner_Id`) VALUES
(2147483647, 'Paul Perera', 'No 89 Ward Place, Colombo 03', 'paul@gmail.com', '0114454442', 1);

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

DROP TABLE IF EXISTS `property`;
CREATE TABLE IF NOT EXISTS `property` (
  `Property_number` int(9) NOT NULL AUTO_INCREMENT,
  `Address` varchar(50) DEFAULT NULL,
  `Proposed_rental` int(15) DEFAULT NULL,
  `Number_of_rooms` int(10) DEFAULT NULL,
  `Availability` int(1) DEFAULT NULL,
  `Type` varchar(10) DEFAULT NULL,
  `Owner_ID` int(9) DEFAULT NULL,
  `Branch_ID` int(9) DEFAULT NULL,
  PRIMARY KEY (`Property_number`),
  KEY `property_ibfk_1` (`Branch_ID`),
  KEY `property_ibfk_2` (`Owner_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`Property_number`, `Address`, `Proposed_rental`, `Number_of_rooms`, `Availability`, `Type`, `Owner_ID`, `Branch_ID`) VALUES
(1, '89/2, Jayapura Lane', 400000, 5, 1, 'flat', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `property_owner`
--

DROP TABLE IF EXISTS `property_owner`;
CREATE TABLE IF NOT EXISTS `property_owner` (
  `Owner_Id` int(9) NOT NULL AUTO_INCREMENT,
  `Branch_Id` int(9) DEFAULT NULL,
  PRIMARY KEY (`Owner_Id`),
  KEY `property_owner_ibfk_1` (`Branch_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_owner`
--

INSERT INTO `property_owner` (`Owner_Id`, `Branch_Id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `property_requirement`
--

DROP TABLE IF EXISTS `property_requirement`;
CREATE TABLE IF NOT EXISTS `property_requirement` (
  `Client_number` int(9) NOT NULL,
  `Requirement_number` int(9) NOT NULL AUTO_INCREMENT,
  `Area` int(10) DEFAULT NULL,
  `Type_of_property` varchar(10) DEFAULT NULL,
  `Rent_date` date DEFAULT NULL,
  `Maximum_rent` int(10) DEFAULT NULL,
  PRIMARY KEY (`Client_number`,`Requirement_number`),
  UNIQUE KEY `Requirement_number` (`Requirement_number`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_requirement`
--

INSERT INTO `property_requirement` (`Client_number`, `Requirement_number`, `Area`, `Type_of_property`, `Rent_date`, `Maximum_rent`) VALUES
(1, 1, 4500, 'flat', '2021-10-29', 450000);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `Emp_ID` int(9) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) DEFAULT NULL,
  `Phone` char(10) DEFAULT NULL,
  `Salary` int(10) DEFAULT NULL,
  `Gender` char(1) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Email` varchar(100) NOT NULL,
  `Start_Date` date DEFAULT NULL,
  `Emp_type` varchar(2) NOT NULL,
  `Branch_ID` int(9) NOT NULL,
  PRIMARY KEY (`Emp_ID`),
  KEY `Branch_ID` (`Branch_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12235 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Emp_ID`, `Name`, `Phone`, `Salary`, `Gender`, `DOB`, `Email`, `Start_Date`, `Emp_type`, `Branch_ID`) VALUES
(12216, 'Dilky Liyanage', '0774466566', 400000, 'F', '2000-10-22', 'dilky@gmail.com', '2021-09-13', 'M', 1),
(12218, 'Isuru Liyanage', '0011214124', 1000000, 'M', '1999-07-14', 'isuru@gmail.com', '2021-10-12', 'A', 1),
(12219, 'Dilini Liyanage', '0719335531', 500000, 'F', '1995-06-13', 'dilini@gmail.com', '2021-10-03', 'M', 1),
(12225, 'Haritha Hasathcharu', '071833886', 500000000, 'M', '2021-10-03', 'haritha@gmail.com', '2021-10-03', 'S', 1),
(12231, 'Methini Chethana', '0111214412', 60000, 'F', '2000-02-15', 'methini@gmail.com', '2021-10-03', 'AS', 1),
(12233, 'Thilini Perera', '0711244458', 60000, 'F', '2000-07-06', 'thilini@gmail.com', '2021-10-12', 'E', 1);

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

DROP TABLE IF EXISTS `supervisor`;
CREATE TABLE IF NOT EXISTS `supervisor` (
  `Emp_ID` int(9) NOT NULL,
  `Supervisor_No` int(9) NOT NULL AUTO_INCREMENT,
  `Appointed_Date` date DEFAULT NULL,
  PRIMARY KEY (`Emp_ID`),
  UNIQUE KEY `Supervisor_No` (`Supervisor_No`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`Emp_ID`, `Supervisor_No`, `Appointed_Date`) VALUES
(12225, 1, '2021-09-08');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

DROP TABLE IF EXISTS `userlogin`;
CREATE TABLE IF NOT EXISTS `userlogin` (
  `Email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`Email`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`Email`, `password`) VALUES
('amal@gmail.com', 'amal123'),
('angi@gmail.com', 'angi123'),
('dilini@gmail.com', 'dilini123'),
('dilky@gmail.com', 'dilky123'),
('hafsa@gmail.com', 'hafsa123'),
('haritha@gmail.com', 'haritha123'),
('isuru@gmail.com', 'isuru123'),
('methini@gmail.com', 'methini123'),
('paul@gmail.com', 'paul123'),
('thilini@gmail.com', 'thilini123');

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

DROP TABLE IF EXISTS `views`;
CREATE TABLE IF NOT EXISTS `views` (
  `Client_number` int(9) NOT NULL,
  `Property_Number` int(9) NOT NULL,
  `View_Date` date DEFAULT NULL,
  `Comment` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`Client_number`,`Property_Number`),
  KEY `views_ibfk_1` (`Property_Number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`Client_number`, `Property_Number`, `View_Date`, `Comment`) VALUES
(1, 1, '2021-10-16', 'average');

-- --------------------------------------------------------

--
-- Structure for view `current_property`
--
DROP TABLE IF EXISTS `current_property`;

DROP VIEW IF EXISTS `current_property`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `current_property`  AS  select `property`.`Property_number` AS `Property_number`,`property_requirement`.`Client_number` AS `Client_number`,`property`.`Address` AS `Address`,`property`.`Proposed_rental` AS `Proposed_rental`,`property`.`Number_of_rooms` AS `Number_of_rooms`,`property`.`Availability` AS `Availability`,`property`.`Type` AS `Type`,`property`.`Owner_ID` AS `Owner_ID`,`property`.`Branch_ID` AS `Branch_ID` from (`property` join `property_requirement` on((`property`.`Type` = `property_requirement`.`Type_of_property`))) where ((`property`.`Proposed_rental` <= `property_requirement`.`Maximum_rent`) and (`property`.`Availability` = '1')) ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advertise`
--
ALTER TABLE `advertise`
  ADD CONSTRAINT `advertise_ibfk_1` FOREIGN KEY (`Newspaper_Id`) REFERENCES `newspaper` (`Newspaper_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `advertise_ibfk_2` FOREIGN KEY (`Property_number`) REFERENCES `property` (`Property_number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assistant`
--
ALTER TABLE `assistant`
  ADD CONSTRAINT `assistant_ibfk_1` FOREIGN KEY (`Emp_ID`) REFERENCES `staff` (`Emp_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assitant_ibfk_2` FOREIGN KEY (`Supervisor_No`) REFERENCES `supervisor` (`Supervisor_No`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`Emp_Id`) REFERENCES `staff` (`Emp_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `client_ibfk_2` FOREIGN KEY (`Branch_Id`) REFERENCES `branch` (`BRANCH_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`Owner_Id`) REFERENCES `property_owner` (`Owner_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `company_ibfk_2` FOREIGN KEY (`Email`) REFERENCES `userlogin` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lease`
--
ALTER TABLE `lease`
  ADD CONSTRAINT `lease_ibfk_1` FOREIGN KEY (`Client_number`) REFERENCES `client` (`Client_number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lease_ibfk_2` FOREIGN KEY (`Property_number`) REFERENCES `property` (`Property_number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`Emp_ID`) REFERENCES `staff` (`Emp_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `manager_ibfk_2` FOREIGN KEY (`Branch_Id`) REFERENCES `branch` (`BRANCH_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `person_ibfk_1` FOREIGN KEY (`Owner_Id`) REFERENCES `property_owner` (`Owner_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `property`
--
ALTER TABLE `property`
  ADD CONSTRAINT `property_ibfk_1` FOREIGN KEY (`Branch_ID`) REFERENCES `branch` (`BRANCH_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `property_ibfk_2` FOREIGN KEY (`Owner_ID`) REFERENCES `property_owner` (`Owner_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `property_owner`
--
ALTER TABLE `property_owner`
  ADD CONSTRAINT `property_owner_ibfk_1` FOREIGN KEY (`Branch_Id`) REFERENCES `branch` (`BRANCH_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `property_requirement`
--
ALTER TABLE `property_requirement`
  ADD CONSTRAINT `property_requirement_ibfk_1` FOREIGN KEY (`Client_number`) REFERENCES `client` (`Client_number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`Branch_ID`) REFERENCES `branch` (`BRANCH_ID`);

--
-- Constraints for table `views`
--
ALTER TABLE `views`
  ADD CONSTRAINT `views_ibfk_1` FOREIGN KEY (`Property_Number`) REFERENCES `property` (`Property_number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `views_ibfk_2` FOREIGN KEY (`Client_number`) REFERENCES `client` (`Client_number`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
