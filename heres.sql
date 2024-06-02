-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2024 at 04:19 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `heres`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'khaye', 'khaye@gmail.com', '$2y$10$t3CZbI3t19DBceiZSEZcfOUJW6j9bww67tmmT9wTDXZpPbSzoedGO'),
(2, 'erica', 'reforsado@gmail.com', '$2y$10$N54y7gZ2jguiqJFrHccksemoElAZnM1gYJO2kQlPsOhwc2cX2fm6G');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

DROP TABLE IF EXISTS `cart_details`;
CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(2, 'Trends'),
(3, 'Women'),
(4, 'Men'),
(5, 'Kids'),
(7, 'Unisex');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `rating` int(11) DEFAULT NULL CHECK (`rating` between 1 and 5),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `product_id`, `user_id`, `comment`, `rating`, `created_at`) VALUES
(2, 4, 1, 'nice bag for my boyfriend!!', 1, '2024-06-01 13:43:26'),
(3, 8, 1, 'beautiful bag for me', 5, '2024-06-01 13:48:30');

-- --------------------------------------------------------

--
-- Table structure for table `gcash_payments`
--

DROP TABLE IF EXISTS `gcash_payments`;
CREATE TABLE `gcash_payments` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `gcash_reference` varchar(100) NOT NULL,
  `gcash_account_name` varchar(100) NOT NULL,
  `gcash_account_number` varchar(100) NOT NULL,
  `amount_sent` decimal(10,2) NOT NULL,
  `payment_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `item_qty` int(255) NOT NULL,
  `order_number` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL,
  `tracking_number` varchar(255) DEFAULT NULL,
  `receiver_name` varchar(255) DEFAULT NULL,
  `receiver_address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `amount_due`, `item_qty`, `order_number`, `order_date`, `order_status`, `tracking_number`, `receiver_name`, `receiver_address`) VALUES
(1, 1, 1598, 2, 254536393, '2024-05-29 18:10:40', 'Complete', NULL, NULL, NULL),
(2, 1, 989, 1, 1602624387, '2024-05-30 20:01:22', 'Complete', NULL, NULL, NULL),
(3, 1, 2017, 3, 2009413761, '2024-06-01 05:41:59', 'Complete', NULL, NULL, NULL),
(4, 1, 749, 1, 940509609, '2024-06-01 06:15:25', 'Complete', NULL, NULL, NULL),
(5, 1, 549, 1, 782611432, '2024-06-01 07:00:03', 'Complete', NULL, NULL, NULL),
(6, 1, 999, 1, 1604595513, '2024-06-01 07:01:11', 'Complete', NULL, NULL, NULL),
(7, 1, 549, 1, 1189364842, '2024-06-01 07:05:14', 'Complete', NULL, NULL, NULL),
(8, 1, 999, 1, 388296544, '2024-06-01 07:18:08', 'Complete', NULL, NULL, NULL),
(9, 1, 599, 1, 428969161, '2024-06-01 07:22:40', 'Complete', NULL, NULL, NULL),
(10, 1, 549, 1, 2036315896, '2024-06-01 07:40:36', 'Complete', NULL, NULL, NULL),
(11, 1, 999, 1, 320391037, '2024-06-01 07:41:50', 'Complete', NULL, NULL, NULL),
(12, 1, 749, 1, 1567761587, '2024-06-01 07:43:07', 'Complete', NULL, NULL, NULL),
(13, 1, 299, 1, 1979470492, '2024-06-01 07:46:05', 'Complete', NULL, NULL, NULL),
(14, 1, 599, 1, 1856035580, '2024-06-01 07:48:26', 'Complete', NULL, NULL, NULL),
(15, 1, 989, 1, 1864817867, '2024-06-01 07:57:30', 'Complete', NULL, NULL, NULL),
(16, 1, 299, 1, 380343407, '2024-06-01 14:18:03', 'Complete', NULL, NULL, NULL),
(17, 1, 749, 1, 1324862317, '2024-06-01 15:30:34', 'Complete', NULL, NULL, NULL),
(18, 1, 299, 1, 1475872399, '2024-06-01 15:45:44', 'Complete', NULL, NULL, NULL),
(19, 1, 299, 1, 1379060593, '2024-06-01 15:50:36', 'Complete', NULL, NULL, NULL),
(20, 1, 989, 1, 620581412, '2024-06-01 16:12:48', 'Complete', '7D9XPZC3WG1717258368', 'Alyssa Sumalpong', 'San Agustin Di Matagpuan'),
(21, 1, 489, 1, 1476778589, '2024-06-01 16:17:46', 'Complete', '1JBSXGOKLW1717258666', 'Alyssa Sumalpong', 'San Agustin Di Matagpuan'),
(22, 1, 999, 1, 111113949, '2024-06-01 16:27:52', 'Complete', NULL, 'Alyssa Sumalpong', 'San Agustin Di Matagpuan'),
(23, 1, 549, 1, 1552511039, '2024-06-01 16:31:29', 'Complete', NULL, 'Sandara Morcozo', 'Alomon'),
(24, 1, 749, 1, 118517423, '2024-06-01 16:33:06', 'Complete', NULL, 'Sandara Morcozo', 'Alomon, Albay'),
(25, 1, 989, 1, 1628245583, '2024-06-01 16:38:25', 'Complete', 'KFAIVYVPMH1717259905', 'Alyssa Sumalpong', 'San Agustin Di Matagpuan'),
(26, 1, 749, 1, 58237212, '2024-06-01 16:42:05', 'Complete', 'BF4RG26WRZ1717260125', 'Alyssa Sumalpong', 'San Agustin \'Di Matagpuan'),
(27, 1, 489, 1, 104330196, '2024-06-01 16:46:11', 'Complete', 'GLOR9WWGP91717260371', 'Alyssa Sumalpong', 'San Agustin Di Matagpuan'),
(28, 1, 489, 1, 163193625, '2024-06-01 16:47:52', 'Complete', 'ZCNJ5N4PQB1717260472', 'Alyssa Sumalpong', 'San Agustin, Di Matagpuan'),
(29, 1, 599, 1, 96310253, '2024-06-01 16:49:17', 'Complete', 'KVW4NG28KI1717260557', 'Sandara Morcozo', 'Alomon, Albay'),
(30, 1, 549, 1, 156377849, '2024-06-01 19:05:14', 'Complete', 'PV51SWVCHY1717268714', 'nfeig', 'bweiwni'),
(31, 1, 999, 1, 1422716988, '2024-06-01 23:09:47', 'Complete', '9CBWDBGN5B1717283387', 'Alyssa Sumalpong', 'San Agustin, Oas, Albay'),
(32, 1, 0, 0, 864803622, '2024-06-02 02:04:38', 'Complete', NULL, NULL, NULL),
(33, 1, 0, 0, 1335475392, '2024-06-01 23:42:34', 'pending', NULL, NULL, NULL),
(34, 1, 0, 0, 2084374537, '2024-06-01 23:44:39', 'pending', NULL, NULL, NULL),
(35, 1, 999, 1, 577516030, '2024-06-02 01:52:37', 'Complete', NULL, NULL, NULL),
(36, 1, 489, 1, 364019911, '2024-06-02 02:01:33', 'Complete', NULL, NULL, NULL),
(37, 1, 489, 1, 1286797346, '2024-06-02 02:06:58', 'Complete', '9UGQVIG3O61717294018', 'Alyssa Sumalpong', 'San Agustin');

-- --------------------------------------------------------

--
-- Table structure for table `orders_pending`
--

DROP TABLE IF EXISTS `orders_pending`;
CREATE TABLE `orders_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `item_qty` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders_pending`
--

INSERT INTO `orders_pending` (`order_id`, `user_id`, `order_number`, `product_id`, `item_qty`, `order_status`) VALUES
(1, 1, 573035082, 2, 1, 'pending'),
(2, 1, 573035082, 3, 1, 'pending'),
(3, 1, 573035082, 4, 0, 'pending'),
(4, 1, 1829241908, 7, 0, 'pending'),
(5, 1, 2018815767, 4, 1, 'pending'),
(6, 1, 1669764334, 1, 1, 'pending'),
(7, 1, 174700485, 3, 1, 'pending'),
(8, 1, 174700485, 7, 1, 'pending'),
(9, 1, 355501858, 1, 1, 'pending'),
(10, 1, 355501858, 4, 1, 'pending'),
(11, 1, 355501858, 6, 0, 'pending'),
(12, 1, 355501858, 8, 1, 'pending'),
(13, 1, 254536393, 6, 1, 'pending'),
(14, 1, 254536393, 12, 1, 'pending'),
(15, 1, 1602624387, 10, 1, 'pending'),
(16, 1, 2009413761, 2, 1, 'pending'),
(17, 1, 2009413761, 4, 1, 'pending'),
(18, 1, 2009413761, 5, 1, 'pending'),
(19, 1, 940509609, 2, 1, 'pending'),
(20, 1, 782611432, 9, 1, 'pending'),
(21, 1, 1604595513, 14, 1, 'pending'),
(22, 1, 1189364842, 9, 1, 'pending'),
(23, 1, 388296544, 3, 1, 'pending'),
(24, 1, 428969161, 12, 1, 'pending'),
(25, 1, 2036315896, 9, 1, 'pending'),
(26, 1, 320391037, 8, 1, 'pending'),
(27, 1, 1567761587, 2, 1, 'pending'),
(28, 1, 1979470492, 4, 1, 'pending'),
(29, 1, 1856035580, 12, 1, 'pending'),
(30, 1, 1864817867, 10, 1, 'pending'),
(31, 1, 380343407, 4, 1, 'pending'),
(32, 1, 1324862317, 2, 1, 'pending'),
(33, 1, 1475872399, 4, 1, 'pending'),
(34, 1, 1379060593, 4, 1, 'pending'),
(35, 1, 620581412, 10, 1, 'pending'),
(36, 1, 1476778589, 7, 1, 'pending'),
(37, 1, 111113949, 6, 1, 'pending'),
(38, 1, 1552511039, 9, 1, 'pending'),
(39, 1, 118517423, 2, 1, 'pending'),
(40, 1, 1628245583, 10, 1, 'pending'),
(41, 1, 58237212, 2, 1, 'pending'),
(42, 1, 104330196, 7, 1, 'pending'),
(43, 1, 163193625, 7, 1, 'pending'),
(44, 1, 96310253, 12, 1, 'pending'),
(45, 1, 156377849, 9, 1, 'pending'),
(46, 1, 1422716988, 3, 1, 'pending'),
(47, 1, 577516030, 3, 1, 'pending'),
(48, 1, 364019911, 7, 1, 'pending'),
(49, 1, 1286797346, 7, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_number` int(11) NOT NULL,
  `amnt` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `shipping_mode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `order_id`, `order_number`, `amnt`, `payment_mode`, `date`, `shipping_mode`) VALUES
(1, 28, 163193625, 489, 'Cash on Delivery', '2024-06-01 16:47:52', 'FX'),
(2, 29, 96310253, 599, 'Gcash', '2024-06-01 16:49:17', 'SPE'),
(3, 30, 0, 0, 'Gcash', '2024-06-01 19:05:14', 'JTX'),
(4, 31, 1422716988, 999, 'Gcash', '2024-06-01 23:09:47', 'JTX'),
(6, 37, 1286797346, 489, 'Gcash', '2024-06-02 02:06:58', 'FX');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_keywords`, `category_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) VALUES
(2, 'Curved Hobo Bag', 'bag,trends,curved,hobo,curvedbag', 2, 'trend1.jpg', 'trend1_2.webp', 'trend1_3.webp', '749', '2024-05-23 08:00:23', 'true'),
(3, 'Canvas Totebag', 'bag,totebag,women,canvas,canvastotebag', 3, 'w1.jpg', 'w1_2.jpg', 'w1_3.jpg', '999', '2024-05-23 08:01:41', 'true'),
(4, 'Crossbody Bag', 'bag,men,crossbody,crossbodybag', 4, 'm1.jpg', 'm1_2.webp', 'm1_3.webp', '299', '2024-05-23 08:02:53', 'true'),
(5, 'Asge Backpack', 'bag,kid,kids,asge,backpack,asgebackpack,soccer', 5, 'k1.jpg', 'k1_2.jpeg', 'k1_3.webp', '969', '2024-05-24 22:15:52', 'true'),
(6, 'Rise Duffle Bag (Jordan)', 'unisex,bag,jordan,rise bag,bag,boys,girls,women,men,duffle,dufflebag', 7, 'uni2.jpg', 'uni2_2.webp', 'uni2_3.png', '999', '2024-05-29 16:04:50', 'true'),
(7, 'Mismo Beach Bag', 'mismo,beach,bag,trends,trending,women,men,boy,girl,boys,girls,mismobag,beachbag,bags', 2, 'trend2.jpg', 'trend2_2.jpg', 'trend2_3.jpg', '489', '2024-05-24 20:31:47', 'true'),
(8, 'Straw Scarf-Print Totebag', 'women,straw,scarf,print,scarf-print,totebag,girls,girl', 3, 'w2.jpg', 'w2_2.avif', 'w2_3.webp', '999', '2024-05-24 22:15:33', 'true'),
(9, 'Coach Bag West Pack', 'men,coach,bag,west,pack,westpack,coachbag,westbag,boy,boys', 4, 'm2.jpg', 'm2_2.jpg', 'm2_3.webp', '549', '2024-05-24 20:39:35', 'true'),
(10, 'School Travel Donut Cupcakes Pattern Backpack (JOYHILL)', 'school,travel,backpack,donut,cupcakes,bag,bags,joyhill,girls,girl,schoolbag,travelbag,schoolbackpack,travelbackpack,kids,kid,kidsbags,bagkid', 5, 'k2.jpg', 'k2_2.jpg', 'k2_3.jpg', '989', '2024-05-24 22:15:14', 'true'),
(12, 'Cross Bottle Bag', 'unisex,boys,girls,men,women,bag,bags,crossbottle,cross,bottle,crossbottlebag', 7, 'uni1.jpg', 'uni1_2.webp', 'uni1_3.webp', '599', '2024-05-29 16:05:40', 'true'),
(14, 'Mini Leather Bag', 'trend, trends, women, mini, leather, bag, bags, ', 2, 'trend3.jpg', 'trend3.jpg', 'trend3.jpg', '999', '2024-05-30 18:46:10', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `shippers`
--

DROP TABLE IF EXISTS `shippers`;
CREATE TABLE `shippers` (
  `shipper_id` int(11) NOT NULL,
  `shipping_company` varchar(55) NOT NULL,
  `shipping_address` text DEFAULT NULL,
  `shipping_company_cd` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shippers`
--

INSERT INTO `shippers` (`shipper_id`, `shipping_company`, `shipping_address`, `shipping_company_cd`) VALUES
(1, 'J&T Express', NULL, 'JTX'),
(2, 'Flash Express', NULL, 'FX'),
(3, 'SPX', 'Shoppee Express', '');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_details`
--

DROP TABLE IF EXISTS `shipping_details`;
CREATE TABLE `shipping_details` (
  `shipping_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `tracking_number` varchar(255) DEFAULT NULL,
  `receiver_name` varchar(255) DEFAULT NULL,
  `receiver_address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_methods`
--

DROP TABLE IF EXISTS `shipping_methods`;
CREATE TABLE `shipping_methods` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipping_methods`
--

INSERT INTO `shipping_methods` (`id`, `name`, `code`) VALUES
(1, 'J&T', 'JTX'),
(2, 'Flash Express', 'FX'),
(3, 'Shopee Express', 'SPE');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_no` varchar(11) NOT NULL,
  `gender` char(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_ip` varchar(100) NOT NULL,
  `user_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `fullname`, `address`, `contact_no`, `gender`, `created_at`, `user_ip`, `user_image`) VALUES
(1, 'binibiningyeshaaa', 'alyssa@gmail.com', '$2y$10$cWh2La3ZmpM1upM9j6pO/uEYFwG2O.j4/.ss4qPZpYFpr9MTmKbOq', 'Alyssa Sumalpong', 'Oas, Albay', '09454499583', 'F', '2024-05-28 13:07:36', '::1', 'luffy.jpg'),
(5, 'yhennalynna', 'alynna@gmail.com', '$2y$10$hL4BJe0gsKbOidBKTgLAiux80OQ7vCJTKfgY.DN/jM1HZcReANV52', 'Alynna Sumalpong', 'San Agustin', '09123456789', 'O', '2024-05-29 13:31:01', '::1', 'robin.jpg'),
(6, 'sandara', 'sandara@gmail.com', '$2y$10$RYY2lI9ETUuYQd4jHoJtQuEcwEvGFqvT8GxJ.F80gowEtyClCqWGK', 'Sandara Morcozo', 'Polangui,Albay', '09223344556', 'F', '2024-05-30 18:38:02', '::1', 'nami.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `gcash_payments`
--
ALTER TABLE `gcash_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `orders_pending`
--
ALTER TABLE `orders_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `shipping_details`
--
ALTER TABLE `shipping_details`
  ADD PRIMARY KEY (`shipping_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `shipping_methods`
--
ALTER TABLE `shipping_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gcash_payments`
--
ALTER TABLE `gcash_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `shipping_details`
--
ALTER TABLE `shipping_details`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipping_methods`
--
ALTER TABLE `shipping_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `gcash_payments`
--
ALTER TABLE `gcash_payments`
  ADD CONSTRAINT `gcash_payments_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `shipping_details`
--
ALTER TABLE `shipping_details`
  ADD CONSTRAINT `shipping_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
