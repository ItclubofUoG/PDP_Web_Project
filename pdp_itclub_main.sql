-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2022 at 07:15 AM
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
(1, 'itclub', 'admin@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(2, 'xfsdf', 'it@gmail.com', '25d55ad283aa400af464c76d713c07ad');

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
(3, 'K7'),
(6, 'K8'),
(9, 'K9'),
(10, 'K10');

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
(2, 'Floor 2', '62e6de2ca19db258', '0000-00-00', 'IT Department', 0);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
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
(2, 'Workshop Design', 'This MD5 hash generator is useful for encoding passwords, credit cards numbers and other sensitive date into MySQL, Postgress or other databases. PHP programmers, ASP programmers and anyone developing on MySQL, SQL, Postgress or similar should find this online tool an especially handy resource.', '2022-06-19', 'Hall', 3, '08:30:00', '09:00:00', 'event2.jpg'),
(3, 'Workshop Books ', 'MD5 hashes are also used to ensure the data integrity of files. Because the MD5 hash algorithm always produces the same output for the same given input, users can compare a hash of the source file with a newly created hash of the destination file to check that it is intact and unmodified.', '2022-06-19', 'Hall', 4, '08:30:00', '14:00:00', 'event3.jpg');

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
(3, 'Marketing'),
(13, 'Information Technology');

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
('GCC19022', 'Luu Hoai Phong', '0918547658', 'female', 'phonglhgcc@gmail.com', '2022-06-17', '57859686', '25d55ad283aa400af464c76d713c07ad', 3, 3, 1, 1),
('GCCTest', 'Test function', '2131213213213', 'male', 'test@gmail.com', '2022-06-09', 'aaaaaaaaaaaaaaaaaaaa', '25d55ad283aa400af464c76d713c07ad', 3, 3, 0, 0),
('TestStudent', 'Luu Hoai Phong', '0398371050', 'male', 'luuhoaiphong@gmail.com', '2012-06-01', 'fhgadjsfhgkjfhgjjvbxlbvh', '25d55ad283aa400af464c76d713c07ad', 3, 6, 0, 0);

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
(42, 'GCCTest', '2022-06-14', '05:00:00', '07:00:00', 2, 3, 0),
(55, 'TestStudent', '2022-06-16', '05:00:00', '07:00:00', 2, 3, 0),
(56, 'TestStudent', '2022-06-16', '05:00:00', '07:00:00', 3, 4, 0),
(57, 'GCC19022', '2022-06-19', '13:59:04', '14:00:25', 2, 3, 1),
(58, 'GCC19022', '2022-06-19', '14:05:55', '14:09:22', 2, 4, 1),
(59, 'GCC19022', '2022-06-19', '14:07:06', '00:00:00', 3, 0, 1),
(60, 'GCC19022', '2022-06-19', '14:08:20', '14:09:22', 3, 4, 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `device`
--
ALTER TABLE `device`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `major`
--
ALTER TABLE `major`
  MODIFY `major_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

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
