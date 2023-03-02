-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2022 at 07:28 AM
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
-- Database: `wp_user`
--
CREATE DATABASE IF NOT EXISTS `wp_user` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `wp_user`;

-- --------------------------------------------------------

--
-- Table structure for table `new_user`
--

CREATE TABLE `new_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_fname` varchar(20) NOT NULL,
  `user_lname` varchar(20) NOT NULL,
  `user_phone` char(10) NOT NULL,
  `user_address` varchar(50) NOT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `creation_date` datetime NOT NULL DEFAULT current_timestamp(),
  `city` varchar(20) NOT NULL,
  `zip` char(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `state_id` char(2) NOT NULL,
  `admin_status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `new_user`
--

INSERT INTO `new_user` (`user_id`, `user_fname`, `user_lname`, `user_phone`, `user_address`, `user_email`, `creation_date`, `city`, `zip`, `username`, `password`, `state_id`, `admin_status`) VALUES
(3, 'Gwendolyn', 'Janela', '4064404606', '631 Meridian Road', 'GwendolynWJanela@gmail.com', '2022-12-08 13:08:40', 'Macon', '31204', 'GwendolynJanela83', '$2y$10$q9wDpohspynSl7pDVXyGfOQjq8a0ND/i/mk6o.Ilpb/S6hq1zR1vu', 'GA', 0),
(4, 'Edith', 'Cosme', '4065406455', '125 Swerve Street', 'EdithECosme@gmail.com', '2022-12-08 13:08:40', 'Bozeman', '59715', 'EdithCosme64', '$2y$10$thQGO/ZiR5HQc7X2nr63ZeDuStMzriMOImnevlnPBgcxyfxf90/Jq', 'MT', 0),
(5, 'Timi', 'Airlie', '4061641115', '753 Rundown Dr', 'TimiDAirlie@gmail.com', '2022-12-08 13:08:40', 'Denver', '80202', 'TimiAirlie80', '$2y$10$thQGO/ZiR5HQc7X2nr63ZeDuStMzriMOImnevlnPBgcxyfxf90/Jq', 'CO', 0),
(6, 'Jillian', 'Wetzel', '4064513232', '367 TurnCorner Ave', 'JillianRWetzel@gmail.com', '2022-12-08 13:08:40', 'Franklin', '37064', 'JillianWetzel67', '$2y$10$thQGO/ZiR5HQc7X2nr63ZeDuStMzriMOImnevlnPBgcxyfxf90/Jq', 'TN', 0),
(7, 'Riki', 'Marras', '4065545035', '981 RunRed Street', 'RikiEMarras@gmail.com', '2022-12-08 13:08:40', 'Charleston', '25301', 'RikiMarras39', '$2y$10$thQGO/ZiR5HQc7X2nr63ZeDuStMzriMOImnevlnPBgcxyfxf90/Jq', 'WV', 0),
(8, 'Rosabella', 'Chretien', '4063234226', '186 Jump Street', 'RosabellaBChretien@gmail.com', '2022-12-08 13:08:40', 'Harrisonburg', '22801', 'RosabellaChretien25', '$2y$10$thQGO/ZiR5HQc7X2nr63ZeDuStMzriMOImnevlnPBgcxyfxf90/Jq', 'VA', 0),
(9, 'Ursala', 'Cardinal', '4062056245', '987 Calabrim Highway', 'UrsalaDCardinal@gmail.com', '2022-12-08 13:08:40', 'Ocoee', '34761', 'UrsalaCardinal50', '$2y$10$thQGO/ZiR5HQc7X2nr63ZeDuStMzriMOImnevlnPBgcxyfxf90/Jq', 'FL', 0),
(10, 'Cilka', 'Carolin', '4063124610', '782 TooLate Ave NW', 'CilkaBCarolin@gmail.com', '2022-12-08 13:08:40', 'New Berlin', '53146', 'CilkaCarolin91', '$2y$10$thQGO/ZiR5HQc7X2nr63ZeDuStMzriMOImnevlnPBgcxyfxf90/Jq', 'WI', 0),
(11, 'Karel', 'Lucier', '4062350122', '983 Factory Way', 'KarelTLucier@gmail.com', '2022-12-08 13:08:40', 'Anchorage', '99501', 'KarelLucier76', '$2y$10$thQGO/ZiR5HQc7X2nr63ZeDuStMzriMOImnevlnPBgcxyfxf90/Jq', 'AK', 0),
(12, 'Athena', 'Tori', '4065425303', '245 Left Dr', 'AthenaGTori@gmail.com', '2022-12-08 13:08:40', 'Thornton', '80229', 'AthenaTori32', '$2y$10$thQGO/ZiR5HQc7X2nr63ZeDuStMzriMOImnevlnPBgcxyfxf90/Jq', 'CO', 0),
(13, 'Rene', 'Higinbotham', '4063430414', '573 Boxed In Street', 'ReneKHiginbotham@gmail.com', '2022-12-08 13:08:40', 'Wilmington', '19801', 'ReneHiginbotham45', '$2y$10$thQGO/ZiR5HQc7X2nr63ZeDuStMzriMOImnevlnPBgcxyfxf90/Jq', 'DE', 0),
(32, 'Admin', 'User', '5555555555', '302 Ave W E', 'AU@gmail.com', '2022-12-09 22:43:52', 'Norville', '48652', 'Admin_User', '$2y$10$StFjJrqrhSOBP7pIvlJKCuyS2nwPgyfUV1kTqgztKZTY6FlHFGC/K', 'GU', 1);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` char(2) NOT NULL,
  `state_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state_name`) VALUES
('AK', 'Alaska'),
('AL', 'Alabama'),
('AR', 'Arkansas'),
('AS', 'American Samoa'),
('AZ', 'Arizona'),
('CA', 'California'),
('CO', 'Colorado'),
('CT', 'Connecticut'),
('DC', 'District Of Columbia'),
('DE', 'Delaware'),
('FL', 'Florida'),
('FM', 'Federated States Of Micronesia'),
('GA', 'Georgia'),
('GU', 'Guam'),
('HI', 'Hawaii'),
('IA', 'Iowa'),
('ID', 'Idaho'),
('IL', 'Illinois'),
('IN', 'Indiana'),
('KS', 'Kansas'),
('KY', 'Kentucky'),
('LA', 'Louisiana'),
('MA', 'Massachusetts'),
('MD', 'Maryland'),
('ME', 'Maine'),
('MH', 'Marshall Islands'),
('MI', 'Michigan'),
('MN', 'Minnesota'),
('MO', 'Missouri'),
('MP', 'Northern Mariana Islands'),
('MS', 'Mississippi'),
('MT', 'Montana'),
('NC', 'North Carolina'),
('ND', 'North Dakota'),
('NE', 'Nebraska'),
('NH', 'New Hampshire'),
('NJ', 'New Jersey'),
('NM', 'New Mexico'),
('NV', 'Nevada'),
('NY', 'New York'),
('OH', 'Ohio'),
('OK', 'Oklahoma'),
('OR', 'Oregon'),
('PA', 'Pennsylvania'),
('PR', 'Puerto Rico'),
('PW', 'Palau'),
('RI', 'Rhode Island'),
('SC', 'South Carolina'),
('SD', 'South Dakota'),
('TN', 'Tennessee'),
('TX', 'Texas'),
('UT', 'Utah'),
('VA', 'Virginia'),
('VI', 'Virgin Islands'),
('VT', 'Vermont'),
('WA', 'Washington'),
('WI', 'Wisconsin'),
('WV', 'West Virginia'),
('WY', 'Wyoming');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `new_user`
--
ALTER TABLE `new_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `fk_state` (`state_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `new_user`
--
ALTER TABLE `new_user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `new_user`
--
ALTER TABLE `new_user`
  ADD CONSTRAINT `fk_state` FOREIGN KEY (`state_id`) REFERENCES `state` (`state_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
