-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2021 at 07:55 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlydathang`
--
CREATE DATABASE IF NOT EXISTS `quanlydathang` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `quanlydathang`;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MSHH` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chitietdathang`
--

CREATE TABLE `chitietdathang` (
  `SoDonDH` int(11) NOT NULL,
  `MSHH` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `GiaDatHang` int(11) NOT NULL,
  `GiamGia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chitietdathang`
--

INSERT INTO `chitietdathang` (`SoDonDH`, `MSHH`, `SoLuong`, `GiaDatHang`, `GiamGia`) VALUES
(23, 54, 1, 2190000, 0),
(23, 57, 1, 1090000, 0),
(23, 39, 1, 3490000, 0),
(23, 50, 1, 3990000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dathang`
--

CREATE TABLE `dathang` (
  `SoDonDH` int(11) NOT NULL,
  `MSKH` int(11) NOT NULL,
  `MSNV` int(11) DEFAULT NULL,
  `NgayDH` date NOT NULL,
  `NgayGH` date DEFAULT NULL,
  `TrangThaiDH` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dathang`
--

INSERT INTO `dathang` (`SoDonDH`, `MSKH`, `MSNV`, `NgayDH`, `NgayGH`, `TrangThaiDH`) VALUES
(23, 9, NULL, '2021-11-25', NULL, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `diachikh`
--

CREATE TABLE `diachikh` (
  `MaDC` int(11) NOT NULL,
  `DiaChi` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MSKH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diachikh`
--

INSERT INTO `diachikh` (`MaDC`, `DiaChi`, `MSKH`) VALUES
(9, 'Can Tho City, Vietnam', 9);

-- --------------------------------------------------------

--
-- Table structure for table `hanghoa`
--

CREATE TABLE `hanghoa` (
  `MSHH` int(11) NOT NULL,
  `TenHH` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `QuyCach` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Gia` int(11) NOT NULL,
  `SoLuongHang` int(11) NOT NULL,
  `MaLoaiHang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hanghoa`
--

INSERT INTO `hanghoa` (`MSHH`, `TenHH`, `QuyCach`, `Gia`, `SoLuongHang`, `MaLoaiHang`) VALUES
(1, 'Razer Deathadder Essential', 'Cái', 650000, 20, 1),
(26, 'Razer Viper Mini', 'Cái', 990000, 0, 1),
(27, 'Razer Viper Mercury', 'Cái', 1850000, 60, 1),
(28, 'Razer Pro Click', 'Cái', 2490000, 100, 1),
(29, 'Razer Orochi V2', 'Cái', 1790000, 100, 1),
(30, 'Razer Mamba Elite', 'Cái', 2190000, 100, 1),
(31, 'Logitech G Pro Wireless', 'Cái', 2490000, 100, 1),
(32, 'Logitech G102 Lightsync', 'Cái', 390000, 100, 1),
(33, 'Akko 3087 Silent', 'Cái', 1390000, 100, 2),
(34, 'Akko 3098 Midnight', 'Cái', 890000, 100, 2),
(35, 'Akko Blackpink', 'Cái', 1290000, 100, 2),
(36, 'Akko Designer Studio', 'Cái', 3190000, 100, 2),
(37, 'Akko Ocean Star', 'Cái', 1190000, 100, 2),
(38, 'Akko OnePiece \"Chopper\"', 'Cái', 1490000, 100, 2),
(39, 'Leopold FC980 Retro', 'Cái', 3490000, 100, 2),
(40, 'Razer Blackwidow V3', 'Cái', 2990000, 100, 2),
(41, 'Steelseries Arctis 5 White Edition', 'Cái', 1790000, 100, 3),
(42, 'Razer Blackshark V2 Pro \"Rainbow-Six\"', 'Cái', 3490000, 100, 3),
(43, 'Dareu A700 Wireless', 'Cái', 990000, 100, 3),
(44, 'Logitech G733 Lightspeed', 'Cái', 3190000, 100, 3),
(45, 'Razer Blackshark V2', 'Cái', 2990000, 100, 3),
(46, 'JBL Quantum \"ONE\"', 'Cái', 4990000, 20, 3),
(47, 'Razer Kraken Kitty Edition Quartz', 'Cái', 1390000, 100, 3),
(48, 'Razer Kraken X Mercury', 'Cái', 1390000, 100, 3),
(49, 'Razer Opus X Mercury', 'Cái', 2490000, 100, 3),
(50, 'Corsair Virtuoso Wireless \"Pearl\"', 'Cái', 3990000, 100, 3),
(51, 'Asus ROG Delta \"Gundam\"', 'Cái', 4790000, 100, 3),
(52, 'Corsair Virtuoso SE \"Espresso\"', 'Cái', 3990000, 100, 3),
(53, 'Corsair Void RGB Elite', 'Cái', 2290000, 100, 3),
(54, 'Glorious Model O', 'Cái', 2190000, 100, 1),
(55, 'BenQ Zowie EC2', 'Cái', 1990000, 100, 1),
(56, 'Dareu EM908 Arctic', 'Cái', 390000, 1000, 1),
(57, 'Logitech G304 \"KDA\"', 'Cái', 1090000, 100, 1),
(58, 'SteelSeries Rival 600', 'Cái', 2090000, 100, 1),
(59, 'Steelseries Sensei Ten Neon \"Raider Edition\"', 'Cái', 1870000, 100, 1),
(60, 'Razer Viper Ultimate \"Quartz\"', 'Cái', 3490000, 100, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hinhhanghoa`
--

CREATE TABLE `hinhhanghoa` (
  `MaHinh` int(11) NOT NULL,
  `TenHinh` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MSHH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hinhhanghoa`
--

INSERT INTO `hinhhanghoa` (`MaHinh`, `TenHinh`, `MSHH`) VALUES
(1, 'deathadder-essential.png', 1),
(21, 'viper-mini.jpg', 26),
(22, 'viper-mercury.jpg', 27),
(23, 'pro-click.jpg', 28),
(24, 'orochi-v2.png', 29),
(25, 'mamba-elite.jpg', 30),
(26, 'gpro-wireless.png', 31),
(27, 'g102-lightsync.jpg', 32),
(28, 'akko-3087-silent.jpg', 33),
(29, 'akko-3098-midnight.jpg', 34),
(30, 'akko-blackpink.jpg', 35),
(31, 'akko-designer-studio.jpg', 36),
(32, 'akko-ocean-star.jpg', 37),
(33, 'akko-one-piece-chopper.jpg', 38),
(34, 'leopold-fc980.jpg', 39),
(35, 'razer-blackwidow-v3.jpg', 40),
(36, 'arctis-5-white-edition.jpg', 41),
(37, 'blackshark-v2-pro-rainbow-six.jpg', 42),
(38, 'dareu-a700.jpg', 43),
(39, 'g733-lightspeed.png', 44),
(40, 'gearvn-tai-nghe-razer-blackshark-v2.jpg', 45),
(41, 'jbl-quantum-ONE.png', 46),
(43, 'kraken-kitty-edition-quartz.png', 47),
(44, 'razer-kraken-x-mercury.png', 48),
(45, 'razer-opus-x.png', 49),
(46, 'virtuoso-pearl.png', 50),
(47, 'ROG-delta-gundam.jpg', 51),
(48, 'virtuoso-se-espresso.png', 52),
(49, 'void-rgb-elite.png', 53),
(51, 'ModelO.jfif', 54),
(52, 'zowie_ec2.png', 55),
(53, 'EM908_Arctic.jpg', 56),
(54, 'G304_KDA.jpg', 57),
(55, 'Rival_600.jpg', 58),
(56, 'Sensei-ten-neon.png', 59),
(57, 'Viper-ultimate-quartz.jfif', 60);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MSKH` int(11) NOT NULL,
  `HoTenKH` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenCongTy` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SoDienThoai` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SoFax` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MSKH`, `HoTenKH`, `TenCongTy`, `SoDienThoai`, `SoFax`, `username`, `password`) VALUES
(9, 'Nguyễn Đình Quý', 'Can Tho University', '0123456789', '0123456789', 'b1812372', 'b1812372');

-- --------------------------------------------------------

--
-- Table structure for table `loaihanghoa`
--

CREATE TABLE `loaihanghoa` (
  `MaLoaiHang` int(11) NOT NULL,
  `TenLoaiHang` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loaihanghoa`
--

INSERT INTO `loaihanghoa` (`MaLoaiHang`, `TenLoaiHang`) VALUES
(1, 'Chuột'),
(2, 'Bàn phím'),
(3, 'Tai nghe');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MSNV` int(11) NOT NULL,
  `HoTenNV` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ChucVu` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DiaChi` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SoDienThoai` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MSNV`, `HoTenNV`, `ChucVu`, `DiaChi`, `SoDienThoai`, `username`, `password`) VALUES
(1, 'Nguyễn Đình Quý', 'Giám đốc', 'Can Tho', '0123456789', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD KEY `SoDonDH` (`SoDonDH`),
  ADD KEY `MSHH` (`MSHH`);

--
-- Indexes for table `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`SoDonDH`),
  ADD KEY `MSKH` (`MSKH`),
  ADD KEY `MSNV` (`MSNV`);

--
-- Indexes for table `diachikh`
--
ALTER TABLE `diachikh`
  ADD PRIMARY KEY (`MaDC`),
  ADD KEY `MSKH` (`MSKH`);

--
-- Indexes for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`MSHH`),
  ADD KEY `MaLoaiHang` (`MaLoaiHang`);

--
-- Indexes for table `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  ADD PRIMARY KEY (`MaHinh`),
  ADD KEY `MSHH` (`MSHH`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MSKH`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `loaihanghoa`
--
ALTER TABLE `loaihanghoa`
  ADD PRIMARY KEY (`MaLoaiHang`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MSNV`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dathang`
--
ALTER TABLE `dathang`
  MODIFY `SoDonDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `diachikh`
--
ALTER TABLE `diachikh`
  MODIFY `MaDC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `MSHH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  MODIFY `MaHinh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MSKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `loaihanghoa`
--
ALTER TABLE `loaihanghoa`
  MODIFY `MaLoaiHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MSNV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD CONSTRAINT `chitietdathang_ibfk_1` FOREIGN KEY (`SoDonDH`) REFERENCES `dathang` (`SoDonDH`),
  ADD CONSTRAINT `chitietdathang_ibfk_2` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`);

--
-- Constraints for table `dathang`
--
ALTER TABLE `dathang`
  ADD CONSTRAINT `dathang_ibfk_1` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`),
  ADD CONSTRAINT `dathang_ibfk_2` FOREIGN KEY (`MSNV`) REFERENCES `nhanvien` (`MSNV`);

--
-- Constraints for table `diachikh`
--
ALTER TABLE `diachikh`
  ADD CONSTRAINT `diachikh_ibfk_1` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`);

--
-- Constraints for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `hanghoa_ibfk_1` FOREIGN KEY (`MaLoaiHang`) REFERENCES `loaihanghoa` (`MaLoaiHang`);

--
-- Constraints for table `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  ADD CONSTRAINT `hinhhanghoa_ibfk_1` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
