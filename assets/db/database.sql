-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: 2017 年 9 月 03 日 00:17
-- サーバのバージョン： 5.6.35
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `gogreen`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `jk_category`
--

CREATE TABLE `jk_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `jk_category`
--

INSERT INTO `jk_category` (`category_id`, `category_name`, `category_description`) VALUES
(1, 'giay_kho', 'テスト'),
(2, 'giay_lau_tay', NULL),
(3, 'giay_cuon', NULL),
(4, ' Nhóm sản phẩm 3', 'Giấy'),
(5, 'test', '123456');

-- --------------------------------------------------------

--
-- テーブルの構造 `jk_product`
--

CREATE TABLE `jk_product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(3) DEFAULT NULL,
  `name` varchar(300) NOT NULL,
  `description` text,
  `status` tinyint(3) DEFAULT '1' COMMENT '1=active, 2=not',
  `price` double DEFAULT '0',
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `jk_product_image`
--

CREATE TABLE `jk_product_image` (
  `image_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `path` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `jk_product_image`
--

INSERT INTO `jk_product_image` (`image_id`, `product_id`, `img_name`, `create_date`, `path`) VALUES
(9, 7, 'IMG_20140216_115729.jpg', '2015-12-06 05:20:34', 'assets/img/sp1.jpg'),
(10, 8, 'IMG_20140216_115729.jpg', '2015-12-06 05:20:34', 'assets/img/sp1.jpg');

-- --------------------------------------------------------

--
-- テーブルの構造 `jk_sessions`
--

CREATE TABLE `jk_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- テーブルの構造 `jk_user`
--

CREATE TABLE `jk_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `jk_user`
--

INSERT INTO `jk_user` (`user_id`, `username`, `password`) VALUES
(1, 'root', 'root');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jk_category`
--
ALTER TABLE `jk_category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_id` (`category_id`);

--
-- Indexes for table `jk_product`
--
ALTER TABLE `jk_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `jk_product_image`
--
ALTER TABLE `jk_product_image`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `jk_user`
--
ALTER TABLE `jk_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `password` (`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jk_category`
--
ALTER TABLE `jk_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `jk_product`
--
ALTER TABLE `jk_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `jk_product_image`
--
ALTER TABLE `jk_product_image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `jk_user`
--
ALTER TABLE `jk_user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;