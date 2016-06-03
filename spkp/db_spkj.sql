-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2015 at 02:08 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spkj`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `id_user`, `username`, `password`) VALUES
(1, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_alternatif`
--

CREATE TABLE `tb_alternatif` (
  `id_alternatif` int(10) NOT NULL,
  `nm_alternatif` varchar(255) NOT NULL,
  `knmsa` int(10) DEFAULT NULL,
  `knfsa` int(10) DEFAULT NULL,
  `knksa` int(10) DEFAULT NULL,
  `knbsa` int(10) DEFAULT NULL,
  `knsesa` int(10) DEFAULT NULL,
  `kngsa` int(10) DEFAULT NULL,
  `knesa` int(10) DEFAULT NULL,
  `knsosa` int(10) DEFAULT NULL,
  `knmsb` int(10) DEFAULT NULL,
  `knfsb` int(10) DEFAULT NULL,
  `knksb` int(10) DEFAULT NULL,
  `knbsb` int(10) DEFAULT NULL,
  `knsesb` int(10) DEFAULT NULL,
  `kngsb` int(10) DEFAULT NULL,
  `knesb` int(10) DEFAULT NULL,
  `knsosb` int(10) DEFAULT NULL,
  `ktq` int(10) DEFAULT NULL,
  `khm` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_alternatif`
--

INSERT INTO `tb_alternatif` (`id_alternatif`, `nm_alternatif`, `knmsa`, `knfsa`, `knksa`, `knbsa`, `knsesa`, `kngsa`, `knesa`, `knsosa`, `knmsb`, `knfsb`, `knksb`, `knbsb`, `knsesb`, `kngsb`, `knesb`, `knsosb`, `ktq`, `khm`) VALUES
(8, 'ipa', 3, 3, 3, 3, 3, 3, 3, 3, 4, 4, 4, 4, 2, 2, 2, 2, 2, 2),
(9, 'ips', 3, 3, 3, 3, 3, 3, 3, 3, 2, 2, 2, 2, 4, 4, 4, 4, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasil`
--

CREATE TABLE `tb_hasil` (
  `id_hasil` int(10) NOT NULL,
  `id_nilai` int(10) NOT NULL,
  `id_alternatif` int(10) NOT NULL,
  `v` varchar(255) NOT NULL,
  `result` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_hasil`
--

INSERT INTO `tb_hasil` (`id_hasil`, `id_nilai`, `id_alternatif`, `v`, `result`) VALUES
(5, 37, 8, '0.53178734772395', 1),
(6, 37, 9, '0.46821265227605', 2),
(9, 39, 8, '0.49286516990749', 2),
(10, 39, 9, '0.50713483009251', 1),
(11, 41, 8, '0.507283098355', 1),
(12, 41, 9, '0.492716901645', 2),
(15, 44, 8, '0.57235646959825', 1),
(16, 44, 9, '0.42764353040175', 2),
(17, 45, 8, '0.47255065603577', 2),
(18, 45, 9, '0.52744934396423', 1),
(19, 46, 8, '0.50388624512282', 1),
(20, 46, 9, '0.49611375487718', 2),
(21, 47, 8, '0.48683298050514', 2),
(22, 47, 9, '0.51316701949486', 1),
(23, 48, 8, '0.51909814458176', 1),
(24, 48, 9, '0.48090185541824', 2),
(25, 49, 8, '0.51914313996813', 1),
(26, 49, 9, '0.48085686003187', 2),
(27, 50, 8, '0.52308587854334', 1),
(28, 50, 9, '0.47691412145666', 2),
(29, 51, 8, '0.5857864376269', 1),
(30, 51, 9, '0.4142135623731', 2),
(31, 52, 8, '0.49465497120191', 2),
(32, 52, 9, '0.50534502879809', 1),
(33, 53, 8, '0.5333851740256', 1),
(34, 53, 9, '0.4666148259744', 2),
(35, 54, 8, '0.50933814519321', 1),
(36, 54, 9, '0.49066185480679', 2),
(37, 55, 8, '0.51579483878072', 1),
(38, 55, 9, '0.48420516121928', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `id_kriteria` int(10) NOT NULL,
  `id_kriteriagroup` int(10) NOT NULL,
  `rangenilai` varchar(255) NOT NULL,
  `weight` int(10) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`id_kriteria`, `id_kriteriagroup`, `rangenilai`, `weight`, `status`) VALUES
(10, 1, '0 <= 59', 1, 1),
(11, 1, '60 <= 69', 2, 1),
(12, 1, '70 <= 79', 3, 1),
(13, 1, '80 <= 89', 4, 1),
(14, 1, '90 <= 100', 5, 1),
(15, 2, '0 <= 59', 1, 1),
(16, 2, '60 <= 69', 2, 1),
(17, 2, '70 <= 79', 3, 1),
(18, 2, '80 <= 89', 4, 1),
(19, 2, '90 <= 100', 5, 1),
(20, 3, '0 <= 59', 1, 1),
(21, 3, '60 <= 69', 2, 1),
(22, 3, '70 <= 79', 3, 1),
(23, 3, '80 <= 89', 4, 1),
(24, 3, '90 <= 100', 5, 1),
(25, 4, '0 <= 59', 1, 1),
(26, 4, '60 <= 69', 2, 1),
(27, 4, '70 <= 79', 3, 1),
(28, 4, '80 <= 89', 4, 1),
(29, 4, '90 <= 100', 5, 1),
(30, 5, '0 <= 59', 1, 1),
(31, 5, '60 <= 69', 2, 1),
(32, 5, '70 <= 79', 3, 1),
(33, 5, '80 <= 89', 4, 1),
(34, 5, '90 <= 100', 5, 1),
(35, 6, '0 <= 59', 1, 1),
(36, 6, '60 <= 69', 2, 1),
(37, 6, '70 <= 79', 3, 1),
(38, 6, '80 <= 89', 4, 1),
(39, 6, '90 <= 100', 5, 1),
(40, 7, '0 <= 59', 1, 1),
(41, 7, '60 <= 69', 2, 1),
(42, 7, '70 <= 79', 3, 1),
(43, 7, '80 <= 89', 4, 1),
(44, 7, '90 <= 100', 5, 1),
(45, 8, '0 <= 59', 1, 1),
(46, 8, '60 <= 69', 2, 1),
(47, 8, '70 <= 79', 3, 1),
(48, 8, '80 <= 89', 4, 1),
(49, 8, '90 <= 100', 5, 1),
(50, 9, '0 <= 59', 1, 1),
(51, 9, '60 <= 69', 2, 1),
(52, 9, '70 <= 79', 3, 1),
(53, 9, '80 <= 89', 4, 1),
(54, 9, '90 <= 100', 5, 1),
(55, 10, '0 <= 59', 1, 1),
(56, 10, '60 <= 69', 2, 1),
(57, 10, '70 <= 79', 3, 1),
(58, 10, '80 <= 89', 4, 1),
(59, 10, '90 <= 100', 5, 1),
(60, 11, '0 <= 59', 1, 1),
(61, 11, '60 <= 69', 2, 1),
(62, 11, '70 <= 79', 3, 1),
(63, 11, '80 <= 89', 4, 1),
(64, 11, '90 <= 100', 5, 1),
(65, 12, '0 <= 59', 1, 1),
(66, 12, '60 <= 69', 2, 1),
(67, 12, '70 <= 79', 3, 1),
(68, 12, '80 <= 89', 4, 1),
(69, 12, '90 <= 100', 5, 1),
(70, 13, '0 <= 59', 1, 1),
(71, 13, '60 <= 69', 2, 1),
(72, 13, '70 <= 79', 3, 1),
(73, 13, '80 <= 89', 4, 1),
(74, 13, '90 <= 100', 5, 1),
(75, 14, '0 <= 59', 1, 1),
(76, 14, '60 <= 69', 2, 1),
(77, 14, '70 <= 79', 3, 1),
(78, 14, '80 <= 89', 4, 1),
(79, 14, '90 <= 100', 5, 1),
(80, 15, '0 <= 59', 1, 1),
(81, 15, '60 <= 69', 2, 1),
(82, 15, '70 <= 79', 3, 1),
(83, 15, '80 <= 89', 4, 1),
(84, 15, '90 <= 100', 5, 1),
(85, 16, '0 <= 59', 1, 1),
(86, 16, '60 <= 69', 2, 1),
(87, 16, '70 <= 79', 3, 1),
(88, 16, '80 <= 89', 4, 1),
(89, 16, '90 <= 100', 5, 1),
(90, 17, 'IPS', 1, 1),
(91, 17, 'IPA', 2, 1),
(95, 18, 'IPS', 1, 1),
(96, 18, 'IPA', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteriagroup`
--

CREATE TABLE `tb_kriteriagroup` (
  `id_kriteriagroup` int(10) NOT NULL,
  `nm_kriteria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kriteriagroup`
--

INSERT INTO `tb_kriteriagroup` (`id_kriteriagroup`, `nm_kriteria`) VALUES
(1, 'nilai matematika semester 1'),
(2, 'nilai fisika semester 1'),
(3, 'nilai kimia semester 1'),
(4, 'nilai biologi semester 1'),
(5, 'nilai sejarah semester 1'),
(6, 'nilai geografi semester 1'),
(7, 'nilai ekonomi semester 1'),
(8, 'nilai sosiologi semester 1'),
(9, 'nilai matematika semester 2'),
(10, 'nilai fisika semester 2'),
(11, 'nilai kimia semester 2'),
(12, 'nilai biologi semester 2'),
(13, 'nilai sejarah semester 2'),
(14, 'nilai geografi semester 2'),
(15, 'nilai ekonomi semester 2'),
(16, 'nilai sosiologi semester 2'),
(17, 'hasil tes IQ'),
(18, 'hasil minat');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id_nilai` int(10) NOT NULL,
  `id_siswa` int(10) NOT NULL,
  `knmsa` int(10) DEFAULT NULL,
  `knfsa` int(10) DEFAULT NULL,
  `knksa` int(10) DEFAULT NULL,
  `knbsa` int(10) DEFAULT NULL,
  `knsesa` int(10) DEFAULT NULL,
  `kngsa` int(10) DEFAULT NULL,
  `knesa` int(10) DEFAULT NULL,
  `knsosa` int(10) DEFAULT NULL,
  `knmsb` int(10) DEFAULT NULL,
  `knfsb` int(10) DEFAULT NULL,
  `knksb` int(10) DEFAULT NULL,
  `knbsb` int(10) DEFAULT NULL,
  `knsesb` int(10) DEFAULT NULL,
  `kngsb` int(10) DEFAULT NULL,
  `knesb` int(10) DEFAULT NULL,
  `knsosb` int(10) DEFAULT NULL,
  `ktq` int(10) DEFAULT NULL,
  `khm` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_nilai`
--

INSERT INTO `tb_nilai` (`id_nilai`, `id_siswa`, `knmsa`, `knfsa`, `knksa`, `knbsa`, `knsesa`, `kngsa`, `knesa`, `knsosa`, `knmsb`, `knfsb`, `knksb`, `knbsb`, `knsesb`, `kngsb`, `knesb`, `knsosb`, `ktq`, `khm`) VALUES
(37, 25, 3, 4, 3, 4, 4, 4, 4, 4, 2, 3, 3, 3, 4, 2, 2, 2, 2, 2),
(39, 27, 3, 3, 3, 4, 3, 3, 3, 4, 3, 1, 3, 3, 3, 3, 3, 2, 1, 1),
(41, 30, 4, 4, 4, 4, 4, 4, 4, 4, 3, 4, 3, 4, 3, 3, 3, 5, 2, 2),
(44, 31, 3, 3, 3, 3, 3, 3, 3, 4, 2, 3, 4, 3, 3, 2, 3, 1, 2, 1),
(45, 32, 3, 3, 4, 2, 3, 3, 3, 4, 2, 3, 3, 3, 3, 4, 2, 4, 2, 2),
(46, 33, 3, 3, 3, 4, 3, 4, 3, 4, 3, 3, 3, 3, 3, 4, 2, 3, 1, 2),
(47, 34, 3, 3, 3, 4, 3, 3, 3, 3, 2, 3, 3, 3, 3, 3, 2, 4, 2, 1),
(48, 35, 3, 4, 3, 4, 3, 4, 4, 4, 3, 3, 2, 3, 3, 3, 3, 2, 2, 2),
(49, 36, 3, 4, 4, 4, 4, 4, 4, 4, 2, 4, 3, 4, 4, 3, 3, 3, 2, 2),
(50, 37, 3, 1, 3, 3, 3, 3, 3, 4, 3, 3, 3, 4, 4, 4, 2, 2, 2, 2),
(51, 38, 3, 3, 3, 4, 4, 3, 3, 4, 2, 3, 3, 3, 2, 2, 1, 3, 1, 2),
(52, 39, 3, 3, 3, 3, 4, 3, 3, 4, 3, 2, 3, 4, 3, 4, 3, 3, 2, 1),
(53, 40, 3, 4, 4, 4, 4, 3, 3, 4, 2, 3, 4, 3, 3, 4, 2, 2, 2, 2),
(54, 41, 3, 4, 3, 4, 4, 3, 3, 4, 3, 5, 4, 4, 4, 4, 3, 5, 2, 2),
(55, 42, 3, 3, 3, 4, 4, 3, 3, 4, 2, 4, 3, 3, 3, 4, 3, 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `id_user`, `username`, `password`, `status`) VALUES
(2, 2, 'petugas', '55be88021f8a5db8482a0446a4c6591d', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(10) NOT NULL,
  `nis` bigint(9) NOT NULL,
  `nm_siswa` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `walisiswa` text NOT NULL,
  `jurusan` int(11) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nis`, `nm_siswa`, `tgl_lahir`, `walisiswa`, `jurusan`, `status`) VALUES
(25, 111210001, 'Aris Narendra', '1996-09-09', 'DADANG MULIANA', 1, 1),
(27, 111210041, 'Adrian Ridho Wirastanto', '1995-08-21', 'Drs. DASUKI', 2, 1),
(30, 111210163, 'Bagus Aprianto', '1996-06-24', 'WELI ARYADI', 1, 1),
(31, 111210115, 'Bunga Ayu Armylisa', '1996-08-17', 'MARDANI', 1, 1),
(32, 111210006, 'Chehtiar Denis Piaratama', '1996-06-17', 'DEDI HERYADI', 2, 1),
(33, 111210005, 'Cintya Fahyuliani Putri', '1996-01-07', 'BAMBANG SUHARNOKO', 1, 1),
(34, 111210012, 'Desy Dwi Lestari', '1996-03-17', 'INDRA PURNAMA', 2, 1),
(35, 111210021, 'Dewi Lestari', '1995-03-10', 'DEDI DODO TASWANDI', 1, 1),
(36, 111210026, 'Erlina Devi Oktaviani', '1995-12-11', 'KHUSIN', 1, 1),
(37, 111210002, 'Feby Gustanti Dwi Alisya', '1995-10-18', 'H. TAWAJUD', 1, 1),
(38, 111210009, 'Mohammad Redi Ganjar', '1996-07-28', 'SIKIN', 1, 1),
(39, 111210023, 'Nindya Alifian Muliasari', '1996-07-12', 'H. MOCH. DJUSYANI', 2, 1),
(40, 111210037, 'Nuzul Aulad', '1996-04-23', 'Ir. RAZIF MUSA', 1, 1),
(41, 111210029, 'Romadona Krussita Dewi', '1996-09-10', 'ERI HERIYANTO', 1, 1),
(42, 111210137, 'Siti Nur Eka Anggraeni', '1996-07-10', 'SUWANA', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(10) NOT NULL,
  `nm_user` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nm_user`, `email`, `status`) VALUES
(1, 'admin', 'admin@spk.com', 1),
(2, 'petugas', 'petugas@spk.com', 2),
(9, 'petugas2', 'petugas2@mail.com', 0),
(10, 'user', 'user@user.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_alternatif`
--
ALTER TABLE `tb_alternatif`
  ADD PRIMARY KEY (`id_alternatif`),
  ADD KEY `knsosb` (`knsosb`,`ktq`,`khm`),
  ADD KEY `knfsa` (`knfsa`),
  ADD KEY `knksa` (`knksa`),
  ADD KEY `knbsa` (`knbsa`),
  ADD KEY `knsesa` (`knsesa`),
  ADD KEY `kngsa` (`kngsa`),
  ADD KEY `knesa` (`knesa`),
  ADD KEY `knsosa` (`knsosa`),
  ADD KEY `knmsb` (`knmsb`),
  ADD KEY `knfsb` (`knfsb`),
  ADD KEY `knksb` (`knksb`),
  ADD KEY `knbsb` (`knbsb`),
  ADD KEY `knsesb` (`knsesb`),
  ADD KEY `ktq` (`ktq`),
  ADD KEY `khm` (`khm`),
  ADD KEY `kngsb` (`kngsb`,`knesb`),
  ADD KEY `knesb` (`knesb`),
  ADD KEY `knmsa_2` (`knmsa`,`knfsa`,`knksa`,`knbsa`,`knsesa`,`kngsa`,`knesa`,`knsosa`,`knmsb`,`knfsb`,`knksb`,`knbsb`,`knsesb`,`kngsb`,`knesb`);

--
-- Indexes for table `tb_hasil`
--
ALTER TABLE `tb_hasil`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `id_nilai` (`id_nilai`),
  ADD KEY `id_alternatif` (`id_alternatif`);

--
-- Indexes for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`id_kriteria`),
  ADD KEY `id_kriteriagroup` (`id_kriteriagroup`);

--
-- Indexes for table `tb_kriteriagroup`
--
ALTER TABLE `tb_kriteriagroup`
  ADD PRIMARY KEY (`id_kriteriagroup`);

--
-- Indexes for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `knmsa` (`knmsa`,`knfsa`,`knksa`,`knbsa`,`knsesa`,`kngsa`,`knesa`,`knsosa`,`knmsb`,`knfsb`,`knksb`,`knbsb`,`knsesb`),
  ADD KEY `knsosb` (`knsosb`,`ktq`,`khm`),
  ADD KEY `knfsa` (`knfsa`),
  ADD KEY `knksa` (`knksa`),
  ADD KEY `knbsa` (`knbsa`),
  ADD KEY `knsesa` (`knsesa`),
  ADD KEY `kngsa` (`kngsa`),
  ADD KEY `knesa` (`knesa`),
  ADD KEY `knsosa` (`knsosa`),
  ADD KEY `knmsb` (`knmsb`),
  ADD KEY `knfsb` (`knfsb`),
  ADD KEY `knksb` (`knksb`),
  ADD KEY `knbsb` (`knbsb`),
  ADD KEY `knsesb` (`knsesb`),
  ADD KEY `ktq` (`ktq`),
  ADD KEY `khm` (`khm`),
  ADD KEY `kngsb` (`kngsb`,`knesb`),
  ADD KEY `knesb` (`knesb`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_alternatif`
--
ALTER TABLE `tb_alternatif`
  MODIFY `id_alternatif` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_hasil`
--
ALTER TABLE `tb_hasil`
  MODIFY `id_hasil` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  MODIFY `id_kriteria` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT for table `tb_kriteriagroup`
--
ALTER TABLE `tb_kriteriagroup`
  MODIFY `id_kriteriagroup` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id_nilai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_petugas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD CONSTRAINT `tb_admin_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Constraints for table `tb_hasil`
--
ALTER TABLE `tb_hasil`
  ADD CONSTRAINT `tb_hasil_ibfk_1` FOREIGN KEY (`id_nilai`) REFERENCES `tb_nilai` (`id_nilai`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_hasil_ibfk_2` FOREIGN KEY (`id_alternatif`) REFERENCES `tb_alternatif` (`id_alternatif`) ON DELETE NO ACTION;

--
-- Constraints for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD CONSTRAINT `tb_kriteria_ibfk_1` FOREIGN KEY (`id_kriteriagroup`) REFERENCES `tb_kriteriagroup` (`id_kriteriagroup`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD CONSTRAINT `tb_nilai_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `tb_siswa` (`id_siswa`) ON DELETE CASCADE;

--
-- Constraints for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD CONSTRAINT `tb_petugas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
