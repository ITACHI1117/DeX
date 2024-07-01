-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2024 at 09:22 AM
-- Server version: 10.4.32-MariaDB-log
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dex_hire_purchase`
--

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE `balance` (
  `id` varchar(200) NOT NULL,
  `duration` varchar(200) NOT NULL,
  `total_amount_to_be_paid` int(200) NOT NULL,
  `amount_per_month` int(200) NOT NULL,
  `ap_plus_dp` int(200) NOT NULL,
  `amount_remaining` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `balance`
--

INSERT INTO `balance` (`id`, `duration`, `total_amount_to_be_paid`, `amount_per_month`, `ap_plus_dp`, `amount_remaining`) VALUES
('6678835bb2d5cf7ef', '36', 55350000, 1537500, 5337500, 50012500);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` varchar(200) NOT NULL,
  `duration` int(200) NOT NULL,
  `start_date` varchar(200) NOT NULL,
  `end_date` varchar(200) NOT NULL,
  `down_payment` int(200) NOT NULL,
  `amount_per_month` int(200) NOT NULL,
  `remaining_payment` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `duration`, `start_date`, `end_date`, `down_payment`, `amount_per_month`, `remaining_payment`) VALUES
('6678835bb2d5cf7ef', 36, 'Mon_Jul_01_2024', 'Thu_Jul_01_2027', 3800000, 1537500, 35);

-- --------------------------------------------------------

--
-- Table structure for table `personal_details_and_paymentinfo`
--

CREATE TABLE `personal_details_and_paymentinfo` (
  `id` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `mobile_number` int(200) NOT NULL,
  `home_address` varchar(200) NOT NULL,
  `car_name` varchar(200) NOT NULL,
  `car_type` varchar(200) NOT NULL,
  `car_year` varchar(200) NOT NULL,
  `car_power` varchar(200) NOT NULL,
  `car_transmission` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `payment` varchar(200) NOT NULL,
  `ammount_paid` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personal_details_and_paymentinfo`
--

INSERT INTO `personal_details_and_paymentinfo` (`id`, `title`, `firstname`, `lastname`, `mobile_number`, `home_address`, `car_name`, `car_type`, `car_year`, `car_power`, `car_transmission`, `price`, `payment`, `ammount_paid`) VALUES
('REF17198183925013', 'Mr', 'Ajogu', 'Joseph', 2147483647, 'crawford', 'Land Cruiser', 'Full-Size Luxury', '2023', 'Petrol', 'Manual', '55350000', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `fullname`, `password`) VALUES
('66780c4f27c476c29', 'ikechukwungene11@gmail.com', 'ngene ikechukwu', '$2y$10$SrJysRwRRi3VC1IMLDh1g.wCcqjU7EYpQcJ8UlrtsOwnGXLSpmFn6'),
('667810dc30f887c9e', 'vickyajayi05@gmail.com', 'victor', '$2y$10$/YSL7u8ua0.StSY6YJWB0uro/RMNBoaRVp5yTgzAJvM3cwrq79xkG'),
('6678835bb2d5cf7ef', 'ajogujoseph0317@gmail.com', 'Ajogu Joseph', '$2y$10$8.ipXIsmSxRke45tKimhhORTglHu5i7pRxFRDsKRKK5QJ4GP9NGZ2'),
('667aa85d617858814', 'obakpoloriwinosa@mail.com', 'Obakpolor Lord\'s-Doing', '$2y$10$4lnu9reb/XdPcFf3D0S7Yu8WBQOjoiKOu8Mm/UQ23topJ0H.GRrWS'),
('6681ded522ab45e13', 'aj@mail.com', 'Joseph Ajogu', '$2y$10$4iWYYUxc6cjaIR/S7rFN0OGbBgtX7vfVdloNMa6UBYvEiIJy/Kq.y');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `year` varchar(200) NOT NULL,
  `power` varchar(200) NOT NULL,
  `transmission` varchar(200) NOT NULL,
  `price` int(200) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `name`, `type`, `year`, `power`, `transmission`, `price`, `img`) VALUES
(1, 'Land Cruiser', 'Full-Size Luxury', '2023', 'Petrol', 'Manual', 55350000, 'uploads/landcruiser.png'),
(2, 'Corolla Cross', 'Well-Rounded', '2022', 'Petrol', 'Automatic', 28000000, 'uploads/corolla.png'),
(3, '4Runner', 'Resourceful', '2022', 'Petrol', 'Automatic', 35500000, 'uploads/4runner.png'),
(4, 'GR Supra', 'Compact & Sleek', '2024', 'Electric', 'Automatic', 45000000, 'uploads/grsupra.png'),
(5, 'Tacoma i-FORCE MAX', 'Groundbreaking', '2023', 'Diesel', 'Manual', 34500000, 'uploads/tacoma.png'),
(6, 'Mirai ', 'Adventurous', '2024', 'Petrol', 'Automatic', 25000000, 'uploads/maira.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `personal_details_and_paymentinfo`
--
ALTER TABLE `personal_details_and_paymentinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
