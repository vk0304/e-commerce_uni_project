-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2023 at 03:27 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_image`) VALUES
(2, 'vivek', 'vivekkumartk5@gmail.com', '$2y$10$Cpeh9PluwbFzXNsVtbiMDu0xq6spXCoY5LK8yhHNH5KzB3s27Gvay', 'my photo.jpg'),
(3, 'zarrar', 'zarrar_731@gmail.com', '$2y$10$vWQdm7o5pQG6uwaO7A4CPu4V93L3I/WVENezXzq73GWOj6wj6D5Km', '');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(4, 'Sovo'),
(5, 'M series '),
(7, 'Rommos'),
(10, 'Audionic'),
(12, 'Itel');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`product_id`, `ip_address`, `quantity`) VALUES
(5, '::1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(3, 'Speakers'),
(4, 'Earbuds'),
(6, 'Powerbanks'),
(7, 'Data Cables'),
(10, 'Adapters');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_num` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `user_id`, `invoice_num`, `product_id`, `quantity`, `order_status`) VALUES
(16, 5, 2089193388, 5, 3, 'pending'),
(17, 5, 1513229157, 7, 2, 'pending'),
(18, 5, 875540613, 5, 2, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(300) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) VALUES
(3, 'AUDIONIC ALIEN 2 LAPTOP SPEAKER Latest', 'Audionic engineered numerous quality products since 15 years of lively hard work in the field of technology. Audionic introduced an innovative concept to deliver small speakers, best known for High features and specifications.', 'Audionic Alien 2, Laptop speaker, Portable speaker, USB-powered speaker Plug and play, Built-in controls, Wide compatibility, Enhanced audio, Clear sound', 3, 11, 'audionic_alien.jpg', 'audionic_alien2.jpg', 'audionic_alien3.jpg', '1999', '2023-06-29 02:44:00', 'true'),
(4, 'Sovo Power Bank X16 20000mAh', ' Power bank Lcd Display 4 Built-in Cable Unique Design Ultra Slim Portable power bank Fast charging', 'Sovo X16 Powerbank Portable charger Powerbank with Bluetooth speaker Wireless charging High capacity Fast charging USB-C port', 6, 4, 'sovo_16_1.jpg', 'sovo_x16.jpg', 'sovo_x16_2.jpg', '4000', '2023-06-17 23:32:21', 'true'),
(5, 'M10 True Wireless Bluetooth Earbuds', 'M10 TWS Wireless Headphones Touch Control Bluetooth-Compatible 5.1 Earphones Wireless Headset Waterproof 9D Hifi Quality Earbuds', 'M10 earbuds Wireless earbuds Bluetooth earbuds True wireless earbuds In-ear headphones Noise-cancelling Hi-Fi sound Touch control', 4, 5, 'm10_1.jpg', 'images.jpeg', 'm10_3.jpg', '1500', '2023-06-28 22:16:14', 'true'),
(7, 'Rommos sense 4 powerbank', 'A Romoss Certified China Premium Battery Cell is used to assure you of the highest quality with a 10400 mAh capacity and more than 300 recharge cycles over the life of the battery; ', 'Romoss Powerbank , Portable charger , Battery backup , Mobile charging , High capacity , Fast charging , USB-C', 6, 7, '305388232-600x450.jpeg', '1519628440_1024x.jpg', 'download.jpeg', '1299', '2023-06-29 02:55:20', 'true');

-- --------------------------------------------------------

--
-- Stand-in structure for view `users_detail_view`
-- (See below for the actual view)
--
CREATE TABLE `users_detail_view` (
`user_id` int(11)
,`username` varchar(100)
,`total_orders` bigint(21)
,`total_completed` decimal(22,0)
,`total_pending` decimal(22,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_num` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_num`, `total_products`, `order_date`, `order_status`) VALUES
(15, 5, 7500, 32713367, 1, '2023-07-04 07:22:22', 'Complete'),
(36, 5, 1500, 2115249067, 1, '2023-07-05 06:36:17', 'Complete'),
(38, 5, 2598, 1513229157, 1, '2023-07-05 09:44:10', 'Complete'),
(39, 5, 3000, 875540613, 1, '2023-07-05 09:44:16', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_num` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_payments`
--

INSERT INTO `user_payments` (`payment_id`, `order_id`, `invoice_num`, `amount`, `payment_mode`, `date`) VALUES
(7, 15, 32713367, 7500, 'Jazzcash', '2023-07-04 07:22:22'),
(10, 37, 2115249067, 1500, 'Bank', '2023-07-05 06:36:23'),
(11, 38, 1513229157, 2598, '', '2023-07-05 09:44:10'),
(12, 39, 875540613, 3000, '', '2023-07-05 09:44:16');

-- --------------------------------------------------------

--
-- Table structure for table `uuser_table`
--

CREATE TABLE `uuser_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `uuser_table`
--

INSERT INTO `uuser_table` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_phone`) VALUES
(5, 'vivektk5', 'vivekkumartk5@gmail.com', '$2y$10$Ryf9ujVIwgXJNDw9CHjs0ewc5vbkzTRUkQ9kpwH2Quvl0J8KY4b.i', 'my photo.jpg', '::1', 'karachi', '+923041406913'),
(7, 'zarrar', 'zarrar21@gmail.com', '$2y$10$ncfxYsHAK4MN/8gBbOXbguODJ2xJYvYATt6L2pgdvGi5Qt2FFfpTO', '', '::1', 'karachi', '+92Â 332Â 2128847');

-- --------------------------------------------------------

--
-- Structure for view `users_detail_view`
--
DROP TABLE IF EXISTS `users_detail_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `users_detail_view`  AS SELECT `u`.`user_id` AS `user_id`, `u`.`username` AS `username`, count(`o`.`order_id`) AS `total_orders`, sum(case when `o`.`order_status` = 'Complete' then 1 else 0 end) AS `total_completed`, sum(case when `o`.`order_status` = 'pending' then 1 else 0 end) AS `total_pending` FROM (`uuser_table` `u` left join `user_orders` `o` on(`u`.`user_id` = `o`.`user_id`)) GROUP BY `u`.`user_id`, `u`.`username` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

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
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `uuser_table`
--
ALTER TABLE `uuser_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `uuser_table`
--
ALTER TABLE `uuser_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
