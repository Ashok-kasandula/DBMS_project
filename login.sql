-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jan 30, 2025 at 05:41 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminreg`
--

CREATE TABLE `adminreg` (
  `adminId` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminreg`
--

INSERT INTO `adminreg` (`adminId`, `name`, `password`, `phone`, `email`) VALUES
(1, '', '12345678', 2147483647, 'akash003@gmail.com'),
(2, 'Ashok', '00000000', 2147483647, 'darshan@gmail.com'),
(3, 'KASANDULA ', '12345678', 2147483647, 'ashokspace003@gmail.com'),
(4, 'akash', '12345678', 2147483647, 'akash@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `ID` int(50) NOT NULL,
  `name` varchar(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `name` longtext NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`name`, `price`, `category`) VALUES
('butterChicken', 200, 'northIndian'),
('paneerTikka', 180, 'northIndian'),
('nonvegThali', 250, 'northIndian'),
('biriyani', 150, 'northIndian'),
('dalMakhni', 210, 'northIndian'),
('paneerButter', 220, 'northIndian'),
('paneerButter', 220, 'northIndian'),
('alooGobi', 150, 'northIndian'),
('butterRoti', 70, 'northIndian'),
('nanBread', 120, 'northIndian'),
('dosa', 60, 'southIndian'),
('kgbiryani', 170, 'southIndian'),
('idli', 50, 'southIndian'),
('sambar', 30, 'southIndian'),
('masalaDosa', 70, 'southIndian'),
('uttpam', 90, 'southIndian'),
('pongal', 70, 'southIndian'),
('vada', 50, 'southIndian'),
('jamun', 45, 'Desserts'),
('rasgulla', 70, 'Desserts'),
('halwa', 50, 'Desserts'),
('rasmalai', 50, 'Desserts'),
('jalebi', 45, 'Desserts'),
('mysorepak', 30, 'Desserts'),
('kulfi', 50, 'Desserts'),
('orange', 50, 'Beverages'),
('apple', 60, 'Beverages'),
('pineapple', 55, 'Beverages'),
('grapefruite', 65, 'Beverages'),
('mango', 70, 'Beverages'),
('coconut', 60, 'Beverages'),
('cane', 55, 'Beverages');

-- --------------------------------------------------------

--
-- Table structure for table `party_hall`
--

CREATE TABLE `party_hall` (
  `num_halls` int(11) NOT NULL,
  `party_hall_id` int(11) NOT NULL,
  `price` bigint(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `room_no` int(11) NOT NULL,
  `item` varchar(11) NOT NULL,
  `num_items` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_cost` int(11) NOT NULL,
  `grand_total` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `party_hall_id` int(11) NOT NULL,
  `pool_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `user_id` int(30) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(8) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`user_id`, `username`, `password`, `phone`, `address`, `date`, `email`) VALUES
(6, 'santhosh', '87654321', '123456', 'jhfkjsh', '2024-07-03', 'santhosh@gmail'),
(9, 'ashok', '87654321', '6362657543', 'uvce ', '2004-02-14', 'ashok@gmail.com'),
(10, 'akashaa', '1234567', '0819706193', 'uvce', '2024-06-09', 'patneakash3@gmail.com'),
(11, 'Ajith', '1234', '7483309401', 'jhstudxftUCYXWQ7', '2024-12-04', 'lajith336@gmail.com'),
(12, 'ashok', '12345678', '65432', 'hgfd', '2025-01-14', 'ashok@gmail.com'),
(13, 'ashok', 'abcd', '6362657543', 'bengaluru', '2025-01-02', 'ashok@gmail.com'),
(14, 'TEST1', '12345', '7483309401', 'uygsdyqyic', '2025-01-08', 'test@gmail.com'),
(15, 'Test2', '123456', '765432678', 'hsyxhsxhyqx', '2025-01-07', 'test2@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_no` int(11) NOT NULL,
  `room_id` int(30) NOT NULL,
  `customer_name` varchar(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `room_type` varchar(11) NOT NULL,
  `price` int(11) NOT NULL,
  `num_rooms` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_no`, `room_id`, `customer_name`, `check_in`, `check_out`, `room_type`, `price`, `num_rooms`) VALUES
(25, 15, 'ajith', '2025-01-08', '2025-01-23', 'Single Bed ', 2000, 1),
(26, 15, 'ajith', '2025-01-08', '2025-01-23', 'Single Bed ', 2000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `swimming_pool`
--

CREATE TABLE `swimming_pool` (
  `poolLink_id` int(30) NOT NULL,
  `pool_no` int(30) NOT NULL,
  `price` int(11) NOT NULL,
  `num_pools` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unicode`
--

CREATE TABLE `unicode` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unicode`
--

INSERT INTO `unicode` (`id`, `code`) VALUES
(1, 'paradiseadmin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminreg`
--
ALTER TABLE `adminreg`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `party_hall`
--
ALTER TABLE `party_hall`
  ADD KEY `party_hall_id` (`party_hall_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_no`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `swimming_pool`
--
ALTER TABLE `swimming_pool`
  ADD PRIMARY KEY (`pool_no`),
  ADD KEY `poolLink_id` (`poolLink_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminreg`
--
ALTER TABLE `adminreg`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `user_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `swimming_pool`
--
ALTER TABLE `swimming_pool`
  MODIFY `pool_no` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `ID` FOREIGN KEY (`ID`) REFERENCES `registration` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `party_hall`
--
ALTER TABLE `party_hall`
  ADD CONSTRAINT `party_hall_id` FOREIGN KEY (`party_hall_id`) REFERENCES `registration` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `registration` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `room_id` FOREIGN KEY (`room_id`) REFERENCES `registration` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `swimming_pool`
--
ALTER TABLE `swimming_pool`
  ADD CONSTRAINT `poolLink_id` FOREIGN KEY (`poolLink_id`) REFERENCES `registration` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
