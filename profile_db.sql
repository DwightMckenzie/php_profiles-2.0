-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2025 at 02:28 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `profile_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_prof`
--

CREATE TABLE `admin_prof` (
  `ID` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admincode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_prof`
--

INSERT INTO `admin_prof` (`ID`, `firstname`, `lastname`, `email`, `username`, `password`, `admincode`) VALUES
(1, 'Dwight', 'Mckenzie', 'dmckenzie2013@att.net', 'Dwight1980', 'ABC123%', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `user_prof`
--

CREATE TABLE `user_prof` (
  `ID` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_prof`
--

INSERT INTO `user_prof` (`ID`, `firstname`, `lastname`, `email`, `username`, `password`) VALUES
(1, 'John', 'Doe', '', 'johnnydoe', 'ABC123%');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_prof`
--
ALTER TABLE `admin_prof`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_prof`
--
ALTER TABLE `user_prof`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_prof`
--
ALTER TABLE `admin_prof`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_prof`
--
ALTER TABLE `user_prof`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
