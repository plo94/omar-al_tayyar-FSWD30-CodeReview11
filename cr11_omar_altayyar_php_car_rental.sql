-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2018 at 01:39 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr11_omar_altayyar_php_car_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` int(11) NOT NULL,
  `model` varchar(50) DEFAULT NULL,
  `details` varchar(500) DEFAULT NULL,
  `image` varchar(55) NOT NULL,
  `Price` int(11) NOT NULL,
  `fk_offices_id` int(11) NOT NULL,
  `fk_address` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `model`, `details`, `image`, `Price`, `fk_offices_id`, `fk_address`) VALUES
(1, 'Hyundai Elantra', '128-hp, 1.4-liter I-4 (regular gas)', 'img/1.png', 45, 1, 'Vorgartenstraße 200'),
(2, 'Dodge Charger', '300-hp, 3.6-liter V-6 (premium)', 'img/2.png', 100, 4, 'simmeringhauptstraße 57'),
(3, 'Audi A4', '252-hp, 2.0-liter I-4 (premium)', 'img/3.png', 85, 2, 'Schwedenplatz'),
(4, 'Dodge Challenger', '305-hp, 3.6-liter V-6 (regular gas)', 'img/4.png', 110, 3, 'Mariahilfestraße 76'),
(5, 'Audi S5', '354-hp, 3.0-liter V-6 (premium)', 'img/5.png', 120, 1, 'Vorgartenstraße 200'),
(6, 'Jeep Grand Cherokee', '295-hp, 3.6-liter V-6 (regular gas)', 'img/6.png', 100, 2, 'Schwedenplatz'),
(7, 'Lincoln Navigator', '450-hp, 3.5-liter V-6 (premium)', 'img/7.png', 160, 3, 'Mariahilfestraße 76'),
(8, 'Volkswagen Tiguan', '184-hp, 2.0-liter I-4 (regular gas)', 'img/8.png', 90, 4, 'simmeringhauptstraße 57'),
(9, 'Chevrolet Corvette', '460-hp, 6.2-liter V-8 (premium)', 'img/9.png', 160, 3, 'Mariahilfestraße 76'),
(10, 'Audi Q7', '252-hp, 2.0-liter I-4 (premium)', 'img/10.png', 115, 3, 'Mariahilfestraße 76'),
(11, 'Honda CR-V', '190-hp, 1.5-liter I-4 (regular gas)', 'img/11.png', 85, 4, 'simmeringhauptstraße 57'),
(12, 'BMW M4', '250-hp, 3.0-liter I-6 (premium)', 'img/12.png', 110, 4, 'simmeringhauptstraße 57');

-- --------------------------------------------------------

--
-- Table structure for table `cars_status`
--

CREATE TABLE `cars_status` (
  `cars_status_id` int(11) NOT NULL,
  `fk_current_location_id` int(11) NOT NULL,
  `fk_car_id` int(11) DEFAULT NULL,
  `fk_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `current_location`
--

CREATE TABLE `current_location` (
  `current_location_id` int(11) NOT NULL,
  `gps_tracking` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `offices_id` int(11) NOT NULL,
  `address` varchar(55) NOT NULL,
  `city` varchar(100) DEFAULT NULL,
  `zip` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`offices_id`, `address`, `city`, `zip`) VALUES
(1, 'Vorgartenstraße 200', 'Wien', '1020'),
(2, 'Schwedenplatz', 'Wien', '1010'),
(3, 'Mariahilfestraße 76', 'Wien', '1060'),
(4, 'simmeringhauptstraße 57', 'Wien', '1110');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `gender`, `birthdate`, `user_email`, `user_pass`) VALUES
(3, 'Omar', 'Marie', '', NULL, 'omar@marie.com', '224466'),
(7, 'omar', 'omar', '', NULL, 'omar@omar.com', 'omaromar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`),
  ADD KEY `fk_offices_id` (`fk_offices_id`);

--
-- Indexes for table `cars_status`
--
ALTER TABLE `cars_status`
  ADD PRIMARY KEY (`cars_status_id`),
  ADD KEY `fk_current_location_id` (`fk_current_location_id`),
  ADD KEY `fk_car_id` (`fk_car_id`),
  ADD KEY `fk_user_id` (`fk_user_id`);

--
-- Indexes for table `current_location`
--
ALTER TABLE `current_location`
  ADD PRIMARY KEY (`current_location_id`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`offices_id`,`address`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `offices_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`fk_offices_id`) REFERENCES `offices` (`offices_id`);

--
-- Constraints for table `cars_status`
--
ALTER TABLE `cars_status`
  ADD CONSTRAINT `cars_status_ibfk_1` FOREIGN KEY (`fk_current_location_id`) REFERENCES `current_location` (`current_location_id`),
  ADD CONSTRAINT `cars_status_ibfk_2` FOREIGN KEY (`fk_car_id`) REFERENCES `cars` (`car_id`),
  ADD CONSTRAINT `cars_status_ibfk_3` FOREIGN KEY (`fk_user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
