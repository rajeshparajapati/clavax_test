-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2021 at 07:33 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clavax_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `product_category` varchar(255) NOT NULL,
  `sku_no` varchar(255) NOT NULL,
  `batch_no` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `company_name`, `product_category`, `sku_no`, `batch_no`, `size`, `image`, `qty`, `price`, `stock_status`) VALUES
(1, 'Whirlpool ', 'ABC Pvt Ltd', 'House Hold', 'KDD', 'DMD', 'Small', '1636652986.png', 10, '12.00', 'In Stock'),
(2, 'APPLE iPhone', 'PLL Pvt Ltd', 'House Hold', 'KNN', 'PND', 'Small', '1636654634.png', 10, '15.00', 'In Stock'),
(3, 'Solid Men Round', 'NND', 'Beauty', 'DLDK', 'DDD', 'Medium', '1636654795.png', 52, '12.00', 'In Stock'),
(4, 'Whirlpool SD', 'DFD', 'Beauty', 'HRRG', 'SFDSFS', 'Medium', '1636655248.png', 12, '12.00', 'In Stock'),
(5, 'Grey T-Shirt', 'DD PCV ltd', 'House Hold', 'FF12', 'DD142', 'Medium', '1636655307.png', 0, '12.00', 'Out of Stock'),
(6, 'Vacuum Cleaner', 'VCS Tc Pvt Ltd', 'Beauty', 'GG LKP', 'DED', 'Small', '1636655392.png', 2, '89.00', 'In Stock');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
