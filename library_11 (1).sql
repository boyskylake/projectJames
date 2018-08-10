-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 04, 2018 at 08:51 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_11`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `Activities_id` int(11) NOT NULL,
  `Activities_library` varchar(50) NOT NULL,
  `Activities_subject` varchar(200) NOT NULL,
  `Activities_information` varchar(255) NOT NULL,
  `Activities_date` date NOT NULL,
  `Activities_ write` varchar(50) NOT NULL,
  `Activities_form` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`Activities_id`, `Activities_library`, `Activities_subject`, `Activities_information`, `Activities_date`, `Activities_ write`, `Activities_form`) VALUES
(1, 'ljjhglgglhk;', 'wrtytyrty', 'rtyertyertye', '0000-00-00', 'rtertyertrt', 'tyrtyretyertyert');

-- --------------------------------------------------------

--
-- Table structure for table `authorities`
--

CREATE TABLE `authorities` (
  `authorities_id` int(13) NOT NULL,
  `Activities_library` varchar(50) NOT NULL,
  `authorities_user` varchar(200) NOT NULL,
  `authorities_password` varchar(50) NOT NULL,
  `authorities_prefix` varchar(50) NOT NULL,
  `authorities_name` varchar(50) NOT NULL,
  `authorities_sex` varchar(10) NOT NULL,
  `authorities_date` int(10) NOT NULL,
  `authorities_Month` int(10) NOT NULL,
  `authorities_Year` int(10) NOT NULL,
  `authorities_age` varchar(10) NOT NULL,
  `authorities_career` varchar(50) NOT NULL,
  `authorities_address` varchar(255) NOT NULL,
  `authorities_province` varchar(50) NOT NULL,
  `authorities_zipCode` varchar(50) NOT NULL,
  `authorities_phone1` varchar(10) NOT NULL,
  `authorities_phone2` varchar(10) NOT NULL,
  `authorities_contact` varchar(255) NOT NULL,
  `authorities_mail` varchar(100) NOT NULL,
  `authorities_form` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authorities`
--

INSERT INTO `authorities` (`authorities_id`, `Activities_library`, `authorities_user`, `authorities_password`, `authorities_prefix`, `authorities_name`, `authorities_sex`, `authorities_date`, `authorities_Month`, `authorities_Year`, `authorities_age`, `authorities_career`, `authorities_address`, `authorities_province`, `authorities_zipCode`, `authorities_phone1`, `authorities_phone2`, `authorities_contact`, `authorities_mail`, `authorities_form`) VALUES
(1, 'กศน.อำเภอเมืองสกลนคร', 'james', '', 'นาย', 'พงษ์นรินทร์ ท้ายปาก', '1', 29, 5, 39, '', '5', 'vbncvbn', 'cvbncbc', 'cvbnc', '', '', 'cvbncvbncvbn', 'cvbncvbncvbn', '74843185820180722_124929.jpg'),
(2, '[ ] เลือกห้องสมุด', 'james12', '12345', 'นาย', 'พงษ์นรินทร์ ท้ายปาก', '', 29, 5, 25, '', 'ไม่ระบุอาชีพ', 'zczxc', 'zxczxczxc', 'ZXCXZ', '', '', 'dfgdfgdf', 'gdfgdfg', '19367212720180727_033143.jpg'),
(4, 'กศน.อำเภอกุดบาก', 'james123', '', 'นาย', 'พงษ์นรินทร์ ท้ายปาก', 'อื่นๆ', 29, 5, 2539, '', '1', 'vbncvbn', 'cvbncbc', 'cvbnc', '4546456456', '4564564564', 'werwerwerwer', 'werwerwer', '51422057820180722_132415.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(12) NOT NULL,
  `book_BooksCode` varchar(12) NOT NULL,
  `book_Library` varchar(100) NOT NULL,
  `book_ReceivedDate` date NOT NULL,
  `book_NounPrefix` varchar(50) NOT NULL,
  `book_Author` varchar(50) NOT NULL,
  `book_Alias` varchar(50) NOT NULL,
  `book_Translator` varchar(100) NOT NULL,
  `book_Penname` varchar(50) NOT NULL,
  `book_BookName` varchar(200) NOT NULL,
  `book_Bookname1` varchar(200) NOT NULL,
  `book_BookNumber` varchar(50) NOT NULL,
  `book_MainCategory` varchar(200) NOT NULL,
  `book_Subjects` varchar(200) NOT NULL,
  `book_Initials` varchar(200) NOT NULL,
  `book_BookSet` varchar(200) NOT NULL,
  `book_Publisher` varchar(200) NOT NULL,
  `book_Print` varchar(10) NOT NULL,
  `book_Price` varchar(10) NOT NULL,
  `book_NumberOfPages` varchar(10) NOT NULL,
  `book_PublishedYear` varchar(10) NOT NULL,
  `book_BookNumber1` varchar(10) NOT NULL,
  `book_Heading1` varchar(200) NOT NULL,
  `book_Heading2` varchar(200) NOT NULL,
  `book_Heading3` varchar(200) NOT NULL,
  `book_ISBN` varchar(50) NOT NULL,
  `book_BookSize` varchar(50) NOT NULL,
  `book_No` varchar(50) NOT NULL,
  `book_Source` varchar(50) NOT NULL,
  `book_StorageLocation` varchar(50) NOT NULL,
  `book_Picture` varchar(100) NOT NULL,
  `book_DateOfIssue` date NOT NULL,
  `book_Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_BooksCode`, `book_Library`, `book_ReceivedDate`, `book_NounPrefix`, `book_Author`, `book_Alias`, `book_Translator`, `book_Penname`, `book_BookName`, `book_Bookname1`, `book_BookNumber`, `book_MainCategory`, `book_Subjects`, `book_Initials`, `book_BookSet`, `book_Publisher`, `book_Print`, `book_Price`, `book_NumberOfPages`, `book_PublishedYear`, `book_BookNumber1`, `book_Heading1`, `book_Heading2`, `book_Heading3`, `book_ISBN`, `book_BookSize`, `book_No`, `book_Source`, `book_StorageLocation`, `book_Picture`, `book_DateOfIssue`, `book_Status`) VALUES
(10, '1', 'กศน.อำเภอเมืองสกลนคร', '0000-00-00', '2', '3', '4', '5', '6', '7', '8', '9', '[ ] ไม่ใส่หมวดหมู่', '[ ] ไม่ใส่หมวดหมู่', '10', '11', '12', '12', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '', '', '213777603920180721_165539', '0000-00-00', '0'),
(11, '1', 'กศน.อำเภอเมืองสกลนคร', '0000-00-00', '2', '3', '4', '5', '6', '7', '8', '9', '[ 02 ] ศาสนา', '[ 0210 ] ศาสนาธรรมชาติ', '10', '11', '12', '12', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', 'งบประมาณ', 'ตู้ หมวด 200', '128639359020180723_021821.jpg', '2018-07-23', 'ปกติ'),
(14, '', 'กศน.อำเภอเมืองสกลนคร', '2018-07-19', '', '', '', '', '', '', '', '', 'ศาสนา', 'fgjkghjkhjkh', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'งบประมาณ', 'ตู้ หมวด 900', '149327268220180721_171229.jpg', '2018-07-25', 'ปกติ'),
(15, '', 'กศน.อำเภอภูพาน', '0000-00-00', '', '', '', '', '', '', '', '', '[ 03 ] สังคม', '[ 0310 ] สถิติ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'กรุณาระบุ แหล่งที่มา', 'ไม่ใส่รหัสสถานที่', '60057781820180723_141943.jpg', '2018-07-23', 'ปกติ');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(11) NOT NULL,
  `categories_book` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_book`) VALUES
(2, '[ 0000 ] เบ็ดเตล็ดหรือความรู้ทั่วไป'),
(3, '[ 0010 ] บรรณานุกรม'),
(4, '[ 0020 ] บรรณารักษ์ศาสตร์ และสารนิเทศศาสตร์'),
(5, '[ 0030 ] สารานุกรมไทยทั่วไป'),
(6, '[ 0040 ] ความเรียงทั่วไป'),
(7, '[ 0050 ] วารสารทั่วไป'),
(8, '[ 0060 ] สมาคมและพิพิธภัณฑ์ทั่วไป'),
(9, '[ 0070 ] วารสารศาสตร์ การพิมพ์ หนังสือพิมพ์'),
(10, '[ 0080 ] ชุมนุมนิพนธ์'),
(11, '[ 0090 ] ต้นฉบับตัวเขียนและหนังสือหายาก'),
(12, '[ 0100 ] ปรัชญา'),
(13, '[ 0110 ] อภิปรัชญา'),
(14, '[ 0120 ] ความรู้ในด้านปรัชญา'),
(15, '[ 0130 ] จิตวิทยาสาขาต่าง ๆ'),
(16, '[ 0140 ] ปรัชญาระบบต่าง ๆ'),
(17, '[ 0150 ] จิตวิทยา'),
(18, '[ 0160 ] ตรรกวิทยา'),
(19, '[ 0170 ] จริยศาสตร์'),
(20, '[ 0180 ] ปรัชญาตะวันออก ปรัชญาสมัยกลางและสมัยโบราณ'),
(21, '[ 0190 ] ปรัชญาสมัยปัจจุบัน'),
(22, '[ 0200 ] ศาสนา'),
(23, '[ 0210 ] ศาสนาธรรมชาติ'),
(24, '[ 0220 ] คัมภีร์ไบเบิล'),
(25, '[ 0230 ] เทววิทยาเชิงคริสต์ศาสตร์'),
(26, '[ 0240 ] เทววิทยาเชิงปฏิบัติ'),
(27, '[ 0250 ] เทววิทยาเกี่ยวกับบรรพชิต'),
(28, '[ 0260 ] เทววิทยาทางการศาสนา'),
(29, '[ 0270 ] ประวัติศาสตร์ศาสนาในประเทศต่าง ๆ'),
(30, '[ 0280 ] คริสต์ศาสนาและนิกายต่าง ๆ'),
(31, '[ 0290 ] ศาสนาอื่น ๆ ที่ไม่ใช่คริสต์ศาสนา ศาสนาเปรียบเทียบ'),
(32, '[ 0300 ] สังคมศาสตร์'),
(33, '[ 0310 ] สถิติ'),
(34, '[ 0320 ] รัฐศาสตร์'),
(35, '[ 0330 ] เศรษฐศาสตร์'),
(36, '[ 0340 ] กฎหมาย'),
(37, '[ 0350 ] รัฐประศาสนศาสตร์'),
(38, '[ 0360 ] สวัสดิภาพสังคม'),
(39, '[ 0370 ] การศึกษา'),
(40, '[ 0380 ] การพานิชย์'),
(41, '[ 0390 ] ขนบธรรมเนียมประเพณี นิทานพื้นเมือง'),
(42, '[ 0400 ] ภาษา'),
(43, '[ 0410 ] ภาษาศาสตร์'),
(44, '[ 0420 ] ภาษาอังกฤษ'),
(45, '[ 0430 ] ภาษาเยอรมัน'),
(46, '[ 0440 ] ภาษาฝรั่งเศส'),
(47, '[ 0450 ] ภาษาอิตาเลียน'),
(48, '[ 0460 ] ภาษาสเปนและโปรตุเกส'),
(49, '[ 0470 ] ภาษาลาติน'),
(50, '[ 0480 ] ภาษากรีก'),
(51, '[ 0490 ] ภาษาอื่น ๆ'),
(52, '[ 0500 ] วิทยาศาสตร์'),
(53, '[ 0510 ] คณิตศาสตร์'),
(54, '[ 0520 ] ดาราศาสตร์'),
(57, '[ 0530 ] ฟิสิกส์'),
(58, '[ 0540 ] เคมี'),
(59, '[ 0550 ] ศาสตร์ว่าด้วยพื้นโลก'),
(60, '[ 0560 ] ชีววิทยา'),
(61, '[ 0570 ] วิทยาศาสตร์ชีวภาพ'),
(62, '[ 0580 ] พฤกษศาสตร์'),
(63, '[ 0590 ] สัตววิทยา'),
(64, '[ 0600 ] วิทยาศาสตร์ประยุกต์ หรือเทคโนโลยี'),
(65, '[ 0610 ] แพทยศาสตร์'),
(66, '[ 0620 ] วิศวกรรมศาสตร์'),
(67, '[ 0630 ] เกษตรศาสตร์'),
(68, '[ 0640 ] คหกรรมศาสตร์'),
(69, '[ 0650 ] บริหารธุรกิจ'),
(70, '[ 0660 ] อุตสาหกรรมเคมี'),
(71, '[ 0670 ] โรงงานอุตสาหกรรม'),
(72, '[ 0680 ] สินค้าที่ผลิตจากเครื่องจักร'),
(73, '[ 0690 ] การก่อสร้าง'),
(74, '[ 0700 ] ศิลปกรรมและการบันเทิง'),
(75, '[ 0710 ] สถาปัตยกรรมนอกอาคาร'),
(76, '[ 0720 ] สถาปัตยกรรม'),
(77, '[ 0730 ] ประติมากรรม'),
(78, '[ 0740 ] มัณฑนศิลป และการวาดเขียน'),
(79, '[ 0750 ] จิตรกรรม'),
(80, '[ 0760 ] การจำลองภาพจิตรกรรม'),
(81, '[ 0770 ] การถ่ายรูปและถ่ายภาพ'),
(82, '[ 0780 ] ดนตรี'),
(83, '[ 0790 ] การบันเทิงและการแสดง'),
(84, '[ 0800 ] วรรณคดี'),
(85, '[ 0810 ] วรรณคดีอเมริกัน'),
(86, '[ 0820 ] วรรณคดีอังกฤษ'),
(87, '[ 0830 ] วรรณคดีเยอรมัน'),
(88, '[ 0840 ] วรรณคดีฝรั่งเศส'),
(89, '[ 0850 ] วรรณคดีอิตาเลียน'),
(90, '[ 0860 ] วรรณคดีสเปนและโปรตุเกส'),
(91, '[ 0870 ] วรรณคดีละติน'),
(92, '[ 0880 ] วรรณคดีกรีก'),
(93, '[ 0890 ] วรรณคดีภาษาอื่น ๆ'),
(94, '[ 0900 ] ภูมิศาสตร์ ประวัติศาสตร์'),
(95, '[ 0910 ] ภูมิศาสตร์และการท่องเที่ยว'),
(96, '[ 0920 ] ชีวประวัติและสกุลวงศ์'),
(97, '[ 0930 ] ประวัติศาสตร์สมัยโบราณ'),
(98, '[ 0940 ] ประวัติศาสตร์ยุโรป'),
(99, '[ 0950 ] ประวัติศาสตร์ทวีปเอเซีย'),
(100, '[ 0960 ] ประวัติศาสตร์ทวีปแอฟริกา'),
(101, '[ 0970 ] ประวัติศาสตร์อเมริกาเหนือ'),
(102, '[ 0980 ] ประวัติศาสตร์อเมริกาใต้'),
(103, '[ 0990 ] ประวัติศาสตร์ส่วนอื่น ๆ ของโลก บริเวณนอกโลก'),
(104, '[ 1100 ] แบบเรียน กศน. ระดับประถมศึกษา'),
(105, '[ 1200 ] แบบเรียน กศน. ระดับมัธยมศึกษาตอนต้น'),
(106, '[ 1300 ] แบบเรียน กศน. ระดับมัธยมศึกษาตอนปลาย'),
(107, '[ 1400 ] แบบเรียน กศน. ระดับอื่น ๆ'),
(108, '[ 2000 ] อ้างอิง หมวด 000 เบ็ดเตล็ด'),
(109, '[ 2010 ] อ้างอิง หมวด 100 ปรัชญา'),
(110, '[ 2020 ] อ้างอิง หมวด 200 ศาสนา'),
(111, '[ 2030 ] อ้างอิง หมวด 300 สังคมศาสตร์'),
(112, '[ 2040 ] อ้างอิง หมวด 400  ภาษาศาสตร์'),
(113, '[ 2050 ] อ้างอิง หมวด 500 วิทยาศาสตร์'),
(114, '[ 2060 ] อ้างอิง หมวด 600 วิทยาศาสตร์ประยุกต์'),
(115, '[ 2070 ] อ้างอิง หมวด 700 ศิลปกรรมและการบันเทิง'),
(116, '[ 2080 ] อ้างอิง หมวด 800  วรรณคดี'),
(117, '[ 2090 ] อ้างอิง หมวด 900 ภูมิศาสตร ์ ประวัติศาสตร์'),
(118, '[ 3000 ] นวนิยาย'),
(119, '[ 3100 ] เรื่องสั้น'),
(120, '[ 3200 ] หนังสือแปล'),
(121, '[ 3300 ] หนังสือเยาวชน'),
(122, '[ 3400 ] เอกสาร มสธ.'),
(123, '[ 3500 ] เอกสาร ม.รามคำแหง'),
(124, '[ 3600 ] พ๊อกเก็ตบุ๊ค');

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `information_id` int(11) NOT NULL,
  `information_library` varchar(50) NOT NULL,
  `information_history` varchar(250) NOT NULL,
  `information_philosophy` varchar(255) NOT NULL,
  `information_vision` varchar(255) NOT NULL,
  `information_mission` varchar(255) NOT NULL,
  `information_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`information_id`, `information_library`, `information_history`, `information_philosophy`, `information_vision`, `information_mission`, `information_data`) VALUES
(2, 'ห้องสมุดประชาชน กศน. อำเภอเมืองสกลนคร', 'xvbxcvbxvb', 'fhdghfgh', 'dfghdfghdfgh', 'dfghdfghdfghd', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `Library_id` int(11) NOT NULL,
  `Library_Library` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`Library_id`, `Library_Library`) VALUES
(1, 'กศน.อำเภอเมืองสกลนคร'),
(2, 'กศน.อำเภอภูพาน'),
(3, 'กศน.อำเภอกุดบาก'),
(4, 'กศน.อำเภอกุสุมาลย์'),
(5, 'กศน.อำเภอคำตากล้า'),
(6, 'กศน.อำเภอโคกศรีสุพรรณ'),
(7, 'กศน.อำเภอเต่างอย'),
(8, 'กศน.อำเภอบ้านม่วง'),
(9, 'กศน.อำเภอพรรณานิคม'),
(10, 'กศน.อำเภอพังโคน'),
(11, 'กศน.อำเภอวานรนิวาส'),
(12, 'กศน.อำเภอวาริชภูมิ'),
(13, 'กศน.อำเภอสว่างแดนดิน'),
(14, 'กศน.อำเภอส่องดาว'),
(15, 'กศน.อำเภออากาศอำนวย'),
(16, 'กศน.อำเภอเจริญศิลป์'),
(17, 'กศน.อำเภอนิคมน้ำอูน'),
(18, 'กศน.อำเภอโพนนาแก้ว');

-- --------------------------------------------------------

--
-- Table structure for table `maincategory`
--

CREATE TABLE `maincategory` (
  `MainCategory_id` int(11) NOT NULL,
  `MainCategory_book` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `maincategory`
--

INSERT INTO `maincategory` (`MainCategory_id`, `MainCategory_book`) VALUES
(2, '[ 00 ] เบ็ดเตล็ด หรือ ความรู้ทั่วไป'),
(3, '[ 01 ] ปรัชญา'),
(4, '[ 02 ] ศาสนา'),
(5, '[ 03 ] สังคม'),
(8, '[ 04 ] ภาษา'),
(9, '[ 05 ] วิทยาศาสตร์'),
(10, '[ 06 ] วิทยาศาสตร์ประยุกต์ หรือเทคโนโลยี'),
(11, '[ 07 ] ศิลปกรรมและการบันเทิง'),
(12, '[ 08 ] วรรณคดี'),
(13, '[ 09 ] ภูมิศาสตร์ ประวัติศาสตร์'),
(14, '[ 11 ] แบบเรียน กศน. ระดับประถมศึกษา'),
(16, '[ 12 ] แบบเรียน กศน. ระดับมัธยมศึกษาตอนตน'),
(17, '[ 13 ] แบบเรียน กศน. ระดับมัธยมศึกษาตอนปลาย'),
(18, '[ 14 ] แบบเรียน กศน. ระดับอื่น ๆ'),
(19, '[ 20 ] อ้างอิง'),
(20, '[ 31 ] เรื่องสั้น'),
(21, '[ 32 ] เรื่องแปล'),
(22, 'คำแหง'),
(23, 'พ็อกเก็ตบุ๊ค');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `member_Library` varchar(50) NOT NULL,
  `member_user` varchar(50) NOT NULL,
  `member_Password` int(50) NOT NULL,
  `member_Prefix` varchar(10) NOT NULL,
  `member_Name` varchar(50) NOT NULL,
  `member_sex` varchar(10) NOT NULL,
  `member_day` int(11) NOT NULL,
  `member_Month` int(11) NOT NULL,
  `member_year` int(11) NOT NULL,
  `member_Age` int(11) NOT NULL,
  `member_Education` varchar(50) NOT NULL,
  `member_career` varchar(100) NOT NULL,
  `member_HouseNumber` varchar(200) NOT NULL,
  `member_province` varchar(255) NOT NULL,
  `member_Zip` int(10) NOT NULL,
  `member_Phone1` int(10) NOT NULL,
  `member_Phone2` int(10) NOT NULL,
  `member_EasyContact` varchar(200) NOT NULL,
  `member_MembershipType` varchar(50) NOT NULL,
  `member_Registration` date NOT NULL,
  `member_ExpiredDate` date NOT NULL,
  `member_Email` varchar(100) NOT NULL,
  `member_Image` varchar(100) NOT NULL,
  `member_Parent` varchar(100) NOT NULL,
  `member_Relationship` varchar(100) NOT NULL,
  `member_Contact` varchar(200) NOT NULL,
  `member_Telephone` int(10) NOT NULL,
  `member_Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member_Library`, `member_user`, `member_Password`, `member_Prefix`, `member_Name`, `member_sex`, `member_day`, `member_Month`, `member_year`, `member_Age`, `member_Education`, `member_career`, `member_HouseNumber`, `member_province`, `member_Zip`, `member_Phone1`, `member_Phone2`, `member_EasyContact`, `member_MembershipType`, `member_Registration`, `member_ExpiredDate`, `member_Email`, `member_Image`, `member_Parent`, `member_Relationship`, `member_Contact`, `member_Telephone`, `member_Status`) VALUES
(3, 'กศน.อำเภอภูพาน', '', 1234, '', '', '', 0, 0, 25, 0, '', '', '', '', 0, 0, 0, '', '', '0000-00-00', '0000-00-00', '', '172671962820180722_154328.jpg', '', '', '', 0, ''),
(4, '', '1101800817719', 9999, 'นาย', 'พงษ์นรินทร์ ท้ายปาก', '', 29, 5, 2539, 0, '', '', 'zhfghfghd', 'dfghdfghdfghdgh', 49110, 981164971, 0, 'zsdgfgdsfg', '', '2018-07-22', '0000-00-00', '', '11571300920180727_025323.jpg', '', '', '', 0, 'ใช้งาน'),
(6, '', 'james', 1234, '', '', '', 0, 0, 25, 0, '', '', '', '', 0, 0, 0, '', '', '2018-07-27', '2019-07-27', '', '81763269620180727_023317.jpg', '', '', '', 2147483647, 'ใช้งาน');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `News_id` int(11) NOT NULL,
  `News_library` varchar(50) NOT NULL,
  `News_subject` varchar(200) NOT NULL,
  `News_information` varchar(255) NOT NULL,
  `News_date` date NOT NULL,
  `News_write` varchar(50) NOT NULL,
  `News_form` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`News_id`, `News_library`, `News_subject`, `News_information`, `News_date`, `News_write`, `News_form`) VALUES
(6, 'อำเภอเมือง', 'cvbnxcvnbn', 'vnvmvbnm', '0000-00-00', 'ghjghjgh', '179582879620180720_160455.jpg'),
(9, 'อำเภอเมือง', 'cvbnxcvnbn', 'vnvmvbnm', '2018-07-20', 'xcbxcvbcvnbcvvnm', '83676461620180720_162334.jpg'),
(12, 'กศน.อำเภอเมืองสกลนคร', 'cvbnxcvnbn', 'vnvmvbnm', '2018-07-10', 'ghjghjgh', '135111320820180722_045705.jpg'),
(16, 'กศน.อำเภอเต่างอย', 'cvbnxcvnbn', 'fggdfgdfgdg', '2018-07-12', 'dfgdfgdfgd', '122979037720180723_033559.jpg'),
(17, 'กศน.อำเภอกุดบาก', 'zfgdhdgfhdgjh', 'fghkhjkghjkgjk', '2018-07-25', 'gioiouiouioui', '193945207920180723_153625.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

CREATE TABLE `personnel` (
  `personnel_id` int(11) NOT NULL,
  `personnel_library` varchar(50) NOT NULL,
  `personnel_name` varchar(100) NOT NULL,
  `personnel_position` varchar(100) NOT NULL,
  `personnel_telephone` varchar(10) NOT NULL,
  `personnel_date` date NOT NULL,
  `personnel_form` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personnel`
--

INSERT INTO `personnel` (`personnel_id`, `personnel_library`, `personnel_name`, `personnel_position`, `personnel_telephone`, `personnel_date`, `personnel_form`) VALUES
(1, 'sadfsdfsdfsf', 'ดเ้ดเ้', 'ดเ้ดเ้', 'ด้ดเ้ดเ้', '2018-07-19', '163128168220180720_180252.jpg'),
(3, 'sdfsdfafsdf', 'เ้่เ้่', 'เ้่เ้่เ้่', 'นนรนวรนว', '2018-07-19', '90666244420180720_181739.jpg'),
(4, 'กศน.อำเภอคำตากล้า', 'cghfghjghj', 'fghjfghjfhg', 'fhjfhjfhjg', '2018-07-24', '105872655120180723_041928.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`Activities_id`);

--
-- Indexes for table `authorities`
--
ALTER TABLE `authorities`
  ADD PRIMARY KEY (`authorities_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`information_id`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`Library_id`);

--
-- Indexes for table `maincategory`
--
ALTER TABLE `maincategory`
  ADD PRIMARY KEY (`MainCategory_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`News_id`);

--
-- Indexes for table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`personnel_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `Activities_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `authorities`
--
ALTER TABLE `authorities`
  MODIFY `authorities_id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `information_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `Library_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `maincategory`
--
ALTER TABLE `maincategory`
  MODIFY `MainCategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `News_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `personnel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
