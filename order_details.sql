-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2023 at 03:49 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eatery`
--

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `base_amount` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `item_name`, `base_amount`, `quantity`, `total_price`) VALUES
(1, 1, 'Chicken Burger', '75', '1', '75'),
(2, 1, 'Singara', '5', '4', '20'),
(3, 2, 'Singara', '5', '15', '60'),
(4, 3, 'Chicken Burger', '75', '1', '75'),
(5, 3, 'Singara', '5', '4', '20'),
(6, 3, 'Pasta', '125', '1', '125');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
