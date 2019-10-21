-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2018 at 08:56 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webtech`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(7) NOT NULL,
  `productId` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `userId` varchar(50) NOT NULL,
  `price` int(7) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `descripition` varchar(100) NOT NULL,
  `sellerId` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `productId`, `quantity`, `userId`, `price`, `productName`, `descripition`, `sellerId`) VALUES
(1, 1, 1, 'riyad298@gmail.com', 200, 'rfarfarf', 'afarefarfa', ''),
(2, 4, 1, 'riyad298@gmail.com', 200, 'rfarfarf', 'afarefarfa', '');

-- --------------------------------------------------------

--
-- Table structure for table `contains`
--

CREATE TABLE `contains` (
  `id` int(7) NOT NULL,
  `orderId` int(5) NOT NULL,
  `productId` int(50) NOT NULL,
  `perProductQuantity` int(50) NOT NULL,
  `sellerId` varchar(50) NOT NULL,
  `userId` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orderproduct`
--

CREATE TABLE `orderproduct` (
  `orderId` int(5) NOT NULL,
  `orderDate` datetime(6) NOT NULL,
  `orderStatus` varchar(50) NOT NULL,
  `userId` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(5) NOT NULL,
  `sellerId` varchar(100) NOT NULL,
  `isbn` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(5) NOT NULL,
  `category` varchar(100) NOT NULL,
  `total` int(5) NOT NULL,
  `sold` int(5) NOT NULL,
  `description` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `rating` int(2) NOT NULL,
  `discount` int(5) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `sellerId`, `isbn`, `name`, `price`, `category`, `total`, `sold`, `description`, `image`, `date`, `rating`, `discount`, `status`) VALUES
(1, '', 'fafa', 'rfarfarf', 200, 'arfarf', 100, 0, 'afarefarfa', 'afraef', '2018-11-20', 0, 0, ''),
(2, '', 'fafa', 'rfarfarf', 200, 'arfarf', 100, 0, 'afarefarfa', 'afraef', '2018-11-20', 0, 0, ''),
(3, '', 'fafa', 'rfarfarf', 200, 'arfarf', 100, 0, 'afarefarfa', 'afraef', '2018-11-20', 0, 0, ''),
(4, '', 'fafa', 'rfarfarf', 200, 'arfarf', 100, 0, 'afarefarfa', 'afraef', '2018-11-20', 0, 0, ''),
(5, '', 'lkl', 'lklk', 3454, 'Garments', 345, 0, '345', '', '0000-00-00', 0, 0, ''),
(6, '', 'kkjoi', 'popo', 344, 'Garments', 345, 0, '345', '', '0000-00-00', 0, 0, ''),
(7, '', 'kkjoi', 'popo', 344, 'Garments', 345, 0, '345', '', '2018-12-16', 0, 0, ''),
(8, '', 'reter', 'rete', 454, 'grocery', 435, 0, 'rert', '', '2018-12-16', 0, 0, ''),
(9, '', 'reter', 'rete', 454, 'grocery', 435, 0, 'rert', '', '2018-12-16', 0, 0, ''),
(10, '', 'gug', 'uyygyu', 878, 'Mobbbile', 19878, 0, 'khjkjh', '', '2018-12-16', 0, 0, ''),
(11, '', 'gug', 'uyygyu', 878, 'Mobbbile', 19878, 0, 'khjkjh', '', '2018-12-16', 0, 0, ''),
(12, '', 'kaium', 'abbcd', 10000, 'Computer', 300, 0, 'good', '', '2018-12-16', 0, 0, ''),
(13, '', 'kaium', 'abbcd', 10000, 'Computer', 300, 0, 'good', '', '2018-12-16', 0, 0, ''),
(14, '', 'kaium', 'abbcd', 10000, 'Computer', 300, 0, 'good', '', '2018-12-16', 0, 0, ''),
(15, '', 'kaium', 'abbcd', 10000, 'Computer', 300, 0, 'good', '', '2018-12-16', 0, 0, ''),
(16, '', 'riyad', 'qeqw', 2000, 'Garments', 500, 0, 'cvb', '', '2018-12-16', 0, 0, ''),
(17, '', 'dfgdfdfg', 'dfgd', 35345, 'Garments', 345, 0, 'cvb', '', '2018-12-16', 0, 0, ''),
(18, '', 'khjh', 'khkj', 7765, 'Garments', 8767, 0, 'jhghj', '', '2018-12-16', 0, 0, ''),
(19, '', 'gfhfgh', 'fghfgh', 46546, 'Electronics', 456, 0, '456', '', '2018-12-16', 0, 0, ''),
(20, '', 'gfhfgh', 'fghfgh', 46546, 'Electronics', 456, 0, '456', '', '2018-12-16', 0, 0, ''),
(21, '', '64', 'ytyut', 56757, 'Electronics', 5354, 0, 'hgfgh', '', '2018-12-16', 0, 0, ''),
(22, 'riyad123@gmail.com', 'khhbh', 'kjhkjh', 9080, 'Electronics', 87987, 0, 'khih', '', '2018-12-16', 0, 0, ''),
(23, 'riyad123@gmail.com', 'khhbh', 'kjhkjh', 9080, 'Electronics', 87987, 0, 'khih', '', '2018-12-16', 0, 0, ''),
(24, 'riyad123@gmail.com', 'hgkhk', 'rtttt', 5000, 'Mobbbile', 300, 0, 'uyyuu', '', '2018-12-16', 0, 0, ''),
(25, 'riyad123@gmail.com', 'klijnj', 'grtrrt', 600, 'grocery', 400, 0, 'hghfg', '', '2018-12-16', 0, 0, ''),
(26, 'riyad123@gmail.com', 'Muhammad Ahsan Ferdous Riyad', 'Muhammad Ahsan Ferdous Riyad', 3, 'Electronics', 3, 0, 'kkr', '', '2018-12-17', 0, 0, ''),
(27, 'riyad123@gmail.com', 'Muhammad Ahsan Ferdous Riyad', 'Muhammad Ahsan Ferdous Riyad', 3, 'Electronics', 3, 0, 'kkr', '', '2018-12-17', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(15) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstName`, `lastName`, `email`, `mobile`, `dob`, `gender`, `password`, `type`) VALUES
(145, 'Riyad', 'Ahsan', 'riyad298@gmail.com', '01919448788', '2007-03-02', 'Male', '123456', 'User'),
(200, 'afrfa', 'arfarfa', 'riyad2981@gmail.com', '01919448787', '2005-02-03', 'Female', '123', 'User'),
(201, 'hello', 'Ahsan', 'riyad@gmail.com', '01919448787', '2005-03-03', 'Male', '123456', 'User'),
(202, 'Abdul', 'Kaium', 'makaium33@gmail.com', '01867075362', '2003-02-02', 'Male', '123456', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `contains`
--
ALTER TABLE `contains`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `orderproduct`
--
ALTER TABLE `orderproduct`
  ADD UNIQUE KEY `orderId` (`orderId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contains`
--
ALTER TABLE `contains`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orderproduct`
--
ALTER TABLE `orderproduct`
  MODIFY `orderId` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
