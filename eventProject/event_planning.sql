-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2024 at 09:14 PM
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
-- Database: `event_planning`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `event_location` varchar(255) NOT NULL,
  `event_description` text NOT NULL,
  `event_poster` varchar(255) NOT NULL,
  `ticket_price` decimal(10,2) NOT NULL,
  `total_tickets` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `event_date`, `event_time`, `event_location`, `event_description`, `event_poster`, `ticket_price`, `total_tickets`) VALUES
(2, 'Arjit Singh', '2024-06-03', '20:30:00', 'Burj Khalifa', 'heartbrokingEvent', 'uploads/arjit.jpg', 1500.00, 900),
(3, 'FareWell', '2024-06-17', '08:12:00', 'Arid University', 'Welcome farewell for new batch Students', 'uploads/black.jpg', 0.00, 700),
(4, 'Sidhu\'s Tribute', '2024-06-15', '19:48:00', 'Mumbai', 'tribute to the legend ', 'uploads/sidhu (1).jpg', 0.00, 0),
(5, 'AP Dhillon', '2024-07-11', '04:19:00', 'Washington', 'mega event ', 'uploads/apdhillon.jpg', 1100.00, 300),
(6, 'Singer Talha Anjum', '2024-07-05', '21:45:00', 'Sadar Rawalpindi', 'Art Council', 'uploads/youngStunners.jpg', 1000.00, 500);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `buyer_name` varchar(100) DEFAULT NULL,
  `buyer_email` varchar(100) DEFAULT NULL,
  `number_of_tickets` int(11) DEFAULT NULL,
  `purchase_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `event_id`, `buyer_name`, `buyer_email`, `number_of_tickets`, `purchase_date`) VALUES
(1, 2, 'Muhammad Umair Shabbir', 'theumair3191@gmail.com', 15, '2024-06-01 18:08:37'),
(2, 3, 'Hamza Akbar', 'hamzaakbar418@gmail.com', 3, '2024-06-01 18:22:23'),
(3, 3, 'Hamza Akbar', 'hamzaakbar418@gmail.com', 3, '2024-06-01 18:26:49'),
(4, 3, 'Hamza Akbar', 'hamzaakbar418@gmail.com', 3, '2024-06-01 18:28:13'),
(5, 6, 'Mohsin ali', 'mohsin123@gmail.com', 10, '2024-06-01 18:57:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`) VALUES
(2, 'theumair3191', '$2y$10$CORwvbBhjVRYhcjkAvmVZuYKeh0c5V6EuOtH.Ra4To8lSFD/jiRv2', 'user', '2024-06-01 15:57:01'),
(4, 'admin', '$2y$10$U/XVLpnoG2xjEi.CxOqjUeTdKdOMJiVrzzX/t6vjWpq1yRvZ55Ks.', 'admin', '2024-06-01 16:27:40'),
(7, 'admin@', '$2y$10$.7bppBzywwonuKV2VFUJtejRZQTuQF2Z9HrBvZ0nZehZPayhTZynO', 'admin', '2024-06-01 16:33:59'),
(8, 'hamzaakbar', '$2y$10$EtjPohKMV2.9lSa8tJcU6uNmEkXjSYW9XBWxb3esCXht.4yv.bIVe', 'user', '2024-06-01 16:38:48'),
(9, 'mughal123', '$2y$10$Y6rygfoHS.lLsHkBTx0tFevfkCmMgq4Iq3FV4NFz9keLkYCrUezu2', 'admin', '2024-06-01 17:11:09'),
(10, 'alphauser', '$2y$10$QDh7uq8oi7kOGufPgLrn/u/yhf.BFxyeU.dOMel5DQkBs2C9xtSTK', 'admin', '2024-06-01 19:01:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
