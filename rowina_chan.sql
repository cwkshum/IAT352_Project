-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 13, 2020 at 05:23 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rowina_chan`
--
CREATE DATABASE IF NOT EXISTS `rowina_chan` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `rowina_chan`;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--
-- Creation: Nov 10, 2020 at 12:23 AM
-- Last update: Nov 13, 2020 at 04:06 AM
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `product_brand` varchar(50) DEFAULT NULL,
  `product_price` int(11) DEFAULT NULL,
  `product_size` int(11) DEFAULT NULL,
  PRIMARY KEY (`cart_id`),
  KEY `customer_id` (`customer_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `cart`:
--   `customer_id`
--       `members` -> `customer_id`
--   `product_id`
--       `products` -> `product_id`
--

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `customer_id`, `product_id`, `product_name`, `product_brand`, `product_price`, `product_size`) VALUES
(1, 7, 4103947, 'Adidas Superstar 20', 'Adidas ', 100, 6),
(3, 7, 4103897, 'Timberland Premium Waterproof Boots', 'Timberland', 200, 7),
(4, 7, 4103938, 'Nike Air Max 97', 'Nike', 170, 11),
(5, 7, 4103930, 'UGG Classic Mini', 'Ugg', 150, 6),
(6, 7, 4103947, 'Adidas Superstar 20', 'Adidas ', 100, 9),
(7, 7, 4103873, 'Nike Air Force 1 Low', 'Nike', 120, 10),
(8, 7, 4103890, 'PUMA Defy Mid Buckle', 'PUMA', 100, 8),
(10, 7, 4103930, 'UGG Classic Mini', 'Ugg', 150, 8),
(11, 7, 4103917, 'Jordan Retro 13', 'Jordan', 190, 13),
(12, 7, 4103873, 'Nike Air Force 1 Low', 'Nike', 120, 11),
(13, 7, 4103897, 'Timberland Premium Waterproof Boots', 'Timberland', 200, 17),
(14, 7, 4103938, 'Nike Air Max 97', 'Nike', 170, 14),
(15, 7, 4103947, 'Adidas Superstar 20', 'Adidas ', 100, 10),
(16, 11, 4103873, 'Nike Air Force 1 Low', 'Nike', 120, 6),
(17, 13, 4103930, 'UGG Classic Mini', 'Ugg', 150, 5),
(18, 13, 4103917, 'Jordan Retro 13', 'Jordan', 190, 12);

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--
-- Creation: Oct 30, 2020 at 11:02 PM
--

DROP TABLE IF EXISTS `favourites`;
CREATE TABLE IF NOT EXISTS `favourites` (
  `favourites_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(30) DEFAULT NULL,
  `product_brand` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`favourites_id`),
  KEY `customer_id` (`customer_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `favourites`:
--   `customer_id`
--       `members` -> `customer_id`
--   `product_id`
--       `products` -> `product_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--
-- Creation: Nov 01, 2020 at 09:23 PM
-- Last update: Nov 13, 2020 at 04:20 AM
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `dob` varchar(11) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `members`:
--

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`customer_id`, `first_name`, `last_name`, `email`, `password`, `dob`) VALUES
(6, 'car', 'car', 'car@gmail.com', 'e6d96502596d7e7887b76646c5f615d9', 'Feb-02-2000'),
(7, 'rowina', 'rowina', 'rowina@gmail.com', '551fbd27d540c5d111716950d7623857', 'Jan-01-2000'),
(8, 'cs', 'cs', 'cs@gmail.com', '95cc64dd2825f9df13ec4ad683ecf339', 'Feb-02-2000'),
(9, 'row', 'row', 'row@gmail.com', 'd257f106de7571b6758c7d9fef79dba9', 'Mar-03-2000'),
(10, 'chamira', 'chamira', 'chamira@gmail.com', 'b500959f5bf6af14795842e5d29300d2', 'Jan-01-2000'),
(11, 'sad', 'sad', 'sad@gmail.com', '49f0bad299687c62334182178bfd75d8', 'Feb-02-2000'),
(12, 'shum', 'shum', 'shum@gmail.com', 'f164a1ee50299942fac6bf5d1b132964', 'Aug-08-2000'),
(13, 'c', 'c', 'c@gmail.com', '4a8a08f09d37b73795649038408b5f33', 'Feb-02-2000'),
(14, 'carshu', 'carshu', 'carshu@gmail.com', '9c2f2e1a3d05327f72a2faf9201839f0', 'Sep-09-2000'),
(15, 'gross', 'gross', 'ew@gmail.com', '58d949771b2a49016259a9fb4fa7499e', 'Sep-09-2000'),
(16, 'sigh', 'ugh', 'sigh@gmail.com', '9ec5fcfb9b5ed3ee55e1df9644a08dfb', 'Sep-09-2000'),
(17, 'help', 'help', 'help@gmail.com', '657f8b8da628ef83cf69101b6817150a', 'Jul-07-2000');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--
-- Creation: Oct 30, 2020 at 09:50 PM
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `brand` varchar(50) DEFAULT NULL,
  `colour` varchar(50) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `description` varchar(350) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `products`:
--

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `price`, `brand`, `colour`, `size`, `gender`, `description`) VALUES
(4103873, 'Nike Air Force 1 Low', 120, 'Nike', 'White', 6, 'Men', 'Nike\'s groundbreaking sneaker keeps you looking cool with its timeless style. Genuine leather upper with a padded ankle collar provides a comfortable fit. Full-length Phylon midsole with heel Air-Sole unit provides added shock absorption. Solid rubber outsole supplies durable traction.'),
(4103874, 'Nike Air Force 1 Low', 120, 'Nike', 'White', 7, 'Men', 'Nike\'s groundbreaking sneaker keeps you looking cool with its timeless style. Genuine leather upper with a padded ankle collar provides a comfortable fit. Full-length Phylon midsole with heel Air-Sole unit provides added shock absorption. Solid rubber outsole supplies durable traction.'),
(4103875, 'Nike Air Force 1 Low', 120, 'Nike', 'White', 8, 'Men', 'Nike\'s groundbreaking sneaker keeps you looking cool with its timeless style. Genuine leather upper with a padded ankle collar provides a comfortable fit. Full-length Phylon midsole with heel Air-Sole unit provides added shock absorption. Solid rubber outsole supplies durable traction.'),
(4103876, 'Nike Air Force 1 Low', 120, 'Nike', 'White', 9, 'Men', 'Nike\'s groundbreaking sneaker keeps you looking cool with its timeless style. Genuine leather upper with a padded ankle collar provides a comfortable fit. Full-length Phylon midsole with heel Air-Sole unit provides added shock absorption. Solid rubber outsole supplies durable traction.'),
(4103877, 'Nike Air Force 1 Low', 120, 'Nike', 'White', 10, 'Men', 'Nike\'s groundbreaking sneaker keeps you looking cool with its timeless style. Genuine leather upper with a padded ankle collar provides a comfortable fit. Full-length Phylon midsole with heel Air-Sole unit provides added shock absorption. Solid rubber outsole supplies durable traction.'),
(4103878, 'Nike Air Force 1 Low', 120, 'Nike', 'White', 11, 'Men', 'Nike\'s groundbreaking sneaker keeps you looking cool with its timeless style. Genuine leather upper with a padded ankle collar provides a comfortable fit. Full-length Phylon midsole with heel Air-Sole unit provides added shock absorption. Solid rubber outsole supplies durable traction.'),
(4103879, 'Nike Air Force 1 Low', 120, 'Nike', 'White', 12, 'Men', 'Nike\'s groundbreaking sneaker keeps you looking cool with its timeless style. Genuine leather upper with a padded ankle collar provides a comfortable fit. Full-length Phylon midsole with heel Air-Sole unit provides added shock absorption. Solid rubber outsole supplies durable traction.'),
(4103880, 'Nike Air Force 1 Low', 120, 'Nike', 'White', 13, 'Men', 'Nike\'s groundbreaking sneaker keeps you looking cool with its timeless style. Genuine leather upper with a padded ankle collar provides a comfortable fit. Full-length Phylon midsole with heel Air-Sole unit provides added shock absorption. Solid rubber outsole supplies durable traction.'),
(4103881, 'Nike Air Force 1 Low', 120, 'Nike', 'White', 14, 'Men', 'Nike\'s groundbreaking sneaker keeps you looking cool with its timeless style. Genuine leather upper with a padded ankle collar provides a comfortable fit. Full-length Phylon midsole with heel Air-Sole unit provides added shock absorption. Solid rubber outsole supplies durable traction.'),
(4103882, 'Nike Air Force 1 Low', 120, 'Nike', 'White', 15, 'Men', 'Nike\'s groundbreaking sneaker keeps you looking cool with its timeless style. Genuine leather upper with a padded ankle collar provides a comfortable fit. Full-length Phylon midsole with heel Air-Sole unit provides added shock absorption. Solid rubber outsole supplies durable traction.'),
(4103883, 'Nike Air Force 1 Low', 120, 'Nike', 'White', 5, 'Women', 'Nike\'s groundbreaking sneaker keeps you looking cool with its timeless style. Genuine leather upper with a padded ankle collar provides a comfortable fit. Full-length Phylon midsole with heel Air-Sole unit provides added shock absorption. Solid rubber outsole supplies durable traction.'),
(4103884, 'Nike Air Force 1 Low', 120, 'Nike', 'White', 6, 'Women', 'Nike\'s groundbreaking sneaker keeps you looking cool with its timeless style. Genuine leather upper with a padded ankle collar provides a comfortable fit. Full-length Phylon midsole with heel Air-Sole unit provides added shock absorption. Solid rubber outsole supplies durable traction.'),
(4103885, 'Nike Air Force 1 Low', 120, 'Nike', 'White', 7, 'Women', 'Nike\'s groundbreaking sneaker keeps you looking cool with its timeless style. Genuine leather upper with a padded ankle collar provides a comfortable fit. Full-length Phylon midsole with heel Air-Sole unit provides added shock absorption. Solid rubber outsole supplies durable traction.'),
(4103886, 'Nike Air Force 1 Low', 120, 'Nike', 'White', 8, 'Women', 'Nike\'s groundbreaking sneaker keeps you looking cool with its timeless style. Genuine leather upper with a padded ankle collar provides a comfortable fit. Full-length Phylon midsole with heel Air-Sole unit provides added shock absorption. Solid rubber outsole supplies durable traction.'),
(4103887, 'Nike Air Force 1 Low', 120, 'Nike', 'White', 9, 'Women', 'Nike\'s groundbreaking sneaker keeps you looking cool with its timeless style. Genuine leather upper with a padded ankle collar provides a comfortable fit. Full-length Phylon midsole with heel Air-Sole unit provides added shock absorption. Solid rubber outsole supplies durable traction.'),
(4103888, 'Nike Air Force 1 Low', 120, 'Nike', 'White', 10, 'Women', 'Nike\'s groundbreaking sneaker keeps you looking cool with its timeless style. Genuine leather upper with a padded ankle collar provides a comfortable fit. Full-length Phylon midsole with heel Air-Sole unit provides added shock absorption. Solid rubber outsole supplies durable traction.'),
(4103889, 'Nike Air Force 1 Low', 120, 'Nike', 'White', 11, 'Women', 'Nike\'s groundbreaking sneaker keeps you looking cool with its timeless style. Genuine leather upper with a padded ankle collar provides a comfortable fit. Full-length Phylon midsole with heel Air-Sole unit provides added shock absorption. Solid rubber outsole supplies durable traction.'),
(4103890, 'PUMA Defy Mid Buckle', 100, 'PUMA', 'Red', 5, 'Women', 'Flexible knit upper offers a contemporary look and enhanced breathability. TPU overlays add strength for improved durability. Sock-like collar promotes a cozier fit. Dual pull loops make them simple to pull on and off.\r\n'),
(4103891, 'PUMA Defy Mid Buckle', 100, 'PUMA', 'Red', 6, 'Women', 'Flexible knit upper offers a contemporary look and enhanced breathability. TPU overlays add strength for improved durability. Sock-like collar promotes a cozier fit. Dual pull loops make them simple to pull on and off.\r\n'),
(4103892, 'PUMA Defy Mid Buckle', 100, 'PUMA', 'Red', 7, 'Women', 'Flexible knit upper offers a contemporary look and enhanced breathability. TPU overlays add strength for improved durability. Sock-like collar promotes a cozier fit. Dual pull loops make them simple to pull on and off.\r\n'),
(4103893, 'PUMA Defy Mid Buckle', 100, 'PUMA', 'Red', 8, 'Women', 'Flexible knit upper offers a contemporary look and enhanced breathability. TPU overlays add strength for improved durability. Sock-like collar promotes a cozier fit. Dual pull loops make them simple to pull on and off.\r\n'),
(4103894, 'PUMA Defy Mid Buckle', 100, 'PUMA', 'Red', 9, 'Women', 'Flexible knit upper offers a contemporary look and enhanced breathability. TPU overlays add strength for improved durability. Sock-like collar promotes a cozier fit. Dual pull loops make them simple to pull on and off.\r\n'),
(4103895, 'PUMA Defy Mid Buckle', 100, 'PUMA', 'Red', 10, 'Women', 'Flexible knit upper offers a contemporary look and enhanced breathability. TPU overlays add strength for improved durability. Sock-like collar promotes a cozier fit. Dual pull loops make them simple to pull on and off.\r\n'),
(4103896, 'PUMA Defy Mid Buckle', 100, 'PUMA', 'Red', 11, 'Women', 'Flexible knit upper offers a contemporary look and enhanced breathability. TPU overlays add strength for improved durability. Sock-like collar promotes a cozier fit. Dual pull loops make them simple to pull on and off.\r\n'),
(4103897, 'Timberland Premium Waterproof Boots', 200, 'Timberland', 'Beige', 6, 'Men', 'The 6” Premium Waterproof Boot by Timberland is in a class of its own when it comes to durability and adaptability. Direct-attach construction for durability. 400 grams of Primaloft insulation for warmth without bulk. Anti-fatigue technology provides all-day comfort.'),
(4103898, 'Timberland Premium Waterproof Boots', 200, 'Timberland', 'Beige', 7, 'Men', 'The 6” Premium Waterproof Boot by Timberland is in a class of its own when it comes to durability and adaptability. Direct-attach construction for durability. 400 grams of Primaloft insulation for warmth without bulk. Anti-fatigue technology provides all-day comfort.'),
(4103899, 'Timberland Premium Waterproof Boots', 200, 'Timberland', 'Beige', 8, 'Men', 'The 6” Premium Waterproof Boot by Timberland is in a class of its own when it comes to durability and adaptability. Direct-attach construction for durability. 400 grams of Primaloft insulation for warmth without bulk. Anti-fatigue technology provides all-day comfort.'),
(4103900, 'Timberland Premium Waterproof Boots', 200, 'Timberland', 'Beige', 9, 'Men', 'The 6” Premium Waterproof Boot by Timberland is in a class of its own when it comes to durability and adaptability. Direct-attach construction for durability. 400 grams of Primaloft insulation for warmth without bulk. Anti-fatigue technology provides all-day comfort.'),
(4103901, 'Timberland Premium Waterproof Boots', 200, 'Timberland', 'Beige', 10, 'Men', 'The 6” Premium Waterproof Boot by Timberland is in a class of its own when it comes to durability and adaptability. Direct-attach construction for durability. 400 grams of Primaloft insulation for warmth without bulk. Anti-fatigue technology provides all-day comfort.'),
(4103902, 'Timberland Premium Waterproof Boots', 200, 'Timberland', 'Beige', 11, 'Men', 'The 6” Premium Waterproof Boot by Timberland is in a class of its own when it comes to durability and adaptability. Direct-attach construction for durability. 400 grams of Primaloft insulation for warmth without bulk. Anti-fatigue technology provides all-day comfort.'),
(4103903, 'Timberland Premium Waterproof Boots', 200, 'Timberland', 'Beige', 12, 'Men', 'The 6” Premium Waterproof Boot by Timberland is in a class of its own when it comes to durability and adaptability. Direct-attach construction for durability. 400 grams of Primaloft insulation for warmth without bulk. Anti-fatigue technology provides all-day comfort.'),
(4103904, 'Timberland Premium Waterproof Boots', 200, 'Timberland', 'Beige', 13, 'Men', 'The 6” Premium Waterproof Boot by Timberland is in a class of its own when it comes to durability and adaptability. Direct-attach construction for durability. 400 grams of Primaloft insulation for warmth without bulk. Anti-fatigue technology provides all-day comfort.'),
(4103905, 'Timberland Premium Waterproof Boots', 200, 'Timberland', 'Beige', 14, 'Men', 'The 6” Premium Waterproof Boot by Timberland is in a class of its own when it comes to durability and adaptability. Direct-attach construction for durability. 400 grams of Primaloft insulation for warmth without bulk. Anti-fatigue technology provides all-day comfort.'),
(4103906, 'Timberland Premium Waterproof Boots', 200, 'Timberland', 'Beige', 15, 'Men', 'The 6” Premium Waterproof Boot by Timberland is in a class of its own when it comes to durability and adaptability. Direct-attach construction for durability. 400 grams of Primaloft insulation for warmth without bulk. Anti-fatigue technology provides all-day comfort.'),
(4103907, 'Timberland Premium Waterproof Boots', 200, 'Timberland', 'Beige', 16, 'Men', 'The 6” Premium Waterproof Boot by Timberland is in a class of its own when it comes to durability and adaptability. Direct-attach construction for durability. 400 grams of Primaloft insulation for warmth without bulk. Anti-fatigue technology provides all-day comfort.'),
(4103908, 'Timberland Premium Waterproof Boots', 200, 'Timberland', 'Beige', 17, 'Men', 'The 6” Premium Waterproof Boot by Timberland is in a class of its own when it comes to durability and adaptability. Direct-attach construction for durability. 400 grams of Primaloft insulation for warmth without bulk. Anti-fatigue technology provides all-day comfort.'),
(4103909, 'Timberland Premium Waterproof Boots', 200, 'Timberland', 'Beige', 18, 'Men', 'The 6” Premium Waterproof Boot by Timberland is in a class of its own when it comes to durability and adaptability. Direct-attach construction for durability. 400 grams of Primaloft insulation for warmth without bulk. Anti-fatigue technology provides all-day comfort.'),
(4103910, 'Timberland Premium Waterproof Boots', 200, 'Timberland', 'Beige', 5, 'Women', 'The 6” Premium Waterproof Boot by Timberland is in a class of its own when it comes to durability and adaptability. Direct-attach construction for durability. 400 grams of Primaloft insulation for warmth without bulk. Anti-fatigue technology provides all-day comfort.'),
(4103911, 'Timberland Premium Waterproof Boots', 200, 'Timberland', 'Beige', 6, 'Women', 'The 6” Premium Waterproof Boot by Timberland is in a class of its own when it comes to durability and adaptability. Direct-attach construction for durability. 400 grams of Primaloft insulation for warmth without bulk. Anti-fatigue technology provides all-day comfort.'),
(4103912, 'Timberland Premium Waterproof Boots', 200, 'Timberland', 'Beige', 7, 'Women', 'The 6” Premium Waterproof Boot by Timberland is in a class of its own when it comes to durability and adaptability. Direct-attach construction for durability. 400 grams of Primaloft insulation for warmth without bulk. Anti-fatigue technology provides all-day comfort.'),
(4103913, 'Timberland Premium Waterproof Boots', 200, 'Timberland', 'Beige', 8, 'Women', 'The 6” Premium Waterproof Boot by Timberland is in a class of its own when it comes to durability and adaptability. Direct-attach construction for durability. 400 grams of Primaloft insulation for warmth without bulk. Anti-fatigue technology provides all-day comfort.'),
(4103914, 'Timberland Premium Waterproof Boots', 200, 'Timberland', 'Beige', 9, 'Women', 'The 6” Premium Waterproof Boot by Timberland is in a class of its own when it comes to durability and adaptability. Direct-attach construction for durability. 400 grams of Primaloft insulation for warmth without bulk. Anti-fatigue technology provides all-day comfort.'),
(4103915, 'Timberland Premium Waterproof Boots', 200, 'Timberland', 'Beige', 10, 'Women', 'The 6” Premium Waterproof Boot by Timberland is in a class of its own when it comes to durability and adaptability. Direct-attach construction for durability. 400 grams of Primaloft insulation for warmth without bulk. Anti-fatigue technology provides all-day comfort.'),
(4103916, 'Timberland Premium Waterproof Boots', 200, 'Timberland', 'Beige', 11, 'Women', 'The 6” Premium Waterproof Boot by Timberland is in a class of its own when it comes to durability and adaptability. Direct-attach construction for durability. 400 grams of Primaloft insulation for warmth without bulk. Anti-fatigue technology provides all-day comfort.'),
(4103917, 'Jordan Retro 13', 190, 'Jordan', 'Green', 6, 'Men', 'Leather upper adds comfort and style. Webbed lacing system adds support and security. Jumpman and 23 logo on tongue and upper add visual interest. Perforated tongue improves ventilation and keeps feet dry.\r\n'),
(4103918, 'Jordan Retro 13', 190, 'Jordan', 'Green', 7, 'Men', 'Leather upper adds comfort and style. Webbed lacing system adds support and security. Jumpman and 23 logo on tongue and upper add visual interest. Perforated tongue improves ventilation and keeps feet dry.\r\n'),
(4103919, 'Jordan Retro 13', 190, 'Jordan', 'Green', 8, 'Men', 'Leather upper adds comfort and style. Webbed lacing system adds support and security. Jumpman and 23 logo on tongue and upper add visual interest. Perforated tongue improves ventilation and keeps feet dry.\r\n'),
(4103920, 'Jordan Retro 13', 190, 'Jordan', 'Green', 9, 'Men', 'Leather upper adds comfort and style. Webbed lacing system adds support and security. Jumpman and 23 logo on tongue and upper add visual interest. Perforated tongue improves ventilation and keeps feet dry.\r\n'),
(4103921, 'Jordan Retro 13', 190, 'Jordan', 'Green', 10, 'Men', 'Leather upper adds comfort and style. Webbed lacing system adds support and security. Jumpman and 23 logo on tongue and upper add visual interest. Perforated tongue improves ventilation and keeps feet dry.\r\n'),
(4103922, 'Jordan Retro 13', 190, 'Jordan', 'Green', 11, 'Men', 'Leather upper adds comfort and style. Webbed lacing system adds support and security. Jumpman and 23 logo on tongue and upper add visual interest. Perforated tongue improves ventilation and keeps feet dry.\r\n'),
(4103923, 'Jordan Retro 13', 190, 'Jordan', 'Green', 12, 'Men', 'Leather upper adds comfort and style. Webbed lacing system adds support and security. Jumpman and 23 logo on tongue and upper add visual interest. Perforated tongue improves ventilation and keeps feet dry.\r\n'),
(4103924, 'Jordan Retro 13', 190, 'Jordan', 'Green', 13, 'Men', 'Leather upper adds comfort and style. Webbed lacing system adds support and security. Jumpman and 23 logo on tongue and upper add visual interest. Perforated tongue improves ventilation and keeps feet dry.\r\n'),
(4103925, 'Jordan Retro 13', 190, 'Jordan', 'Green', 14, 'Men', 'Leather upper adds comfort and style. Webbed lacing system adds support and security. Jumpman and 23 logo on tongue and upper add visual interest. Perforated tongue improves ventilation and keeps feet dry.\r\n'),
(4103926, 'Jordan Retro 13', 190, 'Jordan', 'Green', 15, 'Men', 'Leather upper adds comfort and style. Webbed lacing system adds support and security. Jumpman and 23 logo on tongue and upper add visual interest. Perforated tongue improves ventilation and keeps feet dry.\r\n'),
(4103927, 'Jordan Retro 13', 190, 'Jordan', 'Green', 16, 'Men', 'Leather upper adds comfort and style. Webbed lacing system adds support and security. Jumpman and 23 logo on tongue and upper add visual interest. Perforated tongue improves ventilation and keeps feet dry.\r\n'),
(4103928, 'Jordan Retro 13', 190, 'Jordan', 'Green', 17, 'Men', 'Leather upper adds comfort and style. Webbed lacing system adds support and security. Jumpman and 23 logo on tongue and upper add visual interest. Perforated tongue improves ventilation and keeps feet dry.\r\n'),
(4103929, 'Jordan Retro 13', 190, 'Jordan', 'Green', 18, 'Men', 'Leather upper adds comfort and style. Webbed lacing system adds support and security. Jumpman and 23 logo on tongue and upper add visual interest. Perforated tongue improves ventilation and keeps feet dry.\r\n'),
(4103930, 'UGG Classic Mini', 150, 'Ugg', 'Beige', 5, 'Women', 'Genuine Grade A twin–faced sheepskin with suede heel guard. Approximate boot shaft height: 4\". Genuine sheepskin sock wicks moisture away. Molded EVA outsole that is light and flexible. This product contains real fur from Sheep or Lamb. Fur Origin: Australia, European Union or United States. Real Fur has been artificially dyed and treated'),
(4103931, 'UGG Classic Mini', 150, 'Ugg', 'Beige', 6, 'Women', 'Genuine Grade A twin–faced sheepskin with suede heel guard. Approximate boot shaft height: 4\". Genuine sheepskin sock wicks moisture away. Molded EVA outsole that is light and flexible. This product contains real fur from Sheep or Lamb. Fur Origin: Australia, European Union or United States. Real Fur has been artificially dyed and treated'),
(4103932, 'UGG Classic Mini', 150, 'Ugg', 'Beige', 7, 'Women', 'Genuine Grade A twin–faced sheepskin with suede heel guard. Approximate boot shaft height: 4\". Genuine sheepskin sock wicks moisture away. Molded EVA outsole that is light and flexible. This product contains real fur from Sheep or Lamb. Fur Origin: Australia, European Union or United States. Real Fur has been artificially dyed and treated'),
(4103933, 'UGG Classic Mini', 150, 'Ugg', 'Beige', 8, 'Women', 'Genuine Grade A twin–faced sheepskin with suede heel guard. Approximate boot shaft height: 4\". Genuine sheepskin sock wicks moisture away. Molded EVA outsole that is light and flexible. This product contains real fur from Sheep or Lamb. Fur Origin: Australia, European Union or United States. Real Fur has been artificially dyed and treated'),
(4103934, 'UGG Classic Mini', 150, 'Ugg', 'Beige', 9, 'Women', 'Genuine Grade A twin–faced sheepskin with suede heel guard. Approximate boot shaft height: 4\". Genuine sheepskin sock wicks moisture away. Molded EVA outsole that is light and flexible. This product contains real fur from Sheep or Lamb. Fur Origin: Australia, European Union or United States. Real Fur has been artificially dyed and treated'),
(4103935, 'UGG Classic Mini', 150, 'Ugg', 'Beige', 10, 'Women', 'Genuine Grade A twin–faced sheepskin with suede heel guard. Approximate boot shaft height: 4\". Genuine sheepskin sock wicks moisture away. Molded EVA outsole that is light and flexible. This product contains real fur from Sheep or Lamb. Fur Origin: Australia, European Union or United States. Real Fur has been artificially dyed and treated'),
(4103936, 'UGG Classic Mini', 150, 'Ugg', 'Beige', 11, 'Women', 'Genuine Grade A twin–faced sheepskin with suede heel guard. Approximate boot shaft height: 4\". Genuine sheepskin sock wicks moisture away. Molded EVA outsole that is light and flexible. This product contains real fur from Sheep or Lamb. Fur Origin: Australia, European Union or United States. Real Fur has been artificially dyed and treated'),
(4103937, 'UGG Classic Mini', 150, 'Ugg', 'Beige', 12, 'Women', 'Genuine Grade A twin–faced sheepskin with suede heel guard. Approximate boot shaft height: 4\". Genuine sheepskin sock wicks moisture away. Molded EVA outsole that is light and flexible. This product contains real fur from Sheep or Lamb. Fur Origin: Australia, European Union or United States. Real Fur has been artificially dyed and treated'),
(4103938, 'Nike Air Max 97', 170, 'Nike', 'Black', 7, 'Men', 'You\'d be hard-pressed to find a shoe more eye-catching than the Nike Air Max \'97. The heel and tongue pull tab make these sneakers easy wear. The famous Nike swoosh on the midfoot and tongue ensure your Nikes are recognizable from across the room. With a carefully designed foam midsole, you can comfortably sport these shoes for daily use.'),
(4103939, 'Nike Air Max 97', 170, 'Nike', 'Black', 8, 'Men', 'You\'d be hard-pressed to find a shoe more eye-catching than the Nike Air Max \'97. The heel and tongue pull tab make these sneakers easy wear. The famous Nike swoosh on the midfoot and tongue ensure your Nikes are recognizable from across the room. With a carefully designed foam midsole, you can comfortably sport these shoes for daily use. '),
(4103940, 'Nike Air Max 97', 170, 'Nike', 'Black', 9, 'Men', 'You\'d be hard-pressed to find a shoe more eye-catching than the Nike Air Max \'97. The heel and tongue pull tab make these sneakers easy wear. The famous Nike swoosh on the midfoot and tongue ensure your Nikes are recognizable from across the room. With a carefully designed foam midsole, you can comfortably sport these shoes for daily use. '),
(4103941, 'Nike Air Max 97', 170, 'Nike', 'Black', 10, 'Men', 'You\'d be hard-pressed to find a shoe more eye-catching than the Nike Air Max \'97. The heel and tongue pull tab make these sneakers easy wear. The famous Nike swoosh on the midfoot and tongue ensure your Nikes are recognizable from across the room. With a carefully designed foam midsole, you can comfortably sport these shoes for daily use.'),
(4103942, 'Nike Air Max 97', 170, 'Nike', 'Black', 11, 'Men', 'You\'d be hard-pressed to find a shoe more eye-catching than the Nike Air Max \'97. The heel and tongue pull tab make these sneakers easy wear. The famous Nike swoosh on the midfoot and tongue ensure your Nikes are recognizable from across the room. With a carefully designed foam midsole, you can comfortably sport these shoes for daily use. '),
(4103943, 'Nike Air Max 97', 170, 'Nike', 'Black', 12, 'Men', 'You\'d be hard-pressed to find a shoe more eye-catching than the Nike Air Max \'97. The heel and tongue pull tab make these sneakers easy wear. The famous Nike swoosh on the midfoot and tongue ensure your Nikes are recognizable from across the room. With a carefully designed foam midsole, you can comfortably sport these shoes for daily use. '),
(4103944, 'Nike Air Max 97', 170, 'Nike', 'Black', 13, 'Men', 'You\'d be hard-pressed to find a shoe more eye-catching than the Nike Air Max \'97. The heel and tongue pull tab make these sneakers easy wear. The famous Nike swoosh on the midfoot and tongue ensure your Nikes are recognizable from across the room. With a carefully designed foam midsole, you can comfortably sport these shoes for daily use.'),
(4103945, 'Nike Air Max 97', 170, 'Nike', 'Black', 14, 'Men', 'You\'d be hard-pressed to find a shoe more eye-catching than the Nike Air Max \'97. The heel and tongue pull tab make these sneakers easy wear. The famous Nike swoosh on the midfoot and tongue ensure your Nikes are recognizable from across the room. With a carefully designed foam midsole, you can comfortably sport these shoes for daily use. A solid r'),
(4103946, 'Nike Air Max 97', 170, 'Nike', 'Black', 15, 'Men', 'You\'d be hard-pressed to find a shoe more eye-catching than the Nike Air Max \'97. The heel and tongue pull tab make these sneakers easy wear. The famous Nike swoosh on the midfoot and tongue ensure your Nikes are recognizable from across the room. With a carefully designed foam midsole, you can comfortably sport these shoes for daily use. '),
(4103947, 'Adidas Superstar 20', 100, 'Adidas ', 'White', 6, 'Women', 'A full-grain leather upper lets you carry a heritage look into your current day-to-day with the adidas Superstar 20. Rubber shell toe adds to your legacy look. Synthetic leather lining adds durability. Herringbone-pattern rubber cupsole. Imported.'),
(4103948, 'Adidas Superstar 20', 100, 'Adidas ', 'White', 7, 'Women', 'A full-grain leather upper lets you carry a heritage look into your current day-to-day with the adidas Superstar 20. Rubber shell toe adds to your legacy look. Synthetic leather lining adds durability. Herringbone-pattern rubber cupsole. Imported.'),
(4103950, 'Adidas Superstar 20', 100, 'Adidas ', 'White', 8, 'Women', 'A full-grain leather upper lets you carry a heritage look into your current day-to-day with the adidas Superstar 20. Rubber shell toe adds to your legacy look. Synthetic leather lining adds durability. Herringbone-pattern rubber cupsole. Imported.'),
(4103951, 'Adidas Superstar 20', 100, 'Adidas ', 'White', 9, 'Women', 'A full-grain leather upper lets you carry a heritage look into your current day-to-day with the adidas Superstar 20. Rubber shell toe adds to your legacy look. Synthetic leather lining adds durability. Herringbone-pattern rubber cupsole. Imported.'),
(4103952, 'Adidas Superstar 20', 100, 'Adidas ', 'White', 10, 'Women', 'A full-grain leather upper lets you carry a heritage look into your current day-to-day with the adidas Superstar 20. Rubber shell toe adds to your legacy look. Synthetic leather lining adds durability. Herringbone-pattern rubber cupsole. Imported.'),
(4103953, 'Reebok Question Mid', 150, 'Reebok', 'Red', 7, 'Men', 'With Reebok Questions on his feet, Allen Iverson broke records on court using a style all his own. These men\'s mid-top shoes honour the man, the myth and the dream. Underneath the solid-colour textile lies graphics inspired by Halloween. Tear away the top layer of the upper completely, or just a panel here are there, the look is yours to customise.'),
(4103954, 'Reebok Question Mid', 150, 'Reebok', 'Red', 8, 'Men', 'With Reebok Questions on his feet, Allen Iverson broke records on court using a style all his own. These men\'s mid-top shoes honour the man, the myth and the dream. Underneath the solid-colour textile lies graphics inspired by Halloween. Tear away the top layer of the upper completely, or just a panel here are there, the look is yours to customise.'),
(4103955, 'Reebok Question Mid', 150, 'Reebok', 'Red', 9, 'Men', 'With Reebok Questions on his feet, Allen Iverson broke records on court using a style all his own. These men\'s mid-top shoes honour the man, the myth and the dream. Underneath the solid-colour textile lies graphics inspired by Halloween. Tear away the top layer of the upper completely, or just a panel here are there, the look is yours to customise.'),
(4103956, 'Reebok Question Mid', 150, 'Reebok', 'Red', 10, 'Men', 'With Reebok Questions on his feet, Allen Iverson broke records on court using a style all his own. These men\'s mid-top shoes honour the man, the myth and the dream. Underneath the solid-colour textile lies graphics inspired by Halloween. Tear away the top layer of the upper completely, or just a panel here are there, the look is yours to customise.'),
(4103957, 'Reebok Question Mid', 150, 'Reebok', 'Red', 11, 'Men', 'With Reebok Questions on his feet, Allen Iverson broke records on court using a style all his own. These men\'s mid-top shoes honour the man, the myth and the dream. Underneath the solid-colour textile lies graphics inspired by Halloween. Tear away the top layer of the upper completely, or just a panel here are there, the look is yours to customise.'),
(4103958, 'Reebok Question Mid', 150, 'Reebok', 'Red', 12, 'Men', 'With Reebok Questions on his feet, Allen Iverson broke records on court using a style all his own. These men\'s mid-top shoes honour the man, the myth and the dream. Underneath the solid-colour textile lies graphics inspired by Halloween. Tear away the top layer of the upper completely, or just a panel here are there, the look is yours to customise.'),
(4103959, 'Reebok Question Mid', 150, 'Reebok', 'Red', 13, 'Men', 'With Reebok Questions on his feet, Allen Iverson broke records on court using a style all his own. These men\'s mid-top shoes honour the man, the myth and the dream. Underneath the solid-colour textile lies graphics inspired by Halloween. Tear away the top layer of the upper completely, or just a panel here are there, the look is yours to customise.'),
(4103960, 'Reebok Question Mid', 150, 'Reebok', 'Red', 14, 'Men', 'With Reebok Questions on his feet, Allen Iverson broke records on court using a style all his own. These men\'s mid-top shoes honour the man, the myth and the dream. Underneath the solid-colour textile lies graphics inspired by Halloween. Tear away the top layer of the upper completely, or just a panel here are there, the look is yours to customise.'),
(4103961, 'Reebok Question Mid', 150, 'Reebok', 'Red', 15, 'Men', 'With Reebok Questions on his feet, Allen Iverson broke records on court using a style all his own. These men\'s mid-top shoes honour the man, the myth and the dream. Underneath the solid-colour textile lies graphics inspired by Halloween. Tear away the top layer of the upper completely, or just a panel here are there, the look is yours to customise.');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `members` (`customer_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `favourites_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `members` (`customer_id`),
  ADD CONSTRAINT `favourites_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
