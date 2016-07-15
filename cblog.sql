-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2016 at 05:14 AM
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
  `c_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `u_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cb_categories`
--

INSERT INTO `cb_categories` (`id`, `nm_c`, `slg_c`, `c_date`, `u_date`, `status`) VALUES
(6, 'okk', 'okk', '2016-06-18 10:11:52', '2016-06-19 08:33:11', '0'),
(7, 'oksa', 'oksa', '0000-00-00 00:00:00', '2016-06-19 08:34:22', '0'),
(8, 'w', 'w', '2016-06-18 10:16:04', '2016-06-18 16:13:00', '1'),
(9, 'ok', 'ok', '2016-06-18 10:18:07', '2016-06-19 12:43:28', '1'),
(10, 'okkk', 'okkk', '2016-06-19 14:43:38', '2016-06-19 08:34:39', '0'),
(11, 'muk', 'muk', '2016-06-27 05:56:58', '2016-06-26 22:56:58', '0'),
(12, 'masuk', 'masuk', '2016-06-27 05:57:08', '2016-06-26 22:57:08', '0');

-- --------------------------------------------------------

--
-- Table structure for table `cb_catrelation`
--

CREATE TABLE `cb_catrelation` (
  `id` int(5) NOT NULL,
  `id_c` int(5) NOT NULL,
  `id_cont` int(5) NOT NULL,
  `c_date` datetime NOT NULL,
  `u_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cb_contents`
--

CREATE TABLE `cb_contents` (
  `id` int(5) NOT NULL,
  `imgheader` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_content` text NOT NULL,
  `content` text NOT NULL,
  `c_date` datetime NOT NULL,
  `u_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(5) NOT NULL,
  `creator` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cb_img`
--

CREATE TABLE `cb_img` (
  `id` int(5) NOT NULL,
  `img` varchar(255) NOT NULL,
  `c_date` datetime NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cb_img`
--

INSERT INTO `cb_img` (`id`, `img`, `c_date`, `status`) VALUES
(1, 'j', '2016-06-21 05:00:00', '1');

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
  `img` int(5) NOT NULL,
  `c_date` datetime NOT NULL,
  `u_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cb_profile`
--

INSERT INTO `cb_profile` (`id_user`, `nm_user`, `email`, `alamat`, `img`, `c_date`, `u_date`) VALUES
(1, 'epona', 'mailworm@andrei.com', 'anonymous', 1, '2016-04-30 00:00:00', '2016-04-30 11:36:32');

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
-- Table structure for table `cb_tags`
--

CREATE TABLE `cb_tags` (
  `id` int(5) NOT NULL,
  `nm_t` varchar(255) NOT NULL,
  `slg_t` varchar(255) NOT NULL,
  `c_date` datetime NOT NULL,
  `u_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cb_tags`
--

INSERT INTO `cb_tags` (`id`, `nm_t`, `slg_t`, `c_date`, `u_date`, `status`) VALUES
(8, '34', '34', '2016-06-20 09:49:45', '2016-06-19 19:49:45', '0'),
(9, '44', '44', '2016-06-20 09:49:45', '2016-06-19 19:49:45', '0'),
(10, 'Satu semua', 'satu-semua', '2016-06-20 09:57:23', '2016-06-19 19:57:23', '0'),
(11, 'Semua Satu A K Jj Jkk', 'semua-satu-a-k-jj-jkk', '2016-06-20 09:57:23', '2016-06-22 06:39:34', '0');

-- --------------------------------------------------------

--
-- Table structure for table `cb_tagsrelation`
--

CREATE TABLE `cb_tagsrelation` (
  `id` int(5) NOT NULL,
  `id_tag` int(5) NOT NULL,
  `id_cont` int(5) NOT NULL,
  `c_date` datetime NOT NULL,
  `u_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `cb_catrelation`
--
ALTER TABLE `cb_catrelation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_c` (`id_c`,`id_cont`),
  ADD KEY `cb_catrelation_ibfk_2` (`id_cont`);

--
-- Indexes for table `cb_contents`
--
ALTER TABLE `cb_contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator` (`creator`);

--
-- Indexes for table `cb_img`
--
ALTER TABLE `cb_img`
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
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `img` (`img`);

--
-- Indexes for table `cb_status`
--
ALTER TABLE `cb_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `cb_tags`
--
ALTER TABLE `cb_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cb_tagsrelation`
--
ALTER TABLE `cb_tagsrelation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tag` (`id_tag`,`id_cont`),
  ADD KEY `id_cont` (`id_cont`);

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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `cb_catrelation`
--
ALTER TABLE `cb_catrelation`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cb_contents`
--
ALTER TABLE `cb_contents`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cb_img`
--
ALTER TABLE `cb_img`
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
-- AUTO_INCREMENT for table `cb_tags`
--
ALTER TABLE `cb_tags`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `cb_tagsrelation`
--
ALTER TABLE `cb_tagsrelation`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mailing`
--
ALTER TABLE `mailing`
  MODIFY `num` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cb_catrelation`
--
ALTER TABLE `cb_catrelation`
  ADD CONSTRAINT `cb_catrelation_ibfk_1` FOREIGN KEY (`id_c`) REFERENCES `cb_categories` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `cb_catrelation_ibfk_2` FOREIGN KEY (`id_cont`) REFERENCES `cb_contents` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `cb_contents`
--
ALTER TABLE `cb_contents`
  ADD CONSTRAINT `cb_contents_ibfk_2` FOREIGN KEY (`creator`) REFERENCES `cb_profile` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cb_log`
--
ALTER TABLE `cb_log`
  ADD CONSTRAINT `cb_log_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `cb_profile` (`id_user`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `cb_log_ibfk_2` FOREIGN KEY (`id_level`) REFERENCES `cb_level` (`id_level`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `cb_log_ibfk_3` FOREIGN KEY (`id_status`) REFERENCES `cb_status` (`id_status`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `cb_profile`
--
ALTER TABLE `cb_profile`
  ADD CONSTRAINT `cb_profile_ibfk_1` FOREIGN KEY (`img`) REFERENCES `cb_img` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cb_tagsrelation`
--
ALTER TABLE `cb_tagsrelation`
  ADD CONSTRAINT `cb_tagsrelation_ibfk_1` FOREIGN KEY (`id_tag`) REFERENCES `cb_tags` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `cb_tagsrelation_ibfk_2` FOREIGN KEY (`id_cont`) REFERENCES `cb_contents` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
