-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2019 at 04:24 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `Time` varchar(30) NOT NULL,
  `Statement` varchar(140) NOT NULL,
  `Price` int(11) NOT NULL,
  `UserId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`Time`, `Statement`, `Price`, `UserId`) VALUES
('7:35:50', 'Luxury Double Suite * 0 , \r\n            Luxury Single Room * 0 , \r\n            Luxury Double Suite * 0 , \r\n            Family Room * 8 , \r\n ', 100197, NULL),
('2019-10-16 7:39:9', 'Luxury Double Suite * 0 , \n            Luxury Single Room * 0 , \n            Luxury Double Suite * 0 , \n            Family Room * 0 , \n     ', 100197, NULL),
('2019-10-16 7:48:31', 'Luxury Double Suite * 5 , \n            Luxury Single Room * 0 , \n            Luxury Double Suite * 0 , \n            Family Room * 0 , \n     ', 100197, NULL),
('2019-10-16 7:50:49', 'Luxury Double Suite * 5 , \n            Luxury Single Room * 2 , \n            Luxury Double Suite * 5 , \n            Family Room * 0 , \n     ', 100197, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
