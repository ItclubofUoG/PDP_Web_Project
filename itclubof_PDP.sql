-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 27, 2022 at 09:41 PM
-- Server version: 10.5.15-MariaDB-cll-lve
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itclubof_PDP`
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
(9, 'F5', 'b8e1e3fb7bab8b35', '2022-06-23', 'Táº§ng 5 _Test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(200) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `date` date NOT NULL,
  `location` varchar(200) NOT NULL,
  `score` int(11) NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_title`, `description`, `date`, `location`, `score`, `time_start`, `time_end`, `image`) VALUES
(0, 'None', 'None', '0000-00-00', 'None', 0, '00:00:00', '00:00:00', 'None'),
(17, 'Releasing Event Portal ', '        This is the day that the IT club will deploy the event Portal for the PDP .\r\nThank You\r\n', '2022-07-01', '3A hall', 1, '10:00:00', '10:30:00', 'ReleasingWeb.jpg'),
(19, 'Test-29/06/2022', '   testweb', '2022-06-29', '3A Floor', 1, '12:30:00', '12:50:00', 'Test5.png'),
(20, 'Test-27/6/2022', ' Test Lan 6', '2022-06-27', '3A Floor', 2, '17:07:00', '17:08:00', 'Test5.png');

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
('00136334_Test', 'Tráº§n Thá»‹ Diá»…m PhÃºc', '0123456987', 'female', 'phucttd2@fpt.edu.vn', '2022-06-27', '83472271548001', '25d55ad283aa400af464c76d713c07ad', 21, 13, 1, 1),
('00136344_Test', 'Nguyá»…n Thá»‹ Huá»³nh PhÆ°Æ¡ng', '0987651234', 'female', 'phuongnth36@fpt.edu.vn', '1995-10-29', '83421741538001', '25d55ad283aa400af464c76d713c07ad', 21, 13, 0, 1),
('00138233_Test', 'LÃª Thá»‹ Há»“ng Nháº¡n', '0969366264', 'female', 'nhanlth3@fpt.edu.vn', '1955-07-01', '831252151548001', '25d55ad283aa400af464c76d713c07ad', 21, 13, 0, 1),
('00147355_Test', 'Phan Háº£i Äáº±ng', '0932969943', 'male', 'phuongnt36@fpt.edu.vn', '1995-09-29', '832502181548001', '25d55ad283aa400af464c76d713c07ad', 21, 13, 0, 1),
('00187081_Test', 'Äá»— ThuÃ½ Vy', '0939995250', 'male', 'vydt5@fpt.edu.vn', '1995-06-05', '83291871538001', '25d55ad283aa400af464c76d713c07ad', 21, 13, 0, 1),
('GCC19009', 'Tháº¡ch Ngá»c Trung', '0865894853', 'male', 'trungtngcc19009@fpt.edu.vn', '2022-06-27', '17922114226', '25d55ad283aa400af464c76d713c07ad', 13, 6, 0, 1),
('GCC19037', 'Huá»³nh Quá»‘c DÆ°Æ¡ng', '0916447242', 'male', 'duonghqgcc19037@fpt.edu.vn', '2001-11-04', '14710218724', '25d55ad283aa400af464c76d713c07ad', 13, 6, 0, 1),
('GCC19259', 'Tráº§n PhÆ°á»›c Háº£o', '0346370328', 'female', 'haotpgcc19259@fpt.edu.vn', '2001-11-09', '19515213926', '25d55ad283aa400af464c76d713c07ad', 13, 6, 0, 1),
('GCC200003', ' Nguyá»…n Quá»‘c ThÃ´ng', '0704774190', 'male', 'thongnqgcc200003@fpt.edu.vn', '2002-07-11', '13117613626', '25d55ad283aa400af464c76d713c07ad', 13, 9, 0, 1);

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
(137, '00147355_Test', '2022-06-27', '16:15:30', '16:24:00', 0, 2, 1),
(146, '00147355_Test', '2022-06-27', '16:27:09', '17:00:06', 0, 2, 1),
(154, '00147355_Test', '2022-06-27', '16:43:25', '17:00:06', 0, 2, 1),
(155, '00187081_Test', '2022-06-27', '16:43:35', '16:58:57', 0, 2, 1),
(156, '00147355_Test', '2022-06-27', '16:44:40', '17:00:06', 0, 2, 1),
(182, '00187081_Test', '2022-06-27', '17:08:35', '17:09:26', 20, 2, 1),
(183, '00136344_Test', '2022-06-27', '17:08:39', '17:09:31', 20, 2, 1),
(184, '00138233_Test', '2022-06-27', '17:08:44', '17:09:35', 20, 2, 1),
(185, '00147355_Test', '2022-06-27', '17:08:48', '17:09:39', 20, 2, 1),
(186, '00136334_Test', '2022-06-27', '17:08:53', '17:09:44', 20, 2, 1),
(187, 'GCC19009', '2022-06-27', '17:08:57', '17:09:48', 20, 2, 1),
(188, '00136344_Test', '2022-06-27', '17:13:10', '17:13:10', 0, 2, 0),
(190, '00138233_Test', '2022-06-27', '17:22:47', '17:22:47', 0, 2, 0),
(191, 'GCC19259', '2022-06-27', '17:07:00', '17:08:00', 20, 2, 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `major`
--
ALTER TABLE `major`
  MODIFY `major_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

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
