-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2018 at 05:47 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `repair`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `access` enum('Employee','Administrasi IT Support','Manager IT','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `access`) VALUES
(1, 'manager', '7815696ecbf1c96e6894b779456d330e', 'Manager IT'),
(2, 'employee', '7815696ecbf1c96e6894b779456d330e', 'Employee'),
(3, 'admin', '7815696ecbf1c96e6894b779456d330e', 'Administrasi IT Support');

-- --------------------------------------------------------

--
-- Table structure for table `repair_request`
--

CREATE TABLE `repair_request` (
  `id` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `perangkat` varchar(255) NOT NULL,
  `kerusakan` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `create_date` datetime DEFAULT NULL,
  `user_create` varchar(255) DEFAULT NULL,
  `process_date` datetime DEFAULT NULL,
  `user_repair` varchar(255) DEFAULT NULL,
  `done_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `repair_request`
--

INSERT INTO `repair_request` (`id`, `kode`, `perangkat`, `kerusakan`, `status`, `create_date`, `user_create`, `process_date`, `user_repair`, `done_date`) VALUES
(1, 'RR/2018/10/000001', 'CPU', 'Blue Screen', 'Menunggu Antrian', '2018-10-19 00:00:00', 'asd', NULL, NULL, NULL),
(3, 'RR/Manual2', 'Mouse', 'Kabur', 'Proses Perbaikan', '2018-10-19 04:31:31', 'asda', '2018-10-19 05:32:21', 'aa', NULL),
(4, 'RR/Manual3', 'monitor', 'mati', 'Menunggu Antrian', '2018-10-19 04:32:53', 'asdad', NULL, NULL, NULL),
(5, 'RR/Employe1', 'Mouse', 'Kabel Putus', 'Proses Perbaikan', '2018-10-19 04:33:52', 'Employee', '2018-10-19 05:33:34', 'aan', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repair_request`
--
ALTER TABLE `repair_request`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `repair_request`
--
ALTER TABLE `repair_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
