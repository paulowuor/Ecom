-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2023 at 02:46 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farmer`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `email`, `password`) VALUES
('admin', 'owuorpaul136@gmail.com', '21232f297a57a5a743894a0e4a801fc3'),
('paul', '', '6c63212ab48e8401eaf6b59b95d816a9'),
('paul', 'sony57@gmail.com', '6c63212ab48e8401eaf6b59b95d816a9'),
('paul', 'owuorpaul136@gmail.com', '6c63212ab48e8401eaf6b59b95d816a9'),
('paul', 'owuorpaul136@gmail.com', '12bda8caa70587b7e7f5d078ca72b17f'),
('paul', 'sony57gmail.com', '5fe877aab8da95ee3a49180bc6ffa21e'),
('paul', 'kmmmm', '2f3d4c0e78dd6e23b98be1b483ef762c');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `name` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `companyID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`name`, `location`, `email`, `companyID`) VALUES
('Mumias', 'Bungoma', 'sony57@gmail.com', 7);

-- --------------------------------------------------------

--
-- Table structure for table `farmers`
--

CREATE TABLE `farmers` (
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phonenumber` varchar(50) NOT NULL,
  `nationalID` int(50) NOT NULL,
  `companyID` int(11) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farmers`
--

INSERT INTO `farmers` (`username`, `email`, `phonenumber`, `nationalID`, `companyID`, `password`) VALUES
('owuor', 'owuorpeter136@gmail.com', '0734987698', 40963872, 7, '5fe877aab8da95ee3a49180bc6ffa21e'),
('lucky', 'lucky456@gmail.com', '0756345291', 74856535, 7, '5fe877aab8da95ee3a49180bc6ffa21e');

-- --------------------------------------------------------

--
-- Table structure for table `field officer`
--

CREATE TABLE `field officer` (
  `nationalID` int(50) NOT NULL,
  `employNo` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `companyID` int(11) NOT NULL,
  `officerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `nationalID` int(50) NOT NULL,
  `employNo` varchar(50) NOT NULL,
  `fName` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `managerID` int(11) NOT NULL,
  `companyID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`nationalID`, `employNo`, `fName`, `middlename`, `lname`, `managerID`, `companyID`) VALUES
(38261037, 'Emp/0001/2022', 'owuor ', 'Achieng', 'otieno', 3, 7),
(38261037, 'Emp/0001/2022', 'owuor ', 'Achieng', 'otieno', 5, 7),
(38261037, 'Emp/0001/2022', 'owuor ', 'Paul', 'odongo', 6, 7),
(2147483647, 'Emp/0023/2022', 'Vincent', 'Ouma', 'Otieno', 34, 7),
(2147483647, 'Emp/0001/2022', 'ouma', 'Paul', 'odongo', 45, 7),
(38261037, 'Emp/0001/2022', 'owuor ', 'Paul', 'odongo', 78, 7),
(40963872, 'Emp/002/2022', 'owuor ', 'Paul', 'otieno', 90, 7),
(40963872, 'Emp/002/2022', 'owuor ', 'Paul', 'otieno', 99, 7),
(38261037, 'Emp/009/2022', 'Rose', 'kibet', 'sarah', 4577, 7),
(2147483647, 'Emp/0001/2022', 'ouma', 'Paul', 'odongo', 8998, 7);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `username`, `id`, `price`, `status`) VALUES
(26, 'lucky', 0, 8066.00, 0),
(27, 'owuor', 0, 8066.00, 0),
(28, 'lucky', 0, 981.00, 0),
(29, 'owuor', 0, 16023.00, 0),
(30, 'owuor', 0, 15260.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `order_name` varchar(1000) NOT NULL DEFAULT '',
  `order_price` double NOT NULL DEFAULT 0,
  `order_quantity` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `order_total` double NOT NULL DEFAULT 0,
  `order_status` varchar(45) NOT NULL DEFAULT '',
  `order_date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`order_id`, `user_id`, `order_name`, `order_price`, `order_quantity`, `order_total`, `order_status`, `order_date`) VALUES
(20, 4, 'Item2 ', 100, 2, 200, 'Ordered_Finished', '2016-11-14'),
(23, 4, 'Item2 ', 100, 3, 300, 'Ordered_Finished', '2016-11-14'),
(30, 4, 'Item2 ', 100, 1, 100, 'Ordered_Finished', '2016-11-15'),
(33, 4, 'Item2 ', 100, 2, 200, 'Ordered_Finished', '2023-03-15'),
(34, 4, 'Item3', 50, 1, 50, 'Ordered_Finished', '2023-03-15'),
(35, 4, 'Item2 ', 100, 1, 100, 'Ordered', '2023-03-15');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(10) UNSIGNED NOT NULL,
  `nationalID` int(50) NOT NULL,
  `quantity` int(6) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `code` int(11) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_temp`
--

CREATE TABLE `password_reset_temp` (
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_reset_temp`
--

INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`) VALUES
('owuorpaul136@gmail.com', '768e78024aa8fdb9b8fe87be86f647450c8a588d7d', '2023-02-21 13:29:35'),
('owuorpaul136@gmail.com', '768e78024aa8fdb9b8fe87be86f64745f6b606c9f3', '2023-02-21 13:48:40'),
('owuorpaul136@gmail.com', '768e78024aa8fdb9b8fe87be86f647458df24e5696', '2023-02-21 13:48:45');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `code` varchar(100) NOT NULL,
  `price` double(9,2) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `price`, `image`) VALUES
(36, 'Sugar', 'code', 400.00, 'WIN_20221111_15_16_48_Pro.jpg'),
(38, 'maize', '089878', 7000.00, 'WIN_20221111_15_16_48_Pro.jpg'),
(923, 'maize', '089', 7000.00, 'WIN_20221123_17_47_39_Pro.jpg'),
(925, 'hen', '908987', 700.00, 'WIN_20221123_17_47_39_Pro.jpg'),
(926, 'hen', '987678', 900.00, 'farmer.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `nationalID` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `empNo` varchar(50) NOT NULL,
  `phone number` varchar(50) NOT NULL,
  `supplierID` int(11) NOT NULL,
  `companyID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`companyID`);

--
-- Indexes for table `farmers`
--
ALTER TABLE `farmers`
  ADD KEY `companyID` (`companyID`),
  ADD KEY `nationalID` (`nationalID`);

--
-- Indexes for table `field officer`
--
ALTER TABLE `field officer`
  ADD PRIMARY KEY (`officerID`),
  ADD KEY `companyID` (`companyID`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`managerID`),
  ADD KEY `companyID` (`companyID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `FK_orderdetails_1` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`),
  ADD KEY `nationalID` (`nationalID`),
  ADD KEY `id` (`code`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplierID`),
  ADD KEY `companyID` (`companyID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `field officer`
--
ALTER TABLE `field officer`
  MODIFY `officerID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `managerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87989;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=642;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=928;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplierID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `farmers`
--
ALTER TABLE `farmers`
  ADD CONSTRAINT `farmers_ibfk_1` FOREIGN KEY (`companyID`) REFERENCES `company` (`companyID`) ON UPDATE CASCADE;

--
-- Constraints for table `field officer`
--
ALTER TABLE `field officer`
  ADD CONSTRAINT `field officer_ibfk_1` FOREIGN KEY (`companyID`) REFERENCES `company` (`companyID`) ON UPDATE CASCADE;

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`companyID`) REFERENCES `company` (`companyID`) ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`nationalID`) REFERENCES `farmers` (`nationalID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`code`) REFERENCES `products` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`companyID`) REFERENCES `company` (`companyID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
