-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2016 at 06:41 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `cb_level`
--

CREATE TABLE `cb_level` (
  `id_level` int(5) NOT NULL,
  `nm_level` varchar(255) NOT NULL,
  `c_date` datetime NOT NULL,
  `u_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cb_level`
--

INSERT INTO `cb_level` (`id_level`, `nm_level`, `c_date`, `u_date`) VALUES
(1, 'admin super', '2016-04-30 00:00:00', '2016-04-30 11:39:46'),
(2, 'admin user', '2016-04-30 00:00:00', '2016-04-30 11:39:46'),
(3, 'user', '2016-04-30 00:00:00', '2016-04-30 11:39:57');

-- --------------------------------------------------------

--
-- Table structure for table `cb_log`
--

CREATE TABLE `cb_log` (
  `id_login` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `id_level` int(5) NOT NULL,
  `id_status` int(5) NOT NULL,
  `pass_log` varchar(255) NOT NULL,
  `key_uppass` varchar(255) NOT NULL,
  `c_date` datetime NOT NULL,
  `u_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cb_log`
--

INSERT INTO `cb_log` (`id_login`, `id_user`, `id_level`, `id_status`, `pass_log`, `key_uppass`, `c_date`, `u_date`) VALUES
(1, 1, 1, 3, 'df7fb7c65949e480fabb73f574a8581b', 'mailworm@andrei.com', '2016-04-30 00:00:00', '2016-04-30 11:40:50');

-- --------------------------------------------------------

--
-- Table structure for table `cb_profile`
--

CREATE TABLE `cb_profile` (
  `id_user` int(5) NOT NULL,
  `nm_user` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `c_date` datetime NOT NULL,
  `u_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cb_profile`
--

INSERT INTO `cb_profile` (`id_user`, `nm_user`, `email`, `alamat`, `c_date`, `u_date`) VALUES
(1, 'epona', 'mailworm@andrei.com', 'anonymous', '2016-04-30 00:00:00', '2016-04-30 11:36:32');

-- --------------------------------------------------------

--
-- Table structure for table `cb_status`
--

CREATE TABLE `cb_status` (
  `id_status` int(5) NOT NULL,
  `nm_status` varchar(255) NOT NULL,
  `c_date` datetime NOT NULL,
  `u_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cb_status`
--

INSERT INTO `cb_status` (`id_status`, `nm_status`, `c_date`, `u_date`) VALUES
(1, 'banned', '2016-04-30 00:00:00', '2016-04-30 11:38:03'),
(2, 'active verification', '2016-04-30 00:00:00', '2016-04-30 11:39:12'),
(3, 'ok', '2016-04-30 00:00:00', '2016-04-30 11:39:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cb_level`
--
ALTER TABLE `cb_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `cb_log`
--
ALTER TABLE `cb_log`
  ADD PRIMARY KEY (`id_login`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_level` (`id_level`),
  ADD KEY `id_status` (`id_status`);

--
-- Indexes for table `cb_profile`
--
ALTER TABLE `cb_profile`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `cb_status`
--
ALTER TABLE `cb_status`
  ADD PRIMARY KEY (`id_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cb_level`
--
ALTER TABLE `cb_level`
  MODIFY `id_level` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cb_log`
--
ALTER TABLE `cb_log`
  MODIFY `id_login` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cb_profile`
--
ALTER TABLE `cb_profile`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cb_status`
--
ALTER TABLE `cb_status`
  MODIFY `id_status` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cb_log`
--
ALTER TABLE `cb_log`
  ADD CONSTRAINT `cb_log_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `cb_profile` (`id_user`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `cb_log_ibfk_2` FOREIGN KEY (`id_level`) REFERENCES `cb_level` (`id_level`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `cb_log_ibfk_3` FOREIGN KEY (`id_status`) REFERENCES `cb_status` (`id_status`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
