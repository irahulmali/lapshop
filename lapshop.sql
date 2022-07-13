-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2019 at 07:55 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lapshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `oid` int(5) NOT NULL AUTO_INCREMENT,
  `uid` int(5) NOT NULL,
  `pid` int(5) NOT NULL,
  `sid` int(5) NOT NULL,
  `orderdate` datetime NOT NULL,
  `delivery` varchar(10) NOT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `uid`, `pid`, `sid`, `orderdate`, `delivery`) VALUES
(55, 28, 10, 1, '2019-07-21 19:25:02', 'delivered'),
(56, 28, 9, 1, '2019-07-21 19:25:02', 'delivered'),
(57, 28, 7, 1, '2019-07-21 19:25:02', 'delivered');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `pid` int(5) NOT NULL AUTO_INCREMENT,
  `sid` int(5) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `price` int(6) NOT NULL,
  `quantity` int(3) NOT NULL,
  `processor` varchar(50) NOT NULL,
  `os` varchar(50) NOT NULL,
  `display` varchar(100) NOT NULL,
  `ram` varchar(50) NOT NULL,
  `hdd` varchar(50) NOT NULL,
  `dimensions` varchar(50) NOT NULL,
  `battery` varchar(50) NOT NULL,
  `warranty` varchar(50) NOT NULL,
  `graphics` varchar(50) NOT NULL,
  `webcam` varchar(50) NOT NULL,
  `connectivity` varchar(100) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `img` varchar(20) NOT NULL,
  `seller` varchar(80) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `sid`, `brand`, `model`, `description`, `price`, `quantity`, `processor`, `os`, `display`, `ram`, `hdd`, `dimensions`, `battery`, `warranty`, `graphics`, `webcam`, `connectivity`, `weight`, `img`, `seller`) VALUES
(7, 6, 'Acer', 'Predator Helios 300 PH315-51', 'Acer Predator Helios 300 PH315-51Core i5 8th Gen CPU with 8 GB Ram 1 TB HDD 128 GB SSD 4 GB Graphics Windows 10 Home Gaming Laptop', 94990, 10, 'Intel Core i5 8300H 8th Gen 2. 3 GHz Processor', 'Windows 10 OS with 1 Year Warranty', '15.60 Inches', ' 8 GB DDR4 Ram', '1 TB HDD and 128 GB SSD', '39.6 x 33 x 7.6 cm', '1 Lithium Polymer', '1 year international warranty', 'NVIDIA Geforce GTX 1050 Ti Graphics', '1.5HD', 'USB, Bluetooth, WI-Fi', '2.7 Kg', '1563615060.jpg', 'New Seller'),
(9, 6, 'Dell', 'Inspiron 3567', 'Dell Inspiron 3567 Intel Core i3 7th Gen 15.6-inch FHD Laptop (4GB/1TB HDD/Windows 10 Home/MS Office/Black/2.5kg)', 30499, 5, '7th Gen Intel Core i3-7020U processor, 2.3GHz ', 'Windows 10', '15.5 Inches', '4GB', '1TB', '26.1 x 38 x 2.6 cm', '1 A battery', '1 year domestic warranty', 'Intel HD Graphics 620', '1.3HD', 'USB, Bluetooth, Wi-FI', '2.5 Kg', '1563623936.jpg', 'New Seller'),
(10, 6, 'HP', '245 G6', 'HP 245 7th GEN AMD (4GB / 1TB / DOS) G6 Laptop, (14.1 inch, Black)', 20999, 8, '7TH GEN AMD A9-9425 3.10GHz 5 Cores', 'DOS', '15.5 Inches', '4GB RAM DDR4', '1TB SATA 5400RPM', '48.4 x 31.2 x 6.9 cm', '1 Lithium ion', '1 year domestic warranty', 'NA', '1.3HD', 'USB, Bluetooth, Wi-FI', '2.59 Kg', '1563624386.jpg', 'New Seller'),
(11, 6, 'Lenovo', ' Ideapad 330', 'Lenovo Ideapad 330 Intel Core i5 8th Gen 15.6-inch Laptop (8GB/2TB HDD/Windows 10 Home/2GB Graphics/Platinum Grey/ 2.2kg), 81DE012PIN', 47490, 5, 'Intel Core i5 8th Gen', 'Windows 10 Home', '15.6 Inches, LED-lit, 1366x768', '8GB', '2TB', '37.8 x 26 x 2.3 cm', '1 Lithium Polymer', '1 year domestic warranty', 'AMD RADEON 530 (2GB GDDR5)', '1.3HD', 'USB, Bluetooth, Wi-FI', '2.2 Kg', '1563624673.jpg', 'New Seller'),
(12, 6, 'Apple', 'MacBook Air', 'Apple MacBook Air (13-inch, 1.8GHz Dual-core Intel Core i5, 8GB RAM, 128GB SSD) - Silver', 68990, 5, 'Intel Core i5', 'MacOS Sierra ', '13.3-inch', '8GB LPDDR3 RAM', '128GB SSD', '26.1 x 38 x 2.6 cm', '1 A battery', '1 year domestic warranty', 'Intel HD Graphics 6000', '1.3HD', 'USB, Bluetooth, Wi-FI', '2.5 Kg', '1563628145.jpg', 'James Ford'),
(13, 6, 'Apple', 'MacBook Air ', 'Apple MacBook Air Core i5 5th Gen - (8 GB/128 GB SSD/Mac OS Sierra) MQD32HN/A A1466  (13.3 inch, Silver, 1.35 kg)', 71990, 9, 'Core i5 5th Gen', 'Mac OS Sierra', ' 33.78 cm (13.3 inch)', '8 GB', '128 GB', '325 x 227 x 17 mm', 'Upto 12 hours', '1 Year Domestic', 'Intel Integrated HD 6000', '1,5HD', ' Wireless LAN, Bluetooth', '1.35 kg', '1563652469.jpeg', 'Harry Potter'),
(14, 6, 'Acer ', ' Predator Helios 300 ', 'Acer Predator Helios 300 Core i5 8th Gen - (8 GB/1 TB HDD/128 GB SSD/Windows 10 Home/4 GB Graphics) PH315-51 / PH315-51-51V7 Gaming Laptop  (15.6 inch, Obsidian Black, 2.5 kg)', 69990, 5, ' Core i5 8th Gen', 'Windows 10 Home', 'Full HD LED Backlit IPS Display', '8 GB', '1 TB HDD', '390 x 266 x 26.75 mm', ' 4 cell', '1 Year Domestic', ' 1920 x 1080 Pixel', '1.5HD', ' Wireless LAN, Bluetooth', '2.5 kg', '1563653016.jpeg', 'Harry Potter'),
(15, 6, 'HP', '15 ', 'HP 15 Core i3 7th Gen - (4 GB/1 TB HDD/128 GB SSD/Windows 10 Home) 15Q-DS0027TU Laptop  (15.6 inch, Sparkling Black)', 33990, 7, 'Core i3 7th Gen ', 'Windows 10 Home', '15.6-inch Full HD SVA Anti-Glare WLED Display (1920 x 1080), 220 nits Brightness', '4 GB', '1 TB HDD', '390 x 266 x 26.75 mm', ' 4 cell', '1 Year Domestic', ' 1920 x 1080 Pixels', '1.5HD', ' Wireless LAN, Bluetooth', '2.5 kg', '1563653450.jpeg', 'Harry Potter'),
(16, 6, 'Dell', 'Inspiron 14', 'Dell Inspiron 14 3000 Core i3 7th Gen - (4 GB/1 TB HDD/Linux) inspiron 3467 Laptop  (14 inch, Black, 1.956 kg)', 25990, 6, 'Core i3 7th Gen ', 'Linux', ' HD LED Backlit Anti-glare Display', '4 GB', '1 TB HDD', '325 x 227 x 17 mm', ' 4 cell', '1 Year Domestic', ' 1366 x 768 Pixel', '1.5HD', ' Wireless LAN, Bluetooth', '1.956 kg', '1563653699.jpeg', 'Harry Potter'),
(17, 6, 'Lenovo', 'Ideapad 330', 'Lenovo Ideapad 330 Core i5 8th Gen - (8 GB/1 TB HDD/DOS/2 GB Graphics) 330-15IKB Laptop  (15.6 inch, Onyx Black, 2.2 kg)', 42990, 8, 'Core i5 8th Gen', 'DOS', ' HD LED Backlit Anti-glare TN Displa', '8 GB', '1 TB HDD', ' 378 x 260 x 22.9 mm', '2 cell', '1 Year Domestic', ' 1366 x 768 Pixel', '1.5HD', ' Wireless LAN, Bluetooth', '2.2 kg', '1563654174.jpeg', 'Ron Weasly'),
(18, 6, 'Asus', 'X540MA-GQ098T ', 'Asus Pentium Quad Core - (4 GB/1 TB HDD/Windows 10 Home) X540MA-GQ098T Laptop  (15.6 inch, Black, 2 kg)', 18990, 7, 'Pentium Quad Core', 'Windows 10 Home', 'HD LCD Anti-glare Display', '4 GB', '1 TB HDD', ' 381 x 252 x 27.2 mm', '3 Cell', '1 Year Domestic', ' 1366 x 768 Pixel', '1.5HD', ' Wireless LAN, Bluetooth', '2 kg', '1563654408.jpeg', 'Ron Weasly'),
(19, 6, 'Asus', 'ROG Strix G', 'Asus ROG Strix G Core i5 9th Gen - (8 GB/1 TB HDD/Windows 10 Home/4 GB Graphics) G531GD-BQ036T Gaming Laptop  (15.6 inch, Black, 2.4 kg)', 59990, 7, 'Core i5 9th Gen', 'Windows 10 Home', ' Full HD LED Backlit Anti-glare IPS Display (With 60 Hz Refresh Rate)', '8 GB', '1 TB HDD', ' 360 x 275 x 25.8 mm', '3 Cell', '1 Year Domestic', ' 39.62 cm (15.6 inch)', '1.5HD', ' Wireless LAN, Bluetooth', '2.4 kg', '1563654698.jpeg', 'Ron Weasly'),
(20, 6, 'Lenovo', 'Ideapad 330', 'Lenovo Ideapad 330 8th Gen Intel Core I5 15.6 inch HD Laptop (8GM RAM/ 1 TB HDD / NVIDIA GEFORCE MX150 Graphics/ DOS / Onyx Black / 2.2Kg), 81DE01MJIN', 42990, 8, '8th Gen Intel Core I5', ' DOS', '15.6 Inches', '8 GB RAM', '1 TB HDD ', '37.8 x 26 x 2.3 cm', '1 Lithium Polymer ', '1 year domestic', '2GB NVIDIA GeForce MX150 Graphics', '1.5HD', 'USB, Bluetooth, WI-Fi', '2.2 Kg', '1563665620.jpg', 'New Seller'),
(21, 6, 'Lenovo', 'Ideapad 330', 'Lenovo Ideapad 330 8th Gen Intel Core I5 15.6 inch HD Laptop (8GM RAM/ 1 TB HDD / NVIDIA GEFORCE MX150 Graphics/ DOS / Onyx Black / 2.2Kg), 81DE01MJIN', 42990, 8, '8th Gen Intel Core I5', ' DOS', '15.6 Inches', '8 GB RAM', '1 TB HDD ', '37.8 x 26 x 2.3 cm', '1 Lithium Polymer ', '1 year domestic', '2GB NVIDIA GeForce MX150 Graphics', '1.5HD', 'USB, Bluetooth, WI-Fi', '2.2 Kg', '1563665747.jpg', 'New Seller'),
(22, 6, 'Acer', 'Aspire 5 A515-51', 'Acer Aspire 5 A515-51 15.6-inch Laptop (8th Gen Intel Core i5-8250U/4GB/1TB/Windows 10/Microsoft Office Home  Student 2016/ Integrated Graphics), Steel Grey', 38989, 7, '8th Gen Intel Core i5-8250U', 'Windows 10', '15.60 Inches LED', '4GB DDR4 SDRAM', '1TB HDD 5400 rpm', '49 x 31.4 x 6.6 cm', '1 Lithium Polymer ', '1 year domestic', 'Intel HD', '1.5HDD', 'USB, Bluetooth, WI-FI', '1.9 Kg', '1563730942.jpg', 'New Seller');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE IF NOT EXISTS `seller` (
  `sid` int(5) NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `password` varchar(40) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(40) NOT NULL,
  `state` varchar(40) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `verify` int(1) NOT NULL DEFAULT '0',
  `pan` varchar(10) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`sid`, `fname`, `lname`, `email`, `mobile`, `password`, `address`, `city`, `state`, `pincode`, `verify`, `pan`) VALUES
(6, 'New', 'Seller', 'seller@gmail.com', '9999999999', 'f7a9e24777ec23212c54d7a350bc5bea5477fdbb', '', '', '', '', 1, 'AAAAA0000A');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(5) NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `password` varchar(40) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(40) NOT NULL,
  `state` varchar(40) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `fname`, `lname`, `email`, `mobile`, `password`, `address`, `city`, `state`, `pincode`) VALUES
(25, 'Raj', 'Singh', 'raj@gmail.com', '9878676779', 'f7a9e24777ec23212c54d7a350bc5bea5477fdbb', 'B-2, Sector-8', 'Kanpur', 'Uttar Pradesh', '234676'),
(26, 'Rohit', 'Kumar', 'rohit@gmail.com', '9878676779', 'f7a9e24777ec23212c54d7a350bc5bea5477fdbb', 'C-12, Sai Nagar', 'Gwalior', 'Madhya Pradesh', '778676'),
(27, 'Rajesh', 'Niar', 'rajesh@gmail.com', '9878676779', 'f7a9e24777ec23212c54d7a350bc5bea5477fdbb', '1234, Rose colony', 'Mumbai', 'Maharashtra', '223487'),
(28, 'Rahul', 'Mali', 'rahul@gmail.com', '9999999999', 'f7a9e24777ec23212c54d7a350bc5bea5477fdbb', '', '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
