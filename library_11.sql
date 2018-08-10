-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2018 at 04:48 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(10) NOT NULL,
  `a_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `a_unm` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `a_pwd` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_name`, `a_unm`, `a_pwd`) VALUES
(1, 'auttapong nitee', 'admin', '123456'),
(2, 'test  test', 'admin1', '123456');

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
(1, 'กศน.อำเภอเมืองสกลนคร', 'james', '12345', 'นาย', 'พงษ์นรินทร์ ท้ายปาก', '1', 29, 5, 39, '', '5', 'vbncvbn', 'cvbncbc', 'cvbnc', '', '', 'cvbncvbncvbn', 'cvbncvbncvbn', '74843185820180722_124929.jpg'),
(4, 'กศน.อำเภอกุดบาก', 'james123', '', 'นาย', 'พงษ์นรินทร์ ท้ายปาก', 'อื่นๆ', 29, 5, 2539, '', '1', 'vbncvbn', 'cvbncbc', 'cvbnc', '4546456456', '4564564564', 'werwerwerwer', 'werwerwer', '51422057820180722_132415.jpg'),
(6, 'กศน.อำเภอพังโคน', '2776378637837', '123456', '123456', 'staff', '', 6, 4, 25, '', 'นักเรียน,นักศึกษา', '587783872872782782', 'นครพนม', '48150', '0957195867', 'โทรศัพท์ 3', 'sadasdasdasdas', 'asdasdasdasdasd', '180879749720180810_0822310'),
(7, 'กศน.อำเภอเมืองสกลนคร', 'staff', '123456', 'นาย', 'auttapo ng nitee', '', 6, 4, 25, '', '', '587783872872782782', 'นครพนม', '48150', '0957195867', '', 'sdfasdfasdfsadf', '', '135610598820180810_082319.jpg');

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
(10, '1', 'กศน.อำเภอเมืองสกลนคร', '0000-00-00', '2', '3', '4', '5', '6', '7', '8', '9', '[ 00 ] เบ็ดเตล็ด หรือ ความรู้ทั่วไป', '[ 0000 ] เบ็ดเตล็ดหรือความรู้ทั่วไป', '10', '11', '12', '12', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '', '', '131619081020180810_094159.jpg', '0000-00-00', 'ปกติ'),
(11, '1', 'กศน.อำเภอเมืองสกลนคร', '0000-00-00', '2', '3', '4', '5', '6', '7', '8', '9', '[ 02 ] ศาสนา', '[ 0210 ] ศาสนาธรรมชาติ', '10', '11', '12', '12', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', 'งบประมาณ', 'ตู้ หมวด 200', '46690168620180810_094318.png', '2018-07-23', 'ปกติ'),
(14, '', 'กศน.อำเภอวาริชภูมิ', '2018-07-19', '', '', '', '', '', '', '', '', '[ 00 ] เบ็ดเตล็ด หรือ ความรู้ทั่วไป', '[ 0000 ] เบ็ดเตล็ดหรือความรู้ทั่วไป', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'ไม่ใส่รหัสสถานที่', '16820288820180810_094327.png', '2018-07-25', 'ปกติ'),
(15, '', 'กศน.อำเภอภูพาน', '0000-00-00', '', '', '', '', '', '', '', '', '[ 03 ] สังคม', '[ 0310 ] สถิติ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'ไม่ใส่รหัสสถานที่', '174814157220180810_064143.jpg', '2018-07-23', 'ปกติ'),
(17, 'รหัสหนังสือ', 'กศน.อำเภอบ้านม่วง', '0000-00-00', 'คำนำหน้านาม', 'นามผู้แต่ง', 'นามแฝง ', 'นามผู้แปล', 'นามปากกา ', 'ชื่อหนังสือ', 'ชื่อหนังสือ (ต่อ)', 'เลขที่หมู่หนังสือ', 'asdad123', 'testtt', 'ชื่อย่อผู้แต่ง/เลขที่/ชื่อย่อหนังสือ', 'ชื่อชุดหนังสือ :	', 'ชื่อสำนักพิมพ์ :	', 'ครั้ง', 'ราคา ', 'จำนวน', ' ปีพ', 'พิมพ์', 'หัวเรื่อง (1)', 'หัวเรื่อง (2)', 'หัวเรื่อง (3)', 'ISBN', 'ขนาดห', ' ฉบับที่ ', 'งบประมาณ', 'ตู้ แบบเรียน กศน. ระดับ อื่น ๆ', '376805520180810_064217.jpeg', '2018-08-16', 'รอลงรายการ');

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
(124, '[ 3600 ] พ๊อกเก็ตบุ๊ค'),
(127, 'testtt');

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
(26, 'asdad123');

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
  `member_Birth` date NOT NULL,
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
  `member_Status` enum('สมาชิกใหม่','ใช้งาน','ไม่ใช้งาน') NOT NULL DEFAULT 'สมาชิกใหม่'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member_Library`, `member_user`, `member_Password`, `member_Prefix`, `member_Name`, `member_sex`, `member_Birth`, `member_Age`, `member_Education`, `member_career`, `member_HouseNumber`, `member_province`, `member_Zip`, `member_Phone1`, `member_Phone2`, `member_EasyContact`, `member_MembershipType`, `member_Registration`, `member_ExpiredDate`, `member_Email`, `member_Image`, `member_Parent`, `member_Relationship`, `member_Contact`, `member_Telephone`, `member_Status`) VALUES
(3, 'กศน.อำเภอภูพาน', '', 1234, '', '', '', '0000-00-00', 0, 'ประถมศึกษา', '', '', '', 0, 0, 0, '', '', '0000-00-00', '0000-00-00', '', 'DSC_0155_Cover.jpg', '', '', '', 0, 'ไม่ใช้งาน'),
(4, 'กศน.อำเภอสว่างแดนดิน', '1101800817719', 9999, 'นาย', 'พงษ์นรินทร์ ท้ายปาก', 'อื่นๆ', '2018-08-18', 0, 'อนุปริญญา', 'ค้าขาย', '215 หมู่ 11 บ้าน นาคำ', 'นครพนม', 48150, 981164971, 5849898, 'zsdgfgdsfg', 'ตลอดชีพ', '2018-07-22', '0000-00-00', 'boyskylab96@gmail.com', '138208395120180809_085227.jpg', 'ผู้ปกครอง', 'ความสัมพันธ์กับผู้สมัคร', 'fghsfdgdfgdgsfgsdfg', 2147483647, 'ใช้งาน'),
(6, '', 'james', 1234, '', '', '', '0000-00-00', 0, '', '', '', '', 0, 0, 0, '', '', '2018-07-27', '2019-07-27', '', '17683952620180809_085156.jpg', '', '', '', 2147483647, 'ไม่ใช้งาน'),
(7, 'กศน.อำเภอเมืองสกลนคร', 'iหัสสมาชิก', 957195867, 'คำนำหน้า', 'ชื่อสมาชิก', 'หญิง', '2018-08-09', 0, 'ปริญญาเอกหรือสูงกว่า', 'นักเรียน,นักศึกษา', '215 หมู่ 11 บ้าน นาคำ', 'นครพนม', 48110, 957195867, 957195867, 'สถานที่ติดต่อได้ง่าย :	', 'ตลอดชีพ', '2018-08-16', '2018-08-25', 'Miwmaomao@gmail.com', '105935153520180809_085105.jpg', 'ผู้ปกครอง', 'ความสัมพันธ์กับผู้สมัคร', 'ที่อยู่ที่ติดต่อได้', 957195867, 'ใช้งาน'),
(8, 'กศน.อำเภอโคกศรีสุพรรณ', '58102105121', 123456, 'ฟหกฟหก', 'ฟหกฟหก', 'หญิง', '2018-01-19', 0, 'มัธยมศึกษาตอนปลาย', 'รับราชการ', '215 หมู่ 11 บ้าน นาคำ', 'นครพนม', 48150, 957195867, 957195867, 'สถานที่ติดต่อได้ง่าย :	', '', '2018-08-09', '0000-00-00', 'boyskylab96@gmail.com', '213185205920180809_224041.jpeg', 'ผู้ปกครอง', 'ความสัมพันธ์กับผู้สมัคร', 'ที่อยู่ที่ติดต่อได้ :	', 957195867, 'สมาชิกใหม่');

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
-- Table structure for table `nt_act`
--

CREATE TABLE `nt_act` (
  `id_act` int(7) NOT NULL,
  `name_act` varchar(255) NOT NULL,
  `date_act` varchar(50) NOT NULL,
  `detail_act` text NOT NULL,
  `id_photo` int(7) NOT NULL,
  `date_in` varchar(255) NOT NULL,
  `status_act` int(7) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nt_act`
--

INSERT INTO `nt_act` (`id_act`, `name_act`, `date_act`, `detail_act`, `id_photo`, `date_in`, `status_act`) VALUES
(25, 'กิจกรรมการปลูปป่า', '10 �ԧ�Ҥ� 2561 ', 'sdsdfafasd\r\nfasdf\r\nasdfasdfasdf\r\nasdf', 162, '01-09-2011', 1),
(27, 'ปลูกป่า2', '31 สิงหาคม 2554', 'ปลูกป่่าลดภาวะโลกร้อน                              ', 165, '01-09-2011', 1),
(28, 'test', '2018-08-18', 'testsetset', 176, '07-08-2018', 1),
(29, 'test123', '2018-08-17', 'dfsadfasdfasdfasdf', 177, '07-08-2018', 1),
(30, 'teset1', '2018-08-10', 'dfasdfasdfasdfasd', 182, '07-08-2018', 1),
(49, 'teset2', '2018-08-17', 'adfafafasdfasdfasdfasdfasdf\r\nasdfsa\r\nddfsaddfsadfsaddfasdf\r\nasdfsadf', 179, '07-08-2018', 0),
(53, 'teset4', '2018-08-25', 'dsfvdfvsdfvdfsvdsf', 181, '07-08-2018', 0),
(52, 'teset3', '2018-08-18', 'ereawfasdfsadfdsafsadfsad\r\nfasdfsad\r\nfasdfasdfasdf', 180, '07-08-2018', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nt_photo`
--

CREATE TABLE `nt_photo` (
  `id_photo` int(7) NOT NULL,
  `name_photo` varchar(255) NOT NULL,
  `id_act` int(7) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nt_photo`
--

INSERT INTO `nt_photo` (`id_photo`, `name_photo`, `id_act`) VALUES
(162, 'DSC04777.JPG', 25),
(165, 'DSC04870.JPG', 27),
(176, '36935865_205258070176892_1730869337796902912_n.jpg', 28),
(177, 'DSC_0155_Cover.jpg', 29),
(182, 'flag_usd.png', 30),
(179, 'baner.jpg', 49),
(180, '36935865_205258070176892_1730869337796902912_n.jpg', 52),
(181, 'Program-Code-Feature-Image.jpg', 53);

-- --------------------------------------------------------

--
-- Table structure for table `nw_news`
--

CREATE TABLE `nw_news` (
  `id_act` int(7) NOT NULL,
  `name_act` varchar(255) NOT NULL,
  `date_act` varchar(50) NOT NULL,
  `detail_act` text NOT NULL,
  `id_photo` int(7) NOT NULL,
  `date_in` varchar(255) NOT NULL,
  `status_act` int(7) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nw_news`
--

INSERT INTO `nw_news` (`id_act`, `name_act`, `date_act`, `detail_act`, `id_photo`, `date_in`, `status_act`) VALUES
(1, 'teset1', '2018-08-10', 'sadasdasd', 1, '08-08-2018', 1),
(2, 'teset1', '2018-08-10', 'sadasdasd', 7, '08-08-2018', 1),
(3, 'test2', '2018-08-25   ', 'fsadfasdfadsfasdfasdfsadf\r\nasdfasdfasdfasdfasdf\r\nasdfsadfsaddfsadfasdfs\r\nsadsad\r\nasdfasfsafasf\r\nasdasdsad', 3, '08-08-2018', 1),
(4, 'teset4', '2018-08-08', 'dasdasdasd', 4, '08-08-2018', 1),
(5, 'test2', '2018-08-10', 'erewafgasdfasdfadsfasdfasdfasdfsadfasdfsadfasf\r\nasddfsadfsaddfsaddf\r\nasdf', 0, '08-08-2018', 0),
(6, 'teset2', '2018-09-01', 'asdfasfasdfasdfasdfasddfasd asdfsadf\r\nasdfasdfasfsadfasdfasdfasdfasdfasdfasdfasdf', 0, '08-08-2018', 0),
(7, 'teset5', '2018-08-08', 'sadasdasd', 0, '08-08-2018', 0),
(8, 'teset6', '2018-08-24', 'asdasdasdasd', 0, '08-08-2018', 0),
(9, 'asdasdasdasd', '2018-08-24', 'fdgaegasdfgadfasdfasd\r\nfasdfasdfd', 0, '08-08-2018', 0),
(10, 'sdfsdfasdfasdfsad', '2018-08-22', 'sadfasdfasdfasdfasdfasfdfasdf', 0, '08-08-2018', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nw_photo`
--

CREATE TABLE `nw_photo` (
  `id_photo` int(7) NOT NULL,
  `name_photo` varchar(255) NOT NULL,
  `id_act` int(7) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nw_photo`
--

INSERT INTO `nw_photo` (`id_photo`, `name_photo`, `id_act`) VALUES
(1, '36935865_205258070176892_1730869337796902912_n.jpg', 1),
(7, 'flag_eur.png', 2),
(3, 'baner.jpg', 3),
(4, 'DSC_0155_Cover.jpg', 4);

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
(1, 'กศน.อำเภอโคกศรีสุพรรณ', 'ดเ้ดเ้', 'ดเ้ดเ้', 'ด้ดเ้ดเ้', '2018-07-19', '49748710720180810_123219.jpg'),
(3, 'sdfsdfafsdf', 'เ้่เ้่', 'เ้่เ้่เ้่', 'นนรนวรนว', '2018-07-19', '28905708020180810_123244.jpg'),
(4, 'กศน.อำเภอคำตากล้า', 'cghfghjghj', 'fghjfghjfhg', 'fhjfhjfhjg', '2018-07-24', '5781921020180810_123710.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `ReplyID` int(5) UNSIGNED ZEROFILL NOT NULL,
  `QuestionID` int(5) UNSIGNED ZEROFILL NOT NULL,
  `CreateDate` datetime NOT NULL,
  `Details` text NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`ReplyID`, `QuestionID`, `CreateDate`, `Details`, `Name`) VALUES
(00001, 00016, '2012-03-22 16:13:18', 'Please visit www.thaicreate.com', 'plakrim'),
(00002, 00016, '2012-03-22 16:14:56', 'Thanks. www.thaicreate.com is great web for the php and mysql.', 'mr.win'),
(00003, 00023, '2018-08-05 14:08:08', 'hfghdfgh', 'fffff'),
(00004, 00023, '2018-08-05 14:08:13', 'sdfsadfsadf', 'sdafsdfsd'),
(00005, 00023, '2018-08-05 14:11:30', 'tghsdfgfdg\r\nfgsfdg\r\nsdfgdsfg\r\nsdfg\r\n', 'gfhfdghfg'),
(00006, 00023, '2018-08-05 14:14:04', '', ''),
(00007, 00023, '2018-08-09 21:36:12', '', 'พงษ์นรินทร์ ท้ายปาก');

-- --------------------------------------------------------

--
-- Table structure for table `webboard`
--

CREATE TABLE `webboard` (
  `QuestionID` int(5) UNSIGNED ZEROFILL NOT NULL,
  `CreateDate` datetime NOT NULL,
  `Question` varchar(255) NOT NULL,
  `Details` text NOT NULL,
  `Name` varchar(50) NOT NULL,
  `View` int(5) NOT NULL,
  `Reply` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webboard`
--

INSERT INTO `webboard` (`QuestionID`, `CreateDate`, `Question`, `Details`, `Name`, `View`, `Reply`) VALUES
(00001, '2012-03-22 15:37:54', 'Help me here. I love it. But out of this.', 'Detail for : Help me here. I love it. But out of this.', 'cook chicken', 4, 1),
(00002, '2012-03-22 15:37:54', 'Why compare the data in the sql language. But if the numbers.	', 'Detail for : Why compare the data in the sql language. But if the numbers.	', 'koo_service', 0, 0),
(00003, '2012-03-22 15:37:54', 'The values ??in the Text box to use when removed from the List Box.', 'Detail for : The values ??in the Text box to use when removed from the List Box.	', 'Bee.', 0, 0),
(00004, '2012-03-22 15:37:54', 'Ask me how I have used it to my PHPExcel.', 'Detail for : Ask me how I have used it to my PHPExcel.	', 'PlaKriM.	', 0, 0),
(00005, '2012-03-22 15:37:54', 'You know me ... textbox code number is entered at the stem and then a textbox to another textbox and press tab to another.', 'Detail for : You know me ... textbox code number is entered at the stem and then a textbox to another textbox and press tab to another.	', 'mr.win', 0, 0),
(00006, '2012-03-22 15:37:54', 'How to convert date from year to year, then evaluate the current age.	', 'Detail for : How to convert date from year to year, then evaluate the current age.	', 'Jae', 0, 0),
(00007, '2012-03-22 15:37:54', 'I do asp.net but I have a question about my file. Why does the archive folder. Existing file, a single thread.', 'Detail for : I do asp.net but I have a question about my file. Why does the archive folder. Existing file, a single thread.	', 'pat.', 0, 0),
(00008, '2012-03-22 15:37:54', 'Thanks for the advice. I write code to search from the main square with the sell_id', 'Detail for : Thanks for the advice. I write code to search from the main square with the sell_id', 'sodong.', 0, 0),
(00009, '2012-03-22 15:37:54', 'I ask my friends. The wrapping. I want to separate words	', 'Detail for : I ask my friends. The wrapping. I want to separate words', 'noy', 0, 0),
(00010, '2012-03-22 15:37:54', 'I used to. Focus () the cursor to the last scene of the text in the textbox	', 'Detail for : I used to. Focus () the cursor to the last scene of the text in the textbox	', 'oasiis', 0, 0),
(00011, '2012-03-22 15:37:54', 'Help write the story to me in my OOP database postgresql	', 'Detail for : Help write the story to me in my OOP database postgresql	', 'minutes', 0, 0),
(00012, '2012-03-22 15:37:54', 'Config file that loads the message id, message value to a system call to load the config of this post.	', 'Detail for : Config file that loads the message id, message value to a system call to load the config of this post.	', 'ago', 1, 0),
(00013, '2012-03-22 15:37:54', 'Hope to see the Code during my search. Asp	', 'Detail for : Hope to see the Code during my search. Asp	', 'A', 1, 0),
(00014, '2012-03-22 15:37:54', 'The value in the textbox value from db where the textbox is in the dropdown to change the value from the db as well	', 'Detail for : The value in the textbox value from db where the textbox is in the dropdown to change the value from the db as well	', 'jum', 0, 0),
(00015, '2012-03-22 15:37:54', 'jquery ui datepicker calendar. Assistance in the form of redundancy	', 'Detail for : jquery ui datepicker calendar. Assistance in the form of redundancy	', 'Prairie', 2, 0),
(00016, '2012-03-22 16:12:24', 'How to use php and mysql database', 'Dear all,\r\nI am need to connect php to mysql database please suggest source code to tutorial.', 'mr.win', 4, 2),
(00019, '2018-08-05 13:15:27', 'test', 'asdfasdfasdfa', 'skylake', 1, 0),
(00020, '2018-08-05 13:19:04', 'dasdsad', 'asdasdsad', 'sadsadasd', 0, 0),
(00021, '2018-08-05 13:20:56', 'dasdsad', 'asdasdsad', 'sadsadasd', 0, 0),
(00022, '2018-08-05 13:23:44', 'sdasdsa', 'asdsadasd', 'fasdfasdfa', 11, 0),
(00023, '2018-08-05 13:38:49', 'terset123', 'dsfasgafdvadfvasddsavsda\r\ndsvasdfvasdfasd\r\nvcsad\r\nvcasd\r\nv', 'testset3r', 57, 5),
(00024, '2018-08-09 21:36:04', '', '', 'พงษ์นรินทร์ ท้ายปาก', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`Activities_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

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
-- Indexes for table `nt_act`
--
ALTER TABLE `nt_act`
  ADD PRIMARY KEY (`id_act`);

--
-- Indexes for table `nt_photo`
--
ALTER TABLE `nt_photo`
  ADD PRIMARY KEY (`id_photo`);

--
-- Indexes for table `nw_news`
--
ALTER TABLE `nw_news`
  ADD PRIMARY KEY (`id_act`);

--
-- Indexes for table `nw_photo`
--
ALTER TABLE `nw_photo`
  ADD PRIMARY KEY (`id_photo`);

--
-- Indexes for table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`personnel_id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`ReplyID`);

--
-- Indexes for table `webboard`
--
ALTER TABLE `webboard`
  ADD PRIMARY KEY (`QuestionID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `Activities_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `authorities`
--
ALTER TABLE `authorities`
  MODIFY `authorities_id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

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
  MODIFY `MainCategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `News_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `nt_act`
--
ALTER TABLE `nt_act`
  MODIFY `id_act` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `nt_photo`
--
ALTER TABLE `nt_photo`
  MODIFY `id_photo` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `nw_news`
--
ALTER TABLE `nw_news`
  MODIFY `id_act` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `nw_photo`
--
ALTER TABLE `nw_photo`
  MODIFY `id_photo` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `personnel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `ReplyID` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `webboard`
--
ALTER TABLE `webboard`
  MODIFY `QuestionID` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
