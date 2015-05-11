-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2015 at 04:17 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `fc_id`, `food_name`, `food_price`) VALUES
(15, 8, 'Tom Su', 456),
(16, 9, 'Berry', 456),
(17, 9, 'Kem tuoi', 666),
(18, 8, 'Ca sau', 555),
(19, 10, 'Rau cai', 888);

-- --------------------------------------------------------

--
-- Table structure for table `food_categories`
--

CREATE TABLE IF NOT EXISTS `food_categories` (
`id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `restaurant_id` int(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_categories`
--

INSERT INTO `food_categories` (`id`, `name`, `restaurant_id`) VALUES
(8, 'Main', 1),
(9, 'Trang Mieng', 1),
(10, 'Cac loai rau', 1);

-- --------------------------------------------------------

--
-- Table structure for table `food_orders`
--

CREATE TABLE IF NOT EXISTS `food_orders` (
`id` int(40) NOT NULL,
  `order_id` int(40) NOT NULL,
  `food_id` int(40) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=260 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_orders`
--

INSERT INTO `food_orders` (`id`, `order_id`, `food_id`, `amount`) VALUES
(256, 69, 18, 2),
(257, 69, 16, 3),
(258, 69, 17, 6),
(259, 69, 19, 7);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `navigation`
--

INSERT INTO `navigation` (`id`, `label`, `url`, `target`, `position`, `status`) VALUES
(1, 'Features', 'http://localhost/THG/#features', 'not_sign_in', 0, 1),
(2, 'Menu', 'http://localhost/THG/menu', 'sign_in', 1, 1),
(3, 'Order', 'http://localhost/THG/order', 'sign_in', 2, 1),
(4, 'About Us', 'http://localhost/THG/#about', 'not_sign_in', 3, 1),
(5, 'Staff', 'http://localhost/THG/staff', 'sign_in', 4, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `restaurant_id`, `table_order`, `total_price`, `created`, `creator`) VALUES
(69, 1, 56, 12690, 1431310556, 'waiter waiter');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `type`, `slug`, `label`, `title`, `header`, `body`) VALUES
(1, 1, 1, 'home', 'Home', 'Home', '', ''),
(2, 0, 3, 'menu', 'Menu', 'Menu', '', ''),
(5, 0, 3, 'order', 'Order', 'Order', '', ''),
(6, 0, 1, 'about-us', 'About Us', 'About Us', 'DNSTTT', ''),
(7, 0, 1, 'sign-in', 'Sign In', 'Sign In', '', ''),
(8, 9, 1, 'sign-up', 'Sign Up', 'Sign Up', '', ''),
(9, 9, 3, 'new-order', 'New Order', 'New Order', '', ''),
(10, 9, 2, 'restaurants', 'Restaurants', 'Restaurants', '', ''),
(11, 9, 2, 'not-found', 'Not Found', 'Not Found', '404 we could not find this page.', ''),
(12, 0, 3, 'staff', 'Staff', 'Staff', '', '');

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
  `number_of_table` int(40) NOT NULL,
  `name_boss` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `name`, `number_of_table`, `name_boss`) VALUES
(1, 'RESTAURANT THG', 100, 'thg@gmail.com'),
(13, 'My restaurant', 100, 'waiter@gmail.com');

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `status`, `avatar`) VALUES
(9, 'thg', 'thg', 'thg@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, ''),
(24, 'waiter', 'waiter', 'waiter@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `users_restaurants`
--

CREATE TABLE IF NOT EXISTS `users_restaurants` (
`id` int(40) NOT NULL,
  `user_id` int(40) NOT NULL,
  `restaurant_id` int(40) NOT NULL,
  `role` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_restaurants`
--

INSERT INTO `users_restaurants` (`id`, `user_id`, `restaurant_id`, `role`) VALUES
(1, 9, 1, 0),
(24, 24, 13, 0),
(25, 24, 1, 1);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `food_categories`
--
ALTER TABLE `food_categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `food_orders`
--
ALTER TABLE `food_orders`
MODIFY `id` int(40) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=260;
--
-- AUTO_INCREMENT for table `navigation`
--
ALTER TABLE `navigation`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `id` int(40) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `post_types`
--
ALTER TABLE `post_types`
MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
MODIFY `id` int(40) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `users_restaurants`
--
ALTER TABLE `users_restaurants`
MODIFY `id` int(40) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
