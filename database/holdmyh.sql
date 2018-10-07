-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2018 at 11:50 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `holdmyh`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default-male.jpg',
  `status` int(11) NOT NULL DEFAULT '1',
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdby` int(11) DEFAULT NULL,
  `editedby` int(11) DEFAULT NULL,
  `deletedby` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `telp`, `email`, `password`, `image`, `status`, `datecreated`, `createdby`, `editedby`, `deletedby`) VALUES
(1, 'Aldhan', 'Lumajang', '122312', 'aldhan', '5ba5e84a80b832715a8152fe53918bb7', 'default-male.jpg', 1, '2018-06-22 10:19:39', 1, NULL, NULL),
(2, 'user1', 'user1', 'user1', 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 'logoaldansorry1.png', 1, '2018-06-22 10:42:28', NULL, 1, NULL),
(3, 'user2', 'user2', 'user2', 'user2', '7e58d63b60197ceb55a1c487989a3720', 'default-male.jpg', 1, '2018-06-22 10:45:05', NULL, NULL, NULL),
(4, 'user3', 'user3', 'user3', 'user3', '92877af70a45fd6a2ed7fe81e1236b78', 'default-male.jpg', 1, '2018-06-22 10:50:52', 1, NULL, 1),
(5, 'nyo', 'nganjuk', '0856458', 'nyo@gmail.com', '202cb962ac59075b964b07152d234b70', 'default-male.jpg', 1, '2018-06-24 12:42:33', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default-male.jpg',
  `status` int(11) NOT NULL DEFAULT '1',
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdby` int(11) DEFAULT NULL,
  `editedby` int(11) DEFAULT NULL,
  `deletedby` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `address`, `telp`, `email`, `password`, `level`, `image`, `status`, `datecreated`, `createdby`, `editedby`, `deletedby`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'logoaldansorry.png', 1, '2018-06-22 10:18:38', NULL, NULL, NULL),
(2, 'operator', 'operator', 'operator', 'operator', '4b583376b2767b923c3e1da60d10de59', 2, 'default-male.jpg', 1, '2018-06-22 10:52:38', 1, NULL, NULL),
(3, '2', '21', '2', '2', 'c81e728d9d4c2f636f067f89cc14862c', 1, 'default-male.jpg', 1, '2018-06-22 10:52:53', 1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdby` int(11) DEFAULT NULL,
  `editedby` int(11) DEFAULT NULL,
  `deletedby` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `title`, `description`, `date`, `time`, `image`, `site_url`, `status`, `datecreated`, `createdby`, `editedby`, `deletedby`) VALUES
(1, 'Konser 2', 'omo 2', '2018-06-23', '15:02:00', 'logoaldansorry1.png', 'http://www.google.com', 1, '2018-06-22 10:58:42', 1, 1, NULL),
(2, '1', '1', '0001-01-01', '01:01:00', 'logo1.png', '1', 1, '2018-06-22 10:59:00', 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdby` int(11) DEFAULT NULL,
  `editedby` int(11) DEFAULT NULL,
  `deletedby` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `status`, `datecreated`, `createdby`, `editedby`, `deletedby`) VALUES
(1, 'Konser di Malang 2', 'Omoo 2', 'logoaldansorry.png', 1, '2018-06-22 10:57:49', 1, 1, NULL),
(2, '1', '1', 'logoaldansorry1.png', 1, '2018-06-22 10:59:16', 1, NULL, 1),
(3, '123', '123', 'logoCoding.png', 1, '2018-06-22 20:50:42', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `no` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `fk_id_customer` int(11) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdby` int(11) DEFAULT NULL,
  `editedby` int(11) DEFAULT NULL,
  `deletedby` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `no`, `date`, `fk_id_customer`, `datecreated`, `createdby`, `editedby`, `deletedby`) VALUES
(1, 'HMH00001', '2018-05-31', 2, '2018-06-22 13:04:34', 2, NULL, NULL),
(2, 'HMH00002', '2017-06-22', 2, '2018-06-22 13:05:35', 2, NULL, NULL),
(3, 'HMH00003', '2018-06-22', 2, '2018-06-22 13:15:28', 2, NULL, NULL),
(4, 'HMH00004', '2018-06-22', 2, '2018-06-22 13:17:23', 2, NULL, NULL),
(5, 'HMH00005', '2018-06-24', 2, '2018-06-24 19:34:58', 2, NULL, NULL),
(6, 'HMH00006', '2018-06-28', 2, '2018-06-24 19:35:57', 2, NULL, NULL),
(7, 'HMH00007', '2018-06-30', 2, '2018-06-30 13:34:35', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id` int(11) NOT NULL,
  `fk_id_orders` int(11) NOT NULL,
  `fk_id_product_stock` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`id`, `fk_id_orders`, `fk_id_product_stock`, `quantity`) VALUES
(1, 1, 1, 5),
(2, 2, 3, 1),
(3, 3, 1, 1),
(4, 4, 3, 1),
(5, 4, 1, 1),
(6, 5, 6, 1),
(7, 6, 2, 1),
(8, 7, 2, 1);

--
-- Triggers `orders_detail`
--
DELIMITER $$
CREATE TRIGGER `stock_update` AFTER INSERT ON `orders_detail` FOR EACH ROW UPDATE product_stock set product_stock.stock=(select ps.stock from (select * from product_stock) as ps WHERE ps.id = NEW.fk_id_product_stock limit 1)-NEW.quantity where product_stock.id=NEW.fk_id_product_stock
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(65) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdby` int(11) DEFAULT NULL,
  `editedby` int(11) DEFAULT NULL,
  `deletedby` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `category`, `color`, `datecreated`, `createdby`, `editedby`, `deletedby`) VALUES
(1, 'Holdmyhand shirt', 'bahan besi', 'Shirt', 'White', '2018-06-22 10:56:16', 1, NULL, NULL),
(2, 'Hmh', 'Bahan karet', 'Jacket', 'Black', '2018-06-22 18:11:55', 1, NULL, NULL),
(3, 'Hand is up', 'bahan kertas', 'Accessories', 'Red', '2018-06-22 19:05:52', 1, NULL, NULL),
(4, 'Hands Up', 'Dari Batu', 'Shirt', 'Black', '2018-06-30 11:15:22', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `fk_id_product` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datecreated` int(11) NOT NULL,
  `createdby` int(11) DEFAULT NULL,
  `deletedby` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `fk_id_product`, `image`, `datecreated`, `createdby`, `deletedby`) VALUES
(1, 1, 'logoaldansorry.png', 0, 1, NULL),
(2, 1, 'logo1.png', 0, 1, NULL),
(3, 2, 'logoCoding.png', 0, 1, NULL),
(4, 3, 'asd.png', 0, 1, 1),
(5, 3, 'sakura.png', 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_stock`
--

CREATE TABLE `product_stock` (
  `id` int(11) NOT NULL,
  `fk_id_product` int(11) NOT NULL,
  `size` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `price` int(20) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdby` int(11) DEFAULT NULL,
  `editedby` int(11) DEFAULT NULL,
  `deletedby` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_stock`
--

INSERT INTO `product_stock` (`id`, `fk_id_product`, `size`, `stock`, `price`, `datecreated`, `createdby`, `editedby`, `deletedby`) VALUES
(1, 1, 'S', 3, 50000, '2018-06-22 10:56:36', 1, NULL, NULL),
(2, 1, 'M', 1, 60000, '2018-06-22 10:56:43', 1, NULL, NULL),
(3, 1, 'L', 3, 70000, '2018-06-22 10:56:55', 1, NULL, NULL),
(4, 1, 'XL', 5, 100000, '2018-06-22 15:16:39', 1, NULL, NULL),
(5, 2, 'XL', 0, 50000, '2018-06-22 18:12:03', 1, NULL, NULL),
(6, 3, 'M', 0, 56000, '2018-06-22 19:06:07', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shipment`
--

CREATE TABLE `shipment` (
  `id` int(11) NOT NULL,
  `service` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `receipt` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` int(20) NOT NULL,
  `fk_id_employee` int(11) NOT NULL,
  `fk_id_orders` int(11) NOT NULL,
  `createdby` int(11) DEFAULT NULL,
  `editedby` int(11) DEFAULT NULL,
  `deletedby` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipment`
--

INSERT INTO `shipment` (`id`, `service`, `date`, `receipt`, `cost`, `fk_id_employee`, `fk_id_orders`, `createdby`, `editedby`, `deletedby`) VALUES
(1, 'JNE', '2018-06-29', '112233123123123123', 100000, 1, 1, 1, NULL, NULL),
(2, 'JNE', '2018-06-24', '126232716217', 3000, 1, 2, 1, NULL, NULL),
(3, 'JNE', '2018-06-29', '123123123123123', 20000, 1, 4, 1, NULL, NULL),
(4, '1', '2018-06-29', '11203102392103', 10000, 3, 3, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

CREATE TABLE `slideshow` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdby` int(11) DEFAULT NULL,
  `editedby` int(11) DEFAULT NULL,
  `deletedby` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`id`, `title`, `content`, `image`, `datecreated`, `createdby`, `editedby`, `deletedby`) VALUES
(1, 'Hold My Hand', 'Hold my hand official website', 'slideshow1.jpg', '2018-06-21 14:06:56', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `embed_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_star` tinyint(1) NOT NULL DEFAULT '0',
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdby` int(11) DEFAULT NULL,
  `editedby` int(11) DEFAULT NULL,
  `deletedby` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `embed_url`, `is_star`, `datecreated`, `createdby`, `editedby`, `deletedby`) VALUES
(1, 'Zen Zen Zense', 'https://www.youtube.com/embed/b5nNv1yFEZQ', 0, '2018-06-22 11:00:17', 1, NULL, NULL),
(2, '2', '2', 0, '2018-06-22 11:00:27', 1, 1, 1),
(3, 'Hold my hand live at delanggu', 'https://www.youtube.com/embed/45bMbFCOFEE', 1, '2018-06-24 19:56:11', 1, 1, NULL),
(4, 'hold my hand at home', 'https://www.youtube.com/embed/25ppdNt52MU', 0, '2018-06-24 20:02:03', 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_customer` (`fk_id_customer`);

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_orders` (`fk_id_orders`),
  ADD KEY `fk_id_product_stock` (`fk_id_product_stock`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_product` (`fk_id_product`);

--
-- Indexes for table `product_stock`
--
ALTER TABLE `product_stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_product` (`fk_id_product`);

--
-- Indexes for table `shipment`
--
ALTER TABLE `shipment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_employee` (`fk_id_employee`),
  ADD KEY `fk_id_orders` (`fk_id_orders`);

--
-- Indexes for table `slideshow`
--
ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_stock`
--
ALTER TABLE `product_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `shipment`
--
ALTER TABLE `shipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
