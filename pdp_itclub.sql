-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2022 at 02:05 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

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
(1, 'itclub', 'itclubofgwu@gmail.com', 'daebc91ab34ce81c69967c0617e90823');

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
(1, 'K7'),
(2, 'K8'),
(3, 'K9'),
(4, 'K10'),
(6, 'None');

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

CREATE TABLE `device` (
  `id` int(11) NOT NULL,
  `device_name` varchar(200) NOT NULL,
  `device_uid` varchar(200) NOT NULL,
  `device_date` date NOT NULL,
  `device_mode` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `device`
--

INSERT INTO `device` (`id`, `device_name`, `device_uid`, `device_date`, `device_mode`) VALUES
(1, 'Floor 1', '34234234234fsd', '0000-00-00', 1),
(2, 'Floor 2', '[value-3]', '0000-00-00', 1),
(3, 'Floor 3', '[value-3]', '0000-00-00', 1);

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
(1, 'Workshop IT', 'How to...', '2022-06-05', 'Hall', 2, '05:00:00', '07:00:00', 'Workshopit.jpg'),
(2, 'Workshop Design', 'How to...', '2022-06-05', 'Hall', 3, '05:00:00', '07:00:00', 'workshopit.jpg'),
(3, 'Workshop Books ', 'How to...', '2022-06-05', 'Hall', 4, '05:00:00', '07:00:00', 'workshopit.jpg'),
(4, 'Workshop Bussiness', 'How to...', '2022-05-05', 'Hall', 2, '05:00:00', '07:00:00', 'workshopit.jpg'),
(5, 'Workshop Vovinam', 'How to...', '2022-12-05', 'Hall', 1, '05:00:00', '07:00:00', 'workshopit.jpg'),
(6, 'Workshop Music', 'How to...', '2022-06-04', 'Hall', 2, '05:00:00', '07:00:00', 'workshopit.jpg');

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
(1, 'Information Technology'),
(2, 'Graphic Design'),
(3, 'Business'),
(6, 'None');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `student_id` varchar(100) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `dob` date NOT NULL,
  `card_uid` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `major_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `card_select` int(11) NOT NULL DEFAULT 0,
  `add_card` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`student_id`, `fullname`, `phone`, `gender`, `email`, `dob`, `card_uid`, `password`, `major_id`, `course_id`, `card_select`, `add_card`) VALUES
('2022-06-0711:17:13am0.4', NULL, NULL, NULL, NULL, '2022-06-07', '57859686', '25d55ad283aa400af464c76d713c07ad', 0, 0, 1, 1),
('GCC200001', 'Nguyen Van A', '0704775482', 'male', 'vana@gmail.com', '2002-10-13', '000', '25d55ad283aa400af464c76d713c07ad', 1, 2, 0, 1),
('GCC200002', 'Nguyen Van B', '0704775482', 'male', 'vanb@gmail.com', '2002-10-14', '000', '25d55ad283aa400af464c76d713c07ad', 1, 3, 0, 1),
('GCC200003', 'Nguyen Van C', '0704775482', 'male', 'vanc@gmail.com', '2002-10-22', '000', '25d55ad283aa400af464c76d713c07ad', 3, 2, 0, 1),
('GCC200004', 'Nguyen Van D', '0704775482', 'male', 'vand@gmail.com', '2002-10-30', '000', '25d55ad283aa400af464c76d713c07ad', 2, 2, 0, 1);

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
(1, 'GCC200002', '0000-00-00', '00:00:00', '00:00:00', 6, 0, 0),
(2, 'GCC200003', '0000-00-00', '00:00:00', '00:00:00', 4, 0, 0),
(3, 'GCC200001', '0000-00-00', '00:00:00', '00:00:00', 4, 0, 0),
(4, 'GCC200004', '0000-00-00', '00:00:00', '00:00:00', 1, 0, 0),
(6, 'GCC200002', '0000-00-00', '00:00:00', '00:00:00', 2, 0, 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `device`
--
ALTER TABLE `device`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `major`
--
ALTER TABLE `major`
  MODIFY `major_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  ADD CONSTRAINT `user_log_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `user` (`student_id`),
  ADD CONSTRAINT `user_log_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
