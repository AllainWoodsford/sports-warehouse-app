-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 17, 2025 at 11:36 AM
-- Server version: 10.11.10-MariaDB-log
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u891782227_sportswh`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` int(11) NOT NULL,
  `categoryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `categoryName`) VALUES
(10, 'Tops'),
(11, 'Training Gear'),
(12, 'Pants'),
(13, 'Balls'),
(14, 'Helmets'),
(15, 'Snow Equipment'),
(16, 'Hiking Gear'),
(17, 'Martial arts'),
(19, 'Msic'),
(20, 'Supplements'),
(26, 'Pool');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `itemId` int(11) NOT NULL,
  `itemName` varchar(150) NOT NULL,
  `photo` varchar(250) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `salePrice` decimal(10,2) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `featured` tinyint(1) NOT NULL,
  `categoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemId`, `itemName`, `photo`, `price`, `salePrice`, `description`, `featured`, `categoryId`) VALUES
(1, ' Adidas Euro16 Top Soccer Ball', 'soccerBall.jpg', 100.00, 30.00, 'adidas Performance Euro 16 Official Match Soccer Ball, Size 5, White/Bright Blue/Solar/Purple Good for kicking From the Game between Australia and england', 0, 13),
(2, ' Pro-tec Classic Skate Helmet', 'skateHelmet.jpg', 70.00, 0.00, 'Get the classic Pro-Tec look with proven protection. Shop a wide range of skate, bmx &amp; water helmets online at Pro-Tec Australia.', 1, 14),
(3, 'Nike sport 600ml Water Bottle', 'waterBottle.jpg', 17.50, 15.00, 'Rehydrate your body and revive your day with the Nike Sport 600ml Water Bottle. The asymmetrical, one-hand design provides easy grasping while the leakproof valve to prevent leakage. ', 1, 10),
(4, ' String ArmaPlus Boxing Gloves', 'boxingGloves.jpg', 79.95, 0.00, 'Get the perfect hand feel with the anatomically designed square shouldered mould to help you feel every shot land.', 1, 11),
(5, ' Asics Gel Lethal Tigreor 8 IT Men&#039;s', 'footyBoots.jpg', 160.00, 0.00, 'The GEL-Lethal Tigreor 8 IT is an advanced lightweight football boot designed for high performance and speed. This boot features HG10mm technology.', 1, 10),
(6, ' Asics GEL Kayano 27 Kids Running Shoes', 'runningShoes.jpg', 179.99, 0.00, 'Asics refine running for the next generation of young athletes with the Asics GEL Kayano 27. The exceptional support and comfort of the Kayano return in a lighter even more comfortable runner thanks to the two-piece, Flightfoam Propel midsole. ', 0, 10),
(7, ' Adidas must have stripes tee', 'blackTop.jpg', 34.99, 0.00, 'Built for busy training schedules, the adidas Boys Aeroready 3-Stripes Tee is a must have for budding young athletes.', 0, 10),
(8, ' Nike girls Futura Air tee', 'whitePinkTop.jpg', 29.99, 24.99, 'Your child will be motivated to perform her best at training in the Nike Girls Futura Air Tee. The comfortable, non-restrictive crew neckline offers durability, while the iconic Nike Air logo is featured across the front and on the sleeve to highlight her sporty vibe.', 0, 10),
(9, ' Adidas 3 stripes flare pants', 'tracksuit.jpg', 69.99, 55.99, 'Kick it old school this winter when you step out in the adidas Women&#039;s Tricot 3-Stripes Flare Pants. Ideal for post-gym wear, the stretchy tricot fabric allows you to move with ease as you recover from your big session. ', 0, 12),
(29, 'Footy Mouthguard Under armour', '', 30.00, 23.00, 'Keep your Teeth in your mouth while playing contact sports, one size fits all!', 0, 11),
(30, ' Diving Mask Goggles', '', 50.00, 25.00, 'For underwater vision', 0, 26),
(31, 'Hiking Boots', '', 98.50, 67.50, 'Best hiking shoes for level 3 tracks', 0, 16);

-- --------------------------------------------------------

--
-- Table structure for table `OrderItem`
--

CREATE TABLE `OrderItem` (
  `itemId` int(11) NOT NULL,
  `shoppingOrderId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `OrderItem`
--

INSERT INTO `OrderItem` (`itemId`, `shoppingOrderId`, `quantity`, `price`) VALUES
(1, 3, 1, 35.95),
(1, 4, 1, 35.95),
(1, 6, 2, 36.00),
(1, 7, 7, 36.00),
(1, 10, 1, 36.00),
(2, 3, 1, 70.00),
(2, 4, 1, 70.00),
(2, 7, 1, 70.00),
(2, 12, 1, 70.00),
(3, 3, 11, 15.00),
(3, 4, 11, 15.00),
(3, 13, 1, 15.00),
(4, 3, 1, 79.95),
(4, 4, 1, 79.95),
(4, 6, 1, 79.95),
(4, 11, 1, 79.95),
(5, 3, 1, 160.00),
(5, 4, 1, 160.00),
(6, 3, 1, 179.99),
(6, 4, 1, 179.99),
(6, 5, 1, 179.99),
(7, 10, 1, 34.99),
(9, 6, 4, 55.99),
(9, 7, 4, 55.99),
(31, 7, 1, 67.50);

-- --------------------------------------------------------

--
-- Table structure for table `ShoppingOrder`
--

CREATE TABLE `ShoppingOrder` (
  `shoppingOrderId` int(11) NOT NULL,
  `orderDate` datetime NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `contactNumber` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `creditCardNumber` varchar(20) NOT NULL,
  `expiryDate` varchar(10) NOT NULL,
  `nameOnCard` varchar(50) NOT NULL,
  `csv` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ShoppingOrder`
--

INSERT INTO `ShoppingOrder` (`shoppingOrderId`, `orderDate`, `firstName`, `lastName`, `address`, `contactNumber`, `email`, `creditCardNumber`, `expiryDate`, `nameOnCard`, `csv`) VALUES
(2, '2023-11-12 00:00:00', '213', '213', '123, 123, 123, NSW, Australia', '123', '123@123', '12345346326', '2025-06', 'allain b w', '333'),
(3, '2023-11-12 00:00:00', '213', '213', '123, 123, 123, NSW, Australia', '123', '123@123', '12345346326', '2025-06', 'allain b w', '333'),
(4, '2023-11-12 00:00:00', '213', '213', '123, 123, 123, NSW, Australia', '123', '123@123', '123', '2023-07', '123', '123'),
(5, '2023-11-12 00:00:00', '123', '123', '123| 123| 123| NSW| Australia', '123', '123@123', '123', '2023-06', '123', '123'),
(6, '2023-11-16 00:00:00', 'allain', 'woodsford', '123 fake st| faketown| 2000| NSW| Australia', '045555555', 'fakeemail@gmail.com', '555555555', '2023-11', 'allain wods', '123'),
(7, '2023-11-16 00:00:00', 'allain', 'chrome test', '123 fake st chrome test| chrome test| 2000| NSW| Australia', '555555555555', 'fakechrometest@gmail.com', '55555555555555555555', '2023-09', 'allain chrome test', '123'),
(8, '2023-11-18 00:00:00', 'allain', 'w', 'fake st| fakeville| 2000| NSW| Australia', '12345', 'fake@fake', '123455', '2023-08', 'allain', '123'),
(9, '2023-11-18 00:00:00', 'allain', 'w', 'fake st| fakeville| 2000| NSW| Australia', '12345', 'fake@fake', '1234', '2023-03', '2134', '123'),
(10, '2023-11-18 00:00:00', 'allain', 'w', 'fake st| fakeville| 2000| NSW| Australia', '12345', 'fake@fake', '1234', '2023-03', '2134', '123'),
(11, '2023-11-18 00:00:00', 'allain', 'w', 'fake st| fakeville| 2000| NSW| Australia', '12345', 'fake@fake', '77777777777777777', '2023-12', 'live website test', '123'),
(12, '2023-11-18 00:00:00', '123', '123', '123| 123| 123| NSW| Australia', '555', 'fake@fake', '123', '2023-12', '123', '123'),
(13, '2025-01-06 00:00:00', 'james', 'smith', '183 avenue b| cape town city centre| 3007| NSW| Australia', '7049991234', 'jamessmithy@gmail.com', '5459460001077107', '2025-09', 'james smith', '421');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `userName`, `password`, `isAdmin`) VALUES
(9, '123', '$2y$10$OYTKApbZCZJCQY1wGE5OoOKm1uPD49n0ms37TstxsrkxFfWkSIdTW', 0),
(28, 'bob', '0', 0),
(30, 'allain', '$2y$10$jehtbEI6Lo87CQ/8G8VNbu/fl2K48l5g4CmX7J73/tP9JlQsbGxqO', 0),
(31, 'admin', '$2y$10$yXjVfhV59IqmiV83UlJg9uLeJyBjg0MTDQEukvxZ6ucn6BR5wT2vS', 0),
(32, 'anthony', '$2y$10$24kUYXM7QUHlPDf4B3t3cu6kz8i0HjuCNegZq5kWN3gg3FwkgAHaC', 0),
(33, 'garry', '$2y$10$hhJyVlsSheY2mVmSuIFmqu7BS0oklvRyN5TBIRvE9kz8goZgy5vVq', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemId`),
  ADD KEY `itemId` (`itemId`),
  ADD KEY `FK_itemCategory` (`categoryId`);

--
-- Indexes for table `OrderItem`
--
ALTER TABLE `OrderItem`
  ADD PRIMARY KEY (`itemId`,`shoppingOrderId`),
  ADD KEY `shoppingOrderId` (`shoppingOrderId`);

--
-- Indexes for table `ShoppingOrder`
--
ALTER TABLE `ShoppingOrder`
  ADD PRIMARY KEY (`shoppingOrderId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `ShoppingOrder`
--
ALTER TABLE `ShoppingOrder`
  MODIFY `shoppingOrderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `FK_itemCategory` FOREIGN KEY (`categoryId`) REFERENCES `category` (`categoryId`);

--
-- Constraints for table `OrderItem`
--
ALTER TABLE `OrderItem`
  ADD CONSTRAINT `OrderItem_ibfk_1` FOREIGN KEY (`itemId`) REFERENCES `item` (`itemId`),
  ADD CONSTRAINT `OrderItem_ibfk_2` FOREIGN KEY (`shoppingOrderId`) REFERENCES `ShoppingOrder` (`shoppingOrderId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
