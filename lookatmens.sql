-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 28, 2020 at 01:46 AM
-- Server version: 8.0.17
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lookatmens`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `comment` longtext NOT NULL,
  `date` date NOT NULL,
  `userid` int(11) NOT NULL,
  `proid` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `comment`, `date`, `userid`, `proid`, `rate`, `username`) VALUES
(2, 'สินค้าดี ขนส่งรวดเร็ว สุดยอดมากๆค่ะ', '2020-02-26', 2, 1003, 5, 'padrada promkijjanon'),
(3, 'สุดยอดจ้า ซื้อกี่รอบก็ยังดีเหมือนเดิม', '2020-02-26', 2, 1003, 5, 'padrada promkijjanon'),
(4, 'ผ้านิ่มมากค่ะ', '2020-02-27', 2, 1201, 5, 'Padrada Promkijjanon'),
(5, 'เสื้อสวยจังโลย', '2020-02-27', 2, 1003, 5, 'padrada promkijjanon'),
(6, 'สินค้าคุณภาพดีมากๆ', '2020-02-27', 2, 1510, 5, 'padrada promkijjanon'),
(7, 'ผ้านิ่มมาก', '2020-02-27', 2, 1510, 5, 'padrada promkijjanon'),
(8, 'good', '2020-02-28', 2, 1510, 5, ''),
(9, 'ขนส่งไวมากๆ', '2020-02-28', 2, 1510, 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `ordercheckout`
--

CREATE TABLE `ordercheckout` (
  `id` int(11) NOT NULL,
  `totalAll` int(11) NOT NULL,
  `Date` date NOT NULL,
  `userid` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ordercheckout`
--

INSERT INTO `ordercheckout` (`id`, `totalAll`, `Date`, `userid`, `status`) VALUES
(1, 1560, '2020-02-27', 2, 0),
(2, 740, '2020-02-28', 7, 0),
(3, 840, '2020-02-28', 8, 0),
(4, 1350, '2020-02-28', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orderproduct`
--

CREATE TABLE `orderproduct` (
  `orderid` int(11) NOT NULL,
  `proname` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `proid` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `qty` int(5) NOT NULL,
  `total` int(10) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `proname` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `price` int(11) NOT NULL,
  `protype` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `stockS` int(11) NOT NULL,
  `stockM` int(11) NOT NULL,
  `stockL` int(11) NOT NULL,
  `stockXL` int(11) NOT NULL,
  `picture` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `rateAll` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `proname`, `description`, `price`, `protype`, `stockS`, `stockM`, `stockL`, `stockXL`, `picture`, `rateAll`) VALUES
(1510, 'เสื้อผู้ชาย พิมพ์ตัวอักษร สีเหลือง ไม่เป็นทางการ', 'สไตล์:	เพร็พพี่ สี:	สีเหลือง ประเภทรูปแบบ:	พิมพ์ตัวอักษร ความยาวแขนเสื้อ:	แขนสั้น ประเภทแขนเสื้อ:	แขนธรรมดา ฤดู:	ฤดูร้อน ส่วนประกอบ:	100% เส้นใยสังเคราะห์ วัสดุ:	เส้นใยสังเคราะห์ ผ้า:	ยืดเล็กน้อย ', 390, 'ยืด', 50, 24, 63, 42, '15756247984fe0d57f8f185d8ce0caad27fa7f4fa7_thumbnail_900x (1).webp', 5),
(1511, 'เสื้อผู้ชาย ทางเรขาคณิต ขาว ไม่เป็นทางการ', 'สไตล์:	เพร็พพี่ สี:	ขาว ประเภทรูปแบบ:	ทางเรขาคณิต, พิมพ์ตัวอักษร  ส่วนประกอบ:	65% ฝ้าย, 35% เส้นใยสังเคราะห์ วัสดุ:	ฝ้าย ผ้า:	ยืดเล็กน้อย', 390, 'ยืด', 25, 30, 68, 22, '157664620723e90c866ca18c9f2ac24a80b65fc83f_thumbnail_900x.webp', 5),
(1512, 'เสื้อผู้ชาย เย็บปักถักร้อย สัตว์ สีชมพู ไม่เป็นทางการ', 'สไตล์:	ไม่เป็นทางการ สี:	สีชมพู, สีอ่อน ประเภทรูปแบบ:	สัตว์  ส่วนประกอบ:	100% ฝ้าย วัสดุ:	ฝ้าย ผ้า:	ยืดเล็กน้อย', 350, 'ยืด', 50, 24, 63, 42, '1576809092b5345b80567ab9a30e4ac7b8890287cf_thumbnail_900x.webp', 5),
(1513, 'เสื้อเชิ้ตผู้ชาย เผ่า ขาว ไม่เป็นทางการ', 'สไตล์:	ไม่เป็นทางการ สี:	ขาว  ประเภทเสื้อเชิ้ต:	เสื้อเชิ้ต ความยาวแขนเสื้อ:	แขนสั้น ส่วนประกอบ:	42% ฝ้าย, 58% เส้นใยสังเคราะห์ วัสดุ:	ผสมผ้าฝ้าย ผ้า:	ไม่ยืด ', 490, 'เชิ้ต', 20, 5, 77, 42, '1575097212977751a959de9fab91dbf1e823425a40_thumbnail_900x.webp', 5),
(1514, 'เสื้อเชิ้ตผู้ชาย กราฟฟิค มัลติคัลเลอร์ ไม่เป็นทางการ', 'สไตล์:	ไม่เป็นทางการ สี:	มัลติคัลเลอร์ ประเภทรูปแบบ:	กราฟฟิค ส่วนประกอบ:	42% ฝ้าย, 58% เส้นใยสังเคราะห์ วัสดุ:	ผสมผ้าฝ้าย', 490, 'เชิ้ต', 58, 57, 24, 65, '157595682190638c63589f72f1b4d605589e3f0715_thumbnail_900x.webp', 5),
(1515, 'เสื้อโปโลผู้ชาย บล็อกสี มัลติคัลเลอร์ ไม่เป็นทางการ', 'สไตล์:	ไม่เป็นทางการ สี:	มัลติคัลเลอร์ ประเภทรูปแบบ:	บล็อกสี คอเสื้อ:	คอโปโล ความยาว:	ประจำ ความยาวแขนเสื้อ:	แขนสั้น ประเภทแขนเสื้อ:	แขนธรรมดา ฤดู:	ฤดูร้อน', 550, 'โปโล', 150, 157, 215, 48, '1576824368f2c411212e81400bafc7af5a514822fb_thumbnail_900x.webp', 5),
(1516, 'เสื้อโปโลผู้ชาย บล็อกสี มัลติคัลเลอร์ ไม่เป็นทางการ', 'สไตล์:	ไม่เป็นทางการ สี:	มัลติคัลเลอร์ ประเภทรูปแบบ:	บล็อกสี คอเสื้อ:	คอโปโล ความยาว:	ประจำ ความยาวแขนเสื้อ:	แขนสั้น ประเภทแขนเสื้อ:	แขนธรรมดา', 550, 'โปโล', 69, 54, 354, 413, '15758692869a7f6e38ef0820145593dde7104f3a49_thumbnail_900x.webp', 5),
(1517, 'กางเกงขาสั้นผู้ชาย กระเป๋าเสื้อ ทรอปิคอล ดำและขาว โบโฮ', 'สไตล์:	ไม่เป็นทางการ สี:	มัลติคัลเลอร์ ประเภทรูปแบบ:	บล็อกสี รายละเอียด:	เชือก ประเภทกางเกง:	กางเกงกีฬาขาสั้น ฤดู:	ฤดูร้อน', 450, 'ขาสั้น', 50, 24, 63, 42, '15754339063493ac76a655fab51f2e88d38a678d5f_thumbnail_900x.webp', 5),
(1518, 'กางเกงผู้ชาย ปุ่ม เรียบง่าย สีน้ำเงินเข้ม ไม่เป็นทางการ', 'สไตล์:	งาน สี:	สีน้ำเงินเข้ม ประเภทรูปแบบ:	เรียบง่าย รายละเอียด:	เสริม, ปุ่ม, กระเป๋าเสื้อ, ซิป ความยาวของกางเกง:	ยาว ประเภทกางเกง:	กางเกงสูท ฤดู:	ทั้งหมด', 790, 'ชิโน', 63, 85, 24, 56, '15755124719fe0bd2e862cba339ff89ac0123620b6_thumbnail_900x.webp', 5),
(1519, 'กางเกงผู้ชาย ปุ่ม เรียบง่าย สีเทา ไม่เป็นทางการ', 'สไตล์:	เพร็พพี่ สี:	สีเทา ประเภทรูปแบบ:	เรียบง่าย รายละเอียด:	ปุ่ม, กระเป๋าเสื้อ, ซิป ความยาวของกางเกง:	กางเกง7ส่วน ประเภทกางเกง:	กางเกงสูท ฤดู:	ฤดูใบไม้ผลิ / ฤดูร้อน / ฤดูใบไม้ร่วง', 950, 'ชิโน', 50, 63, 55, 72, '1576896165ba1c31e56b9a659fea8e5042ca992f1e_thumbnail_900x.webp', 5),
(1520, 'กางเกงผู้ชาย กระเป๋าเสื้อ เรียบง่าย สีดำ ไม่เป็นทางการ', 'สไตล์:	งาน สี:	สีดำ ประเภทรูปแบบ:	เรียบง่าย รายละเอียด:	เข็มขัด, กระเป๋าเสื้อ, ซิป ความยาวของกางเกง:	ยาว ประเภทกางเกง:	กางเกงสูท ฤดู:	ฤดูใบไม้ผลิ / ฤดูร้อน / ฤดูใบไม้ร่วง', 890, 'ชิโน', 58, 5, 24, 20, '157629449703bfed3f8748ad626e15c97953fb70c4_thumbnail_900x.webp', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `userType` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(11) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `tumbon` varchar(50) NOT NULL,
  `amphur` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `postCode` int(6) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `userType`, `fname`, `lname`, `email`, `password`, `birthday`, `gender`, `tel`, `address`, `tumbon`, `amphur`, `province`, `postCode`, `picture`) VALUES
(2, 'admin', 'padrada', 'Promkijjanon', 'padrada.ttpp@gmail.com', '2851919e56ad5f6c04f0f2131d67f4a4', '2001-09-04', 'หญิง', '0626533564', '38/5 ม.5', 'พระประโทน', 'จังหวัด', 'จังหวัด', 73000, 'pro.jpg'),
(3, 'customer', 'Thanachit', 'Boonkoed', 'plor098890@gmail.com', '83d43c091545e847dd8e1e8e2e5cd317', '2000-07-28', 'ชาย', '0626533564', '154/2 ม.3', 'พระประโทน', 'เมือง', 'นครปฐม', 73000, '0.jpg'),
(4, 'customer', 'tukk', 'taa', 'tukta_ttpp@hotmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2001-09-04', 'หญิง', '0626533564', '38/5 ม.5', 'พระประโทน', 'เมือง', 'นครปฐม', 73000, '0.jpg'),
(6, 'customer', 'Padrada', 'tuktuk', 'ttt@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '2020-02-25', 'หญิง', '0626533564', '38/5 ม.5', 'พระประโทน', 'เมือง', 'นครปฐม', 73000, '0.jpg'),
(7, 'customer', 'tukk', 'taa', 'tukta@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2001-09-04', 'หญิง', '0626533564', '154/2 ม.3', 'พระประโทน', 'เมือง', 'นครปฐม', 73000, '0.jpg'),
(8, 'customer', 'ธนชิต', 'บุญเกิด', 'plor098890@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '2000-07-28', 'ชาย', '0648051087', '38 ม.12', 'โพรงมะเดื่อ', 'เมือง', 'นครปฐม', 73000, '0.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordercheckout`
--
ALTER TABLE `ordercheckout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderproduct`
--
ALTER TABLE `orderproduct`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ordercheckout`
--
ALTER TABLE `ordercheckout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orderproduct`
--
ALTER TABLE `orderproduct`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1521;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
