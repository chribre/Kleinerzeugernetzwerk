-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2022 at 01:01 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `chat_user_credentials`
--

CREATE TABLE `chat_user_credentials` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `chat_user_id` text NOT NULL,
  `chat_user_name` text NOT NULL,
  `chat_user_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `street` varchar(100) DEFAULT NULL,
  `house_number` varchar(25) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `zip` varchar(15) DEFAULT NULL,
  `farm_location` point NOT NULL,
  `farm_area` double DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `favourite_sellers`
--

CREATE TABLE `favourite_sellers` (
  `fav_seller_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `is_favourite` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feature_type`
--

CREATE TABLE `feature_type` (
  `feature_type_id` int(11) NOT NULL,
  `feature_name` varchar(60) NOT NULL,
  `feature_description` text DEFAULT NULL,
  `image_path` varchar(150) DEFAULT NULL,
  `image_name` varchar(70) NOT NULL,
  `is_professional_feature` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feature_type`
--

INSERT INTO `feature_type` (`feature_type_id`, `feature_name`, `feature_description`, `image_path`, `image_name`, `is_professional_feature`) VALUES
(1, 'Bio EU', 'EU bio label', 'http://localhost/kleinerzeugernetzwerk_uploads/features_features/eu_bio.png', 'eu_bio.png', 0),
(2, 'Vegan', 'Vegan', 'http://localhost/kleinerzeugernetzwerk_uploads/features_features/vegan.webp', 'vegan.webp', 0),
(3, 'Vegetarian', 'Vegetarian', 'http://localhost/kleinerzeugernetzwerk_uploads/features_features/vegetarisch.png', 'vegetarisch.png', 0),
(4, 'Non-vegetarian', 'Non-vegetarian', 'http://localhost/kleinerzeugernetzwerk_uploads/features_features/nonveg.jpg', 'nonveg.jpg', 0),
(8, 'Lactose Free', 'This product is lactose free', 'http://localhost/kleinerzeugernetzwerk_uploads/features_features/lactose-free.jpg', 'lactose-free.jpg', 1),
(9, 'Bio', 'This product complies with organic guidelines', 'http://localhost/kleinerzeugernetzwerk_uploads/features_features/bio_non_certified.jpg', 'bio_non_certified.jpg', 1),
(10, 'Bio DE', 'The German state organic seal', 'http://localhost/kleinerzeugernetzwerk_uploads/features_features/bio_de.png', 'bio_de.png', 1),
(11, 'Gluten Free', 'This product doesn\'t contain gluten', 'http://localhost/kleinerzeugernetzwerk_uploads/features_features/gluten_free.jpg', 'gluten_free.jpg', 0),
(12, 'Naturland', 'Certified farmers and processing companies produce organic food according to the Naturland guidelines', 'http://localhost/kleinerzeugernetzwerk_uploads/features_features/naturland.png', 'naturland.png', 1),
(13, 'No Flavouring', 'No Flavouring', 'http://localhost/kleinerzeugernetzwerk_uploads/features_features/no-artifical-flavors.png', 'no-artifical-flavors.png', 0),
(14, 'No Coloring', 'No Coloring', 'http://localhost/kleinerzeugernetzwerk_uploads/features_features/no_artificial_color.png', 'no_artificial_color.png', 0),
(15, 'No Preservatives', 'No Preservatives', 'http://localhost/kleinerzeugernetzwerk_uploads/features_features/no_preservatives.jpg', 'no_preservatives.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL,
  `image_type` int(11) NOT NULL,
  `image_name` text NOT NULL,
  `image_path` text DEFAULT NULL,
  `entity_id` int(11) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `image_types`
--

CREATE TABLE `image_types` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image_types`
--

INSERT INTO `image_types` (`type_id`, `type_name`) VALUES
(1, 'profile'),
(2, 'product'),
(3, 'production point'),
(4, 'selling point');

-- --------------------------------------------------------

--
-- Table structure for table `news_feed`
--

CREATE TABLE `news_feed` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `article` text NOT NULL,
  `author_first_name` varchar(50) NOT NULL,
  `author_last_name` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(60) NOT NULL,
  `category_name_de` varchar(100) NOT NULL,
  `category_description` text DEFAULT NULL,
  `image_name` text NOT NULL,
  `image_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`category_id`, `category_name`, `category_name_de`, `category_description`, `image_name`, `image_path`) VALUES
(1, 'Vegetable', 'Gemüse', 'Vegetable', 'vegetables.png', ''),
(2, 'Vegetable Product', 'Gemüseerzeugnisse', 'Vegetable Product', 'vegetable_product.png', ''),
(3, 'Mushrooms', 'Pilze', 'Mushrooms', 'mushrooms.png', ''),
(4, 'Herbs, Tea and Spices', 'Kräuter, Tee und Gewürze', 'Herbs, Tea and Spices', 'herbs_spices.png', ''),
(5, 'Fruit', 'Obst', 'Fruit', 'fruit.png', ''),
(6, 'Fruit Products', 'Obsterzeugnisse', 'Fruit Products', 'fruit_products.png', ''),
(7, 'Nuts', 'Nüsse', 'Nuts', 'nuts.png', ''),
(8, 'Honey', 'Honig', 'honey', 'honey.png', ''),
(9, 'Juice and Beverages', 'Saft und Getränke', 'juice and beverages', 'beverages.png', ''),
(10, 'Corn', 'Getreide', 'corn', 'corn.png', ''),
(11, 'Potatoes & Root Crops', 'Kartoffeln & Hackfrüchte', 'Potatoes & Root Crops', 'potatoes.png', ''),
(12, 'Bread and Baked Products', 'Brot und Backwaren', 'Bread and Baked Products', 'baked_products.png', ''),
(13, 'Sweets', 'Süßwaren', 'sweets', 'sweets.png', ''),
(14, 'Confectionery Products', 'Konditorprodukte', 'confectionery products', 'confectionery_products.png', ''),
(15, 'Milk, Cheese & Other Dairy Products', 'Milch, Käse & andere Molkereiprodukte', 'milk, cheese & other dairy products', 'milk.png', ''),
(16, 'Eggs', 'Eier', 'eggs', 'eggs.png', ''),
(17, 'Meat and Sausage Products', 'Fleisch- und Wurstwaren', 'meat and sausage products', 'meat.png', ''),
(18, 'Fish, Shellfish & Seafood', 'Fisch, Krebse und Meeresfrüchte', 'fish, shellfish & seafood', 'fish.png', '');

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
-- Table structure for table `product_sellers`
--

CREATE TABLE `product_sellers` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `seller_id` int(11) NOT NULL,
  `producer_id` int(11) NOT NULL,
  `seller_name` varchar(120) NOT NULL,
  `seller_description` text NOT NULL,
  `street` varchar(50) NOT NULL,
  `building_number` varchar(20) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip` varchar(20) NOT NULL,
  `seller_location` point NOT NULL,
  `seller_email` varchar(50) NOT NULL,
  `seller_website` text NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `is_blocked` tinyint(1) NOT NULL,
  `is_mon_available` tinyint(1) NOT NULL,
  `mon_open_time` time NOT NULL,
  `mon_close_time` time NOT NULL,
  `is_tue_available` tinyint(1) NOT NULL,
  `tue_open_time` time NOT NULL,
  `tue_close_time` time NOT NULL,
  `is_wed_available` tinyint(1) NOT NULL,
  `wed_open_time` time NOT NULL,
  `wed_close_time` time NOT NULL,
  `is_thu_available` tinyint(1) NOT NULL,
  `thu_open_time` time NOT NULL,
  `thu_close_time` time NOT NULL,
  `is_fri_available` tinyint(1) NOT NULL,
  `fri_open_time` time NOT NULL,
  `fri_close_time` time NOT NULL,
  `is_sat_available` tinyint(1) NOT NULL,
  `sat_open_time` time NOT NULL,
  `sat_close_time` time NOT NULL,
  `is_sun_available` tinyint(1) NOT NULL,
  `sun_open_time` time NOT NULL,
  `sun_close_time` year(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `profile_image_name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `is_professional` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='stores user information';

-- --------------------------------------------------------

--
-- Table structure for table `user_credential`
--

CREATE TABLE `user_credential` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `password_reset_token` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='table to save user name and password of each users';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_token`
--
ALTER TABLE `access_token`
  ADD PRIMARY KEY (`token_id`);

--
-- Indexes for table `chat_user_credentials`
--
ALTER TABLE `chat_user_credentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farm_land`
--
ALTER TABLE `farm_land`
  ADD PRIMARY KEY (`farm_id`),
  ADD KEY `user_to_farm_land` (`producer_id`);
ALTER TABLE `farm_land` ADD FULLTEXT KEY `farm_name` (`farm_name`,`farm_desc`,`street`,`house_number`,`city`,`zip`);

--
-- Indexes for table `favourite_sellers`
--
ALTER TABLE `favourite_sellers`
  ADD PRIMARY KEY (`fav_seller_id`),
  ADD KEY `user_fk` (`user_id`),
  ADD KEY `seller_fk` (`seller_id`);

--
-- Indexes for table `feature_type`
--
ALTER TABLE `feature_type`
  ADD PRIMARY KEY (`feature_type_id`);
ALTER TABLE `feature_type` ADD FULLTEXT KEY `feature_name` (`feature_name`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `image_types`
--
ALTER TABLE `image_types`
  ADD PRIMARY KEY (`type_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `news_feed`
--
ALTER TABLE `news_feed`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feed_user_fk` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_fk` (`product_category`),
  ADD KEY `product_location_fk` (`production_location`);
ALTER TABLE `products` ADD FULLTEXT KEY `product_name` (`product_name`,`product_description`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`category_id`);
ALTER TABLE `product_category` ADD FULLTEXT KEY `category_name` (`category_name`);

--
-- Indexes for table `product_feature`
--
ALTER TABLE `product_feature`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_fk` (`product_id`),
  ADD KEY `product_feature_type_fk` (`feature_type`);

--
-- Indexes for table `product_sellers`
--
ALTER TABLE `product_sellers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_seller_product_fk` (`product_id`),
  ADD KEY `product_seller_seller_fk` (`seller_id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`seller_id`),
  ADD KEY `user_to_seller` (`producer_id`);
ALTER TABLE `sellers` ADD FULLTEXT KEY `seller_name` (`seller_name`,`seller_description`,`seller_email`,`street`,`building_number`,`city`,`zip`);
ALTER TABLE `sellers` ADD FULLTEXT KEY `seller_name_2` (`seller_name`,`seller_description`,`seller_email`,`seller_website`,`street`,`building_number`,`city`,`zip`);

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
ALTER TABLE `user` ADD FULLTEXT KEY `first_name` (`first_name`,`last_name`,`street`,`house_number`,`city`,`zip`,`email`,`description`);
ALTER TABLE `user` ADD FULLTEXT KEY `first_name_2` (`first_name`,`last_name`,`street`,`house_number`,`city`,`zip`,`email`,`description`);
ALTER TABLE `user` ADD FULLTEXT KEY `first_name_3` (`first_name`,`last_name`,`description`,`street`,`house_number`,`city`,`zip`);

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
  MODIFY `token_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_user_credentials`
--
ALTER TABLE `chat_user_credentials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `farm_land`
--
ALTER TABLE `farm_land`
  MODIFY `farm_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favourite_sellers`
--
ALTER TABLE `favourite_sellers`
  MODIFY `fav_seller_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feature_type`
--
ALTER TABLE `feature_type`
  MODIFY `feature_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news_feed`
--
ALTER TABLE `news_feed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_feature`
--
ALTER TABLE `product_feature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_sellers`
--
ALTER TABLE `product_sellers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_credential`
--
ALTER TABLE `user_credential`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `farm_land`
--
ALTER TABLE `farm_land`
  ADD CONSTRAINT `user_to_farm_land` FOREIGN KEY (`producer_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `favourite_sellers`
--
ALTER TABLE `favourite_sellers`
  ADD CONSTRAINT `seller_fk` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`seller_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `news_feed`
--
ALTER TABLE `news_feed`
  ADD CONSTRAINT `feed_user_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `product_sellers`
--
ALTER TABLE `product_sellers`
  ADD CONSTRAINT `product_seller_product_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_seller_seller_fk` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`seller_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sellers`
--
ALTER TABLE `sellers`
  ADD CONSTRAINT `user_to_seller` FOREIGN KEY (`producer_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_credential`
--
ALTER TABLE `user_credential`
  ADD CONSTRAINT `user_credential_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
