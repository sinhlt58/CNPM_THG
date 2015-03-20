-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2015 at 02:37 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `thg`
--

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE IF NOT EXISTS `food` (
`id` int(11) NOT NULL,
  `fc_id` int(11) NOT NULL,
  `food_name` varchar(50) NOT NULL,
  `food_price` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `fc_id`, `food_name`, `food_price`) VALUES
(4, 2, 'Ra Muon', 200),
(5, 2, 'Rau Cai', 100),
(6, 2, 'Rau Sup No', 500),
(7, 3, 'Tom Hum', 140),
(8, 3, 'Cua Nuong', 345),
(11, 6, 'Kem Tuoi', 456),
(12, 6, 'Nuoc Cam', 999),
(13, 7, 'Nuoc Cam', 123),
(14, 7, 'Nuoc Chanh', 456);

-- --------------------------------------------------------

--
-- Table structure for table `food_categories`
--

CREATE TABLE IF NOT EXISTS `food_categories` (
`id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `restaurant_id` int(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_categories`
--

INSERT INTO `food_categories` (`id`, `name`, `restaurant_id`) VALUES
(2, 'Rau', 1),
(3, 'Main', 1),
(6, 'Trang Mieng 2', 1),
(7, 'Nuoc Giai Khat', 2);

-- --------------------------------------------------------

--
-- Table structure for table `food_orders`
--

CREATE TABLE IF NOT EXISTS `food_orders` (
`id` int(40) NOT NULL,
  `order_id` int(40) NOT NULL,
  `food_id` int(40) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=252 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_orders`
--

INSERT INTO `food_orders` (`id`, `order_id`, `food_id`, `amount`) VALUES
(243, 65, 12, 1),
(244, 66, 7, 1),
(245, 66, 8, 1),
(246, 66, 12, 1),
(247, 66, 11, 3),
(248, 67, 8, 1),
(249, 67, 7, 1),
(250, 67, 11, 1),
(251, 67, 12, 3);

-- --------------------------------------------------------

--
-- Table structure for table `navigation`
--

CREATE TABLE IF NOT EXISTS `navigation` (
`id` int(11) NOT NULL,
  `label` varchar(300) NOT NULL,
  `url` varchar(300) NOT NULL,
  `target` varchar(30) NOT NULL,
  `position` int(3) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `navigation`
--

INSERT INTO `navigation` (`id`, `label`, `url`, `target`, `position`, `status`) VALUES
(1, 'Home', 'http://localhost/THG/home', 'not_sign_in', 0, 1),
(2, 'Menu', 'http://localhost/THG/menu', 'sign_in', 1, 1),
(3, 'Order', 'http://localhost/THG/order', 'sign_in', 2, 1),
(4, 'About Us', 'http://localhost/THG/about-us', 'not_sign_in', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`id` int(40) NOT NULL,
  `restaurant_id` int(40) NOT NULL,
  `table_order` int(40) NOT NULL,
  `total_price` double NOT NULL,
  `created` int(40) NOT NULL,
  `creator` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `restaurant_id`, `table_order`, `total_price`, `created`, `creator`) VALUES
(65, 1, 1, 999, 1426763014, 'Waiter Waiter'),
(66, 1, 46, 2852, 1426763128, 'admin admin'),
(67, 1, 6, 3938, 1426772890, 'Waiter Waiter');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
`id` mediumint(9) NOT NULL,
  `user_id` mediumint(9) NOT NULL,
  `type` int(11) NOT NULL,
  `slug` varchar(300) NOT NULL,
  `label` varchar(100) NOT NULL,
  `title` varchar(200) NOT NULL,
  `header` varchar(300) NOT NULL,
  `body` mediumtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `type`, `slug`, `label`, `title`, `header`, `body`) VALUES
(1, 1, 1, 'home', 'Home', 'Home', 'Welcome to THG 1.0', '<p>Long page.....</p>'),
(2, 0, 3, 'menu', 'Menu', 'Menu', '', ''),
(5, 0, 3, 'order', 'Order', 'Order', '', ''),
(6, 0, 1, 'about-us', 'About Us', 'About Us', 'DNSTTT', ''),
(7, 0, 1, 'sign-in', 'Sign In', 'Sign In', '', ''),
(8, 9, 1, 'sign-up', 'Sign Up', 'Sign Up', '', ''),
(9, 9, 3, 'new-order', 'New Order', 'New Order', '', ''),
(10, 9, 2, 'restaurants', 'Restaurants', 'Restaurants', 'Choose one restaurant that you work for.', ''),
(11, 9, 2, 'not-found', 'Not Found', 'Not Found', '404 we could not find this page.', '');

-- --------------------------------------------------------

--
-- Table structure for table `post_types`
--

CREATE TABLE IF NOT EXISTS `post_types` (
`id` mediumint(9) NOT NULL,
  `label` varchar(150) NOT NULL,
  `name` varchar(150) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_types`
--

INSERT INTO `post_types` (`id`, `label`, `name`, `status`) VALUES
(1, 'Pages', 'page', 1),
(2, 'None navigation', 'none-navigation', 1),
(3, 'After Choose Restaurant', 'page', 1);

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE IF NOT EXISTS `restaurants` (
`id` int(40) NOT NULL,
  `name` varchar(45) NOT NULL,
  `number_of_table` int(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `name`, `number_of_table`) VALUES
(1, 'RESTAURANT THG', 100),
(2, 'I am the waiter', 200);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` varchar(200) NOT NULL,
  `label` varchar(200) NOT NULL,
  `value` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `label`, `value`) VALUES
('debug-status', 'Debug Status', '2'),
('site-title', 'Site-title', 'Thg11.0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` mediumint(9) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `avatar` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `status`, `avatar`) VALUES
(9, 'admin', 'admin', 'thg@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, ''),
(10, 'Waiter', 'Waiter', 'waiter@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `users_restaurants`
--

CREATE TABLE IF NOT EXISTS `users_restaurants` (
`id` int(40) NOT NULL,
  `user_id` int(40) NOT NULL,
  `restaurant_id` int(40) NOT NULL,
  `role` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_restaurants`
--

INSERT INTO `users_restaurants` (`id`, `user_id`, `restaurant_id`, `role`) VALUES
(1, 9, 1, 0),
(2, 10, 2, 0),
(3, 10, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food`
--
ALTER TABLE `food`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_categories`
--
ALTER TABLE `food_categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_orders`
--
ALTER TABLE `food_orders`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navigation`
--
ALTER TABLE `navigation`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`), ADD KEY `type` (`type`);

--
-- Indexes for table `post_types`
--
ALTER TABLE `post_types`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_restaurants`
--
ALTER TABLE `users_restaurants`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `food_categories`
--
ALTER TABLE `food_categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `food_orders`
--
ALTER TABLE `food_orders`
MODIFY `id` int(40) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=252;
--
-- AUTO_INCREMENT for table `navigation`
--
ALTER TABLE `navigation`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `id` int(40) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `post_types`
--
ALTER TABLE `post_types`
MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
MODIFY `id` int(40) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users_restaurants`
--
ALTER TABLE `users_restaurants`
MODIFY `id` int(40) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
