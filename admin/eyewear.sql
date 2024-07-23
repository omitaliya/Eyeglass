-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2023 at 05:50 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eyewear`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_table`
--

CREATE TABLE `cart_table` (
  `cart_id` int(11) NOT NULL,
  `l_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `shop_l_id` int(11) DEFAULT NULL,
  `quantity` int(10) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `status` int(5) DEFAULT NULL COMMENT '0 - in cart not ordered, 1 - order done, 2 - order cancel by shop'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_table`
--

INSERT INTO `cart_table` (`cart_id`, `l_id`, `product_id`, `shop_l_id`, `quantity`, `order_id`, `status`) VALUES
(9, 5, 11, 21, 1, 7, 2),
(10, 5, 12, 21, 1, 7, 1),
(13, 5, 15, 24, 1, NULL, 0),
(15, 5, 11, 21, 1, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail_table`
--

CREATE TABLE `detail_table` (
  `detail_id` int(11) NOT NULL,
  `l_id` int(11) DEFAULT NULL,
  `name` varchar(25) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `dp` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_table`
--

INSERT INTO `detail_table` (`detail_id`, `l_id`, `name`, `dob`, `address`, `dp`) VALUES
(1, 1, 'Miss Admin', '2000-01-01', 'Ahmedabad', '1616330427.png'),
(4, 4, 'Mr Admin', '1999-01-01', 'Ahmedabad', 'admin.jpg'),
(5, 5, 'Mr Shah', '2001-01-01', 'Navrangpura', '626311.jpg'),
(6, 6, 'Amiee', '1996-05-14', 'Usmanpura', '1623450188.jpg'),
(7, 12, 'Mr John', '2002-02-01', 'Ahmedabad', '1644418635.jpg'),
(12, 17, 'ABC User', '2000-02-01', 'Ahmedabad', '1644420528.jpg'),
(13, 18, 'Mr Patrick', '1999-02-25', 'shop@gmail.com', '1677758774.'),
(14, 21, 'Fastrack', '0001-01-01', 'Shop No 4, Sun Plaza Complex, 5, Commerce College Rd, opp. Innovative Honda, Swastik Society, Navran', '1677845524.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feed_id` int(11) NOT NULL,
  `l_id` int(11) DEFAULT NULL,
  `ratings` int(10) DEFAULT NULL,
  `comment` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feed_id`, `l_id`, `ratings`, `comment`) VALUES
(1, 5, 4, 'Amazing Products'),
(2, 6, 4, 'Best Products'),
(3, 12, 5, 'Best Products at lowest prices.'),
(4, 5, 4, 'Great place to shop!');

-- --------------------------------------------------------

--
-- Table structure for table `login_table`
--

CREATE TABLE `login_table` (
  `l_id` int(11) NOT NULL,
  `email_id` varchar(25) DEFAULT NULL,
  `phone_no` bigint(10) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `role` int(10) DEFAULT NULL COMMENT '1-Admin, 2-User, 3-Shop',
  `status` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_table`
--

INSERT INTO `login_table` (`l_id`, `email_id`, `phone_no`, `password`, `role`, `status`) VALUES
(1, 'admin@gmail.com', 9696969696, 'admin', 1, 1),
(4, 'admin2@gmail.com', 9686968696, '842044', 1, 1),
(5, 'user@gmail.com', 9898989898, 'user123', 2, 1),
(6, 'amie@gmail.com', 9685758965, 'amie123', 2, 1),
(7, 'shop5@gmail.com', 7878787878, 'shop123', 3, 1),
(9, 'freshy@gmail.com', 7856785678, 'freshy', 3, 1),
(11, 'kabhib@gmail.com', 8989898989, 'kabhib', 3, 1),
(12, 'john@gmail.com', 7889788978, 'john123', 2, 1),
(17, 'abc@gmail.com', 7474747474, 'abc@123', 2, 1),
(18, 'shop@gmail.com', 8520147526, 'shop', 1, 1),
(21, 'fast@gmail.com', 8520000111, 'fast', 3, 1),
(24, 'titan@gmail.com', 8888888888, 'titan', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`cat_id`, `cat_name`) VALUES
(1, 'Ray Ban'),
(2, 'Voyage'),
(3, 'Pradas'),
(9, 'Oakley'),
(10, 'Fastrack'),
(11, 'Vincent Chase');

-- --------------------------------------------------------

--
-- Table structure for table `product_detail`
--

CREATE TABLE `product_detail` (
  `product_id` int(11) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `l_id` int(11) DEFAULT NULL,
  `product_name` varchar(200) DEFAULT NULL,
  `product_image` varchar(100) DEFAULT NULL,
  `product_description` varchar(500) DEFAULT NULL,
  `product_price` int(10) DEFAULT NULL,
  `quantity` int(10) DEFAULT NULL,
  `status` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_detail`
--

INSERT INTO `product_detail` (`product_id`, `cat_id`, `l_id`, `product_name`, `product_image`, `product_description`, `product_price`, `quantity`, `status`) VALUES
(9, 10, 21, 'FASTRACK  Round Sunglasses', '1677913801.jpg', ' Highly Flexible Frames\r\n Lightweight and Comfortable\r\n Strong and Durable\r\nShatter-Resistant Lenses\r\n UV 400 Protection\r\nFree Sunglasses Case with Cleaning Cloth', 599, 5, 0),
(10, 10, 21, 'FASTRACK  Round Sunglasses', '1677913847.jpg', ' Highly Flexible Frames\r\n Lightweight and Comfortable\r\n Strong and Durable\r\nShatter-Resistant Lenses\r\n UV 400 Protection\r\nFree Sunglasses Case with Cleaning Cloth', 599, 5, 0),
(11, 10, 21, 'Brown Gradient  Sunglasses for Men', '1677919103.webp', 'Highly Flexible Frames\n Lightweight and Comfortable\n Strong and Durable\n Shatter-ResistantLenses\n UV 400 Protection\n Free Sunglasses Case with Cleaning Cloth', 1999, 19, 1),
(12, 11, 21, 'Purple Full Rim Cat Eye Eyeglasses', '1677919860.jpg', 'Frame Size\r\nExtra Wide Frame Width 144 mm\r\nFrame Dimensions 51-17-140\r\nFrame colourPurple', 1699, 29, 1),
(13, 11, 21, ' Full Rim Rectangle Eyeglasses', '1677926840.jpg', 'Frame Size Wide\r\nFrame Width 138 mm\r\nFrame Dimensions 55-16-140\r\nFrame colour Black', 1199, 21, 1),
(14, 1, 24, 'BLACK RECTANGLE FULL RIM EYEGLASSES', '1677958564.webp', 'Frame Shape : Rectangle\r\nFrame Size : Medium\r\nFrame Width (mm) : 124\r\nLens Width (mm) : 53\r\nBridge Size (mm) : 18\r\nTemple Length (mm) : 145\r\nFrame Height (mm) : 39\r\nMaterial : Sheet', 2254, 50, 1),
(15, 1, 24, 'Black Aviator Unisex Sunglasses', '1677959229.webp', 'The gradient lenses are nicely toned and give a cool effect to what is considered the sunglass that shaped entire cult movements.\r\nWear RB3025 Aviator Gradient sunglasses with a gunmetal frame and lens treatments including crystal Polarized Sunglasses blue gradient, crystal gradient grey and crystal brown gradient.', 25000, 22, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_order`
--

CREATE TABLE `product_order` (
  `order_id` int(11) NOT NULL,
  `l_id` int(11) DEFAULT NULL,
  `total_amount` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `payment_status` int(5) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_status` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_order`
--

INSERT INTO `product_order` (`order_id`, `l_id`, `total_amount`, `address`, `payment_status`, `timestamp`, `order_status`) VALUES
(7, 5, '3698', 'Ahmedabad', 2, '2023-03-04 09:42:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shop_category`
--

CREATE TABLE `shop_category` (
  `shop_cat_id` int(11) NOT NULL,
  `shop_cat_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_category`
--

INSERT INTO `shop_category` (`shop_cat_id`, `shop_cat_name`) VALUES
(1, 'WHOLESALER'),
(2, 'RETAILERS'),
(3, 'DISTRIBUTOR');

-- --------------------------------------------------------

--
-- Table structure for table `shop_table`
--

CREATE TABLE `shop_table` (
  `shop_id` int(11) NOT NULL,
  `l_id` int(11) DEFAULT NULL,
  `shop_cat_id` int(11) DEFAULT NULL,
  `shop_name` varchar(50) DEFAULT NULL,
  `shop_address` varchar(100) DEFAULT NULL,
  `shop_contactno` bigint(10) DEFAULT NULL,
  `shop_image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_table`
--

INSERT INTO `shop_table` (`shop_id`, `l_id`, `shop_cat_id`, `shop_name`, `shop_address`, `shop_contactno`, `shop_image`) VALUES
(1, 7, 1, 'Sheth Optical', 'Garden, 3, Ashirvad Paras, Corporate Rd, opposite Prahladnagar, behind Sales India,', 8585868686, '164397859.jfif'),
(4, 9, 3, 'R Kumar Opticians', ' Swastik Super Market, 1, Ashram Rd, opp. Sharma Hyundai, Shreyas Colony,', 7485967485, '164399283.png'),
(9, 21, 2, 'Fastrack', 'Ahmedabad', 8888888888, 'se.jpg'),
(13, 24, 2, 'Titan Eye Plus', 'Ahmedabad', 5552225555, '1677958334.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_table`
--
ALTER TABLE `cart_table`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `l_id` (`l_id`),
  ADD KEY `shop_l_id` (`shop_l_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `detail_table`
--
ALTER TABLE `detail_table`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `l_id` (`l_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feed_id`),
  ADD KEY `l_id` (`l_id`);

--
-- Indexes for table `login_table`
--
ALTER TABLE `login_table`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `l_id` (`l_id`);

--
-- Indexes for table `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `l_id` (`l_id`);

--
-- Indexes for table `shop_category`
--
ALTER TABLE `shop_category`
  ADD PRIMARY KEY (`shop_cat_id`);

--
-- Indexes for table `shop_table`
--
ALTER TABLE `shop_table`
  ADD PRIMARY KEY (`shop_id`),
  ADD KEY `shop_cat_id` (`shop_cat_id`),
  ADD KEY `l_id` (`l_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_table`
--
ALTER TABLE `cart_table`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `detail_table`
--
ALTER TABLE `detail_table`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login_table`
--
ALTER TABLE `login_table`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product_order`
--
ALTER TABLE `product_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `shop_category`
--
ALTER TABLE `shop_category`
  MODIFY `shop_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shop_table`
--
ALTER TABLE `shop_table`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_table`
--
ALTER TABLE `cart_table`
  ADD CONSTRAINT `cart_table_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product_detail` (`product_id`),
  ADD CONSTRAINT `cart_table_ibfk_2` FOREIGN KEY (`l_id`) REFERENCES `login_table` (`l_id`),
  ADD CONSTRAINT `cart_table_ibfk_3` FOREIGN KEY (`shop_l_id`) REFERENCES `login_table` (`l_id`),
  ADD CONSTRAINT `cart_table_ibfk_4` FOREIGN KEY (`order_id`) REFERENCES `product_order` (`order_id`);

--
-- Constraints for table `detail_table`
--
ALTER TABLE `detail_table`
  ADD CONSTRAINT `detail_table_ibfk_3` FOREIGN KEY (`l_id`) REFERENCES `login_table` (`l_id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`l_id`) REFERENCES `login_table` (`l_id`);

--
-- Constraints for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD CONSTRAINT `product_detail_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `product_category` (`cat_id`),
  ADD CONSTRAINT `product_detail_ibfk_2` FOREIGN KEY (`l_id`) REFERENCES `login_table` (`l_id`);

--
-- Constraints for table `product_order`
--
ALTER TABLE `product_order`
  ADD CONSTRAINT `product_order_ibfk_1` FOREIGN KEY (`l_id`) REFERENCES `login_table` (`l_id`);

--
-- Constraints for table `shop_table`
--
ALTER TABLE `shop_table`
  ADD CONSTRAINT `shop_table_ibfk_1` FOREIGN KEY (`shop_cat_id`) REFERENCES `shop_category` (`shop_cat_id`),
  ADD CONSTRAINT `shop_table_ibfk_2` FOREIGN KEY (`l_id`) REFERENCES `login_table` (`l_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
