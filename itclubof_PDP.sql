-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2022 at 11:14 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pdp_itclub`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(200) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_pwd` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_email`, `admin_pwd`) VALUES
(1, 'Admin', 'admin@gmail.com', '25f9e794323b453885f5181f1b624d0b'),
(4, 'Phan Háº£i Äáº±ng', 'dangph5@fe.edu.vn', '25d55ad283aa400af464c76d713c07ad');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`) VALUES
(0, 'None'),
(6, 'K8'),
(9, 'K9'),
(10, 'K10'),
(13, 'CTSV-2022');

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

CREATE TABLE `device` (
  `id` int(11) NOT NULL,
  `device_name` varchar(200) NOT NULL,
  `device_uid` varchar(200) NOT NULL,
  `device_date` date NOT NULL,
  `device_dep` varchar(20) DEFAULT NULL,
  `device_mode` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `device`
--

INSERT INTO `device` (`id`, `device_name`, `device_uid`, `device_date`, `device_dep`, `device_mode`) VALUES
(9, 'F5', 'b8e1e3fb7bab8b35', '2022-06-23', 'Device_Test', 1),
(10, 'F4', 'd6fc046a48353ca2', '2022-06-30', 'Device of 4th floor', 0);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `date` date NOT NULL,
  `location` varchar(200) NOT NULL,
  `score` int(11) NOT NULL,
  `scorePlus` int(11) NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_title`, `description`, `date`, `location`, `score`, `scorePlus`, `time_start`, `time_end`, `image`) VALUES
(0, 'First_Score', 'None', '0000-00-00', 'None', 0, 0, '00:00:00', '00:00:00', 'None'),
(19, 'Test-29/06/2022', '<div class=\"bi6gxh9e\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql oi732d6d ik7dh3pa ht8s03o8 jq4qci2q a3bd9o3v b1v8xokw oo9gr5id\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tef/2/16/1f525.png\" alt=\"ðŸ”¥\" width=\"16\" height=\"16\" /></span> CH&Iacute;NH THá»¨C C&Ocirc;NG Bá» FES-WEBINAR 17: &ldquo;NFT - TR&Agrave;O LÆ¯U Äáº¦U TÆ¯ HAY XU HÆ¯á»šNG C&Ocirc;NG NGHá»†?&rdquo;</span></div>\r\n<div class=\"bi6gxh9e\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql oi732d6d ik7dh3pa ht8s03o8 jq4qci2q a3bd9o3v b1v8xokw oo9gr5id\">C&ugrave;ng vá»›i sá»± xuáº¥t hiá»‡n v&agrave; ph&aacute;t triá»ƒn nhanh ch&oacute;ng cá»§a Blockchain, NFT (Non-Fungible Token hay NFT Token) Ä‘&atilde; v&agrave; Ä‘ang táº¡o n&ecirc;n má»™t cÆ¡n sá»‘t máº¡nh máº½. Kh&ocirc;ng chá»‰ dá»«ng láº¡i á»Ÿ kháº£ nÄƒng á»©ng dá»¥ng v&agrave;o c&aacute;c ng&agrave;nh c&ocirc;ng nghiá»‡p tr&ograve; chÆ¡i Ä‘iá»‡n tá»­, NFT c&ograve;n xuáº¥t hiá»‡n á»Ÿ kháº¯p nÆ¡i: tá»« lÄ©nh vá»±c nghá»‡ thuáº­t, t&agrave;i ch&iacute;nh, c&aacute;c ná»n táº£ng máº¡ng x&atilde; há»™i cho Ä‘áº¿n ná»n c&ocirc;ng nghiá»‡p &acirc;m nháº¡c tr&ecirc;n to&agrave;n tháº¿ giá»›i&hellip;</span></div>\r\n<div class=\"bi6gxh9e\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql oi732d6d ik7dh3pa ht8s03o8 jq4qci2q a3bd9o3v b1v8xokw oo9gr5id\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tcd/2/16/2753.png\" alt=\"â“\" width=\"16\" height=\"16\" /></span>Váº­y NFT hoáº¡t Ä‘á»™ng dá»±a tr&ecirc;n nguy&ecirc;n l&yacute; ná»n táº£ng n&agrave;o? Ä&acirc;u l&agrave; nguy&ecirc;n táº¯c báº£o máº­t cá»§a NFT?</span></div>\r\n<div class=\"bi6gxh9e\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql oi732d6d ik7dh3pa ht8s03o8 jq4qci2q a3bd9o3v b1v8xokw oo9gr5id\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tcd/2/16/2753.png\" alt=\"â“\" width=\"16\" height=\"16\" /></span> Xu hÆ°á»›ng NFT c&oacute; li&ecirc;n quan nhÆ° tháº¿ n&agrave;o vá»›i ná»n táº£ng Blockchain?</span></div>\r\n<div class=\"bi6gxh9e\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql oi732d6d ik7dh3pa ht8s03o8 jq4qci2q a3bd9o3v b1v8xokw oo9gr5id\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tcd/2/16/2753.png\" alt=\"â“\" width=\"16\" height=\"16\" /></span> L&agrave;m sao Ä‘á»ƒ Ä‘&aacute;nh gi&aacute; Ä‘&acirc;u l&agrave; má»™t thá»‹ trÆ°á»ng NFT tá»‘t Ä‘&aacute;ng Ä‘á»ƒ kh&aacute;ch h&agrave;ng Ä‘áº§u tÆ° v&agrave;o?</span></div>\r\n<div class=\"bi6gxh9e\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql oi732d6d ik7dh3pa ht8s03o8 jq4qci2q a3bd9o3v b1v8xokw oo9gr5id\">Má»i báº¡n tham dá»± FES-Webinar 17: &ldquo;NFT - Tr&agrave;o lÆ°u Ä‘áº§u tÆ° hay xu hÆ°á»›ng c&ocirc;ng nghá»‡?&rdquo; vá»›i sá»± g&oacute;p máº·t cá»§a c&aacute;c kh&aacute;ch má»i l&agrave; c&aacute;c chuy&ecirc;n gia c&oacute; kinh nghiá»‡m d&agrave;y Ä‘áº·c trong lÄ©nh vá»±c:</span></div>\r\n<div class=\"bi6gxh9e\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql oi732d6d ik7dh3pa ht8s03o8 jq4qci2q a3bd9o3v b1v8xokw oo9gr5id\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tca/2/16/1f399.png\" alt=\"ðŸŽ™\" width=\"16\" height=\"16\" /></span> Guest Speaker: Mr. Nguyá»…n Tháº¿ Vinh - CEO <a class=\"oajrlxb2 g5ia77u1 qu0x051f esr5mh6w e9989ue4 r7d6kgcz rq0escxv nhd2j8a9 nc684nl6 p7hjln8o kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x jb3vyjys rz4wbd8a qt6c0cv9 a8nywdso i1ao9s8h esuyzwwr f1sip0of lzcic4wl gpro0wi8 oo9gr5id lrazzd5p\" tabindex=\"0\" role=\"link\" href=\"https://www.facebook.com/Coin98Finance/?__cft__[0]=AZX4sHdKrSGKNXmnjqDJ9b8oktKAFSrYVLKQ_0st_QhKXVCURtKohdgyWtrAIwJvRwSEcxxXvtNowqEk4GFRI09D4VXke35d1gjzVR9m3MQOIomu5-Dl169V2rRD_vwDgKU_wRtUdf7CK2D6bFN6aJ_niLieppahO1RmIjFJ7pQ635L3A0hkO1T9tn_t2iQs8Ac&amp;__tn__=-UK-R\">Coin98 Finance</a></span></div>\r\n<div class=\"bi6gxh9e\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql oi732d6d ik7dh3pa ht8s03o8 jq4qci2q a3bd9o3v b1v8xokw oo9gr5id\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tca/2/16/1f399.png\" alt=\"ðŸŽ™\" width=\"16\" height=\"16\" /></span> Guest Speaker: Mr. Long Nguyá»…n - CTO <a class=\"oajrlxb2 g5ia77u1 qu0x051f esr5mh6w e9989ue4 r7d6kgcz rq0escxv nhd2j8a9 nc684nl6 p7hjln8o kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x jb3vyjys rz4wbd8a qt6c0cv9 a8nywdso i1ao9s8h esuyzwwr f1sip0of lzcic4wl gpro0wi8 oo9gr5id lrazzd5p\" tabindex=\"0\" role=\"link\" href=\"https://www.facebook.com/AuraNetworkHQ/?__cft__[0]=AZX4sHdKrSGKNXmnjqDJ9b8oktKAFSrYVLKQ_0st_QhKXVCURtKohdgyWtrAIwJvRwSEcxxXvtNowqEk4GFRI09D4VXke35d1gjzVR9m3MQOIomu5-Dl169V2rRD_vwDgKU_wRtUdf7CK2D6bFN6aJ_niLieppahO1RmIjFJ7pQ635L3A0hkO1T9tn_t2iQs8Ac&amp;__tn__=-UK-R\">Aura Network</a></span></div>\r\n<div class=\"bi6gxh9e\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql oi732d6d ik7dh3pa ht8s03o8 jq4qci2q a3bd9o3v b1v8xokw oo9gr5id\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tca/2/16/1f399.png\" alt=\"ðŸŽ™\" width=\"16\" height=\"16\" /></span> Vá»›i sá»± dáº«n dáº¯t cá»§a Moderator: Mr. TrÆ°Æ¡ng Th&agrave;nh Äáº¡t - Ph&oacute; Tá»•ng gi&aacute;m Ä‘á»‘c táº¡i <a class=\"oajrlxb2 g5ia77u1 qu0x051f esr5mh6w e9989ue4 r7d6kgcz rq0escxv nhd2j8a9 nc684nl6 p7hjln8o kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x jb3vyjys rz4wbd8a qt6c0cv9 a8nywdso i1ao9s8h esuyzwwr f1sip0of lzcic4wl gpro0wi8 oo9gr5id lrazzd5p\" tabindex=\"0\" role=\"link\" href=\"https://www.facebook.com/BicIncubator/?__cft__[0]=AZX4sHdKrSGKNXmnjqDJ9b8oktKAFSrYVLKQ_0st_QhKXVCURtKohdgyWtrAIwJvRwSEcxxXvtNowqEk4GFRI09D4VXke35d1gjzVR9m3MQOIomu5-Dl169V2rRD_vwDgKU_wRtUdf7CK2D6bFN6aJ_niLieppahO1RmIjFJ7pQ635L3A0hkO1T9tn_t2iQs8Ac&amp;__tn__=-UK-R\">BIC- VÆ°á»n Æ°Æ¡m khá»Ÿi nghiá»‡p Blockchain</a> - Ä‘&atilde; gá»i vá»‘n th&agrave;nh c&ocirc;ng tr&ecirc;n Shark Tank Viá»‡t Nam vá»›i Startup <a class=\"oajrlxb2 g5ia77u1 qu0x051f esr5mh6w e9989ue4 r7d6kgcz rq0escxv nhd2j8a9 nc684nl6 p7hjln8o kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x jb3vyjys rz4wbd8a qt6c0cv9 a8nywdso i1ao9s8h esuyzwwr f1sip0of lzcic4wl gpro0wi8 oo9gr5id lrazzd5p\" tabindex=\"0\" role=\"link\" href=\"https://www.facebook.com/Vmeta.biz/?__cft__[0]=AZX4sHdKrSGKNXmnjqDJ9b8oktKAFSrYVLKQ_0st_QhKXVCURtKohdgyWtrAIwJvRwSEcxxXvtNowqEk4GFRI09D4VXke35d1gjzVR9m3MQOIomu5-Dl169V2rRD_vwDgKU_wRtUdf7CK2D6bFN6aJ_niLieppahO1RmIjFJ7pQ635L3A0hkO1T9tn_t2iQs8Ac&amp;__tn__=-UK-R\">VMeta</a></span></div>\r\n<div class=\"bi6gxh9e\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql oi732d6d ik7dh3pa ht8s03o8 jq4qci2q a3bd9o3v b1v8xokw oo9gr5id\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tca/2/16/1f399.png\" alt=\"ðŸŽ™\" width=\"16\" height=\"16\" /></span>Host: Mr. L&ecirc; Duy LÆ°Æ¡ng - Content Creator táº¡i <a class=\"oajrlxb2 g5ia77u1 qu0x051f esr5mh6w e9989ue4 r7d6kgcz rq0escxv nhd2j8a9 nc684nl6 p7hjln8o kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x jb3vyjys rz4wbd8a qt6c0cv9 a8nywdso i1ao9s8h esuyzwwr f1sip0of lzcic4wl gpro0wi8 oo9gr5id lrazzd5p\" tabindex=\"0\" role=\"link\" href=\"https://www.facebook.com/daihocfptcantho/?__cft__[0]=AZX4sHdKrSGKNXmnjqDJ9b8oktKAFSrYVLKQ_0st_QhKXVCURtKohdgyWtrAIwJvRwSEcxxXvtNowqEk4GFRI09D4VXke35d1gjzVR9m3MQOIomu5-Dl169V2rRD_vwDgKU_wRtUdf7CK2D6bFN6aJ_niLieppahO1RmIjFJ7pQ635L3A0hkO1T9tn_t2iQs8Ac&amp;__tn__=-UK-R\">Äáº¡i Há»c FPT Cáº§n ThÆ¡</a></span></div>\r\n<div class=\"bi6gxh9e\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql oi732d6d ik7dh3pa ht8s03o8 jq4qci2q a3bd9o3v b1v8xokw oo9gr5id\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t9b/2/16/1f7e2.png\" alt=\"ðŸŸ¢\" width=\"16\" height=\"16\" /></span> ÄÄ‚NG K&Yacute; THAM GIA NGAY FES-WEBINAR 17: &ldquo;NFT - TR&Agrave;O LÆ¯U Äáº¦U TÆ¯ HAY XU HÆ¯á»šNG C&Ocirc;NG NGHá»†?&rdquo; Ä‘á»ƒ kh&ocirc;ng bá» lá»¡ buá»•i chia sáº» v&ocirc; c&ugrave;ng Ä‘áº·c biá»‡t n&agrave;y.</span></div>\r\n<div class=\"bi6gxh9e\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql oi732d6d ik7dh3pa ht8s03o8 jq4qci2q a3bd9o3v b1v8xokw oo9gr5id\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t1d/2/16/1f4c5.png\" alt=\"ðŸ“…\" width=\"16\" height=\"16\" /></span> Thá»i gian: 18:30 - 20:30, thá»© 5, ng&agrave;y 30/06/2022.</span></div>\r\n<div class=\"bi6gxh9e\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql oi732d6d ik7dh3pa ht8s03o8 jq4qci2q a3bd9o3v b1v8xokw oo9gr5id\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t2b/2/16/1f4bb.png\" alt=\"ðŸ’»\" width=\"16\" height=\"16\" /></span> Äá»‹a Ä‘iá»ƒm: Offline táº¡i FPT Edu Campus Cáº§n ThÆ¡ hoáº·c Livestream táº¡i Fanpage <a class=\"oajrlxb2 g5ia77u1 qu0x051f esr5mh6w e9989ue4 r7d6kgcz rq0escxv nhd2j8a9 nc684nl6 p7hjln8o kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x jb3vyjys rz4wbd8a qt6c0cv9 a8nywdso i1ao9s8h esuyzwwr f1sip0of lzcic4wl gpro0wi8 oo9gr5id lrazzd5p\" tabindex=\"0\" role=\"link\" href=\"https://www.facebook.com/FEExpSpace/?__cft__[0]=AZX4sHdKrSGKNXmnjqDJ9b8oktKAFSrYVLKQ_0st_QhKXVCURtKohdgyWtrAIwJvRwSEcxxXvtNowqEk4GFRI09D4VXke35d1gjzVR9m3MQOIomu5-Dl169V2rRD_vwDgKU_wRtUdf7CK2D6bFN6aJ_niLieppahO1RmIjFJ7pQ635L3A0hkO1T9tn_t2iQs8Ac&amp;__tn__=-UK-R\">FPT Edu Experience Space</a>, <a class=\"oajrlxb2 g5ia77u1 qu0x051f esr5mh6w e9989ue4 r7d6kgcz rq0escxv nhd2j8a9 nc684nl6 p7hjln8o kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x jb3vyjys rz4wbd8a qt6c0cv9 a8nywdso i1ao9s8h esuyzwwr f1sip0of lzcic4wl gpro0wi8 oo9gr5id lrazzd5p\" tabindex=\"0\" role=\"link\" href=\"https://www.facebook.com/FPTEduHackathon/?__cft__[0]=AZX4sHdKrSGKNXmnjqDJ9b8oktKAFSrYVLKQ_0st_QhKXVCURtKohdgyWtrAIwJvRwSEcxxXvtNowqEk4GFRI09D4VXke35d1gjzVR9m3MQOIomu5-Dl169V2rRD_vwDgKU_wRtUdf7CK2D6bFN6aJ_niLieppahO1RmIjFJ7pQ635L3A0hkO1T9tn_t2iQs8Ac&amp;__tn__=-UK-R\">FPT Edu Hackathon</a>.</span></div>\r\n<div class=\"bi6gxh9e\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql oi732d6d ik7dh3pa ht8s03o8 jq4qci2q a3bd9o3v b1v8xokw oo9gr5id\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t6b/2/16/1f4dd.png\" alt=\"ðŸ“\" width=\"16\" height=\"16\" /></span> CaÌch thÆ°Ìc Ä‘Äƒng kyÌ:</span></div>\r\n<div class=\"bi6gxh9e\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql oi732d6d ik7dh3pa ht8s03o8 jq4qci2q a3bd9o3v b1v8xokw oo9gr5id\">BÆ°á»›c 1: Äi&ecirc;Ì€n vaÌ€o form Ä‘Äƒng kyÌ: <a class=\"oajrlxb2 g5ia77u1 qu0x051f esr5mh6w e9989ue4 r7d6kgcz rq0escxv nhd2j8a9 nc684nl6 p7hjln8o kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x jb3vyjys rz4wbd8a qt6c0cv9 a8nywdso i1ao9s8h esuyzwwr f1sip0of lzcic4wl gpro0wi8 py34i1dx\" tabindex=\"0\" role=\"link\" href=\"https://l.facebook.com/l.php?u=https%3A%2F%2Fforms.gle%2FumKrDp6dUeQNaNRr7%3Ffbclid%3DIwAR3FJOE9rm3DK2qbMyKtlbXsvdP1Akg8JOn0Bj_XlWE3SqeLmwxf8Ii6lQg&amp;h=AT2oVUbCEmn_1D33gV1kPuwS6EsX6zIG71vGGIxbKS7xgBXA2RN1MAVg5o1iYJAys90OtXFl-YT9HYioEXW21Gb4RKllHPNmbvCpIBpOLEI8vlq5IntqFYacnQ14xxbRVLbU9OQMoA&amp;__tn__=-UK-R&amp;c[0]=AT1bLtZtUuPVqYrz8l505NrpmkFofOwxRh5bK5PPMj3xmkahZxhJ1O7Bd5sK0t5C7QNodxrG1Qeyt-P9l2W6DGMrLSxnVUOCoqa04gpWhmZHAa6cnpJWkXMqinH6Dp7m8g30ljy2W0d4OJuLJgb-yppTgKxOZm1rVL13vkPhGHzlIRiKCTrqHP2cBDyr9m60pdvQ4eTpiIFzdTFHosU\" target=\"_blank\" rel=\"nofollow noopener\">https://forms.gle/umKrDp6dUeQNaNRr7</a></span></div>\r\n<div class=\"bi6gxh9e\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql oi732d6d ik7dh3pa ht8s03o8 jq4qci2q a3bd9o3v b1v8xokw oo9gr5id\">BÆ°á»›c 2: ÄÆ¡Ì£i email x&aacute;c nháº­n tham dá»± FES-Webinar.</span></div>\r\n<div class=\"bi6gxh9e\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql oi732d6d ik7dh3pa ht8s03o8 jq4qci2q a3bd9o3v b1v8xokw oo9gr5id\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t5d/2/16/26a0.png\" alt=\"âš ï¸\" width=\"16\" height=\"16\" /></span> LÆ°u &yacute;:</span></div>\r\n<div class=\"bi6gxh9e\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql oi732d6d ik7dh3pa ht8s03o8 jq4qci2q a3bd9o3v b1v8xokw oo9gr5id\">&bull; Email x&aacute;c nháº­n tham dá»± sáº½ Ä‘Æ°á»£c gá»­i Ä‘áº¿n báº¡n trÆ°á»›c 18h00 ng&agrave;y 29/06.</span></div>\r\n<div class=\"bi6gxh9e\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql oi732d6d ik7dh3pa ht8s03o8 jq4qci2q a3bd9o3v b1v8xokw oo9gr5id\">&bull; Sá»‘ lÆ°á»£ng kh&aacute;n giáº£ c&oacute; giá»›i háº¡n, c&aacute;c báº¡n h&atilde;y Ä‘iá»n form tháº­t sá»›m Ä‘á»ƒ Ä‘Æ°á»£c Ä‘áº£m báº£o suáº¥t tham dá»± nh&eacute;.</span></div>\r\n<div class=\"bi6gxh9e\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql oi732d6d ik7dh3pa ht8s03o8 jq4qci2q a3bd9o3v b1v8xokw oo9gr5id\">_______________________</span></div>\r\n<div class=\"bi6gxh9e\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql oi732d6d ik7dh3pa ht8s03o8 jq4qci2q a3bd9o3v b1v8xokw oo9gr5id\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t20/2/16/1f5a5.png\" alt=\"ðŸ–¥\" width=\"16\" height=\"16\" /></span> FPT Edu Hackathon l&agrave; cuá»™c thi láº­p tr&igrave;nh d&agrave;nh cho há»c sinh, sinh vi&ecirc;n, há»c vi&ecirc;n to&agrave;n Tá»• chá»©c Gi&aacute;o dá»¥c FPT (FPT Edu) tr&ecirc;n to&agrave;n quá»‘c, Ä‘Æ°á»£c tá»• chá»©c theo m&ocirc; h&igrave;nh Hackathon ná»•i tiáº¿ng cá»§a tháº¿ giá»›i.</span></div>\r\n<div class=\"bi6gxh9e\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql oi732d6d ik7dh3pa ht8s03o8 jq4qci2q a3bd9o3v b1v8xokw oo9gr5id\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t20/2/16/1f5a5.png\" alt=\"ðŸ–¥\" width=\"16\" height=\"16\" /></span> FPT Edu Hackathon 2022 chá»n chá»§ Ä‘á» &ldquo;Ph&aacute;t triá»ƒn á»©ng dá»¥ng ph&acirc;n t&aacute;n tr&ecirc;n ná»n táº£ng Blockchain&rdquo; d&agrave;nh cho khá»‘i sinh vi&ecirc;n v&agrave; há»c sinh THPT; chá»§ Ä‘á» &ldquo;TÆ°Æ¡ng lai tháº¿ giá»›i&rdquo; d&agrave;nh cho khá»‘i há»c sinh Tiá»ƒu há»c v&agrave; THCS.</span></div>\r\n<div class=\"bi6gxh9e\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql oi732d6d ik7dh3pa ht8s03o8 jq4qci2q a3bd9o3v b1v8xokw oo9gr5id\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t1a/2/16/1f7e1.png\" alt=\"ðŸŸ¡\" width=\"16\" height=\"16\" /></span> ÄÆ¡n vá»‹ t&agrave;i trá»£ v&agrave;ng: Icetea Labs / Oxalus / LaunchZone / Drivez / Himo World / Coin98 Finance / Metard.io / Aura Network / STEAM for Vietnam / Kyber Network / DFINITY</span></div>\r\n<div class=\"bi6gxh9e\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql oi732d6d ik7dh3pa ht8s03o8 jq4qci2q a3bd9o3v b1v8xokw oo9gr5id\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/te/2/16/26aa.png\" alt=\"âšª\" width=\"16\" height=\"16\" /></span> ÄÆ¡n vá»‹ t&agrave;i trá»£ báº¡c: SotaTek</span></div>\r\n<div class=\"bi6gxh9e\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql oi732d6d ik7dh3pa ht8s03o8 jq4qci2q a3bd9o3v b1v8xokw oo9gr5id\">Th&ocirc;ng tin chi tiáº¿t xin vui l&ograve;ng li&ecirc;n há»‡:</span></div>\r\n<div class=\"bi6gxh9e\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql oi732d6d ik7dh3pa ht8s03o8 jq4qci2q a3bd9o3v b1v8xokw oo9gr5id\">&bull; Email: hackathon@fe.edu.vn</span></div>\r\n<div class=\"bi6gxh9e\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql oi732d6d ik7dh3pa ht8s03o8 jq4qci2q a3bd9o3v b1v8xokw oo9gr5id\">&bull; Äiá»‡n thoáº¡i: 024 6680 5915</span></div>\r\n<div class=\"bi6gxh9e\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql oi732d6d ik7dh3pa ht8s03o8 jq4qci2q a3bd9o3v b1v8xokw oo9gr5id\">&bull; Website: <a class=\"oajrlxb2 g5ia77u1 qu0x051f esr5mh6w e9989ue4 r7d6kgcz rq0escxv nhd2j8a9 nc684nl6 p7hjln8o kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x jb3vyjys rz4wbd8a qt6c0cv9 a8nywdso i1ao9s8h esuyzwwr f1sip0of lzcic4wl gpro0wi8 py34i1dx\" tabindex=\"0\" role=\"link\" href=\"http://www.feexp.space/hackathon/?fbclid=IwAR1tPhzByCk6kAr6vvhRSsPeJzrrY1Mkm9PB9sKRQaz21jNGDJF9x9MhpaA\" target=\"_blank\" rel=\"nofollow noopener\">www.feexp.space/hackathon/</a></span></div>\r\n<div class=\"bi6gxh9e\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql oi732d6d ik7dh3pa ht8s03o8 jq4qci2q a3bd9o3v b1v8xokw oo9gr5id\"><a class=\"oajrlxb2 g5ia77u1 qu0x051f esr5mh6w e9989ue4 r7d6kgcz rq0escxv nhd2j8a9 nc684nl6 p7hjln8o kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x jb3vyjys rz4wbd8a qt6c0cv9 a8nywdso i1ao9s8h esuyzwwr f1sip0of lzcic4wl gpro0wi8 oo9gr5id lrazzd5p\" tabindex=\"0\" role=\"link\" href=\"https://www.facebook.com/hashtag/fptedu?__eep__=6&amp;__cft__[0]=AZX4sHdKrSGKNXmnjqDJ9b8oktKAFSrYVLKQ_0st_QhKXVCURtKohdgyWtrAIwJvRwSEcxxXvtNowqEk4GFRI09D4VXke35d1gjzVR9m3MQOIomu5-Dl169V2rRD_vwDgKU_wRtUdf7CK2D6bFN6aJ_niLieppahO1RmIjFJ7pQ635L3A0hkO1T9tn_t2iQs8Ac&amp;__tn__=-UK-R\">#FPTEdu</a> <a class=\"oajrlxb2 g5ia77u1 qu0x051f esr5mh6w e9989ue4 r7d6kgcz rq0escxv nhd2j8a9 nc684nl6 p7hjln8o kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x jb3vyjys rz4wbd8a qt6c0cv9 a8nywdso i1ao9s8h esuyzwwr f1sip0of lzcic4wl gpro0wi8 oo9gr5id lrazzd5p\" tabindex=\"0\" role=\"link\" href=\"https://www.facebook.com/hashtag/fpteducation?__eep__=6&amp;__cft__[0]=AZX4sHdKrSGKNXmnjqDJ9b8oktKAFSrYVLKQ_0st_QhKXVCURtKohdgyWtrAIwJvRwSEcxxXvtNowqEk4GFRI09D4VXke35d1gjzVR9m3MQOIomu5-Dl169V2rRD_vwDgKU_wRtUdf7CK2D6bFN6aJ_niLieppahO1RmIjFJ7pQ635L3A0hkO1T9tn_t2iQs8Ac&amp;__tn__=-UK-R\">#FPTEducation</a> <a class=\"oajrlxb2 g5ia77u1 qu0x051f esr5mh6w e9989ue4 r7d6kgcz rq0escxv nhd2j8a9 nc684nl6 p7hjln8o kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x jb3vyjys rz4wbd8a qt6c0cv9 a8nywdso i1ao9s8h esuyzwwr f1sip0of lzcic4wl gpro0wi8 oo9gr5id lrazzd5p\" tabindex=\"0\" role=\"link\" href=\"https://www.facebook.com/hashtag/fpteduexperiencespace?__eep__=6&amp;__cft__[0]=AZX4sHdKrSGKNXmnjqDJ9b8oktKAFSrYVLKQ_0st_QhKXVCURtKohdgyWtrAIwJvRwSEcxxXvtNowqEk4GFRI09D4VXke35d1gjzVR9m3MQOIomu5-Dl169V2rRD_vwDgKU_wRtUdf7CK2D6bFN6aJ_niLieppahO1RmIjFJ7pQ635L3A0hkO1T9tn_t2iQs8Ac&amp;__tn__=-UK-R\">#FPTEduExperienceSpace</a> <a class=\"oajrlxb2 g5ia77u1 qu0x051f esr5mh6w e9989ue4 r7d6kgcz rq0escxv nhd2j8a9 nc684nl6 p7hjln8o kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x jb3vyjys rz4wbd8a qt6c0cv9 a8nywdso i1ao9s8h esuyzwwr f1sip0of lzcic4wl gpro0wi8 oo9gr5id lrazzd5p\" tabindex=\"0\" role=\"link\" href=\"https://www.facebook.com/hashtag/fpteduhackathon2022?__eep__=6&amp;__cft__[0]=AZX4sHdKrSGKNXmnjqDJ9b8oktKAFSrYVLKQ_0st_QhKXVCURtKohdgyWtrAIwJvRwSEcxxXvtNowqEk4GFRI09D4VXke35d1gjzVR9m3MQOIomu5-Dl169V2rRD_vwDgKU_wRtUdf7CK2D6bFN6aJ_niLieppahO1RmIjFJ7pQ635L3A0hkO1T9tn_t2iQs8Ac&amp;__tn__=-UK-R\">#FPTEduHackathon2022</a><a class=\"oajrlxb2 g5ia77u1 qu0x051f esr5mh6w e9989ue4 r7d6kgcz rq0escxv nhd2j8a9 nc684nl6 p7hjln8o kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x jb3vyjys rz4wbd8a qt6c0cv9 a8nywdso i1ao9s8h esuyzwwr f1sip0of lzcic4wl gpro0wi8 oo9gr5id lrazzd5p\" tabindex=\"0\" role=\"link\" href=\"https://www.facebook.com/hashtag/fpteduhackathon?__eep__=6&amp;__cft__[0]=AZX4sHdKrSGKNXmnjqDJ9b8oktKAFSrYVLKQ_0st_QhKXVCURtKohdgyWtrAIwJvRwSEcxxXvtNowqEk4GFRI09D4VXke35d1gjzVR9m3MQOIomu5-Dl169V2rRD_vwDgKU_wRtUdf7CK2D6bFN6aJ_niLieppahO1RmIjFJ7pQ635L3A0hkO1T9tn_t2iQs8Ac&amp;__tn__=-UK-R\">#FPTEduHackathon</a></span></div>', '2022-06-29', '3A Floor', 1, 0, '13:11:00', '13:14:00', '23.png'),
(24, 'Releasing Web', '<p>Sâ›”ï¸S - 1/7/2022, the Event Portal will be releaed by IT club, this is a desirable system&nbsp;</p>\r\n<p>Join with us to learn more....ðŸ˜˜</p>', '2022-07-01', '3A Hall', 10, 5, '10:30:00', '10:40:00', 'ReleaseWeb.jpg'),
(25, 'Test-1/07/2022', '<div class=\"bi6gxh9e\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql oi732d6d ik7dh3pa ht8s03o8 jq4qci2q a3bd9o3v b1v8xokw oo9gr5id\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/te2/1/16/270d.png\" alt=\"âœ\" width=\"16\" height=\"16\" /></span>S&aacute;ch hay má»—i tuáº§n-129</span></div>\r\n<div class=\"bi6gxh9e\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql oi732d6d ik7dh3pa ht8s03o8 jq4qci2q a3bd9o3v b1v8xokw oo9gr5id\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t49/1/16/1f4da.png\" alt=\"ðŸ“š\" width=\"16\" height=\"16\" /></span><strong> 7 th&oacute;i quen hiá»‡u quáº£</strong></span></div>\r\n<div class=\"bi6gxh9e\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql oi732d6d ik7dh3pa ht8s03o8 jq4qci2q a3bd9o3v b1v8xokw oo9gr5id\">T&aacute;c giáº£: Stephen R. Covey</span></div>\r\n<div class=\"bi6gxh9e\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql oi732d6d ik7dh3pa ht8s03o8 jq4qci2q a3bd9o3v b1v8xokw oo9gr5id\">Quyá»ƒn s&aacute;ch Ä‘á» cáº­p Ä‘áº¿n nhá»¯ng th&oacute;i quen táº¡o n&ecirc;n sá»± kh&aacute;c biá»‡t, ná»n táº£ng cá»‘t l&otilde;i v&agrave; l&agrave; b&iacute; quyáº¿t trá»ng yáº¿u Ä‘á»ƒ x&acirc;y dá»±ng n&ecirc;n má»™t ngÆ°á»i th&agrave;nh Ä‘áº¡t. T&aacute;c giáº£ Ä‘Æ°a ra nhá»¯ng kiáº¿n thá»©c cÆ¡ báº£n vá» c&aacute;ch h&agrave;nh xá»­ Ä‘&uacute;ng Ä‘áº¯n, c&aacute;ch l&agrave;m viá»‡c hiá»‡u quáº£. Tá»« Ä‘&oacute; gi&uacute;p báº¡n t&igrave;m ra con Ä‘Æ°á»ng Ä‘á»ƒ tiáº¿n tá»›i th&agrave;nh c&ocirc;ng.</span></div>\r\n<div class=\"bi6gxh9e\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql oi732d6d ik7dh3pa ht8s03o8 jq4qci2q a3bd9o3v b1v8xokw oo9gr5id\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tcc/1/16/1f4dd.png\" alt=\"ðŸ“\" width=\"16\" height=\"16\" /></span>T&aacute;c giáº£ Ä‘&atilde; liá»‡t k&ecirc; 7 th&oacute;i quen hiá»‡u quáº£ nhÆ°:</span></div>\r\n<ul class=\"bi6gxh9e aov4n071 fjf4s8hc mf5omzu7\">\r\n<li>\r\n<div class=\"bi6gxh9e\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql oi732d6d ik7dh3pa ht8s03o8 jq4qci2q a3bd9o3v b1v8xokw oo9gr5id\">Th&oacute;i quen thá»© nháº¥t l&agrave; l&agrave;m chá»§ ch&iacute;nh m&igrave;nh.</span></div>\r\n</li>\r\n<li>\r\n<div class=\"bi6gxh9e\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql oi732d6d ik7dh3pa ht8s03o8 jq4qci2q a3bd9o3v b1v8xokw oo9gr5id\">Thá»© hai Ä‘&oacute; l&agrave; th&oacute;i quen báº¯t Ä‘áº§u báº±ng Ä‘&iacute;ch Ä‘áº¿n.</span></div>\r\n</li>\r\n<li>\r\n<div class=\"bi6gxh9e\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql oi732d6d ik7dh3pa ht8s03o8 jq4qci2q a3bd9o3v b1v8xokw oo9gr5id\">Thá»© ba l&agrave; Æ°u ti&ecirc;n Ä‘iá»u quan trá»ng.</span></div>\r\n</li>\r\n<li>\r\n<div class=\"bi6gxh9e\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql oi732d6d ik7dh3pa ht8s03o8 jq4qci2q a3bd9o3v b1v8xokw oo9gr5id\">Thá»© tÆ° l&agrave; tÆ° duy c&ugrave;ng tháº¯ng.</span></div>\r\n</li>\r\n<li>\r\n<div class=\"bi6gxh9e\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql oi732d6d ik7dh3pa ht8s03o8 jq4qci2q a3bd9o3v b1v8xokw oo9gr5id\">Thá»© nÄƒm l&agrave; tháº¥u hiá»ƒu rá»“i Ä‘Æ°á»£c hiá»ƒu.</span></div>\r\n</li>\r\n<li>\r\n<div class=\"bi6gxh9e\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql oi732d6d ik7dh3pa ht8s03o8 jq4qci2q a3bd9o3v b1v8xokw oo9gr5id\">Thá»© s&aacute;u l&agrave; c&ugrave;ng táº¡o c&aacute;ch má»›i.</span></div>\r\n</li>\r\n<li>\r\n<div class=\"bi6gxh9e\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql oi732d6d ik7dh3pa ht8s03o8 jq4qci2q a3bd9o3v b1v8xokw oo9gr5id\">Th&oacute;i quen cuá»‘i c&ugrave;ng l&agrave; r&egrave;n má»›i báº£n th&acirc;n.</span></div>\r\n</li>\r\n</ul>\r\n<div class=\"bi6gxh9e\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql oi732d6d ik7dh3pa ht8s03o8 jq4qci2q a3bd9o3v b1v8xokw oo9gr5id\">Quyá»ƒn s&aacute;ch sáº½ d&agrave;nh cho táº¥t cáº£ má»i ngÆ°á»i v&agrave; Ä‘áº·c biá»‡t d&agrave;nh cho nhá»¯ng báº¡n muá»‘n tá»± ho&agrave;n thiá»‡n báº£n th&acirc;n Ä‘á»ƒ trá»Ÿ n&ecirc;n th&agrave;nh c&ocirc;ng hÆ¡n. Sá»‘ng theo \"7 th&oacute;i quen\" m&agrave; t&aacute;c giáº£ Ä‘Æ°a ra l&agrave; má»™t cuá»™c Ä‘áº¥u tranh kh&ocirc;ng ngá»«ng, bá»Ÿi v&igrave; khi báº¡n c&agrave;ng ho&agrave;n thiá»‡n báº£n th&acirc;n th&igrave; báº£n cháº¥t cá»§a c&aacute;c th&aacute;ch thá»©c báº¡n Ä‘á»‘i máº·t cÅ©ng sáº½ thay Ä‘á»•i. V&agrave; chá»‰ cáº§n lu&ocirc;n tá»± Ä‘á»™ng vi&ecirc;n ch&iacute;nh m&igrave;nh, cho ph&eacute;p m&igrave;nh ho&agrave;n thiá»‡n hÆ¡n sáº½ kh&ocirc;ng c&oacute; g&igrave; ngÄƒn cáº£n Ä‘Æ°á»£c báº¡n Ä‘áº¿n vá»›i th&agrave;nh c&ocirc;ng.</span></div>\r\n<div class=\"bi6gxh9e\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql oi732d6d ik7dh3pa ht8s03o8 jq4qci2q a3bd9o3v b1v8xokw oo9gr5id\"><a class=\"oajrlxb2 g5ia77u1 qu0x051f esr5mh6w e9989ue4 r7d6kgcz rq0escxv nhd2j8a9 nc684nl6 p7hjln8o kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x jb3vyjys rz4wbd8a qt6c0cv9 a8nywdso i1ao9s8h esuyzwwr f1sip0of lzcic4wl gpro0wi8 oo9gr5id lrazzd5p\" tabindex=\"0\" role=\"link\" href=\"https://www.facebook.com/hashtag/sachhaymoituan?__eep__=6&amp;__cft__[0]=AZXjzksQOX_C-dKm3oWblMH6hMkSQh377VvmIOnEBHtit4PyUODw4vFilNCelFytGoKTVCXFPLCYQwa8C3XPhsQPQ-aXKAoCP-XFjTInlLWalzGdOCgea4gVtLAl3GxrRZ4WnAcPsGESi36KCTU0EkNLPEKHvh03Zy-yrG5AKX5TAtvcxRYzwYL6fgqXQAUs9L8&amp;__tn__=-UK-R\">#Sachhaymoituan</a></span></div>', '2022-07-01', '3A hall', 10, 0, '13:00:00', '14:00:00', '23y.png'),
(26, 'adsfad', NULL, '2022-07-07', 'adsfads', 10, 5, '03:43:00', '03:43:00', '62839b100817cb499206.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `major`
--

CREATE TABLE `major` (
  `major_id` int(11) NOT NULL,
  `major_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `major`
--

INSERT INTO `major` (`major_id`, `major_name`) VALUES
(0, 'None'),
(3, 'BA - Maketing'),
(13, 'SE - Information Technology'),
(18, 'BA - Event'),
(19, 'BA - Business'),
(20, 'GD - Graphics Design'),
(21, 'CTSV- Student Service');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `student_id` varchar(20) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `card_uid` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `major_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `card_select` int(11) DEFAULT 0,
  `add_card` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`student_id`, `fullname`, `phone`, `gender`, `email`, `dob`, `card_uid`, `password`, `major_id`, `course_id`, `card_select`, `add_card`) VALUES
('00136334_Test', 'Tráº§n Thá»‹ Diá»…m PhÃºc', '0123456987', 'female', 'phucttd2@fpt.edu.vn', '2022-06-27', '83472271548001', '25d55ad283aa400af464c76d713c07ad', 21, 13, 0, 1),
('00136344_Test', 'Nguyá»…n Thá»‹ Huá»³nh PhÆ°Æ¡ng', '0987651234', 'female', 'phuongnth36@fpt.edu.vn', '1995-10-29', '83421741538001', '25d55ad283aa400af464c76d713c07ad', 21, 13, 0, 1),
('00138233_Test', 'LÃª Thá»‹ Há»“ng Nháº¡n', '0969366264', 'female', 'nhanlth3@fpt.edu.vn', '1955-07-01', '831252151548001', '25d55ad283aa400af464c76d713c07ad', 21, 13, 0, 1),
('00138518_Test', 'LÃ½ ThuÃ½ Háº±ng', '0982012369', 'female', 'hanglt31@fe.edu.vn', '1980-08-11', '83252231548001', '91d1bae4e9e737e0a65b0d47606c0bed', 21, 13, 0, 1),
('00147336', 'Nguyá»…n HoÃ ng PhÆ°Æ¡ng TrÃ¢m', '0962605997', 'female', 'tramnhp@fe.edu.vn', '1996-12-25', '831571611538001', '25d55ad283aa400af464c76d713c07ad', 21, 13, 0, 1),
('00187081_Test', 'Äá»— ThuÃ½ Vy', '0939995250', 'male', 'vydt5@fpt.edu.vn', '1995-06-05', '83291871538001', '25d55ad283aa400af464c76d713c07ad', 21, 13, 0, 1),
('00193553', 'Huá»³nh PhÆ°á»›c ThÃ nh', '0945550311', 'male', 'thanhhp5@fe.edu.vn', '1997-07-11', '831421641538001', '25d55ad283aa400af464c76d713c07ad', 21, 13, 0, 1),
('GCC19009', 'Tháº¡ch Ngá»c Trung', '0865894853', 'male', 'trungtngcc19009@fpt.edu.vn', '2022-06-27', '17922114226', '25d55ad283aa400af464c76d713c07ad', 13, 6, 0, 1),
('GCC19022', 'LÆ°u HoÃ i Phong', '0398371050', 'male', 'phonglhgcc19022@fpt.edu.vn', '2001-03-01', '1916317024', '25d55ad283aa400af464c76d713c07ad', 13, 6, 0, 1),
('GCC19023', 'LÃª ChÃ­ LuÃ¢n', '0386363677', 'male', 'luanlcgcc19023@fpt.edu.vn', '2001-06-06', '195015026', '25d55ad283aa400af464c76d713c07ad', 13, 6, 0, 1),
('GCC19037', 'Huá»³nh Quá»‘c DÆ°Æ¡ng', '0916447242', 'male', 'duonghqgcc19037@fpt.edu.vn', '2001-11-04', '14710218724', '25d55ad283aa400af464c76d713c07ad', 13, 6, 0, 1),
('GCC19138', 'LÃª Trung KiÃªn', '0799608775', 'male', 'kienltgcc19138@fpt.edu.vn', '2001-02-03', '8319713126', '25d55ad283aa400af464c76d713c07ad', 13, 6, 0, 1),
('GCC19167', 'DÆ°Æ¡ng KhÃ¡nh Ngá»c', '0779814377', 'female', 'ngocdkgcc19167@fpt.edu.vn', '2001-03-04', '325015126', '25d55ad283aa400af464c76d713c07ad', 13, 6, 0, 1),
('GCC19186', 'Nguyá»…n SiÃªu', '0907853006', 'female', 'sieungcc19186@fpt.edu.vn', '2022-07-01', '323512426', '25d55ad283aa400af464c76d713c07ad', 13, 6, 0, 1),
('GCC19209', 'Nguyá»…n Ngá»c Nháº«n', '0857882137', 'female', 'nhannngcc19209@fpt.edu.vn', '2001-04-21', '192213326', '25d55ad283aa400af464c76d713c07ad', 13, 6, 0, 1),
('GCC19213', 'Nguyá»…n ThÃ nh Äáº¡t', '0965533442', 'male', 'datntgcc19213@fpt.edu.vn', '2001-11-25', '21116414926', '25d55ad283aa400af464c76d713c07ad', 13, 6, 0, 1),
('GCC19257', 'DÆ°Æ¡ng VÅ© TÆ°á»ng', '0384391908', 'male', 'tuongdvgcc19257@fpt.edu.vn', '2001-12-18', '321111926', '25d55ad283aa400af464c76d713c07ad', 13, 6, 0, 1),
('GCC19259', 'Tráº§n PhÆ°á»›c Háº£o', '0346370328', 'male', 'haotpgcc19259@fpt.edu.vn', '2001-11-09', '19515213926', '25d55ad283aa400af464c76d713c07ad', 13, 6, 0, 1),
('GCC19275', 'Nguyá»…n Trung NguyÃªn', '0973102040', 'male', 'nguyenntgcc19275@fpt.edu.vn', '2001-03-30', '4105107242113107128', '25d55ad283aa400af464c76d713c07ad', 13, 6, 0, 1),
('GCC200003', ' Nguyá»…n Quá»‘c ThÃ´ng', '0704774190', 'male', 'thongnqgcc200003@fpt.edu.vn', '2002-07-11', '83551811538001', '25d55ad283aa400af464c76d713c07ad', 13, 9, 0, 1),
('GCC200030', 'Nguyá»…n Duy Quang', '0916843367', 'male', 'quangndgcc200030@fpt.edu.vn', '2002-08-05', '316613026', '25d55ad283aa400af464c76d713c07ad', 13, 9, 0, 1),
('GCC200101', 'Há»“ Kiáº¿n Vinh', '0766874949', 'male', 'vinhhkgcc200101@fpt.edu.vn', '2002-08-19', '16311313426', '25d55ad283aa400af464c76d713c07ad', 13, 9, 1, 1),
('GCC200110', 'Tráº§n Ngá»c TÄƒng', '0901084598', 'male', 'tangtngcc200110@fpt.edu.vn', '2002-10-19', '35313526', '25d55ad283aa400af464c76d713c07ad', 13, 9, 0, 1),
('GCC210153', 'Huá»³nh VÄƒn QuÃ­', '0843052859', 'male', 'quihvgcc210153@fpt.edu.vn', '2003-06-27', '13118414426', '25d55ad283aa400af464c76d713c07ad', 13, 10, 0, 1),
('GCC210155', 'Nguyá»…n PhÆ°á»›c Lá»™c ', '0369838916', 'male', 'locnpgcc210155@fpt.edu.vn', '2003-11-03', '6722315226', '25d55ad283aa400af464c76d713c07ad', 13, 10, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `id` int(11) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `checkin_date` date NOT NULL DEFAULT current_timestamp(),
  `time_in` time NOT NULL DEFAULT current_timestamp(),
  `time_out` time NOT NULL DEFAULT current_timestamp(),
  `event_id` int(11) NOT NULL,
  `scores` int(11) NOT NULL DEFAULT 0,
  `card_out` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`id`, `student_id`, `checkin_date`, `time_in`, `time_out`, `event_id`, `scores`, `card_out`) VALUES
(128, 'GCC200003', '2022-06-27', '14:11:31', '14:11:31', 0, 0, 0),
(155, '00187081_Test', '2022-06-27', '16:43:35', '16:58:57', 0, 2, 1),
(188, '00136344_Test', '2022-06-27', '17:13:10', '17:13:10', 0, 2, 0),
(190, '00138233_Test', '2022-06-27', '17:22:47', '17:22:47', 0, 2, 0),
(205, 'GCC19023', '2022-06-29', '13:00:52', '13:14:25', 0, 1, 1),
(206, 'GCC19259', '2022-06-29', '13:00:58', '13:00:58', 0, 5, 0),
(207, 'GCC210155', '2022-06-29', '13:01:06', '13:01:06', 0, 0, 0),
(208, 'GCC210153', '2022-06-29', '13:01:11', '13:01:11', 0, 0, 0),
(216, 'GCC19023', '2022-06-29', '13:11:26', '13:14:25', 19, 1, 1),
(217, 'GCC19022', '2022-06-29', '13:11:29', '13:14:28', 19, 1, 1),
(218, 'GCC200003', '2022-06-29', '13:11:32', '13:14:31', 19, 1, 1),
(219, 'GCC19167', '2022-06-29', '13:12:11', '13:14:53', 19, 1, 1),
(220, 'GCC19209', '2022-06-29', '13:12:28', '13:14:45', 19, 1, 1),
(221, 'GCC19138', '2022-06-29', '13:12:45', '13:14:48', 19, 1, 1),
(222, 'Gcc19009', '2022-06-29', '13:11:00', '13:14:00', 19, 1, 0),
(223, 'Gcc19259', '2022-06-29', '13:11:00', '13:14:00', 19, 1, 0),
(224, 'GCC19009', '2022-06-30', '22:46:52', '22:46:52', 0, 5, 0),
(225, 'GCC19022', '2022-06-30', '22:48:23', '22:48:23', 0, 5, 0),
(231, '00138518_Test', '2022-07-01', '10:22:45', '10:42:37', 0, 10, 1),
(232, '00147336', '2022-07-01', '10:23:08', '10:42:25', 0, 10, 1),
(233, '00193553', '2022-07-01', '10:23:24', '10:42:17', 0, 10, 1),
(234, 'GCC19009', '2022-07-01', '10:27:14', '10:43:53', 24, 15, 1),
(235, 'GCC19023', '2022-07-01', '10:27:33', '10:42:54', 24, 15, 1),
(236, '00138518_Test', '2022-07-01', '10:27:46', '10:42:37', 24, 15, 1),
(237, '00136344_Test', '2022-07-01', '10:27:54', '10:42:32', 24, 10, 1),
(238, '00147336', '2022-07-01', '10:28:00', '10:42:25', 24, 10, 1),
(239, '00193553', '2022-07-01', '10:28:10', '10:42:17', 24, 10, 1),
(240, 'GCC200030', '2022-07-01', '10:28:56', '10:42:55', 24, 15, 1),
(241, 'GCC200110', '2022-07-01', '10:29:01', '10:42:59', 24, 10, 1),
(242, 'GCC19213', '2022-07-01', '10:29:12', '10:43:13', 24, 10, 1),
(243, 'GCC19259', '2022-07-01', '10:29:15', '10:43:05', 24, 10, 1),
(244, 'GCC19022', '2022-07-01', '10:29:27', '10:43:07', 24, 15, 1),
(245, 'GCC19209', '2022-07-01', '10:29:29', '10:45:39', 24, 10, 1),
(246, 'GCC200003', '2022-07-01', '10:29:30', '10:43:05', 24, 10, 1),
(247, 'GCC19138', '2022-07-01', '10:29:36', '10:43:20', 24, 10, 1),
(248, 'GCC19167', '2022-07-01', '10:29:39', '10:43:16', 24, 10, 1),
(249, 'GCC19037', '2022-07-01', '10:29:44', '10:43:18', 24, 10, 1),
(255, 'GCC200101', '2022-07-01', '10:30:00', '10:40:00', 24, 10, 0),
(256, 'GCC19257', '2022-07-01', '10:30:00', '10:40:00', 24, 10, 0),
(257, 'GCC19275', '2022-07-01', '10:30:00', '10:40:00', 24, 10, 0),
(258, 'GCC19023', '2022-07-12', '03:43:00', '03:43:00', 26, 10, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `major`
--
ALTER TABLE `major`
  ADD PRIMARY KEY (`major_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `major_id` (`major_id`,`course_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `student_id` (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `device`
--
ALTER TABLE `device`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `major`
--
ALTER TABLE `major`
  MODIFY `major_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=259;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`major_id`) REFERENCES `major` (`major_id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);

--
-- Constraints for table `user_log`
--
ALTER TABLE `user_log`
  ADD CONSTRAINT `user_log_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`),
  ADD CONSTRAINT `user_log_ibfk_3` FOREIGN KEY (`student_id`) REFERENCES `user` (`student_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
