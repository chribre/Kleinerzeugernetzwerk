-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2020 at 05:10 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kleinerzeugernetzwerk`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_token`
--

CREATE TABLE `access_token` (
  `token_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` text NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `access_token`
--

INSERT INTO `access_token` (`token_id`, `user_id`, `token`, `created_time`) VALUES
(1, 16, 'AW03330105fca53fce97d87.49003284', '2020-12-04 15:21:32'),
(2, 16, 'AW03330105fca731fb5e856.97079431', '2020-12-04 17:34:23'),
(3, 16, 'AW03330105fcddb665bb8d9.90991896', '2020-12-07 07:36:06'),
(4, 16, 'AW03330105fcde8ba7deb20.27684961', '2020-12-07 08:32:58'),
(5, 16, 'AW03330105fce30cce97672.39648414', '2020-12-07 13:40:28'),
(6, 16, 'AW03330105fce4598a9aa41.65503189', '2020-12-07 15:09:12');

-- --------------------------------------------------------

--
-- Table structure for table `farm_land`
--

CREATE TABLE `farm_land` (
  `farm_id` int(11) NOT NULL,
  `producer_id` int(11) NOT NULL,
  `farm_name` varchar(50) NOT NULL,
  `farm_address` text NOT NULL,
  `farm_location` point NOT NULL,
  `farm_area` double DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feature_type`
--

CREATE TABLE `feature_type` (
  `feature_type_id` int(11) NOT NULL,
  `feature_name` varchar(60) NOT NULL,
  `feature_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feature_type`
--

INSERT INTO `feature_type` (`feature_type_id`, `feature_name`, `feature_description`) VALUES
(1, 'Bio', 'Bio food is food produced by methods complying with the standards of organic farming.'),
(2, 'Vegan', 'Vegan'),
(3, 'Vegetarian', 'Vegetarian'),
(4, 'Non-vegetarian', 'Non-vegetarian');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `producer_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_description` text NOT NULL,
  `product_category` int(11) NOT NULL,
  `is_processed_product` tinyint(1) NOT NULL,
  `is_available` tinyint(1) NOT NULL,
  `price_per_unit` float NOT NULL,
  `unit` int(11) NOT NULL,
  `product_rating` float DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `producer_id`, `product_name`, `product_description`, `product_category`, `is_processed_product`, `is_available`, `price_per_unit`, `unit`, `product_rating`, `created_date`) VALUES
(7, 16, 'test', 'test data', 1, 1, 1, 11, 1, 0, '2020-12-07 14:04:40'),
(8, 16, 'new product', 'test product description', 1, 1, 1, 125.23, 1, 0, '2020-12-07 14:05:48'),
(9, 16, 'test', 'fgeggfg', 1, 1, 1, 334, 1, 0, '2020-12-07 14:09:06'),
(10, 16, 'dvsdv', 'vxcvxc', 1, 1, 1, 123, 1, 0, '2020-12-07 14:10:15');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(60) NOT NULL,
  `category_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`category_id`, `category_name`, `category_description`) VALUES
(1, 'Vegitables', 'Vegitables'),
(2, 'Fruits', 'Fruits'),
(3, 'Dairy Products', 'Dairy Products'),
(4, 'Honey', 'Honey'),
(5, 'Oil', 'Oil'),
(6, 'Egg', 'Egg'),
(7, 'Meat', 'Meat'),
(8, 'Seafood', 'Seafood'),
(9, 'Desserts', 'Desserts'),
(10, 'Cereals', 'Cereals'),
(11, 'Baked goods', 'Baked goods'),
(12, 'Dried food products', 'Dried foods');

-- --------------------------------------------------------

--
-- Table structure for table `product_feature`
--

CREATE TABLE `product_feature` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `feature_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `salutations` varchar(5) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `street` varchar(50) NOT NULL,
  `house_number` varchar(10) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `user_type` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_blocked` tinyint(1) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `profile_image_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='stores user information';

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `salutations`, `first_name`, `middle_name`, `last_name`, `dob`, `street`, `house_number`, `zip`, `city`, `country`, `phone`, `email`, `mobile`, `user_type`, `is_active`, `is_blocked`, `created_date`, `profile_image_name`) VALUES
(1, 'Mr', 'Fredy', NULL, 'Davis', '1993-11-02', 'Brodaer Starsse', '4', '17003', 'Neubrandenburg', 'Germany', '', 'fredy@gmail.com', '17630142345', 1, 1, 0, '2020-11-14 18:00:41', NULL),
(2, 'Mr.', '123', '32443', '453', '0000-00-00', 'hgh', 'hv', 'hjvhj', 'vjhv', 'jhv', 'jhv', 'jhv', 'jhv', 1, 1, 0, '2020-11-15 11:29:54', NULL),
(3, 'Mr.', '12e', '32443', 'fghfg', '0000-00-00', 'hgh', 'hv', 'hjvhj', 'vjhv', 'jhv', 'jhv', 'jhv', 'jhv', 1, 1, 0, '2020-11-15 11:30:35', NULL),
(4, 'Mr.', 'First name', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 1, 1, 0, '2020-11-15 15:27:19', NULL),
(5, 'Mr.', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 1, 1, 0, '2020-11-15 16:35:25', NULL),
(6, 'Mr.', '12e', 'ghnfgfgh', '453', '0000-00-00', 'hgh', 'hv', 'hjvhj', 'vjhv', 'jhv', 'jhv', 'fredythekkekkara@gmail.com', 'jhv', 1, 1, 0, '2020-11-15 21:50:55', NULL),
(7, 'Mr.', '12e', 'ghnfgfgh', '453', '0000-00-00', 'hgh', 'hv', 'hjvhj', 'vjhv', 'jhv', 'jhv', 'fredythekkekkara@gmail.com', 'jhv', 1, 1, 0, '2020-11-15 21:51:18', NULL),
(8, 'Mr.', '12e', 'ghnfgfgh', '453', '0000-00-00', 'hgh', 'hv', 'hjvhj', 'vjhv', 'jhv', 'jhv', 'fredythekkekkara@gmail.com', 'jhv', 1, 1, 0, '2020-11-15 21:51:40', NULL),
(9, 'Mr.', '12e', 'ghnfgfgh', '453', '0000-00-00', 'hgh', 'hv', 'hjvhj', 'vjhv', 'jhv', 'jhv', 'fredythekkekkara@gmail.com', 'jhv', 1, 1, 0, '2020-11-15 22:39:41', NULL),
(10, 'Mr.', 'Fredy', 'Davis', 'Thekkekkara', '0000-00-00', 'Brodaer Strasse', '4', '17033', 'NB', 'De', '9846194609', 'fredythekkekkara@gmail.com123', '17063142345', 1, 1, 0, '2020-11-16 08:10:49', NULL),
(11, 'Mr.', '123', '32443', '453', '0000-00-00', 'hgh', 'hv', '17033', 'Kochi', 'India', '9846194609', 'fredy123@gmail.com', '17063142345', 1, 1, 0, '2020-11-18 10:56:10', NULL),
(14, 'Mr.', 'Fredy', 'Davis', 'Thekkekkara', '0000-00-00', 'Brodaer Strasse', 'Helo', '17033', 'Neubrandenburg', 'Germany', '9846194609', 'FREDZ@GMAIL.COM', '17063142345', 1, 1, 0, '2020-11-18 11:17:58', NULL),
(15, 'Mr.', 'qq', 'q', 'qq', '0000-00-00', 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', 1, 1, 0, '2020-11-18 11:18:36', NULL),
(16, 'Mr.', 'abc', 'abc', 'abc', '0000-00-00', 'abc', 'abc', 'abc', 'abc', 'abc', 'abc', 'abc@abc.com', 'v', 1, 1, 0, '2020-11-18 11:20:18', NULL),
(17, 'Mr.', 'test', 'test', 'test', '0000-00-00', 'Brodaer StraÃŸe', '4', '17033', 'Neubrandenburg', 'DE', '453453453', 'test', '123454678', 1, 1, 0, '2020-11-27 14:23:58', NULL),
(18, 'Mr.', 'zz', 'zz', 'zzz', '0000-00-00', 'zzzz', '98645', '5661', 'Neubrandenburg', 'a', '1234567890', 'zzz', '12345896556', 1, 1, 0, '2020-11-27 18:16:32', NULL),
(19, 'Mr.', 'test', 'fdfg', 'dfgdfg', '0000-00-00', 'a', '4', '17033', 'Neubrandenburg', 'DE', '1234567890', 'abc@abc.com1', '12345896556', 1, 1, 0, '2020-12-01 09:24:27', NULL),
(20, 'Mr.', 'test', 'test', 'test', '0000-00-00', 'Brodaer Straße', '4', '17033', 'Neubrandenburg', 'DE', '1234567890', 'abc@abc.com123', '12345896556', 1, 1, 0, '2020-12-01 09:28:15', NULL),
(21, 'Mr.', 'test', 'test', 'test', '0000-00-00', 'Brodaer Straße', '4', '17033', 'Neubrandenburg', 'DE', '1234567890', 'abc@abc123', '12345896556', 1, 1, 0, '2020-12-01 09:30:12', NULL),
(22, 'Mr.', 'test', 'test', 'dfgdfg', '0000-00-00', 'Brodaer Straße', '4', '17033', 'Neubrandenburg', 'DE', '1234567890', 'abc@abc.com1234', '12345896556', 1, 1, 0, '2020-12-01 09:37:06', NULL),
(23, 'Mr.', 'test', 'test', 'test', '0000-00-00', 'a', '4', '17033', 'Neubrandenburg', 'DE', '1234567890', 'abc@abc.com1111', '12345896556', 1, 1, 0, '2020-12-01 09:41:17', NULL),
(24, 'Mr.', 'test', 'test', 'test', '0000-00-00', 'Brodaer Straße', '4', '17033', 'Neubrandenburg', 'DE', '1234567890', 'abc@abc.com12345', '12345896556', 1, 1, 0, '2020-12-01 09:44:58', NULL),
(25, 'Mr.', 'test', 'test', 'test', '0000-00-00', 'Brodaer Straße', '4', '17033', 'Neubrandenburg', 'DE', '3515648684', 'abc@abc.co.in', '12345896556', 1, 1, 0, '2020-12-01 09:49:43', NULL),
(26, 'Mr.', 'test', 'test', 'test', '0000-00-00', 'Brodaer Straße', '4', '17033', 'Neubrandenburg', 'DE', '1234567890', 'abc@abc.comqwertz', '12345896556', 1, 1, 0, '2020-12-01 09:51:22', NULL),
(27, 'Mr.', 'test', 'test', 'test', '0000-00-00', 'Brodaer Straße', '4', '17033', 'Neubrandenburg', 'DE', '1234567890', 'abc@abc.comyyy', '12345896556', 1, 1, 0, '2020-12-01 09:52:49', NULL),
(28, 'Mr.', 'test', 'ghng', 'nfgn', '0000-00-00', 'fgn', 'fgn', 'sfgn', 'sfgn', 'sfg', 'sdfb', 'asdfghjklö', 'sfb', 1, 1, 0, '2020-12-01 09:54:36', NULL),
(29, 'Mr.', 'sxasx', 'asxas', 'xasxasx', '0000-00-00', 'asxax', 'asxasx', 'asxasx', 'asxas', 'xasxasx', 'asxasx', 'axaxaxax', 'asxasx', 1, 1, 0, '2020-12-01 09:57:55', NULL),
(30, 'Mr.', 'saxax', 'asxaxa', 'sxasx', '0000-00-00', 'asxasx', 'asxasx', 'asxasx', 'asxasx', 'asxasx', 'asxax', 'asxasx', 'asxasx', 1, 1, 0, '2020-12-01 10:04:35', NULL),
(31, 'Mr.', 'asdf', 'asdd', 'asdasd', '0000-00-00', 'asdas', 'asdasd', 'asdasd', 'asdasd', 'asda', 'asdasd', 'asdasdasd', 'asdas', 1, 1, 0, '2020-12-01 10:06:06', NULL),
(32, 'Mr.', 'bbbgbf', 'gbfgbfgb', 'fgbfbg', '0000-00-00', 'fgbfb', 'fgbfgb', 'fgbfgb', 'fgbfbg', 'fgbf', 'bfgbfgb', 'ffffffffffff', 'fgbfbgfgbfg', 1, 1, 0, '2020-12-01 10:29:20', '5fc61b0078c5d3.94614348.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_credential`
--

CREATE TABLE `user_credential` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='table to save user name and password of each users';

--
-- Dumping data for table `user_credential`
--

INSERT INTO `user_credential` (`id`, `user_id`, `user_name`, `password`) VALUES
(1, 14, 'FREDZ@GMAIL.COM', 'TEST123'),
(2, 15, 'q', 'q'),
(3, 16, 'abc@abc.com', 'abc'),
(4, 17, 'test', 'test'),
(5, 18, 'zzz', 'zzz'),
(6, 19, 'abc@abc.com1', 'abc'),
(7, 20, 'abc@abc.com123', '123'),
(8, 21, 'abc@abc123', '123'),
(9, 22, 'abc@abc.com1234', '1234'),
(10, 23, 'abc@abc.com1111', 'qwert'),
(11, 24, 'abc@abc.com12345', 'qwert'),
(12, 25, 'abc@abc.co.in', 'abc'),
(13, 26, 'abc@abc.comqwertz', 'qwertz'),
(14, 27, 'abc@abc.comyyy', 'yyy'),
(15, 28, 'asdfghjklö', 'asd'),
(16, 29, 'axaxaxax', 'axa'),
(17, 30, 'asxasx', 'asd'),
(18, 31, 'asdasdasd', 'asdasd'),
(19, 32, 'ffffffffffff', 'fff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_token`
--
ALTER TABLE `access_token`
  ADD PRIMARY KEY (`token_id`);

--
-- Indexes for table `farm_land`
--
ALTER TABLE `farm_land`
  ADD PRIMARY KEY (`farm_id`),
  ADD KEY `user_to_farm_land` (`producer_id`);

--
-- Indexes for table `feature_type`
--
ALTER TABLE `feature_type`
  ADD PRIMARY KEY (`feature_type_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `product_feature`
--
ALTER TABLE `product_feature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_credential`
--
ALTER TABLE `user_credential`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_token`
--
ALTER TABLE `access_token`
  MODIFY `token_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `farm_land`
--
ALTER TABLE `farm_land`
  MODIFY `farm_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feature_type`
--
ALTER TABLE `feature_type`
  MODIFY `feature_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_feature`
--
ALTER TABLE `product_feature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user_credential`
--
ALTER TABLE `user_credential`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `farm_land`
--
ALTER TABLE `farm_land`
  ADD CONSTRAINT `user_to_farm_land` FOREIGN KEY (`producer_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `user_credential`
--
ALTER TABLE `user_credential`
  ADD CONSTRAINT `user_credential_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
