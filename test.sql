-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2022 at 05:23 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `dbemploye`
--

CREATE TABLE `dbemploye` (
  `id` bigint(255) NOT NULL,
  `nik` varchar(55) DEFAULT NULL,
  `nama` varchar(55) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `insert_date` varchar(50) DEFAULT NULL,
  `inser_by` varchar(5) DEFAULT NULL,
  `update_date` varchar(50) DEFAULT NULL,
  `update_by` varchar(5) DEFAULT NULL,
  `is_trash_date` varchar(50) DEFAULT NULL,
  `is_trash_by` varchar(5) DEFAULT NULL,
  `is_trash` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dbemploye`
--

INSERT INTO `dbemploye` (`id`, `nik`, `nama`, `alamat`, `insert_date`, `inser_by`, `update_date`, `update_by`, `is_trash_date`, `is_trash_by`, `is_trash`) VALUES
(1, '01345676555', 'AHMAD RAHMADI MAULANA', 'ASD', NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(6, '01345676555', 'AHMAD RAHMADI MAULANA', 'ASD', NULL, NULL, NULL, NULL, NULL, NULL, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dbemploye`
--
ALTER TABLE `dbemploye`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dbemploye`
--
ALTER TABLE `dbemploye`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
