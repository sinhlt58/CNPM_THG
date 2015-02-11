-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2015 at 08:08 AM
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
  `user_id_food` int(11) NOT NULL,
  `food_name` varchar(50) NOT NULL,
  `food_price` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `user_id_food`, `food_name`, `food_price`) VALUES
(51, 5, 'coca', 12300),
(68, 5, 'sada', 1231),
(70, 5, 'rice', 12345);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `navigation`
--

INSERT INTO `navigation` (`id`, `label`, `url`, `target`, `position`, `status`) VALUES
(1, 'Home', 'http://localhost/THG/THGv1.0/home', '', 0, 1),
(2, 'Menu', 'http://localhost/THG/THGv1.0/menu', '', 1, 1),
(3, 'Order', 'http://localhost/THG/THGv1.0/order', '', 2, 1);

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
  `body` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `type`, `slug`, `label`, `title`, `header`, `body`) VALUES
(1, 1, 1, 'home', 'Home', 'Home', 'Welcome to THG version 1.0', '<p>Long page.....</p>'),
(2, 3, 1, 'menu', 'Menu', 'Menu', 'Menu Creator version 1.0', '<div class="row">\r\n<div class="col-md-6">\r\n<h3>&nbsp;</h3>\r\n</div>\r\n</div>'),
(5, 1, 1, 'order', 'Order', 'Order', 'Coming soon ...', '');

-- --------------------------------------------------------

--
-- Table structure for table `post_types`
--

CREATE TABLE IF NOT EXISTS `post_types` (
`id` mediumint(9) NOT NULL,
  `label` varchar(150) NOT NULL,
  `name` varchar(150) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_types`
--

INSERT INTO `post_types` (`id`, `label`, `name`, `status`) VALUES
(1, 'Pages', 'page', 1);

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
('debug-status', 'Debug Status', '1'),
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `status`, `avatar`) VALUES
(1, 'sinh', 'black', 'sinhlt58@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, '1423466156910.png'),
(2, 'kitty', 'kitty', 'kitty@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 1, ''),
(3, 'Big', 'Big', 'Big@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 1, ''),
(4, 'Troll', 'Freak', 'freak@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0, ''),
(5, 'Trieu', 'Dang', 'dangtrieu25@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food`
--
ALTER TABLE `food`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navigation`
--
ALTER TABLE `navigation`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `navigation`
--
ALTER TABLE `navigation`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `post_types`
--
ALTER TABLE `post_types`
MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
