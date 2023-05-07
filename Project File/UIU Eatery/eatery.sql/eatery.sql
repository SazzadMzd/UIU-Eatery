-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2023 at 10:33 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(4, 'admin', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `customer_id` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `base_price` int(255) NOT NULL,
  `quantity` int(255) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`customer_id`, `user_type`, `restaurant_id`, `item_name`, `base_price`, `quantity`) VALUES
('student2', 'student', 17, 'Chicken patties', 55, 1),
('faculty2', 'faculty', 17, 'Chicken Biryani', 110, 1),
('faculty2', 'faculty', 17, 'Chicken Burger', 75, 1),
('011183003', 'student', 17, 'Meat Box', 120, 1);

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`id`, `type`, `user_id`, `remarks`) VALUES
(2, 'student', 'student2', 'I have a complaint\r\n'),
(3, 'faculty', 'faculty3', 'I have a complaint as a faculty'),
(4, 'faculty', 'faculty2', 'i am giving second complaint...'),
(5, 'faculty', 'faculty2', 'abcdef'),
(6, 'faculty', 'faculty2', 'before update complaint'),
(7, 'student', 'student2', 'ghgsgsghsdvg'),
(8, 'faculty', 'faculty2', 'The delivery was slow ');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `room_no` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_username`, `password`, `room_no`, `email`, `phone_no`) VALUES
('faculty', '1234', 0, '', 0),
('faculty2', '81dc9bdb52d04dc20036dbd8313ed055', 232, 'faculty2@gmail.com', 192222222),
('faculty3', '81dc9bdb52d04dc20036dbd8313ed055', 232, 'aaaa', 123);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `restaurant_id` int(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `stock` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`restaurant_id`, `item_name`, `stock`, `price`, `image`) VALUES
(17, 'Beef Burger', 145, 110, '../images/food_items/bur2.jpg'),
(17, 'Chicken Biryani', 43, 110, '../images/food_items/chickenbiry.jpg'),
(17, 'Chicken Burger', 14, 75, '../images/food_items/burg1.jpg'),
(17, 'Chicken patties', 11, 55, '../images/food_items/chckpat.jpg'),
(17, 'Chicken Wrap', 34, 60, '../images/food_items/veg roll.jpg'),
(17, 'Chowmin', 76, 45, '../images/food_items/chowmin2.jpg'),
(17, 'Fried Chicken', 43, 65, '../images/food_items/friedchicken2.jpg'),
(17, 'fried rice', 62, 70, '../images/food_items/friedrice1.jpg'),
(17, 'khichuri', 45, 50, '../images/food_items/kichu1.jpg'),
(17, 'Meat Box', 31, 120, '../images/food_items/meatb.jpg'),
(17, 'Paratha with bhaji', 23, 40, '../images/food_items/paratha with vegeta.jpg'),
(17, 'Pizza', 35, 50, '../images/food_items/pi.jpg'),
(17, 'Sandwich', 24, 45, '../images/food_items/san2.jpg'),
(17, 'Shwarma', 54, 70, '../images/food_items/shawarma.jpg'),
(17, 'Singara', 12, 5, '../images/food_items/singara.jpg'),
(17, 'Softdrink (Coke)', 47, 25, '../images/food_items/coke1.jpg'),
(17, 'Softdrink (Fanta)', 37, 25, '../images/food_items/fanta.jpg'),
(17, 'Softdrink (Sprite)', 29, 25, '../images/food_items/spri.jpg'),
(17, 'Thai Soup', 34, 60, '../images/food_items/thaisoup.jpg'),
(17, 'Vegetable Soup', 35, 40, '../images/food_items/vegsoup.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` int(11) NOT NULL DEFAULT 0 COMMENT '0=pending | 1=confirm',
  `restaurant_name` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `receiving_method` varchar(255) NOT NULL,
  `read_status` int(11) DEFAULT 0 COMMENT '0 = notification not seen | 1 = Seen Notifications'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `order_date`, `order_status`, `restaurant_name`, `user_type`, `payment_method`, `receiving_method`, `read_status`) VALUES
(1, 'student2', '2023-04-12 19:52:21', 1, 'khans kitchen', 'student', 'COD', 'PICKUP', 1),
(2, 'student2', '2023-05-03 01:46:04', 1, 'khans kitchen', 'student', 'COD', 'Delivery', 1),
(3, 'student2', '2023-04-12 19:53:57', 1, 'khans kitchen', 'student', 'COD', 'PICKUP', 1),
(10, 'student2', '2023-05-03 01:45:57', 1, 'khans kitchen', 'student', 'Bkash', 'Delivery', 1),
(11, 'student2', '2023-05-03 01:41:38', 0, 'khans kitchen', 'student', 'Nagad', 'Delivery', 0),
(12, '011183003', '2023-05-03 01:51:55', 0, 'khans kitchen', 'student', 'Bkash', 'Delivery', 1),
(13, '011183003', '2023-05-03 01:54:02', 1, 'khans kitchen', 'student', 'Bkash', 'Delivery', 1),
(14, '011183003', '2023-05-03 01:54:05', 1, 'khans kitchen', 'student', 'Nagad', 'Pickup', 1),
(15, '011183003', '2023-05-03 01:54:04', 1, 'khans kitchen', 'student', 'Bkash', 'Delivery', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `item_name`, `base_amount`, `quantity`, `total_price`) VALUES
(1, 1, 'Chicken Burger', '75', '1', '75'),
(2, 1, 'Singara', '5', '4', '20'),
(3, 2, 'Singara', '5', '15', '60'),
(4, 3, 'Chicken Burger', '75', '1', '75'),
(8, 10, 'Chicken Burger', '75', '1', '75'),
(9, 10, 'Chicken patties', '55', '1', '55'),
(10, 11, 'Meat Box', '120', '1', '120'),
(11, 13, 'Chicken Biryani', '110', '2', '220'),
(12, 14, 'Meat Box', '120', '1', '120'),
(13, 15, 'fried rice', '70', '5', '350');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `restaurant_id` int(255) NOT NULL,
  `status` varchar(255) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`email`, `password`, `restaurant_id`, `status`) VALUES
('3@gmail.com', '202cb962ac59075b964b07152d234b70', 23, 'accepted'),
('aaa@gmail.com', '202cb962ac59075b964b07152d234b70', 24, 'accepted'),
('abc@gmail.com', '202cb962ac59075b964b07152d234b70', 18, 'accepted'),
('bikrampur@gmail.com', '202cb962ac59075b964b07152d234b70', 19, 'accepted'),
('khans@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 17, 'accepted'),
('plate@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 27, 'pending'),
('sad@gmail.com', '202cb962ac59075b964b07152d234b70', 21, 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `review` varchar(255) NOT NULL,
  `rating` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`id`, `customer_id`, `user_type`, `restaurant_id`, `review`, `rating`) VALUES
(1, 'student2', 'student', 17, 'Food quality was not good enough', 3.3),
(2, '11191120', 'student', 17, 'Chicken Burger was good', 5),
(3, '11191120', 'student', 17, 'Good', 4),
(5, 'student2', 'student', 17, 'Epic', 4.5),
(6, 'student2', 'student', 17, 'Delicious food, great service, cozy atmosphere.', 4.5),
(8, 'student2', 'student', 17, 'good', 0),
(9, '011183003', 'student', 17, 'Burger was good', 0),
(10, 'faculty2', 'faculty', 18, 'Food quality was not good enough', 2.4),
(11, 'faculty2', 'faculty', 18, 'Pizza was great!', 0),
(12, 'faculty2', 'faculty', 19, 'Good quality', 4.4),
(13, 'faculty2', 'faculty', 21, 'Dough of singara was hard.', 0),
(14, 'faculty2', 'faculty', 24, 'Delicious food, great service, cozy atmosphere.', 0),
(15, 'faculty2', 'faculty', 24, 'Delicious food, great service, cozy atmosphere.', 4.3),
(16, 'faculty2', 'faculty', 21, 'Delicious food, great service, cozy atmosphere.', 4.5);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `restaurant_id` int(255) NOT NULL,
  `restaurant_name` varchar(255) NOT NULL,
  `img_dir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`restaurant_id`, `restaurant_name`, `img_dir`) VALUES
(17, 'khans kitchen', '../images/restuarant_image/rest6eatery.jpg'),
(18, 'Olympia', '../images/restuarant_image/rest4eatery.jpg'),
(19, 'Bikrampurs Khan', '../images/restuarant_image/foodpic.png'),
(21, 'SAD restaurant', '../images/restuarant_image/rest3eatery.jpg'),
(24, 'Sheebly\'s Kitchen', '../images/restuarant_image/rest6eatery.jpg'),
(27, 'Plate & Palate', '../images/restuarant_image/tttttttress.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `password`, `email`, `phone_no`) VALUES
('011183003', '81dc9bdb52d04dc20036dbd8313ed055', 'st2@gmail.com', 1833333333),
('11122', '81dc9bdb52d04dc20036dbd8313ed055', '1111', 222),
('11191120', '81dc9bdb52d04dc20036dbd8313ed055', '120@gmail.com', 1623),
('student3', '81dc9bdb52d04dc20036dbd8313ed055', '3@ggg', 123);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_username`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`restaurant_id`,`item_name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`email`),
  ADD KEY `restaurant_id` (`restaurant_id`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`restaurant_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `restaurant_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
