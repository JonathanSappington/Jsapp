-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2022 at 07:36 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wp_turtle`
--
CREATE DATABASE IF NOT EXISTS `wp_turtle` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `wp_turtle`;

-- --------------------------------------------------------

--
-- Table structure for table `biome`
--

CREATE TABLE `biome` (
  `biome_name` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `biome`
--

INSERT INTO `biome` (`biome_name`) VALUES
('Grass Lands'),
('Lake'),
('Ocean'),
('Plains'),
('Pond'),
('Swamp');

-- --------------------------------------------------------

--
-- Table structure for table `diet`
--

CREATE TABLE `diet` (
  `diet_id` int(10) UNSIGNED NOT NULL,
  `food_amount` decimal(4,2) NOT NULL,
  `water_amount` decimal(4,2) NOT NULL,
  `food_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diet`
--

INSERT INTO `diet` (`diet_id`, `food_amount`, `water_amount`, `food_name`) VALUES
(1, '25.00', '30.00', 'Marsh Mush'),
(2, '10.00', '20.00', 'Ocean BBQ'),
(3, '20.00', '10.00', 'Shell Food'),
(4, '25.00', '34.00', 'Seaweed Bites'),
(5, '12.00', '42.00', 'Diet Kelp'),
(6, '24.00', '35.00', 'Snapping Kibble');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_name` varchar(20) NOT NULL,
  `food_inventory` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_name`, `food_inventory`) VALUES
('Diet Kelp', 32),
('Marsh Mush', 25),
('Mello Lagoon', 65),
('Ocean BBQ', 12),
('Sea Side Sauttee', 45),
('Seaweed Bites', 76),
('Shell Food', 38),
('Snapping Kibble', 44);

-- --------------------------------------------------------

--
-- Table structure for table `habitat`
--

CREATE TABLE `habitat` (
  `habitat_room` char(4) NOT NULL,
  `habitat_name` char(35) NOT NULL,
  `average_temp` decimal(5,2) DEFAULT NULL,
  `average_humidity` decimal(5,2) DEFAULT NULL,
  `sqft` decimal(6,2) DEFAULT NULL,
  `biome_name` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `habitat`
--

INSERT INTO `habitat` (`habitat_room`, `habitat_name`, `average_temp`, `average_humidity`, `sqft`, `biome_name`) VALUES
('0001', 'Kelpy Islands', '1.00', '5.00', '200.00', 'Ocean'),
('0002', 'Turtle Towers', '20.00', '5.00', '200.00', 'Swamp'),
('0003', 'Clam Town', '10.00', '3.00', '200.00', 'Plains'),
('0004', 'Salty Shores', '34.00', '8.00', '200.00', 'Lake'),
('0005', 'Swampy Getaway', '42.00', '6.00', '200.00', 'Pond'),
('0006', 'Marsh Land', '56.00', '35.00', '200.00', 'Grass Lands');

-- --------------------------------------------------------

--
-- Table structure for table `species`
--

CREATE TABLE `species` (
  `species_name` varchar(30) NOT NULL,
  `average_size` decimal(6,2) NOT NULL,
  `average_weight` decimal(6,2) NOT NULL,
  `color` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `species`
--

INSERT INTO `species` (`species_name`, `average_size`, `average_weight`, `color`) VALUES
('Chicken Turtle', '9.00', '34.35', 'grey'),
('Mud Turtle', '4.00', '9.30', 'yellow'),
('Musk Turtle', '7.00', '48.00', 'black'),
('Painted Turtle', '6.00', '17.63', 'orange'),
('Pitted Shell Turtle', '22.00', '705.47', 'brown'),
('Pond Turtle', '9.00', '38.40', 'yellow'),
('Sea Turtles', '48.00', '6720.00', 'light-grey'),
('Snapping Turtle', '12.00', '368.00', 'brown'),
('Spotted Turtle', '4.50', '12.00', 'green'),
('Terrapin', '12.00', '8.50', 'grey'),
('Tortoise', '18.00', '384.00', 'grey'),
('Wood Turtle', '8.00', '40.00', 'brown');

-- --------------------------------------------------------

--
-- Table structure for table `turtle`
--

CREATE TABLE `turtle` (
  `turtle_id` int(10) UNSIGNED NOT NULL,
  `turtle_name` varchar(16) NOT NULL,
  `adoption_date` date NOT NULL,
  `weight` decimal(6,2) DEFAULT NULL,
  `size` decimal(5,2) DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT 'Male',
  `habitat_room` char(4) NOT NULL,
  `diet_id` int(10) UNSIGNED NOT NULL,
  `species_name` varchar(16) NOT NULL,
  `turtle_image` longblob DEFAULT NULL,
  `image_size` int(255) DEFAULT NULL,
  `image_type` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `turtle`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biome`
--
ALTER TABLE `biome`
  ADD PRIMARY KEY (`biome_name`);

--
-- Indexes for table `diet`
--
ALTER TABLE `diet`
  ADD PRIMARY KEY (`diet_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_name`);

--
-- Indexes for table `habitat`
--
ALTER TABLE `habitat`
  ADD PRIMARY KEY (`habitat_room`);

--
-- Indexes for table `species`
--
ALTER TABLE `species`
  ADD PRIMARY KEY (`species_name`);

--
-- Indexes for table `turtle`
--
ALTER TABLE `turtle`
  ADD PRIMARY KEY (`turtle_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
