-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 15, 2016 at 06:14 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

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
-- Table structure for table `cb_categories`
--

CREATE TABLE `cb_categories` (
  `id` int(5) NOT NULL,
  `nm_c` varchar(255) NOT NULL,
  `slg_c` varchar(255) NOT NULL,
  `c_date` datetime NOT NULL,
  `u_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cb_categories`
--

INSERT INTO `cb_categories` (`id`, `nm_c`, `slg_c`, `c_date`, `u_date`) VALUES
(1, 'php', 'php', '2016-06-15 01:03:05', '2016-06-15 20:09:38');

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

-- --------------------------------------------------------

--
-- Table structure for table `mailing`
--

CREATE TABLE `mailing` (
  `num` int(5) NOT NULL,
  `emmail` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dt_c` datetime NOT NULL,
  `dt_u` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mailing`
--

INSERT INTO `mailing` (`num`, `emmail`, `name`, `dt_c`, `dt_u`) VALUES
(1, 'ary@china-glaze.co.id', 'a', '2016-06-10 03:04:01', '2016-06-03 10:08:56'),
(2, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(3, 'ary@china-glaze.co.id', 'a', '2016-06-10 03:04:01', '2016-06-03 10:21:43'),
(4, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(5, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(6, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(7, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(8, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(9, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(10, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(11, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(12, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(13, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(14, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(15, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(16, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(17, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(18, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(19, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(20, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(21, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(22, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(23, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(24, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(25, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(26, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(27, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(28, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(29, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(30, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(31, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(32, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(33, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(34, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(35, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(36, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(37, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(38, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(39, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(40, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(41, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(42, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(43, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(44, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(45, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(46, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(47, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(48, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(49, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(50, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(51, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(52, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(53, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(54, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(55, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(56, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(57, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(58, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(59, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(60, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(61, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(62, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(63, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(64, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(65, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(66, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(67, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(68, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(69, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(70, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(71, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(72, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(73, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(74, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(75, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(76, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(77, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(78, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08'),
(79, 'recruitment@elastomix.co.id', 'uu', '2016-06-24 03:11:08', '2016-06-17 11:16:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cb_categories`
--
ALTER TABLE `cb_categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `mailing`
--
ALTER TABLE `mailing`
  ADD PRIMARY KEY (`num`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cb_categories`
--
ALTER TABLE `cb_categories`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
-- AUTO_INCREMENT for table `mailing`
--
ALTER TABLE `mailing`
  MODIFY `num` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
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
