-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2021 at 05:40 PM
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
(6, 16, 'AW03330105fce4598a9aa41.65503189', '2020-12-07 15:09:12'),
(7, 16, 'AW03330105fcf30795e4762.52068078', '2020-12-08 07:51:21'),
(8, 16, 'AW03330105fd07dddc26a63.14003957', '2020-12-09 07:33:49'),
(9, 16, 'AW03330105fd08515ab4367.44310302', '2020-12-09 08:04:37'),
(10, 16, 'AW03330105fd09c31bac596.47292057', '2020-12-09 09:43:13'),
(11, 16, 'AW03330105fd2229d184e37.03329091', '2020-12-10 13:29:01'),
(12, 16, 'AW03330105fd37a10be2968.31721229', '2020-12-11 13:54:24'),
(13, 16, 'AW03330105fd4c926b55135.63044160', '2020-12-12 13:44:06'),
(14, 16, 'AW03330105fd4ff0c579cb7.40426128', '2020-12-12 17:34:04'),
(15, 16, 'AW03330105fd714d99aeb66.43884836', '2020-12-14 07:31:37'),
(16, 16, 'AW03330105fd7660bb84e68.59733998', '2020-12-14 13:18:03'),
(17, 16, 'AW03330105fd770f257f8a3.21193271', '2020-12-14 14:04:34'),
(18, 16, 'AW03330105fd775bdd26231.39235455', '2020-12-14 14:25:01'),
(19, 16, 'AW03330105fd9bc93d843a8.43535785', '2020-12-16 07:51:47'),
(21, 16, 'AW03330105fda1d03792459.65584962', '2020-12-16 14:43:15'),
(22, 16, 'AW03330105fdb56a3c31c20.24636917', '2020-12-17 13:01:23'),
(23, 16, 'AW03330105fdcad8240a0a0.54598902', '2020-12-18 13:24:18'),
(24, 16, 'AW03330105fddd5b2ec9d49.93435085', '2020-12-19 10:28:02'),
(25, 16, 'AW03330105fe056c527ed85.47332443', '2020-12-21 08:03:17'),
(26, 16, 'AW03330105fe0a5b6216ce1.60350281', '2020-12-21 13:40:06'),
(27, 16, 'AW03330105fe1b77d8f3892.65600463', '2020-12-22 09:08:13'),
(28, 16, 'AW03330105fe34ed43b1181.04079260', '2020-12-23 14:06:12'),
(29, 16, 'AW03330105fe35c5988b675.29594547', '2020-12-23 15:03:53'),
(30, 16, 'AW03330105fe9b948379179.73281716', '2020-12-28 10:54:00'),
(32, 16, 'AW03330105feb59b43634f1.03097853', '2020-12-29 16:30:44'),
(33, 16, 'AW03330105fed9ca80e4ef4.33584048', '2020-12-31 09:40:56'),
(36, 16, 'AW03330105ff06c4b3a7e72.76117348', '2021-01-02 12:51:23'),
(37, 16, 'AW03330105ff2d0d2012499.26691127', '2021-01-04 08:24:50'),
(38, 16, 'AW03330105ff42838c5de27.34204032', '2021-01-05 08:50:00'),
(39, 16, 'AW03330105ff483262684c7.75321198', '2021-01-05 15:17:58'),
(41, 16, 'AW03330105ff5bd0cc5b504.22825734', '2021-01-06 13:37:16'),
(42, 16, 'AW03330105ff714b1a74ae7.30617096', '2021-01-07 14:03:29'),
(43, 16, 'AW03330105ff83c0557e5d0.41936380', '2021-01-08 11:03:33'),
(44, 16, 'AW03330105ff98471103c55.06674635', '2021-01-09 10:24:49'),
(45, 16, 'AW03330105ffc0f1246e390.08545740', '2021-01-11 08:40:50');

-- --------------------------------------------------------

--
-- Table structure for table `farm_land`
--

CREATE TABLE `farm_land` (
  `farm_id` int(11) NOT NULL,
  `producer_id` int(11) NOT NULL,
  `farm_name` varchar(50) NOT NULL,
  `farm_desc` text DEFAULT NULL,
  `farm_address` text NOT NULL,
  `farm_location` point NOT NULL,
  `farm_area` double DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farm_land`
--

INSERT INTO `farm_land` (`farm_id`, `producer_id`, `farm_name`, `farm_desc`, `farm_address`, `farm_location`, `farm_area`, `created_date`) VALUES
(2, 16, 'Test Point', 'test farm land', 'Brodaer Straße 2, Neubrandenburg, 17033', 0x000000000101000000456458c51bc74a40bfdd488f957e2a40, 0, '2020-12-11 17:23:45'),
(3, 16, 'New Farm', 'Test Description of famr land', 'Dükerweg undefined, Neubrandenburg, 17033', 0x00000000010100000000000000000000000000000000000000, 0, '2020-12-12 13:47:09'),
(4, 16, 'Test Point 3', 'new test location', 'Brodaer Straße 4, Neubrandenburg, 17033', 0x000000000101000000ced60b4ff9c64a401aea6635137e2a40, 0, '2020-12-16 09:22:04'),
(5, 16, 'Marketplatz', 'A market, or marketplace, is a location where people regularly gather for the purchase and sale of provisions, livestock, and other goods.[1] In different parts of the world, a market place may be described as a souk (from the Arabic), bazaar (from the Persian), a fixed mercado (Spanish), or itinerant tianguis (Mexico), or palengke (Philippines). Some markets operate daily and are said to be permanent markets while others are held once a week or on less frequent specified days such as festival days and are said to be periodic markets. The form that a market adopts depends on its locality\'s population, culture, ambient and geographic conditions. The term market covers many types of trading, as market squares, market halls and food halls, and their different varieties. Due to this, marketplaces can be situated both outdoors and indoors.', 'Dorfstraße Ost 13, undefined, 16307', 0x0000000001010000002c69ad0130a44a406affff7fa0d12c40, 0, '2020-12-17 13:13:16'),
(6, 16, 'Test Point', 'this is my new production point', 'Gartenstraße 5a, Neubrandenburg, 17033', 0x000000000101000000ae4ee359d8c64a40a900006038892a40, 0, '2020-12-19 11:08:34'),
(7, 16, 'Test Point', 'hello', 'Binsenwerder 4-6, Neubrandenburg, 17033', 0x0000000001010000003e4e4560e2c64a4096ffffff657f2a40, 0, '2020-12-19 11:09:59'),
(8, 16, 'Test Point', 'hello', 'Binsenwerder 4-6, Neubrandenburg, 17033', 0x00000000010100000083970584d7c64a402bffff1f827f2a40, 0, '2020-12-19 11:11:21'),
(9, 16, 'Test Point 3', 'test', 'Binsenwerder 4-6, Neubrandenburg, 17033', 0x00000000010100000056ace8baeac64a40f6feff1f557f2a40, 0, '2020-12-19 11:18:41'),
(10, 16, '', '', 'Binsenwerder 3, Neubrandenburg, 17033', 0x000000000101000000cc19d264fac64a400e0100a03e7f2a40, 0, '2020-12-19 11:19:41'),
(11, 16, 'Test Point', '', '3.Ringstraße 321, Neubrandenburg, 17033', 0x000000000101000000b5fdbeca03c74a400900008087832a40, 0, '2020-12-19 11:20:47'),
(12, 16, '', '', 'Binsenwerder 1, Neubrandenburg, 17033', 0x000000000101000000338da266ecc64a406e0000c02d7f2a40, 0, '2020-12-19 11:28:54'),
(13, 16, '', '', 'Binsenwerder 4-6, Neubrandenburg, 17033', 0x000000000101000000c3b79e88efc64a40e6ffff7fa97f2a40, 0, '2020-12-19 11:29:30'),
(14, 16, 'Test Point', 'test', 'Binsenwerder 2, Neubrandenburg, 17033', 0x000000000101000000e2d7ff0be4c64a40cdffffdf1c7f2a40, 0, '2020-12-19 11:29:54'),
(15, 16, 'Marketplatz', 'test', 'Binsenwerder 2, Neubrandenburg, 17033', 0x00000000010100000097d559b1dbc64a40e8ffff5f337f2a40, 0, '2020-12-19 11:33:22'),
(16, 16, 'Test Point 3', 'test', 'Binsenwerder 1, Neubrandenburg, 17033', 0x000000000101000000c5e915beefc64a40f8feffffde7e2a40, 0, '2020-12-19 11:35:49');

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
(1, 'Bio EU', 'EU bio label'),
(2, 'Vegan', 'Vegan'),
(3, 'Vegetarian', 'Vegetarian'),
(4, 'Non-vegetarian', 'Non-vegetarian'),
(8, 'Lactose Free', 'This product is lactose free'),
(9, 'Bio', 'This product complies with organic guidelines'),
(10, 'Bio DE', 'The German state organic seal'),
(11, 'Gluten Free', 'This product doesn\'t contain gluten'),
(12, 'Naturland', 'Certified farmers and processing companies produce organic food according to the Naturland guidelines'),
(13, 'No Flavouring', 'No Flavouring'),
(14, 'No Coloring', 'No Coloring'),
(15, 'No Preservatives', 'No Preservatives');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL,
  `image_type` int(11) NOT NULL,
  `image_name` text NOT NULL,
  `entity_id` int(11) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `image_type`, `image_name`, `entity_id`, `createdDate`) VALUES
(1, 1, '74c2578b-b260-4255-8802-0233b32e98b9.jpg', 48, '2020-12-18 13:30:20'),
(2, 1, 'deb9dec0-f9f8-4b67-989b-0fca88ee3686.jpg', 51, '2020-12-18 13:30:20'),
(3, 1, '9ec1b169-88cd-4f72-9978-4474321c4bab.jpg', 51, '2020-12-18 13:30:20'),
(4, 1, 'c2c94e80-a9bf-4dd9-899b-57548d4105c4.png', 51, '2020-12-18 13:30:20'),
(5, 1, '80bde851-861a-46c5-aef8-308dfe6132ae.png', 52, '2020-12-18 13:30:20'),
(6, 1, '62c9cee8-3962-4505-9b75-eae382944325.jpg', 52, '2020-12-18 13:30:20'),
(7, 1, '8f609f40-586b-4e06-a1c6-a093e08166d2.jpg', 52, '2020-12-18 13:30:20'),
(8, 1, '49d2c7a0-3747-4a93-bafe-f640295736cf.png', 52, '2020-12-18 13:30:20'),
(9, 1, 'ee61f568-3c31-487c-83de-5f0e1ed84838.jpeg', 53, '2020-12-18 16:35:31'),
(10, 1, 'ad3f9450-b78a-4590-801d-2dd6975e34cc.jpg', 53, '2020-12-18 16:35:31'),
(11, 1, '039905d4-0540-40e8-ae04-7c2715e6d0be.jpg', 54, '2020-12-18 16:36:03'),
(12, 1, '09da3fb0-ceeb-4877-9f71-bbe4bebf2e35.jpg', 54, '2020-12-18 16:36:03'),
(13, 1, '2871f1f4-562f-4d22-8e3c-3d2a01d2541a.jpg', 55, '2020-12-18 16:37:19'),
(14, 1, '565c2415-d608-4dc8-9a75-2944f6497e85.jpg', 55, '2020-12-18 16:37:19'),
(15, 1, '97bd3c16-c751-4905-9596-7947a2613fb9.jpg', 55, '2020-12-18 16:37:19'),
(16, 1, '16d13cfe-2372-4937-ba70-d6633ed6f26c.jpg', 55, '2020-12-18 16:37:19'),
(17, 1, 'a9a7add0-4cd1-4687-97e7-65742cad324f.jpeg', 55, '2020-12-18 16:37:19'),
(18, 1, '33a90f5d-4c4c-4440-bb3b-2100f2c3769a.jpg', 55, '2020-12-18 16:37:19'),
(19, 1, 'c344dbcc-889a-4c91-9d02-1bc642cd21fd.jpg', 56, '2020-12-18 16:37:57'),
(20, 2, '9bfdb0a1-9165-4ecf-af0b-7e9e1b0d3d8c.jpg', 16, '2020-12-19 11:35:49'),
(21, 2, '85214677-95d0-4ae8-a8b1-2efb9695d7ea.jpg', 16, '2020-12-19 11:35:49'),
(22, 1, 'f5e92244-67ea-452c-ba6d-25fb06df98fe.jpg', 57, '2020-12-19 13:11:16'),
(23, 1, '9cbd6a72-c208-43d8-ad70-b3fefc3ff3fa.jpg', 57, '2020-12-19 13:11:16'),
(24, 1, 'edb178d1-9600-447b-961b-85af4f6adb7c.jpg', 57, '2020-12-19 13:11:16'),
(25, 1, '6de80b31-9b6b-4330-b4d1-597fe8c1adeb.jpg', 58, '2020-12-28 14:07:14'),
(26, 1, '7ac3c92c-6a4c-42b2-b105-a490ed31e50e.jpg', 58, '2020-12-28 14:07:14');

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
  `production_location` int(11) NOT NULL,
  `is_processed_product` tinyint(1) NOT NULL,
  `is_available` tinyint(1) NOT NULL,
  `price_per_unit` float NOT NULL,
  `quantity_of_price` float NOT NULL,
  `unit` int(11) NOT NULL,
  `product_rating` float DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `producer_id`, `product_name`, `product_description`, `product_category`, `production_location`, `is_processed_product`, `is_available`, `price_per_unit`, `quantity_of_price`, `unit`, `product_rating`, `created_date`) VALUES
(7, 16, 'test', 'test data', 1, 2, 1, 1, 11, 0, 1, 0, '2020-12-07 14:04:40'),
(20, 16, 'test', 'test435', 1, 3, 1, 1, 151, 1, 3, 0, '2020-12-16 10:49:34'),
(21, 16, 'Wild cranberries', 'fruity & slightly dry in taste\r\nWild cranberries from certified wild collection', 8, 3, 1, 1, 1.65, 220, 2, 0, '2020-12-17 13:10:54'),
(22, 16, 'Fruit spread forest fruit', 'There are many varieties of fruit preserves globally, distinguished by method of preparation, type of fruit used, and place in a meal. Sweet fruit preserves such as jams, jellies and marmalades are often eaten at breakfast on bread or as an ingredient of a pastry or dessert, whereas more savory and acidic preserves made from vegetable fruits such as tomato, squash or zucchini, are eaten alongside savoury foods such as cheese, cold meats, and curries.', 2, 5, 1, 1, 11, 500, 2, 0, '2020-12-17 13:14:49'),
(23, 16, 'TEST', 'test', 1, 5, 0, 1, 11, 1, 2, 0, '2020-12-17 13:32:44'),
(24, 16, 'test', 'test', 2, 5, 0, 1, 11, 1, 2, 0, '2020-12-17 13:33:48'),
(25, 16, 'test', 'test', 1, 3, 0, 1, 11, 1, 3, 0, '2020-12-17 13:34:43'),
(26, 16, 'test', 'test54545', 1, 3, 1, 1, 151, 1, 5, 0, '2020-12-17 13:40:36'),
(27, 16, 'Wild cranberries23423', 'teste1231', 1, 2, 1, 1, 11, 1, 2, 0, '2020-12-17 13:51:04'),
(28, 16, 'test', 'test new 23', 1, 2, 0, 1, 11, 1, 2, 0, '2020-12-17 13:52:45'),
(30, 16, 'uuuu', 'uuu', 1, 2, 0, 1, 11, 1, 3, 0, '2020-12-17 14:30:09'),
(31, 16, 'Wild cranberries', 'dfsdfs', 1, 2, 0, 1, 11, 1, 3, 0, '2020-12-17 14:31:25'),
(32, 16, 'Wild cranberries', 'ascasc', 1, 2, 0, 1, 11, 1, 2, 0, '2020-12-17 14:32:40'),
(33, 16, 'TEST', 'test', 2, 2, 0, 1, 11, 51, 2, 0, '2020-12-17 14:33:36'),
(34, 16, 'TEST', 'test', 2, 2, 0, 1, 11, 51, 2, 0, '2020-12-17 14:35:05'),
(35, 16, 'Fruit spread forest fruit', 'test', 1, 2, 0, 1, 11, 1, 2, 0, '2020-12-17 14:39:16'),
(36, 16, 'test', 'test', 1, 2, 0, 1, 11, 1, 2, 0, '2020-12-17 14:41:54'),
(37, 16, 'test', '', 1, 2, 0, 1, 11, 1, 2, 0, '2020-12-17 14:51:05'),
(38, 16, 'test', '', 1, 2, 0, 1, 11, 1, 2, 0, '2020-12-17 14:52:20'),
(40, 16, 'Fruit spread forest fruit123', '123', 1, 2, 0, 1, 11, 1, 2, 0, '2020-12-17 16:07:43'),
(54, 16, 'test', 'test', 2, 2, 0, 1, 11, 1, 2, 0, '2020-12-18 16:36:03'),
(55, 16, 'test', 'test', 1, 2, 0, 1, 11, 1, 2, 0, '2020-12-18 16:37:19'),
(57, 16, 'Minced Beef', 'Ground meat is used in a wide variety of dishes, by itself, or mixed with other ingredients. It may be formed into meatballs which are then fried, baked, steamed, or braised. They may be cooked on a skewer to produce dishes such as kabab koobideh, adana kebabı and ćevapi. It may be formed into patties which are then grilled or fried (hamburger), breaded and fried (menchi-katsu, Pozharsky cutlet), or braised (Salisbury steak). It may be formed into meatloaves or pâtés and baked. It may also be used as a filling or stuffing for meat pies and böreks, and also as stuffing. It may be made into meat sauce such as ragù, which in turn is used in dishes like pastitsio and moussaka, or mixed with sauce and served on a bun as a sloppy joe sandwich. It may also be cooked with beans, tomatoes, and/or spices to make chili con carne.', 2, 2, 0, 1, 2.58, 500, 2, 0, '2020-12-19 13:11:16'),
(58, 16, 'test', 'test', 2, 4, 1, 1, 151, 1, 2, 0, '2020-12-28 14:07:14'),
(87, 16, 'Coffee', 'Coffee is a brewed drink prepared from roasted coffee beans, the seeds of berries from certain Coffea species. When coffee berries turn from green to bright red in color – indicating ripeness – they are picked, processed, and dried. Dried coffee seeds are roasted to varying degrees, depending on the desired flavor.', 10, 15, 1, 1, 8, 1, 2, 0, '2021-01-05 16:21:49');

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

--
-- Dumping data for table `product_feature`
--

INSERT INTO `product_feature` (`id`, `product_id`, `feature_type`) VALUES
(32, 87, 1),
(71, 87, 2),
(72, 87, 3),
(73, 87, 4),
(74, 87, 8),
(75, 87, 9),
(76, 87, 10),
(77, 87, 11),
(78, 87, 12),
(79, 87, 13),
(80, 87, 14),
(81, 87, 15),
(82, 58, 4),
(83, 58, 10),
(84, 58, 12);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `unit_id` int(11) NOT NULL,
  `unit_abbr` varchar(10) NOT NULL,
  `unit_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`unit_id`, `unit_abbr`, `unit_name`) VALUES
(1, 'kg', 'kilogram'),
(2, 'gm', 'gram'),
(3, 'ltr', 'litre'),
(4, 'mL', 'milliliter'),
(5, 'pc.', 'piece');

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
(32, 'Mr.', 'bbbgbf', 'gbfgbfgb', 'fgbfbg', '0000-00-00', 'fgbfb', 'fgbfgb', 'fgbfgb', 'fgbfbg', 'fgbf', 'bfgbfgb', 'ffffffffffff', 'fgbfbgfgbfg', 1, 1, 0, '2020-12-01 10:29:20', '5fc61b0078c5d3.94614348.jpg'),
(33, 'Mr.', 'Tom', 'Vian', 'Fernando', '0000-00-00', 'Dorfstraße Ost', '4', '16307', '13', 'DE', '8965236589', 'tom@vian.com', '7845125858', 1, 1, 0, '2021-01-02 10:27:37', '');

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
(19, 32, 'ffffffffffff', 'fff'),
(20, 33, 'tom@vian.com', 'tom');

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
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_fk` (`product_category`),
  ADD KEY `product_location_fk` (`production_location`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `product_feature`
--
ALTER TABLE `product_feature`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_fk` (`product_id`),
  ADD KEY `product_feature_type_fk` (`feature_type`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`unit_id`);

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
  MODIFY `token_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `farm_land`
--
ALTER TABLE `farm_land`
  MODIFY `farm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `feature_type`
--
ALTER TABLE `feature_type`
  MODIFY `feature_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_feature`
--
ALTER TABLE `product_feature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user_credential`
--
ALTER TABLE `user_credential`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `farm_land`
--
ALTER TABLE `farm_land`
  ADD CONSTRAINT `user_to_farm_land` FOREIGN KEY (`producer_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `category_fk` FOREIGN KEY (`product_category`) REFERENCES `product_category` (`category_id`),
  ADD CONSTRAINT `product_location_fk` FOREIGN KEY (`production_location`) REFERENCES `farm_land` (`farm_id`);

--
-- Constraints for table `product_feature`
--
ALTER TABLE `product_feature`
  ADD CONSTRAINT `product_feature_type_fk` FOREIGN KEY (`feature_type`) REFERENCES `feature_type` (`feature_type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_credential`
--
ALTER TABLE `user_credential`
  ADD CONSTRAINT `user_credential_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
