-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2018 at 11:30 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cryptoex`
--

-- --------------------------------------------------------

--
-- Table structure for table `approvetrans`
--

CREATE TABLE `approvetrans` (
  `id` int(255) NOT NULL,
  `sellerID` int(255) NOT NULL,
  `buyerID` int(255) NOT NULL,
  `dateApproved` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(255) NOT NULL,
  `sellerID` int(255) NOT NULL,
  `buyerID` int(255) NOT NULL,
  `sellID` int(255) NOT NULL,
  `sellerconfirm` int(3) NOT NULL,
  `buyerconfirm` int(3) NOT NULL,
  `amout` int(255) NOT NULL,
  `date` datetime NOT NULL,
  `buyerconfirmDate` datetime NOT NULL,
  `sellerconfirmDate` datetime NOT NULL,
  `sold` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sell`
--

CREATE TABLE `sell` (
  `id` int(255) NOT NULL,
  `sellerID` int(255) NOT NULL COMMENT 'seller id',
  `amout` int(255) NOT NULL COMMENT 'amout to be sold',
  `sold` int(3) NOT NULL COMMENT 'if sold trye or false',
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `activationKey` varchar(255) NOT NULL,
  `isactive` int(3) NOT NULL,
  `disabled` int(3) NOT NULL,
  `dateRegistered` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `activationKey`, `isactive`, `disabled`, `dateRegistered`) VALUES
(2, 'imm', '$2y$10$Y6vTneo4MaP92wBJNNn2Mu5XFLW9YHMHCOqPPtpHu05VxiKh8O5Au', 'emmanuel.adeojo@yahoo.com', '', 0, 0, '2018-02-22 12:32:04'),
(3, '.', '$2y$10$tZRJ/AxKT5L.Tn1SRSci4ePcyb57x99D49WRSl827iE8NTWnBzEyq', '', '', 0, 0, '2018-02-22 12:32:04'),
(4, 'imm.emmanuel', '$2y$10$JOISQFGclPVw1fu38C4qr.HEBRrEf7.D.9x5oEK9MHXduskD4Izfq', 'adeojo.emmanuel@iodevtech.com', '', 1, 0, '2018-02-22 12:32:04'),
(6, 'alao.praise', '$2y$10$HwQ9o/8Fi1.TXlEx4.iMluHoz4QG6QVwSKWy2.m9K73Nrh/l4USfS', 'alaodavid@yahoo.com', 'e4dbe20a2f40d1e45df274bb8a1f8a8d17f0b798', 1, 0, '2018-02-22 12:48:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sell`
--
ALTER TABLE `sell`
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
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sell`
--
ALTER TABLE `sell`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
