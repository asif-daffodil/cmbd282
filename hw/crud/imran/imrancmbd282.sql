-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2025 at 02:09 AM
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
-- Database: `cmbd282`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `create_at`) VALUES
(1, 'iPhone', '2025-02-20 17:35:48'),
(2, 'Samsung', '2025-02-20 17:38:45'),
(3, 'DELL', '2025-02-20 17:38:45'),
(4, 'Walton', '2025-02-20 17:38:45'),
(5, 'Vision', '2025-02-20 17:38:45');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_items` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_items`, `total_amount`, `create_at`) VALUES
(1, 1, 4, 266000, '2025-02-20 21:33:25');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `status` enum('pending','shifted','Delivered','returned','finished') NOT NULL DEFAULT 'pending',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `total_amount`, `status`, `create_at`) VALUES
(1, 1, 1, 2, 180000, 'pending', '2025-02-20 21:46:55'),
(2, 1, 4, 2, 86000, 'pending', '2025-02-20 21:55:49');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `manufacture_date` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `brand_id`, `manufacture_date`, `created_at`) VALUES
(1, 'Samsung S23 Ultra ', 90000, 2, '15-04-2024', '2025-02-20 17:44:43'),
(2, '16 Pro Max', 180000, 1, '17-Sep-2025', '2025-02-20 18:59:19'),
(3, 'Macbook Pro', 125000, 3, '21 February 2025', '2025-02-20 19:05:48'),
(4, 'Walton TV', 43000, 4, '2025-02-21', '2025-02-20 19:09:36'),
(23, 'JAMUNA FAN F2', 7000, 5, '21 February 2025', '2025-02-20 20:05:22');

-- --------------------------------------------------------

--
-- Table structure for table `usercheck`
--

CREATE TABLE `usercheck` (
  `id` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usercheck`
--

INSERT INTO `usercheck` (`id`, `userName`, `create_at`) VALUES
(1, 'Imran Chowdhury', '2025-02-25 20:06:45'),
(2, 'Imran2025', '2025-02-25 20:07:55'),
(4, 'Imrans Macbook User', '2025-02-25 20:21:28'),
(14, 'Rose Dawson', '2025-02-25 20:42:14'),
(15, 'imran chow', '2025-02-25 21:33:37'),
(17, 'Imran 2025', '2025-03-03 17:32:44'),
(18, 'Imran 25', '2025-03-05 13:44:43'),
(19, 'Imran 20255', '2025-03-06 05:26:22'),
(20, 'Jack Dawson', '2025-03-06 06:02:35'),
(21, 'Jack Dawson2', '2025-03-06 06:03:07'),
(22, 'Rose Dousen', '2025-03-06 06:05:05'),
(23, 'Link3', '2025-03-06 06:05:55'),
(24, 'Link3 Tech', '2025-03-06 06:06:20'),
(25, 'Macbook Pro', '2025-03-06 06:24:09'),
(26, 'Macbook Pro', '2025-03-06 06:28:55'),
(27, 'Biman Bangladesh', '2025-03-06 06:29:14'),
(28, 'Biman Bangladesh', '2025-03-06 06:29:37'),
(29, 'Fly Dubai', '2025-03-06 06:29:49'),
(30, 'Etihad Airlines', '2025-03-06 06:31:44'),
(31, 'Sheikh Maaktom', '2025-03-06 12:38:31'),
(32, 'Sheikh Zayed', '2025-03-06 12:38:41'),
(33, 'Sheikh Khalifaa', '2025-03-06 12:38:53'),
(34, 'Sheikh Nahiyaan', '2025-03-06 12:39:05'),
(35, 'Prince Hamza', '2025-03-06 12:39:15'),
(36, 'Sheikha Maheraa', '2025-03-06 12:39:30'),
(37, 'Sultan Kabuj', '2025-03-06 12:40:59'),
(38, 'Badsha Salman', '2025-03-06 12:41:11'),
(39, 'Abdul bin Aziz', '2025-03-06 12:41:24'),
(40, 'DXB Airport', '2025-03-06 12:41:41'),
(41, 'Zayed International Airport', '2025-03-06 12:41:55'),
(42, 'Sharjah International Airport', '2025-03-06 12:42:25'),
(43, 'Air Arabia Airlines', '2025-03-06 12:42:35'),
(44, 'Emirates A380', '2025-03-06 12:42:57'),
(45, 'Fly Swiss', '2025-03-06 12:43:15'),
(46, 'Air Canada', '2025-03-06 12:43:25'),
(47, 'Novo Airways', '2025-03-06 12:43:52'),
(48, 'Us Bangla Airlines', '2025-03-06 12:44:01'),
(49, 'Air Astra', '2025-03-06 12:44:17'),
(50, 'Hongkong Airlines', '2025-03-06 12:44:35'),
(51, 'SpiceJet Airlines', '2025-03-06 12:45:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` enum('male','female','others','') NOT NULL DEFAULT 'others',
  `dob` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `role` enum('admin','user') DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `country` varchar(100) NOT NULL,
  `zipCode` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `password`, `gender`, `dob`, `city`, `role`, `address`, `country`, `zipCode`, `mobile`, `create_at`) VALUES
(1, 'Nurislam', 'Imran', 'example@gmail.com', '$2y$10$lJT7VmGpNV7A5MxNXcGUH.EiTU4NpH2lbqHwgfLsrCmCoyZaZMOIu', 'male', '03-july-1996', 'Dhaka', 'user', 'Dhaka, Bangladesh', 'Bangladesh', '1212', '01871676995', '2025-02-20 16:01:48'),
(3, 'Karimul', 'Haque', 'razib2025@gmail.com', '$2y$10$wLz4hLiRdcN/4K2gITJ9temux51ZpuDp91KoRKcsIwwcGRJST5xfm', 'male', '13-february-1998', 'Dhaka', 'user', 'Uttara 04 , Dhaka', 'Bangladesh ', '1200', '01849943920', '2025-02-20 17:10:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `usercheck`
--
ALTER TABLE `usercheck`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `usercheck`
--
ALTER TABLE `usercheck`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
