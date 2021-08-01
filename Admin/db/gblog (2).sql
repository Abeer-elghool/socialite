-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2021 at 10:47 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminroles`
--

CREATE TABLE `adminroles` (
  `id` int(11) NOT NULL,
  `title` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminroles`
--

INSERT INTO `adminroles` (`id`, `title`) VALUES
(7, 'backend developer'),
(8, 'Super Admin K');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` char(30) NOT NULL,
  `email` char(100) NOT NULL,
  `password` char(50) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `role_id`) VALUES
(3, 'ahmed', 'soty@mailinator.com', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 8),
(4, 'Seth Noble', 'vaqef@mailinator.com', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 8);

-- --------------------------------------------------------

--
-- Table structure for table `articalecategories`
--

CREATE TABLE `articalecategories` (
  `id` int(11) NOT NULL,
  `title` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `articales`
--

CREATE TABLE `articales` (
  `id` int(11) NOT NULL,
  `title` char(100) NOT NULL,
  `content` text NOT NULL,
  `image` char(50) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminroles`
--
ALTER TABLE `adminroles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `articalecategories`
--
ALTER TABLE `articalecategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articales`
--
ALTER TABLE `articales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `added_by` (`added_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminroles`
--
ALTER TABLE `adminroles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `articalecategories`
--
ALTER TABLE `articalecategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `articales`
--
ALTER TABLE `articales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `relationRole` FOREIGN KEY (`role_id`) REFERENCES `adminroles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `articales`
--
ALTER TABLE `articales`
  ADD CONSTRAINT `addedBy` FOREIGN KEY (`added_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category` FOREIGN KEY (`cat_id`) REFERENCES `articalecategories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
