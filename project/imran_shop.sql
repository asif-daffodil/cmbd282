-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2025 at 07:53 PM
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
-- Database: `imran_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `regular_price` int(11) NOT NULL,
  `sale_price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `regular_price`, `sale_price`, `image`, `category_id`, `created_at`) VALUES
(1, 'Lanavo Laptop 2568', 60000, 55000, '68262c23ea0ec9.87889575.jpg', 8, '2025-05-15 18:02:11'),
(2, 'HP Laptop hotpink', 70000, 55000, '68262ca7b005e4.76964500.jpg', 8, '2025-05-15 18:04:23'),
(4, 'Oppo mobile', 60000, 450000, '682b5e741783f8.94329853.jpg', 4, '2025-05-19 16:38:12'),
(5, 'Oppo', 35000, 25000, '682b5ef5390241.26500432.jpeg', 4, '2025-05-19 16:40:21'),
(6, 'jbl Headphone 5565', 5000, 4000, '682b5f3f6fbdd6.12714588.jpg', 6, '2025-05-19 16:41:35'),
(7, 'Mycandy Headphone 5645', 60000, 40000, '682b5f7d3204d9.88232917.jpg', 6, '2025-05-19 16:42:37'),
(9, 'mycandy airpods tws 125', 16000, 15000, '682b604364b262.04980956.jpg', 6, '2025-05-19 16:45:55'),
(10, 'Mic - 1', 50000, 6000, '682b609f6fcf66.34982834.jpg', 2, '2025-05-19 16:47:27'),
(11, 'Mic-2', 6525, 5466, '682b60b5331087.39106936.png', 2, '2025-05-19 16:47:49'),
(12, 'Mic - 30', 9875, 6600, '682b60cd828b23.20468066.jpg', 2, '2025-05-19 16:48:13');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `created_at`) VALUES
(1, 'Sports', '2025-05-12 17:54:46'),
(2, 'Electronics', '2025-05-12 17:55:10'),
(3, 'Car', '2025-05-12 17:55:25'),
(4, 'Mobile', '2025-05-12 17:55:30'),
(5, 'Computer', '2025-05-12 17:55:37'),
(6, 'Headphone', '2025-05-12 17:55:56'),
(7, 'Macbook', '2025-05-12 17:56:21'),
(8, 'Laptop', '2025-05-12 17:56:31'),
(10, 'Toys', '2025-05-12 18:05:34'),
(11, 'Desktop', '2025-05-15 17:42:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` enum('Male','Female','Other','') DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `role` enum('admin','user','','') NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `gender`, `address`, `picture`, `role`, `created_at`) VALUES
(1, 'Imran Macbook user', 'Imran@gmail.com', '$2y$10$DDrcBQV/PMwGnLalkPzZY.SQupkhkWqUKjaqAz/RX8okTbftMRAc6', 'Male', '&lt;p&gt;Feni Pouroshova&lt;/p&gt;&lt;p&gt;Chattagram&lt;/p&gt;', '6814fd7552bea0705290502252950.jpg', 'admin', '2025-04-14 17:29:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
