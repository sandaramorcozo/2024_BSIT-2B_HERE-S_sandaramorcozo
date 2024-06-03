-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2024 at 12:23 PM
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
(3, 'erica', 'reforsado@gmail.com', '$2y$10$MEcZpBONqJlzVTlc/vmEWeWpRGcMXZE0lYhKEV/gbExzK3WQZ8yeS'),
(4, 'edelyn', 'jacob@gmail.com', '$2y$10$At7qVZLQabEy/p58zXQVX.EsoMOvnYiqekRbWqgL0VJFDTkMbjmV.');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

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
-- Table structure for table `orders`
--

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
  `receiver_address` text DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `gcash_ref_num` varchar(255) DEFAULT NULL,
  `gcash_account_number` varchar(255) DEFAULT NULL,
  `shipping_mode` varchar(255) DEFAULT NULL,
  `payment_mode` varchar(255) DEFAULT NULL,
  `gcash_account_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `amount_due`, `item_qty`, `order_number`, `order_date`, `order_status`, `tracking_number`, `receiver_name`, `receiver_address`, `payment_method`, `gcash_ref_num`, `gcash_account_number`, `shipping_mode`, `payment_mode`, `gcash_account_name`) VALUES
(1, 1, 1598, 2, 254536393, '2024-05-29 18:10:40', 'Complete', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 1, 989, 1, 1602624387, '2024-05-30 20:01:22', 'Complete', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 1, 2017, 3, 2009413761, '2024-06-01 05:41:59', 'Complete', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 1, 749, 1, 940509609, '2024-06-01 06:15:25', 'Complete', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 1, 549, 1, 782611432, '2024-06-01 07:00:03', 'Complete', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 1, 999, 1, 1604595513, '2024-06-01 07:01:11', 'Complete', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 1, 549, 1, 1189364842, '2024-06-01 07:05:14', 'Complete', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 1, 999, 1, 388296544, '2024-06-01 07:18:08', 'Complete', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 1, 599, 1, 428969161, '2024-06-01 07:22:40', 'Complete', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 1, 549, 1, 2036315896, '2024-06-01 07:40:36', 'Complete', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 1, 999, 1, 320391037, '2024-06-01 07:41:50', 'Complete', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 1, 749, 1, 1567761587, '2024-06-01 07:43:07', 'Complete', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 1, 299, 1, 1979470492, '2024-06-01 07:46:05', 'Complete', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 1, 599, 1, 1856035580, '2024-06-01 07:48:26', 'Complete', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 1, 989, 1, 1864817867, '2024-06-01 07:57:30', 'Complete', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 1, 299, 1, 380343407, '2024-06-01 14:18:03', 'Complete', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 1, 749, 1, 1324862317, '2024-06-01 15:30:34', 'Complete', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 1, 299, 1, 1475872399, '2024-06-01 15:45:44', 'Complete', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 1, 299, 1, 1379060593, '2024-06-01 15:50:36', 'Complete', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 1, 989, 1, 620581412, '2024-06-01 16:12:48', 'Complete', '7D9XPZC3WG1717258368', 'Alyssa Sumalpong', 'San Agustin Di Matagpuan', NULL, NULL, NULL, NULL, NULL, NULL),
(21, 1, 489, 1, 1476778589, '2024-06-01 16:17:46', 'Complete', '1JBSXGOKLW1717258666', 'Alyssa Sumalpong', 'San Agustin Di Matagpuan', NULL, NULL, NULL, NULL, NULL, NULL),
(22, 1, 999, 1, 111113949, '2024-06-01 16:27:52', 'Complete', NULL, 'Alyssa Sumalpong', 'San Agustin Di Matagpuan', NULL, NULL, NULL, NULL, NULL, NULL),
(23, 1, 549, 1, 1552511039, '2024-06-01 16:31:29', 'Complete', NULL, 'Sandara Morcozo', 'Alomon', NULL, NULL, NULL, NULL, NULL, NULL),
(24, 1, 749, 1, 118517423, '2024-06-01 16:33:06', 'Complete', NULL, 'Sandara Morcozo', 'Alomon, Albay', NULL, NULL, NULL, NULL, NULL, NULL),
(25, 1, 989, 1, 1628245583, '2024-06-03 05:48:35', 'Complete', 'KFAIVYVPMH1717259905', 'Alyssa Sumalpong', 'San Agustin Di Matagpuan', 'Gcash', '89LOPX', '09451236789', NULL, NULL, NULL),
(26, 1, 749, 1, 58237212, '2024-06-01 16:42:05', 'Complete', 'BF4RG26WRZ1717260125', 'Alyssa Sumalpong', 'San Agustin \'Di Matagpuan', NULL, NULL, NULL, NULL, NULL, NULL),
(27, 1, 489, 1, 104330196, '2024-06-01 16:46:11', 'Complete', 'GLOR9WWGP91717260371', 'Alyssa Sumalpong', 'San Agustin Di Matagpuan', NULL, NULL, NULL, NULL, NULL, NULL),
(28, 1, 489, 1, 163193625, '2024-06-01 16:47:52', 'Complete', 'ZCNJ5N4PQB1717260472', 'Alyssa Sumalpong', 'San Agustin, Di Matagpuan', NULL, NULL, NULL, NULL, NULL, NULL),
(29, 1, 599, 1, 96310253, '2024-06-01 16:49:17', 'Complete', 'KVW4NG28KI1717260557', 'Sandara Morcozo', 'Alomon, Albay', NULL, NULL, NULL, NULL, NULL, NULL),
(30, 1, 549, 1, 156377849, '2024-06-01 19:05:14', 'Complete', 'PV51SWVCHY1717268714', 'nfeig', 'bweiwni', NULL, NULL, NULL, NULL, NULL, NULL),
(31, 1, 999, 1, 1422716988, '2024-06-01 23:09:47', 'Complete', '9CBWDBGN5B1717283387', 'Alyssa Sumalpong', 'San Agustin, Oas, Albay', NULL, NULL, NULL, NULL, NULL, NULL),
(32, 1, 0, 0, 864803622, '2024-06-02 02:04:38', 'Complete', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 1, 0, 0, 1335475392, '2024-06-01 23:42:34', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 1, 0, 0, 2084374537, '2024-06-01 23:44:39', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 1, 999, 1, 577516030, '2024-06-02 01:52:37', 'Complete', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 1, 489, 1, 364019911, '2024-06-02 02:01:33', 'Complete', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 1, 489, 1, 1286797346, '2024-06-02 02:06:58', 'Complete', '9UGQVIG3O61717294018', 'Alyssa Sumalpong', 'San Agustin', NULL, NULL, NULL, NULL, NULL, NULL),
(38, 1, 999, 1, 1527709477, '2024-06-02 04:19:08', 'Complete', 'OO14KULKHP1717301948', 'Edelyn Jacob', 'Alomon, Albay', NULL, NULL, NULL, NULL, NULL, NULL),
(39, 1, 489, 1, 927052095, '2024-06-02 04:25:17', 'Complete', 'J9GBH31N7L1717302317', 'Alyssa Sumalpong', 'San Agustin, Oas, Albay', NULL, NULL, NULL, NULL, NULL, NULL),
(40, 1, 749, 1, 1468465038, '2024-06-02 05:00:47', 'Complete', 'LSRUSD87IL1717304447', 'Alyssa Sumalpong', 'San Agustin, Oas, Albay', NULL, NULL, NULL, NULL, NULL, NULL),
(41, 1, 999, 1, 176781789, '2024-06-02 05:51:58', 'Complete', 'RDXQD4P1J41717307518', 'Alyssa Sumalpong', 'San Agustin', NULL, NULL, NULL, NULL, NULL, NULL),
(42, 1, 999, 1, 1938492248, '2024-06-02 06:01:57', 'Complete', 'J4S66PMATV1717308117', 'sam', 'alomon', NULL, NULL, NULL, NULL, NULL, NULL),
(43, 1, 999, 1, 620910831, '2024-06-03 09:43:02', 'Complete', 'J0RWN2CW2E1717407782', 'Alyssa Pagod na Pagod', 'Ewan', NULL, NULL, NULL, NULL, NULL, NULL),
(44, 1, 599, 1, 1670671459, '2024-06-03 09:49:04', 'Complete', 'URNS5N3XOB1717408144', 'Alynna Ravago', 'Tobog, Albay', NULL, '89POLX', '09123456789', NULL, NULL, NULL),
(45, 1, 299, 1, 93430516, '2024-06-02 07:26:42', 'Complete', 'NQNMYKZU1X1717313202', 'Alyssa', 'San Agustin', NULL, NULL, NULL, NULL, NULL, NULL),
(46, 1, 489, 2, 1307655402, '2024-06-02 07:33:37', 'Complete', 'JOJ2B9WTG71717313617', 'Alyssa Sumalpong', 'San Agustin', NULL, NULL, NULL, NULL, NULL, NULL),
(47, 1, 299, 1, 995788532, '2024-06-02 11:26:37', 'Complete', '1IRVWWU04T1717327597', 'Aleya Garma', 'Guinobatan HAYAHAY', NULL, NULL, NULL, NULL, NULL, NULL),
(48, 1, 599, 1, 1022257413, '2024-06-02 11:36:55', 'Complete', 'CC0LCOWRIH1717328215', 'Mia Sevilla', 'Oas, Albay', NULL, NULL, NULL, NULL, NULL, NULL),
(49, 1, 999, 1, 978698973, '2024-06-02 12:29:43', 'Complete', 'YMDBB6GXJX1717331383', 'Adeline Jolie ', 'Uranus Polangui', NULL, NULL, NULL, NULL, NULL, NULL),
(50, 1, 599, 1, 875613013, '2024-06-02 12:36:08', 'Complete', 'W1PH8NPRNR1717331768', 'Cheriz Bianca Morco', 'Guinobatan', NULL, NULL, NULL, NULL, NULL, NULL),
(51, 1, 999, 1, 1624836584, '2024-06-02 12:41:32', 'Complete', 'TVRYORHXDT1717332092', 'Adeline Jolie Gomez', 'Polangui, Albay', NULL, NULL, NULL, NULL, NULL, NULL),
(52, 1, 999, 1, 1413784928, '2024-06-02 12:52:51', 'Complete', 'JCUGHF3QCW1717332771', 'Shane Longakit', 'Oas, Albay', NULL, NULL, NULL, NULL, NULL, NULL),
(53, 1, 999, 1, 382841826, '2024-06-02 13:13:55', 'Complete', 'R3OLO9V32R1717334035', 'Yesha Sumalpong', 'Oas, Albay', NULL, NULL, NULL, NULL, NULL, NULL),
(54, 1, 299, 1, 228060507, '2024-06-02 13:23:12', 'Complete', 'XUBWCC8CN41717334592', 'Yang Jungwon', 'Crossbody Bag', NULL, NULL, NULL, NULL, NULL, NULL),
(55, 1, 299, 1, 912179924, '2024-06-02 13:28:56', 'Complete', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 1, 299, 1, 315844519, '2024-06-02 13:29:33', 'Complete', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 1, 999, 1, 422085836, '2024-06-02 13:32:18', 'Complete', 'PE30M40I6L1717335138', 'Alyssa Sumalpong', 'Rise Duffle Bag', NULL, NULL, NULL, NULL, NULL, NULL),
(58, 1, 999, 1, 1567137312, '2024-06-02 13:35:04', 'Complete', 'EK8A7XDDJ51717335304', 'Alyssa Gwyn', 'Duffle Bag', NULL, NULL, NULL, NULL, NULL, NULL),
(59, 1, 999, 1, 1581214318, '2024-06-02 13:39:19', 'Complete', 'IEERFUJ6HB1717335559', 'Justin De Dios', 'Duffle Bag ', NULL, NULL, NULL, NULL, NULL, NULL),
(60, 1, 999, 1, 0, '2024-06-02 14:07:52', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 1, 969, 1, 233088526, '2024-06-03 09:32:48', 'Complete', '5MCF1D3HOS1717407168', 'Alyssa Pagod', 'Pagod Na', NULL, NULL, NULL, NULL, NULL, NULL),
(62, 1, 969, 1, 189489200, '2024-06-03 09:27:52', 'Complete', 'WCYGFDBX3I1717406872', 'Alyssa Pagod', 'Pagod Naman', NULL, '89POLX', '09909201-381983', 'FX', 'Gcash', NULL),
(63, 1, 969, 1, 857477167, '2024-06-02 23:15:31', 'Complete', 'OQAI4PWWT11717370131', 'Alyssa Sumalpong', 'San Agustin', NULL, NULL, NULL, NULL, NULL, NULL),
(64, 0, 0, 0, 0, '2024-06-03 02:05:46', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, 1, 0, 1, 555712015, '2024-06-03 03:20:26', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, 1, 299, 1, 912436736, '2024-06-03 06:35:56', 'Complete', 'IK7QOOQ8IO1717396556', 'Ken Suson', 'Polangui, Albay', NULL, NULL, NULL, NULL, NULL, NULL),
(67, 1, 749, 1, 681917780, '2024-06-03 06:29:22', 'Complete', 'AZVVNISMY71717396162', 'Alyssa Sumalpong', 'San Agustin, Oas, Albay', NULL, NULL, NULL, NULL, NULL, NULL),
(68, 1, 999, 1, 873594896, '2024-06-03 06:39:59', 'Complete', '2MPZP6LODU1717396799', 'Josh Cullen', 'Oas, Albay', NULL, NULL, NULL, NULL, NULL, NULL),
(69, 1, 749, 1, 614424504, '2024-06-03 06:42:46', 'Complete', 'WWOMEQJX6S1717396966', 'Alyssa Sumalpong', 'San Agustin', NULL, NULL, NULL, NULL, NULL, NULL),
(70, 1, 299, 1, 1689568774, '2024-06-03 06:47:02', 'Complete', 'C8S8Y7R5P81717397222', 'Reymar Llagas', 'Poalngui, Albay', NULL, NULL, NULL, NULL, NULL, NULL),
(71, 1, 999, 1, 1325005009, '2024-06-03 06:51:03', 'Complete', 'PH8FNPO34W1717397463', 'Rheyvin Orogo', 'Guinobatan, Albay', NULL, '89POLX', '09123456789', NULL, NULL, NULL),
(72, 1, 749, 1, 1838659480, '2024-06-03 07:58:32', 'Complete', 'G3YD6VYP9F1717401512', 'Alyssa', 'San Agustin', NULL, NULL, NULL, NULL, NULL, NULL),
(73, 1, 999, 1, 1283405516, '2024-06-03 08:02:57', 'Complete', '8XLV4G33LN1717401777', 'Alyssa Sumalpong', 'San Agustin', NULL, NULL, NULL, NULL, NULL, NULL),
(74, 1, 599, 1, 247706764, '2024-06-03 08:27:13', 'Complete', 'PJRKCGKHFB1717403233', 'Alyssa Sumalpong', 'San Agustin', NULL, NULL, NULL, NULL, NULL, NULL),
(75, 1, 299, 1, 1767095906, '2024-06-03 08:44:44', 'Complete', 'XLRP1IB0GP1717404284', 'Alyssa Almendras', 'Libon, Albay', NULL, NULL, NULL, NULL, NULL, NULL),
(76, 1, 999, 1, 1765182195, '2024-06-03 09:22:20', 'Complete', '7TQMWUDKAI1717406540', 'Alyssa Almendras', 'San Agustin', NULL, '09123456789', '09123456789', 'FX', 'Gcash', NULL),
(77, 1, 599, 1, 649177041, '2024-06-03 09:24:00', 'Complete', 'P3N3J571AW1717406640', 'Reymar Llagas', 'Polangui', NULL, '89POLX', '09123456789', 'SPE', 'Gcash', NULL),
(78, 1, 749, 1, 1931095901, '2024-06-03 09:29:26', 'Complete', 'LDUPFJXE4I1717406966', 'Alyssa pagod', 'Pagod na po', NULL, '', '', 'SPE', 'Gcash', NULL),
(79, 1, 999, 1, 2001535446, '2024-06-03 09:54:45', 'Complete', '8D79R66KR21717408485', 'Sandara Morcozo', 'Alomon, Polangui', NULL, '89LOXP', '0987654321', NULL, NULL, NULL),
(80, 1, 299, 1, 170740964, '2024-06-03 10:06:41', 'Complete', '8MSTEYWTST1717409201', 'Rheyvin Orogo', 'Polangui, Albay', NULL, '89XFR', '09432156789', NULL, NULL, '0'),
(81, 1, 749, 1, 106267878, '2024-06-03 10:09:38', 'Complete', '4P524PVUA81717409378', 'Sandara Morcozo', 'Alomon, Albay', NULL, '89POLX', '0987654321', NULL, NULL, '0'),
(82, 1, 999, 1, 546409466, '2024-06-03 10:18:00', 'Complete', '4BVXW7R87E1717409880', 'Sandara Morcozo', 'Alomon, Albay', NULL, '89POLX', '0987654321', NULL, NULL, 'Sandara Morcozo'),
(83, 1, 1498, 1, 1430383329, '2024-06-03 10:20:49', 'Complete', '11K2CI7WCI1717410049', 'Reymar Llagas', 'Polangui, Albay', NULL, '897POL', '09123456789', NULL, NULL, 'Reymar Llagas');

-- --------------------------------------------------------

--
-- Table structure for table `orders_pending`
--

CREATE TABLE `orders_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `item_qty` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `product_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders_pending`
--

INSERT INTO `orders_pending` (`order_id`, `user_id`, `order_number`, `product_id`, `item_qty`, `order_status`, `product_title`) VALUES
(1, 1, 573035082, 2, 1, 'pending', ''),
(2, 1, 573035082, 3, 1, 'pending', ''),
(5, 1, 2018815767, 4, 1, 'pending', ''),
(6, 1, 1669764334, 1, 1, 'pending', ''),
(7, 1, 174700485, 3, 1, 'pending', ''),
(8, 1, 174700485, 7, 1, 'pending', ''),
(9, 1, 355501858, 1, 1, 'pending', ''),
(10, 1, 355501858, 4, 1, 'pending', ''),
(12, 1, 355501858, 8, 1, 'pending', ''),
(13, 1, 254536393, 6, 1, 'pending', ''),
(14, 1, 254536393, 12, 1, 'pending', ''),
(15, 1, 1602624387, 10, 1, 'pending', ''),
(16, 1, 2009413761, 2, 1, 'pending', ''),
(17, 1, 2009413761, 4, 1, 'pending', ''),
(18, 1, 2009413761, 5, 1, 'pending', ''),
(19, 1, 940509609, 2, 1, 'pending', ''),
(20, 1, 782611432, 9, 1, 'pending', ''),
(21, 1, 1604595513, 14, 1, 'pending', ''),
(22, 1, 1189364842, 9, 1, 'pending', ''),
(23, 1, 388296544, 3, 1, 'pending', ''),
(24, 1, 428969161, 12, 1, 'pending', ''),
(25, 1, 2036315896, 9, 1, 'pending', ''),
(26, 1, 320391037, 8, 1, 'pending', ''),
(27, 1, 1567761587, 2, 1, 'pending', ''),
(28, 1, 1979470492, 4, 1, 'pending', ''),
(29, 1, 1856035580, 12, 1, 'pending', ''),
(30, 1, 1864817867, 10, 1, 'pending', ''),
(31, 1, 380343407, 4, 1, 'pending', ''),
(32, 1, 1324862317, 2, 1, 'pending', ''),
(33, 1, 1475872399, 4, 1, 'pending', ''),
(34, 1, 1379060593, 4, 1, 'pending', ''),
(35, 1, 620581412, 10, 1, 'pending', ''),
(36, 1, 1476778589, 7, 1, 'pending', ''),
(37, 1, 111113949, 6, 1, 'pending', ''),
(38, 1, 1552511039, 9, 1, 'pending', ''),
(39, 1, 118517423, 2, 1, 'pending', ''),
(40, 1, 1628245583, 10, 1, 'pending', ''),
(41, 1, 58237212, 2, 1, 'pending', ''),
(42, 1, 104330196, 7, 1, 'pending', ''),
(43, 1, 163193625, 7, 1, 'pending', ''),
(44, 1, 96310253, 12, 1, 'pending', ''),
(45, 1, 156377849, 9, 1, 'pending', ''),
(46, 1, 1422716988, 3, 1, 'pending', ''),
(47, 1, 577516030, 3, 1, 'pending', ''),
(48, 1, 364019911, 7, 1, 'pending', ''),
(49, 1, 1286797346, 7, 1, 'pending', ''),
(50, 1, 1527709477, 14, 1, 'pending', ''),
(51, 1, 927052095, 7, 1, 'pending', ''),
(52, 1, 1468465038, 2, 1, 'pending', ''),
(53, 1, 176781789, 14, 1, 'pending', ''),
(54, 1, 1938492248, 8, 1, 'pending', ''),
(55, 1, 620910831, 3, 1, 'pending', ''),
(56, 1, 1670671459, 12, 1, 'pending', ''),
(57, 1, 93430516, 4, 1, 'pending', ''),
(58, 1, 1307655402, 7, 1, 'pending', ''),
(59, 1, 1307655402, 9, 1, 'pending', ''),
(60, 1, 995788532, 4, 1, 'pending', ''),
(61, 1, 1022257413, 12, 1, 'pending', ''),
(62, 1, 978698973, 6, 1, 'pending', ''),
(63, 1, 875613013, 12, 1, 'pending', ''),
(64, 1, 1624836584, 8, 1, 'pending', ''),
(65, 1, 1413784928, 3, 1, 'pending', ''),
(66, 1, 382841826, 3, 1, 'pending', ''),
(67, 1, 857477167, 5, 1, 'pending', ''),
(68, 1, 555712015, 2, 0, 'pending', ''),
(69, 1, 912436736, 4, 1, 'pending', ''),
(70, 1, 681917780, 2, 1, 'pending', ''),
(71, 1, 873594896, 6, 1, 'pending', ''),
(72, 1, 614424504, 2, 1, 'pending', ''),
(73, 1, 1689568774, 4, 1, 'pending', ''),
(74, 1, 1325005009, 6, 1, 'pending', ''),
(75, 1, 1838659480, 2, 1, 'pending', ''),
(76, 1, 1283405516, 3, 1, 'pending', ''),
(77, 1, 247706764, 12, 1, 'pending', ''),
(78, 1, 1767095906, 4, 1, 'pending', ''),
(79, 1, 1765182195, 6, 1, 'pending', ''),
(80, 1, 649177041, 12, 1, 'pending', ''),
(81, 1, 1931095901, 2, 1, 'pending', ''),
(82, 1, 2001535446, 8, 1, 'pending', ''),
(83, 1, 170740964, 4, 1, 'pending', ''),
(84, 1, 106267878, 2, 1, 'pending', ''),
(85, 1, 546409466, 8, 1, 'pending', ''),
(86, 1, 1430383329, 2, 2, 'pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_number` int(11) NOT NULL,
  `amnt` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `shipping_mode` varchar(255) DEFAULT NULL,
  `gcash_ref_num` varchar(100) DEFAULT NULL,
  `gcash_account_name` varchar(100) DEFAULT NULL,
  `gcash_account_number` varchar(15) DEFAULT NULL,
  `gcash_amount_sent` decimal(10,2) DEFAULT NULL,
  `receiver_name` varchar(100) NOT NULL,
  `receiver_address` text NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `order_id`, `order_number`, `amnt`, `payment_mode`, `date`, `shipping_mode`, `gcash_ref_num`, `gcash_account_name`, `gcash_account_number`, `gcash_amount_sent`, `receiver_name`, `receiver_address`, `payment_date`, `user_id`) VALUES
(1, 82, 546409466, 999, 'Gcash', '2024-06-03 10:18:00', 'JTX', NULL, NULL, NULL, NULL, '', '', '2024-06-03 10:18:00', 0),
(2, 83, 1430383329, 1498, 'Gcash', '2024-06-03 10:20:49', 'FX', NULL, NULL, NULL, NULL, '', '', '2024-06-03 10:20:49', 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `payment_method_id` int(11) NOT NULL,
  `payment_method_desc` varchar(55) NOT NULL,
  `payment_method_status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`payment_method_id`, `payment_method_desc`, `payment_method_status`) VALUES
(1, 'GCASH', 'A'),
(2, 'COD', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

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
(2, 'Curved Hobo Bag', 'bag, trends, curved, hobo, curvedbag, women, girls, girl, women, small, bags, violet, curvedhobo, occasion, elegant, curved hobo bag', 2, 'trend1.jpg', 'trend1_2.webp', 'trend1_3.webp', '749', '2024-06-02 10:37:52', 'on-sale'),
(3, 'Canvas Totebag', 'bag, totebag, women, canvas, canvastotebag, woman, girl, girls, white, brown, medium, handle bag, handy bag, bags', 3, 'w1.jpg', 'w1_2.jpg', 'w1_3.jpg', '999', '2024-06-02 10:49:13', 'on-sale'),
(4, 'Crossbody Bag', 'crossbody bag, bag, men, crossbody, crossbodybag, man, boy, boys, black, small', 4, 'm1.jpg', 'm1_2.webp', 'm1_3.webp', '299', '2024-06-02 10:38:52', 'on-sale'),
(5, 'Asge Backpack', 'asge backpack, bag, kid, kids, asge, backpack, asgebackpack, soccer, flame, fire, orange, red, black, school bag, large, kinder, cool', 5, 'k1.jpg', 'k1_2.jpeg', 'k1_3.webp', '969', '2024-06-02 10:44:46', 'on-sale'),
(6, 'Rise Duffle Bag (Jordan)', 'unisex, bag, jordan, rise bag, bag, boys, girls, \r\nwomen, men, duffle, duffle bag, large, black, rise duffle bag, travel bag', 7, 'uni2.jpg', 'uni2_2.webp', 'uni2_3.png', '999', '2024-06-02 10:44:27', 'on-sale'),
(8, 'Straw Scarf-Print Totebag', 'women, straw, scarf, print, scarf-print, totebag, girls, girl, woman, brown, white, medium, ribbon', 3, 'w2.jpg', 'w2_2.avif', 'w2_3.webp', '999', '2024-06-02 10:37:25', 'on-sale'),
(10, 'School Travel Donut Cupcakes Pattern Backpack (JOYHILL)', 'school, travel, backpack, donut, donuts, cupcakes, cupcake, kinder, ice cream,\r\nbag, bags, joyhill, \r\ngirls, \r\ngirl, schoolbag, travelbag, schoolbackpack, travelbackpack,kids, kid, kidsbags, bag kid, white, colorful, big, large', 5, 'k2.jpg', 'k2_2.jpg', 'k2_3.jpg', '989', '2024-06-02 10:45:06', 'on-sale'),
(12, 'Cross Bottle Bag', 'unisex, boys, girls, men, women, \r\nbag, bags, cross \r\nbottle, cross, bottle, cross bottle bag, boy, girl, black, yellow, white, medium', 7, 'uni1.jpg', 'uni1_2.webp', 'uni1_3.webp', '599', '2024-06-02 10:47:00', 'on-sale'),
(14, 'Mini Leather Bag', 'trend, trends, women, mini, leather, bag, bags, green, padlock, woman, girl, girls, trending, elegant, occasion, small', 2, 'trend3.jpg', 'trend3.jpg', 'trend3.jpg', '999', '2024-06-02 10:48:29', 'on-sale');

-- --------------------------------------------------------

--
-- Table structure for table `shippers`
--

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
(1, 'binibiningyeshaaaa', 'alyssa@gmail.com', '$2y$10$cWh2La3ZmpM1upM9j6pO/uEYFwG2O.j4/.ss4qPZpYFpr9MTmKbOq', 'Alyssa Sumalpong', 'Oas, Albay', '09454499583', 'F', '2024-06-02 10:26:20', '::1', 'luffy.jpg'),
(8, 'sandara', 'sandara@gmail.com', '$2y$10$u0rchwduBgn.On7ImMpCVOjAAtzNUf2AO0rcVke/dj8F9O0ks.VQG', 'Sandara Morcozo', 'Alomon, Albay', '09123456789', 'F', '2024-06-02 07:16:53', '::1', 'robin.jpg');

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- Constraints for table `shipping_details`
--
ALTER TABLE `shipping_details`
  ADD CONSTRAINT `shipping_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
