-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2023 at 05:44 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cathotel_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_idno` int(11) NOT NULL,
  `admin_uname` varchar(150) NOT NULL,
  `admin_pw` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_idno`, `admin_uname`, `admin_pw`) VALUES
(1, 'purrfectionadmin123', 'pa12345');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingid` int(11) NOT NULL,
  `checkin` date DEFAULT NULL,
  `checkout` date DEFAULT NULL,
  `totalprice` int(11) NOT NULL,
  `cust_id` int(11) DEFAULT NULL,
  `rooms_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingid`, `checkin`, `checkout`, `totalprice`, `cust_id`, `rooms_id`) VALUES
(29, '2023-07-19', '2023-07-22', 90, 27, 1),
(31, '2023-07-18', '2023-07-20', 60, 29, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cust_table`
--

CREATE TABLE `cust_table` (
  `cust_id` int(11) NOT NULL,
  `cust_fullname` varchar(150) NOT NULL,
  `cust_email` varchar(150) NOT NULL,
  `cust_phonenum` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cust_table`
--

INSERT INTO `cust_table` (`cust_id`, `cust_fullname`, `cust_email`, `cust_phonenum`) VALUES
(27, 'megu', 'megu@gmail.com', '0194332256'),
(29, 'farah', 'farah@gmail.com', '01324345556');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentid` int(11) NOT NULL,
  `paymentmethod` text NOT NULL,
  `paymentstatus` varchar(255) DEFAULT 'Depending',
  `paymentproof` text NOT NULL,
  `bookingid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentid`, `paymentmethod`, `paymentstatus`, `paymentproof`, `bookingid`) VALUES
(17, 'Online Payment', 'Verified', 'receipt1.png', 29),
(19, 'Online Payment', 'Pending', 'receipt1.png', 31);

-- --------------------------------------------------------

--
-- Table structure for table `room_table`
--

CREATE TABLE `room_table` (
  `rooms_id` int(11) NOT NULL,
  `rooms_name` text NOT NULL,
  `rooms_type` text NOT NULL,
  `rooms_capacity` varchar(100) NOT NULL,
  `rooms_details` text NOT NULL,
  `rooms_img` text NOT NULL,
  `rooms_price` int(100) NOT NULL,
  `rooms_totalavailability` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_table`
--

INSERT INTO `room_table` (`rooms_id`, `rooms_name`, `rooms_type`, `rooms_capacity`, `rooms_details`, `rooms_img`, `rooms_price`, `rooms_totalavailability`) VALUES
(1, 'Deluxe Single', 'Deluxe', '1 Cat', 'Room can fit up to one cat', 'deluxesinglecrop.jpg', 30, 2),
(2, 'Deluxe Double', 'Deluxe', '2 Cats', 'Room can fit up to two cats', 'deluxedoublecrop.jpg', 50, 1),
(8, 'Deluxe Triple', 'Deluxe', '3 Cats', 'This room can fit up to 3 Cats', 'deluxetriple.jpg', 70, 3),
(11, 'Premium Suite', 'Premium', 'More than 3 Cats', 'This room can fill up to 3 Cats and more', 'premiumsuite.jpg', 85, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_idno`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingid`),
  ADD KEY `booking_ibfk_1` (`cust_id`),
  ADD KEY `booking_ibfk_2` (`rooms_id`);

--
-- Indexes for table `cust_table`
--
ALTER TABLE `cust_table`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentid`),
  ADD KEY `payment_ibfk_1` (`bookingid`);

--
-- Indexes for table `room_table`
--
ALTER TABLE `room_table`
  ADD PRIMARY KEY (`rooms_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_idno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `cust_table`
--
ALTER TABLE `cust_table`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `room_table`
--
ALTER TABLE `room_table`
  MODIFY `rooms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `cust_table` (`cust_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`rooms_id`) REFERENCES `room_table` (`rooms_id`) ON DELETE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`bookingid`) REFERENCES `booking` (`bookingid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
