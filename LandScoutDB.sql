-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 07, 2025 at 03:48 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `LandScoutDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `Appointment_ID` int(11) NOT NULL,
  `Appointment_Date` date NOT NULL,
  `Appointment_Time` time NOT NULL,
  `houseandland_id` int(11) NOT NULL,
  `Customer_full_name` varchar(100) NOT NULL,
  `Customer_email` varchar(100) NOT NULL,
  `Customer_tel` varchar(12) NOT NULL,
  `status` varchar(50) NOT NULL,
  `note` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `houseandlands`
--

CREATE TABLE `houseandlands` (
  `houseandland_id` int(11) NOT NULL,
  `Announcement_Date` date NOT NULL,
  `Area_Space` varchar(500) NOT NULL,
  `Land_Size` varchar(100) NOT NULL,
  `Price_Per_Square_Meter` varchar(100) NOT NULL,
  `Price` text NOT NULL,
  `Location` varchar(500) NOT NULL,
  `type_name` varchar(100) NOT NULL,
  `Number_Of_Floors` int(11) DEFAULT 0,
  `Completed_Year` int(11) NOT NULL,
  `Detail` text NOT NULL,
  `Picture1` varchar(100) NOT NULL,
  `Picture2` varchar(100) DEFAULT NULL,
  `Picture3` varchar(100) DEFAULT NULL,
  `Picture4` varchar(100) DEFAULT NULL,
  `Picture5` varchar(100) DEFAULT NULL,
  `Number_Of_Toilet` int(11) NOT NULL,
  `Number_Of_Room` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Status` varchar(100) NOT NULL,
  `Maps` text NOT NULL,
  `status_sale` varchar(50) NOT NULL,
  `Square_wah_Size` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `users_id` int(10) DEFAULT NULL,
  `tel` varchar(15) NOT NULL,
  `message` text DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `payment_date_time` datetime NOT NULL,
  `payment_total` float NOT NULL,
  `slip` varchar(100) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `houseandland_id` int(11) DEFAULT NULL,
  `token` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `tel` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `ID_Line` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `access_level` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `token` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `tel`, `email`, `ID_Line`, `username`, `password`, `access_level`, `status`, `token`) VALUES
(1, 'ผู้ดูแลระบบ คนแรก', '0687459877', 'admin@gmail.com', '@apartment1', 'admin', 'admin', 'admin', 'อนุมัติ', 0),
(12, 'คณะกรรมการ คนแรก', '0214555715', 'test@gmail.com', '@apartment45', 'user', 'user', 'sale', 'อนุมัติ', 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`Appointment_ID`);

--
-- Indexes for table `houseandlands`
--
ALTER TABLE `houseandlands`
  ADD PRIMARY KEY (`houseandland_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `Appointment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `houseandlands`
--
ALTER TABLE `houseandlands`
  MODIFY `houseandland_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
