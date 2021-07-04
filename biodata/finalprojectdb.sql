-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2021 at 12:02 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finalprojectdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bio_data_tbl`
--

CREATE TABLE `bio_data_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city_address` varchar(255) NOT NULL,
  `provincial_address` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `date_of_birth` varchar(255) NOT NULL,
  `civil_status` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `lengwahe` varchar(255) NOT NULL,
  `fathers_name` varchar(255) NOT NULL,
  `mothers_name` varchar(255) NOT NULL,
  `salita` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `cell_phone` varchar(255) NOT NULL,
  `place_of_birth` varchar(255) NOT NULL,
  `citizenship` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `fathers_occupation` varchar(255) NOT NULL,
  `mothers_occupation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bio_data_tbl`
--

INSERT INTO `bio_data_tbl` (`id`, `name`, `city_address`, `provincial_address`, `email_address`, `date_of_birth`, `civil_status`, `height`, `religion`, `lengwahe`, `fathers_name`, `mothers_name`, `salita`, `sex`, `cell_phone`, `place_of_birth`, `citizenship`, `weight`, `occupation`, `fathers_occupation`, `mothers_occupation`) VALUES
(4, 'John David Sadia Lozano', '230 sT. pETER STREET', 'asdasd', 'lozanojohndavid@gmail.com', '1994-03-31', 'Single', '168 CM', 'Islam', 'Filipino', 'David James Lozano Sr.', 'Adora Lozano', '', 'M', '09956425669', 'Quezon City', 'Quezon City', '200 lbs', 'Developer', 'Desease', 'adasd'),
(25, 'cc', 'cc', 'd', 'd', '1994-03-31', 'd', 'd', 'd', 'd', 'd', 'd', '', 'd', 'd', 'd', 'd', 'd', 'd', 'd', 'vv');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bio_data_tbl`
--
ALTER TABLE `bio_data_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bio_data_tbl`
--
ALTER TABLE `bio_data_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
