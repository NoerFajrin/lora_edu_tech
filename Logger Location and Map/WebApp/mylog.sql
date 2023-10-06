-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2023 at 06:14 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `mylog`
--

CREATE TABLE `mylog` (
  `id` int(11) NOT NULL,
  `nama_user` varchar(255) DEFAULT NULL,
  `temperature` float DEFAULT NULL,
  `humidity` float DEFAULT NULL,
  `heart_rate` int(11) DEFAULT NULL,
  `lat` decimal(10,6) DEFAULT NULL,
  `lon` decimal(10,6) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mylog`
--

INSERT INTO `mylog` (`id`, `nama_user`, `temperature`, `humidity`, `heart_rate`, `lat`, `lon`, `timestamp`) VALUES
(1, 'Mila', 25.5, 60.2, 75, -8.340500, 115.092000, '2023-10-06 09:39:17'),
(2, 'Dharma', 25.5, 60.2, 75, -6.208800, 106.845600, '2023-10-06 09:40:39'),
(3, 'Dharma', 25.5, 60.2, 75, -6.208800, 106.845600, '2023-10-06 09:41:12'),
(4, 'RinRin', 31, 63, 94, -6.302000, 106.899400, '2023-10-06 09:41:21'),
(5, 'RinRin', 31, 63, 95, -6.135600, 106.813400, '2023-10-06 09:41:29'),
(6, 'RinRin', 31, 63, 91, -6.135600, 106.813400, '2023-10-06 09:41:36'),
(7, 'Mila', 25.5, 60.2, 75, -8.340500, 115.092000, '2023-10-06 09:41:58'),
(8, 'Mila', 25.5, 60.2, 75, -6.208800, 106.845600, '2023-10-06 09:58:05'),
(9, 'Dharma', 25.5, 60.2, 75, -6.208800, 106.845600, '2023-10-06 09:58:56'),
(10, 'Dharma', 25.5, 60.2, 75, -6.899200, 107.618600, '2023-10-06 10:22:44'),
(11, 'Dharma', 25.5, 60.2, 75, -6.899200, 107.618600, '2023-10-06 10:22:51'),
(12, 'Mila', 25.5, 60.2, 75, -8.409500, 115.188900, '2023-10-06 10:31:56'),
(13, 'Shinta', 25.5, 60.2, 75, -6.999200, 106.618600, '2023-10-06 10:37:15'),
(14, 'Shinta', 25.5, 60.2, 75, -6.299200, 108.618600, '2023-10-06 10:38:23'),
(15, 'Shinta', 25.5, 60.2, 75, -6.299200, 108.618600, '2023-10-06 10:38:25'),
(16, 'Yudha', 25.5, 60.2, 75, -7.899200, 108.618600, '2023-10-06 10:39:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mylog`
--
ALTER TABLE `mylog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mylog`
--
ALTER TABLE `mylog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
