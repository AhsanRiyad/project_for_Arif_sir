-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2018 at 02:54 PM
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
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(5) NOT NULL,
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
  `discount` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `isbn`, `name`, `price`, `category`, `total`, `sold`, `description`, `image`, `date`, `rating`, `discount`) VALUES
(1, 'fafa', 'rfarfarf', 200, 'arfarf', 100, 0, 'afarefarfa', 'afraef', '2018-11-20', 0, 0),
(2, 'fafa', 'rfarfarf', 200, 'arfarf', 100, 0, 'afarefarfa', 'afraef', '2018-11-20', 0, 0),
(3, 'fafa', 'rfarfarf', 200, 'arfarf', 100, 0, 'afarefarfa', 'afraef', '2018-11-20', 0, 0),
(4, 'fafa', 'rfarfarf', 200, 'arfarf', 100, 0, 'afarefarfa', 'afraef', '2018-11-20', 0, 0);

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
(145, 'Riyad', 'Ahsan', 'riyad298@gmail.com', '01919448787', '2007-03-02', 'Male', '123456', 'User'),
(200, 'afrfa', 'arfarfa', 'riyad2981@gmail.com', '01919448787', '2005-02-03', 'Female', '123', 'User'),
(201, 'hello', 'Ahsan', 'riyad@gmail.com', '01919448787', '2005-03-03', 'Male', '123456', 'User');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
