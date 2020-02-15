-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2018 at 05:39 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sparkledb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `Quantity` int(11) NOT NULL,
  `CartID` varchar(45) NOT NULL,
  `user_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cart_has_item`
--

CREATE TABLE `cart_has_item` (
  `Cart_CartID` varchar(45) NOT NULL,
  `Cart_user_email` varchar(100) NOT NULL,
  `item_Vendor_VendorName` varchar(30) NOT NULL,
  `item_ItemName` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `ItemName` varchar(45) NOT NULL,
  `Price` int(11) NOT NULL,
  `Stock` int(11) NOT NULL,
  `Category` varchar(45) DEFAULT NULL,
  `Metal` varchar(45) DEFAULT NULL,
  `Stone` varchar(45) DEFAULT NULL,
  `SearchTags` varchar(500) DEFAULT NULL,
  `ImageURL` varchar(400) DEFAULT NULL,
  `Description` varchar(200) DEFAULT NULL,
  `Vendor_VendorName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`ItemName`, `Price`, `Stock`, `Category`, `Metal`, `Stone`, `SearchTags`, `ImageURL`, `Description`, `Vendor_VendorName`) VALUES
('item10', 12300, 12, 'Pendants', 'Silver', 'ruby', 'tag1+tag2', NULL, 'Description', 'brand'),
('item11', 12300, 23, 'Bracelets', 'bronze', 'saphire', 'tag1+tag2', NULL, 'description', 'brand'),
('item12', 12000, 23, 'Pendants', 'Silver', 'saphire', 'tag1+tag2', NULL, 'description1', 'brand'),
('item13', 12000, 12, 'Bracelets', 'Silver', 'ruby', 'tag1+tag2', NULL, 'Descriptoin', 'brand'),
('item14', 12300, 128, 'Bracelets', 'Silver', 'ruby', 'tag1+tag2', 'images/itemImages/brand_item14.jpg', 'Description', 'brand'),
('item2', 12000, 12, 'Rings', 'gold', 'saphire', 'tag3+tag4', NULL, 'Description2', 'brand'),
('Item3', 12, 12, 'Bracelets', 'gold', 'saphire', 'tag1', NULL, 'des', 'brand'),
('item4', 123, 12, 'Pendants', 'Silver', 'saphire', 'tag1+tag2', NULL, 'Description', 'brand'),
('name', 12000, 12, 'Rings', 'Silver', 'ruby', 'tag1+tag2', NULL, 'Description', 'brand'),
('item42', 12000, 12, 'Rings', 'Silver', 'ruby', 'simple+elegant', 'images/itemImages/t1_item42.jpg', 'description', 't1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(100) NOT NULL,
  `Name` varchar(55) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Address` varchar(300) DEFAULT NULL,
  `CardNumber` varchar(12) DEFAULT NULL,
  `CardHolder` varchar(100) DEFAULT NULL,
  `Expires` date DEFAULT NULL,
  `Cvc` int(11) DEFAULT '0',
  `Type` varchar(1) NOT NULL DEFAULT 'U',
  `SequrityQuestion` varchar(100) NOT NULL,
  `SequrityAnswer` varchar(45) NOT NULL,
  `CCtype` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `Name`, `Password`, `Address`, `CardNumber`, `CardHolder`, `Expires`, `Cvc`, `Type`, `SequrityQuestion`, `SequrityAnswer`, `CCtype`) VALUES
('aq@fhh.com', 'Aqeel Zeid', 'spBh3Y1nncApQ', '304/1, Buwelikada Road, Muruthagahamula, Gelioya Kandy 20000', '123412341234', NULL, '2018-02-01', 123, 'U', 'What is Your nickname in highschool?', 'Aqeel Zeid', 'visa'),
('aqaq@h.com', 'Aqeel Zeid', 'spBh3Y1nncApQ', NULL, NULL, NULL, NULL, 0, 'U', 'What is Your nickname in highschool?', 'Aqeel Zeid', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_buys_item`
--

CREATE TABLE `user_buys_item` (
  `item_Vendor_VendorName` varchar(30) NOT NULL,
  `item_ItemName` varchar(45) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `Status` varchar(45) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `token` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_buys_item`
--

INSERT INTO `user_buys_item` (`item_Vendor_VendorName`, `item_ItemName`, `user_email`, `Status`, `Date`, `token`) VALUES
('brand', 'item4', 'aqaq@h.com', 'a', '2018-09-04', 7);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `VendorName` varchar(30) NOT NULL,
  `VendorPassword` varchar(200) NOT NULL,
  `PhoneNumber` varchar(45) DEFAULT NULL,
  `BannerImage` varchar(100) DEFAULT NULL,
  `Description` varchar(400) DEFAULT NULL,
  `BankAccount` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`VendorName`, `VendorPassword`, `PhoneNumber`, `BannerImage`, `Description`, `BankAccount`) VALUES
('Brand', 'spEAoipz/qQEc', '.123', NULL, NULL, '123'),
('Brand2', 'spBh3Y1nncApQ', '.1234', NULL, NULL, '1234'),
('brand3', 'spBh3Y1nncApQ', '.1234', NULL, NULL, '1234'),
('t1', 'spBh3Y1nncApQ', '.1234', NULL, NULL, '1234'),
('testbrand', 'spBh3Y1nncApQ', '.1234', NULL, NULL, '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CartID`,`user_email`),
  ADD KEY `fk_Cart_user_idx` (`user_email`);

--
-- Indexes for table `cart_has_item`
--
ALTER TABLE `cart_has_item`
  ADD PRIMARY KEY (`Cart_CartID`,`Cart_user_email`,`item_Vendor_VendorName`,`item_ItemName`),
  ADD KEY `fk_Cart_has_item_Cart1_idx` (`Cart_CartID`,`Cart_user_email`),
  ADD KEY `fk_Cart_has_item_item1_idx` (`item_Vendor_VendorName`,`item_ItemName`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`Vendor_VendorName`,`ItemName`),
  ADD KEY `fk_item_Vendor_idx` (`Vendor_VendorName`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `user_buys_item`
--
ALTER TABLE `user_buys_item`
  ADD PRIMARY KEY (`item_Vendor_VendorName`,`item_ItemName`,`user_email`),
  ADD UNIQUE KEY `token` (`token`),
  ADD KEY `fk_item_has_user_user1_idx` (`user_email`),
  ADD KEY `fk_item_has_user_item1_idx` (`item_Vendor_VendorName`,`item_ItemName`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`VendorName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_buys_item`
--
ALTER TABLE `user_buys_item`
  MODIFY `token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_Cart_user` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cart_has_item`
--
ALTER TABLE `cart_has_item`
  ADD CONSTRAINT `fk_Cart_has_item_Cart1` FOREIGN KEY (`Cart_CartID`,`Cart_user_email`) REFERENCES `cart` (`CartID`, `user_email`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Cart_has_item_item1` FOREIGN KEY (`item_Vendor_VendorName`,`item_ItemName`) REFERENCES `item` (`Vendor_VendorName`, `ItemName`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `fk_item_Vendor` FOREIGN KEY (`Vendor_VendorName`) REFERENCES `vendor` (`VendorName`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_buys_item`
--
ALTER TABLE `user_buys_item`
  ADD CONSTRAINT `fk_item_has_user_item1` FOREIGN KEY (`item_Vendor_VendorName`,`item_ItemName`) REFERENCES `item` (`Vendor_VendorName`, `ItemName`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_item_has_user_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
