-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2022 at 03:25 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foods_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_foods`
--

CREATE TABLE `category_foods` (
  `Category_ID` int(11) NOT NULL,
  `Category_Name` varchar(255) DEFAULT NULL,
  `category_icons` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_foods`
--

INSERT INTO `category_foods` (`Category_ID`, `Category_Name`, `category_icons`) VALUES
(1, 'Healthy', 'fastfood'),
(2, 'Ăn Vặt', 'fastfood'),
(3, 'Cơm', NULL),
(4, 'Bún/phở', NULL),
(5, 'Trà Sữa', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `Food_ID` int(11) NOT NULL,
  `Food_Name` varchar(255) DEFAULT NULL,
  `Food_Img` varchar(255) DEFAULT NULL,
  `Food_Price` float DEFAULT NULL,
  `Food_Categori` int(11) DEFAULT NULL,
  `food_detail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`Food_ID`, `Food_Name`, `Food_Img`, `Food_Price`, `Food_Categori`, `food_detail`) VALUES
(1, 'Pizza', 'images/pizza01.jpg', 15000, 2, 'Quán 123 Go\r\nĐịa chỉa Ax phường By TP.Đà lạt\r\nGiờ Mỏ cửa\r\n6h-22h    '),
(2, 'Gà Chiên', 'images/gachien01.jpg', 30000, 1, 'Quán 123 Go\r\nĐịa chỉa Ax phường By TP.Đà lạt\r\nGiờ Mỏ cửa\r\n6h-22h    '),
(3, 'Hamberger', 'images/hamberger_01.jpg', 15, 1, 'Quán 123 Go\r\nĐịa chỉa Ax phường By TP.Đà lạt\r\nGiờ Mỏ cửa\r\n6h-22h    '),
(4, 'Bánh mì', 'images/banhmi01.jpg', 15000, 1, 'Quán 123 Go\r\nĐịa chỉa Ax phường By TP.Đà lạt\r\nGiờ Mỏ cửa\r\n6h-22h    '),
(5, 'Trà sữa truyền thống', 'images/trasua01.jpg', 25000, 5, 'Quán 123 Go\r\nĐịa chỉa Ax phường By TP.Đà lạt\r\nGiờ Mỏ cửa\r\n6h-22h    '),
(6, 'Trà sữa Matcha', 'images/trasua03.jpg', 30000, 5, 'Quán 123 Go\r\nĐịa chỉa Ax phường By TP.Đà lạt\r\nGiờ Mỏ cửa\r\n6h-22h    ');

-- --------------------------------------------------------

--
-- Table structure for table `food_card`
--

CREATE TABLE `food_card` (
  `card_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_card`
--

INSERT INTO `food_card` (`card_id`, `food_id`) VALUES
(2, 2),
(1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `hang_nguoidung`
--

CREATE TABLE `hang_nguoidung` (
  `Hang_ID` int(11) NOT NULL,
  `Ten_Hang` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hang_nguoidung`
--

INSERT INTO `hang_nguoidung` (`Hang_ID`, `Ten_Hang`) VALUES
(1, 'Bronze'),
(2, 'Silver'),
(3, 'Gold'),
(4, 'Diamond\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `NguoiDung_ID` int(11) NOT NULL,
  `NguoiDung_Name` varchar(255) DEFAULT NULL,
  `NguoiDung_PassWord` int(11) DEFAULT NULL,
  `NguoiDung_Email` varchar(255) DEFAULT NULL,
  `NguoiDung_Point` int(11) DEFAULT NULL,
  `NguoiDung_Rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`NguoiDung_ID`, `NguoiDung_Name`, `NguoiDung_PassWord`, `NguoiDung_Email`, `NguoiDung_Point`, `NguoiDung_Rank`) VALUES
(1, 'Minh Nguyệt', 1, 'MinhNguyet@gmail.com', 100, 1),
(2, 'Sĩ Phong', 1, 'phongbui@gmail.com', 200, 2),
(3, 'admin', 1, 'admin@gmail.com', 1, 1),
(6, 'admin', 1, 'admin@gmial.com', 0, 1),
(7, 'test', 1, 'test @gmaill.com', 0, 1),
(8, 'Dam Quang Huy', 1, 'Huy@gmail.com', 0, 1),
(9, '1', 1, '1', 0, 1),
(10, 'Xmen', 1, '123', 0, 1),
(11, 'me', 1, '1@gmail.com', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_foods`
--
ALTER TABLE `category_foods`
  ADD PRIMARY KEY (`Category_ID`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`Food_ID`),
  ADD KEY `Food_Categori` (`Food_Categori`);

--
-- Indexes for table `food_card`
--
ALTER TABLE `food_card`
  ADD PRIMARY KEY (`card_id`),
  ADD KEY `card_fodd` (`food_id`);

--
-- Indexes for table `hang_nguoidung`
--
ALTER TABLE `hang_nguoidung`
  ADD PRIMARY KEY (`Hang_ID`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`NguoiDung_ID`),
  ADD KEY `NguoiDung_Rank` (`NguoiDung_Rank`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_foods`
--
ALTER TABLE `category_foods`
  MODIFY `Category_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `Food_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `food_card`
--
ALTER TABLE `food_card`
  MODIFY `card_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hang_nguoidung`
--
ALTER TABLE `hang_nguoidung`
  MODIFY `Hang_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `NguoiDung_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `foods`
--
ALTER TABLE `foods`
  ADD CONSTRAINT `foods_ibfk_1` FOREIGN KEY (`Food_Categori`) REFERENCES `category_foods` (`Category_ID`);

--
-- Constraints for table `food_card`
--
ALTER TABLE `food_card`
  ADD CONSTRAINT `card_fodd` FOREIGN KEY (`food_id`) REFERENCES `foods` (`Food_ID`);

--
-- Constraints for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD CONSTRAINT `nguoidung_ibfk_1` FOREIGN KEY (`NguoiDung_Rank`) REFERENCES `hang_nguoidung` (`Hang_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
