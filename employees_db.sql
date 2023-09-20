-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2023 at 03:13 PM
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
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` varchar(6) NOT NULL,
  `seniority_rating_id` longtext DEFAULT NULL,
  `year_exp` longtext DEFAULT NULL,
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

INSERT INTO `employees` (`id`, `seniority_rating_id`, `year_exp`, `first_name`, `last_name`, `contact_number`, `email_address`, `date_of_birth`, `street_address`, `city`, `postal_code`, `country`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
('GX3826', '[\"1\"]', '[\"\"]', 'Win', 'Nkwi', '00000997582', 'inika@gmail.com', '2000-09-28', '11 lama', 'Fourways', '2196', 'Nambia', 'WN1234', '2023-09-20 12:10:31', NULL, NULL),
('OB5281', '[\"4\",\"1\"]', '[\"10\",\"2\"]', 'Winnie', 'Nkwinika', '0735997582', 'winnienkwinika@gmail.com', '2000-10-10', '2742 chestnut street', 'Fourways', '2196', 'South Africa', 'WN1234', '2023-09-20 12:04:58', NULL, NULL),
('NU2574', '[\"1\"]', '[\"1\"]', 'Yoza', 'Nkwinika', '231565646', 'yoza@gmail.com', '1920-09-17', '2742 chestnut street', 'Fourways', '2196', 'South Africa', 'WN1234', '2023-09-20 12:09:22', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD UNIQUE KEY `email_address` (`email_address`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
