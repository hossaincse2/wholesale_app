-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2021 at 06:24 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wholesale_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(6) UNSIGNED NOT NULL,
  `order_number` varchar(50) DEFAULT NULL,
  `user_id` int(50) DEFAULT NULL,
  `product_id` int(50) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `user_id`, `product_id`, `create_at`) VALUES
(1, '39', 0, 2, '2021-12-31 05:18:59'),
(2, '82', 2, 2, '2021-12-31 05:19:55'),
(3, '39', 2, 2, '2021-12-31 05:20:36'),
(4, '51', 2, 1, '2021-12-31 05:21:10'),
(5, '67', 2, 2, '2021-12-31 05:21:31');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(6) UNSIGNED NOT NULL,
  `product_title` varchar(30) NOT NULL,
  `product_desc` varchar(30) NOT NULL,
  `retail_price` varchar(50) DEFAULT NULL,
  `wholesale_price` varchar(50) DEFAULT NULL,
  `product_image` varchar(50) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_title`, `product_desc`, `retail_price`, `wholesale_price`, `product_image`, `create_at`, `created_by`) VALUES
(1, 'zxcz', 'zxczxcx', '100', '', 'Animhorse.gif', '2021-12-31 04:50:46', 0),
(2, 'zxcz', 'zxczxcx', '100', '', 'Animhorse.gif', '2021-12-31 04:51:01', 0),
(3, 'asd', 'asd', '1000', '900', 'Animhorse.gif', '2021-12-31 04:51:05', 2),
(4, 'asd', 'asd', '1000', '900', 'Animhorse.gif', '2021-12-31 04:51:09', 2),
(5, 'Fsdsfds fdsf', 'sdf ds', '400', '360', 'Animhorse.gif', '2021-12-31 04:51:12', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `user_type` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `user_type`, `email`, `mobile`, `password`, `create_at`) VALUES
(2, 'MD', 'Hossain', 'Customer', 'hossain@gmail.com', '0454545', '12345678', '2021-12-28 16:37:48'),
(6, '', '', 'Customer', 'hossain@gmail.com', '', '12345678', '2021-12-29 18:27:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
