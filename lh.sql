-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2020 at 07:29 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siraalmq_lh`
--

-- --------------------------------------------------------

--
-- Table structure for table `daily`
--

CREATE TABLE `daily` (
  `id` int(11) NOT NULL,
  `amount` text NOT NULL,
  `name` text NOT NULL,
  `des` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dhar_din`
--

CREATE TABLE `dhar_din` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `phone` text NOT NULL,
  `address` text NOT NULL,
  `gid` text NOT NULL,
  `amount` float NOT NULL,
  `des` text NOT NULL,
  `date` datetime NOT NULL,
  `adder` text NOT NULL,
  `paid` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dhar_din_copy`
--

CREATE TABLE `dhar_din_copy` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `phone` text NOT NULL,
  `address` text NOT NULL,
  `gid` text NOT NULL,
  `amount` float NOT NULL,
  `des` text NOT NULL,
  `date` datetime NOT NULL,
  `adder` text NOT NULL,
  `pre` text NOT NULL,
  `new` int(11) NOT NULL,
  `paid` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dhar_nin`
--

CREATE TABLE `dhar_nin` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `phone` text NOT NULL,
  `address` text NOT NULL,
  `gid` text NOT NULL,
  `amount` float NOT NULL,
  `des` text NOT NULL,
  `date` datetime NOT NULL,
  `adder` text NOT NULL,
  `paid` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dhar_nin_copy`
--

CREATE TABLE `dhar_nin_copy` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `phone` text NOT NULL,
  `address` text NOT NULL,
  `gid` text NOT NULL,
  `amount` float NOT NULL,
  `des` text NOT NULL,
  `date` datetime NOT NULL,
  `adder` text NOT NULL,
  `pre` text NOT NULL,
  `new` int(11) NOT NULL,
  `paid` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `drive`
--

CREATE TABLE `drive` (
  `id` int(11) NOT NULL,
  `serial` text NOT NULL,
  `issue` date NOT NULL,
  `DCTB` text NOT NULL,
  `DCTB_date` date NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `r_name` text NOT NULL,
  `r_phone` text NOT NULL,
  `type` text NOT NULL,
  `v_class` text NOT NULL,
  `total_amount` float NOT NULL,
  `paid_amount` float NOT NULL,
  `description` text NOT NULL,
  `hide` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `adder` text NOT NULL,
  `file_brta` text NOT NULL,
  `driving_refference` text NOT NULL,
  `g_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `drive_copy`
--

CREATE TABLE `drive_copy` (
  `id` int(11) NOT NULL,
  `serial` text NOT NULL,
  `issue` date NOT NULL,
  `DCTB` text NOT NULL,
  `DCTB_date` date NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `r_name` text NOT NULL,
  `r_phone` text NOT NULL,
  `type` text NOT NULL,
  `v_class` text NOT NULL,
  `total_amount` float NOT NULL,
  `paid_amount` float NOT NULL,
  `description` text NOT NULL,
  `hide` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `adder` text NOT NULL,
  `pre` float NOT NULL,
  `new` int(11) NOT NULL,
  `g_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hajj`
--

CREATE TABLE `hajj` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `phone` text NOT NULL,
  `passport` text NOT NULL,
  `tracking` text NOT NULL,
  `type` text NOT NULL,
  `total_amount` float NOT NULL,
  `paid_amount` float NOT NULL,
  `description` text NOT NULL,
  `ticket` text NOT NULL,
  `visa` text NOT NULL,
  `transport` text NOT NULL,
  `rent` text NOT NULL,
  `food` text NOT NULL,
  `other` text NOT NULL,
  `hide` int(11) NOT NULL,
  `new` int(11) NOT NULL,
  `g_id` text NOT NULL,
  `adder` text NOT NULL,
  `datetime` datetime NOT NULL,
  `pre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hajj_copy`
--

CREATE TABLE `hajj_copy` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `phone` text NOT NULL,
  `passport` text NOT NULL,
  `tracking` text NOT NULL,
  `type` text NOT NULL,
  `total_amount` float NOT NULL,
  `paid_amount` float NOT NULL,
  `description` text NOT NULL,
  `ticket` text NOT NULL,
  `visa` text NOT NULL,
  `transport` text NOT NULL,
  `rent` text NOT NULL,
  `food` text NOT NULL,
  `other` text NOT NULL,
  `hide` int(11) NOT NULL,
  `new` int(11) NOT NULL,
  `g_id` text NOT NULL,
  `adder` text NOT NULL,
  `datetime` datetime NOT NULL,
  `pre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hajj_cost`
--

CREATE TABLE `hajj_cost` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL,
  `amount` float NOT NULL,
  `des` text NOT NULL,
  `date` datetime NOT NULL,
  `hide` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pass`
--

CREATE TABLE `pass` (
  `id` int(11) NOT NULL,
  `pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `email` text NOT NULL,
  `pass` text NOT NULL,
  `ms` text NOT NULL,
  `date` datetime NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daily`
--
ALTER TABLE `daily`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dhar_din`
--
ALTER TABLE `dhar_din`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dhar_din_copy`
--
ALTER TABLE `dhar_din_copy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dhar_nin`
--
ALTER TABLE `dhar_nin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dhar_nin_copy`
--
ALTER TABLE `dhar_nin_copy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drive`
--
ALTER TABLE `drive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drive_copy`
--
ALTER TABLE `drive_copy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hajj`
--
ALTER TABLE `hajj`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hajj_copy`
--
ALTER TABLE `hajj_copy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hajj_cost`
--
ALTER TABLE `hajj_cost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pass`
--
ALTER TABLE `pass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daily`
--
ALTER TABLE `daily`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dhar_din`
--
ALTER TABLE `dhar_din`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dhar_din_copy`
--
ALTER TABLE `dhar_din_copy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dhar_nin`
--
ALTER TABLE `dhar_nin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dhar_nin_copy`
--
ALTER TABLE `dhar_nin_copy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drive`
--
ALTER TABLE `drive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drive_copy`
--
ALTER TABLE `drive_copy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hajj`
--
ALTER TABLE `hajj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hajj_copy`
--
ALTER TABLE `hajj_copy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hajj_cost`
--
ALTER TABLE `hajj_cost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pass`
--
ALTER TABLE `pass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
