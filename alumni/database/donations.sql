-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2022 at 04:08 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumni_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `donate_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `connected_to` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `upi_pay` varchar(250) NOT NULL,
  `acc_no` varchar(150) NOT NULL,
  `credited_to` varchar(100) NOT NULL,
  `utr_no` varchar(100) NOT NULL,
  `donate_desc` varchar(250) NOT NULL,
  `donated_by` tinyint(4) NOT NULL,
  `donated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`donate_id`, `username`, `email`, `phone_no`, `connected_to`, `amount`, `upi_pay`, `acc_no`, `credited_to`, `utr_no`, `donate_desc`, `donated_by`, `donated_at`, `is_active`) VALUES
(5, 'Thumba', 'test@test.com', '9876567890', 'testconsol', '12345677', 'test2', 'testnumber2', 'admin', '123456', 'sidfug', 3, '2022-11-08 14:38:47', 1),
(6, 'udyfg', 'udyfg@sdf.sdf', '47823', 'asdasd', '12312', 'dfhudhf', 'sdufg', 'saaasdfsf', 'sdfsfd', 'sdfsdf', 3, '2022-11-08 14:51:55', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`donate_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `donate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
