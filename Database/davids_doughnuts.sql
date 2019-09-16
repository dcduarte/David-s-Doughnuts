-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2019 at 01:35 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `davids_doughnuts`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `sprinkles` int(12) NOT NULL,
  `chocolate` int(12) NOT NULL,
  `caramel` int(12) NOT NULL,
  `raspberry` int(12) NOT NULL,
  `strawberry` int(12) NOT NULL,
  `blueberry` int(12) NOT NULL,
  `total_price` int(100) NOT NULL,
  `delivery_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_name`, `sprinkles`, `chocolate`, `caramel`, `raspberry`, `strawberry`, `blueberry`, `total_price`, `delivery_date`) VALUES
(1, 'Duarte', 12, 0, 0, 0, 0, 0, 12, '2019-02-14'),
(2, 'Phil', 5, 5, 2, 0, 0, 0, 13, '2019-02-19'),
(3, 'David', 0, 0, 6, 6, 0, 0, 11, '2019-02-24'),
(4, 'Andrew', 6, 0, 3, 0, 0, 3, 11, '2019-02-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
