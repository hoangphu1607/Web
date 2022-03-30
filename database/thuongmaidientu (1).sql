-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 30, 2022 at 08:49 AM
-- Server version: 8.0.22
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thuongmaidientu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `a_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `a_email` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `a_phone` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `a_avatar` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `a_active` int NOT NULL,
  `a_password` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `c_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `c_avatar` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `c_active` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `c_name`, `c_avatar`, `c_active`) VALUES
(1, 'Cá', '', b'1'),
(2, 'Cua - Ghẹ', '', b'1'),
(3, 'Ngao - Sò - Ốc', '', b'1'),
(4, 'Tôm Các Loại', '', b'1'),
(5, 'Mực', '', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `img`
--

CREATE TABLE `img` (
  `id` int NOT NULL,
  `img_product_id` int NOT NULL,
  `img_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int NOT NULL,
  `or_transaction_id` int NOT NULL,
  `or_product_id` int NOT NULL,
  `or_price` int NOT NULL,
  `or_amount` int NOT NULL,
  `or_total_amount` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `pro_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pro_category_id` int NOT NULL,
  `pro_price` int NOT NULL,
  `supplier_id` int NOT NULL,
  `pro_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pro_avatar` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pro_content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `pro_name`, `pro_category_id`, `pro_price`, `supplier_id`, `pro_description`, `pro_avatar`, `pro_content`) VALUES
(11, 'Cá Hồi Nguyên Con Tươi', 1, 3060000, 3, 'Con 6kg', '', ''),
(12, 'Cá Hồi Phi Lê Thân', 1, 235000, 4, 'Khay 300g', '', ''),
(13, 'Cá Tầm', 1, 450000, 3, 'Con 1.5kg', '', ''),
(14, 'Cá Điêu Hồng', 1, 70000, 1, '1 Con', '', ''),
(15, 'Cá Hồi Phi Lê Đuôi', 1, 115000, 4, 'Khay 250g', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int NOT NULL,
  `s_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `s_email` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `s_phone` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `s_status` int NOT NULL DEFAULT '1',
  `s_avt` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `s_name`, `s_email`, `s_phone`, `s_status`, `s_avt`) VALUES
(1, 'Vựa Cá Cà Mau', 'vuacacm@gmail.vn', '0942830852', 1, 'img\\suppliers\\1648290566.jpg'),
(2, 'Vựa Tôm Cá Quốc An', 'quocan@gmail.com', '0908737889', 1, 'img\\suppliers\\1648564157.png'),
(3, 'Hải Sản Xanh', 'haisanxanh@gmail.com', '0945787879', 1, 'img\\suppliers\\1648564545.jpg'),
(4, 'Đại Dương', 'daiduong@gmail.com', '0949462465', 1, 'img\\suppliers\\1648565769.jpg'),
(5, 'Vựa hải sản Thành Phát', 'thanhphat@gmail.com', '02543550595', 1, 'img\\suppliers\\1648565863.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int NOT NULL,
  `tr_user_id` int NOT NULL,
  `tr_total` int NOT NULL,
  `tr_phone` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tr_address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tr_status` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tr_note` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `u_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `u_email` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `u_password` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `u_phone` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `u_address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `u_avatar` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `u_name`, `u_email`, `u_password`, `u_phone`, `u_address`, `u_avatar`) VALUES
(1, 'vo hoang phu', 'hoangphu329@gmail.com', '45ada26a4abfe2437699067468ae31ae228493ca', '0796039900', 'vinh long', ' ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_or_product` (`or_product_id`),
  ADD KEY `fk_transactions` (`or_transaction_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categories` (`pro_category_id`),
  ADD KEY `fk_supplies` (`supplier_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`tr_user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `img`
--
ALTER TABLE `img`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `img`
--
ALTER TABLE `img`
  ADD CONSTRAINT `fk_id_img` FOREIGN KEY (`id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_or_product` FOREIGN KEY (`or_product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transactions` FOREIGN KEY (`or_transaction_id`) REFERENCES `transaction` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_categories` FOREIGN KEY (`pro_category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_supplies` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`tr_user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
