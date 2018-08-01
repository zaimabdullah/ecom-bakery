-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2018 at 11:55 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `userEmail` varchar(50) NOT NULL,
  `userPassword` varchar(16) NOT NULL,
  `userFirstName` varchar(20) NOT NULL,
  `userLastName` varchar(20) NOT NULL,
  `userGender` varchar(5) DEFAULT NULL,
  `userPhone` varchar(12) NOT NULL,
  `userCity` varchar(20) DEFAULT NULL,
  `userAddress` varchar(50) DEFAULT NULL,
  `userStatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userEmail`, `userPassword`, `userFirstName`, `userLastName`, `userGender`, `userPhone`, `userCity`, `userAddress`, `userStatus`) VALUES
(1, 'zc14@gmail.com', 'admin', 'husni', 'zaim', 'm', '0000', 'Kota Bharu', 'Kg kkan,Peringat', 2),
(2, 'ai30@gmail.com', 'admin', 'Aiman', 'Hakeem', 'm', '0000', 'Machang', 'Jln Bahgia, Kg Dahlia', 2),
(3, 'if@gmail.com', 'admin', 'Khairul', 'Iffan', 'm', '000', 'Kota Bharu', 'Lot 1it, Kubang Kerian', 2),
(4, 'ar7@gmail.com', 'admin', 'Arif', 'Fikri', 'm', '000', 'Machang', 'Kg Bukit Tiu', 2),
(15, 'hu@gmail.com', 'user', 'zaim', 'abdullah', 'm', '000', 'Kota Bharu', 'taman bendahara', 1),
(16, 'siti@gmail.com', 'user', 'siti', 'zubaidah', 'f', '000', 'Kota Bharu', 'Melor', 1),
(17, 'aaaa@', 'user', 'fikri', 'rusli', 'm', '000', 'Machang', 'Kg Bukitng Kelantan', 1),
(18, 'abc@gmail.com', 'user', 'khairul', 'iffan', 'm', '12345', 'kb', 'melor', 1),
(19, 'abcd@gmail.com', 'user', 'khirul', 'ipe', 'm', '2345', 'kb', 'kg bukit tiu', 1),
(20, 'husni@gmail.com', 'user', 'zaim', 'jim', 'm', '134256', 'machang', 'bukit tiu', 1),
(21, 'zaim@gmail.com', 'user', 'zaim', 'abdul', 'm', '0000000', 'kb', 'kg situ', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
