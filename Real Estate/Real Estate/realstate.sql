-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2024 at 10:26 AM
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
-- Database: `realstate`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminsignup`
--

CREATE TABLE `adminsignup` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminsignup`
--

INSERT INTO `adminsignup` (`username`, `password`) VALUES
('rizwan', '$2y$10$dxwc/yiTtNz.YomN.GN5AOH'),
('hamza', '$2y$10$Nh50AGndt0k5a.UOWybYoOQ'),
('Hamza', 'asd'),
('new', '123'),
('newuser', '123');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(20) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`name`, `email`, `phone`, `message`) VALUES
('hamza hamza', 'hamzaakbar418@gmail.com', 2147483647, 'a'),
('hamza hamza', 'hamzaakbar418@gmail.com', 2147483647, 'a'),
('Hamza Akbar', 'hamzaakbar418@gmail.com', 2147483647, 'asd'),
('rizwan akbar', 'hamzaakbar418@gmail.com', 2147483647, 'asd'),
('rizwan akbar', 'hamzaakbar418@gmail.com', 2147483647, 'asd'),
('rizwan akbar', 'hamzaakbar418@gmail.com', 2147483647, 'asd'),
('rizwan akbar', 'hamzaakbar418@gmail.com', 2147483647, 'asd'),
('Hamza Akbar', 'hamzaakbar418@gmail.com', 2147483647, 'a'),
('Hamza Akbar', 'hamzaakbar418@gmail.com', 2147483647, 'asd'),
('Hamza Akbar', 'hamzaakbar418@gmail.com', 2147483647, '123');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(30) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` int(30) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `title`, `price`, `description`, `image`) VALUES
(18, ' Modern Loft in the Arts District', 250000, 'A stylish loft apartment located in the vibrant arts district. This modern space features high ceilings, large windows, and exposed brick walls, offering an urban-chic living experience.', 'uploads/home.png'),
(19, ' Luxury Penthouse with Panoramic Views', 1500000, 'Experience luxury living at its finest in this stunning penthouse. With floor-to-ceiling windows offering breathtaking panoramic views of the city skyline, this spacious residence boasts unparalleled elegance and sophistication.', 'uploads/building.png'),
(20, 'Spacious House with Ocean View', 2000000, 'Embrace coastal living in this stunning villa overlooking the ocean. With expansive indoor and outdoor living spaces, this property offers the perfect blend of luxury and relaxation, making it an ideal retreat for those seeking tranquility by the sea.', 'uploads/house.png');

-- --------------------------------------------------------

--
-- Table structure for table `usersignup`
--

CREATE TABLE `usersignup` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usersignup`
--

INSERT INTO `usersignup` (`username`, `password`) VALUES
('hamza', '123'),
('Muhammad Umair Shabbir', '123456'),
('zulkuaful sumra', 'm1o2o3n4'),
('mohsin', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
