-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 23, 2022 at 12:50 PM
-- Server version: 10.5.16-MariaDB-cll-lve
-- PHP Version: 7.4.30

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
(1, 'Admin', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500'),
(2, 'Phan Háº£i Äáº±ng', 'dangph5@fe.edu.vn', '25d55ad283aa400af464c76d713c07ad');

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
(1, 'K8'),
(2, 'K9'),
(3, 'K10'),
(4, 'K11');

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
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `image` varchar(500) NOT NULL,
  `scorePlus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_title`, `description`, `date`, `location`, `score`, `time_start`, `time_end`, `image`, `scorePlus`) VALUES
(0, 'First_Score', 'none', '0000-00-00', 'none', 0, '00:00:00', '00:00:00', 'None', NULL);

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
(1, 'BA - Maketing'),
(2, 'SE - Information Technology'),
(3, 'BA - Event'),
(4, 'BA - Business'),
(5, 'GD - Graphics Design'),
(6, 'CTSV- Student Service');

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
  `dob` date DEFAULT NULL,
  `card_uid` varchar(200) DEFAULT NULL,
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
('GBC19007', 'Nguyễn Thị Huyền Trân', 'none', 'male', 'trannthgbc19007@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19012', 'Lê Thanh Mịnh', 'none', 'male', 'minhltgbc19012@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19016', 'Phạm Hoàng Đăng Thư', 'none', 'male', 'thuphdgbc19016@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19017', 'Nguyễn Ngọc Bảo Trân', 'none', 'male', 'trannnbgbc19017@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19018', 'Võ Bùi Hoàng Thơ', 'none', 'male', 'thovbhgbc19018@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19021', 'Nguyễn Ngọc Hồng Nguyên', 'none', 'male', 'nguyennnhgbc19021@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19025', 'Ngô Anh Thư', 'none', 'male', 'thunaGBC19025@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19028', 'Lê Nhật Lam', 'none', 'male', 'lamlnGBC19028@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19030', 'Đặng Thúy Vy', 'none', 'male', 'vydtGBC19030@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19032', 'Nguyễn Thành Lộc', 'none', 'male', 'locntGBC19032@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19036', 'Lê Ngọc Trân', 'none', 'male', 'tranlnGBC19036@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19042', 'Triệu Khả Nhi', 'none', 'male', 'nhitkGBC19042@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19043', 'Trần Lê Phương Thảo', 'none', 'male', 'thaotlpGBC19043@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19044', 'Nguyễn Phạm Thanh Tuấn', 'none', 'male', 'tuannptGBC19044@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19048', 'Trần Trọng Nghĩa', 'none', 'male', 'NghiaTTGBC19048@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19049', 'Trần Lê Thanh Bền', 'none', 'male', 'bentltGBC19049@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19064', 'Lê Thị Anh Thư', 'none', 'male', 'thultaGBC19064@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19065', 'Đỗ Kim Ngân', 'none', 'male', 'ngandkGBC19065@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19066', 'Nguyễn Tường Lan Thi', 'none', 'male', 'thintlGBC19066@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19068', 'Nguyễn Trí Tâm', 'none', 'male', 'tamntGBC19068@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19069', 'Trần Thành Đạt', 'none', 'male', 'datttGBC19069@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19071', 'Trần Huỳnh Phú Vinh', 'none', 'male', 'vinhthpGBC19071@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19077', 'Lê Khánh Dân', 'none', 'male', 'danlkGBC19077@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19085', 'Lê Thảo Vy', 'none', 'male', 'vyltGBC19085@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19086', 'Đoàn Như Ý', 'none', 'male', 'ydnGBC19086@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19088', 'Bùi Nhựt Tân', 'none', 'male', 'tanbnGBC19088@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19090', 'Lê Hỷ Húa', 'none', 'male', 'hualhGBC19090@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19091', 'Dương Quỳnh Anh', 'none', 'male', 'anhdqGBC19091@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19094', 'Nguyễn Hưng', 'none', 'male', 'hungnGBC19094@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19097', 'Nguyễn Chí Tâm', 'none', 'male', 'tamncGBC19097@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19103', 'Trương Thúy Duy', 'none', 'male', 'duyttGBC19103@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19111', 'Lê Thị Thiên Thanh', 'none', 'male', 'thanhlttGBC19111@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19114', 'Lê Đỗ Gia Hân', 'none', 'male', 'hanldgGBC19114@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19119', 'Lê Thị Tuyết Trinh', 'none', 'male', 'trinhlttGBC19119@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19120', 'Đỗ Thúy Duy', 'none', 'male', 'duydtGBC19120@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19122', 'Lê Ngọc Tú', 'none', 'male', 'tulnGBC19122@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19123', 'Quách Trang Đài', 'none', 'male', 'daiqtGBC19123@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19126', 'Nguyễn Thị Linh Như', 'none', 'male', 'nhuntlGBC19126@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19128', 'Trần Đăng Khoa', 'none', 'male', 'khoatdGBC19128@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19129', 'Nguyễn Ngọc Anh Thư', 'none', 'male', 'thunnaGBC19129@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19131', 'Trần Thị Hồng Trăm', 'none', 'male', 'tramtthGBC19131@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19134', 'Lê Ngọc Diễm Quỳnh', 'none', 'male', 'quynhlndGBC19134@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19136', 'Mai Yến Nhi', 'none', 'male', 'nhimyGBC19136@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19137', 'La Mộc Thuỳ Dương', 'none', 'male', 'duonglmtGBC19137@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19144', 'Trần Thị Bích Ngọc', 'none', 'male', 'ngocttbGBC19144@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19159', 'Nguyễn Phước Sang', 'none', 'male', 'sangnpGBC19159@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19161', 'Trần Anh Hậu', 'none', 'male', 'hautaGBC19161@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19163', 'Tiêu Nhật Khải', 'none', 'male', 'khaitnGBC19163@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19166', 'Phạm Thị Kim Ngân', 'none', 'male', 'nganptkGBC19166@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19176', 'Lê Thị Kim Hân', 'none', 'male', 'hanltkGBC19176@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19178', 'Nguyễn Hồng Ngọc', 'none', 'male', 'ngocnhGBC19178@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19184', 'Nguyễn Thị Thu Trang', 'none', 'male', 'trangnttGBC19184@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19185', 'Huỳnh Trọng Nhân', 'none', 'male', 'nhanhtGBC19185@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19193', 'Nguyễn Hồng Mơ', 'none', 'male', 'monhGBC19193@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19194', 'Trần Thiện Đông', 'none', 'male', 'dongttGBC19194@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19196', 'Phan Anh Vũ', 'none', 'male', 'vupaGBC19196@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19199', 'Hồ Thanh Vi', 'none', 'male', 'vihtGBC19199@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19201', 'Nguyễn Ngọc Tuyền', 'none', 'male', 'tuyennnGBC19201@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19205', 'Nguyễn Thị Hồng Ngân', 'none', 'male', 'ngannthGBC19205@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19215', 'Nguyễn Ngọc Thúy Vy', 'none', 'male', 'vynntGBC19215@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19221', 'Quách Phan Gia Yến', 'none', 'male', 'yenqpgGBC19221@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19225', 'Nguyễn Thị Yến Linh', 'none', 'male', 'linhntyGBC19225@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19226', 'Tôn Tấn Tài', 'none', 'male', 'taittGBC19226@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19227', 'Bùi Thị Minh Thư', 'none', 'male', 'thubtmGBC19227@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19229', 'Châu Thanh Trúc', 'none', 'male', 'trucctGBC19229@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19230', 'Lê Phương Thư', 'none', 'male', 'thulpGBC19230@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19234', 'Lê Ngọc Bảo Trân', 'none', 'male', 'tranlnbGBC19234@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19242', 'Võ Bách Triệu', 'none', 'male', 'trieuvbGBC19242@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19245', 'Lê Thanh Trà', 'none', 'male', 'traltGBC19245@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19248', 'Nguyễn Thanh Tuyền', 'none', 'male', 'tuyenntGBC19248@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19250', 'Đặng Khả Tú', 'none', 'male', 'tudkGBC19250@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19253', 'Phạm Tường Vi', 'none', 'male', 'viptGBC19253@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19258', 'Nguyễn Thị Như Ý', 'none', 'male', 'yntnGBC19258@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19261', 'Châu Văn Nghĩa', 'none', 'male', 'nghiacvGBC19261@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19263', 'Lê Ngân', 'none', 'male', 'nganlGBC19263@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19267', 'Nguyễn Thoại Miêu', 'none', 'male', 'mieuntGBC19267@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19272', 'Trần Trung Nghĩa', 'none', 'male', 'nghiattGBC19272@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19273', 'Võ Văn Toàn', 'none', 'male', 'toanvvGBC19273@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19277', 'Lê Thanh Quang', 'none', 'male', 'quangltGBC19277@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19278', 'Nguyễn Thị Thanh Mai', 'none', 'male', 'mainttGBC19278@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19279', 'Võ Thị Nhựt Anh', 'none', 'male', 'anhvtnGBC19279@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19290', 'Nguyễn Hữu Đua', 'none', 'male', 'duanhGBC19290@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19292', 'Lê Thị Cẩm Tuyền', 'none', 'male', 'tuyenltcGBC19292@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GBC19293', 'Nguyễn Minh Nghi', 'none', 'male', 'nghinmGBC19293@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19001', 'Nguyễn Thị Hồng Tú', 'none', 'male', 'tunthGCC19001@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19003', 'Nguyễn Phú Vĩnh', 'none', 'male', 'vinhnpGCC19003@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19004', 'Danh Chan Ta Ra', '0383658449', 'male', 'radctGCC19004@fpt.edu.vn', '2001-09-01', '83159621548001', '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19009', 'Thạch Ngọc Trung', '0865894853', 'male', 'trungtnGCC19009@fpt.edu.vn', '2001-02-02', '17922114226', '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19022', 'Lưu Hoài Phong', 'none', 'male', 'phonglhGCC19022@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19023', 'Lê Chí Luân', '0386363677', 'male', 'luanlcGCC19023@fpt.edu.vn', '2001-06-06', NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19026', 'Nguyễn Ngọc Trường Duy', 'none', 'male', 'duynntGCC19026@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19037', 'Huỳnh Quốc Dương', 'none', 'male', 'duonghqGCC19037@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19038', 'Nguyễn Quốc Tính', 'none', 'male', 'tinhnqGCC19038@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19047', 'Trần Ngọc Giàu', 'none', 'male', 'giautnGCC19047@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19055', 'Hà Tỷ Phú', 'none', 'male', 'phuhtGCC19055@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19056', 'Lê A Huy', 'none', 'male', 'huylaGCC19056@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19060', 'Nguyễn Thị Kiều Ngân', 'none', 'male', 'nganntkGCC19060@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19067', 'Vương Huỳnh Khan', 'none', 'male', 'khanvhGCC19067@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19072', 'Nguyễn Đông Anh', 'none', 'male', 'anhndGCC19072@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19095', 'Lê Chí Khải', 'none', 'male', 'khailcGCC19095@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19096', 'Bùi Trọng Phúc', 'none', 'male', 'phucbtGCC19096@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19098', 'Cao Hoàng Trường', 'none', 'male', 'truongchGCC19098@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19102', 'Đặng Mai Quốc Tuấn', 'none', 'male', 'tuandmqGCC19102@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19106', 'Phan Thị Anh Thư', 'none', 'male', 'thuptaGCC19106@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19107', 'Nguyễn Tiến Đức', 'none', 'male', 'ducntGCC19107@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19117', 'Nguyễn Nhật Hảo', 'none', 'male', 'haonnGCC19117@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19118', 'Nguyễn Vĩ Khang', 'none', 'male', 'khangnvGCC19118@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19127', 'Võ Chí Nguyện', 'none', 'male', 'nguyenvcGCC19127@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19132', 'Lê Thành Nhân', 'none', 'male', 'nhanltGCC19132@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19135', 'Lê Khả Văn', 'none', 'male', 'vanlkGCC19135@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19138', 'Lê Trung Kiên', 'none', 'male', 'kienltGCC19138@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19153', 'Nguyễn Thanh Duy', 'none', 'male', 'duyntGCC19153@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19155', 'Nguyễn Quang Tỷ', 'none', 'male', 'tynqGCC19155@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19157', 'Đinh Văn Nam', 'none', 'male', 'namdvGCC19157@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19160', 'Nguyễn Khánh An', 'none', 'male', 'annkGCC19160@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19167', 'Dương Khánh Ngọc', 'none', 'male', 'ngocdkGCC19167@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19169', 'Lý Trọng Thắng', 'none', 'male', 'thangltGCC19169@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19171', 'Huỳnh Bùi Ngọc Như', 'none', 'male', 'nhuhbnGCC19171@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19173', 'Lê Đỗ Quang Sang', 'none', 'male', 'sangldqGCC19173@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19180', 'Phạm Nguyễn Nhật Anh', 'none', 'male', 'anhpnnGCC19180@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19181', 'Trần Tấn Phát', 'none', 'male', 'phatttGCC19181@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19186', 'Nguyễn Siêu', 'none', 'male', 'sieunGCC19186@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19187', 'Nguyễn Huỳnh Hồng Quân', 'none', 'male', 'quannhhGCC19187@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19188', 'Tô Nhật Duy', 'none', 'male', 'duytnGCC19188@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19189', 'Lâm Ngọc Thắng', 'none', 'male', 'thanglnGCC19189@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19190', 'Trần Quan Vĩnh', 'none', 'male', 'vinhtqGCC19190@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19198', 'Nguyễn Minh Thanh', 'none', 'male', 'thanhnmGCC19198@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19207', 'Trương Văn Phát', 'none', 'male', 'phattvGCC19207@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19208', 'Trần Nhật Khanh', 'none', 'male', 'khanhtnGCC19208@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19209', 'Nguyễn Ngọc Nhẫn', 'none', 'male', 'nhannnGCC19209@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19213', 'Nguyễn Thành Đạt', 'none', 'male', 'datntGCC19213@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19218', 'Phan Chí Tình', 'none', 'male', 'tinhpcGCC19218@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19224', 'Nguyễn Trọng Nghĩa', 'none', 'male', 'nghiantGCC19224@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19232', 'Hồ Huỳnh Tấn Phát', 'none', 'male', 'phathhtGCC19232@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19237', 'Đặng Thanh Huy', 'none', 'male', 'huydtGCC19237@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19238', 'Nguyễn Phước Quý Toàn', 'none', 'male', 'toannpqGCC19238@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19240', 'Phan Chí Bảo', 'none', 'male', 'baopcGCC19240@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19244', 'Trần Thế Khang', 'none', 'male', 'khangttGCC19244@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19246', 'Phạm Hữu Nghĩa', 'none', 'male', 'nghiaphGCC19246@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19247', 'Hồ Minh Mẫn', 'none', 'male', 'manhmGCC19247@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19257', 'Dương Vũ Tường', 'none', 'male', 'tuongdvGCC19257@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19259', 'Trần Phước Hảo', '0346370328', 'male', 'haotpGCC19259@fpt.edu.vn', '2001-11-09', '19515213926', '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19268', 'ABDOHA Liêm', 'none', 'male', 'liemaGCC19268@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19269', 'Nguyễn Túc Trí', 'none', 'male', 'trintGCC19269@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19274', 'Trần Thanh Nhân', 'none', 'male', 'nhanttGCC19274@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19275', 'Nguyễn Trung Nguyên', '0973102040', 'male', 'nguyenntGCC19275@fpt.edu.vn', '2001-03-30', '1798114826', '25d55ad283aa400af464c76d713c07ad', 2, 1, 1, 0),
('GCC19280', 'Huỳnh Chí Tâm', 'none', 'male', 'tamhcGCC19280@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GCC19281', 'Lê Vĩnh Bảo', 'none', 'male', 'baolvGCC19281@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GDC19006', 'Lê Phương Đình', 'none', 'male', 'dinhlpGDC19006@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GDC19034', 'Nguyễn Vĩnh Thịnh', 'none', 'male', 'thinhnvGDC19034@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GDC19074', 'Nguyễn Anh Tín', 'none', 'male', 'tinnaGDC19074@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GDC19104', 'Nguyễn Y Khoa', 'none', 'male', 'khoanyGDC19104@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0),
('GDC19254', 'Võ Hữu Đăng', 'none', 'male', 'dangvhGDC19254@fpt.edu.vn', NULL, NULL, '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, 0);

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
(1, 'GDC19006', '2022-06-30', '17:41:33', '18:42:33', 0, 10, 1),
(2, 'GBC19012', '2022-06-30', '17:41:33', '18:42:33', 0, 4, 1),
(3, 'GBC19032', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(4, 'GBC19049', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(5, 'GBC19090', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(6, 'GBC19103', '2022-06-30', '17:41:33', '18:42:33', 0, 26, 1),
(7, 'GBC19123', '2022-06-30', '17:41:33', '18:42:33', 0, 2, 1),
(8, 'GBC19137', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(9, 'GBC19178', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(10, 'GCC19037', '2022-06-30', '17:41:33', '18:42:33', 0, 24, 1),
(11, 'GCC19038', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(12, 'GCC19047', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(13, 'GCC19060', '2022-06-30', '17:41:33', '18:42:33', 0, 29, 1),
(14, 'GCC19117', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(15, 'GCC19160', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(16, 'GCC19213', '2022-06-30', '17:41:33', '18:42:33', 0, 31, 1),
(17, 'GBC19042', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(18, 'GBC19043', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(19, 'GBC19065', '2022-06-30', '17:41:33', '18:42:33', 0, 2, 1),
(20, 'GBC19066', '2022-06-30', '17:41:33', '18:42:33', 0, 12, 1),
(21, 'GBC19068', '2022-06-30', '17:41:33', '18:42:33', 0, 5, 1),
(22, 'GBC19085', '2022-06-30', '17:41:33', '18:42:33', 0, 3, 1),
(23, 'GBC19088', '2022-06-30', '17:41:33', '18:42:33', 0, 72, 1),
(24, 'GBC19094', '2022-06-30', '17:41:33', '18:42:33', 0, 2, 1),
(25, 'GBC19111', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(26, 'GBC19136', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(27, 'GBC19159', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(28, 'GCC19004', '2022-06-30', '17:41:33', '18:42:33', 0, 20, 1),
(29, 'GCC19022', '2022-06-30', '17:41:33', '18:42:33', 0, 41, 1),
(30, 'GCC19096', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(31, 'GDC19104', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(32, 'GCC19055', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(33, 'GCC19244', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(34, 'GDC19254', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(35, 'GBC19273', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(36, 'GBC19242', '2022-06-30', '17:41:33', '18:42:33', 0, 2, 1),
(37, 'GBC19036', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(38, 'GCC19269', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(39, 'GCC19102', '2022-06-30', '17:41:33', '18:42:33', 0, 10, 1),
(40, 'GCC19132', '2022-06-30', '17:41:33', '18:42:33', 0, 46, 1),
(41, 'GCC19180', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(42, 'GCC19232', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(43, 'GDC19034', '2022-06-30', '17:41:33', '18:42:33', 0, 17, 1),
(44, 'GBC19007', '2022-06-30', '17:41:33', '18:42:33', 0, 2, 1),
(45, 'GBC19025', '2022-06-30', '17:41:33', '18:42:33', 0, 47, 1),
(46, 'GBC19030', '2022-06-30', '17:41:33', '18:42:33', 0, 2, 1),
(47, 'GBC19064', '2022-06-30', '17:41:33', '18:42:33', 0, 29, 1),
(48, 'GBC19077', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(49, 'GBC19086', '2022-06-30', '17:41:33', '18:42:33', 0, 39, 1),
(50, 'GBC19129', '2022-06-30', '17:41:33', '18:42:33', 0, 18, 1),
(51, 'GBC19131', '2022-06-30', '17:41:33', '18:42:33', 0, 4, 1),
(52, 'GBC19144', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(53, 'GBC19161', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(54, 'GBC19184', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(55, 'GBC19199', '2022-06-30', '17:41:33', '18:42:33', 0, 2, 1),
(56, 'GCC19003', '2022-06-30', '17:41:33', '18:42:33', 0, 10, 1),
(57, 'GCC19009', '2022-06-30', '17:41:33', '18:42:33', 0, 62, 1),
(58, 'GCC19106', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(59, 'GCC19135', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(60, 'GCC19157', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(61, 'GCC19188', '2022-06-30', '17:41:33', '18:42:33', 0, 8, 1),
(62, 'GCC19189', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(63, 'GCC19224', '2022-06-30', '17:41:33', '18:42:33', 0, 10, 1),
(64, 'GBC19016', '2022-06-30', '17:41:33', '18:42:33', 0, 2, 1),
(65, 'GBC19028', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(66, 'GBC19114', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(67, 'GBC19122', '2022-06-30', '17:41:33', '18:42:33', 0, 5, 1),
(68, 'GBC19134', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(69, 'GBC19225', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(70, 'GCC19095', '2022-06-30', '17:41:33', '18:42:33', 0, 50, 1),
(71, 'GBC19017', '2022-06-30', '17:41:33', '18:42:33', 0, 11, 1),
(72, 'GBC19044', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(73, 'GBC19091', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(74, 'GBC19097', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(75, 'GBC19126', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(76, 'GBC19193', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(77, 'GBC19229', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(78, 'GCC19001', '2022-06-30', '17:41:33', '18:42:33', 0, 22, 1),
(79, 'GCC19026', '2022-06-30', '17:41:33', '18:42:33', 0, 12, 1),
(80, 'GCC19056', '2022-06-30', '17:41:33', '18:42:33', 0, 20, 1),
(81, 'GCC19072', '2022-06-30', '17:41:33', '18:42:33', 0, 10, 1),
(82, 'GCC19118', '2022-06-30', '17:41:33', '18:42:33', 0, 12, 1),
(83, 'GCC19127', '2022-06-30', '17:41:33', '18:42:33', 0, 22, 1),
(84, 'GCC19169', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(85, 'GCC19173', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(86, 'GDC19074', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(87, 'GBC19021', '2022-06-30', '17:41:33', '18:42:33', 0, 2, 1),
(88, 'GBC19018', '2022-06-30', '17:41:33', '18:42:33', 0, 2, 1),
(89, 'GBC19069', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(90, 'GBC19071', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(91, 'GBC19119', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(92, 'GBC19120', '2022-06-30', '17:41:33', '18:42:33', 0, 10, 1),
(93, 'GBC19185', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(94, 'GCC19098', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(95, 'GCC19107', '2022-06-30', '17:41:33', '18:42:33', 0, 13, 1),
(96, 'GCC19171', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(97, 'GCC19181', '2022-06-30', '17:41:33', '18:42:33', 0, 1, 1),
(98, 'GCC19187', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(99, 'GCC19190', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(100, 'GCC19198', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(101, 'GCC19207', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(102, 'GBC19163', '2022-06-30', '17:41:33', '18:42:33', 0, 2, 1),
(103, 'GBC19166', '2022-06-30', '17:41:33', '18:42:33', 0, 2, 1),
(104, 'GBC19176', '2022-06-30', '17:41:33', '18:42:33', 0, 2, 1),
(105, 'GBC19196', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(106, 'GBC19201', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(107, 'GBC19205', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(108, 'GBC19221', '2022-06-30', '17:41:33', '18:42:33', 0, 29, 1),
(109, 'GBC19234', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(110, 'GCC19067', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(111, 'GCC19138', '2022-06-30', '17:41:33', '18:42:33', 0, 30, 1),
(112, 'GCC19167', '2022-06-30', '17:41:33', '18:42:33', 0, 52, 1),
(113, 'GCC19186', '2022-06-30', '17:41:33', '18:42:33', 0, 112, 1),
(114, 'GCC19208', '2022-06-30', '17:41:33', '18:42:33', 0, 23, 1),
(115, 'GCC19209', '2022-06-30', '17:41:33', '18:42:33', 0, 62, 1),
(116, 'GBC19194', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(117, 'GBC19215', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(118, 'GBC19226', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(119, 'GBC19230', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(120, 'GCC19023', '2022-06-30', '17:41:33', '18:42:33', 0, 58, 1),
(121, 'GCC19153', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(122, 'GCC19218', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(123, 'GBC19227', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(124, 'GCC19237', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(125, 'GBC19245', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(126, 'GCC19246', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(127, 'GCC19247', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(128, 'GBC19248', '2022-06-30', '17:41:33', '18:42:33', 0, 37, 1),
(129, 'GBC19250', '2022-06-30', '17:41:33', '18:42:33', 0, 2, 1),
(130, 'GBC19253', '2022-06-30', '17:41:33', '18:42:33', 0, 10, 1),
(131, 'GCC19257', '2022-06-30', '17:41:33', '18:42:33', 0, 3, 1),
(132, 'GBC19258', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(133, 'GCC19259', '2022-06-30', '17:41:33', '18:42:33', 0, 46, 1),
(134, 'GBC19267', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(135, 'GBC19272', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(136, 'GCC19274', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(137, 'GCC19275', '2022-06-30', '17:41:33', '18:42:33', 0, 44, 1),
(138, 'GBC19277', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(139, 'GBC19278', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(140, 'GCC19280', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(141, 'GCC19238', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(142, 'GCC19240', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(143, 'GBC19261', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(144, 'GCC19268', '2022-06-30', '17:41:33', '18:42:33', 0, 1, 1),
(145, 'GBC19279', '2022-06-30', '17:41:33', '18:42:33', 0, 10, 1),
(146, 'GCC19281', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(147, 'GBC19290', '2022-06-30', '17:41:33', '18:42:33', 0, 6, 1),
(148, 'GBC19292', '2022-06-30', '17:41:33', '18:42:33', 0, 9, 1),
(149, 'GBC19293', '2022-06-30', '17:41:33', '18:42:33', 0, 19, 1),
(150, 'GBC19048', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(151, 'GCC19155', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(152, 'GBC19263', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1),
(153, 'GBC19128', '2022-06-30', '17:41:33', '18:42:33', 0, 0, 1);

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
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `major`
--
ALTER TABLE `major`
  MODIFY `major_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

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
