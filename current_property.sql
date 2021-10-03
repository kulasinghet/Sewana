-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 03, 2021 at 10:59 AM
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

-- --------------------------------------------------------

--
-- Structure for view `current_property`
--

DROP VIEW IF EXISTS `current_property`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `current_property`  AS  select `property`.`Property_number` AS `Property_number`,`property_requirement`.`Client_number` AS `Client_number`,`property`.`Address` AS `Address`,`property`.`Proposed_rental` AS `Proposed_rental`,`property`.`Number_of_rooms` AS `Number_of_rooms`,`property`.`Availability` AS `Availability`,`property`.`Type` AS `Type`,`property`.`Owner_ID` AS `Owner_ID`,`property`.`Branch_ID` AS `Branch_ID` from (`property` join `property_requirement` on((`property`.`Type` = `property_requirement`.`Type_of_property`))) where ((`property`.`Proposed_rental` <= `property_requirement`.`Maximum_rent`) and (`property`.`Availability` = '1')) ;

--
-- VIEW `current_property`
-- Data: None
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
