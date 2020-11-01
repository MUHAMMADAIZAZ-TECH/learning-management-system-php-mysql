-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2019 at 08:57 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'admin', 'f925916e2754e5e03f75dd58a5733251', '2017-01-24 11:21:18', '21-05-2018 03:31:37 PM');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `courseCode` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `courseName` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course_id`, `courseCode`, `pincode`, `courseName`, `creationDate`, `updationDate`) VALUES
(9, 2, '101', '759619', 'php', '2018-12-29 19:03:11', ''),
(10, 3, '106', '267486', 'wordpress', '2018-12-29 19:07:03', ''),
(11, 2, '109', '665658', 'aizaz', '2018-12-31 17:39:26', '');

-- --------------------------------------------------------

--
-- Table structure for table `courseenrolls`
--

CREATE TABLE `courseenrolls` (
  `id` int(11) NOT NULL,
  `studentRegno` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `session` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `enrollDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course_announcement`
--

CREATE TABLE `course_announcement` (
  `a_id` int(255) NOT NULL,
  `id` int(255) NOT NULL,
  `announcement` varchar(2500) NOT NULL,
  `teachername` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_announcement`
--

INSERT INTO `course_announcement` (`a_id`, `id`, `announcement`, `teachername`, `time`) VALUES
(4, 9, 'asddsd', 'admin', '2018-12-30 03:36:07'),
(6, 10, 'sadasdasd', 'admin', '2018-12-31 16:43:10'),
(7, 10, 'asdads', 'admin', '2018-12-31 16:43:16'),
(8, 9, 'kl quiz hai\r\n', 'M AIZAZ NADEEM', '2018-12-31 20:10:55');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department`, `creationDate`) VALUES
(2, 'HR', '2017-02-09 13:52:04'),
(3, 'Admin', '2017-02-09 13:52:08'),
(5, 'Test', '2017-02-09 13:55:08'),
(7, 'IT', '2018-05-21 05:03:15'),
(8, 'envrionmental science', '2018-12-13 02:29:48');

-- --------------------------------------------------------

--
-- Table structure for table `lectures`
--

CREATE TABLE `lectures` (
  `id` int(255) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `lecture` varchar(255) DEFAULT NULL,
  `uploadedby` varchar(255) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lectures`
--

INSERT INTO `lectures` (`id`, `course_id`, `lecture`, `uploadedby`, `time`) VALUES
(1, 2, 'bankers algorithm.docx', 'aizaz', '2008-12-31 19:43:17'),
(3, 10, 'RequirementsTraceablity_matrix_template.docx', 'admin', '2018-12-31 18:02:11');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int(11) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `semester`, `creationDate`, `updationDate`) VALUES
(1, 'first sem', '2017-02-09 13:47:59', ''),
(2, 'second Sem', '2017-02-09 13:48:04', ''),
(3, 'third Sem', '2018-05-21 05:02:56', ''),
(4, 'fourth sem', '2018-12-09 09:30:00', ''),
(5, 'fifth sem', '2018-12-09 15:31:01', ''),
(6, 'sixth sem', '2018-12-09 15:32:24', ''),
(7, 'seventh sem', '2018-12-09 15:32:41', ''),
(8, 'eighth sem', '2018-12-09 15:33:02', '');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `session`, `creationDate`) VALUES
(1, '2015', '2017-02-09 13:16:51'),
(2, '2016', '2017-02-09 13:27:41'),
(3, '2017', '2018-05-21 05:01:54'),
(4, '2018', '2018-05-21 05:01:58'),
(5, '2014', '2018-12-19 16:25:22'),
(6, '2019', '2018-12-31 18:02:55');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `Regno` varchar(255) NOT NULL,
  `studentPhoto` varchar(255) DEFAULT NULL,
  `Name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneno` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `creationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`Regno`, `studentPhoto`, `Name`, `email`, `phoneno`, `address`, `gender`, `creationdate`, `updationDate`) VALUES
('001', '2.JPG', 'sheraz', 'aizazaizaz@gmail.com', '0300212334234', 'l-46', 'male', '2019-01-01 19:08:11', ''),
('002', '', 'shehroz', 'SHEROZ@gmail.com', '0300212334234', 'l-47', 'male', '2019-01-01 19:16:07', ''),
('003', '', 'admin', 'aizazaizaz@gmail.com', '0300212334234', 'sdasd', 'male', '2019-01-01 19:22:57', ''),
('004', '2.JPG', 'shehzad pagal bewakoof', 'anuj.lpu1@gmail.com', '0388977234', 'adsadas', 'male', '2019-01-01 19:36:18', ''),
('005', '7613ee43-63e1-46b9-a722-bb74e8b7b2c8.jpg', 'aisha', 'anuj.lpu1@gmail.com', '0334234432', 'adasdadasd', 'male', '2019-01-01 19:40:48', ''),
('006', '', 'a', 'aizazaizaz255@gmail.com', '0388977234', 'adsadas', 'male', '2019-01-01 20:11:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `comment_id` int(11) NOT NULL,
  `parent_comment_id` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `comment_sender_name` varchar(40) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`comment_id`, `parent_comment_id`, `comment`, `comment_sender_name`, `date`) VALUES
(7, 1, 'asdasdsa', 'ADMIN', '2018-12-30 17:44:11'),
(8, 0, 'asdasdasds', 'ADMIN', '2018-12-30 17:44:21'),
(9, 8, 'asdadasd', 'ADMIN', '2018-12-31 17:47:38');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `Regno` varchar(255) NOT NULL,
  `teacherPhoto` varchar(255) DEFAULT NULL,
  `Name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phoneno` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `creationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`Regno`, `teacherPhoto`, `Name`, `email`, `address`, `phoneno`, `gender`, `creationdate`, `updationDate`) VALUES
('01', 'downloadhffg.png', 'teacher', 'sdasdas@gmail.com', 'asdas', '07687', 'male', '2019-01-01 19:50:01', ''),
('02', '', 'rasd', 'asdasdas@gmail.com', 'adasdadasd', '0388977234', 'male', '2019-01-01 19:55:45', ''),
('120', '-+92 333 3207520- 20171124_212115.jpg', 'M AIZAZ NADEEM', 'aizazaizaz255@gmail.com', 'l-12', '0388977234', 'male', '2018-12-31 18:43:11', '');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_course`
--

CREATE TABLE `teacher_course` (
  `id` int(11) NOT NULL,
  `teacherRegno` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `session` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `enrollDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_course`
--

INSERT INTO `teacher_course` (`id`, `teacherRegno`, `pincode`, `session`, `department`, `semester`, `course`, `enrollDate`) VALUES
(26, '120', '759619', 6, 7, 3, 9, '2018-12-31 19:17:53');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `sno` int(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`sno`, `user_id`, `password`, `type`, `time`) VALUES
(27, '120', '87a184d8bd861701dd3f9c81cecf0c48', 'Teacher', '2018-12-31 18:03:07'),
(28, '001', '87a184d8bd861701dd3f9c81cecf0c48', 'Student', '2019-01-01 19:05:36'),
(29, '002', '87a184d8bd861701dd3f9c81cecf0c48', 'Student', '2019-01-01 19:13:12'),
(30, '003', '87a184d8bd861701dd3f9c81cecf0c48', 'Student', '2019-01-01 19:19:23'),
(32, '004', '87a184d8bd861701dd3f9c81cecf0c48', 'Student', '2019-01-01 19:35:30'),
(33, '005', '87a184d8bd861701dd3f9c81cecf0c48', 'Student', '2019-01-01 19:39:56'),
(34, '01', '87a184d8bd861701dd3f9c81cecf0c48', 'Teacher', '2019-01-01 19:49:15'),
(35, '02', '87a184d8bd861701dd3f9c81cecf0c48', 'Teacher', '2019-01-01 19:55:11'),
(36, '006', '87a184d8bd861701dd3f9c81cecf0c48', 'Student', '2019-01-01 19:59:14');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `Regno` varchar(255) NOT NULL,
  `userip` binary(16) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logout` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `Regno`, `userip`, `loginTime`, `logout`, `status`) VALUES
(236, '120', 0x3a3a3100000000000000000000000000, '2018-12-31 19:31:15', '', 1),
(237, '120', 0x3a3a3100000000000000000000000000, '2018-12-31 19:50:38', '', 1),
(238, '120', 0x3a3a3100000000000000000000000000, '2018-12-31 19:53:08', '', 1),
(239, '120', 0x3a3a3100000000000000000000000000, '2019-01-01 17:37:12', '01-01-2019 10:51:33 PM', 1),
(240, '120', 0x3a3a3100000000000000000000000000, '2019-01-01 17:51:44', '01-01-2019 11:02:45 PM', 1),
(241, '120', 0x3a3a3100000000000000000000000000, '2019-01-01 18:03:09', '01-01-2019 11:18:37 PM', 1),
(242, '120', 0x3a3a3100000000000000000000000000, '2019-01-01 18:20:50', '01-01-2019 11:24:35 PM', 1),
(243, '120', 0x3a3a3100000000000000000000000000, '2019-01-01 18:26:17', '01-01-2019 11:29:09 PM', 1),
(244, '120', 0x3a3a3100000000000000000000000000, '2019-01-01 18:29:18', '02-01-2019 12:05:09 AM', 1),
(245, '001', 0x3a3a3100000000000000000000000000, '2019-01-01 19:07:31', '02-01-2019 12:13:16 AM', 1),
(246, '002', 0x3a3a3100000000000000000000000000, '2019-01-01 19:13:25', '02-01-2019 12:18:57 AM', 1),
(247, '003', 0x3a3a3100000000000000000000000000, '2019-01-01 19:22:36', '02-01-2019 12:28:18 AM', 1),
(248, '003', 0x3a3a3100000000000000000000000000, '2019-01-01 19:28:29', '02-01-2019 12:33:54 AM', 1),
(249, '002', 0x3a3a3100000000000000000000000000, '2019-01-01 19:34:03', '02-01-2019 12:35:16 AM', 1),
(250, '004', 0x3a3a3100000000000000000000000000, '2019-01-01 19:35:56', '02-01-2019 12:40:06 AM', 1),
(251, '004', 0x3a3a3100000000000000000000000000, '2019-01-01 19:40:14', '02-01-2019 12:40:19 AM', 1),
(252, '005', 0x3a3a3100000000000000000000000000, '2019-01-01 19:40:26', '02-01-2019 12:49:26 AM', 1),
(253, '01', 0x3a3a3100000000000000000000000000, '2019-01-01 19:49:35', '02-01-2019 12:55:16 AM', 1),
(254, '02', 0x3a3a3100000000000000000000000000, '2019-01-01 19:55:23', '02-01-2019 12:59:19 AM', 1),
(255, '006', 0x3a3a3100000000000000000000000000, '2019-01-01 19:59:26', '02-01-2019 01:02:00 AM', 1),
(256, '006', 0x3a3a3100000000000000000000000000, '2019-01-01 20:02:07', '02-01-2019 01:04:05 AM', 1),
(257, '006', 0x3a3a3100000000000000000000000000, '2019-01-01 20:04:13', '02-01-2019 01:06:20 AM', 1),
(258, '006', 0x3a3a3100000000000000000000000000, '2019-01-01 20:06:27', '02-01-2019 01:06:48 AM', 1),
(259, '006', 0x3a3a3100000000000000000000000000, '2019-01-01 20:10:06', '02-01-2019 01:11:54 AM', 1),
(260, '120', 0x3a3a3100000000000000000000000000, '2019-01-01 20:12:40', '02-01-2019 01:13:46 AM', 1),
(261, '001', 0x3a3a3100000000000000000000000000, '2019-01-01 20:15:17', '02-01-2019 01:16:45 AM', 1);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `courseenrolls`
--
ALTER TABLE `courseenrolls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_announcement`
--
ALTER TABLE `course_announcement`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lectures`
--
ALTER TABLE `lectures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`Regno`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`Regno`);

--
-- Indexes for table `teacher_course`
--
ALTER TABLE `teacher_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `courseenrolls`
--
ALTER TABLE `courseenrolls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_announcement`
--
ALTER TABLE `course_announcement`
  MODIFY `a_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lectures`
--
ALTER TABLE `lectures`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `teacher_course`
--
ALTER TABLE `teacher_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `sno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `semester` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
