-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2020 at 08:36 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csdl_nhom2`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cart_user_id` int(11) NOT NULL,
  `cart_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cart_int` int(11) NOT NULL,
  `cart_img` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `cart_price` double NOT NULL,
  `cart_all_price` double DEFAULT NULL,
  `cart_prod_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `cart_user_id`, `cart_name`, `cart_int`, `cart_img`, `cart_price`, `cart_all_price`, `cart_prod_id`, `seller_id`) VALUES
(105, 22, 'sd', 17, 'dien-thoai-Realme-5i.jpg', 232332, 3949644, 15, 21),
(119, 23, 'san phâm ok', 1, 'carte-voeux-noel-boites-cadeaux-table-arbres_43029-347.jpg', 2222222222222, 2222222222222, 31, 20),
(120, 19, 'dien thoai ngon', 1, '1d2b9828c9a60c6f880620ee1b6f311d.jpg', 10000, 10000, 29, 21);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cate_id`, `cate_name`) VALUES
(1, 'Điện tử'),
(2, 'Thời Trang'),
(3, 'Gia dung'),
(4, 'Quần áo'),
(5, 'Giày dép'),
(6, 'Xe'),
(7, 'Quần'),
(8, 'Đồ cũ'),
(9, 'Đồ mới'),
(10, 'Khác'),
(11, 'khác');

-- --------------------------------------------------------

--
-- Table structure for table `coments`
--

CREATE TABLE `coments` (
  `com_id` int(11) NOT NULL,
  `com_prod_id` int(11) NOT NULL,
  `com_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `com_content` text COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `coments`
--

INSERT INTO `coments` (`com_id`, `com_prod_id`, `com_name`, `com_content`, `updated_at`, `created_at`) VALUES
(28, 7, 'nhan', 'ds', '2020-12-04 09:18:18', '2020-12-04 09:18:18'),
(29, 7, 'fs', 'sf', '2020-12-04 09:18:22', '2020-12-04 09:18:22'),
(30, 7, 'sf', 'sf', '2020-12-04 09:18:26', '2020-12-04 09:18:26'),
(31, 7, 'sf', 'sf', '2020-12-04 09:18:29', '2020-12-04 09:18:29'),
(32, 7, 'sf', 'sf', '2020-12-04 09:18:34', '2020-12-04 09:18:34'),
(33, 7, 'Nhân', 'Việt anh', '2020-12-07 02:37:57', '2020-12-07 02:37:57'),
(34, 16, 'nhan', 'sds', '2020-12-08 03:35:30', '2020-12-08 03:35:30'),
(35, 15, 'nhân', 'ngon', '2020-12-09 05:22:30', '2020-12-09 05:22:30'),
(36, 22, 'ds', 'sd', '2020-12-09 21:18:07', '2020-12-09 21:18:07'),
(37, 29, 'nhan', 'ok', '2020-12-28 02:41:44', '2020-12-28 02:41:44'),
(38, 31, 'sd', 'ds', '2020-12-29 02:02:11', '2020-12-29 02:02:11');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `orderitem_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` double NOT NULL,
  `all_price` double NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `prod_img` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `prod_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`orderitem_id`, `order_id`, `prod_id`, `qty`, `price`, `all_price`, `updated_at`, `created_at`, `prod_img`, `prod_name`) VALUES
(83, 76, 31, 1, 2222222222222, 2222222222222, '2020-12-28 08:47:39', '2020-12-28 01:47:39', 'carte-voeux-noel-boites-cadeaux-table-arbres_43029-347.jpg', 'san phâm ok'),
(84, 77, 30, 2, 300000, 600000, '2020-12-28 08:47:39', '2020-12-28 01:47:39', 'dien-thoai-iphone-11-pro-max-2-500x500.jpg', 'Sản phẩm linh tinh'),
(85, 78, 31, 1, 2222222222222, 2222222222222, '2020-12-28 08:48:02', '2020-12-28 01:48:02', 'carte-voeux-noel-boites-cadeaux-table-arbres_43029-347.jpg', 'san phâm ok'),
(86, 79, 30, 2, 300000, 600000, '2020-12-28 08:48:02', '2020-12-28 01:48:02', 'dien-thoai-iphone-11-pro-max-2-500x500.jpg', 'Sản phẩm linh tinh'),
(87, 80, 30, 1, 300000, 300000, '2020-12-28 08:48:48', '2020-12-28 01:48:48', 'dien-thoai-iphone-11-pro-max-2-500x500.jpg', 'Sản phẩm linh tinh'),
(88, 80, 29, 1, 10000, 10000, '2020-12-28 08:48:48', '2020-12-28 01:48:48', '1d2b9828c9a60c6f880620ee1b6f311d.jpg', 'dien thoai ngon'),
(89, 81, 30, 1, 300000, 300000, '2020-12-28 08:50:13', '2020-12-28 01:50:13', 'dien-thoai-iphone-11-pro-max-2-500x500.jpg', 'Sản phẩm linh tinh'),
(90, 81, 29, 1, 10000, 10000, '2020-12-28 08:50:13', '2020-12-28 01:50:13', '1d2b9828c9a60c6f880620ee1b6f311d.jpg', 'dien thoai ngon'),
(91, 82, 30, 1, 300000, 300000, '2020-12-28 08:50:39', '2020-12-28 01:50:39', 'dien-thoai-iphone-11-pro-max-2-500x500.jpg', 'Sản phẩm linh tinh'),
(92, 82, 29, 1, 10000, 10000, '2020-12-28 08:50:39', '2020-12-28 01:50:39', '1d2b9828c9a60c6f880620ee1b6f311d.jpg', 'dien thoai ngon'),
(93, 83, 30, 1, 300000, 300000, '2020-12-28 08:51:37', '2020-12-28 01:51:37', 'dien-thoai-iphone-11-pro-max-2-500x500.jpg', 'Sản phẩm linh tinh'),
(94, 83, 29, 1, 10000, 10000, '2020-12-28 08:51:37', '2020-12-28 01:51:37', '1d2b9828c9a60c6f880620ee1b6f311d.jpg', 'dien thoai ngon'),
(95, 84, 31, 1, 2222222222222, 2222222222222, '2020-12-28 09:19:01', '2020-12-28 02:19:01', 'carte-voeux-noel-boites-cadeaux-table-arbres_43029-347.jpg', 'san phâm ok'),
(96, 85, 29, 2, 10000, 20000, '2020-12-28 12:37:19', '2020-12-28 05:37:19', '1d2b9828c9a60c6f880620ee1b6f311d.jpg', 'dien thoai ngon'),
(97, 86, 29, 3, 10000, 30000, '2020-12-28 12:38:02', '2020-12-28 05:38:02', '1d2b9828c9a60c6f880620ee1b6f311d.jpg', 'dien thoai ngon'),
(98, 87, 29, 1, 10000, 10000, '2020-12-28 13:00:44', '2020-12-28 06:00:44', '1d2b9828c9a60c6f880620ee1b6f311d.jpg', 'dien thoai ngon');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `customer_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `customer_phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `all_paymen` double NOT NULL,
  `seller_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `address`, `customer_name`, `customer_phone`, `updated_at`, `created_at`, `all_paymen`, `seller_id`, `status`) VALUES
(76, 19, 'Huyện Văn Giang', 'Nhân', '0973578613', '2020-12-28 01:47:39', '2020-12-28 01:47:39', 2222222222222, 20, 0),
(77, 19, 'Huyện Văn Giang', 'Nhân', '0973578613', '2020-12-28 01:47:39', '2020-12-28 01:47:39', 600000, 21, 0),
(78, 19, 'Huyện Văn Giang', 'Nhân', '0973578613', '2020-12-28 01:48:02', '2020-12-28 01:48:02', 2222222222222, 20, 0),
(79, 19, 'Huyện Văn Giang', 'Nhân', '0973578613', '2020-12-28 01:48:02', '2020-12-28 01:48:02', 600000, 21, 0),
(80, 19, 'Huyện Văn Giang', 'Nhân111111', '0973578613', '2020-12-28 01:48:48', '2020-12-28 01:48:48', 310000, 21, 0),
(81, 19, 'Huyện Văn Giang', 'Nhân', '0973578613', '2020-12-28 01:50:13', '2020-12-28 01:50:13', 310000, 21, 0),
(82, 19, 'Huyện Văn Giang', 'Phúc', '0973578613', '2020-12-28 01:50:39', '2020-12-28 01:50:39', 310000, 21, 0),
(83, 19, 'Huyện Văn Giang', 'Nhân', '0973578613', '2020-12-28 01:51:37', '2020-12-28 01:51:37', 310000, 21, 0),
(84, 23, 'Huyện Văn Giang', 'Nhân', '0973578613', '2020-12-28 02:19:01', '2020-12-28 02:19:01', 2222222222222, 20, 0),
(85, 19, 'Huyện Văn Giang', 'Nhân', '0973578613', '2020-12-28 05:37:19', '2020-12-28 05:37:19', 20000, 21, 0),
(86, 19, 'Huyện Văn Giang', 'Nhân', '0973578613', '2020-12-29 09:54:58', '2020-12-28 05:38:02', 30000, 21, 1),
(87, 19, 'Huyện Văn Giang', 'Nhân', '0973578613', '2020-12-29 09:52:15', '2020-12-28 06:00:44', 10000, 21, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prod_img` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `prod_price` double NOT NULL,
  `prod_promotion` float DEFAULT NULL,
  `prod_int` int(11) NOT NULL,
  `prod_description` text COLLATE utf8_unicode_ci NOT NULL,
  `prod_condition` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prod_cateID` int(11) NOT NULL,
  `prod_warranty` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seller_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_name`, `prod_img`, `prod_price`, `prod_promotion`, `prod_int`, `prod_description`, `prod_condition`, `prod_cateID`, `prod_warranty`, `seller_id`, `updated_at`, `created_at`) VALUES
(29, 'dien thoai ngon', '1d2b9828c9a60c6f880620ee1b6f311d.jpg', 10000, NULL, 23, 'okjasdsdadssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', 'Đồ mới', 1, 'bảo hành 3 năm', 21, '2020-12-28 01:42:24', '2020-12-28 01:42:24'),
(30, 'Sản phẩm linh tinh', 'dien-thoai-iphone-11-pro-max-2-500x500.jpg', 10000000, 300000, 10, 'fdfffffffffffffffffffffffffff', 'Đồ mới', 2, 'bảo hành 3 năm', 21, '2020-12-28 01:42:59', '2020-12-28 01:42:59'),
(31, 'san phâm ok', 'carte-voeux-noel-boites-cadeaux-table-arbres_43029-347.jpg', 2222222222222, NULL, 0, 'sdasdddddddddddddddddddddddddddddddd', 'Đồ mới', 3, '23sds', 20, '2020-12-29 09:23:35', '2020-12-28 01:44:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `acc_type` int(11) NOT NULL,
  `hotline` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revenue` double DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created_at`, `updated_at`, `acc_type`, `hotline`, `revenue`, `name`, `remember_token`, `address`) VALUES
(19, 'ok@gmail.com', '$2y$10$ybcMKA.pYlo1DPKrT9q8Te7zGXk.1YRmq7qKaDnUlZLdb5jO.aPqO', NULL, NULL, 1, NULL, NULL, NULL, 'WmBb62aEg2NJnnaNwp0fjQTgtOBlSGMfJNSjaR4rcTwhPkpjTNH6SPO1LwHh', NULL),
(20, 'ok1@gmail.com', '$2y$10$FDRdLf7b.W2.C94/b89I8ucezsk/Ig4rV6oPDJnTNpTnvn0vRap9W', '2020-12-07 00:46:20', '2020-12-07 00:46:20', 2, '0973578613', NULL, 'Nhân Nguyễn', NULL, 'Mễ Sở Văn giang'),
(21, 'ok2@gmail.com', '$2y$10$I20iKdw3ySpFIabhd6WbuOrc5UaRf04Fm727hvmWNZc4KizmyPZMG', '2020-12-08 01:22:35', '2020-12-08 01:22:35', 2, '0973578613', NULL, 'Lê hoa', NULL, 'Mễ Sở Văn giangsdsdsd'),
(22, 'dk@gmail.com', '$2y$10$b/jB3EURVn2BEtW4zITfceRAIq9ToQcltQcYNx7JLCcJG5GCRILDq', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(23, 'test@gmail.com', '$2y$10$wUAMAFs9QSLmkSzlm8GMKeTS/qckB72o6iBoJWjvSjqYGSYfDi/gO', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(24, 'admin', '$2a$10$Mkfiik8l5vuah1iEXK1ZSeOd5LaLY7jkmtD9Q3zfasnhxIF2gsgtC', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `coments`
--
ALTER TABLE `coments`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`orderitem_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`),
  ADD UNIQUE KEY `prod_id` (`prod_id`),
  ADD KEY `prod_cateID` (`prod_cateID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `coments`
--
ALTER TABLE `coments`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `orderitem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`prod_cateID`) REFERENCES `category` (`cate_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
