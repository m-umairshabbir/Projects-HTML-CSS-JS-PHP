-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2024 at 07:02 AM
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
-- Database: `finance_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `balance` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `balance`) VALUES
(1, 6762.00);

-- --------------------------------------------------------

--
-- Table structure for table `budgets`
--

CREATE TABLE `budgets` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `budgets`
--

INSERT INTO `budgets` (`id`, `category`, `amount`) VALUES
(1, 'groceries', 280.00),
(8, 'bills', 2007.00),
(9, 'entertainment', 1845.00),
(10, 'savings', 1100.00),
(11, 'travel', 1280.00),
(13, 'sports', 250.00);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `transactionDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `itemName`, `category`, `amount`, `transactionDate`) VALUES
(1, 'Basket', 'groceries', 40.00, '2024-05-29 16:29:15'),
(2, 'Groceries', 'Food', 50.00, '2024-05-29 16:49:47'),
(3, 'Entertainment', 'Leisure', 25.00, '2024-05-29 16:50:16'),
(4, 'Entertainment', 'Leisure', 25.00, '2024-05-29 16:52:04'),
(5, 'Entertainment', 'Leisure', 25.00, '2024-05-29 16:52:19'),
(6, 'SNLGP Gas', 'bills', 2243.00, '2024-05-29 19:36:38'),
(7, 'Football', 'sports', 1550.00, '2024-05-29 21:13:58'),
(8, 'Kawali Night', 'entertainment', 700.00, '2024-05-29 21:15:54'),
(9, 'Shaddrah velly Trip', 'travel', 720.00, '2024-05-29 21:17:46'),
(10, 'Pasha Istambol', 'entertainment', 1860.00, '2024-05-29 21:20:49'),
(11, 'sadka', 'savings', 500.00, '2024-05-29 21:23:01'),
(12, 'Cricket Bat', 'sports', 200.00, '2024-05-29 21:29:36'),
(13, 'Main Market', 'entertainment', 320.00, '2024-05-29 21:43:37'),
(14, 'Pasha Istambol', 'entertainment', 300.00, '2024-05-29 22:32:02'),
(15, 'wifi bill', 'bills', 800.00, '2024-05-31 06:15:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'Muhammad Umair Shabbir', 'theumair3191@gmail.com', '$2y$10$u7Z68XJpSfkcb2oL6AlDn.b/wHc80mdM86yykN0kvjjc5Hszvfr/2', '2024-05-28 19:58:29'),
(15, 'Magnus', 'husteler5@gmail.com', '$2y$10$wFVX2SnraZRjvmUidKcKaeqjFj906HvBnt88Zt3YXk.Q/r9kMHYxC', '2024-05-30 09:40:41'),
(16, 'Mohsin Ali', 'mohsinAli@gmail.com', '$2y$10$qfC61RsdSOFghAvJ0e9ni.lPdN15hyd60pS8zc76BFr4nQ2I8lIDK', '2024-05-30 11:10:03'),
(17, 'alphauser', 'alpha@gmail.com', '$2y$10$hVZoh/WEQOfeuZEyzmmEkuV.GMFKZ5.L6Xptxp5hz71ay62yl7r5u', '2024-05-31 06:03:40'),
(18, 'alphaUser', 'alpha123@gmail.com', '$2y$10$5C4GQQL.9Yo2rRZ3ZR35eOnMoBtRiFBnybx5aEg9qTOuDTA1Y7lh2', '2024-05-31 06:13:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `budgets`
--
ALTER TABLE `budgets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category` (`category`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `budgets`
--
ALTER TABLE `budgets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
