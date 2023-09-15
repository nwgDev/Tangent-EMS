-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2023 at 05:03 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(6) NOT NULL,
  `activity_description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` varchar(6) NOT NULL,
  `seniority_rating_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `street_address` varchar(100) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `postal_code` varchar(10) NOT NULL,
  `country` varchar(50) NOT NULL,
  `created_by` varchar(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(6) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `seniority_rating_id`, `first_name`, `last_name`, `contact_number`, `email_address`, `date_of_birth`, `street_address`, `city`, `postal_code`, `country`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
('DT9204', 1, 'Winnie', 'Nkwinika', '+27735997582', 'winnienkwinika@gmail.com', '0000-00-00', '2742 chestnut street', 'Fourways', '2196', 'South Africa', '0', '2023-09-13 20:32:42', NULL, NULL),
('GS6340', 1, 'Winnie', 'Nkwinika', '+27735997582', 'winnienkwinika@gmkljlkail.com', '0000-00-00', '2742 chestnut street', 'Fourways', '2196', 'South Africa', 'WN1234', '2023-09-15 02:23:22', NULL, NULL),
('MD7183', 2, 'Winnie', 'Nkwinika', '+27735997582', 'winniesdfgfgnkdasdfsffgdgwinika@gmfgail.co.za', '2023-09-14', '2742 chestnut street', 'Fourways', '2196', 'South Africa', 'WN1234', '2023-09-14 06:33:12', NULL, NULL),
('NB2615', 2, 'Winnie', 'Nkwinika', '+27735997582', 'winniesdfgfgnkdfgdgwinika@gmfgail.co.za', '2023-09-14', '2742 chestnut street', 'Fourways', '2196', 'South Africa', 'WN1234', '2023-09-14 06:30:06', NULL, NULL),
('OE3689', 2, 'Winnie', 'Nkwinika', '+27735997582', 'winniesasdassasaddfgfgnkdasdfsffgdgwinika@gmfgail.co.za', '2023-09-14', '2742 chestnut street', 'Fourways', '2196', 'South Africa', 'WN1234', '2023-09-14 06:33:30', NULL, NULL),
('OL1940', 2, 'Winnie', 'Nkwinika', '+27735997582', 'winnienkdfgdgwinika@gmfgail.co.za', '2023-09-14', '2742 chestnut street', 'Fourways', '2196', 'South Africa', 'WN1234', '2023-09-14 06:28:53', NULL, NULL),
('OL4127', 2, 'Winnie', 'Nkwinika', '+27735997582', 'winnienkwinika@gmail.co.za', '2023-09-14', '2742 chestnut street', 'Fourways', '2196', 'South Africa', 'WN1234', '2023-09-14 06:25:46', NULL, NULL),
('OQ8407', 1, 'Winnie', 'Nkwinika', '+27735997582', 'winnienkwinika@gmail.comllll', '2000-01-15', '2742 chestnut street', 'Fourways', '2196', 'South Africa', 'WN1234', '2023-09-15 02:56:08', NULL, NULL),
('OR4083', 1, 'Winnie', 'Nkwinika', '+27735997582', 'win@gg.com', '0000-00-00', '2742 chestnut street', 'Fourways', '2196', 'South Africa', 'WN1234', '2023-09-14 07:32:49', NULL, NULL),
('PO1578', 1, 'Winnie', 'Nkwinika', '+27735997582', 'winnienkwinika@dffdgmkljlkail.com', '0000-00-00', '2742 chestnut street', 'Fourways', '2196', 'South Africa', 'WN1234', '2023-09-15 02:31:03', NULL, NULL),
('RD6437', 2, 'Winnie', 'Nkwinika', '+27735997582', 'winnienkwinika@gmfgail.co.za', '2023-09-14', '2742 chestnut street', 'Fourways', '2196', 'South Africa', 'WN1234', '2023-09-14 06:27:38', NULL, NULL),
('WN1234', 1, 'Winnie', 'Nkwinika', '0730000000', 'winnie@devinnie.co.za', '1990-09-17', '123 Llama street', 'Johannesburg', '2302', 'South Africa', '1', '2023-09-13 07:45:10', NULL, NULL),
('YW9058', 1, 'Winnie', 'Nkwinika', '+27735997582', 'winnienkwjkljjinika@dffdgmkljlkail.com', '2050-09-14', '2742 chestnut street', 'Fourways', '2196', 'South Africa', 'WN1234', '2023-09-15 02:33:12', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_skills`
--

CREATE TABLE `employee_skills` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `skills` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`skills`)),
  `created_by` varchar(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(6) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seniority_ratings`
--

CREATE TABLE `seniority_ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seniority_ratings`
--

INSERT INTO `seniority_ratings` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Junior'),
(3, 'Intermediate'),
(4, 'Senior');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_address` (`email_address`),
  ADD KEY `seniority_rating_id_fk` (`seniority_rating_id`);

--
-- Indexes for table `seniority_ratings`
--
ALTER TABLE `seniority_ratings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seniority_ratings`
--
ALTER TABLE `seniority_ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`seniority_rating_id`) REFERENCES `seniority_ratings` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
