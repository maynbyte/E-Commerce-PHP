-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2024 at 01:43 AM
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
-- Database: `php_web_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `popular` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(191) NOT NULL,
  `meta_title` varchar(191) NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `popular`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`) VALUES
(1, 'Smart Phones', 'smart_phones', 'All kinds of Smart Phones', 0, 1, '1704502362.jpg', 'Smart Phones', 'All kinds of Smart Phones', 'All kinds of Smart Phones', '2024-01-05 01:37:30'),
(2, 'Laptops', 'laptops', 'All kinds of laptops', 0, 1, '1704420784.jpg', 'Laptops', 'All kinds of laptops', 'All kinds of laptops', '2024-01-05 02:13:04'),
(14, 'Footwear', 'footwear', 'All kinds of footwear', 0, 1, '1704503186.jpg', 'Footwear', 'All kinds of footwear', 'All kinds of footwear', '2024-01-06 01:06:26');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `tracking_no` varchar(191) NOT NULL,
  `user_id` int(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `address` mediumtext NOT NULL,
  `pincode` int(191) NOT NULL,
  `total_price` int(191) NOT NULL,
  `payment_mode` varchar(191) NOT NULL,
  `payment_id` varchar(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `comments` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `tracking_no`, `user_id`, `name`, `email`, `phone`, `address`, `pincode`, `total_price`, `payment_mode`, `payment_id`, `status`, `comments`, `created_at`) VALUES
(1, 'ows525634567890', 1, 'user', 'user@mail.com', '1234567890', 'user address', 1234, 24794, 'COD', '', 0, NULL, '2024-01-10 05:57:01'),
(2, 'ows140834567890', 1, 'user', 'user@mail.com', '1234567890', 'user address', 1234, 24794, 'COD', '', 1, NULL, '2024-01-10 06:04:31'),
(3, 'ows17603123123', 3, 'usir', 'usir@mail.com', '123123123', 'usir address', 12345, 37990, 'COD', '', 1, NULL, '2024-01-10 13:42:48'),
(4, 'ows1873123123123', 2, 'admin admin', 'admin@mail.com', '09123123123', 'admin address', 1234, 39000, 'COD', '', 1, NULL, '2024-01-12 12:55:03'),
(5, 'ows9361123123123', 2, 'admin admin', 'admin@mail.com', '09123123123', 'admin admin address', 1234, 15000, 'COD', '', 0, NULL, '2024-01-20 00:38:39');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(191) NOT NULL,
  `prod_id` int(191) NOT NULL,
  `qty` int(191) NOT NULL,
  `price` int(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `prod_id`, `qty`, `price`, `created_at`) VALUES
(1, 1, 2, 5, 4299, '2024-01-10 05:57:01'),
(2, 1, 1, 1, 3299, '2024-01-10 05:57:01'),
(3, 2, 2, 5, 4299, '2024-01-10 06:04:31'),
(4, 2, 1, 1, 3299, '2024-01-10 06:04:31'),
(5, 3, 2, 5, 4299, '2024-01-10 13:42:48'),
(6, 3, 1, 5, 3299, '2024-01-10 13:42:48'),
(7, 4, 10, 5, 7800, '2024-01-12 12:55:03'),
(8, 5, 9, 3, 5000, '2024-01-20 00:38:39');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `small_description` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `original_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `image` varchar(191) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `trending` tinyint(4) NOT NULL,
  `meta_title` varchar(191) NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `small_description`, `description`, `original_price`, `selling_price`, `image`, `qty`, `status`, `trending`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`) VALUES
(1, 1, 'Infinix Smart 8', 'infinix_smart_8', 'Infinix Smart 8 a smart phone made by infinix', 'Infinix Smart 8 a smart phone made by infinix. Infinix Smart 8 a smart phone made by infinix. Infinix Smart 8 a smart phone made by infinix.', 3699, 3299, '1704506686.jpg', 20, 0, 1, 'Infinix Smart 8', 'Infinix Smart 8 a smart phone made by infinix', 'Infinix Smart 8 a smart phone made by infinix', '2024-01-06 02:04:46'),
(2, 1, 'Infinix Hot 30i ', 'infinix_hot_30i ', 'Infinix Hot 30i  a smart phone made by infinix', 'Infinix Hot 30i  a smart phone made by infinix', 4499, 4299, '1704674863.jpg', 45, 0, 1, 'Infinix Hot 30i ', 'Infinix Hot 30i  a smart phone made by infinix', 'Infinix Hot 30i  a smart phone made by infinix', '2024-01-08 00:00:57'),
(9, 14, 'Nike Dunk Low', 'nike_dunk_low', 'Created for the hardwood but taken to the streets, the 1980s b-ball icon returns with perfectly shined overlays and classic team colors. With its iconic hoops design, the Nike Dunk Low channels 1980s vintage back onto the streets while its padded, low-cut collar lets you take your game anywhere—in comfort.', 'Benefits\r\n\r\n    The crisp leather on the upper has a slight sheen, ages to soft perfection and features durable overlays reminiscent of 1980s b-ball.\r\n    The foam mid-sole offers lightweight, responsive cushioning.\r\n    The padded, low-cut collar adds a sleek look that feels comfortable.\r\n    The bold color-blocking on select versions returns to the university colors released in 1985, letting you choose who reigned supreme and rep your team.\r\n    The rubber sole with a classic hoops pivot circle adds durability, traction and heritage style.\r\n\r\n\r\nProduct Details\r\n\r\n    Low-cut collar\r\n    Foam insole\r\n    Color Shown: White/White/Black\r\n    Style: DD1503-101\r\n    Country/Region of Origin: Vietnam,Indonesia', 5500, 5000, '1705017344.jpg', 17, 0, 1, 'Nike Dunk Low', 'Benefits\r\n\r\n    The crisp leather on the upper has a slight sheen, ages to soft perfection and features durable overlays reminiscent of 1980s b-ball.\r\n    The foam mid-sole offers lightweight, responsive cushioning.\r\n    The padded, low-cut collar adds a sleek look that feels comfortable.\r\n    The bold color-blocking on select versions returns to the university colors released in 1985, letting you choose who reigned supreme and rep your team.\r\n    The rubber sole with a classic hoops pivot circle adds durability, traction and heritage style.\r\n\r\n\r\nProduct Details\r\n\r\n    Low-cut collar\r\n    Foam insole\r\n    Color Shown: White/White/Black\r\n    Style: DD1503-101\r\n    Country/Region of Origin: Vietnam,Indonesia', 'Benefits\r\n\r\n    The crisp leather on the upper has a slight sheen, ages to soft perfection and features durable overlays reminiscent of 1980s b-ball.\r\n    The foam mid-sole offers lightweight, responsive cushioning.\r\n    The padded, low-cut collar adds a sleek look that feels comfortable.\r\n    The bold color-blocking on select versions returns to the university colors released in 1985, letting you choose who reigned supreme and rep your team.\r\n    The rubber sole with a classic hoops pivot circle adds durability, traction and heritage style.\r\n\r\n\r\nProduct Details\r\n\r\n    Low-cut collar\r\n    Foam insole\r\n    Color Shown: White/White/Black\r\n    Style: DD1503-101\r\n    Country/Region of Origin: Vietnam,Indonesia', '2024-01-11 23:55:44'),
(10, 14, 'Anta Klay Thompson KT8', 'anta_klay_thompson_KT8', 'Technologies:\r\n\r\n– NITROEDGE it is injected into the sole material under supercritical high pressure. Light, elastic and durable. Light weight: the low-density material is much lighter under the same volume and helpful for sports performance. High rebounding: the rebounding performance is higher than that of regular midsoles thus provides a better feeling. High durability: the material with little physical attenuation is highly resistant to fatigue and able to endure prolonged games.\r\n\r\n– SMART S.A.M adopts military bulletproof technology materials. The molecules are in a random semi-free state with large spacing when unstressed, giving the material a soft touch. The material molecules are instantly closely arranged into a hardened regular form with a reduced spacing under impact, achieving instant shock absorption and stable support. According to a sports science laboratory, the material has a rebound rate that is only 3% of FLASH FOAM, which means that it can absorb shock because more than 90% of the shock is absorbed by the molecules.\r\n\r\n– 3D HUG support stability module made of carbon – 3D surround TPU structure of sole an upper, provide effective front side support and rear sole stability function.', 'Anta KT8 FATHER AND SON is inspired by Klay Thompson and his father: “Like father like son.” Klay’s father Michael is the mentor and guardian of Klay’s life.\r\n\r\nThe KT8 “Father and Son” basketball shoes are dedicted to Klay’s father Michael Thompson:\r\n-> Purple is the color of his father’s Lakers team.\r\n-> M initials on the heel represents his father’s name.\r\n-> The tongue holdes year 1987 and 1988; back-to-back championship year of his father, when he won two consecutive championships.\r\n-> The thounge number 43 at the back represents father’s back number.\r\n\r\nThe midsole part adopts the A-FLASHEDGE technology frame and midfoot X-shaped anti-torsion piece, which has a soft and moderate foot feeling experience.\r\nIt provides excellent stability and torsion resistance of the shoe body.\r\nThe midsole uses a full palm shovel-shaped carbon plate (3D HUG), which enables smooth power transmission between the front and rear palms. It helps shooters quickly enter the shooting state and improving the feel.\r\nNITROEDGE technology insole + NITROEDGE technology midsole + SMART S.A.M intelligent shock-absorbing module provides the foot feeling experience lighter and more elastic. The feedback is more durable. Every take-off and landing is flexible and fast.', 8000, 7800, '1705064026.jpg', 10, 0, 1, 'Anta Klay Thompson KT8 FATHER AND SON Basketball Shoes', 'Technologies:\r\n\r\n– NITROEDGE it is injected into the sole material under supercritical high pressure. Light, elastic and durable. Light weight: the low-density material is much lighter under the same volume and helpful for sports performance. High rebounding: the rebounding performance is higher than that of regular midsoles thus provides a better feeling. High durability: the material with little physical attenuation is highly resistant to fatigue and able to endure prolonged games.\r\n\r\n– SMART S.A.M adopts military bulletproof technology materials. The molecules are in a random semi-free state with large spacing when unstressed, giving the material a soft touch. The material molecules are instantly closely arranged into a hardened regular form with a reduced spacing under impact, achieving instant shock absorption and stable support. According to a sports science laboratory, the material has a rebound rate that is only 3% of FLASH FOAM, which means that it can absorb shock because more than 90% of the shock is absorbed by the molecules.\r\n\r\n– 3D HUG support stability module made of carbon – 3D surround TPU structure of sole an upper, provide effective front side support and rear sole stability function.', 'Technologies:\r\n\r\n– NITROEDGE it is injected into the sole material under supercritical high pressure. Light, elastic and durable. Light weight: the low-density material is much lighter under the same volume and helpful for sports performance. High rebounding: the rebounding performance is higher than that of regular midsoles thus provides a better feeling. High durability: the material with little physical attenuation is highly resistant to fatigue and able to endure prolonged games.\r\n\r\n– SMART S.A.M adopts military bulletproof technology materials. The molecules are in a random semi-free state with large spacing when unstressed, giving the material a soft touch. The material molecules are instantly closely arranged into a hardened regular form with a reduced spacing under impact, achieving instant shock absorption and stable support. According to a sports science laboratory, the material has a rebound rate that is only 3% of FLASH FOAM, which means that it can absorb shock because more than 90% of the shock is absorbed by the molecules.\r\n\r\n– 3D HUG support stability module made of carbon – 3D surround TPU structure of sole an upper, provide effective front side support and rear sole stability function.', '2024-01-12 12:53:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` int(15) NOT NULL,
  `password` varchar(191) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `role_as`, `created_at`) VALUES
(1, 'user', 'user@mail.com', 2147483647, 'user', 0, '2024-01-04 05:40:16'),
(2, 'admin', 'admin@mail.com', 1231231233, 'admin', 1, '2024-01-04 05:42:22'),
(3, 'usir', 'usir@mail.com', 123321123, 'usir', 0, '2024-01-05 00:19:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
