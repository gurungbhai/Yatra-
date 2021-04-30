-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2019 at 05:00 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yatra card`
--

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `ID` int(11) NOT NULL,
  `cardpin` varchar(150) NOT NULL,
  `count` int(11) NOT NULL,
  `initialstep` varchar(20) NOT NULL,
  `finalstep` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`ID`, `cardpin`, `count`, `initialstep`, `finalstep`) VALUES
(3, 'C6 BD EE 1A', 1, '76', '76'),
(4, '50 79 4C D3', 2, '76', '76');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `sn` int(11) NOT NULL,
  `location_name` varchar(150) NOT NULL,
  `rfidcode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`sn`, `location_name`, `rfidcode`) VALUES
(1, 'kalanki', 0),
(2, 'balkhu', 0),
(3, 'sanepa', 0),
(4, 'dhobighat', 0);

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `sn` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `balance` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`sn`, `name`, `username`, `password`, `balance`) VALUES
(1, 'Mahanagar', 'owner', 'owner123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `recharge50`
--

CREATE TABLE `recharge50` (
  `sn` int(11) NOT NULL,
  `number` bigint(12) NOT NULL,
  `used` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recharge50`
--

INSERT INTO `recharge50` (`sn`, `number`, `used`) VALUES
(1, 1234567890, 1),
(2, 4567891230, 1),
(3, 4561237890, 1);

-- --------------------------------------------------------

--
-- Table structure for table `recharge100`
--

CREATE TABLE `recharge100` (
  `sn` int(11) NOT NULL,
  `number` bigint(12) NOT NULL,
  `used` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `sn` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `number` varchar(150) NOT NULL,
  `address` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `gender` varchar(150) NOT NULL,
  `balance` double NOT NULL,
  `rfidcode` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`sn`, `name`, `email`, `number`, `address`, `username`, `password`, `gender`, `balance`, `rfidcode`) VALUES
(1, 'Rajan Gurung', 'rajanlama79@gmail.com', '9803769901', 'kalanki', 'gurung', 'RAJAN', 'male', 150, 0),
(2, 'asd', 'asdasd', 'asdasd', '`asdasd``', 'asdasd', 'asd', 'male', 0, 0),
(3, 'Ranjeet Gupta', 'ranjeet@gmail.com', '980376985', 'ktm', 'rajeet1', 'ranjeet', 'male', 50, 0),
(9, 'bharat bhatta', 'sss@gmail.com', '9803769908', 'kalanki', 'ramjee', 'rajan', 'male', 150, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `recharge50`
--
ALTER TABLE `recharge50`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `recharge100`
--
ALTER TABLE `recharge100`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`sn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `recharge50`
--
ALTER TABLE `recharge50`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `recharge100`
--
ALTER TABLE `recharge100`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
